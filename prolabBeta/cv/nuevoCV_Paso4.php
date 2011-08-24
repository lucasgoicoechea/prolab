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
<?php 
  include("conexion.php");

  function check_valor($valor){
	 if($valor){
		   return " checked";
	   }else{
	       return "";
	   }
  }
  $query = "SELECT * FROM usuarios_disponibilidad  WHERE id_usuario=".$_SESSION['idUsr'];	
  $Qusuarios_disponibilidad =  $conexionDB->query($query);
  if ($ok = $Qusuarios_disponibilidad -> numRows()){
	   print '<form action="cv/update_disponibilidad.php" method="post" >';
	   ?>
	   <?php
	   $row = $Qusuarios_disponibilidad -> fetchRow(DB_FETCHMODE_ASSOC);
	  
  }else { 
	   print '<form action="cv/insert_disponibilidad.php" method="post" >';
  }
	 
?>

<center><span class="titulo1">Carga de CV: Paso 4</span></center>

<br><br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "menu_cv.php";
}
?>
  <fieldset style="width: 80%;">
    <legend><span class="titulo1">Objetivos</span></legend>
    	<table  width="100%">
    
<?php 
  $oPersonales = '';
  $oLaborales = '';
  $oProfesionales = '';
$query = "SELECT uo.oPersonales as person,uo.oLaborales as labor, uo.oProfesionales as profe FROM usuarios_objetivos uo WHERE uo.idUsuario=".$_SESSION['idUsr']." order by uo.id limit 1";	
$Qregistro_objetivos=  $conexionDB->query($query);
if ($ok = $Qregistro_objetivos -> numRows()){	
while ($registro = $Qregistro_objetivos -> fetchRow(DB_FETCHMODE_ASSOC)){
	echo "<tr><td>&nbsp;</td><td class='header'>Personales </td><td></tr>";
	echo "<tr><td>&nbsp;</td>";
	echo "<td class='label_left'>";
	echo "<textarea id='oPersonales' name='oPersonales'  cols='60' rows='4' >";
	echo $registro['person']."</textarea><br>";
	echo "</td>	</tr>";
	echo "<tr><td>&nbsp;</td><td class='header'>Laborales </td><td></tr>	<tr><td>&nbsp;</td><td class='label_left'>"; 	
  	echo "<textarea id='oLaborales' name='oLaborales'  cols='60' rows='4' >";
	echo $registro["labor"]."</textarea><br>";
	echo "</td>	</tr>";
	echo "<tr><td>&nbsp;</td><td class='header'>Profesionales </td><td></tr>	<tr><td>&nbsp;</td><td class='label_left'>"; 	
	echo "<textarea id='oProfesionales' name='oProfesionales'  cols='60' rows='4' >";
	echo $registro["profe"]."</textarea><br>";
	echo "</td>	</tr>";
}}
else{
	echo "<tr><td>&nbsp;</td><td class='header'>Personales </td><td></tr>";
	echo "<tr><td>&nbsp;</td>";
	echo "<td class='label_left'>";
	echo "<textarea id='oPersonales' name='oPersonales'  cols='60' rows='4' >";
	echo "</textarea><br>";
	echo "</td>	</tr>";
	echo "<tr><td>&nbsp;</td><td class='header'>Laborales </td><td></tr>	<tr><td>&nbsp;</td><td class='label_left'>"; 	
  	echo "<textarea id='oLaborales' name='oLaborales'  cols='60' rows='4' >";
	echo "</textarea><br>";
	echo "</td>	</tr>";
	echo "<tr><td>&nbsp;</td><td class='header'>Profesionales </td><td></tr>	<tr><td>&nbsp;</td><td class='label_left'>"; 	
	echo "<textarea id='oProfesionales' name='oProfesionales'  cols='60' rows='4' >";
	echo "</textarea><br>";
	echo "</td>	</tr>";	
}

//echo $query;
?>
</table>
</fieldset>
<br>
 <fieldset style="width: 80%;">
    <legend><span class="titulo1">Disponibilidades</span></legend>
<style>
.label{
	text-align: right;
}
</style>

   <input type='hidden' name='usuario' id='usuario' value="<?=$_SESSION['idUsr']?>" />
	<table  width="100%">
	
	
	<tr><td width='25%' class='titulo2'>Disponibilidad</td><td>&nbsp;</td></tr>

	<tr><td>&nbsp;</td><td class='header'>Tiempo Completo (Full Time) </td><td></tr>
	<tr><td>&nbsp;</td>
	  <td class="label_left">
		<input type="checkbox" id="full_diurno" value="1" name="full_diurno" <?=check_valor($row['diurno'])?>>Diurno<br> 
		<input type="checkbox" id="full_nocturno" value="2" name="full_nocturno" <?=check_valor($row['nocturno'])?>>Nocturno<br> 
	  </td>
	</tr>
	<tr><td>&nbsp;</td><td class='header'>Tiempo Parcial (Part Time) </td><td></tr>
	<tr><td>&nbsp;</td>
	  <td class="label_left">
		<input type="checkbox" id="part_manana" value="3" name="part_manana" <?=check_valor($row['solo_manana'])?>>S&oacute;lo a la Mañana<br> 
		<input type="checkbox" id="part_tarde" value="4" name="part_tarde" <?=check_valor($row['solo_tarde'])?>>S&oacute;lo a la Tarde<br> 
		<input type="checkbox" id="part_noche" value="5" name="part_noche" <?=check_valor($row['solo_noche'])?>>S&oacute;lo a la Noche<br> 
	  </td>
	</tr>
	<tr><td>&nbsp;</td><td class='header'>Free Lance (Por Proyectos) </td><td></tr>
	<tr><td>&nbsp;</td>
	  <td class="label_left">
		<input type="checkbox" id="freelance" value="6" name="freelance" <?=check_valor($row['free_lance'])?>>Free Lance (Por Proyectos)<br> 
	  </td>
	</tr>
	<tr><td>&nbsp;</td><td class='header'>Para viajar </td><td></tr>
	<tr><td>&nbsp;</td>
	  <td class="label_left">
		<input type="checkbox" id="paises" value="3" name="paises" <?=check_valor($row['viaja_pais'])?>>A otros Paises<br> 
		<input type="checkbox" id="provincias" value="4" name="provincias" <?=check_valor($row['viaja_provincia'])?>>A otras Provincias<br><br> 
	  </td>
	</tr>

	<tr><td class='titulo2'>Movilidad Propia</td><td>
		<select class="opcion" name="movilidad" id="movilidad" class="label">			
		<?php
			
		$query ="SELECT * FROM movilidad ";
		$Qmovilidad =  $conexionDB->query($query);								
		while ($movilidad = $Qmovilidad -> fetchRow(DB_FETCHMODE_ASSOC)){
				if($row['id_movilidad']==$movilidad["id"]){
					print "<option value='".$movilidad["id"]."' selected>".$movilidad["descripcion"]."</option>";
				}else{
					print "<option value='".$movilidad["id"]."'>".$movilidad["descripcion"]."</option>";
				}			 
		}
		 
	?>
		</select>
		
	</td></tr>
	
	<tr><td class='titulo2'>Registro de Conducir</td><td>
		<select class="opcion" name="registro" id="registro" class="label">			
		<?php
		
		$query ="SELECT * FROM registro_conducir ";
		$Qregistro_conducir =  $conexionDB->query($query);	
		while ($registro = $Qregistro_conducir -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row['id_registro']==$registro["id"]){
				print "<option value='".$registro["id"]."' selected>".$registro["descripcion"]."</option>";
			}else{
				print "<option value='".$registro["id"]."'>".$registro["descripcion"]."</option>";
			}
		}
		 
		?>
		</select>
		
	</td></tr>

</table>
</fieldset>
<br>

<table width="80%">
<tr>
	<td align="center" colspan="2"><br>
		<input class="boton" type="submit" value="Finalizar"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<!--<input class="boton" type="reset" value="Limpiar"/>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input class="boton" type="button" value="Volver" onclick="javascript:window.location='index.php?op=cv/nuevoCV_Paso3.php'"/>
	</td>
</tr>
</table>

</form>

<br>
</body>
</html>

