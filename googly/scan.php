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
require"../include/functions.php";
dbconn(true);
global $CURUSER;

if($CURUSER["can_upload"]!="yes")
die("No Dice!");

require("../".load_language("lang_main.php"));

$_GET["searchtag"]=preg_replace(array('/[^A-Za-z0-9 ]/', '/\s\s+/'), array('', ' '), $_GET["searchtag"]);
$search = urlencode ($_GET["searchtag"]);
$search = mysqli_real_escape_string ($GLOBALS['conn'],$search);
$link = "http://images.google.com/images?hl=de&q=$search&btnG=Bilder-Suche&gbv=1&safe=active";
$code = file_get_contents($link,'r');

preg_match_all('/imgurl\=http\:\/\/www\.[A-Za-z0-9-]*.[A-Za-z]*[^.]*.[A-Za-z]*/', $code, $img);

echo "<table width=100%><tr><td class=block>".$language["IMG_INFO"]."</td></tr><tr><td class=lista>";  

foreach($img[0] as $k => $v)
{
    preg_match("#http://(.*)#", $v, $img_pic);
    if(file_exists($img_pic[0]))
        $url=getimagesize($img_pic[0]);
if(!is_array($url))

{
 
 echo "<img src='".$BASEURL."/images/question.gif' style='width: 100px;'></a>&nbsp;";
}else{
echo "<a href=\"javascript:ProcessIMG('$img_pic[0]');\" rel='thumbnail'><img src='$img_pic[0]' style='width: 100px;'></a>&nbsp;";
  }  
}
echo"</td></tr></table>";
?>