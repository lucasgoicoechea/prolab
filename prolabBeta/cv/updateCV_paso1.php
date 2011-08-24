<?session_start();
include("../conexion.php");
	function dateToTimestamp($date){
	//el date tiene q ser formato d-m-Y
	$dia=substr($date,0,2);
	$mes=substr($date,3,2);
	$ano=substr($date, 6,4);	
	
	$timestamp= mktime(0,0,0,$mes,$dia,$ano);
	return $timestamp;
  }

//		require_once "includes/conexion.php";
		if($_POST["ciudad"]=="0"){
			$id_ciudad = $_POST["ciudad_aux"];
		}else{
			$id_ciudad = $_POST["ciudad"];
		}
		$timestamp = dateToTimestamp($_POST["fecha_nac"]);
		$fechaFormat=gmdate( "Y-m-d", $timestamp);
		if($_POST["changePass"]){
		 $contrasena = md5($_POST["pass"]);
		 $conexionDB->query("UPDATE usuarios SET clave='".$contrasena."', nombre='".$_POST["nombre"]."', apellido='".$_POST["apellido"]."', dni='".$_POST["dni"]."', sexo='".$_POST["sexo"]."', id_estado_civil='".$_POST["estado_civil"]."', canthijo='".$_POST["hijos"]."', fecha_nacimiento='".$fechaFormat."', domicilio='".$_POST["domicilio"]."', id_ciudad='".$id_ciudad."', cp='".$_POST["cp"]."', telefono='".$_POST["telefono"]."', celular='".$_POST["celular"]."', email='".$_POST["mail"]."', recibir_oferta=".$_POST["inactivarCV"].", discapacidad=".$_POST["discapacidad"]." where id=".$_SESSION['idUsr']);
		}
		else{
		 $conexionDB->query("UPDATE usuarios SET nombre='".$_POST["nombre"]."', apellido='".$_POST["apellido"]."', dni='".$_POST["dni"]."', sexo='".$_POST["sexo"]."', id_estado_civil='".$_POST["estado_civil"]."', canthijo='".$_POST["hijos"]."', fecha_nacimiento='".$fechaFormat."', domicilio='".$_POST["domicilio"]."', id_ciudad='".$id_ciudad."', cp='".$_POST["cp"]."', telefono='".$_POST["telefono"]."', celular='".$_POST["celular"]."', email='".$_POST["mail"]."', recibir_oferta=".$_POST["inactivarCV"].", discapacidad=".$_POST["discapacidad"]." where id=".$_SESSION['idUsr']);
		}
		//echo $query;
        
		$queryDiscapacidadAdd ="INSERT INTO usuarios_discapacidades(id_usuario,codigo_discapacidad) VALUES "." ('".$_SESSION['idUsr'];	
		$queryDiscapacidadDel ="DELETE FROM usuarios_discapacidades WHERE id_usuario='".$_SESSION['idUsr']."' and codigo_discapacidad='";
		
		$borrar=$queryDiscapacidadDel."1'";		
		$conexionDB->query($borrar);
		if($_POST["discapaci1"]==true){ $agregar= $queryDiscapacidadAdd ."','1') ";
										$conexionDB->query($agregar);  }		
		$borrar=$queryDiscapacidadDel."2";		
		$conexionDB->query($borrar);
		if($_POST["discapaci2"]==true){ $agregar= $queryDiscapacidadAdd ."','2') ";
										$conexionDB->query($agregar);  }		
		$borrar=$queryDiscapacidadDel."3";		
		$conexionDB->query($borrar);
		if($_POST["discapaci3"]==true){ $agregar= $queryDiscapacidadAdd ."','3') ";
										$conexionDB->query($agregar);  }		
		$borrar=$queryDiscapacidadDel."4";		
		$conexionDB->query($borrar);
		if($_POST["discapaci4"]==true){ $agregar= $queryDiscapacidadAdd ."','4') ";
										$conexionDB->query($agregar);  }		
		$borrar=$queryDiscapacidadDel."5";		
		$conexionDB->query($borrar);
		if($_POST["discapaci5"]==true){ $agregar= $queryDiscapacidadAdd ."','5') ";
										$conexionDB->query($agregar);  }		
		$borrar=$queryDiscapacidadDel."6";		
		$conexionDB->query($borrar);
		if($_POST["discapaci6"]==true){ $agregar= $queryDiscapacidadAdd ."','6') ";
										$conexionDB->query($agregar);  }		

		//include("consultar.php");
		
		
		
 
  ?>
 <script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>
