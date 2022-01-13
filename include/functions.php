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
$CURRENTPATH = dirname(__file__);
require_once $CURRENTPATH.'/common.php';
if(version_compare(PHP_VERSION, '5.0.0', '>='))
{
    error_reporting(E_ALL ^ E_NOTICE | E_STRICT);
}
else
{
    error_reporting(E_ALL ^ E_NOTICE);
}
//create some logging :)
require_once ($CURRENTPATH.'/conextra.php');
$signon = getConnection();
$prefix = getPrefix();
$logname = mysqli_fetch_row(do_sqlquery("SELECT `value` FROM {$prefix}settings WHERE `key`='php_log_name' LIMIT 1", $signon));
$logpath = mysqli_fetch_row(do_sqlquery("SELECT `value` FROM {$prefix}settings WHERE `key`='php_log_path' LIMIT 1", $signon));
$when = date("d.m.y");
ini_set('log_errors', 'On'); // enable or disable php error logging (use 'On' or 'Off')
ini_set('error_log', ''.(($logpath[0]!="/full/path/to/the/web/root/include/logs")?$logpath[0]:$CURRENTPATH."/logs").'/'.$logname[0].'_'.$when.'_.log'); // path to server-writable log file
#
// Emulate register_globals off
#
$php_version = explode(".", phpversion());
if($php_version[0] <= 5 && $php_version[1] <= 2)
{
    if(@ini_get('register_globals'))
    {
        $superglobals = array(
            $_SERVER,
            $_ENV,
            $_FILES,
            $_COOKIE,
            $_POST,
            $_GET);
        if(isset($_SESSION))
            array_unshift($superglobals, $_SESSION);
        foreach($superglobals as $superglobal)
            foreach($superglobal as $global => $value)
                unset($GLOBALS[$global]);
        @ini_set('register_globals', false);
    }
}

@date_default_timezone_set(@date_default_timezone_get());
include $CURRENTPATH.'/xbtit_version.php';
require_once $CURRENTPATH.'/config.php';
require_once $CURRENTPATH.'/common.php';
require_once $CURRENTPATH.'/smilies.php';
# protection against sql injection, xss attack
require_once $CURRENTPATH.'/crk_protection.php';
# including various classes
if($btit_settings["fmhack_bbcode_enhancements"] == "enabled")
    require_once $CURRENTPATH.'/class.bbcode_en.php';
else
    require_once $CURRENTPATH.'/class.bbcode.php';
require_once $CURRENTPATH.'/class.captcha.php';
require_once $CURRENTPATH.'/class.ajaxpoll.php';

if(!isset($TRACKER_ANNOUNCEURLS))
{
    $TRACKER_ANNOUNCEURLS = array();
    $TRACKER_ANNOUNCEURLS[] = $BASEURL.'/announce.php';
}
/*Mod by losmi -  rules mod */
function genrelistrules($append = '', $table = 'rules')
{
    global $TABLE_PREFIX;
    $ret = array();
    $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}$table WHERE active != '-1' ".$append." ORDER BY sort_index");
    while($row = mysqli_fetch_assoc($res))
        $ret[] = $row;
    unset($row);
    mysqli_free_result($res);
    return $ret;
}
/*End mod by losmi - rules mod*/
/*Mod by losmi - faq mod */
function genrelistfaq($append = '', $table = 'faq')
{
    global $TABLE_PREFIX;
    $ret = array();
    $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}$table WHERE active != '-1' ".$append." ORDER BY id");
    while($row = mysqli_fetch_assoc($res))
        $ret[] = $row;
    unset($row);
    mysqli_free_result($res);
    return $ret;
}
/*End mod by losmi - faq mod*/
function load_css($css_name)
{
    // control if input template name exist in current user's stylepath, else return default
    global $BASEURL, $STYLEPATH, $STYLEURL;
    if(@file_exists($STYLEPATH.'/'.$css_name))
        return $STYLEURL.'/'.$css_name;
    
}
function load_template($tpl_name)
{
    // control if input template name exist in current user's stylepath, else return default
    global $THIS_BASEPATH, $STYLEPATH;
    if(@file_exists($STYLEPATH.'/'.$tpl_name))
        return $STYLEPATH.'/'.$tpl_name;
    return $THIS_BASEPATH.'/style/templates/'.$tpl_name;
}
function load_language($mod_language_name)
{
    // control if input language exist in current user's language path, else return default
    global $THIS_BASEPATH, $USERLANG, $language;
    if(@file_exists($USERLANG.'/'.$mod_language_name))
    {
        if($USERLANG != $THIS_BASEPATH.'/language/english')
            include_once $THIS_BASEPATH.'/language/english/'.$mod_language_name;
        return $USERLANG.'/'.$mod_language_name;
    }
    return $THIS_BASEPATH.'/language/english/'.$mod_language_name;
}
function load_gallery_lang($mod_language_name)
{
    // control if input language exist in current user's language path, else return default
    global $THIS_BASEPATH, $USERLANG, $language;
    if(@file_exists(".".$THIS_BASEPATH.$USERLANG.'/'.$mod_language_name))
    {
        if($USERLANG != $THIS_BASEPATH.'/language/english')
            include_once $THIS_BASEPATH.'/language/english/'.$mod_language_name;
        return $THIS_BASEPATH.$USERLANG.'/'.$mod_language_name;
    }
    return $THIS_BASEPATH.'/language/english/'.$mod_language_name;
}
function get_combo($select, $opts = array())
{
    $name = (isset($opts['name']))?' name="'.$opts['name'].'"':'';
    $complete = (isset($opts['complete']))?(bool)$opts['complete']:false;
    $default = (isset($opts['default']))?$opts['default']:null;
    $id = (isset($opts['id']))?$opts['id']:'id';
    $value = (isset($opts['value']))?$opts['value']:'value';
    $combo = '';
    if($complete)
        $combo .= '<select'.$name.'>';
    foreach($select as $option)
    {
        $combo .= "\n".'<option ';
        if((!is_null($default)) && ($option[$id] == $default))
            $combo .= 'selected="selected" ';
        $combo .= 'value="'.$option[$id].'">'.unesc($option[$value]).'</option>';
    }
    if($complete)
        $combo .= '</select>';
    return $combo;
}
function get_microtime()
{
    return strtok(microtime(), ' ') + strtok('');
}
function print_debug($level = 3, $key = ' - ')
{
    global $time_start, $gzip, $num_queries, $cached_querys;
    $time_end = get_microtime();
    switch($level)
    {
        case '4':
            if(function_exists('memory_get_usage'))
            {
                $memory = '[ Memory: '.makesize(memory_get_usage());
                if(function_exists('memory_get_peak_usage'))
                    $memory .= '|'.makesize(memory_get_peak_usage());
                $return[] = $memory.' ]';
            }
        case '3':
            $return[] = '[ GZIP: '.$gzip.' ]';
        case '2':
            $return[] = '[ Script Execution: '.number_format(($time_end - $time_start), 4).' sec. ]';
        case '1':
            $return[] = '[ Queries: '.$num_queries.'|'.$cached_querys.' ]';
            break;
        default:
            return '';
    }
    return implode($key, array_reverse($return));
}
function print_version()
{
    global $tracker_version;
    return '[&nbsp;&nbsp;<u>xbtitFM v'.$tracker_version.' By</u>: <a href="https://xbtitfm.eu/" target="_blank">xbtitFM Team</a>&nbsp;Copyright &copy; 2004 - 2020 &nbsp;]';
}
function import_designer()
{
    global $STYLEPATH;
    if(file_exists($STYLEPATH.'/import_copyright.php'))
    {
        include ($STYLEPATH.'/import_copyright.php');
        $import_copyright = '[&nbsp;&nbsp;<u>Imported By</u>: '.$import_copyright.'&nbsp;&nbsp;]&nbsp;';
    }
    else
        $import_copyright = '';
    return $import_copyright;
}
function print_designer()
{
    global $STYLEPATH;
    if(file_exists($STYLEPATH.'/style_copyright.php'))
    {
        include ($STYLEPATH.'/style_copyright.php');
        $design_copyright = '[&nbsp;&nbsp;<u>Design By</u>: '.$design_copyright.'&nbsp;&nbsp;]&nbsp;';
    }
    else
        $design_copyright = '';
    return $design_copyright;
}
function print_top()
{
    return '<a href=\'#\'>Back To Top</a>';
}
// check online passed session and user's location
// this function will update the information into
// online table (session ID, ip, user id and location
function check_online($session_id, $location)
{
    global $TABLE_PREFIX, $CURUSER, $btit_settings;

    session_start();

    $overOneMinute=(((isset($_SESSION["ONLINE_EXPIRE"]) && time() > $_SESSION["ONLINE_EXPIRE"]) || !isset($_SESSION["ONLINE_EXPIRE"]))?true:false);
    $locationHasChanged=(((isset($_SESSION["ONLINE_LOCATION"]) && $_SESSION["ONLINE_LOCATION"]!=$location) || !isset($_SESSION["ONLINE_LOCATION"]))?true:false);

    $location = sqlesc($location);
    $ip = getip();
    $uid = max(1, (int)$CURUSER['uid']);
    $suffix = sqlesc($CURUSER['suffixcolor']);
    $prefix = sqlesc($CURUSER['prefixcolor']);
    $uname = sqlesc($CURUSER['username']);
    $ugroup = sqlesc($CURUSER['level']);
	  $immunity = sqlesc($CURUSER['immunity']);
    if($btit_settings["fmhack_user_images"] == "enabled")
        $uimg = sqlesc($CURUSER['user_images']);
    if($btit_settings["fmhack_hide_online_status"] == "enabled")
        $invisible = sqlesc($CURUSER['invisible']);
    // booted -->
    if($btit_settings["fmhack_booted"] == "enabled")
        $booted = sqlesc($CURUSER['booted']);
    // <-- booted
    // Warning System -->
    if($btit_settings["fmhack_warning_system"] == "enabled")
        $warn_lev = sqlesc($CURUSER['warn_lev']);
    // <-- Warning System
    if($btit_settings["fmhack_simple_donor_display"] == "enabled")
        $donor = sqlesc($CURUSER['donor']);
    if($uid == 1)
        $where = "WHERE `session_id`='".$session_id."' OR `user_ip`='".$ip."'";
    else
        $where = "WHERE `user_id`='".$uid."' OR `session_id`='".$session_id."' OR `user_ip`='".$ip."'";
    $query_modifier = "";
    if($btit_settings["fmhack_simple_donor_display"] == "enabled")
        $query_modifier .= "`donor`=".$donor.",";
    // booted -->
    if($btit_settings["fmhack_booted"] == "enabled")
        $query_modifier .= "`booted`=".$booted.",";
    // <-- booted
    // Warning System -->
    if($btit_settings["fmhack_warning_system"] == "enabled")
        $query_modifier .= "`warn_lev`=".$warn_lev.",";
    // <-- Warning System
    if($btit_settings["fmhack_hide_online_status"] == "enabled")
        $query_modifier .= "`invisible`=".$invisible.",";
    if($btit_settings["fmhack_user_images"] == "enabled")
        $query_modifier .= "`user_images`=".$uimg.",";
    if($locationHasChanged || $overOneMinute)
    {
        @quickQuery("UPDATE `{$TABLE_PREFIX}online` SET `session_id`='".$session_id."', `immunity`=".$immunity.", `user_name`=".$uname.", `user_group`=".$ugroup.", `prefixcolor`=".$prefix.", `suffixcolor`=".$suffix.", `location`=".$location.", `user_id`=".$uid.", ".$query_modifier." `lastaction`=UNIX_TIMESTAMP() ".$where);
        // record don't already exist, then insert it
        if(mysqli_affected_rows($GLOBALS['conn']) == 0)
        {
            @quickQuery("UPDATE `{$TABLE_PREFIX}users` SET `lastconnect`=NOW()".(($btit_settings["fmhack_advanced_prune_users_and_torrents"]=="enabled")?", `prune_last_warn`=0, `prune_level`=0":"")." WHERE `id`=".$uid." AND `id`>1");
            @quickQuery("INSERT INTO `{$TABLE_PREFIX}online` SET `session_id`='".$session_id."', `immunity`=".$immunity.", `user_name`=".$uname.", `user_group`=".$ugroup.", `prefixcolor`=".$prefix.", `suffixcolor`=".$suffix.", `user_id`=".$uid.", `user_ip`='".$ip."', `location`=".$location.", ".$query_modifier." `lastaction`=UNIX_TIMESTAMP()");
        }
    }
    if($overOneMinute)
    {
        $timeout = time() - (($btit_settings["fmhack_online_timeout"] == "enabled")?(int)0 + $btit_settings["online_timeout"]:900);
        @quickQuery("UPDATE `{$TABLE_PREFIX}users` `u` INNER JOIN `{$TABLE_PREFIX}online` `ol` ON `ol`.`user_id` = `u`.`id` SET ".(($btit_settings["fmhack_IP_to_country"] == "enabled")?"`u`.`country_name`=IF(`u`.`cip`!=`ol`.`user_ip`, 'unknown', `u`.`country_name`), `u`.`country_flag`=IF(`u`.`cip`!=`ol`.`user_ip`, 'unknown', `u`.`country_flag`), ":"").(($btit_settings["fmhack_total_online_time"] == "enabled")?" `u`.`tot_on` = `u`.`tot_on` + (UNIX_TIMESTAMP()- `ol`.`lastaction`), ":"").(($btit_settings["fmhack_advanced_prune_users_and_torrents"]=="enabled")?"`u`.`prune_last_warn`=0, `u`.`prune_level`=0, ":"")."`u`.`lastconnect`=NOW(), `u`.`cip`=`ol`.`user_ip`, `u`.`lip`=INET_ATON(`ol`.`user_ip`) WHERE `ol`.`user_id`>1");
        @quickQuery("DELETE FROM `{$TABLE_PREFIX}online` WHERE `lastaction`<".$timeout);
        $_SESSION["ONLINE_EXPIRE"]=(time()+60);
    }
    $_SESSION["ONLINE_LOCATION"]=trim($location, "'");
}
//Disallow special characters in username
function straipos($haystack, $array, $offset = 0)
{
    $occ = array();
    for($i = 0, $len = count($array); $i < $len; $i++)
    {
        $pos = strpos($haystack, $array[$i], $offset);
        if(is_bool($pos))
            continue;
        $occ[$pos] = $i;
    }
    if(empty($occ))
        return false;
    ksort($occ);
    reset($occ);
    list($key, $value) = each($occ);
    return array($key, $value);
}
// Even if you're missing PHP 4.3.0, the MHASH extension might be of use.
// Someone was kind enought to email this code snippit in.
if(function_exists('mhash') && (!function_exists('sha1')) && defined('MHASH_SHA1'))
{
    function sha1($str)
    {
        return bin2hex(mhash(MHASH_SHA1, $str));
    }
}
// begin of function added from original
function unesc($x)
{
    return stripslashes($x);
}
function mksecret($len = 20)
{
    $ret = '';
    for($i = 0; $i < $len; $i++)
        $ret .= chr(mt_rand(0, 255));
    return $ret;
}

function logincookie($row, $user, $expires = 0x7fffffff)
{
    global $btit_settings;
    $my_cookie_name = ((isset($btit_settings["secsui_cookie_name"]) && !empty($btit_settings["secsui_cookie_name"]))?$btit_settings["secsui_cookie_name"]:"xbtitFMLoginCookie");
    $my_cookie_path = ((isset($btit_settings["secsui_cookie_path"]) && !empty($btit_settings["secsui_cookie_path"]))?$btit_settings["secsui_cookie_path"]:"/");
    $my_cookie_domain = ((isset($btit_settings["secsui_cookie_domain"]) && !empty($btit_settings["secsui_cookie_domain"]))?$btit_settings["secsui_cookie_domain"]:false);
    if($btit_settings["secsui_cookie_type"] == 1)
    {
        setcookie('uid', $row["id"], $expires, '/');
        setcookie('pass', md5($row["random"].$row["password"].$row["random"]), $expires, '/');
    }
    elseif($btit_settings["secsui_cookie_type"] == 2 || $btit_settings["secsui_cookie_type"] == 3)
    {
        $cookie_items = explode(",", $btit_settings["secsui_cookie_items"]);
        $cookie_string = "";
        foreach($cookie_items as $ci_value)
        {
            $ci_exp = explode("-", $ci_value);
            if($ci_exp[0] == 8)
            {
                $ci_exp2 = explode("[+]", $ci_exp[1]);
                if($ci_exp2[0] == 1)
                {
                    $ip_parts = explode(".", getip());
                    if($ci_exp2[1] == 1)
                        $cookie_string .= $ip_parts[0]."-";
                    if($ci_exp2[1] == 2)
                        $cookie_string .= $ip_parts[1]."-";
                    if($ci_exp2[1] == 3)
                        $cookie_string .= $ip_parts[2]."-";
                    if($ci_exp2[1] == 4)
                        $cookie_string .= $ip_parts[3]."-";
                    if($ci_exp2[1] == 5)
                        $cookie_string .= $ip_parts[0].".".$ip_parts[1]."-";
                    if($ci_exp2[1] == 6)
                        $cookie_string .= $ip_parts[1].".".$ip_parts[2]."-";
                    if($ci_exp2[1] == 7)
                        $cookie_string .= $ip_parts[2].".".$ip_parts[3]."-";
                    if($ci_exp2[1] == 8)
                        $cookie_string .= $ip_parts[0].".".$ip_parts[2]."-";
                    if($ci_exp2[1] == 9)
                        $cookie_string .= $ip_parts[0].".".$ip_parts[3]."-";
                    if($ci_exp2[1] == 10)
                        $cookie_string .= $ip_parts[1].".".$ip_parts[3]."-";
                    if($ci_exp2[1] == 11)
                        $cookie_string .= $ip_parts[0].".".$ip_parts[1].".".$ip_parts[2]."-";
                    if($ci_exp2[1] == 12)
                        $cookie_string .= $ip_parts[1].".".$ip_parts[2].".".$ip_parts[3]."-";
                    if($ci_exp2[1] == 13)
                        $cookie_string .= $ip_parts[0].".".$ip_parts[1].".".$ip_parts[2].".".$ip_parts[3]."-";
                    unset($ci_exp2);
                }
            }
            else
            {
                if($ci_exp[0] == 1 && $ci_exp[1] == 1)
                {
                    $cookie_string .= $row["id"]."-";
                }
                if($ci_exp[0] == 2 && $ci_exp[1] == 1)
                {
                    $cookie_string .= $row["password"]."-";
                }
                if($ci_exp[0] == 3 && $ci_exp[1] == 1)
                {
                    $cookie_string .= $row["random"]."-";
                }
                if($ci_exp[0] == 4 && $ci_exp[1] == 1)
                {
                    $cookie_string .= strtolower($user)."-";
                }
                if($ci_exp[0] == 5 && $ci_exp[1] == 1)
                {
                    $cookie_string .= $row["salt"]."-";
                }
                if($ci_exp[0] == 6 && $ci_exp[1] == 1)
                {
                    $cookie_string .= $_SERVER["HTTP_USER_AGENT"]."-";
                }
                if($ci_exp[0] == 7 && $ci_exp[1] == 1)
                {
                    $cookie_string .= $_SERVER["HTTP_ACCEPT_LANGUAGE"]."-";
                }
            }
            unset($ci_exp);
        }
        $final_cookie = serialize(array("id" => $row["id"], "hash" => sha1(trim($cookie_string, "-"))));
        if($btit_settings["secsui_cookie_type"] == 2)
        {
            $my_mult = 60;
            if($btit_settings["secsui_cookie_exp2"] == 2)
                $my_mult = 3600;
            elseif($btit_settings["secsui_cookie_exp2"] == 3)
                $my_mult = 86400;
            elseif($btit_settings["secsui_cookie_exp2"] == 4)
                $my_mult = 604800;
            elseif($btit_settings["secsui_cookie_exp2"] == 5)
                $my_mult = 2592000;
            elseif($btit_settings["secsui_cookie_exp2"] == 6)
                $my_mult = 31536000;
            $my_cookie_expire = (($btit_settings["secsui_cookie_exp1"] * $my_mult) + time());
            if($my_cookie_expire > 2147483647)
                $my_cookie_expire = $expires;
            setcookie("$my_cookie_name", "$final_cookie", $my_cookie_expire, "$my_cookie_path", "$my_cookie_domain");
        }
        else
        {
            session_start();
            $_SESSION["login_cookie"] = $final_cookie;
        }
    }
    else
        return;
}
function logoutcookie()
{
    global $btit_settings;
    $my_cookie_name = ((isset($btit_settings["secsui_cookie_name"]) && !empty($btit_settings["secsui_cookie_name"]))?$btit_settings["secsui_cookie_name"]:"xbtitFMLoginCookie");
    $my_cookie_path = ((isset($btit_settings["secsui_cookie_path"]) && !empty($btit_settings["secsui_cookie_path"]))?$btit_settings["secsui_cookie_path"]:"/");
    $my_cookie_domain = ((isset($btit_settings["secsui_cookie_domain"]) && !empty($btit_settings["secsui_cookie_domain"]))?$btit_settings["secsui_cookie_domain"]:false);
    setcookie("uid", "", (time() - 3600), "/");
    setcookie("pass", "", (time() - 3600), "/");
    setcookie("$my_cookie_name", "", (time() - 3600), "$my_cookie_path", "$my_cookie_domain");
    setcookie("$my_cookie_name", "", (time() - 3600), "/");
    session_start();
    $_SESSION = array();
    unset($_SESSION["login_cookie"]);
    setcookie("xbtitFM", "", time() - 3600, "/");
    session_destroy();
}
function hash_pad($hash)
{
    return str_pad($hash, 20);
}

function immunity($arr)
{
 
$immpic = "shield.png";
$style = "style=\"margin-left: 4pt\""; 

$picss = $arr["immunity"]=="yes" ? "<img src=\"./images/$immpic\" title=\"User Has Immunity!\" alt=\"User Has Immunity!\" border=\"0\" $style />" : "";
return $picss;
}
      
// booted -->
function booted($arr, $unboot = false)
{
    global $language;
    if($unboot)
    {
        $bootpic = "booted.gif";
        $style = "style=\"margin-left: 4pt\"";
    }
    else
    {
        $bootpic = "booted.gif";
        $style = "style=\"margin-left: 2pt\"";
    }
    $pic = $arr["booted"] == "yes"?"<img title=\"".$language['BOOT_DISABLED']."\" src=\"images/$bootpic\" alt=\"".$language['BOOT_DISABLED']."\" border=\"0\" $style />":"";
    return $pic;
}
// <-- booted
// Warning System -->
function warn($arr, $big = false)
{
    global $language;
    if($big)
    {
        $warnpic = "warn.gif";
        $style = "style=\"margin-left: 4pt\"";
    }
    else
    {
        $warnpic = "warn.gif";
        $style = "style=\"margin-left: 2pt\"";
    }
    $pics = $arr["warn_lev"] > 0?"<img title=\"".$language['WS_WARNED_USER']."\" src=\"images/$warnpic\" alt=\"".$language['WS_WARNED_USER']."\" border=\"0\" $style />":"";
    return $pics;
}
// <-- Warning System 
if($btit_settings["fmhack_bot_visits"] == "enabled")
{     
function crawlerDetect($USER_AGENT)
{
$crawlers = array(array('Slurp/2.0 (slurp@inktomi.com; http://www.inktomi.com/slurp.html)', 'Slurp/2.0'),array('Mediapartners-Google', 'Google-MP'),array('Google-Sitemaps', 'Google-SM'),array('InfoSeek Robot 1.0', 'InfoSeek'),array('Googlebot/2.1', 'Google-BOT 2'),array('GoogleBot', 'Google-BOT'),array('msnbot', 'MSN-BOT'),array('Rambler', 'Rambler-BOT'),array('Yahoo', 'Yahoo-BOT'), array('AbachoBOT', 'Abacho-BOT'),array('accoona', 'Accoona'),array('AcoiRobot', 'Acoi-Robot'),array('ASPSeek', 'ASPSeek'), array('CrocCrawler', 'CrocCrawler'),array('Dumbot', 'Dumbot'),array('FAST-WebCrawler', 'F-WebCrawler'),array('GeonaBot', 'Geona-BOT'),array('Gigabot', 'Giga-BOT'),array('Lycos', 'Lycos spider'),array('MSRBOT', 'MSR-BOT'),array('Scooter', 'Altavista robot'),array('AltaVista', 'Altavista robot'),array('IDBot', 'ID-Search-BOT'),array('eStyle', 'eStyle-BOT'),array('Scrubby', 'Scrubby robot'));

foreach ($crawlers as $c)
{
if (stristr($USER_AGENT, $c[0]))
{
return($c[1]);
}
}
return false;
}
}
function userlogin($authcode=false)
{
    global $CURUSER, $TABLE_PREFIX, $err_msg_install, $btit_settings, $update_interval, $THIS_BASEPATH, $STYLEPATH, $STYLEURL, $STYLETYPE, $BASEURL, $USERLANG;
    unset($GLOBALS['CURUSER']);
    session_start();
    $ip = getip(); //$_SERVER["REMOTE_ADDR"];
    $nip = ip2long($ip);
    $res = get_result("SELECT * FROM {$TABLE_PREFIX}bannedip WHERE INET_ATON('".$ip."') >= first AND INET_ATON('".$ip."') <= last LIMIT 1;", true, $btit_settings['cache_duration']);
    if(count($res) > 0)
    {
        header('HTTP/1.0 403 Forbidden');

?>
        <html><body><h1>403 Forbidden</h1>Unauthorized IP address.</body></html>
        <?php
        die();
    }
    if(!$authcode)
    {
        if(isset($_SESSION["CURUSER"]) && isset($_SESSION["CURUSER_EXPIRE"]))
        {
            if(!isset($STYLEPATH) || empty($STYLEPATH))
                $STYLEPATH = ((is_null($_SESSION["CURUSER"]["style_path"]))?$THIS_BASEPATH."/style/Xbtit_Original":$_SESSION["CURUSER"]["style_path"]);
            if(!isset($STYLEURL) || empty($STYLEURL))
                $STYLEURL = ((is_null($_SESSION["CURUSER"]["style_url"]))?$BASEURL."/style/Xbtit_Original":$_SESSION["CURUSER"]["style_url"]);
            if(!isset($STYLETYPE) || empty($STYLETYPE))
                $STYLETYPE = ((is_null($_SESSION["CURUSER"]["style_type"]))?3:(int)0 + $_SESSION["CURUSER"]["style_type"]);
            if(!isset($USERLANG) || empty($USERLANG))
                $USERLANG = ((is_null($_SESSION["CURUSER"]["language_path"]))?$THIS_BASEPATH."/language/english":$THIS_BASEPATH."/".$_SESSION["CURUSER"]["language_url"]);
            $GLOBALS["CURUSER"] = $_SESSION["CURUSER"];
            if($_SESSION["CURUSER_EXPIRE"] > time())
            {
                return;
            }
        }
    }
    if($btit_settings['xbtt_use'])
    {
        $udownloaded = "`u`.`downloaded`+IFNULL(`x`.`downloaded`,0)";
        $uuploaded = "`u`.`uploaded`+IFNULL(`x`.`uploaded`,0)";
        $utables = "`{$TABLE_PREFIX}users` `u` LEFT JOIN `xbt_users` `x` ON `x`.`uid`=`u`.`id`";
    }
    else
    {
        $udownloaded = "`u`.`downloaded`";
        $uuploaded = "`u`.`uploaded`";
        $utables = "`{$TABLE_PREFIX}users` `u`";
    }
    // guest
    if($btit_settings["secsui_cookie_type"] == 1)
        $id = (isset($_COOKIE["uid"]) && is_numeric($_COOKIE["uid"]) && $_COOKIE["uid"] > 1)?$id = (int)0 + $_COOKIE["uid"]:$id = 1;
    elseif($btit_settings["secsui_cookie_type"] == 2)
    {
        $user_cookie_name = ((isset($btit_settings["secsui_cookie_name"]) && !empty($btit_settings["secsui_cookie_name"]))?$btit_settings["secsui_cookie_name"]:"xbtitFMLoginCookie");
        if(isset($_COOKIE[$user_cookie_name]))
        {
            $user_cookie = unserialize($_COOKIE[$user_cookie_name]);
            $id = ((is_numeric($user_cookie["id"]) && $user_cookie["id"] > 1)?(int)0 + $user_cookie["id"]:$id = 1);
        }
        else
            $id = 1;
    }
    elseif($btit_settings["secsui_cookie_type"] == 3)
    {
        if(isset($_SESSION["login_cookie"]))
        {
            $user_cookie = unserialize($_SESSION["login_cookie"]);
            $id = ((is_numeric($user_cookie["id"]) && $user_cookie["id"] > 1)?(int)0 + $user_cookie["id"]:$id = 1);
        }
        else
            $id = 1;
    }
    $query1_select = "";
    $query1_join = "";
    if($btit_settings["fmhack_simple_donor_display"] == "enabled")
        $query1_select .= "`u`.`donor`,";
    if($btit_settings["fmhack_booted"] == "enabled")
        $query1_select .= "`u`.`booted`,";
    if($btit_settings["fmhack_warning_system"] == "enabled")
        $query1_select .= "`u`.`warn_lev`,";
    if($btit_settings["fmhack_bonus_system"] == "enabled")
        $query1_select .= "`u`.`seedbonus`,";
    if($btit_settings["fmhack_invitation_system"] == "enabled")
        $query1_select .= "`u`.`invitations`,";
    if($btit_settings["fmhack_shoutbox_banned"] == "enabled")
        $query1_select .= "`u`.`sbox`,";
    if($btit_settings["fmhack_LED_ticker"] == "enabled" || $btit_settings["fmhack_downloaded_torrents"] == "enabled" || $btit_settings["fmhack_torrent_activity_colouring"] == "enabled")
        $query1_select .= "`u`.`pid`,";
    if($btit_settings["fmhack_download_ratio_checker"] == "enabled")
        $query1_select .= "`u`.`dlrandom`,";
    if($btit_settings["fmhack_avatar_signature_sync"] == "enabled")
        $query1_select .= "`u`.`sig`,";
    if($btit_settings["fmhack_enhanced_wait_time"] == "enabled")
    {
        if($btit_settings['xbtt_use'])
            $query1_select .= "`x`.`wait_time`,";
        $query1_select .= "`u`.`custom_wait_time`, `u`.`php_cust_wait_time`,";
    }
    if($btit_settings["fmhack_ban_button"] == "enabled")
        $query1_select .= "`u`.`ban`,";
    if($btit_settings["fmhack_advanced_auto_donation_system"] == "enabled")
        $query1_select .= "`u`.`rank_switch`, UNIX_TIMESTAMP(`u`.`timed_rank`) `timed_rank`, `u`.`old_rank`,";
    if($btit_settings["fmhack_uploader_medals"] == "enabled")
        $query1_select .= "`u`.`up_med`,";
    if($btit_settings["fmhack_teams"] == "enabled")
        $query1_select .= "`u`.`team`,";
    if($btit_settings["fmhack_private_shouts"] == "enabled")
        $query1_select .= "`u`.`pchat`,";
    if($btit_settings["fmhack_lock_comments"] == "enabled")
        $query1_select .= "`u`.`block_comment`,";
    if($btit_settings["fmhack_account_parked"] == "enabled")
        $query1_select .= "`u`.`is_parked` `parked`,";
    if($btit_settings["fmhack_anti_hit_and_run_system"] == "enabled")
    {
        $query1_select .= "`u`.`hnr_count`, `hnr`.`block_leech`,";
        $query1_join .= "LEFT JOIN `{$TABLE_PREFIX}hnr` `hnr` ON `u`.`id_level`=`hnr`.`id_level` ";
    }
    if($btit_settings["fmhack_low_ratio_ban_system"] == "enabled")
        $query1_select .= "`u`.`bandt`,";
    if($btit_settings["fmhack_hide_online_status"] == "enabled")
        $query1_select .= "`u`.`invisible`,";
    if($btit_settings["fmhack_allow_and_disallow_users_to_up_and_download"] == "enabled")
        $query1_select .= "`u`.`allowdownload`, `u`.`allowupload`,";
    if($btit_settings["fmhack_detect_and_blacklist_proxy"] == "enabled")
        $query1_select .= "`u`.`proxy`,";
    if($btit_settings["fmhack_birthdays"] == "enabled")
        $query1_select .= "`u`.`dob`,";
    if($btit_settings["fmhack_PM_banned"] == "enabled")
        $query1_select .= "`u`.`pmbanned`,";
    if($btit_settings["fmhack_IP_to_country"] == "enabled")
        $query1_select .= "`u`.`country_flag`, `u`.`country_name`,";
    if($btit_settings["fmhack_user_notes"] == "enabled")
        $query1_select .= "`u`.`user_notes`,";
    if($btit_settings["fmhack_forced_FAQ"] == "enabled")
        $query1_select .= "`u`.`viewed_faq`,";
    if($btit_settings["fmhack_user_images"] == "enabled")
        $query1_select .= "`u`.`user_images`,";
    if($btit_settings["fmhack_about_me"] == "enabled")
        $query1_select .= "`u`.`about_me`,";
    if($btit_settings["fmhack_user_watch_list"] == "enabled")
        $query1_select .= "`u`.`IS_WATCHED`,";
    if($btit_settings["fmhack_force_ssl"] == "enabled")
        $query1_select .= "`u`.`force_ssl`,";
    if($btit_settings["fmhack_custom_title"] == "enabled")
        $query1_select .= "`u`.`custom_title`,";
    if($btit_settings["fmhack_show_or_hide_porn"] == "enabled")
        $query1_select .= "`u`.`showporn`,";
    if($btit_settings["fmhack_private_profile"] == "enabled")
        $query1_select .= "`u`.`profileview`,";
    if($btit_settings["fmhack_signature_on_internal_forum"] == "enabled")
        $query1_select .= "`u`.`signature`,";
    if($btit_settings["fmhack_total_online_time"] == "enabled")
        $query1_select .= "`u`.`tot_on`,";
    if($btit_settings["fmhack_advanced_RSS_feed"] == "enabled")
        $query1_select .= "`u`.`custom_rss`,";
    if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
        $query1_select .= "`u`.`vipfl_down`,";
    if($btit_settings["fmhack_default_cat_browse"]=="enabled")
        $query1_select.="`u`.`catins`,";
    if($btit_settings["fmhack_freeleech_slots"]=="enabled")
        $query1_select.="`u`.`freeleech_slots`, `u`.`freeleech_slot_hashes`,";
    if($btit_settings["fmhack_pM_notification_on_torrent_comment"]=="enabled")
        $query1_select.="`u`.`commentpm`,";
    if($btit_settings["fmhack_previous_usernames"]=="enabled")
        $query1_select.="`u`.`previous_names`,";
    if($btit_settings["fmhack_download_requires_introduction"]=="enabled")
        $query1_select.="`u`.`made_intro`,";
    if($id > 1)
    {
        $res = do_sqlquery("SELECT ".$query1_select."  u.immunity, u.signature, `u`.`salt`, `u`.`pass_type`, `u`.`lip`, `u`.`cip`, $udownloaded `downloaded`, $uuploaded `uploaded`, `u`.`smf_fid`, `u`.`ipb_fid`,  `u`.`topicsperpage`, `u`.`postsperpage`, `u`.`torrentsperpage`, `u`.`flag`, `u`.`avatar`, UNIX_TIMESTAMP(`u`.`lastconnect`) `lastconnect`, UNIX_TIMESTAMP(`u`.`joined`) `joined`, `u`.`id` `uid`, `u`.`username`, `u`.`password`, `u`.`random`, `u`.`email`, `u`.`language`, `u`.`style`, `u`.`time_offset`, `ul`.*, `s`.`style_url`, `s`.`style_type`, `l`.`language_url` FROM $utables INNER JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id` LEFT JOIN `{$TABLE_PREFIX}style` `s` ON `u`.`style`=`s`.`id` LEFT JOIN `{$TABLE_PREFIX}language` `l` ON `u`.`language`=`l`.`id` ".
            $query1_join." WHERE `u`.`id` = $id LIMIT 1;", true);
        $row = mysqli_fetch_assoc($res);
        if($btit_settings["secsui_cookie_type"] == 1)
        {
            if(md5($row["random"].$row["password"].$row["random"]) != $_COOKIE["pass"])
                $id = 1;
        }
        elseif($btit_settings["secsui_cookie_type"] == 2 || $btit_settings["secsui_cookie_type"] == 3)
        {
            $cookie_items = explode(",", $btit_settings["secsui_cookie_items"]);
            $cookie_string = "";
            foreach($cookie_items as $ci_value)
            {
                $ci_exp = explode("-", $ci_value);
                if($ci_exp[0] == 8)
                {
                    $ci_exp2 = explode("[+]", $ci_exp[1]);
                    if($ci_exp2[0] == 1)
                    {
                        $ip_parts = explode(".", getip());
                        if($ci_exp2[1] == 1)
                            $cookie_string .= $ip_parts[0]."-";
                        if($ci_exp2[1] == 2)
                            $cookie_string .= $ip_parts[1]."-";
                        if($ci_exp2[1] == 3)
                            $cookie_string .= $ip_parts[2]."-";
                        if($ci_exp2[1] == 4)
                            $cookie_string .= $ip_parts[3]."-";
                        if($ci_exp2[1] == 5)
                            $cookie_string .= $ip_parts[0].".".$ip_parts[1]."-";
                        if($ci_exp2[1] == 6)
                            $cookie_string .= $ip_parts[1].".".$ip_parts[2]."-";
                        if($ci_exp2[1] == 7)
                            $cookie_string .= $ip_parts[2].".".$ip_parts[3]."-";
                        if($ci_exp2[1] == 8)
                            $cookie_string .= $ip_parts[0].".".$ip_parts[2]."-";
                        if($ci_exp2[1] == 9)
                            $cookie_string .= $ip_parts[0].".".$ip_parts[3]."-";
                        if($ci_exp2[1] == 10)
                            $cookie_string .= $ip_parts[1].".".$ip_parts[3]."-";
                        if($ci_exp2[1] == 11)
                            $cookie_string .= $ip_parts[0].".".$ip_parts[1].".".$ip_parts[2]."-";
                        if($ci_exp2[1] == 12)
                            $cookie_string .= $ip_parts[1].".".$ip_parts[2].".".$ip_parts[3]."-";
                        if($ci_exp2[1] == 13)
                            $cookie_string .= $ip_parts[0].".".$ip_parts[1].".".$ip_parts[2].".".$ip_parts[3]."-";
                        unset($ci_exp2);
                    }
                }
                else
                {
                    if($ci_exp[0] == 1 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= $row["uid"]."-";
                    }
                    if($ci_exp[0] == 2 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= $row["password"]."-";
                    }
                    if($ci_exp[0] == 3 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= $row["random"]."-";
                    }
                    if($ci_exp[0] == 4 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= strtolower($row["username"])."-";
                    }
                    if($ci_exp[0] == 5 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= $row["salt"]."-";
                    }
                    if($ci_exp[0] == 6 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= $_SERVER["HTTP_USER_AGENT"]."-";
                    }
                    if($ci_exp[0] == 7 && $ci_exp[1] == 1)
                    {
                        $cookie_string .= $_SERVER["HTTP_ACCEPT_LANGUAGE"]."-";
                    }
                }
                unset($ci_exp);
            }
            $final_cookie["hash"] = sha1(trim($cookie_string, "-"));
            if($final_cookie["hash"] != $user_cookie["hash"])
                $id = 1;
        }
    }
    if($id == 1 && is_array($authcode) && count($authcode)>0)
    {
        $res = do_sqlquery("SELECT ".$query1_select." u.immunity, u.signature, `u`.`salt`, `u`.`pass_type`, `u`.`lip`, `u`.`cip`, $udownloaded `downloaded`, $uuploaded `uploaded`, `u`.`smf_fid`, `u`.`ipb_fid`,  `u`.`topicsperpage`, `u`.`postsperpage`, `u`.`torrentsperpage`, `u`.`flag`, `u`.`avatar`, UNIX_TIMESTAMP(`u`.`lastconnect`) `lastconnect`, UNIX_TIMESTAMP(`u`.`joined`) `joined`, `u`.`id` `uid`, `u`.`username`, `u`.`password`, `u`.`random`, `u`.`email`, `u`.`language`, `u`.`style`, `u`.`time_offset`, `ul`.*, `s`.`style_url`, `s`.`style_type`, `l`.`language_url` FROM $utables INNER JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id` LEFT JOIN `{$TABLE_PREFIX}style` `s` ON `u`.`style`=`s`.`id` LEFT JOIN `{$TABLE_PREFIX}language` `l` ON `u`.`language`=`l`.`id` ".
            $query1_join." WHERE `u`.`id`='".mysqli_real_escape_string($GLOBALS['conn'],$authcode[1])."' AND `u`.`password` LIKE '".mysqli_real_escape_string($GLOBALS['conn'],$authcode[2])."%' AND `u`.`password` LIKE '%".mysqli_real_escape_string($GLOBALS['conn'],$authcode[0]).
            "' AND `u`.`random`='".mysqli_real_escape_string($GLOBALS['conn'],$authcode[3])."' AND `u`.`id`>1 LIMIT 1;", true);
        $row = mysqli_fetch_assoc($res);
    }
    elseif($id == 1 && !$authcode)
    {
        $res = do_sqlquery("SELECT ".$query1_select." u.immunity, u.signature, `u`.`salt`, `u`.`pass_type`, `u`.`lip`, `u`.`cip`, $udownloaded `downloaded`, $uuploaded `uploaded`, `u`.`smf_fid`, `u`.`ipb_fid`,  `u`.`topicsperpage`, `u`.`postsperpage`, `u`.`torrentsperpage`, `u`.`flag`, `u`.`avatar`, UNIX_TIMESTAMP(`u`.`lastconnect`) `lastconnect`, UNIX_TIMESTAMP(`u`.`joined`) `joined`, `u`.`id` `uid`, `u`.`username`, `u`.`password`, `u`.`random`, `u`.`email`, `u`.`language`, `u`.`style`, `u`.`time_offset`, `ul`.*, `s`.`style_url`, `s`.`style_type`, `l`.`language_url` FROM $utables INNER JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id` LEFT JOIN `{$TABLE_PREFIX}style` `s` ON `u`.`style`=`s`.`id` LEFT JOIN `{$TABLE_PREFIX}language` `l` ON `u`.`language`=`l`.`id` ".
            $query1_join." WHERE `u`.`id` = 1 LIMIT 1;", true);
        $row = mysqli_fetch_assoc($res);
    }
    if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
    {
        if($row["freeleech"] == "yes")
        {
            $row["downloaded"] = $row["vipfl_down"];
        }
    }
    if($btit_settings["fmhack_low_ratio_ban_system"] == "enabled")
    {
        if($row["bandt"] == "yes")
        {
            header('HTTP/1.0 403 Forbidden');

?>
            <html><body><h1>403 Forbidden</h1>You are Banned from this site!</body></html>
            <?php
            die();
        }
    }
    if($btit_settings["fmhack_ban_button"] == "enabled")
    {
        if($row["ban"] == "yes")
        {
            header('HTTP/1.0 403 Forbidden');

?>
            <html><body><h1>403 Forbidden</h1>You are Banned from this site!</body></html>
            <?php
            die();
        }
    }
    if($btit_settings["fmhack_detect_and_blacklist_proxy"] == "enabled")
    {
        if($id > 1)
        {
            //proxy
            $respr = do_sqlquery("SELECT `id` FROM `{$TABLE_PREFIX}blacklist` WHERE `tip`=INET_ATON('".$ip."')", true);
            if(@mysqli_num_rows($respr) > 0 || $_SERVER["HTTP_X_FORWARDED_FOR"] || $_SERVER["HTTP_X_FORWARDED"] || $_SERVER["HTTP_FORWARDED_FOR"] || $_SERVER["HTTP_VIA"] || $_SERVER["HTTP_FORWARDED"] || $_SERVER["HTTP_FORWARDED_FOR_IP"] ||
                $_SERVER["HTTP_PROXY_CONNECTION"] || $_SERVER["VIA"] || $_SERVER["X_FORWARDED_FOR"] || $_SERVER["FORWARDED_FOR"] || $_SERVER["FORWARDED"] || $_SERVER["X_FORWARDED"] || $_SERVER["CLIENT_IP"] || $_SERVER["FORWARDED_FOR_IP"] ||
                $_SERVER["HTTP_CLIENT_IP"] || in_array($_SERVER['REMOTE_PORT'], array(
                8080,
                80,
                6588,
                8000,
                3128,
                553,
                554)))
                $proxy = 'yes';
            else
                $proxy = 'no';
            if($row["proxy"] != $proxy)
                quickQuery("UPDATE `{$TABLE_PREFIX}users` SET `proxy`='".$proxy."' WHERE `id`=".$id);
            //proxy
        }
    }
    // ip to country
    if($btit_settings["fmhack_IP_to_country"] == "enabled")
    {
        if($id > 1)
        {
            if($row["country_name"] == 'unknown')
            {
                $sqlquery = "SELECT c.name, c.flagpic ";
                $sqlquery .= "FROM {$TABLE_PREFIX}countries AS c ";
                $sqlquery .= "LEFT JOIN {$TABLE_PREFIX}ip2country AS i ON i.country_code2 = c.domain ";
                $sqlquery .= "WHERE i.ip_from <= INET_ATON('".$row["cip"]."') ";
                $sqlquery .= "AND i.ip_to >= INET_ATON('".$row["cip"]."')  ";
                $rest = do_sqlquery($sqlquery, true);
                if(@mysqli_num_rows($rest) > 0)
                {
                    $row1 = mysqli_fetch_assoc($rest);
                    $show4 = $row1["name"];
                    $show5 = $row1["flagpic"];
                }
                else
                {
                    $show4 = 'unknown';
                    $show5 = 'unknown';
                }
                quickQuery("UPDATE `{$TABLE_PREFIX}users` SET `country_flag`='".mysqli_real_escape_string($GLOBALS['conn'],$show5)."', `country_name`='".mysqli_real_escape_string($GLOBALS['conn'],$show4)."' WHERE `id`= $id");
            }
        }
    }
if($btit_settings["fmhack_bot_visits"] == "enabled")
{     
    // bots start 
$crawler = crawlerDetect($_SERVER['HTTP_USER_AGENT']);

if ($crawler )
{
@quickQuery("INSERT INTO {$TABLE_PREFIX}bots (name,visit) VALUES ('$crawler',NOW())") or die(mysqli_error($GLOBALS['conn']));
}
else
{
// usual visitor
}
// bots end
} 
      // CHECK FOR INSTALLATION FOLDER WITHOUT INSTALL.ME
    if($row['id_level'] == 8 && (file_exists('install.php') || file_exists('upgrade.php'))) // only owner level

        $err_msg_install = '<div align="center" style="color:red; font-size:12pt; font-weight: bold;">SECURITY WARNING: Delete install.php & upgrade.php!</div>';
    elseif($btit_settings["site_offline"] && $row["id_level"] == 8)
        $err_msg_install = ("<div align=\"center\" style=\"color:red; font-size:12pt; font-weight: bold;\">REMEMBER: ".$btit_settings["name"]." is currently offline.</div>");
    else
        $err_msg_install = '';
    if(!isset($STYLEPATH) || empty($STYLEPATH))
        $STYLEPATH = $THIS_BASEPATH."/".((is_null($row["style_url"]))?"style/Xbtit_Original":$row["style_url"]);
    if(!isset($STYLEURL) || empty($STYLEURL))
        $STYLEURL = $BASEURL."/".((is_null($row["style_url"]))?"style/Xbtit_Original":$row["style_url"]);
    if(!isset($STYLETYPE) || empty($STYLETYPE))
        $STYLETYPE = ((is_null($row["style_type"]))?3:(int)0 + $row["style_type"]);
    if(!isset($USERLANG) || empty($USERLANG))
        $USERLANG = ((is_null($row["language_url"]))?$THIS_BASEPATH."/language/english":$THIS_BASEPATH."/".$row["language_url"]);
    unset($_SESSION["CURUSER"], $_SESSION["CURUSER_EXPIRE"]);
    $_SESSION["CURUSER"] = $row;
    $_SESSION["CURUSER"]["style_url"] = $STYLEURL;
    $_SESSION["CURUSER"]["style_path"] = $STYLEPATH;
    $_SESSION["CURUSER"]["style_type"] = $STYLETYPE;
    $_SESSION["CURUSER"]["language_path"] = $USERLANG;
    $_SESSION["CURUSER_EXPIRE"] = (time() + $btit_settings["cache_duration"]);
    $GLOBALS["CURUSER"] = $_SESSION["CURUSER"];
    if ($res) @mysqli_free_result($res);
    unset($row);
}
function dbconn($do_clean = false)
{
    global $dbhost, $dbuser, $dbpass, $database, $language;
    $GLOBALS['conn'] = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(!$GLOBALS['conn'])
    {
        switch(mysqli_errno($GLOBALS['conn']))
        {
            case 1040:
            case 2002:
                if($_SERVER['REQUEST_METHOD'] == 'GET')
                    die('<html><head><meta http-equiv=refresh content="20;'.$_SERVER['REQUEST_URI'].'"></head><body><table border="0" width="100%" height="100%"><tr><td><h3 align="center">'.$language['ERR_SERVER_LOAD'].
                        '</h3></td></tr></table></body></html>');
                die($language['ERR_CANT_CONNECT']);
            default:
                die('['.mysqli_errno($GLOBALS['conn']).'] dbconn: mysqli_connect: '.mysqli_error($GLOBALS['conn']));
        }
    }
    if($GLOBALS["charset"]=="UTF-8")
        mysqli_query($GLOBALS['conn'], "SET NAMES utf8");
    mysqli_select_db($GLOBALS['conn'],$database) or die($language['ERR_CANT_OPEN_DB'].' '.$database.' - '.mysqli_error($GLOBALS['conn']));
    
    userlogin();
    if($do_clean)
        register_shutdown_function('cleandata');
}
function cleandata()
{
    global $CURRENTPATH, $TABLE_PREFIX, $btit_settings;
    global $clean_interval;
    if($clean_interval == 0)
        return;
    $now = time();
    if($btit_settings["fmhack_registration_open_randomly"] == "enabled")
        $task_query = "SELECT (SELECT `last_time` FROM `{$TABLE_PREFIX}tasks` WHERE `task`='sanity') `lt`, (SELECT `last_time` FROM `{$TABLE_PREFIX}tasks` WHERE `task`='rreg') `rreg`";
    else
        $task_query = "SELECT `last_time` `lt` FROM `{$TABLE_PREFIX}tasks` WHERE `task`='sanity'";
    $res = get_result($task_query, true, $btit_settings['cache_duration']);
    $row = $res[0];
    if(!$row)
    {
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}tasks (task, last_time) VALUES ('sanity',$now)");
        return;
    }
    if($btit_settings["fmhack_registration_open_randomly"] == "enabled")
    {
        $closed = (int)0 + ($row["rreg"] + ($btit_settings["rreg_open_for"] * 60));
        if($closed < $now)
        {
            $min = (int)(0 + ($btit_settings["rreg_min"] * 60));
            $max = (int)(0 + ($btit_settings["rreg_max"] * 60));
            $random = mt_rand($min, $max);
            $reopen = (int)(0 + ($now + $random));
            do_sqlquery("UPDATE `{$TABLE_PREFIX}tasks` SET `last_time`=$reopen WHERE `task`='rreg'");
        }
    }
    $ts = $row['lt'];
    if($ts + $clean_interval > $now)
        return;
    do_sqlquery("UPDATE {$TABLE_PREFIX}tasks SET last_time=$now WHERE task='sanity' AND last_time = $ts");
    if(!mysqli_affected_rows($GLOBALS['conn']))
        return;
    require_once $CURRENTPATH.'/sanity.php';
    do_sanity($ts);
}
function updatedata()
{
    global $CURRENTPATH, $TABLE_PREFIX, $btit_settings;
    if($btit_settings["fmhack_multi_tracker_scrape"] == "enabled")
        require_once $CURRENTPATH.'/getscrape_multiscrape.php';
    else
        require_once $CURRENTPATH.'/getscrape.php';
    global $update_interval;
    if($update_interval == 0)
        return;
    $now = time();
    $res = get_result("SELECT last_time as lt FROM {$TABLE_PREFIX}tasks WHERE task='update'", true, $btit_settings['cache_duration']);
    $row = $res[0];
    if(!$row)
    {
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}tasks (task, last_time) VALUES ('update',$now)");
        return;
    }
    $ts = $row['lt'];
    if($ts + $update_interval > $now)
        return;
    do_sqlquery("UPDATE {$TABLE_PREFIX}tasks SET last_time=$now WHERE task='update' AND last_time = $ts");
    if(!mysqli_affected_rows($GLOBALS['conn']))
        return;
    $res = get_result("SELECT announce_url FROM {$TABLE_PREFIX}files WHERE external='yes' ORDER BY lastupdate ASC LIMIT 1", true, $btit_settings['cache_duration']);
    if(!$res || count($res) == 0)
        return;
    // get the url to scrape, take 5 torrent at a time (try to getting multiscrape)
    $row = $res[0];
    $resurl = get_result("SELECT info_hash FROM {$TABLE_PREFIX}files WHERE external='yes' AND announce_url='".$row['announce_url']."' ORDER BY lastupdate ASC LIMIT 5", true, $btit_settings['cache_duration']);
    if(!$resurl || count($resurl) == 0)
        return $combinedinfohash = array();
    foreach($resurl as $id => $rhash)
        $combinedinfohash[] = $rhash['info_hash'];
    //scrape($row["announce_url"],$row["info_hash"]);
    scrape($row[0], implode("','", $combinedinfohash));
}
function pager($rpp, $count, $href, $opts = array())
{
    global $language, $btit_settings;
    $pager_type = "new";
    if($btit_settings["fmhack_pager_type_select"] == "enabled")
        $pager_type = $btit_settings["pager_type"];
    if($pager_type == "new")
    {
        $pages = ($rpp == 0)?1:ceil($count / $rpp);
        if(!isset($opts['lastpagedefault']))
            $pagedefault = 1;
        else
        {
            $pagedefault = floor(($count - 1) / $rpp);
            if($pagedefault < 1)
                $pagedefault = 1;
        }
        $pagename = 'pages';
        if(isset($opts['pagename']))
        {
            $pagename = $opts['pagename'];
            if(isset($_GET[$opts['pagename']]))
                $page = max(1, intval($_GET[$opts['pagename']]));
            else
                $page = $pagedefault;
        }
        elseif(isset($_GET['pages']))
        {
            $page = max(1, intval(0 + $_GET['pages']));
            if($page < 0)
                $page = $pagedefault;
        }
        else
            $page = $pagedefault;
        $pager = '';
        if($pages > 1)
        {
            $pager .= "\n".'<form name="change_page'.$pagename.'" method="post" action="index.php">'."\n".'<select class="drop_pager" name="pages" onchange="location=document.change_page'.$pagename.
                '.pages.options[document.change_page'.$pagename.'.pages.selectedIndex].value" size="1">';
            for($i = 1; $i <= $pages; $i++)
                $pager .= "\n<option ".($i == $page?'selected="selected"':'')."value=\"$href$pagename=$i\">$i</option>";
            $pager .= "\n</select>";
        }
        $mp = $pages; // - 1;
        $begin = ($page > 3?($page < $pages - 2?$page - 2:$pages - 2):1);
        $end = ($pages > $begin + 2?($begin + 2 < $pages?$begin + 2:$pages):$pages);
        if($page > 1)
        {
            $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=1\">&nbsp;&laquo;</a></span>";
            $pager .= "\n<span class=\"pager\"><a href=\"{$href}$pagename=".($page - 1)."\">&lt;&nbsp;</a></span>";
        }
        if($count)
        {
            for($i = $begin; $i <= $end; $i++)
            {
                if($i != $page)
                    $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=$i\">$i</a></span>";
                else
                    $pager .= "\n&nbsp;<span class=\"pagercurrent\"><b>$i</b></span>";
            }
            if($page < $mp && $mp >= 1)
            {
                $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=".($page + 1)."\">&nbsp;&gt;</a></span>";
                $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=$pages\">&nbsp;&raquo;</a></span>";
            }
            $pagertop = "$pager\n</form>";
            $pagerbottom = str_replace("change_page", "change_page1", $pagertop)."\n";
        }
        else
        {
            $pagertop = "$pager\n</form>";
            $pagerbottom = str_replace("change_page", "change_page1", $pagertop)."\n";
        }
        $start = ($page - 1) * $rpp;
        if($pages < 2)
        {
            // only 1 page??? don't need pager ;)
            $pagertop = '';
            $pagerbottom = '';
        }
        return array(
            $pagertop,
            $pagerbottom,
            "LIMIT $start,$rpp");
    }
    elseif($pager_type == "old")
    {
        if($rpp != 0)
            $pages = ceil($count / $rpp);
        else
            $pages = 0;
        if(!isset($opts["lastpagedefault"]))
            $pagedefault = 0;
        else
        {
            $pagedefault = floor(($count - 1) / $rpp);
            if($pagedefault < 0)
                $pagedefault = 0;
        }
        $pagename = "pages";
        if(isset($opts["pagename"]))
        {
            $pagename = $opts["pagename"];
            if(isset($_GET[$opts["pagename"]]))
                $page = max(0, $_GET[$opts["pagename"]]);
            else
                $page = $pagedefault;
        }
        elseif(isset($_GET["pages"]))
        {
            $page = 0 + $_GET["pages"];
            if($page < 0)
                $page = $pagedefault;
        }
        else
            $page = $pagedefault;
        $pager = "";
        $mp = $pages - 1;
        $as = "<b>&lt;&lt;&nbsp;".$language["PREVIOUS"]."</b>";
        if($page >= 1)
        {
            $pager .= "<a href=\"{$href}$pagename=".($page - 1)."\">";
            $pager .= $as;
            $pager .= "</a>";
        }
        else
            $pager .= $as;
        $pager .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        $as = "<b>".$language["NEXT"]."&nbsp;&gt;&gt;</b>";
        if($page < $mp && $mp >= 0)
        {
            $pager .= "<a href=\"{$href}$pagename=".($page + 1)."\">";
            $pager .= $as;
            $pager .= "</a>";
        }
        else
            $pager .= $as;
        if($count)
        {
            $pagerarr = array();
            $dotted = 0;
            $dotspace = 3;
            $dotend = $pages - $dotspace;
            $curdotend = $page - $dotspace;
            $curdotstart = $page + $dotspace;
            for($i = 0; $i < $pages; $i++)
            {
                if(($i >= $dotspace && $i <= $curdotend) || ($i >= $curdotstart && $i < $dotend))
                {
                    if(!$dotted)
                        $pagerarr[] = "...";
                    $dotted = 1;
                    continue;
                }
                $dotted = 0;
                $start = $i * $rpp + 1;
                $end = $start + $rpp - 1;
                if($end > $count)
                    $end = $count;
                $text = "$start&nbsp;-&nbsp;$end";
                if($i != $page)
                    $pagerarr[] = "<a href=\"{$href}$pagename=$i\">$text</a>";
                else
                    $pagerarr[] = "<b>$text</b>";
            }
            $pagerstr = join(" | ", $pagerarr);
            $pagertop = "<p align=\"center\">$pager<br />$pagerstr</p>\n";
            $pagerbottom = "<p align=\"center\">$pagerstr<br />$pager</p>\n";
        }
        else
        {
            $pagertop = "<p align=\"center\">$pager</p>\n";
            $pagerbottom = $pagertop;
        }
        $start = ($page - 1) * $rpp;
        if($pages < 2)
        {
            // only 1 page??? don't need pager ;)
            $pagertop = '';
            $pagerbottom = '';
        }
        $start = $page * $rpp;
        return array(
            $pagertop,
            $pagerbottom,
            "LIMIT $start,$rpp");
    }
    else
        die("error");
}
// give back categories recorset
function genrelist()
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    return get_result('SELECT * FROM '.$TABLE_PREFIX.'categories ORDER BY sort_index, id', true, $CACHE_DURATION);
}

// this returns all uploaders  into a select
function uploader($vall='') {
  global $TABLE_PREFIX,$CACHE_DURATION;
  $return="\n".'<select name="uploader"><option value="0">----</option>';
  $cc_q=get_result("SELECT DISTINCT uploader FROM {$TABLE_PREFIX}files",true,$CACHE_DURATION);

  foreach ($cc_q as $cv) {
    $resdt=do_sqlquery("SELECT username FROM {$TABLE_PREFIX}users WHERE id =".$cv["uploader"]);
    $rowdt=mysqli_fetch_array($resdt);
    $ccid=$cv['uploader'];
    $name=unesc($rowdt['username']);

      $return.= "\n<option".(($ccid==$vall)?' selected="selected"':'').' value="'.$ccid.'">'.$name.'</option>';
  }
return $return.'</select>';
}
// this returns all the categories with subs into a select
function categories($val = '')
{
    global $TABLE_PREFIX, $CACHE_DURATION, $btit_settings, $language, $pageID, $CURUSER;
    $cat_and = "";
    if($btit_settings["fmhack_show_or_hide_porn"] == "enabled")
    {
        if($CURUSER["showporn"] == 'no')
        {
            $cat_and .= " AND `c`.`id` NOT IN(".$btit_settings["porncat"].") ";
        }
    }
    $return = "\n".'<select name="category"><option value="0">----</option>';
      if ($XBTT_USE)
    $rowcat = do_sqlquery("SELECT u.id, (u.downloaded+IFNULL(x.downloaded,0)) as downloaded, ((u.uploaded+IFNULL(x.uploaded,0))/(u.downloaded+IFNULL(x.downloaded,0))) as uratio, cp.* FROM {$TABLE_PREFIX}users u LEFT JOIN xbt_users x ON x.uid=u.id INNER JOIN {$TABLE_PREFIX}categories_perm cp ON u.id_level=cp.levelid WHERE u.id = ".$CURUSER["uid"].";",true);
  else
    $rowcat = do_sqlquery("SELECT u.id, u.downloaded, (u.uploaded/u.downloaded) as uratio, cp.* FROM {$TABLE_PREFIX}users u INNER JOIN {$TABLE_PREFIX}categories_perm cp ON u.id_level=cp.levelid WHERE u.id = ".$CURUSER["uid"].";",true);
  if (mysqli_num_rows($rowcat)>0)
     while ($catdata=mysqli_fetch_array($rowcat))
             if($catdata["viewcat"]!="yes" && (($catdata["downloaded"]>=$GLOBALS["download_ratio"] && ($catdata["ratio"]>$catdata["uratio"]))||($catdata["downloaded"]<$GLOBALS["download_ratio"])||($catdata["ratio"]=="0")))
                $exclude.=' AND c.id!='.$catdata[catid];

    $c_q = get_result("SELECT c.id, c.name, sc.id as sid, sc.name as sname FROM {$TABLE_PREFIX}categories c LEFT JOIN {$TABLE_PREFIX}categories sc on c.id=sc.sub where c.sub='0' $exclude $cat_and ORDER BY c.sort_index, sc.sort_index, c.id, sc.id", true,
        $CACHE_DURATION);
    $b_sub = 0;
    if($btit_settings["fmhack_search_all_sub-categories"] == "enabled" && $pageID == "torrents")
    {
        if(is_array($val))
            $val = implode(";", $val);
        $my_array_1 = array();
        $my_array_2 = array();
        foreach($c_q as $value)
        {
            if(!is_null($value["sid"]) && $value["id"] != $value["sid"])
            {
                $my_array_1[unesc($value["name"])." (".$language["ALL"].")"] .= $value["sid"].";";
            }
        }
        foreach($my_array_1 as $key => $value)
        {
            $my_array_2[$key] = trim($value, ";");
        }
    }
    foreach($c_q as $c)
    {
        $cid = $c['id'];
        $name = unesc($c['name']);
        if($b_sub != $cid && $b_sub != 0)
            $return .= "\n</optgroup>";
        // lets see if it has sub-categories.
        if(empty($c['sid']))
        {
            $b_sub = 0;
            $return .= "\n<option".(($cid == $val)?' selected="selected"':'').' value="'.$cid.'">'.$name.'</option>';
        }
        else
        {
            if($b_sub != $cid)
            {
                $return .= "\n<optgroup label='$name'>";
                if($btit_settings["fmhack_search_all_sub-categories"] == "enabled" && $pageID == "torrents")
                {
                    $return .= "\n<option ".(($val == $my_array_2[$name." (".$language["ALL"].")"])?" selected=\"selected\"":"")." value=\"".$my_array_2[$name." (".$language["ALL"].")"]."\">".$name." (".$language["ALL"].
                        ")</option>";
                }
                $b_sub = $cid;
            }
            $sub = $c['sid'];
            $return .= "\n<option".(($sub == $val)?' selected="selected"':'').' value="'.$sub.'">'.unesc($c['sname']).'</option>';
        }
    }
    return $return.'</select>';
}
// this returns all the subcategories
function sub_categories($val = '')
{
    global $TABLE_PREFIX;
    $return = "\n<select name='sub_category'><option value='0'>---</option>";
    $c_q = get_result("SELECT id, name FROM {$TABLE_PREFIX}categories WHERE sub='0' ORDER BY sort_index, id", true, $CACHE_DURATION);
    foreach($c_q as $c)
    {
        $cid = $c['id'];
        $name = unesc($c['name']);
        $selected = ($cid == $val)?'selected="selected"':'';
        $return .= "\n<option $selected value='$cid'>$name</option>";
    }
    return $return."\n</select>";
}
// this returns the category of a sub-category
function sub_cat($sub)
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    $c_q = get_result('SELECT name FROM '.$TABLE_PREFIX.'categories WHERE id='.$sub.' LIMIT 1;', true, $CACHE_DURATION);
    return unesc($c_q[0]['name']);
}
function style_list()
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    return get_result('SELECT * FROM '.$TABLE_PREFIX.'style ORDER BY id;', true, $CACHE_DURATION);
}
function language_list()
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    return get_result('SELECT * FROM '.$TABLE_PREFIX.'language ORDER BY language;', true, $CACHE_DURATION);
}
function flag_list($with_unknown = false)
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    return get_result('SELECT * FROM '.$TABLE_PREFIX.'countries '.(!$with_unknown?'WHERE id<>100':'').' ORDER BY name;', true, $CACHE_DURATION);
}
function timezone_list()
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    return get_result('SELECT * FROM '.$TABLE_PREFIX.'timezone;', true, $CACHE_DURATION);
}
function rank_list($logical=false)
{
    global $TABLE_PREFIX, $CACHE_DURATION, $btit_settings, $CURUSER;

    $prot=$CURUSER["id_level"];

    $order="`id_level`";
    if($btit_settings["fmhack_logical_rank_ordering"]=="enabled" && $logical===true)
    {
        $order="`logical_rank_order`";
    }
    return get_result("SELECT * FROM `{$TABLE_PREFIX}users_level` WHERE id_level <= ".$prot." ORDER BY ".$order." ASC", true, $CACHE_DURATION);
}
# This will show your site name & your url, where you place your tags! #
# <tag:site_name /> and <tag:tracker_url /> #
function print_sitename()
{
    global $SITENAME;
    return $SITENAME;
}
function print_trackerurl()
{
    global $BASEURL;
    return $BASEURL;
}
# this will show the users name where you place the <tag:user_name /> #
function print_username()
{
    global $CURUSER;
    $username = ($CURUSER['username']);
    return $username;
}
# <tag:style_url /> by TT #
function print_style_url()
{
    global $STYLEURL;
    return $STYLEURL;
}
# Works 100% #
# End #
# Begin standard foot tags!
function stdfoot($normalpage = true, $update = true, $adminpage = false, $torrentspage = false, $forumpage = false)
{
    global $STYLEURL, $STYLEPATH, $tpl, $no_columns, $PRINT_DEBUG, $STYLETYPE;
		
    $tpl->set('style_url',print_style_url());
    $tpl->set('to_top', print_top());
    $tpl->set('tracker_url', print_trackerurl());
    $tpl->set('site_name', print_sitename());
    $tpl->set('user_name', print_username());
    $tpl->set('main_footer', bottom_menu()."<br />\n");
    $tpl->set('xbtit_version', print_version());
    $tpl->set('style_copyright', print_designer());
    $tpl->set('import_copyright', import_designer());
    $tpl->set('xbtit_debug', (($PRINT_DEBUG)?print_debug():""));
    if($STYLETYPE == 2)
    {
        // It's a style modified for atmoner's original system
        // Improvement of template by atmoner
        if($normalpage && !$no_columns)
        {
            $tpl->set("RIGHT_COL", true, true);
            $tpl->set("LEFT_COL", true, true);
            $tpl->set("NO_HEADER", true, true);
            $tpl->set("NO_FOOTER", true, true);
        }
        elseif($adminpage)
        {
            $tpl->set("RIGHT_COL", false, true);
            $tpl->set("LEFT_COL", true, true);
            $tpl->set("NO_HEADER", true, true);
            $tpl->set("NO_FOOTER", true, true);
        }
        elseif($torrentspage || $forumpage || $no_columns == 1)
        {
            $tpl->set("RIGHT_COL", false, true);
            $tpl->set("LEFT_COL", false, true);
            $tpl->set("NO_HEADER", true, true);
            $tpl->set("NO_FOOTER", true, true);
        }
        else
        {
            $tpl->set("RIGHT_COL", false, true);
            $tpl->set("LEFT_COL", false, true);
            $tpl->set("NO_HEADER", false, true);
            $tpl->set("NO_FOOTER", false, true);
        }
        echo $tpl->fetch(load_template('main.tpl'));
    }
    elseif($STYLETYPE == 3)
    {
        // It's a style modified for Petr1fied's enhanced version of atmoner's system.
        $tpl->set("TYPE1_EXCLUSIVE_1", false, true);
        $tpl->set("TYPE1_EXCLUSIVE_2", false, true);
        $tpl->set("TYPE1_EXCLUSIVE_3", false, true);
        $tpl->set("TYPE1_EXCLUSIVE_4", false, true);
        $tpl->set("TYPE1_EXCLUSIVE_5", false, true);
        $tpl->set("TYPE2_EXCLUSIVE_1", false, true);
        $tpl->set("TYPE2_EXCLUSIVE_2", false, true);
        $tpl->set("TYPE2_EXCLUSIVE_3", false, true);
        $tpl->set("TYPE2_EXCLUSIVE_4", false, true);
        $tpl->set("TYPE2_EXCLUSIVE_5", false, true);
        $tpl->set("TYPE3_EXCLUSIVE_1", false, true);
        $tpl->set("TYPE3_EXCLUSIVE_2", false, true);
        $tpl->set("TYPE3_EXCLUSIVE_3", false, true);
        $tpl->set("TYPE3_EXCLUSIVE_4", false, true);
        $tpl->set("TYPE3_EXCLUSIVE_5", false, true);
        $tpl->set("TYPE4_EXCLUSIVE_1", false, true);
        $tpl->set("TYPE4_EXCLUSIVE_2", false, true);
        $tpl->set("TYPE4_EXCLUSIVE_3", false, true);
        $tpl->set("TYPE4_EXCLUSIVE_4", false, true);
        $tpl->set("TYPE4_EXCLUSIVE_5", false, true);
        if($normalpage && !$no_columns)
        {
            $tpl->set("HAS_LEFT_COL", true, true);
            $tpl->set("HAS_RIGHT_COL", true, true);
            $tpl->set("IS_DISPLAYED_1", true, true);
            $tpl->set("IS_DISPLAYED_2", true, true);
            $tpl->set("IS_DISPLAYED_3", true, true);
            $tpl->set("IS_DISPLAYED_4", true, true);
            $tpl->set("IS_DISPLAYED_5", true, true);
            $tpl->set("TYPE1_EXCLUSIVE_1", true, true);
            $tpl->set("TYPE1_EXCLUSIVE_2", true, true);
            $tpl->set("TYPE1_EXCLUSIVE_3", true, true);
            $tpl->set("TYPE1_EXCLUSIVE_4", true, true);
            $tpl->set("TYPE1_EXCLUSIVE_5", true, true);
        }
        elseif($adminpage)
        {
            $tpl->set("HAS_LEFT_COL", true, true);
            $tpl->set("HAS_RIGHT_COL", false, true);
            $tpl->set("IS_DISPLAYED_1", true, true);
            $tpl->set("IS_DISPLAYED_2", true, true);
            $tpl->set("IS_DISPLAYED_3", true, true);
            $tpl->set("IS_DISPLAYED_4", true, true);
            $tpl->set("IS_DISPLAYED_5", true, true);
            $tpl->set("TYPE2_EXCLUSIVE_1", true, true);
            $tpl->set("TYPE2_EXCLUSIVE_2", true, true);
            $tpl->set("TYPE2_EXCLUSIVE_3", true, true);
            $tpl->set("TYPE2_EXCLUSIVE_4", true, true);
            $tpl->set("TYPE2_EXCLUSIVE_5", true, true);
        }
        elseif($torrentspage || $forumpage || $no_columns == 1)
        {
            $tpl->set("HAS_LEFT_COL", false, true);
            $tpl->set("HAS_RIGHT_COL", false, true);
            $tpl->set("IS_DISPLAYED_1", true, true);
            $tpl->set("IS_DISPLAYED_2", true, true);
            $tpl->set("IS_DISPLAYED_3", true, true);
            $tpl->set("IS_DISPLAYED_4", true, true);
            $tpl->set("IS_DISPLAYED_5", true, true);
            $tpl->set("IS_DISPLAYED_5", true, true);
            $tpl->set("TYPE3_EXCLUSIVE_1", true, true);
            $tpl->set("TYPE3_EXCLUSIVE_2", true, true);
            $tpl->set("TYPE3_EXCLUSIVE_3", true, true);
            $tpl->set("TYPE3_EXCLUSIVE_4", true, true);
            $tpl->set("TYPE3_EXCLUSIVE_5", true, true);
        }
        else
        {
            $tpl->set("HAS_LEFT_COL", false, true);
            $tpl->set("HAS_RIGHT_COL", false, true);
            $tpl->set("IS_DISPLAYED_1", false, true);
            $tpl->set("IS_DISPLAYED_2", false, true);
            $tpl->set("IS_DISPLAYED_3", false, true);
            $tpl->set("IS_DISPLAYED_4", false, true);
            $tpl->set("IS_DISPLAYED_5", false, true);
            $tpl->set("IS_DISPLAYED_5", false, true);
            $tpl->set("TYPE4_EXCLUSIVE_1", true, true);
            $tpl->set("TYPE4_EXCLUSIVE_2", true, true);
            $tpl->set("TYPE4_EXCLUSIVE_3", true, true);
            $tpl->set("TYPE4_EXCLUSIVE_4", true, true);
            $tpl->set("TYPE4_EXCLUSIVE_5", true, true);
        }
        echo $tpl->fetch(load_template('main.tpl'));
    }
    else
    {
        // It's an original style type. Also default to this if there's an unknown value for the $STYLETYPE variable.
        if($normalpage && !$no_columns)
            echo $tpl->fetch(load_template('main.tpl'));
        elseif($adminpage)
        {
            if(file_exists(load_template('main.left_column.tpl')))
                echo $tpl->fetch(load_template('main.left_column.tpl'));
            else
                echo $tpl->fetch(load_template('main.tpl'));
        }
        elseif($torrentspage || $forumpage || $no_columns == 1)
        {
            if(file_exists(load_template('main.no_columns.tpl')))
                echo $tpl->fetch(load_template('main.no_columns.tpl'));
            else
                echo $tpl->fetch(load_template('main.tpl'));
        }
        else
        {
            if(file_exists(load_template('main.no_header_1_column.tpl')))
                echo $tpl->fetch(load_template('main.no_header_1_column.tpl'));
            else
                echo $tpl->fetch(load_template('main.tpl'));
        }
    }
    //ob_end_flush();
    if($update)
        register_shutdown_function('updatedata');
}
function linkcolor($num)
{
    global $btit_settings;
    if(!$num)
        return '#FF0000';
    if($btit_settings["fmhack_bbcode_enhancements"] != "enabled")
    {
        if($num == 1)
            return '#FFFF00';
    }
    return '#FFFF00';
}
function format_comment($text, $strip_html = true, $smilies = true)
{
    global $smilies, $privatesmilies, $BASEURL, $btit_settings;
    if($strip_html)
        $text = htmlspecialchars($text);
    $text = unesc($text);
    $f = @fopen('badwords.txt', 'r');
    if($f && filesize('badwords.txt') != 0)
    {
        $bw = fread($f, filesize('badwords.txt'));
        $badwords = explode("\n", $bw);
        for($i = 0, $total = count($badwords); $i < $total; ++$i)
            $badwords[$i] = trim($badwords[$i]);
        $text = str_replace($badwords, '*censored*', $text);
    }
    @fclose($f);
    $text = bbcode($text);
    if($btit_settings["fmhack_bbcode_enhancements"] != "enabled")
    {
        // [*]
        $text = preg_replace('/\[\*\]/', '<li>', $text);
        // Maintain spacing
        $text = str_replace('  ', ' &nbsp;', $text);
    }
    if($btit_settings["fmhack_custom_smileys"]=="enabled")
    {
    global $TABLE_PREFIX;
    $list=get_result("SELECT `key`,`value` FROM {$TABLE_PREFIX}smilies",true);

    foreach($list as $code=>$url)
    {
            $text = str_replace($url['key'], '<img border="0" src="'.$BASEURL.'/images/smilies/'.$url['value'].'" alt="'.$url['key'].'" title="'.$url['key'].'" />', $text);
    }
   }
   else{
       if($smilies)
    {
        $smilies = array_merge($smilies, $privatesmilies);
        reset($smilies);
        foreach ($smilies as $code => $url)
            $text = str_replace($code, '<img border="0" src="'.$BASEURL.'/images/smilies/'.$url.'" alt="'.$url.'" title="'.$url.'" />', $text);
    }
   }

    return $text;
}
function image_or_link($image, $pers_style = '', $link = '')
{
    global $STYLEURL, $STYLEPATH;
    if($image == '')
        return $link;
    if(!file_exists($image))
        return $link;
    // replace realpath with url
    return '<img src="'.str_replace($STYLEPATH, $STYLEURL, $image).'" border="0" '.$pers_style.' alt="'.$link.'" title="'.$link.'" />';
}
function success_msg($heading = 'Success!', $string, $close = false)
{
    global $language, $STYLEPATH, $tpl, $page, $STYLEURL;
    if(!isset($tpl) || empty($tpl))
        die($heading."<br />".$string);
    $suc_tpl = new bTemplate();
    $suc_tpl->set('success_title', $heading);
    $suc_tpl->set('success_message', $string);
    $suc_tpl->set('success_image', $STYLEURL.'/images/success.gif');
    if(isset($tpl))
        $tpl->set('main_content', set_block($heading, 'center', $suc_tpl->fetch(load_template('success.tpl'))));
    else
        die("<div align='center'><b><span style='color:green'>".$heading."</span><br /><br />".$string."</b>");
    stdfoot(true, false);
    die;
}
function err_msg($heading = 'Error!', $string, $close = false)
{
    global $language, $STYLEPATH, $tpl, $page, $STYLEURL;
    if(!isset($tpl) || empty($tpl))
        die($heading."<br />".$string);
    // just in case not found the language
    if(!$language['BACK'])
        $language['BACK'] = 'Back';
    $err_tpl = new bTemplate();
    $err_tpl->set('error_title', $heading);
    $err_tpl->set('error_message', $string);
    $err_tpl->set('error_image', $STYLEURL.'/images/error.gif');
    $err_tpl->set('language', $language);
    if($close)
        $err_tpl->set('error_footer', '<a href="javascript: window.close();">'.$language['CLOSE'].'</a>');
    else
        $err_tpl->set('error_footer', '<a href="javascript: history.go(-1);">'.$language['BACK'].'</a>');
    if(isset($tpl))
        $tpl->set('main_content', set_block($heading, 'center', $err_tpl->fetch(load_template('error.tpl'))));
    else
        die("<div align='center'><b><span style='color:red'>".$heading."</span><br /><br />".$string."</b>");
}
function information_msg($heading = 'Error!', $string, $close = false)
{
    global $language, $STYLEPATH, $tpl, $page, $STYLEURL;
    if(!isset($tpl) || empty($tpl))
        die($heading."<br />".$string);
    // just in case not found the language
    if(!$language['BACK'])
        $language['BACK'] = 'Back';
    $err_tpl = new bTemplate();
    $err_tpl->set('information_title', $heading);
    $err_tpl->set('information_message', $string);
    $err_tpl->set('information_image', $STYLEURL.'/images/error.gif');
    $err_tpl->set('language', $language);
    if($close)
        $err_tpl->set('information_footer', '<a href="javascript: window.close();">'.$language['CLOSE'].'</a>');
    else
        $err_tpl->set('information_footer', '<a href="javascript: history.go(-1);">'.$language['BACK'].'</a>');
    if(isset($tpl))
        $tpl->set('main_content', set_block($heading, 'center', $err_tpl->fetch(load_template('information.tpl'))));
    else
        die("<div align='center'><b><span style='color:green'>".$heading."</span><br /><br />".$string."</b>");
    stdfoot(true, false);
    die;
}

function block_begin($title = '-', $colspan = 1, $calign = 'justify')
{
}
function block_end($colspan = 1)
{
}
// Image Upload -->
function makesize1($bytes)
{
    if(abs($bytes) < 1000 * 1024)
        return number_format($bytes / 1024, 2)."";
    if(abs($bytes) < 1000 * 1048576)
        return number_format($bytes / 1048576, 2)."";
    if(abs($bytes) < 1000 * 1073741824)
        return number_format($bytes / 1073741824, 2)."";
    return number_format($bytes / 1099511627776, 2)."";
}
// <-- Image Upload
function makesize($bytes)
{
    if(abs($bytes) < 1048576)
        return number_format($bytes / 1024, 2).' KB'; // (Kilobytes)
    if(abs($bytes) < 1073741824)
        return number_format($bytes / 1048576, 2).' MB'; // (Megabytes)
    if(abs($bytes) < 1099511627776)
        return number_format($bytes / 1073741824, 2).' GB'; // (Gigabytes)
    if(abs($bytes) < 1125899906842624)
        return number_format($bytes / 1099511627776, 2).' TB'; // (Terabytes)
    if(abs($bytes) < 1152921504606846976)
        return number_format($bytes / 1125899906842624, 2).' PB'; // (Petabytes)
    if(abs($bytes) < 1180591620717411303424)
        return number_format($bytes / 1152921504606846976, 2).' EB'; // (Exabytes)
    if(abs($bytes) < 1208925819614629174706176)
        return number_format($bytes / 1180591620717411303424, 2).' ZB'; // (Zettabytes)
    else
        return number_format($bytes / 1208925819614629174706176, 2).' YB'; // (Yottabytes)
}
function redirect($redirecturl)
{
    global $language;
    if(headers_sent())
    {

?>
<script language="javascript">
  window.location.href='<?php
        echo $redirecturl;

?>';
</script>
<meta http-equiv="refresh" content="2;<?php
        echo $redirecturl;

?>">
<?php
        echo sprintf($language['REDIRECT2'], $redirecturl);
    }
    else
        header('Location: '.$redirecturl);
    die();
}
function textbbcode($form, $name, $content = '')
{
    $tpl_bbcode = new bTemplate();
    $tpl_bbcode->set('form_name', $form);
    $tpl_bbcode->set('object_name', $name);
    $tpl_bbcode->set('content', $content);
    $tbbcode = '<table width="100%" cellpadding="1" cellspacing="1">';
    global $smilies, $STYLEPATH, $language, $btit_settings;
    $count = 0;
    reset($smilies);
    $tbbcode .= '<tr>';
    foreach ($smilies as $code => $url) {
     if ($count < 16) {
     $tbbcode .= "\n<td><a href=\"javascript: SmileIT('".str_replace("'", "\'", $code)."',document.forms.$form.$name);\"><img border=\"0\" src=\"images/smilies/$url\" alt=\"$url\" /></a></td>";
     $count++;
     }
    }
    $tbbcode .= "\n</tr>\n</table>";
    $tpl_bbcode->set('smilies_table', $tbbcode);
    $tpl_bbcode->set('language', $language);
    if($btit_settings["fmhack_bbcode_enhancements"] != "enabled")
        return $tpl_bbcode->fetch(load_template('txtbbcode.tpl'));
    else
        return $tpl_bbcode->fetch(load_template('txtbbcode_en.tpl'));
}
// begin functions for the forum
function is_valid_id($id)
{
    return is_numeric($id) && ($id > 0) && (floor($id) == $id);
}
function get_date_time($timestamp = '', $format = '', $offset = '') { 

	if (empty($format) and empty($offset)) {
		if (is_numeric($timestamp))
			return date('d/m/Y H:i:s', (int)$timestamp-(int)$offset);

		global $CURRENTPATH;

		include $CURRENTPATH.'/offset.php';
    		return gmdate('d/m/Y H:i:s');
	}
	else {
		global $language;

		if (empty($timestamp)) $timestamp = time();
		else {
			if (strstr($timestamp, '-')) $timestamp = strtotime($timestamp);
		}

		$date = gmdate($format, $timestamp - $offset);
		$timestamp = time();
		$todaysdate = gmdate($format, $timestamp - $offset);
		$yesterdaysdate = gmdate($format, $timestamp - 86400 - $offset);
		if ($todaysdate == $date) $date = $language["TODAY"];
		else {
			if ($yesterdaysdate == $date) $date = $language["YESTERDAY"];
		}

		return $date.'&nbsp;';
	}
}
function stderr($heading, $text, $close = false)
{
    err_msg($heading, $text, $close);
    stdfoot(true, false);
    die();
}
function encodehtml($s, $linebreaks = true)
{
    $s = str_replace('<', '&lt;', str_replace('&', '&amp;', $s));
    if($linebreaks)
        return nl2br($s);
    return $s;
}
function get_elapsed_time($ts)
{
    $mins = floor((time() - $ts) / 60);
    $hours = floor($mins / 60);
    $mins -= $hours * 60;
    $days = floor($hours / 24);
    $hours -= $days * 24;
    $weeks = floor($days / 7);
    $days -= $weeks * 7;
    if($weeks > 0)
        return $weeks.' week'.(($weeks == 1)?'':'s');
    if($days > 0)
        return $days.' day'.(($days == 1)?'':'s');
    if($hours > 0)
        return $hours.' hour'.(($hours == 1)?'':'s');
    if($mins > 0)
        return $mins.' min'.(($mins == 1)?'':'s');
    return '< 1 min';
}
function sql_timestamp_to_unix_timestamp($s)
{
    return mktime(substr($s, 11, 2), substr($s, 14, 2), substr($s, 17, 2), substr($s, 5, 2), substr($s, 8, 2), substr($s, 0, 4));
}
function gmtime()
{
    return strtotime(get_date_time());
}
function sqlerr($file = '', $line = '')
{
    $file = (($file != '' && $line != '')?'<p>in '.$file.', line '.$line.'</p>':'');

?>
  <table border="0" bgcolor="" align=left cellspacing=0 cellpadding=10 style="background: blue">
    <tr>
          <td class=embedded><font color="#FFFFFF"><h1><?php
    echo ERR_SQL_ERR;

?></h1>
            <b><?php
    echo mysqli_error($GLOBALS['conn']).$file;

?></b></font></td>
        </tr>
    </table>
<?php
    die();
}
function peercolor($num)
{
    if(!$num)
        return '#FF0000';
    elseif($num == 1)
        return '#BEC635';
    return '#008000';
}
// v.1.3
function write_log($text, $reason = 'add')
{
    global $CURUSER, $LOG_ACTIVE, $TABLE_PREFIX;
    if($LOG_ACTIVE)
        do_sqlquery('INSERT INTO '.$TABLE_PREFIX.'logs (added, txt,type,user) VALUES(UNIX_TIMESTAMP(), '.sqlesc($text).', '.sqlesc($reason).',"'.$CURUSER['username'].'")');
}
function DateFormat($seconds)
{
    while($seconds > 31536000)
    {
        $years++;
        $seconds -= 31536000;
    }
    while($seconds > 2419200)
    {
        $months++;
        $seconds -= 2419200;
    }
    while($seconds > 604800)
    {
        $weeks++;
        $seconds -= 604800;
    }
    while($seconds > 86400)
    {
        $days++;
        $seconds -= 86400;
    }
    while($seconds > 3600)
    {
        $hours++;
        $seconds -= 3600;
    }
    while($seconds > 60)
    {
        $minutes++;
        $seconds -= 60;
    }
    $years = ($years == 0)?'':($years.' '.(($years == 1)?YEAR:YEARS).', ');
    $months = ($months == 0)?'':($months.' '.(($months == 1)?MONTH:MONTHS).', ');
    $weeks = ($weeks == 0)?'':($weeks.' '.(($weeks == 1)?WEEK:WEEKS).', ');
    $days = ($days == 0)?'':($days.' '.(($days == 1)?DAY:DAYS).', ');
    $hours = ($hours == 0)?'':($hours.' '.(($hours == 1)?HOUR:HOURS).', ');
    $minutes = ($minutes == 0)?'':($minutes.' '.(($minutes == 1)?MINUTE:MINUTES).' '.WORD_AND.' ');
    $seconds = ($seconds.' '.(($seconds == 1)?SECOND:SECONDS));
    return $years.$months.$weeks.$days.$hours.$minutes.$seconds;
}
function smf_passgen($username, $pwd)
{
    $passhash = sha1(strtolower($username).$pwd);
    $salt = substr(md5(rand()), 0, 4);
    return array($passhash, $salt);
}
function set_smf_cookie($id, $passhash, $salt)
{
    global $THIS_BASEPATH;
    require $THIS_BASEPATH.'/smf/SSI.php';
    if(!function_exists(setLoginCookie))
        require $THIS_BASEPATH.'/smf/Sources/Subs-Auth.php';
    setLoginCookie(189216000, $id, sha1($passhash.$salt));
}
if(!function_exists('htmlspecialchars_decode'))
{
    function htmlspecialchars_decode($text)
    {
        return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
    }
}
function get_user_icons($arr, $big = false)
{
    if($big)
    {
        $donorpic = "donor_big.gif";
        $style = "style=\"margin-left: 4pt\"";
    }
    else
    {
        $donorpic = "donor.gif";
        $style = "style=\"margin-left: 2pt\"";
    }
    $pics = $arr["donor"] == "yes"?"<img title=\"Donor\" src=\"images/$donorpic\" alt=\"Donor\" border=\"0\" $style />":"";
    return $pics;
}
function get_combodt($select, $opts = array())
{
    $name = (isset($opts['name']))?' name="'.$opts['name'].'"':'';
    $complete = (isset($opts['complete']))?(bool)$opts['complete']:false;
    $default = (isset($opts['default']))?$opts['default']:null;
    $id = (isset($opts['id']))?$opts['id']:'id';
    $value = (isset($opts['value']))?$opts['value']:'value';
    $combo = '';
    if($complete)
        $combo .= '<select'.$name.'>';
    foreach($select as $option)
    {
        $combo .= "\n".'<option ';
        if((!is_null($default)) && ($option[$id] == $default))
            $combo .= 'selected="selected" ';
        $combo .= 'value="'.$option[$id].'">'.unesc($option[$value]).'</option>';
    }
    if($complete)
        $combo .= '</select>';
    return $combo;
}
function rank_expiration_dt($timestamp = 0)
{
    return gmdate('Y-m-d H:i:s', $timestamp);
}
//gold mod
function getStatus($gold = 0)
{
    if($gold == 0)
    {
        return 'Classic';
    }
    elseif($gold == 1)
    {
        return 'Silver';
    }
    elseif($gold == 2)
    {
        return 'Gold';
    }
    else
        return 'none';
}
function createUsersLevelCombo($selected = 0)
{
    global $TABLE_PREFIX;
    $ret = array();
    $res = do_sqlquery("SELECT `id_level`, `level` FROM `{$TABLE_PREFIX}users_level` WHERE `id`<=8 ORDER BY `id` ASC");
    while($row = mysqli_fetch_assoc($res))
        $ret[] = $row;
    unset($row);
    mysqli_free_result($res);
    $gold_select_box = "
      <select name='level' >";
    foreach($ret as $key => $value)
    {
        $s = '';
        if($value['id_level'] == $selected)
        {
            $s = 'selected';
        }
        $gold_select_box .= "<option value='".$value['id_level']."' ".$s.">".$value['level']."</option>";
    }
    $gold_select_box .= '</select><div id="description"></div>';
    return $gold_select_box;
}
function createGoldCategories($selected = '')
{
    global $TABLE_PREFIX, $language;
    $g_desc = '';
    $s_desc = '';
    $c_desc = '';
    $res = get_result("SELECT * FROM {$TABLE_PREFIX}gold  WHERE id='1'", true);
    foreach($res as $key => $value)
    {
        $g_desc = $value["gold_description"];
        $s_desc = $value["silver_description"];
        $c_desc = $value["classic_description"];
        $b_desc = $value["bronze_description"];
    }
    $gold_categories = array(
        0 => 'Classic (0% free leech)',
        3 => 'Bronze ('.(100 - $res[0]["bronze_percentage"]).'% '.$language["GOLD_FL"].')',
        1 => 'Silver ('.(100 - $res[0]["silver_percentage"]).'% '.$language["GOLD_FL"].')',
        2 => 'Gold ('.(100 - $res[0]["gold_percentage"]).'% '.$language["GOLD_FL"].')');
    $gold_select_box = "
      <select name='gold' onchange=\"function ajde(val,c_desc,s_desc,g_desc,b_desc)
      {
            var div = document.getElementById('description');
            if(val==0)
            {
            div.innerHTML = 'Note: $c_desc';
            }
            if(val==1)
            {
            div.innerHTML = 'Note: $s_desc';
            }
            if(val==2)
            {
            div.innerHTML = 'Note: $g_desc';
            }
            if(val==3)
            {
            div.innerHTML = 'Note: $b_desc';
            }
      }
      ajde(this.value)\">";
    foreach($gold_categories as $key => $value)
    {
        $s = '';
        if($key == $selected)
        {
            $s = 'selected';
        }
        $gold_select_box .= "<option value='".$key."' ".$s.">".$value."</option>";
    }
    $gold_select_box .= '</select><div id="description"></div>';
    return $gold_select_box;
}
//end gold
function happyHour()
{
    $nextDay = date("Y-m-d", time() + 86400);
    $nextHoura = mt_rand(0, 2);
    if($nextHoura == 2)
        $nextHourb = mt_rand(0, 3);
    else
        $nextHourb = mt_rand(0, 9);
    $nextHour = $nextHoura.$nextHourb;
    $nextMina = mt_rand(0, 5);
    $nextMinb = mt_rand(0, 9);
    $nextMin = $nextMina.$nextMinb;
    $happyHour = $nextDay." ".$nextHour.":".$nextMin."";
    return $happyHour;
}
function ishappyHour($n)
{
    global $TABLE_PREFIX;
    $hh=do_sqlquery("SELECT UNIX_TIMESTAMP(value_s) FROM {$TABLE_PREFIX}avps WHERE arg='happyhour'");
    $np=mysqli_fetch_array($hh ,MYSQLI_NUM);
    $happyHour = $np[0];
    $happyDate = date("Y-m-d H:i", $happyHour);
    $curDate = date("Y-m-d H:i");
    $nextDate = date("Y-m-d H:i", $happyHour + 3600);
    if($n == "check")
    {
        if($happyDate < $curDate && $nextDate >= $curDate)
            return true;
    }
    if($n == "time")
    {
        $timeLeft = (($happyHour + 3600) - time());
        return NewDateFormat($timeLeft);
    }
}
function NewDateFormat($seconds = 0)
{
    global $language;
    if($seconds == 0)
        return $language["NA"];
    while($seconds >= 31536000)
    {
        $years++;
        $seconds -= 31536000;
    }
    while($seconds >= 2419200)
    {
        $months++;
        $seconds -= 2419200;
    }
    while($seconds >= 604800)
    {
        $weeks++;
        $seconds -= 604800;
    }
    while($seconds >= 86400)
    {
        $days++;
        $seconds -= 86400;
    }
    while($seconds >= 3600)
    {
        $hours++;
        $seconds -= 3600;
    }
    while($seconds >= 60)
    {
        $minutes++;
        $seconds -= 60;
    }
    $years = ($years == 0)?"":$years."Y ";
    $months = ($months == 0)?"":$months."M ";
    $weeks = ($weeks == 0)?"":$weeks."W ";
    $days = ($days == 0)?"":$days."D ";
    $hours = ($hours == 0)?"":$hours."h ";
    $minutes = ($minutes == 0)?"":$minutes."m ";
    $seconds = ($seconds == 0)?"":$seconds."s";
    return $years.$months.$weeks.$days.$hours.$minutes.$seconds;
}
function warn_expiration($timestamp = 0)
{
    return gmdate('Y-m-d H:i:s', $timestamp);
}
function booted_expiration($timestamp = 0)
{
    return gmdate('Y-m-d H:i:s', $timestamp);
}
function do_updateranks()
{
    global $TABLE_PREFIX, $XBTT_USE, $FORUMLINK, $db_prefix, $btit_settings, $ipb_prefix, $language;
    if(date("G") == $btit_settings["autorank_fullcheck"])
    {
        $res = get_result("SELECT `smf_fid` FROM `{$TABLE_PREFIX}users` WHERE `id`=1");
        $row = $res[0];
        if($row["smf_fid"] == 0)
            $fullcheck = "yes";
        else
            $fullcheck = "no";
    }
    if(date("G") == ($btit_settings["autorank_fullcheck"] + 1))
    {
        do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `smf_fid`=0 WHERE `id`=1");
    }
    // Query to grab the parameters for all autorank enabled levels
    $query = "SELECT `id`, `id_level`, `level` , `autorank_position`, `level`, ";
    $query .= "`autorank_min_upload`, `autorank_minratio`, `smf_group_mirror`, `ipb_group_mirror` ";
    if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
    {
        $query .= ", `torrents_limit` ";
    }
    if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
    {
        $query .= ", `WT` ";
    }
    if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
    {
        $query .= ", `freeleech` ";
    }
    $query .= "FROM `{$TABLE_PREFIX}users_level` ";
    $query .= "WHERE `autorank_state` = 'Enabled' ";
    $query .= "ORDER BY `autorank_position` ASC";
    $res = get_result($query);
    if(count($res) > 0)
    {
        $i = 0;
        foreach($res as $row)
        {
            $level[$i] = $row;
            $i++;
        }
        $level2 = $level;
        $grouplist = "";
        foreach($level as $k => $v)
        {
            $grouplist .= $v["id"].",";
            if($v["autorank_position"] == 0)
            {
                $default_level = $v["id"];
                if(substr($FORUMLINK, 0, 3) == "smf")
                {
                    $default_forum_level = $v["smf_group_mirror"];
                }
                elseif($FORUMLINK == "ipb")
                {
                    $default_forum_level = $v["ipb_group_mirror"];
                }
                if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
                {
                    $default_torrents_limit = $v["torrents_limit"];
                }
                if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
                {
                    $default_wait_time = $v["WT"];
                }
                if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
                {
                    $default_free_leech = $v["freeleech"];
                }
                $default_rank_name = $v["level"];
                unset($level2[$k]);
            }
        }
        $grouplist = trim($grouplist, ",");
        if($XBTT_USE)
        {
            $udownloaded = "`u`.`downloaded`+IFNULL(`x`.`downloaded`,0) `downloaded`";
            $uuploaded = "`u`.`uploaded`+IFNULL(`x`.`uploaded`,0) `uploaded`";
            $utables = "`{$TABLE_PREFIX}users` `u` LEFT JOIN `xbt_users` `x` ON `x`.`uid`=`u`.`id`";
            $utables .= " LEFT JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id`";
            $activetorr1 = "LEFT JOIN `xbt_files_users` `xfu` ON `u`.`id`=`xfu`.`uid` ";
            $activetorr2 = "AND `xfu`.`mtime` IS NOT NULL ";
        }
        else
        {
            $udownloaded = "`u`.`downloaded`";
            $uuploaded = "`u`.`uploaded`";
            $utables = "`{$TABLE_PREFIX}users` `u`";
            $utables .= " LEFT JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id`";
            $activetorr1 = "LEFT JOIN `{$TABLE_PREFIX}peers` `p` ON `u`.`pid`=`p`.`pid` ";
            $activetorr2 = "AND `p`.`lastupdate` IS NOT NULL ";
        }
        if(date("G") == $btit_settings["autorank_fullcheck"] && $fullcheck == "yes")
        {
            $query = "SELECT `u`.`id`, `u`.`id_level`, ".$uuploaded.", ";
            $query .= $udownloaded.", `u`.`smf_fid`, `u`.`ipb_fid` ";
            if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
            {
                $query .= ", `u`.`custom_torr_limit` ";
            }
            if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
            {
                $query .= ", `u`.`custom_wait_time` ";
            }
            if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
            {
                $query .= ", `ul`.`freeleech` ";
            }
            $query .= ", `u`.`user_notes`, `u`.`username`, `ul`.`level` ";
            $query .= "FROM ".$utables." ";
            $query .= "WHERE `u`.`id_level` IN(".$grouplist.") ";
            $query .= "ORDER BY `u`.`id` ASC";
            @do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `smf_fid`='-1' WHERE `id`=1");
        }
        else
        {
            // Otherwise we'll just check the members that are actually connected to torrents
            $query = "SELECT `u`.`id`, `u`.`id_level`, ".$uuploaded.", ";
            $query .= $udownloaded.", `u`.`smf_fid`, `u`.`ipb_fid` ";
            if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
            {
                $query .= ", `u`.`custom_torr_limit` ";
            }
            if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
            {
                $query .= ", `u`.`custom_wait_time` ";
            }
            if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
            {
                $query .= ", `ul`.`freeleech` ";
            }
            $query .= ", `u`.`user_notes`, `u`.`username`, `ul`.`level` ";
            $query .= "FROM ".$utables." ";
            $query .= $activetorr1." ";
            $query .= "WHERE `u`.`id_level` IN(".$grouplist.") ";
            $query .= $activetorr2." ";
            $query .= "GROUP BY `u`.`id` ";
            $query .= "ORDER BY `u`.`id` ASC";
        }
        $res = get_result($query);
        $user = array();
        foreach($res as $row)
        {
            if($row["downloaded"] > 0)
                $row["ratio"] = number_format($row["uploaded"] / $row["downloaded"], 3, ".", "");
            else
                $row["ratio"] = 99999.999;
            $user[$row["id"]]["curlev"] = $row["id_level"];
            $user[$row["id"]]["newlev"] = $default_level;
            if(substr($FORUMLINK, 0, 3) == "smf")
            {
                $user[$row["id"]]["newforumlev"] = $default_forum_level;
                $user[$row["id"]]["smf_fid"] = $row["smf_fid"];
            }
            elseif($FORUMLINK == "ipb")
            {
                $user[$row["id"]]["newforumlev"] = $default_forum_level;
                $user[$row["id"]]["ipb_fid"] = $row["ipb_fid"];
            }
            if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
            {
                $user[$row["id"]]["torrents_limit"] = $default_torrents_limit;
            }
            if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
            {
                $user[$row["id"]]["wait_time"] = $default_wait_time;
            }
            if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
            {
                $user[$row["id"]]["curfl"] = $row["freeleech"];
                $user[$row["id"]]["newfl"] = $default_free_leech;
                $user[$row["id"]]["curdn"] = $row["downloaded"];
            }
            $user[$row["id"]]["username"] = $row["username"];
            $user[$row["id"]]["current_rank"] = $row["level"];
            $user[$row["id"]]["new_rank"] = $default_rank_name;
            $user[$row["id"]]["user_notes"] = $row["user_notes"];
            $user[$row["id"]]["uploaded"] = makesize($row["uploaded"]);
            $user[$row["id"]]["downloaded"] = makesize($row["downloaded"]);
            $user[$row["id"]]["ratio"] = (($row["ratio"] == 99999.999)?$language["UN_AUTORANK_7"]:$row["ratio"]);
            $lock = "no";
            foreach($level2 as $k => $v)
            {
                if($v["autorank_position"] < 0)
                {
                    if($row["downloaded"] > $v["autorank_min_upload"] && $row["ratio"] < $v["autorank_minratio"] && $lock == "no")
                    {
                        if(substr($FORUMLINK, 0, 3) == "smf")
                        {
                            $user[$row["id"]]["newforumlev"] = $v["smf_group_mirror"];
                        }
                        elseif($FORUMLINK == "ipb")
                        {
                            $user[$row["id"]]["newforumlev"] = $v["ipb_group_mirror"];
                        }
                        if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
                        {
                            if($row["custom_torr_limit"] == "no")
                                $user[$row["id"]]["torrents_limit"] = $v["torrents_limit"];
                        }
                        if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
                        {
                            if($row["custom_wait_time"] == "no")
                                $user[$row["id"]]["wait_time"] = $v["WT"];
                        }
                        if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
                        {
                            $user[$row["id"]]["newfl"] = $v["freeleech"];
                        }
                        $user[$row["id"]]["new_rank"] = $v["level"];
                        $user[$row["id"]]["user_notes"] = $row["user_notes"];
                        $user[$row["id"]]["newlev"] = $v["id"];
                        $lock = "yes";
                    }
                }
                elseif($v["autorank_position"] > 0)
                {
                    if($row["ratio"] >= $v["autorank_minratio"] && $row["uploaded"] >= $v["autorank_min_upload"])
                    {
                        $user[$row["id"]]["newlev"] = $v["id"];
                        if(substr($FORUMLINK, 0, 3) == "smf")
                        {
                            $user[$row["id"]]["newforumlev"] = $v["smf_group_mirror"];
                        }
                        elseif($FORUMLINK == "ipb")
                        {
                            $user[$row["id"]]["newforumlev"] = $v["ipb_group_mirror"];
                        }
                        if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE)
                        {
                            if($row["custom_torr_limit"] == "no")
                                $user[$row["id"]]["torrents_limit"] = $v["torrents_limit"];
                        }
                        if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE)
                        {
                            if($row["custom_wait_time"] == "no")
                                $user[$row["id"]]["wait_time"] = $v["WT"];
                        }
                        if($btit_settings["fmhack_VIP_freeleech"] == "enabled")
                        {
                            $user[$row["id"]]["newfl"] = $v["freeleech"];
                        }
                        $user[$row["id"]]["new_rank"] = $v["level"];
                        $user[$row["id"]]["user_notes"] = $row["user_notes"];
                    }
                }
            }
        }
        foreach($user as $k => $v)
        {
            if($v["curlev"] != $v["newlev"])
            {
                if($btit_settings["fmhack_user_notes"] == "enabled" && $btit_settings["un_autorank"] == "enabled")
                {
                    if(isset($v["user_notes"]) && !empty($v["user_notes"]))
                        $usernotes = unserialize(unesc($v["user_notes"]));
                    else
                        $usernotes = array();
                    if(!isset($language["SYSTEM_USER"]))
                        $language["SYSTEM_USER"]="System";
                    $usernotes[] = base64_encode($v["username"]." ".$language["UN_AUTORANK_1"]." [b]".$v["current_rank"]."[/b] ".$language["UN_AUTORANK_2"]." [b]".$v["new_rank"]."[/b] ".$language["UN_AUTORANK_3"]." ".
                        "([b][color=green]".$language["UN_AUTORANK_4"].": ".$v["uploaded"]."[/color] | [color=red]".$language["UN_AUTORANK_5"].": ".$v["downloaded"]."[/color] | ".$language["UN_AUTORANK_6"].": ".$v["ratio"].
                        "[/b])<+>0<+>".$language["SYSTEM_USER"]."<+>".time());
                    $new_notes = serialize($usernotes);
                }
                $autorank_subj = "";
                $autorank_pm = "";
                if($btit_settings["autorank_sendpm"] == "yes")
                {
                    $res = get_result("SELECT (SELECT `autorank_position` FROM `{$TABLE_PREFIX}users_level` WHERE `id`=".$v["curlev"].") `curpos`, (SELECT `autorank_position` FROM `{$TABLE_PREFIX}users_level` WHERE `id`=".
                        $v["newlev"].") `newpos`");
                    $autorank_subj = (($res[0]["newpos"] > $res[0]["curpos"])?$language['AUTORANK_PM_PROMOTE_SUBJ']:$language['AUTORANK_PM_DEMOTE_SUBJ']);
                    $autorank_pm = $language["AUTORANK_PM_GREET"]." ".$v["username"].","."\n\n".(($res[0]["newpos"] > $res[0]["curpos"])?$language["AUTORANK_PM_PROMOTE_1"]:$language["AUTORANK_PM_DEMOTE_1"])." ".$v["current_rank"].
                        " ".(($res[0]["newpos"] > $res[0]["curpos"])?$language["AUTORANK_PM_PROMOTE_2"]:$language["AUTORANK_PM_DEMOTE_2"])." ".$v["new_rank"]." ".(($res[0]["newpos"] > $res[0]["curpos"])?(($language["AUTORANK_PM_PROMOTE_3"] !=
                        "")?"\n\n".$language["AUTORANK_PM_PROMOTE_3"]:""):(($language["AUTORANK_PM_DEMOTE_3"] != "")?"\n\n".$language["AUTORANK_PM_DEMOTE_3"]:""));
                }
                // Query to update their tracker level
                $query1 = "UPDATE `{$TABLE_PREFIX}users` ";
                $query1 .= "SET `id_level`=".$v["newlev"]." ";
                if($btit_settings["fmhack_user_notes"] == "enabled" && $btit_settings["un_autorank"] == "enabled")
                {
                    $query1 .= ", `user_notes`='".mysqli_real_escape_string($GLOBALS['conn'],$new_notes)."' ";
                }
                if($btit_settings["fmhack_VIP_freeleech"] == "enabled" && $v["curfl"] != $v["newfl"])
                {
                    if($v["curfl"] == "no" && $v["newfl"]=="yes")
                        $query1 .= ", `vipfl_down`='".mysqli_real_escape_string($GLOBALS['conn'],$v["curdn"])."', `vipfl_date`=UNIX_TIMESTAMP() ";
                    elseif($v["curfl"] == "yes" && $v["newfl"]=="no")
                        $query1 .= ", `vipfl_down`=0, `vipfl_date`=0 ";
                }
                $query1 .= "WHERE `id`=".$k;
                @do_sqlquery($query1);
                if(substr($FORUMLINK, 0, 3) == "smf")
                {
                    // Query to update their forum level to match
                    $query2 = "UPDATE `{$db_prefix}members` ";
                    $query2 .= "SET ".(($FORUMLINK == "smf")?"`ID_GROUP`":"`id_group`")."=".$v["newforumlev"]." ";
                    $query2 .= "WHERE ".(($FORUMLINK == "smf")?"`ID_MEMBER`":"`id_member`")."=".$v["smf_fid"];
                    @do_sqlquery($query2);
                }
                elseif($FORUMLINK == "ipb")
                {
                    // Query to update their forum level to match
                    $query2 = "UPDATE `{$ipb_prefix}members` ";
                    $query2 .= "SET `member_group_id`=".$v["newforumlev"]." ";
                    $query2 .= "WHERE `member_id`=".$v["ipb_fid"];
                    @do_sqlquery($query2);
                }
                if($btit_settings["fmhack_torrents_limit"] == "enabled" && $XBTT_USE && isset($v["torrents_limit"]))
                {
                    $query3 = "UPDATE `xbt_users` ";
                    $query3 .= "SET `torrents_limit`=".$v["torrents_limit"]." ";
                    $query3 .= "WHERE `uid`=".$k;
                    @do_sqlquery($query3);
                }
                if($btit_settings["fmhack_enhanced_wait_time"] == "enabled" && $XBTT_USE && isset($v["WT"]))
                {
                    $query4 = "UPDATE `xbt_users` ";
                    $query4 .= "SET `wait_time`=".($v["WT"] * 3600)." ";
                    $query4 .= "WHERE `uid`=".$k;
                    @do_sqlquery($query4);
                }
                if($autorank_subj != "" && $autorank_pm != "")
                {
                    send_pm(0, $k, sqlesc($autorank_subj), sqlesc($autorank_pm));
                }
            }
        }
    }
}
//show seedbox
function getLevelDT($cur_level)
{
    global $TABLE_PREFIX;
    $query = "SELECT id, id_level FROM {$TABLE_PREFIX}users_level";
    $rez = do_sqlquery($query, true);
    while($row = mysqli_fetch_assoc($rez))
    {
        if($row['id'] == $cur_level)
        {
            return $row['id_level'];
        }
    }
    return 0;
}
// end show seedbox
/*Mod by losmi - sticky mod
Operation #3*/
function updateSticky($hash, $sticky)
{
    global $TABLE_PREFIX;
    $query = "UPDATE {$TABLE_PREFIX}files
                   SET sticky='$sticky'
                   WHERE info_hash ='$hash'";
    do_sqlquery($query, true);
}
/*End mod by losmi - sticky mod
End Operation #3*/
/*Mod by losmi - sticky mod*/
function getLevel($cur_level)
{
    global $TABLE_PREFIX;
    $query = "SELECT id, id_level FROM {$TABLE_PREFIX}users_level";
    $rez = do_sqlquery($query, true);
    while($row = mysqli_fetch_assoc($rez))
    {
        if($row['id'] == $cur_level)
        {
            return $row['id_level'];
        }
    }
    return 0;
}
/*End mod by losmi - sticky mod*/
function do_radio($ts)
{
    require_once (dirname(__file__).'/shoutcast.class.php');
    global $btit_settings, $TABLE_PREFIX, $language;
    $cast = new ShoutCast();
    $cast->host = $btit_settings["radio_ip"];
    $cast->port = $btit_settings["radio_port"];
    $cast->passwd = $btit_settings["radio_pass"];
    if($cast->openstats())
    {
        if($cast->GetStreamStatus())
        {
            $history = $cast->GetSongHistory();
            if(is_array($history))
            {
                if(!isset($language["SYSTEM_USER"]))
                    $language["SYSTEM_USER"]="System";
                do_sqlquery("INSERT INTO {$TABLE_PREFIX}chat (uid, time, name, text) VALUES (0,".time().", '".mysqli_real_escape_string($GLOBALS['conn'],$language["SYSTEM_USER"])."','[radio]')", true);
                if($btit_settings["fmhack_IMG_in_SB_after_x_shouts"] == "enabled")
                    auto_shout(mysqli_insert_id($GLOBALS['conn']));
                exit();
            }
        }
    }
    else
    {
    }
}
if(!function_exists("stripos"))
{
    function stripos($str, $needle)
    {
        return strpos(strtolower($str), strtolower($needle));
    }
}
function cidr_decode($ip_addr_cidr)
{
    $ip_arr = explode('/', $ip_addr_cidr);
    $dotcount = substr_count($ip_arr[0], ".");
    $padding = str_repeat(".0", 3 - $dotcount);
    $ip_arr[0] .= $padding;
    $bin = '';
    for($i = 1; $i <= 32; $i++)
    {
        $bin .= $ip_arr[1] >= $i?'1':'0';
    }
    $ip_arr[1] = bindec($bin);
    $ip = ip2long($ip_arr[0]);
    $nm = ip2long($ip_arr[1]);
    $nw = ($ip & $nm);
    $bc = $nw | ( ~ $nm);
    return array(long2ip($nw), long2ip($bc));
}
function signup_ip_ban($user_ip, $comment)
{
    global $THIS_BASEPATH, $CURUSER, $TABLE_PREFIX;
    $include = $THIS_BASEPATH."/whois/whois.main.php";
    if(@file_exists($include))
    {
        include_once ($include);
        $whois = new Whois();
        $result = $whois->Lookup($user_ip);
        if(isset($result["regrinfo"]["network"]["inetnum"]))
        {
            $iplist = explode("-", preg_replace("/\ /", "", ($result["regrinfo"]["network"]["inetnum"])));
            if(!$iplist[1])
            {
                // The IP address is listed in CIDR form eg 127.0/16 etc.
                $iplist = cidr_decode($result["regrinfo"]["network"]["inetnum"]);
            }
        }
        elseif(isset($result["regrinfo"]["network"][0]["inetnum"]))
        {
            $iplist = explode("-", preg_replace("/\ /", "", ($result["regrinfo"]["network"][0]["inetnum"])));
            if(!$iplist[1])
            {
                // The IP address is listed in CIDR form eg 127.0/16 etc.
                $iplist = cidr_decode($result["regrinfo"]["network"][0]["inetnum"]);
            }
        }
        $found = @mysqli_fetch_assoc(@do_sqlquery("SELECT `id` FROM `{$TABLE_PREFIX}signup_ip_block` WHERE `first_ip`=INET_ATON('$iplist[0]') AND `last_ip`=INET_ATON('$iplist[1]')"));
        if(!$found)
        {
            // Create a new record
            $query = "INSERT INTO `{$TABLE_PREFIX}signup_ip_block` ";
            $query .= "SET `first_ip`=INET_ATON('$iplist[0]'), ";
            $query .= "`last_ip`=INET_ATON('$iplist[1]'), ";
            $query .= "`added`=UNIX_TIMESTAMP(), ";
            $query .= "`addedby`='".$CURUSER["username"]."', ";
            $query .= "`comment`='".mysqli_real_escape_string($GLOBALS['conn'],$comment)."'";
            @do_sqlquery($query);
        }
        else
        {
            // Update the timestamp on the pre-existing record to extend the ban.
            @do_sqlquery("UPDATE `{$TABLE_PREFIX}signup_ip_block` SET `added`=UNIX_TIMESTAMP(), `addedby`='".$CURUSER["username"]."' WHERE `id`=".$found["id"]);
        }
    }
    else
    {
        // They don't have the required PHPWhois files so do nothing and exit the function
        return;
    }
}
function getmoderdetails($mod, $hash)
{
    global $CURUSER, $language, $btit_settings;
    $edit_allowed = ((($CURUSER["moderate_trusted"] == "yes" && $CURUSER["edit_torrents"] == "yes") || $mod["uploader"] == $CURUSER["uid"])?"yes":"no");
    if($btit_settings["fmhack_uploader_rights"] == "enabled" && $edit_allowed == "yes" && $btit_settings["ulri_edit"] == "no" && $CURUSER["edit_torrents"] == "no")
        $edit_allowed = "no";
    if(!isset($language["SYSTEM_USER"]))
        $language["SYSTEM_USER"]="System";
    if($edit_allowed == "yes")
        $link = "<a title=\"".$mod["moder"].(($btit_settings["fmhack_torrent_moderation"] == "enabled" && $btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes" && $mod["username"] !=
            $language["SYSTEM_USER"])?" (".$language["TMOD_APPROVED_BY"]." ".$mod["username"].")":"")."\" href=\"index.php?page=edit&info_hash=".$hash."\"><img alt=\"".$mod["moder"]."\" src=\"images/mod/".$mod["moder"].".png\"></a>";
    else
        $link = "<img alt=\"".$mod["moder"].(($btit_settings["fmhack_torrent_moderation"] == "enabled" && $btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes" && $mod["username"] !=
            $language["SYSTEM_USER"])?" (".$language["TMOD_APPROVED_BY"]." ".$mod["username"].")":"")."\" title=\"".$mod["moder"]."\" src=\"images/mod/".$mod["moder"].".png\">";
    $resend = '';
    if($mod["moder"] == 'bad')
        $resend = $language["TMOD_EDIT_TO_RESEND"];
    return $link.$resend;
}
function genrelistreasons()
{
    global $TABLE_PREFIX;
    $ret = array();
    $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}warn_reasons ORDER BY id");
    while($row = mysqli_fetch_assoc($res))
        $ret[] = $row;
    unset($row);
    mysqli_free_result($res);
    return $ret;
}
function updatemoderbyhash($moder, $torhash)
{
    global $TABLE_PREFIX, $CURUSER;
    do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `moder`='".$moder."', `approved_by`=".(($moder == "um")?0:$CURUSER["uid"])." WHERE `info_hash`= '".mysqli_real_escape_string($GLOBALS['conn'],$torhash)."'", true);
}
function getmoderstatusbyhash($hash)
{
    global $TABLE_PREFIX, $btit_settings, $CURUSER, $language;
    $query = "SELECT `f`.`moder`, `f`.`uploader`".(($btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes")?", `u`.`username`":"")." FROM `{$TABLE_PREFIX}files` `f` ".(($btit_settings["mod_app_sa"] ==
        "yes" && $CURUSER["admin_access"] == "yes")?"LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `f`.`approved_by`=`u`.`id`":"")." WHERE `f`.`info_hash`='".mysqli_real_escape_string($GLOBALS['conn'],$hash)."'";
    $res = do_sqlquery($query, true);
    $results = mysqli_fetch_assoc($res);
    if($btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes")
    {
        if(!isset($language["SYSTEM_USER"]))
            $language["SYSTEM_USER"]="System";
        if(is_null($results["username"]))
            $results["username"] = $language["SYSTEM_USER"];
    }
    return $results;
}
function team_list()
{
    global $TABLE_PREFIX, $CACHE_DURATION;
    return get_result("SELECT * FROM `{$TABLE_PREFIX}teams` ORDER BY `id` ASC", true, $CACHE_DURATION);
}
function auto_shout($last_record = 0)
{
    global $THIS_BASEPATH, $TABLE_PREFIX, $btit_settings, $BASEURL, $language;
    if($last_record > 0)
    {
        if($last_record % $btit_settings["don_chat"] == 0)
        {
            if($btit_settings["type_chat"] == "both")
            {
                $both_array[0] = "text";
                $both_array[1] = "image";
                $rand = rand(0, 1);
                $btit_settings["type_chat"] = $both_array[$rand];
            }
            if($btit_settings["type_chat"] == "text")
            {
                $i = 1;
                $text_array = array();
                foreach(glob($THIS_BASEPATH."/shouts/text/*.txt") as $filename)
                {
                    $text_array[$i]["filename"] = $filename;
                    $i++;
                }
                $text_count = count($text_array);
                if($text_count >= 1)
                {
                    if($text_count == 1)
                        $rand = 1;
                    else
                        $rand = rand(1, $text_count);
                    $filename = $text_array[$rand]["filename"];
                    $handle = fopen($filename, "r");
                    $contents = mysqli_real_escape_string($GLOBALS['conn'],fread($handle, filesize($filename)));
                    fclose($handle);
                }
                else
                    $contents = mysqli_real_escape_string($GLOBALS['conn'],"Text based auto-shout not possible, no text files are present.");
            }
            elseif($btit_settings["type_chat"] == "image")
            {
                $i = 1;
                $image_array = array();
                foreach(glob($THIS_BASEPATH."/shouts/images/{*.gif,*.GIF,*.jpg,*.JPG,*.jpeg,*.JPEG,*.png,*.PNG,*.bmp,*.BMP}", GLOB_BRACE) as $filename)
                {
                    $image_array[$i]["filename"] = $filename;
                    $i++;
                }
                $image_count = count($image_array);
                if($image_count >= 1)
                {
                    if($image_count == 1)
                        $rand = 1;
                    else
                        $rand = rand(1, $image_count);
                    $filename = $image_array[$rand]["filename"];
                    $contents = mysqli_real_escape_string($GLOBALS['conn'],"[img]".$BASEURL."/".str_replace($THIS_BASEPATH."/", "", $filename)."[/img]");
                }
                else
                    $contents = mysqli_real_escape_string($GLOBALS['conn'],"Image based auto-shout not possible, no image files are present.");
            }
            if(!isset($language["SYSTEM_USER"]))
                $language["SYSTEM_USER"]="System";
            do_sqlquery("INSERT INTO {$TABLE_PREFIX}chat (time,name,text,uid) VALUES (UNIX_TIMESTAMP(),'".mysqli_real_escape_string($GLOBALS['conn'],$language["SYSTEM_USER"])."','".$contents."',0)");
        }
    }
}
function ipb_passgen($pwd)
{
    global $THIS_BASEPATH;
    if(!isset($THIS_BASEPATH) || empty($THIS_BASEPATH))
        $THIS_BASEPATH = str_replace(array("\\", "/include"), array("/", ""), dirname(__file__));
    if(!defined('IPS_ENFORCE_ACCESS'))
        define('IPS_ENFORCE_ACCESS', true);
    if(!defined('IPB_THIS_SCRIPT'))
        define('IPB_THIS_SCRIPT', 'public');
    require_once ($THIS_BASEPATH.'/ipb/initdata.php');
    require_once (IPS_ROOT_PATH.'sources/base/ipsRegistry.php');
    require_once (IPS_ROOT_PATH.'sources/base/ipsController.php');
    $registry = ipsRegistry::instance();
    $registry->init();
    $password = IPSText::parseCleanValue(urldecode(trim($pwd)));
    $salt = pass_the_salt(5);
    $passhash = md5(md5($salt).md5($password));
    return array($passhash, $salt);
}
function ipb_md5_passgen($pwd)
{
    $salt = pass_the_salt(5);
    $passhash = md5(md5($salt).$pwd);
    return array($passhash, $salt);
}
function set_ipb_cookie($ipb_fid = 0)
{
    global $THIS_BASEPATH, $registry;
    if(!isset($THIS_BASEPATH) || empty($THIS_BASEPATH))
        $THIS_BASEPATH = str_replace(array("\\", "/include"), array("/", ""), dirname(__file__));
    if(!defined('IPS_ENFORCE_ACCESS'))
        define('IPS_ENFORCE_ACCESS', true);
    if(!defined('IPB_THIS_SCRIPT'))
        define('IPB_THIS_SCRIPT', 'public');
    if(!isset($registry) || empty($registry))
    {
        require_once ($THIS_BASEPATH.'/ipb/initdata.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsRegistry.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsController.php');
        $registry = ipsRegistry::instance();
        $registry->init();
    }
    if($ipb_fid > 0)
    {
        require_once (IPS_ROOT_PATH.'sources/handlers/han_login.php');
        $ipb_login = new han_login($registry);
        $ipb_login->loginWithoutCheckingCredentials($ipb_fid);
    }
}
function kill_ipb_cookie()
{
    setcookie('session_id', "", -3600, '/');
    setcookie('member_id', "", -3600, '/');
    setcookie('pass_hash', "", -3600, '/');
}
function ipb_create($username, $email, $password, $id_level, $newuid)
{
    global $THIS_BASEPATH, $TABLE_PREFIX, $registry;
    if(!isset($THIS_BASEPATH) || empty($THIS_BASEPATH))
        $THIS_BASEPATH = str_replace(array("\\", "/include"), array("/", ""), dirname(__file__));
    if(!defined('IPS_ENFORCE_ACCESS'))
        define('IPS_ENFORCE_ACCESS', true);
    if(!defined('IPB_THIS_SCRIPT'))
        define('IPB_THIS_SCRIPT', 'public');
    if(!isset($registry) || empty($registry))
    {
        require_once ($THIS_BASEPATH.'/ipb/initdata.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsRegistry.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsController.php');
        $registry = ipsRegistry::instance();
        $registry->init();
    }
    $member_info = IPSMember::create(array("members" => array(
            "name" => "$username",
            "members_display_name" => "$username",
            "email" => "$email",
            "password" => "$password",
            "member_group_id" => "$id_level",
            "allow_admin_mails" => "1",
            "members_created_remote" => "1")));
    $ipb_fid = $member_info["member_id"];
    do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `ipb_fid`=".$ipb_fid." WHERE `id`=".$newuid);
}
function ipb_send_pm($ipb_sender = 0, $ipb_recepient, $ipb_subject, $ipb_msg, $system = false)
{
    global $ipb_prefix, $THIS_BASEPATH, $btit_settings, $TABLE_PREFIX, $registry;
    if($ipb_sender == 0)
    {
        $system = true;
        if(isset($btit_settings["ipb_autoposter"]) && $btit_settings["ipb_autoposter"] != 0)
            $ipb_sender = (int)(0 + $btit_settings["ipb_autoposter"]);
        else
            return false;
        $get = get_result("SELECT `ipb_fid` `recipient` FROM `{$TABLE_PREFIX}users` WHERE `id`=".$ipb_recepient);
    }
    else
    {
        $get = get_result("SELECT (SELECT `ipb_fid` FROM `{$TABLE_PREFIX}users` WHERE `id`=".$ipb_sender.") `sender`, (SELECT `ipb_fid` FROM `{$TABLE_PREFIX}users` WHERE `id`=".$ipb_recepient.") `recipient`");
        $ipb_sender = (int)(0 + $get[0]["sender"]);
    }
    $ipb_recepient = (int)(0 + $get[0]["recipient"]);
    if($ipb_sender == 0 || $ipb_recepient == 0 || $ipb_sender == $ipb_recipient)
    {
        // Something is not right. fail
        return false;
    }
    if(!isset($THIS_BASEPATH) || empty($THIS_BASEPATH))
        $THIS_BASEPATH = str_replace(array("\\", "/include"), array("/", ""), dirname(__file__));
    if(!defined('IPS_ENFORCE_ACCESS'))
        define('IPS_ENFORCE_ACCESS', true);
    if(!defined('IPB_THIS_SCRIPT'))
        define('IPB_THIS_SCRIPT', 'public');
    if(!isset($registry) || empty($registry))
    {
        require_once ($THIS_BASEPATH.'/ipb/initdata.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsRegistry.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsController.php');
        $registry = ipsRegistry::instance();
        $registry->init();
    }
    require_once (IPSLib::getAppDir('members').'/sources/classes/messaging/messengerFunctions.php');
    $clean_subj = trim($ipb_subject, "'");
    $clean= str_replace('\r\n', '<br>', $ipb_msg);
    $clean= str_replace('\n', '<br>', $ipb_msg);
    $clean_post = trim($clean,"'");
    $classMessage = new messengerFunctions($registry);
    // Reciever, Sender, array of other users to invite (Display Name), Subject, Message, Is system message
    $classMessage->sendNewPersonalTopic($ipb_recepient, $ipb_sender, array(), $clean_subj, $clean_post, (($system === true)?array("isSystem" => true, "forcePm" => 1):array("forcePm" => 1)));
}
function ipb_make_post($forum_id, $forum_subj, $forum_post, $poster_id = 0, $update_old_topic = true)
{
    global $ipb_prefix, $THIS_BASEPATH, $btit_settings, $registry;
    if($poster_id == 0)
    {
        if(isset($btit_settings["ipb_autoposter"]) && $btit_settings["ipb_autoposter"] != 0)
            $poster_id = (int)(0 + $btit_settings["ipb_autoposter"]);
        else
            return;
    }
    if(!isset($THIS_BASEPATH) || empty($THIS_BASEPATH))
        $THIS_BASEPATH = str_replace(array("\\", "/include"), array("/", ""), dirname(__file__));
    if(!defined('IPS_ENFORCE_ACCESS'))
        define('IPS_ENFORCE_ACCESS', true);
    if(!defined('IPB_THIS_SCRIPT'))
        define('IPB_THIS_SCRIPT', 'public');
    if(!isset($registry) || empty($registry))
    {
        require_once ($THIS_BASEPATH.'/ipb/initdata.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsRegistry.php');
        require_once (IPS_ROOT_PATH.'sources/base/ipsController.php');
        $registry = ipsRegistry::instance();
        $registry->init();
    }
    require_once (IPSLib::getAppDir('forums').'/sources/classes/post/classPost.php');
    $classPost = new classPost($registry);
    $old_topic = false;
    $clean_subj = trim($forum_subj, "'");
    $clean_post = trim($forum_post, "'");
    $forum = ipsRegistry::getClass('class_forums')->forum_by_id[$forum_id];
    $classPost->setForumID($forum_id);
    $classPost->setForumData($forum);
    $classPost->setAuthor($poster_id);
    $classPost->setPostContentPreFormatted($clean_post);
    $classPost->setPublished(true);
    if($update_old_topic === false)
        $mycount = 0;
    else
    {
        $res = get_result("SELECT `t`.* FROM `{$ipb_prefix}topics` `t` LEFT JOIN `{$ipb_prefix}posts` `p` ON `t`.`tid`=`p`.`topic_id` WHERE `t`.`forum_id`=".$forum_id." AND `t`.`title`='".
            mysqli_real_escape_string($GLOBALS['conn'],$clean_subj)."' AND `t`.`last_post`=`p`.`post_date` AND `t`.`last_poster_id`=`p`.`author_id`");
        $mycount = count($res);
    }
    if($mycount > 0)
    {
        $topic = $res[0];
        $topicID = $topic["tid"];
        $classPost->setTopicID($topicID);
        $classPost->setTopicData($topic);
        $classPost->addReply();
    }
    else
    {
        $topic = get_result("SELECT MAX(`tid`)+1 `tid` FROM `{$ipb_prefix}topics`");
        $topicID = $topic[0]["tid"];
        $classPost->setTopicID($topicID);
        $classPost->setTopicTitle($clean_subj);
        $classPost->addTopic();
    }
    return $topicID;
}
function userage($year, $month, $day)
{
    $year_diff = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff = date("d") - $day;
    if($month_diff < 0)
        $year_diff--;
    elseif($month_diff == 0 && $day_diff < 0)
        $year_diff--;
    return $year_diff;
}
function ext_err_msg($heading = 'Error!', $string)
{
    global $language, $BASEURL, $THIS_BASEPATH;
    // get user's style
    $resheet = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}style where id=".$CURUSER["style"]." LIMIT 1");
    if(!$resheet)
    {
        $STYLEPATH = "$THIS_BASEPATH/style/Xbtit_Original";
        $STYLEURL = "$BASEURL/style/Xbtit_Original";
    }
    else
    {
        $resstyle = mysqli_fetch_array($resheet);
        $STYLEPATH = "$THIS_BASEPATH/".$resstyle["style_url"];
        $STYLEURL = "$BASEURL/".$resstyle["style_url"];
    }
    // just in case not found the language
    if(!$language['BACK'])
        $language['BACK'] = 'Back';
    $content = "<html>
              <head>
              <title>".$heading."</title>
              <link rel='stylesheet' type='text/css' href='".$STYLEURL."/main.css' />
              </head>
              <body>
              <br /><br /><br /><br /><br /><br /><br />
              <table width='30%' align='center'>
              <tr>
              <td class='error'><center>".$heading."</center></td>
              </tr>
              <td bgcolor='#ECEDF3' align='center' style='color:#000000'>
              <img src='".$STYLEURL."/images/error.gif' alt='' style='float:left; margin:5px' />
              <br />
              ".$string."
              <br />
              <br />
              </tr>
              </table><br /><br />
              <center><a href='index.php'>".$language['BACK']."</a></center>
              </body>
              </html>";
    echo $content;
}
if(!function_exists("remover"))
{
    function remover($string, $sep1, $sep2)
    {
        $string = substr($string, 0, strpos($string, $sep2));
        $string = substr(strstr($string, $sep1), 1);
        return $string;
    }
}
if(!function_exists("strrrchr"))
{
    function strrrchr($haystack, $needle)
    {
        return substr($haystack, 0, strpos($haystack, $needle) + strlen($needle));
    }
}
//Get Board list by dodge 2008
function get_forum_list($fid, $i, $autoSubmit=true, $endForm=true)
{
    global $CURUSER, $btit_settings, $TABLE_PREFIX, $db_prefix, $ipb_prefix;
    if(substr($btit_settings["forum"], 0, 3) == "smf")
    {
        $return = "\n<input type=\"hidden\" name=\"cid\" value=\"$i\" />\n";
        $return .= "\n<select name=\"forumid\"".(($autoSubmit)?" onchange=\"this.form.submit();\"":"")."><option value=0>---</option>\n";
        //first we get the categories
        $res = do_sqlquery("SELECT ".(($btit_settings["forum"] == "smf")?"`ID_CAT`":"`id_cat`").", `name` FROM `{$db_prefix}categories`", true);
        while($arr = mysqli_fetch_assoc($res))
        {
            //now, we get the forums, not the "sub-forums"
            $res2 = do_sqlquery("SELECT ".(($btit_settings["forum"] == "smf")?"`ID_BOARD`":"`id_board`")." `idb`, `name` FROM `{$db_prefix}boards` WHERE `child".(($btit_settings["forum"] == "smf")?"L":"_l").
                "evel`=0 AND ".(($btit_settings["forum"] == "smf")?"`ID_CAT`=".$arr["ID_CAT"]:"`id_cat`=".$arr["id_cat"])." ORDER BY `board".(($btit_settings["forum"] == "smf")?"O":"_o")."rder`", true);
            $return .= "&nbsp;&nbsp;<option value=".(($btit_settings["forum"] == "smf")?$arr["ID_CAT"]:$arr["id_cat"])." disabled>".$arr["name"]."</option>\n";
            while($arr2 = mysqli_fetch_assoc($res2))
            {
                $res3 = do_sqlquery("SELECT ".(($btit_settings["forum"] == "smf")?"`ID_BOARD`":"`id_board`")." `idb`, `name` FROM `{$db_prefix}boards` WHERE `child".(($btit_settings["forum"] == "smf")?"L":"_l").
                    "evel`=1 AND ".(($btit_settings["forum"] == "smf")?"`ID_PARENT`":"`id_parent`")."=".$arr2["idb"]." ORDER BY `board".(($btit_settings["forum"] == "smf")?"O":"_o")."rder`", true);
                $num_subs = mysqli_num_rows($res3);
                if($num_subs > 0)
                {
                    $return .= "\n<optgroup label=\"".$arr2["name"]."\">";
                    while($arr3 = mysqli_fetch_assoc($res3))
                    {
                        if($arr3["idb"] == $fid)
                            $selected = "selected";
                        else
                            $selected = "";
                        $return .= "\n<option value=".$arr3["idb"]." ".$selected.">".$arr3["name"]."</option>\n";
                    }
                    $return .= "</optgroup>";
                }
                else
                {
                    if($arr2["idb"] == $fid)
                        $selected = "selected";
                    else
                        $selected = "";
                    $return .= "\n<option value=".$arr2["idb"]." ".$selected.">".$arr2["name"]."</option>\n";
                }
            }
        }
        $return .= "\n</select>\n".(($endForm)?"</form>\n":"");
    }
    elseif($btit_settings["forum"] == "ipb")
    {
        $res = get_result("SELECT `id`, `name` FROM `{$ipb_prefix}forums` WHERE `parent_id`!='-1' ORDER BY `id` ASC", true, $btit_settings["cache_duration"]);
        $return = "\n<input type=\"hidden\" name=\"cid\" value=\"$i\" />\n";
        $return .= "\n<select name=\"forumid\"".(($autoSubmit)?" onchange=\"this.form.submit();\"":"")."><option value=0>---</option>\n";
        foreach($res as $id => $arr)
        {
            $return .= "\n<option value=\"".$arr["id"].($fid == $arr["id"]?"\" selected=\"selected\">":"\">").htmlspecialchars(unesc($arr["name"]))."</option>\n";
        }
        $return .= "\n</select>\n".(($endForm)?"</form>\n":"");
    }
    else
    {
        $res = get_result("SELECT id, name, minclassread, minclasscreate FROM {$TABLE_PREFIX}forums WHERE minclassread<=".intval($CURUSER["id_level"]), true, $btit_settings["cache_duration"]);
        $return = "\n<input type=\"hidden\" name=\"cid\" value=\"$i\" />\n";
        $return .= "\n<select name=\"forumid\"".(($autoSubmit)?" onchange=\"this.form.submit();\"":"")."><option value=0>---</option>\n";
        foreach($res as $id => $arr)
        {
            $return .= "\n<option value=\"".$arr["id"].($fid == $arr["id"]?"\" selected=\"selected\">":"\">").htmlspecialchars(unesc($arr["name"]))."</option>\n";
        }
        $return .= "\n</select>\n".(($endForm)?"</form>\n":"");
    }
    return $return;
}
//begin new_auto_topic by dodge 2008
function new_auto_topic($boardid, $curuid, $filename, $forum_comment, $hash)
{
    global $CURUSER, $btit_settings, $TABLE_PREFIX, $db_prefix, $ipb_prefix;
    $topic_tag = $btit_settings["smf_tag"];
    if($btit_settings["forum"] == "ipb")
    {
        $lasttopic = ipb_make_post($boardid, $filename, $forum_comment, $curuid, false);
        if(!$lasttopic)
        {
            $topic = get_result("SELECT MAX(`tid`) `tid` FROM `{$ipb_prefix}topics`", true);
            $lasttopic = $topic[0]["tid"];
        }
        do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `topicid`='$lasttopic' WHERE `info_hash`='$hash'", true);
    }
    elseif(substr($btit_settings["forum"], 0, 3) == "smf")
    {
        if($btit_settings["forum"] == "smf")
            do_sqlquery("INSERT INTO {$db_prefix}topics (`ID_TOPIC`, `isSticky`, `ID_BOARD`, `ID_MEMBER_STARTED`, `ID_MEMBER_UPDATED`, `numViews`) VALUES (NULL, '0', '$boardid', $curuid, $curuid, '1')", true);
        else
            do_sqlquery("INSERT INTO {$db_prefix}topics (`id_topic`, `is_sticky`, `id_board`, `id_member_started`, `id_member_updated`, `num_views`) VALUES (NULL, '0', '$boardid', $curuid, $curuid, '1')", true);
        $lasttopic = mysqli_insert_id($GLOBALS['conn']);
        if($btit_settings["forum"] == "smf")
            do_sqlquery("INSERT INTO `{$db_prefix}messages` (`ID_MSG`, `ID_TOPIC`, `ID_BOARD`, `posterTime`, `ID_MEMBER`, `subject`, `posterName`, `posterEmail`, `posterIP`, `smileysEnabled`, `body`) VALUES (\"\", '$lasttopic', '$boardid', UNIX_TIMESTAMP(), $curuid, \"".
                $topic_tag."".$filename."\", '".$CURUSER["username"]."', '".$CURUSER["email"]."', '".$CURUSER["cip"]."', 1, '$forum_comment')", true);
        else
            do_sqlquery("INSERT INTO `{$db_prefix}messages` (`id_msg`, `id_topic`, `id_board`, `poster_time`, `id_member`, `subject`, `poster_name`, `poster_email`, `poster_ip`, `smileys_enabled`, `body`) VALUES (\"\", '$lasttopic', '$boardid', UNIX_TIMESTAMP(), $curuid, \"".
                $topic_tag."".$filename."\", '".$CURUSER["username"]."', '".$CURUSER["email"]."', '".$CURUSER["cip"]."', 1, '$forum_comment')", true);
        $lastmessage = mysqli_insert_id($GLOBALS['conn']);
        do_sqlquery("UPDATE `{$db_prefix}topics` SET ".(($btit_settings["forum"] == "smf")?"`ID_FIRST_MSG`":"`id_first_msg`")."=$lastmessage, ".(($btit_settings["forum"] == "smf")?"`ID_LAST_MSG`":
            "`id_last_msg`")."=$lastmessage WHERE ".(($btit_settings["forum"] == "smf")?"`ID_TOPIC`":"`id_topic`")."=$lasttopic", true);
        do_sqlquery("UPDATE `{$db_prefix}boards` SET ".(($btit_settings["forum"] == "smf")?"`ID_LAST_MSG`":"`id_last_msg`")."=$lastmessage, ".(($btit_settings["forum"] == "smf")?"`numTopics`=`numTopics`":
            "`num_topics`=`num_topics`")."+1, ".(($btit_settings["forum"] == "smf")?"`numPosts`=`numPosts`":"`num_posts`=`num_posts`")."+1 WHERE ".(($btit_settings["forum"] == "smf")?"`ID_BOARD`":"`id_board`").
            "=$boardid", true);
        do_sqlquery("UPDATE `{$db_prefix}members` SET `posts`=`posts`+1 WHERE ".(($btit_settings["forum"] == "smf")?"`ID_MEMBER`":"`id_member`")."=$curuid", true);
        do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `topicid`='$lasttopic' WHERE `info_hash`='$hash'", true);
    }
    else
    {
        $add_topic_count = ", topiccount=topiccount+1";
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}topics (userid, forumid, subject) VALUES($curuid, '$boardid', '".$topic_tag." ".$filename."')", true);
        $lasttopic = mysqli_insert_id($GLOBALS['conn']) or stderr($language["ERROR"], $language["ERR_NO_TOPIC_ID"]);
        do_sqlquery("INSERT INTO {$TABLE_PREFIX}posts (topicid, userid, added, body) VALUES($lasttopic, $curuid, UNIX_TIMESTAMP(), '$forum_comment')", true);
        $lastmessage = mysqli_insert_id($GLOBALS['conn']) or stderr($language["ERROR"], $language["ERR_POST_ID_NA"]);
        do_sqlquery("UPDATE {$TABLE_PREFIX}topics SET lastpost=(SELECT MAX(id) FROM {$TABLE_PREFIX}posts WHERE topicid=$lasttopic) WHERE id=$lasttopic", true);
        do_sqlquery("UPDATE {$TABLE_PREFIX}forums SET postcount=postcount+1 $add_topic_count WHERE id='$boardid'", true);
        do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `topicid`='$lasttopic' WHERE `info_hash`='$hash'", true);
    }
}
//end new_forum_topic
//clean shoutbox start
if($btit_settings["fmhack_shoutbox_clean"] == "enabled")
{
    function execcommand_clean($Data)
    {
        $Data = trim($Data[0][1]);
        if(empty($Data))
        {
            global $TABLE_PREFIX;
            require ("../".load_language("lang_main.php"));
            if(!isset($language["SYSTEM_USER"]))
                $language["SYSTEM_USER"]="System";
            (@do_sqlquery("TRUNCATE {$TABLE_PREFIX}chat"));
            (@do_sqlquery("INSERT INTO {$TABLE_PREFIX}chat (uid, time, name, text) VALUES (0,".time().", '".mysqli_real_escape_string($GLOBALS['conn'],$language["SYSTEM_USER"])."','".$language["SHOUT_CLEANED"]."')"));
        }
        return false;
    }
    function execcommand_noclean($Data)
    {
        $preMatchn = "/clean";
        if(!empty($preMatchn))
        {
            global $TABLE_PREFIX, $CURUSER;
            (@do_sqlquery("delete from {$TABLE_PREFIX}chat where text LIKE '%".$preMatchn."%' AND uid=".$CURUSER["uid"].""));
        }
        return false;
    }
}
//clean shoutbox end
//staff comment
function getLevelSC($cur_level)
{
    global $TABLE_PREFIX;
    $query = "SELECT id, id_level FROM {$TABLE_PREFIX}users_level";
    $rez = do_sqlquery($query, true);
    while($row = mysqli_fetch_assoc($rez))
    {
        if($row['id'] == $cur_level)
        {
            return $row['id_level'];
        }
    }
    return 0;
}
// end staff comment
function check_upload($tmp_name = "", $name = "")
{
    global $btit_settings, $language, $CURUSER, $res_seo;
    /*
    Return values
    1 = $tmp_name empty
    2 = $name empty
    3 = $tmp_name doesn't exist
    4 = At least one of the banned triggers were matched
    5 = All good
    */
    if($tmp_name == "")
        return 1;
    if($name == "")
        return 2;
    if(file_exists($tmp_name))
    {
        $handle = fopen($tmp_name, "r");
        $haystack = " ".fread($handle, filesize($tmp_name));
        fclose($handle);
        $needles = ((isset($btit_settings["secsui_quarantine_search_terms"]) && !empty($btit_settings["secsui_quarantine_search_terms"]))?explode(",", $btit_settings["secsui_quarantine_search_terms"]):array());
        $found = "no";
        if(is_array($needles) && !empty($needles))
        {
            foreach($needles as $needle)
            {
                if($found == "no" && strpos($haystack, $needle))
                {
                    $found = "yes";
                }
            }
        }
        if($found == "yes")
        {
            $quarantined_name = "";
            if(is_dir($btit_settings["secsui_quarantine_dir"]))
            {
                if(is_writable($btit_settings["secsui_quarantine_dir"]))
                {
                    $quarantined_name = $btit_settings["secsui_quarantine_dir"]."/hack_attempt_".$CURUSER["uid"]."-".time()."-".$name;
                    move_uploaded_file($tmp_name, $quarantined_name);
                }
                else
                {
                    send_pm(0, $btit_settings["secsui_quarantine_pm"], sqlesc($language["QUAR_ERR"]), sqlesc($language["QUAR_DIR_PROBLEM_1"]." ".((!empty($btit_settings["secsui_quarantine_dir"]))?"([b]".$btit_settings["secsui_quarantine_dir"].
                        "[/b]) ":"").$language["QUAR_DIR_PROBLEM_3"]));
                    @unlink($tmp_name);
                }
            }
            else
            {
                send_pm(0, $btit_settings["secsui_quarantine_pm"], sqlesc($language["QUAR_ERR"]), sqlesc($language["QUAR_DIR_PROBLEM_1"]." ".((!empty($btit_settings["secsui_quarantine_dir"]))?"([b]".$btit_settings["secsui_quarantine_dir"].
                    "[/b]) ":"").$language["QUAR_DIR_PROBLEM_2"]));
                @unlink($tmp_name);
            }
            send_pm(0, $btit_settings["secsui_quarantine_pm"], sqlesc($language["QUAR_PM_SUBJ"]), sqlesc("[url=".$BASEURL."/".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated_user"] ==
                "true")?$CURUSER["uid"]."_".strtr($CURUSER["username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$CURUSER["uid"])."]".$CURUSER["username"]."[/url] ".$language["QUAR_PM_MSG_1"].
                ":"."\n\n[b]".((isset($quarantined_name) && !empty($quarantined_name))?$quarantined_name:"[color=red]".$language["QUAR_UNABLE"]."[/color]")."[/b]\n\n".$language["QUAR_PM_MSG_2"]." [b]".getip()."[/b]\n\n".
                ":yikes:"));
            return 4;
        }
        else
            return 5;
    }
    else
        return 3;
}
function hash_generate($row, $pwd, $user)
{
    global $btit_settings;
    $salt = pass_the_salt(20);
    $passtype = array();
    // Type 1 - Used in btit / xbtit / Torrent Trader / phpMyBitTorrent
    $passtype[1]["hash"] = md5($pwd);
    $passtype[1]["rehash"] = md5($pwd);
    $passtype[1]["salt"] = "";
    $passtype[1]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    // Type 2 - Used in TBDev / U-232 / SZ Edition / Invision Power Board
    $passtype[2]["hash"] = md5(md5($row["salt"]).md5($pwd));
    $passtype[2]["rehash"] = md5(md5($salt).md5($pwd));
    $passtype[2]["salt"] = $salt;
    $passtype[2]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    // Type 3 - Used in Free Torrent Source /  Yuna Scatari / TorrentStrike / TSSE
    $passtype[3]["hash"] = md5($row["salt"].$pwd.$row["salt"]);
    $passtype[3]["rehash"] = md5($salt.$pwd.$salt);
    $passtype[3]["salt"] = $salt;
    $passtype[3]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    // Type 4 - Used in Gazelle
    $passtype[4]["hash"] = sha1(md5($row["salt"]).$pwd.sha1($row["salt"]).$btit_settings["secsui_ss"]);
    $passtype[4]["rehash"] = sha1(md5($salt).$pwd.sha1($salt).$btit_settings["secsui_ss"]);
    $passtype[4]["salt"] = $salt;
    $passtype[4]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    // Type 5 - Used in Simple Machines Forum
    $passtype[5]["hash"] = sha1(strtolower($user).$pwd);
    $passtype[5]["rehash"] = sha1(strtolower($user).$pwd);
    $passtype[5]["salt"] = "";
    $passtype[5]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    // Type 6 - New xbtit hashing style
    $passtype[6]["hash"] = sha1(substr(md5($pwd), 0, 16)."-".md5($row["salt"])."-".substr(md5($pwd), 16, 16));
    $passtype[6]["rehash"] = sha1(substr(md5($pwd), 0, 16)."-".md5($salt)."-".substr(md5($pwd), 16, 16));
    $passtype[6]["salt"] = $salt;
    $passtype[6]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    // Type 7 - New xbtitFM hashing style
    $passtype[7]["hash"] = sha1(substr(sha1($pwd), 20, 20)."-".sha1($row["salt"])."-".substr(sha1($pwd), 0, 20));
    $passtype[7]["rehash"] = sha1(substr(sha1($pwd), 20, 20)."-".sha1($salt)."-".substr(sha1($pwd), 0, 20));
    $passtype[7]["salt"] = $salt;
    $passtype[7]["dupehash"] = substr(sha1(md5($pwd)), 30, 10).substr(sha1(md5($pwd)), 0, 10);
    return $passtype;
}
function pass_the_salt($len = 5)
{
    $salt = '';
    srand((double)microtime() * 1000000);
    for($i = 0; $i < $len; $i++)
    {
        $num = rand(33, 126);
        if($num == '92')
        {
            $num = 93;
        }
        $salt .= chr($num);
    }
    return $salt;
}
function whatsMyRssUrl()
{
    global $BASEURL, $CURUSER;

    $custom_rss=(isset($CURUSER["custom_rss"]) && !empty($CURUSER["custom_rss"]))?explode("[X]", $CURUSER["custom_rss"]):array();
    $auth = base64_encode(substr($CURUSER["password"], -10)."-".$CURUSER["uid"]."-".substr($CURUSER["password"], 0, 10)."-".$CURUSER["random"]);
    if(count($custom_rss) > 0)
    {
        $rss_catlist = explode(".", $custom_rss[0]);
        $rss_limit = $custom_rss[1];
    }
    else
    {
        $rss_catlist[0] = "all";
        $rss_limit = 5;
    }
    return $BASEURL."/advanced_rss.php?cats=".(($rss_catlist[0] == "all")?"all":implode(";", $rss_catlist))."&tpc=".$rss_limit."&auth=".$auth;
}
function is_mod_rewrite_enabled()
{
    if ($_SERVER['HTTP_MOD_REWRITE'] == 'On')
        return true;
    else {

        if (function_exists('apache_get_modules')) {
          $modules = apache_get_modules();
          $mod_rewrite = in_array('mod_rewrite', $modules);
        } else {
          $mod_rewrite =  getenv('HTTP_MOD_REWRITE')=='On' ? true : false ;
        }
        return $mod_rewrite;
    }
}
function save_image($inPath, $outPath)
{
    //Download images from remote server
    $in = fopen($inPath, "rb");
    $out = fopen($outPath, "wb");
    while ($chunk = fread($in, 8192))
    {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

function getExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i)
    {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

/**
 * xml2array() will convert the given XML text to an array in the XML structure.
 * Link: http://www.bin-co.com/php/scripts/xml2array/
 * Arguments : $contents - The XML text
 *                $get_attributes - 1 or 0. If this is 1 the function will get the attributes as well as the tag values - this results in a different array structure in the return value.
 *                $priority - Can be 'tag' or 'attribute'. This will change the way the resulting array sturcture. For 'tag', the tags are given more importance.
 * Return: The parsed XML in an array form. Use print_r() to see the resulting array structure.
 * Examples: $array =  xml2array(file_get_contents('feed.xml'));
 *              $array =  xml2array(file_get_contents('feed.xml', 1, 'attribute'));
 */
function xml2array($contents, $get_attributes = 1, $priority = 'tag')
{
    if (!$contents)
        return array();

    if (!function_exists('xml_parser_create'))
    {
        //print "'xml_parser_create()' function not found!";
        return array();
    }

    //Get the XML parser of PHP - PHP must have this module for the parser to work
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);

    if (!$xml_values)
        return; //Hmm...

    //Initializations
    $xml_array = array();
    $parents = array();
    $opened_tags = array();
    $arr = array();

    $current = &$xml_array; //Refference

    //Go through the tags.
    $repeated_tag_index = array(); //Multiple tags with same name will be turned into an array
    foreach ($xml_values as $data)
    {
        unset($attributes, $value); //Remove existing values, or there will be trouble

        //This command will extract these variables into the foreach scope
        // tag(string), type(string), level(int), attributes(array).
        extract($data); //We could use the array by itself, but this cooler.

        $result = array();
        $attributes_data = array();

        if (isset($value))
        {
            if ($priority == 'tag')
                $result = $value;
            else
                $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        }

        //Set the attributes too.
        if (isset($attributes) and $get_attributes)
        {
            foreach ($attributes as $attr => $val)
            {
                if ($priority == 'tag')
                    $attributes_data[$attr] = $val;
                else
                    $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
            }
        }

        //See tag status and do the needed.
        if ($type == "open")
        { //The starting of the tag '<tag>'
            $parent[$level - 1] = &$current;
            if (!is_array($current) or (!in_array($tag, array_keys($current))))
            { //Insert New tag
                $current[$tag] = $result;
                if ($attributes_data)
                    $current[$tag . '_attr'] = $attributes_data;
                $repeated_tag_index[$tag . '_' . $level] = 1;

                $current = &$current[$tag];

            }
            else
            { //There was another element with the same tag name

                if (isset($current[$tag][0]))
                { //If there is a 0th element it is already an array
                    $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                    $repeated_tag_index[$tag . '_' . $level]++;
                }
                else
                { //This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag], $result); //This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag . '_' . $level] = 2;

                    if (isset($current[$tag . '_attr']))
                    { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                        unset($current[$tag . '_attr']);
                    }

                }
                $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
                $current = &$current[$tag][$last_item_index];
            }

        }
        elseif ($type == "complete")
        { //Tags that ends in 1 line '<tag />'
            //See if the key is already taken.
            if (!isset($current[$tag]))
            { //New Key
                $current[$tag] = $result;
                $repeated_tag_index[$tag . '_' . $level] = 1;
                if ($priority == 'tag' and $attributes_data)
                    $current[$tag . '_attr'] = $attributes_data;

            }
            else
            { //If taken, put all things inside a list(array)
                if (isset($current[$tag][0]) and is_array($current[$tag]))
                { //If it is already an array...

                    // ...push the new element into that array.
                    $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;

                    if ($priority == 'tag' and $get_attributes and $attributes_data)
                    {
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag . '_' . $level]++;

                }
                else
                { //If it is not an array...
                    $current[$tag] = array($current[$tag], $result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag . '_' . $level] = 1;
                    if ($priority == 'tag' and $get_attributes)
                    {
                        if (isset($current[$tag . '_attr']))
                        { //The attribute of the last(0th) tag must be moved as well

                            $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                            unset($current[$tag . '_attr']);
                        }

                        if ($attributes_data)
                        {
                            $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                        }
                    }
                    $repeated_tag_index[$tag . '_' . $level]++; //0 and 1 index is already taken
                }
            }

        }
        elseif ($type == 'close')
        { //End of tag '</tag>'
            $current = &$parent[$level - 1];
        }
    }

    return ($xml_array);
}




// EOF
//================================================
//shout commands
	  function execcommand_pruneshout ($Data)
  {
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery("delete from {$TABLE_PREFIX}chat where `text` LIKE '%".$Data."%'",false));
      require("../".load_language("lang_commands.php"));
      execcommand_message (''.$language[SUCCESS].'',true);
    }

    return true;
  }

  function execcommand_prune ($Data)
  {
    $Data = trim ($Data[0][1]);
    if (empty ($Data))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("TRUNCATE {$TABLE_PREFIX}chat",false));
	  require("../".load_language("lang_commands.php"));
      execcommand_message(''.$language[SUCCESS].'',true);
    }
    else
    {
	  $query = do_sqlquery ("SELECT id FROM {$TABLE_PREFIX}users WHERE username = " . sqlesc ($Data),false);
      if (0 < @mysqli_num_rows ($query))
      {
        $Userid = get_result ($query, 0, 'id');
		require("../".load_language("lang_commands.php"));
        (do_sqlquery ("delete from {$TABLE_PREFIX}chat where uid = " . sqlesc ($Userid),false));
        execcommand_message (''.$language[SUCCESS].'',true);
      }
    }

    return true;
  }

  function execcommand_message ($message = '<div style="background: #FFECCE; border: 1px solid #EA5F00; padding-left: 5px;">Your command has been executed. (Results may be shown in next refresh!)</div>', $forcemessage = false)
  {
    if ((mysql_affected_rows () OR $forcemessage))
    {
      echo $message;
    }

  }
  function execcommand_noprune ($Data)
  {
      global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text='/prune'",false));
      
   }
   function execcommand_nopruneshout ($Data)
  {
    $Match = "/pruneshout";
    if (!empty ($Match))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$Match."%'",false));
      
    }

    return true;
  }
 if(!function_exists('warn_expiration')){
		function warn_expiration($timestamp=0){return gmdate('Y-m-d H:i:s',$timestamp);}
		}
function execcommand_warn ($Data)
  {
    
    global $CURUSER;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   global $TABLE_PREFIX;
      ($query = do_sqlquery ("SELECT id FROM {$TABLE_PREFIX}users WHERE username=" . sqlesc ($Data),false));
      if ((count($query)>0))
      {
        $userid = get_result ($query, 0, 'id');
		$warneduntil = warn_expiration(mktime(date('H')+2,date('i'),date('s'),date('m'),date('d')+addslashes('7'),date('Y')));
		require("../".load_language("lang_commands.php"));
		$modcomment=$language['WARNCOM'];
		$sub=sqlesc($language['WARNSUB']);
		$msg=sqlesc("".$language['WARNMSG']." ".$warneduntil.". \n \n ".$language['NOREPLY']."</b>");
		global $TABLE_PREFIX;
        (do_sqlquery ('UPDATE '.$TABLE_PREFIX.'users SET warnreason = ' . sqlesc ($modcomment) . ', warnadded = ' . sqlesc ($warneduntil) . ', warn = \'yes\', warns = warns + 1, warnaddedby = ' . sqlesc ($CURUSER['username']) . ' WHERE id=' .$userid,false));
        send_pm (0,$userid,$sub,$msg);
		$old="/warn";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$old."%'",false));
        
      execcommand_message (''.$language[SUCCESS].'',true);
		
      }else{
	  $old="/warn";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$old."%'",false));
		}
    }

    return true;
  }
  function execcommand_nowarn ($Data)
  {
    $WMatch = "/warn";
    if (!empty ($WMatch))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$WMatch."%'",false));
      
    }

    return true;
  }
  function execcommand_unwarn ($Data)
  {
    
    global $CURUSER, $TABLE_PREFIX;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   
      ($query = do_sqlquery  ("SELECT id FROM {$TABLE_PREFIX}users WHERE username=" . sqlesc ($Data),false));
      if (($query AND 0 < mysqli_num_rows ($query)))
      {
        $userid = get_result ($query, 0, 'id');
		$warneduntil = "0";
		require("../".load_language("lang_commands.php"));
		$modcomment="".$language['WARNRCOM']." ".$CURUSER[username]."";
		$sub=sqlesc($language['WARNRSUB']);
		$msg=sqlesc("".$language['WARNRMSG']." ".$CURUSER[username].". \n \n".$language['NOREPLY']."</b>");
		(do_sqlquery  ('UPDATE '.$TABLE_PREFIX.'users SET warnreason = ' . sqlesc ($modcomment) . ', warnadded = ' . sqlesc ($warneduntil) . ', warn = \'no\', warns = warns - 1, warnaddedby = ' . sqlesc (0) . ' WHERE id=' . sqlesc ($userid),false));
        send_pm (0,$userid,$sub,$msg);
		$old="/unwarn";
		(do_sqlquery  ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$old."%'",false));
		
        execcommand_message ('<div style="background: #000000; border: 1px solid #EA5F00; padding-left: 5px;"><font color=white><center><b>'.$language[USER].' ' . htmlspecialchars ($Data) . ' '.$language[UWARN].'</b></font></center></div>', true);
		
      }else{
	  $old="/unwarn";
		(do_sqlquery  ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$old."%'",false));
		}
    }

    return true;
  }
  function execcommand_nounwarn ($Data)
  {
    $UWMatch = "/unwarn";
    if (!empty ($UWMatch))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$UWMatch."%'",false));
      
    }

    return true;
  }
  
  function execcommand_alertstaff ($Data)
  {
    
    global $CURUSER, $BASEURL;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   
        
       execcommand_message ('<div style="background: #FFECCE; border: 1px solid #EA5F00; padding-left: 5px;"><b><img src='.$BASEURL.'/ajaxchat/images/s_notice.png>&nbsp;&nbsp;&nbsp;&nbsp; ' . $Data . ' </b></div>', true);
		
      
    }

    return true;
  }
  
  
  function execcommand_noalertstaff ($Data)
  {
    global $CURUSER, $TABLE_PREFIX;
    $AMatch = "/alert";
    if (!empty ($AMatch))
    {
	 
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$AMatch."%' AND uid='".$CURUSER["uid"]."'",false));
      
    }

    return true;
  }
  function execcommand_prewarnu ($Data)
  {
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	     global $TABLE_PREFIX;
		 require("../".load_language("lang_commands.php"));
		(do_sqlquery ("INSERT INTO {$TABLE_PREFIX}chat (uid, time, name, text) VALUES (0,".time().", 'System','".htmlspecialchars($Data)." [color=red]".$language[CPOST]."[/color]')",false));
		$preold="/prewarnu";
		(do_sqlquery("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$preold."%'",true));
		
        execcommand_message ('<div style="background: #FFECCE; border: 1px solid #EA5F00; padding-left: 5px;">'.$language[USER].' ' . htmlspecialchars ($Data) . ' '.$language[CA].'</div>', true);
		
      }
    
    
    return true;
  }
  function execcommand_noprewarnu ($Data)
  {
    global $CURUSER;
    $preMatch = "/prewarnu";
    if (!empty ($preMatch))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$preMatch."%' AND uid='".$CURUSER["uid"]."'",false));
      
    }
	    return true;
  }
  function execcommand_close ($Data)
  {
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	     global $TABLE_PREFIX;
		(do_sqlquery("UPDATE {$TABLE_PREFIX}settings SET `value`=".sqlesc($Data)." WHERE `key`='shouton'",false));
		if($Data=="true"){
		$status="Opened";
		}else{
		$status="Closed";
		}
		$closeold="/shouton";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$closeold."%'",false));
		require("../".load_language("lang_commands.php"));
        execcommand_message ('<div style="background: #000000; border: 1px solid #EA5F00; padding-left: 5px;"><font color=white><center><b>'.$language['CHAT'].' '.$status.'! '.$language['CHATE'].'</b></font></center></div>', true);
		
      }
    
    
    return true;
  }
  function execcommand_noclose ($Data)
  {
    global $CURUSER;
    $CMatch = "/shouton";
    if (!empty ($CMatch))
    {
	   global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$CMatch."%' AND uid='".$CURUSER["uid"]."'",false));
      
    }
	    return true;
  }
  
  function execcommand_staffpm ($Data)
  {
    global $CURUSER;
	$Data = trim ($Data[0][1]);
	global $TABLE_PREFIX;
	$staffpm = array();
	($query =do_sqlquery("select id  from {$TABLE_PREFIX}users where id_level>5 AND id_level <=8 AND id!='".$CURUSER[uid]."'",false));
	while ($row = mysqli_fetch_row($query))
	$staffpm[]=$row[0];
	
    if (!empty ($Data))
    {
	
      $sub=sqlesc("Staff PM");
      $msg=sqlesc("".$Data."\n \n<b>This is a System Message you can't reply to this!</b>");
      foreach ($staffpm as $to) {	  
	  send_pm(0,$to,$sub,$msg);
	  }
	  $staffold="/staffpm";
	    global $TABLE_PREFIX;
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$staffold."%'",false));
		require("../".load_language("lang_commands.php"));
      execcommand_message ('<div style="background: #000000; border: 1px solid #EA5F00; padding-left: 5px;"><font color=white><center><b>'.$language['MAILED'].'</b></font></center></div>', true);
    }
	
	    return true;
  }
  function execcommand_nostaffpm ($Data)
  {
    global $CURUSER;
    $SMatch = "/staffpm";
    if (!empty ($SMatch))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$SMatch."%' AND uid='".$CURUSER["uid"]."'",false));
      
    }
	    return true;
  }
  function execcommand_stats ($Data)
  {
    global $XBTT_USE, $TABLE_PREFIX;;
    if ($XBTT_USE){
   $tseeds="f.seeds+ifnull(x.seeders,0)";
    $tleechs="f.leechers+ifnull(x.leechers,0)";
    $tcompletes="f.finished+ifnull(x.completed,0)";
    $ttables="{$TABLE_PREFIX}files f INNER JOIN xbt_files x ON x.info_hash=f.bin_hash";
    $udownloaded="u.downloaded+IFNULL(x.downloaded,0)";
    $uuploaded="u.uploaded+IFNULL(x.uploaded,0)";
    $utables="{$TABLE_PREFIX}users u LEFT JOIN xbt_users x ON x.uid=u.id";
   }
else{
    $tseeds="f.seeds";
    $tleechs="f.leechers";
    $tcompletes="f.finished";
    $ttables="{$TABLE_PREFIX}files f";
    $udownloaded="u.downloaded";
    $uuploaded="u.uploaded";
    $utables="{$TABLE_PREFIX}users u";
    }
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   global $TABLE_PREFIX;
      ($query = get_result ("SELECT ul.prefixcolor, ul.suffixcolor, u.id_level, u.avatar,u.email,u.cip, u.username,{$udownloaded} as downloaded,{$uuploaded} as uploaded,UNIX_TIMESTAMP(u.joined) as joined,UNIX_TIMESTAMP(u.lastconnect) as lastconnect,ul.level, u.flag, c.name, c.flagpic, u.pid, u.time_offset, u.smf_fid FROM {$utables} INNER JOIN {$TABLE_PREFIX}users_level ul ON ul.id=u.id_level LEFT JOIN {$TABLE_PREFIX}countries c ON u.flag=c.id WHERE u.username=" . sqlesc ($Data),false,$btit_settings["cache_duration"]));
      if (count($query)>0)
      {
        foreach ($query as $id=> $user);
		$joined=$user["joined"]==0 ? "N/A" : get_date_time($user["joined"]);
		$lastaccess=$user["lastconnect"]==0 ? "N/A" : get_date_time($user["lastconnect"]);
        $downloaded = makesize ($user['downloaded']);
        $uploaded = makesize ($user['uploaded']);
        $ratio = number_format ($user['uploaded'], $user['downloaded']);
        $ratio = str_replace ('\'', '\\\'', $ratio);
		if($ratio=="0"){
		$ratio='&#8734;';
		}
		global $BASEURL;
		$avatar=$user[avatar];
		if(isset($avatar) AND $avatar!=""){
		$avatar="<img src=".$user[avatar]." width=80 height=80>";
		}else{
		$avatar="<img src='".$BASEURL."/images/question.gif' width=80 height=80>";
		}
        require("../".load_language("lang_userdetails.php"));
        echo '
				<table width="100%" cellspacing="0" cellpadding="2" border="0">
					<tr>
					    <td width="90" class=lista valign=top>
						'.$avatar.'
						</td>
						<td class=lista valign=top>
						<div style="background: #c3d1dc; border: 1px solid #396184; padding-left: 5px;"><b><font color=black>'.$language["UD"].'  '.unesc($user[prefixcolor]).$user[username].unesc($user[suffixcolor]).'</font></b></div><br>
						<b>'.$language['USER_JOINED'].': '.$joined.'</b><br><b>'.$language['USER_LASTACCESS'].': '.$lastaccess.'</b><br><b>'.$language['UPLOADED'].': '.$uploaded.'</b><br><b>'.$language['DOWNLOADED'].': '.$downloaded.'</b><br><b>'.$language['RATIO'].': '.$ratio.'</b>
						</td>
						</tr></table>						
						</td>
					</tr>
				</table>';
        return null;
      }
      require("../".load_language("lang_userdetails.php"));
      echo '<div style="background: #000000; border: 1px solid #EA5F00; padding-left: 5px;"><font color=white><center><b>'.$language["UDNO"].'</b></center></font></div>';
	  $statsold="/stats";
	      global $TABLE_PREFIX;
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$statsold."%'",false));
    }

  }
  function execcommand_nostats ($Data)
  {
    global $CURUSER;
    $STMatch = "/stats";
    if (!empty ($STMatch))
    {
	   global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$STMatch."%' AND uid='".$CURUSER["uid"]."'",false));
      
    }
	    return true;
  }
  //booted
  if(!function_exists('booted_expiration')){
  function booted_expiration($timestamp=0){return gmdate('Y-m-d H:i:s',$timestamp);}
  }
  function execcommand_boot ($Data)
  {
    
    global $CURUSER;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	  global $TABLE_PREFIX;
      ($query = do_sqlquery ("SELECT id FROM {$TABLE_PREFIX}users WHERE username=" . sqlesc ($Data),false));
      if (($query AND 0 < mysqli_num_rows ($query)))
      {
        $userid = get_result ($query, 0, 'id');
		$addbooted=booted_expiration(mktime(date('H')+2,date('i'),date('s'),date('m'),date('d')+addslashes('7'),date('Y')));
		require("../".load_language("lang_commands.php"));
		$modcomment=$language['BOOTCOM'];
		$sub=sqlesc($language['BOOTSUB']);
		$msg=sqlesc("".$language['BOOTMSG']." ".$addbooted.". \n \n".$language['NOREPLY']."</b>");
		global $TABLE_PREFIX;
        (do_sqlquery ('UPDATE '.$TABLE_PREFIX.'users SET whybooted = ' . sqlesc ($modcomment) . ', addbooted = ' . sqlesc ($addbooted) . ', booted = \'yes\', whobooted = ' . sqlesc ($CURUSER['username']) . ' WHERE id=' . sqlesc ($userid),false));
        send_pm (0,$userid,$sub,$msg);
		$oldb="/boot";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldb."%'",false));
        
      execcommand_message (''.$language[SUCCESS].'',true);
		
      }else{
	  $oldb="/boot";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldb."%'",false));
		}
    }

    return true;
  }
  function execcommand_noboot ($Data)
  {
    $WMatchb = "/boot";
    if (!empty ($WMatchb))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$WMatchb."%'",false));
      
    }

    return true;
  }
  function execcommand_unboot ($Data)
  {
    
    global $CURUSER;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   global $TABLE_PREFIX;
      ($query = do_sqlquery ("SELECT id FROM {$TABLE_PREFIX}users WHERE username=" . sqlesc ($Data),false));
      if (($query AND 0 < mysqli_num_rows ($query)))
      {
        $userid = get_result ($query, 0, 'id');
		require("../".load_language("lang_commands.php"));
		$sub=sqlesc($language['BOOTRSUB']);
		$msg=sqlesc("".$language['BOOTRMSG']." ".$CURUSER[username].". \n \n".$language['NOREPLY']."</b>");
		global $TABLE_PREFIX;
        (do_sqlquery ('UPDATE '.$TABLE_PREFIX.'users SET booted = \'no\' WHERE id=' . sqlesc ($userid),false));
        send_pm (0,$userid,$sub,$msg);
		$oldb="/unboot";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldb."%'",false));
		
        execcommand_message ('<div style="background: #000000; border: 1px solid #EA5F00; padding-left: 5px;"><font color=white><center><b>'.$language[USER].' ' . htmlspecialchars ($Data) . ' '.$language[UBAN].'</b></font></center></div>', true);
		
      }else{
	  $oldb="/unboot";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldb."%'",false));
	  }
    }

    return true;
  }
  function execcommand_nounboot ($Data)
  {
    $UWMatchb = "/unboot";
    if (!empty ($UWMatchb))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$UWMatchb."%'",false));
      
    }

    return true;
  }
  //shoutbox banned command
  function execcommand_ban ($Data)
  {
    
    global $CURUSER;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   global $TABLE_PREFIX;
      ($query = do_sqlquery ("SELECT id FROM {$TABLE_PREFIX}users WHERE username=" . sqlesc ($Data),false));
      if (($query AND 0 < mysqli_num_rows ($query)))
      {
        $userid = get_result ($query, 0, 'id');
		
		require("../".load_language("lang_commands.php"));
		global $TABLE_PREFIX;
        (do_sqlquery ('UPDATE '.$TABLE_PREFIX.'users SET sbox = \'yes\' WHERE id=' . sqlesc ($userid),false));
        $oldban="/ban";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldban."%'",false));
        
      execcommand_message (''.$language[SUCCESS].'',true);
		
      }else{
	  $oldban="/ban";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldban."%'",false));
	  }
    }

    return true;
  }
  function execcommand_noban ($Data)
  {
    $WMatchbb = "/ban";
    if (!empty ($WMatchbb))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$WMatchbb."%'",false));
      
    }

    return true;
  }
  function execcommand_unban ($Data)
  {
    
    global $CURUSER;
    $Data = trim ($Data[0][1]);
    if (!empty ($Data))
    {
	   global $TABLE_PREFIX;
      ($query = do_sqlquery ("SELECT id FROM {$TABLE_PREFIX}users WHERE username=" . sqlesc ($Data),false));
      if (($query AND 0 < mysqli_num_rows ($query)))
      {
        $userid = get_result ($query, 0, 'id');
		require("../".load_language("lang_commands.php"));
		global $TABLE_PREFIX;
        (do_sqlquery ('UPDATE '.$TABLE_PREFIX.'users SET sbox = \'no\' WHERE id=' . sqlesc ($userid),false));
        $oldbb="/unban";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldbb."%'",false));
		
        execcommand_message ('<div style="background: #000000; border: 1px solid #EA5F00; padding-left: 5px;"><font color=white><center><b>'.$language[USER].' ' . htmlspecialchars ($Data) . ' '.$language[UBAN].'</b></font></center></div>', true);
		
      }else{
	  $oldban="/unban";
		(do_sqlquery ("delete from {$TABLE_PREFIX}chat WHERE text LIKE '%".$oldban."%'",false));
	  }
    }

    return true;
  }
  function execcommand_nounban ($Data)
  {
    $UWMatchbb = "/unban";
    if (!empty ($UWMatchbb))
    {
	  global $TABLE_PREFIX;
      (do_sqlquery ("delete from {$TABLE_PREFIX}chat where text LIKE '%".$UWMatchbb."%'",false));
      
    }

    return true;
  }
  //end shoutbox banned command
//end commands
//===============================================

?>
