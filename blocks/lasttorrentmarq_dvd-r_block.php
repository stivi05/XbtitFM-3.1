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


global  $CURUSER , $XBTT_USE , $TABLE_PREFIX, $btit_settings;

if (!$CURUSER)

   {

       // do nothing

   }

else

   {

 if ($XBTT_USE)

   {

    $tseeds="f.seeds+ifnull(x.seeders,0)";

    $tleechs="f.leechers+ifnull(x.leechers,0)";

    $tcompletes="f.finished+ifnull(x.completed,0)";

    $ttables="{$TABLE_PREFIX}files f LEFT JOIN xbt_files x ON x.info_hash=f.bin_hash";

   }

else

    {

    $tseeds="f.seeds";

    $tleechs="f.leechers";

    $tcompletes="f.finished";

    $ttables="{$TABLE_PREFIX}files f";

    }

	  

$lim=20;

$res=do_sqlquery("SELECT f.info_hash, f.filename, c.name as cat, f.category as catid, $tseeds as seeds, $tleechs as leechers, $tcompletes as finished, f.image FROM $ttables INNER JOIN {$TABLE_PREFIX}categories c on c.id=f.category WHERE f.image !='' AND `f`.`category` IN('13') AND f.moder='ok' ORDER BY f.data DESC LIMIT ".$lim."");

if(@mysqli_num_rows($res)>0)

{

    echo "<div align='center'><table border='0' align='center' cellpadding='2' cellspacing='2' width='100%'><tr><td><marquee direction='left' onmouseover='this.stop()' onmouseout='this.start()'>";
while($result=mysqli_fetch_array($res))

   {

    echo "<table border='0' align='left' cellpadding='2' cellspacing='2' 
    ><tr><td>";
    
    echo "<tr><td align='center'><font color = blue> ".wordwrap($result["filename"],10, "\n", true)."</td></tr>"; 
    echo "<tr><td align='center'><A HREF=\"index.php?page=torrent-details&id=".$result["info_hash"]."\" title=\"".$language["TORRENT_DETAILS"].": ".$result["filename"]."\"><img src=\"thumbnail.php?size=200&path=torrentimg/".$result["image"]."\" height=\"200px\"></A></td></tr>";

    echo "<tr><td align='center'><center><a href='index.php?page=torrents&category=".$result["catid"]."'>".$result["cat"]."</a></td></tr>";
    echo "<tr><td align='center'><font color = green><b>S: ".$result["seeds"]."</font>-- <font color = red>L: ".$result["leechers"]."</font>--<font color = steelblue>F: ".$result["finished"]."<tr><td>";
    echo "</center></tr></td></table>";

}

    echo "</marquee></td></tr></table></div>\n";

} }



?>