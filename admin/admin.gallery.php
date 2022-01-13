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
  
$action=isset($_GET["action"])?htmlentities($_GET["action"],ENT_QUOTES,"UTF8"):$action='';
$returnto = "index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=gallery";
switch($action)
{
case'update':
$settings["gallery_mfs"]=$_POST["mfs"];
$settings["gallery_pth"]=$_POST["pth"];
$settings["gallery_grp"]=isset($_POST["grouplist"])?implode(",",$_POST["grouplist"]):$settings["gallery_grp"]='';
    
	foreach($settings as $key=>$value)
          {
              if (is_bool($value))
               $value==true ? $value='true' : $value='false';

            $values[]="(".sqlesc($key).",".sqlesc($value).")";
        }
		$Match = "gallery_";
        do_sqlquery("DELETE FROM {$TABLE_PREFIX}settings WHERE `key` LIKE '%".$Match."%'",true);
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}settings (`key`,`value`) VALUES ".implode(",",$values).";",true);
        foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
        header("Location: $BASEURL/$returnto");	
break;
case'':
default;
$Match = "gallery_";
$btit_settings=get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}settings where `key` LIKE '%".$Match."%'");
$groups=get_result("SELECT * FROM `{$TABLE_PREFIX}users_level` WHERE id>1 ORDER BY `id` ASC",$btit_settings['cache_duration']);
$groupie="<select name='grouplist[]' id='grouplist' multiple='multiple'>";
$set=explode(",", $btit_settings['gallery_grp']);
foreach($groups as $id=>$lev)
{
$groupie.="<option value='".$lev['id']."' ".(in_array($lev['id'],$set)?"selected='selected'":"").">".$lev['level']."</option>";
}
$groupie.="</select>";
$admintpl->set("groupie",$groupie);
$admintpl->set("language",$language);
$admintpl->set("frm_action", "index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=gallery&amp;action=update");
$admintpl->set("settings",$btit_settings);
break;
}
?>