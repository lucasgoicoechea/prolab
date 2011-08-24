<?php
session_start();
?>
<script src="jquery.js"></script>
<script type="text/javascript" src="../livevalidation.js"></script>
<script>
function autentica(){ 	
	
	rubro = document.getElementById('rubro').value;
	idUsuarioExp = document.getElementById('idUsuarioExp').value;
	url = "update_rubro_experiencia.php?rubro="+rubro+"&idUsuarioExp="+idUsuarioExp;
	leer_doc(url);
}

var req;

function leer_doc(url){	
	if (window.XMLHttpRequest) { 
		req = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(req){
		req.onreadystatechange = procesarRespuesta;
		req.open('GET', url, true);
		req.send(null);
	} 
}

function procesarRespuesta(){
	/*respuesta = req.responseXML;
	var existe = respuesta.getElementsByTagName('existe').item(0).firstChild.data;
	if (existe=="true"){		
		document.getElementById("error").style.visibility = "visible";
	}else{
		document.getElementById("error").style.visibility = "hidden";
	}*/	
		
}
</script>
<script>
$(document).ready(function(){
	$("select").change(function(){
		// Vector para saber cuál es el siguiente combo a llenar

		var combos = new Array();
		combos['categoria'] = "rubro";
		// Tomo el nombre del combo al que se le a dado el clic por ejemplo: país
		posicion = $(this).attr("name");
		// Tomo el valor de la opción seleccionada 
		valor = $(this).val()		
		// Evaluó  que si es país y el valor es 0, vacié los combos de estado y ciudad
		if(posicion == 'categoria' && valor==0){
			$("#rubro").html('	<option value="0" selected="selected">-- Seleccione --</option>')
		}else{
		/* En caso contrario agregado el letreo de cargando a el combo siguiente
		Ejemplo: Si seleccione país voy a tener que el siguiente según mi vector combos es: estado  por qué  combos [país] = estado
			*/
			$("#"+combos[posicion]).html('<option selected="selected" value="0">Cargando...</option>')
			/* Verificamos si el valor seleccionado es diferente de 0 y si el combo es diferente de ciudad, esto porque no tendría caso hacer la consulta a ciudad porque no existe un combo dependiente de este */
			if(valor!="0"){
			// Llamamos a pagina de combos.php donde ejecuto las consultas para llenar los combos
			
				$.post("combos -rubro-categoria.php",{
									combo_name:$(this).attr("name"), // Nombre del combo
									id:$(this).val() // Valor seleccionado
									},function(data){
													$("#"+combos[posicion]).html(data);	//Tomo el resultado de pagina e inserto los datos en el combo indicado																				
													})		
			  //agregado por Juan (no se recarga el tercer combo a partir del cambio del primero sobre el segundo)
			  if(posicion =='categoria'){			
				 $("#rubro").html('<option value="0" selected="selected">-- Seleccione --</option>')
			  }//fin del if
			}
		}
	})		
})
</script>
<?php
		$query="SELECT ue.*, re.descripcion as rubro_desc FROM usuarios_experiencia ue inner join rubro_empresa re on (re.id=ue.id_rubro)  WHERE ue.id=".$_GET['id'];		
		
		include("consultar.php");	
		$row1 = $result -> fetchRow(DB_FETCHMODE_ASSOC);
		$query ="SELECT * FROM rubro_empresa ";
		include("consultar.php");	
		?>
		<form	method='post' action='javascript:autentica()'>
		<input type='hidden' id="idUsuarioExp" name='idUsuarioExp' value="<?=$_GET['id']?>" />
		<table width='100%'>

		<tr><td style='font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #1D3C81;text-decoration: none;	text-align: right;margin-left: 10;margin-right: 10;'>Categoria </td><td>
		<select class="opcion" name="categoria" id="categoria">
			<option selected="selected" value="0">-- Seleccione --</option>
		<?php

		$query ="SELECT * FROM categoria_empresa ";
		include("consultar.php");	
								
		while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}
		 
		?>
		</select>

		</td></tr>
		<tr><td style='font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #1D3C81;text-decoration: none;	text-align: right;margin-left: 10;margin-right: 10;'>Rubro</td><td>

		<select class="opcion" id="rubro" name="rubro">
			<option value="0" selected="selected">-- Seleccione --</option>
		</select>
		</td></tr>
        <tr><td colspan='2' align='center'><br><br><input type='submit' value='guardar' style='font-size:10px;  font-family:Verdana,Helvetica; font-weight:bold; color:white; background:#638cb5; border:0px; width:80px; height:19px;'/></td></tr>
	</table>
 </form>
		
<script>

var rubro = new LiveValidation('rubro', {onlyOnSubmit: true } );
rubro.add( Validate.Exclusion, { within: [ '0' ] } );

</script>
		
		
		
		
	