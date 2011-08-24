<?php
	//ESTE SCRIPT QUITA UNA OFERTA DE SEGUIMIENTO

	require_once "DB.php";

	//recibimos la id del usuario a preseleccionar y el id de la oferta
	
	$idOferta = $_GET["id_oferta"];
	
	/*$fecha = date("Y-m-d");


	$query = "UPDATE seleccionados SET activo='n', fecha_baja='".$fecha."' WHERE ";
	$query .="idOferta='".$idOferta."' AND (activo='y' OR activo is null)";
*/
    
	$query = "UPDATE empresas_ofertas SET activo='n' WHERE ";
	$query .="id=".$idOferta;
	include("consultar.php");
	
	print("<script> window.location='viewOfertas.php'");
	print("</script>");	

?>