<?php
session_start();

include("../conexion.php");
 
	$qItemInform = $conexionDB->query("SELECT * FROM item_informatica");
	while ($item = $qItemInform->fetchRow(DB_FETCHMODE_ASSOC)){
		$query ="INSERT INTO usuarios_informatica (id_usuario,id_nivel,id_item,conocimiento, certificado) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";
		$query .=" ".$_POST["nivel_".$item["id"]].",";

		$query .=" ".$item["id"].",";
		$query .="'".$_POST["conocimiento"]."',";	
		if($_POST["posee_".$item["id"]."_informatica"]){
			$query .="true)";		
		}else{
			$query .="false)";				
		}
		//echo $query."<br>";
		//echo "posee_".$item["id"]."_informatica<br>";
		//echo $_POST["posee_".$item["id"]."_informatica"]."<br>";

		$conexionDB->query($query);
	}   
        
		
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>