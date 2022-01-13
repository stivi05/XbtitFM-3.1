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
global $CURUSER, $BASEURL, $STYLEPATH, $dblist, $XBTT_USE, $btit_settings, $language, $res_seo, $THIS_BASEPATH;
if(!isset($language["SYSTEM_USER"]))
    $language["SYSTEM_USER"]="System";
if(!$CURUSER || $CURUSER["view_torrents"] == "no")
{
    // do nothing
}
else
{
    if($btit_settings["fmhack_enhanced_wait_time"] != "enabled")
    {
        $CURUSER["wait_time"] = 0;
        $CURUSER["custom_wait_time"] = "no";
        $CURUSER["php_cust_wait_time"] = 0;
    }
    if($btit_settings["fmhack_downloaded_torrents"] == "enabled")
    {
        ?>
        <table align="center" width="100%">
          <script language="javascript">
            function change(color)
            {
                var el=event.srcElement
                if (el.tagName=="INPUT"&&el.type=="button")
                event.srcElement.style.backgroundColor=color
            }
            function jumpto2(url)
            {
                window.location=url
            }
          </script>
          <form onMouseOver="change('#00bfbf')" onMouseOut="change('steelblue')">
            <td class="header" align="left"><input type="button" name="Button" class="pager" value="<?php echo $language["GRAB_YDT"];?>" onMouseOver="this.style.color='#00bfbf'" onMouseOut="this.style.color='steelblue'" onMouseDown="this.style.color='red'" style="color:yellow; font-family:Arial; font-weight:bold; font-size:10px;" onClick="jumpto2('index.php?page=grabbed')"></td>
          </form>
        </table>
        <?php
    }
    ?>
    <table cellpadding="4" cellspacing="1" width="100%">
    <?php
      if ($XBTT_USE)
    $rowcat = do_sqlquery("SELECT u.id, (u.downloaded+IFNULL(x.downloaded,0)) as downloaded, ((u.uploaded+IFNULL(x.uploaded,0))/(u.downloaded+IFNULL(x.downloaded,0))) as uratio, cp.* FROM {$TABLE_PREFIX}users u LEFT JOIN xbt_users x ON x.uid=u.id INNER JOIN {$TABLE_PREFIX}categories_perm cp ON u.id_level=cp.levelid WHERE u.id = ".$CURUSER["uid"].";",true);
  else
    $rowcat = do_sqlquery("SELECT u.id, u.downloaded, (u.uploaded/u.downloaded) as uratio, cp.* FROM {$TABLE_PREFIX}users u INNER JOIN {$TABLE_PREFIX}categories_perm cp ON u.id_level=cp.levelid WHERE u.id = ".$CURUSER["uid"].";",true);
  if (mysqli_num_rows($rowcat)>0)
     while ($catdata=mysqli_fetch_array($rowcat))
             if($catdata["viewtorrlist"]!="yes" && (($catdata["downloaded"]>=$GLOBALS["download_ratio"] && ($catdata["ratio"]>$catdata["uratio"]))||($catdata["downloaded"]<$GLOBALS["download_ratio"])||($catdata["ratio"]=="0")))
                $exclude.=' AND f.category!='.$catdata[catid];
                
    $query1_select = "";
    $query1_and = "";
    if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
        $query1_select .= "`f`.`gold`,";
    if($btit_settings["fmhack_free_leech_with_happy_hour"] == "enabled")
        $query1_select .= "`f`.`free`,";
    if($btit_settings["fmhack_torrent_moderation"] == "enabled")
    {
        if($btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes")
        {
            $query1_select .= "`u`.`username` `approved_by`,";
            $query1_join .= "LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `f`.`approved_by`=`u`.`id` ";
        }
        $query1_and .= "AND f.moder='ok'";
    }
    if($btit_settings["fmhack_balloons_on_mouseover"] == "enabled")
        $query1_select .= "`f`.`image` `img`,";
    if($btit_settings["fmhack_teams"] == "enabled")
    {
        $query1_select .= "`t`.`name` `teamname`, `t`.`id` `teamsid`, `t`.`image` `teamimage`, `f`.`team`,";
        $query1_join .= "LEFT JOIN `{$TABLE_PREFIX}teams` `t` ON `f`.`team` = `t`.`id` ";
        if($btit_settings["team_state"] == "private")
        {
            $query1_and .= "AND (".$CURUSER['team']." = `f`.`team` OR `f`.`team` = 0 OR '".$CURUSER['all_teams']."'='yes' OR '".$CURUSER['sel_team']."'=`f`.`team`) ";
        }
    }
    if($btit_settings["fmhack_upload_multiplier"] == "enabled")
        $query1_select .= "`f`.`multiplier`,";
    if($btit_settings["fmhack_SEO_panel"] == "enabled")
        $query1_select .= "`f`.`id`,";
    if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled")
    {
        $query1_select .= "`f`.`imdb`,";
    }
    if($btit_settings["fmhack_show_or_hide_porn"] == "enabled")
    {
        if($CURUSER["showporn"] == "no")
            $query1_and .= "AND `f`.`category` NOT IN(".$btit_settings["porncat"].") ";
    }
    if($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")
        $query1_select .= "`f`.`requested`, `f`.`nuked`, `f`.`nuke_reason`,";
    if($btit_settings["fmhack_archive_torrents"] == "enabled")
    {
        $query1_select .= "`f`.`archive`, ";
        if($CURUSER["view_new"] == "yes")
            $query1_and .= "AND `f`.`archive`=0 ";
        elseif($CURUSER["view_arc"] == "yes")
            $query1_and .= "AND `f`.`archive`=1 ";
        else
            $query1_and .= "AND 1=2 ";
    }
    if($btit_settings["fmhack_downloaded_torrents"] == "enabled")
    {
        $query1_select .= "IF(`d`.`id` IS NULL, 'no', 'yes') `has_downloaded`,";
        $query1_join .= "LEFT JOIN `{$TABLE_PREFIX}down_load` `d` ON (`f`.`info_hash`=`d`.`hash` AND `d`.`pid`='".$CURUSER["pid"]."') ";
    }
    if($btit_settings["fmhack_torrent_activity_colouring"] == "enabled")
    {
        if($XBTT_USE)
        {
            $query1_select .= "`xfu`.`left` `have_left`, `xfu`.`active` `is_active`,";
            $query1_join .= "LEFT JOIN `xbt_files_users` `xfu` ON (`xfu`.`fid`=`x`.`fid` AND `xfu`.`uid`=".$CURUSER["uid"].") ";
        }
        else
        {
            $query1_select .= "`p`.`status` `seeder_status`,";
            $query1_join .= "LEFT JOIN `{$TABLE_PREFIX}peers` `p` ON (`p`.`infohash`=`f`.`info_hash` AND `p`.`pid`='".$CURUSER["pid"]."') ";
        }
    }
    if($btit_settings["fmhack_grab_images_from_theTVDB"] == "enabled")
        $query1_select .= "`f`.`tvdb_id`,";
    if($btit_settings["fmhack_magnet_links"] == "enabled")
        $query1_select.="`f`.`magnet`,";
    if($XBTT_USE)
        $sql = "SELECT ".$query1_select." `f`.`info_hash` `hash`, (`f`.`seeds`+IFNULL(`x`.`seeders`,0)) `seeds`, (`f`.`leechers`+IFNULL(`x`.`leechers`,0)) `leechers`, `f`.`dlbytes` `dwned`, `x`.`completed` `finished`, `f`.`filename`, `f`.`url`, `f`.`info`, UNIX_TIMESTAMP(`f`.`data`) `added`, `c`.`image`, `c`.`name` `cname`, `f`.`category` `catid`, `f`.`size`, `f`.`external`, `f`.`uploader` FROM `{$TABLE_PREFIX}files` `f` LEFT JOIN `xbt_files` `x` ON `f`.`bin_hash`=`x`.`info_hash` LEFT JOIN `{$TABLE_PREFIX}categories` `c` ON `c`.`id` = `f`.`category` ".$query1_join." WHERE ((`f`.`seeds`+IFNULL(`x`.`seeders`,0))+(`f`.`leechers`+IFNULL(`x`.`leechers`,0)))>0 $exclude $query1_and ORDER BY ".(($btit_settings["fmhack_bump_torrents"] == "enabled")?"`f`.`bumpdate`":"`f`.`data`")." DESC LIMIT ".$GLOBALS["block_last10limit"];
    else
        $sql = "SELECT ".$query1_select." `f`.`info_hash` `hash`, `f`.`seeds`, `f`.`leechers`, `f`.`dlbytes` `dwned`, `f`.`finished`, `f`.`filename`, `f`.`url`, `f`.`info`, UNIX_TIMESTAMP(`f`.`data`) `added`, `c`.`image`, `c`.`name` `cname`, `f`.`category` `catid`, `f`.`size`, `f`.`external`, `f`.`uploader` FROM `{$TABLE_PREFIX}files` `f` LEFT JOIN `{$TABLE_PREFIX}categories` `c` ON `c`.`id` = `f`.`category` ".$query1_join." WHERE (`f`.`leechers` + `f`.`seeds`)>0 $exclude $query1_and ORDER BY ".(($btit_settings["fmhack_bump_torrents"] == "enabled")?"`f`.`bumpdate`":"`f`.`data`")." DESC LIMIT ".$GLOBALS["block_last10limit"];
    $row = get_result($sql, true, $btit_settings['cache_duration']);
    ?>
    <tr>
    <td align="center" width="20" class="header">&nbsp;<?php echo $language["DOWN"];?>&nbsp;</td>
    <td align="center" width="55%" class="header">&nbsp;<?php echo $language["TORRENT_FILE"];?>&nbsp;</td>
    <?php
    if($btit_settings["fmhack_torrent_bookmark"] == "enabled")
    {
        print ("<td align='center' width='70' class='header'>&nbsp;".$language["ADDB"]."&nbsp;</td>");
    }
    ?>
    <td align="center" width="45" class="header">&nbsp;<?php echo $language["CATEGORY"];?>&nbsp;</td>
    <?php
    if(max(0, $CURUSER["WT"]) > 0 || max(0, $CURUSER["wait_time"]) > 0 || ($CURUSER["custom_wait_time"] == "yes" && max(0, $CURUSER["php_cust_wait_time"]) > 0))
        print ("<td align=\"center\" width=\"20\" class=\"header\">&nbsp;".$language["WT"]."&nbsp;</td>");
    ?>
    <td align="center" width="85" class="header">&nbsp;<?php echo $language["ADDED"];?>&nbsp;</td>
    <td align="center" width="60" class="header">&nbsp;<?php echo $language["SIZE"];?>&nbsp;</td>
    <td align="center" width="30" class="header">&nbsp;<?php echo $language["SHORT_S"];?>&nbsp;</td>
    <td align="center" width="30" class="header">&nbsp;<?php echo $language["SHORT_L"];?>&nbsp;</td>
    <td align="center" width="40" class="header">&nbsp;<?php echo $language["SHORT_C"];?>&nbsp;</td>
    </tr>
    <?php
    if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
    {
        $res_gold = get_result("SELECT * FROM {$TABLE_PREFIX}gold  WHERE id='1'", true, $btit_settings["cache_duration"]);
    }
    if($row)
    {
        foreach($row as $data)
        {
            $filename_prefixcolor = "";
            $filename_suffixcolor = "";
            if($btit_settings["fmhack_torrent_activity_colouring"] == "enabled")
            {
                if($XBTT_USE)
                {
                    if(!is_null($data["have_left"]) && !is_null($data["is_active"]))
                    {
                        if($data["have_left"] == 0 && $data["is_active"] == 1)
                        {
                            $filename_prefixcolor = $btit_settings["seeding_prefixcolor"];
                            $filename_suffixcolor = $btit_settings["seeding_suffixcolor"];
                        }
                        elseif($data["have_left"] > 0 && $data["is_active"] == 1)
                        {
                            $filename_prefixcolor = $btit_settings["leeching_prefixcolor"];
                            $filename_suffixcolor = $btit_settings["leeching_suffixcolor"];
                        }
                    }
                }
                else
                {
                    if(!is_null($data["seeder_status"]))
                    {
                        if($data["seeder_status"] == "seeder")
                        {
                            $filename_prefixcolor = $btit_settings["seeding_prefixcolor"];
                            $filename_suffixcolor = $btit_settings["seeding_suffixcolor"];
                        }
                        elseif($data["seeder_status"] == "leecher")
                        {
                            $filename_prefixcolor = $btit_settings["leeching_prefixcolor"];
                            $filename_suffixcolor = $btit_settings["leeching_suffixcolor"];
                        }
                    }
                }
                if($filename_prefixcolor == "" && $filename_suffixcolor == "" && $btit_settings["fmhack_downloaded_torrents"] == "enabled")
                {
                    if(!is_null($data["has_downloaded"]))
                    {
                        if($data["has_downloaded"] == "yes")
                        {
                            $filename_prefixcolor = $btit_settings["snatched_prefixcolor"];
                            $filename_suffixcolor = $btit_settings["snatched_suffixcolor"];
                        }
                    }
                }
            }
            $download_locked = false;
            if($btit_settings["fmhack_archive_torrents"] == "enabled")
            {
                if($CURUSER["down_new"] == "no" && $data["archive"] == 0)
                    $download_locked = true;
                elseif($CURUSER["down_arc"] == "no" && $data["archive"] == 1)
                    $download_locked = true;
            }
            if($btit_settings["fmhack_download_requires_introduction"] == "enabled" && !$download_locked)
            {
                if($CURUSER["down_req_intro"]=="yes" && $CURUSER["made_intro"]==0)
                    $download_locked=true;
            }
            echo "<tr>";
            if(strlen($data["hash"]) > 0)
            {
                if($btit_settings["fmhack_torrent_moderation"] == "enabled" && $btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes" && is_null($data["approved_by"]))
                {
                    $data["approved_by"] = $language["SYSTEM_USER"];
                }
                echo "\n\t<td align=\"center\" class=\"lista\" width=\"20\" style=\"text-align: center;\">";
                if($btit_settings["fmhack_download_ratio_checker"] == "enabled")
                    echo (($download_locked === true)?"<img src='images/private2.png' border='0' />":"<a class=\"lasttor\" href=\"index.php?page=downloadcheck&amp;id=".$data["hash"]."\"><img src='images/".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?"magnet":"torrent").".gif' border='0' alt='".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?$language["MAGNET_DOWN_USING"]:$language["DOWNLOAD_TORRENT"])."' title='".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?$language["MAGNET_DOWN_USING"]:$language["DOWNLOAD_TORRENT"]).(($btit_settings["fmhack_torrent_moderation"] == "enabled" && $btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes" && $data["approved_by"] != $language["SYSTEM_USER"])?" (".$language["TMOD_APPROVED_BY"]." ".$data["approved_by"].")":"")."' /></a>");
                else
                    echo (($download_locked === true)?"<img src='images/private2.png' border='0' />":"<a class=\"lasttor\" href=\"".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?base64_decode(stripslashes($data["magnet"])):"download.php?id=".$data["hash"]."&amp;f=".rawurlencode($data["filename"]).".torrent")."\"><img src='images/".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?"magnet":"torrent").".gif' border='0' alt='".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?$language["MAGNET_DOWN_USING"]:$language["DOWNLOAD_TORRENT"])."' title='".(($btit_settings["fmhack_magnet_links"]=="enabled" && !$DHT_PRIVATE && !$PRIVATE_ANNOUNCE && $data["magnet"]!="")?$language["MAGNET_DOWN_USING"]:$language["DOWNLOAD_TORRENT"]).(($btit_settings["fmhack_torrent_moderation"] == "enabled" && $btit_settings["mod_app_sa"] == "yes" && $CURUSER["admin_access"] == "yes" && $data["approved_by"] != $language["SYSTEM_USER"])?" (".$language["TMOD_APPROVED_BY"]." ".$data["approved_by"].")":"")."' /></a>");
                echo "</td>";
                $data["filename"] = unesc($data["filename"]);
                $filename = cut_string($data["filename"], intval($btit_settings["cut_name"]));
                if($btit_settings["fmhack_upload_multiplier"] == "enabled")
                {
                    if($data["multiplier"] > 1)
                        $mult = "<img alt='".$data["multiplier"]."x ".$language["UPM_UPL_MULT"]."' title='".$data["multiplier"]."x ".$language["UPM_UPL_MULT"]."' src='images/".$data['multiplier']."x.gif' />";
                    else
                        $mult = "";
                }
                if($btit_settings["fmhack_teams"] == "enabled")
                {
                    $fteam = $data["team"];
                    if(isset($fteam) && !empty($fteam))
                        $team = "<a class='lasttor' href='index.php?page=teaminfo&team=".$data["teamsid"]."&action=view'><img src='".$data["teamimage"]."' border='0' title='".$data["teamname"]."' style='width:25px;'></a>";
                    else
                        $team = "";
                }
                if($btit_settings["fmhack_balloons_on_mouseover"] == "enabled")
                {
                    $balon="";
                    $balloonPriority=explode(",", $btit_settings["balloontype"]);
                    if(count($balloonPriority)>0)
                    {
                        foreach($balloonPriority as $balloonValue)
                        {
                            if($balon=="")
                            {
                                if($balloonValue==1)
                                {
                                    if(!empty($data["img"]) && @file_exists($THIS_BASEPATH."/".$btit_settings["uploaddir"].$data["img"]))
                                        $balon = $btit_settings["uploaddir"].$data["img"];
                                }
                                elseif($balloonValue==2)
                                {
                                    if($btit_settings["fmhack_getIMDB_in_torrent_details"] == "enabled" && !empty($data["imdb"]) && @file_exists($THIS_BASEPATH."/imdb/images/".$data["imdb"].".jpg"))
                                        $balon = "imdb/images/".$data["imdb"].".jpg";
                                }
                                elseif($balloonValue==3)
                                {
                                    if($btit_settings["fmhack_grab_images_from_theTVDB"] == "enabled" && !empty($data["tvdb_id"]))
                                    {
                                        $selectedPics=array();
                                        if(file_exists($THIS_BASEPATH."/thetvdb/".$data["tvdb_id"]."/poster"))
                                        {
                                            foreach(glob($THIS_BASEPATH."/thetvdb/".$data["tvdb_id"]."/poster/*.*") as $imageFilename)
                                                $selectedPics[]=str_replace($THIS_BASEPATH."/", "", $imageFilename);
                                        }
                                        if(count($selectedPics)>0)
                                        {
                                            $randomkey=array_rand($selectedPics, 1);
                                            if(file_exists($THIS_BASEPATH."/".$selectedPics[$randomkey]))
                                                $balon = $selectedPics[$randomkey];
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if($balon=="")
                        $balon = $btit_settings["uploaddir"]."nocover.jpg";
                }
                //free leech hack
                if($btit_settings["fmhack_free_leech_with_happy_hour"] == "enabled")
                {
                    $free_picture = '';
                    $free = '';
                    if($data['free'] == 'yes')
                        $free = '<img title="'.$language['FL_FREE_LEECH'].'" src="images/freeleech.gif" alt="'.$language['FL_FREE_LEECH'].'"/>';
                }
                // end free leech
                if($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")
                {
                    //gold mod
                    $gold = '';
                    $silver_picture = '';
                    $gold_picture = '';
                    $bronze_picture = '';
                    if(count($res_gold) == 1)
                    {
                        $silver_picture = $res_gold[0]["silver_picture"];
                        $gold_picture = $res_gold[0]["gold_picture"];
                        $bronze_picture = $res_gold[0]["bronze_picture"];
                        $silver_percentage = (100 - $res_gold[0]["silver_percentage"])."%";
                        $gold_percentage = (100 - $res_gold[0]["gold_percentage"])."%";
                        $bronze_percentage = (100 - $res_gold[0]["bronze_percentage"])."%";
                    }
                    if($data['gold'] == 1)
                        $gold = '<img title="'.$language["IS_SILVER"].' '.$silver_percentage.' '.$language["IS_ALL"].'" src="images/'.$silver_picture.'" alt="'.$language["IS_SILVER"].' '.$silver_percentage.' '.$language["IS_ALL"].'" />';
                    elseif($data['gold'] == 2)
                        $gold = '<img title="'.$language["IS_GOLD"].' '.$gold_percentage.' '.$language["IS_ALL"].'" src="images/'.$gold_picture.'" alt="'.$language["IS_GOLD"].' '.$gold_percentage.' '.$language["IS_ALL"].'" />';
                    elseif($data['gold'] == 3)
                        $gold = '<img title="'.$language["IS_BRONZE"].' '.$bronze_percentage.' '.$language["IS_ALL"].'" src="images/'.$bronze_picture.'" alt="'.$language["IS_BRONZE"].' '.$bronze_percentage.' '.$language["IS_ALL"].'" />';
                }
                if($btit_settings["fmhack_display_new_torrents_since_last_Visit"] == "enabled")
                {
                    if(isset($_COOKIE['lastseen']))
                    {
                        $filetime = date("YmdHis", $data["added"]);
                        if($_COOKIE['lastseen'] <= $filetime)
                        {
                            $is_new = '<img src="images/new.png" />';
                        }
                        else
                        {
                            $is_new = '';
                        }
                    }
                }
                if($btit_settings["fmhack_downloaded_torrents"] == "enabled")
                {
                    $dl = "";
                    if($btit_settings["fmhack_torrent_activity_colouring"] == "enabled" && $btit_settings["hide_down_img"] == "yes")
                    {
                        // change nothing
                    }
                    elseif(!is_null($data["has_downloaded"]))
                    {
                        $dl = (($data["has_downloaded"] == "yes")?"<img src='images/downloaded.gif' alt='".$language["GRAB_AL_DOWN"]."' title='".$language["GRAB_AL_DOWN"]."' />":"");
                    }
                }
                if($btit_settings["fmhack_torrent_nuked_and_requested"] == "enabled")
                {
                    //Torrent Nuke/Req Hack Start
                    if($data["requested"] != "false")
                        $req = "&nbsp;<img title='".$language["TNR_REL_REQ"]."' src='images/req.gif' />";
                    else
                        $req = "";
                    if($data["nuked"] != "false")
                        $nuk = "&nbsp;<img title='".$data["nuke_reason"]."' src='images/nuked.gif' />";
                    else
                        $nuk = "";
                }
                if($GLOBALS["usepopup"])
                    echo "\n\t<td width=\"55%\" class=\"lista\" style=\"padding-left:10px;\"><a class=\"lasttor\" href=\"javascript:popdetails('".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated"] == "true")?strtr($filename, $res_seo["str"], $res_seo["strto"])."-".$data["id"].".html":"index.php?page=torrent-details&id=".$data["hash"])."');\"".(($btit_settings["fmhack_balloons_on_mouseover"] == "enabled")?"onmouseover=\" return overlib('<img src=".$balon." width=200 border=0>', CENTER);\" onmouseout=\"return nd();\"":"title=\"".$language["VIEW_DETAILS"].": ".$data["filename"]."\"").">".unesc($filename_prefixcolor.$filename.$filename_suffixcolor)."</a>".(($btit_settings["fmhack_teams"] == "enabled" && $team != "")?"&nbsp;".$team."&nbsp;":"").(($btit_settings["fmhack_display_new_torrents_since_last_Visit"] == "enabled" && $is_new != "")?"&nbsp;&nbsp;".$is_new:"").(($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")?$gold:"").(($btit_settings["fmhack_free_leech_with_happy_hour"] == "enabled")?$free:"").(($btit_settings["fmhack_downloaded_torrents"])?$dl:"").($data["external"] == "no"?"":" (<span style=\"color:red\">".$language["SHORT_EXTERNAL"]."</span>)").(($btit_settings["fmhack_upload_multiplier"] == "enabled")?$mult:"").(($btit_settings["fmhack_torrent_nuked_and_requested"])?$nuk.$req:"")."</td>";
                else
                    echo "\n\t<td width=\"55%\" class=\"lista\" style=\"padding-left:10px;\"><a class=\"lasttor\" href=\"".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated"] == "true")?strtr($filename, $res_seo["str"], $res_seo["strto"])."-".$data["id"].".html":"index.php?page=torrent-details&id=".$data["hash"])."\"".(($btit_settings["fmhack_balloons_on_mouseover"] == "enabled")?"onmouseover=\" return overlib('<img src=".$balon." width=200 border=0>', CENTER);\" onmouseout=\"return nd();\"":"title=\"".$language["VIEW_DETAILS"].": ".$data["filename"]."\"").">".unesc($filename_prefixcolor.$filename.$filename_suffixcolor)."</a>".(($btit_settings["fmhack_teams"] == "enabled" && $team != "")?"&nbsp;".$team."&nbsp;":"").(($btit_settings["fmhack_display_new_torrents_since_last_Visit"] == "enabled" && $is_new != "")?"&nbsp;&nbsp;".$is_new:"").(($btit_settings["fmhack_gold_and_silver_torrents"] == "enabled")?$gold:"").(($btit_settings["fmhack_free_leech_with_happy_hour"] == "enabled")?$free:"").(($btit_settings["fmhack_downloaded_torrents"])?$dl:"").($data["external"] == "no"?"":" (<span style=\"color:red\">".$language["SHORT_EXTERNAL"]."</span>)").(($btit_settings["fmhack_upload_multiplier"] == "enabled")?$mult:"").(($btit_settings["fmhack_torrent_nuked_and_requested"])?$nuk.$req:"")."</td>";
                if($btit_settings["fmhack_torrent_bookmark"] == "enabled")
                {
                    echo "\n\t<td style='text-align:center;' class='lista' width='70'><a class=\"lasttor\" href='index.php?page=bookmark&do=add&torrent_id=".$data["hash"]."'><span style='color:green;'>".$language["TB_BOOKMARK"]."</span></a></td>";
                }
                echo "\n\t<td align=\"center\" class=\"lista\" width=\"45\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"index.php?page=torrents&amp;category=$data[catid]\">".image_or_link(($data["image"] == ""?"":"$STYLEPATH/images/categories/".$data["image"]), "", $data["cname"])."</a></td>";
                //waitingtime
                // only if current user is limited by WT
                if(max(0, $CURUSER["WT"]) > 0 || max(0, $CURUSER["wait_time"]) > 0 || ($CURUSER["custom_wait_time"] == "yes" && max(0, $CURUSER["php_cust_wait_time"]) > 0))
                {
                    $wait = 0;
                    if(max(0, $CURUSER['downloaded']) > 0)
                        $ratio = number_format($CURUSER['uploaded'] / $CURUSER['downloaded'], 2);
                    else
                        $ratio = 0.0;
                    $vz = $data['added']; // sql_timestamp_to_unix_timestamp($added["data"]);
                    $timer = floor((time() - $vz) / 3600);
                    if($btit_settings["fmhack_enhanced_wait_time"] == "enabled")
                    {
                        if($XBTT_USE)
                        {
                            if($CURUSER['uid'] != $data["uploader"])
                                $wait = ($CURUSER["wait_time"] / 3600);
                        }
                        else
                        {
                            if($CURUSER["custom_wait_time"] == "yes")
                            {
                                if($ratio < 1.0 && $CURUSER['uid'] != $data["uploader"])
                                    $wait = $CURUSER["php_cust_wait_time"];
                            }
                            else
                            {
                                if($ratio < 1.0 && $CURUSER['uid'] != $data["uploader"])
                                    $wait = $CURUSER["WT"];
                            }
                        }
                    }
                    else
                    {
                        if($ratio < 1.0 && $CURUSER['uid'] != $data["uploader"])
                        {
                            $wait = $CURUSER["WT"];
                        }
                    }
                    $wait -= $timer;
                    if($wait <= 0)
                        $wait = 0;
                    echo "\t<td align=\"center\" width=\"20\" class=\"lista\" style=\"text-align: center;\">".$wait." h</td>";
                }
                //end waitingtime
                echo "\n\t<td nowrap=\"nowrap\" class=\"lista\" align=\"center\" width=\"85\" style=\"text-align: center;\">".get_elapsed_time($data["added"])." ago</td>";
                echo "\n\t<td nowrap=\"nowrap\" class=\"lista\" align=\"center\" width=\"60\" style=\"text-align: center;\">".makesize($data["size"])."</td>";
                if($data["external"] == "no")
                {
                    if($GLOBALS["usepopup"])
                    {
                        echo "\n\t<td align=\"center\" class=\"lista ".linkcolor($data["seeds"])."\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"javascript:poppeer('index.php?page=peers&amp;id=".$data["hash"]."');\" title=\"".$language["PEERS_DETAILS"]."\">".$data["seeds"]."</a></td>\n";
                        echo "\n\t<td align=\"center\" class=\"lista ".linkcolor($data["leechers"])."\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"javascript:poppeer('index.php?page=peers&amp;id=".$data["hash"]."');\" title=\"".$language["PEERS_DETAILS"]."\">".$data["leechers"]."</a></td>\n";
                        if($data["finished"] > 0)
                            echo "\n\t<td align=\"center\" class=\"lista\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"javascript:poppeer('index.php?page=torrent_history&amp;id=".$data["hash"]."');\" title=\"History - ".$data["filename"]."\">".$data["finished"]."</a></td>";
                        else
                            echo "\n\t<td align=\"center\" class=\"lista\" style=\"text-align: center;\">---</td>";
                    }
                    else
                    {
                        echo "\n\t<td align=\"center\" class=\"lista ".linkcolor($data["seeds"])."\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"index.php?page=peers&amp;id=".$data["hash"]."\" title=\"".$language["PEERS_DETAILS"]."\">".$data["seeds"]."</a></td>\n";
                        echo "\n\t<td align=\"center\" class=\"lista ".linkcolor($data["leechers"])."\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"index.php?page=peers&amp;id=".$data["hash"]."\" title=\"".$language["PEERS_DETAILS"]."\">".$data["leechers"]."</a></td>\n";
                        if($data["finished"] > 0)
                            echo "\n\t<td align=\"center\" class=\"lista\" style=\"text-align: center;\"><a class=\"lasttor\" href=\"index.php?page=torrent_history&amp;id=".$data["hash"]."\" title=\"History - ".$data["filename"]."\">".$data["finished"]."</a></td>";
                        else
                            echo "\n\t<td align=\"center\" class=\"lista\">---</td>";
                    }
                }
                else
                {
                    // linkcolor
                    echo "\n\t<td align=\"center\" width=\"30\" class=\"lista ".linkcolor($data["seeds"])."\" style=\"text-align: center;\">".$data["seeds"]."</td>";
                    echo "\n\t<td align=\"center\" width=\"30\" class=\"lista ".linkcolor($data["leechers"])."\" style=\"text-align: center;\">".$data["leechers"]."</td>";
                    if($data["finished"] > 0)
                        echo "\n\t<td align=\"center\" width=\"40\" class=\"lista\" style=\"text-align: center;\">".$data["finished"]."</td>";
                    else
                        echo "\n\t<td align=\"center\" class=\"lista\" style=\"text-align: center;\">---</td>";
                }
                echo "</tr>\n";
            }
        }
    }
    else
    {
        echo "\n<tr><td class=\"lista\" colspan=\"9\" align=\"center\" style=\"text-align: center;\">".$language["NO_TORRENTS"]."</td></tr>";
    }
    print ("\n</table>");
} // end if user can view

?>