<?php
	//ESTE SCRIPT BORRA UN IDIOMA
	include "validar_acceso.php";
	require_once "DB.php";

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_idiomas WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
	
	echo ('<script>window.navigate("myCV.php")</script>');
	
?>