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
if($CURUSER["admin_access"]=="yes")
$action=isset($_GET["action"])?htmlentities($_GET["action"],ENT_QUOTES,"UTF-8"):$action='';
$dir = new RecursiveDirectoryIterator(".");
$iter = new RecursiveIteratorIterator($dir);
$acct=$SITENAME;
while ($iter->valid())
{
	// 	skip unwanted directories
	if (!$iter->isDot() && !fnmatch('*~', $iter->key()) && !fnmatch('*.btf', $iter->key()) && !fnmatch('*.gif', $iter->key()) && !fnmatch('*.png', $iter->key()) && !fnmatch('*.jpg', $iter->key()) && !in_array($iter->getSubPath(), $skip))
	{
		// 	get specific file extensions
		if (!empty($ext))
		{
			// 	PHP 5.3.4: if (in_array($iter->getExtension(), $ext))
			if (in_array(pathinfo($iter->key(), PATHINFO_EXTENSION), $ext))
			{
				$files[$iter->key()] = hash_file("sha1", $iter->key());
			}
		} else {
			// 	ignore file extensions
			$files[$iter->key()] = hash_file("sha1", $iter->key());
		}
	}
	$iter->next();
}

//	Last Hash Scan

$results = do_sqlquery("SELECT tested FROM {$TABLE_PREFIX}tested WHERE acct = '$acct' ORDER BY tested DESC LIMIT 1",true);
if ($results)
{
	while($result=mysqli_fetch_array($results))
	{
		$tested = $result['tested'];
	}
$report .= "".$language["INTEGRITY_LAST"]." $tested.\r\n";
}

//	Compare Hashed Files with Database Records

// 	identify differences
if (!empty($files))
{
	$result = get_result("SELECT * FROM {$TABLE_PREFIX}baseline",true);
	if (!empty($result))
	{
		foreach ($result as $value)
		{
			$baseline[$value["file_path"]] = $value["file_hash"];
		}
		$diffs = array_diff_assoc($files, $baseline);
		unset($baseline);
	}
}

// 	sort differences into Deleted, Altered and Added arrays
if (!empty($files))
{
	$results = do_sqlquery("SELECT file_path, file_hash FROM {$TABLE_PREFIX}baseline WHERE acct = '$acct'",true);
	if (!empty($results))
	{
		$baseline = array();	// 	from database
		$diffs = array();		// 	differences between $files and $baseline
					// 	$files is current array of file_path => file_hash
		while ($value = mysqli_fetch_array($results))
		{
			if (!array_key_exists($value["file_path"], $files))
			{
				//	Deleted files
				$diffs["Deleted"][$value["file_path"]] = $value["file_path"];
				$baseline[$value["file_path"]] = $value["file_hash"];
			} else {
				//	Altered files
				if ($files[$value["file_path"]] <> $value["file_hash"])
				{
					$diffs["Altered"][$value["file_path"]] = $value["file_path"];
					$baseline[$value["file_path"]] = $value["file_path"];
				} else {
					//	Unchanged files
					$baseline[$value["file_path"]] = $value["file_hash"];
				}
			}
		}
		if (count($baseline) < count($files))
		{
			//	Added files
			$diffs["Added"] = array_diff_assoc($files, $baseline);
		}
		unset($baseline);
	}
}

//	E-Mail Results

// 	display discrepancies
if (!empty($diffs)) {
$report .= "".$language["INTEGRITY_BAD"]."\r\n\r\n";
foreach ($diffs as $status => $affected)
{
	if (is_array($affected) && !empty($affected))
	{

		foreach($affected as $path => $hash) $report .= " • $path\r\n";
	}
}
} else {
	$report .= "".$language["INTEGRITY_OK"]."\r\n";
}
global $CURUSER;
$mailed = send_mail(''.$CURUSER["email"].'', $acct . ' '.$language["INTEGRITY_REP"],$report);

//	Update the Database
// 	clear old records
do_sqlquery("DELETE FROM {$TABLE_PREFIX}baseline WHERE acct = '$acct'",true);

// 	insert updated records
foreach ($files as $path => $hash)
{

	do_sqlquery("INSERT INTO {$TABLE_PREFIX}baseline (file_path, file_hash, acct)
 		VALUES ('$path','$hash', '$acct')",true);
}

do_sqlquery("INSERT INTO {$TABLE_PREFIX}tested (tested, acct) VALUES (NOW(), '$acct')",true);
success_msg($language["SUCCESS"],($action=="index_now"?$language["INTEGRITY_INDEXED"]:$language["INTEGRITY_COMP"])."<br /><a href='javascript:history.back()'>".$language["BACK"]."</a>");
?>