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
global $users, $torrents, $seeds, $leechers, $percent;
// $language["rtl"]="rtl"; // if your language is  right to left then uncomment this line
$language["charset"]="UTF-8";
$language["ACCOUNT_CONFIRM"]="Regisztrálj a $SITENAME trackerre.";
$language["ACCOUNT_CONGRATULATIONS"]="Gratulálunk, a felhasználói neved létrehozva!<br />Jelentkezz <a href=index.php?page=login>be itt</a> a létrehozott felhasználói neveddel és jelszavaddal.";
$language["ACCOUNT_CREATE"]="Felhasználó létrehozása";
$language["ACCOUNT_DELETE"]="Felhasználó törlése";
$language["ACCOUNT_DETAILS"]="Felhasználói részletek";
$language["ACCOUNT_EDIT"]="Tag szerkesztése";
$language["ACCOUNT_MGMT"]="Felhasználó Managment";
$language["ACCOUNT_MSG"]="Szia,\n\nEz az email azért került küldésre mert ha minden igaz regisztrálni szeretnél a trackerünkre. Ha a szándékod még mindíg komoly akkor kattints az alul található linkre :).\nHa nem,akkor hagyd figyelmen kívűl ezt az emailt. Ne válaszolj, ez egy automatikusan, a rendszer által küldött üzenet!  \n\nÜdvözlettel, a staff.";
$language["ACTION"]="Akció";
$language["ACTIVATED"]="Aktivált";
$language["ACTIVE"]="Státusz";
$language["ACTIVE_ONLY"]="Actív";
$language["ADD"]="Hozzáad";
$language["ADDED"]="Hozzáadva";
$language["ADMIN_CPANEL"]="Admin vezérlő";
$language["ADMINCP_NOTES"]="A tracker ellenőrzése és az összes beállítása található itt...";
$language["ALL"]="Mind";
$language["ALL_SHOUT"]="Összes üzi";
$language["ANNOUNCE_URL"]="Tracker announce url:";
$language["ANONYMOUS"]="Névtelen";
$language["ANSWER"]="Válasz";
$language["AUTHOR"]="Szerző";
$language["AVATAR_URL"]="Avatar (url): ";
$language["AVERAGE"]="Átlag";
$language["BACK"]="Vissza";
$language["BAD_ID"]="rossz ID!";
$language["BCK_USERCP"]="vissza a profilhoz";
$language["BLOCK"]="Blokk";
$language["BODY"]="Szöveg doboz";
$language["BOTTOM"]="l";
$language["BY"]="írta";
$language["CANT_DELETE_ADMIN"]="Lehetetlen a törlése, fordulj egy adminhoz!";
$language["CANT_DELETE_NEWS"]="Nincs engedélyed a hírek törléséhez!";
$language["CANT_DELETE_TORRENT"]="A torrent törléséhez nincs engedélyed!...";
$language["CANT_DELETE_USER"]="A felhasználók törléséhez nincs engedélyed!";
$language["CANT_DO_QUERY"]="Can't do SQL query - ";
$language["CANT_EDIT_TORR"]="Nincs engedélyed a torrent szerkesztésére!";
$language["CANT_FIND_TORRENT"]="Nem találtam a torrentet!";
$language["CANT_READ_LANGUAGE"]="Nem olvashatod a nyelvi fájlt!";
$language["CANT_SAVE_CONFIG"]="Nem menthető a bállítások a config.php-be";
$language["CANT_SAVE_LANGUAGE"]="Nem menthető language file";
$language["CANT_WRITE_CONFIG"]="Figyelem: nem írhatsz config.php-be!";
$language["CATCHUP"]="Összest olvasottá tesz";
$language["CATEGORY"]="Kat.";
$language["CATEGORY_FULL"]="Kategória";
$language["CENTER"]="közép";
$language["CHANGE_PID"]="PID csere";
$language["CHARACTERS"]="karakterek";
$language["CHOOSE"]="Válassz";
$language["CHOOSE_ONE"]="Válassz egyet";
$language["CLICK_HERE"]="Klikk ide";
$language["CLOSE"]="bezár";
$language["COMMENT"]="Megj.";
$language["COMMENT_1"]="Megjegyzések";
$language["COMMENT_PREVIEW"]="Hozzászólás előnézete";
$language["COMMENTS"]="Kommentek";
$language["CONFIG_SAVED"]="Gratulálok, az új beállítások mentve!";
$language["COUNTRY"]="Ország";
$language["CURRENT_DETAILS"]="Jelenlegi részletek";
$language["DATABASE_ERROR"]="Adatbázis hiba.";
$language["DATE"]="Dátum";
$language["DB_ERROR_REQUEST"]="Adatbázis hiba. Nem teljes a kérés.";
$language["DB_SETTINGS"]="Adatbázis beállítások";
$language["DEAD_ONLY"]="csak inaktív";
$language["DELETE"]="Töröl";
$language["DELETE_ALL_READED"]="olvasottak törlése";
$language["DELETE_CONFIRM"]="Biztosan a törlést választod? Ha igen, katt az OK-ra";
$language["DELETE_TORRENT"]="Torrent törlés";
$language["DELFAILED"]="A törlés sikertelen";
$language["DESCRIPTION"]="Leírás";
$language["DONT_NEED_CHANGE"]="Nem kell változtatni ezen a beállításokon!";
$language["DOWN"]="Letöltés";
$language["DOWNLOAD"]="Letöltés";
$language["DOWNLOAD_TORRENT"]="Torrent letöltése";
$language["DOWNLOADED"]="Letöltött";
$language["EDIT"]="Szerkeszt";
$language["EDIT_LANGUAGE"]="Nyelv szerkesztése";
$language["EDIT_POST"]="Üzenet szerkesztése";
$language["EDIT_TORRENT"]="Torrent szerkesztése";
$language["EMAIL"]="Email";
$language["EMAIL_SENT"]="Az emailt elkültdtük a megadott címre <br />Klikkelj a linkre és igazoljuk regisztrációdat.";
$language["EMAIL_VERIFY"]="e-amail account frissítve $SITENAME-on";
$language["EMAIL_VERIFY_BLOCK"]="Igazoló e-mail elküldve";
$language["EMAIL_VERIFY_MSG"]="Szia,\n\nEzt az e-mailt azért küldtük mert kértél egy változtatást a jelenlegi regisztrációdban, kérlek kattints alul a linkre a változtatás megerősítéséhez.\n\nÜdvözlettel a staff.";
$language["EMAIL_VERIFY_SENT1"]="<br /><center>Megerősítő e-mailt küldtek:<br /><br /><strong><font color=\"red\">";
$language["EMAIL_VERIFY_SENT2"]="</font></strong><br /><br />Kattints a linkre hogy<br />frissítsd az e-mail címed. Az e-mail kiküldésre kerül 10 percen belül <br />(általában azonnal) bár néhány e-mail szolgáltató SPAM-nak azonosíthatja<br />ezért ellenőrizd a spamek között is, ha nem találnád.<br /><br />";
$language["ERR_500"]="HTTP/1.0 500 Jogosulatlan hozzáférés!";
$language["ERR_AVATAR_EXT"]="Boccsi, csak gif,jpg,bmp vagy png engedélyezett";
$language["ERR_BAD_LAST_POST"]="";
$language["ERR_BAD_NEWS_ID"]="Rossz hírek ID!";
$language["ERR_BODY_EMPTY"]="Szövegdoboz nem lehet üres!!!";
$language["ERR_CANT_CONNECT"]="Nem csatlakozik a helyi MySQL szerver";
$language["ERR_CANT_OPEN_DB"]="Nem nyitja meg az adatbázist";
$language["ERR_DB_ERR"]="Adatbázis hiba. Kérlek értesíts erről egy admint.";
$language["ERR_DELETE_POST"]="Üzenet törlése. Megerősítés ell.: Biztos ezt akarod, törlöd az üzenetet. Klikk";
$language["ERR_DELETE_TOPIC"]="Téma törlése. Megerősítés ell.: Téma törlése. Klikk";
$language["ERR_EMAIL_ALREADY_EXISTS"]="Ez az e-mail cím szerepel már az adatbázisunkban!";
$language["ERR_EMAIL_NOT_FOUND_1"]="Az e-mail címed.";
$language["ERR_EMAIL_NOT_FOUND_2"]="nem találtalak az adatbázisban.";
$language["ERR_ENTER_NEW_TITLE"]="Adnál egy új címet!";
$language["ERR_FORUM_NOT_FOUND"]="Nem találtam fórumot";
$language["ERR_FORUM_UNKW_ACT"]="Fórum hiba: ismeretlen akció";
$language["ERR_GUEST_EXISTS"]="'Vendég' korlátozza a nicknév. Nem regisztráltnál, ahelyett, hogy korlátozva vagy mint 'Guest'";
$language["ERR_IMAGE_CODE"]="A biztonsági kód nem stimmel";
$language["ERR_INS_TITLE_NEWS"]="Beírnád a hírt is és a címet is.";
$language["ERR_INV_NUM_FIELD"]="Érvénytelen adatok a klienstől.";
$language["ERR_INVALID_CLIENT_EVENT"]="Érvénytelen esemény a klienstől.";
$language["ERR_INVALID_INFO_BT_CLIENT"]="Érvénytelen információt kapott a BitTorrent klienstől";
$language["ERR_INVALID_IP_NUMB"]="Érvénytelen IP cím. Szabványos pont a tizedes törtnél (hostnév nem engedélyezett)";
$language["ERR_LEVEL"]="Sorry, a szinted ";
$language["ERR_LEVEL_CANT_POST"]="Nincs hozzáférésed ehhez a fórumhoz.";
$language["ERR_LEVEL_CANT_VIEW"]="Nincs hozzáférésed e téma megtekintéséhez.";
$language["ERR_MISSING_DATA"]="hibás adat!";
$language["ERR_MUST_BE_LOGGED_SHOUT"]="Hozzászólásod bekerül az oldalnaplóba...";
$language["ERR_NO_BODY"]="Nem írtál szöveget";
$language["ERR_NO_NEWS_ID"]="Új azonosító számot(ID) nem talált!";
$language["ERR_NO_POST_WITH_ID"]="Nincs ilyen azonosítójú(ID) üzenet. ";
$language["ERR_NO_SPACE"]="Nicknév nem tartalmazhat szóköz, kérlek pótold aláhúzással inkább:<br /><br />";
$language["ERR_NO_TOPIC_ID"]="Nincs ilyen azonosítójú(ID) téma visszatérni";
$language["ERR_NO_TOPIC_POST_ID"]="Nincs ilyen azonosítójú téma";
$language["ERR_NOT_AUTH"]="Nem vagy engedélyezve!";
$language["ERR_NOT_FOUND"]="Nem találtam...";
$language["ERR_NOT_PERMITED"]="Nem engedett";
$language["ERR_PASS_LENGTH"]="<font color=\"black\">Jelszavadnak legalább 4 karakternek kell lennie.</font>";
$language["ERR_PASSWORD_INCORRECT"]="Jelszó nem megfelelő";
$language["ERR_PERM_DENIED"]="Hozzáférés megtagadva";
$language["ERR_PID_NOT_FOUND"]="Kérlek töltsd le újra a torrentet. Pid rendszer aktív és azonosítókulcs nem található a torrentben";
$language["ERR_RETR_DATA"]="Hiba az adat fogadásakor!";
$language["ERR_SEND_EMAIL"]="Sikertelen mail küldés. Kérlek informáld az adminisztrátort.";
$language["ERR_SERVER_LOAD"]="A server jelenleg terhelt. Próbáld később, kérem várjon...";
$language["ERR_SPECIAL_CHAR"]="<font color=\"black\">Felhasználó neved nem tartalmazhat speciális karaktereket:<br /><br /><font color=\"red\"><strong>* ? < > @ $ & % stb.</strong></font></font><br />";
$language["ERR_SQL_ERR"]="SQL hiba";
$language["ERR_SUBJECT"]="A tárgy kitöltése kötelező.";
$language["ERR_TOPIC_ID_NA"]="Téma ID nem elérhető";
$language["ERR_TOPIC_LOCKED"]="Téma lezárva";
$language["ERR_TORRENT_IN_BROWSER"]="Fájl BitTorrent kliensekhez.";
$language["ERR_UPDATE_USER"]="Sikertelen felhasználói adatfrissítés. Kérlek informáld az adminisztrátort.";
$language["ERR_USER_ALREADY_EXISTS"]="Már van ilyen felhasználó ezzel a Nick-kel!";
$language["ERR_USER_NOT_FOUND"]="Sajnálom, felhasználó nem található";
$language["ERR_USER_NOT_USER"]="Nincs jogod más felhasználói paneljához!";
$language["ERR_USERNAME_INCORRECT"]="Hibás felhasználó név!";
$language["ERROR"]="Hiba";
$language["ERROR_ID"]="Hibás ID";
$language["FACOLTATIVE"]="Választható";
$language["FILE"]="Fájl";
$language["FILE_CONTENTS"]="File Contents";
$language["FILE_NAME"]="Fájlnév";
$language["FIND_USER"]="talált felhasználó";
$language["FINISHED"]="Sikeres";
$language["FORUM"]="Fórum";
$language["FORUM_ERROR"]="Fórum Hiba";
$language["FORUM_INFO"]="Fórum info";
$language["FORUM_MIN_CREATE"]="Fórum csoport létrehoz";
$language["FORUM_MIN_READ"]="Fórum csoport olvas";
$language["FORUM_SEARCH"]="Fórumokban keres";
$language["FORUM_N_TOPICS"]="N. Témák";
$language["FORUM_N_POSTS"]="N. Üzenetek";
$language["FRM_DELETE"]="Törlés";
$language["FRM_LOGIN"]="Bejelentkezés";
$language["FRM_PREVIEW"]="Előnézet";
$language["FRM_REFRESH"]="Frissítés";
$language["FRM_RESET"]="Alapállapot";
$language["FRM_SEND"]="Küldés";
$language["FRM_CONFIRM"]="Küldés";
$language["FRM_CANCEL"]="Mégse";
$language["FRM_CLEAN"]="tisztít";
$language["GLOBAL_SERVER_LOAD"]="Globális szerver töltés (Minden jelenlegi oldallal szerveren)";
$language["GO"]="Go";
$language["GROUP"]="Csoport";
$language["GUEST"]="Vendég";
$language["GUESTS"]="Vendégek";
$language["HERE"]="ide";
$language["HISTORY"]="Történet";
$language["HOME"]="Kezdőlap";
$language["IF_YOU_ARE_SURE"]="ha, vagy persze.";
$language["IM_SURE"]="Sajnálom...";
$language["IN"]="in_téma:";
$language["INF_CHANGED"]="Információk megváltoztatva!";
$language["INFINITE"]="Inf.";
$language["INFO_HASH"]="Info Hash";
$language["INS_NEW_PWD"]="Írd be az ÚJ jelszavad!";
$language["INS_OLD_PWD"]="Írd be a RÉGI jelszavad!";
$language["INSERT_DATA"]="Bizonytalan vagy a feltöltésnél? Használd <a class=altlink href=ulguide.php>Feltöltési Szabályzat.</a><br>Írj be minden szükséges adatot a feltöltéshez.<br>";
$language["INSERT_NEW_FORUM"]="Új fórum beszúrás";
$language["INVALID_ID"]="Érvénytelen azonositókulcs(ID). Sajnálom!";
$language["INVALID_INFO_HASH"]="Érvénytelen info hash érték.";
$language["INVALID_PID"]="Érvénytelen azonositókulcs";
$language["INVALID_TORRENT"]="Tracker hiba: Érvénytelen torrent";
$language["KEYWORDS"]="Kulcsszavak";
$language["LAST_EXTERNAL"]="Utolsó külső torrent frissítés rendben ";
$language["LAST_NEWS"]="Legutóbbi hírek";
$language["LAST_POST_BY"]="Legrissebb hozzászólás: ";
$language["LAST_SANITY"]="Utolsó megerősítés rendben ";
$language["LAST_TORRENTS"]="Legújabb torrentek";
$language["LAST_UPDATE"]="Utoljára frissítette";
$language["LASTPOST"]="Legfrisseb üzenet";
$language["LEECHERS"]="leecher-ek";
$language["LEFT"]="balra";
$language["LOGIN"]="Bejelentkezés";
$language["LOGOUT"]="Kijelentkezés";
$language["MAILBOX"]="Levelek";
$language["MANAGE_NEWS"]="Hírek karbantartás";
$language["MEMBER"]="Tag";
$language["MEMBERS"]="Tagok";
$language["MEMBERS_LIST"]="Tag lista";
$language["MINIMUM_100_DOWN"]="(minimum 100MB letöltés)";
$language["MINIMUM_5_LEECH"]="Minimum 5 letöltő, a halott torrenteket nem beleértve";
$language["MINIMUM_5_SEED"]="Minimum 5 feltöltővel";
$language["MKTOR_INVALID_HASH"]="Torrent készítés: Hibás hash fogadás";
$language["MNU_ADMINCP"]="Admin vezérlő";
$language["MNU_FORUM"]="Fórum";
$language["MNU_INDEX"]="Főoldal";
$language["MNU_MEMBERS"]="Tagok";
$language["MNU_NEWS"]="Hírek";
$language["MNU_STATS"]="TOP";
$language["MNU_STAFF"]="Staff";
$language["MNU_TORRENT"]="Torrentek";
$language["MNU_UCP_CHANGEPWD"]="Jelszó változtatás";
$language["MNU_UCP_HOME"]="Profil";
$language["MNU_UCP_IN"]="Levelek";
$language["MNU_UCP_INFO"]="Profil vezérlő";
$language["MNU_UCP_NEWPM"]="Új üzenet (PM)";
$language["MNU_UCP_OUT"]="Kimenő üzenetek (PM)";
$language["MNU_UCP_PM"]="Bejövő üzenetek (PM)";
$language["MNU_UPLOAD"]="Feltöltés";
$language["MORE_SMILES"]="Még több ugráló, mozgó izé...";
$language["MORE_THAN"]="Több mint   ";
$language["MORE_THAN_2"]=" találatok, az első megjelenítése";
$language["NA"]="N/A";
$language["NAME"]="Név";
$language["NEED_COOKIES"]="Megjegyzés: Engedélyezbed kell a cookie-kat a böngésződben a bejelentkezéshez!";
$language["NEW_COMMENT"]="Új hozzászólás írása...";
$language["NEW_COMMENT_T"]="Új hozzászólás";
$language["NEWS"]="a hírek";
$language["NEWS_DESCRIPTION"]="Hírek:";
$language["NEWS_INSERT"]="Híred beszúrása";
$language["NEWS_PANEL"]="Hírek Panel";
$language["NEWS_TITLE"]="Cím:";
$language["NEXT"]="Következő";
$language["NO"]="Nem";
$language["NO_BANNED_IPS"]="nincsenek kitiltott IP-k";
$language["NO_COMMENTS"]="Nincs hozzászólás...";
$language["NO_FORUMS"]="Nem találtam fórumot!";
$language["NO_MAIL"]="nincs új üzeneted.";
$language["NO_MESSAGES"]="Nincs üzeneted...";
$language["NO_NEWS"]="nincs hír";
$language["NO_PEERS"]="Nincsenek peerek";
$language["NO_RECORDS"]="Sajnálom, már üres a lista...";
$language["NO_TOPIC"]="Nem találtam témát";
$language["NO_TORR_UP_USER"]="A felhasználónak nincs feltöltött torrentje";
$language["NO_TORRENTS"]="Nincs torrent itt...";
$language["NO_USERS_FOUND"]="Nem találtam felhasználókat!";
$language["NOBODY_ONLINE"]="Senki sincs bejelentkezve";
$language["NONE"]="Nincs";
$language["NOT_ADMIN_CP_ACCESS"]="Nincs jogosultságod az admin panel hozzáféréséhez!";
$language["NOT_ALLOW_DOWN"]="nem engedélyezett a letöltés innen";
$language["NOT_AUTH_DOWNLOAD"]="Nincs jogosultságod a letöltéshez. Sajnálom...";
$language["NOT_AUTH_VIEW_NEWS"]="Nincs engedélyed a hírek megtekintéséhez!";
$language["NOT_AUTHORIZED"]="Nincs engedélyed ennek az oldalnak a megtekintéséhez!";
$language["NOT_AUTHORIZED_UPLOAD"]="Nincs jogosultságod a feltöltéshez!<br><br>Klikk <a class=altlink href=uploaderrequest.php>ide</a> hogy feltöltő lehess!";
$language["NOT_AVAILABLE"]="N/A";
$language["NOT_MAIL_IN_URL"]="Nincs ilyen e-mail cím";
$language["NOT_POSS_RESET_PID"]="Probléma az újrakért PID-del(azonosítókulcs)! <br />Jelezd egy adminnak...";
$language["NOW_LOGIN"]="Mostmár beléphetsz.";
$language["NUMBER_SHORT"]="#";
$language["OLD_PWD"]="Régi jelszó";
$language["ONLY_REG_COMMENT"]="Csak regisztrált tagok írhatnak hozzászólást!";
$language["OPT_DB_RES"]="Adatbázis optimizálás eredménye";
$language["OPTION"]="Opció";
$language["PASS_RESET_CONF"]="jelszó csere jóváhagyás";
$language["PEER_CLIENT"]="Kliens";
$language["PEER_COUNTRY"]="Ország";
$language["PEER_ID"]="Peer ID";
$language["PEER_LIST"]="Peerek Listája";
$language["PEER_PORT"]="Port";
$language["PEER_PROGRESS"]="Folyamat";
$language["PEER_STATUS"]="Státusz";
$language["PEERS"]="peer-ek";
$language["PEERS_DETAILS"]="Kattints ide a peer adatok részleteinek megtekintéséhez";
$language["PICTURE"]="kép";
$language["PID"]="Torrent azonosítókulcs";
$language["PLEASE_WAIT"]="Kérlek várj...";
$language["PM"]="Üzenet";
$language["POSITION"]="Pozíció";
$language["POST_REPLY"]="Válasz az üzenetre";
$language["POSTED_BY"]="Írta";
$language["POSTED_DATE"]="Elküldve";
$language["POSTS"]="Üzenetek";
$language["POSTS_PER_DAY"]="%s  üzi naponta";
$language["POSTS_PER_PAGE"]="Üzenetek oldalanként";
$language["PREVIOUS"]="Prev.";
$language["PRIVATE_MSG"]="Személyes üzenet";
$language["PWD_CHANGED"]="Jelszó megváltoztatva!";
$language["QUESTION"]="Kérdés";
$language["QUICK_JUMP"]="Gyors ugrás";
$language["QUOTE"]="Idéz";
$language["RANK"]="Rang";
$language["RATIO"]="Arányod";
$language["REACHED_MAX_USERS"]="A felhasználók maximális számát elértük ;-) Sajnálom";
$language["READED"]="Olvas";
$language["RECEIVER"]="Kinek";
$language["RECOVER_DESC"]="Az alul található űrlapot használd jelszavad visszaállításához és fiókod újra aktiválásához<br>(Kapni fogsz egy válasz mailt.)";
$language["RECOVER_PWD"]="Elfelejtett jelszó helyreállítása";
$language["RECOVER_TITLE"]="Az elfelejtett felhasználónév vagy jelszó visszaállítása";
$language["REDIRECT"]="Ha a böngésződ nem engedélyezi a java scriptet, klikk ide";
$language["REDOWNLOAD_TORR_FROM"]="Torrent újra letöltése innen";
$language["REGISTERED"]="Tagok";
$language["REGISTERED_EMAIL"]="Regisztrált email címed";
$language["REMOVE"]="Eltávolít";
$language["REPLIES"]="Válaszok";
$language["REPLY"]="Válasz";
$language["RESULT"]="Eredmény";
$language["RETRY"]="újra megpróbál";
$language["RETURN_TORRENTS"]="Vissza a torrentekhez";
$language["REVERIFY_CONGRATS1"]="<center><br />Gratulálok, email címed megerősítetted és sikeresen változtattad<br /><br /><strong>From: <font color=\"red\">";
$language["REVERIFY_CONGRATS2"]="</strong></font><br /><strong>To: <font color=\"red\">";
$language["REVERIFY_CONGRATS3"]="</strong></font><br /><br />";
$language["REVERIFY_FAILURE"]="<center><br /><strong><font color=\"red\"><u>Sajnálom, de ez az url nem érvényes</u></strong></font><br /><br />Egy véletlenszerű szám létrehozása minden alkalommal, mikor megkísérelsz változtatni<br />Ha nézed ezt az üzenetet akkor valószínű többszőr próbáltál változtatni az e-mail címeden, de még a régit használod.<br /><br /><strong>Kérlek várd meg míg megérkezik az <br />megerősítő e-mail, mielőtt újra próbálkoznál. Szóval, ne kapkodj, no para!</strong><br /><br />";
$language["REVERIFY_MSG"]="Ha megpróbálsz változtatni e-mail címet, kapni fogsz egy visszaigazoló linket amire kattintva megváltoztatást kérheted.<br /><br /><font color=\"red\"><strong>Az e-mail címed nem fog frissülni addig míg nem kattintasz a visszaigazoló linkre.</strong></font>";
$language["RIGHT"]="jobbra";
$language["SEARCH"]="Keresés";
$language["SEEDERS"]="seed-ek";
$language["SEEN"]="Nézett";
$language["SELECT"]="Választ...";
$language["SENDER"]="Küldő";
$language["SENT_ERROR"]="Küldési hiba";
$language["SHORT_C"]="C"; //Shortname for Completed
$language["SHORT_L"]="L"; //Shortname for Leechers
$language["SHORT_S"]="S"; //Shortname for Seeders
$language["SHOUTBOX"]="Üzenőfal";
$language["SIZE"]="Méret";
$language["SORRY"]="Sajnálom";
$language["SORTID"]="Csoportosít ID";
$language["SPEED"]="Seb.";
$language["STICKY"]="beragadt";
$language["SUB_CATEGORY"]="Al-kategória";
$language["SUBJECT"]="Tárgy";
$language["SUBJECT_MAX_CHAR"]="A tárgy korlátozott karakterszámú ";
$language["SUC_POST_SUC_EDIT"]="Üzeneted szerkesztzése sikeres.";
$language["SUC_SEND_EMAIL"]="A megerősítő emailt elküldtünk erre a címre:";
$language["SUC_SEND_EMAIL_2"]="Pár perc múlva ellenőrizd a postaládád.";
$language["SUCCESS"]="sikeres";
$language["SUMADD_BUG"]="A tracker hibát summaryAdd-nek hívják";
$language["TABLE_NAME"]="Tábla neve";
$language["TIMEZONE"]="Időzóna";
$language["TITLE"]="cím";
$language["TOP"]="top";
$language["TOP_10_ACTIVE"]="TOP 10 legaktívabb torrent";
$language["TOP_10_BEST_SEED"]="TOP10 legjobban seedelt torrent";
$language["TOP_10_BSPEED"]="TOP 10 leggyorsabb torrent";
$language["TOP_10_DOWNLOAD"]="Top 10 letöltő";
$language["TOP_10_SHARE"]="Top 10 legjobb megosztó";
$language["TOP_10_UPLOAD"]="Top 10 feltöltő";
$language["TOP_10_WORST"]="Top 10 legrosszabb megosztó";
$language["TOP_10_WORST_SEED"]="10 legrosszabbul seedelt torrent";
$language["TOP_10_WSPEED"]="10 leglassabb torrent";
$language["TOP_TORRENTS"]="Legnépszerűbb torrentek";
$language["TOPIC"]="Téma";
$language["TOPICS"]="Témák";
$language["TOPICS_PER_PAGE"]="Témák oldalanként";
$language["TORR_PEER_DETAILS"]="Torrent peer-ek részletei";
$language["TORRENT"]="Torrent";
$language["TORRENT_ANONYMOUS"]="Névtelenül küldés";
$language["TORRENT_CHECK"]="Engedélyezi az információkat visszakeresni és használni a torrent fájlból.";
$language["TORRENT_DETAIL"]="Torrent részletei";
$language["TORRENT_FILE"]="Torrent Fájl";
$language["TORRENT_SEARCH"]="Torrent keresése";
$language["TORRENT_STATUS"]="Állapot";
$language["TORRENT_UPDATE"]="Frissítés, kérlek várj...";
$language["TORRENTS"]="torrentek";
$language["TORRENTS_PER_PAGE"]="Torrentek oldalanként";
$language["TRACK_DB_ERR"]="Tracker/adatbázis hiba. Nézd meg a hibanaplóban.";
$language["TRACKER_INFO"]="$users felh., tracking $torrents torrentek ($seeds seeder e $leechers letöltők, $percent%)";
$language["TRACKER_LOAD"]="Tracker töltés";
$language["TRACKER_SETTINGS"]="Tracker beállítások";
$language["TRACKER_STATS"]="Tracker Státusz";
$language["TRACKING"]="tracking";
$language["TRAFFIC"]="Forgalom";
$language["UCP_NOTE_1"]="Bejövő levelek kezelése,levelezés, jelszó módosítás";
$language["UCP_NOTE_2"]="Beállítások kezelése és módosítása, PM írás profil módosítása stb...";
$language["UNAUTH_IP"]="Jogosulatlan IP cím";
$language["UNKNOWN"]="ismeretlen";
$language["UPDATE"]="Frissít";
$language["UPFAILED"]="Sikertelen feltöltés";
$language["UPLOAD_IMAGE"]="Kép feltöltés";
$language["UPLOAD_LANGUAGE_FILE"]="Nyelvi File Feltöltés";
$language["UPLOADED"]="Feltöltött";
$language["UPLOADER"]="Feltöltő";
$language["UPLOADS"]="Feltöltés";
$language["URL"]="URL";
$language["USER_CP"]="profil";
$language["USER_CP_1"]="Beállításaim";
$language["USER_DETAILS"]="Felh. részletei";
$language["USER_EMAIL"]="Valós email cím";
$language["USER_ID"]="User ID";
$language["USER_JOINED"]="Csatlakozott";
$language["USER_LASTACCESS"]="Legutóbb itt volt";
$language["USER_LEVEL"]="Rang";
$language["USER_LOCAL_TIME"]="User's Local Time";
$language["USER_NAME"]="Tag";
$language["USER_PASS_RECOVER"]="jelszó/felhasználó helyreállítás";
$language["USER_PWD"]="Jelszó";
$language["USERS_SEARCH"]="Tag keresése";
$language["VIEW_DETAILS"]="Részletekhez";
$language["VIEW_TOPIC"]="Témához";
$language["VIEW_UNREAD"]="Olvasatlanok megnézése";
$language["VIEWS"]="nézték";
$language["VISITOR"]="látogató";
$language["VISITORS"]="látogatók";
$language["WAIT_ADMIN_VALID"]="Várd meg míg egy administrátor érvényesíti a regisztrációd...";
$language["WARNING"]="FIGYELEM!";
$language["WELCOME"]="Üdv";
$language["WELCOME_ADMINCP"]="Üdvözöllek az admin beállításoknál";
$language["WELCOME_BACK"]="Üdv újra";
$language["WELCOME_UCP"]="Üdv. a profilodban";
$language["WORD_AND"]="és";
$language["WORD_NEW"]="Új";
$language["WROTE"]="írta";
$language["WT"]="WT";
$language["X_TIMES"]="idő";
$language["YES"]="Igen";
$language["LAST_IP"]="Utolsó IP cím";
$language["FIRST_UNREAD"]="Ugrás az első olvasatlan hozzászóláshoz";
$language["MODULE_UNACTIVE"]="A modul nem aktív!";
$language["MODULE_NOT_PRESENT"]="Nincs ilyen modul!";
$language["MODULE_LOAD_ERROR"]="A modul nem, vagy rosszül mükődik!";
?>