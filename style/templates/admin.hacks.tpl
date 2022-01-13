<style>
div.scroller
{
width:75%;
height:600px;
overflow:auto;
}
#backgroundPopup{
display:none;
position:fixed;
_position:absolute; /* hack for internet explorer 6*/
height:100%;
width:100%;
top:0;
left:0;
background:#000000;
border:1px solid #cecece;
z-index:1;
}
#popupContact{
display:none;
position:fixed;
_position:absolute; /* hack for internet explorer 6*/
height:384px;
width:550px;
background:#FFFFFF;
border:2px solid #cecece;
z-index:2;
padding:12px;
font-size:13px;
}
#popupContact h1{
text-align:left;
color:#6FA5FD;
font-size:22px;
font-weight:700;
border-bottom:1px dotted #D3D3D3;
padding-bottom:2px;
margin-bottom:20px;
}
#popupContactClose{
font-size:14px;
line-height:14px;
right:6px;
top:4px;
position:absolute;
color:#6fa5fd;
font-weight:700;
display:block;
}
#popupContactBack{
font-size:14px;
line-height:14px;
right:6px;
top:35px;
position:absolute;
color:#6fa5fd;
font-weight:700;
display:block;
}
</style>
<script src="jscript/imdb.js" type="text/javascript"></script>
<script src="jscript/popup.js" type="text/javascript"></script>
<div align=center>
<br />
<tag:language.HACK_INFO />
<br /><br /><div id="button"><input type="submit" value="Info of all Hacks" /></div><br />
<div id="popupContact">
		<a id="popupContactClose">x</a>
		<h1><tag:language.HACK_INFOMATION /></h1><a id="popupContactBack" href="hack_info.php" target="myframe"><tag:language.HACK_HOME /></a>

		<p id="contactArea">
			<iframe id="myframe" name="myframe" class="autoHeight" height="300px" width="99%" scrolling="auto" frameborder="0" src="hack_info.php"></iframe>
			<br/><br/>
			
			
		</p>
	</div>

	<div id="backgroundPopup"></div>
<form name="test" action="index.php?page=admin&amp;user=<tag:uid />&code=<tag:random />&do=hacks&action=read" method="post">
<div class="scroller">
<table class="lista" width="75%" cellspacing="1" cellpadding="6">
  <tr>
    <td class="header"><tag:language.DESCRIPTION /></td>
    <td class="header"><tag:language.HACK_VERSION /></td>
    <td class="header"><tag:language.HACK_AUTHOR /></td>
    <td class="header"><tag:language.HACK_STATUS /></td>
  </tr>

  <cloop:hack>  
  <case:enabled>
  <tr>
    <td class="lista"><tag:hack[].longname /></td>
    <td class="lista"><tag:hack[].version /></td>
    <td class="lista"><tag:hack[].author /></td>
    <td class="lista">
	  <select name="<tag:hack[].shortname />" style="background-color:#00FF00;color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled"  style="background-color:#00FF00;color:#000000;" selected><tag:language.HACK_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"><tag:language.HACK_DISABLED /></option>
	  </select>
	</td>
  </tr>
  </case:enabled>
  <case:disabled>
  <tr>
    <td class="lista"><tag:hack[].longname /></td>
    <td class="lista"><tag:hack[].version /></td>
    <td class="lista"><tag:hack[].author /></td>
    <td class="lista">
	  <select name="<tag:hack[].shortname />" style="background-color:#FF0000;color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"><tag:language.HACK_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;" selected><tag:language.HACK_DISABLED /></option>
	  </select>
	</td>
  </tr>
  </case:disabled>
  </cloop:hack>
</table></div>
<table class="lista" width="75%" cellspacing="1" cellpadding="6">
    <tr>
    <td class='header' colspan='4' align='center'><b><tag:language.HACK_EN_DIS_ALL /></b></td>
  </tr>
  <tr>
    <td class='lista' colspan='4' style='text-align:center'>
    <tag:language.HACK_SET_ABOVE />: <input type='radio' name='enable_all' value='take_no_action' checked='checked' />&nbsp;&nbsp;|&nbsp;&nbsp;
    <tag:language.HACK_EN_ALL />: <input type='radio' name='enable_all' value='enable_all' onclick="alert('<tag:language.HACK_ENABLE_ALL_WARN />')" />&nbsp;&nbsp;|&nbsp;&nbsp;
    <tag:language.HACK_DIS_ALL />: <input type='radio' name='enable_all' value='disable_all' />
    </td>
  </tr>
  <tr>
  <td colspan=4 class=blocklist align=center><input type="submit" value="<tag:language.SUBMIT />" /></td>
  </tr>
</form>  
</table>
<br /><br />
<tag:language.HACK_INFO_2 />
<br /><br />
</div>
