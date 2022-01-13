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

if (!defined("IN_ACP"))
      die("non direct access!");


function image_combo($current_image="")
   {
      global $STYLEPATH, $language, $STYLEURL;

      $dir = @opendir("$STYLEPATH/images/categories/");
      $ret="\n<select name=\"image\" size=\"1\" onchange=\"update_cat(this.options[selectedIndex].value,'$STYLEURL/images/categories/spacer.gif');\">\n<option value=\"\">".$language["SELECT"]."</option>";
      while($file = @readdir($dir))
      {
        if( !@is_dir("$STYLEPATH/images/categories/" . $file) )
        {
          $img_size = @getimagesize("$STYLEPATH/images/categories/" . $file);
          // IT'S AN IMAGE ;)
          if( $img_size[0] && $img_size[1] )
          {
            $ret.="\n<option value=\"$file\" ".($current_image==$file?"selected=\"selected\"":"").">$file</option>";
          }
        }
      }
      @closedir($dir);
      $ret.="\n</select>";

      return $ret;
}


function category_read()
   {
   global $admintpl,$language,$STYLEURL,$CURUSER,$STYLEPATH;

     $admintpl->set("category_add",false,true);
     $admintpl->set("language",$language);
     $admintpl->set("perm",false,true);
     $admintpl->set("permedit",false,true);
     $cres=genrelist();
     for ($i=0;$i<count($cres);$i++)
       {
         $cres[$i]["name"]=unesc($cres[$i]["name"]);
         $cres[$i]["perm"]="<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=perm&amp;id=".$cres[$i]["id"]."\">".image_or_link("$STYLEPATH/images/edit.png","",$language["PERMISSIONS"])."</a>";
         $cres[$i]["image"]="<img src=\"$STYLEURL/images/categories/".$cres[$i]["image"]."\" alt=\"\" border=\"0\" />";
         $cres[$i]["edit"]="<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=edit&amp;id=".$cres[$i]["id"]."\">".image_or_link("$STYLEPATH/images/edit.png","",$language["EDIT"])."</a>";
         $cres[$i]["delete"]="<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=delete&amp;id=".$cres[$i]["id"]."\" onclick=\"return confirm('".AddSlashes($language["DELETE_CONFIRM"])."')\">".image_or_link("$STYLEPATH/images/delete.png","",$language["DELETE"])."</a>";


     }
     $admintpl->set("categories",$cres);
     $admintpl->set("category_add_new","<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=add\">".$language["CATEGORY_ADD"]."</a>");

     unset($cres);
          
}


switch ($action)
  {
   case 'save':
      if ($_POST["confirm"]==$language["FRM_CONFIRM"])
        {
        if ($_POST["category_name"]!="" && $_POST["sort_index"]!="")
          {
            if ($_GET["mode"]=='new')
              do_sqlquery("INSERT INTO {$TABLE_PREFIX}categories (name, sort_index, sub, image) VALUES (".sqlesc($_POST["category_name"]).",".max(0,$_POST["sort_index"]).",".max(0,$_POST["sub_category"]).",".sqlesc($_POST["image"]).")",true);
            else
              do_sqlquery("UPDATE {$TABLE_PREFIX}categories SET name=".sqlesc($_POST["category_name"]).",sort_index=".max(0,$_POST["sort_index"]).", sub=".max(0,$_POST["sub_category"]).", image=".sqlesc($_POST["image"])." WHERE id=".max(0,$_GET["id"]),true);
          }
        else
            stderr($language["ERROR"],$language["ALL_FIELDS_REQUIRED"]);
      }
      category_read();
      break;

    case 'add':
        $admintpl->set("category_add",true,true);
        $admintpl->set("language",$language);
        $admintpl->set("category_name","");
        $admintpl->set("frm_action","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=save&amp;mode=new");
        $admintpl->set("image_combo",image_combo());
        $admintpl->set("subcat_combo",sub_categories());
        $admintpl->set("category_sort","");
        $admintpl->set("category_image","$STYLEURL/images/categories/spacer.gif");
        $admintpl->set("image_url","$STYLEURL/images/categories/");
        break;

    case 'edit':
        if (isset($_GET["id"]))
          {
            // we should get only 1 style, selected with radio ...
            $id=max(0,$_GET["id"]);
            $cres=get_result("SELECT * FROM {$TABLE_PREFIX}categories WHERE id=$id",true);
            $admintpl->set("category_add",true,true);
            $admintpl->set("language",$language);
            $admintpl->set("category_name",$cres[0]["name"]);
            $admintpl->set("frm_action","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=save&amp;mode=edit&amp;id=$id");
            $admintpl->set("image_combo",image_combo($cres[0]["image"]));
            $admintpl->set("subcat_combo",sub_categories($cres[0]["sub"]));
            $admintpl->set("category_sort",$cres[0]["sort_index"]);
            $admintpl->set("category_image","$STYLEURL/images/categories/".$cres[0]["image"]);
            $admintpl->set("image_url","$STYLEURL/images/categories/");
          }
        break;

    
      case 'perm':
        if (isset($_GET["id"]))
          {
            $id=max(0,$_GET["id"]);
            $cres=do_sqlquery("SELECT COUNT(*) from {$TABLE_PREFIX}categories_perm WHERE catid=$id",true);
            $lres=do_sqlquery("SELECT COUNT(*) from {$TABLE_PREFIX}users_level",true);
            $crow=mysqli_fetch_row($cres);
            $lrow=mysqli_fetch_row($lres);
            if ($crow[0]<$lrow[0]) {
                do_sqlquery("DELETE FROM {$TABLE_PREFIX}categories_perm WHERE catid=$id",true);
                unset($lrow);
                mysqli_free_result($lres);
                $lres=do_sqlquery("SELECT * from {$TABLE_PREFIX}users_level",true);
                while ($lrow = mysqli_fetch_row($lres))
                    do_sqlquery("INSERT INTO {$TABLE_PREFIX}categories_perm SET catid='$id',levelid=$lrow[0],viewcat='no',viewtorrlist='no',viewtorrdet='no',downtorr='no'",true);
            }
            unset($lrow);
            mysqli_free_result($lres);
            unset($crow);
            mysqli_free_result($cres);
            $lres=do_sqlquery("SELECT * from {$TABLE_PREFIX}users_level ORDER BY id_level",true);
            $groups=array();
            $i=0;
            while ($level=mysqli_fetch_array($lres))
            {
                $cres=do_sqlquery("SELECT * from {$TABLE_PREFIX}categories_perm WHERE catid=$id AND levelid=".$level["id"]."",true);
                $crow=mysqli_fetch_array($cres);
                $groups[$i]["user"]="<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=permedit&amp;cid=".$crow["catid"]."&amp;lid=".$level["id"]."\">".unesc($level["prefixcolor"]).unesc($level["level"]).unesc($level["suffixcolor"])."</a>";
                $groups[$i]["viewcat"]=$crow["viewcat"];
                $groups[$i]["viewtorrlist"]=$crow["viewtorrlist"];
                $groups[$i]["viewtorrdet"]=$crow["viewtorrdet"];
                $groups[$i]["downtorr"]=$crow["downtorr"];
                $groups[$i]["ratio"]=$crow["ratio"];
                $i++;
            }
            unset($level);
            mysqli_free_result($lres);
            unset($crow);
            mysqli_free_result($cres);
            $admintpl->set("perm",true,true);
            $admintpl->set("category_add",false,true);
            $admintpl->set("language",$language);
            $admintpl->set("groups",$groups);
            $admintpl->set("back","<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=read\">".$language["BACK"]."</a>");
          }
        break;

       case 'permedit':
            $cid=max(0,$_GET["cid"]);
            $lid=max(0,$_GET["lid"]);
            $admintpl->set("frm_action","index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=category&amp;action=saveperm&amp;cid=$cid&amp;lid=$lid");
            $admintpl->set("language",$language);
            $rgroup=get_result("SELECT * FROM {$TABLE_PREFIX}categories_perm WHERE catid=$cid AND levelid=$lid",true);
            $current_group=$rgroup[0];
            unset($rgroup);
            $current_group["view_category"]=($current_group["viewcat"]=="yes"?"checked=\"checked\"":"");
            $current_group["view_torrlist"]=($current_group["viewtorrlist"]=="yes"?"checked=\"checked\"":"");
            $current_group["view_torrdet"]=($current_group["viewtorrdet"]=="yes"?"checked=\"checked\"":"");
            $current_group["down_torr"]=($current_group["downtorr"]=="yes"?"checked=\"checked\"":"");
            $current_group["ratio"]=unesc($current_group["ratio"]);
            $admintpl->set("group",$current_group);
            $admintpl->set("permedit",true,true);
            $admintpl->set("category_add",false,true);
            $admintpl->set("perm",false,true);
        break;

        case 'saveperm':
          if ($_POST["write"]==$language["FRM_CONFIRM"])
            {
                $cid=max(0,$_GET["cid"]);
                $lid=max(0,$_GET["lid"]);
                $update=array();
                $update[]="downtorr=".sqlesc(isset($_POST["downtorr"])?"yes":"no");
                $update[]="viewtorrdet=".sqlesc(isset($_POST["viewtorrdet"])?"yes":"no");
                $update[]="viewtorrlist=".sqlesc(isset($_POST["viewtorrlist"])?"yes":"no");
                $update[]="viewcat=".sqlesc(isset($_POST["viewcat"])?"yes":"no");
                $update[]="ratio=".sqlesc($_POST["ratio"]);
                $strupdate=implode(",",$update);
                do_sqlquery("UPDATE {$TABLE_PREFIX}categories_perm SET $strupdate WHERE catid=$cid AND levelid=$lid",true);
                unset($update);
                unset($strupdate);
            }
          redirect("index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=category&action=perm&id=$cid");
          case 'delete':
        if (isset($_GET["id"]))
          {
           // we should get only 1 style, selected with radio ...
           $id=max(0,$_GET["id"]);
           // delete style from database
           do_sqlquery("DELETE FROM {$TABLE_PREFIX}categories WHERE id=$id",true);
           do_sqlquery("DELETE FROM {$TABLE_PREFIX}categories_perm WHERE catid=$id",true);
           category_read();
          }
        break;

            
    case '':
    case 'read':
    default:
      category_read();
}

?>