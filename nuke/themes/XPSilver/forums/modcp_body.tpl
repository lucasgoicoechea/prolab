
<form method="post" action="{S_MODCP_ACTION}">
  <div align="left"></div>
  <div align="left">
    <table width="95%" cellspacing="2" cellpadding="2" border="0" align="center">
      <tr> 
        <td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
          -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
      </tr>
    </table>
  </div>
  <table width="95%" cellpadding="4" cellspacing="1" border="0" class="forumline">
    <tr>
	  <td class="catHead" colspan="5" align="center" height="28"><span class="cattitle">{L_MOD_CP}</span>
	  </td>
	</tr>
	<tr>
	  <td class="spaceRow" colspan="5" align="center"><span class="gensmall">{L_MOD_CP_EXPLAIN}</span></td>
	</tr>
  </table>
  <div align="left"></div>
  <div align="left">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tr> 
        <td class="row1" width="1%" height="25"><img src="themes/XPSilver/forums/images/up-left9.gif" alt="" border="0" width="26" height="30"></td>
        <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="19%">&nbsp;</td>
        <td class="row2" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="34%"><span class="topframe">&nbsp;{L_TOPICS}&nbsp;</span></td>
        <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="13%"><span class="topframe">&nbsp;{L_REPLIES}&nbsp;</span></td>
        <td class="row2" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="21%"><span class="topframe">&nbsp;{L_LASTPOST}&nbsp;</span></td>
        <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="10%"><span class="topframe">&nbsp;{L_SELECT}&nbsp;</span></td>
        <td class="row1" width="2%"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
      </tr>
      <!-- BEGIN topicrow -->
      <tr> 
        <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="1%">&nbsp;</td>
        <td class="row1" align="center" valign="middle" width="19%"><img src="{topicrow.TOPIC_FOLDER_IMG}" width="19" height="18" alt="{topicrow.L_TOPIC_FOLDER_ALT}" title="{topicrow.L_TOPIC_FOLDER_ALT}" /></td>
        <td class="row2" width="34%">&nbsp;<span class="topictitle">{topicrow.TOPIC_TYPE}<a href="{topicrow.U_VIEW_TOPIC}" class="topictitle">{topicrow.TOPIC_TITLE}</a></span></td>
        <td class="row1" align="center" valign="middle" width="13%"><span class="postdetails">{topicrow.REPLIES}</span></td>
        <td class="row2" align="center" valign="middle" width="21%"><span class="postdetails">{topicrow.LAST_POST_TIME}</span></td>
        <td class="row1" align="center" valign="middle" width="10%"> 
          <input type="checkbox" name="topic_id_list[]" value="{topicrow.TOPIC_ID}" />
        </td>
        <td class="row1" width="2%" background="themes/XPSilver/forums/images/right2.gif"></td>
      </tr>
      <tr height="1"> 
        <td class="row3" background="themes/XPSilver/forums/images/left2.gif" width="1%" height="1"></td>
        <td class="row3" colspan="5" height="1"></td>
        <td class="row3" background="themes/XPSilver/forums/images/right2.gif" width="2%" height="1"></td>
      </tr>
      <!-- END topicrow -->
      <tr> 
        <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="1%" align="right" height="31">&nbsp;</td>
        <td class="row1" width="19%" align="right" height="31">&nbsp;</td>
        <td class="row2" width="34%" align="right" height="31">&nbsp;</td>
        <td class="row1" width="13%" align="right" height="31">&nbsp;</td>
        <td class="row2" align ="middle" width="21%" height="31"> {S_HIDDEN_FIELDS} 
          <input type="submit" name="delete" class="liteoption" value="{L_DELETE}" />
          &nbsp; 
          <input type="submit" name="move" class="liteoption" value="{L_MOVE}" />
          &nbsp; 
          <input type="submit" name="lock" class="liteoption" value="{L_LOCK}" />
          &nbsp; 
          <input type="submit" name="unlock" class="liteoption" value="{L_UNLOCK}" />
        </td>
        <td class="row1" width="10%" align="right" height="31"></td>
        <td class="row1" width="2%" height="31" background="themes/XPSilver/forums/images/right2.gif"></td>
      </tr>
      <tr> 
        <td class="row1" width="1%" height="2" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
        <td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="2" width="19%"></td>
        <td class="row2" background="themes/XPSilver/forums/images/down2.gif" align="center" height="2" width="34%"></td>
        <td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="2" width="13%"></td>
        <td class="row2" background="themes/XPSilver/forums/images/down2.gif" align="center" height="2" width="21%"></td>
        <td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="2" width="10%"></td>
        <td class="row1" width="2%" height="2"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
      </tr>
    </table>
  </div>
  <table width="95%" cellspacing="2" border="0" align="center" cellpadding="2">
    <tr>
	<td align="left" valign="middle"><span class="nav">{PAGE_NUMBER}</span></td>
	<td align="right" valign="top" nowrap><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span></td>
  </tr>
</table>
</form>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td align="right">{JUMPBOX}</td>
  </tr>
</table>
