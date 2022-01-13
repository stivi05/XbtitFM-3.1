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
    (isset($_POST["mod_app_pm"]) && ($_POST["mod_app_pm"]=="yes" || $_POST["mod_app_pm"]=="no") && $btit_settings["fmhack_torrent_moderation"]=="enabled") ? $mod_app_pm=$_POST["mod_app_pm"] : $mod_app_pm="yes";
    (isset($_POST["mod_app_sa"]) && ($_POST["mod_app_sa"]=="yes" || $_POST["mod_app_sa"]=="no") && $btit_settings["fmhack_torrent_moderation"]=="enabled") ? $mod_app_sa=$_POST["mod_app_sa"] : $mod_app_sa="yes";

    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$mod_app_pm."' WHERE `key`='mod_app_pm'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$mod_app_sa."' WHERE `key`='mod_app_sa'", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=tmod_set");
}

$btit_settings["mod_app_pm_1"]=(($btit_settings["mod_app_pm"]=="yes")?"selected='selected'":"");
$btit_settings["mod_app_pm_2"]=(($btit_settings["mod_app_pm"]=="no")?"selected='selected'":"");
$btit_settings["mod_app_pm_color"]=(($btit_settings["mod_app_pm"]=="yes")?"#00FF00;":"#FF0000;");
$btit_settings["mod_app_sa_1"]=(($btit_settings["mod_app_sa"]=="yes")?"selected='selected'":"");
$btit_settings["mod_app_sa_2"]=(($btit_settings["mod_app_sa"]=="no")?"selected='selected'":"");
$btit_settings["mod_app_sa_color"]=(($btit_settings["mod_app_sa"]=="yes")?"#00FF00;":"#FF0000;");

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("config", $btit_settings);

?>