<?
/***
función conectar que = se conecta a MySQL y devuelve el identificador de conexión
***/
function conectar(){
	global $HOSTNAME,$USERNAME,$PASSWORD,$DATABASE;
	$idcnx = mysql_connect($HOSTNAME, $USERNAME, $PASSWORD) or die(mysql_error());
	mysql_select_db($DATABASE, $idcnx);
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