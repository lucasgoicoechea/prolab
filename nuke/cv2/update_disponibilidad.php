<?php
	function valor_check($valor){
		if($valor){
			return "true";
		}else{
			return "false";
		}
	}

	$query ="UPDATE usuarios_disponibilidad SET id_movilidad=".$_POST["movilidad"].", id_registro=".$_POST["registro"].", diurno=".valor_check($_POST["full_diurno"]).", nocturno=".valor_check($_POST["full_nocturno"]).", solo_manana=".valor_check($_POST["part_manana"]).", solo_tarde=".valor_check($_POST["part_tarde"]).", solo_noche=".valor_check($_POST["part_noche"]).", free_lance=".valor_check($_POST["freelance"]).", viaja_provincia=".valor_check($_POST["provincias"]).", viaja_pais=".valor_check($_POST["paises"])." where id_usuario=".$_POST["usuario"];
						
	//echo $query;

	include("consultar.php")
?>

<script>
  window.parent.location="nuevoCV_Paso4.php";  
</script>