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


$admintpl->set("language",$language);
$admintpl->set("BASEURL",$BASEURL);
$admintpl->set("random",$CURUSER["random"]);
$admintpl->set("uid",$CURUSER["uid"]);

if(isset($_POST) && !empty($_POST))
{
    $admintpl->set("firstrun",false,true);
    (isset($_POST["pin"]) && !empty($_POST["pin"]) && is_numeric($_POST["pin"]) && strlen($_POST["pin"])==7) ? $pin=(int)0+$_POST["pin"] : $pin=false;
    if($pin===false)
    {
        stderr($language["ERROR"],$language["TWIT_BAD_PIN"]);
    }
    else
    {
        // Retrieve our previously generated request token & secret
        $res=do_sqlquery("SELECT * FROM `{$TABLE_PREFIX}settings` WHERE `key` LIKE 'twitter_request_token%'",true);
        while($row=mysqli_fetch_assoc($res))
        {
            if($row["key"]=="twitter_request_token")
                $requestToken=$row["value"];
            elseif($row["key"]=="twitter_request_token_secret")
                $requestTokenSecret=$row["value"];
        }
        
        if($requestToken=="" || $requestTokenSecret=="")
        {
            stderr($language["ERROR"],$language["TWIT_REG_MISS_1"] . " <a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=twitter'>" . $language["TWIT_AUTH_2"] . "</a> " . $language["TWIT_REG_MISS_2"]);
        }
        
        // Include class file & create object passing request token/secret also
        require_once("twitteroauth/twitteroauth/twitteroauth.php");
        $oauth = new TwitterOAuth('i3wrpWOyahTF4VO0Fo1EmQ', '4Ng72fOHs7p1nayKZZjcyWGmULhhnjmUX4MQdGzOvg', $requestToken, $requestTokenSecret);

        // Generate access token by providing PIN for Twitter
        $request = $oauth->getAccessToken(NULL, $pin);
        $accessToken = mysqli_real_escape_string($GLOBALS['conn'],$request['oauth_token']);
        $accessTokenSecret = mysqli_real_escape_string($GLOBALS['conn'],$request['oauth_token_secret']);

        // Save our access token/secret
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$accessToken."' WHERE `key`='twitter_oauth_token'",true);
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$accessTokenSecret."' WHERE `key`='twitter_oauth_token_secret'",true);
        do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='' WHERE `key` LIKE 'twitter_request_token%'",true);
        success_msg($language["SUCCESS"], $language["TWIT_SUCCESS"]);
        stdfoot();
        exit;
    }
}
else
{
    require_once('twitteroauth/twitteroauth/twitteroauth.php');
    $oauth = new TwitterOAuth('i3wrpWOyahTF4VO0Fo1EmQ','4Ng72fOHs7p1nayKZZjcyWGmULhhnjmUX4MQdGzOvg');

    $request = $oauth->getRequestToken();
    $requestToken = mysqli_real_escape_string($GLOBALS['conn'],$request['oauth_token']);
    $requestTokenSecret = mysqli_real_escape_string($GLOBALS['conn'],$request['oauth_token_secret']);

    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$requestToken."' WHERE `key`='twitter_request_token'",true);
    do_sqlquery("UPDATE `{$TABLE_PREFIX}settings` SET `value`='".$requestTokenSecret."' WHERE `key`='twitter_request_token_secret'",true);

    // display Twitter generated registration URL
    $registerURL = $oauth->getAuthorizeURL($request);
    $admintpl->set("firstrun",true,true);
    $admintpl->set("registerURL",$registerURL);
}
?>