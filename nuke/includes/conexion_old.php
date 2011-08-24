<?php
include("config.php");

$link = DB::connect("mysql://".DB_SERVER_USERNAME.":".DB_SERVER_PASSWORD."@".DB_SERVER."/".DB_DATABASE);
if (!$link){
	print "<br><b>Da clic<br><a href=\"index.html\" target=\"_top\"> :. AQUI .: </a>";
	exit();	
}

/*$HOSTNAME = "localhost";//Servidor
$USERNAME = "prolabunlp";//Usuario
$PASSWORD = "Sum41";//Contraseña
$DATABASE = "graduados";//Base de datos

$link = DB::connect("mysql://".$USERNAME.":".$PASSWORD."@".$HOSTNAME."/".$DATABASE.");
if (!$link){
	print "<br><b>Da clic<br><a href=\"index.html\" target=\"_top\"> :. AQUI .: </a>";
	exit();	
}*/
?>