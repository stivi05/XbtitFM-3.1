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
    (isset($_POST["UPC"]) && $_POST["UPC"]=="true") ? $UPC="true" : $UPC="false";
    (isset($_POST["UPD"]) && is_numeric($_POST["UPD"]) && $_POST["UPD"]>0) ? $UPD=(int)0+$_POST["UPD"] : $UPD=20;
    (isset($_POST["UPB"]) && is_numeric($_POST["UPB"]) && $_POST["UPB"]>0) ? $UPB=(int)0+$_POST["UPB"] : $UPB=1;
    (isset($_POST["UPS"]) && is_numeric($_POST["UPS"]) && $_POST["UPS"]>0) ? $UPS=(int)0+$_POST["UPS"] : $UPS=3;
    (isset($_POST["UPG"]) && is_numeric($_POST["UPG"]) && $_POST["UPG"]>0) ? $UPG=(int)0+$_POST["UPG"] : $UPG=5;
    (isset($_POST["UPBL"]) && is_numeric($_POST["UPBL"]) && $_POST["UPBL"]>0) ? $UPBL=(int)0+$_POST["UPBL"] : $UPBL=10;

    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$UPC."' WHERE `key`='UPC'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$UPD."' WHERE `key`='UPD'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$UPB."' WHERE `key`='UPB'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$UPS."' WHERE `key`='UPS'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$UPG."' WHERE `key`='UPG'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$UPBL."' WHERE `key`='UPBL'", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=up_med");
}

$btit_settings["UPCyes"]=($btit_settings["UPC"]?"checked=\"checked\"":"");
$btit_settings["UPCno"]=(!$btit_settings["UPC"]?"checked=\"checked\"":"");

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("config", $btit_settings);

?>