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
require ("include/functions.php");

require("./".load_language('lang_commands.php'));
dbconn(false);

global $CURUSER, $btit_settings;

$is_admin=$CURUSER[$btit_settings['is_admin']]=='yes';
$is_mod=$CURUSER[$btit_settings['is_mod']]=='yes';


//get current style
  $resheet=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}style where id=".$CURUSER["style"]."");
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

$style_css=load_css("main.css");//end style

  echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>\n";
  echo "<HTML><HEAD>\n <TITLE>".$language['COMMANDS']."</TITLE>\n";
?>
<link rel="stylesheet" type="text/css" href="<?php echo $STYLEURL;?>/main.css" />
<?php
  echo "</HEAD>\n<BODY class=\"main\"><table width=100% class=main border=0>";
  
  
  
  if($is_admin){
  echo"<tr>
  
  <td class=header>".$language['CLEAN']."</td><td class=lista>".$language['SHOUT_CLEAN']."</td></tr>
  <td class=header>".$language['PRUNE']."</td><td class=lista>".$language['PRUNEDESC']."</td></tr>
  <tr><td class=header>".$language['WARN']."</td><td class=lista>".$language['WARNDESC']."</td></tr>
  <td class=header>".$language['UWARN']."</td><td class=lista>".$language['UWARNDESC']."</td></tr>
  <td class=header>".$language['SHOUT_ON']."</td><td class=lista>".$language['SHOUT_ONDESC']."</td></tr>
  <td class=header>".$language['SHOUT_ONT']."</td><td class=lista>".$language['SHOUT_ONTDESC']."</td></tr>
  <td class=header>".$language['STAFFPM']."</td><td class=lista>".$language['STAFFPMDESC']."</td></tr>
  <td class=header>".$language['BOOTCMD']."</td><td class=lista>".$language['BOOTCMDDESC']."</td></tr>
  <td class=header>".$language['UNBOOTCMD']."</td><td class=lista>".$language['UNBOOTCMDDESC']."</td></tr>
  <td class=header>".$language['BAN']."</td><td class=lista>".$language['BANDESC']."</td></tr>
  <td class=header>".$language['UBAN']."</td><td class=lista>".$language['UBANDESC']."</td></tr>";
  }
 if($is_mod){
  echo"<tr>
  <td class=header>".$language['ANN']."</td><td class=lista>".$language['ANNDESC']."</td></tr>
  <tr><td class=header>".$language['PRUNES']."</td><td class=lista>".$language['PRUNESDESC']."</td></tr>
  <td class=header>".$language['ALSTAFF']."</td><td class=lista>".$language['ALSTAFFDESC']."</td></tr>
  <td class=header>".$language['PREWARN']."</td><td class=lista>".$language['PREWARNDESC']."</td></tr>
  <td class=header>".$language['STAT']."</td><td class=lista>".$language['STATDESC']."</td></tr>
  ";
  }
  echo"</table><br><center><a href=javascript:window.close();>".$language['CLOSE']."</a></body></html>"
  ?>