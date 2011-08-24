<?php
	
	//este script comprueba si el usuario existe en la base de datos
	
	include "DB.php";
    $contrasena = md5($_POST["pwd"]); 
	
	//SE CHEQUEA LOGIN
	$query  ="SELECT u.id, u.condicion, u.usuario, u.clave, u.nombre, u.apellido , u.id_estado_usuario ";
	$query .="FROM usuarios u ";
	$query .="WHERE u.usuario='".$_POST["user"]."' AND u.clave='".$contrasena."'";
        $query .=" AND u.id_estado_usuario=1 ";
	
	include("consultar.php");	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$idUsuario = $row["id"];
	$nombre=$row["nombre"];
	$apellido=$row["apellido"];

	//SE  CHEQUEA SI CARGO LA ENCUESTA
	/*$query  ="SELECT * ";
	$query .="FROM usuarios_encuestas ";
	$query .="WHERE usuario='".$_POST["user"]."'";
	
	include("consultar.php");

	$cargoEncuesta = $result -> fetchRow(DB_FETCHMODE_ASSOC);*/
	
	if (isset($row)){
			session_start();
			//SE SETEA EL usuario EN LA SESION
			$_SESSION["usuario"] = $row["usuario"];
			$_SESSION["idUsr"] = $row["id"];
			$_SESSION["idUsuario"] = $idUsuario;
			$_SESSION["nombre"] = $nombre; 
			$_SESSION["apellido"] = $apellido;
			//SE REGISTRA LA MODIFICACION DEL CV
			$fecha = date("d-m-Y");

			$query ="INSERT INTO usuarios_modificaciones (usuario,fecha) VALUES (";
			$query .="'".$_SESSION["usuario"]."',";
			$query .="'".$fecha."')";

			include("consultar.php");
			

			
				//if (isset($cargoEncuesta)){
				//	if(isset($_GET["idCurso"])){							
				//		print("<script>window.location='seleccion_cursos.php'");
				//		print("</script>");						    
				//	}else{
					if(isset($_POST["redireccion"])){
						echo $_POST["redireccion"];
						//header("location: ".$_POST["redireccion"]);
					}else{
						echo "../../index.php?op=cv/nuevoCV.php";
						//header("location: ../../index.php?op=cv/nuevoCV.php");
					}
				//	}
				//}
				//else{ 
				//	header("location: ../encuesta/redireccionSegunAnio.php");
				//	}
			
			
		
	}else{ //si el usuario no existe se lo manda a una pagina de error
			header("location: ../../index.php?op=cv/login/errorLogin.html");
	}
?>