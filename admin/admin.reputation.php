<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
//    Reputation system by DiemThuy ( jan 2010 )
//    Rep Images by Friendly
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

if (!defined("IN_ACP"))
      die("non direct access!");
global $language, $CURUSER ;
require_once ("include/functions.php");
require_once (load_language("lang_reputation.php"));
dbconn( false );

$action = $_GET['action'];

// update reputation settings in the database
if($action == 'update')

    {

        $DT1    =   $_POST['rep_is_online'];
        $DT2    =   $_POST['rep_adminpower'];
        $DT3    =   $_POST['rep_minpost'];
       	$DT5	=	$_POST['rep_default'];
       	$DT6	=	$_POST['rep_userrates'];
        $DT7	=	$_POST['rep_rdpower'];
        $DT8	=	$_POST['rep_pcpower'];
        $DT9	=	$_POST['rep_kppower'];
       	$DT10	=	$_POST['rep_minrep'];
       	$DT11	=	$_POST['rep_maxperday'];
        $DT12	=	$_POST['rep_repeat'];
        $DT13	=	$_POST['rep_undefined'];
        $DT14	=	$_POST['best_level'];
       	$DT15	=	$_POST['good_level'];
       	$DT16	=	$_POST['no_level'];
        $DT17	=	$_POST['bad_level'];
        $DT18	=	$_POST['worse_level'];
        $DT19	=	$_POST['rep_upload'];
        $DT20	=	$_POST['rep_en_sys'];
       	$DT21	=	$_POST['rep_pr_id'];
       	$DT22	=	$_POST['rep_dm_id'];
        $DT23	=	$_POST['rep_pr'];
        $DT24	=	$_POST['rep_dm'];
        $DT25	=	$_POST['rep_pm_text'];
        $DT26	=	$_POST['rep_dm_text'];


    do_sqlquery("UPDATE `{$TABLE_PREFIX}reputation_settings` SET `rep_is_online`='".$DT1."',`rep_adminpower`='".$DT2."',`rep_minpost`='".$DT3."',`rep_default`='".$DT5."',`rep_userrates`='".$DT6."',`rep_rdpower`='".$DT7."',`rep_pcpower`='".$DT8."',`rep_kppower`='".$DT9."',`rep_minrep`='".$DT10."', `rep_maxperday`='".$DT11."', `rep_repeat`='".$DT12."', `rep_undefined`='".$DT13."', `best_level`='".$DT14."' , `good_level`='".$DT15."' , `no_level`='".$DT16."' , `bad_level`='".$DT17."' , `worse_level`='".$DT18."', `rep_upload`='".$DT19."', `rep_en_sys`='".$DT20."', `rep_pr_id`='".$DT21."', `rep_dm_id`='".$DT22."', `rep_pr`='".$DT23."', `rep_dm`='".$DT24."' , `rep_pm_text`='".$DT25."', `rep_dm_text`='".$DT26."'   WHERE `id`='1' ") or sqlerr();
    redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=reputation");
	exit();
}
// output reputation settings from the database
$admintpl->set("language",$language);
$admintpl=new bTemplate();
require(load_language("lang_reputation.php"));
$rep = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}reputation_settings WHERE id=1") or die(mysqli_error($GLOBALS['conn']));
$ar=mysqli_fetch_assoc($rep);

    if ($ar["rep_is_online"] =='true')
    {
    $onlineyes="checked";
    }
    else if  ($ar["rep_is_online"] =='false')
    {
    $onlineno="checked";
    }

$admintpl->set("onlineyes", $onlineyes );
$admintpl->set("onlineno", $onlineno );

if ($ar["rep_en_sys"] =='true')
    {
    $rep_en_sysyes="checked";
    }
    else if  ($ar["rep_en_sys"] =='false')
    {
    $rep_en_sysno="checked";
    }
$admintpl->set("language",$language);
require(load_language("lang_reputation.php"));
$admintpl->set("rep_en_sysyes", $rep_en_sysyes );
$admintpl->set("rep_en_sysno", $rep_en_sysno );

$admintpl->set("rep_pr_id", $ar["rep_pr_id"] );
$admintpl->set("rep_dm_id", $ar["rep_dm_id"] );
$admintpl->set("rep_pr", $ar["rep_pr"] );
$admintpl->set("rep_dm", $ar["rep_dm"] );
$admintpl->set("rep_pm_text", $ar["rep_pm_text"] );
$admintpl->set("rep_dm_text", $ar["rep_dm_text"] );
$admintpl->set("rep_adminpower", $ar["rep_adminpower"] );
$admintpl->set("rep_undefined", $ar["rep_undefined"] );
$admintpl->set("rep_minpost", $ar["rep_minpost"] );
$admintpl->set("rep_default", $ar["rep_default"] );
$admintpl->set("rep_userrates", $ar["rep_userrates"] );
$admintpl->set("rep_rdpower", $ar["rep_rdpower"] );
$admintpl->set("rep_pcpower", $ar["rep_pcpower"] );
$admintpl->set("rep_kppower", $ar["rep_kppower"] );
$admintpl->set("rep_minrep", $ar["rep_minrep"] );
$admintpl->set("rep_maxperday", $ar["rep_maxperday"] );
$admintpl->set("rep_repeat", $ar["rep_repeat"] );
$admintpl->set("best_level", $ar["best_level"] );
$admintpl->set("good_level", $ar["good_level"] );
$admintpl->set("no_level", $ar["no_level"] );
$admintpl->set("bad_level", $ar["bad_level"] );
$admintpl->set("worse_level", $ar["worse_level"] );
$admintpl->set("rep_upload", $ar["rep_upload"] );
$admintpl->set("frm_action", "index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=reputation&amp;action=update");

?>