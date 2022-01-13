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
function thumb($filename,$x,$y=0)
{
$t=getimagesize($filename) or die('Illegal type');
$with=$t[0];
$height=$t[1];
switch ($t[2])
{
case 1:
$type='GIF';
$img=imagecreatefromgif($filename);
break;
case 2:
$type='JPEG';
$img=imagecreatefromjpeg($filename);
break;
case 3:
$type='PNG';
$img=imagecreatefrompng($filename);
break;
}
if($y==0)
{$y=$x*($height/$with);}

header("Content-type: image/jpeg");
$thumb=imagecreatetruecolor($x,$y);
ImageCopyResampled($thumb, $img, 0, 0, 0, 0,$x,$y,$with,$height);
$thumb=imagejpeg($thumb);
return $thumb;
}
$file=urldecode($_GET["path"]);
$size=(int)$_GET["size"];
if($file)
{
echo thumb($file,$size);
}
?>