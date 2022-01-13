<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// ACP Login ( BTI Fatepower )  for XBTIT DiemThuy - June 2009
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

global $BASEURL,$btit_settings;

$LOGIN_INFORMATION = array(
    $btit_settings["un1"] => $btit_settings["pw1"],
    $btit_settings["un2"] => $btit_settings["pw2"]
);

define('TIMEOUT_MINUTES', 20);
define('TIMEOUT_CHECK_ACTIVITY', true);

// show usage example
if(isset($_GET['help'])) {
  die('Include following code into every page you would like to protect, at the very beginning (first line):<br>&lt;?php include("' . str_replace('\\','\\\\',__FILE__) . '"); ?&gt; ');
}

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
require_once ("include/functions.php");
  setcookie("verify", '', $timeout, '/'); // clear password;
//  header('Location: ' . LOGOUT_URL);
	redirect($BASEURL);
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {

        stderr("Admin Login","

<html>
<head>
  <META HTTP-EQUIV=CACHE-CONTROL CONTENT=NO-CACHE>
  <META HTTP-EQUIV=PRAGMA CONTENT=NO-CACHE>
</head>
<body>
  <style>
    input { border: 1px solid black; }
  </style>
<table align=center cellpadding=2 cellspacing=2 border=1 width=90%>
<tr>
<td align=center class=lista>
  <form method=post>

	<div><center><font color=purple><b>
	You are now entering a page that needs extra login details. Be sure
	that you are entering the correct information</b></center></font></div>
</td>
</tr>
</table>
    <br><div align=center><font color=red size=3><b>".$error_msg."</b></font></div><br>
<table align=center class=lista border=0 cellpadding=10>
<tr>
<td class=embedded>
<h2><center>Login Form</center></h2>
<table align=center class=lista border=0 cellpadding=10>
<tr>
<td align=right class=header>Username:</td><td class=lista><input type=input name=access_login size=40 /></td></tr>
<tr>
<td align=right class=header>Password:</td>
<td class=lista><input type=password name=access_password size=42 /></td>
</tr>
<tr>
<td align=left class=header>Submit :</td>
<td align=left class=lista><center><input type=submit name=Submit value=Enter /></center></td>
</tr>
</table>
</table>
  </form>
  <br>
  </div>
</body>
</html>

<?php
 ");
        stdfoot();
        exit();

// stop at this point
  die();
}
}
// user provided password
if (isset($_POST['access_password'])) {

  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) )
  ) {
    showLoginPasswordProtect("Incorrect password.");
  }
  else {
    // set cookie if password was validated
    setcookie("verify", md5($login.'%'.$pass), $timeout, '/');

    // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
    // So need to clear password protector variables
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }
}
else {

  // check if password cookie is set
  if (!isset($_COOKIE['verify'])) {
    showLoginPasswordProtect("");
  }
  // check if cookie is good
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['verify'] == md5($lp)) {
      $found = true;
      // prolong timeout
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("verify", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
    showLoginPasswordProtect("");
  }
}
?>
