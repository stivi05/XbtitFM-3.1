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
require_once("include/functions.php");
require_once("include/smilies.php");
dbconn(false);


$action = isset($_GET["action"])?htmlspecialchars($_GET["action"]):$action='';

function smile() {

  print "<div align='center'><table cellpadding='1' cellspacing='1'><tr>";

  global $smilies, $count;
  reset($smilies);

  foreach ($smilies as $code => $url) {
     if ($count < 16) {
        print("\n<td><a href=\"javascript: SmileIT('".str_replace("'","\'",$code)."')\">
               <img border=\"0\" src=\"images/smilies/$url\" alt=\"$code\" /></a></td>");
               
        $count++;
  }

  print "</tr></table></div>";

}


//get current style
  $resheet=get_result("SELECT `style_url` FROM `{$TABLE_PREFIX}style` WHERE `id`=".$CURUSER["style"]."",true,$btit_settings["cache_duration"]);
if (!$resheet)
   {

   $STYLEPATH="$THIS_BASEPATH/style/xbtitFM";
   $STYLEURL="$BASEURL/style/xbtitFM";
}
else
    {
        $resstyle=$resheet[0];
        $STYLEPATH="$THIS_BASEPATH/".$resstyle["style_url"];
        $STYLEURL="$BASEURL/".$resstyle["style_url"];
}



if (isset($_GET['del'])){

	if (is_numeric($_GET['del'])){
		$query = "SELECT * FROM {$TABLE_PREFIX}chat WHERE id=".$_GET['del'] ;
		$result = mysqli_query($GLOBALS['conn'], $query);
	}else{
		echo "invalid msg id STOP TRYING TO INJECT SQL";
		exit;
	}

	$row = mysqli_fetch_row($result);
		
	if ($CURUSER["id"] != $row["uid"]){	
		$query = "DELETE FROM {$TABLE_PREFIX}chat WHERE id=".$_GET['del'];
		write_log("<B><font color=orange>Shout Deleted: </font> Deleted by   ".$CURUSER['username']."</b>");
		mysqli_query($GLOBALS['conn'], $query);
                 ?><html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $STYLEURL;?>/main.css" />
</head>
<?php 
 sleep(2);               
 echo"
<body onload=\"window.close();\" bgcolor=black>"
;

echo"<center><h1>Success<br>Message saved!</center></h1>
</body>
</html>";
exit();	
	}
}


if (substr($action, 0, 4)=="edit"){ 
	$msgid = $_GET["msgid"];
	
    $res = mysqli_query($GLOBALS['conn'], "SELECT * FROM {$TABLE_PREFIX}chat WHERE id=".$_GET['msgid']) or sqlerr();
	if (mysqli_num_rows($res) != 1)
		print("No message with ID $msgid.");
	$arr = mysqli_fetch_array($res);
   
    $save = (int)$_GET["save"];
    
    if ($save) {
		$message = $_POST['message'];
			if ($message == "")
				print("Error");
		$message = sqlesc($message);
 if ($arr && ($CURUSER["edit_users"]=="yes" OR $CURUSER["uid"] == $arr["uid"])){
		mysqli_query($GLOBALS['conn'], "UPDATE {$TABLE_PREFIX}chat SET text=$message WHERE id=".$_GET['msgid']) or sqlerr();
}else{
die("no way mofo!");
}
                ?><html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $STYLEURL;?>/main.css" />
</head>
<?php

                echo"
<body onload=\"window.close();\" bgcolor=black>";

echo"<center><h1>Success<br>Message saved!</center>
</body>
</html>";
sleep(2);
exit();
	}
	?><html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo $STYLEURL;?>/main.css" />
</head>
<body bgcolor=black text=white>
<?php
    
    print("<center><font size=3><b>Edit Message</b></font></center>\n");
    print("<form name=chatForm method=post  action=chatedit.php?action=edit&save=1&msgid=$msgid>\n");
    print("<center><table border=0 cellspacing=0 cellpadding=5>\n");
    print("<tr><td>\n");
    print("</td><td style='padding: 0px'><textarea name=message id=\"message\" cols=50 rows=10 >" .htmlspecialchars($arr["text"]) . "</textarea></td></tr>\n");
   
    smile();
    
    print("<tr><td align=center colspan=2><input type=submit value='Submit' class=btn></td></tr>\n");
    
    print("</table></center>\n");
    print("</form>\n");
?>
</body></html>
<?php    
}
?>
<script>
function SmileIT(smile){
    document.forms['chatForm'].elements['message'].value = document.forms['chatForm'].elements['message'].value+" "+smile+" ";  //this non standard attribute prevents firefox' autofill function to clash with this script
    document.forms['chatForm'].elements['message'].focus();
}

</script>

<?php
?>
