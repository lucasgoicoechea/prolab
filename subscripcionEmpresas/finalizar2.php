<html>
<head>
<title>Finalizar ingreso de datos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilo1-NUEVO.css" rel="stylesheet" type="text/css">
  <STYLE type="text/css">
   BODY {
    scrollbar-face-color:#f5f5f5;
    scrollbar-arrow-color:#828282;
    scrollbar-highlight-color:#f5f5f5;
    scrollbar-3dlight-color:#f5f5f5;
    scrollbar-shadow-color:#f5f5f5;
    scrollbar-darkshadow-color:#f5f5f5;
    scrollbar-track-color:#ffffff;
   }
  </STYLE>
</head>
<body>
<?php
include ("includes/config.php");
include ("includes/funciones.php");

if ($_GET['base'] == 'U'){

if ($_GET['accion'] == 'nuevo'){

	//si la forma ha sido enviada editamos el registro.
	if(isset($_POST['submit'])){
		//nos conectamos a mysql
		$cnx = conectar ();
		
		$usuario = $_POST['usuario'];
		
		$campos = "usuario,a1,a2,a3,a4,a5,b,c,d,e";
		$valores = "'".$_POST['usuario']."',";
		$valores .= "'".$_POST['a1']."',";
		$valores .= "'".$_POST['a2']."',";
		$valores .= "'".$_POST['a3']."',";
		$valores .= "'".$_POST['a4']."',";
		$valores .= "'".$_POST['a5']."',";
		$valores .= "'".$_POST['b']."',";
		$valores .= "'".$_POST['c']."',";
		$valores .= "'".$_POST['d']."',";
		$valores .= "'".$_POST['e']."'";
		$sql = "INSERT INTO otrosdatos($campos) VALUES($valores)";
		$res = mysql_query($sql) or die(mysql_error());
		mysql_close($cnx);
?>
<br>
<span class="texto1"> </span> 
<table width="176" border="0" cellspacing="2" cellpadding="0">
  <tr> 
    <td width="17" bgcolor="#C1DCC0" class="texto1">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="20" bgcolor="#336633">&nbsp;</td>
  </tr>
</table>
<span class="texto1">CV: datos personales &gt; estudios &gt; otra formaci&oacute;n 
&gt; antecedentes laborales &gt;&gt; PERFIL</span> <span class="texto1">&gt;&gt;&gt; 
<strong>finalizar</strong></span> <br>
<p><span class="texto1"> <? echo $usuario; ?><br>
  Tus datos han sido ingresados a la </span><span class="subtitulo">base de datos 
  del prolab</span><span class="texto1">, a partir de &eacute;ste momento podr&aacute;s 
  </span><span class="subtitulo">ver los detalles</span><span class="texto1"> 
  de las ofertas laborales y </span><span class="subtitulo">postularte</span><span class="texto1"> 
  a las mismas.</span></p>
<p>imprimir / ver curriculum<br>
  <?
		exit;
	}
}elseif ($_GET['accion'] == 'modificar'){
//si la forma ha sido enviada editamos el registro.
if(isset($_POST['submit'])){
	
	//nos conectamos a mysql
	$cnx = conectar ();
	
	$usuario = $_POST['usuario'];
	
	$sql = "UPDATE otrosdatos SET ";
	$sql .= "a1 ='".$_POST['a1']."',";
	$sql .= "a2 ='".$_POST['a2']."',";
	$sql .= "a3 ='".$_POST['a3']."',";
	$sql .= "a4 ='".$_POST['a4']."',";
	$sql .= "a5 ='".$_POST['a5']."',";
	$sql .= "b ='".$_POST['b']."',";
	$sql .= "c ='".$_POST['c']."',";
	$sql .= "d ='".$_POST['d']."',";
	$sql .= "e ='".$_POST['e']."'";
	$sql .= " WHERE usuario = '$usuario'";//.$_POST['usuario'];
	$res = mysql_query($sql) or die(mysql_error());
	mysql_close($cnx);
	?>
<br>
<span class="texto1"> </span> 
<table width="176" border="0" cellspacing="2" cellpadding="0">
  <tr> 
    <td width="17" bgcolor="#C1DCC0" class="texto1">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
    <td width="20" bgcolor="#336633">&nbsp;</td>
  </tr>
</table>
<span class="texto1">CV: datos personales &gt; estudios &gt; otra formaci&oacute;n 
&gt; antecedentes laborales &gt;&gt; PERFIL</span> <span class="texto1">&gt;&gt;&gt; 
<strong>finalizar</strong></span> <br>
<p><span class="texto1"> <? echo $usuario; ?><br>
  Tus datos han sido modificados con &eacute;xito</span>.</p>
<p>imprimir / ver curriculum<br>
<? } }
}elseif ($_GET['base'] == 'E'){
	if(isset($_POST['submit'])){
		//nos conectamos a mysql
		$cnx = conectar ();
		$usuario = $_POST['usuario'];
		$sql = "UPDATE datosempresa SET ";
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
		
				$time = date("l dS of F y h:i:s A");
				$empresa = $_POST['nombrecomercial'];
				$motivo = "subscripción de empresa";
				$cuerpo = "Datos de la empresa\n";
				$cuerpo.= "Empresa: $empresa\n";
				$cuerpo.= "-------------------------------------------------------\n";
				$cuerpo.= "ha enviado subscripción";
				//envia el mail
				$to_email="prolab@presi.unlp.edu.ar";
				mail($to_email,$motivo,$cuerpo);
?>
<table width="62" border="0" cellspacing="2" cellpadding="0">
  <tr> 
    <td width="17" bgcolor="#e7eff4">&nbsp;</td>
    <td width="17" bgcolor="#e7eff4">&nbsp;</td>
    <td width="20" bgcolor="#1d3c81">&nbsp;</td>
  </tr>
</table>
<p class="texto1">NUEVA EMPRESA: datos del contacto &gt; datos de la empresa &gt; 
  <strong>finalizar</strong></p>
<p> <span class="texto1"><? echo $usuario; ?><br>
  Los datos de su empresa han sido enviados a la </span><span class="subtitulo">base 
  de datos del prolab</span><span class="texto1">, en breve nos comunicaremos 
  con usted para </span><span class="subtitulo">finalizar la subscripci&oacute;n</span><span class="texto1">.</span><br>
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
