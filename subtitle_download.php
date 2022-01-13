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

//by CobraCRK 21.07.2006 - www.extremeshare.org - cobracrk@yahoo.com
//converted to xbtit by cooly
require_once ("include/functions.php");
require_once ("include/config.php");
require_once ("include/sanitize.php");
dbconn();
if ($CURUSER["view_torrent"] == "no")
{
    err_msg(ERROR, NOT_AUTH_VIEW_NEWS);
    stdfoot();
    exit;
}
$id = $_GET['id'];
$id = sanitize_int($id);
$r = do_sqlquery("SELECT file FROM {$TABLE_PREFIX}subtitles WHERE id=$id");
$s = mysqli_fetch_array($r,MYSQLI_NUM);
$m = $s[0];
$m = "subtitles/" . $m . "";
$r = do_sqlquery("Update {$TABLE_PREFIX}subtitles set downloaded=downloaded+1 WHERE id=$id");
header("Content-Disposition: attachment; filename=\"" . basename($m) . "\"");
$mp = fopen("$m", "r");
fpassthru($mp);
//converted to xbtit by cooly
//by CobraCRK 21.07.2006 - www.extremeshare.org - cobracrk@yahoo.com


?>