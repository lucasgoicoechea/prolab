<br clear="all" />
		<table border="0" cellspacing="0" cellpadding="0" align="center">
		  <tr>
			<td width="15" height="25"><img src="themes/XPSilver/forums/images/up-left2.gif" alt="" border="0"></td>
			<td background="themes/XPSilver/forums/images/up2.gif" align="center" height="25">&nbsp;</td>
			
    <td><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
		  </tr>
		  <tr>
			<td background="themes/XPSilver/forums/images/left2.gif" width="15">&nbsp;</td>
			<td valign="top" align="center">
			  <table height="40" cellspacing="2" cellpadding="2" border="0">
				<tr valign="middle">
				  <td>{INBOX_IMG}</td>
				  <td><span class="cattitle">{INBOX} &nbsp;</span></td>
				  <td>{SENTBOX_IMG}</td>
				  <td><span class="cattitle">{SENTBOX} &nbsp;</span></td>
				  <td>{OUTBOX_IMG}</td>
				  <td><span class="cattitle">{OUTBOX} &nbsp;</span></td>
				  <td>{SAVEBOX_IMG}</td>
				  <td><span class="cattitle">{SAVEBOX} &nbsp;</span></td>
				</tr>
			  </table>
			</td>
			<td background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
		  </tr>
		  <tr>
			
    <td width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
			<td background="themes/XPSilver/forums/images/down2.gif" align="center" height="15">&nbsp;</td>
			
    <td><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
		  </tr>
		</table>

<br clear="all" />

<form method="post" action="{S_PRIVMSGS_ACTION}">
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr>
	  <td valign="middle">{REPLY_PM_IMG}</td>
	  <td width="100%"><span class="nav">&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" align="center" width="100%">
  <tr>
	<td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left2.gif" alt="" border="0"></td>
	<td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" height="25"><span class="topframe">{BOX_NAME} :: {POST_SUBJECT}</span></td>
	<td class="row1" width="15"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
  </tr>
  <tr>
	<td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="15">&nbsp;</td>
	<td class="row1" valign="top" align="center">
		<table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="#F0F1F5">
          <tr>
			  <td class="row2"><span class="genmed">{L_FROM}:</span></td>
			  <td width="100%" class="row2" colspan="2"><span class="genmed">{MESSAGE_FROM}</span></td>
			</tr>
			<tr>
			  <td class="row3"><span class="genmed">{L_TO}:</span></td>
			  <td width="100%" class="row3" colspan="2"><span class="genmed">{MESSAGE_TO}</span></td>
			</tr>
			<tr>
			  <td class="row2"><span class="genmed">{L_POSTED}:</span></td>
			  <td width="100%" class="row2" colspan="2"><span class="genmed">{POST_DATE}</span></td>
			</tr>
			<tr>
			  <td class="row3"><span class="genmed">{L_SUBJECT}:</span></td>
			  <td width="100%" class="row3"><span class="genmed">{POST_SUBJECT}</span></td>
			  <td nowrap class="row3" align="right"> {QUOTE_PM_IMG} {EDIT_PM_IMG}</td>
			</tr>
			<tr>
			  <td valign="top" colspan="3" class="row1"><span class="postbody">{MESSAGE}</span></td>
			</tr>
			<tr>
			  <td width="78%" height="28" valign="bottom" colspan="3" class="row2">
				<table cellspacing="0" cellpadding="0" border="0" height="18">
				  <tr>
					<td valign="middle" nowrap>{PROFILE_IMG} {PM_IMG} {EMAIL_IMG}
					  {WWW_IMG} {AIM_IMG} {YIM_IMG} {MSN_IMG}</td><td>&nbsp;</td><td valign="top" nowrap><script language="JavaScript" type="text/javascript"><!--

				if ( navigator.userAgent.toLowerCase().indexOf('mozilla') != -1 && navigator.userAgent.indexOf('5.') == -1 )
					document.write('{ICQ_IMG}');
				else
					document.write('<div style="position:relative"><div style="position:absolute">{ICQ_IMG}</div><div style="position:absolute;left:3px">{ICQ_STATUS_IMG}</div></div>');

				  //--></script><noscript>{ICQ_IMG}</noscript></td>
				  </tr>
				</table>
			  </td>
			</tr>
			<tr>
			  <td class="row3" colspan="3" height="28" align="right"> {S_HIDDEN_FIELDS}
				<input type="submit" name="save" value="{L_SAVE_MSG}" class="liteoption" />
				&nbsp;
				<input type="submit" name="delete" value="{L_DELETE_MSG}" class="liteoption" />
			  </td>
			</tr>
		</table>
	</td>
	<td class="row1" background="themes/XPSilver/forums/images/right2.gif">&nbsp;</td>
  </tr>
  <tr>
	  <td class="row1" width="15" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
	<td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="15">&nbsp;</td>
	  <td class="row1"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></td>
  </tr>
</table>

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr>
	  <td>{REPLY_PM_IMG}</td>
	  <td align="right" valign="top"><span class="gensmall">{S_TIMEZONE}</span></td>
	</tr>
  </table>
</form>

<table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
  <tr>
	<td valign="top" align="right"><span class="gensmall">{JUMPBOX}</span></td>
  </tr>
</table>
