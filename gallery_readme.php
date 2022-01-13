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
global $CURUSER, $btit_settings;

if(gallery_in())
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.3)" />
<link rel="stylesheet" href="<?php echo $BASEURL;?>/gallery/style/style.css" type="text/css" media="screen" />
	</head>
</html>
<?php

print("	<table class='main' border='0' cellpadding='0' cellspacing='0' width='100%'><tr><td class='embedded'>
		<table width='100%' border='1' cellspacing='0' cellpadding='10'>
		<tr><td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top' border='0' cellpadding='4' cellspacing='1' width='100%'>\n");
	echo'	<strong><center><font color="#ffffff">'.$SITENAME.' '.$language['gallery25'].'</font></center></strong>';

print("	<tr><td style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) repeat-x left top'>
		<table style='padding: 4px; background: url(gallery/images/mainbox_bg.jpg) left top' border='0' cellpadding='4' cellspacing='1' width='99%'>\n");

	echo '<table class="main" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td class="embedded">';
	echo '<table width="99%" border="1" cellspacing="0" cellpadding="10">';
	echo '<table style=\'padding: 4px; background: url(gallery/images/mainbox_bg.jpg) left top\' border="0" cellpadding="4" cellspacing="1" width="99%">';

	echo '<tr><td colspan="10" align="center">
		<FORM>
			<INPUT TYPE="button" VALUE="'.$language['gallery'].'"		ONCLICK="window.location.href=\'gallery.php\'">
			<INPUT TYPE="button" VALUE="'.$language['gallery2'].'" 	ONCLICK="window.location.href=\'gallery_upload.php\'">
			<INPUT TYPE="button" VALUE="'.$language['gallery4'].'"	ONCLICK="history.go(-1);return true;">
			<INPUT TYPE="button" VALUE="'.$language['gallery6'].'" 	ONCLICK="history.go(0)">
			<INPUT TYPE="button" VALUE="'.$language['gallery8'].'" 	ONCLICK="window.location.href=\'gallery_readme.php\'">
			<INPUT TYPE="button" value="'.$language['gallery10'].'"  	ONCLICK="window.close()">
		</FORM>
		</td></tr>';
echo '<tr><td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif)\' colspan="40"><center><strong>'.$language['gallery35'].'</strong></center></td></tr>';

echo '<tr><td width="100"><INPUT TYPE="button" VALUE="'.$language['gallery'].'"		ONCLICK="window.location.href=\'gallery.php\'"></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery1'].'</b></font></td></tr>';

echo '<tr><td width="100"><INPUT TYPE="button" VALUE="'.$language['gallery2'].'" 	ONCLICK="window.location.href=\'gallery_upload.php\'"></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery3'].'</b></font></td></tr>';

echo '<tr><td width="100"><INPUT TYPE="button" VALUE="'.$language['gallery4'].'&nbsp;&nbsp;&nbsp;&nbsp;" onClick="history.go(-1);return true;"></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery5'].'</b></font></td></tr>';

echo '<tr><td width="100"><INPUT TYPE="button" VALUE="'.$language['gallery6'].'&nbsp;&nbsp;" onClick="history.go(0)"></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery7'].'</b></font></td></tr>';

echo '<tr><td width="100"><INPUT TYPE="button" VALUE="'.$language['gallery8'].'" 	ONCLICK="window.location.href=\'gallery_readme.php\'"></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery9'].'</b></font></td></tr>';

echo '<tr><td width="100"><INPUT TYPE="button" value="'.$language['gallery10'].'&nbsp;&nbsp;&nbsp;&nbsp;" onclick="window.close()"></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery11'].'</b></font></td></tr>';

echo '<table style=\'padding: 4px; background: url(gallery/images/mainbox_bg.jpg) left top\' border="0" cellpadding="4" cellspacing="1" width="100%">';
echo '<tr><td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\' colspan="10"><center><strong><font color="#ffffff"><b>'.$language['gallery15'].'</b></font></strong></center></td></tr>';

echo '<tr><td width="100" align="center"><font color="#ffffff">'.$language['gallery37'].' </font></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery38'].'</b></font></td></tr>';

echo '<tr><td style=\'padding: 4px; background: url(gallery/images/cellpic3.gif) left top\' colspan="10"><center><strong><font color="#ffffff">'.$language['gallery16'].'</font></strong></center></td></tr>';

echo '<tr><td width="100" align="center"><font color="#ffffff">'.$language['gallery27'].'</font></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery40'].'</b></font></td></tr>';

echo '<tr><td width="100" align="center"><font color="#ffffff">'.$language['gallery28'].'</font></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery41'].'</b></font></td></tr>';

echo '<tr><td width="100" align="center"><font color="#ffffff">'.$language['gallery29'].'</font></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery42'].'</b></font></td></tr>';

echo '<tr><td width="100" align="center"><font color="#ffffff">'.$language['gallery30'].'</font></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery43'].'</b></font></td></tr>';

echo '<tr><td width="100" align="center"><font color="#ffffff">'.$language['gallery31'].'</font></td>';
echo '<td align="center"><font color="#ffffff"><b>'.$language['gallery44'].'</b></font></td></tr>';

echo '</table><br /><p>';

echo '<table class="main" border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td class="embedded">';
echo '<td style=\'padding: 5px; background: black\' align="center">'.$language['gallery20'].'</td></tr></table>';


}else{
ext_err_msg($language["OOPS"],$language["GRP"]);
}
?>