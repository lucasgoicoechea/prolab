<?php

		//$query ="SELECT * FROM usuarios_modificaciones u group by usuario having count(usuario)=1 and substring(fecha,7,4)<'2008'";
		require_once "../conexion.php";			
		$qUser = $link->query("SELECT * FROM usuarios_modificaciones u group by usuario having count(usuario)=1 and substring(fecha,7,4)<'2008'");
		
		while ($usuario = $qUser -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			$query ="select * from preseleccionados where usuario='".$usuario["usuario"]."'";
			echo $usuario["usuario"]."<br>";
			include("consultar.php");
			if (!$ok = $result -> numRows()){

				echo $usuario["Apellido"].",".$usuario["nombre"]." usuario:".$usuario["usuario"]." dni:".$usuario["dni"]." email:".$usuario["email"]."telefono".$usuario["telefono"]."<br>";
				
				$query ="delete from usuarios_respuestas where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				
				$query ="delete from usuarios_personalidad p USING usuarios_personalidad p INNER JOIN usuarios u on (u.id=p.id_usuario) WHERE u.usuario='".$usuario["usuario"]."'";
				
				include("consultar.php");				
				$query ="delete from usuarios_objetivos where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				
				$query ="delete from usuarios_modificaciones where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				
				$query ="delete from usuarios_informatica where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				
				$query ="delete from usuarios_idiomas where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_experiencia where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_estudios where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_entrevistas p USING usuarios_entrevistas p INNER JOIN usuarios u on (u.id=p.id_usuario) WHERE u.usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_encuestas where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_disponibilidad where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_discapacidad where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				$query ="delete from usuarios_cursos where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				//$query ="delete from usuarios_contabilidad where usuario='".$usuario["usuario"]."'";
				//include("consultar.php");				
				$query ="DELETE FROM postulaciones p USING postulaciones p INNER JOIN usuarios u on (u.id=p.idU) WHERE u.usuario='".$usuario["usuario"]."'";
				include("consultar.php");
				
				$query ="delete from usuarios where usuario='".$usuario["usuario"]."'";
				include("consultar.php");
			}
			 
		}

?>