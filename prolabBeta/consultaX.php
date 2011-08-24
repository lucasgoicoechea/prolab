<br>
<form action="index.php?op=mostrarHistorial" method="post" onsubmit="">
<?php

require_once "conexion.php";
include "./vercolor.php";

$q1 = $conexionDB->query("SELECT idTipoIncidente, descripcion, fecha_creacion, nombreReportante, idClasificacion FROM consultas WHERE nro_incidente=".$_POST['idConsulta']);
$c = $q1->fetchRow(DB_FETCHMODE_ORDERED);
if (isset($c[0])){

$q3 = $conexionDB->query("SELECT aplicaciones.descripcion FROM clasificacion, aplicaciones WHERE (clasificacion.idClasificacion='".$c[4]."') and (clasificacion.idAplicacion=aplicaciones.id_aplic)");
$e = $q3->fetchRow(DB_FETCHMODE_ORDERED);

echo ("<br><br><h3> N&uacute;mero de Incidente:&nbsp;".$_POST['idConsulta']);

echo ("</h3><br> <strong><label for='tipo'>&nbsp;&nbsp;Tipo de Reporte:&nbsp;</label></strong>&nbsp;&nbsp;");

$q2= $conexionDB->query("SELECT tipo_incidente.descripcion FROM consultas, tipo_incidente WHERE (tipo_incidente.idTipoIncidente = '".$c[0]."')");
$d = $q2->fetchRow(DB_FETCHMODE_ORDERED);


echo ("<label for='rptatipo'>&nbsp;&nbsp;$d[0]&nbsp;</label><br><br>");


echo("<strong><label for='nombre'>&nbsp;&nbsp;Nombre del usuario reportante:&nbsp;</label></strong>&nbsp;&nbsp;");
echo("<label for='rptaNombre'>&nbsp;&nbsp;$c[3]&nbsp;</label><br><br>");

echo("<strong><label for='fecha'>&nbsp;&nbsp;Fecha de creacion:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaFecha'>&nbsp;&nbsp;$c[2]&nbsp;</label>");

echo ("<br><br><strong><label for='descrip'>&nbsp;&nbsp;Descripcion del Problema:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaDescrip'>&nbsp;&nbsp;$c[1]&nbsp;</label>");

echo("<br><br><strong><label for='Aplicacion'>&nbsp;&nbsp;Aplicacion en la que se origino:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaAplic'>&nbsp;&nbsp;$e[0]&nbsp;</label><br><br><br>");


echo("<div class='pregunta' onclick='verRespuesta(this.id)' id='0' align='center'>Ver Historial</div>");

echo("<div class='respuesta' id='respuesta0'>");

/*aca va historial*/
	// variable contadora
	 $acum=0;
	// hacer la consulta
	$i = $conexionDB->query("SELECT eventos.descripcion, historial.fecha, usuarios.nombre, niveles.descripcion, consultas.respuesta FROM historial, usuarios, niveles, eventos, consultas WHERE (historial.idConsulta=".$_POST['idConsulta'].") and (eventos.idEvento = historial.idEvento) and (consultas.nro_incidente = ".$_POST['idConsulta'].") and (historial.idUsuario = usuarios.idUsuario) and (usuarios.idNivel = niveles.idNivel) ORDER BY historial.fecha ASC");	
	// iterar en la consulta
	while ($f = $i->fetchRow(DB_FETCHMODE_ORDERED))
	{
		echo("<strong><label for='estado'>&nbsp;&nbsp;Estado del reporte:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaReporte'>&nbsp;&nbsp;$f[0]&nbsp;</label>");

		echo("<br><strong><label for='fecha'>&nbsp;&nbsp;Fecha:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaReporte'>&nbsp;&nbsp;$f[1]&nbsp;</label>"); 
		
		if(($f[0]=="Tomada por Operador")||($f[0]=="Pasada a Nivel Superior")){
		echo("<br><strong><label for='nombreOper'>&nbsp;&nbsp;Operador:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaReporte'>&nbsp;&nbsp;$f[2]&nbsp;</label>");

		echo("<br><strong><label for='nivel'>&nbsp;&nbsp;Nivel en el que se encuentra su reporte o consulta:&nbsp;</label></strong>&nbsp;&nbsp;<label for='rptaNivel'>&nbsp;&nbsp;$f[3]&nbsp;</label>");

		echo("<br>&nbsp;&nbsp;respuesta pendiente");	}
		if($f[0] == "Respondida"){
		
		echo("<br>&nbsp;&nbsp;Respuesta:&nbsp;$f[4]");
	
		}

		echo("<p align='center'>**********************</p>");	
		$acum++;
	}
	/*aca termina historial*/

echo("</div>");

}
else{print("<h1 align='center'>Reporte inexistente<h1><br><h3>Vuelva a probar con otro numero</h3>");}
echo("<br><br><center><a href='index.php?op=seguirConsulta'>Volver</a></center>");
?>
</form>
<br>