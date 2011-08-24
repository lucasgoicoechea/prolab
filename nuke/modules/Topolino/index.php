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
                            de La Plata, a través del PROLAB, Programa de oportunidades 
                            laborales y Recursos Humanos.<br>
                            <br>
                            ¿Cómo se potencian las capacidades de ambas organizaciones 
                            en esta alianza estratégica? <br>
                            <br>
                            Los clientes del SEA ahora tienen la posibilidad de 
                            contar con más de 20.000 profesionales de los más 
                            diversos perfiles, dado que hemos sumado a los graduados 
                            de todas las carreras de la UNLP a nuestra rica y 
                            variada base de datos.<br>
                            <br>
                            La Universidad, a su vez, hoy puede brindar a las 
                            empresas de la zona un servicio de búsqueda y selección 
                            de personal, orientado no sólo a cubrir puestos profesionales, 
                            sino también aquellos de índole operativa o línea 
                            (por ej. administración, atención al público, etc.) 
                            con o sin formación terciaria o universitaria según 
                            los requerimientos del puesto, además de sumar dentro 
                            de las opciones a graduados de otras universidades.<br>
                            <br>
                            Para más información pueden contactarse al (0221) 
                            4277196 o la <a 
					            href="mailto:laplata@amia-empleos.org.ar">laplata@amia-empleos.org.ar</a> 
                            </font> </td>
                          <td width="225px" class="texto">
						  <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
						  <b>Próximos seminarios de capacitación</b><br>
                            <br>
                            <b>"Incentivos no económico"</b>, herramientas para 
                            motivar y desarrollar el personal - 5 de octubre - 
                            Servicio de Empleo AMIA- Sede Córdoba. Más información: 
                            <a 
				            href="mailto:cordoba@amia-empleos.org.ar">cordoba@amia-empleos.org.ar</a> 
                            tel: (0351) 4261851<br>
                            <br>
                            <b>"Estrategias y prácticas de venta receptiva" </b>- 
                            26 de septiembre, 3 y 10 de octubre- Servicio de Empleo 
                            AMIA- Sede Rosario. Más información: <a 
				            href="mailto:avergara@amia-empleos.org.ar">avergara@amia-empleos.org.ar</a> 
                            tel: (0341) 4241113 / 4405577<br>
                            <br>
                            <b>Tercera exposición nacional de desarrollo de carrera 
                            ejecutiva "Posgrados MBA Forum 2006"<br>
                            </b><br>
                            El Servicio de Empleo AMIA será sponsor de este evento 
                            en el que estarán presentes las más importantes Universidades 
                            e Institutos de altos estudios del país exponiendo 
                            sus planes de posgrados y MBA 2006. Este encuentro 
                            esta destinado específicamente a unir las inquietudes 
                            entre los profesionales interesados en realizar estudios 
                            de posgrado y MBA con las instituciones locales que 
                            brindan este servicio. <a href="http://www.mbaforum.com.ar/" 
				            target=_blank>www.mbaforum.com.ar </a><br>
                            <br>
                            Ediciones anteriores del Newsletter: haga <a 
				            href="http://www.empleos.amia.org.ar/dicontenidos.asp?IDSubSeccion=203" 
				            target=_blank><font color=#093a80><b>click aquí</b></font></a> 
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
                        size=1>La idea surgió en compañías estadounidenses: para 
                        que el trabajador se sienta valorado se prolongan 
                        licencias por paternidad, mudanza o examen. Y hasta se 
                        respetan los días de vacaciones del empleo anterior. 
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
                        color=#093a80 size=2>La deformación profesional en 
                        RRHH</FONT></STRONG></TD></TR>
                    <TR>
                      <TD height=5></TD></TR>
                    <TR>
                      <TD><FONT face="Verdana, Arial, Helvetica, sans-serif" 
                        size=1>Resulta simpático escuchar a los especialistas. 
                        Sin conocer a que se dedican, podemos adivinar cuál es 
                        su formación.... pareciera ser que cuanto mas 
                        atravesados están por "su saber" dejan de vincularse con 
                        el mundo como la mayoría de la gente, y lo ven a través 
                        de los lentes de su profesión. Es frecuente escuchar que 
                        un médico no dice que está cansado sino que tiene "un 
                        bajón de hipoglucemia", un psicólogo no tiene miedo sino 
                        que "está fóbico", un amigo arquitecto visita nuestra 
                        casa con sus ojos expertos, detectando las posibles 
                        manchas de humedad o problemas de estructura. Así 
                        podríamos seguir con cada profesión. Nos preguntamos 
                        ¿los especialistas en recursos humanos son una 
                        excepción? Ciertamente, no.<BR><BR><STRONG><A 
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
                        color=#093a80 size=2>Continúa la brecha salarial entre 
                        hombres y mujeres</FONT></STRONG></TD></TR>
                    <TR>
                      <TD height=5></TD></TR>
                    <TR>
                      <TD><FONT face="Verdana, Arial, Helvetica, sans-serif" 
                        size=1>La brecha salarial entre hombres y mujeres 
                        continúa siendo muy alta en la Argentina. Los resultados 
                        de una investigación impulsada por la Universidad de 
                        Belgrano (UB) indican que ellos ganan, en promedio, un 
                        30% más que las mujeres. Allí también se destacan las 
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
                              servicios de búsqueda y selección de personal 
                              profesional quedando complacidos por la asistencia 
                              que nos han brindado. Les felicito y agradezco la 
                              atención y soporte que nos han dispensado: ha sido 
                              un placer trabajar con ustedes y seguramente 
                              seguirá siendolo. <BR></FONT></TD></TR>
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
