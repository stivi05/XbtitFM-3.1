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

global $XBTT_USE, $btit_settings, $CURUSER, $language;
if($CURUSER["uid"]<3 && $CURUSER["view_torrents"]=="yes")
{

  $query = "SELECT recommended.*, files.seeds, files.leechers, files.info_hash as hash, files.filename, files.anonymous, UNIX_TIMESTAMP( files.data ) as added, categories.image, categories.name as cname, files.category as catid, files.size, files.external, files.uploader, users.username as uploader , ul.prefixcolor, ul.suffixcolor FROM {$TABLE_PREFIX}recommended recommended LEFT JOIN {$TABLE_PREFIX}files files ON recommended.info_hash = files.info_hash LEFT JOIN {$TABLE_PREFIX}categories categories ON categories.id = files.category LEFT JOIN {$TABLE_PREFIX}users users ON users.id = files.uploader LEFT JOIN {$TABLE_PREFIX}users_level ul ON users.id_level=ul.id ORDER by 'recommended.id' DESC LIMIT 10";
  $res = do_sqlquery($query) or die(mysqli_error($GLOBALS['conn']));
?>
<table width=100%>
<tr>
<td align="center" class="header"><?php echo $language["CATEGORY"]?></td>
<td align="center" class="header"><?php echo $language["FILE"]?></td>
<td align="center" class="header"><?php echo $language["DOWN"]?></td>
<td align="center" class="header"><?php echo $language["ADDED"]?></td>
<td align="center" class="header"><?php echo $language["SIZE"]?></td>
<td align="center" class="header"><?php echo $language["UPLOADER"]?></td>
<td align="center" class="header"><?php echo $language["SHORT_S"]?></td>
<td align="center" class="header"><?php echo $language["SHORT_L"]?></td>
<td align="center" class="header"><?php echo $language["REC_BY"]?></td>
</tr>
<?php
  foreach($res as $results)
   {
      echo "<tr>";
      echo "<td align=\"center\" class=\"lista\"><center><a href=\"index.php?page=torrents&amp;category=$results[catid]\">".image_or_link(($results["image"]==""?"":"$STYLEPATH/images/categories/" . $results["image"]),"",$results["cname"])."</td>";
   if ($GLOBALS["usepopup"])
   
         echo "<td align=\"left\" class=\"lista\"><A HREF=\"javascript:popdetails('index.php?page=torrent-details&amp;id=".$results["hash"]."');\">".$results["filename"]."</a>".($results["external"]=="no"?"":" (<span style=\"color:red\">EXT</span>)")."</td>";
   else
         echo "<td align=\"left\" class=\"lista\"><A HREF=\"index.php?page=torrent-details&amp;id=".$results["hash"]."\">".$results["filename"]."</a>".($results["external"]=="no"?"":" (<span style=\"color:red\">EXT</span>)")."</td>";
      echo "<td align=\"center\" class=\"lista\"><center><a href=\"index.php?page=downloadcheck&amp;id=".$results["hash"]."\">".image_or_link("images/download.gif","","torrent")."</a></td>";
      echo "<td align=\"center\" class=\"lista\"><center>" . date("d/m/Y",$results["added"]) . "</td>"; // data
      echo "<td align=\"center\" class=\"lista\"><center>" . makesize($results["size"]) . "</td>";
   if ($results["anonymous"] == "true")
         echo "<td align=\"center\" class=\"lista\">" . ANONYMOUS . "</td>";
   else
         echo "<td align=\"center\" class=\"lista\"><center>" .$results["prefixcolor"].$results["uploader"] .$results["suffixcolor"]. "</td>";
       if ($GLOBALS["usepopup"])
         {
           echo "\t<td align=\"center\" class=\"".linkcolor($results["seeds"])."\"><a href=\"javascript:poppeer('peers.php?id=".$results["hash"]."');\" title=\"".PEERS_DETAILS."\">" . $results["seeds"] . "</a></td>\n";
           echo "\t<td align=\"center\" class=\"".linkcolor($results["leechers"])."\"><a href=\"javascript:poppeer('peers.php?id=".$results["hash"]."');\" title=\"".PEERS_DETAILS."\">" .$results["leechers"] . "</a></td>\n";
         }
       else
         {
           echo "\t<td align=\"center\" class=\"".linkcolor($results["seeds"])."\"><a href=\"peers.php?id=".$results["hash"]."\" title=\"".PEERS_DETAILS."\">" . $results["seeds"] . "</a></td>\n";
           echo "\t<td align=\"center\" class=\"".linkcolor($results["leechers"])."\"><a href=\"peers.php?id=".$results["hash"]."\" title=\"".PEERS_DETAILS."\">" .$results["leechers"] . "</a></td>\n";
         }
      echo "<td align=\"center\" class=\"lista\"><center>" . $results["user_name"] ."</td>";  
echo"</tr>";
   }
echo "</table>";

print("<br />");
print("<br />");
}
?>

