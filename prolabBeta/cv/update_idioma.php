<?php
include("../conexion.php");
$conexionDB->query("UPDATE usuarios_idiomas SET id_nivel=".$_POST["nivel_idioma"]." where id=".$_POST["idUsuarioIdioma"]);
						
		//echo $query;

		//include("consultar.php")
?>

<script>
  window.parent.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>