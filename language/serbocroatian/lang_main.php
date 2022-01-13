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
$language["ACCOUNT_CONFIRM"]="Potvrda naloga na $SITENAME stranici.";
$language["ACCOUNT_CONGRATULATIONS"]="cestitamo, vas nalog je sada aktiviran!<br>Sada se mozete <a href=index.php?page=login>ulogovati ovdje</a> i poceti koristiti vas nalog.";
$language["ACCOUNT_CREATE"]="kreiraj nalog";
$language["ACCOUNT_DELETE"]="Obrisi nalog";
$language["ACCOUNT_DETAILS"]="Detalji naloga";
$language["ACCOUNT_EDIT"]="Izmjeni nalog";
$language["ACCOUNT_MGMT"]="Menadzer naloga";
$language["ACCOUNT_MSG"]="Pozdrav,\n\nOvaj e-mail je poslan zato sto je neko napravio nalog na nasoj stranici koristeci ovu e-mail adresu.\nUkoliko vi niste izvrsili registraciju zanemarite ovaj e-mail, u suprotnom molimo potvrdite vas nalog. \n\nPozdrav od naseg tima.";
$language["ACTION"]="Akcija";
$language["ACTIVATED"]="Aktiviran";
$language["ACTIVE"]="Status";
$language["ACTIVE_ONLY"]="Aktivne";
$language["ADD"]="Dodaj";
$language["ADDED"]="Dodato";
$language["ADMIN_CPANEL"]="Admin Kontrol Panel";
$language["ADMINCP_NOTES"]="Ovdje mozete izvrsiti sva podesavanja vaseg trackera...";
$language["ALL"]="Sve";
$language["ALL_SHOUT"]="Kompletan chat";
$language["ANNOUNCE_URL"]="Tracker announce url:";
$language["ANONYMOUS"]="Anoniman";
$language["ANSWER"]="Odgovor";
$language["AUTHOR"]="Autor";
$language["AVATAR_URL"]="Avatar (url): ";
$language["AVERAGE"]="Prosjek";
$language["BACK"]="Natrag";
$language["BAD_ID"]="Nevazeci ID!";
$language["BCK_USERCP"]="Natrag na korisnicki panel";
$language["BLOCK"]="Blokiraj";
$language["BODY"]="Body";
$language["BOTTOM"]="dno";
$language["BY"]="Od";
$language["CANT_DELETE_ADMIN"]="Nemoguce je obrisati drugog admina!";
$language["CANT_DELETE_NEWS"]="Nemate ovlastenja da brisete vijesti!";
$language["CANT_DELETE_TORRENT"]="Niste ovlasteni da obrisete ovaj torrent!...";
$language["CANT_DELETE_USER"]="Nemate ovlastenja da brisete korisnike!";
$language["CANT_DO_QUERY"]="MySQL nemoze primati naredbe";
$language["CANT_EDIT_TORR"]="Ne mozete izmjeniti torrent!";
$language["CANT_FIND_TORRENT"]="Ne mozemo naci ovaj torrent!";
$language["CANT_READ_LANGUAGE"]="Ne mozemo citati jezicni fajl!";
$language["CANT_SAVE_CONFIG"]="Ne mozemo sacuvati podesavanja u config.php";
$language["CANT_SAVE_LANGUAGE"]="Ne mozemo sacuvati jezicni fajl";
$language["CANT_WRITE_CONFIG"]="Upozorenje: Ne mozemo pisati u config.php!";
$language["CATCHUP"]="Obiljezi sve kao procitano";
$language["CATEGORY"]="Kat.";
$language["CATEGORY_FULL"]="Kategorija";
$language["CENTER"]="centar";
$language["CHANGE_PID"]="Promjeni PID";
$language["CHARACTERS"]="karakteri";
$language["CHOOSE"]="Odaberi";
$language["CHOOSE_ONE"]="odaberi jedan";
$language["CLICK_HERE"]="klikni ovdje";
$language["CLOSE"]="zatvori";
$language["COMMENT"]="Kom.";
$language["COMMENT_1"]="Komentar";
$language["COMMENT_PREVIEW"]="Pregled komentara";
$language["COMMENTS"]="Komentara";
$language["CONFIG_SAVED"]="Cestitamo, nova podesavanja su sacuvana";
$language["COUNTRY"]="Zemlja";
$language["CURRENT_DETAILS"]="Trenutni detalji";
$language["DATABASE_ERROR"]="Greska u bazi podataka.";
$language["DATE"]="Datum";
$language["DB_ERROR_REQUEST"]="Greska u bazi podataka. Nemozemo izvrsiti zadatak.";
$language["DB_SETTINGS"]="MySQL podesavanja";
$language["DEAD_ONLY"]="Neaktivne";
$language["DELETE"]="Obrisi";
$language["DELETE_ALL_READED"]="Obrisi sve procitane";
$language["DELETE_CONFIRM"]="Da li ste sigurni da zelite obrisati/ukloniti ovo?";
$language["DELETE_TORRENT"]="Izbrisi torrent";
$language["DELFAILED"]="Brisanje neuspjesno";
$language["DESCRIPTION"]="Opis";
$language["DONT_NEED_CHANGE"]="Nemate potrebe mjenjati ova podesavanja!";
$language["DOWN"]="Dl";
$language["DOWNLOAD"]="Download";
$language["DOWNLOAD_TORRENT"]="Download torrent";
$language["DOWNLOADED"]="Downloadovano";
$language["EDIT"]="Izmjeni";
$language["EDIT_LANGUAGE"]="Izmjeni jezik";
$language["EDIT_POST"]="Izmjeni post";
$language["EDIT_TORRENT"]="Izmjeni torrent";
$language["EMAIL"]="E-mail";
$language["EMAIL_SENT"]="E-mail je poslan na navedenu adresu<br>kliknite na ukljuceni link da potvrdite vas nalog.";
$language["EMAIL_VERIFY"]="e-mail promjena na $SITENAME";
$language["EMAIL_VERIFY_BLOCK"]="E-mail potvrde je poslan";
$language["EMAIL_VERIFY_MSG"]="Pozdrav,\n\nOvaj e-mail je poslan u svrhu promjene vase email adrese, kliknite na link da potvrdite promjenu.\n\nPozdrav od naseg tima.";
$language["EMAIL_VERIFY_SENT1"]="<br /><center>E-mail potvrde je poslan:<br /><br /><strong><font color=\"red\">";
$language["EMAIL_VERIFY_SENT2"]="</font></strong><br /><br />trebacete kliknuti na link u poslanom e-mailu da<br />izvrsite promjenu e-maila. E-mail bi trebali primiti u roko od 10 minuta<br />(obicno odmah) takodje je moguce da ga neki e-mail provajderi tretiraju kao SPAM<br />budite sigurni da provjerite i vas SPAM direktorijum ukoliko ne nadjete e-mail u vasem inboxu.<br /><br />";
$language["ERR_500"]="HTTP/1.0 500 Neovlasten pristup!";
$language["ERR_AVATAR_EXT"]="Oprostite, samo gif,jpg,bmp ili png su dozvoljeni";
$language["ERR_BAD_LAST_POST"]="";
$language["ERR_BAD_NEWS_ID"]="Ne vazeci ID vijesti!";
$language["ERR_BODY_EMPTY"]="Body nemoze biti prazan!";
$language["ERR_CANT_CONNECT"]="Ne mozemo ostvariti vezu sa MySQL serverom";
$language["ERR_CANT_OPEN_DB"]="Ne mozemo otvoriti bazu podataka";
$language["ERR_DB_ERR"]="Greska u bazi podataka. Molimo kontaktirajte administratora u vezi ovoga.";
$language["ERR_DELETE_POST"]="Obrisi post. Sanity provjera: Vi ce te da obrisete post. Kliknite";
$language["ERR_DELETE_TOPIC"]="Obrisi temu. Sanity provjera: Vi ce te da obrisete topic. Kliknite";
$language["ERR_EMAIL_ALREADY_EXISTS"]="E-mail je vec registrovan!";
$language["ERR_EMAIL_NOT_FOUND_1"]="E-mail adresa";
$language["ERR_EMAIL_NOT_FOUND_2"]="nije pronadjena u bazi podataka.";
$language["ERR_ENTER_NEW_TITLE"]="Morate unjeti novi naziv!";
$language["ERR_FORUM_NOT_FOUND"]="Forum nije pronadjen";
$language["ERR_FORUM_UNKW_ACT"]="Forum greska: Nepoznata akcija";
$language["ERR_GUEST_EXISTS"]="'Guest' je rezervisano korisnicko ime. Ne mozete se registrovati kao 'Guest'";
$language["ERR_IMAGE_CODE"]="Kod na slici i vas unos se ne poklapaju";
$language["ERR_INS_TITLE_NEWS"]="Morate unjeti i naziv i sadrzaj vijesti";
$language["ERR_INV_NUM_FIELD"]="Netacna numericka polja od strane klijenta";
$language["ERR_INVALID_CLIENT_EVENT"]="Nevazeca akcija od strane klijenta.";
$language["ERR_INVALID_INFO_BT_CLIENT"]="Netazna informacija primljena od strane klijenta";
$language["ERR_INVALID_IP_NUMB"]="Netacna IP adresa. Mora biti decimalna sa tackama (hostovi nisu dozvoljeni)";
$language["ERR_LEVEL"]="Oprostite, vas rang ";
$language["ERR_LEVEL_CANT_POST"]="Ne mozete odgovarati u forumu.";
$language["ERR_LEVEL_CANT_VIEW"]="Nemate ovlastenja da pregledate ovu temu.";
$language["ERR_MISSING_DATA"]="Nedostaju dodatne informacije!";
$language["ERR_MUST_BE_LOGGED_SHOUT"]="Ulogujte se da chatujete...";
$language["ERR_NO_BODY"]="Nema body teksta";
$language["ERR_NO_NEWS_ID"]="ID vijesti nije pronadjen!";
$language["ERR_NO_POST_WITH_ID"]="Nijedan post sa ID ";
$language["ERR_NO_SPACE"]="Vase korisnicko ime nemoze sadrzavati prazan prostore, molimo zamjenite ga donjom crticim pr:<br /><br />";
$language["ERR_NO_TOPIC_ID"]="ID teme nije proslijedjen";
$language["ERR_NO_TOPIC_POST_ID"]="Nijedna tema nije asocirana sa ID posta";
$language["ERR_NOT_AUTH"]="Nemate autorizacije!";
$language["ERR_NOT_FOUND"]="Nije pronadjeno...";
$language["ERR_NOT_PERMITED"]="Nemate ovlastenja";
$language["ERR_PASS_LENGTH"]="<font color=\"black\">Vasa lozinka mora biti barem 4 karaktera.</font>";
$language["ERR_PASSWORD_INCORRECT"]="Netacna lozinka";
$language["ERR_PERM_DENIED"]="Nemate autorizacije";
$language["ERR_PID_NOT_FOUND"]="Molimo ponovo downloadujte torrent. PID sistem je ukljucen i PID nije pronadjen u torrentu";
$language["ERR_RETR_DATA"]="Greska u primitku podataka!";
$language["ERR_SEND_EMAIL"]="Ne mozemo poslati mail. Molimo kontaktirajte administratora u vezi ovoga.";
$language["ERR_SERVER_LOAD"]="Server opterecenje je trenutno na visokom nivou. Pokusavamo, molimo sacekajte...";
$language["ERR_SPECIAL_CHAR"]="<font color=\"black\">Vase korisnicko ime ne moze sadrzavati specijalne karaktere kao:<br /><br /><font color=\"red\"><strong>* ? < > @ $ & % itd.</strong></font></font><br />";
$language["ERR_SQL_ERR"]="SQL greska";
$language["ERR_SUBJECT"]="Dodajte subjekat.";
$language["ERR_TOPIC_ID_NA"]="ID teme je nepoznat";
$language["ERR_TOPIC_LOCKED"]="Tema je zakljucana";
$language["ERR_TORRENT_IN_BROWSER"]="Ovaj fajl je za bittorrent klijente.";
$language["ERR_UPDATE_USER"]="Nemozemo izmjeniti korisnika. Molimo kontaktirajte administratora u vezi ovoga.";
$language["ERR_USER_ALREADY_EXISTS"]="Korisnicko ime je vec u upotrebi, odaberite drugo!";
$language["ERR_USER_NOT_FOUND"]="Oprostite, korisnik nije pronadjen";
$language["ERR_USER_NOT_USER"]="Ne mozete vrsiti tudja podesavanja!";
$language["ERR_USERNAME_INCORRECT"]="Netacno korisnicko ime";
$language["ERROR"]="Greska";
$language["ERROR_ID"]="ID greska";
$language["FACOLTATIVE"]="opcionalno";
$language["FILE"]="Fajl";
$language["FILE_CONTENTS"]="Sadrzaj fajla";
$language["FILE_NAME"]="Naziv fajla";
$language["FIND_USER"]="Pronadji korisnika";
$language["FINISHED"]="Zavrseno";
$language["FORUM"]="Forum";
$language["FORUM_ERROR"]="Forum greska";
$language["FORUM_INFO"]="Forum info";
$language["FORUM_MIN_CREATE"]="Min klasa kreira";
$language["FORUM_MIN_READ"]="Min klasa cita";
$language["FORUM_SEARCH"]="Trazi forum";
$language["FORUM_N_TOPICS"]="No tema";
$language["FORUM_N_POSTS"]="No postova";
$language["FRM_DELETE"]="Obrisi";
$language["FRM_LOGIN"]="Uloguj se";
$language["FRM_PREVIEW"]="Pregledaj";
$language["FRM_REFRESH"]="Osvjezi";
$language["FRM_RESET"]="Resetuj";
$language["FRM_SEND"]="Posalji";
$language["FRM_CONFIRM"]="Potvrdi";
$language["FRM_CANCEL"]="Otkazi";
$language["FRM_CLEAN"]="Ocisti";
$language["GLOBAL_SERVER_LOAD"]="Globalno server opterecenje (sve stranice na ovom serveru)";
$language["GO"]="Napred";
$language["GROUP"]="Grupa";
$language["GUEST"]="Gost";
$language["GUESTS"]="Gosti";
$language["HERE"]="ovdje";
$language["HISTORY"]="Istorija";
$language["HOME"]="Home";
$language["IF_YOU_ARE_SURE"]="ako ste sigurni.";
$language["IM_SURE"]="siguran sam";
$language["IN"]="u";
$language["INF_CHANGED"]="Info promjenjen!";
$language["INFINITE"]="Inf.";
$language["INFO_HASH"]="Info Hash";
$language["INS_NEW_PWD"]="Ukucaj novu lozinku!";
$language["INS_OLD_PWD"]="Ukucaj staru lozinku!";
$language["INSERT_DATA"]="Unesite sve potrebne podatke za upload.";
$language["INSERT_NEW_FORUM"]="Dodaj novi forum";
$language["INVALID_ID"]="ID je netacan. Oprostite!";
$language["INVALID_INFO_HASH"]="netacna info hash vrijednost.";
$language["INVALID_PID"]="Netacan PID";
$language["INVALID_TORRENT"]="Tracker greska: invalidan torrent";
$language["KEYWORDS"]="kljucne rijeci";
$language["LAST_EXTERNAL"]="Zadnji spoljasnji torrent update ";
$language["LAST_NEWS"]="Posljednje vijesti";
$language["LAST_POST_BY"]="Zadnji post od";
$language["LAST_SANITY"]="Zadnja sanity provjera je odradjena ";
$language["LAST_TORRENTS"]="Posljednji torrenti";
$language["LAST_UPDATE"]="Zadnji update";
$language["LASTPOST"]="Zadnji post";
$language["LEECHERS"]="leechera";
$language["LEFT"]="ostalo";
$language["LOGIN"]="Uloguj se";
$language["LOGOUT"]="Izloguj se";
$language["MAILBOX"]="Mail sanduce";
$language["MANAGE_NEWS"]="Menager vijesti";
$language["MEMBER"]="Korisnik";
$language["MEMBERS"]="Korisnici";
$language["MEMBERS_LIST"]="Korisnicka lista";
$language["MINIMUM_100_DOWN"]="(minimalno 100 MB downlovano)";
$language["MINIMUM_5_LEECH"]="sa minimalno 5 leechera, neaktivni torrenti nisu ukljuceni";
$language["MINIMUM_5_SEED"]="sa minimalno 5 seedera";
$language["MKTOR_INVALID_HASH"]="makeTorrent: Primljen ne vazeci hash";
$language["MNU_ADMINCP"]="Admin Panel";
$language["MNU_FORUM"]="Forum";
$language["MNU_INDEX"]="Index";
$language["MNU_MEMBERS"]="Clanovi";
$language["MNU_NEWS"]="Vijesti";
$language["MNU_STATS"]="Ekstra statistika";
$language["MNU_TORRENT"]="Torrenti";
$language["MNU_UCP_CHANGEPWD"]="Promjeni lozinku";
$language["MNU_UCP_HOME"]="Korisnicki CP";
$language["MNU_UCP_IN"]="Vas PM inbox";
$language["MNU_UCP_INFO"]="promjeni profil";
$language["MNU_UCP_NEWPM"]="Novi PM";
$language["MNU_UCP_OUT"]="Vas PM outbox";
$language["MNU_UCP_PM"]="Vas PM";
$language["MNU_UPLOAD"]="Upload";
$language["MORE_SMILES"]="Jos smajlija";
$language["MORE_THAN"]="Vise od ";
$language["MORE_THAN_2"]="tema pronadjeno, pokazujemo prvih";
$language["NA"]="N/A";
$language["NAME"]="Ime";
$language["NEED_COOKIES"]="Trebate kukije osposobljene da se ulogujete.";
$language["NEW_COMMENT"]="Dodajte vas komentar...";
$language["NEW_COMMENT_T"]="Novi komentar";
$language["NEWS"]="vijesti";
$language["NEWS_DESCRIPTION"]="Vijesti:";
$language["NEWS_INSERT"]="Dodajte vijesti";
$language["NEWS_PANEL"]="Panel vijesti";
$language["NEWS_TITLE"]="Naziv:";
$language["NEXT"]="Sljedeci";
$language["NO"]="Ne";
$language["NO_BANNED_IPS"]="Nema suspendovanih IP adresa";
$language["NO_COMMENTS"]="Nema komentara...";
$language["NO_FORUMS"]="Nema foruma!";
$language["NO_MAIL"]="Nemate novog maila.";
$language["NO_MESSAGES"]="Nema PM-ova...";
$language["NO_NEWS"]="Nema vijesti";
$language["NO_PEERS"]="Nema aktivnosti (peers)";
$language["NO_RECORDS"]="Oprostite, lista je prazna...";
$language["NO_TOPIC"]="Nema tema";
$language["NO_TORR_UP_USER"]="Nema uploadovanih torrenata od ovog korisnika";
$language["NO_TORRENTS"]="Nema torrenata...";
$language["NO_USERS_FOUND"]="Nema korisnika!";
$language["NOBODY_ONLINE"]="Niko nije online";
$language["NONE"]="Nista";
$language["NOT_ADMIN_CP_ACCESS"]="Nemate pristupa admin panelu!";
$language["NOT_ALLOW_DOWN"]="nije vam dozvoljen download sa";
$language["NOT_AUTH_DOWNLOAD"]="Nemate ovlastenja za download. Oprostite...";
$language["NOT_AUTH_VIEW_NEWS"]="Nemate autorizacije za pregled vijesti!";
$language["NOT_AUTHORIZED"]="Nemate autorizacije za pregled";
$language["NOT_AUTHORIZED_UPLOAD"]="Nemate autorizacije za upload!";
$language["NOT_AVAILABLE"]="N/A";
$language["NOT_MAIL_IN_URL"]="Ovo nije e-mail adresa u ovom url-u";
$language["NOT_POSS_RESET_PID"]="Nemozete trenutno resetovati vas PID! <br />Kontaktirajte administratora...";
$language["NOW_LOGIN"]="Sada ce te se trebati ulogovati";
$language["NUMBER_SHORT"]="No";
$language["OLD_PWD"]="Stara lozinka";
$language["ONLY_REG_COMMENT"]="Samo registrovani korisnici mogu dodavati komentare!";
$language["OPT_DB_RES"]="Optimiziramo rezultat baze podataka";
$language["OPTION"]="Opcija";
$language["PASS_RESET_CONF"]="potvrda reseta lozinke";
$language["PEER_CLIENT"]="Klijent";
$language["PEER_COUNTRY"]="Zemlja";
$language["PEER_ID"]="Peer ID";
$language["PEER_LIST"]="Lista aktivnih (peers)";
$language["PEER_PORT"]="Port";
$language["PEER_PROGRESS"]="Progres";
$language["PEER_STATUS"]="Status";
$language["PEERS"]="peer(s)";
$language["PEERS_DETAILS"]="Kliknite ovde za detalje aktivnosti";
$language["PICTURE"]="Slika";
$language["PID"]="PID";
$language["PLEASE_WAIT"]="Molimo sacekajte...";
$language["PM"]="PM";
$language["POSITION"]="Posicija";
$language["POST_REPLY"]="Odgovori";
$language["POSTED_BY"]="Dodato od";
$language["POSTED_DATE"]="Dana";
$language["POSTS"]="Postova";
$language["POSTS_PER_DAY"]="%s postova po danu";
$language["POSTS_PER_PAGE"]="Postova po stranici";
$language["PREVIOUS"]="Prethodno";
$language["PRIVATE_MSG"]="Privatna poruka";
$language["PWD_CHANGED"]="Lozinka promjenjena!";
$language["QUESTION"]="Pitanje";
$language["QUICK_JUMP"]="Brza navigacija";
$language["QUOTE"]="Citat";
$language["RANK"]="Rang";
$language["RATIO"]="Ratio";
$language["REACHED_MAX_USERS"]="Dostignut je maksimalan broj korisnika";
$language["READED"]="Procitano";
$language["RECEIVER"]="Primalac";
$language["RECOVER_DESC"]="Koristite formu ispod da resetujete vasu lozinku i da dobijete detalje vaseg naloga na e-mail.<br />(Morati ce te odgovoriti na dobijeni e-mail.)";
$language["RECOVER_PWD"]="Povrati zaboravljenu lozinku";
$language["RECOVER_TITLE"]="Povrati zaboravljeno korisnicko ime ili lozinku";
$language["REDIRECT"]="ukoliko vas browser nema osposobljen javascript, kliknite";
$language["REDOWNLOAD_TORR_FROM"]="Ponovo downloadujte torrent sa";
$language["REGISTERED"]="Registrovan";
$language["REGISTERED_EMAIL"]="Registrovani e-mail";
$language["REMOVE"]="Ukloni";
$language["REPLIES"]="Odgovora";
$language["REPLY"]="Odgovor";
$language["RESULT"]="Resultat";
$language["RETRY"]="Pokusaj ponovo";
$language["RETURN_TORRENTS"]="Natrag na torrent listu";
$language["REVERIFY_CONGRATS1"]="<center><br />Cestitamo, vas e-mail je potvrdjen i uspjesno promjenjen<br /><br /><strong>Od: <font color=\"red\">";
$language["REVERIFY_CONGRATS2"]="</strong></font><br /><strong>Za: <font color=\"red\">";
$language["REVERIFY_CONGRATS3"]="</strong></font><br /><br />";
$language["REVERIFY_FAILURE"]="<center><br /><strong><font color=\"red\"><u>Oprostite ovaj url je nevazeci</u></strong></font><br /><br />Novi broj je generisan svaki put kada promjenite vas e-mail tako da<br />ako vidite ovu poruku najvjerovatnije ste pokusali promjeniti vas e-mail<br />vise nego jednom tako da koristite stari url.<br /><br /><strong>Molimo sacekajte dok niste sigurni da niste primili e-mail <br />verifikacije prije nego pokusate jos jednom izvrsiti promjenu e-maila.</strong><br /><br />";
$language["REVERIFY_MSG"]="Ako promjenite vas e-mail biti ce vam poslan verifikacijski link na novoodabranu e-mail adresu.<br /><br /><font color=\"red\"><strong>E-mail adresa vaseg naloga nece se promjeniti u novu sve dok ne potvrdite vas novi e-mail klikom na autogenerisani link koji smo vam poslali.</strong></font>";
$language["RIGHT"]="desno";
$language["SEARCH"]="Trazi";
$language["SEEDERS"]="seedera";
$language["SEEN"]="Vidjen";
$language["SELECT"]="Odaberi...";
$language["SENDER"]="Posiljalac";
$language["SENT_ERROR"]="Greska u slanju";
$language["SHORT_C"]="C"; //Shortname for Completed
$language["SHORT_L"]="L"; //Shortname for Leechers
$language["SHORT_S"]="S"; //Shortname for Seeders
$language["SHOUTBOX"]="ShoutBox";
$language["SIZE"]="Velicina";
$language["SORRY"]="Oprostite";
$language["SORTID"]="ID sortiranja";
$language["SPEED"]="Brzina";
$language["STICKY"]="Ljepljivo (sticky)";
$language["SUB_CATEGORY"]="Pod kategorija";
$language["SUBJECT"]="Subjekat";
$language["SUBJECT_MAX_CHAR"]="Subjekat je ogranicen na ";
$language["SUC_POST_SUC_EDIT"]="Post je uspjesno izmjenjen.";
$language["SUC_SEND_EMAIL"]="E-mail potvrde je poslan";
$language["SUC_SEND_EMAIL_2"]="Molimo dozvolite par minuta za primitak e-maila.";
$language["SUCCESS"]="Uspjeh";
$language["SUMADD_BUG"]="Tracker bug pozivajuci summaryAdd";
$language["TABLE_NAME"]="Naziv stola";
$language["TIMEZONE"]="Vremenska zona";
$language["TITLE"]="Naziv";
$language["TOP"]="vrh";
$language["TOP_10_ACTIVE"]="10 najaktivnijih torrenata";
$language["TOP_10_BEST_SEED"]="10 najbolje seedanih torrenata";
$language["TOP_10_BSPEED"]="10 najbrzih torrenata";
$language["TOP_10_DOWNLOAD"]="Top 10 downloadera";
$language["TOP_10_SHARE"]="Top 10 najboljih djelilaca";
$language["TOP_10_UPLOAD"]="Top 10 uploadera";
$language["TOP_10_WORST"]="Top 10 najgorih djelilaca";
$language["TOP_10_WORST_SEED"]="10 torrenata najgore seedani";
$language["TOP_10_WSPEED"]="10 najsporijih torrenata";
$language["TOP_TORRENTS"]="Najpopularniji torrenti";
$language["TOPIC"]="Tema";
$language["TOPICS"]="Teme";
$language["TOPICS_PER_PAGE"]="Tema po stranici";
$language["TORR_PEER_DETAILS"]="Torrent aktivnost (peer) detalji";
$language["TORRENT"]="Torrent";
$language["TORRENT_ANONYMOUS"]="Posalji kao anoniman";
$language["TORRENT_CHECK"]="Dozvoli trackeru da koristi torrent informacije.";
$language["TORRENT_DETAIL"]="Torrent detalji";
$language["TORRENT_FILE"]="Torrent fajl";
$language["TORRENT_SEARCH"]="Trazi torrente";
$language["TORRENT_STATUS"]="Status";
$language["TORRENT_UPDATE"]="Vrsimo update, molimo sacekajte...";
$language["TORRENTS"]="torrenata";
$language["TORRENTS_PER_PAGE"]="Torrenata po stranici";
$language["TRACK_DB_ERR"]="Tracker/SQL greska. Detalji su u error log.";
$language["TRACKER_INFO"]="$users korisnika, tracking $torrents torrenata ($seeds seedera $leechers leechera, $percent%)";
$language["TRACKER_LOAD"]="Tracker opterecenje";
$language["TRACKER_SETTINGS"]="Tracker podesavanja";
$language["TRACKER_STATS"]="Tracker statistika";
$language["TRACKING"]="trenutno";
$language["TRAFFIC"]="Saobracaj";
$language["UCP_NOTE_1"]="Ovdje mozete kontrolisati vas inbox, slati PM drugim korisnicima,";
$language["UCP_NOTE_2"]="kontrolisati i mjenjati vasa podesavanja, itd...";
$language["UNAUTH_IP"]="Ne ovlastena IP adresa.";
$language["UNKNOWN"]="nepoznato";
$language["UPDATE"]="Update";
$language["UPFAILED"]="Upload nije uspjesan";
$language["UPLOAD_IMAGE"]="Uploaduj sliku";
$language["UPLOAD_LANGUAGE_FILE"]="Upload jezicni fajl";
$language["UPLOADED"]="Uploadovano";
$language["UPLOADER"]="Uploader";
$language["UPLOADS"]="Uploada";
$language["URL"]="URL";
$language["USER_CP"]="Moj Panel";
$language["USER_CP_1"]="Korisnicki kontrol panel";
$language["USER_DETAILS"]="Korisnicki detalji";
$language["USER_EMAIL"]="Vazeci e-mail";
$language["USER_ID"]="Korisnicki ID";
$language["USER_JOINED"]="Registracija";
$language["USER_LASTACCESS"]="Zadnja posjeta";
$language["USER_LEVEL"]="Rang";
$language["USER_LOCAL_TIME"]="Korisnikovo lokalno vrijeme";
$language["USER_NAME"]="Korisnik";
$language["USER_PASS_RECOVER"]="Povrat lozinke/korisnickog imena";
$language["USER_PWD"]="Lozinka";
$language["USERS_SEARCH"]="Trazi korisnike";
$language["VIEW_DETAILS"]="Vidi detalje";
$language["VIEW_TOPIC"]="Vidi teme";
$language["VIEW_UNREAD"]="Vidi ne procitane";
$language["VIEWS"]="Pregleda";
$language["VISITOR"]="Posjetilac";
$language["VISITORS"]="Posjetilaca";
$language["WAIT_ADMIN_VALID"]="Sacekajte administratorsku potvrdu...";
$language["WARNING"]="Upozorenje!";
$language["WELCOME"]="Dobrodosli";
$language["WELCOME_ADMINCP"]="Dobrodosli u Admin Kontrol Panel";
$language["WELCOME_BACK"]="Dobrodosli natrag";
$language["WELCOME_UCP"]="Dobrodosli u vas Korisnicki Kontrol Panel";
$language["WORD_AND"]="i";
$language["WORD_NEW"]="Novo";
$language["WROTE"]="napisao";
$language["WT"]="WT";
$language["X_TIMES"]="puta";
$language["YES"]="Da";
$language["LAST_IP"]="Zadnji IP";
$language["FIRST_UNREAD"]="Idi na prvi ne procitan post";
$language["MODULE_UNACTIVE"]="Potreban modul nije aktivan!";
$language["MODULE_NOT_PRESENT"]="Potreban modul ne postoji!";
$language["MODULE_LOAD_ERROR"]="Potreban modul se cini da ima gresku!";
?>