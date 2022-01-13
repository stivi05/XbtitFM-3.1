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



if(isset($_POST) && !empty($_POST))
{
    (isset($_POST["porncat"]) && !empty($_POST["porncat"])) ? $porncat=trim(str_replace(array(" " ,".", ";"), array("", ",", ","), $_POST["porncat"]), ",") : $porncat=false;

    if($porncat!==false)
    {   
        if(strpos($porncat, ",")>0)
        {
            $pc_array1=array();
            $pc_array2=explode(",", $porncat);
            foreach($pc_array2 as $value)
            {
                if(is_numeric($value))
                {
                   $pc_array1[]=$value; 
                }
            }
            $porncat=mysqli_real_escape_string($GLOBALS['conn'],implode(",", $pc_array1));
        }
        else
        {
            $porncat=mysqli_real_escape_string($GLOBALS['conn'],$porncat);
        }
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$porncat."' WHERE `key`='porncat'", true);
 
        foreach (glob($THIS_BASEPATH."/cache/*.txt") as $filename)
            unlink($filename);
        redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=showporn");
    }
}

$admintpl->set("uid",$CURUSER["uid"]);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("language",$language);
$admintpl->set("porncat", $btit_settings["porncat"]);
$admintpl->set("cat_count_is_1", ((!strpos($btit_settings["porncat"],","))?true:false), true);
?>