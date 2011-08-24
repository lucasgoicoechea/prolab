<?php
	include "validar_acceso.php";
	require_once "DB.php";
	
	$usuario = $_SESSION["usuario"];

	$query ="Select ano_egreso FROM usuarios WHERE ";
	$query .="usuario='".$usuario."'";
	
	include("consultar.php");
	$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	$anioActual = date("Y");

	$anioEgreso= $item["ano_egreso"];

	if ($anioActual == $anioEgreso){
			header("location:encuestaNuevo.php?usuario=$usuario");
			exit;
		}else{
			header("location:encuestaViejo.php?usuario=$usuario");
			exit;
		}
	
?>