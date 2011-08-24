<?php
include ("includes/config.php");
include ("includes/funciones.php");
session_start();
include ("secure.php");

?>
<html>
<head>
<title>Postularse a Oferta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php

$valoridO = $_GET['idO'];
$valoridU = $_SESSION["idUsuario"];

$cnx = conectar ();
//nos fijamos si ya se postuló anteriormente a esta oferta
$sql = "SELECT id FROM postulaciones WHERE idO=".$_GET['idO']." and idU=".$_SESSION["idUsuario"];
$res = mysql_query($sql) or die(mysql_error());
?>
<link href="estilo1.css" rel="stylesheet" type="text/css">
<STYLE type="text/css">
<!--
BODY {
	scrollbar-base-color:#BEBD60;
}
-->
</STYLE>
</head>
<body bgcolor="white" leftmargin="20" topmargin="0"></br>
<div style="width: 100%;" align="center"> 
<div style="border: thin solid #666666; width: 300px;" align="center"> 
<div align="center"><img src="img/ofertas_laborales.jpg" width="210" height="25"></div>

  <? if (mysql_num_rows($res) > 0){ ?>
  </br>
  <div align="center"> 
	 <span><img src="images/karma/2.gif" /></span>
     <span class="subtitulo" style="font-size:16;"> Usted ya se postul&oacute; a esta oferta</span>
  </div>

  <? }else{
  	//si no se postuló antes, postulamos
	$fecha = date("Y-m-d"); //fecha de postulacion
	$campos = "idU,idO,fecha";
	$valores = "'".$_SESSION["idUsuario"]."',";
	$valores .= "'".$_GET['idO']."',";
	$valores .= "'".$fecha."'";
	$sql = "INSERT INTO postulaciones ($campos) VALUES ($valores)";
	$res = mysql_query($sql) or die(mysql_error());
  ?>

  </br>
  <div align="center"> 
    <span><img src="images/karma/approve.gif" /></span>
    <span class="subtitulo" style="font-size:16; color:green;" >Se ha enviado su postulación a esta oferta.</span>
  </div>
  
  <?	mysql_close($cnx);
	    //exit;
     }

  ?>
  <div align="center"> 
    </br>
    <input type="button" onclick="window.location='index.php'" value="volver" width="50" height="50" class="boton">
	</br></br>
  </div>

</div>
</div>
</body>
</html>
