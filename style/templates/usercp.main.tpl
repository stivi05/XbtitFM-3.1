<script type="text/javascript">
var newwindow;

function popusers(url)
{
  newwindow=window.open(url,'popusers','height=100,width=450');
  if (window.focus) {newwindow.focus()}
}
</script>
<table border="0" width="100%" class="lista">
  <tr>
    <td align="center" class="lista" colspan="3"><br /><tag:language.UCP_NOTE_1 /><br /><tag:language.UCP_NOTE_2 /><br /><br /></td>
  </tr>
  <tr>
    <td width="20%" class="header" align="left"><tag:language.USER_NAME />:</td>
    <td width="80%" class="lista" align="left"><tag:ucp.username /></td>
  <if:AVATAR>
    <td class="lista" align="center" valign="middle" rowspan="4" style="padding:20px 20px 20px 20px;"><tag:ucp.avatar /></td>
  </if:AVATAR>
  </tr>

  <if:birthdays_enabled>
  <tr>
    <td class="header" align="left"><tag:language.USER_AGE />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.age /></td>
  </tr>
  </if:birthdays_enabled>

<if:CAN_EDIT>
  <tr>
    <td class="header" align="left"><tag:language.EMAIL />:</td>
    <td class="lista" align="left"><tag:ucp.email /></td>
  </tr>
  <tr>
    <td class="header" align="left"><tag:language.LAST_IP />:</td>
    <td class="lista" align="left"><tag:ucp.lastip /></td>
  </tr>
</if:CAN_EDIT>
  <tr>
    <td class="header" align="left"><tag:language.USER_LEVEL />:</td>
    <td class="lista" align="left"><tag:ucp.userlevel /></td>
  </tr>

  <tr>
    <td class="header" align="left"><tag:language.USER_JOINED />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.userjoin /></td>
  </tr>
  <tr>
    <td class="header" align="left"><tag:language.USER_LASTACCESS />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.lastaccess /></td>
  </tr>
  <tr>
    <td class="header" align="left"><tag:language.PEER_COUNTRY />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.country /></td>
  </tr>
  <tr>
    <td class="header" align="left">Mood:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.mood /></td>
  </tr>  
  <if:hos_enabled>
  <tr>
    <td class="header" align="left"><tag:language.HOS_INV_2_OTHERS />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.invisible /></td>
  </tr>
  </if:hos_enabled>
  <if:showporn_enabled>
  <tr>
    <td class="header" align="left"><tag:language.SP_SHOW_PORN /></td>
    <td class="lista" colspan="2" align="left"><tag:ucp.showporn /></td>
  </tr>
  </if:showporn_enabled>
  <tr>
    <td class="header" align="left"><tag:language.DOWNLOADED />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.download /></td>
  </tr>
  <tr>
    <td class="header" align="left"><tag:language.UPLOADED />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.upload /></td>
  </tr>
  <tr>
    <td class="header" align="left"><tag:language.RATIO />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.ratio /></td>
  </tr>
  <if:fls_enabled>
  <tr>
    <td class="header" align="left"><tag:language.FLS_SLOTS /></td>
    <td class="lista" colspan="2" align="left"><tag:ucp.fls /></td>
  </tr>
  </if:fls_enabled>
  <if:avatar_signature_sync_enabled>
  <tr>
    <td class="header" align="left"><tag:language.SIG_CP /></td>
    <td class="lista" colspan="2" align="left"><tag:usercp_sig /></td>
  </tr>
  </if:avatar_signature_sync_enabled>
  <if:torrentbar_enabled>
  <tr>
    <td class="header" align="left"><tag:language.TORRENTBAR />:</td>
    <td class="lista" colspan="2" align="left"><img src="<tag:ucp.baseurl />/torrentbar.php/<tag:ucp.uid />.png" /><br /><input type="text" style="border-color: #000000; border-style: solid; border-width: 1px; width: 346px; height: 15px;" value="[img]<tag:ucp.baseurl />/torrentbar.php/<tag:ucp.uid />.png[/img]" readonly /></td>
  </tr>
  </if:torrentbar_enabled>

<if:INTERNAL_FORUM>
  <tr>
    <td class="header" align="left"><tag:language.FORUM /> <tag:language.POSTS />:</td>
    <td class="lista" colspan="2" align="left"><tag:posts /></td>
  </tr>
  <if:signature_enabled>
  <tr>
    <td class="header" align="left"><tag:language.SIGNATURE />:</td>
    <td class="lista" colspan="2" align="left"><tag:ucp.signature /></td>
  </tr>
  </if:signature_enabled>
</if:INTERNAL_FORUM>

<if:about_me_enabled>
  <tr>
    <td class="header"><tag:language.AM_ABOUT_ME /></td>
    <td class="lista" colspan="2"><tag:about_me /></td>
  </tr>
</if:about_me_enabled>

<if:rss_feed_enabled>
  <tr>
    <td class="header"><tag:language.ADVRSS_YOUR_FEED /></td>
    <td class="lista" colspan="2"><textarea cols="75"><tag:custom_rss_feed /></textarea></td>
  </tr>
</if:rss_feed_enabled>

</table>

<table width="100%" class="lista">
  <tr>
    <td class="block" align="center" colspan="<tag:colspan />" style="text-align:center;"><b><tag:language.UPLOADED /> <tag:language.MNU_TORRENT /></b></td></tr>
  <tr><td align="center" colspan="12"><tag:pagertop /></td>
  </tr>
  <tr>
    <if:tmod1_enabled>
    <td align="center" class="header"><tag:language.TORRENT_STATUS /></td>
    </if:tmod1_enabled>
    <td align="center" class="header"><if:upsort1><a href="<tag:udupsorturl1 />"></if:upsort1><tag:language.FILE /><if:upsort2></a></if:upsort2><if:upsort3><tag:uarrow /></if:upsort3></td>
    <td align="center" class="header"><if:upsort4><a href="<tag:udupsorturl2 />"></if:upsort4><tag:language.ADDED /><if:upsort5></a></if:upsort5><if:upsort6><tag:uarrow /></if:upsort6></td>
    <td align="center" class="header"><if:upsort7><a href="<tag:udupsorturl3 />"></if:upsort7><tag:language.SIZE /><if:upsort8></a></if:upsort8><if:upsort9><tag:uarrow /></if:upsort9></td>
    <td align="center" class="header"><if:upsort10><a href="<tag:udupsorturl4 />"></if:upsort10><tag:language.SHORT_S /><if:upsort11></a></if:upsort11><if:upsort12><tag:uarrow /></if:upsort12></td>
    <td align="center" class="header"><if:upsort13><a href="<tag:udupsorturl5 />"></if:upsort13><tag:language.SHORT_L /><if:upsort14></a></if:upsort14><if:upsort15><tag:uarrow /></if:upsort15></td>
    <td align="center" class="header"><if:upsort16><a href="<tag:udupsorturl6 />"></if:upsort16><tag:language.SHORT_C /><if:upsort17></a></if:upsort17><if:upsort18><tag:uarrow /></if:upsort18></td>
    <if:edit_allowed_1>
      <td align="center" class="header"><tag:language.EDIT /></td>
    </if:edit_allowed_1>
    <if:delete_allowed_1>
      <td align="center" class="header"><tag:language.DELETE /></td>
    </if:delete_allowed_1>
  </tr>
<if:RESULTS>
<loop:uptor>
  <tr>
    <if:tmod2_enabled><td class="lista" style="padding-left:10px;"><tag:uptor[].moder /></td></if:tmod2_enabled>
    <td class="lista" style="padding-left:10px;"><tag:uptor[].filename /></td>
    <td class="lista" align="center" style="text-align: center;"><tag:uptor[].added /></td>
    <td class="lista" align="center" style="text-align: center;"><tag:uptor[].size /></td>
    <td class="<tag:uptor[].seedcolor />" align="center" style="text-align: center;"><tag:uptor[].seeds /></td>
    <td class="<tag:uptor[].leechcolor />" align="center" style="text-align: center;"><tag:uptor[].leechers /></td>
    <td class="lista" align="center" style="text-align: center;"><tag:uptor[].completed /></td>
    <if:edit_allowed_2>
      <td class="lista" align="center" style="text-align: center;"><a href="<tag:uptor[].editlink />"><tag:uptor[].editimg /></a></td>
    </if:edit_allowed_2>
    <if:delete_allowed_2>
      <td class="lista" align="center" style="text-align: center;"><a href="<tag:uptor[].dellink />"><tag:uptor[].delimg /></a></td>
    </if:delete_allowed_2>
  </tr>
</loop:uptor>
<else:RESULTS>
  <tr>
    <td class="lista" align="center" colspan="<tag:colspan />" style="text-align:center;"><tag:language.NO_TORR_UP_USER /></td>
  </tr>
</if:RESULTS>
</table>
