<?php

	//ESTE SCRIPT BORRA UNA ESTUDIO

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_cursos WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("../conexion.php");
	$conexionDB->query($query);

	echo ('<script>window.location="../index.php?op=cv/nuevoCV_Paso2.php#ano_curso";</script>');

?>