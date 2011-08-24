<?php
include ("includes/config.php");
include ("includes/funciones.php");
session_start();
?>
<style>
  .result{    
	color:#000000;
	font-family : "Arial";
	font-size : 16px;	
  }
  .descrip{
	font-size:18px;
	color : Navy;
	font-family: "Arial";
  }
</style>
<html>
<head>
<title>Detalles de Oferta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<? //si no hay id, no puede seguir.
if(empty($_GET['idO'])){
	header("Location: of_laborales.php");
	exit;
}
//guardamos el id del usuario
$idU = $_GET['idU'];
//nos conectamos a la base de datos
$cnx = conectar();
$sql = "SELECT * FROM empresas_ofertas WHERE id =".$_GET['idO'];
$res = mysql_query($sql) or die (mysql_error());
if (mysql_num_rows($res) > 0){
	while ($fila = mysql_fetch_array($res)){
		//guardamos el id de la oferta de la empresa
		$idO = $fila['id'];

$fechaFormat = explode("-", $fila['fecha']);
$fechaFormat = $fechaFormat[2]."/".$fechaFormat[1]."/".$fechaFormat[0];
if($fila['sexo']=="F"){
	$sexoFormat="Femenino";
}else{
	if($fila['sexo']=="M"){
	  	$sexoFormat="Masculino";
		}else{
			$sexoFormat="Indistinto";}
}
?>
<link href="themes\WinterICE\style\style.css" rel="stylesheet" type="text/css">
<STYLE type="text/css">
<!--
BODY {
	scrollbar-base-color:#BEBD60;
}
-->
</STYLE>
</head>
<body bgcolor="white" leftmargin="20" topmargin="0" class="principal">
<div align="left"><img src="img/ofertas_laborales.jpg" width="210" height="25"></div>
<div style="background-color:#E7EFF4;" class="menu" align="center" style="color:#DD3177;">Detalles de la Oferta</div>

<br>
<table width="75%" border="0" cellpadding="0" cellspacing="0" align="center" >
  <tr>
    <td class="descrip" align="center"><span style="font-weight:bold; font-size:18px; color:black;"> <? echo $fila['aviso'];?></span></td>
  </tr>
  <tr><td>&nbsp;</br></br></td></tr>
  <tr> 
    <td class="descrip">Numero de referencia:<span class="result">P<? echo $fila['id'];?></span></td>
  </tr>
  <tr> 
    <td class="descrip">Fecha:<span class="result"> <? echo $fechaFormat;?></span></td>
  </tr>
<?php

	//CONSULTA PARA SACAR EL TIPO DE OFERTA

	$sql = "select desc_tipo_oferta from tipo_oferta where id_tipo_oferta='".$fila['tipoOf']."'";
	$result = mysql_query($sql) or die (mysql_error());
	$nombre_empresa = mysql_fetch_array($result);
?>
    <tr><td class="descrip">Tipo de oferta: <span class="result"><? echo $nombre_empresa['desc_tipo_oferta'];?></span></td></tr>
   <!-- <tr><td class="descrip"> &aacute;rea:<span class="result"> <? echo $fila['area'];?></span></td></tr>-->
   
        <? $publico = $fila['publicar'];
//vemos si la oferta esta publicada o no
if ($publico == 's'){?>
       <!-- <tr><td class="descrip">sector:<span class="result"> <? echo $fila['sector'];?></span></td></tr>-->
	    <tr><td class="descrip">Experiencia requerida: <span class="result"> <? echo $fila['experiencia_requerida'];?></span></td></tr>
        <tr><td class="descrip">Nombre del cargo: <span class="result"> <? echo $fila['puesto'];?></span></td></tr>
        <tr><td class="descrip">Sexo: <span class="result"> <? echo $sexoFormat;?></span></td></tr>
        <tr><td class="descrip">Edad: <span class="result"> <? echo $fila['edad'];?></span></td></tr>
        <tr><td class="descrip">Horario: <span class="result"> <? echo $fila['horario'];?></span></td></tr>
        </span></td></tr>
        <tr><td class="descrip">Descripci&oacute;n de tareas generales: <span class="result">
        <? echo $fila['tareasgenerales'];?></span></td></tr>
        <tr><td class="descrip">Lugar de trabajo: <span class="result"> <? echo $fila['lugar_trabajo'];?></span></td></tr>
       <!-- <tr><td class="descrip">categor&iacute;a:<span class="result"><? echo $fila['categoria'];?></span></td></tr>-->
       <!-- <tr><td class="descrip">carreras:<span class="result"> <? echo $fila['carreras'];?></span></td></tr>-->
        <tr><td class="descrip">Remuneraci&oacute;n prevista para el cargo: <span class="result">
        <? echo $fila['remuneracion'];?></span></td></tr>
        <tr><td class="descrip">Conocimientos: <span class="result"> <? echo $fila['conocimientos'];?></span></td></tr>
		<tr><td class="descrip">Perfil de personalidad: <span class="result"> <? echo $fila['actitudes'];?></span></td></tr>
		<tr><td class="descrip">Estudios requeridos: <span class="result"> <? echo $fila['habilidades'];?></span></td></tr>
		<?php 
		if(trim($fila['observaciones'])!=''){
		?>
        <tr><td class="descrip">Observaciones: <span class="result"> <? echo $fila['observaciones'];?></span></td>
		<?php } ?>
     
      <? }else{?>
      <tr><td class="descrip">Sector:<span class="result">no disponible</span></td></tr>
	  <tr><td class="descrip">Nombre del cargo:<span class="result"> no disponible</span></td></tr>
	  <tr><td class="descrip">Sexo:<span class="result">no disponible</span></td></tr>
	  <tr><td class="descrip">Edad:<span class="result"> no disponible</span></td></tr> 
      <tr><td class="descrip">Horario:<span class="result"> no disponible</span></td> </tr>
	  <tr><td class="descrip">Descripci&oacute;n de tareas generales:<span class="result">no disponible</span></td></tr>
	  <tr><td class="descrip">Descripci&oacute;n de tareas espec&iacute;ficas diarias:<span class="result">no disponible</span></td></tr>
	  <tr><td class="descrip">Categor&iacute;a:<span class="result"> no disponible</span></td></tr>
	  <tr><td class="descrip">Carreras:<span class="result"> no disponible</span></td></tr>
      <tr><td class="descrip">Remuneraci&oacute;n prevista para el cargo:<span class="result">no disponible</span></td></tr> 
	  <tr><td class="descrip">Conocimientos:<span class="result">no disponible</span></td></tr> 
      <? } ?>
  
</table>
</br></br></br>


<?php
	$body= "<p>".$fila['habilidades']."</p><p> Fecha: ".$fechaFormat."</p><p>Tipo de oferta: ".$fila['desc_tipo_oferta']."</p><p>Puesto :".$fila['puesto']."</p><p>Sexo: ".$sexoFormat."</p><p>Edad: ".$fila['edad']."</p><p>Horario: ".$fila['horario']."</p><p>Descripción de tareas generales: ".$fila['tareasgenerales']."</p><p>Lugar de trabajo: ".$fila['lugar_trabajo']."</p><p>Remuneración prevista: ".$fila['remuneracion']."</p><p>Conocimientos: ".$fila['conocimientos']."</p><p>postulate en: <b>www.prolab.unlp.edu.ar</b></p>";

	print '<table width="100%" border="0" cellspacing="0" cellpadding="4">';
    print '<tr> ';
    print '<td><div align="center" style="font-size:14;">';
	print '<a  style="color:#DD3177;" href="postularse.php?idO='.$_GET["idO"].'"><b>POSTULARSE A ESTA OFERTA</b></a></div></td>';
	print '<td><div align="center" style="font-size:14;">';
	print '<a  style="color:navy;" href="mailto:agregue_direccion?body='.$body.'&subject=Oferta Laboral">ENVIAR A UN AMIGO</a></div></td>';

    print '<td><div align="center" style="font-size:14;">';
	print '<a  style="color:navy;" href="index.php">VOLVER A PRINCIPAL</a></div></td>';
    print '</tr>';
	print '</table>';
	
?>
</body>
<?
}
}else{
	echo "<div aling='center'>no se obtuvieron resultados</div>";
}
mysql_close($cnx);
?>
</html>