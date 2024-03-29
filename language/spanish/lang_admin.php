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
$language['ACP_BAN_IP']='Banear IPs';
$language['ACP_FORUM']='Configurar Foro';
$language['ACP_USER_GROUP']='Configurar grupos de usuarios';
$language['ACP_STYLES']='Configurar Estilos';
$language['ACP_LANGUAGES']='Configurar Idiomas';
$language['ACP_CATEGORIES']='Configurar Categorias';
$language['ACP_TRACKER_SETTINGS']='Configurar el Tracker';
$language['ACP_OPTIMIZE_DB']='Optimizar Base de Datos';
$language['ACP_CENSORED']='Configurar Palabras Censuradas';
$language['ACP_DBUTILS']='Utilidades de la Base de Datos';
$language['ACP_HACKS']='Hacks';
$language['ACP_HACKS_CONFIG']='Configurar Hacks';
$language['ACP_MODULES']='Modulos';
$language['ACP_MODULES_CONFIG']='Configurar Modulos';
$language['ACP_MASSPM']='Mensaje Privado Masivo';
$language['ACP_PRUNE_TORRENTS']='Eliminar Torrents Inactivos';
$language['ACP_PRUNE_USERS']='Eliminar Usuarios Inactivos';
$language['ACP_SITE_LOG']='Ver Log de la Web';
$language['ACP_SEARCH_DIFF']='Buscar diferencias.';
$language['ACP_BLOCKS']='Configurar Bloques';
$language['ACP_POLLS']='Configurar Encuestas';
$language['ACP_MENU']='Menu de Administraci�n';
$language['ACP_FRONTEND']='Configurar Contenido';
$language['ACP_USERS_TOOLS']='Herramientas de Usuarios';
$language['ACP_TORRENTS_TOOLS']='Herramientas de Torrents';
$language['ACP_OTHER_TOOLS']='Otras Herramientas';
$language['ACP_MYSQL_STATS']='Estad�sticas MySql';
$language['XBTT_BACKEND']='Usar xbtt';
$language['XBTT_USE']='Usa <a href="http://xbtt.sourceforge.net/tracker/" target="_blank">xbtt</a> como backend?';
$language['XBTT_URL']='xbtt url base eg. http://localhost:2710';
$language['GENERAL_SETTINGS']='Configuraci�n General';
$language['TRACKER_NAME']='Nombre de la web';
$language['TRACKER_BASEURL']='URL Base del Tracker (sin el �ltimo /)';
$language['TRACKER_ANNOUNCE']='URL Announce del Tracker (uno por linea)'.($XBTT_USE?'<br />'."\n".'<span style="color:#FF0000; font-weight: bold;">Chequea el URL Announce, tienes activado el xbtt backend...</span>':'');
$language['TRACKER_EMAIL']='Email del propietario del Tracker';
$language['TORRENT_FOLDER']='Carpeta Torrents';
$language['ALLOW_EXTERNAL']='Permitir Torrents Externos';
$language['ALLOW_GZIP']='Activar GZIP';
$language['ALLOW_DEBUG']='Mostrar informaci�n del log en el pie de pagina';
$language['ALLOW_DHT']='Desactivar DHT (el torrent ser�a privado)<br />'."\n".'se establecer� para nuevos torrents';
$language['ALLOW_LIVESTATS']='Activar Estadisticas en directo (atencion, puede causar gran carga en el servidor!)';
$language['ALLOW_SITELOG']='Activar Log basico (el log cambia en torrents/usuarios)';
$language['ALLOW_HISTORY']='Activar Historia B�sica (torrents/usuarios)';
$language['ALLOW_PRIVATE_ANNOUNCE']='Announce Privado';
$language['ALLOW_PRIVATE_SCRAPE']='Scrape Privado';
$language['SHOW_UPLOADER']='Mostar el nick del Uploader';
$language['USE_POPUP']='Usar popup para detalles de torrents/clientes';
$language['DEFAULT_LANGUAGE']='Idioma por defecto';
$language['DEFAULT_CHARSET']='Codificaci�n de Car�cteres por Defecto<br />'."\n".'(si tu idioma no se muestra correctamente prueba UTF-8)';
$language['DEFAULT_STYLE']='Estilo por Defecto';
$language['MAX_USERS']='M�ximo n� de usuarios (en numero, 0 = ilimitado)';
$language['MAX_TORRENTS_PER_PAGE']='Torrents por p�gina';
$language['SPECIFIC_SETTINGS']='Configuraci�n especifica del Tracker';
$language['SETTING_INTERVAL_SANITY']='Intervalo de Salud (en segundos, 0 = desactivado)<br />Un buen valor puede ser 1800 (30 minutos)';
$language['SETTING_INTERVAL_EXTERNAL']='Actualizar Torrents Externos (en segundos, 0 = desactivado)<br />Depende del n� de torrents externos';
$language['SETTING_INTERVAL_MAX_REANNOUNCE']='M�ximo intervalo para reanunciar (en segundos)';
$language['SETTING_INTERVAL_MIN_REANNOUNCE']='M�nimo intervalo para reanunciar (en segundos)';
$language['SETTING_MAX_PEERS']='M�ximo N� de peticiones de clientes (en n�mero)';
$language['SETTING_DYNAMIC']='Permitir Torrents Dinamicos (no recomendado)';
$language['SETTING_NAT_CHECK']='Chequeo de NAT';
$language['SETTING_PERSISTENT_DB']='Conexiones Persistentes (Base de datos, no recomendado)';
$language['SETTING_OVERRIDE_IP']='Permitir a los usuarios anular la deteccion de IP';
$language['SETTING_CALCULATE_SPEED']='Calcular Velocidad y Bytes descargados';
$language['SETTING_PEER_CACHING']='Cache de Tablas (puede disminuir la carga del servidor)';
$language['SETTING_SEEDS_PID']='N� m�ximo de semillas ocn la misma PID';
$language['SETTING_LEECHERS_PID']='N� m�ximo de leechers con el mismo PID';
$language['SETTING_VALIDATION']='Modo de Validaci�n';
$language['SETTING_CAPTCHA']='Registro Seguro (usa ImageCode, Librerias GD+Freetype necesarias)';
$language['SETTING_FORUM']='Enlace del Foro, puede ser:<br /><li><font color="#FF0000">interno</font> o vacio (sin valor) para el foro interno</li><li><font color="#FF0000">smf</font> para el foro integrado <a target="_new" href="http://www.simplemachines.org">Simple Machines</a></li><li>Tu propio foro (especifica la url)</li>';
$language['BLOCKS_SETTING']='Configuraci�n de portada/bloques';
$language['SETTING_CLOCK']='Tipo de Reloj';
$language['SETTING_NUM_NEWS']='Limite para el bloque de ultimas noticias';
$language['SETTING_NUM_POSTS']='Limite para el bloque de foros';
$language['SETTING_NUM_LASTTORRENTS']='Limite para el bloque de ultimos torrents';
$language['SETTING_NUM_TOPTORRENTS']='Limite para el bloque de torrents m�s descargados';
$language['CLOCK_ANALOG']='Anal�gico';
$language['CLOCK_DIGITAL']='Digital';
$language['CONFIG_SAVED']='La configuraci�n se ha guardado!';
$language['CACHE_SITE']='Intervalo de Cache (en segundos, 0 = desactivado)';
$language['ALL_FIELDS_REQUIRED']='Todos los campos son obligatorios!';
$language['SETTING_CUT_LONG_NAME']='Cortar el nombre de los torrents despu�s de x caracteres (0 = desactivado)';
$language['MAILER_SETTINGS']='Envio de Emails';
$language['SETTING_MAIL_TYPE']='Tipo de Email';
$language['SETTING_SMTP_SERVER']='Servidor SMTP';
$language['SETTING_SMTP_PORT']='Puerto SMTP';
$language['SETTING_SMTP_USERNAME']='Usuario SMTP';
$language['SETTING_SMTP_PASSWORD']='Contrase�a SMTP';
$language['SETTING_SMTP_PASSWORD_REPEAT']='Repetir Contrase�a SMTP';
$language['XBTT_TABLES_ERROR']='Debes importar las tablas xbtt (mira las instrucciones) en tu base de datos antes de activar el xbtt backend!';
$language['XBTT_URL_ERROR']='La url base de xbtt es obligatoria!';
// BAN FORM
$language['BAN_NOTE']='Aqu� puedes ver las IPs baneadas y banear nuevas ips para que no puedan acceder al tracker.<br />'."\n".'Debes insertar un rango desde (IP inicio) hasta (IP final).';
$language['BAN_NOIP']='No hay IPs baneadas';
$language['BAN_FIRSTIP']='Primera IP';
$language['BAN_LASTIP']='�ltima IP';
$language['BAN_COMMENTS']='Comentarios';
$language['BAN_REMOVE']='Eliminar';
$language['BAN_BY']='Por';
$language['BAN_ADDED']='Fecha';
$language['BAN_INSERT']='Agregar nuevo rango IP';
$language['BAN_IP_ERROR']='Direcci�n IP invalida.';
$language['BAN_NO_IP_WRITE']='No has escrito una direcci�n IP!';
$language['BAN_DELETED']='El rango IP se ha eliminado.<br />'."\n".'<br />'."\n".'<a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=banip&amp;action=read">Volver</a>';
// LANGUAGES
$language['LANGUAGE_SETTINGS']='Configuraci�n de Idioma';
$language['LANGUAGE']='Idioma';
$language['LANGUAGE_ADD']='Agregar nuevo Idioma';
$language['LANGUAGE_SAVED']='El idioma ha sido modificado';
// STYLES
$language['STYLE_SETTINGS']='Configuraci�n de Estilos';
$language['STYLE_EDIT']='Editar Estilo';
$language['STYLE_ADD']='Agregar nuevo Estilo';
$language['STYLE_NAME']='Nombre';
$language['STYLE_URL']='URL';
$language['STYLE_FOLDER']='Carpeta ';
$language['STYLE_NOTE']='Desde aqu� puedes administrar los estilos, pero debes subir los archivos al ftp primero.';
// CATEGORIES
$language['CATEGORY_SETTINGS']='Configuraci�n de Categorias';
$language['CATEGORY_IMAGE']='Imagen de Categor�a';
$language['CATEGORY_ADD']='Agregar nueva categor�a';
$language['CATEGORY_SORT_INDEX']='ID';
$language['CATEGORY_FULL']='Categor�a';
$language['CATEGORY_EDIT']='Editar Categor�a';
$language['CATEGORY_SUB']='Sub-Categor�a';
$language['CATEGORY_NAME']='Categor�a';
// CENSORED
$language['CENSORED_NOTE']='Escribe <b>una palabra por linea</b> para censurarla (se cambiara por *censored*)';
$language['CENSORED_EDIT']='Editar palabras censuradas';
// BLOCKS
$language['BLOCKS_SETTINGS']='Configuraci�n de Bloques';
$language['ENABLED']='Activado';
$language['ORDER']='Orden';
$language['BLOCK_NAME']='Nombre del Bloque';
$language['BLOCK_POSITION']='Posici�n';
$language['BLOCK_TITLE']='Titulo de Idioma (se usara para mostrar el t�tulo traducido)';
$language['BLOCK_USE_CACHE']='Este bloque usara Cache?';
$language['ERR_BLOCK_NAME']='Debes seleccionar un bloque!';
$language['BLOCK_ADD_NEW']='A�adir nuevo Bloque';
// POLLS (more in lang_polls.php)
$language['POLLS_SETTINGS']='Configuraci�n de Encuestas';
$language['POLLID']='ID';
$language['INSERT_NEW_POLL']='A�adir nueva encuesta';
$language['CANT_FIND_POLL']='No se encuentra la encuesta';
$language['ADD_NEW_POLL']='A�adir Encuesta';
// GROUPS
$language['USER_GROUPS']='Configuraci�n de Grupo de Usuarios (click en el nombre del grupo para editarlo)';
$language['VIEW_EDIT_DEL']='Ver/Editar/Eliminar';
$language['CANT_DELETE_GROUP']='Este Grupo no puede eliminarse!';
$language['GROUP_NAME']='Nombre del Grupoe';
$language['GROUP_VIEW_NEWS']='Ver Noticias';
$language['GROUP_VIEW_FORUM']='Ver Foro';
$language['GROUP_EDIT_FORUM']='Editar Foro';
$language['GROUP_BASE_LEVEL']='Elegir un nivel base';
$language['GROUP_ERR_BASE_SEL']='Error en el nivel base elegido!';
$language['GROUP_DELETE_NEWS']='Eliminar noticias';
$language['GROUP_PCOLOR']='Color Principal (';
$language['GROUP_SCOLOR']='Color Secundario (';
$language['GROUP_VIEW_TORR']='Ver Torrents';
$language['GROUP_EDIT_TORR']='Editar Torrents';
$language['GROUP_VIEW_USERS']='Ver Usuarios';
$language['GROUP_DELETE_TORR']='Eliminar Torrents';
$language['GROUP_EDIT_USERS']='Editar Usuarios';
$language['GROUP_DOWNLOAD']='Puede Descargar';
$language['GROUP_DELETE_USERS']='Eliminar Usuarios';
$language['GROUP_DELETE_FORUM']='Eliminar Foro';
$language['GROUP_GO_CP']='Puede acceder al Panel de Admin';
$language['GROUP_EDIT_NEWS']='Editar Noticias';
$language['GROUP_ADD_NEW']='A�adir nuevo Grupo';
$language['GROUP_UPLOAD']='Puede Subir';
$language['GROUP_WT']='Tiempo de espera si el ratio <1';
$language['GROUP_EDIT_GROUP']='Editar Grupo';
$language['GROUP_VIEW']='Ver';
$language['GROUP_EDIT']='Editar';
$language['GROUP_DELETE']='Eliminar';
$language['INSERT_USER_GROUP']='Agregar nuevo Grupo de Usuarios';
$language['ERR_CANT_FIND_GROUP']='No se encuentra este grupo!';
$language['GROUP_DELETED']='El grupo se ha eliminado!';
// MASS PM
$language['USERS_FOUND']='usuarios encontrados';
$language['USERS_PMED']='usuarios mensajeados';
$language['WHO_PM']='�A qui�n se enviar� el mensaje privado?';
$language['MASS_SENT']='MP masivo enviado!!!';
$language['MASS_PM']='MP Masivo';
$language['MASS_PM_ERROR']='Debes escribir el texto del mensaje!!!';
$language['RATIO_ONLY']='S�lo este ratio';
$language['RATIO_GREAT']='Mayor a este ratio';
$language['RATIO_LOW']='Menor a este ratio';
$language['RATIO_FROM']='Desde';
$language['RATIO_TO']='Hasta';
$language['MASSPM_INFO']='Info';
// PRUNE USERS
$language['PRUNE_USERS_PRUNED']='Usuarios inactivos eliminados';
$language['PRUNE_USERS']='Eliminar usuarios inactivos';
$language['PRUNE_USERS_INFO']='Escribe el numero de dias para que los usuarios sean considerados como inactivos (no se han conectado en los x dias anteriores o no se han validados en x dias anteriores)';
// SEARCH DIFF
$language['SEARCH_DIFF']='Buscar diferencias';
$language['SEARCH_DIFF_MESSAGE']='Mensaje';
$language['DIFFERENCE']='Diferencia';
$language['SEARCH_DIFF_CHANGE_GROUP']='Cambiar grupo de usuario';
// PRUNE TORRENTS
$language['PRUNE_TORRENTS_PRUNED']='Torrents inactivos eliminados';
$language['PRUNE_TORRENTS']='Eliminar torrents inactivos';
$language['PRUNE_TORRENTS_INFO']='Escribe el numero de dias para que los torrents sean considerados como "muertos"';
$language['LEECHERS']='leecher(s)';
$language['SEEDS']='semilla(s)';
// DBUTILS
$language['DBUTILS_TABLENAME']='Nombre de Tabla';
$language['DBUTILS_RECORDS']='Registros';
$language['DBUTILS_DATALENGTH']='Tama�o de los datos';
$language['DBUTILS_OVERHEAD']='Datos inservibles';
$language['DBUTILS_REPAIR']='Reparar';
$language['DBUTILS_OPTIMIZE']='Optimizar';
$language['DBUTILS_ANALYSE']='Analizar';
$language['DBUTILS_CHECK']='Comprobar';
$language['DBUTILS_DELETE']='Eliminar';
$language['DBUTILS_OPERATION']='Operaci�n';
$language['DBUTILS_INFO']='Info';
$language['DBUTILS_STATUS']='Estado';
$language['DBUTILS_TABLES']='Tablas';
// MYSQL STATUS
$language['MYSQL_STATUS']='Estado MySQL';
// SITE LOG
$language['SITE_LOG']='Log de la web';
// FORUMS
$language['FORUM_MIN_CREATE']='Clase M�nima Creada';
$language['FORUM_MIN_WRITE']='Clase Minima Escrita';
$language['FORUM_MIN_READ']='Clase Minima Leida';
$language['FORUM_SETTINGS']='Configuraci�n del Foro';
$language['FORUM_EDIT']='Editar Foro';
$language['FORUM_ADD_NEW']='A�adir nuevo foro';
$language['FORUM_PARENT']='Foro Padre';
$language['FORUM_SORRY_PARENT']='(El foro no puede tener padre, ya que el mismo es un foro padre)';
$language['FORUM_PRUNE_1']='Hay topics/post en este foro!<br />Perderas todos los datos...<br />';
$language['FORUM_PRUNE_2']='Si estas seguro de eliminar este foro';
$language['FORUM_PRUNE_3']='sino vuelve atras.';
$language['FORUM_ERR_CANNOT_DELETE_PARENT']='No puedes eliminar este foro ya que tiene foros hijo, mueve los foros hijo a otro foro y reintentalo';
// MODULES
$language['ADD_NEW_MODULE']='A�adir nuevo Modulo';
$language['TYPE']='Tipo';
$language['DATE_CHANGED']='Fecha Cambiada';
$language['DATE_CREATED']='Fecha Creada';
$language['ACTIVE_MODULES']='Modulos Activos: ';
$language['NOT_ACTIVE_MODULES']='Modulos Inactivos: ';
$language['TOTAL_MODULES']='Modulos Totales: ';
$language['DEACTIVATE']='Desactivar';
$language['ACTIVATE']='Activar';
$language['STAFF']='Equipo';
$language['MISC']='Varios';
$language['TORRENT']='Torrent';
$language['STYLE']='Estilo';
$language['ID_MODULE']='ID';
// HACKS
$language['HACK_TITLE']='T�tulo';
$language['HACK_VERSION']='Versi�n';
$language['HACK_AUTHOR']='Autor';
$language['HACK_ADDED']='A�adido';
$language['HACK_NONE']='No hay hacks instalados';
$language['HACK_ADD_NEW']='A�adir nuevo hack';
$language['HACK_SELECT']='Seleccionar';
$language['HACK_STATUS']='Estado';
$language['HACK_INSTALL']='Instalar';
$language['HACK_UNINSTALL']='Desinstalar';
$language['HACK_INSTALLED_OK']='El Hack ha sido instalado correctamente!<br />'."\n".'Para ver los hacks instalados vuelve a <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">Administracion (Hacks)</a>';
$language['HACK_BAD_ID']='Error getting hack&rsquo;s info with this ID.';
$language['HACK_UNINSTALLED_OK']='El Hack ha sido desinstalado!<br />'."\n".'Para ver los hacks instalados vuelve a <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">Administraci�n (Hacks)</a>';
$language['HACK_OPERATION']='Operaci�n';
$language['HACK_SOLUTION']='Soluci�n';
// added rev 520
$language['HACK_WHY_FTP']='Algunos archivos del instalador del hack necesitan ser modificados y no es posible ya que no se puede escribir en ellos. <br />'."\n".'Necesitas permitir el acceso de escritura, logeate en el ftp y da permiso sobre los archivos/carpetase. <br />'."\n".'La informaci�n del ftp sera temporalmente cacheada para el correcto funcionamiento del hack.';
$language['HACK_FTP_SERVER']='Servidor FTP';
$language['HACK_FTP_PORT']='Puerto FTP';
$language['HACK_FTP_USERNAME']='Usuario FTP';
$language['HACK_FTP_PASSWORD']='Contrase�a FTP';
$language['HACK_FTP_BASEDIR']='Ruta local para xbtit (ruta desde el root usando el FTP)';
// USERS TOOLS
$language['USER_NOT_DELETE']='No puedes eliminar el usuario Guest o a ti mismo!';
$language['USER_NOT_EDIT']='No puedes editar el usuario Guest o a ti mismo!';
$language['USER_NOT_DELETE_HIGHER']='No puedes eliminar usuarios con un rango superior.';
$language['USER_NOT_EDIT_HIGHER']='No puedes editar usuarios con un rango superior.';
$language['USER_NO_CHANGE']='No se ha realizado ning�n cambio.';
?>