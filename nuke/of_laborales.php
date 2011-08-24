<?php
session_start();
include ("includes/config.php");
include ("includes/funciones.php");
include ("secure.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<STYLE type="text/css">
.encab{
   color: white; font-size: 12; font-weight:bold;
}
</STYLE>
<title>Ofertas Laborales</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<?
$user = $_SESSION['usuario'];
?>
<link href="estilo1.css" rel="stylesheet" type="text/css">
</head>
<!--Google analytic-->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-4405497-1";
urchinTracker();
</script>
<!--****-->
<body >
<table width="780px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="63%" class="texto1"><img src="img/ofertas_laborales.jpg" width="210" height="25"></td>
    <td width="37%"><div align="right"><a href="salir.php">cerrar sesi&oacute;n 
        de usuario</a></div></td>
  </tr>
</table>
<?
$cnx = conectar();
	$sql = "SELECT id,usuario,nombre,apellido FROM usuarios WHERE usuario ='". $user."'";
	$res = mysql_query($sql) or die (mysql_error());

if (mysql_num_rows($res) > 0){
//impresion de los datos

	while ($fila = mysql_fetch_row($res)){ ?>
<p class="texto1">Bienvenido:<? echo " ". $fila[2]. " ". $fila[3]; ?></p>
<p class="texto1"> <span class="subtitulo">Las siguientes son las ofertas laborales 
  publicadas hasta el d&iacute;a de la fecha:</span> 
  <?
$idU = $fila[0];
	}
}else{
	echo "<td colspan='6' align='center' >No se obtuvieron resultados.</td>";
}

?>
  <br>
  para postularte a una oferta, deber&aacute;s hacer clic en &quot;postulate a 
  &eacute;sta oferta&quot; a la derecha del listado.</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E7EFF4"> 
    <td><div align="center"><a style="color=#DD3177;" href='<? $_SERVER['PHP_SELF'] ?>?ord=fecha'><b>Fecha</b></a></div></td>
    <!--<td><div align="center"><a href='<?// $_SERVER['PHP_SELF'] ?>?ord=empresa'>Empresa</a></div></td>-->
    <td><div align="center"><a style="color=#DD3177;" href='<? $_SERVER['PHP_SELF'] ?>?ord=tipoOf'><b>Tipo de oferta</b></a></div></td>
  <!--  <td><div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=area'>Area</a></div></td>-->
    <td><div align="center"><a style="color=#DD3177;" href='<? $_SERVER['PHP_SELF'] ?>?ord=busqueda'><b>Búsqueda</b></a></div></td>
   
    <td colspan="3"><div align="center">&nbsp;</div></td>
  </tr>
  <?php
//nos conectamos a mysql
$cnx = conectar();
//consulta
$sql  =" SELECT id,fecha,area,aviso,";
$sql .="(select nombrecomercial from empresas e where e.id=eo.id_empresa) as empresa, ";
$sql .="(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf) ";
$sql .=" FROM empresas_ofertas eo ";
if(empty($_GET['ord'])){
	$sql .=" WHERE publicar = 's' ORDER BY fecha DESC";
}else{
	$sql .= "WHERE publicar = 's' ORDER BY ".$_GET['ord']." DESC";
}
	$res = mysql_query($sql) or die (mysql_error());	
if (mysql_num_rows($res) > 0){
//impresion de los datos
$x='0'; 
$c1= "#FFFFFF";  
$c2= "#F5F5F5";

	while (list($idO,$fecha,$area,$busqueda,$empresa,$tipoOf) = mysql_fetch_array($res)){
			$fecha = explode("-", $fecha);
			$fechaFormat = $fecha[2]."/".$fecha[1]."/".$fecha[0];

 $x++;
?>




  <tr> 
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$fechaFormat \n"; ?></span></div></td>
    <!--<td><div align="center"><span class="texto1"><?// echo "$empresa \n"; ?></span></div></td>-->
	<td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$tipoOf \n"; ?></span></div></td>
   <!-- <td><div align="center"><span class="texto1"><? echo "$area \n"; ?></span></div></td>-->
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$busqueda \n"; ?></span></div></td>
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "<a href='ver_detalles.php?idO=$idO&idU=$idU'>Ver</a> \n" ?></span></div></td>
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "<a href='postularse.php?idO=$idO&idU=$idU'>Postulate a ésta oferta</a> \n" ?></span></div></td>
 <!--   <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "<a href='enviar_oferta.php?idO=$idO&idU=$idU'>Recomendar Oferta</a> \n" ?></span></div></td>	-->
  </tr>
    <?
   
}
}else{
	echo "<td colspan='5' align='center' >No se obtuvieron resultados</td>";
}
mysql_close($cnx);
?>
</table>
</body>
</html>
