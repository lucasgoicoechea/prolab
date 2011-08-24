<?php
session_start();
?>
<? require_once "../includes/conexion.php";
 

        
		$query ="INSERT INTO usuarios_cursos (id_usuario,duracion,id_rubro,id_unidad_duracion,curso,certificado, anio) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";

		$query .=" ".$_POST["duracion_cant"].",";

		$query .=" ".$_POST["rubro"].",";

		$query .=" ".$_POST["duracion_unidad"].",";

		$query .="'".$_POST["descripcion"]."',";		

		if($_POST["posee_curso_certificado"]==true){
			$query .=" ".$_POST["posee_curso_certificado"].",";	
		}else{
			$query .=" false,";	
		}

		$query .=" ".$_POST["ano_curso"].")";		
		//echo $query;

		include("consultar.php");
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="nuevoCV_Paso2.php#ano_curso";  
</script>