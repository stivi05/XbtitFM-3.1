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
$language['ACCOUNT_CREATED']='Conta Criada';
$language['USER_NAME']='Usuário';
$language['USER_PWD_AGAIN']='Repita a Senha';
$language['USER_PWD']='Senha';
$language['USER_STYLE']='Estilo';
$language['USER_LANGUE']='Idioma';
$language['IMAGE_CODE']='Código da Imagem';
$language['INSERT_USERNAME']='Você deve inserir um nome de usuário!';
$language['INSERT_PASSWORD']='Você deve inserir uma senha!';
$language['DIF_PASSWORDS']='As senhas não correspondem!';
$language['ERR_NO_EMAIL']='É preciso digitar um endereço de email válido';
$language['USER_EMAIL_AGAIN']='Repita o e-mail';
$language['ERR_NO_EMAIL_AGAIN']='Repita o e-mail';
$language['DIF_EMAIL']='Os e-mails não correspondem!';
$language['SECURITY_CODE']='Responda a pergunta';
# Password strength
$language['WEEK']='Fraca';
$language['MEDIUM']='Media';
$language['SAFE']='Segura';
$language['STRONG']='Forte';
$language['ERR_GENERIC']='Generic Error: '.mysqli_error($GLOBALS['conn']);
//INVITATION SYSTEM
global $SITENAME, $BASEURL, $SITEEMAIL;
$language['INVIT_MSGINFO']='Você solicitou uma nova conta no '.$SITENAME;
$language['INVIT_MSGINFO1']='<br /><br />'.'Sua conta está aguardando a confirmação do membro que lhe convidou. Enquanto sua conta é confirmada você não tem acesso total ao site.';
$language['INVIT_MSGINFO2A']='<br /><br />'.'Informação da Conta:'.'<br />'.'Usuário:';
$language['INVIT_MSGINFO2B']='Senha:';
$language['INVIT_MSGINFO3']='<br /><br />'.'----------------'.'<br /><br />'.'Caso não queira se registrar no '.$SITENAME.', por favor devolva este email para '.$SITEEMAIL;
$language['INVIT_MSG_AUTOCONFIRM3']='<br /><br />'.'----------------'.'<br /><br />'.'Você pode visitar agora'.'<br /><br />'.$BASEURL.'/index.php&page=login'.
									'<br /><br />'.'e usar suas informações para logar.'.'<br /><br />'.
									'Boa Sorte e Divirta-se no '.$SITENAME.'!'.'<br /><br /><br />'.'----------------'.'<br /><br />'.
									'Caso não queira se registrar no '.$SITENAME.', por favor devolva este email para '.$SITEEMAIL;
$language['REG_CONFIRM']='Confirmação da Conta';
$language['INVITATION_ONLY']='Desculpe, mas os registros estão fechados.<br>Você precisa de um convite para se registrar.';
$language['WELCOME_INVITE']='Bem Vindo! Você aceitou o convite de um de nossos usuários.<br />Você pode agora se registrar.';
$language['INVITE_EMAIL_SENT1']='Um e-mail de confirmação foi enviado para o endereço de e-mail específicado';
$language['INVITE_EMAIL_SENT2']='<br />Você precisa´ra esperar até que o usuário que enviou o convite confirme sua conta.';
$language['INVITE_EMAIL_SENT3']='Um e-mail foi enviado para o endereço de e-mail específicado';
$language['INVITE_EMAIL_SENT4']='<br />Você pode agora <a href="index.php?page=login">LOGIN</a>. Boa Sorte e Divirta-se no '.$SITENAME.'!';
$language['INVALID_INVITATION']='Seu código de convite é inválido.';
$language['ERR_INVITATION']='<br />Solicite so usuário que lhe convidou um novo convite.';

?>