<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// Torrent Request & Vote by miskotes  - converted to XBTIT-2 by DiemThuy - March 2009
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

// done , no template needed

if (!defined("IN_BTIT"))
      die("non direct access!");


if (!$CURUSER || $CURUSER["view_torrents"]=="no")
{

	 stderr($language["ERROR"],$language["TRAV_NOTALLOWED"]);
     stdfoot();
 	 die();
}
else

       $maxallowed = $btit_settings["req_max"];
       $res3 = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}requests WHERE userid=$CURUSER[uid]") or mysqli_error($GLOBALS['conn']);
       $arr3 = mysqli_num_rows($res3);
       $numreqs = $arr3;
if ($btit_settings["req_maxon"]==true){
if ($numreqs >= $maxallowed)
  {

     stderr($language["ERROR"],$language["TRAV_REACHEDMAX"].": <b>$maxallowed</b>");
     stdfoot();
 	 die();
}
}
{
$requesttitle = $_POST["requesttitle"];
$descr = $_POST["description"];
$cat = (int)$_POST["category"];

if (!$requesttitle)
  {

      stderr($language["ERROR"],$language["TRAV_MUSTADDTITLE"]);
      stdfoot();
      die;
}

$cat = 0+$_POST["category"];
      if ($cat==0)
  {

      stderr($language["ERROR"],$language["TRAV_MUSTCHOOSECAT"]);
      stdfoot();
      die;
}

$descr = $_POST["description"];
if (!$descr)
  {

      stderr($language["ERROR"],$language["TRAV_MUSTADDDESC"]);
      stdfoot();
      die;
}

$request = sqlesc($requesttitle);
$descr = sqlesc($descr);
$cat = sqlesc($cat);

do_sqlquery("INSERT INTO {$TABLE_PREFIX}requests (hits, userid, cat, request, descr, added) VALUES(1,$CURUSER[uid], $cat, $request, $descr, NOW())") or sqlerr(__FILE__,__LINE__);

$id = mysqli_insert_id($GLOBALS['conn']);

@do_sqlquery("INSERT INTO {$TABLE_PREFIX}addedrequests VALUES(0, $id, $CURUSER[uid])") or sqlerr();

// start request announce
if ($btit_settings["req_shout"]==true)

{
global $BASEURL;
$url=("[url=$BASEURL/index.php?page=viewrequests]".$requesttitle."[/url]");
do_sqlquery("INSERT INTO {$TABLE_PREFIX}chat (uid, time, name, text) VALUES (0,".time().",'system',\"[color=purple]".mysqli_real_escape_string($GLOBALS['conn'],$language["TRAV_NEWREQUEST"]).":[/color] $url  [color=purple]".mysqli_real_escape_string($GLOBALS['conn'],$language["TRAV_ADDEDBY"]).":[/color] ".$CURUSER["username"]."\")");
}
// end request announce

write_log("$request ".$language["TRAV_WATTRS"]);

header("Refresh: 0; url=index.php?page=viewrequests");
}

?>