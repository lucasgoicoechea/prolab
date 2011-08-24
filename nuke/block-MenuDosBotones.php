<?php
if (eregi("block-Menu_Dos_Botonesphp", $PHP_SELF)) {
  Header("Location: index.php");
  die();
}
global $prefix, $dbi;
/*
$content = "<form action=\"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\" method=\"post\">";
$content .= "<br><center><input type=\"submit\" name=\"send\" value=\"amia\" size=\"15\">";
$content .= "<br>";
$content = "";
$content .= "<br><center><input type=\"submit\" name=\"send2\" value=\"Universitarios\" size=\"15\">";
$content .= "<br></form>";
*/
$content. ="<script id=\"Sothink Widgets:index_nuevo1.pgt\" type=\"text/javascript\" language=\"JavaScript1.2\"><!--stm_bm([\"phpjchr\",600,\"\",\"blank.gif\",0,\"\",\"\",1,0,0,0,50,0,0,0,\"\",\"\",0,0,1,0,\"default\",\"hand\",\"\"],this);stm_bp(\"p0\",[0,4,0,0,5,2,0,0,100,\"\",-2,\"\",-2,90,0,0,\"#FFCCFF\",\"transparent\",\"\",3,0,0,\"#FFFFFF\"]);stm_ai(\"p0i0\",[0,\"Postulantes<BR>Graduados / Estudiantes UNLP\",\"\",\"\",-1,-1,0,\"\",\"_self\",\"\",\"Servicios a Postulantes Universitarios\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#B04C58\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,1,\"#B04C58\",\"#B04C58\",\"#FFFFFF\",\"#FFFFFF\",\"bold 9pt Arial\",\"bold 9pt Arial\",0,0],200,0);stm_aix(\"p0i1\",\"p0i0\",[0,\"Postulantes<BR>No Universitarios\",\"\",\"\",-1,-1,0,\"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\",\"_blank\",\"\",\"Servicios a la comunidad platense\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#B04C58\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,2],200,0);stm_ep();stm_em();//--></script>?>";

<?
/*
$content.= "\"";

*/
//$content.="<A HREF=\" http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\">amia link</A>";

/*
$content. ="<script id=\"Sothink Widgets:index_nuevo1.pgt\" type=\"text/javascript\" language=\"JavaScript1.2\">";
$content. ="stm_bm([\"phpjchr\",600,\"\",\"blank.gif\",0,\"\",\"\",1,0,0,0,50,0,0,0,\"\",\"\",0,0,1,0,\"default\",\"hand\",\"\"],this);";
$content. ="stm_bp(\"p0\",[0,4,0,0,5,2,0,0,100,\"\",-2,\"\",-2,90,0,0,\"#FFCCFF\",\"transparent\",\"\",3,0,0,\"#FFFFFF\"]);";
$content. ="stm_ai(\"p0i0\",[0,\"Postulantes<BR>Graduados / Estudiantes UNLP\",\"\",\"\",-1,-1,0,\"\",\"_self\",\"\",\"Servicios a Postulantes Universitarios\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#B04C58\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,1,\"#B04C58\",\"#B04C58\",\"#FFFFFF\",\"#FFFFFF\",\"bold 9pt Arial\",\"bold 9pt Arial\",0,0],200,0);";
$content. ="stm_aix(\"p0i1\",\"p0i0\",[0,\"Postulantes<BR>No Universitarios\",\"\",\"\",-1,-1,0,\"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\",\"_blank",\"\",\"Servicios a la comunidad platense\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#B04C58\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,2],200,0);";
$content. ="stm_ep();";
$content. ="stm_em();";
$content. ="</script>";
*/

//$content.="<center><script language=\"JavaScript\" > Hola Pepe \" </script></center>";

//$content ="<SCRIPT LANGUAGE=\"JavaScript\"> function HolaMundo() {alert(\"¡Hola, mundo!\"); }</SCRIPT>"

?>