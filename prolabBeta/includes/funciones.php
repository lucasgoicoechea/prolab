<?
/***
función conectar que = se conecta a MySQL y devuelve el identificador de conexión
***/
$HOSTNAME = "localhost";//Servidor
$USERNAME = "prolabunlp";//Usuario
$PASSWORD = "FeDeRiCo08";//Contraseña
$DATABASE = "graduados";//Base de datos

function conectar(){
	global $HOSTNAME,$USERNAME,$PASSWORD,$DATABASE;
	$idcnx = mysql_connect("localhost", "prolabunlp", "FeDeRiCo08") or die(mysql_error());
	mysql_select_db("graduados", $idcnx);
	return $idcnx;
}

/****************************
funcion insertarEnTabla: inserta los $valores en los $campos de la $tabla indicada.
****************************/
function insertarEnTabla($valores,$campos,$tabla){
	$sqlF = "INSERT INTO $tabla ($campos) VALUES($valores)";
	$resF = mysql_query($sqlF) or die(mysql_error());
	return $resF;
}
?>