<?php
	session_start();
	
	//caso estudiante que puede seleecionar graduado o seguir con estudiante
	if (isset($_SESSION["usuario"])){

		if ($_GET["condicion"]=='graduado'){
			
			require_once "DB.php";
			$anioActual = date("Y");
			$query = "UPDATE usuarios SET ";
			$query .="condicion='graduado',";
			$query .="ano_egreso='".$anioActual."' ";
			$query .="WHERE usuario ='".$_SESSION["usuario"]."'";
			include("consultar.php");

			header("location: ../../index.php?op=cv/encuesta/redireccionSegunAnio.php");
		}else{
			header("location: ../../index.php?op=cv/myCV.php");
			}

		
	}else{
		$_SESSION["condicion"]= $_GET["condicion"];
		header("location: ../../index.php?op=cv/addCV.php");
	}
?>