<?php
session_start();
if (!isset($_SESSION["idUsr"])){
	echo "<script>window.location='index.php?op=cv/errorAccess.html';</script>";
}
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="estilo1.css" type="text/css">
<script type="text/javascript" src="js/livevalidation.js"></script>
</HEAD>
<script type="text/javascript" src="cv/jquery.js"></script>

<body>
<form action="" method="post" >
<center><span class="titulo1">CV ACTUALIZADO CON EXITO</span></center>

<br><br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "menu_cv.php";
}
?>
  <fieldset style="width: 80%;">
    <legend><span class="titulo1">GRACIAS POR MANTENERSE ACTUALIZADO<br> A PROLAB SERVICIO DE EMPLEO</span></legend>
    	<table  width="100%">
    
<tr><td>&nbsp;</td><td class='header'>Usted puede...</td><td></tr>
	<tr><td>&nbsp;</td>
	<td class='label_left'>
<table width="80%">
<tr>
	<td align="center" colspan="2"><br>
		<input class="boton" type="button" value="Ver Ofertas"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<!--<input class="boton" type="reset" value="Limpiar"/>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input class="boton" type="button" value="Volver" onclick="javascript:window.location='index.php?op=cv/nuevoCV_Paso4.php'"/>
	</td>
</tr>
</table>

	</td>
	</tr>
</table>
</fieldset>
<br>
<br>


</form>

<br>
</body>
</html>
