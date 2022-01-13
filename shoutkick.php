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
require $HERE."/include/functions.php";
dbconn();
global $CURUSER, $TABLE_PREFIX, $BASEURL;
if($CURUSER["edit_torrents"]!="yes")
die("I dont think so!");
$uid=isset($_GET["uid"])?intval(0+$_GET["uid"]):$uid=0;
$valid=mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'], "SELECT id FROM {$TABLE_PREFIX}users WHERE id=".$uid.""));
if($valid["id"]>0)
{
mysqli_query($GLOBALS['conn'], "UPDATE {$TABLE_PREFIX}users SET sbox='yes' WHERE id=".$valid["id"]."");
echo'<body bgcolor="black" text="white"><script type="text/javascript">
function closeWindow() {
setTimeout(function() {
window.close();
}, 2000);
}

window.onload = closeWindow();
</script>';
echo'<div style="text-align:center">User banned!<br><img border="0" src="'.$BASEURL.'/images/ban.gif"></div>';
}
else{
err_msg("bad id!");
}
?>
