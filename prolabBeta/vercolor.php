<?php
if (isset($_SESSION['idUsuario'])){
require_once "conexion.php";
$micolor = $conexionDB->query("select idcolor from usuarios where idusuario=".$_SESSION['idUsuario']);
$qmicolor = $micolor->fetchRow(DB_FETCHMODE_ORDERED);
if (isset($qmicolor[0])) {
print("<script language='JavaScript'>cambiarColor(".$qmicolor[0].");</script>");
}
}
?>