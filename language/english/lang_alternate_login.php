<?php
$language["ACP_LOGIN_PAGE"]= 'Alternate Login Options';
$language['SINGLE_LOGIN_PAGE']='Choose Single Background';
$language["SINGLE_BACKGROUND"]= 'Single Background';
$language["ROTATING_LOGIN_PAGE"]= 'Choose Rotating Background';
$language["ROTATING_BACKGROUND"]= 'Rotating Background';
$language["CHOOSE_LOGIN_PAGE"]= 'Choose Login Page Types';
$language["LOGIN_PAGE_TYPES"]= 'Login Page Types';
$language['REGISTERED']='Registered';

$language["CHOOSE_FAQ"]="Choose Default or Custom FAQ";
$language["CHOOSE_RULES"]="Choose Default or Custom Rules";
$language["RULES_TYPES"]="Choose Default/Custom Rules";
$language["DEFAULT_RULES"]="Default Rules";
$language["CUSTOM_RULES"]="Custom Rules";
$language["FAQ_TYPES"]="Choose Default/Custom FAQ";
$language["DEFAULT_FAQ"]="Default FAQ";
$language["CUSTOM_FAQ"]="Custom FAQ";
$language["ENABLE_ALL_WARN"]="Test";

// Birthday hack
$language["DOB"]="Date of Birth";
$language["DOB_FORMAT"]="<b>Day (DD) / Month (MM) / Year (YYYY)</b>";

// Password strength
$language['WEEK']='Weak';
$language['MEDIUM']='Medium';
$language['SAFE']='Safe';
$language['STRONG']='Strong';
$language["ERR_PASS_TOO_WEAK_1"]="Your password is too weak.<br />For security reasons it must contain at least";
$language["ERR_PASS_TOO_WEAK_1A"]="The password is too weak.<br />For security reasons it must contain at least";
$language["ERR_PASS_TOO_WEAK_2"]="lower case letter";
$language["ERR_PASS_TOO_WEAK_2A"]="lower case letters";
$language["ERR_PASS_TOO_WEAK_3"]="upper case letter";
$language["ERR_PASS_TOO_WEAK_3A"]="upper case letters";
$language["ERR_PASS_TOO_WEAK_4"]="number";
$language["ERR_PASS_TOO_WEAK_4A"]="numbers";
$language["ERR_PASS_TOO_WEAK_5"]="symbol";
$language["ERR_PASS_TOO_WEAK_5A"]="symbols";
$language["ERR_PASS_TOO_WEAK_6"]="Here is a strong password you may want to use";
$language["SECSUI_ACC_PWD_1"]="Your password needs:";
$language["SECSUI_ACC_PWD_1A"]="The password needs:";
$language["SECSUI_ACC_PWD_2"]="To be at least";
$language["SECSUI_ACC_PWD_3"]="character in length";
$language["SECSUI_ACC_PWD_3A"]="characters in length";
$language["SECSUI_ACC_PWD_4"]="To have at least";
$language["SECSUI_ACC_PWD_5"]="lower case letter";
$language["SECSUI_ACC_PWD_5A"]="lower case letters";
$language["SECSUI_ACC_PWD_6"]="upper case letter";
$language["SECSUI_ACC_PWD_6A"]="upper case letters";
$language["SECSUI_ACC_PWD_7"]="number";
$language["SECSUI_ACC_PWD_7A"]="numbers";
$language["SECSUI_ACC_PWD_8"]="symbol";
$language["SECSUI_ACC_PWD_8A"]="symbols";
//Booted
$language['BOOTED']='Account disabled!';
$language['BOOTEDUT']='until';
$language['WHYBOOTED']='Reason:';

$language['ACCOUNT_CREATED']='Account Created';
$language['USER_NAME']='User Name';
$language['USER_PWD_AGAIN']='Repeat Password';
$language['USER_PWD']='Password';
$language['USER_STYLE']='Style';
$language['USER_LANGUE']='Language';
$language['IMAGE_CODE']='Image Code';
$language['INSERT_USERNAME']='You must insert a username!';
$language['INSERT_PASSWORD']='You must insert a password!';
$language['DIF_PASSWORDS']='The passwords don&rsquo;t match!';
$language['ERR_NO_EMAIL']='You must enter a valid email address';
$language['USER_EMAIL_AGAIN']='Repeat Email';
$language['ERR_NO_EMAIL_AGAIN']='Repeat email';
$language['DIF_EMAIL']='The emails don&rsquo;t match!';
$language['REGISTERED_EMAIL']='Registered Email';
$language['USER_EMAIL']='Email';
$language['USER_EMAIL']='Valid Email';
$language['SECURITY_CODE']='Security Code!';
$language['SSL'] = "Force SSL:";
$language['SSL_DESC'] = "&nbsp;Force a Secure Connection in Site.";
$language['FRM_CONFIRM']='Confirm';
$language['FRM_LOGIN']='Login';
$language['FRM_SIGNUP']='Signup';
$language['COUNTRY']='Country';
$language['TIMEZONE']='Timezone';
$language['NEED_COOKIES']='Note:<br /> You need cookies enabled to log in.';

//INVITATION SYSTEM
global $SITENAME, $BASEURL, $SITEEMAIL;
$language['INVIT_MSGINFO']='You have requested a new account on '.$SITENAME;
$language['INVIT_MSGINFO1']="\n\n".'Your account is awaiting confirmation from the member who invited you. Until your account is confirmed you won\'t have full access to the site.';
$language['INVIT_MSGINFO2A']="\n\n".'Account info:'."\n".'Username:';
$language['INVIT_MSGINFO2B']='Password:';
$language["INVIT_MSGINFO3"]="\n\n".'----------------'."\n\n".'If you did not register for '.$SITENAME.', please forward this email to '.$SITEEMAIL;
$language['INVIT_MSG_AUTOCONFIRM3']="\n\n".'----------------'."\n\n".'You can now visit'."\n\n".$BASEURL.'/index.php&page=login'.
									"\n\n".'and use your login information to log in.'."\n\n".
									'Good luck and have fun on '.$SITENAME.'!'."\n\n\n".'----------------'."\n\n".
									'If you did not register for '.$SITENAME.', please forward this email to '.$SITEEMAIL;
$language['REG_CONFIRM']='Account Confirmation';
$language['INVITATION_ONLY']='Sorry, but registrations are closed.<br>You need an invitation in order to signup.';
$language['WELCOME_INVITE']='Welcome! You have accepted an invitation from one of our users.<br />You may now sign-up.';
$language['INVITE_EMAIL_SENT1']='A confirmation e-mail has been sent to the address you specified';
$language['INVITE_EMAIL_SENT2']='<br />You will need to wait until your inviter confirms your account.';
$language['INVITE_EMAIL_SENT3']='An e-mail has been sent to the address you specified';
$language['INVITE_EMAIL_SENT4']='<br />You may now <a href="index.php?page=login">LOGIN</a>. Good luck and have fun on '.$SITENAME.'!';
$language['INVALID_INVITATION']='Your invitation code is invalid.';
$language['ERR_INVITATION']='<br />Request a new invitation from your inviter.';

$language["DOMAIN_BANNED"]="No disposable E-Mail Accounts allowed. Use a real E-Mail Account.";

$language["UN_INV_ACC_1"] = "Invitation from";
$language["UN_INV_ACC_2"] = "accepted and account created";

$language["RREG_CLOSED_1"] = "Registrations are currently closed and will reopen at random intervals, please try later.";
$language["RREG_CLOSED_2"] = "If you have an invitation you can bypass this by following the link in the email.";
$language["ERR_IP_ALREADY_EXISTS_1"] = "Your IP Address";
$language["ERR_IP_ALREADY_EXISTS_2"] = "is already in use on this site.<br /><br />If you use a shared IP please contact the site administrator.";

$language['ERR_500']='HTTP/1.0 500 Unauthorized access!';
$language['ERR_AVATAR_EXT']='Sorry either the image doesn&rsquo;t exist or the file type is incorrect (only gif, jpg, bmp or png images allowed).';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='Bad news ID!';
$language['ERR_BODY_EMPTY']='Body cannot be empty!';
$language['ERR_CANT_CONNECT']='Can&rsquo;t connect to local MySQL server';
$language['ERR_CANT_OPEN_DB']='Can&rsquo;t open database';
$language['ERR_COMMENT_EMPTY']='Comment cannot be empty!';
$language['ERR_DB_ERR']='Database error. Please contact an administrator about this.';
$language['ERR_DELETE_POST']='Delete post. Sanity check: You are about to delete a post. Click';
$language['ERR_DELETE_TOPIC']='Delete topic. Sanity check: You are about to delete a topic. Click';
$language['ERR_EMAIL_ALREADY_EXISTS']='This Email is already in our database!';
$language['ERR_EMAIL_NOT_FOUND_1']='The email address';
$language['ERR_EMAIL_NOT_FOUND_2']='was not found in the database.';
$language['ERR_ENTER_NEW_TITLE']='You must enter a new title!';
$language['ERR_FORUM_NOT_FOUND']='Forum not found';
$language['ERR_FORUM_UNKW_ACT']='Forum Error: Unknown action';
$language['ERR_GUEST_EXISTS']='"Guest" is a restricted username. You cant register as "Guest"';
$language['ERR_IMAGE_CODE']='The security code does not match';
$language['ERR_INS_TITLE_NEWS']='You must insert both title AND news';
$language['ERR_INV_NUM_FIELD']='Invalid numerical field(s) from client';
$language['ERR_INVALID_CLIENT_EVENT']='Invalid event= from client.';
$language['ERR_INVALID_INFO_BT_CLIENT']='Invalid information received from BitTorrent client';
$language['ERR_INVALID_IP_NUMB']='Invalid IP address. Must be standard dotted decimal (hostnames not allowed)';
$language['ERR_LEVEL']='Sorry, your level ';
$language['ERR_LEVEL_CANT_POST']='You are not permitted to post in this forum.';
$language['ERR_LEVEL_CANT_VIEW']='You are not permitted to view this topic.';
$language['ERR_MISSING_DATA']='Missing data!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='You must be logged in to shout...';
$language['ERR_NO_BODY']='No body text';
$language['ERR_NO_NEWS_ID']='New&rsquo;s ID not found!';
$language['ERR_NO_POST_WITH_ID']='No post with ID ';
$language['ERR_NO_SPACE']='Your username cannot contain a space, please replace with an underscore eg:<br /><br />';
$language['ERR_NO_TOPIC_ID']='No Topic ID returned';
$language['ERR_NO_TOPIC_POST_ID']='No topic associated with post ID';
$language['ERR_NOT_AUTH']='You&rsquo;re not authorized!';
$language['ERR_NOT_FOUND']='Not Found...';
$language['ERR_NOT_PERMITED']='Not Permited';
$language['ERR_PASS_LENGTH_1']='Your password must be a minimum of';
$language['ERR_PASS_LENGTH_2']='characters in length.';
$language['ERR_PASSWORD_INCORRECT']='Password Incorrect';
$language['ERR_PERM_DENIED']='Permission denied';
$language['ERR_PID_NOT_FOUND']='Please redownload the torrent. PID system is active and pid was not found in the torrent';
$language['ERR_RETR_DATA']='Error retreaving data!';
$language['ERR_SEND_EMAIL']='Unable to send mail. Please contact an administrator about this error.';
$language['ERR_SERVER_LOAD']='The server load is very high at the moment. Retrying, please wait...';
$language['ERR_SPECIAL_CHAR']='<font color="black">Your username can not contain special characters like:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; etc.</strong></font></font><br />';
$language['ERR_SQL_ERR']='SQL Error';
$language['ERR_SUBJECT']='You must enter a subject.';
$language['ERR_TOPIC_ID_NA']='Topic ID is N/A';
$language['ERR_TOPIC_LOCKED']='Topic is Locked';
$language['ERR_TORRENT_IN_BROWSER']='This file is for BitTorrent clients.';
$language['ERR_UPDATE_USER']='Unable to update user data. Please contact an administrator about this error.';
$language['ERR_USER_ALREADY_EXISTS']='There&rsquo;s already an user with this nick!';
$language['ERR_USER_NOT_FOUND']='Sorry, User not Found';
$language['ERR_USER_NOT_USER']='You&rsquo;re not autorized to access another user&rsquo;s panel!';
$language['ERR_USERNAME_INCORRECT']='Username Incorrect';


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
$language['ACP_DIS_TITLE']='Enable/Disable on Alternate Login Page';
$language["EN_DIS_ALL"] = "Enable/Disable Buttons on Alternate Login Page";
$language["SET_ABOVE"] = "Use Settings Above";
$language["EN_ALL"] = "Enable All";
$language["DIS_ALL"] = "Disable All";
$language['ACP_HIDE']='Menu Bar Buttons';
$language['ACP_NEWS']='Enable/Disable News';
$language['ACP_FORUM']='Enable/Disable Forum';
$language['ACP_RULES']='Enable/Disable Rules';
$language['ACP_FAQ']='Enable/Disable F.A.Q.';
$language['ACP_IRC']='Enable/Disable IRC';
$language['ACP_VIEW_IRC']='You need to install the IRC Module first';


//News
$language['POSTED_BY']='Posted by:';
$language['POSTED_DATE']='Posted on:';
$language['TITLE']='Title:';

//Mesages
$language['NEWS_MSG']='Enabling this will turn on the button in the alternate login page for the guest to see it & use it';
$language['FORUM_MSG']='Enabling this will turn on the button in the alternate login page for the guest to see it & use it';
$language['RULES_MSG']="Warning: Just because this option is here, it is not necessarily a\\ngood idea to use it.\\n\\nEnabling all hacks in one fell swoop will have the adverse effect\\nof disabling many features that are available by default and you\\'ll\\nmost likely end up looking for a needle in a haystack when it\\ncomes to trying to configure the hacks afterwards.\\n\\nInstead we advise you to only enable the hacks that you actually\\nneed and also build up your list of enabled hacks gradually. This\\nway you can configure the settings for each hack as you go along.\\n\\nYou can of course ignore this warning and continue to use this\\noption anyway but you have been warned!";
$language['FAQ_MSG']="Warning: Just because this option is here, it is not necessarily a\\ngood idea to use it.\\n\\nEnabling all hacks in one fell swoop will have the adverse effect\\nof disabling many features that are available by default and you\\'ll\\nmost likely end up looking for a needle in a haystack when it\\ncomes to trying to configure the hacks afterwards.\\n\\nInstead we advise you to only enable the hacks that you actually\\nneed and also build up your list of enabled hacks gradually. This\\nway you can configure the settings for each hack as you go along.\\n\\nYou can of course ignore this warning and continue to use this\\noption anyway but you have been warned!";

$language["MODE_TYPE"]="Mode Type";
$language["MODE_CLASSIC"]="Classic";
$language["MODE_NEW"]="New";

$language["welcome_to"]="Welcome to ";
$language["member_login"]="Member Login";
$language["user"]="Username";
$language["password"]="Password";
$language["LOGIN"]="Login";
$language["recover"]="Recover Password";
$language["non_member"]="Not a member yet?";
$language["create_account"]="Create an Account!";
$language["register"]="Register";
$language["click_reg"]="Click register to proceed to next step...";
$language["hello"]="Hello Guest!";
$language["login_reg"]="Login | Register";
$language["close_panel"]="Close Panel";
$language["login_above"]="Login Above";


?>