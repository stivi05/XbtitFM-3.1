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

if (isset($_POST["in_xbtit"]) && $_POST["in_xbtit"]=='1')
      die("non direct access!");

if (isset($_POST["in_admin"]) && $_POST["in_xbtit"]=='1')
      die("non direct access!");

session_name("xbtitFM");
session_start();

require_once(dirname(dirname(__FILE__)).'/include/functions.php');
require_once(dirname(dirname(__FILE__)).'/btemplate/bTemplate.php');

@date_default_timezone_set(@date_default_timezone_get());

$THIS_BASEPATH=dirname(dirname(__FILE__));

if (!empty($_SESSION['CURUSER']['style_url']))
{
 $STYLEURL=$_SESSION['CURUSER']['style_url'];
 $STYLEPATH=$_SESSION['CURUSER']['style_path'];
}
else
{
  $STYLEPATH="$THIS_BASEPATH/style/xbtitFM_3.0";
  $STYLEURL="$BASEURL/style/xbtitFM_3.0";
}

if (!empty($_SESSION['CURUSER']['language_path']))
   $USERLANG=$_SESSION['CURUSER']['language_path'];
else
   $USERLANG="$THIS_BASEPATH/language/english";

$btit_url_last="";
$btit_url_rss="";

if(get_remote_file("https://xbtitfm.eu","r",3))
    $btit_url_last="https://xbtitfm.eu/version.txt";
if(get_remote_file("https://xbtitfm.eu","r",3))
    $btit_url_rss="https://xbtitfm.eu/index.php?/rss/forums/1-xbtitfm-news/";

// check last version on xbtitFM.com site
if($btit_url_last!="")
{
  $btit_last=get_remote_file($btit_url_last,"r",3);
  if (!$btit_last)
      $btit_last="Last version n/a";
}
else
    $btit_last="Last version n/a";

$current_version=explode(".", $tracker_version);
$last_version=explode(".",$btit_last);

$your_version="";

// make further control only if different
if ($current_version[0]<$last_version[0] || $current_version[1]<$last_version[1])
{
    $your_version.="<table width=\"100%\"><tr><td align=\"left\">Installed xbtitFM version:</td><td align=\"left\">v".implode(".",$current_version)."</td></tr>\n";
    $your_version.="<tr><td align=\"left\">Current xbtitFM version:</td><td align=\"left\">v".implode(".",$last_version)."</td></tr>\n";
    $your_version.="<tr><td colspan=\"2\" align=\"center\">Your version of xbtitFM (v".implode(".",$current_version).") is outdated, get the latest version (v".implode(".",$last_version).") <a href=\"https://xbtitfm.eu\" target=\"_blank\">here</a>!</td></tr>\n</table>";
}
elseif ($current_version[0]>$last_version[0] || $current_version[1]>$last_version[1])
{
    $your_version.="<table width=\"100%\"><tr><td align=\"left\">Installed xbtitFM version:</td><td align=\"left\">v".implode(".",$current_version)."</td></tr>\n";
    $your_version.="<tr><td align=\"left\">Current xbtitFM version:</td><td align=\"left\">v".implode(".",$last_version)."</td></tr>\n";
    $your_version.="<tr><td colspan=\"2\" align=\"center\">You have an as yet unreleased version of xbtitFM (v".implode(".",$current_version)."), you must be special!</td></tr>\n</table>";
}
else
{
    $your_version.="You have the latest version of xbtitFM installed. (v".$tracker_version.")";
}

if (!empty($your_version))
   $your_version=set_block("Version","center",$your_version);

// check for news on xbtitFM site (read rss from comunication forum)

if($btit_url_rss!="")
{
    include("$THIS_BASEPATH/include/class.rssreader.php");

    $btit_news=get_cached_version($btit_url_rss);

    if (!$btit_news)
    {
        $frss=get_remote_file($btit_url_rss,"r",3);

        if (!$frss)
            $btit_news="<div class=\"blocklist\" style=\"padding:5px; align:center;\">Unable to contact xbtitFM's site</div>";
        else
        {
            $nrss=new rss_reader();
            $rss_array=$nrss->rss_to_array($frss);

            $btit_news="<div class=\"blocklist\" style=\"padding:5px;\">";
            if (!$rss_array)
                $btit_news="<div class=\"blocklist\" style=\"padding:5px;\">Unable to contact xbtitFM's site</div>";
            else
            {
                foreach($rss_array[0]["item"] as $id=>$rss)
                {
                    $btit_news.=date("d M Y",strtotime($rss["pubDate"])).":&nbsp;\n<a href=\"".$rss["guid"]."\">".$rss["title"]."</a><br />\n<br />\n";
                    $btit_news.="\n".$rss["description"]."<br />\n<hr />\n";
                }
            }
            $btit_news.="</div>";
        }
        write_cached_version($btit_url_rss,$btit_news);
    }
}
else
    $btit_news="<div class=\"blocklist\" style=\"padding:5px; align:center;\">Unable to contact xbtitFM's site</div>";

$btit_news=set_block("xbtitFM Latest News","center",$btit_news);

echo $your_version . $btit_news;

?>