<?php
//Parche del 2007/05/16 esta mal programado, no esta bien el include siguiente
//include("config.php");

$HOSTNAME = "localhost";//Servidor
$USERNAME = "prolabunlp";//Usuario
//$PASSWORD = "Sum41";//Contrase
$PASSWORD = "MoMaMAR06";//Contrase
$DATABASE = "graduados";//Base de datos

// define our database connection
define('DB_SERVER', 'localhost'); // eg, localhost - should not be empty for productive servers
define('DB_SERVER_USERNAME', 'prolabunlp');
//  define('DB_SERVER_PASSWORD', 'peReo61');
define('DB_SERVER_PASSWORD', 'MoMaMAR06');
define('DB_DATABASE', 'graduados');
define('USE_PCONNECT', 'false'); // use persistent connections?
define('STORE_SESSIONS', ''); // leave empty '' for default handler or set to 'mysql'


$link = DB::connect("mysql://".DB_SERVER_USERNAME.":".DB_SERVER_PASSWORD."@".DB_SERVER."/".DB_DATABASE);
if (!$link){
	print "<br><b>Da clic<br><a href=\"index.html\" target=\"_top\"> :. AQUI .: </a>";
	exit();	
}

?>
