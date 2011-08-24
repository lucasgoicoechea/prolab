<h3>Datos del Usuario</h3>
	<div style="border : thin solid Gray; 
	margin-left : 3%; margin-right : 3%;">
	<br>
	 <label for="name">&nbsp;&nbsp;Nombre y apellido:&nbsp;</label>	
	 <input type="text" size="25" name="usuariox" id="usuariox" align="middle">&nbsp;(*)
	 	
	<br>
	<br>
	
  <label for="name" >&nbsp;&nbsp;Dirección de correo electrónico:&nbsp;</label>	
	<input type="text" size="25" name="mailx" id="mailx">&nbsp;(*)
 
    <br>
	<br>
	
  <label for="name" >&nbsp;&nbsp;Sector al que pertenece:&nbsp;</label>
 	
&nbsp;&nbsp;&nbsp;<select name="sectoresx" id="sector" onclick="mostrarText(10)">  
<?php 
  $qddatosaux =  $conexionDB->query("select descripcion from sector");
			 while($qddatos=  $qddatosaux->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$qddatos[0]."</OPTION>");}
			echo("<option id='other10'>otro</option></select> ");
?><input type="Text" name="aplix" id="text10"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"> 
	<br>
	<br>

  <label for="name" >&nbsp;&nbsp;Función que desempeña:&nbsp;</label>

	&nbsp;&nbsp;&nbsp;<select name="funcionx" id="funcion" onclick="mostrarText(0)">  
<?php 
  $qatosaux =  $conexionDB->query("select descripcion from funcion");
			 while($qatos=  $qatosaux->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$qatos[0]."</OPTION>");}
			echo("<option id='other0'>otro</option>	</select> ");
?><input type="Text" name="descApli" id="text0"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion">
	<br>
	<br>
		
  <label for="name">&nbsp;&nbsp;Dependencia a la que pertenece:&nbsp;</label>
	&nbsp;&nbsp;&nbsp;<select name="dependenciax" id="depen" onclick="mostrarText(1)">  
<?php 

  $dqdatosaux =  $conexionDB->query("select descripcion from dependencias");
			 while($dqdatos=  $dqdatosaux->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$dqdatos[0]."</OPTION>");}
			echo("<option id='other1'>otro</option>	</select> ");
?><input type="Text" name="descApli" id="text1"  size="25"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"><br>
	<br>
 </div>
 <br>
	<h3>Datos del Equipo</h3>
	<div style="border : thin solid Gray; margin-left : 3%; margin-right : 3%;">
	<br>
	 <label for="name">&nbsp;&nbsp;Procesador:&nbsp;</label>	
	&nbsp;&nbsp;&nbsp;<select name="procesadorx" id="proc" onclick="mostrarText(2)">  
<?php 

 
   $dtosaux =  $conexionDB->query("select descripcion from procesadores");
			 while($atos=  $dtosaux->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$atos[0]."</OPTION>");}
			echo("<option id='other2'>otro</option>	</select> ");
?><input type="Text" name="descApli" id="text2"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"><br>
	<br>
	  
  <label for="name" >&nbsp;&nbsp;Memoria:&nbsp;</label>
  
	&nbsp;&nbsp;&nbsp;<select name="memoriax" id="memo" onclick="mostrarText(3)">  
<?php 
   $qmemoria =  $conexionDB->query("select descripcion from memorias");
			 while($memoria=  $qmemoria->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$memoria[0]."</OPTION>");}
			echo("<option id='other3'>otro</option>	</select> ");
?><input type="Text" name="descApli" id="text3"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"><br>
	<br>
	  
  <label for="name" >&nbsp;&nbsp;Disco rigido:&nbsp;</label>
	&nbsp;&nbsp;&nbsp;<select name="discox" id="disco" onclick="mostrarText(4)">  
<?php 
  $qdisco =  $conexionDB->query("select descripcion from discos");
			 while($qdiscos=  $qdisco->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$qdiscos[0]."</OPTION>");}
     		echo("<option id='other4'>otro</option></select> ");
?> <input type="Text" name="descApli" id="text4"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"><br>
	<br>
	  
  <label for="name" >&nbsp;&nbsp;Monitores:&nbsp;</label>
		 
		&nbsp;&nbsp;&nbsp;<select name="monitorx" id="moni" onclick="mostrarText(5)">  
<?php 
  $qmonitor =  $conexionDB->query("select descripcion from monitores");
			 while($monitor=  $qmonitor->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$monitor[0]."</OPTION>");}
    		echo("<option id='other5'>otro</option>	</select> ");
?> <input type="Text" name="descApli" id="text5"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion">
	<br>
	<br>
	<label for="name" >&nbsp;&nbsp;Impresoras:&nbsp;</label>
		 
	&nbsp;&nbsp;&nbsp;<select name="impresorax" id="impre" onclick="mostrarText(6)">  
<?php 

  $qimpr =  $conexionDB->query("select descripcion from impresoras");
			 while($impr=  $qimpr->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$impr[0]."</OPTION>");}
     		echo("<option id='other6'>otro</option>	</select> ");
?> <input type="Text" name="descApli" id="text6"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"> <br>
	<br>
	  
  <label for="name" >&nbsp;&nbsp;Direccion IP:&nbsp;</label>
  <?php
    echo(getenv("REMOTE_ADDR"));
  ?>
 <br>
 <br>
	  
  <label for="name" >&nbsp;&nbsp;Sistema operativo:&nbsp;</label>
		&nbsp;&nbsp;&nbsp;<select name="sistoperx" id="sisop" onclick="mostrarText(7)">  
<?php 

  $qso =  $conexionDB->query("select descripcion from so");
			 while($so=  $qso->fetchRow(DB_FETCHMODE_ORDERED)){
			echo ("<OPTION onclik='ocultarText()'>".$so[0]."</OPTION>");}
  		echo("<option id='other7'>otro</option>	</select> ");
?> <input type="Text" name="so" id="text7"  size="30"  style="visibility : hidden;" value="Ingrese aqui la otra opcion"> <br>
	<br>
	  
  <label for="name" >&nbsp;&nbsp;Tipo de conexión de red:&nbsp;</label>
	<input type="text" size="25" name="redx" id="red" >
 <br>
 <br>
 
</div>