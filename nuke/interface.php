<?
$documentLocation = $_SERVER['PHP_SELF'];
if ($_SERVER['QUERY_STRING']){
	$documentLocation .= "?" . $_SERVER['QUERY_STRING'];
}
?>
<html><head>
<title></title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="JavaScript">
<!--
function checkData() {
	var f1 = document.forms[0];
	var wm = "Ocurrieron los siguientes errores :\n\r\n";
	var noerror = 1;
	var t1 = f1.usuario_digitado;
	if (t1.value == "" || t1.value == " ") {
		wm += "Digite su nombre de usuario\r\n";
		noerror = 0;
	}
	var t1 = f1.clave_digitada;
	if (t1.value == "" || t1.value == " ") {
		wm += "Digite la contraseña\r\n";
		noerror = 0;
	}
	if (noerror == 0) {
		alert(wm)
		return false;
	}
	else return true;
	}
	//-->
	</script>
	
<link href="estilo1.css" rel="stylesheet" type="text/css">
</head>
	
	
<body  onLoad="document.form1.usuario_digitado.focus()">

<form name="form1" action='<?php echo $documentLocation ?>' method="post" onSubmit="return checkData()">
  <table width="65%" align="center" border="0" cellpadding="4" cellspacing="0" class="cuadro_resaltado">
    <tr>
	  <td align="center" colspan="2" style="color: white; background:navy; font-weight: bold; font-family :lucida sans; width: 65%;">
		Ofertas Laborales
	  </td>
	</tr>
    <tr class="cuadro_resaltado"> 
      <td colspan="2"><span class="titulo3">USUARIO REGISTRADO</span><br>
        <span class="texto4">(Son quienes han ingresado su CV al sistema. Podr&aacute;n 
        acceder a los detalles de las ofertas, como as&iacute; tambi&eacute;n 
        postularse a las mismas.)<i>
        <?php
	// revisa si hay mensajes de error
	if ($message) {
		echo $message;
	} ?>
        </i></span></td>
    </tr>
    <tr class="cuadro_resaltado"> 
      <td width="28%" class="texto1" style="font-weight:bold; font-size:14;"> 
        <div align="right">usuario:</div></td>
      <td width="72%"> 
        <input type="text" name="usuario_digitado" class="caja" size="25"></td>
    </tr>
    <tr class="cuadro_resaltado"> 
      <td class="texto1" style="font-weight:bold;" style="font-weight:bold; font-size:14;"> 
        <div align="right">contrase&ntilde;a:</div></td>
      <td class="cuadro_resaltado"> 
        <input type="password" name="clave_digitada" class="caja" size="25">
      </td>
    </tr>	
    <tr class="cuadro_resaltado"> 
      <td colspan="2"> <div align="center">
          <input name="Submit" type="submit" value="Entrar &gt;" class="boton">
        </div></td>
    </tr>
	<tr class="cuadro_resaltado"> 
      <td colspan="2"> <div align="center"> <a href='./cv/login/forgotPwd.php' target="_blank">&iquest;Olvid&oacute; 
          su contraseña?&nbsp;</a> </div></td>
    </tr>
  </table>
  </form>
	
<!--<form name="form2" method="post" action="listado_ofertas.php">
  <table width="65%" align="center" border="0" cellspacing="0" cellpadding="4">
    <tr>
      <td class="cuadro_resaltado"><span class="titulo3">USUARIO NO REGISTRADO</span><br>
        <span class="texto4">(Son quienes no han ingresado su CV al sistema. S&oacute;lo 
        podr&aacute;n acceder al listado de ofertas.)</span></td>
    </tr>
    <tr>
      <td class="cuadro_resaltado"> <div align="center">
          <input type="submit" name="Submit2" value="Entrar &gt;" class="boton">
        </div></td>
    </tr>
  </table>
  </form>-->
<div class="texto1" style="text-align:center">
	Para<span class="texto1a"> registrarte en nuestra base de datos</span>, 
    hace clic <A HREF="./cv/index.php">aqui</A>
</div>
</body>
	</html>