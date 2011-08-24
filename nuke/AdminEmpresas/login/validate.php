<?php
	
	//este script comprueba si el usuario existe en la base de datos
	
	include "DB.php";
	$query  ="SELECT usuario,clave ";
	$query .="FROM empresas ";
	$query .="WHERE usuario='".$_POST["user"]."' AND clave='".$_POST["pwd"]."'";

	include("consultar.php");

	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	if (isset($row)){
			header("location: ../viewOfertas.php");
			session_start();
			$_SESSION["usr"] = $row["usuario"];
	}else{ //si el usuario no existe se lo manda a una pagina de error
			header("location: ./errorLogin.html");
	}
?>