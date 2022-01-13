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
$language['ACCOUNT_CREATED']='Hesap Oluşturuldu';
$language['USER_NAME']='Kullanıcı Adı';
$language['USER_PWD_AGAIN']='Şifre Tekrarı';
$language['USER_PWD']='Şifre';
$language['USER_STYLE']='Tema';
$language['USER_LANGUE']='Dil';
$language['IMAGE_CODE']='Resim Kodu';
$language['INSERT_USERNAME']='Bir kullanıcı adı girmelisiniz!';
$language['INSERT_PASSWORD']='Bir şifre girmelisiniz!';
$language['DIF_PASSWORDS']='Şifreler eşleşmiyor!';
$language['ERR_NO_EMAIL']='Geçerli bir e-posta adresi girmelisiniz';
$language['USER_EMAIL_AGAIN']='e-Posta tekrarı';
$language['ERR_NO_EMAIL_AGAIN']='e-Posta tekrarı';
$language['DIF_EMAIL']='e-Posta adresleri eşleşmiyor!';
$language['SECURITY_CODE']='Soruyu cevaplayın';
# Password strength
$language['WEEK']='Zayıf';
$language['MEDIUM']='Orta';
$language['SAFE']='Güvenli';
$language['STRONG']='Güçlü';
$language["ERR_GENERIC"]='Genel Hata: '.((is_object($GLOBALS['conn'])) ? mysqli_error($GLOBALS['conn']) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false));
?>