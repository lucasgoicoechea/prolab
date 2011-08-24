<html>
<head>
<title>Subscripci&oacute;n de Empresas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
include ("../includes/config.php");
include ("../includes/funciones.php");

//si la forma ha sido enviada editamos el registro.
if(isset($_POST['submit'])){

$usuario = $_POST['usuario'];
	//buscar si el usuario existe
	$cnx = conectar ();
	$sql = "SELECT * FROM empresas WHERE usuario = '$usuario'";
	$res = mysql_query($sql) or die(mysql_error());

if (mysql_num_rows($res) > 0){
	//si existe rebotar
	echo "nombre de usuario ya existe. <a href='nueva_empresa.php'>volver</a>";
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
<link href="../estilo1.css" rel="stylesheet" type="text/css">
  <STYLE type="text/css">
  <!--
   BODY {
    scrollbar-face-color:#D8D8D8;
    scrollbar-arrow-color:#828282;
    scrollbar-highlight-color:#D8D8D8;
    scrollbar-3dlight-color:#D8D8D8;
    scrollbar-shadow-color:#D8D8D8;
    scrollbar-darkshadow-color:#D8D8D8;
    scrollbar-track-color:#8B8B8B;
   }
  -->
  </STYLE>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
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
      <form action="finalizar.php?base=E&accion=nueva" method="post" name="form1" onSubmit="MM_validateForm('razonsocial','','R','nombrecomercial','','R','industria','','R','pais','','R','provincia','','R','ciudad','','R','calle','','R','numero','','R','piso','','R','cp','','R','cuit','','R','telefonoe','','R','faxe','','R','descripcion','','R','empleados','','R');return document.MM_returnValue">
        <table width="400" border="0" align="center" cellpadding="4" cellspacing="0" class="texto1">
          <tr> 
            <td width="212">usuario:<? echo " $usuario"; ?></td>
            <td width="172"><input name="usuario" type="hidden" id="usuario" value="<? echo "$usuario"; ?>"></td>
          </tr>
          <tr bgcolor="#FF9900"> 
            <td colspan="2" class="subtitulo">DATOS EMPRESA</td>
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
</body>
	<?
}
exit;
}
?>
</html>
