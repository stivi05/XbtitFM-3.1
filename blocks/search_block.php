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


global $CURUSER;

if($CURUSER["uid"]>1){
require(load_language("lang_main.php"));



$category = (!isset($_GET["category"])?0:explode(";",$_GET["category"]));
// sanitize categories id
if (is_array($category))
    $category = array_map("intval",$category);
else
    $category = 0;

$combo_categories=categories( $category[0] );
?><style type="text/css" media="screen">
			
.suggest_link {
background-color: #FFFFFF;
padding: 2px 6px 2px 6px;
color:black;
font-weight:bolder;
}
.suggest_link_over {
background-color: #3366CC;
padding: 2px 6px 2px 6px;
color:white;
font-weight:bolder;
}
.search_suggest {
position: absolute; 
background-color: #FFFFFF; 
text-align: left;
border: 1px solid #000000;
}		
</style>
<script type="text/javascript">

function getXmlHttpRequestObject() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	} else {
		alert("Your Browser Sucks!\nIt's about time to upgrade don't you think?");
	}
}

//Our XmlHttpRequest object to get the auto suggest
var searchReq = getXmlHttpRequestObject();

//Called from keyup on the search textbox.
//Starts the AJAX request.
function searchSuggest() {
	if (searchReq.readyState == 4 || searchReq.readyState == 0) {
		var str = escape(document.getElementById('search').value);
		searchReq.open("GET", 'torrsearch.php?txt=' + str, true);
		searchReq.onreadystatechange = handleSearchSuggest; 
		searchReq.send(null);
	}		
}

//Called when the AJAX response is returned.
function handleSearchSuggest() {
	if (searchReq.readyState == 4) {
		var ss = document.getElementById('search_suggest')
		ss.innerHTML = '';
		var str = searchReq.responseText.split("\n");
		for(i=0; i < str.length - 1; i++) {
			//Build our element string.  This is cleaner using the DOM, but
			//IE doesn't support dynamically added attributes.
			var suggest = '<div onmouseover="javascript:suggestOver(this);" ';
			suggest += 'onmouseout="javascript:suggestOut(this);" ';
			suggest += 'onclick="javascript:setSearch(this.innerHTML);" ';
			suggest += 'class="suggest_link">' + str[i] + '</div>';
			ss.innerHTML += suggest;
		}
	}
}

//Mouse over function
function suggestOver(div_value) {
	div_value.className = 'suggest_link_over';
}
//Mouse out function
function suggestOut(div_value) {
	div_value.className = 'suggest_link';
}
//Click function
function setSearch(value) {
	document.getElementById('search').value = value;
	document.getElementById('search_suggest').innerHTML = '';
}
</script>
<?php
echo'<center>
 <form action="index.php" method="get" name="torrent_search">
<input type="hidden" name="page" value="torrents" />
   <table border="0" class="lista" align="center">
    <tr>
      <td class="block">'.$language["TORRENT_SEARCH"].'</td>
      <td class="block">'.$language["CATEGORY_FULL"].'</td>
      <if:ash_enabled_1>
      <td class="block">'.$language["TORRENT_OPTIONS"].'</td>
     <td class="block">&nbsp;</td>
    </tr>
    <tr>
      <td><input type="text" name="search" id="search" size="25" maxlength="50" onkeyup="searchSuggest();" autocomplete="off"/>
      <div id="search_suggest"></div></td>
      <td>
        '.$combo_categories.'
      </td>
       <td>
        <select name="active" size="1">
        <option value="0" '.($active==0?"selected=\"selected\"":"").'>'.$language["ALL"].'</option>
        <option value="1" '.($active==1?"selected=\"selected\"":"").'>'.$language["ACTIVE_ONLY"].'</option>
        <option value="2" '.($active==2?"selected=\"selected\"":"").'>'.$language["DEAD_ONLY"].'</option>
        </select>
      </td>
      <td><input type="submit" class="btn" value="'.$language["SEARCH"].'" /></td>
     </tr>
  </table>
</form></center>';

}
?>
<?php

print("<div id='search_block'>");
global $btit_settings; ?>
  <table border="0" align="center" class="blocklist">
<form action="index.php" method="get" name="viewrequests_search">
  <input type="hidden" name="page" value="viewrequests" />
   <td><input
      onfocus="if (this.value == 'Requests') this.value='';"
   onblur="if(this.value == '') this.value='Requests';"
      type="text" name="Search" size="12" maxlength="50" value="Requests" /></td>
</form>
  <form action="index.php" method="get" name="user_search">
  <input type="hidden" name="page" value="users" />
      <td><input
      onfocus="if (this.value == 'Users') this.value='';"
          onblur="if(this.value == '') this.value='Users';"
      type="text" name="searchtext" size="12" maxlength="50" value="Users" /></td>
      <input type="hidden" name="level" value="0" />
  </form>
 <?php
  if ($btit_settings["forum"]=="smf") { ?>
  <form action="index.php?" method="get" name="smf_forum_search">
  <input type="hidden" name="page" value="forum" />
  <input type="hidden" name="action" value="search2" />
  <td><input
   onfocus="if (this.value == 'Forums') this.value='';"
   onblur="if(this.value == '') this.value='Forums';"
  type="text" name="Search" size="12" maxlength="50" value="Forums" /></td>
  </form>
<?php
 } elseif ($btit_settings["forum"]=="") { ?>
          <form action="index.php" method="get" name="xbtit_forum_search">
  <input type="hidden" name="page" value="forum" />
  <input type="hidden" name="action" value="Search" />
      <td><input
      onfocus="if (this.value == 'Forums') this.value='';"
      onblur="if(this.value == '') this.value='Forums';"
      type="text" name="keywords" size="12" maxlength="50" value="Forums" /></td>
  </form>
<?php
 }
?>
<form id="searchform" name="sform" method="get" action="http://www.tvrage.com/search.php" target="_blank">
	<td>
<input type="text" value="TVRage" size="12" name="search">
  </td>
</form>
  <form action="http://www.imdb.com/find?s=all&q=" target="_blank" method="get" name="imdb_search">
      <td><input
      onfocus="if (this.value == 'IMDB') this.value='';"
      onblur="if(this.value == '') this.value='IMDB';"
      type="text" name="q" size="12" maxlength="50" value="IMDB" /></td>
  </form>
<form action="http://www.google.com/search" target="_blank" method="get" name="google_search">
      <td><input
      onfocus="if (this.value == 'Google') this.value='';"
      onblur="if(this.value == '') this.value='Google';"
      type="text" name="q" size="12" maxlength="50" value="Google" /></td>
  </form>
</table></div>
  <?php
   
   ?>