<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
<form method="post" action="{S_POST_DAYS_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="left" valign="bottom" colspan="2"><a class="maintitle" href="{U_VIEW_FORUM}">{FORUM_NAME}</a><br /><span class="gensmall"><b>{L_MODERATOR}: {MODERATORS}<br /><br />{LOGGED_IN_USER_LIST}</b></span></td>
	  <td align="right" valign="bottom" nowrap="nowrap"><span class="gensmall"><b>{PAGINATION}</b></span></td>
	</tr>
	<tr> 
	  <td align="left" valign="middle" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" aForums-left="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="left" valign="middle" class="nav" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	  <td align="right" valign="bottom" class="nav" nowrap="nowrap"><span class="gensmall"><a href="{U_MARK_READ}" class="gensmall">{L_MARK_TOPICS_READ}</a></span></td>
	</tr>
  </table>

  <table border="0" cellpadding="4" cellspacing="1" width="100%">
	<tr> 
	  <th colspan="2" align="center" height="25" class="1" nowrap="nowrap">&nbsp;{L_TOPICS}&nbsp;</th>
	  <th width="50" align="center" class="1" nowrap="nowrap">&nbsp;{L_REPLIES}&nbsp;</th>
	  <th width="100" align="center" class="1" nowrap="nowrap">&nbsp;{L_AUTHOR}&nbsp;</th>
	  <th width="50" align="center" class="1" nowrap="nowrap">&nbsp;{L_VIEWS}&nbsp;</th>
	  <th align="center" class="1" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
	</tr>
	<!-- BEGIN topicrow -->
	<tr> 
	  <td class="row1" align="center" valign="middle" width="20"><img src="{topicrow.TOPIC_FOLDER_IMG}"  aForums-left="{topicrow.L_TOPIC_FOLDER_AForums-left}" title="{topicrow.L_TOPIC_FOLDER_AForums-left}" /></td>
	  <td class="row1" width="100%" onMouseOver=this.style.backgroundColor="c6d7e5" onMouseOut=this.style.backgroundColor="#DBE2EB" onclick="window.location.href='{topicrow.U_VIEW_TOPIC}'"><span class="nav">{topicrow.NEWEST_POST_IMG}{topicrow.TOPIC_TYPE}<a href="{topicrow.U_VIEW_TOPIC}" class="nav">{topicrow.TOPIC_TITLE}</a></span><span class="gensmall"><br />
		{topicrow.GOTO_PAGE}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="gensmall">{topicrow.REPLIES}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="gensmall">{topicrow.TOPIC_AUTHOR}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="gensmall">{topicrow.VIEWS}</span></td>
	  <td class="row1" align="center" valign="middle" nowrap="nowrap"><span class="gensmall">{topicrow.LAST_POST_TIME}<br />{topicrow.LAST_POST_AUTHOR} {topicrow.LAST_POST_IMG}</span></td>
	</tr>
	<!-- END topicrow -->
	<!-- BEGIN switch_no_topics -->
	<tr> 
	  <td class="row1" colspan="6" height="30" align="center" valign="middle"><span class="gen">{L_NO_TOPICS}</span></td>
	</tr>
	<!-- END switch_no_topics -->
	<tr> 
	  <td class="catBottom" align="center" valign="middle" colspan="6" height="28"><span class="genmed">{L_DISPLAY_TOPICS}:&nbsp;{S_SELECT_TOPIC_DAYS}&nbsp; 
		<input type="submit" class="liteoption" value="{L_GO}" name="submit" />
		</span></td>
	</tr>
  </table>

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="left" valign="middle" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" aForums-left="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> -> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	  <td align="right" valign="middle" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span> 
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

<table width="100%" cellspacing="1" border="0" align="center" cellpadding="3">
	<tr>
		<td align="left" class="row1" valign="top"><table cellspacing="3" cellpadding="0" border="0">
			<tr>
				<td width="20" align="left"><img src="{FOLDER_NEW_IMG}" aForums-left="{L_NEW_POSTS}"  /></td>
				<td class="gensmall">{L_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_IMG}" aForums-left="{L_NO_NEW_POSTS}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_ANNOUNCE_IMG}" aForums-left="{L_ANNOUNCEMENT}"  /></td>
				<td class="gensmall">{L_ANNOUNCEMENT}</td>
			</tr>
			<tr> 
				<td width="20" align="center"><img src="{FOLDER_HOT_NEW_IMG}" aForums-left="{L_NEW_POSTS_HOT}"  /></td>
				<td class="gensmall">{L_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_HOT_IMG}" aForums-left="{L_NO_NEW_POSTS_HOT}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_STICKY_IMG}" aForums-left="{L_STICKY}"  /></td>
				<td class="gensmall">{L_STICKY}</td>
			</tr>
			<tr>
				<td class="gensmall"><img src="{FOLDER_LOCKED_NEW_IMG}" aForums-left="{L_NEW_POSTS_TOPIC_LOCKED}"  /></td>
				<td class="gensmall">{L_NEW_POSTS_LOCKED}</td>
				<td>&nbsp;&nbsp;</td>
				<td class="gensmall"><img src="{FOLDER_LOCKED_IMG}" aForums-left="{L_NO_NEW_POSTS_TOPIC_LOCKED}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS_LOCKED}</td>
			</tr>
		</table></td>
		<td class="row1" align="right"><span class="gensmall">{S_AUTH_LIST}</span></td>
	</tr>
</table>
</td>
    <td background="themes/Core/images/forums/Forums-right.gif"><img name="Forums-right" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
  </tr>
  <tr>
   <td><img name="Forums-bottom_left" src="themes/Core/images/forums/Forums-bottom_left.gif" WIDTH=15 HEIGHT=15 border="0" aForums-left=""></td>
    <td background="themes/Core/images/forums/Forums-bottom_middle.gif"><img name="Forums-bottom_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-bottom_right" src="themes/Core/images/forums/Forums-bottom_right.gif" WIDTH=15 HEIGHT=15 border="0" aForums-left=""></td>
  </tr></table>