<form action="cv/insert_curso.php" method="post" >
  
<fieldset style="width: 95%;">
    <legend><span class="titulo2">Cursos</span></legend>
 <table width="100%">
	<tr><td class='label'>Rubro</td><td>
		<select class="opcion" name="rubro" id="rubro" class="opcion">			
		<?php
			
		//$query ="SELECT * FROM cursos_rubros ";
		//include("consultar.php");	
		$Qcursos_rubros =  $conexionDB->query("SELECT * FROM cursos_rubros ");
			while ($row = $Qcursos_rubros -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>		
		</td>
	</tr>
	<tr>
		<td class="label">Breve descripci&oacute;n</td>
		<td><textarea class="caja" name="descripcion" id="descripcion" rows="6" cols="55" ></textarea></td>
	</tr>
	<tr>
		<td class="label">Posee certificado</td><td><input type="checkbox" name="posee_curso_certificado" value="true"/></td>
	</tr>

		
	<tr><td class='label'>Duraci&oacute;n</td>
	<td><input type="text" class="caja" size="4" name="duracion_cant" id="duracion_cant" />
	
		<select class="opcion" name="duracion_unidad" id="duracion_unidad">			
		<?php
		$Qcursos_duracion =  $conexionDB->query("SELECT * FROM cursos_duracion ");
		//$query ="SELECT * FROM cursos_duracion ";
		//include("consultar.php");	
								
			while ($row = $Qcursos_duracion -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		</td>
	</tr>

	
	<tr><td class='label'>Año</td><td>
		<select class="opcion" name="ano_curso" id="ano_curso">			
		<?php
								
			for ($i=0; $i<=100; $i++){
			
			print "<option value=".(date("Y")-$i).">".(date("Y")-$i)."</option>";
			 
			}
		 
		?>
		</select>
		
		</td>
	</tr>
	<tr>
			<td align="center" colspan="3"></br>
				<input class="boton" type="submit" value="Agregar"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	
<?
	//$query = "SELECT uc.*, cr.descripcion as rubro_desc, cd.descripcion as duracion_medida FROM usuarios_cursos uc inner join cursos_rubros cr on (uc.id_rubro = cr.id) inner join cursos_duracion cd on (cd.id=uc.id_unidad_duracion)  WHERE uc.id_usuario=".$_SESSION['idUsr'];	

	//print "<table><tr><td class='header' colspan='4' style='font-size: 12px'>SELECT en.descripcion FROM usuarios_cursos ue inner join cursos_nivel en on (ue.id_nivel = en.id) WHERE ue.id_usuario = ".$_SESSION['idUsr']."</td></tr>";
	//include("consultar.php");
	$Qusuarios_cursos =  $conexionDB->query("SELECT uc.*, cr.descripcion as rubro_desc, cd.descripcion as duracion_medida FROM usuarios_cursos uc left outer join cursos_rubros cr on (uc.id_rubro = cr.id) inner join cursos_duracion cd on (cd.id=uc.id_unidad_duracion)  WHERE uc.id_usuario=".$_SESSION['idUsr']);

	if ($ok = $Qusuarios_cursos -> numRows()){
?>
	<tr><td colspan='4'>
	<table align='center' width='98%'  style='border: none;' id="tabla_cursos">	
	<tr align='center' class="label_center" style='background: #C0C0C0; font-weight: bold; font-size: 13px;'><td>Rubro</td><td>Descripcion</td><td>Duracion</td><td>Año</td><td>&nbsp;</td><td >&nbsp;</td></tr>

<?php										
		while ($cursos = $Qusuarios_cursos -> fetchRow(DB_FETCHMODE_ASSOC)){		
			print("<tr class='label_left'><td style='text-align:left; background : #E0E0E0 font-size:12px;'> ".$cursos['rubro_desc']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$cursos['curso']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$cursos['duracion']." ".$cursos['duracion_medida']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$cursos['anio']."</td>");
			
			print("<td align='center' style='background : #E0E0E0 font-size:12px;'><a href='cv/editCurso.php?idUsuarioCurso=".$cursos['id']."&keepThis=true&TB_iframe=true&height=300&width=600'  class='thickbox'><img src='cv/icons/edit.png' border='0' align='middle' width='16' height='16'  alt='Modificar'></a></td>");  	
			print("<td style=' background :#E0E0E0 font-size:12px;' align='center'><a href='javascript:eliminarCurso(".$cursos['id'].")'><img src='cv/icons/del.png' border='0' align='middle' width='16' height='16' alt='Eliminar'></a></td>");	
			print "</tr>";		
		}	//fin del while
		print("</table>");
	}//fin del if
?>
</table>
</fieldset>
</form>


<script>

function eliminarCurso(idCurso){
var ok=confirm("¿Realmente desea ELIMINAR este curso?");
	if(ok)
	{
	document.location="cv/deleteCurso.php?id="+idCurso;
	}
}


var duracion_cant = new LiveValidation('duracion_cant', {onlyOnSubmit: true } );
duracion_cant.add( Validate.Presence );
duracion_cant.add( Validate.Numericality );

var descripcion = new LiveValidation('descripcion', {onlyOnSubmit: true } );
descripcion.add( Validate.Presence );
descripcion.add(Validate.Length, { maximum: 100 } );
</script>