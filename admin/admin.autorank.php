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

if(isset($_POST) && $_POST["submit"]==$language["SUBMIT"])
{
    (isset($_POST["fullcheck"]) && is_numeric($_POST["fullcheck"]) && $_POST["fullcheck"] >=0 && $_POST["fullcheck"] <=23) ? $fullcheck=$_POST["fullcheck"] : $fullcheck=FALSE;
    (isset($_POST["send_pm"]) && $_POST["send_pm"]=="yes") ? $send_pm="yes" : $send_pm="no";

    if($btit_settings["autorank_sendpm"]!=$send_pm)
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$send_pm."' WHERE `key`='autorank_sendpm'");

    if($fullcheck!==FALSE)
    {
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`=$fullcheck WHERE `key`='autorank_fullcheck'");

        foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
            unlink($filename);
        redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=autorank");
    }
    else
    {
        err_msg($language["ERROR"],$language["AUTORANK_INVALID"]);
        stdfoot();
        exit;
    }
}

$admintpl->set("language",  $language);
$admintpl->set("autorank_action", "index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=autorank");
$admintpl->set("autorank_main",  "index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=groups&action=read");
$admintpl->set("autorank_fullcheck", $btit_settings["autorank_fullcheck"]);
$admintpl->set("selected1", (($btit_settings["autorank_sendpm"]=="no")?true:false), true);
$admintpl->set("selected2", (($btit_settings["autorank_sendpm"]=="yes")?true:false), true);
$admintpl->set("startcol", (($btit_settings["autorank_sendpm"]=="no")?"#FF0000":"#00FF00"));

?>