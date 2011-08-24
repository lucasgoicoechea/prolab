<br>
<h1>
&nbsp;<img src="./imagenes/faq.gif" border="0" align="middle" width="88" height="108">
&nbsp;Preguntas Frecuentes (F.A.Q.)</h1>
<br>
<?php 
    require "./conexion.php";
	include "./vercolor.php";
	$ipaux = $conexionDB->query("select a.* from aplicaciones a, faq f where f.idAplicacion = a.id_aplic GROUP BY f.idAplicacion");
    $acum = 0;
    while ($cip =  $ipaux->fetchRow(DB_FETCHMODE_ORDERED)){
		echo ("<div class='pregunta' onclick='verClasificacion2(this.id)' id='".$cip[0]."'>&nbsp;&raquo;&nbsp;".$cip[1]."</div>");
    $qClasificacion = $conexionDB->query("select c.* from clasificacion c, faq f where c.idAplicacion = ".$cip[0]." AND  c.idClasificacion  = f.idClasificacion GROUP BY c.idClasificacion ");
    $acumm = 0;
    while ($clasifica = $qClasificacion->fetchRow(DB_FETCHMODE_ORDERED)){
		echo ("<div class='clasificacion2' id='clas".$cip[0]."' onclick='verPregunta2(this.id + ".$clasifica[0].")'>CLASIFICACION:".$clasifica[2]."</div>");
		$qPregunta = $conexionDB->query("select c.* from consultas c, faq f where c.idClasificacion = ".$clasifica[0]." AND c.idAplicacion = ".$clasifica[1]." AND c.nro_incidente = f.id_consulta GROUP BY c.nro_incidente");
        $acummm = 0;
        while ($preg =  $qPregunta->fetchRow(DB_FETCHMODE_ORDERED)){
		         echo ("<div class='respuesta2' onclick='verRespuesta2(this.id + ".$acummm.")' id='pregclas".$cip[0].$clasifica[0]."'>PREGUNTA:&nbsp;&raquo;&nbsp;".$preg[2]."</div>");
				 echo ("<div class='respuesta'  id='respuestapregclas".$cip[0].$clasifica[0].$acummm."'>RESPUESTA: &nbsp;".$preg[3]."</div>");
		$acummm++;
		}
		}
		}
	echo("<br><p align='center'><a href='index.php'>Ir a Principal</a></p><br><br><br>");
?>
