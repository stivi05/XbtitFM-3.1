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


      global $STYLEPATH, $language, $STYLEURL;

$category = (!isset($_GET["category"])?0:explode(";",$_GET["category"]));
// sanitize categories id
if (is_array($category))
    $category = array_map("intval",$category);
else
    $category = 0;

$combo_categories=admin_categories( $category[0] );

$id = AddSlashes((isset($_GET["id"])?$_GET["id"]:false));
$uid = $CURUSER["uid"];
$random = $CURUSER["random"];
// delete a genre

if ($_GET["action"] == 'delete') {

$gid = AddSlashes((isset($_GET["gid"])?$_GET["gid"]:false));

do_sqlquery("DELETE FROM `{$TABLE_PREFIX}genres` WHERE id=$gid ",true);

redirect("index.php?page=admin&user=$uid&code=$random&do=genres");

}

//end delete a genre

// delete all genres in cat

if ($_GET["action"] == 'deleteall') {

$id = AddSlashes((isset($_GET["id"])?$_GET["id"]:false));

do_sqlquery("DELETE FROM `{$TABLE_PREFIX}genres` WHERE cat_id = $id",true);

}

// end delete all genres in cat

// build genres

$admintpl=new bTemplate();
$admintpl->set("language",$language);
$admintpl->set("default",false,true);
$admintpl->set("add_new",false,true);
$admintpl->set("delete",image_or_link("images/delete.png","","delete"));
$admintpl->set("catsselect",$combo_categories);

if(isset($_GET["id"])) {
$res = do_sqlquery("SELECT name, id FROM {$TABLE_PREFIX}categories WHERE id = $id ",true);
$row = mysqli_fetch_array($res);

$catsname = $row["name"];
$catsid = $row["id"];
$admintpl->set("catsname",$catsname);
$admintpl->set("catsid",$catsid);
$gen = do_sqlquery("SELECT id, name FROM `{$TABLE_PREFIX}genres` WHERE cat_id = $id ORDER BY id ASC",true);

$i=0;
$genres = array();
while ($data = mysqli_fetch_array($gen)) {
$genres[$i]["name"] = $data["name"];
$genres[$i]["id"] = $data["id"];
$i++;
}
$admintpl->set("cat",$genres);
$admintpl->set("default",true,true);
}

$admintpl->set("user",$uid);
$admintpl->set("random",$random);

// end build genres

// add new genre

if ($_GET["action"] == 'add') {
$id = AddSlashes((isset($_GET["id"])?$_GET["id"]:false));
$name = htmlspecialchars(AddSlashes(unesc($_GET["name"])));
$admintpl->set("id",$id);
$admintpl->set("CAT_GEN","New ".$name." Genre");
$admintpl->set("default",false,true);
$admintpl->set("add_new",true,true);

}

if (isset($_POST["addnew"])) {

$cat_id = AddSlashes((isset($_POST["cat_id"])?$_POST["cat_id"]:false));
$name = htmlspecialchars(AddSlashes(unesc($_POST["newgenre"])));

do_sqlquery("INSERT INTO `{$TABLE_PREFIX}genres` (cat_id, name) VALUES ('$cat_id', '$name')",true);

redirect("index.php?page=admin&user=$uid&code=$random&do=genres&id=$cat_id");

}
// end new genre

// new genre list in cat

if (isset($_POST["newlist"])) {

$id = AddSlashes((isset($_GET["id"])?$_GET["id"]:false));

do_sqlquery("DELETE FROM {$TABLE_PREFIX}genres WHERE cat_id = $id",true);

array_pop($_POST);

foreach($_POST as $key=>$value) {

do_sqlquery("INSERT INTO `{$TABLE_PREFIX}genres` (id, cat_id, name) VALUES ('$key', '$id', '$value')",true);

}

redirect("index.php?page=admin&user=$uid&code=$random&do=genres&id=$id");
}

// end new genre list in cat
?>