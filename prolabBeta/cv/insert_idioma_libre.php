<?php
session_start();

include("../conexion.php");
 
	
		$query ="INSERT INTO usuarios_idiomas (id_usuario,id_nivel,idioma) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";

		$query .=" ".$_POST["nivel_libre"].",";

		$query .="'".$_POST["idioma"]."')";		
		//echo $query;

		$conexionDB->query($query);   
		
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>