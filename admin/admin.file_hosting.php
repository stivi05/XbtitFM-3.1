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
$admintpl->set("config_saved",false,true);
$admintpl->set("xbtt_error",false,true);
require_once (load_language("lang_file_hosting.php"));

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
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=file_hosting");        
}
$i=0;
$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
switch ($action)
    {
    case 'write':
      if ($_POST["write"]==$language["FRM_CONFIRM"])
        {

// file host start
        $btit_settings["fhost_file_limit"]=$_POST["fhost_file_limit"];
        $btit_settings["fhost_del"]=$_POST["fhost_del"];
        $btit_settings["fhost_upload"]=$_POST["fhost_upload"];
        $btit_settings["fhost_level_upload"]=$_POST["fhost_level_upload"];
        $btit_settings["fhost_level_download"]=$_POST["fhost_level_download"];
        $btit_settings["fhost_title"]=$_POST["fhost_title"];
        $btit_settings["fhost_page_limit"]=$_POST["fhost_page_limit"];        
//file host end        

        foreach($btit_settings as $key=>$value)
          {
              if (is_bool($value))
               $value==true ? $value='true' : $value='false';

            $values[]="(".sqlesc($key).",".sqlesc($value).")";
        }

        do_sqlquery("DELETE FROM {$TABLE_PREFIX}settings") or stderr($language["ERROR"],mysqli_error($GLOBALS['conn']));
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}settings (`key`,`value`) VALUES ".implode(",",$values).";") or stderr($language["ERROR"],mysqli_error($GLOBALS['conn']));

        unset($values);    

        $admintpl->set("config_saved",true,true);
        }

    case 'read':
    case '':
    default:
        $admintpl->set("language",$language);
        $btit_settings=get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}settings");
                
if($btit_settings["fhost_upload"]=="enabled")
{
$admintpl->set("fhost_upload_enabled", (($btit_settings["fhost_upload"]=="enabled" && $btit_settings["fhost_upload"]=="enabled")?true:false), true);

}
else{
$admintpl->set("fhost_upload_disabled", (($btit_settings["fhost_upload"]=="disabled" && $btit_settings["fhost_upload"]=="enabled")?true:false), true);

}
$admintpl->set("fhost_upload_enabled", (($btit_settings["fhost_upload"]=="enabled")?true:false),true);
$admintpl->set("fhost_upload_disabled", (($btit_settings["fhost_upload"]=="disabled")?true:false),true);
$admintpl->set("fhost_upload_color", (($btit_settings["fhost_upload"]=="enabled")?"#00FF00;":"#FF0000;"));
$admintpl->set("config",$btit_settings);
$admintpl->set("frm_action","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=config&amp;action=write");
}

?>