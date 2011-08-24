<?php
	
	//este script comprueba si el usuario existe en la base de datos
	
	include "DB.php";

	//SE CHEQUE LOGIN
	$query  ="SELECT id,condicion,usuario,clave ";
	$query .="FROM usuarios ";
	$query .="WHERE usuario='".$_POST["user"]."' AND clave='".$_POST["pwd"]."'";

	include("consultar.php");	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$idUsuario = $row["id"];
	
	
	
	
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
			

			
			if(isset($_GET["idCurso"])){										   								         print("<script>window.location='seleccion_cursos.php'");
				print("</script>");						    
				}else{
						header("location: ../myCV.php");
					  }
				
			
			
			
			
		
	}else{ //si el usuario no existe se lo manda a una pagina de error
			header("location: ./errorLogin.html");
	}
?>