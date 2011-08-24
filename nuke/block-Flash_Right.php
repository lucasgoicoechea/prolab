<?php
if (eregi("block-MenuDosBotones.php", $PHP_SELF)) {
  Header("Location: index.php");
  die();
}
global $prefix, $dbi;
/*
$content = "<form action=\"http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1\" method=\"post\">";
$content .= "<br><input type=\"submit\" name=\"send\" value=\"amia\" size=\"15\">";
$content .= "<br></form>";
//$content = "";
//$content .= "<br><center><input type=\"submit\" name=\"send2\" value=\"Universitarios\" size=\"15\">";
//$content .= "<br>";
*/
//$content ="";
//$content ="petolanza";
$content = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"160\" height=\"200\"><param name=\"movie\" value=\"img/botones_empresas.swf\"><param name=\"quality\" value=\"high\"><param name=\"wmode\" value=\"transparent\" ><embed src=\"img/botones_empresas.swf\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"160\" height=\"200\"></embed></object>";
      



//$content = "<form action=\"modules.php?name=Search\" method=\"post\">";
//$content .= "<br><center><input type=\"text\" name=\"query\" size=\"15\">";
//$content .= "<br><input type=\"submit\" value=\""._SEARCH."\"></center></form>";
?>