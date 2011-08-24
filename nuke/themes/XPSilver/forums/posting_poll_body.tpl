
<br />
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td class="row1" width="15" height="25"><img src="themes/XPSilver/forums/images/up-left2.gif" alt="" border="0"></td>
		<td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" width="100%" height="25"><span class="topframe">{L_ADD_A_POLL}</span></td>
		
    <td class="row1"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></td>
	</tr>
	<tr>
		<td class="row1" background="themes/XPSilver/forums/images/left2.gif">&nbsp;</td>
		<td>
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
				<tr>
					<td class="row1" colspan="2"><span class="gensmall">{L_ADD_POLL_EXPLAIN}</span></td>
				</tr>
				<tr>
					<td class="row1"><span class="gen"><b>{L_POLL_QUESTION}</b></span></td>
					<td class="row1"><span class="genmed"><input type="text" name="poll_title" size="50" maxlength="255" class="post" value="{POLL_TITLE}" /></span></td>
				</tr>
				<!-- BEGIN poll_option_rows -->
				<tr>
					<td class="row1"><span class="gen"><b>{L_POLL_OPTION}</b></span></td>
					<td class="row1"><span class="genmed"><input type="text" name="poll_option_text[{poll_option_rows.S_POLL_OPTION_NUM}]" size="50" class="post" maxlength="255" value="{poll_option_rows.POLL_OPTION}" /></span> &nbsp;<input type="submit" name="edit_poll_option" value="{L_UPDATE_OPTION}" class="liteoption" /> <input type="submit" name="del_poll_option[{poll_option_rows.S_POLL_OPTION_NUM}]" value="{L_DELETE_OPTION}" class="liteoption" /></td>
				</tr>
				<!-- END poll_option_rows -->
				<tr>
					<td class="row1"><span class="gen"><b>{L_POLL_OPTION}</b></span></td>
					<td class="row1"><span class="genmed"><input type="text" name="add_poll_option_text" size="50" maxlength="255" class="post" value="{ADD_POLL_OPTION}" /></span> &nbsp;<input type="submit" name="add_poll_option" value="{L_ADD_OPTION}" class="liteoption" /></td>
				</tr>
				<tr>
					<td class="row1"><span class="gen"><b>{L_POLL_LENGTH}</b></span></td>
					<td class="row1"><span class="genmed"><input type="text" name="poll_length" size="3" maxlength="3" class="post" value="{POLL_LENGTH}" /></span>&nbsp;<span class="gen"><b>{L_DAYS}</b></span> &nbsp; <span class="gensmall">{L_POLL_LENGTH_EXPLAIN}</span></td>
				</tr>
				<!-- BEGIN switch_poll_delete_toggle -->
				<tr>
					<td class="row1"><span class="gen"><b>{L_POLL_DELETE}</b></span></td>
					<td class="row1"><input type="checkbox" name="poll_delete" /></td>
				</tr>
				<!-- END switch_poll_delete_toggle -->
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
