<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
//    Referral System V1 - by DiemThuy nov 2012 
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
  if ($CURUSER["uid"] > 1)
    {
  if (!isset($CURUSER)) global $CURUSER ;
  
$type = $btit_settings["ref_switch"];
if  ($type == true)
{
$bonus = $btit_settings["ref_gb"];
$dt = " GB";
}
else
{
$bonus = $btit_settings["ref_sb"];
$dt= " Seedbonus points";
}
echo "<br><center><H1>Help us to make the site bigger , join our referral program</H1>";
echo "Send this referral link to a friend , if they join our site , you recieve a ".$bonus.$dt." bonus";
echo "<br><br><b>Your referral link = <font color = red >".$BASEURL."/index.php?page=signup&rid=".$CURUSER["uid"]."</font></b></center><br><br>";
echo "<br><center><b><font color = red >Your Referral List</font></b></center>";

?>
  <table class=lista width="570" align="center">
  <tr>
    <td class=header align=center width="320"><center>Username</center></td>
    <td class=header align=center width="150"><center>Joinded</center></td>
   </tr>
   
<?php

  $sql="SELECT * FROM {$TABLE_PREFIX}users WHERE referral = ".$CURUSER["uid"];
  $row = do_sqlquery($sql,true);
  
  if ($row)
  {
      while ($data=mysqli_fetch_array($row))

      {
        $rec=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users_level WHERE id=$data[id_level]" );
        $recc=mysqli_fetch_assoc($rec);
        $users=$recc["prefixcolor"] .$data["username"]. $recc["sufixcolor"];
    ?>

           <tr>
          <td class=lista align=center><b><center><?php echo $users ?></center></b></td>
          <td class=lista><b><center><?php echo $data['joined'] ?></b></center></td>
            </tr>
<?php

}
?>
</table>
<?php
echo "<br><center><b><font color = red >Your Totals</font></b></center>";
?>
  <table class=lista width="570" align="center">
  <tr>
    <td class=header align=center width="320"><center>Total Referrals</center></td>
    <td class=header align=center width="150"><center>Total Recieved Bonus</center></td>
   </tr>
<?php

$num = mysqli_num_rows($row);
$bon = $num * $bonus.$dt;
  
    ?>
           <tr>
          <td class=lista align=center><b><center><?php echo $num ?></center></b></td>
          <td class=lista><b><center><?php echo $bon ?></b></center></td>
          </tr>
</table> </br>
<?php
echo "<br><center><b><font color = red >Top 10 Overall</font></b></center>";
?>
  <table class=lista width="570" align="center">
  <tr>
    <td class=header align=center width="320"><center>Username</center></td>
    <td class=header align=center width="150"><center>Referrals</center></td>
   </tr>
<?php

  $sqll="SELECT id,referral,count( * ) AS Count FROM {$TABLE_PREFIX}users WHERE referral!='' GROUP BY referral ORDER by Count DESC limit 10";
  $roww = do_sqlquery($sqll,true);
  

         while ($dataa=mysqli_fetch_array($roww))

      {
        $rrrec=do_sqlquery("SELECT id_level,username FROM {$TABLE_PREFIX}users WHERE id=$dataa[referral]" );
        $rrrecc=mysqli_fetch_assoc($rrrec);
        $rrec=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users_level WHERE id=$rrrecc[id_level]" );
        $rrecc=mysqli_fetch_assoc($rrec);
        $naam=$rrecc["prefixcolor"] .$rrrecc["username"]. $rrecc["sufixcolor"];     

        $nummer =$dataa["Count"];
    ?>
           <tr>
          <td class=lista align=center><b><center><?php echo $naam ?></center></b></td>
          <td class=lista><b><center><?php echo $nummer ?></b></center></td>
          </tr>

<?php

}
echo"</table> </br><center><a href=mailto:><img src='images/refmail.png' alt='Mail your Friend' title='Mail your Friend' /></a></center> ";
}

}

else
    print("<div align=\"center\">\n
           <br />".$language["ERR_PERM_DENIED"]."</div>");
           
$module_out=ob_get_contents();
ob_end_clean();
?>