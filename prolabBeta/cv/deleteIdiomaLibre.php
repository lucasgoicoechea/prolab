<?php

	//ESTE SCRIPT BORRA UN idioma no estandard

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_idiomas WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("../conexion.php");
	$conexionDB->query($query);

	echo ('<script>window.location="../index.php?op=cv/nuevoCV_Paso2.php";</script>');

?>