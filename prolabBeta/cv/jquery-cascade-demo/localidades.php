<?php
	
	require_once "DB.php";
	require_once 'HTML/Table.php';

	

	$query ="SELECT * FROM com_localidad ";
	include("consultar.php");
	$lista_localidades = "[";
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		$lista_localidades .="{'When':'".$row['c_id_partido']."','Value':'".$row['c_id']."','Text':'".$row['d_descripcion']."'},";
	}
	$lista_localidades = substr ($lista_localidades, 0, strlen($lista_localidades) - 1);
	$lista_localidades .= "]";
	echo $lista_localidades;
		
	
?>	