<?php
				
	$query ="UPDATE usuarios_experiencia SET id_rubro=".$_GET["rubro"]." where id=".$_GET["idUsuarioExp"];
	//echo $query;
	include("consultar.php")
?>

<script>
// window.parent.location="nuevoCV_Paso3.php";
  
</script>
