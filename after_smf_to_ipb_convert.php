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

$BASEDIR=str_replace("\\", "/", dirname(__FILE__));
require_once($BASEDIR."/include/settings.php");
require_once($BASEDIR."/include/functions.php");
require_once($BASEDIR."/language/english/lang_ipb_import.php");

// Lets open a connection to the database
$GLOBALS['conn'] = mysqli_connect($dbhost,$dbuser,$dbpass);
mysqli_select_db( $GLOBALS['conn'],$database);

$cookie=test_my_cookie();

if($cookie["is_valid"]===true)
{
    $res=do_sqlquery("SELECT `ul`.`admin_access` FROM `{$TABLE_PREFIX}users` `u` LEFT JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id` WHERE `u`.`id`=".$cookie["id"]);
    if(@mysqli_num_rows($res)==1)
        $row=mysqli_fetch_assoc($res);
}
if(!isset($row["admin_access"]))
    $row["admin_access"]="no";

if($cookie["is_valid"]===false || $row["admin_access"]=="no")
    die($lang[38]);

$lock=mysqli_fetch_assoc(do_sqlquery("SELECT random FROM {$TABLE_PREFIX}users WHERE id=1"));
if($lock["random"]==12321)
    die($lang[26] . $lang[27] . $lang[35]);

$ipb_conf=$BASEDIR."/ipb/conf_global.php";

if(file_exists($ipb_conf))
    $conf_exists=true;
else
    $conf_exists=false;

if(is_writable($ipb_conf))
    $ipb_conf_writable=true;
else
    $ipb_conf_writable=false;

($conf_exists===false ? $files_present=$lang[1] : $files_present=$lang[0]);

if($files_present==$lang[0])
{
    if($ipb_conf_writable===true)
    {
        $filename=$BASEDIR."/ipb/conf_global.php";
        $fd=fopen($filename,"r+");
        $data=fread($fd,filesize($filename));
        ftruncate($fd,0);
        rewind($fd);
        $search=array("\$INFO['banned_group']\t\t\t=\t'5';", "\$INFO['admin_group']\t\t\t=\t'4';", "\$INFO['guest_group']\t\t\t=\t'2';", "\$INFO['auth_group']\t\t\t=\t'1';");
        $replace=array("\$INFO['banned_group']\t\t\t=\t'0';", "\$INFO['admin_group']\t\t\t=\t'8';", "\$INFO['guest_group']\t\t\t=\t'1';", "\$INFO['auth_group']\t\t\t=\t'2';");
        $data=str_replace($search, $replace, $data);
        $start=strpos($data, "\$INFO['sql_tbl_prefix']");
        $end=strpos(substr($data,$start),";")+1;
        $data2=substr($data,$start,$end);
        fwrite($fd,$data);
        fclose($fd);
        $data=str_replace(array("\$INFO['sql_tbl_prefix']", "\t","'"), array("\$ipb_prefix","","\""),$data2);
        $data=str_replace("x=\"", "x = \"", $data);

        $filename=dirname(__FILE__)."/include/settings.php";
        if (file_exists($filename))
        {
            if (is_writable($filename))
            {
                $filesize=filesize($filename);
                $fd = fopen($filename, "w");
                $contents ="<?php\n\n";
                $contents.="\$dbhost = \"$dbhost\";\n";
                $contents.="\$dbuser = \"$dbuser\";\n";
                $contents.="\$dbpass = \"$dbpass\";\n";
                $contents.="\$database = \"$database\";\n";
                $contents.= "\$TABLE_PREFIX = \"$TABLE_PREFIX\";\n";
                $contents.= "\$mySecret = \"$mySecret\";\n";
                if(isset($db_prefix))
                    $contents.= "\$db_prefix = \"$db_prefix\";\n";
                $contents.= $data."\n";
                $contents.= "\n?>";
                fwrite($fd,$contents);
                fclose($fd);
            }
            else
                die($lang[36] . $filename . $lang[37]);
        }
    }
    else
        die($lang[39] . $ipb_conf . $lang[17] . $lang[9] . $lang[35]);
}
(isset($_GET["act"])) ? $act=$_GET["act"] : $act="";
(isset($_GET["confirm"])) ? $confirm=$_GET["confirm"] : $confirm="";
(isset($_GET["start"])) ? $start=(int)0+$_GET["start"] : $start=2;
(isset($_GET["counter"])) ? $counter=(int)0+$_GET["counter"] : $counter=0;
(isset($_GET["lastacc"])) ? $lastacc=(int)0+$_GET["lastacc"] : $lastacc=0;

if($act=="")
{
        echo $lang[2];
        echo $lang[3] . (($files_present==$lang[0]) ? "#00FF00" : "#FF0000") . $lang[4] . $files_present .  $lang[5];
        if($files_present==$lang[1])
            die($lang[6] . $lang[8] . $lang[9] . $lang[35]);

    // Make sure IPB is installed by checking the tables are there
    // (There should be 127 as of v3.1.4 but lets be generous and ensure
    // there are at least 100 IPB tables)
    $count=0;
    $tablelist=do_sqlquery("SHOW TABLES LIKE '".$ipb_prefix."%'"); 
    $count=mysqli_num_rows($tablelist);
    (($count<100) ? $ipb_installed=$lang[1] : $ipb_installed=$lang[0]);
    
    echo $lang[10] . (($ipb_installed==$lang[0]) ? "#00FF00" : "#FF0000") . $lang[4] . $ipb_installed .  $lang[5];
    if($ipb_installed==$lang[1])
        die($lang[7] . $lang[8] . $lang[9] . $lang[35]);

    // Check if the default english language file is present and writable
    (!file_exists($BASEDIR."/ipb/cache/lang_cache/1/core_public_error.php") ? $lang_present=$lang[1] : $lang_present=$lang[0]);
    if($lang_present==$lang[0])
        (is_writable($BASEDIR."/ipb/cache/lang_cache/1/core_public_error.php") ? $lang_writable=$lang[0] : $lang_writable=$lang[1]);
     
    if($lang_present==$lang[1])
        $status=$lang[11];
    elseif($lang_present==$lang[0] && $lang_writable==$lang[1])
        $status=$lang[12];
    else
        $status=$lang[0];
    
    echo $lang[13] . (($status==$lang[0]) ? "#00FF00" : "#FF0000") . $lang[4] . $status . $lang[5];
    
    if($status==$lang[11])
        die($lang[15] . $BASEDIR . "/ipb/cache/lang_cache/1/core_public_error.php" . $lang[16] . $lang[9] . $lang[35]);
    elseif($status==$lang[12])
        die($lang[15] . $BASEDIR . "/ipb/cache/lang_cache/1/core_public_error.php" . $lang[17] . $lang[9] . $lang[35]);

    die($lang[19] . $_SERVER["PHP_SELF"] . "?act=init_setup" . $lang[20] . $lang[35]);
    
}
elseif($act=="init_setup"  && $confirm!="yes")
{

    die($lang[21] . $lang[22] . $lang[23] . $lang[35]);

}
elseif($act=="init_setup"  && $confirm=="yes")
{
    $input_pwd = $_GET["pwd"];

    if ($input_pwd!=="$dbpass")
       {
       die($lang[34] . $lang[35]);
    }

    // Purge the current forum settings we're about to rebuild
    @do_sqlquery("TRUNCATE TABLE {$ipb_prefix}forum_perms");
    @do_sqlquery("TRUNCATE TABLE {$ipb_prefix}groups");

    // Get current tracker ranks
    $query ="SELECT id, level, edit_forum, admin_access ";
    $query.="FROM {$TABLE_PREFIX}users_level ";
    $query.="WHERE id>=1 ";
    $query.="ORDER BY id ASC";
    
    $getranks=do_sqlquery($query);
    $ranklist=",";
    $ranklist2=",";
    while($rank=mysqli_fetch_assoc($getranks))
    {
        if($rank["id"]>2)
            $ranklist.=$rank["id"].",";

        $query1="INSERT INTO `{$ipb_prefix}forum_perms` (`perm_id`, `perm_name`) VALUES(".$rank["id"].", '".$rank["level"]."')";

        // Rank is guest, set default guest settings
        if($rank["id"]==1)
        {
            $query2="INSERT INTO `{$ipb_prefix}groups` (`g_id`, `g_view_board`, `g_mem_info`, `g_other_topics`, `g_use_search`, `g_email_friend`, `g_edit_profile`, `g_post_new_topics`, `g_reply_own_topics`, `g_reply_other_topics`, `g_edit_posts`, `g_delete_own_posts`, `g_open_close_posts`, `g_delete_own_topics`, `g_post_polls`, `g_vote_polls`, `g_use_pm`, `g_is_supmod`, `g_access_cp`, `g_title`, `g_append_edit`, `g_access_offline`, `g_avoid_q`, `g_avoid_flood`, `g_icon`, `g_attach_max`, `g_avatar_upload`, `prefix`, `suffix`, `g_max_messages`, `g_max_mass_pm`, `g_search_flood`, `g_edit_cutoff`, `g_promotion`, `g_hide_from_list`, `g_post_closed`, `g_perm_id`, `g_photo_max_vars`, `g_dohtml`, `g_edit_topic`, `g_email_limit`, `g_bypass_badwords`, `g_can_msg_attach`, `g_attach_per_post`, `g_topic_rate_setting`, `g_dname_changes`, `g_dname_date`, `g_mod_preview`, `g_rep_max_positive`, `g_rep_max_negative`, `g_signature_limits`, `g_can_add_friends`, `g_hide_online_list`, `g_bitoptions`, `g_pm_perday`, `g_mod_post_unit`, `g_ppd_limit`, `g_ppd_unit`, `g_displayname_unit`, `g_sig_unit`, `g_pm_flood_mins`, `g_max_notifications`, `g_max_bgimg_upload`) VALUES
(".$rank["id"].", 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '".$rank["level"]."', 0, 0, 0, 0, '', -1, 0, '', '', 50, 0, 0, 0, '-1&-1', 0, 0, ".$rank["id"].", '50:150:150', 0, 0, '10:15', 0, 0, 0, 0, 0, 0, 0, 10, 0, '0:::::', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        }

        // Rank is validating, set up limited access
        if($rank["id"]==2)
        {
            $query2="INSERT INTO `{$ipb_prefix}groups` (`g_id`, `g_view_board`, `g_mem_info`, `g_other_topics`, `g_use_search`, `g_email_friend`, `g_edit_profile`, `g_post_new_topics`, `g_reply_own_topics`, `g_reply_other_topics`, `g_edit_posts`, `g_delete_own_posts`, `g_open_close_posts`, `g_delete_own_topics`, `g_post_polls`, `g_vote_polls`, `g_use_pm`, `g_is_supmod`, `g_access_cp`, `g_title`, `g_append_edit`, `g_access_offline`, `g_avoid_q`, `g_avoid_flood`, `g_icon`, `g_attach_max`, `g_avatar_upload`, `prefix`, `suffix`, `g_max_messages`, `g_max_mass_pm`, `g_search_flood`, `g_edit_cutoff`, `g_promotion`, `g_hide_from_list`, `g_post_closed`, `g_perm_id`, `g_photo_max_vars`, `g_dohtml`, `g_edit_topic`, `g_email_limit`, `g_bypass_badwords`, `g_can_msg_attach`, `g_attach_per_post`, `g_topic_rate_setting`, `g_dname_changes`, `g_dname_date`, `g_mod_preview`, `g_rep_max_positive`, `g_rep_max_negative`, `g_signature_limits`, `g_can_add_friends`, `g_hide_online_list`, `g_bitoptions`, `g_pm_perday`, `g_mod_post_unit`, `g_ppd_limit`, `g_ppd_unit`, `g_displayname_unit`, `g_sig_unit`, `g_pm_flood_mins`, `g_max_notifications`, `g_max_bgimg_upload`) VALUES
(".$rank["id"].", 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '".$rank["level"]."', 1, 0, 0, 0, '', 0, 0, '', '', 50, 0, 20, 0, '-1&-1', 0, 0, ".$rank["id"].", '50:150:150', 0, 0, '10:15', 0, 0, 0, 0, 0, 0, 0, 0, 0, '0:::::', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        }
        // Rank has full admin access
        elseif($rank["edit_forum"]=="yes" && $rank["admin_access"]=="yes")
        {
            $ranklist2.=$rank["id"].",";
            $query2="INSERT INTO `{$ipb_prefix}groups` (`g_id`, `g_view_board`, `g_mem_info`, `g_other_topics`, `g_use_search`, `g_email_friend`, `g_edit_profile`, `g_post_new_topics`, `g_reply_own_topics`, `g_reply_other_topics`, `g_edit_posts`, `g_delete_own_posts`, `g_open_close_posts`, `g_delete_own_topics`, `g_post_polls`, `g_vote_polls`, `g_use_pm`, `g_is_supmod`, `g_access_cp`, `g_title`, `g_append_edit`, `g_access_offline`, `g_avoid_q`, `g_avoid_flood`, `g_icon`, `g_attach_max`, `g_avatar_upload`, `prefix`, `suffix`, `g_max_messages`, `g_max_mass_pm`, `g_search_flood`, `g_edit_cutoff`, `g_promotion`, `g_hide_from_list`, `g_post_closed`, `g_perm_id`, `g_photo_max_vars`, `g_dohtml`, `g_edit_topic`, `g_email_limit`, `g_bypass_badwords`, `g_can_msg_attach`, `g_attach_per_post`, `g_topic_rate_setting`, `g_dname_changes`, `g_dname_date`, `g_mod_preview`, `g_rep_max_positive`, `g_rep_max_negative`, `g_signature_limits`, `g_can_add_friends`, `g_hide_online_list`, `g_bitoptions`, `g_pm_perday`, `g_mod_post_unit`, `g_ppd_limit`, `g_ppd_unit`, `g_displayname_unit`, `g_sig_unit`, `g_pm_flood_mins`, `g_max_notifications`, `g_max_bgimg_upload`) VALUES
(".$rank["id"].", 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '".$rank["level"]."', 1, 1, 1, 1, 'public/style_extra/team_icons/admin.png', 0, 1, '<span style=''color:red;''>', '</span>', 50, 6, 20, 5, '-1&-1', 0, 1, ".$rank["id"].", '500:170:240', 1, 1, '10000:0', 1, 1, 0, 2, 3, 30, 0, 100, 100, '0:::::', 1, 0, 1048512, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        }
        // Rank has forum edit rights but no admin access (moderator/low level admin)
        elseif($rank["edit_forum"]=="yes" && $rank["admin_access"]=="no")
        {
            $ranklist2.=$rank["id"].",";
            $query2="INSERT INTO `{$ipb_prefix}groups` (`g_id`, `g_view_board`, `g_mem_info`, `g_other_topics`, `g_use_search`, `g_email_friend`, `g_edit_profile`, `g_post_new_topics`, `g_reply_own_topics`, `g_reply_other_topics`, `g_edit_posts`, `g_delete_own_posts`, `g_open_close_posts`, `g_delete_own_topics`, `g_post_polls`, `g_vote_polls`, `g_use_pm`, `g_is_supmod`, `g_access_cp`, `g_title`, `g_append_edit`, `g_access_offline`, `g_avoid_q`, `g_avoid_flood`, `g_icon`, `g_attach_max`, `g_avatar_upload`, `prefix`, `suffix`, `g_max_messages`, `g_max_mass_pm`, `g_search_flood`, `g_edit_cutoff`, `g_promotion`, `g_hide_from_list`, `g_post_closed`, `g_perm_id`, `g_photo_max_vars`, `g_dohtml`, `g_edit_topic`, `g_email_limit`, `g_bypass_badwords`, `g_can_msg_attach`, `g_attach_per_post`, `g_topic_rate_setting`, `g_dname_changes`, `g_dname_date`, `g_mod_preview`, `g_rep_max_positive`, `g_rep_max_negative`, `g_signature_limits`, `g_can_add_friends`, `g_hide_online_list`, `g_bitoptions`, `g_pm_perday`, `g_mod_post_unit`, `g_ppd_limit`, `g_ppd_unit`, `g_displayname_unit`, `g_sig_unit`, `g_pm_flood_mins`, `g_max_notifications`, `g_max_bgimg_upload`) VALUES
(".$rank["id"].", 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0, '".$rank["level"]."', 1, 0, 0, 0, 'public/style_extra/team_icons/staff.png', 500, 1, '', '', 50, 5, 0, 0, '-1&-1', 0, 0, ".$rank["id"].", '50:150:150', 0, 1, '10:15', 0, 0, 0, 1, 3, 30, 0, 100, 10, '0:::::', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        }
        else
        {
            $query2="INSERT INTO `{$ipb_prefix}groups` (`g_id`, `g_view_board`, `g_mem_info`, `g_other_topics`, `g_use_search`, `g_email_friend`, `g_edit_profile`, `g_post_new_topics`, `g_reply_own_topics`, `g_reply_other_topics`, `g_edit_posts`, `g_delete_own_posts`, `g_open_close_posts`, `g_delete_own_topics`, `g_post_polls`, `g_vote_polls`, `g_use_pm`, `g_is_supmod`, `g_access_cp`, `g_title`, `g_append_edit`, `g_access_offline`, `g_avoid_q`, `g_avoid_flood`, `g_icon`, `g_attach_max`, `g_avatar_upload`, `prefix`, `suffix`, `g_max_messages`, `g_max_mass_pm`, `g_search_flood`, `g_edit_cutoff`, `g_promotion`, `g_hide_from_list`, `g_post_closed`, `g_perm_id`, `g_photo_max_vars`, `g_dohtml`, `g_edit_topic`, `g_email_limit`, `g_bypass_badwords`, `g_can_msg_attach`, `g_attach_per_post`, `g_topic_rate_setting`, `g_dname_changes`, `g_dname_date`, `g_mod_preview`, `g_rep_max_positive`, `g_rep_max_negative`, `g_signature_limits`, `g_can_add_friends`, `g_hide_online_list`, `g_bitoptions`, `g_pm_perday`, `g_mod_post_unit`, `g_ppd_limit`, `g_ppd_unit`, `g_displayname_unit`, `g_sig_unit`, `g_pm_flood_mins`, `g_max_notifications`, `g_max_bgimg_upload`) VALUES
(".$rank["id"].", 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, '".$rank["level"]."', 1, 0, 0, 0, '', 500, 1, '', '', 50, 5, 0, 0, '-1&-1', 0, 0, ".$rank["id"].", '50:150:150', 0, 1, '10:15', 0, 0, 0, 1, 3, 30, 0, 10, 1, '0:::::', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)";
        }
        // Run the queries
        @do_sqlquery($query1);
        @do_sqlquery($query2);
    }
    // Force the group cache to rebuild
    @do_sqlquery("UPDATE `{$ipb_prefix}cache_store` SET `cs_value`='a:0:{}', `cs_updated`=0 WHERE `cs_key`='group_cache'");
    // Allow all ranks to see the initial test forum
    @do_sqlquery("UPDATE `{$ipb_prefix}permission_index` SET `perm_view`='*', `perm_2`='', `perm_3`='', `perm_4`='', `perm_5`='', `perm_6`='', `perm_7`='' WHERE `app`='forums' AND `perm_type`='forum' AND `perm_type_id`=1");
    @do_sqlquery("UPDATE `{$ipb_prefix}permission_index` SET `perm_view`='*', `perm_2`='*', `perm_3`='".$ranklist."', `perm_4`='".$ranklist."', `perm_5`='".$ranklist."', `perm_6`='".$ranklist."', `perm_7`='' WHERE `app`='forums' AND `perm_type`='forum' AND `perm_type_id`=2");
    // Setup the calendar permissions
    @do_sqlquery("UPDATE `{$ipb_prefix}permission_index` SET `perm_view`='*', `perm_2`='".$ranklist."', `perm_3`='".$ranklist2."', `perm_4`='', `perm_5`='', `perm_6`='', `perm_7`='' WHERE `app`='calendar' AND `perm_type`='calendar'");
    // Make any other forums and categories only visible to the owner rank
    @do_sqlquery("UPDATE `{$ipb_prefix}permission_index` SET `perm_view`=',8,', `perm_2`=',8,', `perm_3`=',8,', `perm_4`=',8,', `perm_5`=',8,', `perm_6`=',8,', `perm_7`='' WHERE `app`='forums' AND `perm_type`='forum' AND `perm_type_id`>2");

    // Disable forum registration
    $res=do_sqlquery("SELECT `cs_value` FROM `{$ipb_prefix}cache_store` WHERE `cs_key`='settings'");
    $row=mysqli_fetch_assoc($res);
    $array=unserialize($row["cs_value"]);
    $array["no_reg"]=1;
    $cs_value=serialize($array);
    @do_sqlquery("UPDATE `{$ipb_prefix}cache_store` SET `cs_value`='".mysqli_real_escape_string($GLOBALS['conn'],$cs_value)."' WHERE `cs_key`='settings'");
    @do_sqlquery("UPDATE {$ipb_prefix}core_sys_conf_settings` SET `conf_value`=1 WHERE `conf_key`='no_reg'");

    // Update the registration closed message to something more appropriate

    // finding the host
    $host = empty($_SERVER['HTTP_HOST']) ? $_SERVER['SERVER_NAME'] . (empty($_SERVER['SERVER_PORT']) || $_SERVER['SERVER_PORT'] == '80' ? '' : ':' . $_SERVER['SERVER_PORT']) : $_SERVER['HTTP_HOST'];
    // finding the base path.
    $baseurl = 'http://' . $host . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/'));

    $ipb_lang="ipb/cache/lang_cache/1/core_public_error.php";
    $fd=fopen($ipb_lang, "r+");
    $lang_data=fread($fd, filesize($ipb_lang));
    ftruncate($fd,0);
    rewind($fd);
    $lang_search="The administrator is currently not accepting new membership registrations.";
    $lang_replace="Sorry, registration via IPB is disabled. Registration for this forum must be done via the Tracker <a target='_self' href='".$baseurl."/index.php?page=signup'>Here</a>.<br /><br />If you already have a tracker account please <a target='_self' href='index.php?app=core&module=global&section=login'>login here</a> with the same credentials.";
    $lang_data=str_replace($lang_search, $lang_replace, $lang_data);
    fwrite($fd,$lang_data);
    fclose($fd);

    @do_sqlquery("UPDATE `{$ipb_prefix}core_sys_lang_words` SET `word_default`='".mysqli_real_escape_string($GLOBALS['conn'],$lang_replace)."' WHERE `lang_id`=1 AND
    `word_pack`='public_error' AND `word_key`='registration_disabled'");

    // Make sure there is an ipb_fid column in the users table, if not add one
    $query=do_sqlquery("SHOW COLUMNS FROM `{$TABLE_PREFIX}users` WHERE `Field`='ipb_fid'");
    $count=mysqli_num_rows($query);
    if ($count==0)
    {
        @do_sqlquery("ALTER TABLE `{$TABLE_PREFIX}users` ADD `ipb_fid` INT(11) NOT NULL DEFAULT '0'");
        @do_sqlquery("ALTER TABLE `{$TABLE_PREFIX}users` ADD INDEX (`ipb_fid`)");
    }
    die($lang[40] . $lang[41] . $lang[35]);
}
elseif($act=="member_bridge" && $confirm=="yes")
{
    if($start==2)
        $end=$start+98;
    else
        $end=$start+99;
    $newstart=$end+1;
    
    if($lastacc==0)
    {
        $getlast=do_sqlquery("SELECT `id` FROM `{$TABLE_PREFIX}users` ORDER BY `id` DESC LIMIT 1");
        if(@mysqli_num_rows($getlast)>0)
        {
            $gotacc=mysqli_fetch_assoc($getlast);
            $lastacc=$gotacc["id"];
            // Set everyone's member group to zero so that we can identify unbridged members later.
            @do_sqlquery("UPDATE {$ipb_prefix}members SET `member_group_id`=0");
        }
    }
    $query="SELECT `id`, `username`, `id_level`, `email`, `password`, `pass_type` FROM `{$TABLE_PREFIX}users` WHERE `id` >=$start AND `id` <=$end AND `ipb_fid`=0 ORDER BY `id` ASC";
    $list=do_sqlquery($query);
    $count=mysqli_num_rows($list);

    if($count>0)
    {
        while ($account=mysqli_fetch_assoc($list))
        {
            // Let's make sure their forum password matches their tracker password so that the dual login works.
            if($account["pass_type"]==1)
                $passhash=ipb_md5_passgen($account["password"]);
            else
                $passhash=array("ffffffffffffffffffffffffffffffff", "fffff");
            // Try a username check
            $res=do_sqlquery("SELECT `member_id` FROM `{$ipb_prefix}members` WHERE `name`='".mysqli_real_escape_string($GLOBALS['conn'],$account["username"])."'");
            if(@mysqli_num_rows($res)==1)
            {
                // Excellent we have a match, let's bridge the accounts and update the forum rank to match
                $row=mysqli_fetch_assoc($res);
                do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `ipb_fid`=".$row["member_id"]." WHERE `id`=".$account["id"]);
                do_sqlquery("UPDATE `{$ipb_prefix}members` SET `member_group_id`='".$account["id_level"]."', `members_pass_hash`='".mysqli_real_escape_string($GLOBALS['conn'],$passhash[0])."', `members_pass_salt`='".mysqli_real_escape_string($GLOBALS['conn'],$passhash[1])."', `conv_password`=NULL WHERE `member_id`='".$row["member_id"]."'");
                $counter++;
            }
            else
            {
                // Damn, no match. Let's try a match on their email address instead.
                $res=do_sqlquery("SELECT `member_id` FROM `{$ipb_prefix}members` WHERE `email`='".mysqli_real_escape_string($GLOBALS['conn'],$account["email"])."'");
                if(@mysqli_num_rows($res)==1)
                {
                    // Excellent we have a match, let's bridge the accounts and update the forum rank to match
                    $row=mysqli_fetch_assoc($res);
                    do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `ipb_fid`='".$row["member_id"]."' WHERE id=".$account["id"]);
                    do_sqlquery("UPDATE `{$ipb_prefix}members` SET `member_group_id`='".$account["id_level"]."' WHERE `member_id`='".$row["member_id"]."'");
                    $counter++;
                }
            }
        }
        print("<script LANGUAGE=\"javascript\">window.location.href='".$_SERVER["PHP_SELF"]."?act=member_bridge&confirm=yes&start=$newstart&counter=$counter&lastacc=$lastacc'</script>");
    }
    elseif($start > $lastacc)
    {
        print("<script LANGUAGE=\"javascript\">window.location.href='".$_SERVER["PHP_SELF"]."?act=completed&counter=$counter'</script>");
    }
}
elseif($act=="completed")
{
    // Lock import file from future use and change to ipb mode
    @do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value` ='ipb' WHERE `key`='forum'");
    @do_sqlquery("UPDATE `{$TABLE_PREFIX}users_level` SET `ipb_group_mirror`=`id`");
    @do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `random`=12321 WHERE `id`=1");

    $res=do_sqlquery("SELECT (SELECT COUNT(*) FROM `{$TABLE_PREFIX}users` WHERE `ipb_fid`=0 AND `id`>1) `tracker_unbridged`, (SELECT COUNT(*) FROM `{$ipb_prefix}members` WHERE `member_group_id`=0) `forum_orphaned`");
    $row=mysqli_fetch_assoc($res);

    echo $lang[32] . $lang[43] . " <b>". $counter . "</b> " . $lang[44] . (($row["tracker_unbridged"]>0 || $row["forum_orphaned"]>0)?$lang[45] . " <span style='color:blue;'>".$row["tracker_unbridged"]."</span> ".$lang[46]." <span style='color:blue;'>".$row["forum_orphaned"]."</span> ".$lang[47]:"") . $lang[42] . $lang[35];
}

?>