<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// Torrent Request & Vote by miskotes  - converted to XBTIT-2 by DiemThuy - March 2009
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
// DT viewrequests.tpl needed
if(!defined("IN_BTIT"))
    die("non direct access!");

require_once ($THIS_BASEPATH."/include/functions.php");
global $CURUSER, $XBTT_USE;
if(!isset($CURUSER) || !is_array($CURUSER))
{
    session_start();
    $CURUSER = $_SESSION["CURUSER"];
}
if(!$CURUSER || $CURUSER["view_torrents"] == "no")
{
    // do nothing
}
else
{
    if($btit_settings["req_onoff"] == "true")
    {
        $maxallowed = $btit_settings["req_max"];
        $res3 = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}requests as reqcount WHERE userid=".$CURUSER["uid"]) or mysqli_error($GLOBALS['conn']);
        $arr3 = mysqli_num_rows($res3);
        $numreqs = $arr3;
        $reqrem = $maxallowed - $numreqs;
        $reward = makesize($btit_settings["req_mb"]);
        $viewrequeststpl = new bTemplate();
        $viewrequeststpl->set("language", $language);
        if($btit_settings["req_maxon"] == true)
        {
            $viewrequeststpl->set("vr0", "<br><div align=center ><span style='color:steelblue'>".$language["TRAV_AV_REQ"]." <b>".unesc($CURUSER["prefixcolor"].$CURUSER["username"].$CURUSER["suffixcolor"]).": $maxallowed</b> | ".
                $language["TRAV_POS_REQ"].": <b>$arr3</b> | ".$language["TRAV_REM"].": <b>$reqrem</b></span></div><br>");
        }
        if($btit_settings["req_rwon"] == true)
        {
            if($btit_settings["req_sbmb"] == true)
            {
                $viewrequeststpl->set("vr01", "<br><div align=center ><span style='color:steelblue'>".$language["TRAV_IYFAR"]." <b>$reward</b></span></div><br>");
                //do_sqlquery("UPDATE {$TABLE_PREFIX}users SET uploaded = uploaded + $btit_settings[req_mb]  WHERE id=$CURUSER[uid]");
            }
            if($btit_settings["req_sbmb"] == false)
            {
                $viewrequeststpl->set("vr01", "<br><div align=center ><span style='color:steelblue'>".$language["TRAV_IYFAR"]." <b>$btit_settings[req_sb]</b> ".$language["TRAV_SEEDB_P"]."</span></div><br>");
                //do_sqlquery("UPDATE {$TABLE_PREFIX}users SET seedbonus = seedbonus + $btit_settings[req_sb] WHERE id=$CURUSER[uid]");
            }
        }
        $viewrequeststpl->set("vr1", "<div align=right><a href=index.php?page=requests>".$language["TRAV_ANR"]."</a> | <a href=index.php?page=viewrequests&requestorid=$CURUSER[uid]>".$language["TRAV_VMR"].
            "</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
        $viewrequeststpl->set("vr2", "<br><br><a href=index.php?page=viewrequests&category=".$_GET['category']."&sort=".$_GET['sort']."&filter=true><b>".$language["TRAV_HFR"].
            "</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div>");
        (isset($_GET["category"]) && is_numeric($_GET["category"]) && $_GET["category"] >= 0)?$categ = (int)0 + $_GET["category"]:$categ = null;
        (isset($_GET["requestorid"]) && is_numeric($_GET["requestorid"]) && $_GET["requestorid"] > 1)?$requestorid = (int)0 + $_GET["requestorid"]:$requestorid = null;
        $sort = mysqli_real_escape_string($GLOBALS['conn'],$_GET["sort"]);
        $search = mysqli_real_escape_string($GLOBALS['conn'],$_GET["search"]);
        $filter = mysqli_real_escape_string($GLOBALS['conn'],$_GET["filter"]);
        if($search == '')
            $search = "";
        else
            $search = " WHERE r.request LIKE '%$search%' ";
        if($sort == "votes")
            $sort = " order by hits desc ";
        else
            if($sort == "request")
                $sort = " order by request ";
            else
                $sort = " order by added desc ";
        if($requestorid <> null)
        {
            if(($categ <> null) && ($categ <> 0))
                $categ = "WHERE r.cat = ".$categ." AND r.userid = ".$requestorid;
            else
                $categ = "WHERE r.userid = ".$requestorid;
        }
        else
            if($categ == 0)
                $categ = '';
            else
                $categ = "WHERE r.cat = ".$categ;
        if($categ == 0)
        {
            if($filter == "true")
                $filter = " WHERE r.filledby = 0 ";
             elseif($filter == "yes")
            $filter = " WHERE r.filled!='' ";
            else
                $filter = "";

        }
        else
        {
            if($filter == "true")
                $filter = " AND r.filledby = 0 ";
            elseif($filter == "yes")
            $filter = " WHERE r.filled!='' ";
            else
                $filter = "";
        }
        $res = do_sqlquery("SELECT count(r.id) FROM {$TABLE_PREFIX}requests r inner join {$TABLE_PREFIX}categories c on r.cat = c.id inner join {$TABLE_PREFIX}users u on r.userid = u.id  $categ $filter $search", true);
        $req = array();
        $ii = 0;
        $row = mysqli_fetch_array($res);
        $count = $row[0];
        $dir = 'index.php?page=viewrequests';
        $perpage = $btit_settings["req_page"];
        list($pagertop, $pagerbottom, $limit) = pager($perpage, $count, $dir."&"."category=".$_GET["category"]."&sort=".$_GET["sort"]."&filter=".$_GET["filter"]."&");
        if($XBTT_USE)
        {
            $udownloaded = "u.downloaded+IFNULL(x.downloaded,0)";
            $uuploaded = "u.uploaded+IFNULL(x.uploaded,0)";
            $utables = "{$TABLE_PREFIX}users u on r.userid = u.id LEFT JOIN xbt_users x ON x.uid=u.id";
        }
        else
        {
            $udownloaded = "u.downloaded";
            $uuploaded = "u.uploaded";
            $utables = "{$TABLE_PREFIX}users u on r.userid = u.id";
        }
        $res = do_sqlquery("SELECT ".$udownloaded.", ".$uuploaded.
            ", u.username, ul.prefixcolor, ul.suffixcolor, u2.username f_username, ul2.prefixcolor f_prefixcolor, ul2.suffixcolor f_suffixcolor, r.filled, r.filledby,r.fulfilled, r.id, r.userid, r.request, r.added, r.hits,r.job, c.image catimg, c.id catid, c.name as cat FROM {$TABLE_PREFIX}requests r inner join {$TABLE_PREFIX}categories c on r.cat = c.id inner join ".
            $utables."  inner join {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id left join {$TABLE_PREFIX}users u2 on r.filledby = u2.id  left join {$TABLE_PREFIX}users_level ul2 ON u2.id_level=ul2.id $categ $filter $search $sort $limit") or
            sqlerr();
        $num = mysqli_num_rows($res);
        $viewrequeststpl->set("vr3", "<br><br><CENTER><form method=get action=index.php><input type=hidden name=page value=viewrequests />");
        $viewrequeststpl->set("vr4", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text size=30 name=search>");
        $viewrequeststpl->set("vr5", " <input type=submit align=center value=".$language["TRAV_SEARCH"]." style='height: 22.5px'>\n");
        $viewrequeststpl->set("vr6", "</form></CENTER><br>");
        $viewrequeststpl->set("pagtop", "<center>$pagertop</center>");
        $viewrequeststpl->set("vr7", "<Table border=0 width=99% align=center cellspacing=0 cellpadding=0><TR><TD width=49.5% align=left>");
        $viewrequeststpl->set("vr8", "<p>".$language["TRAV_SORTBY"].": <a href=index.php?page=viewrequests&category=".$_GET['category']."&filter=".$_GET['filter']."&sort=votes>".$language["TRAV_VOTES"].
            "</a> - <a href=index.php?page=viewrequests&category=".$_GET['category']."&filter=".$_GET['filter']."&sort=request>".$language["VR"]."</a> - <a href=index.php?page=viewrequests&category=".$_GET['category'].
            "&filter=".$_GET['filter']."&sort=added> ".$language["DATE"]."</a>- <a href=index.php?page=viewrequests&category=".$_GET['category']."&filter=yes&sort=filled>".$language["TRAV_FILLED"]."</a></p>");
        $viewrequeststpl->set("vr9", "<form method=get action=index.php><input type=hidden name=page value=viewrequests />");
        $viewrequeststpl->set("vr10", "</td><td width=100% align=right>");
        $viewrequeststpl->set("vr11", "<select name=category>");
        $viewrequeststpl->set("vr12", "<option value=0>----\n</option>");
        $cats = genrelist();
        $catdropdown = "";
        foreach($cats as $cat)
        {
            $catdropdown .= "<option value=\"".$cat["id"]."\"";
            $catdropdown .= ">".htmlspecialchars($cat["name"])."</option>\n";
        }
        $viewrequeststpl->set("vr13", $catdropdown);
        $viewrequeststpl->set("vr14", "</select>");
        $viewrequeststpl->set("vr15", "<input type=submit align=center value=".$language["TRAV_DISPLAY"]." >\n");
        $viewrequeststpl->set("vr16", "</form></td></tr></table>");
        $viewrequeststpl->set("vr17", "<form method=post action=index.php?page=takedelreq>");
        $viewrequeststpl->set("vr18", "<table width=99% align=center cellspacing=1 class=lista>\n");
        $viewrequeststpl->set("vr19", "<tr>".($CURUSER["can_upload"] == "yes"?"<td class=header align=center>".$language["TJ"]."</td>":"")."<td class=header align=center>".$language["VR"].
            "</td><td class=header align=center>".$language["TRAV_TYPE"]."</td><td class=header align=center width=150>".$language["TRAV_DATE_A"]."</td><td class=header align=center>".$language["TRAV_ADDEDBY"].
            "</td><td class=header align=center>".$language["TRAV_FILLED"]."</td><td class=header align=center>".$language["TRAV_FILLEDBY"]."</td><td class=header align=center>".$language["TRAV_VOTES"]."</td>\n");
        if(!$CURUSER || $CURUSER["edit_torrents"] == "yes")
            $viewrequeststpl->set("vr20", "<td class=header align=center>".$language["DELETE"]."</td></tr>\n");
        for($i = 0; $i < $num; ++$i)
        {
            $arr = mysqli_fetch_assoc($res);
            $privacylevel = $arr["privacy"];
            if($arr["downloaded"] > 0)
            {
                $ratio = number_format($arr["uploaded"] / $arr["downloaded"], 2);
                //$ratio = "<font color=" . get_ratio_color($ratio) . "><b>$ratio</b></font>";
            }
            else
                if($arr["uploaded"] > 0)
                    $ratio = "Inf.";
                else
                    $ratio = "---";
            if(is_null($arr["f_username"]))
                $filledby = "";
            else
                $filledby = unesc($arr["f_prefixcolor"].$arr["f_username"].$arr["f_suffixcolor"]);
            if(!$CURUSER || $CURUSER["delete_torrents"] == "no")
            {
                if(!$CURUSER || $CURUSER["view_users"] == "yes")
                {
                    $addedby = "<td class=lista align=center><center><a href='".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated_user"] == "true")?$arr["userid"]."_".strtr($arr["username"], $res_seo["str"],
                        $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$arr["userid"])."'><b>".unesc($arr["prefixcolor"].$arr["username"].$arr["suffixcolor"])." ($ratio)</b></a></td>";
                }
                else
                {
                    $addedby = "<td class=lista align=center><center><a href='".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated_user"] == "true")?$arr["userid"]."_".strtr($arr["username"], $res_seo["str"],
                        $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$arr["userid"])."'><b>".unesc($arr["prefixcolor"].$arr["username"].$arr["suffixcolor"])." (----)</b></a></td>";
                }
            }
            else
            {
                $addedby = "<td class=lista align=center><center><a href='".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated_user"] == "true")?$arr["userid"]."_".strtr($arr["username"], $res_seo["str"],
                    $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$arr["userid"])."'><b>".unesc($arr["prefixcolor"].$arr["username"].$arr["suffixcolor"])." ($ratio)</b></a></td>";
            }
            $filled = $arr["filled"];
            if($filled)
            {
                $filled = "<a href=$filled><span style='color:green'><b>".$language["YES"]."</b></span></a>";
                $filledbydata = "<a href='".(($btit_settings["fmhack_SEO_panel"] == "enabled" && $res_seo["activated_user"] == "true")?$arr["filledby"]."_".strtr($arr["f_username"], $res_seo["str"], $res_seo["strto"]).
                    ".html":"index.php?page=userdetails&id=".$arr["userid"])."'><b>$filledby</b></a><br><small>".$arr["fulfilled"]."</small>";
            }
            else
            {
                $filled = "<a href=index.php?page=reqdetails&id=$arr[id]><span style='color:red'><b>".$language["NO"]."</b></span></a>";
                $filledbydata = "<i>".$language["TRAV_NOBODY"]."</i>";
            }
            if($CURUSER["can_upload"] == "yes")
            {
                if($arr["job"] > 0)
                {
                    $who = get_result("SELECT ul.prefixcolor,ul.suffixcolor,u.username FROM `{$TABLE_PREFIX}users` u  LEFT JOIN `{$TABLE_PREFIX}users_level` ul ON u.id_level=ul.id WHERE u.id=".$arr["job"]."", true, $btit_settings["cache_duaration"]);
                    foreach($who as $u)
                        ;
                }
                $job = ($arr["job"] > 0?"<td class='lista'><center>".unesc($u["prefixcolor"].$u["username"].$u["suffixcolor"])."</center></td>":"<td class='lista'><center><a href='index.php?page=take&id=".$arr["id"].
                    "'><img border='0' src='".$BASEURL."/images/take.gif' title='".$language["TJ"]."' alt='".$language["TJ"]."'></a></center></td>");
            }
            else
            {
                $job = '';
            }
            $req[$ii]["vr21"] = ("<tr>".$job."<td class=lista align=left><a href=index.php?page=reqdetails&id=$arr[id]><center><b>$arr[request]</b></center></a></td>"."<td class=lista align=center><center>".
                image_or_link(($arr['catimg'] == ''?'':'style/xbtitFM/images/categories/'.$arr["catimg"]), ' title='.$arr["cat"].'', $arr["cat"])."</td><td class=lista align=center><center>".$arr["added"]."</td>$addedby<td class=lista align=center><center>$filled</td><td class=lista><center>$filledbydata</td><td class=lista align=center><a href=index.php?page=votesview&requestid=$arr[id]><b><center>$arr[hits]</b></a></td>\n");
            if(!$CURUSER || $CURUSER["edit_torrents"] == "yes")
                $req[$ii]["vr22"] = ("<td class=lista align=center><center><input type=\"checkbox\" name=\"delreq[]\" value=\"".$arr["id"]."\" /><br><a href='index.php?page=reqreset&requestid=".$arr["id"]."'>".$language["RS"].
                    "</a></td></tr>\n");
            $ii++;
        }
        $viewrequeststpl->set("req", $req);
        $viewrequeststpl->set("vr23", "</table>\n");
        if(!$CURUSER || $CURUSER["edit_torrents"] == "yes")
            $viewrequeststpl->set("vr23", "<table width=99%><td align=right><input type=submit value=".$language["TRAV_GO"]."></td></table>");
        $viewrequeststpl->set("vr24", "</form>");
    }
    else
    {
        stderr($language["TRAV_OFF_MESS"], $language["TRAV_REQ_OFF"]);
        stdfoot();
        die;
    }
}

?>