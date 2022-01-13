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

$language['NOT_SHA']='SHA1 : Cette fonction n\'est pas disponible. Vous avez besoin de PHP 4.3.0 ou supérieur.';
$language['NOT_AUTHORIZED_UPLOAD']='Vous n\'êtes pas autorisé à uploader!';
$language['FILE_UPLOAD_ERROR_1']='Impossible de lire le fichier uploadé.';
$language['FILE_UPLOAD_ERROR_3']='Le fichier a une taille de 0';
$language['FACOLTATIVE']='Optionnel';
$language['FILE_UPLOAD_ERROR_2']='Erreur sur le fichier uploadé!';
$language['ERR_PARSER']='Il semble y avoir une erreur dans votre torrent, refusé par le système.';
$language['WRITE_CATEGORY']='Vous devez spécifier la catégorie...';
$language['DOWNLOAD']='Téléchargement';
$language['MSG_UP_SUCCESS']='Le Torrent a été Uploadé avec succès!';
$language['MSG_DOWNLOAD_PID']='Système PID actif, veuillez prendre votre torrent avec votre PID';
$language['MSG_AUTO_ANNOUNCE']='Pour vous assurez d\'avoir votre fichier bien en seed, vous devez télécharger votre Fichier Torrent ici:<br /><br />';
$language['EMPTY_DESCRIPTION']='Vous devez entrer une description!';
$language['EMPTY_ANNOUNCE']='L\'Announce est manquante';
$language['FILE_UPLOAD_ERROR_1']='Impossible de lire le fichier uploadé';
$language['FILE_UPLOAD_ERROR_2']='Erreur sur le fichier uploadé';
$language['FILE_UPLOAD_ERROR_3']='Le fichier a une taille de 0';
$language['NO_SHA_NO_UP']='Fichier à uploader indisponible - Focntion SHA1 indisponible.';
$language['NOT_SHA']='Focntion SHA1 indisponible. Vous avez besoin de PHP 4.3.0 ou supérieur.';
$language['ERR_PARSER']='Il semble y avoir une erreur dans votre torrent, refusé par le système.';
$language['WRITE_CATEGORY']='Vous devez spécifier la catégorie...';
$language['ERR_HASH']='Info hash doit contenir exactement 40 hex bytes.';
$language['ERR_EXTERNAL_NOT_ALLOWED']='Les Torrents externes sont refusés';
$language['ERR_MOVING_TORR']='Erreur sur le déplacement du torrent...';
$language['ERR_ALREADY_EXIST']='Ce Torrent doit déjà exister dans notre base de données.';
$language['MSG_DOWNLOAD_PID']='Système PID actif, veuillez prendre votre torrent avec votre PID';
$language['MSG_UP_SUCCESS']='Le Torrent a été Uploadé avec succès!';


$language["FILE_UPLOAD_TO_BIG"]="Le poids du fichier est trop volumineux!! La limite est de ";
$language["IMAGE_WAS"]="Dimensions de l'image";
$language["MOVE_IMAGE_TO"]="Impossible de déplacer l'image vers ";
$language["CHECK_FOLDERS_PERM"]="SVP, vérifier les permissions du dossier et recommencer.";
$language["ILEGAL_UPLOAD"]="Upload interdit!! Ce n'est pas une image<br>SVP, cliquer sur Retour et recommencer";
$language["IMAGE"]="Image";
$language["SCREEN"]="Screenshots";

// Twitter Update
$language["TWIT_UNABLE"] = "Impossible de mettre à jour Twitter, l'extension cURL non trouvée!";
$language["TWIT_NT"] = "Nouveau Torrent";

// Preview
$language["UP_PREV"] = "Prévisualisation";

// Auto announce - Start -->

// I'm not entirely sure exactly what this is meant to say as the original hack was in Hungarian

// Google Translation of original Hungarian text:
// In the case of any other torrent site if you want to upload a torrent to download, you need not announce to the URL rewrite, in any event, it will be overwritten by the correct URL!
$language["AUTO_ANNOUNCE"]="Les torrents uploadés auront automatiquement l'Announce URL du Saloon";

// Google Translation of original Hungarian text:
// Thus, any downloaded file tracker. torrent file upload!
$language["AUTO_ANNOUNCE2"]="<b>Évidemment, vous pouvez uploader des torrents qui viennent de d'autres Trackers ici-même.</b>";

// <-- End - Auto announce

?>