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

// Woohoo! Who needs mhash or PHP 4.3?
// Don't require it. Still recommended, but not mandatory.
if (!function_exists('sha1'))
	@include_once('sha1lib.php');

// We'll protect the namespace of our code
// using a class
class BEncode {
	// Dictionary keys must be sorted. foreach tends to iterate over the order
	// the array was made, so we make a new one in sorted order. :)
	function makeSorted($array) {
		// Shouldn't happen!
		if (empty($array))
			return $array;
		$i = 0;
		foreach($array as $key => $dummy)
			$keys[$i++] = stripslashes($key);
		sort($keys);
		for ($i=0; isset($keys[$i]); $i++)
			$return[addslashes($keys[$i])] = $array[addslashes($keys[$i])];
		return $return;
	}

	// Encodes strings, integers and empty dictionaries.
	// $unstrip is set to true when decoding dictionary keys
	function encodeEntry($entry, &$fd, $unstrip = false) {
		if (is_bool($entry)) {
			$fd .= 'de';
			return;
		}
		if (is_int($entry) || is_float($entry)) {
			$fd .= 'i'.$entry.'e';
			return;
		}
		if ($unstrip)
			$myentry = stripslashes($entry);
		else
			$myentry = $entry;
		$length = strlen($myentry);
		$fd .= $length.':'.$myentry;
	}

	// Encodes lists
	function encodeList($array, &$fd) {
		$fd .= 'l';
		// The empty list is defined as array();
		if (empty($array)) {
			$fd .= 'e';
			return;
		}
		for ($i = 0; isset($array[$i]); $i++)
			$this->decideEncode($array[$i], $fd);
		$fd .= 'e';
	}

	// Passes lists and dictionaries accordingly, and has encodeEntry handle
	// the strings and integers.
	function decideEncode($unknown, &$fd) {
		if (is_array($unknown)) {
			if (isset($unknown[0]) || empty($unknown))
				return $this->encodeList($unknown, $fd);
			else
				return $this->encodeDict($unknown, $fd);
		}
		$this->encodeEntry($unknown, $fd);
	}

	// Encodes dictionaries
	function encodeDict($array, &$fd) {
		$fd .= 'd';
		if (is_bool($array)) {
			$fd .= 'e';
			return;
		}
		// NEED TO SORT!
		$newarray = $this->makeSorted($array);
		foreach($newarray as $left => $right) {
			$this->encodeEntry($left, $fd, true);
			$this->decideEncode($right, $fd);
		}
		$fd .= 'e';
	}
} // End of class declaration.

// Use this function in your own code.
function BEncode($array) {
	$string = '';
	$encoder = new BEncode;
	$encoder->decideEncode($array, $string);
	return $string;
}
?>