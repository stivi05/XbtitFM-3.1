<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  Btiteam
//
//    This file is part of xbtit DT FM.
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

dbconn(false);

function smile() {

  print "<div align=\"center\"><table cellpadding=\"1\" cellspacing=\"1\"><tr>";

  global $smilies, $count , $BASEURL;
  reset($smilies);

  while ((list($code, $url) = each($smilies)) && $count<16) {
        print("\n<td><a href=\"javascript: SmileIT('".str_replace("'","\'",$code)."')\">
               <img border=\"0\" src=\"$BASEURL/images/smilies/$url\" alt=\"$code\" /></a></td>");
               
        $count++;
  }
  
  print "</tr></table></div>";

}
$action = $_GET["action"];

if ($action=="edit"){ 
	$msgid = $_GET["msgid"];
	
    $res = mysqli_query($GLOBALS['conn'], "SELECT * FROM {$TABLE_PREFIX}chatfun WHERE msgid=".$_GET['msgid']) or sqlerr();
	if (mysqli_num_rows($res) != 1)
		print("No message with ID $msgid.");
	$arr = mysqli_fetch_assoc($res);
    if ($CURUSER["uid"] != $arr["userid"])
		print("Error");
    $save = (int)$_GET["save"];
    if ($save) {
		$message = $_POST['message'];
			if ($message == "")
				print("Error");
		$message = sqlesc($message);
		mysqli_query($GLOBALS['conn'], "UPDATE {$TABLE_PREFIX}chatfun SET message=$message WHERE msgid=".$_GET['msgid']) or sqlerr();
                echo("<center><h1>Success<br>Message saved!");
                redirect("$BASEURL/chatter.php");
	}
    echo "<script src=\"$BASEURL/ajaxchat/scripts.js\" language=\"JavaScript\" type=\"text/javascript\"></script>";
    print("<center><font size=\"3\"><b>Edit Message</b></font></center>\n");
    print("<form name=\"chatForm\" method=\"post\" action=\"$BASEURL/shoutedit.php?action=edit&save=1&msgid=$msgid\">\n");
    print("<center><table border=\"0\" cellspacing=\"0\" cellpadding=\"5\">\n");
    print("<tr><td>\n");
    print("</td><td style=\"padding: 0px;\"><textarea name=\"message\" id=\"chatbarText\" cols=\"50\" rows=\"10\">" .htmlspecialchars($arr["message"]) . "</textarea></td></tr>\n");
    smile();
    print("<tr><td align=\"center\" colspan=\"2\"><input type=\"submit\" value=\"Submit\" class=\"btn\"></td></tr>\n");
    print("<tr><td align=\"center\" colspan=\"2\"><input type=\"submit\" name=\"confirm\" value=\"Cancel\"></td></tr>\n");
    print("</table></center>\n");
    print("</form>\n");
    
}


?>