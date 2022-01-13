<?php
require_once("include/functions.php");
dbconn();
global $btit_settings, $language;

require_once("btemplate/bTemplate.php");
require(load_language("lang_categories.php"));
$categories_centertpl = new bTemplate();
$categories_centertpl->set("language", $language);
echo $categories_centertpl->fetch(load_template("categories_center.tpl"));
?>