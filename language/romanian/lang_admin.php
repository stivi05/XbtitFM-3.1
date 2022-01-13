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
$language['ACP_BAN_IP']='Restricţionare IP';
$language['ACP_FORUM']='Setări Forum';
$language['ACP_USER_GROUP']='Setări Grupuri Utilizatori';
$language['ACP_STYLES']='Setări Skin-uri';
$language['ACP_LANGUAGES']='Setări Limbă';
$language['ACP_CATEGORIES']='Setări Categorii';
$language['ACP_TRACKER_SETTINGS']='Setări Tracker';
$language['ACP_OPTIMIZE_DB']='Optimizează Baza de Date';
$language['ACP_CENSORED']='Setări Cuvinte Cenzurate';
$language['ACP_DBUTILS']='Utilitare Bază de Date';
$language['ACP_HACKS']='Hack-uri';
$language['ACP_HACKS_CONFIG']='Setări Hack-uri';
$language['ACP_MODULES']='Module';
$language['ACP_MODULES_CONFIG']='Setări Module';
$language['ACP_MASSPM']='Mass Private Mail';
$language['ACP_PRUNE_TORRENTS']='Curata Torrente';
$language['ACP_PRUNE_USERS']='Curata Useri';
$language['ACP_SITE_LOG']='Vizualizează Log';
$language['ACP_SEARCH_DIFF']='Search Diff.';
$language['ACP_BLOCKS']='Setări Blocuri';
$language['ACP_POLLS']='Setări Chestionar';
$language['ACP_MENU']='Meniu Administrare';
$language['ACP_FRONTEND']='Setari Conţinut';
$language['ACP_USERS_TOOLS']='Utilitare Utilizatori';
$language['ACP_TORRENTS_TOOLS']='Utilitare Torrente';
$language['ACP_OTHER_TOOLS']='Alte Utilitare';
$language['ACP_MYSQL_STATS']='Statistici MySql';
$language['XBTT_BACKEND']='Opţiuni XBTT';
$language['XBTT_USE']='Foloseşte <a href="http://xbtt.sourceforge.net/tracker/" target="_blank">XBTT</a> ca backend?';
$language['XBTT_URL']='URL-ul Xbtt (exemplu: http://localhost:2710)';
$language['GENERAL_SETTINGS']='Setări Generale';
$language['TRACKER_NAME']='Numele Site-ului';
$language['TRACKER_BASEURL']='URL-ul Tracker-ului (fără / la sfârşit)';
$language['TRACKER_ANNOUNCE']='URL-urile de Anunţare (câte unul per rând)';
$language['TRACKER_EMAIL']='E-mail-ul Tracker-ului';
$language['TORRENT_FOLDER']='Directorul Torrent';
$language['ALLOW_EXTERNAL']='Permite torrente Externe';
$language['ALLOW_GZIP']='Activează GZIP';
$language['ALLOW_DEBUG']='Afişează informaţii de tip Debug la baza paginii';
$language['ALLOW_DHT']='Dezactivează DHT (marchează torrentul ca privat)<br />'."\n".'va fi setat doar pentru noile torrente urcate';
$language['ALLOW_LIVESTATS']='Activează Live Stats (poate genera load mare!)';
$language['ALLOW_SITELOG']='Activează Basic Site Log (inregistrări păstrate pentru torrente/utilizatori)';
$language['ALLOW_HISTORY']='Activează Basic History (torrente/utilizatori)';
$language['ALLOW_PRIVATE_ANNOUNCE']='Anunţare Privată';
$language['ALLOW_PRIVATE_SCRAPE']='Scrape Privat';
$language['SHOW_UPLOADER']='Afişează nick&rsquo;ul Uploader&rsquo;ului';
$language['USE_POPUP']='Foloseşte Popup pentru Torrente: detalii/peer-i';
$language['DEFAULT_LANGUAGE']='Limba Default';
$language['DEFAULT_CHARSET']='Set de caractere Default<br />'."\n".'(dacă limba nu este afişată corect, schimbă in UTF-8)';
$language['DEFAULT_STYLE']='Skin Default';
$language['MAX_USERS']='Max Utilizatori (numeric, 0 = fără limită)';
$language['MAX_TORRENTS_PER_PAGE']='Torrente per pagina';
$language['SPECIFIC_SETTINGS']='Setări specifice pentru Tracker';
$language['SETTING_INTERVAL_SANITY']='Interval Sanity (secunde numerice, 0 = dezactivat)<br />O valoare bună, in caz de activare, este 1800 (30 minute)';
$language['SETTING_INTERVAL_EXTERNAL']='Interval update torrente Externe (secunde numerice, 0 = dezactivat)<br />În funcţie de câte torrente Externe sunt prezente';
$language['SETTING_INTERVAL_MAX_REANNOUNCE']='Interval Maxim pentru reanunţare (secunde numerice)';
$language['SETTING_INTERVAL_MIN_REANNOUNCE']='Interval Minim pentru reanunţare (secunde numerice)';
$language['SETTING_MAX_PEERS']='Numărul Maxim de peer-i pentru fiecare request(numeric)';
$language['SETTING_DYNAMIC']='Permite Torrente Dinamice (nerecomandat)';
$language['SETTING_NAT_CHECK']='Verificare NAT';
$language['SETTING_PERSISTENT_DB']='Conexiuni Persistente (Baza de Date, nerecomandat)';
$language['SETTING_OVERRIDE_IP']='Permite Utilizatorilor să-şi suprascrie IP-ul';
$language['SETTING_CALCULATE_SPEED']='Calculează Viteza şi cantitatea de Download';
$language['SETTING_PEER_CACHING']='Cache pentru tabele (ar trebui să scadă puţin load-ul)';
$language['SETTING_SEEDS_PID']='Numărul Maxim de seed-eri cu acelaşi PID';
$language['SETTING_LEECHERS_PID']='Numărul Maxim de leech-eri cu acelaşi PID';
$language['SETTING_VALIDATION']='Modul de Validare';
$language['SETTING_CAPTCHA']='Înregistrare Securizată (foloseşte ImageCode, sunt necesare librăriile GD+Freetype)';
$language['SETTING_FORUM']='Link Forum (poate fi: link-ul forumului sau cel intern/necompletat)';
$language['BLOCKS_SETTING']='Setări pagină Index/Blocuri';
$language['SETTING_CLOCK']='Tip ceas';
$language['SETTING_NUM_NEWS']='Limită pentru Blocul Ştiri Recente (numeric)';
$language['SETTING_NUM_POSTS']='Limită pentru Blocul Forumului (numeric)';
$language['SETTING_NUM_LASTTORRENTS']='Limită pentru Blocul Torrente Recente (numeric)';
$language['SETTING_NUM_TOPTORRENTS']='Limită pentru Blocul Cele mai Populare Torrente (numeric)';
$language['CLOCK_ANALOG']='Analog';
$language['CLOCK_DIGITAL']='Digital';
$language['CONFIG_SAVED']='Configuraţia a fost savată cu succes!';
$language['CACHE_SITE']='Interval Cache (secunde numerice, 0 = dezactivat)';
$language['ALL_FIELDS_REQUIRED']='Trebuie completate toate câmpurile!';
// RESTRICŢIONARE IP
$language['BAN_NOTE']='În această secţiune a Panoului de Administrare, poţi vedea lista cu IP-uri restricţionate si poţi restricţiona accesul la Tracker a altor IP-uri.<br />'."\n".'Trebuie sa inserezi toată plaja de IP-uri de la (primul IP) până la (ultimul IP).';
$language['BAN_NOIP']='Nu există nici un IP restricţionat';
$language['BAN_FIRSTIP']='Primul IP';
$language['BAN_LASTIP']='Ultimul IP';
$language['BAN_COMMENTS']='Comentarii';
$language['BAN_REMOVE']='Şterge';
$language['BAN_BY']='De';
$language['BAN_ADDED']='Data';
$language['BAN_INSERT']='Inserează plaja de IP-uri pentru noua restricţionare';
$language['BAN_IP_ERROR']='Restricţionează adresa IP.';
$language['BAN_NO_IP_WRITE']='Ne pare rău dar nu ai specificat nici o adresă IP!';
$language['BAN_DELETED']='Plaja de IP-uri a fost ştearsă din Baza de Date.<br />'."\n".'<br />'."\n".'<a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=banip&amp;action=read">Înapoi la Restricţionare IP</a>';
// TRADUCERI
$language['LANGUAGE_SETTINGS']='Setări Limbă';
$language['LANGUAGE']='Limbă';
$language['LANGUAGE_ADD']='Adaugă o nouă Limbă';
$language['LANGUAGE_SAVED']='Felicitări, limba a fost modificată';
// SKIN-URI
$language['STYLE_SETTINGS']='Setări Skin-uri/Teme';
$language['STYLE_EDIT']='Editează Skin';
$language['STYLE_ADD']='Adaugă un nou Skin';
$language['STYLE_NAME']='Nume Skin';
$language['STYLE_URL']='URL Skin';
$language['STYLE_FOLDER']='Director Skin';
$language['STYLE_NOTE']='În această secţiune îţi poti administra setările Skin-urilor, dar fişierele trebuie urcate prin FTP sau sFTP.';
// CATEGORII
$language['CATEGORY_SETTINGS']='Setări Categorii';
$language['CATEGORY_IMAGE']='Imagine Categorie';
$language['CATEGORY_ADD']='Adaugă o nouă Categorie';
$language['CATEGORY_SORT_INDEX']='Index Sortare';
$language['CATEGORY_FULL']='Categorie';
$language['CATEGORY_EDIT']='Editează Categoria';
$language['CATEGORY_SUB']='Sub-Categorie';
$language['CATEGORY_NAME']='Categore';
// CUVINTE CENZURATE
$language['CENSORED_NOTE']='scrie <b>câte un cuvânt per linie</b> pentru a-l cenzura (va fi afişat ca *censored*)';
$language['CENSORED_EDIT']='Editează Cuvinte Cenzurate';
// BLOCURI
$language['BLOCKS_SETTINGS']='Configuraţia Blocurilor';
$language['ENABLED']='Activ';
$language['ORDER']='Ordine';
$language['BLOCK_NAME']='Numele Blocului';
$language['BLOCK_POSITION']='Pozitie';
$language['BLOCK_TITLE']='Titlul Blocului (va fi folosit pentru afişarea titlului tradus)';
$language['BLOCK_USE_CACHE']='Activează Cache pentru acest Bloc?';
$language['ERR_BLOCK_NAME']='Trebuie să selectezi din listă unul dintre fişierele active!';
$language['BLOCK_ADD_NEW']='Adaugă un nou Bloc';
// CHESTIONARE (mai multe în lang_polls.php)
$language['POLLS_SETTINGS']='Configurarea Chestionarului';
$language['POLLID']='ID Poll';
$language['INSERT_NEW_POLL']='Adaugă un nou Chestionar';
$language['CANT_FIND_POLL']='Nu a fost găsit nici un Chestionar';
$language['ADD_NEW_POLL']='Adaugă Chestionar';
// GRUPURI
$language['USER_GROUPS']='Setări Grupuri Utilizatori (apasă pe numele grupului pentru editare)';
$language['VIEW_EDIT_DEL']='Vede/Editează/Şterge';
$language['CANT_DELETE_GROUP']='Acest Nivel/Grup nu poate fi şters!';
$language['GROUP_NAME']='Numele Grupului';
$language['GROUP_VIEW_NEWS']='Vede Ştiri';
$language['GROUP_VIEW_FORUM']='Vede Forum';
$language['GROUP_EDIT_FORUM']='Editează Forum';
$language['GROUP_BASE_LEVEL']='Alege nivel de bază';
$language['GROUP_ERR_BASE_SEL']='Eroare la selectarea nivelului de bază!';
$language['GROUP_DELETE_NEWS']='Şterge Ştiri';
$language['GROUP_PCOLOR']='Culoare prefix (ex: ';
$language['GROUP_SCOLOR']='Culoare sufix (ex: ';
$language['GROUP_VIEW_TORR']='Vede Torrente';
$language['GROUP_EDIT_TORR']='Editează Torrente';
$language['GROUP_VIEW_USERS']='Vede Utilizatori';
$language['GROUP_DELETE_TORR']='Şterge Torrente';
$language['GROUP_EDIT_USERS']='Editează Utilizatori';
$language['GROUP_DOWNLOAD']='Poate face Download';
$language['GROUP_DELETE_USERS']='Şterge Utilizatori';
$language['GROUP_DELETE_FORUM']='Şterge Forum';
$language['GROUP_GO_CP']='Poate accesa Panoul de Administrare';
$language['GROUP_EDIT_NEWS']='Editează Ştiri';
$language['GROUP_ADD_NEW']='Adaugă un nou Grup';
$language['GROUP_UPLOAD']='Poate face Upload';
$language['GROUP_WT']='Timp de Asteptare dacă Raţia <1';
$language['GROUP_EDIT_GROUP']='Editează Grup';
$language['GROUP_VIEW']='Vizualizează';
$language['GROUP_EDIT']='Editează';
$language['GROUP_DELETE']='Şterge';
$language['INSERT_USER_GROUP']='Adaugă un nou Grup de Utilizatori';
$language['ERR_CANT_FIND_GROUP']='Acest grup nu poate fi găsit!';
$language['GROUP_DELETED']='Grupul a fost şters!';
// MASS PM
$language['USERS_FOUND']='utilizatori găsiţi';
$language['USERS_PMED']='utilizatori au primit PM';
$language['WHO_PM']='Cui îi vom trimite Mesaj Privat?';
$language['MASS_SENT']='Mass PM trimis!!!';
$language['MASS_PM']='Mass PM';
$language['MASS_PM_ERROR']='Ar fi o idee bună să scrii totuşi un mesaj înainte de a-l trimite!!!!';
$language['RATIO_ONLY']='doar această raţie';
$language['RATIO_GREAT']='mai mare decât această raţie';
$language['RATIO_LOW']='mai mică decât această raţie';
$language['RATIO_FROM']='De la';
$language['RATIO_TO']='Către';
$language['MASSPM_INFO']='Informaţii';
// PRUNE USERS
$language['PRUNE_USERS_PRUNED']='Useri curatati';
$language['PRUNE_USERS']='Curata useri';
$language['PRUNE_USERS_INFO']='Specifică numărul de zile la care utilizatorii sunt consideraţi "dead" (neconectat de x zile SAU s-a înscris acum x zile şi încă este în stadiul de validare)';
// SEARCH DIFF
$language['SEARCH_DIFF']='Search Diff.';
$language['SEARCH_DIFF_MESSAGE']='Mesaj';
$language['DIFFERENCE']='Diferenţă';
$language['SEARCH_DIFF_CHANGE_GROUP']='Modifică Grupul utilizatorului';
// PRUNE TORRENTS
$language['PRUNE_TORRENTS_PRUNED']='Torrente curatate';
$language['PRUNE_TORRENTS']='Curata torrente';
$language['PRUNE_TORRENTS_INFO']='Specifică numărul de zile la care torrent-ele sunt considerate "dead"';
$language['LEECHERS']='leecher(i)';
$language['SEEDS']='seeder(i)';
// UTILITARE DB
$language['DBUTILS_TABLENAME']='Nume Tabel';
$language['DBUTILS_RECORDS']='Înregistrări';
$language['DBUTILS_DATALENGTH']='Dimensiunea datelor';
$language['DBUTILS_OVERHEAD']='Supradimensionare';
$language['DBUTILS_REPAIR']='Repară';
$language['DBUTILS_OPTIMIZE']='Optimizează';
$language['DBUTILS_ANALYSE']='Analizează';
$language['DBUTILS_CHECK']='Verifică';
$language['DBUTILS_DELETE']='Şterge';
$language['DBUTILS_OPERATION']='Operaţie';
$language['DBUTILS_INFO']='Info';
$language['DBUTILS_STATUS']='Status';
$language['DBUTILS_TABLES']='Tabele';
// STATISTICI MYSQL
$language['MYSQL_STATUS']='Status MySQL';
// LOG
$language['SITE_LOG']='Site Log';
// FORUMS
$language['FORUM_MIN_CREATE']='Min Class Create';
$language['FORUM_MIN_WRITE']='Min Class Write';
$language['FORUM_MIN_READ']='Min Class Read';
$language['FORUM_SETTINGS']='Setări Forum';
$language['FORUM_EDIT']='Editează Forum';
$language['FORUM_ADD_NEW']='Adaugă un nou Forum';
$language['FORUM_PARENT']='Forum Principal';
$language['FORUM_SORRY_PARENT']='(Îmi pare rău, nu pot avea forum principal, deoarece eu sunt un forum principal)';
$language['FORUM_PRUNE_1']='În acest forum există topic-uri şi/sau post-uri!<br />Vei pierde toate aceste datele...<br />';
$language['FORUM_PRUNE_2']='Dacă eşti sigur că vrei să anulezi acest forum';
$language['FORUM_PRUNE_3']='altfel du-te înapoi.';
$language['FORUM_ERR_CANNOT_DELETE_PARENT']='Nu poţi şterge un forum care are sub-forum(uri), mută-le în alt forum şi încearcă din nou';
// MODULE
$language['ADD_NEW_MODULE']='Adaugă un nou Modul';
$language['TYPE']='Tip';
$language['DATE_CHANGED']='Dată Modificare';
$language['DATE_CREATED']='Dată Creare';
$language['ACTIVE_MODULES']='Module Active: ';
$language['NOT_ACTIVE_MODULES']='Module Inactive: ';
$language['TOTAL_MODULES']='Total Module: ';
$language['DEACTIVATE']='Deactivează';
$language['ACTIVATE']='Activează';
$language['STAFF']='Staff';
$language['MISC']='Diverse';
$language['TORRENT']='Torrent';
$language['STYLE']='Style';
$language['ID_MODULE']='ID';
// HACK-URI
$language['HACK_TITLE']='Titlu';
$language['HACK_VERSION']='Versiune';
$language['HACK_AUTHOR']='Autor';
$language['HACK_ADDED']='Adăugat';
$language['HACK_NONE']='Nu exista nici un Hack instalat';
$language['HACK_ADD_NEW']='Adaugă un nou Hack';
$language['HACK_SELECT']='Selectează';
$language['HACK_STATUS']='Status';
$language['HACK_INSTALL']='Instalează';
$language['HACK_UNINSTALL']='Dezinstalează';
$language['HACK_INSTALLED_OK']='Instalarea Hack-ului s-a realizat cu succes!<br />'."\n".'Pentru a vedea lista completă cu Hack-uri instalate du-te la <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">Panoul de Administrare (Hack-uri)</a>';
$language['HACK_BAD_ID']='Eroare, nu s-a putut obţine nici o informaţie pe baza ID-ului.';
$language['HACK_UNINSTALLED_OK']='Dezinstalarea Hack-ului s-a realizat cu succes!<br />'."\n".'Pentru a vedea lista completă cu Hack-uri instalate du-te la <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">Panoul de Administrare (Hack-uri)</a>';
?>