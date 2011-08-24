








































<script language="javascript" type="text/javascript">

<!--

function refresh_username(selected_username)

{

	opener.document.forms['post'].username.value = selected_username;

	opener.focus();

	window.close();

}

//-->

</script>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
<form method="post" name="search" action="{S_SEARCH_ACTION}">

<table width="100%" border="0" cellspacing="0" cellpadding="10">

	<tr>

		<td><table width="100%" class="forumline" cellpadding="4" cellspacing="1" border="0">

			<tr> 

				<th class="thHead" height="25">{L_SEARCH_USERNAME}</th>

			</tr>

			<tr> 

				<td valign="top" class="row1"><span class="genmed"><br /><input type="text" name="search_username" value="{USERNAME}" class="post" />&nbsp; <input type="submit" name="search" value="{L_SEARCH}" class="liteoption" /></span><br /><span class="gensmall">{L_SEARCH_EXPLAIN}</span><br />

				<!-- BEGIN switch_select_name -->

				<span class="genmed">{L_UPDATE_USERNAME}<br /><select name="username_list">{S_USERNAME_OPTIONS}</select>&nbsp; <input type="submit" class="liteoption" onClick="refresh_username(this.form.username_list.options[this.form.username_list.selectedIndex].value);return false;" name="use" value="{L_SELECT}" /></span><br />

				<!-- END switch_select_name -->

				<br /><span class="genmed"><a href="javascript:window.close();" class="genmed">{L_CLOSE_WINDOW}</a></span></td>

			</tr>

		</table></td>

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
