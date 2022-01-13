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
$language["ACCOUNT_CREATED"]="Käyttäjätunnus luotu";
$language["USER_NAME"]="Käyttäjänimi";
$language["USER_PWD_AGAIN"]="Toista salasana";
$language["USER_PWD"]="Salasana";
$language["USER_STYLE"]="Teema";
$language["USER_LANGUE"]="Kieli";
$language["IMAGE_CODE"]="Kuvakoodi";
$language["INSERT_USERNAME"]="Sinun on pakko asettaa käyttäjänimi!";
$language["INSERT_PASSWORD"]="Sinun on pakko asettaa salasana!";
$language["DIF_PASSWORDS"]="Salasanat eivät täsmää!";
$language["ERR_NO_EMAIL"]="Sinun pitää antaa toimiva sähköpostiosoite";
$language["USER_EMAIL_AGAIN"]="Toista sähköpostiosoite";
$language["ERR_NO_EMAIL_AGAIN"]="Toista sähköpostiosoite";
$language["DIF_EMAIL"]="Sähköpostiosoitteet eivät täsmää!";
$language["SECURITY_CODE"]="Vastaa kysymykseen";
# Salasanan vahvuus
$language["WEEK"]="Heikko";
$language["MEDIUM"]="Keskivahva";
$language["SAFE"]="Turvallinen";
$language["STRONG"]="Vahva";
//INVITATION SYSTEM
$language['INVIT_MSGINFO']='Olet pyytänyt käyttäjätiliä osoitteeseen '.$SITENAME.' ja olet määritellyt'."\n".'tämän sähköpostiosoitteen (';
$language['INVIT_MSGINFO1']=') yhteystiedoksesi.<br /><br />Käyttäjätilisi odottaa vahvistusta kutsujaltasi.'.
							'<br />Vasta kun käyttäjätilisi on\vahvistettu, voit\ kirjautua sivustolle.<br /><br />Käyttäjätilin tiedot:'."\n".'Käyttäjänimi:';
$language['INVIT_MSGINFO2']='Salasana:';
$language['INVIT_MSGINFO3']='Jos et vahvista\ vahvista tiliäsi 24tunni sisällä, se poistetaan.'.
							'<br />----------------<br />Jos et luonut tiliä osoitteeseen '.$SITENAME.', Ole kiltti ja ohjaa tämä sähköposti osoitteeseen '.$SITEEMAIL;
$language['INVIT_MSG_AUTOCONFIRM3']='----------------<br />Voit nyt kirjautua<br /><br />'.$BASEURL.'/login.php'.
									'<br /><br />antamillasi tiedoilla.<br /><br />'.
									'Hauskoja hetkiä '.$SITENAME.'!<br /><br /><br />----------------<br />'.
									'Jos et luonut tiliä osoitteeseen '.$SITENAME.', Ole kiltti ja ohjaa tämä sähköposti osoitteeseen '.$SITEEMAIL;

$language['REG_CONFIRM']='Käyttäjätilin vahvistaminen';
$language['INVITATION_ONLY']='Pahoittelut, Mutta rekisteröinti on suljettu.<br>Tarvitset kutsun luodaksesi tilin.';
$language['WELCOME_INVITE']='Tervetuloa! Olet vastaanottanut kutsun yhdeltä käyttäjältämme.<br />Voit nyt kirjautua sivustolle.';
$language['INVITE_EMAIL_SENT1']='Vahvistussähköposti lähetettiin antamaasi osoitteeseen';
$language['INVITE_EMAIL_SENT2']='<br />Sinun pitää odottaa että kutsujasi vahvistaa tilisi.';
$language['INVITE_EMAIL_SENT3']='Sähköposti lähetettiin antamaasi osoitteeseen';
$language['INVITE_EMAIL_SENT4']='<br />Voit nyt <a href="index.php?page=login">KIRJAUTUA</a>. Hauskoja hetkiä osoitteessa '.$SITENAME.'!';
$language['INVALID_INVITATION']='Kutsukoodisi on virheellinen.';
$language['ERR_INVITATION']='<br />Pyydä uusi kutsu kutsujaltasi.';


?>