<br>
<form action="index.php" method="post" onsubmit="" class="menuBody" id="formSeguir">
 	<script language="JavaScript" src="lib.js"></script>

   <br>
	<h3>Datos del Problema</h3>
	<div style="border : thin solid Gray; 
	margin-left : 5%; margin-right : 5%;">
	
	 <label for="name">&nbsp;&nbsp;Tipo de Reporte:&nbsp;</label>
	<br> 
	<input type="radio" name="radio1" id="radio11" checked>Reporte 
	<br>
	<input type="radio" name="radio1" id="radio12">Consulta
	<br>
	<br>
	<label for="pass">&nbsp;&nbsp;Descripcion del Problema:&nbsp;</label>
	&nbsp;&nbsp;
	
  <textarea type="Text" name="descProb" id="descProb"  size="50">
	</textarea>
	<br>
	<br>&nbsp;&nbsp;Aplicacion en la que se origino
	<br>
	<select name="aplicaciones" id="apli">
    <?php
    
    $algo = mySQLConsulta("select descripcion from aplicaciones");
	echo("<option>$algo[0]</option>");
		
	echo("<option>otro</option>");
	?>
	</select>
<!--	<input type="radio" name="radio2" id="radio21" checked onclick="ocultarText()">Open Office
	<br>
	<input type="radio" name="radio2" id="radio22" onclick="ocultarText()">XXX
	<br>
	<input type="radio" name="radio2" id="radio23" onclick="ocultarText()">YYY
	<br>
	<input type="radio" name="radio2" id="radio24" onclick="ocultarText()">ZZZ
	<br>
	<input type="radio" name="radio2" id="radio25"  onclick="mostrarText()">&nbsp;Otro -->
	<br>
  &nbsp;&nbsp;&nbsp;<input type="Text" name="descApli" id="descApli"  size="50"  style="visibility : hidden;" value="Ingrese aqui la Aplicacion que causo el error">
	<br>
	<br>
	
  </div> 
	<br>
	<br>
	 <center> 
   <a href="index.php?op=nuevaConsulta"><img src="./imagenes/atras.gif"></a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  
  	<input type="submit" name="datosMaquina" value="Terminado">
  	&nbsp;&nbsp;&nbsp;
  	<input type="reset" name="Borrar" value="Borrar">
  </center>
<br>
<br>	
 </form>



