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
dbconn();
require_once(dirname(__FILE__).load_language("lang_aads.php"));
require_once(dirname(__FILE__).load_language("lang_main.php"));

$id=(int)0+$_GET["id"];
$inv=(int)0+$_GET["inv"];

$res=get_result("SELECT * FROM `{$TABLE_PREFIX}bitcoin_invoices` WHERE `invoice_id`='".$inv."' AND `tracker_id`='".$id."'");
if(count($res)>0)
{
    $row=$res[0];
    echo "\n<table>\n";
    echo "\t<tr>\n";
    echo "\t\t<td class='header' style='text-align:center;'>".$language["AADS_BIT_REQ"]."</td>\n";
    echo "\t\t<td class='header' style='text-align:center;'>".$language["AADS_BIT_REC"]."</td>\n";
    echo "\t\t<td class='header' style='text-align:center;'>".$language["AADS_BIT_CON"]."</td>\n";
    echo "\t\t<td class='header' style='text-align:center;'>".$language["AADS_BIT_STA"]."</td>\n";
    echo "\t\t<td class='header' style='text-align:center;'>".$language["AADS_BIT_LAS"]."</td>\n";
    echo "\t</tr>\n";
    echo "\t<tr>\n";
    echo "\t\t<td class='lista' style='text-align:center;'>0".trim($row["price_in_btc"],0)." BTC</td>\n";
    echo "\t\t<td class='lista' style='text-align:center;'>".(($row["received_in_btc"]==0)?$language["NA"]:"0".trim($row["received_in_btc"],0)." BTC")."</td>\n";
    echo "\t\t<td class='lista' style='text-align:center;'>".(($row["confirmation_count"]<=6)?$row["confirmation_count"]."/6":$row["confirmation_count"])."</td>\n";
    echo "\t\t<td class='lista' style='text-align:center;'>".ucfirst($row["state"])."</td>\n";
    echo "\t\t<td class='lista' style='text-align:center;'>".(($row["lastupdate"]==0)?$language["NA"]:date("jS F Y \a\\t g:ia", $row["lastupdate"]))."</td>\n";
    echo "\t</tr>\n";
    echo "</table>\n";
}
else
{
    echo $language["AADS_BIT_NOT"];
}

?>