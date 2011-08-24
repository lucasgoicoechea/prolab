<?php



/* if (!eregi("modules.php", $PHP_SELF)){ 
  die ("You can't access this rows directly...");
} */
session_start();
if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}
$index = 1; 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__)); 
get_lang($module_name); 
include("header.php");

?>


<table align="center"  width="460px" border="0" bgcolor="white">


<tr>
	<td colspan="2" class="subtitulo" align="center" style="font-size:18px;"><hr>Las siguientes son las <font class="texto1a" style="font-size:18px;">ofertas laborales</font> publicadas hasta el d&iacute;a de la fecha.
	</td>
</tr>
<?php
		if(isset($_SESSION['idUsuario'])){ 
			echo "<tr><td style='color:#990033; font-size:12; font-weight:bold; font-family:Arial;'>Usuario:&nbsp;".$_SESSION['usuario']."</td><td align='right'>";
			echo "<a href='logout.php' style='color:#990033; font-size:11; font-weight:bold; font-family:Arial;'>Cerrar Sesión</a>";
			echo "</td></tr>";
		  }else{
		    echo "<tr><td colspan='2' align='right'></td></tr>";
		  }
?>
<tr>
<td colspan="2">


<table width="550px" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#1D3C81">
  <tr bgcolor="#E7EFF4"> 
    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=fecha'><font  color="#DD3177"> <b>Fecha</b></font></a></div></td>

    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=tipoOf'><font color="#DD3177"><b>Tipo 
    de Oferta</b></font></a></div></td>    

    <td> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=aviso'><font color="#DD3177"><b>B&uacute;squeda</b></font></a></div></td>
	
	<td colspan='2' align='center'>
	  &nbsp;
	</td>


  </tr>
  <!-- Al hacer click en el titulo de c/columna, recarga la pagina y guarda en "ord" el criterio de ordenacion -->
  
  <?php

  include ("includes/config.php");
  include ("includes/funciones.php");

//nos conectamos a mysql
$cnx = conectar();
//consulta
//Verifica el contenido de "ord"
if(empty($_GET['ord'])){
	$sql = " SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf),cant_puestos,aviso FROM empresas_ofertas WHERE publicar = 's' ORDER BY fecha DESC";
	$res = mysql_query($sql) or die (mysql_error());	
}else{
	$sql = " SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf),cant_puestos,aviso FROM empresas_ofertas WHERE publicar = 's' ORDER BY ".$_GET['ord']." DESC";
	$res = mysql_query($sql) or die (mysql_error());	
}
//Colores para distinguir una oferta de otra $c1 y $c2, si $x es par se imprime $c1 sino $c2

if (mysql_num_rows($res) > 0){
	$x='0'; 
	$c1= "#FFFFFF";  
	$c2= "#F5F5F5";
//impresion de los datos
	while (list($idO,$fecha,$tipoOf,$area,$aviso) = mysql_fetch_array($res)){
		    $x++;
			$fecha = explode("-", $fecha);
			$fecha = $fecha[2]."/".$fecha[1]."/".$fecha[0];
?>

 <tr> 
    <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$fecha"; ?></span></div>
	</td>
   <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$tipoOf"; ?></span></div>
   </td>    

  <td bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "$aviso"; ?></span></div>
  </td>  
   <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "<a href='ver_detalles.php?idO=$idO'>Ver</a> \n" ?></span></div></td>
    <td bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="texto1"><? echo "<a href='postularse.php?idO=$idO'>Postulate a ésta oferta</a> \n" ?></span></div></td>

</tr>
    <?  
	}
}else{
	echo "<tr><td colspan='3' align='center' >No se obtuvieron resultados.</td></tr>";
}
mysql_close($cnx); 
?>

</table>
</td></tr>


<tr align="center" bgcolor="white">
  <td colspan="2" class="principal"><hr>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="150" id="central" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="img/logos cv.swf" />
	<param name="quality" value="high" />
	<param name="bgcolor" value="#ffffff" />
	<embed src="img/central.swf" quality="high" bgcolor="#ffffff" width="550" height="150" name="central" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>	
  </td>
</tr>
<tr>
<td colspan="2">
<DIV>
<span>CILCO DE CONFERENCIAS:</B> 
<B>'<U>CAPACITACION&Oacute;N Y DESARROLLO EN RR.HH.'</U></B></span>

<IMG 
height=200 alt="Es posible que tu navegador no permita visualizar esta imagen." 
src="modules/Noticias_In_Home/tabsheet/img/com_org.jpg" 
width=300 align="left">
<BR>El Departamento Joven de la Uni&oacute;n 
Industrial del Gran La Plata conjuntamente con el Programa de Oportunidades 
Laborales (PROLAB) de la Universidad Nacional de La Plata organizaron un ciclo 
anual de conferencias sobre <B>“Capacitaci&oacute;n y Desarrollo en RR.HH. 
Formaci&oacute;n empresarial y profesional”.</B>
<P align=left>El primer encuentro estuvo a cargo de 
la Lic. Mar&iacute;a&nbsp;Eugenia Ctibor, quien desarroll&oacute; la 
tem&aacute;tica&nbsp;<BR><B>“Estrategias de comunicaci&oacute;n en las 
empresas”</B>, aplicando el caso pr&aacute;ctico de la empresa 
Cer&aacute;mica Ctibor. En primer lugar, explic&oacute; que para lograr el &eacute;xito en la 
comunicaci&oacute;n de una organizaci&oacute;n, deben plantearse objetivos claros y concretos, 
y alinear a la empresa en la b&uacute;squeda y cumplimiento de los mismos. <B>Resalt&oacute; 
la importancia y calidad de las conversaciones de las personas y la realizaci&oacute;n 
de reuniones operativas diarias, entre las distintas &aacute;reas</B>. De esta manera, 
se obtienen resultados sumamente positivos y el personal comienza a producir 
mejor.</P>
<P align=left>Por otro lado, la Lic. Ctibor present&oacute;, 
dentro del proceso de inducci&oacute;n y desarrollo de los recursos humanos, <B>la 
figura de un tutor que tiene como directiva, acompañar y explicar durante un 
mes, el trabajo al nuevo ingresante</B>. Asimismo, destac&oacute; la implementaci&oacute;n de 
cursos de capacitaci&oacute;n dentro de la empresa, porque generan apertura, trabajo en 
equipo y elevan el conocimiento del personal. De esta forma, se logra la 
profesionalizaci&oacute;n y se refuerza la relaci&oacute;n con la organizaci&oacute;n. </P>
<p align="center"><a href="modules.php?name=Content&pa=showpage&pid=64">Leer m&aacute;s</a></p>
</DIV>

<DIV style="MARGIN: 1ex">
<DIV>
<P align=justify><FONT face=Arial size=2><B><U>GACETILLA 2ª CHARLA CICLO SOBRE 
CAPACITACION Y DESARROLLO EN RR.H.</U></B></FONT></P>
<P align=left><A name=0.2_graphic02></A><FONT face=Arial size=2><B><U><IMG 
height=200 alt="Es posible que tu navegador no permita visualizar esta imagen." 
src="images/tabsheet/ges_des.jpg" 
width=300 align="left"></U></B></FONT></P>
<P align=left><FONT face=Arial size=2>El segundo encuentro tuvo como eje 
central la gestión del desempeño en las empresas. El encargado de desarrollar 
este tema fue el Lic. Ignacio Ignisci, Director del PROLAB y consultor de RR.HH. 
</FONT></P>
<P align=left><FONT face=Arial size=2>Durante su exposición, <B>Ignisci 
destacó la importancia del proceso de gestión del desempeño, porque es parte de 
la estrategia organizacional y se construye sobre la única ventaja competitiva y 
sustentable en el tiempo: las personas. Lo intangible de las empresas es lo 
valioso del capital humano.</B></FONT></P>
<P align=left><FONT face=Arial size=2>Por otra parte, Ignisci explicó que la 
implementación de un sistema de estas características, favorece un estilo de 
gestión donde priman los valores de compromiso y responsabilidad del trabajo en 
equipo. Asimismo, permite un conocimiento más profundo de los recursos humanos, 
detecta competencias y potenciales disponibles, para los cuadros de sucesión de 
personal y por sobre todo, potencia el espíritu de eficacia, comunicación y 
autocontrol. Además, mejora la cooperación entre las personas, desde la línea 
gerencial hasta la administrativa.</FONT></P>
<p align="center"><a href="modules.php?name=Content&pa=showpage&pid=65">Leer m&aacute;s</a></p>

</DIV></DIV><!--Fin del contenido-->
</td>
</tr>
<!--<tr>
  <td colspan="2"  align="center">
	<img src="/html/img/CADWY51R.jpg" height="110px" width="110px"> 
	<img src="/html/img/CAQFOP6R.jpg" height="110px" width="110px">
 
	<img src="/html/img/CAMNSHA3.jpg" height="110px" width="110px"> 
	<img src="/html/img/CAGHG58V.jpg" height="110px" width="110px">
  </td>
</tr>
<tr>
	<td colspan="2">
	 <hr>
	</br>
	</td>
</tr>


<tr>
	<td colspan="2" align="center"></br></br><hr>
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="500" height="100" id="horizontal_abajo" align="middle">
		<param name="allowScriptAccess" value="sameDomain" />
		<param name="movie" value="img/horizontal_abajo.swf" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" /><embed src="horizontal_abajo.swf" quality="high" bgcolor="#ffffff" width="400" height="100" name="horizontal_abajo" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
		</object><hr>
	</td>
</tr>
<tr  align="center">
          <td colspan="2" align="center" valign="top"> 
			<img src="/html/img/quehacemos.gif"  width="450px" height="660px" >
		  <td>
          
</tr>
<tr>
	<td colspan="2">
	 <hr>
	</br>
	</td>
</tr>-->
</table> 

<?php
include("footer.php");
?>
