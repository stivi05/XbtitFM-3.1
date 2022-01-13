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
?>
<script type="text/javascript">
<!--
function bbshout(repdeb, repfin) {
  var input = document.forms['shoutboxform'].elements['message'];
  input.focus();

  if(typeof document.selection != 'undefined') {

    var range = document.selection.createRange();
    var insText = range.text;
    range.text = repdeb + insText + repfin;

    range = document.selection.createRange();
    if (insText.length == 0) {
      range.move('character', -repfin.length);
    } else {
      range.moveStart('character', repdeb.length + insText.length + repfin.length);
    }
    range.select();
  }

  else if(typeof input.selectionStart != 'undefined')
  {

    var start = input.selectionStart;
    var end = input.selectionEnd;
    var insText = input.value.substring(start, end);
    input.value = input.value.substr(0, start) + repdeb + insText + repfin + input.value.substr(end);

    var pos;
    if (insText.length == 0) {
      pos = start + repdeb.length;
    } else {
      pos = start + repdeb.length + insText.length + repfin.length;
    }
    input.selectionStart = pos;
    input.selectionEnd = pos;
  }

  else
  {

    var pos;
    var re = new RegExp('^[0-9]{0,3}$');
    while(!re.test(pos)) {
      pos = prompt("Insertion à la position (0.." + input.value.length + "):", "0");
    }
    if(pos > input.value.length) {
      pos = input.value.length;
    }

    var insText = prompt("Veuillez entrer le texte à formater:");
    input.value = input.value.substr(0, pos) + repdeb + insText + repfin + input.value.substr(pos);
  }
}

function bbcolor() {
	var colorvalue = document.forms['shoutboxform'].elements['color'].value;
	bbshout("[color="+colorvalue+"]", "[/color]");
}

function bbfont() {
	var fontvalue = document.forms['shoutboxform'].elements['font'].value;
	bbshout("[font="+fontvalue+"]", "[/font]");
}
function bbsize() {
    var sizevalue = document.forms['shoutboxform'].elements['size'].value;
    bbshout("[size="+sizevalue+"]", "[/size]");
}
//-->
</script>
<?php

function shoutfun(){
echo "<center><table border=0 cellpadding=0 cellspacing=2><tr>";
echo "<tr>";
echo "<td width=22><a href=\"javascript:bbshout('[marquee]', '[/marquee]')\"><img src=./images/bbcode/bbcode_marquee.gif border=0 alt='Marquee'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[b]', '[/b]')\"><img src=./images/bbcode/bbcode_bold.gif border=0 alt='Bold'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[i]', '[/i]')\"><img src=./images/bbcode/bbcode_italic.gif border=0 alt='Italic'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[u]', '[/u]')\"><img src=./images/bbcode/bbcode_underline.gif border=0 alt='Underline'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[url]', '[/url]')\"><img src=./images/bbcode/bbcode_url.gif border=0 alt='Url'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[img]', '[/img]')\"><img src=./images/bbcode/bbcode_image.gif border=0 alt='Img'></a></td>";


echo "<td>
<select name='color' size=\"1\" onChange=\"javascript:bbcolor()\">
<option selected='selected'>COLOR</option>
<option value=skyblue style=color:skyblue>sky blue</option>
<option value=royalblue style=color:royalblue>royal blue</option>
<option value=blue style=color:blue>blue</option>
<option value=darkblue style=color:darkblue>dark-blue</option>
<option value=orange style=color:orange>orange</option>
<option value=orangered style=color:orangered>orange-red</option>
<option value=crimson style=color:crimson>crimson</option>
<option value=red style=color:red>red</option>
<option value=firebrick style=color:firebrick>firebrick</option>
<option value=darkred style=color:darkred>dark red</option>
<option value=green style=color:green>green</option>
<option value=limegreen style=color:limegreen>limegreen</option>
<option value=seagreen style=color:seagreen>sea-green</option>
<option value=deeppink style=color:deeppink>deeppink</option>
<option value=tomato style=color:tomato>tomato</option>
<option value=coral style=color:coral>coral</option>
<option value=purple style=color:purple>purple</option>
<option value=indigo style=color:indigo>indigo</option>
<option value=burlywood style=color:burlywood>burlywood</option>
<option value=sandybrown style=color:sandybrown>sandy brown</option>
<option value=sienna style=color:sienna>sienna</option>
<option value=chocolate style=color:chocolate>chocolate</option>
<option value=teal style=color:teal>teal</option>
<option value=silver style=color:silver>silver</option>
</select></td>";

echo "<td>
<select name='size' size=\"1\" onChange=\"javascript:bbsize()\">
<option selected='selected'>Size</option>
<option value=1>1</option>
<option value=2>2</option>
<option value=3>3</option>
<option value=4>4</option>
<option value=5>5</option>
<option value=6>6</option>
<option value=7>7</option>
</select></td>";
echo "</tr></table></center>";
}

function format_shout($text, $strip_html = true) {

    global $smilies, $BASEURL, $privatesmilies;

    $s = $text;
    //$s = strip_tags($s);
    
  if ($strip_html)
    $s = htmlspecialchars($s);
    
    $s = unesc($s);

    # for main shout window
    $f = @fopen("../badwords.txt","r");
    
    if ($f && filesize("../badwords.txt") != 0) {
    
       $bw = fread($f, filesize("../badwords.txt"));
       $badwords = explode("\n",$bw);
       
       for ($i=0; $i<count($badwords); ++$i)
           $badwords[$i] = trim($badwords[$i]);
       $s = str_replace($badwords, "<img src='images/censored.png' border='0' alt='' />", $s);
    }
    @fclose($f);
    
    # for shout history window
    $f = @fopen("badwords.txt","r");
    
    if ($f && filesize("badwords.txt") != 0) {
    
       $bw = fread($f, filesize("badwords.txt"));
       $badwords = explode("\n",$bw);
       
       for ($i=0; $i<count($badwords); ++$i)
           $badwords[$i] = trim($badwords[$i]);
       $s = str_replace($badwords, "<img src='images/censored.png' border='0' alt='' />", $s);
    }
    @fclose($f);


    // [b]Bold[/b]
    $s = preg_replace("/\[b\]((\s|.)+?)\[\/b\]/", "<b>\\1</b>", $s);

    // [i]Italic[/i]
    $s = preg_replace("/\[i\]((\s|.)+?)\[\/i\]/", "<i>\\1</i>", $s);

    // [u]Underline[/u]
    $s = preg_replace("/\[u\]((\s|.)+?)\[\/u\]/", "<u>\\1</u>", $s);

    // [color=blue]Text[/color]
    $s = preg_replace(
        "/\[color=([a-zA-Z]+)\]((\s|.)+?)\[\/color\]/i",
        "<font color=\\1>\\2</font>", $s);

    // [color=#ffcc99]Text[/color]
    $s = preg_replace(
        "/\[color=(#[a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9][a-f0-9])\]((\s|.)+?)\[\/color\]/i",
        "<font color=\\1>\\2</font>", $s);

    // [url=http://www.example.com]Text[/url]
    $s = preg_replace(
        "/\[url=((http|ftp|https|ftps|irc):\/\/[^<>\s]+?)\]((\s|.)+?)\[\/url\]/i",
        "<a href=\\1 target=_blank>\\3</a>", $s);

    // [url]http://www.example.com[/url]
    $s = preg_replace(
        "/\[url\]((http|ftp|https|ftps|irc):\/\/[^<>\s]+?)\[\/url\]/i",
        "<a href=\\1 target=_blank>\\1</a>", $s);


    // [url]www.example.com[/url]
    $s = preg_replace(
        "/\[url\](www\.[^<>\s]+?)\[\/url\]/i",
        "<a href='http://\\1' target='_blank'>\\1</a>", $s);
        
    // [url=www.example.com]Text[/url]
    $s = preg_replace(
        "/\[url=(www\.[^<>\s]+?)\]((\s|.)+?)\[\/url\]/i",
        "<a href='http://\\1' target='_blank'>\\2</a>", $s);


    // [size=4]Text[/size]
    $s = preg_replace(
        "/\[size=([1-7])\]((\s|.)+?)\[\/size\]/i",
        "<font size=\\1>\\2</font>", $s);

    // [font=Arial]Text[/font]
    $s = preg_replace(
        "/\[font=([a-zA-Z ,]+)\]((\s|.)+?)\[\/font\]/i",
        "<font face=\"\\1\">\\2</font>", $s);

// [img]http://www/image.gif[/img]
    $s = preg_replace("/\[img\](http:\/\/[^\s'\"<>]+(\.gif|\.jpg|\.png))\[\/img\]/i", "<center><b><font color=red size=2>Image posted</font>:<a href=\"javascript:popimage('imagepop.php?url=\\1')\">&nbsp;[View]</a></b></center>", $s);
    

    // [img=http://www/image.gif]
    $s = preg_replace("/\[img=(http:\/\/[^\s'\"<>]+(\.gif|\.jpg|\.png))\]/i", "<center><b><font color=red size=2>Image posted</font>:<a href=\"javascript:popimage('imagepop.php?url=\\1');\">&nbsp;[View]</a></b></center>", $s);

//marquee
$s = preg_replace(

		"/\[marquee\]\s*((\s|.)+?)\s*\[\/marquee\]\s*/i",

		"<marquee scroll=left>\\1</marquee>", $s);
    // Linebreaks
    $s = nl2br($s);

    // Maintain spacing
    $s = str_replace("  ", " &nbsp;", $s);

    reset($smilies);
    foreach ($smilies as $code => $url)
        $s = str_replace($code, "<img border='0' src='$BASEURL/images/smilies/$url' alt='$code' />", $s);

    reset($privatesmilies);
    foreach ($privatesmilies as $code => $url)
        $s = str_replace($code, "<img border='0' src='$BASEURL/images/smilies/$url' alt='$code' />", $s);


    return $s;
}
?>
