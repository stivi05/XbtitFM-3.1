<div align="center">
  <form<if:tmod1_enabled> id="postmodify"</if:tmod1_enabled><if:nfo_enabled> enctype="multipart/form-data"</if:nfo_enabled> action="<tag:torrent.link />" method="post" name="edit" <if:imageup_enabled>enctype="multipart/form-data"</if:imageup_enabled> >
    <table class="lista">
      <tr>
        <td align="right" class="header"><tag:language.FILE /></td>
        <td class="lista"><input type="text" name="name" value="<tag:torrent.filename />" size="60" /><if:nfo_enabled2><br /><tag:torrent.nfo /></if:nfo_enabled2></td>
      </tr>

      <if:bump_enabled>
      <tr>
        <td align="right" class="header"><tag:language.BUMP_THIS_TORR /></td>
        <td class="lista"><tag:language.YES />&nbsp;<input type="radio" name="bump_torr" value="yes" />&nbsp;&nbsp;&nbsp;&nbsp;<tag:language.NO />&nbsp;<input type="radio" name="bump_torr" value="no"  checked="checked" /></td>
      </tr>
      </if:bump_enabled>

      <if:ddl_enabled>
      <tr>
        <td align="right" class="header"><tag:language.DIRECT_LINK /></td>
        <td class="lista"><input type="text" name="direct_link" value="<tag:torrent.direct_link />" size="60" maxlength="255" /></td>
      </tr>
      </if:ddl_enabled>

      <if:st_comm_enabled>
      <if:LEVEL_SC>
      <tr>
      <td class="header"><tag:language.STAFF_COMMENT /></td>
      <td class="lista" align="left"><textarea name="staff_comment" rows="3" cols="45"><tag:staff_comment /></textarea></td>
      </tr>
      </if:LEVEL_SC>
      </if:st_comm_enabled>

      <if:tmod2_enabled>
      <script language="JavaScript" type="text/javascript">
        var icon_urls = {
        "ok": "images/mod/ok.png",
        "bad": "images/mod/bad.png",
        "um": "images/mod/um.png",
        };
      function showimage()
      {
          document.images.icons.src = icon_urls[document.forms.postmodify.icon.options[document.forms.postmodify.icon.selectedIndex].value];
      }
      </script>
    
      <tr>
        <td class="header"><tag:language.TORRENT_MODERATION /></td>
        <td class="lista"><tag:torrent.moder /></td>
      </tr>
      </if:tmod2_enabled>

      <if:tvdb_enabled>
      <tr>
        <td align="right" class="header"><tag:language.TVDB_UL_TITLE /></td>
        <td class="lista" align="left"><tag:language.TVDB_UL_1 /> <input type="text" name="tvdb_number" value="<tag:tvdb_id />" size="10" maxlength="10" /> <tag:language.TVDB_UL_2 /></td>
      </tr>
      </if:tvdb_enabled>

      <if:imdb_enabled>
      <tr>
        <td align="right" class="header">IMDB</td>
        <td class="lista" align="left"><input type="text" name="imdb" value="<tag:torrent.imdb />" size="10" maxlength="200" />&nbsp; <tag:language.IMDB_EDIT_FORM /></td>
      </tr>
      </if:imdb_enabled>

      <tr>
        <td align="right" class="header"><tag:language.INFO_HASH /></td>
        <td class="lista"><tag:torrent.info_hash /></td>
      </tr>
      

      <if:imageup_enabled>
      <if:imageon>
      <tr>
      <td class="header" ><tag:language.IMAGE /> (<tag:language.FACOLTATIVE />):<input type="hidden" name="userfileold" value="<tag:torrent.image />" /></td>
      <td class="lista" align="left"><input type="file" name="userfile" size="15" /></td>
      </tr>
      </if:imageon>
      </if:imageup_enabled>
      <tr>
        <td align="right" class="header"><tag:language.DESCRIPTION /></td>
        <td class="lista"><tag:torrent.description /></td>
      </tr>

      <if:media_enabled>
      <tr>
        <td align="right" class="header"><tag:language.MPLAYER /></td>
        <td class="lista" align="left"><input type="text" name="mplayer" value="<tag:torrent.mplayer />" size="50" maxlength="500" /></td>
      </tr>
      </if:media_enabled>

    <!-- whitelist users -->
<script type="text/javascript">

function form_submit(form) { 
    
    e = document.getElementById('chosen'); 
    if(e) { o = e.options; 
        for(var i=0; i<o.length; i++) 
            o[i].selected =true; 
    }

    eg = document.getElementById('choseng'); 
    if(eg) { og = eg.options; 
        for(var i=0; i<og.length; i++) 
            og[i].selected =true; 
    }
    
    return true; 
}

function shuttle(id1, id2) { 
    var el1 = document.getElementById(id1); 
    var el2 = document.getElementById(id2); 
    for(var i=0; i<el1.options.length; i++) { 
        if (el1.options[i].selected) { 
            el2.options[el2.options.length] = new Option(el1.options[i].text, el1.options[i].value); 
            el1.options[i] = null; 
            i--; 
        } 
    } 
}

</script>    
    <tr>
        <td class="header">Make Exclusive</td>
        <td class="lista"><input type="checkbox" name="exclusive" value="1" <tag:exclusivechecked /> /> Make this torrent exclusive</td>
    </tr>
    <tr>
        <td class="header" style="vertical-align: top">Exclusive Users</td>
        <td class="lista">
            <table style="border: none;">
            <tbody>
            <tr>
                <th style="vertical-align: top">Available Users<br />
                <select id="avail" name="avail[]" multiple="" size="10" style="width: 200px" ondblclick="shuttle('avail', 'chosen')">
                    <tag:available_users />
                </select>
                </th>
                <th style="vertical-align: middle">
                    <input type="button" onclick="shuttle('avail', 'chosen')" value="&gt;" />
                    <br />
                    <br />
                    <input type="button" onclick="shuttle('chosen', 'avail')" value="&lt;" />
                </th>
                <th style="vertical-align: top">Exclusive Users<br />
                    <select id="chosen" name="chosen[]" multiple="" size="10" style="width: 200px" ondblclick="shuttle('chosen', 'avail')">
                        <tag:choosen_users />
                    </select>
                </th>
            </tr>
            </tbody>
            </table>
        </td>
    </tr>
    <!-- groups -->
    <tr>
        <td class="header" style="vertical-align: top">Exclusive Groups</td>
        <td class="lista">
            <table style="border: none;">
            <tbody>
            <tr>
                <th style="vertical-align: top">Available Groups<br />
                <select id="availg" name="availg[]" multiple="" size="10" style="width: 200px" ondblclick="shuttle('availg', 'choseng')">
                    <tag:available_groups />
                </select>
                </th>
                <th style="vertical-align: middle">
                    <input type="button" onclick="shuttle('availg', 'choseng')" value="&gt;" />
                    <br />
                    <br />
                    <input type="button" onclick="shuttle('choseng', 'availg')" value="&lt;" />
                </th>
                <th style="vertical-align: top">Exclusive Groups<br />
                    <select id="choseng" name="choseng[]" multiple="" size="10" style="width: 200px" ondblclick="shuttle('choseng', 'availg')">
                        <tag:choosen_groups />
                    </select>
                </th>
            </tr>
            </tbody>
            </table>
        </td>
    </tr>    
    <!-- whitelist users -->
      
      <tr>
        <td align="right" class="header"><tag:language.ANONYMOUS /></td>
        <td class="lista"><input type="radio" name="anonymous" value="true" <if:anon>checked</if:anon>><tag:language.YES />&nbsp;&nbsp;<input type="radio" name="anonymous" value="false" <if:anon1>checked</if:anon1>><tag:language.NO /></td>
      </tr>

     <if:imageup_enabled2>
      <if:screenon>
      <tr>
      <td class="header" ><tag:language.SCREEN /> (<tag:language.FACOLTATIVE />):<input type="hidden" name="userfileold1" value="<tag:torrent.screen1 />" /></td>
      <td class="lista">
      <table class="lista" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <td class="lista" align="left"><input type="file" name="screen1" size="5" /></td>
      <td class="lista" align="left"><input type="file" name="screen2" size="5" /></td>
      <td class="lista" align="left"><input type="file" name="screen3" size="5" /></td>
      </tr>
      </table>
      </td>
      </tr>
      </if:screenon>
      </if:imageup_enabled2>
      
      <tr>
        <td class="header" align="right"><tag:language.CATEGORY_FULL /></td>
        <td class="lista"><tag:torrent.cat_combo /></td>
      </tr>

    <if:torlang>
    <tr>
      <td class="header" ><tag:language.LANGUAGE /></td>
      <td class="lista" align="left"><select name="language">
										<option value="0" <tag:torrent.nolang />---</option>
										<option value="1"><tag:language.LANG_ARB /></option>
										<option value="2"><tag:language.LANG_BAN /></option>
										<option value="3"><tag:language.LANG_BUL /></option>
										<option value="4"><tag:language.LANG_CHI /></option>
										<option value="5"><tag:language.LANG_CZE /></option>
										<option value="6"><tag:language.LANG_DAN /></option>
										<option value="7"><tag:language.LANG_DUT /></option>
										<option value="8"><tag:language.LANG_ENG /></option>
										<option value="9"><tag:language.LANG_FIN /></option>
										<option value="10"><tag:language.LANG_FRE /></option>
										<option value="11"><tag:language.LANG_QUE /></option>
										<option value="12"><tag:language.LANG_GER /></option>
										<option value="13"><tag:language.LANG_GRE /></option>
										<option value="14"><tag:language.LANG_HUN /></option>
										<option value="15"><tag:language.LANG_ITA /></option>
										<option value="16"><tag:language.LANG_POL /></option>
										<option value="17"><tag:language.LANG_POR-BR /></option>
										<option value="18"><tag:language.LANG_POR-PT /></option>
										<option value="19"><tag:language.LANG_ROM /></option>
										<option value="20"><tag:language.LANG_RUS /></option>
										<option value="21"><tag:language.LANG_SER /></option>
										<option value="22"><tag:language.LANG_SPA /></option>
										<option value="23"><tag:language.LANG_SWE /></option>
										<option value="24"><tag:language.LANG_TUR /></option>
										<option value="25"><tag:language.LANG_VIE /></option>
                                      </select>
      </td>
    </tr>
    </if:torlang>

      <if:teams_enabled>
      <tag:torrent.teams_combo />
      </if:teams_enabled>

      <if:nar_enabled>
      <tr>
        <td class="header"><tag:language.TNR_REQUESTED /></td>
        <td class="lista"><tag:torrent.req /></td>
      </tr>
      <tr>
        <td class="header"><tag:language.TNR_NUKED /></td>
        <td class="lista"><tag:torrent.nuk /></td>
      </tr>
      </if:nar_enabled>

      <if:sticky_enabled>
      <if:LEVEL_OK>
      <tr>
        <td align="right" class="header"><tag:language.STICKY /></td>
        <td class="lista"><tag:torrent.sticky /></td>
      </tr>
      </if:LEVEL_OK>
      </if:sticky_enabled>
      
      <if:seedbox_enabled>
      <if:LEVEL_SB>
      <tr>
        <td align="right" class="header">Seedbox</td>
        <td class="lista"><tag:torrent.seedbox /></td>
      </tr>
      </if:LEVEL_SB>
      </if:seedbox_enabled>

      <tr>
        <td align=right class="header"><tag:language.SIZE /></td>
        <td class="lista" ><tag:torrent.size /></td>
      </tr>
      <tr>
        <td align=right class="header"><tag:language.ADDED /></td>
        <td class="lista" ><tag:torrent.date /></td>
      </tr>
      <tr>
        <td align=right class="header"><tag:language.DOWNLOADED /></td>
        <td class="lista" ><tag:torrent.complete /></td>
      </tr>
      <tr>
        <td align=right class="header"><tag:language.PEERS /></td>
        <td class="lista" ><tag:torrent.peers /></td>
      </tr>
    
    <if:gast_enabled>
    <if:edit_gold_level>
      <tr>
        <td align="right" class="header"><tag:language.GOLD_TYPE /></td>
        <td class="lista"><tag:torrent.gold /></td>
      </tr>
    </if:edit_gold_level>
    </if:gast_enabled>

    <if:mult_enabled>
      <tr>
        <td align='right' class='header'><tag:language.UPM_UPL_MULT /></td>
        <td align='left' class='lista' colspan='2'><select name='multiplier'><tag:multie3 /></select></td>
      </tr>
    </if:mult_enabled>

</table>
    <input type="hidden" name="info_hash" value="<tag:torrent.info_hash />" />

    <if:tmod3_enabled>
    <input type="hidden" name="ex_moder" value="<tag:torrent.ex_moder />" />
    </if:tmod3_enabled>

    <table>
      <td align="right">
            <input type="submit" class="btn" value="<tag:language.FRM_CONFIRM />" name="action" />
      </td>

      <if:tmod4_enabled>
      <td align="left">
            <input type="submit" class="btn" value="<tag:language.FRM_CONFIRM_VALIDATE />" name="action" />
      </td>
      </if:tmod4_enabled>

      <td align="left">
            <input type="submit" class="btn" value="<tag:language.FRM_CANCEL />" name="action" />
      </td>
    </table>
  </form>

   <if:nfo_enabled3>
   <!-- ##############################################################
        # Nfo hack -->

    <script type="text/javascript">
      function ShowHide(id,id1) {
          obj = document.getElementsByTagName("div");
          if (obj[id].style.display == 'block'){
          obj[id].style.display = 'none';
          obj[id1].style.display = 'block';
          }
          else {
          obj[id].style.display = 'block';
          obj[id1].style.display = 'none';
          }
      }
      function windowunder(link) {
        window.opener.document.location=link;
        window.close();
      }
    </script>

   <!-- # End
        ########################################################## -->
   </if:nfo_enabled3>

</div>