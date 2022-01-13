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

//by CobraCRK 21.07.2006 - www.extremeshare.org - cobracrk@yahoo.com
//converted to xbtit by cooly
if (!defined("IN_BTIT"))
    die("non direct access!");

    

require_once ("include/sanitize.php");
require (load_language("lang_subs.php"));

global $STYLEURL, $CURUSER;

if ($CURUSER["view_torrents"] == "no")
{
    err_msg(ERROR, NOT_AUTH_VIEW_NEWS);
    stdfoot();
    exit;
}

$src = sanitize_sql_string($_POST['src']);
$subsearchtpl = new bTemplate();
$subsearchtpl->set("language", $language);

if ($CURUSER["can_upload"] == "yes")
{
    $subadd = "<br><center><a href=\"index.php?page=subadd\"><img src=\"images/Add.png\" width=30 height=30 alt=\"Add Subtitle\" title=\"Add Subtitle\"></a>&nbsp;&nbsp;<a href=\"index.php?page=subtitles\"><img src=\"images/Back.png\" width=30 height=30 alt=\"Back\" title=\"Back\"></a></center>";
}

$search = "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"index.php?page=subsearch\">
  <div align=\"center\">
    <input name=\"src\" type=\"text\" size=\"40\" value=\"$src\" />
    <input type=\"submit\" class=btn name=\"Submit\" value=\"" . $language['SUBSEARCH'] .
    "\" />
  </div>
</form>
<p>&nbsp;</p>
<table border=\"0\" align=\"center\" cellpadding=\"1\" cellspacing=\"1\">";

$subsearchtpl->set("subadd", $subadd);
$subsearchtpl->set("subsearch", $search);

$subres = do_sqlquery("SELECT COUNT(*) FROM {$TABLE_PREFIX}subtitles WHERE name LIKE '%$src%'", true);
$subnum = mysqli_fetch_row($subres);
$num2 = $subnum[0];

if ($num2 == 0)
{
    stderr("Sorry", $language['SUBS_EMPTY_STD']);
}

$perpage = (max(0, $CURUSER["torrentsperpage"]) > 0 ? $CURUSER["torrentsperpage"] :
    10);
list($pagertop, $pagerbottom, $limit) = pager($perpage, $num2,
    "index.php?page=subsearch&amp;");
$subsearchtpl->set("pagertop", $pagertop);
$subsearchtpl->set("pagerbottom", $pagerbottom);
$r = do_sqlquery("SELECT s.id as id, s.name as name, s.pic as pic, s.imdb as imdb, s.author as author, s.uploader as uploader, s.file as file, s.framerate as framerate, s.cds as cds, s.downloaded as downloaded, s.hash as hash, s.flag as flag, c.flagpic as flagpic, c.name as country FROM {$TABLE_PREFIX}subtitles s LEFT JOIN {$TABLE_PREFIX}countries c ON s.flag=c.id WHERE s.name LIKE '%$src%' ORDER BY name $limit");
$subs = array();
$i = 0;

while ($row = mysqli_fetch_array($r))
{
    $up = $row['uploader'];
    $mss = do_sqlquery("SELECT username FROM {$TABLE_PREFIX}users WHERE id=$up LIMIT 1");
    $s = mysqli_fetch_array($mss,MYSQLI_NUM);
    $uploader = $s[0];
    if (is_null($row['author']))
    {
        $row['author'] = "Unknown";
    }
    $subs[$i][id] = (int)$row['id'];
    $subs[$i][pic] = "<img src=" . $row['pic'] . " alt=\"Extreme Subtitles\" width=\"61\" height=\"90\" border=\"0\" />";
    $subs[$i][imdb] = "<a href=\"" . $row['imdb'] . "\" target=\"_blank\">" . $row['name'] .
        "</a>";
    $subs[$i][flagpic] = "<img src=\"images/flag/" . $row['flagpic'] . "\" alt=\"" .
        $row['country'] . "\" title=\"" . $row['country'] . "\">";
    $subs[$i][uploader] = "<a href=\"userdetails.php?id=" . $row['uploader'] . "\">$uploader</a>";
    $subs[$i][downloaded] = (int)$row['downloaded'];
    $subs[$i][framerate] = $row['framerate'];
    $subs[$i][cds] = $row['cds'];
    $subs[$i][author] = $row['author'];
    $subs[$i][dl] = "<a href=\"subtitle_download.php?id=" . $row['id'] . "\"><img src=images/download.gif alt=download title=download></a>";
    if ($CURUSER['edit_torrents'] == "yes")
    {
        $subs[$i][del] = "<a href=\"subtitle_del.php?do=del&id=" . $row['id'] . "\"><img src=" .
            $STYLEURL . "/images/delete.png alt=delete title=delete></a>";
    }
    if ($CURUSER == $row['uploader'] || $CURUSER['edit_torrents'] == "yes")
    {
        $subs[$i][ed] = "<a href=\"index.php?page=subedit&action=edit&id=" . $row['id'] .
            "\"><img src=" . $STYLEURL . "/images/edit.png alt=delete title=edit></a>";
    }
    $i++;
}
$tds = " </center></td>
    </tr>";
$endsubs = "</table>";
$subsearchtpl->set("subs", $subs);
$subsearchtpl->set("subadd", $subadd);
$subsearchtpl->set("tds", $tds);
$subsearchtpl->set("endsubs", $endsubs);
//by CobraCRK 21.07.2006 - www.extremeshare.org - cobracrk@yahoo.com
//converted to xbtit by cooly

?>