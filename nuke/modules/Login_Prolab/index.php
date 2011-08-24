<?php

/* if (!eregi("modules.php", $PHP_SELF)){ 
  die ("You can't access this rows directly...");
} */

if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}
$index = 1; 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__)); 
get_lang($module_name); 
include("header.php");
opentable();
?>
<STYLE>
.est1{
	FONT-WEIGHT: bold;
	FONT-SIZE: 10px;
	CURSOR: default;
	COLOR: "#FFFFFF";
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
	TEXT-ALIGN: center;
}
.est2{
	FONT-WEIGHT: bold;
	FONT-SIZE: 10px;
	CURSOR: default;
	COLOR: "#333333";
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
}

.est3{
	FONT-SIZE: 11px;
	CURSOR: default;
	COLOR: "#333333";
	FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
	TEXT-ALIGN: center;
}
</STYLE>

<BR>

<div align="center">

<table width="50%" height="150" border="1" cellpadding="0" cellspacing="0" bordercolor="#666666" bgcolor="C9DCAD">
    <tr height="12%" bgcolor="#006600">
	    <td width="31%" align="center" valign="middle" bordercolor="#666666">
			   <div align="center" class=est1>Nuevos Usuarios</div>
		</td>
        <td width="69%" align="center" valign="middle" bordercolor="#666666">
			   <div align="center" class=est1>Usuarios Registrados</div>
	    </td>
    </tr>

	<!-- flash de ingresar CV -->
    <tr>
      <td height="88%" align="center"> 
	        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="83" height="19" align="absmiddle">
        <param name="BASE" value=".">
        <param name="movie" value="text1.swf">
        <param name="quality" value="high">
        <param name="scale" value="noborder">
        <param name="BGCOLOR" value="#C9DCAD">
        <embed src="text1.swf" width="83" height="19" align="absmiddle" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" scale="noborder" bgcolor="#C9DCAD" base="." ></embed> 
      </object>
  	  </td>
      
	  <td align="center">
	  <FORM METHOD=POST ACTION="../../../cv/login/validar2.php">
	  
	  <!-- <FORM METHOD=POST ACTION="../../../cv/login/validar.php"> -->
	  
	  
	    <!-- campos del formulario -->
      <table border="0" align="center" cellpadding="1">
        <tr>
            <td align="right" class="est2">Usuario</td>
            <td><input type="text" name="user"></td>
      	</tr>
		<tr>
			<td align="right" class="est2">Contrase&ntilde;a</td>
			<td><input type="password" name="pwd"></td>
        </tr>
       </table>
    
	 <INPUT TYPE="submit" value="Ingresar">
    <!--       
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="93" height="33" align="absmiddle">
        <param name="BASE" value=".">
        <param name="movie" value="button11.swf">
        <param name="quality" value="high">
        <param name="bgcolor" value="#C9DCAD">
        <embed src="button11.swf" width="93" height="33" align="absmiddle" quality="high" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" bgcolor="#C9DCAD" base="."></embed> 
      </object>

	  --> 
	  
		  <BR>
          <A HREF="forgotPwd.php"><font color="#336633" size="1" face="Geneva, Arial, Helvetica, sans-serif">Olvide
                mi contrase&ntilde;a</font></A></div>
       </FORM>     
		</td>
    </tr>
  </table>
  <table width="65%" border="0" cellspacing="0" cellpadding="7">
    <tr>
      <td align="center" class="est3">
        <BR>
		  El <strong>Programa de Vinculaci&oacute;n con el Graduado</strong> te
          invita a que te <strong>suscribas </strong>a nuestra p&aacute;gina
          o que <strong>actualices</strong> tus datos, con el objetivo de vincular,
          guiar y capacitar al joven egresado de la UNLP en su inserci&oacute;n
          al mercado laboral. 
		  <BR><BR>
          La Suscripci&oacute;n a nuestro Programa es de vital importancia para
          la UNLP, ya que por medio de &eacute;ste mecanismo apuntamos a realizar
          un proceso de seguimiento profesional de todos nuestros egresados en
          el transcurso del tiempo, realizando de &eacute;sta manera un diagn&oacute;stico
          preciso de la situaci&oacute;n, con la firme convicci&oacute;n de materializar
          acciones institucionales que vinculen directamente a nuestros profesionales
          con el &aacute;mbito laboral y acad&eacute;mico.
		  <BR><BR>
		  <strong>Deb&eacute;s
          tener en cuenta que deber&aacute;s actualizar tu CV cada 3 meses,<br>
          los CV que no sean actualizados ser&aacute;n dados de baja del sistema</strong>
		  </td>
    </tr>
  </table>
</div>

<?
closetable();
include("footer.php");
?>
