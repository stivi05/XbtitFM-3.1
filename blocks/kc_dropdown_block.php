<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  Btiteam
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
// You can see there are plenty of extra spaces for more menu links,
// you will need to simply create a language setting for your links and then insert them into
// the menu, as I have below. (TreetopClimber)
//
////////////////////////////////////////////////////////////////////////////////////
require_once("include/functions.php");
dbconn();
global $CURUSER, $btit_settings, $language,$BASEURL, $db_prefix, $TABLE_PREFIX, $ipb_prefix;

$style=style_list();
$langue=language_list();

include(load_language("lang_usercp.php"));
include(load_language("lang_main.php"));
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html<tag:main_rtl /> xmlns='http://www.w3.org/1999/xhtml'>
<head>

</head>
<body>	
  <div id="toppanel">
   <div id="panel">
    <div class="content clearfix">
  <div class="left">
      <div id="content">
    </div>
  </div>    	
     <div class="left">
      <div id="content">   
       <ul class="vertical-list">
        <?php if ($CURUSER["view_users"]=="yes")
        { ?>
        <li><a href='index.php?page=usercp&uid=<?php echo $CURUSER["uid"] ?>' class='button'><?php echo $language["USER_CP"]; ?></a></li>
        <?php }?>

        <?php if ($CURUSER["view_users"]=="yes")
        { ?>        
        <li><a href='index.php?page=users' class='button'><?php echo $language["MNU_MEMBERS"]; ?></a></li>
        <?php }?>

        <?php if ($CURUSER["view_torrents"]=="yes")
        { ?>        
        <li><a href='index.php?page=extra-stats' class='button'><?php echo $language["MNU_STATS"]; ?></a></li>

        <li><a href='index.php?page=torrents' class='button'><?php echo $language["MNU_TORRENT"]; ?></a></li>
        
        <?php }?>

        <?php if ($CURUSER["view_forum"]=="yes")
        { ?>
        <li style="text-align:left" align="center" class='button'><?php 
        if ($GLOBALS["FORUMLINK"]=="" || $GLOBALS["FORUMLINK"]=="internal" || substr($GLOBALS["FORUMLINK"],0,3)=="smf" || $GLOBALS["FORUMLINK"]=="ipb")
        {
        if($btit_settings["fmhack_integrated_forum_display"]=="enabled" && (substr($GLOBALS["FORUMLINK"],0,3)=="smf" || $GLOBALS["FORUMLINK"]=="ipb"))
        {
        if($btit_settings["forum_viewtype"]!="iframe")
        $href=" href='".((substr($GLOBALS["FORUMLINK"],0,3)=="smf")?"smf":$GLOBALS["FORUMLINK"])."' target='".$btit_settings["forum_viewtype"]."'";
        else
        $href="href='index.php?page=forum'";
        }
        else
        $href="href='index.php?page=forum'";
        print("<a ".$href.">".$language["MNU_FORUM"]."");
        }
        else
        print("<a href=\"".((substr($GLOBALS["FORUMLINK"],0,3)=="smf")?"smf":$GLOBALS["FORUMLINK"])."\">".$language["MNU_FORUM"]."");
        ?></a></li>
        <?php }?>
           
        <?php if ($CURUSER["view_news"]=="yes")
        { ?>         
        <li><a href='index.php?page=viewnews' class='button'><?php echo $language["MNU_NEWS"]; ?></a></li>
        <?php }?>
          
        <?php if ($CURUSER["can_upload"]=="yes")
        { ?>
        <li><a href='index.php?page=upload' class='button'><?php echo $language["MNU_UPLOAD"]; ?></a></li>
        <?php }?>
        
        <?php if ($CURUSER["can_upload"]=="yes")
        if($btit_settings["fmhack_file_hosting"] == "enabled" && $CURUSER["uid"] > 1)
        { 	?>
        <li><a href='index.php?page=file_hosting' class='button'><?php echo $language["MNU_FHOST"]; ?></a></li>
        <?php }?>
            
        <?php if ($CURUSER["view_users"]=="yes")
        if($btit_settings["fmhack_torrent_request_and_vote"]=="enabled")
        { ?>
        <li><a href='index.php?page=viewrequests' class='button'><?php echo $language["VR"]; ?></a></li>
        <?php }?>
 
        <?php if($btit_settings["fmhack_rules_with_groups"]=="enabled")
        { ?>
        <li><a href='index.php?page=rules' class='button'><?php echo $language["MNU_RULES"]; ?></a></li>
        <?php }?>

        <?php if($btit_settings["fmhack_faq_with_groups"]=="enabled")
        { ?>
        <li><a href='index.php?page=faq' class='button'><?php echo $language["MNU_FAQ"]; ?></a></li>
        <?php }?>
           
      </ul>
    </div>
  </div>
  <div class="left">
    <div id="content">
        <ul class="vertical-list">
        <?php if($btit_settings["fmhack_subtitles"]=="enabled")
        {  require(load_language("lang_subs.php")); ?>
        <li><a href='index.php?page=subtitles' class='button'><?php echo $language["SUB_T_H"]; ?></a></li>
        <?php }?>

        <?php if($btit_settings["fmhack_sport_betting"]=="enabled")
        { if ($CURUSER["view_torrents"]=="yes") ?>
        <li><a href='index.php?page=bet' class='button'><?php echo $language["SB_BETTING"]; ?></a></li>
        <?php }?>

        <?php if($btit_settings["fmhack_user_images"]=="enabled")
        { ?>    
        <li><a href='index.php?page=user_img' class='button'><?php echo $language["UIMG_USR_IMGS"]; ?></a></li>
        <?php }?>
    
        <?php if($btit_settings["fmhack_helpdesk"]=="enabled")
        { ?>    
        <li><a href='index.php?page=modules&amp;module=helpdesk' class='button'><?php echo $language["HELPDESK"]; ?></a></li>
        <?php }?>
    
        <?php if($btit_settings["fmhack_donation_history"]=="enabled")
        { ?>            
        <li><a href='index.php?page=don_historie' class='button'><?php echo $language['DONATIONS']; ?></a></li>
        <?php }?>
    
        <?php if($btit_settings["fmhack_personal_notepad"]=="enabled")
        { ?>            
 	      <li><a href='index.php?page=notepad' class='button'><?php echo $language["NOTEPAD"]; ?></a></li>
        <?php }?>
 
        <?php if($btit_settings["fmhack_social_network"]=="enabled")
        { ?>
        <li><a href='index.php?page=friendlist&amp;uid=<?php $CURUSER["uid"] ?>' class='button'><?php echo $language["FL_FRIENDLIST"]; ?></a></li>
        <?php }?>
    
        <?php if($btit_settings["fmhack_gallery"] == "enabled" && gallery_in())
        { ?>
        <li><a href='javascript:gallery("gallery.php");' class='button'><?php echo $language['GALLERY']; ?></a></li>
        <?php }?>
    
        <?php if($btit_settings["fmhack_torrent_bookmark"]=="enabled")
        { ?>    
        <li><a href='index.php?page=bookmark&amp;uid=<?php $CURUSER["uid"] ?>' class='button'><?php echo $language["TB_FAV"]; ?></a></li>
        <?php }?>
    
        <?php if($btit_settings["fmhack_partners_page"]=="enabled") 
        { ?>
        <li><a href='index.php?page=partners' class='button'><?php echo$language["PARTNERS"]; ?></a></li>
        <?php }?>
        
        </ul>
    </div>
  </div>        	     
        <?php 
        include(load_language("lang_main.php"));
        include(load_language("lang_admin.php"));
        if ($CURUSER["admin_access"]=="yes")
        {  ?>
  <div class="left">
    <div id="content">
        <ul class="vertical-list">
        <li><a href='index.php?page=admin&amp;user=<?php echo $CURUSER["uid"]?>&amp;code=<?php echo $CURUSER["random"]?>' class='button'><?php echo $language["MNU_ADMINCP"] ?></a></li>
        
        <li><a href='index.php?page=admin&user=<?php echo $CURUSER["uid"]?>&amp;code=<?php  echo $CURUSER["random"]?>&do=config&action=read' class='button'><?php echo $language["TRACKER_SETTINGS"]; ?></a></li>
        
        <li><a href="javascript:announce('announcements.php');" class='button'><?php echo $language["MNU_ANNOUNCEMENT"] ?></a></li>
        
        <li><a href='index.php?page=admin&amp;user=<?php echo $CURUSER["uid"]?>&amp;code=<?php echo $CURUSER["random"] ?>&amp;do=groups&amp;action=read"' class='button'><?php echo $language["ACP_USER_GROUP"] ?></a></li>
        
        <li><a href='index.php?page=admin&amp;user=<?php echo $CURUSER["uid"]?>&amp;code=<?php echo $CURUSER["random"] ?>&amp;do=category&amp;action=read' class='button'><?php echo $language["ACP_CATEGORIES"] ?></a></li>
        
        <li><a href='index.php?page=admin&amp;user=<?php echo $CURUSER["uid"]?>&amp;code=<?php echo $CURUSER["random"] ?>&amp;do=hacks&amp;action=read' class='button'><?php echo $language["ACP_HACKS_CONFIG"] ?></a></li>
        
        <?php if($btit_settings["fmhack_anti_hit_and_run_system"]=="enabled")
        { ?>
        <li><a href='index.php?page=modules&amp;module=hitnrun_cleaner' class='button'><?php echo $language['MNU_HNR_Cleaner']; ?></a></li>
        <?php }?>
 
        <?php if($btit_settings["fmhack_chat_spy"]=="enabled")
        {  ?>
        <li><a href='index.php?page=modules&module=chatspy' class='button'><?php echo $language["MNU_CHATSPY"] ?></a></li>
        <?php }?>       
      </ul>
    </div>
  </div>  
  <!--<div class="left">
      <div id="content">
       <ul class="vertical-list">
       <li style="text-align:center;" align="center"></li>
       <li style="text-align:center;" align="center"></li>
       <li style="text-align:center;" align="center"></li>
       <li style="text-align:center;" align="center"></li>
       <li style="text-align:center;" align="center"></li>
       <li style="text-align:center;" align="center"></li>
       <li style="text-align:center;" align="center"></li>              
      </ul>
    </div>
  </div>-->
  <?php  } ?>
        <?php 
        if ($XBTT_USE)
      $res=get_result("select count(*) as tot, sum(f.seeds)+sum(ifnull(x.seeders,0)) as seeds, sum(f.leechers)+sum(ifnull(x.leechers,0)) as leechs  FROM {$TABLE_PREFIX}files f LEFT JOIN xbt_files x ON f.bin_hash=x.info_hash",true,$btit_settings['cache_duration']);
        else
       $res=get_result("select count(*) as tot, sum(seeds) as seeds, sum(leechers) as leechs  FROM {$TABLE_PREFIX}files",true,$btit_settings['cache_duration']);
   if ($res)
      {
      $row=$res[0];
      $torrents=$row["tot"];
      $seeds=0+$row["seeds"];
      $leechers=0+$row["leechs"];
      }
   else {
      $seeds=0;
      $leechers=0;
      $torrents=0;
      }

   $res=get_result("select count(*) as tot FROM {$TABLE_PREFIX}users where id>1",true,$btit_settings['cache_duration']);
   if ($res)
      {
      $row=$res[0];
      $users=$row["tot"];
      }
   else
       $users=0;

   if ($leechers>0)
      $percent=number_format(($seeds/$leechers)*100,0);
   else
       $percent=number_format($seeds*100,0);

   $peers=$seeds+$leechers;

   if ($XBTT_USE)
      $res=get_result("select sum(u.downloaded+x.downloaded) as dled, sum(u.uploaded+x.uploaded) as upld FROM {$TABLE_PREFIX}users u LEFT JOIN xbt_users x ON x.uid=u.id",true,$btit_settings['cache_duration']);
   else
      $res=get_result("select sum(downloaded) as dled, sum(uploaded) as upld FROM {$TABLE_PREFIX}users",true,$btit_settings['cache_duration']);
   $row=$res[0];
   $dled=0+$row["dled"];
   $upld=0+$row["upld"];
   $traffic=makesize($dled+$upld);
  ?>  
  <div class="left">  
    <center><img width=100 height=100 border=0 src="<?php echo ($CURUSER['avatar']!=''?$CURUSER['avatar']:'./avatar/default_avatar.gif') ?>" /></center>
    <center><?php echo $CURUSER["level"] ?></center>
    <div id="content">
       <ul class="vertical-list">       	
       <li style="text-align:left;" align="left"><?php echo $language["MEMBERS"]; ?>: <?php echo $users; ?></li>
       <li style="text-align:left;" align="left"><?php echo $language["TORRENTS"]; ?>: <?php echo $torrents; ?></li>
       <li style="text-align:left;" align="left"><?php echo $language["SEEDERS"]; ?>: <?php echo $seeds; ?></li>
       <li style="text-align:left;" align="left"><?php echo $language["LEECHERS"]; ?>: <?php echo $leechers; ?></li>
       <li style="text-align:left;" align="left"><?php echo $language["PEERS"]; ?>: <?php echo $peers; ?></li>
       <li style="text-align:left;" align="left"><?php echo $language["SEEDERS"]."/".$language["LEECHERS"]; ?>: <?php echo $percent."%"; ?></li>
       <li style="text-align:left;" align="left"><?php echo $language["TRAFFIC"]; ?>: <?php echo $traffic; ?></li>	
      </ul>
    </div>
    <br />
        <?php
        if (isset($CURUSER) && $CURUSER && $CURUSER["uid"]>1)
        {
        print("<form name=\"jump1\" action=\"index.php\" method=\"post\">");
        print("<table class=\"poller\" width=\"100%\" cellspacing=\"0\"><tr>");
        if($btit_settings["kc_dropdown_style"]!="disabled")
        {
        print("<td style=\"text-align:center;\"><select name=\"style\" size=\"1\" onchange=\"location=document.jump1.style.options[document.jump1.style.selectedIndex].value\">");
        foreach($style as $a)
        {
        print("<option ");
        if ($a["id"]==$CURUSER["style"])
            print("selected=\"selected\"");
        print(" value=\"account_change.php?style=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["style"]."</option>");
        }
        print("</select>");
        }
        ?>
        <?php if($btit_settings["kc_dropdown_language"]!="disabled")
        {
        print("<td style=\"text-align:center;\"><select name=\"langue\" size=\"1\" onchange=\"location=document.jump1.langue.options[document.jump1.langue.selectedIndex].value\">");
        foreach($langue as $a)
        {
        print("<option ");
        if ($a["id"]==$CURUSER["language"])
            print("selected=\"selected\"");
        print(" value=\"account_change.php?langue=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["language"]."</option>");
        }
        print("</select>");
        print("</td></tr>");
        }
        print("</table></form>");
        } ?>
        </div>  

</div>
</div>
<!-- The tab on top -->
<div class="tab">
  <ul class="login">
    <li class="left"></li>
    <li>
<li style="text-align:center;" align="center"><?php print("".$language["WELCOME_BACK"]."</b>&nbsp;--&nbsp;<a href=\"index.php?page=userdetails&id=".$CURUSER["uid"]."\">(&nbsp;" .(($btit_settings["fmhack_group_colours_overall"]=="enabled")?stripslashes($CURUSER["prefixcolor"].$CURUSER["username"].$CURUSER["suffixcolor"]):$CURUSER["username"]).(($btit_settings["fmhack_simple_donor_display"]=="enabled")?get_user_icons($CURUSER):"").(($btit_settings["fmhack_warning_system"]=="enabled")?warn($CURUSER):"")."&nbsp;)</a>"); ?>
</li>

<?php if($btit_settings["fmhack_anti_hit_and_run_system"]=="enabled")
{ ?>
<li style="text-align:center;" align="center">
    <?php $hnr=get_result("SELECT COUNT(*) `count` FROM ".(($XBTT_USE)?"`xbt_files_users`":"`{$TABLE_PREFIX}history`")." WHERE `hit`='yes' AND `uid`=".$CURUSER["uid"], true, $btit_settings["cache_duration"]);
    print("".$language["HNR_ABBREVIATION"].": ".$hnr[0]["count"].""); ?>
</li>
<?php } ?>

<li style="text-align:center;" align="center" class="green"><?php print("&uarr;&nbsp;".makesize($CURUSER['uploaded']));  ?>
</li>

<li style="text-align:center;" align="center" class="red"><?php print(">&darr;&nbsp;".makesize($CURUSER['downloaded'])); ?> 
</li>

<li style="text-align:center;" align="center" class="yellow"><?php print("&nbsp;(SR ".($CURUSER['downloaded']>0?number_format($CURUSER['uploaded']/$CURUSER['downloaded'],2):"---").")"); ?>
</li>

<?php if($btit_settings["fmhack_bonus_system"]=="enabled")
{ ?><li style="text-align:center;" align="center">
    <?php print("<a href=\"index.php?page=modules&module=seedbonus\">(BON ".($CURUSER['seedbonus']>0?number_format($CURUSER['seedbonus'],2):"---").")</a>"); ?>
    </li>
<?php } ?>
    
<?php if($btit_settings["fmhack_torrent_moderation"]=="enabled")
if ($CURUSER['moderate_trusted']=='yes')
{ ?><li style="text-align:center;" align="center">    
       <?php $res=get_result("SELECT COUNT(*) `count` FROM `{$TABLE_PREFIX}files` WHERE `moder`='um'", true, $btit_settings["cache_duration"]);
        $row = $res[0];
        $um_t = (int)$row["count"];
       print("<a href=\"index.php?page=moder\">".$language["MODERATE_PANEL"]."</a> (".$um_t.")"); ?>
    </li>
<?php } ?>

<li style="text-align:center;" align="center">
	<?php if(substr($GLOBALS["FORUMLINK"], 0, 3)=="smf")
          $resmail=get_result((($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"SELECT(":"")."SELECT `unread".(($GLOBALS["FORUMLINK"]=="smf")?"M":"_m")."essages` ".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"":"`ur`")." FROM {$db_prefix}members WHERE ".(($GLOBALS["FORUMLINK"]=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"].(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?") as `ur`, (SELECT COUNT(*) FROM {$TABLE_PREFIX}reports WHERE dealtwith=0) as `rep`":""),true,$btit_settings['cache_duration']);
      elseif($GLOBALS["FORUMLINK"]=="ipb")
          $resmail=get_result((($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"SELECT(":"")."SELECT `msg_count_new` ".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"":"`ur`")." FROM {$ipb_prefix}members WHERE member_id=".$CURUSER["ipb_fid"].(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?") as `ur`, (SELECT COUNT(*) FROM {$TABLE_PREFIX}reports WHERE dealtwith=0) as `rep`":""),true,$btit_settings['cache_duration']);
      else
          $resmail=get_result((($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"SELECT(":"")."SELECT COUNT(*) ".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?"":"`ur`")." FROM {$TABLE_PREFIX}messages WHERE readed='no' AND receiver=$CURUSER[uid]".(($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")?") as `ur`, (SELECT COUNT(*) FROM {$TABLE_PREFIX}reports WHERE dealtwith=0) as `rep`":""),true,$btit_settings['cache_duration']);
      if ($resmail && count($resmail)>0)
      {
          $mail=$resmail[0];
          if($btit_settings["fmhack_report_users_and_torrents"]=="enabled" && $CURUSER["edit_forum"]=="yes")          
                  print("<a href=\"index.php?page=reports\">".$language["REP_REPORTS"]."</a>".(($mail["rep"]>0)?" (<span style='color:#FF0000'><b>".$mail["rep"]."</b></span>)":"")."&nbsp;&nbsp;&nbsp;");
      // <-- Report users & Torrents by DiemThuy

     if ($mail['ur']>0)
       print("<a href=\"".($GLOBALS["FORUMLINK"]=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a>  <font color=\"#FF0000\"><b>(".$mail['ur'].")</b></font>");
    else
        print("<a href=\"".($GLOBALS["FORUMLINK"]=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a>");
   }
else
    print("<a href=\"".($GLOBALS["FORUMLINK"]=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."\">".$language["MAILBOX"]."</a>");
    ?>
</li>

<?php if($btit_settings["fmhack_invitation_system"]=="enabled")
global $INVITATIONSON;
{ ?>
	<li style="text-align:center;" align="center">
    <?php if($INVITATIONSON)
    {
        require(load_language("lang_usercp.php"));
        print("<a href=\"index.php?page=usercp&do=invite&action=read&uid=".$CURUSER["uid"]."\">".$language["INVITATIONS"]."</a> ".($CURUSER["invitations"]>0?"(".$CURUSER["invitations"].")":"" ).""); } ?>
    </li>
<?php } ?>
     
<?php if($btit_settings["fmhack_freeleech_slots"] == "enabled")
{ ?> 
<li style="text-align:center;" align="center"><?php	
    print("<div>".$language["FLS_SLOTS"].": ".$CURUSER["freeleech_slots"]."</div>"); ?>
</li>
<?php } ?>
     
<?php
	    if($btit_settings["fmhack_free_leech_with_happy_hour"]=="enabled")
{ ?>
<li style="text-align:center;" align="center">
	<?php        
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
        print("<font color='white'>".$col."".$till."".ucfirst($post)."</font>".(($img!="")?"&nbsp;&nbsp;&nbsp;".$img:"")."");  ?>
    </li>
    </li>
<?php  } ?>
    
<li style="text-align:center;" align="center"><a href='index.php'><?php echo $language["MNU_HOME"]; ?></a></li>
      
<li style="text-align:center;" align="center"><a href='logout.php'>(<?php echo $language["LOGOUT"]; ?>)</a></li> 
    
    <li id="toggle">
      <a id="open" class="open" href="#"><?php echo $language["OPEN_PANEL"]; ?></a>
      <a id="close" style="display: none;" class="close" href="#"><?php echo $language["CLOSE_PANEL"]; ?></a></li>
    <li class="right"></li>
  </ul>
</div> <!-- / top -->
</div> <!--panel -->
</body>
</html>