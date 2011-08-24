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

	include("../conexion.php");
 
  if(isset($_POST['apellido'])){
        
		$query ="INSERT INTO usuarios(fecha,usuario,clave,nombre,apellido,dni,sexo,id_estado_civil,canthijo,fecha_nacimiento,domicilio,id_ciudad,cp,telefono,celular,email, id_clasif_entrev, recibir_oferta,discapacidad, fecha_ingreso) VALUES (";
		$fecha = date("d-m-Y");
		$query .="'".$fecha."',";
		
		$query .="'".$_POST["dni"]."',"; //el dni es el usr
        $contrasena = md5($_POST["pass"]);
		$query .="'".$contrasena."',";

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

		$query .=$_POST["inactivarCV"].", ";		
		$query .=$_POST["discapacidad"].", ";
     	$fecha = date("Y-m-d");
        $query .="'".$fecha."')";
		//echo $query;

		$conexionDB->query($query);

		$query = "select * from usuarios where usuario = '".$_POST["dni"]."'";		
		$Qusuario = $conexionDB->query($query);
		$row = $Qusuario -> fetchRow(DB_FETCHMODE_ASSOC);
	
		$_SESSION['idUsr'] = $row['id']; 
        $queryDiscapacidad ="INSERT INTO usuarios_discapacidades(id_usuario,codigo_discapacidad) VALUES ";	
		if($_POST["discapaci1"]==true){ $queryDiscapacidad .="(".$row["id"].",1), ";}		
		if($_POST["discapaci2"]==true){ $queryDiscapacidad .="(".$row["id"].",2), ";}
		if($_POST["discapaci3"]==true){ $queryDiscapacidad .="(".$row["id"].",3), ";}
		if($_POST["discapaci4"]==true){ $queryDiscapacidad .="(".$row["id"].",4), ";}
		if($_POST["discapaci5"]==true){ $queryDiscapacidad .="(".$row["id"].",5), ";}
		if($_POST["discapaci6"]==true){ $queryDiscapacidad .="(".$row["id"].",6) ";}
		$conexionDB->query($queryDiscapacidad);
		//echo "id user ".$_SESSION['idUsr'];
  } 
  ?>
 <script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>
