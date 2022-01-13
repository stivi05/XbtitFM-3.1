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
global $BASEURL;
$language['MENU_INFO']='Cliquez sur l\'un des titres pour afficher sa description et utilisez le bouton d\'accueil pour revenir sur cette page.';
$language['MENU_FM']='xbtitFM 2017';
$language['INV_MENU']='Système d\'invitation';
$language['INV_INFO']='[b]xbtit Système d\'invitation par dodge 2009[/b]
[b]Caractéristiques:[/b]

[b]Panneau d\'adm[/b]
Ici, vous pouvez activer / désactiver le hack, et aussi regarder les invitations envoyées jusqu\'à présent.
Il a un paramètre pour la date d\'expiration des invitations, où les invitations sont recyclées si elles ne sont pas utilisées (par défaut 7 jours).
La validation de l\'invitabilité par inviter est déjà disponible et également choisis dans Admin.

Tout d\'abord, nous devons entrer dans le panneau d\'administration pour activer le panneau de gestion de hack, puis, sur le côté gauche, vous verrez le menu des panneaux d\'admin rechercher des hacks sous celui-ci, vous verrez les paramètres de hacks, cliquez dessus et vous allez passer à l\'écran des hacks
[img]'.$BASEURL.'/images/hack_info/inv-admin1.png[/img]

Il s\'agit du panneau de contrôle des hacks où vous pouvez activer et désactiver les hacks, rechercher le système d\'invitation, vous verrez un menu déroulant avec l\'option Désactivé et activé, passez en Activé, puis faites défiler jusqu\'au bouton Soumettre
[img]'.$BASEURL.'/images/hack_info/inv-admin2.png[/img]

Cliquez sur le bouton soumettre pour activer le hack
[img]'.$BASEURL.'/images/hack_info/inv-admin3.png[/img]

Maintenant, le hack est activé pour savoir comment l\'utiliser du point de vue du staff et un point de vue des membres

[b]Outils staff[/b]

Dans le panneau d\'administration, vous verrez maintenant
[img]'.$BASEURL.'/images/hack_info/inv-admin4.png[/img]

Cliquez sur Invitations pour voir les param. d\'admin.

1. Tracker Privé oui / non - Si oui, le site sélectionné sera invité uniquement, le hack définira automatiquement "max_users" sur "1" pour une sécurité améliorée, et la désactivation le mettra à "0". Dès lors, l\'inscription sera disponible pour ceux qui ont un code d\'invitation valide, fourni par celui qui l\'a envoyé de votre tracker

2. Confirmation requise oui / non - si oui est sélectionné, l\'invité doit confirmer les invitations dans Invitations dans le menu utilisateur (voir les outils utilisateur image 1) si non est sélectionné l\'utilisateur invité s\'inscrit à l\'aide du code d\'invitation. Pas besoin que l\'inviteur fasse quoi que ce soit.

3. Période de recyclage - cette valeur par défaut est définie à 7 jours après cette période de 7 jours, toutes les invitations inutilisées seront inutiles, vous pouvez modifier ce paramètre à ce que vous voulez, ce qui est fondamentale, c\'est la date d\'expiration des invitations.

4. Donner des invitations - c\'est là que vous pouvez donner des invitations aux membres ou aux classes membres, pour donner des invitations aux membres individuels, saisissez le nom d\'utilisateur ou cliquez sur Rechercher l\'utilisateur entre le rang et le montant des invitations que vous souhaitez leur donner puis cliquez sur Confirmer, Pour Envoyer une invitation à une classe d\'utilisateur entière, n\'introduisez aucun nom où il indique l\'UTILISATEUR que vous devez faire est de sélectionner le rang que vous souhaitez envoyer des invitations pour sélectionner le bombre d\'invitation que vous souhaitez les envoyer puis cliquez sur confirmer, vous obtiendrez une pop Up box vous demandant de confirmer vos actions, cliquez simplement sur oui ou ok

5. Liste d\'invitation - c\'est une liste des invitations envoyées par tous les utilisateurs que vous verrez toutes les informations sur qui a invité qui.[img]'.$BASEURL.'/images/hack_info/inv-admin5.png[/img]

[b]- Panneau utilisateur[/b] 
Ici, vous pouvez envoyer des invitations si vous les avez. Toutes les invitations envoyées auront un délai spécifié dans Admin, après quoi elles seront recyclées et ne seront plus utilisables.
L\'invitation est envoyée par courrier électronique et peut donner lieu à une inscription directe ou à une confirmation invitante (vous pouvez choisir dans Admin).

[B] OUTILS MEMBRES [/ b]

Lorsque les invités sont activés, les membres auront une nouvelle option dans le menu utilisateur, pour envoyer une invitation, ils doivent cliquer sur Inviter dans le manu utilisateur et cela les amènera à l\'écran d\'invitation[img]'.$BASEURL.'/images/hack_info/inv_user1.png[/img]

[img]'.$BASEURL.'/images/hack_info/inv_user2.png[/img]

1. Envoyer des invitations - si un membre clique sur cela, il les prendra dans un écran où ils peuvent envoyer une invitation à un ami. Voir l\'image ci-dessous

2. Invitations envoyées - il s\'agit d\'une liste d\'invitation que le membre a envoyée et de la participation de l\'invitation

3. Membres invités par vous - il s\'agit d\'une liste d\'invitations que le membre a envoyées si le système d\'invitation est défini sur Confirmation nécessaire oui, c\'est également là où le membre doit chercher à confirmer son compte d\'amis
[img]'.$BASEURL.'/images/hack_info/inv_user3.png[/img]
L\'image ci-dessus est l\'écran d\'invitation que tout membre doit remplir l\'email de ses amis et un message d\'invitation sera envoyée par email à un ami, je pense que j\'ai couvert tout sur ce système, si j\'ai omis, n\'hésite pas à l\'ajouter 
';
$language['CMT_MENU']='Titre personnalisé';
$language['CMT_INFO']='[b]Titre personnalisé par Real_ptr[/b]

Le hack permet aux mods d\'ajouter un titre personnalisé à l\'utilisateur directement à partir de la page userdetails. Le titre personnalisé sera affiché dans les Forums, dans les pages Détails du Torrent et dans la page Détails de l\'utilisateur.

Après avoir activé ce hack, vous trouverez quelques nouveaux champs dans userdetails.php lorsque vous visitez la page d\'un utilisateur (visible uniquement pour les utilisateurs qui utilisent les éditeurs edit_users ou ont un admin_access)

[B] Ce hack est un pré-requis du Bonus System. [/ B]

[img]'.$BASEURL.'/images/hack_info/custom_title1.png[/img]

[img]'.$BASEURL.'/images/hack_info/custom_title2.png[/img]

[img]'.$BASEURL.'/images/hack_info/custom_title3.png[/img]
';

$language['BS_MENU']='Système Bonus';
$language['BS_INFO']='[b]Système Bonus par Real_ptr et Petr1fied[/b]

Avec les systèmes Bonus, les utilisateurs peuvent être attribués avec des points seedbonus
Pour de nombreuses raisons différentes en fonction des paramètres que vous choisissez dans le panneau.
[img]'.$BASEURL.'/images/hack_info/bonus_settings.png[/img]

Les utilisateurs peuvent ensuite cliquer sur leurs points dans le menu dans leur barre d\'outils.
[img]'.$BASEURL.'/images/hack_info/bon_menu.png[/img]

Ensuite, ils sont présentés avec différentes façons de les encaisser en fonction de combien ils ont.
[img]'.$BASEURL.'/images/hack_info/bonus_user.png[/img]
';

$language['DH_MENU']='Historique des dons';
$language['DH_INFO']='[b]Historique des dons par Diemthuy[/b]

[B] Ce hack est un pré-requis du Advanced Auto Donation System. [/ B]

Ce hack ajoute un historique de don complet à votre tracker.

Si vous obtenez un don, il vous suffit de donner le montant
Dans les détails de l\'utilisateur du donateur, il existe une place pour 10 dons
Pour un utilisateur, la date est remplie automatiquement.
[img]'.$BASEURL.'/images/hack_info/DH1.jpg[/img]


Après cela, les dons apparaissent également dans l\'histoire de donation ACP, ici vous voyez toutes les informations et vous pouvez modifier les dons.
[img]'.$BASEURL.'/images/hack_info/DH2.jpg[/img]


Le panneau d\'édition des dons.
[img]'.$BASEURL.'/images/hack_info/DH3.jpg[/img]


La vue publique des dons.
[img]'.$BASEURL.'/images/hack_info/DH4.jpg[/img]


Il existe également des paramètres pour le MP automatique après la création d\'un don.
[img]'.$BASEURL.'/images/hack_info/DH5.jpg[/img]

[img]'.$BASEURL.'/images/hack_info/DH6.jpg[/img]
';


$language['SD_MENU']='Affichage simple du donneur';
$language['SD_INFO']='[b]Affichage simple du donneur par Lupin[/b]

[B] Ce hack est un pré-requis du Advanced Auto Donation System. [/ B]

Ce hack vous permet de vérifier un utilisateur en tant que donateur, l\'icône du donateur sera affichée toujours après le nom de l\'utilisateur.
[img]'.$BASEURL.'/images/hack_info/SD.png[/img]

[img]'.$BASEURL.'/images/hack_info/SD2.jpg[/img]

[img]'.$BASEURL.'/images/hack_info/SD3.jpg[/img]
';

$language['TR_MENU']='Rang chronométré';
$language['TR_INFO']='[b]Rang chronométré par Diemthuy[/b]

[B] Ce hack est un pré-requis du Advanced Auto Donation System. [/ B]

Ce hack vous permet de définir un utilisateur sur un rang pour une période de temps déterminée.
[img]'.$BASEURL.'/images/hack_info/TR.png[/img]

[img]'.$BASEURL.'/images/hack_info/TR2.png[/img]

[img]'.$BASEURL.'/images/hack_info/TR3.png[/img]

';
$language['ADS_MENU']='Système avancé de don automatique';
$language['ADS_INFO']='[b]Système avancé de don automatique par Diemthuy[/b]

Ce hack vous permet de configurer des dons automatiques afin que vous ne le faites pas
Doivent faire n\'importe quoi pour mettre à niveau les utilisateurs lorsqu\'ils font un don. Il prend en charge Paypal IPN, le transfert de données de paiement Paypal et Alertpay. Voici les différents paramètres que vous pouvez choisir.

[img]'.$BASEURL.'/images/hack_info/ADS1.png[/img]

[img]'.$BASEURL.'/images/hack_info/ADS2.png[/img]

[img]'.$BASEURL.'/images/hack_info/ADS3.png[/img]

';
$language['GST_MENU']='Torrents d\'or et d\'argent';
$language['GST_INFO']='[b]Torrents d\'or et d\'argent par Losmi[/b]

Ce hack vous permet de configurer des torrents soit en freeleech (or), soit en demi-freeleech (argent).
Cela peut être réglé via la page de téléchargement ou la page d\'édition.
[img]'.$BASEURL.'/images/hack_info/GST1.png[/img]

[img]'.$BASEURL.'/images/hack_info/GST2.png[/img]

';
$language['FRH_MENU']='Free Leech avec Happy Hour';
$language['FRH_INFO']='[b]Free Leech avec Happy Hour par Diemthuy[/b]

Ce hack vous permet de configurer des torrents sur des freeleech (100% gratuites) et Happy Hour.
Happy Hour est un freeleech au hasard sur les torrents et ils finissent à 
L\'heure désirée définie dans le panneau d\'administration.

[img]'.$BASEURL.'/images/hack_info/FRH.png[/img]

';
$language['TIU_MENU']='Uploader l\'image du Torrent';
$language['TIU_INFO']='[b]Uploader l\'image du Torrent par Real_ptr[/b]

[B] Ce hack est un pré-requis des balloons on mouseover | sur les derniers torrents. [/ B]

Ce hack vous permet d\'ajouter des images et des captures d\'écran à des torrents.
Vous pouvez définir les limites de taille d\'image et le chemin via le panneau d\'administration.
[img]'.$BASEURL.'/images/hack_info/TIU.png[/img]

[img]'.$BASEURL.'/images/hack_info/TIU2.png[/img]

[img]'.$BASEURL.'/images/hack_info/TIU3.png[/img]

[img]'.$BASEURL.'/images/hack_info/TIU4.png[/img]

';
$language['WS_MENU']='Système d\'avertissement';
$language['WS_INFO']='[b]Système d\'avertissement par linux198 & Petr1fied[/b]

[B] Ce hack est un pré-requis du système Anti Hit and Run | Système d\'interdiction de bas niveau. [/ B]

Ce hack vous permet de prévenir les utilisateurs pour tout type de raison. Chaque utilisateur a un niveau en fonction du nombre de maximum
Les avertissements sont définis dans les paramètres du panneau d\'administration.

[img]'.$BASEURL.'/images/hack_info/WS.png[/img]

[img]'.$BASEURL.'/images/hack_info/WS1.png[/img]

[img]'.$BASEURL.'/images/hack_info/WS2.png[/img]

[img]'.$BASEURL.'/images/hack_info/WS3.png[/img]

[img]'.$BASEURL.'/images/hack_info/WS4.png[/img]

';
$language['HR_MENU']='Système Anti Hit & Run';
$language['HR_INFO']='[b]Anti Hit & Run par DiemThuy & Petr1fied[/b]

B] Ce hack est un pré-requis du système de réputation. [/ B]

H & R hack hautement amélioré, il fonctionne maintenant sur le forum, s (int et SMF), il a plus d\'options, le code dans le nettoyage est amélioré pour ne pas pouvoir sauter aux erreurs de ligne 0 (comme V1), vous pouvez utiliser le  hack d\'avertissement pour h&r alèrent automatiquement, ou avec le hack utilisateurs élagués, vous pouvez les interdire pendant quelques jours, vous avez également une liste d\'utilisateurs qui ont un h&r avec le ratio, il est facile de repérer si les utilisateurs Essaient de tricher le système, et vous avez un bouton d\'interdiction instantanée pour ces tricheurs (ou de mauvais utilisateurs réels)

Plus grossier, il a la fonction standard de punir les h&r pour enlever un GB et envoyer un mp pour expliquer à l\'utilisateur ce qu\'il a fait et ce qui se passe maintenant

[IMG]'.$BASEURL.'/images/hack_info/Clipboard01-53.jpg[/img]

Le système de récompense fonctionne sur toutes les punitions, si vous l\'activez, l\'utilisateur récupérera la quantité perdue de GB, mais pourra également être ignoré ou non (si défini) et avoir un MP explicatif.

[IMG]'.$BASEURL.'/images/hack_info/Clipboard01-52.jpg[/img]

Vous pouvez configurer les paramètres pour chaque groupe d\'utilisateurs

La liste des h&r a de bonnes fonctions de tri (appuyez sur un nom d\'en-tête et trier, repoussez-le, trier inversé)

Alors nous avons le bloc de h&r, avec Texte défilant (si vous ne voulez pas que tous vos utilisateurs voient ce bloc, il suffit de le configurer uniquement pour le staff)

[IMG]'.$BASEURL.'/images/hack_info/Clipboard01-54.jpg[/img]

Et les paramètres acp 

[IMG]'.$BASEURL.'/images/hack_info/Clipboard02-10.jpg[/img]

Le ACP 
[img]'.$BASEURL.'/images/hack_info/Clipboard01-95.JPG[/img]

Et l\'avertissement automatique

[IMG]'.$BASEURL.'/images/hack_info/Clipboard01-55.jpg[/img]

Si vous utilisez les bons paramètres, pour ce hack, vous pouvez mettre en feu votre staff  ;)

';
$language['IMD_MENU']='Prenez des informations IMDB dans les détails du torrent';
$language['IMD_INFO']='[b]Prenez des informations IMDB dans les détails du torrent par cooly[/b]

Récupère l\'information IMDB dans les détails du torrent à partir du numéro d\'identification IMDB.
Donnez-vous des affiches, des notes, des mots-clés, des langues, des tracés, des votes, des tracés, des années, des genres, des genres, du pays et de l\'exécution.
Aussi a des informations prolongées et une recherche soignée afin que vous ne devez pas quitter le site:)

[img]'.$BASEURL.'/images/hack_info/imdb1.png[/img]

[img]'.$BASEURL.'/images/hack_info/imdb2.png[/img]

[img]'.$BASEURL.'/images/hack_info/imdb3.png[/img]

';
$language['SP_MENU']=' Panneau Staff ';
$language['SP_INFO']='[b]Panneau Staff par Lupin[/b]

Voici un guide pour l\'utilisation du panneau du staff, il peut sembler difficile, mais une fois que vous l\'avez fait quelques fois, vous le trouverez facile, comme toujours ouvrez d\'abord le panneau d\'administration et activez-le comme indiqué dans la photo suivante

[img]'.$BASEURL.'/images/hack_info/staff_panel1.jpg[/img]

Une fois activé, nous devons cliquer sur un hack pour le tutoriel, j\'ai choisi messagerie privée de masse, regardez la photo suivante

[img]'.$BASEURL.'/images/hack_info/staff_panel2.jpg[/img]

Comme vous le voyez à partir de l\'image, cliquez sur le message privé de masse, puis copiez le lien ci-dessus uniquement sur la partie APRES l\'adresse du site.  [b]index.php?page=admin&user=2&code=181781&do=masspm&action=write[/b]

Une fois que vous avez copié ce lien, vous devez cliquer sur les paramètres du panneau du staff

[img]'.$BASEURL.'/images/hack_info/staff_panel3.jpg[/img]

Alors vous verrez l\'écran des paramètres suivants

[img]'.$BASEURL.'/images/hack_info/staff_panel4.jpg[/img]

À partir du menu déroulant, sélectionnez la classe du staff que vous souhaitez régler sur le panneau, puis cliquez sur confirmer, vous passerez ensuite à l\'écran suivant

[img]'.$BASEURL.'/images/hack_info/staff_panel5.jpg[/img]

Je l\'ai divisé en 4 parties simples, de sorte que vous pouvez facilement comprendre comment cela fonctionne


Cette partie porte sur le lien que vous avez copié, rappelez-vous le lien de messagerie privée de masse, essayez de bien suivre, prenez votre temps, car si vous vous trompez, le lien pour votre équipe d\'administration ne fonctionnera pas, ils obtiendront une erreur en disant qu\'ils ne le sont pas autorisé à voir un autre panneau de membres, etc. Si cela se produit, le seul moyen de supprimer le lien se trouve dans la base de données, puis suivez les étapes à suivre.  

1. Dans cette partie, regardez le lien que nous avons copié et posé la partie après= Dans ce cas le massmp il est important que chaque lien dans le panneau d\'administration soit différent.= alors n\'oubliez pas de changer lorsque vous ajoutez d\'autres options à votre panneau staff

2. Celui-ci est facile, c\'est essentiellement ce que vous voulez que le lien soit appelé dans le panneau afin que vous mettiez Mp de masse ici et c\'est le nom qui sera affiché dans votre panneau des membres du staff

3. Celui-ci est très important, vous devez obtenir ce droit ce que vous metriez ici, c\'est le lien que nous avons copié index.php?page=admin&user=2&code=181781&do=masspm&action=write Mais notez dans l\'image ci-dessous, nous devons choisir l\'identifiant de l\'utilisateur et le code de l\'utilisateur ou le lien ne fonctionnera pas sur le profil de votre membre du personnel. Cette partie utilisateur = 2 doit être changé en utilisateur = {uid}, nous devons également modifier cette partie code=181781 par code={ucode} Assurez-vous que cela se fait pour chaque option que vous ajoutez aux panneaux des membres de votre staff

4. Une fois que vous avez tout ce qui ressemble à la photo ci-dessous, cliquez sur confirmer

Voici comment il devrait se voir cette étape

[img]'.$BASEURL.'/images/hack_info/staff_panel6.jpg[/img]

Une fois que vous êtes sûr de le faire, cliquez sur le bouton droit de la souris pour confirmer que la classe de membre de votre staff que vous avez sélectionnée pourra utiliser cette option, vous pouvez ajouter autant de liens au panneau du staff que vous voulez que le processus soit tout simplement le même, n\'oubliez pas de changer user=2 a user{uid} et code=181781 a code={ucode} Et vous devriez être prêt. Si vous faites une erreur, la seule façon de l\'enlever de la base de données de connexion à votre base de données est de recherchez dans le panneau du staff cliquez sur le bouton gauche, puis cliquez sur Parcourir chercher le mauvais lien, sélectionnez puis supprimez la table et réessayez.


Oh, une dernière chose avant que j\'oublie une fois que vous avez cliqué sur confirmer pour ajouter la nouvelle option au panneau de membres de votre staff, vous devrez cocher la case et cliquer sur confirmer pour que cela s\'affiche dans un autre panneau, cela ne s\'affichera pas.

Espérant que cela vous aidera

';
$language['ATS_MENU']='Recherche avancé de torrent';
$language['ATS_INFO']='[b]Recherche avancé de torrent par DiemThuy & cooly[/b]

ÉTAPE À PERMETTRE. (Voir la pièce jointe pour vous aider à vous situer.)
[img]'.$BASEURL.'/images/hack_info/ats1.png[/img]

Vous pouvez l\'activer dans le panneau admin.
Sur le PANNEAU a gauche, sous la catégorie HACK, cliquez sur HACK SETTINGS.
Activer Advanced Torrent Search.
Cliquez sur le bouton SOUMETTRE.

COMMENT UTILISER.

Jetez un oeil à l\'image . Vous comprendrez en la regardant.
[img]'.$BASEURL.'/images/hack_info/ats2.png[/img]

Donc, si vous désactivez ce HACK, l\'option CHERCHER DANS ne sera pas disponible.
[img]'.$BASEURL.'/images/hack_info/ats3.png[/img]

';
$language['SBET_MENU']='Pari sportif';
$language['SBET_INFO']='[b]Pari sportif par DiemThuy[/b]

Nous commençons par activer le bloc SportBetting dans les paramètres de bloc et nous aurons maintenant ce bloc sur l\'index

[img]'.$BASEURL.'/images/hack_info/sport_bet1.png[/img]

Il suffit de cliquer dessus pour accéder à la page Paramètres

[img]'.$BASEURL.'/images/hack_info/sport_bet2.png[/img]

Ici, nous avons simplement cliquer sur Betadmin

[img]'.$BASEURL.'/images/hack_info/sport_bet3.png[/img]

Sur cette page, nous ajoutons le nom de pari (Exemple) >>>> Angleterre-Allemagne <<<<< J\'utilise la même chose sur le titre de pari et les paris En raison de l\'autopost du forum, le fera
Remplissez la date de fin, etc. etc ordre de tri, j\'utilise l\'ID (ne sais pas vraiment comment cela fonctionne) alors, lorsque nous avons terminés, cliquez sur SOUMETTRE
Votre pari apparaîtra maintenant sur la liste sur la première page (image3), nous cliquons sur les options d\'ajout dans la liste

[img]'.$BASEURL.'/images/hack_info/sport_bet4.png[/img]

Et ajouter l\'option 1x2 ou ce que nous voulons lorsque vous cliquez sur le lien, les options ajoutées apparaîtront comme la table 1x2

Maintenant, nous revenons à la page de paramètres (photo 3) et définissons le pari actif, cliquez sur le 0 dans le champ défini actif ... et votre pari devrait maintenant être actif et visible dans le bloc du pari sportif

';
$language['CBT_MENU']='CBT (Outils de sauvegarde Coolys)';
$language['CBT_INFO']='[b]CBT (Outils de sauvegarde Coolys) par cooly[/b]

Avant d\'utiliser CBT, assurez-vous que vos fichiers ont les autorisations correctes.

CHMOD SET

/sxd/ses.php 666
/sxd/cfg.php 666
/sxd/backup.sh 666
/sxd/backup 777
/sxd/backup/web 777

Il serait également sûr de s\'assurer que votre serveur dirs ne soit pas configuré pour afficher des index par exemple.
[b] Options Indexes FollowSymLinks [/ b]

serait
[b]Options FollowSymLinks[/b]

Dans votre site (apache activé) ou quel que soit le serveur que vous utilisez.

BACKUP DE DOSSIER

Lorsque vous cliquez sur la sauvegarde des fichiers, vous arrivez a cette page.
[img]'.$BASEURL.'/images/hack_info/cbt1.png[/img]

Là où il dit que la dernière sauvegarde est vide et lorsque vous en faites une, le lien apparaîtra ici.
Après avoir cliqué sur le lecteur, vous arriverez à cette page où vous pouvez commencer.
[img]'.$BASEURL.'/images/hack_info/cbt2.png[/img]

Lisez attentivement les instructions et appuyez une fois sur le bouton. Si cela semble être trop long pour  tout faire, laisser la page et revenez dans 10 minutes environ.
Il devrait ressembler à ceci, si cela se termine pendant que vous êtes là.
[img]'.$BASEURL.'/images/hack_info/cbt3.png[/img]

Ensuite, cliquez de nouveau sur le lien de sauvegarde du fichier dans le menu et vous devriez voir le téléchargement.
[img]'.$BASEURL.'/images/hack_info/cbt4.png[/img]
Cliquez sur le lien pour l\'enregistrer.

[b]Sauvegarde MYSQL[/b]

Lorsque vous cliquez sur la sauvegarde MYSQL, vous arrivez a cette page.
[img]'.$BASEURL.'/images/hack_info/cbt5.png[/img]

Le login est le même que vous utiliserez pour l\'utilisateur de la base de données xbtit pour phpmyadmin.
Une fois connecté, vous avez plusieurs options.

Base de données (schéma): la base de données que vous souhaitez sauvegarder
Charset: UTF8 dans la plupart des cas serait la meilleure option.
Compression: gzip 1 serait la plus petite compression, fichier plus grand, Bzip (max) compression la plus élevée la plus petite taille de fichier, pas de fichier compressé en pleine taille.

C\'est ce que je choisirais.
[img]'.$BASEURL.'/images/hack_info/cbt6.png[/img]

exécuter et le travail commencera.
[img]'.$BASEURL.'/images/hack_info/cbt7.png[/img]

Vous pouvez ensuite utiliser le bouton de téléchargement pour récupérer votre sauvegarde.
Dans l\'onglet Fichiers, vous trouverez une liste de toutes vos archives pour faire ce que vous aimez.
[img]'.$BASEURL.'/images/hack_info/cbt8.png[/img]

';

$language['XTD_MENU']='Param.XTD';
$language['XTD_INFO']='[b]Description étendu du torrent par Khez[/b]

Vous trouverez ce HACK sous le panneau d\'admin. Sur le panneau de gauche Jetez un coup d\'oeil aux IMAGES CI-DESSUS pour vous aider à vous situer.

1) Option IMG Tags (0 pour désactiver) -> Nombre minimum d\'images utilisant les img tags qui doivent être dans la description de torrent.

2) Min Description Chars (0 à Disable) -> Ceci est le caractère MINIMUM Caractères alphanumériques qu\'un membre doit entrer pour pouvoir créer un nouveau TORRENT.

3) Nom de fichier requis (vide pour désactiver) -> Si vous voulez que le torrent contienne un fichier appelé "téléchargé sur mysite.com.txt" dans le torrent. Ce fichier doit être présent s\'il est activé.

4) Correspondance sensible à la case sur le nom de fichier -> Ce sujet est lié à 3, que vous souhaitez ou non que le nom de fichier soit sensible à la case.

5) Type de recherche de nom de fichier -> Ce sujet est lié à 3, que vous souhaitiez qu\'il s\'agisse d\'une correspondance exacte ou simplement d\'une partie du nom de fichier.
[img]'.$BASEURL.'/images/hack_info/xtd1.png[/img]

[img]'.$BASEURL.'/images/hack_info/xtd2.png[/img]

[img]'.$BASEURL.'/images/hack_info/xtd3.png[/img]

';
?>