<!-- faq.PHP Template - Just plain HTML and CSS + Template TAGS-->
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<a name="#0" id="0"></a>
<tag:site_name /> is a fairly new community, dedicated to providing the newest, best and most wanted torrents to our members.<br />
<br />
This is a private site, and you have to <a href="index.php?page=account">register</a> before you can get full access.
Before you do anything here at <tag:site_name /> we suggest you read the <a href="index.php?page=rules">rules</a>!
There are only a few rules to abide by, but we do enforce them!<br />
<br />
And thanks for dropping by!
</td></tr></table>
<hr>
<h2><center>Contents</center></h2>
<div style="float:left; width:100%; text-align:left;padding-left:10px;padding-top:10px;">
<if:faq_exists>
  <div style="float:left; width:95%; text-align:left;padding-left:10px;padding-top:10px;">
  <loop:faq>
      <div style="float:left; width:100%;">
            <b><tag:faq[].faq_group_title /></b>
      </div>
      <div style="float:left; width:100%; padding-left:10px;">
            <a href='<tag:faq[].faq_link />'><tag:faq[].faq_title /></a><br>
      </div>
  </loop:faq>
  <table cellpadding="4" cellspacing="0" align="left" border="0" width="99%" style="font-family:Verdana;font-size:11px" class="lista">
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
</table>     
<else:faq_exists>
<div align="center"></div>
</if:faq_exists>
</div>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<ul>
<li><b>Site information <a name="#1" id="1"></a></b>
<ul>
<li><a href="#10" class="altlink">What is this bittorrent all about anyway? How do I get the files?</a></li>
<li><a href="#11" class="altlink">Where does the donated money go?</a></li>
<li><a href="#72" class="altlink">Eh? This FAQ is huge!</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>User information <a name="#2" id="2"></a></b>
<ul>
<li><a href="#13" class="altlink">I registered an account but did not receive the confirmation e-mail!</a></li>
<li><a href="#14" class="altlink">I've lost my user name or password! Can you send it to me?</a></li>
<li><a href="#15" class="altlink">Can you rename my account?</a></li>
<li><a href="#16" class="altlink">Can you delete my (confirmed) account?</a></li>
<li><a href="#67" class="altlink">Can I have two accounts? </a></li>
<li><a href="#17" class="altlink">So, what's my ratio?</a></li>
<li><a href="#68" class="altlink">How do I add an avatar to my profile?</a></li>
<li><a href="#69" class="altlink">Can I change the way that I view the site?</a></li>
<li><a href="#18" class="altlink">Why is my IP displayed on my details page?</a></li>
<li><a href="#19" class="altlink">Help! I cannot login!? (a.k.a. Login of Death)</a></li>
<li><a href="#20" class="altlink">My IP address is dynamic. How do I stay logged in?</a></li>
<li><a href="#22" class="altlink">What are the different user classes?</a> <img src="images/updated.png" alt="Updated" width="46" height="11" align="bottom" /></li>
<li><a href="#23" class="altlink">How does this promotion thing work anyway?</a> <img src="images/updated.png" alt="Updated" width="46" height="11" align="bottom" /></li>
<li><a href="#25" class="altlink">Why can't my friend become a member?</a></li>
<li><a href="#99" class="altlink">Will <tag:site_name /> ever have RSS feed? </a> <img src="images/new.png" alt="New" width="27" height="11" align="bottom" /></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>Torrent Stats <a name="#3" id="3"></a></b>
<ul>
<li><a href="#27" class="altlink">Most common reason for stats not updating</a></li>
<li><a href="#28" class="altlink">Best practices</a></li>
<li><a href="#29" class="altlink">May I use any bittorrent client?</a></li>
<li><a href="#30" class="altlink">Why is a torrent I'm leeching/seeding listed several times in my profile?</a></li>
<li><a href="#31" class="altlink">I've finished or cancelled a torrent. Why is it still listed in my profile?</a></li>
<li><a href="#32" class="altlink">Why do I sometimes see torrents I'm not leeching in my profile!?</a></li>
<li><a href="#73" class="altlink">I suspect that someone else may have access to my account, what should I do?</a></li>
<li><a href="#33" class="altlink">Multiple IPs (Can I login from different computers?)</a></li>
<li><a href="#34" class="altlink">How does NAT/ICS change the picture?</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>Torrent Downloading <a name="#4" id="4"></a></b>
<ul>
<li><a href="#39" class="altlink">How do I use the files I've downloaded?</a></li>
<li><a href="#40" class="altlink">Downloaded a movie and don't know what CAM/TS/TC/SCR means?</a></li>
<li><a href="#74" class="altlink">What is the .sfv file for, and why are files split into small-sized .rar files?</a></li>
<li><a href="#75" class="altlink">So what do I do with these .rar files?</a></li>
<li><a href="#76" class="altlink">The .sfv file says everything is ok, but I still get an error message in WinRAR?</a></li>
<li><a href="#41" class="altlink">Why did an active torrent suddenly disappear?</a></li>
<li><a href="#42" class="altlink">How do I resume a broken download or reseed something?</a></li>
<li><a href="#43" class="altlink">Why do my downloads sometimes stall at 99%?</a></li>
<li><a href="#45" class="altlink">The torrent is supposed to be 100MB. How come I downloaded 120MB?</a></li>
<li><a href="#98" class="altlink">What's this <font color="blue">"Your client is banned, please upgrade or change clients"</font> error?</a></li>
<li><a href="#44" class="altlink">What are these <font color="blue">"a piece has failed an hash check"</font> messages?</a></li>
<li><a href="#47" class="altlink">Why do I get a <font color="blue">"rejected by tracker - Port xxxx is blacklisted"</font> error?</a></li>
<li><a href="#48" class="altlink">What's this <font color="blue">"IOError - [Errno13] Permission denied"</font> error?</a></li>
<li><a href="#77" class="altlink">What's this <font color="blue">"Connection Limit Exceeded! You may only leech from one location at a time"</font> error?</a></li>
<li><a href="#78" class="altlink">Why do I get an <font color="blue">"Error - Unknown Passkey"</font> error?</a></li>
<li><a href="#79" class="altlink">Other common client errors</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>Torrent Uploading <a name="#5" id="5"></a></b>
<ul>
<li><a href="#36" class="altlink">Why can't I upload torrents?</a></li>
<li><a href="#37" class="altlink">What criteria must I meet before I can join the <font color="blue">Uploader</font> team?</a></li>
<li><a href="#38" class="altlink">Can I upload your torrents to other trackers?</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>How can I improve my torrent download speed? <a name="#6" id="6"></a></b>
<ul>
<li><a href="#50" class="altlink">Do not immediately jump on new torrents</a></li>
<li><a href="#51" class="altlink">Limit your upload speed</a></li>
<li><a href="#52" class="altlink">Limit the number of simultaneous connections</a></li>
<li><a href="#53" class="altlink">Limit the number of simultaneous uploads</a></li>
<li><a href="#54" class="altlink">Just give it some time</a></li>
<li><a href="#55" class="altlink">Why is my browsing so slow while leeching?</a></li>
<li><a href="#80" class="altlink">Why am I showing as Connectable - '<font=red>No</font>' in the peer list? (And why should I care?)</a></li>
<li><a href="#81" class="altlink">Could my ISP be slowing my upload and download speeds when I use BitTorrent?</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>My ISP uses a transparent proxy. What should I do? <a name="#7" id="7"></a></b>
<ul>
<li><a href="#82" class="altlink">Short answer...</a></li>
<li><a href="#56" class="altlink">What is a proxy?</a></li>
<li><a href="#57" class="altlink">How do I find out if I'm behind a (transparent/anonymous) proxy?</a></li>
<li><a href="#58" class="altlink">Can I bypass my ISP's proxy?</a></li>
<li><a href="#59" class="altlink">How do I make my bittorrent client use a proxy?</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>Why can't I connect? Is the site blocking me? <a name="#8" id="8"></a></b>
<ul>
<li><a href="#62" class="altlink">Maybe my address is blacklisted?</a></li>
<li><a href="#63" class="altlink">Your ISP blocks the site's address</a></li>
<li><a href="#83" class="altlink">AOL users and 403 Forbidden errors</a></li>
</ul>
</li>
</ul>
<br />
<ul>
<li><b>What if I can't find the answer to my problem here? <a name="#9" id="9"></a></b>
<ul>
<li><a href="#65" class="altlink">You can try these:</a></li>
<li><a href="#84" class="altlink">Use the Help Desk</a></li>
</ul>
</li>
</ul>
<br />
</td></tr></table>
<hr>
<h2>Site information </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>What is this bittorrent all about anyway? How do I get the files? <a name="10" id="10"><a href="#1"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Check out <a class="altlink" href="http://www.btfaq.com/">Brian's BitTorrent FAQ and Guide</a>
<br /><br />
<br />
<b>Where does the donated money go? <a name="11" id="11"><a href="#1"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<tag:site_name /> is situated on a dedicated server in Georgia. Donations are used to pay for the server, the bandwidth and other costs. Any donation money left over is invested into future upgrades in order to keep us alive and kicking as we grow. 
<br /><br />
<br />
<b>Eh? This FAQ is huge! <a name="72" id="72"><a href="#1"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Of course, we get asked a lot of questions!<br /><br />
We want to make sure that your use of this site is as easy and hassle-free as possible. So most of the info that you are likely to need is on this page. If you encounter a problem, turn here first. You can also use <b>CTRL + F</b> on your keyboard to search for certain words on this page - if you don't find what you are looking for, there are more resources listed at the bottom of the page.
<br /><br />
</td></tr></table>
<hr>
<h2>User information </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>I registered an account but did not receive the confirmation e-mail! <a name="13" id="13"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Are you sure? If you are using Hotmail, Yahoo Mail, etc - check your bulk mail folder in case the mail has ended up there. If not, you will need to re-register. Note though that if you didn't receive the email the first time it will probably not succeed the second time either so you should really try another email address.
<br />
<br />
<b>I've lost my user name or password! Can you send it to me? <a name="14" id="14"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Please use <a class="altlink" href="index.php?page=recover">This Form</a> to have the login details mailed back to you.
<br /><br />
<br />
<b>Can you rename my account? <a name="15" id="15"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Short answer - no. Unless you make us a cup of tea. Strong tea, Tetleys, if you have it. Milk. Two sugars. Ta :)
<br /><br />
<br />
<b>Can you delete my (confirmed) account? <a name="16" id="16"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Yes, send a pm to an <a href="index.php?page=staff" class="altlink">Administrator</a>. 
<br /><br />
<br />
<b>Can I have two accounts? <a name="67" id="67"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
No. Any duplicate accounts that you create will be disabled, and you may end up getting banned. Secondary accounts (eg for people within the same household) are only allowed if they are authorised by an <a class="altlink" href="index.php?page=staff">Administrator</a>. 
<br /><br />
<br />
<b>So, what's my ratio? <a name="17" id="17"<a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Click on <a href="#0">My Panel</a>, then scroll down untill you see.<br/ ><img src=images/ratio.jpg border=0/><br/>
<br/>
It's important to distinguish between your overall ratio and the individual ratio on each torrent
you may be seeding or leeching. The overall ratio takes into account the total uploaded and downloaded
from your account since you joined the site. The individual ratio takes into account those values for each torrent.<br/>
<br/>
You may see two symbols instead of a number: &quot;Inf.&quot;, which is just an abbreviation for Infinity, and
means that you have downloaded 0 bytes while uploading a non-zero amount (ul/dl becomes infinity); &quot;---&quot;,
which should be read as &quot;non-available&quot;, and shows up when you have both downloaded and uploaded 0 bytes
(ul/dl = 0/0 which is an indeterminate amount).
<br /><br />
<br />
<b>How do I add an avatar to my profile? <a name="68" id="68"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
First, find an image that you like, and that is within the
<a href="index.php?page=rules">rules</a>. Then go into your <a href="#0">My Panel</a> there is a link to the Avatar uploads. This will add your avatar to the rest of the site too.
<br /><br />
<br />
<b>Can I change the way that I view the site? <a name="69" id="69"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
There are many options that you can find in your <a href="#0">My Panel</a>.
<br /><br />
<br />
<b>Why is my IP displayed on my details page? <a name="18" id="18"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Only you and the <tag:site_name /> Staff can view your IP address and email. Regular users do not see that information.
<br /><br />
<br />
<b>Help! I cannot login!? (a.k.a. Login of Death) <a name="19" id="19"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
This problem sometimes occurs with IE/FireFox. <br /><br />
<b>Internet Explorer</b> - Close all Internet Explorer windows and open Internet Options in the control panel. Click the Delete Cookies button. You should now be able to login.<br />
<b>FireFox</b> - In FireFox, go to Tools--&gt;Options--&gt;Privacy--&gt;Cookies and click the Clear Cookies Now button. You should now be able to login.
<br /><br />
<br />
<b>My IP address is dynamic. How do I stay logged in? <a name="20" id="20"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
You do not have to anymore. All you have to do is make sure you are logged in with your actual
IP when starting a torrent session. After that, even if the IP changes mid-session,
the seeding or leeching will continue and the statistics will update without any problem.
<br /><br />
<br />
<b>What are the different user classes? <a name="22" id="22"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<table cellspacing="3" cellpadding="0">
<tr>
<td class="row2">&nbsp; <b><font color="yellow">Leech</font></b><hr/ ><br/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Those with a poor ratio - certain features of this site are restricted for those marked Leech.<hr/ ><br/ ><br/ ></td>
</tr>
<tr>
<td class="row2" width="135">&nbsp; <b><font color="#4040c0">Member</font></b><hr/ ><br/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">The default class of new members.<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <img src="images/star.gif" alt="Star"/><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Has donated money to <tag:site_name />.<hr/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#996666">VIP</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Same privileges as Member plus has access to the VIP Forums, the VIP Requests. Immune to automatic demotion.<hr/ ><br/ ></td>
</tr>
<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#996600">HSVIP</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">High-Speed VIP's. Those that are putting a lot more into the site than what they are taking out, we love them.<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#CC33FF">Uploader</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Staff uploader - give them a big hand folks!<hr/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#6600FF">High-Speed Uploader</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Staff uploaders with big fat pipes and/or consistently deliver torrents of the highest quality - give them a big hand too folks!<hr/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#99FF00">Moderator</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">They are the law. Our tireless Mods toil away at <tag:site_name /> and keep the place clean and tidy.<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#00FF00">Senior Moderator</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">They are the law too. The Sr Mods are very experienced and know their stuff, ask em nicely and they'll help you out, but disobey them at your peril!<hr/ ><br/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#FF9900">Administrator</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Our Admins slave away 'behind the scenes', where they are whipped and chained - and boy, do they love it.<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#FF6600">Senior Administrator</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">The Senior Admins keeps <tag:site_name /> cogs turning. We asked them what would be a good description for them. They said: "Sado-Masochistic".<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="red">SysOp</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">The Bosses. They snort coffee.<hr/ ></td>
</tr>
</table>
<br /><br />
<br />
<b>How does this promotion thing work anyway? <a name="23" id="23"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<table cellspacing="3" cellpadding="0">
<tr>
<td class="row2" width="135">&nbsp; <b><font color="#FFFF00">Leech</b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1" valign="top">Unlike other classes, this is a demotion. If you have downloaded over 4GB with a ratio of less than 0.4, you will be demoted to 'Leech'. Users in this class have a serious risk of being banned unless their ratios improve!<hr/ ><br/ ><br/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp;<img src="../images/star.gif" alt="Star"/><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">This ever-so-shiny star is awarded by donating.<hr/ ></td>
</tr>
<tr>
<td class="row2" width="135">&nbsp; <b><font color="#996666">VIP</b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1" valign="top">Can be gained by donating. Also assigned by <tag:site_name /> Staff at their discretion to users they feel contribute something special to the site.<br/>
(Anyone begging for VIP status will be automatically disqualified.)<hr/ ><br/ ><br/ ><br/ ></td>
</tr>
<tr>
<td class="row2" width="135">&nbsp; <b>Custom Title</b><hr/ ><br/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Custom Titles are given at the descretion of Moderators and above. VIP can request a custom title.<hr/ ><br/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#CC33FF">Uploaders</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">Appointed by Admins/SysOp (see the 'Uploading' section for conditions).<hr/ ><br/ ></td>
</tr>
<tr>
<td class="row2">&nbsp; <b><font color="#99FF00">Moderator</font></b><hr/ ></td>
<td class="embedded" width="5">&nbsp;</td>
<td class="row1">You don't ask us, we'll ask you!<hr/ ></td>
</tr>
</table>
<br /><br />
<br />
<b>Why can't my friend become a member? <a name="25" id="25"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
There is a 75,000 users limit. When that number is reached we stop accepting new members. Accounts inactive for more than 90 days are automatically deleted, so keep trying. (There is no reservation or queuing system, don't ask for that.)
<br /><br />
<br />
<b>Will The <tag:site_name /> ever have RSS feed? <a name="99" id="99"><a href="#2"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
We are NOT allowing RSS nor are we considering allowing RSS nor do we ever want RSS!!! WE believe That RSS feed leads to antisocial behavior.  Please do your part for the community and let the Staff and Uploaders know you care.. 
<br /><br />
</td></tr></table>
<hr>
<h2>Torrent Stats </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>Most common reason for stats not updating <a name="27" id="27"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<ul>
<li>The user is cheating. (aka &quot;Instant Ban&quot;)</li>
<li>The server is overloaded and unresponsive. Just try to keep the session open until the server responds again. (Flooding the server with consecutive manual updates is not recommended.)</li>
<li>You are using a faulty client. If you want to use an experimental or CVS version you do it at your own risk.</li>
<li>DHT is enabled within your client, any uploaded data transferred through DHT will not be credited to your stats, so make sure that you have DHT disabled</li>
</ul>
<br /><br />
<br />
<b>Best practices <a name="28" id="28"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<ul>
<li>If a torrent you are currently leeching/seeding is not listed on your profile, just wait or force a manual update.</li>
<li>Make sure you exit your client properly, so that the tracker receives &quot;event=completed&quot;.</li>
<li>If the tracker is down, do not stop seeding. As long as the tracker is back up before you exit the client the stats should update properly.</li>
</ul>
<br /><br />
<br />
<b>May I use any bittorrent client? <a name="29" id="29"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
No. The only clients (and versions) that are allowed for use on <tag:site_name /> are:<br />
<br /><ul>
<p><strong> Windows Clients</strong></p>
<ul>
<ul>
<ul>
<li><a href="http://pingpong-abc.sourceforge.net/changes.php/" target="_blank"><strong>ABC</strong></a> (Yet Another BitTorrent Client)</li>
<li><a href="http://www.btvampire.com/" target="_blank"><strong>BitBuddy</strong></a> (Formerly known as BTvampire)</li>
<li><a href="http://www.bittornado.com/" target="_blank"><strong>BitTornado</strong></a> (TheShad0w's Experimental)</li>
<li><a href="http://bittorrent.com/" target="_blank"><strong>The Original BitTorrent Client</strong></a> (By Bram Cohen)</li>
<li><a href="http://www.utorrent.com/" target="_blank"><strong>uTorrent</strong></a></li>
</ul>
</ul>
</ul>
<p><br>
 <strong> Linux Clients</strong></p>
<ul>
<ul>
<ul>
<li><a href="http://pingpong-abc.sourceforge.net/changes.php/" target="_blank"><strong> ABC</strong></a> (Yet Another BitTorrent Client)</li>
<li><a href="http://www.bittornado.com/" target="_blank"><strong> BitTornado</strong></a> (TheShad0w's Experimental)</li>
<li><a href="http://bittorrent.com/" target="_blank"><strong> The Original BitTorrent Client</strong></a> (By Bram Cohen)</li>
</ul>
</ul>
</ul>
<p><br>
<strong> Macintosh Clients</strong></p>
<ul>
<ul>
<ul>
<li><a href="http://www.bitsonwheels.com/" target="_blank"><strong> Bits on Wheels</strong></a></li>
<li><a href="http://bittorrent.com/" target="_blank"><strong> The Original BitTorrent Client</strong></a> (By Bram Cohen)</li>
<li><a href="http://www.sarwat.net/bittorrent/" target="_blank"><strong> Tomato Torrent</strong></a></li>
</ul>
</ul>
</ul>
<p><br>
 <strong> Java Clients</strong></p>
<ul>
<ul>
<ul>
<li><a href="http://azureus.sourceforge.net/" target="_blank"><strong> Azureus</strong></a></li>
<li><a href="http://btqueue.sourceforge.net/" target="_blank"><strong> BT Queue</strong></a></li>
</ul>
 </ul>
</ul>
<p><br>
There are many clients available, but it's recommended to use one from the list we just provided. This list is subject to change as newer versions of these clients are released, announcements will be made in advance of any changes so that users will have time to upgrade/change their clients.<br /><br />
The clients that are not listed have various known problems, including incorrect handling
of the BitTorrent protocol, innacurate stat reporting, and various
known security issues, or they are simply outdated. We want to ensure that each member of <tag:site_name /> is secure on our tracker, and also that the correct statistics are reported. <br /><br />If you are unhappy about this, complain to the authors and not us!
<br /><br />
<br />
<b>Why is a torrent I'm leeching/seeding listed several times in my profile? <a name="30" id="30"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
If for some reason your client exits improperly (e.g. your pc or client crashes) and you restart it,
it will have a new Peer ID, so it will show as a new torrent. The tracker will never receive an &quot;event=completed&quot;
or an &quot;event=stopped&quot; message from the old Peer ID, and it will be listed until it hits a timeout. Just ignore it, it will eventually go away. Alternatively, you can use the <b>Flush Torrents!</b> link in your User Details (the link is at the top left of this page).
<br /><br />
<br />
<b>I've finished or cancelled a torrent. Why is it still listed in my profile? <a name="31" id="31"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
See &quot;Why is a torrent I'm leeching/seeding listed several times in my profile?&quot; above.
<br /><br />
<br />
<b>Why do I sometimes see torrents I'm not leeching in my profile!? <a name="32" id="32"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
When a torrent is first started, the tracker uses the IP to identify the user. Therefore the torrent will
become associated with the user <i>who last accessed the site</i> from that IP. If you share your IP in some
way (you are behind NAT/ICS, or using a proxy), and some of the persons you share it with are also users,
you may occasionally see their torrents listed in your profile. (If they start a torrent session from that
IP and you were the last one to visit the site the torrent will be associated with you). Note that now
torrents listed in your profile will always count towards your total stats.<br /><br />
To make sure your torrents show up in your profile you should visit the site immediately before starting a session. <br><br>(The only way to completely stop foreign torrents from showing in profiles
is to forbid users without an individual IP from accessing the site.
Yes, that means you. Complain at your own risk.)
<br /><br />
<br />
<b>I suspect that someone else may have access to my account, what should I do? <a name="73" id="73"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Send a message to the <a href="index.php?page=modules&module=helpdesk" class="altlink">Help Desk</a> and ask for your passkey to be reset. Stop all your running torrents and delete them from your client (only the torrents, and not the 
files!). Then change your password through your <a href="#0">My Panel</a>.
It will also be a good idea to change the password on your email
account too. Once your passkey has been reset, you can re-download the
torrents and resume them in your client.<br /><br />
Also make sure that you are not sharing your .torrent files through
traditional p2p, and also make sure that you are running an up-to-date
anti-virus and firewall.<br /><br />
Please note that the security of your account details on <tag:site_name /> is <b>your responsibility</b>,
you must keep your site password and access to your .torrent files
secure. We will not alter or amend stats on your account if it has been
used by someone else.
<br /><br />
<br />
<b>Multiple IPs (Can I login from different computers?) <a name="33" id="33"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Yes, the tracker is now capable of following sessions from different IPs for the same user. A torrent is associated with the user when it starts, and only at that moment is the IP relevant. So if you want to seed/leech from computer A and computer B with the same account you should access the site from computer A, start the torrent there, and then repeat both steps from computer B (not limited to two computers or to a single torrent on each, this is just the simplest example). You do not need to login again when closing the torrent.
<br /><br />
<br />
<b>How does NAT/ICS change the picture? <a name="34" id="34"><a href="#3"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
This is a very particular case in that all computers in the LAN will appear to the outside world as having the same IP. We must distinguish between two cases:<br />
<br />
<b>1.</b> <i>You are the single <tag:site_name /> user on the LAN</i><br />
<br />
You should use the same <tag:site_name /> account on all of the computers.<br />
<br />
Note also that in the ICS case it is preferable to run the BT client on the ICS gateway. Clients running on the other computers
will be unconnectable (their ports will be listed as &quot;---&quot;, as explained elsewhere in the FAQ) unless you specify
the appropriate services in your ICS configuration (a good explanation of how to do this for Windows XP can be found
<a class="altlink" href="http://www.microsoft.com/downloads/details.aspx?FamilyID=1dcff3ce-f50f-4a34-ae67-cac31ccd7bc9&amp;displaylang=en" target="_blank">here</a>).
In the NAT case you should configure different ranges for clients on different computers and create appropriate NAT rules in the router. (Details vary widely from router to router and are outside the scope of this FAQ. Check your router documentation and/or support forum.)<br />
<br />
<br />
<b>2.</b> <i>There are multiple <tag:site_name /> users in the LAN</i><br />
<br />
At present there is no way of making this setup always work properly with <tag:site_name />.
Each torrent will be associated with the user who last accessed the site from within
the LAN before the torrent was started.
Unless there is cooperation between the users mixing of statistics is possible.
(User A accesses the site, downloads a .torrent file, but does not start the torrent immediately.
Meanwhile, user B accesses the site. User A then starts the torrent. The torrent will count
towards user B's statistics, not user A's.)
<br />
<br />
It is your LAN, the responsibility is yours. Do not ask us to ban other users
with the same IP, we will not do that. (Why should we ban <i>him</i> instead of <i>you</i>?)
<br /><br />
</td></tr></table>
<hr>
<h2>Torrent Downloading </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>How do I use the files I've downloaded? <a name="39" id="39"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Check out <a class="altlink" href="smf/index.php?board=65.0" target="_blank">This Guide</a>.
<br /><br />
<br />
<b>Downloaded a movie and don't know what CAM/TS/TC/SCR means? <a name="40" id="40"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Check out <a class="altlink" href="smf/index.php?topic=13.0" target="_blank">This Guide</a>.
<br /><br />
<br />
<b>What is the .sfv file for, and why are files split into small-sized .rar files? <a name="74" id="74"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
On very rare occasions, BitTorrent clients fail when doing hash checks
(verifying the data that is downloaded is in one piece and free of
errors). This is where the <b>.sfv</b> file included with the torrent comes in handy.<br /><br />
You will need a program called <a href="http://www.quicksfv.org/" class="altlink" target="_blank">QuickSFV</a> installed on your system. If you get errors whilst trying to extract downloaded files, double-click the <b>.sfv</b> file and it will check the downloaded files for errors. If QuickSFV reports <b>filename.r23</b> (for example) as being corrupt, then simply delete the current <b>filename.r23</b> and resume the torrent (assuming the files are still in your torrent download folder). The deleted <b>filename.r23</b> will then be re-downloaded on it's own. <br /><br />
This is the reason why small <b>.rar</b>
archives are used by the uploaders. For example, if a hash check fails
on a torrent that contains a DVD ISO image split into small <b>.rar</b> files, you will only need to re-download a 50MB file. If the DVD ISO wasn't split into small <b>.rar</b>
files and a hash-check failed, you would need to re-download the whole
4.5GB image, which would not be of any assistance to your ratio.
<br /><br />
<br />
<b>So what do I do with these .rar files? <a name="75" id="75"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Install the latest version of <a href="http://www.rarlab.com/" class="altlink" target="_blank">WinRAR</a>. Then just right-click on any of the <b>.rar</b> files and select <b>Extract Here</b>. Once the file(s) are extracted, as long as you don't delete the <b>.rar</b> files you can continue to seed them.
<br /><br />
<br />
<b>The .sfv file says everything is ok, but I still get an error message in WinRAR? <a name="76" id="76"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
If the error message is similar to "Authenticity Error" or "CRC Mismatch", then try the following method:<br />
<ul>
<li>Double-click on any of the <font color="#4040c0"><b>filename.rxx</font></b> (or <b><font color="#4040c0">filename.partxx</font>.rar</b>) rar files to open WinRAR</li>
<li>Highlight the file to extract</li>
<li>Click the <b>Extract To</b> button at the top</li>
<li>Check the box in the bottom left that says <b>Keep Broken Files</b></li>
<li>Click <b>Extract</b></li>
<li>Ignore the error window, and it <i>should</i> extract fine</li>
</ul>
<br /><br />
<br />
<b>Why did an active torrent suddenly disappear? <a name="41" id="41"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
There may be three reasons for this:<ol>
<li>The torrent may have been out-of-sync with the site
<a href="index.php?page=rules">rules</a>.</li>
<li>The uploader may have deleted it because it was a bad release.
A replacement will probably be uploaded to take its place.</li>
<li>You may have paused/stopped the torrent and allowed the torrent to
'die'. Torrents are automatically deleted once there are both zero
seeds and zero leechers (ie 'dead').</li></ol>
<br /><br />
<br />
<b>How do I resume a broken download or reseed something? <a name="42" id="42"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Open the .torrent file (or redownload the .torrent file from here). When your client asks you for a location, choose the location of the existing file(s) and it will resume/reseed the torrent.
Note that you can only reseed if you still have all of the original files that you have downloaded (the .rar's, .sfv, .nfo, etc) 
<br /><br />
<br />
<b>Why do my downloads sometimes stall at 99%? <a name="43" id="43"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
The more pieces you have, the harder it becomes to find peers who have pieces you are missing. That is why downloads sometimes slow down or even stall when there are just a few percent remaining. Just be patient and you will, sooner or later, get the remaining pieces.
<br /><br />
<br />
<b>The torrent is supposed to be 100MB. How come I downloaded 120MB? <a name="45" id="45"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
See the hash fails topic. If your client receives bad data it will have to redownload it, therefore
the total downloaded may be larger than the torrent size. Make sure the &quot;kick/ban&quot; option is turned on
to minimize the extra downloads.<br /><br />
If this happens repeatedly, then there is something wrong with your client. Try using a different (and stable) client instead.
<br /><br />
<br />
<b>What's this "Your client is banned, please upgrade or change clients" error? <a name="98" id="98"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
See <a href="#29" class="altlink">May I use any bittorrent client?</a>
<br /><br />
<br />
<b>What are these "a piece has failed an hash check" messages? <a name="44" id="44"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Bittorrent clients check the data they receive for integrity. When a piece fails this check it is
automatically re-downloaded. Occasional hash fails are a common occurrence, and you shouldn't worry.<br/>
<br/>
Some clients have an (advanced) option/preference to 'kick/ban clients that send you bad data' or
similar. It should be turned on, since it makes sure that if a peer repeatedly sends you pieces that
fail the hash check it will be ignored in the future.<br /><br />
Very occasionally, your torrent client may fail in it's hash check
completely and not report it. If you have problems with the downloaded
files, use the .sfv file that came with the files to check their
integrity (you will need <a href="http://www.quicksfv.org/download.html" class="altlink" target="_blank">QuickSFV</a>).
If any parts of the download are damaged, delete them then resume the
torrent in your client - the deleted files will then be re-downloaded.<br>
(For example - QuickSFV shows <i>download.part43.rar</i> as being damaged. So delete <i>download.part43.rar</i>, resume the torrent and <i>download.part43.rar</i> will be re-downloaded.)
<br /><br />
<br />
<b>Why do I get a "rejected by tracker - Port xxxx is blacklisted"</font> error? <a name="47" id="47"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Your client is reporting to the tracker that it uses one of the default bittorrent ports
(6881-6889) or any other common p2p port for incoming connections.<br/>
<br/>
The <tag:site_name /> does not allow clients to use ports commonly associated with p2p protocols.
The reason for this is that it is a common practice for ISPs to throttle those ports
(that is, limit the bandwidth, hence the speed). <br/>
<br/>
The blocked ports list include, but is not neccessarily limited to, the following:<br/>
<br/>
	<b>Direct Connect</b>
	411 - 413<br/>
<br/>
		<b>Kazaa</b>
	1214<br/>
<br/>
	<b>eDonkey</b>
	4662<br/>
<br/>
	<b>Gnutella</b>
	6346 - 6347<br/>
<br/>	
	<b>BitTorrent</b>
6881 - 6889
<br/>
<br/>
In order to use our tracker you must  configure your client to use
any port range that does not contain those ports (a range within the region 49152 through 65535 is preferable,
cf. <a class="altlink" href="http://www.iana.org/assignments/port-numbers" target="_blank">IANA</a>). Notice that some clients,
like Azureus 2.0.7.0 or higher, use a single port for all torrents, while most others use one port per open torrent. The size
of the range you choose should take this into account (typically less than 10 ports wide. There
is no benefit whatsoever in choosing a wide range, and there are possible security implications). <br/>
<br/>
These ports are used for connections between peers, not client to tracker.
Therefore this change will not interfere with your ability to use other trackers (in fact it
should <i>increase</i> your speed with torrents from any tracker, not just ours). Your client
will also still be able to connect to peers that are using the standard ports.
If your client does not allow custom ports to be used, you will have to switch to one that does.<br/>
<br/>
Do not ask us, or in the forums, which ports you should choose. The more random the choice is the harder
it will be for ISPs to catch on to us and start limiting speeds on the ports we use.
If we simply define another range ISPs will start throttling that range also. <br/>
<br/>
Finally, remember to forward the chosen ports in your router and/or open them in your
firewall, should you have them.
<br /><br />
<br />
<b>What's this "IOError - [Errno13] Permission denied"</font> error? <a name="48" id="48"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
If you just want to fix it reboot your computer, it should solve the problem.
Otherwise read on.<br/>
<br/>
IOError means Input-Output Error, and that is a file system error, not a tracker one.
It shows up when your client is for some reason unable to open the partially downloaded
torrent files. The most common cause is two instances of the client to be running
simultaneously:
the last time the client was closed it somehow didn't really close but kept running in the
background, and is therefore still
locking the files, making it impossible for the new instance to open them.<br/>
<br/>
A more uncommon occurrence is a corrupted FAT. A crash may result in corruption
that makes the partially downloaded files unreadable, and the error ensues. Running
scandisk should solve the problem. (Note that this may happen only if you're running
Windows 9x - which only support FAT - or NT/2000/XP with FAT formatted hard drives.
NTFS is much more robust and should never permit this problem.)
<br /><br />
<br />
<b>What's this "Connection Limit Exceeded! You may only leech from one location at a time"</font> error? <a name="77" id="77"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
This error means that your client/pc has crashed and hasn't told the
tracker that you have disconnected, so it takes the tracker a short
while to realise that you aren't there anymore.<br />
To solve this problem: Stop the torrents in your client, wait a short while, go to your <a href="#0">My Panel</a> page, click on your username at the top of the page to take you to your displayed profile, scroll down and click <b>Flush Torrents!</b>, then resume the torrents in your client.
<br /><br />
<br />
<b>Why do I get an "Error - Unknown Passkey"</font> error? <a name="78" id="78"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Each torrent that you download from here comes with a unique passkey,
which is tied in to your <tag:site_name /> account. If you either try to load an <tag:site_name />
torrent with someone else's passkey, or if the tracker cannot read your
login information from your <tag:site_name /> cookie, then this error may appear.<br><br>
To prevent this error from happening: do not attempt to use a torrent
with someone else's passkey; do not logout of the site whilst you have
torrents running (simply close your browser, but do not use the <b>logout</b>
link); and make sure that the <tag:site_name /> cookie can communicate with the
tracker (don't use firewall/security features like Sygate's 'Stealth
Mode Browsing' which anonymises cookies).<br><br>
If this error occurs: <br>
<b>Method 1:</b> Open your browser, log back in to the site, then force
a manual update/announce on all torrents affected in your client. If
this doesn't work then try Method 2.<br /><br />
<b>Method 2:</b> Make sure you are logged in to the site &amp; that
your firewall or security software isn't blocking the site gaining
information from the <tag:site_name /> cookie; delete the torrents from your client
(not the files!); and re-download the torrents from the site and load
them into your client.
<br /><br />
<b>Other common client errors <a name="79" id="79"><a href="#4"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<b> windows cannot find...</b>
Download
the torrent to your hard drive and launch it from there. Right click on
the link and save the torrent to your hard-drive, then open the torrent
that is in your hard-drive by double clicking on it.
<br />
<br />
<b> problem getting response info - [errno2] No such file or directory</b>
<br />
<br />
<b> No space left on device</b>
<br />
<br />
The client allocates the space needed to store the file on your HD, you get
this error when you dont have enough space on your harddrive for
bittorrent to fully allocate the file.
<br />
<br />
<b> urlopen error - (7, 'getaddrinfo failed')</b>
<br />
<br />
This means that the tracker is overloaded, just keep the torrent running and wait.
<br />
<br />
<b> Problem connecting with tracker - (10054,'Connection reset by peer')</b>
<br />
<br />
This occurs when an established connection is shut down for some reason by the remote computer, just ignore it.
<br />
<br />
<b> Connecting to peers</b>
<br />
<br />
Maybe there are no users to connect to. Leave your torrent open and maybe the
bittorrent client will connect (it may take some time). Also make sure
that you are <a href=smf/index.php?topic=8.0 target="_blank">Connectable</a>.
<br />
<br />
<b> Problem connecting to tracker - &lt;urlopen error (10055, 'No buffer space available')&gt;</b>
<br />
<br />  
A lot of routes in your routing table (due to a misconfigured router, or
misconfigured default route).
Or lots of stale connections in your connection table. Or a lot of data
that is pending for sending or receiving on a current connection(s),
which can't be sent or received for some reason (destination System
dead or unreachable, for example). Or opening too many sockets at the
same time. Or maybe you don't have enough free space on your hard drive.
<br />
<br />
<b> "Error on Line xx" or "Cannot execute free Script"</b>
Do you have any ad blocking software running? Some firewalls like NIS and
Agnitum Outpost have such options built into them. There is also at
least one pop-up-stopper that now supports ad blocking. If you have any
of those turn them off and try again. You also might like to check your
security settings in your Browser. Perhaps you have very aggressive
security and privacy settings that are causing it?
<br />
<br />
<b> 10047, address family not supported</b>
<br />
<br />
This error is generated only because of incorrect network settings in
Windows. Make sure you: Have "Client for Microsoft Networks"; Installed
the Microsoft version of "TCP/IP"; Are logged in and have a current IP
address, you can use "winipcfg" or 'ipconfig/all' from the Command
Prompt; Test other network applications for proper operability
<br />
<br />
<b> Problem connecting to tracker - &lt;upload error (10065, 'no route to host')&gt;</b>
This can be caused by the remote host appearing to be down (which could be
the port chosen being blocked at the said host). This could also be
down to your network admin having noticed unusual traffic and blocked a
port or banned an IP.
<br />
<br />
<b> Error:Existing data file length too large [1596&gt;1404]</b>
<br />
<br />  
This is an Azureus specific error. Check the <b>Tools -&gt; Options -&gt; Files -&gt; Truncate existing files that are too large</b> box.
<br />
<br />  
 <b> Error : Data Missing {Path to files}</b>
<br />
<br />
Somehow the download path is corrupt. Just stop your torrent and remove it in
the client, move your files to another path, reload the torrent and
point to the new path, make sure the files are hash checked and are not
corrupt. This should fix your problem.
<br />
<br />
<b> Got bad file info - path disallowed for security reasons</b>
<br />
<br />  
This is a BitTornado specific error, when you get it switch to another client like uTorrent, Azureus, ABC, etc.<br />
<br />
<b> Tracker Status: Offline (SocketException:Unexpected end of file from server)</b>
  Re-download the .torrent file from the browse page and run it.<br />
<br />
<b> Couldn't listen -(10048,"address already in use ")</b><br />
<br />The port you're using is probably being used by other software. Try changing it in your bittorrent client.<br />
<br />
<b> Problem connecting with tracker - (10060, 'Operation timed out')</b><br />
<br />
For all of these errors, just leave your torrents running in your client.
The client will keep trying to connect to the tracker, when it does it
will update your stats too. When you're already downloading, just
ignore them.<br />
<br />
<b> urlopen error (10061, 'Connection refused"</b>
<br />
<br />  
<b> Problem connecting to tracker - &lt;urlopen error (111, 'Connection refused')&gt;</b>
<br />
<br />  
<b> Bad Data from Tracker</b>
<br />
<br />
<b> Bad Tracker Data</b><br />
<br />
<b> Problem connecting to tracker: HTTP Error -1</b>
<br />
<br />  
<b> Problem connecting to tracker - timeout exceeded</b>
<br />
<br />
Thanks to Youceff.com for the descriptions.
</td></tr></table>
<hr>
<h2>Torrent Uploading </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>Why can't I upload torrents? <a name="36" id="36"><a href="#5"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
<b>What criteria must I meet before I can join the Uploader</font> team? <a name="37" id="37"><a href="#5"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
You must be either:<ul>
If you think you can match these criteria do not hesitate to <a class="altlink" href="index.php?page=staff">contact</a> one of the Administrators.<br />
<b>Remember!</b> Write your application carefully! Be sure to include your UL speed and what kind of stuff you're planning to upload.<br />
Only well written letters with serious intent will be considered.
<br /><br />
<br />
<b>Can I upload your torrents to other trackers? <a name="38" id="38"><a href="#5"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
No. We are a closed, limited-membership community. Only registered users can use the <tag:site_name /> tracker.
Posting our torrents on other trackers is useless, since most people who attempt to download them will
be unable to connect with us. This generates a lot of frustration and bad-will against us at <tag:site_name />,
and will therefore not be tolerated.<br/>
<br/>
Complaints from other sites' administrative staff about our torrents being posted on their sites will
result in the banning of the users responsible.<br/>
<br/>
(However, the files you download from us are yours to do as you please. You can always create another
torrent, pointing to some other tracker, and upload it to the site of your choice.)
<br /><br />
</td></tr></table>
<hr>
<h2>How can I improve my torrent download speed?</h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>Do not immediately jump on new torrents <a name="50" id="50"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
The download speed mostly depends on the seeder-to-leecher ratio (SLR). Poor download speed is
mainly a problem with new and very popular torrents where the SLR is low.<br/>
<br/>
(Proselytising sidenote: make sure you remember that you did not enjoy the low speed.
<b>Seed</b> so that others will not endure the same.)<br/>
<br/>
There are a couple of things that you can try on your end to improve your speed:<br/>
<br/>In particular, do not do it if you have a slow connection. The best speeds will be found around the
half-life of a torrent, when the SLR will be at its highest. (The downside is that you will not be able to seed
so much. It's up to you to balance the pros and cons of this.)
<br /><br />
<br />
<b>Limit your upload speed <a name="51" id="51"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
The upload speed affects the download speed in essentially two ways:<br/>
<ul>
    <li>Bittorrent peers tend to favour those other peers that upload to them. This means that if A and B
	are leeching the same torrent and A is sending data to B at high speed then B will try to reciprocate.
	So due to this effect high upload speeds lead to high download speeds.</li>
    <li>Due to the way TCP works, when A is downloading something from B it has to keep telling B that
        it received the data sent to him. (These are called acknowledgements - ACKs -, a sort of &quot;got it!&quot; messages).
        If A fails to do this then B will stop sending data and wait. If A is uploading at full speed there may be no
        bandwidth left for the ACKs and they will be delayed. So due to this effect excessively high upload speeds lead
        to low download speeds.</li>
</ul>
The full effect is a combination of the two. The upload should be kept as high as possible while allowing the
ACKs to get through without delay. <b>A good thumb rule is keeping the upload at about 80% of the theoretical
upload speed.</b> You will have to fine tune yours to find out what works best for you. (Remember that keeping the
upload high has the additional benefit of helping with your ratio.) <br/>
<br/>
If you are running more than one instance of a client it is the overall upload speed that you must take into account.
Some clients (e.g. Azureus) limit global upload speed, others (e.g. Shad0w's) do it on a per torrent basis.
Know your client. The same applies if you are using your connection for anything else (e.g. browsing or ftp),
always think of the overall upload speed.
<br /><br />
<br />
<b>Limit the number of simultaneous connections <a name="52" id="52"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Some operating systems (like Windows 9x) do not deal well with a large number of connections, and may even crash.
Also some home routers (particularly when running NAT and/or firewall with stateful inspection services) tend to become
slow or crash when having to deal with too many connections. There are no fixed values for this, you may try 60 or 100
and experiment with the value. Note that these numbers are additive, if you have two instances of
a client running the numbers add up.
<br /><br />
<br />
<b>Limit the number of simultaneous uploads <a name="53" id="53"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Isn't this the same as above? No. Connections limit the number of peers your client is talking to and/or
downloading from. Uploads limit the number of peers your client is actually uploading to. The ideal number is
typically much lower than the number of connections, and highly dependent on your (physical) connection.
<br /><br />
<br />
<b>Just give it some time <a name="54" id="54"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
As explained above peers favour other peers that upload to them. When you start leeching a new torrent you have
nothing to offer to other peers and they will tend to ignore you. This makes the starts slow, in particular if,
by change, the peers you are connected to include few or no seeders. The download speed should increase as soon
as you have some pieces to share.
<br /><br />
<br />
<b>Why is my browsing so slow while leeching? <a name="55" id="55"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Your download speed is always finite. If you are a peer in a fast torrent it will almost certainly saturate your
download bandwidth, and your browsing will suffer. At the moment there is no client that allows you to limit the
download speed, only the upload. You will have to use a third-party solution,
such as <a class="altlink" href="http://www.netlimiter.com/" target="_blank">NetLimiter</a>.<br/>
<br/>
Browsing was used just as an example, the same would apply to gaming, IMing, etc...
<br /><br />
<br />
<b>Why am I showing as Connectable - '<font=red>No</font>' in the peer list? (And why should I care?) <a name="80" id="80"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
The tracker has determined that you are firewalled or NATed and cannot accept incoming connections.
<br>
<br>
This means that other peers in the swarm will be unable to connect to you, only you to them. Even worse,
if two peers are both in this state they will not be able to connect at all. This has obviously a
detrimental effect on the overall speed.
<br>
<br>
The way to solve the problem involves opening the ports used for incoming connections
(the same range you defined in your client) on the firewall and/or configuring your
NAT server to use a basic form of NAT for that range instead of NAPT (the actual process differs widely between different router models.
Check your router documentation and/or support forum. You will also find lots of information on the
subject at <a class="altlink" href="http://portforward.com/" target="_blank">PortForward</a>).
<br /><br />
<br />
<b>Could my ISP be slowing my upload and download speeds when I use BitTorrent? <a name="81" id="81"><a href="#6"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Yes, some ISP's have introduced <b>Traffic Shaping</b> - which is
an attempt to control network traffic, and the BitTorrent protocol in
particular is affected by this. There is a list of known 'bad' ISP's at
the <a href="http://wiki.vuze.com/w/Bad_ISPs" class="altlink" target="_blank">Vuze Wiki</a>.<br><br>
If you are subject to Traffic Shaping there are two possible solutions:
change ISP's; or use a BitTorrent client that implements
encryption/obfuscation to 'hide' your BitTorrent traffic. Azureus and
uTorrent both offer this.
<br /><br />
</td></tr></table>
<hr>
<h2>My ISP uses a transparent proxy.</h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<b>What should I do? <a name="82" id="82"><a href="#7"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br /><br />
Short answer...
<br />
...change to an ISP that does not force a proxy upon you. If you cannot or do not want to then read on.<br><br>
<i>Note: This is a large and complex topic. It is not possible to cover all variations here.</i>
<br /><br />
<br />
<b>What is a proxy? <a name="56" id="56"><a href="#7"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Basically a middleman. When you are browsing a site through a proxy your requests are sent to the proxy and the proxy
forwards them to the site instead of you connecting directly to the site. There are several classifications
(the terminology is far from standard):<br/>
<br/>
<b>Transparent</b>
A transparent proxy is one that needs no configuration on the clients. It works by automatically redirecting all port 80 traffic to the proxy. (Sometimes used as synonymous for non-anonymous.)
<br />
<br />
<b>Explicit/Voluntary</b>
Clients must configure their browsers to use them.
<br />
<br />
<b>Anonymous</b>
<br />
<br />
The proxy sends no client identification to the server. (HTTP_X_FORWARDED_FOR header is not sent; the server does not see your IP.)
<br />
<br />
<b>Highly Anonymous</b>
<br />
<br />
The proxy sends no client nor proxy identification to the server. (HTTP_X_FORWARDED_FOR, HTTP_VIA and HTTP_PROXY_CONNECTION headers are not sent; the server doesn't see your IP and doesn't even know you're using a proxy.)
<br />
<br />
<b>Public</b>
<br />
<br />
(Self explanatory) A transparent proxy may or may not be anonymous, and there are several levels of anonymity.
<br />
<br />
<b>How do I find out if I'm behind a (transparent/anonymous) proxy? <a name="57" id="57"><a href="#7"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Try <a href="http://www.2privacy.com/www/IP_Check_IP_Address/Proxy_Judge_Test.html class="altlink" target="_blank">ProxyJudge</a>. It lists the HTTP headers that the server where it is running
received from you. The relevant ones are HTTP_CLIENT_IP, HTTP_X_FORWARDED_FOR and REMOTE_ADDR.<br/>
<br/>
<br/>
<b>Why is my port listed as &quot;---&quot; even though I'm not NAT/Firewalled?</b><a name="prox3"> <a href="#7"><img border="0" alt="top" src="images/top.gif"/></a><br/>
<br/>
The TorrentBits tracker is quite smart at finding your real IP, but it does need the proxy to send the HTTP header
HTTP_X_FORWARDED_FOR. If your ISP's proxy does not then what happens is that the tracker will interpret the proxy's IP
address as the client's IP address. So when you login and the tracker tries to connect to your client to see if you are
NAT/firewalled it will actually try to connect to the proxy on the port your client reports to be using for
incoming connections. Naturally the proxy will not be listening on that port, the connection will fail and the
tracker will think you are NAT/firewalled.
<br /><br />
<br />
<b>Can I bypass my ISP's proxy?<a name="58" id="58"><a href="#7"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
If your ISP only allows HTTP traffic through port 80 or blocks the usual proxy ports then you would need to use something
like <a href="http://sockslist.net/" target="_blank">socks</a> and that is outside the scope of this FAQ.<br/>
<br/>
The site accepts connections on port 81 besides the usual 80, and using them may be enough to fool some proxies. So the first
thing to try should be connecting to www.torrentbits.org:81. Note that even if this works your bt client will still try
to connect to port 80 unless you edit the announce url in the .torrent file.<br/>
<br/>
Otherwise you may try the following:<br/>
<ul>
    <li>Choose any public <b>non-anonymous</b> proxy that does <b>not</b> use port 80
	(e.g. from <a href="http://tools.rosinstrument.com/proxy"  class="altlink" target="_blank">this</a>,
	<a href="http://www.proxy4free.com/index.html" class="altlink" target="_blank">this</a> or
	<a href="http://www.samair.ru/proxy" class="altlink" target="_blank">this</a> list).</li>

    <li>Configure your computer to use that proxy. For Windows XP, do <i>Start</i>, <i>Control Panel</i>, <i>Internet Options</i>,
	<i>Connections</i>, <i>LAN Settings</i>, <i>Use a Proxy server</i>, <i>Advanced</i> and type in the IP and port of your chosen
	proxy. Or from Internet Explorer use <i>Tools</i>, <i>Internet Options</i>, ...<br/></li>

    <li>(Facultative) Visit <a href="http://www.2privacy.com/www/IP_Check_IP_Address/Proxy_Judge_Test.html class="altlink" target="_blank">ProxyJudge</a>. If you see an HTTP_X_FORWARDED_FOR in
	the list followed by your IP then everything should be ok, otherwise choose another proxy and try again.<br/></li>

    <li>Visit TorrentBits. Hopefully the tracker will now pickup your real IP (check your profile to make sure).</li>
</ul>
<br/>
Notice that now you will be doing all your browsing through a public proxy, which are typically quite slow.
Communications between peers do not use port 80 so their speed will not be affected by this, and should be better than when
you were &quot;unconnectable&quot;.
<br /><br />
<br />
<b>How do I make my bittorrent client use a proxy? <a name="59" id="59"><a href="#7"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Just configure Windows XP as above. When you configure a proxy for Internet Explorer you're actually configuring a proxy for
all HTTP traffic (thank Microsoft and their &quot;IE as part of the OS policy&quot; ). On the other hand if you use another
browser (Opera/Mozilla/Firefox) and configure a proxy there you'll be configuring a proxy just for that browser. We don't
know of any BT client that allows a proxy to be specified explicitly.
<br /><br />
</td></tr></table>
<hr>
<h2>Why can't I connect? Is the site blocking me? </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>Maybe my address is blacklisted? <a name="62" id="62"><a href="#8"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
The site blocks addresses listed in the (former) <a class="altlink" href="http://phoenixlabs.org/pg2/" target="_blank">PeerGuardian 2</a>
database, as well as addresses of banned users. This works at Apache/PHP level, it's just a script that
blocks <i>logins</i> from those addresses. It should not stop you from reaching the site. In particular
it does not block lower level protocols, you should be able to ping/traceroute the server even if your
address is blacklisted. If you cannot then the reason for the problem lies elsewhere.<br/>
<br/>
If somehow your address is indeed blocked in the PG database do not contact us about it, it is not our
policy to open <i>ad hoc</i> exceptions. You should clear your IP with the database maintainers instead.
<br /><br />
<br />
<b>Your ISP blocks the site's address <a name="63" id="63"><a href="#8"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
(In first place, it's unlikely your ISP is doing so. DNS name resolution and/or network problems are the usual culprits.)
<br/>
There's nothing we can do.
You should contact your ISP (or get a new one). Note that you can still visit the site via a proxy, follow the instructions
in the relevant section. In this case it doesn't matter if the proxy is anonymous or not, or which port it listens to.<br/>
<br/>
Notice that you will always be listed as an &quot;unconnectable&quot; client because the tracker will be unable to
check that you're capable of accepting incoming connections.
<br /><br />
<br />
<b>AOL users and 403 Forbidden errors <a name="83" id="83"><a href="#8"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
For some reason, AOL's browser can block access to certain portions
of this site. If you experience these problems, try using a different
browser (eg IE or FireFox)
<br /><br />
</td></tr></table>
<hr>
<h2>What if I can't find the answer to my problem here? </h2>
<table width=100% border=0 cellspacing=0 cellpadding=10><tr><td>
<br />
<b>You can try these: <a name="65" id="65"><a href="#9"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
Post in the <a class="altlink" href="index.php?page=forum">Forums</a>, by all means. You'll find they
are usually a friendly and helpful place, provided you follow a few basic guidelines:
<ul>
<li>Make sure your problem is not really in this FAQ. There's no point in posting just to be sent
back here.</li>
<li>Before posting read the sticky topics (the ones at the top). Many times new information that
still hasn't been incorporated in the FAQ can be found there.</li>
<li>Help us in helping you. Do not just say "it doesn't work!". Provide details so that we don't
have to guess or waste time asking. What client do you use? What's your OS? What's your network setup? What's the exact
error message you get, if any? What are the torrents you are having problems with? The more
you tell the easiest it will be for us, and the more probable your post will get a reply.</li>
<li>Use a clear thread title. Non-descriptive thread titles like
"Question" or "Problems" are not very useful at grabbing the attention
of those that can help you.</li>
<li>And needless to say: be polite. Demanding help rarely works, asking for it usually does
the trick.</li></ul>
<br /><br />
<br />
<b>Use the Helpdesk <a name="#84" id="84"><a href="#9"><img border="0" alt="top" src="images/top.gif"/></a></b>
<br />
<br />
You can send a message to the <a href="index.php?page=modules&module=helpdesk" class="altlink">Help Desk</a>, but you must check the <a href="index.php?page=faq" class="altlink">FAQ</a>, check the <a href="index.php?page=forum&action=viewforum&forumid=1" class="altlink">Guides</a>, and <a href="smf/index.php?action=search" class="altlink">Search</a> the forums, <b>before</b> asking any questions.<br /><br />
Also, spamming or abuse of the Help Desk is not tolerated!
<br /><br />

</td></tr></table>
    <if:read_verify>
      <form name="forced_faq" method="post" action="index.php?page=faq">
        <tr>
          <td class="header" align="center"><input type="checkbox" name="agree"><tag:language.FAQ_AGREE /></td>
        </tr>
        <tr>
          <td class="blocklist" align="center"><input type='submit' name='submit' value='<tag:language.SUBMIT />'></td>
        </tr>
      </form>
    </if:read_verify>
