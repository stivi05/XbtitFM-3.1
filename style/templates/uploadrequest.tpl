<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	color: #FF0000;
}
.style3 {font-size: 16px}
.style8 {font-weight: bold; }
-->
</style>

<form id=form1 name=form1 method=post action=index.php?page=uploadrequest2>
<table width=600 border=0 align=center cellpadding=0 cellspacing=0>
<tr>
<td width=530><div align=center><strong><span class=style1><tag:language.ATTENTION /></span><br />
<span class=style3><tag:language.Uploader_MSG /></span></strong></div></td>
</tr>
</table>
<br />
<table width=730 border=1 align=center cellpadding=3 cellspacing=0>
<tr>
<td><span class=style8><tag:language.QUESTION_1 /></span></td>
<td><strong><tag:language.UP_SPEED />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<select name=intern id=intern>
<option value=0 selected=selected>0 KB/s</option>
<option value=&lt;64KB/s>&lt; 64 KB/s</option>
<option value=64-128KB/s>64 - 128 KB/s</option>
<option value=128-256KB/s>128 - 256 KB/s</option>
<option value=256-512KB/s>256 - 512 KB/s</option>
<option value=512-1024KB/s>512 - 1024 KB/s</option>
<option value=1-2MB/s>1 - 2 MB/s</option>
<option value=2-5MB/s>2 - 5 MB/s</option>
<option value=5- 0MB/s>5 - 10 MB/s</option>
<option value=&gt;10MB/s>&gt; 10 MB/s</option>
</select>
<br />
<tag:language.DOWN_SPEED />&nbsp;
<select name=extern id=extern>
<option value=0 selected=selected>0 KB/s</option>
<option value=&lt;64KB/s>&lt;64 KB/s</option>
<option value=64-128KB/s>64 - 128 KB/s</option>
<option value=128-256KB/s>128 - 256 KB/s</option>
<option value=256-512KB/s>256 - 512 KB/s</option>
<option value=512-1024KB/s>512 - 1024 KB/s</option>
<option value=1-2MB/s>1 - 2 MB/s</option>
<option value=2-5MB/s>2 - 5 MB/s</option>
<option value=5-10MB/s>5 - 10 MB/s</option>
<option value=&gt;10MB/s>&gt; 10 MB/s</option>
</select>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_2 /></span></td>
<td><strong>
<label>
<textarea name=intentioneaza cols=40 rows=4 id=intentioneaza></textarea>
</label>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_3 /></span></td>
<td><strong>
<textarea name=sursa cols=40 rows=4 id=sursa></textarea>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_4 /></span></td>
<td><strong>
<textarea name=altsite cols=40 rows=4 id=altsite></textarea>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_5 /></span></td>
<td>
<strong>
<select name=facetorrent>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No ><tag:language.UPLOADER_NO /></option>
</select>
</strong> </td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_6 /></span></td>
<td><strong>
<select name=facerar id=facerar>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No ><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_7 /></span></td> 
<td><strong>
<select name=facesfv id=facesfv>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_8 /></span></td>
<td><strong>
<select name=facenfo id=facenfo>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>

<tr>
<td><span class=style8><tag:language.QUESTION_9 /></span></td>
<td><strong>
<select name=scerip id=scerip>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>

<tr>
<td><span class=style8><tag:language.QUESTION_10 /></span></td>
<td><strong>
<textarea name=motiv cols=40 rows=4 id=motiv></textarea>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_11 /></span></td>
<td><strong>
<textarea name=stisite cols=40 rows=4 id=stisite></textarea>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_12 /></span></td>
<td><strong>
<select name=regulament id=regulament>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>
<tr>
<td><span class=style8><tag:language.QUESTION_13 /></span></td>
<td><strong>
<select name=oday id=oday>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>

<tr>
<td><span class=style8><tag:language.QUESTION_14 /></span></td>
<td><strong>
<select name=seet id=seet>
<option value=Yes selected=selected><tag:language.UPLOADER_YES /></option>
<option value=No><tag:language.UPLOADER_NO /></option>
</select>
</strong></td>
</tr>

</table>
<p>
<label>
<div align=center>
<input name=Submit type=submit id=Submit value=Submit />
</div>
</label>
</p>
</form>
