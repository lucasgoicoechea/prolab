<?php
	//include "validar_acceso.php";
	//ESTE SCRIPT BORRA UNA ESTUDIO
	require_once "DB.php";

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_cursos WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
	
	echo ('<script>window.location="nuevoCV_Paso2.php#ano_curso";</script>');

?>