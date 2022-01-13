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

$language['NOT_SHA']='SHA1 function not available. You need PHP 4.3.0 or better.';
$language['NOT_AUTHORIZED_UPLOAD']='You&rsquo;re not authorized to upload!';
$language['FILE_UPLOAD_ERROR_1']='Cant read uploaded file';
$language['FILE_UPLOAD_ERROR_3']='File is zero sized';
$language['FACOLTATIVE']='optional';
$language['FILE_UPLOAD_ERROR_2']='File Upload Error';
$language['ERR_PARSER']='There seems to be an error in your torrent. The parser did not accept it.';
$language['WRITE_CATEGORY']='You must specify the torrent category...';
$language['DOWNLOAD']='Download';
$language['MSG_UP_SUCCESS']='Upload successful! The torrent has been added.';
$language['MSG_DOWNLOAD_PID']='PID system active get your torrent with your PID';
$language['MSG_AUTO_ANNOUNCE']='Due to a system in place on this tracker you must re-download your torrent file here:<br /><br />';
$language['EMPTY_DESCRIPTION']='You must enter a description!';
$language['EMPTY_ANNOUNCE']='Announce is empty';
$language['FILE_UPLOAD_ERROR_1']='Cant read uploaded file';
$language['FILE_UPLOAD_ERROR_2']='File Upload Error';
$language['FILE_UPLOAD_ERROR_3']='File is zero sized';
$language['NO_SHA_NO_UP']='File uploading not available - no SHA1 function.';
$language['NOT_SHA']='SHA1 function not available. You need PHP 4.3.0 or better.';
$language['ERR_PARSER']='There seems to be an error in your torrent. The parser did not accept it.';
$language['WRITE_CATEGORY']='You must specify the torrent category...';
$language['ERR_HASH']='Info hash MUST be exactly 40 hex bytes.';
$language['ERR_EXTERNAL_NOT_ALLOWED']='External torrents not allowed';
$language['ERR_MOVING_TORR']='Error moving torrent...';
$language['ERR_ALREADY_EXIST']='This torrent may already exist in our database.';
$language['MSG_DOWNLOAD_PID']='PID system active get your torrent with your PID';
$language['MSG_UP_SUCCESS']='Upload successful! The torrent has been added.';


$language["FILE_UPLOAD_TO_BIG"]="File size to big for upload!! Limit";
$language["IMAGE_WAS"]="Image size";
$language["MOVE_IMAGE_TO"]="Could not move image to";
$language["CHECK_FOLDERS_PERM"]="Please check the folder permissons and try again.";
$language["ILEGAL_UPLOAD"]="Ilegal upload!! This is not a image<br>Please press back and try again";
$language["IMAGE"]="Image";
$language["SCREEN"]="Screenshots";

// Twitter Update
$language["TWIT_UNABLE"] = "Unable to update Twitter, cURL extension not found!";
$language["TWIT_NT"] = "New Torrent";

// Preview
$language["UP_PREV"] = "Preview";

// Auto announce - Start -->

// I'm not entirely sure exactly what this is meant to say as the original hack was in Hungarian

// Google Translation of original Hungarian text:
// In the case of any other torrent site if you want to upload a torrent to download, you need not announce to the URL rewrite, in any event, it will be overwritten by the correct URL!
$language["AUTO_ANNOUNCE"]="Any torrent file uploaded will automatically get the announce url reset to our primary announce url";

// Google Translation of original Hungarian text:
// Thus, any downloaded file tracker. torrent file upload!
$language["AUTO_ANNOUNCE2"]="<b>Therefore you can upload torrents from other trackers here.</b>";

// <-- End - Auto announce
// enhanced genre
$language['GENRE']='Genre';
$language['CHOOSE_CAT']='Please Choose an Upload Category';
// whitelist users & groups
$language['MAKE_EXCLUSIVE']= 'Make Exclusive';
$language['EXCLUSIVE_USERS']= 'Exclusive Users';
$language['EXCLUSIVE_GROUPS']= 'Exclusive Groups';
$language['AVAILABLE_USERS']= 'Available Users';
$language['AVAILABLE_GROUPS']= 'Available Groups';
$language['LEAVE_TICKED']= '<b>** Leave ticked to Make Exclusive! Select allowed users or user group below **</b>';
?>