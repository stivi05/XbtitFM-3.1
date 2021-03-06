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
$language["ACP_BAN_IP"]="Banir IPs";
$language["ACP_FORUM"]="Configurações do Fórum";
$language["ACP_USER_GROUP"]="Configurações do grupo utilizadors";
$language["ACP_STYLES"]="Configurações dos Estilos";
$language["ACP_LANGUAGES"]="Configurações de Idiomas";
$language["ACP_CATEGORIES"]="Configurações de Categorias";
$language["ACP_TRACKER_SETTINGS"]="Configurações do Tracker";
$language["ACP_OPTIMIZE_DB"]="Otimizar sua base de dados";
$language["ACP_CENSORED"]="Configurações de palavras Censuradas";
$language["ACP_DBUTILS"]="Utilitários da base de dados";
$language["ACP_HACKS"]="Hacks";
$language["ACP_HACKS_CONFIG"]="Configurações dos Hacks";
$language["ACP_MODULES"]="Modulos";
$language["ACP_MODULES_CONFIG"]="Configurações dos Modulos";
$language["ACP_MASSPM"]="Mensagens privadas em massa";
$language["ACP_PRUNE_TORRENTS"]="Punir Torrents";
$language["ACP_PRUNE_USERS"]="Punir utilizadors";
$language["ACP_SITE_LOG"]="Ver o Log do Site";
$language["ACP_SEARCH_DIFF"]="Pesquisar Diferença.";
$language["ACP_BLOCKS"]="Configurações dos Blocos";
$language["ACP_POLLS"]="Configurações de Enquetes";
$language["ACP_MENU"]="Menu Admin";
$language["ACP_FRONTEND"]="Configurações do Conteúdo";
$language["ACP_USERS_TOOLS"]="Ferramentas do utilizador";
$language["ACP_TORRENTS_TOOLS"]="Ferramentas dos Torrent's";
$language["ACP_OTHER_TOOLS"]="Outras Ferramentas";
$language["ACP_MYSQL_STATS"]="Estatísticas MySql";
$language["XBTT_BACKEND"]="Opção xbtt";
$language["XBTT_USE"]="Use <a href=\"http://xbtt.sourceforge.net/tracker/\" target=\"_blank\">xbtt</a> como backend?";
$language["XBTT_URL"]="url base xbtt e.g. http://localhost:2710";
$language["GENERAL_SETTINGS"]="Outros ajustes";
$language["TRACKER_NAME"]="Nome do site";
$language["TRACKER_BASEURL"]="URL base do Tracker (Sem Última /)";
$language["TRACKER_ANNOUNCE"]="Tracker's Announce URLS (Um URL por linha)".($XBTT_USE?"<br />\n<span style=\"color:#FF0000; font-weight: bold;\">Verifique o seu url Announce duas vezes, para que você ative xbtt backend...</span>":"");
$language["TRACKER_EMAIL"]="E-mail do proprietário(Owner)do Tracker";
$language["TORRENT_FOLDER"]="Pasta Torrent";
$language["ALLOW_EXTERNAL"]="Permitir torrents Externos";
$language["ALLOW_GZIP"]="Ativar GZIP";
$language["ALLOW_DEBUG"]="Mostrar Debug infos na página do fundo";
$language["ALLOW_DHT"]="Desabilitar DHT (Bandeira privada no torrent)<br />\nserá ajustado somente em um novo torrent";
$language["ALLOW_LIVESTATS"]="Ativar estatística em tempo real (Alerta para alta carga no servidor!)";
$language["ALLOW_SITELOG"]="Ativar log básico do site (Log mudança em torrentes / utilizadors)";
$language["ALLOW_HISTORY"]="Ativar Histórico Básico (torrentes / utilizadors)";
$language["ALLOW_PRIVATE_ANNOUNCE"]="Announce Privado";
$language["ALLOW_PRIVATE_SCRAPE"]="Scrape Privado";
$language["SHOW_UPLOADER"]="Mostrar Nick dos Uploader's";
$language["USE_POPUP"]="Use Popup para detalhes Torrents / peers";
$language["DEFAULT_LANGUAGE"]="Idioma Padrão";
$language["DEFAULT_CHARSET"]="Defiir a codificação padrão<br />\n(Se o seu idioma não exibir corretamente, tente UTF-8)";
$language["DEFAULT_STYLE"]="Estilo padrão";
$language["MAX_USERS"]="Utilizadors Maximo (Numérico, 0 = sem limites)";
$language["MAX_TORRENTS_PER_PAGE"]="Torrents por Página";
$language["SPECIFIC_SETTINGS"]="Configurações específicas do Tracker's";
$language["SETTING_INTERVAL_SANITY"]="intervalo de Higiene (Numérico segundos, 0 = Desativado)<br />Valor Bom, se estiver ativado, é 1800 (30 minutos)";
$language["SETTING_INTERVAL_EXTERNAL"]="Atualização Externa intervalo (numérico segundo, 0 = Desativado)<br />Dependendo de quantos torrente externo";
$language["SETTING_INTERVAL_MAX_REANNOUNCE"]="Máximo reannounce intervalo (numérico segundo)";
$language["SETTING_INTERVAL_MIN_REANNOUNCE"]="Minimo reannounce intervalo (numérico segundo)";
$language["SETTING_MAX_PEERS"]="N. Max de pedido por peers (numérico)";
$language["SETTING_DYNAMIC"]="Permitir Torrents Dinâmico (não recomendado)";
$language["SETTING_NAT_CHECK"]="Verificando NAT";
$language["SETTING_PERSISTENT_DB"]="Conexões persistentes (base de dados, não recomendado)";
$language["SETTING_OVERRIDE_IP"]="Permitir aos utilizadors sobrepor ip detectado";
$language["SETTING_CALCULATE_SPEED"]="Calcular Velocidade e Downloaded bytes";
$language["SETTING_PEER_CACHING"]="Tabela caches (deverá diminuir um pouco de carga)";
$language["SETTING_SEEDS_PID"]="Numero Max De seeds com o mesmo PID";
$language["SETTING_LEECHERS_PID"]="Numero Max De leechers com o mesmo PID";
$language["SETTING_VALIDATION"]="Modo de Validação";
$language["SETTING_CAPTCHA"]="Registro Seguro (Utiliza Código de Imagem, GD+Freetype Bibliotecas são necessárias)";
$language["SETTING_FORUM"]="Link do Fórum, Pode ser:<br /><li><font color='#FF0000'>interno</font> Ou vazio (sem valor) para fórum interno</li><li><font color='#FF0000'>smf</font> Para integrar <a target='_new' href='http://www.simplemachines.org'>Simple Machines Fórum</a></li><li>Seu próprio fórum solução (Especifique url na caixa)</li>";
$language["BLOCKS_SETTING"]="Índice / Blocos página configurações";
$language["SETTING_CLOCK"]="Tipo de Relógio";
$language["SETTING_NUM_NEWS"]="Limite de blocos de Últimas Notícias (numérico)";
$language["SETTING_NUM_POSTS"]="Limite blocos para o Fórum (numérico)";
$language["SETTING_NUM_LASTTORRENTS"]="Limite blocos para Últimos Torrents (numérico)";
$language["SETTING_NUM_TOPTORRENTS"]="Limite blocos para Torrents mais populares (numérico)";
$language["CLOCK_ANALOG"]="Analógico";
$language["CLOCK_DIGITAL"]="Digital";
$language["CONFIG_SAVED"]="A configuração foi salva corretamente!";
$language["CACHE_SITE"]="intervalo do Cache (numérico segundos, 0 = desativado)";
$language["ALL_FIELDS_REQUIRED"]="Todos os campos são obrigatórios!";
$language["SETTING_CUT_LONG_NAME"]="Torrents Cortar nome longo após x caracteres (0 = não corta)";
$language["MAILER_SETTINGS"]="Mailer";
$language["SETTING_MAIL_TYPE"]="Tipo de Mail";
$language["SETTING_SMTP_SERVER"]="Servidor SMTP";
$language["SETTING_SMTP_PORT"]="Porta SMTP";
$language["SETTING_SMTP_USERNAME"]="Nome de Utilizador SMTP";
$language["SETTING_SMTP_PASSWORD"]="Senha SMTP";
$language["SETTING_SMTP_PASSWORD_REPEAT"]="Senha SMTP(Repetir)";
$language["XBTT_TABLES_ERROR"]="Você deve importar tabelas xbtt (veja nas instruções de instalação xbtt) em sua base de dados antes de ativar xbtt backend!";
$language["XBTT_URL_ERROR"]="URL base Xbtt é obrigatória!";
// BAN FORM
$language["BAN_NOTE"]="Nesta parte do painel admin., você pode ver os IPs banidos e banir novos IPs de acessar o tracker.<br />\nVocê deve inserir um intervalo de (primeiro IP) a (último IP).";
$language["BAN_NOIP"]="Não há IPs banidos";
$language["BAN_FIRSTIP"]="Primeiro IP";
$language["BAN_LASTIP"]="Último IP";
$language["BAN_COMMENTS"]="Comentários";
$language["BAN_REMOVE"]="Remover";
$language["BAN_BY"]="Por";
$language["BAN_ADDED"]="Data";
$language["BAN_INSERT"]="Inserir nova faixa de IP proibidos";
$language["BAN_IP_ERROR"]="Endereço de IP ruim.";
$language["BAN_NO_IP_WRITE"]="Você não escreveu um endereço IP. Desculpe!";
$language["BAN_DELETED"]="O intervalo desse IP foi excluído da base de dados.<br />\n<br />\n<a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=banip&amp;action=read\">Voltar para Banir IP</a>";
// LANGUAGES
$language["LANGUAGE_SETTINGS"]="Configurações de Idiomas";
$language["LANGUAGE"]="Idioma";
$language["LANGUAGE_ADD"]="Inserir novo Idioma";
$language["LANGUAGE_SAVED"]="Parabéns, o idioma foi modificado";
// STYLES
$language["STYLE_SETTINGS"]="Estilo / temas configurações";
$language["STYLE_EDIT"]="Editar Estilo";
$language["STYLE_ADD"]="Inserir novo Estilo";
$language["STYLE_NAME"]="Nome do Estilo";
$language["STYLE_URL"]="URL do Estilo";
$language["STYLE_FOLDER"]="Pasta do Estilo ";
$language["STYLE_NOTE"]="Nesta seção você pode gerenciar suas configurações de estilo, mas você deve fazer upload dos arquivos por ftp ou sftp.";
// CATEGORIES
$language["CATEGORY_SETTINGS"]="Configurações de Categorias";
$language["CATEGORY_IMAGE"]="Imagem da Categoria";
$language["CATEGORY_ADD"]="Inserir nova Categoria";
$language["CATEGORY_SORT_INDEX"]="Classificar Índice";
$language["CATEGORY_FULL"]="Categoria";
$language["CATEGORY_EDIT"]="Editar Categoria";
$language["CATEGORY_SUB"]="Sub-Categoria";
$language["CATEGORY_NAME"]="Categoria";
// CENSORED
$language["CENSORED_NOTE"]="Escrever <b>uma palavra por linha</b> para censurar a mesma (Será alterado para *censurado*)";
$language["CENSORED_EDIT"]="Editar Palavras Censuradas";
// BLOCKS
$language["BLOCKS_SETTINGS"]="Configurações dos Blocos";
$language["ENABLED"]="Ativado";
$language["ORDER"]="Ordem";
$language["BLOCK_NAME"]="Nome do Bloco";
$language["BLOCK_POSITION"]="Posição";
$language["BLOCK_TITLE"]="Idioma / título (será usado para exibir o título traduzido)";
$language["BLOCK_USE_CACHE"]="Colocar este bloco em Cache?";
$language["ERR_BLOCK_NAME"]="Você deve selecionar um dos arquivo ativado no nome da dropdown!";
$language["BLOCK_ADD_NEW"]="Adicionar Novo Bloco";
// POLLS (more in lang_polls.php)
$language["POLLS_SETTINGS"]="Configurações de Enquetes";
$language["POLLID"]="ID da Enquete";
$language["INSERT_NEW_POLL"]="Adicionar nova Enquete";
$language["CANT_FIND_POLL"]="Não é possível encontrar a enquete";
$language["ADD_NEW_POLL"]="Adicionar Enquete";
// GROUPS
$language["USER_GROUPS"]="Configurações do grupo utilizadors (Clique no nome do grupo para editar)";
$language["VIEW_EDIT_DEL"]="Ver/Editar/Apagar";
$language["CANT_DELETE_GROUP"]="Este Rank/grupo não pode ser cancelado!";
$language["GROUP_NAME"]="Nome dos Grupos";
$language["GROUP_VIEW_NEWS"]="Ver Notícias";
$language["GROUP_VIEW_FORUM"]="Ver Fórum";
$language["GROUP_EDIT_FORUM"]="Editar Fórum";
$language["GROUP_BASE_LEVEL"]="Escolha rank básico";
$language["GROUP_ERR_BASE_SEL"]="Erro no rank básico selecionado!";
$language["GROUP_DELETE_NEWS"]="Apagar Notícias";
$language["GROUP_PCOLOR"]="Prefixo da Cor (como ";
$language["GROUP_SCOLOR"]="Suffixo da Cor (como ";
$language["GROUP_VIEW_TORR"]="Ver Torrents";
$language["GROUP_EDIT_TORR"]="Editar Torrents";
$language["GROUP_VIEW_USERS"]="Ver Utilizadors";
$language["GROUP_DELETE_TORR"]="Apagar Torrents";
$language["GROUP_EDIT_USERS"]="Editar Utilizadors";
$language["GROUP_DOWNLOAD"]="Pode fazer Download";
$language["GROUP_DELETE_USERS"]="Apagar Utilizadors";
$language["GROUP_DELETE_FORUM"]="Apagar Fórum";
$language["GROUP_GO_CP"]="Pode acessar Admin CP";
$language["GROUP_EDIT_NEWS"]="Editar Notícias";
$language["GROUP_ADD_NEW"]="Adicionar novo Grupo";
$language["GROUP_UPLOAD"]="Pode fazer Upload";
$language["GROUP_WT"]="Aguardando tempo do Ratio <1";
$language["GROUP_EDIT_GROUP"]="Editar Grupo";
$language["GROUP_VIEW"]="Ver";
$language["GROUP_EDIT"]="Editar";
$language["GROUP_DELETE"]="Apagar";
$language["INSERT_USER_GROUP"]="Inserir novo Grupo de Utilizadors";
$language["ERR_CANT_FIND_GROUP"]="Não é possível encontrar este grupo!";
$language["GROUP_DELETED"]="O grupo foi excluído!";
// MASS PM
$language["USERS_FOUND"]="Utilizadors encontrados";
$language["USERS_PMED"]="Mensagens enviadas para esses Utilizadors";
$language["WHO_PM"]="PM a ser enviado para?";
$language["MASS_SENT"]="Enviar PM em Massa!!!";
$language["MASS_PM"]="PM en Massa";
$language["MASS_PM_ERROR"]="É talvez seja uma boa idéia escrever algo antes de enviá-lo!!!!";
$language["RATIO_ONLY"]="Só este ratio";
$language["RATIO_GREAT"]="Maior que este ratio";
$language["RATIO_LOW"]="Inferior que este ratio";
$language["RATIO_FROM"]="De";
$language["RATIO_TO"]="Para";
$language["MASSPM_INFO"]="Info.";
// PRUNE USERS
$language["PRUNE_USERS_PRUNED"]="Punir utilizadors";
$language["PRUNE_USERS"]="Punir utilizadors";
$language["PRUNE_USERS_INFO"]="Digite o número de dias que os utilizadors estão a ser consideradas como /mortos\ (que não conectaram a partir de x dias ou tenha se cadastrado a partir de x dias e ainda não entrou no site)";
// SEARCH DIFF
$language["SEARCH_DIFF"]="Procurar Diferença.";
$language["SEARCH_DIFF_MESSAGE"]="Mensagem";
$language["DIFFERENCE"]="Diferença";
$language["SEARCH_DIFF_CHANGE_GROUP"]="Mudar Grupo de Utilizadors";
// PRUNE TORRENTS
$language["PRUNE_TORRENTS_PRUNED"]="Punir torrents";
$language["PRUNE_TORRENTS"]="Punir torrents";
$language["PRUNE_TORRENTS_INFO"]="Digite o número de dias que os torrents estão a ser considerados como \"Morto\"";
$language["LEECHERS"]="leecher(s)";
$language["SEEDS"]="seed(s)";
// DBUTILS
$language["DBUTILS_TABLENAME"]="Nome da Tabela";
$language["DBUTILS_RECORDS"]="Records";
$language["DBUTILS_DATALENGTH"]="Tamanho dos Dados";
$language["DBUTILS_OVERHEAD"]="Ultrapassou";
$language["DBUTILS_REPAIR"]="Reparar";
$language["DBUTILS_OPTIMIZE"]="Otimizar";
$language["DBUTILS_ANALYSE"]="Analizar";
$language["DBUTILS_CHECK"]="Checar";
$language["DBUTILS_DELETE"]="Apagar";
$language["DBUTILS_OPERATION"]="Operação";
$language["DBUTILS_INFO"]="Info.";
$language["DBUTILS_STATUS"]="Estado";
$language["DBUTILS_TABLES"]="Tabelas";
// MYSQL STATUS
$language["MYSQL_STATUS"]="Estado MySQL";
// SITE LOG
$language["SITE_LOG"]="Log do Site";
// FORUMS
$language["FORUM_MIN_CREATE"]="Rank mínimo que pode criar";
$language["FORUM_MIN_WRITE"]="Rank mínimo que pode escrever";
$language["FORUM_MIN_READ"]="Rank minimo que pode ler";
$language["FORUM_SETTINGS"]="Configurações do fórum";
$language["FORUM_EDIT"]="Editar fórum";
$language["FORUM_ADD_NEW"]="Adicionar novo fórum";
$language["FORUM_PARENT"]=" Fórum-categoria";
$language["FORUM_SORRY_PARENT"]="(Infelizmente, não posso conter sub-fórum, porque sou um sub-fórum)";
$language["FORUM_PRUNE_1"]="Existem tópicos e/ou mensagens neste fórum!<br />Irás perder todos os dados.<br />";
$language["FORUM_PRUNE_2"]="Tens a certeza que pretendes apagar este fórum";
$language["FORUM_PRUNE_3"]="Voltar.";
$language["FORUM_ERR_CANNOT_DELETE_PARENT"]="Não podes apagar um fórum que contém sub-fóruns, passa os sub-fóruns para outro e tenta novamente";
// MODULES
$language["ADD_NEW_MODULE"]="Adicionar novo Módulo";
$language["TYPE"]="Tipo";
$language["DATE_CHANGED"]="Data de modificação";
$language["DATE_CREATED"]="Data de criação";
$language["ACTIVE_MODULES"]="Módulos Activos: ";
$language["NOT_ACTIVE_MODULES"]="Módulos inactivos: ";
$language["TOTAL_MODULES"]="Total de Módulos: ";
$language["DEACTIVATE"]="Desactivado";
$language["ACTIVATE"]="Activado";
$language["STAFF"]="Staff";
$language["MISC"]="Diversos";
$language["TORRENT"]="Torrent";
$language["STYLE"]="Estilo";
$language["ID_MODULE"]="ID";
// HACKS
$language["HACK_TITLE"]="Título";
$language["HACK_VERSION"]="Versão";
$language["HACK_AUTHOR"]="Autor";
$language["HACK_ADDED"]="Adicionado";
$language["HACK_NONE"]="Não existe nenhum hack instalado";
$language["HACK_ADD_NEW"]="Adicionar novo hack";
$language["HACK_SELECT"]="Seleccionar";
$language["HACK_STATUS"]="Estado";
$language["HACK_INSTALL"]="Instalar";
$language["HACK_UNINSTALL"]="Desinstalar";
$language["HACK_INSTALLED_OK"]="O hack foi instalado com sucesso!<br />\nPara veres os hacks instalados, regressa ao <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">Painel Admin (Hacks)</a>";
$language["HACK_BAD_ID"]="Erro ao obter informação do hack com este ID.";
$language["HACK_UNINSTALLED_OK"]="O hack foi desinstalado com sucesso!<br />\nPara veres os hacks instalados, regressa ao <a href=\"index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=hacks&amp;action=read\">Painel Admin (Hacks)</a>";
$language["HACK_OPERATION"]="Operação";
$language["HACK_SOLUTION"]="Solução";
// USERS TOOLS
$language["USER_NOT_DELETE"]="Não pode excluir o utilizador Guest ou a ti próprio.";
$language["USER_NOT_EDIT"]="Não podes editar o utilizador Guest ou a ti próprio.";
?>