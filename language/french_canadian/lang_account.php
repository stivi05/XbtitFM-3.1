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
$language['ACCOUNT_CREATED']='Compte créé';
$language['USER_NAME']='Utilisateur';
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
$language['DIF_EMAIL']='Les email ne correspondent pas!';
$language['SECURITY_CODE']='Répondre à la question';
# Password strength
$language['WEEK']='Faible';
$language['MEDIUM']='Medium';
$language['SAFE']='Sécure';
$language['STRONG']='Fort';
$language["ERR_GENERIC"]='Erreur générique: '.mysqli_error($GLOBALS['conn']);
//INVITATION SYSTEM
global $SITENAME, $BASEURL, $SITEEMAIL;
$language['INVIT_MSGINFO']='Vous avez demandé un nouveau compte sur '.$SITENAME;
$language['INVIT_MSGINFO1']="\n\n".'Votre compte est en attente de confirmation du membre qui vous a invité. Jusqu\'à ce que votre compte soit confirmé, vous n\'avez pas plein accès au site.';
$language['INVIT_MSGINFO2A']="\n\n".'Informations du compte:'."\n".'Nom d\'utilisateur:';
$language['INVIT_MSGINFO2B']='Mot de passe:';
$language["INVIT_MSGINFO3"]="\n\n".'----------------'."\n\n".'Si vous ne vous êtes pas inscrit'.$SITENAME.', Veuillez retourner cet e-mail à '.$SITEEMAIL;
$language['INVIT_MSG_AUTOCONFIRM3']="\n\n".'----------------'."\n\n".'Vous pouvez maintenant visiter'."\n\n".$BASEURL.'/index.php?page=login'.
									"\n\n".'Et utilisez vos informations pour vous connecter.'."\n\n".
									'Bonne chance et amusez-vous '.$SITENAME.'!'."\n\n\n".'----------------'."\n\n".
									'Si vous ne vous êtes pas inscrit '.$SITENAME.', Veuillez retourner cet e-mail à '.$SITEEMAIL;
$language['REG_CONFIRM']='Confirmation du compte';
$language['INVITATION_ONLY']='Désolé, mais les inscriptions sont fermées.<br>Vous avez besoin d\'une invitation pour vous inscrire.';
$language['WELCOME_INVITE']='Bienvenue! Vous avez accepté une invitation de l\'un de nos membres.<br />Vous pouvez maintenant vous inscrire.';
$language['INVITE_EMAIL_SENT1']='Un e-mail de confirmation a été envoyé à l\'adresse que vous avez spécifiée';
$language['INVITE_EMAIL_SENT2']='<br />Vous devrez attendre jusqu\'à ce que votre invitant confirme votre compte.';
$language['INVITE_EMAIL_SENT3']='Un e-mail a été envoyé à l\'adresse que vous avez spécifiée';
$language['INVITE_EMAIL_SENT4']='<br />Vous pouvez maintenant<a href="index.php?page=login">LOGIN</a>. Bonne chance et amusez-vous '.$SITENAME.'!';
$language['INVALID_INVITATION']='Votre code d\'invitation n\'est pas valide.';
$language['ERR_INVITATION']='<br />Demander une nouvelle invitation au membre invitant.';

$language["DOMAIN_BANNED"]="Aucun compte de messagerie jetable n'est autorisé. Utilisez un compte E-Mail réel.";

$language["UN_INV_ACC_1"] = "Invitation de";
$language["UN_INV_ACC_2"] = "Accepté et créé le compte";

$language["RREG_CLOSED_1"] = "Les inscriptions sont actuellement fermées et rouvriront à des intervalles aléatoires, essayez plus tard.";
$language["RREG_CLOSED_2"] = "Si vous avez une invitation, vous pouvez contourner ceci en suivant le lien dans le courrier électronique.";
$language["ERR_IP_ALREADY_EXISTS_1"] = "Votre adresse IP";
$language["ERR_IP_ALREADY_EXISTS_2"] = "Est déjà utilisé sur ce site.<br /><br />Si vous utilisez une IP partagée, contactez l'administrateur du site.";
$language["OASED_ERR_MSG_1"] = "l'adresse e mail que vous avez entré est invalide. Nous n'acceptons que les courriels des éléments suivants";
$language["OASED_ERR_MSG_2"] = "domaine";
$language["OASED_ERR_MSG_3"] = "domaines";
$language["CSIGN_ERR"]="Vous n'êtes pas autorisé à créer un compte sur ce tracker!"; // Probably best to keep the error message vague. ;)

?>