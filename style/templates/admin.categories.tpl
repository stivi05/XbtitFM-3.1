<script language="javascript" type="text/javascript">
<!--
function update_cat(newimage,blank)
{
  if (newimage!="")
     document.cat_image.src = "<tag:image_url />" + newimage;
  else
     document.cat_image.src = blank;
}
//-->
</script>

<if:category_add>
  <form name="category_add_new" action="<tag:frm_action />" method="post">
    <table class="lista">
      <tr>
        <td class="header"><tag:language.CATEGORY_NAME /></td>
        <td class="lista" colspan="3"><input type="text" name="category_name" size="40" maxlength="20" value="<tag:category_name />" /></td>
      </tr>
      <tr>
        <td class="header"><tag:language.CATEGORY_SUB /></td>
        <td class="lista"><tag:subcat_combo /></td>
        <td class="header"><tag:language.CATEGORY_SORT_INDEX /></td>
        <td class="lista"><input  name="sort_index" value="<tag:category_sort />" size="10" maxlength="10" /></td>
      </tr>
      <tr>
        <td class="header"><tag:language.CATEGORY_IMAGE /></td>
        <td class="lista" valign="middle"><tag:image_combo /></td>
        <td class="lista" colspan="2"><img name="cat_image" src="<tag:category_image />" alt="" border="0" style="float:left;" /></td>
      </tr>
      <tr>
        <td class="header" align="center" colspan="4">
            <input type="submit" name="confirm" class="btn" value="<tag:language.FRM_CONFIRM />" />&nbsp;&nbsp;&nbsp;
            <input type="submit" name="confirm" class="btn" value="<tag:language.FRM_CANCEL />" />
        </td>
      </tr>
    </table>
  </form>
<else:category_add>
<if:perm>      
  <table class="lista" width="100%" align="center">
  <tr>
      <td class="header" align="center"><tag:language.GROUP /></td>
    <td class="header" align="center"><tag:language.VIEW_CAT /></td>
    <td class="header" align="center"><tag:language.VIEW_TORR_LIST /></td>
    <td class="header" align="center"><tag:language.VIEW_TORR_DET /></td>
    <td class="header" align="center"><tag:language.DOWNLOAD /></td>
    <td class="header" align="center"><tag:language.MIN_RATIO /></td>
  </tr>
  <loop:groups>
  <tr>
    <td class="lista" align="center"><tag:groups[].user /></td>
    <td class="lista" align="center"><tag:groups[].viewcat /></td>
    <td class="lista" align="center"><tag:groups[].viewtorrlist /></td>
    <td class="lista" align="center"><tag:groups[].viewtorrdet /></td>
    <td class="lista" align="center"><tag:groups[].downtorr /></td>
    <td class="lista" align="center"><tag:groups[].ratio /></td>
  </tr>
  </loop:groups>
  <tr>
    <td class="header" align="center" colspan="6"><tag:back /></td>
  </tr>
</table>
<else:perm>
<if:permedit>
<form action="<tag:frm_action />" name="level" method="post">
  <table class="lista" width="100%" align="center">
    <tr>
      <td class="header"><tag:language.VIEW_CAT /></td>
      <td class="lista">
        <input type="checkbox" name="viewcat" <tag:group.view_category /> />
      </td>
    </tr>
    <tr>
      <td class="header"><tag:language.VIEW_TORR_LIST /></td>
      <td class="lista">
        <input type="checkbox" name="viewtorrlist" <tag:group.view_torrlist /> />
      </td>
    </tr>
    <tr>
      <td class="header"><tag:language.VIEW_TORR_DET /></td>
      <td class="lista">
        <input type="checkbox" name="viewtorrdet" <tag:group.view_torrdet /> />
      </td>
    </tr>
    <tr>
      <td class="header"><tag:language.DOWNLOAD /></td>
      <td class="lista">
        <input type="checkbox" name="downtorr" <tag:group.down_torr /> />
      </td>
    </tr>
    <tr>
      <td class="header"><tag:language.MIN_RATIO /></td>
      <td class="lista"><input type="text" name="ratio" value="<tag:group.ratio />" size="5" /></td>
    </tr>
    <tr>
      <td align="center" class="header"><input type="submit" class="btn" name="write" value="<tag:language.FRM_CONFIRM />" /></td>
      <td align="center" class="header"><input type="submit" class="btn" name="write" value="<tag:language.FRM_CANCEL />" /></td>
    </tr>
  </table>
</form>
<else:permedit>
  <table class="lista" width="100%" align="center">
  <tr>
    <td class="header" align="center"><tag:language.CATEGORY_SORT_INDEX /></td>
    <td class="header" align="center"><tag:language.CATEGORY_NAME /></td>
    <td class="header" align="center"><tag:language.CATEGORY_IMAGE /></td>
    <td class="header" align="center"><tag:language.PERMISSIONS /></td>
    <td class="header" align="center"><tag:language.EDIT /></td>
    <td class="header" align="center"><tag:language.DELETE /></td>
  </tr>
  <loop:categories>
  <tr>
    <td class="lista" align="center"><tag:categories[].sort_index /></td>
    <td class="lista" align="center"><tag:categories[].name /></td>
    <td class="lista" align="center"><tag:categories[].image /></td>
    <td class="lista" align="center"><tag:categories[].perm /></td>
    <td class="lista" align="center"><tag:categories[].edit /></td>
    <td class="lista" align="center"><tag:categories[].delete /></td>
  </tr>
  </loop:categories>
  <tr>
    <td class="header" align="center" colspan="6"><tag:category_add_new /></td>
  </tr>
  </table>
</if:permedit>
</if:perm>
</if:category_add>