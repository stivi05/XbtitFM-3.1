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
if(!defined("IN_BTIT"))
    die("non direct access!");

$link = urldecode($_GET["returnto"]);
if($link == "")
    $link = "index.php?page=torrents";
// save editing and got back from where i come
if((isset($_POST["comment"])) && (isset($_POST["name"])))
{
    if($_POST["action"] == $language["FRM_CONFIRM"] || $_POST["action"] == $language["FRM_CONFIRM_VALIDATE"])
    {
        if($btit_settings["fmhack_bump_torrents"] == "enabled" && $CURUSER["bump_torrents"]=="yes")
        {
            (isset($_POST["bump_torr"]) && !empty($_POST["bump_torr"]) && $_POST["bump_torr"] == "yes")?$bump_torr = "yes":$bump_torr = "no";
        }
        if($btit_settings["fmhack_extended_torrent_description"] == "enabled")
        {
            # get config
            $xtdfig_db = get_khez_config("SELECT `key`,`value` FROM `{$TABLE_PREFIX}khez_configs` WHERE `key` LIKE 'xtd_%' LIMIT 7;", $reload_cfg_interval);
            # get langs
            require (load_language('lang_xtd.php'));
            if($xtdfig_db['xtd_enabled'])
            {
                # create bbcode test array
                $bbcodes = array();
                if($xtdfig_db['xtd_img'] != 0)
                    $bbcodes[] = array('name' => 'img', 'min' => $xtdfig_db['xtd_img']);
                if($xtdfig_db['xtd_url'] != 0)
                    $bbcodes[] = array('name' => 'url', 'min' => $xtdfig_db['xtd_url']);
                # test bbcode
                $lowercase_info = strtolower($_POST['comment']);
                foreach($bbcodes as $bbcode)
                {
                    if(substr_count($lowercase_info, '['.$bbcode['name']) < $bbcode['min'])
                        stderr($language['ERROR'], sprintf($language['XTD_ERROR_TAGS'], $bbcode['min'], $bbcode['name']));
                }
                # test length
                if($xtdfig_db['xtd_chars'] != 0)
                {
                    if(strlen($_POST['comment']) < $xtdfig_db['xtd_chars'])
                        stderr($language['ERROR'], sprintf($language['XTD_ERROR_CHARS'], $xtdfig_db['xtd_chars']));
                }
            }
        }
        if($btit_settings["fmhack_direct_download"] == "enabled" && $CURUSER["add_ddl"] == "yes")
        {
            (isset($_POST["direct_link"]) && !empty($_POST["direct_link"]))?$direct_link = $_POST["direct_link"]:$direct_link = false;
            if($direct_link && !preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $direct_link))
                $direct_link = false;
            else
                $direct_link = mysqli_real_escape_string($GLOBALS['conn'],$direct_link);
        }
        if($_POST["name"] == '')
        {
            stderr("Error!", "You must specify torrent name.");
        }
        ##############################################################
        # Nfo hack -->
        if($btit_settings["fmhack_NFO_uploader_-_viewer"] == "enabled")
        {
            $HTTP_POST_FILES["nfo"]["tmp_name"] = str_replace("\\", "/", $HTTP_POST_FILES["nfo"]["tmp_name"]);
            $_FILES["nfo"]["tmp_name"] = str_replace("\\", "/", $_FILES["nfo"]["tmp_name"]);
            if((isset($_FILES["nfo"]["tmp_name"]) && !empty($_FILES["nfo"]["tmp_name"])) && (isset($_FILES["nfo"]["name"]) && !empty($_FILES["nfo"]["name"])))
            {
                $check_nfo = check_upload($_FILES["nfo"]["tmp_name"], $_FILES["nfo"]["name"]);
                switch($check_nfo)
                {
                    case 1:
                    case 2:
                        $check_nfo_err = $language["ERR_MISSING_DATA"];
                        if(file_exists($_FILES["nfo"]["tmp_name"]))
                            @unlink($_FILES["nfo"]["tmp_name"]);
                        break;
                    case 3:
                        $check_nfo_err = $language["QUAR_TMP_FILE_MISS"];
                        break;
                    case 4:
                        $check_nfo_err = $language["QUAR_OUTPUT"];
                        break;
                    case 5:
                    default:
                        $check_nfo_err = "";
                        break;
                }
                if($check_nfo_err != "")
                    stderr($language["ERROR"], $check_nfo_err);
            }
            $nfo = $_FILES["nfo"]["tmp_name"];
            $nfocheck = basename($_FILES['nfo']['name']);
            $nfohashed = AddSlashes($_POST["info_hash"]);
            if($nfocheck)
            {
                $ext = strrchr($nfocheck, '.');
                $limitedext = array(".nfo");
                if(!in_array(strtolower($ext), $limitedext))
                    $error["nfo"] = stderr($language["ERROR"], $language["NFO_NOT_NFO"]);
                if($_FILES['nfo']['size'] < "128")
                    $error["nfo"] = stderr($language["ERROR"], $language["NFO_NOT_VALID"]);
                if(empty($error))
                {
                    $result = @move_uploaded_file($nfo, "nfo/rep/".$nfohashed.".nfo");
                    if(empty($result))
                        $error["result"] = stderr($language["ERROR"], $language["NFO_CANT_MOVE"]);
                }
            }
            else
            {
                $delnfo = isset($_POST["nfo"])?"checked":"unchecked";
                if($delnfo != "checked"?"checked=\"checked\"":"")
                {
                    if(file_exists("nfo/rep/".$nfohashed.".nfo"))
                        unlink("nfo/rep/".$nfohashed.".nfo");
                }
            }
            if(is_array($error))
            {
                while(list($key, $val) = each($error))
                    echo $val;
            }
        }
        # End
        ########################################################## -->
        if($_POST["comment"] == '')
        {
            stderr("Error!", "You must specify description.");
        }
        if($btit_settings["fmhack_staff_comment_in_torrent_details"] == "enabled")
        {
            if(isset($_POST["staff_comment"]))
                $staff_comment = mysqli_real_escape_string($GLOBALS['conn'],htmlspecialchars($_POST["staff_comment"]));
            else
                $staff_comment = "";
        }
        if($btit_settings["fmhack_sticky_torrent"] == "enabled")
        {
            /*Mod by losmi -sticky start*/
            $sticky = 0;
            if($_POST["sticky"] == 'on')
                $sticky = 1;
            /*Mod by losmi -sticky end*/
        }
        if($btit_settings["fmhack_show_if_seedbox_is_used"] == "enabled")
        {
            // start seedbox
            $seedbox = 0;
            if($_POST["seedbox"] == 'on')
                $seedbox = 1;
            // end seedbox
        }
        //gold mod
        if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
        {
            $golden = 0;
            if($_POST["gold"] != '' && isset($_POST["gold"]))
                $golden = mysqli_real_escape_string($GLOBALS['conn'],$_POST["gold"]);
        }
        if($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")
        {
            //Torrent Nuke/Req Hack Start
            $req = mysqli_real_escape_string($GLOBALS['conn'],$_POST["req"]);
            $nuk = mysqli_real_escape_string($GLOBALS['conn'],$_POST["nuk"]);
            if($nuke != "false")
                $nuk_rea = mysqli_real_escape_string($GLOBALS['conn'],htmlspecialchars($_POST["nuk_rea"]));
            //Torrent Nuke/Req Hack Stop
        }
        if($btit_settings["fmhack_upload_multiplier"] == "enabled")
        {
            (isset($_POST["multiplier"]) && is_numeric($_POST["multiplier"]) && $_POST["multiplier"] >= 1 && $_POST["multiplier"] <= 10)?$mult = (int)0 + $_POST["multiplier"]:$mult = 1;
        }
        $fname = htmlspecialchars(AddSlashes(unesc($_POST["name"])));
        $torhash = AddSlashes(strtolower(preg_replace("/[^A-Fa-f0-9]/", "", $_POST["info_hash"])));
        if($btit_settings["fmhack_teams"] == "enabled")
            $team = AddSlashes($_POST["team"]);
        if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled")
            $imdb = AddSlashes($_POST["imdb"]);
        $series_id=false;
        if($btit_settings["fmhack_grab_images_from_theTVDB"]=="enabled")
        {
            $tvdb_number=(isset($_POST["tvdb_number"]) && !empty($_POST["tvdb_number"])) ? (int)0+$_POST["tvdb_number"] : 0;
            if($tvdb_number>0)
            {
                $res=get_result("SELECT `tvdb_id` FROM `{$TABLE_PREFIX}files` WHERE `info_hash`='".$torhash."'", true, $btit_settings["cache_duration"]);
                if(count($res)==1)
                {
                    if($res[0]["tvdb_id"]!=$tvdb_number)
                    {
                        $api_key = "84198CDB1D6D23DE";
                        $SeasonAndEpisode=array();
                        $theTVDBExtra=array();
                        $selected_category=intval(0 + $_POST["category"]);
                        $tvdb_catlist=(isset($btit_settings["tvdb_cats"]) && !empty($btit_settings["tvdb_cats"]))?explode(",", $btit_settings["tvdb_cats"]):array(0 => "all");

                        $seriesTitle=explode(" ", $_POST["name"]);
                        if(count($seriesTitle)==1)
                        {
                            $seriesTitle=explode(".", $_POST["name"]);
                        }
                        if(count($seriesTitle)==1)
                        {
                            $seriesTitle=explode("_", $_POST["name"]);
                        }
                        if(count($seriesTitle)>1)
                        {
                            foreach($seriesTitle as $seriesTitleValue)
                            {
                                if((strlen($seriesTitleValue)==6 && strtoupper(substr($seriesTitleValue,0,1))=="S" && strtoupper(substr($seriesTitleValue,3,1))=="E") || (strlen($seriesTitleValue)==4 && strtoupper(substr($seriesTitleValue,1,1))=="X") || (strlen($seriesTitleValue)==5 && strtoupper(substr($seriesTitleValue,2,1))=="X"))
                                {
                                    if(strlen($seriesTitleValue)==6 && strtoupper(substr($seriesTitleValue,0,1))=="S" && strtoupper(substr($seriesTitleValue,3,1))=="E")
                                    {
                                        $SeasonAndEpisode=array("season" => intval(substr($seriesTitleValue,1,2)), "episode" => intval(substr($seriesTitleValue,4,2)), "type" => "std");
                                        break;
                                    }
                                    elseif(strlen($seriesTitleValue)==4 && strtoupper(substr($seriesTitleValue,1,1))=="X")
                                    {
                                        $SeasonAndEpisode=array("season" => intval(substr($seriesTitleValue,0,1)), "episode" => intval(substr($seriesTitleValue,2,2)), "type" => "std");
                                        break;
                                    }
                                    elseif(strlen($seriesTitleValue)==5 && strtoupper(substr($seriesTitleValue,2,1))=="X")
                                    {
                                        $SeasonAndEpisode=array("season" => intval(substr($seriesTitleValue,0,2)), "episode" => intval(substr($seriesTitleValue,3,2)), "type" => "std");
                                        break;
                                    }
                                }
                            }
                            if(count($SeasonAndEpisode)==0)
                            {
                                $yearKey=-1;
                                foreach($seriesTitle as $seriesTitleKey => $seriesTitleValue)
                                {
                                    if(strlen($seriesTitleValue)==4 && $seriesTitleValue=date("Y"))
                                    {
                                        $yearKey=$seriesTitleKey;
                                        break;
                                    }
                                }
                                if($yearKey!=-1)
                                {
                                    $SeasonAndEpisode=array("airdate" => $seriesTitle[$yearKey]."-".$seriesTitle[($yearKey+1)]."-".$seriesTitle[($yearKey+2)], "type" => "episode_date");
                                }
                            }
                        }
                        if($tvdb_catlist[0]=="all" || in_array($selected_category, $tvdb_catlist))
                        {
                            if($tvdb_number>0)
                            {
                                $check_code=file_get_contents("http://www.thetvdb.com/api/".$api_key."/series/".$tvdb_number);
                                $TVDBData = xml2array($check_code);
                                if(isset($series["Data"]["Series"]["seriesid"]))
                                    $series_id=$series["Data"]["Series"]["seriesid"];
                            }
                            if(!$series_id)
                            {
                                if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "disabled" || ($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled" && $imdb==0))
                                {
                                    if(count($seriesTitle)>1)
                                    {
                                        $endReached=false;
                                        $titleToTest="";
                                        foreach($seriesTitle as $seriesTitleValue)
                                        {
                                            if(!$endReached) 
                                            {
                                                if((strlen($seriesTitleValue)==6 && strtoupper(substr($seriesTitleValue,0,1))=="S" && strtoupper(substr($seriesTitleValue,3,1))=="E") || (strlen($seriesTitleValue)==4 && strtoupper(substr($seriesTitleValue,1,1))=="X") || (strlen($seriesTitleValue)==5 && strtoupper(substr($seriesTitleValue,2,1))=="X"))
                                                {
                                                    // Most likely S01E01 format
                                                    $endReached=true;
                                                }
                                                elseif($seriesTitleValue==date("Y"))
                                                {
                                                    // Year eg 2012
                                                    $endReached=true;
                                                }
                                                else
                                                    $titleToTest.=$seriesTitleValue."%20";
                                            }
                                            else
                                            {
                                                $endReached=true;
                                            }
                                        }
                                        $titleToTest=trim($titleToTest, "%20");
                                        if($titleToTest!="")
                                        {
                                            $data = file_get_contents("http://www.thetvdb.com/api/GetSeries.php?seriesname=".$titleToTest);
                                            $series = xml2array($data);
                                            if(is_array($series["Data"]["Series"][0]))
                                            {
                                                if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled" && isset($series["Data"]["Series"][0]["IMDB_ID"]) && !empty($series["Data"]["Series"][0]["IMDB_ID"]))
                                                    $imdb = mysqli_real_escape_string($GLOBALS['conn'],str_replace("tt", "", $series["Data"]["Series"][0]["IMDB_ID"]));
                                                $series_id=$series["Data"]["Series"][0]["seriesid"];
                                            }
                                            else
                                            {
                                                if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled" && isset($series["Data"]["Series"]["IMDB_ID"]) && !empty($series["Data"]["Series"]["IMDB_ID"]))
                                                    $imdb = mysqli_real_escape_string($GLOBALS['conn'],str_replace("tt", "", $series["Data"]["Series"]["IMDB_ID"]));
                                                $series_id=$series["Data"]["Series"]["seriesid"];
                                            }
                                        }
                                    }
                                }
                                elseif($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled" && $imdb > 0)
                                {
                                    $data = file_get_contents("http://www.thetvdb.com/api/GetSeriesByRemoteID.php?imdbid=tt".$imdb);
                                    $series = xml2array($data);
                                }
                            }
                            if (isset($series_id) || (isset($series["Data"]) && is_array($series["Data"]) && !empty($series["Data"])))
                            {
                                if(!isset($series_id))
                                    $series_id = $series["Data"]["Series"]["seriesid"];

                                $data2 = file_get_contents("http://www.thetvdb.com/api/".$api_key."/series/".$series_id."/banners.xml");
                                $data3 = file_get_contents("http://www.thetvdb.com/api/".$api_key."/series/".$series_id."/all");
                                $banners = xml2array($data2);
                                $allTVDBData = xml2array($data3);
                                $banners = $banners["Banners"]["Banner"];
                                if(!file_exists($THIS_BASEPATH."/thetvdb/".$series_id))
                                    mkdir($THIS_BASEPATH."/thetvdb/".$series_id);
                                if(!file_exists($THIS_BASEPATH."/thetvdb/".$series_id."/poster"))
                                    mkdir($THIS_BASEPATH."/thetvdb/".$series_id."/poster");
                                if(!file_exists($THIS_BASEPATH."/thetvdb/".$series_id."/series"))
                                    mkdir($THIS_BASEPATH."/thetvdb/".$series_id."/series");

                                if(count($banners)>0)
                                {
                                    foreach ($banners as $value)
                                    {
                                        if (($value["BannerType"]=="poster" || $value["BannerType"]=="series") && $value["Rating"]>=$btit_settings["tvdb_img_min_rating"] && $value["RatingCount"]>=$btit_settings["tvdb_image_min_voters"])
                                        {
                                            $imageFilename=explode("/", $value["BannerPath"]);
                                            $lastIamgeKey=(count($imageFilename)-1);
                                            if(!file_exists($THIS_BASEPATH."/thetvdb/".$series_id."/".$value["BannerType"]."/".$imageFilename[$lastIamgeKey]))
                                            {
                                                save_image("http://thetvdb.com/banners/".$value["BannerPath"], $THIS_BASEPATH."/thetvdb/".$series_id."/".$value["BannerType"]."/".$imageFilename[$lastIamgeKey]);
                                            }
                                        }
                                    }
                                }
                                if(count($allTVDBData)>0 && count($SeasonAndEpisode)>=2)
                                {
                                    $theTVDBExtra["Network"]=$allTVDBData["Data"]["Series"]["Network"];
                                    $theTVDBExtra["AirDay"]=$allTVDBData["Data"]["Series"]["Airs_DayOfWeek"];
                                    $theTVDBExtra["AirTime"]=$allTVDBData["Data"]["Series"]["Airs_Time"];
                                    $theTVDBExtra["Name"]=$allTVDBData["Data"]["Series"]["SeriesName"];
                                    $theTVDBExtra["Genre"]=$allTVDBData["Data"]["Series"]["Genre"];
                                    $theTVDBExtra["Runtime"]=$allTVDBData["Data"]["Series"]["Runtime"];
                                    if(isset($allTVDBData["Data"]["Episode"]) && is_array($allTVDBData["Data"]["Episode"]))
                                    {
                                        foreach($allTVDBData["Data"]["Episode"] as $episode)
                                        {
                                            if(($episode["SeasonNumber"]==$SeasonAndEpisode["season"] && $episode["EpisodeNumber"]==$SeasonAndEpisode["episode"] && $SeasonAndEpisode["type"]=="std") || ($SeasonAndEpisode["airdate"]==$episode["FirstAired"] && $SeasonAndEpisode["type"]=="episode_date"))
                                            {
                                                $theTVDBExtra["Season"]=$episode["SeasonNumber"];
                                                $theTVDBExtra["Episode"]=$episode["EpisodeNumber"];
                                                $theTVDBExtra["Title"]=$episode["EpisodeName"];
                                                $theTVDBExtra["Overview"]=$episode["Overview"];
                                                $theTVDBExtra["GuestStars"]=$episode["GuestStars"];
                                                $theTVDBExtra["Rating"]=$episode["Rating"];
                                                $theTVDBExtra["AirDate"]=$episode["FirstAired"];
                                            }
                                        }
                                    }
                                    if(!isset($theTVDBExtra["Season"]))
                                        $theTVDBExtra["Season"]=((isset($SeasonAndEpisode["season"]))?$SeasonAndEpisode["season"]:"??");
                                    if(!isset($theTVDBExtra["Episode"]))
                                        $theTVDBExtra["Episode"]=((isset($SeasonAndEpisode["episode"]))?$SeasonAndEpisode["episode"]:"??");
                                    if(!isset($theTVDBExtra["Title"]) || is_array($theTVDBExtra["Title"]))
                                        $theTVDBExtra["Title"]=$language["NA"];
                                    if(!isset($theTVDBExtra["Overview"]) || is_array($theTVDBExtra["Overview"]))
                                        $theTVDBExtra["Overview"]="";
                                    if(!isset($theTVDBExtra["GuestStars"]) || is_array($theTVDBExtra["GuestStars"]))
                                        $theTVDBExtra["GuestStars"]=$language["NA"];
                                    if(!isset($theTVDBExtra["Rating"]) || is_array($theTVDBExtra["Rating"]))
                                        $theTVDBExtra["Rating"]=0;
                                    if(!isset($theTVDBExtra["AirDate"]) || is_array($theTVDBExtra["AirDate"]))
                                        $theTVDBExtra["AirDate"]=$language["NA"];
                                }
                                $tvdb_extra=mysqli_real_escape_string($GLOBALS['conn'],((count($theTVDBExtra)>0)?serialize($theTVDBExtra):""));
                            }
                        }
                    }
                }
            }
        }
        write_log("Modified torrent $fname ($torhash)", "modify");
        if($btit_settings["fmhack_torrent_moderation"] == "enabled")
        {
            if($_POST["action"] == $language["FRM_CONFIRM"])
            {
                if($CURUSER['moderate_trusted'] == 'yes' || $CURUSER['trusted'] == 'yes')
                    $moder = (($CURUSER['moderate_trusted'] == 'yes')?mysqli_real_escape_string($GLOBALS['conn'],$_POST['moder']):"ok");
                else
                    $moder = 'um';
            }
            else
                $moder = 'um';
        }
        // Image Upload -->
        if($btit_settings["fmhack_torrent_image_upload"] == "enabled")
        {
            $userfile = $_FILES["userfile"];
            if((isset($userfile["tmp_name"]) && !empty($userfile["tmp_name"])) && (isset($userfile["name"]) && !empty($userfile["name"])))
            {
                $check_userfile = check_upload($userfile["tmp_name"], $userfile["name"]);
                switch($check_userfile)
                {
                    case 1:
                    case 2:
                        $check_userfile_err = $language["ERR_MISSING_DATA"];
                        if(file_exists($userfile["tmp_name"]))
                            @unlink($userfile["tmp_name"]);
                        break;
                    case 3:
                        $check_userfile_err = $language["QUAR_TMP_FILE_MISS"];
                        break;
                    case 4:
                        $check_userfile_err = $language["QUAR_OUTPUT"];
                        break;
                    case 5:
                    default:
                        $check_userfile_err = "";
                        break;
                }
                if($check_userfile_err != "")
                    stderr($language["ERROR"], $check_userfile_err);
            }
            $screen1 = $_FILES["screen1"];
            if((isset($screen1["tmp_name"]) && !empty($screen1["tmp_name"])) && (isset($screen1["name"]) && !empty($screen1["name"])))
            {
                $check_screen1 = check_upload($screen1["tmp_name"], $screen1["name"]);
                switch($check_screen1)
                {
                    case 1:
                    case 2:
                        $check_screen1_err = $language["ERR_MISSING_DATA"];
                        if(file_exists($screen1["tmp_name"]))
                            @unlink($screen1["tmp_name"]);
                        break;
                    case 3:
                        $check_screen1_err = $language["QUAR_TMP_FILE_MISS"];
                        break;
                    case 4:
                        $check_screen1_err = $language["QUAR_OUTPUT"];
                        break;
                    case 5:
                    default:
                        $check_screen1_err = "";
                        break;
                }
                if($check_screen1_err != "")
                    stderr($language["ERROR"], $check_screen1_err);
            }
            $screen2 = $_FILES["screen2"];
            if((isset($screen2["tmp_name"]) && !empty($screen2["tmp_name"])) && (isset($screen2["name"]) && !empty($screen2["name"])))
            {
                $check_screen2 = check_upload($screen2["tmp_name"], $screen2["name"]);
                switch($check_screen2)
                {
                    case 1:
                    case 2:
                        $check_screen2_err = $language["ERR_MISSING_DATA"];
                        if(file_exists($screen2["tmp_name"]))
                            @unlink($screen2["tmp_name"]);
                        break;
                    case 3:
                        $check_screen2_err = $language["QUAR_TMP_FILE_MISS"];
                        break;
                    case 4:
                        $check_screen2_err = $language["QUAR_OUTPUT"];
                        break;
                    case 5:
                    default:
                        $check_screen2_err = "";
                        break;
                }
                if($check_screen2_err != "")
                    stderr($language["ERROR"], $check_screen2_err);
            }
            $screen3 = $_FILES["screen3"];
            if((isset($screen3["tmp_name"]) && !empty($screen3["tmp_name"])) && (isset($screen3["name"]) && !empty($screen3["name"])))
            {
                $check_screen3 = check_upload($screen3["tmp_name"], $screen3["name"]);
                switch($check_screen3)
                {
                    case 1:
                    case 2:
                        $check_screen3_err = $language["ERR_MISSING_DATA"];
                        if(file_exists($screen3["tmp_name"]))
                            @unlink($screen3["tmp_name"]);
                        break;
                    case 3:
                        $check_screen3_err = $language["QUAR_TMP_FILE_MISS"];
                        break;
                    case 4:
                        $check_screen3_err = $language["QUAR_OUTPUT"];
                        break;
                    case 5:
                    default:
                        $check_screen3_err = "";
                        break;
                }
                if($check_screen3_err != "")
                    stderr($language["ERROR"], $check_screen3_err);
            }
            $image_types = array(
                "image/bmp",
                "image/jpeg",
                "image/pjpeg",
                "image/gif",
                "image/x-png",
                "image/png");
            switch($_FILES["userfile"]["type"])
            {
                case 'image/bmp':
                    $file_name = $torhash.".bmp";
                    break;
                case 'image/jpeg':
                    $file_name = $torhash.".jpg";
                    break;
                case 'image/pjpeg':
                    $file_name = $torhash.".jpeg";
                    break;
                case 'image/gif':
                    $file_name = $torhash.".gif";
                    break;
                case 'image/x-png':
                    $file_name = $torhash.".png";
                    break;
                case 'image/png':
                    $file_name = $torhash.".png";
                    break;
            }
            switch($_FILES["screen1"]["type"])
            {
                case 'image/bmp':
                    $file_name_s1 = "s1".$torhash.".bmp";
                    break;
                case 'image/jpeg':
                    $file_name_s1 = "s1".$torhash.".jpg";
                    break;
                case 'image/pjpeg':
                    $file_name_s1 = "s1".$torhash.".jpeg";
                    break;
                case 'image/gif':
                    $file_name_s1 = "s1".$torhash.".gif";
                    break;
                case 'image/x-png':
                    $file_name_s1 = "s1".$torhash.".png";
                    break;
                case 'image/png':
                    $file_name_s1 = "s1".$torhash.".png";
                    break;
            }
            switch($_FILES["screen2"]["type"])
            {
                case 'image/bmp':
                    $file_name_s2 = "s2".$torhash.".bmp";
                    break;
                case 'image/jpeg':
                    $file_name_s2 = "s2".$torhash.".jpg";
                    break;
                case 'image/pjpeg':
                    $file_name_s2 = "s2".$torhash.".jpeg";
                    break;
                case 'image/gif':
                    $file_name_s2 = "s2".$torhash.".gif";
                    break;
                case 'image/x-png':
                    $file_name_s2 = "s2".$torhash.".png";
                    break;
                case 'image/png':
                    $file_name_s2 = "s2".$torhash.".png";
                    break;
            }
            switch($_FILES["screen3"]["type"])
            {
                case 'image/bmp':
                    $file_name_s3 = "s3".$torhash.".bmp";
                    break;
                case 'image/jpeg':
                    $file_name_s3 = "s3".$torhash.".jpg";
                    break;
                case 'image/pjpeg':
                    $file_name_s3 = "s3".$torhash.".jpeg";
                    break;
                case 'image/gif':
                    $file_name_s3 = "s3".$torhash.".gif";
                    break;
                case 'image/x-png':
                    $file_name_s3 = "s3".$torhash.".png";
                    break;
                case 'image/png':
                    $file_name_s3 = "s3".$torhash.".png";
                    break;
            }
            $uploadfile = $GLOBALS["uploaddir"].$file_name;
            $uploadfile1 = $GLOBALS["uploaddir"].$file_name_s1;
            $uploadfile2 = $GLOBALS["uploaddir"].$file_name_s2;
            $uploadfile3 = $GLOBALS["uploaddir"].$file_name_s3;
            $file_size = $_FILES["userfile"]["size"];
            $file_size1 = $_FILES["screen1"]["size"];
            $file_size2 = $_FILES["screen2"]["size"];
            $file_size3 = $_FILES["screen3"]["size"];
            $file_type = $_FILES["userfile"]["type"];
            $file_type1 = $_FILES["screen1"]["type"];
            $file_type2 = $_FILES["screen2"]["type"];
            $file_type3 = $_FILES["screen3"]["type"];
            $file_size = makesize1($file_size);
            $file_size1 = makesize1($file_size1);
            $file_size2 = makesize1($file_size2);
            $file_size3 = makesize1($file_size3);
            if(isset($_FILES["userfile"]))
            {
                if($_FILES["userfile"]["name"] == '')
                {
                    // do nothing...
                }
                else
                {
                    if($file_size > $GLOBALS["file_limit"])
                    {
                        err_msg($language["ERROR"], $language["FILE_UPLOAD_TO_BIG"].": ".$file_limit.". ".$language["IMAGE_WAS"].": ".$file_size);
                        stdfoot();
                        exit();
                    }
                    elseif(in_array(strtolower($file_type), $image_types, true))
                    {
                        $img_info = @getimagesize($_FILES['userfile']['tmp_name']);
                        if(isset($img_info) && is_array($img_info))
                        {
                            if($img_info[0] > $btit_settings["imgup_maxw"] || $img_info[1] > $btit_settings["imgup_maxh"])
                            {
                                err_msg($language["ERROR"], $language["IMGUP_DIM_TOO_BIG_1"]."<br /><br />".$btit_settings["imgup_maxw"]." X ".$btit_settings["imgup_maxh"]." ".$language["IMGUP_DIM_TOO_BIG_2"]."<br /><br />".$img_info[0].
                                    " X ".$img_info[1]." ".$language["IMGUP_DIM_TOO_BIG_3"]);
                                stdfoot();
                                exit();
                            }
                            if(@move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
                            {
                                do_sqlquery("UPDATE {$TABLE_PREFIX}files SET image='".$file_name."' WHERE info_hash='".$torhash."'", true);
                                $image_drop = "".$_POST["userfileold"]."";
                                if(!empty($image_drop) && file_exists($GLOBALS["uploaddir"].$image_drop))
                                    unlink($GLOBALS["uploaddir"].$image_drop);
                            }
                            else
                            {
                                err_msg($language["ERROR"], $language["MOVE_IMAGE_TO"]." ".$GLOBALS["uploaddir"].". ".$language["CHECK_FOLDERS_PERM"]);
                                stdfoot();
                                exit();
                            }
                        }
                        else
                        {
                            err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                            stdfoot();
                            exit;
                        }
                    }
                    else
                    {
                        err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                        stdfoot();
                        exit;
                    }
                }
            }
            if(isset($_FILES["screen1"]))
            {
                if($_FILES["screen1"]["name"] == '')
                {
                    // do nothing...
                }
                else
                {
                    if($file_size1 > $GLOBALS["file_limit"])
                    {
                        err_msg($language["ERROR"], $language["FILE_UPLOAD_TO_BIG"].": ".$file_limit.". ".$language["IMAGE_WAS"].": ".$file_size1);
                        stdfoot();
                        exit();
                    }
                    elseif(in_array(strtolower($file_type1), $image_types, true))
                    {
                        $screen1_info = @getimagesize($_FILES['screen1']['tmp_name']);
                        if(isset($screen1_info) && is_array($screen1_info))
                        {
                            if($screen1_info[0] > $btit_settings["imgup_maxw"] || $screen1_info[1] > $btit_settings["imgup_maxh"])
                            {
                                err_msg($language["ERROR"], $language["IMGUP_DIM_TOO_BIG_1"]."<br /><br />".$btit_settings["imgup_maxw"]." X ".$btit_settings["imgup_maxh"]." ".$language["IMGUP_DIM_TOO_BIG_2"]."<br /><br />".$img_info[0].
                                    " X ".$img_info[1]." ".$language["IMGUP_DIM_TOO_BIG_3"]);
                                stdfoot();
                                exit();
                            }
                            if(@move_uploaded_file($_FILES['screen1']['tmp_name'], $uploadfile1))
                            {
                                do_sqlquery("UPDATE {$TABLE_PREFIX}files SET screen1='".$file_name_s1."' WHERE info_hash='".$torhash."'", true);
                                $image_drop = "".$_POST["userfileold1"]."";
                                if(!empty($image_drop) && file_exists($GLOBALS["uploaddir"].$image_drop))
                                    unlink($GLOBALS["uploaddir"].$image_drop);
                            }
                            else
                            {
                                err_msg($language["ERROR"], $language["MOVE_IMAGE_TO"]." ".$GLOBALS["uploaddir"].". ".$language["CHECK_FOLDERS_PERM"]);
                                stdfoot();
                                exit();
                            }
                        }
                        else
                        {
                            err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                            stdfoot();
                            exit;
                        }
                    }
                    else
                    {
                        err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                        stdfoot();
                        exit;
                    }
                }
            }
            if(isset($_FILES["screen2"]))
            {
                if($_FILES["screen2"]["name"] == '')
                {
                    // do nothing...
                }
                else
                {
                    if($file_size2 > $GLOBALS["file_limit"])
                    {
                        err_msg($language["ERROR"], $language["FILE_UPLOAD_TO_BIG"].": ".$file_limit.". ".$language["IMAGE_WAS"].": ".$file_size2);
                        stdfoot();
                        exit();
                    }
                    elseif(in_array(strtolower($file_type2), $image_types, true))
                    {
                        $screen2_info = @getimagesize($_FILES['screen2']['tmp_name']);
                        if(isset($screen2_info) && is_array($screen2_info))
                        {
                            if($screen2_info[0] > $btit_settings["imgup_maxw"] || $screen2_info[1] > $btit_settings["imgup_maxh"])
                            {
                                err_msg($language["ERROR"], $language["IMGUP_DIM_TOO_BIG_1"]."<br /><br />".$btit_settings["imgup_maxw"]." X ".$btit_settings["imgup_maxh"]." ".$language["IMGUP_DIM_TOO_BIG_2"]."<br /><br />".$img_info[0].
                                    " X ".$img_info[1]." ".$language["IMGUP_DIM_TOO_BIG_3"]);
                                stdfoot();
                                exit();
                            }
                            if(@move_uploaded_file($_FILES['screen2']['tmp_name'], $uploadfile2))
                            {
                                do_sqlquery("UPDATE {$TABLE_PREFIX}files SET screen2='".$file_name_s2."' WHERE info_hash='".$torhash."'", true);
                                $image_drop = "".$_POST["userfileold2"]."";
                                if(!empty($image_drop) && file_exists($GLOBALS["uploaddir"].$image_drop))
                                    unlink($GLOBALS["uploaddir"].$image_drop);
                            }
                            else
                            {
                                err_msg($language["ERROR"], $language["MOVE_IMAGE_TO"]." ".$GLOBALS["uploaddir"].". ".$language["CHECK_FOLDERS_PERM"]);
                                stdfoot();
                                exit();
                            }
                        }
                        else
                        {
                            err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                            stdfoot();
                            exit;
                        }
                    }
                    else
                    {
                        err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                        stdfoot();
                        exit;
                    }
                }
            }
            if(isset($_FILES["screen3"]))
            {
                if($_FILES["screen3"]["name"] == '')
                {
                    // do nothing...
                }
                else
                {
                    if($file_size3 > $GLOBALS["file_limit"])
                    {
                        err_msg($language["ERROR"], $language["FILE_UPLOAD_TO_BIG"].": ".$file_limit.". ".$language["IMAGE_WAS"].": ".$file_size3);
                        stdfoot();
                        exit();
                    }
                    if(in_array(strtolower($file_type3), $image_types, true))
                    {
                        $screen3_info = @getimagesize($_FILES['screen3']['tmp_name']);
                        if(isset($screen3_info) && is_array($screen3_info))
                        {
                            if($screen3_info[0] > $btit_settings["imgup_maxw"] || $screen3_info[1] > $btit_settings["imgup_maxh"])
                            {
                                err_msg($language["ERROR"], $language["IMGUP_DIM_TOO_BIG_1"]."<br /><br />".$btit_settings["imgup_maxw"]." X ".$btit_settings["imgup_maxh"]." ".$language["IMGUP_DIM_TOO_BIG_2"]."<br /><br />".$img_info[0].
                                    " X ".$img_info[1]." ".$language["IMGUP_DIM_TOO_BIG_3"]);
                                stdfoot();
                                exit();
                            }
                            if(@move_uploaded_file($_FILES['screen3']['tmp_name'], $uploadfile3))
                            {
                                do_sqlquery("UPDATE {$TABLE_PREFIX}files SET screen3='".$file_name_s3."' WHERE info_hash='".$torhash."'", true);
                                $image_drop = "".$_POST["userfileold3"]."";
                                if(!empty($image_drop) && file_exists($GLOBALS["uploaddir"].$image_drop))
                                    unlink($GLOBALS["uploaddir"].$image_drop);
                            }
                            else
                            {
                                err_msg($language["ERROR"], $language["MOVE_IMAGE_TO"]." ".$GLOBALS["uploaddir"].". ".$language["CHECK_FOLDERS_PERM"]);
                                stdfoot();
                                exit();
                            }
                        }
                        else
                        {
                            err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                            stdfoot();
                            exit;
                        }
                    }
                    else
                    {
                        err_msg($language["ERROR"], $language["ILEGAL_UPLOAD"]);
                        stdfoot();
                        exit;
                    }
                }
            }
        }
        // <-- Image Upload
        if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
        {
            $gold_level = '';
            $resg = get_result("SELECT `level`, `gold_percentage`, `silver_percentage`, `bronze_percentage` FROM `{$TABLE_PREFIX}gold` WHERE `id`='1'", true, $btit_settings["cache_duration"]);
            $gold_level = $resg[0]["level"];
            if($golden == 0)
                $xgold = 100;
            elseif($golden == 1)
                $xgold = $resg[0]["silver_percentage"];
            elseif($golden == 2)
                $xgold = $resg[0]["gold_percentage"];
            elseif($golden == 3)
                $xgold = $resg[0]["bronze_percentage"];
            unset($resg);
            if($CURUSER['id_level'] >= $gold_level)
            {
                if($golden != '' && isset($golden))
                    do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `gold`='$golden' WHERE `info_hash`='".$torhash."'", true);
                $free_mode = false;
                if($btit_settings["fmhack_free_leech_with_happy_hour"] == "enabled" && $XBTT_USE)
                {
                    $petr1 = get_result("SELECT `free`, `happy` FROM `{$TABLE_PREFIX}files` WHERE `info_hash`='".$torhash."'", true, $btit_settings["cache_duration"]);
                    if(count($petr1) > 0)
                    {
                        $fied = $petr1[0];
                        if($fied["free"] == "yes" || $fied["happy"] == "yes")
                        {
                            $free_mode = true;
                        }
                    }
                }
                if($XBTT_USE && $free_mode === false)
                    do_sqlquery("UPDATE `xbt_files` SET `down_multi`=".$xgold.", `flags`=2 WHERE `info_hash`=0x".$torhash, true);
            }
        }
        $query2_update = ", `anonymous`=".(($_POST["anonymous"] == "true")?"'true'":"'false'");
    if($btit_settings["fmhack_whitelist_users_and_groups"]=="enabled")
    {	        
        // whitelist users & groups
        if (isset($_POST['exclusive'])) {
            $query2_update .=", exclusive=" . (int)$_POST['exclusive'];
        }

        do_sqlquery("DELETE FROM {$TABLE_PREFIX}files_whitelisted WHERE info_hash='".$torhash."'", true);
        if (isset($_POST['chosen']) || isset($_POST['choseng'])) {
            $chosen=isset($_POST['chosen'])?join(',',$_POST['chosen']):'';
            $groups=isset($_POST['choseng'])?join(',',$_POST['choseng']):'';
            do_sqlquery("INSERT INTO {$TABLE_PREFIX}files_whitelisted (info_hash, users, groups) VALUES ('".$torhash."','".$chosen."','".$groups."')");
        }
        // whitelist users & groups
    }   
        if($btit_settings["fmhack_grab_images_from_theTVDB"]=="enabled" && $tvdb_number>=0)
        {
            $query2_update .= ", `tvdb_id`='".$tvdb_number."'".((isset($tvdb_extra) && !empty($tvdb_extra))?", `tvdb_extra`='".$tvdb_extra."'":"");
        }
        if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled")
            $query2_update .= ", `imdb`='".$imdb."'";
        if($btit_settings["fmhack_show_if_seedbox_is_used"] == "enabled")
            $query2_update .= ", `seedbox`='".$seedbox."'";
        if($btit_settings["fmhack_sticky_torrent"] == "enabled")
        {
            $check = get_result("SELECT `level` FROM `{$TABLE_PREFIX}sticky` WHERE `id`=1", true, $btit_settings["cache_duration"]);
            $check = $check[0];
            if($CURUSER["id_level"] >= $check["level"])
                $query2_update .= ", `sticky`='".$sticky."'";
        }
        if($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")
            $query2_update .= ", `requested`='".$req."', `nuked`='".$nuk."', `nuke_reason`='".$nuk_rea."'";
        if($btit_settings["fmhack_teams"] == "enabled")
            $query2_update .= ", `team`='".$team."'";
        if($btit_settings["fmhack_upload_multiplier"] == "enabled" && $CURUSER["set_multi"] == "yes")
            $query2_update .= ", `multiplier`='".$mult."'";
        if($btit_settings["fmhack_staff_comment_in_torrent_details"] == "enabled")
            $query2_update .= ", `staff_comment`= '".$staff_comment."'";
        if($btit_settings["fmhack_direct_download"] == "enabled" && $CURUSER["add_ddl"] == "yes" && $direct_link)
            $query2_update .= ", `direct_download`= '".$direct_link."'";
        if($btit_settings["fmhack_language_in_torrent_list_and_details"] == "enabled")
            $query2_update .= ", `language`= '".intval($_POST["language"])."'";
        if($btit_settings["fmhack_torrent_details_media_player"] == "enabled")
            $query2_update .= ", `mplayer`='".mysqli_real_escape_string($GLOBALS['conn'],htmlspecialchars($_POST["mplayer"]))."'";
        if($btit_settings["fmhack_bump_torrents"] == "enabled" && $CURUSER["bump_torrents"]=="yes" && $bump_torr=="yes")
            $query2_update .= ", `bumpdate`= UNIX_TIMESTAMP()";
        do_sqlquery("UPDATE {$TABLE_PREFIX}files SET filename='$fname', comment='".AddSlashes($_POST["comment"])."', category=".intval($_POST["category"]).$query2_update." WHERE info_hash='".$torhash."'", true);
        if($btit_settings["fmhack_upload_multiplier"] == "enabled" && $CURUSER["set_multi"] == "yes")
        {
            if($XBTT_USE)
                do_sqlquery("UPDATE `xbt_files` SET `up_multi`=($mult*100), `flags`=2 WHERE `info_hash`=0x".$torhash, true);
        }
        if($btit_settings["fmhack_torrent_moderation"] == "enabled")
        {
            if($CURUSER["moderate_trusted"] == "yes" || $CURUSER['trusted'] == 'yes')
            {
                if($moder == 'ok')
                {
                    $get_user = "SELECT ".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated"] == "true")?"`f`.`id` `fileid`, ":"").
                        "`f`.`moder`, `f`.`filename`, `f`.`info_hash`, `f`.`uploader` `upname`, `u`.`username` `uploader`, `c`.`image`, `c`.`name` `cname`, `f`.`category` `catid`, `f`.`shout_announced`, `f`.`twitter_announced`, `f`.`forum_announced`, `c`.`forumid`, `f`.`comment`, `u`.`smf_fid`, `u`.`ipb_fid`, `f`.`anonymous` FROM `{$TABLE_PREFIX}files` `f` LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `u`.`id` = `f`.`uploader` LEFT JOIN `{$TABLE_PREFIX}categories` `c` ON `c`.`id` = `f`.`category` WHERE `info_hash`='".
                        $torhash."'";
                    $row = do_sqlquery($get_user, true);
                    if(mysqli_num_rows($row) == 1)
                    {
                        $username = '';
                        $data = mysqli_fetch_assoc($row);
                        $username = $data['upname'];
                        $file = $data['filename'];
                        $uploader = $data['uploader'];
                        $msg = "[b]".$uploader." ".$language["TMOD_APR1"]." ".$file." ".$language["TMOD_APR2"]."[/b]".$language["TMOD_APR3"];
                        if($btit_settings["mod_app_pm"] == "yes")
                            send_pm((($CURUSER["uid"] == $username && $FORUMLINK == "ipb")?$btit_settings["ipb_autoposter"]:$CURUSER["uid"]), $username, sqlesc($file), sqlesc($msg));
                        if($btit_settings["fmhack_forum_auto_topic"] == "enabled" && $btit_settings["smf_autotopic"] == "true")
                        {
                            if($btit_settings["fmhack_teams"] != "enabled")
                                $team = 0;
                            if($data["forum_announced"] == 0 && $data["moder"] != "ok" && $team == 0)
                            {
                                if($data["forumid"] > 0)
                                {
                                    new_auto_topic($data["forumid"], ((substr($FORUMLINK, 0, 3) == "smf")?$data["smf_fid"]:(($FORUMLINK == "ipb")?$data["ipb_fid"]:$username)), $btit_settings["smf_tag"].$data["filename"], (($FORUMLINK ==
                                        "ipb")?str_replace("\\r\\n", "<br />", $data["comment"]):$data["comment"]), $torhash);
                                    do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `forum_announced`=1 WHERE `info_hash`='".$torhash."'", true);
                                }
                            }
                        }
                        if($btit_settings["fmhack_shoutbox_member_and_torrent_announce"] == "enabled")
                        {
                            if($btit_settings["fmhack_teams"] != "enabled")
                                $team = 0;
                            if($data["shout_announced"] == 0 && $data["moder"] != "ok" && $team == 0)
                            {
                                if(!isset($language["SYSTEM_USER"]))
                                    $language["SYSTEM_USER"]="System";
                                do_sqlquery("INSERT INTO `{$TABLE_PREFIX}chat` (`uid`, `time`, `name`, `text`) VALUES (0,UNIX_TIMESTAMP(), '".mysqli_real_escape_string($GLOBALS['conn'],$language["SYSTEM_USER"])."', '".mysqli_real_escape_string($GLOBALS['conn'],$language["ANN_NEW_TORR"])." [url=".$BASEURL."/".
                                    mysqli_real_escape_string($GLOBALS['conn'],(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated"] == "true")?strtr($file, $res_seo["str"], $res_seo["strto"])."-".$row["fileid"].".html":
                                    "index.php?page=torrent-details&id=".$torhash))."]".mysqli_real_escape_string($GLOBALS['conn'],$file)."[/url]".(($btit_settings["shoutann_display_uploader"] == "yes" && $data["anonymous"] != "true")?" ".
                                    mysqli_real_escape_string($GLOBALS['conn'],$language["ANN_ADDED_BY"])." [url=".$BASEURL."/".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated_user"] == "true")?mysqli_real_escape_string($GLOBALS['conn'],$username.
                                    "_".strtr($uploader, $res_seo["str"], $res_seo["strto"]).".html"):mysqli_real_escape_string($GLOBALS['conn'],"index.php?page=userdetails&id=".$username))."]".mysqli_real_escape_string($GLOBALS['conn'],$uploader)."[/url]":"")."')", true);
                                if($btit_settings["fmhack_IMG_in_SB_after_x_shouts"] == "enabled")
                                    auto_shout(mysqli_insert_id($GLOBALS['conn']));
                                do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `shout_announced`=1 WHERE `info_hash`='".$torhash."'", true);
                            }
                        }
                        if($btit_settings["fmhack_twitter_update"] == "enabled")
                        {
                            if($btit_settings["fmhack_teams"] != "enabled")
                                $team = 0;
                            if($data["twitter_announced"] == 0 && $data["moder"] != "ok" && $team == 0)
                            {
                                // Read in our saved access token/secret
                                $accessToken = $btit_settings["twitter_oauth_token"];
                                $accessTokenSecret = $btit_settings["twitter_oauth_token_secret"];
                                if($accessToken != "" && $accessTokenSecret != "")
                                {
                                    // Create our twitter API object
                                    require_once ("twitteroauth/twitteroauth/twitteroauth.php");
                                    $oauth = new TwitterOAuth('i3wrpWOyahTF4VO0Fo1EmQ', '4Ng72fOHs7p1nayKZZjcyWGmULhhnjmUX4MQdGzOvg', $accessToken, $accessTokenSecret);
                                    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".$BASEURL."/index.php?page=torrent-details&id=".$torhash);
                                    $status = $language["TWIT_NT"].": $filename Link: $tinyurl";
                                    // If it's still over 140 characters we'll just have to shorten the filename
                                    $status_size = strlen($status);
                                    if($status_size > 140)
                                    {
                                        $filename_size = strlen($filename);
                                        $excluding_filename = ($status_size - $filename_size);
                                        $characters_left = (137 - $excluding_filename);
                                        $filename = substr($filename, 0, $characters_left)."...";
                                        $status = $language["TWIT_NT"].": $filename Link: $tinyurl";
                                    }
                                    $oauth->post('statuses/update', array('status' => $status));
                                    do_sqlquery("UPDATE `{$TABLE_PREFIX}files` SET `twitter_announced`=1 WHERE `info_hash`='".$torhash."'", true);
                                }
                                else
                                    write_log("Unable to announce new torrent to Twitter. Please authorise in <b>Admin Panel --> FM Hacks Config --> Authorise Twitter Posting</b>", "delete");
                            }
                        }
                    }
                }
                updatemoderbyhash($moder, $torhash);
                if($_POST["ex_moder"] != $moder && $moder == "bad" && $CURUSER["moderate_trusted"] == "yes")
                    redirect("index.php?page=moder&hash=".$torhash."");
            }
            else
                updatemoderbyhash("um", $torhash);
        }
        redirect($link);
        exit();
    }
    else
    {
        redirect($link);
        exit();
    }
}
// view torrent's details
if(isset($_GET["info_hash"]))
{
    if($XBTT_USE)
    {
        $tseeds = "`f`.`seeds`+ifnull(`x`.`seeders`,0) `seeds`";
        $tleechs = "`f`.`leechers`+ifnull(`x`.`leechers`,0) `leechers`";
        $tcompletes = "`f`.`finished`+ifnull(`x`.`completed`,0) `finished`";
        $ttables = "`{$TABLE_PREFIX}files` `f` LEFT JOIN `xbt_files` `x` ON `x`.`info_hash`=`f`.`bin_hash`";
    }
    else
    {
        $tseeds = "`f`.`seeds`";
        $tleechs = "`f`.`leechers`";
        $tcompletes = "`f`.`finished`";
        $ttables = "`{$TABLE_PREFIX}files` `f`";
    }
    $query1_select = "`f`.`anonymous`,";
    if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
        $query1_select .= "`f`.`gold`,";
    // Image Upload -->
    if($btit_settings["fmhack_torrent_image_upload"] == "enabled")
        $query1_select .= "`f`.`image`, `f`.`screen1`, `f`.`screen2`, `f`.`screen3`,";
    // <-- Image Upload
    if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled")
        $query1_select .= "`f`.`imdb`,";
    if($btit_settings["fmhack_show_if_seedbox_is_used"] == "enabled")
        $query1_select .= "`f`.`seedbox`,";
    if($btit_settings["fmhack_sticky_torrent"] == "enabled")
        $query1_select .= "`f`.`sticky`,";
    if($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")
        $query1_select .= "`f`.`requested`, `f`.`nuked`, `f`.`nuke_reason`,";
    if($btit_settings["fmhack_teams"] == "enabled")
        $query1_select .= "`f`.`team`,";
    if($btit_settings["fmhack_upload_multiplier"] == "enabled")
        $query1_select .= "`f`.`multiplier`, `f`.`external`,";
    if($btit_settings["fmhack_staff_comment_in_torrent_details"] == "enabled")
        $query1_select .= "`f`.`staff_comment`,";
    if($btit_settings["fmhack_direct_download"] == "enabled" && $CURUSER["add_ddl"] == "yes")
        $query1_select .= "`f`.`direct_download`,";
    if($btit_settings["fmhack_language_in_torrent_list_and_details"] == "enabled")
        $query1_select .= "`f`.`language`,";
    if($btit_settings["fmhack_language_in_torrent_list_and_details"] == "enabled")
        $query1_select .= "`f`.`mplayer`,";
    if($btit_settings["fmhack_grab_images_from_theTVDB"] == "enabled")
        $query1_select .= "`f`.`tvdb_id`,`f`.`tvdb_extra`,";
    // whitelist users         
    if($btit_settings["fmhack_whitelist_users_and_groups"]=="enabled")    
        $query1_select.="f.exclusive,";
    // whitelist users 
    $query = "SELECT ".$query1_select." `f`.`user_edit`, `f`.`info_hash`, `f`.`filename`, `f`.`url`, UNIX_TIMESTAMP(`f`.`data`) `data`, `f`.`size`, `f`.`comment`, `f`.`category` `cat_name`, $tseeds, $tleechs, $tcompletes, `f`.`speed`, `f`.`uploader` FROM $ttables WHERE `f`.`info_hash` ='".
        AddSlashes($_GET["info_hash"])."'";
    $res = do_sqlquery($query, true);
    $results = mysqli_fetch_assoc($res);
    if(!$results || mysqli_num_rows($res) == 0)
        err_msg($language["ERROR"], $language["TORRENT_EDIT_ERROR"]);
    else
    {
        $uploader_allowed = ((!$CURUSER || $CURUSER["uid"] < 2 || $CURUSER["uid"] != $results["uploader"])?"no":"yes");
        if($btit_settings["fmhack_uploader_rights"] == "enabled" && $uploader_allowed == "yes" && $btit_settings["ulri_edit"] == "no")
            $uploader_allowed = "no";
        if($uploader_allowed == "no" && $CURUSER["edit_torrents"] != "yes")
        {
            stderr($language["ERROR"], $language["CANT_EDIT_TORR"]);
        }
        if($btit_settings["fmhack_disable_user_edit_and_delete_after_24_hrs"]=="enabled")
        {
        if($results["user_edit"]=='false' AND $CURUSER["edit_torrents"]=="no")
        {
            stderr($language["ERROR"],$language["USER_EDIT"]);
            stdfoot();
            exit();
        }
        }
        if($btit_settings["fmhack_torrent_moderation"] == "enabled")
            $moder_status = getmoderstatusbyhash(AddSlashes($_GET["info_hash"]));
        $torrenttpl = new bTemplate();
    if($btit_settings["fmhack_whitelist_users_and_groups"]=="enabled")
    {	
        // whitelist users & groups
        $torrenttpl->set("exclusivechecked", ($results['exclusive']==1?'checked=""':''));
        $rowschoosen=get_result("SELECT users FROM {$TABLE_PREFIX}files_whitelisted WHERE info_hash='".AddSlashes($_GET["info_hash"])."' LIMIT 1");
        $rowchoosen=$rowschoosen[0];

        // select all users except myself and guest and allready selected
        if (empty($rowchoosen['users']))
            $rowsavail=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id NOT IN (1,".$CURUSER['uid'].") ORDER BY username", true);
        else
            $rowsavail=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id NOT IN (1,".$CURUSER['uid'].",".$rowchoosen['users'].") ORDER BY username", true);
            
        foreach($rowsavail as $id => $rowavail) {
            $avail_select.="\r\n".'<option value="'.$rowavail['id'].'">'.$rowavail['username'].'</option>';
        }
        
        $rowschoosen=get_result("SELECT id, username FROM {$TABLE_PREFIX}users WHERE id IN (".$rowchoosen['users'].") ORDER BY username");
        foreach($rowschoosen as $id => $rowchoosen) {
            $choosen_select.="\r\n".'<option value="'.$rowchoosen['id'].'">'.$rowchoosen['username'].'</option>';
        }
        
        $torrenttpl->set("available_users", $avail_select);
        $torrenttpl->set("choosen_users", $choosen_select);
        
        // groups
        $rowschoosen=get_result("SELECT groups FROM {$TABLE_PREFIX}files_whitelisted WHERE info_hash='".AddSlashes($_GET["info_hash"])."' LIMIT 1");
        $rowchoosen=$rowschoosen[0];
        // select all groups except allready selected
        if (empty($rowchoosen['groups']))
            $rowsavail=get_result("SELECT id, description FROM {$TABLE_PREFIX}whitelisted_groups ORDER BY description");
        else
            $rowsavail=get_result("SELECT id, description FROM {$TABLE_PREFIX}whitelisted_groups WHERE id NOT IN (".$rowchoosen['groups'].") ORDER BY description");
            
        foreach($rowsavail as $id => $rowavail) {
            $avail_groups_select.="\r\n".'<option value="'.$rowavail['id'].'">'.$rowavail['description'].'</option>';
        }
        
        $rowschoosen=get_result("SELECT id, description FROM {$TABLE_PREFIX}whitelisted_groups WHERE id IN (".$rowchoosen['groups'].") ORDER BY description");
        foreach($rowschoosen as $id => $rowchoose) {
            $choosen_groups_select.="\r\n".'<option value="'.$rowchoose['id'].'">'.$rowchoose['description'].'</option>';
        }
        
        $torrenttpl->set("available_groups", $avail_groups_select);
        $torrenttpl->set("choosen_groups", $choosen_groups_select);
     }   
        // whitelist users & groups
        $torrenttpl->set("tvdb_enabled", (($btit_settings["fmhack_grab_images_from_theTVDB"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_grab_images_from_theTVDB"] == "enabled")
        {
            $torrenttpl->set("tvdb_id", $results["tvdb_id"]);
        }
        $torrenttpl->set("bump_enabled", (($btit_settings["fmhack_bump_torrents"] == "enabled" && $CURUSER["bump_torrents"] == "yes")?true:false), true);
        $torrenttpl->set("media_enabled", (($btit_settings["fmhack_torrent_details_media_player"] == "enabled")?true:false), true);
        $torrenttpl->set("language", $language);
        $torrenttpl->set("mult_enabled", (($btit_settings["fmhack_upload_multiplier"] == "enabled" && $results["external"] == "no"  && $CURUSER["set_multi"]=="yes")?true:false), true);
        if($btit_settings["fmhack_upload_multiplier"] == "enabled" && $results["external"] == "no")
        {
            // Upload Multiplier
            if($CURUSER["set_multi"] == "yes")
            {
                $row = mysqli_fetch_row(do_sqlquery("SHOW COLUMNS FROM {$TABLE_PREFIX}files LIKE 'multiplier'"));
                $options = explode("','", preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $row[1]));
                foreach($options as $multiplier)
                {
                    $option .= "<option value='".$multiplier."'";
                    if($multiplier == $results["multiplier"])
                        $option .= "selected='yes' ";
                    $option .= ">".unesc($multiplier)."</option>\n";
                }
                $torrenttpl->set("multie3", $option);
            }
            // Upload Multiplier
        }
        $torrent = array();
        $torrenttpl->set("torlang", (($btit_settings["fmhack_language_in_torrent_list_and_details"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_language_in_torrent_list_and_details"] == "enabled")
        {
            if($results["language"] == '0')
                $torrent["nolang"] = " selected=\"selected\">";
            elseif($results["language"] == '1')
                $torrent["english"] = " selected=\"selected\">";
            elseif($results["language"] == '2')
                $torrent["arabic"] = " selected=\"selected\">";
            elseif($results["language"] == '3')
                $torrent["bangla"] = " selected=\"selected\">";
            elseif($results["language"] == '4')
                $torrent["bulgarian"] = " selected=\"selected\">";
            elseif($results["language"] == '5')
                $torrent["chinese"] = " selected=\"selected\">";
            elseif($results["language"] == '6')
                $torrent["czech"] = " selected=\"selected\">";
            elseif($results["language"] == '7')
                $torrent["danish"] = " selected=\"selected\">";
            elseif($results["language"] == '8')
                $torrent["dutch"] = " selected=\"selected\">";
            elseif($results["language"] == '9')
                $torrent["finnish"] = " selected=\"selected\">";
            elseif($results["language"] == '10')
                $torrent["french"] = " selected=\"selected\">";
            elseif($results["language"] == '11')
                $torrent["french_canadian"] = " selected=\"selected\">";
            elseif($results["language"] == '12')
                $torrent["german"] = " selected=\"selected\">";
            elseif($results["language"] == '13')
                $torrent["greek"] = " selected=\"selected\">";
            elseif($results["language"] == '14')
                $torrent["hungarian"] = " selected=\"selected\">";
            elseif($results["language"] == '15')
                $torrent["italian"] = " selected=\"selected\">";
            elseif($results["language"] == '16')
                $torrent["polish"] = " selected=\"selected\">";
            elseif($results["language"] == '17')
                $torrent["portuguese-BR"] = " selected=\"selected\">";
            elseif($results["language"] == '18')
                $torrent["portuguese-PT"] = " selected=\"selected\">";
            elseif($results["language"] == '19')
                $torrent["romanian"] = " selected=\"selected\">";
            elseif($results["language"] == '20')
                $torrent["russian"] = " selected=\"selected\">";
            elseif($results["language"] == '21')
                $torrent["spanish"] = " selected=\"selected\">";
            elseif($results["language"] == '22')
                $torrent["serbocroatian"] = " selected=\"selected\">";
            elseif($results["language"] == '23')
                $torrent["swedish"] = " selected=\"selected\">";
            elseif($results["language"] == '24')
                $torrent["turkish"] = " selected=\"selected\">";
            elseif($results["language"] == '25')
                $torrent["vietnamese"] = " selected=\"selected\">";
        }
        $torrenttpl->set("ddl_enabled", (($btit_settings["fmhack_direct_download"] == "enabled" && $CURUSER["add_ddl"] == "yes")?true:false), true);
        if($btit_settings["fmhack_direct_download"] == "enabled" && $CURUSER["add_ddl"] == "yes")
            $torrent["direct_link"] = $results["direct_download"];
        $torrenttpl->set("st_comm_enabled", (($btit_settings["fmhack_staff_comment_in_torrent_details"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_staff_comment_in_torrent_details"] == "enabled")
        {
            if(is_integer($btit_settings["staff_comment"]) || substr($btit_settings["staff_comment"], 0, 4)!="lro-")
                stderr($language["ERROR"], $language["ERR_NEEDS_RECONFIG_1"]." <b>Staff Comment In Torrent Details</b> ".$language["ERR_NEEDS_RECONFIG_2"].(($CURUSER["admin_access"]=="no")?"<br /><br />".$language["ERR_NEEDS_RECONFIG_3"]:""));

            $lroPerms=explode("-", $btit_settings["staff_comment"]);
            if($btit_settings["fmhack_logical_rank_ordering"]=="enabled")
            {
                if($lroPerms[1]==1 && $lroPerms[2]>0)
                    $addCommOverOrEqual=(($CURUSER["logical_rank_order"]>=$lroPerms[2])?true:false);
                else
                    stderr($language["ERROR"], $language["ERR_NEEDS_RECONFIG_1"]." <b>Staff Comment In Torrent Details</b> ".$language["ERR_NEEDS_RECONFIG_2"].(($CURUSER["admin_access"]=="no")?"<br /><br />".$language["ERR_NEEDS_RECONFIG_3"]:""));
            }
            elseif($btit_settings["fmhack_logical_rank_ordering"]=="disabled")
            {
                if($lroPerms[1]==0 && $lroPerms[2]>0)
                    $addCommOverOrEqual=(($CURUSER["id_level"]>=$lroPerms[2])?true:false);
                else
                    stderr($language["ERROR"], $language["ERR_NEEDS_RECONFIG_1"]." <b>Staff Comment In Torrent Details</b> ".$language["ERR_NEEDS_RECONFIG_2"].(($CURUSER["admin_access"]=="no")?"<br /><br />".$language["ERR_NEEDS_RECONFIG_3"]:""));
            }
            if($CURUSER["uid"] > 1 && $addCommOverOrEqual)
                $torrenttpl->set("LEVEL_SC", true, true);
            else
                $torrenttpl->set("LEVEL_SC", false, true);
            $torrenttpl->set("staff_comment", $results["staff_comment"]);
        }
        $torrenttpl->set("sticky_enabled", (($btit_settings["fmhack_sticky_torrent"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_sticky_torrent"] == "enabled")
        {
            /*Start sticky by losmi*/
            $query = "SELECT * FROM {$TABLE_PREFIX}sticky";
            $rez = get_result($query, true, $btit_settings["cache_duration"]);
            $rez = $rez[0];
            $rez_level = $rez['level'];
            $current_level = getLevel($CURUSER['id_level']);
            $level_ok = false;
            if($CURUSER["uid"] > 1 && $current_level >= $rez_level)
                $torrenttpl->set("LEVEL_OK", true, false);
            else
                $torrenttpl->set("LEVEL_OK", false, true);
            unset($rez);
            if($results["sticky"] == 1)
                $torrent["sticky"] = "<input type='checkbox' name='sticky' checked>";
            else
                $torrent["sticky"] = "<input type='checkbox' name='sticky'>";
            /*End sticky by losmi*/
        }
        $torrenttpl->set("seedbox_enabled", (($btit_settings["fmhack_show_if_seedbox_is_used"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_show_if_seedbox_is_used"] == "enabled")
        {
            // Start seedbox
            if(is_integer($btit_settings["seedbox"]) || substr($btit_settings["seedbox"], 0, 4)!="lro-")
                stderr($language["ERROR"], $language["ERR_NEEDS_RECONFIG_1"]." <b>Show If Seedbox Is Used</b> ".$language["ERR_NEEDS_RECONFIG_2"].(($CURUSER["admin_access"]=="no")?"<br /><br />".$language["ERR_NEEDS_RECONFIG_3"]:""));

            $lroPerms=explode("-", $btit_settings["seedbox"]);
            if($btit_settings["fmhack_logical_rank_ordering"]=="enabled")
            {
                if($lroPerms[1]==1 && $lroPerms[2]>0)
                    $seedboxOverOrEqual=(($CURUSER["logical_rank_order"]>=$lroPerms[2])?true:false);
                else
                    stderr($language["ERROR"], $language["ERR_NEEDS_RECONFIG_1"]." <b>Show If Seedbox Is Used</b> ".$language["ERR_NEEDS_RECONFIG_2"].(($CURUSER["admin_access"]=="no")?"<br /><br />".$language["ERR_NEEDS_RECONFIG_3"]:""));
            }
            elseif($btit_settings["fmhack_logical_rank_ordering"]=="disabled")
            {
                if($lroPerms[1]==0 && $lroPerms[2]>0)
                    $seedboxOverOrEqual=(($CURUSER["id_level"]>=$lroPerms[2])?true:false);
                else
                    stderr($language["ERROR"], $language["ERR_NEEDS_RECONFIG_1"]." <b>Show If Seedbox Is Used</b> ".$language["ERR_NEEDS_RECONFIG_2"].(($CURUSER["admin_access"]=="no")?"<br /><br />".$language["ERR_NEEDS_RECONFIG_3"]:""));
            }
            if($CURUSER["uid"] > 1 && $seedboxOverOrEqual && $CURUSER['can_upload'] == 'yes')
                $torrenttpl->set("LEVEL_SB", true, false);
            else
                $torrenttpl->set("LEVEL_SB", false, true);
            if($results["seedbox"] == 1)
                $torrent["seedbox"] = "<input type='checkbox' name='seedbox' checked>";
            else
                $torrent["seedbox"] = "<input type='checkbox' name='seedbox'>";
            //End seedbox
        }
        /*Start gold mod by losmi*/
        $torrenttpl->set("gast_enabled", (($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
        {
            $gold_level = '';
            $resg = get_result("SELECT * FROM {$TABLE_PREFIX}gold  WHERE id='1'", true, $btit_settings["cache_duration"]);
            foreach($resg as $key => $value)
                $gold_level = $value["level"];
            unset($resg);
            if($gold_level > $CURUSER['id_level'])
                $torrenttpl->set("edit_gold_level", false, true);
            else
                $torrenttpl->set("edit_gold_level", true, true);
            $torrent["gold"] = createGoldCategories($results["gold"]);
        }
        else
            $torrenttpl->set("edit_gold_level", false, true);
        /*End gold mod by losmi*/
        // Image Upload -->
        $torrenttpl->set("imageup_enabled", (($btit_settings["fmhack_torrent_image_upload"] == "enabled")?true:false), true);
        $torrenttpl->set("imageup_enabled2", (($btit_settings["fmhack_torrent_image_upload"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_torrent_image_upload"] == "enabled")
        {
            $torrenttpl->set("imageon", $GLOBALS["imageon"] == "true", true);
            $torrenttpl->set("screenon", $GLOBALS["screenon"] == "true", true);
        }
        else
        {
            $torrenttpl->set("imageon", false, true);
            $torrenttpl->set("screenon", false, true);
        }
        // <-- Image Upload
        $torrent["link"] = "index.php?page=edit&info_hash=".$results["info_hash"]."&returnto=".urlencode($link);
        $torrent["filename"] = $results["filename"];
        ##############################################################
        # Nfo hack -->
        if($btit_settings["fmhack_NFO_uploader_-_viewer"] == "enabled")
        {
            $filenfo = "nfo/rep/".$results["info_hash"].".nfo";
            if(file_exists($filenfo))
            {
                $torrent["nfo"] = "
                               <div>
                               <sup>&nbsp;".$language["NFO_UNCHECK"]."<br />
                               <a href='#nfo' onclick=\"javascript:ShowHide('uploadmenfo','');\"><input type='checkbox' name='nfo' checked></a>".$results["filename"].".nfo</div>

                               <div style='display:none' id='uploadmenfo'>

                               <input type='file' name='nfo'>
                               </div>";
            }
            else
            {
                $torrent["nfo"] = "
                               <tr>
                                 <td class='header' align='right'>".$language["NFO_NFO"]."</td>
                                 <td class='lista' align='left'><sup>".$language["NFO_OPTION"]."</sup><br /><input type='file' name='nfo' /></td>
                               </tr>";
            }
        }
        # End
        ########################################################## -->
        $torrent["info_hash"] = $results["info_hash"];
        $torrenttpl->set("imdb_enabled", (($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled")
            $torrent["imdb"] = $results["imdb"];
        $torrent["description"] = textbbcode("edit", "comment", unesc($results["comment"]));
        if($btit_settings["fmhack_torrent_details_media_player"] == "enabled")
            $torrent["mplayer"] = $results["mplayer"];
        $torrent["size"] = makesize($results["size"]);
        include (dirname(__file__)."/include/offset.php");
        $torrent["date"] = date("d/m/Y", $results["data"] - $offset);
        $torrent["complete"] = $results["finished"]." ".$language["X_TIMES"];
        $torrent["peers"] = $language["SEEDERS"].": ".$results["seeds"].",".$language["LEECHERS"].": ".$results["leechers"]."=".($results["leechers"] + $results["seeds"])." ".$language["PEERS"];
        $torrent["cat_combo"] = categories($results["cat_name"]); //$s;
        if($btit_settings["fmhack_teams"] == "enabled")
        {
            // TEAM DROPDOWN
            $teamsdropdown = "<select name='team'>\n";
            $teams = team_list();
            $allowed_teams = "";
            if(($CURUSER["sel_team"] != 0 && $CURUSER["team"] != 0) && $CURUSER["sel_team"] != $CURUSER["team"])
                $allowed_teams = array(
                    0,
                    $CURUSER["sel_team"],
                    $CURUSER["team"]);
            elseif(($CURUSER["sel_team"] != 0 && $CURUSER["team"] != 0) && $CURUSER["sel_team"] == $CURUSER["team"])
                $allowed_teams = array(0, $CURUSER["sel_team"]);
            elseif($CURUSER["sel_team"] != 0 && $CURUSER["team"] == 0)
                $allowed_teams = array(0, $CURUSER["sel_team"]);
            elseif($CURUSER["team"] != 0 && $CURUSER["sel_team"] == 0)
                $allowed_teams = array(0, $CURUSER["team"]);
            foreach($teams as $teams)
            {
                if(is_array($allowed_teams) || $CURUSER["all_teams"] == "yes")
                {
                    if($CURUSER["all_teams"] == "yes")
                    {
                        $teamsdropdown .= "<option value='".$teams["id"]."'";
                        if($teams["id"] == $results["team"])
                            $teamsdropdown .= " selected='selected'";
                        $teamsdropdown .= ">".htmlspecialchars($teams["name"])."</option>\n";
                    }
                    else
                    {
                        if(in_array($teams["id"], $allowed_teams))
                        {
                            $teamsdropdown .= "<option value='".$teams["id"]."'";
                            if($teams["id"] == $results["team"])
                                $teamsdropdown .= " selected='selected'";
                            $teamsdropdown .= ">".htmlspecialchars($teams["name"])."</option>\n";
                        }
                    }
                }
            }
            $teamsdropdown .= "</select>\n";
            if($teamsdropdown != "<select name='team'>\n"."</select>\n")
            {
                //END team
                $torrent["teams_combo"] = "<tr>
                            <td class='header'>".$language["TEAMS_TEAM"].":</td>
                            <td class='lista'>".$teamsdropdown."</td>
                          </tr>";
            }
            else
                $torrent["teams_combo"] = "";
        }
        if($btit_settings["fmhack_torrent_moderation"] == "enabled")
        {
            if($CURUSER['edit_torrents'] == "yes" && $CURUSER['moderate_trusted'] == 'yes')
            {
                switch($moder_status["moder"])
                {
                    case 'ok':
                        $checked1 = "SELECTED";
                        break;
                    case 'bad':
                        $checked2 = "SELECTED";
                        break;
                    case 'um':
                        $checked3 = "SELECTED";
                        break;
                }
                $torrent["moder"] = "<select name=\"moder\" id=\"icon\" onchange=\"showimage()\">
                               <option $checked1 value=\"ok\">".$language["MODERATE_STATUS_OK"]."</option>
                               <option $checked2 value=\"bad\">".$language["MODERATE_STATUS_BAD"]."</option>
                               <option $checked3 value=\"um\">".$language["MODERATE_STATUS_UN"]."</option>
                               </select> ";
            }
            $torrent["moder"] .= "<img name=\"icons\" src=\"images/mod/".$moder_status["moder"].".png\" alt=\"".$moder_status["moder"]."\" title=\"".$moder_status["moder"]."\">";
            $torrent["ex_moder"] = $moder_status["moder"];
        }
        $torrenttpl->set("anon", (($results["anonymous"] == "true")?true:false), true);
        $torrenttpl->set("anon1", (($results["anonymous"] == "false")?true:false), true);
        $torrenttpl->set("nar_enabled", (($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")?true:false), true);
        if($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")
        {
            //Torrent Nuke/Req Hack Start
            if($results["requested"] != "false")
                $selected1 = "selected='selected'";
            $torrent["req"] = "<select name='req'>
                         <option value='false' selected='selected'>".$language["NO"]."</option>
                         <option value='true' ".$selected1.">".$language["YES"]."</option></select>";
            if($results["nuked"] != "false")
            {
                $selected2 = "selected='selected'";
                $value = $results["nuke_reason"];
            }
            else
                $value = "";
            $torrent["nuk"] = "<select name='nuk'>
                         <option value='false' selected='selected'>".$language["NO"]."</option>
                         <option value='true' ".$selected2.">".$language["YES"]."</option></select>
                         <input type='text' name='nuk_rea' value='".$value."' size='43' maxlength='100'>";
            //Torrent Nuke/Req Hack Stop
        }
        $torrenttpl->set("tmod1_enabled", (($btit_settings["fmhack_torrent_moderation"] == "enabled")?true:false), true);
        $torrenttpl->set("tmod2_enabled", (($btit_settings["fmhack_torrent_moderation"] == "enabled")?true:false), true);
        $torrenttpl->set("tmod3_enabled", (($btit_settings["fmhack_torrent_moderation"] == "enabled" && $CURUSER["moderate_trusted"] == "yes")?true:false), true);
        $torrenttpl->set("tmod4_enabled", (($btit_settings["fmhack_torrent_moderation"] == "enabled" && $CURUSER["moderate_trusted"] == "yes")?true:false), true);
        $torrenttpl->set("nfo_enabled", (($btit_settings["fmhack_NFO_uploader_-_viewer"] == "enabled")?true:false), true);
        $torrenttpl->set("nfo_enabled2", (($btit_settings["fmhack_NFO_uploader_-_viewer"] == "enabled")?true:false), true);
        $torrenttpl->set("nfo_enabled3", (($btit_settings["fmhack_NFO_uploader_-_viewer"] == "enabled")?true:false), true);
        $torrenttpl->set("teams_enabled", (($btit_settings["fmhack_teams"] == "enabled")?true:false), true);
        $torrenttpl->set("torrent", $torrent);
        unset($results);
        mysqli_free_result($res);
    }
}

?>