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

if (!defined("IN_BTIT"))
    die("non direct access!");

if (!defined("IN_ACP"))
    die("non direct access!");



if(isset($_POST) && !empty($_POST))
{
    (isset($_POST["prefix"]) && !empty($_POST["prefix"])) ? $prefix=mysqli_real_escape_string($GLOBALS['conn'],$_POST["prefix"]) : $prefix="";
    (isset($_POST["suffix"]) && !empty($_POST["suffix"])) ? $suffix=mysqli_real_escape_string($GLOBALS['conn'],$_POST["suffix"]) : $suffix="";
    
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$prefix."' WHERE `key`='download_prefix'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$suffix."' WHERE `key`='download_suffix'", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=dlpresuf");
}

$after=$language["DPS_EXAMPLE_TORR"];
if(isset($btit_settings["download_prefix"]) && !empty($btit_settings["download_prefix"]))
    $after="<span style='font-weight:bold;'>".$btit_settings["download_prefix"]."</span>".$after;
if(isset($btit_settings["download_suffix"]) && !empty($btit_settings["download_suffix"]))
    $after=str_replace(".torrent", "", $after)."<span style='font-weight:bold'>".$btit_settings["download_suffix"]."</span>.torrent";

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("prefix",$btit_settings["download_prefix"]);
$admintpl->set("suffix",$btit_settings["download_suffix"]);
$admintpl->set("after",$after);

?>