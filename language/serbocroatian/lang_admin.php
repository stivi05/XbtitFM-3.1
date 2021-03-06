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
$language["ACP_BAN_IP"]="Banuj IP adrese";
$language["ACP_FORUM"]="Forum podesavanja";
$language["ACP_USER_GROUP"]="Korisnicke grupe podesavanja";
$language["ACP_STYLES"]="Izgled podesavanja";
$language["ACP_LANGUAGES"]="Jezik podesavanja";
$language["ACP_CATEGORIES"]="Kategorije podesavanja";
$language["ACP_TRACKER_SETTINGS"]="Tracker podesavanja";
$language["ACP_OPTIMIZE_DB"]="Optimiziraj bazu podataka";
$language["ACP_CENSORED"]="Cenzurisane rijeci podesavanja";
$language["ACP_DBUTILS"]="Alati baze podataka";
$language["ACP_HACKS"]="Hackovi";
$language["ACP_HACKS_CONFIG"]="Hackovi podesavanja";
$language["ACP_MODULES"]="Moduli";
$language["ACP_MODULES_CONFIG"]="Moduli podesavanja";
$language["ACP_MASSPM"]="Masovni privatni e-mail";
$language["ACP_PRUNE_TORRENTS"]="Brisanje torrenata";
$language["ACP_PRUNE_USERS"]="Brisanje korisnika";
$language["ACP_SITE_LOG"]="Pregledaj Log trackera";
$language["ACP_SEARCH_DIFF"]="Pretraga razlike u dl/up";
$language["ACP_BLOCKS"]="Blokovi podesavanja";
$language["ACP_POLLS"]="Ankete podesavanja";
$language["ACP_MENU"]="Admin meni";
$language["ACP_FRONTEND"]="Sadrzaj podesavanja";
$language["ACP_USERS_TOOLS"]="Korisnicki alati";
$language["ACP_TORRENTS_TOOLS"]="Torrent alati";
$language["ACP_OTHER_TOOLS"]="Drugi alati";
$language["ACP_MYSQL_STATS"]="MySql statistika";
$language["XBTT_BACKEND"]="XBTT opcija";
$language["XBTT_USE"]="Koristite <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">XBTT</a> kao pozadinski tracker?";
$language["XBTT_URL"]="XBTT URL lokacija (kao http://localhost:2710)";
$language["GENERAL_SETTINGS"]="Generalna podesavanja";
$language["TRACKER_NAME"]="Naziv trackera";
$language["TRACKER_BASEURL"]="Tracker URL lokacija (bez zadnje ==> /)";
$language["TRACKER_ANNOUNCE"]="Tracker Announce URL-ovi (jedan url po redu)";
$language["TRACKER_EMAIL"]="Tracker/vlasnicki e-mail";
$language["TORRENT_FOLDER"]="Torrent direktorijum";
$language["ALLOW_EXTERNAL"]="Dozvoli spoljasnje torrente";
$language["ALLOW_GZIP"]="Aktiviraj GZIP kompresiju";
$language["ALLOW_DEBUG"]="Pokazi debug info na dnu stranice";
$language["ALLOW_DHT"]="Onesposobi DHT (privatna zastavica u torrentu)<br />\nbiti ce aktivirano na novo dodanim torrentima";
$language["ALLOW_LIVESTATS"]="Aktiviraj zivu statistiku (moze dovesti do pojacane server aktivnosti!)";
$language["ALLOW_SITELOG"]="Aktiviraj osnovni log trackera (torrenti/korisnici)";
$language["ALLOW_HISTORY"]="Aktiviraj istoriju (torrenti/korisnici)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Privatni announce";
$language["ALLOW_PRIVATE_SCRAPE"]="Privatni scrape";
$language["SHOW_UPLOADER"]="Pokazi uploaderovo korisnicko ime";
$language["USE_POPUP"]="Koristite popup za torrente detalji/aktivnost (peers)";
$language["DEFAULT_LANGUAGE"]="Osnovni jezik";
$language["DEFAULT_CHARSET"]="Enkodiranje karaktera<br />\n(ako se vasi karakteri ne pokazuju kako treba, probajte UTF-8)";
$language["DEFAULT_STYLE"]="Osnovni izgled";
$language["MAX_USERS"]="Maksimalan broj korisnika (u brojevima, 0 = nema ogranicenja)";
$language["MAX_TORRENTS_PER_PAGE"]="Torrenata po stranici";
$language["SPECIFIC_SETTINGS"]="Tracker specificna podesavanja";
$language["SETTING_INTERVAL_SANITY"]="Sanity interval (broj u sekundama, 0 = onesposobljeno)<br />Dobra vrijednost, ako aktivirano je 1800 sekundi (30 minuta)";
$language["SETTING_INTERVAL_EXTERNAL"]="Obnovi interval spoljasnjih torrenata (broj u sekundama, 0 = onesposobljeno)<br />Zavisi od broja spoljasnjih torrenata";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Maksimum reannounce interval (broj u sekundama)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Minimum reannounce interval (broj u sekundama)";
$language["SETTING_MAX_PEERS"]="Maksimum broj aktivnih (peers) po zahtjevu (broj u sekundama)";
$language["SETTING_DYNAMIC"]="Dozvoli dinamicne torrente (ne preporucujemo)";
$language["SETTING_NAT_CHECK"]="NAT provjera";
$language["SETTING_PERSISTENT_DB"]="Istrajne veze (Baza podataka, ne preporucujemo)";
$language["SETTING_OVERRIDE_IP"]="Dozvoli korisnicima prepisivanje detektovane IP adrese";
$language["SETTING_CALCULATE_SPEED"]="Racunaj brzinu i download bytes";
$language["SETTING_PEER_CACHING"]="Kesiranje Mysql stolova (olaksava rad servera)";
$language["SETTING_SEEDS_PID"]="Maksimalan broj seedera sa istim PID-om";
$language["SETTING_LEECHERS_PID"]="Maksimalan broj leechera sa istim PID-om";
$language["SETTING_VALIDATION"]="Potvrda";
$language["SETTING_CAPTCHA"]="Sigurna registracija (koristite auto generisan kod na slici, potrebno je da imate GD+Freetype libraries instalirane)";
$language["SETTING_FORUM"]="Forum link, moze biti:<br /><li><font color='#FF0000'>unutrasnji</font> ili prazan (bez vrijednosti) za unutrasnji forum</li><li><font color='#FF0000'>smf</font> za integrisani <a target='_new' href='http://www.simplemachines.org'>Simple Machines Forum</a></li><li>Vas vlastiti odabir foruma (Dodajte URL u tekst polje)</li>";
$language["BLOCKS_SETTING"]="Podesavanja Index/Blokovi po strani";
$language["SETTING_CLOCK"]="Tip sata";
$language["SETTING_NUM_NEWS"]="Broj vijesti Zadnje Vijesti bloka";
$language["SETTING_NUM_POSTS"]="Broj postova Forum bloka";
$language["SETTING_NUM_LASTTORRENTS"]="Broj torrenata Zadnje Uploadovani Torrenti bloka";
$language["SETTING_NUM_TOPTORRENTS"]="Broj torrenata Popularni Torrenti bloka";
$language["CLOCK_ANALOG"]="Analogni";
$language["CLOCK_DIGITAL"]="Digitalni";
$language["CONFIG_SAVED"]="Konfiguracija uspjesno sacuvana!";
$language["CACHE_SITE"]="Interval kesiranja (broj u sekundama, 0 = onesposobljeno)";
$language["ALL_FIELDS_REQUIRED"]="Morate popuniti sva polja!";
$language["SETTING_CUT_LONG_NAME"]="Skrati dugacki torrent naziv nakon x karaktera (0 = onesposobljeno)";
$language["MAILER_SETTINGS"]="Mailer";
$language["SETTING_MAIL_TYPE"]="Mail Tip";
$language["SETTING_SMTP_SERVER"]="SMTP Server";
$language["SETTING_SMTP_PORT"]="SMTP Port";
$language["SETTING_SMTP_USERNAME"]="SMTP Korisnicko Ime";
$language["SETTING_SMTP_PASSWORD"]="SMTP Lozinka";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="SMTP Lozinka (Ponovi)";
$language["XBTT_TABLES_ERROR"]="Trtebali bi ste dodati XBTT MySQL stolove (pogledajte xbtt instrukcije za instalaciju) u vasu bazu podataka prije nego aktivirate XBTT kao pozadinski tracker!";
$language["XBTT_URL_ERROR"]="Morate navesti XBTT URL put!";
// BAN FORM
$language["BAN_NOTE"]="U ovom dijelu administracije, mozete vidjeti suspendovane IP adrese i suspendovati nove za pristup trackeru.<br />\nMorate unjeti razmak izmedju pocetne i zadnje IP koju suspendujete (Prva IP) do (Zadnje IP).";
$language["BAN_NOIP"]="Nema suspendovanih IP adresa";
$language["BAN_FIRSTIP"]="Prvi IP";
$language["BAN_LASTIP"]="Zadnji IP";
$language["BAN_COMMENTS"]="Komentari";
$language["BAN_REMOVE"]="Ukloni";
$language["BAN_BY"]="Od";
$language["BAN_ADDED"]="Datum";
$language["BAN_INSERT"]="Dodaj novi IP razmak za suspenziju";
$language["BAN_IP_ERROR"]="Netacna IP adresa.";
$language["BAN_NO_IP_WRITE"]="Niste unjeli IP adresu. Oprostite!";
$language["BAN_DELETED"]="IP razmak je uspjesno obrisan.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Nazad na IP suspenziju</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Jezik podesavanja";
$language["LANGUAGE"]="Jezik";
$language["LANGUAGE_ADD"]="Dodaj novi jezik";
$language["LANGUAGE_SAVED"]="Cestitamo, jezik je uspjesno izmjenjen";
// STYLES
$language["STYLE_SETTINGS"]="Izgled/Teme podesavanja";
$language["STYLE_EDIT"]="Izmjeni Izgled";
$language["STYLE_ADD"]="Dodaj novi Izgled";
$language["STYLE_NAME"]="Naziv Izgleda";
$language["STYLE_URL"]="Izgled/Tema URL";
$language["STYLE_FOLDER"]="Izgled/Tema direktorijum ";
$language["STYLE_NOTE"]="U ovoj sekciji mozete vrsiti podesavanja izgleda, ali prvo morate uploadovati fajlove preko ftp ili sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Kategorije podesavanja";
$language["CATEGORY_IMAGE"]="Slika kategorije";
$language["CATEGORY_ADD"]="Dodaj novu kategoriju";
$language["CATEGORY_SORT_INDEX"]="Index sortiranja";
$language["CATEGORY_FULL"]="Kategorija";
$language["CATEGORY_EDIT"]="Izmjeni kategoriju";
$language["CATEGORY_SUB"]="Pod-Kategorija";
$language["CATEGORY_NAME"]="Kategorija";
// CENSORED
$language["CENSORED_NOTE"]="Pisite <b>jedna rijec po redu</b> za cenzuru (Biti ce promjenjeno u *censored*)";
$language["CENSORED_EDIT"]="Izmjeni cenzurisane rijeci";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Konfiguracija blokova";
$language["ENABLED"]="Osposobljeno";
$language["ORDER"]="Red";
$language["BLOCK_NAME"]="Naziv bloka";
$language["BLOCK_POSITION"]="Pozicija";
$language["BLOCK_TITLE"]="Naziv jezika (biti ce koristen za prikaz prevedenog naziva)";
$language["BLOCK_USE_CACHE"]="Kesiraj ovaj blok?";
$language["ERR_BLOCK_NAME"]="Morate odabrati jedan od osposobljenih fajlova u nazivnom dropdown meniju!";
$language["BLOCK_ADD_NEW"]="Dodaj novi blok";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Ankete konfiguracija";
$language["POLLID"]="ID ankete";
$language["INSERT_NEW_POLL"]="Dodaj novu anketu";
$language["CANT_FIND_POLL"]="Nemozemo pronaci anketu";
$language["ADD_NEW_POLL"]="Dodaj anketu";
// GROUPS
$language["USER_GROUPS"]="Podesavanja grupe korisnika (kliknite na naziv grupe)";
$language["VIEW_EDIT_DEL"]="Pregled/Izmjeni/Izbrisi";
$language["CANT_DELETE_GROUP"]="Ovaj nivo/grupu nemozete otkazati!";
$language["GROUP_NAME"]="Naziv grupe";
$language["GROUP_VIEW_NEWS"]="Vidjeti vijesti";
$language["GROUP_VIEW_FORUM"]="Vidjeti forum";
$language["GROUP_EDIT_FORUM"]="Mjenjati forum";
$language["GROUP_BASE_LEVEL"]="Odaberite pocetni rang";
$language["GROUP_ERR_BASE_SEL"]="Greska u odabiru pocetnog ranga!";
$language["GROUP_DELETE_NEWS"]="Brisati vijesti";
$language["GROUP_PCOLOR"]="Prefix boja (kao ";
$language["GROUP_SCOLOR"]="Suffix boja (kao ";
$language["GROUP_VIEW_TORR"]="Vidjeti torrente";
$language["GROUP_EDIT_TORR"]="Mjenjati torrente";
$language["GROUP_VIEW_USERS"]="Vidjeti korisnike";
$language["GROUP_DELETE_TORR"]="Brisati torrente";
$language["GROUP_EDIT_USERS"]="Mjenjati korisnike";
$language["GROUP_DOWNLOAD"]="Moze downloadovati";
$language["GROUP_DELETE_USERS"]="Brisati korisnike";
$language["GROUP_DELETE_FORUM"]="Brisati forum";
$language["GROUP_GO_CP"]="Pristup Admin sekciji";
$language["GROUP_EDIT_NEWS"]="Mjenjati vijesti";
$language["GROUP_ADD_NEW"]="Dodati novu grupu";
$language["GROUP_UPLOAD"]="Moze uploadovati";
$language["GROUP_WT"]="Cekanje ako je ratio < 1";
$language["GROUP_EDIT_GROUP"]="Mjenjati grupe";
$language["GROUP_VIEW"]="Pregled";
$language["GROUP_EDIT"]="Izmjeni";
$language["GROUP_DELETE"]="Izbrisi";
$language["INSERT_USER_GROUP"]="Dodaj novu korisnicku grupu";
$language["ERR_CANT_FIND_GROUP"]="Ne mozemo pronaci ovu korisnicku grupu!";
$language["GROUP_DELETED"]="Korisnicka grupa je obrisana!";
// MASS PM
$language["USERS_FOUND"]="pronadjeno korisnika";
$language["USERS_PMED"]="PM poslan korisnicima";
$language["WHO_PM"]="Kome saljete PM?";
$language["MASS_SENT"]="Masovni PM poslan!!!";
$language["MASS_PM"]="Masovni PM";
$language["MASS_PM_ERROR"]="Ne bi bila losa ideja da nesto napisete u PM-u prije nego ga posaljete!!!";
$language["RATIO_ONLY"]="samo ovaj ratio";
$language["RATIO_GREAT"]="veci nego ovaj ratio";
$language["RATIO_LOW"]="manji nego ovaj ratio";
$language["RATIO_FROM"]="Od";
$language["RATIO_TO"]="Za";
$language["MASSPM_INFO"]="Info";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Obrisani korisnici";
$language["PRUNE_USERS"]="Obrisi neaktivne korisnike";
$language["PRUNE_USERS_INFO"]="Dodajte broj u danima za korisnike koje cemo tretirati kao \"neaktivne\" (nisu posjetili tracker x dana ili registrovani x dana i jos uvijek ne potvrdjeni)";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Pretraga razlike dl/up";
$language["SEARCH_DIFF_MESSAGE"]="Poruka";
$language["DIFFERENCE"]="Razlika";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Promjeni korisnicku grupu";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Obrisani torrenti";
$language["PRUNE_TORRENTS"]="Obrisi neaktivne torrente";
$language["PRUNE_TORRENTS_INFO"]="Dodajte broj u danima za torrente koje cemo tretirati kao \"neaktivne\"";
$language["LEECHERS"]="leecher(a)";
$language["SEEDS"]="seeder(a)";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Naziv stola";
$language["DBUTILS_RECORDS"]="Unosa";
$language["DBUTILS_DATALENGTH"]="Velicina podataka";
$language["DBUTILS_OVERHEAD"]="Prekoracenje";
$language["DBUTILS_REPAIR"]="Popravi";
$language["DBUTILS_OPTIMIZE"]="Optimiziraj";
$language["DBUTILS_ANALYSE"]="Analiziraj";
$language["DBUTILS_CHECK"]="Provjeri";
$language["DBUTILS_DELETE"]="Obrisi";
$language["DBUTILS_OPERATION"]="Operacija";
$language["DBUTILS_INFO"]="Info";
$language["DBUTILS_STATUS"]="Status";
$language["DBUTILS_TABLES"]="Stolova";
// MYSQL STATUS
$language["MYSQL_STATUS"]="MySQL Status";
// SITE LOG
$language["SITE_LOG"]="Log trackera";
// FORUMS
$language["FORUM_MIN_CREATE"]="Minimalna klasa kreiraj";
$language["FORUM_MIN_WRITE"]="Minimalna klasa pisati";
$language["FORUM_MIN_READ"]="Minimalna klasa citati";
$language["FORUM_SETTINGS"]="Forum podesavanja";
$language["FORUM_EDIT"]="Izmjeni Forum";
$language["FORUM_ADD_NEW"]="Dodaj novi forum";
$language["FORUM_PARENT"]="Parent(poticni) forum";
$language["FORUM_SORRY_PARENT"]="(Oprostite, Nemogu imati parent (poticni), zato sto i sam vec jesam parent (poticni) forum)";
$language["FORUM_PRUNE_1"]="Ovdje su teme i/ili postovi u ovom forumu!<br />Izgubicete sve podatke...<br />";
$language["FORUM_PRUNE_2"]="Jeste li sigurni da zelite otkazati ovaj forum";
$language["FORUM_PRUNE_3"]="u protivnom natrag.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Nemozete obrisati forum koji sadrzi podforume, pomjerite podforume u drugi forum i pokusajte ponovo";
// MODULES
$language["ADD_NEW_MODULE"]="Dodaj novi modul";
$language["TYPE"]="Tip";
$language["DATE_CHANGED"]="Datum promjenjeno";
$language["DATE_CREATED"]="Datum kreirano";
$language["ACTIVE_MODULES"]="Aktivni moduli: ";
$language["NOT_ACTIVE_MODULES"]="Ne aktivni moduli: ";
$language["TOTAL_MODULES"]="Ukupno modula: ";
$language["DEACTIVATE"]="Onesposobi";
$language["ACTIVATE"]="Aktiviraj";
$language["STAFF"]="Tim";
$language["MISC"]="Razno";
$language["TORRENT"]="Torrent";
$language["STYLE"]="Stil";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Naziv";
$language["HACK_VERSION"]="Verzija";
$language["HACK_AUTHOR"]="Autor";
$language["HACK_ADDED"]="Dodato";
$language["HACK_NONE"]="Nema instaliranih hakova";
$language["HACK_ADD_NEW"]="Dodaj novi hack";
$language["HACK_SELECT"]="Odaberi";
$language["HACK_STATUS"]="Status";
$language["HACK_INSTALL"]="Instaliraj";
$language["HACK_UNINSTALL"]="Ukloni";
$language["HACK_INSTALLED_OK"]="Hack je uspjesno instaliran!<br />\nZa pregled instaliranih hackova idite nazad na <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">Admin sekciju (Hakovi)</a>";
$language["HACK_BAD_ID"]="Greska dobijanja hack infoa sa ovim ID.";
$language["HACK_UNINSTALLED_OK"]="Hack je uklonjen uspjesno!<br />\nZa pregled instaliranih hakova idite nazad na <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">Admin sekciju (Hakovi)</a>";
// USERS TOOLS
$language["USER_NOT_DELETE"]="Ne mozete obrisati Guest racun ili svoj vlastiti!";
$language["USER_NOT_EDIT"]="Ne mozete izmjeniti Guest racun ili svoj vlastiti!";
?>