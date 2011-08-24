<?php

	include "validar_acceso.php";
	//ESTE SCRIPT BORRA UN CURSO
	require_once "DB.php";

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_cursos WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
	
	echo ('<script>window.navigate("myCV.php")</script>');
	
?>