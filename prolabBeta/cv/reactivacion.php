<?php
session_start();
include("../conexion.php");
if(!isset($_SESSION['idUsr']) && isset($_GET['actualiza'])){
	echo "<script>window.location='index.php?op=interface';</script>";
}
?>
<script src="js/ajax.js"></script>
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
   	 $sinResultados = true;
   	 $query = "select * from  usuarios_reactivaciones_password where codigo_de_activacion='".$_GET['codigo']."' order by id asc";
   	 $conexionDB->query($query);
    	$qPartido =  $conexionDB->query($query);
    	while($row = $qPartido->fetchRow(DB_FETCHMODE_ASSOC)){
   	            $sinResultados = false;
    			$elDni = $row['usuario_dni'];
    		}
    //echo $sinResultados;
    if($sinResultados){ echo "<h1>ESTA ACTIVACION SE ENCUENTRA DESACTUALIZADA, VUELVA A PEDIR SU ACTIVACION</h1>";}
    else{  echo '<form action="./reactivacion.php" method="post" name="form1" onsubmit="return validezUsuario();">';
      echo "<table align='center' ><tr id='passHidden' >";
      echo "<tr><input type='hidden' value='".$elDni."' name='dni' />";
      echo "</tr><td class='label'>Password</td><td ><input id='pass' name='pass' type='password' class='caja'  value='' /></td>
	</tr> 	<tr id='passHiddenConf' > <td class='label'>Confirmacion de Password</td><td ><input id='pass2' name='pass2' type='password' class='caja'  value='' /></td>
	</tr><tr><td align='center' colspan='2'></br><input class='boton' type='submit' value='Cambiar'/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td></tr></table> </form>";
    }
    }
   else{
   	 $qqUpdate = "UPDATE usuarios SET clave='".md5($_POST["pass"])."' WHERE dni='".$_POST['dni']."'";
   	 $conexionDB->query($qqUpdate);
   	 $qqDelete = "DELETE FROM usuarios_reactivaciones_password WHERE usuario_dni='".$_POST['dni']."'";
   	 $conexionDB->query($qqDelete);
	 echo ("<h1>CONTRASEÑA NUEVA YA CONFIRMADA</h1>");			
   }

  ?>
	 </fieldset>
<br>


