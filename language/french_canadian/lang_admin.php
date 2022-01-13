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

global $CURUSER, $XBTT_USE;


$language['ACP_BAN_IP']='Bannir IP';
$language['ACP_FORUM']='Param. du forum';
$language['ACP_USER_GROUP']='Param. de groupe des membres';
$language['ACP_STYLES']='Param. des Styles';
$language['ACP_LANGUAGES']='Param. des langues';
$language['ACP_CATEGORIES']='Param. des Catégories';
$language['ACP_TRACKER_SETTINGS']='Param. du tracker';
$language['ACP_OPTIMIZE_DB']='Optimisez votre base de données';
$language['ACP_CENSORED']='Param. des mots censurés';
$language['ACP_DBUTILS']='Utilitaire de base de données';
$language['ACP_HACKS']='Hacks';
$language['ACP_HACKS_CONFIG']='Param. des hacks';
$language['ACP_MODULES']='Modules';
$language['ACP_MODULES_CONFIG']='Param. des modules';
$language['ACP_MASSPM']='Message de masse';
$language['ACP_PRUNE_TORRENTS']='Prune Torrents';
$language['ACP_PRUNE_USERS']='Prune membres';
$language['ACP_SITE_LOG']='Afficher le journal du site';
$language['ACP_SEARCH_DIFF']='Chercher Diff.';
$language['ACP_BLOCKS']='Param. des blocs';
$language['ACP_POLLS']='Param. de sondage';
$language['ACP_MENU']='Menu Admin';
$language['ACP_FRONTEND']='Param. de contenu';
$language['ACP_USERS_TOOLS']='Outils de membres';
$language['ACP_TORRENTS_TOOLS']='Outils de Torrent';
$language['ACP_OTHER_TOOLS']='Autres outils';
$language['ACP_MYSQL_STATS']='Statistiques MySql';
$language['ACP_FHOST']='Hébergement de fichiers';
$language['ACP_ANNOUNCEMENT']='Annonces du Staff';
$language['ACP_INVALID_LOGIN']='Connexion invalide';
$language['XBTT_BACKEND']='Option xbtt';
$language['XBTT_USE']='Utilisation <a href="http://xbtt.sourceforge.net/tracker/" target="_blank">xbtt</a> comme arrière-plan?';
$language['XBTT_URL']='xbtt base url e.g. http://localhost:2710';
$language['GENERAL_SETTINGS']='Param. général';
$language['TRACKER_NAME']='Nom du site';
$language['TRACKER_BASEURL']='URL du tracker(Sans le dernier /)';
$language['TRACKER_ANNOUNCE']='Les annonces du Tracker URLS (une url par rangée)'.($XBTT_USE?'<br />'."\n".'<span style="color:#FF0000; font-weight: bold;">Vérifiez votre annonce deux fois, Vous avez activer xbtt en arrière-plan...</span>':'');
$language['TRACKER_EMAIL']='Courrier électronique du suivi / propriétaire';
$language['TORRENT_FOLDER']='Dossier Torrent';
$language['ALLOW_EXTERNAL']='Autoriser les torrents externes';
$language['ALLOW_GZIP']='Activée GZIP';
$language['ALLOW_DEBUG']='Afficher les informations de débogage en bas de la page';
$language['ALLOW_DHT']='Désactiver DHT (torrent privé au tracker)<br />'."\n".'Sera configuré uniquement sur de nouveaux torrents uploadés';
$language['ALLOW_LIVESTATS']='Activer les statistiques en direct (mise en garde la charge du serveur sera haute!)';
$language['ALLOW_SITELOG']='Activer le journal de base du site (changement de journal sur les torrents / utilisateurs)';
$language['ALLOW_HISTORY']='Activer l\'historique de base (torrents / utilisateurs)';
$language['ALLOW_PRIVATE_ANNOUNCE']='Annonce privée';
$language['ALLOW_PRIVATE_SCRAPE']='Scrape privé';
$language['SHOW_UPLOADER']='Afficher le nick de l\'uploadeur';
$language['USE_POPUP']='Utilisez Popup pour les Torrents détails / peers';
$language['DEFAULT_LANGUAGE']='Langage par défaut';
$language['DEFAULT_CHARSET']='Encodage de caractères par défaut<br />'."\n".'(Si votre langue ne s\'affiche pas correctement, essayez UTF-8)';
$language['DEFAULT_STYLE']='Style par défaut';
$language['MAX_USERS']='Max de membres (numérique, 0 = aucune limite)';
$language['MAX_TORRENTS_PER_PAGE']='Torrents par page';
$language['SPECIFIC_SETTINGS']='Param. spécifiques du Tracker';
$language['SETTING_INTERVAL_SANITY']='Intervalle de sécurité (secondes numérique , 0 = désactivée)<br />Une bonne valeur, si elle est activée, est 1800 (30 minutes)';
$language['SETTING_INTERVAL_EXTERNAL']='Mise à jour Intervalle externe (secondes numérique, 0 = désactivée)<br />Selon le nombre de torrents externes';
$language['SETTING_INTERVAL_MAX_REANNOUNCE']='Intervalle de renouvellement Maximum (secondes numérique)';
$language['SETTING_INTERVAL_MIN_REANNOUNCE']='Intervalle de renouvellement Minimum (secondes numérique)';
$language['SETTING_MAX_PEERS']='Max N. de peers pour demande (numérique)';
$language['SETTING_DYNAMIC']='Autoriser les Torrents dynamiques (non recommandé)';
$language['SETTING_NAT_CHECK']='Vérification NAT';
$language['SETTING_PERSISTENT_DB']='Connexions persistantes (Base de données, non recommandé)';
$language['SETTING_OVERRIDE_IP']='Permettre aux utilisateurs de remplacer l\'ip détecté';
$language['SETTING_CALCULATE_SPEED']='Calculer la vitesse et les octets téléchargés';
$language['SETTING_PEER_CACHING']='Caches de table (devrait diminuer un peu la charge)';
$language['SETTING_SEEDS_PID']='Nombre max de seed avec le même PID';
$language['SETTING_LEECHERS_PID']='Nombre max de leechers avec le même PID';
$language['SETTING_VALIDATION']='Mode de validation';
$language['SETTING_CAPTCHA']='Enregistrement sécurisé (utilisez les ImageCode, GD + Freetype nécessaires)';
$language['SETTING_FORUM']='Lien forum, peut être:<br /><li><font color="#FF0000">interne</font> Ou vide (pas de valeur) pour le forum interne</li><li><font color="#FF0000">smf</font> Pour intégration du <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a> (1.x.x)</li><li><font color="#FF0000">smf2</font> Pour intégration du  <a target="_new" href="http://www.simplemachines.org">Simple Machines Forum</a> (2.x)</li><li><font color="#FF0000">ipb</font> Pour intégration du <a target="_new" href="http://www.invisionpower.com">Invision Power Board</a> (3.x.x)</li><li>Votre propre solution de forum (Indiquez l\'URL dans la boîte)</li>';
$language['BLOCKS_SETTING']='Param. de l\'index / des blocs';
$language['SHOUTBOX_COMMANDS']='Param. des commandes Shoutbox';
$language['SETTING_CLOCK']='Type d\'horloge';
$language['SETTING_FORUMBLOCK']='Type de bloc du forum';
$language['SETTING_NUM_NEWS']='Limite du dernier bloc de nouvelles (numérique)';
$language['SETTING_NUM_POSTS']='Limite pour le bloc Forum (numérique)';
$language['SETTING_NUM_LASTTORRENTS']='Limite pour les derniers blocs Torrents (numériques)';
$language['SETTING_NUM_TOPTORRENTS']='Limite pour les blocs de Torrents les plus populaires (numériques)';
$language['CLOCK_ANALOG']='Analogique';
$language['CLOCK_DIGITAL']='Digital';
$language['FORUMBLOCK_POSTS']='Derniers messages';
$language['FORUMBLOCK_TOPICS']='Derniers posts actifs';
$language['CONFIG_SAVED']='La configuration a été enregistrée correctement!';
$language['CACHE_SITE']='Intervalle de cache (secondes numériques, 0 = désactivé)';
$language['ALL_FIELDS_REQUIRED']='Tous les champs sont requis!';
$language['SETTING_CUT_LONG_NAME']='Couper le nom du torrent  après caractères (0 = ne pas couper)';
$language['MAILER_SETTINGS']='Expéditeur';
$language['SETTING_MAIL_TYPE']='Type de courrier';
$language['SETTING_SMTP_SERVER']='Serveur SMTP';
$language['SETTING_SMTP_PORT']='Port SMTP';
$language['SETTING_SMTP_USERNAME']='Nom d\'utilisateur SMTP';
$language['SETTING_SMTP_PASSWORD']='Mot de passe SMTP';
$language['SETTING_SMTP_PASSWORD_REPEAT']='Mot de passe SMTP (Répéter)';
$language['XBTT_TABLES_ERROR']='Vous devez importer des tables xbtt (voir les instructions d\'installation xbtt) dans votre base de données avant d\'activer l\'arrière-plan xbtt!';
$language['XBTT_URL_ERROR']='Xbtt base url est obligatoire!';
// BAN FORM
$language['BAN_NOTE']='Dans cette partie du panneau d\'administration, vous pouvez voir les IP interdites et interdire les nouvelles IP d\'accéder au tracker.<br />'."\n".'Vous devez insérer une plage de la (première IP) à la (dernière IP).';
$language['BAN_NOIP']='Il n\'y a pas d\'IP interdite';
$language['BAN_FIRSTIP']='Première IP';
$language['BAN_LASTIP']='Dernière IP';
$language['BAN_COMMENTS']='Commentaires';
$language['BAN_REMOVE']='Retirer';
$language['BAN_BY']='par';
$language['BAN_ADDED']='Date';
$language['BAN_INSERT']='Insérer une nouvelle plage IP interdite';
$language['BAN_IP_ERROR']='Mauvaise adresse IP.';
$language['BAN_NO_IP_WRITE']='Vous n\'avez pas écrit une adresse IP. Désolé!';
$language['BAN_DELETED']='La plage IP a été supprimée de la base de données.<br />'."\n".'<br />'."\n".'<a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=banip&amp;action=read">Revenir à Bannir IP</a>';
// LANGUAGES
$language['LANGUAGE_SETTINGS']='Param. de langue';
$language['LANGUAGE']='Langage';
$language['LANGUAGE_ADD']='Insérer une nouvelle langue';
$language['LANGUAGE_SAVED']='Félicitations, le langage a été modifié';
// STYLES
$language['STYLE_SETTINGS']='Param. de style / Thèmes';
$language['STYLE_EDIT']='Modifier le style';
$language['STYLE_ADD']='Insérer un nouveau style';
$language['STYLE_NAME']='Nom du style';
$language['STYLE_URL']='Style URL';
$language['STYLE_FOLDER']='Dossier de style ';
$language['STYLE_NOTE']='Dans cette section, vous pouvez gérer vos Param. de style, mais vous devez télécharger des fichiers par ftp ou sftp.';
// CATEGORIES
$language['CATEGORY_SETTINGS']='Param. Catégories ';
$language['CATEGORY_IMAGE']='Image de catégorie';
$language['CATEGORY_ADD']='Insérer une nouvelle catégorie';
$language['CATEGORY_SORT_INDEX']='Trier par Index';
$language['CATEGORY_FULL']='Catégories';
$language['CATEGORY_EDIT']='Modifier Catégories';
$language['CATEGORY_SUB']='Sous-Catégories';
$language['CATEGORY_NAME']='Catégories';
// CENSORED
$language['CENSORED_NOTE']='Écrire <b>un mot par ligne</b> Pour l\'interdire (sera transformé en * censuré *)';
$language['CENSORED_EDIT']='Modifier les mots censurés';
// BLOCKS
$language['BLOCKS_SETTINGS']='Configuration du bloc';
$language['ENABLED']='Activée';
$language['ORDER']='Commande';
$language['BLOCK_NAME']='Nom du Block';
$language['BLOCK_POSITION']='Position';
$language['BLOCK_TITLE']='Titre de la langue (sera utilisé pour afficher le titre traduit)';
$language['BLOCK_USE_CACHE']='Cachez ce bloc?';
$language['ERR_BLOCK_NAME']='Vous devez sélectionner l\'un des fichiers activés dans le menu déroulant du nom!';
$language['BLOCK_ADD_NEW']='Ajouter un nouveau bloc';
// POLLS (more in lang_polls.php)
$language['POLLS_SETTINGS']='Configuration du sondage';
$language['POLLID']='ID du sondage';
$language['INSERT_NEW_POLL']='Ajouter un nouveau sondage';
$language['CANT_FIND_POLL']='Impossible de trouver un sondage';
$language['ADD_NEW_POLL']='Ajouter un sondage';
// GROUPS
$language['USER_GROUPS']='Param. de groupe des utilisateurs (cliquez sur le nom du groupe pour modifier)';
$language['VIEW_EDIT_DEL']='Afficher / Modifier / Supprimer';
$language['CANT_DELETE_GROUP']='Ce niveau / groupe ne peut être annulé!';
$language['GROUP_NAME']='Nom du groupe';
$language['GROUP_VIEW_NEWS']='Voir les nouvelles';
$language['GROUP_VIEW_FORUM']='Afficher le forum';
$language['GROUP_EDIT_FORUM']='Modifier le forum';
$language['GROUP_BASE_LEVEL']='Choisissez le niveau de base';
$language['GROUP_ERR_BASE_SEL']='Erreur sur le niveau de base Sélectionnez!';
$language['GROUP_DELETE_NEWS']='Supprimer les nouvelles';
$language['GROUP_PCOLOR']='Couleur préfixe (comme ';
$language['GROUP_SCOLOR']='Couleur suffixe (comme ';
$language['GROUP_VIEW_TORR']='Voir Torrents';
$language['GROUP_EDIT_TORR']='Modifier Torrents';
$language['GROUP_VIEW_USERS']='Voir membres';
$language['GROUP_DELETE_TORR']='Supprimer Torrents';
$language['GROUP_EDIT_USERS']='Modifier membres';
$language['GROUP_DOWNLOAD']='peut Downloader';
$language['GROUP_DELETE_USERS']='Supprimer membres';
$language['GROUP_DELETE_FORUM']='Supprimer Forum';
$language['GROUP_GO_CP']='Peut accéder à l\'Admin CP';
$language['GROUP_EDIT_NEWS']='Modifier nouvelles';
$language['GROUP_ADD_NEW']='Ajouter un nouveau groupe';
$language['GROUP_UPLOAD']='peut Uploader';
$language['GROUP_WT']='Temps d\'attente si Ratio <1';
$language['GROUP_EDIT_GROUP']='Modifier Groupe';
$language['GROUP_VIEW']='Voir';
$language['GROUP_EDIT']='Modifier';
$language['GROUP_DELETE']='Supprimer';
$language['INSERT_USER_GROUP']='Insérer un nouveau groupe d\'utilisateurs';
$language['ERR_CANT_FIND_GROUP']=' pas trouver ce groupe!';
$language['GROUP_DELETED']='Le groupe a été supprimé!';
// MASS PM
$language['USERS_FOUND']='Membres trouvés';
$language['USERS_PMED']='Membres envoie mp';
$language['WHO_PM']='A qui sera envoyé le pm?';
$language['MASS_SENT']='MP de masse envoyé!!!';
$language['MASS_PM']='MP de masse';
$language['MASS_PM_ERROR']='C\'est peut-être une bonne idée d\'écrire quelque chose avant de le soumettre!!!!';
$language['RATIO_ONLY']='Ce ratio seulement';
$language['RATIO_GREAT']='Plus grand que ce ratio';
$language['RATIO_LOW']='Plus bas que ce ratio';
$language['RATIO_FROM']='de';
$language['RATIO_TO']='À';
$language['MASSPM_INFO']='Info';
// PRUNE USERS
$language['PRUNE_USERS_PRUNED']='Membres qui furent élaguer';
$language['PRUNE_USERS']='Élaguer membres';
$language['PRUNE_USERS_INFO']='Entrez le nombre de jours que les utilisateurs doivent être considérés comme "morts" (non connecté à partir de x jours OU a signé depuis x jours et toujours en cours de validation)';
// SEARCH DIFF
$language['SEARCH_DIFF']='Chercher Diff.';
$language['SEARCH_DIFF_MESSAGE']='Message';
$language['DIFFERENCE']='Différence';
$language['SEARCH_DIFF_CHANGE_GROUP']='Changer le groupe';
// PRUNE TORRENTS
$language['PRUNE_TORRENTS_PRUNED']='Les torrents élaguer';
$language['PRUNE_TORRENTS']='Élaguer torrents';
$language['PRUNE_TORRENTS_INFO']='Entrez le nombre de jours que les torrents doivent être considérés comme "morts"';
$language['LEECHERS']='leecher(s)';
$language['SEEDS']='seed(s)';
// DBUTILS
$language['DBUTILS_TABLENAME']='Nom de la table';
$language['DBUTILS_RECORDS']='Records';
$language['DBUTILS_DATALENGTH']='Longueur des données';
$language['DBUTILS_OVERHEAD']='Surcharge';
$language['DBUTILS_REPAIR']='Réparer';
$language['DBUTILS_OPTIMIZE']='Optimiser';
$language['DBUTILS_ANALYSE']='Analyser';
$language['DBUTILS_CHECK']='Vérifier';
$language['DBUTILS_DELETE']='Effacer';
$language['DBUTILS_OPERATION']='Opération';
$language['DBUTILS_INFO']='Info';
$language['DBUTILS_STATUS']='Status';
$language['DBUTILS_TABLES']='Tables';
// MYSQL STATUS
$language['MYSQL_STATUS']='Status MySQL';
// SITE LOG
$language['SITE_LOG']='Site Log';
// FORUMS
$language['FORUM_MIN_CREATE']='Rang min. créer';
$language['FORUM_MIN_WRITE']='rang min. écrire';
$language['FORUM_MIN_READ']='Rang min. lire';
$language['FORUM_SETTINGS']='Param. du forum';
$language['FORUM_EDIT']='modifier Forum';
$language['FORUM_ADD_NEW']='Add Nouveau Forum';
$language['FORUM_PARENT']='Forum parent';
$language['FORUM_SORRY_PARENT']='(Désolé, je peux avoir un parent, car je suis un forum parent)';
$language['FORUM_PRUNE_1']='Il existe des sujets et/ou des publications dans ce forum!<br />Vous perdrez toutes les données...<br />';
$language['FORUM_PRUNE_2']='Si vous ne souhaitez pas annuler ce forum';
$language['FORUM_PRUNE_3']='Sinon retour.';
$language['FORUM_ERR_CANNOT_DELETE_PARENT']='Vous ne pouvez pas supprimer un forum qui a des enfants, déplacer le forum enfant vers un autre forum et réessayer';
// MODULES
$language['ADD_NEW_MODULE']='Ajouter un nouveau module';
$language['TYPE']='Type';
$language['DATE_CHANGED']='Date modifié';
$language['DATE_CREATED']='Date Crée';
$language['ACTIVE_MODULES']='Modules actifs: ';
$language['NOT_ACTIVE_MODULES']='Modules non actifs: ';
$language['TOTAL_MODULES']='Total des modules: ';
$language['DEACTIVATE']='Désactiver';
$language['ACTIVATE']='Activer';
$language['STAFF']='Staff';
$language['MISC']='Divers';
$language['TORRENT']='Torrent';
$language['STYLE']='Style';
$language['ID_MODULE']='ID';

// HACKS
$language['HACK_INFOMATION']='Information Hack';
$language['HACK_HOME']='Accueil';
$language['HACK_TITLE']='Titre';
$language['HACK_VERSION']='Version';
$language['HACK_AUTHOR']='Auteur';
$language['HACK_ADDED']='Ajoutée';
$language['HACK_NONE']='Il n\'y a pas de hacks installés';
$language['HACK_ADD_NEW']='Ajouter un nouveau hack';
$language['HACK_SELECT']='Sélectionner';
$language['HACK_STATUS']='Statut';
$language['HACK_INSTALL']='Installer';
$language['HACK_UNINSTALL']='Désinstaller';
$language['HACK_INSTALLED_OK']='Hack a été installé avec succès!<br />'."\n".'Pour voir les hacks installés, reportez-vous à <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">adminCP (Hacks)</a>';
$language['HACK_BAD_ID']='Error getting hack&rsquo;s info with this ID.';
$language['HACK_UNINSTALLED_OK']='Hack a été installé avec succès!<br />'."\n".'Pour voir les hacks installés, reportez-vous à <a href="index.php?page=admin&amp;user='.$CURUSER['uid'].'&amp;code='.$CURUSER['random'].'&amp;do=hacks&amp;action=read">adminCP (Hacks)</a>';
$language['HACK_OPERATION']='Opération';
$language['HACK_SOLUTION']='Solution';
// added rev 520
$language['HACK_WHY_FTP']='Certains des fichiers que l\'installateur de hack doit modifier ne sont pas autorisés. <br />'."\n".'Cela doit être modifié en vous connectant à FTP et en l\'utilisant pour chmod ou créez les fichiers et les dossiers. <br />'."\n".'Vos informations FTP peuvent être mises en cache temporairement pour le bon fonctionnement de l\'installateur du hack.';
$language['HACK_FTP_SERVER']='Serveur FTP';
$language['HACK_FTP_PORT']='Port FTP';
$language['HACK_FTP_USERNAME']='Nom d\'utilisateur FTP';
$language['HACK_FTP_PASSWORD']='Mot de passe FTP';
$language['HACK_FTP_BASEDIR']='Chemin local pour xbtit (chemin de la racine lorsque vous vous connectez via FTP)';
// USERS TOOLS
$language['USER_NOT_DELETE']='Vous ne pouvez pas supprimer un utilisateur invité ou vous-même!';
$language['USER_NOT_EDIT']='Vous ne pouvez pas modifier l\'utilisateur invité ou vous-même!';
$language['USER_NOT_DELETE_HIGHER']='Vous ne pouvez pas supprimer les utilisateurs plus haut que vous.';
$language['USER_NOT_EDIT_HIGHER']='Vous ne pouvez pas éditer les utilisateurs plus haut que vous.';
$language['USER_NO_CHANGE']='Aucun changement n\'a été effectué.';


//INVITATION SYSTEM
$language['ACP_INVITATION_SYSTEM']='Système d\'invitation';
$language['ACTIVE_INVITATIONS']='Activer le système d\'invitation:';
$language['PRIVATE_TRACKER']='Tracker privé';
$language['PRIVATE_TRACKER_INFO']='Pour améliorer la sécurité, lors du réglage du tracker sur "Privé",<br />"Max membres" sera également changé pour "1".';
$language['ACP_INVITATIONS']='Invitations';
$language['VALID_INV_MODE']='Confirmation d\'invitée requise';
$language['INVITE_TIMEOUT']='Arret pour les invitations<br />( en jours )';
$language['INVITED_BY']='Invité par';
$language['SENT_TO']='Envoyé à';
$language['DATE_SENT']='Date d\'envoi';
$language['INV_WELCOME']='Bienvenue dans le panneau Système d\'invitation.<br />L\'activation de cette option empêchera les utilisateurs de<br />S\'enregistrer sans code d\'invitation.';
$language['HASH']='Hash';
$language['VALID_INV_MODE']='Confirmation nécessaire';
$language['VALID_INV_EXPL']='<i>l\'inviteur devra confirmer le compte utilisateur invité</i>';
$language['INVITE_TIMEOUT']='Arret pour les invitations<br />( en jours )';
$language['GIVE_INVITES_TO']='Donner des invitations';
$language['NUM_INVITES']='Nombre d\'invitations';
$language['INVITES_SETTINGS']='Param.';
$language['INVITES_LIST']='Liste des invitations';
$language['SENDINV_CONFIRM']='Êtes-vous sûr de vouloir envoyer cette invitation?';
$language['ERR_SENDINVS']='Veuillez choisir le nom d\'utilisateur ou le niveau de l\'utilisateur.';
$language['SENDINV_EXPL']='Si le nom d\'utilisateur n\'est pas inséré, le rang sera choisi à la place.';
$language['RECYCLE_DATE']='Période de recyclage';
$language['RECYCLE_EXPL']='<i>Période en <u>jours</u> Après quoi les invitations seront recyclées</i>';
$language["ACP_FM_HACK_CONFIG"]='Configurer hack FM';
$language["ACP_NO_HACKS_ENABLED"]='Aucun Hacks activé';
$language['HACK_INFO']='Commuter les hacks on/off ici.<br /><br /><b>Veuillez noter que vous ne pouvez pas désactiver un hack pré-requis si le hack parent est toujours activé.</b> Passez votre souris sur le <img src="images/info.png"> ci-dessous pour savoir qui est le hack parent.';
global $BASEURL;
$language['HACK_INFO_2']='<b>Remarque: les hacks installés peuvent avoir plusieurs contributeurs, s\'il vous plaît <a target="_blank" href="'.$BASEURL.'/FM-Hacks.txt">cliquez ici</a> pour plus d\'informations.</b>';
$language['HACK_ENABLED']='Activée';
$language['HACK_DISABLED']='Désactivé';
$language['SUBMIT'] = 'Soumettre';
$language['PRE_OF'] = 'Prérequis de';

// Seed bonus -->
$language["ACP_SEEDBONUS"]="Param. des bonus";
$language["BONUS"]="Points attribués par heure de seed";
$language["PRICE_VIP"]="Prix pour le rang VIP";
$language["PRICE_CT"]="prix pour le titre personnalisé";
$language["PRICE_NAME"]="Prix ​​pour changer de nick";
$language["PRICE_GB"]="Prix pour GB";
$language["POINTS"]="Points";
$language["SEEDBONUS_UPDATED"]="Param. SeedBonus mis à jour";
$language["ENABLE"] = "Activer";
$language["AWARD_FOR"] = "Prix pour";
$language["ALL_TORR"] = "Tous les torrents seedés";
$language["ONE_TORR"] = "Pour un seul torrent";
$language["BON_FOR_UPLOAD"] = "Points attribués pour l'upload d'un nouveau torrent";
$language["PRICE_FOR_INVITES"] = "Prix pour invitation";
$language["SB_INVITE"] = "Invité";
$language["SB_INVITES"] = "Invités";
$language["SB_DELAY"] = "Délai d'attribution (heures)";
$language["BON_FOR_COMMENT"] = "Points attribués pour commenter un torrent";
$language["BON_FOR_FORUM_POST"] = "Points attribués pour un post";
$language["SB_PNT_4_UPL"] = "Points attribués uniquement si vous uploadez des données";
$language["SB_MIN_UL_RATE"] = "Taux minimum d'upload en KB/s";
$language["SB_MAX_PER_HOUR"] = "Maximum de points pouvant être obtenus par seed par heure";
$language["SB_PNTS_4_SHOUT"] = "Points attribués pour avoir écrit sur la shout";
$language["SB_PNTS_4_RADIO"] = "Points attribués par heure pour écouter la radio";
$language["SB_ALLOW_GIFT"] = "Permettre aux utilisateurs de faire un don de points aux autres membres";
$language["SB_GIFTMAX"] = "Cadeau individuel maximum";
$language['ACP_SB_CONTROL']='Contrôle de seed bonus';
$language['SB_CONTROL']='Contrôle de seed bonus';
$language['SB_NAME']='Nom';
$language['SB_ITEM']='Item';
$language['SB_UPLOAD']='Upload';
$language['SB_USED_POINTS']='Points utilisés';
$language['SB_DATE']='Date';
// <-- Seed Bonus

// Donation History by DiemThuy -->
$language['ACP_DON_HIST']='Historique des dons';
$language['ACP_DON_HIST_SET']='Param. de l\'historique des dons';
$language['ACP_UNITS'] = 'Unités';
$language['ACP_USE_AUTO_PM'] = 'Utiliser Auto MP';
$language['ACP_THANK_PM_TEXT'] = 'Texte de merci MP';
$language['ACP_DONATION'] = 'Don';
$language['ACP_AMOUNT'] = 'Montant';
$language['ACP_USERNAME'] = 'Nom d\'utilisateur';
$language['ACP_EDIT_DON'] = 'Modifier les dons';
$language['ACP_NONE_YET'] = 'Aucun encore';
$language['ACP_SHORT_DON'] = 'Don';
// <-- Donation History by DiemThuy


// Advanced Auto Donation System by DiemThuy -->
$language['ACP_DONATE']='Param. VIP et Don';
$language['AADS_NOTHING'] = 'rien';
$language['AADS_HERE'] = 'ici';
$language['AADS_YET'] = 'encore';
$language['AADS_YES'] = 'oui';
$language['AADS_NO_TIMED_RANK'] = 'Pas de chronologie';
$language['AADS_NO_OLD_RANK'] = 'Aucun ancien rang';
$language['AADS_NO_UPLOAD'] = 'Pas d\'upload';
$language['AADS_NO'] = 'non';
$language['AADS_DEM_PRO'] = 'Protection contre la détérioration';
$language['AADS_PP_INFO'] = 'Param. Paypal: vous avez besoin d\'un compte PayPal Premier et IPN ou PDT activé dans votre profil PayPal !!';
$language['AADS_AP_INFO'] = 'Param. Payza: vous avez besoin d\'un compte Payza Personal Pro et IPN activé dans votre profil Payza !!';
$language['AADS_OO_INFO'] = 'Param. généraux';
$language['AADS_USEPP'] = 'Utilisez PayPal';
$language['AADS_USEAP'] = 'Utilisez Payza';
$language['AADS_SYS'] = 'Système';
$language['AADS_TEST'] = 'Mode Test';
$language['AADS_AP_MAIL'] = 'Email Payza';
$language['AADS_AP_SEC'] = 'Code de sécurité';
$language['AADS_MODE'] = 'Test ou réel';
$language['AADS_UNITS'] = 'Unités';
$language['AADS_VIP_TRACKER'] = 'Rang VIP';
$language['AADS_VIP_SMF'] = 'Rang VIP (SMF/IPB)';
$language['AADS_PP_SAND_MAIL'] = 'Email Sandbox';
$language['AADS_PP_MAIL'] = 'Email PayPal';
$language['AADS_VIP_DAYS'] = '1 Euro/Dollar = .. Vip jours';
$language['AADS_GB_AMT'] = '1 Euro/Dollar = .. GB';
$language['AADS_NEEDED'] = 'Nécessaire';
$language['AADS_RECEIVED'] = 'Reçu';
$language['AADS_NUM_NO_POINTS'] = '(Numérique) Pas de points';
$language['AADS_DUE_DATE'] = 'Date d\'échéance';
$language['AADS_DUE_DATE_VALUE'] = 'jj/MM/AA';
$language['AADS_NUM_DON'] = 'Nombre de donateurs';
$language['AADS_SC_BL_TEXT'] = 'Défiler le texte';
$language['AADS_EN_SC_LINE'] = 'Activer le défilement';
$language['AADS_DON_HIST_BR'] = 'histoire du don';
$language['AADS_SIM_DON_DISP_BR'] = 'affichage par donneur';
$language['AADS_VIP'] = 'VIP';
$language['AADS_LNAME'] = 'Nom de famille';
$language['AADS_DDATE'] = 'Date du don';
$language['AADS_VIP_BET'] = 'Entre VIP';
$language['AADS_VIP_DAYS'] = 'Temps alloué VIP';
$language['AADS_GB_BET'] = 'Entre GB';
$language['AADS_GB_PER_UNIT'] = 'GB par unité';
$language['AADS_AND_UP'] = 'Et jusqu\'à';
$language['AADS_UNITS_IS'] = 'Les unités sont';
$language["AADS_POSS_DON_WRONG"] = "Possibilité de don Les montants ne sont pas valides, entrez les valeurs numériques séparées par des virgules";
$language["AADS_IPN_OR_PDT"] = "IPN ou transfert de données de paiement";
$language["AADS_ID_TOK"] = "Jeton d'identité PDT";
$language["AADS_PAY_ONLY"] = "PayPal Seulement";
$language["AADS_PZA_ONLY"] = "Payza Seulement";
$language["AADS_BC_ONLY"] = "Bitcoin Seulement";
$language["AADS_PAYPAL"] = "PayPal";
$language["AADS_PAYZA"] = "Payza";
$language["AADS_BITCOIN"] = "Bitcoin";
$language["AADS_BC_SETTINGS"] = "Param. Bitcoin";
$language["AADS_BC_ADDRESS"] = "Adresse Bitcoin";
$language["AADS_USE_BITCOIN"] = "Utiliser Bitcoin";
$language["AADS_DISABLE"] = "Désactiver";
$language["AADS_ENABLE"] = "Activer";
$language["AADS_FREELEECH"] ="Slots de Freeleech";
$language["AADS_NO_FLS"]= "Pas de slots freeleech";
// <-- Advanced Auto Donation System by DiemThuy

//GOLD
$language["ACP_GOLD"]="Param. des torrents d'or";
$language["GOLD_CHOOSE_PIC"] = "Choisissez une nouvelle image (taille maximale 100px x 100px)";
$language["GOLD_NO_FILE"] = "Fichier non uploadé!";
$language["GOLD_TOO_BIG"] = "La taille de l'image est limitée à 100px X 100px!";
$language["GOLD_NOT_UPPED"] = "Fichier non uploadé!";
$language["GOLD_TOO_SMALL"] = "La taille de l'image est trop petite!";
$language["GOLD_ONLY_BASE"] = "(Les niveaux des membres basés sur les valeurs par défaut hériteront automatiquement de ces autorisations)";


$language['ACP_FREECTRL']='Contrôle du Free Leech';
$language['FL_INFO'] = 'Free Leech, Si tous les torrents (y compris les nouveaux uploads) seront activés, free Leech, Aucune statistique de téléchargement ne sera enregistrée. (Seulement l\'upload)';
$language['FL_DTE'] = 'Date d\'expiration';
$language['FL_DATE_FORMAT'] = '<b>AAAA-MM-JJ</b> - example <b>2013-03-30</b>';
$language['FL_TTE'] = 'Heure d\'expiration';
$language['FL_HOUR_FORMAT'] = '<b>HH</b> - (24 heures) example <b>05</b> (5am) ou <b>13</b> (1pm)';
$language['FL_ENABLE'] = 'Activer';
$language['FL_HAPPY_HOUR'] = 'Happy Hour, si activé Free Leech sera réglé au hasard pendant 1 heure par jour';
$language['FL_EN_HAPPY_HOUR'] = 'Activer Happy Hour';
$language['FL_CATEGORY'] = 'Catégorie Free Leech';
$language['FL_CATEGORY1'] = 'Si vous souhaitez une seule catégorie de Free Leech, sélectionnez une catégorie ci-dessous, sinon laissez-la ----!';


$language["IMAGE_SETTING"]="Param. d'image";
$language["ALLOW_IMAGE_UPLOAD"]="Autoriser le téléchargement d'image";
$language["ALLOW_SCREEN_UPLOAD"]="Autoriser les screens ";
$language["IMAGE_UPLOAD_DIR"]="Dossier d'envoi d'images";
$language["FILE_SIZELIMIT"]="Limite de taille d'image";


$language["ACP_HITRUN"]="Param. H&R";
$language["HNR_BLOCK_SETTINGS"] = "Param. du bloc H&R";
$language["HNR_SCROLLING_TEXT"] = "Texte de défilement";
$language["HNR_COUNT"] = "Nombre de H&R à afficher";
$language["HNR_ERR_1"] = "Vous ne pouvez pas ajouter 2 règles pour un groupe!";
$language["HNR_ACTIVE"] = "Actif";
$language["HNR_SEEDTIME"] = "Temps de seed";
$language["HNR_BANUSER"] = "Utilisateur banni";
$language["HNR_ID_LEVEL"] = "Niveau du groupe auquel vous souhaitez appliquer ces règles:";
$language["HNR_DOWN_TRIG"] = "Téléchargement minimum (MB) nécessaire pour déclencher une peine potentielle:";
$language["HNR_RATIO_TRIG"] = "Ratio minimum requis pour déclencher une peine/récompense:";
$language["HNR_MIN_SEED"] = "Temps minimum de seed (heures) nécessaire pour éviter la punition:";
$language["HNR_TOLERANCE"] = "Tolérance en jours (nombre de jours autorisés à passer avant qu'ils ne soient éligibles à une peine):";
$language["HNR_UL_PUNISH"] = "Montant du crédit d'upload (MB) à prendre du membre pour H&R:";
$language["HNR_REW_SYS"] = "Système de récompense - récompense le crédit d'upload pour satisfaire aux exigences de seed par la suite:";
$language["HNR_WARN_BRIDGE"] = "Faites usage du hack d'avertissement pour rendre H&R visibles pour les autres:";
$language["HNR_DAYS"] = "jours";
$language["HNR_FOR"] = "pour";
$language["HNR_AFTER"] = "après";
$language["HNR_WARNINGS"] = "avertissements";
$language["HNR_BOOT_BRIDGE"] = "Faites appel aux hacks des utilisateurs pour expulser du  H&R:";
$language["HNR_BOOT_USER"] = "Si l'utilisateur est dans le H&R:";
$language["HNR_NEW_GROUP"] = "Ajouter un nouveau groupe";
$language["HNR_ID_LEVEL"] = "Niveau ID";
$language["HNR_USERGROUP"] = "Groupe d'utilisateurs";
$language["HNR_MIN_DOWN"] = "Minimum Download";
$language["HNR_MIN_RAT"] = "Minimum Ratio";
$language["HNR_MIN_ST"] = "Temps minimum de seed";
$language["HNR_TOL_DAYS"] = "Jours de tolérance";
$language["HNR_UL_PUN"] = "Punition d'upload";
$language["HNR_REW"] = "Récompense";
$language["HNR_WS"] = "Symbole avertir";
$language["HNR_FD"] = "Temps en jours";
$language["HNR_WIB"] = "Démarrer l'avertissement";
$language["HNR_WT"] = "temps averti";
$language["HNR_BU"] = "Utilisateurs averti";

$language["ACP_AUTORANK"] = "Administration Autorank";
$language["AUTORANK_INVALID"] = "Entrée non valide, entrez un nombre compris entre 1 et 23";
$language["AUTORANK_MAIN_1"] = "Pour éviter une surcharge excessive, seuls les utilisateurs connectés aux torrents seront scannés régulièrement pour des changements de classe.L'intégralité de la base de membre sera analysée une fois toutes les 24 heures et vous devriez définir l'heure de cette analyse ci-dessous..<br /><br /><b>Prenez note:</b> Vous devriez définir ce temps de balayage global à un temps hors pointe, mais il doit également être un moment où il y a toujours des utilisateurs susceptibles de naviguer sur votre site sinon il ne sera probablement pas déclenché.<br /><br />Les valeurs valides sont 0-23 (0 = minuit, 1 = 1:00am, 5=5:00am, 14=2:00pm etc.))";
$language["AUTORANK_MAIN_2"] = "Temps de scan complet";
$language["AUTORANK_MAIN_3"] = "Vous pouvez définir toutes les autres valeurs de";
$language["AUTORANK_MAIN_4"] = "ici";
$language["AUTORANK_SEND_PM"] = "Envoyer un MP pour informer le membre du changement de classement?";


$language["ACP_BOOTED"]="Utilisateurs en faute";
			$language["ACP_BOOTED_NM"]="Nom d'utilisateur";
$language["ACP_BOOTED_EXP"]="Date d'expiration";
$language["ACP_BOOTED_REA"]="Raison du ban ";
$language["ACP_BOOTED_WHO"]="Ban ajouté par";

// --------> modpanel
$language['ACP_MODPANEL']='Param. du panneau staff';
$language['MODCP_SECTION']='Section (La section que vous voulez autoriser votre mod / admin, c\'est la partie = xxxx dans le lien):';
$language['MODCP_DESC']='Description (si vous utilisez une définition de langue, la chaîne de langue sera utilisée, sinon la chaîne que vous avez écrite. eg: tu mets "ACP_BAN_IP" Il va afficher "'.$language['ACP_BAN_IP'].'" ):';
$language['MODCP_URL']='URL (L\'URL pour accéder à la ressource, {uid} sera remplacé par l\'id de l\'utilisateur et {ucode} eg: Lien pour banip est http://localhost/xbtit/index.php?page=admin&user={uid}&code={ucode}&do=category&action=read):';
$language['MODCP_NEWSECTION']='Ajouter une nouvelle section';
$language['NO_SECTION_ACCESS']='Vous ne pouvez pas accéder à cette section.';
// --------> modpanel



//RULES
$language["ACP_RULES_GROUP"]="Groupes de règles";
$language["ACP_RULES"]="Règles";



$language["ACP_STICKY_TORRENTS"]="Param. des Sticky";
$language["STICKY_SETTINGS"]="Param. des Sticky";
$language["COLOR"]="Couleur";
$language["LEVEL_STICKY"]="Qui peut ajouter sticky sur les torrents? (défaut: Uploader)";


// Torrent Request
$language["TRAV_REQ_SET"] = "Param. des demandes";
$language["TRAV_REQ_HO"] = "Demander en ligne ";
$language["TRAV_REQ_IB"] = "Demandes en bloc";
$language["TRAV_DUFRAP"] = "Jours jusqu'à ce que les requêtes remplies soient élaguer";
$language["TRAV_REQ_PP"] = "Demandes par page";
$language["TRAV_MILTPR"] = "Min rang pour poster des demandes";
$language["TRAV_ARIS"] = "Annoncer la demande dans la shoutbox";
$language["TRAV_MRU"] = "Utilisation max des demandes";
$language["TRAV_MNOR"] = "Nombre maximal de demandes";
$language["TRAV_RRFFAR"] = "Param. Demande avec récompense (pour remplir une demande)";
$language["TRAV_RRS"] = "Système de récompense pour demande";
$language["TRAV_RIUOS"] = "Récompense en upload ou seedbonus";
$language["TRAV_AIB"] = "Montant en bytes";
$language["TRAV_SBP"] = "Points seedbonus";
$language["TRAV_ADD_REQ"] = "Ajouter une demande";
// Torrent Request

$language['XTD_ACP']='Param. XTD ';

$language["ACP_LOTTERY"]="Loterie";
$language["LOTT_SETTINGS"]="Param. Loterie";
$language["EXPIRE_DATE"]="Date expire";
$language["EXPIRE_TIME"]="temps expire";
$language["EXPIRE_DATE_VIEW"]="(0000-00-00 Doit être ce format)";
$language["EXPIRE_TIME_VIEW"]="En heures entières";
$language["IS_SET"]="Est la date et l'heure actuelles)";
$language["NUM_WINNERS"]="Nombre de gagnants";
$language["TICKET_COST"]="Montant à payer (par billets)";
$language["MIN_WIN"]="Min montant à gagner";
$language["LOTTERY_STATUS"]="Loterie activée";
$language["VIEW_SELLED"]="Voir les billets vendus";
$language["ACP_SELLED_TICKETS"]="Billets vendus";
$language["NO_TICKET_SOLD"]="Aucun billet vendu";
$language["TICKETS"]="billets";
$language["PURCHASE"]="achat";
$language["SOLD_TICKETS"]="Billets vendus";
$language["LOTTERY"]="Loterie";
$language["MAX_BUY"]="Montant Maximum que l'utilisateur peut acheter";
$language["LOTT_ID"] = "Id";
$language["LOTT_USERNAME"] = "membre";
$language["LOTT_NUMBER_OF_TICKETS"] = "Nombre de billets";
$language["BACK_TO_LOTTERY"]="Retour à la loterie";
$language["LOTT_SENDER_ID"]="Envoyé ID pour MP";
$language["ADMIN_SB_BANNED"] = "Shoutbox interdit";

$language['tmsg1']="Message du contrôleur 1";
$language['tmsg2']="Message du contrôleur 2";
$language['tmsg3']="Message du contrôleur 3";
$language['tmsg4']="Message du contrôleur 4";


// Site Offline
$language["ACP_OFFLINE"]="Param. du Offline";
$language["OFFLINE_SETTING"]="Site est Offline?";
$language["OFFLINE_MESSAGE"]="Message hors ligne aux utilisateurs (max 200 caract, Seul l'administrateur peut accéder au site hors connexion)";

// Download Ratio Check
$language["SETTING_MIN_DLRATIO"]="Ratio minimum pour downloader";
$language["SETTING_CUSTOM_SETTINGS"]="Param. de contrôle des downloads";
$language["BYPASS_DLCHECK"]="Contourner le vérificateur de download";

// Radio
$language["RAD_SETTINGS"]="Param. de la radio";
$language['djhead']="Liste des Dj";

// Message Spy
$language["ACP_ISPY"]="Message Espion";
$language["DATE_SENT"]="Date d'envoi";
$language["MESSAGE"]="Message";

// Sport Betting - Start
$language["SB_SETTINGS"] = "Param. de paris sportifs";
$language["SB_MIN_IDL_2_BET"] = "Rang minimum pour parier";
$language["SB_FOR_ID"] = "Numéro du forum à afficher dans";
$language["SB_FOR_USER_ID"] = "L'ID du membre du forum à afficher avec ";
$language["SB_MAX_BON"] = "Maximum Pièces d'or :)";
// Sport Betting - End

// NEW USER DONATE UPLOAD
$language["SETTINGS_UPLOAD"]="Dons d'articles pour les nouveaux membres.";
$language["VALUE_UPLOAD"]="Entrez une valeur et choisissez une unité.";
$language["KB"]="Kb";
$language["MB"]="Mb";
$language["GB"]="Gb";
$language["TB"]="Tb";

// Add new Users in AdminCP
$language["ACP_ADD_USER"]='Ajouter nouveau membre';
$language["NEW_USER_EMAIL"]='Envoyer un email au nouvel utilisateur avec mot de passe';
$language["NEW_USER_EMAIL_TEXT"]='
Bonjour %s,

Vous venez d\'être ajouté à %s,
Utilisateur: %s
Mot de passe: %s
site url: %s

Nous espèrerons que vous apprécierez et  resterez avec nous
Salutations
Le Staff';

// Torrents Limit
$language["MAX_TORRENTS"] = "Maximum Torrents";

// Client ban
$language['BAN_CLIENT']='Ban Client BitTorrent ';
$language['REMOVE_CLIENTBAN']='Supprime Client BitTorrent banni';
$language['CLIENT_REMOVED']='Ce client a été supprimé de la liste interdite.<br /><br />';
$language['RETURN']='Retour';
$language['UNBAN_MAIN']='En visitant cette page, vous indiquez que vous souhaitez supprimer l\'interdiction sur le client suivant:';
$language['CONFIRM_ACTION']='Es-tu sûr de vouloir faire ça? (Vous ne recevrez aucune autre confirmation).';
$language['CLIENT_ALREADY_BANNED']='Ce client est déjà interdit!';
$language['ALL_VERSIONS']='Toutes les versions';
$language['CLIENT_ADDED']='Ce client a été ajouté à la liste interdite<br /><br />';
$language['NEED_A_REASON']='Vous devez saisir une raison!';
$language['BAN_MAIN']='En visitant cette page, vous indiquez que vous souhaitez interdire le client suivant:';
$language['BAN_ALL_VERSIONS']='Interdire toutes les versions?';
$language['REASON']='Raison';

// Ban Button
$language["ACP_BB"]="Bouton ban - IP Range";
$language["ACP_BB_USER"]="Bouton ban - membre";
$language["BB_SETTINGS"] = "Param. Bouton ban";
$language["BB_LEVEL"] = "Min Ban rang";
$language["BB_DAYS"] = "Ban jours";
$language["BB_NONE_YET_1"] = "Il ";
$language["BB_NONE_YET_2"] = "n'y";
$language["BB_NONE_YET_3"] = "a pas ";
$language["BB_NONE_YET_4"] = "d'ip";
$language["BB_NONE_YET_5"] = "banni";
$language["BB_NONE_YET_6"] = "encore";
$language["BB_NONE_YET_7"] = "ici";
$language["BB_USERS"] = "Membres";
$language["BB_NOT_ANYMORE"] = "Plus maintenant";
$language["BB_TEXT_1"] = "Les utilisateurs de cette liste sont interdits par le bouton Ban, c'est une plage IP temporaire et annoncent l'interdiction pour";
$language["BB_TEXT_2"] = "Jours, il est temporaire en raison du risque d'interdiction d'autres utilisateurs dans cette gamme aussi, l'utilisateur interdit sera probablement abandonner après avoir essayé pendant un certain temps.";
$language["BB_TEXT_3"] = "Les utilisateurs de cette liste sont interdits par le bouton d'interdiction, il durera jusqu'à ce que vous debannissez l'utilisateur, ces utilisateurs sont également interdits de l'annonce.";
$language["BB_FIRST_IP"] = "premier IP";
$language["BB_LAST_IP"] = "dernier IP";
$language["BB_BAN_ADDED"] = "Ajoutée ban";
$language["BB_BAN_EXPIRE"] = "Ban Expire";
$language["BB_ADDED_BY"] = "Ajouté par";
$language["BB_USER_COMM"] = "membre & commentaire";
$language["BB_DEL"] = "sup";
$language["BB_COMM"] = "Commentaire";
$language["BB_IP_BANNED"] = "Plage IP banni";

// Ratio Editor
$language["ACP_RATIO_EDITOR"] = "Éditeur de Ratio";
$language["RATIO_USERNAME"] = "Membre";
$language["RATIO_UPLOADED"] = "Uploadé";
$language["RATIO_DOWNLOADED"] = "Downloadé";
$language["RATIO_INPUT_MEASURE"] = "Sélectionner la mesure d'entrée:";
$language["RATIO_BYTES"] = "Bytes";
$language["RATIO_K_BYTES"] = "KBytes";
$language["RATIO_M_BYTES"] = "MBytes";
$language["RATIO_G_BYTES"] = "GBytes";
$language["RATIO_T_BYTES"] = "TBytes";
$language["RATIO_ACTION"] = "Action:";
$language["RATIO_ADD"] = "Ajout";
$language["RATIO_REMOVE"] = "Supprimer";
$language["RATIO_REPLACE"] = "Remplacer";
$language["RATIO_HEADER"] = "Mettre à jour ratio membres";
$language["RATIO_SUCCES"] = "Succes";
$language["RATIO_UPDATE_SUCCES"] = "Vous avez réussi à mettre à jour le ratio des membres";

// Duplicate Accounts
$language["DUPLICATES"]="Compte doubles";
$language["ERR_USERS_NOT_FOUND"]="Aucun utilisateur trouvé!";

// Report High Upload Speed
$language["RHUS_HIGH_UL_SUP"] = "Param. du rapport de vitesse élevé UL ";
$language["RHUS_EN_SYS"] = "Activer le système";
$language["RHUS_DIS"] = "désactivée";
$language["RHUS_REP_FROM"] = "Vitesse du rapport en (KB/s)";
$language["RHUS_REP_TU"] = "Temps de réponse/ membres";
$language["RHUS_ONLY_ONCE"] = "juste une fois";
$language["RHUS_NO_LIM"] = "Pas de limites";

// Twitter Update
$language["TWIT_REG"] = "Autoriser les post de Twitter";
$language["TWIT_AUTH_1"] = "Afin d'autoriser votre site à créer des Tweets dans votre compte Twitter, vous devez";
$language["TWIT_AUTH_2"] = "cliquez ici";
$language["TWIT_AUTH_3"] = "Et connectez-vous à votre compte Twitter. Vous verrez alors quelque chose comme ça";
$language["TWIT_AUTH_4"] = "Vous devez maintenant saisir le numéro PIN que vous recevez dans la case ci-dessous et cliquez sur le bouton soumettre";
$language["TWIT_SUBMIT"] = "Soumettre";
$language["TWIT_BAD_PIN"] = "Mauvais code PIN, la valeur saisie doit être numérique et 7 caractères. Veuillez cocher et réessayer.";
$language["TWIT_REG_MISS_1"] = "Les codes d'autorisation manquent, s'il vous plaît";
$language["TWIT_REG_MISS_2"] = "pour redémarrer ce processus";
$language["TWIT_SUCCESS"] = "Autorisation de Twitter appliquée, vos nouveaux torrents devraient maintenant être annoncés automatiquement sur votre compte Twitter.";
$language["TWIT_CURL_REQ"] = "<span style='color:red'><b>(URL requise pour activer)</b></span>";

// Torrent Moderation
$language["ACP_ADD_WARN"]="Raisons de modération de Torrent";
$language["ACP_TMOD_SET"]="Param. de modération Torrent";
$language["WARN_TITLE"]="Titre de la raison";
$language["WARN_TEXT"]="Expliquer la raison";
$language["WARN_ADD_REASON"]="Ajouter une nouvelle raison";
$language["TRUSTED"]="De confiance";
$language["TRUSTED_MODERATION"]="Modération fiable";
$language["TORRENT_STATUS"]="Statut du torrent";
$language["TORRENT_MODERATION"]="Modération";
$language["MODERATE_TORRENT"] = "Modéré";
$language["MODERATE_STATUS_OK"] = "Ok";
$language["MODERATE_STATUS_BAD"] = "Bad";
$language["MODERATE_STATUS_UN"] = "Non modéré";
$language["FRM_CONFIRM_VALIDATE"] = "Confirmeer la revalidation";
$language["MODERATE_PANEL"] = "Panneau Mod Torrent";
$language["TMOD_SEND_PM"] = "Envoyé MP sur l'approbation du torrent?";
$language["TMOD_SHOW_APPROVER"] = "Montrer qui a approuvé le torrent?";

// Uploader Medals
$language["UM_UPLOADER_MED"] = "Param. des médailles uploader";
$language["UM_HOW_MANY"] = "Vérifiez les torrents uploader dans les derniers X jours";
$language["UM_BRONZE_COUNT"] = "Nombre minimum d'uploads pour le Bronze";
$language["UM_SILVER_COUNT"] = "Nombre minimum d'uploads Pour l'Argent";
$language["UM_GOLD_COUNT"] = "Nombre minimum d'uploads pour l'or";
$language["UM_SHOWALL"] = "Afficher tout ou seulement uploaders";
$language["UM_ALLRANKS"] = "Tous les rangs";
$language["UM_UPONLY"] = "Seulement les uploaders";
$language["UM_BLOCK_LIMIT"] = "Limite de blocage";

// IMG In SB After X Shouts
$language["IMGSB_SETTINGS"] = "Images dans les Param. Shoutbox";
$language["IMGSB_AFTER"] = "Après X Shouts";
$language["IMGSB_TYPE"] = "Type";
$language["IMGSB_IMAGES"] = "Images";
$language["IMGSB_TEXT"] = "Texte";
$language["IMGSB_BOTH"] = "Both";

$language["ACP_FM_HACK_SUBMENU"]='Sous Menu';

// style bridge
$language["STYLE_BRIDGE"] = "Xbtit->Smf Style Bridge";
$language["EDIT_STYLE_BRIDGE"] = "Édit->Xbtit->Smf";
$language["EDITXB_STYLE_BRIDGE"] = "Xbtit style:";
$language["EDITSM_STYLE_BRIDGE"] = "Smf style:";
$language["EDITBTN_STYLE_BRIDGE"] = "Go";
$language["HEADXB_STYLE_BRIDGE"] = "Xbtit";
$language["HEADSM_STYLE_BRIDGE"] = "Smf";
$language["HEADSTYLE_STYLE_BRIDGE"] = "Style";
$language["HEADID_STYLE_BRIDGE"] = "Id";
$language["HEADCURR_STYLE_BRIDGE"] = "Param. actuels";
$language["EDDEL_STYLE_BRIDGE"] = "édit/sup";
$language["INSERT_STYLE_BRIDGE"] = "Insérer->Xbtit->Smf";
$language["SMF_IS_REQ"] = "<span style='color:red'><b>(Mode SMF requis pour activer)</b></span>";
// Block Comments
$language["BC_BLOCK_COMMENT"] = "Block de commentaire";

$language["TICKER_CONF"]='Configuration du controleur LED';
$language["SIGNUP_BONUS"]="Bonus d'inscription";

$language["WS_WARN_SETTINGS"]="Param. d'avertissement";
$language["WS_MAX_WL"] = "Niveau Maximum Warn";
$language["WS_AUTO_DOWN"] = "Rétrograde-auto";
$language["WS_AUTO_DOWN_INT"] = "intervalle rétrograde-auto (jours)";
$language["WS_BOOT_AT_MAX"] = "Mettre le membre au niveau max du warn";
$language["WS_BAN_BUTTON_AT_MAX"] = "Bouton Ban membre au niveau maximum du warn";
$language["WS_BAN_BUTTON_AT_MAX"] = "Bouton ban membre au niveau maximum du warn";
$language["WS_TAKE_NO_ACTION_AT_MAX"] = "Ne prenez aucune mesure à un niveau max du warn";

$language["HACK_EN_DIS_ALL"] = "Activer / Désactiver tous les Hacks";
$language["HACK_SET_ABOVE"] = "Utiliser les Param. ci-dessus";
$language["HACK_EN_ALL"] = "Activer tout";
$language["HACK_DIS_ALL"] = "Désactiver tout";


$language["HNR_TS_ONLY"] = "Temps seedé seulement";
$language["HNR_RATIO_ONLY"] = "Seulement le ratio";
$language["HNR_TS_OR_RATIO"] = "Temps seedé OU Ratio";
$language["HNR_TS_OR_RATIO_1"] = "Temps seedé <span style='color:blue;'><b>OU</b></span> Ratio";
$language["HNR_TS_AND_RATIO"] = "Temps seedé ET Ratio";
$language["HNR_TS_AND_RATIO_1"] = "Temps seedé<span style='color:green;'><b>ET</b></span> Ratio";
$language["HNR_METHOD"] = "Méthode";
$language["HNR_MIN_ST"] = "Temps minimum de seed";
$language["HNR_HOURS"] = "heure(s)";
$language["HNR_DAYS"] = "jour(s)";
$language["HNR_MIN_RATIO"] = "Ratio minimum ";
$language["HNR_TOLERANCE"] = "Tolérance";
$language["HNR_DL_TRIGGER"] = "Déclencher Download";
$language["HNR_BYTES"] = "Byte(s)";
$language["HNR_KB"] = "Kilobyte(s)";
$language["HNR_MB"] = "Megabyte(s)";
$language["HNR_GB"] = "Gigabyte(s)";
$language["HNR_TB"] = "Terabyte(s)";
$language["HNR_BLSO"] = "Block Leeching ( seulement le seed)";
$language["HNR_CFP"] = "Créer une discussion(forum)";
$language["HNR_YMSAR"] = "Sélectionner un rang!";
$language["HNR_YMSAM"] = "Sélectionner une méthode!";
$language["HNR_YMSAMST"] = "Sélectionner un temps minimum de seed!";
$language["HNR_YMSAMR"] = "Sélectionner un ratio minimum!";
$language["HNR_YMSAMSTAAMR"] = "Sélectionner un temps minimum de seed et un ratio minimum!";
$language["HNR_YMSAT"] = "Vous devez définir une tolérance!";
$language["HNR_YMSADT"] = "Vous devez définir un Déclencheur Download!";
$language["HNR_YMSAVFBL"] = "YVous devez définir une valeur pour le Bloc Leech!";
$language["HNR_BFID"] = "Bad Forum ID!";
$language["HNR_MINSEED"] = "Min. S.T.";
$language["HNR_MINRAT"] = "Min. Ratio";
$language["HNR_TOL"] = "Tol.";
$language["HNR_DLTRIG"] = "D. Trig.";
$language["HNR_BLOLEECH"] = "Block Leech";
$language["HNR_FORPOST"] = "Message forum";
$language["HNR_HRS"] = "Heures";
$language["HNR_DYS"] = "jours";
$language["HNR_SET_FOR"] = "Param. H&R pour";
$language["HNR_CONFIRM_DEL"] = "Confirmer suppression";
$language["HNR_R_U_SURE"] = "Voulez-vous vraiment supprimer ce ?";;

// Low ratio Warn & Ban System
$language['ACP_LRB']='Bas Ratio Warn & Ban';

$language["RAT_OV_SET"] = "Bas Ratio Warning & Ban Système - Param. généraux";
$language["RAT_EN_SYS"] = "Activer le système";
$language["RAT_1ST_WAR"] = "premier MP Warning ";
$language["RAT_2ND_WAR"] = "Second MP Warning ";
$language["RAT_LAST_WAR"] = "Dernier MP Warning";
$language["RAT_US_SET"] = "Bas Ratio Warning & Ban Système - Param. des groupes d'utilisateurs";
$language["RAT_RANK_ID"] = "Rang ID";
$language["RAT_MIN_DOWN"] = "Min Download pour amorcer";
$language["RAT_1ST_RAT"] = "Premier Warning Ratio";
$language["RAT_2ND_RAT"] = "Second Warning Ratio";
$language["RAT_3RD_RAT"] = "Troisième Warning Ratio";
$language["RAT_FIN_RAT"] = "Final Ban Ratio";
$language["RAT_NEXT_WARN"] = "Jours avant le prochain Warning";
$language["RAT_DBFWAB"] = "Jours entre le dernier warn et le ban";
$language["RAT_SWS"] = "Afficher le symbole du warn";
$language["RAT_NEW_GROUP"] = "Ajouter nouveau groupe";
$language["RAT_ID_LEVEL"] = "Niveau ID ";
$language["RAT_USERG"] = "Groupe d'utilisateurs";
$language["RAT_MIN_DOWN_A"] = "Min download";
$language["RAT_1ST_RAT_A"] = "1st warn ratio";
$language["RAT_2ND_RAT_A"] = "2nd warn ratio";
$language["RAT_3RD_RAT_A"] = "3rd warn ratio";
$language["RAT_FIN_RAT_A"] = "Ban ratio";
$language["RAT_DTSW"] = "Jours pour 2nd warning";
$language["RAT_DTTW"] = "Jours pour 3rd warning";
$language["RAT_DTB"] = "Jours pour ban";
$language["RAT_WS"] = "Symbole Warn";
$language["RAT_WABH"] = "Historique Warn & Ban";
$language["RAT_USER"] = "Membre";
$language["RAT_WARN_TIM"] = "Heures d'avertissement";
$language["RAT_WS_BANNED"] = "Banni";
$language["RAT_UNWARN"] = "Ne pas avertir(unwarn)";
$language["RAT_UNBAN"] = "Ne pas bannir(Unban)";
$language["RAT_GROUP_RULES"] = "Règles de groupe";
$language["RAT_NO_2ND_RULE"] = "Vous ne pouvez pas ajouter 2 règles pour un groupe!";


// Allow Upload / Download
$language["AUAD_DOWN"] = "Download";
$language["AUAD_UP"] = "Upload";

// Proxy / Blacklist
$language["ACP_PROXY"] = "Utilisateurs derrière Proxy";
$language["ACP_BLACKLIST"] = "Blacklist";
$language["PROX_ADD_TO_LIST"] = "Ajoutez IP Proxy à la Blacklist ici, recherchez IP Proxy à";
$language["PROX_PIP"] = "Proxy IP";
$language["PROX_IP"] = "IP";
$language["PROX_DA"] = "Date Ajouter";
$language["PROX_REM"] = "Supprimer";
$language["PROX_NONE_YET"] = "Aucune IP dans la Blacklist n'a encore été";
$language["PROX_SUBJ_1"] = "Proxy détecté!";
$language["PROX_MSG_1"] = "Veuillez expliquer pourquoi vous utilisez un proxy, pour l'instant vos droits de téléchargement ont été révoqués.";
$language["PROX_SUBJ_2"] = "Raison du proxy acceptée";
$language["PROX_MSG_2"] = "Nous acceptons la raison pour laquelle vous utilisez un proxy, vos droits de téléchargement ont été restaurés.";
$language["PROX_NOTHING_1"] = "Rien";
$language["PROX_NOTHING_2"] = "à";
$language["PROX_NOTHING_3"] = "voir";
$language["PROX_NOTHING_4"] = "ici";
$language["PROX_NOTHING_5"] = "encore";
$language["PROX_ALL_DL"] = "Permettre DL";
$language["PROX_PUNISH"] = "Punir";


//FAQ
$language["ACP_FAQ_GROUP"]="Groupes de la faq";
$language["ACP_FAQ"]="Faq";
$language["ACP_FAQ_QUESTION"]="Foire aux questions";

// Gifts
$language["ACP_GIFTS"] = "Cadeaux";
$language["GIFTS_SELECT"] = "Sélectionner le receveur";
$language["GIFTS_NAME"] = "Membre";
$language["GIFTS_RANK"] = "Rang";
$language["GIFTS_ALL"] = "tout";
$language["GIFTS_INV"] = "Invité";
$language["GIFTS_SB"] = "Seedbonus";
$language["GIFTS_SBP"] = "Points de seedbonus ";
$language["GIFTS_ACTION"] = "Sélectionner le genre";
$language["GIFTS_USER_NAME"] = "Si utilisateur";
$language["GIFTS_IF_RANK"] = "Si le rang";
$language["GIFTS_WHO"] = "Qui devrait obtenir le cadeau";
$language["GIFTS_WHAT"] = "Cadeaux";
$language["GIFTS_NUMBER"] = "Combien?";
$language["GIFTS_SUCCES"] = "Succes";
$language["GIFTS_UPDATE_SUCCES"] = "Le(s) utilisateur(s) choisis ont reçu leur cadeau";
$language["No_GO_INV"] = "Vous ne pouvez pas donner d'invitations car le système d'invitation est désactivé!";
$language["No_GO_SB"] = "Vous ne pouvez pas donner seedbonus points comme seedbonus système est désactivé!";
$language["GIFT_SUBJECT"] = "Vous avez reçu un cadeau";
$language["GIFT_MES_A"] = "Vous avez reçu";
$language["GIFT_MES_B"] = "Ceci est un message système automatique, s'il vous plaît ne pas répondre";
$language["GIFT_ERROR_MSG"] = "Quelque chose s'est mal passé ?!";
$language["GIFT_CUSTOM"] = "Texte de la raison du cadeau (MP)";
$language["GIFT_TEXT"] = "Texte";

// staff control
$language['ACP_STAFF_CONTROL'] = "Contrôle Staff";
$language['MO']= 'Voulez-vous vraiment définir l\'ancien rang de cet utilisateur?';
$language['MA']= 'annuler';
$language['AUSER']= 'Membre';
$language['OL']= 'Ancien Rang';
$language['NE']= 'Nouveau Rang';
$language['BY']= 'Fait par';
$language['DA']= 'Quand';
$language['SC']= 'Contrôle Staff';
$language['UNDONE']= 'Défait';
// Birthday hack
$language["ACP_BIRTHDAY"]="Param. de Hack d'anniversaire";
$language["BIRTHDAY_LOWER_LIMIT"]="Age minimum du membre";
$language["BIRTHDAY_UPPER_LIMIT"]="Age maximum du membre";
$language["BIRTHDAY_BONUS"]="Bonus d'anniversaire par année";
$language["BIRTHDAY_FORMAT_GB"]="GB";
$language["BIRTHDAY_FORMAT_MB"]="MB";
$language["BIRTHDAY_UPDATED"]="Merci, vos Param. du Hack d'anniversaire ont ​​été mis à jour";
$language["BACK"]="Retour";
// PM Banned
$language["PMB_BANNED"] = "MP banni";

$language["FORUM_DISPLAY_TYPE"] = "Afficher le forum intégré dans:";
$language["FORUM_OPTION_1"] = "une iframe (défaut)";
$language["FORUM_OPTION_2"] = "La même fenêtre";
$language["FORUM_OPTION_3"] = "Une nouvelle fenêtre";

$language["PEERS_VIEW_PEERS"] = "Voir Peers";
$language["PEERS_VIEW_HIST"] = "Voir Historique";
$language["PEERS_VIEW_USERD"] = "Voir les détails des utilisateurs Torrents";

$language["ACP_DPS_SETTINGS"]="Dwnld Prefix/Suffix Setup"; # shortened download to dwnld & changed settings to setup for proper menu display
$language["DPS_PREFIX"]="Préfixe du fichier torrent";
$language["DPS_SUFFIX"]="Suffixe du fichier torrent";
$language["DPS_EXAMPLE"]="Exemple";
$language["DPS_EXAMPLE_TORR"]="Some.Movie.2011.DVDRip.XviD-SomeTeam.torrent";
$language["DPS_BEFORE"]="Avant";
$language["DPS_AFTER"]="Après";

$language["ACP_UPL_RIGHTS"]="Param. des droits des uploader";
$language["UPRI_EDIT"]="Autoriser l'uploader à modifier son propre torrent";
$language["UPRI_DELETE"]="Autoriser l'uploader à supprimer son propre torrent";

$language["ACP_PG_SETT"]="Pager Type Settings";
$language["PG_TYPE"]="Select Pager Type";
$language["PG_OLD"]="Vieux Style";
$language["PG_NEW"]="Nouveau Style";

$language["BAN_CHEAPMAIL"]="bannir des mauvais domaines de messagerie";
$language["ERR_WILDCARD_1"]="Le caractère générique ";
$language["ERR_WILDCARD_2"]=" Est déjà sur la liste des mauvais domaines donc il n'est pas nécessaire de l'ajouter ";
$language["ERR_WILDCARD_3"]=" À la liste.";
$language["CHEAP_CONFIRM_1"]="Etes-vous sûr que vous voulez supprimer? ";
$language["CHEAP_CONFIRM_2"]="Vous ne recevrez aucune autre confirmation";
$language["CHEAP_DELETED_1"]=" a été supprimé";
$language["CHEAP_DELETED_2"]="Cliquez ici";
$language["CHEAP_DELETED_3"]="pour revenir";
$language["ERR_CHEAP_SUBMIT"]="Vous devez entrer une valeur dans la zone de texte!!";
$language["CHEAP_ADDED"]=" A été ajouté à la liste des mauvais domaines mail";
$language["ERR_CHEAP_DUPE"]=" Est déjà sur la liste des mauvais domaines mail";
$language["CHEAP_CURRENT"]="Mauvais domaines mail actuel";
$language["ADDED_BY"]="Ajouter par";
$language["CHEAP_COUNT_1"]="A trouvé ";
$language["CHEAP_COUNT_2"]=" Mauvais domaines mail";
$language["CHEAP_ADD"]="Ajouter Mauvais domaines mail:";

$language["UP_CONTROL"]="Controle des uploader ";
$language["UP_RANK_UPL"]="Rang - Uploader";
$language["UP_RANK_OTH"]="Rang - Autre";
$language["UP_LAST_ONLINE"]="Dernier Online";
$language["UP_LAST_UPLOAD"]="Dernier Upload";
$language["UP_DAYS_AGO"]="Il y a quelques jours";
$language["UP_ACT_UPL"]=" Uploads actif";

$language["IP2C_DB_IMP1"]="La base de données IP2country a été importée avec succès, vous pouvez maintenant activer le hack";
$language["IP2C_DB_IMP2"]="ici";
$language["IP2C_DB_REQ1"]="<span style='color:red'><b>(Importation de base de données (6.5MB) Nécessaires pour activer, ";
$language["IP2C_DB_REQ2"]="cliquez ici";
$language["IP2C_DB_REQ3"]="Pour importer.</b></span>";

$language["AVATAR_UPLOAD"] = "Avatar Upload";
$language["MAX_FILE_SIZE"] = "Max. Taille du fichier! (in kb)";
$language["MAX_IMAGE_SIZE"] = "Max. Taille de l'image!";
$language["IMAGE_WIDTH"] = "Largeur";
$language["IMAGE_HEIGHT"] = "Hauteur";
$language["AVATAR_UPLOAD_SET"] = "Param. Avatar Upload";

$language["UN_SETTINGS"] = "Param. des notes d'utilisateur";
$language["UN_NOTEMOD"] = "Modifier/supprimer notes";
$language["UN_ENABLED"] = "Activée";
$language["UN_DISABLED"] = "désactivé";
$language["UN_AUTONOTE"] = "Note automatique sur l'utilisateur pour";
$language["UN_INVITE"] = "invitation";
$language["UN_BONUS"] = "Pièces d'or";
$language["UN_DONATE"] = "Dons";
$language["UN_WARN"] = "Avertissement";
$language["UN_HNR"] = "H&R";
$language["UN_AUTORANK"] = "Autorank";
$language["UN_BOOTED"] = "fut élaguer";
$language["UN_SBBAN"] = "ban de la shout";
$language["UN_BANBUT"] = "bouton ban";
$language["UN_PARKED"] = "stationner";
$language["UN_LRBE"] = "Ban pour bas ratio";
$language["UN_BIRTHDAY"] = "Anniversaire";
$language["UN_SBOX_REM"]="N'est plus interdit de Shoutbox";
$language["UN_SBOX_ADD"]="A été empêché d'utiliser le Shoutbox";
$language["UN_BAN_BUT_2"]="N'est plus interdit par le biais du bouton ban";
$language["UN_NOTESPERPAGE"]="Notes par page";

$language["VIEW_NFO"]="Voir NFO";

$language["RREG_SETTINGS"]="Param. d'enregistrement aléatoire";
$language["RREG_OPEN_FOR"]="Enregistrement ouvert pour";
$language["RREG_AT_A_TIME"]="le temps";
$language["RREG_RANDOM_WINDOW"]="ouverture Minimum/Maximum";
$language["RREG_MINUTES"]="minute(s)";
$language["RREG_AF_CLOSE"]="Après la dernière fermeture de l'inscription";

// FORUM AUTO-TOPIC
$language['ACP_CATFORUM_CONFIG']='Configuration automatique des rubriques du forum';
$language['ACP_CATFORUM_SELECT']='Forum Auto-Topic';
$language['AUTOTOPIC_MESS1']='<br />Ici vous pouvez activer auto-topic sur torrent upload dans votre forum.<br>Vous pouvez choisir le forum interne, SMF ou IPB dans les Param. du Tracker afin d\'utiliser cette fonctionnalité.';
$language['AUTOTOPIC_MESS2']='<br>Sélectionnez le forum qui va sur quel catégorie.<br>Les modifications s\'appliqueront immédiatement. Vous pouvez choisir un seul forum par catégorie de torrent.<br>Seuls les torrents téléchargés après l\'activation auront le sujet du forum automatique.<br />';
$language['AUTOTOPIC_ACTIVE']='Activer Auto-Topic';
$language['AUTOTOPIC_PREFIX']='Préfixe de la rubrique <br />Choisissez un préfixe avant le nom de la rubrique, e.g. "[Nouveau Torrent] ".';

$language["VIEW_REENC"]="Voir Ré-encodé";
$language["ACP_REENC_SET"]="Param. Ré-encode";
$language["ACP_SHOUTANN_SET"]="Param. des annonces Shoutbox";
$language["SHOUTANN_SHOW_UP"]="Afficher le nom de l'uploader sur le nouveau torrent";


$language["ACP_STCOMM_SET"]="Param. des commentaires Staff";
$language["SCOMM_MIN_SET"]="Rang minimum pour ajouter un commentaire";
$language["SCOMM_MIN_ADD"]="Rang minimum pour voir les commentaires";
$language["SCOMM_MIN_SET_LRO"]="Rang minimum pour ajouter un commentaire";
$language["SCOMM_MIN_ADD_LRO"]="Rang minimum pour voir les commentaires";

$language["ACP_RECOMMEND_SET"]="Param. recommander pour les Torrent";
$language["RTORR_MAX_TO_DISP"]="Torrents maximums recommandés";

$language["ACP_UIMG_SET"]="Param. des images des utilisateurs";
$language["ACP_UIMG_START"]="Images utilisateur - Start";
$language["ACP_UIMG_END"]="Images utilisateurs - End";

$language["ACP_SECSUI_SET"]="Param. de la Security Suite";
$language["SECSUI_QUAR_SETTING"]="Param. de quarantaine des fichiers Uploadé";
$language["SECSUI_QUAR_TERMS_1"]="Termes de recherche de quarantaine(Un par ligne)";
$language["SECSUI_QUAR_TERMS_2"]="Veuillez ajouter des mots qui déclencheront la quarantaine des fichiers ci-dessous:";
$language["SECSUI_QUAR_TERMS_3"]="REMARQUE: Il n'est pas conseillé d'ajouter <b><&#63;</b> ou <b>&#63;></b> Comme cela peut se produire naturellement dans le fichier, vous devez plutôt définir la valeur de<b>short_open_tag</b> à <b>Off</b> Dans php.ini, cela empêchera votre site d'exécuter du code php qui commence par<b><&#63;</b> Et forceront les pirates potentiels à utiliser la longue balise php open(<b><&#63;php</b>) au lieu.<br /><br />La valeur actuelle est:<br />";
$language["SECSUI_QUAR_DIR_1"]="Annuaire de quarantaine";
$language["SECSUI_QUAR_DIR_2"]="Ce dossier devrait idéalement être impossible d'accéder par l'Internet et être au moins un niveau au-dessus de votre dossier racine du tracker par exemple:";
$language["SECSUI_QUAR_DIR_3"]="Assurez-vous que vous CHOWN / CHMOD ce répertoire de manièécrire des fichiers à elle.";
$language["SECSUI_QUAR_PM"]="Tracker ID to PM when files are quarantined";
$language["SECSUI_QUAR_INV_USR"]="Membre invalide";
$language["SECSUI_PASS_SETTINGS"]="Param. du mot de passe";
$language["SECSUI_PASS_TYPE"]="Méthode de hachage des mots de passe";
$language["SECSUI_PASS_INFO"]="Ici vous pouvez sélectionner l'algorithme de hachage de mot de passe que vous souhaitez utiliser xbtitFM quand il stocke le mot de passe dans la base de données:";
$language["SECSUI_NO_MEMBER"]="Aucun membre n'existe avec cet id";
$language["SECSUI_GAZ_TITLE"]="Gazelle Site Salt";
$language["SECSUI_GAZ_DESC"]="Vous devez définir une valeur aléatoire ici, une fois réglé, vous ne devriez pas le modifier alors que cette méthode de hachage est utilisée sinon tout le monde devra récupérer ses mots de passe.";
$language["SECSUI_COOKIE_SETTINGS"]="Param. des cookies";
$language["SECSUI_COOKIE_PRIMARY"]="Param. des cookies principaux";
$language["SECSUI_COOKIE_TYPE"]="Type de cookie";
$language["SECSUI_COOKIE_EXPIRE"]="Les cookies expireront";
$language["SECSUI_COOKIE_T1"]="Classique xbtit";
$language["SECSUI_COOKIE_T2"]="Nouveau xbtitFM (Regulier)";
$language["SECSUI_COOKIE_T3"]="Nouveau xbtitFM (Session)";
$language["SECSUI_COOKIE_NAME"]="Nom du cookie";
$language["SECSUI_COOKIE_ITEMS"]="Cookie Items";
$language["SECSUI_COOKIE_PATH"]="Cookie Path";
$language["SECSUI_COOKIE_DOMAIN"]="Cookie Domain";
$language["SECSUI_COOKIE_MIN"]="Minute";
$language["SECSUI_COOKIE_MINS"]="Minutes";
$language["SECSUI_COOKIE_HOUR"]="Heure";
$language["SECSUI_COOKIE_HOURS"]="Heures";
$language["SECSUI_COOKIE_DAY"]="jour";
$language["SECSUI_COOKIE_DAYS"]="jours";
$language["SECSUI_COOKIE_WEEK"]="semaine";
$language["SECSUI_COOKIE_WEEKS"]="semaines";
$language["SECSUI_COOKIE_MONTH"]="Mois";
$language["SECSUI_COOKIE_MONTHS"]="Mois";
$language["SECSUI_COOKIE_YEAR"]="An";
$language["SECSUI_COOKIE_YEARS"]="Ans";
$language["SECSUI_COOKIE_TOO_FAR"]="Je suis désolé, cela mettrait la date d'expiration après la limite actuelle de Tue, 19 Jan 2038 03:14:07 GMT, s'il vous plaît ajuster votre date d'expiration en conséquence!";
$language["SECSUI_COOKIE_PSALT"]="Password Salt";
$language["SECSUI_COOKIE_UAGENT"]="User Agent";
$language["SECSUI_COOKIE_ALANG"]="Acceptez Langage";
$language["SECSUI_COOKIE_IP"]="Adresse IP";
$language["SECSUI_COOKIE_DEF"]="REMARQUE: tous les types de cookies incluront par défaut:<br /><br /><li>Tracker ID</li><li>Hash de mot de passe</li><li>Nombre aléatoire</li>";
$language["SECSUI_COOKIE_PD"]="NOTE: Si vous n'êtes pas sûr de ce qu'il faut mettre \"Cookie Path\" ou \"Cookie Domain\", vous devriez les laisser vides et les valeurs par défaut seront utilisées";
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
$language["SECSUI_COOKIE_IP_TYPE_13"] = "Adresse IP complète (Y.Y.Y.Y)";
$language["SECSUI_PASSHASH_TYPE_1"] = "Classique xbtit";
$language["SECSUI_PASSHASH_TYPE_2"] = "TBDev";
$language["SECSUI_PASSHASH_TYPE_3"] = "TorrentStrike";
$language["SECSUI_PASSHASH_TYPE_4"] = "Gazelle";
$language["SECSUI_PASSHASH_TYPE_5"] = "Simple Machines Forum";
$language["SECSUI_PASSHASH_TYPE_6"] = "Nouveau xbtit";
$language["SECSUI_PASSHASH_TYPE_7"] = "Nouveau xbtitFM";
$language["SECSUI_PASS_MUST"] = "Le mot de passe doit";
$language["SECSUI_PASS_BE_AT_LEAST"] = "Être au moins";
$language["SECSUI_PASS_HAVE_AT_LEAST"] = "Avoir au moins";
$language["SECSUI_PASS_CHAR_IN_LEN"] = "Caractère en longueur";
$language["SECSUI_PASS_CHAR_IN_LEN_A"] = "Caractères en longueur";
$language["SECSUI_PASS_LC_LET"] = "lettre minuscule";
$language["SECSUI_PASS_LC_LET_A"] = "minuscules";
$language["SECSUI_PASS_UC_LET"] = "upper case letter";
$language["SECSUI_PASS_UC_LET_A"] = "majuscules";
$language["SECSUI_PASS_NUM"] = "nombre";
$language["SECSUI_PASS_NUM_A"] = "nombres";
$language["SECSUI_PASS_SYM"] = "symbole";
$language["SECSUI_PASS_SYM_A"] = "symboles";
$language["SECSUI_PASS_ERR_1"] = "Vous ne pouvez pas avoir une valeur plus élevée pour les cas + minuscules + les chiffres + les symboles";
$language["SECSUI_PASS_ERR_2"] = "Que vous avez pour le nombre minimum de caractères nécessaires dans le mot de passe";

$language["SMF_MIRROR"] = "SMF Mirror";
$language["GROUP_SMF_MIRROR"] = "Miroir de rang sur le forum SMF pour les changements de rang, etc.";
$language["SMF_LIST"] = "<b><u>Groupe actuel  SMF  Liste de la base de données</u></b><br />";
$language["IPB_AUTO_ID"] = "IPB Autopost ID";
$language["IPB_MIRROR"] = "IPB Mirror";
$language["GROUP_IPB_MIRROR"] = "Miroir de rang sur le forum IPB pour les changements de rang etc.";
$language["IPB_LIST"] = "<b><u>Groupe actuel IPB Liste de la base de données</u></b><br />";

$language["ACP_CBT"]="Outils de sauvegarde Cooly";
$language["ACP_BUFILES"]="Sauvegarde de fichier";
$language["ACP_BUDB"]="Sauvegarde MYSQL";
$language["ACP_BUINFO"]="Générer de nouveau";
$language["ACP_BUINFO_C"]="Config";
$language["ACP_BUINFO_S"]="Exportation";
$language["ACP_BUINFO_EX"]="Exporter vers SFTP";
$language["ACP_BUINFO_EXI"]="Exporter une sauvegarde sur votre serveur SFTP";
$language["ACP_BUINFO_AB"]="Sauvegardes disponibles";
$language["ACP_BUINFO_BP"]="Chemin de sauvegarde:";
$language["ACP_BUINFO_EF"]="(Nom exact)";
$language["ACP_BUINFO_FS"]="Barre oblique requise.";
$language["ACP_BUINFO_SUCCESS"]="Le fichier a été transféré!";
$language["ACP_BUINFO2"]="Avertissement ne pas naviguer pendant une sauvegarde est en cours.";


$language['Watchu']= 'Utilisateurs Watché';
$language['WatchL']= 'Liste Watché';

$language["DDL_ADD_ED"] = "Ajou/Edit Direct Download";
$language["DDL_VIEW"] = "Voir Direct Download";

$language["ACP_BALL_SET"] = "Balloons/Mouseover Setup"; # changed settings to setup and shotened the menu discription for proper menu display
$language["BALL_DEFAULT"] = "Priorité d'image";
$language["BALL_IMGUP"] = "image de l'upload";
$language["BALL_IMDB"] = "Poster IMDB ";

$language["ACP_ONLINE_SET"] = "Param. du bloc onligne";
$language["ONLINE_TIMEOUT"] = "Délai d'attente du bloc onligne (minutes)";

$language["PRICE_FOR_HNR"] = "Le prix pour H&R diminue";

$language["ACP_SHOWPORN_SET"]="Voir/Masquer Param. de Porn";
$language["SP_PORN_CAT"]="Votre catégorie Porn";
$language["SP_PORN_CATS"]="Vos catégories de Porn";
$language["SP_MULTI_CAT"]= "Si vous avez plusieurs catégories de Porn, vous pouvez les inscrire comme une liste séparée par des virgules, par exemple <span style='font-weight:bold;'>1,2,3</span>";
$language["SHOUT_PAGER_LIMIT"]="Shouts par page (Shoutbox History)";

$language["STYLE_TYPE"]="Type de style";
$language["CLA_STYLE"]="système de style classique XBTIT";
$language["ATM_STYLE"]="système de style de atmoner";
$language["PET_STYLE"]="système de style de Petr1fied";

$language["IMGUP_MAXW"]="Largeur maximale";
$language["IMGUP_MAXH"]="Hauteur maximale";

$language["VIPFL_FREELEECH"] = "VIP Freeleech";

$language["HOS_CAN_HIDE"] = "Peut cacher";
$language["HOS_SEE_HIDDEN"] = "Voir les membres cachés";
$language["FLOW_LIM"]="Limite de flux d'image";
$language["FLOW_CATS"]="Catég. de flux d'image";
$language["FLOW_SET"]="Param. de flux d'images";

$language["IMGFL_PRIORITY"]="Priorité du flux d'image";
$language["IMGFL_IU"]="Image Upload";
$language["IMGFL_IMDB"]="Affiche IMDB";

// Upload Multiplier
$language["UPM_SET_MULTI"] = "Définir le multiplicateur sur les torrents";
$language["UPM_VIEW_MULTI"] = "Afficher les torrents avec le multiplicateur";
$language["UPM_SET_MULTI_SHORT"] = "Set multi";
$language["UPM_VIEW_MULTI_SHORT"] = "Voir multi";

$language["BUMP_CANBUMP"] = "Mettre torrents au haut de la liste";
$language["BUMP_CANBUMP_SHORT"] = "Monter torrents";

$language["ACP_ARCHIVE_SET"] = "Param. du système d'archivage";
$language["ARC_OLDER_THAN"] = "Archive des torrents plus vieux que";
$language["ARC_HOURS"] = "heure(s)";
$language["ARC_DAYS"] = "jour(s)";
$language["ARC_WEEKS"] = "semaine(s)";
$language["ARC_BONUS"] = "Supplément de bonus par heure pour l'obtention de torrents archivés";

$language["ARC_VIEW_NEW"]="Voir nouveaux torrents";
$language["ARC_UP_NEW"]="Upload nouveaux Torrents";
$language["ARC_DOWN_NEW"]="Download Nouveaux Torrents";
$language["ARC_VIEW_ARC"]="Voir les Torrents archivés";
$language["ARC_UP_ARC"]="Upload des torrents archivés";
$language["ARC_DOWN_ARC"]="Download des torrents archivés";

$language["ADS_PRE"]="Aperçu de votre AD";
$language["ADS_AREA"]="Région";
$language["ADS_CON"]="Contenu";
$language["ADS_EDT"]="Modifier";
$language["ADS_EN"]="Activée";
$language["ADS_H"]="Entête";
$language["ADS_LT"]="haut à gauche";
$language["ADS_LB"]="bas à gauche";
$language["ADS_RT"]="Haut droit";
$language["ADS_RB"]="Bas droit";
$language["ADS_AC"]="Au-dessus des commentaires";
$language["ADS_F"]="Bas de page";
$language["ADS_PREV"]="Aperçu";
$language["ADS_VIEW"]="Quels groupes voient";
$language["ADS_CONF"]="Config ADS";
$language["SETUP_MSG"]="Installer";
$language["SETUP_MSG2"]="Instal. de Bienvenue MP";
$language["PREVIEW_MSG"]="Aperçu";
$language['HACK_ENABLE_ALL_WARN']="Avertissement: Juste parce que cette option est ici, ce n'est pas nécessairement une bonne idée de l'utiliser.\\n\\nL'activation de tous les hacks d'un seul coup aura un effet néfaste.\\nVous devrez désactiver de nombreuses fonctionnalités disponibles par défaut et\\nprobablement finir par chercher une aiguille dans une botte de foin quand \\nviendra d'essayer de configurer les hacks par la suite.\\n\\nAu lieu de cela, nous vous conseillons de ne permettre que les hacks que vous avez réellement\\nbesoin et aussi de créer progressivement votre liste de hacks activés.\\nDe cette manière  vous pouvez configurer les paramètres de chaque hack au fur et à mesure.\\n\\nVous pouvez évidemment ignorer cet avertissement et continuer à utiliser\\ncette option de toute façon, mais vous avez été averti!";
$language["LGO_TITLE"]="Ordre logique";
$language["LRO_INFO"]="Ordre de rang logique (Permet une meilleure sélection de gamme)";
$language["LRO_ERR_BLOCK"]="Vous n'avez pas configuré correctement les ordres de classement logique. Assurez-vous que tous les rangs ont une valeur unique et qu'ils sont dans l'ordre de priorité / importance du plus bas (1), par exemple, invité au plus haut, par exemple, propriétaire. (Vous pouvez avoir des lacunes entre les nombres).<br /><br />Vous pouvez configurer les ordres de classement logique";
$language["FLS_ENABLE"]="Activer Slots Freeleech ?";
$language["FLS_COST"]="Coût par Slot Freeleech";
$language["FLS_PRICE_FOR_FLS"]="Prix ​​pour slot Freeleech";
$language["FLS_ACP_ADMIN"] = "Admin. Slot Freeleech";
$language["FLS_AFFECT"] = "Qu'est-ce qui affecte";
$language["FLS_INDIV"] = "Membre individuel";
$language["FLS_GROUP"] = "Gamme de rangs";
$language["FLS_NEED_RO"] = "Cette page d'administration nécessite également la<b>commande de rang logique</b> hack pour être activé.<br /><br />Vous pouvez l'activer";
$language["FLS_RANK_RANGE"]="Class. de rang:";
$language["FLS_OPTIONS"]="Tâche à accomplir:";
$language["FLS_SET_SLOTS_TO"]="Définissez les slots de Freeleech à cette valeur:";
$language["FLS_ZERO_AND_CANCEL"]="Zéro slots et annulé les torrents Freeleech";
$language["FLS_INCREMENT_SLOTS"]="Augmentation des slots de Freeleech par:";
$language["FLS_NO_USER"]="Aucun nom d'utilisateur n'a été saisi!";
$language["FLS_USER_INVALID"]="Utilisateur inexistant!";
$language["FLS_INC_BY_ZERO"]="Vous ne pouvez pas augmenter par zéro, rien ne changerait!";
$language["FLS_JOB_DONE"]="Succès de l'opération demandée.";
$language["FLS_RANGE_ERROR"]="La gamme de rang doit être dans l'ordre du plus bas au plus élevé.";
$language["ACP_TOW_SETTINGS"]="Param. du torrent de la semaine";
$language["TOW_TORRENT_SEARCH"]="Nom de fichier pour rechercher";
$language["TOW_SEL_TORR"]="Torrent sélectionné";
$language["TOW_SUCCESS_1"]="Votre modification a été appliquée avec succès.";
$language["TOW_SUCCESS_2"]="Pour retourner à l'index.";
$language["TOW_CLICK"]="Cliquez ici";
$language["TOW_CHOOSE"]="Choisissez-en un";
$language["TOW_CHOOSE_SET"]="Choisissez les param.";
$language["TOW_SEL_FOR"]="Sélectionnez pour";
$language["TOW_THIS_WEEK"]="Cette semaine";
$language["TOW_NEXT_WEEK"]="Semaine prochaine";
$language["TOW_IMUP"]="Image upload";
$language["TOW_IMPRI"]="Priorité d'image";
$language["TOW_MOVE_ALONG"]="Rien à régler ici";
$language["TOW_SET_MULTI"]=" Ajuster multiplicateur";
$language["TOW_REV_AFTER"]="Revenir après l'expiration";
$language["TOW_SET_GOLD"]="Ajuster OR";
$language["TOW_NO_TORR"]="Pas de torrents correspondants trouvés!";
$language["CAPTCHA_CONFIG"]="Config Captcha";
$language["CAPTCHA_PUB"]="Clé publique";
$language["CAPTCHA_PRIV"]="Clé privée";
$language["CAPTCHA_DESC"]="S'inscrire <a target=\"_new\" href=\"http://www.google.com/recaptcha\">Ici</a> Ajoutez votre domaine et obtenez vos clés.";
$language["SANITY_DOITNOW"]="Fais le maintenant!";
$language["ACP_PROTUSER_SETTINGS"]="Param. protection nom d'utilisateur";
$language["PROTUSER_ADD_NAMES"]="Nom d'utilisateur protégé (un par ligne)";
$language["HTML_PARSE"]="Télécharger le nom du fichier Type Parser ";
$language["HTML_SPECIAL"]="<a href='javascript:poppeer(\"http://php.net/manual/en/function.htmlspecialchars.php\");'>htmlspecialchars</a>";
$language["HTML_ENT"]="<a href='javascript:poppeer(\"http://php.net/manual/en/function.htmlentities.php\");'>htmlentities</a>";
$language["ACP_INTFORUMPOLL_SETTINGS"]="Param. du sondage intégré du forum";
$language["INTFPOLL_MON"]="Forum pour surveiller les sondages";
$language["ACP_TAC_SETTINGS"]="Config. couleur de l'activité du torrent"; # edited spelling of colour to color and changed settings to setup for proper menu display
$language["TAC_SNATCHED_PREFIX"]="Couleur du préfixe saisi (eg <span style='color:blue;'>&lt;span style=&#39;color:blue;&#39;&gt;)</span>";
$language["TAC_SNATCHED_SUFFIX"]="Couleur du suffixe saisi (eg <span style='color:blue;'>&lt;&#47;span&gt;</span>)";
$language["TAC_LEECHING_PREFIX"]="Couleur de préfixe de leech (eg <span style='color:red;'>&lt;span style=&#39;color:red;&#39;&gt;</span>)";
$language["TAC_LEECHING_SUFFIX"]="Couleur du suffixe de Leech (eg <span style='color:red;'>&lt;&#47;span&gt;</span>)";
$language["TAC_SEEDING_PREFIX"]="Couleur du préfixe de Seed (eg <span style='color:green;'>&lt;span style=&#39;color:green;&#39;&gt;</span>)";
$language["TAC_SEEDING_SUFFIX"]="Couleur du suffixe de Seed (eg <span style='color:green;'>&lt;&#47;span&gt;</span>)";
$language["TAC_HIDE_DOWN_IMG"]="Masquer les icônes des torrents downloadé";

$language["ACP_TVDB_SETTINGS"]="Param. TVDB";
$language["TVDB_CATS"]="Sélectionnez vos catégories de TV";
$language["TVDB_MIN_RATING"]="taux minimal de vote de l'image du membre";
$language["TVDB_MIN_VOTERS"]="Nombre minimum d'utilisateurs pour voter sur une image";
$language["IMGFL_TVDB"]="affiche TVDB au hasard";
$language["TVDB_PRIORITY_1"]="1 ière priorité";
$language["TVDB_PRIORITY_2"]="2 ième priorité";
$language["TVDB_PRIORITY_3"]="3 ième priorité";
$language["TVDB_PRIORITY_ERR1"]="Mauvais données du formulaire!";
$language["TVDB_PRIORITY_ERR2"]="Les boîtes de priorité doivent contenir différentes sélections!";
$language["TVDB_ADD_AWK"]="Ajouter un titre";
$language["TVDB_AWK_EXPLAIN"]="Parfois, malgré les meilleurs efforts, nous ne pouvons saisir correctement les informations de la série TV de TheTVDB. Vous pouvez ajouter une exception ici pour remplacer l'analyse automatique des noms afin que les uploads futurs fonctionnent correctement.";
$language["TVDB_REL_NAME"]="Nom de l'émission, exemple pour<br /><span style='color:green;'>Beauty.and.the.Beast.2012.S01E16.720p.HDTV.x264-IMMERSE</span><br />Seulement <span style='color:green;'>Beauty.and.the.Beast.2012</span> Serait ajouté.";
$language["TVDB_DELIM"]="Ce qui est utilisé pour casser les mots dans le nom de la version ci-dessus<br />(habituellement <span style='color:green;'>.</span> ou <span style='color:green;'>_</span> Ou occasionnellement un espace)";
$language["TVDB_CURR_AWK"]="Current Awkward Titles";
$language["TVDB_REL_NAME_SHORT"]="Nom de l'émission";
$language["TVDB_DELIM_SHORT"]="Delimiteur";
$language["TVDB_AWK_ERR"]="Si vous ajoutez un titre , vous devez ajouter:<br /><ul><li>le nom de l'émission.</li><li>Le type de délimiteur utilisé.</li><li>L'ID de la série TVDB.</li></ul><span style='color:red;font-weight:bold;'>Tous les 3 éléments sont nécessaires!</span>";
$language["TVDB_HIDE_IMDB"]="Cacher IMDB sur les Détails du Torrent s'il existe déjà des informations de TheTVDB?";

$language["ADV_PRUNE_MAX_VAL"]="Élaguez les comptes non valides après";
$language["ADV_PRUNE_MAX_TOR"]="Élaguez automatiquement les torrents après";
$language["ADV_DAYS"]="jours";
$language["ADV_PRUNE_FIRST_WARN"]="1 er avertissement d'élaguage après";
$language["ADV_PRUNE_FIRST_WARN_MSG"]="1 er message d'avertissement";
$language["ADV_PRUNE_SECOND_WARN"]="Second avertissement d'élaguage après";
$language["ADV_PRUNE_SECOND_WARN_MSG"]="Second message d'avertissement";
$language["ADV_DEL_AFTER"]="Supprimer membre après une autre";
$language["ADV_EXEMPT_RANKS"]="Rangs exempts d'être élagués";
$language["ADV_KEY"]="Touche de remplacement de message";
$language["ADV_USERNAME1"]="Nom du Tracker";
$language["ADV_USERNAME2"]="dans votre cas";
$language["ADV_SEE_BELOW"]="Voir ci-dessous";
$language["ADV_PRUNE_CURRENTLY"]="actuellement";
$language["ADV_PRUNE_FINAL_MSG"]="Message final ";
$language["SEO_MODRW_REQ"]="<span style='color:red;font-weight:bold;'>Apache \"mod_rewrite\" Un module est requis pour permettre ce hack.</span>";
$language["CAN_BOOT_USERS"]="Expulser membres";
$language["ACP_RESEED_SETTINGS"]="Param. de reseed";
$language["RESEED_MIN_SEE"]="Minimum de seeds";
$language["RESEED_MIN_FIN"]="Minimum terminé";
$language["RESEED_MIN_LEE"]="Minimum de leechers";
$language["RESEED_MIN_TOR"]="Minimum âge du torrent (jours";
$language["RESEED_MIN_REQ"]="Minimum Jours depuis la dernière demande de reseed";
$language["IBD_SETTINGS"]="Param. intro avant de downloader";
$language["IBD_SELECT_FORUM"]="Sélectionnez le forum d'introduction";
$language["IBD_SUCCESS_MSG"]="Le forum a été défini. Maintenant, configurez les rangs dont vous aurez besoin pour créer un fil d'introduction avant de télécharger des torrents.<br /><br />Tu peux le faire";
$language["IBD_INTRO_NEEDED"]="Le téléchargement nécessite l'introduction";
$language["IBD_SELECT_TOPIC"]="ID du sujet spécifique. (Optionnel<br />\"0\" = nouveau sujet requis)";
$language["IBD_NEED_BOTH"]="Configurez le forum et l'ID du sujet!";
$language["IBD_TOPICID_NOT_FOUND"]="Identifiant du sujet introuvable dans le forum spécifié, veuillez vérifier et soumettre à nouveau.";
$language["OASED_SETTINGS"]="Param. de domaine de messagerie spécifiés";
$language["OASED_DOMAINS"]="Domaines d'email autorisés eg <span style='color:green'>gmail.com</span><br />(Un domaine par ligne)";
$language["NOCOL_SETTINGS"]="Pas de param. d'affichage des colonnes";
$language["NOCOL_ADD_EXCEPTIONS"]="Pages pour continuer à afficher les blocs. Entrez la partie après <span style='color:green'>index.php?page=</span> dans l'url.<br />With <span style='color:green'>index.php?page=userdetails&id=123</span> Vous ajouteriez juste <span style='color:green'>userdetails</span> sur ses propres<br />(Vous pouvez également ajouter <span style='color:green'>un index</span>)";
$language["MAGNET_NO_ENABLE"]="<span style='color:red;font-weight:bold;'>Votre traceur doit être public et permettre les DHT afin d'utiliser ce hack.</span>";
$language["MAGNET_LINK_ONLY"]="Montrer uniquement le lien magnétique dans la mesure du possible<br />(Cacher les liens de téléchargement)";
$language["CSIGN_SETTINGS"]="Param. des pays";
$language["CSIGN_SELECT_COUNTRY"]="Sélectionnez le pays a bloquer. (Le pays<br />Sera ajouté ci-dessous automatiquement)";
$language["CSIGN_COUNT_TO_BLOCK"]="Pays à bloquer (Un par ligne)";
$language["PFET_UPL_EXT"]="Upload des torrents externes";
$language["PFET_REF_EXT"]="Actualiser les torrents externes";
$language["PFET_NO_ENABLE"]="<span style='color:red;font-weight:bold;'>Votre tracker doit permettre aux torrents externes d'utiliser ce hack.</span>";
$language["SPY_TRUNCATE"]="TRONQUER";
$language["SPY_INFO"]="Attendez";
$language["SPY_INFO_MSG"]="Êtes-vous sûr de vouloir vider tous les messages?<br />Assurez-vous de bien informer vos membres.<br /><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ispy&amp;action=flush'>Oui</a>&nbsp;&nbsp;<a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ispy'>Non</a>";
$language["SPY_ERR_MSG"]="Échec de la supression!";
$language["SPY_SUCCESS"]="Processus de suppression terminé!<br /><a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&amp;do=ispy'>{$language["BACK"]}</a>";
$language["GALLERY"]="Galerie";
$language["GALLERY_SET"]="Param. de la galerie";
$language["GALLERY_MFS"]="Taille max du fichier (Bytes):";
$language["GALLERY_PTH"]="Chemin des images:";
$language["GALLERY_GRP"]="Sélection de groupe:";
$language["GALLERY_SEL"]="Choisi";
$language["GALLERY_NOL"]="Non séléctionné";
$language["SMILE_MENU"]="Param. des Smileys";
$language["TAG"]="Tag";
$language["SMILE_UPD"]="Actualisé!";
$language["SMILE_DLD"]="Supprimé!";
$language["SMILE_IMGER"]="L'image n'existe pas ou vous n'avez pas rempli l'étiquette.";
$language["SMILE_IMGER2"]="Seuls les images d'uploads sont autorisés!";
$language["SMILE_MISS"]="Champs manquants!";
$language["SMILE_IMPORT"]="Cliquez <a href='index.php?page=admin&user=".$CURUSER["uid"]."&code=".$CURUSER["random"]."&do=smilies&action=import'>ici</a> Pour importer votre ensemble smiley.";
$language["SMILE_CURR"]="Smileys actuels";
$language["INTEGRITY_INDEXED"]="L'indexation des fichiers est terminée!";
$language["INTEGRITY_COMP"]="Test terminé Vous serez informé par email des résultats!";
$language["INTEGRITY_REP"]="Rapport du moniteur d'intégrité";
$language["INTEGRITY_OK"]="La structure du fichier est intacte.";
$language["INTEGRITY_BAD"]="Les divergences suivantes ont été trouvées:";
$language["INTEGRITY_LAST"]="Dernier tester";
$language["INTEGRITY_NOINDEX"]="<span style='color:red;'>Vous n'avez pas encore d'index!</span>. Cliquez <a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=integrity&action=index_now'>ici</a> pour indexer votre base de fichiers!";
$language["INTEGRITY_ALINDEX"]="Vous avez précédemment indexé vos fichiers. Cette fois, il vérifiera les changements et vous enverra les résultats par email!.<br /> Cliquez <a href='index.php?page=admin&amp;user=".$CURUSER["uid"]."&amp;code=".$CURUSER["random"]."&do=integrity&action=check'>ici</a> pour continuer";
$language["INTEGRITY_MSG"]="Ceci répertorie votre base de fichier afin que vous puissiez vérifier plus tard si des fichiers ont été modifiés<br />Et vous alertera si des modifications ont été apportées. Ceci est pour aider à voir tous les fichiers modifier sans votre<br />consentement et vous pouvez les retrouver facilement.<br />Statut actuel:<br />";
$language["INTEGRITY_MENU"]="Vérification intégrité fichier";
$language["INTEGRITY_SETUP"]="Config. de l'intégrité du fichier";

$language['VIEW_CAT']='Voir la catégorie';
$language['VIEW_TORR_LIST']='Voir la liste de torrent';
$language['VIEW_TORR_DET']='Voir le détail du torrent';
$language['MIN_RATIO']='Ratio minimal';
$language['DOWNLOAD_RATIO']='Téléchargement minimum pour compter le ratio (en octets)';

$language["mod_set"]="Qui est autorisé aux fonctions modérateur shoutbox<br>Par exemple, lecture dans le tableau des groupes d'utilisateurs<br>supprimer les torrents serait delete_torrents";
$language["admin_set"]="Qui est autorisé aux fonctions admin shoutbox<br>Par exemple, lecture dans le tableau des groupes d'utilisateurs<br>suppression de membres seraient delete_users";

$language["memcache"]="Activée Memcache server 11211:";

$language["GROUP_STYLE"]="Style de groupe";
$language["ADV_GSS"]="Système de style de groupe avancé";
$language["GROUP_SETTINGS"]="Param. de groupe";
$language["FORCED_STYLES"]="Style de groupe forcé";
$language["FREE_STYLES"]="Style libre des utilisateurs";

//AdminCP Login
$language['ACP_ADMIN']='Admin';
$language['ACP_LOGOUT']='Déconnection';
$language["STAFF_LOGIN"]="Login du panneau staff";
$language["ENABLE_DISABLE"]="Activer/Désactiver la connexion";
$language["ENABLE_LOGIN"]="Permettre connexion";
$language["DISABLE_LOGIN"]="Refuser connexion";
$language["USERNAME_1"]="Membre No 1";
$language["USERNAME_2"]="Membre No 2";
$language["PASSWORD_1"]="Mot de passe 1";
$language["PASSWORD_2"]="Mot de passe 2";

// Enhanced Genre
$language["SELECT_CAT"] = 'Choisir une catégorie';
$language["GENRE"] = 'Genre';
$language["ADD_NEW"] = 'Ajouter nouveau';
$language["CONFIRM"] = 'Confirmer';
$language["ACP_GENRE_SET"] = 'Param. de genre';
$language["DELETE_ALL"] = 'Supprimer tout';
$language["ADD"] = 'Ajouter';
$language["GENRE_LIST"] = ' Liste des genres';

?>