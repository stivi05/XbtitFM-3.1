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
$language['DELETE_READED']='Supprimer';
$language['USER_LANGUE']='Langue';
$language['USER_STYLE']='Style';
$language['CURRENTLY_PEER']='Vous êtes présentement en Leech ou en Seed.';
$language['STOP_PEER']='Vous devez arrpeter votre client torrent.';
$language['USER_PWD_AGAIN']='Répéter le mot-de-passe';
$language['EMAIL_FAILED']='L\'envoie du e-mail a échoué!';
$language['NO_SUBJECT']='Aucun sujet';
$language['MUST_ENTER_PASSWORD']='<br /><font color="#FF0000"><strong>Vous devez entrer votre mot-de-passe afin de modifier vos paramèetres.</strong></font>';
$language['ERR_PASS_WRONG']='Mot-de-passe invalide ou case laissée vide, impossible de valdier vos paramètres.';
$language['MSG_DEL_ALL_PM']='Si vous sélectionner des MP qui n\'ont pas été lus, ils ne seront pas supprimésIf you select PMs which are not read, they will not be deleted';
$language['ERR_PM_GUEST']='Désolé! Vous ne pouvez envoyer des MP à des Werreux ou à vous-même!';


//INVITATION SYSTEM
global $SITENAME, $BASEURL, $SITEEMAIL, $btit_settings;

$language['ACCOUNT_CONFIRMED']='Compte validé';
$language['CONFIRMED']='Validé';
$language['DATE_SENT']='Date envoyée';
$language['ERR_EMAIL_ALREADY_EXISTS']='Cette adresse mail existe déjà dnas notre base de données.';
$language['ERR_INVITATIONS_OFF']='Désolé, le système d\'invitation est désactivé.';
$language['MISSING_DATA']='Il manque des informations! <br />SVP, remplissez tout les champs.';
$language['INSERT_EMAIL']='La case pour entrer l\adresse e-mail a été laissée vide!';
$language['INSERT_MESSAGE']='La case pour entrer un message personnel a été laissée vide!';
$language['INVIT_CONFIRM']='Invitation confirmé.';
$language['INVIT_MSG']='Bonjour,'."\n\n".'Vous avez été invité à rejoindre '.$SITENAME.' et sa communauté.';
$language['INVIT_MSG1']="\n\n".'Si vous acceptez cette invitation, vous devez cliquer sur ce lien: '."\n\n".'';
$language['INVIT_MSG2']="\n\n".'Vous aurez '.$btit_settings['invitation_expires'].' jours pour accepter cette invitation, sinon elle sera expirée et inactive.'."\n\n".' Nous, le staff et membres du '.$SITENAME.' espérons que vous accepterez de vous joindre à notre très belle communauté!'."\n\n".' Message personnel de ';
$language['INVIT_MSG3']="\n\n".'----------------'."\n\n".'Si vous ne connaissez pas la personne qui vous a invité, svp, envoyé cet e-mail à '.$SITEEMAIL;
$language['INVIT_MSGCONFIRM']='Bonjour,'."\n".'Votre compte a été validé. Vous pouvez maintenant visiter '."\n\n".$BASEURL.'/index.php?page=login'."\n\n".'et utiliser vos identifiant pour vous loguer. Nous espérons et vous recommandons fortement de lire la FAQ et les règles avant de commencer votre aventure et de partager des fichiers.'."\n\n".'Bonne continuation et ayez du plaisir sur '.$SITENAME.'!'."\n\n\n".'----------------'."\n\n".'Si vous n\'êtes pas enregistré sur '.$SITENAME.', svp, envoyer cet e-mail à '.$SITEEMAIL;
$language['INVITATIONS']='Invitations';
$language['INVITE_SOMEONE_TO']='Envoyer une Invitation';
$language['MEMBERS_INVITED_BY']='Vos invités';
$language['MESSAGE']='Message';
$language['MNU_UCP_INVITATIONS']='Invitations';
$language["MNU_UCP_TOOLS"]='Outils';
$language['NO_INV']='Aucune invitation en banque.';
$language['NO_INVITATIONS_OUT']='Aucune invitations envoyées.';
$language['NO_NEED_CONFIRM_YET']='Aucune invitation à confirmer.';
$language['PENDING']='En cours de validation';
$language['REMAINING']='En banque';
$language['SENT_INVITATIONS']='Invitations envoyées';
$language['STATUS']='Statut';
$language['WELCOME_UCP_INVITE']='Bienvenue dans votre panneau d\'invitation.<br />Ici, vous pouvez envoyer une intation à vos amis et ils pourront s\'enregistrer sur '.$SITENAME.'.<br />';

$language["HOS_HIDE_STATUS"] = "Statut de membre en ligne caché";

$language["TORRENTBAR"]="Torrent Bar";

$language["PM_BANNED"] = "Vous êtes banni du système de MP!";
//sig sync
$language['SYNC_SIG']='Synchroniser votre Signature dans le forum?';
$language['SYNC_AV']='Synchroniser votre Avatar dans le forum?';
$language['SIG']='Signature ([img]http://imageurl[/img])';
$language['SIG_PREV']='Prévisionner votre Signature';
$language['SIG_CP']='Signature';
$language['SIG_EX']='Plus de paramètres'; # changed to take care of the other links in the menu which are friendlist, invitations & avatar upload so they are the same as in the dropdown menu # TT #

$language["MNU_UCP_AVATAR"] = "Uploader un Avatar";
$language["AVATAR_SUCCESS"] = "Votre Avatar a été uploadé avec succès!";
$language["AVATAR_FAILURE1"] = "Erreur! Le poids de l\'image est trop volumineux.! Les mesures sont";
$language["AVATAR_FAILURE2"] = "Erreur! Le fichier est trop volumineux! Le poids limite est";
$language["AVATAR_FAILURE3"] = "Erreur! Une raison inconnue fait qu\'il y a eu une erreur!";
$language["AV_FEW_HEAD"] = "Règles d'upload pour l\'Avatar";
$language["AV_FILE_SIZE"] = "Ne pas uploader un fichier au poids supérieur à";
$language["AV_IMAGE_SIZE"] = "Ne pas uploader une image au poids supérieur à";
$language["AV_FORBIDDEN"] = "Ne pas uploader du contenu offensant.";
$language["AV_NO_HEADER"] = "Vous avez déjà uploadé une image, vous ne pouvez en ajouter.";
$language["AV_NO_1"] = "Vous avez récemment uploadé";
$language["AV_NO_2"] = "Dupprimer ce fichier";
$language["AV_NO_3"] = "Lien pour le fichier";

$language["UN_INV_SENT"] = "Invitation envoyé à ";
$language["UN_INV_CONF"] = "a validé l'enregistrement de";

$language["PR_SHOW"] = "Montrer";
$language["PR_HIDE"] = "Cacher";
$language["PROFILEVIEW"] = "Montrer/Cacher le Profil";

$language["ADVRSS_CATLIST"]="Configurer les catégories RSS";
$language["ADVRSS_LIMIT"]="Configurer les limites RSS par catégorie";
$language["ADVRSS_YOUR_FEED"]="Votre flux RSS personalisé";
$language["DEF_CATS"]="Catégories par défaut:";
$language["MAR"]="Marquer comme lu";

$language["SUBSCRIBE"]="Abonnement de Torrents";
$language["SUB_OK"]="Votre abonnement pour upload de torrents a été effectué avec succès pour <a href=\"index.php?page=usercp&amp;do=subscribe&amp;action=change&amp;uid=".$CURUSER["uid"]."\">cette ou ces catégories sélectionnées</a>";
$language["SUB_SUBJECT"]="Abonnement de Torrents sur Le Saloon";
$language["SUB_EMAIL"]="Bonjour \n, un nouveau torrent: \"%s\" a été uploadé dans la catégorie que vous avez souscrit \n\nDetails: %s\nDownload: %s\n\n Bon Download\n$SITENAME";

?>