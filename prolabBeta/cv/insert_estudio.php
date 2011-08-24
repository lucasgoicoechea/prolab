<?php
session_start();
include("../conexion.php");
		$Qestado_carrera = $conexionDB->query("select * from estado_carrera where id = ".$_POST["estado"]);		
		$row = $Qestado_carrera -> fetchRow(DB_FETCHMODE_ASSOC);
		if($row['finalizado']){		
			$grado_avance = "null";
		}else{		
			$grado_avance = $_POST["grado"];
		} 

        
		$query ="INSERT INTO usuarios_estudios (id_usuario,id_nivel,id_institucion,id_titulo,id_estado_carrera, titulo, institucion, id_grado_avance) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";

		$query .=" ".$_POST["nivel"].",";
		//echo $_POST["es_text"];
		if($_POST["es_text"]){
			$instituciones = "null";
		}else{
			$instituciones = $_POST["instituciones"];			
		}
		$query .=" ".$instituciones.",";
		if(isset($_POST["titulo"])){
			$titulo = $_POST["titulo"];
		}else{
			$titulo = "null";
		}
		$query .=" ".$titulo.",";

		$query .=" ".$_POST["estado"].",";

		$query .="'".$_POST["titulo_text"]."',";

		$query .="'".$_POST["institucion_text"]."',";

		$query .=" ".$grado_avance.")";		
		//echo $query;
		$conexionDB->query($query);
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php";  
</script>