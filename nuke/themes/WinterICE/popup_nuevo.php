<?php
include ("includes/config.php");
include ("includes/funciones.php");
?>
<html>
<head>
<title>Ofertas del Dia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo1-NUEVO.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--
.Estilo1 {color: #000000}
-->
 BODY {
	scrollbar-base-color:#f5f5f5;
   }

</style>
</head>

<body bgcolor="white">

<!-- <div align="left" class="subtitulo"><img src="img/ofertas_laborales.gif" width="195" height="51"></div><br> -->
<div align="center" class="subtitulo">
<!--url's used in the movie-->
<!--text used in the movie-->
<!-- saved from url=(0013)about:internet -->
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="400" height="150" id="opLabo" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="img/opLabo.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="opLabo.swf" quality="high" bgcolor="#ffffff" width="400" height="150" name="opLabo" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</div>
<p class="subtitulo">Las siguientes son las <font class="texto1a">ofertas laborales</font> publicadas hasta 
  el d&iacute;a de la fecha.</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#1D3C81">
  <tr bgcolor="#E7EFF4"> 
    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=fecha'><font color="#DD3177"><b>Fecha</b></font></a></div></td>
    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=tipoOf'><font color="#DD3177"><b>Tipo 
    de Oferta</b></font></a></div></td>
    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=area'><font color="#DD3177"><b>Area</b></font></a></div></td>
    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=busqueda'><font color="#DD3177"><b>B&uacute;squeda</b></font></a></div></td>
  </tr>
  <!-- Al hacer click en el titulo de c/columna, recarga la pagina y guarda en "ord" el criterio de ordenacion -->
  <?php
//nos conectamos a mysql
$cnx = conectar();
//consulta
//Verifica el contenido de "ord"
if(empty($_GET['ord'])){
	$sql = " SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf),area,busqueda FROM empresas_ofertas WHERE publicar = 's' ORDER BY fecha DESC";
	$res = mysql_query($sql) or die (mysql_error());	
}else{
	$sql = " SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf),area,busqueda FROM empresas_ofertas WHERE publicar = 's' ORDER BY ".$_GET['ord']." DESC";
	$res = mysql_query($sql) or die (mysql_error());	
}
//Colores para distinguir una oferta de otra $c1 y $c2, si $x es par se imprime $c1 sino $c2

if (mysql_num_rows($res) > 0){
	$x='0'; 
	$c1= "#FFFFFF";  
	$c2= "#F5F5F5";
//impresion de los datos
	while (list($idO,$fecha,$tipoOf,$area,$busqueda,$retribucion) = mysql_fetch_array($res)){  $x++;
			$fecha = explode("-", $fecha);
			$fecha = $fecha[2]."/".$fecha[1]."/".$fecha[0];
?>
  <tr> 
    <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$fecha \n"; ?></span></div>
	</td>
   <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$tipoOf \n"; ?></span></div>
   </td>
    <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$area \n"; ?></span></div>
	</td>
  <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$busqueda \n"; ?></span></div>
  </td>
    <?
	}
}else{
	echo "<td colspan='5' align='center' >No se obtuvieron resultados.</td>";
}
mysql_close($cnx);
?>
</table>
<p class="subtitulo">Para postularse en las ofertas, haga click en la sección <font class="texto1a">Oportunidades Laborales</font> de la p&aacute;gina principal del PROLAB.</p>

<!-- No va:
<p align="left" class="texto1a">CONFERENCIA<br>
  nueva fecha 24-11 abierta la inscripci&oacute;n<br>
  curso GRATUITO<br>
  <span class="subtitulo">&#8220;HERRAMIENTAS PARA UNA B&Uacute;SQUEDA LABORAL 
  EFICIENTE&#8221;</span><br>
  <span class="texto1">Lic. Carolina Gonz&aacute;lez &lt;&lt; <a href="capacitacion_prof/herramientas_para.htm">ver 
  programa</a> &gt;&gt; <a href="http://www.graduados.unlp.edu.ar/inscripcion.php?curso=herramientas%20para%20una%20busqueda%20laboral%20eficiente%202" target="_blank">inscribirse 
  a &eacute;ste curso</a></span></p> -->
</body>
</html>
