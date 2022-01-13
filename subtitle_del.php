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
require_once ("include/functions.php");
require_once ("include/config.php");
require_once ("include/sanitize.php");
dbconn();
global $CURUSER;
$id = $_GET['id'];
$id = sanitize_int($id);
$do = $_GET["do"];
if ($do = "del" && $CURUSER["delete_torrents"] == "yes")
{
    $r = do_sqlquery("SELECT file FROM {$TABLE_PREFIX}subtitles WHERE id=$id");
    $s = mysqli_fetch_array($r,MYSQLI_NUM);
    $file = $s[0];
    @unlink("subtitles/$file");
    $r = do_sqlquery("DELETE FROM {$TABLE_PREFIX}subtitles WHERE id=$id");
    redirect("index.php?page=subtitles");
} else
{
    redirect("index.php?page=subtitles");
}
//by CobraCRK 21.07.2006 - www.extremeshare.org - cobracrk@yahoo.com


?>