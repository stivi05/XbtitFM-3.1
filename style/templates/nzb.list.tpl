<if:DCCAT>
<div align="center">
<form action="<tag:torrent_script />" method="get" name="torrent_search">
  <input type="hidden" name="page" value="nzb" />
  <table border="0" class="lista" align="center">
    <tr>
<if:swit>   
      <td class="block">Page Layout</td>
</if:swit>  
      <td class="block"><tag:language.TORRENT_SEARCH /></td>
      <td class="block"><tag:language.CATEGORY_FULL /></td>
      
      <td class="block">&nbsp;</td>
    </tr>
    <tr>
       <tag:switch />
      <td><input type="text" name="search" size="25" maxlength="50" value="<tag:torrent_search />" /></td>
      <td>
        <tag:torrent_categories_combo />
      </td>

      <td><input type="submit" class="btn" value="<tag:language.SEARCH />" /></td>
     </tr>
  </table>
</form>
</div>
</if:DCCAT>
<if:DTCAP>
<!-- begin category checks -->
<script type="text/javascript">
<!--
function AddCategories()
      {
      var catadd="";
      for (i=0;i<document.tcategories.elements.length;i++)
        {
          if (document.tcategories.elements[i].checked)
             catadd+=";"+document.tcategories.elements[i].value;
      }
      // create hidden field
      if (catadd.length>0)
        {
        var field = document.createElement("input");
        field.setAttribute("type","hidden");
        field.setAttribute("value",catadd.substr(1));
        field.setAttribute("name","category");
        document.torrent_search.appendChild(field);
      }
}
-->
</script>
<div align="center">
<table border="0" class="lista" align="center">
<tr>
  <td class="block" colspan="2" style="text-align: center"><tag:language.TORRENT_SEARCH /></td>
     <if:swit>  
   <td class="block" colspan="1" style="text-align: left">Page Layout</td>
    </if:swit> 
</tr>
<tr>
<td>
<form name="tcategories" action="index.php" method="post">
<div style="width: 600px; height:60px; overflow-y: scroll;">
<table>
  <tr>
    <td><tag:category_checks /></td>
  </tr>
</table>
</form>
</td>
<td>
<form action="<tag:torrent_script />" method="get" name="torrent_search" onsubmit="AddCategories()">
  <input type="hidden" name="page" value="nzb" />
  <table border="0" align="center">
    <tr>
      <td colspan="2"><input type="text" name="search" size="25" maxlength="50" value="<tag:torrent_search />" /></td>
    </tr>
    <tr>

      <td><input type="submit" class="btn" value="<tag:language.SEARCH />" /></td>
     </tr>
  </table> </div>
</form>
<tag:switch />
</td>
</tr>
</table>
</div>
</if:DTCAP>


<table width="100%">
  <tr>
    <td colspan="2" align="center"> <tag:torrent_pagertop /></td>
  </tr>
  <tr>
    <td>
      <table width="100%" class="lista">      
        <tr>
          <td align="center" width="45" class="header"><tag:torrent_header_category /></td>
          <td align="center" class="header"><tag:torrent_header_filename /></td>
          <td align="center" width="60" class="header">NZB Size</td>
          <td align="center" width="20" class="header"><tag:torrent_header_download /></td>
          <if:dch>
          <td align="center" width="85" class="header">Price DC</td>
          </if:dch>
          <td align="center" width="85" class="header"><tag:torrent_header_added /></td>
          <if:topa>
          <td align="center" width="10" class="header">up</td>
          </if:topa>
        </tr>      
        <loop:torrents>
        <tr>
          <td align="center" width="45" class="lista" style="text-align: center;" <tag:torrents[].color />"><tag:torrents[].category /></td>
          <td class="lista" valign="middle" onMouseOver="this.className='post'" onMouseOut="this.className='lista'" style="padding-left:10px;overflow:auto; <tag:torrents[].color />"><tag:torrents[].filename /><tag:torrents[].quality /></td>
          <td align="center" width="60" class="lista" style="text-align: center; <tag:torrents[].color />"><tag:torrents[].size /></td>
          <td align="center" width="20" class="lista" style="text-align: center; <tag:torrents[].color />"><tag:torrents[].download /></td>
          <if:dc>
          <td align="center" width="20" class="lista" style="white-space:wrap; text-align:center; <tag:torrents[].color />"><tag:torrents[].dc /></td>
          </if:dc>
          <td align="center" width="85" class="lista" style="white-space:wrap; text-align:center; <tag:torrents[].color />"><tag:torrents[].added /></td>
 <if:topb><td align="center" width="10" class="lista" style="text-align: center; <tag:torrents[].color />"><tag:torrents[].top /></td></if:topb>
        </tr>
        </loop:torrents>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"> <tag:torrent_pagerbottom /></td>
  </tr>
</table>