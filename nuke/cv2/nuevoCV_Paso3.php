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
<link rel="stylesheet" href="thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../estilo1.css" type="text/css">

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="thickbox.js"></script>

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
<script>
function ocultarFila(num,ver) {
  dis= ver ? '' : 'none';
  tab=document.getElementById('tabla_experiencia'); 
  tab.getElementsByTagName('tr')[num].style.display=dis;
}
</script>
<body>

 
<center><span class="titulo1">Ingresa tus Datos: Paso 3</span></center>
<br><br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "menu_cv.php";
}
?>

 <fieldset style="width: 80%;">
    <legend><span class="titulo2">Experiencia Laboral</span></legend>
<style>
.label{
	text-align: right;
}
</style>
  <?php 
  require_once "../includes/conexion.php";
  $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  if(isset($_GET['id'])){
	  echo '<form action="updateCV_paso3.php?idUsuarioExperiencia='.$_GET['id'].'" method="post" >';
	  echo '<fieldset style="width: 95%; border-color: #0000CC;">';
	  echo '<legend><span class="titulo2">Editar</span></legend>';

	  $query="SELECT ue.*, re.descripcion as rubro_desc FROM usuarios_experiencia ue inner join rubro_empresa re on (re.id=ue.id_rubro)  WHERE ue.id=".$_GET['id'];
	  
	  include("consultar.php");
	  $exp = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	  if($exp['actual']){
		$checked="checked";
	  }else{
	  	$checked=" ";
	  }
  	  $button_value = "Modificar";
  }else{
  	  echo '<form action="insert_experiencia.php" method="post" >';
	  $button_value = "Agregar";
  }
  
?>
  <table  width="100%" id="tabla_experiencia">
	<tr><td width='25%' class='label'>Empresa/Instituci&oacute;n</td><td><input id='empresa' name='empresa' type='text' class='caja' size='35' value="<?=$exp['empresa']?>"></td></tr>	

	<tr><td class='label' width='240px' class='label'>Categoria </td><td>
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
		<tr><td class='label'>Rubro</td><td>

		<select class="opcion" id="rubro" name="rubro">
			<option value="0" selected="selected">-- Seleccione --</option>
		</select>
		<?
		 if(isset($_GET['id'])){ 
			echo "<a href='javascript:ocultarFila(1, false);ocultarFila(2, false);ocultarFila(3, true);'>Ocultar</a>";
		 }

		?>
		</td></tr>
		
		<tr><td class='label'>Rubro</td><td class='opcion'><input type='hidden'  id='rubro_aux' name='rubro_aux' value="<?=$exp['id_rubro']?>" /><?=$exp['rubro_desc']?>&nbsp;&nbsp;&nbsp;<a href='javascript:ocultarFila(1, true);ocultarFila(2, true);ocultarFila(3, false);'>Elegir otro</a></td></tr>
	
		  		
		
		<tr><td class='label'>Fecha de Inicio</td><td>
		<select class="opcion" id="mes_inicio" name="mes_inicio">
			<?
			foreach($meses as $indice => $mes) {
				if($exp['mes_ingreso']==($indice+1)){
					print "<option value=".($indice+1)." selected>".$mes."</option>";
				}else{
					print "<option value=".($indice+1).">".$mes."</option>";
				}
			}
			?>	
			
		</select>
		
		<select class="opcion" id="ano_inicio" name="ano_inicio">
			<?
			for ($i=0; $i<=100; $i++){
				if($exp['ano_ingreso']==(date("Y")-$i)){
					print "<option value=".(date("Y")-$i)." selected>".(date("Y")-$i)."</option>";
				}else{
					print "<option value=".(date("Y")-$i).">".(date("Y")-$i)."</option>";
				}
			}
			?>	
		</select>
		</td></tr>

		<tr><td class='label'>Fecha de Fin</td><td>
		<select class="opcion" id="mes_Fin" name="mes_Fin">
			<?
			foreach($meses as $indice => $mes) {
				if($exp['mes_egreso']==($indice+1)){
					print "<option value=".($indice+1)." selected>".$mes."</option>";
				}else{
					print "<option value=".($indice+1).">".$mes."</option>";
				}
			}
			?>	
		</select>
		
		<select class="opcion" id="ano_Fin" name="ano_Fin">
			<option value="0" selected="selected">Actual</option>
			<?
			for ($i=0; $i<=100; $i++){
				if($exp['ano_egreso']==(date("Y")-$i)){
					print "<option value=".(date("Y")-$i)." selected>".(date("Y")-$i)."</option>";
				}else{
					print "<option value=".(date("Y")-$i).">".(date("Y")-$i)."</option>";
				}
			}
			?>	
		</select>
		</td></tr>
		<tr>
			<td class="label">Actualmente Trabajando</td><td><input type="checkbox" name="trabajando" value="true" <?=$checked?>/></td>
		</tr>
		<tr>
			<td class="label">Puesto Ocupado</td><td><input id='puesto' name='puesto' type='text' class='caja' size='35' value="<?=$exp['puesto']?>"></td>
		</tr>
		<tr>
			<td class="label">Descripci&oacute;n de tareas<br> y responsabilidades</td><td><textarea id='descripcion' name='descripcion' class='caja' rows="4" cols='37'><?=$exp['responsabilidades']?></textarea></td>
		</tr>
		<tr>
			<td class="label">Personal a Cargo</td><td><input id='aCargo' name='aCargo' type='text' class='caja' size='4' value="<?=$exp['pers_cargo']?>"></td>
		</tr>
		<tr>
			<td class="label">Logros Obtenidos</td><td><input id='logros' name='logros' type='text' class='caja' size='35' value="<?=$exp['logros']?>"></td>
		</tr>
		<tr>
			<td class="label">Comentarios</td><td><textarea id='comentarios' name='comentarios' class='caja' rows="4" cols='37'><?=$exp['observaciones']?></textarea></td>
		</tr>
		<tr>
			<td align="center" colspan="2"></br>
				<input class="boton" type="submit"  value="<?=$button_value ?>"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			
			<? if(isset($_GET['id'])){ ?>
				<input class="boton" type="button" value="Deshacer" onclick="javascript:window.location='nuevoCV_Paso3.php'"/>
			<?}?>
			</td>
		</tr>
</table>

<?php
 if(!isset($_GET['id'])){ 
		echo "<script>ocultarFila(1, true);ocultarFila(2, true);ocultarFila(3, false);</script>";
		print "<br>";
	 }else{
   	    print "</fieldset>";
		print "<br>";
		echo "<script>ocultarFila(1, false);ocultarFila(2, false);ocultarFila(3, true);</script>";
	 }
	

	$query = "SELECT r.descripcion as rubro_desc, ue.* FROM usuarios_experiencia ue inner join rubro_empresa r on (ue.id_rubro = r.id) WHERE ue.id_usuario=".$_SESSION['idUsr'];	
	include("consultar.php");
	if ($ok = $result -> numRows()){

		print("<tr><td colspan='4'>");
		print("<table align='center' width='98%'  style='border: none;'>");
			
		print("<tr align='center' style='background : #C0C0C0;font-weight:bold;' class='opcion'><td>Empresa</td><td align='center'>Rubro</td><td align='center'>Ingreso</td><td>Egreso</td><td>Puesto</td><td>Responsabilidades</td><td>A Cargo</td><td>Logros</td><td>Observaciones</td><td ></td><td ></td></tr>");		
		while ($experiencia = $result -> fetchRow(DB_FETCHMODE_ASSOC)){		
			if($experiencia['mes_egreso']=="0"){
				$experiencia['mes_egreso']="Actual";
			}
			if($experiencia['ano_egreso']=="0"){
				$experiencia['ano_egreso']="Actual";
			}
			print("<tr class='opcion'><td> ".$experiencia['empresa']."</td><td >".$experiencia['rubro_desc']."</td><td align='right'>".$meses[$experiencia['mes_ingreso']]." de ".$experiencia['ano_ingreso']."</td><td align='right'>".$meses[$experiencia['mes_egreso']]." de ".$experiencia['ano_egreso']."</td><td align='right'>".$experiencia['puesto']."</td><td >".$experiencia['responsabilidades']."</td><td align='right'>".$experiencia['pers_cargo']."</td><td >".$experiencia['logros']."</td><td >".$experiencia['observaciones']."</td>");
			
			print("<td><a href='nuevoCV_Paso3.php?id=".$experiencia['id']."'><img src='icons/edit.png' border='0' align='middle' width='16' height='16'  alt='Modificar'></a></td>");  	
			print("<td><a href='javascript:eliminarExperiencia(".$experiencia['id'].")'><img src='icons/del.png' border='0' align='middle' width='16' height='16' alt='Eliminar'></a></td>");	
			print "</tr>";
			
		}
		
		print("</table>");		
	}
?>
</form>
</fieldset>
<form action="nuevoCV_Paso4.php">
<table width="80%">
<tr>
	<td align="center" colspan="2"></br>
		<input class="boton" type="submit" value="Siguiente"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<!--<input class="boton" type="reset" value="Limpiar"/>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input class="boton" type="button" value="Volver" onclick="javascript:window.location='nuevoCV_Paso2.php'"/>
	</td>
</tr>
</table>

 </form>

<br>

</body>
</html>

<script>


var dni = new LiveValidation('empresa', {onlyOnSubmit: true } );
dni.add( Validate.Presence );

var nombre = new LiveValidation('puesto', {onlyOnSubmit: true } );
nombre.add( Validate.Presence );

var logros = new LiveValidation('logros', {onlyOnSubmit: true } );
logros.add( Validate.Presence );

var comentarios = new LiveValidation('comentarios', {onlyOnSubmit: true } );
comentarios.add( Validate.Presence );

var descripcion = new LiveValidation('descripcion', {onlyOnSubmit: true } );
descripcion.add( Validate.Presence );

var aCargo = new LiveValidation('aCargo', {onlyOnSubmit: true } );
aCargo.add( Validate.Presence );
aCargo.add( Validate.Numericality );


</script>


<?
	 if(!isset($_GET['id'])){ 
		echo "<script>var rubro = new LiveValidation('rubro', {onlyOnSubmit: true } );";
		echo "rubro.add( Validate.Exclusion, { within: [ '0' ] } );</script>";
	 }

?>

<script>

function eliminarExperiencia(idExperiencia){
var ok=confirm("¿Realmente desea ELIMINAR este experiencia laboral?");
	if(ok)
	{
	document.location="deleteExperiencia.php?id="+idExperiencia;
	}
}


</script>