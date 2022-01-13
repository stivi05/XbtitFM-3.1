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
$language['ACCOUNT_CREATED']='Účet vytvořen';
$language['USER_NAME']='Uživatel';
$language['USER_PWD_AGAIN']='Zopakujte heslo';
$language['USER_PWD']='Heslo';
$language['USER_STYLE']='Styl';
$language['USER_LANGUE']='Jazyk';
$language['IMAGE_CODE']='Obrázkový kód';
$language['INSERT_USERNAME']='Musíte zadat uživatelské jméno!';
$language['INSERT_PASSWORD']='Musíte zadat heslo!';
$language['DIF_PASSWORDS']='Hesla se neshodují!';
$language['ERR_NO_EMAIL']='Byl zadán neplatný email';
$language['USER_EMAIL_AGAIN']='Zadejte email';
$language['ERR_NO_EMAIL_AGAIN']='Zadejte email';
$language['DIF_EMAIL']='Emaily se neshodují!';
$language['SECURITY_CODE']='Odpovězte na otázku';
# Password strength
$language['WEEK']='Slabé';
$language['MEDIUM']='Jakštakš';
$language['SAFE']='Bezpečné';
$language['STRONG']='Silné';
$language["ERR_GENERIC"]='Vyskystl se problém: '.((is_object($GLOBALS['conn'])) ? mysqli_error($GLOBALS['conn']) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
?>