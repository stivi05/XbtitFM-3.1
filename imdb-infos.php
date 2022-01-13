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

require_once(dirname(__FILE__)."/imdb/imdb.class.php");

$movieid=(int)$row["imdb"];

$imdbinfos = new imdb ($movieid);
$imdbinfos->photodir=dirname(__FILE__).'/imdb/images/';
$imdbinfos->photoroot=dirname(__FILE__).'/imdb/images/';
// Caching begins
$cache_parameters = array($movieid);
require_once('./imdb/inc/cache_begin.php');

// rating
$ratv = $imdbinfos->rating();
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

$torrenttpl->set("imdb_title",$imdbinfos->title());
$torrenttpl->set("imdb_year",$imdbinfos->year());


if (($photo_url = $imdbinfos->photo_localurl() ) != FALSE)
    $torrenttpl->set("imdb_photo",$photo_url);
else
    $torrenttpl->set("imdb_photo",'');
$torrenttpl->set("imdb_languages",implode(', ',$imdbinfos->languages()));
$torrenttpl->set("imdb_country",implode(', ',$imdbinfos->country()));
$torrenttpl->set("imdb_genre",implode(', ',$imdbinfos->genres()));
$torrenttpl->set("imdb_rating",$rat_img);
$torrenttpl->set("imdb_votes",$imdbinfos->votes());
$torrenttpl->set("imdb_tagline",$imdbinfos->tagline());
$torrenttpl->set("imdb_plotoutline",$imdbinfos->plotoutline());

$plots=$imdbinfos->plot();
$plots_line='<table>';
foreach ($plots as $plot) {
    $plots_line.='<tr><td>'.$plot."</td></tr>";
}    
$plots_line.='</table>';
$torrenttpl->set("imdb_plot",$plots_line);


$torrenttpl->set("imdb_taglines",implode(", ",$imdbinfos->taglines()));
$torrenttpl->set("imdb_runtime",$imdbinfos->runtime());

/*$aka=$imdbinfos->alsoknow();
$akalist='';
if (!empty($aka)) {
    $akalist = '<table>';
    foreach ( $aka as $ak){
      $akalist .= '<tr><td>'.$ak["title"];
      if (!empty($ak["year"])) $akalist .= " ".$ak["year"];
      $akalist .=  " =&gt; ".$ak["country"];
      if (empty($ak["lang"])) { if (!empty($ak["comment"])) $akalist .= " (".$ak["comment"].")"; }
      else {
        if (!empty($ak["comment"])) $akalist .= ", ".$ak["comment"];
        $akalist .= " [".$ak["lang"]."]";
      }
      $akalist .= "</td></tr>";
    }
    $akalist .= "</table>\n";
    
}
$torrenttpl->set("imdb_aka",implode(", ",$akalist));*/

$trailer=$imdbinfos->trailers();
$trailer_line='<table>';
foreach ($trailer as $trailers) {
    $trailer_line.='<tr><td><a href='.$trailers.' target="_blank" />'.$trailers."</a></td></tr>";
}    
$trailer_line.='</table>';
$torrenttpl->set("imdb_trailer",$trailer_line);

/*if ($imdbinfos->seasons()!=0)
    $torrenttpl->set("imdb_seasons",$imdbinfos->seasons());
else
    $torrenttpl->set("imdb_seasons",'');*/
        
//$imdbinfos->mpaa();
$torrenttpl->set("imdb_colors",implode(", ",$imdbinfos->colors()));
$torrenttpl->set("imdb_sound",implode(", ",$imdbinfos->sound()));

$directors=$imdbinfos->director();
$directors_line='<table>';
foreach ($directors as $director) {
    $directors_line.='<tr><td>'.$director["name"]."</td></tr>";
}    
$directors_line.='</table>';
$torrenttpl->set("imdb_director",$directors_line);

$writers=$imdbinfos->writing();
$writers_line='<table>';
foreach ($writers as $writer) {
    $writers_line.='<tr><td>'.$writer["name"]."&nbsp;&nbsp;</td><td>&nbsp;&nbsp;".$writer["role"]."</td></tr>";
}    
$writers_line.='</table>';
$torrenttpl->set("imdb_writer",$writers_line);

$producers=$imdbinfos->producer();
$producers_line='<table>';
foreach ($producers as $producer) {
    $producers_line.='<tr><td>'.$producer["name"]."&nbsp;&nbsp;</td><td>&nbsp;&nbsp;".$producer["role"]."</td></tr>";
}    
$producers_line.='</table>';
$torrenttpl->set("imdb_producer",$producers_line);

$casts=$imdbinfos->cast();
$cast_line='<table>';
foreach ($casts as $cast) {
    $cast_line.='<tr><td>'.$cast["name"]."&nbsp;&nbsp;</td><td>&nbsp;&nbsp;".$cast["role"]."</td></tr>";
}
$cast_line.='</table>';    
$torrenttpl->set("imdb_cast",$cast_line);

$composers=$imdbinfos->composer();
$composer_line='';
foreach ($composers as $composer) {
    $composer_line.="".$composer["name"]."";
}  
$composer_line.='';  
$torrenttpl->set("imdb_composer",$composer_line);

$torrenttpl->set("imdb_comment",$imdbinfos->comment());
//$torrenttpl->set("imdb_quotes",implode(", ",$imdbinfos->quotes()));
//$torrenttpl->set("imdb_crazycredits",implode(", ",$imdbinfos->crazy_credits()));

//$imdbinfos->goofs();

$trivias=$imdbinfos->trivia();
$trivias_line='<table>';
foreach ($trivias as $trivia) {
    $trivias_line.='<tr><td><p>'.$trivia."</p></td></tr>";
}    
$trivias_line.='</table>';
$torrenttpl->set("imdb_trivia",$trivias_line);

//$imdbinfos->soundtrack();


require_once('./imdb/inc/cache_end.php'); 
?>