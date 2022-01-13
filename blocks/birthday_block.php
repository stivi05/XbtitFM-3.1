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

global $btit_settings, $TABLE_PREFIX, $language, $res_seo;

$res=do_sqlquery("SELECT u.id, u.username, u.dob, ul.prefixcolor, ul.suffixcolor FROM {$TABLE_PREFIX}users u LEFT JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE DAYOFMONTH(u.dob)=".date('j')." AND MONTH(u.dob)=".date('n')." AND u.dob!=CURDATE() ORDER BY u.id ASC");

if(@mysqli_num_rows($res)>0 && function_exists('userage'))
{
    $users="";
    while($row=mysqli_fetch_assoc($res))
    {
        $dob=explode("-", $row["dob"]);
        $age=userage($dob[0], $dob[1], $dob[2]);
        $users.="<a href='".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated_user"]=="true")?$row["id"]."_".strtr($row["username"], $res_seo["str"], $res_seo["strto"]).".html":"index.php?page=userdetails&id=".$row["id"])."'>" . stripslashes($row["prefixcolor"]) . $row["username"] . stripslashes($row["suffixcolor"]) . "</a> ($age), ";
    }
    $users=trim($users,", ").".";
    echo "<div align='center'><table border='0' align='center' cellpadding='0' cellspacing='0' width='100%'><tr><td class='blocklist' align='center'>$users</td></tr></table></div>\n";
}
else
{
    if(!isset($language["BLOCK_NO_BIRTHDAY"])) $language["BLOCK_NO_BIRTHDAY"]="Please disable the birthday block in the AdminCP";
    echo "<div align='center'><table border='0' align='center' cellpadding='0' cellspacing='0' width='100%'><tr><td class='blocklist' align='center'>".$language["BLOCK_NO_BIRTHDAY"]."</td></tr></table></div>\n";
}

?>