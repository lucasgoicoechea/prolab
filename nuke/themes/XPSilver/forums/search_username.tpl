
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
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr> 
    <td class="row1" width="26" height="29"><img src="themes/XPSilver/forums/images/up-left4.gif" alt="" border="0" width="26" height="30"></td>
    <td class="row1" background="themes/XPSilver/forums/images/up2.gif" align="center" height="29" width="100%">&nbsp;</td>
    <td class="row1" width="10" height="29"> 
      <div align="right"><img src="themes/XPSilver/forums/images/up-right2.gif" alt="" border="0"></div>
    </td>
  </tr>
  <tr> 
    <td class="row1" background="themes/XPSilver/forums/images/left2.gif" width="26">&nbsp;</td>
    <td class="row1" width="972"> 
      <div align="center">
        <form method="post" name="search" action="{S_SEARCH_ACTION}">
          <table width="100%" border="0" cellspacing="0" cellpadding="10" bgcolor="{T_TR_COLOR2}">
            <tr> 
              <td>
                <table width="100%" cellpadding="4" cellspacing="1" border="0">
                  <tr> 
                    <td>{L_SEARCH_USERNAME}</td>
                  </tr>
                  <tr> 
                    <td valign="top" class="row1"><span class="genmed"><br />
                      <input type="text" name="search_username" class="post" value="{USERNAME}" />
                      &nbsp; </span>
                      <input type="submit" class="button" name="search" value="{L_SEARCH}" />
                      <br />
                      <span class="gensmall">{L_SEARCH_EXPLAIN}</span><br />
                      <!-- BEGIN switch_select_name -->
                      {L_UPDATE_USERNAME}<br />
                      <select name="username_list">{S_USERNAME_OPTIONS}
                      </select>
                      &nbsp; 
                      <input type="submit" class="button" onClick="refresh_username(this.form.username_list.options[this.form.username_list.selectedIndex].value);return false;" name="use" value="{L_SELECT}" />
                      <br />
                      <!-- END switch_select_name -->
                      <br />
                      <span class="genmed"><a href="javascript:window.close();" class="genmed">{L_CLOSE_WINDOW}</a></span></td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </form>
      </div>
      <div align="center"></div>
    </td>
    <td class="row1" background="themes/XPSilver/forums/images/right2.gif" width="10">&nbsp;</td>
  </tr>
  <tr> 
    <td class="row1" width="26" height="15" background="themes/XPSilver/forums/images/down2.gif"><img src="themes/XPSilver/forums/images/down-left2.gif" alt="" border="0"></td>
    <td class="row1" background="themes/XPSilver/forums/images/down2.gif" align="center" height="15" width="100%">&nbsp;</td>
    <td class="row1" width="10" height="15" background="themes/XPSilver/forums/images/down2.gif"> 
      <div align="right"><img src="themes/XPSilver/forums/images/down-right2.gif" alt="" border="0"></div>
    </td>
  </tr>
</table>
