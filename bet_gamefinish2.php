<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//   SPORT BETTING HACK , orginal TBDEV 2009 by Soft & Bigjoos 
//   XBTIT conversion by DiemThuy , April 2010
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


require_once("include/functions.php");

global $BASEURL, $CURUSER, $language, $btit_settings;

if(!isset($CURUSER) || !is_array($CURUSER))
{
   
    session_start();
    $CURUSER=$_SESSION["CURUSER"];
}

if ($CURUSER["admin_access"]=="no")
    stderr($language["ERROR"],$language["SB_ACC_DEN"]);

$forumid = (int)$btit_settings["fid_bet"];
$forumuser = (int)$btit_settings["fid_bet_user"];  

$betfintwotpl = new bTemplate();
$betfintwotpl->set("language", $language);

//==Autopost By Retro
function auto_bet($subject = "Error - Subject Missing", $body = "Error - No Body")
{
    global $CURUSER, $BASEURL, $TABLE_PREFIX, $btit_settings, $language, $db_prefix, $FORUMLINK, $forumid, $forumuser, $ipb_prefix, $THIS_BASEPATH;

    if(substr($FORUMLINK,0,3)=="smf")
    {
        $old_topic=false;
        $res=get_result("SELECT ".(($FORUMLINK=="smf")?"`realName`, `emailAddress`, `memberIP`":"`real_name`, `email_address`, `member_ip`")." FROM `{$db_prefix}members` WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=$forumuser",true,$btit_settings["cache_interval"]);
        $row=$res[0];

        $res = get_result("SELECT ".(($FORUMLINK=="smf")?"`ID_TOPIC`":"`id_topic`")." FROM `{$db_prefix}messages` WHERE ".(($FORUMLINK=="smf")?"`ID_BOARD`":"`id_board`")."=$forumid AND `subject`=$subject",true,$btit_settings["cache_interval"]);
        if (count($res)>0)
        {
            $topicid = (($FORUMLINK=="smf")?$res[0]["ID_TOPIC"]:$res[0]["id_topic"]);
            $old_topic=true;
        }
        else
        {
            do_sqlquery("INSERT INTO `{$db_prefix}topics` (".(($FORUMLINK=="smf")?"`ID_BOARD`, `ID_MEMBER_STARTED`":"`id_board`, `id_member_started`").") VALUES($forumid,$forumuser)",true);
            $topicid = @mysqli_insert_id($GLOBALS['conn']);
        }
        if($FORUMLINK=="smf")
        {
            do_sqlquery("INSERT INTO `{$db_prefix}messages` (`ID_TOPIC`,`ID_BOARD`, `posterTime`, `ID_MEMBER`, `ID_MSG_MODIFIED`, `subject`, `posterName`, `posterEmail`, `posterIP`, `body`) VALUES($topicid,$forumid,UNIX_TIMESTAMP(),$forumuser,$topicid,$subject,'".mysqli_real_escape_string($GLOBALS['conn'],$row["realName"])."','".mysqli_real_escape_string($GLOBALS['conn'],$row["emailAddress"])."','".mysqli_real_escape_string($GLOBALS['conn'],$row["memberIP"])."',$body)",true);
            $postid = @mysqli_insert_id($GLOBALS['conn']);

            do_sqlquery("UPDATE `{$db_prefix}topics` SET `ID_FIRST_MSG`=$postid, `ID_LAST_MSG`=$postid WHERE `ID_BOARD`=$forumid AND `ID_TOPIC`=$topicid",true);
            do_sqlquery("UPDATE `{$db_prefix}boards` SET `ID_LAST_MSG`=$postid, `ID_MSG_UPDATED`=$postid, ".(($old_topic===false)?"`numTopics`=`numTopics`+1,":"")." `numPosts`=`numPosts`+1 WHERE `ID_BOARD`=$forumid",true);
            do_sqlquery("UPDATE `{$db_prefix}members` SET `posts`=`posts`+1 WHERE `ID_MEMBER`=$forumuser");
        }
        else
        {
            do_sqlquery("INSERT INTO `{$db_prefix}messages` (`id_topic`,`id_board`, `poster_time`, `id_member`, `id_msg_modified`, `subject`, `poster_name`, `poster_email`, `poster_ip`, `body`) VALUES($topicid,$forumid,UNIX_TIMESTAMP(),$forumuser,$topicid,$subject,'".mysqli_real_escape_string($GLOBALS['conn'],$row["real_name"])."','".mysqli_real_escape_string($GLOBALS['conn'],$row["email_address"])."','".mysqli_real_escape_string($GLOBALS['conn'],$row["member_ip"])."',$body)",true);
            $postid = @mysqli_insert_id($GLOBALS['conn']);

            do_sqlquery("UPDATE `{$db_prefix}topics` SET `id_first_msg`=$postid, `id_last_msg`=$postid WHERE `id_board`=$forumid AND `id_topic`=$topicid",true);
            do_sqlquery("UPDATE `{$db_prefix}boards` SET `id_last_msg`=$postid, `id_msg_updated`=$postid, ".(($old_topic===false)?"`num_topics`=`num_topics`+1,":"")." `num_posts`=`num_posts`+1 WHERE `id_board`=$forumid",true);
            do_sqlquery("UPDATE `{$db_prefix}members` SET `posts`=`posts`+1 WHERE `id_member`=$forumuser");
        }
        if($old_topic===false)
            do_sqlquery("UPDATE `{$db_prefix}settings` SET `value`=`value`+1 WHERE `variable`='totalTopics'",true);
        do_sqlquery("UPDATE `{$db_prefix}settings` SET `value`=`value`+1 WHERE `variable`='totalMessages'",true);
    }
    elseif($FORUMLINK=="ipb")
        ipb_make_post($forumid, $subject, $body);
    else
    {
        $old_topic=false;
        $res = get_result("SELECT `id` FROM `{$TABLE_PREFIX}topics` WHERE `forumid`=$forumid AND `subject`=$subject",true,$btit_settings["cache_interval"]);

        if (count($res)>0)
        {
            $topicid = $res[0]['id'];
            $old_topic=true;
        }
        else
        {
            do_sqlquery("INSERT INTO {$TABLE_PREFIX}topics (userid, forumid, subject) VALUES($forumuser, $forumid, $subject)",true);
            $topicid = @mysqli_insert_id($GLOBALS['conn']);
        }
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}posts (topicid, userid, added, body) VALUES($topicid,$forumuser, UNIX_TIMESTAMP(), $body)",true);
        $res = do_sqlquery("SELECT `id` FROM `{$TABLE_PREFIX}posts` WHERE `topicid`=$topicid ORDER BY `id` DESC LIMIT 1",true);
        $arr = mysqli_fetch_row($res) or die($language["SB_NO_POST"]);
        $postid = $arr[0];
        do_sqlquery("UPDATE {$TABLE_PREFIX}topics SET lastpost=$postid WHERE id=$topicid",true);
    }
}

$id = isset($_GET['id']) && is_valid_id($_GET['id']) ? $_GET['id'] : 0;
$petr1=get_result("SELECT `bg`.`heading` FROM `{$TABLE_PREFIX}betoptions` `bo` LEFT JOIN `{$TABLE_PREFIX}betgames` `bg` ON `bo`.`gameid`=`bg`.`id` WHERE `bo`.`id`=".$id, true, $btit_settings["cache_duration"]);
$fied=$petr1[0];

$subject=$fied["heading"];

if(substr($FORUMLINK,0,3)=="smf")
{
    $res1=do_sqlquery("SELECT ".(($FORUMLINK=="smf")?"`ID_TOPIC`":"`id_topic`")." `id` FROM `{$db_prefix}messages` WHERE ".(($FORUMLINK=="smf")?"`ID_BOARD`":"`id_board`")."=$forumid AND `subject`=".sqlesc($subject),true);
    if(!@mysqli_num_rows($res1))
        $res1=do_sqlquery("SELECT (".(($FORUMLINK=="smf")?"`ID_TOPIC`":"`id_topic`")."+1) `id` FROM `{$db_prefix}topics` ORDER BY ".(($FORUMLINK=="smf")?"`ID_TOPIC`":"`id_topic`")." DESC LIMIT 1",true);
}
else
{
    $res1=do_sqlquery("SELECT `id` FROM `{$TABLE_PREFIX}topics` WHERE `forumid`=$forumid AND `subject`=".sqlesc($subject),true);
    if(!@mysqli_num_rows($res1))
        $res1=do_sqlquery("SELECT (`id`+1) `id` FROM `{$TABLE_PREFIX}topics` ORDER BY `id` DESC LIMIT 1",true);
}
if(!@mysqli_num_rows($res1))
    $res1=1;
else
{
    $row1=mysqli_fetch_assoc($res1);
    $res1 = (int) $row1['id'];
}
$forumlink = "[url]".$BASEURL."/index.php?page=forum&action=viewtopic&topicid=".$res1."[/url]";
//==End

$date = time();
$id = isset($_GET['id']) && is_valid_id($_GET['id']) ? $_GET['id'] : 0;
$a = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}betoptions WHERE id =".sqlesc($id),true);
$b = mysqli_fetch_array($a);
$gameid = $b['gameid'];
if($gameid < 1)
{
    header("location: $BASEURL/index.php?page=betfinish");
    exit;
}
$res3 = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}betgames WHERE id =".sqlesc($gameid)." AND fix = 0",true);
$o = @mysqli_fetch_array($res3);
$c = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}bets WHERE optionid =".sqlesc($id),true);
$totalstats = 0;

if(@mysqli_num_rows($res3) == 1)
{
    do_sqlquery("UPDATE {$TABLE_PREFIX}betgames SET fix = 1 WHERE id =".sqlesc($gameid),true);
    $betfintwotpl->set("pagetop", false, true);
}
else
    $betfintwotpl->set("pagetop", true, true);

while($d = mysqli_fetch_array($c))
{
    $dividend = round(($d['bonus']*$b['odds'])*0.97,0);
    if(mysqli_num_rows(do_sqlquery("SELECT * FROM {$TABLE_PREFIX}bettop WHERE userid =".sqlesc($d["userid"])."")) == 0)
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}bettop(userid, bonus) VALUES(".sqlesc($d["userid"]).", ".sqlesc($dividend-$d["bonus"]).")",true);
    else
        do_sqlquery("UPDATE {$TABLE_PREFIX}bettop SET bonus = bonus + ".sqlesc($dividend -$d["bonus"])." WHERE userid =".sqlesc($d["userid"]),true);

    $totalstats += $d['bonus'];
    $dividend = round(($d['bonus']*$b['odds'])*0.97,0);
    $subjectwin = $language["SB_BET_WIN"];
    $msg = $language["SB_BET_PROFIT"]." ".$dividend." ".strtolower($language["SB_POINTS"]);
    $msg2 = $language["SB_PM_MESS_1"] . " " . $dividend . " " . $language["SB_PM_MESS_2"] . " " . $d["bonus"] . " " . $language["SB_PM_MESS_3"] . " [i]" . $o["heading"] . "[/i]  " . $language["SB_PM_MESS_4"] .": [i]" . $b["text"] . "[/i] " . $language["SB_PM_MESS_5"] . " " . $b["odds"] . " " . $language["SB_PM_MESS_6"] . ((substr($FORUMLINK,0,3)=="smf" || $FORUMLINK=="ipb")?"[img]".$BASEURL."/images/smilies/yay.gif[/img]":":yay:") . $language["SB_PM_MESS_7"] . $forumlink . "\n";

    do_sqlquery("UPDATE {$TABLE_PREFIX}users set seedbonus = seedbonus + ".sqlesc($dividend)." WHERE id = ".sqlesc($d["userid"]),true);
    do_sqlquery("INSERT INTO {$TABLE_PREFIX}betlog(userid,msg,date,bonus) VALUES(".sqlesc($d["userid"]).", ".sqlesc($msg).", '$date', ".sqlesc($dividend).")",true);

    send_pm (0,$d['userid'], sqlesc($subjectwin), sqlesc($msg2));
    $totalstats += $dividend;
}

$q = do_sqlquery("SELECT COUNT(*) from {$TABLE_PREFIX}bets where gameid =".sqlesc($gameid),true);
$s = mysqli_fetch_array($q);

$body = "[b]".htmlspecialchars($o['heading'])."[/b] - [i]".htmlspecialchars($o['undertext'])."[/i]"."\n\n";
$body.= $language["SB_FOR_MESS_1"] . ": [b] ".htmlspecialchars($s[0])." [/b]"."\n";
$body.= $language["SB_FOR_MESS_2"] . ": [b] ".htmlspecialchars($totalstats)." points[/b]"."\n";
$body.= $language["SB_FOR_MESS_3"] . ": [b] ".htmlspecialchars($b['text'])." [/b]"."\n";
$body.= $language["SB_FOR_MESS_4"] . ": [b] ".htmlspecialchars($CURUSER['username'])." [/b]"."\n\n";
$body.= "[b]".$language["SB_FOR_MESS_5"].":[/b]"."\n";

$res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}betgames WHERE id =".sqlesc($gameid),true);
$a = mysqli_fetch_array($res);

if($a['sort']==0)
    $sort = "`odds` ASC";
elseif($a['sort']==1)
    $sort = "`id` ASC";
$res2 = do_sqlquery("SELECT * from {$TABLE_PREFIX}betoptions where gameid =".sqlesc($a["id"])." ORDER BY $sort",true);
while($b = mysqli_fetch_array($res2))
{
    $body.= " ".htmlspecialchars($b['text'])." X [b]".htmlspecialchars($b['odds'])."[/b]"."\n";
}

$m = do_sqlquery("SELECT `u`.`username`, `u`.`id`, `b`.`userid`, `b`.`bonus` FROM `{$TABLE_PREFIX}bets` `b` LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `b`.`userid` = `u`.`id` WHERE `b`.`optionid` =".sqlesc($id)." and `b`.`gameid` =".sqlesc($gameid)." ORDER BY `b`.`bonus` DESC LIMIT 20",true);
$body.= "\n"."[b]".$language["SB_FOR_MESS_6"].":[/b]"."\n";

$odda = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}betoptions WHERE id =".sqlesc($id),true);
$odds=mysqli_fetch_array($odda);

while($k = mysqli_fetch_array($m))
{
    $body .= "[b]+".round($k['bonus']*$odds['odds']*0.97,0)." ".$language["SB_FOR_MESS_7"]."[/b] ".$language["SB_FOR_MESS_8"]." [url=".$BASEURL."/".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated_user"]=="true")?$k["id"]."_".strtr($k["username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$k["id"])."]".$k["username"]. "[/url] ".$language["SB_FOR_MESS_9"]." ".htmlspecialchars($k['bonus'])." ".$language["SB_POINTS"] . "\n";
}

$m = do_sqlquery("SELECT `u`.`username`, `u`.`id`, `b`.`userid`, `b`.`bonus` FROM `{$TABLE_PREFIX}bets` `b` LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `b`.`userid` = `u`.`id` WHERE `b`.`optionid` <>".sqlesc($id)." and `b`.`gameid` =".sqlesc($gameid)." ORDER BY `b`.`bonus` ASC LIMIT 20",true);
$body.= "\n"."[b]".$language["SB_FOR_MESS_10"].":[/b]"."\n";
while($k = mysqli_fetch_array($m))
{
    $body .= "[url=".$BASEURL."/".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated_user"]=="true")?$k["id"]."_".strtr($k["username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$k["id"])."]".$k["username"]."[/url] [b]-".htmlspecialchars($k['bonus'])." ".$language["SB_POINTS"]."[/b]"."\n";
}

$body = sqlesc($body);
$subject = sqlesc($subject);

auto_bet($subject, $body);

$c = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}bets WHERE optionid <> $id AND gameid =".sqlesc($gameid),true);
while($a = mysqli_fetch_array($c))
{
    if(@mysqli_num_rows(do_sqlquery("SELECT * FROM {$TABLE_PREFIX}bettop WHERE userid =".sqlesc($a["userid"])."")) == 0)
    {
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}bettop(userid, bonus) VALUES(".sqlesc($a["userid"]).", -".sqlesc($a["bonus"]).")",true);
    }
    else
    {
        do_sqlquery("UPDATE {$TABLE_PREFIX}bettop SET bonus = bonus - ".sqlesc($a["bonus"])." WHERE userid =".sqlesc($a["userid"]),true);
    }
    $k = mysqli_fetch_array(do_sqlquery("SELECT * from {$TABLE_PREFIX}betgames where id =".sqlesc($gameid).""),true);
$msg3 = $language["SB_PM_MESS2_1"] . " [i]" . $k["heading"] . "[/i] " . $language["SB_PM_MESS2_2"] . ((substr($FORUMLINK,0,3)=="smf" || $FORUMLINK=="ipb")?"[img]".$BASEURL."/images/smilies/no.gif[/img]":":no:") . $language["SB_PM_MESS_7"] . $forumlink . "\n";

    $subjectloss = $language["SB_BET_LOSS"];
    send_pm (0,$a["userid"], sqlesc($subjectloss), sqlesc($msg3));
}

do_sqlquery("DELETE FROM {$TABLE_PREFIX}betgames WHERE id =".sqlesc($gameid),true);
do_sqlquery("DELETE FROM {$TABLE_PREFIX}betoptions WHERE gameid =".sqlesc($gameid),true);
do_sqlquery("DELETE FROM {$TABLE_PREFIX}bets WHERE gameid =".sqlesc($gameid),true);
header("location: $BASEURL/index.php?page=betfinish");

?>