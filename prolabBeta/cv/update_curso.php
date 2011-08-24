<?php
include("../conexion.php");

	if($_POST["posee_curso_certificado"]){
		$certificado="true";
	}else{
		$certificado="false";
	}

	$query ="UPDATE usuarios_cursos SET id_rubro=".$_POST["rubro"].", certificado=".$certificado.", duracion=".$_POST["duracion_cant"].", id_unidad_duracion=".$_POST["duracion_unidad"].", curso='".$_POST["descripcion"]."', anio=".$_POST["ano_curso"]." where id=".$_POST["idUsuarioCurso"];
						
	//echo $query;

	$conexionDB->query($query);
?>

<script>
  window.parent.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>