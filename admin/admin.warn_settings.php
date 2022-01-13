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



$admintpl->set("language",  $language);
$admintpl->set("CURUSER", $CURUSER);
$admintpl->set("btit_settings", $btit_settings);
$admintpl->set("wad_enabled", (($btit_settings["warn_auto_down_enable"]=="yes")?true:false), true);
$admintpl->set("booted_enabled", (($btit_settings["fmhack_booted"]=="enabled")?true:false), true);
$admintpl->set("ban_button_enabled", (($btit_settings["fmhack_ban_button"]=="enabled")?true:false), true);
$admintpl->set("tna_checked", false, true);
$admintpl->set("bam_checked", false, true);


if($btit_settings["fmhack_booted"]=="enabled")
{
    if($btit_settings["warn_bantype"]=="no_action_at_max")
        $admintpl->set("tna_checked", true, true);
    elseif($btit_settings["warn_bantype"]=="boot_at_max")
        $admintpl->set("bam_checked", true, true);
}
elseif($btit_settings["fmhack_booted"]=="disabled")
    $admintpl->set("tna_checked", true, true);

if(isset($_POST) && !empty($_POST))
{
    (isset($_POST["warn_max"]) && !empty($_POST["warn_max"]) && is_numeric($_POST["warn_max"]) && $_POST["warn_max"]>0) ? $warn_max=(int)0+$_POST["warn_max"] : $warn_max=10;
    (isset($_POST["warn_auto_decrease"]) && !empty($_POST["warn_auto_decrease"]) && is_numeric($_POST["warn_auto_decrease"]) && $_POST["warn_auto_decrease"]>0) ? $warn_auto_decrease=(int)0+$_POST["warn_auto_decrease"] : $warn_auto_decrease=1;
    (isset($_POST["warn_auto_down_enable"]) && !empty($_POST["warn_auto_down_enable"]) && $_POST["warn_auto_down_enable"]=="on") ? $warn_auto_down_enable="yes" : $warn_auto_down_enable="no";
    (isset($_POST["warn_bantype"]) && !empty($_POST["warn_bantype"]) && ($_POST["warn_bantype"]=="no_action_at_max" || $_POST["warn_bantype"]=="boot_at_max")) ? $warn_bantype=$_POST["warn_bantype"] : $warn_bantype="no_action_at_max";
    (isset($_POST["warn_booted_days"]) && !empty($_POST["warn_booted_days"]) && is_numeric($_POST["warn_booted_days"]) && $_POST["warn_booted_days"]>0 && $warn_bantype=="boot_at_max") ? $warn_booted_days=(int)0+$_POST["warn_booted_days"] : $warn_booted_days=0;
    if($warn_bantype=="boot_at_max" && $warn_booted_days==0)
        $warn_bantype="no_action_at_max";

    if($warn_max!=$btit_settings["warn_max"])
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` set `value`='".$warn_max."' WHERE `key`='warn_max'",true);
    if($warn_auto_decrease!=$btit_settings["warn_auto_decrease"])
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` set `value`='".$warn_auto_decrease."' WHERE `key`='warn_auto_decrease'",true);
    if($warn_auto_down_enable!=$btit_settings["warn_auto_down_enable"])
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` set `value`='".$warn_auto_down_enable."' WHERE `key`='warn_auto_down_enable'",true);
    if($warn_bantype!=$btit_settings["warn_bantype"])
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` set `value`='".$warn_bantype."' WHERE `key`='warn_bantype'",true);
    if($warn_booted_days!=$btit_settings["warn_booted_days"])
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` set `value`='".$warn_booted_days."' WHERE `key`='warn_booted_days'",true);

    // Clear the cache files to force an instant update
    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);

    // redirect so that we see the new settings straight away
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=warn_settings");
} 

?>