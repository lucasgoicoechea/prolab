
<?php

########################################################################
# PHP-Nuke Block: fiblack Center Forum Block v.9 		       #
# Made for PHP-Nuke 6.5 and up                                         #
#                                                                      #
# Made by coldblooded http://www.nukemods.com                          #
# December 30, 2002 - Modified by stickman http://www.calgaryjeep.com  #
########################################################################
# This program is free software. You can redistribute it and/or modify #
# it under the terms of the GNU General Public License as published by #
# the Free Software Foundation; either version 2 of the License.       # 
# If you modify this, let me know for fun. =)                          #
######################################################################## 

if (eregi("block-XPSilver-Forum.php",$PHP_SELF)) {
    Header("Location: index.php");
    die();
}
	
global $prefix, $dbi, $sitename, $admin;

$HideViewReadOnly = 1;
    		
$Last_New_Topics  = 5;
$show = "	<tr>
	  <td width=\"15\" height=\"15\" background=\"themes/XPSilver/forums/images/down2.gif\"><img src=\"themes/XPSilver/forums/images/down-left2.gif\" alt=\"\" border=\"0\"></td>
	  <td background=\"themes/XPSilver/forums/images/down2.gif\" align=\"center\" height=\"15\" colspan=\"6\">&nbsp;</td>
	  <td><img src=\"themes/XPSilver/forums/images/down-right2.gif\" alt=\"\" border=\"0\"></td>
	</tr>
	</table>";

$Count_Topics = 0;
$Topic_Buffer = "";
$result = sql_query( "SELECT topic_id, forum_id, topic_last_post_id, topic_title, topic_poster, topic_views, topic_replies, topic_moved_id FROM ".$prefix."_bbtopics ORDER BY topic_last_post_id DESC", $dbi );
while( list( $topic_id, $forum_id, $topic_last_post_id, $topic_title, $topic_poster, $topic_views, $topic_replies, $topic_moved_id ) = sql_fetch_row( $result, $dbi ) )

{
   $skip_display = 0;
   if( $HideViewReadOnly == 1 )
   {
      $result1 = sql_query( "SELECT auth_view, auth_read FROM ".$prefix."_bbforums where forum_id = '$forum_id'", $dbi );
      list( $auth_view, $auth_read ) = sql_fetch_row( $result1, $dbi );
      if( ( $auth_view != 0 ) or ( $auth_read != 0 ) ) { $skip_display = 1; }
   }

   if( $topic_moved_id != 0 )
   {
	  // Shadow Topic !!
      $skip_display = 1;
   }
   
   if( $skip_display == 0 )
   {
	  $Count_Topics += 1;

$result2 = sql_query("SELECT username, user_id FROM ".$prefix."_users where user_id='$topic_poster'", $dbi);
list($username, $user_id)=sql_fetch_row($result2, $dbi);
$avtor=$username;
$sifra=$user_id;

$result3 = sql_query("SELECT poster_id, FROM_UNIXTIME(post_time,'%m/%d/%Y at %H:%i') as post_time FROM ".$prefix."_bbposts where post_id='$topic_last_post_id'", $dbi);
list($poster_id, $post_time)=sql_fetch_row($result3, $dbi);

$result4 = sql_query("SELECT username, user_id FROM ".$prefix."_users where user_id='$poster_id'", $dbi);
list($username, $user_id)=sql_fetch_row($result4, $dbi);

$viewlast .= "<tr>
	  <td class=\"row1\" background=\"themes/XPSilver/forums/images/left2.gif\" width=\"15\">&nbsp;</td>
	  <td class=\"row1\" align=\"left\" valign=\"middle\" width=\"20\"><img src=\"themes/XPSilver/forums/images/folder_new.gif\" alt=\"New post\" title=\"New post\" /></td>
	  <td class=\"row1\" width=\"100%\" onMouseOver=\"this.style.backgroundColor='#E0E2EB'; this.style.cursor='hand';\" onMouseOut=\"this.style.backgroundColor='#F0F1F5';\" onclick=\"window.location.href='modules.php?name=Forums&file=viewtopic&t=$topic_id#$last_post_id'\"><span class=\"topictitle\">&nbsp;&nbsp;<a href=\"modules.php?name=Forums&file=viewtopic&t=$topic_id#$last_post_id\" class=\"topictitle\">$topic_title</a></span><span class=\"gensmall\"><br />
		</span></td>
	  <td class=\"row2\" align=\"center\" valign=\"middle\"><span class=\"postdetails\">$topic_replies</span></td>
	  <td class=\"row1\" align=\"center\" valign=\"middle\"><span class=\"name\"><a href=\"modules.php?name=Forums&file=profile&mode=viewprofile&u=$sifra\">$avtor</a></span></td>
	  <td class=\"row2\" align=\"center\" valign=\"middle\"><span class=\"postdetails\">$topic_views</span></td>
	  <td class=\"row1\" align=\"center\" valign=\"middle\" nowrap><span class=\"postdetails\">&nbsp;&nbsp;$post_time&nbsp;&nbsp;<br />&nbsp;&nbsp;<a href=\"modules.php?name=Forums&file=profile&mode=viewprofile&u=$user_id\">$username</a>&nbsp;&nbsp;<a href=\"modules.php?name=Forums&file=viewtopic&p=$topic_last_post_id#$topic_last_post_id\"><img src=\"themes/XPSilver/forums/images/icon_minipost_new.gif\" alt=\"Latest post\" title=\"Latest post\" border=\"0\" /></a></span></td>
	  <td class=\"row1\" background=\"themes/XPSilver/forums/images/right2.gif\" width=\"15\">&nbsp;</td>
	</tr>";
  
}
   
   if( $Last_New_Topics == $Count_Topics ) { break 1; }
   
}

$content .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	<tr> 
          <td class=\"row1\" width=\"15\" height=\"25\"><img src=\"themes/XPSilver/forums/images/up-left2.gif\" alt=\"\" border=\"0\"></td>
          <td class=\"row1\" background=\"themes/XPSilver/forums/images/up2.gif\" align=\"center\" width=\"100%\" height=\"25\" nowrap colspan=\"2\"><span class=\"topframe\">&nbsp;Topics&nbsp;</span></td>
          <td class=\"row2\" background=\"themes/XPSilver/forums/images/up2.gif\" align=\"center\" width=\"50\" height=\"25\" nowrap><span class=\"topframe\">&nbsp;Replies&nbsp;</span></td>
          <td class=\"row1\" background=\"themes/XPSilver/forums/images/up2.gif\" align=\"center\" width=\"100\" height=\"25\" nowrap><span class=\"topframe\">&nbsp;Author&nbsp;</span></td>
          <td class=\"row2\" background=\"themes/XPSilver/forums/images/up2.gif\" align=\"center\" width=\"50\" height=\"25\" nowrap><span class=\"topframe\">&nbsp;Views&nbsp;</span></td>
          <td class=\"row1\" background=\"themes/XPSilver/forums/images/up2.gif\" align=\"center\" height=\"25\" nowrap><span class=\"topframe\">&nbsp;Last Post&nbsp;</span></td>
		<td ><img src=\"themes/XPSilver/forums/images/up-right2.gif\" alt=\"\" border=\"0\"></td>
	</tr>
	<tr>
		<td background=\"themes/XPSilver/forums/images/left2.gif\" width=\"15\">&nbsp;</td>
		<td colspan=\"2\">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td align=\"center\" nowrap><span class=\"nav\">&nbsp;&nbsp;&nbsp;</td>
		<td background=\"themes/XPSilver/forums/images/right2.gif\" width=\"15\">&nbsp;</td>
	</tr>";
    $content .= "$viewlast";

 $content .= "$show";

?>