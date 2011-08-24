<?php
require_once "../../includes/conexion.php";
		//registro la modificacion por parte del usuario de la encuesta
		/*$consulta = "insert into poll_history (id_usuario , id_encuesta, fecha) values ( ".$_GET['id_encuesta'].",".$_GET['id_usuario'].", '".date("Y-m-d h:m:s")."')";
		$q=$link->query($consulta);*/
		//print $consulta;
		$ok=true;
		//registro las respuestas del usuario			
		 $QPreguntas = $link->query("SELECT * FROM questions WHERE id_encuesta = '".$_GET['id_encuesta']."' ");	

		 while ($pregunta = $QPreguntas -> fetchRow(DB_FETCHMODE_ASSOC)){	
			 $param = "rpta_".$pregunta['id'];
			 //pregunto si es multiple (arreglo de respuestas) o simple
			 if($pregunta['type']=='multiple'){
				for ($i=0; $i<count($_POST[$param]); $i++){					
					
						$consultaMultiple = "insert into answers_users (id_usuario , id_respuesta) values (".$_GET['id_usuario'].", '".$_POST[$param][$i]."')";
			 			$q=$link->query($consultaMultiple);			 			 	
						//ECHO $param.": ".$_POST[$param][$i]."</BR>";
						if (DB::isError($q)) {
							$ok=false;
							die($q->getMessage());			
						}					
				}
				
			 }elseif($pregunta['type']=='simple'){
			     $consultaSimple = "insert into answers_users (id_usuario , id_respuesta) values (".$_GET['id_usuario'].", '".$_POST[$param]."')";
  			     $q=$link->query($consultaSimple);			 
				 //ECHO $param.": ".$_POST[$param]."</BR>";
				 if (DB::isError($q)) {
					$ok=false;
					die($q->getMessage());			
				 }
			 }
	  
		}
		
		if($ok){
			print("<script> window.location='../myCV.php'");
			print("</script>");
		}
		     
?>