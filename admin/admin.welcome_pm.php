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



$save=isset($_GET["act"])?htmlentities($_GET["act"]):$save='';

switch($save)
{
case 'update';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$sub=isset($_POST["SUB"])?htmlspecialchars(mysqli_real_escape_string($GLOBALS['conn'],$_POST["SUB"])):$sub='';
$msg=isset($_POST["MSG"])?htmlentities(mysqli_real_escape_string($GLOBALS['conn'],$_POST["MSG"])):$msg='';
$msg=str_replace("&amp;","&",$msg);
if(!empty($sub) && !empty($msg))
{
do_sqlquery("UPDATE {$TABLE_PREFIX}welcome_msg SET `value`='$sub' WHERE `key`='fm_welcome_sub'",true);
do_sqlquery("UPDATE {$TABLE_PREFIX}welcome_msg  SET `value`='$msg' WHERE `key`='fm_welcome_msg'",true);
}
redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=welcome_msg");
}
break;
case'':
default;
$msg_settings=get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}welcome_msg");
$admintpl->set("lang",$language);
$admintpl->set("wmset",$msg_settings);
$admintpl->set("wmprevsub",$msg_settings["fm_welcome_sub"]);
$msg_settings["fm_welcome_msg"]=str_replace("amp;","",$msg_settings["fm_welcome_msg"]);
$admintpl->set("wmprev",format_comment($msg_settings["fm_welcome_msg"]));
$admintpl->set("wmbb",textbbcode("welcome","MSG",$msg_settings["fm_welcome_msg"]));
$admintpl->set("wmact","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=welcome_msg&act=update");
break;
}
?>