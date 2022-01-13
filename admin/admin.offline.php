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



switch ($action)
 {
   case 'save':
        if ($_POST["confirm"]==$language["FRM_CONFIRM"])
          {
          if (strlen($_POST["offline_msg"])>200)
             $_POST["offline_msg"]=substr($_POST["offline_msg"],0,200);
          do_sqlquery("DELETE FROM {$TABLE_PREFIX}settings WHERE `key`='site_offline' OR `key`='offline_msg'",true);
          do_sqlquery("INSERT INTO {$TABLE_PREFIX}settings (`key`,`value`)
                       VALUES ('site_offline',".(isset($_POST["offline"])?"'true'":"'false'")."),
                       ('offline_msg',".sqlesc($_POST["offline_msg"]).");",true);

        }
        $btit_settings["site_offline"]=(isset($_POST["offline"])?true:false);
        $btit_settings["offline_msg"]=$_POST["offline_msg"];
        redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=offline&rc=1");
        die;
   break;

   case '':
   default:
        $btit_settings=get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}settings");
        $admintpl->set("language",$language);
        $admintpl->set("form_action","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=offline&amp;action=save");
        $admintpl->set("offline_checked",$btit_settings["site_offline"]?"checked=\"checked\"":"");
        $admintpl->set("offline_message",$btit_settings["offline_msg"]);
   break;
}


?>