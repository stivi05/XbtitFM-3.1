<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2020  xbtitFM Team
//
//    This file is part of xbtitFM.
//
//   Reputation system by DiemThuy ( Jan 2010 )
//   Rep Images by Friendly
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
if (!defined("IN_BTIT"))
      die("non direct access!");

$reputationpagetpl = new bTemplate();
$reputationpagetpl->set("language",$language);
require_once (load_language("lang_reputation.php"));
$id=$CURUSER["uid"];
$name=$CURUSER["prefixcolor"].$CURUSER["username"].$CURUSER["suffixcolor"];

  $sq=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users WHERE id=".$id);
  $dat=mysqli_fetch_array($sq);
  
  if ($dat["reputation"]==0)
  {
  $rep_user='no points yet';
  }
  elseif   ($dat["reputation"]>=1)
  {
   $rep_user='<b><font color=green>+'.$dat["reputation"].'</b></font>';
   }
  else
  {
   $rep_user='<b><font color=red>'.$dat["reputation"].'</b></font>';
   }
   
$reputationpagetpl->set("points",$rep_user);
$reputationpagetpl->set("user",$name);

  $sql=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}reputation_settings WHERE id=1");
  $data=mysqli_fetch_array($sql);
  
$reputationpagetpl->set("shout",$data["rep_kppower"]);
$reputationpagetpl->set("comment",$data["rep_undefined"]);
$reputationpagetpl->set("post",$data["rep_pcpower"]);
$reputationpagetpl->set("thanks",$data["rep_userrates"]);
$reputationpagetpl->set("upload",$data["rep_upload"]);
$reputationpagetpl->set("no_level",$data["no_level"]);
$reputationpagetpl->set("new",$data["rep_default"]);
$reputationpagetpl->set("good",$data["good_level"]);
$reputationpagetpl->set("best",$data["best_level"]);
$reputationpagetpl->set("bad",$data["bad_level"]);
$reputationpagetpl->set("worse",$data["worse_level"]);
$reputationpagetpl->set("admin",$data["rep_adminpower"]);
$reputationpagetpl->set("users",$data["rep_rdpower"]);
$reputationpagetpl->set("donate",$data["rep_minpost"]);
$reputationpagetpl->set("hit",$data["rep_minrep"]);


    $sqr=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users WHERE id > 1 and reputation > 1 ORDER BY ABS(reputation) DESC LIMIT 10");

    $log=array();
    $i=0;
    $sqrrr=do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users WHERE id > 1 and reputation <= 0 ORDER BY ABS(reputation) DESC LIMIT 10");
    $logg=array();
    $ii=0;
    if ($sqr AND $sqrrr)
    {
    while ($datr=mysqli_fetch_array($sqr) AND $datrr=mysqli_fetch_array($sqrrr))
    {
                      $r3 = do_sqlquery("SELECT id_level,prefixcolor,suffixcolor FROM {$TABLE_PREFIX}users_level WHERE id=$datr[id_level]") or die(mysqli_error($GLOBALS['conn']));
                      $a3 = mysqli_fetch_assoc($r3) ;
                      $r4 = do_sqlquery("SELECT id_level,prefixcolor,suffixcolor FROM {$TABLE_PREFIX}users_level WHERE id=$datrr[id_level]") or die(mysqli_error($GLOBALS['conn']));
                      $a4 = mysqli_fetch_assoc($r4) ;
                      
if  ($datrr['reputation'] ==0)
{
$rip='---';
$ripe='---';
}
else
{
$rip=($a4["prefixcolor"].$datrr['username'].$a4["suffixcolor"]);
$ripe=$datrr['reputation'];
}
                     
         
            $log[$i]["username"]=("<a href=index.php?page=userdetails&id=".$datr["id"].">".$a3["prefixcolor"].$datr['username'].$a3["suffixcolor"]."</a>");
            $log[$i]["reputation"]=$datr['reputation'];
            $log[$ii]["usernamew"]=("<a href=index.php?page=userdetails&id=".$datrr["id"].">".$rip."</a>");
            $log[$ii]["reputationw"]=$ripe;

            $i++;
            $ii++;

}
}
$reputationpagetpl->set("usershigh",$log);
?>