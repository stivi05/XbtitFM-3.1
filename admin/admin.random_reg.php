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
    (isset($_POST["rreg_open_for"]) && !empty($_POST["rreg_open_for"]) && is_numeric($_POST["rreg_open_for"]) && $_POST["rreg_open_for"]>0) ? $rreg_open_for=(int)0+$_POST["rreg_open_for"] : $rreg_open_for=5;
    (isset($_POST["rreg_min"]) && !empty($_POST["rreg_min"]) && is_numeric($_POST["rreg_min"]) && $_POST["rreg_min"]>0) ? $rreg_min=(int)0+$_POST["rreg_min"] : $rreg_min=15;
    (isset($_POST["rreg_max"]) && !empty($_POST["rreg_max"]) && is_numeric($_POST["rreg_max"]) && $_POST["rreg_max"]>0) ? $rreg_max=(int)0+$_POST["rreg_max"] : $rreg_max=60;

    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$rreg_open_for."' WHERE `key`='rreg_open_for'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$rreg_min."' WHERE `key`='rreg_min'", true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$rreg_max."' WHERE `key`='rreg_max'", true);

    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=random_reg");
}

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("config", $btit_settings);

?>