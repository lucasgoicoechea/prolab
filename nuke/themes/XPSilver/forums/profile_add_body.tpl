
<form action="{S_PROFILE_ACTION}" {S_FORM_ENCTYPE} method="post">

{ERROR_BOX}

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr>
		<td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
	</tr>
</table>

    <table border="0" cellspacing="0" cellpadding="0" width="100%">
    	<tr>
    		
      <td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left7.gif" alt="" border="0" width="26" height="30"></td>
    		<td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%" height="25" colspan="2"><span class="topframe">{L_REGISTRATION_INFO}</span></td>
   			
      <td class="row1"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
   		</tr>
    	<tr>
    		
      <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="15" bgcolor="E0E2EB">&nbsp;</td>
			<td class="row1" colspan="2">
			
        <table border="1" cellspacing="0" cellpadding="0" width="100%" bgcolor="{T_TR_COLOR3}" bordercolor="FBFBFD">
          <tr>
					<td class="row1" width="55%"><span class="gensmall">{L_ITEMS_REQUIRED}</span></td>
					<td class="row1" width="45%">&nbsp;</td>
				</tr>
				<tr>
					<td class="row2" width="38%"><span class="gen">{L_USERNAME}: *</span></td>
					<td class="row2"><input type="text" class="post" style="width:200px" name="username" size="25" maxlength="40" value="{USERNAME}" /></td>
				</tr>
				<tr>
					<td class="row3"><span class="gen">{L_EMAIL_ADDRESS}: *</span></td>
					<td class="row3"><input type="text" class="post" style="width:200px" name="email" size="25" maxlength="255" value="{EMAIL}" /></td>
				</tr>
			<!-- BEGIN switch_edit_profile -->
				<tr>
					<td class="row2"><span class="gen">{L_CURRENT_PASSWORD}: *</span><br />
						<span class="gensmall">{L_CONFIRM_PASSWORD_EXPLAIN}</span></td>
					<td class="row2">
						<input type="password" class="post" style="width: 200px" name="cur_password" size="25" maxlength="100" value="{PASSWORD}" />
					</td>
				</tr>
			<!-- END switch_edit_profile -->
				<tr>
					<td class="row3"><span class="gen">{L_NEW_PASSWORD}: *</span><br />
						<span class="gensmall">{L_PASSWORD_IF_CHANGED}</span></td>
					<td class="row3">
						<input type="password" class="post" style="width: 200px" name="new_password" size="25" maxlength="100" value="{PASSWORD}" />
					</td>
				</tr>
				<tr>
					<td class="row2"><span class="gen">{L_CONFIRM_PASSWORD}: * </span><br />
						<span class="gensmall">{L_PASSWORD_CONFIRM_IF_CHANGED}</span></td>
					<td class="row2">
						<input type="password" class="post" style="width: 200px" name="password_confirm" size="25" maxlength="100" value="{PASSWORD_CONFIRM}" />
					</td>
				</tr>
			</table>
			</td>
    		<td class="row1" background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
    	</tr>
		<tr>
			
      <td class="row1" width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
			<td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" colspan="2">&nbsp;</td>
    		
      <td class="row1"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
    	</tr>
		<tr>
			<td align="center" height="15" colspan="4">&nbsp;</td>
    	</tr>
    	<tr>
			
      <td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left7.gif" alt="" border="0" width="26" height="30"></td>
			<td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%" height="25" colspan="2"><span class="topframe">{L_PROFILE_INFO}</span></td>
			
      <td class="row1"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
   		</tr>

    	<tr>
    		
      <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="15" bgcolor="E0E2EB">&nbsp;</td>
    		<td class="row1" colspan="2">
				
        <table border="1" cellspacing="0" cellpadding="0" width="100%" bgcolor="{T_TR_COLOR3}" bordercolor="FBFBFD">
          <tr>
					 	<td class="row1" width="55%"><span class="gensmall">{L_PROFILE_INFO_NOTICE}</span></td>
						<td class="row1" width="45%">&nbsp;</td>
    				</tr>
					<tr>
						<td class="row2"><span class="gen">{L_ICQ_NUMBER}:</span></td>
						<td class="row2">
							<input type="text" name="icq" class="post"style="width: 100px"  size="10" maxlength="15" value="{ICQ}" />
						</td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_AIM}:</span></td>
						<td class="row3">
							<input type="text" class="post"style="width: 150px"  name="aim" size="20" maxlength="255" value="{AIM}" />
						</td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_MESSENGER}:</span></td>
						<td class="row2">
							<input type="text" class="post"style="width: 150px"  name="msn" size="20" maxlength="255" value="{MSN}" />
						</td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_YAHOO}:</span></td>
						<td class="row3">
							<input type="text" class="post"style="width: 150px"  name="yim" size="20" maxlength="255" value="{YIM}" />
						</td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_WEBSITE}:</span></td>
						<td class="row2">
							<input type="text" class="post"style="width: 200px"  name="website" size="25" maxlength="255" value="{WEBSITE}" />
						</td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_LOCATION}:</span></td>
						<td class="row3"><input type="text" class="post"style="width: 200px" name="location" size="35" maxlength="100" value="{LOCATION}" /></td>
						</td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_OCCUPATION}:</span></td>
						<td class="row2">
							<input type="text" class="post"style="width: 200px"  name="occupation" size="25" maxlength="100" value="{OCCUPATION}" />
						</td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_INTERESTS}:</span></td>
						<td class="row3">
							<input type="text" class="post"style="width: 200px"  name="interests" size="35" maxlength="150" value="{INTERESTS}" />
						</td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_SIGNATURE}:</span><br /><span class="gensmall">{L_SIGNATURE_EXPLAIN}<br /><br />{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>
						<td class="row2">
							<textarea name="signature"style="width: 300px"  rows="6" cols="30" class="post">{SIGNATURE}</textarea>
						</td>
					</tr>
				</table>
			</td>
    		<td class="row1" background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
    	</tr>
		<tr>
			
      <td class="row1" width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
			<td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" colspan="2">&nbsp;</td>
    		
      <td class="row1"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
    	</tr>
    	<tr>
			<td align="center" height="15" colspan="4">&nbsp;</td>
    	</tr>
    	<tr>
			
      <td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left7.gif" alt="" border="0" width="26" height="30"></td>
			<td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%" height="25" colspan="2"><span class="topframe">{L_PREFERENCES}</span></td>
			
      <td class="row1"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
   		</tr>
   		<tr>
   			
      <td class="row1" background="themes/XPSilver/forums/images/left2.gif" bgcolor="E0E2EB">&nbsp;</td>
    		<td class="row1" colspan="2">
				
        <table border="1" cellspacing="0" cellpadding="0" width="100%" bgcolor="{T_TR_COLOR3}" bordercolor="FBFBFD">
          <tr>
						<td class="row2" width="55%"><span class="gen">{L_PUBLIC_VIEW_EMAIL}:</span></td>
						<td class="row2" width="45%">
							<input type="radio" name="viewemail" value="1" {VIEW_EMAIL_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="viewemail" value="0" {VIEW_EMAIL_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_HIDE_USER}:</span></td>
						<td class="row3">
							<input type="radio" name="hideonline" value="1" {HIDE_USER_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="hideonline" value="0" {HIDE_USER_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						
            <td class="row2" height="39"><span class="gen">{L_NOTIFY_ON_REPLY}:</span><br />
							<span class="gensmall">{L_NOTIFY_ON_REPLY_EXPLAIN}</span></td>
						
            <td class="row2" height="39"> 
              <input type="radio" name="notifyreply" value="1" {NOTIFY_REPLY_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="notifyreply" value="0" {NOTIFY_REPLY_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_NOTIFY_ON_PRIVMSG}:</span></td>
						<td class="row3">
							<input type="radio" name="notifypm" value="1" {NOTIFY_PM_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="notifypm" value="0" {NOTIFY_PM_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_POPUP_ON_PRIVMSG}:</span><br /><span class="gensmall">{L_POPUP_ON_PRIVMSG_EXPLAIN}</span></td>
						<td class="row2">
							<input type="radio" name="popup_pm" value="1" {POPUP_PM_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="popup_pm" value="0" {POPUP_PM_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_ALWAYS_ADD_SIGNATURE}:</span></td>
						<td class="row3">
							<input type="radio" name="attachsig" value="1" {ALWAYS_ADD_SIGNATURE_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="attachsig" value="0" {ALWAYS_ADD_SIGNATURE_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_ALWAYS_ALLOW_BBCODE}:</span></td>
						<td class="row2">
							<input type="radio" name="allowbbcode" value="1" {ALWAYS_ALLOW_BBCODE_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="allowbbcode" value="0" {ALWAYS_ALLOW_BBCODE_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_ALWAYS_ALLOW_HTML}:</span></td>
						<td class="row3">
							<input type="radio" name="allowhtml" value="1" {ALWAYS_ALLOW_HTML_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="allowhtml" value="0" {ALWAYS_ALLOW_HTML_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_ALWAYS_ALLOW_SMILIES}:</span></td>
						<td class="row2">
							<input type="radio" name="allowsmilies" value="1" {ALWAYS_ALLOW_SMILIES_YES} />
							<span class="gen">{L_YES}</span>&nbsp;&nbsp;
							<input type="radio" name="allowsmilies" value="0" {ALWAYS_ALLOW_SMILIES_NO} />
							<span class="gen">{L_NO}</span></td>
					</tr>
					<tr>

						<td class="row3"><span class="gen">{L_BOARD_LANGUAGE}:</span></td>
						<td class="row3"><span class="gensmall">{LANGUAGE_SELECT}</span></td>
					</tr>
					<tr>
						<td class="row3"><span class="gen">{L_TIMEZONE}:</span></td>
						<td class="row3"><span class="gensmall">{TIMEZONE_SELECT}</span></td>
					</tr>
					<tr>
						<td class="row2"><span class="gen">{L_DATE_FORMAT}:</span><br />
							<span class="gensmall">{L_DATE_FORMAT_EXPLAIN}</span></td>
						<td class="row2">
							<input type="text" name="dateformat" value="{DATE_FORMAT}" maxlength="14" class="post" />
						</td>
					</tr>
				</table>
			</td>
    		<td class="row1" background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
    	</tr>
		<tr>
			
      <td class="row1" width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
			<td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" colspan="2">&nbsp;</td>
    		
      <td class="row1"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
    	</tr>
		<tr>
			<td align="center" height="15" colspan="4">&nbsp;</td>
		</tr>
		<tr>
			
      <td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left7.gif" alt="" border="0" width="26" height="30"></td>
			<td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%" height="25" colspan="2"><span class="topframe">{L_AVATAR_PANEL}</span></td>
			
      <td class="row1"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
		</tr>
   		<tr>
   			
      <td class="row1" background="themes/XPSilver/forums/images/left2.gif" bgcolor="E0E2EB">&nbsp;</td>
    		<td class="row1" colspan="2">
				
        <table border="1" cellspacing="0" cellpadding="0" width="100%" bgcolor="{T_TR_COLOR3}" bordercolor="FBFBFD">
          <!-- BEGIN switch_avatar_block -->
          <tr>
						<td class="row1" width="55%"><span class="gensmall">{L_AVATAR_EXPLAIN}</span></td>
						<td class="row1" width="45%" align="center"><span class="gensmall">{L_CURRENT_IMAGE}</span><br />{AVATAR}<br /><input type="checkbox" name="avatardel" />&nbsp;<span class="gensmall">{L_DELETE_AVATAR}</span></td>
					</tr>
					<!-- BEGIN switch_avatar_local_upload -->
					<tr>
						<td class="row2"><span class="gen">{L_UPLOAD_AVATAR_FILE}:</span></td>
						<td class="row2"><input type="hidden" name="MAX_FILE_SIZE" value="{AVATAR_SIZE}" /><input type="file" name="avatar" class="post" style="width:200px" /></td>
					</tr>
					<!-- END switch_avatar_local_upload -->
					<!-- BEGIN switch_avatar_remote_upload -->
					<tr>
						<td class="row3"><span class="gen">{L_UPLOAD_AVATAR_URL}:</span><br /><span class="gensmall">{L_UPLOAD_AVATAR_URL_EXPLAIN}</span></td>
						<td class="row3"><input type="text" name="avatarurl" size="40" class="post" style="width:200px" /></td>
					</tr>
					<!-- END switch_avatar_remote_upload -->
					<!-- BEGIN switch_avatar_remote_link -->
					<tr>
						<td class="row2"><span class="gen">{L_LINK_REMOTE_AVATAR}:</span><br /><span class="gensmall">{L_LINK_REMOTE_AVATAR_EXPLAIN}</span></td>
						<td class="row2"><input type="text" name="avatarremoteurl" size="40" class="post" style="width:200px" /></td>
					</tr>
					<!-- END switch_avatar_remote_link -->
					<!-- BEGIN switch_avatar_local_gallery -->
					<tr>
						<td class="row3"><span class="gen">{L_AVATAR_GALLERY}:</span></td>
						<td class="row3"><input type="submit" name="avatargallery" value="{L_SHOW_GALLERY}" class="liteoption" /></td>
					</tr>
					<!-- END switch_avatar_local_gallery -->
					<!-- END switch_avatar_block -->
					<tr>
						<td class="row2" colspan="2" align="center" height="28">{S_HIDDEN_FIELDS}<input type="submit" name="submit" value="{L_SUBMIT}" class="mainoption" />&nbsp;&nbsp;<input type="reset" value="{L_RESET}" name="reset" class="liteoption" /></td>
					</tr>
				</table>
			</td>
			<td class="row1" background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
		</tr>
		<tr>
			
      <td class="row1" width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
			<td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" colspan="2">&nbsp;</td>
    		
      <td class="row1"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
    	</tr>
    </table>

</form>
