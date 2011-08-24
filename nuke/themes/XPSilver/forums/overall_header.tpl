<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css"></head><body text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<!-- link rel="stylesheet" href="themes/XPSilver/forums/forums.css" type="text/css" -->
<div align="center">
  <style type="text/css">
<!--
/*
  XPSilver theme
  was created by mikem using:
  The original Emerald Theme for phpBBtoNuke version 2+
  Created by Voicesinmyhead.net, Neil Myers
  http://www.voicesinmyhead.net
*/


/* General font families for common tags */
font,th,td,p { font-family: {T_FONTFACE1} }
a:link,a:active,a:visited { color : {T_BODY_LINK}; }
a:hover		{ text-decoration: underline; color : {T_BODY_HLINK}; }
hr	{ height: 0px; border: solid {T_TR_COLOR3} 0px; border-top-width: 1px;}

/* Main table cell colours and backgrounds */
td.row1	{ background-color: {T_TR_COLOR1}; }
td.row2	{ background-color: {T_TR_COLOR2}; }
td.row3	{ background-color: {T_TR_COLOR3}; }

/* The largest text used in the index page title and toptic title etc. */
.maintitle	{
	font-weight: bold; font-size: 22px; font-family: "{T_FONTFACE2}",{T_FONTFACE1};
	text-decoration: underline; line-height : 120%; color : {T_BODY_TEXT};
}

/* General text */
.gen            {font-size : {T_FONTSIZE3}px; color : {T_BODY_TEXT}; }
a.gen           {font-size : {T_FONTSIZE3}px; color : {T_BODY_LINK}; text-decoration : underline; }
a.gen:hover     {font-size : {T_FONTSIZE3}px; color : {T_BODY_HLINK}; text-decoration : underline; }

.genmed 	    {font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT}; }
a.genmed 	    {font-size : {T_FONTSIZE2}px; color : {T_BODY_LINK}; text-decoration: underline; }
a.genmed:hover  {font-size : {T_FONTSIZE2}px; color : {T_BODY_HLINK}; text-decoration: underline; }

.gensmall 	    {font-size : {T_FONTSIZE1}px; color : {T_BODY_TEXT}; }
a.gensmall      {font-size : {T_FONTSIZE1}px; color : {T_BODY_LINK}; text-decoration: underline; }
a.gensmall:hover{font-size : {T_FONTSIZE1}px; color : {T_BODY_HLINK}; text-decoration: underline; }

/* The register, login, search etc links at the top of the page */
.mainmenu		{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT} }
a.mainmenu		{ text-decoration: underline; color : {T_BODY_LINK};  }
a.mainmenu:hover{ text-decoration: underline; color : {T_BODY_HLINK}; }

/* Forum category titles */
.cattitle		{ font-weight: bold; font-size: {T_FONTSIZE3}px ; letter-spacing: 1px; color : {T_BODY_LINK}}
a.cattitle		{ text-decoration: underline; color : {T_BODY_LINK}; }
a.cattitle:hover{ text-decoration: underline; }

/* Forum title: Text and link to the forums used in: index.php */
.forumlink		{ font-weight: bold; font-size: {T_FONTSIZE3}px; color : {T_BODY_LINK}; }
a.forumlink 	{ text-decoration: underline; color : {T_BODY_LINK}; }
a.forumlink:hover{ text-decoration: underline; color : {T_BODY_HLINK}; }

/* Used for the navigation text, (Page 1,2,3 etc) and the navigation bar when in a forum */
.nav			{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT};}
a.nav			{ text-decoration: underline; color : {T_BODY_LINK}; }
a.nav:hover		{ text-decoration: underline; }

/* titles for the topics: could specify viewed link colour too */
.topictitle,h1,h2	{ font-weight: bold; font-size: {T_FONTSIZE2}px; color : {T_BODY_TEXT}; }
a.topictitle:link   { text-decoration: underline; color : {T_BODY_LINK}; }
a.topictitle:visited { text-decoration: underline; color : {T_BODY_VLINK}; }
a.topictitle:hover	{ text-decoration: underline; color : {T_BODY_HLINK}; }

/* Name of poster in viewmsg.php and viewtopic.php and other places */
.name			{ font-size : {T_FONTSIZE2}px; color : {T_BODY_TEXT};}

/* Location, number of posts, post date etc */
.postdetails		{font-weight: bold;  font-size : {T_FONTSIZE1}px; color : {T_BODY_TEXT}; }

/* The content of the posts (body of text) */
.postbody { font-size : {T_FONTSIZE3}px; line-height: 18px}
a.postlink:link	{ text-decoration: underline; color : {T_BODY_LINK} }
a.postlink:visited { text-decoration: underline; color : {T_BODY_VLINK}; }
a.postlink:hover { text-decoration: underline; color : {T_BODY_HLINK}}

/* Quote & Code blocks */
.code {
	font-family: {T_FONTFACE3}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR2};
	background-color: {T_TD_COLOR1}; border: {T_TR_COLOR3}; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}

.quote {
	font-family: {T_FONTFACE1}; font-size: {T_FONTSIZE2}px; color: {T_FONTCOLOR1}; line-height: 125%;
	background-color: {T_TD_COLOR1}; border: {T_TR_COLOR3}; border-style: solid;
	border-left-width: 1px; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px
}

/* Copyright and bottom info */
.copyright		{ font-size: {T_FONTSIZE1}px; font-family: {T_FONTFACE1}; color: {T_FONTCOLOR1}; letter-spacing: -1px;}
a.copyright		{ color: {T_FONTCOLOR1}; text-decoration: underline;}
a.copyright:hover { color: {T_BODY_TEXT}; text-decoration: underline;}




/* The text input fields background colour */
input.post, textarea.post, select {
	background-color : #FFFFFF;
	color : #000000;
}


input { text-indent : 2px; }

/* The buttons used for bbCode styling in message post */
input.button {
	background-color : {T_TR_COLOR2};
	color : {T_BODY_TEXT};
	font-size: {T_FONTSIZE2}px; font-family: {T_FONTFACE1};
}

/* The main submit button option */
input.mainoption {
	background-color : {T_TR_COLOR2};
	color : {T_BODY_TEXT};
	font-weight : bold;
}

/* underline-bold submit button */
input.liteoption {
	background-color : {T_TR_COLOR2};
	color : {T_BODY_TEXT};
	font-weight : normal;
}

/* Drop down box */
select {
	background-color: #FFFFFF;
	color : #000000;
	font-weight : normal;
}

/* This is the line in the posting page which shows the rollover
  help line. This is actually a text box, but if set to be the same
  colour as the background no one will know ;)
*/
.helpline { background-color: {T_TR_COLOR1}; border-style: underline; color : {T_BODY_TEXT} }

.topframe       { FONT-SIZE: 12px; FONT-WEIGHT: bold; FONT-VARIANT: small-caps; color : #000000 }

-->
</style>
  <!-- BEGIN switch_enable_pm_popup -->
  <script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
  <!-- END switch_enable_pm_popup -->
  <a name="top"></a> 
  <table width="100%">
    <tr> 
      <td height="77"> 
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr> 
            <td align="center">&nbsp 
              <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr> 
                  <td width="10"><img src="themes/XPSilver/forums/images/up-left3.gif" alt="" border="0"></td>
                  <td background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="903"> 
                    <div align="left"><b><font face="Times New Roman, Times, serif">&nbsp; 
                      Control Panel</font></b></div>
                  </td>
                  <td width="32"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
                </tr>
                <tr> 
                  <td background="themes/XPSilver/forums/images/left2.gif" width="10" bgcolor="#FFFFFF">&nbsp;</td>
                  <td width="903" bgcolor="#FFFFFF"> 
                    <table cellspacing="0" cellpadding="10" border="0" align="center" width="100%">
                      <tr> 
                        <td align="center" valign="top" bgcolor="#FFFFFF"> <span class="mainmenu"><a href="{U_PROFILE}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_profile.gif" width="12" height="13" border="0" alt="{L_PROFILE}" hspace="3" />{L_PROFILE}</a>&nbsp; 
                          &nbsp;<a href="{U_PRIVATEMSGS}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_message.gif" width="12" height="13" border="0" alt="{PRIVATE_MESSAGE_INFO}" hspace="3" />{PRIVATE_MESSAGE_INFO}</a>&nbsp; 
                          &nbsp;<a href="{U_LOGIN_LOGOUT}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_login.gif" width="12" height="13" border="0" alt="{L_LOGIN_LOGOUT}" hspace="3" />{L_LOGIN_LOGOUT}</a> 
                          <a href="{U_FAQ}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_faq.gif" width="12" height="13" border="0" alt="{L_FAQ}" hspace="3" />{L_FAQ}</a>&nbsp; 
                          &nbsp;<a href="{U_SEARCH}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_search.gif" width="12" height="13" border="0" alt="{L_SEARCH}" hspace="3" />{L_SEARCH}</a>&nbsp; 
                          &nbsp;<a href="{U_MEMBERLIST}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_members.gif" width="12" height="13" border="0" alt="{L_MEMBERLIST}" hspace="3" />{L_MEMBERLIST}</a>&nbsp; 
                          &nbsp;<a href="{U_GROUP_CP}" class="mainmenu"><img src="themes/XPSilver/forums/images/icon_mini_groups.gif" width="12" height="13" border="0" alt="{L_USERGROUPS}" hspace="3" />{L_USERGROUPS}</a>&nbsp; 
                          </span> </td>
                      </tr>
                    </table>
                  </td>
                  <td background="themes/XPSilver/forums/images/right2.gif" width="32" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr> 
                  <td background="themes/XPSilver/forums/images/down2.gif" width="10"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
                  <td background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" width="100%">&nbsp;</td>
                  <td width="32"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
  </table>
</div>
<div align="center"></div>
