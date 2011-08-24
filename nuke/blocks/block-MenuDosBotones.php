<?php
if (eregi("block-MenuDosBotones.php", $PHP_SELF)) {
  Header("Location: index.php");
  die();
}
global $prefix, $dbi;
/*



$content ="<script id=\"Sothink Widgets:index_nuevo1.pgt\" type=\"text/javascript\" language=\"JavaScript1.2\">stm_bm([\"phpjchr\",600,\"\",\"blank.gif\",0,\"\",\"\",1,0,0,0,50,0,0,0,\"\",\"\",0,0,1,0,\"default\",\"hand\",\"\"],this);stm_bp(\"p0\",[0,4,0,0,5,2,0,0,100,\"\",-2,\"\",-2,90,0,0,\"#FFCCFF\",\"transparent\",\"\",3,0,0,\"#FFFFFF\"]);stm_ai(\"p0i0\",[0,\"Postulantes<BR>Graduados / Estudiantes UNLP\",\"\",\"\",-1,-1,0,\"http://www.prolab.unlp.edu.ar/cv/index.php\",\"_blank\",\"\",\"Servicios a Postulantes Universitarios\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#DD3177\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,1,\"#DD3177\",\"#DD3177\",\"#FFFFFF\",\"#FFFFFF\",\"bold 9pt Arial\",\"bold 9pt Arial\",0,0],200,0);stm_aix(\"p0i1\",\"p0i0\",[0,\"Postulantes<BR>No Universitarios\",\"\",\"\",-1,-1,0,\"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\",\"_blank\",\"\",\"Servicios a la comunidad platense\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#DD3177\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,2],200,0);stm_ep();stm_em();</script>";
*/

$content ="<script type=\"text/javascript\" language=\"JavaScript1.2\">
<!--
stm_bm([\"phpjchr\",460,\"\",\"blank.gif\",0,\"\",\"\",1,0,0,0,50,0,0,0,\"\",\"\",0,0,1,0,\"default\",\"hand\",\"\"],this);
stm_bp(\"p0\",[0,4,0,0,5,2,0,0,100,\"\",-2,\"\",-2,90,0,0,\"#FFCCFF\",\"transparent\",\"\",3,0,0,\"#FFFFFF\"]);
stm_ai(\"p0i0\",[0,\"Postulantes<BR>Graduados / Estudiantes UNLP\",\"\",\"\",-1,-1,0,\"http://www.prolab.unlp.edu.ar/cv/index.php\",\"_blank\",\"\",\"Servicios a Postulantes Universitarios\",\"\",\"\",0,0,0,\"\",\"\",0,0,0,1,1,\"#DD3177\",0,\"#1D3C81\",0,\"\",\"\",3,3,1,1,\"#DD3177\",\"#DD3177\",\"#FFFFFF\",\"#FFFFFF\",\"bold 9pt Arial\",\"bold 9pt Arial\",0,0],175,0);
stm_aix(\"p0i1\",\"p0i0\",[0,\"Postulantes<BR>No Universitarios\",\"\",\"\",-1,-1,0,\"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\",\"_blank\",\"\",\"Servicios a la comunidad platense\"],175,0);
stm_ep();
stm_em();
//-->
</script>";



?>