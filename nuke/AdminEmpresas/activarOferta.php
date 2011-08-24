<?php
	//ESTE SCRIPT AGREGA  UNA OFERTA EN SEGUIMIENTO

	require_once "DB.php";

	//recibimos la id del usuario a preseleccionar y el id de la oferta
	
	$idOferta = $_GET["id_oferta"];
	

    
	$query = "UPDATE empresas_ofertas SET activo='y' WHERE ";
	$query .="id=".$idOferta;
	include("consultar.php");

	print("<script> window.location='viewOfertas.php'");
	print("</script>");	

?>