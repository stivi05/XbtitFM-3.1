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
$language['ACP_BAN_IP']='IPsحظر الـ';
$language['ACP_FORUM']='اعدادت المنتدى';
$language['ACP_USER_GROUP']='اعدادت مجمواعات الاعضاء';
$language['ACP_STYLES']='اعدادت الاشكال';
$language['ACP_LANGUAGES']='اعدادت اللغة';
$language['ACP_CATEGORIES']='اعدادت الاقسام';
$language['ACP_TRACKER_SETTINGS']='اعدادت المتتبع';
$language['ACP_OPTIMIZE_DB']='تحسين قاعدة البيانات';
$language['ACP_CENSORED']='اعدادت متحسس الكلمات';
$language['ACP_DBUTILS']='ادوات قاعدة البيانات';
$language['ACP_HACKS']='الاضافات';
$language['ACP_HACKS_CONFIG']='اعدادت الاضافات';
$language['ACP_MODULES']='الوحدات';
$language['ACP_MODULES_CONFIG']='اعدادت الوحدات';
$language['ACP_MASSPM']='رسالة جماعية خاصة';
$language['ACP_PRUNE_TORRENTS']='تهذيب التورينتات';
$language['ACP_PRUNE_USERS']='تهذيب المستخدمين';
$language['ACP_SITE_LOG']='اضهر سجل الموقع';
$language['ACP_SEARCH_DIFF']='Search Diff.';
$language['ACP_BLOCKS']='اعدادت البلوك';
$language['ACP_POLLS']='اعدادت الاستفتاء';
$language['ACP_MENU']='قائمة المشرف';
$language['ACP_FRONTEND']='اعدادت المحتويات';
$language['ACP_USERS_TOOLS']='ادوات المستخدم';
$language['ACP_TORRENTS_TOOLS']='ادوات التورينت';
$language['ACP_OTHER_TOOLS']='ادوات اخرى';
$language['ACP_MYSQL_STATS']='MySql احصائيات';
$language['XBTT_BACKEND']='xbtt خيارات';
$language['XBTT_USE']='استعمل <a href="http://xbtt.sourceforge.net/tracker/" target="_blank">xbtt</a> كمحرك خلفي';
$language['XBTT_URL']='وصلة اكس بيتيت الجذري e.g. http://localhost:2710';
$language['GENERAL_SETTINGS']='اعدادت عامة';
$language['TRACKER_NAME']='اسم الموقع';
$language['TRACKER_BASEURL']='عنوان الموقع بدون الشرطه/ الاخيرة';
$language['TRACKER_ANNOUNCE']=',وصلة معلن التراكر، وصلة لكل سطر'.($XBTT_USE?'<br />'."\n".'<تt-weight: bold;">تاكد من معلن التراكر مرتين لقد قمت بتفعيل المحرك الخلفي</span>':'');
$language['TRACKER_EMAIL']='بريد التراكر والمدير';
$language['TORRENT_FOLDER']='مجلد التورينتات';
$language['ALLOW_EXTERNAL']='السماح بالتورينتات الخارجية';
$language['ALLOW_GZIP']='GZIPالسماح بالـ';
$language['ALLOW_DEBUG']='عرض معلومات التدقيق في اسفل الصفحة';
$language['ALLOW_DHT']='تعطيل الدي اتش تي (علم التورينت الخاص) <br />'."\n".'سيتم تحديد الامر للتورينتات الجديدة المرفوعة';
$language['ALLOW_LIVESTATS']='تفعيل الاحصائيات الحيبة(تحذير الكثير من الحمل على الخادم)';
$language['ALLOW_SITELOG']='تفعيل سجل الموقع المبسط(تسجيل التغيرات للتورنتات والاعضاء)';
$language['ALLOW_HISTORY']='تفعيل التاريخ المبسط للتورينتات- الاعضاء';
$language['ALLOW_PRIVATE_ANNOUNCE']='إعلان خاص';
$language['ALLOW_PRIVATE_SCRAPE']='القشط الخاص';
$language['SHOW_UPLOADER']='اظهار اسم الرافع';
$language['USE_POPUP']='اظهار معلومات المتصلين/التورينت بنافذة جديدة';
$language['DEFAULT_LANGUAGE']='اللغة الافتراضية';
$language['DEFAULT_CHARSET']='التشفير الافتراضي<br />'."\n".'(اذا لم تعرض لغتك بشكل مناسب جرب UTF-8)';
$language['DEFAULT_STYLE']='التنسيق الافتراضي';
$language['MAX_USERS']='عدد المستخدمين (الرقم صفر يعني لا يوجد اي حد)';
$language['MAX_TORRENTS_PER_PAGE']='التورينتات لكل صفحة';
$language['SPECIFIC_SETTINGS']='اعدادت التراكر';
$language['SETTING_INTERVAL_SANITY']='نسبة التاكد من صحة التراكر (numeric seconds, 0 = معطل)<br />القيمة الافضل هيا 1800 (30 minutes)';
$language['SETTING_INTERVAL_EXTERNAL']='نسبة تحديث التورينت الخارجي (numeric seconds, 0 = معطل)<br />على حسب عدد التورينتات الخارجية';
$language['SETTING_INTERVAL_MAX_REANNOUNCE']='الاقصى لاعادة الاعلان (numeric seconds)';
$language['SETTING_INTERVAL_MIN_REANNOUNCE']='الادنى لاعادة الاعلان (numeric seconds)';
$language['SETTING_MAX_PEERS']='العدد الاقصى لمقدمين الطلب (numeric)';
$language['SETTING_DYNAMIC']='تفعيل التورينتات الحيوية(دينامك) (غير منصوح به)';
$language['SETTING_NAT_CHECK']='NAT فحص الجدار الناري';
$language['SETTING_PERSISTENT_DB']='الاتصال المتكرر (لقاعدة البيانات غير مستحسن)';
$language['SETTING_OVERRIDE_IP']='السماح للمستخدم بتجوز الاي بي';
$language['SETTING_CALCULATE_SPEED']='حسابة سرعة الرفع والتنزيل';
$language['SETTING_PEER_CACHING']='تخزين الجداول (يقلل من الضغط على قواعد البيانات)';
$language['SETTING_SEEDS_PID']='عدد الناثرين بنفس الرقم الخاص';
$language['SETTING_LEECHERS_PID']='عدد المستنزفين بنفس الرقم الخاص';
$language['SETTING_VALIDATION']='طريقة التحقق';
$language['SETTING_CAPTCHA']='التسجيل عن طريق تاكيد الصورة (use ImageCode, GD+Freetype تحتاج الى مكتبات)';
$language['SETTING_FORUM']='وصلة المنتدى يمكن:<br /><li><font color="#FF0000">داخلي</font> فاضي بدون قيمة للمنتدى الداخلي</li><li><font color="#FF0000">smf</font> للخارجي <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a></li><li>منتدى آخر قم بتحديده</li>';
$language['BLOCKS_SETTING']='Index/Blocks اعدادت';
$language['SETTING_CLOCK']='نوع الساعة';
$language['SETTING_FORUMBLOCK']='نوع كتلة المنتدى';
$language['SETTING_NUM_NEWS']='عدد آخر الاخبار لكتلة الاخبار';
$language['SETTING_NUM_POSTS']='عدد مواضيع المنتدى لكتلة المنتدى';
$language['SETTING_NUM_LASTTORRENTS']='عدد آخر التورينتات لكتلة التورينت';
$language['SETTING_NUM_TOPTORRENTS']='عدد مشاهير التورينتات لكتلة التورينت';
$language['CLOCK_ANALOG']='تناظري';
$language['CLOCK_DIGITAL']='رقمي';
$language['FORUMBLOCK_POSTS']='آخر مشاركات';
$language['FORUMBLOCK_TOPICS']='آخر موضوع نشط';
$language['CONFIG_SAVED']='تم حفظ الاعدادت بنجاح';
$language['CACHE_SITE']='فترة التخزين (numeric seconds, 0 = disabled)';
$language['ALL_FIELDS_REQUIRED']='كل الحقول مطلوبة';
$language['SETTING_CUT_LONG_NAME']='اقطع اسم التورينت بعد عدد معين من الحروف(القيمة صفر تعني تعطيل الخاصية)';
$language['MAILER_SETTINGS']='البريدي';
$language['SETTING_MAIL_TYPE']='نعوع البريد';
$language['SETTING_SMTP_SERVER']='SMTP خادم';
$language['SETTING_SMTP_PORT']='SMTP منفذ';
$language['SETTING_SMTP_USERNAME']='SMTP اسم مستخدم';
$language['SETTING_SMTP_PASSWORD']='SMTP كلمة سر';
$language['SETTING_SMTP_PASSWORD_REPEAT']='SMTP تكرار كلمة السر';
$language['XBTT_TABLES_ERROR']='عليك استيراد قاعدة البيانات قبل تفغيل خلفية اكس بيتيت';
$language['XBTT_URL_ERROR']='وصلة اكس بيتيت الجذرية ملزمة';
// BAN FORM
$language['BAN_NOTE']='هنا يمكنك ان تمنع رقم معين من الاي بي او نطاق ارقام';
$language['BAN_NOIP']='لا توجد ارقام اي بي ممنوعة';
$language['BAN_FIRSTIP']='رقم الاي بي الاول';
$language['BAN_LASTIP']='رقم الاي بي الاخير';
$language['BAN_COMMENTS']='ملاحظات';
$language['BAN_REMOVE']='ازالة';
$language['BAN_BY']='من';
$language['BAN_ADDED']='التاريخ';
$language['BAN_INSERT']='ادخال نطاف اي بيات';
$language['BAN_IP_ERROR']='رقم اي بي باطل';
$language['BAN_NO_IP_WRITE']='لم تكتب رقم اي بي';
$language['BAN_DELETED']='تم ازال نطاق الاي بيات من قاعدة البيانات<br />'."\n".'<br />'."\n".'<a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=banip&amp;action=read">عد الى ادارت منع الاي بي</a>';
// LANGUAGES
$language['LANGUAGE_SETTINGS']='اعدادت اللغة';
$language['LANGUAGE']='اللغة';
$language['LANGUAGE_ADD']='اضافة لغة جديدة';
$language['LANGUAGE_SAVED']='مبروك تم اضافة اللغة';
// STYLES
$language['STYLE_SETTINGS']='اعدادت التنسيق';
$language['STYLE_EDIT']='تحرير التنسيق';
$language['STYLE_ADD']='‘ضافة تنسيق جديد';
$language['STYLE_NAME']='اسم التنسيق';
$language['STYLE_URL']='وصلة التنسيق';
$language['STYLE_FOLDER']='مجلد التنسيق';
$language['STYLE_NOTE']='يمكنك هنا تعديل التنسيقات ولكن عليك رفع اي تنسيق تريد ان تضيفه';
// CATEGORIES
$language['CATEGORY_SETTINGS']='اعدادت الاقسام';
$language['CATEGORY_IMAGE']='صورة القسم';
$language['CATEGORY_ADD']='اضافة تقسيم';
$language['CATEGORY_SORT_INDEX']='ترتيب التقسيم';
$language['CATEGORY_FULL']='التقسيم';
$language['CATEGORY_EDIT']='تحرير التقسيم';
$language['CATEGORY_SUB']='تقسيم فرعي';
$language['CATEGORY_NAME']='التقسيم';
// CENSORED
$language['CENSORED_NOTE']='اكتب  <b>كلمة في كل سطر</b> لمنعها سوف يتم تغيير الكلمة الى *';
$language['CENSORED_EDIT']='تحرير الكلمات الممنوعة';
// BLOCKS
$language['BLOCKS_SETTINGS']='تحرير الكتل';
$language['ENABLED']='تفغيل';
$language['ORDER']='ترتيب';
$language['BLOCK_NAME']='اسم الكتلة';
$language['BLOCK_POSITION']='موقع الكتلة';
$language['BLOCK_TITLE']='متغير اللغوي للكتلة (تستعمل من ملف اللغة)';
$language['BLOCK_USE_CACHE']='قم بتخزين الكتلة';
$language['ERR_BLOCK_NAME']='عليك اختيار واحد من الملفات في القائمة المنسدلة';
$language['BLOCK_ADD_NEW']='اضف كتلة جديدة';
// POLLS (more in lang_polls.php)
$language['POLLS_SETTINGS']='اعدادت التصويت';
$language['POLLID']='معرف الاقتراع';
$language['INSERT_NEW_POLL']='اضف اقتراع جديد';
$language['CANT_FIND_POLL']='لا يمكن ايجاد الاقتراع';
$language['ADD_NEW_POLL']='اضافة اقتراع';
// GROUPS
$language['USER_GROUPS']='اعدادت مجموعات الاعضاء (اكبس على المجموعة للتعديل عل';
$language['VIEW_EDIT_DEL']='عرض/تحرير/حذف';
$language['CANT_DELETE_GROUP']='لا يمكن حذف هذه المجموعة';
$language['GROUP_NAME']='اسم المجموعة';
$language['GROUP_VIEW_NEWS']='عرض الاخبار';
$language['GROUP_VIEW_FORUM']='عرض المنتدى';
$language['GROUP_EDIT_FORUM']='تحرير المنتدى';
$language['GROUP_BASE_LEVEL']='اختيار المستوى الاساسي';
$language['GROUP_ERR_BASE_SEL']='خطاء في المستوى الاساسي';
$language['GROUP_DELETE_NEWS']='الغاء الاخبار';
$language['GROUP_PCOLOR']='بادئة اللون (مثل ';
$language['GROUP_SCOLOR']='خاتمة اللون (مثل ';
$language['GROUP_VIEW_TORR']='عرض التورينت';
$language['GROUP_EDIT_TORR']='تحرير التورينتات';
$language['GROUP_VIEW_USERS']='عرض الاعضاء';
$language['GROUP_DELETE_TORR']='الغاء التورينت';
$language['GROUP_EDIT_USERS']='تحرير الاعضاء';
$language['GROUP_DOWNLOAD']='يمكنه التحميل';
$language['GROUP_DELETE_USERS']='الغاء الاعضاء';
$language['GROUP_DELETE_FORUM']='الغاء المنتديات';
$language['GROUP_GO_CP']='دخول الاشراف';
$language['GROUP_EDIT_NEWS']='تحرير الاخبار';
$language['GROUP_ADD_NEW']='اضافة مجموعة جديدة';
$language['GROUP_UPLOAD']='يمكنه الرفع';
$language['GROUP_WT']='وقت الانتظار اذا كانت النسبة <1';
$language['GROUP_EDIT_GROUP']='تحرير المجموعات';
$language['GROUP_VIEW']='عرض';
$language['GROUP_EDIT']='تحرير';
$language['GROUP_DELETE']='حذف';
$language['INSERT_USER_GROUP']='اضف مجموعة مستخدمين جديدة';
$language['ERR_CANT_FIND_GROUP']='لا يمكن العثور على هذه المجموعة';
$language['GROUP_DELETED']='تم الغاء هذه المجموعة';
// MASS PM
$language['USERS_FOUND']='وجد المستخدمون';
$language['USERS_PMED']='رُسل المستخدمين';
$language['WHO_PM']='لمن سترسل الرسالة';
$language['MASS_SENT']='الرسالة الجماعية ارسلة';
$language['MASS_PM']='رسالة جماعية';
$language['MASS_PM_ERROR']='من المستحسن كتابة شيئ قبل الارسال';
$language['RATIO_ONLY']='اصحاب هذه النسبة فقط';
$language['RATIO_GREAT']='كل من هو فوق هذه النسبة';
$language['RATIO_LOW']='كل من هو تحت هذه النسبة';
$language['RATIO_FROM']='من';
$language['RATIO_TO']='الى';
$language['MASSPM_INFO']='النص';
// PRUNE USERS
$language['PRUNE_USERS_PRUNED']='تهذيب المستخدمين';
$language['PRUNE_USERS']='هذب المستخدمين';
$language['PRUNE_USERS_INFO']='ادخل عدد الايام الذي يعتبر بها المستخد ميت في الموقع ليتم مسحه)';
// SEARCH DIFF
$language['SEARCH_DIFF']='البحث';
$language['SEARCH_DIFF_MESSAGE']='الرسالة';
$language['DIFFERENCE']='الفرق';
$language['SEARCH_DIFF_CHANGE_GROUP']='تغيير مجموعة المستخدمين';
// PRUNE TORRENTS
$language['PRUNE_TORRENTS_PRUNED']='تهذيب التورينتات';
$language['PRUNE_TORRENTS']='هذب التورينتات';
$language['PRUNE_TORRENTS_INFO']='ادخل عدد الايام التي يعتبر بها التورينت ميت';
$language['LEECHERS']='مسنتزفين';
$language['SEEDS']='موزعين';
// DBUTILS
$language['DBUTILS_TABLENAME']='اسم الجدول';
$language['DBUTILS_RECORDS']='السجلات';
$language['DBUTILS_DATALENGTH']='طول البيانات';
$language['DBUTILS_OVERHEAD']='القائمة';
$language['DBUTILS_REPAIR']='تصليح';
$language['DBUTILS_OPTIMIZE']='تحسين';
$language['DBUTILS_ANALYSE']='تحليل';
$language['DBUTILS_CHECK']='فحص';
$language['DBUTILS_DELETE']='الغاء';
$language['DBUTILS_OPERATION']='العملية';
$language['DBUTILS_INFO']='معلومة';
$language['DBUTILS_STATUS']='الحالة';
$language['DBUTILS_TABLES']='الجداول';
// MYSQL STATUS
$language['MYSQL_STATUS']='MySQL حالة';
// SITE LOG
$language['SITE_LOG']='سجل الموقع';
// FORUMS
$language['FORUM_MIN_CREATE']='ادنى مجموعة للانشاء';
$language['FORUM_MIN_WRITE']='ادنى مجموعة للكتابة';
$language['FORUM_MIN_READ']='ادنى مجموعة للقراءة';
$language['FORUM_SETTINGS']='اعدادت المنتدى';
$language['FORUM_EDIT']='تحرير المنتدى';
$language['FORUM_ADD_NEW']='اضافة منتدى';
$language['FORUM_PARENT']='المنتدى الرسمي';
$language['FORUM_SORRY_PARENT']='(لا يمكن ان اكون منتدى فرعي لاني منتدى اساسي)';
$language['FORUM_PRUNE_1']='هناك مشاركات في المنتدى .ستخسر كل المشاركات';
$language['FORUM_PRUNE_2']='اذا كنت متاكد من حذف المنتدى';
$language['FORUM_PRUNE_3']='او عد الى الخلف';
$language['FORUM_ERR_CANNOT_DELETE_PARENT']='لا يمكنك حذف هذا المنتدى لان لديه منديات فرعية قم بنقل المنتديات ثم اعد المحاولة';
// MODULES
$language['ADD_NEW_MODULE']='اضافة وحدة جديدة';
$language['TYPE']='النوع';
$language['DATE_CHANGED']='تاريخ التغيير';
$language['DATE_CREATED']='تاريخ الانشاء';
$language['ACTIVE_MODULES']='الوحدات المفعلة ';
$language['NOT_ACTIVE_MODULES']='وحدات معطلة ';
$language['TOTAL_MODULES']='مجموع الوحدات';
$language['DEACTIVATE']='تعطيل';
$language['ACTIVATE']='تفعيل';
$language['STAFF']='الطاقم';
$language['MISC']='متفرقات';
$language['TORRENT']='تورينت';
$language['STYLE']='تنسيق';
$language['ID_MODULE']='معرف';
// HACKS
$language['HACK_TITLE']='العنوان';
$language['HACK_VERSION']='الاصدار';
$language['HACK_AUTHOR']='المبرمج';
$language['HACK_ADDED']='الاضافة';
$language['HACK_NONE']='لا توجد هاكات';
$language['HACK_ADD_NEW']='اضافة هاك جديد';
$language['HACK_SELECT']='تحديد';
$language['HACK_STATUS']='الحالة';
$language['HACK_INSTALL']='تثبيت';
$language['HACK_UNINSTALL']='ازالة';
$language['HACK_INSTALLED_OK']='تم تركيب الهاك بنجاح!<br />'."\n".'لمعرفة الهاكات المركبة اذهب الى <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">لوحة التحكم الهاكات</a>';
$language['HACK_BAD_ID']='خطاء في الحصول على رقم الهاك';
$language['HACK_UNINSTALLED_OK']='تم ازالة الهاك بنجاح<br />'."\n".'لمعرفة الهاكات المركبة اذهب الى <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">لوحة التحكم الهاكات</a>';
$language['HACK_OPERATION']='العملية';
$language['HACK_SOLUTION']='الحل';
// added rev 520
$language['HACK_WHY_FTP']='بعض الملفات التي يحتاج الهاك الى تعديلها لا يمكن الكتابه عليها <br />'."\n".'نحتاج الى معلومات الاف تي بي للدخول وتعديل تلك الملفات <br />'."\n".'قد يتم تخزين معلومات الاف تي بي وقت التركيب';
$language['HACK_FTP_SERVER']='FTP خادم';
$language['HACK_FTP_PORT']='FTP منفذ';
$language['HACK_FTP_USERNAME']='FTP مستخدم';
$language['HACK_FTP_PASSWORD']='FTP كلمة سر';
$language['HACK_FTP_BASEDIR']='المسار الى مجلد التراكر';
// USERS TOOLS
$language['USER_NOT_DELETE']='لا يمكنك ازالة حساب الضيف او حسابك';
$language['USER_NOT_EDIT']='لا يمكنك تحرير حسابك او حساب الزائر';
$language['USER_NOT_DELETE_HIGHER']='لا يمكن حذف مستخدم اعلى منك في الرتبه';
$language['USER_NOT_EDIT_HIGHER']='لا يمكن تحرير معلومات اعضاء اعلى منك في الرتبه';
$language['USER_NO_CHANGE']='لم يتم تطبيق اي تعديل';
//Manual Hack Install
$language['MHI_VIEW_INSRUCT'] = 'اظهار معلومات التثبيت اليدوي';
$language['MHI_MAN_INSRUCT_FOR'] = 'معلومات التثبيت اليدوي لـ';
$language['MHI_RUN_QUERY'] = 'phpMyAdmin قم بتشغيل اوامر الاس كيو ايل في ';
$language['MHI_IN'] = 'في سطر';
$language['MHI_ALSO_IN'] = 'ايضاً في سطر';
$language['MHI_FIND_THIS'] = 'ابحث عن';
$language['MHI_ADD_THIS'] = 'اضف هذا';
$language['MHI_IT'] = 'هي';
$language['MHI_REPLACE'] = 'استبدلها بـ';
$language['MHI_COPY'] = 'نسخ';
$language['MHI_AS'] = 'كا';
?>