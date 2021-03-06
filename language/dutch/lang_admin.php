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
$language["ACP_BAN_IP"]="Ban IPs";
$language["ACP_FORUM"]="Forum Instellingen";
$language["ACP_USER_GROUP"]="Gebruikersgroepen Instellingen";
$language["ACP_STYLES"]="Style Instellingen";
$language["ACP_LANGUAGES"]="Taal Instellingen";
$language["ACP_CATEGORIES"]="Categories Settings";
$language["ACP_TRACKER_SETTINGS"]="Tracker Instellingen";
$language["ACP_OPTIMIZE_DB"]="Optimaliseer uw Database";
$language["ACP_CENSORED"]="Instellingen Gecensuurde Woorden";
$language["ACP_DBUTILS"]="Database Opties";
$language["ACP_HACKS"]="Hacks";
$language["ACP_HACKS_CONFIG"]="Hack Instellingen";
$language["ACP_MODULES"]="Modules";
$language["ACP_MODULES_CONFIG"]="Module Instellingen";
$language["ACP_MASSPM"]="Massa Priv&eacute; Mail";
$language["ACP_PRUNE_TORRENTS"]="Ontdoen van Torrents";
$language["ACP_PRUNE_USERS"]="Ontdoen van Gebruikers";
$language["ACP_SITE_LOG"]="Bekijk Site Log";
$language["ACP_SEARCH_DIFF"]="Zoek Versch.";
$language["ACP_BLOCKS"]="Block Instellingen";
$language["ACP_POLLS"]="Poll Instellingen";
$language["ACP_MENU"]="Admin Menu";
$language["ACP_FRONTEND"]="Inhoud Instellingen";
$language["ACP_USERS_TOOLS"]="Gebruikers Opties";
$language["ACP_TORRENTS_TOOLS"]="Torrent Opties";
$language["ACP_OTHER_TOOLS"]="Overige Opties";
$language["ACP_MYSQL_STATS"]="MySql Statistieken";
$language["XBTT_BACKEND"]="XBTT Optie";
$language["XBTT_USE"]="Gebruik <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">XBTT</a> als backend?";
$language["XBTT_URL"]="XBTT basislink (zoals http://localhost:2710)";
$language["GENERAL_SETTINGS"]="Algemene Instellingen";
$language["TRACKER_NAME"]="Naam Site";
$language["TRACKER_BASEURL"]="Hoofdlink Tracker (zonder / op einde)";
$language["TRACKER_ANNOUNCE"]="Tracker&rsquo;s Herkennings URLS (&eacute;&eacute;n link per regel)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Controleer uw links nogmaals, u heeft XBTT geactiveerd...</span>":"");
$language["TRACKER_EMAIL"]="Tracker/Eigenaar email";
$language["TORRENT_FOLDER"]="Torrents map";
$language["ALLOW_EXTERNAL"]="Sta Externe Torrents Toe";
$language["ALLOW_GZIP"]="GZIP Inschakelen";
$language["ALLOW_DEBUG"]="Laat Informatie Van Laadtijd en GZIP<br />\nonderaan de pagina zien";
$language["ALLOW_DHT"]="DHT Uitschakelen(priv&eacute; markeren in torrent)<br />\nwerkt alleen op nieuw geuploade torrents";
$language["ALLOW_LIVESTATS"]="Statistieken Inschakelen (Let op: Zorgt voor hogere server lading!)";
$language["ALLOW_SITELOG"]="Basis Site Log Inschakelen (Veranderingen van torrents/gebruikers)";
$language["ALLOW_HISTORY"]="Basis Geschiedenis Inschakelen (torrents/users)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Priv&eacute; Announce";
$language["ALLOW_PRIVATE_SCRAPE"]="Priv&eacute; Statistieken";
$language["SHOW_UPLOADER"]="Laat Uploader Zien";
$language["USE_POPUP"]="Gebruik Pop-Up voor Torrents details/peers";
$language["DEFAULT_LANGUAGE"]="Standaard Taal";
$language["DEFAULT_CHARSET"]="Standaard Charset Decodering<br />\n(als de taal niet goed te zien is, probeer UTF-8)";
$language["DEFAULT_STYLE"]="Standaard Style";
$language["MAX_USERS"]="Max. Aantal Gebruikers (decimalen, 0 = oneindig)";
$language["MAX_TORRENTS_PER_PAGE"]="Torrents per pagina";
$language["SPECIFIC_SETTINGS"]="Tracker's specifieke instellingen";
$language["SETTING_INTERVAL_SANITY"]="Schoonmaak interval (decimale seconden, 0 = uitgeschakeld)<br />Goede waarde, wanneer inschakeld, is 1800 (30 minuten)";
$language["SETTING_INTERVAL_EXTERNAL"]="Update Extern interval (decimale seconden, 0 = uigeschakeld)<br />Verschilt per aantal externe torrents";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Maximum herannounce interval (decimale seconden)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Minimum herannounce interval (decimale seconden)";
$language["SETTING_MAX_PEERS"]="Max nr. van peers voor verzoek (decimaal)";
$language["SETTING_DYNAMIC"]="Dynamische Torrents Inschakelen(niet aanbevolen)";
$language["SETTING_NAT_CHECK"]="NAT controle";
$language["SETTING_PERSISTENT_DB"]="Voortdurende verbindingen (Database, niet aanbevolen)";
$language["SETTING_OVERRIDE_IP"]="Sta gebruikers toe bekende IPs over te schakelen";
$language["SETTING_CALCULATE_SPEED"]="Bereken snelheid en gedownloaden bytes";
$language["SETTING_PEER_CACHING"]="Tabel opslaan in caches (iets minder lading)";
$language["SETTING_SEEDS_PID"]="Max num. van seederes met dezelfde PID";
$language["SETTING_LEECHERS_PID"]="Max num. met leechers met dezelfde PID";
$language["SETTING_VALIDATION"]="Validatie mode";
$language["SETTING_CAPTCHA"]="Beveiligde Registratie (gebruik Afbeelding Code)";
$language["SETTING_FORUM"]="Forum link, kan zijn:<br /><li><font color='#FF0000'>Intern</font> of leeg voor Intern forum</li><li><font color='#FF0000'>SMF</font> voor ge&iuml;ntegreerd <a target='_new' href='http://www.simplemachines.org'>Simple Machines Forum</a></li><li>Uw eigen forum (Specificeer link in tekstvak)</li>";
$language["BLOCKS_SETTING"]="Index/Blok pagina instellingen";
$language["SETTING_CLOCK"]="Klok type";
$language["SETTING_NUM_NEWS"]="Limiet voor Laatste Nieuws blok (nummeriek)";
$language["SETTING_NUM_POSTS"]="Limiet voor Forum blok (nummeriek)";
$language["SETTING_NUM_LASTTORRENTS"]="Limiet voor Laatste Torrents blok (nummeriek)";
$language["SETTING_NUM_TOPTORRENTS"]="Limiet voor Meest Populaire Torrents blok (nummeriek)";
$language["CLOCK_ANALOG"]="Analoog";
$language["CLOCK_DIGITAL"]="Digitaal";
$language["CONFIG_SAVED"]="De instellingen zijn opgeslagen!";
$language["CACHE_SITE"]="Cache interval (decimale seconden, 0 = uitgeschakeld)";
$language["ALL_FIELDS_REQUIRED"]="Alle velden zijn vereist!";
$language["SETTING_CUT_LONG_NAME"]="Kort lange torrent namen af na een x aantal karakters (0 = niet afkorten)";
$language["MAILER_SETTINGS"]="Mailer";
$language["SETTING_MAIL_TYPE"]="Mail Soort";
$language["SETTING_SMTP_SERVER"]="SMTP Server";
$language["SETTING_SMTP_PORT"]="SMTP Poort";
$language["SETTING_SMTP_USERNAME"]="SMTP Gebruikersnaam";
$language["SETTING_SMTP_PASSWORD"]="SMTP Wachtwoord";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="Herhaal SMTP Wachtwoord";
$language["XBTT_TABLES_ERROR"]="U zou xbtt tabellen moeten importeren (kijk naar xbtt installatie instructies) in uw database voordat u xbtt kunt activeren als backend!";
$language["XBTT_URL_ERROR"]="xbtt basis url is verplicht!";
// BAN FORM
$language["BAN_NOTE"]="In dit gedeelte van het Admin Menu, kunt u zien welke IP geband zijn en nieuwe IPs bannen.<br />\nU moet een bereik invullen vanaf (eerste IP) tot (laatste IP).";
$language["BAN_NOIP"]="Er zijn geen gebande IPs";
$language["BAN_FIRSTIP"]="Eerste IP";
$language["BAN_LASTIP"]="Laatste IP";
$language["BAN_COMMENTS"]="Commentaar";
$language["BAN_REMOVE"]="Verwijderen";
$language["BAN_BY"]="Door";
$language["BAN_ADDED"]="Datum";
$language["BAN_INSERT"]="Voeg Nieuw Geband IP bereik toe";
$language["BAN_IP_ERROR"]="Bad IP adres.";
$language["BAN_NO_IP_WRITE"]="U heeft geen IP adres opgeschreven. Sorry!";
$language["BAN_DELETED"]="Het IP bereik is verwijdert uit de database.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Ga terug naar Ban IPs</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Taal Instellingen";
$language["LANGUAGE"]="Taal";
$language["LANGUAGE_ADD"]="Nieuwe Taal Toevoegen";
$language["LANGUAGE_SAVED"]="Gefeliciteerd, taal is veranderd";
// STYLES
$language["STYLE_SETTINGS"]="Style/Thema Instellingen";
$language["STYLE_EDIT"]="Verander Style";
$language["STYLE_ADD"]="Nieuwe Style Toevoegen";
$language["STYLE_NAME"]="Style Naam";
$language["STYLE_URL"]="Style Link";
$language["STYLE_FOLDER"]="Style map ";
$language["STYLE_NOTE"]="In dit gedeelte kunt u uw style instellingen beheren, maar u moet eerst de bestanden hebben geupload via ftp of sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Categorie Instellingen";
$language["CATEGORY_IMAGE"]="Afbeelding Categorie";
$language["CATEGORY_ADD"]="Nieuwe Categorie Toevoegen";
$language["CATEGORY_SORT_INDEX"]="Sorteer Index";
$language["CATEGORY_FULL"]="Categorie";
$language["CATEGORY_EDIT"]="Verander Categorie";
$language["CATEGORY_SUB"]="Deelcategorie";
$language["CATEGORY_NAME"]="Categorie";
// CENSORED
$language["CENSORED_NOTE"]="Schrijf <b>per regel &eacute;&eacute;n woord</b> om het te verbannnen (zal worden veranderd naar *censored*)";
$language["CENSORED_EDIT"]="Verander Gecensureerde Woorden";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Blok Instellingen";
$language["ENABLED"]="Actief";
$language["ORDER"]="Sorteer";
$language["BLOCK_NAME"]="Blok naam";
$language["BLOCK_POSITION"]="Positie";
$language["BLOCK_TITLE"]="Titel Taal (zal worden gebruikt om de vertaalde titel weer te geven)";
$language["BLOCK_USE_CACHE"]="Dit blok in Cache opslaan?";
$language["ERR_BLOCK_NAME"]="U moet een bestand selecteren in de lijst!";
$language["BLOCK_ADD_NEW"]="Nieuw Blok Toevoegen";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Instelling Poll"; // of Enqu&ecirc;te >> Enquete
$language["POLLID"]="Poll ID";
$language["INSERT_NEW_POLL"]="Nieuwe Poll Toevoegen";
$language["CANT_FIND_POLL"]="Kan Poll niet vinden";
$language["ADD_NEW_POLL"]="Poll Toevoegen";
// GROUPS
$language["USER_GROUPS"]="Instellingen Gebruikersgroepen (klik op de groepnaam om te veranderen)";
$language["VIEW_EDIT_DEL"]="Bekijken/Veranderen/Verwijderen";
$language["CANT_DELETE_GROUP"]="Deze groep/level kan niet worden verwijderd!";
$language["GROUP_NAME"]="Groep Naam";
$language["GROUP_VIEW_NEWS"]="Nieuws Bekijken";
$language["GROUP_VIEW_FORUM"]="Forum Bekijken";
$language["GROUP_EDIT_FORUM"]="Forum Veranderen";
$language["GROUP_BASE_LEVEL"]="Selecteer basislevel";
$language["GROUP_ERR_BASE_SEL"]="Fout tijdens selectie basislevel!";
$language["GROUP_DELETE_NEWS"]="Nieuws Verwijderen";
$language["GROUP_PCOLOR"]="Voorvoegsel (bijv. ";
$language["GROUP_SCOLOR"]="Achtervoegsel (bijv. ";
$language["GROUP_VIEW_TORR"]="Torrents Bekijken";
$language["GROUP_EDIT_TORR"]="Torrents Veranderen";
$language["GROUP_VIEW_USERS"]="Gebruikers Bekijken";
$language["GROUP_DELETE_TORR"]="Torrents Verwijderen";
$language["GROUP_EDIT_USERS"]="Gebruikers Veranderen";
$language["GROUP_DOWNLOAD"]="Kan Downloaden";
$language["GROUP_DELETE_USERS"]="Gebruikers Verwijderen";
$language["GROUP_DELETE_FORUM"]="Forum Verwijderen";
$language["GROUP_GO_CP"]="Toegang tot het Admin Menu";
$language["GROUP_EDIT_NEWS"]="Nieuws Veranderen";
$language["GROUP_ADD_NEW"]="Nieuwe Groep Toevoegen";
$language["GROUP_UPLOAD"]="Kan Uploaden";
$language["GROUP_WT"]="Wachttijd wanneer deelverhouding <1";
$language["GROUP_EDIT_GROUP"]="Verander Groep";
$language["GROUP_VIEW"]="Bekijken";
$language["GROUP_EDIT"]="Veranderen";
$language["GROUP_DELETE"]="Verwijderen";
$language["INSERT_USER_GROUP"]="Voeg een nieuw gebruikersgroep toe";
$language["ERR_CANT_FIND_GROUP"]="Kan deze groep niet vinden!";
$language["GROUP_DELETED"]="De groep is verwijderd!";
// MASS PM
$language["USERS_FOUND"]="gebruikers gevonden";
$language["USERS_PMED"]="gebruikers gePMed";
$language["WHO_PM"]="Naar wie moet het PM gestuurd worden?";
$language["MASS_SENT"]="Massa PM verstuurd!!!";
$language["MASS_PM"]="Massa PM";
$language["MASS_PM_ERROR"]="Het is misschien een goed idee om eerst wat neer te zetten en daarna te versturen!!!!";
$language["RATIO_ONLY"]="alleen deze deelverhouding";
$language["RATIO_GREAT"]="hoger dan deze deelverhouding";
$language["RATIO_LOW"]="lager dan deze deelverhouding";
$language["RATIO_FROM"]="Van";
$language["RATIO_TO"]="Tot";
$language["MASSPM_INFO"]="Info";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Verwijderde gebruikers";
$language["PRUNE_USERS"]="Verwijder gebruikers";
$language["PRUNE_USERS_INFO"]="Voer het aantal dagen in voor hoelang de gebruikers als \"dood\" worden beschouwd (niet verbonden voor x aantal dagen OF aangemeld hebben voor aantal x dagen en nog steeds staan op valideren)";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Zoek Verschil.";
$language["SEARCH_DIFF_MESSAGE"]="Bericht";
$language["DIFFERENCE"]="Verschil";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Verander Gebruikersgroep";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Verwijderde torrents";
$language["PRUNE_TORRENTS"]="Verwijder torrents";
$language["PRUNE_TORRENTS_INFO"]="Voer het aandal dagen in voor hoelang de torrents als \"dood\" worden beschouwd";
$language["LEECHERS"]="leecher(s)";
$language["SEEDS"]="seed(s)";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Tabel Naam";
$language["DBUTILS_RECORDS"]="Records";
$language["DBUTILS_DATALENGTH"]="Data Grootte";
$language["DBUTILS_OVERHEAD"]="Overhead";
$language["DBUTILS_REPAIR"]="Repareren";
$language["DBUTILS_OPTIMIZE"]="Optimaliseren";
$language["DBUTILS_ANALYSE"]="Analyseren";
$language["DBUTILS_CHECK"]="Controleren";
$language["DBUTILS_DELETE"]="Verwijderen";
$language["DBUTILS_OPERATION"]="Handelingen";
$language["DBUTILS_INFO"]="Info";
$language["DBUTILS_STATUS"]="Status";
$language["DBUTILS_TABLES"]="Tabellen";
// MYSQL STATUS
$language["MYSQL_STATUS"]="MySql Status";
// SITE LOG
$language["SITE_LOG"]="Site Log";
// FORUMS
$language["FORUM_MIN_CREATE"]="Minimum Aanmaak Level";
$language["FORUM_MIN_WRITE"]="Minimum Schrijf Level";
$language["FORUM_MIN_READ"]="Minimum Lees Level";
$language["FORUM_SETTINGS"]="Forum Instellingen";
$language["FORUM_EDIT"]="Verander Forum";
$language["FORUM_ADD_NEW"]="Nieuw Forum Toevoegen";
$language["FORUM_PARENT"]="Hoofdforum";
$language["FORUM_SORRY_PARENT"]="(Sorry, Ik kan geen hoofdforum krijgen, omdat ik zelf een hoofdforum ben)";
$language["FORUM_PRUNE_1"]="Er zijn nog onderwerpen en/of berichten in dit forum!<br />U zult alle data verliezen...<br />";
$language["FORUM_PRUNE_2"]="Als u zeker weet dat u dit forum wilt verwijderen";
$language["FORUM_PRUNE_3"]="anders ga terug.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="U kunt geen forum verwijderen dat nog deelforums bevat, verplaats de deelforums en probeer opnieuw.";
// MODULES
$language["ADD_NEW_MODULE"]="Nieuwe Module Toevoegen";
$language["TYPE"]="Soort";
$language["DATE_CHANGED"]="Datum Veranderd";
$language["DATE_CREATED"]="Datum Aangemaakt";
$language["ACTIVE_MODULES"]="Active Modules: ";
$language["NOT_ACTIVE_MODULES"]="Uitgeschakelde Modules: ";
$language["TOTAL_MODULES"]="Totale Modules: ";
$language["DEACTIVATE"]="Deactiveren";
$language["ACTIVATE"]="Activeren";
$language["STAFF"]="Staff";
$language["MISC"]="Overige";
$language["TORRENT"]="Torrent";
$language["STYLE"]="Style";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Titel";
$language["HACK_VERSION"]="Versie";
$language["HACK_AUTHOR"]="Autheur";
$language["HACK_ADDED"]="Toegevoegd";
$language["HACK_NONE"]="Er zijn geen hacks geinstalleerd";
$language["HACK_ADD_NEW"]="Nieuwe hack toevoegen";
$language["HACK_SELECT"]="Selecteer";
$language["HACK_STATUS"]="Status";
$language["HACK_INSTALL"]="Installeren";
$language["HACK_UNINSTALL"]="Verwijderen";
$language["HACK_INSTALLED_OK"]="Hack is met succes ge&iuml;nstalleerd!<br />\nOm te zien welke hacks er ge&iuml;nstalleerd zijn, ga terug naar <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminCP (Hacks)</a>";
$language["HACK_BAD_ID"]="Fout tijdens het halen van de info van de hack met dit ID.";
$language["HACK_UNINSTALLED_OK"]="Hack is met succes verwijderd!<br />\nOm te zien welke hacks er ge&iuml;nstalleerd zijn, ga terug naar <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminCP (Hacks)</a>";
// USERS TOOLS
$language["USER_NOT_DELETE"]="U kunt niet het Gast account of uzelf verwijderen!";
$language["USER_NOT_EDIT"]="U kunt niet het Gast account of uzelf veranderen!";
?>