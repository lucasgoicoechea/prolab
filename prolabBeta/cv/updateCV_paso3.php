<?php
session_start();
include("../conexion.php");

	if($_POST["trabajando"]){
		$actual="true";
	}else{
		$actual="false";
	}

	if($_POST["rubro"]=="0"){
		$id_rubro = $_POST["rubro_aux"];
	}else{
		$id_rubro = $_POST["rubro"];
	}

	$query ="UPDATE usuarios_experiencia SET empresa='".$_POST["empresa"]."', id_rubro=".$id_rubro.", mes_ingreso='".$_POST["mes_inicio"]."', ano_ingreso='".$_POST["ano_inicio"]."', mes_egreso='".$_POST["mes_Fin"]."', ano_egreso='".$_POST["ano_Fin"]."', actual=".$actual.", puesto='".$_POST["puesto"]."', responsabilidades='".$_POST["descripcion"]."', pers_cargo=".$_POST["aCargo"].", logros='".$_POST["logros"]."', observaciones='".$_POST["comentarios"]."', tipo='', usuario='', id_usuario=".$_SESSION['idUsr']." where id=".$_GET["idUsuarioExperiencia"];
						
	//echo $query;

	$conexionDB->query($query);
?>

<script>
 window.parent.location="../index.php?op=cv/nuevoCV_Paso3.php";  
</script>