<?php
	require "conexion.php";
	
	$alias=strtoupper($_POST['usuario']);
	$contrasena = $_POST['clave'];
	$pass=strtoupper($contrasena);

	$q=$conexionDB->query("select * from usuarios where (Alias='$alias') and (Password='$pass')");
	
	if ($linea = ($q->fetchRow(DB_FETCHMODE_ORDERED)))
	{
		session_start();
		$_SESSION['idUsuario']= $linea[0];
		$_SESSION['idUsr']= $linea[0];
		$_SESSION['nombre']= $linea[1];
		$_SESSION['apellido']= $linea[2];
		$_SESSION['alias']= $linea[5];
		$_SESSION['idTipoUsuario']= $linea[7];		
		$_SESSION['color']= $linea[12];	
		
		if ($_SESSION['idTipoUsuario']==__ID_OPERADORES__){
		  $_SESSION['idNivel']=$linea[8];
			$q2=$conexionDB->query("select * from niveles where idNivel = '$linea[8]'");
			$linea2=$q2->fetchRow(DB_FETCHMODE_ORDERED);
			$_SESSION['nivel']=$linea2[1];
		}
		else{
			$_SESSION['idNivel']=0;
			$_SESSION['nivel']='';
		}
		echo '<script>window.location="index.php"</script>';		
	}
	else
	{
		echo '<script>window.location="index.php?op=loginFail"</script>';		
	}
	
	
	

?>