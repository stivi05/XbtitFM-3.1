<div align='center'>
  <form name='loginpagetype' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=login_page'>
    <table class="lista" width="45%" cellspacing="0" cellpadding="0">
    <tr>
      <td class="header" align="center" colspan="10"><tag:language.CHOOSE_LOGIN_PAGE /></td>
    </tr>
    <tr>
      <td class="header"><tag:language.MODE_TYPE /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="altmode" value="new"<if:new> checked="checked"</if:new> /><tag:language.MODE_NEW /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="altmode" value="classic"<if:classic> checked="checked"</if:classic> /><tag:language.MODE_CLASSIC /></td>
  </tr> 
    <tr>
      <td class="header"><tag:language.LOGIN_PAGE_TYPES /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="loginpagetype" value="single"<if:single> checked="checked"</if:single> /><tag:language.SINGLE_BACKGROUND /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="loginpagetype" value="rotating"<if:rotating> checked="checked"</if:rotating> /><tag:language.ROTATING_BACKGROUND /></td>
  </tr>  
</table>
<br />
<if:new_1>          
    <table class="lista" width="45%" cellspacing="0" cellpadding="0">
<if:rules_with_groups_enabled_1>
    <tr>
      <td class="header"><tag:language.RULES_TYPES /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="altrulestype" value="kcdoff"<if:altrulestype_kcdoff> checked="checked"</if:altrulestype_kcdoff> /><tag:language.DEFAULT_RULES /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="altrulestype" value="kcdon"<if:altrulestype_kcdon> checked="checked"</if:altrulestype_kcdon> /><tag:language.CUSTOM_RULES /></td>
  </tr>
</if:rules_with_groups_enabled_1>
<if:faq_with_groups_enabled_1>
    <tr>
      <td class="header"><tag:language.FAQ_TYPES /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="altfaqtype" value="kcdoff"<if:altfaqtype_kcdoff> checked="checked"</if:altfaqtype_kcdoff> /><tag:language.DEFAULT_FAQ /></td>
      <td class="lista" align="center">&nbsp;<input type="radio" name="altfaqtype" value="kcdon"<if:altfaqtype_kcdon> checked="checked"</if:altfaqtype_kcdon> /><tag:language.CUSTOM_FAQ /></td>
  </tr>
</if:faq_with_groups_enabled_1> 
  <tr>
      <td class="header" align="center" colspan="4"><tag:language.ACP_DIS_TITLE /></td>
    </tr>
    <td class="header"><tag:language.ACP_HIDE /></td>
    <td class="header"<tag:colspan />><tag:language.STATUS /></td>
  </tr>
  <tr>
    <td class="lista" align="center">&nbsp;&nbsp;<tag:language.ACP_NEWS /></td>
    <td class="lista" align="center"<tag:colspan />>
	  <select name="alt_news" style="background-color:<tag:alt_news_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:alt_news_enabled> selected="selected"</if:alt_news_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:alt_news_disabled> selected="selected"</if:alt_news_disabled>><tag:language.ACP_DISABLED /></option>
	  </select>
	</td>
  </tr>
<if:rules_with_groups_enabled>  
  <tr>
    <td class="lista" align="center">&nbsp;&nbsp;<tag:language.ACP_RULES /></td>
    <td class="lista" align="center"<tag:colspan />>
	  <select name="alt_rules" style="background-color:<tag:alt_rules_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:alt_rules_enabled> selected="selected"</if:alt_rules_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:alt_rules_disabled> selected="selected"</if:alt_rules_disabled>><tag:language.ACP_DISABLED /></option>	    
	  </select>
	</td>
  </tr>
</if:rules_with_groups_enabled>
<if:faq_with_groups_enabled>    
  <tr>
    <td class="lista" align="center">&nbsp;&nbsp;<tag:language.ACP_FAQ /></td>
    <td class="lista" align="center"<tag:colspan />>
	  <select name="alt_faq" style="background-color:<tag:alt_faq_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled"  style="background-color:#00FF00;color:#000000;"<if:alt_faq_enabled> selected="selected"</if:alt_faq_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:alt_faq_disabled> selected="selected"</if:alt_faq_disabled>><tag:language.ACP_DISABLED /></option>	    
	  </select>
	</td>
</if:faq_with_groups_enabled>	
    <tr>  
    <td class='header' colspan='4' align='center'><b><tag:language.EN_DIS_ALL /></b></td>
  </tr>
  <tr>
    <td class='lista' colspan='4' style='text-align:center'>
    <tag:language.HACK_SET_ABOVE />: <input type='radio' name='enable_all' value='take_no_action' checked='checked' />&nbsp;&nbsp;|&nbsp;&nbsp;
    <tag:language.HACK_EN_ALL />: <input type='radio' name='enable_all' value='enable_all' />&nbsp;&nbsp;|&nbsp;&nbsp;
    <tag:language.HACK_DIS_ALL />: <input type='radio' name='enable_all' value='disable_all' />
    </td>
  </tr>	
</table>
</if:new_1>
<br /> 
<table width="40%" cellspacing="0" cellpadding="0">
    <tr>
  <td colspan=4 align=center><input type="submit" value="<tag:language.SUBMIT />" /></td>
  </tr>
</form>  
</table>
</div>    