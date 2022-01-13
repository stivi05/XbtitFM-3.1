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
    (isset($_POST["loginpagetype"]) && $_POST["loginpagetype"]=="single") ? $loginpagetype="single" : $loginpagetype="rotating";
    (isset($_POST["altmode"]) && $_POST["altmode"]=="new") ? $altmode="new" : $altmode="classic";

    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$loginpagetype."' WHERE `key`='loginpagetype'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$altmode."' WHERE `key`='altmode'", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);

}
if($btit_settings["altmode"]=="classic")
{
$admintpl->set("new_1", (($btit_settings["altmode"] == "classic" && $btit_settings["altmode"] == "new")?true:false), true);
}
else{
$admintpl->set("new_1", (($btit_settings["altmode"] == "new" && $btit_settings["altmode"] == "new")?true:false), true);
}
if($btit_settings["fmhack_faq_with_groups"]=="enabled")
{
$admintpl->set("faq_with_groups_enabled", (($btit_settings["fmhack_faq_with_groups"]=="enabled" && $btit_settings["faq_with_groups"]=="enabled")?false:true), true);
$admintpl->set("faq_with_groups_enabled_1", (($btit_settings["fmhack_faq_with_groups"]=="enabled" && $btit_settings["faq_with_groups"]=="enabled")?false:true), true);	
}
else{
$admintpl->set("faq_with_groups_enabled", (($btit_settings["fmhack_faq_with_groups"]=="enabled" && $btit_settings["faq_with_groups"]=="enabled")?true:false), true);
$admintpl->set("faq_with_groups_enabled_1", (($btit_settings["fmhack_faq_with_groups"]=="enabled" && $btit_settings["faq_with_groups"]=="enabled")?true:false), true);
}	

if($btit_settings["fmhack_rules_with_groups"]=="enabled")
{
$admintpl->set("rules_with_groups_enabled", (($btit_settings["fmhack_rules_with_groups"]=="enabled" && $btit_settings["rules_with_groups"]=="enabled")?false:true), true);
$admintpl->set("rules_with_groups_enabled_1", (($btit_settings["fmhack_rules_with_groups"]=="enabled" && $btit_settings["rules_with_groups"]=="enabled")?false:true), true);		
}
else{
$admintpl->set("rules_with_groups_enabled", (($btit_settings["fmhack_rules_with_groups"]=="enabled" && $btit_settings["rules_with_groups"]=="enabled")?true:false), true);
$admintpl->set("rules_with_groups_enabled_1", (($btit_settings["fmhack_rules_with_groups"]=="enabled" && $btit_settings["rules_with_groups"]=="enabled")?true:false), true);
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

    $res=get_result("SELECT(SELECT `view_forum` FROM `{$TABLE_PREFIX}users_level` WHERE `id`=1) `view_forum`");



    foreach($_POST as $k => $v)
    {
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".mysqli_real_escape_string($GLOBALS['conn'],$v)."' WHERE `key`='".mysqli_real_escape_string($GLOBALS['conn'],$k)."'");

    }

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=login_page");        
}
$i=0;
$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("single", (($btit_settings["loginpagetype"]=="single")?true:false), true);
$admintpl->set("rotating", (($btit_settings["loginpagetype"]=="rotating")?true:false), true);

$admintpl->set("altrulestype_kcdoff", (($btit_settings["altrulestype"]=="kcdoff")?true:false), true);
$admintpl->set("altrulestype_kcdon", (($btit_settings["altrulestype"]=="kcdon")?true:false),true);

$admintpl->set("altfaqtype_kcdoff", (($btit_settings["altfaqtype"]=="kcdoff")?true:false), true);
$admintpl->set("altfaqtype_kcdon", (($btit_settings["altfaqtype"]=="kcdon")?true:false),true);

$admintpl->set("alt_news_enabled", (($btit_settings["alt_news"]=="enabled")?true:false),true);
$admintpl->set("alt_news_disabled", (($btit_settings["alt_news"]=="disabled")?true:false),true);
$admintpl->set("alt_news_color", (($btit_settings["alt_news"]=="enabled")?"#00FF00;":"#FF0000;"));


$admintpl->set("alt_rules_enabled", (($btit_settings["alt_rules"]=="enabled")?true:false),true);
$admintpl->set("alt_rules_disabled", (($btit_settings["alt_rules"]=="disabled")?true:false),true);
$admintpl->set("alt_rules_color", (($btit_settings["alt_rules"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("alt_faq_enabled", (($btit_settings["alt_faq"]=="enabled")?true:false),true);
$admintpl->set("alt_faq_disabled", (($btit_settings["alt_faq"]=="disabled")?true:false),true);
$admintpl->set("alt_faq_color", (($btit_settings["alt_faq"]=="enabled")?"#00FF00;":"#FF0000;"));

$admintpl->set("new", (($btit_settings["altmode"]=="new")?true:false), true);
$admintpl->set("classic", (($btit_settings["altmode"]=="classic")?true:false), true);

$admintpl->set("colspan", (($btit_settings["fmhack_rules_with_groups"]=="enabled" || $btit_settings["fmhack_faq_with_groups"]=="enabled")?" colspan=\"2\"":""));

?>