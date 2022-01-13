<div align='center'>
  <form name='torrent_list' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=torrent_list'>
    <table class="lista" width="35%" cellspacing="0" cellpadding="0">
    <tr>
      <td class="header" align="center" colspan="10"><tag:language.CHOOSE_LIST_PAGE /></td>
    </tr>
    <tr>
      <td class=""><tag:language.TORRENT_LIST /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="torrent_list" value="new"<if:new> checked="checked"</if:new> /><tag:language.MODE_NEW /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="torrent_list" value="classic"<if:classic> checked="checked"</if:classic> /><tag:language.MODE_CLASSIC /></td>
  </tr>  
</table>
<br /> 
<table width="35%" cellspacing="0" cellpadding="0">
    <tr>
  <td colspan=4 align=center><input type="submit" value="<tag:language.SUBMIT />" /></td>
  </tr>
</form>  
</table>
</div> 