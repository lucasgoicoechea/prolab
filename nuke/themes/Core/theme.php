<?php

/************************************************************************/
/* PHP-NUKE Theme: Core theme pack v1.0                                 */
/* For PHP-Nuke 6.8 and above                                           */
/* Copyright (c) 2005 by Disipal (disipal@disipal.net)                  */
/* http://www.disipal.net                                               */
/************************************************************************/


if (eregi("theme.php", $_SERVER['SCRIPT_NAME'])){ die("Access Denied"); }

/************************************************************/
/* Theme Colors Definition                                  */
/************************************************************/

$bgcolor1 = "#d9e2ea";
$bgcolor2 = "#d9e2ea";
$bgcolor3 = "#94a4b3";
$bgcolor4 = "#94a4b3";
$textcolor1 = "#00448b";
$textcolor2 = "#00366e";

/************************************************************/
/* OpenTable Functions                                      */
/************************************************************/

function OpenTable() {
echo"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
  <tr>
  <td><img name=\"tableTopleft\" src=\"themes/Core/images/tables/tableTopleft.gif\" width=\"19\" height=\"30\" border=\"0\" alt=\"\"></td> 
   <td width=\"100%\" background=\"themes/Core/images/tables/tableTopmiddle.gif\"><img name=\"tableTopmiddle\" src=\"themes/Core/images/tables/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>
   <td><img name=\"tableTopright\" src=\"themes/Core/images/tables/tableTopright.gif\" width=\"19\" height=\"30\" border=\"0\" alt=\"\"></td>
  </tr>
  <tr>
    <td background=\"themes/Core/images/tables/left.gif\"><img name=\"left\" src=\"themes/Core/images/tables/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>
<td valign=\"top\" bgcolor=\"#d9e2ea\">
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
                          <tr>
                            <td>";
}

function CloseTable() {
    echo "                          </tr>
                            </td>
</table>
</td>
<td background=\"themes/Core/images/tables/right.gif\"><img name=\"right\" src=\"themes/Core/images/tables/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>
</tr>
<tr>
<td><img name=\"tableBottomleft\" src=\"themes/Core/images/tables/tableBottomleft.gif\" width=\"19\" height=\"30\" border=\"0\" alt=\"\"></td>
<td background=\"themes/Core/images/tables/tableBottommiddle.gif\"><img name=\"tableBottommiddle\" src=\"themes/Core/images/tables/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>
<td><img name=\"tableBottomright\" src=\"themes/Core/images/tables/tableBottomright.gif\" width=\"19\" height=\"30\" border=\"0\" alt=\"\"></td>
</tr></table>";
	
}

function OpenTable2() {
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"7\">
  <tr>
    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">
        <tr>
          <td bgcolor=\"#293242\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">
              <tr>
                <td bgcolor=\"#e3e9ee\">";
}

function CloseTable2() {
    echo "</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>";
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeheader() { 
    global $sid, $title, $informant, $admin, $user, $banners, $name, $sitename, $slogan, $cookie, $prefix, $db, $nukeurl, $anonymous, $time, $dbi, $start_time;

include("themes/Core/headerlinks.php");
    
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }

    $sql = "SELECT user_id FROM $user_prefix"._users." WHERE username='$uname'";
    $result = $db->sql_query($sql);
    $row = $db->sql_fetchrow($result);
    $uid = $row[user_id];
    $newpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix"._bbprivmsgs." WHERE privmsgs_to_userid='$uid' AND (privmsgs_type='5' OR privmsgs_type='1')"));
    $oldpms = $db->sql_numrows($db->sql_query("SELECT privmsgs_to_userid FROM $prefix"._bbprivmsgs." WHERE privmsgs_to_userid='$uid' AND privmsgs_type='0'"));

   // Determine how many READ Messages and how many UNREAD Messages 
   $result = sql_query( "select user_id from $prefix"._users." where username='$username'", $dbi ); 
   list( $user_id ) = sql_fetch_row( $result, $dbi ); 
   $result2 = sql_query( "select privmsgs_type from $prefix"._bbprivmsgs." where privmsgs_to_userid='$user_id' AND (privmsgs_type='1' or privmsgs_type='5')", $dbi ); 
   $MesUnread = sql_num_rows( $result2 ); 
   $result3 = sql_query( "select privmsgs_type from $prefix"._bbprivmsgs." where privmsgs_to_userid='$user_id' AND (privmsgs_type='0')", $dbi ); 
   $MesRead = sql_num_rows( $result3 ); 


    if ($username == "Anonymous") {
	$theuser = "<form action=\"modules.php?name=Your_Account\" method=\"post\"><input type=\"text\" name=\"username\" value=\"username\" onFocus=\"if(this.value=='username')this.value='';\" value style=\"width:70;height:16;\" class=1>&nbsp;&nbsp;<input type=\"password\" name=\"user_password\" value=\"password\" onFocus=\"if(this.value=='password')this.value='';\" value style=\"width:70;height:16;\" class=1>&nbsp;&nbsp;<input type=\"hidden\" name=\"random_num\" value=\"$random_num\"><input type=\"hidden\" name=\"gfx_check\" value=\"$code\"><input type=\"hidden\" name=\"op\" value=\"login\"><input type=\"image\" value=\"login\" class=\"noborder\" src=\"themes/Core/images/header/go.gif\" border=\"0\" alt=login></td></form>";
    } else {
	$theuser = "Welcome <b>$username!</b>&nbsp;&nbsp;You have <b><a href=\"modules.php?name=Private_Messages\">$MesUnread</a></b> new messages, and <b><a href=\"modules.php?name=Private_Messages\">$MesRead</a></b> old messages.";
    }


$search ="<form action=\"modules.php?name=Search\" method=\"post\"><input type=\"text\" name=\"query\" value=\"search...\" onFocus=\"if(this.value=='search...')this.value='';\" value style=\"width:90;height:16;\"><img src=\"themes/Core/images/spacer.gif\" width=\"2\" height=\"1\" border=\"0\" alt=\"\"><input type=\"image\" value=\"submit\" class=\"noborder\" src=\"themes/Core/images/header/go.gif\" border=\"0\" alt=submit></td></form>";

  echo "<script language=\"javascript\" src=\"themes/Core/clock.js\"></script>\n";
  echo "<body topmargin=\"0\" leftmargin=\"0\" marginwidth=\"0\" marginheight=\"0\">"
  . "<!-- Core Theme pack for PHP-Nuke 7.0 and above - Copyright 2004-2005 by Disipal Designs (http://www.disipal.net) -->"
  . "<!-- Start Header Slices (Core_header.psd) -->"

  . "<table id=\"Table\" width=\"100%\" height=\"163\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">"
  . "<tr>"
  . "	<td rowspan=\"7\">"
  . "		<img src=\"themes/Core/images/header/Core_01.gif\" width=\"31\" height=\"163\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_02.gif\" width=\"3\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_03.gif\" width=\"52\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_04.gif\" width=\"6\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_05.gif\" width=\"52\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_06.gif\" width=\"3\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_07.gif\" width=\"55\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_08.gif\" width=\"6\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_09.gif\" width=\"52\" height=\"27\" alt=\"\"></td>"
  . "	<td rowspan=\"2\">"
  . "		<img src=\"themes/Core/images/header/Core_10.gif\" width=\"156\" height=\"27\" alt=\"\"></td>"
  . "	<td background=\"themes/Core/images/header/Core_time.gif\" width=\"100\" height=\"24\"><center>"
  . "<script language=\"javascript\"><!--\n"
  . "new LiveClock('arial','1','#ffffff','#',' ','','100','1','1','0','1','null');\n"
  . "//--></script></center>\n"
  . "		</td>"
  . "	<td rowspan=\"7\">"
  . "		<img src=\"themes/Core/images/header/Core_12.gif\" width=\"15\" height=\"163\" alt=\"\"></td>"
  . "	<td background=\"themes/Core/images/header/Core_bg.gif\" width=\"100%\" height=\"163\" rowspan=\"7\">"
  . "		<img src=\"themes/Core/images/header/Core_bg.gif\" width=\"1\" height=\"163\" alt=\"\"></td>"
  . "	<td rowspan=\"7\">"
  . "		<img src=\"themes/Core/images/header/Core_14.gif\" width=\"68\" height=\"163\" alt=\"\"></td>"
  . "</tr>"
  . "<tr>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_15.gif\" width=\"100\" height=\"3\" alt=\"\"></td>"
  . "</tr>"
  . "<tr>"
  . "	<td colspan=\"10\">"
  . "		<img src=\"themes/Core/images/header/logo.gif\" width=\"485\" height=\"81\" alt=\"\"></td>"
  . "</tr>"
  . "<tr>"
  . "	<td rowspan=\"4\">"
  . "		<img src=\"themes/Core/images/header/Core_17.gif\" width=\"3\" height=\"55\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_18.gif\" width=\"52\" height=\"7\" alt=\"\"></td>"
  . "	<td rowspan=\"3\">"
  . "		<img src=\"themes/Core/images/header/Core_19.gif\" width=\"6\" height=\"28\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_20.gif\" width=\"52\" height=\"7\" alt=\"\"></td>"
  . "	<td rowspan=\"3\">"
  . "		<img src=\"themes/Core/images/header/Core_21.gif\" width=\"3\" height=\"28\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_22.gif\" width=\"55\" height=\"7\" alt=\"\"></td>"
  . "	<td rowspan=\"3\">"
  . "		<img src=\"themes/Core/images/header/Core_23.gif\" width=\"6\" height=\"28\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_24.gif\" width=\"52\" height=\"7\" alt=\"\"></td>"
  . "	<td rowspan=\"3\">"
  . "		<img src=\"themes/Core/images/header/Core_25.gif\" width=\"156\" height=\"28\" alt=\"\"></td>"
  . "	<td rowspan=\"3\">"
  . "		<img src=\"themes/Core/images/header/Core_26.gif\" width=\"100\" height=\"28\" alt=\"\"></td>"
  . "</tr>"
  . "<tr>"
  . "	<td background=\"themes/Core/images/header/link1.gif\" width=\"52\" height=\"16\">"
  . "		<p align=\"center\">"
  . "		<a href=\"$link1url\">"
  . "			<font size=\"1\">$link1</font></a></td>"
  . "	<td background=\"themes/Core/images/header/link2.gif\" width=\"52\" height=\"16\" border=\"0\">"
  . "		<p align=\"center\">"
  . "		<a href=\"$link2url\">"
  . "							<font size=\"1\">$link2</font></a></td>"
  . "	<td background=\"themes/Core/images/header/link3.gif\" width=\"55\" height=\"16\">"
  . "				<p align=\"center\">"
  . "		<a href=\"$link3url\">"
  . "							<font size=\"1\">$link3</font></a></td>"
  . "	<td background=\"themes/Core/images/header/link4.gif\" width=\"52\" height=\"16\">"
  . "				<p align=\"center\">"
  . "		<a href=\"$link4url\">"
  . "							<font size=\"1\">$link4</font></a></td>"
  . "</tr>"
  . "<tr>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_31.gif\" width=\"52\" height=\"5\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_32.gif\" width=\"52\" height=\"5\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_33.gif\" width=\"55\" height=\"5\" alt=\"\"></td>"
  . "	<td>"
  . "		<img src=\"themes/Core/images/header/Core_34.gif\" width=\"52\" height=\"5\" alt=\"\"></td>"
  . "</tr>"
  . "<tr>"
  . "	<td background=\"themes/Core/images/header/Core_user.gif\" width=\"482\" height=\"27\" colspan=\"9\">"
  . "		$theuser</td>"
  . "</tr>"
  . "</table>"


  . "<!-- End ImageReady Slices -->"
  . "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n"
  . "<tr valign=\"top\">\n"
  . "<td width=\"31\" valign=\"top\" background=\"themes/Core/images/leftbg.gif\"><img src=\"themes/Core/images/leftbg.gif\" width=\"31\" height=\"0\" border=\"0\"></td>\n"
  . "<td>\n";
 
    if ($name=='DisError' ||
        $name=='Forums' ||
        $name=='Members' ||
        $name=='Members_List' ||
        $name=='Private_Messages') {
   } 
   else { 
    blocks(left); 
   } 
    echo "</td>\n"
    	."<td><img src=\"themes/Core/images/spacer.gif\" width=\"5\" height=\"0\" border=\"0\" alt=\"\"></td>\n"
    	."<td width=\"100%\"><br>";

}

/************************************************************/
/* Function themefooter()                                   */
/*                                                          */
/* Control the footer for your site. You don't need to      */
/* close BODY and HTML tags at the end. In some part call   */
/* the function for right blocks with: blocks(right);       */
/* Also, $index variable need to be global and is used to   */
/* determine if the page your're viewing is the Homepage or */
/* and internal one.                                        */
/************************************************************/

function themefooter() {
    global $index, $user, $banners, $cookie, $prefix, $dbi, $db, $foot1, $foot2, $foot3, $foot4, $admin, $adminmail, $total_time, $start_time, $nukeurl, $startdate, $dbi, $group_id, $sitename, $username, $copyright;


    if ($banners == 1) {
    $numrows = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_banner WHERE type='0' AND active='1'"));
   /* Get a random banner if exist any. */ 
   /* More efficient random stuff, thanks to Cristian Arroyo from http://www.planetalinux.com.ar */ 

    if ($numrows>1) { 
   $numrows = $numrows-1; 
   mt_srand((double)microtime()*1000000); 
   $bannum = mt_rand(0, $numrows); 
    } else { 
   $bannum = 0; 
    } 
    $sql = "SELECT bid, imageurl, clickurl, alttext FROM ".$prefix."_banner WHERE type='0' AND active='1' LIMIT $bannum,1"; 
    $result = $db->sql_query($sql); 
    $row = $db->sql_fetchrow($result); 
    $bid = $row[bid]; 
    $imageurl = $row[imageurl]; 
    $clickurl = $row[clickurl]; 
    $alttext = $row[alttext]; 
    
    if (!is_admin($admin)) { 
       $db->sql_query("UPDATE ".$prefix."_banner SET impmade=impmade+1 WHERE bid='$bid'"); 
    } 
    if($numrows>0) { 
   $sql2 = "SELECT cid, imptotal, impmade, clicks, date FROM ".$prefix."_banner WHERE bid='$bid'"; 
   $result2 = $db->sql_query($sql2); 
   $row2 = $db->sql_fetchrow($result2); 
   $cid = $row2[cid]; 
   $imptotal = $row2[imptotal]; 
   $impmade = $row2[impmade]; 
   $clicks = $row2[clicks]; 
   $date = $row2[date]; 

/* Check if this impression is the last one and print the banner */ 

   if (($imptotal <= $impmade) AND ($imptotal != 0)) { 
       $db->sql_query("UPDATE ".$prefix."_banner SET active='0' WHERE bid='$bid'"); 
       $sql3 = "SELECT name, contact, email FROM ".$prefix."_bannerclient WHERE cid='$cid'"; 
       $result3 = $db->sql_query($sql3); 
       $row3 = $db->sql_fetchrow($result3); 
       $c_name = $row3[name]; 
       $c_contact = $row3[contact]; 
       $c_email = $row3[email]; 
       if ($c_email != "") { 
      $from = "$sitename <$adminmail>"; 
      $to = "$c_contact <$c_email>"; 
      $message = ""._HELLO." $c_contact:\n\n"; 
      $message .= ""._THISISAUTOMATED."\n\n"; 
      $message .= ""._THERESULTS."\n\n"; 
      $message .= ""._TOTALIMPRESSIONS." $imptotal\n"; 
      $message .= ""._CLICKSRECEIVED." $clicks\n"; 
      $message .= ""._IMAGEURL." $imageurl\n"; 
      $message .= ""._CLICKURL." $clickurl\n"; 
      $message .= ""._ALTERNATETEXT." $alttext\n\n"; 
      $message .= ""._HOPEYOULIKED."\n\n"; 
      $message .= ""._THANKSUPPORT."\n\n"; 
      $message .= "- $sitename "._TEAM."\n"; 
      $message .= "$nukeurl"; 
      $subject = "$sitename: "._BANNERSFINNISHED.""; 
      mail($to, $subject, $message, "From: $from\nX-Mailer: PHP/" . phpversion()); 
       } 
   } 
    $showbanners = "<a href=\"banners.php?op=click&bid=$bid\" target=\"_blank\"><img src=\"$imageurl\" border=\"0\" alt='$alttext' title='$alttext'></a>"; 
    }
}
  

$mtime = microtime();
    $mtime = explode(" ",$mtime);
    $mtime = $mtime[1] + $mtime[0];
    $end_time = $mtime;
    $total_time = ($end_time - $start_time);
    $total_time = "".substr($total_time,0,5) . " seconds";

 if ($index == 1) {
	echo "</td>\n"
	    ."<td><img src=\"themes/Core/images/spacer.gif\" width=\"5\" height=\"0\" border=\"0\" alt=\"\"></td>\n"
	    ."<td width=\"165\" align=\"right\" valign=\"top\">\n";
	blocks(right);
    }


  echo"</td>\n"
  . "<td width=\"11\" valign=\"top\" background=\"themes/Core/images/rightbg.gif\"><img src=\"themes/Core/images/rightbg.gif\" width=\"20\" height=\"0\" border=\"0\"></td>\n"
  . "</tr>\n"
  . "</table>\n\n\n"
  . "<!-- Core Theme pack for PHP-Nuke 7.0 and above - Copyright 2004-2005 by Disipal Designs (http://www.disipal.net) -->"
  . "<!-- Footer Slices (Core_footer.psd) -->"
  . "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">"
  . "<tr>"
  . "<td width=\"31\" background=\"themes/Core/images/leftbg.gif\"><img src=\"themes/Core/images/spacer.gif\" width=\"31\" height=\"0\"></td>"
  . "<td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\" bgcolor=\"#d9e2ea\">"
  . "<tr>"
  . "<td><center><font class=\"small\">";
footmsg();
echo"</font></center></td>"
  ."</tr>"        
  . "</table></td>"
  . "<td width=\"11\" background=\"themes/Core/images/rightbg.gif\"><img src=\"themes/Core/images/spacer.gif\" width=\"20\" height=\"1\"></td>"
  . "</tr>"
  . "</table>"
  . "<table id=\"Table\" width=\"100%\" height=\"100\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">"
  . "	<tr>"
  . "		<td rowspan=\"3\">"
  . "			<img src=\"themes/Core/images/footer/Core_01.gif\" width=\"50\" height=\"100\" alt=\"\"></td>"
  . "		<td background=\"themes/Core/images/footer/Core_left_bg.gif\" width=\"50%\" height=\"100\" rowspan=\"3\">"
  . "			<img src=\"themes/Core/images/footer/Core_left_bg.gif\" width=\"1\" height=\"100\" alt=\"\"></td>"
  . "		<td rowspan=\"3\">"
  . "			<img src=\"themes/Core/images/footer/Core_03.gif\" width=\"22\" height=\"100\" alt=\"\"></td>"
  . "		<td>"
  . "			<img src=\"themes/Core/images/footer/Core_04.gif\" width=\"172\" height=\"16\" alt=\"\"></td>"
  . "		<td>"
  . "			<a href=\"http://www.disipal.net\" target=\"_blank\">"
  . "				<img src=\"themes/Core/images/footer/Core_copyright.gif\" width=\"181\" height=\"16\" border=\"0\" alt=\"\"></a></td>"
  . "		<td>"
  . "			<img src=\"themes/Core/images/footer/Core_06.gif\" width=\"199\" height=\"16\" alt=\"\"></td>"
  . "		<td rowspan=\"3\">"
  . "			<img src=\"themes/Core/images/footer/Core_07.gif\" width=\"19\" height=\"100\" alt=\"\"></td>"
  . "		<td background=\"themes/Core/images/footer/Core_right_bg.gif\" width=\"50%\" height=\"100\" rowspan=\"3\">"
  . "			<img src=\"themes/Core/images/footer/Core_right_bg.gif\" width=\"1\" height=\"100\" alt=\"\"></td>"
  . "		<td rowspan=\"3\">"
  . "			<img src=\"themes/Core/images/footer/Core_09.gif\" width=\"55\" height=\"100\" alt=\"\"></td>"
  . "	</tr>"
  . "	<tr>"
  . "		<td background=\"themes/Core/images/footer/Core_banner.gif\" width=\"552\" height=\"73\" colspan=\"3\">"
  . "			<center>$showbanners</center></td>"
  . "	</tr>"
  . "	<tr>"
  . "		<td>"
  . "			<img src=\"themes/Core/images/footer/Core_11.gif\" width=\"172\" height=\"11\" alt=\"\"></td>"
  . "		<td>"
  . "			<img src=\"themes/Core/images/footer/Core_12.gif\" width=\"181\" height=\"11\" alt=\"\"></td>"
  . "		<td>"
  . "			<img src=\"themes/Core/images/footer/Core_13.gif\" width=\"199\" height=\"11\" alt=\"\"></td>"
  . "	</tr>"
  . "</table>"

  . "<!-- End Footer Slices -->";


}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	$content = "$thetext$notes\n";
    } else {
	if($informant != "") {
	    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
	} else {
	    $content = "$anonymous ";
	}
	$content .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
    }
    $posted = ""._POSTEDBY." ";
    $posted .= get_author($aid);
    $posted .= " "._ON." $time $timezone ($counter "._READS.")";
	
echo"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
  . "  <tr>"
  . "   <td><img name=\"storyTopleft\" src=\"themes/Core/images/stories/storyTopleft.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td> "
  . "   <td width=\"100%\" background=\"themes/Core/images/stories/storyTopmiddle.gif\"><img name=\"storyTopmiddle\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"><font class=\"storytitle\"><a href=\"modules.php?name=News&new_topic=$topic\">&nbsp;&nbsp;$topictext</a> : $title</font></td>"
  . "   <td><img name=\"storyTopright\" src=\"themes/Core/images/stories/storyTopright.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td>"
  . "  </tr>"
  . "  <tr>"
  . "    <td background=\"themes/Core/images/stories/left.gif\"><img name=\"left\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>"
  . "     <td valign=\"top\" bgcolor=\"#84a6cb\">"
  . "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">"
  . "	<!-- TITLE LINE -->"
  . "	<tr><td valign=top width=100% height=25>"
  . "</td></tr>"
  . "	<tr>"
  . "		<td>"
  . "			<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"100%\">"
  . "				<tr>"
  . "					<td align=center width=20%>			"
  . "						<a href=\"modules.php?name=News&new_topic=$topic\">"
  . "           <img src=\"$tipath$topicimage\" border=\"0\" alt=\"$topictext\" title=\"$topictext\" hspace=\"10\" vspace=\"10\"></a><br><br></td>
<td width=80% valign=top align=left>"
  . "						<p align=\"justify\"><font color=\"#063160\">$content</font><br>"
  . "					</td>"
  . "					"
  . "					"
  . "				</tr>"
  . "				<tr>"
  . "					<td align=center width=20%>			"
  . "						&nbsp;</td><td width=80% valign=top align=left>"
  . "					<p align=\"right\"><hr><font color=\"#063160\">$posted<br>$datetime $morelink</font></td>"
  . "				</tr>"
  . "				"
  . "			</table>"
  . "		</td>"
  . "	</tr>"
  . "<!-- STORY FOOTER TABLE -->"
  . "</table>"
  . "</td>"
  . "    <td background=\"themes/Core/images/stories/right.gif\"><img name=\"right\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>"
  . "  </tr>"
  . "  <tr>"
  . "   <td><img name=\"storyBottomleft\" src=\"themes/Core/images/stories/storyBottomleft.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td>"
  . "    <td background=\"themes/Core/images/stories/storyBottommiddle.gif\"><img name=\"storyBottommiddle\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>"
  . "   <td><img name=\"storyBottomright\" src=\"themes/Core/images/stories/storyBottomright.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td>"
  . "  </tr></table><br>";
	
}

/************************************************************/
/* Function themearticle()                                  */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    $posted = ""._POSTEDON." $datetime "._BY." ";
    $posted .= get_author($aid);
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	$content = "$thetext$notes\n";
    } else {
	if($informant != "") {
	    $content = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
	} else {
	    $content = "$anonymous ";
	}
	$content .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
    }
	
echo"<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">"
  . "  <tr>"
  . "   <td><img name=\"storyTopleft\" src=\"themes/Core/images/stories/storyTopleft.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td> "
  . "   <td width=\"100%\" background=\"themes/Core/images/stories/storyTopmiddle.gif\"><img name=\"storyTopmiddle\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"><font class=\"storytitle\"><a href=\"modules.php?name=News&new_topic=$topic\">&nbsp;&nbsp;$topictext</a> : $title</font></td>"
  . "   <td><img name=\"storyTopright\" src=\"themes/Core/images/stories/storyTopright.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td>"
  . "  </tr>"
  . "  <tr>"
  . "    <td background=\"themes/Core/images/stories/left.gif\"><img name=\"left\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>"
  . "     <td valign=\"top\" bgcolor=\"#84a6cb\">"
  . "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">"
  . "	<!-- TITLE LINE -->"
  . "	<tr><td valign=top width=100% height=25>"
  . "</td></tr>"
  . "	<tr>"
  . "		<td>"
  . "			<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"100%\">"
  . "				<tr>"
  . "					<td align=center width=20%>			"
  . "						<a href=\"modules.php?name=News&new_topic=$topic\">"
  . "           <img src=\"$tipath$topicimage\" border=\"0\" alt=\"$topictext\" title=\"$topictext\" hspace=\"10\" vspace=\"10\"></a><br><br></td>
<td width=80% valign=top align=left>"
  . "						<p align=\"justify\"><font color=\"#063160\">$content</font><br>"
  . "					</td>"
  . "					"
  . "					"
  . "				</tr>"
  . "				<tr>"
  . "					<td align=center width=20%>			"
  . "						&nbsp;</td><td width=80% valign=top align=left>"
  . "						<p align=\"right\"><font color=\"#063160\">$datetime $morelink</font></td>"
  . "				</tr>"
  . "				"
  . "			</table>"
  . "		</td>"
  . "	</tr>"
  . "<!-- STORY FOOTER TABLE -->"
  . "</table>"
  . "</td>"
  . "    <td background=\"themes/Core/images/stories/right.gif\"><img name=\"right\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>"
  . "  </tr>"
  . "  <tr>"
  . "   <td><img name=\"storyBottomleft\" src=\"themes/Core/images/stories/storyBottomleft.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td>"
  . "    <td background=\"themes/Core/images/stories/storyBottommiddle.gif\"><img name=\"storyBottommiddle\" src=\"themes/Core/images/stories/spacer.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>"
  . "   <td><img name=\"storyBottomright\" src=\"themes/Core/images/stories/storyBottomright.gif\" width=\"20\" height=\"22\" border=\"0\" alt=\"\"></td>"
  . "  </tr></table><br>";

}
/************************************************************/
/* Function themesidebox()                                  */
/************************************************************/

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {


echo"<TABLE cellSpacing=0 cellPadding=0 width=\"170\" "
  . "border=0>"
  . "                          <TR>"
  . "                            <TD width=\"170\">"
  . "                              <TABLE cellSpacing=0 cellPadding=0 width=\"170\" "
  . "                              border=0 height=\"37\">"
  . "                                <TBODY>"
  . "                                <TR>"
  . "                                <TD align=middle height=\"37\" background=\"themes/Core/images/blocks/blockup.gif\">"
  . "                                <font class=\"blocktitle\">$title</font></TD></TR></TBODY></TABLE></TD></TR>"
  . "                          <TR>"
  . "                            <TD background=\"themes/Core/images/blocks/blockmid.gif\" width=\"178\">"
  . "                              <TABLE cellSpacing=9 cellPadding=0 width=\"100%\" "
  . "                              border=0 height=\"9\">"
  . "                                <TBODY>"
  . "                                <TR>"
  . "                                <TD height=\"1\">"
  . "                                $content</TD></TR></TBODY></TABLE></TD></TR>"
  . "                          <TR>"
  . "                            <TD background=\"themes/Core/images/blocks/blockdown.gif\" "
  . "                          height=37 width=\"170\"></TD></TR></TABLE>";
}

?>