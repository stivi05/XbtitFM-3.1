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
if(!defined("IN_BTIT"))
    die("non direct access!");
if(!defined("IN_ACP"))
    die("non direct access!");

if(isset($_POST) && !empty($_POST))
{
    $blockedArray=array_unique(explode("\r\n", $_POST["country_codes"]));
    sort($blockedArray, SORT_STRING);
    if(count($blockedArray)>0)
    {
        $blockedArray2=$blockedArray;
        foreach($blockedArray2 as $key => $value)
        {
            if(empty($value) || substr($value, 0, 1)!="[" || substr($value, 3, 1)!="]")
                unset($blockedArray[$key]);
        }
    }
    $blocked_signup_countries=mysqli_real_escape_string($GLOBALS['conn'],((count($blockedArray)>0)?implode(",", $blockedArray):""));
    do_sqlquery("DELETE FROM `{$TABLE_PREFIX}settings` WHERE `key`='blocked_signup_countries'", true);
    do_sqlquery("INSERT INTO `{$TABLE_PREFIX}settings` (`key`, `value`) VALUES ('blocked_signup_countries', '".$blocked_signup_countries."');", true);
    foreach(glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=csignup");
}
$select="<option value='false'>---</option>\n";
$pad="            ";
$res=get_result("SELECT `country_code2`, `country_name` FROM `{$TABLE_PREFIX}ip2country` GROUP BY `country_code2` ORDER BY `country_name` ASC", true, $btit_settings["cache_duration"]);
if(count($res)>0)
{
    foreach($res as $row)
    {
        $select.=$pad."<option value='".$row["country_code2"]."' onclick='addToTextarea(\"[".$row["country_code2"]."] (".$row["country_name"].")\");'>".$row["country_name"]."</option>\n";
    }
}
$select=trim($select, "\n");
$admintpl->set("select", $select);
$admintpl->set("currentBlocked", (($btit_settings["blocked_signup_countries"]!="")?str_replace(",", "\r\n", $btit_settings["blocked_signup_countries"])."\r\n":""));
$admintpl->set("uid", $CURUSER["uid"]);
$admintpl->set("random", $CURUSER["random"]);
$admintpl->set("language", $language);
?>