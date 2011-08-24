<?php
include ("includes/config.php");
include ("includes/funciones.php");
?>
<html>
<head>
<title>Ingreso de ofertas laborales</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <STYLE type="text/css">
  <!--
   BODY {
    scrollbar-face-color:#D8D8D8;
    scrollbar-arrow-color:#828282;
    scrollbar-highlight-color:#D8D8D8;
    scrollbar-3dlight-color:#D8D8D8;
    scrollbar-shadow-color:#D8D8D8;
    scrollbar-darkshadow-color:#D8D8D8;
    scrollbar-track-color:#8B8B8B;
   }
  -->
  </STYLE>
<link href="estilo1.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe ingresar una dirección de e-mail valida.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' debe ingresar un número.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' debe ingresar un número entre '+min+' y '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es obligatorio.\n'; }
  } if (errors) alert('Ocurrieron los siguientes errores:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="59" border="0" cellspacing="2" cellpadding="0">
        <tr> 
          <td width="17" bgcolor="#336633" class="texto1">&nbsp;</td>
          <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
          <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
        </tr>
      </table>
      <span class="texto1">NUEVA OFERTA: <strong>datos p&uacute;blicos/optativos/privados</strong> 
      &gt; carreras&gt; finalizar</span> <p><span class="titulo3">Ingresar nueva 
        oferta laboral</span><br>
        <span class="texto1">los campos marcados con <font color="#FF0000"><strong>(*)</strong></font> 
        son obligatorios</span> </p>
      <form action="nueva_oferta2.php" method="post" name="form1" onSubmit="MM_validateForm('dia','','RinRange1:31','mes','','RinRange1:12','ano','','RinRange2004:2007','area','','R','sector','','R','cargo','','R','edad','','R','horario','','R','remuneracion','','R','reporta','','R','subordinados','','R','colaboracion','','R','tareasgenerales','','R','tareasdiarias','','R','textarea2','','R','textarea3','','R','textarea4','','R','textarea5','','R','textarea6','','R','textarea7','','R','textarea8','','R','textarea9','','R');return document.MM_returnValue">
        <table width="400" border="0" align="center" cellpadding="4" cellspacing="0" class="texto1">
          <tr> 
            <td width="178"><input name="empresa" type="hidden" id="empresa" value="<? echo $_POST['empresa']; ?>"></td>
          </tr>
          <tr bgcolor="#FFCC00"> 
            <td colspan="2"><span class="subtitulo">DATOS PUBLICOS<br>
              </span>(estos datos ser&aacute;n publicados en el listado de ofertas 
              y detalles de las mismas)</td>
          </tr>
          <tr bgcolor="#dfdfdf"> 
            <td> <div align="right">fecha (d&iacute;a/mes/a&ntilde;o)<br>
                <span class="texto5">(la fecha presente)</span></div></td>
            <td width="206"> <input name="dia" type="text" id="dia" value="" size="2"> 
              <input name="mes" type="text" id="mes" value="" size="2"> <input name="ano" type="text" id="ano" value="" size="4"> 
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td> <div align="right">tipo oferta<br>
                <span class="texto5">(oferta de contrato o pasant&iacute;a)</span></div></td>
            <td> <select name="tipoOf" id="tipoOf">
                <option value="&quot;&quot;" selected>seleccione una opci&oacute;n</option>
                <option value="contrato">contrato</option>
                <option value="pasantia">pasant&iacute;a</option>
              </select> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#dfdfdf"> 
            <td> <div align="right">busqueda<br>
                <span class="texto5">(graduado o estudiante)</span></div></td>
            <td> <select name="busqueda" id="busqueda">
                <option value="&quot;&quot;" selected>seleccione una opci&oacute;n</option>
                <option value="graduado">graduado</option>
                <option value="estudiante">estudiante</option>
                <option value="indistinto">indistinto</option>
              </select> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td> <div align="right">area<br>
                <span class="texto5">(area a la que corresponde el puesto)</span></div></td>
            <td> <input name="area" type="text" id="area" size="30"> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span> 
            </td>
          </tr>
          <tr bgcolor="#dfdfdf"> 
            <td> <div align="right">sector<span class="texto5"><br>
                (sector al que corresponde el puesto)</span></div></td>
            <td> <input name="sector" type="text" id="sector" size="30"> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td> <div align="right">cargo<br>
                <span class="texto5">(nombre del cargo que se ofrece)</span></div></td>
            <td> <input name="cargo" type="text" id="cargo" size="30"> <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#dfdfdf" class="texto1"> 
            <td> <div align="right">sexo<br>
                <span class="texto5">(sexo requerido)</span></div></td>
            <td> <p> 
                <label> 
                <input type="radio" name="sexo" value="masculino">
                masculino</label>
                <br>
                <label> 
                <input type="radio" name="sexo" value="femenino">
                femenino <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span><br>
                </label
				>
                <label> 
                <input type="radio" name="sexo" value="indistinto">
                indistinto</label>
                <br>
              </p></td>
          </tr>
          <tr bgcolor="#FFFFFF" class="texto1"> 
            <td class="texto1"> <div align="right">edad<br>
                <span class="texto5">(rango de edad requerida)</span></div></td>
            <td class="texto1"> <input name="edad" type="text" id="edad" size="20"> 
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#dfdfdf" class="texto1"> 
            <td class="texto1"> <div align="right">horario<br>
                <span class="texto5">(horario a cumplir)</span></div></td>
            <td class="texto1"> <input name="horario" type="text" id="horario" size="20"> 
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF" class="texto1"> 
            <td colspan="2" class="texto1">&nbsp;</td>
          </tr>
          <tr bgcolor="#66CCCC" class="texto1"> 
            <td colspan="2" class="texto1"><span class="subtitulo">DATOS OPTATIVOS</span><br>
              (usted puede optar por hacer p&uacute;blicos o no los siguientes 
              datos) </td>
          </tr>
          <tr bgcolor="#dfdfdf" class="texto1"> 
            <td class="texto1"> <div align="right">descripci&oacute;n de tareas 
                generales </div></td>
            <td class="texto1"> <textarea name="tareasgenerales" cols="30" rows="3" id="tareasgenerales"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF" class="texto1"> 
            <td class="texto1"> <div align="right">tareas espec&iacute;ficas diarias</div></td>
            <td class="texto1"> <textarea name="tareasdiarias" cols="30" rows="3" id="tareasdiarias"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#dfdfdf" class="texto1"> 
            <td class="texto1"> <div align="right">categor&iacute;a</div></td>
            <td class="texto1"> <select name="select">
                <option value="&quot;&quot;" selected>seleccione una opci&oacute;n</option>
                <option value="aprendiz">aprendiz</option>
                <option value="junior">junior</option>
                <option value="medio">medio</option>
                <option value="senior">senior</option>
              </select>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF" class="texto1"> 
            <td class="texto1"> <div align="right">remuneraci&oacute;n prevista 
                para el cargo</div></td>
            <td class="texto1"> <input name="remuneracion" type="text" id="remuneracion" size="20">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#dfdfdf" class="texto1"> 
            <td class="texto1"> <div align="right">conocimientos</div></td>
            <td class="texto1"> <textarea name="conocimientos" cols="30" rows="3" id="textarea2"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#FFFFFF" class="texto1"> 
            <td colspan="2" class="texto1">desea hacer p&uacute;blicos estos datos?
              <label>
              <input type="radio" id="publicar" name="publicar" value="s">
              Si</label> <label> 
              <input name="publicar" id="publicar" type="radio" value="n" checked>
              No</label> <br> </td>
          </tr>
          <tr bgcolor="#FFFFFF" class="texto1"> 
            <td colspan="2" class="texto1">&nbsp;</td>
          </tr>
          <tr bgcolor="#66CCFF" class="texto1"> 
            <td colspan="2" class="texto1"><span class="subtitulo">DATOS PRIVADOS</span><br>
              (estos datos ser&aacute;n de uso exclusivo del personal del prolab)</td>
          </tr>
          <tr bgcolor="#E1E1E1" class="texto1"> 
            <td class="texto1"> <div align="right">reporta a</div></td>
            <td class="texto1"> <input name="reporta" type="text" id="reporta" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr class="texto1"> 
            <td class="texto1"><div align="right">subordinados</div></td>
            <td class="texto1"><input name="subordinados" type="text" id="subordinados" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#E1E1E1" class="texto1"> 
            <td class="texto1"> <div align="right">colaboraci&oacute;n con (sectores)</div></td>
            <td class="texto1"> <input name="colaboracion" type="text" id="colaboracion" size="30">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr class="texto1"> 
            <td class="texto1"><div align="right"> que se espera de quien ingrese?</div></td>
            <td class="texto1"><textarea name="seespera" cols="30" rows="3" id="textarea3"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#E1E1E1" class="texto1"> 
            <td class="texto1"> <div align="right">lo que nunca debe hacer<br>
                (principios y/o c&oacute;digos<br>
                compartidos en el lugar de trabajo)</div></td>
            <td class="texto1"> <textarea name="nuncahacer" cols="30" rows="3" id="textarea4"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr class="texto1"> 
            <td class="texto1"><div align="right">plan de capacitaci&oacute;n<br>
                (explicarlo si posee)</div></td>
            <td class="texto1"><textarea name="plancapacitacion" cols="30" rows="3" id="textarea5"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#E1E1E1" class="texto1"> 
            <td class="texto1"> <div align="right">plan de carrera<br>
                (ascensos, si posee)</div></td>
            <td class="texto1"> <textarea name="plancarrera" cols="30" rows="3" id="textarea6"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr class="texto1"> 
            <td class="texto1"><div align="right">habilidades (destrezas)</div></td>
            <td class="texto1"><textarea name="habilidades" cols="30" rows="3" id="textarea7"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr bgcolor="#E1E1E1" class="texto1"> 
            <td class="texto1"> <div align="right">actitudes personales</div></td>
            <td class="texto1"> <textarea name="actitudes" cols="30" rows="3" id="textarea8"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr class="texto1"> 
            <td class="texto1"><div align="right">otra informaci&oacute;n</div></td>
            <td class="texto1"><textarea name="otrainf" cols="30" rows="3" id="textarea9"></textarea>
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="submit" value="siguiente &gt;&gt;"></td>
          </tr>
        </table>
      </form>
</td>
  </tr>
</table>
</body>
</html>
