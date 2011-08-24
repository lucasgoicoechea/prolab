<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['idUsr']) && isset($_GET['actualiza'])){
	echo "<script>window.location='index.php?op=interface';</script>";
}
?>

<script src="js/ajax.js"></script>
<script src="cv/js/combos_ciudad.js"></script>

<script>
function actualizador(unSelect){
	unSelect.onclick;
}


function esBisiesto(year) { 
    return (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) ? true : false; 
} 

function limpiaSelect(elSelect) { 
    while( elSelect.hasChildNodes() )
        elSelect.removeChild( elSelect.firstChild ); 
} 

function aniadeOpcion(elSelect, texto, valor) { 
    var laOpcion=document.createElement("OPTION"); 
    laOpcion.appendChild( document.createTextNode(texto) ); 
    laOpcion.setAttribute("value",valor); 
    elSelect.appendChild(laOpcion); 
}


function rellenar_anio(elSelect) {
    for(var a=2010;a>=1900;a--)
        aniadeOpcion(elSelect, a.toString(), a.toString() );
}

var meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
function rellenar_mes(elSelect) {
    for(var a=0;a<meses.length;a++)
        aniadeOpcion(elSelect, meses[a], a );
}

function rellenar_dia(elSelect, anio, mes, valorActualizado) {
    var ultimo_dia;
    // febrero
    if(mes==1)
        ultimo_dia=esBisiesto(anio)?29:28;
    // acaban en 31
    else if( mes==0 || mes==2 ||  mes==4 || mes==6 || mes==7 || mes==9 || mes==11)
        ultimo_dia=31;
    else
        ultimo_dia=30;
    for(var a=1; a<=ultimo_dia; a++) {
        aniadeOpcion(elSelect, a, a);
    }
	if((valorActualizado.length > 0) && (valorActualizado <= ultimo_dia)) {elSelect.value = valorActualizado;}
    cargarFechaHidden();
}


function chequearTodas(formulario) {
 if(formulario.todas.checked)
   {
   formulario.discapaci1.checked = true;
   formulario.discapaci2.checked = true;
   formulario.discapaci3.checked = true;
   formulario.discapaci4.checked = true;
   formulario.discapaci5.checked = true;
   formulario.discapaci6.checked = true;
   }

}

function mostrarOcultarPass(checkbox) {
    passID = document.getElementById("passHidden");
    passConfID = document.getElementById("passHiddenConf");
	if(checkbox.checked){	
        passID.style.display = "";
        passConfID.style.display = "";
}
    else {                
		   passID.style.display ='none';
		   passConfID.style.display ='none';
		 }
}

function mostrarOcultarDiscapacidad(form,valor) {
        divID = document.getElementById("discapacidadesHidden");
		if(valor==false){                
    		   form.todas.checked = false;   
			   form.discapaci1.checked = false;
			   form.discapaci2.checked = false;
			   form.discapaci3.checked = false;
			   form.discapaci4.checked = false;
			   form.discapaci5.checked = false;
			   form.discapaci6.checked = false;
			   divID.style.display ='none';	
   }
        else {
                divID.style.display = "";
			   form.todas.checked = false;   
			   form.discapaci1.checked = false;
			   form.discapaci2.checked = false;
			   form.discapaci3.checked = false;
			   form.discapaci4.checked = false;
			   form.discapaci5.checked = false;
			   form.discapaci6.checked = false;}
}

</script>
<script>

function autentica(){ 
	usuario = document.getElementById("dni").value;
	url = "cv/existe_usuario.php?usuario=" + usuario;
	leer_doc(url, procesarRespuesta);
}

function validarFechaJS(fecha){ 
	//llamo a la funcion de lib.js
	var ok = validarFecha(fecha);
	//alert(ok);
	if (!ok){
		document.getElementById("errorFecha").style.visibility = "visible";
	}else{
		document.getElementById("errorFecha").style.visibility = "hidden";
	}
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
	return document.getElementById("error").style.visibility == "hidden" && document.getElementById("errorFecha").style.visibility == "hidden";
}

function cargarFechaHidden() {
	var anio=document.getElementById("anio");
	var mes=document.getElementById("mes");
	var dia=document.getElementById("dia");
	diaTxt = dia.value;
	mesTxt = parseInt(mes.value)+1;
	anioTxt = anio.value;
	if(diaTxt.length<2) { diaTxt = "0"+diaTxt;}
	if(mesTxt<10) { mesTxt = "0"+mesTxt.toString(10);}
	document.getElementById("fecha_nac").value = diaTxt+'-'+mesTxt+'-'+anioTxt;
	//document.getElementById("fecha_nac") = "11-09-1982";
}

function cargarFechaDesdeHidden(unaCadena) {
	var dia=document.getElementById("dia");
	var anio=document.getElementById("anio");
	var mes=document.getElementById("mes");
	if(unaCadena.length<2) {rellenar_dia(dia,2010,0,1);}
	else {
	var diaMesAnio = unaCadena.split('-');
	anio.value = diaMesAnio[2];
	mes.selectedIndex = diaMesAnio[1]-1;
	rellenar_dia(dia, anio.options[anio.options.selectedIndex].value, mes.options[mes.options.selectedIndex].value,diaMesAnio[0]);
	//dia.value = diaMesAnio[0];
	cargarFechaHidden();
	}
}
</script>  

<br>
<center><span class="titulo1">Carga de CV: Paso 1</span></center>
<br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "cv/menu_cv.php";
}
?>
 <fieldset style="width: 95%; background:#F9FBFB;">
    <legend><span class="titulo2">Datos Personales</span></legend>
    <span class="texto1" style="position:relative;"><font color="#FF0033">* Campo obligatorio</font></span>
<style>
.label{
	text-align: right;
}
</style>
  <?php 
    if(isset($_SESSION['idUsr'])){
	  echo '<form action="cv/updateCV_paso1.php" method="post" name="form1" onsubmit="return validezUsuario();">';
	}else{
	  echo '<form action="cv/insertCV_paso1.php" method="post" name="form1" onsubmit="return validezUsuario();">';
	}
   
  //require_once "../includes/conexion.php";
  if( isset($_SESSION['idUsr']) ){
	$queryCity ="SELECT id_ciudad as city from usuarios  where id=".$_SESSION['idUsr'];
    $qUserCity =  $conexionDB->query($queryCity);
    $row_userCity = $qUserCity -> fetchRow(DB_FETCHMODE_ASSOC);  
    if($row_userCity['city']>0){
    $queryGral= "SELECT u.*,u.id_ciudad as city, cl.c_id as id_ciudad, cpa.c_id as id_partido, cpr.c_id as id_provincia, cl.d_descripcion as ciudad FROM usuarios u ";
    $queryGral.= " inner join com_localidad cl on (cl.c_id = u.id_ciudad) ";
    $queryGral.= "inner join com_partido cpa on (cpa.c_id=cl.c_id_partido) ";
    $queryGral.= "inner join com_provincia cpr on (cpr.c_id = cpa.c_id_provincia)  where id=".$_SESSION['idUsr']; 
	$qUser =  $conexionDB->query($queryGral);  
    }
    else{
	$qUser =  $conexionDB->query("SELECT u.*,u.id_ciudad as city from usuarios u where u.id=".$_SESSION['idUsr']);
    }
    	
	$row_user = $qUser -> fetchRow(DB_FETCHMODE_ASSOC);	
	if(!$row_user){
		//usuario con datosd e cv viejos
		//$query ="SELECT * FROM usuarios u where id=".$_SESSION['idUsr'];
		//include("consultar.php");	
		$qUser =  $conexionDB->query("SELECT * FROM usuarios u where id=".$_SESSION['idUsr']);
		$row_user = $qUser -> fetchRow(DB_FETCHMODE_ASSOC);	
	}
    $timestamp = dateToTimestamp($row_user['fecha_nacimiento']);
	$fechaFormat=gmdate( "d-m-Y", $timestamp);
  }
  

  ?>
  <div id="tablaPaso1" >
  <table  width="100%" id="tablaPaso1">
	<tr><td width='25%' class='label'><font color="#FF0033">*</font>Apellido</td><td><input id='apellido' name='apellido' type='text' class='caja' size='35' value="<?=$row_user['apellido']?>" /></td></tr>
	<tr><td class='label'><font color="#FF0033">*</font>Nombre</td><td><input id='nombre' name='nombre' type='text' class='caja' size='35' value="<?=$row_user['nombre']?>"/></td></tr>
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
		print "<tr><td class='label'><font color='#FF0033'>*</font>DNI</td><td><input id='dni' name='dni' type='text' class='caja' size='18' onkeyup='return autentica(this.value);'/>&nbsp;";
	 }else { //En el caso q sea un update lo deshabilito, ya q no se puede cambiar un usuario
		print "<tr><td class='label'><font color='#FF0033'>*</font>DNI</td><td><input id='dni' name='dni' type='text' class='caja' size='18' readonly='true' value='".$row_user['dni']."' style='background: #DBDBDB;'/>&nbsp;";
	 }
	 if($row_user['dni']==$row_user['usuario']){
		 echo "<span class='texto1' style='position:relative;'><font color='#FF0033'>**Su Nro. de DNI es su Usuario</font><span>";
	 }
	 ?>
	 
	<span id="error" style="color: #FF0033;background-color:#FFFF99; margin-top:-6px;margin-left:-144px; position:absolute;visibility:hidden;">Este usuario ya existe!!!</span>
	</td></tr>
	<tr>
	<td>
	<!--<input type="checkbox" name="changePass" onClick="mostrarOcultarPass(this)" >
	<span class="label_left" >Tilde aqui para modificar la contraseña</span>
	</td>		
    </tr>
	<tr id="passHidden" style="display: none;">
		<td class='label'>Password</td><td ><input id='pass' name='pass' type='password' class='caja'  value="" /></td>
	</tr>
	<tr id="passHiddenConf" style="display: none;">
		<td class='label'>Confirmacion de Password</td><td ><input id='pass2' name='pass2' type='password' class='caja'  value="" /></td>
	</tr>-->
	<tr id="passHidden" style="display: block;">
		<td class='label'><font color="#FF0033">*</font>Password</td><td ><input id='pass' name='pass' type='password' class='caja'  value="" /></td>
	</tr>
	<tr id="passHiddenConf" style="display: block;">
		<td class='label'><font color="#FF0033">*</font>Confirmacion de Password</td><td ><input id='pass2' name='pass2' type='password' class='caja'  value="" /></td>
	</tr>
	<tr>
		<td class='label'>Fecha de Nacimiento</td>
		<td>
                 <select id="anio" onchange="actualizar()"></select>
<select id="mes" onchange="actualizar()"></select>
<select id="dia" onchange="cargarFechaHidden()"></select> 
<input id='fecha_nac' name='fecha_nac' type='hidden' class='caja' size='12' value="<?=$fechaFormat?>" onblur="validarFechaJS(this.value)"/>			
			<!-- <a href="javascript:show_calendar('form1.fecha_nac',null,'','DD-MM-YYYY');" onMouseOver="window.status='Date Picker';return true;" onMouseOut="window.status='';return true;">			
					<img src="img/b_calendario.gif" width=24 height=22 border=0 alt="calendario">
			</a>
			<span class="texto1"><font color="#FF0033">**Formato dd-mm-YYYY<br>(EJEMPLO: 2 de Enero de 1982, se ingresa: 02-01-1982)</font><span>
			<span id="errorFecha" style="margin-top:-6px;margin-left:-104px; color: #FF0033;background-color:#FFFF99; position:absolute;visibility:hidden;">La Fecha es invalida!!!</span> -->
		</td>
	</tr>	

	<tr><td class='label'>Provincia</td><td>
		<select class="opcion" name="pais" id="pais">
		<option value="0">-- Seleccione --</option>
		<?php
		$qProvincia =  $conexionDB->query("SELECT * FROM com_provincia");
		while($row = $qProvincia->fetchRow(DB_FETCHMODE_ASSOC)){	
				if(isset($_SESSION['idUsr']) && ($row_userCity['city']>0) && $row_user['id_provincia']==$row["c_id"]){
					print "<option value='".$row["c_id"]."' selected>".$row["d_descripcion"]."</option>";
				}else{
					print "<option value='".$row["c_id"]."'>".$row["d_descripcion"]."</option>";
				}			 
			}
		 
		?>
		</select>

		</td></tr>
	 <tr><td class='label'>Partido</td><td>
		<select class="opcion" id="estado" name="estado" >
        <option value="0" >-- Seleccione --</option>
		<?php
		$sqlPartido = "SELECT * FROM com_partido where c_id_provincia=".$row_user['id_provincia']."";	
//echo $sqlPartido;
		if(isset($_SESSION['idUsr'])) {
			if($row_userCity['city']>0){	
		$qcom_partido =  $conexionDB->query($sqlPartido);
		while($rowcom_partido = $qcom_partido->fetchRow(DB_FETCHMODE_ASSOC)){	
		if(isset($_SESSION['idUsr']) && $row_user['id_partido']==$rowcom_partido["c_id"]){
					print "<option value='".$rowcom_partido["c_id"]."' selected>".$rowcom_partido["d_descripcion"]."</option>";
			}else{
					print "<option value='".$rowcom_partido["c_id"]."'>".$rowcom_partido["d_descripcion"]."</option>";
				}			 
			}
			}
		}	//echo "<a href='javascript:ocultarFila(7, false);ocultarFila(8, false);ocultarFila(9, false);ocultarFila(10, true);'>Ocultar</a>";
		?>
		</select>
		</td></tr> 
		<tr><td class='label'><font color="#FF0033">*</font>Ciudad</td><td> 
		<select class="opcion" id="ciudad" name="ciudad">
			<option value="0" selected="selected">-- Seleccione --</option>
	<?php
	    if(isset($_SESSION['idUsr'])) {
	    if($row_userCity['city']>0){
        $qcom_ciudad =  $conexionDB->query("SELECT * FROM com_localidad where c_id_partido=".$row_user['id_partido']."");
		while($rowcom_ciudad = $qcom_ciudad->fetchRow(DB_FETCHMODE_ASSOC)){	
				if(isset($_SESSION['idUsr']) && $row_user['id_ciudad']==$rowcom_ciudad["c_id"]){
					print "<option value='".$rowcom_ciudad["c_id"]."' selected>".$rowcom_ciudad["d_descripcion"]."</option>";
				}else{
					print "<option value='".$rowcom_ciudad["c_id"]."'>".$rowcom_ciudad["d_descripcion"]."</option>";
				}			 
			}
	    	}
	    }
	//echo "<a href='javascript:ocultarFila(7, false);ocultarFila(8, false);ocultarFila(9, false);ocultarFila(10, true);'>Ocultar</a>";
		?>
		</select>
		</td></tr>
		<tr><td class='label'>Domicilio</td><td ><input id='domicilio' name='domicilio' size="40" type='text' class='caja'  value="<?=$row_user['domicilio']?>" /></td></tr>
		<tr><td class='label'>Cod. Postal</td><td ><input id='cp' name='cp' size="4" type='text' class='caja'  value="<?=$row_user['cp']?>" /></td></tr>
		<tr><td class='label'>Telefono</td><td ><input id='telefono' name='telefono' size="20" type='text' class='caja'  value="<?=$row_user['telefono']?>" /></td></tr>
		<tr><td class='label'>Celular</td><td ><input id='celular' name='celular' size="20" type='text' class='caja' value="<?=$row_user['celular']?>" /></td></tr>
		<tr><td class='label'>E-Mail</td><td ><input id='mail' name='mail' size="35" type='text' class='caja' value="<?=$row_user['email']?>"></td></tr>	
	<tr><td class='label'>Estado Civil</td><td>
	<select class="opcion" id='estado_civil' name='estado_civil'>
	<?php
	//$query ="SELECT * FROM estadocivil";
	//include("consultar.php");	
		$qECivil =  $conexionDB->query("SELECT * FROM estadocivil");
							
			while ($row = $qECivil -> fetchRow(DB_FETCHMODE_ASSOC)){
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
<tr><td class='label'>&#65533;Desea inactivar moment&aacute;neamente su CV?</td>
<td>
<?if(isset($_SESSION['idUsr']) && $row_user['recibir_oferta']==false){			
	echo '<input type="radio" name="inactivarCV" value="false" checked><span class="label_left">Si</span>';
	//Los valores estan invertidos pq en la bd es recibir_oferta
	echo '<input type="radio" name="inactivarCV" value="true"><span class="label_left">No</span>';
 }else{
	echo '<input type="radio" name="inactivarCV" value="false"><span class="label_left">Si</span>';
	//Los valores estan invertidos pq en la bd es recibir_oferta
	echo '<input type="radio" name="inactivarCV" value="true" checked><span class="label_left">No</span>';
 
 }
?>
</td></tr> 
<tr><td class='label'>Â¿Posee certificado de Discapacidad?</td>
<td>
<?if(isset($_SESSION['idUsr']) && $row_user['discapacidad']==true){			
	echo '<input type="radio" name="discapacidad" value="true" onclick="mostrarOcultarDiscapacidad(this.form,true);" checked><span class="label_left">Si</span>';
	echo '<input type="radio" name="discapacidad" value="false" onclick="mostrarOcultarDiscapacidad(this.form,false);" ><span class="label_left">No</span>';
 }else{
	echo '<input type="radio" name="discapacidad" value="true" onclick="mostrarOcultarDiscapacidad(this.form,true);"><span class="label_left">Si</span>';
        echo '<input type="radio" name="discapacidad" value="false" onclick="mostrarOcultarDiscapacidad(this.form,false);" checked><span class="label_left">No</span>';		
 }
 if($row_user['discapacidad']==true){ echo '<div id="discapacidadesHidden" >'; }
 else{ echo '<div id="discapacidadesHidden" style="display: none;">'; }
 $qDiscapacidades =  $conexionDB->query("SELECT * FROM discapacidades");					
			while ($rowDisc = $qDiscapacidades -> fetchRow(DB_FETCHMODE_ASSOC)){
			if(isset($_SESSION['idUsr'])) {
			$qUserDiscapacidad =  $conexionDB->query("SELECT * FROM usuarios_discapacidades WHERE id_usuario='".$_SESSION['idUsr']."' and codigo_discapacidad='".$rowDisc[codigo_discapacidad]."'");	
			$rowDiscapacidad = $qUserDiscapacidad -> fetchRow(DB_FETCHMODE_ASSOC);
				if(!$rowDiscapacidad || ($row_user['discapacidad']==false)){ echo '<input type="checkbox" name="discapaci'.$rowDisc[codigo_discapacidad].'" onClick="chequearTodas(this.form)"><span class="label_left">'.$rowDisc[descripcion].'</span>';}
				else {
				  echo '<input type="checkbox" name="discapaci'.$rowDisc[codigo_discapacidad].'" onClick="chequearTodas(this.form)" checked><span class="label_left">'.$rowDisc[descripcion].'</span>';
				  	}
				}
			else{				
			  echo '<input type="checkbox" name="discapaci'.$rowDisc[codigo_discapacidad].'" onClick="chequearTodas(this.form)"><span class="label_left">'.$rowDisc[descripcion].'</span>';			  	
			}
			echo '</br>';
			}
	 echo '<input type="checkbox" name="todas" onClick="chequearTodas(this.form)"><span class="label_left">Todas</span>';
	echo '</div>';			  		
?>
</td></tr> 
<tr>
	<td align="center" colspan="2"></br>
		<input class="boton" type="submit" value="Siguiente"/>	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
		<!--<input class="boton" type="reset" value="Limpiar"/>-->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
		<input class="boton" type="button" value="Volver" onclick="javascript:window.location='index.php'"/>
	</td>
</tr>
</table>
 </form>
</fieldset>
<br>


<script>
//alert("aca llegue");


var ciudad = new LiveValidation('ciudad', {onlyOnSubmit: true } );
ciudad.add( Validate.Numericality , { tooLowMessage: "Debe elegir ciudad" , minimum: 1 } );

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

var fecha_nac = new LiveValidation('fecha_nac', {onlyOnSubmit: true } );
fecha_nac.add( Validate.Presence );

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


function ocultarFila(num,ver) {
   //dis= ver ? '' : 'none';
  dis = '';
  document.getElementById('tablaPaso1').getElementsByTagName('tr')[num].style.display=dis;
}
</script>
<script>

var fechaCadena=document.getElementById("fecha_nac");
var anio=document.getElementById("anio");
var mes=document.getElementById("mes");
var dia=document.getElementById("dia");

rellenar_anio(anio);
rellenar_mes(mes);
cargarFechaDesdeHidden("<?php echo $fechaFormat;?>");
//cargarFechaDesdeHidden("11-09-1982");


function actualizar() {
    var valorActual = dia.value;
    limpiaSelect(dia);
    rellenar_dia(dia, anio.options[anio.options.selectedIndex].value, mes.options[mes.options.selectedIndex].value,valorActual);
    
}

function cargarFechaHidden() {
var anio=document.getElementById("anio");
var mes=document.getElementById("mes");
var dia=document.getElementById("dia");
diaTxt = dia.value;
mesTxt = parseInt(mes.value)+1;
anioTxt = anio.value;
if(diaTxt.length<2) { diaTxt = "0"+diaTxt;}
if(mesTxt<10) { mesTxt = "0"+mesTxt.toString(10);}
document.getElementById("fecha_nac").value = diaTxt+'-'+mesTxt+'-'+anioTxt;
//document.getElementById("fecha_nac") = "11-09-1982";
}

function cargarFechaDesdeHidden(unaCadena) {
var dia=document.getElementById("dia");
var anio=document.getElementById("anio");
var mes=document.getElementById("mes");
if(unaCadena.length<2) {rellenar_dia(dia,2010,0,1);}
else {
var diaMesAnio = unaCadena.split('-');
anio.value = diaMesAnio[2];
mes.selectedIndex = diaMesAnio[1]-1;
rellenar_dia(dia, anio.options[anio.options.selectedIndex].value, mes.options[mes.options.selectedIndex].value,diaMesAnio[0]);
//dia.value = diaMesAnio[0];
cargarFechaHidden();
}
}

</script>  

<?php
 if(!isset($_SESSION['idUsr'])){ 
		//echo "<script>ocultarFila(7, true);ocultarFila(8, true);ocultarFila(9, true);ocultarFila(10, false);</script>";
		echo '<script>autentica(document.getElementById("dni").value);</script>';
	 }else{
		//echo "<script>ocultarFila(7, false);ocultarFila(8, false);ocultarFila(9, false);ocultarFila(10, true);</script>";
	 }
 if(!isset($_SESSION['idUsr'])){ 
		//echo "<script language='JavaScript' src='cv/js/validar_ciudad.js'></script>";
 }
?>


