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
require_once('include/functions.php');
dbconn(true);
require("./".load_gallery_lang("gallery_lang.php"));
global $CURUSER, $TABLE_PREFIX, $language, $btit_settings;
if(gallery_in())
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<title><?php echo $SITENAME;?></title>
<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.3)" />
<link rel="stylesheet" href="<?php echo $BASEURL;?>/gallery/style/style.css" type="text/css" media="screen" />
<script type="text/javascript">
var sitename="<?php echo htmlspecialchars($SITENAME);?>"
var baseurl="<?php echo htmlspecialchars($BASEURL);?>"
var dimagedir="<?php echo $BASEURL;?>/images"
var charset="<?php echo $charset;?>"
var requesturl="<?php echo htmlentities(urlencode($_SERVER['REQUEST_URI']));?>"
var bonus="<?php echo($CURUSER ? (int)$CURUSER['seedbonus'] : 'Login First');?>"
var username="<?php echo ($CURUSER ? $CURUSER['username'] : 'Guest');?>"
var userid="<?php echo ($CURUSER ? (int)$CURUSER['uid'] : 'Guest_'.rand(1000, 9999));?>"
var userip="<?php echo htmlspecialchars($_SERVER['REMOTE_ADDR']);?>"
</script>
<link type="text/css" rel="stylesheet" href="<?php echo $BASEURL;?>/jscript/floatbox/floatbox.css<?php echo '?v='.$tracker_version; ?>">
<script type="text/javascript" src="<?php echo $BASEURL;?>/jscript/floatbox/floatbox.js<?php echo '?v='.$tracker_version; ?>"></script>
            <script type="text/javascript">
                function borderit(which,color)
                {
                    if (document.all||document.getElementById)
                    {
                        which.style.borderColor=color
                    }
                }
            </script>
		</head>
	</html>
<script type="text/javascript" src="<?php echo $BASEURL;?>/jscript/tooltip.js<?php echo '?v='.$tracker_version; ?>"></script>
<?php



if ($CURUSER["edit_torrents"]=="yes")
	$delete = (int)$_GET["delete"];
if (is_valid_id($delete))
	{
		$r = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}gallery WHERE id=$delete",true);
if (mysqli_num_rows($r) == 1)
	{
		$a = mysqli_fetch_assoc($r);
if ($CURUSER["edit_torrents"]=="yes")
	{
		quickQuery("DELETE FROM {$TABLE_PREFIX}gallery WHERE id=$delete");

if (!unlink("gallery/$a[name]"))

	redirect("gallery.php",sprintf($language['gallery19']));

		}
	}
}


$res = do_sqlquery("SELECT count(*) FROM {$TABLE_PREFIX}gallery",true);
	$row = mysqli_fetch_array($res);
		$count = $row[0];
	$perpage = 10;
list($pagertop, $pagerbottom, $limit) = pager($perpage, $count, $_SERVER["PHP_SELF"] . "?out=" . $_GET["out"] . "&" );

print("	<table class='main' border='0' cellpadding='0' cellspacing='0' width='100%'><tr><td class='embedded'>
		<table width='100%' border='1' cellspacing='0' cellpadding='10'>
		<tr><td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top'>\n");
echo'	<strong><center><font color="#ffffff">'.$SITENAME.' '.$language['gallery16'].'</font></center></strong>';

print("	<tr><td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top'>
		<table style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) left top' border='0' cellpadding='4' cellspacing='1' width='100%'>\n");


	echo '<tr><td align="center">
			<FORM>
			<INPUT TYPE="button" VALUE="'.$language['gallery'].'"		ONCLICK="window.location.href=\'gallery.php\'">
			<INPUT TYPE="button" VALUE="'.$language['gallery2'].'" 	ONCLICK="window.location.href=\'gallery_upload.php\'">
			<INPUT TYPE="button" VALUE="'.$language['gallery4'].'"	ONCLICK="history.go(-1);return true;">
			<INPUT TYPE="button" VALUE="'.$language['gallery6'].'" 	ONCLICK="history.go(0)">
			<INPUT TYPE="button" VALUE="'.$language['gallery8'].'" 	ONCLICK="window.location.href=\'gallery_readme.php\'">
			<INPUT TYPE="button" value="'.$language['gallery10'].'"  	ONCLICK="window.close()">
			</FORM>
		  </td></tr>';

echo "<tr><td align=center>".$pagertop."</td></tr>";

	$res = do_sqlquery("SELECT added, id, owner, name FROM {$TABLE_PREFIX}gallery ORDER BY added DESC $limit",true);


if (mysqli_num_rows($res) == 0)
	echo'<p><strong><center>'.$language['gallery26'].'</center></strong><p>';
else
	{
		$mod = $CURUSER["edit_torrents"]=="yes";

print("<table style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) left top' border='1' cellpadding='4' cellspacing='1' width='100%'>\n");
echo '<tr><td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\'  align="center" width="25%"><strong><center>'.$language['gallery27'].'</center></strong></td>
<td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\'  align="center" width="25%"><strong><center>'.$language['gallery28'].'</center></strong></td>
<td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\'  align="center" width="25%"><strong><center>'.$language['gallery29'].'</center></strong></td>
<td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\'  align="center" width="25%"><strong><center>'.$language['gallery30'].'</center></strong></td>
<td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\'  align="center" width="25%"><strong><center>'.$language['gallery31'].'</center></strong></td>';
print("" .($mod ? "<td style='padding: 4px; background: url(gallery/images/cellpic3.gif) left top' align='center' width='25%'><strong><center>".$language['gallery32']."</center></strong></td>" : ""). "</tr>\n");

while ($arr = mysqli_fetch_assoc($res))
	{
		$r2 = do_sqlquery("SELECT username FROM {$TABLE_PREFIX}users WHERE id=$arr[owner]",true);
			$a2 = mysqli_fetch_assoc($r2);
				$date = substr($arr['added'], 0, strpos($arr['added'], " "));
			$time = substr($arr['added'], strpos($arr['added'], " ") + 1);
		$name = $arr["name"];
			$url = str_replace(" ", "%20", htmlspecialchars($btit_settings["gallery_pth"]."/$name"));

print("<tr bgcolor=$bgcolor><td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' align='center' width='25%'><font color='#ffffff'>$date</font></td>
<td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' align='center' width='25%'><font color='#ffffff'>$time</font></td>
<td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' align='center' width='25%'><userdetails.php?id=$arr[owner]><b><font color='#ffffff'>$a2[username]</font></b></td>

<td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' align='center'>
<a href='$url' border='0' onMouseover=\"ddrivetip('".$language["gallery34"]."', 300)\"; onMouseout=\"hideddrivetip()\">
<font color='#ffffff'>$name</font></a></td>

<td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' class='tcat' width='25%'><a href=$url rel='gallery.group'><img src='$url' width='75' height='75' alt='$name' title=$name class='borderimage' onmouseover=\"borderit(this,'black')\" onmouseout=\"borderit(this,'white')\" /></a></td>
" .($mod ? "<td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' width='25%'><form><INPUT TYPE='button' VALUE=".$language['gallery33']."	ONCLICK=\"window.location.href='?delete=$arr[id]'\"></a></form></td>" : ""). "</tr>\n");

	}

print("</tbody></table>");

	}
echo "<center>".$pagerbottom."</center>";
}else{
ext_err_msg($language["OOPS"],$language["GRP"]);
}
?>