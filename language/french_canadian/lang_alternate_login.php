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
$language["ACP_LOGIN_PAGE"]= 'Options de connexion alternatives';
$language['SINGLE_LOGIN_PAGE']='Choisissez un fond unique';
$language["SINGLE_BACKGROUND"]= 'Fond unique';
$language["ROTATING_LOGIN_PAGE"]= 'Choisissez un fond rotatif';
$language["ROTATING_BACKGROUND"]= 'fond rotatif';
$language["CHOOSE_LOGIN_PAGE"]= 'Choisissez Types de pages de connexion';
$language["LOGIN_PAGE_TYPES"]= 'Types de pages de connexion';
$language['REGISTERED']='Inscrit';

$language["CHOOSE_FAQ"]="Choisir FAQ par défaut ou personnalisé";
$language["CHOOSE_RULES"]="Choisir les règles par défaut ou personnalisées";
$language["RULES_TYPES"]="Choisissez Règles par défaut/personnalisées";
$language["DEFAULT_RULES"]="Règles par défaut";
$language["CUSTOM_RULES"]="Règles personnalisées";
$language["FAQ_TYPES"]="Choisir FAQ par défaut/personnalisée";
$language["DEFAULT_FAQ"]="FAQ par défaut";
$language["CUSTOM_FAQ"]="FAQ personnalisées";
$language["ENABLE_ALL_WARN"]="Test";

// Birthday hack
$language["DOB"]="Date de naissance";
$language["DOB_FORMAT"]="<b>Jour (DD) / Mois (MM) / Année (YYYY)</b>";

// Password strength
$language['WEEK']='Faible';
$language['MEDIUM']='Médium';
$language['SAFE']='Sécure';
$language['STRONG']='Très sécure';
$language["ERR_PASS_TOO_WEAK_1"]="Votre mot de passe est trop faible.<br />Pour des raisons de sécurité, il doit contenir au moins";
$language["ERR_PASS_TOO_WEAK_1A"]="Le mot de passe est trop faible.<br />Pour des raisons de sécurité, il doit contenir au moins";
$language["ERR_PASS_TOO_WEAK_2"]="lettre minuscule";
$language["ERR_PASS_TOO_WEAK_2A"]="lettres minuscule";
$language["ERR_PASS_TOO_WEAK_3"]="lettre majuscule";
$language["ERR_PASS_TOO_WEAK_3A"]="lettres majuscule";
$language["ERR_PASS_TOO_WEAK_4"]="nombre";
$language["ERR_PASS_TOO_WEAK_4A"]="nombres";
$language["ERR_PASS_TOO_WEAK_5"]="symbole";
$language["ERR_PASS_TOO_WEAK_5A"]="symboles";
$language["ERR_PASS_TOO_WEAK_6"]="Voici un mot de passe fort que vous voudrez peut-être utiliser";
$language["SECSUI_ACC_PWD_1"]="Votre mot de passe nécessite:";
$language["SECSUI_ACC_PWD_1A"]="Le mot de passe nécessite:";
$language["SECSUI_ACC_PWD_2"]="Être au moins";
$language["SECSUI_ACC_PWD_3"]="Caractère en longueur";
$language["SECSUI_ACC_PWD_3A"]="Caractères en longueur";
$language["SECSUI_ACC_PWD_4"]="Avoir au moins";
$language["SECSUI_ACC_PWD_5"]="lettre minuscule";
$language["SECSUI_ACC_PWD_5A"]="lettres minuscule";
$language["SECSUI_ACC_PWD_6"]="lettre majuscule";
$language["SECSUI_ACC_PWD_6A"]="lettres majuscule";
$language["SECSUI_ACC_PWD_7"]="nombre";
$language["SECSUI_ACC_PWD_7A"]="nombres";
$language["SECSUI_ACC_PWD_8"]="symbole";
$language["SECSUI_ACC_PWD_8A"]="symboles";
//Booted
$language['BOOTED']='Compte désactivé!';
$language['BOOTEDUT']='jusqu\'à';
$language['WHYBOOTED']='Raison:';

$language['ACCOUNT_CREATED']='Compte créé';
$language['USER_NAME']='Nom d\'utilisateur';
$language['USER_PWD_AGAIN']='Répéter le mot de passe';
$language['USER_PWD']='Mot de passe';
$language['USER_STYLE']='Style';
$language['USER_LANGUE']='Langage';
$language['IMAGE_CODE']='Code Image';
$language['INSERT_USERNAME']='Vous devez insérer un nom d\'utilisateur!';
$language['INSERT_PASSWORD']='Vous devez insérer un mot de passe!';
$language['DIF_PASSWORDS']='Les mots de passe ne correspondent pas!';
$language['ERR_NO_EMAIL']='Vous devez entrer une adresse email valide';
$language['USER_EMAIL_AGAIN']='Répétez l\'email';
$language['ERR_NO_EMAIL_AGAIN']='Répétez l\'email';
$language['DIF_EMAIL']='Les emails ne correspondent pas!';
$language['REGISTERED_EMAIL']='Email enregistré';
$language['USER_EMAIL']='Email';
$language['USER_EMAIL']='Email valide';
$language['SECURITY_CODE']='Code de sécurité!';
$language['SSL'] = "Force SSL:";
$language['SSL_DESC'] = "&nbsp;Forcer une connexion sécurisée sur le site.";
$language['FRM_CONFIRM']='Confirmer';
$language['FRM_LOGIN']='S\'identifier';
$language['FRM_SIGNUP']='S\'inscrire';
$language['COUNTRY']='Pays';
$language['TIMEZONE']='Fuseau horaire';
$language['NEED_COOKIES']='Note:<br /> Vous avez besoin d\'accepter les cookies pour vous connecter.';

//INVITATION SYSTEM
global $SITENAME, $BASEURL, $SITEEMAIL;
$language['INVIT_MSGINFO']='Vous avez demandé un nouveau compte sur '.$SITENAME;
$language['INVIT_MSGINFO1']="\n\n".'Votre compte est en attente de confirmation du membre qui vous a invité. Jusqu\'à ce que votre compte soit confirmé, vous n\'avez pas plein accès au site.';
$language['INVIT_MSGINFO2A']="\n\n".'Info compte:'."\n".'Nom d\'utilisateur:';
$language['INVIT_MSGINFO2B']='Mot de passe:';
$language["INVIT_MSGINFO3"]="\n\n".'----------------'."\n\n".'Si vous ne vous êtes pas inscrit '.$SITENAME.', Veuillez envoyer cet e-mail à '.$SITEEMAIL;
$language['INVIT_MSG_AUTOCONFIRM3']="\n\n".'----------------'."\n\n".'Vous pouvez maintenant visiter'."\n\n".$BASEURL.'/index.php&page=login'.
									"\n\n".'Et utilisez vos informations pour vous connecter.'."\n\n".
									'Bonne chance et amusez-vous sur '.$SITENAME.'!'."\n\n\n".'----------------'."\n\n".
									'Si vous ne vous êtes pas inscrit '.$SITENAME.', Veuillez envoyer cet e-mail à '.$SITEEMAIL;
$language['REG_CONFIRM']='Confirmation du compte';
$language['INVITATION_ONLY']='Désolé, mais les inscriptions sont fermées.<br>Vous avez besoin d\'une invitation pour vous inscrire.';
$language['WELCOME_INVITE']='Bienvenue! Vous avez accepté une invitation de l\'un de nos utilisateurs.<br />Vous pouvez maintenant vous inscrire.';
$language['INVITE_EMAIL_SENT1']='Un e-mail de confirmation a été envoyé à l\'adresse que vous avez spécifiée';
$language['INVITE_EMAIL_SENT2']='<br />Vous devrez attendre jusqu\'à ce que votre invitant confirme votre compte.';
$language['INVITE_EMAIL_SENT3']='Un e-mail a été envoyé à l\'adresse que vous avez spécifiée';
$language['INVITE_EMAIL_SENT4']='<br />Vous pouvez maintenant <a href="index.php?page=login">vous identifier</a>. Bonne chance et amusez-vous sur '.$SITENAME.'!';
$language['INVALID_INVITATION']='Votre code d\'invitation n\'est pas valide.';
$language['ERR_INVITATION']='<br />Demander une nouvelle invitation à votre invitant.';

$language["DOMAIN_BANNED"]="Aucun compte de messagerie jetable n'est autorisé. Utilisez un compte E-Mail réel.";

$language["UN_INV_ACC_1"] = "Invitation de";
$language["UN_INV_ACC_2"] = "Accepté et créé le compte";

$language["RREG_CLOSED_1"] = "Les inscriptions sont actuellement fermées et rouvriront à des intervalles aléatoires, essayez plus tard.";
$language["RREG_CLOSED_2"] = "Si vous avez une invitation, vous pouvez contourner ceci en suivant le lien dans l'email.";
$language["ERR_IP_ALREADY_EXISTS_1"] = "Votre adresse IP";
$language["ERR_IP_ALREADY_EXISTS_2"] = "Est déjà utilisé sur ce site.<br /><br /> Si vous utilisez une IP partagée, contactez l'administrateur du site.";

$language['ERR_500']='HTTP/1.0 500 accès non autorisé!';
$language['ERR_AVATAR_EXT']='Désolé, l\'image n\'existe pas ou le type de fichier est incorrect (seules les images gif, jpg, bmp ou png sont autorisées).';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='Mauvaise nouvelle ID!';
$language['ERR_BODY_EMPTY']='Le champ ne peut pas être vide!';
$language['ERR_CANT_CONNECT']='Ne peut se connecter au serveur local MySQL';
$language['ERR_CANT_OPEN_DB']='Ne peut ouvrir la base de données ';
$language['ERR_COMMENT_EMPTY']='Le commentaire ne peut pas être vide!';
$language['ERR_DB_ERR']='Erreur de la base de données. Veuillez contacter un administrateur à ce sujet.';
$language['ERR_DELETE_POST']='Supprimer le post. Vérification de sécurité: vous êtes sur le point de supprimer unpost. Cliquez';
$language['ERR_DELETE_TOPIC']='Supprimer le sujet. Vérification de sécurité: vous êtes sur le point de supprimer un sujet. Cliquez';
$language['ERR_EMAIL_ALREADY_EXISTS']='Ce courrier électronique est déjà dans notre base de données!';
$language['ERR_EMAIL_NOT_FOUND_1']='L\'adresse email';
$language['ERR_EMAIL_NOT_FOUND_2']='N\'a pas été trouvé dans la base de données.';
$language['ERR_ENTER_NEW_TITLE']='Vous devez entrer un nouveau titre!';
$language['ERR_FORUM_NOT_FOUND']='Forum non trouvé';
$language['ERR_FORUM_UNKW_ACT']='Erreur du forum: action inconnue';
$language['ERR_GUEST_EXISTS']='"Guest" Est un nom d\'utilisateur restreint. Vous ne pouvez pas vous enregistrer comme "Guest"';
$language['ERR_IMAGE_CODE']='Le code de sécurité ne correspond pas';
$language['ERR_INS_TITLE_NEWS']='Vous devez insérer le titre ET les nouvelles';
$language['ERR_INV_NUM_FIELD']='Champ(s) numérique(s) non valide du client';
$language['ERR_INVALID_CLIENT_EVENT']='Événement invalide = du client.';
$language['ERR_INVALID_INFO_BT_CLIENT']='Informations invalides reçues du client BitTorrent';
$language['ERR_INVALID_IP_NUMB']='Adresse IP invalide. Doit être une décimale ponctuelle standard (noms d\'hôte non autorisés)';
$language['ERR_LEVEL']='Désolé, votre rang ';
$language['ERR_LEVEL_CANT_POST']='Vous n\'êtes pas autorisé à publier dans ce forum.';
$language['ERR_LEVEL_CANT_VIEW']='Vous n\'êtes pas autorisé à voir ce sujet.';
$language['ERR_MISSING_DATA']='Données manquantes!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='Vous devez être connecté pour écrire sur la shout...';
$language['ERR_NO_BODY']='Aucun texte ';
$language['ERR_NO_NEWS_ID']='Nouveau ID introuvable!';
$language['ERR_NO_POST_WITH_ID']='Pas de post avec cet ID ';
$language['ERR_NO_SPACE']='Votre nom d\'utilisateur ne peut pas contenir d\'espace, s\'il vous plaît, remplacer par un trait de soulignement eg:<br /><br />';
$language['ERR_NO_TOPIC_ID']='Aucun ID de topic n\'est retourné';
$language['ERR_NO_TOPIC_POST_ID']='Aucun topic n\'est associé avec l\'ID de ce post';
$language['ERR_NOT_AUTH']='Vous n\'êtes pas autorisé!';
$language['ERR_NOT_FOUND']='Pas trouvé...';
$language['ERR_NOT_PERMITED']='Pas permis';
$language['ERR_PASS_LENGTH_1']='Votre mot de passe doit avoir un minimum de';
$language['ERR_PASS_LENGTH_2']='Caractères.';
$language['ERR_PASSWORD_INCORRECT']='Mot de passe incorrect';
$language['ERR_PERM_DENIED']='Permission refusée';
$language['ERR_PID_NOT_FOUND']='Veuillez retélécharger le torrent. Le système PID est actif et le pid n\'a pas été trouvé dans le torrent';
$language['ERR_RETR_DATA']='Erreur de retraitement des données!';
$language['ERR_SEND_EMAIL']='Impossible d\'envoyer un courrier. Veuillez contacter un administrateur au sujet de cette erreur.';
$language['ERR_SERVER_LOAD']='La charge du serveur est très élevée pour le moment. Réessayer, veuillez patienter...';
$language['ERR_SPECIAL_CHAR']='<font color="black">Votre nom d\'utilisateur ne peut pas contenir de caractères spéciaux comme:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; etc.</strong></font></font><br />';
$language['ERR_SQL_ERR']='Erreur SQL';
$language['ERR_SUBJECT']='Vous devez entrer un sujet.';
$language['ERR_TOPIC_ID_NA']='L\'ID du sujet est N/A';
$language['ERR_TOPIC_LOCKED']='Le sujet est bloqué';
$language['ERR_TORRENT_IN_BROWSER']='Ce fichier concerne les clients BitTorrent.';
$language['ERR_UPDATE_USER']='Impossible de mettre à jour les données utilisateur. Veuillez contacter un administrateur au sujet de cette erreur.';
$language['ERR_USER_ALREADY_EXISTS']='Il y a déjà un utilisateur avec ce nick!';
$language['ERR_USER_NOT_FOUND']='Désolé, l\'utilisateur n\'a pas été trouvé';
$language['ERR_USER_NOT_USER']='Vous n\'êtes pas autorisé à accéder au panneau d\'un autre utilisateur!';
$language['ERR_USERNAME_INCORRECT']='Nom d\'utilisateur incorrect';


//User Signup Agreement
$language["ACP_USER_SIGNUP_AGREEMENT"] = "User Signup Agreement";
$language["ACP_USER_SIGNUP_AGREEMENT1"] = "User Signup Agreement Settings";
$language["ACP_TEXT_BOX_ONE"] = "Text Box One";
$language["ACP_TEXT_BOX_TWO"] = "Text Box Two";
$language["ACP_TEXT_BOX_THREE"] = "Text Box Three";
$language["ACP_TEXT_BOX_FOUR"] = "Text Box Four";
$language["ACP_ENABLE"]="Enable";
$language["ACP_ENABLED"]="Enabled";
$language["ACP_DISABLED"]="Disabled";

$language["AGREE"]="You <u>MUST AGREE</u> to these terms below before you can create an account.";
$language["AGREE1"]="I agree to the above terms, Let me in!!";
$language["ENABLE"]="Enable";
$language["ENABLED"]="Enabled";
$language["DISABLED"]="Disabled";
$language['ERR']='Error';

//Menu
$language['LOGIN']='Login';
$language['RECOVER']='Recover Password';
$language['SIGNUP']='Create Account';
$language['MNU_NEWS']='News';
$language['MNU_FORUM']='Forum';
$language["MNU_RULES"]="Rules";
$language["MNU_FAQ"]="F.A.Q.";
$language["MNU_IRC"]="IRC";

// Hide
$language['ACP_DIS_TITLE']='Activer/Désactiver la page de connexion alternative';
$language["EN_DIS_ALL"] = "Activer/Désactiver les boutons sur la page de connexion alternative";
$language["SET_ABOVE"] = "Utiliser les param. ci-dessus";
$language["EN_ALL"] = "Activer tout";
$language["DIS_ALL"] = "Désactiver tout";
$language['ACP_HIDE']='Boutons de barre de menu';
$language['ACP_NEWS']='Activer/Désactiver Nouvelles';
$language['ACP_FORUM']='Activer/Désactiver Forum';
$language['ACP_RULES']='Activer/Désactiver Règles';
$language['ACP_FAQ']='Activer/Désactiver F.A.Q.';
$language['ACP_IRC']='Activer/Désactiver IRC';
$language['ACP_VIEW_IRC']='Vous devez d\'abord installer le module IRC';


//News
$language['POSTED_BY']='Posté par:';
$language['POSTED_DATE']='Posté sur:';
$language['TITLE']='Titre:';

//Mesages
$language['NEWS_MSG']='En activant cela, on allume le bouton dans la page de connexion alternative pour que l\'invité le voie et l\'utilise';
$language['FORUM_MSG']='En activant cela, on allume le bouton dans la page de connexion alternative pour que l\'invité le voie et l\'utilise';
$language['RULES_MSG']="Avertissement: Juste parce que cette option est ici, ce n'est pas nécessairement une bonne idée de l'utiliser.\\n\\nL'activation de tous les hacks d'un seul coup aura un effet néfaste.\\nVous devrez désactiver de nombreuses fonctionnalités disponibles par défaut et\\nprobablement finir par chercher une aiguille dans une botte de foin quand \\nviendra d'essayer de configurer les hacks par la suite.\\n\\nAu lieu de cela, nous vous conseillons de ne permettre que les hacks que vous avez réellement\\nbesoin et aussi de créer progressivement votre liste de hacks activés.\\nDe cette manière  vous pouvez configurer les paramètres de chaque hack au fur et à mesure.\\n\\nVous pouvez évidemment ignorer cet avertissement et continuer à utiliser\\ncette option de toute façon, mais vous avez été averti!";
$language['FAQ_MSG']="Avertissement: Juste parce que cette option est ici, ce n'est pas nécessairement une bonne idée de l'utiliser.\\n\\nL'activation de tous les hacks d'un seul coup aura un effet néfaste.\\nVous devrez désactiver de nombreuses fonctionnalités disponibles par défaut et\\nprobablement finir par chercher une aiguille dans une botte de foin quand \\nviendra d'essayer de configurer les hacks par la suite.\\n\\nAu lieu de cela, nous vous conseillons de ne permettre que les hacks que vous avez réellement\\nbesoin et aussi de créer progressivement votre liste de hacks activés.\\nDe cette manière  vous pouvez configurer les paramètres de chaque hack au fur et à mesure.\\n\\nVous pouvez évidemment ignorer cet avertissement et continuer à utiliser\\ncette option de toute façon, mais vous avez été averti!";

$language["MODE_TYPE"]="Type de mode";
$language["MODE_CLASSIC"]="Clasique";
$language["MODE_NEW"]="Nouveau";
?>