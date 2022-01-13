<br><center><H1><font color = red ><tag:language.RSE /></font></H1></center>
<center><tag:language.RSE1 /> <br><br><img style="border:6px double #545565;"  src='images/rep/plusmin.png'></center>

<br><br><center><b><tag:language.HOWGET /></b></center>


  <table class=lista width="60%" align="center">
  <tr>
    <td class=header align=center width="40%"><tag:language.HOW /></td>
    <td class=header align=center width="20%"><tag:language.POINTS /></td>
   </tr>
      <tr>
   <td class=lista align=center width="40%"><tag:language.NEWSTART /></center></td>
    <td class=lista align=center width="20%"><tag:new /></td>
  </tr>
   <tr>
   <td class=lista align=center width="40%"><tag:language.MAKESHOUT /></td>
    <td class=lista align=center width="20%"><tag:shout /></td>
  </tr>
     <tr>
    <td class=lista align=center width="40%"><tag:language.MAKETORCOMMENT /></td>
    <td class=lista align=center width="20%"><tag:comment /></td>
  </tr>
    <tr>
   <td class=lista align=center width="40%"><tag:language.MAKEFORUMPOST /></td>
    <td class=lista align=center width="20%"><tag:post /></td>
  </tr>
    <tr>
   
    <td class=lista align=center width="40%"><tag:language.THANKSTOR /></td>
    <td class=lista align=center width="20%"><tag:thanks /></td>
  </tr>
<tr>
   <td class=lista align=center width="40%"><tag:language.UPLOADTOR /></td>
    <td class=lista align=center width="20%"><tag:upload /></td>
  </tr>

    </tr>
    <tr>
   <td class=lista align=center width="40%"><tag:language.HITNRUN /></td>
    <td class=lista align=center width="20%">-<tag:hit /></td>
  </tr>

     <tr>
   <td class=lista align=center width="40%"><tag:language.STAFFTAKE /></td>
    <td class=lista align=center width="20%"><tag:admin /></td>
  </tr>
    <tr>
   <td class=lista align=center width="40%"><tag:language.USERTAKE /></td>
    <td class=lista align=center width="20%"><tag:users /></td>
  </tr>
</table>
<br><center><b><tag:language.REPLEVELS /></b></center>

  <table class=lista width="60%" align="center">
    <tr>
    <td class=header align=center width="40%"><tag:language.REPLEVEL /></td>
    <td class=header align=center width="20%"><tag:language.POINTS /></td>
   </tr>
   
      <tr>
   <td class=lista align=left width="40%"><img src='images/rep/reputation_balance.gif'>&nbsp;&nbsp;<tag:no_level /></td>
    <td class=lista align=left width="20%"><tag:language.POINTS1 /></td>
  </tr>
        <tr>
   <td class=lista align=left width="40%"><img src='images/rep/reputation_pos.gif'>&nbsp;&nbsp;<tag:good /></td>
    <td class=lista align=left width="20%"><tag:language.POINTS2 /></td>
  </tr>
          <tr>
   <td class=lista align=left width="40%"><img src='images/rep/reputation_highpos.gif'>&nbsp;&nbsp;<tag:best /></td>
    <td class=lista align=left width="20%"><tag:language.POINTS3 /></td>
  </tr>
            <tr>
   <td class=lista align=left width="40%"><img src='images/rep/reputation_neg.gif'>&nbsp;&nbsp;<tag:bad /></td>
    <td class=lista align=left width="20%"><tag:language.POINTS4 /></td>
  </tr>
            <tr>
   <td class=lista align=left width="40%"><img src='images/rep/reputation_highneg.gif'>&nbsp;&nbsp;<tag:worse /></td>
    <td class=lista align=left width="20%"><tag:language.POINTS5 /></td>
  </tr>
  </table>

<br><center><b><font color = steelblue ><tag:language.YOU />&nbsp;-&nbsp;&nbsp;<tag:user />&nbsp;&nbsp;-&nbsp;&nbsp;<tag:language.COLLECTED />&nbsp;&nbsp;<tag:points /><font color = steelblue >&nbsp;&nbsp;<tag:language.REPSOFAR /></font><b></center><br>

<center><table class="header" width="60%" align="center"> <tr>
<center><td class="header"  width="30%" align="center"><b><tag:language.BESTUSER /></b></td></center>
<center><td class="header"  width="30%" align="center"><b><tag:language.WORSEUSER /></b></td></center>
</tr></table>
<table width="60%" align="center">
<tr>
<td class="header" width="15%"><b><tag:language.USERNAME /></b></td>
    <td class="header" width="15%"><b><tag:language.POINTS /></b></td>
    <td class="header" width="15%"><b><tag:language.USERNAME /></b></td>
    <td class="header" width="15%"><b><tag:language.POINTS /></b></td>
</tr>
  <loop:usershigh>
<tr>
    <td class="lista"><tag:usershigh[].username /></td>
    <td class="lista"><tag:usershigh[].reputation /></td>
    <td class="lista"><tag:usershigh[].usernamew /></td>
    <td class="lista"><tag:usershigh[].reputationw /></td>
</tr>
  </loop:usershigh>
</center></table>
