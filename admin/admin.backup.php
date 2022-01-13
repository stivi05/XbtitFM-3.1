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
if (!defined("IN_ACP"))
      die("non direct access!");

$action=isset($_GET["action"])?htmlentities($_GET["action"],ENT_QUOTES,"UTF-8"):$action='';
$admintpl->set("go",(($action == "NoW")?true:false), true);
$admintpl->set("conf",(($action == "conf")?true:false), true);
$admintpl->set("sftp",(($action == "export")?true:false), true);
$admintpl->set("lang",$language);
$admintpl->set("set.CBT_FILE_FROM",isset($_GET["file2send"])?htmlentities($_GET["file2send"],ENT_QUOTES,"UTF-8"):"");
if($action=="export_now" && $_SERVER["REQUEST_METHOD"]=="POST")
{

}
elseif($action=="export")
{
$admintpl->set("frmsf","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup&action=export_now");
$admintpl->set("bupath",$btit_settings["CBT_FILE_BACKUP_DIR"]);
$admintpl->set("redir","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup");
}
elseif($action=="conf")
{
$admintpl->set("set.CBT_FILE_BACKUP_DIR",$btit_settings["CBT_FILE_BACKUP_DIR"]);
$admintpl->set("frm","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup&action=conf_set");
}
elseif($action=="conf_set")
{
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$set=isset($_POST["CBT_FILE"])?mysqli_real_escape_string($GLOBALS['conn'],htmlentities($_POST["CBT_FILE"],ENT_QUOTES,"UTF-8")):$set='';
if($set!='')
do_sqlquery("UPDATE {$TABLE_PREFIX}settings SET `value`='".$set."' WHERE `key`='CBT_FILE_BACKUP_DIR'",true);
    foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
        unlink($filename);
redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup&action=conf");
}
}
elseif($action=="delete")
{
$file=isset($_GET["file"])?htmlentities($_GET["file"],ENT_QUOTES,"UTF-8"):$file='';
if(file_exists("".$btit_settings["CBT_FILE_BACKUP_DIR"]."".$file.".tar"))
{
@unlink("".$btit_settings["CBT_FILE_BACKUP_DIR"]."".$file.".tar");
}
redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup");
}
elseif($action=="NoW"){
$admintpl->set("redir","index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup");
$admintpl->set("bk","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=backup&amp;action=NoW#progress");
}else{
if (is_writable($btit_settings["CBT_FILE_BACKUP_DIR"]))
{
$dir = opendir ($btit_settings["CBT_FILE_BACKUP_DIR"]);
	    $Files=array();
	    $F=0; 
while (false !== ($file = readdir($dir))) { 

	// Print the filenames that have .tar extension
	if (strpos($file,'.tar',1)) { 

	// Get time and date from filename
	$date = substr($file, 9, 10);
	$time = substr($file, 20, 8);

	// Remove the sql extension part in the filename
	$filename = str_replace('.tar', '', $file);
                     

		$Files[$F]["name"]=($filename . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $date . " - " . $time . "");
		$Files[$F]["zip"]="<a href='".$btit_settings["CBT_FILE_BACKUP_DIR"]."" . $filename . ".tar' class='view'>".$language["DOWNLOAD"]."</a>";
		$Files[$F]["delete"]="<a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup&action=delete&file=" . $filename . "' class='delete'>".$language["DELETE"]."</a></td>";
		$Files[$F]["send"]="<a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=backup&action=export&file2send=" . $filename . ".tar' class='delete'>".$language["ACP_BUINFO_S"]."</a></td>";
		$F++;
	} 
}
}
if (is_writable($btit_settings["CBT_FILE_BACKUP_DIR"])) {

} else {
    $admintpl->set('alert','<span style="color:red;">The folder <b>'.$btit_settings["CBT_FILE_BACKUP_DIR"].'</b> is not writable!</span><br />');
}
if (is_writable("backup_tmp")) {

} else {
    $admintpl->set('alert2','<span style="color:red;">The folder <b>backup_tmp</b> is not writable!</span><br />');
}    
$admintpl->set("file",$Files);
$admintpl->set("bk","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=backup&amp;action=NoW#progress");
$admintpl->set("s2","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=backup&amp;action=export");
$admintpl->set("cf","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=backup&amp;action=conf");
}
?>