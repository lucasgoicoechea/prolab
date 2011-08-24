<?php

/************************************************************************/
/* PHP-NUKE Theme: Core theme pack v1.0                                 */
/* For PHP-Nuke 6.8 and above                                           */
/* Copyright (c) 2005 by Disipal (disipal@disipal.net)                  */
/* http://www.disipal.net                                               */
/************************************************************************/


if (eregi("block-Core_forums.php", $PHP_SELF)){
     Header("Location: index.php");
     die();
    }

global $prefix, $user_prefix, $db, $dbi, $sitename, $admin;

// Configure which Topics to display: 0 = Display ALL, 1 = Hide hidden & private Topics
$HideViewReadOnly = 1;

// Configure number of Topics to display
$Last_New_Topics = 5;

$Count_Topics = 0;
$Topic_Buffer = "";
$result = sql_query("SELECT topic_id, forum_id, topic_last_post_id, topic_title, topic_poster, topic_views, topic_replies, topic_moved_id FROM " . $prefix . "_bbtopics ORDER BY topic_last_post_id DESC", $dbi);
while(list($topic_id, $forum_id, $topic_last_post_id, $topic_title, $topic_poster, $topic_views, $topic_replies, $topic_moved_id) = sql_fetch_row($result, $dbi))
{
     $skip_display = 0;
     if($HideViewReadOnly == 1)
    {
         $result1 = sql_query("SELECT auth_view, auth_read FROM " . $prefix . "_bbforums where forum_id = '$forum_id'", $dbi);
         list($auth_view, $auth_read) = sql_fetch_row($result1, $dbi);
         if(($auth_view != 0) or ($auth_read != 0)){
            $skip_display = 1;
        }
         }
     if($topic_moved_id != 0)
    {
        // Shadow Topic
        $skip_display = 1;
         }
     if($skip_display == 0)
    {
         $Count_Topics += 1;
         $result2 = sql_query("SELECT username, user_id FROM " . $prefix . "_users where user_id='$topic_poster'", $dbi);
         list($username, $user_id) = sql_fetch_row($result2, $dbi);
         $avtor = $username;
         $sifra = $user_id;
         $result3 = sql_query("SELECT poster_id, FROM_UNIXTIME(post_time,'%m/%d/%Y at %H:%i') as post_time FROM " . $prefix . "_bbposts where post_id='$topic_last_post_id'", $dbi);
         list($poster_id, $post_time) = sql_fetch_row($result3, $dbi);
         $result4 = sql_query("SELECT username, user_id FROM " . $prefix . "_users where user_id='$poster_id'", $dbi);
         list($username, $user_id) = sql_fetch_row($result4, $dbi);
        $viewlast .= " <tr>
<td height=\"30\" nowrap class=\"row1\"><img src=\"themes/Core/forums/images/folder.gif\" border=\"0\" /></td>
<td width=\"100%\" class=\"row1\">&nbsp;<a href=\"modules.php?name=Forums&file=viewtopic&t=$topic_id#$topic_last_post_id\">$topic_title</a></td>
<td align=\"center\" class=\"row2\">$topic_replies</td>
<td align=\"center\" class=\"row2\"><a href=\"modules.php?name=Forums&file=profile&mode=viewprofile&u=$sifra\">$avtor</a></td>
<td align=\"center\" class=\"row2\">$topic_views</td>
<td align=\"center\" nowrap class=\"row2\"><font size=\"-2\"><i>&nbsp;&nbsp;$post_time&nbsp;</i></font><br>
<a href=\"modules.php?name=Forums&file=profile&mode=viewprofile&u=$user_id\">$username</a>&nbsp;<a href=\"modules.php?name=Forums&file=viewtopic&p=$topic_last_post_id#$topic_last_post_id\"><img src=\"themes/Core/forums/images/icon_minipost_new.gif\" border=\"0\"></a></td>
</tr>";
         }
     if($Last_New_Topics == $Count_Topics){
        break 1;
    }
    }

$content .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
<tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr><td><table width=\"100%\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\">
<tr>
<td height=\"25\" colspan=\"2\" align=\"center\" class=\"row1\"><strong>Topics</strong></font></td>
<td width=\"50\" align=\"center\" class=\"row1\"><strong>&nbsp;Replies&nbsp;</strong></font></td>
<td width=\"100\" align=\"center\" class=\"row1\"><strong>&nbsp;Author&nbsp;</strong></font></td>
<td width=\"50\" align=\"center\" class=\"row1\"><strong>&nbsp;Views&nbsp;</strong></font></td>
<td align=\"center\" class=\"row1\"><strong>&nbsp;Last Post&nbsp;</strong></font></td>
</tr>";

$content .= "$viewlast
</table></td>
        </tr>
      </table></td>
  </tr>
</table>";


?>