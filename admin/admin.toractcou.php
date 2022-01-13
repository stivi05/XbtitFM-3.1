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
    do_sqlquery("DELETE FROM `{$TABLE_PREFIX}settings` WHERE `key` IN('snatched_prefixcolor','snatched_suffixcolor','leeching_prefixcolor','leeching_suffixcolor','seeding_prefixcolor','seeding_suffixcolor','hide_down_img')", true);
    do_sqlquery("INSERT INTO {$TABLE_PREFIX}settings (`key`, `value`) VALUES ('snatched_prefixcolor', '".((isset($_POST["snatched_prefixcolor"]))?mysqli_real_escape_string($GLOBALS['conn'],unesc($_POST["snatched_prefixcolor"])):"")."'), ('snatched_suffixcolor', '".((isset($_POST["snatched_suffixcolor"]))?mysqli_real_escape_string($GLOBALS['conn'],unesc($_POST["snatched_suffixcolor"])):"")."'), ('leeching_prefixcolor', '".mysqli_real_escape_string($GLOBALS['conn'],unesc($_POST["leeching_prefixcolor"]))."'), ('leeching_suffixcolor', '".mysqli_real_escape_string($GLOBALS['conn'],unesc($_POST["leeching_suffixcolor"]))."'), ('seeding_prefixcolor', '".mysqli_real_escape_string($GLOBALS['conn'],unesc($_POST["seeding_prefixcolor"]))."'), ('seeding_suffixcolor', '".mysqli_real_escape_string($GLOBALS['conn'],unesc($_POST["seeding_suffixcolor"]))."'), ('hide_down_img', '".((isset($_POST["hide_down_img"]) && $_POST["hide_down_img"]=="yes")?"yes":"no")."')", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=toractcou");
}

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("settings", $btit_settings);
$admintpl->set("checkedYes", (($btit_settings["hide_down_img"]=="no")?false:true), true);
$admintpl->set("checkedNo", (($btit_settings["hide_down_img"]=="no")?true:false), true);
$admintpl->set("downTorrEnabled1", (($btit_settings["fmhack_downloaded_torrents"]=="enabled")?true:false), true);
$admintpl->set("downTorrEnabled2", (($btit_settings["fmhack_downloaded_torrents"]=="enabled")?true:false), true);

?>