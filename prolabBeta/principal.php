<table align="center"  width="460px" border="0" bgcolor="white">


<tr>
	<td colspan="2"  bgcolor="#638CB5" class="subtitulo" align="center" style="border-style:solid;color:#DD3177;text-decoration:none;font-size:18px;">
<div id="light" ><script language="JavaScript1.2" type="text/javascript">


var message="OFERTAS LABORALES"
var neonbasecolor="navy"
var neontextcolor="white"    //"#DD3177"
var flashspeed=100  //in milliseconds

///No need to edit below this line/////

var n=0
if (document.all||document.getElementById){
document.write('<font color="'+neonbasecolor+'" style="text-decoration: none; font-size: 18px;" >')
for (m=0;m<message.length;m++)
document.write('<span id="neonlight'+m+'">'+message.charAt(m)+'</span>')
document.write('</font>')
}
else
document.write(message)

function crossref(number){
var crossobj=document.all? eval("document.all.neonlight"+number) : document.getElementById("neonlight"+number)
return crossobj
}

function neon(){

//Change all letters to base color
if (n==0){
for (m=0;m<message.length;m++)
//eval("document.all.neonlight"+m).style.color=neonbasecolor
crossref(m).style.color=neonbasecolor
}

//cycle through and change individual letters to neon color
crossref(n).style.color=neontextcolor

if (n<message.length-1)
n++
else{
n=0
clearInterval(flashing)
setTimeout("beginneon()",1500)
return
}
}

function beginneon(){
if (document.all||document.getElementById)
flashing=setInterval("neon()",flashspeed)
}
beginneon()


</script> </div></td>
</tr>

<tr>
<td colspan="2">


<table width="550px"  align="center" cellpadding="0" cellspacing="0" bordercolor="#1D3C81" style="border: 1px solid #336699;">
  <tr bgcolor="#C7CD25" style="border: 1px solid #336699;"> 
    <td style="border: 1px solid #336699;"> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=fecha'><font  color="#274138"> <b>Fecha</b></font></a></div></td>

    <td style="border: 1px solid #336699;"> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=tipoOf'><font color="#274138"><b>Puesto</b></font></a></div></td>    

    <td colspan='3' style="border: 1px solid #336699;"> <div align="center"><a href='<? $_SERVER['PHP_SELF'] ?>?ord=aviso'><font color="#274138"><b>B&uacute;squeda</b></font></a></div></td>
	
	<!--<td colspan='2' align='center'>
	  &nbsp;
	</td>-->


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
	$sql = " SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf),cant_puestos,aviso,puesto FROM empresas_ofertas WHERE publicar = 's' ORDER BY fecha DESC";
	$res = mysql_query($sql) or die (mysql_error());	
}else{
	$sql = " SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf),cant_puestos,aviso,puesto FROM empresas_ofertas WHERE publicar = 's' ORDER BY ".$_GET['ord']." DESC";
	$res = mysql_query($sql) or die (mysql_error());	
}
//Colores para distinguir una oferta de otra $c1 y $c2, si $x es par se imprime $c1 sino $c2

if (mysql_num_rows($res) > 0){
	$x='0'; 
	$c1= "#FFFFFF";  
	$c2= "#CACACA";
//impresion de los datos
	while (list($idO,$fecha,$tipoOf,$area,$aviso,$rotulo) = mysql_fetch_array($res)){
		    $x++;
			$fecha = explode("-", $fecha);
			$fecha = $fecha[2]."/".$fecha[1]."/".$fecha[0];
?>

 <tr style="border: 1px solid #336699;"> 
    <td style="border-top:1px solid #336699;border-right: 1px solid #336699;" bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="textIndoorOfertas"><? echo "$fecha"; ?></span></div>
	</td>
   <td style="border-top:1px solid #336699;border-right: 1px solid #336699;" bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="textIndoorOfertas"><? echo "$rotulo"; ?></span></div>
   </td>    

  <td style="border-top:1px solid #336699; border-right: 1px solid #336699;" bgcolor = <? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="textIndoorOfertas"><? echo "$aviso"; ?></span></div>
  </td>  
   <td style="border-top: 1px solid #336699;border-right: 1px solid #336699;"  bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="textIndoorOfertas"><? echo "<a  style='color: black;' href='index.php?op=ver_detalles&idO=$idO'>Ver</a> \n" ?></span></div></td>
    <td style="border-top: 1px solid #336699;" bgcolor=<? if ($x % 2 == 0){echo $c1;}else{echo $c2;}?>><div align="center"><span class="textIndoorOfertas"><? echo "<a style='color: black;' href='index.php?op=postularse&idO=$idO'>Postulate a ésta oferta</a> \n" ?></span></div></td>

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
<tr><td>
<a href="http://www.prolabempleos.unlp.edu.ar/ingresocv.cfm" ><img width="550px" src="images/bannerw.jpg" alt="Es posible que tu navegador no permita visualizar esta imagen."></a><br>
</td></tr>
<tr><td>

</td></tr>
<tr><td align="center">
<img width="517px" height="453px" src="images/POSTULANTES.jpg" alt="Es posible que tu navegador no permita visualizar esta imagen."><br>
</td></tr>
</table>
<!--Bloque de charlas
<td colspan="2">
<DIV>
<span style=" font-size:18px;"><B><U>La UNLP presentó el primer informe sobre los RRHH de la región</U></B></span>
<BR>
<BR>
<img align="left" width="225" height="150" src="tabsheet/img/rrhhmarzo2010.jpg" alt="Es posible que tu navegador no permita visualizar esta imagen.">
<br>El presidente de la Universidad Nacional de La Plata, Gustavo Azpiazu, participó el miçercoles 3 de marzo del acto de presentación de la <b>“Radiografía de los RRHH de las empresas de la Región”</b>, un instrumento considerado clave para la gestión empresaria. El trabajo fue impulsado a partir de un Opacuerdo de colaboración entre el ProLab (Programa de Oportunidades laborales y RR.HH de la UNLP), La Federación Empresaria La Plata y la Unión Industrial del Gran la Plata.
</p>
<p align="left"><br>“Otra vez, la Universidad pone a disposición de las fuerzas productivas de la región toda su capacidad y conocimiento, en este caso para dotar a los empresarios de herramientas que permitan desarrollar mejor sus emprendimientos”, dijo Azpiazu en el acto realizado esta tarde en el Rectorado.
La “Radiografía de los RR.HH en las empresas de la Región” es un <b>informe realizado sobre 220 empresas y establecimientos con mas de 6 empleados, que describe las necesidades, demandas y funciones de los Recursos Humanos.</b></p>
<img align="left" width="90" height="60" src="tabsheet/img/rrhhmarzo2010b.jpg"
<p align="left">“Los objetivos de este trabajo, son obtener una mirada estratégica y conjunta de las acciones de RR.HH en las empresas de la región. Con ese diagnóstico, obtener datos estadísticos para establecer políticas y detectar necesidades de capacitación” explicó Ignacio Ignisci Director del Prolab.
Los puntos que se tuvieron en cuenta a la hora de hacer este relevamiento fueron las herramientas organizacionales, la contratación de servicios, las actividades de los RR.HH, las demandas de capacitación y sus fortalezas y debilidades.</p>
<p align="center"><a href="pdfConferenciaRRHH.pdf" TARGET='_blank' >Leer m&aacute;s</a></p>
</DIV>

<DIV style="MARGIN: 1ex">
<DIV>
<P align=justify><FONT face=Arial size=2><B><U>RELACIONES LABORALES EN LAS EMPRESAS</U></B></FONT></P>
<P align=left><A name=0.2_graphic02></A><FONT face=Arial size=2><B><U><IMG 
height=185 alt="Es posible que tu navegador no permita visualizar esta imagen." 
src="tabsheet/img/rel_personales.jpg" 
width=200 align="left"></U></B></FONT></P>
<P align=left><FONT face=Arial size=2>El Departamento Joven de la Unión Industrial del Gran La Plata conjuntamente con el Programa de Oportunidades Laborales (PROLAB) de la Universidad Nacional de La Plata están realizando un ciclo anual de conferencias sobre <B><I>“Capacitación y Desarrollo en RR.HH. Formación empresarial y profesional”</I></B>.
</FONT></P>
<P align=left><FONT face=Arial size=2>Durante el tercer encuentro,  a cargo del Dr. Daniel Montes de Oca, Director Provincial de Relaciones Laborales del Ministerio de Trabajo de la Provincia de Buenos Aires, explicó algunas nociones básicas sobre el <B>derecho colectivo del trabajo.</B></FONT></P>

<P align=left><FONT face=Arial size=2>En primer lugar, lo definió  como el <B><I>“conjunto de principios y normas que regulan las relaciones entre las partes”.</I></B></FONT></P>

<p align="center"><a href="index.php?idArticulo=66">Leer m&aacute;s</a></p>

</DIV></DIV>
</td>
-->
<br>
<table align="center"  width="515px" border="0" bgcolor="white">
<tr>
<td align="center" >
<?php
//include("box-prolab.html");
?>
</td> </tr> </table>