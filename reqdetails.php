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


if($CURUSER["uid"]<=1 || $CURUSER["view_torrents"]!="yes")
stderr($language["ERROR"],$language["NOT_AUTH_REQ"]);

$reqdetailstpl = new bTemplate();
$reqdetailstpl->set("language",$language);

(isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"]>0) ? $id=(int)0+$_GET["id"] : $id=false;

if($id===false)
    stderr($language["ERROR"], $language["BAD_ID"]);

$res = get_result("SELECT `r`.`userid` `requester_id`, `ul1`.`prefixcolor` `requester_prefixcolor`, `u1`.`username` `requester_username`, `ul1`.`suffixcolor` `requester_suffixcolor`, `r`.`request`, `r`.`descr`, UNIX_TIMESTAMP(`r`.`added`) `added`, UNIX_TIMESTAMP(`r`.`fulfilled`) `fulfilled`, `r`.`filled`, `r`.`filledby` `filler_id`, `ul2`.`prefixcolor` `filler_prefixcolor`, `u2`.`username` `filler_username`, `ul2`.`suffixcolor` `filler_suffixcolor`, `r`.`job` `job_id`, `ul3`.`prefixcolor` `job_prefixcolor`, `u3`.`username` `job_username`, `ul3`.`suffixcolor` `job_suffixcolor` FROM `{$TABLE_PREFIX}requests` `r` LEFT JOIN `{$TABLE_PREFIX}users` `u1` ON `r`.`userid`=`u1`.`id` LEFT JOIN `{$TABLE_PREFIX}users_level` `ul1` ON `u1`.`id_level`=`ul1`.`id` LEFT JOIN `{$TABLE_PREFIX}users` `u2` ON `r`.`filledby`=`u2`.`id` LEFT JOIN `{$TABLE_PREFIX}users_level` `ul2` ON `u2`.`id_level`=`ul2`.`id` LEFT JOIN `{$TABLE_PREFIX}users` `u3` ON `r`.`job`=`u3`.`id` LEFT JOIN `{$TABLE_PREFIX}users_level` `ul3` ON `u3`.`id_level`=`ul3`.`id` WHERE `r`.`id`=".$id, true, $btit_settings["cache_duration"]);

if(count($res)==1)
{
    $num=$res[0];
    //Edit request by RippeR change by miskotes
    $url = "index.php?page=reqedit&id=$id";
    if (isset($_GET["returnto"]))
    {
        $addthis = "&amp;returnto=".urlencode($_GET["returnto"]);
        $url .= $addthis;
    }
    $reqdetailstpl->set("editlink", "<a href=\"$url\">");
    $reqdetailstpl->set("req_username", unesc($num["requester_prefixcolor"].$num["requester_username"].$num["requester_suffixcolor"]));
    $reqdetailstpl->set("req_id", $num["requester_id"]);
    $reqdetailstpl->set("on_the_job_1", (($num["job_id"]>0)?true:false), true);
    $reqdetailstpl->set("on_the_job_2", (($num["job_id"]>0)?true:false), true);
    $reqdetailstpl->set("job_username", (($num["job_id"]>0)?unesc($num["job_prefixcolor"].$num["job_username"].$num["job_suffixcolor"]):""));
    $reqdetailstpl->set("job_id", $num["job_id"]);
    $reqdetailstpl->set("filled_job_1", (($num["filler_id"]>0)?true:false), true);
    $reqdetailstpl->set("filled_job_2", (($num["filler_id"]>0)?true:false), true);
    $reqdetailstpl->set("filler_username", (($num["filler_id"]>0)?unesc($num["filler_prefixcolor"].$num["filler_username"].$num["filler_suffixcolor"]):""));
    $reqdetailstpl->set("filler_id", $num["filler_id"]);
    $reqdetailstpl->set("can_upload_1", (($CURUSER["can_upload"]=="yes")?true:false), true);
    $reqdetailstpl->set("can_upload_2", (($CURUSER["can_upload"]=="yes")?true:false), true);
    $reqdetailstpl->set("can_upload_3", (($CURUSER["can_upload"]=="yes")?true:false), true);
    $reqdetailstpl->set("id", $id);
    $reqdetailstpl->set("BASEURL", $BASEURL);
    $reqdetailstpl->set("request", $num["request"]);
    $reqdetailstpl->set("can_edit", (($CURUSER["uid"] == $num["requester_id"] || $CURUSER["edit_torrents"]=="yes")?true:false), true);
    $reqdetailstpl->set("has_descr", ((isset($num["descr"]) && !empty($num["descr"]))?true:false), true);
    $reqdetailstpl->set("descr", ((isset($num["descr"]) && !empty($num["descr"]))?format_comment(unesc($num["descr"])):""));
    $reqdetailstpl->set("req_added", date("d/m/Y \a\\t g:ia", $num["added"]));
    $reqdetailstpl->set("req_fulfilled", date("d/m/Y \a\\t g:ia", $num["fulfilled"]));
    $reqdetailstpl->set("unfilled", (($num["filled"]==0)?true:false), true);
    $reqdetailstpl->set("my_job", (($CURUSER["uid"]==$num["job_id"])?true:false), true);
    $reqdetailstpl->set("filled", $num["filled"]);
}
else
    stderr($language["ERROR"], $language["BAD_ID"]);

?>