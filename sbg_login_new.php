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

$THIS_BASEPATH = str_replace("\\", "/", dirname(__file__));
require_once("include/functions.php");
dbconn();
require_once (load_language("lang_main.php"));
require_once (load_language("lang_account.php"));
require_once (load_language("lang_alternate_login.php"));
require_once ($THIS_BASEPATH."/btemplate/bTemplate.php");
global $INVITATIONSON, $btit_settings, $USE_IMAGECODE, $CURUSER;
(isset($_GET["un"]) && $_GET["un"] == 1)?$un = (int)1:$un = 0;
(isset($_GET["bo"]) && $_GET["bo"] == 1)?$bo = (int)1:$bo = 0;
(isset($_GET["pw"]) && $_GET["pw"] == 1)?$pw = (int)1:$pw = 0;
(isset($_GET["msg"]) && !empty($_GET["msg"]))?$msg = urldecode($_GET["msg"]):$msg = "Missing message";
//start Invitation System by dodge
if($btit_settings["fmhack_invitation_system"] == "enabled")
{
    $code = mysqli_real_escape_string($GLOBALS['conn'],strtolower(preg_replace("/[^A-Fa-f0-9]/", "", $_GET["invitationnumber"])));
    $res = do_sqlquery("SELECT `inviter`, `confirmed` FROM `{$TABLE_PREFIX}invitations` WHERE `hash` = '".$code."'", true);
    @$inv = mysqli_fetch_assoc($res);
    $inviter = $inv["inviter"];
    $confirmed = $inv["confirmed"];
}
//end Invitation System by dodge
require_once("$THIS_BASEPATH/include/blocks.php");
$logo.="<div></div>";
$dropdown=dropdown_menu();
$extra=extra_menu();
$adarea=adarea_menu();
$header.="<div>".main_menu()."</div>";
$left_col=side_menu();
$right_col=right_menu();
$slideIt="<span style=\"text-align:left;\"><a href=\"javascript:collapse2.slideit()\"><img src=\"$STYLEURL/images/slide.png\" border=\"0\" alt=\"click\" /></a></span>";

$irc="<a href=\"javascript:kcdmenu.toggle('irc')\" /><tag:language.MNU_IRC /></a><a href=\"javascript:kcdmenu.show('irc')\" /></a>";
$signup="<a href=\"javascript:kcdmenu.toggle('signup')\" /><tag:language.SIGNUP /></a><a href=\"javascript:kcdmenu.show('signup')\" /></a>";
$recover="<a href=\"javascript:kcdmenu.toggle('recover')\" /><tag:language.RECOVER /></a><a href=\"javascript:kcdmenu.show('recover')\" /></a>";
$news="<a href=\"javascript:kcdmenu.toggle('news')\" /><tag:language.MNU_NEWS /></a><a href=\"javascript:kcdmenu.show('news')\" /></a>";
$forum="<a href=\"javascript:kcdmenu.toggle('forum')\" /><tag:language.MNU_FORUM /></a><a href=\"javascript:kcdmenu.show('forum')\" /></a>";
$rules="<a href=\"javascript:kcdmenu.toggle('rules')\" /><tag:language.MNU_RULES /></a><a href=\"javascript:kcdmenu.show('rules')\" /></a>";
$faq="<a href=\"javascript:kcdmenu.toggle('faq')\" /><tag:language.MNU_FAQ /></a><a href=\"javascript:kcdmenu.show('faq')\" /></a>";

$sbg_logintpl = new bTemplate();
include (dirname(__file__)."/alt_login/new/single/style_copyright.php");
$sbg_logintpl->set("SITENAME", $SITENAME);
$sbg_logintpl->set("ERR", false, true);
$sbg_logintpl->set('to_top', print_top());
$sbg_logintpl->set('tracker_url', print_trackerurl());
$sbg_logintpl->set('user_name', print_username());
$sbg_logintpl->set('main_footer', bottom_menu()."<br />\n");
$sbg_logintpl->set('xbtit_version', print_version());
$sbg_logintpl->set("alt_copyright", "[&nbsp;&nbsp;<u>Design By</u>: ".$design_copyright."&nbsp;&nbsp;]&nbsp;");
$sbg_logintpl->set('xbtit_debug', (($PRINT_DEBUG)?print_debug():""));
$sbg_logintpl->set("main_jscript",$morescript);
if (!$no_columns && $pageID!='admin' && $pageID!='forum' && $pageID!='torrents' && $pageID!='usercp') {
  $sbg_logintpl->set("main_left",$left_col);
  $sbg_logintpl->set("main_right",$right_col);
}
$sbg_logintpl->set("main_logo",$logo);
$sbg_logintpl->set("main_dropdown",$dropdown);
$sbg_logintpl->set("main_extra",$extra);
$sbg_logintpl->set("main_adarea",$adarea);
$sbg_logintpl->set("main_slideIt",$oUlnnmqQ);
$sbg_logintpl->set("main_header",$header.$err_msg_install);
$sbg_logintpl->set("more_css",$morecss);
$sbg_logintpl->set("signup",$signup);
$sbg_logintpl->set("recover",$recover);
$sbg_logintpl->set("irc",$irc);
$sbg_logintpl->set("news",$news);
$sbg_logintpl->set("forum",$forum);
$sbg_logintpl->set("faq",$faq);
$sbg_logintpl->set("rules",$rules);

//ads system cooly
if($btit_settings["fmhack_ads_system"]=="enabled" && in_array($CURUSER["id_level"],explode(",",$btit_settings["ad_groups"])))
{
$ad_settings=get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}ads");
if($ad_settings["header_enabled"]=="enabled")
{
$sbg_logintpl->set("ads_header",$ad_settings["header"]);
}else{}
if($ad_settings["left_top_enabled"]=="enabled")
{
$sbg_logintpl->set("left_top",$ad_settings["left_top"]);
}else{}
if($ad_settings["left_bottom_enabled"]=="enabled")
{
$sbg_logintpl->set("left_bottom",$ad_settings["left_bottom"]);
}else{}
if($ad_settings["right_top_enabled"]=="enabled")
{
$sbg_logintpl->set("right_top",$ad_settings["right_top"]);
}else{}
if($ad_settings["right_bottom_enabled"]=="enabled")
{
$sbg_logintpl->set("right_bottom",$ad_settings["right_bottom"]);
}else{}
if($ad_settings["footer_enabled"]=="enabled")
{
$sbg_logintpl->set("ads_footer",$ad_settings["footer"]);
}else{}
$sbg_logintpl->set("footer_en",(($btit_settings["fmhack_ads_system"]=="enabled")?TRUE:FALSE),TRUE);
$sbg_logintpl->set("right_bottom_en",(($btit_settings["fmhack_ads_system"]=="enabled")?TRUE:FALSE),TRUE);
$sbg_logintpl->set("right_top_en",(($btit_settings["fmhack_ads_system"]=="enabled")?TRUE:FALSE),TRUE);
$sbg_logintpl->set("left_top_en",(($btit_settings["fmhack_ads_system"]=="enabled")?TRUE:FALSE),TRUE);
$sbg_logintpl->set("left_bottom_en",(($btit_settings["fmhack_ads_system"]=="enabled")?TRUE:FALSE),TRUE);
$sbg_logintpl->set("header_en",(($btit_settings["fmhack_ads_system"]=="enabled")?TRUE:FALSE),TRUE);
}
//ads system cooly  

// is language right to left?
if (!empty($language["rtl"]))
   $sbg_logintpl->set("main_rtl"," dir=\"".$language["rtl"]."\"");
else
   $sbg_logintpl->set("main_rtl","");
if (!empty($language["charset"]))
  {
   $GLOBALS["charset"]=$language["charset"];
   $btit_settings["default_charset"]=$language["charset"];
}
$sbg_logintpl->set("main_charset",$GLOBALS["charset"]);
$sbg_logintpl->set("main_css","$style_css");

if($btit_settings["fmhack_user_signup_agreement"] == "enabled")
{
    global $SITENAME, $btit_settings;
    $sbg_logintpl->set("ua4", $btit_settings["oa_one_text"]);
    $sbg_logintpl->set("ua5", $btit_settings["oa_two_text"]);
    $sbg_logintpl->set("ua8", $btit_settings["oa_three_text"]);
    $sbg_logintpl->set("ua9", $btit_settings["oa_four_text"]);
    require_once ("include/offset.php");
    $now = time();
    $date = date('l jS \of F Y h:i:s A', $now - $offset);
    $sbg_logintpl->set("ua6", $date);
    $sbg_logintpl->set("ua7", $SITENAME);
    $sbg_logintpl->set("agreement_enabled", (($btit_settings["fmhack_user_signup_agreement"] == "enabled" && $btit_settings["user_signup_agreement"] == "enabled")?false:true), true);
    $sbg_logintpl->set("agreement_enabled_1", (($btit_settings["fmhack_user_signup_agreement"] == "enabled" && $btit_settings["user_signup_agreement"] == "enabled")?true:false), true);
}
else
{
    $sbg_logintpl->set("agreement_enabled", (($btit_settings["fmhack_user_signup_agreement"] == "enabled" && $btit_settings["user_signup_agreement"] == "enabled")?true:false), true);
    $sbg_logintpl->set("agreement_enabled_1", (($btit_settings["fmhack_user_signup_agreement"] == "enabled" && $btit_settings["user_signup_agreement"] == "enabled")?false:true), true);
}
if($btit_settings["fmhack_block_signup_from_certain_countries"]=="enabled")
{    
    if($btit_settings["blocked_signup_countries"]!="")
    {
        $blockedCountries=explode(",", $btit_settings["blocked_signup_countries"]);
        if(count($blockedCountries)>0)
        {
            $countryCodes=array();
            foreach($blockedCountries as $key => $value)
            {
                $countryCodes[]=substr($value, 1, 2);
            }
            if(count($countryCodes)>0)
            {
                $checkCountry=get_result("SELECT `country_code2` FROM {$TABLE_PREFIX}ip2country WHERE `ip_from` <= INET_ATON('".getip()."') AND `ip_to` >= INET_ATON('".getip()."')", true, $btit_settings["cache_duration"]);
                $foundCountryCode=((count($checkCountry)==1)?$checkCountry[0]["country_code2"]:"ZZ");
                if(in_array($foundCountryCode, $countryCodes))
                {
                    $sbg_logintpl->set("ERR", true, true);
                    $sbg_logintpl->set("ERR_MSG", $language["CSIGN_ERR"]);
                }
            }
        }
    }
}
if($btit_settings["fmhack_registration_open_randomly"] == "enabled")
{
    $act = isset($_GET["act"])?htmlspecialchars($_GET["act"]):$act = '';
    if($act != "invite")
    {
        $taskres = get_result("SELECT `last_time` FROM `{$TABLE_PREFIX}tasks` WHERE `task`='rreg'", true, $btit_settings["cache_duration"]);
        $open = (int)(0 + $taskres[0]["last_time"]);
        $close = (int)(0 + ($taskres[0]["last_time"] + ($btit_settings["rreg_open_for"] * 60)));
        $err_msg = '';
        $sbg_logintpl->set("ERR", false, true);
        if(time() < $open || time() > $close)
        {
            $err_msg = $language["RREG_CLOSED_1"];
            if($btit_settings["fmhack_invitation_system"] == "enabled")
                $err_msg .= "<br /><br />".$language["RREG_CLOSED_2"];
            $sbg_logintpl->set("ERR", true, true);
            $sbg_logintpl->set("ERR_MSG", $err_msg);
        }
    }
}
if($USE_IMAGECODE)
{
    if(extension_loaded('gd'))
    {
        $arr = gd_info();
        if($arr['FreeType Support'] == 1)
        {
            $p = new ocr_captcha();
            $sbg_logintpl->set("CAPTCHA", true, true);
            $sbg_logintpl->set("CAPTCHA_1", true, true);
            $sbg_logintpl->set("recover_captcha", $p->display_captcha(true));
            $private = $p->generate_private();
        }
        else
        {
            include ("$THIS_BASEPATH/include/security_code.php");
            $scode_index = rand(0, count($security_code) - 1);
            $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
            $scode .= $security_code[$scode_index]["question"];
            $sbg_logintpl->set("scode_question", $scode);
            $sbg_logintpl->set("CAPTCHA", false, true);
            $sbg_logintpl->set("CAPTCHA_1", false, true);
        }
    }
    else
    {
        include ("$THIS_BASEPATH/include/security_code.php");
        $scode_index = rand(0, count($security_code) - 1);
        $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
        $scode .= $security_code[$scode_index]["question"];
        $sbg_logintpl->set("scode_question", $scode);
        $sbg_logintpl->set("CAPTCHA", false, true);
        $sbg_logintpl->set("CAPTCHA_1", false, true);
    }
}
else
{
    include ("$THIS_BASEPATH/include/security_code.php");
    $scode_index = rand(0, count($security_code) - 1);
    $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
    $scode .= $security_code[$scode_index]["question"];
    $sbg_logintpl->set("scode_question", $scode);
    $sbg_logintpl->set("CAPTCHA", false, true);
    $sbg_logintpl->set("CAPTCHA_1", false, true);
}
if($btit_settings["sbg_login_language"] != "disabled")
{
    $lres = language_list();
    $option = "\n<select name=\"language\" size=\"1\">";
    foreach($lres as $langue)
    {
        $option .= "\n<option ";
        if($langue["id"] == $btit_settings["default_language"])
            $option .= "selected=\"selected\"  ";
        $option .= "value=\"".$langue["id"]."\">".$langue["language"]."</option>";
    }
    $option .= "\n</select>";
    $sbg_logintpl->set("account_combo_language", $option);
}
if($btit_settings["sbg_login_style"] != "disabled")
{
    $sres = style_list();
    $option = "\n<select name=\"style\" size=\"1\">";
    foreach($sres as $style)
    {
        $option .= "\n<option ";
        if($style["id"] == $btit_settings["default_style"])
            $option .= "selected=\"selected\"  ";
        $option .= "value=\"".$style["id"]."\">".$style["style"]."</option>";
    }
    $option .= "\n</select>";
    $sbg_logintpl->set("account_combo_style", $option);
}
$fres = flag_list();
$option = "\n<select name=\"flag\" size=\"1\">\n<option value='0'>---</option>";
$thisip = $_SERVER["REMOTE_ADDR"];
$remotedns = gethostbyaddr($thisip);
if($remotedns != $thisip)
{
    $remotedns = strtoupper($remotedns);
    preg_match('/^(.+)\.([A-Z]{2,3})$/', $remotedns, $tldm);
    if(isset($tldm[2]))
        $remotedns = mysqli_real_escape_string($GLOBALS['conn'],$tldm[2]);
}
foreach($fres as $flag)
{
    $option .= "\n<option ";
    if($flag["domain"] == $remotedns)
        $option .= "selected=\"selected\"  ";
    $option .= "value=\"".$flag["id"]."\">".$flag["name"]."</option>";
}
$option .= "\n</select>";
$sbg_logintpl->set("account_combo_country", $option);
$zone = date('Z', time());
$daylight = date('I', time()) * 3600;
$os = $zone - $daylight;
if($os != 0)
{
    $timeoff = $os / 3600;
}
else
{
    $timeoff = 0;
}
$tres = timezone_list();
$option = "<select name=\"timezone\">";
foreach($tres as $timezone)
{
    $option .= "\n<option ";
    if($timezone["difference"] == $timeoff)
        $option .= "selected=\"selected\" ";
    $option .= "value=\"".$timezone["difference"]."\">".unesc($timezone["timezone"])."</option>";
}
$option .= "\n</select>";
$sbg_logintpl->set("account_combo_timezone", $option);
$sbg_logintpl->set("language", $language);
$sbg_logintpl->set("login.action", "index.php?page=login"); //example set value
$sbg_logintpl->set("recover.action", "index.php?page=recover&amp;act=takerecover"); //example set value
$sbg_logintpl->set("scode_question", $security_code); //example set value
$pass_min_req = explode(",", $btit_settings["secsui_pass_min_req"]);
$sbg_logintpl->set("pass_min_char", $pass_min_req[0]);
$sbg_logintpl->set("pass_min_lct", $pass_min_req[1]);
$sbg_logintpl->set("pass_min_uct", $pass_min_req[2]);
$sbg_logintpl->set("pass_min_num", $pass_min_req[3]);
$sbg_logintpl->set("pass_min_sym", $pass_min_req[4]);
$sbg_logintpl->set("pass_char_plural", (($pass_min_req[0] == 1)?false:true), true);
$sbg_logintpl->set("pass_lct_plural", (($pass_min_req[1] == 1)?false:true), true);
$sbg_logintpl->set("pass_uct_plural", (($pass_min_req[2] == 1)?false:true), true);
$sbg_logintpl->set("pass_num_plural", (($pass_min_req[3] == 1)?false:true), true);
$sbg_logintpl->set("pass_sym_plural", (($pass_min_req[4] == 1)?false:true), true);
$sbg_logintpl->set("pass_lct_set", (($pass_min_req[1] > 0)?true:false), true);
$sbg_logintpl->set("pass_uct_set", (($pass_min_req[2] > 0)?true:false), true);
$sbg_logintpl->set("pass_num_set", (($pass_min_req[3] > 0)?true:false), true);
$sbg_logintpl->set("pass_sym_set", (($pass_min_req[4] > 0)?true:false), true);
$sbg_logintpl->set("account_action", "signup");
$sbg_logintpl->set("account_form_actionlink", htmlspecialchars("index.php?page=signup&act=signup&returnto=index.php"));
$sbg_logintpl->set("sbg_login_language_enabled", (($btit_settings["sbg_login_language"] == "disabled")?false:true), true);
$sbg_logintpl->set("sbg_login_style_enabled", (($btit_settings["sbg_login_style"] == "disabled")?false:true), true);
$sbg_logintpl->set("birthdays_enabled", (($btit_settings["fmhack_birthdays"] == "enabled")?true:false), true);
$sbg_logintpl->set("ssl_enabled", (($btit_settings["fmhack_force_ssl"] == "enabled")?true:false), true);
$sbg_logintpl->set("alt_news_enabled", (($btit_settings["alt_news"]=="enabled")?true:false),true);
$sbg_logintpl->set("alt_forum_enabled", (($btit_settings["alt_forum"]=="enabled")?true:false),true);
$sbg_logintpl->set("offline_enabled", (($btit_settings["fmhack_site_offline"] == "enabled" && $btit_settings["site_offline"] == "true")?true:false), true);
$sbg_logintpl->set("offline_enabled_1", (($btit_settings["fmhack_site_offline"] == "enabled" && $btit_settings["site_offline"] == "true")?true:false), true);
if($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_only"] == "true")
{
    $sbg_logintpl->set("invitation_enabled", (($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_system"] == "enabled")?true:false), true);
}
else
{
    $sbg_logintpl->set("invitation_enabled", (($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_system"] == "enabled")?false:true), true);
}
if($btit_settings["fmhack_site_offline"] == "enabled" && $btit_settings["site_offline"] == "true")
{
    $sbg_logintpl->set("offline_msg", $btit_settings["offline_msg"]);
}
else
{
    $sbg_logintpl->set("offline_msg", "");
}
if($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_only"] == "true")
{
    global $SITENAME, $INVITATIONSON, $code, $inviter;
    if($INVITATIONSON)
    {
        $sbg_logintpl->set("BY_INVITATION", true, true);
        $sbg_logintpl->set("account_IDcode", $code);
        $sbg_logintpl->set("account_IDinviter", $inviter);
    }
}
else
    $sbg_logintpl->set("BY_INVITATION", false, true);
$sbg_logintpl->set("ERR_LOGIN", false, true);
if($un == 1 || $bo == 1 || $pw == 1)
{
    $sbg_logintpl->set("ERR_LOGIN", true, true);
    $sbg_logintpl->set("ERR_LOGIN_MSG", (($un == 1)?"<body onLoad=\"makeAlert('".$language["ERR"]."' , '".$language["ERR_USERNAME_INCORRECT"]."');\">":(($bo == 1)?$msg:(($pw == 1)?"<body onLoad=\"makeAlert('".$language["ERR"]."' , '".$language["ERR_PASSWORD_INCORRECT"]."');\">":""))));
}

//News
require_once(load_language("lang_news.php"));
if (isset($_GET["act"])) $action=$_GET["act"];
else $action ="viewnews";

if ($action=="del")
   {
       if ($CURUSER["delete_news"]=="yes")
          {
              do_sqlquery("DELETE FROM {$TABLE_PREFIX}news WHERE id=".$_GET["id"],true);
              redirect("index.php");
              exit();
          }
          else
              {
              stderr($language["ERROR"],$language["CANT_DELETE_NEWS"]);
              stdfoot();
              exit();
              }
   }

elseif ($action=="confirm")
{
if (!isset($_POST["conferma"])) ;
      elseif ($_POST["conferma"] == $language["FRM_CONFIRM"])
         {
         if (isset($_POST["news"]) && isset($_POST["title"]))
            {
              $news=$_POST["news"];
              $uid=$CURUSER["uid"];
              $title=$_POST["title"];
              if ($news=="" || $title=="")
              {
                  err_msg(ERROR,ERR_INS_TITLE_NEWS);
              }
              else
              {
                $news=sqlesc($news);
                $title=sqlesc($title);
                $nid=intval($_POST["id"]);
                $action=$_POST['action'];
                if ($action=="edit")
                   do_sqlquery("UPDATE {$TABLE_PREFIX}news SET news=$news, title=$title WHERE id=$nid",true);
                else
                    do_sqlquery("INSERT INTO {$TABLE_PREFIX}news (news,title,user_id,date) VALUES ($news, $title, $uid, NOW())",true);
                redirect("index.php");
                exit();
              }
            }
         }
         elseif ($_POST["conferma"] == $language["FRM_CANCEL"]) {
                redirect("index.php");
                exit();
                }
         else {
              $title="";
              $news="";
         }
}
else
{
global $CURUSER, $CURRENTPATH, $TABLE_PREFIX;

$limit = $GLOBALS['block_newslimit'];
if ($limit>0)
  $limitqry="LIMIT $limit";
$res=get_result("SELECT {$TABLE_PREFIX}news.id, title, news, UNIX_TIMESTAMP(date) AS news_date, username FROM {$TABLE_PREFIX}news INNER JOIN {$TABLE_PREFIX}users ON {$TABLE_PREFIX}news.user_id={$TABLE_PREFIX}users.id ORDER BY date DESC $limitqry",true,$btit_settings['cache_duration']);
    $sbg_logintpl->set("VIEW",true,true);
    $sbg_logintpl->set("NO_NEWS",false,true);
if ($res)
  {
    $news_model=array();
    $i=0;
    include("$CURRENTPATH/offset.php");
         foreach ($res as $id=>$rows) {
          $news_model[$i]["username"]=unesc($rows["username"]);
          $news_model[$i]["date"]=date("d/m/Y H:i",$rows["news_date"]-$offset);
          $news_model[$i]["title"]=unesc($rows["title"]);
          $news=format_comment($rows["news"]);
          $news_model[$i]["news"]=$news;
          $i++;
          }
    $sbg_logintpl->set("news_model",$news_model);
  }
else
  {
    $sbg_logintpl->set("NO_NEWS",true,true);
  }
}

//rules
if($btit_settings["altrulestype"]=="kcdon")
{
	if ($limit>0)
  $limitqry="LIMIT $limit";
$res=do_sqlquery("SELECT r.text AS text, r.sort_index AS sort_index, r.id AS id ,rg.title AS cat_title, rg.id AS cat_id, rg.sort_index AS g_sort_index 
                    FROM {$TABLE_PREFIX}rules r 
                    INNER JOIN {$TABLE_PREFIX}rules_group rg on r.cat_id=rg.id 
                    WHERE r.active = '1' AND rg.active = '1' GROUP BY r.sort_index ORDER BY rg.sort_index,r.sort_index ASC $limitqry");
$rules=array();
$i=0;
$sbg_logintpl -> set("rules_exists", (mysqli_num_rows($res) > 0),TRUE);
$id='';
$j=1;
$k=1;
while ($rows=mysqli_fetch_array($res))
  {
      if($id != $rows['cat_id'])
    {
     $rules[$i]["rules_group_title"] = unesc('<br/>'.$rows["cat_title"].'<br/>');
     $rules[$i]["rules_text"] = format_comment(unesc($rows["sort_index"].'. '.$rows["text"]));
     $id = $rows['cat_id'];
     $j++;
    }
    else 
    {        
        $rules[$i]["rules_text"] = format_comment(unesc($rows["sort_index"].'. '.$rows["text"]));
        $k++;
    }  
      $i++;    
  }
$sbg_logintpl -> set("rules", $rules);		
}

//FAQ
if($btit_settings["altfaqtype"]=="kcdon")
{ 
if ($limit>0)
  $limitqry="LIMIT $limit";
$res=do_sqlquery("SELECT f.title AS title, f.id AS id, f.description AS description ,fg.title AS cat_title, fg.id AS cat_id, fg.sort_index AS sort_index 
                    FROM {$TABLE_PREFIX}faq f 
                    INNER JOIN {$TABLE_PREFIX}faq_group fg on f.cat_id=fg.id 
                    WHERE f.active = '1' AND fg.active = '1' GROUP BY f.id ORDER BY fg.sort_index ASC $limitqry");
$faq=array();
$i=0;
//$sbg_logintpl -> set("faq_exists", (mysqli_num_rows($res) > 0),TRUE);
include("$THIS_BASEPATH/include/offset.php");
$id='';
while ($rows=mysqli_fetch_array($res))
  {      
        if($id != $rows['cat_id'])
    {
        //$faq[$i]["posted_date"] = date("d/m/Y H:i",$rows["news_date"]-$offset);
        //$faq[$i]["faq_group_title"] = unesc($rows["cat_title"]);
        //$faq[$i]["faq_title"] = unesc($rows["title"]);
        //$faq[$i]["faq_text"] = format_comment($rows["description"]);
        //$faq[$i]["faq_link"] = unesc("index.php?page=faq#".$rows['id']);
        //faq2
        $faq2[$i]["posted_date"] = date("d/m/Y H:i",$rows["date"]-$offset);
        $faq2[$i]["faq_group_title"] = unesc(" <tr>
             <td class='header' align='center'>
              <b>".$rows["cat_title"]."</b>
             </td>
           </tr>");
        $faq2[$i]["faq_title"] = unesc($rows["title"]);
        $faq2[$i]["faq_text"] = format_comment($rows["description"]);
        //$faq2[$i]["faq_link"] = unesc($rows['id']);
        $id = $rows['cat_id'];
    }
    else 
    {
        //$faq[$i]["posted_date"] = date("d/m/Y H:i",$rows["news_date"]-$offset);
        //$faq[$i]["faq_title"] = unesc($rows["title"]);
        //$faq[$i]["faq_text"] = format_comment($rows["description"]);
        //$faq[$i]["faq_link"] = unesc("index.php?page=faq#".$rows['id']);
        //faq2
        $faq2[$i]["posted_date"] = date("d/m/Y H:i",$rows["news_date"]-$offset);
        $faq2[$i]["faq_title"] = unesc($rows["title"]);
        $faq2[$i]["faq_text"] = format_comment($rows["description"]);
        //$faq2[$i]["faq_link"] = unesc($rows['id']);        
    }    
      $i++;    
  }
//$sbg_logintpl -> set("faq", $faq);
$sbg_logintpl -> set("faq2", $faq2);	
}

$sbg_logintpl->set("THIS_BASEPATH", $THIS_BASEPATH);
echo $sbg_logintpl->fetch(load_template("sbg_login_new.tpl"));

?>