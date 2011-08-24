<?php
	//include "validar_acceso.php";
	//ESTE SCRIPT BORRA UN ESTUDIO
	require_once "DB.php";

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_estudios WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
	
	echo ('<script>window.location="nuevoCV_Paso2.php";</script>');

?>