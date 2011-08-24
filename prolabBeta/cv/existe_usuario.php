<?php
	$usuario = $_GET["usuario"];
	header('Content-type: text/xml');
    //require_once "conexion.php";
	include("../conexion.php");

	//$query = "select * from usuarios where usuario = '".$usuario."'";		
	//include("consultar.php");
	$qExiste =  $conexionDB->query("select * from usuarios where usuario = '".$usuario."'");

	$ok = $qExiste -> numRows();
	if ($ok) {
		echo("<existe>true</existe>");
	} else {
		echo("<existe>false</existe>");
	}
	
	
?>