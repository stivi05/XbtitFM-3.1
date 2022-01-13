<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
// Redistribution and use in source and binary forms, with or without modification,
// are permitted provided that the following conditions are met:
//
//   1. Redistributions of source code must retain the above copyright notice,
//      this list of conditions and the following disclaimer.
//   2. Redistributions in binary form must reproduce the above copyright notice,
//      this list of conditions and the following disclaimer in the documentation
//      and/or other materials provided with the distribution.
//   3. The name of the author may not be used to endorse or promote products
//      derived from this software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED
// WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
// MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
// IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
// TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
// PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
// LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
// EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//
////////////////////////////////////////////////////////////////////////////////////
ob_start();
$action=isset($_GET["action"])?htmlentities($_GET["action"]):$action='';
$user=isset($_GET["user"]) && is_numeric($_GET["user"])?intval(0+$_GET["user"]):$user=0;
if($CURUSER["delete_users"]!="yes")
die();
switch($action)
{
case 'all':
information_msg("Hold on","Are you sure you want to empty all hit n runs? <a href='index.php?page=modules&amp;module=hitnrun_cleaner&amp;action=all_yes'>Yes</a>&nbsp;<a href='javascript:history.back();'>No</a>");
break;
case 'user_all':
if($user>0)
{
do_sqlquery("UPDATE `xbt_files_users` SET `hit`='no', `hitchecked`=-1 WHERE `uid`=".$user.";",true);
do_sqlquery("UPDATE `{$TABLE_PREFIX}history` SET `hit`='no', `hitchecked`=-1 WHERE `uid`=".$user.";",true);
do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `warn_lev`=0, `warn_last`=0, `hnr_count`=0, `booted`='no', `whybooted`='', `addbooted`='0000-00-00 00:00:00', `whobooted`='' WHERE `id`=".$user.";",true);
do_sqlquery("UPDATE `xbt_users` SET `can_announce`=1, `can_leech`=1 WHERE `uid`=".$user.";",true);
do_sqlquery("DELETE FROM `{$TABLE_PREFIX}warn_logs` WHERE `uid`=".$user.";", true);
success_msg("Done","The user should have none now!");
header("refresh:6;url=index.php?page=modules&module=hitnrun_cleaner");
exit;
}
break;
case 'all_yes':
do_sqlquery("UPDATE `xbt_files_users` SET `hit`='no', `hitchecked`=-1 WHERE `uid`>1;",true);
do_sqlquery("UPDATE `{$TABLE_PREFIX}history` SET `hit`='no', `hitchecked`=-1 WHERE `uid`>1;",true);
do_sqlquery("UPDATE `{$TABLE_PREFIX}users` SET `warn_lev`=0, `warn_last`=0, `hnr_count`=0, `booted`='no', `whybooted`='', `addbooted`='0000-00-00 00:00:00', `whobooted`='' WHERE `id`>1;",true);
do_sqlquery("UPDATE `xbt_users` SET `can_announce`=1, `can_leech`=1 WHERE `uid`>1;",true);
do_sqlquery("TRUNCATE TABLE `{$TABLE_PREFIX}warn_logs`;", true);
success_msg("Done","All hit n runs cleared! :O");
header("refresh:6;url=index.php?page=modules&module=hitnrun_cleaner");
exit;
break;
case '':
default;
?>
<script type="text/javascript">
var UID=jQuery.noConflict();
UID(document).ready(function(){
    UID("#uid_check").keyup(function(){
		var value = this.value;
		 UID("#uload").empty().html('<img src="./modules/hitnrun_cleaner/loader.gif" />');
        UID("#uload").load("./modules/hitnrun_cleaner/uload.php?user="+value);
    });

})
</script>
<?php

echo'
<form method="get" action="index.php">
<input type="hidden" name="page" value="modules">
<input type="hidden" name="module" value="hitnrun_cleaner">
<input type="hidden" name="action" value="user_all">
<table width="50%" align="center" cellpadding="0" cellspacing="0" border="0">
<td class="header" colspan="2">Delete a Users Hit n Runs</td>
</tr>
<td class="header">Userid:</td><td class="lista"><input id="uid_check" type="text" size="10" name="user">&nbsp;&nbsp;&nbsp;&nbsp;<span id="uload"></span></td>
</tr>
<tr>
<td class="header" colspan="2"><input type="submit" value="GO"></td>
</tr>
</table>
</form><br />
<table width="50%" align="center" cellpadding="0" cellspacing="0" border="0">
<td class="header">Delete all Hit n Runs</td>
</tr>
<td class="lista" style="text-align:center;"><a href="index.php?page=modules&amp;module=hitnrun_cleaner&amp;action=all"><button>GO</button></a></td>
</tr>
</table>
<br />';
break;
}
$module_out=ob_get_contents();
ob_end_clean();
?>