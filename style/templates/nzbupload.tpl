
<script type="text/javascript">

function checkExtension()
{

    // for mac/linux, else assume windows
    if (navigator.appVersion.indexOf('Mac') != -1 || navigator.appVersion.indexOf('Linux') != -1)
        var fileSplit = '/';
    else
        var fileSplit = '\\';

    var fileType      = '.nzb';
    var fileName      = document.getElementById('nzb').value; // current value
    var extension     = fileName.substr(fileName.lastIndexOf('.'), fileName.length);

    if (extension!=fileType)
      {
       alert('<tag:language.ERR_PARSER />');
       return false;
    }

    return true;
}

function CheckForm()
{
  // file extension
  if (checkExtension()==false)
     return false;

  var cat=document.getElementsByName('category')[0];
  // categories
  if (cat.value=='0')
    {
    alert('<tag:language.WRITE_CATEGORY />');
    cat.focus();
    return false;
    }

  var desc=document.getElementsByName('info')[0];

  // description
  if (desc.value.length==0)
    {
    alert('<tag:language.EMPTY_DESCRIPTION />');
    desc.focus();
    return false;
    }


  // all filled...
  return true;
}

</script>
<center><tag:language.INSERT_DATA /><br /><br /><b>Only NZB files allowed</b><br /></center>
<form name="upload" method="post" onsubmit="return CheckForm();" action="index.php?page=nzbupload" enctype="multipart/form-data">
<input type="hidden" name="user_id" size="50" value="" />
  <table class="lista" border="0" width="96%" cellspacing="1" cellpadding="2">
    <tr>
      <td class="header"><tag:language.NZB_FILE /></td>
      <td class="lista" align="left"><input type="file" id="torrent" name="torrent" /></td>
    </tr>
    <tr>
      <td class="header" ><tag:language.CATEGORY_FULL /></td>
      <td class="lista" align="left"><tag:upload_categories_combo /></td>
    </tr>
    <tr>
      <td class="header" ><tag:language.FILE_NAME /></td>
      <td class="lista" align="left"><input type="text" name="filename" size="50" maxlength="200" /></td>
      <input type="hidden" name="moder" value="<tag:moder />" />
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
    
<if:LEVEL_VT>
        <tr>
      <td class="header"><tag:language.VIPNZB /></td>
           <td class="lista" align="left">
      <input type="checkbox" name="vip_torrent">

      </td>
    </tr>
</if:LEVEL_VT>    
    
<if:LEVEL_OK>
   <tr>
      <td class="header" ><tag:language.STICKY_TORRENT /></td>
      <td class="lista" align="left">
      <input type="checkbox" name="sticky"> - <tag:language.STICKY_TORRENT_EXPLAIN_NZB />
      </td>
   </tr>
</if:LEVEL_OK>

<if:yt>
    <tr><td class="header"><img src="images/youtube.gif"> [<tag:language.FACOLTATIVE />]</td><td class="lista" align="left"><tag:language. /> Only add the YouTube number (example AE96cK4_qBE) !!</td></tr>
    <tr>
      <td class="header" ><img src="images/youtube.gif"> <tag:language.LINK /> </td>
    <td class="lista" align="left"><input type="text" name="youtube_video" size="50" maxlength="200" /></td>
    </tr>
</if:yt>

<if:imdb>
    <tr>
      <td class="header" valign="top"><img src="images/imdb.png"> <tag:language.IMDb /></td>
      <td class="lista" align="left"><input type="text" name="imdb" size="20" maxlength="20" /> <tag:language.IMDBNR />/td>
    </tr>
</if:imdb>

<if:trail>
    <tr>
      <td class="header" valign="top"><img src="images/imdb.png"> <tag:language.TRAILER />Trailer</td>
      <td class="lista" align="left"><input type="text" name="trailer" size="20" maxlength="20" /> <tag:language.IMDBNR />
</if:trail>

<if:imageon>
  <if:uplink>
      <tr>
      <td class="header" ><tag:language.IMAGE /> <tag:language.URL /> (<tag:language.FACOLTATIVE />):</td>
      <td class="lista" align="left"><input type="text" name="userfile" size="50" /></td>
    </tr>
  </if:uplink>
  <if:uplo>
    <tr>
      <td class="header" ><tag:language.IMAGE /> (<tag:language.FACOLTATIVE />):</td>
      <td class="lista" align="left"><input type="file" name="userfile" size="15" /></td>
    </tr>
    </if:uplo>
</if:imageon>


    <tr>
      <td class="header" valign="top"><tag:language.DESCRIPTION /></td>
      <td class="lista" ><tag:textbbcode /></td>
    </tr>

<if:screenon>
    <tr>
      <td class="header"><tag:language.SCREEN /> (<tag:language.FACOLTATIVE />):</td>
      <td class="lista">
      <table class="lista" border="0" cellspacing="0" cellpadding="0">
      <tr>
<if:uplinkk>
    <tr>
      <td class="lista" align="left"><input type="text" name="screen1" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" name="screen2" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" name="screen3" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" name="screen4" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" name="screen5" size="50" /></td>
      </tr><tr>
      <td class="lista" align="left"><input type="text" name="screen6" size="50" /></td>
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

<if:nzb_whitelisted>     
<script type="text/javascript">
function form_submit(form) {     
    CheckForm();    
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
        <td class="header"><tag:language.MAKE_EXCLUSIVE /></td>
        <td class="lista"><input type="checkbox" name="exclusive" value="1" checked="checked" /><tag:language.LEAVE_TICKED /></td>
    </tr>
    <tr>
        <td class="header" style="vertical-align: top"><tag:language.EXCLUSIVE_USERS /></td>
        <td class="lista">
            <table style="border: none;">
            <tbody>
            <tr>
                <th style="vertical-align: top"><tag:language.AVAILABLE_USERS /><br />
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
                <th style="vertical-align: top"><tag:language.EXCLUSIVE_USERS /><br />
                    <select id="chosen" name="chosen[]" multiple="" size="10" style="width: 200px" ondblclick="shuttle('chosen', 'avail')">
                    </select>
                </th>
            </tr>
            </tbody>
            </table>
        </td>
    </tr>     
    <tr>
        <td class="header" style="vertical-align: top"><tag:language.EXCLUSIVE_GROUPS /></td>
        <td class="lista">
            <table style="border: none;">
            <tbody>
            <tr>
                <th style="vertical-align: top"><tag:language.EXCLUSIVE_GROUPS /><br />
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
                <th style="vertical-align: top"><tag:language.EXCLUSIVE_GROUPS /><br />
                    <select id="choseng" name="choseng[]" multiple="" size="10" style="width: 200px" ondblclick="shuttle('choseng', 'availg')">
                        <tag:choosen_groups />
                    </select>
                </th>
            </tr>
            </tbody>
            </table>
        </td>
    </tr>    
</if:nzb_whitelisted>
    <tr>
      <td class="header"><tag:language.TORRENT_ANONYMOUS /></td>
      <td class="lista">&nbsp;&nbsp;<tag:language.NO /><input type="radio" name="anonymous" value="false" checked="checked" />&nbsp;&nbsp;<tag:language.YES /><input type="radio" name="anonymous" value="true" /></td>
    </tr>
    <tr>
      <td class="header" align="right"><input type="submit" class="btn" value="<tag:language.FRM_SEND />" /></td>
      <td class="header" align="left"><input type="reset" class="btn" value="<tag:language.FRM_RESET />" /></td>
    </tr>
  </table>
</form>