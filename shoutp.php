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

  #################################################################
  #
  #         Ajax MySQL shoutbox for btit
  #         Version 1.0
  #         Author: miskotes
  #         Created: 11/07/2007
  #         Contact: miskotes [at] yahoo.co.uk
  #         Website: http://www.yu-corner.com
  #         Credits: linuxuser.at, plasticshore.com
  #
  #################################################################


//block_begin(SHOUTBOX);

  if ($CURUSER["uid"] > 1)
    {
    require_once("include/smilies.php");
  if (!isset($CURUSER)) global $CURUSER;


  print "<script src='ajaxchat/scriptsp.js' language='JavaScript' type='text/javascript'></script>";

if($btit_settings["fmhack_custom_smileys"]=="enabled")
{
function smile() {
global $TABLE_PREFIX;
  print "<div align='center'><table cellpadding='1' cellspacing='1'><tr>";
   $list=get_result("SELECT `key`,`value` FROM {$TABLE_PREFIX}smilies LIMIT 16",true);

    foreach($list as $code=>$url)
     {
        print("\n<td><a href=\"javascript: SmileIT('".str_replace("'","\'",$url['key'])."')\">
               <img border=\"0\" src=\"images/smilies/".$url['value']."\" alt=\"".$url['key']."\" /></a></td>");
    }


  print "</tr></table></div>";

}
}else{
function smile() {

  print "<div align='center'><table cellpadding='1' cellspacing='1'><tr>";

  global $smilies, $count;
  reset($smilies);

  while ((list($code, $url) = each($smilies)) && $count<16) {
        print("\n<td><a href=\"javascript: SmileIT('".str_replace("'","\'",$code)."')\">
               <img border=\"0\" src=\"images/smilies/$url\" alt=\"$code\" /></a></td>");

        $count++;
   print "</tr></table></div>";
  }

}
}
?>

<center>

 <div id="chat">

  <div id="chatoutput">

      <ul id="outputPList">

        <li>
          <span class="name">BTIT SHOUT:</span><h2 style='padding-left:20px;'><?php echo $language["WELCOME"] ?></h2>

            <center><div class="loader"></div></center>

          </li>

      </ul>

  </div>

</div>


 <div id="shoutheader">

    <form id="chatForm" name="chatForm" onsubmit="return false;" action="">

      <input type="hidden" name="name" id="name" value="<?php echo $CURUSER["username"]; ?>" />
      <input type="hidden" name="uid" id="uid" value="<?php echo $CURUSER["uid"]; ?>" />
      <input type="hidden" name="toid" id="toid" value="<?php echo $_GET["toid"]; ?>" />
	  <input type="hidden" name="pchat" id="pchat" value="<?php echo $CURUSER["pchat"]; ?>" />
      <input type="text" size="45" maxlength="500" name="chatbarText" id="chatbarText" onblur="checkStatus('');" onfocus="checkStatus('active');" />
      <input onclick="sendComment();" type="submit" id="submit" name="submit" value="<?php echo $language["FRM_CONFIRM"]; ?>" />
      &nbsp;
      <a href="javascript: PopMoreSmiles('chatForm','chatbarText');">
      <img src="images/smile.gif" border="0" class="form" title="<?php echo $language['MORE_SMILES']; ?>" align="top" alt="" /></a>

      <a href="javascript: PopPhistory()">
      <img src="images/quote.gif" border="0" class="form" title="<?php echo $language['HISTORY']; ?>/Moderate" align="top" alt="" /></a>

<!--
       &nbsp;&nbsp;
      <a href="javascript: PopMoreSmiles('chatForm','chatbarText')">Admin!</a>
-->
      <br />

      <?php smile(); ?>

    </form>
</div>

</center>

<?php
  }

else
    stderr("Error",$language["ERR_MUST_BE_LOGGED_SHOUT"]);

    //block_end();
?>