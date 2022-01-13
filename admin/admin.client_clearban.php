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
// *****************************************************************
// Version: 1.1
// *****************************************************************
//
// Filename: admin.client_clearban.php
// Parent:   peers.php
// Author:   Petr1fied
// Date:     2007-06-17
// Updated:  N/A
//
// Usage:
// - Removes bans on BitTorrent Clients.
//
// ####### HISTORY ################################################
//
// 1.0 2007-06-17 - Petr1fied - Intital development.
// 1.1 2008-10-18 - Petr1fied - Conversion for use with xbtit.
//
// *****************************************************************

if (!defined("IN_BTIT"))
    die("non direct access!");

if (!defined("IN_ACP"))
    die("non direct access!");

include(load_language("lang_peers.php"));
$admintpl->set('language',$language);

(isset($_GET["id"]) ? $id=0+$_GET["id"] : $id="");
(isset($_GET["returnto"]) ? $url=urldecode($_GET["returnto"]) : $url="");
(isset($_POST["confirm"]) ? $confirm=$_POST["confirm"] : $confirm="");

if($_POST["confirm"])
{
    if($confirm==$language["YES"])
    {
        if ($XBTT_USE)
           {
           $dr=mysqli_fetch_array(do_sqlquery("SELECT peer_id_ascii FROM `{$TABLE_PREFIX}bannedclient` WHERE `id`=".$id));
           @do_sqlquery("DELETE FROM xbt_deny_from_clients WHERE peer_id=".sqlesc($dr['peer_id_ascii']));
           unset($dr);
        }
        @do_sqlquery("DELETE FROM `{$TABLE_PREFIX}bannedclient` WHERE `id`=".$id);
        success_msg($language["SUCCESS"],$language["CLIENT_REMOVED"]."<a href='$url'>".$language["RETURN"]."</a>");
        stdfoot();
        exit();
    }
    else
        redirect($url);
}
$res=do_sqlquery("SELECT * FROM `{$TABLE_PREFIX}bannedclient` WHERE `id`=$id",true);

if(@mysqli_num_rows($res)>0)
{
    $client=array();
    $i=0;
    while($row=mysqli_fetch_assoc($res))
    {
        $client[$i]["client_name"]=$row["client_name"];
        $client[$i]["user_agent"]=$row["user_agent"];
        $client[$i]["peer_id"]=$row["peer_id"];
        $client[$i]["peer_id_ascii"]=$row["peer_id_ascii"];
        $client[$i]["reason"]=stripslashes($row["reason"]);
        $i++;
    }
    $admintpl->set('client',$client);
}
else
{
	err_msg($language["ERROR"],$language['BAD_ID']);
	stdfoot();
	exit();
}

?>