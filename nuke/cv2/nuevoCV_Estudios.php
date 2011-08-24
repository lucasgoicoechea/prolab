<form action="insert_estudio.php" method="post" >
  
<fieldset style="width: 80%;">
 <legend><span class="titulo2">Estudios Formales</span></legend>
 <table width="100%">
	<tr><td class='label'>Nivel</td><td>
		<select class="opcion" name="nivel" id="nivel">			
		<?php
		require_once "DB.php";
			
		$query ="SELECT * FROM estudios_nivel ";
		include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>

		</td></tr>
		<tr><td class='label'>Institucion</td><td>
		<select class="opcion" name="instituciones" id="instituciones">			
		<?php
					
		$query ="SELECT * FROM instituciones ";
		include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		
		</td></tr>
		<tr><td class='label'>Titulo</td><td>
		<select class="opcion" name="titulo" id="titulo">			
		<?php
	
		$query ="SELECT * FROM titulos ";
		include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		
		</td></tr>
		
		<tr><td class='label'>Estado</td><td>
		<select class="opcion" name="estado" id="estado" onchange="mostrar_grado_avance(this.value);">			
		<?php
	
		$query ="SELECT * FROM estado_carrera ";
		include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		
		</td></tr>
		
		<tr><td class='label'><div  id="id_grado_avance" style="display: none;">Grado de Avance</div></td><td>
		<div  id="id_grado_avance1" style="display: none;"><select class="opcion" name="grado" id="grado">			
		<?php
	
		$query ="SELECT * FROM grado_avance_carrera ";
		include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		</div>
		</td></tr>
		
<tr>
	<td align="center" colspan="2"></br>
		<input class="boton" type="submit" value="Agregar"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
	</td>
</tr>
</table>
<?
	$query = "SELECT ue.id, en.descripcion as nivel, i.descripcion as institucion, t.descripcion as titulo, ec.descripcion as estado, ga.descripcion as avance FROM usuarios_estudios ue inner join estudios_nivel en on (ue.id_nivel = en.id) inner join instituciones i on (i.id=ue.id_institucion) inner join titulos t on (t.id=ue.id_titulo) inner join estado_carrera ec on (ec.id=ue.id_estado_carrera) left outer join grado_avance_carrera ga on (ga.id=ue.id_grado_avance) WHERE ue.id_usuario=".$_SESSION['idUsr'];	
	//echo $query;
	//print "<table><tr><td class='header' colspan='4' style='font-size: 12px'>SELECT en.descripcion FROM usuarios_estudios ue inner join estudios_nivel en on (ue.id_nivel = en.id) WHERE ue.id_usuario = ".$_SESSION['idUsr']."</td></tr>";
	include("consultar.php");
	if ($ok = $result -> numRows()){
?>
	<tr><td colspan='4'>

	<table align='center' width='98%'  style='border: none;'>	
	<tr class="label_center" style='background: #C0C0C0; font-weight: bold; font-size: 13px;'><td>Nivel</td><td>Institucion</td><td>Titulo</td><td>Estado</td><td >Avance</td><td>&nbsp;</td><td >&nbsp;</td></tr>

<?php										
		while ($estudios = $result -> fetchRow(DB_FETCHMODE_ASSOC)){		
			print("<tr class='label_left'><td style='text-align:left; background : #E0E0E0 font-size:12px;'> ".$estudios['nivel']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$estudios['institucion']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$estudios['titulo']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$estudios['estado']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$estudios['avance']."</td>");
			
			print("<td align='center' style='background : #E0E0E0 font-size:12px;'><a href='editEstudio.php?idUsuarioEstudio=".$estudios['id']."&keepThis=true&TB_iframe=true&height=200&width=500'  class='thickbox'><img src='icons/edit.png' border='0' align='middle' width='16' height='16'  alt='Modificar'></a></td>");  	
			print("<td style=' background :#E0E0E0 font-size:12px;' align='center'><a href='javascript:eliminarEstudio(".$estudios['id'].")'><img src='icons/del.png' border='0' align='middle' width='16' height='16' alt='Eliminar'></a></td>");	
			print "</tr>";		
		}	//fin del while
		print("</table>");
	}//fin del if
?>
</fieldset>
 </form>

<script>

function eliminarEstudio(idEstudio){
var ok=confirm("¿Realmente desea ELIMINAR este estudio?");
	if(ok)
	{
	document.location="deleteEstudio.php?id="+idEstudio;
	}
}



function mostrar_grado_avance(){ 	
	id_estado = document.getElementById("estado").value;
	url = "es_completo.php?id_estado=" + id_estado;
	leer_doc(url, procesarRespuesta);
}


function procesarRespuesta(){
	respuesta = req.responseXML;
	if(respuesta!=null){//esta pregunta viene pq en la carga de la pagina se llama a la funcion onchange
						//por cada item del select y el req es null
		var existe = respuesta.getElementsByTagName('existe').item(0).firstChild.data;
		if (existe=="false"){		
			document.getElementById('id_grado_avance').style.display='block';
			document.getElementById('id_grado_avance1').style.display='block';
		}else{
			document.getElementById('id_grado_avance').style.display='none';
			document.getElementById('id_grado_avance1').style.display='none';
		}
	}
}
mostrar_grado_avance();
/**function mostrarAvance(valor, id1, id2){

 if(valor!=1){
	document.getElementById(id1).style.display='block';
	document.getElementById(id2).style.display='block';
 }else{
	document.getElementById(id1).style.display='none';
	document.getElementById(id2).style.display='none';
 }
}**/
</script>