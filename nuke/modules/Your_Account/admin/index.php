<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2005 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $prefix, $db, $admin_file;
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT title, admins FROM ".$prefix."_modules WHERE title='Your_Account'"));
$row2 = $db->sql_fetchrow($db->sql_query("SELECT name, radminsuper FROM ".$prefix."_authors WHERE aid='$aid'"));
$admins = explode(",", $row['admins']);
$auth_user = 0;
for ($i=0; $i < sizeof($admins); $i++) {
	if ($row2['name'] == "$admins[$i]" AND $row['admins'] != "") {
		$auth_user = 1;
	}
}

if ($row2['radminsuper'] == 1 || $auth_user == 1) {

	/*********************************************************/
	/* Users Functions                                       */
	/*********************************************************/

	function displayUsers() {
		global $admin, $admin_file;
		include("header.php");
		GraphicAdmin();
		OpenTable();
		echo "<center><font class=\"title\"><b>" . _USERADMIN . "</b></font></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		echo "<center><font class=\"option\"><b>" . _EDITUSER . "</b></font><br><br>"
		."<form method=\"post\" action=\"".$admin_file.".php\">"
		."<b>" . _NICKNAME . ": </b> <input type=\"text\" name=\"chng_uid\" size=\"20\">\n"
		."<select name=\"op\">"
		."<option value=\"modifyUser\">" . _MODIFY . "</option>\n"
		."<option value=\"delUser\">" . _DELETE . "</option></select>\n"
		."<input type=\"submit\" value=\"" . _OK . "\"></form></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		echo "<center><font class=\"option\"><b>" . _ADDUSER . "</b></font><br><br>"
		."<form action=\"".$admin_file.".php\" method=\"post\">"
		."<table border=\"0\" width=\"100%\">"
		."<tr><td width=\"100\">" . _NICKNAME . "</td>"
		."<td><input type=\"text\" name=\"add_uname\" size=\"30\" maxlength=\"25\"> <font class=\"tiny\">" . _REQUIRED . "</font></td></tr>"
		."<tr><td>" . _NAME . "</td>"
		."<td><input type=\"text\" name=\"add_name\" size=\"30\" maxlength=\"50\"></td></tr>"
		."<tr><td>" . _EMAIL . "</td>"
		."<td><input type=\"text\" name=\"add_email\" size=\"30\" maxlength=\"60\"> <font class=\"tiny\">" . _REQUIRED . "</font></td></tr>"
		."<tr><td>" . _FAKEEMAIL . "</td>"
		."<td><input type=\"text\" name=\"add_femail\" size=\"30\" maxlength=\"60\"></td></tr>"
		."<tr><td>" . _URL . "</td>"
		."<td><input type=\"text\" name=\"add_url\" size=\"30\" maxlength=\"60\"></td></tr>"
		."<tr><td>" . _ICQ . "</td>"
		."<td><input type=\"text\" name=\"add_user_icq\" size=\"20\" maxlength=\"20\"></td></tr>"
		."<tr><td>" . _AIM . "</td>"
		."<td><input type=\"text\" name=\"add_user_aim\" size=\"20\" maxlength=\"20\"></td></tr>"
		."<tr><td>" . _YIM . "</td>"
		."<td><input type=\"text\" name=\"add_user_yim\" size=\"20\" maxlength=\"20\"></td></tr>"
		."<tr><td>" . _MSNM . "</td>"
		."<td><input type=\"text\" name=\"add_user_msnm\" size=\"20\" maxlength=\"20\"></td></tr>"
		."<tr><td>" . _LOCATION . "</td>"
		."<td><input type=\"text\" name=\"add_user_from\" size=\"25\" maxlength=\"60\"></td></tr>"
		."<tr><td>" . _OCCUPATION . "</td>"
		."<td><input type=\"text\" name=\"add_user_occ\" size=\"25\" maxlength=\"60\"></td></tr>"
		."<tr><td>" . _INTERESTS . "</td>"
		."<td><input type=\"text\" name=\"add_user_intrest\" size=\"25\" maxlength=\"255\"></td></tr>"
		."<tr><td>" . _OPTION . "</td>"
		."<td><input type=\"checkbox\" name=\"add_user_viewemail\" VALUE=\"1\"> " . _ALLOWUSERS . "</td></tr>"
		."<tr><td>" . _NEWSLETTER . "</td>"
		."<td><input type=\"radio\" name=\"add_newsletter\" value=\"1\">" . _YES . "<br>"
		."<input type=\"radio\" name=\"add_newsletter\" value=\"0\" checked>" . _NO . "</td></tr>"
		."<tr><td>" . _SIGNATURE . "</td>"
		."<td><textarea name=\"add_user_sig\" rows=\"15\" cols=\"70\"></textarea></td></tr>"
		."<tr><td>" . _PASSWORD . "</td>"
		."<td><input type=\"password\" name=\"add_pass\" size=\"12\" maxlength=\"12\"> <font class=\"tiny\">" . _REQUIRED . "</font></td></tr>"
		."<input type=\"hidden\" name=\"add_avatar\" value=\"blank.gif\">"
		."<input type=\"hidden\" name=\"op\" value=\"addUser\">"
		."<tr><td><input type=\"submit\" value=\"" . _ADDUSERBUT . "\"></form></td></tr>"
		."</table>";
		CloseTable();
		include("footer.php");
	}

	function modifyUser($chng_user) {
		global $user_prefix, $db, $admin_file;
		include("header.php");
		GraphicAdmin();
		OpenTable();
		echo "<center><font class=\"title\"><b>" . _USERADMIN . "</b></font></center>";
		CloseTable();
		echo "<br>";
		$result = $db->sql_query("SELECT user_id, username, name, user_website, user_email, femail, user_icq, user_aim, user_yim, user_msnm, user_from, user_occ, user_interests, user_viewemail, user_avatar, user_sig, user_password, newsletter from " . $user_prefix . "_users where user_id='$chng_user' or username='$chng_user'");
		$numrows = $db->sql_numrows($result);
		if($numrows > 0) {
			$row = $db->sql_fetchrow($result);
			$chng_uid = intval($row['user_id']);
			$chng_uname = $row['username'];
			$chng_name = $row['name'];
			$chng_url = $row['user_website'];
			$chng_email = $row['user_email'];
			$chng_femail = $row['femail'];
			$chng_user_icq = $row['user_icq'];
			$chng_user_aim = $row['user_aim'];
			$chng_user_yim = $row['user_yim'];
			$chng_user_msnm = $row['user_msnm'];
			$chng_user_from = $row['user_from'];
			$chng_user_occ = $row['user_occ'];
			$chng_user_intrest = $row['user_interests'];
			$chng_user_viewemail = $row['user_viewemail'];
			$chng_avatar = $row['user_avatar'];
			$chng_user_sig = $row['user_sig'];
			$chng_pass = $row['user_password'];
			$chng_newsletter = intval($row['newsletter']);
			OpenTable();
			echo "<center><font class=\"option\"><b>" . _USERUPDATE . ": <i>$chng_user</i></b></font></center>"
			."<form action=\"".$admin_file.".php\" method=\"post\">"
			."<table border=\"0\">"
			."<tr><td>" . _USERID . "</td>"
			."<td><b>$chng_uid</b></td></tr>"
			."<tr><td>" . _NICKNAME . "</td>"
			."<td><input type=\"text\" name=\"chng_uname\" value=\"$chng_uname\"> <font class=\"tiny\">" . _REQUIRED . "</font></td></tr>"
			."<tr><td>" . _NAME . "</td>"
			."<td><input type=\"text\" name=\"chng_name\" value=\"$chng_name\"></td></tr>"
			."<tr><td>" . _URL . "</td>"
			."<td><input type=\"text\" name=\"chng_url\" value=\"$chng_url\" size=\"30\" maxlength=\"60\"></td></tr>"
			."<tr><td>" . _EMAIL . "</td>"
			."<td><input type=\"text\" name=\"chng_email\" value=\"$chng_email\" size=\"30\" maxlength=\"60\"> <font class=\"tiny\">" . _REQUIRED . "</font></td></tr>"
			."<tr><td>" . _FAKEEMAIL . "</td>"
			."<td><input type=\"text\" name=\"chng_femail\" value=\"$chng_femail\" size=\"30\" maxlength=\"60\"></td></tr>"
			."<tr><td>" . _ICQ . "</td>"
			."<td><input type=\"text\" name=\"chng_user_icq\" value=\"$chng_user_icq\" size=\"20\" maxlength=\"20\"></td></tr>"
			."<tr><td>" . _AIM . "</td>"
			."<td><input type=\"text\" name=\"chng_user_aim\" value=\"$chng_user_aim\" size=\"20\" maxlength=\"20\"></td></tr>"
			."<tr><td>" . _YIM . "</td>"
			."<td><input type=\"text\" name=\"chng_user_yim\" value=\"$chng_user_yim\" size=\"20\" maxlength=\"20\"></td></tr>"
			."<tr><td>" . _MSNM . "</td>"
			."<td><input type=\"text\" name=\"chng_user_msnm\" value=\"$chng_user_msnm\" size=\"20\" maxlength=\"20\"></td></tr>"
			."<tr><td>" . _LOCATION . "</td>"
			."<td><input type=\"text\" name=\"chng_user_from\" value=\"$chng_user_from\" size=\"25\" maxlength=\"60\"></td></tr>"
			."<tr><td>" . _OCCUPATION . "</td>"
			."<td><input type=\"text\" name=\"chng_user_occ\" value=\"$chng_user_occ\" size=\"25\" maxlength=\"60\"></td></tr>"
			."<tr><td>" . _INTERESTS . "</td>"
			."<td><input type=\"text\" name=\"chng_user_intrest\" value=\"$chng_user_intrest\" size=\"25\" maxlength=\"255\"></td></tr>"
			."<tr><td>" . _OPTION . "</td>";
			if ($chng_user_viewemail ==1) {
				echo "<td><input type=\"checkbox\" name=\"chng_user_viewemail\" value=\"1\" checked> " . _ALLOWUSERS . "</td></tr>";
			} else {
				echo "<td><input type=\"checkbox\" name=\"chng_user_viewemail\" value=\"1\"> " . _ALLOWUSERS . "</td></tr>";
			}
			if ($chng_newsletter == 1) {
				echo "<tr><td>" . _NEWSLETTER . "</td><td><input type=\"radio\" name=\"chng_newsletter\" value=\"1\" checked>" . _YES . "&nbsp;&nbsp;"
				."<input type=\"radio\" name=\"chng_newsletter\" value=\"0\">" . _NO . "</td></tr>";
			} elseif ($chng_newsletter == 0) {
				echo "<tr><td>" . _NEWSLETTER . "</td><td><input type=\"radio\" name=\"chng_newsletter\" value=\"1\">" . _YES . "&nbsp;&nbsp;"
				."<input type=\"radio\" name=\"chng_newsletter\" value=\"0\" checked>" . _NO . "</td></tr>";
			}
			$subnum = $db->sql_numrows($db->sql_query("SELECT * FROM " . $prefix . "_subscriptions WHERE userid='$chng_uid'"));
			if ($subnum == 0) {
				$content .= "<tr><td>" . _SUBUSERASK . "</td><td><input type='radio' name='subscription' value='1'> " . _YES . "&nbsp;&nbsp;&nbsp;<input type='radio' name='subscription' value='0' checked> " . _NO . "</td></tr>";
				$content .= "<tr><td>" . _SUBPERIOD . "</td><td><select name='subscription_expire'>";
				$content .= "<option value='0' selected>" . _NONE . "</option>";
				$content .= "<option value='1'>1 "._YEAR."</option>";
				$content .= "<option value='2'>2 "._YEARS."</option>";
				$content .= "<option value='3'>3 "._YEARS."</option>";
				$content .= "<option value='4'>4 "._YEARS."</option>";
				$content .= "<option value='5'>5 "._YEARS."</option>";
				$content .= "<option value='6'>6 "._YEARS."</option>";
				$content .= "<option value='7'>7 "._YEARS."</option>";
				$content .= "<option value='8'>8 "._YEARS."</option>";
				$content .= "<option value='9'>9 "._YEARS."</option>";
				$content .= "<option value='10'>10 "._YEARS."</option>";
				$content .= "</select><input type='hidden' name='reason' value='0'></td></tr>";
			} elseif ($subnum == 1) {
				$content .= "<tr><td>"._UNSUBUSER."</td><td><input type='radio' name='subscription' value='0'> "._YES."&nbsp;&nbsp;&nbsp;<input type='radio' name='subscription' value='1' checked> "._NO."</td></tr>";
				$content .= "<tr><td>"._ADDSUBPERIOD."</td><td><select name='subscription_expire'>";
				$content .= "<option value='0' selected>"._NONE."</option>";
				$content .= "<option value='1'>1 "._YEAR."</option>";
				$content .= "<option value='2'>2 "._YEARS."</option>";
				$content .= "<option value='3'>3 "._YEARS."</option>";
				$content .= "<option value='4'>4 "._YEARS."</option>";
				$content .= "<option value='5'>5 "._YEARS."</option>";
				$content .= "<option value='6'>6 "._YEARS."</option>";
				$content .= "<option value='7'>7 "._YEARS."</option>";
				$content .= "<option value='8'>8 "._YEARS."</option>";
				$content .= "<option value='9'>9 "._YEARS."</option>";
				$content .= "<option value='10'>10 "._YEARS."</option>";
				$content .= "</select></td></tr>";
				$content .= "<tr><td>"._ADMSUBEXPIREIN."</td><td>";
				$rows = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_subscriptions WHERE userid='$chng_uid'"));
				$diff = $rows[subscription_expire]-time();
				$yearDiff = floor($diff/60/60/24/365);
				$diff -= $yearDiff*60*60*24*365;
				if ($yearDiff < 1) {
					$diff = $rows[subscription_expire]-time();
				}
				$daysDiff = floor($diff/60/60/24);
				$diff -= $daysDiff*60*60*24;
				$hrsDiff = floor($diff/60/60);
				$diff -= $hrsDiff*60*60;
				$minsDiff = floor($diff/60);
				$diff -= $minsDiff*60;
				$secsDiff = $diff;
				if ($yearDiff < 1) {
					$rest = "$daysDiff "._SBDAYS.", $hrsDiff "._SBHOURS.", $minsDiff "._SBMINUTES.", $secsDiff "._SBSECONDS."";
				} elseif ($yearDiff == 1) {
					$rest = "$yearDiff "._SBYEAR.", $daysDiff "._SBDAYS.", $hrsDiff "._SBHOURS.", $minsDiff "._SBMINUTES.", $secsDiff "._SBSECONDS."";
				} elseif ($yearDiff > 1) {
					$rest = "$yearDiff "._SBYEARS.", $daysDiff "._SBDAYS.", $hrsDiff "._SBHOURS.", $minsDiff "._SBMINUTES.", $secsDiff "._SBSECONDS."";
				}
				$content .= "<font color='#FF0000'>$rest</font></td></tr>";
				$content .= "<tr><td>"._SUBREASON."</td><td><textarea name='reason' cols='70' rows='15'></textarea></td></tr>";
			}
			echo "$content";
			echo "<tr><td>" . _SIGNATURE . "</td>"
			."<td><textarea name=\"chng_user_sig\" rows=\"15\" cols=\"70\">$chng_user_sig</textarea></td></tr>"
			."<tr><td>" . _PASSWORD . "</td>"
			."<td><input type=\"password\" name=\"chng_pass\" size=\"12\" maxlength=\"12\"></td></tr>"
			."<tr><td>" . _RETYPEPASSWD . "</td>"
			."<td><input type=\"password\" name=\"chng_pass2\" size=\"12\" maxlength=\"12\"> <font class=\"tiny\">" . _FORCHANGES . "</font></td></tr>"
			."<input type=\"hidden\" name=\"chng_avatar\" value=\"$chng_avatar\">"
			."<input type=\"hidden\" name=\"chng_uid\" value=\"$chng_uid\">"
			."<input type=\"hidden\" name=\"op\" value=\"updateUser\">"
			."<tr><td><input type=\"submit\" value=\"" . _SAVECHANGES . "\"></form></td></tr>"
			."</table>";
			CloseTable();
		} else {
			OpenTable();
			echo "<center><b>" . _USERNOEXIST . "</b><br><br>"
			."" . _GOBACK . "</center>";
			CloseTable();
		}
		include("footer.php");
	}

	function updateUser($chng_uid, $chng_uname, $chng_name, $chng_url, $chng_email, $chng_femail, $chng_user_icq, $chng_user_aim, $chng_user_yim, $chng_user_msnm, $chng_user_from, $chng_user_occ, $chng_user_intrest, $chng_user_viewemail, $chng_avatar, $chng_user_sig, $chng_pass, $chng_pass2, $chng_newsletter, $subscription, $subscription_expire, $reason) {
		global $user_prefix, $db, $prefix, $nukeurl, $sitename, $adminmail, $subscription_url, $admin_file;
		$chng_uid = intval($chng_uid);
		$tmp = 0;
		if ($chng_pass2 != "") {
			if($chng_pass != $chng_pass2) {
				include("header.php");
				GraphicAdmin();
				OpenTable();
				echo "<center><font class=\"title\"><b>" . _USERADMIN . "</b></font></center>";
				CloseTable();
				echo "<br>";
				OpenTable();
				echo "<center>" . _PASSWDNOMATCH . "<br><br>"
				."" . _GOBACK . "</center>";
				CloseTable();
				include("footer.php");
				exit;
			}
			$tmp = 1;
		}
		if ($tmp == 0) {
			$db->sql_query("update " . $user_prefix . "_users set username='$chng_uname', name='$chng_name', user_email='$chng_email', femail='$chng_femail', user_website='$chng_url', user_icq='$chng_user_icq', user_aim='$chng_user_aim', user_yim='$chng_user_yim', user_msnm='$chng_user_msnm', user_from='$chng_user_from', user_occ='$chng_user_occ', user_interests='$chng_user_intrest', user_viewemail='$chng_user_viewemail', user_avatar='$chng_avatar', user_sig='$chng_user_sig', newsletter='$chng_newsletter' where user_id='$chng_uid'");
		}
		if ($tmp == 1) {
			$cpass = md5($chng_pass);
			$db->sql_query("update " . $user_prefix . "_users set username='$chng_uname', name='$chng_name', user_email='$chng_email', femail='$chng_femail', user_website='$chng_url', user_icq='$chng_user_icq', user_aim='$chng_user_aim', user_yim='$chng_user_yim', user_msnm='$chng_user_msnm', user_from='$chng_user_from', user_occ='$chng_user_occ', user_interests='$chng_user_intrest', user_viewemail='$chng_user_viewemail', user_avatar='$chng_avatar', user_sig='$chng_user_sig', user_password='$cpass', newsletter='$chng_newsletter' where user_id='$chng_uid'");
		}
		$subnum = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_subscriptions WHERE userid='$chng_uid'"));
		$row = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_subscriptions WHERE userid='$chng_uid'"));
		$row2 = $db->sql_fetchrow($db->sql_query("SELECT username, user_email FROM ".$user_prefix."_users WHERE user_id='$chng_uid'"));
		if ($reason == "") {
			$reason = 0;
		}
		if ($subnum == 1) {
			if ($subscription == 0) {
				$from = "$sitename <$adminmail>";
				$subject = "$sitename "._SUBCANCELLED."";
				if ($reason == "0") {
					if ($subscription_url != "") {
						$body = ""._HELLO." $row2[username]!\n\n"._SUBCANCEL."\n\n"._SUBNEEDTOAPPLY." $subscription_url\n\n"._SUBTHANKSATT."\n\n$sitename "._TEAM."\n$nukeurl";
					} else {
						$body = ""._HELLO." $row2[username]!\n\n"._SUBCANCEL."\n\n"._SUBTHANKSATT."\n\n$sitename "._TEAM."\n$nukeurl";
					}
				} else {
					if ($subscription_url != "") {
						$body = ""._HELLO." $row2[username]!\n\n"._SUBCANCELREASON."\n\n$reason\n\n"._SUBNEEDTOAPPLY." $subscription_url\n\n"._SUBTHANKSATT."\n\n$sitename "._TEAM."\n$nukeurl";
					} else {
						$body = ""._HELLO." $row2[username]!\n\n"._SUBCANCELREASON."\n\n$reason\n\n"._SUBTHANKSATT."\n\n$sitename "._TEAM."\n$nukeurl";
					}
				}
				$db->sql_query("DELETE FROM ".$prefix."_subscriptions WHERE userid='$chng_uid'");
				mail($row2[user_email], $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());
			} elseif ($subscription == 1) {
				if ($subscription_expire != 0) {
					$from = "$sitename <$adminmail>";
					$subject = "$sitename "._SUBUPDATEDSUB."";
					$body = ""._HELLO." $row2[username]!\n\n"._SUBUPDATED." $subscription_expire "._SUBYEARSTOACCOUNT."\n\n"._SUBTHANKSSUPP."\n\n$sitename "._TEAM."\n$nukeurl";
					$expire = $subscription_expire*31536000;
					if ($subnum == 0) {
						$expire = $expire+time();
					}
					$expire = $expire+$row[subscription_expire];
					$db->sql_query("UPDATE ".$prefix."_subscriptions SET subscription_expire='$expire' WHERE userid='$chng_uid'");
					mail($row2[user_email], $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());
				}
			}
		} elseif ($subnum == 0 AND $subscription == 1) {
			if ($subscription_expire != 0) {
				$expire = $subscription_expire*31536000;
				$expire = $expire+time();
				$db->sql_query("INSERT INTO ".$prefix."_subscriptions VALUES (NULL, '$chng_uid', '$expire')");
				$from = "$sitename <$adminmail>";
				$subject = "$sitename "._SUBACTIVATED."";
				$body = ""._HELLO." $row2[username]!\n\n"._SUBOPENED." $subscription_expire "._SUBOPENED2."\n\n"._SUBHOPELIKE."\n"._SUBTHANKSSUPP2."\n\n$sitename "._TEAM."\n$nukeurl";
				mail($row2[user_email], $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());
			}
		}
		Header("Location: ".$admin_file.".php?op=adminMain");
	}

	switch($op) {

		case "mod_users":
		displayUsers();
		break;

		case "modifyUser":
		modifyUser($chng_uid);
		break;

		case "updateUser":
		updateUser($chng_uid, $chng_uname, $chng_name, $chng_url, $chng_email, $chng_femail, $chng_user_icq, $chng_user_aim, $chng_user_yim, $chng_user_msnm, $chng_user_from, $chng_user_occ, $chng_user_intrest, $chng_user_viewemail, $chng_avatar, $chng_user_sig, $chng_pass, $chng_pass2, $chng_newsletter, $subscription, $subscription_expire, $reason);
		break;

		case "delUser":
		include("header.php");
		GraphicAdmin();
		OpenTable();
		echo "<center><font class=\"title\"><b>" . _USERADMIN . "</b></font></center>";
		CloseTable();
		echo "<br>";
		OpenTable();
		echo "<center><font class=\"option\"><b>" . _DELETEUSER . "</b></font><br><br>"
		."" . _SURE2DELETE . " $chng_uid?<br><br>"
		."[ <a href=\"".$admin_file.".php?op=delUserConf&amp;del_uid=$chng_uid\">" . _YES . "</a> | <a href=\"".$admin_file.".php?op=mod_users\">" . _NO . "</a> ]</center>";
		CloseTable();
		include("footer.php");
		break;

		case "delUserConf":
		$db->sql_query("delete from " . $user_prefix . "_users where username='$del_uid'");
		Header("Location: ".$admin_file.".php?op=adminMain");
		break;

		case "addUser":
		$add_pass = md5($add_pass);
		if (!($add_uname && $add_email && $add_pass)) {
			include("header.php");
			GraphicAdmin();
			OpenTable();
			echo "<center><font class=\"title\"><b>" . _USERADMIN . "</b></font></center>";
			CloseTable();
			echo "<br>";
			OpenTable();
			echo "<center><b>" . _NEEDTOCOMPLETE . "</b><br><br>"
			."" . _GOBACK . "";
			CloseTable();
			include("footer.php");
			return;
		}
		$numrow = $db->sql_numrows($db->sql_query("SELECT user_id FROM ".$user_prefix."_users WHERE username='$add_uname'"));
		if ($numrow > 0) {
			include("header.php");
			GraphicAdmin();
			OpenTable();
			echo "<center><font class=\"title\"><b>" . _USERADMIN . "</b></font></center>";
			CloseTable();
			echo "<br>";
			OpenTable();
			echo "<center><b>" . _USERALREADYEXISTS . "</b><br><br>"
			."" . _GOBACK . "";
			CloseTable();
			include("footer.php");
			return;
		} else {
			$user_regdate = date("M d, Y");
			$sql = "insert into " . $user_prefix . "_users ";
			$sql .= "(user_id,name,username,user_email,femail,user_website,user_regdate,user_icq,user_aim,user_yim,user_msnm,user_from,user_occ,user_interests,user_viewemail,user_avatar,user_sig,user_password,newsletter,broadcast,popmeson) ";
			$sql .= "values (NULL,'$add_name','$add_uname','$add_email','$add_femail','$add_url','$user_regdate','$add_user_icq','$add_user_aim','$add_user_yim','$add_user_msnm','$add_user_from','$add_user_occ','$add_user_intrest','$add_user_viewemail','$add_avatar','$add_user_sig','$add_pass','$add_newsletter','1','0')";
			$result = $db->sql_query($sql);
			if (!$result) {
				return;
			}
		}
		Header("Location: ".$admin_file.".php?op=adminMain");
		break;

	}

} else {
	include("header.php");
	GraphicAdmin();
	OpenTable();
	echo "<center><b>"._ERROR."</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
	CloseTable();
	include("footer.php");
}

?>