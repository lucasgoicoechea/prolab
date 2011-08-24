<?php

		require_once "DB.php";		
		
			$query ="SELECT * FROM usuarios WHERE dni=";
			$query .="'".$_POST["dni"]."'";
			//echo $query;
			include("consultar.php");
			//SI NO EXISTE EL DNI            $msg = ''; 
			if (!$ok = $result -> numRows()){
				$msg = "No existe un usuario registrado bajo ese DNI";
			}else{
				
				$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
				$email = $item["email"];
				$usuario = $item["usuario"];
				$clave = $item["clave"];
				$nombre = $item["nombre"];
				$apellido = $item["apellido"];
                $dni = $item["dni"];
                $url = "http://www.prolab.unlp.edu.ar/prolabBeta/cv/reactivacion.php?codigo=";
                $codigoActivacion = md5($dni).md5($clave);
                $linkActive = $url.$codigoActivacion;
				$motivo = "PROLAB - Datos de Usuario";
				$cuerpo = "$apellido, $nombre.-\n";
				$cuerpo.= "Estos son sus datos de usuario del PROLAB\n\n";
				$cuerpo.= "Usuario: $usuario\n";
				$cuerpo.= "Activar, click siguiente: ".$linkActive."\n";
				//$cuerpo.= "Password: $clave\n";
				$cuerpo.= "-------------------------------------\n";
                $cuerpo.= "IMPORTANTE: este es un mail automatico, por lo tanto no responda este correo.\n Muchas gracias, Prolab.";

				//envia el mail
				$query ="INSERT INTO usuarios_reactivaciones_password  (usuario_dni,codigo_de_activacion) VALUES (";
		        $query .="'".$dni."',";
		        $query .="'".$codigoActivacion."')";
			    include("consultar.php");
			
				$to_email="$email".";prolab.empresas@presi.unlp.edu.ar;prolab@presi.unlp.edu.ar"; //destino
                      //          $msg = 'envio mail con: ';
				$msg = mail($to_email,$motivo,$cuerpo);
				
				//$msg = "¡El e-mail fué enviado con exito a $email!";
			}
		echo "Error: ".$msg;
		echo "<script>";
		echo 'window.location="../../index.php?op=cv/login/new_forgotPwdSuccesfull.html";';
		echo "</script>";


?>