<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/livevalidation.js"></script>

<?php
include ("includes/config.php");
include ("includes/funciones.php");

//si la forma ha sido enviada editamos el registro.
if(isset($_POST['submit'])){

$usuario = $_POST['usuario'];
	//buscar si el usuario existe
	$cnx = conectar ();
	$sql = "SELECT * FROM empresas WHERE usuario = '$usuario'";
	$res = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($res) > 0){
	//si existe rebotar
	echo "<br><br><br><br><br><br><br><div align='center' class='subtitulo' style='font-size: 16px;'>nombre de usuario ya existe.<br><br><a href='index.php?op=subscripcionEmpresas/nueva_empresa.php'>volver</a></div>";
}else{		
	//si no existe
		//nos conectamos a mysql
		$cnx = conectar ();
		//armamos la consulta
		$fecha = date("Y-m-d");
		$campos = "usuario,fecha_ingreso,nombre,apellido,sexo,email,telefono,puesto";
		$valores = "'".$_POST['usuario']."',";
		$valores .="'".$fecha."',";
		$valores .= "'".$_POST['nombre']."',";
		$valores .= "'".$_POST['apellido']."',";	
		$valores .= "'".$_POST['sexo']."',";
		$valores .= "'".$_POST['email']."',";
		$valores .= "'".$_POST['telefono']."',";
		$valores .= "'".$_POST['puesto']."'";
		$sql = "INSERT INTO empresas ($campos) VALUES($valores)";
		$res = mysql_query($sql) or die(mysql_error());
		mysql_close($cnx);
?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="62" border="0" cellspacing="2" cellpadding="0">
        <tr> 
          <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
          <td width="17" bgcolor="#336633">&nbsp;</td>
          <td width="20" bgcolor="#C1DCC0">&nbsp;</td>
        </tr>
      </table>
      <span class="texto1">NUEVA EMPRESA: datos del contacto &gt; <strong>datos 
      de la empresa</strong> &gt; finalizar</span><br>
      <p><span class="titulo3">Subscripci&oacute;n de empresas.<br>
        </span><span class="texto1">los campos marcados con <font color="#FF0000"><strong>(*)</strong></font> 
        son obligatorios</span><span class="titulo3"> </span> </p>
      <form action="index.php?op=subscripcionEmpresas/finalizar.php&base=E&accion=nueva" method="post" name="form1" >
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="0" class="texto1">
          <tr> 
            <td width="212" class="subtitulo">usuario:<? echo " $usuario"; ?></td>
            <td width="172"><input name="usuario" type="hidden" id="usuario" value="<? echo "$usuario"; ?>"></td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo"><u>DATOS EMPRESA</u></td>
          </tr>
          <tr> 
            <td><div align="right">razon social<br>
                <span class="texto5">(el nombre de su empresa)</span></div></td>
            <td><input name="razonsocial" type="text" id="razonsocial" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">nombre comercial<br>
                <span class="texto5">(el nombre comercial de la empresa)</span></div></td>
            <td><input name="nombrecomercial" type="text" id="nombrecomercial" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">industria<br>
                <span class="texto5">(el rubro en el que desarrolla su actividad)</span></div></td>
            <td><input name="industria" type="text" id="industria" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">pais</div></td>
            <td><input name="pais" type="text" id="pais" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">provincia</div></td>
            <td><input name="provincia" type="text" id="provincia" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">ciudad</div></td>
            <td><input name="ciudad" type="text" id="ciudad" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">calle</div></td>
            <td><input name="calle" type="text" id="calle" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">numero</div></td>
            <td><input name="numero" type="text" id="numero" value="" size="10">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">piso</div></td>
            <td><input name="piso" type="text" id="piso" value="" size="10">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">codigo postal</div></td>
            <td><input name="cp" type="text" id="cp" value="" size="10">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">cuit</div></td>
            <td><input name="cuit" type="text" id="cuit" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">responsabilidad ante el iva</div></td>
            <td> 
              <select name="iva" id="iva">
                <option value="&quot;&quot;" selected>seleccione una opci&oacute;n</option>
                <option value="cf">consumidor final</option>
                <option value="ex">exento</option>
                <option value="mon">monotributo</option>
                <option value="ri">responsable inscripto</option>
                <option value="rno">responsable no inscripto</option>
              </select>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">e-mail<br>
                <span class="texto5">(la direcci&oacute;n de corre electr&oacute;nico 
                de la empresa)</span></div></td>
            <td><input name="emaile" type="text" id="emaile" value="" size="30">
              <span class="texto1"><font color="#FF0000"></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">telefono<br>
                <span class="texto5">(c&oacute;digo pa&iacute;s + &aacute;rea) 
                (n&uacute;mero local)</span></div></td>
            <td><input name="telefonoe" type="text" id="telefonoe" value="" size="30">
              <span class="texto1"><font color="#FF0000"> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">fax<br>
                <span class="texto5">(c&oacute;digo pa&iacute;s + &aacute;rea) 
                (n&uacute;mero local)</span> </div></td>
            <td><input name="faxe" type="text" id="faxe" value="" size="30">
              <span class="texto1"><font color="#FF0000"> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">pagina web<br>
                <span class="texto5">(direcci&oacute;n de su empresa en internet)</span></div></td>
            <td><input name="web" type="text" id="web" value="" size="30">
              <span class="texto1"><font color="#FF0000"></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">descripcion<br>
                <span class="texto5">(describa cu&aacute;l es el negocio de su 
                empresa)</span></div></td>
            <td><input name="descripcion" type="text" id="descripcion" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">cantidad de empleados</div></td>
            <td><input name="empleados" type="text" id="empleados" value="" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="submit" value="enviar"></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>



<script>
var empleados = new LiveValidation('empleados');
empleados.add( Validate.Presence );
empleados.add( Validate.Numericality );

var descripcion = new LiveValidation('descripcion');
descripcion.add( Validate.Presence );

var faxe = new LiveValidation('faxe');
faxe.add( Validate.Presence );

var telefonoe = new LiveValidation('telefonoe');
telefonoe.add( Validate.Presence );

var iva = new LiveValidation('iva');
iva.add( Validate.Presence );

var cuit = new LiveValidation('cuit');
cuit.add( Validate.Presence );

var cp = new LiveValidation('cp');
cp.add( Validate.Presence );
//cp.add( Validate.Numericality );

var piso = new LiveValidation('piso');
piso.add( Validate.Presence );

var numero = new LiveValidation('numero');
numero.add( Validate.Presence );

var calle = new LiveValidation('calle');
calle.add( Validate.Presence );

var ciudad = new LiveValidation('ciudad');
ciudad.add( Validate.Presence );

var provincia = new LiveValidation('provincia');
provincia.add( Validate.Presence );

var pais = new LiveValidation('pais');
pais.add( Validate.Presence );

var industria = new LiveValidation('industria');
industria.add( Validate.Presence );

var industria = new LiveValidation('industria');
industria.add( Validate.Presence );

var nombrecomercial = new LiveValidation('nombrecomercial');
nombrecomercial.add( Validate.Presence );

var razonsocial = new LiveValidation('razonsocial');
razonsocial.add( Validate.Presence );

var emaile = new LiveValidation('emaile');
emaile.add( Validate.Email );

</script>


	<?
}
exit;
}
?>