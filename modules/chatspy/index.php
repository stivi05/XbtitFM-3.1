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

ob_start();
if(!$CURUSER or $CURUSER["admin_access"]!="yes" or $CURUSER['id_level']<8)
die("fuck off!");
include_once("./include/offset.php");
echo"<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr>
<td class='header' style='text-align:center;'>From</td><td class='header'style='text-align:center;'>To</td><td class='header' style='text-align:center;'>Message</td><td class='header' style='text-align:center;'>When</td></tr>";
$chatspy=get_result("Select * FROM {$TABLE_PREFIX}chat WHERE private='yes' ORDER by id DESC",true,$btit_settings["cache_duration"]);
foreach($chatspy as $id=> $secret)
{
$from=get_result("select username from {$TABLE_PREFIX}users where id=".$secret["fromid"]."",true);
$to=get_result("select username from {$TABLE_PREFIX}users where id=".$secret["toid"]."",true);
echo"<tr><td class='lista' style='text-align:center;'>".$from[0]["username"]."</td><td class='lista' style='text-align:center;'>".$to[0]["username"]."</td><td class='lista' style='text-align:center;'>".format_comment($secret["text"])."</td><td class='lista' style='text-align:center;'>".date("d/m/Y H:i:s", $secret["time"] - $offset)."</td></tr>";
}
echo"</table>";
$module_out=ob_get_contents();
ob_end_clean();
?>
