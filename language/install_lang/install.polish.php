<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2015  Btiteam
//
//    This file is part of xbtit.
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

// english installation file //

$install_lang["charset"]                = "UTF-8";
$install_lang["lang_rtl"]               = FALSE;
$install_lang["step"]                   = "KROK:";
$install_lang["welcome_header"]         = "Witamy";
$install_lang["welcome"]                = "Witamy w instalacji nowego xbtitFM.";
$install_lang["installer_language"]     = "J??zyk:";
$install_lang["installer_language_set"] = "Prze????cz na ten j??zyk";
$install_lang["start"]                  = "Start";
$install_lang["next"]                   = "Nast??pny";
$install_lang["back"]                   = "Poprzedni";
$install_lang["requirements_check"]     = "Wymagania sprawdzone";
$install_lang["reqcheck"]               = "Wym. sprawdzone";
$install_lang["settings"]               = "Ustawienia";
$install_lang["system_req"]             = "<p>".$GLOBALS["btit-tracker"]."&nbsp;".$GLOBALS["current_btit_version"]." wymaga PHP 4.1.2 b??d?? wy??szego i serwera MYSQL .</p>";
$install_lang["list_chmod"]             = "<p>Zanim zainstalujesz skrypt, prosz?? sprawd?? czy wszystkie pliki zosta??y wys??ane na ftp i czy poni??sze pliki/katalogi maj?? ustawione prawid??owe uprawnienia pozwalaj??ce skryptowi na zapis tych plik??w/katalog??w (0777 powinien by?? odpowiedni).</p>";
$install_lang["view_log"]               = "Mo??esz przejrze?? pe??n?? list?? zmian";
$install_lang["here"]                   = "tutaj";
$install_lang["settingup"]              = "Ustaw sw??j tracker";
$install_lang["settingup_info"]         = "Ustawienia podstawowe";
$install_lang["sitename"]               = "Nazwa strony";
$install_lang["sitename_input"]         = "xbtitFM";
$install_lang["siteurl"]                = "Url strony";
$install_lang["siteurl_info"]           = "Bez ko??cowego <b>/</b>.";
$install_lang["mysql_settings"]         = "Ustawienia MySQL";
$install_lang["mysql_settings_info"]    = "Ustawienia bazy danych.";
$install_lang["mysql_settings_server"]  = "Serwer MySQL";
$install_lang["mysql_settings_username"] = "U??ytkownik bazy MySQL";
$install_lang["mysql_settings_password"] = "Has??o do bazy MySQL";
$install_lang["mysql_settings_database"] = "Baza MySQL";
$install_lang["mysql_settings_prefix"]  = "Prefix tabel MySQL";
$install_lang["cache_folder"]           = "Folder Cache";
$install_lang["torrents_folder"]        = "Folder plik??w torrent";
$install_lang["badwords_file"]          = "badwords.txt";
$install_lang["chat.php"]               = "chat.php";
$install_lang["write_succes"]           = "<span style=\"color:#00FF00; font-weight: bold;\">jest zapisywalny!</span>";
$install_lang["write_fail"]             = "<span style=\"color:#FF0000; font-weight: bold;\">NIE jest zapisywalny!</span> (0777)";
$install_lang["write_file_not_found"]   = "<span style=\"color:#FF0000; font-weight: bold;\">NIE ZNALEZIONO!</span>";
$install_lang["mysqlcheck"]             = "Sprawdzenie po????czenia z baz?? MySQL";
$install_lang["mysqlcheck_step"]        = "Sprawdzanie MySQL";
$install_lang["mysql_succes"]           = "<span style=\"color:#00FF00; font-weight: bold;\">Po????czenie do baz?? danych powiod??o si??!</span>";
$install_lang["mysql_fail"]             = "<span style=\"color:#FF0000; font-weight: bold;\">Po????czenie z baz?? danych nie powiod??o si??!</span>";
$install_lang["back_to_settings"]       = "Przejd?? do poprzedniego kroku i sprawd?? ustawienia.";
$install_lang["saved"]                  = "zapisane";
$install_lang["file_not_writeable"]     = "Plik <b>./include/settings.php</b> nie jest zapisywalny.";
$install_lang["file_not_exists"]        = "Plik <b>./include/settings.php</b> nie istnieje.";
$install_lang["not_continue_settings"]  = "Nie mo??esz kontynuowa?? instalacji dop??ki ten plik nie b??dzie zapisywalny.";
$install_lang["not_continue_settings2"] = "Nie mo??esz kontynuowa?? z tym plikiem.";
$install_lang["settings.php"]           = "./include/settings.php";
$install_lang["can_continue"]           = "Mo??esz kontynuowa?? i zmieni?? to p????niej.";
$install_lang["mysql_import"]           = "Import MySQL";
$install_lang["mysql_import_step"]      = "Imp. SQL";
$install_lang["create_owner_account"]   = "Tworzenie konta w??a??ciciela";
$install_lang["create_owner_account_step"] = "Tw??rz konto w??a??ciciela";
$install_lang["database_saved"]         = "Plik database.sql zosta?? zaimportowany do twojej bazy danych.";
$install_lang["create_owner_account_info"] = "Tutaj mo??esz stworzy?? konto w??a??ciciela.";
$install_lang["username"]               = "Nick";
$install_lang["password"]               = "Has??o";
$install_lang["password2"]              = "Powt??rz has??o";
$install_lang["email"]                  = "Email";
$install_lang["email2"]                 = "Powt??rz email";
$install_lang["is_succes"]              = "zrobione.";
$install_lang["no_leave_blank"]         = "Nie zostawiaj ??adnych pustych p??l.";
$install_lang["not_valid_email"]        = "To nie jest prawid??owy adres email.";
$install_lang["pass_not_same_username"] = "Has??o nie mo??e by?? takie samo jak twoja nazwa u??ytkownika.";
$install_lang["email_not_same"]         = "Adresy email nie pasuj??.";
$install_lang["pass_not_same"]          = "Hasla nie pasuj??.";
$install_lang["site_config"]            = "Ustawienia trackera";
$install_lang["site_config_step"]       = "Ust. trackera.";
$install_lang["default_lang"]           = "Domy??lny j??zyk";
$install_lang["default_style"]          = "Domy??lny styl";
$install_lang["torrents_dir"]           = "Folder torrent??w";
$install_lang["validation"]             = "Tryb zatwierdzania kont";
$install_lang["more_settings"]          = "*&nbsp;&nbsp;&nbsp;Wi??cej ustawie?? znajdziesz w <u>Panelu Admina</u> kiedy zako??czysz instalacj??.";
$install_lang["tracker_saved"]          = "Ustawienia zosta??y zapisane.";
$install_lang["finished"]               = "Ko??czenie instalacji";
$install_lang["finished_step"]          = "Ko??czenie";
$install_lang["succes_install1"]        = "Instalacja zako??czona!";
$install_lang["succes_install2a"]       = "<p>W??a??nie pomy??lnie zainstalowa??e?? ".$GLOBALS["btit-tracker"]." ".$GLOBALS["current_btit_version"]." jako sw??j tracker.</p><p>Instalacja zosta??a pomy??lnie zablokowana aby zapobiec u??yciu jej ponownie ale radzimy aby?? usun???? <b>install.php</b> dla dodatkowej ochrony.</p>";
$install_lang["succes_install2b"]       = "<p>W??a??nie pomy??lnie zainstalowa??e?? ".$GLOBALS["btit-tracker"]." ".$GLOBALS["current_btit_version"]." jako sw??j tracker.</p><p>Zalecamy zablokowa?? proces instalacji. Mo??esz to zrobi?? poprzez zmian?? nazwy pliku <b>install.unlock</b> na <b>install.lock</b> lub usuni??cie pliku <b>install.php</b> .</p>";
$install_lang["succes_install3"]        = "<p>My z BTITeam mamy nadziej??, ??e b??dziesz zadowolony u??ywaj??c ten skrypt i zobaczymy si?? na naszym <a href=\"http://www.xbtitfm.com/forum/index.php\" target=\"_blank\">forum</a>.</p>";
$install_lang["go_to_tracker"]          = "Przejd?? do swojego trackera";
$install_lang["forum_type"]             = "Rodzaj forum";
$install_lang["forum_internal"]         = "Wewn??trzne xbtitFM Forum";
$install_lang["forum_smf"]              = "Simple Machines Forum";
$install_lang["forum_other"]            = "Niezintegrowane zewn??trzne forum - Wpisz adres tutaj -->";
$install_lang["smf_download_a"]         = "<strong>Je??eli wybierasz Simple Machines Forum:</strong><br /><br/ >Prosz?? ??ci??gn???? najnowsz?? wersj?? Simple Machines Forum <a target='_new' href='http://www.simplemachines.org/download/'>st??d</a> i wys??a?? zawarto???? archiwum do folderu \"smf\" i <a target='_new' href='smf/install.php'>klikn???? tutaj</a> aby je zainstalowa??.*<br /><strong>(Prosz?? u??y?? tych samych danych uwierzytelniaj??cych do bazy kt??rych u??ywasz do instalacji trackera.)<br /><br /><font color='#FF0000'>Gdy zainstalujesz</font></strong> prosz?? zmieni?? CHMOD angielskiego pliku j??zykowego SMF (<strong>";
$install_lang["smf_download_b"]         = "</strong>) na 777 i kliknij <strong>Nast??pny</strong> aby kontynuowa?? instalacj?? xbtitFM.<br /><br /><strong>* Oba linki otworz?? si?? w nowych oknach/zak??adkach aby zapobiec wy????czeniu instalatora xbtitFM.</strong></p>";
$install_lang["smf_err_1"]              = "Nie mo??na znale???? Simple Machines Forum w folderze \"smf\", prosz?? zainstalowa?? forum zanim przejdziesz do nast??pnego kroku.<br /><br />Kliknij <a href=\"javascript: history.go(-1);\">tutaj</a> aby powr??ci?? do poprzedniej strony.";
$install_lang["smf_err_2"]              = "Nie mo??na znale???? Simple Machines Forum w bazie danych, prosz?? zainstalowa?? forum zanim przejdziesz do nast??pnego kroku.<br /><br />Kliknij <a href=\"javascript: history.go(-1);\">tutaj</a> aby powr??ci?? do poprzedniej strony.";
$install_lang["smf_err_3a"]             = "Nie mo??na zapisywa?? do angielskiego pliku j??zykowego SMF English (<strong>";
$install_lang["smf_err_3b"]             = "</strong>) prosz?? zmieni?? CHMOD na 777 przed kontynuacj?? instalacji.<br /><br />Kliknij <a href=\"javascript: history.go(-1);\">tutaj</a> aby wr??ci?? do poprzedniej strony.";
$install_lang["allow_url_fopen"]        = "warto???? w php.ini dla \"allow_url_fopen\" (najlepsze b??dzie ON)";
$install_lang["allow_url_fopen_ON"]        = "<span style=\"color:#00FF00; font-weight: bold;\">ON</span>";
$install_lang["allow_url_fopen_OFF"]        = "<span style=\"color:#FF0000; font-weight: bold;\">OFF</span>";
$install_lang["succes_upgrade1"]        = "Uaktualnienie zako??czone!";
$install_lang["succes_upgrade2a"]       = "<p>W??a??nie uaktualni??e?? ".$GLOBALS["btit-tracker"]." ".$GLOBALS["current_btit_version"]." na twoim trackerze.</p><p>Uaktualnienie zosta??o zablokowane aby zapobiec ponownemu jego wykonaniu ale radzimy usun???? tak??e <b>upgrade.php+install.php</b> dla dodatkowej ochrony.</p>";
$install_lang["succes_upgrade2b"]       = "<p>W??a??nie uaktualni??e?? ".$GLOBALS["btit-tracker"]." ".$GLOBALS["current_btit_version"]." na twoim trackerze.</p><p>Radzimy zablokowa?? instalacj??. Mo??esz to zrobi?? zamieniaj??c rozszerzenie <b>install.unlock</b> na <b>install.lock</b> lub usun???? te pliki <b>upgrade.php+install.php</b> .</p>";
$install_lang["succes_upgrade3"]        = "<p>My z BTITeam mamy nadzieje, ??e b??dziesz zadowolony z u??ywania tego produktu i zobaczymy si?? ponownie na naszym <a href=\"http://www.xbtitfm.com/forum/index.php\" target=\"_blank\">forum</a>.</p>";
$install_lang['error_mysql_database']   = 'Instalator nie m??g?? po????czy?? sie z baz?? danych &quot;<i>%s</i>&quot; . Na niekt??rych hostingach trzeba najpierw utworzy?? baz?? danych w panelu administracyjnym hostingu przed instalacj?? xbtitFM.';
$install_lang['error_message_click']    = 'Kliknij tutaj';
$install_lang['error_message_try_again']= 'aby spr??bowa?? ponownie';
$install_lang["torrentimg_dir"] = "Folder torrentimg";
$install_lang["torrentstats_dir"] = "Folder torrentstats";
$install_lang["subtitles_dir"] = "Folder subtitles";
$install_lang["nforep_dir"] = "Folder nfo/rep";
$install_lang["imdbcache_dir"] = "Folder imdb/cache";
$install_lang["imdbimg_dir"] = "Folder imdb/images";
$install_lang["googimg_dir"] = "Folder googly/imgs";
$install_lang["avatar_dir"] = "Folder avatar";
$install_lang["sxd_dir"] = "Folder sxd/backup";
$install_lang["thetvdb_dir"] = "Folder thetvdb";

// English definitions (Need translating)
$install_lang["forum_ipb"]              = "Invision Power Board";
$install_lang["ipb_download_a"]         = "<b>If using Invision Power Board:</b><br /><br/ >Please download the latest version of Invision Power Board from your <a target='_new' href='http://www.invisionpower.com/customer/'>Client Area</a> at Invision Power Services, extract the files somewhere on your computer and then upload the contents of the \"upload\" folder to the \"ipb\" folder.<br /><br />Once uploaded please make sure the \"cache\", \"hooks\", \"public\" and \"uploads\" folders are CHMOD'd to 777 recursively, rename \"conf_global.dist.php\" to \"conf_global.php\" and CHMOD that to 777 as well.<br /><br />Once done please <a target='_new' href='ipb/admin/install/index.php'>click here</a> to install it.*<br /><b>(Please use the same database credentials you used for this installation procedure and be sure to enter a database prefix, we suggest using <span style='color:blue;'>ipb_</span> as your prefix).<br /><br /><font color='#FF0000'>Once installed</font></b> please CHMOD the default cached English language file (<b>";
$install_lang["ipb_download_b"]         = "</b>) to 777 and click <b>Next</b> to continue with the xbtitFM installation.<br /><br /><b>* Both links will open into a new window/tab to prevent losing your place on the xbtitFM installation.</b></p>";
$install_lang["ipb_err_1"]              = "Can't find Invision Power Board in the \"ipb\" folder, please install it before proceeding.<br /><br />Click <a href=\"javascript: history.go(-1);\">here</a> to return to the previous page.";
$install_lang["ipb_err_2"]              = "Can't find Invision Power Board in the database, please install it before proceeding.<br /><br />Click <a href=\"javascript: history.go(-1);\">here</a> to return to the previous page.";
$install_lang["ipb_err_3a"]             = "Unable to write to the IPB English language file (<b>";
$install_lang["ipb_err_3b"]             = "</b>) please CHMOD to 777 before proceeding.<br /><br />Click <a href=\"javascript: history.go(-1);\">here</a> to return to the previous page.";
$install_lang["ipb_err_4a"]             = "IPB English language file (<b>";
$install_lang["ipb_err_4b"]             = "</b>) doesn't exist, cannot proceed.<br /><br />Click <a href=\"javascript: history.go(-1);\">here</a> to return to the previous page.";
$install_lang["ipb_err_5"]             = "Unable to write to the IPB Config file (<b>";
$install_lang["ipb_err_6"]             = "Unable to write to the Tracker Config file (<b>";

?>