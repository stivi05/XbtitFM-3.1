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
global $users, $torrents, $seeds, $leechers, $percent, $SITENAME;
// $language['rtl']='rtl'; // if your language is  right to left then uncomment this line
// $language['charset']='ISO-8859-1'; // uncomment this line with specific language charset if different than tracker's one
$language['ACCOUNT_CONFIRM']=''.$SITENAME.' sitesindeki hesap doğrulaması.';
$language['ACCOUNT_CONGRATULATIONS']='Tebrikler hesabınız artık aktif!<br />Şimdi hesabınızı kullanarak siteye <a href="index.php?page=login">giriş</a> yapabilirsiniz.';
$language['ACCOUNT_CREATE']='Hesap oluşturun';
$language['ACCOUNT_DELETE']='Hesabı sil';
$language['ACCOUNT_DETAILS']='hesap detayları';
$language['ACCOUNT_EDIT']='Hesabı düzenleyin';
$language['ACCOUNT_MGMT']='Hesap Yönetimi';
$language['ACCOUNT_MSG']='Merhaba,'."\n\n".'Bu ileti, e-posta adresinizle sitemizden bir hesap başvurusu yapılması üzerine gönderildi..'."\n".'Başvuru sahibi sizseniz hesabı onaylayın, değilseniz bu e-postayı dikkate almayın.'."\n\n".'Saygılar, Yönetim.';
$language['ACTION']='İşlem';
$language['ACTIVATED']='Aktif';
$language['ACTIVE']='Durum';
$language['ACTIVE_ONLY']='Yalnızca aktifler';
$language['ADD']='Ekle';
$language['ADDED']='Tarih';
$language['ADMIN_CPANEL']='Yönetici Kontrol Paneli';
$language['ADMINCP_NOTES']='Buradan izleyicinizin tüm ayarlarını kontrol edebilirsiniz...';
$language['ALL']='Tümü';
$language['ALL_SHOUT']='Tüm Sohbetler';
$language['ANNOUNCE_URL']='İzleyici Anons URL&#39;si:';
$language['ANONYMOUS']='Anonim';
$language['ANSWER']='Cevapla';
$language['AUTHOR']='Yazan';
$language['AVATAR_URL']='Avatar (URL): ';
$language['AVERAGE']='Averaj';
$language['BACK']='Geri';
$language['BAD_ID']='Yalnış ID!';
$language['BCK_USERCP']='Kullanıcı Paneline Geri Dön';
$language['BLOCK']='Blok';
$language['BODY']='Mesaj';
$language['BOTTOM']='aşağı';
$language['BY']='Yazan';
$language['CANT_DELETE_ADMIN']='Başka bir yöneticiyi silmek mümkün değil!';
$language['CANT_DELETE_NEWS']='Haberleri silmeye yetkili değilsiniz!';
$language['CANT_DELETE_TORRENT']='Bu torrenti silmeye yetkili değilsiniz!';
$language['CANT_DELETE_USER']='Kullanıcıları silmeye yetkili değilsiniz!';
$language['CANT_DO_QUERY']='SQL sorugusu yapılamıyor - ';
$language['CANT_EDIT_TORR']='Torrenti düzenlemek için yetkili değilsiniz!';
$language['CANT_FIND_TORRENT']='Torrent dosyası bulunamıyor!';
$language['CANT_READ_LANGUAGE']='Dil dosyası bulunamıyor!';
$language['CANT_SAVE_CONFIG']='Ayarlar config.php dosyasına kaydedilemiyor';
$language['CANT_SAVE_LANGUAGE']='Dil dosyası kaydedilemiyor';
$language['CANT_WRITE_CONFIG']='UYARI: config.php dosyası yazılamadı!';
$language['CATCHUP']='Tümünü Okunmuş İşaretle';
$language['CATEGORY']='Kat.';
$language['CATEGORY_FULL']='Kategori';
$language['CENTER']='orta';
$language['CHANGE_PID']='PID Değiştir';
$language['CHARACTERS']='karakter';
$language['CHOOSE']='Seçiniz';
$language['CHOOSE_ONE']='birini seçin';
$language['CLICK_HERE']='buraya tıklayın';
$language['CLOSE']='kapat';
$language['COMMENT']='Yor.';
$language['COMMENT_1']='Yorum';
$language['COMMENT_PREVIEW']='Yorumu Önizleme';
$language['COMMENTS']='Yorumlar';
$language['CONFIG_SAVED']='Tebrikler, yeni yapılandırma dosyası kaydedildi';
$language['COUNTRY']='Ülke';
$language['CURRENT_DETAILS']='Şuanki Detaylar';
$language['DATABASE_ERROR']='Veritabanı hatası.';
$language['DATE']='Tarih';
$language['DB_ERROR_REQUEST']='Veritabanı hatası. İstek tamamlanamadı.';
$language['DB_SETTINGS']='Veritabanı ayarları';
$language['DEAD_ONLY']='Yalnızca ölü torrentler';
$language['DELETE']='Sil';
$language['DELETE_ALL_READED']='Tüm okunmuşları sil';
$language['DELETE_CONFIRM']='Bunu silmek istediğinizden emin misiniz?';
$language['DELETE_TORRENT']='Torrenti Sil';
$language['DELFAILED']='Silme Başarısız';
$language['DESCRIPTION']='Açıklama';
$language['DONT_NEED_CHANGE']='Bu ayarları değiştirmenize gerek yok!';
$language['DOWN']='İndir';
$language['DOWNLOAD']='İndirebilme';
$language['DOWNLOAD_TORRENT']='Torrenti İndir';
$language['DOWNLOADED']='İndirilen';
$language['EDIT']='Düzenle';
$language['EDIT_LANGUAGE']='Dili Düzenle';
$language['EDIT_POST']='Mesajı düzenle';
$language['EDIT_TORRENT']='Torrenti Düzenle';
$language['EMAIL']='e-Posta';
$language['EMAIL_SENT']='Belirtilen adrese bir e-posta gönderildi<br />Hesabınızı onaylamak için eklenen linke tıklayın.';
$language['EMAIL_VERIFY']=''.$SITENAME.' sitesindeki e-posta güncelleme';
$language['EMAIL_VERIFY_BLOCK']='Doğrulama e-postası gönderildi';
$language['EMAIL_VERIFY_MSG']='Merhaba,'."\n\n".'Bu e-posta kaydınızda bulunan e-posta adresini değiştirme talebinde bulunduğunuz için gönderildi, Değişikliği tamamlamak için lütfen aşağıdaki linke tıklayınız.'."\n\n".'Saygılar, Yönetim.';
$language['EMAIL_VERIFY_SENT1']='<br /><center>Bir doğrulama e-postası gönderildi:<br /><br /><strong><font color="red">';
$language['EMAIL_VERIFY_SENT2']='</font></strong><br /><br />e-Posta adresinizi güncellemek için e-posta içinde bulunan<br />linke tıklamanız gerekmektedir. e-Posta 10 dk. (genellikle hemen) ulaşmakla birlikte bazı e-posta<br />sağlayıcıları tarafından SPAM olarak işaretlenebilmektedir. Eğer bizden gelen<br />e-postayı bulamıyorsanız SPAM klasörünü kontrol ettiğinizden emin olun.<br /><br />';
$language['ERR_500']='HTTP/1.0 500 Yetkisiz Erişim!';
$language['ERR_AVATAR_EXT']='Üzgünüz, resim mevcut değil veya dosya tipi geçersiz (yalnızca gif, jpg, bmp veya png formatları geçerlidir).';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='Geçersiz Haber ID!';
$language['ERR_BODY_EMPTY']='Mesaj metni boş olamaz!';
$language['ERR_CANT_CONNECT']='Yerel MySQL Sunucusuna bağlanamıyor';
$language['ERR_CANT_OPEN_DB']='Veritabanı açılamıyor';
$language['ERR_COMMENT_EMPTY']='Yorum boş olamaz!';
$language['ERR_DB_ERR']='Veritabanı hatası. Lütfen yöneticiyle bu konuda iletişime geçin.';
$language['ERR_DELETE_POST']='Mesajı silmek?. Teyit ediniz: Bir mesajı silmek üzeresiniz. Eğer eminseniz';
$language['ERR_DELETE_TOPIC']='Konuyu silmek? Teyit ediniz: Bir konuyu silmek üzeresiniz. Eğer eminseniz';
$language['ERR_EMAIL_ALREADY_EXISTS']='Bu e-posta adresi zaten veritabanımızda!';
$language['ERR_EMAIL_NOT_FOUND_1']='Bu e-posta adresi';
$language['ERR_EMAIL_NOT_FOUND_2']='veritabanımızda bulunamadı.';
$language['ERR_ENTER_NEW_TITLE']='Yeni bir başlık girmelisiniz!';
$language['ERR_FORUM_NOT_FOUND']='Forum bulunamadı';
$language['ERR_FORUM_UNKW_ACT']='Forum Hatası: Bilinmeyen işlem';
$language['ERR_GUEST_EXISTS']='"Ziyaretçi" kısıtlı bir kullanıcı adı. "Ziyaretçi" olarak kayıt olamazsınız';
$language['ERR_IMAGE_CODE']='Güvenlik kodu eşleşmiyor';
$language['ERR_INS_TITLE_NEWS']='Başlık ve haberin ikisini de girmelisiniz';
$language['ERR_INV_NUM_FIELD']='Invalid numerical field(s) from client';
$language['ERR_INVALID_CLIENT_EVENT']='Invalid event= from client.';
$language['ERR_INVALID_INFO_BT_CLIENT']='Invalid information received from BitTorrent client';
$language['ERR_INVALID_IP_NUMB']='Invalid IP address. Must be standard dotted decimal (hostnames not allowed)';
$language['ERR_LEVEL']='Sorry, your level ';
$language['ERR_LEVEL_CANT_POST']='You are not permitted to post in this forum.';
$language['ERR_LEVEL_CANT_VIEW']='You are not permitted to view this topic.';
$language['ERR_MISSING_DATA']='Missing data!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='You must be logged in to shout...';
$language['ERR_NO_BODY']='No body text';
$language['ERR_NO_NEWS_ID']='New&#39;s ID not found!';
$language['ERR_NO_POST_WITH_ID']='No post with ID ';
$language['ERR_NO_SPACE']='Your username cannot contain a space, please replace with an underscore eg:<br /><br />';
$language['ERR_NO_TOPIC_ID']='No Topic ID returned';
$language['ERR_NO_TOPIC_POST_ID']='No topic associated with post ID';
$language['ERR_NOT_AUTH']='You&#39;re not authorized!';
$language['ERR_NOT_FOUND']='Not Found...';
$language['ERR_NOT_PERMITED']='Not Permited';
$language['ERR_PASS_LENGTH_1']='Your password must be a minimum of';
$language['ERR_PASS_LENGTH_2']='characters in length.';
$language["ERR_PASS_TOO_WEAK_1"]="Şifreniz çok zayıf.<br />For security reasons it must contain at least";
$language["ERR_PASS_TOO_WEAK_1A"]="The password is too weak.<br />For security reasons it must contain at least";
$language["ERR_PASS_TOO_WEAK_2"]="lower case letter";
$language["ERR_PASS_TOO_WEAK_2A"]="lower case letters";
$language["ERR_PASS_TOO_WEAK_3"]="upper case letter";
$language["ERR_PASS_TOO_WEAK_3A"]="upper case letters";
$language["ERR_PASS_TOO_WEAK_4"]="number";
$language["ERR_PASS_TOO_WEAK_4A"]="numbers";
$language["ERR_PASS_TOO_WEAK_5"]="symbol";
$language["ERR_PASS_TOO_WEAK_5A"]="symbols";
$language["ERR_PASS_TOO_WEAK_6"]="Here is a strong password you may want to use";
$language['ERR_PASSWORD_INCORRECT']='Şifre yanlış!';
$language['ERR_PERM_DENIED']='İzin verilmedi!';
$language['ERR_PID_NOT_FOUND']='Please redownload the torrent. PID system is active and pid was not found in the torrent';
$language['ERR_RETR_DATA']='Error retreaving data!';
$language['ERR_SEND_EMAIL']='Unable to send mail. Please contact an administrator about this error.';
$language['ERR_SERVER_LOAD']='The server load is very high at the moment. Retrying, please wait...';
$language['ERR_SPECIAL_CHAR']='<font color="black">Your username can not contain special characters like:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; etc.</strong></font></font><br />';
$language['ERR_SQL_ERR']='SQL Error';
$language['ERR_SUBJECT']='You must enter a subject.';
$language['ERR_TOPIC_ID_NA']='Topic ID is N/A';
$language['ERR_TOPIC_LOCKED']='Topic is Locked';
$language['ERR_TORRENT_IN_BROWSER']='This file is for BitTorrent clients.';
$language['ERR_UPDATE_USER']='Unable to update user data. Please contact an administrator about this error.';
$language['ERR_USER_ALREADY_EXISTS']='There&#39;s already an user with this nick!';
$language['ERR_USER_NOT_FOUND']='Sorry, User not Found';
$language['ERR_USER_NOT_USER']='Başka bir üyenin paneline erişmeye yetkili değilsiniz!';
$language['ERR_USERNAME_INCORRECT']='Kullanıcı adı doğru değil';
$language['ERROR']='Hata';
$language['ERROR_ID']='ID Hatası';
$language['FACOLTATIVE']='optional';
$language['FILE']='Dosya';
$language['FILE_CONTENTS']='Dosya İçeriği';
$language['FILE_NAME']='Dosya Adı';
$language['FIND_USER']='Kullanıcı Bul';
$language['FINISHED']='Biten';
$language['FORUM']='Forum';
$language['FORUM_ERROR']='Forum Hatası';
$language['FORUM_INFO']='Forum Bilgisi';
$language['FORUM_MIN_CREATE']='Min Class Create';
$language['FORUM_MIN_READ']='Min Class Read';
$language['FORUM_SEARCH']='Forums Search';
$language['FORUM_N_SORT_H']='Üst Durum Sırası';
$language['FORUM_N_SORT_S']='Alt Durum Sırasu';
$language['FORUM_SORT']='Sıralama';
$language['FORUM_N_TOPICS']='Konu Sayısı';
$language['FORUM_N_POSTS']='Mesaj Sayısı';
$language['FRM_DELETE']='Sil';
$language['FRM_LOGIN']='Giriş';
$language['FRM_PREVIEW']='Önizleme';
$language['FRM_REFRESH']='Yenile';
$language['FRM_RESET']='Sıfırla';
$language['FRM_SEND']='Gönder';
$language['FRM_CONFIRM']='Onay';
$language['FRM_CANCEL']='İptal';
$language['FRM_CLEAN']='Temizle';
$language['GLOBAL_SERVER_LOAD']='Ana Sunucu Yük Durumu (Geçerli sunucudaki tüm web siteleri)';
$language['GO']='Git';
$language['GROUP']='Grup';
$language['GUEST']='Ziyaretçi';
$language['GUESTS']='Ziyaretçi';
$language['HERE']='buraya';
$language['HISTORY']='Geçmiş';
$language['HOME']='Ana Sayfa';
$language['IF_YOU_ARE_SURE']='tıklayın.';
$language['IM_SURE']='Eminim';
$language['IN']='Mesaj';
$language['INF_CHANGED']='Bilgiler değişti!';
$language['INFINITE']='Sonsuz';
$language['INFO_HASH']='Sağlama Bilgisi';
$language['INS_NEW_PWD']='YENİ şifreyi girin!';
$language['INS_OLD_PWD']='ESKİ şifreyi girin!';
$language['INSERT_DATA']='Yükleme için gerekli tüm bilgileri girin.';
$language['INSERT_NEW_FORUM']='Yeni forum girin';
$language['INVALID_ID']='Üzgünüz, bu geçerli bir ID değil!';
$language['INVALID_INFO_HASH']='Geçersiz Sağlama bilgisi değeri.';
$language['INVALID_PID']='Geçersiz PID';
$language['INVALID_TORRENT']='İzleyici Hatası: Geçersiz Torrent';
$language['KEYWORDS']='Anahtar sözcükler';
$language['LAST_EXTERNAL']='Son Dış Torrent Güncellemesi ';
$language['LAST_NEWS']='Son Haberler';
$language['LAST_POST_BY']='Son mesajı yazan';
$language['LAST_SANITY']='Son Sağlamlık Kontrolü';
$language['LAST_TORRENTS']='Son Torrentler';
$language['LAST_UPDATE']='Last Update';
$language['LASTPOST']='Son Mesaj';
$language['LEECHERS']='Leecher';
$language['LEFT']='sol';
$language['LOGIN']='Giriş';
$language['LOGOUT']='Çıkış';
$language['MAILBOX']='Mesajlar';
$language['MANAGE_NEWS']='Haberleri Yönet';
$language['MEMBER']='Üye';
$language['MEMBERS']='Üye';
$language['MEMBERS_LIST']='Üye Listesi';
$language['MINIMUM_100_DOWN']='(minimum 100 MB indirme ile)';
$language['MINIMUM_5_LEECH']='minimum 5 leecher ile, ölü torrentler eklenmedi';
$language['MINIMUM_5_SEED']='minimum 5 seeder ile';
$language['MKTOR_INVALID_HASH']='makeTorrent: Received an invalid hash';
$language['MNU_ADMINCP']='Yönetici Paneli';
$language['MNU_FORUM']='Forum';
$language['MNU_INDEX']='Ana Sayfa';
$language['MNU_MEMBERS']='Üyeler';
$language['MNU_NEWS']='Haberler';
$language['MNU_STATS']='Ekstra İstatistikler';
$language['MNU_TORRENT']='Torrentler';
$language['MNU_UCP_CHANGEPWD']='Şifre Değiştir';
$language['MNU_UCP_HOME']='Kullanıcı Kontrol Paneli';
$language['MNU_UCP_IN']='ÖM Gelen Kutusu';
$language['MNU_UCP_INFO']='Profili Değiştir';
$language['MNU_UCP_NEWPM']='Yeni ÖM';
$language['MNU_UCP_OUT']='ÖM Giden Kutusu';
$language['MNU_UCP_PM']='ÖM Kutusu';
$language['MNU_UPLOAD']='Yükle';
$language['MORE_SMILES']='Ekstra İfadeler';
$language['MORE_THAN']='More than ';
$language['MORE_THAN_2']='items found, displaying first';
$language['NA']='Yok';
$language['NAME']='Adı';
$language['NEED_COOKIES']='NOT: Giriş yapmak için çerezleri etkinleştirmelisiniz.';
$language['NEW_COMMENT']='Yorumunuzu girin...';
$language['NEW_COMMENT_T']='Yeni yorum';
$language['NEWS']='the news';
$language['NEWS_DESCRIPTION']='Haber metni:';
$language['NEWS_INSERT']='Haberinizi giriniz';
$language['NEWS_PANEL']='Haber Paneli';
$language['NEWS_TITLE']='Başlık:';
$language['NEXT']='İleri';
$language['NO']='Hayır';
$language['NO_BANNED_IPS']='Yasaklanmış IP bulunamadı';
$language['NO_COMMENTS']='Yorum bulunamadı...';
$language['NO_FORUMS']='Forum bulunamadı!';
$language['NO_MAIL']='Yeni mesajınız yok.';
$language['NO_MESSAGES']='ÖM bulunamadı...';
$language['NO_NEWS']='Haber yok';
$language['NO_PEERS']='Eş yok';
$language['NO_RECORDS']='Üzgünüz, liste boş...';
$language['NO_TOPIC']='Konu bulunamadı';
$language['NO_TORR_UP_USER']='Bu kullanıcının yüklediği torrent bulunmuyor';
$language['NO_TORRENTS']='Torrent yok...';
$language['NO_USERS_FOUND']='Kullanıcı yok!';
$language['NOBODY_ONLINE']='Kimse çevrimiçi değil';
$language['NONE']='Yok';
$language['NOT_ADMIN_CP_ACCESS']='Yönetici Paneline erişmeye yetkiniz yok!';
$language['NOT_ALLOW_DOWN']='is not allowed to download from';
$language['NOT_AUTH_DOWNLOAD']='Üzgünüz, indirmeye yetkiniz yok...';
$language['NOT_AUTH_VIEW_NEWS']='Haberleri görüntülemeye yetkiniz yok!';
$language['NOT_AUTHORIZED']='Yetkiniz olmayan görüntüleme alanı:';
$language['NOT_AUTHORIZED_UPLOAD']='Yükleme yapmaya yetkili değilsiniz!';
$language['NOT_AVAILABLE']='Yok';
$language['NOT_MAIL_IN_URL']='Bu URL&#39;deki e-posta adresi bu değil!';
$language['NOT_POSS_RESET_PID']='PID&#39;nizi resetlemeniz mümkün görünmüyor! <br />Bir yönetici ile görüşünüz...';
$language['NOW_LOGIN']='Şuandan itibaren girişlerde yeni şifre geçerlidir';
$language['NUMBER_SHORT']='#';
$language['OLD_PWD']='Eski Şifre';
$language['ONLY_REG_COMMENT']='Yalnızca üyeler yorum yazabilir!';
$language['OPT_DB_RES']='Veritabanı sonuçları optimize ediliyor';
$language['OPTION']='Seçenek';
$language['PASS_RESET_CONF']='şifre sıfırlama onayı';
$language['PEER_CLIENT']='İstemci';
$language['PEER_COUNTRY']='Ülke';
$language['PEER_ID']='Eş ID';
$language['PEER_LIST']='Eş Listesi';
$language['PEER_PORT']='Port';
$language['PEER_PROGRESS']='İşlem';
$language['PEER_STATUS']='Durum';
$language['PEERS']='Eş';
$language['PEERS_DETAILS']='Eş detaylarını görmek için buraya tıklayın';
$language['PICTURE']='Resim';
$language['PID']='PID';
$language['PLEASE_WAIT']='Lütfen Bekleyin...';
$language['PM']='ÖM';
$language['POSITION']='Position';
$language['POST_REPLY']='Mesajı Cevapla';
$language['POSTED_BY']='Yazan';
$language['POSTED_DATE']='Tarih';
$language['POSTS']='Mesaj';
$language['POSTS_PER_DAY']='günde %s mesaj';
$language['POSTS_PER_PAGE']='Sayfa başına mesaj';
$language['PREVIOUS']='Önceki';
$language['PRIVATE_MSG']='Özel Mesaj';
$language['PWD_CHANGED']='Şifre değişti!';
$language['QUESTION']='Soru';
$language['QUICK_JUMP']='Hızlı Git';
$language['QUOTE']='Yanıtla';
$language['RANK']='Seviye';
$language['RATIO']='Oran';
$language['REACHED_MAX_USERS']='Maksimum kullanıcı sayısı aşıldı';
$language['READED']='Okunma';
$language['RECEIVER']='Alıcı';
$language['RECOVER_DESC']='Şifrenizi sıfırlamak ve hesap detaylarınızın size geri e-postalanması için aşağıdaki formu kullanın.<br />(Doğrulamanız için bir e-posta alacaksınız.)';
$language['RECOVER_PWD']='Şifremi unuttum';
$language['RECOVER_TITLE']='Unutulan şifreyi/kullanıcı adını kurtar';
$language['REDIRECT']='if your browser doesn&#39;t have javascript enabled, click';
$language['REDIRECT2']='Tarayıcınızda javascript etkin değilse, <a href="%s">buraya</a> tıklayın.';
$language['REDOWNLOAD_TORR_FROM']='Redownload torrent from';
$language['REGISTERED']='Kayıtlı';
$language['REGISTERED_EMAIL']='Kayıtlı e-posta';
$language['REMOVE']='Kaldır';
$language['REPLIES']='Cevap';
$language['REPLY']='Reply';
$language['RESULT']='Result';
$language['RETRY']='Retry';
$language['RETURN_TORRENTS']='Torrent listelemeye geri dön';
$language['REVERIFY_CONGRATS1']='<center><br />Congratulations, your email has been verified and successfully changed<br /><br /><strong>From: <font color="red">';
$language['REVERIFY_CONGRATS2']='</strong></font><br /><strong>To: <font color="red">';
$language['REVERIFY_CONGRATS3']='</strong></font><br /><br />';
$language['REVERIFY_FAILURE']='<center><br /><strong><font color="red"><u>Sorry but this url is not valid</u></strong></font><br /><br />A new random number is generated each time you attempt to change your email so<br />if you&#39;re seeing this message then you&#39;ve most likely tried to change your email<br />more than once and you are using an old url.<br /><br /><strong>Please wait until you&#39;re absolutely sure you haven&#39;t received the new<br />verification email before attempting to change your email again.</strong><br /><br />';
$language['REVERIFY_MSG']='e-Posta adresini değiştirmeye çalışırsanız, değiştirmeye çalıştığınız e-posta adresine bir doğrulama mesajı gönderilir.<br /><br /><font color="red"><strong>Linke tıklayıp onaylamadığınız sürece kaydınızdaki e-posta değişikliği gerçekleşmez.</strong></font>';
$language['RIGHT']='right';
$language['SEARCH']='Ara';
$language['SEEDERS']='Seeder';
$language['SEEN']='Seen';
$language['SELECT']='Select...';
$language['SENDER']='Gönderen';
$language['SENT_ERROR']='Göndermede Hata';
$language['SHORT_C']='T'; //Shortname for Completed
$language['SHORT_L']='L'; //Shortname for Leechers
$language['SHORT_S']='S'; //Shortname for Seeders
$language['SHOUTBOX']='ShoutBox';
$language['SIZE']='Boyut';
$language['SORRY']='Sorry';
$language['SORTID']='Sortid';
$language['SPEED']='Speed';
$language['STICKY']='Sabit';
$language['SUB_CATEGORY']='Sub-Category';
$language['SUBJECT']='Konu';
$language['SUBJECT_MAX_CHAR']='Konu karakter limiti: ';
$language['SUC_POST_SUC_EDIT']='Mesaj başarılı bir şekilde düzenlendi.';
$language['SUC_SEND_EMAIL']='Bir onay e-postası';
$language['SUC_SEND_EMAIL_2']='adresine gönderildi, bir kaç dakika içinde ulaşacağını ümit ediyoruz.';
$language['SUCCESS']='Başarılı';
$language['SUMADD_BUG']='summaryAdd izleyici hatası çağırılıyor';
$language['TABLE_NAME']='Tablo Adı';
$language['TIMEZONE']='Saat Dilimi';
$language['TITLE']='Başlık';
$language['TOP']='Yukarı';
$language['TOP_10_ACTIVE']='En aktif 10 torrent';
$language['TOP_10_BEST_SEED']='En iyi seederlı 10 torrent';
$language['TOP_10_BSPEED']='En hızlı 10 torrent';
$language['TOP_10_DOWNLOAD']='İndiren Top 10 ';
$language['TOP_10_SHARE']='En iyi paylaşımcı Top 10';
$language['TOP_10_UPLOAD']='Yükleyici Top 10';
$language['TOP_10_WORST']='Kötü paylaşımcı Top 10';
$language['TOP_10_WORST_SEED']='Kötü seederlı 10 torrent';
$language['TOP_10_WSPEED']='Kötü hızlı10 torrent';
$language['TOP_TORRENTS']='En popüler torrentler';
$language['TOPIC']='Konu';
$language['TOPICS']='Konu';
$language['TOPICS_PER_PAGE']='Sayfa başına konu';
$language['TORR_PEER_DETAILS']='Torrent eş detayları';
$language['TORRENT']='Torrent';
$language['TORRENT_ANONYMOUS']='Anonim olarak gönder';
$language['TORRENT_CHECK']='İzleyicinin torrent dosyasından bilgileri alıp kullanmasına izin verin.';
$language['TORRENT_DETAIL']='Torrent Detayları';
$language['TORRENT_FILE']='Torrent Dosyası';
$language['TORRENT_SEARCH']='Torrent Ara';
$language['TORRENT_STATUS']='Durum';
$language['TORRENT_UPDATE']='Güncelleniyor, lütfen bekleyiniz...';
$language['TORRENTS']='Torrentler';
$language['TORRENTS_PER_PAGE']='Sayfa başına torrent';
$language['TRACK_DB_ERR']='İzleyici/Veritabanı hatası. Detaylar günlük kayıt dosyasında.';
$language['TRACKER_INFO']=$users.' kullanıcı, '.$torrents.' torrent izleniyor ('.$seeds.' seeder, '.$leechers.' leecher, %'.$percent.')';
$language['TRACKER_LOAD']='İzleyici Yük Durumu';
$language['TRACKER_SETTINGS']='İzleyici Ayarları';
$language['TRACKER_STATS']='İzleyici İstatistikleri';
$language['TRACKING']='izleniyor';
$language['TRAFFIC']='Trafik';
$language['UCP_NOTE_1']='Buradan mesaj kutunuzu kontrol edebilir, diğer üyelere ÖM gönderebilirsiniz.';
$language['UCP_NOTE_2']='Ayarlarınızı kontrol edip düzenleyebilirsiniz, vs...';
$language['UNAUTH_IP']='Yetkisiz IP adresi.';
$language['UNKNOWN']='bilinmeyen';
$language['UPDATE']='Güncelleme';
$language['UPFAILED']='Yükleme Başarısız';
$language['UPLOAD_IMAGE']='Resim Yükle';
$language['UPLOAD_LANGUAGE_FILE']='Dil Dosyası Yükle';
$language['UPLOADED']='Yüklenen';
$language['UPLOADER']='Yükleyici';
$language['UPLOADS']='Yüklemeler';
$language['URL']='URL';
$language['USER']='Kullanıcı';
$language['USER_CP']='Profilim';
$language['USER_CP_1']='Kullanıcı Kontrol Paneli';
$language['USER_DETAILS']='Kullanıcı Detayları';
$language['USER_EMAIL']='Geçerli e-Posta';
$language['USER_ID']='Kullanıcı ID';
$language['USER_JOINED']='Katılış Tarihi';
$language['USER_LASTACCESS']='Son Erişim';
$language['USER_LEVEL']='Seviye';
$language['USER_LOCAL_TIME']='Kullanıcı Yerel Zamanı';
$language['USER_NAME']='Kullanıcı Adı';
$language['USER_PASS_RECOVER']='Şifre/Kullanıcı Adı Kurtarma';
$language['USER_PWD']='Şifre';
$language['USERS_SEARCH']='Kullanıcı Ara';
$language['VIEW_DETAILS']='Detayları gör';
$language['VIEW_TOPIC']='Konuları Gör';
$language['VIEW_UNREAD']='Okunmayanları Gör';
$language['VIEWS']='Görüntüleme';
$language['VISITOR']='Ziyaretçi';
$language['VISITORS']='Ziyaretçi';
$language['WAIT_ADMIN_VALID']='Yönetici doğrulaması için beklemelisiniz...';
$language['WARNING']='Uyarı!';
$language['WELCOME']='Hoş geldiniz';
$language['WELCOME_ADMINCP']='Yönetici Kontrol Paneli';
$language['WELCOME_BACK']='Hoş geldiniz';
$language['WELCOME_UCP']='Kullanıcı Kontrol Panelinize hoş geldiniz';
$language['WORD_AND']='ve';
$language['WORD_NEW']='Yeni';
$language['WROTE']='wrote';
$language['WT']='Bek. Sür.';
$language['X_TIMES']='defa';
$language['YES']='Evet';
$language['LAST_IP']='Son IP';
$language['FIRST_UNREAD']='İlk okunmayan mesaja gidin';
$language['MODULE_UNACTIVE']='Gerekli modül aktif değil!';
$language['MODULE_NOT_PRESENT']='Gerekli modül mevcut değil!';
$language['MODULE_LOAD_ERROR']='Gerekli modül hatalı gibi görünüyor!';
$language['RESET_PID'] = 'PID';

# Language definitions added by TreetopClimber.
$language['EXTRA']='ekstra';
$language['DROPDOWN']='açılır menü';
$language['TORRENT_MENU']='Torrent Menüsü';
$language['USER_MENU']='Kullanıcı Menüsü';
$language['ADMIN_ACCESS']='Yönetici Erişimi';
$language['STAFF_ACCESS']='Personel';
$language['UPLOAD_LINK']='Torrent Yükle';
$language['COMMUNITY']='Topluluk';
$language['MY_ACCOUNT']='Hesabım';
# End

$language["USERNAME"]="Kullanıcı Adı";
$language["SUBMIT"]="Gönder";

$language["QUAR_PM_SUBJ"]="Suspected Hacking Attempt";
$language["QUAR_PM_MSG_1"]="tried to upload a file containing php code. This file was quarantined";
$language["QUAR_PM_MSG_2"]="It is however possible this is a false negative so please check this file with a hex editor or something before banning this user."."\n\n"."This attempt was made via";
$language["QUAR_OUTPUT"]="Your attempt to upload a file containing php code has been thwarted and you have been reported to the site Owner!";
$language["QUAR_ERR"]="Quarantine Error";
$language["QUAR_DIR_PROBLEM_1"]="Quarantine Directory";
$language["QUAR_DIR_PROBLEM_2"]="does not exist, please set a valid Quarantine Directory in [b]Admin Panel-->Security Suite Settings[/b]";
$language["QUAR_DIR_PROBLEM_3"]="is not writable, please CHMOD to 0777";
$language["QUAR_UNABLE"]="Unable to quarantine file due to unforseen error, please check your other PM's for details of how to resolve this issue";
$language["QUAR_NOT_SET"]="Directory not set";
$language["QUAR_TMP_FILE_MISS"]="Can't find the temp file!";

$language["SECSUI_ACC_PWD_1"]="Şifreniz:";
$language["SECSUI_ACC_PWD_1A"]="Şifre:";
$language["SECSUI_ACC_PWD_2"]="Uzunluğu en az";
$language["SECSUI_ACC_PWD_3"]="karakter olmalı";
$language["SECSUI_ACC_PWD_3A"]="karakter olmalı";
$language["SECSUI_ACC_PWD_4"]="İçerisinde en az";
$language["SECSUI_ACC_PWD_5"]="küçük harf bulunmalı";
$language["SECSUI_ACC_PWD_5A"]="küçük harf bulunmalı";
$language["SECSUI_ACC_PWD_6"]="büyük harf bulunmalı";
$language["SECSUI_ACC_PWD_6A"]="büyük harf bulunmalı";
$language["SECSUI_ACC_PWD_7"]="sayı bulunmalı";
$language["SECSUI_ACC_PWD_7A"]="sayı bulunmalı";
$language["SECSUI_ACC_PWD_8"]="sembol (noktalama işareti) bulunmalı";
$language["SECSUI_ACC_PWD_8A"]="sembol (noktalama işareti) bulunmalı";

$language["LOGS_PHP"]="PHP Hata Kaydı";
$language["LOGS_LINE_AMT"]="<b>Line amount:</b>";
$language["LOGS_LINE_AMT_1"]="<b>How many lines to show of the log</b>";
$language["LOGS_COOLY_NAME"]="<b>Log Name:</b>&nbsp;The name you wish to call your logs. Think of something authentic.";
$language["LOGS_COOLY_NAMES"]="This will be the same name for each log apart from the date stamp.";
$language["LOGS_COOLY_PATH"]="<b>Log Path:</b>&nbsp;Above doc root would be a good choice \"if possible\" no forward slash<br /> and folder must be writable.If you have an open basedir restriction you are best to keep the current path.";
$language["LOGS_COOLY_PATHS"]="Recommended:";
$language["LOGS_COOLY_NOTE"]="<b>If u change path to another doc root dir be sure to copy the .htaccess to the new dir.</b>";
$language["LOGS_COOLY_LIST"]="The list of old logs in your folder.";
$language["LOGS_COOLY_FLUSH"]="Flush out</a> old logs";

$language['TORRENT_COMMENTS']="Torrent Yorumları";
$language['TORRENT_DETAILS']="Torrent Detayları";
$language['FORUM_SETTINGS']="Forum Ayarları";
$language['FORUMS']='Forumlar';
?>
