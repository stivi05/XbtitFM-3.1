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

$minratio=$btit_settings["mindlratio"];

// load language file
require(load_language("lang_downloadcheck.php"));

$dlchecktpl = new bTemplate();
$dlchecktpl -> set("language",$language);

if (!$CURUSER || $CURUSER["view_torrents"]=="no" || $CURUSER["can_download"]=="no")
{
    err_msg($language["ERROR"],$language["NOT_AUTH_DOWNLOAD"]);
    stdfoot(($GLOBALS["usepopup"]?false:true));
    die();
}

(isset($_GET["id"]) ? $id=mysqli_real_escape_string($GLOBALS['conn'],strtolower(preg_replace("/[^A-Fa-f0-9]/", "", $_GET["id"]))) : $id="");

if($id=="")
{
    err_msg($language["ERROR"],$language["BAD_ID"]);
    stdfoot(($GLOBALS["usepopup"]?false:true));
    die();
}
$completedb4 = false;
if($XBTT_USE)
    $res = get_result("SELECT COUNT(*) `count` FROM `xbt_files_users` `xfu` INNER JOIN `xbt_files` `xf` ON `xfu`.`fid`=`xf`.`fid` INNER JOIN `{$TABLE_PREFIX}users` `u` ON `xfu`.`uid`=`u`.`id` WHERE `xfu`.`completed`>0 AND `xf`.`info_hash`=0x".$id." AND `xfu`.`uid`=".$CURUSER["uid"]);
else
    $res = get_result("SELECT COUNT(*) `count` FROM `{$TABLE_PREFIX}history` `h` INNER JOIN `{$TABLE_PREFIX}users` `u` ON `h`.`uid`=`u`.`id` WHERE `h`.`completed`='yes' AND `h`.`infohash`='".$id."' AND `h`.`uid`=".$CURUSER["uid"]);
if($res[0]["count"] > 0)
    $completedb4 = true;
if($btit_settings["fmhack_magnet_links"] == "enabled")
    $query1_select.="`f`.`magnet`,";  
// whitelist users 
if($btit_settings["fmhack_whitelist_users_and_groups"] == "enabled")
$query1_select.="f.exclusive,";
// whitelist users
$res = do_sqlquery("SELECT ".$query1_select." f.filename, f.size, f.uploader, f.anonymous, u.id, u.username, ul.prefixcolor, ul.suffixcolor FROM {$TABLE_PREFIX}files f LEFT JOIN {$TABLE_PREFIX}users u ON u.id=f.uploader LEFT JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE info_hash='$id'");
if(mysqli_num_rows($res)==1)
    $row=mysqli_fetch_assoc($res);
else
{
    err_msg($language["ERROR"],$language["BAD_ID"]);
    stdfoot(($GLOBALS["usepopup"]?false:true));
    die();
}
if ($XBTT_USE)
   $res=do_sqlquery("SELECT u.id, (u.downloaded+IFNULL(x.downloaded,0)) as downloaded, ((u.uploaded+IFNULL(x.uploaded,0))/(u.downloaded+IFNULL(x.downloaded,0))) as ratio FROM {$TABLE_PREFIX}users u LEFT JOIN xbt_users x ON x.uid=u.id WHERE u.id=".$CURUSER["uid"]);
else
   $res=do_sqlquery("SELECT id, downloaded, (uploaded/downloaded) as ratio FROM {$TABLE_PREFIX}users WHERE id=".$CURUSER["uid"]);

$user = mysqli_fetch_assoc($res);
$anon=$row["anonymous"];//account for anonymous
$row["clean_username"]=$row["username"];
if($anon=="true" && $row["uploader"]==$row["id"] && $CURUSER["edit_torrents"]=="no")
          {
              $row["username"]=$language["ANONYMOUS"];
              $row["clean_username"]=$row["username"];
              $row["prefixcolor"]="";
              $row["suffixcolor"]="";
              $row["uploader"]=0;

          }
          elseif($anon=="true" && $row["uploader"]==$row["id"] && $CURUSER["edit_torrents"]=="yes")
              $row["username"]="".stripslashes($row["prefixcolor"]).$row["username"].stripslashes($row["suffixcolor"])."&nbsp;(".$language["ANONYMOUS"].")";
          elseif($anon=="false")
              $row["username"]=stripslashes($row["prefixcolor"].$row["username"].$row["suffixcolor"]);

$uploader="<a href='".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated_user"]=="true")?$row["uploader"]."_".strtr($row["clean_username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$row["uploader"])."'>".$row["username"]."</a>";
(is_numeric($user["ratio"])?$ratio=number_format($user["ratio"], 3):$ratio=$user["ratio"]);

if(is_null($ratio))
    $ratio="&#8734;";

$dlcheck=array();
$dlcheck["username"]=$CURUSER["username"];
if($btit_settings["fmhack_whitelist_users_and_groups"]=="enabled")
    {	
// whitelist users
if ($row['exclusive']) {
    // is current user authorized for download
    $rowexclusive=get_result("SELECT users, groups FROM {$TABLE_PREFIX}files_whitelisted WHERE info_hash='".$id."' LIMIT 1");
    $rowexclusive=$rowexclusive[0];
    if (in_array($CURUSER['uid'],explode(',',$rowexclusive['users']),true))
        $exclusive_user=true;
    else
        $exclusive_user=($CURUSER["uid"]==$row["uploader"] || $CURUSER['id_level']==8);
        
    // groups
    // check only if user not in user list
    if (!$exclusive_user) {
        $rowsgroupexclusive=get_result("SELECT users FROM {$TABLE_PREFIX}whitelisted_groups WHERE id IN (".$rowexclusive['groups'].")");
        $users_str='';
        foreach ($rowsgroupexclusive as $id => $rowgroup) {
            if ($users_str!='')
                $users_str.=',';
            $users_str.=$rowgroup['users'];
        } 
        // check is current user is IN
        if (in_array($CURUSER['uid'],explode(',',$users_str),true))
            $exclusive_user=true;
        else
            $exclusive_user=($CURUSER["uid"]==$row["uploader"] || $CURUSER['id_level']==8);

    }
        
}
// whitelist users
   }
// user downloaded less than 10mb or good ratio, or by pass, or admin, or is uploader
if($user["downloaded"]<="1048576" || $ratio>=$minratio || $ratio=="&#8734;" || $CURUSER["bypass_dlcheck"]==1 || $CURUSER["admin_access"]=="yes" || $row["uploader"]==$CURUSER["uid"] || $completedb4) {
    $dlcheck["result"]=$language["TORRENT_READY"];
    $dlcheck["link"]="<a href='".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $row["magnet"]!="")?base64_decode(stripslashes($row["magnet"])):"download.php?id=".$id."&amp;f=".urlencode($row["filename"]).".torrent&amp;key=".$CURUSER["dlrandom"])."'".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $row["magnet"]!="")?" title='".$language["MAGNET_DOWN_USING"]."'":" title='".$language["DOWNLOAD_TORRENT"]."'")."><img src='images/".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $row["magnet"]!="")?"magnet":"download").".gif' border='0' ".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $row["magnet"]!="")?"alt='".$language["MAGNET_DOWN_USING"]."' title='".$language["MAGNET_DOWN_USING"]."'":"alt='".$language["DOWNLOAD_TORRENT"]."' title='".$language["DOWNLOAD_TORRENT"]."'")." />&nbsp;&nbsp;".$language["DOWNLOAD_NOW"]."</a>";
}
else {
    $dlcheck["result"]=$language["TORRENT_NOT_READY_1"] . $minratio . $language["TORRENT_NOT_READY_2"];
    $dlcheck["link"]=$language["CANT_DOWNLOAD"];
}
$dlcheck["ratio"]=$ratio;
$dlcheck["size"]=makesize($row["size"])." (".number_format($row["size"])." bytes)";
$dlcheck["uploader"]=$uploader;
$dlcheck["filename"]="<a title='Details' href='index.php?page=torrent-details&amp;id=".$id."'>".$row["filename"]."</a>";

$dlchecktpl -> set("dlcheck", $dlcheck);

?>