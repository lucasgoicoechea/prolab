<?php
	
	//este script comprueba si el usuario existe en la base de datos
	
	include "DB.php";

	//SE CHEQUEA LOGIN
	$query  ="SELECT u.id, u.condicion, u.usuario, u.clave ";
	$query .="FROM usuarios u ";
	$query .="WHERE u.usuario='".$_POST["user"]."' AND u.clave='".$_POST["pwd"]."'";
	
	include("consultar.php");	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$idUsuario = $row["id"];
	
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
			$_SESSION["idUsuario"] = $idUsuario;
		
			//SE REGISTRA LA MODIFICACION DEL CV
			$fecha = date("d-m-Y");

			$query ="INSERT INTO usuarios_modificaciones (usuario,fecha) VALUES (";
			$query .="'".$_SESSION["usuario"]."',";
			$query .="'".$fecha."')";

			include("consultar.php");
			

			if ($row["condicion"]=='graduado'){
				//if (isset($cargoEncuesta)){
					if(isset($_GET["idCurso"])){										   				print("<script>window.location='seleccion_cursos.php'");
					print("</script>");						    
					}else{
						header("location: ../myCV.php");
					}
				//}
				//else{ 
				//	header("location: ../encuesta/redireccionSegunAnio.php");
				//	}
			}

			//caso estudiante	
			else
				header("location: condicion.html");
			
		
	}else{ //si el usuario no existe se lo manda a una pagina de error
			header("location: ./errorLogin.html");
	}
?>