<?php
	
	//este script comprueba si el usuario existe en la base de datos
	
	include "DB.php";

	//SE CHEQUE LOGIN
	$query  ="SELECT condicion,usuario,clave ";
	$query .="FROM usuarios ";
	$query .="WHERE usuario='".$_POST["user"]."' AND clave='".$_POST["pwd"]."'";

	include("consultar.php");

	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);


	//SE  CHEQUEA SI CARGO LA ENCUESTA
	$query  ="SELECT * ";
	$query .="FROM usuarios_encuestas ";
	$query .="WHERE usuario='".$_POST["user"]."'";

	include("consultar.php");

	$cargoEncuesta = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	
	if (isset($row)){
			session_start();
			//SE SETEA EL usuario EN LA SESION
			$_SESSION["usuario"] = $row["usuario"];
			
			//SE REGISTRA LA MODIFICACION DEL CV
			$fecha = date("d-m-Y");

			$query ="INSERT INTO usuarios_modificaciones (usuario,fecha) VALUES (";
			$query .="'".$_SESSION["usuario"]."',";
			$query .="'".$fecha."')";

			include("consultar.php");
			

			if ($row["condicion"]=='graduado'){
				if (isset($cargoEncuesta))
						header("location: ../myCV.php");
				else 
						header("location: ../encuesta/redireccionSegunAnio.php");
			}

			//caso estudiante	
			else
				header("location: condicion.html");
			
		
	}else{ //si el usuario no existe se lo manda a una pagina de error
			header("location: ./errorLogin.html");
	}
?>