<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2005 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

define('NUKE_FILE', true);
if (file_exists("includes/custom_files/custom_mainfile.php")) {
	@include_once("includes/custom_files/custom_mainfile.php");
}

ini_set('display_errors','0');

//Union Tap
//Copyright Zhen-Xjell 2004 http://nukecops.com
//Beta 3 Code to prevent UNION SQL Injections
unset($matches);
unset($loc);
if (preg_match("/([OdWo5NIbpuU4V2iJT0n]{5}) /", rawurldecode($loc=$_SERVER["QUERY_STRING"]), $matches)) {
	die();
}

$queryString = strtolower($_SERVER['QUERY_STRING']);
if (stripos_clone($queryString,'%20union%20') OR stripos_clone($queryString,'/*') OR stripos_clone($queryString,'*/union/*') OR stripos_clone($queryString,'c2nyaxb0')) {
	header("Location: index.php");
	die();
}

$phpver = phpversion();
if ($phpver < '4.1.0') {
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_SERVER = $HTTP_SERVER_VARS;
}
if ($phpver >= '4.0.4pl1' && strstr($_SERVER["HTTP_USER_AGENT"],'compatible')) {
	if (extension_loaded('zlib')) {
		ob_end_clean();
		ob_start('ob_gzhandler');
	}
} else if ($phpver > '4.0') {
	if (strstr($HTTP_SERVER_VARS['HTTP_ACCEPT_ENCODING'], 'gzip')) {
		if (extension_loaded('zlib')) {
			$do_gzip_compress = TRUE;
			ob_start();
			ob_implicit_flush(0);
			//header('Content-Encoding: gzip');
		}
	}
}

$phpver = explode(".", $phpver);
$phpver = "$phpver[0]$phpver[1]";
if ($phpver >= 41) {
	$PHP_SELF = $_SERVER['PHP_SELF'];
}

if (!ini_get("register_globals")) {
	import_request_variables('GPC');
}

if(isset($admin))
{
	$admin = base64_decode($admin);
	$admin = addslashes($admin);
	$admin = base64_encode($admin);
}

if(isset($user))
{
	$user = base64_decode($user);
	$user = addslashes($user);
	$user = base64_encode($user);
}

foreach ($_GET as $sec_key => $secvalue) {
	if ((eregi("<[^>]*script*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*object*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*iframe*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*applet*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*meta*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*style*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*form*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*img*\"?[^>]*>", $secvalue)) ||
	(eregi("<[^>]*onmouseover*\"?[^>]*>", $secvalue)) ||
	(eregi("\([^>]*\"?[^)]*\)", $secvalue)) ||
	(eregi("\"", $secvalue)) ||
	(eregi("forum_admin", $sec_key)) ||
	(eregi("inside_mod", $sec_key))) {
		die ("<center><img src=images/logo.gif><br><br><b>The html tags you attempted to use are not allowed</b><br><br>[ <a href=\"javascript:history.go(-1)\"><b>Go Back</b></a> ]");
	}
}

foreach ($_POST as $secvalue) {
	if ((eregi("<[^>]*onmouseover*\"?[^>]*>", $secvalue)) || (eregi("<[^>]script*\"?[^>]*>", $secvalue)) || (eregi("<[^>]style*\"?[^>]*>", $secvalue))) {
		die ("<center><img src=images/logo.gif><br><br><b>The html tags you attempted to use are not allowed</b><br><br>[ <a href=\"javascript:history.go(-1)\"><b>Go Back</b></a> ]");
	}
}

if (stristr($_SERVER['SCRIPT_NAME'], "mainfile.php")) {
	Header("Location: index.php");
	die();
}

if (defined('FORUM_ADMIN')) {
	@require_once("../../../config.php");
	@require_once("../../../db/db.php");
} elseif (defined('INSIDE_MOD')) {
	@require_once("../../config.php");
	@require_once("../../db/db.php");
} else {
	@require_once("config.php");
	@require_once("db/db.php");
	/* FOLLOWING TWO LINES ARE DEPRECATED BUT ARE HERE FOR OLD MODULES COMPATIBILITY */
	/* PLEASE START USING THE NEW SQL ABSTRACTION LAYER. SEE MODULES DOC FOR DETAILS */
	@require_once("includes/sql_layer.php");
	$dbi = sql_connect($dbhost, $dbuname, $dbpass, $dbname);
}

$mainfile = 1;
$result = $db->sql_query("SELECT * FROM ".$prefix."_config");
$row = $db->sql_fetchrow($result);
$sitename = $row['sitename'];
$nukeurl = $row['nukeurl'];
$site_logo = $row['site_logo'];
$slogan = $row['slogan'];
$startdate = $row['startdate'];
$adminmail = stripslashes($row['adminmail']);
$anonpost = $row['anonpost'];
$Default_Theme = $row['Default_Theme'];
$foot1 = $row['foot1'];
$foot2 = $row['foot2'];
$foot3 = $row['foot3'];
$commentlimit = intval($row['commentlimit']);
$anonymous = $row['anonymous'];
$minpass = intval($row['minpass']);
$pollcomm = intval($row['pollcomm']);
$articlecomm = intval($row['articlecomm']);
$broadcast_msg = intval($row['broadcast_msg']);
$my_headlines = intval($row['my_headlines']);
$top = intval($row['top']);
$storyhome = intval($row['storyhome']);
$user_news = intval($row['user_news']);
$oldnum = intval($row['oldnum']);
$ultramode = intval($row['ultramode']);
$banners = intval($row['banners']);
$backend_title = $row['backend_title'];
$backend_language = $row['backend_language'];
$language = $row['language'];
$locale = $row['locale'];
$multilingual = intval($row['multilingual']);
$useflags = intval($row['useflags']);
$notify = intval($row['notify']);
$notify_email = $row['notify_email'];
$notify_subject = $row['notify_subject'];
$notify_message = $row['notify_message'];
$notify_from = $row['notify_from'];
$moderate = intval($row['moderate']);
$admingraphic = intval($row['admingraphic']);
$httpref = intval($row['httpref']);
$httprefmax = intval($row['httprefmax']);
$CensorMode = intval($row['CensorMode']);
$CensorReplace = $row['CensorReplace'];
$copyright = $row['copyright'];
$Version_Num = $row['Version_Num'];
$domain = eregi_replace("http://", "", $nukeurl);
$tipath = "images/topics/";
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$start_time = $mtime;

if (!defined('FORUM_ADMIN')) {
	if (isset($newlang) AND !eregi("\.","$newlang")) {
		if (file_exists("language/lang-".$newlang.".php")) {
			setcookie("lang",$newlang,time()+31536000);
			@include("language/lang-".$newlang.".php");
			$currentlang = $newlang;
		} else {
			setcookie("lang",$language,time()+31536000);
			@include("language/lang-".$language.".php");
			$currentlang = $language;
		}
	} elseif (isset($lang)) {
		@include("language/lang-".$lang.".php");
		$currentlang = $lang;
	} else {
		setcookie("lang",$language,time()+31536000);
		@include("language/lang-".$language.".php");
		$currentlang = $language;
	}
}

function get_lang($module) {
	global $currentlang, $language;
	if (file_exists("modules/$module/language/lang-".$currentlang.".php")) {
		if ($module == admin) {
			@include_once("admin/language/lang-".$currentlang.".php");
		} else {
			@include_once("modules/$module/language/lang-".$currentlang.".php");
		}
	} else {
		if ($module != "Forums") {
			if ($module == admin) {
				@include_once("admin/language/lang-".$currentlang.".php");
			} else {
				@include_once("modules/$module/language/lang-".$language.".php");
			}
		}
	}
}

function is_admin($admin) {
	global $prefix, $db;
	if(!is_array($admin)) {
		$admin = base64_decode($admin);
		$admin = addslashes($admin);
		$admin = explode(":", $admin);
		$aid = addslashes($admin[0]);
		$pwd = "$admin[1]";
	} else {
		$aid = addslashes($admin[0]);
		$pwd = "$admin[1]";
	}
	if ($aid != "" AND $pwd != "") {
		$aid = substr("$aid", 0,25);
		$result = $db->sql_query("SELECT pwd FROM ".$prefix."_authors WHERE aid='$aid'");
		$row = $db->sql_fetchrow($result);
		$pass = $row['pwd'];
		if($pass == $pwd && $pass != "") {
			return 1;
		}
	}
	return 0;
}

function is_user($user) {
	global $prefix, $db, $user_prefix;
	if(!is_array($user)) {
		$user = base64_decode($user);
		$user = addslashes($user);
		$user = explode(":", $user);
		$uid = "$user[0]";
		$pwd = "$user[2]";
		$usu = "$user[1]";
	} else {
		$uid = "$user[0]";
		$pwd = "$user[2]";
		$usu = "$user[1]";
	}
	$uid = addslashes($uid);
	$uid = intval($uid);
	if ($uid != "" AND $pwd != "") {
		$result = $db->sql_query("SELECT user_password FROM ".$user_prefix."_users WHERE user_id='$uid'");
		$result2 = $db->sql_query("SELECT id FROM users WHERE usuario='$usu'");
		$row = $db->sql_fetchrow($result);
		$row2 = $db->sql_fetchrow($result2);
		$pass = $row['user_password'];
		$pass2 = $row['id'];
		if($pass == $pwd && $pass != "") {
		//if(1) {
			return 1;
		}
	}
	return 0;
}

/*
function is_user($user) {
	global $prefix, $db, $user_prefix;
	include("config.php");
	/*
	config
	*/
/*
$dbhost = "localhost";
$dbuname = "prolabunlp";
$dbpass = "peReo61";
$dbname = "graduados";

	
	if(!is_array($user)) {
		$user = base64_decode($user);
		$user = addslashes($user);
		$user = explode(":", $user);
		$uid = "$user[0]";
		$pwd = "$user[2]";
	} else {
		$uid = "$user[0]";
		$pwd = "$user[2]";
	}
	$uid = addslashes($uid);
	$uid = intval($uid);
	if ($uid != "" AND $pwd != "") {
		
		$result = $db->sql_query("SELECT usuario FROM users WHERE id='$pwd'");
		$row = $db->sql_fetchrow($result);
		$pass = $row['usuario'];
		//if($pass == $pwd && $pass != "") {
		if(1) {
		
			return 1;
		}
	}
	return 0;
}
*/
function is_group($user, $name) {
	global $prefix, $db, $user_prefix;
	if(!is_array($user)) {
		$user = base64_decode($user);
		$user = addslashes($user);
		$user = explode(":", $user);
		$uid = "$user[0]";
		$pwd = "$user[2]";
	} else {
		$uid = "$user[0]";
		$uid = intval($uid);
		$pwd = "$user[2]";
	}
	if ($uid != "" AND $pwd != "") {
		$result = $db->sql_query("SELECT user_password FROM ".$user_prefix."_users WHERE user_id='$uid'");
		$row = $db->sql_fetchrow($result);
		$pass = $row['user_password'];
		if($pass == $pwd && $pass != "") {
			$result2 = $db->sql_query("SELECT points FROM ".$user_prefix."_users WHERE user_id='$uid'");
			$row2 = $db->sql_fetchrow($result2);
			$points = intval($row2['points']);
			$result3 = $db->sql_query("SELECT mod_group FROM ".$prefix."_modules WHERE title='$name'");
			$row3 = $db->sql_fetchrow($result3);
			$mod_group = $row3['mod_group'];
			$result4 = $db->sql_query("SELECT points FROM ".$prefix."_groups WHERE id='$mod_group'");
			$row4 = $db->sql_fetchrow($result4);
			$grp = intval($row4['points']);
			if (($points >= 0 AND $points >= $grp) OR $mod_group == 0) {
				return 1;
			}
		}
	}
	return 0;
}

function update_points($id) {
	global $user_prefix, $prefix, $db, $user;
	if (is_user($user)) {
		if(!is_array($user)) {
			$user1 = base64_decode($user);
			$user1 = addslashes($user1);
			$user1 = explode(":", $user1);
			$username = "$user1[1]";
		} else {
			$username = "$user1[1]";
		}
		if ($db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_groups")) > '0') {
			$id = intval($id);
			$result = $db->sql_query("SELECT points FROM ".$prefix."_groups_points WHERE id='$id'");
			$row = $db->sql_fetchrow($result);
			$rpoints = intval($row['points']);
			$db->sql_query("UPDATE ".$user_prefix."_users SET points=points+" . $rpoints . " WHERE username='$username'");
		}
	}
}

function title($text) {
	OpenTable();
	echo "<center><font class=\"title\"><b>$text</b></font></center>";
	CloseTable();
	echo "<br>";
}

function is_active($module) {
	global $prefix, $db;
	$module = trim($module);
	$result = $db->sql_query("SELECT active FROM ".$prefix."_modules WHERE title='$module'");
	$row = $db->sql_fetchrow($result);
	$act = intval($row['active']);
	if (!$result OR $act == 0) {
		return 0;
	} else {
		return 1;
	}
}

function render_blocks($side, $blockfile, $title, $content, $bid, $url) {
	if ($url == "") {
		if ($blockfile == "") {
			if ($side == "c") {
				themecenterbox($title, $content);
			} elseif ($side == "d") {
				themecenterbox($title, $content);
			} else {
				themesidebox($title, $content);
			}
		} else {
			if ($side == "c") {
				blockfileinc($title, $blockfile, 1);
			} elseif ($side == "d") {
				blockfileinc($title, $blockfile, 1);
			} else {
				blockfileinc($title, $blockfile);
			}
		}
	} else {
		if ($side == "c" OR $side == "d") {
			headlines($bid,1);
		} else {
			headlines($bid);
		}
	}
}

function blocks($side) {
	global $storynum, $prefix, $multilingual, $currentlang, $db, $admin, $user;
	if ($multilingual == 1) {
		$querylang = "AND (blanguage='$currentlang' OR blanguage='')";
	} else {
		$querylang = "";
	}
	if (strtolower($side[0]) == "l") {
		$pos = "l";
	} elseif (strtolower($side[0]) == "r") {
		$pos = "r";
	}  elseif (strtolower($side[0]) == "c") {
		$pos = "c";
	} elseif  (strtolower($side[0]) == "d") {
		$pos = "d";
	}
	$side = $pos;
	$sql = "SELECT bid, bkey, title, content, url, blockfile, view, expire, action, subscription FROM ".$prefix."_blocks WHERE bposition='$pos' AND active='1' $querylang ORDER BY weight ASC";
	$result = $db->sql_query($sql);
	while($row = $db->sql_fetchrow($result)) {
		$bid = intval($row['bid']);
		$title = stripslashes(check_html($row['title'], "nohtml"));
		$content = stripslashes($row['content']);
		$url = stripslashes($row['url']);
		$blockfile = $row['blockfile'];
		$view = intval($row['view']);
		$expire = intval($row['expire']);
		$action = $row['action'];
		$action = substr("$action", 0,1);
		$now = time();
		$sub = intval($row['subscription']);
		if ($sub == 0 OR ($sub == 1 AND !paid())) {
			if ($expire != 0 AND $expire <= $now) {
				if ($action == "d") {
					$db->sql_query("UPDATE ".$prefix."_blocks SET active='0', expire='0' WHERE bid='$bid'");
					return;
				} elseif ($action == "r") {
					$db->sql_query("DELETE FROM ".$prefix."_blocks WHERE bid='$bid'");
					return;
				}
			}
			if ($row[bkey] == admin) {
				adminblock();
			} elseif ($row[bkey] == userbox) {
				userblock();
			} elseif ($row[bkey] == "") {
				if ($view == 0) {
					render_blocks($side, $blockfile, $title, $content, $bid, $url);
				} elseif ($view == 1 AND is_user($user) || is_admin($admin)) {
					render_blocks($side, $blockfile, $title, $content, $bid, $url);
				} elseif ($view == 2 AND is_admin($admin)) {
					render_blocks($side, $blockfile, $title, $content, $bid, $url);
				} elseif ($view == 3 AND !is_user($user) || is_admin($admin)) {
					render_blocks($side, $blockfile, $title, $content, $bid, $url);
				}
			}
		}
	}
}

function message_box() {
	global $bgcolor1, $bgcolor2, $user, $admin, $cookie, $textcolor2, $prefix, $multilingual, $currentlang, $db, $admin_file;
	if ($multilingual == 1) {
		$querylang = "AND (mlanguage='$currentlang' OR mlanguage='')";
	} else {
		$querylang = "";
	}
	$result = $db->sql_query("SELECT mid, title, content, date, expire, view FROM ".$prefix."_message WHERE active='1' $querylang");
	if ($numrows = $db->sql_numrows($result) == 0) {
		return;
	} else {
		while ($row = $db->sql_fetchrow($result)) {
			$mid = intval($row['mid']);
			$title = stripslashes(check_html($row['title'], "nohtml"));
			$content = stripslashes($row['content']);
			$mdate = $row['date'];
			$expire = intval($row['expire']);
			$view = intval($row['view']);
			if ($title != "" && $content != "") {
				if ($expire == 0) {
					$remain = _UNLIMITED;
				} else {
					$etime = (($mdate+$expire)-time())/3600;
					$etime = (int)$etime;
					if ($etime < 1) {
						$remain = _EXPIRELESSHOUR;
					} else {
						$remain = ""._EXPIREIN." $etime "._HOURS."";
					}
				}
				if ($view == 5 AND paid()) {
					OpenTable();
					echo "<center><font class=\"option\" color=\"$textcolor2\"><b>$title</b></font></center><br>\n"
					."<font class=\"content\">$content</font>";
					if (is_admin($admin)) {
						echo "<br><br><center><font class=\"content\">[ "._MVIEWSUBUSERS." - $remain - <a href=\"".$admin_file.".php?op=editmsg&mid=$mid\">"._EDIT."</a> ]</font></center>";
					}
					CloseTable();
					echo "<br>";
				} elseif ($view == 4 AND is_admin($admin)) {
					OpenTable();
					echo "<center><font class=\"option\" color=\"$textcolor2\"><b>$title</b></font></center><br>\n"
					."<font class=\"content\">$content</font>"
					."<br><br><center><font class=\"content\">[ "._MVIEWADMIN." - $remain - <a href=\"".$admin_file.".php?op=editmsg&mid=$mid\">"._EDIT."</a> ]</font></center>";
					CloseTable();
					echo "<br>";
				} elseif ($view == 3 AND is_user($user) || is_admin($admin)) {
					OpenTable();
					echo "<center><font class=\"option\" color=\"$textcolor2\"><b>$title</b></font></center><br>\n"
					."<font class=\"content\">$content</font>";
					if (is_admin($admin)) {
						echo "<br><br><center><font class=\"content\">[ "._MVIEWUSERS." - $remain - <a href=\"".$admin_file.".php?op=editmsg&mid=$mid\">"._EDIT."</a> ]</font></center>";
					}
					CloseTable();
					echo "<br>";
				} elseif ($view == 2 AND !is_user($user) || is_admin($admin)) {
					OpenTable();
					echo "<center><font class=\"option\" color=\"$textcolor2\"><b>$title</b></font></center><br>\n"
					."<font class=\"content\">$content</font>";
					if (is_admin($admin)) {
						echo "<br><br><center><font class=\"content\">[ "._MVIEWANON." - $remain - <a href=\"".$admin_file.".php?op=editmsg&mid=$mid\">"._EDIT."</a> ]</font></center>";
					}
					CloseTable();
					echo "<br>";
				} elseif ($view == 1) {
					OpenTable();
					echo "<center><font class=\"option\" color=\"$textcolor2\"><b>$title</b></font></center><br>\n"
					."<font class=\"content\">$content</font>";
					if (is_admin($admin)) {
						echo "<br><br><center><font class=\"content\">[ "._MVIEWALL." - $remain - <a href=\"".$admin_file.".php?op=editmsg&mid=$mid\">"._EDIT."</a> ]</font></center>";
					}
					CloseTable();
					echo "<br>";
				}
				if ($expire != 0) {
					$past = time()-$expire;
					if ($mdate < $past) {
						$db->sql_query("UPDATE ".$prefix."_message SET active='0' WHERE mid='$mid'");
					}
				}
			}
		}
	}
}

function online() {
	global $user, $cookie, $prefix, $db;
	cookiedecode($user);
	$ip = $_SERVER["REMOTE_ADDR"];
	$uname = $cookie[1];
	if (!isset($uname)) {
		$uname = "$ip";
		$guest = 1;
	}
	$past = time()-3600;
	$db->sql_query("DELETE FROM ".$prefix."_session WHERE time < '$past'");
	$result = $db->sql_query("SELECT time FROM ".$prefix."_session WHERE uname='$uname'");
	$ctime = time();
	if ($uname!="") {
		$uname = substr("$uname", 0,25);
		if ($row = $db->sql_fetchrow($result)) {
			$db->sql_query("UPDATE ".$prefix."_session SET uname='$uname', time='$ctime', host_addr='$ip', guest='$guest' WHERE uname='$uname'");
		} else {
			$db->sql_query("INSERT INTO ".$prefix."_session (uname, time, host_addr, guest) VALUES ('$uname', '$ctime', '$ip', '$guest')");
		}
	}
}

function blockfileinc($title, $blockfile, $side=0) {
	$blockfiletitle = $title;
	$file = @file("blocks/".$blockfile."");
	if (!$file) {
		$content = _BLOCKPROBLEM;
	} else {
		@include("blocks/".$blockfile."");
	}
	if ($content == "") {
		$content = _BLOCKPROBLEM2;
	}
	if ($side == 1) {
		themecenterbox($blockfiletitle, $content);
	} elseif ($side == 2) {
		themecenterbox($blockfiletitle, $content);
	} else {
		themesidebox($blockfiletitle, $content);
	}
}

function selectlanguage() {
	global $useflags, $currentlang;
	if ($useflags == 1) {
		$title = _SELECTLANGUAGE;
		$content = "<center><font class=\"content\">"._SELECTGUILANG."<br><br>";
		$langdir = dir("language");
		while($func=$langdir->read()) {
			if(substr($func, 0, 5) == "lang-") {
				$menulist .= "$func ";
			}
		}
		closedir($langdir->handle);
		$menulist = explode(" ", $menulist);
		sort($menulist);
		for ($i=0; $i < sizeof($menulist); $i++) {
			if($menulist[$i]!="") {
				$tl = ereg_replace("lang-","",$menulist[$i]);
				$tl = ereg_replace(".php","",$tl);
				$altlang = ucfirst($tl);
				$content .= "<a href=\"index.php?newlang=".$tl."\"><img src=\"images/language/flag-".$tl.".png\" border=\"0\" alt=\"$altlang\" title=\"$altlang\" hspace=\"3\" vspace=\"3\"></a> ";
			}
		}
		$content .= "</font></center>";
		themesidebox($title, $content);
	} else {
		$title = _SELECTLANGUAGE;
		$content = "<center><font class=\"content\">"._SELECTGUILANG."<br><br></font>";
		$content .= "<form action=\"index.php\" method=\"get\"><select name=\"newlanguage\" onChange=\"top.location.href=this.options[this.selectedIndex].value\">";
		$handle=opendir('language');
		while ($file = readdir($handle)) {
			if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
				$langFound = $matches[1];
				$languageslist .= "$langFound ";
			}
		}
		closedir($handle);
		$languageslist = explode(" ", $languageslist);
		sort($languageslist);
		for ($i=0; $i < sizeof($languageslist); $i++) {
			if($languageslist[$i]!="") {
				$content .= "<option value=\"index.php?newlang=$languageslist[$i]\" ";
				if($languageslist[$i]==$currentlang) $content .= " selected";
				$content .= ">".ucfirst($languageslist[$i])."</option>\n";
			}
		}
		$content .= "</select></form></center>";
		themesidebox($title, $content);
	}
}

function ultramode() {
	global $prefix, $db;
	$ultra = "ultramode.txt";
	$file = fopen("$ultra", "w");
	fwrite($file, "General purpose self-explanatory file with news headlines\n");
	$result = $db->sql_query("SELECT sid, aid, title, time, comments, topic FROM ".$prefix."_stories ORDER BY time DESC LIMIT 0,10");
	while ($row = $db->sql_fetchrow($result)) {
		$rsid = intval($row['sid']);
		$raid = $row['aid'];
		$rtitle = stripslashes(check_html($row['title'], "nohtml"));
		$rtime = $row['time'];
		$rcomments = stripslashes($row['comments']);
		$rtopic = intval($row['topic']);
		$row2 = $db->sql_fetchrow($db->sql_query("select topictext, topicimage from ".$prefix."_topics where topicid='$rtopic'"));
		$topictext = stripslashes(check_html($row2['topictext'], "nohtml"));
		$topicimage = $row2['topicimage'];
		$content = "%%\n$rtitle\n/modules.php?name=News&file=article&sid=$rsid\n$rtime\n$raid\n$topictext\n$rcomments\n$topicimage\n";
		fwrite($file, $content);
	}
	fclose($file);
}

function cookiedecode($user) {
	global $cookie, $prefix, $db, $user_prefix;
	$user = base64_decode($user);
	$user = addslashes($user);
	$user = htmlentities($user, ENT_QUOTES);
	$cookie = explode(":", $user);
	$result = $db->sql_query("SELECT user_password FROM ".$user_prefix."_users WHERE username='$cookie[1]'");
	//$result = $db->sql_query("SELECT id,usuario FROM aux WHERE id='$pwd'");
	$row = $db->sql_fetchrow($result);
	$pass = $row['id'];
	if ($cookie[2] == $pass && $pass != "") {
	//if (1) {
		return $cookie;
	} else {
		unset($user);
		unset($cookie);
	}
}

function getusrinfo($user) {
	global $userinfo, $user_prefix, $db;
	$user2 = base64_decode($user);
	$user2 = addslashes($user2);
	$user3 = explode(":", $user2);
	$result = $db->sql_query("SELECT * FROM ".$user_prefix."_users WHERE username='$user3[1]' AND user_password='$user3[2]'");
	if ($db->sql_numrows($result) == 1) {
		$userinfo = $db->sql_fetchrow($result);
	}
	return $userinfo;
}

function FixQuotes ($what = "") {
	$what = ereg_replace("'","''",$what);
	while (eregi("\\\\'", $what)) {
		$what = ereg_replace("\\\\'","'",$what);
	}
	return $what;
}

/*********************************************************/
/* text filter                                           */
/*********************************************************/

function check_words($Message) {
	global $CensorMode, $CensorReplace, $EditedMessage;
	@include("config.php");
	$EditedMessage = $Message;
	if ($CensorMode != 0) {
		if (is_array($CensorList)) {
			$Replace = $CensorReplace;
			if ($CensorMode == 1) {
				for ($i = 0; $i < count($CensorList); $i++) {
					$EditedMessage = eregi_replace("$CensorList[$i]([^a-zA-Z0-9])","$Replace\\1",$EditedMessage);
				}
			} elseif ($CensorMode == 2) {
				for ($i = 0; $i < count($CensorList); $i++) {
					$EditedMessage = eregi_replace("(^|[^[:alnum:]])$CensorList[$i]","\\1$Replace",$EditedMessage);
				}
			} elseif ($CensorMode == 3) {
				for ($i = 0; $i < count($CensorList); $i++) {
					$EditedMessage = eregi_replace("$CensorList[$i]","$Replace",$EditedMessage);
				}
			}
		}
	}
	return ($EditedMessage);
}

function delQuotes($string){
	/* no recursive function to add quote to an HTML tag if needed */
	/* and delete duplicate spaces between attribs. */
	$tmp="";    # string buffer
	$result=""; # result string
	$i=0;
	$attrib=-1; # Are us in an HTML attrib ?   -1: no attrib   0: name of the attrib   1: value of the atrib
	$quote=0;   # Is a string quote delimited opened ? 0=no, 1=yes
	$len = strlen($string);
	while ($i<$len) {
		switch($string[$i]) { # What car is it in the buffer ?
		case "\"": #"       # a quote.
		if ($quote==0) {
			$quote=1;
		} else {
			$quote=0;
			if (($attrib>0) && ($tmp != "")) { $result .= "=\"$tmp\""; }
			$tmp="";
			$attrib=-1;
		}
		break;
		case "=":           # an equal - attrib delimiter
		if ($quote==0) {  # Is it found in a string ?
		$attrib=1;
		if ($tmp!="") $result.=" $tmp";
		$tmp="";
		} else $tmp .= '=';
		break;
		case " ":           # a blank ?
		if ($attrib>0) {  # add it to the string, if one opened.
		$tmp .= $string[$i];
		}
		break;
		default:            # Other
		if ($attrib<0)    # If we weren't in an attrib, set attrib to 0
		$attrib=0;
		$tmp .= $string[$i];
		break;
		}
		$i++;
	}
	if (($quote!=0) && ($tmp != "")) {
		if ($attrib==1) $result .= "=";
		/* If it is the value of an atrib, add the '=' */
		$result .= "\"$tmp\"";  /* Add quote if needed (the reason of the function ;-) */
	}
	return $result;
}

function check_html ($str, $strip="") {
	/* The core of this code has been lifted from phpslash */
	/* which is licenced under the GPL. */
	@include("config.php");
	if ($strip == "nohtml")
	$AllowableHTML=array('');
	$str = stripslashes($str);
	$str = eregi_replace("<[[:space:]]*([^>]*)[[:space:]]*>",'<\\1>', $str);
	// Delete all spaces from html tags .
	$str = eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?[[:space:]]*([^\" >]*)[[:space:]]*\"?[^>]*>",'<a href="\\1">', $str);
	// Delete all attribs from Anchor, except an href, double quoted.
	$str = eregi_replace("<[[:space:]]* img[[:space:]]*([^>]*)[[:space:]]*>", '', $str);
	// Delete all img tags
	$str = eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?javascript[[:punct:]]*\"?[^>]*>", '', $str);
	// Delete javascript code from a href tags -- Zhen-Xjell @ http://nukecops.com
	$tmp = "";
	while (ereg("<(/?[[:alpha:]]*)[[:space:]]*([^>]*)>",$str,$reg)) {
		$i = strpos($str,$reg[0]);
		$l = strlen($reg[0]);
		if ($reg[1][0] == "/") $tag = strtolower(substr($reg[1],1));
		else $tag = strtolower($reg[1]);
		if ($a = $AllowableHTML[$tag])
		if ($reg[1][0] == "/") $tag = "</$tag>";
		elseif (($a == 1) || ($reg[2] == "")) $tag = "<$tag>";
		else {
			# Place here the double quote fix function.
			$attrb_list=delQuotes($reg[2]);
			// A VER
			$attrb_list = ereg_replace("&","&amp;",$attrb_list);
			$tag = "<$tag" . $attrb_list . ">";
		} # Attribs in tag allowed
		else $tag = "";
		$tmp .= substr($str,0,$i) . $tag;
		$str = substr($str,$i+$l);
	}
	$str = $tmp . $str;
	return $str;
	exit;
	/* Squash PHP tags unconditionally */
	$str = ereg_replace("<\?","",$str);
	return $str;
}

function filter_text($Message, $strip="") {
	global $EditedMessage;
	check_words($Message);
	$EditedMessage=check_html($EditedMessage, $strip);
	return ($EditedMessage);
}

/*********************************************************/
/* formatting stories                                    */
/*********************************************************/

function formatTimestamp($time) {
	global $datetime, $locale;
	setlocale (LC_TIME, $locale);
	ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $datetime);
	$datetime = strftime(""._DATESTRING."", mktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]));
	$datetime = ucfirst($datetime);
	return($datetime);
}

function formatAidHeader($aid) {
	global $prefix, $db;
	$result = $db->sql_query("SELECT url, email FROM ".$prefix."_authors WHERE aid='$aid'");
	$row = $db->sql_fetchrow($result);
	$url = stripslashes($row['url']);
	$email = stripslashes($row['email']);
	if ((isset($url)) && ($url != "http://")) {
		$aid = "<a href=\"$url\">$aid</a>";
	} elseif (isset($email)) {
		$aid = "<a href=\"mailto:$email\">$aid</a>";
	} else {
		$aid = $aid;
	}
	echo "$aid";
}

function get_author($aid) {
	global $prefix, $db;
	$result = $db->sql_query("SELECT url, email FROM ".$prefix."_authors WHERE aid='$aid'");
	$row = $db->sql_fetchrow($result);
	$url = stripslashes($row['url']);
	$email = stripslashes($row['email']);
	if ((isset($url)) && ($url != "http://")) {
		$aid = "<a href=\"$url\">$aid</a>";
	} elseif (isset($email)) {
		$aid = "<a href=\"mailto:$email\">$aid</a>";
	} else {
		$aid = $aid;
	}
	return($aid);
}

function themepreview($title, $hometext, $bodytext="", $notes="") {
	echo "<b>$title</b><br><br>$hometext";
	if ($bodytext != "") {
		echo "<br><br>$bodytext";
	}
	if ($notes != "") {
		echo "<br><br><b>"._NOTE."</b> <i>$notes</i>";
	}
}

function adminblock() {
	global $admin, $prefix, $db, $admin_file;
	if (is_admin($admin)) {
		$result = $db->sql_query("SELECT title, content FROM ".$prefix."_blocks WHERE bkey='admin'");
		while ($row = $db->sql_fetchrow($result)) {
			$content = "<font class=\"content\">$row[content]</font>";
			themesidebox($row[title], $row[content]);
		}
		$title = ""._WAITINGCONT."";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_queue"));
		$content = "<font class=\"content\">";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=submissions\">"._SUBMISSIONS."</a>: $num<br>";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_reviews_add"));
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=reviews\">"._WREVIEWS."</a>: $num<br>";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_links_newlink"));
		$brokenl = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_links_modrequest WHERE brokenlink='1'"));
		$modreql = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_links_modrequest WHERE brokenlink='0'"));
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=Links\">"._WLINKS."</a>: $num<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=LinksListModRequests\">"._MODREQLINKS."</a>: $modreql<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=LinksListBrokenLinks\">"._BROKENLINKS."</a>: $brokenl<br>";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_newdownload"));
		$brokend = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_modrequest WHERE brokendownload='1'"));
		$modreqd = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_modrequest WHERE brokendownload='0'"));
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=downloads\">"._UDOWNLOADS."</a>: $num<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=DownloadsListModRequests\">"._MODREQDOWN."</a>: $modreqd<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=DownloadsListBrokenDownloads\">"._BROKENDOWN."</a>: $brokend<br></font>";
		themesidebox($title, $content);
	}
}

function loginbox() {
	global $user, $sitekey, $gfx_chk;

	mt_srand ((double)microtime()*1000000);
	$maxran = 1000000;
	$random_num = mt_rand(0, $maxran);
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $random_num . $datekey));
	$code = substr($rcode, 2, 6);

	if (!is_user($user)) {
		$title = _LOGIN;
		$boxstuff = "<form action=\"modules.php?name=Your_Account\" method=\"post\">";
		$boxstuff .= "<center><font class=\"content\">"._NICKNAME."<br>";
		$boxstuff .= "<input type=\"text\" name=\"username\" size=\"8\" maxlength=\"25\"><br>";
		$boxstuff .= ""._PASSWORD."<br>";
		$boxstuff .= "<input type=\"password\" name=\"user_password\" size=\"8\" maxlength=\"20\"><br>";
		if (extension_loaded("gd") AND ($gfx_chk == 2 OR $gfx_chk == 4 OR $gfx_chk == 5 OR $gfx_chk == 7)) {
			$boxstuff .= ""._SECURITYCODE.": <img src='?gfx=gfx&amp;random_num=$random_num' border='1' alt='"._SECURITYCODE."' title='"._SECURITYCODE."'><br>\n";
			$boxstuff .= ""._TYPESECCODE."<br><input type=\"text\" NAME=\"gfx_check\" SIZE=\"7\" MAXLENGTH=\"6\">\n";
			$boxstuff .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\"><br>\n";
		} else {
			$boxstuff .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\">";
			$boxstuff .= "<input type=\"hidden\" name=\"gfx_check\" value=\"$code\">";
		}
		$boxstuff .= "<input type=\"hidden\" name=\"op\" value=\"login\">";
		$boxstuff .= "<input type=\"submit\" value=\""._LOGIN."\"></font></center></form>";
		$boxstuff .= "<center><font class=\"content\">"._ASREGISTERED."</font></center>";
		themesidebox($title, $boxstuff);
	}
}

function userblock() {
	global $user, $cookie, $db, $user_prefix;
	if((is_user($user)) AND ($cookie[8])) {
		$sql = "SELECT ublock FROM ".$user_prefix."_users WHERE user_id='$cookie[0]'";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		$title = ""._MENUFOR." $cookie[1]";
		themesidebox($title, $row[ublock]);
	}
}

function getTopics($s_sid) {
	global $topicname, $topicimage, $topictext, $prefix, $db;
	$sid = intval($s_sid);
	$row = $db->sql_fetchrow($db->sql_query("SELECT topic FROM ".$prefix."_stories WHERE sid='$sid'"));
	$rtopic = $row['topic'];
	$result2 = $db->sql_query("SELECT topicid, topicname, topicimage, topictext FROM ".$prefix."_topics WHERE topicid='$rtopic'");
	$row2 = $db->sql_fetchrow($result2);
	$topicid = intval($row2['topicid']);
	$topicname = $row2['topicname'];
	$topicimage = $row2['topicimage'];
	$topictext = stripslashes(check_html($row2['topictext'], "nohtml"));
}

function headlines($bid, $cenbox=0) {
	global $prefix, $db;
	$bid = intval($bid);
	$result = $db->sql_query("SELECT title, content, url, refresh, time FROM ".$prefix."_blocks WHERE bid='$bid'");
	$row = $db->sql_fetchrow($result);
	$title = stripslashes(check_html($row['title'], "nohtml"));
	$content = stripslashes($row['content']);
	$url = $row['url'];
	$refresh = intval($row['refresh']);
	$otime = $row['time'];
	$past = time()-$refresh;
	if ($otime < $past) {
		$btime = time();
		$rdf = parse_url($url);
		$fp = fsockopen($rdf['host'], 80, $errno, $errstr, 15);
		if (!$fp) {
			$content = "";
			$db->sql_query("UPDATE ".$prefix."_blocks SET content='$content', time='$btime' WHERE bid='$bid'");
			$cont = 0;
			if ($cenbox == 0) {
				themesidebox($title, $content);
			} else {
				themecenterbox($title, $content);
			}
			return;
		}
		if ($fp) {
			if ($rdf['query'] != '')
			$rdf['query'] = "?" . $rdf['query'];

			fputs($fp, "GET " . $rdf['path'] . $rdf['query'] . " HTTP/1.0\r\n");
			fputs($fp, "HOST: " . $rdf['host'] . "\r\n\r\n");
			$string	= "";
			while(!feof($fp)) {
				$pagetext = fgets($fp,300);
				$string .= chop($pagetext);
			}
			fputs($fp,"Connection: close\r\n\r\n");
			fclose($fp);
			$items = explode("</item>",$string);
			$content = "<font class=\"content\">";
			for ($i=0;$i<10;$i++) {
				$link = ereg_replace(".*<link>","",$items[$i]);
				$link = ereg_replace("</link>.*","",$link);
				$title2 = ereg_replace(".*<title>","",$items[$i]);
				$title2 = ereg_replace("</title>.*","",$title2);
				$title2 = stripslashes($title2);
				if ($items[$i] == "" AND $cont != 1) {
					$content = "";
					$db->sql_query("UPDATE ".$prefix."_blocks SET content='$content', time='$btime' WHERE bid='$bid'");
					$cont = 0;
					if ($cenbox == 0) {
						themesidebox($title, $content);
					} else {
						themecenterbox($title, $content);
					}
					return;
				} else {
					if (strcmp($link,$title2) AND $items[$i] != "") {
						$cont = 1;
						$content .= "<strong><big>&middot;</big></strong><a href=\"$link\" target=\"new\">$title2</a><br>\n";
					}
				}
			}

		}
		$db->sql_query("UPDATE ".$prefix."_blocks SET content='$content', time='$btime' WHERE bid='$bid'");
	}
	$siteurl = ereg_replace("http://","",$url);
	$siteurl = explode("/",$siteurl);
	if (($cont == 1) OR ($content != "")) {
		$content .= "<br><a href=\"http://$siteurl[0]\" target=\"blank\"><b>"._HREADMORE."</b></a></font>";
	} elseif (($cont == 0) OR ($content == "")) {
		$content = "<font class=\"content\">"._RSSPROBLEM."</font>";
	}
	if ($cenbox == 0) {
		themesidebox($title, $content);
	} else {
		themecenterbox($title, $content);
	}
}

function automated_news() {
	global $prefix, $multilingual, $currentlang, $db;
	if ($multilingual == 1) {
		$querylang = "WHERE (alanguage='$currentlang' OR alanguage='')"; /* the OR is needed to display stories who are posted to ALL languages */
	} else {
		$querylang = "";
	}
	$today = getdate();
	$day = $today[mday];
	if ($day < 10) {
		$day = "0$day";
	}
	$month = $today[mon];
	if ($month < 10) {
		$month = "0$month";
	}
	$year = $today[year];
	$hour = $today[hours];
	$min = $today[minutes];
	$sec = "00";
	$result = $db->sql_query("SELECT anid, time FROM ".$prefix."_autonews $querylang");
	while ($row = $db->sql_fetchrow($result)) {
		$anid = $row['anid'];
		$time = $row['time'];
		ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $date);
		if (($date[1] <= $year) AND ($date[2] <= $month) AND ($date[3] <= $day)) {
			if (($date[4] < $hour) AND ($date[5] >= $min) OR ($date[4] <= $hour) AND ($date[5] <= $min)) {
				$result2 = $db->sql_query("SELECT * FROM ".$prefix."_autonews WHERE anid='$anid'");
				while ($row2 = $db->sql_fetchrow($result2)) {
					$title = stripslashes(FixQuotes(check_html($row2['title'], "nohtml")));
					$hometext = stripslashes(FixQuotes($row2['hometext']));
					$bodytext = stripslashes(FixQuotes($row2['bodytext']));
					$notes = stripslashes(FixQuotes($row2['notes']));
					$catid2 = intval($row2['catid']);
					$aid2 = $row2['aid'];
					$time2 = $row2['time'];
					$topic2 = $row2['topic'];
					$informant2 = $row2['informant'];
					$ihome2 = intval($row2['ihome']);
					$alanguage2 = $row2['alanguage'];
					$acomm2 = intval($row2['acomm']);
					$associated2 = $row2['associated'];
					$num = $db->sql_numrows($db->sql_query("SELECT sid FROM ".$prefix."_stories WHERE title='$title'"));
					if ($num == 0) {
						$db->sql_query("DELETE FROM ".$prefix."_autonews WHERE anid='$anid'");
						$db->sql_query("INSERT INTO ".$prefix."_stories VALUES (NULL, '$catid2', '$aid2', '$title', '$time2', '$hometext', '$bodytext', '0', '0', '$topic2', '$informant2', '$notes', '$ihome2', '$alanguage2', '$acomm2', '0', '0', '0', '0', '0', '$associated2')");
					}
				}
			}
		}
	}
}

function themecenterbox2($title, $content) {
	OpenTable();
	echo "<center><font class=\"option\"><b>$title</b></font></center><br>"
	."$content";
	CloseTable();
	echo "<br>";
}

function public_message() {
	global $prefix, $user_prefix, $db, $user, $admin, $p_msg, $cookie, $broadcast_msg;
	if ($broadcast_msg == 1) {
		if (is_user($user)) {
			cookiedecode($user);
			$result = $db->sql_query("SELECT broadcast FROM ".$user_prefix."_users WHERE username='$cookie[1]'");
			$row = $db->sql_fetchrow($result);
			$upref = $row['broadcast'];
			if ($upref == 1) {
				$t_off = "<br><p align=\"right\">[ <a href=\"modules.php?name=Your_Account&amp;op=edithome\"><font color=\"FFFFFF\" size=\"2\">"._TURNOFFMSG."</font></a> ]</font>";
				$pm_show = 1;
			} else {
				$pm_show = 0;
			}
		} else {
			$t_off = "";
		}
		if (!is_user($user) OR (is_user($user) AND ($pm_show == 1))) {
			$c_mid = base64_decode($p_msg);
			$c_mid = addslashes($c_mid);
			$c_mid = intval($c_mid);
			$result2 = $db->sql_query("SELECT mid, content, date, who FROM ".$prefix."_public_messages WHERE mid > '$c_mid' ORDER BY date ASC LIMIT 1");
			$row2 = $db->sql_fetchrow($result2);
			$mid = intval($row2['mid']);
			$content = $row2['content'];
			$tdate = $row2['date'];
			$who = $row2['who'];
			if ((!isset($c_mid)) OR ($c_mid = $mid)) {
				$public_msg = "<br><table width=\"90%\" border=\"1\" cellspacing=\"2\" cellpadding=\"0\" bgcolor=\"FFFFFF\" align=\"center\"><tr><td>\n";
				$public_msg .= "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"2\" bgcolor=\"FF0000\"><tr><td>\n";
				$public_msg .= "<font color=\"FFFFFF\" size=\"3\"><b>"._BROADCASTFROM." <a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$who\"><font color=\"FFFFFF\" size=\"3\">$who</font></a>: \"$content\"</b>";
				$public_msg .= "$t_off";
				$public_msg .= "</td></tr></table>";
				$public_msg .= "</td></tr></table>";
				$ref_date = $tdate+600;
				$actual_date = time();
				if ($actual_date >= $ref_date) {
					$public_msg = "";
					$numrows = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_public_messages"));
					if ($numrows == 1) {
						$db->sql_query("DELETE FROM ".$prefix."_public_messages");
						$mid = 0;
					} else {
						$db->sql_query("DELETE FROM ".$prefix."_public_messages WHERE mid='$mid'");
					}
				}
				if ($mid == 0 OR $mid == "") {
					setcookie("p_msg");
				} else {
					$mid = base64_encode($mid);
					$mid = addslashes($mid);
					setcookie("p_msg",$mid,time()+600);
				}
			}
		}
	} else {
		$public_msg = "";
	}
	return($public_msg);
}

function get_theme() {
	global $user, $cookie, $Default_Theme;
	if(is_user($user)) {
		$user2 = base64_decode($user);
		$user2 = addslashes($user2);
		$t_cookie = explode(":", $user2);
		if($t_cookie[9]=="") $t_cookie[9]=$Default_Theme;
		if(isset($theme)) $t_cookie[9]=$theme;
		if(!$tfile=@opendir("themes/$t_cookie[9]")) {
			$ThemeSel = $Default_Theme;
		} else {
			$ThemeSel = $t_cookie[9];
		}
	} else {
		$ThemeSel = $Default_Theme;
	}
	return($ThemeSel);
}

function removecrlf($str) {
	// Function for Security Fix by Ulf Harnhammar, VSU Security 2002
	// Looks like I don't have so bad track record of security reports as Ulf believes
	// He decided to not contact me, but I'm always here, digging on the net
	return strtr($str, "\015\012", ' ');
}

function paid() {
	global $db, $user, $cookie, $adminmail, $sitename, $nukeurl, $subscription_url, $user_prefix, $prefix;
	if (is_user($user)) {
		if ($subscription_url != "") {
			$renew = ""._SUBRENEW." $subscription_url";
		} else {
			$renew = "";
		}
		cookiedecode($user);
		$sql = "SELECT * FROM ".$prefix."_subscriptions WHERE userid='$cookie[0]'";
		$result = $db->sql_query($sql);
		$numrows = $db->sql_numrows($result);
		$row = $db->sql_fetchrow($result);
		if ($numrows == 0) {
			return 0;
		} elseif ($numrows != 0) {
			$time = time();
			if ($row[subscription_expire] <= $time) {
				$db->sql_query("DELETE FROM ".$prefix."_subscriptions WHERE userid='$cookie[0]' AND id='$row[id]'");
				$from = "$sitename <$adminmail>";
				$subject = "$sitename: "._SUBEXPIRED."";
				$body = ""._HELLO." $cookie[1]:\n\n"._SUBSCRIPTIONAT." $sitename "._HASEXPIRED."\n$renew\n\n"._HOPESERVED."\n\n$sitename "._TEAM."\n$nukeurl";
				$row = $db->sql_fetchrow($db->sql_query("SELECT user_email FROM ".$user_prefix."_users WHERE id='$cookie[0]' AND nickname='$cookie[1]' AND password='$cookie[2]'"));
				mail($row[user_email], $subject, $body, "From: $from\nX-Mailer: PHP/" . phpversion());
			}
			return 1;
		}
	} else {
		return 0;
	}
}

function stripos_clone($haystack, $needle, $offset=0) {
	return strpos(strtoupper($haystack), strtoupper($needle), $offset);
}

switch($gfx) {

	case "gfx":
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
	$code = substr($rcode, 2, 6);
	$ThemeSel = get_theme();
	if (file_exists("themes/$ThemeSel/images/code_bg.jpg")) {
		$image = ImageCreateFromJPEG("themes/$ThemeSel/images/code_bg.jpg");
	} else {
		$image = ImageCreateFromJPEG("images/code_bg.jpg");
	}
	$text_color = ImageColorAllocate($image, 80, 80, 80);
	Header("Content-type: image/jpeg");
	ImageString ($image, 5, 12, 2, $code, $text_color);
	ImageJPEG($image, '', 75);
	ImageDestroy($image);
	die();
	break;

	case "gfx_little":
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER[HTTP_USER_AGENT] . $sitekey . $random_num . $datekey));
	$code = substr($rcode, 2, 3);
	$ThemeSel = get_theme();
	if (file_exists("themes/$ThemeSel/images/code_bg_little.jpg")) {
		$image = ImageCreateFromJPEG("themes/$ThemeSel/images/code_bg_little.jpg");
	} else {
		$image = ImageCreateFromJPEG("images/code_bg_little.jpg");
	}
	$text_color = ImageColorAllocate($image, 80, 80, 80);
	Header("Content-type: image/jpeg");
	ImageString ($image, 5, 12, 2, $code, $text_color);
	ImageJPEG($image, '', 75);
	ImageDestroy($image);
	die();
	break;

}

?>