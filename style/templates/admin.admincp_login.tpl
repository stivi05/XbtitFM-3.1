<script type="text/javascript" src="jscript/btit_functions.js"></script>
<div align='center'>
  <form name='config' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=admincp_login'>
    <table class="lista" width="75%" cellspacing="0" cellpadding="0">
      <tr>
      <td class="header" align="center" colspan="4"><tag:language.ADMIN_LOGIN /></td>
      </tr>
      <tr>
   	  <td class="header"><tag:language.ENABLE_DISABLE_LOGIN /></td>
      <td class="lista" align="center"<tag:colspan />
	    <select name="acp" style="background-color:<tag:acp_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
      <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:acp_enabled> selected="selected"</if:acp_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:acp_disabled> selected="selected"</if:acp_disabled>><tag:language.ACP_DISABLED /></option>	    
  	  </select></td>
   	  </tr>   	  
      <tr>
      <td class="header"><tag:language.USERNAME_1 /></td>
      <td class="lista"><input type="text" name="un1" value="<tag:config.un1 />" size="4" /></td>
	    <td class="header"><tag:language.PASSWORD_1 /></td>
      <td class="lista"><input type="text" name="pw1" value="<tag:config.pw1 />" size="4" /></td>
      </tr>      
      <tr>
      <td class="header"><tag:language.USERNAME_2 /></td>
      <td class="lista"><input type="text" name="un2" value="<tag:config.un2 />" size="4" /></td>
	    <td class="header"><tag:language.PASSWORD_2 /></td>
      <td class="lista"><input type="text" name="pw2" value="<tag:config.pw2 />" size="4" /></td>
      </tr>
    <tr>
  <td colspan="4" align="center"><input type="submit" value="<tag:language.SUBMIT />" />   <input type="submit" value="<tag:language.FRM_CANCEL />" /></td>
  </tr>
</form>  
</table>
</div>   