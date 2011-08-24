
<form action="{S_GROUPCP_ACTION}" method="post">
  <div align="center">
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
      <tr> 
        <td align="left" class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a><br>
        </td>
      </tr>
    </table>
  </div>
  <div align="center">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tr> 
        <td width="26"><img src="themes/XPSilver/forums/images/up-left2.gif" alt="" border="0"></td>
        <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%"><span class="topframe">{L_GROUP_INFORMATION}</span></td>
        <td> 
          <div align="right"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></div>
        </td>
      </tr>
      <tr> 
        <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
        <td width="1216"> 
          <table width="100%" cellspacing="1" cellpadding="4" border="0" bgcolor="{T_TR_COLOR3}">
            <tr> 
              <td class="row1"><span class="gen">{L_GROUP_NAME}:</span></td>
              <td class="row2"><span class="gen"><b>{GROUP_NAME}</b></span></td>
            </tr>
            <tr> 
              <td class="row1"><span class="gen">{L_GROUP_DESC}:</span></td>
              <td class="row2"><span class="gen">{GROUP_DESC}</span></td>
            </tr>
            <tr> 
              <td class="row1"><span class="gen">{L_GROUP_MEMBERSHIP}:</span></td>
              <td class="row2"><span class="gen">{GROUP_DETAILS} &nbsp;&nbsp; 
                <!-- BEGIN switch_subscribe_group_input -->
                <input class="mainoption" type="submit" name="joingroup" value="{L_JOIN_GROUP}" />
                <!-- END switch_subscribe_group_input -->
                <!-- BEGIN switch_unsubscribe_group_input -->
                <input class="mainoption" type="submit" name="unsub" value="{L_UNSUBSCRIBE_GROUP}" />
                <!-- END switch_unsubscribe_group_input -->
                </span></td>
            </tr>
            <!-- BEGIN switch_mod_option -->
            <tr> 
              <td class="row1"><span class="gen">{L_GROUP_TYPE}:</span></td>
              <td class="row2"><span class="gen"><span class="gen">
                <input type="radio" name="group_type" value="{S_GROUP_OPEN_TYPE}" {S_GROUP_OPEN_CHECKED} />
                {L_GROUP_OPEN} &nbsp;&nbsp;
                <input type="radio" name="group_type" value="{S_GROUP_CLOSED_TYPE}" {S_GROUP_CLOSED_CHECKED} />
                {L_GROUP_CLOSED} &nbsp;&nbsp;
                <input type="radio" name="group_type" value="{S_GROUP_HIDDEN_TYPE}" {S_GROUP_HIDDEN_CHECKED} />
                {L_GROUP_HIDDEN} &nbsp;&nbsp; 
                <input class="mainoption" type="submit" name="groupstatus" value="{L_UPDATE}" />
                </span></span></td>
            </tr>
            <!-- END switch_mod_option -->
          </table>
        </td>
        <td class="row1" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
      </tr>
      <tr> 
        <td class="row1" background="themes/XPSilver/forums/images/down2.gif" width="26"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
        <td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" width="1216">&nbsp;</td>
        <td class="row1" width="10"> 
          <div align="right"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></div>
        </td>
      </tr>
    </table>
    {S_HIDDEN_FIELDS} </div>
</form>
<form action="{S_GROUPCP_ACTION}" method="post" name="post">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		
      <td width="26" height="25"><img src="themes/XPSilver/forums/images/up-left2.gif" alt="" border="0"></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="251"><span class="topframe">{L_PM}</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="185"><span class="topframe">{L_USERNAME}</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="148"><span class="topframe">{L_POSTS}</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="149"><span class="topframe">{L_FROM}</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="186"><span class="topframe">{L_EMAIL}</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="183"><span class="topframe">{L_WEBSITE}</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25" width="114"><span class="topframe">{L_SELECT}</span></td>
		
      <td> 
        <div align="right"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></div>
      </td>
	</tr>
	<tr>
		
      <td class="row3" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
		<td class="row3" colspan="7">
        <div align="center"><span class="cattitle">{L_GROUP_MODERATOR}</span></div>
      </td>
		
      <td class="row3" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
	</tr>
	<tr>
	  <td class="row2" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
	  <td class="row2" align="center" width="251"> {MOD_PM_IMG} </td>
	  <td class="row2" align="center" width="185"><span class="gen"><a href="{U_MOD_VIEWPROFILE}" class="gen"><font size="1">{MOD_USERNAME}</font></a></span></td>
	  <td class="row2" align="center" valign="middle" width="148"><span class="gen">{MOD_POSTS}</span></td>
	  <td class="row2" align="center" valign="middle" width="149"><span class="gen">{MOD_FROM}</span></td>
	  <td class="row2" align="center" valign="middle" width="186"><span class="gen">{MOD_EMAIL_IMG}</span></td>
	  <td class="row2" align="center" width="183">{MOD_WWW_IMG}</td>
	  <td class="row2" align="center">&nbsp; </td>
	  <td class="row2" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
	</tr>
	<tr>
	  <td class="row3" background="themes/XPSilver/forums/images/left2.gif" width="26" height="9">&nbsp;</td>
	  <td class="row3" colspan="7" height="9" width="100%">
        <div align="center"><span class="cattitle">{L_GROUP_MEMBERS}</span></div>
      </td>
	  <td class="row3" background="themes/XPSilver/forums/images/right2.gif" width="10" height="9">&nbsp;</td>
	</tr>
	<!-- BEGIN member_row -->
	<tr>
	  <td class="{member_row.ROW_CLASS}" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
	  <td class="{member_row.ROW_CLASS}" align="center" width="251"> {member_row.PM_IMG} 
      </td>
	  <td class="{member_row.ROW_CLASS}" align="center" width="185"><span class="gen"><a href="{member_row.U_VIEWPROFILE}" class="gen"><font size="1">{member_row.USERNAME}</font></a></span></td>
	  <td class="{member_row.ROW_CLASS}" align="center" width="148"><span class="gen">{member_row.POSTS}</span></td>
	  <td class="{member_row.ROW_CLASS}" align="center" width="149"><span class="gen"> 
        {member_row.FROM} </span></td>
	  <td class="{member_row.ROW_CLASS}" align="center" valign="middle" width="186"><span class="gen">{member_row.EMAIL_IMG}</span></td>
	  <td class="{member_row.ROW_CLASS}" align="center" width="183"> {member_row.WWW_IMG}</td>
	  <td class="{member_row.ROW_CLASS}" align="center" width="114"> 
        <!-- BEGIN switch_mod_option -->
        <input type="checkbox" name="members[]" value="{member_row.USER_ID}" />
	  <!-- END switch_mod_option -->
	  </td>
	  <td class="{member_row.ROW_CLASS}" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
	</tr>
	<!-- END member_row -->
	<!-- BEGIN switch_no_members -->
	<tr>
	  <td class="row2" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
	  <td class="row2" colspan="7" align="center"><span class="gen">{L_NO_MEMBERS}</span></td>
	  <td class="row2" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
	</tr>
	<!-- END switch_no_members -->

	<!-- BEGIN switch_hidden_group -->
	<tr>
	  <td class="row2" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
	  <td class="row2" colspan="7" align="center"><span class="gen">{L_HIDDEN_MEMBERS}</span></td>
	  <td class="row2" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
	</tr>
	<!-- END switch_hidden_group -->

	<!-- BEGIN switch_mod_option -->
	<tr>
		
      <td class="row3" background="themes/XPSilver/forums/images/left2.gif" width="26" height="19">&nbsp;</td>
		
      <td class="row3" colspan="7" align="right" height="19"><span class="cattitle"> 
        <input type="submit" name="remove" value="{L_REMOVE_SELECTED}" class="mainoption" />
		</span></td>
		
      <td class="row3" background="themes/XPSilver/forums/images/right2.gif" width="10" height="19">&nbsp;</td>
	</tr>
	<!-- END switch_mod_option -->
	
	<tr>
		
      <td class="row3" width="26" height="2" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
		
      <td class="row3" colspan="7" background="themes/XPSilver/forums/images/down2.gif" align="center" height="2">&nbsp;</td>
		
      <td class="row3" width="10" height="2"> 
        <div align="right"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></div>
      </td>
	</tr>
</table>

<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
		<td align="left" valign="top">
		<!-- BEGIN switch_mod_option -->
		<span class="genmed"><input type="text"  class="post" name="username" maxlength="50" size="20" /> <input type="submit" name="add" value="{L_ADD_MEMBER}" class="mainoption" /> <input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></span><br /><br />
		<!-- END switch_mod_option -->
		<span class="nav">{PAGE_NUMBER}</span></td>
		<td align="right" valign="top"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span></td>
	</tr>
</table>

{PENDING_USER_BOX}

{S_HIDDEN_FIELDS}</form>

<table width="100%" cellspacing="2" border="0" align="center">
  <tr>
	<td valign="top" align="right">{JUMPBOX}</td>
  </tr>
</table>
