<html>
<head>
<title>Finalizar ingreso de datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilo1.css" rel="stylesheet" type="text/css">
  <STYLE type="text/css">
  <!--
   BODY {
    scrollbar-face-color:#D8D8D8;
    scrollbar-arrow-color:#828282;
    scrollbar-highlight-color:#D8D8D8;
    scrollbar-3dlight-color:#D8D8D8;
    scrollbar-shadow-color:#D8D8D8;
    scrollbar-darkshadow-color:#D8D8D8;
    scrollbar-track-color:#8B8B8B;
   }
  -->
  </STYLE>
</head>
<body>
<?php
include ("../includes/config.php");
include ("../includes/funciones.php");
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
				$direccion = "Calle: ".$_POST['calle']." N�mero: ".$_POST['numero']." Piso: ".$_POST['piso'];
				$web = $_POST['web'];
				$lugar = $_POST['ciudad']." - ".$_POST['provincia'];
				$motivo = "Suscripci�n de empresa";
				$cuerpo = "Datos de la empresa\n\n";
				$cuerpo.= "Empresa: $empresa\n";
				$cuerpo.= "Direcci�n: $direccion\n";
				$cuerpo.= "Lugar: $lugar\n";
				$cuerpo.= "Telefono: $telefono\n";
				$cuerpo.= "Email: $email\n";
				$cuerpo.= "Pagina Web: $web\n";
				$cuerpo.= "-------------------------------------------------------\n";
				$cuerpo.= "Datos del contacto\n\n";
				$cuerpo.= "Apellido y nombre: $apellidoC, $nombreC\n";
				$cuerpo.= "-------------------------------------------------------\n";
				$cuerpo.= "ha enviado subscripci�n";
				
				//envia el mail
				$headers = "From: Subcripci�n Empresas <prolab.empresas@presi.unlp.edu.ar>\r\n";

				$to_email="prolab.empresas@presi.unlp.edu.ar"; 		//prolab.empresas
				mail($to_email,$motivo,$cuerpo,$headers);
				$to_email="graduado@presi.unlp.edu.ar"; 			//Graduado
				mail($to_email,$motivo,$cuerpo,$headers);
				$to_email="ignacio.ignisci@presi.unlp.edu.ar"; 		//Nacho
				mail($to_email,$motivo,$cuerpo,$headers);
				$to_email="prolab.seguimiento@presi.unlp.edu.ar"; 	//Area Seguimiento
				mail($to_email,$motivo,$cuerpo,$headers);
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
<b>Bienvenidos a mi correo electr�nico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del art�culo de env�o de mails por PHP. Habr�a que cambiarlo para poner tu propio cuerpo. Por cierto, cambia tambi�n las cabeceras del mensaje.
</p>
</body>
</html>
';

//para el env�o en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

//direcci�n del remitente
$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n";

//direcci�n de respuesta, si queremos que sea distinta que la del remitente
$headers .= "Reply-To: mariano@desarrolloweb.com\r\n";

//ruta del mensaje desde origen a destino
$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

//direcciones que recibi�n copia
$headers .= "Cc: maria@desarrolloweb.com\r\n";

//direcciones que recibir�n copia oculta
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
<p class="texto1">NUEVA EMPRESA: datos del contacto &gt; datos de la empresa &gt; 
  <strong>finalizar</strong></p>
<p> <span class="texto1"><? echo $usuario; ?><br>
  Los datos de su empresa han sido enviados a la </span><span class="subtitulo">base 
  de datos del prolab</span><span class="texto1">, en breve nos comunicaremos 
  con usted para </span><span class="subtitulo">finalizar la subscripci&oacute;n</span><span class="texto1">.</span><br>
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
<p class="texto1">MODIFICAR DATOS DE SU EMPRESA: datos del contacto &gt; datos de la empresa &gt; 
  <strong>finalizar</strong></p>
<p> <span class="texto1"><? echo $usuario; ?><br>
  Los datos de su empresa han sido modificados.</span><br>
  <?
		mysql_close($cnx);
		exit;
	}
}
?></p>
  </p>
<p class="texto1">Gracias por utilizar nuestros servicios.</p>
</body>
</html>