<?
$documentLocation = $_SERVER['PHP_SELF'];
if ($_SERVER['QUERY_STRING']){
	$documentLocation .= "?" . $_SERVER['QUERY_STRING'];
}
?>


<script language="JavaScript">
//<!--
function checkData() {
	
	var f1 = document.forms[0];
	var wm = "Ocurrieron los siguientes errores :\n\r\n";
	var noerror = 1;
	var t1 = document.getElementById("usuario_digitado");
	
	if (t1.value == "" || t1.value == " ") {
		wm += "Digite su nombre de usuario\r\n";
		noerror = 0;
	}
	
	var t1 = document.getElementById("clave_digitada");	
	if (t1.value == "" || t1.value == " ") {
		wm += "Digite la contraseña\r\n";
		noerror = 0;
	}	
	if (noerror == 0) {	
		alert(wm);
		return false;
	}
	else return true;
	}
	//-->
	</script>
	
<link href="estilo1.css" rel="stylesheet" type="text/css">
</head>
	
	
<body  onLoad="document.form1.user.focus()">
<br><br><br>
<center>
<div class="rbroundbox" style="width : 70%; text-align: center;">
			<div class="rbtop">
				<div></div>
			</div>
			<div class="rbcontent">
				
			
					<form name="form1" action="cv/login/validar.php" method="post" onSubmit="return checkData();">
					  <?//harcodeado para la pantalla de actualiza tu cv (Buscar solucion futura)
					  if($documentLocation=="/prolabBeta/index.php?op=interface"){
						 $documentLocation="../../index.php?op=cv/nuevoCV.php";
					  }
					  ?>	
					  <input type="hidden" name="redireccion" value="<?php echo $documentLocation ?>">
					  <table width="65%" align="center" border="0" cellpadding="4" cellspacing="0" class="cuadro_resaltado">
						
						<tr class="cuadro_resaltado"> 
						  <td colspan="2"><span class="titulo3">USUARIO REGISTRADO</span><br>
							<span class="texto4">(Son quienes han ingresado su CV al sistema. Podr&aacute;n 
							ACCEDER a los detalles de las ofertas, como as&iacute; tambi&eacute;n 
							POSTULARSE a las mismas.)<i>
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
							<input type="text" name="user" id="usuario_digitado" class="caja" size="25"></td>
						</tr>
						<tr class="cuadro_resaltado"> 
						  <td class="texto1" style="font-weight:bold;" style="font-weight:bold; font-size:14;"> 
							<div align="right">contrase&ntilde;a:</div></td>
						  <td class="cuadro_resaltado"> 
							<input type="password" name="pwd" id="clave_digitada" class="caja" size="25">
						  </td>
						</tr>	
						<tr class="cuadro_resaltado"> 
						  <td colspan="2"> <div align="center">
							  <input name="Submit" type="submit" value="Entrar &gt;" class="boton">
							</div></td>
						</tr>
						<tr class="cuadro_resaltado"> 
						  <td colspan="2"> <div align="center"> <a href='index.php?op=cv/login/forgotPwd.php'>&iquest;Olvid&oacute; 
							  su contraseña?&nbsp;</a> </div></td>
						</tr>
					  </table>
					  </form>
	</div><!-- /rbcontent -->
	<div class="rbbot">
		<div></div>
	</div>
</div>
</center>
<div class="texto1" style="text-align:center; font-size: 12px;">
	Para<span class="texto1a"> registrarte en nuestra base de datos</span>, 
    hace clic <A HREF="index.php?op=cv/nuevoCV.php">aqui</A>
</div>
</body>
</html>