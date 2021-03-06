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
// Traduzione eseguita da mOOn, con il QCheck di Laurianti.
//Un grazie anche a Confe, e a chi si è prodigato nel testare il Tracker
// Per qualsiasi info ci trovate su http://www.btiteam.org
$language["ACP_BAN_IP"]="Banna Indirizzo IP";
$language["ACP_FORUM"]="Settaggi Forum";
$language["ACP_USER_GROUP"]="Settaggi Gruppo Utenti";
$language["ACP_STYLES"]="Settaggi Stile";
$language["ACP_LANGUAGES"]="Settaggi Lingua";
$language["ACP_CATEGORIES"]="Settaggi Categorie";
$language["ACP_TRACKER_SETTINGS"]="Settaggi Tracker";
$language["ACP_OPTIMIZE_DB"]="Ottimizza il Database";
$language["ACP_CENSORED"]="Settaggi per parole censurate";
$language["ACP_DBUTILS"]="Utilità per Database";
$language["ACP_HACKS"]="Hacks";
$language["ACP_HACKS_CONFIG"]="Settaggi Hacks";
$language["ACP_MODULES"]="Moduli";
$language["ACP_MODULES_CONFIG"]="Settaggi Moduli";
$language["ACP_MASSPM"]="Posta elettronica di massa";
$language["ACP_PRUNE_TORRENTS"]="Sfoltisci Torrent";
$language["ACP_PRUNE_USERS"]="Sfoltisci Utenti";
$language["ACP_SITE_LOG"]="Guarda il log del sito";
$language["ACP_SEARCH_DIFF"]="Cerca le Differenze";
$language["ACP_BLOCKS"]="Settaggi Blocchi";
$language["ACP_POLLS"]="Settaggi Sondaggi";
$language["ACP_MENU"]="Menu Amministrazione";
$language["ACP_FRONTEND"]="Settaggio Contenuti";
$language["ACP_USERS_TOOLS"]="Utilità Utenti";
$language["ACP_TORRENTS_TOOLS"]="Utilità orrent";
$language["ACP_OTHER_TOOLS"]="Altre Utilità";
$language["ACP_MYSQL_STATS"]="Statistiche MySql";
$language["XBTT_BACKEND"]="Opzioni XBTT";
$language["XBTT_USE"]="Usa <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">XBTT</a> come backend?";
$language["XBTT_URL"]="Indirizzo di base per Xbtt (tipo http://localhost:2710)";
$language["GENERAL_SETTINGS"]="Settaggio Generale";
$language["TRACKER_NAME"]="Nome del Sito";
$language["TRACKER_BASEURL"]="URL Base del Tracker (senza l'ultima /)";
$language["TRACKER_ANNOUNCE"]="Announce URLS del Tracker (un url per riga)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Ricontrolla l'announce urls un altra volta, hai abilitato la soluzione XBTT...</span>":"");
$language["TRACKER_EMAIL"]="Email gestore del tracker";
$language["TORRENT_FOLDER"]="Cartella torrent";
$language["ALLOW_EXTERNAL"]="Permetti torrent esterni";
$language["ALLOW_GZIP"]="Abilita GZIP";
$language["ALLOW_DEBUG"]="Mostra informazioni di debug a fine pagine";
$language["ALLOW_DHT"]="Disabilita DHT (abilitazione del tag privato nel file torrent)<br />\saranno settate solo nei nuovi torrent spediti";
$language["ALLOW_LIVESTATS"]="Abilita statistiche in diretta (attenzione all'alto carico del server!)";
$language["ALLOW_SITELOG"]="Abilita resoconto del sito (torrent/utenti)";
$language["ALLOW_HISTORY"]="Abilita cronologia (torrent/utenti)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Announce Privato";
$language["ALLOW_PRIVATE_SCRAPE"]="Scrape Privato";
$language["SHOW_UPLOADER"]="Mostra il nome dell'utente che ha inviato il torrent";
$language["USE_POPUP"]="Usa Popup per i Torrent dettagli/ricettori";
$language["DEFAULT_LANGUAGE"]="Linguaggio base";
$language["DEFAULT_CHARSET"]="Codifica dei caratteri base<br />\n(se il tuo linguaggio non viene visualizzato correttamente, prova UTF-8)";
$language["DEFAULT_STYLE"]="Stile base";
$language["MAX_USERS"]="Utenti max (numerico, 0 = nessun limite)";
$language["MAX_TORRENTS_PER_PAGE"]="Torrent per pagina";
$language["SPECIFIC_SETTINGS"]="Settaggi Specifici Tracker";
$language["SETTING_INTERVAL_SANITY"]="Sanitizza a intervalli (unità i misura in secondi, 0 = disabilitato)<br />Un buon Valore, se abilitato è 1800 (30 minuti)";
$language["SETTING_INTERVAL_EXTERNAL"]="Aggiorna torrent esterni a intervalli(unità di misura in secondi, 0 = disabilitato)<br />Dipende da quanti torrent esterni";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Intervallo massimo per reannounce (unità di misura in secondi)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Intervallo minimo per reannounce (unità di misura in secondi)";
$language["SETTING_MAX_PEERS"]="Max N. di distributori per richiesta (numerico)";
$language["SETTING_DYNAMIC"]="Abilita torrent dinamici (non raccomandato)";
$language["SETTING_NAT_CHECK"]="Controllo NAT";
$language["SETTING_PERSISTENT_DB"]="Connessione persistente (Database, non raccomandato)";
$language["SETTING_OVERRIDE_IP"]="Permetti agli utenti di bypassare l'ip rilevato";
$language["SETTING_CALCULATE_SPEED"]="Calcola velocita e byte scaricati";
$language["SETTING_PEER_CACHING"]="Deposito delle tabelle (puo' decrementare un po il sovraccarico)";
$language["SETTING_SEEDS_PID"]="Numero massimo di seed con lo stesso PID";
$language["SETTING_LEECHERS_PID"]="Numero massimo di ricettori con lo stesso PID";
$language["SETTING_VALIDATION"]="Modalità di convalida";
$language["SETTING_CAPTCHA"]="Registrazione Sicura (usa ImageCode, necessita le librerie GD+Freetype)";
$language["SETTING_FORUM"]="Forum link, puo' essere:<br /><li><font color='#FF0000'>internal</font> o vuoto (nessun valore) per forum interno</li><li><font color='#FF0000'>smf</font> per integrare <a target='_new' href='http://www.simplemachines.org'>Simple Machines Forum</a></li><li>La tua soluzione per il forum (Specifica l'url nella casella)</li>";
$language["BLOCKS_SETTING"]="Indice/Blocco settaggio pagina";
$language["SETTING_CLOCK"]="Tipo di orologio";
$language["SETTING_NUM_NEWS"]="Limita per blocco Ultime News (numerico)";
$language["SETTING_NUM_POSTS"]="Limita per il blocco del Forum (numerico)";
$language["SETTING_NUM_LASTTORRENTS"]="Limita per il blocco Ultimo Torrent (numerico)";
$language["SETTING_NUM_TOPTORRENTS"]="Limita per il blocco Torrent piu' Popolare (numerico)";
$language["CLOCK_ANALOG"]="Analogico";
$language["CLOCK_DIGITAL"]="Digitale";
$language["CONFIG_SAVED"]="La configurazione è stata salvata correttamente!";
$language["CACHE_SITE"]="Deposito intervalli (cache intervall)(secondi numerico, 0 = disabilitato)";
$language["ALL_FIELDS_REQUIRED"]="Tutti i campi sono richiesti!";
$language["SETTING_CUT_LONG_NAME"]="Taglia la lunghezza del nome del torrent dopo x caratteri (0 = non tagliare)";
$language["MAILER_SETTINGS"]="Posta";
$language["SETTING_MAIL_TYPE"]="Tipo di posta";
$language["SETTING_SMTP_SERVER"]="SMTP Server";
$language["SETTING_SMTP_PORT"]="SMTP Porta";
$language["SETTING_SMTP_USERNAME"]="SMTP Utente";
$language["SETTING_SMTP_PASSWORD"]="SMTP Password";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="SMTP Password (Ripeti)";
$language["XBTT_TABLES_ERROR"]="Devi importare le tabelle di xbtt(guarda le istruzioni di installazione di xbtt) nel tuo database prima di attivare il backend di xbtt!";
$language["XBTT_URL_ERROR"]="L'indirizzo base di Xbtt ? obbligatorio!";
// BAN FORM
$language["BAN_NOTE"]="In questa parte del pannello di amministrazione, puoi vedere gli indirizzi ip interdetti, ed escludere altri indirizzi ip dal tracker.<br />\nDevi inserirli in un raggio da (primo IP) a (ultimo IP).";
$language["BAN_NOIP"]="Non ci sono indirizzi Ip interdetti";
$language["BAN_FIRSTIP"]="Primo IP";
$language["BAN_LASTIP"]="Ultimo IP";
$language["BAN_COMMENTS"]="Commenti";
$language["BAN_REMOVE"]="Rimossi";
$language["BAN_BY"]="Da";
$language["BAN_ADDED"]="Data";
$language["BAN_INSERT"]="Inserisci un nuovo raggio ip da interdire";
$language["BAN_IP_ERROR"]="Indirizzo IP non corretto.";
$language["BAN_NO_IP_WRITE"]="Non hai scritto un indirizzo IP. OOppss ;)";
$language["BAN_DELETED"]="Il raggio di ip interdetti e' stato cancellato dal database.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Ritorna a interdire indirizzi IP</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Settaggio Lingua";
$language["LANGUAGE"]="Lingua";
$language["LANGUAGE_ADD"]="Inserisci un nuovo linguaggio";
$language["LANGUAGE_SAVED"]="Complimenti, il linguaggio è stato modificato";
// STYLES
$language["STYLE_SETTINGS"]="Stile/Settaggio Tema";
$language["STYLE_EDIT"]="Modifica stile";
$language["STYLE_ADD"]="Inserisci nuovo stile";
$language["STYLE_NAME"]="Nome stile";
$language["STYLE_URL"]="Stile URL";
$language["STYLE_FOLDER"]="Cartella stile ";
$language["STYLE_NOTE"]="In questa sezione puoi amministrare i tuoi settaggi sul stile, ma devi inviare i files tramite ftp o sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Settaggi Categorie";
$language["CATEGORY_IMAGE"]="Immagini Categorie";
$language["CATEGORY_ADD"]="Inserisci una nuova categoria";
$language["CATEGORY_SORT_INDEX"]="Ordina Indice";
$language["CATEGORY_FULL"]="Categoria";
$language["CATEGORY_EDIT"]="Modifica Categoria";
$language["CATEGORY_SUB"]="Sotto-Categoria";
$language["CATEGORY_NAME"]="Categoria";
// CENSORED
$language["CENSORED_NOTE"]="Scrivi <b>una parola per linea</b> da censurare (verra cambiata in *censurata*)";
$language["CENSORED_EDIT"]="Modifica le parole censurate";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Configurazione dei blocchi";
$language["ENABLED"]="Abilita";
$language["ORDER"]="Ordina";
$language["BLOCK_NAME"]="Nome del Blocco";
$language["BLOCK_POSITION"]="Posizione";
$language["BLOCK_TITLE"]="Titolo linguaggi (verrà usato per visualizzare i linguaggi tradotti)";
$language["BLOCK_USE_CACHE"]="Deposita questo blocco ?";
$language["ERR_BLOCK_NAME"]="Devi selezionare uno di quelli abilitati!";
$language["BLOCK_ADD_NEW"]="Aggiungi un nuovo blocco";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Configurazione sondaggi";
$language["POLLID"]="Sondaggio id";
$language["INSERT_NEW_POLL"]="Aggiungi un sondaggio";
$language["CANT_FIND_POLL"]="Non trovo il sondaggio";
$language["ADD_NEW_POLL"]="Aggiungi un nuovo sondaggio";
// GROUPS
$language["USER_GROUPS"]="Settaggio del gruppo di utenti(clicca nel nome del gruppo da editare)";
$language["VIEW_EDIT_DEL"]="Vedi/Modifica/Cancella";
$language["CANT_DELETE_GROUP"]="Questo livello/Il gruppo non puo' essere cancellato!";
$language["GROUP_NAME"]="Nome del Gruppo";
$language["GROUP_VIEW_NEWS"]="Vedi News";
$language["GROUP_VIEW_FORUM"]="Vedi Forum";
$language["GROUP_EDIT_FORUM"]="Modifica Forum";
$language["GROUP_BASE_LEVEL"]="Scegli il livello base";
$language["GROUP_ERR_BASE_SEL"]="Errore nel livello base selezionato!";
$language["GROUP_DELETE_NEWS"]="Cancella News";
$language["GROUP_PCOLOR"]="Prefisso dei colori (come ";
$language["GROUP_SCOLOR"]="Suffisso dei colori (come ";
$language["GROUP_VIEW_TORR"]="Vedi Torrent";
$language["GROUP_EDIT_TORR"]="Modifica Torrent";
$language["GROUP_VIEW_USERS"]="Vedi Utenti";
$language["GROUP_DELETE_TORR"]="Cancella Torrent";
$language["GROUP_EDIT_USERS"]="Modifica Utenti";
$language["GROUP_DOWNLOAD"]="Può Scaricare";
$language["GROUP_DELETE_USERS"]="Cancella Utente";
$language["GROUP_DELETE_FORUM"]="Cancella Forum";
$language["GROUP_GO_CP"]="Può accedere al pannello di controllo di amministrazione";
$language["GROUP_EDIT_NEWS"]="Modifica le News";
$language["GROUP_ADD_NEW"]="Aggiungi un Nuovo Gruppo";
$language["GROUP_UPLOAD"]="Può fare Upload";
$language["GROUP_WT"]="Tempo di attesa se il Punteggio è < 1";
$language["GROUP_EDIT_GROUP"]="Modifica il Gruppo";
$language["GROUP_VIEW"]="Vedi";
$language["GROUP_EDIT"]="Modifica";
$language["GROUP_DELETE"]="Cancella";
$language["INSERT_USER_GROUP"]="Inserisci un nuovo utente nel gruppo";
$language["ERR_CANT_FIND_GROUP"]="Non trovo il gruppo!";
$language["GROUP_DELETED"]="Il gruppo è stato cancellato!";
// MASS PM
$language["USERS_FOUND"]="Utente trovato";
$language["USERS_PMED"]="Invio mail all' Utente";
$language["WHO_PM"]="A chi vuoi siano spediti i messaggi privati?";
$language["MASS_SENT"]="Email di massa spedita !!!";
$language["MASS_PM"]="Email di massa";
$language["MASS_PM_ERROR"]="Sarebbe una buona idea se scrivessi qualcosa prima di inviare !!!!";
$language["RATIO_ONLY"]="solo questo punteggio";
$language["RATIO_GREAT"]="maggiore di questo punteggio";
$language["RATIO_LOW"]="minore di questo punteggio";
$language["RATIO_FROM"]="Da";
$language["RATIO_TO"]="A";
$language["MASSPM_INFO"]="Informa";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Utenti Sfoltiti";
$language["PRUNE_USERS"]="Sfoltisci Utenti";
$language["PRUNE_USERS_INFO"]="Immetti il numero dei giorni che un utente viene considerato \"dead\" (non connesso da x giorni OR si è registrato da x giorni senza essersi validato)";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Cerca Diff.";
$language["SEARCH_DIFF_MESSAGE"]="Messagio";
$language["DIFFERENCE"]="Differenze";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Cambia Gruppo Utenti";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Torrent Sfoltiti";
$language["PRUNE_TORRENTS"]="Sfoltisci Torrent";
$language["PRUNE_TORRENTS_INFO"]="Immetti il numero dei giorni che un torrent viene considerato \"dead\"";
$language["LEECHERS"]="ricettori";
$language["SEEDS"]="distributori";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Nome Tabella";
$language["DBUTILS_RECORDS"]="Archivio";
$language["DBUTILS_DATALENGTH"]="Lunghezza Dati";
$language["DBUTILS_OVERHEAD"]="Overhead";
$language["DBUTILS_REPAIR"]="Ripara";
$language["DBUTILS_OPTIMIZE"]="Ottimizza";
$language["DBUTILS_ANALYSE"]="Analizza";
$language["DBUTILS_CHECK"]="Controlla";
$language["DBUTILS_DELETE"]="Elimina";
$language["DBUTILS_OPERATION"]="Operazione";
$language["DBUTILS_INFO"]="Info";
$language["DBUTILS_STATUS"]="Stato";
$language["DBUTILS_TABLES"]="Tabelle";
// MYSQL STATUS
$language["MYSQL_STATUS"]="Stato di MySql";
// SITE LOG
$language["SITE_LOG"]="Log del sito";
// FORUMS
$language["FORUM_MIN_CREATE"]="Min Class Crea";
$language["FORUM_MIN_WRITE"]="Min Class Scrivi";
$language["FORUM_MIN_READ"]="Min Class Leggi";
$language["FORUM_SETTINGS"]="Settaggi Forum";
$language["FORUM_EDIT"]="Modifica Forum";
$language["FORUM_ADD_NEW"]="Aggiungi un nuovo Forum";
$language["FORUM_PARENT"]="Parent's Forum";
$language["FORUM_SORRY_PARENT"]="(Sorry, I can't have parent, because I'm myself a parent forum)";
$language["FORUM_PRUNE_1"]="Ci sono oggetti di discussione e repliche in questo forum!<br />Perderai tutti i dati...<br />";
$language["FORUM_PRUNE_2"]="Sei sicuro di voler cancellare questo forum";
$language["FORUM_PRUNE_3"]="altrimenti torna indietro.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Non puoi cancellare un forum che ha dei processi attivi(childs), muovi i sottoprocessi attivi su un altro forum, e prova di nuovo";
// MODULES
$language["ADD_NEW_MODULE"]="Aggiungi un nuovo modulo";
$language["TYPE"]="Tipo";
$language["DATE_CHANGED"]="Data cambiamento";
$language["DATE_CREATED"]="Data creazione";
$language["ACTIVE_MODULES"]="Moduli attivi: ";
$language["NOT_ACTIVE_MODULES"]="Moduli non attivi: ";
$language["TOTAL_MODULES"]="Moduli totali: ";
$language["DEACTIVATE"]="Disattivato";
$language["ACTIVATE"]="Attivato";
$language["STAFF"]="Staff";
$language["MISC"]="Miscellanea";
$language["TORRENT"]="Torrent";
$language["STYLE"]="Stile";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Titolo";
$language["HACK_VERSION"]="Versione";
$language["HACK_AUTHOR"]="Autore";
$language["HACK_ADDED"]="Aggiunto";
$language["HACK_NONE"]="Non ci sono hacks installati";
$language["HACK_ADD_NEW"]="Aggiungi un nuovo hacks";
$language["HACK_SELECT"]="Seleziona";
$language["HACK_STATUS"]="Stato";
$language["HACK_INSTALL"]="Installa";
$language["HACK_UNINSTALL"]="Disinstalla";
$language["HACK_INSTALLED_OK"]="L'hack è stato installato con successo !<br />\nPer vedere quali hacks sono installati, ritorna a <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminCP (Hacks)</a>";
$language["HACK_BAD_ID"]="Errore nell'ottenere info su questo hack con questo ID.";
$language["HACK_UNINSTALLED_OK"]="L'hack è stato disinstallato con successo!<br />\nPer vedere quali hacks sono installati, ritorna a <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">adminCP (Hacks)</a>";
$language['HACK_OPERATION']='Operazione';
$language['HACK_SOLUTION']='Soluzione';
// added rev 520
$language['HACK_WHY_FTP']='Alcuni dei file che l&rsquo;hack deve modifcare non sono scrivibili<br />'."\n".'Questo necessita di essere modificato con l&rsquo;accesso via FTP  e usando il chmod o creando i file o le cartelle <br />'."\n".'Le informazioni di accesso FTP temporaneamente memorizzate per eseguire le operazioni necessarie all&rsquo;installazione dell&rsquo;hack.';
$language['HACK_FTP_SERVER']='Server FTP';
$language['HACK_FTP_PORT']='Porta FTP';
$language['HACK_FTP_USERNAME']='FTP Username';
$language['HACK_FTP_PASSWORD']='FTP Password';
$language['HACK_FTP_BASEDIR']='Percorso locale di xbtit (il percorso dalla radice quando effettuate l&rsquo;accesso FTP)';
// USERS TOOLS
$language['USER_NOT_DELETE']='Non puoi cancelle utenti Ospite o te stesso!';
$language['USER_NOT_EDIT']='Non puoi modificare utenti Ospite o te stesso!';
$language['USER_NOT_DELETE_HIGHER']='Non puoi cancellare utenti di livello maggiore del tuo.';
$language['USER_NOT_EDIT_HIGHER']='Non puoi modificare utenti di livello maggiore del tuo.';
$language['USER_NO_CHANGE']='Nessuan modifica apportata.';
//Manual Hack Install
$language['MHI_VIEW_INSRUCT'] = 'Visualizzare l&rsquo;installazione manuale?';
$language['MHI_MAN_INSRUCT_FOR'] = 'Istruzioni per l&rsquo;Installazione Manuale di';
$language['MHI_RUN_QUERY'] = 'Eseguire le seguenti SQL Query usando phpMyAdmin';
$language['MHI_IN'] = 'In';
$language['MHI_ALSO_IN'] = 'Anche in';
$language['MHI_FIND_THIS'] = 'Trovare questo';
$language['MHI_ADD_THIS'] = 'Aggiungere questo';
$language['MHI_IT'] = 'esso';
$language['MHI_REPLACE'] = 'Sostituire con';
$language['MHI_COPY'] = 'Copia';
$language['MHI_AS'] = 'come';


?>