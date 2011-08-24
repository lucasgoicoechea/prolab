<?php
	//include "validar_acceso.php";
	//ESTE SCRIPT BORRA UNA ESTUDIO
	include("../conexion.php");

	//recibimos la id de la fila
	
		
	$query ="DELETE FROM usuarios_experiencia WHERE ";
	$query .="id='".$_GET["id"]."'";

	$conexionDB->query($query);
?>

<script>
  window.parent.location="../index.php?op=cv/nuevoCV_Paso3.php";  
</script>

