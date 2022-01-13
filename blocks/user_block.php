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

global $CURUSER, $user, $USERLANG, $FORUMLINK, $db_prefix, $btit_settings, $ipb_prefix;

require_once(load_language("lang_account.php"));

         if (!$CURUSER || $CURUSER["id"]==1)
            {
            // guest-anonymous, login require
            ?>
            <form action="index.php?page=login" name="login" method="post">
            <table class="lista" border="0" align="center" width="100%">
            <tr><td style="text-align:center;" align="center" class="poller"><?php echo $language["USER_NAME"]?>:</td></tr><tr><td class="poller" style="text-align:center;" align="center"><input type="text" size="9" name="uid" value="<?php $user ?>" maxlength="40" /></td></tr>
            <tr><td style="text-align:center;" align="center" class="poller"><?php echo $language["USER_PWD"]?>:</td></tr><tr><td class="poller" style="text-align:center;" align="center"><input type="password" size="9" name="pwd" maxlength="40" /></td></tr>
            <tr><td colspan="2" class="poller" style="text-align:center;" align="center"><input type="submit" value="<?php echo $language["FRM_LOGIN"]?>" /></td></tr>
            <tr><td class="lista" style="text-align:center;" align="center"><a class="user" href="index.php?page=signup"><?php echo $language["ACCOUNT_CREATE"]?></a></td></tr><tr><td class="lista" style="text-align:center;" align="center"><a class="user" href="index.php?page=recover"><?php echo $language["RECOVER_PWD"]?></a></td></tr>
            </table>
            </form>
            <?php
            }
         else
             {
             // user information
             $style=style_list();
             $langue=language_list();

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

             print("\n<form name=\"jump\" method=\"post\" action=\"index.php\">\n<table class=\"poller\" width=\"100%\" cellspacing=\"0\">\n<tr><td align=\"center\">".$language["USER_NAME"].":  " .unesc((($btit_settings["fmhack_group_colours_overall"]=="enabled")?$CURUSER["prefixcolor"].$CURUSER["username"].immunity($CURUSER).$CURUSER["suffixcolor"]:$CURUSER["username"]).(($btit_settings["fmhack_simple_donor_display"]=="enabled")?get_user_icons($CURUSER):"").(($btit_settings["fmhack_warning_system"]=="enabled")?warn($CURUSER):""))."</td></tr>\n");
             print("<tr><td align=\"center\">".$language["USER_LEVEL"].": ".(($btit_settings["fmhack_group_colours_overall"]=="enabled")?unesc($CURUSER["prefixcolor"].$CURUSER["level"].$CURUSER["suffixcolor"]):$CURUSER["level"]).$my_img_list.(($btit_settings["fmhack_account_parked"]=="enabled" && $CURUSER["parked"]=="yes")?" ".$language["PARK_PARKED"]:"")."</td></tr>\n");
if($btit_settings["fmhack_reputation_system"]=="enabled")
{
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
print("<tr><td align=\"center\">Reputation: ".$rep."</td></tr>\n");
}
// DT end reputation system
}
if($btit_settings["fmhack_uploader_medals"]=="enabled")
{
    // DT Uploader Medals
    if ($CURUSER["up_med"] >= $btit_settings["UPB"])
        $up_med="<tr><td align=\"center\"><center>".$language["UM_UPL_MED"].": <img src='images/goblet/medaille_bronze.gif' alt='".$language["UM_BRONZE"]."' title='".$language["UM_BRONZE"]."' /></center></tr></td>";
    if ($CURUSER["up_med"] >= $btit_settings["UPS"])
        $up_med="<tr><td align=\"center\"><center>".$language["UM_UPL_MED"].": <img src='images/goblet/medaille_argent.gif' alt='".$language["UM_SILVER"]."' title='".$language["UM_SILVER"]."' /></center></tr></td>";
    if ($CURUSER["up_med"] >= $btit_settings["UPG"])
        $up_med="<tr><td align=\"center\"><center>".$language["UM_UPL_MED"].": <img src='images/goblet/medaille_or.gif' alt='".$language["UM_GOLD"]."' title='".$language["UM_GOLD"]."' /></center></tr></td>";

    print($up_med);
    // DT Uploader Medals
}

if($btit_settings["fmhack_warning_system"]=="enabled")
{
    $stage4=$btit_settings["warn_max"];
    $stage3=round($btit_settings["warn_max"]*0.75);
    $stage2=round($btit_settings["warn_max"]*0.5);
    $stage1=round($btit_settings["warn_max"]*0.25);
    $stage0=0;

    if($CURUSER["warn_lev"] >= $stage4)
        $wl="<a class='user' href='index.php?page=warnlog&id=".$CURUSER["uid"]."'><img src='images/warned/warn_max.png' alt='".$CURUSER["warn_lev"]."/".$stage4."' title='".$CURUSER["warn_lev"]."/".$stage4."' /></a>";
    elseif($CURUSER["warn_lev"] >= $stage3)
        $wl="<a class='user' href='index.php?page=warnlog&id=".$CURUSER["uid"]."'><img src='images/warned/warn_3.png' alt='".$CURUSER["warn_lev"]."/".$stage4."' title='".$CURUSER["warn_lev"]."/".$stage4."' /></a>";
    elseif($CURUSER["warn_lev"] >= $stage2)
        $wl="<a class='user' href='index.php?page=warnlog&id=".$CURUSER["uid"]."'><img src='images/warned/warn_2.png' alt='".$CURUSER["warn_lev"]."/".$stage4."' title='".$CURUSER["warn_lev"]."/".$stage4."' /></a>";
    elseif($CURUSER["warn_lev"] >= $stage1)
        $wl="<a class='user' href='index.php?page=warnlog&id=".$CURUSER["uid"]."'><img src='images/warned/warn_1.png' alt='".$CURUSER["warn_lev"]."/".$stage4."' title='".$CURUSER["warn_lev"]."/".$stage4."' /></a>";
    else
        $wl="<img src='images/warned/warn_0.png' alt='".$CURUSER["warn_lev"]."/".$stage4."' title='".$CURUSER["warn_lev"]."/".$stage4."' />";

    print("<tr><td align='center'>$wl</td></tr>");
}
             if(substr($FORUMLINK,0,3)=="smf")
                 $resmail=get_result("SELECT `unread".(($FORUMLINK=="smf")?"M":"_m")."essages` `ur` FROM `{$db_prefix}members` WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"],true,$btit_settings['cache_duration']);
             elseif($FORUMLINK=="ipb")
                 $resmail=get_result("SELECT `msg_count_new` `ur` FROM `{$ipb_prefix}members` WHERE `member_id`=".$CURUSER["ipb_fid"],true,$btit_settings['cache_duration']);
             else
                 $resmail=get_result("SELECT COUNT(*) `ur` FROM `{$TABLE_PREFIX}messages` WHERE `readed`='no' AND `receiver`=".$CURUSER["uid"],true,$btit_settings['cache_duration']);
             if ($resmail && count($resmail)>0)
                {
                 $mail=$resmail[0];
                 if ($mail['ur']>0)
                    print("<tr><td align=\"center\"><a class=\"user\" href=\"".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a>  (<font color=\"#FF0000\"><b>".$mail['ur']."</b></font>)</td></tr>\n");
                 else
                     print("<tr><td align=\"center\"><a class=\"user\" href=\"".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a></td></tr>\n");
                }
             else
                 print("<tr><td align=\"center\">".$language["NO_MAIL"]."</td></tr>");
             print("<tr><td align=\"center\">");
             include("include/offset.php");
             print($language["USER_LASTACCESS"].":<br />".date("d/m/Y H:i:s",$CURUSER["lastconnect"]-$offset));
             print("</td></tr>\n");
             if($btit_settings["userinfo_style"]!="disabled")
             {
                 print("<tr><td align=\"center\">");
                 print($language["USER_STYLE"].":<br />\n<select name=\"style\" size=\"1\" onchange=\"location=document.jump.style.options[document.jump.style.selectedIndex].value\">");
                 foreach($style as $a)
                 {
                     print("<option ");
                     if ($a["id"]==$CURUSER["style"])
                         print("selected=\"selected\"");
                     print(" value=\"account_change.php?style=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["style"]."</option>");
                }
                print("</select>");
                print("</td>\n</tr>\n");
             }
             if($btit_settings["userinfo_language"]!="disabled")
             {
                 print("<tr><td align=\"center\">");
                 print($language["USER_LANGUE"].":<br />\n<select name=\"langue\" size=\"1\" onchange=\"location=document.jump.langue.options[document.jump.langue.selectedIndex].value\">");
                 foreach($langue as $a)
                 {
                     print("<option ");
                     if ($a["id"]==$CURUSER["language"])
                         print("selected=\"selected\"");
                     print(" value=\"account_change.php?langue=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["language"]."</option>");
                 }
                 print("</select>");
                 print("</td>\n</tr>\n");
             }
             print("\n<tr><td align=\"center\"><a class=\"user\" href=\"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."\">".$language["USER_CP"]."</a></td></tr>\n");
             if ($CURUSER["admin_access"]=="yes")
                print("\n<tr><td align=\"center\"><a class=\"user\" href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."\">".$language["MNU_ADMINCP"]."</a></td></tr>\n");

             print("</table>\n</form>");
             }

?>