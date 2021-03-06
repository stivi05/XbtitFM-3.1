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
$language["ACP_FORUM"]="Настройки Форума";
$language["ACP_USER_GROUP"]="Настройки Груп";
$language["ACP_STYLES"]="Настройки Стилей";
$language["ACP_LANGUAGES"]="Настройки Языка";
$language["ACP_CATEGORIES"]="Настройки Категорий";
$language["ACP_TRACKER_SETTINGS"]="Настройки Трекера";
$language["ACP_OPTIMIZE_DB"]="Оптимизация БД";
$language["ACP_CENSORED"]="Настройки Цензора";
$language["ACP_DBUTILS"]="БД Утилиты";
$language["ACP_HACKS"]="Хаки";
$language["ACP_HACKS_CONFIG"]="Настройки Хаков";
$language["ACP_MODULES"]="Модули";
$language["ACP_MODULES_CONFIG"]="Настройки Модули";
$language["ACP_MASSPM"]="Массовая рассылка";
$language["ACP_PRUNE_TORRENTS"]="Чистка Торрентов";
$language["ACP_PRUNE_USERS"]="Чистка Пользователей";
$language["ACP_SITE_LOG"]="Посмотреть Лог сайта";
$language["ACP_SEARCH_DIFF"]="Поиск отличий";
$language["ACP_BLOCKS"]="Настройки Блоков";
$language["ACP_POLLS"]="Настройки Опроса";
$language["ACP_MENU"]="Меню Админа";
$language["ACP_FRONTEND"]="Настройки Контента";
$language["ACP_USERS_TOOLS"]="Утилиты Пользователей";
$language["ACP_TORRENTS_TOOLS"]="Утилиты Торрентов";
$language["ACP_OTHER_TOOLS"]="Другие Утилиты";
$language["ACP_MYSQL_STATS"]="Статистика БД";
$language["XBTT_BACKEND"]="xbtt Опции";
$language["XBTT_USE"]="Use <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">xbtt</a> как бэкэнд?";
$language["XBTT_URL"]="xbtt основной url e.g. http://localhost:2710";
$language["GENERAL_SETTINGS"]="Главные настройки";
$language["TRACKER_NAME"]="Имя сайта";
$language["TRACKER_BASEURL"]="Главный адресс трекера (без / в конце)";
$language["TRACKER_ANNOUNCE"]="Адреса анонсов трекера (по одному в строке)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Проверте ваши анонсы дважды, Вы включаете xbtt бэкэнд...</span>":"");
$language["TRACKER_EMAIL"]="E-mail трекера/владельца";
$language["TORRENT_FOLDER"]="Папка Торрентов";
$language["ALLOW_EXTERNAL"]="Разрешить внешние торренты";
$language["ALLOW_GZIP"]="включен GZIP";
$language["ALLOW_DEBUG"]="Показывать инфо дебагера в низу страницы";
$language["ALLOW_DHT"]="Отключить DHT (флаг привата в торренте)<br />\nбудет установленно только на новых торрентах";
$language["ALLOW_LIVESTATS"]="Включить \"Живую\" статистику (может сильно нагружать сервер!)";
$language["ALLOW_SITELOG"]="Включить стандартный лог сайта (лог при изменение в торрентах/пользователях)";
$language["ALLOW_HISTORY"]="Включить стандартную историю (торрентыяпользователи)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Приватный Анонс";
$language["ALLOW_PRIVATE_SCRAPE"]="Приватный Скрейп";
$language["SHOW_UPLOADER"]="Показывать Ник загружающего";
$language["USE_POPUP"]="Использовать поп-ап в деталях/пирах торрентов";
$language["DEFAULT_LANGUAGE"]="Язык по умолчанию";
$language["DEFAULT_CHARSET"]="Кодировка по умолчанию<br />\n(если возникли проблемы с кодировкой , попробуйте UTF-8)";
$language["DEFAULT_STYLE"]="Стиль по умолчанию";
$language["MAX_USERS"]="Максимальное кол-во пользователей (0 = без лимита)";
$language["MAX_TORRENTS_PER_PAGE"]="Торрентов на странице";
$language["SPECIFIC_SETTINGS"]="Спец. настройки трекера";
$language["SETTING_INTERVAL_SANITY"]="Интервал Санити (в секундах, 0 = выкл.)<br />Хорошее значение 1800 (30 минут)";
$language["SETTING_INTERVAL_EXTERNAL"]="Интервал внешнего обновления (в секундах, 0 = выкл.)<br />Зависит от кол-ва внешних торрентов";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Максимальный интервал реанонса (в секундах)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Минимальный интервал реанонса (в секундах)";
$language["SETTING_MAX_PEERS"]="Макс. число пиров при запросе";
$language["SETTING_DYNAMIC"]="Разрешить динамические торренты (не рекомендуется)";
$language["SETTING_NAT_CHECK"]="NAT проверка";
$language["SETTING_PERSISTENT_DB"]="Постоянное соединение к БД (не рекомендуется)";
$language["SETTING_OVERRIDE_IP"]="Разрешать пользователям Маскировать ip";
$language["SETTING_CALCULATE_SPEED"]="Подсчитывать скорость и скачанные байты";
$language["SETTING_PEER_CACHING"]="Кэш таблиц (должно не много уменьшить нагрузку)";
$language["SETTING_SEEDS_PID"]="Макс. число сидов с одинаковым PIDом";
$language["SETTING_LEECHERS_PID"]="Макс. число пиров с одинаковым PIDом";
$language["SETTING_VALIDATION"]="Модель проверки";
$language["SETTING_CAPTCHA"]="Безопасная регистрация (использование ImageCode, требуются GD+Freetype библиотеки)";
$language["SETTING_FORUM"]="Адресс форума, может быть:<br /><li><font color='#FF0000'>внитренним</font> или пустым для внутреннего форума</li><li><font color='#FF0000'>smf</font> для интегрированного <a target='_new' href='http://www.simplemachines.org'>Simple Machines Forum</a></li><li>Другой форум (укажите путь)</li>";
$language["BLOCKS_SETTING"]="Натсройки страниц/блоков";
$language["SETTING_CLOCK"]="тип Часов";
$language["SETTING_NUM_NEWS"]="Лимит для блока последних новостей";
$language["SETTING_NUM_POSTS"]="Лимит для блока форума";
$language["SETTING_NUM_LASTTORRENTS"]="Лимит для блока последних торрентов";
$language["SETTING_NUM_TOPTORRENTS"]="Лимит для блока популярных торрентов";
$language["CLOCK_ANALOG"]="Аналоговые";
$language["CLOCK_DIGITAL"]="Дигитальные";
$language["CONFIG_SAVED"]="Настройки были успешно сохранены!";
$language["CACHE_SITE"]="Интервал кэша (в секундах, 0 = выкл.)";
$language["ALL_FIELDS_REQUIRED"]="Все поля обязательны к заполнению!";
$language["SETTING_CUT_LONG_NAME"]="Обрезать имена торрентов до Х символов (0 = не обрезать)";
$language["MAILER_SETTINGS"]="Мейлер";
$language["SETTING_MAIL_TYPE"]="Тип Мыла";
$language["SETTING_SMTP_SERVER"]="SMTP Сервер";
$language["SETTING_SMTP_PORT"]="SMTP порт";
$language["SETTING_SMTP_USERNAME"]="SMTP Пользователь";
$language["SETTING_SMTP_PASSWORD"]="SMTP Пароль";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="SMTP Пароль (еще раз)";
$language["XBTT_TABLES_ERROR"]="Вы должны импортировать xbtt таблицы в БД до активации xbtt бэкэнда (смотрите инструкцию по инсталяции xbtt)!";
$language["XBTT_URL_ERROR"]="xbtt главный url обязателен!";
// BAN FORM
$language["BAN_NOTE"]="В этой части панели Вы можете видеть забаненые IP адресса и банить новые.";
$language["BAN_NOIP"]="Забаненых ажрессов нету";
$language["BAN_FIRSTIP"]="первый IP";
$language["BAN_LASTIP"]="последний IP";
$language["BAN_COMMENTS"]="Коментарии";
$language["BAN_REMOVE"]="Убрать";
$language["BAN_BY"]="От";
$language["BAN_ADDED"]="Дата";
$language["BAN_INSERT"]="Добавить забаненые IP";
$language["BAN_IP_ERROR"]="Некорректный IP адресс.";
$language["BAN_NO_IP_WRITE"]="Вы не вписали IP адресс!";
$language["BAN_DELETED"]="Адрессы были удалены из БД.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Назад</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Настройки Языков";
$language["LANGUAGE"]="Язык";
$language["LANGUAGE_ADD"]="Добавить новый язык";
$language["LANGUAGE_SAVED"]="Поздравляем, язык был модифицирован";
// STYLES
$language["STYLE_SETTINGS"]="Настройки Стиля/Темы";
$language["STYLE_EDIT"]="Редактировать Стиль";
$language["STYLE_ADD"]="Добавить Стиль";
$language["STYLE_NAME"]="Имя стиля";
$language["STYLE_URL"]="Адресс Стиля";
$language["STYLE_FOLDER"]="Папка стилей";
$language["STYLE_NOTE"]="В этой секции Вы можете модифицировать настройки Стилей, но файлы Вы должны загрузить по ftp или sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Настройки Категорий";
$language["CATEGORY_IMAGE"]="Картинка Категории";
$language["CATEGORY_ADD"]="Добавить категорию";
$language["CATEGORY_SORT_INDEX"]="Индекс";
$language["CATEGORY_FULL"]="Категория";
$language["CATEGORY_EDIT"]="Редактировать Категорию";
$language["CATEGORY_SUB"]="Под категория";
$language["CATEGORY_NAME"]="Категория";
// CENSORED
$language["CENSORED_NOTE"]="Напишите <b>по одному слову в строке</b> для его блокирования (слова будут менятся на *censored*)";
$language["CENSORED_EDIT"]="Редактировать Цензуру";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Конфигурация Блока";
$language["ENABLED"]="Включено";
$language["ORDER"]="Сортировка";
$language["BLOCK_NAME"]="Имя Блоков";
$language["BLOCK_POSITION"]="Позиция";
$language["BLOCK_TITLE"]="Язык титла (будет использован для перевода титлов)";
$language["BLOCK_USE_CACHE"]="Кэшировать этот блок?";
$language["ERR_BLOCK_NAME"]="Вы должны выбрать один из файлов в выподающем меню!";
$language["BLOCK_ADD_NEW"]="Добавить блок";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Конфигурация Опроса";
$language["POLLID"]="Номер Опроса";
$language["INSERT_NEW_POLL"]="Добавить Опрос";
$language["CANT_FIND_POLL"]="Не могу найти Опрос";
$language["ADD_NEW_POLL"]="Добавить Опрос";
// GROUPS
$language["USER_GROUPS"]="Настройки груп пользователей (нажмите на имя для редактирования)";
$language["VIEW_EDIT_DEL"]="Смотреть/Редактировать/Удалить";
$language["CANT_DELETE_GROUP"]="Этот Уровень/Группа не может быть отменена!";
$language["GROUP_NAME"]="Имя группы";
$language["GROUP_VIEW_NEWS"]="Смотреть новости";
$language["GROUP_VIEW_FORUM"]="Смотреть форум";
$language["GROUP_EDIT_FORUM"]="Редактировать форум";
$language["GROUP_BASE_LEVEL"]="Выберети начальный уровень";
$language["GROUP_ERR_BASE_SEL"]="Ошибка при выборе уровня!";
$language["GROUP_DELETE_NEWS"]="Удалить новости";
$language["GROUP_PCOLOR"]="Цвет Преффикса (как ";
$language["GROUP_SCOLOR"]="Цвет Сиффикса (как ";
$language["GROUP_VIEW_TORR"]="Смотреть торренты";
$language["GROUP_EDIT_TORR"]="Редактировать торренты";
$language["GROUP_VIEW_USERS"]="Смотреть пользователей";
$language["GROUP_DELETE_TORR"]="Удалять торренты";
$language["GROUP_EDIT_USERS"]="Редактировать пользователей";
$language["GROUP_DOWNLOAD"]="Может качать";
$language["GROUP_DELETE_USERS"]="Удалять пользователей";
$language["GROUP_DELETE_FORUM"]="Удалять форум";
$language["GROUP_GO_CP"]="Может заходить в Админку";
$language["GROUP_EDIT_NEWS"]="Редактировать новости";
$language["GROUP_ADD_NEW"]="Добавлять новые группы";
$language["GROUP_UPLOAD"]="Может загружать";
$language["GROUP_WT"]="Время задержки если рейтинг <1";
$language["GROUP_EDIT_GROUP"]="Редактировать Группу";
$language["GROUP_VIEW"]="Смотреть";
$language["GROUP_EDIT"]="Редакт.";
$language["GROUP_DELETE"]="Удалить";
$language["INSERT_USER_GROUP"]="Вставить новую группу";
$language["ERR_CANT_FIND_GROUP"]="Не могу найти группу!";
$language["GROUP_DELETED"]="Эта группа была удалена!";
// MASS PM
$language["USERS_FOUND"]="пользователей найдено";
$language["USERS_PMED"]="Пользователи оповещены";
$language["WHO_PM"]="Кому желаете послать ЛС?";
$language["MASS_SENT"]="Массовая рассылка отослана!!!";
$language["MASS_PM"]="Массовая рассылка";
$language["MASS_PM_ERROR"]="Было бы хорошей идеей написать что-нибудь перед отправкой!!!!";
$language["RATIO_ONLY"]="только этот рейтинг";
$language["RATIO_GREAT"]="больше чем этот рейтинг";
$language["RATIO_LOW"]="меньше чем этот рейтинг";
$language["RATIO_FROM"]="От";
$language["RATIO_TO"]="Кому";
$language["MASSPM_INFO"]="Инфо";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Заблокированые пользователи";
$language["PRUNE_USERS"]="Блокировать пользователей";
$language["PRUNE_USERS_INFO"]="Введите кол-во дней после которого пользователь будет помечен как \"неактивный\".";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Поиск Различий.";
$language["SEARCH_DIFF_MESSAGE"]="Сообщение";
$language["DIFFERENCE"]="Разница";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Изменить группу";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Заблокированные торренты";
$language["PRUNE_TORRENTS"]="Блокировать торренты";
$language["PRUNE_TORRENTS_INFO"]="Введите кол-во дней после которых торрент будет помечен как \"неактивный\"";
$language["LEECHERS"]="личер(ов)";
$language["SEEDS"]="сид(ов)";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Имя таблицы";
$language["DBUTILS_RECORDS"]="Записей";
$language["DBUTILS_DATALENGTH"]="Длинна данных";
$language["DBUTILS_OVERHEAD"]="Перебор";
$language["DBUTILS_REPAIR"]="Исправить";
$language["DBUTILS_OPTIMIZE"]="оптимизировать";
$language["DBUTILS_ANALYSE"]="Анализировать";
$language["DBUTILS_CHECK"]="Проверить";
$language["DBUTILS_DELETE"]="Удалить";
$language["DBUTILS_OPERATION"]="операции";
$language["DBUTILS_INFO"]="Инфо";
$language["DBUTILS_STATUS"]="Статус";
$language["DBUTILS_TABLES"]="Таблицы";
// MYSQL STATUS
$language["MYSQL_STATUS"]="MySQL Статус";
// SITE LOG
$language["SITE_LOG"]="Лог сайта";
// FORUMS
$language["FORUM_MIN_CREATE"]="Мин. Класс для создания";
$language["FORUM_MIN_WRITE"]="Мин. Класс для ответа";
$language["FORUM_MIN_READ"]="Мин. Класс для чтения";
$language["FORUM_SETTINGS"]="Настройки Форумов";
$language["FORUM_EDIT"]="Редактировать Форум";
$language["FORUM_ADD_NEW"]="Добавить Форум";
$language["FORUM_PARENT"]="Зависимость Форума";
$language["FORUM_SORRY_PARENT"]="(Извените, я не могу иметь зависимостей, т.к. я сам зависим)";
$language["FORUM_PRUNE_1"]="В этом форуме есть топики/посты!<br />Они будут удалены...<br />";
$language["FORUM_PRUNE_2"]="Если Вы уверены в отмене форума";
$language["FORUM_PRUNE_3"]="иначе вернитесь назад.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Вы не можете удалить форум имеющий зависимости, перенесите зависимости и попробуйте еще раз";
// MODULES
$language["ADD_NEW_MODULE"]="Добавить модуль";
$language["TYPE"]="Тип";
$language["DATE_CHANGED"]="Дата изменения";
$language["DATE_CREATED"]="Дата создания";
$language["ACTIVE_MODULES"]="Активные модули: ";
$language["NOT_ACTIVE_MODULES"]="Неативные модули: ";
$language["TOTAL_MODULES"]="Всего модулей: ";
$language["DEACTIVATE"]="Выключить";
$language["ACTIVATE"]="Включить";
$language["STAFF"]="Staff";
$language["MISC"]="Miscellaneous";
$language["TORRENT"]="Торрент";
$language["STYLE"]="Стиль";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Титл";
$language["HACK_VERSION"]="Версия";
$language["HACK_AUTHOR"]="Автор";
$language["HACK_ADDED"]="Добавлен";
$language["HACK_NONE"]="Нет установленных хаков";
$language["HACK_ADD_NEW"]="Добавить хак";
$language["HACK_SELECT"]="Выбрать";
$language["HACK_STATUS"]="Статус";
$language["HACK_INSTALL"]="Установить";
$language["HACK_UNINSTALL"]="Удалить";
$language["HACK_INSTALLED_OK"]="Хак удачно установлен!<br />\nДля просмотра установленных хаков вернитесь назад <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">Админка (Хаки)</a>";
$language["HACK_BAD_ID"]="Ошибка при получении информации от хака с этим ID.";
$language["HACK_UNINSTALLED_OK"]="Хак был удачно удален!<br />\nДля просмотра установленных хаков вернитесь назад <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">Админка (Хаки)</a>";
// USERS TOOLS
$language["USER_NOT_DELETE"]="Вы не можете удалить гостя или себя самого!";
$language["USER_NOT_EDIT"]="Вы не можете редактировать гостя или себя самого!";
?>