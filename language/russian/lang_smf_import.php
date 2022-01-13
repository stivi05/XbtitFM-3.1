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

// smf_import.php language file

$lang[0]="Да";
$lang[1]="Нет";
$lang[2]="<center><u><strong><font size='4' face='Arial'>Шаг 1: Определение зависимостей</font></strong></u></center><br />";
$lang[3]="<center><strong><font face='Arial' size='2'>SMF файлы доступны в\"smf\" папке?<font color='";
$lang[4]="'>&nbsp;&nbsp;&nbsp; ";
$lang[5]="</font></center></strong>";
$lang[6]="<br /><center>Пожалуйста <a target='_new' href='http://www.simplemachines.org/download/'>скачайте SMF</a> и разархивируйте архив а папку \"smf\".<br />Если у Вас нет \"smf\" папки, пожалуйста создайте ее и распакуйте в нее <br />файлы из архива.<br /><br />После загрузки п"; // p at end is an lowercase p for use with $lang[8]
$lang[7]="<br /><center>П"; // P at end is an uppercase p for use with $lang[8]
$lang[8]="ожалуйста установите SMF <a target='_new' href='smf/install.php'>кликнув здесь</a>*<br /><br /><strong>* Пожалуйста Используйте ту же БД которую Вы использовали для XBTIT,<br />префикс можете выбрать любой (кроме того который Вы использовали<br />для трекера)<br /><br />";
$lang[9]="<font color='#0000FF' size='3'>Обновите эту страницу после того как Вы выполните требуемое задание!</font></strong></center>";
$lang[10]="<center><strong>SMF установлен?<font color='";
$lang[11]="Файл не найден!";
$lang[12]="Файл найден, но закрыт для записи!";
$lang[13]="<center><strong>Default SMF English Errors доступен и открыт для записи?<font color='";
$lang[14]="<center><strong>smf.sql доступен в \"sql\" папке?<font color='";
$lang[15]="<br /><center><strong>Языковой файл (";
$lang[16]=")<br />не найден, пожалуйста убедитесь <font color='#FF0000'><u>что все SMF файлы</u></font> были загружены!<br /><br />";
$lang[17]=")<br />закрыт для записи, <font color='#FF0000'><u>пожалуйста CHMOD этот файл в 777</u></font><br /><br />";
$lang[18]="<br /><center><strong>smf.sql не найден, <font color='#FF0000'><u>пожалуйста убедитесь что файл существует в \"sql\" папке.</u></font><br />(Он должен быть включен в XBTIT дистрибутив!)<br /><br />";
$lang[19]="<br /><center>Все зависимости совпали, пожалуйста <a href='";
$lang[20]="'>нажмите чтобы продолжить</a></center>";
$lang[21]="<center><u><strong><font size='4' face='Arial'>Шаг 2: Проверка Установки</font></strong></u></center><br />";
$lang[22]="<center>Теперь когда мы убедилимь что все на своих местах, можем перейдти к изменению БД<br />Чтобы поставить все на свои места для трекера.</center><br />";
$lang[23]="<center><form name=\"db_pwd\" action=\"smf_import.php\" method=\"GET\">Введите пароль БД:&nbsp;<input name=\"pwd\" size=\"20\" /><br />\n<br />\n<strong>пожалуйста <input type=\"submit\" name=\"confirm\" value=\"yes\" size=\"20\" /> чтобы продолжить</strong><input type=\"hidden\" name=\"act\" value=\"init_setup\" /></form></center>";
$lang[24]="<center><u><strong><font size='4' face='Arial'>Шаг 3: Импортирование пользователей в форум</font></strong></u></center><br />";
$lang[25]="<center>Теперь БД установлена правильно можем перейдти к импорту пользователей с трекера в форум,<br />Это может занять некоторое время, зависит от кол-ва пользователей у вас на трекере!<br /><br /><strong>пожалуйста <a href='".$_SERVER["PHP_SELF"]."?act=member_import&amp;confirm=yes'>нажмите здесь</a> чтобы продолжить</center>";
$lang[26]="<center><u><strong><font size='4' face='Arial'>Sorry</font></strong></u></center><br />";
$lang[27]="<center>Извените, этот скрипт должен использоватся один раз, после чего он блокируется от повторного исполнения!</center>";
$lang[28]="<center><br /><strong><font color='#FF0000'><br />";
$lang[29]="</strong></font> Аккаунты в форуме упешно установлены, пожалуйста <a href='".$_SERVER["PHP_SELF"]."?act=import_forum&amp;confirm=no'>нажмите здесь</a> чтобы продолжить</center>";
$lang[30]="<center><u><strong><font size='4' face='Arial'>Шаг 4: Импорт постов форума и вида</font></strong></u></center><br />";
$lang[31]="<center>Это последний шаг, сейчас будут импортированы топики и посты BTI Форума в SMF,<br />они будут импортированы в новую категорию называемую \"My BTI import\",<br />пожалуйста <a href='".$_SERVER["PHP_SELF"]."?act=import_forum&amp;confirm=yes'>нажмите здесь</a> чтобы продолжить</center>";
$lang[32]="<center><u><strong><font size='4' face='Arial'>Импортирование завершено</font></strong></u></center><br />";
$lang[33]="<center><font face=\"Arial\" size=\"2\">Пожалуйста <a target='_new' href='smf/index.php?action=login'>войдите на ваш новый SMF форум</a> используя данные с трекера<br />и пройдите в <strong>Центр Администрации</strong> проверте все неточности, ошибки, зделайте оптимизацию БД.<br /><br /><strong><font color='#0000FF'>После этого Ваш форум будет готов к использованию!</font></strong></font></center>";
$lang[34]="<center><u><strong><font size=\"4\" face=\"Arial\" color=\"#FF0000\">ERROR!</font></strong></u></center><br />\n<br />\n<center><font face=\"Arial\" size=\"3\">Вы ввели не верный пароль или Вы не являетесь владельцем трекера!\n.</font></center>";
$lang[35]="</body>\n</html>\n";
$lang[36]="<center>Не могу записать в:<br /><br /><b>";
$lang[37]="</b><br /><br />Убедитесь что файл доступен для записи и запустите етот скрипт снова.</center>";
$lang[38]="<center><br /><font color=red size=4><b>Доступ закрыт</b></font></center>";
?>