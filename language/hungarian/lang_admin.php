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
$language["ACP_BAN_IP"]="Kitiltott IPk";
$language["ACP_FORUM"]="Fórum beállítások";
$language["ACP_USER_GROUP"]="Rang beállítások";
$language["ACP_STYLES"]="Stílus beállítások";
$language["ACP_LANGUAGES"]="Nyelv-beállítások";
$language["ACP_CATEGORIES"]="Kategória beállítások";
$language["ACP_TRACKER_SETTINGS"]="Tracker beállítások";
$language["ACP_OPTIMIZE_DB"]="Adatbázis optimizálás";
$language["ACP_CENSORED"]="Cenzúrázott szöveg beállítások";
$language["ACP_DBUTILS"]="Adatbázis segédprogramok";
$language["ACP_HACKS"]="Hackek";
$language["ACP_HACKS_CONFIG"]="Hack beállítások";
$language["ACP_MODULES"]="Modulok";
$language["ACP_MODULES_CONFIG"]="Modul beállítások";
$language["ACP_MASSPM"]="Körüzenet";
$language["ACP_PRUNE_TORRENTS"]="PRUNE(inakt.autom.) Torrentek";
$language["ACP_PRUNE_USERS"]="PRUNE(inakt.autom.) Felhasználók";
$language["ACP_SITE_LOG"]="Oldalnapló megtekintése";
$language["ACP_SEARCH_DIFF"]="Diff. keresés";
$language["ACP_BLOCKS"]="Blokk  beállítások";
$language["ACP_POLLS"]="Szavazás beállítások";
$language["ACP_MENU"]="Admin Menü";
$language["ACP_FRONTEND"]="Szav. tartalmi beállítások";
$language["ACP_USERS_TOOLS"]="Felhasznál eszközök";
$language["ACP_TORRENTS_TOOLS"]="Torrent eszközök";
$language["ACP_OTHER_TOOLS"]="Egyéb eszközök";
$language["ACP_MYSQL_STATS"]="MySql Statisztika";
$language["XBTT_BACKEND"]="xbtt lehetőségek";
$language["XBTT_USE"]="Use <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">xbtt</a> as backend?";
$language["XBTT_URL"]="xbtt base url e.g. http://localhost:2710";
$language["GENERAL_SETTINGS"]="Általános beállítások";
$language["TRACKER_NAME"]="Oldalnév";
$language["TRACKER_BASEURL"]="Bázis Tracker URL (a végén /(per) jel nélkül)";
$language["TRACKER_ANNOUNCE"]="Tracker Announce URL-ek (egyetlen url soronként)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Ellenőrizd az announce url-ek kétszer is, engedélyezve van e xbtt backend...</span>":"");
$language["TRACKER_EMAIL"]="Tracker/tulaj email";
$language["TORRENT_FOLDER"]="Torrent oldal";
$language["ALLOW_EXTERNAL"]="külső torrentek engedélyezése";
$language["ALLOW_GZIP"]="GZIP engedélyezése";
$language["ALLOW_DEBUG"]="infók Debug(zavaró tényezőt kiiktatni) az oldal alján";
$language["ALLOW_DHT"]="Tiltás DHT (private torrent)<br />\nbefogja állítani a feltöltött torrenteken";
$language["ALLOW_LIVESTATS"]="Engedélyezés a Live Stats (a figyelmeztetés a  server tölti be!)";
$language["ALLOW_SITELOG"]="Engedélyezed a Bázis oldalnaplót(Eseménynapló torrentek/felhasználók-ról)";
$language["ALLOW_HISTORY"]="Engedélyezed a Bázis történet (torrentek/felhasználók)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Engedélyezi privát announce";
$language["ALLOW_PRIVATE_SCRAPE"]="Engedélyezi privát scrape";
$language["SHOW_UPLOADER"]="Feltöltő név mutatása";
$language["USE_POPUP"]="Felugró ablak a Torrentek részletei/peerek-ről";
$language["DEFAULT_LANGUAGE"]="Alapértelmezett nyelv";
$language["DEFAULT_CHARSET"]="Alapértelmezett betűkészlet<br />\n(ha a nyelved nem mutat helyesen, megpróbálni UTF-8)";
$language["DEFAULT_STYLE"]="Alapértelmezett stílus";
$language["MAX_USERS"]="Max felhasználók (numerikus, 0 = nincs korlát)";
$language["MAX_TORRENTS_PER_PAGE"]="Torrent oldalanként";
$language["SPECIFIC_SETTINGS"]="Tracker specifikus beállítások";
$language["SETTING_INTERVAL_SANITY"]="Megerősítő időköz (numerikus másodperc, 0 = tiltva)<br />Jó érték, ha engedélyezett,és 1800 (30 perc)";
$language["SETTING_INTERVAL_EXTERNAL"]="Külső frissítési időköz (numerikus másodperc, 0 = tiltva)<br />Attól függően hány külső torrent van";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Maximum reannounce időköz (numerikus másodperc)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Minimum reannounce időköz (numerikus másodperc)";
$language["SETTING_MAX_PEERS"]="Max peer szám a kéréseknél (numerikus)";
$language["SETTING_DYNAMIC"]="Engedélyezed a Dinamikus Torrenteket (nem javasolt)";
$language["SETTING_NAT_CHECK"]="NAT ellenőrzés";
$language["SETTING_PERSISTENT_DB"]="Állandó kapcsolatok (Adatbázis, nem javasolt)";
$language["SETTING_OVERRIDE_IP"]="Engedélyezed az észlelt felhasználó IP hatálytalanítását";
$language["SETTING_CALCULATE_SPEED"]="Kiszámítja a sebességet és letöltött byte-okat";
$language["SETTING_PEER_CACHING"]="Tabla gyorsítótárak (kis csökkentés a betöltés terhein)";
$language["SETTING_SEEDS_PID"]="Max feltöltők száma azonos PID-del";
$language["SETTING_LEECHERS_PID"]="Max letöltők száma azonos PID-del";
$language["SETTING_VALIDATION"]="Megerősítés módja";
$language["SETTING_CAPTCHA"]="Biztonságos regisztráció (Képkód használata,, GD+Freetype könyvtár megkövetelt)";
$language["SETTING_FORUM"]="Fórum link, tud lenni:<br /><li><font color='#FF0000'>belső</font> vagy üres (nincs érték) belső fórumért</li><li><font color='#FF0000'>smf</font> beépített <a target='_new' href='http://www.simplemachines.org'>Simple Machines Fórum</a></li><li>Saját külső fórum (Add meg a url-t a beviteli mezőbe)</li>";
$language["BLOCKS_SETTING"]="Index/Blokk oldal beállítások";
$language["SETTING_CLOCK"]="Óra típusa";
$language["SETTING_NUM_NEWS"]="Korlát a legújabb híreknél (numerikus)";
$language["SETTING_NUM_POSTS"]="Korlát a Forum blokkban (numerikus)";
$language["SETTING_NUM_LASTTORRENTS"]="Korlát a Legújabb torrentek blokkban (numerikus)";
$language["SETTING_NUM_TOPTORRENTS"]="Korlát a Legnépszerűbb torrentek blokkban (numerikus)";
$language["CLOCK_ANALOG"]="Analóg";
$language["CLOCK_DIGITAL"]="Digitális";
$language["CONFIG_SAVED"]="A konfiguráció mentése hibátlanul megtörtént!";
$language["CACHE_SITE"]="Gyorsítótár időköz (numerikus másodperc, 0 = tiltva)";
$language["ALL_FIELDS_REQUIRED"]="Minden rész kitöltése kötelező!";
$language["SETTING_CUT_LONG_NAME"]="Torrent név hány karakter hosszú (0 = nincs rövidítés)";
$language["MAILER_SETTINGS"]="Postázó";
$language["SETTING_MAIL_TYPE"]="Mail Típusa";
$language["SETTING_SMTP_SERVER"]="SMTP Szerver";
$language["SETTING_SMTP_PORT"]="SMTP Port";
$language["SETTING_SMTP_USERNAME"]="SMTP felh.név";
$language["SETTING_SMTP_PASSWORD"]="SMTP jelszó";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="SMTP jelszó (ismétel)";
$language["XBTT_TABLES_ERROR"]="Importálhatsz xbtt tables-eket (nézd meg a xbtt telepítési instrukciókat) az adatbázisodba előtte aktiváld xbtt támogatást!";
$language["XBTT_URL_ERROR"]="xbtt alap url hiba!";
// BAN FORM
$language["BAN_NOTE"]="Ebben a részben tilthatsz ki ip-ket illetve karbantarthatod az ilyeneket.<br />\nBehelyeznél egyet (első IP)-tól (legújabb IP)-ig.";
$language["BAN_NOIP"]="Nincs kitiltott IP";
$language["BAN_FIRSTIP"]="első IP";
$language["BAN_LASTIP"]="legújabb IP";
$language["BAN_COMMENTS"]="BAN komentár";
$language["BAN_REMOVE"]="eltávolít";
$language["BAN_BY"]="Bannolta";
$language["BAN_ADDED"]="Dátum";
$language["BAN_INSERT"]="Behelyeznéd az új kitiltott IP-t";
$language["BAN_IP_ERROR"]="kitiltott IP cím.";
$language["BAN_NO_IP_WRITE"]="Nem írtál be IP címet, sajnálom!. Sajnálom!";
$language["BAN_DELETED"]="Az IP sort törölték adatbázisból.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Vissza kitiltott IP-khez</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Nyelvi beállítások";
$language["LANGUAGE"]="Nyelv";
$language["LANGUAGE_ADD"]="Beilleszt egy nyelvet";
$language["LANGUAGE_SAVED"]="Congratulations, language has been modified";
// STYLES
$language["STYLE_SETTINGS"]="Stílus/Téma Beállítások";
$language["STYLE_EDIT"]="Stílus szerkesztése";
$language["STYLE_ADD"]="Beilleszt egy új stílust";
$language["STYLE_NAME"]="Stílus neve";
$language["STYLE_URL"]="Stílus URL";
$language["STYLE_FOLDER"]="Stílus könytár ";
$language["STYLE_NOTE"]="Itt kezelheted a stílus beállításokat, feltöltéshez használj ftp vagy sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Kategória beállítások";
$language["CATEGORY_IMAGE"]="Kategória kép";
$language["CATEGORY_ADD"]="Beilleszt egy új Kategóriát";
$language["CATEGORY_SORT_INDEX"]="csoport indexelés";
$language["CATEGORY_FULL"]="Kategória";
$language["CATEGORY_EDIT"]="Kategória szerkesztés";
$language["CATEGORY_SUB"]="Al-kategória";
$language["CATEGORY_NAME"]="Kategória";
// CENSORED
$language["CENSORED_NOTE"]="Írj be <b>egyetlen szót soronként</b> tiltásra (innentől tiltva lesz *cenzúrázott*)";
$language["CENSORED_EDIT"]="Szerkeszt a cenzúrázott szöveget";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Blokk beállítások";
$language["ENABLED"]="engedélyezve";
$language["ORDER"]="rendezése";
$language["BLOCK_NAME"]="Blokk neve";
$language["BLOCK_POSITION"]="Pozíció/helyzet";
$language["BLOCK_TITLE"]="Nyelvi cím (pl.: BLOCK_ONLINE. viszont a lefordított címet fogja használni mejelenítésre:jelenlevők)";
$language["BLOCK_USE_CACHE"]="Gyorsítótár blokkolása?";
$language["ERR_BLOCK_NAME"]="Kiválaszt egyet a lehetővé tett fájnevek közül lent!";
$language["BLOCK_ADD_NEW"]="Új blokk hozzáadása";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="szavazás beállítások";
$language["POLLID"]="Voks";
$language["INSERT_NEW_POLL"]="Új szavazás hozzáadása";
$language["CANT_FIND_POLL"]="Nem találtam szavazást";
$language["ADD_NEW_POLL"]="Szavazás hozzáadása";
// GROUPS
$language["USER_GROUPS"]="Felhasználói csoport beállítások (klikk a csoport névre szerkesztéséhez)";
$language["VIEW_EDIT_DEL"]="néz/szerk/törl";
$language["CANT_DELETE_GROUP"]="Ezt a csoportot/szintet nem érvénytelenítheted!";
$language["GROUP_NAME"]="Csoport neve";
$language["GROUP_VIEW_NEWS"]="Hírek nézet";
$language["GROUP_VIEW_FORUM"]="Fórum nézet";
$language["GROUP_EDIT_FORUM"]="Fórum szerkesztés";
$language["GROUP_BASE_LEVEL"]="Válasz alap szintet";
$language["GROUP_ERR_BASE_SEL"]="Hibás alapszint választás!";
$language["GROUP_DELETE_NEWS"]="Hírek törlése";
$language["GROUP_PCOLOR"]="Előtag szín (szabadon ";
$language["GROUP_SCOLOR"]="Suffix Color (szabadon ";
$language["GROUP_VIEW_TORR"]="Torrent nézet";
$language["GROUP_EDIT_TORR"]="Torrent szerkesztés";
$language["GROUP_VIEW_USERS"]="Felhasználók nézet";
$language["GROUP_DELETE_TORR"]="Torrent törlés";
$language["GROUP_EDIT_USERS"]="Felhasználók szerkesztése";
$language["GROUP_DOWNLOAD"]="Letölthet";
$language["GROUP_DELETE_USERS"]="Felhasználók törlése";
$language["GROUP_DELETE_FORUM"]="Fórum törlése";
$language["GROUP_GO_CP"]="Hozzáférés az Admin vezérlőpulthoz";
$language["GROUP_EDIT_NEWS"]="Hírek szerkesztése";
$language["GROUP_ADD_NEW"]="Új csoport hozzáadása";
$language["GROUP_UPLOAD"]="Feltölthet";
$language["GROUP_WT"]="Várakozási idő ha arány <1";
$language["GROUP_EDIT_GROUP"]="Csoport szerkesztése";
$language["GROUP_VIEW"]="néz";
$language["GROUP_EDIT"]="szerk";
$language["GROUP_DELETE"]="törl";
$language["INSERT_USER_GROUP"]="Beilleszt egy új felh. csoport";
$language["ERR_CANT_FIND_GROUP"]="Nem talált ilyen felh. csoportot";
$language["GROUP_DELETED"]="A csoport törölve!";
// MASS PM
$language["USERS_FOUND"]="talált felhasználók";
$language["USERS_PMED"]="Felhasználók üzenetei";
$language["WHO_PM"]="Kinek lesz a körüzi elküldve?";
$language["MASS_SENT"]="körPM küld!!!";
$language["MASS_PM"]="körPM";
$language["MASS_PM_ERROR"]="Tényleg jó gondolat egyből elküldeni, mint inkább előterjeszteni!!!!";
$language["RATIO_ONLY"]="csak ez az arány";
$language["RATIO_GREAT"]="nagyobb arányúaknak ettől";
$language["RATIO_LOW"]="kisebb arányúaknak ettől";
$language["RATIO_FROM"]="ettől a";
$language["RATIO_TO"]="eddig";
$language["MASSPM_INFO"]="Info";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Elavult felhasználók";
$language["PRUNE_USERS"]="Elavult felhasználók";
$language["PRUNE_USERS_INFO"]="Illeszd be a napok számát mikortól tekintheti \"inaktívnak\" azaz elavult a rendszer (nem jelentkeztek be x napja vagy nem erősítették meg x napja a kapott linket)";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Diff. keresés";
$language["SEARCH_DIFF_MESSAGE"]="üzenet";
$language["DIFFERENCE"]="Különbség";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Rang";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Elavult torrentek";
$language["PRUNE_TORRENTS"]="Elavult torrentek";
$language["PRUNE_TORRENTS_INFO"]="Illeszd be a napok számát, amitől tekintheti \"inaktívnak\" azaz elavultnak a rendszer.";
$language["LEECHERS"]="letöltő(k)";
$language["SEEDS"]="seeder-e(k)";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Tábla név";
$language["DBUTILS_RECORDS"]="Records(sorok)";
$language["DBUTILS_DATALENGTH"]="adathossza";
$language["DBUTILS_OVERHEAD"]="felső";
$language["DBUTILS_REPAIR"]="Javít";
$language["DBUTILS_OPTIMIZE"]="Optimizál";
$language["DBUTILS_ANALYSE"]="Elemez";
$language["DBUTILS_CHECK"]="ell.";
$language["DBUTILS_DELETE"]="törlés";
$language["DBUTILS_OPERATION"]="Művelet";
$language["DBUTILS_INFO"]="Info";
$language["DBUTILS_STATUS"]="Státusz";
$language["DBUTILS_TABLES"]="Tábla";
// MYSQL STATUS
$language["MYSQL_STATUS"]="MySQL Státusz";
// SITE LOG
$language["SITE_LOG"]="Oldal napló";
// FORUMS
$language["FORUM_MIN_CREATE"]="Min osztály készít ";
$language["FORUM_MIN_WRITE"]="Min osztály irás";
$language["FORUM_MIN_READ"]="Min osztály olvas";
$language["FORUM_SETTINGS"]="Fórum beállítások";
$language["FORUM_EDIT"]="Fórum szerkesztés";
$language["FORUM_ADD_NEW"]="Új fórum hozzáadása";
$language["FORUM_PARENT"]="Szülő fóruma";
$language["FORUM_SORRY_PARENT"]="(Sajnálom, nem rendeltél szülőfórumot hozzá, így ez is szülőfórum lett!)";
$language["FORUM_PRUNE_1"]="Van téma-(k)vagy üzenetek ebben a fórumban!<br />Minden adat el fog veszni...<br />";
$language["FORUM_PRUNE_2"]="Ha jogosult vagy a fórum törlésére";
$language["FORUM_PRUNE_3"]="vagy gyerünk vissza .";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Törölnél egy szülőfórumot, amelyik mozgat más fórumokat, ha igen próbáld újra";
// MODULES
$language["ADD_NEW_MODULE"]="Új Modul hozzáadása";
$language["TYPE"]="Típus";
$language["DATE_CHANGED"]="Változtatás dátuma";
$language["DATE_CREATED"]="Készítés dátuma";
$language["ACTIVE_MODULES"]="Aktív Modul: ";
$language["NOT_ACTIVE_MODULES"]="Inaktív Modul: ";
$language["TOTAL_MODULES"]="Össz. Modul: ";
$language["DEACTIVATE"]="Hatástalanított";
$language["ACTIVATE"]="Aktívált";
$language["STAFF"]="Staff";
$language["MISC"]="Különféle";
$language["TORRENT"]="Torrent";
$language["STYLE"]="Stílus";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="cím";
$language["HACK_VERSION"]="Verzió";
$language["HACK_AUTHOR"]="Szerző";
$language["HACK_ADDED"]="Hozzáadta";
$language["HACK_NONE"]="Nincs hack telepítve";
$language["HACK_ADD_NEW"]="Új hack hozzáadása";
$language["HACK_SELECT"]="kiválasztás";
$language["HACK_STATUS"]="Státusz";
$language["HACK_INSTALL"]="Telepít";
$language["HACK_UNINSTALL"]="Eltávolít";
$language["HACK_INSTALLED_OK"]="Hack telepítése sikeres!<br />\nGyerünk vissza a hack beállításokhoz  <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminvezérlő (Hacks)</a>";
$language["HACK_BAD_ID"]="Hiba, a hack info ezzel az ID-vel hibás .";
$language["HACK_UNINSTALLED_OK"]="Hack eltávolítása sikeres!<br />\nGyerünk vissza a hack beállításokhoz <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminvezérlő (Hacks)</a>";
// USERS TOOLS
$language["USER_NOT_DELETE"]="Nem törölheted a vendég felhasználót vagy önmagad, mégse vagy mágus!";
$language["USER_NOT_EDIT"]="Nem törölheted a vendég felhasználót vagy önmagad, mégse vagy mágus!";
?>