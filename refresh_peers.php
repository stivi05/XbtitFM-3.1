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

include("include/functions.php");

(isset($_GET["id"]) && !empty($_GET["id"]) && strlen($_GET["id"])==40) ? $id=mysqli_real_escape_string($GLOBALS['conn'],preg_replace("/[^a-zA-Z0-9]/","",$_GET["id"])) : $id=false;

if($id===false)
    die();

$my_timeout=time()-(intval($btit_settings["sanity_update"] * 2));

if($XBTT_USE)
{
    $res=get_result("SELECT `fid` FROM `xbt_files` WHERE `info_hash`=0x$id", true, $btit_settings["cache_duration"]);
    if(count($res)>0)
    {
        $fid=(int)$res[0]["fid"];
        do_sqlquery("UPDATE `xbt_files_users` SET `active`=0 WHERE `mtime`<".$my_timeout." AND `fid`=".$fid, true);
        $res=get_result("SELECT (SELECT COUNT(*) FROM `xbt_files_users` WHERE `fid`=".$fid." AND `left`=0 AND `active`=1) `seeders`, (SELECT COUNT(*) FROM `xbt_files_users` WHERE `fid`=".$fid." AND `left`>0 AND `active`=1) `leechers`, (SELECT COUNT(*) FROM `xbt_files_users` WHERE `fid`=".$fid." AND `completed`>0) `completed`", true, $btit_settings["cache_duration"]);
        if(count($res)>0)
        {
            $row=$res[0];
            do_sqlquery("UPDATE `xbt_files` SET `seeders`=".$row["seeders"].", `leechers`=".$row["leechers"].", `completed`=".$row["completed"]." WHERE `fid`=".$fid);
            echo $row["seeders"]."[*]".$row["leechers"]."[*]".($row["seeders"]+$row["leechers"]);
        }
    }
    
}
else
{
    do_sqlquery("DELETE FROM `{$TABLE_PREFIX}peers` WHERE `lastupdate` < ".$my_timeout." AND `infohash`='".$id."'", true);
    $res=get_result("SELECT `status`, COUNT(`status`) `status_count` FROM `{$TABLE_PREFIX}peers` WHERE `infohash`='".$id."' GROUP BY `status`", true, $btit_settings["cache_duration"]);
    $counts = array();
    if(count($res)>0)
    {
        foreach($res as $row)
        {
            $counts[$row["status"]] = (int)0+$row["status_count"];
        }
    }
    $seeders=(isset($counts["seeder"])?$counts["seeder"]:0);
    $leechers=(isset($counts["leecher"])?$counts["leecher"]:0);
    $total_count=($seeders+$leechers);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `leechers`=".$leechers.", `seeds`=".$seeders." WHERE `info_hash`='".$id."'", true);
    echo $seeders."[*]".$leechers."[*]".$total_count;
}

?>