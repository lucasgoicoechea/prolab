<?php
	$usuario = $_GET["usuario"];
	header('Content-type: text/xml');
    require_once "../includes/conexion.php";
	$query = "select * from usuarios where usuario = ".$usuario;		
	include("consultar.php");
	$ok = $result -> numRows();
	if ($ok) {
		echo("<existe>true</existe>");
	} else {
		echo("<existe>false</existe>");
	}
	
?>