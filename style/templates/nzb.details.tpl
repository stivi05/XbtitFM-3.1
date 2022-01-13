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
</script>

<script type="text/javascript">
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
  at.requestFile='nzbthanks.php';
  at.setVar('infohash',"'"+ia+"'");
  at.setVar('thanks',1);
  at.onCompletion = ShowUpdate;
  at.runAJAX();
}

function ShowThank(ia)
{
  at.resetData();
  at.onLoading=show_wait;
  at.requestFile='nzbthanks.php';
  at.setVar('infohash',"'"+ia+"'");
  at.onCompletion = ShowUpdate;
  at.runAJAX();
}

function show_wait()
{
  document.getElementById('thanks_div').style.display='none';
  document.getElementById('loading').style.display='block';
}
</script>
<script>
		var load = false;
		window.onload = function(){
			if(!load) {
				wmark.init({
					/* config goes here */
					"position": "top-right", // default "bottom-right"
					"opacity": 50, // default 50
					"className": "watermark", // default "watermark"
					"path": "images/wm.png"
				});
			
				load = true;
			}
		}
</script>

<script type="text/javascript" src="jscript/lightbox.js"></script>
<link rel="stylesheet" href="jscript/lightbox.css" type="text/css"  />

<link rel="stylesheet" href="jscript/button.css" type="text/css"  />
    <div align="center">
      <table width="100%" class="lista" border="0" cellspacing="5" cellpadding="5">
        <tr>
          <td align="right" class="header"><tag:language.FILE />
          <if:MOD>
          <tag:mod_task />
          </if:MOD>
          </td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.filename /></td>
        </tr>
<if:MODER>
            <tr>
              <td align="right" class="header"><tag:language.TORRENT_MODERATION /></td>
              <td class="lista" align="center"><tag:torrent.moderation /></td>
            </tr>
</if:MODER>
<if:vipwer>
        <tr>
          <td align="right" class="header">VIP Torrent:</td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:vipt /></td>
        </tr>
</if:vipwer>
        <tr>
          <td align="right" class="header"><tag:language.NZB /></td>
          <td class="lista" align="left" style="text-align:left;" valign="top"><a href="nzbdownload.php?id=<tag:torrent.info_hash />&amp;f=<tag:torrent.filename />.nzb" class="a-btn">
    <span class="a-btn-slide-text"><tag:dcc />DC</span>
    <img src="<tag:pic />" alt="Download" />
    <span class="a-btn-text">Download<small>This NZB File</small></span>
    <span class="a-btn-icon-right"><span></span></span>
</a></td>
        </tr>
        <tr>
          <td align="right" class="header"><tag:language.INFO_HASH /></td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.info_hash /></td>
        </tr>

        <if:IMAGEIS>
        <tr>
          <td align="right" class="header" valign="top"><tag:language.IMAGE /></td>
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.image />" rel="lightbox" title="<tag:torrent.filename />" ><img src="<tag:uploaddir /><tag:torrent.image />" width=<tag:width /> <tag:wm />></a></td>
        </tr>
        </if:IMAGEIS>
        <if:trail>
        <tr>
          <td align="right" class="header" valign="top">Trailer</td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:vid /></td>
        </tr>
        </if:trail>
        <if:YOUTUBE>
<tr>
          <td align="right" class="header"><tag:language.YT /><img src="images/youtube.gif"></td>
          <td class="lista" align="center"><iframe width="560" height="315" src="http://www.youtube.com/embed/<tag:torrent.youtube_video />" frameborder="0" allowfullscreen></iframe></td>
        </tr>
        </if:YOUTUBE>
        <tr>
          <td align="right" class="header" valign="top"><tag:language.DESCRIPTION /></td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.description /></td>
        </tr>
        
<if:SCREENIS1>
      <tr>
      <td align="right" class="header" valign="top"><tag:language.SCREEN /></td>
      <td class="lista">
      <table class="lista" border="0" cellspacing="0" cellpadding="0">
        
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.screen1 />" rel="lightbox" title="<tag:torrent.filename />" ><img src="thumbnail.php?size=300&path=<tag:uploaddir /><tag:torrent.screen1 />" <tag:wm />></a></td>
        
        <if:SCREENIS2>
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.screen2 />" rel="lightbox" title="<tag:torrent.filename />" ><img src="thumbnail.php?size=300&path=<tag:uploaddir /><tag:torrent.screen2 />" <tag:wm />></a></td>
        </if:SCREENIS2>
        </tr>
        <tr>
        <if:SCREENIS3>
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.screen3 />" rel="lightbox" title="<tag:torrent.filename />" ><img src="thumbnail.php?size=300&path=<tag:uploaddir /><tag:torrent.screen3 />" <tag:wm />></a></td>
        </if:SCREENIS3>
        <if:SCREENIS4>
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.screen4 />" rel="lightbox" title="<tag:torrent.filename />" ><img src="thumbnail.php?size=300&path=<tag:uploaddir /><tag:torrent.screen4 />" <tag:wm />></a></td>
        </if:SCREENIS4>
        </tr>
        <tr>
        <if:SCREENIS5>
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.screen5 />" rel="lightbox" title="<tag:torrent.filename />" ><img src="thumbnail.php?size=300&path=<tag:uploaddir /><tag:torrent.screen5 />" <tag:wm />></a></td>
        </if:SCREENIS5>
        <if:SCREENIS6>
          <td class="lista" align="center"><a href="<tag:uploaddir /><tag:torrent.screen6 />" rel="lightbox" title="<tag:torrent.filename />" ><img src="thumbnail.php?size=300&path=<tag:uploaddir /><tag:torrent.screen6 />" <tag:wm />></a></td>
        </if:SCREENIS6>
      </table>
      </td>
      </tr>
</if:SCREENIS1>
<tr>
          <td align="right" class="header"><tag:language.CATEGORY_FULL /></td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.cat_name /></td>
        </tr>
        <tr>
          <td align="right" class="header"><tag:language.RATING /></td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.rating /></td>
        </tr>
        <if:thanks>
        <tr>
        <td align="right" class="header" valign="top"><tag:language.THANKS_USERS /></td>
          <td class="lista" align="center">
              <form action="nzbthanks.php" method="post" onsubmit="return false">
              <div id="thanks_div" name="thanks_div" style="display:block;"></div>
              <div id="loading" name="loading" style="display:none;"><img src="images/ajax-loader.gif" alt="" title="ajax-loader" /></div>
              <input type="button" id="ty" disabled="disabled" value="<tag:language.THANKS_YOU />" onclick="thank_you('<tag:torrent.info_hash />')" />
              </form>
              <script type="text/javascript">ShowThank('<tag:torrent.info_hash />');</script>
          </td>
        </tr>
        </if:thanks>
        <if:dc>
        <tr>
          <td align="right" class="header">Price in DC</td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:dcc /></td>
        </tr>
        </if:dc>
        <if:imdb>
        <tr>
          <td align="right" class="header" valign="top">IMDB</td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:frameit /></td>
        </tr>
        <tag:extra1 />
        </if:imdb>
        <tr>
          <td align="right" class="header"><tag:language.SIZE /></td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.size /></td>
        </tr>

        <tr>
          <td align="right" class="header"><tag:language.ADDED /></td>
          <td class="lista" style="text-align:left;" valign="top"><tag:torrent.date /></td>
        </tr>
        <if:SHOW_UPLOADER>
        <tr>
          <td align="right" class="header"><tag:language.UPLOADER /></td>
          <td class="lista" align="center" style="text-align:left;" valign="top"><tag:torrent.uploader /></td>
        </tr>
        </if:SHOW_UPLOADER>
        <if:SIM>
        <tr>
          <td align="right" class="header"><tag:language.details_similar_nzb /></td>
          <td class="lista" align="center"><center><tag:similar /></center></td>
        </tr>
        </if:SIM>
        <tr>
          <td align="right" class="header">Report</td>
          <td align="center" class="lista"><tag:rep /></td>
        </tr>


      </table>
      

<!-- #######################################################
     # view/edit/delete shout, comments -->
     
      <if:VIEW_COMMENTS>
      
            <script type="text/javascript">
                <!--
                function SetAllCheckBoxes(FormName, FieldName, CheckValue) {
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
                  document.forms[FormName].elements['all_down'].checked = CheckValue;
                }
                -->
            </script>
            
<form name="deleteallcomments" method="post" action="index.php?page=nzb-details&id=<tag:torrent.info_hash />">

<!-- # End
     ####################################################### --> 

    <a name="comments" />
      <br />
      <br />
      <table width="100%" class="lista">
        <if:INSERT_COMMENT>
        <tr>
          <td align="center" colspan="3">
             <a href="index.php?page=commentnzb&amp;id=<tag:torrent.info_hash />&amp;usern=<tag:current_username />"><tag:language.NEW_COMMENT /></a>
          </td>
        </tr>
        </if:INSERT_COMMENT>
        <if:NO_COMMENTS>
        <tr>
          <td colspan="3" class="lista" align="center"><tag:language.NO_COMMENTS /></td>
        </tr>
        <else:NO_COMMENTS>
         
       <loop:comments>
        <tr>
        <td align="left" class="header" colspan="2">
        <table width="100%"><tr>
<!-- #######################################################
     # view/edit/delete shout, comments -->

          <td align="right"><tag:comments[].edit.delete />
          
<!-- # End
     ####################################################### --> 

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
          <tag:comments[].date />
          <br />
          <tag:comments[].elapsed />
          <br />
          <tag:comments[].avatar />
          
          <if:dc>
          <br />
          <tag:comments[].dc />
          </if:dc>
          <br />
          <tag:comments[].online />
          </td>
        </tr>
        </table>
        </td>
        <td class="lista" width="100%" valign="top" style="padding:10px">
        <tag:comments[].comment /></td>
        </tr>
        </loop:comments>

        </if:NO_COMMENTS>
      </table>

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

    
    </div>
    <br />
    <br />
    <div align="center">
      <tag:torrent_footer />
    </div>