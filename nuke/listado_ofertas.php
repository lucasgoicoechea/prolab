<?php
include ("includes/config.php");
include ("includes/funciones.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
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
<p><img src="img/ofertas_laborales.jpg"></p>
<p class="subtitulo">Las siguientes son las ofertas laborales publicadas hasta 
  el d&iacute;a de la fecha.</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E7EFF4"> 
    <td><div align="center"><a style="color=#DD3177;" href='<? $_SERVER['PHP_SELF'] ?>?ord=fecha'><b>Fecha</b></a></div></td>
    <!--<td><div align="center"><a href='<?// $_SERVER['PHP_SELF'] ?>?ord=empresa'>Empresa</a></div></td>-->
    <td><div align="center"><a style="color=#DD3177;" href='<? $_SERVER['PHP_SELF'] ?>?ord=tipoOf'><b>Tipo de oferta</b></a></div></td>
  <!--  <td><div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=area'>Area</a></div></td>-->
    <td><div align="center"><a style="color=#DD3177;" href='<? $_SERVER['PHP_SELF'] ?>?ord=busqueda'><b>Búsqueda</b></a></div></td>
   
  </tr>

  <?php
//nos conectamos a mysql

$cnx = conectar();
//consulta
$sql  =" SELECT eo.id, eo.fecha, t.desc_tipo_oferta, eo.area, eo.aviso ";
$sql .=" FROM empresas_ofertas eo, empresas e, tipo_oferta t ";
$sql .=" WHERE publicar = 's' AND e.id=eo.id_empresa AND t.id_tipo_oferta=eo.tipoOf ";
if(empty($_GET['ord'])){
	$sql .= " ORDER BY fecha DESC";
}else{
	$sql .= " ORDER BY ".$_GET['ord']." DESC";
}
$res = mysql_query($sql) or die (mysql_error());	

if (mysql_num_rows($res) > 0){
//impresion de los datos
$x='0'; 
$c1= "#FFFFFF";  
$c2= "#F5F5F5";

	
if (mysql_num_rows($res) > 0){
//impresion de los datos
	while (list($idO,$fecha,$tipoOf,$area,$busqueda) = mysql_fetch_array($res)){
			$fecha = explode("-", $fecha);
			$fechaFormat = $fecha[2]."/".$fecha[1]."/".$fecha[0];
			$x++;

?>
	<tr>
	 
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$fechaFormat \n"; ?></span></div></td>   
	<td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$tipoOf \n"; ?></span></div></td>   
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$busqueda \n"; ?></span></div></td>
  
 

<?
		}//end while
	}else{
	echo "<td colspan='5' align='center' >no se obtuvieron resultados</td>";
	}
echo "</tr>";
mysql_close($cnx);
}//primer if
?>
</table>
</br>
<div align="center"><a href="of_laborales.php" style="font-size:16;">Volver</a></div>
</br>
<div class="texto4" align="center">Para<span class="texto1a"> registrarte en nuestra base de datos</span>, 
  hace click <A HREF="./cv/index.php">aqui</A>
</div>
</body>
</html>
