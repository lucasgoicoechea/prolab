<html>
<head>
<title>Subscripci&oacute;n de Empresas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <STYLE type="text/css">
 
   BODY {
    scrollbar-face-color:#f5f5f5;
    scrollbar-arrow-color:#828282;
    scrollbar-highlight-color:#f5f5f5;
    scrollbar-3dlight-color:#f5f5f5;
    scrollbar-shadow-color:#f5f5f5;
    scrollbar-darkshadow-color:#f5f5f5;
    scrollbar-track-color:#ffffff;
   }
  </STYLE>
<link href="../estilo1-NUEVO.css" rel="stylesheet" type="text/css">
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
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td> <table width="62" border="0" cellspacing="2" cellpadding="0">
         <tr> 
          <td width="17" bgcolor="#1d3c81">&nbsp;</td>
          <td width="17" bgcolor="#e7eff4">&nbsp;</td>
          <td width="20" bgcolor="#e7eff4">&nbsp;</td>
         </tr>
        </table>
      <span class="texto1">NUEVA EMPRESA: <strong>datos del contacto</strong> 
      &gt; datos de la empresa &gt; finalizar</span> 
      <p><span class="titulo3">Subscriba a su empresa a los servicios del prolab. 
        <br>
        </span><span class="texto1">los campos marcados con <font color="#FF0000"><strong>(*)</strong></font> 
        son obligatorios</span><span class="titulo3"></span><span class="titulo3"> 
        <br>
        </span> </p>
      <form action="datos_empresa.php" method="post" name="form1" onSubmit="MM_validateForm('usuario','','R','nombre','','R','apellido','','R','email','','RisEmail','telefono','','R','puesto','','R');return document.MM_returnValue">
        <table width="400" border="0" align="center" cellpadding="4" cellspacing="0" class="texto1">
          <tr bgcolor="#e7eff4"> 
            <td colspan="2" class="subtitulo2">DATOS DEL CONTACTO</td>
          </tr>
          <tr> 
            <td width="177"><div align="right">nombre de usuario<br>
                <span class="texto5">(de 4 a 8 car&aacute;cteres sin espacios)</span></div></td>
            <td width="207"><input name="usuario" type="text" id="usuario" value="">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">nombre<br>
                <span class="texto5">(como figura en su DNI)</span></div></td>
            <td><input name="nombre" type="text" id="nombre" value="">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">apellido<br>
                <span class="texto5">(como figura en su DNI)</span></div></td>
            <td><input name="apellido" type="text" id="apellido" value="">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">sexo</div></td>
            <td><p> 
                <label> 
                <input type="radio" name="sexo" id="sexo" value="m">
                Masculino</label>
                <label> 
                <input type="radio" name="sexo" id="sexo" value="f">
                Femenino</label>
                <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span><br>
              </p></td>
          </tr>
          <tr> 
            <td><div align="right">e-mail<br>
                <span class="texto5">(su direcci&oacute;n de correo electr&oacute;nico)</span></div></td>
            <td><input name="email" type="text" id="email" value="">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">telefono directo<br>
                <span class="texto5">(c&oacute;digo pa&iacute;s + &aacute;rea) 
                (n&uacute;mero local)</span> </div></td>
            <td><input name="telefono" type="text" id="telefono" value="">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">puesto<br>
                <span class="texto5"> (el cargo que ocupa<br>
                actualmente en la empresa)</span></div></td>
            <td><input name="puesto" type="text" id="puesto" value="">
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="submit" value="siguiente &gt;&gt;"></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
</body>
</html>
