<div align="center">

<if:on_the_job_1>
  <if:can_upload_1>
    <if:filled_job_1>
      <a href="index.php?page=userdetails&id=<tag:filler_id />"<b><tag:filler_username /></b></a> <tag:language.FTJ />
      <table align="center" width="550" cellspacing="2" cellpadding="0">
    <else:filled_job_1>
      <a href="index.php?page=userdetails&id=<tag:job_id />"<tag:job_username /></a> <tag:language.OTJ />
      <table align="center" width="550" cellspacing="2" cellpadding="0">
    </if:filled_job_1>
  <else:can_upload_1>
      <table align="center" width="550" cellspacing="2" cellpadding="0">
  </if:can_upload_1>
<else:on_the_job_1>
  <if:can_upload_2>
    <a href="index.php?page=take2&id=<tag:id />"><img border="0" src="<tag:BASEURL />/images/take.gif"></a>
    <table align="center" width="550" cellspacing="2" cellpadding="0">
  <else:can_upload_2>
    <table align="center" width="550" cellspacing="2" cellpadding="0">
  </if:can_upload_2>
</if:on_the_job_1>

<br />
<tr>
  <td align="left" width="30%" class="header"><b><tag:language.TRAV_REQUEST />:</b></td>
  <td class="lista" width="70%" style="text-align:left;"><tag:request /><if:can_edit>&nbsp;&nbsp;&nbsp;<tag:editlink /><b>[<tag:language.TRAV_EDIT />]</b></a></if:can_edit></td>
</tr>

<if:has_descr>
  <tr>
    <td align="left" width="30%" class="header"><b><tag:language.TRAV_INFO />:</b></td>
    <td class="lista" width="70%" style="text-align:left;"><tag:descr /></td>
  </tr>
</if:has_descr>

<tr>
  <td align="left" width="30%" class="header"><b><tag:language.TRAV_ADDED />:</b></td>
  <td class="lista" width="70%" style="text-align:left;"><tag:req_added /></td>
</tr>

<tr>
  <td align="left" width="30%" class="header"><b><tag:language.TRAV_REQBY />:</b></td>
  <td class="lista" width="70%" style="text-align:left;"><a href="index.php?page=userdetails&id=<tag:req_id />"><b><tag:req_username /></b></td>
</tr>

<if:unfilled>
  <tr>
    <td align="left" width="30%" class="header"><b><tag:language.TRAV_VOTE_FT />:</b></td>
    <td class="lista" width="70%" style="text-align:left;"><a href="index.php?page=addrequest&id=<tag:id />"><b><tag:language.TRAV_VOTE /></b></a></td>
  </tr>

  <if:can_upload_3>
    <tr>
      <td align="left" width="30%" class="header"><b><tag:language.TRAV_HTFAR />:</b></td>
      <td class="lista" width="70%" style="text-align:left;"><tag:language.TRAV_HTFAR_1 /></td>
    </tr>

    <if:on_the_job_2>
      <if:my_job>
        <form method="get" action="index.php"><input type="hidden" name="page" value="reqfilled" />
          <tr>
            <td align="left" width="30%" class="header"><b><tag:language.INFO_HASH />:</b></td>
            <td class="lista" width="70%" style="text-align:left;"><tag:language.R_HASH_INFO /><br /><input type="text" size="20" maxlength="50" name="hash" /></td>
          </tr>
          <tr>
            <td class="lista" colspan="2" style="text-align:center;"><input type="text" size="40" maxlength="255" name="filledurl" value="<tag:language.TRAV_TDTUH />" onfocus="if (this.value==this.defaultValue) this.value='';" /><input type="submit" value="<tag:language.TRAV_SEND />" /></td>
          </tr>
      </if:my_job>
    </if:on_the_job_2>
    <input type="hidden" value="<tag:id />" name="requestid" />
    </form>

  </if:can_upload_3>
</if:unfilled>

<if:filled_job_2>
    <tr>
      <td align="left" width="30%" class="header"><b><tag:language.TRAV_FILLED />:</b></td>
      <td class="lista" width="70%" style="text-align:left;"><tag:language.RDT /> <tag:req_fulfilled /> <b><tag:language.RTT /> <a href="index.php?page=userdetails&id=<tag:filler_id />"><tag:filler_username /></a>!</b> <img border="0" src="<tag:BASEURL />/images/smilies/thumbsup.gif"> <a href="<tag:filled />"><tag:language.RFU /></a></td>
    </tr>
</if:filled_job_2>

</table>
</div>