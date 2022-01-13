<style type="text/css">
#catlist,
#genlist {
	float:left;
}
</style>
<div id="catlist" width="100">
<table align="center" width="100">
	<tr>
		<td class="header"><tag:language.SELECT_CAT /></td>
	</tr>
</table>
<tag:catsselect />
</div>
<if:default>
<div id="genlist" width="600">
<form action="" method="post" name="<tag:catname />">
<table align="center" width="400" cellspacing="1" cellpadding="0" border="1">
	<tr>
	<td class="header" colspan="3" align="center"><tag:catsname /><tag:language.GENRE_LIST /></td>
	</tr>
<loop:cat>
	<tr>	
	<td class="header"><tag:language.GENRE /></td><td class="lista"><input type="text" name="<tag:cat[].id />" value="<tag:cat[].name />" /></td><td class="lista"><a href="index.php?page=admin&user=<tag:user />&code=<tag:random />&do=genres&action=delete&gid=<tag:cat[].id />"><tag:delete /></a></td>
	</tr>
</loop:cat>
	<tr>
	<td class="header"><tag:language.ADD_NEW /></td><td class="lista"><a href="index.php?page=admin&user=<tag:user />&code=<tag:random />&do=genres&action=add&id=<tag:catsid />&name=<tag:catsname />"><tag:language.ADD /></a></td><td class="lista"><a href="index.php?page=admin&user=<tag:user />&code=<tag:random />&do=genres&action=deleteall&id=<tag:catsid />"><tag:language.DELETE_ALL /></a></td>
	<tr>

	<td class="header"></td><td align="center" class="lista"><input type="submit" name="newlist" value="<tag:language.CONFIRM />"></td><td class="lista"></td>
	</tr>
</table>
</form>
</div>
</if:default>
<if:add_new>
<form action="" method="post" name="newgenre">
<input type="hidden" name="cat_id" size="50" value="<tag:id />" />
<table align="center" width="400">
	<tr>
	<td class="header" colspan="2" align="center"><tag:CAT_GEN /></td>
	<tr>
	<td class="header"><tag:language.ADD_NEW /></td><td class="lista"><input type="text" name="newgenre"></td>
	</tr>
	<tr>
	<td class="header"></td><td align="center" class="lista"><input type="submit" name="addnew" value="<tag:language.CONFIRM />"></td>
	</tr>
</table>
</form>
</if:add_new>