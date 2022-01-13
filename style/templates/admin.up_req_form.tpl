<script type="text/javascript" src="jscript/btit_functions.js"></script>
<div align='center'>
  <form name='config' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=up_req_form'>
    <table class="lista" width="100%" cellspacing="0" cellpadding="0">
      <tr>
      <td class="header" align="center" colspan="4"><tag:language.UPLOADER_SETTINGS /></td>
      </tr>
      <tr>
      <td class="header"><tag:language.STAFF_ID /></td>
      <td class="lista"><input type="text" name="up_id" value="<tag:config.up_id />" size="4" /></td>
      <td class="header"><tag:language.SEND_STAFF /></td>
      <td class="lista" align="center"<tag:colspan />
	  <select name="up_all" style="background-color:<tag:up_all_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:up_all_enabled> selected="selected"</if:up_all_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:up_all_disabled> selected="selected"</if:up_all_disabled>><tag:language.ACP_DISABLED /></option>	    
	  </select></td>
      </tr>
</table>    
<br /> 
<table width="40%" cellspacing="0" cellpadding="0">
    <tr>
  <td colspan="4" align="center"><input type="submit" value="<tag:language.SUBMIT />" /></td>
  </tr>
</form>  
</table>
</div>    