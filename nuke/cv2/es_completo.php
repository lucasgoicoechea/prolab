<?php
	$idEstado = $_GET["id_estado"];
	header('Content-type: text/xml');
    require_once "../includes/conexion.php";
	$query = "select * from estado_carrera where id = ".$idEstado;		
	include("consultar.php");
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	if ($row['finalizado']) {
		echo("<existe>true</existe>");
	} else {
		echo("<existe>false</existe>");
	}
	
?>