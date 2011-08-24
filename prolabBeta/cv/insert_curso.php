<?php
session_start();
include("../conexion.php");
		
        
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

		$conexionDB->query($query);
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso2.php#ano_curso";  
</script>