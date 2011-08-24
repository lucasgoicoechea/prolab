<?php
if (isset($_SESSION['idUsuario'])) {
print("<script language='JavaScript'>cambiarColor(".$_SESSION['color'].");</script>");
}
?>

contactar