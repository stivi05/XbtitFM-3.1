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
    (isset($_POST["img_file_size"]) && is_numeric($_POST["img_file_size"]) && $_POST["img_file_size"]>0) ? $img_file_size=(int)0+$_POST["img_file_size"] : $img_file_size=0;
    (isset($_POST["img_size_width"]) && is_numeric($_POST["img_size_width"]) && $_POST["img_size_width"]>0) ? $img_size_width=(int)0+$_POST["img_size_width"] : $img_size_width=0;
    (isset($_POST["img_size_height"]) && is_numeric($_POST["img_size_height"]) && $_POST["img_size_height"]>0) ? $img_size_height=(int)0+$_POST["img_size_height"] : $img_size_height=0;
    
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$img_file_size."' WHERE `key`='img_file_size'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$img_size_width."' WHERE `key`='img_size_width'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$img_size_height."' WHERE `key`='img_size_height'", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=avatar_upload");
}

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("img_file_size", $btit_settings["img_file_size"]);
$admintpl->set("img_size_width", $btit_settings["img_size_width"]);
$admintpl->set("img_size_height", $btit_settings["img_size_height"]);

?>