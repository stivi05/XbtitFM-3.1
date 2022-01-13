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

dbconn();

global $BASEURL, $CURUSER;

if($CURUSER["can_upload"]!="yes")
die("No Dice!");

require("../".load_language("lang_main.php"));

if (empty($_SESSION['CURUSER']['style_url']))
{
    // get user's style
    $resheet=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}style where id=".$CURUSER["style"]." LIMIT 1",TRUE,$btit_settings["cache_duration"]);
    if (!$resheet)
    {
        $STYLEPATH="$THIS_BASEPATH/style/xbtitFM";
        $STYLEURL="$BASEURL/style/xbtitFM";
    }
    else
    {
        $resstyle=mysqli_fetch_array($resheet);
        $STYLEPATH="$THIS_BASEPATH/".$resstyle["style_url"];
        $STYLEURL="$BASEURL/".$resstyle["style_url"];
    }
    $_SESSION['CURUSER']['style_url']=$STYLEURL;
    $_SESSION['CURUSER']['style_path']=$STYLEPATH;
}
else
{
    $STYLEURL=$_SESSION['CURUSER']['style_url'];
    $STYLEPATH=$_SESSION['CURUSER']['style_path'];
}

function save_image($inPath,$outPath)
{ //Download images from remote server
    $in=    fopen($inPath, "rb");
    $out=   fopen($outPath, "wb");
    while ($chunk = fread($in,8192))
    {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

$rand=rand();
$end=getExtension($_GET["image"]);

save_image($_GET["image"],'./imgs/'.$rand.'.'.$end.'');

echo'<link rel="stylesheet" href="'.$STYLEURL.'/main.css" type="text/css" />';

echo $language["IMG_SUCCESS"];

echo "<table align='center' width='50%'><tr><td class='header'></td></tr><tr><td class=lista><center><a rel=\"thumbnail\" href=\"javascript: SmileIT('[img]".$BASEURL."/googly/imgs/".$rand.".".$end."[/img]',window.opener.document.forms.upload.info);\"><img src='$BASEURL/googly/imgs/".$rand.".".$end."' style=\"width: 100px;\"></a></center></td></tr><tr><td class='header'><center>".$rand.".".$end."</center></td></tr></table><br><center><a href='#' onClick=\"window.close()\">".$language["CLOSE"]."</a>";

echo"<script type=\"text/javascript\">

function SmileIT(smile,textarea){
    // Attempt to create a text range (IE).
    if (typeof(textarea.caretPos) != \"undefined\" && textarea.createTextRange)
    {
        var caretPos = textarea.caretPos;

        caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? smile + ' ' : smile
        caretPos.select();
    }
    // Mozilla text range replace.
    else if (typeof(textarea.selectionStart) != \"undefined\")
    {
        var begin = textarea.value.substr(0, textarea.selectionStart);
        var end = textarea.value.substr(textarea.selectionEnd);
        var scrollPos = textarea.scrollTop;

        textarea.value = begin + smile + end;

        if (textarea.setSelectionRange)
        {
            textarea.focus();
            textarea.setSelectionRange(begin.length + smile.length, begin.length + smile.length);
        }
        textarea.scrollTop = scrollPos;
    }
    // Just put it on the end.
    else
    {
        textarea.value += smile;
        textarea.focus(textarea.value.length - 1);
    }
}
</script>";

?>