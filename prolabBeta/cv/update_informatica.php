<?php
//echo "cert ".$_POST["posee_certificado"];
	$cert = "false";
	if($_POST["posee_certificado"]){
		$cert = "true";
	}
	//$query ="UPDATE usuarios_informatica SET id_nivel=".$_POST["nivel_informatica"].", certificado=".$cert." where id=".$_POST["idUsuarioInformatica"];
	include("../conexion.php");
	$conexionDB->query("UPDATE usuarios_informatica SET id_nivel=".$_POST["nivel_informatica"].", certificado=".$cert." where id=".$_POST["idUsuarioInformatica"]);
	//echo $query;
	//include("consultar.php");
?>

<script>
  window.parent.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>