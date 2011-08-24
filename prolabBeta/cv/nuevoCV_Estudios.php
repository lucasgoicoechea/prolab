<script>

function ocultarFila(num,ver) {
  dis= ver ? '' : 'none';
  document.getElementById('tabla_estudio').getElementsByTagName('tr')[num].style.display=dis;
}
</script>
<script>
$(document).ready(function(){
	$("select").change(function(){
		// Vector para saber cuál es el siguiente combo a llenar

		var combos = new Array();
		combos['nivel'] = "titulo";
		// Tomo el nombre del combo al que se le a dado el clic por ejemplo: país
		posicion = $(this).attr("name");
		// Tomo el valor de la opción seleccionada 
		valor = $(this).val()		
		// Evaluó  que si es país y el valor es 0, vacié los combos de estado y ciudad
		if(posicion != 'nivel' || valor!=0){
		/* En caso contrario agregado el letreo de cargando a el combo siguiente
		Ejemplo: Si seleccione país voy a tener que el siguiente según mi vector combos es: estado  por qué  combos [país] = estado
			*/
			$("#"+combos[posicion]).html('<option selected="selected" value="0">Cargando...</option>')
			/* Verificamos si el valor seleccionado es diferente de 0 y si el combo es diferente de ciudad, esto porque no tendría caso hacer la consulta a ciudad porque no existe un combo dependiente de este */
			if(valor!="0"){
			// Llamamos a pagina de combos.php donde ejecuto las consultas para llenar los combos
			
				$.post("cv/combos_nivel_titulo.php",{
									combo_name:$(this).attr("name"), // Nombre del combo
									id:$(this).val() // Valor seleccionado
									},function(data){
													$("#"+combos[posicion]).html(data);	//Tomo el resultado de pagina e inserto los datos en el combo indicado																				
													})		
			 
			}
		}
	})		
})
</script>
<form action="cv/insert_estudio.php" method="post" >
  
<fieldset style="width: 95%;">
 <legend><span class="titulo2">Estudios Formales</span></legend>
 <table width="100%" id="tabla_estudio">
	<tr><td class='label'>Nivel</td><td>
		<select class="opcion" name="nivel" id="nivel" onchange="cambiar_opciones(this.value);">			
		<?php
		$Qestudios_nivel =  $conexionDB->query("SELECT * FROM estudios_nivel");
											
			while ($row = $Qestudios_nivel -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		</td></tr>

		<tr><td class='label'>Instituci&oacute;n</td><td>
			<input type="text" size="35" name="institucion_text" id="institucion_text" />	
			<input type="hidden" name="es_text" id="es_text" value="1"/>
		</td></tr>
		
		<tr><td class='label'>Instituci&oacute;n</td><td>
		<select class="opcion" name="instituciones" id="instituciones">			
		<?php
		$Qinstituciones =  $conexionDB->query("SELECT * FROM instituciones");
								
			while ($row = $Qinstituciones -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		
		</td></tr>

		<tr><td class='label'>Titulo</td><td>
			<input type="text" size="35" name="titulo_text" id="titulo_text" />		
		</td></tr>

		<tr><td class='label'>Titulo</td><td>
		<select class="opcion" name="titulo" id="titulo">			
		
		</select>
		
		</td></tr>
		
		<tr><td class='label'>Estado</td><td>
		<select class="opcion" name="estado" id="estado" onchange="mostrar_grado_avance(this.value);">			
		<?php
	
		$Qestado_carrera =  $conexionDB->query("SELECT * FROM estado_carrera");
			while ($row = $Qestado_carrera -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		
		</td></tr>
		
		<tr><td class='label'><div  id="id_grado_avance" style="display: none;">Grado de Avance</div></td><td>
		<div  id="id_grado_avance1" style="display: none;"><select class="opcion" name="grado" id="grado">			
		<?php
	
		$Qgrado_avance_carrera =  $conexionDB->query("SELECT * FROM grado_avance_carrera");
			while ($row = $Qgrado_avance_carrera -> fetchRow(DB_FETCHMODE_ASSOC)){
			
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
	$Qgrado_avance_carrera =  $conexionDB->query("SELECT ue.id, en.descripcion as nivel, i.descripcion as institucion_pred, t.descripcion as titulo_pred, ue.institucion, ue.titulo, ec.descripcion as estado, ga.descripcion as avance FROM usuarios_estudios ue inner join estudios_nivel en on (ue.id_nivel = en.id)  left outer join  instituciones i on (i.id=ue.id_institucion) left outer join titulos t on (t.id=ue.id_titulo) left outer join estado_carrera ec on (ec.id=ue.id_estado_carrera) left outer join grado_avance_carrera ga on (ga.id=ue.id_grado_avance) WHERE ue.id_usuario=".$_SESSION['idUsr']." order by en.id");
	//echo $query;
	//print "<table><tr><td class='header' colspan='4' style='font-size: 12px'>SELECT en.descripcion FROM usuarios_estudios ue inner join estudios_nivel en on (ue.id_nivel = en.id) WHERE ue.id_usuario = ".$_SESSION['idUsr']."</td></tr>";
	//include("consultar.php");
	if ($ok = $Qgrado_avance_carrera -> numRows()){
?>
	<tr><td colspan='4'>

	<table align='center' width='98%'  style='border: none;'>	
	<tr class="label_center" style='background: #C0C0C0; font-weight: bold; font-size: 13px;'><td>Nivel</td><td>Institucion</td><td>Titulo</td><td>Estado</td><td >Avance</td><td>&nbsp;</td><td >&nbsp;</td></tr>

<?php										
		while ($estudios = $Qgrado_avance_carrera -> fetchRow(DB_FETCHMODE_ASSOC)){	
			if($estudios['institucion_pred']==""){
				$institucion = $estudios['institucion'];
			}else{
				$institucion = $estudios['institucion_pred'];
			}
			if($estudios['titulo_pred']==""){
				$titulo = $estudios['titulo'];
			}else{
				$titulo = $estudios['titulo_pred'];
			}
			print("<tr class='label_left'><td style='text-align:left; background : #E0E0E0 font-size:12px;'> ".$estudios['nivel']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$institucion."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$titulo."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$estudios['estado']."</td><td style='text-align:left; background : #E0E0E0 font-size:12px;'>".$estudios['avance']."</td>");
			
			print("<td align='center' style='background : #E0E0E0 font-size:12px;'><a href='cv/editEstudio.php?idUsuarioEstudio=".$estudios['id']."&keepThis=true&TB_iframe=true&height=200&width=500'  class='thickbox'><img src='cv/icons/edit.png' border='0' align='middle' width='16' height='16'  alt='Modificar'></a></td>");  	
			print("<td style=' background :#E0E0E0 font-size:12px;' align='center'><a href='javascript:eliminarEstudio(".$estudios['id'].")'><img src='cv/icons/del.png' border='0' align='middle' width='16' height='16' alt='Eliminar'></a></td>");	
			print "</tr>";		
		}	//fin del while
		print("</table>");
	}//fin del if
?>
</fieldset>
 </form>

<script>

function eliminarEstudio(idEstudio){
var ok=confirm("¿Realmente desea ELIMINAR este Estudio?");
	if(ok)
	{
	document.location="cv/deleteEstudio.php?id="+idEstudio;
	}
}



function mostrar_grado_avance(){ 	
	id_estado = document.getElementById("estado").value;
	url = "cv/es_completo.php?id_estado=" + id_estado;
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


function mostrar_todo(){
	for(i=1; i<=7; i++){
		ocultarFila(i, true);
	}
}

function cambiar_opciones(id_nivel){
	switch (id_nivel) {
	case "1": mostrar_todo(); 
			ocultarFila(2, false);
			ocultarFila(3, false);
			ocultarFila(4, false);
			break;
	case "2":mostrar_todo();
			ocultarFila(2, false);
			ocultarFila(3, false);
			break;
	case "3":mostrar_todo();
			ocultarFila(2, false);
			ocultarFila(4, false);
			break;
	case "4": mostrar_todo();
			ocultarFila(1, false);
			document.getElementById('es_text').value = 0;
			ocultarFila(3, false);
			break;
	case "5":mostrar_todo();
			ocultarFila(1, false);
			document.getElementById('es_text').value = 0;
			ocultarFila(4, false);
			break;
	case "6":mostrar_todo();
			ocultarFila(1, false);
			document.getElementById('es_text').value = 0;
			ocultarFila(4, false);
			break;
	case "7":mostrar_todo(); 
			ocultarFila(1, false);
			document.getElementById('es_text').value = 0;
			ocultarFila(4, false);
			break;
		
	default: id_nivel = 'unknown';
			 mostrar_todo(); 
			 break;

	}
	
}

cambiar_opciones(document.getElementById('nivel').value);
</script>