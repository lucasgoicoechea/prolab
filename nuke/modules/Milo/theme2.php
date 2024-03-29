<?php

/************************************************************/
/* Ported Theme Name: Milo (v1.0)                           */
/* Original Theme Name: FungKu (v1.0)                       */
/* Copyright (c) 2001 Somara Sem (http://www.somara.com)    */
/* Last Updated: 09/21/2001 by dezina.com                   */
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

$bgcolor1 = "#efefef";
$bgcolor2 = "#808080";
$bgcolor3 = "#efefef";
$bgcolor4 = "#808080";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

$bgcolor1 ="#efefef"; //Fondo de los layers
$bgcolor2 = "#808080"; //Fondo de los header de las tablas
$bgcolor3 = "#efefef";
$bgcolor4 = "#808080";
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
	    $boxstuff = "<a href=\"modules.php?name=Your_Account&amp;op=userinfo&amp;username=$informant\">$informant</a> ";
	} else {
	    $boxstuff = "$anonymous ";
	}
	$boxstuff .= ""._WRITES." <i>\"$thetext\"</i>$notes\n";
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
    global $user, $banners, $sitename, $slogan, $cookie, $prefix, $db;
    cookiedecode($user);
    $username = $cookie[1];
    if ($username == "") {
        $username = "Anonymous";
    }
    echo "<body bgcolor=\"#ffffff\" text=\"#000000\" link=\"#363636\" vlink=\"#363636\" alink=\"#d5ae83\">\n"
	."<br>\n";
    if ($banners) {
	include("banners.php");
    }
    echo "<br>\n"
	//Logo
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"1\" align=\"center\" bgcolor=\"#FF6666\">\n"
	."<tr>\n"
	."<td bgcolor=\"#6600FF\" width=\"306\">\n"
	."<a href=\"index.php\"><img src=\"themes/Milo/images/logo.jpg\" align=\"left\" alt=\""._WELCOMETO." $sitename\" border=\"0\"></a></td>\n"
	."</tr>\n"
	."</table><br>\n"
	//Imagen Header
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"0\" align=\"center\" bgcolor=\"#33FF33\">\n"
	."<tr>\n"
	."<td bgcolor=\"#808080\">\n"
	."<img src=\"themes/Milo/images/tophighlight.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"
	//Modulo Search y Topicos
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"1\" align=\"center\" bgcolor=\"#ffffff\">\n"
	."<tr valign=\"middle\">\n"
	."<td width=\"400\" bgcolor=\"#C0C0C0\" align=\"left\">\n"
	."&nbsp;</td>\n";
	/*
	."<td bgcolor=\"#C0C0C0\" align=\"center\">\n"
	."<form action=\"modules.php?name=Search\" method=\"post\"><font class=\"content\" color=\"#000000\"><b>"._SEARCH." </b>\n"
	."<input type=\"text\" name=\"query\" size=\"14\"></font></form></td>\n"; //sacar el punto y como
	."<td bgcolor=\"#C0C0C0\" align=\"center\">\n"
	."<form action=\"modules.php?name=Search\" method=\"get\"><font class=\"content\"><b>"._TOPICS." </b>\n";
    $toplist = $db->sql_query("select topicid, topictext from $prefix"._topics." order by topictext");
    echo "<select name=\"topic\"onChange='submit()'>\n"
	."<option value=\"\">"._ALLTOPICS."</option>\n";
    while(list($topicid, $topics) = $db->sql_fetchrow($toplist)) {
	$topicid = intval($topicid);
    if ($topicid==$topic) { $sel = "selected "; }
	echo "<option $sel value=\"$topicid\">$topics</option>\n";
	$sel = "";
    }
    echo "</select></font></form></td>\n"
	."</tr>";
	*/
	// METIENDO EL MENU DHTML
	
	//echo "<tr>";
	echo"<td>";
?>
<!-- 

<script id="Sothink Widgets:index_prototipo.pgt" type="text/javascript" language="JavaScript1.2">
	
stm_bm(["phpjchr",600,"","blank.gif",0,"","",1,0,0,0,50,0,0,0,"","",0,0,1,0,"hand","hand",""],this);
stm_bp("p0",[0,4,0,0,0,5,0,0,71,"",-2,"",-2,90,0,0,"#1D3C81","#1D3C81","",3,0,0,"#FFFFFF"]);
stm_ai("p0i0",[0,"Postulantes","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,1,1,"#1D3C81",0,"#E7EFF4",0,"","",3,3,1,1,"#ffffff #ffffff #ffffff #ffffff","#666666 #666666 #666666 #666666","#FFFFFF","#DD3177","bold 8pt Verdana","bold 8pt Verdana",0,0],150,0);
stm_bpx("p1","p0",[1,4,0,0,2,4,0,0,71,"progid:DXImageTransform.Microsoft.Fade(overlap=.5,enabled=0,Duration=0.42)",-2,"progid:DXImageTransform.Microsoft.Wheel(spokes=16,enabled=0,Duration=0.42)",-2,68,1,2,"#1D3C81","transparent"]);
stm_aix("p1i0","p0i0",[0,"Universitarios","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E7EFF4",0,"#1D3C81",0,"","",3,3,1,1,"#ffffff #ffffff #ffffff #ffffff","#666666 #666666 #666666 #666666","#1D3C81","#FFFFFF"],180,0);
stm_aix("p1i1","p1i0",[0,"No Universitarios"],180,0);
stm_ep();
stm_aix("p0i1","p0i0",[0,"Empresas"],150,0);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i0",[0,"Servicios"],180,0);
stm_aix("p2i1","p1i0",[0,"Suscripción"],180,0);
stm_aix("p2i2","p1i0",[0,"Nuestros Clientes"],180,0);
stm_ep();
stm_aix("p0i2","p0i0",[0,"Institucional","","",-1,-1,0,"","_self","","Información Institucional"],150,0);
stm_bpx("p3","p1",[]);
stm_aix("p3i0","p1i0",[0,"Quienes Somos"],180,0);
stm_aix("p3i1","p1i0",[0,"Objetivos"],180,0);
stm_ep();
stm_aix("p0i3","p0i0",[0,"Asesoramiento","","",-1,-1,0,"","_self","","Consejos para la busqueda de empleo"],150,0);
stm_bpx("p4","p1",[]);
stm_aix("p4i0","p1i0",[0," Curriculum Vitae","","",-1,-1,0,"","_self","","Consejos de como realizar un buen cv"],180,0);
stm_aix("p4i1","p1i0",[0," Carta de presentación","","",-1,-1,0,"","_self","","Realiza tu propia carta de presentación"],180,0);
stm_aix("p4i2","p1i0",[0," Entrevista laboral","","",-1,-1,0,"","_self","","Algunos consejos como presentarte en una entrevista laboral"],180,0);
stm_ep();
stm_aix("p0i4","p0i0",[0," Investigaciones","","",-1,-1,0,"","_self","","Informes / Estadisticas / Trabajos"],150,0);
stm_bpx("p5","p1",[]);
stm_aix("p5i0","p1i0",[0," Estadisticas"],180,0);
stm_aix("p5i1","p1i0",[0," Informes"],180,0);
stm_aix("p5i2","p1i0",[0," Trabajos"],180,0);
stm_ep();
stm_ep();
stm_em();

</script>
	 -->
	<?
	echo "</td>";
	echo "</tr>";
	echo"</table>\n"
	
	// tocado hacia arriva
	
	
	//Imagen de Header 2
	"<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"0\" align=\"center\" bgcolor=\"#fefefe\">\n"
	."<tr>\n"
	."<td bgcolor=\"#000000\" colspan=\"4\"><IMG src=\"themes/Milo/images/pixel.gif\" width=\"1\" height=1 alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
	."</tr>\n"
	."<tr valign=\"middle\" bgcolor=\"#808080\">\n"
	."<td width=\"15%\" nowrap><font class=\"content\" color=\"#363636\">\n";
    if ($username == "Anonymous") {
		echo "&nbsp;&nbsp;<font color=\"#363636\"><a href=\"modules.php?name=Your_Account\">Create</a></font> an account\n";
    } else {
		echo "&nbsp;&nbsp;"._HELLO." $username! &nbsp;&nbsp;[ <a href=\"modules.php?name=Your_Account&amp;op=logout\">Logout</a> ]";
    }
    echo "</font></td>\n"
	."<td align=\"center\" height=\"20\" width=\"60%\"><font class=\"content\">\n"
        ."&nbsp;\n"
        ."</td>\n"
        ."<td align=\"right\" width=\"25%\"><font class=\"content\">\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \"Enero\",\"Febrero\",\"Marzo\",\"Abril\",\"Mayo\",\"Junio\",\"Julio\",\"Agosto\",\"Septiembre\",\"Octubre\",\"Noviembre\",\"Diciembre\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write( now.getDate() + \" de \" + \" \" + monthNames[now.getMonth()] + \" de \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></font></td>\n"
        ."<td>&nbsp;</td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td bgcolor=\"#000000\" colspan=\"4\"><IMG src=\"themes/Milo/images/pixel.gif\" width=\"1\" height=\"1\" alt=\"\" border=\"0\" hspace=\"0\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
	."<!-- FIN DEL TITULO -->\n"
	//imagen header 3
	."<table width=\"750\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\">\n"
	."<tr valign=\"top\">\n"
	."<td bgcolor=\"#C0C0C0\"><img src=\"themes/Milo/images/pixel.gif\" width=\"1\" height=\"3\" border=\"0\" alt=\"\"></td>\n"
	."</tr>\n"
	."<tr valign=\"top\">\n"
	."<td bgcolor=\"#ffffff\"><img src=\"themes/Milo/images/pixel.gif\" width=\"1\" height=\"5\" border=\"0\" alt=\"\"></td>\n"
	."</tr>\n"
	."</table>\n"
;
	$public_msg = public_message();
    echo "$public_msg<br>";
	//Tabla Principal
	echo "<table width=\"750\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"#ffffff\" align=\"center\"><tr valign=\"top\">\n"
	."<td bgcolor=\"#eeeeee\" width=\"150\" valign=\"top\">\n";
    blocks(left);
    echo "</td><td><img src=\"themes/Milo/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td width=\"100%\">\n";
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
	echo "</td><td><img src=\"themes/Milo/images/pixel.gif\" width=\"15\" height=\"1\" border=\"0\" alt=\"\"></td><td valign=\"top\" width=\"150\" bgcolor=\"#eeeeee\">\n";
	blocks(right);
    }
    echo "</td>\n"
	."</tr></table>\n"
        ."<table bgcolor=\"#000000\" width=\"750\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n"
        ."<tr>\n"
        ."<td width=\"750\" height=\"5\"><img src=\"themes/Milo/images/bottombar.gif\" width=\"750\" height=\"5\" border=\"0\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."<tr>\n"
        ."<td width=\"100%\"><img src=\"themes/Milo/images/pixel.gif\" width=\"1\" height=\"1\" border=\"0\" alt=\"\"></td>\n"
        ."</tr>\n"
        ."</table>\n"
        ."<br>\n"
        ."<br>\n"
        ."<table width=\"750\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\">\n"
        ."<tr align=\"center\">\n"
        ."<td width=\"100%\" colspan=\"3\">\n";
    footmsg();
    echo "</td>\n"
        ."</tr>\n"
        ."</table>\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the Homepage         */
/************************************************************/

function themeindex ($aid, $informant, $time, $title, $counter, $topic, $thetext, $notes, $morelink, $topicname, $topicimage, $topictext) {
    global $anonymous, $tipath;
    $ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "themes/$ThemeSel/images/topics/$topicimage";
    } else {
	$t_image = "$tipath$topicimage";
    }
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"420\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#C0C0C0\" width=\"100%\"><tr><td align=\"left\">\n"
	."<font class=\"option\" color=\"#363636\"><b>$title</b></font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<font color=\"#999999\"><b><a href=\"modules.php?name=News&amp;new_topic=$topic\"><img src=\"$t_image\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a></B></font>\n";
    FormatStory($thetext, $notes, $aid, $informant);
    echo "</td></tr></table><br>\n"
	."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#eeeeee\" width=\"100%\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td align=\"center\">\n"
	."<font color=\"#999999\" size=\"1\">"._POSTEDBY." ";
    formatAidHeader($aid);
    echo " "._ON." $time $timezone ($counter "._READS.")<br></font>\n"
	."<font class=\"content\">$morelink</font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<br>\n\n\n";
}

/************************************************************/
/* Function themeindex()                                    */
/*                                                          */
/* This function format the stories on the story page, when */
/* you click on that "Read More..." link in the home        */
/************************************************************/

function themearticle ($aid, $informant, $datetime, $title, $thetext, $topic, $topicname, $topicimage, $topictext) {
    global $admin, $sid, $tipath;
    $ThemeSel = get_theme();
    if (file_exists("themes/$ThemeSel/images/topics/$topicimage")) {
	$t_image = "themes/$ThemeSel/images/topics/$topicimage";
    } else {
	$t_image = "$tipath$topicimage";
    }
    echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"#ffffff\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"100%\"><tr><td>\n"
        ."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#808080\" width=\"100%\"><tr><td align=\"left\">\n"
        ."<font class=\"option\" color=\"#363636\"><b>$title</b></font><br>\n"
        ."<font class=\"content\">"._POSTEDON." $datetime "._BY." ";
    formatAidHeader($aid);
    echo "</td></tr></table></td></tr></table><br>";
    echo "<a href=\"modules.php?name=News&amp;new_topic=$topic\"><img src=\"$t_image\" border=\"0\" Alt=\"$topictext\" align=\"right\" hspace=\"10\" vspace=\"10\"></a>\n";
    FormatStory($thetext, $notes="", $aid, $informant);
    echo "</td></tr></table><br>\n\n\n";
}

/************************************************************/
/* Function themesidebox()                                  */
/*                                                          */
/* Control look of your blocks. Just simple.                */
/************************************************************/

function themesidebox($title, $content) {
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"#000000\" width=\"150\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#C0C0C0\" width=\"100%\"><tr><td align=left>\n"
	."<font class=\"content\" color=\"#363636\"><b>$title</b></font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"150\">\n"
	."<tr valign=\"top\"><td>\n"
	."$content\n"
	."</td></tr></table>\n"
	."<br>\n\n\n";
}

?>
