<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<TITLE>PROLAB - Incripci&oacute;n a Video CV </TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<link href="../../estilo1.css" rel="stylesheet" type="text/css">

<body >
<form action="inscripcion_cursos.php" method="post" >

<table width="70%" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr class="titulo2">	    
        <td align="center" valign="middle">
			   <div align="center" class="est1">Seleccione una fecha tentativa </div>
        </td>
     <td align="left">     

<?php
require_once "../../includes/conexion.php";
$cursos = $link->query("SELECT * FROM cursos ");	
    print("<select name='curso' class='textoEnc'>");
	while ($cur = $cursos -> fetchRow(DB_FETCHMODE_ORDERED)){		
		print("<option value='".$cur[0]."'>".$cur[1]."</option>");	
			
	};
	
	print ("</select>");
?>
</td>
</tr>
<tr>
  <td align="middle" colspan="2"></br></br>
	<input type="submit" value="Inscribirme" class="boton"/>
  </tD>
</tr>
</table>
</form>

</body>
</html>