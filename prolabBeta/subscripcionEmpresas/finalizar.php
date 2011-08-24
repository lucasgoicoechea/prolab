
<link href="../estilos.css" rel="stylesheet" type="text/css">
 
<?php
include ("includes/config.php");
include ("includes/funciones.php");
?>
<br>
<!-- Verifica si el formulario se envio como "submit" -->
<? if(isset($_POST['submit'])){
	if ($_GET['accion'] == 'nueva'){
		//nos conectamos a mysql
		$cnx = conectar ();
		//actualizamos los datos de la Empresa
		$usuario = $_POST['usuario'];
		$sql = "UPDATE empresas SET ";
		$sql .= "razonsocial ='".$_POST['razonsocial']."',";
		$sql .= "nombrecomercial ='".$_POST['nombrecomercial']."',";
		$sql .= "industria ='".$_POST['industria']."',";
		$sql .= "pais ='".$_POST['pais']."',";
		$sql .= "provincia ='".$_POST['provincia']."',";
		$sql .= "ciudad ='".$_POST['ciudad']."',";
		$sql .= "calle ='".$_POST['calle']."',";
		$sql .= "numero ='".$_POST['numero']."',";
		$sql .= "piso ='".$_POST['piso']."',";
		$sql .= "cp ='".$_POST['cp']."',";
		$sql .= "cuit ='".$_POST['cuit']."',";
		$sql .= "iva ='".$_POST['iva']."',";
		$sql .= "emaile ='".$_POST['emaile']."',";
		$sql .= "telefonoe ='".$_POST['telefonoe']."',";
		$sql .= "faxe ='".$_POST['faxe']."',";
		$sql .= "web ='".$_POST['web']."',";
		$sql .= "descripcion ='".$_POST['descripcion']."',";
		$sql .= "empleados ='".$_POST['empleados']."'";
		$sql .= " WHERE usuario = '$usuario'";
		$res = mysql_query($sql) or die(mysql_error());
				
				/*************************EMAIL**************************/
		
			//sacamos el nombre de contacto
			$cnx = conectar ();
			$sql = "SELECT nombre,apellido FROM empresas WHERE usuario = '$usuario'";
			$res = mysql_query($sql) or die(mysql_error());
			
			if (mysql_num_rows($res) > 0){
				//si existe mostrar
				while (list($nombre,$apellido) = mysql_fetch_array($res)){
				$nombreC= $nombre;
				$apellidoC=$apellido;
				}}

			

			//armamos el mail para mandar avisando de la suscripcion
			//dato contacto, telefono, nombre, empresa, email, direccion, empresa

				$time = date("l dS of F y h:i:s A");
				$empresa = $_POST['nombrecomercial'];
				$telefono = $_POST['telefonoe'];
				$email = $_POST['emaile'];
				$direccion = "Calle: ".$_POST['calle']." Número: ".$_POST['numero']." Piso: ".$_POST['piso'];
				$web = $_POST['web'];
				$lugar = $_POST['ciudad']." - ".$_POST['provincia'];
				$motivo = "Suscripción de empresa";
				$cuerpo = "Datos de la empresa\n\n";
				$cuerpo.= "Empresa: $empresa\n";
				$cuerpo.= "Dirección: $direccion\n";
				$cuerpo.= "Lugar: $lugar\n";
				$cuerpo.= "Telefono: $telefono\n";
				$cuerpo.= "Email: $email\n";
				$cuerpo.= "Pagina Web: $web\n";
				$cuerpo.= "-------------------------------------------------------\n";
				$cuerpo.= "Datos del contacto\n\n";
				$cuerpo.= "Apellido y nombre: $apellidoC, $nombreC\n";
				$cuerpo.= "-------------------------------------------------------\n";
				$cuerpo.= "ha enviado subscripción";
				
				//envia el mail
				$headers = "From: Subcripción Empresas <prolab.empresas@presi.unlp.edu.ar>\r\n";

				$to_email="prolab@presi.unlp.edu.ar"; 		//prolab.empresas
				mail($to_email,$motivo,$cuerpo,$headers);
				//$to_email="graduado@presi.unlp.edu.ar"; 			//Graduado
				//mail($to_email,$motivo,$cuerpo,$headers);
				$to_email="ignacio.ignisci@presi.unlp.edu.ar"; 		//Nacho
				mail($to_email,$motivo,$cuerpo,$headers);
				//$to_email="prolab.seguimiento@presi.unlp.edu.ar"; 	//Area Seguimiento
				//mail($to_email,$motivo,$cuerpo,$headers);
/*
$destinatario = "pepito@desarrolloweb.com";
$asunto = "Este mensaje es de prueba";
$cuerpo = '
<html>
<head>
   <title>Prueba de correo</title>
</head>
<body>
<h1>Hola amigos!</h1>
<p>
<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje.
</p>
</body>
</html>
';

//para el envío en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//dirección del remitente
$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n";

//dirección de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: mariano@desarrolloweb.com\r\n";

//ruta del mensaje desde origen a destino
$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

//direcciones que recibián copia
$headers .= "Cc: maria@desarrolloweb.com\r\n";

//direcciones que recibirán copia oculta
$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";

mail($destinatario,$asunto,$cuerpo,$headers)*/
?>


<table width="62" border="0" cellspacing="2" cellpadding="0">
  <tr> 
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="20" bgcolor="#336633">&nbsp;</td>
  </tr>
</table>
<div><span style="font-size:12px; color:navy; font-family:Verdana;">NUEVA EMPRESA: datos del contacto &gt; datos de la empresa &gt; <strong>finalizar</strong></span></div></br>
<div><span style="font-size:14px; color:navy; font-family:Verdana;">Bienvenido &nbsp;<? echo $usuario; ?>:</br></br></span></div>
<div><span class="SUBTITULO">
  Los datos de su empresa han sido enviados a la BASE DE DATOS DEL PROLAB, en breve nos comunicaremos 
  con usted para FINALIZAR LA SUSCRIPCION.</span></div></br>
  <?
	}elseif ($_GET['accion'] == 'modificar'){
		//nos conectamos a mysql
		$cnx = conectar ();
		$usuario = $_POST['usuario'];
		$sql = "UPDATE empresas SET ";
		$sql .= "razonsocial ='".$_POST['razonsocial']."',";
		$sql .= "nombrecomercial ='".$_POST['nombrecomercial']."',";
		$sql .= "industria ='".$_POST['industria']."',";
		$sql .= "pais ='".$_POST['pais']."',";
		$sql .= "provincia ='".$_POST['provincia']."',";
		$sql .= "ciudad ='".$_POST['ciudad']."',";
		$sql .= "calle ='".$_POST['calle']."',";
		$sql .= "numero ='".$_POST['numero']."',";
		$sql .= "piso ='".$_POST['piso']."',";
		$sql .= "cp ='".$_POST['cp']."',";
		$sql .= "cuit ='".$_POST['cuit']."',";
		$sql .= "iva ='".$_POST['iva']."',";
		$sql .= "emaile ='".$_POST['emaile']."',";
		$sql .= "telefonoe ='".$_POST['telefonoe']."',";
		$sql .= "faxe ='".$_POST['faxe']."',";
		$sql .= "web ='".$_POST['web']."',";
		$sql .= "descripcion ='".$_POST['descripcion']."',";
		$sql .= "empleados ='".$_POST['empleados']."'";
		$sql .= " WHERE usuario = '$usuario'";
		$res = mysql_query($sql) or die(mysql_error());

			
?>
<table width="62" border="0" cellspacing="2" cellpadding="0">
  <tr> 
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="20" bgcolor="#336633">&nbsp;</td>
  </tr>
</table>
<div><span style="font-size:12px; color:navy;">MODIFICAR DATOS DE SU EMPRESA: datos del contacto &gt; datos de la empresa &gt; 
  <strong>finalizar</strong></span></div>
<div> <span class="texto1"><? echo $usuario; ?><br>
  Los datos de su empresa han sido modificados.</span><br>
  <?
		mysql_close($cnx);
		exit;
	}
}
?></div>
</BR>  
<div class="texto1" style="text-align:center">Gracias por utilizar nuestros servicios!!!</div>
</br></br>
<div align="center"><input type="button" value="Salir" class="boton" onclick="javascript:window.location='index.php'"/></div>

