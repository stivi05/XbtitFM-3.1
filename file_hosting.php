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
if (!defined("IN_BTIT"))
      die("non direct access!");
 require (load_language("lang_file_hosting.php"));
 $GLOBALS["FHostLimitPerPage"] = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($CURUSER["id_level"] < $btit_settings["fhost_level_upload"]) {
        stderr("Error",$language["ERROR6"]);
        stdfoot();
        die;
        
    }
   $file = $_FILES['file'];
   $types= Array ("srt/plain", "application/x-zip-compressed", "image/jpeg", "image/gif", "image/pjpeg", "image/png", "image/jpg", "video/mp4", "video/avi", "audio/mp3");

   // check allowed type files (see above) 
   if (!in_array($file['type'],$types)) {
        stderr("Error",sprintf($language["TYPE_NOT_ALLOWED"],$file['type']));
        stdfoot();
        die;
   } 

   if ((!$file) || ($file["size"] == 0) || ($file["name"] == "") || ($file["size"]>$btit_settings["fhost_file_limit"]))
     {
       stderr("Error", "".$language["ERROR1"]."" . makesize($btit_settings["fhost_file_limit"]));
       stdfoot();
       die;
     }

     #security suite#
            $check_file = check_upload($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
            switch($check_file)
            {
                case 1:
                case 2:
                    $check_file_err = $language["ERR_MISSING_DATA"];
                    if(file_exists($_FILES["file"]["tmp_name"]))
                        @unlink($_FILES["file"]["tmp_name"]);
                    break;
                case 3:
                    $check_file_err = $language["QUAR_TMP_FILE_MISS"];
                    break;
                case 4:
                    $check_file_err = $language["QUAR_OUTPUT"];
                    break;
                case 5:
                default:
                    $check_file_err = "";
                    break;
            }
            if($check_file_err != "")
            {
                stderr($language["ERROR"], $check_file_err);
        }
        #security suite#
   if (file_exists("$FILE_HOSTINGPATH/$file[name]"))
   {
    stderr("Error", "".$language["ERROR2A"]."$file[name]".$language["ERROR2B"]."");
    stdfoot();
    die;
   }

   $title = trim($_POST["title"]);
   if ($title == "")
   {
     $title = substr($file["name"], 0, strrpos($file["name"], "."));
     if (!$title)
       $title = $file["name"];
   }

   $r = do_sqlquery("SELECT id FROM {$TABLE_PREFIX}file_hosting WHERE title=" . sqlesc($title),true);
   if (mysqli_num_rows($r) > 0)
     {
       stderr("Error", "".$language["ERROR3A"]."" . htmlspecialchars($title) . "".$language["ERROR3B"]."");
       stdfoot();
       die;
     }

   $url = $_POST["url"];

if ($url != "")
   {
     if (substr($url, 0, 7) != "http://" && substr($url, 0, 6) != "ftp://")
     {
      stderr("Error", "".$language["ERROR4A"]."" . htmlspecialchars($url) . "".$language["ERROR4B"]."");
      stdfoot();
      die;
     }
   }

if (!move_uploaded_file($file["tmp_name"], "$FILE_HOSTINGPATH/$file[name]"))
 {
   stderr("Error", "".$language["ERROR5"]."");
   stdfoot();
   die;
 }

   setcookie("file_hostingurl", $url, 0x7fffffff);

   $title = sqlesc($title);
   $filename = sqlesc($file["name"]);
   $added = sqlesc(get_date_time());
   $uppedby = $CURUSER["uid"];
   $size = $file["size"];
   $url = sqlesc($url);

   if (($size < $btit_settings["fhost_file_limit"]) && ($size != 0))
   do_sqlquery("INSERT INTO {$TABLE_PREFIX}file_hosting (title, filename, added, uppedby, size, url) VALUES($title, $filename, NOW(), $uppedby, $size, $url)",true);

   header("Location: $BASEURL/index.php?page=file_hosting");
   die();
}
//End POST


if ($CURUSER["id_level"] > 1 && isset($_GET["delete"])){
   $delete = (int)$_GET["delete"];
   if (is_valid_id($delete))
   {
    $r = do_sqlquery("SELECT filename,uppedby FROM {$TABLE_PREFIX}file_hosting WHERE id=$delete",true);
    if (mysqli_num_rows($r) == 1)
    {
         $a = mysqli_fetch_assoc($r);
      if ($CURUSER["admin_access"] == "yes" || $a["uppedby"] == $CURUSER["uid"])
      {
        do_sqlquery("DELETE FROM {$TABLE_PREFIX}file_hosting WHERE id=$delete",true);
        if (!unlink("$FILE_HOSTINGPATH/$a[filename]"))
        {
             stderr("Warning", "".$language["WARNIN1A"]."$a[filename]".$language["ERROR1B"]."");
             stdfoot();
             die;
        }
             header("Location: $BASEURL/index.php?page=file_hosting");
      }
    }
   }
}



if ($CURUSER["id_level"] < $btit_settings["fhost_level_download"]) {
    stderr("ERROR","".$language["ERROR6"]."");
    stdfoot();
    exit;
}


if (!isset($_GET["searchtext"])) $_GET["searchtext"] = "";
if (!isset($_GET["level"])) $_GET["level"] = "";

$search=$_GET["searchtext"];
$addparams="";
if ($search!="") {
    $where="WHERE title LIKE '%".mysqli_real_escape_string($GLOBALS['conn'],$_GET["searchtext"])."%'";
    $addparams="searchtext=$search";
}
else
 $where="";


$res = do_sqlquery("SELECT COUNT(*) FROM {$TABLE_PREFIX}file_hosting $where ORDER BY added DESC",true);
$scriptname=htmlspecialchars("index.php?page=file_hosting");
$row = mysqli_fetch_row($res);
$count = $row[0];
if ($addparams <> "")
    list($pagertop, $pagerbottom, $limit) = pager($fhost_page_limit, $count,  "index.php?page=file_hosting&" . $addparams . "&");
else
    list($pagertop, $pagerbottom, $limit) = pager($fhost_page_limit, $count,  "index.php?page=file_hosting&");

$file_hostingtpl=new bTemplate();
$file_hostingtpl->set("language", $language);
$file_hostingtpl->set("file_hosting_pagertop", $pagertop);

$res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}file_hosting $where ORDER BY added DESC $limit",true);
       $file_hostingloop=array();
       $i=0;
			 
$file_hostingtpl->set("fhost_title", $btit_settings["fhost_title"]);

if (mysqli_num_rows($res) == 0)
    $file_hostingtpl->set("no_files","<p align=center>".$language["NO_FILES"]."</p>");
 else
 {
    $file_hostingtpl->set("fhost1","<p><table class=main align=center style=\"border:0.5px inset #000; border-collapse: collapse; overflow:hidden;\" cellspacing=2 cellpadding=5>\n");
    
    $file_hostingtpl->set("fhost2","<tr><td class=header align=left><center>".$language["TITLE"]."</td><td class=header align=left><center>".$language["DATE"]."</td><td class=header align=left><center>".$language["TIME"]."</td><td class=header align=left><center>".$language["SIZE"]."</td>");
    $file_hostingtpl->set("fhost3","<td class=header align=left><center>".$language["HITS"]."</td><td class=header align=left><center>".$language["UPPED_BY"]."</td><td class=header align=left><center>".$language["PREVIEW"]."</td></tr>\n");


    $mod = $CURUSER["admin_access"] == "yes";
    
    while ($arr = mysqli_fetch_assoc($res)) {
        
        $r = do_sqlquery("SELECT u.username,u.id_level,ul.prefixcolor,ul.suffixcolor FROM {$TABLE_PREFIX}users u LEFT JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE u.id={$arr[uppedby]}",true);
        
        $a = mysqli_fetch_assoc($r);
        	
        $title = "<td valign=\"middle\" onMouseOver=\"this.className='post'\" onMouseOut=\"this.className='lista'\" style=\"padding:5px 10px 5px 10px;\"><a href=index.php?page=get_file_hosting&filename=".rawurlencode($arr["filename"])."><b>" . htmlspecialchars($arr["title"]) . "</b></a>" .
          ($mod || $arr["uppedby"] == $CURUSER["uid"] ? " <a href=index.php?page=file_hosting&delete=$arr[id]>&nbsp;&nbsp;<img src=\"images/fhost_delete.png\" border=\"0\" alt=\"".$language["FHOST_DELETE"]."\" title=\"".$language["FHOST_DELETE"]."\" />&nbsp;&nbsp;</a>" : "") ."</td>\n";
        
        $added = "<td>" . substr($arr["added"], 0, 10) . "</td><td class=lista>" . substr($arr["added"], 10) . "</td>\n";
        	
        $size = "<td style=\"overflow:auto;\">" . makesize($arr['size']) . "</td>\n";
        	
        $hits = "<td class=lista><center>" . number_format($arr['hits']) . "</td>\n";
        	
        $uppedby = "<td style=\"text-align:center;\"><a href=index.php?page=userdetails&id=$arr[uppedby]><b>$a[prefixcolor] $a[username] $a[suffixcolor]</b></a></td>\n";
        	
        $arr[filename] = rawurlencode("$arr[filename]");
        
        $URL_link="<td class=lista style=\"text-align:center;\"><a href=$FILE_HOSTINGPATH/$arr[filename] target=\"_blank\">&nbsp;<img src=\"images/fhost_view.png\" border=\"0\" alt=\"".$language["FHOST_VIEW"]."\" title=\"".$language["FHOST_VIEW"]."\" />&nbsp;</a></td>\n";
        	
        $file_hostingloop[$i]["fhost_info"]=("<tr>$title$added$size$hits$uppedby$URL_link</tr>\n");
        $i++;
        $file_hostingtpl->set("file_hostingloop",$file_hostingloop);
    }
    $file_hostingtpl->set("fhost4","</tr>
    <tr><td class=header></td><td class=header></td><td class=header></td><td class=header></td><td class=header></td><td class=header></td><td class=header></td></tr></table></p>\n");

 }
$file_hostingtpl->set("fhost5","</br>");

$file_hostingtpl->set("file_hosting_pagerbottom", $pagerbottom);
if ($CURUSER["id_level"] >= $btit_settings["fhost_level_upload"]){
    $url = $_COOKIE["file_hostingurl"];
    $maxfilesize = makesize($btit_settings["fhost_file_limit"]);
    
    if ($btit_settings["fhost_upload"]=="enabled") {
        $file_hostingtpl->set("fhost6","<form enctype=multipart/form-data method=post action=index.php?page=file_hosting>\n");
        $file_hostingtpl->set("fhost7","<table align=center border=0 cellspacing=0 cellpadding=5>\n");
        $file_hostingtpl->set("fhost8","<tr><td colspan=2><center>".$language["FILE"]."&nbsp;&nbsp;&nbsp;<input type=file name=file size=120><br>(".$language["MAXIMUM_FILE_SIZE"]." $maxfilesize.)</td></tr>\n");
        $file_hostingtpl->set("fhost9","<tr><td colspan=2><center>".$language["TITLE"]."&nbsp;&nbsp;&nbsp;<input type=text name=title size=60><br>(".$language["OPTIONAL"].")</td></tr>\n");
        $file_hostingtpl->set("fhost10","<tr><td colspan=2 align=center><input type=submit value='".$language["UPLOAD_FILE"]."' class=btn></td></tr>\n");
        $file_hostingtpl->set("fhost11","</table>\n");
        $file_hostingtpl->set("fhost12","</form>\n");
    } else {
        $file_hostingtpl->set("fhost6","");
        $file_hostingtpl->set("fhost7","");
        $file_hostingtpl->set("fhost8","");
        $file_hostingtpl->set("fhost9","");
        $file_hostingtpl->set("fhost10","");
        $file_hostingtpl->set("fhost11","");
        $file_hostingtpl->set("fhost12","");
    }
} else {
        $file_hostingtpl->set("fhost6","");
        $file_hostingtpl->set("fhost7","");
        $file_hostingtpl->set("fhost8","");
        $file_hostingtpl->set("fhost9","");
        $file_hostingtpl->set("fhost10","");
        $file_hostingtpl->set("fhost11","");
        $file_hostingtpl->set("fhost12","");
    
}
?>