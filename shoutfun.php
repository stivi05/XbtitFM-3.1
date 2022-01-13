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
  var input = document.forms['chatForm'].elements['chatbarText'];
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
	var colorvalue = document.forms['chatForm'].elements['color'].value;
	bbshout("[color="+colorvalue+"]", "[/color]");
}

function bbfont() {
	var fontvalue = document.forms['chatForm'].elements['font'].value;
	bbshout("[font="+fontvalue+"]", "[/font]");
}
function bbsize() {
    var sizevalue = document.forms['chatForm'].elements['size'].value;
    bbshout("[size="+sizevalue+"]", "[/size]");
}
//-->
</script>

<?php

function shoutfun(){
echo "<center><table border=0 cellpadding=0 cellspacing=2><tr>";
echo "<tr>";
echo "<td width=22><a href=\"javascript:bbshout('[marquee]', '[/marquee]')\"><img src='./images/bbcode/bbcode_marquee.gif' border='0' alt='marquee'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[b]', '[/b]')\"><img src='./images/bbcode/bbcode_bold.gif' border='0' alt='Bold'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[i]', '[/i]')\"><img src='./images/bbcode/bbcode_italic.gif' border='0' alt='Italic'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[u]', '[/u]')\"><img src='./images/bbcode/bbcode_underline.gif' border='0' alt='Underline'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[url]', '[/url]')\"><img src='./images/bbcode/bbcode_url.gif' border='0' alt='Url'></a></td>";
echo "<td width=22><a href=\"javascript:bbshout('[img]', '[/img]')\"><img src='./images/bbcode/bbcode_image.gif' border='0' alt='Img'></a></td>";
echo "<td>
<select name='color' size=\"1\" onChange=\"javascript:bbcolor()\">
<option selected='selected'>COLOR</option>
<option value=mediumturquoise style=color:mediumturquoise>mediumturquoise</option>
<option value=dodgerblue style=color:dodgerblue>dodgerblue</option>
<option value=blue style=color:blue>blue</option>
<option value=midnightblue style=color:darkblue>midnightblue</option>
<option value=orange style=color:orange>orange</option>
<option value=orangered style=color:orangered>orange-red</option>
<option value=crimson style=color:crimson>crimson</option>
<option value=red style=color:red>red</option>
<option value=indianred style=color:indianred>indianred</option>
<option value=darkred style=color:darkred>dark red</option>
<option value=green style=color:green>green</option>
<option value=limegreen style=color:limegreen>limegreen</option>
<option value=seagreen style=color:seagreen>sea-green</option>
<option value=hotpink style=color:hotpink>hotpink</option>
<option value=tomato style=color:tomato>tomato</option>
<option value=coral style=color:coral>coral</option>
<option value=mediumorchid style=color:mediumorchid>purple</option>
<option value=indigo style=color:indigo>indigo</option>
<option value=burlywood style=color:burlywood>burlywood</option>
<option value=sandybrown style=color:sandybrown>sandy brown</option>
<option value=sienna style=color:sienna>sienna</option>
<option value=goldenrod style=color:goldenrod>goldenrod</option>
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
echo"<td>&nbsp;<a href=\"javascript:show_hide('sextra1');\"><img border='0' src=images/bbcode/down.gif title=\"even more\"></a>";
echo "</tr></table></center>";
}
?>
