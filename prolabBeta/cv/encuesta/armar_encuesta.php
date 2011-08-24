<?php
	session_start();
?>
<head>
<script type="text/javascript" src="../../includes/livevalidation.js"></script>
<link href="../estilos/estilo.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
    include ("config.php");
    include ("funciones.php");
    $cnx = conectar ();
	if (! $_SESSION["idUsuario"]){
			header("location:errorAccess.html");
			exit;
	}else{
		$id_encuesta = $_GET['id_encuesta'];
		$consulta = "select * from questions where id_encuesta = ".$id_encuesta." order by orden ";
		$res = mysql_query($consulta) or die(mysql_error());
		print ("<form action='enviar_encuesta.php?id_usuario=".$_SESSION["idUsuario"]."&id_encuesta=".$id_encuesta."' method='POST' name='myForm'>");
		print "<table>";
		while ($pregunta = mysql_fetch_array($res)){
			print "<tr><td>".$pregunta['pregunta']."</td></tr>";
			$consulta2 = "select * from answers where id_pregunta = ".$pregunta['id'];
		    $result = mysql_query($consulta2) or die(mysql_error());
			if($pregunta['type']=="simple"){
			     while ($respuesta = mysql_fetch_array($result)){
					print "<tr><td><input type='radio' name='rpta_".$pregunta['id']."' value='".$respuesta['id']."'  CHECKED>".$respuesta['descripcion']."</td></tr>";
				 }//segundo while
			}elseif($pregunta['type']=="multiple"){
				
				while ($respuesta = mysql_fetch_array($result)){		
					print("<tr><td>");					
					print("<input type='checkbox' id='rpta_".$pregunta['id']."' name='rpta_".$pregunta['id']."[]' value='".$respuesta['id']."'>".$respuesta['descripcion']."</input>");
					print("</td></tr>");				

				 }//segundo while
				 echo "<script>var check".$pregunta['id']." = new LiveValidation('rpta_".$pregunta['id']."', {onlyOnSubmit: true });check".$pregunta['id'].".add( Validate.Acceptance );</script>";
				 
			}else{
				print "<tr><td><input type='text' name='rpta_".$pregunta['id']."'></td></tr>";
			}
			
		}//primer while
		print "<tr><td colspan='2'><input type='submit' value='enviar'/></td></tr>";
		print "</table>";
		print "</form>";
	}
	
?>
</body>