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
?>
<div>
<table>
<tr>
          <td height="450px" align="center" valign="top"> 
            <TABLE cellspacing="0" cellpadding="0" width="450px" class="texto" dwcopytype="CopyTableCell">
			  <TBODY>
				  <TR>
                  <TD align="center" bgColor=#e7eff4> 
				  	<table cellspacing="0" cellpadding="5" width="450px" align="center" border=0>
                      <tbody>
                        <tr> 
                          <td width="450px" bgcolor="#1D3C81" colspan=2><font face="Arial, Helvetica, sans-serif" color=#FFFFFF size=4>Noticias</font></td>
                          <!-- antes #093a80 -->
                        </tr>
                        <tr valign=top> 
                          <td width="225px"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"> 
                            <b>Servicio de Empleo sede La Plata</b><br>
                            <br>
                            Recientemente hemos inaugurado una nueva sede del 
                            Servicio de Empleo AMIA en La Plata junto a la Universidad 
                            de La Plata, a trav�s del PROLAB, Programa de oportunidades 
                            laborales y Recursos Humanos.<br>
                            <br>
                            �C�mo se potencian las capacidades de ambas organizaciones 
                            en esta alianza estrat�gica? <br>
                            <br>
                            Los clientes del SEA ahora tienen la posibilidad de 
                            contar con m�s de 20.000 profesionales de los m�s 
                            diversos perfiles, dado que hemos sumado a los graduados 
                            de todas las carreras de la UNLP a nuestra rica y 
                            variada base de datos.<br>
                            <br>
                            La Universidad, a su vez, hoy puede brindar a las 
                            empresas de la zona un servicio de b�squeda y selecci�n 
                            de personal, orientado no s�lo a cubrir puestos profesionales, 
                            sino tambi�n aquellos de �ndole operativa o l�nea 
                            (por ej. administraci�n, atenci�n al p�blico, etc.) 
                            con o sin formaci�n terciaria o universitaria seg�n 
                            los requerimientos del puesto, adem�s de sumar dentro 
                            de las opciones a graduados de otras universidades.<br>
                            <br>
                            Para m�s informaci�n pueden contactarse al (0221) 
                            4277196 o la <a 
					            href="mailto:laplata@amia-empleos.org.ar">laplata@amia-empleos.org.ar</a> 
                            </font> </td>
                          <td width="225px" class="texto">
						  <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
						  <b>Pr�ximos seminarios de capacitaci�n</b><br>
                            <br>
                            <b>"Incentivos no econ�mico"</b>, herramientas para 
                            motivar y desarrollar el personal - 5 de octubre - 
                            Servicio de Empleo AMIA- Sede C�rdoba. M�s informaci�n: 
                            <a 
				            href="mailto:cordoba@amia-empleos.org.ar">cordoba@amia-empleos.org.ar</a> 
                            tel: (0351) 4261851<br>
                            <br>
                            <b>"Estrategias y pr�cticas de venta receptiva" </b>- 
                            26 de septiembre, 3 y 10 de octubre- Servicio de Empleo 
                            AMIA- Sede Rosario. M�s informaci�n: <a 
				            href="mailto:avergara@amia-empleos.org.ar">avergara@amia-empleos.org.ar</a> 
                            tel: (0341) 4241113 / 4405577<br>
                            <br>
                            <b>Tercera exposici�n nacional de desarrollo de carrera 
                            ejecutiva "Posgrados MBA Forum 2006"<br>
                            </b><br>
                            El Servicio de Empleo AMIA ser� sponsor de este evento 
                            en el que estar�n presentes las m�s importantes Universidades 
                            e Institutos de altos estudios del pa�s exponiendo 
                            sus planes de posgrados y MBA 2006. Este encuentro 
                            esta destinado espec�ficamente a unir las inquietudes 
                            entre los profesionales interesados en realizar estudios 
                            de posgrado y MBA con las instituciones locales que 
                            brindan este servicio. <a href="http://www.mbaforum.com.ar/" 
				            target=_blank>www.mbaforum.com.ar </a><br>
                            <br>
                            Ediciones anteriores del Newsletter: haga <a 
				            href="http://www.empleos.amia.org.ar/dicontenidos.asp?IDSubSeccion=203" 
				            target=_blank><font color=#093a80><b>click aqu�</b></font></a> 
                            </font></td>
                        </tr>
                      </tbody>
                    </table></TD>
                </TR></TBODY></TABLE>
		  </td>
	  </tr>
	  <tr>
        <td align="center">
		  <TABLE cellSpacing=0 cellPadding=0 width="150px" border=0 align="center">
              <TBODY>
              <TR>
                <TD><IMG height=14 
                  src="http://www.amia-empleos.org.ar/newsletter/Empresas01/ttedit.gif" 
                  width="450"></TD></TR>
              <TR>
                <TD height=10></TD></TR>
              <TR>
                <TD align=right>
                  <TABLE cellSpacing=0 cellPadding=0 width=385 border=0>
                    <TBODY>
                    <TR>
                      <TD><STRONG><FONT face="Arial, Helvetica, sans-serif" 
                        color=#093a80 size=2>Ser flexibles con el personal es el 
                        nuevo negocio</FONT></STRONG></TD></TR>
                    <TR>
                      <TD height=5></TD></TR>
                    <TR>
                      <TD><FONT face="Verdana, Arial, Helvetica, sans-serif" 
                        size=1>La idea surgi� en compa��as estadounidenses: para 
                        que el trabajador se sienta valorado se prolongan 
                        licencias por paternidad, mudanza o examen. Y hasta se 
                        respetan los d�as de vacaciones del empleo anterior. 
                        <BR><BR><STRONG><A 
                        href="http://www.empleos.amia.org.ar/contenido.asp?IDCONTENIDO=1359&amp;SelectedButton=&amp;SelectedSubButton=&amp;TIPOC=1" 
                        target=_blank><FONT color=#093a80>&gt; ver nota 
                        completa</FONT></A></STRONG></FONT></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD height=15></TD></TR>
              <TR>
                <TD bgColor=#e7eff4><IMG height=14 
                  src="http://www.amia-empleos.org.ar/newsletter/Empresas01/ttconsejos.gif" 
                  width=160></TD></TR>
              <TR>
                <TD height=10></TD></TR>
              <TR>
                <TD align=right>
                  <TABLE cellSpacing=0 cellPadding=0 width=385 border=0>
                    <TBODY>
                    <TR>
                      <TD><STRONG><FONT face="Arial, Helvetica, sans-serif" 
                        color=#093a80 size=2>La deformaci�n profesional en 
                        RRHH</FONT></STRONG></TD></TR>
                    <TR>
                      <TD height=5></TD></TR>
                    <TR>
                      <TD><FONT face="Verdana, Arial, Helvetica, sans-serif" 
                        size=1>Resulta simp�tico escuchar a los especialistas. 
                        Sin conocer a que se dedican, podemos adivinar cu�l es 
                        su formaci�n.... pareciera ser que cuanto mas 
                        atravesados est�n por "su saber" dejan de vincularse con 
                        el mundo como la mayor�a de la gente, y lo ven a trav�s 
                        de los lentes de su profesi�n. Es frecuente escuchar que 
                        un m�dico no dice que est� cansado sino que tiene "un 
                        baj�n de hipoglucemia", un psic�logo no tiene miedo sino 
                        que "est� f�bico", un amigo arquitecto visita nuestra 
                        casa con sus ojos expertos, detectando las posibles 
                        manchas de humedad o problemas de estructura. As� 
                        podr�amos seguir con cada profesi�n. Nos preguntamos 
                        �los especialistas en recursos humanos son una 
                        excepci�n? Ciertamente, no.<BR><BR><STRONG><A 
                        href="http://www.empleos.amia.org.ar/contenido.asp?IDCONTENIDO=1360&amp;SelectedButton=&amp;SelectedSubButton=&amp;TIPOC=1" 
                        target=_blank><FONT color=#093a80>&gt; ver nota 
                        completa</FONT></A></STRONG></FONT></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD height=15></TD></TR>
              <TR>
                <TD bgColor=#e7eff4><IMG height=14 
                  src="http://www.amia-empleos.org.ar/newsletter/Empresas01/ttresp.gif" 
                  width=155></TD></TR>
              <TR>
                <TD height=10></TD></TR>
              <TR>
                <TD align=right>
                  <TABLE cellSpacing=0 cellPadding=0 width=385 border=0>
                    <TBODY>
                    <TR>
                      <TD><STRONG><FONT face="Arial, Helvetica, sans-serif" 
                        color=#093a80 size=2>Contin�a la brecha salarial entre 
                        hombres y mujeres</FONT></STRONG></TD></TR>
                    <TR>
                      <TD height=5></TD></TR>
                    <TR>
                      <TD><FONT face="Verdana, Arial, Helvetica, sans-serif" 
                        size=1>La brecha salarial entre hombres y mujeres 
                        contin�a siendo muy alta en la Argentina. Los resultados 
                        de una investigaci�n impulsada por la Universidad de 
                        Belgrano (UB) indican que ellos ganan, en promedio, un 
                        30% m�s que las mujeres. All� tambi�n se destacan las 
                        diferencias entre las remuneraciones de empleos no 
                        registrados, y los del personal menos 
                        capacitado.<B><BR><BR></B><A 
                        href="http://www.empleos.amia.org.ar/contenido.asp?IDSubseccion=208&amp;IDCONTENIDO=1357&amp;SelectedButton=&amp;SelectedSubButton=&amp;TIPOC=" 
                        target=_blank><STRONG><FONT color=#093a80>&gt; ver nota 
                        completa</FONT></STRONG></A></FONT></TD></TR></TBODY></TABLE></TD></TR>
              <TR>
                <TD height=15></TD></TR>
              <TR>
                <TD bgColor=#e7eff4><IMG height=14 
                  src="http://www.amia-empleos.org.ar/newsletter/Empresas01/tttest.gif" 
                  width=93></TD></TR>
              <TR>
                <TD height=10></TD></TR>
              <TR>
                <TD align=right>
                  <TABLE cellSpacing=0 cellPadding=0 width=387 border=0>
                    <TBODY>
                    <TR>
                      <TD vAlign=top width=2></TD>
                      <TD width=381>
                        <TABLE cellSpacing=0 cellPadding=0 width=385 border=0>
                          <TBODY>
                          <TR>
                            <TD><STRONG><FONT 
                              face="Arial, Helvetica, sans-serif" color=#093a80 
                              size=2>Continuidad</FONT><FONT 
                              face="Arial, Helvetica, sans-serif" color=#66660e 
                              size=1><BR></FONT><FONT 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color=#093a80 size=1>Empresa: Mega Tech 
                              S.A.</FONT></STRONG></TD></TR>
                          <TR>
                            <TD height=5></TD></TR>
                          <TR>
                            <TD><FONT 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              size=1>Hemos contratado nuevamente vuestros 
                              servicios de b�squeda y selecci�n de personal 
                              profesional quedando complacidos por la asistencia 
                              que nos han brindado. Les felicito y agradezco la 
                              atenci�n y soporte que nos han dispensado: ha sido 
                              un placer trabajar con ustedes y seguramente 
                              seguir� siendolo. <BR></FONT></TD></TR>
                          <TR>
                            <TD><A 
                              href="http://www.empleos.amia.org.ar/testimonios.asp?IDSubSeccion=26" 
                              target=_blank><IMG height=15 
                              src="http://www.amia-empleos.org.ar/newsletter/Empresas01/btmastest.gif" 
                              width=130 
                    border=0></A></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
		  
		  </td>
		  
		  </tr>
        
      </table></td>
    </div>
 
 
<?
/* </td>
  </tr>
  </table>  */
////////////////////////////////////

include("footer.php");
?>
