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
require dirname(__FILE__)."/include/functions.php";
dbconn();
global $CURUSER, $BASEURL, $TABLE_PREFIX;
$read=get_result("SELECT * from `{$TABLE_PREFIX}users` where `id`=".$CURUSER["uid"],true);
if ($CURUSER["uid"]>1 && $read[0]["announce_read"] == "no" && $arr = announcement($read[0]["announce_read"])) {

$alert='

<script type="text/javascript" src="'.$BASEURL.'/jscript/announcement.js"></script>

<script type="text/javascript" src="'.$BASEURL.'/jscript/preview.js"></script>

<!-- annoucement start #'.$arr["id"].' -->

<div id="dropin" align="center" style="position:absolute;visibility:hidden;top:0px;overflow:hidden;padding-bottom:10px;">

<table border="0" cellpadding="0" cellspacing="0" width="650">

<tr><td class="header" style="padding: 2px 0 0 10px;">

<b>Title:</b> '.$arr["subject"].' -- <b>Created on"</b> '.$arr["added"].' -- <b>By:</b> '.$arr["by"].'</b></td>

<td width="16px" align="right" class="header" style="padding: 0 10px 0 0;"><a href="#" onClick="dismissbox();return false"><img src="./images/close.jpg" border="0"></a></td></tr>

<tr><td colspan="2" class="main" width="650" style="padding: 0 10px 10px 10px;">

<p>

'.format_comment($arr["message"]).'

</p>

<center><img id="loading" style="visibility: hidden;width:30px;height:30px;" src="./images/load.gif">

<span style="color:red;" name="preview" id="previewr" align="left" valign="top">

<a href="#" onclick="javascript:clearannouncement(this.parentNode,\''.$BASEURL.'/clear_ann.php?uid='.$read[0]["announce_read"].'\')">Click here to mark announcement read.</a>

</span></center>

</td></tr></table>

</div>

<!-- annoucement end #'.$arr["id"].'-->

<span id="new_ann" style="visibility: visible;"><table border="0" cellspacing="0" cellpadding="10" bgcolor="red" width="98%" align="center"><tr><td style="padding: 10px; background: red;" align="center">

<b><font color="white">New announcement! </font><a href="javascript:show_announcement()"><font color="white">Please <u>click here</u> to read!</font></a></b></td></tr></table></span><br />

';
}else{ $alert='';}
echo $alert;
?>
