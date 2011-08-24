<?php
session_start();

	require_once "../includes/conexion.php";
 
	$qItemIdioma = $link->query("SELECT * FROM item_idioma");
	while ($item = $qItemIdioma->fetchRow(DB_FETCHMODE_ASSOC)){
		$query ="INSERT INTO usuarios_idiomas (id_usuario,id_nivel,id_item,idioma) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";

		$query .=" ".$_POST["nivel_".$item["id"]].",";

		$query .=" ".$item["id"].",";

		$query .="'".$_POST["idioma"]."')";		
		//echo $query;

		include("consultar.php");
	}   
        
		
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="nuevoCV_Paso2.php";  
</script>