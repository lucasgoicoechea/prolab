









































<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td><img name="Forums-top_left" src="themes/Core/images/forums/Forums-top_left.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td> 
   <td width="100%" background="themes/Core/images/forums/Forums-top_middle.gif"><img name="Forums-top_middle" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
   <td><img name="Forums-top_right" src="themes/Core/images/forums/Forums-top_right.gif" WIDTH=15 HEIGHT=35 border="0" aForums-left=""></td>
  </tr>
  <tr>
    <td background="themes/Core/images/forums/Forums-left.gif"><img name="Forums-left" src="themes/Core/forums/images/spacer.gif" width="1" height="1" border="0" aForums-left=""></td>
        <td valign="top" bgcolor="c6d7e5">
<form action="{S_SEARCH_ACTION}" method="POST">
<table cellpadding="0" cellspacing="0" border="0" width="98%" align="center">
  <tr> 
    <td class="tableborder">
  <table border="0" cellpadding="4" cellspacing="1" width="100%" class="forumline">
	<tr> 
	  <td class="catrow" colspan="4"><span class="catrowtext">{L_SEARCH_QUERY}</span></td>
	</tr>
	<tr> 
	  <td class="row1" colspan="2" width="50%"><span class="mediumtext">{L_SEARCH_KEYWORDS}:</span><br>
		<span class="smalltext">{L_SEARCH_KEYWORDS_EXPLAIN}</span></td>
	  <td class="row2" colspan="2" valign="top"><span class="mediumtext"> 
		<input type="text" style="width: 300px" name="search_keywords" size="30">
		<br>
		<input type="radio" name="addterms" value="any" checked>
		{L_SEARCH_ANY_TERMS}<br>
		<input type="radio" name="addterms" value="all">
		{L_SEARCH_ALL_TERMS}</span></td>
	</tr>
	<tr> 
	  <td class="row1" colspan="2"><span class="mediumtext">{L_SEARCH_AUTHOR}:</span><br>
		<span class="smalltext">{L_SEARCH_AUTHOR_EXPLAIN}</span></td>
	  <td class="row2" colspan="2" valign="middle"><span class="mediumtext"> 
		<input type="text" style="width: 300px" name="search_author" size="30">
		</span> </td>
	</tr>
	<tr> 
	  <td class="catrow" colspan="4" >{L_SEARCH_OPTIONS}</td>
	</tr>
	<tr> 
	  <td class="row1" align="right"><span class="mediumtext">{L_FORUM}:&nbsp;</span></td>
	  <td class="row2"><span class="mediumtext">
		<select name="searchforum">{S_FORUM_OPTIONS}
		</select>
		</span></td>
	  <td class="row1" align="right"><span class="mediumtext">{L_RETURN_FIRST}</span></td>
	  <td class="row2"><span class="mediumtext"> 
		<select name="charsreqd">{S_CHARACTER_OPTIONS}
		</select>
		{L_CHARACTERS}</span></td>
	</tr>
	<tr> 
	  <td class="row1" align="right"><span class="mediumtext">{L_CATEGORY}:&nbsp;</span></td>
	  <td class="row2"><span class="mediumtext">
		<select class="post" name="searchcat">{S_CATEGORY_OPTIONS}
		</select>
		</span></td>
	  <td class="row1" align="right"><span class="mediumtext">{L_SORT_BY}:&nbsp;</span></td>
	  <td class="row2" valign="middle" nowrap><span class="mediumtext"> 
		<select class="post" name="sortby">{S_SORT_OPTIONS}
			  
		</select>
		<br>
		<input type="radio" name="sortdir" value="ASC">
		{L_SORT_ASCENDING}<br>
		<input type="radio" name="sortdir" value="DESC" checked>
		{L_SORT_DESCENDING}</span>&nbsp;</td>
	</tr>
	<tr> 
	  <td class="row1" align="right" nowrap><span class="mediumtext">{L_DISPLAY_RESULTS}:&nbsp;</span></td>
	  <td class="row2" nowrap> 
		<input type="radio" name="showresults" value="posts">
		<span class="mediumtext">{L_POSTS}
		<input type="radio" name="showresults" value="topics" checked>
		{L_TOPICS}</span></td>
	  <td class="row1" align="right" nowrap><span class="mediumtext">{L_SEARCH_PREVIOUS}:&nbsp;</span></td>
	  <td class="row2" valign="middle"><span class="mediumtext">
		<select class="post" name="resultdays">{S_TIME_OPTIONS}
		</select>
		</span></td>
	</tr>
	<tr> 
	  <td class="catrow" colspan="4" align="center" >{S_HIDDEN_FIELDS} 
		<input type="submit" value="{L_SEARCH}">
	  </td>
	</tr>
  </table>
  </td></tr></table>
  <table width="98%" cellspacing="2" border="0" align="center" cellpadding="2">
    <tr> 
	  <td align="right" valign="middle"><span class="smalltext">{S_TIMEZONE}</span></td>
	</tr>
  </table>
</form>
<table width="100%" border="0">

	<tr>

		<td align="right" valign="top">{JUMPBOX}</td>

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