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
//pm refresh in shout v3 cooly
require_once"include/functions.php";
dbconn();

global $CURUSER, $FORUMLINK, $BASEURL;

if(isset($CURUSER) && $CURUSER["uid"]>1)
{
    if(substr($FORUMLINK,0,3)=="smf")
        $resmail=get_result("SELECT `unread".(($FORUMLINK=="smf")?"M":"_m")."essages` `ur` FROM `{$db_prefix}members` WHERE ".(($FORUMLINK=="smf")?"`ID_MEMBER`":"`id_member`")."=".$CURUSER["smf_fid"],true,$btit_settings['cache_duration']);
    elseif($FORUMLINK=="ipb")
        $resmail=get_result("SELECT `msg_count_new` `ur` FROM `{$ipb_prefix}members` WHERE `member_id`=".$CURUSER["ipb_fid"],true,$btit_settings['cache_duration']);
    else
        $resmail=get_result("SELECT COUNT(*) `ur` FROM `{$TABLE_PREFIX}messages` WHERE `readed`='no' AND `receiver`=".$CURUSER["uid"],true,$btit_settings['cache_duration']);


       if ($FORUMLINK=="" || $FORUMLINK=="internal" || substr($FORUMLINK,0,3)=="smf" || $FORUMLINK=="ipb")
       {
       if($btit_settings["fmhack_integrated_forum_display"]=="enabled" && (substr($FORUMLINK,0,3)=="smf" || $FORUMLINK=="ipb"))
       {
           if($btit_settings["forum_viewtype"]!="iframe")
           {
			switch($FORUMLINK)
			{
			case 'smf2':
			case 'smf':
			$href='href="'.$BASEURL.'/smf/index.php?action=pm" target="'.$btit_settings["forum_viewtype"].'"';
			break;
			case 'ipb':
			$href='href="'.$BASEURL.'/ipb/index.php?app=members&module=messaging" target="'.$btit_settings["forum_viewtype"].'"';
			break;
		     }
            }
           else
               $href="href='".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."'";
       }
       else
           $href="href='".($FORUMLINK=="smf"?"index.php?page=forum&action=pm":"index.php?page=usercp&amp;uid=".$CURUSER["uid"]."&amp;do=pm&amp;action=list")."'";
      }

    if ($resmail && count($resmail)>0)
    {
        $mail=$resmail[0];
        if ($mail['ur']>0)
            $pm="<a ".$href."><img border=\"0\" src=\"".$BASEURL."/images/pm.gif\" title=\"New Messages\"></a>";
        else
            $pm="";
    }
    else
        $pm="";

    if($pm!="")
        echo $pm;
}

?>