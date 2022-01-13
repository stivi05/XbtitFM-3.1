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



$admintpl->set("language",$language);

$action=$_GET[action];
$action=mysqli_real_escape_string($GLOBALS['conn'],$action);

if(substr($action, 0, 6)=="delete")
{
    if(!is_numeric($_GET["id"]))
        stderr($language["ERROR"],"wtf?");
    $id=(int)0+$_GET["id"];
    $check=get_result("select id as bid from {$TABLE_PREFIX}style_bridge where id=$id",true,$btit_settings['cache_duration']);
    $result=$check[0]["bid"];
    if(!empty($result))
    { 
        do_sqlquery("DELETE FROM {$TABLE_PREFIX}style_bridge where id=$id",true);
    }
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge");
}

if(substr($action, 0, 4)=="save")
{
    if($_SERVER["REQUEST_METHOD"]!="POST")
        stderr($language["ERROR"],"wtf?");
    if(empty($_POST["xbtit_theme"]) && empty($_POST["smf_theme"]) || !is_numeric($_POST["xbtit_theme"]) || !is_numeric($_POST["xbtit_theme"]))
        stderr($language["ERROR"],"wtf?");
    $xstyle=(int)0+$_POST["xbtit_theme"];
    $sstyle=(int)0+$_POST["smf_theme"];
    $check=get_result("select COUNT(*) as xbs from {$TABLE_PREFIX}style_bridge where xbtit_style=$xstyle",true,$btit_settings['cache_duration']);
    $count=$check[0]["xbs"];
    if($count<=0)
    { 
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}style_bridge (id, xbtit_style, smf_style) VALUES ('',$xstyle, $sstyle)",true);
    }
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge");
}

if(substr($action, 0, 6)=="update")
{
    if($_SERVER["REQUEST_METHOD"]!="POST")
        stderr($language["ERROR"],"wtf?");
    if(empty($_POST["xbtit_theme"]) && empty($_POST["smf_theme"]) || empty($_POST["id"]) || !is_numeric($_POST["xbtit_theme"]) || !is_numeric($_POST["xbtit_theme"]) || !is_numeric($_POST["id"]))
        stderr($language["ERROR"],"wtf?");
    $id=(int)0+$_POST["id"];
    $xstyle=(int)0+$_POST["xbtit_theme"];
    $sstyle=(int)0+$_POST["smf_theme"];
    $check=get_result("select COUNT(*) as xbs from {$TABLE_PREFIX}style_bridge where id=$id",true,$btit_settings['cache_duration']);
    $count=$check[0]["xbs"];
    if($count>0)
    { 
        do_sqlquery("Update {$TABLE_PREFIX}style_bridge set xbtit_style=$xstyle, smf_style=$sstyle where id=$id",true);
    }
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge");
}

if(substr($action, 0, 4)=="edit")
{
    $id=(int)$_GET["id"];
    ///$ed=array();
    //$e=0;
    $edlist=do_sqlquery("select id, xbtit_style, smf_style from {$TABLE_PREFIX}style_bridge where id=".$id,true);
    while($edit=mysqli_fetch_assoc($edlist))
    {
        $ed["id"]=$edit["id"];
        $ed["xbtit"]=$edit["xbtit_style"];
        $ed["smf"]=$edit["smf_style"];
        //$e++;
    }
    $admintpl->set("ed",$ed);
}

$xbstyle=array();
$i=0;
$xbtit=get_result("SELECT * FROM {$TABLE_PREFIX}style",true,$btit_settings['cache_duration']);
foreach($xbtit as $xid=>$xbtitstyle)
{
    $xbstyle[$i]["id"]=$xbtitstyle["id"];
    $xbstyle[$i]["style"]=$xbtitstyle["style"];
    $i++;
}
$admintpl->set("btitlist",$xbstyle);

$smstyle=array();
$i=0;
$smf=get_result("SELECT ID_THEME, value AS name FROM {$db_prefix}themes WHERE variable = 'name' AND ID_MEMBER = 0 ORDER BY ID_THEME",true,$btit_settings['cache_duration']);
foreach($smf as $sid=>$smfstyle)
{
    $smstyle[$i]["ID_THEME"]=$smfstyle["ID_THEME"];
    $smstyle[$i]["name"]=$smfstyle["name"];
    $i++;
}

$admintpl->set("smflist",$smstyle);

$list=array();
$i=0;
$list=get_result("select * from {$TABLE_PREFIX}style_bridge ORDER BY xbtit_style ASC",true,$btit_settings['cache_duration']);
foreach($list as $lid=>$style)
{
    $xbname=get_result("select style from {$TABLE_PREFIX}style where id=$style[xbtit_style]",true,$btit_settings['cache_duration']);
    $smname=get_result("select value as name from {$db_prefix}themes where variable = 'name' AND ID_MEMBER = 0 AND ID_THEME=$style[smf_style]",true,$btit_settings['cache_duration']);
    $list[$i]["xbtit"]=$style["xbtit_style"];
    $list[$i]["xbtitname"]=$xbname[0]["style"];
    $list[$i]["smf"]=$style["smf_style"];
    $list[$i]["smfname"]=$smname[0]["name"];
    $list[$i]["edity"]="<a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge&action=edit&id=".$style["id"]."'>".image_or_link("$STYLEPATH/images/edit.png","",$language["EDIT"])."</a>&nbsp;<a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge&action=delete&id=".$style["id"]."'>".image_or_link("$STYLEPATH/images/delete.png","",$language["DELETE"])."</a>";
    $i++;
}

$admintpl->set("list",$list);
$admintpl->set("form_poster","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge&action=save");
$admintpl->set("edit_poster","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=style_bridge&action=update");
$admintpl-> set("is_edit",(($action=="edit")?true:false),true);

?>