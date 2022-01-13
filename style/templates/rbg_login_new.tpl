<html>
<head>
<title><tag:SITENAME /></title>
	<link rel="stylesheet" href="./alt_login/new/rotating/main.css" type="text/css" />
	<link rel="stylesheet" href="./jscript/passwdcheck.css" type="text/css" />
	<script type="text/javascript" src="./jscript/jquery-3.4.1.min"></script>
	<script type="text/javascript" src="./jscript/kcdmenu.js"></script>
	
     <script type=\"text/javascript\" language=\"JavaScript\">

     function autoIframe(frameId){
     var newheight
              try{
                newheight = document.getElementById(frameId).contentWindow.document.body.scrollHeight;
                document.getElementById(frameId).height = newheight + 45;
              }
                catch(err){
                window.status = err.message;
              }
     }


     function autoResize(id){

     var newheight;

     if (!window.opera && !document.mimeType && document.all && document.getElementById){

     newheight=document.getElementById(id).contentWindow.document.body.offsetHeight;

     }else if(document.getElementById){

     newheight=document.getElementById(id).contentWindow.document.body.scrollHeight;

     }

     document.getElementById(id).height= (newheight + 45) + \"px\";

     }

     </script>
	
	
	
	
	<!-- ### Password strength javascript ### -->

<script type="text/javascript" src="./jscript/passwdcheck.js"></script>

<!-- ### End ### -->
<STYLE type="text/css">
.okButton {
background-color: #D4D4D4;
font-color: #000000;
font-size: 9pt;
font-family: arial;
width: 70px;
height:	20px;  
}
.alertTitle {
background-color: #3C56FF;
font-family: arial;
font-size: 9pt;
color: #FFFFFF;
font-weight: bold;
}
.alertMessage {
font-family: arial;
font-size: 9pt;
color: #000000;
font-weight: normal;
}
.alertBoxStyle {
cursor: default;
filter: alpha(opacity=90);
background-color: #E4E4E4;
position: absolute;
top: 200px;
left: 200px;
width: 100px;
height: 50px;
visibility:hidden; z-index: 999;
border-style: groove;
border-width: 5px;
border-color: #FFFFFF;
text-align: center;
}
</STYLE>
<div id="alertLayer" class=alertBoxStyle></div>
<SCRIPT LANGUAGE="JavaScript">
function BrowserCheck() {
var b = navigator.appName;
if (b == "Netscape") this.b = "NS";
else if (b == "Microsoft Internet Explorer") this.b = "IE";
else this.b = b;
this.v = parseInt(navigator.appVersion);
this.NS = (this.b == "NS" && this.v>=4);
this.NS4 = (this.b == "NS" && this.v == 4);
this.NS5 = (this.b == "NS" && this.v == 5);
this.IE = (this.b == "IE" && this.v>=4);
this.IE4 = (navigator.userAgent.indexOf('MSIE 4')>0);
this.IE5 = (navigator.userAgent.indexOf('MSIE 5')>0);
if (this.IE5 || this.NS5) this.VER5 = true;
if (this.IE4 || this.NS4) this.VER4 = true;
this.OLD = (! this.VER5 && ! this.VER4) ? true : false;
this.min = (this.NS||this.IE);
}
is = new BrowserCheck();
alertBox = (is.VER5) ? document.getElementById("alertLayer").style
: (is.NS) ? document.layers["alertLayer"]
: document.all["alertLayer"].style;

function hideAlert(){
alertBox.visibility = "hidden";}

function makeAlert(aTitle,aMessage){
document.all.alertLayer.innerHTML = "<table border=0 width=100% height=100%>" +
"<tr height=5><td colspan=4 class=alertTitle>" + " " + aTitle + "</td></tr>" +
"<tr height=5><td width=5></td></tr>" +
"<tr><td width=5></td><td width=20 align=left><img src='./images/alert.png'></td><td align=center class=alertMessage>" + aMessage + "<BR></td><td width=5></td></tr>" + 
"<tr height=5><td width=5></td></tr>" +
"<tr><td width=5></td><td colspan=2 align=center><input type=button value='OK' onClick='hideAlert()' class=okButton><BR></td><td width=5></td></tr>" +
"<tr height=5><td width=5></td></tr></table>";
thisText = aMessage.length;
location = "javascript:kcdmenu.toggle('login')";
if (aTitle.length > aMessage.length){ thisText = aTitle.length; }

aWidth = (thisText * 5) + 80;
aHeight = 100;
if (aWidth < 150){ aWidth = 200; }
if (aWidth > 350){ aWidth = 350; }
if (thisText > 60){ aHeight = 110; }
if (thisText > 120){ aHeight = 130; }
if (thisText > 180){ aHeight = 150; }
if (thisText > 240){ aHeight = 170; }
if (thisText > 300){ aHeight = 190; }
if (thisText > 360){ aHeight = 210; }
if (thisText > 420){ aHeight = 230; }
if (thisText > 490){ aHeight = 250; }
if (thisText > 550){ aHeight = 270; }
if (thisText > 610){ aHeight = 290; }

alertBox.width = aWidth;
alertBox.height = aHeight;
alertBox.left = (document.body.clientWidth - aWidth)/2;
alertBox.top = (document.body.clientHeight - aHeight)/2;

alertBox.visibility = "visible";
}
</SCRIPT>
<script type="text/javascript">
function form_control()
  {
    if (document.getElementById('user').value.length==0)
      {
      var user=document.createElement('span');
      user.innerHTML='<tag:language.INSERT_USERNAME />';
      alert(user.innerHTML);
      document.getElementById('user').focus();
      return false;
      }

    if (document.getElementById('want_password').value == "")
      {
      var want_password=document.createElement('span');
      want_password.innerHTML='<tag:language.INSERT_PASSWORD />';
      alert(want_password.innerHTML);
      document.getElementById('want_password').focus();
      return false;
      }

    if (document.getElementById('check_password').value == "")
      {
      var check_password=document.createElement('span');
      check_password.innerHTML='<tag:language.USER_PWD_AGAIN />';
      alert(check_password.innerHTML);
      document.getElementById('check_password').focus();
      return false;
      }

    if (document.getElementById('want_password').value !=  document.getElementById('check_password').value)
      {
      var dif_passwords=document.createElement('span');
      dif_passwords.innerHTML='<tag:language.DIF_PASSWORDS />';
      alert(dif_passwords.innerHTML);
      return false;
      }

    var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (document.getElementById('email1').value == "")
      {
      var email1=document.createElement('span');
      email1.innerHTML='<tag:language.ERR_NO_EMAIL />';
      alert(email1.innerHTML);
      document.getElementById('email1').focus();
      return false;
      }
    else
      {
        if (!filter.test(document.getElementById('email1').value))
         {
          var email1=document.createElement('span');
          email.innerHTML='<tag:language.ERR_NO_EMAIL />';
          alert(email1.innerHTML);
          document.getElementById('email1').focus();
          return false;
         }
      }


    if (document.getElementById('email_again1').value == "")
      {
      var email_again1=document.createElement('span');
      email_again.innerHTML='<tag:language.ERR_NO_EMAIL_AGAIN />';
      alert(email_again1.innerHTML);
      document.getElementById('email_again1').focus();
      return false;
      }
    else
      {
        if (!filter.test(document.getElementById('email_again1').value))
         {
          var email_again=document.createElement('span');
          email_again1.innerHTML='<tag:language.ERR_NO_EMAIL />';
          alert(email_again1.innerHTML);
          document.getElementById('email_again1').focus();
          return false;
         }
      }

    if (document.getElementById('email1').value !=  document.getElementById('email_again1').value)
      {
      var DIF_EMAIL=document.createElement('span');
      DIF_EMAIL.innerHTML='<tag:language.DIF_EMAIL />';
      alert(DIF_EMAIL.innerHTML);
      return false;
      }

   return true;
  }
</script>
<script>
var checkobj

function agreesubmit(el){
checkobj=el
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i]
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked
}
}
}
function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)

return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}

function goToURL() {
  var i, args=goToURL.arguments; document.returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

</script>
<script>
//change two names below to your form's names
document.forms.agreeform.agreecheck.checked=false
</script>
<style>
div.scroller
{
width:100%;
height:450px;
overflow:auto;
}
</style>
</head>
<body style="background-color: rgb(0, 0, 0);">
<div id="logo-bg">  
<table width="100%" height="100" align="center" cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="logo"></td>
</tr>
</table>
</div>  
 <div id="menubar-bg">     
  <table align="center" height="40" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td valign="middle" align="center" ><tag:main_extra /></td> 
       </tr>
    </table>
	</div>	
	<div id="menu-under"></div>	
<div id="body-bg">	
<div align="center">	
<div id="main"> 	
<br />

<div align="center">   
<form action="index.php?page=login" name="login" method="post">
    <table class="lista" border="0" width="auto" cellpadding="4" cellspacing="1">
    <tr>
    <td class="lista" align="center">
      <table border="0" cellpadding="0" cellspacing="0">
      <tr>
      <td align="right">&nbsp;<tag:language.USER_NAME />:&nbsp;</td>
      <td align="center"><input type="text" size="20" name="uid" value="" maxlength="40" style="font-size:12px;" />&nbsp;&nbsp;
      <td align="right">&nbsp;<tag:language.USER_PWD />:&nbsp;</td>
      <td align="center"><input type="password" size="20" name="pwd" maxlength="40" style="font-size:12px;" />&nbsp;&nbsp;
      <td align="center"><input type="submit" class="btn" style="font-size:12px;" / value="<tag:language.FRM_LOGIN />" /></td>
<if:agreement_enabled_1>      
      <td style="text-align:center;" align="center" class="mainuser">&nbsp;&nbsp;<tag:signup />&nbsp;&nbsp;</td>
</if:agreement_enabled_1>
      <td style="text-align:center;" align="center" class="mainuser">&nbsp;&nbsp;<tag:recover />&nbsp;&nbsp;</td>
      </tr>
      </table>
    <if:FALSE_USER>
      <span style="color:#FF0000;"><tag:login_username_incorrect /></span>
    </if:FALSE_USER>
    <if:FALSE_PASSWORD>
      <span style="color:#FF0000;"><tag:login_password_incorrect /></span>
    </if:FALSE_PASSWORD>
</td>
    </tr>
    </table>
    </form>
    </div>
		</div>	
<if:ERR_LOGIN>
<div align="center"><br /><br />
<span style="color:red;font-weight:bold;"><tag:ERR_LOGIN_MSG /></span>
</div>
</if:ERR_LOGIN>
<br />
	<table width='100%' align='center' cellpadding='0' cellspacing='0' border='0'>
        <tr>
          <td valign='top' width='5' rowspan='2'></td>
          <td valign="top" ><tag:main_adarea /></td>
          <td valign='top' width='5' rowspan='2'></td>
        </tr>
      </table>
<br />

<div align="center"> 
<div id="agreestyle">
<if:agreement_enabled>
<table width=99% cellspacing=0 cellpadding=5 border=0 align=center>
<tr>
<td valign=top width=100%>
<font id="agree1"><center><tag:language.AGREE /></center><br />
          <font id="agree2"><justify><tag:ua4 /></br></br>
          <tag:ua5 /></br></br>
          <tag:ua8 /></br></br>
          <tag:ua9 /></br></br></justify>
          <center><b><font id="sitename"><tag:ua7 /><br><font id="date"><tag:ua6 /></font></center>    
<tr>
<td align="center" valign="BOTTOM">           
<form method="get" name="agreeform" onsubmit="goToURL('parent');return document.returnValue" >         
  <tag:signup /> 
       </td>
    </tr>
  </table> 
</form>
  </if:agreement_enabled>
</div>
<br />

<div align="center">
<div id="recover">
    <div align="center">
      <form action="<tag:recover.action />" name="recover" method="post">
        <table width="65%" cellpadding="10" border="0" style="border-color:#494949">
          <tr>
        <td align="right"><tag:language.REGISTERED_EMAIL />:</td>
        <td align="left"><input type="text" size="40" name="email" id="email" /></td>
      </tr>
          <if:CAPTCHA>
      <tr>
        <td align="right"><tag:language.IMAGE_CODE />:</td>
      <td align="left"><input type="text" name="private_key" id="captcha" maxlength="6" size="6" value="" />&nbsp;&nbsp;<tag:recover_captcha /></td>
      </tr>
      <else:CAPTCHA>
      <tr>
         <td align="left"><tag:language.SECURITY_CODE />:</td>
         <td align="left"><tag:scode_question /><input type="text" id="captcha" name="scode_answer" maxlength="6" size="6" value="" /></td>
      </tr>
      </if:CAPTCHA>      
          <tr>
        <td colspan="2" align="center"><input type="submit" value="<tag:language.FRM_CONFIRM />" class="btn" /></td>
      </tr>
        </table>
      </form>
    </div>
</div>
</div>

<if:ERR>
<div align="center">
<div id="signup">
<tag:ERR_MSG />
<else:ERR>
<div align="center">
<div id="signup">
<center>
<form name="utente" method="post" onsubmit="return form_control()" action="<tag:account_form_actionlink />" >
  <table width="100%" border="0">
     <if:BY_INVITATION>
  <input type="hidden" name="code" value="<tag:account_IDcode />" />
  <input type="hidden" name="inviter" value="<tag:account_IDinviter />" />
	<tr>
	  <td><div style="text-align:center; padding:10px;"><tag:language.INVITATION_ONLY /><br /></div></td>
	</tr>
  </if:BY_INVITATION>
  <if:invitation_enabled>
    <tr>
       <td align="right"><tag:language.USER_NAME />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left">
 <input type="text" size="40" name="user" id="user" value="" />      
       </td>
    </tr>
    <tr>
       <td align="right"><tag:language.USER_PWD />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left">
         <tag:language.SECSUI_ACC_PWD_1 />
         <tag:language.SECSUI_ACC_PWD_2 /> <font id="number"><tag:pass_min_char /></font> <if:pass_char_plural><tag:language.SECSUI_ACC_PWD_3A /><else:pass_char_plural><tag:language.SECSUI_ACC_PWD_3 /></if:pass_char_plural>
         <if:pass_lct_set><li><tag:language.SECSUI_ACC_PWD_4 /> <font id="number"><tag:pass_min_lct /></font> <if:pass_lct_plural><tag:language.SECSUI_ACC_PWD_5A /><else:pass_lct_plural><tag:language.SECSUI_ACC_PWD_5 /></if:pass_lct_plural></li></if:pass_lct_set>
         <if:pass_uct_set><li><tag:language.SECSUI_ACC_PWD_4 /> <font id="number"><tag:pass_min_uct /></font> <if:pass_uct_plural><tag:language.SECSUI_ACC_PWD_6A /><else:pass_uct_plural><tag:language.SECSUI_ACC_PWD_6 /></if:pass_uct_plural></li></if:pass_uct_set>
         <if:pass_num_set><li><tag:language.SECSUI_ACC_PWD_4 /> <font id="number"><tag:pass_min_num /></font> <if:pass_num_plural><tag:language.SECSUI_ACC_PWD_7A /><else:pass_num_plural><tag:language.SECSUI_ACC_PWD_7 /></if:pass_num_plural></li></if:pass_num_set>
         <if:pass_sym_set><li><tag:language.SECSUI_ACC_PWD_4 /> <font id="number"><tag:pass_min_sym /></font> <if:pass_sym_plural><tag:language.SECSUI_ACC_PWD_8A /><else:pass_sym_plural><tag:language.SECSUI_ACC_PWD_8 /></if:pass_sym_plural></li></if:pass_sym_set><br />
         <input type="password" size="40" id="want_password" name="pwd" 
           onkeyup="EvalPwdStrength(document.forms[0],this.value);"/><br /> <!-- The textbox itself onkeyup-->       
       
           <!-- ### Password strength tables and columns ### -->
           <div id="pwdstrenght" style="display:none;">
           <table border="0" width="268px" align="left">
             <tr>
                <td id="idSM1" class="pwdChkCon0" align="center" width="25%">
                <span id="idSMT1" style="display: none;"><tag:language.WEEK /></span>
                </td>
                <td id="idSM2" class="pwdChkCon0" align="center" width="25%">
                <span id="idSMT0" style="display: none;"><!-- NOT RATED --></span>
                <span id="idSMT2" style="display: none;"><tag:language.MEDIUM /></span>
                </td>
                <td id="idSM3" class="pwdChkCon0" align="center" width="25%">
                <span id="idSMT3" style="display: none;"><tag:language.SAFE /></span>
                </td>
                <td id="idSM4" class="pwdChkCon0" align="center" width="25%">
                <span id="idSMT4" style="display: none;"><tag:language.STRONG /></span>
                </td>
             </tr>
           </table>
           </div>
           <!-- ### End ### -->
    </td>
  </tr>
    <tr>
       <td align="right"><tag:language.USER_PWD_AGAIN />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><input type="password" size="40" id="check_password" name="pwd1" /></td>
    </tr>
    <tr>
       <td align="right"><tag:language.USER_EMAIL />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><input type="text" size="30" name="email" id="email1"/></td>
    </tr>
    <tr>
       <td align="right"><tag:language.USER_EMAIL_AGAIN />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><input type="text" size="30" name="email_again" id="email_again1" autocomplete="off" value=""/></td>
    </tr>
    <if:birthdays_enabled>
    <tr>
       <td align="right"><tag:language.DOB />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><input type="text" size="2" name="dobday" maxlength="2" value=""/>&nbsp;&nbsp;/&nbsp;&nbsp;<input type="text" size="2" name="dobmonth" maxlength="2" value=""/>&nbsp;&nbsp;/&nbsp;&nbsp;<input type="text" size="4" name="dobyear" maxlength="4" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<tag:language.DOB_FORMAT /></td>
    </tr>
    </if:birthdays_enabled>    
    <if:ssl_enabled>
	<tr>
       <td align="right"><tag:language.SSL /></td>
       <td><input type="checkbox" name="force"><tag:language.SSL_DESC /></td>
    </tr>
    </if:ssl_enabled>    
	<if:rbg_login_language_enabled>
    <tr>
       <td align="right"><tag:language.USER_LANGUE />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><tag:account_combo_language /></td>
    </tr>
    </if:rbg_login_language_enabled>
    <if:rbg_login_style_enabled>
    <tr>
       <td align="right"><tag:language.USER_STYLE />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><tag:account_combo_style /></td>
    </tr>
    </if:rbg_login_style_enabled>
    <tr>
       <td align="right"><tag:language.COUNTRY />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><tag:account_combo_country /></td>
    </tr>
    <tr>
       <td align="right"><tag:language.TIMEZONE />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><tag:account_combo_timezone /></td>
    </tr>
        <if:CAPTCHA_1>
    <tr>
       <td align="right"><tag:language.IMAGE_CODE />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><input type="text" name="private_key" maxlength="6" size="6" value="" />&nbsp;&nbsp;<tag:recover_captcha /></td>
    </tr>
    <else:CAPTCHA_1>
    <tr>
       <td align="right"><tag:language.SECURITY_CODE />:&nbsp;&nbsp;&nbsp;</td>
       <td align="left"><tag:scode_question /><input type="text" name="scode_answer" maxlength="6" size="6" value="" /></td>
    </tr>
    </if:CAPTCHA_1>
    </tr>
</table>  
<td align="center" valign="BOTTOM">    
<input type="submit" name="conferma" value="<tag:language.FRM_SIGNUP />" class="btn"> 
  </if:invitation_enabled>
 
</form>
</if:ERR>
</table>
</center>
</div>
</div>

<div align="center">
<div id="news">
<center><b><tag:language.MNU_NEWS /></b></center>
<if:VIEW>
<table width=98% border="0" style="font-family:Verdana;font-size:15px">
  <loop:news_model>
    <tr>
      <td align="left"><tag:language.POSTED_BY /> <tag:news_model[].username /><br><tag:language.POSTED_DATE /> <tag:news_model[].date />
      </td>
    </tr>
    <tr>
      <td align="left"><b><tag:language.TITLE /> <tag:news_model[].title /></b><br><br>
    <table style="border-top:1px" solid gray;width:100%;font-family:Verdana;font-size:10px'>
      <tr>
        <td><tag:news_model[].news /></td>
      </tr>
    </table>
      </td>
    </tr>
</loop:news_model>
</table>
</if:VIEW>
<if:NO_NEWS>
  <center><tag:language.NO_NEWS /></center>
</if:NO_NEWS>
</center>
<br />
</div>

<div align="center">
<div id="rules">
<center><b><tag:language.MNU_RULES /></b></center>
<table width=100% border=0 cellspacing=0 cellpadding=10>
<tr>
<td>
  <loop:rules>
  <b><tag:rules[].rules_group_title /></b><br/>
  <tag:rules[].rules_text />
  </loop:rules>
</td></tr></table>
</div>

<div align="center">
<div id="rules_custom">
<center><b><tag:language.MNU_RULES /></b></center>
<table width=100% border=0 cellspacing=0 cellpadding=10>
<tr>
<td>
<h2>Add your Custom Rules Here</h2>
</td>
</tr>
</table>
</div>

<div align="center">
<div id="faq">
<center><b><tag:language.MNU_FAQ /></b></center>
          <loop:faq2>
              <b><tag:faq2[].faq_group_title />
           <tr>
             <td class="lista" align="center">
               <b><a name='<tag:faq2[].faq_link />' id='<tag:faq2[].faq_link />'><tag:faq2[].faq_title /></a><br></b><br /><br />
                 <table style="border-top:1px solid gray; width:100%; font-family: Verdana;font-size:10px">
                   <tr><td><tag:faq2[].faq_text /></td></tr>
                 </table>
             </td>
          </tr>
           </loop:faq2>
</div>

<div align="center">
<div id="faq_custom"> 
<center><b><tag:language.MNU_FAQ /></b></center>  
<table width=100% border=0 cellspacing=0 cellpadding=10>
<tr>
<td>
<h2>Add your Custom FAQ Here</h2>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="scroller">
   <TABLE align="center" width="100%" height="401" cellpadding="0" cellspacing="0" border="0">
      <TR>
        <TD valign="top" background="alt_login/new/rotating/images/spacer.gif"></TD>
       </TR>
    </TABLE>
<table height="49" width="100%" cellpadding="0" cellspacing="0" border="0" >
<tr>
<td class="footer-bg" align="center" valign="middle"><tag:alt_copyright />&nbsp;<tag:xbtit_version /><br /><tag:to_top /></td>
</tr>
</table>
<if:anon_enabled>
  <script src="<tag:protected />/jscript/anon.js" type="text/javascript"></script>
  <script type="text/javascript"><!--
  protected_links = "<tag:protected />";
  auto_anonymize();
  //--></script>
</if:anon_enabled>
</body>
</html>