<script type="text/javascript" src="jscript/btit_functions.js"></script>
<form name='config' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=invalid_login'>
  <table class="lista" width="100%" align="center">
    <tr>
      <td class="header" align="center" colspan="4"><tag:language.ACP_INVALID_SETTINGS /></td>
    </tr>
    <tr>
      <td class="header"><tag:language.ACP_ALLOWED /></td>
      <td class="lista"><input type="text" name="attempts_login" value="<tag:config.attempts_login />" size="4" /></td>
          <td class="header"><tag:language.ACP_ENABLE_INVALID /></td>
     <td class="lista" align="center"<tag:colspan />
	  <select name="invalid_login" style="background-color:<tag:invalid_login_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:invalid_login_enabled> selected="selected"</if:invalid_login_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:invalid_login_disabled> selected="selected"</if:invalid_login_disabled>><tag:language.ACP_DISABLED /></option>	    
	  </select></td>    
     </tr>        
     <tr>
     <td colspan="4" align="center"><input type="submit" value="<tag:language.SUBMIT />" /></td>
     </tr>
</form>  
</table>


