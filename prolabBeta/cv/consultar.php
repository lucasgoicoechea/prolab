<?php
	include("../conexion.php");
	require_once "PEAR.php";

	$result = $conexionDB -> query($query);
	if (PEAR::isError($result)){
		//$x = mysql_error();
		$x = $result -> getMessage();
		print("se produjo un error al consultar: $x");
		exit; //salimos del script
	}
	$id = mysql_insert_id();
	$conexionDB -> disconnect();
?>