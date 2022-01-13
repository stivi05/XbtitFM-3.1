<script type="text/javascript" src="./jscript/kcdmenu.js"></script>
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

function windowunder(link)
{
  window.opener.document.location=link;
  window.close();
}

function disable_button(state)
{
 document.getElementById('ty').disabled=(state=='1'?true:false);
}

at=new sack();

function ShowUpdate()
{
  var mytext=at.response + '';
  var myout=mytext.split('|');
  document.getElementById('thanks_div').style.display='block';
  document.getElementById('loading').style.display='none';
  document.getElementById('thanks_div').innerHTML = myout[0]; //at.response;
  disable_button(myout[1]);
}

function thank_you(ia)
{
  disable_button('1');
  at.resetData();
  at.onLoading=show_wait;
  at.requestFile='thanks.php';
  at.setVar('infohash',"'"+ia+"'");
  at.setVar('thanks',1);
  at.onCompletion = ShowUpdate;
  at.runAJAX();
}

function ShowThank(ia)
{
  at.resetData();
  at.onLoading=show_wait;
  at.requestFile='thanks.php';
  at.setVar('infohash',"'"+ia+"'");
  at.onCompletion = ShowUpdate;
  at.runAJAX();
}

function show_wait()
{
  document.getElementById('thanks_div').style.display='none';
  document.getElementById('loading').style.display='block';
}

function dt_disable_button(state)
{
 document.getElementById('tys').disabled=(state=='1'?true:false);
}

tat=new sack();

function dt_ShowUpdate()
{
  var mytexta=tat.response + '';
  var myouta=mytexta.split('|');
  document.getElementById('reencode_div').style.display='block';
  document.getElementById('loadinga').style.display='none';
  document.getElementById('reencode_div').innerHTML = myouta[0]; //at.response;
  dt_disable_button(myouta[1]);
}

function dt_thank_you(ia)
{
  dt_disable_button('1');
  tat.resetData();
  tat.onLoading=dt_show_wait;
  tat.requestFile='reencode.php';
  tat.setVar('infohash',"'"+ia+"'");
  tat.setVar('reencode',1);
  tat.onCompletion = dt_ShowUpdate;
  tat.runAJAX();
}

function dt_ShowThank(ia)
{
  tat.resetData();
  tat.onLoading=dt_show_wait;
  tat.requestFile='reencode.php';
  tat.setVar('infohash',"'"+ia+"'");
  tat.onCompletion = dt_ShowUpdate;
  tat.runAJAX();
}

function dt_show_wait()
{
  document.getElementById('reencode_div').style.display='none';
  document.getElementById('loadinga').style.display='block';
}

function dt_disable_buttonb(state)
{
 document.getElementById('tyt').disabled=(state=='1'?true:false);
}

fat=new sack();

function dt_ShowUpdateb()
{
  var mytextb=fat.response + '';
  var myoutb=mytextb.split('|');
  document.getElementById('reencodeb_div').style.display='block';
  document.getElementById('loadingb').style.display='none';
  document.getElementById('reencodeb_div').innerHTML = myoutb[0]; //at.response;
  dt_disable_buttonb(myoutb[1]);
}

function dt_thank_youb(ia)
{
  dt_disable_buttonb('1');
  fat.resetData();
  fat.onLoading=dt_show_waitb;
  fat.requestFile='reencodeb.php';
  fat.setVar('infohashb',"'"+ia+"'");
  fat.setVar('reencodeb',1);
  fat.onCompletion = dt_ShowUpdateb;
  fat.runAJAX();
}

function dt_ShowThankb(ia)
{
  fat.resetData();
  fat.onLoading=dt_show_waitb;
  fat.requestFile='reencodeb.php';
  fat.setVar('infohashb',"'"+ia+"'");
  fat.onCompletion = dt_ShowUpdateb;
  fat.runAJAX();
}

function dt_show_waitb()
{
  document.getElementById('reencodeb_div').style.display='none';
  document.getElementById('loadingb').style.display='block';
}

function refresh_peers(myvar)
{
    var xhReq = new XMLHttpRequest();
    xhReq.open("GET", "refresh_peers.php?id="+myvar, false);
    xhReq.send(null);
    var serverResponse = xhReq.responseText;
    var new_peers=serverResponse.split('[*]');
    document.getElementById("peer_counts").innerHTML = "<tag:language.SEEDERS />: <a href='index.php?page=peers&amp;id=<tag:torrent.info_hash />'>"+new_peers[0]+"</a>, <tag:language.LEECHERS />:  <a href='index.php?page=peers&amp;id=<tag:torrent.info_hash />'>"+new_peers[1]+"</a> = <a href='index.php?page=peers&amp;id=<tag:torrent.info_hash />'>"+new_peers[2]+"</a> <tag:language.PEERS />&nbsp;&nbsp;&nbsp;<img src='<tag:BASEURL />/images/refresh.gif' border='0' onclick='refresh_peers(\"<tag:torrent.info_hash />\")' title='<tag:language.REFRESH_PEERS />' />";
}

</script>

<if:imageup_enabled>
<script type="text/javascript" src="./jscript/jquery-1.7.min.js"></script>
<link rel="stylesheet" href="./jscript/jquery.lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="./jscript/jquery.lightbox.js"></script>
<script type="text/javascript">
var $q=jQuery.noConflict()
$q(function() {

	$q('a.lightbox').lightBox();

});
</script>
</if:imageup_enabled>
<!--torrent info box-->
<div align="center" class="kcdtopHead">
<h2><tag:torrent.filename2 /></h2>
<br />
<div align="center" class="kcdInfoBox">          
<table align="center" width="100%" border="0" cellpadding="3" cellspacing="3">
<tr valign="top">
<if:imageup_enabled2>
<if:IMAGEIS>
<td>
<br />
<br />
<a href="<tag:uploaddir /><tag:torrent.image />" title="view image" class="lightbox"><img src="<tag:uploaddir /><tag:torrent.image />" width="100" height="166"></a>
</td>
</if:IMAGEIS>
</if:imageup_enabled2>
<td class="kcdInfoLF">
<center><b><span class="black"><tag:language.TTI /></span></b></center>
<ul>                                        
<li>
<span class="col08"><tag:language.TORRENT_MODERATION />&nbsp;<tag:mod_task />&nbsp;&nbsp;
<if:tmod1_enabled>
<if:MODER>
<tag:torrent.moderation />
</if:MODER>
</if:tmod1_enabled>&nbsp;&nbsp;
<if:fls_enabled>         
<tag:language.FLS_CUSTOM_FL />
<if:hash_found><img src="images/fls_unlocked.png" border="0" alt="<tag:language.FLS_UNLOCKED />" title="<tag:language.FLS_UNLOCKED />" />
<else:hash_found><if:have_slots1><a href="index.php?page=fls&id=<tag:torrent.info_hash />"></if:have_slots1><img src="images/fls_locked.png" border="0" alt="<tag:language.FLS_LOCKED />" title="<tag:language.FLS_LOCKED />" /><if:have_slots2></a></if:have_slots2></if:hash_found>
</if:fls_enabled></span>
<span class="col01"><tag:language.CATEGORY_FULL />:</span>
<span class="col02"><tag:torrent.cat_name /></span>
<span class="col03"><tag:language.SIZE />:</span>
<span class="col04"><tag:torrent.size /></span>
</li>
<li>
<span class="col01"><tag:language.SPEED /></span>
<span class="col02"><tag:torrent.speed /></span>
<span class="col03"><tag:language.ADDED /></span>
<span class="col04"><tag:torrent.date /></span>
</li>
<li>
<if:auto_topic_enabled>
<if:FORUM_LNK>  
<span class="col01"><tag:language.FORUM /></span>
<span class="col02"><tag:torrent.topicid /></span>   
</if:FORUM_LNK>
</if:auto_topic_enabled>
<span class="col03"><tag:language.DOWNLOADED /></span>
<span class="col04"><tag:torrent.downloaded /></span>
</li>
<li>
<span class="col08"><tag:language.UPLOADER />&nbsp;&nbsp;<tag:torrent.uploader /></span>
</li>
<br />
<li>
<if:sub_enabled>
<if:HAVE_SUBTITLE>
<span class="col08"><tag:language.SUB_T_H />
<loop:subs>           
<tag:subs[].flag />
<tag:subs[].name />               
</loop:subs></span>
</if:sub_enabled>
</if:HAVE_SUBTITLE>
</li>
<li>
<if:mult_enabled>        
<span class="col08"><tag:language.UPM_UPL_MULT />&nbsp;<tag:mult /></span>
</if:mult_enabled>       
</li>
<li>
<span class="col08"><div id="peer_counts"><span class="grn"><tag:torrent.seeds /></span>, <span class="org"><tag:torrent.leechers /></span> = <span class="gold"><tag:torrent.peers /></span><if:refresh_peers_enabled>&nbsp;&nbsp;&nbsp;<img src="<tag:BASEURL />/images/refresh.gif" border="0" onclick="refresh_peers('<tag:torrent.info_hash />')" title="<tag:language.REFRESH_PEERS />" /></if:refresh_peers_enabled></div></span>
</li>
<li>
<span class="col08"><tag:language.INFO_HASH />:&nbsp;<tag:torrent.info_hash /></span>
</li>
<br />
</td>
        
<td class="kcdInfoRT">
<br />
<br />
        <if:download_locked>
        <if:need_intro>
        
          
          <span style="font-weight:bold;"><tag:language.IBD_NEED_TO_INTRODUCE_1 /> <if:newThread><tag:language.IBD_NEED_TO_INTRODUCE_2A /><else:newThread><tag:language.IBD_NEED_TO_INTRODUCE_2B /></if:newThread> <tag:language.IBD_NEED_TO_INTRODUCE_3 /> <tag:introForumLink /><tag:language.HERE /></a></span>.
       
        </if:need_intro>
        <else:download_locked>
          
            
            <if:dlratiocheck>
              <if:magnet_enabled1><a href="<tag:magnetLink />"><img src="<tag:BASEURL />/images/m-download.png" alt="<tag:language.MAGNET_DOWN_USING />" title="<tag:language.MAGNET_DOWN_USING />" /></a><else:magnet_enabled1><a href="index.php?page=downloadcheck&amp;id=<tag:torrent.info_hash />"><img src="<tag:BASEURL />/images/t-download.png"></a></if:magnet_enabled1>
            <else:dlratiocheck>
              <if:magnet_enabled2><a href="<tag:magnetLink />"><img src="<tag:BASEURL />/images/m-download.png" alt="<tag:language.MAGNET_DOWN_USING />" title="<tag:language.MAGNET_DOWN_USING />" /></a><else:magnet_enabled2><a href="download.php?id=<tag:torrent.info_hash />&amp;f=<tag:down_filename />.torrent"><img src="<tag:BASEURL />/images/t-download.png"></a></if:magnet_enabled2>
            </if:dlratiocheck>
          
        </if:download_locked>       


       


<if:ddl_enabled>        
<if:has_direct_link>
<br />
<br />        
<a href="<tag:direct_link />" target="_blank"><img src="<tag:BASEURL />/images/d-download.png" border="0" alt="<tag:language.DIRECT_DOWNLOAD />" title="<tag:language.DIRECT_DOWNLOAD />" /></a>       
</if:has_direct_link>
</if:ddl_enabled>
<if:bookmark_enabled>
<br />
<br />
<a href="index.php?page=bookmark&do=add&torrent_id=<tag:id />"><img  src='<tag:BASEURL />/images/bookmark.png' alt="<tag:language.TB_BOOKMARK />" title="<tag:language.TB_BOOKMARK />"></a>
</if:bookmark_enabled>
<br />
<br />
<if:ruat><tag:rep /></if:ruat>
</div>
</ul>
</td>
</tr>
</table>
</div>
<!--end torrent info box-->

<!--extra info-->
<div>
<table align="center" width="100%" border="0" cellpadding="5" cellspacing="3">
<tr valign="top">
<if:thanks_enabled1> 
<td align="center" width="33%" style="border-width:0px;">
<div style="text-align:left;padding-left:50px;padding-top:6px;"><input type="button" id="ty" disabled="disabled" value="<tag:language.THANKS_YOU />" onclick="thank_you('<tag:torrent.info_hash />')" /></div>
</td>

</if:thanks_enabled1> 
<td align="left" width="33%" style="border-width:0px;"><div style="text-align:center;"><tag:language.RATING />:&nbsp;&nbsp;<tag:torrent.rating /></div>
</td>

<if:AFR>
<if:reseed_possible>
<td align="left" width="33%" style="border-width:0px;">
<tag:language.AFR_RESEED />
<tag:reseed />

</td>
</if:reseed_possible>
</if:AFR>
<if:addthis_enabled>
</tr></table>
<table align="center" width="100%" border="0" cellpadding="5" cellspacing="3">
<tr valign="top">
<td align="center" width="40%" style="border-width:0px;padding-top:10px;">
<div align="left" style="padding-left:60px;text-align:left;"><tag:language.ADDTHIS_SHARE2 /></div><div align="center" style="padding-left:30px;padding-top:10px;"><tag:show_addthis /></div>
</if:addthis_enabled>
</td>

<if:reenc_enabled>
<td align="center" width="60%" style="border-width:0px;">              
<form action="reencode.php" method="post" onsubmit="return false">
<div id="reencode_div" name="reencode_div" style="display:block;"></div>
<div id="loadinga" name="loadinga" style="display:none;"><img src="images/ajax-loader.gif" alt="" title="ajax-loader" /></div>
<div style="float:right;padding-right:50px;padding-top:6px;"><input type="button" id="tys" disabled="disabled" value="<tag:language.REENCODER />" onclick="dt_thank_you('<tag:torrent.info_hash />')" /></div>
</form>
<script type="text/javascript">dt_ShowThank('<tag:torrent.info_hash />');</script>
<form action="reencodeb.php" method="post" onsubmit="return false">
<div id="reencodeb_div" name="reencodeb_div" style="display:block;"></div>
<div id="loadingb" name="loadingb" style="display:none;"><img src="images/ajax-loader.gif" alt="" title="ajax-loader" /></div>
<div style="float:right;padding-right:30px;"><input type="button" id="tyt" disabled="disabled" value="<tag:language.REENCODERB />" onclick="dt_thank_youb('<tag:torrent.info_hash />')" /></div>
</form>
<script type="text/javascript">dt_ShowThankb('<tag:torrent.info_hash />');</script>
</if:reenc_enabled>

</td>
</tr>
</table>
</div>
<!--end extra info-->
<if:show_all_uploads_per_user_enabled>
<table width="100%" align="center">
<tr>
<td class="header"><tag:language.ALL_USER_UPLOADS /></td>
</tr><td class="lista">
<marquee onmouseover=this.stop() onmouseout=this.start()  scrollAmount=6 direction=left >
<loop:upl>
<font size = 2><b><tag:upl[].filename /></b>
</loop:upl>
</marquee>
</td></tr>
 </table>
</if:show_all_uploads_per_user_enabled>
<!--menu bar-->
<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr valign="top">
<td align="center" class="header"> 
<div class="kcdtabBar">
<ul class='kcdtabs'>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('description')"><tag:language.DESCRIPTION /><a href="javascript:kcdmenu.show('description')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('screenshots')"><tag:language.SCREEN /><a href="javascript:kcdmenu.show('screenshots')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('similartorrents')"><tag:language.details_similar_torrents /><a href="javascript:kcdmenu.show('similartorrents')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('files')"><tag:language.files /><a href="javascript:kcdmenu.show('files')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('trackerlist')"><tag:language.trackerlist /><a href="javascript:kcdmenu.show('trackerlist')" /></a>
</li>
<if:vedsc_enabled_1>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('comments')"><tag:language.usercomments /><a href="javascript:kcdmenu.show('comments')" /></a>
</li>
</if:vedsc_enabled_1>
<if:thanks_enabled>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('thankyou')"><tag:language.THANKS_USERS /><a href="javascript:kcdmenu.show('thankyou')" /></a>
</li>
</if:thanks_enabled>
<if:imdb_enabled>
<if:imdb>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('imdbcomments')"><tag:language.imdbcomments /><a href="javascript:kcdmenu.show('imdbcomments')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('extras')"><tag:language.imdb /><a href="javascript:kcdmenu.show('extras')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('cast')"><tag:language.cast /><a href="javascript:kcdmenu.show('cast')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('plot')"><tag:language.plot /><a href="javascript:kcdmenu.show('plot')" /></a>
</li>
<li>
<a class="mainmenu" href="javascript:kcdmenu.toggle('trivia')"><tag:language.trivia /><a href="javascript:kcdmenu.show('trivia')" /></a>
</li>
</if:imdb>
</if:imdb_enabled>
</ul>
</div>
</td>
</tr>
</table>
<!--end menu bar-->

<tag:TheTVDBExtra />

<!--description page-->
<div id="description" style="display:none">
<br />
<br />
<table width="100%" border="0" cellpadding="3" cellspacing="3">
<tr valign="top">
<td align="center" class="blocklist" style="border-width:0px;">
<strong><tag:language.DESCRIPTION />:</strong>
<br />
<br />
<div align="left" style="padding:0 60px 0 60px;text-align:left;">&nbsp;&nbsp;<tag:torrent.description />&nbsp;&nbsp;</div>
<br />
</td>
</tr>
<if:st_comm_enabled>
<if:LEVEL_SC>
<tr valign="top">
<td align="center" class="blocklist" style="border-width:0px;">
<center><strong><tag:language.STAFF_COMMENT /></center></strong><br />
<div align="left" style="padding:0 60px 0 60px;text-align:left;">&nbsp;&nbsp;<tag:torrent_staff_comment />&nbsp;&nbsp;</div>
<br />
</td>
</tr>
</if:LEVEL_SC>
</if:st_comm_enabled>
<if:nfo_enabled>
<tr valign="top">
<td align="center" class="blocklist" style="border-width:0px;">
<center><strong><tag:language.NFO_NFO />:</strong></center>
<if:view_nfo>
<if:nfo_exists>
<br />                                   
<div align=center><a href='#nfo' onclick='javascript:ShowHide("slidenfo","");'><stong><tag:language.NFO_SHOW_HIDE /></strong></a></div>
<div align='center' style='display:none' id='slidenfo'>
<img src='nfo/nfogen.php?nfo=rep/<tag:torrent.info_hash />.nfo&colour=9'>
</div>
</div>
</if:nfo_exists>
</if:view_nfo>
<br />
</td>
</tr>
</if:nfo_enabled>
<if:media_enabled>  
<tr valign="top">
<td align="center" class="blocklist" style="border-width:0px;">      
<center><strong><tag:language.MPLAYER /></center></strong><br />
<center><tag:torrent.mplayer /></center>
<br />
</td>
</if:media_enabled>
</tr>
</table>
</div>
<!--end description page-->

<!--screenshots page-->
<div id="screenshots" style="display:none">
<br />
<br />
<table width="100%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td align="center" class="blocklist" style="border-width:0px;">
<if:imageup_enabled3>
<strong><tag:language.SCREEN />:</strong>
<br /><br />
<if:SCREENIS1>
<a href="<tag:uploaddir /><tag:torrent.screen1 />" title="view image" class="lightbox"><img src="thumbnail.php?size=150&path=<tag:uploaddir /><tag:torrent.screen1 />"></a>
</if:SCREENIS1>&nbsp;&nbsp;
<if:SCREENIS2>
<a href="<tag:uploaddir /><tag:torrent.screen2 />" title="view image" class="lightbox"><img src="thumbnail.php?size=150&path=<tag:uploaddir /><tag:torrent.screen2 />"></a>
</if:SCREENIS2>&nbsp;&nbsp;
<if:SCREENIS3>
<a href="<tag:uploaddir /><tag:torrent.screen3 />" title="view image" class="lightbox"><img src="thumbnail.php?size=150&path=<tag:uploaddir /><tag:torrent.screen3 />"></a>
</if:SCREENIS3>
</if:imageup_enabled3>
<br />
</td>
</tr>
</table>
</div>
<!--end screenshots page-->

<!--files page-->
<div id="files" style="display:none">
<br />
<br />
<table align="center" width="70%" border="0" cellpadding="5" cellspacing="5">
<center><strong><tag:language.files /></strong></center>
<tr valign="top">
<if:DISPLAY_FILES>
<tr>        
<td>        
<table width="90%" class="">
<tr>
<td align="center" class="lista"><tag:language.FILE /></td>
<td align="center" class="lista" style="text-align:left;" valign="top"><tag:language.SIZE /></td>
</tr>
<loop:files>
<tr>
<td align="center" class="lista" style="text-align:left;" valign="top"><tag:files[].filename /></td>
<td align="center" class="lista" style="text-align:left;" valign="top"><tag:files[].size /></td>
</tr>
</loop:files>
</table>
</div>
</td>
</tr>
</if:DISPLAY_FILES>       
</td>
</tr>
</table>
</div>
<!--end files page-->

<!--similar torrents page-->
<div id="similartorrents" style="display:none">
<br />
<br />
<table align="center" width="70%" border="0" cellpadding="5" cellspacing="5">
<tr valign="top">
<br />
<if:similar_enabled>
<center><strong><tag:language.details_similar_torrents /></center></strong>
<br />          
<table width="100%" class="main" border="0" cellspacing="0" cellpadding="1">
<tr>
<td class="header" style="text-align:center;"><tag:language.details_name /></td>
<td class="header" style="text-align:center;"><tag:language.details_date /></td>
<td class="header" style="text-align:center;"><tag:language.details_size /></td>
<td class="header" style="text-align:center;"><tag:language.details_seeders /></td>
<td class="header" style="text-align:center;"><tag:language.details_leechers /></td>
</tr>
<loop:similar_torrents>
<tr>
<td class="lista" style="text-align:center;"><a href="index.php?page=torrent-details&id=<tag:similar_torrents[].info_hash />&hit=1"><b><tag:similar_torrents[].name /></b></a></td>
<td class="lista" style="text-align:center;"><tag:similar_torrents[].date /></td>
<td class="lista" style="text-align:center;"><tag:similar_torrents[].size /></td>
<td class="lista" style="text-align:center;"><span style="color:<tag:similar_torrents[].sc />"><tag:similar_torrents[].seeds /></span></td>
<td class="lista" style="text-align:center;"><span style="color:<tag:similar_torrents[].lc />"><tag:similar_torrents[].leechers /></span></td>
</tr>
</loop:similar_torrents>
</table>
</if:similar_enabled>
</div>
<!--end similar torrents page-->

<!--tracker list page-->
<div id="trackerlist" style="display:none">
<br />
<br />
<center><strong>Tracker List</strong></center>
<table align="center" width="70%" border="0" cellpadding="5" cellspacing="5">
<tr valign="top">
<tr>        
<td>        
<table width="90%" class="header">
<tr>
<td align="middle" class="lista"><tag:torrent.update_url /></td>
<td class="lista" align="center" style="text-align:left;"><tag:torrent.announce_url /></td>
</tr>
<loop:files>
<tr>
<td align="middle" class="lista"><tag:language.LAST_UPDATE /></td>
<td class="lista" align="center" style="text-align:left;"><tag:torrent.lastupdate /> (<tag:torrent.lastsuccess />)</td>
</tr>
</loop:files>
</table>
</div>
</td>
</tr>
</table>
</div>
<!--end tracker list page-->

<!--comments page-->
<div id="comments" style="display:none">
<br />
<br />
      <table width="100%" class="lista">
        <if:lock_comments_enabled>
        <tr><td align="center" colspan="3"><tag:lock /></td></tr>
        </if:lock_comments_enabled>
        <if:NO_COMMENTS>
        <tr>
          <td colspan="3" class="lista" align="center"><tag:language.NO_COMMENTS /></td>
        </tr>
        <else:NO_COMMENTS>
        <if:com_lay_1>
       <loop:comments>
        <tr>
        <td align="left" class="header" colspan="2">
        <table width="100%"><tr>
         <td align="right"><tag:comments[].edit.delete />
        </tr></table>
        </td>
        </tr>
        <tr>
        <td class="header" align="left" valign="top">
        <table width="140">
        <tr>
          <td>
          <tag:comments[].user />
          <br />
          <if:comments_reputation>
          <tag:language.REP />: <tag:comments[].reputation />
          <br />
          <else:comments_reputation>
          </if:comments_reputation>
          <tag:comments[].date />
          <br />
          <tag:comments[].elapsed />
          <br />
          <tag:comments[].avatar />
          <br />
          <tag:comments[].ratio />
          <br />
          <tag:comments[].uploaded />
          <br />
          <tag:comments[].downloaded />
          </td>
        </tr>
        </table>
        </td>
        <td class="lista" width="100%" valign="top" style="padding:10px">
        <tag:comments[].comment /><if:avatar_signature_sync_enabled_1><br><br><br><br><center><tag:comments[].comm_sig /></center></if:avatar_signature_sync_enabled_1></td>
        </tr>
        </loop:comments>
        <else:com_lay_1>
        <loop:comments>
        <tr>
          <td class="header"><tag:comments[].user /></td>
          <td class="header"><tag:comments[].date /></td>
          <td class="header" align="right"><if:vedsc_enabled_2><tag:comments[].edit.delete /><else:vedsc_enabled_2><tag:comments[].delete /></if:vedsc_enabled_2></td>
        </tr>
        <tr>
          <td colspan="3" class="lista" align="center" style="text-align:left;" valign="top"><tag:comments[].comment /><if:avatar_signature_sync_enabled><br><center><tag:comments[].comm_sig /></center></if:avatar_signature_sync_enabled></td>
        </tr>
        </loop:comments>
        </if:com_lay_1>
        </if:NO_COMMENTS>
        <if:vedsc_enabled_3>
        <!-- #######################################################
        # view/edit/delete shout, comments -->
        <if:MASSDEL_COMMENTS>
                            <br /><div align="right" style="margin-right:8px;">
                            <input type="submit" class="btn" value="<tag:language.FRM_DELETE />" onclick="return confirm('If you are really sure you want to delete selected comments click OK, othervise Cancel!')" />
                            <input type="checkbox" class="btn" name="all_down" onclick="SetAllCheckBoxes('deleteallcomments','delcomment[]',this.checked)" />
                            </div>
        </if:MASSDEL_COMMENTS>
        </form>
        </if:VIEW_COMMENTS>
        <!-- # End
        ####################################################### -->
        </if:vedsc_enabled_3>
        <if:pager2>
        <tr><td class='blocklist' colspan='3' align='center'><tag:p_bottom /></td></tr>
        </if:pager2>
      <if:VIEW_COMMENTS_2>
      </table>
      </if:VIEW_COMMENTS_2>
    <br />
    <br />
</div>
<!--end comments page-->

<!--thank you page-->
<div id="thankyou" style="display:none">
<br />
<br />
<table width="100%" border="0" cellpadding="3" cellspacing="3">
<tr>
<if:thanks_enabled>                    
<form action="thanks.php" method="post" onsubmit="return false">
<div id="thanks_div" name="thanks_div" style="display:block;"></div>
<div id="loading" name="loading" style="display:none;"><img src="images/ajax-loader.gif" alt="" title="ajax-loader" /></div>
</form>
<script type="text/javascript">ShowThank('<tag:torrent.info_hash />');</script>
<br />
</if:thanks_enabled> 
</tr>
</table>
</div>
<!--end thank you page-->

<!--imdb pages-->
<!--imdb user comments-->
<div id="imdbcomments" style="display:none">
<br />
<br />
<table width="60%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><center><b><tag:language.imdbcomments /></b></center> <br /><p><tag:imdb_comment /></p><br />
</td>
</tr>
</table>
</div>
<!--end imdb user comments-->

<!--imdb extras-->
<div id="extras" style="display:none">
<br />
<br />
<table width="60%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_TITLE_YEAR />:</b> <tag:imdb_title />  <tag:imdb_year /><br />
</td>

</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_TAGLINES />:</b> <tag:imdb_taglines /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_GENRE />:</b> <tag:imdb_genre /><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_RATING />:</b> <tag:imdb_rating /> <tag:language.STARS /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_VOTES />:</b> <tag:imdb_votes /><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_LANGUAGES />:</b> <tag:imdb_languages /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_COUNTRY />:</b> <tag:imdb_country /><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_RUNTIME />:</b> <tag:imdb_runtime /> <tag:language.IMDB_MINUTES /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_COLORS />:</b> <tag:imdb_colors /><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_MUSIC_BY />:</b> <tag:imdb_composer /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_SOUND />:</b> <tag:imdb_sound /><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_TRAILERS />:</b> <tag:imdb_trailer /><br />
</td>
</tr>
</table>
</div>
<!--end imdb extras-->

<!--imdb cast-->
<div id="cast" style="display:none">
<br />
<br />
<table width="80%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_WRITING_BY />:</b> <tag:imdb_writer /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_PRODUCED_BY />:</b>
<table width="55%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_NAME />:</b><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_ROLE />:</b><br />
</td>
</tr>
</table>
<tag:imdb_producer /><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_DIRECTOR />:</b> <tag:imdb_director /><br />
</td><br />
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_CAST />:</b>
<table width="42%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_NAME />:</b><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_ROLE />:</b><br />
</td>
</tr>
</table>
<tag:imdb_cast /><br />
</td>
</tr>
</table>
</div>
<!--end imdb cast-->

<!--imdb plot-->
<div id="plot" style="display:none">
<br />
<br />
<table width="60%" border="2" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_PLOT_OUTLINE />:</b> <br /><p><tag:imdb_plotoutline /></p><br />
</td>
</tr>
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_PLOT />:</b> <br /><tag:imdb_plot /><br />
</td>
</tr>
</table>
</div>
<!--end imdb plot-->

<!--imdb media-->
<div id="media" style="display:none">
<br />
<br />
<table width="40%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_MUSIC_BY />:</b> <tag:imdb_composer /><br />
</td>
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_SOUND />:</b> <tag:imdb_sound /><br />
</td>
</tr>
</tr>
</table>
</div>
<!--end imdb media-->

<!--imdb trivia-->
<div id="trivia" style="display:none">
<br />
<br />
<table width="60%" border="0" cellpadding="2" cellspacing="2">
<tr valign="top">
<td class="blocklist" style="border-width:0px;"><b><tag:language.IMDB_TRIVIA />:</b><br /> <tag:imdb_trivia /><br />
</td>
</tr>
</table>
</div>
<!--end imdb trivia-->
<!--end imdb page-->

<br />
<hr>
<if:vedsc_enabled>
<div align="center">
  <form enctype="multipart/form-data" name="comment" method="post" action="index.php?page=details&id=<tag:comment_id />">
  <input type="hidden" name="info_hash" value="<tag:comment_id />" />
    <table align="center" width="100%" border="0" cellpadding="1">
      <tr>
        <td align="left" class="header"><tag:language.USER_NAME /></td>
        <td class="lista" align="left" ><input name="user" TYPE="text" size="20" value="<tag:comment_username />" maxlength="100" disabled; readonly /></td>
      </tr>
      <tr>
        <td align="left" class="header"><tag:language.COMMENT_1 />:</td>
        <td class="lista" align="left"><tag:comment_comment /></td>
      </tr>
      <tr>
        <td class="header" colspan="2" align="center">
        <input type="submit" class="btn" name="confirm" value="<tag:language.FRM_CONFIRM />" />       
        </td>
      </tr>
    </table>
  </form>
    </div>
    <br />    
</if:vedsc_enabled>    

    <div align="center">
      <tag:torrent_footer /> | <tag:to_top />
    </div>
    <br />