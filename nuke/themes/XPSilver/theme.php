<?php

/************************************************************/
/* Theme Name: XPSilver (v1.5)                              */
/* Theme Developers: Rick Bennett and mikem                 */
/* version 2.0                                              */
/* Cleaned, Enhanced and modified by:                       */
/* mikem (http://www.nukemods.com)                          */
/*                                                          */
/* Copyright Notice                                         */
/* - THIS PACKAGE IS NOT RELEASED AS GPL/GNU SCRIPTING.     */
/* - Our Package name and link MUST REMAIN in the credit    */
/*   footer of all Nuke generated pages.                    */
/*   Translations are permitted, not renaming.              */
/* - This package CAN NOT be ported without written         */
/*   permission.                                            */
/* - This package CAN NOT be mirrored without written       */
/*   permission.                                            */
/* - Use of this package requires that credits to the       */
/*   original PHPNuke remain in all site generated          */
/*   page footers.                                          */ 
/************************************************************/

/************************************************************/
/* Theme Colors Definition                                  */
/*                                                          */
/* Define colors for your web site. $bgcolor2 is generaly   */
/* used for the tables border as you can see on OpenTable() */
/* function, $bgcolor1 is for the table background and the  */
/* other two bgcolor variables follows the same criteria.   */
/* $texcolor1 and 2 are for tables internal texts           */
/************************************************************/

$bgcolor1 = "#F0F1F5";
$bgcolor2 = "#B4B7CA";
$bgcolor3 = "#F0F1F5";
$bgcolor4 = "#B4B7CA";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

/************************************************************/
/* OpenTable Functions                                      */
/*                                                          */
/* Define the tables look&feel for you whole site. For this */
/* we have two options: OpenTable and OpenTable2 functions. */
/* Then we have CloseTable and CloseTable2 function to      */
/* properly close our tables. The difference is that        */
/* OpenTable has a 100% width and OpenTable2 has a width    */
/* according with the table content                         */
/************************************************************/

function OpenTable() {
    global $bgcolor1, $bgcolor2;
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\"><tr><td>\n";
    echo "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable() {
    echo "</td></tr></table></td></tr></table>\n";
}

function OpenTable2() {
    global $bgcolor1, $bgcolor2;
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"0\" bgcolor=\"$bgcolor2\" align=\"center\"><tr><td>\n";
    echo "<table border=\"0\" cellspacing=\"1\" cellpadding=\"8\" bgcolor=\"$bgcolor1\"><tr><td>\n";
}

function CloseTable2() {
    echo "</td></tr></table></td></tr></table>\n";
}

/************************************************************/
/* FormatStory                                              */
/*                                                          */
/* Here we'll format the look of the stories in our site.   */
/* If you dig a little on the function you will notice that */
/* we set different stuff for anonymous, admin and users    */
/* when displaying the story.                               */
/************************************************************/

function FormatStory($thetext, $notes, $aid, $informant) {
    global $anonymous;
    if ($notes != "") {
	$notes = "<br><br><b>"._NOTE."</b> <i>$notes</i>\n";
    } else {
	$notes = "";
    }
    if ("$aid" == "$informant") {
	echo "<font class=\"content\" color=\"#505050\">$thetext$notes</font>\n";
    } else {
	if($informant != "") {
	    $boxstuff = "<a href=\"modules.php?name=Your_Account&op=userinfo&username=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= "<font class=\"content\">".writes." <i>\"$thetext\"</i>$notes\n";
	echo "<font class=\"content\" color=\"#505050\">$boxstuff</font>\n";
    }
}

/************************************************************/
/* Function themeheader()                                   */
/*                                                          */
/* Control the header for your site. You need to define the */
/* BODY tag and in some part of the code call the blocks    */
/* function for left side with: blocks(left);               */
/************************************************************/

function themeheader() {
    global $user, $banners, $sitename, $slogan, $cookie, $prefix, $name;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body bgcolor=\"#F0F1F5\" topmargin=\"0\" leftmargin=\"0\" marginheight=\"0\" marginwidth=\"0\">\n\n";

    echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"0\" bgcolor=\"#B4B7CA\">\n"
	."<tr>\n"
	."<td bgcolor=\"#B4B7CA\" align=\"left\" valign=\"top\" width=\"65%\"><a href=\"index.php\"><img src=\"themes/XPSilver/images/logo.jpg\" align=\"left\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td>\n"
        ."<td width=\"35%\" align=\"right\" class=\"menuehead\"><br>\n";
            if ($banners) {
	include("banners.php");
    }
 
   echo "<br></td>\n"
	."</tr></table>\n"

	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" border=\"0\" align=\"center\" bgcolor=\"#F3F4F7\">\n"
        ."<tr>\n"
        ."<td bgcolor=\"#F0F1F5\" colspan=\"4\"><IMG src=\"themes/XPSilver/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
	."<tr valign=\"middle\" bgcolor=\"#E0E2EB\">\n"
        ."<td align=\"left\" valign=\"top\" width=\"8\" height=\"22\"><img src=\"themes/XPSilver/images/topnav-left.gif\"></td>\n"
	."<td width=\"200\" background=\"themes/XPSilver/images/topnav-bg.gif\" nowrap><font class=\"content\" color=\"#363636\">\n";
    if ($username == "Anonymous") {
	echo "&nbsp;&nbsp;Welcome Guest, <font color=\"#000000\"><a href=\"modules.php?name=Your_Account\">Login</a> or <a href=\"modules.php?name=Your_Account&op=new_user\">Register</a></font>\n";
    } else {
	echo "&nbsp;&nbsp;Welcome $username <a href=\"modules.php?name=Your_Account&op=logout\">logout</a>";
    }
    echo "</font></td>\n"
	."<td align=\"center\" height=\"20\" background=\"themes/XPSilver/images/topnav-bg.gif\"><font class=\"content\">\n"
	."<A href=\"\">Home</a>\n"
	."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"modules.php?name=Your_Account\">Your Account</a>\n"
        ."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"modules.php?name=Downloads\">Downloads</a>\n"
        ."&nbsp;&middot;&nbsp;\n"
        ."<A href=\"modules.php?name=Forums\">Forums</a>\n"
        ."</font>\n"
        ."</td>\n"
        ."<td align=\"left\" valign=\"top\" width=\"8\" height=\"22\"><img src=\"themes/XPSilver/images/topnav-left.gif\"></td>\n"
        ."<td align=\"right\" width=\"125\" background=\"themes/XPSilver/images/topnav-bg.gif\"><font class=\"content\">\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \"January\",\"February\",\"March\",\"April\",\"May\",\"June\",\"July\",\"August\",\"September\",\"October\",\"November\",\"December\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write(monthNames[now.getMonth()] + \" \" + now.getDate() + \", \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></font>&nbsp;</td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#E0E2EB\" colspan=\"5\"><IMG src=\"themes/XPSilver/images/pixel.gif\" width=\"1\" height=\"3\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#ACA899\" colspan=\"5\"><IMG src=\"themes/XPSilver/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#716F64\" colspan=\"5\"><IMG src=\"themes/XPSilver/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
	."<!----- Begin Main Content Table ----->\n"
	."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#F0F1F5\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#B4B7CA\"><img src=\"themes/XPSilver/images/pixel.gif\" width=\"10\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
	."<td bgcolor=\"#B4B7CA\" width=\"175\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td bgcolor=\"#B4B7CA\"><img src=\"themes/XPSilver/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
        ."<td bgcolor=\"#F0F1F5\"><img src=\"themes/XPSilver/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
        ."<td width=\"100%\">\n";
    $public_msg = public_message();
    echo "<center>$public_msg</center><br>";
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
    global $index;
    if ($index == 1) {
	echo "</td><td><img src=\"themes/XPSilver/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\">\n";
	blocks(right);
    }
    echo "</td><td bgcolor=\"#F0F1F5\"><img src=\"themes/XPSilver/images/pixel.gif\" width=10 height=1 border=0 alt=\"\">\n"
	."</td></tr></table>\n"
        ."<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#B4B7CA\" align=\"center\">\n"
        ."<tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\"><br>\n";
    footmsg();
    echo "</td>\n"
        ."</tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    echo "<br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\">\n"
    ."<tr>\n"
    ."<td>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td bgcolor=\"#F0F1F5\" align=\"left\" valign=\"top\" width=\"26\" height=\"30\"><img src=\"themes/XPSilver/images/storynews.gif\"></td>\n"
	."<td align=\"left\" valign=\"middle\" background=\"themes/XPSilver/images/sidebox-title-bg.gif\" width=\"100%\" height=\"30\">\n"
	."<font class=\"option\" color=\"#363636\">&nbsp;&nbsp;<b>$title</b></font>\n"
	."</td>\n"
	."<td bgcolor=\"#F0F1F5\" align=\"left\" valign=\"top\" width=\"6\" height=\"30\"><img src=\"themes/XPSilver/images/sidebox-title-right.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"15\" height=\"46\"><img src=\"themes/XPSilver/images/storybox-left.gif\"></td>\n"
	."<td align=\"left\" valign=\"middle\" background=\"themes/XPSilver/images/storybox-bg.gif\" width=\"100%\" height=\"46\">\n"
	."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")</font>\n"
	."<font color=\"#999999\">$morelink</font>\n"
	."</td>\n"
    ."<td width=\"12\" align=\"left\" valign=\"top\"><img src=\"themes/XPSilver/images/storybox-right.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td width=\"4\" align=\"left\" valign=\"top\" background=\"themes/XPSilver/images/sidebox-bar-left.gif\"><img src=\"themes/XPSilver/images/sidebox-bar-px.gif\"></td>\n"
	."<td>\n"

	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr valign=\"top\">\n"
	."<td>\n"
	."<font color=\"#999999\"><b><a href=\"modules.php?name=News&new_topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table>\n"
    ."</td>\n"
    ."<td width=\"13\" align=\"left\" valign=\"top\" background=\"themes/XPSilver/images/storybox-content-right.gif\"><img src=\"themes/XPSilver/images/storybox-content-right-px.gif\"></td>\n"
    ."</tr></table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr valign=\"top\">\n"
	."<td width=\"9\" height=\"29\" align=\"left\" valign=\"top\"><img src=\"themes/XPSilver/images/storybox-bottom-left.gif\"></td>\n"
	."<td width=\"100%\" height=\"29\" background=\"themes/XPSilver/images/storybox-bottom-bg.gif\">&nbsp;</td>\n"
	."<td width=\"18\" height=\"29\" align=\"left\" valign=\"top\"><img src=\"themes/XPSilver/images/storybox-bottom-right.gif\"></td>\n"
    ."</table>\n"

    ."</td></tr></table>\n"

    ."</td></tr></table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#F0F1F5\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#B4B7CA\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"option\" color=\"#363636\"><b>$title</b></font><br>\n"
        ."<font class=\"content\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    if (is_admin($admin)) {
	echo "<br>[ <a href=\"admin.php?op=EditStory&amp;sid=$sid\">"._EDIT."</a> | <a href=\"admin.php?op=RemoveStory&amp;sid=$sid\">"._DELETE."</a> ]\n";
    }
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"modules.php?name=News&new_topic=$topic\"><img src=\"$tipath$topicimage\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {
    
        if (@file_exists($content)) {
                $fp = fopen ($content, "r");
                $content = fread($fp, filesize($content));
                fclose ($fp);
                $content = "?>$content<?";
                $content = eval($content);
        } else if (eregi("^http", $content)) { 
                $fp = fopen ($content, "r"); 
                $content = fread($fp, 65535); 
                fclose ($fp); 
        }
    echo "<br><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"175\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"26\" height=\"30\"><img src=\"themes/XPSilver/images/sidebox-title-left.gif\"></td>\n"
	."<td align=\"left\" valign=\"middle\" background=\"themes/XPSilver/images/sidebox-title-bg.gif\" width=\"143\" height=\"30\">\n"
	."<font class=\"option\" color=\"#ffffff\">&nbsp;&nbsp;<b>$title</b></font></td>\n"
	."<td align=\"left\" valign=\"top\" width=\"6\" height=\"30\"><img src=\"themes/XPSilver/images/sidebox-title-right.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"
	."</td>\n"
	."</tr>\n"
	."</table>\n\n"
	."<!----- Side Box Content ----->\n"
	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"175\">\n"
	."<tr valign=\"top\">\n"
	."<td width=\"4\" align=\"left\" valign=\"top\" background=\"themes/XPSilver/images/sidebox-bar-left.gif\"><img src=\"themes/XPSilver/images/sidebox-bar-px.gif\"></td>\n"

	."<td bgcolor=\"#ffffff\" width=\"166\" align=\"left\" valign=\"top\">\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"166\">\n"
	."<tr>\n"
	."<td>\n"
	."$content\n"
	."</td>\n"
	."</tr>\n"
	."</table>\n"
	."</td>\n"
    ."<td width=\"4\" align=\"left\" valign=\"top\" background=\"themes/XPSilver/images/sidebox-bar-right.gif\"><img src=\"themes/XPSilver/images/sidebox-bar-px.gif\"></td>\n"
	."</tr></table>\n"

	."<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"175\">\n"
	."<tr>\n"
	."<td align=\"left\" valign=\"top\" width=\"175\" height=\"29\">\n"
	."<img src=\"themes/XPSilver/images/sidebox-bottom.gif\">\n"
	."</td>\n"
	."</tr>\n"
	."</table>\n\n\n";
}

?>