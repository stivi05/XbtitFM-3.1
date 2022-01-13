<script type="text/javascript">
function SetAllCheckBoxes(FormName, FieldName, CheckValue)
{
if(!document.forms[FormName])
return;
var objCheckBoxes = document.forms[FormName].elements[FieldName];
if(!objCheckBoxes)
return;
var countCheckBoxes = objCheckBoxes.length;
if(!countCheckBoxes)
objCheckBoxes.checked = CheckValue;
else
// set the check value for all check boxes
for(var i = 0; i < countCheckBoxes; i++)
objCheckBoxes[i].checked = CheckValue;
}
</script>
<if:imageup_enabled>
<link rel="stylesheet" href="jscript/jquery.lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="jscript/jquery.lightbox.js"></script>
<script type="text/javascript">
var $q=jQuery.noConflict()
$q(function() {

	$q('a.lightbox').lightBox();

});
</script>
</if:imageup_enabled>
<if:rtorr_enabled>
<div align="center">
<table width="100%">
  <tr>
    <td>
      <table width="100%" class="lista" cellspacing=1>  
        <tr>
          <td class="block" colspan="14" align="center"><b><tag:language.RTORR_OUR_TEAM /></b></td>
        </tr>
        <tr> 
		
          <td class="header" align="center" width="45"><tag:language.CATEGORY /></td>
          <td align="center" class="header" ><tag:language.FILE /></td>
		  <if:reql1>
		  <td align="center" class="header" ><tag:req_header_comments /></td>
		  </if:reql1>
          <td align="center" class="header" width="20"><tag:language.DOWN /></td>
          <td align="center" class="header" width="85"><tag:language.ADDED /></td>
		  <td align="center" class="header" width="30"><tag:language.SHORT_S /></td>
          <td align="center" class="header" width="30"><tag:language.SHORT_L /></td>
		  <td align="center" class="header" width="30"><tag:req_header_complete /></td>
		  <td align="center" class="header" width="100"><tag:language.UPLOADER /></td>
          <td align="center" class="header" width="70"><tag:language.SIZE /></td>
		  <if:reql2>
		  
		  </if:reql2>
		  <if:XBTT_1>
          <else:XBTT_1>
          <td align="center" width="45" class="header"><tag:torrent_header_speed /></td>
          </if:XBTT_1>
		  <td align="center" width="45" class="header"><tag:torrent_header_average /></td>
          <td align="center" class="header" width="100"><tag:language.RTORR_REC_BY /></td>
          <if:rtorr_del_1>
          <td align="center" class="header" width="40"><tag:language.RTORR_REMOVE /></td>
          </if:rtorr_del_1>
        </tr>

        <loop:tora>
        <tr>
		
          <td style="text-align:center;" class="lista"><a href="index.php?page=torrents&amp;category=<tag:tora[].catid />"><tag:tora[].image /></td>
          <if:usepopup>
          <td class="lista"><a href="javascript:popdetails('index.php?page=torrent-details&amp;id=<tag:tora[].hash />')"><tag:tora[].filename /></a><if:free_leech_enabled_req><tag:tora[].free /></if:free_leech_enabled_req><if:gast_enabled_req><tag:tora[].gold /></if:gast_enabled_req><tag:tora[].EXT /></td>
          <else:usepopup>
          <td class="lista"><a href="index.php?page=torrent-details&amp;id=<tag:tora[].hash />"><tag:tora[].filename /></a><if:free_leech_enabled_req><tag:tora[].free /></if:free_leech_enabled_req><if:gast_enabled_req><tag:tora[].gold /></if:gast_enabled_req><tag:tora[].EXT /></td>
          </if:usepopup>
		  <if:reql3>
		  <td style="text-align:center;" class="lista"><tag:tora[].comments /></td>
		  </if:reql3>
          <td style="text-align:center;" class="lista"><a href="<if:dlcheck_enabled>index.php?page=downloadcheck&amp;id=<tag:tora[].hash /><else:dlcheck_enabled>download.php?id=<tag:tora[].hash />&amp;f=<tag:tora[].filename_enc />.torrent</if:dlcheck_enabled>"><tag:tora[].dl_img /></a></td>
          <td style="text-align:center;" class="lista"><tag:tora[].date /></td>
		  <tag:tora[].rp17 />
          <tag:tora[].rp18 />
		  <td style="text-align:center;" class="lista"><tag:tora[].complete /></td>
		  <if:reql4>
          <td style="text-align:center;" class="lista"><tag:tora[].uploader /></td>
		  <td style="text-align:center;" class="lista"><tag:tora[].size /></td>
		  </if:req14>
          <if:XBTT_2>
          <else:XBTT_2>
          <td align="center" width="45" class="lista"><tag:tora[].speed /></td>
          </if:XBTT_2>
		  <td align="center" width="45" class="lista"><tag:tora[].average /></td>
          <td style="text-align:center;" class="lista"><tag:tora[].recommender /></td>
          <if:rtorr_del_2>
          <td style="text-align:center;" class="lista"><a href="index.php?page=torrents&action=remove&info_hash=<tag:tora[].hash />"><tag:tora[].del_img /></a></td>
          </if:rtorr_del_2>
        </tr>
        </loop:tora>
      </table>
    </td>
  </tr>
</table><br />
</div>
</if:rtorr_enabled>
<div align="center">
<form action="<tag:torrent_script />" method="get" name="torrent_search">
  <input type="hidden" name="page" value="torrents" />
  <table border="0" class="lista" align="center">

    <tr>
      <td><input type="text" name="search" size="25" maxlength="50" value="<tag:torrent_search />" /></td>
      <td>
        <tag:torrent_categories_combo />
      </td>

      <if:ash_enabled_2>
      <td>
        <select name="options" size="1">
        <option value="0" <tag:torrent_selected_file />><tag:language.FIL /></option>
        <option value="1" <tag:torrent_selected_filedes />><tag:language.FILDES /></option>
        <option value="2" <tag:torrent_selected_des />><tag:language.DES /></option>
        <option value="3" <tag:torrent_selected_upl />><tag:language.UPLS /></option>
        <if:imdb_enabled>
        </if:imdb_enabled>
        </select>
      </td>
      </if:ash_enabled_2>

      <td>
        <select name="active" size="1">
        <option value="0" <tag:torrent_selected_all />><tag:language.ALL /></option>
        <option value="1" <tag:torrent_selected_active />><tag:language.ACTIVE_ONLY /></option>
        <option value="2" <tag:torrent_selected_dead />><tag:language.DEAD_ONLY /></option>
        </select>
      </td>
      <td><input type="submit" class="btn" value="<tag:language.SEARCH />" /></td>

  </tr>
  </table>
  </form>
</div>
<center><tag:torrent_pagertop /></center>
<if:multi_del><form name="deltorrent" action="index.php?page=torrents&do=del" method="post"></if:multi_del>
      <table width="100%" class="lista">
        <tr>
          <td align="center" width="45" class="header">Cover</td>
          <td align="center" class="header">Releases</td>
          <if:usacotl1>
          </if:usacotl1>

          <if:WT>
          <td align="center" width="20" class="header"><tag:torrent_header_waiting /></td>
          <else:WT>
          </if:WT>
          <if:imdb_enabled_2>
          </if:imdb_enabled_2>
          <if:usacotl2>
          <if:show_uploader1>
          </if:show_uploader1>
          </if:usacotl2>
          <if:show_recommended_1>
          <td align="center" width="3" class="header"><tag:language.RTORR_REC /></td>
          </if:show_recommended_1>
          <tag:torrent_header_allow />
        </tr>
        <loop:torrents>
        <tag:torrents[].dt />
        <tr>
          <td align="center" width="125" class="lista" style="text-align: center;<if:sticky_enabled_1><tag:torrents[].color /></if:sticky_enabled_1>"><a href="<tag:torrents[].alt_image_with_priority />" title="view image" class="lightbox"><img src="<tag:torrents[].alt_image_with_priority />" width="125" height="170"></td>
          <td class="lista" valign="middle" style="padding-left:10px;overflow:auto;<if:sticky_enabled_2><tag:torrents[].color /></if:sticky_enabled_2>"><b style="font-size: 16px;"><tag:torrents[].filename /></b>&nbsp;<if:free_leech_enabled><tag:torrents[].free /></if:free_leech_enabled><if:gast_enabled>&nbsp;<tag:torrents[].gold /></if:gast_enabled>

         <p>
         <tag:language.UPLOADER />: &nbsp; <tag:torrents[].uploader />
         </p>
         <p>
         <tag:language.SIZE />:  &nbsp; <tag:torrents[].size />
         </p>
    		 <p>
         <tag:language.ADDED />: &nbsp; <tag:torrents[].alt_added />
         </p>
         <p>
         Seeds: &nbsp; <tag:torrents[].seeds />&nbsp; Leechers: &nbsp; <tag:torrents[].leechers />&nbsp; Complete: &nbsp; <tag:torrents[].complete /> &nbsp;
         </p>
         <p>
         Average: &nbsp; <tag:torrents[].average />&nbsp;
         </p>         
         <p>
          <tag:torrents[].category />&nbsp;&nbsp;<tag:torrents[].language />&nbsp;&nbsp;&nbsp<tag:torrents[].download /><img height="20px" src="images/comment.png" alt="COMMENTS." />&nbsp;&nbsp&nbsp<tag:torrents[].comments />&nbsp;&nbsp;|&nbsp;&nbsp;IMDB RATING.&nbsp;&nbsp;<tag:torrents[].imdb />&nbsp;&nbsp;&nbsp;
          
          <if:fls_enabled2>
            <tag:torrents[].custom_freeleech />
          </if:fls_enabled2>
          
          </p>
          </td>
          <if:show_recommended_2>
          <td align="center" width="3" class="lista" style="text-align: center;"><tag:torrents[].recommended /></td>
          <tag:torrents[].allow />          
        </tr>
        </loop:torrents>
        <if:multi_del1>
        <tr>
        <td align="right" colspan="12">
        <tag:delit />
       </tr>
       </if:multi_del1>
       <td colspan="2" align="center"> <tag:torrent_pagerbottom />     
</td>
</tr>
<if:multi_del3>
</form>
</if:multi_del3>

</table>