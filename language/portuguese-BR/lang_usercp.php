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
$language["DELETE_READED"]="Apagar";
$language["USER_LANGUE"]="Idioma";
$language["USER_STYLE"]="Estilo";
$language["CURRENTLY_PEER"]="Você atualmente está semeando ou baixando alguns torrents.";
$language["STOP_PEER"]="Você deve parar o seu cliente.";
$language["USER_PWD_AGAIN"]="Repetir a senha";
$language["EMAIL_FAILED"]="O Envio do e-mail falhou!";
$language["NO_SUBJECT"]="Sem assunto";
$language["MUST_ENTER_PASSWORD"]="<br /><font color='#FF0000'><strong>É necessário digitar sua senha para alterar as configurações acima.</strong></font>";
$language["ERR_PASS_WRONG"]="Senha incorreta ou vazia, não pode atualizar perfil.";
$language["MSG_DEL_ALL_PM"]="Se você selecionar PMs, que não foram lidos, elas não serão apagada";
$language["ERR_PM_GUEST"]="Infelizmente você não pode enviar PM ao guest ou para si mesmo!";

//INVITATION SYSTEM
global $SITENAME, $BASEURL, $SITEEMAIL;

$language['ACCOUNT_CONFIRMED']='Conta Confirmada';
$language['CONFIRMED']='Confirmada';
$language['DATE_SENT']='Data do Envio';
$language['ERR_EMAIL_ALREADY_EXISTS']='Este e-mail já existe em nossa database.';
$language['ERR_INVITATIONS_OFF']='Desculpe, o sistema de convites está desativado.';
$language['MISSING_DATA']='Informação faltando!<br />Por favor preencha todos is campos necessários.';
$language['INSERT_EMAIL']='Campo endereço de e-mail vazio!';
$language['INSERT_MESSAGE']='Campo mensagem pessoal vazio!';
$language['INVIT_CONFIRM']='Convite Confirmado';
$language['INVIT_MSG']='Olá,'."<br /><br />".'Você foi convidado a participar da comunidade do '.$SITENAME.' por';
$language['INVIT_MSG1']="<br /><br />".'Se você quizer aceitar este convite, você precisa clicar neste link:'."<br /><br />".'';
$language['INVIT_MSG2']="<br /><br />".'Você precisa aceitar este convite em 24 horas ou este convite ficará inativo.'."<br /><br />".'Nós do '.$SITENAME.'esperamos que você aceite este convite e participe da nossa grande comunidade!'."<br /><br />".'Mensagem pessoal de';
$language['INVIT_MSG3']="<br /><br />".'----------------'."<br /><br />".'Se você não conhece a pessoa que lhe convidou, devolva este e-mail para '.$SITEEMAIL;
$language['INVIT_MSGCONFIRM']='Olá,'."<br />".'Sua conta foi confirmada. Você pode visitar agora'."<br /><br />".$BASEURL.'/index.php&page=login'."<br /><br />".'e usar suas informações para logar. Esperamos que você leia o FAQ and Regras antes de começar a compartilhar arquivos.'."<br /><br />".'Boa Sorte e Divirta-se '.$SITENAME.'!'."<br /><br /><br />".'----------------'."<br /><br />".'Se você não quer se registrar no '.$SITENAME.', por favor devola este e-mail para '.$SITEEMAIL;
$language['INVITATIONS']='Convites';
$language['INVITE_SOMEONE_TO']='Enviar Convite';
$language['MEMBERS_INVITED_BY']='Membros convidados por você';
$language['MESSAGE']='Menssagem';
$language['MNU_UCP_INVITATIONS']='Convites';
$language["MNU_UCP_TOOLS"]='Ferramentas';
$language['NO_INV']='Nenhum convite sobrando.';
$language['NO_INVITATIONS_OUT']='Nenhum convite enviado.';
$language['NO_NEED_CONFIRM_YET']='Nenhum convite para confirmar.';
$language['PENDING']='Pendentes';
$language['REMAINING']='Remanescentes';
$language['SENT_INVITATIONS']='Enviar Convites';
$language['STATUS']='Status';
$language['WELCOME_UCP_INVITE']='Bem Vindo ao Painel de Convites.<br />Aqui você vai poder enviar convites para que seus amigos possam se registrar no '.$SITENAME.'.<br />';

?>