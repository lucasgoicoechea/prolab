<?php
	
	require_once "DB.php";
	require_once 'HTML/Table.php';
	

	$query ="SELECT * FROM com_localidad where c_id_partido=".$_GET['id_partido'];
	include("consultar.php");
	$lista_loc = "[";
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		$lista_loc .="{'When':'".$row['c_id_partido']."','Value':'".$row['c_id']."','Text':'".$row['d_descripcion']."'},";
	}
	$lista_loc = substr ($lista_loc, 0, strlen($lista_loc) - 1);
	$lista_loc .= "]";
	echo $lista_loc;

?>	

