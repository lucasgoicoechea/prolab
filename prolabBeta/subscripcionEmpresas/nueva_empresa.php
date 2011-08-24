
<link href="../estilo1.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/livevalidation.js"></script>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-4405497-1";
urchinTracker();
</script>
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td> <table width="62" border="0" cellspacing="2" cellpadding="0">
         <tr> 
          <td width="17" bgcolor="#336633">&nbsp;</td>
          <td width="17" bgcolor="#C1DCC0">&nbsp;</td>
          <td width="20" bgcolor="#C1DCC0">&nbsp;</td>
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
      <form action="index.php?op=subscripcionEmpresas/datos_empresa.php" method="post" name="form1" >
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0" class="texto1">
          <tr> 
            <td colspan="2" class="subtitulo"><u>DATOS DEL CONTACTO</u></td>
          </tr>
          <tr> 
            <td><div align="right">nombre de usuario<br>
                <span class="texto5">(de 6 a 20 car&aacute;cteres sin espacios)</span></div></td>
            <td><input name="usuario" type="text" id="user_xwy"  value="" />
              <span class="texto1"><font color="#FF0000"><strong>(*)</strong></font></span></td>
          </tr>
          <tr> 
            <td><div align="right">nombre<br>
                <span class="texto5">(como figura en su DNI)</span></div></td>
            <td><input name="nombre" type="text" id="nombre" value="" />
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
                <input type="radio" checked="true" name="sexo" id="sexo" value="m">
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

<script>

var nombre = new LiveValidation('nombre');
nombre.add( Validate.Presence );
nombre.add( Validate.Length, { maximum: 20 } );

var apellido = new LiveValidation('apellido');
apellido.add( Validate.Presence );
apellido.add( Validate.Length, { maximum: 20 } );

var email = new LiveValidation('email');
email.add( Validate.Presence );
email.add( Validate.Email );

var telefono = new LiveValidation('telefono');
telefono.add( Validate.Presence );
telefono.add( Validate.Length, { maximum: 20 } );

var puesto = new LiveValidation('puesto');
puesto.add( Validate.Presence );
puesto.add( Validate.Length, { maximum: 20 } );


var usuario = new LiveValidation('user_xwy');
usuario.add( Validate.Presence );
usuario.add( Validate.Length, { minimum: 6, maximum: 20 } );
</script>
