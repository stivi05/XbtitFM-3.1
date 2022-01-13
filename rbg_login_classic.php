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

require_once ($THIS_BASEPATH."/include/functions.php");
dbconn();

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
    $res = do_sqlquery("SELECT `inviter`, `confirmed` FROM `{$TABLE_PREFIX}invitations` WHERE `hash`='".$code."'", true);
    @$inv = mysqli_fetch_assoc($res);
    $inviter = $inv["inviter"];
    $confirmed = $inv["confirmed"];
}
//end Invitation System by dodge
$rbg_logintpl = new bTemplate();
include ($THIS_BASEPATH."/alt_login/classic/style_copyright.php");
$rbg_logintpl->set('xbtit_version', print_version());
$rbg_logintpl->set("alt_copyright", "[&nbsp;&nbsp;<u>Design By</u>: ".$design_copyright."&nbsp;&nbsp;]&nbsp;");
$rbg_logintpl->set("SITENAME", $SITENAME);
$rbg_logintpl->set("ERR", false, true);
if($btit_settings["fmhack_user_signup_agreement"] == "enabled")
{
    global $SITENAME, $btit_settings;
    $rbg_logintpl->set("ua4", $btit_settings["oa_one_text"]);
    $rbg_logintpl->set("ua5", $btit_settings["oa_two_text"]);
    $rbg_logintpl->set("ua8", $btit_settings["oa_three_text"]);
    $rbg_logintpl->set("ua9", $btit_settings["oa_four_text"]);
    require_once ("include/offset.php");
    $now = time();
    $date = date('l jS \of F Y h:i:s A', $now - $offset);
    $rbg_logintpl->set("ua6", $date);
    $rbg_logintpl->set("ua7", $SITENAME);
    $rbg_logintpl->set("agreement_enabled", (($btit_settings["fmhack_user_signup_agreement"] == "enabled" && $btit_settings["user_signup_agreement"] == "enabled")?false:true), true);
}
else
{
    $rbg_logintpl->set("agreement_enabled", (($btit_settings["fmhack_user_signup_agreement"] == "enabled" && $btit_settings["user_signup_agreement"] == "enabled")?true:false), true);
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
                    $rbg_logintpl->set("ERR", true, true);
                    $rbg_logintpl->set("ERR_MSG", $language["CSIGN_ERR"]);
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
        $rbg_logintpl->set("ERR", false, true);
        if(time() < $open || time() > $close)
        {
            $err_msg = $language["RREG_CLOSED_1"];
            if($btit_settings["fmhack_invitation_system"] == "enabled")
                $err_msg .= "<br /><br />".$language["RREG_CLOSED_2"];
            $rbg_logintpl->set("ERR", true, true);
            $rbg_logintpl->set("ERR_MSG", $err_msg);
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
            $rbg_logintpl->set("CAPTCHA", true, true);
            $rbg_logintpl->set("CAPTCHA_1", true, true);
            $rbg_logintpl->set("recover_captcha", $p->display_captcha(true));
            $private = $p->generate_private();
        }
        else
        {
            include ($THIS_BASEPATH."/include/security_code.php");
            $scode_index = rand(0, count($security_code) - 1);
            $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
            $scode .= $security_code[$scode_index]["question"];
            $rbg_logintpl->set("scode_question", $scode);
            $rbg_logintpl->set("CAPTCHA", false, true);
            $rbg_logintpl->set("CAPTCHA_1", false, true);
        }
    }
    else
    {
        include ($THIS_BASEPATH."/include/security_code.php");
        $scode_index = rand(0, count($security_code) - 1);
        $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
        $scode .= $security_code[$scode_index]["question"];
        $rbg_logintpl->set("scode_question", $scode);
        $rbg_logintpl->set("CAPTCHA", false, true);
        $rbg_logintpl->set("CAPTCHA_1", false, true);
    }
}
else
{
    include ($THIS_BASEPATH."/include/security_code.php");
    $scode_index = rand(0, count($security_code) - 1);
    $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
    $scode .= $security_code[$scode_index]["question"];
    $rbg_logintpl->set("scode_question", $scode);
    $rbg_logintpl->set("CAPTCHA", false, true);
    $rbg_logintpl->set("CAPTCHA_1", false, true);
}
if($btit_settings["rbg_login_language"] != "disabled")
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
    $rbg_logintpl->set("account_combo_language", $option);
}
if($btit_settings["rbg_login_style"] != "disabled")
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
    $rbg_logintpl->set("account_combo_style", $option);
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
$rbg_logintpl->set("account_combo_country", $option);
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
$rbg_logintpl->set("account_combo_timezone", $option);
$rbg_logintpl->set("language", $language);
$rbg_logintpl->set("login.action", "index.php?page=login"); //example set value
$rbg_logintpl->set("recover.action", "index.php?page=recover&amp;act=takerecover"); //example set value
$rbg_logintpl->set("scode_question", $security_code); //example set value
$pass_min_req = explode(",", $btit_settings["secsui_pass_min_req"]);
$rbg_logintpl->set("pass_min_char", $pass_min_req[0]);
$rbg_logintpl->set("pass_min_lct", $pass_min_req[1]);
$rbg_logintpl->set("pass_min_uct", $pass_min_req[2]);
$rbg_logintpl->set("pass_min_num", $pass_min_req[3]);
$rbg_logintpl->set("pass_min_sym", $pass_min_req[4]);
$rbg_logintpl->set("pass_char_plural", (($pass_min_req[0] == 1)?false:true), true);
$rbg_logintpl->set("pass_lct_plural", (($pass_min_req[1] == 1)?false:true), true);
$rbg_logintpl->set("pass_uct_plural", (($pass_min_req[2] == 1)?false:true), true);
$rbg_logintpl->set("pass_num_plural", (($pass_min_req[3] == 1)?false:true), true);
$rbg_logintpl->set("pass_sym_plural", (($pass_min_req[4] == 1)?false:true), true);
$rbg_logintpl->set("pass_lct_set", (($pass_min_req[1] > 0)?true:false), true);
$rbg_logintpl->set("pass_uct_set", (($pass_min_req[2] > 0)?true:false), true);
$rbg_logintpl->set("pass_num_set", (($pass_min_req[3] > 0)?true:false), true);
$rbg_logintpl->set("pass_sym_set", (($pass_min_req[4] > 0)?true:false), true);
$rbg_logintpl->set("account_action", "signup");
$rbg_logintpl->set("account_form_actionlink", htmlspecialchars("index.php?page=signup&act=signup&returnto=index.php"));
$rbg_logintpl->set("rbg_login_language_enabled", (($btit_settings["rbg_login_language"] == "enabled")?true:false), true);
$rbg_logintpl->set("rbg_login_style_enabled", (($btit_settings["rbg_login_style"] == "enabled")?true:false), true);
$rbg_logintpl->set("birthdays_enabled", (($btit_settings["fmhack_birthdays"] == "enabled")?true:false), true);
$rbg_logintpl->set("ssl_enabled", (($btit_settings["fmhack_force_ssl"] == "enabled")?true:false), true);
$rbg_logintpl->set("offline_enabled", (($btit_settings["fmhack_site_offline"] == "enabled" && $btit_settings["site_offline"] == "true")?true:false), true);
$rbg_logintpl->set("offline_enabled_1", (($btit_settings["fmhack_site_offline"] == "enabled" && $btit_settings["site_offline"] == "true")?true:false), true);
if($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_only"] == "true")
{
    $rbg_logintpl->set("invitation_enabled", (($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_system"] == "enabled")?true:false), true);
}
else
{
    $rbg_logintpl->set("invitation_enabled", (($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_system"] == "enabled")?false:true), true);
}
if($btit_settings["fmhack_site_offline"] == "enabled" && $btit_settings["site_offline"] == "true")
{
    $rbg_logintpl->set("offline_msg", $btit_settings["offline_msg"]);
}
else
{
    $rbg_logintpl->set("offline_msg", "");
}
if($btit_settings["fmhack_invitation_system"] == "enabled" && $btit_settings["invitation_only"] == "true")
{
    global $SITENAME, $INVITATIONSON, $code, $inviter;
    if($INVITATIONSON)
    {
        $rbg_logintpl->set("BY_INVITATION", true, true);
        $rbg_logintpl->set("account_IDcode", $code);
        $rbg_logintpl->set("account_IDinviter", $inviter);
    }
}
else
    $rbg_logintpl->set("BY_INVITATION", false, true);
$rbg_logintpl->set("ERR_LOGIN", false, true);
if($un == 1 || $bo == 1 || $pw == 1)
{
    $rbg_logintpl->set("ERR_LOGIN", true, true);
    $rbg_logintpl->set("ERR_LOGIN_MSG", (($un == 1)?"<body onLoad=\"makeAlert('".$language["ERR"]."' , '".$language["ERR_USERNAME_INCORRECT"]."');\">":(($bo == 1)?$msg:(($pw == 1)?"<body onLoad=\"makeAlert('".$language["ERR"]."' , '".$language["ERR_PASSWORD_INCORRECT"]."');\">":""))));
}
$rbg_logintpl->set("THIS_BASEPATH", $THIS_BASEPATH);
echo $rbg_logintpl->fetch(load_template("rbg_login_classic.tpl"));

?>