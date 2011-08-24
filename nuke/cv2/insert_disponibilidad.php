<?php
session_start();

	require_once "../includes/conexion.php";
 
		$query ="INSERT INTO usuarios_disponibilidad (id_usuario, diurno, nocturno, solo_tarde, solo_noche, solo_manana, free_lance, viaja_pais, viaja_provincia, id_movilidad, id_registro) VALUES (";
		
		$query .=$_SESSION['idUsr'].",";			
		if($_POST["full_diurno"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		if($_POST["full_nocturno"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		if($_POST["part_tarde"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		if($_POST["part_noche"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		if($_POST["part_manana"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}if($_POST["freelance"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		if($_POST["provincias"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		if($_POST["paises"]){
			$query .="true, ";		
		}else{
			$query .="false, ";				
		}
		$query .=$_POST["movilidad"].", ";	
		$query .=$_POST["registro"].")";	
		//echo $query;

		include("consultar.php");
   
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="nuevoCV_Paso4.php";  
</script>