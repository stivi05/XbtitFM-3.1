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

global $SITENAME;

 $language['pages']='Gérer, Éditer, Approuver, Kicker, Rejeter, liste, Requête';
 $language['days']='Lundi, Mardi, Mercredi, Jeudi, Vendredi, Samedi, Dimanche';
 $language['bedj']='Devenir DJ';
 $language['djhead']='Shoutcast DJ';
 $language['f1']='SVP, sélectionner les jours que vous voudriez devenir DJ sur la Shoutcast:';
 $language['f2']='Entre:';
 $language['example']='Exemple: 13:00-18:00 <span style="color:#FF0000;">(Server Time)</span> - est l\'heure actuelle du serveur.';
 $language['f5']='Quel genre de musique vous aimez:';
 $language['f3']='Poster un formulaire';
 $language['f4']='Recommencer le formulaire';
 $language['djlist']='Liste des DJ';
 $language['djname']='Nom du DJ';
 $language['adays']='Jours Actifs';
 $language['atime']='Heures en ligne';
 $language['genre']='Genre';
 $language['status']='Statut du DJ';
 $language['approve']='Approuver';
 $language['deny']='Nier';
 $language['kick']='Kicker';
 $language['edit']='Editer';
 $language['pending']='En attente de validation';
 $language['approved']='Approuvé';
 $language['denied']='Rejeté';
 $language['kicked']='Kické';
 $language['already']='Vous êtes déjà un DJ! Ou bien l\'application est en cours de validation.';
 $language['hey']='Ce n\'est pas votre compte à gérer!!!';
 $language['blank']='Aucun champs ne doit être laissés vide!';
 $language['down2']='Aucune Source.';
 $language['thanks']='Merci de votre intérêt de devenir DJ sur '.$SITENAME.' Shoutcast. Nous vous contacterons bientôt.';
 $language['strange']='Où avez-vous eu le lien?';
 $language['subject']='Requête: Devenir DJ';
 $language['msg']='Bonjour, cet utilisateur';
 $language['msgg']='voudrais devenir DJ. SVP, cliquez sur ce lien pour gérer cette requête.';
 $language['kmsg']='Bonjour, vous avez été Kické du DJ club.';
 $language['subject2']=''.$SITENAME.' DJ Club';
 $language['dmsg']='Bonjour, malheureusement, votre demande pour devenir DJ a été rejeté. En vous souhaitant une bonne continuation.';
 $language['updated']='Les paramètres ont été modifiés et mis-à-jour!';
 $language['amsg']='Bonjour, votre requête pour devenir DJ a été approuvée. Vous allez recevoir un MP incluant les détails de connexion. SVP, cliquez le lien pour lire la FAQ.';
 $language['no']='Vous n\'avez pas la permission d\'accéder à cette page, désolé!';
 $language['djfaq']='<p><b>1.</b>	Télécharger Winamp en utilisant ce lien: <a href=\'http://www.winamp.com/player/\' class=\'linkYellow\' style=\'text-decoration: underline;\'><b>Winamp</b></a>.<br><br>
<b>2.</b>	Télécharger le plugin SHOUTcast Radio DSP pour Winamp.  Le plugin DSP est disponible <a href=\'http://yp.shoutcast.com/downloads/shoutcast-dsp-1-9-0-windows.exe\' class=\'linkYellow\' style=\'text-decoration: underline;\'><b>ICI</b></a>.<br><br>
<b>3.</b>	Lorsque vous aurez télécharger le plugin DSP, fermé Winamp s\'il est déjà ouvert et double-cliquer sur le fichier installateur que vous venez de télécharger, et suivez les instructions pour l\'installation.<br><br>
<b>4.</b>	Démarrer Winamp, ouvrez les Préférences (CTRL-P) et cliquez sur DSP/effects subcategory situé en-dessous des onglets Plug-ins. Regardez plus bas ppour un exemple:<br>
<img src=\'http://media.shoutcast.com/images/winamp_preferences.jpg\' border=\'0\' alt=\'\' /><br><br>
<b>5.</b> Un coup le plugin SHOUTcast Radio DSP est bien configuré, diffusera ce qui sera en diffusion d\'une radio internet sur Winamp en temps réel! Reférez vous à l\'onglet README qui est inclus avec l\'installateur DSP pour de plus amples informations et instructions pour l\'utilisation de SHOUTcast Radio DSP.<br><br>
<p class=\'instWin\'><b><u>Instructions - Unix, Linux &amp; MAC OSX</u></b></p>
<p class=\'marginConstant\'> Vous n\'êtes pas un utilisateur de Windows ou de Winamp? Ne vous en faites pas! Pour les utilisateurs avancés de Mac OS X, Linux et Unix, la version UNIX/Linux de la SHOUTcast Radio DSP permet, à partir d\'une carte de son, d\'ajouter des fichiers MP3 sur un disque dur. SVP, voir l\'exemple du fichier .conf inclu dans l\'archive pour plus d\'informations. SVP, notez bien que cette méthode de diffusion est encore à l\'étape BETA. À utiliser à vos propres risques.  Télécharger la SHOUTcast Radio DSP pour Unix/Linux/MAC OSX <a href=\'http://yp.shoutcast.com/downloads/sc_trans_posix_040.tgz\' class=\'linkYellow\' style=\'text-decoration: underline;\'><b>ICI</b></a>.</p>
</p>';
$language['faq']='DJ FAQ';
$language['BL_DJ']='DJ en onde';
$language['BL_LISTEN']='Auditeurs';
$language['BL_SONG']='Chanson en cours';
$language['BL_BRATE']='BitRate';
$language['BL_HIST']='Historique';
$language['BL_HIST_NO']='Aucun historique de disponible';
$language['BL_NOSOURC']='Aucune source..';
$language['BL_APP']='Appliquer';
$language['list']='Les Auditeurs de '.$SITENAME.'.';
$language['INV_TIME_SLOT_1'] = 'Format de temps invalide, svp, entrer le temps dans ce format 00:00-00:00';
$language['INV_TIME_SLOT_2'] = 'Format de temps invalide, le début du temps ne peut être identique à celui de la fin.';
$language['INV_TIME_FORMAT_1'] = 'Forme de temps invalide, les heures ne peuvent être supérieures à 23.';
$language['INV_TIME_FORMAT_2'] = 'Forme de temps invalide, les minutes ne peuvent être supérieures à 59.';
$language['ERR_OUTPUT_1'] = 'Votre requête de temps entre en confli avec ';
$language['ERR_OUTPUT_2'] = 'on';
$language['ERR_OUTPUT_3'] = 'SVP, modifier votre format de temps correctement et recommencer.';
?>