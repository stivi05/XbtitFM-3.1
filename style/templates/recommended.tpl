
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
		  <if:reql2>
		  <td align="center" class="header" width="100"><tag:language.UPLOADER /></td>
          <td align="center" class="header" width="70"><tag:language.SIZE /></td>
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
          <td class="lista"><a href="javascript:popdetails('index.php?page=torrent-details&amp;id=<tag:tora[].hash />')"><tag:tora[].filename /></a><if:free_leech_enabled_req><tag:tora[].free /></if:free_leech_enabled_req><if:gast_enabled_req><tag:tora[].gold /></if:gast_enabled_req></td>
          <else:usepopup>
          <td class="lista"><a href="index.php?page=torrent-details&amp;id=<tag:tora[].hash />"><tag:tora[].filename /></a><if:free_leech_enabled_req><tag:tora[].free /></if:free_leech_enabled_req><if:gast_enabled_req><tag:tora[].gold /></if:gast_enabled_req></td>
          </if:usepopup>
		  <if:reql3>
		  <td style="text-align:center;" class="lista"><tag:tora[].comments /></td>
		  </if:reql3>
          <td style="text-align:center;" class="lista"><if:download_locked1> <else:download_locked1><a href="<if:dlcheck_enabled>index.php?page=downloadcheck&amp;id=<tag:tora[].hash /><else:dlcheck_enabled>download.php?id=<tag:tora[].hash />&amp;f=<tag:tora[].filename_enc />.torrent</if:dlcheck_enabled>"></if:download_locked1><tag:tora[].dl_img /><if:download_locked2> <else:download_locked2></a></if:download_locked2></td>
          <td style="text-align:center;" class="lista"><tag:tora[].date /></td>
		  <tag:tora[].rp17 />
          <tag:tora[].rp18 />
		  <td style="text-align:center;" class="lista"><tag:tora[].complete /></td>
		  <if:reql4>
          <td style="text-align:center;" class="lista"><tag:tora[].uploader /></td>
		  <td style="text-align:center;" class="lista"><tag:tora[].size /></td>
		  </if:reql4>
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