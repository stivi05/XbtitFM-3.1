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


if (!$CURUSER || $CURUSER["admin_access"]!="yes")
{
       err_msg($language["ERROR"],$language["NOT_ADMIN_CP_ACCESS"]);
       stdfoot();
       exit;
}
else
{
    $admintpl->set("language", $language);
    $admintpl->set("birthday_lower_limit", $btit_settings["birthday_lower_limit"]);
    $admintpl->set("birthday_upper_limit", $btit_settings["birthday_upper_limit"]);
    $admintpl->set("birthday_bonus", $btit_settings["birthday_bonus"]);
    $admintpl->set("random", $CURUSER["random"]);
    $admintpl->set("uid", $CURUSER["uid"]);
    $admintpl->set("firstview", (($_POST["action"]=="Update")?FALSE:TRUE), TRUE);
    $admintpl->set("selected_GB", (($btit_settings["birthday_bytes"]=="GB")?TRUE:FALSE), TRUE);
    $admintpl->set("selected_MB", (($btit_settings["birthday_bytes"]=="MB")?TRUE:FALSE), TRUE);

    if($_POST["action"]=="Update")
    {
        (isset($_POST["minage"]) && !empty($_POST["minage"])?$minage=intval($_POST["minage"]):$minage=0);
        (isset($_POST["maxage"]) && !empty($_POST["maxage"])?$maxage=intval($_POST["maxage"]):$maxage=0);
        (isset($_POST["bonus"]) && !empty($_POST["bonus"])?$bonus=addslashes($_POST["bonus"]):$bonus=0);
        (isset($_POST["format"]) && !empty($_POST["format"])?$format=intval($_POST["format"]):$format=0);


        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".($format==1?"GB":"MB")."' WHERE `key`='birthday_bytes'");
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`=$minage WHERE `key`='birthday_lower_limit'");
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`=$maxage WHERE `key`='birthday_upper_limit'");
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='$bonus' WHERE `key`='birthday_bonus'");

            foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);

    }
}
?>