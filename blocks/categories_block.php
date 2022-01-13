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

global $CURUSER;
if (!$CURUSER || $CURUSER["view_torrents"]=="no")
   {
    // do nothing
   }
else
    {
function catnumber($val="")
{
global $TABLE_PREFIX;
  print("<div id=catnumber style=\"width:100%;overflow:auto\" align=left><table class=\"lista\" cellpadding=\"2\" cellspacing=\"1\" style=\"width:100%;\" align=left>");

    $c_q = @do_sqlquery("SELECT * FROM {$TABLE_PREFIX}categories WHERE sub='0' ORDER BY sort_index ASC");
    while($c = mysqli_fetch_array($c_q))
    {
        $cid = $c["id"];
        $name = unesc($c["name"]);
        // lets see if it has sub-categories.
        $s_q = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}categories WHERE sub='$cid'");
        $s_t = mysqli_num_rows($s_q);
            $res=do_sqlquery("select count(*) as allincat FROM {$TABLE_PREFIX}files where category=".$cid);
            if ($res)
            {
            $row=mysqli_fetch_array($res);
            $totalall=$row["allincat"];
            }
            else
            $totalall=0;
        if($s_t == 0)
        {
        print("<tr><td class=lista align=left><a href='index.php?page=torrents&amp;category=$cid'><font style=\"font-size:11px;\">".$name."</font></a></td><td class=lista align=right><b>".$totalall."</b>&nbsp;</td></tr>");
        } else {
            print("<tr><td class=lista align=left colspan=2><font style=\"font-size:11px;\"><b>".$name." </b></font></td></tr>");
         // print("<tr><td class=lista align=left colspan=2><a href='torrents.php?category=$cid'><font style=\"font-size:11px;\">".$name." </font></a></td></tr>");
            while($s = mysqli_fetch_array($s_q))
            {
            $sub = $s["id"];
            $name  = unesc($s["name"]);
            $name2  = unesc($c["name"]);
                $res=do_sqlquery("select count(*) as allincat2 FROM {$TABLE_PREFIX}files where category=".$sub);
                if ($res)
                {
                $row=mysqli_fetch_array($res);
                $totalall2=$row["allincat2"];
                }
                else
                $totalall2=0;
            print("<tr><td class=lista align=left>&nbsp;&raquo;&nbsp;<a href='index.php?page=torrents&amp;category=$sub'><font style=\"font-size:11px;\">".$name."</font></a></td><td class=lista align=right><b>".$totalall2."</b>&nbsp;&nbsp;</td></tr>");
            }
               }
    }
    print("</table></div>");
}
catnumber( $category );

}
?>