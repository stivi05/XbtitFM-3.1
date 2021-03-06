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
global $users, $torrents, $seeds, $leechers, $percent, $FORUMLINK, $BASEURL, $SITENAME;
// $language['rtl']='rtl'; // if your language is  right to left then uncomment this line
// $language['charset']='ISO-8859-1'; // uncomment this line with specific language charset if different than tracker's one
$language['ACCOUNT_CONFIRM']='Kontobekr??ftelse f??r '.$SITENAME.' sida.';
$language['ACCOUNT_CONGRATULATIONS']='Grattis ditt konto ??r nu aktiverat!<br />Du kan nu <a href="index.php?page=login">logga in</a> p?? sidan och anv??nda ditt konto.';
$language['ACCOUNT_CREATE']='Skapa Konto';
$language['ACCOUNT_DELETE']='Ta bort Konto';
$language['ACCOUNT_DETAILS']='Konto detaljer';
$language['ACCOUNT_EDIT']='??ndra konto';
$language['ACCOUNT_MGMT']='Konto Hantering';
$language['ACCOUNT_MSG']='Hej,'."\n\n".'Detta mail ??r skickat f??r att n??gon har beg??rt ett konto p?? v??ran sida med denna adress.'."\n".'Om du inte gjort det v??nligen ignorera detta mail..Annars v??nligen bekr??fta ditt Konto.'."\n\n".'Med v??nliga h??lsningar Staff.';
$language['ACTION']='Action';
$language['ACTIVATED']='Aktiv';
$language['ACTIVE']='Status';
$language['ACTIVE_ONLY']='Aktiv endast';
$language['ADD']='L??gg till';
$language['ADDED']='Tillagd';
$language['ADMIN_CPANEL']='Admin Kontroll Panel';
$language['ADMINCP_NOTES']='H??r kan du ??ndra alla inst??llningar p?? trackern...';
$language['ALL']='Torrents';
$language['ALL_SHOUT']='Alla Shouts';
$language['ANNOUNCE_URL']='Tracker announce url:';
$language['ANONYMOUS']='Anonym';
$language['ANSWER']='Svar';
$language['AUTHOR']='??gare';
$language['AVATAR_URL']='Avatar (url): ';
$language['AVERAGE']='Medelv??rde';
$language['BACK']='Bak??t';
$language['BAD_ID']='Fel ID!';
$language['BCK_USERCP']='Tillbaka till anv??ndar panel';
$language['BLOCK']='Block';
$language['BODY']='Body';
$language['BOTTOM']='botten';
$language['BY']='Av';
$language['CANT_DELETE_ADMIN']='Det g??r inte ta bort en annan Admin!';
$language['CANT_DELETE_NEWS']='Du har inte beh??righet att ta bort nyheter!';
$language['CANT_DELETE_TORRENT']='Du har inte beh??righet att ta bort torrenter!...';
$language['CANT_DELETE_USER']='Du har inte beh??righet att ta bort anv??ndare!';
$language['CANT_DO_QUERY']='Kan inte k??ra SQL fr??ga - ';
$language['CANT_EDIT_TORR']='Du kan inte ??ndra torrenter!';
$language['CANT_FIND_TORRENT']='Kan inte hitta torrentfilen!';
$language['CANT_READ_LANGUAGE']='Kan inte l??sa spr??kfilen!';
$language['CANT_SAVE_CONFIG']='Kan inte spara inst??llningar i config.php';
$language['CANT_SAVE_LANGUAGE']='Kan inte spara spr??kfilen';
$language['CANT_WRITE_CONFIG']='Varning!!! kan inte spara config.php!';
$language['CATCHUP']='Markera alla som l??sta';
$language['CATEGORY']='Kat.';
$language['CATEGORY_FULL']='Kategori';
$language['CENTER']='center';
$language['CHANGE_PID']='??ndra PID';
$language['CHARACTERS']='tecken';
$language['CHOOSE']='V??lj';
$language['CHOOSE_ONE']='V??lj en';
$language['CLICK_HERE']='Klicka h??r';
$language['CLOSE']='St??ng';
$language['COMMENT']='Kom.';
$language['COMMENT_1']='Kommentar';
$language['COMMENT_PREVIEW']='F??rhandsvisning Kommentar';
$language['COMMENTS']='Komentarer';
$language['CONFIG_SAVED']='Grattis!! Nya inst??llningar sparade';
$language['COUNTRY']='Land';
$language['CURRENT_DETAILS']='Nuvarande uppgifter';
$language['DATABASE_ERROR']='Databas fel.';
$language['DATE']='Datum';
$language['DB_ERROR_REQUEST']='Databas fel. Kan inte fullf??lja.';
$language['DB_SETTINGS']='Databas inst??llningar';
$language['DEAD_ONLY']='Endast d??da';
$language['DELETE']='Ta bort';
$language['DELETE_ALL_READED']='Ta bort alla l??sta';
$language['DELETE_CONFIRM']='??r du s??ker p?? att du vill ta bort?';
$language['DELETE_TORRENT']='Ta bort Torrent';
$language['DELFAILED']='Ta bort Misslyckades';
$language['DESCRIPTION']='Beskrivning';
$language['DONT_NEED_CHANGE']='Du beh??ver inte ??ndra dom h??r inst??llningarna!';
$language['DOWN']='Dl';
$language['DOWNLOAD']='Ladda ner';
$language['DOWNLOAD_TORRENT']='Ladda ner Torrent';
$language['DOWNLOADED']='Nerladdat';
$language['EDIT']='??ndra';
$language['EDIT_LANGUAGE']='??ndra Spr??k';
$language['EDIT_POST']='??ndra Post';
$language['EDIT_TORRENT']='??ndra torrent';
$language['EMAIL']='E-post';
$language['EMAIL_SENT']='Ett meddelande har skickat till anvgien adress<br />Klicka p?? l??nken f??r att bekr??fta kontot.';
$language['EMAIL_VERIFY']='e-post adress ??ndrad p?? '.$SITENAME;
$language['EMAIL_VERIFY_BLOCK']='Bekr??ftelse meddelandet har skickats';
$language['EMAIL_VERIFY_MSG']='Hej,'."\n\n".'Detta mail har skickat f??r att du vill ??ndra din adress som finns registrerad p?? ditt konto, v??nligen klicka p?? l??nken f??r att bekr??fta ??ndringen.'."\n\n".'Med v??nliga h??lsningar staff.';
$language['EMAIL_VERIFY_SENT1']='<br /><center>Ett bekr??ftelse meddelande har skickats till:<br /><br /><strong><font color="red">';
$language['EMAIL_VERIFY_SENT2']='</font></strong><br /><br />Du m??ste klicka p?? l??nken i meddelandet f??r att<br />Updatera din e-post adress. Det borde komma inom 10 minuter<br />(oftast direkt) Vissa e-post klienter kan markera det som spam SPAM<br />S?? v??nligen kontrollera din skr??ppost mapp om du inte ser det.<br /><br />';
$language['ERR_500']='HTTP/1.0 500 Unauthorized access!';
$language['ERR_AVATAR_EXT']='Tyv??rr antingen finns inte bilden eller s?? ??r den i fel format (endast gif, jpg, bmp och png bilder ??r till??tet).';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='Fel nyhets ID!';
$language['ERR_BODY_EMPTY']='Body Kan inte va tomt!';
$language['ERR_CANT_CONNECT']='Kan inte ansluta till lokal MySQL server';
$language['ERR_CANT_OPEN_DB']='Kan inte ??ppna databasen';
$language['ERR_COMMENT_EMPTY']='Kommentar kan inte va tomt!';
$language['ERR_DB_ERR']='Databas Fel. V??nligen kontakta en administrat??r ang??ende felet.';
$language['ERR_DELETE_POST']='Ta bort post. Kontroll: Du h??ller p?? att ta bort en post. Klicka';
$language['ERR_DELETE_TOPIC']='Ta bort ??mne. Kontroll: Du h??ller p?? ta bort ett ??mne. Klicka';
$language['ERR_EMAIL_ALREADY_EXISTS']='Denna e-post finns redan iv??rat system!';
$language['ERR_EMAIL_NOT_FOUND_1']='E-post adressen';
$language['ERR_EMAIL_NOT_FOUND_2']='Hittades inte i databasen.';
$language['ERR_ENTER_NEW_TITLE']='Du m??ste skriva en titel!';
$language['ERR_FORUM_NOT_FOUND']='Forum hittades inte';
$language['ERR_FORUM_UNKW_ACT']='Forum Fel: Ok??nd h??ndelse';
$language['ERR_GUEST_EXISTS']='"Guest" ??r ett skyddat namn. Du kan inte registrera dig som "Guest"';
$language['ERR_IMAGE_CODE']='S??kerhets koden st??mmer inte';
$language['ERR_INS_TITLE_NEWS']='Du m??ste skriva b??de titel OCH nyhet';
$language['ERR_INV_NUM_FIELD']='Invalid numerical field(s) from client';
$language['ERR_INVALID_CLIENT_EVENT']='Ogiltig h??ndelse= fr??n klient.';
$language['ERR_INVALID_INFO_BT_CLIENT']='Ogilltig information mottagen av bittorent klient';
$language['ERR_INVALID_IP_NUMB'] = 'Ogiltig IP adress. Enbart standard ip nummer i punktform till??ts (v??rd namn inte till??ten)';
$language['ERR_LEVEL']='Tyv??rr, Din rank ';
$language['ERR_LEVEL_CANT_POST']='Du har inte till??telse att skriva h??r.';
$language['ERR_LEVEL_CANT_VIEW']='Du har inte till??telse att se denna tr??d.';
$language['ERR_MISSING_DATA']='Data saknas!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='Du m??ste logga in f??r att skriva...';
$language['ERR_NO_BODY']='Ingen br??d text';
$language['ERR_NO_NEWS_ID']='Nyhets ID fanns inte!';
$language['ERR_NO_POST_WITH_ID']='Ingen tr??d med detta ID ';
$language['ERR_NO_SPACE']='Anv??ndarnamn kan inte ha mellanslag, anv??nd understreck typ:<br /><br />';
$language['ERR_NO_TOPIC_ID']='Ingen Tr??d ID visades';
$language['ERR_NO_TOPIC_POST_ID']='Ingen titel associerad med tr??d ID';
$language['ERR_NOT_AUTH']='Du har inte beh??righet!';
$language['ERR_NOT_FOUND']='Hitades ej...';
$language['ERR_NOT_PERMITED']='Ingen till??telse';
$language['ERR_PASS_LENGTH_1']='L??senordet m??ste var minst';
$language['ERR_PASS_LENGTH_2']='tecken l??ngt.';
$language['ERR_PASSWORD_INCORRECT']='Fel l??senord';
$language['ERR_PERM_DENIED']='Tilltr??de nekat';
$language['ERR_PID_NOT_FOUND']='Ladda ner torrenten igen. PID system ??r aktiv  och ingen PID hittades i torrenten';
$language['ERR_RETR_DATA']='Kan inte ta emot data!';
$language['ERR_SEND_EMAIL']='Kunde inte skicka mail.V??nligen kontakta admin f??r felet';
$language['ERR_SERVER_LOAD']='Server belastning ??r h??g f??r tillf??llet. Provar igen, v??nligen v??nta...';
$language['ERR_SPECIAL_CHAR']='<font color="black">Anv??ndar namnet kan inte inneh??lla speialtecken som:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; etc.</strong></font></font><br />';
$language['ERR_SQL_ERR']='SQL Fel';
$language['ERR_SUBJECT']='Du m??ste ange ett ??mne.';
$language['ERR_TOPIC_ID_NA']='??mnes ID ??r inte tillg??ngligt';
$language['ERR_TOPIC_LOCKED']='??mnet L??st';
$language['ERR_TORRENT_IN_BROWSER']='Denna fil ??r f??r bittorrent klienter.';
$language['ERR_UPDATE_USER']='Kunde inte uppdatera anv??ndar data. V??nligen kontakta en administrat??r ang??ende felet.';
$language['ERR_USER_ALREADY_EXISTS']='Detta anv??ndarnamn finns redan!';
$language['ERR_USER_NOT_FOUND']='Tyv??rr, anv??ndaren hittades inte';
$language['ERR_USER_NOT_USER']='Du har inte tillg??ng till andra anv??ndares inst??llningar !';
$language['ERR_USERNAME_INCORRECT']='Felaktigt anv??ndarnamn';
$language['ERROR']='Fel';
$language['ERROR_ID']='Fel ID';
$language['FACOLTATIVE']='Valfritt';
$language['FILE']='Fil';
$language['FILE_CONTENTS']='Fil Inneh??ll';
$language['FILE_NAME']='Fil Namn';
$language['FIND_USER']='S??k Anv??ndare';
$language['FINISHED']='Klar';
$language['FORUM']='Forum';
$language['FORUM_ERROR']='Forum Fel';
$language['FORUM_INFO']='Forum Info';
$language['FORUM_MIN_CREATE']='Min.. Klass skapa';
$language['FORUM_MIN_READ']='Min.. Klass L??sa';
$language['FORUM_SEARCH']='Forum S??k';
$language['FORUM_N_TOPICS']='N. ??mnen';
$language['FORUM_N_POSTS']='N. Inl??gg';
$language['FRM_DELETE']='Ta bort';
$language['FRM_LOGIN']='Logga in';
$language['FRM_PREVIEW']='F??rhandsvisning';
$language['FRM_REFRESH']='Ladda Om';
$language['FRM_RESET']='??terst??ll';
$language['FRM_SEND']='Skicka';
$language['FRM_CONFIRM']='Bekr??fta';
$language['FRM_CANCEL']='Avbryt';
$language['FRM_CLEAN']='Rensa';
$language['GLOBAL_SERVER_LOAD']='Global Server Belastning (Alla sidor p?? servern)';
$language['GO']='K??r';
$language['GROUP']='Grupp';
$language['GUEST']='G??st';
$language['GUESTS']='G??ster';
$language['HERE']='H??r';
$language['HISTORY']='Historik';
$language['HOME']='Hem';
$language['IF_YOU_ARE_SURE']='om du ??r s??ker.';
$language['IM_SURE']='Jag ??r s??ker';
$language['IN']='in';
$language['INF_CHANGED']='Information ??ndrad!';
$language['INFINITE']='Inf.';
$language['INFO_HASH']='Info Hash';
$language['INS_NEW_PWD']='Skriv NYTT l??senord!';
$language['INS_OLD_PWD']='Skriv GAMMALT l??senord!';
$language['INSERT_DATA']='Ange data f??r uppladning.';
$language['INSERT_NEW_FORUM']='L??gg till Forum';
$language['INVALID_ID']='??r inte ett riktigt ID. Tyv??rr!';
$language['INVALID_INFO_HASH']='Felaktig info hash v??rde.';
$language['INVALID_PID']='Felaktig PID';
$language['INVALID_TORRENT']='Tracker fel: ogiltig torrent';
$language['KEYWORDS']='Huvudord';
$language['LAST_EXTERNAL']='Senaste External Torrents Uppdatering gjordes ';
$language['LAST_NEWS']='Senaste Nyhter ';
$language['LAST_POST_BY']='Senaste inl??gg av';
$language['LAST_SANITY']='Senaste Sanity Check gjordes ';
$language['LAST_TORRENTS']='Senaste Torrents';
$language['LAST_UPDATE']='Senaste Uppdatering';
$language['LASTPOST']='Senaste inl??gg';
$language['LEECHERS']='Tankare';
$language['LEFT']='V??nster';
$language['LOGIN']='Logga in';
$language['LOGOUT']='Logga ut';
$language['MAILBOX']='Brevl??da';
$language['MANAGE_NEWS']='Hantera Nyheter';
$language['MEMBER']='Anv??ndare';
$language['MEMBERS']='Anv??ndare';
$language['MEMBERS_LIST']='Anv??ndar Lista';
$language['MINIMUM_100_DOWN']='(med minst 100 MB nerladdat)';
$language['MINIMUM_5_LEECH']='med minst 5 leechers, inte med d??da torrents';
$language['MINIMUM_5_SEED']='med minst 5 seeders';
$language['MKTOR_INVALID_HASH']='skapa torrent: Tog emot felaktig hash';
$language['MNU_ADMINCP']='Admin Panel';
$language['MNU_FORUM']='Forum';
$language['MNU_INDEX']='Index';
$language['MNU_MEMBERS']='Medlemmar';
$language['MNU_NEWS']='Nyheter';
$language['MNU_STATS']='Fler Stats';
$language['MNU_TORRENT']='Torrents';
$language['MNU_UCP_CHANGEPWD']='Byt L??senord';
$language['MNU_UCP_HOME']='Profil Panel';
$language['MNU_UCP_IN']='Din PM inkorg';
$language['MNU_UCP_INFO']='??ndra Profil';
$language['MNU_UCP_NEWPM']='Nytt PM';
$language['MNU_UCP_OUT']='Din PM utkorg';
$language['MNU_UCP_PM']='Din PM l??da';
$language['MNU_UPLOAD']='Ladda upp';
$language['MORE_SMILES']='Fler Smileys';
$language['MORE_THAN']='Mer ??n ';
$language['MORE_THAN_2']='saker hittade, visar dom f??rsta';
$language['NA']='N/A';
$language['NAME']='Namn';
$language['NEED_COOKIES']='Notera: kakor m??ste till??tas f??r att logga in.';
$language['NEW_COMMENT']='Skriv din kommenter...';
$language['NEW_COMMENT_T']='Ny Kommentar';
$language['NEWS']='Nyheterna';
$language['NEWS_DESCRIPTION']='Nyheter:';
$language['NEWS_INSERT']='Skriv Nyheterna';
$language['NEWS_PANEL']='Nyhets Panel';
$language['NEWS_TITLE']='Titel:';
$language['NEXT']='N??sta';
$language['NO']='Nej';
$language['NO_BANNED_IPS']='Finns inga bannade IP';
$language['NO_COMMENTS']='Inga kommentarer...';
$language['NO_FORUMS']='Inga Forums hittades!';
$language['NO_MAIL']='Du har inga nya meddelanden.';
$language['NO_MESSAGES']='Inget PM hittades...';
$language['NO_NEWS']='Inga Nyheter';
$language['NO_PEERS']='Inga peers';
$language['NO_RECORDS']='Tyv??rr, listan ??r tom...';
$language['NO_TOPIC']='Inga ??mnen hittades';
$language['NO_TORR_UP_USER']='Inga torrents uppladdade av anv??ndaren';
$language['NO_TORRENTS']='Inga torrents h??r...';
$language['NO_USERS_FOUND']='Ingen anv??ndare hittades!';
$language['NOBODY_ONLINE']='Ingen Ansluten';
$language['NONE']='Ingen';
$language['NOT_ADMIN_CP_ACCESS']='Du har inte beh??righet till admin panelen!';
$language['NOT_ALLOW_DOWN'] = 'det ??r inte till??tet att ladda ner ifr??n';
$language['NOT_AUTH_DOWNLOAD'] = 'Du har inte beh??righet att ladda hem. ledsen...';
$language['NOT_AUTH_VIEW_NEWS'] = 'Du har inte beh??righet att visa nyheterna!';
$language['NOT_AUTHORIZED'] = 'Du har inte beh??righet att visa';
$language['NOT_AUTHORIZED_UPLOAD'] = 'Du har inte beh??righet att ladda upp saker!';
$language['NOT_AVAILABLE'] = 'Inte tillg??nglig';
$language['NOT_MAIL_IN_URL'] = 'Detta ??r inte e-mail adressen som ??r i url:n';
$language['NOT_POSS_RESET_PID'] = 'Det ??r inte m??jligt att ??ndra din PID! <br />Kontakta Staff...';
$language['NOW_LOGIN'] = 'Nu kommer du uppmanas logga in';
$language['NUMBER_SHORT'] = '#';
$language['OLD_PWD']='Gammalt L??senord';
$language['ONLY_REG_COMMENT']='Endast registrerade anv??ndare kan skriva Kommentarer!';
$language['OPT_DB_RES']='Optimering av db resultat';
$language['OPTION']='Inst??llningar';
$language['PASS_RESET_CONF']='Bekr??ftelse f??r ??terst??llning av l??senord';
$language['PEER_CLIENT']='Klient';
$language['PEER_COUNTRY']='Land';
$language['PEER_ID']='Peer ID';
$language['PEER_LIST']='Peer Lista';
$language['PEER_PORT']='Port';
$language['PEER_PROGRESS']='Framsteg';
$language['PEER_STATUS']='Status';
$language['PEERS']='peers';
$language['PEERS_DETAILS']='Klicka f??r att se peer detaljer';
$language['PICTURE']='Bild';
$language['PID']='PID';
$language['PLEASE_WAIT']='V??nta...';
$language['PM']='PM';
$language['POSITION']='Position';
$language['POST_REPLY']='Skriv svar';
$language['POSTED_BY']='Skrivet av';
$language['POSTED_DATE']='Skrivet den';
$language['POSTS']='Inl??gg';
$language['POSTS_PER_DAY']='%s inl??gg per dag';
$language['POSTS_PER_PAGE']='Inl??gg per sida';
$language['PREVIOUS']='F??reg.';
$language['PRIVATE_MSG']='Privat Meddelande';
$language['PWD_CHANGED']='L??senord ??ndrat!';
$language['QUESTION']='Fr??ga';
$language['QUICK_JUMP']='Snabb Navigering';
$language['QUOTE']='Citera';
$language['RANK']='Klass';
$language['RATIO']='Ratio';
$language['REACHED_MAX_USERS']='Anv??ndar gr??ns uppfylld';
$language['READED']='L??s';
$language['RECEIVER']='Mottagare';
$language['RECOVER_DESC'] = 'Anv??nd formul??ret nedanf??r f??r att ??terst??lla ditt l??senord. Uppgifter f??r kontot och detaljer kommer att skickas till dig.(Du kommer f?? svara p?? brevet med en l??nk som finns i e-posten)';
$language['RECOVER_PWD'] = '??terst??ll l??senord';
$language['RECOVER_TITLE'] = '??terst??ll F??rlorat Anv??ndarnamn eller L??senord';
$language['REDIRECT']='Om din webbl??sare inte har javascript aktivterat, Klicka';
$language['REDIRECT2']='Om din webbl??sare inte har javascipt aktiverad Klicka,<a href="%s">H??R</a>.';
$language['REDOWNLOAD_TORR_FROM']='Ladda ner torrent igen fr??n';
$language['REGISTERED']='Registrerad';
$language['REGISTERED_EMAIL']='Registrerad e-post';
$language['REMOVE']='Ta bort';
$language['REPLIES']='Svar';
$language['REPLY']='Svara';
$language['RESULT']='Resultat';
$language['RETRY']='F??rs??k igen';
$language['RETURN_TORRENTS']='Tillbaka till torrent listan';
$language['REVERIFY_CONGRATS1'] = '<center><br />Grattis, Ditt email har blivit verifierat och lyckades byta<br/><br/><strong>Fr??n: <font color=\'red\'>';
$language['REVERIFY_CONGRATS2'] = '</strong></font><br /><strong>Till: <font color=\'red\'>';
$language['REVERIFY_CONGRATS3'] = '</strong></font><br /><br />';
$language['REVERIFY_FAILURE'] = '<center><br /><strong><font color=\'red\'><u>Ledsen men url finns inte</u></strong></font><br /><br />Varje g??ng du f??rs??ker ??ndra din email adress s?? g??rs en ny url och den gammla raderas<br />Ser du detta meddelande ??r det st??rst chans att du har f??s??kt ??ndra din email adress<br />mer ??n 1 g??ng och du anv??nder en gammal url.<br /><br /><strong>Sn??lla v??nta p?? att beg??ra ny och va s??ker p?? att du inte har f??tt n??got<br />f??re du beg??r ett nytt bekr??ftelse mail f??re  du f??rs??ker att byta ditt email igen.</strong><br /><br />';
$language['REVERIFY_MSG'] = 'Ifall du f??rs??ker ??ndra din e-mail adress s?? kommer en verifikationsl??nk skickas till den e-post address du ??nskar att byta till.<br /><br /><font color=\'red\'><strong>E-post adressen f??r ditt konto kommer inte bli ??ndrat f??r??n Du Verfierar den nya address genom att klicka p?? l??nken.</strong></font>';
$language['RIGHT']='H??ger';
$language['SEARCH']='S??k';
$language['SEEDERS']='seedare';
$language['SEEN']='Sedd';
$language['SELECT']='V??lj...';
$language['SENDER']='Avs??ndare';
$language['SENT_ERROR']='Sent Error';
$language['SHORT_C']='F'; //Shortname for Completed-F??rdig
$language['SHORT_L']='L'; //Shortname for Leechers
$language['SHORT_S']='S'; //Shortname for Seeders
$language['SHOUTBOX']='Skrik l??da';
$language['SIZE']='Storlek';
$language['SORRY']='Tyv??rr';
$language['SORTID']='Sorterings id';
$language['SPEED']='Hastighet';
$language['STICKY']='Klistrad';
$language['SUB_CATEGORY']='Under-Kategori';
$language['SUBJECT']='??mne';
$language['SUBJECT_MAX_CHAR']='??mne ??r begr??nsat till ';
$language['SUC_POST_SUC_EDIT']='??ndring av inl??gg lyckades.';
$language['SUC_SEND_EMAIL'] = 'ett bekr??ftelsebrev har skickats till';
$language['SUC_SEND_EMAIL_2'] = 'V??nligen l??t det ta ett par minuter f??r mailet att komma fram';
$language['SUCCESS']='Success';
$language['SUMADD_BUG']='Tracker bug calling summaryAdd';
$language['TABLE_NAME']='Tabell namn';
$language['TIMEZONE']='Tidszon';
$language['TITLE']='Titel';
$language['TOP']='B??st';
$language['TOP_10_ACTIVE']='10 Mest aktiva torrents';
$language['TOP_10_BEST_SEED']='10 B??st Seedade torrents';
$language['TOP_10_BSPEED']='10 Snabbaste torrents';
$language['TOP_10_DOWNLOAD']='Topp 10 Nerladdare';
$language['TOP_10_SHARE']='Topp 10 B??sta delare';
$language['TOP_10_UPLOAD']='Topp 10 Uppladdare';
$language['TOP_10_WORST']='Topp 10 S??msta Delare';
$language['TOP_10_WORST_SEED']='10 Torrents s??msta Seeders';
$language['TOP_10_WSPEED']='10 L??ngsamaste Torrents';
$language['TOP_TORRENTS']='Mest Popul??ra Torrents';
$language['TOPIC']='??mne';
$language['TOPICS']='??mnen';
$language['TOPICS_PER_PAGE']='??mnen per sida';
$language['TORR_PEER_DETAILS']='Torrent peers detaljer';
$language['TORRENT']='Torrent';
$language['TORRENT_ANONYMOUS'] = 'Skicka som anonym';
$language['TORRENT_CHECK'] = 'Till??t trackern att ta emot och anv??nda information fr??n torrentfil.';
$language['TORRENT_DETAIL'] = 'Torrent Information';
$language['TORRENT_FILE'] = 'Torrent Fil';
$language['TORRENT_SEARCH'] = 'S??k Torrents';
$language['TORRENT_STATUS'] = 'Status';
$language['TORRENT_UPDATE'] = 'Uppdaterar, v??nligen v??nta...';
$language['TORRENTS'] = 'Torrents';
$language['TORRENTS_PER_PAGE'] = 'Torrents per sida';
$language['TRACK_DB_ERR'] = 'Tracker/databas fel. Detaljerad information finns i loggfilerna.';
$language['TRACKER_INFO'] = '$users users, tracking $torrents torrents ($seeds seeds e $leechers leechers, $percent%)';
$language['TRACKER_LOAD'] = 'Tracker belastning';
$language['TRACKER_SETTINGS'] = 'Tracker Inst??llningar';
$language['TRACKER_STATS'] = 'Tracker status';
$language['TRACKING'] = 'Sp??rar';
$language['TRAFFIC'] = 'Trafik';
$language['UCP_NOTE_1'] = 'H??r kontrollerar du din Postl??da, skriv PM till andra anv??ndare,';
$language['UCP_NOTE_2'] = 'inst??llningar f??r dig etc...';
$language['UNAUTH_IP'] = 'Otill??ten IP address.';
$language['UNKNOWN']='ok??nd';
$language['UPDATE']='Uppdatera';
$language['UPFAILED']='Uppladdningen misslyckades';
$language['UPLOAD_IMAGE']='Ladda upp Bild';
$language['UPLOAD_LANGUAGE_FILE']='Ladda upp spr??kfil';
$language['UPLOADED']='Uppladdad';
$language['UPLOADER']='Uppladdare';
$language['UPLOADS']='Uppladdat';
$language['URL']='URL';
$language['USER']='Anv??ndare';
$language['USER_CP'] = 'Kontrollpanel';
$language['USER_CP_1'] = 'Kontrollpanelen';
$language['USER_DETAILS'] = 'Anv??ndar Profil';
$language['USER_EMAIL'] = 'E-post';
$language['USER_ID'] = 'Anv??ndar ID';
$language['USER_JOINED'] = 'Blev medlem';
$language['USER_LASTACCESS'] = 'Senast inloggad';
$language['USER_LEVEL'] = 'Klass';
$language['USER_LOCAL_TIME'] = 'Anv??ndarens Tidszon';
$language['USER_NAME'] = 'Anv??ndare';
$language['USER_PASS_RECOVER'] = 'Gl??mt L??senord/Anv??ndare';
$language['USER_PWD'] = 'L??senord';
$language['USERS_SEARCH'] = 'Anv??ndare S??k';
$language['VIEW_DETAILS']='Se detaljer';
$language['VIEW_TOPIC']='Se ??mne';
$language['VIEW_UNREAD']='Se ol??sta';
$language['VIEWS']='Visningar';
$language['VISITOR']='Bes??kare';
$language['VISITORS']='Bes??kare';
$language['WAIT_ADMIN_VALID']='Du f??r v??nta till en Administrat??r bekr??ftat ditt konto...';
$language['WARNING']='Varning!';
$language['WELCOME']='V??lkommen';
$language['WELCOME_ADMINCP']='V??lkommen till Admin Kontroll Panel';
$language['WELCOME_BACK']='V??lkommen tillbaka';
$language['WELCOME_UCP']='V??lkommen till din Kontrollpanel';
$language['WORD_AND']='och';
$language['WORD_NEW']='Ny';
$language['WROTE']='Skrev';
$language['WT']='WT';
$language['X_TIMES']='g??nger';
$language['YES']='Ja';
$language['LAST_IP']='Senaste IP';
$language['FIRST_UNREAD']='G?? till f??rsta ol??sta inl??gg';
$language['MODULE_UNACTIVE']='Modulen som kr??vs ??r inte aktiverad!';
$language['MODULE_NOT_PRESENT']='Modulen som kr??vs finns inte!';
$language['MODULE_LOAD_ERROR']='Modulen som kr??vs verkar ha ett fel!';

// Custom title -->
$language["CUSTOM_TITLE"]="Anpassad titel";
// <-- Custom title

// Seed Bonus -->    
$language["BONUS_INFO1"]="H??r kan du byta bort Bonus Po??ng (Nuvarande) ";
$language["BONUS_INFO2"]="(Om knapparna inte fungerar har du inte nog med po??ng !)";
$language["BONUS_INFO3"]="Vad f??r jag po??ng f??r?";
$language["BONUS_INFO3a"]="F??r varje timme systemet ser dig som seeder";
$language["BONUS_INFO3b"]="<b>(Laddar upp i";
$language["BONUS_INFO3c"]="KB/s elr snabbare)</b>";
$language["BONUS_INFO3d"]="f??r du";
$language["BONUS_INFO3e"]="<b>(Upp till maximalt";
$language["BONUS_INFO3f"]="po??ng per timme)</b>";
$language["BONUS_INFO4"]="po??ng";
$language["BONUS_INFO4a"]="po??ng";
$language["BONUS_INFO5"]="per torrent";
$language["BONUS_INFO6"]="F??r du";
$language["BONUS_INFO7"]="F??r varje ny torrent du l??gger upp. <b>(Med en";
$language["BONUS_INFO8"]="timmars f??rdr??jning f??r att ge oss m??jlighet att kontrollera.)</b>";
$language["BONUS_INFO9"]="f??r varje kommentar du g??r p?? torrent.";
$language["BONUS_INFO10"]="f??r varje inl??gg du g??r i forumet.";
$language["BONUS_INFO11"]="f??r varje inl??gg i shoutbox.";
$language["BONUS_INFO12"]="f??r varje timme du lyssnar p?? radion.";
$language["WHAT_ABOUT"]="Vad ??r det h??r om?";
$language["POINTS"]="Po??ng";
$language["EXCHANGE"]="Byt in";
$language["GB_UPLOAD"]=" GB Uppladdat";
$language["CHANGE_CUSTOM_TITLE"]="Byt Custom title (pris - ";
$language["NO_CUSTOM_TITLE"]="ingen";
$language["UP_TO_VIP"]="Uppgradera till VIP";
$language["FOR"]="f??r";
$language["NEED_MORE_POINTS"]="[m??ste ha mer po??ng]";
$language["CHANGE_USERNAME"]="Byt anv??ndar namn (pris - ";
$language["NEVER_EXPIRE"]="G??r aldrig ut";
$language["SB_MAKE_A_GIFT"]="Ge bort po??ng till annan medlemm";
$language["BAD_DATA"]="Felaktiga data!";
$language["GIFT_TOO_BIG"]="Din g??va ??r f??r stor, Du kan som mest Ge bort";
$language["GIFT_USER_NOT_FOUND"]="Anv??ndaren du vill ge po??ng finns inte i databasen!";
$language["GIFT_NOT_ENOUGH"]="Du har inte s?? m??nga po??ng!";
$language["GIFT_PM_SUBJ_1"]="Du har f??tt en g??va!";
$language["GIFT_PM_SUBJ_2"]="Du har skickat en g??va!";
$language["GIFT_PM_REC_1"]="har gett dig en g??va v??rd";
$language["GIFT_PM_REC_2"]="bonus po??ng. Gl??m inte s??ga tack."."\n\n".((substr($FORUMLINK,0,3)=="smf" || $FORUMLINK=="ipb")?"[img]".$BASEURL."/images/smilies/thumbsup.gif[/img]":":thumbsup:");
$language["GIFT_PM_SEND_1"]="Detta PM bekr??ftar att du skickat ";
$language["GIFT_PM_SEND_2"]="en g??va v??rd";
$language["GIFT_PM_SEND_3"]="bonus po??ng. Dom har nu dragits fr??n din totala summa ?? skickats till";
$language["GIFT_PM_SEND_4"]="\n\n".((substr($FORUMLINK,0,3)=="smf" || $FORUMLINK=="ipb")?"[img]".$BASEURL."/images/smilies/thumbsup.gif[/img]":":thumbsup:");
$language["GIFT_PM_SYS"]="\n\n"."[b][color=red]Detta ??r ett system PM V??nligen svara inte p?? detta![/color][/b]";
$language["BONUS_VIP_CONFIRM"]="??r du s??ker du vill spendera f??r";
// <-- Seed Bonus

// Donation History by DiemThuy -->
$language['DON_HISTORIE']='Dessa medlemmar har donerat till oss..Tack Ska ni ha';
$language['NO_DON_HIST'] = 'Ingen Donations historia ??n';
$language['DON_HIST'] = 'Donations Historia';
$language['DON_AMT'] = 'Donations Storlek';
$language['DONATIONS'] = 'Donationer';
$language['DON_CONFIRM'] = 'Vi har f??tt din Donation, Tack S?? Mycket!!';
$language['DONATION'] = 'Donation';
$language['USERNAME'] = 'Anv??ndarnamn';
$language['AMOUNT'] = 'Storlek';
// <-- Donation History by DiemThuy


$language['TR_TIMED_RANK_SET'] = 'Inst??llningar tidsbaserad Klass';
$language['TR_NEW_RANK'] = 'Ny Klass';
$language['TR_OLD_RANK'] = 'Gammal Klass';
$language['TR_TIME_TO_EXP'] = 'Utg??r den';
$language['TR_WEEK'] = 'Vecka';
$language['TR_WEEKS'] = 'Veckor';
$language['TR_ONE_MONTH'] = 'En M??nad';
$language['TR_HALF_YEAR'] = 'Halv ??r';
$language['TR_ONE_YEAR'] = 'Ett ??r';
$language['TR_TWO_YEARS'] = 'Tv?? ??r';
$language['TR_SUBJECT'] = 'Din klass har ??ndrats!';
$language['TR_MSG_PART_1'] = 'Din klass har ??ndrats till';
$language['TR_MSG_PART_2'] = 'detta ??r en tidsbaserad Klass tiden f??r den g??r ut den';
$language['TR_MSG_PART_3'] = 'efter det f??r du tillbaka din gammla klass';
$language['TR_MSG_PART_4'] = 'Tillbaka';
$language['TR_MSG_PART_5'] = 'Detta ??r ett automatiskt system meddelande, V??nligen svara inte p?? det!';
$language['TR_UNAUTH'] = 'obeh??rig axess!';
$language['TR_ID_OR_LEV_INV'] = 'id eller klass felaktig!';
$language['TR_NOT_OWN_RANK'] = "Du kan inte ??ndra din egen klass";
$language['TR_NOT_HIGHER'] = "Du kan inte ??ndra n??gon till en h??gre klass ??n din egen.";
$language['TR_NOT_HIGHER_2'] = "Du kan inte ??ndra n??gon med samma klass eller h??gre ??n din egen.";
$language['TR_BOTH_THE_SAME'] = "Kan inte ??ndra till samma klass som anv??ndaren redan ??r.";
$language["TR_EXP_SUBJ"] = "Din tidsbaserad Klass har g??tt ut!";
$language["TR_EXP_MSG_1"] = "Din klass har ??ndrats tillbaka till";
$language["TR_EXP_MSG_2"] = "[color=red][b]Automatiskt meddelande, V??nligen svara inte p?? detta![/b][/color]";
$language['TR_MONTH'] = 'M??nad';
$language['TR_MONTHS'] = 'M??nader';
$language['TR_YEAR'] = '??r';
$language['TR_YEARS'] = '??r';
$language['TR_DAY'] = 'Dag';
$language['TR_DAYS'] = 'Dagar';


// GOLD
$language["GOLD_TYPE"]="Torrent typ";
$language["GOLD_PICTURE"]="Guld bild";
$language["SILVER_PICTURE"]="Silver bild";
$language["BRONZE_PICTURE"]="Brons bild";
$language["GOLD_DESCRIPTION"]="Guld beskrivning";
$language["SILVER_DESCRIPTION"]="Silver beskrivning";
$language["BRONZE_DESCRIPTION"]="Brons beskrivning";
$language["CLASSIC_DESCRIPTION"]="Vanlig beskrivning";
$language["GOLD_LEVEL"]="Vem kan l??gga till guld/silver torrents";
$language["IS_GOLD"]="Guld";
$language["IS_SILVER"]="Silver";
$language["IS_BRONZE"]="Brons";
$language["IS_ALL"]="Fri";
$language["GOLD_PERCENT"]="Guld nerladdnings procent";
$language["SILVER_PERCENT"]="Silver nerladdnings procent";
$language["BRONZE_PERCENT"]="Brons nerladdnings procent";
$language["GOLD_FL"]="Fri Nerladdning";

$language['FL_TO'] = 'till';
$language['FL_NOT_TODAY'] = 'Ej Aktiv';
$language['FL_FREE_LEECH'] = 'Fri Nerladdning';
$language['FL_START_TIME'] = 'N??sta Happy Hour Startar';
$language['FL_ITS_HH'] = 'Nu ??r det Happy Hour';


$language["FILE_UPLOAD_TO_BIG"]="Filen ??r f??r stor att ladda upp!! G??r den mindre";
$language["IMAGE_WAS"]="Bild storlek";
$language["MOVE_IMAGE_TO"]="Kunde inte flytta bild till";
$language["CHECK_FOLDERS_PERM"]="V??nligen kontrollera mapp r??ttigher och prova igen.";
$language["ILEGAL_UPLOAD"]="F??rbjuden Uppladning!! Detta ??r ingen bild<br>Klicka bak??t ock brova igen";
$language["IMAGE"]="Bild";
$language["SCREEN"]="Screenshots";

$language["AFR_PM_1"] = "F??r en tid sedan laddade du ner";
$language["AFR_PM_2"] = "Den saknar nu seedare och";
$language["AFR_PM_3"] = "Vill g??rna ladda ner den har du filerna kvar f??r du g??rna hoppa in som seedare.".'\n\n'."Tack".'\n\n'."[color=red][b]Detta ??r et automatiskt meddelande v??nligen svara inte p?? det[/b][/color]".'\n';
$language["AFR_PM_SUBJ"] = "??ter seed ??nskas";
$language["AFR_INFO_1"] = "??ter seed ??nskad";
$language["AFR_INFO_2"] = "Ett PM har skickats till alla som har laddat ner denna.";
$language["AFR_ERR_1"] = "??ter seed Fel";
$language["AFR_ERR_2"] = "N??gon har redan beg??rt ??ter seed av denna torrent de senaste 5 dagarna.";
$language["AFR_RESEED"] = "??nska en ??ter seed";

$language['AUTORANK_STATE']='Auto Klass State';
$language['AUTORANK_POSITION']='Auto Klass Position';
$language['AUTORANK_MIN_UPLOAD']='Auto Klass (Upp/ner)laddat utl??sare ';
$language['AUTORANK_IN_BYTES']=' (i bytes)';
$language['AUTORANK_MIN_RATIO']='AutoKlass Ratio Utl??sare';
$language['AUTORANK_SMF_MIRROR']='SMF Forums Klass Spegling';
$language['AUTORANK_IPB_MIRROR']='IPB Forums Klass Spegling';
$language['AUTORANK_SMF_LIST']='<b><u>Nuvarande SMF Klass Lista fr??n databasen</u></b><br />';
$language['AUTORANK_IPB_LIST']='<b><u>Nuvarande IPB klass Lista fr??n databasen</u></b><br />';

$language['AUTORANK_PM_DEMOTE_SUBJ']='Du har blivit nergraderad';
$language['AUTORANK_PM_PROMOTE_SUBJ']='Du har blivit uppgraderad';

$language['AUTORANK_PM_GREET']='Hej';

$language['AUTORANK_PM_DEMOTE_1']='Som ett resultat av att dina tracker stats sjunkit har du blivit degraderad fr??n';
$language['AUTORANK_PM_DEMOTE_2']='till klass';
/* If you want to add some kind of "get your act together" type message, you can add it below. */
$language['AUTORANK_PM_DEMOTE_3']='V??nligen f??rs??k ??ka din status igen';

$language['AUTORANK_PM_PROMOTE_1']='Som ett resultat av att dina tracker stats ??kat har du blivit uppgraderad ';
$language['AUTORANK_PM_PROMOTE_2']='till klass';
/* If you want to add some kind of "congratulations, keep it up" type message, you can add it below. */
$language['AUTORANK_PM_PROMOTE_3']='Grattis bra jobbat';

// Report users & Torrents by DiemThuy -->
$language["REP_ALLUSERS"] = "Skapa anm??lan";
$language["REP_ADMIN"]="Anm??lda Anv??ndare & Torrent Administration";
$language["REP_SUC_REP"] = "Anm??lan Lyckades";
$language["REP_STAFF_WILL_CHECK"] = "N??gon ur staff kommer titta p?? problemet s?? snart som m??jligt";
$language["REP_ALR_REP"] = "Du har redan anm??lt";
$language["REP_ERR"] = "Anm??lnings Fel";
$language["REP_INV_ID"] = "Felaktigt anv??ndar ID";
$language["REP_NO_STAFF"] = "Kan inte anm??la Staff";
$language["REP_NOT_SELF"] = "Kan inte anm??la dig sj??lv";
$language["REP_USER"] = "Anm??l Anv??ndare";
$language["REP_TORR"] = "Anm??l Torrent";
$language["REP_CONF_1"] = "Vill du verkligen anm??la";
$language["REP_CONF_2"] = "V??nligen notera anv??nd inte <b>detta</b> F??r att anm??la Hit n Run, Trackern har eget system f??r det<br /><br /><b>Orsak</b>";
$language["REP_CONF_3"] = "Orsak";
$language["REP_INV_TORR"] = "Ogiltigt Torrent ID";
$language["REP_NEED_REASON"] = "Du m??ste ange orsak f??r denna anm??lan";
$language['REP_BY'] = 'Anm??ld av';
$language['REP_REPORTING'] = 'Anm??ler';
$language['REP_TYPE'] = 'Typ';
$language['REP_REASON'] = 'Orsak';
$language['REP_DEALT_WITH'] = 'Avklarad';
$language['REP_MARK'] = 'Markera som avklarad';
$language['REP_REPORTS'] = 'Anm??lningar';
// <-- Report users & Torrents by DiemThuy
$language['BOOT_EXP'] = 'Din tids ban ??r slut!';
$language['BOOT_EXP_MSG'] = 'Du ??r inte l??ngre bannad, V??nligen g??r inte om samma misstag igen!';
$language['BOOT_GIVE'] = 'Du ??r bannad!';
$language['BOOT_GIVE_REA'] = 'Orsaken till ban ??r:';
$language['BOOT_GIVE_WHO'] = 'Av:';
$language['BOOT_GIVE_EXP'] = 'Avslutas den';
$language['BOOT_RM_SUB'] = 'Din ban ??r h??vd!';
$language['BOOT_RM_MSG'] = 'Din ban ??r nu h??vd!';
$language['BOOT_DISABLED'] = 'Anv??ndare avaktiverad!';
$language['BD'] = 'Ban Data';
$language['RFB'] = 'Orsak till Ban';
$language['ET'] = 'Ban avslutas';
$language['AB'] = 'Tillagd av';
$language["RB"] = "Ta bort Ban";
$language["BS"] = "Ban Inst??llningar";
$language["AM"] = "Admin Meny";
$language["BT"] = "Ban Tid";
$language["BM"] = "Ban Motivering";

$language["IMDB_UL_FORM"] = "&nbsp;(optional)&nbsp;<b>tt<b><input type='text' name='imdb' size='10' maxlength='200' />&nbsp; siffror efter tt i l??nken.";
$language["IMDB_EDIT_FORM"] = "Siffrorna efter tt i l??nken.";
$language["IMDB_NOT_ADDED"] = "Inget IMDB ID tillagt..";
$language["IMDB_RESIZE_ERR"] = "Storleks ??ndring av f??nstret fungerar inte utan Javascript.<br />V??nligen aktivera Javascript eller se informationen i nytt f??nster";
$language["IMDB_EXTRA"] = "IMDB Extra";
$language["IMDB_MORE_INFO"] = "Mer Info";
$language["IMDB_COVER"] = "Omslag";
$language["IMDB_NO_PHOTO"] = "Ingen bild finns";
$language["IMDB_LANGUAGES"] = "Spr??k";
$language["IMDB_GENRE"] = "Genre";
$language["IMDB_ALL_GENRES"] = "Alla Genre";
$language["IMDB_RATING"] = "Rating";
$language["IMDB_VOTES"] = "R??ster";
$language["IMDB_TAGLINE"] = "Rubrik";
$language["IMDB_PLOT_OUTLINE"] = "Plot Outline";
$language["IMDB_PLOT"] = "Plot";
$language["IMDB_TAGLINES"] = "Taglines";
$language["IMDB_YEAR"] = "??r";
$language["IMDB_RUNTIME"] = "L??ngd";
$language["IMDB_MINUTES"] = "minuter";
$language["IMDB_CACHE_CON"] = "IMDB Cache Inneh??ll";
$language["IMDB_MOV_DET"] = "Film Detaljer";
$language["IMDB_PAGE"] = "IMDB page";
$language["IMDB_NO_PHOTO"] = "Ingen bild finns";
$language["IMDB_AKA"] = "??ven k??nd som";
$language["IMDB_SEASONS"] = "S??songer";
$language["IMDB_AGE_CLASS"] = "??lders rekomendation";
$language["IMDB_COUNTRY"] = "Land";
$language["IMDB_COLORS"] = "F??rger";
$language["IMDB_SOUND"] = "Ljud";
$language["IMDB_DIRECTOR"] = "Director";
$language["IMDB_WRITING_BY"] = "Skriven av";
$language["IMDB_WRITER"] = "F??rfattare";
$language["IMDB_ROLE"] = "Roll";
$language["IMDB_PRODUCED_BY"] = "Producerad av";
$language["IMDB_PRODUCER"] = "Producent";
$language["IMDB_MUSIC"] = "Musik";
$language["IMDB_MUSICIAN"] = "Musiker";
$language["IMDB_ACTOR"] = "Sk??despelare";
$language["IMDB_CAST"] = "Rollbes??ttning";
$language["IMDB_PLOT_OUTLINE"] = "Plot Outline";
$language["IMDB_PLOT"] = "Plot";
$language["IMDB_EPISODE"] = "Avsnitt";
$language["IMDB_EPISODES"] = "Avsnitt";
$language["IMDB_SEASON"] = "S??song";
$language["IMDB_ORIG_AIR_DATE"] = "Original S??ndnings datum";
$language["IMDB_USER_COMMENTS"] = "Anv??ndar Kommentarer";
$language["IMDB_MOVIE_QUOTES"] = "Movie Quotes";
$language["IMDB_TRAILERS"] = "Trailers";
$language["IMDB_CR_CRED"] = "Crazy Credits";
$language["IMDB_CR_CRED_1"] = "We know about";
$language["IMDB_CR_CRED_2"] = "One of them reads";
$language["IMDB_GOOFS"] = "Goofs";
$language["IMDB_GOOFS_1"] = "Here comes one of them";
$language["IMDB_TRIVIA"] = "Trivia";
$language["IMDB_TRIVIA_1"] = "There are";
$language["IMDB_TRIVIA_2"] = "entries in the trivia list - like these";
$language["IMDB_TRIVIA_3"] = "trivia records. Some examples";
$language["IMDB_SOUNDTRACKS"] = "Soundtracks";
$language["IMDB_SOUNDTRACK"] = "Soundtrack";
$language["IMDB_SOUNDTRACKS_1"] = "soundtracks listed - like these";
$language["IMDB_CREDIT"] = "Credit";
$language["IMDB_CAUSE"] = "Cause";
$language["IMDB_BIRTH_NAME"] = "F??delse namn";
$language["IMDB_NICKNAMES"] = "Nicknamn";
$language["IMDB_BODY_HEIGHT"] = "Body Height";
$language["IMDB_SPOUSES"] = "Spouse(s)";
$language["IMDB_SPOUSE"] = "Spouse";
$language["IMDB_PERIOD"] = "Period";
$language["IMDB_COMMENT"] = "Comment";
$language["IMDB_KIDS"] = "Kids";
$language["IMDB_MINI_BIO"] = "Mini Bio";
$language["IMDB_TM"] = "Trademarks";
$language["IMDB_SALARY"] = "Salary";
$language["IMDB_MOVIE"] = "Film";
$language["IMDB_CHAR"] = "Karakt??r";
$language["IMDB_PUBL"] = "Publikationer";
$language["IMDB_AUTHOR"] = "Author";
$language["IMDB_TITLE"] = "Titel";
$language["IMDB_ISBN"] = "ISBN";
$language["IMDB_BIO_MOVIES"] = "Biograf filmer";
$language["IMDB_INTERVIEW"] = "Intervjuer";
$language["IMDB_INTERVIEWS"] = "Intervjuer";
$language["IMDB_DETAILS"] = "Detaljer";
$language["IMDB_PERF_SEARCH"] = "Genomf??r IMDB s??k f??r";
$language["IMDB_NAME"] = "Namn";
$language["IMDB_SCAN"] = "S??ker av IMDB...";
$language["IMDB_SEARCH"] = "Imdb";
$language["IMDB_VIEW"]="Se p?? IMDB";
$language["IMDB_GENRE"]="Genre";

//RULES
$language["RULES_SORT"]="Regel num(sort)";
$language["RULES"]="Regler";
$language["RULE"]="Regel";
$language["RULE_ALL"]="Alla regler";
$language["MNU_RULES"]="Regler";
$language["RULES_ADD"]="Ange regel";


// Seedbox
$language["SB_HS_TORRENT"] = "f??r snabb torrent";
$language["SB_SEEDBOX"] = "Seedbox";
$language["SB_SS_SETTINGS"] = "Visa Seedbox Inst??llningar";
$language["SB_MITU"] = "Min ID at anv??nda";
// Seedbox

$language["ANN_NEW_USER"] = "[color=red]V??lkommen[/color] till senaste medlemmen:";
$language["ANN_NEW_TORR"] = "[color=red]NY UPPLADDNING[/color]:";
$language["ANN_ADDED_BY"] = "[color=red]TILLAGD AV[/color]:";

$language["DOB"]="F??delse datum";
$language["STICKY_TORRENT"]="<b>Klistrad</b>";
$language["STICKY_TORRENT_EXPLAIN"]="(Altid h??gst upp p?? torrent lista)";


// Helpdesk
$language["HELPDESK"]="Hj??lpKonsol";
$language["HD_WEEK"]="vecka";
$language["HD_WEEKS"]="veckor";
$language["HD_DAY"]="dag";
$language["HD_DAYS"]="dagar";
$language["HD_HOUR"]="timme";
$language["HD_HOURS"]="timmar";
$language["HD_MIN"]="minut";
$language["HD_MINS"]="minuter";
$language["HD_SORRY"]="Tyv??rr";
$language["HD_NOT_AUTHORIZED"]="Du f??r inte se detta.";
$language["HD_RTF"]="L??s FAQ";
$language["HD_RTF2"]="L??s [b]FAQ[/b] Innan du b??rjar fr??ga!";
$language["HD_STF"]="S??k i forumet";
$language["HD_STF2"]="V??nligen s??k i [b]FORUMET[/b].";
$language["HD_DN"]="??r du n00b";
$language["HD_DN2"]="??r du n00b! min farmor kan detta!";
$language["HD_ON"]="p??";
$language["HD_PROBLEM"]="Problemet";
$language["HD_SOLVED"]="L??st";
$language["HD_ANSWER"]="Svar";
$language["HD_IGNORED"]="Ignorerat";
$language["HD_BB"]="<b>BB tags</b> ??r <b>till??tet</b>";
$language["HD_IGNORE"]="IGNORERA";
$language["HD_ADDED"]="Tillagd";
$language["HD_ADDEDBY"]="Tillagd av";
$language["HD_SOLVEDBY"]="L??st - av";
$language["HD_SOLVEDIN"]="L??st P??";
$language["HD_DELPROB"]="Ta bort l??sta och ingnorerade problem";
$language["HD_S_FAST"]="L??st snabbt";
$language["HD_S_INTIME"]="L??st i tid";
$language["HD_S_LATE"]="L??st f??r sent";
$language["HD_S_REPLIES"]="Standard Svar";
$language["HD_USE"]="Anv??nd";
$language["HD_MSG1"]="[color=red][b]Fr??n $SITENAME Hj??lp konsol [/b][/color]";
$language["HD_MSG2"]="h??lsningar";
$language["HD_MSG3"]="staff medlemm";
$language["HD_HELP_DESK"]="Hj??lp Konsol";
$language["HD_MSG_SENT"]="Meddelandet skickat! V??nligen inv??nta svar.";
$language["HD_WELCOME_1"]="V??lkommen staff medelemm";
$language["HD_WELCOME_2"]="det finns";
$language["HD_WELCOME_3"]="Obesvarade fr??gor som v??ntar";
$language["HD_WELCOME_MSG"]="H??r kan du beskriva dina problem men innan du anv??nder <b>Hj??lp Konsolen</b> titta s?? inte ditt problem redan ??r l??st i <a href=index.php?page=forum><b>Forumet</b></a> f??rst.";
$language["HD_HELPME"]="Hj??lp mig!";
// Helpdesk


// Torrent Request
$language['RF']='Fyllda requester';
$language['VR']='Requester';
$language['R']='L??gg till request';
$language['VV']='Se r??ster';
$language['RD']='Requestdetaljer';
$language['RE']='??ndra request';
$language['TJ']='Ta jobb';
$language['RS']='??terst??ll';
$language['FTJ']='fyllt jobbet!';
$language['OTJ']='??r under arbete!';
$language['RDT']='Datum:';
$language['RTT']='Tack';
$language['RFU']='Fylld URL';
$language['R_EMPTY_HASH']='Info hash inte uppfylld!';
$language['R_EMPTY_URL']='Skriv torrentens hela direktURL dvs. http://www.mysite.com/index.php?page=torrent-details&id=813.. (Det g??r bara att kopiera och klistra fr??n ett annat f??nster) eller ??ndra befintliga  URL-n till torrentID';
$language['R_HASH_INFO']=''.$BASEURL.'/index.php?page=torrent-details&id=<font color=red>5bdf70f0ec21084be7edc0754157e5058441cebf</font>';
$language["TRAV_AV_REQ"] = "Tillg??ngliga requester f??r";
$language["TRAV_POS_REQ"] = "Postade Requester";
$language["TRAV_REM"] = "??terst??ende";
$language["TRAV_IYFAR"] = "Om du fyller en request, f??r du";
$language["TRAV_ANR"] = "L??gg till ny request";
$language["TRAV_VMR"] = "Se mina requester";
$language["TRAV_HFR"] = "D??lj fyllda requester";
$language["TRAV_SEEDB_P"] = "seedbonuspo??ng";
$language["TRAV_SORTBY"] = "Sortera med";
$language["TRAV_NAME"] = "Namn";
$language["TRAV_VOTES"] = "R??ster";
$language["TRAV_TYPE"] = "Skriv";
$language["TRAV_DATE_A"] = "Datum tillagt";
$language["TRAV_ADDEDBY"] = "Tillagd av";
$language["TRAV_FILLED"] = "Fylld";
$language["TRAV_FILLEDBY"] = "Fylld av";
$language["TRAV_DISPLAY"] = "Visa";
$language["TRAV_SEARCH"] = "S??k";
$language["TRAV_GO"] = "K??r";
$language["TRAV_NOBODY"] = "ingen";
$language["TRAV_OFF_MESS"] = "Offlinemeddelande";
$language["TRAV_REQ_OFF"] = "Requestsektionen ??r offline just nu";
$language["TRAV_ALREADY_VOTED"] = "<p>Du har redan r??stat p?? denna request, Det ??r bara till??tet att r??sta en g??ng per </p><p>Tillbaka till <a href=index.php?page=viewrequests><b>se requester</b></a></p>";
$language["TRAV_SUC_VOTED"] = "R??stningen lyckades";
$language["TRAV_SUC_VOTED_1"] = "R??stningen p?? requesten lyckades";
$language["TRAV_SUC_VOTED_2"] = "Tillbaka till <a href=index.php?page=viewrequests><b>Se requester</b></a>";
$language["TRAV_REQUEST"] = "Request";
$language["TRAV_EDIT"] = "??ndra";
$language["TRAV_INFO"] = "Info";
$language["TRAV_ADDED"] = "Tillagd";
$language["TRAV_REQBY"] = "Requestad av";
$language["TRAV_VOTE_FT"] = "R??sta p?? den h??r";
$language["TRAV_HTFAR"] = "Hur man fyller en request";
$language["TRAV_HTFAR_1"] = "Skriv <b>full</b> direkt torrentURL, dvs. http://www.mysite.com/index.php?page=torrent-details&id=813.. (Det g??r bara att kopiera och klistra fr??n ett annat f??nster) eller ??ndra befintliga  URL-n till torrentID...";
$language["TRAV_VOTE"] = "R??sta";
$language["TRAV_TDTUH"] = "SKRIV-DIREKT-TORRENT-URL-H??R";
$language["TRAV_SEND"] = "Skicka";
$language["TRAV_ED_REQ"] = "??ndra Request";
$language["TRAV_CATEG"] = "Kategori";
$language["TRAV_DESC"] = "Beskrivning";
$language["TRAV_TORR_FILE"] = "Torrentfil";
$language["TRAV_DESC2"] = "description";
$language["TRAV_EDIT"] = "??ndra";
$language["TRAV_SUBMIT"] = "L??mna";
$language["TRAV_NOTAUTH"] = "Antingen ??r du inte auktoriserad, eller ocks?? ??r det en bugg,var sn??ll och rapportera det till staffen!";
$language["TRAV_WAS_FB"] = "fylldes av";
$language["TRAV_TORR_DL1"] = "Torrenten kan laddas ner fr??n denna l??nk";
$language["TRAV_TORR_DL2"] = "Gl??m inte att tacka uppladdaren."."\n\n"."Om, av n??gon anledning, det inte ??r vad du ??nskade, ??terst??ll det genom att klicka";
$language["TRAV_TORR_DL3"] = "Klicka[b]INTE[/b] p?? l??nken om du inte ??r helt s??ker att du vill ??terst??lla requesten.";
$language["TRAV_HERE"] = "H??R!";
$language["TRAV_REQFILLED"] = "Din torrentrequest har fyllts!";
$language["TRAV_HNBSF_1"] = "har framg??ngsrikt fyllts h??r";
$language["TRAV_HNBSF_2"] = "Anv??ndare";
$language["TRAV_HNBSF_3"] = "har mottagit ett PM om denna uppladdning.<br /><br /><b>??r detta ett olycksfall?</b><br /><br />Inget bekymmer, men sn??lla";
$language["TRAV_HNBSF_4"] = "<b>KLICKA H??R</b></a> f??r att ??terst??lla denna request.<br /><b>Varning</b> Klicka inte h??r om du inte ??r helt s??ker att du ??terst??lla denna request!";
$language["TRAV_THANKS"] = "<br /><br />Tack f??r att du lade upp denna request :)<br /><br />G?? tillbaka till<a href=index.php?page=viewrequests><b>Se request</b></a>";
$language["TRAV_SUC_RESET"] = "??terst??llningen lyckades";
$language["TRAV_CANNOT"] = "g??r inte att ??terst??lla en icke-lagd request";
$language["TRAV_TOP5"] = "Topp 5 Requester";
$language["TRAV_CAT"] = "Kat";
$language["TRAV_REQBY2"] = "Request av";
$language["TRAV_REQDET"] = "Requestdetaljer";
$language["TRAV_REQNAME"] = "Requestnamn";
$language["TRAV_NOADD1"] = "Tyv??rr ??r din rang";
$language["TRAV_NOADD2"] = "??r inte till??tet att posta requester";
$language["TRAV_SEARCHFIRST"] = "Innan du l??gger en request, g??r en s??kning om den redan finns";
$language["TRAV_IN"] = "i";
$language["TRAV_ALL"] = "alla";
$language["TRAV_INCDEAD"] = "Inklusive d??da torrenter";
$language["TRAV_SEARCH"] = "S??k";
$language["TRAV_ADDNEW"] = "L??gg till en ny request";
$language["TRAV_SELCAT"] = "V??lj kategori";
$language["TRAV_MUSTSELECTONE"] = "Du m??ste v??lja ??tminstone en request att ta bort.";
$language["TRAV_REQDELETED"] = "Requesten borttagen";
$language["TRAV_GOBACK"] = "G?? tillbaka till<a href=index.php?page=viewrequests><b>Requests</b></a>";
$language["TRAV_NOAUTH"] = "Ej auktoriserad";
$language["TRAV_NOTALLOWED"] = "Ej till??tet";
$language["TRAV_REACHEDMAX"] = "Du har tyv??rr redan n??tt maximalt antal Requester";
$language["TRAV_MUSTADDTITLE"] = "Du m??ste l??gga till en titel!";
$language["TRAV_MUSTCHOOSECAT"] = "Du m??ste v??lja en kategori!";
$language["TRAV_MUSTADDDESC"] = "Du m??ste l??gga till en beskrivning!";
$language["TRAV_NEWREQUEST"] = "Ny Request";
$language["TRAV_WATTRS"] = "lades till i Requestsektionen";
$language["TRAV_VOTEFORTHIS"] = "R??sta p?? denna";
$language["TRAV_NOWTFOUND"] = "Inget hittades";
$language["TRAV_AGO"] = "sedan";
$language["DOH_URL"]="Skriv in hela direktl??nken till torrenten, dvs. ".$BASEURL."/index.php?page=torrent-details&id=813.. (Det g??r bara att kopiera och klistra fr??n ett annat f??nster) eller ??ndra befintliga  URL-n till torrentID!"; 
// Torrent Request



$language["NOT_USER_CLASS"]="<h2>Tyv??rr</h2><p>Du m??ste vara registrerad f??r att kunna k??pa biljetter.</p>";
$language["CANNOT_SELL_CLOSED"]="Tyv??rr kan jag inte s??lja n??gon biljett till dig. Lotteriet ??r st??ngt!";
$language["LOTTERY"]="Lotteri";
$language["LOTT_LIMIT_PURCHASE"]="H??gsta antalet biljetter du kan f??rv??rva ??r";
$language["LOTT_LIMIT_BUY"]="H??gsta antalet biljetter du kan k??pa ??r";
$language["LOTTERY_PM_SUBJECT"]="Du har vunnit ett pris i lotteriet";
$language["LOTTERY_PM_MESSAGE"]="Gratulerar, du har vunnit ett pris i v?? lotteri. Priset har lagts till ditt konto.";
$language['RESET_PID'] = '??terst??ll PID';

$language["SB_BANNED"] = "<br /><center><img src='images/denied.gif'><br />Du ??r tyv??rr avst??ngd fr??n att anv??nda ShoutBoxen!<br />Du m??ste fr??ga n??gon i staffen";


$language["LED_WELCOME"] = '** V??lkommen **';
$language["LED_TO"] = '++ Till ++';
$language["LED_UPLOADED"] = 'Du har laddat upp';
$language["LED_ERR"] = 'Om du anv??nder en Javast??dd webbl??sare, borde du se en r??rlig text som ser ut s?? h??r:';
$language["LED_ACT_TOR"] = 'Activa torrenter';
$language["LED_LAST_VISIT"] = 'Senaste bes??k';
$language["LED_CURRTIME"] = 'Aktuell tid ??r';
$language["LED_TODAYIS"] = 'Idag ??r det';

$language["GRAB_YDT"] = "Dina nerladdade torrenter";
$language["GRAB_AL_DOWN"] = "Redan nerladdad!!";
$language["GRAB_STILL_ACTIVE"] = "fortfarande aktiv";
$language["GRAB_NOT_ACTIVE"] = "ej aktiv";

$language['TORRENT_OPTIONS']='S??k i';
$language['FIL']='Filnamn';
$language['FILDES']='Fil & Beskr';
$language['DES']='Beskrivning';
$language['SUBC']='Sub Cat.';

# Language definitions added by TreetopClimber.
$language['EXTRA']='extra';
$language['DROPDOWN']='rullgardin';
$language['TORRENT_MENU']='Meny';
$language['USER_MENU']='Anv??ndarmeny';
$language['ADMIN_ACCESS']='Admin??tkomst';
$language['STAFF_ACCESS']='Staff';
$language['UPLOAD_LINK']='Torrentuppladdning';
$language['ADAREA']='annons';
# End

// Sport Betting - Start
$language["SB_BETTING"] = "Betting";
$language["SB_SITE_BETTING"] = "Site Betting";
$language["SB_NO_BETS_ATM"] = "Inga insatser f??r n??rvarande";
$language["SB_CURR_BETS"] = "Nuvarande spel";
$language["SB_BET_ADMIN"] = "Speladmin";
$language["SB_WAGERS"] = "Satsningar";
$language["SB_TL"] = "Topplista";
$language["SB_INFO"] = "Info";
$language["SB_BET"] = "Insats";
$language["SB_CHECK_LATER"] = "<i>Tyv??rr finns inga aktiva spel just nu. ??terkom senare! :)</i>";
$language["SB_TGCTNO"] = "Detta Spel St??nger F??r Nya Satsningar:";
$language["SB_TIME_LEFT"] = "Kvarvarande Tid";
$language["SB_MINUTES"] = "Minuter";
$language["SB_ACC_DEN"] = "Tilltr??de nekat!!";
$language["SB_SILLY_RABBIT"] = "Dumsp??n";
$language["SB_NO_OPT"] = "Ta ??tminstone ett alternativ ditt pucko!";
$language["SB_ADMIN"] = "Admin";
$language["SB_BET_INFO"] = "Spelinfo";
$language["SB_END_BETS"] = "Spelet avslutas";
$language["SB_BET_TITLE"] = "Sastningsrubrik";
$language["SB_BETTING_ON"] = "Spelar p??";
$language["SB_ENTER_WAGER"] = "L??gg din insats h??r";
$language["SB_ENDTIME"] = "Stopptid";
$language["SB_MINS"] = "minuter";
$language["SB_HOUR"] = "timme";
$language["SB_HOURS"] = "timmar";
$language["SB_DAY"] = "dag";
$language["SB_DAYS"] = "dagar";
$language["SB_WEEK"] = "vecka";
$language["SB_WEEKS"] = "veckor";
$language["SB_ORDERING"] = "Best??llning";
$language["SB_BY_ID"] = "med ID";
$language["SB_BY_ODDS"] = "Med oddset";
$language["SB_SUBMIT"] = "L??mna";
$language["SB_CREATOR"] = "Skapare";
$language["SB_SET_ACTIVE"] = "S??tt aktiv";
$language["SB_ADD_OPTIONS"] = "L??gg till alternativ";
$language["SB_GAMES"] = "Spel";
$language["SB_TOP_LIST"] = "Topplista";
$language["SB_POINTS"] = "Po??ng";
$language["SB_WINNER"] = "Vinnare";
$language["SB_LOSER"] = "F??rlorare";
$language["SB_POSITION"] = "Position";
$language["SB_SORRY"] = "Tyv??rr";
$language["SB_NO_ACCESS"] = "Du har inte tillst??nd att se denna sida.";
$language["SB_NO_ACT_GAMES"] = "Du har inga aktiva spel.";
$language["SB_BET_OPT"] = "Valm??jligheter";
$language["SB_ODDS"] = "Odds";
$language["SB_POY_PAY"] = "Potentiell utbetalning";
$language["SB_AMOUNT_WAGERED"] = "Summa satsat";
$language["SB_CANT_DEL_1"] = "Det g??r inte att ta bort ett spel som man redan satsat p??.";
$language["SB_CANT_DEL_2"] = "Klicka h??r";
$language["SB_CANT_DEL_3"] = "att ta bort spelet och ??terbetala insatser som redan ??r gjorda.";
$language["SB_CANT_DEL_4"] = "Du f??rs??ker ta bort ett alternativ som man redan satsat p??. Du m??ste";
$language["SB_CANT_DEL_5"] = "N??r du gjort detta kan du ??terskapa spelet med nya alternativ.";
$language["SB_ADD_BETS"] = "Fler satsningar";
$language["SB_WARNING"] = "! Varning !";
$language["SB_CLICK_TO_PAY"] = "Klicka p?? det vinnande valet f??r att betala vinnarna!";
$language["SB_BET_RES"] = "Vadslagningsresultat";
$language["SB_NO_POST"] = "Ingen post hittad";
$language["SB_BET_WIN"] = "Satsning vinner!";
$language["SB_BET_PROFIT"] = "Vadslagningsvinst +";
$language["SB_PM_MESS_1"] = "Du har just erh??llit";
$language["SB_PM_MESS_2"] = "Bonuspo??ng i insats!"."\n"."Du spelade";
$language["SB_PM_MESS_3"] = "po??ng p??";
$language["SB_PM_MESS_4"] = "Alternativ";
$language["SB_PM_MESS_5"] = "vilket gav";
$language["SB_PM_MESS_6"] = "g??nger insatsen!"."\n\n";
$language["SB_PM_MESS_7"] = "\n\n"."F??r att se hela resultatet av vadslagningen, f??lj denna l??nk:"."\n\n";
$language["SB_FOR_MESS_1"] = "Antal vad som satsats i spelet";
$language["SB_FOR_MESS_2"] = "Totalt bonuspo??ng i oms??ttning i spelet";
$language["SB_FOR_MESS_3"] = "Vinstval";
$language["SB_FOR_MESS_4"] = "Spelet avslutades av";
$language["SB_FOR_MESS_5"] = "Valm??jligheter och odds";
$language["SB_FOR_MESS_6"] = "Topp 20 vinnare";
$language["SB_FOR_MESS_7"] = "Bonuspo??ng";
$language["SB_FOR_MESS_8"] = "till";
$language["SB_FOR_MESS_9"] = "vem satsade";
$language["SB_FOR_MESS_10"] = "Topp 20 f??rlorare";
$language["SB_PM_MESS2_1"] = "Tyv??rr visade det sig att din insats i";
$language["SB_PM_MESS2_2"] = "gav ingen utdelning!"."\n"."B??ttre lycka n??sta g??ng!"."\n\n";
$language["SB_BET_LOSS"] = "Vadf??rlust!";
$language["SB_CREATE_BETS"] = "Skapa vad";
$language["SB_BONUS"] = "Bonus";
$language["SB_BETINF"] = "Vadslagningsinformation!";
$language["SB_BETINF_MSG"] = "Site-Bet ??r ett odds/vadslagningssystem som liknar andra vadslagningssidor p?? webben.<br />Om du ??r obekant med vadslagningssystemet s?? ??r det ??nd?? l??tt att f??rst??.<br /><br /><li>P?? Site-Bet anv??nder du bara din po??ng du f??tt som seedbonus.</li><li>N??r du satsar po??ng p?? resultat, kommer du f?? de po??ng du satsat multiplicerat med oddset f??r ditt val.</li><li>Din satsning ??r bindande och kan ej ??ngras.</li><li>Oddsen varierar.</li><li>Oddset och den vinstsumma som betalas ut kan ??kas eller minskas n??r du gjort din satsning.</li><br />Det ??r resultatet efter full tid som r??knas, s?? vad v??ntar du p??? Satsa nu!<br /><br /><b>Banken beh??ller 3% av vinstsumman s?? det inte g??r inflation i bonuspo??ng.</b>";
$language["SB_BAD_ID"] = "Inget spel med s??dant ID.";
$language["SB_NO_BON_LOG"] = "Ingen bonuslogg med liknande meddelande.";
$language["SB_OP_LOG_1"] = "Antalet operationer och bonusloggar matchar inte.";
$language["SB_OP_LOG_2"] = "vs."; // Short for versus
$language["SB_OP_LOG_3"] = "Fan ocks??...";
$language["SB_OP_LOG_4"] = "G??r det i alla fall";
$language["SB_RET_POINTS_1"] = "Du har f??tt tillbaka";
$language["SB_RET_POINTS_2"] = "Po??ng du satsat";
$language["SB_RET_POINTS_3"] = "P?? grund av fel i oavslutade/ospelade matcher ??terst??lldes det.";
$language["SB_BET_REBATE"] = "Satsningsrabatt";
$language["SB_BBAS"] = "Betbonus i potten";
$language["SB_SOFTBET"] = "Softbet";
$language["SB_MY_GAMES"] = "Mina spel";
$language["SB_AMOUNT"] = "Summa";
$language["SB_CANT_UNDO"] = "Observera att du inte kan ??ngra detta";
$language["SB_NOT_ENOUGH_POINTS"] = "Du har inte tillr??ckligt med bonuspo??ng!";
$language["SB_BET_TOO_LOW"] = "Du f??r inte satsa noll eller mindre!";
$language["SB_MAX_BET_1"] = "Maximalt bet ??r";
$language["SB_MAX_BET_2"] = "bonuspo??ng!";
$language["SB_ALREADY_BET"] = "Du har redan satsat i det h??r spelet!";
$language["SB_ADD_OPT_TO_BET"] = "L??gg till valm??jligheter till din satsning!";
$language["SB_OPT_TXT"] = "Tillvalstext";
$language["SB_ADD_TO_GAME"] = "L??gg till i spelet";
$language["SB_ADD_1X2"] = "L??gg till 1, X, 2";
$language["SB_SAVE_CHANGES"] = "Spara ??ndringar";
$language["SB_CLICK"] = "Klicka";
$language["SB_HERE"] = "H??r";
$language["SB_DEL_GAME"] = "f??r att ta bort spelet.";
$language["SB_DEL_AND_REPAY"] = "f??r att ta bort spelet och ??terbetala po??ng till alla.";
$language["SB_SHOUT_1"] = "[color=red]Nytt vad[/color]";
$language["SB_SHOUT_2"] = " - Sluttid: ";
$language["SB_SHOUT_3"] = "G?? till vadslagning";
$language["SB_OPTIONS"] = "Tillval";
// Sport Betting - End

// Torrents Limit
$language["TORRENTS_LIMIT"] = "Torrentgr??ns";
$language["ENTER_NEG"] = "L??gg in ett negativt v??rde, t.ex <b><span style='color:#0000FF'>-1</span></b> f??r att ??terg?? till standard f??r rangen";

// Enhanced Waiting Time
$language["WAITING_TIME"] = "V??ntetid (timmar)";

// Auto Duplicate Torrent Checker
$language["TOP_MATCHES"] = "Dessa ??r de b??st j??mf??rbara i v??r databas baserat p?? torrentnamn, kontrollera att du inte l??gger  upp en dublett innan du forts??tter.";

// Whois
$language["WHOIS"] = "Whois";

// Ban Button
$language["ERR_REG_IP_BANNED"] = "Registreringar fr??n din IP-adress ??r f??r n??rvarande bannade p?? grund av missbruk, tyv??rr!";
$language["DTBAN"]="IP Ban";

// Torrent Nuked/Requested
$language["TNR_REL_REQ"]="Denna release ??r requestad.";
$language["TNR_REQUESTED"]="Requested";
$language["TNR_NUKED"]="Nuked";

// Torrent moderation
$language["TMOD_APR1"] = "din torrent";
$language["TMOD_APR2"] = "??r godk??nd!";
$language["TMOD_APR3"] = "\n\n"."[color=red][b]Detta ??r ett automatiskt meddelande, svara inte.[/b][/color]";
$language["TMOD_SOR1"] = "Tyv??rr";
$language["TMOD_SOR2"] = "men";
$language["TMOD_SOR3"] = "har f??rkastats av f??ljande sk??l";
$language["TMOD_SOR4"] = "\n\n"."[color=red][b]Detta ??r ett automatiskt meddelande, svara inte.[/b][/color]";
$language["TMOD_SEN1"] = "Ditt meddelande har skickats.";
$language["TMOD_SEN2"] = "Du m??ste ange ett sk??l.";
$language["TMOD_OK"] = "OK";
$language["TMOD_BAD"] = "Bad";
$language["TMOD_UM"] = "Omodifierad";
$language["TMOD_S_MOD"] = "Mod.";
$language["TMOD_S_CAT"] = "Kat.";
$language["TMOD_Dl"] = "Dl";
$language["TMOD_NOTORR"] = "Inga torrenter omodifierade.";
$language["ACP_ADD_WARN"]="Orsak till torrentmodifiering";
$language["WARN_TITLE"]="Ben??mning p?? orsak";
$language["WARN_TEXT"]="F??rklara orsak";
$language["WARN_ADD_REASON"]="L??gg till ny orsak";
$language["TRUSTED"]="S??ker";
$language["TRUSTED_MODERATION"]="S??ker modifiering";
$language["TORRENT_STATUS"]="Torrent status";
$language["TORRENT_MODERATION"]="Modifiering";
$language["MODERATE_TORRENT"] = "Modifiera";
$language["MODERATE_STATUS_OK"] = "Ok";
$language["MODERATE_STATUS_BAD"] = "Bad";
$language["MODERATE_STATUS_UN"] = "Omodifierad";
$language["FRM_CONFIRM_VALIDATE"] = "??terst??ll till omodifierad";
$language["MODERATE_PANEL"] = "Mod Torrent Panel";
$language["TMOD_EDIT_TO_RESEND"] = "<br/>(??ndra f??r att returnera till validering)";
$language["TMOD_APPROVED_BY"] = "Godk??nd Av";
$language["TMOD_REJECTED_BY"] = "Nekad Av";
// Uploader Medals
$language["UM_BRONZE"] = "Bronsmedalj";
$language["UM_SILVER"] = "Silvermedalj";
$language["UM_GOLD"] = "Guldmedalj";
$language["UM_UPL_MED"] = "Uppladdningsmedalj";
$language["UM_MED"] = "Med";
$language["UM_NICK"] = "Nickname";
$language["UM_TOR"] = "Tor";
$language["UM_UP_COUNT_1"] = "Uppladdningsber??kning (senaste";
$language["UM_UP_COUNT_2"] = "dagar)";
$language["UM_NOTHING_TO_SEE"] = "Inget att se h??r!";

// NFO Hack
$language["NFO_NFO"] = "NFO";
$language["NFO_NOT_NFO"] = "Inte en nfo-fil!";
$language["NFO_NOT_VALID"] = "Ogiltig eller f??r liten nfo!";
$language["NFO_CANT_MOVE"] = "Det gick inte att flytta nfo-filen!";
$language["NFO_UNCHECK"] = "<b>Avmarkera</b> ta bort eller ladda upp en ny nfo-fil";
$language["NFO_OPTION"] = "Alternativt v??ljer att leta efter en nfo-fil";
$language["NFO_SHOW_HIDE"] = "Visa | D??lj NFO";

// Teams Hack
$language["TEAMS_TEAM"]="Grupp";

$language['WS_WARNED_USER'] = 'Varnad anv??ndare!';
$language['WS_WARN_REMOVED_SUBJECT'] = 'Din varningstid har l??pt ut!!';
$language['WS_WARN_REMOVED_MESSAGE'] = 'Du ??r inte l??ngre varnad, var f??rsiktig s?? du inte g??r samma misstag igen!!';
$language['WS_WD'] = 'Varningsdata';
$language['WS_RFW'] = 'Sk??l f??r att ??ka varning';
$language['WS_ET'] = 'L??ptid';
$language['WS_WT_PLURAL'] = 'varnad g??nger';
$language['WS_WAB'] = 'Varning tillagd av';
$language['WS_AM'] = 'Admin Meny';
$language['WS_RW'] = 'Ta bort varning';
$language['WS_WS'] = 'Varningsinst??llning';
$language['WS_WT'] = 'Varningstid';
$language['WS_D'] = 'Dag';
$language['WS_W'] = 'Vecka';
$language['WS_W_PLURAL'] = 'Veckor';
$language['WS_Y'] = '??r';
$language['WS_WM'] = 'motiv f??r varning';
$language['WS_WC_SUBJ'] = 'S??nkt varningsniv??';
$language['WS_WC_MSG'] = 'Vi har minskat din varningsniv?? av f??ljande sk??l';
$language['WS_WCF'] = 'Varningen upph??vd d??rf??r att';
$language['WS_WR'] = 'Varningen borttagen';
$language['WS_YHRAW'] = '??kad varningsniv??';
$language['WS_TRFW'] = 'Vi har ??kat din varningsniv?? av f??ljande sk??l';
$language['WS_EDFW'] = 'Varningen utg??r den';
$language['WS_WU'] = 'Varnad anv??ndare';
$language['WS_R'] = 'Orsak';
$language['WS_WARNED_USERS'] = 'Varnade anv??ndare';
$language['WS_WL'] = 'Varningsniv??';
$language['WS_WARN'] = 'Varning';

// More Warn system definitions
$language['WS_SEND_PM'] = "PM anv??ndare";
$language['WS_CANT_WARN'] = "Du kan inte varna dig sj??lv!";
$language["WS_UNK_TYPE"] = "Ok??nd typ!";
$language['WS_SUBMIT'] = "L??mna";
$language['WS_MUST_GIVE_REASON'] = "Du m??ste ange ett sk??l f??r varningen!";
$language['WS_RFRW'] = 'Anledning till att minska varning';
$language["WS_CANT_DEC"] = "Du kan inte minska varningsniv??n ytterligare!";
$language["WS_CANT_INC"] = "Du kan inte ??ka varningsniv??n ytterligare!";
$language["WS_WARN_EXP"] = "Varningen f??rsvinner (dagar)";
$language["WS_BLANK_4_INF"] = "(L??mna tomt f??r permanent varning)";
$language["WS_AUTO_MSG"] = "[b][color=red]Detta ??r ett automatiskt meddelande, var v??nlig svara inte[/color][/b]";
$language["WS_YOUR_CUR_LEV"] = "Nuvarande varningsniv?? ??r";
$language["WS_DEC_IN_DAYS_1"] = "Om du inte f??r fler varningar kommer din varningsniv?? automatiskt minska";
$language["WS_DEC_IN_DAYS_2"] = "dagar.";
$language["WS_WARNLOG"] = "Varningslogg";
$language["WS_NEXT_AUTO_DOWNGRADE"] = "N??sta automatiska nergradering";
$language["WS_WARNED_BY"] = "Varnad av";
$language["WS_NOTES"] = "Anteckningar";
$language["WS_NOTHING_2_C"] = "Inget att se h??r!";
$language["WS_LOGS_4"] = "Sparat varninglogg f??r";
$language["WS_INC_WL"] = "??kad varningsniv??";
$language["WS_DEC_WL"] = "Minskad varningsniv??";
$language['WS_INC'] = "??ka varningsniv??";
$language['WS_DEC'] = "S??nk varningsniv??";
$language["WS_AUTO_REASON"] = "Automatisk varningsniv??minskning";
$language["WS_WARNED_ON"] = "Varnat p??";
$language["WS_REP_ON"] = "Respit p??";
$language["WS_REP_BY"] = "Respit av";
$language["WS_WHY_BOOTED"] = "Automatisk start f??r att ha uppn??tt maximal varningsniv??";

// Circling Last Torrents
$language["CIRC_NEW_REL"] = "Senaste releaser";
$language["CIRC_NO_TORR"] = "F??r n??rvarande inga torrenter...";
$language["CIRC_SEEDERS"] = "Seeders";
$language["CIRC_LEECHERS"] = "Leechers";

//Private Shouts
$language['SHOUTBOXP']='Privat Shouts';

// Block Comments
$language["BC_AB_ERR"] = "Missbruksfel";
$language["BC_U_R_BANNED"] = "P?? grund av missbruk ??r du bannad fr??n kommentarer!! Om du anser att det ??r ett misstag, kontakta n??gon i staffen.";
$language["BC_COM_LOCKED"] = "Kommentarer l??sta";
$language["BC_OVERALL_ABUSE"] = "P?? grund av missbruk har kommentarsfunktionen tagits bort p?? denna torrent!";

// Account Parked
$language["PARK_PARKED"] = "(Parkerat)";
$language["PARK_ACC_PARKED"] = "Account Parked";
$language["PARK_ACC_PARKED_INFO_1"] = "Ditt konto ??r f??r n??rvarande parkerat. F??r att koppla ur parkeringsfunktionen";
$language["PARK_ACC_PARKED_INFO_2"] = "klicka h??r";
$language["PARK_PARK_ACC"] = "Parkera konto";

// Hit & Run
$language["HNR_BLOCK_SETTINGS"] = "Hit & Run Blockeringsinst??llning";
$language["HNR_EVENT_DATE"] = "Gjorde HIT & RUN p??";
$language["USERNAME"] = "Anv??ndarnamn";
$language["SEEDING_TIME"] = "Seedar tid";
$language["NO_HR"] = "Inga Hit & Runners hittade";
$language["HNR_WARN_DEC"] = "Automatisk Hit & Run minskning!";
$language["HNR_WARN_INC"] = "Automatisk Hit & Run ??kning!";
$language["HNR_CANT_DOWN"] = "Du f??r inte ladda ner nya torrenter p?? grund av din Hit & Run lista, f??r att l??sa upp torrentnerladdningen m??ste du seeda det du redan laddat ner!";

// Low Ratio Warn & Ban System
$language["RAT_SUBJ"] = "Varning f??r l??g ratio!";
$language["RAT_SUBJ_2"] = "Andra varningen f??r l??g ratio!";
$language["RAT_SUBJ_3"] = "Sista varningen f??r l??g ratio!";
$language["RAT_NOTHING_YET"] = "Inget att se ??nnu";
$language["RAT_WARN_X"] = "varna x";
$language["RAT_BANNED"] = "banaed";

// Hide Online Status
$language["HOS_INV_2_OTHERS"] = "Osynlig f??r andra anv??ndare";
$language["HOS_HIDDEN"] = "Dold";

// Upload Multiplier
$language["UPM_UPL_MULT"] = "Uppladdningsmultiplikator";
$language["UPM_RANK_INV"] = "Ogiltig rang";

// Proxy / Blacklist
$language['CHANGE_CONFIRM']='??r det s??kert du vill ??ndra denna anv??ndares nerladdningsr??ttigheter?';
$language['CHANGED']='V??xla';

//Auto Images
$language["IMG_SUCCESS"]="<center><h4>Bilden ??r framg??ngsrikt behandlad!<br>Klicka p?? bilden f??r att s??tta in i beskrivningen.</h4></center>";
$language["IMG_INFO"]="<center>Bilder s??kta mot ditt filnamn. Klicka f??r att anv??nda.</center>";

// New Comment Layout
$language["NCL_COM_EDIT"] = "Kommentera ??ndra";

//FAQ
$language["MNU_FAQ"]="F.A.Q.";
$language["FAQ_NAME"]="FAQ-grupp, namn";
$language["FAQ_TEXT"]="FAQ-grupp, beskrivning";
$language["FAQ_SORT_INDEX"]="FAQ-gruppens sorteringsindex";
$language["FAQ_ADD"]="S??tt in i FAQ-gruppen";
$language["FAQ_QUESTION"]="FAQ fr??ga";
$language["FAQ_ANSWER"]="Svar";
$language["FAQ_QUESTION_ADD"]="S??tt in FAQ fr??gor/svar";
$language["FAQ_QUESTION_SEARCH_ALL"]="S??k alla...";
$language["FAQ_AGREE"]="Jag har l??st och samtycker till att f??lja de villkor som anges i denna FAQ.";

// Torrent Bookmarks
$language["TB_FAV"] = "Bokm??rkta torrenter";
$language["TB_BOOKMARK"] = "Bokm??rk denna torrent";
$language["BOOKMARK"]="Dina bokm??rkta torrenter";
$language["ADDB"]="Bokm??rk";
$language["TB_DOWN"] = "Nere";
$language["TB_BOOKMARKED"] = "Bokm??rkt";
$language["TB_ALREADY_BOOK"] = "Torrenten ??r redan bokm??rkt";
$language["TB_NO_TORR_EXISTS"] = "Det finns ingen torrent f??r den angivna info hashen";
$language["TB_NOTHING_TO_SEE"] = "Finns inget att se h??r ??n";

// Birthday hack
$language["DOB"]="F??delsedatum";
$language["DOB_FORMAT"]="<b>Dag (DD) / M??nad (MM) / ??r (YYYY)</b>";
$language["USER_AGE"]="??lder";
$language["HB_SUBJECT"]="Grattis p?? f??delsedagen";
$language["HB_MESSAGE_1"]=":hbd:\n\nDitt konto har krediterats med ";
$language["HB_MESSAGE_2"]=" av uppladdat krediteras. (";
$language["HB_MESSAGE_3"]=" GB f??r varje ??r av ditt liv). staffen p?? $SITENAME ??nskar dig all lycka i framtiden.\n\n:yay:";
$language["ERR_BORN_IN_FUTURE"]="Tidsresen??r, va? Du kan inte vara f??dd i framtiden!";
$language["ERR_DOB_1"]="Det tror jag inte du ??r";
$language["ERR_DOB_2"]=" ??r gammal.";
$language["INVALID_DOB_1"]="Lagt in fdelsedatum (";
$language["INVALID_DOB_2"]=") ??r ogiltig";

$language["CANT_VIEW_PAGE"] = "Tyv??rr har du inte tillst??nd att bes??ka denna sida!";

$language["UN_ADDED_BY"] = "Tillagd av";
$language["UN_NOTE"] = "Anteckning";
$language["UN_NOTES"] = "Anteckningar";
$language["UN_ADD_NOTE"] = "L??gg till anteckning";

$language['REALCOUNTRY']='IP-land';
//advanced torrent search extra 
$language['UPLS']='Uppladdare'; 

$language["UN_BONUS_GENERAL_1"]="har anv??nt";
$language["UN_BONUS_GENERAL_2"]="bonuspo??ng p??";
$language["UN_VIP_RANK"]=" Vip-rang.";
$language["UN_ONE_INV"]="en inbjudan.";
$language["UN_THREE_INV"]="tre inbjudningar.";
$language["UN_FIVE_INV"]="fem inbjudningar.";
$language["UN_GIFT_SEND_1"]="har skickat";
$language["UN_GIFT_SEND_2"]="en g??va";
$language["UN_GIFT_SEND_3"]="bonuspo??ng.";
$language["UN_GIFT_REC_1"]="har f??tt en g??va av";
$language["UN_GIFT_REC_2"]="bonuspo??ng fr??n";
$language["UN_UL_CREDIT"]="av uppladdning krediterad.";
$language["UN_UL_USERNAME"]="ett anv??ndarnamnbyte till";
$language["UN_UL_TITLE"]="custom title till";
$language["UN_DONATE_1"]="har donerat";
$language["UN_DONATE_2"]="och mottaget";
$language["UN_DONATE_3"]="av uppladdning krediterad";
$language["UN_DONATE_4"]="VIP rang tills ";
$language["UN_DONATE_5"]="dagar";
$language["UN_DONATE_6"]="VIP rang tills vidare";
$language["UN_DONATE_7"]="eftersom denne medlem sitter med i staff, p??verkas inte hans/hennes rang.";
$language["UN_WLEV_INC"]="Varningsniv?? ??kad, se varningsloggen f??r mer detaljer";
$language["UN_WLEV_DEC"]="Varningsniv?? minskad, se varningsloggen f??r mer detaljer";
$language["UN_AUTORANK_1"]="har f??tt sin rang automatiskt ??ndrad fr??n";
$language["UN_AUTORANK_2"]="till";
$language["UN_AUTORANK_3"]="av Autorank";
$language["UN_AUTORANK_4"]="U";    // Short for Uploaded
$language["UN_AUTORANK_5"]="D";    // Short for Downloaded
$language["UN_AUTORANK_6"]="SR";   // Short for Share Ratio
$language["UN_AUTORANK_7"]="Inf."; // Short for Infinite
$language["UN_BOOTED"]="har automatiskt startats f??r att maximal varningsniv?? ??r uppn??dd";
$language["UN_MAN_BOOTED_1"]="har startats manuellt tills";
$language["UN_MAN_BOOTED_2"]="f??r";
$language["UN_UNBOOTED"]="har manuellt kopplats ner";
$language["UN_BAN_BUT_1"]="har bannats via Banknappen f??r att";

//end of month paypal setting diemthuy
$language["AADS_AUTO"] ="Auto set ny m??nad"; 
//for forced faq. 
$language["SUBMIT"] ="L??mna";

$language["STAFF_COMMENT"]="Staffkommentar";

$language["QUAR_PM_SUBJ"]="Misst??nkt hackerf??rs??k";
$language["QUAR_PM_MSG_1"]="f??rs??kte ladda upp en fil med php-kod. Filen har satts i karant??n";
$language["QUAR_PM_MSG_2"]="Det ??r dock m??jligt att det ??r falskt negativt, s?? kontrollera denna fil med hex-editorn eller n??got innan anv??ndaren bannas."."\n\n"."F??rs??ket gjordes via";
$language["QUAR_OUTPUT"]="F??rs??ket att ladda upp en fil med php-kod f??rhindrades och du har rapporterats till sidans ??gare!";
$language["QUAR_ERR"]=" Fel i karant??nkatalogen";

$language["QUAR_DIR_PROBLEM_1"]="Karant??nkatalog";
$language["QUAR_DIR_PROBLEM_2"]="finns inte, l??gg in en giltig karant??nkatalog i [b]Admin Panel-->Security Suite Settings[/b]";
$language["QUAR_DIR_PROBLEM_3"]="??r inte skrivbar, v??nligen CHMOD till 0777";
$language["QUAR_UNABLE"]="P?? grund av ett of??rutsett fel g??r det inte att skicka filen till karant??n, v??nligen se igenom dina ??vriga PM f??r att kunna l??sa problemet";
$language["QUAR_NOT_SET"]="Katalog ej vald";

$language["QUAR_TMP_FILE_MISS"]="G??r inte att hitta tempfilen!";


$language["UIMG"]="User Images & Titles";
$language["UIMG_NO_ICONS"]="Du har inga anv??ndarikoner ??nnu";
$language["UIMG_TM_NO_ICONS"]="Den h??r medlemmen har inga anv??ndarikoner ??n";
$language["UIMG_MSG_1"]="V??lkommen";
$language["UIMG_MSG_2"]="h??r kan du se alla tillg??ngliga bilder/titlar inklusive din egen (om du har n??gon)";
$language["UIMG_MSG_3"]="Dina anv??ndarbilder";
$language["UIMG_USR_ICONS"]="Anv??ndarikoner";
$language["UIMG_USR_IMGS"]="Anv??ndarbild";

//shoutbox clean 
$language["SHOUT_CLEANED"]="[b]Shoutboxen har just st??dats![/b][IMG]".$BASEURL."/images/sweep.gif[/IMG]";

$language["ERR_PASS_TOO_WEAK_1"]="Ditt l??senord ??r f??r svagt.<br />Av s??kerhetssk??l m??ste det inneh??lla";
$language["ERR_PASS_TOO_WEAK_1A"]="L??senordet ??r f??r svagt.<br />Av s??kerhetssk??l m??ste det inneh??lla";
$language["ERR_PASS_TOO_WEAK_2"]="liten bokstav";
$language["ERR_PASS_TOO_WEAK_2A"]="sm?? bokst??ver";
$language["ERR_PASS_TOO_WEAK_3"]="stor bokstav";
$language["ERR_PASS_TOO_WEAK_3A"]="stora bokst??ver";
$language["ERR_PASS_TOO_WEAK_4"]="nummer";
$language["ERR_PASS_TOO_WEAK_4A"]="nummer";
$language["ERR_PASS_TOO_WEAK_5"]="symbol";
$language["ERR_PASS_TOO_WEAK_5A"]="symboler";
$language["ERR_PASS_TOO_WEAK_6"]="Ett starkt l??senord till dig";
$language["SECSUI_ACC_PWD_1"]="Ditt l??senord m??ste:";
$language["SECSUI_ACC_PWD_1A"]="L??senordet m??ste:";
$language["SECSUI_ACC_PWD_2"]="??tminstone";
$language["SECSUI_ACC_PWD_3"]="teckenl??ngd";
$language["SECSUI_ACC_PWD_3A"]="teckenl??ngd";
$language["SECSUI_ACC_PWD_4"]="??tminstone";
$language["SECSUI_ACC_PWD_5"]="liten bokstav";
$language["SECSUI_ACC_PWD_5A"]="sm?? bokst??ver";
$language["SECSUI_ACC_PWD_6"]="stor bokstav";
$language["SECSUI_ACC_PWD_6A"]="stora bokst??ver";
$language["SECSUI_ACC_PWD_7"]="nummer";
$language["SECSUI_ACC_PWD_7A"]="nummer";
$language["SECSUI_ACC_PWD_8"]="symbol";
$language["SECSUI_ACC_PWD_8A"]="symboler";

$language["DIRECT_LINK"]="Direkt nerladdning<br />(valid url)";
$language["DIRECT_DOWNLOAD"]="Direkt nerladdning";

$language["AM_ABOUT_ME"] = "Om mig";

$language["MTS_ANNURL"] = "Announce URL";
$language["MTS_SEED"] = "Seeders";
$language["MTS_LEECH"] = "Leechers";
$language["MTS_DOWN"] = "Nerladdad";

$language["LAST_LOCATION"]="Senaste plats";
$language["WHEN_LOCATION"]="N??r";
$language["WATCH_LOG"]="Watch Log";

$language["PARTNERS"]="V??ra partners";
$language["PAR_SURE_DEL"]="??r det s??kert att du vill ta bort denna partner?";
$language["PAR_BANNER"]="Banner";
$language["PAR_NAME"]="Namn";
$language["PAR_LINK"]="L??nk";
$language["PAR_ADDEDBY"]="Tillagd av";
$language["PAR_EDDEL"]="??ndra/Ta bort";
$language["PAR_NO_PART"]="Ingen partner ??nnu...";
$language["PAR_NO_PART_2"]="Ingen partner med detta ID";
$language["PAR_ADD_NEW"]="L??gg till en ny partner";
$language["PAR_TITLE"]="Titel";
$language["PAR_BAN_URL"]="Banner URL";
$language["PAR_LINK"]="Link";
$language["PAR_3RD_PARTY"]="Vissa sajter st??nger av m??jligheten att snabbkoppla bilder, s?? det rekommenderas att hosta dem p?? en tredje-partssida.";
$language["PAR_UPDATE"]="Uppdatera";
$language["PAR_ED_PART"]="Redigera partner";
$language["PAR_CUR_BAN"]="Nuvarande Banner";
$language["PAR_BACK"]="Back";

$language['details_similar_torrents'] = "Liknande torrenter";
$language['details_name'] = "Namn";
$language['details_seeders'] = "Seeders";
$language['details_leechers'] = "Leechers";
$language['details_size'] = "Storlek";
$language['details_date'] = "Tillagd";

$language["SHORT_EXTERNAL"]="EXT";
$language["LOGS_PHP"]="PHP fellogg";
$language["LOGS_LINE_AMT"]="<b>Antal linjer:</b>";
$language["LOGS_LINE_AMT_1"]="<b>Hur m??nga linjer f??r att visa loggen</b>";
$language["LOGS_COOLY_NAME"]="<b>Logg namn:</b>eller vad du ??nskar kalla dina loggar. T??nk p?? n??got autentiskt.";
$language["LOGS_COOLY_NAMES"]="Det kommer vara samma namn f??r varje logg med undantag f??r datumst??mpeln.";
$language["LOGS_COOLY_PATH"]="<b>Log Path/b>&nbsp;Above doc root would be a good choice \"if possible\" no forward slash<br /> and folder must be writable.If you have an open basedir restriction you are best to keep the current path.";
$language["LOGS_COOLY_PATHS"]="Rekommenderad:";
$language["LOGS_COOLY_NOTE"]="<b>Om du ??ndrar s??kv??g till en annan dokumentrootkatalog, kom ih??g att kopiera .htaccess till den nya katalogen.</b>";
$language["LOGS_COOLY_LIST"]="Listan p?? gamla loggar i din mapp.";
$language["LOGS_COOLY_FLUSH"]="Rensa</a> gamla loggar";
$language['SSL'] = "Tvinga SSL:";
$language['SSL_DESC'] = "eller; Tvinga en s??ker anslutningp?? sidan.";
$language['ADDTHIS_SHARE']='Dela';
$language['ADDTHIS_SHARE2']='Dela med v??nner';

$language["REFRESH_PEERS"]="Uppdatera antal Peers";

$language["SB_GET_1_INV"]="Erh??ll 1 inbjudan";
$language["SB_GET_3_INV"]="Erh??ll 3 inbjudningar";
$language["SB_GET_5_INV"]="Erh??ll 5 inbjudningar";
$language["SB_SHORT_MAXIMUM"]="Max.";
$language["SB_DECREASE_HNR"]="Ta bort ??ldsta Hit & Run";
$language["SB_OLDEST_HNR"]="Din ??ldsta Hit & Run";
$language["SB_NO_HNR"]="Ingen Hit & Run hittad";

$language["HNR_NOT_ENOUGH"]="Det finns inte tillr??ckligt med bonuspo??ng f??r att k??pa bort en Hit & Run";
$language["HNR_ABBREVIATION"]="H&Rs";

$language["SP_SHOW_PORN"] = "Visa porr?";

$language["PRIVATE"]="Privat Profil";
$language["PP_PRIVATE"]="Privat";
$language["PP_PUBLIC"]="Offentlig";
$language["PP_PROFILE"]="Profil";

$language["LANGUAGE"]="Spr??k";
$language["LANG_ENG"]="Engelska";
$language["LANG_FRE"]="Franska";
$language["LANG_DUT"]="Holl??ndska";
$language["LANG_GER"]="Tyska";
$language["LANG_SPA"]="Spanska";
$language["LANG_ITA"]="Italienska";

$language['MPLAYER']='Media Clip';
$language['MPLAYERNON']='Media Clip inte tillg??nglig';

$language["SIGNATURE"]="Forum Signatur";

$language["TOT_MOST_ONLINE"]="Top 10 Online Tider";
$language["TOT_TIME_IS"]="Total online tid ??r";
$language["TOT_ONLINE_TIME"]="Online Tid";

$language["LDB_AGO_LEG"]="F??rklaring: d=dag, v=vecka, m=min, t=timme, s=sekund.";
$language["LDB_AGO_NTSH"]="Det finns inget att se h??r";
$language["LDB_DB_EMPTY"]="Databasen ??r tom";
$language['ULR']='Bli Uppladdare';
$language['FRIEDNLIST']='V??nner';
$language["IMGUP_DIM_TOO_BIG_1"]="Din bild ??r f??r stor.<br />Max storlek ??r:";
$language["IMGUP_DIM_TOO_BIG_2"]="Pixels.<br /><br />Din bild ??r:";
$language["IMGUP_DIM_TOO_BIG_3"]="Pixels.<br /><br />??ndra storleken ?? f??rs??k igen.";

# Language expected torrents start
$language['VOTE_EXPECTED_NO']='R??sta MOT detta ';
$language['viewexpected']='Se Erbjudna Torrents';
$language['EXPECTED_V']='Erbjudna Torrents';
$language['EXPECTED_VV']='Se r??ster P?? Erbjudna';
$language['EX_NAME']='Erbjud';
$language['EXPECTED_D']='Erjuden Torrents Detaljer';
$language['EXPECTED_E']='??ndra erbjudna Torrents';
$language['INC_DEAD']='Inc. dead';
$language['ADD_EXPECTED']='L??gg till ny erbjuden torrent';
$language['EXPECTED']='V??ntande';
$language['EXPECVOTE']='V??ntande/R??sta';
$language['OFFER']='Erbjudande';
$language['VIEW_MY_EXPECTED']='Se min erbjudna torrents';
$language['VIEW_ONLY']='Bara se';
$language['TYPE']='Skriv';
$language['FIND_EXPECT']='Hitta';
$language['GO']='K??r';
$language['WRITE_CATEGORY']='V??lj Kategori!';
$language['NO_NAME']='Inget Namn!';
$language['NO_DESCR']='Beskrivning Tom!';
$language['EXP_ADD_SUCCES']='Flyttad till V??ntande Sektion';
$language['MUST_SEL_EXP']='M??ste v??lja mins en v??ntande f??r att ta bort.';
$language['DELETED']='Borttagen';
$language['RETURN_EXPECT']='Tillbaka till';
$language['DATE_EXPECTED']='Datum V??ntande';
$language['TORR_LINK']='Torrent L??nk';
$language['TORR_CLICK']='Klicka h??r f??r att se torrent';
$language['FILL_INFO']='Om du laddat upp torrenten , Fyll i Info h??r under';
$language['VOTE_EXPECTED']='R??sta p?? denna';
$language['OFFER_A']='R??sta';
$language['OFFER_N']='Inget h??r ??n';
$language['OF_USER']='Anv??ndar namn';
$language['TEXT_DTA']='<p>Du har redan r??stat p?? denna endast en r??st p?? varje erbjudning</p></b>';
$language['TEXT_DTB']='R??stning OK';
$language['TEXT_DTC']='Din r??st ??r tillagd p?? denna';
$language['TEXT_DTD']='Beh??vs bara f??r v??ntande torrents!';
# Language expected torrents end

// Friends DT
$language["FL_FRIENDLIST"]="V??nlista";
$language["FL_UNFRIEND"]="Vill du ta bort medlem som v??n?";
$language["FL_REFRIEND"]="Vill du bli v??n med denna medlem?";
$language["FL_REJECT"]="Vill du neka medlemen att bli v??n med dig?";
$language["FL_REMOVE"]="Vil du tabort denna v??ntande f??rfr??gning?";
$language["FL_FPENDING"]="V??ntande f??rfr??gningar";
$language["FL_FFRIEND"]="V??nf??rfr??gningar";
$language["FL_FAVATAR"]="Avatar";
$language["FL_FUN"]="Namn";
$language["FL_FUL"]="Klass";
$language["FL_FRD"]="F??rfr??gnings Datum";
$language["FL_FFD"]="V??n Sedan";
$language["FL_FFF"]="V??n med";
$language["FL_FRDD"]="Datum nekad";
$language["FL_FRU"]="Neka medlem";
$language["FL_FCONF"]="Bekr??ftade V??nner";
$language["FL_FREJ"]="Nekade Medlemar";
$language["FL_FRR"]="Tabort f??rfr??gan";
$language["FL_FSTAT"]="Status";
$language["FL_FRE"]="??teraktivera v??n";
$language["FL_FUF"]="Inaktivera v??n";
$language["FL_FATF"]="L??gg till v??n";
$language["FL_FMF"]="Gemensam v??n";
$language["FL_W2BF"]="Vill bli v??n";
$language["FL_FRREQ"]="V??nf??rfr??gan!";
$language["FL_W2BF2"]="vill bli v??n med dig."."\n\n"."G?? till din v??nlista f??r att acceptera eller neka f??rfr??gan";
$language["FL_AUTOMSG"]="\n\n"."[b][color=red]AUTOMATIC SYSTEM MESSAGE - PLEASE DON'T REPLY !![/color][/b]";
$language["FL_ALRFR"]="Denna medlem ??r redan v??n med dig.";
$language["FL_SELFFR"]="EGO Du kan inte bli v??n med dig sj??lv, OK?";
$language["FL_REQDEL"]="V??nf??rfr??gan borttagen!";
$language["FL_DELREQ_1"]="har tagit bort v??nf??rfr??gan."."\n\n"."Det ??r d??rf??r stor risk att";
$language["FL_DELREQ_2"]="inte vill va v??n med dig."."\n\n"."Av den orsaken kan du inte l??ngre se";
$language["FL_DELREQ_3"]="i din f??fr??gningslista l??ngre.";
$language["FL_FRACC_SUBJ"]="V??nf??rfr??gning Accepterad!";
$language["FL_FRACC_MSG"]="har accepterat din v??nf??rfr??gan.";
$language["FL_FRCOMMON"]="\n\n"."Du kan se i din v??nlista att statusen ??ndrats.";
$language["FL_CHANGEDMIND"]="vill bli din v??n igen"."\n\n"."G?? till din v??nlista f??r att acceptera eller neka";
$language["FL_FRREJ_SUBJ"]="V??nf??rfr??gning Nekad!";
$language["FL_FRREJ_MSG"]="har nekat din f??rfr??gan."."\n\n"."Du kan se i din v??nlista att statusen ??ndrats.";
$language["FL_NOPENFRO"]="Du har inga Skickade f??rfr??gningar just nu!";
$language["FL_NOPENFRI"]="Du har inga mottagna f??rfr??gningar just nu!";
$language["FL_OFFLINE"]="Ej ansluten";
$language["FL_ONLINE"]="Ansluten";
$language["FL_NOFRIENDS"]="Du har inga v??nner ??n!";
$language["FL_NOREJECTS"]="Du har inga nekade eller f??redetta v??nner just nu!";
$language["FL_FRIENDS"]="V??nner";
$language["FL_THISISU"]="Detta ??r du!";
$language["FL_HASNOFRIENDS"]="Medlemen har inga v??nner ??n!";

$language["BUMP_THIS_TORR"]="Flytta till toppen";

$language["ARC_NEW"]="Ny";
$language["ARC_ARC"]="Arkiverad";
$language["ARC_UPLOAD_TYPE"]="Uppladdnings Sort ";
$language["ARC_ERR_NO_ARC"]="Du kan inte se detaljer i Arkiv torrents!";
$language["ARC_ERR_NO_NEW"]="Du kan inte se detaljer i Nya torrents!";
$language["ARC_ERR_NO_BOTH"]="Du kan inte se detaljer i Nya elr Arkiv Torrents!";

$language["FLS_FREE_SLOTS"]="Frileech Slots";
$language["FLS_DONATE_INFO_1"]="F?? <span style='color:red;'>one</span> Freeleech slot f??r varje";
$language["FLS_DONATE_INFO_2"]="du donerar.<br />(These can be used to create Custom Free torrents of your own choosing)";
$language["FLS_LOCKED"]="L??st";
$language["FLS_UNLOCKED"]="??ppen";
$language["FLS_CUSTOM_FL"]="Modifierad fri leech";
$language["FLS_ALREADY_HAVE"]="Du har redan denna torrent som modifierad fri leech torrent";
$language["FLS_NONE_REMAINING"]="Du har ingen fri leech slot kvar";
$language["FLS_FREE_BY_OTHER"]="Den torrent ??r redan fri.";
$language["FLS_PLS_CONFIRM"]="V??nligen Bekr??fta ??tg??rden";
$language["FLS_R_U_SURE1"]="Vill du anv??nda en fri leech slot?<br />Du har";
$language["FLS_R_U_SURE2A"]="fri leech slot kvar.";
$language["FLS_R_U_SURE2B"]="fri leech slots kvar.";
$language["FLS_USED_SLOT1"]="Anv??nt fri leech slot p??";
$language["FLS_USED_SLOT2"]="torrent";
$language["FLS_USED_SLOT3"]="Tillbaka till torrents";
$language["TOW_NONE_ATM"]="<b>Ingen MOTW just nu!</b>";
$language["TOW_SEEDS"]="seeds";
$language["TOW_LEECH"]="leechers";
$language["TOW_EXPIRES"]="Avslutas:";
$language["CAPTCHA_ERROR"]="The reCAPTCHA wasn't entered correctly. Go back and try it again." ."(reCAPTCHA said:";
$language["TCOM_AUTOPM_1"]="har gjort en kommentar p?? din uppladdning";
$language["TCOM_AUTOPM_2"]="Automatiskt system meddelande."."\n"."Vill du inte ha det st??ng av funktionen i din profil.";
$language["TCOM_AUTOPM_SUBJ"]="Torrent Kommentar Tillagd";
$language["TCOM_COMMENTPM"]="Kommentar Notis";
$language["ERR_NAME_BANNED"]="Anv??ndarnamnet f??rbjudet";
$language["NO_POLLS"]="<b>Ingen Omr??stning Just Nu!</b>";
$language["TOTAL_VOTES"]="Totala R??ster";
$language["DISCUSS_POLL"]="Diskutera/R??sta I denna omr??stning";
$language["BONUS_INFO13"]="Du kommer f?? extra";
$language["BONUS_INFO14"]="peer timme du seedar arkiv torrents.";
$language["FLS_BONUS_GET"]="F?? 1 Frileech slot";
$language["FLS_NOT_ENOUGH"]="Du har inte nog med po??ng f??r att f?? en Frileech slot!";
$language["TVDB_EP_NAME"]="Avsnitts Namn";
$language["TVDB_GUESTS"]="G??st stj??rnor";
$language["TVDB_AIRED"]="S??nt";
$language["TVDB_NETWORK"]="Bolag";
$language["TVDB_SHOW_AIRS"]="Serien s??nds";
$language["TVDB_AIRS_1"]="vid";
$language["TVDB_AIRS_2"]="i";
$language["TVDB_AIRS_3"]="minuter";
$language["TVDB_NO_OVERVIEW"]="[Ingen info f??r avsnitt]";
$language["TVDB_UL_TITLE"]="Seriens ID p?? TVDB";
$language["TVDB_UL_1"]="(Tillval)";
$language["TVDB_UL_2"]="Nummret efter <span style='color:lime;font-weight:bold;'>&id=</span>, ex f??r <a href='http://thetvdb.com/?tab=series&id=79349' target='_blank'>Dexter</a> (http://thetvdb.com/?tab=series&id=<span style='color:lime;font-weight:bold;'>79349</span>).";
$language["SYSTEM_USER"]="System";
$language["PRUNE_WARN_SUBJ"]="Varning Konto inaktivitet";
$language["PRUNE_WARN_SUBJ2"]="Kontot Avslutat";
$language["PREUS_PKA"]="<span style='color:lime;'>Tidigare k??nd som:</span>";
$language["PREUS_PUN"]="Tidigare nick?";
$language["IBD_NEED_TO_INTRODUCE_1"]="F??r att kunna ladda ner fr??n denna sida m??ste du f??rst";
$language["IBD_NEED_TO_INTRODUCE_2A"]="skapa en ny";
$language["IBD_NEED_TO_INTRODUCE_2B"]="l??gg till i";
$language["IBD_NEED_TO_INTRODUCE_3"]="Introduktions post.<br /><br />Du kan g??ra detta";
$language["MAGNET_DOWN_USING"]="Ladda ner via magnetl??nk";
$language["PFET_NO_UPLOAD_1"]="Din klass (";
$language["PFET_NO_UPLOAD_2"]=") kan inte ladda upp externa torrenter p?? denna sida.";
$language["ETH_START_DATE"]="Startad";
$language["ETH_COMP_DATE"]="F??rdig";
$language["ETH_LAST_ACTION"]="Senast aktiv";

###Translators own things you can remove this
$language["DIV_MENU"]='N??je';
$language["MNU_DONATE"]='Donera';
$language["PCHECK"]='Port Kontroll';
$language["ALL2"]='Alla Torrents';
$language["ARC2"]='Arkiv';
$language['CL_BAN_HEAD']="Banna Klient";
$language["IRC_SETTINGS"]="Irc Konfig";
$language["SETTING_IRC_SERVER"]="Irc Server (utan irc://)";
$language["SETTING_IRC_PORT"]="Irc Port";
$language["SETTING_IRC_CHANNEL"]="Irc Kanal (utan #)";
$language["MNU_IRC"]="Irc";
$language['VIDEO_URL'] = 'Video Url (http://site.com/film.mp4)';
$language['VIDEO_TITLE'] = 'Image Title (http://site.com/pic.jpg)';
$language['VIDEO_TYPE']='Choose Version';
$language['VIDEO_TYPE_1']='Jquery Version';
$language['VIDEO_TYPE_2']='Quicktime Version';
$language["RSS_MY_PERS_FEED"] = "Personlig RSS";
$language["MOV"]='Film';
$language["MUS"]='Musik';
$language["MIX"]='??vriga';
$language["TEVE"]='TV';
?>