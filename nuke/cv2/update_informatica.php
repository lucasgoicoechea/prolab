<?php
//echo "cert ".$_POST["posee_certificado"];
	$cert = "false";
	if($_POST["posee_certificado"]){
		$cert = "true";
	}
	$query ="UPDATE usuarios_informatica SET id_nivel=".$_POST["nivel_informatica"].", certificado=".$cert." where id=".$_POST["idUsuarioInformatica"];
						
	//echo $query;
	include("consultar.php");
?>

<script>
  window.parent.location="nuevoCV_Paso2.php";  
</script>