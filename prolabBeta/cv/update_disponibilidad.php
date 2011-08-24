<?php
	function valor_check($valor){
		if($valor){
			return "true";
		}else{
			return "false";
		}
	}
	include("../conexion.php");
	$query ="UPDATE usuarios_disponibilidad SET id_movilidad=".$_POST["movilidad"].", id_registro=".$_POST["registro"].", diurno=".valor_check($_POST["full_diurno"]).", nocturno=".valor_check($_POST["full_nocturno"]).", solo_manana=".valor_check($_POST["part_manana"]).", solo_tarde=".valor_check($_POST["part_tarde"]).", solo_noche=".valor_check($_POST["part_noche"]).", free_lance=".valor_check($_POST["freelance"]).", viaja_provincia=".valor_check($_POST["provincias"]).", viaja_pais=".valor_check($_POST["paises"])." where id_usuario=".$_POST["usuario"];
	$conexionDB->query($query);
	
	$query ="DELETE FROM usuarios_objetivos WHERE usuario=".$_SESSION['usuario'];
	$conexionDB->query($query);
				
	$query ="DELETE FROM usuarios_objetivos WHERE idUsuario=".$_POST["usuario"];
	$conexionDB->query($query);
		
	$query ="INSERT INTO usuarios_objetivos(oPersonales,oLaborales,oProfesionales,idUsuario) VALUES (";
	$query .="'".$_POST["oPersonales"]."',";
	$query .="'".$_POST["oLaborales"]."',";
	$query .="'".$_POST["oProfesionales"]."'";
	$query .=",".$_POST["usuario"].")";
	$conexionDB->query($query);
   
		//echo "id user ".$_SESSION['idUsr'];
		//borro los objetivos del sist viejo, ya q nada tiene q ver con esta

?>

<script>
  window.location="../index.php?op=cv/nuevoCV_Paso6.php";  
</script>