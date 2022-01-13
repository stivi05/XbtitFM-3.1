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
require ("include/functions.php");
require ("imdb/imdb.class.php");
dbconn(false);
global $BASEURL;
$THIS_BASEPATH=dirname(__FILE__);

$LANGPATH=$THIS_BASEPATH."/language/english";
require_once($LANGPATH."/lang_main.php");

$movie = new imdb ($_GET["mid"]);

if (isset ($_GET["mid"])) {

  $movieid = $_GET["mid"];
  $movie->setid ($movieid);
  $movie->photodir='./imdb/images/';
  $movie->photoroot='./imdb/images/';
  $rows = 2;
// Caching begins
$cache_parameters = array($movieid);
require_once('./imdb/inc/cache_begin.php');
// count for the rowspan; init with photo + year
//get current style
  $resheet=get_result("SELECT(SELECT `style_url` FROM `{$TABLE_PREFIX}style` WHERE `id`=".$CURUSER["style"].") `style_url`, (SELECT `language_url` FROM `{$TABLE_PREFIX}language` WHERE `id`=".$CURUSER["language"].") `language_url`",true,$btit_settings["cache_duration"]);
if (!$resheet)
   {

   $STYLEPATH="$THIS_BASEPATH/style/xbtitFM";
   $STYLEURL="$BASEURL/style/xbtitFM";
}
else
    {
        $resstyle=$resheet[0];
        $STYLEPATH="$THIS_BASEPATH/".$resstyle["style_url"];
        $STYLEURL="$BASEURL/".$resstyle["style_url"];
        $LANGPATH2=$THIS_BASEPATH."/".$resstyle["language_url"];
}

if($LANGPATH!=$LANGPATH2)
{
    require_once($LANGPATH2."/lang_main.php");
}

$style_css=load_css("main.css");//end style
  echo "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>\n";
  echo "<HTML><HEAD>\n <TITLE>".$movie->title().' ('.$movie->year().")</TITLE>\n";
?>
<link rel="stylesheet" type="text/css" href="<?php echo $STYLEURL; ?>/main.css" />
<script type="text/javascript" src="<?php echo $BASEURL;?>/imdb/moo.js"></script>
<script type="text/javascript" src="<?php echo $BASEURL;?>/imdb/moostarrating.js"></script>

<style>
#poster img {

max-width: 250px;

height: auto !important;

width: expression(this.width > 250 ? 250: true);

}
form {
    margin: 10px 0; }

form label, form span {
    font-size: 12px;
    color: #999999;
    position: relative;
    top: -3px;
    display: inline-block;
    font-weight: bold;
    font-family: sans-serif; }

form label {
    text-align: right;
    width: 120px;
    padding-right: 3px;
    color: #666666; }
</style>
<?php
  echo "</HEAD>\n<BODY class=\"listaimdb\" style=\"margin: 0px; 0px 0px 0px;\">\n<TABLE border='0'  ALIGN='center' STYLE='border-collapse:collapse' width=100% class=\"lista\">";

  # Title & year
  echo '<TR><TD COLSPAN="3" class="header"><b>';
  echo $movie->title().' ('.$movie->year().")</b></TD></tr>\n";
  flush();


  # Photo
  echo '<TR><TD class="header" rowspan="29" valign="top" id="poster">';
  if (($photo_url = $movie->photo_localurl() ) != FALSE) {
    echo '<img src="'.$photo_url.'" alt="Cover">';
  } else {
    echo $language["IMDB_NO_PHOTO"];
  }

clearstatcache();

# Languages
  $languages = $movie->languages();
  if (!empty($languages)) {
    ++$rows;
    echo '<TD class=lista><B>'.$language["IMDB_LANGUAGES"].':</B></TD><TD class=lista>';
    for ($i = 0; $i + 1 < count($languages); $i++) {
      echo $languages[$i].', ';
    }
    echo $languages[$i]."</TD></TR>\n";

  }
  flush();

  # Country
  $country = $movie->country();
  if (!empty($country)) {
    ++$rows;
    echo '<TR><TD class=lista><B>'.$language["COUNTRY"].':</B></TD><TD class=lista>';
    for ($i = 0; $i + 1 < count($country); $i++) {
      echo $country[$i].', ';
    }
    echo $country[$i]."</TD></TR>\n";

  }

  # Genres
  $genre = $movie->genres();
    if (!empty($genre)) {
	++$rows;
	$imdb.= "<TR><TD class=lista><B>".$language["IMDB_GENRE"].":</B></TD><TD class=lista>";
	for ($i = 0; $i < 1; $i++) {
	$imdb.= "".$genre[$i].", ";
	}
	$imdb.= "".$genre[$i]."<br />\n";
	echo $imdb."</TD></TR>\n";
  }

# Ratings and votes

$ratv = $movie->rating();


  if($ratv<=0.4)
      $rat_img="00";
  elseif($ratv>=0.5 && $ratv<=0.9)
      $rat_img="0.5";
  elseif($ratv>=1 && $ratv<=1.4)
      $rat_img="1.0";
  elseif($ratv>=1.5 && $ratv<=1.9)
      $rat_img="1.5";
  elseif($ratv>=2 && $ratv<=2.4)
      $rat_img="2.0";
  elseif($ratv>=2.5 && $ratv<=2.9)
      $rat_img="2.5";
  elseif($ratv>=3 && $ratv<=3.4)
      $rat_img="3.0";
  elseif($ratv>=3.5 && $ratv<=3.9)
      $rat_img="3.5";
  elseif($ratv>=4 && $ratv<=4.4)
      $rat_img="4.0";
  elseif($ratv>=4.5 && $ratv<=4.9)
      $rat_img="4.5";
  elseif($ratv>=5 && $ratv<=5.4)
      $rat_img="5.0";
  elseif($ratv>=5.5 && $ratv<=5.9)
      $rat_img="5.5";
  elseif($ratv>=6 && $ratv<=6.4)
      $rat_img="6.0";
  elseif($ratv>=6.5 && $ratv<=6.9)
      $rat_img="6.5";
  elseif($ratv>=7 && $ratv<=7.4)
      $rat_img="7.0";
  elseif($ratv>=7.5 && $ratv<=7.9)
      $rat_img="7.5";
  elseif($ratv>=8 && $ratv<=8.4)
      $rat_img="8.0";
  elseif($ratv>=8.5 && $ratv<=8.9)
      $rat_img="8.5";
  elseif($ratv>=9 && $ratv<=9.4)
      $rat_img="9.0";
  elseif($ratv>=9.5 && $ratv<=9.9)
      $rat_img="9.5";
  elseif($ratv==10)
      $rat_img="10.0";

echo ('
    <script type="text/javascript">
// Default images folder definition. You will use your own.
MooStarRatingImages.defaultImageFolder =
    \''.$BASEURL.'/imdb/imgs\';
    // Advanced options
var advancedRating = new MooStarRating({
    form: \'advanced\',
    radios: \'my_rating\',                // Radios name
    half: true,                         // That means one star for two values!
    disabled: true,
    imageEmpty: \'star_boxed_empty.png\', // Different image
    imageFull:  \'star_boxed_full.png\',  // Different image
    imageHover: \'star_boxed_hover.png\', // Different image
    width: 17                         // One pixel bigger
});
    </script>
');

  if (!empty($ratv)) { echo '<TR><TD class=\'lista\'><B>'.$language["IMDB_RATING"].':</b></TD><TD class=\'lista\'>
   <!-- Twelve radios, rating from 0.5 to 10.0 -->
<form name="advanced">
    <input type="radio" name="my_rating" value="0.5" '.($rat_img=='0.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="1.0" '.($rat_img=='1.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="1.5" '.($rat_img=='1.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="2.0" '.($rat_img=='2.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="2.5" '.($rat_img=='2.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="3.0" '.($rat_img=='3.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="3.5" '.($rat_img=='3.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="4.0" '.($rat_img=='4.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="4.5" '.($rat_img=='4.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="5.0" '.($rat_img=='5.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="5.5" '.($rat_img=='5.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="6.0" '.($rat_img=='6.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="6.5" '.($rat_img=='6.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="7.0" '.($rat_img=='7.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="7.5" '.($rat_img=='7.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="8.0" '.($rat_img=='8.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="8.5" '.($rat_img=='8.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="9.0" '.($rat_img=='9.0'?"checked":"").'>
    <input type="radio" name="my_rating" value="9.5" '.($rat_img=='9.5'?"checked":"").'>
    <input type="radio" name="my_rating" value="10.0" '.($rat_img=='10.0'?"checked":"").'>
    <span id="htmlTip">'.$rat_img.'/10</span></TD></TR>'; ++$rows; }

  $ratv = $movie->votes();
  if (!empty($ratv)) { echo "<TR><TD class=lista><B>".$language["IMDB_VOTES"].":</B></TD><TD class=lista>$ratv</TD></TR>\n"; ++$rows; }
  flush();

  $tagline = $movie->tagline();
  if (!empty($tagline)) {
    ++$rows;
    echo "<TR><TD valign='top' class=lista><B>".$language["IMDB_TAGLINE"].":</B></TD><TD class=lista>$tagline</TD></TR>\n";
  }
  # Plot outline & plot
  $plotoutline = $movie->plotoutline();
  if (!empty($plotoutline)) {
    ++$rows;
    echo "<tr><td valign='top' class=lista><b>".$language["IMDB_PLOT_OUTLINE"].":</b></td><td
class=lista>".$plotoutline."</td></tr>\n";

  }

  $plot = $movie->plot();
  if (!empty($plot)) {
    ++$rows;
    echo '<tr><td valign=top class=lista><b>'.$language["IMDB_PLOT"].':</b></td><td class=lista>';
    for ($i = 0; $i < count($plot); $i++) {
      echo "".$plot[$i]."\n";
    }
    echo "</td></tr>\n";
  }
  flush();

  # Taglines
  $taglines = $movie->taglines();
  if (!empty($taglines)) {
    ++$rows;
    echo '<tr><td valign=top class=lista><b>'.$language["IMDB_TAGLINES"].':</b></td><td class=lista><ul>';
    for ($i = 0; $i < count($taglines); $i++) {
      echo "<li>".$taglines[$i]."</li>\n";
    }
    echo "</ul></td></tr>\n";
  }

# Year & runtime
  $year=$movie->year();
  echo '<TR><TD class=lista><B>'.$language["IMDB_YEAR"].':</B></TD><TD class=lista>'.$year.'</TD></TR>';


  if (!empty($runtime)) {
    ++$rows;
  echo "<TR><TD valign=top class=lista><B>".$language["IMDB_RUNTIME"].":</b></TD><TD class=lista>".$runtime." ".$language["IMDB_MINUTES"]."</TD></TR>\n";
}
  flush();

  # Trailer
  $trailers = $movie->trailers(TRUE);
  if (!empty($trailers)) {
    ++$rows;
    echo '<tr><td valign=top class="lista"><b>Trailers:</b></td><td class="lista">';
    for ($i=0;$i<count($trailers);++$i) {
      if (!empty($trailers[$i]['url'])) echo "<a href='".$trailers[$i]['url']."' target='_blank'>".str_replace(array("viconst=\"","\""),array("",""),$trailers[$i]['title'])."</a><br>\n";

         }

    echo "</td></tr>\n";
  }


  echo "</TABLE><BR>\n";



  echo "</BODY></HTML>";



require_once('./imdb/inc/cache_end.php');
}
?>