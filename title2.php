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

require_once ("include/functions.php");
require_once ("include/config.php");
dbconn();
session_name("xbtitFM");
session_start();

global $CURUSER, $TABLE_PREFIX, $THIS_BASEPATH, $db_prefix, $FORUMLINK, $ipb_prefix;

if ($CURUSER["uid"] > 1)
{
    require_once(dirname(__FILE__).load_language("lang_main.php"));
    if(!isset($language["SYSTEM_USER"]))
        $language["SYSTEM_USER"]="System";

    $uid=$CURUSER['uid'];
    $c=$CURUSER["seedbonus"];
    if($c>=$GLOBALS["price_ct"])
    {
        if (isset($_POST["title"]))
            $custom=mysqli_real_escape_string($GLOBALS['conn'],$_POST["title"]);
        else
            $custom = "";

        $p=$GLOBALS["price_ct"];

        if ("$custom"=="")
        {
            do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `custom_title`='', `seedbonus`=`seedbonus`-".$p." WHERE `id`=".$uid, true);
            if(substr($FORUMLINK,0,3)=="smf")
                do_sqlquery("UPDATE `{$db_prefix}members` SET `usertitle`='' WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"], true);
            elseif($FORUMLINK=="ipb")
                do_sqlquery("UPDATE `{$ipb_prefix}members` SET `title`='' WHERE `member_id`=".$CURUSER["ipb_fid"], true);
        }
        else
        {
            do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `custom_title`='".htmlspecialchars($custom)."', `seedbonus`=`seedbonus`-".$p." WHERE `id`=".$uid, true);
            // sb control
            @do_sqlquery("INSERT into {$TABLE_PREFIX}sb_control (`id`,`what`,`gb`,`points`,`date`) VALUES ('$uid','Title ( ".htmlspecialchars($custom)." )',0, '".$GLOBALS["price_ct"]."',NOW())");
            // sb control
            if(substr($FORUMLINK,0,3)=="smf")
                do_sqlquery("UPDATE `{$db_prefix}members` SET `usertitle`='".htmlspecialchars($custom)."' WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"], true);
            elseif($FORUMLINK=="ipb")
                do_sqlquery("UPDATE `{$ipb_prefix}members` SET `title`='".htmlspecialchars($custom)."' WHERE `member_id`=".$CURUSER["ipb_fid"], true);
        }
        $_SESSION["CURUSER"]["seedbonus"]-=$p;

        if($btit_settings["fmhack_user_notes"]=="enabled" && $btit_settings["un_bonus"]=="enabled")
        {
            if(isset($CURUSER["user_notes"]) && !empty($CURUSER["user_notes"]))
                $usernotes=unserialize(unesc($CURUSER["user_notes"]));
            else
                $usernotes=array();

            $usernotes[]=base64_encode("[b]".$CURUSER["username"]."[/b] ".$language["UN_BONUS_GENERAL_1"]." [b]".(int)$p."[/b] ".$language["UN_BONUS_GENERAL_2"]." ".$language["UN_UL_TITLE"]." [b]".$custom."[/b]<+>0<+>".$language["SYSTEM_USER"]."<+>".time());
            $new_notes=serialize($usernotes); 
            do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `user_notes`='".mysqli_real_escape_string($GLOBALS['conn'],$new_notes)."' WHERE `id`=".$uid); 
        }
    }
    header("Location: index.php?page=modules&module=seedbonus");
}
else
    header("Location: index.php");

?>