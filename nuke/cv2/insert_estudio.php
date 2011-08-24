<?php
session_start();
require_once "../includes/conexion.php";
		$query = "select * from estado_carrera where id = ".$_POST["estado"];		
		include("consultar.php");
		$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
		if($row['finalizado']){		
			$grado_avance = "null";
		}else{		
			$grado_avance = $_POST["grado"];
		} 

        
		$query ="INSERT INTO usuarios_estudios (id_usuario,id_nivel,id_institucion,id_titulo,id_estado_carrera,id_grado_avance) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";

		$query .=" ".$_POST["nivel"].",";

		$query .=" ".$_POST["instituciones"].",";

		$query .=" ".$_POST["titulo"].",";

		$query .=" ".$_POST["estado"].",";

		$query .=" ".$grado_avance.")";		
		//echo $query;

		include("consultar.php");
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="nuevoCV_Paso2.php";  
</script>