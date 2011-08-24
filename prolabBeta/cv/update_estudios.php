<?php
	include("../conexion.php");
	$Qestado_carrera = $conexionDB->query("select * from estado_carrera where id = ".$_POST["estado"]);		
 
	$row = $Qestado_carrera -> fetchRow(DB_FETCHMODE_ASSOC);
	if($row['finalizado']){
		$grado_avance = "null";
	}else{
		$grado_avance = $_POST["grado"];
	}
	if($_POST["es_text"]){
		$instituciones = "null";
	}else{
		$instituciones = $_POST["institucion"];			
	}
	if(/*$_POST["titulo_text"]==""*/ $_POST["nivel"]=="2" || $_POST["nivel"]=="4" ){
		$titulo = $_POST["titulo"];
	}else{
		$titulo = "null";
	}
	 $conexionDB->query("UPDATE usuarios_estudios SET id_nivel=".$_POST["nivel"].", id_institucion=".$instituciones.", id_titulo=".$titulo.", institucion='".$_POST["institucion_text"]."', titulo='".$_POST["titulo_text"]."', id_estado_carrera=".$_POST["estado"].", id_grado_avance=".$grado_avance." where id=".$_POST["idUsuarioEstudio"]);						
	
?>

<script>
  window.parent.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>