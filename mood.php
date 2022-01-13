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
dbconn(false);
global $CURUSER;
//get current style
  $resheet=sql_query("SELECT * FROM {$TABLE_PREFIX}style where id=".$CURUSER["style"]."");
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
if (isset($CURUSER) && $CURUSER && $CURUSER["uid"]>1)
  {
echo'<html><head>';
?>
<title><?php=$CURUSER["username"]?> Update Your mood</title>
<link rel="stylesheet" type="text/css" href="<?php=$STYLEURL?>/main.css" />
</head>
<body class="lista">
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td class=header align=center valign=middle>How do you feel today?</td></tr><tr>
<?php
$utables="{$TABLE_PREFIX}users u";
$moody=sql_query("SELECT * FROM $utables LEFT JOIN {$TABLE_PREFIX}mood m ON u.mood=m.id  WHERE u.id=".$CURUSER["uid"]);
   $get=mysqli_num_rows($moody);
   $find=mysqli_fetch_assoc($moody);
print("<td class=blocklist><center><br><img src=images/smilies/".$find["pic"]."><br><br></td>");

unset($moody);
  print("<form name=\"jump1\" action=\"index.php\" method=\"post\">\n");
?>

</tr>
<tr>
<?php
$mood=mood_list();

print("\n<td class=blocklist style=\"text-align:center;\"><select name=\"mood\" size=\"1\" onchange=\"location=document.jump1.mood.options[document.jump1.mood.selectedIndex].value\">");
foreach($mood as $a)
               {
               print("<option ");
               if ($a["id"]==$CURUSER["mood"])
                  print("selected=\"selected\"");
               print(" value=\"account_change.php?mood=".$a["id"]."&amp;returnto=".urlencode($_SERVER['REQUEST_URI'])."\">".$a["mlevel"]."</option>");
               }
print("</select></td>");



?>

</tr>
<tr><td class=blocklist><br><br><center><a href="index.php" onclick="parent.parent.GB_hide();">[Close]</a></a>

</center></tr></tr>
</table>
</form>

</body>
</html>
<?php
}
?>
