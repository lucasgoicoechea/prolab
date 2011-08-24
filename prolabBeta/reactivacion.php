<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['idUsr']) && isset($_GET['actualiza'])){
	echo "<script>window.location='index.php?op=interface';</script>";
}
?>
<script src="js/ajax.js"></script>
<script>
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


</script>

<br>
<center><span class="titulo1">Reactivar la contraseña</span></center>
<br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "./menu_cv.php";
}
?>
 <fieldset style="width: 95%; background:#F9FBFB;">
    <legend><span class="titulo2">Datos Personales</span></legend>
<style>
.label{
	text-align: right;
}
</style>
  <?php
    if(!isset($_POST['pass']) ){
    
   	 require_once "./login/DB.php";
   	 $query("select * from  usuarios_reactivaciones_password where codigo_de_activacion=".$_GET['codigo']);
   	 include("./cv/consultar.php");	
   	 $item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	  echo '<form action="./reactivacion.php" method="post" name="form1" onsubmit="return validezUsuario();">';
      echo "<table align='center' ><tr id='passHidden' >";
      echo "<tr><input type='hidden' value='".$item[dni]."' name='dni' />";
      echo "</tr><td class='label'>Password</td><td ><input id='pass' name='pass' type='password' class='caja'  value='' /></td>
	</tr> 	<tr id='passHiddenConf' > <td class='label'>Confirmacion de Password</td><td ><input id='pass2' name='pass2' type='password' class='caja'  value='' /></td>
	</tr><tr><td align='center' colspan='2'></br><input class='boton' type='submit' value='Cambiar'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td></tr></table> </form>";
    }
   else{
   	 require_once "./login/DB.php";
   	 $query("UPDATE usuarios SET clave='".md5($_POST["pass"])."' where dni=".$_POST['dni']);
   	 include("./cv/consultar.php");
				
   }

  ?>
	 </fieldset>
<br>

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
  dis= ver ? '' : 'none';
  document.getElementById('tablaPaso1').getElementsByTagName('tr')[num].style.display=dis;
}
</script>

<?php
 if(!isset($_SESSION['idUsr'])){ 
		echo "<script>ocultarFila(7, true);ocultarFila(8, true);ocultarFila(9, true);ocultarFila(10, false);</script>";
		echo '<script>autentica(document.getElementById("dni").value);</script>';
	 }else{
		echo "<script>ocultarFila(7, false);ocultarFila(8, false);ocultarFila(9, false);ocultarFila(10, true);</script>";
	 }
 if(!isset($_SESSION['idUsr'])){ 
		echo "<script language='JavaScript' src='cv/js/validar_ciudad.js'></script>";
 }
?>



