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
// You can see there are plenty of extra spaces for more menu links,
// you will need to simply create a language setting for your links and then insert them into
// the menu, as I have below. (TreetopClimber)
//
////////////////////////////////////////////////////////////////////////////////////
global $CURUSER, $btit_settings, $language;
print ("<div id='menu'>\n<ul class='level1'>");
/* start torrent menu */
if($CURUSER["view_torrents"] == "yes")
{
    print ("<li class='level1-li'><a class='level1-a drop' href='#'>".$language['TORRENT_MENU']."</a>\n");
    print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
    print ("<ul class='level2'>\n");
/* start treetopclimber edits for torrent menus */	
		    if($btit_settings["fmhack_archive_torrents"]=="enabled")
    {
        if($CURUSER["view_new"]=="yes" || $CURUSER["view_arc"]=="yes")
        {
            print ("<li><a class='fly' href='#'>".$language["MNU_TORRENT"]."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level3'>\n");
            if($CURUSER["view_new"]=="yes")
                print ("<li><a href='index.php?page=torrents&search=&category=0&active=0'>".$language["ALL"]." (".$language["ARC_NEW"].")</a></li>\n");
            if($CURUSER["view_arc"]=="yes")
                print ("<li><a href='index.php?page=torrents&search=&category=0&active=3'>".$language["ALL"]." (".$language["ARC_ARC"].")</a></li>\n");
            if($CURUSER["view_new"]=="yes")
                print ("<li><a href='index.php?page=torrents&search=&category=0&active=1'>".$language["ACTIVE_ONLY"]." (".$language["ARC_NEW"].")</a></li>\n");
            if($CURUSER["view_arc"]=="yes")
                print ("<li><a href='index.php?page=torrents&search=&category=0&active=4'>".$language["ACTIVE_ONLY"]." (".$language["ARC_ARC"].")</a></li>\n");
            if($CURUSER["view_new"]=="yes")
                print ("<li><a href='index.php?page=torrents&search=&category=0&active=2'>".$language["DEAD_ONLY"]." (".$language["ARC_NEW"].")</a></li>\n");
            if($CURUSER["view_arc"]=="yes")
                print ("<li><a href='index.php?page=torrents&search=&category=0&active=5'>".$language["DEAD_ONLY"]." (".$language["ARC_ARC"].")</a></li>\n");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
        }
    }
    else
    {
        print ("<li><a class='fly' href='#'>".$language["MNU_TORRENT"]."</a>\n");
        print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
        print ("<ul class='level3'>\n");
				
if($CURUSER["can_upload"] == "yes")
{
    if($btit_settings["fmhack_archive_torrents"]=="enabled")
    {
        if($CURUSER["up_new"]=="yes" || $CURUSER["up_arc"]=="yes")
        {
            print ("<li><a class='fly' href='#'>".$language['UPLOAD_LINK']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=upload'>".$language["MNU_UPLOAD"]."</a></li>\n");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
        }
    }
    else
    {
        print ("<li><a class='fly' href='#'>".$language['UPLOAD_LINK']."</a>\n");
        print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
        print ("<ul class='level4'>\n");
        print ("<li><a href='index.php?page=upload'>".$language["MNU_UPLOAD"]."</a></li>\n");
        if($CURUSER["admin_access"] == "yes")
         { 
        if($btit_settings["fmhack_whitelist_users_and_groups"]=="enabled")
        print("<li><a href=\"index.php?page=modules&module=exclusive_groups\">".$language["EXCLUSIVE_GROUPS"]."</a></li>\n");  
         }     
        print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
    }
		
}
        print ("<li><a href='index.php?page=torrents&search=&category=0&active=0'>".$language["ALL"]."</a></li>\n");
        print ("<li><a href='index.php?page=torrents&search=&category=0&active=1'>".$language["ACTIVE_ONLY"]."</a></li>\n");
        print ("<li><a href='index.php?page=torrents&search=&category=0&active=2'>".$language["DEAD_ONLY"]."</a></li>\n");
		    

if($btit_settings["fmhack_torrent_request_and_vote"] == "enabled" && $CURUSER["uid"] > 1)
    {
        print ("<li><a href='index.php?page=viewrequests'>".$language["VR"]."</a></li>\n");
    }
if($btit_settings["fmhack_torrent_bookmark"] == "enabled" && $CURUSER["uid"] > 1)
    {
        //Bookmark
        print ("<li><a href=\"index.php?page=bookmark&amp;uid=".$CURUSER["uid"]."\">".$language["TB_FAV"]."</a></li>\n");
        //end Bookmark
    }
        print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
    }
	

/* end treetopclimber edits for torrent menus */

    print ("<li><a href='index.php?page=extra-stats'>".$language["MNU_STATS"]."</a></li>\n");
		if($btit_settings["fmhack_subtitles"] == "enabled" && $CURUSER["uid"] > 1)
    {
        require (load_language("lang_subs.php"));
        print ("<li><a href='index.php?page=subtitles'>".$language["SUB_T_H"]."</a></li>\n");
    }
    if($btit_settings["fmhack_partners_page"] == "enabled")
    {
        print ("<li><a href=\"index.php?page=partners\">".$language["PARTNERS"]."</a></li>\n");
    }
		
}
if($CURUSER["view_torrents"] == "yes" || $CURUSER["can_upload"] == "yes")
{
   print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
}
if($btit_settings["nzb"]=="enabled")
{
//nzb   
if ($btit_settings["nzb"]==true AND $CURUSER["view_torrents"]=="yes") 
{
    print("<li class='level1-li'><a class='level1-a drop' href='#'>".$language["NZB_MENU"]."</a>\n");
    print("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
    print("<ul class='level2'>\n");
 
    print("<li><a class='fly' href='#'>".$language["NZB"]."</a>\n");
    print("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
    print("<ul class='level3'>\n");
                
if ($CURUSER["can_upload"]=="yes")                
   {
    print("<li><a class='fly' href='#'>".$language['UPLOAD_NZB']."</a>\n");
    print("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
    print("<ul class='level4'>\n");
    print("<li><a href='index.php?page=nzbupload'>".$language["MNU_UPLOAD"]."</a></li>\n");
if($CURUSER["admin_access"] == "yes")
         { 
if($btit_settings["fmhack_whitelist_users_and_groups"]=="enabled")
    print("<li><a href=\"index.php?page=modules&module=exclusive_groups\">".$language["EXCLUSIVE_GROUPS"]."</a></li>\n");      }     
    print("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");   
         }
 
    print("<li><a href='index.php?page=nzb&search=&category=0&active=0'>".$language["NZB"]."</a></li>\n");


    print("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
  
if($CURUSER["view_torrents"]=="yes" || $CURUSER["can_upload"]=="yes")
{
    print("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
}
}

//nzb 
}  
/* end torrent menu */
print ("<li class='level1-li'><a href='index.php'>".$language["MNU_HOME"]."</a></li>\n");
if($CURUSER["uid"] == 1 || !$CURUSER)
{
    print ("<li class='level1-li'><a href='index.php?page=login'>".$language["LOGIN"]."</a></li>\n");
}
else
{
    print ("<li class='level1-li'><a href='logout.php'>".$language["LOGOUT"]."</a></li>\n");
}

# start user menu 
				
if($CURUSER["id_level"]>=3)
{
    
		print ("<li class='level1-li left'><a class='level1-a drop' href='#'>".$language['USER_MENU']."</a>\n");
    print ("<!--[if lte IE 6]><table><tr><td><![endif]-->\n");
    print ("<ul class='level2'>\n");
						
# User links panel
 
if($CURUSER["view_users"] == "yes")
 {
        print ("<li><a class='fly' href='#'>".$language['USER_LINKS']."</a>\n");
        print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
        print ("<ul class='level3'>\n");

		if($btit_settings["fmhack_rules_with_groups"] == "enabled" && $CURUSER["uid"] > 1)
     {
        print ("<li><a href='index.php?page=rules'>".$language["MNU_RULES"]."</a></li>\n");
     }
		if($btit_settings["fmhack_faq_with_groups"] == "enabled" && $CURUSER["uid"] > 1)
     {
        print ("<li><a href='index.php?page=faq'>".$language["MNU_FAQ"]."</a></li>\n");
     }		
    if($CURUSER["view_users"] == "yes")
    {
        print ("<li><a href='index.php?page=users'>".$language["MNU_MEMBERS"]."</a></li>\n");      if($btit_settings["fmhack_staff_page"]=="enabled")
         {  
        print ("<li><a href='index.php?page=modules&module=staff'>".$language["MNU_STAFF_PAGE"]."</a></li>\n");
         }
    }
    
    if($btit_settings["fmhack_helpdesk"] == "enabled" && $CURUSER["uid"] > 1)
    {
        print ("<li><a href='index.php?page=modules&amp;module=helpdesk'>".$language["HELPDESK"]."</a></li>\n");
    }
    if($btit_settings["fmhack_user_images"] == "enabled" && $CURUSER["uid"] > 1)
    {
        print ("<li><a href='index.php?page=user_img'>".$language["UIMG_USR_IMGS"]."</a></li>\n");
    }
    if($btit_settings["fmhack_donation_history"] == "enabled" && $CURUSER["uid"] > 1)
    {
        print ("<li><a href='index.php?page=don_historie'>".$language['DONATIONS']."</a></li>\n");
    }
		if($btit_settings["fmhack_gallery"] == "enabled" && gallery_in())
    {
        print ("<li><a href='javascript:gallery(\"gallery.php\");'>".$language['GALLERY']."</a></li>\n");
    }
    if($btit_settings["fmhack_sport_betting"] == "enabled" && $CURUSER["uid"] > 1)
    {
        print ("<li><a href='index.php?page=bet'>".$language["SB_BETTING"]."</a></li>\n");   
    } 
		if($btit_settings["fmhack_file_hosting"] == "enabled" && $CURUSER["uid"] > 1)
    {
    print ("<li><a href='index.php?page=file_hosting'>".$language["MNU_FHOST"]."</a></li>\n");	
    } 
   print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
}    
# User control panel menu
if($CURUSER["id_level"]>=3)
    {
			  require_once (load_language("lang_usercp.php"));
			  print ("<li><a class='fly' href='#'>".$language["USER_CP"]."</a>\n");
        print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
        print ("<ul class='level3'>\n");
        print ("<li><a href='index.php?page=usercp&amp;uid=".$CURUSER["uid"]."'>".$language['MNU_UCP_HOME']."</a></li>\n");
				
        print ("<li><a class='fly' href='#'>".$language["MNU_UCP_PM"]."</a>\n");
        print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
        print ("<ul class='level4'>");
        print ("<li><a href='index.php?page=usercp&uid=".$CURUSER["uid"]."&do=pm&action=list&what=inbox'>".$language['MNU_UCP_IN']."</a></li>\n");
        print ("<li><a href='index.php?page=usercp&uid=".$CURUSER["uid"]."&do=pm&action=list&what=outbox'>".$language['MNU_UCP_OUT']."</a></li>\n");
print ("<li><a href='index.php?page=usercp&uid=".$CURUSER["uid"]."&do=pm&action=edit&uid=".$CURUSER["uid"]."&what=new'>".$language['MNU_UCP_NEWPM']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");

        print ("<li><a class='fly' href='#'>".$language["MNU_UCP_INFO"]."</a>\n");
        print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
        print ("<ul class='level4'>\n");
        print ("<li><a href='index.php?page=usercp&do=user&action=change&uid=".$CURUSER["uid"]."'>".$language['MNU_UCP_INFO']."</a></li>\n");
        print ("<li><a href='index.php?page=usercp&do=pwd&action=change&uid=".$CURUSER["uid"]."'>".$language['MNU_UCP_CHANGEPWD']."</a></li>\n");
        print ("<li><a href='index.php?page=usercp&do=pid_c&action=change&uid=".$CURUSER["uid"]."'>".$language['CHANGE_PID']."</a></li>\n");
        print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");

        print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");

            print ("<li><a class='fly' href='#'>".$language["SIG_EX"]."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level3'>\n");
            print ("<li><a href='index.php?page=usercp&uid=".$CURUSER["uid"]."&do=user_extras'>".$language["SIG_CP"]."</a></li>\n");
										
        if($btit_settings["fmhack_social_network"] == "enabled" && $CURUSER["uid"] > 1)
         {
            print ("<li><a href='index.php?page=friendlist&amp;uid=".$CURUSER["uid"]."'>".$language['FL_FRIENDLIST']."</a></li>\n");
         }
        if($btit_settings["fmhack_invitation_system"] == "enabled")
        {
            print ("<li><a href='index.php?page=usercp&do=invite&action=read&uid=".$CURUSER["uid"]."'>".$language["MNU_UCP_INVITATIONS"]."</a></li>\n");
        }
        if($btit_settings["fmhack_avatar_upload"] == "enabled")
        {
            print ("<li><a href='index.php?page=usercp&do=avatar&action=read&uid=".$CURUSER["uid"]."'>".$language["MNU_UCP_AVATAR"]."</a></li>\n");
						
        } 
   print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
}

if($CURUSER["view_forum"] == "yes")
  {
        if($GLOBALS["FORUMLINK"] == "" || $GLOBALS["FORUMLINK"] == "internal" || substr($GLOBALS["FORUMLINK"], 0, 3) == "smf" || $GLOBALS["FORUMLINK"] == "ipb")
        {
       if($btit_settings["fmhack_integrated_forum_display"] == "enabled" && (substr($GLOBALS["FORUMLINK"], 0, 3) == "smf" || $GLOBALS["FORUMLINK"] == "ipb"))
            {
                if($btit_settings["forum_viewtype"] != "iframe")
                    $href = "href='".((substr($GLOBALS["FORUMLINK"], 0, 3) == "smf")?"smf":$GLOBALS["FORUMLINK"])."' target='".$btit_settings["forum_viewtype"]."'";
                else
                    $href = "href='index.php?page=forum'";
            }
            else
                $href = "href='index.php?page=forum'";
            print ("<li><a ".$href.">".$language["MNU_FORUM"]."</a></li>\n");
        }
        else
            print ("<li><a href='".((substr($GLOBALS["FORUMLINK"], 0, 3) == "smf")?"smf":$GLOBALS["FORUMLINK"])."'>".$language["MNU_FORUM"]."</a></li>\n");
    }
if ($CURUSER["view_news"]=="yes")
    {
        print("<li><a href='index.php?page=viewnews'>".$language['MNU_NEWS']."</a></li>\n");        
	   print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>");
  }
	
# Admin Panel

if ($CURUSER["delete_users"] == "yes" || $CURUSER["admin_access"] == "yes")
{
    print ("<li class='level1-li left'><a class='level1-a drop' href='#'>".$language['ADMIN_MENU']."</a>\n");
    print ("<!--[if lte IE 6]><table><tr><td><![endif]-->\n");
    print ("<ul class='level2'>\n");
		
   if($CURUSER["admin_access"] == "yes")
    {
        if($btit_settings["fmhack_staffpanel"] != "enabled" || ($btit_settings["fmhack_staffpanel"] == "enabled" && $CURUSER["id_level"] == 8))
        {
            require_once (load_language("lang_admin.php"));
            print ("<li><a class='fly' href='#'>".$language["ADMIN_ACCESS"]."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level3'>\n");
            
            print ("<li><a class='fly' href='#'>".$language['TRACKER_SETTINGS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=config&action=read'>".$language['TRACKER_SETTINGS']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=banip&action=read'>".$language['ACP_BAN_IP']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=language&action=read'>".$language['ACP_LANGUAGES']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=style&action=read'>".$language['ACP_STYLES']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=security_suite'>".$language["ACP_SECSUI_SET"]."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_FRONTEND']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=category&action=read'>".$language['ACP_CATEGORIES']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=poller&action=read'>".$language['ACP_POLLS']."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=badwords&action=read'>".$language["ACP_CENSORED"]."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=integrity'>".$language['INTEGRITY_SETUP']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=blocks&action=read'>".$language['ACP_BLOCKS']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_USERS_TOOLS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=groups&action=read'>".$language['ACP_USER_GROUP']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=masspm&action=write'>".$language['ACP_MASSPM']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=".(($btit_settings["fmhack_advanced_prune_users_and_torrents"]=="enabled")?"adv_":"")."pruneu'>".$language['ACP_PRUNE_USERS']."</a></li>\n");
            print("<li><a href=\"javascript:announce('announcements.php');\">".$language['ACP_ANNOUNCEMENT']."</a></li>\n");            
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=searchdiff'>".$language['ACP_SEARCH_DIFF']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_TORRENTS_TOOLS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=".(($btit_settings["fmhack_advanced_prune_users_and_torrents"]=="enabled")?"adv_":"")."prunet'>".$language['ACP_PRUNE_TORRENTS']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_FORUM']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=forum&action=read'>".$language['ACP_FORUM']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_OTHER_TOOLS']."</a>");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=dbutil'>".$language['ACP_DBUTILS']."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=mysql_stats'>".$language['ACP_MYSQL_STATS']."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=logview'>".$language['ACP_SITE_LOG']."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=php_log'>".$language["LOGS_PHP"]."</a>                </li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_MODULES']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=module_config&action=manage'>".$language['ACP_MODULES_CONFIG']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_HACKS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=hacks&action=read'>".$language['ACP_HACKS_CONFIG']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            $i = 1;
            $hacks_active = 0;
            $unsorted = array();
            if($btit_settings["fmhack_invitation_system"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_INVITATIONS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=invitations'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_bonus_system"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_SEEDBONUS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=seedbonus'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_donation_history"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_DON_HIST"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=don_hist'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_DON_HIST_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=don_hist_set'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_advanced_auto_donation_system"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_DONATE"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=donate'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_GOLD"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=gold'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_free_leech_with_happy_hour"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_FREECTRL"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=free'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_warning_system"] == "enabled")
            {
                $alphabetize[$i] = $language['WS_WARNED_USERS'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=warned_users'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language['WS_WARN_SETTINGS'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=warn_settings'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_anti_hit_and_run_system"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_HITRUN"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hitrun'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["HNR_BLOCK_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hrb_conf'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_auto_rank"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_AUTORANK"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=autorank'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_booted"] == "enabled")
            {
                $alphabetize[$i] = $language['ACP_BOOTED'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=booted_users'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_staffpanel"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_MODPANEL"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=modpanel&amp;action=read'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_rules_with_groups"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_RULES_GROUP"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=rules_cat'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_RULES"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=rules'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_sticky_torrent"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_STICKY_TORRENTS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=sticky'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_extended_torrent_description"] == "enabled")
            {
                $alphabetize[$i] = $language["XTD_ACP"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=xtd'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_lottery"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_LOTTERY"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=lottery_settings'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_site_offline"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_OFFLINE"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=offline'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_shoutcast_stats_and_DJ_application"] == "enabled")
            {
                $alphabetize[$i] = $language["RAD_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=radio_settings'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["djhead"];
                $unsorted[$i] = "<li><a href='index.php?page=dj&do=list'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_message_spy"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_ISPY"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ispy'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_add_new_users_in_adminCP"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_ADD_USER"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=newuser'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_ban_button"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_BB"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banbutton&amp;action=read'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_BB_USER"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banbutton_user&amp;action=read'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["BB_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ban_button'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_ratio_editor"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_RATIO_EDITOR"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ratio-editor'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_duplicate_accounts"] == "enabled")
            {
                $alphabetize[$i] = $language["DUPLICATES"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=duplicates'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_torrent_moderation"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_ADD_WARN"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=warn'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_TMOD_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=tmod_set'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_twitter_update"] == "enabled")
            {
                $alphabetize[$i] = $language["TWIT_REG"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=twitter'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_teams"] == "enabled")
            {
                require_once (load_language("lang_teams.php"));
                $alphabetize[$i] = $language["TEAMS_TS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=teams'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["TEAMS_TU"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=team_users'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_xbtit_->_SMF_style_bridge"] == "enabled")
            {
                $alphabetize[$i] = $language["STYLE_BRIDGE"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=style_bridge'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_signup_bonus_upload"] == "enabled")
            {
                $alphabetize[$i] = $language["SIGNUP_BONUS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=signup_bonus'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_torrent_image_upload"] == "enabled")
            {
                $alphabetize[$i] = $language["IMAGE_SETTING"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=image_upload'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_show_if_seedbox_is_used"] == "enabled")
            {
                $alphabetize[$i] = $language["SB_SS_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=sb_use'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_LED_ticker"] == "enabled")
            {
                $alphabetize[$i] = $language["TICKER_CONF"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ticker_conf'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_low_ratio_ban_system"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_LRB"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=lrb'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_detect_and_blacklist_proxy"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_PROXY"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=proxy'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_BLACKLIST"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=blacklist'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_faq_with_groups"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_FAQ_GROUP"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=faq_group'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_FAQ_QUESTION"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=faq_question'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_gifts"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_GIFTS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=gifts'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_staff_control"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_STAFF_CONTROL"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=staff_control'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_birthdays"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_BIRTHDAY"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=birthday'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_download_prefix_or_suffix"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_DPS_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=dlpresuf'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_uploader_rights"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_UPL_RIGHTS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ulrights'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_pager_type_select"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_PG_SETT"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=pgtype'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_ban_cheapmail_domains"] == "enabled")
            {
                $alphabetize[$i] = $language["BAN_CHEAPMAIL"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=block_cheapmail'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_uploader_control"] == "enabled")
            {
                $alphabetize[$i] = $language["UP_CONTROL"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=uploader_control'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_avatar_upload"] == "enabled")
            {
                $alphabetize[$i] = $language["AVATAR_UPLOAD_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=avatar_upload'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_torrent_request_and_vote"] == "enabled")
            {
                $alphabetize[$i] = $language["TRAV_REQ_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=requests'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_download_ratio_checker"] == "enabled")
            {
                $alphabetize[$i] = $language["SETTING_CUSTOM_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=dlcheck'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_sport_betting"] == "enabled")
            {
                $alphabetize[$i] = $language["SB_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=sport_bet'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_high_UL_speed_report"] == "enabled")
            {
                $alphabetize[$i] = $language["RHUS_HIGH_UL_SUP"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=rep_high_ul'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_uploader_medals"] == "enabled")
            {
                $alphabetize[$i] = $language["UM_UPLOADER_MED"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=up_med'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_IMG_in_SB_after_x_shouts"] == "enabled")
            {
                $alphabetize[$i] = $language["IMGSB_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=img_in_shout'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_user_notes"] == "enabled")
            {
                $alphabetize[$i] = $language["UN_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=user_notes'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_registration_open_randomly"] == "enabled")
            {
                $alphabetize[$i] = $language["RREG_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=random_reg'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_forum_auto_topic"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_CATFORUM_SELECT"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=smf_select'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_offer_to_re-encode"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_REENC_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=reencode'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_shoutbox_member_and_torrent_announce"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_SHOUTANN_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=shout_announce'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_SEO_panel"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_SEO"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=seo'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_staff_comment_in_torrent_details"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_STCOMM_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=scommdet'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_recommended_torrents"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_RECOMMEND_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=recommend'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_user_images"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_UIMG_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=user_images'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_security_suite"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_SECSUI_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=security_suite'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_CBT_(Coolys_Backup_Tools)"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_BUFILES"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=backup'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $alphabetize[$i] = $language["ACP_BUDB"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=dbbackup'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_user_watch_list"] == "enabled")
            {
                $alphabetize[$i] = $language['WatchL'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=watched_users'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_alternate_login"] == "enabled")
            {
                require_once (load_language("lang_alternate_login.php"));
                $alphabetize[$i] = $language['ACP_LOGIN_PAGE'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=login_page'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_balloons_on_mouseover"] == "enabled")
            {
                $alphabetize[$i] = $language['ACP_BALL_SET'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=balloons'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_online_timeout"] == "enabled")
            {
                $alphabetize[$i] = $language['ACP_ONLINE_SET'];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=online'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_show_or_hide_porn"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_SHOWPORN_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=showporn'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_user_signup_agreement"] == "enabled")
            {
                require_once (load_language("lang_agree.php"));
                $alphabetize[$i] = $language["ACP_USER_SIGNUP_AGREEMENT"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=admin_agree'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_archive_torrents"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_ARCHIVE_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=archive'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_ads_system"] == "enabled")
            {
                $alphabetize[$i] = $language["ADS_CONF"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ads_setup'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_welcome_pm"] == "enabled")
            {
                $alphabetize[$i] = $language["SETUP_MSG2"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=welcome_msg'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_freeleech_slots"] == "enabled")
            {
                $alphabetize[$i] = $language["FLS_ACP_ADMIN"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=fls'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_torrent_of_the_week"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_TOW_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=tow'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_comment_captcha"] == "enabled")
            {
                $alphabetize[$i] = $language["CAPTCHA_CONF"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=comment_captcha'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_protected_usernames"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_PROTUSER_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=protuser'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_poll_from_integrated_forum"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_INTFORUMPOLL_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=intforumpoll'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_torrent_activity_colouring"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_TAC_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=toractcou'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_grab_images_from_theTVDB"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_TVDB_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=tvdb'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_ask_for_reseed"] == "enabled")
            {
                $alphabetize[$i] = $language["ACP_RESEED_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=reseed'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_download_requires_introduction"] == "enabled")
            {
                $alphabetize[$i] = $language["IBD_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=introb4down'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_only_allow_specified_email_domains"] == "enabled")
            {
                $alphabetize[$i] = $language["OASED_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=specmail'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_no_columns_display"] == "enabled")
            {
                $alphabetize[$i] = $language["NOCOL_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=nocoldisp'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_block_signup_from_certain_countries"] == "enabled")
            {
                $alphabetize[$i] = $language["CSIGN_SETTINGS"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=csignup'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_gallery"] == "enabled")
            {
                $alphabetize[$i] = $language["GALLERY_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=gallery'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_hide_style"] == "enabled")
            {
            	  require_once (load_language("lang_style_lang.php"));
                $alphabetize[$i] = $language["ACP_HIDE_STYLES"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hide_style'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_hide_language"] == "enabled")
            {
            	  require_once (load_language("lang_style_lang.php"));
                $alphabetize[$i] = $language["ACP_HIDE_LANGUAGES"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hide_language'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($btit_settings["fmhack_custom_smileys"] == "enabled")
            {
                $alphabetize[$i] = $language["SMILE_MENU"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=smilies'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
						if($btit_settings["fmhack_file_hosting"] == "enabled")
            {
            	  require_once (load_language("lang_file_hosting.php"));
                $alphabetize[$i] = $language["ACP_FHOST"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=file_hosting'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
						if($btit_settings["fmhack_apply_for_membership"] == "enabled")
            {
            	  require_once (load_language("lang_apply_membership.php"));
                $alphabetize[$i] = $language["ACP_APPLY_MEMBERSHIP_SET"];
                $unsorted[$i] = "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=apply_membership'>".$alphabetize[$i]."</a></li>\n";
                $i++;
                $hacks_active++;
            }
            if($hacks_active == 0)
            {
                $fm_dropdown = "<li><a class='fly' href='#'>".$language["ACP_FM_HACK_CONFIG"]."</a>\n";
                $fm_dropdown .= "<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n";
                $fm_dropdown .= "<ul class='level4'>\n";
                $fm_dropdown .= "<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=hacks&action=read'>".$language["ACP_NO_HACKS_ENABLED"]."</a></li>\n";
                $fm_dropdown .= "</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n";
                print ($fm_dropdown);
            }
            else
            {
                if($i >= 1)
                {
                    if(isset($alphabetize) && !empty($alphabetize))
                    {
                        $fm_array = array();
                        asort($alphabetize);
                        $z = 0;
                        foreach($alphabetize as $key => $value)
                        {
                            $fm_array[$z] = $unsorted[$key];
                            $z++;
                        }
                    }
                    $fm_array2 = array();
                    $j = 0;
                    $k = 1;
                    $arr_count = count($fm_array);
                    foreach($fm_array as $key => $value)
                    {
                        if(($key % 10) == 0)
                        {
                            $j++;
                            $k = 1;
                        }
                        $fm_array2[$j][$k] = $value;
                        $fm_dropdown .= $value;
                        $k++;
                    }
                    $sub_menus = count($fm_array2);
                    $fm_dropdown = "<li><a class='fly' href='#'>".$language["ACP_FM_HACK_CONFIG"]."</a>\n";
                    $fm_dropdown .= "<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n";
                    $fm_dropdown .= "<ul class='level3'>\n";
                    $l = 1;
                    foreach($fm_array2 as $key => $value)
                    {
                        $fm_dropdown .= "<li><a class='fly' href='#'>".$language["ACP_FM_HACK_SUBMENU"]." ".$key."</a>\n";
                        $fm_dropdown .= "<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n";
                        $fm_dropdown .= "<ul class='level4'>\n";
                        foreach($value as $key2 => $value2)
                        {
                            $fm_dropdown .= $value2;
                        }
                        $last_a = strrpos($fm_dropdown, "</a>");
                        $fm_dropdown = substr($fm_dropdown, 0, ($last_a))."</a></ul></li>\n";
                        $l++;
                    }
                    $last_a = strrpos($fm_dropdown, "</a>");
                    $fm_dropdown = substr($fm_dropdown, 0, ($last_a))."</a></ul></li>\n";
                    print ($fm_dropdown);
                    print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
                    
                }
            }
         print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."'>".$language["MNU_ADMINCP"]."</a></li>");
        }
        elseif($btit_settings["fmhack_staffpanel"] == "enabled" && $CURUSER["id_level"] < 8)
        {
            require_once (load_language("lang_admin.php"));
            print ("<li><a class='fly' href='#'>".$language["ADMIN_ACCESS"]."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level3'>\n");
            
            print ("<li><a class='fly' href='#'>".$language['TRACKER_SETTINGS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=config&action=read'>".$language['TRACKER_SETTINGS']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=banip&action=read'>".$language['ACP_BAN_IP']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=language&action=read'>".$language['ACP_LANGUAGES']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=style&action=read'>".$language['ACP_STYLES']."</a></li>\n");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_FRONTEND']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=category&action=read'>".$language['ACP_CATEGORIES']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=poller&action=read'>".$language['ACP_POLLS']."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=badwords&action=read'>".$language["ACP_CENSORED"]."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=blocks&action=read'>".$language['ACP_BLOCKS']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_USERS_TOOLS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=groups&action=read'>".$language['ACP_USER_GROUP']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=masspm&action=write'>".$language['ACP_MASSPM']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=".(($btit_settings["fmhack_advanced_prune_users_and_torrents"]=="enabled")?"adv_":"")."pruneu'>".$language['ACP_PRUNE_USERS']."</a></li>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=searchdiff'>".$language['ACP_SEARCH_DIFF']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_TORRENTS_TOOLS']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=".(($btit_settings["fmhack_advanced_prune_users_and_torrents"]=="enabled")?"adv_":"")."prunet'>".$language['ACP_PRUNE_TORRENTS']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_FORUM']."</a>\n");
            print ("<!--[if gte IE 7]><!--></a><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]-->\n");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=forum&action=read'>".$language['ACP_FORUM']."</a></li></ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("<li><a class='fly' href='#'>".$language['ACP_OTHER_TOOLS']."</a>");
            print ("<ul class='level4'>\n");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=mysql_stats'>".$language['ACP_MYSQL_STATS']."</a></li>");
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=logview'>".$language['ACP_SITE_LOG']."</a></li>");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
						
            print ("<li><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."'>".$language["MNU_ADMINCP"]."</a></li>");
            print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
        }   
		}
		
		print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
}
    print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
    print ("</ul><!--[if lte IE 6]></td></tr></table></a><![endif]--></li>\n");
}
print ("</div>");

?>