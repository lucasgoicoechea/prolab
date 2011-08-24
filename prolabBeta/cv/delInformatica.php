<?php
	//ESTE SCRIPT BORRA UN INFORMATICA
	include "validar_acceso.php";
	require_once "DB.php";

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_informatica WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
	
	echo ('<script>window.navigate("myCV.php")</script>');
	
?>