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
    
<div align="center">
  <form id="postmodify" action="<tag:torrent.link />" method="post" name="edit" enctype="multipart/form-data">
    <table class="lista">
      <tr>
        <td align="right" class="header"><tag:language.FILE /></td>
        <td class="lista"><input type="text" name="name" value="<tag:torrent.filename />" size="60" /></td>
      </tr>
        <tr>
            <td class="header"><tag:language.TORRENT_MODERATION /></td>
            <td class="lista"><tag:torrent.moder /></td>
        </tr>
      <tr>
        <td align="right" class="header"><tag:language.INFO_HASH /></td>
        <td class="lista"><tag:torrent.info_hash /></td>
      </tr>
      
<if:quality>   
<tr>
    <td class="header"><tag:language.VIDEO />Video</td>
    <td class="lista" align="left">
    <select name="container" style="width:100px;">
    <option value="Unknown"><tag:language.MEDIUM /></option>
    <option value="Blu-ray"><tag:language.BLURAY /></option>
    <option value="Remux"><tag:language.REMUX /></option>
    <option value="Encode"><tag:language.ENCODE /></option>
    <option value="Web-DL"><tag:language.WEBDL /></option>
    <option value="BD/BR-Rip"><tag:language.BDBR_RIP /></option>
    <option value="DVD"><tag:language.DVD /></option>
    <option value="CAM"><tag:language.CAM /></option>
    <option value="Other"><tag:language.OTHER /></option>
    </select>
    
    <select name="vencoder" style="width:100px;">
    <option value="Unknown"><tag:language.CODECS /></option>
    <option value="MPEG-1"><tag:language.MPEG1 /></option>
    <option value="MPEG-2"><tag:language.MPEG2 /></option>
    <option value="MPEG-4"><tag:language.MPEG4 /></option>
    <option value="H.264/AVC"><tag:language.264AVC /></option>
    <option value="H.265/HEVC"><tag:language.265HEVC /></option>
    <option value="VC-1/WMV"><tag:language.VC1WMV /></option>
    <option value="XVID/DIVX"><tag:language.XVID_DIVX /></option>
    <option value="Other"><tag:language.OTHER /></option>
    </select>

    <select name="quality" style="width:100px;">
    <option value="Unknown"><tag:language.RESOLUTION /></option>
    <option value="480i/480p"><tag:language.4480i480P80I /></option>
    <option value="576i/576p"><tag:language.576I576P /></option>
    <option value="720p"><tag:language.720P /></option>
    <option value="1080i/1080p"><tag:language.1080I1080P />1</option>
    <option value="2160p"><tag:language.2160P /></option>
    <option value="4320p"><tag:language.4320P /></option>
    <option value="8640p"><tag:language.8640P /></option>
    <option value="Other"><tag:language.OTHER /></option>
    </select>
    </tr>
    
    <tr>
    <td class="header"><tag:language.AUDIO />Audio</td>
    <td class="lista" align="left">
    <select name="source" style="width:100px;">
    <option value="Unknown"><tag:language.SOURCE /></option>
    <option value="CD"><tag:language.CD /></option>
    <option value="Vinyl"><tag:language.VINYL /></option>
    <option value="Web"><tag:language.WEB /></option>
    <option value="Other"><tag:language.OTHER /></option>
    </select>

    <select name="bitrate" style="width:100px;"> 
    <option value="Unknown"><tag:language.BITRATE /></option> 
    <option value="320-kbit"><tag:language.320 />320-kbit</option>
    <option value='256-kbit'><tag:language.256 />256-kbit</option> 
    <option value='224-kbit'><tag:language.224 />224-kbit</option> 
    <option value='192-kbit'><tag:language.192 />192-kbit</option> 
    <option value='160-kbit'><tag:language.160 />160-kbit</option> 
    <option value='128-kbit'><tag:language.128 />128-kbit</option> 
    <option value='Other'><tag:language.OTHER /></option> 
    </select>
 
    <select name="encoder" style="width:100px;"> 
    <option value="Unknown"><tag:language.FORMAT /></option>
    <option value='FLAC'><tag:language.FLAC /></option> 
    <option value='MP3-CBR'><tag:language.MP3_CBR /></option> 
    <option value='MP3-VBR'><tag:language.MP3_VBR /></option> 
    <option value='AAC'><tag:language.AAC /></option> 
    <option value='OGG'><tag:language.OGG /></option> 
    <option value='Other'><tag:language.OTHER /></option> 
    </select>
    </td>
    </tr>
</if:quality>

      <if:dc>
        <tr>
        <td align="right" class="header">Price</td>
        <td class="lista"><input type="text" name="dc" value="<tag:torrent.dc />" size="5" /></td>
      </tr>
      </if:dc>
        <if:imdb>
        <tr>
        <td align="right" class="header"><img src="images/imdb.png"> IMDB</td>
        <td class="lista"><input type="text" name="imdb" value="<tag:torrent.imdb />" size="15" /> IMDB nr without tt</td>
      </tr>
      </if:imdb>
      <if:tr>
        <tr>
        <td align="right" class="header"><img src="images/imdb.png"> Trailer</td>
        <td class="lista"><input type="text" name="trailer" value="<tag:torrent.trailer />" size="15" /> IMDB nr without tt</td>
      </tr>
      </if:tr>
        <if:yt>
    <tr><td class="header" align="right"  ><img src="images/youtube.gif"> [opt]</td><td class="lista" align="left"> Only add the YouTube number (example AE96cK4_qBE) !!</td></tr>
    <tr>
      <td class="header" align="right" ><img src="images/youtube.gif"> Link</td>
    <td class="lista" align="left"><input type="text" name="yt" value="<tag:torrent.youtube_video />" size="50" maxlength="200" /></td>
    </tr>
      </if:yt>
      <if:imageon>
      <tr>
      <if:uplink>
      <td align="right" class="header" ><tag:language.IMAGE /> url (<tag:language.FACOLTATIVE />):<input type="hidden" name="userfileold" value="<tag:torrent.image />" /></td>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.image />" name="userfile" size="50" /></td>
      </if:uplink>
      <if:uplo>
      <td align="right" class="header" ><tag:language.IMAGE /> (<tag:language.FACOLTATIVE />):<input type="hidden" name="userfileold" value="<tag:torrent.image />" /></td>
      <td class="lista" align="left"><input type="file" name="userfile" size="15" /></td>
      </if:uplo>
      </tr>
      </if:imageon>

<tr>
        <td align="right" class="header"><tag:language.DESCRIPTION /></td>
        <td class="lista"><tag:torrent.description /></td>
      </tr>

      <if:screenon>
      <tr>
      <td align="right" class="header" ><tag:language.SCREEN /> (<tag:language.FACOLTATIVE />):<input type="hidden" name="userfileold1" value="<tag:torrent.screen1 />" /></td>
      <td class="lista">
      <table class="lista" border="0" cellspacing="0" cellpadding="0">
      <tr>
      <if:uplinkk>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.screen1 />" name="screen1" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.screen2 />" name="screen2" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.screen3 />" name="screen3" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.screen4 />" name="screen4" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.screen5 />" name="screen5" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" value="<tag:torrent.screen6 />" name="screen6" size="50" /></td>
      </tr>
      </if:uplinkk>
      <if:uplok>
      <td class="lista" align="left"><input type="file" name="screen1" size="5" /></td>
      <td class="lista" align="left"><input type="file" name="screen2" size="5" /></td>
      <td class="lista" align="left"><input type="file" name="screen3" size="5" /></td>
      </tr>
      <tr>
      <td class="lista" align="left"><input type="file" name="screen4" size="5" /></td>
      <td class="lista" align="left"><input type="file" name="screen5" size="5" /></td>
      <td class="lista" align="left"><input type="file" name="screen6" size="5" /></td>
        </if:uplok>
      </tr>
      </table>
      </td>
      </tr>
      </if:screenon>

      
      <tr>
        <td align="right" class="header" ><tag:language.CATEGORY_FULL /></td>
        <td class="lista"><tag:torrent.cat_combo /></td>
      </tr>
      
<if:LEVEL_VT>
      <tr>
        <td align="right" class="header">VIP NZB Only</td>
        <td class="lista"><tag:torrent.vip_torrent /></td>
      </tr>
</if:LEVEL_VT>      
      
<if:LEVEL_OK>
      <tr>
        <td align="right" class="header"><tag:language.STICKY /></td>
        <td class="lista"><tag:torrent.sticky /></td>
      </tr>
</if:LEVEL_OK>
      
      <tr>
        <td align=right class="header"><tag:language.SIZE /></td>
        <td class="lista" ><tag:torrent.size /></td>
      </tr>
      <tr>
        <td align=right class="header"><tag:language.ADDED /></td>
        <td class="lista" ><tag:torrent.date /></td>
      </tr>

    </table>
    <input type="hidden" name="info_hash" value="<tag:torrent.info_hash />" />
    <input type="hidden" name="ex_moder" value="<tag:torrent.ex_moder />" />
    <table>
      <td align="right">
            <input type="submit" class="btn" value="<tag:language.FRM_CONFIRM />" name="action" />
      </td>
            <td align="left">
            <input type="submit" class="btn" value="<tag:language.FRM_CONFIRM_VALIDATE />" name="action" />
      </td>
      <td align="left">
            <input type="submit" class="btn" value="<tag:language.FRM_CANCEL />" name="action" />
      </td>
    </table>
  </form>
</div>