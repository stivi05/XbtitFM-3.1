
<script type="text/javascript">

function showTorrents(file)
{

if (file=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }

var file = document.getElementById('torrent').value;
xmlhttp.open("GET","upcheck.php?q="+file,true);
xmlhttp.send();
}

function checkExtension()
{

    // for mac/linux, else assume windows
    if (navigator.appVersion.indexOf('Mac') != -1 || navigator.appVersion.indexOf('Linux') != -1)
        var fileSplit = '/';
    else
        var fileSplit = '\\';

    var fileType      = '.torrent';
    var fileName      = document.getElementById('torrent').value; // current value
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

function showimages(str)
{
if (str.length==0)
  {
  document.getElementById("imagesearch").innerHTML="";
  document.getElementById("imagesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("imagesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("imagesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","googly/scan.php?searchtag="+str,true);
xmlhttp.send();
}
var $w = jQuery.noConflict();
$w(document).ready(function() {

	//select all the a tag with name equal to modal
	$w('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();

		//Get the A tag
		var id = $w(this).attr('href');

		//Get the screen height and width
		var maskHeight = $w(document).height();
		var maskWidth = $w(window).width();

		//Set heigth and width to mask to fill up the whole screen
		$w('#mask').css({'width':maskWidth,'height':maskHeight});

		//transition effect
		$w('#mask').fadeIn(1000);
		$w('#mask').fadeTo("slow",0.8);

		//Get the window height and width
		var winH = $w(window).height();
		var winW = $w(window).width();

		//Set the popup window to center
		$w(id).css('top',  winH/2-$w(id).height()/2);
		$w(id).css('left', winW/2-$w(id).width()/2);

		var collect=document.forms.upload.info.value;
        $w(id).load("preview.php", {
        dataType: "text",
        type: "POST",
        data: collect,
        success: function(data) {
        var test = collect;
        if(test=='') {
        alert('No Data!');
        window.setTimeout('location.reload()', 0);
        }
     },

  }
  ).fadeIn(2000);

	});

    //if escape key is pressed
	$w('body').keydown(function(e) {
    if (e.keyCode == 27) {
    e.preventDefault();
		$w('#mask').hide();
		$w('.window').hide();
    }
});


	//if close button is clicked
	$w('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();

		$w('#mask').hide();
		$w('.window').hide();
	});

	//if mask is clicked
	$w('#mask').click(function () {
		$w(this).hide();
		$w('.window').hide();
	});


	$w(window).resize(function () {

 		var box = $w('#boxes .window');

        //Get the screen height and width
        var maskHeight = $w(document).height();
        var maskWidth = $w(window).width();

        //Set height and width to mask to fill up the whole screen
        $w('#mask').css({'width':maskWidth,'height':maskHeight});

        //Get the window height and width
        var winH = $w(window).height();
        var winW = $w(window).width();

        //Set the popup window to center
        box.css('top',  winH/2 - box.height()/2);
        box.css('left', winW/2 - box.width()/2);

	});

});
</script>
<style>

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}

#boxes .window {
  position:fixed;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}

#boxes #dialog {
  width:575px;
  height:303px;
  padding:10px;
  background-color:inherit;
  overflow:auto;
}


</style>
<center><tag:language.INSERT_DATA /><br /><br /><tag:language.ANNOUNCE_URL /><br /><b><tag:upload.announces /></b><br /></center>
<form name="upload" method="post" onsubmit="return CheckForm();" action="index.php?page=upload" enctype="multipart/form-data">
<input type="hidden" name="user_id" size="50" value="" />

<if:auto_announce_enabled>
<table class="lista" border="0" width="96%" cellspacing="1" cellpadding="1">
  <tr>
    <td class="header" align="center"><tag:language.AUTO_ANNOUNCE /></td>
  </tr>
  </tr>
    <td class="header" align="center"><tag:language.AUTO_ANNOUNCE2 /></td>
  </tr>
</table>
</if:auto_announce_enabled>

  <table class="lista" border="0" width="96%" cellspacing="1" cellpadding="2">
    <tr>
      <td class="header"><tag:language.TORRENT_FILE /></td>
      <if:upcheck_enabled>
      <td class="lista" align="left"><input type="file" id="torrent" name="torrent" onchange="showTorrents();"/><div align=center id="txtHint"></div></td>
      <else:upcheck_enabled>
      <td class="lista" align="left"><input type="file" id="torrent" name="torrent" /></td>
      </if:upcheck_enabled>
    </tr>

    <if:arc_enabled>
      <if:arc_both>
        <tr>
          <td class="header"><tag:language.ARC_UPLOAD_TYPE /></td>
          <td class="lista" align="left"><tag:language.ARC_NEW />&nbsp;<input type="radio" name="arc_upload_type" value="1" checked="checked" />&nbsp;&nbsp;&nbsp;&nbsp;<tag:language.ARC_ARC />&nbsp;<input type="radio" name="arc_upload_type" value="2" /></td>
        </tr>
      <else:arc_both>
        <if:arc_only_new>
          <input type="hidden" name="arc_upload_type" value="1" />
        <else:arc_only_new>
          <if:arc_only_arc>
            <input type="hidden" name="arc_upload_type" value="2" />
          </if:arc_only_arc>
        </if:arc_only_new>
      </if:arc_both>
    </if:arc_enabled>

    <if:nfo_enabled>
    <tr>
      <td class="header"><tag:language.NFO_NFO /></td>
      <td class="lista" align="left"><sup><tag:language.NFO_OPTION /></sup><br /><input type="file" name="nfo" /></td>
    </tr>
    </if:nfo_enabled>

    <tr>
      <td class="header" ><tag:language.CATEGORY_FULL /></td>
      <td class="lista" align="left"><tag:upload_categories_combo /></td>
    </tr>

    <if:torlang>
    <tr>
      <td class="header" ><tag:language.LANGUAGE /></td>
      <td class="lista" align="left"><select name="language">
										<option value="0">---</option>
										<option value="8"><tag:language.LANG_ENG_USA /></option>
										<option value="8"><tag:language.LANG_ENG_GB /></option>
										<option value="1"><tag:language.LANG_ARB /></option>
										<option value="2"><tag:language.LANG_BAN /></option>
										<option value="3"><tag:language.LANG_BUL /></option>
										<option value="4"><tag:language.LANG_CHI /></option>
										<option value="5"><tag:language.LANG_CZE /></option>
										<option value="6"><tag:language.LANG_DAN /></option>
										<option value="7"><tag:language.LANG_DUT /></option>
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
    <tag:upload_teams_combo />
    </if:teams_enabled>

    <if:gast_enabled>
    <if:upload_gold_level>
    <tr>
      <td class="header" ><tag:language.GOLD_TYPE /></td>
      <td class="lista" align="left"><tag:upload_gold_combo /></td>
    </tr>
     </if:upload_gold_level>
     </if:gast_enabled>

    <if:mult_enabled>
      <tr>
        <td align='left' class='header'><tag:language.UPM_UPL_MULT /></td>
        <td align='left' class='lista' colspan='2'><select name='multiplier'><tag:multie3 /></select></td>
      </tr>
    </if:mult_enabled>

    <tr>
      <td class="header" ><tag:language.FILE_NAME /></td>
      <td class="lista" align="left"><input type="text" name="filename" size="50" maxlength="200"<if:aacapg_enabled> onkeyup="showimages(this.value);" /><br><div id="imagesearch"></div><else:aacapg_enabled> /></if:aacapg_enabled></td>

      <if:tmod_enabled>
      <input type="hidden" name="moder" value="<tag:moder />" />
      </if:tmod_enabled>

    </tr>

    <if:ddl_enabled>
    <tr>
        <td class="header"><tag:language.DIRECT_LINK /></td>
        <td class="lista"><input type="text" name="direct_link" value="" size="50" maxlength="255"></td>
    </tr>
    </if:ddl_enabled>

    <if:st_comm_enabled>
    <if:LEVEL_SC>
    <tr>
    <td class="header"><tag:language.STAFF_COMMENT /></td>
    <td class="lista" align="left"><textarea name="staff_comment" rows="3" cols="45"></textarea></td>
    </tr>
    </if:LEVEL_SC>
    </if:st_comm_enabled>

    <if:sticky_enabled>
    <if:LEVEL_OK>
    <tr>
      <td class="header" ><tag:language.STICKY_TORRENT /></td>
      <td class="lista" align="left">
        <input type="checkbox" name="sticky"> - <tag:language.STICKY_TORRENT_EXPLAIN />
      </td>
    </tr>
    </if:LEVEL_OK>
    </if:sticky_enabled>


      <if:seedbox_enabled>
      <if:LEVEL_SB>
        <tr>
      <td class="header"><tag:language.SB_SEEDBOX /></td>
           <td class="lista" align="left">
      <input type="checkbox" name="seedbox">

      </td>
    </tr>
     </if:LEVEL_SB>
     </if:seedbox_enabled>

    <if:tvdb_enabled>
    <tr>
      <td class="header" ><tag:language.TVDB_UL_TITLE /></td>
      <td class="lista" align="left"><tag:language.TVDB_UL_1 /> <input type="text" name="tvdb_number" value="" size="10" maxlength="10" /> <tag:language.TVDB_UL_2 /></td>
    </tr>
    </if:tvdb_enabled>

    <if:imdb_enabled>
    <tr>
      <td class="header" ><tag:language.IMDB /></td>
      <td class="lista" align="left"><tag:language.IMDB_UL_FORM /></td>
    </tr>
    </if:imdb_enabled>


  <if:imageup_enabled>
  <if:imageon>
    <tr>
      <td class="header" ><tag:language.IMAGE /> (<tag:language.FACOLTATIVE />):</td>
      <td class="lista" align="left"><input type="file" name="userfile" size="15" /></td>
    </tr>
  </if:imageon>
  </if:imageup_enabled>


    <tr>
      <td class="header" valign="top"><tag:language.DESCRIPTION /></td>
      <td class="lista" ><tag:textbbcode /></td>
    </tr>

    <if:media_enabled>
    <tr>
      <td class="header" valign="top"><tag:language.MPLAYER /></td>
      <td class="lista" align="left"><input type="text" name="mplayer" size="50" maxlength="500" /></td>
    </tr>
    </if:media_enabled>

    <if:imageup_enabled2>
    <if:screenon>
    <tr>
      <td class="header"><tag:language.SCREEN /> (<tag:language.FACOLTATIVE />):</td>
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
<if:whitelist_enabled>
    <!-- whitelist users -->
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
    
    <!-- groups -->
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
    <!-- whitelist users -->
</if:whitelist_enabled>    

    <tr>
      <td class="header"><tag:language.TORRENT_ANONYMOUS /></td>
      <td class="lista">&nbsp;&nbsp;<tag:language.NO /><input type="radio" name="anonymous" value="false" checked="checked" />&nbsp;&nbsp;<tag:language.YES /><input type="radio" name="anonymous" value="true" /></td>
    </tr>

    <if:nar_enabled>
    <tr>
      <td class="header"><tag:language.TNR_REQUESTED /></td>
      <td class="lista"><select name="req">
      <option value="false" selected="selected"><tag:language.NO /></option>
      <option value="true"><tag:language.YES /></option></select></td>
    </tr>
    <tr>
      <td class="header"><tag:language.TNR_NUKED /></td>
      <td class="lista"><select name="nuk">
      <option value="false" selected="selected"><tag:language.NO /></option>
      <option value="true"><tag:language.YES /></option></select>
      <input type="text" name="nuk_rea" size="43" maxlength="100"></td>
    </tr>
    </if:nar_enabled>

    <tr>
      <td class="header" align="right"><input type="submit" class="btn" value="<tag:language.FRM_SEND />" /></td>
      <td class="header" align="left"><input type="reset" class="btn" value="<tag:language.FRM_RESET />" />&nbsp;&nbsp;&nbsp;<a border="0" href="#dialog" name="modal"><button class="btn"><tag:language.UP_PREV /></button></a></td>
    </tr>
  </table>
</div>
</form>
<div id="boxes">

<div id="dialog" class="window">
</div>

<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>
