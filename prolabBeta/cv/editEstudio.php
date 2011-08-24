<?php
session_start();
?>
<script src="js/ajax.js"></script>
<script src="jquery.js"></script>
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
			
				$.post("combos_nivel_titulo.php",{
									combo_name:$(this).attr("name"), // Nombre del combo
									id:$(this).val() // Valor seleccionado
									},function(data){
													$("#"+combos[posicion]).html(data);	//Tomo el resultado de pagina e inserto los datos en el combo indicado																				
													})		
			 
			}
		}
	})		
})

		
function ocultarFila(num,ver) {
  dis= ver ? '' : 'none';
  document.getElementById('tabla_thickbox').getElementsByTagName('tr')[num].style.display=dis;
}
</script>
<style>
.label{
font-family: Arial, Helvetica, sans-serif;
font-size: 11px;
color: #1D3C81;
text-decoration: none;
text-align: right;
margin-left: 10;
margin-right: 10;	
}
</style>
<?php
		include("../conexion.php");

		$qEstudio =  $conexionDB->query("SELECT * FROM usuarios_estudios ui  where ui.id=".$_GET['idUsuarioEstudio']);		
		$row = $qEstudio -> fetchRow(DB_FETCHMODE_ASSOC);
	//armo el combo de niveles para estudio
		$Qestudios_nivel =  $conexionDB->query("SELECT * FROM estudios_nivel ");
		$combo_nivel = "";					
		while ($row1 = $Qestudios_nivel -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row1["id"]==$row['id_nivel']){	
				$combo_nivel.="<option value='".$row1["id"]."' selected>".$row1["descripcion"]."</option>";
			}else{
				$combo_nivel.="<option value='".$row1["id"]."'>".$row1["descripcion"]."</option>";
			}
		}
	//FIN

	//armo el combo de niveles para instituciones
		$Qinstituciones =  $conexionDB->query("SELECT * FROM instituciones ");
		$combo_instituciones = "";					
		while ($row2 = $Qinstituciones -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row2["id"]==$row['id_institucion']){	
				$combo_instituciones.="<option value='".$row2["id"]."' selected>".$row2["descripcion"]."</option>";
			}else{
				$combo_instituciones.="<option value='".$row2["id"]."'>".$row2["descripcion"]."</option>";
			}
		}
	//FIN

	//armo el combo de niveles para titulos
		$Qtitulos =  $conexionDB->query("SELECT id,descripcion FROM titulos WHERE id_nivel = ".$row['id_nivel']." order by descripcion ASC");
		$combo_titulos = "";					
		while ($row3 = $Qtitulos -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row3["id"]==$row['id_titulo']){	
				$combo_titulos.="<option value='".$row3["id"]."' selected>".$row3["descripcion"]."</option>";
			}else{
				$combo_titulos.="<option value='".$row3["id"]."'>".$row3["descripcion"]."</option>";
			}
		}
	//FIN
		
	//armo el combo de niveles para estado_carrera
		$Qestado_carrera =  $conexionDB->query("SELECT * FROM estado_carrera ");
		$combo_estado = "";					
		while ($row4 = $Qestado_carrera -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row4["id"]==$row['id_estado_carrera']){	
				$combo_estado.="<option value='".$row4["id"]."' selected>".$row4["descripcion"]."</option>";
			}else{
				$combo_estado.="<option value='".$row4["id"]."'>".$row4["descripcion"]."</option>";
			}
		}
	//FIN

	//armo el combo de niveles para estado_carrera
		$Qgrado_avance_carrera =  $conexionDB->query("SELECT * FROM grado_avance_carrera ");
		$combo_avance = "";					
		while ($row5 = $Qgrado_avance_carrera -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row5["id"]==$row['id_grado_avance']){	
				$combo_avance.="<option value='".$row5["id"]."' selected>".$row5["descripcion"]."</option>";
			}else{
				$combo_avance.="<option value='".$row5["id"]."'>".$row5["descripcion"]."</option>";
			}
		}
	//FIN
		
		echo "<form	method='post' action='update_estudios.php'>";
		echo "<input type='hidden' name='idUsuarioEstudio' value='".$_GET['idUsuarioEstudio']."' />";
		echo "<table width='100%' id='tabla_thickbox'>";
		echo "<tr><td align='right' class='label'>Nivel</td><td align='left'>";			
		echo "<select style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;' name='nivel' id='nivel' onchange='cambiar_opciones(this.value)'>";			
			echo $combo_nivel;		 
		print "</select>";			
		print "</td></tr>";
		?>
		<tr><td class='label'>Instituci&oacute;n</td><td>
			<input type="text" size="35" name="institucion_text" id="institucion_text" value="<?=$row['institucion']?>"/>	
			<input type="hidden" name="es_text" id="es_text" value="1"/>
		</td></tr>
		<?php
		echo "<tr><td align='right' class='label'>Institucion</td><td align='left'>";			
		echo "<select style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;' name='institucion' id='institucion'>";			
			echo $combo_instituciones;		 
		print "</select>";			
		print "</td></tr>";
		?>
		<tr><td class='label'>Titulo</td><td>
			<input type="text" size="35" name="titulo_text" id="titulo_text" value="<?=$row['titulo']?>"/>		
		</td></tr>

		<tr><td class='label'>Titulo</td><td>
		<select class="opcion" name="titulo" id="titulo">			
			<?echo $combo_titulos;?>
		</select>
		
		</td></tr>
		<?php
		//echo "<tr><td align='right' class='label'>Titulo</td><td align='left'>";			
		//echo "<select style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;' name='titulo' id='titulo'>";			
		//	echo $combo_titulos;		 
		//print "</select>";			
		//print "</td></tr>";
		echo "<tr><td align='right' class='label'>Estado</td><td align='left'>";			
		echo "<select style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;' name='estado' id='estado'  onchange='mostrar_grado_avance(this.value);'>";			
			echo $combo_estado;		 
		print "</select>";			
		print "</td></tr>";		
		?>
		
		<tr><td class='label'><div  id="id_grado_avance" style="display: none;">Grado de Avance</div></td><td>
		<div  id="id_grado_avance1" style="display: none;"><select class="opcion" name="grado" id="grado">			
		<?php
	
		$Qgrado_avance_carrera =  $conexionDB->query("SELECT * FROM grado_avance_carrera ");
							
			while ($row = $Qgrado_avance_carrera -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
			}
		 
		?>
		</select>
		</div>
		</td></tr>
	
		<tr><td colspan='2' align='center'><br><br><input type='submit' value='guardar' style='font-size:10px; font-family:Verdana,Helvetica; font-weight:bold; color:white; background:#638cb5; border:0px; width:80px; height:19px;'/></td></tr>
		</table>
		</form>		

		


<script src="js/ajax.js"></script>

<script>


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
		
	