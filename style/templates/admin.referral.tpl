<script type="text/javascript" src="jscript/btit_functions.js"></script>
<div align='center'>
  <form name='config' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=referral'>
    <table class="lista" width="100%" cellspacing="0" cellpadding="0">
      <tr>
      <td class="header" align="center" colspan="4"><tag:language.REFERRAL_SYSTEM_SETTINGS /></td>
    </tr>
    <tr>
    <td class="header"><tag:language.ENABLE_REFERRAL_SYSTEM /></td>
     <td class="lista">  enable <input type="radio" name="ref_on" value="true"<tag:config.ref_onyes /> />  disabled <input type="radio" name="ref_on" value="false"<tag:config.ref_onno /> /></td>
     <td class="header"><tag:language.REFERRAL_BONUS /></td>
      <td class="lista">  <tag:language.GB /> <input type="radio" name="ref_switch" value="true"<tag:config.ref_switchyes /> />  <tag:language.SB /> <input type="radio" name="ref_switch" value="false"<tag:config.ref_switchno /> /></td>
     </tr>
     <tr>
      <td class="header"><tag:language.BONUS_IN_GB /></td>
      <td class="lista"><input type="text" name="ref_gb" value="<tag:config.ref_gb />" size="7" /></td>
      <td class="header"><tag:language.BONUS_IN_SB /></td>
      <td class="lista"><input type="text" name="ref_sb" value="<tag:config.ref_sb />" size="7" /></td>
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