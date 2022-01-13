<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// Torrent Request & Vote by miskotes  - converted to XBTIT-2 by DiemThuy - March 2009
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


if ($CURUSER["can_upload"]=="no")
{
    // do nothing
}
else
{
   
    session_start();
    $reqfilledtpl = new bTemplate();
    $reqfilledtpl->set("language",$language);
    $reqfilledtpl->set("rf0","<table align='center' width=550 class=lista><tr><td class=lista align=center width=100%>");
    $filledurl = mysqli_real_escape_string($GLOBALS['conn'],$_GET["filledurl"]);
    $requestid = mysqli_real_escape_string($GLOBALS['conn'],$_GET["requestid"]);
    $burl=$BASEURL;
	if($btit_settings["fmhack_force_ssl"]=="enabled" && $CURUSER["force_ssl"]=="yes")
    {
	$burl=str_replace("https://","",$burl);
	$burl=str_replace("/","\/",$burl);//account for subfolder
	$url=("https:\/\/");
	}
	else
	{
    $burl=str_replace("http://","",$burl);
	$burl=str_replace("/","\/",$burl);//account for subfolder
	$url=("http:\/\/");
	}
    if(preg_match('/^'.$url.''.$burl.'\/(.*)id=([^(&#)]*)/i', $_GET['filledurl'], $filledurl))
    {
        $res = get_result("SELECT `u`.`username`, `r`.`userid`, `r`.`request` FROM `{$TABLE_PREFIX}requests` `r` LEFT JOIN `{$TABLE_PREFIX}users` `u` on `r`.`userid`=`u`.`id` WHERE `r`.`id`=".$requestid, true, $btit_settings["cache_duration"]);
        $arr = $res[0];
        $filledurl = mysqli_real_escape_string($GLOBALS['conn'],$_GET["filledurl"]);//was only returning an array
        $filldate =  date('Y-m-d H:i:s');
        $msg = $language["TRAV_REQUEST"].": [url=$BASEURL/index.php?page=reqdetails&id=" . $requestid . "][b]" . $arr["request"] . "[/b][/url], ".$language["TRAV_WAS_FB"]." [url=".$BASEURL."/".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated_user"]=="true")?$CURUSER["uid"]."_".strtr($CURUSER["username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$CURUSER["uid"])."][b]" . $CURUSER["username"] . "[/b][/url]"."\n\n".$language["TRAV_TORR_DL1"].":
[url=".$filledurl."][b]".$filledurl."[/b][/url]"."\n\n".$language["TRAV_TORR_DL2"]." [url=$BASEURL/index.php?page=reqreset&requestid=".$requestid."][b]".$language["TRAV_HERE"]."[/b][/url]"."\n\n".$language["TRAV_TORR_DL3"];
        $subject=$language["TRAV_REQFILLED"];
        $hash= mysqli_real_escape_string($GLOBALS['conn'],$_GET["hash"]);
        $upper=get_result("SELECT `uploader` FROM `{$TABLE_PREFIX}files` WHERE `info_hash`='".$hash."'", true, $btit_settings["cache_duration"]);
        $upid=$upper[0]["uploader"];

        if(!empty($hash))
        {
            do_sqlquery ("UPDATE `{$TABLE_PREFIX}requests` SET `filled` ='".$filledurl."', `fulfilled`= '".$filldate."', `filledby` = ".$upid." WHERE `id`=".$requestid, true);
        }
        else
        {
            stderr($language["ERROR"],$language["R_EMPTY_HASH"]);
        }
        if ($btit_settings["req_rwon"]=="true")
        {
            if ($btit_settings["req_sbmb"]=="true")
            {
                do_sqlquery("UPDATE `".(($XBTT_USE)?"xbt_":$TABLE_PREFIX)."users` SET `uploaded`=`uploaded` + ".$btit_settings["req_mb"]."  WHERE `".(($XBTT_USE)?"u":"")."id`=".$CURUSER["uid"]);
                $_SESSION["CURUSER"]["uploaded"]+=$btit_settings["req_mb"];
            }
            if ($btit_settings["req_sbmb"]=="false")
            {
                do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `seedbonus` = `seedbonus` + ".$btit_settings["req_sb"]." WHERE id=".$CURUSER["uid"]);
                $_SESSION["CURUSER"]["seedbonus"]+=$btit_settings["req_sb"];
            }
        }
        send_pm($CURUSER["uid"],$arr["userid"],sqlesc($subject),sqlesc($msg));
    }
    else
    {
        stderr($language["ERROR"],$language["R_EMPTY_URL"]);
    }
    
    $reqfilledtpl->set("rf1","<table class=lista align=center width=550 cellspacing=2 cellpadding=0>\n");
    $reqfilledtpl->set("rf2","<br><BR><div align=left>".$language["TRAV_REQUEST"]." " . $arr["request"] . " ".$language["TRAV_HNBSF_1"].": <a href=$filledurl>$filledurl</a>.  ".$language["TRAV_HNBSF_2"]." <a href=index.php?page=account-details&id=".$arr["userid"]."><b>".$arr["username"]."</b></a> ".$language["TRAV_HNBSF_3"]." <a href=index.php?page=reqreset&requestid=$requestid>".$language["TRAV_HNBSF_4"]."<br /><br /></div>");
    $reqfilledtpl->set("rf3",$language["TRAV_THANKS"]);
    $reqfilledtpl->set("rf4","</td></tr></table></table>");
}

?>