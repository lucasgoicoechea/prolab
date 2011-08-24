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
		
if (eregi("javascript.php",$_SERVER['PHP_SELF'])) {
    Header("Location: ../index.php");
    die();
}

##################################################
# Include for some common javascripts functions  #
##################################################

global $module, $name, $admin, $advanced_editor, $lang;

if (file_exists("themes/$ThemeSel/style/editor.css")) {
    $edtcss = "editor_css : \"themes/$ThemeSel/style/editor.css\",";
} else {
    $edtcss = "editor_css : \"includes/tiny_mce/themes/default/editor_ui.css\",";
}

if (is_admin($admin) AND defined('ADMIN_FILE') AND $advanced_editor == 1) {
	echo "<!-- tinyMCE -->
		<script language=\"javascript\" type=\"text/javascript\" src=\"includes/tiny_mce/tiny_mce.js\"></script>
		<script language=\"javascript\" type=\"text/javascript\">
	   	tinyMCE.init({
		mode : \"textareas\",
		theme : \"advanced\",
		language : \"$lang\",
		force_p_newlines: \"false\",
		force_br_newlines: \"true\",
		plugins : \"table,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,zoom,flash,searchreplace,print\",
		theme_advanced_buttons1_add : \"fontselect,fontsizeselect\",
		theme_advanced_buttons2_add : \"separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor\",
		theme_advanced_buttons2_add_before: \"cut,copy,paste,separator,search,replace,separator\",
		theme_advanced_buttons3_add_before : \"tablecontrols,separator\",
		theme_advanced_buttons3_add : \"emotions,iespell,flash,advhr,separator,print\",
		theme_advanced_toolbar_location : \"top\",
		theme_advanced_toolbar_align : \"left\",
		theme_advanced_path_location : \"bottom\",
		$edtcss
	    	plugin_insertdate_dateFormat : \"%Y-%m-%d\",
	    	plugin_insertdate_timeFormat : \"%H:%M:%S\",
		extended_valid_elements : \"a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]\",
		external_link_list_url : \"example_link_list.js\",
		external_image_list_url : \"example_image_list.js\",
		flash_external_list_url : \"example_flash_list.js\",
		file_browser_callback : \"fileBrowserCallBack\"
	});
	function fileBrowserCallBack(field_name, url, type) {
		// This is where you insert your custom filebrowser logic
		alert(\"Filebrowser callback: \" + field_name + \",\" + url + \",\" + type);
	}		</script>
		<!-- /tinyMCE -->";
} elseif (is_admin($admin) AND $advanced_editor != 1 AND $name != "Private_Messages") {
	echo "<!-- tinyMCE -->
		<script language=\"javascript\" type=\"text/javascript\" src=\"includes/tiny_mce/tiny_mce.js\"></script>
		<script language=\"javascript\" type=\"text/javascript\">
	   	tinyMCE.init({
      		mode : \"textareas\",
			theme : \"basic\",
			language : \"$lang\",
			$edtcss
			force_p_newlines: \"false\",
			force_br_newlines: \"true\"
	   	});
		</script>
		<!-- /tinyMCE -->";
} elseif ($name != "Private_Messages" AND $name != "Forums") {
	echo "<!-- tinyMCE -->
		<script language=\"javascript\" type=\"text/javascript\" src=\"includes/tiny_mce/tiny_mce.js\"></script>
		<script language=\"javascript\" type=\"text/javascript\">
	   	tinyMCE.init({
      		mode : \"textareas\",
			theme : \"default\",
			language : \"$lang\",
			$edtcss
			force_p_newlines: \"false\",
			force_br_newlines: \"true\"
	   	});
		</script>
		<!-- /tinyMCE -->";
}

if ($userpage == 1) {
    echo "<SCRIPT type=\"text/javascript\">\n";
    echo "<!--\n";
    echo "function showimage() {\n";
    echo "if (!document.images)\n";
    echo "return\n";
    echo "document.images.avatar.src=\n";
    echo "'$nukeurl/modules/Forums/images/avatars/gallery/' + document.Register.user_avatar.options[document.Register.user_avatar.selectedIndex].value\n";
    echo "}\n";
    echo "//-->\n";
    echo "</SCRIPT>\n\n";
}

if ($module == 1 AND file_exists("modules/$name/copyright.php")) {
    echo "<script type=\"text/javascript\">\n";
    echo "<!--\n";
    echo "function openwindow(){\n";
    echo "	window.open (\"modules/$name/copyright.php\",\"Copyright\",\"toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=no,copyhistory=no,width=400,height=200\");\n";
    echo "}\n";
    echo "//-->\n";
    echo "</SCRIPT>\n\n";
}

?>
<script type="text/javascript" language="JavaScript">
<!-- Copyright 2000 William Bontrager

// The GetCookie() function returns the number of times a
//    cookie with a specific name has been set on the
//    visitor's computer.


// How many days shall the cookie live on your user's
//    computer?

DaysToLive = 0;


// No other customizations required.


// This function looks for a cookie with a specific name on the visitor's hard drive.
function GetCookie(name) {
// Start by assuming no cookie exists.
var cookiecontent = '0';
// The browser's cookies can hold data we're not interested in, all in one
//     long string of characters. Thus, we need to find out where our specific
//     cookie begins and ends (provided the one we want actually exists).
//
// If any cookies are available ...
if(document.cookie.length > 0) {
   // Determine begin position of the cookie with the specified name.
   var cookiename = name + '=';
   var cookiebegin = document.cookie.indexOf(cookiename);
   // Initialize the end position at zero.
   var cookieend = 0;
   // If a cookie with the specified name is actually available ...
   if(cookiebegin > -1) {
      // Offset the begin position of the cookie by the lengh of the cookie name.
      cookiebegin += cookiename.length;
      // Determine the end position of the cookie.
      cookieend = document.cookie.indexOf(";",cookiebegin);
      if(cookieend < cookiebegin) { cookieend = document.cookie.length; }
      // Put the cookie into our own variable "cookiecontent".
      cookiecontent = document.cookie.substring(cookiebegin,cookieend);
   }
}
// Increment cookie content by 1 and store in variable "value".
var value = parseInt(cookiecontent) + 1;
// Put the incremented value as a new cookie on the visitor's hard drive.
PutCookie(name,value);
// Return the incremented value to the calling line of code.
return value;
}

// This function puts the cookie on the visitor's hard drive.
function PutCookie(n,v) {
// Begin by assuming no expiration date is applicable.
var exp = '';
// If an expiration date is applicable, determine the future date
//      and store the date in variable "exp" in the correct format.
if(DaysToLive > 0) {
   var now = new Date();
   then = now.getTime() + (DaysToLive * 24 * 60 * 60 * 1000);
   now.setTime(then);
   exp = '; expires=' +
   now.toGMTString();
}
// Put the cookie on the user's hard drive with path set to root
//     and with any applicable expiration date.
document.cookie = n + "=" + v + '; path=/' + exp;
}
// -->
</script>
<script type="text/javascript" language="JavaScript"><!--
function Popup(url,w,h) {
var attributes = 'resizable=yes,scrollbars=yes,' +
'width=' + w + ',height=' + h;
window.open(url,"DescPopup",attributes);
} //-->
</script>

<?
?>