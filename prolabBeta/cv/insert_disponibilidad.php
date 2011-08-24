<?php
session_start();

include("../conexion.php");
 
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

		$conexionDB->query($query);

		$query ="DELETE FROM usuarios_objetivos WHERE idUsuario=".$_POST["usuario"];
		$conexionDB->query($query);

		$query ="INSERT INTO usuarios_objetivos(oPersonales,oLaborales,oProfesionales,idUsuario) VALUES (";
		$query .="'".$_POST["oPersonales"]."',";
		$query .="'".$_POST["oLaborales"]."',";
		$query .="'".$_POST["oProfesionales"]."',";
		$query .=$_POST["usuario"].")";
		$conexionDB->query($query);
   
		//echo "id user ".$_SESSION['idUsr'];
		//borro los objetivos del sist viejo, ya q nada tiene q ver con esta
		$query ="DELETE FROM usuarios_objetivos WHERE usuario=".$_SESSION['usuario'];
		$conexionDB->query($query);
		
		
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso5.php";  
</script>