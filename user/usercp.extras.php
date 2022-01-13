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
/*Signature and Avatar sync with forum by cooly*/
if (!defined("IN_BTIT"))
      die("non direct access!");

	  
$action =(isset($_GET['action'])?htmlentities($_GET['action']):$action='');
$action = mysqli_real_escape_string($GLOBALS['conn'],$action);
$returnto = "index.php?page=usercp&uid=".$CURUSER["uid"]."&do=user_extras";

global $db_prefix, $CURUSER, $ipb_prefix, $FORUMLINK;

if($action == 'send')
{
	$sig = (isset($_POST["sig"])?sqlesc(str_replace(array("[IMG]", "[/IMG]"), array("[img]", "[/img]"), $_POST["sig"])):'');
	$sigf=isset($_POST["sigf"])?"true":"false";
	$av=isset($_POST["av"])?"true":"false";
	$avf=sqlesc($CURUSER[avatar]);
	
	if(!empty($_POST["sig"])){
	if(!preg_match("/\[img\](http:\/\/[^\s'\"<>]+(\.gif|\.jpg|\.png))\[\/img\]/",$sig)){
	stderr($language[ERROR],"[img]http://imageurl.(<b>gif</b>)(<b>jpg</b>)(<b>png</b>)[/img]");
	}
}else{}
        do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `sig`=$sig,`syncsig`='$sigf',`syncav`='$av' WHERE `id`=".$CURUSER["uid"]);
	if($sigf=="true"){
	(substr($FORUMLINK,0,3)=="smf"?do_sqlquery("UPDATE `{$db_prefix}members` SET `signature`=$sig WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"])://else ipb
        do_sqlquery("UPDATE `{$ipb_prefix}profile_portal` SET `signature`=$sig WHERE `pp_member_id`=".$CURUSER["ipb_fid"]));
        echo $ping;
        }
	if($av=="true"){
	(substr($FORUMLINK,0,3)=="smf"?do_sqlquery("UPDATE `{$db_prefix}members` SET `avatar`=$avf WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"])://else ipb
	do_sqlquery("UPDATE `{$ipb_prefix}profile_portal` SET `avatar_location`=$avf WHERE `pp_member_id`=".$CURUSER["ipb_fid"]));
        }
	
header("Location: $BASEURL/$returnto");		
}
else
{
    
	$settings=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users where id=".$CURUSER[uid]);
        $getsig=mysqli_fetch_assoc($settings);
	$getsig["syncsig"]=($getsig["syncsig"]=="true"?"checked=\"checked\"":"");
	$getsig["syncav"]=($getsig["syncav"]=="true"?"checked=\"checked\"":"");
	$usercptpl->set("language",$language);
	$usercptpl->set("frm_action", "index.php?page=usercp&uid=".$CURUSER["uid"]."&amp;do=user_extras&amp;action=send");
	$usercptpl->set("config",$getsig);
	$sigshit=array('[img]','[/img]');
	$sigshit2=array('','');
	$prev_sig=str_replace($sigshit,$sigshit2,$getsig["sig"]);
	if(!empty($getsig["sig"])){
	$usercptpl -> set("sig_prev","<img border=\"0\" onload=\"resize_sig(this);\" src=\"".htmlspecialchars($prev_sig)."\" alt=\"\" />");
	}else{
	$usercptpl -> set("sig_prev","");
	}
	$usercptpl-> set("isEXT", (($FORUMLINK=="")?FALSE:TRUE), TRUE);
	
}
?>