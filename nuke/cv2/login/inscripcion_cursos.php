<?php
session_start();
include("../../includes/conexion.php");

$existe =  $link->query("select * from cursos_graduados where idUsuario = '".$_SESSION["idUsuario"]."'");
if ($existe->fetchRow(DB_FETCHMODE_ORDERED) > 0){
	print("<div align='center'><font color='#336633' size='3' face='Geneva, Arial, Helvetica, sans-serif'>Usted ya se encuentra registrado</font></div>");
	print("</br></br><p align='center'><a href= '../../index.php'>Volver</a></p>");
}else{
	$query =  $link->query("insert into cursos_graduados (idCurso , idUsuario) values ( '".$_POST['curso']."','".$_SESSION["idUsuario"]."')");

	if (DB::isError($query)) {
		print("<div align='center'><font color='#336633' size='3' face='Geneva, Arial, Helvetica, sans-serif'>Usted ya se encuentra registrado</font></div>");
		print("</br></br><p align='center'><a href= '../../index.php'>Volver</a></p>");
				
	}else{
		print("<script> window.location='inscripcion_satisfactoria.html'");
		print("</script>");
	}
}
?>