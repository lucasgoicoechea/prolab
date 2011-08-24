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
 
  if(isset($_POST['apellido'])){
        
		$query ="INSERT INTO usuarios(fecha,usuario,clave,nombre,apellido,dni,sexo,id_estado_civil,canthijo,fecha_nacimiento,domicilio,id_ciudad,cp,telefono,celular,email, id_clasif_entrev, recibir_oferta) VALUES (";
		$fecha = date("d-m-Y");
		$query .="'".$fecha."',";
		
		$query .="'".$_POST["dni"]."',"; //el dni es el usr

		$query .="'".$_POST["pass"]."',";

		$query .="'".$_POST["nombre"]."',";

		$query .="'".$_POST["apellido"]."',";

		$query .="'".$_POST["dni"]."',";

		$query .="'".$_POST["sexo"]."',";

		$query .="'".$_POST["estado_civil"]."',";

		$query .="'".$_POST["hijos"]."',";	

		$timestamp = dateToTimestamp($_POST["fecha_nac"]);
		$fechaFormat=gmdate( "Y-m-d", $timestamp);
		$query .= "'".$fechaFormat."',";	

		$query .="'".$_POST["domicilio"]."',";		

		$query .="'".$_POST["ciudad"]."',";

		$query .="'".$_POST["cp"]."',";

		$query .="'".$_POST["telefono"]."',";

		$query .="'".$_POST["celular"]."',";

		$query .="'".$_POST["mail"]."',";

		$query .="'4', ";

		$query .=$_POST["inactivarCV"].")";		
		//echo $query;

		include("consultar.php");

		$query = "select * from usuarios where usuario = ".$_POST["dni"];		
		include("consultar.php");
		$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	
		$_SESSION['idUsr'] = $row['id']; 

		//echo "id user ".$_SESSION['idUsr'];
  } 
  ?>
 <script>
  window.location="nuevoCV_Paso2.php";  
</script>