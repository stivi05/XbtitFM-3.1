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
$HERE=dirname(__FILE__);
require_once("$HERE/include/functions.php");
require_once("$HERE/fun.php");
dbconn(false);

global $CURUSER, $SITEURL, $BASEURL;

if ( ($CURUSER['edit_torrents'] >= "yes") || ($CURUSER['username'] == $row['user']) )
{



 function smile() {

    print "<div align='center'><table cellpadding='1' cellspacing='1'><tr>";

    global $smilies, $count;
    reset($smilies);

    while ((list($code, $url) = each($smilies)) && $count<16) {
          print("\n<td align=center><a href=\"javascript: SmileIT('".str_replace("'","\'",$code)."')\">
                <img border=\"0\" src=\"images/smilies/$url\" alt=\"$code\" /></a></td>");
               
          $count++;
    }
  
    print "</tr></table></div>";
  }               


//DELETE MESSAGES
if (isset($_GET['del'])){

	if (is_numeric($_GET['del'])){
		$query = "SELECT * FROM {$TABLE_PREFIX}chatfun WHERE msgid=".$_GET['del'] ;
		$result = mysqli_query($GLOBALS['conn'], $query);
	}else{
		echo "invalid msg id STOP TRYING TO INJECT SQL";
		exit;
	}

	$row = mysqli_fetch_row($result);
		
	if ( ($CURUSER['edit_torrents'] >= "yes") || ($CURUSER['username'] == $row['user']) )
{	
		$query = "DELETE FROM {$TABLE_PREFIX}chatfun WHERE msgid=".$_GET['del'] ;
		write_log("<B><font color=orange>Shout Deleted: </font> Deleted by   ".$CURUSER['username']."</b>");
		mysqli_query($GLOBALS['conn'],$query);	
	}
}
if (isset($_GET['empty'])){
@mysqli_query($GLOBALS['conn'], "TRUNCATE {$TABLE_PREFIX}chatfun");
}
include("include/offset.php");
//INSERT MESSAGE
$_POST['message'] = str_replace("\'","'",$_POST['message']);
$_POST['message'] = str_replace("'","\'",$_POST['message']);
$_POST['message'] = str_replace("---"," - - ",$_POST['message']);
if ($_POST['message'] > ''){	
	if (isset($CURUSER)){	
		$query = "SELECT COUNT(*) FROM {$TABLE_PREFIX}chatfun WHERE message='".$_POST['message']."' AND user='".$CURUSER['username']."' AND UNIX_TIMESTAMP()-UNIX_TIMESTAMP(time) < 30";
		$result = mysqli_query($GLOBALS['conn'], $query);
		$row = mysqli_fetch_row($result);

		if ($row[0] == '0') {
			$query = "INSERT INTO {$TABLE_PREFIX}chatfun (msgid, user, message, time, userid) VALUES (NULL, '".$CURUSER['username']."', '".($_POST['message'])."', '".time()."', '".$CURUSER['uid']."')";
			mysqli_query($GLOBALS['conn'], $query);
		}
	}
}

//get the current theme

/*  
$resheet=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}style where id=".$CURUSER["style"]."");
if (!$resheet)
   {

   $STYLEPATH="$THIS_BASEPATH/style/xbtitFM";
   $STYLEURL="$BASEURL/style/xbtitFM";
}
else
    {
        $resstyle=mysqli_fetch_array($resheet);
        $STYLEPATH="$THIS_BASEPATH/".$resstyle["style_url"];
        $STYLEURL="$BASEURL/".$resstyle["style_url"];
}

$style_css=load_css("main.css");
*/
?>

<HTML>
<HEAD>
<TITLE>Shoutbox</TITLE>
<META HTTP-EQUIV="refresh" content="300">
<link rel="stylesheet" type="text/css" href="<?php echo $STYLEURL;?>/main.css" />

</HEAD>
<body class="shoutbox_body">

<?php

if(!isset($_GET['history'])){ 
	echo '<div class="shoutbox_contain"><table border="0" background="#ffffff" style="width: 99%; table-layout:fixed">';
}else{
	
	
	echo '<div class="shoutbox_history">';

	$query = "SELECT COUNT(*) FROM {$TABLE_PREFIX}chatfun";
	$result = mysqli_query($GLOBALS['conn'], $query);
	$row = mysqli_fetch_row($result);
	echo '<div align="middle">Pages: ';
	$pages = round($row[0] / 100) + 1;
	$i = 1;
	while ($pages > 0){
		echo "<a href='".$SITEURL."/shoutbox/shoutbox.php?history=1&page=".$i."'>[".$i."]</a>&nbsp;";
		$i++;
		$pages--;
	}

	echo '</div></br><table border="0" background="#ffffff" style="width: 99%; table-layout:fixed">';
}

if (isset($_GET['history'])) {
	if (isset($_GET['page'])) {
		if($_GET['page'] > '1') {
			$lowerlimit = $_GET['page'] * 100 - 100;
			$upperlimit = $_GET['page'] * 100;
		}else{
			$lowerlimit = 0;
			$upperlimit = 100;
		}
	}else{
		$lowerlimit = 0;
		$upperlimit = 100;
	}	
	$query = "SELECT * FROM {$TABLE_PREFIX}chatfun ORDER BY msgid DESC LIMIT ".$lowerlimit.",".$upperlimit;
}else{
	$query = "SELECT * FROM {$TABLE_PREFIX}chatfun ORDER BY msgid DESC LIMIT 10";
}


$result = mysqli_query($GLOBALS['conn'], $query);
$alt = false;

while ($row = mysqli_fetch_array($result)) {
	if ($alt){	
		echo '<tr class="shoutbox_noalt">';
		$alt = false;
	}else{
		echo '<tr class="shoutbox_alt">';
		$alt = true;
	}


	echo '<td style="font-size: 9px; width: 118px;">';
	echo "<div align='left' style='float: left'>";
        $time = $row['time'];
	echo date("d/m/Y H:i:s", $time - $offset);
	$bimg2 = @mysqli_fetch_array(@mysqli_query($GLOBALS['conn'], "SELECT avatar FROM {$TABLE_PREFIX}users  WHERE id=$row[userid]"));
    $avatar = htmlspecialchars($bimg2["avatar"]);
    if (!$avatar)
           $avatar = "".$STYLEURL."/images/default_avatar.gif";
      echo '<center><img src="'.$avatar.'" width="50px"/></center>';
        
	echo "</div>";
$colors = @mysqli_fetch_array(@mysqli_query($GLOBALS['conn'],"SELECT ul.prefixcolor, ul.suffixcolor FROM {$TABLE_PREFIX}users u LEFT JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE u.id=$row[userid]"))or sqlerr();


	if ( ($CURUSER['edit_torrents'] >= "yes") || ($CURUSER['username'] == $row['user']) )
{

		echo '<div align="right" style="float: right"><a href="'.$BASEURL.'/chatter.php?del='.$row['msgid'].'" style="font-size: 8px"><img src="'.$BASEURL.'/images/delete.png"></a>&nbsp;<a href="'.$BASEURL.'/shoutedit.php?action=edit&msgid='.$row['msgid'].'" style="font-size: 8px"><img src="'.$BASEURL.'/images/edit.png"></a><div>';
	}

$name=stripslashes($colors['prefixcolor']) . $row['user'] .stripslashes($colors['suffixcolor']);
	echo	'</td><td style="font-size: 12px; padding-left: 5px"><a href="'.$SITEURL.'/index.php?page=userdetails&id='.$row['userid'].'" target="_parent"><b>'.$name.':</b></a>&nbsp;&nbsp;'.nl2br(format_shout($row['message']));
	echo	'</td></tr>';
}
?>

</table>
</div>
<br>

<?php

//if the user is logged in, show the shoutbox, if not, dont.
if(!isset($_GET['history'])) {
	if (isset($CURUSER)){
                echo"<script language=javascript>

function GiveMsgBoxFocus()
{
document.shoutboxform.message.focus();
}
function PopMoreSmiles(form,name) {
         newWin=window.open('./index.php?page=moresmiles&form='+form+'&text='+name,'moresmile','height=500,width=450,resizable=yes,scrollbars=yes');
         if (window.focus) {newWin.focus()}
}
function ShowHistory() {
  var HistoryWindow = window.open('$BASEURL/chatter.php?history=1', 'History','width=600,height=600,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no');
}
</script>";
                
		echo "<form name='shoutboxform' action='".$BASEURL."/chatter.php' method='post'>";
		echo "<CENTER><table width=100% border=0 cellpadding=1 cellspacing=1>";
		echo "<tr class='shoutbox_messageboxback'>";
		echo "<td width='80%' align=center>";
		echo "<input type='text' size='45' maxlength='500' name='message' class='shoutbox_msgbox'>";
		echo "</td>";
		echo "<td>";
		echo "<input type='submit' name='submit' value='Shout' class='shoutbox_shoutbtn'>";
		echo "</td>";
		echo "<td>";
                echo "<a title=Refresh href='".$BASEURL."/chatter.php'><img border=0 src='".$BASEURL."/images/bbcode/Refresh.png' alt='refresh'></a>";
		echo "<a title=Smiles href=\"javascript: PopMoreSmiles('shoutboxform','message')\"><img border='0' src='".$BASEURL."/images/smile.gif' alt='smiles'></a>";
		echo "<a title=History href=\"javascript: ShowHistory();\"><img border='0' src='".$BASEURL."/images/quote.gif' alt='history'></a>";
		echo "<a title=Empty href=\"chatter.php?empty\"><img border='0' src='".$BASEURL."/images/delete.png' alt='empty'></a>";
		echo "</td>";
		echo "</tr>";
		echo "</table></CENTER>";
                echo "<br><CENTER>";
                shoutfun('shoutboxform','message');
                echo "</CENTER>";
		echo "</form>";
	}else{
		echo "<br /><div class='shoutbox_error'>You must login to shout.</div>";
	}
}

if(!isset($_GET['history'])){ 
	echo "</BODY></HTML>";
}else{
	
	
}

}else{
echo("<center><font color=orangered><b>Only Staff can access here!</b></font>");
}



?>
