<?php
	//include "validar_acceso.php";
	//ESTE SCRIPT BORRA UN ESTUDIO

	//recibimos la id de la fila
	
		
	include("../conexion.php");
	$conexionDB->query("DELETE FROM usuarios_estudios WHERE id=".$_GET["id"]);

	
	echo ('<script>window.location="../index.php?op=cv/nuevoCV_Paso2.php";</script>');

?>