
<form method="post" action="{S_POST_DAYS_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
	  <td align="left" valign="bottom" colspan="2"><a class="maintitle" href="{U_VIEW_FORUM}">{FORUM_NAME}</a><br /><span class="gensmall"><b>{L_MODERATOR}: {MODERATORS}<br /><br />{LOGGED_IN_USER_LIST}</b></span></td>
	  <td align="right" valign="bottom" nowrap width="373"><span class="gensmall"><b>{PAGINATION}</b></span></td>
	</tr>
	<tr>
	  <td align="left" valign="middle" width="309"> 
        <p><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" /></a></p>
        </td>
	</tr>
  </table>
  <span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
  -> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span><br><BR>
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
          <td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left2.gif" alt="" border="0"></td>
          <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%" height="25" nowrap colspan="2"><span class="topframe">&nbsp;{L_TOPICS}&nbsp;</span></td>
          <td class="row2" background="themes/XPSilver/forums/images/up2.gif" align="center" width="50" height="25" nowrap><span class="topframe">&nbsp;{L_REPLIES}&nbsp;</span></td>
          <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100" height="25" nowrap><span class="topframe">&nbsp;{L_AUTHOR}&nbsp;</span></td>
          <td class="row2" background="themes/XPSilver/forums/images/up2.gif" align="center" width="50" height="25" nowrap><span class="topframe">&nbsp;{L_VIEWS}&nbsp;</span></td>
          <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" nowrap><span class="topframe">&nbsp;{L_LASTPOST}&nbsp;</span></td>
          
      <td class="row1" ><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
        </tr>

    <tr>
   	  <td background="themes/XPSilver/forums/images/left2.gif" width="15" bgcolor="F0F1F5">&nbsp;</td>
  	  <td colspan="2" bgcolor="F0F1F5">&nbsp;</td>
  	  <td bgcolor="F0F1F5">&nbsp;</td>
  	  <td bgcolor="F0F1F5">&nbsp;</td>
  	  <td bgcolor="F0F1F5">&nbsp;</td>
  	  <td align="center" nowrap bgcolor="F0F1F5"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_MARK_READ}">{L_MARK_TOPICS_READ}</a></span></td>
  	  <td background="themes/XPSilver/forums/images/right2.gif" width="15" bgcolor="F0F1F5">&nbsp;</td>
   	</tr>

    	<!-- BEGIN topicrow -->
	<tr>
	  <td class="row1" width="15" height="2" background="themes/XPSilver/forums/images/topnav-bg.gif"><img src="themes/XPSilver/forums/images/left4.gif" alt="" border="0" width="26" height="25"></td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif" align="center" height="2"><img src="themes/XPSilver/forums/images/pixel.gif" alt="" border="0" width="25" height="25"></td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif" align="center" height="2">&nbsp;</td>
	  <td class="row2" background="themes/XPSilver/forums/images/topnav-bg.gif" align="center" height="2">&nbsp;</td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif" align="center" height="2">&nbsp;</td>
	  <td class="row2" background="themes/XPSilver/forums/images/topnav-bg.gif" align="center" height="2">&nbsp;</td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif" align="center" height="2">&nbsp;</td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif" height="2"><img src="themes/XPSilver/forums/images/right4.gif" alt="" border="0" width="6" height="25"></td>
	</tr>
	<tr>
	  <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="15">&nbsp;</td>
	  <td class="row1" align="center" valign="middle" width="20"><img src="{topicrow.TOPIC_FOLDER_IMG}" alt="{topicrow.L_TOPIC_FOLDER_ALT}" title="{topicrow.L_TOPIC_FOLDER_ALT}" /></td>
	  <td class="row1" width="100%" onMouseOver="this.style.backgroundColor='#E0E2EB'; this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#F0F1F5';" onclick="window.location.href='{topicrow.U_VIEW_TOPIC}'"><span class="topictitle">{topicrow.NEWEST_POST_IMG}{topicrow.TOPIC_TYPE}<a href="{topicrow.U_VIEW_TOPIC}" class="topictitle">{topicrow.TOPIC_TITLE}</a></span><span class="gensmall"><br />
		{topicrow.GOTO_PAGE}</span></td>
	  <td class="row2" align="center" valign="middle"><span class="postdetails">{topicrow.REPLIES}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="name">{topicrow.TOPIC_AUTHOR}</span></td>
	  <td class="row2" align="center" valign="middle"><span class="postdetails">{topicrow.VIEWS}</span></td>
	  <td class="row1" align="center" valign="middle" nowrap><span class="postdetails">&nbsp;&nbsp;{topicrow.LAST_POST_TIME}&nbsp;&nbsp;<br />&nbsp;&nbsp;{topicrow.LAST_POST_AUTHOR}&nbsp;&nbsp;{topicrow.LAST_POST_IMG}</span></td>
	  <td class="row1" background="themes/XPSilver/forums/images/right2.gif" width="15">&nbsp;</td>
	</tr>
	<!-- END topicrow -->
	<!-- BEGIN switch_no_topics -->
	<tr>
	  <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="15">&nbsp;</td>
	  <td class="row1" colspan="6" height="30" align="center" valign="middle"><span class="gen">{L_NO_TOPICS}</span></td>
	  <td class="row1" background="themes/XPSilver/forums/images/right2.gif" width="15">&nbsp;</td>
	</tr>
	<!-- END switch_no_topics -->
   	<tr>
   	  <td class="row1" width="15" height="15" background="themes/XPSilver/forums/images/topnav-bg.gif"><img src="themes/XPSilver/forums/images/left4.gif" alt="" border="0" width="26" height="25"></td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif" colspan="2" align="center" height="15"><img src="themes/XPSilver/forums/images/pixel.gif" alt="" border="0" width="25" height="25"></td>
	  <td class="row2" background="themes/XPSilver/forums/images/topnav-bg.gif">&nbsp;</td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif">&nbsp;</td>
	  <td class="row2" background="themes/XPSilver/forums/images/topnav-bg.gif">&nbsp;</td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif">&nbsp;</td>
	  <td class="row1" background="themes/XPSilver/forums/images/topnav-bg.gif"><img src="themes/XPSilver/forums/images/right4.gif" alt="" border="0" width="6" height="25"></td>
	</tr>
	<tr>
	  <td width="15" background="themes/XPSilver/forums/images/left2.gif">&nbsp;</td>
	  <td align="left" valign="middle" width="100%" colspan="3">&nbsp;</td>
	  <td align="right" valign="middle" colspan="3"><span class="genmed">{L_DISPLAY_TOPICS}:&nbsp;{S_SELECT_TOPIC_DAYS}&nbsp;<input type="submit" class="liteoption" value="{L_GO}" name="submit" /></span></td>
	  <td width="15" background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
	</tr>
	<tr>
	  <td width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
	  <td background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" colspan="6">&nbsp;</td>
	  <td><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
	</tr>
  </table>
<BR>
  <span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
  -> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span><br>
  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
	  <td align="left" valign="middle" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="right" valign="middle" nowrap><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span>
		</td>
	</tr>
	<tr>
	  <td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
	</tr>
  </table>
</form>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="right">{JUMPBOX}</td>
  </tr>
</table>

<table width="100%" cellspacing="0" border="0" align="center" cellpadding="0">
	<tr>
		<td align="left" valign="top"><table cellspacing="3" cellpadding="0" border="0">
			<tr>
				<td width="20" align="left"><img src="{FOLDER_NEW_IMG}" alt="{L_NEW_POSTS}"/></td>
				<td class="gensmall">{L_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_IMG}" alt="{L_NO_NEW_POSTS}"/></td>
				<td class="gensmall">{L_NO_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_ANNOUNCE_IMG}" alt="{L_ANNOUNCEMENT}"/></td>
				<td class="gensmall">{L_ANNOUNCEMENT}</td>
			</tr>
			<tr>
				<td width="20" align="center"><img src="{FOLDER_HOT_NEW_IMG}" alt="{L_NEW_POSTS_HOT}"/></td>
				<td class="gensmall">{L_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_HOT_IMG}" alt="{L_NO_NEW_POSTS_HOT}"/></td>
				<td class="gensmall">{L_NO_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_STICKY_IMG}" alt="{L_STICKY}"/></td>
				<td class="gensmall">{L_STICKY}</td>
			</tr>
			<tr>
				<td class="gensmall"><img src="{FOLDER_LOCKED_NEW_IMG}" alt="{L_NEW_POSTS_TOPIC_LOCKED}"/></td>
				<td class="gensmall">{L_NEW_POSTS_LOCKED}</td>
				<td>&nbsp;&nbsp;</td>
				<td class="gensmall"><img src="{FOLDER_LOCKED_IMG}" alt="{L_NO_NEW_POSTS_TOPIC_LOCKED}"/></td>
				<td class="gensmall">{L_NO_NEW_POSTS_LOCKED}</td>
			</tr>
		</table></td>
		<td align="right"><span class="gensmall">{S_AUTH_LIST}</span></td>
	</tr>
</table>
