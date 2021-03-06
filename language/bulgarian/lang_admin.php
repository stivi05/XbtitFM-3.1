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
$language["ACP_BAN_IP"]="Баннати IP-та";
$language["ACP_FORUM"]="Форум Настройки";
$language["ACP_USER_GROUP"]="Настройки Потребителски групи";
$language["ACP_STYLES"]="Стилове";
$language["ACP_LANGUAGES"]="Езици";
$language["ACP_CATEGORIES"]="Категории";
$language["ACP_TRACKER_SETTINGS"]="Настройки на тракера";
$language["ACP_OPTIMIZE_DB"]="Оптимизиране на базата данни";
$language["ACP_CENSORED"]="Цензурирани Думи";
$language["ACP_DBUTILS"]="Инструменти за базата данни";
$language["ACP_HACKS"]="Хакове";
$language["ACP_HACKS_CONFIG"]="Настройки на хаковете";
$language["ACP_MODULES"]="Модули";
$language["ACP_MODULES_CONFIG"]="Настройки на модулите";
$language["ACP_MASSPM"]="Лични Съобщения до всички";
$language["ACP_PRUNE_TORRENTS"]="Премахване на торенти";
$language["ACP_PRUNE_USERS"]="Премахване на потребители";
$language["ACP_SITE_LOG"]="Лог на сайта";
$language["ACP_SEARCH_DIFF"]="Търсене на разлики";
$language["ACP_BLOCKS"]="Настройки на блоковете";
$language["ACP_POLLS"]="Настройки на анкетите";
$language["ACP_MENU"]="Админ Меню";
$language["ACP_FRONTEND"]="Настройки на съдържанието";
$language["ACP_USERS_TOOLS"]="Потребителски настройки";
$language["ACP_TORRENTS_TOOLS"]="Торент настройки";
$language["ACP_OTHER_TOOLS"]="Други настройки";
$language["ACP_MYSQL_STATS"]="MySql Статистики";
$language["XBTT_BACKEND"]="xbtt Опция";
$language["XBTT_USE"]="Използвайте <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">xbtt</a> като backend?";
$language["XBTT_URL"]="xbtt начален url, напр. http://localhost:2710";
$language["GENERAL_SETTINGS"]="Главни настройки";
$language["TRACKER_NAME"]="Име на сайта";
$language["TRACKER_BASEURL"]="Основен URL на тракера(без последното /)";
$language["TRACKER_ANNOUNCE"]="Аноунс на тракера (един url на ред)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Проверете аноунс url-овете два пъти, както и дали сте активирали xbtt backend...</span>":"");
$language["TRACKER_EMAIL"]="Е-mail на собственика";
$language["TORRENT_FOLDER"]="Tорент папка";
$language["ALLOW_EXTERNAL"]="Позволи външни торенти";
$language["ALLOW_GZIP"]="включи GZIP";
$language["ALLOW_DEBUG"]="Покажи Debug инфо в най-долната част";
$language["ALLOW_DHT"]="Забрани DHT (private flag in torrent)<br />\nще бъде активно на новите торенти";
$language["ALLOW_LIVESTATS"]="Включи Live Stats (предизвиква повишаване на натоварването!)";
$language["ALLOW_SITELOG"]="Включване на лога (за торенти/потребители)";
$language["ALLOW_HISTORY"]="Включване на историята (за торенти/потребители)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Личен аноунс";
$language["ALLOW_PRIVATE_SCRAPE"]="Частен Scrape";
$language["SHOW_UPLOADER"]="Показване на ника на ъплоудъра";
$language["USE_POPUP"]="Използване на Popup за детайлите на торентите и пиърите";
$language["DEFAULT_LANGUAGE"]="Основен език";
$language["DEFAULT_CHARSET"]="Основен енкодинг<br />\n(ако вашият език не се показва нормално, използвайте UTF-8)";
$language["DEFAULT_STYLE"]="Основен стил";
$language["MAX_USERS"]="Максимален брой потребители (с цифри, 0 = без лимит)";
$language["MAX_TORRENTS_PER_PAGE"]="Торенти на страница";
$language["SPECIFIC_SETTINGS"]="Специфични настройки на тракера";
$language["SETTING_INTERVAL_SANITY"]="Интервал на проверката (с цифри за секунди, 0 = забраняване)<br />Препоръчва се 1800 сек. (30 минути)";
$language["SETTING_INTERVAL_EXTERNAL"]="Update External interval (с цифри за секунди, 0 = забраняване)<br />Според броя външни торенти";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Максимален re-announce интервал (с цифри за секунди)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Минимален re-announce интервал (с цифри за секунди)";
$language["SETTING_MAX_PEERS"]="Макс брой от пиъри за заявка (с цифри)";
$language["SETTING_DYNAMIC"]="Разрешаване на динамични торенти (не се препоръчва)";
$language["SETTING_NAT_CHECK"]="NAT проверка";
$language["SETTING_PERSISTENT_DB"]="Постоянна връзка с базата данни (не се препоръчва)";
$language["SETTING_OVERRIDE_IP"]="Позволяване на потребители да използват еднакви IP-та";
$language["SETTING_CALCULATE_SPEED"]="Пресмятане на Даунлоуд и Ъплоуд скорост";
$language["SETTING_PEER_CACHING"]="Кеш на таблиците (ще намали малко натоварването)";
$language["SETTING_SEEDS_PID"]="Макс. брой сийдъри с еднакъв PID";
$language["SETTING_LEECHERS_PID"]="Макс. брой лийчъри с еднакъв PID";
$language["SETTING_VALIDATION"]="Одобряване";
$language["SETTING_CAPTCHA"]="Подсигурена регистрация (използва се  ImageCode, нужни са GD+Freetype библиотеки)";
$language["SETTING_FORUM"]="Форум линк, може да бъде:<br /><li><font color='#FF0000'>internal</font> или празно място за вътрешен форум</li><li><font color='#FF0000'>smf</font> за интегриран <a target='_new' href='http://www.simplemachines.org'>Simple Machines Forum</a></li><li>Въведете вашия предпочитан форум в полето</li>";
$language["BLOCKS_SETTING"]="Настройки на главната страница и блоковете";
$language["SETTING_CLOCK"]="Вид на часовника";
$language["SETTING_NUM_NEWS"]="Лимит за новините (с цифри)";
$language["SETTING_NUM_POSTS"]="Лимит за форумния блок (с цифри)";
$language["SETTING_NUM_LASTTORRENTS"]="Лимит за блока с последните торенти (с цифри)";
$language["SETTING_NUM_TOPTORRENTS"]="Лимит за блока с най-известни торенти (с цифри)";
$language["CLOCK_ANALOG"]="Аналогов";
$language["CLOCK_DIGITAL"]="Дигитален";
$language["CONFIG_SAVED"]="Конфигурацията беше записана правилно!";
$language["CACHE_SITE"]="Cache интервал (с цифри за секунди, 0 = забранено)";
$language["ALL_FIELDS_REQUIRED"]="Всички полета са задължителни!";
$language["SETTING_CUT_LONG_NAME"]="Режи дългите имена на торентите след 'x'-тия символ (0 = без рязане)";
$language["MAILER_SETTINGS"]="Мейлър";
$language["SETTING_MAIL_TYPE"]="Mail вид";
$language["SETTING_SMTP_SERVER"]="SMTP Сървър";
$language["SETTING_SMTP_PORT"]="SMTP порт";
$language["SETTING_SMTP_USERNAME"]="SMTP Потребителско Име";
$language["SETTING_SMTP_PASSWORD"]="SMTP Парола";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="SMTP Парола (Отново)";
$language["XBTT_TABLES_ERROR"]="Трябва да импортнете xbtt таблиците (погледнете в инсталационните инструкции на xbtt), преди да активиране xbtt backend!";
$language["XBTT_URL_ERROR"]="xbtt базов url е задължителен!";
// BAN FORM
$language["BAN_NOTE"]="Тук можете да видите IP-тата, които са баннати от тракера и нямат достъп до него.<br />\nТрябва да въведете обхват от (начално IP) до (крайно IP).";
$language["BAN_NOIP"]="Няма баннати IP-та";
$language["BAN_FIRSTIP"]="Начално IP";
$language["BAN_LASTIP"]="Крайно IP";
$language["BAN_COMMENTS"]="Коментари";
$language["BAN_REMOVE"]="Премахни";
$language["BAN_BY"]="От";
$language["BAN_ADDED"]="Дата";
$language["BAN_INSERT"]="Въведете нов обхват за баннати IP-та";
$language["BAN_IP_ERROR"]="Грешен IP адрес.";
$language["BAN_NO_IP_WRITE"]="Не сте въвели IP адрес!";
$language["BAN_DELETED"]="Обхватът е премахнат от базата данни.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Върнете се към баннатите IP-та</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Езикови настройки";
$language["LANGUAGE"]="Език";
$language["LANGUAGE_ADD"]="Вмъкнете нов език";
$language["LANGUAGE_SAVED"]="Поздравления, езикът беше променен";
// STYLES
$language["STYLE_SETTINGS"]="Настройки на стиловете";
$language["STYLE_EDIT"]="Редактиране на стил";
$language["STYLE_ADD"]="Добавяне на нов стил";
$language["STYLE_NAME"]="Име на стила";
$language["STYLE_URL"]="URL на стила";
$language["STYLE_FOLDER"]="Папка на стила";
$language["STYLE_NOTE"]="Оттук можете да управлявате стиловете си, но те трябва да бъдат качени чрез ftp или sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Настройки на категориите";
$language["CATEGORY_IMAGE"]="Картинка на категорията";
$language["CATEGORY_ADD"]="Добавяне на нова категория";
$language["CATEGORY_SORT_INDEX"]="Сортиране";
$language["CATEGORY_FULL"]="Категория";
$language["CATEGORY_EDIT"]="Редактиране на категорията";
$language["CATEGORY_SUB"]="Под-Категория";
$language["CATEGORY_NAME"]="Категория";
// CENSORED
$language["CENSORED_NOTE"]="Въведете <b>по една дума на ред</b>, за да бъдат цензурирани (ще се показва като *censored*)";
$language["CENSORED_EDIT"]="Редактиране на цензурираните думи";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Настройки на блоковете";
$language["ENABLED"]="Включен";
$language["ORDER"]="Подреждане";
$language["BLOCK_NAME"]="Име на блока";
$language["BLOCK_POSITION"]="Позиция";
$language["BLOCK_TITLE"]="Име на блока (ще бъде показван с това име)";
$language["BLOCK_USE_CACHE"]="Cache-ване на блока?";
$language["ERR_BLOCK_NAME"]="Трябва да изберете един от позволените файлове в списъка с имена!";
$language["BLOCK_ADD_NEW"]="Добави нов блок";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Настройки на анкетите";
$language["POLLID"]="ID на анкетата";
$language["INSERT_NEW_POLL"]="Добавяне на нова анкета";
$language["CANT_FIND_POLL"]="Анкетата не съществува";
$language["ADD_NEW_POLL"]="Добави анкета";
// GROUPS
$language["USER_GROUPS"]="Настройки на Потребителските Групи (кликнете на името за промяна)";
$language["VIEW_EDIT_DEL"]="Преглежда/Променя/Изтрива";
$language["CANT_DELETE_GROUP"]="Тази група не може да бъде премахната!";
$language["GROUP_NAME"]="Име на групата";
$language["GROUP_VIEW_NEWS"]="Преглежда новини";
$language["GROUP_VIEW_FORUM"]="Преглежда Форум";
$language["GROUP_EDIT_FORUM"]="Променя форум";
$language["GROUP_BASE_LEVEL"]="Изберете основно ниво";
$language["GROUP_ERR_BASE_SEL"]="Грешка в основното ниво!";
$language["GROUP_DELETE_NEWS"]="Изтрива новини";
$language["GROUP_PCOLOR"]="Prefix цвят (като ";
$language["GROUP_SCOLOR"]="Suffix цвят (като ";
$language["GROUP_VIEW_TORR"]="Преглежда торенти";
$language["GROUP_EDIT_TORR"]="Променя торенти";
$language["GROUP_VIEW_USERS"]="Преглежда потребители";
$language["GROUP_DELETE_TORR"]="Изтрива торенти";
$language["GROUP_EDIT_USERS"]="Променя потребители";
$language["GROUP_DOWNLOAD"]="Може да сваля";
$language["GROUP_DELETE_USERS"]="Изтрива потребители";
$language["GROUP_DELETE_FORUM"]="Изтрива във форума";
$language["GROUP_GO_CP"]="Може да влиза в Админ Панела";
$language["GROUP_EDIT_NEWS"]="Променя новини";
$language["GROUP_ADD_NEW"]="Добави нова група";
$language["GROUP_UPLOAD"]="Може да качва";
$language["GROUP_WT"]="Време за изчакване, ако коеф. е <1";
$language["GROUP_EDIT_GROUP"]="Промени Група";
$language["GROUP_VIEW"]="Преглед";
$language["GROUP_EDIT"]="Промяна";
$language["GROUP_DELETE"]="Изтриване";
$language["INSERT_USER_GROUP"]="Въвеждане на нова група";
$language["ERR_CANT_FIND_GROUP"]="Не мога да намеря групата!";
$language["GROUP_DELETED"]="Групата беше изтрита!";
// MASS PM
$language["USERS_FOUND"]="Намерени потребители";
$language["USERS_PMED"]="Потребители, получили ЛС-та";
$language["WHO_PM"]="Към кого ще бъде изпращано?";
$language["MASS_SENT"]="Масовото съобщение изпратено!!!";
$language["MASS_PM"]="Масово ЛС";
$language["MASS_PM_ERROR"]="Въведете нещо, преди да изпращате!!!";
$language["RATIO_ONLY"]="само с този коеф.";
$language["RATIO_GREAT"]="по-голям от този коеф.";
$language["RATIO_LOW"]="по-малък от този коеф.";
$language["RATIO_FROM"]="От";
$language["RATIO_TO"]="До";
$language["MASSPM_INFO"]="Инфо";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Премахнати потребители";
$language["PRUNE_USERS"]="Премахване на потребители";
$language["PRUNE_USERS_INFO"]="Въведете броя дни, в които потребителят е бил неактивен (не е влизал от x дни ИЛИ се е регистрирал от х дни и все още не е активиран)";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Търсене на разлики";
$language["SEARCH_DIFF_MESSAGE"]="Съобщение";
$language["DIFFERENCE"]="Разлика";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Промени групата";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Премахнати торенти";
$language["PRUNE_TORRENTS"]="Премахване на торенти";
$language["PRUNE_TORRENTS_INFO"]="Въведете броя дни, в които торентът е бил неактивен";
$language["LEECHERS"]="Лийчъри";
$language["SEEDS"]="Сийдъри";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Име на Таблицата";
$language["DBUTILS_RECORDS"]="Записи";
$language["DBUTILS_DATALENGTH"]="Дължина на данните";
$language["DBUTILS_OVERHEAD"]="Overhead";
$language["DBUTILS_REPAIR"]="Поправи";
$language["DBUTILS_OPTIMIZE"]="Оптимизирай";
$language["DBUTILS_ANALYSE"]="Анализирай";
$language["DBUTILS_CHECK"]="Отметни";
$language["DBUTILS_DELETE"]="Изтрий";
$language["DBUTILS_OPERATION"]="Операция";
$language["DBUTILS_INFO"]="Инфо";
$language["DBUTILS_STATUS"]="Статус";
$language["DBUTILS_TABLES"]="Tаблици";
// MYSQL STATUS
$language["MYSQL_STATUS"]="MySQL Статус";
// SITE LOG
$language["SITE_LOG"]="Лог";
// FORUMS
$language["FORUM_MIN_CREATE"]="Мин. клас да създава";
$language["FORUM_MIN_WRITE"]="Мин. клас да пише";
$language["FORUM_MIN_READ"]="Мин. клас да чете";
$language["FORUM_SETTINGS"]="Настройки на форума";
$language["FORUM_EDIT"]="Промени форум";
$language["FORUM_ADD_NEW"]="Добави форум";
$language["FORUM_PARENT"]="Главни форуми";
$language["FORUM_SORRY_PARENT"]="(Този форум не може да има главен, защото той самият е главен)";
$language["FORUM_PRUNE_1"]="Има раздели и/или постове в този форум!<br />Ще изгубите всичката информация...<br />";
$language["FORUM_PRUNE_2"]="Ако сте сигурни, че искате да премахнете форума";
$language["FORUM_PRUNE_3"]="или се върнете.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Не можете да изтриете форум, който има под-форуми, преместете под-форумите в друг форум и опитайте отново";
// MODULES
$language["ADD_NEW_MODULE"]="Добавете Нов Модул";
$language["TYPE"]="Вид";
$language["DATE_CHANGED"]="Промяна на дата";
$language["DATE_CREATED"]="Дата на създаване";
$language["ACTIVE_MODULES"]="Активни модули: ";
$language["NOT_ACTIVE_MODULES"]="Неактивни модули: ";
$language["TOTAL_MODULES"]="Общо модули: ";
$language["DEACTIVATE"]="Деактивирай";
$language["ACTIVATE"]="Активирай";
$language["STAFF"]="Екип";
$language["MISC"]="Други";
$language["TORRENT"]="Торент";
$language["STYLE"]="Стил";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Заглавие";
$language["HACK_VERSION"]="Версия";
$language["HACK_AUTHOR"]="Автор";
$language["HACK_ADDED"]="Добавен";
$language["HACK_NONE"]="Няма инсталирани хакове";
$language["HACK_ADD_NEW"]="Добави нов хак";
$language["HACK_SELECT"]="Избери";
$language["HACK_STATUS"]="Статус";
$language["HACK_INSTALL"]="Инсталирай";
$language["HACK_UNINSTALL"]="Премахни";
$language["HACK_INSTALLED_OK"]="Хакът беше инсталиран успешно!<br />\nЗа да видите инсталираните хакове, се върнете към <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">списъка с хакове</a>";
$language["HACK_BAD_ID"]="Грешка при взимането на инфо от хака с това ID.";
$language["HACK_UNINSTALLED_OK"]="Хакът беше премахнат успешно!<br />\nЗа да видите инсталираните хакове, се върнете към <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">списъка с хакове</a>";
$language["HACK_OPERATION"]="Операция";
$language["HACK_SOLUTION"]="Решение";
// added rev 520
$language["HACK_WHY_FTP"]="Накой от файловете, които трябват на хака, нямат права за записване в тях. <br />\nТова трябва да бъде променено, като се логнете с вашия FTP-акаунт и промените правата да дадения файл или папка. <br />";
$language["HACK_FTP_SERVER"]="FTP Сървър";
$language["HACK_FTP_PORT"]="FTP Порт";
$language["HACK_FTP_USERNAME"]="FTP Потребителско име";
$language["HACK_FTP_PASSWORD"]="FTP парола";
$language["HACK_FTP_BASEDIR"]="Път към xbtit (път към папката на xbtit, когато се логвате с FTP)";
// USERS TOOLS
$language["USER_NOT_DELETE"]="Не можете да изтриете Гост или себе си!";
$language["USER_NOT_EDIT"]="Не може да променяте Гост или себе си!";
//Manual Hack Install
$language["MHI_VIEW_INSRUCT"] = "Да се покажат ли инструкции за ръчна инсталация?";
$language["MHI_MAN_INSRUCT_FOR"] = "Инструкции за ръчна инсталация за";
$language["MHI_RUN_QUERY"] = "Изпълнете тази SQL заявка през phpMyAdmin";
$language["MHI_IN"] = "Във файл";
$language["MHI_ALSO_IN"] = "Също във файл";
$language["MHI_FIND_THIS"] = "Намерете";
$language["MHI_ADD_THIS"] = "Добавете";
$language["MHI_IT"] = " ";
$language["MHI_REPLACE"] = "Заменете с";
$language["MHI_COPY"] = "Копирайте";
$language["MHI_AS"] = "като";

$language["ACP_SECSUI_SET"]="Настройки на сигурността";
$language["SECSUI_QUAR_SETTING"]="Настройки за карантина на качени файлове";
$language["SECSUI_QUAR_TERMS_1"]="Изрази за търсене (по един на ред)";
$language["SECSUI_QUAR_TERMS_2"]="Моля, добавете по-долу думи и изрази, които ще задействат карантината:";
$language["SECSUI_QUAR_TERMS_3"]="ВНИМАНИЕ: Не се препоръчва да добавяте <b><&#63;</b> или <b>&#63;></b>, тъй като те могат да се срещнат и в обикновени файлове, вместо това, по-добре настройте <b>short_open_tag</b> да е <b>Off</b> във Вашия php.ini файл, това ще предотврати изпълнението на php код, който започва с <b><&#63;</b> и ще принуди хакерите да ползват дългия php open tag (<b><&#63;php</b>) вместо това.<br /><br />Текущата стойност е:<br />";
$language["SECSUI_QUAR_DIR_1"]="Папка за карантината";
$language["SECSUI_QUAR_DIR_2"]="Тази папка трябва да е максимално недостъпна отвън и да е поне едно ниво НАД Вашата главна папка, например:";
$language["SECSUI_QUAR_DIR_3"]="Моля, уверете се, че сте настроили CHOWN/CHMOD на тази папка така, че сървърът да може да записва файлове в нея.";
$language["SECSUI_QUAR_PM"]="Tracker ID на собственика, който да получава ЛС при нов файл в карантината";
$language["SECSUI_QUAR_INV_USR"]="Невалиден потребител";
$language["SECSUI_PASS_SETTINGS"]="Настройки на паролите";
$language["SECSUI_PASS_TYPE"]="Метод за хеширане на паролата";
$language["SECSUI_PASS_INFO"]="Тук можете да изберете алгоритъм за хеширане на паролата, който искате xbtit да използва при съхраняването в базата:";
$language["SECSUI_NO_MEMBER"]="Няма потребител с това ID";
$language["SECSUI_GAZ_TITLE"]="Gazelle Site Salt";
$language["SECSUI_GAZ_DESC"]="Трябва да зададете случайна стойност тук, но веднъж зададена, не трябва да я променяте, защото това ще наложи всички потребители да поискат наново паролите си.";
$language["SECSUI_COOKIE_SETTINGS"]="Настройки на Cookies";
$language["SECSUI_COOKIE_PRIMARY"]="Главни настройки на Cookies";
$language["SECSUI_COOKIE_TYPE"]="Cookie тип";
$language["SECSUI_COOKIE_EXPIRE"]="Cookie ще изтече след";
$language["SECSUI_COOKIE_T1"]="Класически xbtit";
$language["SECSUI_COOKIE_T2"]="Нов xbtit (Обикновен)";
$language["SECSUI_COOKIE_T3"]="Нов xbtit (Сесия)";
$language["SECSUI_COOKIE_NAME"]="Cookie име";
$language["SECSUI_COOKIE_ITEMS"]="Cookie атрибути";
$language["SECSUI_COOKIE_PATH"]="Cookie Път";
$language["SECSUI_COOKIE_DOMAIN"]="Cookie Домейн";
$language["SECSUI_COOKIE_MIN"]="минута";
$language["SECSUI_COOKIE_MINS"]="минути";
$language["SECSUI_COOKIE_HOUR"]="час";
$language["SECSUI_COOKIE_HOURS"]="часа";
$language["SECSUI_COOKIE_DAY"]="ден";
$language["SECSUI_COOKIE_DAYS"]="дни";
$language["SECSUI_COOKIE_WEEK"]="седмица";
$language["SECSUI_COOKIE_WEEKS"]="седмици";
$language["SECSUI_COOKIE_MONTH"]="месец";
$language["SECSUI_COOKIE_MONTHS"]="месеци";
$language["SECSUI_COOKIE_YEAR"]="година";
$language["SECSUI_COOKIE_YEARS"]="години";
$language["SECSUI_COOKIE_TOO_FAR"]="Съжаляваме, това ще зададе дата на изтичане извън позволената граница, която е вторник, 19 януари 2038 г., 03:14:07 GMT, моля, коригирайте периода!";
$language["SECSUI_COOKIE_PSALT"]="Password Salt";
$language["SECSUI_COOKIE_UAGENT"]="User Agent";
$language["SECSUI_COOKIE_ALANG"]="Accept Language";
$language["SECSUI_COOKIE_IP"]="IP адрес";
$language["SECSUI_COOKIE_DEF"]="ВНИМАНИЕ: Всички типове cookie включват по подразбиране:<br /><br /><li>Tracker ID</li><li>Password Hash</li><li>Случайно число</li>";
$language["SECSUI_COOKIE_PD"]="ВНИМАНИЕ: Ако не сте сигурни какво да напишете в полетата за \"Cookie Path\" или \"Cookie Domain\", по-добре ги оставете празни, за да се използват стойности по подразбиране.";
$language["SECSUI_COOKIE_IP_TYPE_1"] = "Само 1-ви октет (Y.N.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_2"] = "Само 2-ри октет (N.Y.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_3"] = "Само 3-ти октет (N.N.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_4"] = "Само 4-ти октет (N.N.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_5"] = "1-ви и 2-ри октети (Y.Y.N.N)";
$language["SECSUI_COOKIE_IP_TYPE_6"] = "2-ри и 3-ти октети (N.Y.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_7"] = "3-ти и 4-ти октети (N.N.Y.Y)";
$language["SECSUI_COOKIE_IP_TYPE_8"] = "1-ви и 3-ти октети (Y.N.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_9"] = "1-ви и 4-ти октети (Y.N.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_10"] = "2-ри и 4-ти октети (N.Y.N.Y)";
$language["SECSUI_COOKIE_IP_TYPE_11"] = "1-ви, 2-ри и 3-ти октети (Y.Y.Y.N)";
$language["SECSUI_COOKIE_IP_TYPE_12"] = "2-ри, 3-ти и 4-ти октети (N.Y.Y.Y)";
$language["SECSUI_COOKIE_IP_TYPE_13"] = "Целият IP адрес (Y.Y.Y.Y)";
$language["SECSUI_PASSHASH_TYPE_1"] = "Класически xbtit";
$language["SECSUI_PASSHASH_TYPE_2"] = "TBDev";
$language["SECSUI_PASSHASH_TYPE_3"] = "TorrentStrike";
$language["SECSUI_PASSHASH_TYPE_4"] = "Gazelle";
$language["SECSUI_PASSHASH_TYPE_5"] = "Simple Machines Forum";
$language["SECSUI_PASSHASH_TYPE_6"] = "Нов xbtit";
$language["SECSUI_PASS_MUST"] = "Паролите трябва";
$language["SECSUI_PASS_BE_AT_LEAST"] = "да са поне";
$language["SECSUI_PASS_HAVE_AT_LEAST"] = "да имат поне";
$language["SECSUI_PASS_CHAR_IN_LEN"] = "символ дълги";
$language["SECSUI_PASS_CHAR_IN_LEN_A"] = "символа дълги";
$language["SECSUI_PASS_LC_LET"] = "малка буква";
$language["SECSUI_PASS_LC_LET_A"] = "малки букви";
$language["SECSUI_PASS_UC_LET"] = "голяма буква";
$language["SECSUI_PASS_UC_LET_A"] = "големи букви";
$language["SECSUI_PASS_NUM"] = "цифра";
$language["SECSUI_PASS_NUM_A"] = "цифри";
$language["SECSUI_PASS_SYM"] = "символ";
$language["SECSUI_PASS_SYM_A"] = "символа";
$language["SECSUI_PASS_ERR_1"] = "Не можете да задавате по-голяма стойност от сумата на Главни + Малки + Цифри + Символи,";
$language["SECSUI_PASS_ERR_2"] = "сравнено с минималните изисквания за дължина на паролата";

$language["SMF_MIRROR"] = "SMF съответстващи нива";
$language["GROUP_SMF_MIRROR"] = "Съответстващо ниво от SMF форума";
$language["SMF_LIST"] = "<b><u>Текущ списък с Групи от базата данни</u></b><br />";

$language["IPB_AUTO_ID"] = "IPB ID за автоматични постове";
$language["IPB_MIRROR"] = "IPB съответствие";
$language["GROUP_IPB_MIRROR"] = "Съответстващо ниво от IPB форума";
$language["IPB_LIST"] = "<b><u>Текущ списък с Групи от базата данни</u></b><br />";
?>