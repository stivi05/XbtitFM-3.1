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

(isset($_GET['cheapmail'])) ? $addcheapmail = mysqli_real_escape_string($GLOBALS['conn'],$_GET['cheapmail']) : (isset($_POST["cheapmail"])) ? $addcheapmail = mysqli_real_escape_string($GLOBALS['conn'],$_POST['cheapmail']) :         $addcheapmail = '';
(isset($_GET['additthen'])) ? $additthen = $_GET['additthen'] : (isset($_POST["additthen"])) ? $additthen = mysqli_real_escape_string($GLOBALS['conn'],$_POST['additthen']) : $additthen = '';
(isset($_GET['delete'])) ? $delete = mysqli_real_escape_string($GLOBALS['conn'],$_GET['delete']) : $delete = 'false';
(isset($_GET['confirm'])) ? $confirm = $_GET['confirm'] : $confirm = 'false';

$admintpl->set("language", $language);
$admintpl->set("STYLEURL", $STYLEURL);
$admintpl->set("delete", $delete);
$admintpl->set("uid", $CURUSER["uid"]);
$admintpl->set("random", $CURUSER["random"]);
$admintpl->set("opt1", (($delete!='false' && $confirm=='false')?true:false), true);
$admintpl->set("opt2", (($delete!='false' && $confirm=='true')?true:false), true);

if ($delete!='false' && $confirm=='true')
    do_sqlquery("DELETE FROM `{$TABLE_PREFIX}cheapmail` WHERE `domain`='".$delete."' LIMIT 1",true);

if(($addcheapmail=="")&&($additthen=="Submit"))
    stderr($language["ERROR"],$language["ERR_CHEAP_SUBMIT"]);


elseif(($addcheapmail!="")&&($additthen=="Submit"))
{
    $isthere=mysqli_fetch_assoc(do_sqlquery("SELECT * FROM `{$TABLE_PREFIX}cheapmail` WHERE `domain`='".$addcheapmail."'"));
    $wildcard="@".strrrchr($addcheapmail,".");
    $wildthere=mysqli_fetch_assoc(do_sqlquery("SELECT * FROM `{$TABLE_PREFIX}cheapmail` WHERE `domain`='".$wildcard."'"));

    if((!$isthere)&&(!$wildthere))
    {
        do_sqlquery("INSERT INTO `{$TABLE_PREFIX}cheapmail` VALUES ('".$addcheapmail."', UNIX_TIMESTAMP(), '".$CURUSER["username"]."')");
        success_msg("Success!","<span style='color:#CC0000'><b>$addcheapmail</span><span style='color:#000000'>".$language["CHEAP_ADDED"]."</span></b>");
    }
    elseif((!$isthere)&&($wildthere))
    {
	    stderr($language["ERROR"],"<span style='color:#000000'>".$language["ERR_WILDCARD_1"]."<span style='color:#CC0000'><b>$wildcard</b></span>".$language["ERR_WILDCARD_2"]."<span style='color:#CC0000'><b>$addcheapmail</b></span>".$language["ERR_WILDCARD_3"]."</span>");
	}
    else
    {
        stderr($language["ERROR"],"<span style='color:#CC0000'>$addcheapmail </span><span style='color:#000000'>".$language["ERR_CHEAP_DUPE"]."</span>");
    }
}

$i=0;
$loop=array();
$list=get_result("SELECT `c`.`domain`, `c`.`added`, `c`.`added_by`, `ul`.`prefixcolor`, `ul`.`suffixcolor` FROM `{$TABLE_PREFIX}cheapmail` `c` LEFT JOIN `{$TABLE_PREFIX}users` `u` ON `c`.`added_by`=`u`.`username` LEFT JOIN `{$TABLE_PREFIX}users_level` `ul` ON `u`.`id_level`=`ul`.`id` ORDER BY `c`.`domain` ASC",true,$btit_settings["cache_duration"]);

if(isset($list[0]))
{
    $admintpl->set("haveloop",true,true);
    foreach($list as $cheapmail)
    {
        $loop[$i]["domain"]=$cheapmail["domain"];
        $loop[$i]["added"]=(($cheapmail["added"]==0)?$language["UNKNOWN"]:date('M j Y \\a\t h:i A',$cheapmail["added"]));
        $loop[$i]["added_by"]=(($cheapmail["added_by"]=="Unknown")?$language["UNKNOWN"]:  unesc($cheapmail["prefixcolor"].$cheapmail["added_by"].$cheapmail["suffixcolor"])   );
        $i++;
    }
    $admintpl->set("loop",$loop);
    $admintpl->set("counter",$i);
}
else
{
    $admintpl->set("haveloop",false,true);
    $admintpl->set("counter",$i);
}

?>