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
error_reporting(E_ALL);
 ini_set("display_errors", 1); 
require"include/functions.php";
dbconn();



function paypal_form($amount,$mail,$item,$curr)
{
global $CURUSER, $btit_settings, $TABLE_PREFIX, $BASEURL;
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
// get settings
$zap_pp = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}paypal_settings WHERE id ='1'");
$settings = mysqli_fetch_array($zap_pp);
$form = '
	<html>
		<head><title>processing</title><link rel="stylesheet" type="text/css" href="'.$STYLEURL.'/main.css" /></head>
		<body onload="document.paypal.submit();"><br/><br/><br/><br/><br/>
			<table width=30% align=center><tr><td class="block"><center><b>Processing</b></center></td></tr><tr>
                        <td class=lista><center><img border="0" src="images/safe-secure.gif"></td></tr></table>
			<form action="'.($settings["test"]=="true"?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr").'" method="post" name="paypal">
				<input type="hidden" name="cmd" value="_xclick" />
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="no_shipping" value="1" />
				<input type="hidden" name="business" value="'.$mail.'" />
				<input type="hidden" name="item_number" value="'.$item.'" />
				<input type="hidden" name="item_name" value="Donation from uid: '.$CURUSER['uid'].'" />
				<input type="hidden" name="quantity" value="1" />
				<input type="hidden" name="amount" value="'.$amount.'" />
				<input type="hidden" name="currency_code" value="'.$curr.'" />
				<input type="hidden" name="email" value="'.$CURUSER['email'].'" />
				<input type="hidden" name="custom" value="'.$CURUSER['uid'].'" />
				<input type="hidden" name="address1" value="" />
				<input type="hidden" name="address2" value="" />
				<input type="hidden" name="city" value="" />
				<input type="hidden" name="country" value="" />
				<input type="hidden" name="zip" value="" />
				<input type="hidden" name="night_phone_a" value="" />
				<input type="hidden" name="night_phone_b" value="" />
				<input type="hidden" name="return" value="'.($return_to_address ? $return_to_address['true'] : $BASEURL.'/index.php?page=success').'" />
				<input type="hidden" name="cancel_return" value="'.($return_to_address ? $return_to_address['false'] : $BASEURL.$_SERVER['SCRIPT_NAME'].'?do=cancel').'" />
			</form>
		</body>
	</html>';
if ($CURUSER['uid'] === 0 OR $CURUSER['username'] === 'Guest')
	{
		unset($CURUSER);
	}
	return $form;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$amount = 0 + $_POST['amount'];
	$processor = htmlspecialchars($_POST['processor']);
    $mail=htmlspecialchars($_POST['business']);
    $item=(int)$_POST['item_number'];
    $curr=htmlspecialchars($_POST['currency_code']);
	if (!empty($amount) && $processor == 'paypal' or $processor == 'sandbox')
	{
		echo paypal_form($amount,$mail,$item,$curr);
		exit;
	}
	
}
?>