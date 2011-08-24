<?php
	session_start();

include ("config.php");
include ("funciones.php");
/********************************************************************
Permite al Graduado llenar la encuesta de Graduado Nuevo
Recibe el usuario en la llamada a la pagina.
********************************************************************/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Graduado - Encuesta</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../estilos/encuesta.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--



function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_closeBrWindow(theURL,winName,features) { //v2.0
  window.close(theURL,winName,features);
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>

</head>

<body  leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?
//GUARDAR LA ENCUESTA
//si la forma ha sido enviada, guardamos los datos de la encuesta.
if(isset($_POST['submit'])){//1
	//nos conectamos a mysql
	$cnx = conectar ();
	$usuario = $HTTP_POST_VARS['usuario'];
	
	//armamos un array para la respuesta 2 con las opciones seleccionadas 
			$index1 = 0; //indice del arreglo
			$arResp2 = array(); //arreglo
			for ($i=1; $i<=5; $i++) {//for
				if($index1 <2){//if1
				//controla que tenga un maximo de 2 elementos
					$elem = "r2-".$i;
					if($_POST[$elem] != ''){//if2
						$arResp2[$index1] = $_POST[$elem];
						$index1++;
					}//if2
				}//if1
			}//for
			//completamos el arreglo para tener las dos respuestas
			for ($i=$index1; $i <2; $i++) {
				$arResp2[$i] = "--";
			}
			//armamos un array para la respuesta 11 con las opciones seleccionadas 
			$index2 = 0;
			$arResp11 = array();
			for ($i = 1; $i <= 4; $i++) {//for
				if($index2 <2){//if1
					$elem = "r11-".$i;
					if($_POST[$elem] != ''){//if2
						$arResp11[$index2] = $_POST[$elem];
						$index2++;
					}//if2
				}//if1
			}//for
			//completamos el arreglo para tener las dos respuestas
			for ($i=$index2; $i <2; $i++) {
				$arResp11[$i] = "--";
			}
			//volvemos a 0 los indices
			$index1=0;
			$index2=0;
			
	//obtener los datos de la encuesta correspondiente
	$sql = "SELECT id FROM encuestas WHERE condicion = 'nuevo'";
	$res = mysql_query($sql) or die (mysql_error());
	if (mysql_num_rows($res) == 0){//2
		echo "<span class='subtitulos'>No existe la encuesta correspondiente al graduado NUEVO.</span>";
		}else{//2
		//obtenemos el id de la encuesta en $idEnc
		$encuesta = mysql_fetch_array($res);
		$idEnc = $encuesta['id'];
		//verificar si ya tiene una encuesta hecha
		$sql = "SELECT  * FROM usuarios_encuestas WHERE (idEncuesta = '$idEnc') AND (usuario = '$usuario')";
		$res = mysql_query($sql) or die (mysql_error());
		if (mysql_num_rows($res) > 0){//3
		//tiene una encuesta llenada antes, ACTUALIZAR los datos
			//actualizamos la fecha de respuesta de la encuesta
			$fecha = date("d-m-Y");
			$sql = "UPDATE usuarios_encuestas SET ";
			$sql .= "fecha ='".$fecha."'";
			$sql .= " WHERE (idEncuesta = '$idEnc') AND (usuario = '$usuario')";
			$res = mysql_query($sql) or die(mysql_error());
			
			//obtenemos todas las respuestas de la encuesta respondida antes, ordenadas por orden de pregunta
			$sql2 = "SELECT p.orden,ur.id FROM usuarios_respuestas ur INNER JOIN preguntas p";
			$sql2 .= " ON (p.id = ur.idPregunta)";
			$sql2 .= " WHERE (p.idEncuesta = '$idEnc') AND (ur.usuario = '$usuario')";
			$sql2 .= " ORDER BY p.orden ASC";
			$res2 = mysql_query($sql2) or die (mysql_error());
			if (mysql_num_rows($res2) > 0){//4
			//por cada id de respuesta actualizo la respuesta de acuerdo al campo del formulario correspondiente
			while ($fila = mysql_fetch_array($res)){//5 
				$cont = $fila['orden']; //indica el numero de pregunta
				$preg = $fila['id']; //indica el id de la pregunta a responder
				if($cont == 2){//6
				//pregunta 2 con 2 respuestas
					$resp = $arResp2[$index1];
					$sql = "UPDATE usuarios_respuestas SET ";
					$sql .= "respuesta ='".$resp."'";
					$sql .= " WHERE (idPregunta = '$preg') AND (usuario = '$usuario')";
					$res = mysql_query($sql) or die(mysql_error());	
					$index1++;
				}//6
				elseif($cont == 11){//6
				//pregunta 11 con 2 respuestas
					$resp = $arResp11[$index2];
					$sql = "UPDATE usuarios_respuestas SET ";
					$sql .= "respuesta ='".$resp."'";
					$sql .= " WHERE (idPregunta = '$preg') AND (usuario = '$usuario')";
					$res = mysql_query($sql) or die(mysql_error());	
					$index2++;
				}//6
				else{//6
				//resto de las preguntas
				$elem = "r".$cont;
				$resp = $HTTP_POST_VARS[$elem];
				$sql = "UPDATE usuarios_respuestas SET ";
				$sql .= "respuesta ='".$resp."'";
				$sql .= " WHERE (idPregunta = '$preg') AND (usuario = '$usuario')";
				$res = mysql_query($sql) or die(mysql_error());
				}//6     
			}//5
			}//4
			else{
				echo "<span class='subtitulos'>No se encontraron las respuestas a la encuesta.</span>";
			}
		}else{//3
		//no tiene encuesta cargada anteriormente, INSERTAR los datos
			//insertamos la encusta en la tabla usuarios_encuestas
			$fecha = date("d-m-Y");
			$campos = "usuario,idEncuesta,fecha";
			$valores = "'".$usuario."',";
			$valores .= "'".$idEnc."',";
			$valores .= "'".$fecha."'";
			$sql = "INSERT INTO usuarios_encuestas ($campos) VALUES($valores)";
			$res = mysql_query($sql) or die(mysql_error());
			
			//obtenemos todas las preguntas de la encuesta, ordenadas por orden de pregunta
			$sql2 = "SELECT id,orden FROM preguntas ";
			$sql2 .= "WHERE (idEncuesta = '$idEnc') ";
			$sql2 .= "ORDER BY orden ASC";
			$res2 = mysql_query($sql2) or die (mysql_error());
			if (mysql_num_rows($res2) > 0){//4
			//por cada id de pregunta, insertamos la respuesta de acuerdo al campo del formulario correspondiente
			while ($fila = mysql_fetch_array($res2)){//5 
				$cont = $fila['orden']; //indica el numero de pregunta
				if($cont == 2){//6
				//pregunta 2 con 2 respuestas
					for($i=0; $i<2; $i++){//for
					$resp = $arResp2[$i];
					$campos = "usuario,idPregunta,respuesta";
					$valores = "'".$usuario."',";
					$valores .= "'".$fila['id']."',";
					$valores .= "'".$resp."'";
					$sql = "INSERT INTO usuarios_respuestas ($campos) VALUES($valores)";
					$res = mysql_query($sql) or die(mysql_error());	
					//$index1++;
					}//for
				}//6
				elseif($cont == 11){//6
				//pregunta 11 con 2 respuestas
					for($i=0; $i<2; $i++){//for
					$resp = $arResp11[$i];
					$campos = "usuario,idPregunta,respuesta";
					$valores = "'".$usuario."',";
					$valores .= "'".$fila['id']."',";
					$valores .= "'".$resp."'";
					$sql = "INSERT INTO usuarios_respuestas ($campos) VALUES($valores)";
					$res = mysql_query($sql) or die(mysql_error());	
					//$index2++;
					}//for
				}//6
				else{//6
				//resto de las preguntas
				$elem = "r".$cont;
				$resp = $HTTP_POST_VARS[$elem];
				if($resp == ''){ $resp = "--"; }
				$campos = "usuario,idPregunta,respuesta";
				$valores = "'".$usuario."',";
				$valores .= "'".$fila['id']."',";
				$valores .= "'".$resp."'";
				$sql = "INSERT INTO usuarios_respuestas ($campos) VALUES($valores)";
				$res = mysql_query($sql) or die(mysql_error());
				}//6     
			}//5
			}//4		
		}//3
		
?>
<!-- <br>
<CENTER>
<table width="60%" border="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>  <td align="center"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <B>Los datos fueron guardados correctamente</B><BR><BR>
  Estos datos ser&aacute;n de uso confidencial del Programa de 
                Vinculaci&oacute;n con el Graduado Universitario, los cuales ser&aacute;n 
                utilizados con el fin de establecer un seguimineto de nuestros 
                profesionales.<br><BR>Muchas Gracias<BR><BR>
				<B>
				Continua completando tu CV, hace click en "Ir a mi CV"
				<BR><BR></B>
  </td> </tr>  <tr>   <td align="center">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="100" height="23">
  <param name="BGCOLOR" value="">
  <param name="movie" value="miCV.swf">
  <param name="quality" value="high">
  <param name="base" value=".">
  <embed src="miCV.swf" base="."  quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="100" height="23" ></embed> 
</object>
	</td>
  </tr>
</table>
</CENTER>

<br><br> -->
<script>window.navigate("../myCV.php")</script> 

<?
	mysql_close($cnx);
 	exit;
	
	}//2
}//1

//////////////////// ENCUESTA PARA GRADUADOS NUEVOS /////////////////////

if(isset($_GET['usuario'])){//1
	$usuario = $_GET['usuario'];
	
?>
<table width="70%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr valign="top" > 
    <td > 
	<span class="titulo2"><br><BR>
		 Complet&aacute; todos los campos de la encuesta con los datos solicitados para finalizar la carga de tu CV.</span>
      <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td>
			<br>
			
            <form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" name="form1">
              <table width="70%" border="0" align="center" cellpadding="4" cellspacing="0" class="texto1">
                <tr> 
                  <td width="187">  </td>
                  <td width="197" valign="middle"> <input name="usuario" type="hidden" id="usuario" value="<? echo $usuario; ?>" maxlength="8"> 
                    <font color="#FF0000">&nbsp;</font></td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46">
				  <span class="subtitulo">1.- &iquest;Est&aacute;s en alguna c&aacute;tedra como ayudante?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r1" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r1" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">2.- 
                    &iquest;Qu&eacute; ten&eacute;s en cuenta a la hora de realizar 
                    curso / posgrado / seminario / maestr&iacute;a?</span><br>
					(marcar solo dos que consideres m&aacute;s importante)</td>
                </tr>
				<tr>
					<td colspan="2"><table width="100%" align="center" class="textoEnc" border="0">
                      <tr>
                        <td width="50%"><input name="r2-1" id="r2-1" type="checkbox" value="Costo de los cursos">Costo de los cursos</td>
                        <td width="50%"><input name="r2-2" id="r2-2" type="checkbox" value="Prestigio del cuerpo docente">Prestigio del cuerpo docente</td>
                      </tr>
					  <tr>
                        <td><input name="r2-3" id="r2-3" type="checkbox" value="Acreditacion de los cursos">
                          Acreditaci&oacute;n de los cursos</td>
                        <td><input name="r2-4" id="r2-4" type="checkbox" value="Trayectoria de la institucion">
                          Trayectoria de la instituci&oacute;n</td>
                      </tr>
					  <tr>
                        <td><input name="r2-5" id="r2-5" type="checkbox" value="Capacitacion para la salida laboral y profesional">
                          Capacitaci&oacute;n para la salida laboral y profesional</td>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">3.- 
                    &iquest;Conseguiste trabajo antes de graduarte?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r3" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r3" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">4.- 
                    &iquest;Est&aacute;s trabajando actualmente?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="500" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r4" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r4" value="no" checked>
                          no (pase a la preg. 11)</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">5.- 
                    &iquest;En algo relacionado a tu profesi&oacute;n?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r5" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r5" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">6.- 
                    &iquest;C&oacute;mo lo haces?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r6" value="En forma remunerada">
                          En forma remunerada</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r6" value="No remunerada (ad-honorem)" checked>
                          No remunerada (ad-honorem)</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">7.- 
                    &iquest;De qu&eacute; forma est&aacute; trabajando?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r7" value="En relacion de dependencia">
                          En relaci&oacute;n de dependencia</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r7" value="En forma independiente" checked>
                          En forma independiente</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">8.- 
                    En caso de trabajar en relaci&oacute;n de dependencia, &iquest;en 
                    qu&eacute; sector?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r8" value="Publico">
                          P&uacute;blico</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r8" value="Privado" checked>
                          Privado</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">9.- 
                    &iquest;Aproximadamente en cu&aacute;nto oscilan sus ingresos?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r9" value="menos de $200" checked>
                          menos de $200</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r9" value="entre $200 y $500">
                          entre $200 y $500</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r9" value="entre $500 y $1000">
                          entre $500 y $1000</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r9" value="mas de $1000">
                          m&aacute;s de $1000</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">10.- 
                    &iquest;Cu&aacute;ntas horas trabajas por dia?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r10" value="menos de 4 hs" checked>
                          menos de 4 hs</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r10" value="4 hs">
                          4 hs</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r10" value="6 hs">
                          6 hs</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r10" value="8 hs">
                          8 hs</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r10" value="mas de 8 hs">
                          m&aacute;s de 8 hs</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">11.- 
                    &iquest;Habitualmente cu&aacute;l es la forma en que buscaste 
                    o buscas empleo?</span><br>
                    (marcar no m&aacute;s de dos)</td>
                </tr>
				<tr>
					<td colspan="2" valign="top"><table width="100%" align="center" class="textoEnc" border="0">
                      <tr>
                        <td width="50%"><input name="r11-1" id="r11-1" type="checkbox" value="Clasificados en el diario">Clasificados en el diario</td>
                        <td width="50%"><input name="r11-2" id="r11-2" type="checkbox" value="Ofertas a traves de paginas web">Ofertas a trav&eacute;s de p&aacute;ginas web</td>
                      </tr>
					  <tr>
                        <td><input name="r11-3" id="r11-3" type="checkbox" value="Publicaciones en la facultad">Publicaciones en la facultad</td>
                        <td><input name="r11-4" id="r11-4" type="checkbox" value="Por recomendacion de conocidos">Por recomendaci&oacute;n de conocidos</td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">12.- 
                    &iquest;Sab&eacute;s cu&aacute;les son los requisitos para 
                    matricularse en los colegios profesionales?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r12" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r12" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">13.- 
                    &iquest;Sab&eacute;s c&oacute;mo se realizan tus aportes jubilatorios?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r13" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r13" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">14.- 
                    Si aport&aacute;s, &iquest;en qu&eacute; sistema lo hac&eacute;s?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r14" value="Caja privada" checked>
                          Caja privada</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r14" value="Autonomo">
                          Aut&oacute;nomo</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r14" value="Monotributo">
                          Monotributo</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r14" value="Como empleado">
                          Como empleado</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r14" value="Ninguno">
                          Ninguno</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">15.- 
                    &iquest;Posees cobertura de salud?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r15" value="si">

                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r15" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">16.- 
                    En caso de que s&iacute;, &iquest;c&oacute;mo la adquir&iacute;s?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r16" value="Por tu empleador" checked>
                          Por tu empleador</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r16" value="En forma particular">
                          En forma particular</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r16" value="Por grupo familiar">
                          Por grupo familiar</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">17.- 
                    &iquest;Con qui&eacute;n viv&iacute;s?</span></td>
                </tr>
				<tr>
					<td colspan="2" valign="top">
					<table border="0" width="100%" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r17" value="Solo" checked>
                          Solo</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r17" value="Con tus padres">
                          Con tus padres</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r17" value="Concubinato">
                          Concubinato</label></td>
                      </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r17" value="Matrimonio">
                          Matrimonio</label></td>
                      </tr>
                    </table>
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">18.- 
                    &iquest;Est&aacute;s casado/a?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r18" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r18" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">19.- 
                    &iquest;Ten&eacute;s hijos?</span></td>
                </tr>
				<tr>
					<td colspan="2"><table border="0" width="200" align="left" class="textoEnc">
                      <tr>
                        <td><label>
                          <input type="radio" name="r19" value="si">
                          si</label></td>
					  </tr>
					  <tr>
                        <td><label>
                          <input type="radio" name="r19" value="no" checked>
                          no</label></td>
                      </tr>
                    </table></td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">20.- 
                    &iquest;Cu&aacute;ntos?</span></td>
                </tr>
				<tr>
					<td colspan="2">
					<input name="r20" type="text" size="10" maxlength="3" value="0">
					</td>
                </tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>	
                  <td colspan="2" bgcolor="#466A46"> <span class="subtitulo">21.- 
                    Datos del Padre / Madre / Tutor</span></td>
                </tr>
				<tr>
					<td colspan="2">
					<span class="subtitulo">PADRE</span>
					</td>
                </tr>
				<tr>
					<td colspan="2">
						<table align="center" width="100%" border="0" cellspacing="3" class="textoEnc">
						  <tr>
							<td align="right">Nivel de estudio</td>
							<td>
							<select name="r21" id="r21">
								<option value="primario incompleto" selected>primario incompleto</option>
								<option value="primario completo">primario completo</option>
								<option value="secundario incompleto">secundario incompleto</option>
								<option value="secundario completo">secundario completo</option>
								<option value="universitario incompleto">universitario incompleto</option>	
								<option value="universitario completo">universitario completo</option>					
							</select>
							</td>
						  </tr>
						  <tr>
							<td align="right">T&iacute;tulo</td>
							<td><input name="r22" type="text" size="50" maxlength="100" value="--"></td>
						  </tr>
						  <tr>
							<td align="right">¿Trabaja?</td>
							<td valign="middle">
							<table border="0" width="150" align="left" class="textoEnc">
							  <tr>
								<td><label>
								  <input type="radio" name="r23" value="si">
		
								  si</label></td>
							  	<td><label>
								  <input type="radio" name="r23" value="no" checked>
								  no</label></td>
							  </tr>
							</table>
							</td>
						  </tr>
						  <tr>
							
                        <td align="right">&iquest;De qu&eacute; trabaja? (Profesi&oacute;n)</td>
							<td><input name="r24" type="text" size="50" maxlength="100" value="--"></td>
						  </tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>
					
                  <td colspan="2"> <span class="subtitulo">MADRE</span> </td>
                </tr>
				<tr>
					<td colspan="2">
						<table align="center" width="100%" border="0" cellspacing="3" class="textoEnc">
						  <tr>
							<td align="right">Nivel de estudio</td>
							<td>
							<select name="r25" id="r25">
								<option value="primario incompleto" selected>primario incompleto</option>
								<option value="primario completo">primario completo</option>
								<option value="secundario incompleto">secundario incompleto</option>
								<option value="secundario completo">secundario completo</option>
								<option value="universitario incompleto">universitario incompleto</option>	
								<option value="universitario completo">universitario completo</option>					
							</select>
							</td>
						  </tr>
						  <tr>
							<td align="right">T&iacute;tulo</td>
							<td><input name="r26" type="text" size="50" maxlength="100" value="--"></td>
						  </tr>
						  <tr>
							<td align="right">¿Trabaja?</td>
							<td valign="middle">
							<table border="0" width="150" align="left" class="textoEnc">
							  <tr>
								<td><label>
								  <input type="radio" name="r27" value="si">
		
								  si</label></td>
							  	<td><label>
								  <input type="radio" name="r27" value="no" checked>
								  no</label></td>
							  </tr>
							</table>
							</td>
						  </tr>
						  <tr>
							
                        <td align="right">&iquest;De qu&eacute; trabaja? (Profesi&oacute;n)</td>
							<td><input name="r28" type="text" size="50" maxlength="100" value="--"></td>
						  </tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
				<tr>
					
                  <td colspan="2"> <span class="subtitulo">TUTOR</span></td>
                </tr>
				<tr>
					<td colspan="2">
						<table align="center" width="100%" border="0" cellspacing="3" class="textoEnc">
						  <tr>
							<td align="right">Nivel de estudio</td>
							<td>
							<select name="r29" id="r29">
								<option value="primario incompleto" selected>primario incompleto</option>
								<option value="primario completo">primario completo</option>
								<option value="secundario incompleto">secundario incompleto</option>
								<option value="secundario completo">secundario completo</option>
								<option value="universitario incompleto">universitario incompleto</option>	
								<option value="universitario completo">universitario completo</option>					
							</select>
							</td>
						  </tr>
						  <tr>
							<td align="right">T&iacute;tulo</td>
							<td><input name="r30" type="text" size="50" maxlength="100" value="--"></td>
						  </tr>
						  <tr>
							<td align="right">¿Trabaja?</td>
							<td valign="middle">
							<table border="0" width="150" align="left" class="textoEnc">
							  <tr>
								<td><label>
								  <input type="radio" name="r31" value="si">
		
								  si</label></td>
							  	<td><label>
								  <input type="radio" name="r31" value="no" checked>
								  no</label></td>
							  </tr>
							</table>
							</td>
						  </tr>
						  <tr>
							
                        <td align="right">&iquest;De qu&eacute; trabaja? (Profesi&oacute;n)</td>
							<td><input name="r32" type="text" size="50" maxlength="100" value="--"></td>
						  </tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
                </tr>
                <tr> 
                  <td colspan="2"><div align="center"> 
                      <input type="submit" name="submit" value="Finalizar" class="titulo2">
                    </div></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?
	}else{
		echo "<span class='texto1a'>Ingres&oacute; mal a la p&aacute;gina.</span>";
	}
?>
</body>
</html>