<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
<form action="{S_PROFILE_ACTION}" method="post">

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">

  <tr> 

	<td align="left"><span class="nav"><a href="{U_INDEX}" class="nav">{L_INDEX}</a></span></td>

  </tr>

</table>



<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">

	<tr> 

	  <th class="thHead" colspan="{S_COLSPAN}" height="25" valign="middle">{L_AVATAR_GALLERY}</th>

	</tr>

	<tr> 

	  <td class="catBottom" align="center" valign="middle" colspan="6" height="28"><span class="genmed">{L_CATEGORY}:&nbsp;{S_CATEGORY_SELECT}&nbsp;<input type="submit" class="liteoption" value="{L_GO}" name="avatargallery" /></span></td>

	</tr>

	<!-- BEGIN avatar_row -->

	<tr> 

	<!-- BEGIN avatar_column -->

		<td class="row1" align="center"><img src="{avatar_row.avatar_column.AVATAR_IMAGE}" aForums-left="{avatar_row.avatar_column.AVATAR_NAME}" title="{avatar_row.avatar_column.AVATAR_NAME}" /></td>

	<!-- END avatar_column -->

	</tr>

	<tr>

	<!-- BEGIN avatar_option_column -->

		<td class="row2" align="center"><input type="radio" name="avatarselect" value="{avatar_row.avatar_option_column.S_OPTIONS_AVATAR}" /></td>

	<!-- END avatar_option_column -->

	</tr>



	<!-- END avatar_row -->

	<tr> 

	  <td class="catBottom" colspan="{S_COLSPAN}" align="center" height="28">{S_HIDDEN_FIELDS} 

		<input type="submit" name="submitavatar" value="{L_SELECT_AVATAR}" class="mainoption" />

		&nbsp;&nbsp; 

		<input type="submit" name="cancelavatar" value="{L_RETURN_PROFILE}" class="liteoption" />

	  </td>

	</tr>

  </table>

</form>
</td>
    <td background="themes/Core/images/forums/Forums-right.gif"><img name="Forums-right" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
  </tr>
  <tr>
   <td><img name="Forums-bottom_left" src="themes/Core/images/forums/Forums-bottom_left.gif" WIDTH=15 HEIGHT=15 border="0" aForums-left=""></td>
    <td background="themes/Core/images/forums/Forums-bottom_middle.gif"><img name="Forums-bottom_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-bottom_right" src="themes/Core/images/forums/Forums-bottom_right.gif" WIDTH=15 HEIGHT=15 border="0" aForums-left=""></td>
  </tr></table>