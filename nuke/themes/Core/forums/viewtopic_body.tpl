<script language="Javascript" type="text/javascript">
<!--
function create_icq_subsilver(icq_user_addr, icq_status_img, icq_add_img)
{
	if( icq_user_addr.length && icq_user_addr.indexOf("&nbsp;") == -1 )
	{
		document.write('<table width="59" border="0" cellspacing="0" cellpadding="0"><tr><td nowrap="nowrap" style=" background-image: url(\'' + icq_add_img + '\'); background-repeat: no-repeat"><img src="images/spacer.gif" width="3" height="18" alt = "">' + icq_status_img + '<a href="http://wwp.icq.com/scripts/search.dll?to=' + icq_user_addr + '"><img src="images/spacer.gif" width="35" height="18" border="0" alt="{L_ICQ_NUMBER}"></a></td></tr></table>');
	}
}
//-->
</script>
<br>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
        
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="right" valign="bottom" colspan="2"><a class="maintitle" href="{U_VIEW_TOPIC}">{TOPIC_TITLE}</a><br />
	  <span class="gensmall"><b>{PAGINATION}</b><br />
	  &nbsp; </span></td>
  </tr>
</table>
<table width="100%" cellspacing="2" cellpadding="2" border="0">
  <tr> 
	<td align="left" valign="bottom" nowrap="nowrap"><span class="nav"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" aForums-left="{L_POST_NEW_TOPIC}" align="middle" /></a>&nbsp;&nbsp;&nbsp;<a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" aForums-left="{L_POST_REPLY_TOPIC}" align="middle" /></a></span></td>
	<td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	  -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
  </tr>
</table>

<table width="100%" cellspacing="1" cellpadding="3" border="0">
	<tr align="right">
		<td class="storytitle" colspan="2" height="28"><span class="nav"><a href="{U_VIEW_OLDER_TOPIC}" class="nav">{L_VIEW_PREVIOUS_TOPIC}</a> :: <a href="{U_VIEW_NEWER_TOPIC}" class="nav">{L_VIEW_NEXT_TOPIC}</a> &nbsp;</span></td>
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
<table  width="100%" cellspacing="0" cellpadding="0" border=0>
	
	{POLL_DISPLAY} 
	
	</table>
	
	<!-- BEGIN postrow -->
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
	<table border=0 cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<th class="1" width="150" height="20" nowrap="nowrap">{L_AUTHOR}</th>
		<th class="1" nowrap="nowrap">{L_MESSAGE}</th>
	</tr>
	<tr> 
		<td width="150" align="left" valign="top" class="{postrow.ROW_CLASS}"><span class="gensmall"><a name="{postrow.U_POST_ID}"></a><b><a href="javascript:emoticon('[b]{postrow.POSTER_NAME}[/b], ')">{postrow.POSTER_NAME}</a></b></span><br /><span class="gensmall">{postrow.POSTER_RANK}<br />{postrow.RANK_IMAGE}{postrow.POSTER_AVATAR}<br /><br />{postrow.POSTER_JOINED}<br />{postrow.POSTER_POSTS}<br />{postrow.POSTER_FROM}</span><br /></td>
		<td class="{postrow.ROW_CLASS}" width="100%" height="28" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="100%"><a href="{postrow.U_MINI_POST}"><img src="{postrow.MINI_POST_IMG}" width="12" height="9" aForums-left="{postrow.L_MINI_POST_AForums-left}" title="{postrow.L_MINI_POST_AForums-left}" border="0" /></a><span class="gensmall">{L_POSTED}: {postrow.POST_DATE}<span class="gen">&nbsp;</span>&nbsp; &nbsp;{L_POST_SUBJECT}: {postrow.POST_SUBJECT}</span></td>
				<td valign="top" align="right" nowrap="nowrap">{postrow.QUOTE_IMG} {postrow.EDIT_IMG} {postrow.DELETE_IMG} {postrow.IP_IMG}</td>
			</tr>
			<tr> 
				<td colspan="2"><hr class=1></td>
			</tr>
			<tr>
				<td colspan="2"><span class="postbody">{postrow.MESSAGE}{postrow.SIGNATURE}</span><span class="postbody">{postrow.EDITED_MESSAGE}</span></td>
			</tr>
		</table></td>
	</tr>
	<tr> 
		<td class="{postrow.ROW_CLASS}" width="150" align="left" valign="middle"><span class="nav"><a href="#top" class="nav">{L_BACK_TO_TOP}</a></span></td>
		<td class="{postrow.ROW_CLASS}" width="100%" height="28" valign="bottom" nowrap="nowrap"><table cellspacing="0" cellpadding="0" border="0" height="18" width="18">
			<tr> 
				<td valign="middle" nowrap="nowrap">{postrow.PROFILE_IMG} {postrow.PM_IMG} {postrow.EMAIL_IMG} {postrow.WWW_IMG} {postrow.AIM_IMG} {postrow.YIM_IMG} {postrow.MSN_IMG}<script language="JavaScript" type="text/javascript"><!-- 

	if ( navigator.userAgent.toLowerCase().indexOf('mozilla') != -1 && navigator.userAgent.indexOf('5.') == -1 )
		document.write(' {postrow.ICQ_IMG}');
	else
		document.write('</td><td>&nbsp;</td><td valign="top" nowrap="nowrap"><div style="position:relative"><div style="position:absolute">{postrow.ICQ_IMG}</div><div style="position:absolute;left:3px;top:-1px">{postrow.ICQ_STATUS_IMG}</div></div>');
				
				//--></script><noscript>{postrow.ICQ_IMG}</noscript></td>
			</tr>            	
		</table></td>

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
	<!-- END postrow -->

            <table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr align="center"> 
		<td height="28"><table cellspacing="0" cellpadding="0" border="0">
			<tr><form method="post" action="{S_POST_DAYS_ACTION}">
				<td align="center"><span class="gensmall">{L_DISPLAY_POSTS}: {S_SELECT_POST_DAYS}&nbsp;{S_SELECT_POST_ORDER}&nbsp;<input type="submit" value="{L_GO}" class="liteoption" name="submit" /></span></td>
			</form></tr>
		</table></td>
	</tr>
</table>

<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr> 
	<td align="left" valign="middle" nowrap="nowrap"><span class="nav"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" aForums-left="{L_POST_NEW_TOPIC}" align="middle" /></a>&nbsp;&nbsp;&nbsp;<a href="{U_POST_REPLY_TOPIC}"><img src="{REPLY_IMG}" border="0" aForums-left="{L_POST_REPLY_TOPIC}" align="middle" /></a></span></td>
	<td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> 
	  -> <a href="{U_VIEW_FORUM}" class="nav">{FORUM_NAME}</a></span></td>
	<td align="right" valign="top" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span> 
	  </td>
  </tr>
  <tr>
	<td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
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
 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
<table width="100%" cellspacing="2" border="0" align="center">
  <tr> 
	<td width="40%" valign="top" nowrap="nowrap" align="left"><span class="gensmall">
	  {S_TOPIC_ADMIN}</td>
	<td align="right" valign="top" nowrap="nowrap">{JUMPBOX}<span class="gensmall">{S_AUTH_LIST}</span></td>
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
<SCRIPT LANGUAGE="JavaScript">
<!-- Hide me from lame browsers

function CC_noErrors() {
return true;
}

window.onerror = CC_noErrors;

// -->
</SCRIPT>
<!-- End of No Error JavaScript -->
<script type="text/javascript"> 

if (navigator.appName.indexOf("Explorer") == -1) 
{document.body.style.overflow = 'hidden'; document.body.style.overflow = '';} 

</script>