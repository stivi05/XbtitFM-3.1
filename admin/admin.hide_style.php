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



if($btit_settings["fmhack_alternate_login"]=="enabled")
{
$admintpl->set("alternate_login_enabled", (($btit_settings["fmhack_alternate_login"]=="enabled" && $btit_settings["alternate_login"]=="enabled")?false:true), true);		
}
else{
$admintpl->set("alternate_login_enabled", (($btit_settings["fmhack_alternate_login"]=="enabled" && $btit_settings["alternate_login"]=="enabled")?true:false), true);		
}

if($btit_settings["fmhack_add_new_users_in_adminCP"]=="enabled")
{
$admintpl->set("add_new_users_in_adminCP_enabled", (($btit_settings["fmhack_add_new_users_in_adminCP"]=="enabled" && $btit_settings["add_new_users_in_adminCP"]=="enabled")?false:true), true);		
}
else{
$admintpl->set("add_new_users_in_adminCP_enabled", (($btit_settings["fmhack_add_new_users_in_adminCP"]=="enabled" && $btit_settings["add_new_users_in_adminCP"]=="enabled")?true:false), true);		
}

if(isset($_POST) && !empty($_POST))
{
    $enable_all=$_POST["enable_all"];
    unset($_POST["enable_all"]);

    if($enable_all=="enable_all")
    {
        $post=$_POST;
        foreach($post as $k => $v)
        {
            if($v=="disabled")
                $_POST[$k]="enabled";
        }
    }
    elseif($enable_all=="disable_all")
    {
        $post=$_POST;
        foreach($post as $k => $v)
        {
            if($v=="enabled")
                $_POST[$k]="disabled";
        }
    }

    foreach($_POST as $k => $v)
    {
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".mysqli_real_escape_string($GLOBALS['conn'],$v)."' WHERE `key`='".mysqli_real_escape_string($GLOBALS['conn'],$k)."'");

    }

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=hide_style");        
}
$i=0;
$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("single", (($btit_settings["loginpagetype"]=="single")?true:false), true);
$admintpl->set("rotating", (($btit_settings["loginpagetype"]=="rotating")?true:false), true);

$admintpl->set("usercp_style_enabled", (($btit_settings["usercp_style"]=="enabled")?true:false),true);
$admintpl->set("usercp_style_disabled", (($btit_settings["usercp_style"]=="disabled")?true:false),true);
$admintpl->set("usercp_style_color", (($btit_settings["usercp_style"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("userinfo_style_enabled", (($btit_settings["userinfo_style"]=="enabled")?true:false),true);
$admintpl->set("userinfo_style_disabled", (($btit_settings["userinfo_style"]=="disabled")?true:false),true);
$admintpl->set("userinfo_style_color", (($btit_settings["userinfo_style"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("usertoolbar_style_enabled", (($btit_settings["usertoolbar_style"]=="enabled")?true:false),true);
$admintpl->set("usertoolbar_style_disabled", (($btit_settings["usertoolbar_style"]=="disabled")?true:false),true);
$admintpl->set("usertoolbar_style_color", (($btit_settings["usertoolbar_style"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("createacc_style_enabled", (($btit_settings["createacc_style"]=="enabled")?true:false),true);
$admintpl->set("createacc_style_disabled", (($btit_settings["createacc_style"]=="disabled")?true:false),true);
$admintpl->set("createacc_style_color", (($btit_settings["createacc_style"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("add_new_user_style_enabled", (($btit_settings["add_new_user_style"]=="enabled")?true:false),true);
$admintpl->set("add_new_user_style_disabled", (($btit_settings["add_new_user_style"]=="disabled")?true:false),true);
$admintpl->set("add_new_user_style_color", (($btit_settings["add_new_user_style"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("sbg_login_style_enabled", (($btit_settings["sbg_login_style"]=="enabled")?true:false),true);
$admintpl->set("sbg_login_style_disabled", (($btit_settings["sbg_login_style"]=="disabled")?true:false),true);
$admintpl->set("sbg_login_style_color", (($btit_settings["sbg_login_style"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("rbg_login_style_enabled", (($btit_settings["rbg_login_style"]=="enabled")?true:false),true);
$admintpl->set("rbg_login_style_disabled", (($btit_settings["rbg_login_style"]=="disabled")?true:false),true);
$admintpl->set("rbg_login_style_color", (($btit_settings["rbg_login_style"]=="enabled")?"#00FF00;":"#FF0000;"));
?>