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

require_once("btemplate/bTemplate.php");
$ledtpl = new bTemplate();
require_once("include/functions.php");
dbconn();
global $CURUSER, $btit_settings, $language;

if(!$CURUSER || !$CURUSER['uid']>1){
}
else{

global $SITENAME, $BASEURL, $XBTT_USE, $btit_settings, $CURUSER, $TABLE_PREFIX;


$uploaded=makesize($CURUSER["uploaded"]);
$downloaded=makesize($CURUSERt["downloaded"]);

$teksta='--- Welcome to';

$msg1=$btit_settings["ticker_msg_1"];
$msg2=$btit_settings["ticker_msg_2"];
$msg3=$btit_settings["ticker_msg_3"];
$msg4=$btit_settings["ticker_msg_4"];

?><center>
<script type="text/javascript" src="jscript/jquery.leddisplay.js"></script>
<script type="text/javascript" src="jscript/design.js"></script>
<canvas class="demo-canvas"> <?php echo htmlspecialchars($teksta); ?> <?php echo $SITENAME; ?> --- <?php echo ($CURUSER["username"]); ?> you have Uploaded - <?php echo $uploaded; ?> - Downloaded - <?php echo $downloaded; ?> --- <?php echo $msg1; ?> --- <?php echo $msg2; ?> --- <?php echo $msg3; ?> --- <?php echo $msg4; ?> </canvas>
<script type="text/javascript">
var options = {
horizontalPixelsCount: 130,
verticalPixelsCount: 5,
pixelSize: 5,
disabledPixelColor: '#404040',
enabledPixelColor: 'white',
pathToPixelImage: 'images/pixel.png',
stepDelay: 40,
// only for canvas
backgroundColor: '#202020',
// only for canvas
pixelRatio: 0.7,
runImmidiatly: true
};
$('.demo-div, .demo-canvas').leddisplay($.extend(options, {pixelSize: 5}));
</script></center>
<?php


echo $ledtpl->fetch(load_template("led.tpl"));
}
?>