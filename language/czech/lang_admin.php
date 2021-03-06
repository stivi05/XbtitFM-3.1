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
error_reporting(E_ALL & ~E_NOTICE);
GLOBAL $XBTT_USE;
$language['ACP_BAN_IP']='Ban IP';
$language['ACP_FORUM']='Nastavení fóra';
$language['ACP_USER_GROUP']='Uživatelských skupin';
$language['ACP_STYLES']='Nastavení stylu';
$language['ACP_LANGUAGES']='Nastavení jazyka';
$language['ACP_CATEGORIES']='Nastavení kategorií';
$language['ACP_TRACKER_SETTINGS']='Nastavení Trackeru';
$language['ACP_OPTIMIZE_DB']='Optimalizovat databázi';
$language['ACP_CENSORED']='Cenzurovaná slova';
$language['ACP_DBUTILS']='Nástroje databáze';
$language['ACP_HACKS']='Hacky';
$language['ACP_HACKS_CONFIG']='Nastavení hacků';
$language['ACP_MODULES']='Moduly';
$language['ACP_MODULES_CONFIG']='Nastavení modulů';
$language['ACP_MASSPM']='Hromadná zpráva';
$language['ACP_PRUNE_TORRENTS']='Mazání torrentů';
$language['ACP_PRUNE_USERS']='Mazání uživatelů';
$language['ACP_SITE_LOG']='Zobrazit logy stránky';
$language['ACP_SEARCH_DIFF']='Hledání rozdílů';
$language['ACP_BLOCKS']='Nastavení bloků';
$language['ACP_POLLS']='Nastavení anket';
$language['ACP_MENU']='Admin menu';
$language['ACP_FRONTEND']='Nastavení obsahu';
$language['ACP_USERS_TOOLS']='Uživatelské pomůcky';
$language['ACP_TORRENTS_TOOLS']='Torrentové pomůcky';
$language['ACP_OTHER_TOOLS']='Jiné pomůcky';
$language['ACP_MYSQL_STATS']='MySql Statistiky';
$language['XBTT_BACKEND']='Xbtt nastavení';
$language['XBTT_USE']='Použít <a href="http://xbtt.sourceforge.net/tracker/" target="_blank">xbtt</a> jako backend?';
$language['XBTT_URL']='xbtt základní adresa p.ř. http://localhost:2710';
$language['GENERAL_SETTINGS']='Hlavní nastavení';
$language['TRACKER_NAME']='Jméno stránky';
$language['TRACKER_BASEURL']='Základní adresa Trackeru (bez posledního /)';
$language['TRACKER_ANNOUNCE']='adresy Announce Trackeru (jedna url na řádek)'.($XBTT_USE?'<br />'."\n".'<span style="color:#FF0000; font-weight: bold;">Zkontrolujte adresy announce dvakrát, povolili jste xbtt jako backend...</span>':'');
$language['TRACKER_EMAIL']='Trackerův/Majitelův email';
$language['TORRENT_FOLDER']='Torrentová složka';
$language['ALLOW_EXTERNAL']='Povolit torrenty z vnějšku';
$language['ALLOW_GZIP']='Povolit GZIP';
$language['ALLOW_DEBUG']='Ukázat debug info na spodku stránky';
$language['ALLOW_DHT']='Zakázat DHT (soukromá vlaječka u torrentu)<br />'."\n".'Bude aplikováno pouze u nově nahraných torrentů';
$language['ALLOW_LIVESTATS']='Povolit Live statistiky (Upozornění: Velká zátěž serveru!)';
$language['ALLOW_SITELOG']='Povolit základní logování stránky (změna logu torrentů/uživatelů)';
$language['ALLOW_HISTORY']='Povolit základní historii (torrentů/uživatelů)';
$language['ALLOW_PRIVATE_ANNOUNCE']='Soukromá Announce';
$language['ALLOW_PRIVATE_SCRAPE']='Soukromá Scrape';
$language['SHOW_UPLOADER']='Zobrazit uploaderův nick';
$language['USE_POPUP']='Používat Popup pro Torrentové detaily/peery';
$language['DEFAULT_LANGUAGE']='Defaultní jazyk';
$language['DEFAULT_CHARSET']='Defaultní kódování znaků<br />'."\n".'(Jestliže se jazyk nezobrazuje správně, zkuste UTF-8)';
$language['DEFAULT_STYLE']='Defaultí Styl';
$language['MAX_USERS']='Max Uživatelů (číslo, 0 = bez limitů)';
$language['MAX_TORRENTS_PER_PAGE']='Torrentů na stránku';
$language['PHP_ERROR']='Potlačení PHP chyby';
$language['SPECIFIC_SETTINGS']='Specifické nastavení Trackeru';
$language['SETTING_INTERVAL_SANITY']='Sanity interval (číslo v sekundách, 0 = zakázáno)<br />Dobrá hodnota, pokud povoleno, je 1800 (30 minut)';
$language['SETTING_INTERVAL_EXTERNAL']='Update External interval (číslo v sekundách, 0 = zakázáno)<br />Záleží na počtu externích torrentů';
$language['SETTING_INTERVAL_MAX_REANNOUNCE']='Maximální reannounce interval (číslo v sekundách)';
$language['SETTING_INTERVAL_MIN_REANNOUNCE']='Minimální reannounce interval (číslo v sekundách)';
$language['SETTING_MAX_PEERS']='Max. počet peerů na požadavek (číslo)';
$language['SETTING_DYNAMIC']='Povolit Dynamické Torrenty (NEdoporučeno)';
$language['SETTING_NAT_CHECK']='NAT kontrola';
$language['SETTING_PERSISTENT_DB']='Trvalá připojení (Databáze, NEdoporučeno)';
$language['SETTING_OVERRIDE_IP']='Povolit uživatelům přepsání detekované IP';
$language['SETTING_CALCULATE_SPEED']='Vypočítat rychlost a stažené Byty';
$language['SETTING_PEER_CACHING']='Tabulkové caches (může zmenšit zátěž)';
$language['SETTING_SEEDS_PID']='Max. počet. seederů se stejným PID';
$language['SETTING_LEECHERS_PID']='Max. počet leecherů se stejným PID';
$language['SETTING_VALIDATION']='Potvrzovací mód';
$language['SETTING_SHOW_COMMENTS']='Zobrazit komentáře';
$language['SETTING_SHOW_RATING']='Zobrazit hodnocení';
$language['TORRENT_LIST']='Nastavení seznamu torrentů';
$language['SETTING_CAPTCHA']='Bezpečná registrace (použít ImageCode, GD+Freetype knihovny jsou potřeba)';
$language['SETTING_FORUM']='Odkaz na fórum, může být:<br /><li><font color="#FF0000">interní</font> nebo prázdné (žádná hodnota) pro interní fórum</li><li><font color="#FF0000">smf</font> pro integrované <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a> (1.x.x)</li><li><font color="#FF0000">smf2</font> pro integrované <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a> (2.x)</li><li><font color="#FF0000">ipb</font> pro integrované <a target="_new" href="http://www.invisionpower.com">Invision Power Board</a> (3.x.x)</li><li>Vaše vlasní řešení (zadejte url do kolonky)</li>';
$language['BLOCKS_SETTING']='Nastavení Indexu/Bloků stránky s';
$language['SETTING_CLOCK']='Styl hodin';
$language['SETTING_FORUMBLOCK']='Typ Bloku fóra';
$language['SETTING_NUM_NEWS']='Limit pro blok nejnovějších zpráv (číslo)';
$language['SETTING_NUM_POSTS']='Limit pro blok fóra (číslo)';
$language['SETTING_NUM_LASTTORRENTS']='Limit pro blok nejnovějších torrentů (číslo)';
$language['SETTING_NUM_TOPTORRENTS']='Limit pro blok nejpopulárnějších torrentů (číslo)';
$language['CLOCK_ANALOG']='Analogové';
$language['CLOCK_DIGITAL']='Digitalní';
$language['FORUMBLOCK_POSTS']='Nejnovější příspěvky';
$language['FORUMBLOCK_TOPICS']='Nejžhavější témy';
$language['CONFIG_SAVED']='Konfigurace byla správně uložena!';
$language['CACHE_SITE']='Cache interval (číslo v sekundách, 0 = zakázáno)';
$language['ALL_FIELDS_REQUIRED']='Všechna pole požadována!';
$language['SETTING_CUT_LONG_NAME']='Zkracovat dlouhé jméno torrentu po X znacích (0 = nezkracovat)';
$language['MAILER_SETTINGS']='Mailer';
$language['SETTING_MAIL_TYPE']='Typ mailu';
$language['SETTING_SMTP_SERVER']='SMTP Server';
$language['SETTING_SMTP_PORT']='SMTP Port';
$language['SETTING_SMTP_USERNAME']='SMTP Uživatelské jméno';
$language['SETTING_SMTP_PASSWORD']='SMTP Heslo';
$language['SETTING_SMTP_PASSWORD_REPEAT']='SMTP Heslo (zopakovat)';
$language['XBTT_TABLES_ERROR']='Měl byste importovat xbtt tabulky (podívejte se na instrukce instalace xbtt) do vaší databáze před samotnou aktivací xbtt backend!';
$language['XBTT_URL_ERROR']='xbtt základní url je povinná!';
// BAN FORM
$language['BAN_NOTE']='V této části admin panelu můžete vidět zabanované IP adresy a zakázat i další adresy k přístupu do trackeru.<br />'."\n".'Zadejte rozsah od (první IP) do (poslední IP).';
$language['BAN_NOIP']='Nejsou zabanovány žádné IP adresy';
$language['BAN_FIRSTIP']='První IP';
$language['BAN_LASTIP']='Poslední IP';
$language['BAN_COMMENTS']='Komentáře';
$language['BAN_REMOVE']='Odebrat';
$language['BAN_BY']='Podle';
$language['BAN_ADDED']='Datum';
$language['BAN_INSERT']='Vloežit nový rozsah zabanovaných IP adres';
$language['BAN_IP_ERROR']='Špatná IP adresa.';
$language['BAN_NO_IP_WRITE']='Nezadali jste žádnou IP adresu. Sorry!';
$language['BAN_DELETED']='Rozsah IP adres byl vymyzán z databáze.<br />'."\n".'<br />'."\n".'<a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=banip&amp;action=read">Vrátit se na banování IP</a>';
// LANGUAGES
$language['LANGUAGE_SETTINGS']='Nastavení jazyka';
$language['LANGUAGE']='Jazyk';
$language['LANGUAGE_ADD']='Vložit nový jazyk';
$language['LANGUAGE_SAVED']='Gratulujeme, jazyk byl změněn., language has been modified';
// STYLES
$language['STYLE_SETTINGS']='Nastavení stylu/tématu';
$language['STYLE_EDIT']='Upravit styl';
$language['STYLE_ADD']='Vložit nový styl';
$language['STYLE_NAME']='Jméno stylu';
$language['STYLE_URL']='URL adresa stylu';
$language['STYLE_FOLDER']='Adresář stylu';
$language['STYLE_NOTE']='V této sekci můžete spravovat nastavení stylu. Soubory musí být nahrány skrz FTP či SFTP.';
// CATEGORIES
$language['CATEGORY_SETTINGS']='Nastavení kategorií';
$language['CATEGORY_IMAGE']='Obrázek kategorií';
$language['CATEGORY_ADD']='Vložit novou kategorii';
$language['CATEGORY_SORT_INDEX']='Index řazení';
$language['CATEGORY_FULL']='Kategorie';
$language['CATEGORY_EDIT']='Upravit kategorii';
$language['CATEGORY_SUB']='Podkategorie';
$language['CATEGORY_NAME']='Kategorie';
// CENSORED
$language['CENSORED_NOTE']='Napište <b>jedno slovo na řádek</b> k jeho zabanování (budě změněno na *censured*)';
$language['CENSORED_EDIT']='Upravit cenzurovaná slova';
// BLOCKS
$language['BLOCKS_SETTINGS']='Nastavení bloků';
$language['ENABLED']='Povoleno';
$language['ORDER']='Pořadí';
$language['BLOCK_NAME']='Jméno bloku';
$language['BLOCK_POSITION']='Pozice';
$language['BLOCK_TITLE']='Název jazyka (Bude použito k zobrazení přeloženého názvu)';
$language['BLOCK_USE_CACHE']='Používat cache pro tento blok?';
$language['ERR_BLOCK_NAME']='Musítě vybrat jeden z povolených souborů ve vysunovacím menu názvu!';
$language['BLOCK_ADD_NEW']='Přidat nový blok';
// POLLS (more in lang_polls.php)
$language['POLLS_SETTINGS']='Nastavení ankety';
$language['POLLID']='ID ankety';
$language['INSERT_NEW_POLL']='Přidat anketu';
$language['CANT_FIND_POLL']='Anektu nelze nalézt';
$language['ADD_NEW_POLL']='Vložit anketu';
// GROUPS
$language['USER_GROUPS']='Nastavení skupin uživatelů (K editaci klikněte na jméno skupiny)';
$language['VIEW_EDIT_DEL']='Zobrazit/Editovat/Smazat';
$language['CANT_DELETE_GROUP']='Tato úroveň/skupina nemůže být zrušena!';
$language['GROUP_NAME']='Jméno skupiny';
$language['GROUP_VIEW_NEWS']='Zobrazit novinky';
$language['GROUP_VIEW_FORUM']='Zobrazit fórum';
$language['GROUP_EDIT_FORUM']='Editovat fórum';
$language['GROUP_BASE_LEVEL']='Vybrat základní úroveň';
$language['GROUP_ERR_BASE_SEL']='Chyba výběru základní úrovně!';
$language['GROUP_DELETE_NEWS']='Smazat novinky';
$language['GROUP_PCOLOR']='Barva před (například ';
$language['GROUP_SCOLOR']='Barva za (například ';
$language['GROUP_VIEW_TORR']='Zobrazit torrenty';
$language['GROUP_EDIT_TORR']='Upravit torrenty';
$language['GROUP_VIEW_USERS']='Zobrazit uživatele';
$language['GROUP_DELETE_TORR']='Smazat torrenty';
$language['GROUP_EDIT_USERS']='Upravit uživatele';
$language['GROUP_DOWNLOAD']='Může stahovat';
$language['GROUP_DELETE_USERS']='Smazat uživatele';
$language['GROUP_DELETE_FORUM']='Smazat fórum';
$language['GROUP_GO_CP']='Má přístup k admini rozhraní';
$language['GROUP_EDIT_NEWS']='Upravit novinky';
$language['GROUP_ADD_NEW']='Přidat novou skupinu';
$language['GROUP_UPLOAD']='Může nahrávat';
$language['GROUP_WT']='Doba čekání, jestliže ratio je <1';
$language['GROUP_EDIT_GROUP']='Upravit skupinu';
$language['GROUP_VIEW']='Zobrazit';
$language['GROUP_EDIT']='Upravit';
$language['GROUP_DELETE']='Smazat';
$language['INSERT_USER_GROUP']='Vložit novou uživatelskou skupinu';
$language['ERR_CANT_FIND_GROUP']='Nemůžu nalézt tuto skupinu!';
$language['GROUP_DELETED']='Skupina byla smazána!';
// MASS PM
$language['USERS_FOUND']='Uživatelé nalezeni';
$language['USERS_PMED']='Uživatelům odeslána PM';
$language['WHO_PM']='Komu poslat PM?';
$language['MASS_SENT']='Hromadná PM poslána!';
$language['MASS_PM']='Hromadná PM';
$language['MASS_PM_ERROR']='Nejdřiv něco napište, pak pošlete!!!';
$language['RATIO_ONLY']='Pouze tomuto ratiu';
$language['RATIO_GREAT']='Větší než toto ratio';
$language['RATIO_LOW']='nižší než toto ratio';
$language['RATIO_FROM']='Od';
$language['RATIO_TO']='Do';
$language['MASSPM_INFO']='Info';
// PRUNE USERS
$language['PRUNE_USERS_PRUNED']='Neaktivní uživatelé';
$language['PRUNE_USERS']='Zneaktivnit uživatele';
$language['PRUNE_USERS_INFO']='Vložte počet dní, po kterých je uživatel označen jako "mrtvý" (Nepřipojen po x dnech NEBO zaregistroval se před x dny a je stále neaktivován)';
// SEARCH DIFF
$language['SEARCH_DIFF']='Hledat rozdíly';
$language['SEARCH_DIFF_MESSAGE']='Zpráva';
$language['DIFFERENCE']='Rozdíly';
$language['SEARCH_DIFF_CHANGE_GROUP']='Změnit skupinu uživatelů';
// PRUNE TORRENTS
$language['PRUNE_TORRENTS_PRUNED']='Neaktivní torrenty';
$language['PRUNE_TORRENTS']='Zneaktivnit torrenty';
$language['PRUNE_TORRENTS_INFO']='Vložit počet dní, po kterých je torrent považován za "mrtvý"';
$language['LEECHERS']='leecherů';
$language['SEEDS']='seederů';
// DBUTILS
$language['DBUTILS_TABLENAME']='Název tabulky';
$language['DBUTILS_RECORDS']='Záznamy';
$language['DBUTILS_DATALENGTH']='Délka záznamu';
$language['DBUTILS_OVERHEAD']='Přesah';
$language['DBUTILS_REPAIR']='Opravit';
$language['DBUTILS_OPTIMIZE']='Optimalizovat';
$language['DBUTILS_ANALYSE']='Analyzovat';
$language['DBUTILS_CHECK']='Zkontrolovat';
$language['DBUTILS_DELETE']='Smazat';
$language['DBUTILS_OPERATION']='Operace';
$language['DBUTILS_INFO']='Info';
$language['DBUTILS_STATUS']='Status';
$language['DBUTILS_TABLES']='Tabulky';
// MYSQL STATUS
$language['MYSQL_STATUS']='Status MySQL';
// SITE LOG
$language['SITE_LOG']='Log stránky';
// FORUMS
$language['FORUM_MIN_CREATE']='Min Class Create';
$language['FORUM_MIN_WRITE']='Min Class Write';
$language['FORUM_MIN_READ']='Min Class Read';
$language['FORUM_SETTINGS']='Nastavení fóra';
$language['FORUM_EDIT']='Editace fóra';
$language['FORUM_ADD_NEW']='Přidat nové fórum';
$language['FORUM_PARENT']='Nadfórum';
$language['FORUM_SORRY_PARENT']='(Sorry, Nemůžu mít nadtřídu, protože již nadtřídou jsem)';
$language['FORUM_PRUNE_1']='Toto fórum obsahuje témata nebo příspěvky!<br />Přijdete o data...<br />';
$language['FORUM_PRUNE_2']='Jestliže jste si jisti smazat toto fórum';
$language['FORUM_PRUNE_3']='jinak se vraťte zpět.';
$language['FORUM_ERR_CANNOT_DELETE_PARENT']='Nemůžete odstranit fórum, které má podfóra, přesuňte podfóra a zkuste znovu';
// MODULES
$language['ADD_NEW_MODULE']='Přidat nový modul';
$language['TYPE']='Typ';
$language['DATE_CHANGED']='Změna data';
$language['DATE_CREATED']='Datum vytvoření';
$language['ACTIVE_MODULES']='Aktivní moduly: ';
$language['NOT_ACTIVE_MODULES']='Neaktivní moduly: ';
$language['TOTAL_MODULES']='Počet modulů: ';
$language['DEACTIVATE']='Deaktivovat';
$language['ACTIVATE']='Aktivovat';
$language['STAFF']='Štáb';
$language['MISC']='Různé';
$language['TORRENT']='Torrent';
$language['STYLE']='Styl';
$language['ID_MODULE']='ID';
// HACKS
$language['HACK_TITLE']='Název';
$language['HACK_VERSION']='Verse';
$language['HACK_AUTHOR']='Autor';
$language['HACK_ADDED']='Přidáno';
$language['HACK_NONE']='Žádný hack nenainstalován';
$language['HACK_ADD_NEW']='Přidat nový hack';
$language['HACK_SELECT']='Vybrat';
$language['HACK_STATUS']='Status';
$language['HACK_INSTALL']='Instalovat';
$language['HACK_UNINSTALL']='Odinstalovat';
$language['HACK_INSTALLED_OK']='Hack úspěšně nainstalován!<br />'."\n".'Pro zobrazení nainstalovaných hacků se vraťte zpět do <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">admin rozhraní (Hacks)</a>';
$language['HACK_BAD_ID']='Chyba získání infa o hacku s tímto ID.';
$language['HACK_UNINSTALLED_OK']='Hack úspěšně odinstalován!<br />'."\n".'Pro zobrazení nainstalovaných hacků se vraťte zpět do <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">admin rozhraní (Hacks)</a>';
$language['HACK_OPERATION']='Operace';
$language['HACK_SOLUTION']='Řešení';
// added rev 520
$language['HACK_WHY_FTP']='Některé ze souborů, které instalační program hacků potřebuje upravit nejsou zapisovatelné. <br />'."\n".'Dá se to změnit přihlášením přes FTP a použitím chmod - změnou atributů nebo vytvořením souborů a složek. <br />'."\n".'FTP informace můžou být dočasně uloženy v cache pro potřeby instalačního programu hacků.';
$language['HACK_FTP_SERVER']='FTP Server';
$language['HACK_FTP_PORT']='FTP Port';
$language['HACK_FTP_USERNAME']='FTP Jméno';
$language['HACK_FTP_PASSWORD']='FTP Heslo';
$language['HACK_FTP_BASEDIR']='Cesta k xbtit (cesta od rootu kde se přihlašujete do FTP)';
// USERS TOOLS
$language['USER_NOT_DELETE']='Účet hosta nebo sebe nelze smazat!';
$language['USER_NOT_EDIT']='Účet hosta nebo sebe nelze editovat';
$language['USER_NOT_DELETE_HIGHER']='Nelze smazat uživatele s vyšši hodností než jste vy.';
$language['USER_NOT_EDIT_HIGHER']='Nelze editovat uživatele s vyšší hodností než jste vy.';
$language['USER_NO_CHANGE']='Nebyla provedena žádná změna.';
//Manual Hack Install
$language['MHI_VIEW_INSRUCT'] = 'Zobrazit manuál instalace?';
$language['MHI_MAN_INSRUCT_FOR'] = 'Manuál isntalace pro';
$language['MHI_RUN_QUERY'] = 'Proveďte následující SQL Query skrz phpMyAdmin';
$language['MHI_IN'] = 'In';
$language['MHI_ALSO_IN'] = 'Also in';
$language['MHI_FIND_THIS'] = 'find this';
$language['MHI_ADD_THIS'] = 'Add this';
$language['MHI_IT'] = 'it';
$language['MHI_REPLACE'] = 'Replace with';
$language['MHI_COPY'] = 'Copy';
$language['MHI_AS'] = 'as';

$language["ACP_SECSUI_SET"]="Bezpečnostní nastavení";
$language["SECSUI_QUAR_SETTING"]="Nastavení karantény nahraných souborů";
$language["SECSUI_QUAR_TERMS_1"]="Vyhledávací podmínky karantény (jedna na řádek)";
$language["SECSUI_QUAR_TERMS_2"]="Níže zadejte slova, která vyvolají karanténu souboru:";
$language["SECSUI_QUAR_TERMS_3"]="Poznámka: není doporučeno přidávat <b><&#63;</b> nebo <b>&#63;></b> jelikož se mohou přirozeně vyskytovat v souboru. Místo toho byste měli nastavit hodnoty <b>short_open_tag</b> na <b>Vypnuto</b> v php.ini. Toto zabrání vaší stránce k provedení php kódu, který začíná <b><&#63;</b> a bude nutit potenciální hackery k použití dlouhého php otevřeného tagu (<b><&#63;php</b>).<br /><br />Současná hodnota je:<br />";
$language["SECSUI_QUAR_DIR_1"]="Adresář karantény";
$language["SECSUI_QUAR_DIR_2"]="K tomtu adresáři by ideálně nemělo být možné přistoupit skrze internet a měl by být alespoň o úroveň výše než je root složka trackeru. Například:";
$language["SECSUI_QUAR_DIR_3"]="Prosím ujistěte se, že jste CHOWN/CHMOD tento adresář správně, takže server do něj může zapisovat soubory.";
$language["SECSUI_QUAR_PM"]="Poslat tracker ID do PM když jsou sobory v karanténě?";
$language["SECSUI_QUAR_INV_USR"]="Neplatný uživatel";
$language["SECSUI_PASS_SETTINGS"]="Nastavení hesla";
$language["SECSUI_PASS_TYPE"]="Metoda hashování hesla";
$language["SECSUI_PASS_INFO"]="Vyberte algoritmus hashování hesla, které bude xbtit používat pro ukládání hesla do databáze::";
$language["SECSUI_NO_MEMBER"]="Uživatel s takovýmto tracker ID neexistuje";
$language["SECSUI_GAZ_TITLE"]="Gazelle Site Salt";
$language["SECSUI_GAZ_DESC"]="Měli byste vybrat náhodnou hodnotu. Jestliže projednou nastaveno, nemělo by se měnit, jinak budou všichni neceni obnovit heslo.";
$language["SECSUI_COOKIE_SETTINGS"]="Nastavení cookie";
$language["SECSUI_COOKIE_PRIMARY"]="Hlavní nastavení cookie";
$language["SECSUI_COOKIE_TYPE"]="Typ cookie";
$language["SECSUI_COOKIE_EXPIRE"]="Cookie vyprší za";
$language["SECSUI_COOKIE_T1"]="Klasický xbtit";
$language["SECSUI_COOKIE_T2"]="Nový xbtit (Regular)";
$language["SECSUI_COOKIE_T3"]="Nový xbtit (Session)";
$language["SECSUI_COOKIE_NAME"]="Jméno cookie";
$language["SECSUI_COOKIE_ITEMS"]="Soubory cookie";
$language["SECSUI_COOKIE_PATH"]="Lokace cookie";
$language["SECSUI_COOKIE_DOMAIN"]="Doména cookie";
$language["SECSUI_COOKIE_MIN"]="Minuta";
$language["SECSUI_COOKIE_MINS"]="Minut	";
$language["SECSUI_COOKIE_HOUR"]="Hodina";
$language["SECSUI_COOKIE_HOURS"]="Hodin";
$language["SECSUI_COOKIE_DAY"]="Den";
$language["SECSUI_COOKIE_DAYS"]="Dní";
$language["SECSUI_COOKIE_WEEK"]="Týden";
$language["SECSUI_COOKIE_WEEKS"]="Týdnů";
$language["SECSUI_COOKIE_MONTH"]="Měsíc";
$language["SECSUI_COOKIE_MONTHS"]="Měsíců";
$language["SECSUI_COOKIE_YEAR"]="Rok";
$language["SECSUI_COOKIE_YEARS"]="Let";
$language["SECSUI_COOKIE_TOO_FAR"]="Omlouváme se, limit expire je Út, 19 Ledna 2038 03:14:07 GMT, prosím upravte datum expirace!";
$language["SECSUI_COOKIE_PSALT"]="Osolení hesla";
$language["SECSUI_COOKIE_UAGENT"]="User Agent";
$language["SECSUI_COOKIE_ALANG"]="Potvrdit jazyk";
$language["SECSUI_COOKIE_IP"]="IP addresa";
$language["SECSUI_COOKIE_DEF"]="Poznámka: Všechny typy cookie budou v základu obsahovat:<br /><br /><li>Tracker ID</li><li>Hash hesla</li><li>Náhodné číslo</li>";
$language["SECSUI_COOKIE_PD"]="Poznámka: Jestliže si nejste jisti co dát do \"Cesta cookie\" or \"Doména cookie\", měli byste je nechat prázdné - bude použita defaultní hodnota";
$language["SECSUI_COOKIE_IP_TYPE_1"] = "Pouze první oktet (Y.N.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_2"] = "Pouze druhý oktet (N.Y.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_3"] = "Pouze třetí oktet (N.N.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_4"] = "Pouze čtvrtý oktet (N.N.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_5"] = "První a druhý oktet(Y.Y.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_6"] = "Druhý a třetí oktet (N.Y.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_7"] = "Třetí a čtvrtý oktet (N.N.Y.Y)";
$language["SECSUI_COOKIE_IP_TYPE_8"] = "První a třetí oktet (Y.N.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_9"] = "První a čtvrtý oktet (Y.N.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_10"] = "Druhý a čtvrtý oktet (N.Y.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_11"] = "První, druhý, třetí oktet (Y.Y.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_12"] = "Druhý, třetí, čtvrtý oktet (N.Y.Y.Y)";
$language["SECSUI_COOKIE_IP_TYPE_13"] = "Celá IP addresa (Y.Y.Y.Y)";
$language["SECSUI_PASSHASH_TYPE_1"] = "Classic xbtit";
$language["SECSUI_PASSHASH_TYPE_2"] = "TBDev";
$language["SECSUI_PASSHASH_TYPE_3"] = "TorrentStrike";
$language["SECSUI_PASSHASH_TYPE_4"] = "Gazelle";
$language["SECSUI_PASSHASH_TYPE_5"] = "Simple Machines Forum";
$language["SECSUI_PASSHASH_TYPE_6"] = "New xbtit";
$language["SECSUI_PASS_MUST"] = "Heslo musí";
$language["SECSUI_PASS_BE_AT_LEAST"] = "Být alespoň";
$language["SECSUI_PASS_HAVE_AT_LEAST"] = "Mít alespoň";
$language["SECSUI_PASS_CHAR_IN_LEN"] = "počet znaků";
$language["SECSUI_PASS_CHAR_IN_LEN_A"] = "počet znaků";
$language["SECSUI_PASS_LC_LET"] = "malé písmeno";
$language["SECSUI_PASS_LC_LET_A"] = "malá písmena";
$language["SECSUI_PASS_UC_LET"] = "velké písmeno";
$language["SECSUI_PASS_UC_LET_A"] = "velká písmena";
$language["SECSUI_PASS_NUM"] = "číslo";
$language["SECSUI_PASS_NUM_A"] = "čísla";
$language["SECSUI_PASS_SYM"] = "symbol";
$language["SECSUI_PASS_SYM_A"] = "symboly";
$language["SECSUI_PASS_ERR_1"] = "Nemůžete mít větší hodnotu pro malá písmena + velká písmena + čísla + symboly";
$language["SECSUI_PASS_ERR_2"] = "než je minimální počet znaků potřebných pro heslo.";

$language["SMF_MIRROR"] = "SMF zrcadlení";
$language["GROUP_SMF_MIRROR"] = "Zrcadlení hodnosti na SMF fóru při změně hodnosti atp.";
$language["SMF_LIST"] = "<b><u>Současný list SMF skupin z databáze</u></b><br />";

$language["IPB_AUTO_ID"] = "IPB Autopost ID";
$language["IPB_MIRROR"] = "IPB Mirror";
$language["GROUP_IPB_MIRROR"] = "Zrcadlení hodnosti na IPB fóru při změně hodnosti atp.";
$language["IPB_LIST"] = "<b><u>Současný list IPB skupin z databáze</u></b><br />";

$language["STYLE_TYPE"]="Typ stylu"; 
$language["CLA_STYLE"]="xbtit classic style system"; 
$language["ATM_STYLE"]="atmoner's style system"; 
$language["PET_STYLE"]="Petr1fied's style system";

?>
