<?php
 session_start();
 function dateToTimestamp($date){
	//el date tiene q ser formato Y-m-d
	$ano=substr($date,0,4);
	$mes=substr($date,5,2);
	$dia=substr($date, 8,2);	
	
	$timestamp= mktime(0,0,0,$mes,$dia,$ano);
	return $timestamp;
  }
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="../estilo1.css" type="text/css">
<script type="text/javascript" src="../livevalidation.js"></script>
<script language="JavaScript" src="../js/date-picker.js"></script>
<?	if(!isset($_SESSION['idUsr'])){ 
		echo "<script language='JavaScript' src='../js/validar_ciudad.js'></script>";
	 }
?>
</HEAD>

<script src="jquery.js"></script>
<script src="js/combos_ciudad.js"></script>
<script src="js/ajax.js"></script>

<script>

function autentica(){ 
	usuario = document.getElementById("dni").value;
	url = "existe_usuario.php?usuario=" + usuario;
	leer_doc(url, procesarRespuesta);
}


function procesarRespuesta(){
	respuesta = req.responseXML;
	var existe = respuesta.getElementsByTagName('existe').item(0).firstChild.data;
	if (existe=="true"){		
		document.getElementById("error").style.visibility = "visible";
	}else{
		document.getElementById("error").style.visibility = "hidden";
	}
	
}

function validezUsuario(){	
	return document.getElementById("error").style.visibility == "hidden";
}


function ocultarFila(num,ver) {
  dis= ver ? '' : 'none';
  tab=document.getElementById('tabla_paso1'); 
  tab.getElementsByTagName('tr')[num].style.display=dis;
}


</script>

<body>


<center><span class="titulo1">Ingresa tus Datos: Paso 1</span></center>

 <br><br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "menu_cv.php";
}
?>

 <fieldset style="width: 80%;; background:#F9FBFB;">
    <legend><span class="titulo2">Datos Personales</span></legend>
<style>
.label{
	text-align: right;
}
</style>
  <?php 
    if(isset($_SESSION['idUsr'])){
	  echo '<form action="updateCV_paso1.php" method="post" name="form1">';
	}else{
	  echo '<script>autentica();</script>';
	  echo '<form action="insertCV_paso1.php" method="post" name="form1" onsubmit="return validezUsuario();">';
	}
   
  require_once "../includes/conexion.php";
  if( isset($_SESSION['idUsr']) ){
	$query ="SELECT u.*, cl.c_id as id_ciudad, cpa.c_id as id_partido, cpr.c_id as id_provincia, cl.d_descripcion as ciudad FROM usuarios u inner join com_localidad cl on (cl.c_id = u.id_ciudad) inner join com_partido cpa on (cpa.c_id=cl.c_id_partido) inner join com_provincia cpr on (cpr.c_id = cpa.c_id_provincia)  where id=".$_SESSION['idUsr'];
	include("consultar.php");	
	$row_user = $result -> fetchRow(DB_FETCHMODE_ASSOC);	
	if(!$row_user){
		//usuario con datosd e cv viejos
		$query ="SELECT * FROM usuarios u where id=".$_SESSION['idUsr'];
		include("consultar.php");	
		$row_user = $result -> fetchRow(DB_FETCHMODE_ASSOC);	
	}
    $timestamp = dateToTimestamp($row_user['fecha_nacimiento']);
	$fechaFormat=gmdate( "d-m-Y", $timestamp);
  }
  

  ?>
  <table  width="100%" id="tabla_paso1">
	<tr><td width='25%' class='label'>Apellido</td><td><input id='apellido' name='apellido' type='text' class='caja' size='35' value="<?=$row_user['apellido']?>" /></td></tr>
	<tr><td class='label'>Nombre</td><td><input id='nombre' name='nombre' type='text' class='caja' size='35' value="<?=$row_user['nombre']?>"/></td></tr>
	<tr><td class='label'>Sexo</td>
		<td>
			<select class="opcion" name='sexo' id='sexo'>
			<?if(isset($_SESSION['idUsr']) && $row_user['sexo']=="Femenino"){
					echo "<option value='Masculino'>Masculino</option>";
					echo "<option value='Femenino' selected>Femenino</option>";
			  }else{
					echo "<option value='Masculino' selected>Masculino</option>";
					echo "<option value='Femenino'>Femenino</option>";
  			  }?>
			</select>
		</td>
	</tr>
	<?php
	if(!isset($_SESSION['idUsr'])){ //En el caso q se vaya a inserta agrego validaciones de usuario
		print "<tr><td class='label'>DNI</td><td><input id='dni' name='dni' type='text' class='caja' size='18' onkeyup='return autentica();'/>&nbsp;";
	 }else { //En el caso q sea un update lo deshabilito, ya q no se puede cambiar un usuario
		print "<tr><td class='label'>DNI</td><td><input id='dni' name='dni' type='text' class='caja' size='18' readonly='true' value='".$row_user['dni']."' style='background: #DBDBDB;'/>&nbsp;";
	 }
	 ?>
	<span id="error" style="color: #FF0033;background-color:#FFFF99;  position:relative;visibility:hidden;">Este usuario ya existe!!!</span>
	<span class='texto1' style="position:relative;"><font color="#FF0033">**Su Nro. de DNI es su Usuario</font><span></td></tr>
	<tr><td class='label'>Password</td><td ><input id='pass' name='pass' type='password' class='caja'  value="<?=$row_user['clave']?>" /></td></tr>
	<tr><td class='label'>Confirmacion de Password</td><td ><input id='pass2' name='pass2' type='password' class='caja'  value="<?=$row_user['clave']?>" /></td></tr>
	<tr><td class='label'>Fecha de Nacimiento</td><td><input id='fecha_nac' name='fecha_nac' type='text' class='caja' size='12' readonly="true" style="background: #DBDBDB;" value="<?=$fechaFormat?>" />			
			<a href="javascript:show_calendar('form1.fecha_nac',null,'','DD-MM-YYYY');" onMouseOver="window.status='Date Picker';return true;" onMouseOut="window.status='';return true;">			
            		<img src="../img/b_calendario.gif" width=24 height=22 border=0 alt="calendario">
            </a>
			<span class="texto1"><font color="#FF0033">**Formato dd-mm-YYYY</font><span>
	</td></tr>	

	<tr><td class='label'>Provincia</td><td>
		<select class="opcion" name="pais" id="pais">
			<option selected="selected" value="0">-- Seleccione --</option>
		<?php
		require_once "DB.php";
			
		$query ="SELECT * FROM com_provincia ";
		include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				if(isset($_SESSION['idUsr']) && $row_user['id_provincia']==$row["id"]){
					print "<option value='".$row["c_id"]."' selected>".$row["d_descripcion"]."</option>";
				}else{
					print "<option value='".$row["c_id"]."'>".$row["d_descripcion"]."</option>";
				}			 
			}
		 
		?>
		</select>

		</td></tr>
		<tr><td class='label'>Partido</td><td>

		<select class="opcion" id="estado" name="estado">
			<option value="0" selected="selected">-- Seleccione --</option>
		</select>
		</td></tr>
		<tr><td class='label'>Ciudad</td><td> 
		<select class="opcion" id="ciudad" name="ciudad">
			<option value="0" selected="selected">-- Seleccione --</option>
		</select>
		<?
		 if(isset($_SESSION['idUsr'])){ 
			echo "<a href='javascript:ocultarFila(7, false);ocultarFila(8, false);ocultarFila(9, false);ocultarFila(10, true);'>Ocultar</a>";
		 }
		?>
		</td></tr>
		
		<tr><td class='label'>Ciudad</td><td class='opcion'><input type='hidden'  id='ciudad_aux' name='ciudad_aux' value="<?=$row_user['id_ciudad']?>" /><?=$row_user['ciudad']?>&nbsp;&nbsp;&nbsp;<a href='javascript:ocultarFila(7, true);ocultarFila(8, true);ocultarFila(9, true);ocultarFila(10, false);'>Elegir otra</a></td></tr>
		
		   
		<tr><td class='label'>Domicilio</td><td ><input id='domicilio' name='domicilio' size="40" type='text' class='caja'  value="<?=$row_user['domicilio']?>" /></td></tr>
		<tr><td class='label'>Cod. Postal</td><td ><input id='cp' name='cp' size="4" type='text' class='caja'  value="<?=$row_user['cp']?>" /></td></tr>
		<tr><td class='label'>Telefono</td><td ><input id='telefono' name='telefono' size="20" type='text' class='caja'  value="<?=$row_user['telefono']?>" /></td></tr>
		<tr><td class='label'>Celular</td><td ><input id='celular' name='celular' size="20" type='text' class='caja' value="<?=$row_user['celular']?>" /></td></tr>
		<tr><td class='label'>E-Mail</td><td ><input id='mail' name='mail' size="35" type='text' class='caja' value="<?=$row_user['email']?>"></td></tr>
	
	
	<tr><td class='label'>Estado Civil</td><td>
	<select class="opcion" id='estado_civil' name='estado_civil'>
	<?
	$query ="SELECT * FROM estadocivil ";
    include("consultar.php");	
								
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				if(isset($_SESSION['idUsr']) && $row_user['id_estado_civil']==$row["id"]){
					print "<option value='".$row["id"]."' selected>".$row["descripcion"]."</option>";
				}else{
					print "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
				}			 
			}
	print("</select>");	 
	print("</td></tr>");
	
 ?>
<tr><td class='label'>Cant. Hijos</td><td ><input id='hijos' name='hijos' size="4" type='text' class='caja' value="<?=$row_user['canthijo']?>"/></td></tr>
<tr><td class='label'>¿Desea inactivar moment&aacute;neamente su CV?</td>
<td>
<?if(isset($_SESSION['idUsr']) && $row_user['recibir_oferta']==false){			
	echo '<input type="radio" name="inactivarCV" value="false" checked><span class="label">Si</span>';
	//Los valores estan invertidos pq en la bd es recibir_oferta
	echo '<input type="radio" name="inactivarCV" value="true"><span class="label">No</span>';
 }else{
	echo '<input type="radio" name="inactivarCV" value="false"><span class="label">Si</span>';
	//Los valores estan invertidos pq en la bd es recibir_oferta
	echo '<input type="radio" name="inactivarCV" value="true" checked><span class="label">No</span>';
 
 }
?>
</td></tr> 
<tr>
	<td align="center" colspan="2"></br>
		<input class="boton" type="submit" value="Siguiente"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<!--<input class="boton" type="reset" value="Limpiar"/>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input class="boton" type="button" value="Salir" onclick="javascript:window.location='../'"/>
	</td>
</tr>
</table>
<?php
 if(!isset($_SESSION['idUsr'])){ 
		echo "<script>ocultarFila(7, true);ocultarFila(8, true);ocultarFila(9, true);ocultarFila(10, false);</script>";
	 }else{
		echo "<script>ocultarFila(7, false);ocultarFila(8, false);ocultarFila(9, false);ocultarFila(10, true);</script>";
	 }
	
?>
 </form>
</fieldset>
<br>
</body>
</html>

<script>

var pass = new LiveValidation('pass' , {onlyOnSubmit: true } );
pass.add( Validate.Length, { minimum: 6 } );


var pass2 = new LiveValidation('pass2', {onlyOnSubmit: false } );
pass2.add( Validate.Confirmation, { match: 'pass' } );
pass2.add( Validate.Length, { minimum: 6 } );

var dni = new LiveValidation('dni', {onlyOnSubmit: true } );
dni.add( Validate.Presence );
dni.add( Validate.Numericality );

var nombre = new LiveValidation('nombre', {onlyOnSubmit: true } );
nombre.add( Validate.Presence );

var apellido = new LiveValidation('apellido', {onlyOnSubmit: true } );
apellido.add( Validate.Presence );

//var telefono = new LiveValidation('telefono', {onlyOnSubmit: true } );
//telefono.add( Validate.Presence );

var celular = new LiveValidation('celular', {onlyOnSubmit: true } );
celular.add( Validate.Presence );

var mail = new LiveValidation('mail', {onlyOnSubmit: true } );
mail.add( Validate.Presence );

var domicilio = new LiveValidation('domicilio', {onlyOnSubmit: true } );
domicilio.add( Validate.Presence );

var hijos = new LiveValidation('hijos', {onlyOnSubmit: true } );
hijos.add( Validate.Presence );


</script>


