<?php
session_start();?>
 <? 	
  function dateToTimestamp($date){
	//el date tiene q ser formato d-m-Y
	$dia=substr($date,0,2);
	$mes=substr($date,3,2);
	$ano=substr($date, 6,4);	
	
	$timestamp= mktime(0,0,0,$mes,$dia,$ano);
	return $timestamp;
  }

		require_once "../includes/conexion.php";
		if($_POST["ciudad"]=="0"){
			$id_ciudad = $_POST["ciudad_aux"];
		}else{
			$id_ciudad = $_POST["ciudad"];
		}
		$timestamp = dateToTimestamp($_POST["fecha_nac"]);
		$fechaFormat=gmdate( "Y-m-d", $timestamp);
		$query ="UPDATE usuarios SET clave='".$_POST["pass"]."', nombre='".$_POST["nombre"]."', apellido='".$_POST["apellido"]."', dni='".$_POST["dni"]."', sexo='".$_POST["sexo"]."', id_estado_civil='".$_POST["estado_civil"]."', canthijo='".$_POST["hijos"]."', fecha_nacimiento='".$fechaFormat."', domicilio='".$_POST["domicilio"]."', id_ciudad='".$id_ciudad."', cp='".$_POST["cp"]."', telefono='".$_POST["telefono"]."', celular='".$_POST["celular"]."', email='".$_POST["mail"]."', recibir_oferta=".$_POST["inactivarCV"]." where id=".$_SESSION['idUsr'];
		//echo $query;

		include("consultar.php");
		
		
		
 
  ?>
 <script>
  window.location="nuevoCV_Paso2.php";  
</script>