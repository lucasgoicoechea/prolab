<?php
	$query = "select * from estado_carrera where id = ".$_POST["estado"];		
	include("consultar.php");
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	if($row['finalizado']){
		$grado_avance = "null";
	}else{
		$grado_avance = $_POST["avance"];
	}

	$query ="UPDATE usuarios_estudios SET id_nivel=".$_POST["nivel"].", id_institucion=".$_POST["institucion"].", id_titulo=".$_POST["titulo"].", id_estado_carrera=".$_POST["estado"].", id_grado_avance=".$grado_avance." where id=".$_POST["idUsuarioEstudio"];						
	//echo $query;
	include("consultar.php")
?>

<script>
  window.parent.location="nuevoCV_Paso2.php";  
</script>