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

if (!defined("IN_BTIT"))
    die("non direct access!");

if (!defined("IN_ACP"))
    die("non direct access!");



(isset($_GET["stage"]) && is_numeric($_GET["stage"]) && $_GET["stage"]>=1) ? $stage=(int)0+$_GET["stage"] : $stage=1;

$newstage=$stage+1;

$replaces = array("{fmprefix}" => $TABLE_PREFIX);

$sqlfile=$THIS_BASEPATH."/sql/ip2country_{$stage}.sql";

if($stage==1)
    do_sqlquery("TRUNCATE {$TABLE_PREFIX}ip2country", true);

if(file_exists($sqlfile))
{
    $handle = fopen($sqlfile, "r");
    $contents = "";
    while (!feof($handle))
    {
        $contents .= str_replace(array("\r", "\n"), array("", ""), fread($handle, 8192));
    }
    fclose($handle);

    $queries=explode(";", $contents);
    foreach($queries as $v)
    {
        if(substr($v,0,6)=="INSERT")
            do_sqlquery(str_replace("{fm_prefix}", $TABLE_PREFIX, $v), true);
    }
    if($newstage<=7)
        redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=ip2c_import&stage=".$newstage);
    else
        success_msg($language["SUCCESS"],$language["IP2C_DB_IMP1"]. " <a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=hacks&action=read'>".$language["IP2C_DB_IMP2"]."</a>");
}

?>