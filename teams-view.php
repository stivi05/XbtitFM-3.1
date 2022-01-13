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

if(!$CURUSER || $CURUSER["view_torrents"]!="yes")
{
    err_msg($language["ERROR"],$language["NOT_AUTHORIZED"]." ".$language["MNU_TORRENT"]."!<br />\n".$language["SORRY"]."...");
    stdfoot();
    exit();
}
else
{
    $pagertop="";
    $pagerbottom="";
    $teampubtpl=new bTemplate();
    require_once(load_language("lang_teams.php"));
    $teampubtpl->set("language",$language);

    $teamsres=get_result("SELECT COUNT(*) `count` FROM `{$TABLE_PREFIX}teams` WHERE `id`>0 ORDER BY `id` ASC", true, $btit_settings["cache_duration"]);
    $perpage=(max(0,$CURUSER["torrentsperpage"])>0?$CURUSER["torrentsperpage"]:10);
    list($pagertop, $pagerbottom, $limit) = pager($perpage, $teamres[0]["count"], "index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=teams&amp;");
    
    $teampubtpl->set("pagertop",$pagertop);
    $teampubtpl->set("pagerbottom",$pagerbottom);

    $teamres=get_result("SELECT `t`.`id`, `t`.`name`, `t`.`image`, `t`.`owner`, `t`.`info`, `u`.`username`, `ul`.`prefixcolor`, `ul`.`suffixcolor` FROM `{$TABLE_PREFIX}teams` `t` LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `t`.`owner`=`u`.`id` LEFT JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id` WHERE `t`.`id`>0 ORDER BY `t`.`id` ASC $limit", true, $btit_settings["cache_duration"]);

    if(count($teamres)>0)
    {
        $teampubtpl->set("found_rows", true, true);
        $teams=array();
        $i=0;

        foreach($teamres as $row)
        {
            $teams[$i]["id"] = (int)$row["id"];
            $teams[$i]["name"] = htmlspecialchars($row["name"]);
            $teams[$i]["image"] = htmlspecialchars($row["image"]);
            $teams[$i]["owner"] = (int)$row["owner"];
            $tc=get_result("SELECT COUNT(*) `count` FROM `{$TABLE_PREFIX}files` WHERE `team`=".$row["id"], true, $btit_settings["cache_duration"]);
            $teams[$i]["info"] = $tc[0]["count"];
            $teams[$i]["username_link"]=(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated_user"]=="true")?$row["owner"]."_".strtr($row["username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$row["owner"]);
            $teams[$i]["OWNERNAME"] = stripslashes($row["prefixcolor"].$row["username"].$row["suffixcolor"]);

            $i++;
        }
        $teampubtpl->set("teams",$teams);
    }
    else
       $teampubtpl->set("found_rows", false, true);
}

?>