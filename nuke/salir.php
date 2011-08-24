<?
session_start();
include ("includes/config.php");
include ("includes/funciones.php");
$logout = true;
include ("secure.php");
?>
<html>
<head>
<title>Cerrar Sesion</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo1.css" rel="stylesheet" type="text/css">
<STYLE type="text/css">
<!--
BODY {
scrollbar-base-color:#BEBD60;
}
-->
</STYLE>
</head>

<body  leftmargin="20" topmargin="0">
<p><img src="img/ofertas_laborales.jpg" width="210" height="25"></p>
<p class="titulo3">Ha finalizado su sesión de usuario.</p>
<p> <a href="of_laborales.php">&gt; ver ofertas (deberá ingresar su nombre de 
  usuario y contraseña)</a><br>
  <a href="/html/index.php"><br>
  &gt; salir por completo</a> </p>
</body>
</html>
