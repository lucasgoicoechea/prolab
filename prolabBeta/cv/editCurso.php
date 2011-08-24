<style>
.opcion{
	FONT-SIZE: 11px;
	FONT-FAMILY: Verdana;
	TEXT-ALIGN: left;
}
.label {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #1D3C81;
	text-decoration: none;
	text-align: justify;
	margin-left: 10;
	margin-right: 10;
}
.boton{
        font-size:10px;
        font-family:Verdana,Helvetica;
        font-weight:bold;
        color:white;
        background:#638cb5;
        border:0px;
        width:80px;
        height:19px;
}

</style>
<?php
include("../conexion.php");

$Qusuarios_cursos =  $conexionDB->query("SELECT * FROM usuarios_cursos ui  where ui.id=".$_GET['idUsuarioCurso']);
$curso = $Qusuarios_cursos -> fetchRow(DB_FETCHMODE_ASSOC);

?>
<form action="update_curso.php" method="post" >
<input type='hidden' name='idUsuarioCurso' value='<?=$_GET['idUsuarioCurso']?>' />
 <table width="100%">
	<tr><td class='label'>Rubro</td><td>
		<select class="opcion" name="rubro" id="rubro" class="opcion">			
		<?php
			
		$Qcursos_rubros =  $conexionDB->query("SELECT * FROM cursos_rubros ");
			while ($row = $Qcursos_rubros -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row["id"]==$curso['id_rubro']){	
				echo "<option value='".$row["id"]."' selected>".$row["descripcion"]."</option>";
			}else{
				echo "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			}
		}
		?>
		</select>		
		</td>
	</tr>
	<tr>
		<td class="label">Breve descripci&oacute;n</td>
		<td><textarea class="caja" name="descripcion" id="descripcion" rows="6" cols="55" ><?=$curso['curso']?></textarea></td>
	</tr>
	<tr>
		<td class="label">Posee certificado</td>
		<? if($curso['certificado']){?>
			<td><input type="checkbox" name="posee_curso_certificado" value="true" checked/></td>
		<?}else{?>
			<td><input type="checkbox" name="posee_curso_certificado" value="true"/></td>
		<?}?>
	</tr>

		
	<tr><td class='label'>Duraci&oacute;n</td>
	<td><input type="text" class="caja" size="4" name="duracion_cant" id="duracion_cant" value="<?=$curso['duracion']?>"/>
	
		<select class="opcion" name="duracion_unidad" id="duracion_unidad">			
		<?php
			
		$Qcursos_duracion =  $conexionDB->query("SELECT * FROM cursos_duracion ");
								
		while ($row = $Qcursos_duracion -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row["id"]==$curso['id_unidad_duracion']){	
				print "<option value='".$row["id"]."' selected>".$row["descripcion"]."</option>";
			}else{
				print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			}
		}
		 
		?>
		</select>
		</td>
	</tr>

	
	<tr><td class='label'>Año</td><td>
		<select class="opcion" name="ano_curso" id="ano_curso">			
		<?php
								
		for ($i=0; $i<=100; $i++){
			if(date("Y")-$i==$curso['anio']){	
				print "<option value=".(date("Y")-$i)." selected>".(date("Y")-$i)."</option>";
			}else{
				print "<option value=".(date("Y")-$i).">".(date("Y")-$i)."</option>";
			} 
		}
		 
		?>
		</select>
		
		</td>
	</tr>
	<tr>
			<td align="center" colspan="3"></br>
				<input class="boton" type="submit" value="Guardar"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	

</table> 
</form>