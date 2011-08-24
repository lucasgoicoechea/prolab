<?php
session_start();
if (!isset($_SESSION["idUsr"])){
	header("location:errorAccess.html");
	exit;
}
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="../estilo1.css" type="text/css">
<script type="text/javascript" src="../livevalidation.js"></script>
</HEAD>
<script src="jquery.js"></script>

<body>


<center><span class="titulo1">Ingresa tus Datos: Paso 4</span></center>

 <br><br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "menu_cv.php";
}
?>

 <fieldset style="width: 80%;">
    <legend><span class="titulo1">Objetivo Laboral</span></legend>
<style>
.label{
	text-align: right;
}
</style>
<?php 
  require_once "../includes/conexion.php";
  function check_valor($valor){
	 if($valor){
		   return " checked";
	   }else{
	       return "";
	   }
  }
  $query = "SELECT * FROM usuarios_disponibilidad  WHERE id_usuario=".$_SESSION['idUsr'];	
  include("consultar.php");
  if ($ok = $result -> numRows()){
	   print '<form action="update_disponibilidad.php" method="post" >';
	   ?><input type='hidden' name='usuario' id='usuario' value="<?=$_SESSION['idUsr']?>" />
	   <?php
	   $row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	  
  }else { 
	   print '<form action="insert_disponibilidad.php" method="post" >';
  }
	 
?>
   
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
		<input type="checkbox" id="provincias" value="3" name="provincias"  <?=check_valor($row['viaja_pais'])?>>A otros Paises<br> 
		<input type="checkbox" id="paises" value="4" name="paises"  <?=check_valor($row['viaja_provincia'])?>>A otras Provincias<br><br> 
	  </td>
	</tr>

	<tr><td class='titulo2'>Movilidad Propia</td><td>
		<select class="opcion" name="movilidad" id="movilidad" class="label">			
		<?php
		require_once "DB.php";
			
		$query ="SELECT * FROM movilidad ";
		include("consultar.php");	
								
		while ($movilidad = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
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
		require_once "DB.php";
			
		$query ="SELECT * FROM registro_conducir ";
		include("consultar.php");									
		while ($registro = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
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
<table width="80%">
<tr>
	<td align="center" colspan="2"></br>
		<input class="boton" type="submit" value="Finalizar"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<!--<input class="boton" type="reset" value="Limpiar"/>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input class="boton" type="button" value="Volver" onclick="javascript:window.location='nuevoCV_Paso3.php'"/>
	</td>
</tr>
</table>

</form>

<br>
</body>
</html>

