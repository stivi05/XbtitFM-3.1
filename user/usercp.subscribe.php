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


if (!defined("IN_BTIT"))
      die("non direct access!");


switch ($action)
{
    case 'post':
        $subscription="";
         if (isset($_POST["subs"]))
          {
          $_POST["subs"]=array_map(intval,$_POST["subs"]);
          $subscription=implode(",",$_POST["subs"]);
        }
        do_sqlquery("UPDATE {$TABLE_PREFIX}users SET subscription=".($subscription==""?"NULL":sqlesc($subscription))." WHERE id=".$CURUSER["uid"],true);
        redirect("index.php?page=usercp&do=subscribe&action=change&uid=".$CURUSER["uid"]);
        die();
     break;

    case '':
    case 'change':
    default:
        $cat=get_result("SELECT IF(sc.id IS NULL,c.id,sc.id) as id, CONCAT(c.name,IF(sc.name IS NOT NULL,CONCAT(' => ',sc.name),'')) as name FROM {$TABLE_PREFIX}categories c LEFT JOIN {$TABLE_PREFIX}categories sc on c.id=sc.sub where c.sub='0' ORDER BY c.sort_index, sc.sort_index, c.id, sc.id",true,$CACHE_DURATION);
        $sub=get_result("SELECT subscription FROM {$TABLE_PREFIX}users WHERE id=".$CURUSER["uid"]);
        $subscribe=explode(",",$sub[0]["subscription"]);
        $categories_sub="";
        if (count($sub)>0)
          {
            $categories_sub.="\n<table>\n<tr>";
            $i=0;
            foreach ($cat as $subs)
              {
              if ($i>0 && $i % 5 == 0)
                $categories_sub.="\n<tr>";
              $categories_sub.="\n<td align=\"center\">".$subs["name"]."<br />\n";
              if (is_array($subscribe) && in_array($subs["id"],$subscribe))
                 $categories_sub.="<input type=\"checkbox\" name=\"subs[]\" value=\"".$subs["id"]."\" checked=\"checked\" /></td>";
              else
                $categories_sub.="<input type=\"checkbox\" name=\"subs[]\" value=\"".$subs["id"]."\" /></td>";

              $i++;

              if ($i>0 && $i % 5 == 0)
                $categories_sub.="\n</tr>";

            }
            while ($i % 5 != 0)
              {
              $categories_sub.="\n<td>&nbsp;</td>";
              $i++;
            }
            $categories_sub.="\n</tr>\n</table>";
        }
        unset($cat);
        $usercptpl->set("sub_categories",$categories_sub);
        $usercptpl->set("frm_action","index.php?page=usercp&amp;do=subscribe&amp;action=post&amp;uid=".$CURUSER["uid"]);
    break;
}
?>