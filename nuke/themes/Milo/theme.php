
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

$bgcolor1 = "white";//Fondo de los layers
$bgcolor2 = "#808080";//Fondo de los header de las tablas
$bgcolor3 = "#efefef";//
$bgcolor4 = "#808080";
$textcolor1 = "#000000";
$textcolor2 = "#000000";

/*
* colores originales del tema 
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
*/

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
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"0\" align=\"center\" bgcolor=\"#ffffff\">\n"
	."<tr>\n"
	."<td bgcolor=\"#ffffff\" width=\"306\" >\n"
	//."<a href=\"index.php\"><img  src=\"themes/Milo/images/logo.jpg\" align=\"left\" alt=\""._WELCOMETO." $sitename\" border=\"1\"  ></a>"
	."<a href=\"index.php\"><img  src=\"themes/Milo/images/logo.jpg\" align=\"left\" alt=\"Bienvenido al Prolab\" border=\"0\"  ></a>"
	."</td>\n"
	//<td height="122" colspan="3">
	//."<div align=\"center\"><img src=\"themes/Milo/images/logo.jpg\" width=\"589\" height=\"144\"></td>\n</div>"
	
	
	."</tr>\n"
	."</table><br>\n"
	//Imagen Header
	."<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"0\" align=\"center\" bgcolor=\"red\">\n"
	."<tr>\n"
	."<td bgcolor=\"#B04C58\" >\n"
	."aca poner una imagen q sirva de top</td>\n"
	//."<img src=\"themes/Milo/images/tophighlight.gif\"></td>\n"
	."</tr>\n"
	."</table>\n"; //; no
	
	//Imagen de Header 2 la Gris con LA FECHA
	echo"<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"0\" align=\"center\" >\n"
	
	."<tr valign=\"middle\" bgcolor=\"#1D3C81\">\n"
	
	    ."<td align=\"right\"  heigth =\"100%\" width=\"100%\"><font class=\"content2\">\n"
        ."<script type=\"text/javascript\">\n\n"
        ."<!--   // Array ofmonth Names\n"
        ."var monthNames = new Array( \"Enero\",\"Febrero\",\"Marzo\",\"Abril\",\"Mayo\",\"Junio\",\"Julio\",\"Agosto\",\"Septiembre\",\"Octubre\",\"Noviembre\",\"Diciembre\");\n"
        ."var now = new Date();\n"
        ."thisYear = now.getYear();\n"
        ."if(thisYear < 1900) {thisYear += 1900}; // corrections if Y2K display problem\n"
        ."document.write( now.getDate() + \" de \" + \" \" + monthNames[now.getMonth()] + \" de \" + thisYear);\n"
        ."// -->\n\n"
        ."</script></font></td>\n"
        
    ."</tr>\n"
        
        ."</table>"
	."<!-- FIN DEL TITULO -->\n"
	
	
	//imagen header 3
	."<table width=\"750\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" bgcolor=\"red\" align=\"center\">\n"

	."<tr valign=\"top\">\n"
	."<td bgcolor=\"#ffffff\"><img src=\"themes/Milo/images/pixel.gif\" width=\"1\" height=\"7\" border=\"0\" alt=\"\"></td>\n"
	."</tr>\n"
	."</table>\n"
;
	
	// Meniu 1 del prolab                 antes//Modulo Search y Topicos
	
	echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"750\" border=\"0\" align=\"center\" bgcolor=\"white\">\n"
	."<tr valign=\"middle\">\n";
/*	
//Links
//  Institucional
$quienesSomos ="http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=3";
$convenios = "";
$objetivos = "";
//  Empresas
$servicios = "";
$suscripcion ="";
$modalidadesDeContratacion ="";
//  Asesoramiento
$cartaDePresentacion ="";
$comoArmarTuCV = "";
*/	
?>

<script type="text/javascript" language="JavaScript1.2">

//Links
//  Institucional
quienesSomos ="http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=5";
convenios = "http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=3";
objetivos = "http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=6";
//  Empresas
servicios = "http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=7";
suscripcion ="http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=8";
modalidadesDeContratacion ="http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=9";
//  Asesoramiento
cartaDePresentacion ="http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=12";
comoArmarTuCV = "http://www.prolab.unlp.edu.ar/new1/PHP-Nuke/html/modules.php?name=Content&pa=showpage&pid=10";


stm_bm(["phpjchr",600,"","blank.gif",0,"","",1,0,0,0,50,0,0,0,"","",0,0,1,0,"hand","hand",""],this);
stm_bp("p0",[0,4,0,0,0,5,0,0,71,"",-2,"",-2,90,0,0,"#1D3C81","#1D3C81","",3,0,0,"#FFFFFF"]);
stm_ai("p0i0",[0,"Postulantes","","",-1,-1,0,"","_self","","Postulantes","","",0,0,0,"","",0,0,0,1,1,"#1D3C81",0,"#E7EFF4",0,"","",3,3,1,1,"#ffffff #ffffff #ffffff #ffffff","#666666 #666666 #666666 #666666","#FFFFFF","#DD3177","bold 8pt Verdana","bold 8pt Verdana",0,0],150,0);
stm_bpx("p1","p0",[1,4,0,0,2,4,0,0,71,"progid:DXImageTransform.Microsoft.Fade(overlap=.5,enabled=0,Duration=0.42)",-2,"progid:DXImageTransform.Microsoft.Wheel(spokes=16,enabled=0,Duration=0.42)",-2,68,1,2,"#1D3C81","transparent"]);
stm_aix("p1i0","p0i0",[0,"Universitarios","","",-1,-1,0,"","_self","","","","",0,0,0,"","",0,0,0,0,1,"#E7EFF4",0,"#1D3C81",0,"","",3,3,1,1,"#ffffff #ffffff #ffffff #ffffff","#666666 #666666 #666666 #666666","#1D3C81","#FFFFFF"],180,0);
stm_aix("p1i1","p1i0",[0,"No Universitarios"],180,0);
stm_ep();
stm_aix("p0i1","p0i0",[0,"Empresas","","",-1,-1,0,"","_self","","Empresas"],150,0);
stm_bpx("p2","p1",[]);
stm_aix("p2i0","p1i0",[0,"Servicios","","",-1,-1,0,servicios],200,0);
stm_aix("p2i1","p1i0",[0,"Suscripción","","",-1,-1,0,suscripcion],200,0);
stm_aix("p2i2","p1i0",[0,"Modalidades de Contratación","","",-1,-1,0,modalidadesDeContratacion],200,0);
stm_ep();
stm_aix("p0i2","p0i0",[0,"Institucional","","",-1,-1,0,"","_self","","Información Institucional"],150,0);
stm_bpx("p3","p1",[]);
stm_aix("p3i0","p1i0",[0,"Quienes Somos","","",-1,-1,0,quienesSomos],180,0);
stm_aix("p3i1","p1i0",[0,"Objetivos","","",-1,-1,0,objetivos],180,0);
stm_aix("p3i2","p1i0",[0,"Convenios","","",-1,-1,0,convenios],180,0);
stm_ep();
stm_aix("p0i3","p0i0",[0,"Asesoramiento","","",-1,-1,0,"","_self","","Consejos para la busqueda de empleo"],150,0);
stm_bpx("p4","p1",[]);
stm_aix("p4i0","p1i0",[0,"Cómo armar tu CV","","",-1,-1,0,comoArmarTuCV],180,0);
stm_aix("p4i1","p1i0",[0," Carta de Presentación","","",-1,-1,0,cartaDePresentacion],180,0);
stm_aix("p4i2","p1i0",[0,"Asesoramiento Contable"],180,0);
stm_ep();
stm_aix("p0i4","p0i0",[0," Investigaciones","","",-1,-1,0,"","_self","","Informes / Estadisticas / Encuestas"],150,0);
stm_bpx("p5","p1",[]);
stm_aix("p5i0","p1i0",[0," Estadísticas"],180,0);
stm_aix("p5i1","p1i0",[0," Informes"],180,0);
stm_aix("p5i2","p1i0",[0," Encuesta"],180,0);
stm_ep();
stm_ep();
stm_em();

</script>

 </td>
</td>



<!-- </form></td> -->
	<?
	//echo"<td bgcolor=\"#C0C0C0\" align=\"center\">\n";
	echo"</td>\n"
	."</tr>";
	?>
	<!-- menu de eleccion de POSTULANTES GRADUANDOS y LOS NO  -->
<tr valign="top" width="445px" align="center"> 
      <script id="Sothink Widgets:index_nuevo1.pgt" type="text/javascript" language="JavaScript1.2">
<!--
stm_bm(["phpjchr",600,"","blank.gif",0,"","",1,0,0,0,50,0,0,0,"","",0,0,1,0,"default","hand",""],this);
stm_bp("p0",[0,4,0,0,5,2,0,0,71,"",-2,"",-2,90,0,0,"#FFCCFF","transparent","",3,0,0,"#FFFFFF"]);
stm_ai("p0i0",[0,"Postulantes<BR>Graduados / Estudiantes UNLP","","",-1,-1,0,"","_self","","Servicios a Postulantes Universitarios","","",0,0,0,"","",0,0,0,1,1,"#B04C58",0,"#1D3C81",0,"","",3,3,1,1,"#B04C58","#B04C58","#FFFFFF","#FFFFFF","bold 9pt Arial","bold 9pt Arial",0,0],200,0);
stm_aix("p0i1","p0i0",[0,"Postulantes<BR>No Universitarios","","",-1,-1,0,"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1","_blank","","Servicios a la comunidad platense"],200,0);
stm_ep();
stm_em();
//-->
</script>
<?
echo"</table>\n";
	echo"</td>\n"
	."</tr></table>\n";
	
	
	?>
	<?
	
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
    echo "<table border=\"0\" cellpadding=\"1\" cellspacing=\"0\" bgcolor=\"Red\" width=\"150\"><tr><td>\n"
	."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" bgcolor=\"#1D3C81\"  width=\"100%\"><tr><td align=left>\n"
	."<font class=\"content2\" color=\"#363636\"><b>$title</b></font>\n"
	."</td></tr></table></td></tr></table>\n"
	."<table class =\"fondoBloque\" border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"150\">\n"
	."<tr valign=\"top\"><td>\n"
	."$content\n"
	."</td></tr></table>\n"
	."<br>\n\n\n";
}

?>
