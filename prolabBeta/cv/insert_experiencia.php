<?php
session_start();
include("../conexion.php");

        
		$query ="INSERT INTO usuarios_experiencia (id_usuario,empresa,id_rubro,mes_ingreso,ano_ingreso,mes_egreso,ano_egreso,actual,puesto,responsabilidades,pers_cargo,logros,observaciones) VALUES (";
		
		$query .=" ".$_SESSION['idUsr'].",";

		$query .="'".$_POST["empresa"]."',";

		$query .=" ".$_POST["rubro"].",";

		$query .="'".$_POST["mes_inicio"]."',";

		$query .=" ".$_POST["ano_inicio"].",";

		$query .="'".$_POST["mes_Fin"]."',";

		$query .=" ".$_POST["ano_Fin"].",";

		if($_POST["trabajando"]==true){
			$query .=" ".$_POST["trabajando"].",";	
		}else{
			$query .=" false,";	
		}
		
		$query .="'".$_POST["puesto"]."',";		

		$query .="'".$_POST["descripcion"]."',";

		$query .="'".$_POST["aCargo"]."',";

		$query .="'".$_POST["logros"]."',";

		$query .="'".$_POST["comentarios"]."')";		
		//echo $query;

		$conexionDB->query($query);
		
		//echo "id user ".$_SESSION['idUsr'];
 
	?>
<script>
  window.location="../index.php?op=cv/nuevoCV_Paso3.php";  
</script>