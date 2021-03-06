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
//中文翻译:ziggear 
//你可以自由修改和发布，但不要删除注释和作者信息。

global $users, $torrents, $seeds, $leechers, $percent;
// $language['rtl']='rtl'; // 如果你的阅读习惯是从右到左, 请去掉此行首部的两个'/'使此行生效
$language['charset']='UTF-8'; 
$language['ACCOUNT_CONFIRM']=' '.$SITENAME.'账号验证.';
$language['ACCOUNT_CONGRATULATIONS']='恭喜! 你的帐号以通过验证!<br />现在你可以 <a href="index.php?page=login">登录</a> 并开始使用此帐号.';
$language['ACCOUNT_CREATE']='注册帐号';
$language['ACCOUNT_DELETE']='删除帐号';
$language['ACCOUNT_DETAILS']='帐号详情';
$language['ACCOUNT_EDIT']='编辑帐号';
$language['ACCOUNT_MGMT']='帐号管理';
$language['ACCOUNT_MSG']='你好,'."\n\n".'这是一封确认邮件, 因为有人以你的email地址申请了本站的帐号.'."\n".'如果你不是申请者请忽略, 否则请核对帐号信息.'."\n\n".'祝你好运.';
$language['ACTION']='动作';
$language['ACTIVATED']='活动的';
$language['ACTIVE']='状态';
$language['ACTIVE_ONLY']='活动种子';
$language['ADD']='增加';
$language['ADDED']='上传日期';
$language['ADMIN_CPANEL']='管理面板';
$language['ADMINCP_NOTES']='在这里你可以配置tracker的各种选项...';
$language['ALL']='全部';
$language['ALL_SHOUT']='全部喊话信息';
$language['ANNOUNCE_URL']='Tracker announce 地址:';
$language['ANONYMOUS']='匿名';
$language['ANSWER']='回答';
$language['AUTHOR']='作者';
$language['AVATAR_URL']='头像 (url): ';
$language['AVERAGE']='平均';//此处翻译可能不明确 average 有可能是完成度或平均速度
$language['BACK']='返回';
$language['BAD_ID']='非法ID!';
$language['BCK_USERCP']='返回个人中心';
$language['BLOCK']='功能模块';
$language['BODY']='内容';
$language['BOTTOM']='底部';
$language['BY']='By';
$language['CANT_DELETE_ADMIN']='不允许删除另一个管理员!';
$language['CANT_DELETE_NEWS']='你没有权限删除公告!';
$language['CANT_DELETE_TORRENT']='你没有权限删除这个种子!';
$language['CANT_DELETE_USER']='你没有权限删除用户!';
$language['CANT_DO_QUERY']='无法执行 SQL 查询 - ';
$language['CANT_EDIT_TORR']='你没有权限编辑这个种子!';
$language['CANT_FIND_TORRENT']='无法找到种子文件!';
$language['CANT_READ_LANGUAGE']='无法读取语言文件信息!';
$language['CANT_SAVE_CONFIG']='无法将设置保存到 config.php';
$language['CANT_SAVE_LANGUAGE']='无法保存语言文件信息';
$language['CANT_WRITE_CONFIG']='警告: 无法写入 config.php!';
$language['CATCHUP']='标记已读';
$language['CATEGORY']='分类';
$language['CATEGORY_FULL']='种子分类';
$language['CENTER']='center';
$language['CHANGE_PID']='修改 PID';
$language['CHARACTERS']='字符';//此处不明确
$language['CHOOSE']='选择';
$language['CHOOSE_ONE']='选择一项';
$language['CLICK_HERE']='点击这里';
$language['CLOSE']='关闭';
$language['COMMENT']='评论:';
$language['COMMENT_1']='评论';
$language['COMMENT_PREVIEW']='评论预览';
$language['COMMENTS']='发表评论';
$language['CONFIG_SAVED']='恭喜, 新设置已保存';
$language['COUNTRY']='来自';
$language['CURRENT_DETAILS']='当前细节';
$language['DATABASE_ERROR']='数据库错误.';
$language['DATE']='时间';
$language['DB_ERROR_REQUEST']='数据库错误. 无法完成请求.';
$language['DB_SETTINGS']='数据库设置';
$language['DEAD_ONLY']='非活动种子';
$language['DELETE']='删除';
$language['DELETE_ALL_READED']='删除全部已读';
$language['DELETE_CONFIRM']='确定要删除/移走这些项目?';
$language['DELETE_TORRENT']='删除种子';
$language['DELFAILED']='删除失败';
$language['DESCRIPTION']='资源描述';
$language['DONT_NEED_CHANGE']='你不需要改变这些设置!';
$language['DOWN']='下载';
$language['DOWNLOAD']='下载';
$language['DOWNLOAD_TORRENT']='下载种子';
$language['DOWNLOADED']='已下载';
$language['EDIT']='编辑';
$language['EDIT_LANGUAGE']='编辑语言';
$language['EDIT_POST']='编辑帖子';
$language['EDIT_TORRENT']='编辑种子';
$language['EMAIL']='Email';
$language['EMAIL_SENT']='一封验证邮件已发往你刚才填写的email地址<br />请前往你的邮箱并点击邮件中的链接已完成验证.';
$language['EMAIL_VERIFY']='你在'.$SITENAME.'的email地址已更新...';
$language['EMAIL_VERIFY_BLOCK']='已发送验证邮件...';
$language['EMAIL_VERIFY_MSG']='你好,'."\n\n".'你看到这封邮件说明你要求修改你在'.$SITENAME.'帐号的email地址, 请点击下方链接以完成更改.'."\n\n".'祝你好运!';
$language['EMAIL_VERIFY_SENT1']='<br /><center>验证email已被寄到:<br /><br /><strong><font color="red">';
$language['EMAIL_VERIFY_SENT2']='</font></strong><br /><br />你需要点击那封邮件中的链接<br />来更新你的email地址. 验证邮件将会在10分钟左右到达<br />(正常情况下) 也许有的邮件服务商会认为这是垃圾邮件<br />如果你不能正常受到验证邮件, 可以查看一下邮箱的垃圾邮件.<br /><br />';
$language['ERR_500']='HTTP/1.0 500 你没有权限访问!';
$language['ERR_AVATAR_EXT']='抱歉, 只允许 gif,jpg,bmp 及 png 格式';
$language['ERR_BAD_LAST_POST']='';
$language['ERR_BAD_NEWS_ID']='非法公告ID!';
$language['ERR_BODY_EMPTY']='内容不能为空!';
$language['ERR_CANT_CONNECT']='无法连接班底 MySQL 服务';
$language['ERR_CANT_OPEN_DB']='无法打开数据库';
$language['ERR_COMMENT_EMPTY']='评论不能为空!';
$language['ERR_DB_ERR']='数据库出错. 请联系数据库管理员(DBA).';
$language['ERR_DELETE_POST']='删除帖子. 完整性检查: 你将要删除一个帖子. 点击';
$language['ERR_DELETE_TOPIC']='删除主题. 完整性检查: 你将要删除一个主题. 点击';
$language['ERR_EMAIL_ALREADY_EXISTS']='这个Email地址已存在, 不允许重复注册!';
$language['ERR_EMAIL_NOT_FOUND_1']='数据库中不存在';
$language['ERR_EMAIL_NOT_FOUND_2']='这个email地址.';
$language['ERR_ENTER_NEW_TITLE']='你必须键入一个新标题!';
$language['ERR_FORUM_NOT_FOUND']='找不到论坛';
$language['ERR_FORUM_UNKW_ACT']='论坛出错: 未知动作';
$language['ERR_GUEST_EXISTS']='"Guest" 是不允许的用户名. 你不能使用"Guest"来注册';
$language['ERR_IMAGE_CODE']='验证码不匹配';
$language['ERR_INS_TITLE_NEWS']='你必须输入标题和公告内容';
$language['ERR_INV_NUM_FIELD']='客户端的数值域无效';
$language['ERR_INVALID_CLIENT_EVENT']='无效事件 = 来自客户端.';
$language['ERR_INVALID_INFO_BT_CLIENT']='从 BitTorrent 客户端接收到无效信息';
$language['ERR_INVALID_IP_NUMB']='无效IP. 必须是标准的IPv4格式 (不允许为域名)';
$language['ERR_LEVEL']='抱歉, 你的等级 ';
$language['ERR_LEVEL_CANT_POST']='你不允许在此论坛发帖.';
$language['ERR_LEVEL_CANT_VIEW']='你不允许查看此主题.';
$language['ERR_MISSING_DATA']='丢失数据!';
$language['ERR_MUST_BE_LOGGED_SHOUT']='你必须登录后才能喊话...';
$language['ERR_NO_BODY']='没有内容';//原文为“No body text”
$language['ERR_NO_NEWS_ID']='找不到公告ID!';
$language['ERR_NO_POST_WITH_ID']='没有含有此ID的帖子 ';
$language['ERR_NO_SPACE']='用户名不能含有空格, 确实需要请换成下划线 eg:<br /><br />';
$language['ERR_NO_TOPIC_ID']='未返回主题ID';
$language['ERR_NO_TOPIC_POST_ID']='没有和这个帖子ID相关联的主题';
$language['ERR_NOT_AUTH']='你不被允许!';//“authorized”
$language['ERR_NOT_FOUND']='无法找到...';
$language['ERR_NOT_PERMITED']='不允许';
$language['ERR_PASS_LENGTH']='<font color="black">密码至少是4个字符.</font>';
$language['ERR_PASSWORD_INCORRECT']='密码错误';
$language['ERR_PERM_DENIED']='不允许';//“Permission denied” 可能有更好的翻译
$language['ERR_PID_NOT_FOUND']='请重新下载这个种子. PID系统已生效但在此种子中找不到合法的PID';
$language['ERR_RETR_DATA']='数据检索出错!';//“Error retreaving data”可能是retrieving
$language['ERR_SEND_EMAIL']='无法发送邮件. 请联系管理员以解决此问题.';
$language['ERR_SERVER_LOAD']='目前服务器表示压力很大. 正在重试, 请稍等...';
$language['ERR_SPECIAL_CHAR']='<font color="black">用户名不能包含这些符号, 例如:<br /><br /><font color="red"><strong>* &#63; &#60; &#62; &#64; &#36; &#38; &#37; 等.</strong></font></font><br />';
$language['ERR_SQL_ERR']='SQL 出错';
$language['ERR_SUBJECT']='你必须键入一个主题.';
$language['ERR_TOPIC_ID_NA']='主题ID不存在';
$language['ERR_TOPIC_LOCKED']='主题被锁定';
$language['ERR_TORRENT_IN_BROWSER']='此文件用于 BitTorrent 客户端.';
$language['ERR_UPDATE_USER']='无法更新用户信息. 请联系管理员以解决此问题.';
$language['ERR_USER_ALREADY_EXISTS']='此昵称已有人使用!';
$language['ERR_USER_NOT_FOUND']='抱歉, 找不到此用户';
$language['ERR_USER_NOT_USER']='你没有权限进入别人的个人中心!';
$language['ERR_USERNAME_INCORRECT']='用户名错误';
$language['ERROR']='错误';
$language['ERROR_ID']='错误ID';
$language['FACOLTATIVE']='可选的';
$language['FILE']='资源名称';
$language['FILE_CONTENTS']='资源目录';
$language['FILE_NAME']='资源名称';
$language['FIND_USER']='搜索用户';
$language['FINISHED']='完成数';
$language['FORUM']='论坛';
$language['FORUM_ERROR']='论坛错误';
$language['FORUM_INFO']='论坛信息';
$language['FORUM_MIN_CREATE']='发帖最小等级';
$language['FORUM_MIN_READ']='查看最小等级';
$language['FORUM_SEARCH']='帖子搜索';
$language['FORUM_N_TOPICS']='主题';//主题数
$language['FORUM_N_POSTS']='回复';//回复数
$language['FRM_DELETE']='删除';//这里应该是删除论坛，简化起见只保留“删除”
$language['FRM_LOGIN']='登录';
$language['FRM_PREVIEW']='预览';
$language['FRM_REFRESH']='刷新';//可能“更新”比较好，为区别于“update”
$language['FRM_RESET']='清空';
$language['FRM_SEND']='发送';
$language['FRM_CONFIRM']='确认';
$language['FRM_CANCEL']='取消';
$language['FRM_CLEAN']='清除';
$language['GLOBAL_SERVER_LOAD']='全局负载 (所有在此服务器的站点)';
$language['GO']='Go';
$language['GROUP']='分组';
$language['GUEST']='游客';
$language['GUESTS']='游客';//游客复数
$language['HERE']='这里';
$language['HISTORY']='历史';
$language['HOME']='Home';
$language['IF_YOU_ARE_SURE']='如果你确定.';
$language['IM_SURE']='我确定';
$language['IN']='in';
$language['INF_CHANGED']='资料已更新!';
$language['INFINITE']='Inf.';
$language['INFO_HASH']='资料 Hash';
$language['INS_NEW_PWD']='请输入新密码!';
$language['INS_OLD_PWD']='请输入当前密码!';
$language['INSERT_DATA']='请填写要上传资源的相关信息.';
$language['INSERT_NEW_FORUM']='建立新版面';
$language['INVALID_ID']='抱歉, 这不是一个有效的ID';
$language['INVALID_INFO_HASH']='资料 hash 值无效.';
$language['INVALID_PID']='无效 PID';
$language['INVALID_TORRENT']='Tracker错误: 无效种子';
$language['KEYWORDS']='关键词';
$language['LAST_EXTERNAL']='上一次的站内种子更新时间: ';
$language['LAST_NEWS']='最新公告';
$language['LAST_POST_BY']='最新回复';
$language['LAST_SANITY']='上一次的完整性检查时间: ';
$language['LAST_TORRENTS']='最新种子';
$language['LAST_UPDATE']='最近更新';
$language['LASTPOST']='最新回复';
$language['LEECHERS']='下载者';
$language['LEFT']='左侧';//功能能模块的位置
$language['LOGIN']='登录';
$language['LOGOUT']='退出';  //退出登录
$language['MAILBOX']='站内信';
$language['MANAGE_NEWS']='管理公告';
$language['MEMBER']='用户';
$language['MEMBERS']='用户信息';//待验证用户查看时“你没有权限查看 用户”
$language['MEMBERS_LIST']='用户列表';
$language['MINIMUM_100_DOWN']='(至少 100 MB 已下载)';//“with minimum”翻译为“至少” with是否要翻出来呢？
$language['MINIMUM_5_LEECH']='至少 5 个下载者, 不包括不活动种子';
$language['MINIMUM_5_SEED']='至少 5 个做种者';
$language['MKTOR_INVALID_HASH']='种子: 收到非法hash信息';//“makeTorrent”翻译为"种子" 可能不妥
$language['MNU_ADMINCP']='管理面板';
$language['MNU_FORUM']='论坛';
$language['MNU_INDEX']='主页';
$language['MNU_MEMBERS']='成员列表';
$language['MNU_NEWS']='公告';
$language['MNU_STATS']='排行';
$language['MNU_TORRENT']='种子';
$language['MNU_UCP_CHANGEPWD']='修改密码';
$language['MNU_UCP_HOME']='个人中心首页';
$language['MNU_UCP_IN']='收件箱';
$language['MNU_UCP_INFO']='修改资料';
$language['MNU_UCP_NEWPM']='写站内信';
$language['MNU_UCP_OUT']='发件箱';
$language['MNU_UCP_PM']='站内信';
$language['MNU_UPLOAD']='上传种子';
$language['MORE_SMILES']='更多表情符号';
$language['MORE_THAN']='多于 ';
$language['MORE_THAN_2']='项目已找到, 首先显示';//可能不妥 找不到所关联的功能
$language['NA']='N/A';
$language['NAME']='名称';
$language['NEED_COOKIES']='注意: 登录前请保证浏览器的cookies功能有效.';
$language['NEW_COMMENT']='发表评论...';
$language['NEW_COMMENT_T']='有新评论';
$language['NEWS']='公告';//也可能要翻译为“这条公告”
$language['NEWS_DESCRIPTION']='公告内容:';
$language['NEWS_INSERT']='写新的公告';
$language['NEWS_PANEL']='公告板';
$language['NEWS_TITLE']='主题:';
$language['NEXT']='下次';
$language['NO']='否';
$language['NO_BANNED_IPS']='当前无禁止的IP...';
$language['NO_COMMENTS']='当前无评论...';
$language['NO_FORUMS']='当前无主题...';
$language['NO_MAIL']='当前无新邮件...';
$language['NO_MESSAGES']='当前无站内信...';
$language['NO_NEWS']='当前无公告...';
$language['NO_PEERS']='无上传者';
$language['NO_RECORDS']='抱歉, 列表为空...';
$language['NO_TOPIC']='当前无主题';
$language['NO_TORR_UP_USER']='此人很小气, 没有上传任何资源';
$language['NO_TORRENTS']='当前无活动种子...';
$language['NO_USERS_FOUND']='找不到用户!';
$language['NOBODY_ONLINE']='目前没有人在线';
$language['NONE']='None';
$language['NOT_ADMIN_CP_ACCESS']='你没有权限进入管理面板!';
$language['NOT_ALLOW_DOWN']='不允许从这里下载:';//原文“is not allowed to download from”
$language['NOT_AUTH_DOWNLOAD']='抱歉, 你没有权限下载...';
$language['NOT_AUTH_VIEW_NEWS']='你没有权限查看公告!';
$language['NOT_AUTHORIZED']='你没有权限查看';
$language['NOT_AUTHORIZED_UPLOAD']='你没有权限上传!';
$language['NOT_AVAILABLE']='N/A';
$language['NOT_MAIL_IN_URL']='这不是url中的那个email地址';
$language['NOT_POSS_RESET_PID']='无法重置你的 PID! <br />请联系管理员...';
$language['NOW_LOGIN']='你将根据提示来登录';
$language['NUMBER_SHORT']='人数';//原为“No.”，如果此变量在别处被引用可能不妥，需要改回为"No."
$language['OLD_PWD']='当前密码';
$language['ONLY_REG_COMMENT']='只有注册用户可以评论!';
$language['OPT_DB_RES']='数据库优化结果';
$language['OPTION']='选项';
$language['PASS_RESET_CONF']='密码重置确认';
$language['PEER_CLIENT']='客户端';
$language['PEER_COUNTRY']='国家';
$language['PEER_ID']='上传者 ID';
$language['PEER_LIST']='上传者列表';
$language['PEER_PORT']='端口';
$language['PEER_PROGRESS']='进度';
$language['PEER_STATUS']='状态';
$language['PEERS']='上传者';//此处的peers翻译为"上传者"可能不妥，详见种子详情页面
$language['PEERS_DETAILS']='点击这里查看上传者详情';
$language['PICTURE']='图片';
$language['PID']='PID';
$language['PLEASE_WAIT']='请稍等...';
$language['PM']='PM';
$language['POSITION']='位置';//“Position”可能不妥
$language['POST_REPLY']='帖子回复';//注意语法
$language['POSTED_BY']='发帖者';
$language['POSTED_DATE']='发布于';
$language['POSTS']='回复';
$language['POSTS_PER_DAY']='日均回帖量 %s';
$language['POSTS_PER_PAGE']='每页显示的帖数';
$language['PREVIOUS']='Prev.';
$language['PRIVATE_MSG']='站内信';
$language['PWD_CHANGED']='密码已修改!';
$language['QUESTION']='问题';
$language['QUICK_JUMP']='快速跳转';//含义不明 可能不妥
$language['QUOTE']='转发';
$language['RANK']='排名';
$language['RATIO']='上传/下载';
$language['REACHED_MAX_USERS']='已达到最大用户数';
$language['READED']='是否已读';
$language['RECEIVER']='收信人';
$language['RECOVER_DESC']='使用以下格式来重置你的密码, 之后你将会受到你的帐号详情.<br />(你需要回复一封验证邮件.)';
$language['RECOVER_PWD']='找回密码';
$language['RECOVER_TITLE']='恢复用户名或密码';
$language['REDIRECT']='如果你的浏览器没有开启javascript功能, 点击';
$language['REDIRECT2']='如果你的浏览器没有开启javascript功能, 点击 <a href="%s">这里</a>.';
$language['REDOWNLOAD_TORR_FROM']='下载种子从';
$language['REGISTERED']='注册用户';
$language['REGISTERED_EMAIL']='已注册的email';
$language['REMOVE']='Remove';
$language['REPLIES']='回复';
$language['REPLY']='回复';
$language['RESULT']='Result';
$language['RETRY']='Retry';
$language['RETURN_TORRENTS']='返回种子列表';
$language['REVERIFY_CONGRATS1']='<center><br />恭喜, 你的邮箱已<br /><br /><strong>由: <font color="red">';
$language['REVERIFY_CONGRATS2']='</strong></font><br /><strong>改为: <font color="red">';
$language['REVERIFY_CONGRATS3']='</strong></font><br /><br />并通过验证!';
$language['REVERIFY_FAILURE']='<center><br /><strong><font color="red"><u>抱歉, 此url已失效</u></strong></font><br /><br />每次你需要更改email地址时都会生成一个随机数所以<br />你如果看到此信息说明你很可能<br />不止一次在尝试更改你email地址并用了同样的url.<br /><br />请等待<strong>新的<br />验证email 寄到之后再开始修改你的email地址.</strong><br /><br />';
$language['REVERIFY_MSG']='如果你打算更改email地址一封验证邮件将会寄到你的新email的收件箱中.<br /><br /><font color="red"><strong>在你到新的email中查看验证邮件并通过url来验证之前你的email不会被更新.</strong></font>';
$language['RIGHT']='右侧';//功能能模块的位置
$language['SEARCH']='搜索';
$language['SEEDERS']='做种者';
$language['SEEN']='已读';
$language['SELECT']='选择...';
$language['SENDER']='发信人';
$language['SENT_ERROR']='发送失败';
$language['SHORT_C']='C'; //Completed的缩写
$language['SHORT_L']='L'; //Leechers的缩写
$language['SHORT_S']='S'; //Seeders的缩写
$language['SHOUTBOX']='喊话窗';
$language['SIZE']='资源大小';
$language['SORRY']='抱歉';
$language['SORTID']='Sortid';
$language['SPEED']='平均速度';
$language['STICKY']='置顶';
$language['SUB_CATEGORY']='上级分类';
$language['SUBJECT']='主题';
$language['SUBJECT_MAX_CHAR']='主题受限于 ';//原文“Subject is limited to”
$language['SUC_POST_SUC_EDIT']='帖子编辑成功.';
$language['SUC_SEND_EMAIL']='一封确认email已被寄到';
$language['SUC_SEND_EMAIL_2']='请等待邮件到达(可能需要几分钟).';
$language['SUCCESS']='成功';
$language['SUMADD_BUG']='Tracker出现\"summaryAdd\"错误';
$language['TABLE_NAME']='表名';
$language['TIMEZONE']='时区';
$language['TITLE']='标题';
$language['TOP']='top';
$language['TOP_10_ACTIVE']='10大活跃资源';
$language['TOP_10_BEST_SEED']='10高分享度资源';
$language['TOP_10_BSPEED']='10大最快资源';
$language['TOP_10_DOWNLOAD']='下载者 Top 10';
$language['TOP_10_SHARE']='做种者 Top 10';
$language['TOP_10_UPLOAD']='上传者 Top 10';
$language['TOP_10_WORST']='10大最糟做种者';
$language['TOP_10_WORST_SEED']='10大最糟做种者资源';
$language['TOP_10_WSPEED']='10大最慢资源';
$language['TOP_TORRENTS']='最受欢迎的种子';
$language['TOPIC']='主题';
$language['TOPICS']='主题';
$language['TOPICS_PER_PAGE']='每页显示的主题数';
$language['TORR_PEER_DETAILS']='种子上传者详情';
$language['TORRENT']='种子';
$language['TORRENT_ANONYMOUS']='匿名发布';
$language['TORRENT_CHECK']='允许tracker检索和使用种子文件中的信息.';
$language['TORRENT_DETAIL']='种子详情';
$language['TORRENT_FILE']='种子文件';
$language['TORRENT_SEARCH']='搜索种子';
$language['TORRENT_STATUS']='状态';
$language['TORRENT_UPDATE']='正在更新, 请稍侯...';
$language['TORRENTS']='种子';
$language['TORRENTS_PER_PAGE']='每页显示的种子数';
$language['TRACK_DB_ERR']='Tracker/数据库出错. 你可以在日志中查看错误信息.';
$language['TRACKER_INFO']=$users.' 用户, 传输 '.$torrents.' 种子 ('.$seeds.' 人做种, '.$leechers.' 下载了, '.$percent.'%)';//可能此句会出现在客户端或日志中 注意查看
$language['TRACKER_LOAD']='Tracker负载';
$language['TRACKER_SETTINGS']='Tracker设置';
$language['TRACKER_STATS']='Tracker状态';
$language['TRACKING']='传输';//直译为“追踪” 可能需要修改
$language['TRAFFIC']='流量';
$language['UCP_NOTE_1']='在这你你可以查看收件箱, 给其他用户发站内信,';
$language['UCP_NOTE_2']='调整个人设置等等...';
$language['UNAUTH_IP']='不被授权的IP.';//可能是在管理面板中禁止的IP
$language['UNKNOWN']='未知';
$language['UPDATE']='更新';
$language['UPFAILED']='上传失败';
$language['UPLOAD_IMAGE']='上传图片';
$language['UPLOAD_LANGUAGE_FILE']='上传语言文件';
$language['UPLOADED']='已上传';
$language['UPLOADER']='贡献者';
$language['UPLOADS']='上传';
$language['URL']='URL';
$language['USER']='用户';
$language['USER_CP']='个人中心';
$language['USER_CP_1']='个人中心';
$language['USER_DETAILS']='用户信息';
$language['USER_EMAIL']='email地址';
$language['USER_ID']='User ID';
$language['USER_JOINED']='注册时间';
$language['USER_LASTACCESS']='最后访问';
$language['USER_LEVEL']='用户组';
$language['USER_LOCAL_TIME']='用户当地时间';
$language['USER_NAME']='用户名';
$language['USER_PASS_RECOVER']='找回用户名/密码';
$language['USER_PWD']='密码';
$language['USERS_SEARCH']='搜索用户';
$language['VIEW_DETAILS']='查看详情';
$language['VIEW_TOPIC']='查看您新主题';
$language['VIEW_UNREAD']='查看新帖';
$language['VIEWS']='查看人数';
$language['VISITOR']='访客';
$language['VISITORS']='访客';//visitors 复数
$language['WAIT_ADMIN_VALID']='你需要等待管理员为你通过验证...';
$language['WARNING']='警告!';
$language['WELCOME']='欢迎';
$language['WELCOME_ADMINCP']='欢迎使用管理面板';
$language['WELCOME_BACK']='欢迎回来';
$language['WELCOME_UCP']='欢迎使用个人中心';
$language['WORD_AND']='and';  //这四条不明确 难以翻译
$language['WORD_NEW']='New';
$language['WROTE']='wrote';
$language['WT']='WT';
$language['X_TIMES']='次';
$language['YES']='是';
$language['LAST_IP']='上次登录IP';
$language['FIRST_UNREAD']='查看第一篇未读';
$language['MODULE_UNACTIVE']='模板配置无效!';
$language['MODULE_NOT_PRESENT']='模板配置不存在!';
$language['MODULE_LOAD_ERROR']='模板配置可能出错!';
$language['RESET_PID'] = '重新设置 PID';

# 追加语言定义 (由TreetopClimber添加).
$language['EXTRA']='排行榜';//在xbtit别处extra的意义为排行榜 此处先继承此翻译
$language['DROPDOWN']='下拉菜单';
$language['TORRENT_MENU']='种子';
$language['USER_MENU']='用户';
$language['ADMIN_ACCESS']='管理菜单';
$language['STAFF_ACCESS']='站务';//按上下文推断 staff应该是站务管理员(权限低于admin)
$language['UPLOAD_LINK']='上传种子';
# 追加结束

# 追加语言定义 (HACKS)
$language["SIGNATURE"]="论坛签名";//HACK:Signature on (Internal) Forum
# 追加结束

?>