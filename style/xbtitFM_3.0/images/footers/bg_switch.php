<?php
$dh = opendir(".");
while (false !== ($file = readdir($dh)))
{
  if (preg_match('/\.gif$|\.png$|\.jpg|\.jpeg$/i', $file) and $file != ".")
  {
     $filelist[] = $file;
  }
}

srand((double)microtime()*1000000);
$pic = rand(0, sizeof($filelist) - 1);

header("Location: " . $filelist[$pic]);

closedir($dh);
?>