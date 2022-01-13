 <?php
require_once("include/functions.php");
dbconn();
global $btit_settings, $language;

require_once("btemplate/bTemplate.php");
$categories_centertpl = new bTemplate();
echo $categories_centertpl->fetch(load_template("categories_center.tpl"));
?>