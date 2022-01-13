<script type="text/javascript" src="jscript/btit_functions.js"></script>

  <form name='nzb' method='post' action='index.php?page=admin&user=<tag:uid />&code=<tag:random />&do=nzb'>
    <table class="lista" width="65%" cellspacing="0" cellpadding="0">
      <tr>	    
      <td class="header" align="center" colspan="4"><tag:language.USE_NZB /></td>
      </tr>   
      <tr>
      <td class="header"><tag:language.ENABLE_NZB /></td>
            <td class="lista" align="center"<tag:colspan />
	  <select name="nzb" style="background-color:<tag:nzb_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:nzb_enabled> selected="selected"</if:nzb_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:nzb_disabled> selected="selected"</if:nzb_disabled>><tag:language.ACP_DISABLED /></option>	    
	  </select></td>
      <tr>	    
      <td class="header" align="center" colspan="4"><tag:language. />White List User & Groups</td>
      </tr>   
      <tr>
      <td class="header"><tag:language. />Enable/Disable White Listed Users & Groups</td>
            <td class="lista" align="center"<tag:colspan />
	  <select name="nzb_whitelisted" style="background-color:<tag:nzb_whitelisted_color />color:#000000;"  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor" />
        <option value="enabled" style="background-color:#00FF00;color:#000000;"<if:nzb_whitelisted_enabled> selected="selected"</if:nzb_whitelisted_enabled>><tag:language.ACP_ENABLED /></option>
	    <option value="disabled" style="background-color:#FF0000;color:#000000;"<if:nzb_whitelisted_disabled> selected="selected"</if:nzb_whitelisted_disabled>><tag:language.ACP_DISABLED /></option>	    
	  </select></td>	  
</tr>
</table>
    <table class="lista" width="65%" cellspacing="0" cellpadding="0">     
      <tr>
      <td class="header" align="center" colspan="4"><tag:language.QUALITY_DROPBOXES />/td>
      </tr>
      <tr>
      <td class="header"><tag:language.DROPBOXES /></td>
      <td class="lista">&nbsp;enable&nbsp;<input type="radio" name="quality" value="true"<tag:config.qualityyes /> />&nbsp;disabled&nbsp;<input type="radio" name="quality" value="false"<tag:config.qualityno /> /></td>
     </tr>
     <tr>
      <td class="header"><tag:language.MOVIE_CATS /></td>
      <td class="lista"><input type="text" name="movie_cats" value="<tag:config.movie_cats />" size="15" /></td>
      <td class="header"><tag:language.MUSIC_CATS /></td>
      <td class="lista"><input type="text" name="music_cats" value="<tag:config.music_cats />" size="15" /></td>
      </tr>       		  	  
</table>
    <table class="lista" width="65%" cellspacing="0" cellpadding="0">
    	<tr>
      <tr>
      <td class="header" align="center" colspan="4"><tag:language.VIDEO_TRAILERS /></td>
      </tr>    	
      <td class="header"><tag:language.VIDEO_TRAILER /></td>
      <td class="lista">&nbsp;&nbsp;Enable&nbsp;<input type="radio" name="trailer" value="true"<tag:config.traileryes /> />&nbsp;&nbsp;Disable&nbsp;<input type="radio" name="trailer" value="false"<tag:config.trailerno /> /></td>
      <td class="header"><tag:language.UTUBE /></td>
      <td class="lista">&nbsp;&nbsp;Enable&nbsp;<input type="radio" name="yt" value="true"<tag:config.ytyes /> />&nbsp;&nbsp;Disable&nbsp;<input type="radio" name="yt" value="false"<tag:config.ytno /> /></td>
      </tr>
</table>
    <table class="lista" width="65%" cellspacing="0" cellpadding="0">
      <tr>
      <td class="header" align="center" colspan="4"><tag:language.IMDB_SYSTEM /></td>
      </tr>
      <tr>
      <td class="header"><tag:language.USE_IMDB_SYSTEM /></td>
      <td class="lista">&nbsp;&nbsp;Enable&nbsp;<input type="radio" name="imdb_sw" value="true"<tag:config.imdb_swyes /> />&nbsp;&nbsp;Disable&nbsp;<input type="radio" name="imdb_sw" value="false"<tag:config.imdb_swno /> /></td>
      <td class="header"><tag:language.USE_IMDB_RATING /></td>
     <td class="lista">&nbsp;&nbsp;Enable&nbsp;<input type="radio" name="imdb_ra" value="true"<tag:config.imdb_rayes /> />&nbsp;&nbsp;Disable&nbsp;<input type="radio" name="imdb_ra" value="false"<tag:config.imdb_rano /> /></td>
      </tr>
</table>   
<br /> 
<table class="lista" width="65%" cellspacing="0" cellpadding="0">
     <tr>
      <td align="center" class="header" colspan="2"><input type="submit" name="write" class="btn" value="<tag:language.FRM_CONFIRM />" /></td>
      <td align="center" class="header" colspan="2"><input type="submit" name="cancel" class="btn" value="<tag:language.FRM_CANCEL />" /></td>
    </tr>
</table>
</form> 