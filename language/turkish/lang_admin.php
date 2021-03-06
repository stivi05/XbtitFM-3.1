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
$language['ACP_BAN_IP']='IP Yasaklama';
$language['ACP_FORUM']='Forum Ayarları';
$language['ACP_USER_GROUP']='Kullanıcı Grubu Ayarları';
$language['ACP_STYLES']='Tema Ayarları';
$language['ACP_LANGUAGES']='Dil Ayarları';
$language['ACP_CATEGORIES']='Kategori Ayarları';
$language['ACP_TRACKER_SETTINGS']='İzleyici Ayarları';
$language['ACP_OPTIMIZE_DB']='Veritabanınızı Optimize Edin';
$language['ACP_CENSORED']='Sansür Ayarları';
$language['ACP_DBUTILS']='Veritabanı Araçları';
$language['ACP_HACKS']='Hack';
$language['ACP_HACKS_CONFIG']='Hack Ayarları';
$language['ACP_MODULES']='Modüller';
$language['ACP_MODULES_CONFIG']='Modül ayarları';
$language['ACP_MASSPM']='Toplu Özel Mesaj';
$language['ACP_PRUNE_TORRENTS']='Ölü Torrentler';
$language['ACP_PRUNE_USERS']='Kullanıcı Ele';
$language['ACP_SITE_LOG']='Site Günlük Kayıtları';
$language['ACP_SEARCH_DIFF']='Farklılığı Ara';
$language['ACP_BLOCKS']='Blok Ayarları';
$language['ACP_POLLS']='Anket Ayarları';
$language['ACP_MENU']='Yönetici Ayarları';
$language['ACP_FRONTEND']='İçerik Ayarları';
$language['ACP_USERS_TOOLS']='Kullanıcı  Araçları';
$language['ACP_TORRENTS_TOOLS']='Torrent Araçları';
$language['ACP_OTHER_TOOLS']='Diğer Araçlar';
$language['ACP_MYSQL_STATS']='MySql İstatistikleri';
$language['XBTT_BACKEND']='XBTT Seçeneği';
$language['XBTT_USE']='Arkaplanda <a href="http://xbtt.sourceforge.net/tracker/" target="_blank">XBTT</a> kullanılsın mı?';
$language['XBTT_URL']='XBTT temel URL<br />(http://localhost:2710 gibi)';
$language['GENERAL_SETTINGS']='Genel Ayarlar';
$language['TRACKER_NAME']='Site Adı';
$language['TRACKER_BASEURL']='İzleyici URL (sonunda / olmadan)';
$language['TRACKER_ANNOUNCE']='İzleyici Anons URL&#39;leri<br />(her satır başına 1&#39;er tane)'.($XBTT_USE?'<br />'."\n".'<span style="color:#FF0000; font-weight: bold;">Anons URL&#39;lerini tekrar kontrol edin, gerekli XBTT arka ucuna sahipsiniz...</span>':'');
$language['TRACKER_EMAIL']='İzleyici/Kurucu e-Posta Adresi';
$language['TORRENT_FOLDER']='Torrent Klasörü';
$language['ALLOW_EXTERNAL']='Dış Torrentlere İzin Ver';
$language['ALLOW_GZIP']='GZIP&#39;i Etkinleştir';
$language['ALLOW_DEBUG']='Sayfanın altında hata-ayıklama bilgisi göster';
$language['ALLOW_DHT']='DHT&#39;yi pasifleştir<br />(torrentte private bayrağı varsa)<br />'."\n".'Yalnızca yeni yüklenen torrentlere uygulanır';
$language['ALLOW_LIVESTATS']='Canlı İstatistikleri Etkinleştir<br />(UYARI! Sunucuya aşırı yüklenebilir)';
$language['ALLOW_SITELOG']='Basit Site Günlük-Kaydını Etkinleştir (kayıt torrent/kullanıcıda değişir)';
$language['ALLOW_HISTORY']='Basit Site Geçmişini Etkinleştir (torrent/kullanıcı)';
$language['ALLOW_PRIVATE_ANNOUNCE']='Özel Anons';
$language['ALLOW_PRIVATE_SCRAPE']='Özel Scrape';
$language['SHOW_UPLOADER']='Yükleyici Rumuzunu Göster';
$language['USE_POPUP']='Torrent detay/eşleri için Pop-Up Kullanın';
$language['DEFAULT_LANGUAGE']='Varsayılan Dil';
$language['DEFAULT_CHARSET']='Varsayılan Karakter Kodlama<br />'."\n".'(Diliniz düzgün görüntülenmiyorsa, UTF-8&#39;i kullanın)';
$language['DEFAULT_STYLE']='Varsayılan Tema';
$language['MAX_USERS']='Maks. Kullanıcı<br />(sayısal, 0 = limit yok)';
$language['MAX_TORRENTS_PER_PAGE']='Sayfa Başına Torrent';
$language['PHP_ERROR']='PHP hatalarını bastır';
$language['SPECIFIC_SETTINGS']='İzleyici Özel Ayarları';
$language['SETTING_INTERVAL_SANITY']='Sağlıklı Güncelleme Aralığı (sayısal saniye, 0 = devredışı)<br />Eğer etkinse ideal değer 1800&#39;dür (30 dakika)';
$language['SETTING_INTERVAL_EXTERNAL']='Dış Güncelleme Aralığı (sayısal saniye, 0 = devredışı)<br />Dış torrent sayısına bağlı';
$language['SETTING_INTERVAL_MAX_REANNOUNCE']='Maksimum tekrar anons aralığı (sayısal saniye)';
$language['SETTING_INTERVAL_MIN_REANNOUNCE']='Minimum tekrar anons aralığı (sayısal saniye)';
$language['SETTING_MAX_PEERS']='İstek yapılacak maks. eş sayısı (sayısal)';
$language['SETTING_DYNAMIC']='Dinamik Torrentler İzin Ver (<font color="#FF0000">önerilmez</font>)';
$language['SETTING_NAT_CHECK']='NAT Kontrolü';
$language['SETTING_PERSISTENT_DB']='Kalıcı bağlantılar (Veritabanı, <font color="#FF0000">önerilmez</font>)';
$language['SETTING_OVERRIDE_IP']='Kullanıcıların IP tespitini geçersiz kılmalarına izin ver';
$language['SETTING_CALCULATE_SPEED']='Hız ve İndirilme baytlarını hesapla';
$language['SETTING_PEER_CACHING']='Table caches (should decrease a little load)';
$language['SETTING_SEEDS_PID']='Aynı PID&#39;li maks. seed sayısı';
$language['SETTING_LEECHERS_PID']='Aynı PID&#39;li maks. leecher sayısı';
$language['SETTING_VALIDATION']='Doğrulama Modu';
$language['SETTING_SHOW_COMMENTS']='Yorumları Göster';
$language['SETTING_SHOW_RATING']='Sıralamayı Göster';
$language['TORRENT_LIST']='Torrent listesi ayarları';
$language['SETTING_CAPTCHA']='Güvenli Kayıt (ImageCode kullanımı, GD+Freetype kütüphaneleri gerekli)';
$language['SETTING_FORUM']='Forum linki, şöyle olmalıdır:<br /><li><font color="#FF0000">internal</font> yada boş (değer yok): dahili forum için</li><li><font color="#FF0000">smf</font>: entegre <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a> (1.x.x) için</li><li><font color="#FF0000">smf2</font>: entegre <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a> (2.x) için</li><li><font color="#FF0000">ipb</font>: entegre <a target="_new" href="http://www.invisionpower.com">Invision Power Board</a> (3.x.x) için</li><li><font color="#FF0000">(Kutucukta URL belirtin)</font>: Kendi forum seçiminiz</li>';
$language['BLOCKS_SETTING']='Ana Sayfa/Blok Sayfa Ayarları';
$language['SETTING_CLOCK']='Saat Tipi';
$language['SETTING_FORUMBLOCK']='Forum Blok Tipi';
$language['SETTING_NUM_NEWS']='Son Haberler Bloğu için Limit (sayısal)';
$language['SETTING_NUM_POSTS']='Forum Bloğu için Limit (sayısal)';
$language['SETTING_NUM_LASTTORRENTS']='Son Torrentler Bloğu için Limit (sayısal)';
$language['SETTING_NUM_TOPTORRENTS']='Son Popüler Torrentler Bloğu için Limit (sayısal)';
$language['CLOCK_ANALOG']='Analog';
$language['CLOCK_DIGITAL']='Dijital';
$language['FORUMBLOCK_POSTS']='Son Mesajlar';
$language['FORUMBLOCK_TOPICS']='Son Aktif Başlıklar';
$language['CONFIG_SAVED']='Yapılandırma doğru bir şekilde kaydedildi!';
$language['CACHE_SITE']='Geçici Güncelleme Aralığı (sayısal saniye, 0 = devredışı)';
$language['ALL_FIELDS_REQUIRED']='Bütün alanların doldurulması gerekli!';
$language['SETTING_CUT_LONG_NAME']='Uzun torrentlerin adını x karakterden sonra kes (0 = kesme devredışı)';
$language['MAILER_SETTINGS']='e-Posta Gönderici';
$language['SETTING_MAIL_TYPE']='Gönderim Tipi';
$language['SETTING_SMTP_SERVER']='SMTP Sunucu';
$language['SETTING_SMTP_PORT']='SMTP Portu';
$language['SETTING_SMTP_USERNAME']='SMTP Kullanıcı Adı';
$language['SETTING_SMTP_PASSWORD']='SMTP Şifresi';
$language['SETTING_SMTP_PASSWORD_REPEAT']='SMTP Şifresi (Tekrar)';
$language['XBTT_TABLES_ERROR']='XBTT arka ucunu etkinleştirmeden önce XBTT tablolarını veritabanınıza aktarmalısınız (kurulum talimatlarına bakın)!';
$language['XBTT_URL_ERROR']='XBTT temel URL zorunludur!';
// BAN FORM
$language['BAN_NOTE']='Yönetici Panelinin bu bölümünde, izleyici erişimine yasaklanmış IP adreslerini görebilir ve bu erişim için yeni IP adresleri yasaklayabilirsiniz.<br />'."\n".'(İlk IP&#39;den) (Son IP&#39;ye) bir aralık girmelisiniz.';
$language['BAN_NOIP']='Yasaklanmış IP yok';
$language['BAN_FIRSTIP']='İlk IP';
$language['BAN_LASTIP']='Son IP';
$language['BAN_COMMENTS']='Yorumlar';
$language['BAN_REMOVE']='Kaldır';
$language['BAN_BY']='Oluşturan';
$language['BAN_ADDED']='Tarih';
$language['BAN_INSERT']='Yeni yasaklanmış IP aralığı ekle';
$language['BAN_IP_ERROR']='Geçersiz IP adresi.';
$language['BAN_NO_IP_WRITE']='Bir IP adresi yazmamışsınız. Üzgünüz!';
$language['BAN_DELETED']='IP aralığı veritabanından silindi.<br />'."\n".'<br />'."\n".'<a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=banip&amp;action=read">IP Yasaklamaya Geri Dön</a>';
// LANGUAGES
$language['LANGUAGE_SETTINGS']='Dil Ayarları';
$language['LANGUAGE']='Dil';
$language['LANGUAGE_ADD']='Yeni Dil Ekleyin';
$language['LANGUAGE_SAVED']='Tebrikler, dil düzenlendi';
// STYLES
$language['STYLE_SETTINGS']='Tema Ayarları';
$language['STYLE_EDIT']='Tema düzenle';
$language['STYLE_ADD']='Yeni Tema Ekle';
$language['STYLE_NAME']='Tema Adı';
$language['STYLE_URL']='Tema URL&#39;si';
$language['STYLE_FOLDER']='Tema Dizini ';
$language['STYLE_NOTE']='Bu kısımda tema ayarlarınızı yönetebilirsiniz, ancak dosyaları FTP veya sFTP ile upload etmelisiniz.';
// CATEGORIES
$language['CATEGORY_SETTINGS']='Kategori Ayarları';
$language['CATEGORY_IMAGE']='Kategori Resmi';
$language['CATEGORY_ADD']='Yeni Kategori Ekle';
$language['CATEGORY_SORT_INDEX']='Sıralama Endeksi';
$language['CATEGORY_FULL']='Kategori';
$language['CATEGORY_EDIT']='Kategori Düzenle';
$language['CATEGORY_SUB']='Alt-Kategori';
$language['CATEGORY_NAME']='Kategori';
// CENSORED
$language['CENSORED_NOTE']='Yasaklamak için <b>her satıra bir kelime</b> yazın (*censored* ile değiştirilecek)';
$language['CENSORED_EDIT']='Sansürlü Kelimeleri Düzenle';
// BLOCKS
$language['BLOCKS_SETTINGS']='Blok Yapılandırması';
$language['ENABLED']='Etkinleştirildi';
$language['ORDER']='Sıralama';
$language['BLOCK_NAME']='Blok Adı';
$language['BLOCK_POSITION']='Pozisyon';
$language['BLOCK_TITLE']='Dil Başlığı (çevrilmiş başlığı görüntülemek için kullanılacak)';
$language['BLOCK_USE_CACHE']='Bu blok önbelleklensin mi?';
$language['ERR_BLOCK_NAME']='Blok adının açılır menüsündeki etkin olan dosyalardan birini seçmek zorundasınız!';
$language['BLOCK_ADD_NEW']='Yeni Bir Blok Ekle';
// POLLS (more in lang_polls.php)
$language['POLLS_SETTINGS']='Anket Yapılandırması';
$language['POLLID']='AnketID';
$language['INSERT_NEW_POLL']='Yeni Bir Anket Ekle';
$language['CANT_FIND_POLL']='Anket bulunamıyor';
$language['ADD_NEW_POLL']='Enket Ekle';
// GROUPS
$language['USER_GROUPS']='Kullanıcı Grubu Ayarları (düzenlemek için grup adına tıklayın)';
$language['VIEW_EDIT_DEL']='Gör/Düzenle/Sil';
$language['CANT_DELETE_GROUP']='Bu Seviye/Grup iptal edilemez!';
$language['GROUP_NAME']='Grup Adı';
$language['GROUP_VIEW_NEWS']='Haberi Görüntüle';
$language['GROUP_VIEW_FORUM']='Forumu Görüntüle';
$language['GROUP_EDIT_FORUM']='Forumu Düzenle';
$language['GROUP_BASE_LEVEL']='Temel seviyeyi seçin';
$language['GROUP_ERR_BASE_SEL']='Temel seviye seçiminde hata!';
$language['GROUP_DELETE_NEWS']='Haberi Sil';
$language['GROUP_PCOLOR']='Önek Rengi (mesela: ';
$language['GROUP_SCOLOR']='Sonek Rengi (mesela: ';
$language['GROUP_VIEW_TORR']='Torrentleri Görüntüle';
$language['GROUP_EDIT_TORR']='Torrentleri Düzenle';
$language['GROUP_VIEW_USERS']='Kullanıcıları Görüntüle';
$language['GROUP_DELETE_TORR']='Torrentleri Sil';
$language['GROUP_EDIT_USERS']='Kullanıcıları Düzenle';
$language['GROUP_DOWNLOAD']='İndirebilme';
$language['GROUP_DELETE_USERS']='Kullanıcı Sil';
$language['GROUP_DELETE_FORUM']='Forum Sil';
$language['GROUP_GO_CP']='Admin KP Erişebilme';
$language['GROUP_EDIT_NEWS']='Haber Düzenle';
$language['GROUP_ADD_NEW']='Yeni Grup Ekle';
$language['GROUP_UPLOAD']='Yükleyebilme';
$language['GROUP_WT']='Bekleme süresi oran 1&#39;den büyükse ';
$language['GROUP_EDIT_GROUP']='Grubu Düzenle';
$language['GROUP_VIEW']='Görüntüle';
$language['GROUP_EDIT']='Düzenle';
$language['GROUP_DELETE']='Sil';
$language['INSERT_USER_GROUP']='Yeni Bir Kullanıcı Grubu Ekle';
$language['ERR_CANT_FIND_GROUP']='Bu grup bulunamıyor!';
$language['GROUP_DELETED']='Bu grup silinmiş!';
// MASS PM
$language['USERS_FOUND']='kullanıcı bulundu';
$language['USERS_PMED']='ÖM gönderildi';
$language['WHO_PM']='Kime PM gönderilecek?';
$language['MASS_SENT']='Çoklu ÖM gönderildi!!!';
$language['MASS_PM']='Çoklu ÖM';
$language['MASS_PM_ERROR']='Göndermeden önce birşeyler yazmak iyi bir fikir olabilir!!!!';
$language['RATIO_ONLY']='Yalnızca bu oran';
$language['RATIO_GREAT']='Bu orandan yüksek';
$language['RATIO_LOW']='Bu orandan az';
$language['RATIO_FROM']='Kimden';
$language['RATIO_TO']='Kime';
$language['MASSPM_INFO']='Bilgi';
// PRUNE USERS
$language['PRUNE_USERS_PRUNED']='Pasif Kullanıcılar';
$language['PRUNE_USERS']='Pasif Kullanıcılar';
$language['PRUNE_USERS_INFO']='"Pasif" kabul edilecek kullanıcılar için gün sayısı girin (Bu sayı, o kadar zamandır bağlanmamış veya giriş yapmamış veyahut da hesabını onaylamamış kullanıcıları listeleyecek)';
// SEARCH DIFF
$language['SEARCH_DIFF']='Farklılığı Ara.';
$language['SEARCH_DIFF_MESSAGE']='Mesaj';
$language['DIFFERENCE']='Farklılık';
$language['SEARCH_DIFF_CHANGE_GROUP']='Kullanıcı Grubunu Değiştir';
// PRUNE TORRENTS
$language['PRUNE_TORRENTS_PRUNED']='Torrentler ölü';
$language['PRUNE_TORRENTS']='Ölü Torrentler';
$language['PRUNE_TORRENTS_INFO']='"Ölü" kabul edilecek torrentler için gün sayısı girin ';
$language['LEECHERS']='Leecher';
$language['SEEDS']='Seeder';
// DBUTILS
$language['DBUTILS_TABLENAME']='Tablo Adı';
$language['DBUTILS_RECORDS']='Kayıtlar';
$language['DBUTILS_DATALENGTH']='Veri Uzunluğu';
$language['DBUTILS_OVERHEAD']='Ek yük';
$language['DBUTILS_REPAIR']='Onar';
$language['DBUTILS_OPTIMIZE']='Optimize et';
$language['DBUTILS_ANALYSE']='Analiz et';
$language['DBUTILS_CHECK']='Kontrol et';
$language['DBUTILS_DELETE']='Sil';
$language['DBUTILS_OPERATION']='İşlem';
$language['DBUTILS_INFO']='Bilgi';
$language['DBUTILS_STATUS']='Durum';
$language['DBUTILS_TABLES']='Tablo';
// MYSQL STATUS
$language['MYSQL_STATUS']='MySQL Durumu';
// SITE LOG
$language['SITE_LOG']='Site Günlük Kayıtları';
// FORUMS
$language['FORUM_MIN_CREATE']='Oluşturabilme';
$language['FORUM_MIN_WRITE']='Yazabilme';
$language['FORUM_MIN_READ']='Okuyabilme';
$language['FORUM_SETTINGS']='Forum Ayarları';
$language['FORUM_EDIT']='Forumu Düzenle';
$language['FORUM_ADD_NEW']='Yeni Forum Ekle';
$language['FORUM_PARENT']='Üst Forum';
$language['FORUM_SORRY_PARENT']='(Üzgünüm, benim üst forumum olamaz, çünkü ben zaten bir üst forumum)';
$language['FORUM_PRUNE_1']='Bu forumda konu ve/veya mesajlar var!<br />Tüm verileri kaybedeceksiniz...<br />';
$language['FORUM_PRUNE_2']='Eğer bu forumu iptal etmek istediğinizden eminseniz';
$language['FORUM_PRUNE_3']='değilseniz geri dönün.';
$language['FORUM_ERR_CANNOT_DELETE_PARENT']='Alt forumu olan bir forumu silemezsiniz, alt forumu başka bir foruma taşıyıp tekrar deneyin.';
// MODULES
$language['ADD_NEW_MODULE']='Yeni Modül Ekle';
$language['TYPE']='Tip';
$language['DATE_CHANGED']='Değiştirme Tarihi';
$language['DATE_CREATED']='Oluşturma Tarihi';
$language['ACTIVE_MODULES']='Aktif Modüller: ';
$language['NOT_ACTIVE_MODULES']='Pasif Modüller: ';
$language['TOTAL_MODULES']='Toplam Modül: ';
$language['DEACTIVATE']='Pasifleştir';
$language['ACTIVATE']='Aktifleştir';
$language['STAFF']='Yönetim';
$language['MISC']='Çeşitli';
$language['TORRENT']='Torrent';
$language['STYLE']='Tema';
$language['ID_MODULE']='ID';
// HACKS
$language['HACK_TITLE']='Başlık';
$language['HACK_VERSION']='Sürüm';
$language['HACK_AUTHOR']='Yazar';
$language['HACK_ADDED']='Eklendi';
$language['HACK_NONE']='Kurulu hack yok';
$language['HACK_ADD_NEW']='Yeni Hack Ekle';
$language['HACK_SELECT']='Seç';
$language['HACK_STATUS']='Durum';
$language['HACK_INSTALL']='Kur';
$language['HACK_UNINSTALL']='Kaldır';
$language['HACK_INSTALLED_OK']='Hack başarılı bir şekilde yüklendi!<br />'."\n".'Yüklü hackleri görmek için <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">Yönetici KP&#39;ne (Hackler)</a> geri dönün.';
$language['HACK_BAD_ID']='Error getting hack&#39;s info with this ID.';
$language['HACK_UNINSTALLED_OK']='Hack başarılı bir şekilde kaldırıldı!<br />'."\n".'Yüklü hackleri görmek için <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">Yönetici KP&#39;ne (Hackler)</a> geri dönün.';
$language['HACK_OPERATION']='İşlem';
$language['HACK_SOLUTION']='Çözüm';
// added rev 520
$language['HACK_WHY_FTP']='Some of the files the hack&#39;s installer needs to modify are not writable. <br />'."\n".'This needs to be changed by logging into FTP and using it to chmod or create the files and folders. <br />'."\n".'Your FTP information may be temporarily cached for proper operation of the hack&#39;s installer.';
$language['HACK_FTP_SERVER']='FTP Server';
$language['HACK_FTP_PORT']='FTP Port';
$language['HACK_FTP_USERNAME']='FTP Username';
$language['HACK_FTP_PASSWORD']='FTP Password';
$language['HACK_FTP_BASEDIR']='Local path for xbtit (path from the root when you login using FTP)';
// USERS TOOLS
$language['USER_NOT_DELETE']='You cannot delete Guest user or yourself!';
$language['USER_NOT_EDIT']='You cannot edit Guest user or yourself!';
$language['USER_NOT_DELETE_HIGHER']='You cannot delete users higher ranked than yourself.';
$language['USER_NOT_EDIT_HIGHER']='You cannot edit users higher ranked than yourself.';
$language['USER_NO_CHANGE']='No change was made.';
//Manual Hack Install
$language['MHI_VIEW_INSRUCT'] = 'Elle kurulum yönergelerine bir göz atın.';
$language['MHI_MAN_INSRUCT_FOR'] = 'Manual Installation instructions for';
$language['MHI_RUN_QUERY'] = 'Run the following SQL Query via phpMyAdmin';
$language['MHI_IN'] = 'In';
$language['MHI_ALSO_IN'] = 'Also in';
$language['MHI_FIND_THIS'] = 'find this';
$language['MHI_ADD_THIS'] = 'Add this';
$language['MHI_IT'] = 'it';
$language['MHI_REPLACE'] = 'Replace with';
$language['MHI_COPY'] = 'Copy';
$language['MHI_AS'] = 'as';

$language["ACP_SECSUI_SET"]="Güvenlik Katmanı ayarları";
$language["SECSUI_QUAR_SETTING"]="Yüklenen Dosyaların Karantina Ayarları";
$language["SECSUI_QUAR_TERMS_1"]="Karantina Arama Terimleri (her satıra bir tane)";
$language["SECSUI_QUAR_TERMS_2"]="Lütfen dosyaların karantinalanmasını tetikleyecek kelimeleri aşağıdaki kutuya ekleyin:";
$language["SECSUI_QUAR_TERMS_3"]="NOT: <b><&#63;</b> yada <b>&#63;></b> eklemeniz, dosyalar doğal olarak bunlardan oluştuğundan önerilmez, bunun yerine php.ini dosyasında <b>short_open_tag</b> ayarını <b>Off</b> değerine ayarlamanız gerekir. Bu ayar <b><&#63;</b> ile başlayan php kodlarının sitenizde çalıştırılmasına engel olur, bu sayede potansiyel hackerları bunun yerine uzun php aaçma etiketi (<b><&#63;php</b>) kullanmaya zorlar.<br /><br />Geçerli değer:<br />";
$language["SECSUI_QUAR_DIR_1"]="Karantina Dizini";
$language["SECSUI_QUAR_DIR_2"]="This folder should ideally be impossible to access via the internet and be at least one level above your tracker root folder for example:";
$language["SECSUI_QUAR_DIR_3"]="Please ensure that you CHOWN/CHMOD this directory appropriately so that the server can write files to it.";
$language["SECSUI_QUAR_PM"]="Tracker ID to PM when files are quarantined";
$language["SECSUI_QUAR_INV_USR"]="Geçersiz Kullanıcı";
$language["SECSUI_PASS_SETTINGS"]="Şifre Ayarları";
$language["SECSUI_PASS_TYPE"]="Şifre Sağlama Metodu";
$language["SECSUI_PASS_INFO"]="Here you can select the password hashing algorithm you'd like xbtit to use when it stores the password in the database:";
$language["SECSUI_NO_MEMBER"]="No member exists with that tracker id";
$language["SECSUI_GAZ_TITLE"]="Gazelle Site Salt";
$language["SECSUI_GAZ_DESC"]="You should set a random value here, once set you should not change it whilst this hashing method in use otherwise everyone will have to recover their passwords.";
$language["SECSUI_COOKIE_SETTINGS"]="Cookie Settings";
$language["SECSUI_COOKIE_PRIMARY"]="Main Cookie Settings";
$language["SECSUI_COOKIE_TYPE"]="Cookie Type";
$language["SECSUI_COOKIE_EXPIRE"]="Cookie will expire in";
$language["SECSUI_COOKIE_T1"]="Classic xbtit";
$language["SECSUI_COOKIE_T2"]="New xbtit (Regular)";
$language["SECSUI_COOKIE_T3"]="New xbtit (Session)";
$language["SECSUI_COOKIE_NAME"]="Cookie Name";
$language["SECSUI_COOKIE_ITEMS"]="Cookie Items";
$language["SECSUI_COOKIE_PATH"]="Cookie Path";
$language["SECSUI_COOKIE_DOMAIN"]="Cookie Domain";
$language["SECSUI_COOKIE_MIN"]="Minute";
$language["SECSUI_COOKIE_MINS"]="Minutes";
$language["SECSUI_COOKIE_HOUR"]="Hour";
$language["SECSUI_COOKIE_HOURS"]="Hours";
$language["SECSUI_COOKIE_DAY"]="Day";
$language["SECSUI_COOKIE_DAYS"]="Days";
$language["SECSUI_COOKIE_WEEK"]="Week";
$language["SECSUI_COOKIE_WEEKS"]="Weeks";
$language["SECSUI_COOKIE_MONTH"]="Month";
$language["SECSUI_COOKIE_MONTHS"]="Months";
$language["SECSUI_COOKIE_YEAR"]="Year";
$language["SECSUI_COOKIE_YEARS"]="Years";
$language["SECSUI_COOKIE_TOO_FAR"]="I'm sorry, that would put the expire date past the current limit of Tue, 19 Jan 2038 03:14:07 GMT, please adjust your expire date accordingly!";
$language["SECSUI_COOKIE_PSALT"]="Temel Şifre";
$language["SECSUI_COOKIE_UAGENT"]="Kullanıcı Aracısı";
$language["SECSUI_COOKIE_ALANG"]="Dili Kabul Etme";
$language["SECSUI_COOKIE_IP"]="IP Adresi";
$language["SECSUI_COOKIE_DEF"]="NOTE: All cookie types will include the following by default:<br /><br /><li>Tracker ID</li><li>Password Hash</li><li>Random Number</li>";
$language["SECSUI_COOKIE_PD"]="NOTE: If you're not sure what to put for \"Cookie Path\" or \"Cookie Domain\", you should just leave them blank and the defaults will be used";
$language["SECSUI_COOKIE_IP_TYPE_1"] = "1st octet only (Y.N.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_2"] = "2nd octet only (N.Y.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_3"] = "3rd octet only (N.N.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_4"] = "4th octet only (N.N.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_5"] = "1st & 2nd octets (Y.Y.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_6"] = "2nd & 3rd octets (N.Y.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_7"] = "3rd & 4th octets (N.N.Y.Y)";
$language["SECSUI_COOKIE_IP_TYPE_8"] = "1st & 3rd octets (Y.N.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_9"] = "1st & 4th octets (Y.N.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_10"] = "2nd & 4th octets (N.Y.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_11"] = "1st, 2nd & 3rd octets (Y.Y.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_12"] = "2nd, 3rd & 4th octets (N.Y.Y.Y)";
$language["SECSUI_COOKIE_IP_TYPE_13"] = "Entire IP address (Y.Y.Y.Y)";
$language["SECSUI_PASSHASH_TYPE_1"] = "Classic xbtit";
$language["SECSUI_PASSHASH_TYPE_2"] = "TBDev";
$language["SECSUI_PASSHASH_TYPE_3"] = "TorrentStrike";
$language["SECSUI_PASSHASH_TYPE_4"] = "Gazelle";
$language["SECSUI_PASSHASH_TYPE_5"] = "Simple Machines Forum";
$language["SECSUI_PASSHASH_TYPE_6"] = "New xbtit";
$language["SECSUI_PASS_MUST"] = "Şifreler";
$language["SECSUI_PASS_BE_AT_LEAST"] = "En az";
$language["SECSUI_PASS_HAVE_AT_LEAST"] = "En az";
$language["SECSUI_PASS_CHAR_IN_LEN"] = "karakter içermeli";
$language["SECSUI_PASS_CHAR_IN_LEN_A"] = "karakter içermeli";
$language["SECSUI_PASS_LC_LET"] = "küçük harf içermeli";
$language["SECSUI_PASS_LC_LET_A"] = "küçük harf içermeli";
$language["SECSUI_PASS_UC_LET"] = "büyük harf içermeli";
$language["SECSUI_PASS_UC_LET_A"] = "büyük harf içermeli";
$language["SECSUI_PASS_NUM"] = "rakam içermeli";
$language["SECSUI_PASS_NUM_A"] = "rakam içermeli";
$language["SECSUI_PASS_SYM"] = "sembol (noktalama işareti) içermeli";
$language["SECSUI_PASS_SYM_A"] = "sembol (noktalama işareti) içermeli";
$language["SECSUI_PASS_ERR_1"] = "You cannot have a higher value for Upper Case + Lower Case + Numbers + Symbols";
$language["SECSUI_PASS_ERR_2"] = "than you have for the minimum number of characters needed in the password";

$language["SMF_MIRROR"] = "SMF Mirror";
$language["GROUP_SMF_MIRROR"] = "Mirroring rank on the SMF forum for rank changes etc.";
$language["SMF_LIST"] = "<b><u>Current SMF Group List from the database</u></b><br />";

$language["IPB_AUTO_ID"] = "IPB Autopost ID";
$language["IPB_MIRROR"] = "IPB Mirror";
$language["GROUP_IPB_MIRROR"] = "Mirroring rank on the IPB forum for rank changes etc.";
$language["IPB_LIST"] = "<b><u>Current IPB Group List from the database</u></b><br />";

$language["STYLE_TYPE"]="Tema Tipi"; 
$language["CLA_STYLE"]="xbtit classic tema sistemi"; 
$language["ATM_STYLE"]="atmoner'in tema sistemi"; 
$language["PET_STYLE"]="Petr1fied'ın tema sistemi";

$language["SECURITY_SUITE"]="Güvenlik Katmanı";
$language["IF_CHECKED"]="Seçilileri";

?>
