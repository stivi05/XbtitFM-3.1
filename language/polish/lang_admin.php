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
$language["ACP_BAN_IP"]="Ban na IP";
$language["ACP_FORUM"]="Ustawienia forum";
$language["ACP_USER_GROUP"]="Ustawienia rang";
$language["ACP_STYLES"]="Ustawienia styli";
$language["ACP_LANGUAGES"]="Ustawienia językowe";
$language["ACP_CATEGORIES"]="Ustawienia Kategorii";
$language["ACP_TRACKER_SETTINGS"]="Ustawienia tracker'a";
$language["ACP_OPTIMIZE_DB"]="Optymalizuj bazę danych";
$language["ACP_CENSORED"]="Ustawienia cenzury";
$language["ACP_DBUTILS"]="Narzędzia bazy danych";
$language["ACP_HACKS"]="Hacki";
$language["ACP_HACKS_CONFIG"]="Konfiguracja Hack-ów";
$language["ACP_MODULES"]="Moduły";
$language["ACP_MODULES_CONFIG"]="Ustawienia modułów";
$language["ACP_MASSPM"]="Masowa wiadomość";
$language["ACP_PRUNE_TORRENTS"]="Usuwanie torrentów";
$language["ACP_PRUNE_USERS"]="Usuwanie Userów";
$language["ACP_SITE_LOG"]="Przeglądaj logi strony";
$language["ACP_SEARCH_DIFF"]="Szukaj różnic";
$language["ACP_BLOCKS"]="Ustawienia bloków";
$language["ACP_POLLS"]="Ustawienia ankiet";
$language["ACP_MENU"]="Menu admina";
$language["ACP_FRONTEND"]="Ustawienia wyglądu";
$language["ACP_USERS_TOOLS"]="Narzędzia - użytkownicy";
$language["ACP_TORRENTS_TOOLS"]="Narzędzia - torrenty";
$language["ACP_OTHER_TOOLS"]="Narzędzia - inne";
$language["ACP_MYSQL_STATS"]="Statystyki MySQL";
$language["XBTT_BACKEND"]="Opcje XBTT";
$language["XBTT_USE"]="Użyj <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">XBTT</a> jako backend?";
$language["XBTT_URL"]="Xbtt bazowy url (np. http://localhost:2710)";
$language["GENERAL_SETTINGS"]="Ustawienia główne";
$language["TRACKER_NAME"]="Nazwa strony";
$language["TRACKER_BASEURL"]="Bazowy adres URL Tracker'a (bez końcowego /)";
$language["TRACKER_ANNOUNCE"]="Announce URL'e Tracker'a (jeden na wiersz)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Sprawdź adresy announce dwa razy, jeżeli włączyłeś XBTT...</span>":"");
$language["TRACKER_EMAIL"]="Email Tracker'a/właściciela";
$language["TORRENT_FOLDER"]="Folder torrentów";
$language["ALLOW_EXTERNAL"]="Zewnętrzne torrenty";
$language["ALLOW_GZIP"]="włącz GZIP";
$language["ALLOW_DEBUG"]="Pokazuj info Debugera na dole stron";
$language["ALLOW_DHT"]="Wyłącz DHT (prywatna flaga w torrentach)<br />\nbędzie działać tylko dla nowo wstawionych torrentów";
$language["ALLOW_LIVESTATS"]="Włącz Live Stats (może powodować duży server load!)";
$language["ALLOW_SITELOG"]="Włącz Podstawowy Log Strony (loguj zmiany w torrentach/userach)";
$language["ALLOW_HISTORY"]="Włącz Podstawową Historię (torrenty/userzy)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Prywatny Announce";
$language["ALLOW_PRIVATE_SCRAPE"]="Prywatny Scrape";
$language["SHOW_UPLOADER"]="Pokazuj nick Uploadera";
$language["USE_POPUP"]="Użyj Popup dla detali Torrentów/Peerów";
$language["DEFAULT_LANGUAGE"]="Domyślny Język";
$language["DEFAULT_CHARSET"]="Domyślne Kodowanie<br />\n(jeżeli twój język nie wyświetla się prawidłowo, spróbuj UTF-8)";
$language["DEFAULT_STYLE"]="Domyślny Styl";
$language["MAX_USERS"]="Limit Użytk. (numerycznie, 0 = brak limitów)";
$language["MAX_TORRENTS_PER_PAGE"]="Torrentów na stronę";
$language["SPECIFIC_SETTINGS"]="Specyficzne ustawienia tracker'a";
$language["SETTING_INTERVAL_SANITY"]="Interwał Sanity (numerycznie sekundy, 0 = wyłączone)<br />Dobra wartość, jeżeli włączone, to 1800 (30 minut)";
$language["SETTING_INTERVAL_EXTERNAL"]="Interwał uaktualniania Zew. Torr. (numerycznie sekundy, 0 = wyłączone)<br />Depending of how many external torrents";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Maksymalny reannounce interwał (numerycznie sekundy)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Minimalny reannounce interwał (numerycznie sekundy)";
$language["SETTING_MAX_PEERS"]="Max. liczba peerów na żądanie (numerycznie)";
$language["SETTING_DYNAMIC"]="Dynamiczne torrenty (nie polecane)";
$language["SETTING_NAT_CHECK"]="sprawdzanie NAT";
$language["SETTING_PERSISTENT_DB"]="Stałe połączenia (Baza danych, nie polecane)";
$language["SETTING_OVERRIDE_IP"]="Zezwalaj na nadpisywanie IP userów";
$language["SETTING_CALCULATE_SPEED"]="Kalkuluj prędkość i ściągniete dane";
$language["SETTING_PEER_CACHING"]="Caching tabel (powinno zmniejszyć i obniżyć load)";
$language["SETTING_SEEDS_PID"]="Max. liczba seedów z tym samym PID";
$language["SETTING_LEECHERS_PID"]="Max. liczba leecherów z tym samym PID";
$language["SETTING_VALIDATION"]="Zatwierdzanie kont";
$language["SETTING_CAPTCHA"]="Bezpieczna rejestracja (używa ImageCode, potrzebne biblioteki GD+Freetype)";
$language["SETTING_FORUM"]="Link do Forum, może być:<br /><li><font color='#FF0000'>internal</font> lub puste (brak wartości) dla wbudowanego forum</li><li><font color='#FF0000'>smf</font> dla zintegrowanego <a target='_new' href='http://www.simplemachines.org'>Simple Machines Forum</a></li><li>Twoje własne forum (pełny adres do twojego forum)</li>";
$language["BLOCKS_SETTING"]="Strona Główna/Bloki ustawienia";
$language["SETTING_CLOCK"]="Typ Zegara";
$language["SETTING_NUM_NEWS"]="Limit dla bloku Najnowsze Newsy (numerycznie)";
$language["SETTING_NUM_POSTS"]="Limit dla bloku Forum (numerycznie)";
$language["SETTING_NUM_LASTTORRENTS"]="Limit dla bloku Najnowsze Torrenty (numerycznie)";
$language["SETTING_NUM_TOPTORRENTS"]="Limit dla bloku Najpopularniejsze Torrenty (numerycznie)";
$language["CLOCK_ANALOG"]="Analogowy";
$language["CLOCK_DIGITAL"]="Cyfrowy";
$language["CONFIG_SAVED"]="Konfiguracja została zapisana poprawnie!";
$language["CACHE_SITE"]="Cache interwał (sekundy numerycznie, 0 = wyłączone)";
$language["ALL_FIELDS_REQUIRED"]="Wymagane są wszystkie pola!";
$language["SETTING_CUT_LONG_NAME"]="Ucinaj długie nazwy torrentów po x znakach (0 = nie ucinaj)";
$language["MAILER_SETTINGS"]="Mailer";
$language["SETTING_MAIL_TYPE"]="Typ Mail-a";
$language["SETTING_SMTP_SERVER"]="SMTP Server";
$language["SETTING_SMTP_PORT"]="SMTP Port";
$language["SETTING_SMTP_USERNAME"]="SMTP login";
$language["SETTING_SMTP_PASSWORD"]="SMTP hasło";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="SMTP hasło (powtórz)";
$language["XBTT_TABLES_ERROR"]="Powinieneś zaimportować tabele xbtt (spójrz w instrukcję instalacji xbtt) do twojej bazy danych przed aktywacją xbtt!";
// BAN FORM
$language["BAN_NOTE"]="W tej części panelu admina, możesz zobaczyć zbanowane IP lub zbanować nowe IP zabraniając tym samym dostępu do trackera.<br />\nMusisz wpisać zakres od (początkowe IP) do (końcowe IP).";
$language["BAN_NOIP"]="Nie ma zbanowanych IP";
$language["BAN_FIRSTIP"]="Początkowe IP";
$language["BAN_LASTIP"]="Końcowe IP";
$language["BAN_COMMENTS"]="Komentarz";
$language["BAN_REMOVE"]="Usuń";
$language["BAN_BY"]="przez";
$language["BAN_ADDED"]="Data";
$language["BAN_INSERT"]="Dodaj nowy zakres zbanowanych IP";
$language["BAN_IP_ERROR"]="Zły adres IP.";
$language["BAN_NO_IP_WRITE"]="Nie wpisałeś adresu IP. Sorry!";
$language["BAN_DELETED"]="Zakres IP został usunięty z bazy danych.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Powrót do Ban na IP</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Ustawienia językowe";
$language["LANGUAGE"]="Język";
$language["LANGUAGE_ADD"]="Dodaj nowy język";
$language["LANGUAGE_SAVED"]="Gratulacje, język został zmodyfikowany";
// STYLES
$language["STYLE_SETTINGS"]="Ustawienia styli";
$language["STYLE_EDIT"]="Edytuj styl";
$language["STYLE_ADD"]="Dodaj nowy styl";
$language["STYLE_NAME"]="Nazwa stylu";
$language["STYLE_URL"]="URL stylu";
$language["STYLE_FOLDER"]="Folder styli ";
$language["STYLE_NOTE"]="W tej sekcji możesz zarządzać twoimi ustawieniami styli, ale musisz najpierw uploadować je przez ftp bądź sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Ustawienia kategorii";
$language["CATEGORY_IMAGE"]="Ikona kategorii";
$language["CATEGORY_ADD"]="Dodaj nową kategorię";
$language["CATEGORY_SORT_INDEX"]="Kolejność";
$language["CATEGORY_FULL"]="Kategoria";
$language["CATEGORY_EDIT"]="Edytuj kategorię";
$language["CATEGORY_SUB"]="Sub-kategoria";
$language["CATEGORY_NAME"]="Nazwa";
// CENSORED
$language["CENSORED_NOTE"]="Wpisz <b>jedno słowo na linię</b> aby je ocenzurować (zostanie zamienione na *censored*)";
$language["CENSORED_EDIT"]="Edytuj ocenzurowane słowa";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Konfiguracja bloków";
$language["ENABLED"]="Włącz";
$language["ORDER"]="Kolejność";
$language["BLOCK_NAME"]="Nazwa bloku";
$language["BLOCK_POSITION"]="Pozycja";
$language["BLOCK_TITLE"]="Przetłumaczony tytuł (będzie użyte do wyświetlenia przetłumaczonego tytułu)";
$language["BLOCK_USE_CACHE"]="Włączyć cache dla tego bloku?";
$language["ERR_BLOCK_NAME"]="Musisz wybrać jeden blok z listy rozwijalnej!";
$language["BLOCK_ADD_NEW"]="Dodaj nowy blok";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Konfiguracja ankiet";
$language["POLLID"]="ID ankiety";
$language["INSERT_NEW_POLL"]="Dodaj nową ankietę";
$language["CANT_FIND_POLL"]="Nie można znaleźć ankiety";
$language["ADD_NEW_POLL"]="Dodaj ankietę";
// GROUPS
$language["USER_GROUPS"]="Ustawienia rang (kliknij na nazwę rangi aby edytować)";
$language["VIEW_EDIT_DEL"]="Podgląd/Edycja/Usuwanie";
$language["CANT_DELETE_GROUP"]="Ta ranga nie może być usunięta!";
$language["GROUP_NAME"]="Nazwa rangi";
$language["GROUP_VIEW_NEWS"]="Przeglądanie newsów";
$language["GROUP_VIEW_FORUM"]="Przeglądanie forum";
$language["GROUP_EDIT_FORUM"]="Edycja forum";
$language["GROUP_BASE_LEVEL"]="Wybierz bazową rangę";
$language["GROUP_ERR_BASE_SEL"]="Błąd w wyborze bazowej rangi!";
$language["GROUP_DELETE_NEWS"]="Usuwanie newsów";
$language["GROUP_PCOLOR"]="Kolor Prefixu (np. ";
$language["GROUP_SCOLOR"]="Kolor Suffixu (np. ";
$language["GROUP_VIEW_TORR"]="Przeglądanie torrentów";
$language["GROUP_EDIT_TORR"]="Edycja torrentów";
$language["GROUP_VIEW_USERS"]="Przeglądanie userów";
$language["GROUP_DELETE_TORR"]="Usuwanie torrentów";
$language["GROUP_EDIT_USERS"]="Edycja userów";
$language["GROUP_DOWNLOAD"]="Może ściągać";
$language["GROUP_DELETE_USERS"]="Usuwanie userów";
$language["GROUP_DELETE_FORUM"]="Usuwanie forum";
$language["GROUP_GO_CP"]="Dostęp do Panelu Admina";
$language["GROUP_EDIT_NEWS"]="Edycja newsów";
$language["GROUP_ADD_NEW"]="Dodaj nową rangę";
$language["GROUP_UPLOAD"]="Może wysyłać";
$language["GROUP_WT"]="Czas oczekiwania jeżeli ratio <1";
$language["GROUP_EDIT_GROUP"]="Edycja rangi";
$language["GROUP_VIEW"]="Podgląd";
$language["GROUP_EDIT"]="Edycja";
$language["GROUP_DELETE"]="Usuń";
$language["INSERT_USER_GROUP"]="Dodaj nową rangę";
$language["ERR_CANT_FIND_GROUP"]="Nie znaleziono tej rangi!";
$language["GROUP_DELETED"]="Ranga została usunięta!";
// MASS PM
$language["USERS_FOUND"]="userzy znalezieni";
$language["USERS_PMED"]="userzy powiadomieni";
$language["WHO_PM"]="Do kogo chcesz wysłać masowy PM?";
$language["MASS_SENT"]="Masowy PM wysłany!!!";
$language["MASS_PM"]="Masowy PM";
$language["MASS_PM_ERROR"]="Dobrym pomysłem byłoby wpisać coś zanim wyślesz!!!!";
$language["RATIO_ONLY"]="ratio równe";
$language["RATIO_GREAT"]="ratio powyżej";
$language["RATIO_LOW"]="ratio poniżej";
$language["RATIO_FROM"]="Od";
$language["RATIO_TO"]="Do";
$language["MASSPM_INFO"]="Info";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Userzy usunięci";
$language["PRUNE_USERS"]="Usuń userów";
$language["PRUNE_USERS_INFO"]="Wprowadź liczbę dni w ciągu których userzy zostaną uznani za \"nieobecnych\" (nie zalogowani od x dni LUB zarejestrowani od x dni i ciągle nie potwierdzeni )";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Szukaj różnic";
$language["SEARCH_DIFF_MESSAGE"]="Wiadomość";
$language["DIFFERENCE"]="Różnice";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Zmień rangę";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Usunięte torrenty";
$language["PRUNE_TORRENTS"]="Usuwanie torrentów";
$language["PRUNE_TORRENTS_INFO"]="Wprowadź liczbę dni w ciągu których torrenty uznane zostaną za  \"martwe\"";
$language["LEECHERS"]="leecher(ów)";
$language["SEEDS"]="seed(ów)";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Nazwa tabeli";
$language["DBUTILS_RECORDS"]="Rekordów";
$language["DBUTILS_DATALENGTH"]="Wielkość";
$language["DBUTILS_OVERHEAD"]="Nadmiar";
$language["DBUTILS_REPAIR"]="Napraw";
$language["DBUTILS_OPTIMIZE"]="Optymalizuj";
$language["DBUTILS_ANALYSE"]="Analizuj";
$language["DBUTILS_CHECK"]="Sprawdź";
$language["DBUTILS_DELETE"]="Usuń";
$language["DBUTILS_OPERATION"]="Operacja";
$language["DBUTILS_INFO"]="Info";
$language["DBUTILS_STATUS"]="Status";
$language["DBUTILS_TABLES"]="Tabele";
// MYSQL STATUS
$language["MYSQL_STATUS"]="MySql Status";
// SITE LOG
$language["SITE_LOG"]="Log strony";
// FORUMS
$language["FORUM_MIN_CREATE"]="Min ranga tworzenia";
$language["FORUM_MIN_WRITE"]="Min ranga pisania";
$language["FORUM_MIN_READ"]="Min ranga czytania";
$language["FORUM_SETTINGS"]="Ustawienia forum";
$language["FORUM_EDIT"]="Edytuj forum";
$language["FORUM_ADD_NEW"]="Dodaj nowe forum";
$language["FORUM_PARENT"]="Główne forum";
$language["FORUM_SORRY_PARENT"]="(Sorry, nie mogę mieć głównego forum ponieważ sam nim jestem)";
$language["FORUM_PRUNE_1"]="W tym forum są wątki i/lub posty!<br />Stracisz wszystkie dane...<br />";
$language["FORUM_PRUNE_2"]="Jeżeli jesteś pewien, że chcesz usunąć to forum";
$language["FORUM_PRUNE_3"]="inaczej wycofaj się.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Nie możesz usunąć forum z subforami, przenieś subfora do innego forum i spróbuj ponownie";
// MODULES
$language["ADD_NEW_MODULE"]="Dodaj nowy moduł";
$language["TYPE"]="Typ";
$language["DATE_CHANGED"]="Data zmiany";
$language["DATE_CREATED"]="Data utworzenia";
$language["ACTIVE_MODULES"]="Aktywne moduły: ";
$language["NOT_ACTIVE_MODULES"]="Nieaktywne moduły: ";
$language["TOTAL_MODULES"]="Wszystkich modułów: ";
$language["DEACTIVATE"]="Deaktywuj";
$language["ACTIVATE"]="Aktywuj";
$language["STAFF"]="Załoga";
$language["MISC"]="Różne";
$language["TORRENT"]="Torrenty";
$language["STYLE"]="Style";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Nazwa";
$language["HACK_VERSION"]="Wersja";
$language["HACK_AUTHOR"]="Autor";
$language["HACK_ADDED"]="Dodany";
$language["HACK_NONE"]="Nie zainstalowano żadnego hack-a";
$language["HACK_ADD_NEW"]="Dodaj nowy hack";
$language["HACK_SELECT"]="Wybierz";
$language["HACK_STATUS"]="Status";
$language["HACK_INSTALL"]="Instaluj";
$language["HACK_UNINSTALL"]="Odinstaluj";
$language["HACK_INSTALLED_OK"]="Hack został pomyślnie zainstalowany!<br />\nAby zobaczyć jakie hack-i są zainstalowane przejdź do <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminCP (Hacki)</a>";
$language["HACK_BAD_ID"]="Błąd pobierania info o hack-u z tym ID.";
$language["HACK_UNINSTALLED_OK"]="Hack został pomyślnie odinstalowany!<br />\nAby zobaczyć jakie hack-i są zainstalowane przejdź do <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminCP (Hacki)</a>";
// USERS TOOLS
$language["USER_NOT_DELETE"]="Nie możesz usunąć konta gościa lub swojego!";
$language["USER_NOT_EDIT"]="Nie możesz edytować konta gościa lub swojego!";
?>