<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// Redistribution and use in source and binary forms, with or without modification,
// are permitted provided that the following conditions are met:
//
//   1. Redistributions of source code must retain the above copyright notice,
//      this list of conditions and the following disclaimer.
//   2. Redistributions in binary form must reproduce the above copyright notice,
//      this list of conditions and the following disclaimer in the documentation
//      and/or other materials provided with the distribution.
//   3. The name of the author may not be used to endorse or promote products
//      derived from this software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED
// WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
// MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
// IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
// TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
// PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
// LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
// EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//
////////////////////////////////////////////////////////////////////////////////////
require_once("include/functions.php");
global $CURUSER,$TABLE_PREFIX ;
dbconn();

///== Mod by dokty - Tbdev.net

$id = (int) $_GET["id"];
$points = (int) $_GET["points"];
$poi = (int) $_GET["ix"];
$infohash=mysqli_real_escape_string($GLOBALS['conn'], $_GET["id"]);

$pointscangive = array("10", "20", "50", "100", "200", "500", "1000");
if (!in_array($points, $pointscangive))
stderr("Error", "You can&rsquo;t give that amount of points!!!");

$sdsa = mysqli_query($GLOBALS['conn'],"SELECT 1 FROM {$TABLE_PREFIX}coins WHERE info_hash='$infohash' AND userid ='$CURUSER[uid]'") or sqlerr(__FILE__, __LINE__);
$asdd = mysqli_fetch_array($sdsa);
if ($asdd)
stderr("Error", "You already gave points to this torrent.");

$res = mysqli_query($GLOBALS['conn'],"SELECT * FROM {$TABLE_PREFIX}files WHERE info_hash =" . sqlesc($infohash) . " ")or sqlerr(__FILE__, __LINE__);
$row = mysqli_fetch_assoc($res) or stderr("Error", "Torrent was not found");
$userid = $row["uploader"];


if ($row["uploader"] == $CURUSER["uid"])
stderr("Error", "You can&rsquo;t give yourself points!");

if ($CURUSER["seedbonus"] < $points)
stderr("Error", "You don&rsquo;t have enough points");

mysqli_query($GLOBALS['conn'],"INSERT INTO {$TABLE_PREFIX}coins (userid,info_hash,points) VALUES ($poi, " . sqlesc($infohash) . "," . sqlesc($points) . ")") or sqlerr(__FILE__, __LINE__);
mysqli_query($GLOBALS['conn'],"UPDATE {$TABLE_PREFIX}users SET seedbonus=seedbonus+" . $points . " WHERE id=$userid") or sqlerr(__FILE__, __LINE__);
mysqli_query($GLOBALS['conn'],"UPDATE {$TABLE_PREFIX}users SET seedbonus=seedbonus-" . $points . " WHERE id=$poi") or sqlerr(__FILE__, __LINE__);
mysqli_query($GLOBALS['conn'],"UPDATE {$TABLE_PREFIX}files SET points=points+" . $points . " WHERE info_hash=" . sqlesc($infohash) . "") or sqlerr(__FILE__, __LINE__);
$msg = sqlesc("You have been given " . $points . " points by ".$CURUSER["username"]." for torrent [url=$BASEURL/index.php?page=torrent-details&id=".$infohash."]".$row["filename"]."[/url].");
mysqli_query($GLOBALS['conn'],"INSERT INTO {$TABLE_PREFIX}messages (sender, receiver, added, subject, msg) VALUES(0, $userid, " . sqlesc(time()) . ", 'You have been given a gift', $msg)") or sqlerr(__FILE__, __LINE__);
stderr("Done", "Successfully gave points to this torrent.");

?>











