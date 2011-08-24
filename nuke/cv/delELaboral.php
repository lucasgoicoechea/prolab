<?php

	include "validar_acceso.php";
	//ESTE SCRIPT BORRA UNA E LABORAL
	require_once "DB.php";

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_experiencia WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
	
	echo ('<script>window.navigate("myCV.php")</script>');
	
?>