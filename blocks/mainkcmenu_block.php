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

global $CURUSER, $FORUMLINK, $db_prefix, $btit_settings, $language, $ipb_prefix, $XBTT_USE;

if($btit_settings["fmhack_invitation_system"]=="enabled")
    global $INVITATIONSON;

  if (isset($CURUSER) && $CURUSER && $CURUSER["uid"]>1)
  {
  print("<form name=\"jump1\" action=\"index.php\" method=\"post\">\n");
?>
<br>
<table class="lista" cellpadding="4" cellspacing="1" width="100%">
<tr>
<?php
$style=style_list();
$langue=language_list();

if($btit_settings["fmhack_torrent_moderation"]=="enabled")
{
    if($CURUSER['moderate_trusted']=='yes')
    {
        $res=get_result("SELECT COUNT(*) `count` FROM `{$TABLE_PREFIX}files` WHERE `moder`='um'", true, $btit_settings["cache_duration"]);
        $row = $res[0];
        $um_t = (int)$row["count"];
    }
}

if($btit_settings["fmhack_uploader_medals"]=="enabled")
{
$resuser=do_sqlquery("SELECT  reputation , up_med FROM {$TABLE_PREFIX}users WHERE id =".$CURUSER['uid']);
$rowuser= mysqli_fetch_array($resuser);
    // DT Uploader Medals
    if ($CURUSER["up_med"] == 0)
        $upr="";
    if ($CURUSER["up_med"] >= $btit_settings["UPB"])
        $upr="<img src='images/goblet/medaille_bronze.gif' alt='".$language["UM_BRONZE"]."' title='".$language["UM_BRONZE"]."' />";
    if ($CURUSER["up_med"] >= $btit_settings["UPS"])
        $upr="<img src='images/goblet/medaille_argent.gif' alt='".$language["UM_SILVER"]."' title='".$language["UM_SILVER"]."' />";
    if ($CURUSER["up_med"] >= $btit_settings["UPG"])
        $upr="<img src='images/goblet/medaille_or.gif' alt='".$language["UM_GOLD"]."' title='".$language["UM_GOLD"]."' />";
    // DT Uploader Medals
}
$my_img_list="";
if($btit_settings["fmhack_user_images"]=="enabled")
{
    $selected_images=explode(",", $CURUSER["user_images"]);
    $j=1;
    $image_count=0;
 
    foreach($btit_settings as $key => $value)
    {
        if(substr($key,0,9)=="user_img_")
        {
            $value_split=explode("[+]", $value);
            if(in_array($j, $selected_images))
            {
                $image_count++;
                $my_img_list.="&nbsp;<img src='images/user_images/".$value_split[0]."' alt='".$value_split[1]."' title='".$value_split[1]."' />";
            }
            $j++;
        }
    }
}

// DT reputation system start
    $res=do_sqlquery("SELECT `reputation` FROM `{$TABLE_PREFIX}users` WHERE `id`=".$CURUSER["uid"]);
    $row=mysqli_fetch_assoc($res);


$reput=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}reputation_settings WHERE id =1");
$setrep=mysqli_fetch_array($reput);

if ($setrep["rep_is_online"]== 'false')
{
//do nothing
}
else
{
if ($row["reputation"] == 0)
{
$rep="<img src='images/rep/reputation_balance.gif' alt='" . $setrep["no_level"] . "' title='" . $setrep["no_level"] . "' />";
}
if ($row["reputation"] >= 1 )
{
$rep="<img src='images/rep/reputation_pos.gif' alt='" . $setrep["good_level"] . "' title='" . $setrep["good_level"] . "' />";
}
if ($row["reputation"] <= -1)
{
$rep="<img src='images/rep/reputation_neg.gif' alt='" . $setrep["bad_level"] . "' title='" . $setrep["bad_level"] . "' />";
}
if ($row["reputation"] >= 101 )
{
$rep="<img src='images/rep/reputation_highpos.gif' alt='" . $setrep["best_level"] . "' title='" . $setrep["best_level"] . "' />";
}
if ($row["reputation"] <= -101)
{
$rep="<img src='images/rep/reputation_highneg.gif' alt='" . $setrep["worst_level"] . "' title='" . $setrep["worst_level"] . "' />";
}

// DT end reputation system
}
if($btit_settings["fmhack_anti_hit_and_run_system"]=="enabled")
{
    $hnr=get_result("SELECT COUNT(*) `count` FROM ".(($XBTT_USE)?"`xbt_files_users`":"`{$TABLE_PREFIX}history`")." WHERE `hit`='yes' AND `uid`=".$CURUSER["uid"], true, $btit_settings["cache_duration"]);
}

 print("<td class=\"lista\" align=\"left\" style=\"text-align:left; padding-left:17px; float:left;\"><b>".$language["WELCOME_BACK"]."<a href=\"index.php?page=userdetails&id=".$CURUSER["uid"]."\"></b>&nbsp;--&nbsp;(&nbsp;" .(($btit_settings["fmhack_group_colours_overall"]=="enabled")?stripslashes($CURUSER["prefixcolor"].$CURUSER["username"].$CURUSER["suffixcolor"]):$CURUSER["username"]).(($btit_settings["fmhack_simple_donor_display"]=="enabled")?get_user_icons($CURUSER):"").(($btit_settings["fmhack_warning_system"]=="enabled")?warn($CURUSER):"")."&nbsp;)</a></td>\n");   

print("<td class=\"lista\" style=\"padding-left:17px; float:left; text-align:left;\" align=\"left\"><b>".$language["USER_LEVEL"].":</b>&nbsp;&nbsp; ".(($btit_settings["fmhack_group_colours_overall"]=="enabled")?unesc($CURUSER["prefixcolor"].$CURUSER["level"].$CURUSER["suffixcolor"]):$CURUSER["level"]).$my_img_list.(($btit_settings["fmhack_uploader_medals"]=="enabled")?$upr:"")."</td>\n");
// DT reputation system start part 2
if ($setrep["rep_is_online"]== 'false')
{
//do nothing
}
else
{
print("<td class=\"lista\" style=\"padding-left:17px; float:left; text-align:left;\" align=\"left\"><a href=index.php?page=reputationpage  >&nbsp;".$language["REP"]."&nbsp;".$rep."</td>\n");
}
// end DT reputation system part2
print("<td class=\"green\" style=\"padding-left:40px; float:left;\" align=\"center\">&uarr;&nbsp;".makesize($CURUSER['uploaded']));
print("</td><td class=\"red\" style=\"padding-left:20px; float:left;\" align=\"center\">&darr;&nbsp;".makesize($CURUSER['downloaded']));
print("</td><td class=\"yellow\" style=\"padding-left:20px; float:left;\" align=\"center\">(SR ".($CURUSER['downloaded']>0?number_format($CURUSER['uploaded']/$CURUSER['downloaded'],2):"---").")</td>\n");

if($btit_settings["fmhack_user_images"]=="enabled")
    print("<td class=\"mainuser\" style=\"padding-right:10px;\" align=\"right\"><a class=\"mainuser\" href=\"index.php?page=user_img\">".$language["UIMG_USR_IMGS"]."</a></td>\n");
if($btit_settings["fmhack_helpdesk"]=="enabled")
    print("<td class=\"mainuser\" style=\"padding-right:10px;\" align=\"right\"><a class=\"mainuser\" href=\"index.php?page=modules&amp;module=helpdesk\">".$language["HELPDESK"]."</a></td>\n");
// Donation History by DiemThuy -->
if($btit_settings["fmhack_donation_history"]=="enabled")
    print("<td class=\"mainuser\" style=\"padding-right:10px;\" align=\"right\"><a class=\"mainuser\" href=\"index.php?page=don_historie\">".$language['DONATIONS']."</a></td>\n");
// <-- Donation History by DiemThuy
if($btit_settings["fmhack_bonus_system"]=="enabled")
{
    print("<td class=\"mainuser\" style=\"padding-right:10px;\" align=\"right\"><a class=\"mainuser\" href=\"index.php?page=modules&module=seedbonus\">(BON ".($CURUSER['seedbonus']>0?number_format($CURUSER['seedbonus'],2):"---").")</a></td>\n");
}
if($btit_settings["fmhack_anti_hit_and_run_system"]=="enabled")
{
    print("<td class=\"mainuser\" style=\"padding-right:10px;\" align=\"right\"><div class=\"mainuser\">".$language["HNR_ABBREVIATION"].": ".$hnr[0]["count"]."</div></td>\n");
}
if($btit_settings["fmhack_invitation_system"]=="enabled")
{
    if($INVITATIONSON)
    {
        require(load_language("lang_usercp.php"));
        print("<td class=\"mainuser\" style=\"padding-right:10px; float:right;\" align=\"right\"><a class=\"mainuser\" href=\"index.php?page=usercp&do=invite&action=read&uid=".$CURUSER["uid"]."\">".$language["INVITATIONS"]." ".($CURUSER["invitations"]>0?"(".$CURUSER["invitations"].")":"")."</a></td></tr></table>\n");
    }
}

    print("<table class=\"lista\" border=\"0\" width=\"100%\" cellpadding=\"4\" cellspacing=\"1\"><tr>\n");

if($btit_settings["fmhack_torrent_moderation"]=="enabled")
{
    if ($CURUSER['moderate_trusted']=='yes')
        print("<td class=\"mainuser\" align=\"left\" style=\"text-align:left; padding-top:12px; padding-left:20px; float:left;\"><a class=\"mainuser\" href=\"index.php?page=moder\">".$language["MODERATE_PANEL"]."</a> (".$um_t.")</td>");
}

if ($CURUSER["admin_access"]=="yes")
{
   print("<td class=\"mainuser\" style=\"padding-left:20px; padding-top:12px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."\">".$language["MNU_ADMINCP"]."</a></td>\n");
if($btit_settings["fmhack_anti_hit_and_run_system"]=="enabled")
{   
   print("<td class=\"mainuser\" style=\"padding-left:20px; padding-top:12px; float:left;\" align=\"center\"><a class=\"mainuser\"  href=\"index.php?page=modules&amp;module=hitnrun_cleaner \">".$language['MNU_HNR_Cleaner']."</a></td>\n");
}
if($btit_settings["fmhack_chat_spy"]=="enabled")
{     
   print("<td class=\"mainuser\" style=\"padding-left:20px; padding-top:12px; float:left;\" align=\"center\"><a class=\"mainuser\"  href=\"index.php?page=modules&module=chatspy \">".$language['MNU_CHATSPY']."</a></td>\n");
}   
   print("<td class=\"mainuser\" style=\"padding-left:20px; padding-top:12px; float:left;\" align=\"center\"><a href=\"javascript:announce('announcements.php');\">".$language['MNU_ANNOUNCEMENT']."</a></td>\n");
}
print("<td class=\"mainuser\" style=\"padding-left:20px; padding-top:12px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."\">".$language["USER_CP"]."</a></td>\n");
if($btit_settings["fmhack_personal_notepad"]=="enabled")
{
print("<td class=\"mainuser\" style=\"padding-left:20px; padding-top:12px; float:left;\" align=\"center\"><a href=\"index.php?page=notepad\">".$language["NOTEPAD"]."</a></td>\n");
}
      // Report users & Torrents by DiemThuy -->
      if(substr($FORUMLINK, 0, 3)=="smf")
          $resmail=get_result((($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"SELECT(":"")."SELECT `unread".(($FORUMLINK=="smf")?"M":"_m")."essages` ".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"":"`ur`")." FROM {$db_prefix}members WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"].(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?") as `ur`, (SELECT COUNT(*) FROM {$TABLE_PREFIX}reports WHERE dealtwith=0) as `rep`":""),true,$btit_settings['cache_duration']);
      elseif($FORUMLINK=="ipb")
          $resmail=get_result((($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"SELECT(":"")."SELECT `msg_count_new` ".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"":"`ur`")." FROM {$ipb_prefix}members WHERE member_id=".$CURUSER["ipb_fid"].(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?") as `ur`, (SELECT COUNT(*) FROM {$TABLE_PREFIX}reports WHERE dealtwith=0) as `rep`":""),true,$btit_settings['cache_duration']);
      else
          $resmail=get_result((($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"SELECT(":"")."SELECT COUNT(*) ".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"":"`ur`")." FROM {$TABLE_PREFIX}messages WHERE readed='no' AND receiver=$CURUSER[uid]".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?") as `ur`, (SELECT COUNT(*) FROM {$TABLE_PREFIX}reports WHERE dealtwith=0) as `rep`":""),true,$btit_settings['cache_duration']);
      if ($resmail && count($resmail)>0)
      {
          $mail=$resmail[0];
          if($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")          
                  print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=reports\">".$language["REP_REPORTS"]."</a>".(($mail["rep"]>0)?" (<span style='color:#FF0000'><b>".$mail["rep"]."</b></span>)":"")."</td>\n");
      // <-- Report users & Torrents by DiemThuy

     if ($mail['ur']>0)
       print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a>  (<font color=\"#FF0000\"><b>".$mail['ur']."</b></font>)</td>\n");
    else
        print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a></td>\n");
   }
else
    print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a></td>\n");

   if($btit_settings["fmhack_social_network"]=="enabled")
    {
   //social network
    print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=friendlist&amp;uid=".$CURUSER["uid"]."\">".$language["FL_FRIENDLIST"]."</a></td>\n");
   //end social network
    }
    if($btit_settings["fmhack_gallery"] == "enabled" && gallery_in())
    {
        print ("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:10px; float:left;\" align=\"center\"><a class=\"mainuser\" href='javascript:gallery(\"gallery.php\");'>".$language['GALLERY']."</a></td>\n");
    }
				
if($btit_settings["fmhack_torrent_bookmark"]=="enabled")
{
    //Bookmark
    print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:10px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=bookmark&amp;uid=".$CURUSER["uid"]."\">".$language["TB_FAV"]."</a></td>\n");
    //end Bookmark
}
 print("</tr></table>\n");

 print("<table class=\"lista\" border=\"0\" width=\"100%\" cellpadding=\"4\" cellspacing=\"1\"><tr>\n");

   if($btit_settings["fmhack_partners_page"]=="enabled")
    {
        print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=partners\">".$language["PARTNERS"]."</a></td>\n");
    }
   if($btit_settings["fmhack_teams"]=="enabled" && $btit_settings["team_state"]=="public")
    {
        require_once(load_language("lang_teams.php"));
        print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=teams\">".$language["TEAMS_MENU"]."</a></td>\n");
    }

if($btit_settings["fmhack_shoutcast_stats_and_DJ_application"]=="enabled")
{
    $djuser=get_result("SELECT `active`, `uid` FROM `{$TABLE_PREFIX}shoutcastdj` WHERE `uid`=".$CURUSER["uid"],true,$btit_settings["cache_duration"]);
    $rowdj=$djuser[0];
    if ($rowdj["active"]=="1")
        print("</td><td class=\"mainuser\" style=\"text-align:center; padding-left:20px; float:left;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=dj&do=manage\">".$language["DJ_SETTINGS"]."</a></td>");
}
if($btit_settings["fmhack_freeleech_slots"] == "enabled")
{
    print("<td class=\"mainuser\" style=\"text-align:center; padding-top:12px; padding-left:20px; float:left;\" align=\"center\"><div class=\"mainuser\">".$language["FLS_SLOTS"].": ".$CURUSER["freeleech_slots"]."</div></td>\n");
}
	// freeleech hack
   if($btit_settings["fmhack_free_leech_with_happy_hour"]=="enabled")
    {
 
        
        $query = get_result("SELECT free, happy_hour, happy, UNIX_TIMESTAMP(`free_expire_date`) AS `timestamp` FROM `{$TABLE_PREFIX}files` WHERE `external`='no' LIMIT 1",true,$btit_settings["cache_interval"]);
        $row = $query[0];

        if(($row["free"]=="no" AND $row["happy_hour"] =="no") || (@mysqli_num_rows($query)==0))
        {
            $freec="blue";
            $till='';
            $col=$language['FL_FREE_LEECH'];
            $post=' '.$language['FL_NOT_TODAY'];
            $img='';
        }
        if ($row["happy"]=="no" AND $row["happy_hour"] =="yes" )
        {
            $happy1= get_result("SELECT UNIX_TIMESTAMP(`value_s`) AS `timestampp` FROM `{$TABLE_PREFIX}avps` WHERE `arg`='happyhour'",true,$btit_settings["cache_interval"]);
            $happy2 = $happy1[0];

            $freec="yellow";
            $till='';
            $col='';
            $post=$language['FL_START_TIME'].' '.date("l jS F Y \a\\t g:i a",$happy2["timestampp"]);
            $img='';
        }
        if($row["happy"]=="yes")
        {
            $freec="green";
            $till='';
            $col='';
            $post=$language['FL_ITS_HH'];
            $img ='<img src="images/proost.jpg" alt="'.$language['FL_FREE_LEECH'].'"/>';
        }
        if($row["free"]=="yes")
        {
            $freec="green";
            $till=' '.$language['FL_TO'].' ';
            $col=$language['FL_FREE_LEECH'];
            $post=date("l jS F Y \a\\t g:i a",$row["timestamp"]);
            $img='';
        }
        print("<td class=\"mainuser\" align=\"left\" style=\"text-align:left; padding-top:12px; padding-left:20px; float:left; font-style:italic; font-family: Verdana, Arial, Helvetica, sans-serif;\"><font color='$freec'>".$col."".$till."".ucfirst($post)."</font>".(($img!="")?"&nbsp;&nbsp;&nbsp;".$img:"")."</td>\n");
    }
   
# treetopclimber edit
print("\n<td valign=\"top\"><table style=\"padding-right:20px; float:right;\"><tr>\n");
if($btit_settings["usertoolbar_style"]!="disabled")
{
    print("\n<td style=\"text-align:center;\"><select name=\"style\" size=\"1\" onchange=\"location=document.jump1.style.options[document.jump1.style.selectedIndex].value\">");
    foreach($style as $a)
    {
        print("<option ");
        if ($a["id"]==$CURUSER["style"])
            print("selected=\"selected\"");
        print(" value=\"account_change.php?style=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["style"]."</option>");
    }
    print("</select></td>");
}
if($btit_settings["usertoolbar_language"]!="disabled")
{
    print("\n<td style=\"text-align:center;\"><select name=\"langue\" size=\"1\" onchange=\"location=document.jump1.langue.options[document.jump1.langue.selectedIndex].value\">");
    foreach($langue as $a)
    {
        print("<option ");
        if ($a["id"]==$CURUSER["language"])
            print("selected=\"selected\"");
        print(" value=\"account_change.php?langue=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["language"]."</option>");
    }
    print("</select></td>");
}
 print("</tr></table></td>\n");
?>
</tr>
</table>
</form>
<?php
}
else
    {
   
    session_start();
    $_SESSION=array();
    setcookie("xbtitFM", "", time()-3600, "/");
    session_destroy();
    unset($_SESSION["xbtitFM"]);
require_once(load_language("lang_apply_membership.php"));
    if (!isset($user)) $user = '';
    ?>
    <form action="index.php?page=login" name="login" method="post">
    <table class="lista" border="0" width="100%" cellpadding="4" cellspacing="1">
    <tr>
    <td class="lista" align="left">
      <table border="0" cellpadding="0" cellspacing="0">
      <tr>
      <td class="lista" style="text-align:left; padding-left:17px;"><?php echo $language["USER_NAME"]?>:&nbsp;</td>
      <td class="lista"><input type="text" size="15" name="uid" value="<?php $user ?>" maxlength="40" style="font-size:10px" />&nbsp;&nbsp;</td>
      <td class="lista" style="text-align:left; padding-left:17px;"><?php echo $language["USER_PWD"]?>:&nbsp;</td>
      <td class="lista"><input type="password" size="15" name="pwd" maxlength="40" style="font-size:10px" />&nbsp;&nbsp;</td>
      <td class="lista" align="center"><input type="submit" value="<?php echo $language["FRM_LOGIN"]?>" style="font-size:10px" /></td>
      </tr>
      </table>
      
    </td>   
<?php
if ($btit_settings["fmhack_user_signup_agreement"]== enabled)
{
     print("<td class=\"lista\" style=\"text-align:center;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=agree\">".$language["ACCOUNT_CREATE"]."</a></td>\n");
     }
     else
     {
if ($btit_settings["fmhack_apply_for_membership"]== enabled)
{
     print("<td class=\"lista\" style=\"text-align:center;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=apply \">".$language["APPLY_MEMBERSHIP"]."</a></td>\n");	

     }
     else
     {
     print("<td class=\"lista\" style=\"text-align:center;\" align=\"center\"><a class=\"mainuser\" href=\"index.php?page=account\">".$language["ACCOUNT_CREATE"]."</a></td>\n");
     } 
     }

?>
    <td class="lista" align="center"><a class="mainuser" href="index.php?page=recover"><?php echo $language["RECOVER_PWD"]?></a></td>
    </tr>
    </table>
    </form>


    <?php
}

?>