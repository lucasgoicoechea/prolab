<?php
	
	//este script comprueba si el usuario existe en la base de datos
	$usuario=trim($_POST["user"]);
	if(!isset($usuario)){
		header("location: ../../index.php?op=AdminEmpresas/index.php&msgUser=Debe Ingresar Usuario");
	}else{
			include "DB.php";
			$contrasena = md5($_POST["pwd"]); 
			$query  ="SELECT id,usuario,clave, razonsocial, nombre, apellido ";
			$query .="FROM empresas ";
			$query .="WHERE usuario='".$_POST["user"]."' AND clave='".$contrasena."'";

			include("consultar.php");

			$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

			if (isset($row)){
					header("location: ../../index.php?op=AdminEmpresas/viewOfertas.php");
					session_start();
					$_SESSION["usr_empresa"] = $row["usuario"];
					$_SESSION["nombre"] = $row["nombre"];
					$_SESSION["apellido"] = $row["apellido"];
					$_SESSION["razon_social"] = $row["razonsocial"];
                                        $_SESSION["id_empresa"] =  $row["id"];

			}else{ //si el usuario no existe se lo manda a una pagina de error
					header("location: ../../index.php?op=AdminEmpresas/login/errorLogin.html&i=".$contrasena);
			}
	}
?>