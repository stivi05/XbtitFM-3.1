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

require_once("include/functions.php");

dbconn(true);

global $TABLE_PREFIX, $CURUSER, $language, $btit_settings;

if($btit_settings["fmhack_SEO_panel"]=="enabled")
{
    $active_seo = get_result("SELECT `activated`, `str`, `strto` FROM `{$TABLE_PREFIX}seo` WHERE `id`='1'", true, $btit_settings["cache_duration"]);
    $res_seo=$active_seo[0];
}

require_once(dirname(__FILE__).load_language("lang_main.php"));

if($CURUSER["can_upload"]=="yes" && $CURUSER["uid"]>1)
{
    $q=urldecode($_GET["q"]);

    //Do a str_replace to remove .torrent extension if applicable
    $q=str_replace(".torrent","",$q);
    //replace common separators with spaces
    $q=str_replace(array(".", "_","-"), array(" ", " ", " "), $q);
    // Remove other annoyances
    $q=preg_replace("/[^A-Za-z0-9 ]/","",$q);
    
    $q=explode(" ",$q);
    $q2=$q;

    $like="";

    foreach ($q as $search)
    {
        // Remove common words such as 'and', 'the' etc. from the array
        if(strtolower($search)=="and" || strtolower($search)=="the" || strtolower($search)=="of" || strtolower($search)=="a" || $search=="" || strtolower($search)=="r5" || strtolower($search)=="dvdrip" || strtolower($search)=="ac3" || strtolower($search)=="xvid" || strtolower($search)=="dvdscr" || strtolower($search)=="divx" || strtolower($search)=="vcd" || strtolower($search)=="svcd" || strtolower($search)=="hdtv" || strtolower($search)=="pdtv" || strtolower($search)=="cam" || strtolower($search)=="ts" || strtolower($search)=="tc")
            unset($q2[$id]);
        // Or add a new search parameter to the query
        else
            $like.="`filename` LIKE '%".mysqli_real_escape_string($GLOBALS['conn'],$search)."%' OR ";
    }
    // Trim the final OR off the end
    $like=trim($like, "OR ");

    if($like!="")
    {
        // Define the query   
        $sql="SELECT ".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated"]=="true")?"`id` `fileid`, ":"")."`filename`, `info_hash` FROM `{$TABLE_PREFIX}files` WHERE $like";

        // Run the query
        $result = do_sqlquery($sql,true);

        // Create a new array containing the info_hash, filename and number of hits for each found result
        $i=0;
        $j=0;
        $hitcount=array();
        $indexes=array();

        while($row = mysqli_fetch_array($result))
        {
            foreach($q2 as $search)
            {
                if($search)
                {
                    if(strpos(" ".strtolower($row["filename"]),strtolower($search)))
                    $i++;
                }
            }
            $hitcount[$j]["info_hash"]=$row["info_hash"];
            $hitcount[$j]["filename"]=$row["filename"];
            if($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated"]=="true")
            {
                $hitcount[$j]["fileid"]=$row["fileid"];
            }
            $hitcount[$j]["count"]=$i;
            $indexes[$j]["count"]=$i;
            $i=0;
            $j++;
        }
        arsort($indexes);
 
        // Build the final array with what should be the top 5 hits
        $final_list=array();
        $i=0;
        $j=0;
        foreach($indexes as $k => $v)
        {
            if($i<=4)
            {
                $final_list[$j]["info_hash"]=$hitcount[$k]["info_hash"];
                $final_list[$j]["filename"]=$hitcount[$k]["filename"];
                if($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated"]=="true")
                {
                    $final_list[$j]["fileid"]=$hitcount[$k]["fileid"];
                }
                $final_list[$j]["count"]=$v;
                $i++;
                $j++;
            }
        }
        // And finally output the results
        if(count($final_list)>0)
        {
            echo"<br /><table border='1' width='50%' align='left'>";
            echo"<tr><td class='header'>".$language["TOP_MATCHES"]."</td></tr>";
            foreach($final_list as $v)
            {
                echo "<tr><td class='lista'><a href='".(($btit_settings["fmhack_SEO_panel"]=="enabled" && $res_seo["activated"]=="true")?strtr($v["filename"], $res_seo["str"], $res_seo["strto"])."-".$v["fileid"].".html":"index.php?page=torrent-details&id=".$v["info_hash"])."'>" . $v["filename"] . "</a></td></tr>";
            }
            echo"</table>";
        }
        @mysqli_free_result($result);
    }
}

?>