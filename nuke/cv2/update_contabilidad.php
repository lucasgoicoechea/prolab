<?php
	//echo "cert ".$_POST["posee_certificado"];
	$cert = "false";
	if($_POST["posee_certificado"]){
		$cert = "true";
	}
			
	$query ="UPDATE usuarios_contabilidad SET id_nivel=".$_POST["nivel_contabilidad"].", certificado=".$cert." where id=".$_POST["idUsuarioContabilidad"];
	//echo $query;
	include("consultar.php")
?>

<script>
  window.parent.location="nuevoCV_Paso2.php";  
</script>