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
$language['charset']='UTF-8'; // uncomment this line with specific language charset if different than tracker's one
$language['ACCOUNT_CONFIRM']='Confirmarea contului pentru site-ul '.$SITENAME;
$language['ACCOUNT_CONGRATULATIONS']='Felicitări, contul tau este acum valid!<br>Te poţi <a href="index.php?page=login">autentifica</a> pe tracker folosindu-ţi noul cont.';
$language['ACCOUNT_CREATE']='Crează cont';
$language['ACCOUNT_DELETE']='Şterge cont';
$language['ACCOUNT_DETAILS']='detalii cont';
$language['ACCOUNT_EDIT']='Editează cont';
$language['ACCOUNT_MGMT']='Administrare Cont';
$language['ACCOUNT_MSG']='Salut,'."\n\n".'Acest e-mail a fost expediat deoarece adresa ta de e-mail a fost folosită pentru înregistrarea unui cont pe site-ul nostru.'."\n".'Dacă nu tu ai înregistrat contul te rugăm sa ignori acest e-mail, în caz contrar te rugăm să-ţi validezi contul.'."\n\n".'Cele mai bune urări din partea Staff-ului.';
$language['ACTION']='Acţiune';
$language['ACTIVATED']='Activ';
$language['ACTIVE']='Status';
$language['ACTIVE_ONLY']='Doar active';
$language['ADD']='Adaugă';
$language['ADDED']='Adăugat';
$language['ADMIN_CPANEL']='Panoul de Administrare';
$language['ADMINCP_NOTES']='Aici poţi administra toate setările tracker-ului...';
$language['ALL']='Toate';
$language['ALL_SHOUT']='Toate Mesajele';
$language['ANNOUNCE_URL']='Tracker announce url:';
$language['ANONYMOUS']='Anonim';
$language['ANSWER']='Răspuns';
$language['AUTHOR']='Autor';
$language['AVATAR_URL']='Avatar (URL): ';
$language['AVERAGE']='Medie';
$language['BACK']='Înapoi';
$language['BAD_ID']='ID greşit!';
$language['BCK_USERCP']='Înapoi la Panoul Utilizatorului';
$language['BLOCK']='Blochează';
$language['BODY']='Conţinut';
$language['BOTTOM']='bottom';
$language['BY']='De';
$language['CANT_DELETE_ADMIN']='Nu poţi şterge contul altui Administrator!';
$language['CANT_DELETE_NEWS']='Nu ai permisiunea să ştergi Ştiri!';
$language['CANT_DELETE_TORRENT']='Nu ai permisiunea să ştergi acest torrent!...';
$language['CANT_DELETE_USER']='Nu ai permisiunea să ştergi utilizatori!';
$language['CANT_DO_QUERY']='Nu se poate executa interogarea SQL - ';
$language['CANT_EDIT_TORR']='Nu ai permisiunea să editezi acest torrent!';
$language['CANT_FIND_TORRENT']='Fişierul torrent nu a fost găsit!';
$language['CANT_READ_LANGUAGE']='Fişierul de limba nu poate fi citit!';
$language['CANT_SAVE_CONFIG']='Setările nu pot fi salvate în config.php';
$language['CANT_SAVE_LANGUAGE']='Fişierul de limba nu poate fi salvat';
$language['CANT_WRITE_CONFIG']='Atenţie: config.php nu poate fi scris!';
$language['CATCHUP']='Marchează toate ca Citit';
$language['CATEGORY']='Cat.';
$language['CATEGORY_FULL']='Categorie';
$language['CENTER']='centru';
$language['CHANGE_PID']='Schimbă PID';
$language['CHARACTERS']='Caractere';
$language['CHOOSE']='Alege';
$language['CHOOSE_ONE']='alege una';
$language['CLICK_HERE']='apasă aici';
$language['CLOSE']='închide';
$language['COMMENT']='Com.';
$language['COMMENT_1']='Comentariu';
$language['COMMENT_PREVIEW']='Previzualizarea Comentariului';
$language['COMMENTS']='Comentarii';
$language['CONFIG_SAVED']='Felicitări, noua configuraţie a fost salvată';
$language['COUNTRY']='Ţară';
$language['CURRENT_DETAILS']='Detalii curente';
$language['DATABASE_ERROR']='Eroare Bază de Date.';
$language['DATE']='Data';
$language['DB_ERROR_REQUEST']='Eroare Bază de Date. Cererea nu poate fi procesată.';
$language['DB_SETTINGS']='Setări Baza de Date';
$language['DEAD_ONLY']='Doar Moarte';
$language['DELETE']='Şterge';
$language['DELETE_ALL_READED']='Şterge tot ce e citit';
$language['DELETE_CONFIRM']='Eşti sigur că vrei să ştergi asta?';
$language['DELETE_TORRENT']='Şterge Torrent';
$language['DELFAILED']='Ştergere eşuată';
$language['DESCRIPTION']='Descriere';
$language['DONT_NEED_CHANGE']='Nu este nevoie să schimbi aceste setări!';
$language['DOWN']='Dl';
$language['DOWNLOAD']='Descarcă';
$language['DOWNLOAD_TORRENT']='Descarcă Torrent';
$language['DOWNLOADED']='Descărcat';
$language['EDIT']='Editează';
$language['EDIT_LANGUAGE']='Editează Limba';
$language['EDIT_POST']='Editează Mesajul';
$language['EDIT_TORRENT']='Editează Torrent';
$language['EMAIL']='E-mail';
$language['EMAIL_SENT']='Un e-mai a fost trimis la adresa indicată.<br>Foloseşte link-ul pentru a-ţi confirma contul.';
$language['EMAIL_VERIFY']='E-mail pentru actualizarea contului pe '.$SITENAME;
$language['EMAIL_VERIFY_BLOCK']='E-mail de verificare trimis';
$language['EMAIL_VERIFY_MSG']='Salut,'."\n\n".'Acest e-mail a fost expediat deoarece ai cerut schimbarea adresei de e-mail care figurează acum în baza noastră de date, te rugăm sa dai click pe link-ul de mai jos pentru a finaliza actualizarea.'."\n\n".'Cele mai bune urări din partea Staff-ului.';
$language['EMAIL_VERIFY_SENT1']='<br /><center>Un e-mail de verificare a fost trimis la adresa:<br /><br /><strong><font color="red">';
$language['EMAIL_VERIFY_SENT2']='</font></strong><br /><br />Va trebui să dai click pe link-ul inclus in e-mail pentru<br />a putea finaliza actualizarea adresei. Acest e-mail trebuie să sosească în următoarele 10 minute<br />(de obicei instantaneu) dar se poate ca unii operatori de servicii e-mail sa îl marcheze ca SPAM<br />. Asigură-te că verifici directorul SPAM în cazul în care nu găseşti e-mail-ul.<br /><br />';
$language['ERR_500']='HTTP/1.0 500 Acces nepermis!';
$language['ERR_AVATAR_EXT']='Nu pare rău dar formatele permise sunt gif,jpg,bmp sau png';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='ID Ştiri greşit!';
$language['ERR_BODY_EMPTY']='Conţinutul nu poate fi gol!';
$language['ERR_CANT_CONNECT']='Nu se poate realiza conexiunea cu server-ul local de MySQL';
$language['ERR_CANT_OPEN_DB']='Nu se poate accesa Baza de Date';
$language['ERR_DB_ERR']='Eroare Bază de Date. Te rugăm sa raportezi această problemă unui Administrator.';
$language['ERR_DELETE_POST']='Şterge Mesaj. Sanity check: Eşti pe cale să ştergi un Mesaj. Apasă';
$language['ERR_DELETE_TOPIC']='Şterge topic. Sanity check: Eşti pe cale să ştergi un topic. Apasă';
$language['ERR_EMAIL_ALREADY_EXISTS']='Această adresă de e-mail există deja în baza noastră de date!';
$language['ERR_EMAIL_NOT_FOUND_1']='Această adresă de e-mail';
$language['ERR_EMAIL_NOT_FOUND_2']='nu a fost găsită în baza noastră de date.';
$language['ERR_ENTER_NEW_TITLE']='Trebuie să specifici un nou Titlu!';
$language['ERR_FORUM_NOT_FOUND']='Forum negăsit';
$language['ERR_FORUM_UNKW_ACT']='Eroare Forum: Acţiune necunoscută';
$language['ERR_GUEST_EXISTS']='Utilizarea umelui "Guest" este restricţionată. Nu te poţi înregistra ca "Guest"';
$language['ERR_IMAGE_CODE']='Codul din Imagine nu se potriveşte';
$language['ERR_INS_TITLE_NEWS']='Trebuie completate atât Titlul cât şi Ştirea';
$language['ERR_INV_NUM_FIELD']='Câmp(uri) numerice invalide din partea clientului';
$language['ERR_INVALID_CLIENT_EVENT']='Eveniment invalid din partea clientului.';
$language['ERR_INVALID_INFO_BT_CLIENT']='Au fost primite informaţii invalide din partea clientului BitTorrent';
$language['ERR_INVALID_IP_NUMB']='Adresă IP invalidă. Trebuie să fie compusă din zecimale punctate standard (nu sunt permise nume de host-uri)';
$language['ERR_LEVEL']='Ne pare rău, nivelul tău ';
$language['ERR_LEVEL_CANT_POST']='Nu ai permisiunea de a scrie un Mesaj in acest Forum.';
$language['ERR_LEVEL_CANT_VIEW']='Nu ai permisiunea să vizualizezi acest Topic.';
$language['ERR_MISSING_DATA']='Lipsesc date!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='Trebuie să te autentifici pentru a scrie un Mesaj...';
$language['ERR_NO_BODY']='Nu există conţinut';
$language['ERR_NO_NEWS_ID']='ID Ştire negăsit!';
$language['ERR_NO_POST_WITH_ID']='Nici un Mesaj cu ID-ul ';
$language['ERR_NO_SPACE']='Numele tău de utilizator nu poate conţine spaţii libere, te rugăm să le înlocuieşti cu un underline. Ex:<br /><br />';
$language['ERR_NO_TOPIC_ID']='Nu a fost returnat nici un ID de Topic';
$language['ERR_NO_TOPIC_POST_ID']='Nu există nici un Topic asociat cu ID-ul Mesajului';
$language['ERR_NOT_AUTH']='Nu eşti autorizat!';
$language['ERR_NOT_FOUND']='Negăsit...';
$language['ERR_NOT_PERMITED']='Nepermis';
$language['ERR_PASS_LENGTH']='<font color="black">Parola trebuie să fie mai lungă de 4 caractere.</font>';
$language['ERR_PASSWORD_INCORRECT']='Parolă incorectă';
$language['ERR_PERM_DENIED']='Permisiune respinsă';
$language['ERR_PID_NOT_FOUND']='Te rugăm sa descarci iarăşi torrent-ul. Sistemul PID este activ şi nu a fost detectat în torrent';
$language['ERR_RETR_DATA']='Eroare obţinere date!';
$language['ERR_SEND_EMAIL']='E-mail-ul nu poate fi trimis. Te rugăm să raportezi această eroare unui Administrator.';
$language['ERR_SERVER_LOAD']='Load-ul pe server este foarte mare în acest moment. Încerc din nou, te rog aşteaptă...';
$language['ERR_SPECIAL_CHAR']='<font color="black">Numele tău de utilizator nu poate conţine caractere speciale precum:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; etc.</strong></font></font><br />';
$language['ERR_SQL_ERR']='Eroare SQL';
$language['ERR_SUBJECT']='Trebuie să introduci un Subiect.';
$language['ERR_TOPIC_ID_NA']='ID Topic N/A';
$language['ERR_TOPIC_LOCKED']='Topic-ul este Încuiat';
$language['ERR_TORRENT_IN_BROWSER']='Acest fişier este destinat clienţilor BitTorrent.';
$language['ERR_UPDATE_USER']='Datele utilizatorului nu pot fi actualizate. Te rugăm să raportezi această eroare unui Administrator.';
$language['ERR_USER_ALREADY_EXISTS']='Există deja un utilizator cu acest nume!';
$language['ERR_USER_NOT_FOUND']='Ne pare rău, Utilizatorul nu a fost găsit';
$language['ERR_USER_NOT_USER']='Nu ai permisiunea să accesezi Panoul altui utilizator!';
$language['ERR_USERNAME_INCORRECT']='Nume incorect';
$language['ERROR']='Eroare';
$language['ERROR_ID']='Eroare ID';
$language['FACOLTATIVE']='opţional';
$language['FILE']='Fişier';
$language['FILE_CONTENTS']='Conţinut fişier';
$language['FILE_NAME']='Nume fişier';
$language['FIND_USER']='Caută utilizator';
$language['FINISHED']='Finalizat';
$language['FORUM']='Forum';
$language['FORUM_ERROR']='Eroare Forum';
$language['FORUM_INFO']='Info Forum';
$language['FORUM_MIN_CREATE']='Min Class Create';
$language['FORUM_MIN_READ']='Min Class Read';
$language['FORUM_SEARCH']='Căutare Forum';
$language['FORUM_N_TOPICS']='Nr. Topic-uri';
$language['FORUM_N_POSTS']='Nr. Mesaje';
$language['FRM_DELETE']='Şterge';
$language['FRM_LOGIN']='Autentificare';
$language['FRM_PREVIEW']='Previzualizare';
$language['FRM_REFRESH']='Reîmprospătează';
$language['FRM_RESET']='Resetează';
$language['FRM_SEND']='Trimite';
$language['FRM_CONFIRM']='Confirmă';
$language['FRM_CANCEL']='Anulează';
$language['FRM_CLEAN']='Curăţă';
$language['GLOBAL_SERVER_LOAD']='Load Global (Toate website-urile aflate pe acest server)';
$language['GO']='Go';
$language['GROUP']='Grup';
$language['GUEST']='Guest';
$language['GUESTS']='Guests';
$language['HERE']='aici';
$language['HISTORY']='Istorie';
$language['HOME']='Acasă';
$language['IF_YOU_ARE_SURE']='dacă eşti sigur.';
$language['IM_SURE']='Sunt Sigur';
$language['IN']='în';
$language['INF_CHANGED']='Informaţii schimbate!';
$language['INFINITE']='Inf.';
$language['INFO_HASH']='Info Hash';
$language['INS_NEW_PWD']='Inserează NOUA parolă!';
$language['INS_OLD_PWD']='Inserează VECHEA parolă!';
$language['INSERT_DATA']='Inserează toate datele necesare pentru upload.';
$language['INSERT_NEW_FORUM']='Inserează un nou forum';
$language['INVALID_ID']='Nu este un ID valid. Ne pare rău!';
$language['INVALID_INFO_HASH']='Valoare hash invalidă.';
$language['INVALID_PID']='PID invalid';
$language['INVALID_TORRENT']='Eroare tracker: torrent invalid';
$language['KEYWORDS']='Cuvinte cheie';
$language['LAST_EXTERNAL']='Ultimul Update Extern a fost realizat la ';
$language['LAST_NEWS']='Ştiri Recente';
$language['LAST_POST_BY']='Ultimul Mesaj de';
$language['LAST_SANITY']='Ultimul Sanity Check a fost realizat la ';
$language['LAST_TORRENTS']='Ultimele Torrente';
$language['LAST_UPDATE']='Ultimul Update';
$language['LASTPOST']='Ultimul Mesaj';
$language['LEECHERS']='leecher(i)';
$language['LEFT']='stănga';
$language['LOGIN']='Autentificare';
$language['LOGOUT']='Deconectare';
$language['MAILBOX']='Mailbox';
$language['MANAGE_NEWS']='Administrează Ştiri';
$language['MEMBER']='Utilizator';
$language['MEMBERS']='Utilizatori';
$language['MEMBERS_LIST']='Listă Membrii';
$language['MINIMUM_100_DOWN']='(cu mimin 100mb download)';
$language['MINIMUM_5_LEECH']='cu minim 5 leecher-i, fără torrent-ele moarte';
$language['MINIMUM_5_SEED']='cu minim 5 seeder-i';
$language['MKTOR_INVALID_HASH']='makeTorrent: Hash invalid primit';
$language['MNU_ADMINCP']='Panou de Administrare';
$language['MNU_FORUM']='Forum';
$language['MNU_INDEX']='Index';
$language['MNU_MEMBERS']='Membrii';
$language['MNU_NEWS']='Ştiri';
$language['MNU_STATS']='Statistici';
$language['MNU_TORRENT']='Torrente';
$language['MNU_UCP_CHANGEPWD']='Schimbă Parola';
$language['MNU_UCP_HOME']='Pagină principală Panou Utilizator';
$language['MNU_UCP_IN']='Căsuţa de mesaje primite';
$language['MNU_UCP_INFO']='Schimbă Profilul';
$language['MNU_UCP_NEWPM']='Mesaj Nou';
$language['MNU_UCP_OUT']='Căsuţa de mesaje trimise';
$language['MNU_UCP_PM']='Căsuţa de mesaje';
$language['MNU_UPLOAD']='Upload';
$language['MORE_SMILES']='Mai multe Iconiţe Emotive';
$language['MORE_THAN']='Mai mult de ';
$language['MORE_THAN_2']='obiecte găsite, afişez primele';
$language['NA']='N/A';
$language['NAME']='Nume';
$language['NEED_COOKIES']='Notă: Cookie-urile trebuie să fie activate pentru autentificare.';
$language['NEW_COMMENT']='Inserează comentariul tău...';
$language['NEW_COMMENT_T']='Adaugă un nou Comentariu';
$language['NEWS']='ştirile';
$language['NEWS_DESCRIPTION']='Ştire:';
$language['NEWS_INSERT']='Adaugă Ştirea ta';
$language['NEWS_PANEL']='Panou Administrare Ştiri';
$language['NEWS_TITLE']='Titlu:';
$language['NEXT']='Înainte';
$language['NO']='Nu';
$language['NO_BANNED_IPS']='Nu există niciun IP restricţionat';
$language['NO_COMMENTS']='Niciun comentariu...';
$language['NO_FORUMS']='Niciun Forum găsit!';
$language['NO_MAIL']='Nu ai niciun mesaj nou.';
$language['NO_MESSAGES']='Niciun mesaj găsit...';
$language['NO_NEWS']='Nicio Ştire';
$language['NO_PEERS']='Niciun peer';
$language['NO_RECORDS']='Ne pare rău, lista este goală...';
$language['NO_TOPIC']='Niciun Topic găsit';
$language['NO_TORR_UP_USER']='Acest utilizator nu a urcat niciun torrent';
$language['NO_TORRENTS']='Niciun torrent aici...';
$language['NO_USERS_FOUND']='Niciun utilizator găsit!';
$language['NOBODY_ONLINE']='Nimeni online';
$language['NONE']='None';
$language['NOT_ADMIN_CP_ACCESS']='Nu ai permisiunea să accesezi Panoul de Administrare!';
$language['NOT_ALLOW_DOWN']='nu are permisiunea să descarce de la';
$language['NOT_AUTH_DOWNLOAD']='Nu ai permisiunea să faci download. Ne pare rău...';
$language['NOT_AUTH_VIEW_NEWS']='Nu ai permisiunea să vizualizezi Ştirile!';
$language['NOT_AUTHORIZED']='Nu ai permisiunea să vizualizezi';
$language['NOT_AUTHORIZED_UPLOAD']='Nu ai permisiunea să faci upload!';
$language['NOT_AVAILABLE']='N/A';
$language['NOT_MAIL_IN_URL']='În URL nu este specificată această adresă de e-mail';
$language['NOT_POSS_RESET_PID']='Nu ţi se poate reseta PID-ul! <br />Contactează un Administrator...';
$language['NOW_LOGIN']='Acum ţi se va cere să te autentifici';
$language['NUMBER_SHORT']='Nr.';
$language['OLD_PWD']='Parola veche';
$language['ONLY_REG_COMMENT']='Doar utilizatorii înregistraţi pot adauga comentarii!';
$language['OPT_DB_RES']='Rezultatul Optimizării Bazei de Date';
$language['OPTION']='Opţiune';
$language['PASS_RESET_CONF']='confirmă resetarea parolei';
$language['PEER_CLIENT']='Client';
$language['PEER_COUNTRY']='Ţară';
$language['PEER_ID']='ID peer';
$language['PEER_LIST']='Listă Peer(i)';
$language['PEER_PORT']='Port';
$language['PEER_PROGRESS']='Progres';
$language['PEER_STATUS']='Status';
$language['PEERS']='peer(i)';
$language['PEERS_DETAILS']='Apasă aici pentru a vedea peer(ii)';
$language['PICTURE']='Poză';
$language['PID']='PID';
$language['PLEASE_WAIT']='Te rugăm să aştepţi...';
$language['PM']='PM';
$language['POSITION']='Pozitie';
$language['POST_REPLY']='Adaugă Răspuns';
$language['POSTED_BY']='Adăugat de';
$language['POSTED_DATE']='Adăugat la';
$language['POSTS']='Mesaje';
$language['POSTS_PER_DAY']='%s mesaje per zi';
$language['POSTS_PER_PAGE']='Mesaje per pagină';
$language['PREVIOUS']='Înapoi';
$language['PRIVATE_MSG']='Mesaj Privat';
$language['PWD_CHANGED']='Parola a fost schimbată!';
$language['QUESTION']='Întrebare';
$language['QUICK_JUMP']='Salt rapid';
$language['QUOTE']='Citat';
$language['RANK']='Rang';
$language['RATIO']='Raţie';
$language['REACHED_MAX_USERS']='Numărul maxim de utilizatori a fost atins';
$language['READED']='Citeşte';
$language['RECEIVER']='Destinatar';
$language['RECOVER_DESC']='Foloseşte formularul de mai jos pentru resetarea parolei iar detaliile contului tău îţi vor fi trimise prin e-mail.<br />(Va trebui să răspunzi unui e-mail de confirmare.)';
$language['RECOVER_PWD']='Recuperează parola';
$language['RECOVER_TITLE']='Recuperează nume sau parola uitate';
$language['REDIRECT']='Daca browser-ul tau nu are activat JavaScript, apasă';
$language['REDOWNLOAD_TORR_FROM']='Descarcă iarăşi torrent-ul de la';
$language['REGISTERED']='Înregistrat';
$language['REGISTERED_EMAIL']='E-mail înregistrat';
$language['REMOVE']='Înlătură';
$language['REPLIES']='Răspunsuri';
$language['REPLY']='Răspuns';
$language['RESULT']='Rezultat';
$language['RETRY']='Încearcă iar';
$language['RETURN_TORRENTS']='Înapoi la lista de torrente';
$language['REVERIFY_CONGRATS1']='<center><br />Felicitări, e-mail-ul tău a fost verificat şi actualizat cu succes<br /><br /><strong>Din: <font color="red">';
$language['REVERIFY_CONGRATS2']='</strong></font><br /><strong>În: <font color="red">';
$language['REVERIFY_CONGRATS3']='</strong></font><br /><br />';
$language['REVERIFY_FAILURE']='<center><br /><strong><font color="red"><u>Ne pare rău dar acest URL nu este valid</u></strong></font><br /><br />Un nou număr aleatoriu este generat la fiecare încercare de a-ţi schimba adresa de e-mail<br />aşa că daca citeşti acest mesaj înseamnă că ai încercat de mai multe ori<br />să-ţi schimbi e-mail-ul şi foloseşti un URL vechi.<br /><br /><strong>Te rugăm să aştepţi până eşti absolut sigur că nu ai primit noul<br />e-mail de verificare înainte de-a încerca să-ţi mai schimbi adresa de e-mail.</strong><br /><br />';
$language['REVERIFY_MSG']='În cazul în care vei dori schimbarea adresei de e-mail vei primi un link de verificare pe noua adresă.<br /><br /><font color="red"><strong>Adresa de e-mail din baza noastră de date nu va fi actualizată până nu-ţi vei confirma adresa cu ajutorul link-ului.</strong></font>';
$language['RIGHT']='dreapta';
$language['SEARCH']='Caută';
$language['SEEDERS']='seeder(i)';
$language['SEEN']='Văzut';
$language['SELECT']='Selectează...';
$language['SENDER']='Expeditor';
$language['SENT_ERROR']='Sent Error';
$language['SHORT_C']='C'; //Shortname for Completed
$language['SHORT_L']='L'; //Shortname for Leechers
$language['SHORT_S']='S'; //Shortname for Seeders
$language['SHOUTBOX']='ShoutBox';
$language['SIZE']='Dimensiuni';
$language['SORRY']='Ne pare rău';
$language['SORTID']='ID sortare';
$language['SPEED']='Viteză';
$language['STICKY']='Lipicios';
$language['SUB_CATEGORY']='Sub-Categorie';
$language['SUBJECT']='Subiect';
$language['SUBJECT_MAX_CHAR']='Subiectul este limitat la ';
$language['SUC_POST_SUC_EDIT']='Mesajul a fost editat cu succes.';
$language['SUC_SEND_EMAIL']='Un e-mail de confirmare a fost expediat pe adresa';
$language['SUC_SEND_EMAIL_2']='Te rugăm să aştepţi acest e-mail timp de câteva minute.';
$language['SUCCESS']='Succes';
$language['SUMADD_BUG']='Tracker bug calling summaryAdd';
$language['TABLE_NAME']='Nume tabelă';
$language['TIMEZONE']='Fus orar';
$language['TITLE']='Titlu';
$language['TOP']='top';
$language['TOP_10_ACTIVE']='10 Torrents Most active';
$language['TOP_10_BEST_SEED']='10 Torrents Best Seeders';
$language['TOP_10_BSPEED']='10 Torrents Best Speed';
$language['TOP_10_DOWNLOAD']='Top 10 Downloaders';
$language['TOP_10_SHARE']='Top 10 Best Sharers';
$language['TOP_10_UPLOAD']='Top 10 Uploaders';
$language['TOP_10_WORST']='Top 10 Worst Sharers';
$language['TOP_10_WORST_SEED']='10 Torrents Worst Seeders';
$language['TOP_10_WSPEED']='10 Torrents Worst Speed';
$language['TOP_TORRENTS']='Cele mai populare torrente';
$language['TOPIC']='Topic';
$language['TOPICS']='Topic-uri';
$language['TOPICS_PER_PAGE']='Topic-uri per pagină';
$language['TORR_PEER_DETAILS']='Detalii peer-i';
$language['TORRENT']='Torrent';
$language['TORRENT_ANONYMOUS']='Trimite ca Anonim';
$language['TORRENT_CHECK']='Permite tracker-ului să obţină şi să folosească informaţiile din acest torrent.';
$language['TORRENT_DETAIL']='Detalii torrent';
$language['TORRENT_FILE']='Fişier torrent';
$language['TORRENT_SEARCH']='Caută Torrent';
$language['TORRENT_STATUS']='Status';
$language['TORRENT_UPDATE']='Actualizare, te rugăm sa aştepţi...';
$language['TORRENTS']='torrent(e)';
$language['TORRENTS_PER_PAGE']='Torrente per pagină';
$language['TRACK_DB_ERR']='Eroare Tracker/Baza de Date. Mai multe detalii în log-ul cu erori.';
$language['TRACKER_INFO']=$users.' utilizatori, urmăresc '.$torrents.' torrente ('.$seeds.' seed-eri, '.$leechers.' leech-eri, '.$percent.'%)';
$language['TRACKER_LOAD']='Load Tracker';
$language['TRACKER_SETTINGS']='Setări Tracker';
$language['TRACKER_STATS']='Statistici Tracker';
$language['TRACKING']='tracking';
$language['TRAFFIC']='Trafic';
$language['UCP_NOTE_1']='Aici poţi controla Casuţa de Mesaje, scrie Mesaje Priavate către alţi utilizatori,';
$language['UCP_NOTE_2']='Controla şi modifica setările tale, etc...';
$language['UNAUTH_IP']='Adresă IP neautorizată.';
$language['UNKNOWN']='necunoscut';
$language['UPDATE']='Actualizare';
$language['UPFAILED']='Actualizare eşuată';
$language['UPLOAD_IMAGE']='Upload Imagine';
$language['UPLOAD_LANGUAGE_FILE']='Upload Fişier Limbă';
$language['UPLOADED']='Uploaded';
$language['UPLOADER']='Uploader';
$language['UPLOADS']='Upload-uri';
$language['URL']='URL';
$language['USER_CP']='Panoul Meu';
$language['USER_CP_1']='Panou Control Utilizator';
$language['USER_DETAILS']='Detalii Utilizator';
$language['USER_EMAIL']='E-mail valid';
$language['USER_ID']='ID Utilizator';
$language['USER_JOINED']='Înscris la';
$language['USER_LASTACCESS']='Ultima accesare';
$language['USER_LEVEL']='Rang';
$language['USER_LOCAL_TIME']='Ora locală';
$language['USER_NAME']='Utilizator';
$language['USER_PASS_RECOVER']='Recuperare Parolă/Nume';
$language['USER_PWD']='Parolă';
$language['USERS_SEARCH']='Cautare Utilizatori';
$language['VIEW_DETAILS']='Vizualizează detalii';
$language['VIEW_TOPIC']='Vezi Topic';
$language['VIEW_UNREAD']='Vezi Necitite';
$language['VIEWS']='Vizualizări';
$language['VISITOR']='Vizitator';
$language['VISITORS']='Vizitatori';
$language['WAIT_ADMIN_VALID']='Trebuie să aştepţi validarea contului de către un Administrator...';
$language['WARNING']='Avertizare!';
$language['WELCOME']='Bun-venit';
$language['WELCOME_ADMINCP']='Bun-venit la Panoul de Administrare';
$language['WELCOME_BACK']='Bun-venit înapoi';
$language['WELCOME_UCP']='Bun-venit la Panoul Utilizatorului';
$language['WORD_AND']='şi';
$language['WORD_NEW']='Nou';
$language['WROTE']='a scris';
$language['WT']='WT';
$language['X_TIMES']='time(s)';
$language['YES']='Da';
$language['LAST_IP']='Ultimul IP';
?>