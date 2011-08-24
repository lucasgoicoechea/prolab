<?php
	
	require_once "DB.php";
	require_once 'HTML/Table.php';

	

	$query ="SELECT * FROM com_partido ";
	include("consultar.php");
	$lista_partidos = "[";
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		$lista_partidos .="{'When':'".$row['c_id_provincia']."','Value':'".$row['c_id']."','Text':'".$row['d_descripcion']."'},";
	}
	$lista_partidos = substr ($lista_partidos, 0, strlen($lista_partidos) - 1);
	$lista_partidos .= "]";
	echo $lista_partidos;
		
	
?>	