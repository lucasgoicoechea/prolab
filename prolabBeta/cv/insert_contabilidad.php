<?php
session_start();

include("../conexion.php");
 
	$qItemIdioma = $conexionDB->query("SELECT * FROM item_contables ");
	while ($item = $qItemIdioma->fetchRow(DB_FETCHMODE_ASSOC)){
		$query ="INSERT INTO usuarios_contabilidad (id_usuario, id_nivel, id_item, descripcion, certificado) VALUES (";
		
		$query .=$_SESSION['idUsr'].",";
		$query .=" ".$_POST["nivel_".$item["id"]].",";

		$query .=" ".$item["id"].",";
		$query .="'".$_POST["descripcion"]."',";	
		if($_POST["posee_".$item["id"]."_contable"]){
			$query .="true)";		
		}else{
			$query .="false)";				
		}
		//echo $query;

		$conexionDB->query($query);
	}   
        
		
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>