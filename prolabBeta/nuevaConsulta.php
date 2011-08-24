<br>
<form action="updateConsulta.php" method="post" onsubmit="return validarCampos()" class="menuBody" id="consulNueva">
    
<?php
require_once "conexion.php";
include "./vercolor.php";
$miip = getenv('REMOTE_ADDR');
$ipaux = $conexionDB->query("select idEquipo from equipos where ip = '$miip'");
$ip =  $ipaux->fetchRow(DB_FETCHMODE_ORDERED);
if (!isset($ip[0]))
{include("datosUsuarios.php");}
else{
	echo"<br>";
	echo"<br>";
	echo"<p align='center' style = 'font-family: Comic Sans MS; font-weight: bold; color: Red; font-size: 15px;'>Su equipo ya se encuentre registrado </p>";
	
	echo"<br>";
	echo"<label for='name'>&nbsp;&nbsp;Nombre y apellido:&nbsp;</label>";	
	echo" <input type='text' size='25' name='usuariox' id='usuariox' align='middle'>&nbsp;(*)";
	echo"<br>";		
	echo"<br>";
	
   echo"<label for='name' >&nbsp;&nbsp;Dirección de correo electrónico:&nbsp;</label>	";
	echo"<input type='text' size='25' name='mailx' id='mailx'>&nbsp;(*)";
 
   echo" <br>";
	echo"<br>";
	}
?>
<!-- ************************* -->
<br>
	<h3>Datos del Problema</h3>
	<div style="border : thin solid Gray; 
	margin-left : 5%; margin-right : 5%;">
	<br>
	 <label for="name">&nbsp;&nbsp;Tipo de Reporte:&nbsp;</label>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<select name="reportez" id="reporte"> 
	<?php 
            $idatosaux =  $conexionDB->query("select descripcion from tipo_incidente");
			 while($datos=  $idatosaux->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$datos[0]."</OPTION>");}
			echo  " </select>";
?>	<br><br>
	<br>
	 <label for="name">&nbsp;&nbsp;Aplicación en la que se origino:&nbsp;</label>
	
&nbsp;&nbsp;&nbsp;<select name="aplicacionx" id="apli" onclick="mostrarText(8)">  
<?php 
    $qidatosaux =  $conexionDB->query("select descripcion from aplicaciones");
			 while($qdatos=  $qidatosaux->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$qdatos[0]."</OPTION>");}
			echo  " <option id='other8'>otro</option></select>";
	?>
	
  &nbsp;&nbsp;&nbsp;<input type="Text" name="descApli" id="text8"  size="25"  style="visibility : hidden;" value="Ingrese aqui la otra opcion">
	<br><br>
	<br>
	<label for="pass">&nbsp;&nbsp;Descripcion del Problema:&nbsp;</label>
	&nbsp;&nbsp;
	
  <textarea type="Text" name="probx" id="descProbx"  size="50"></textarea>&nbsp;&nbsp;(*)
	<br>
	<br>
	<br>

	
  </div> 
	<br>
	<br>
	
<br>
<br>	
 <!--**************************  -->

	<center>
	<br>  
    	<input type="submit" name="datosMaquina" value="Terminar">
  	&nbsp;&nbsp;&nbsp;
  	  <input type="reset" name="Borrar" value="Borrar">
	<br><br>
  </center>

 </form>
<br>