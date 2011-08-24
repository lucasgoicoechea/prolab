<?php
	include "validar_acceso.php";


	require_once "DB.php";
	require_once 'HTML/Table.php';

	session_start();


	$usuario=$_SESSION["usuario"];

	//veo si tiene estudios universitarios!!!!

	$query ="SELECT * FROM usuarios_estudios ";
	$query .="WHERE usuario = '".$usuario."' ";
	$query .="AND nivel = 'universitario'";
	include("consultar.php");

	if (!$ok = $result -> numRows())
		$tieneEstudios = "<FONT size='2' face='Verdana, Arial, Helvetica, sans-serif' COLOR='red'><BR><BR><B> ¡No tenes estudios universitarios cargados!</B></FONT>";


	//SE LEVANTAN LOS DATOS DEL USUARIO
	$query ="SELECT * FROM usuarios ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");

	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
		
	//******************ARMAMOS EL ENCABEZADO DE LA PAGINA***********************
	
	echo "<html><head><TITLE>PROLAB - Ingreso/modificación de CV</TITLE><link rel='stylesheet' href='estilos/myCV.css' type='text/css'></head>";
	?>
	<!--google analytic-->
	<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
	</script>
	<script type="text/javascript">
		_uacct = "UA-4405497-1";
		urchinTracker();
	</script>
	<?php
	echo "<body class='body'>";
	echo ("<BR><table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<FONT size='2' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#333333'><B>Visualización de tu CV  --");
	echo ("Tu condición es ".$row["condicion"]);
	echo("<BR><BR> Aquí podras actualizar y editar tu CV</B> </FONT>");

	echo $tieneEstudios;
	

	echo("</table><BR>");



	
	echo ("<BR><table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");

	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='BGCOLOR' value=''>  <param name='movie' value='icons/estudio.swf'>  <param name='quality' value='high'>  <embed src='icons/estudio.swf' quality='high'pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");

	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='BGCOLOR' value=''>  <param name='movie' value='icons/idioma.swf'>  <param name='quality' value='high'>  <embed src='icons/idioma.swf' quality='high' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");

	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='BGCOLOR' value=''>  <param name='movie' value='icons/informatica.swf'>  <param name='quality' value='high'>  <embed src='icons/informatica.swf' quality='high'pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");


	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='BGCOLOR' value=''>  <param name='movie' value='icons/curso.swf'>  <param name='quality' value='high'>  <embed src='icons/curso.swf' quality='high' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");

	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='BGCOLOR' value=''>  <param name='movie' value='icons/laboral.swf'>  <param name='quality' value='high'>  <embed src='icons/laboral.swf' quality='high' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");
	 
	
	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='movie' value='icons/salir.swf'>  <param name='quality' value='high'>  <param name='base' value='.'>  <embed src='icons/salir.swf' base='.'  quality='high' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");

	echo("</table><BR>");

/*
	echo ("<BR><table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='logout.php' TITLE='Salir'>Salir <IMG SRC='icons/edit.png' border='0'></A>");
	echo("</table><BR>");
*/
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='modDatosPersonales.php' TITLE='Modificar datos personales, diponibilidad y objetivos'>Modificar datos personales, diponibilidad y objetivos&nbsp; <IMG SRC='icons/edit.png' border='0'></A>");
	echo ("&nbsp;&nbsp;&nbsp;<A HREF='modClaveAcceso.php' TITLE='Modificar Clave de Acceso al Sistema'>Modificar Clave de Acceso al Sistema&nbsp; <IMG SRC='icons/edit.png' border='0'></A>");
	echo("</table>");

	$hrAttrs = array("width" => "125","align" => "center",);
	echo ("<CENTER>");
	//********************DATOS PERSONALES**************************
	
	unset($data);
	$data[0][] = "Apellido";
	$data[0][] = "Nombre";
	$data[0][] = "Sexo";
	$data[0][] = "DNI";
	$data[1][] = $row["apellido"];
	$data[1][] = $row["nombre"];
	$data[1][] = $row["sexo"];
	$data[1][] = $row["dni"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Datos personales','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/

	$fecha_nac = $row["dia"]." / ". $row["mes"]." / ". $row["ano"];
	unset($data);
	$data[0][] = "Fecha de Nacimiento";
	$data[0][] = "Lugar de nacimiento";
	$anios = calcularEdad($row["fecha_nacimiento"]);
	$data[1][] = $fecha_nac." (".$anios." años)";
	$data[1][] = $row["lnacimiento"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Dirección";
	$data[0][] = "Localidad";
	$data[0][] = "Código Postal";
	$data[0][] = "Provincia";
	$data[1][] = $row["domicilio"];
	$data[1][] = $row["localidad"];
	$data[1][] = $row["cp"];
	$data[1][] = $row["provincia"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	//$table -> setCaption('Domicilio','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Teléfono";
	$data[0][] = "Celular";
	$data[0][] = "E-mail";
	$data[1][] = $row["telefono"];
	$data[1][] = $row["celular"];
	$data[1][] = $row["email"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	//$table -> setCaption('Contacto','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Estado civil";
	$data[0][] = "Cantidad de hijos";
	$data[1][] = $row["estadocivil"];
	$data[1][] = $row["canthijo"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	//$table -> setCaption('Contacto','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();


//********************DISPONIBILIDAD**************************

	

	$query ="SELECT * FROM usuarios_disponibilidad ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
		
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	unset($data);
	$data[0][] = "Horario";
	$data[0][] = "Dispuesto a viajar";
	$data[0][] = "Se radicaría en otra ciudad";
	$data[0][] = "Se radicaría en otro pais";
	$data[0][] = "Remuneración";
	$data[0][] = "Comentarios";
	$data[1][] = $row["horario"];
	$data[1][] = $row["viajar"];
	$data[1][] = $row["otra_ciudad"];
	$data[1][] = $row["otro_pais"];
	$data[1][] = $row["remuneracion"];
	$data[1][] = $row["comentarios"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Disponibilidad','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();



	/************DISCAPACIDAD*******************/

	$query ="SELECT * FROM usuarios_discapacidad ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");

	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
	if ($row["discapacidad"]=='si')
		{
	unset($data);
	$data[0][] = "Presenta discapacidad";
	$data[0][] = "Certificada";
	$data[0][] = "Tipo de discapacidad";
	$data[1][] = $row["discapacidad"];
	$data[1][] = $row["certificada"];
	$data[1][] = $row["tipo"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Discapacidad','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();
		}
	}

	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<BR><A HREF='modDatosPersonales.php' TITLE='Modificar datos personales, diponibilidad y objetivos'><FONT COLOR='red'>Es importante que completes tus objetivos</FONT> &nbsp; <IMG SRC='icons/edit.png' border='0'></A>");
	echo("</table>");

	
	//********************OBJETIVOS**************************
	$query ="SELECT * FROM usuarios_objetivos ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
		
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	unset($data);
	$data[0][] = "Objetivos personales";
	$data[0][] = "Objetivos laborales";
	$data[0][] = "Objetivos profesionales";
	$data[1][] = $row["oPersonales"];
	$data[1][] = $row["oLaborales"];
	$data[1][] = $row["oProfesionales"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Objetivos','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();



	//********************ESTUDIOS UNIVERSITARIOS**************************

	echo "<BR><BR>";
	echo ("<a name=estudio></a>");


	$query ="SELECT * FROM usuarios_estudios ";
	$query .="WHERE usuario = '".$usuario."' ";
	$query .="AND nivel = 'universitario'";
	include("consultar.php");
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Estudios universitarios','class=header');	
	echo $table->toHTML();
	


	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
	echo "<BR>";
	$id = $row["id"];
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='modEstudioUNLP.php?id=$id' TITLE='Modificar estudio'>Modificar estudio&nbsp; <IMG SRC='icons/edit.png' border='0'></A>&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='delEstudio.php?id=$id' TITLE='Borrar estudio'>Borrar estudio&nbsp;<IMG SRC='icons/del.png' border='0'></A>");
	echo("</table>");

	unset($data);
	$data[0][] = "Nivel";
	$data[0][] = "Carrera";
	$data[0][] = "Facultad";
	$data[1][] = $row["nivel"];
	$data[1][] = $row["titulo"];	//carrera
	$data[1][] = $row["institucion"];  //facultad
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	if ($row["estadoactual"] != "graduado"){
	$data[0][] = "Materias aprobadas";
	$data[0][] = "Materias cursadas";
	}
	$data[0][] = "Estado";
	$data[0][] = "Ingreso";
	if ($row["estadoactual"] == "graduado")
		$data[0][] = "Egreso";
	
	$data[0][] = "Promedio";
	
	
	
	if ($row["estadoactual"] != "graduado"){
	$data[1][] = $row["materias"];
	$data[1][] = $row["materias_cursadas"];
	}
	$data[1][] = $row["estadoactual"];
	$data[1][] = $row["ingreso"];
	if ($row["estadoactual"] == "graduado")
		$data[1][] = $row["egreso"];
	$data[1][] = $row["promedio"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();
		
	}
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='addEstudioUNLP.php?usuario=$usuario' TITLE='Agregar estudio'>Agregar estudio universitario&nbsp; <IMG SRC='icons/add.png' border='0'></A>");
	echo("</table>");


//********************OTROS ESTUDIOS**************************

	echo "<BR><BR>";


	$query ="SELECT * FROM usuarios_estudios ";
	$query .="WHERE usuario = '".$usuario."' ";
	$query .="AND nivel != 'universitario'";
	include("consultar.php");
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Otros estudios  ( secundarios / terciarios / posgrados )','class=header');
	echo $table->toHTML();

	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
	echo "<BR>";
	$id = $row["id"];
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='modOtroEstudio.php?id=$id' TITLE='Modificar estudio'>Modificar estudio&nbsp; <IMG SRC='icons/edit.png' border='0'></A>&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='delEstudio.php?id=$id' TITLE='Borrar estudio'>Borrar estudio&nbsp;<IMG SRC='icons/del.png' border='0'></A>");
	echo("</table>");
	
	unset($data);
	$data[0][] = "Nivel";
	$data[0][] = "Institución";
	$data[0][] = "Estado";
	$data[0][] = "Titulo";
	if ($row["estadoactual"] == "graduado")
		$data[0][] = "Egreso";
	$data[0][] = "Promedio";

	$data[1][] = $row["nivel"];
	$data[1][] = $row["institucion"];	
	$data[1][] = $row["estadoactual"];	
	$data[1][] = $row["titulo"];  
	if ($row["estadoactual"] == "graduado")
		$data[1][] = $row["egreso"];  
	$data[1][] = $row["promedio"];  
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	}
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='addOtroEstudio.php?usuario=$usuario' TITLE='Agregar estudio'>Agregar estudio &nbsp; <IMG SRC='icons/add.png' border='0'></A>");
	echo("</table>");


//********************IDIOMA**************************

	echo "<BR><BR>";
	echo ("<a name=idioma></a>");
	
//sacamos los idiomas del usuario

	$query ="SELECT * FROM usuarios_idiomas ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	unset($data);
	$data[0][] = "Idioma";
	$data[0][] = "Nivel";
	$data[0][] = "Editar / Borrar datos";
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Idiomas','class=header');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
		$data[] = $row["idioma"];
		$data[] = $row["nivel"];

		$id = $row["id"];
		$data[] = "<A HREF='modIdioma.php?id=$id' TITLE='Modificar'>Modificar&nbsp; <IMG SRC='icons/edit.png' border='0'></A>&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='delIdioma.php?id=$id' TITLE='Borrar'>Borrar&nbsp;<IMG SRC='icons/del.png' border='0'></A>";
		
		$table->addRow($data);
		}	

	
	$table -> setColAttributes(2, $hrAttrs);

	
	echo $table->toHTML();
	

	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='addIdioma.php?usuario=$usuario' TITLE='Agregar idioma'>Agregar idioma&nbsp; <IMG SRC='icons/add.png' border='0'></A>");
	echo("</table>");
	
	

	//********************INFORMATICA**************************
	echo "<BR><BR>";
	echo ("<a name=informatica></a>");

	$query ="SELECT * FROM usuarios_informatica ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	unset($data);
	$data[0][] = "Conocimiento";
	$data[0][] = "Nivel";
	$data[0][] = "Editar / Borrar datos";
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Conocimiento informáticos','class=header');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
		$data[] = $row["conocimiento"];
		$data[] = $row["nivel"];
		
		$id = $row["id"];
		$data[] = "<A HREF='modInformatica.php?id=$id' TITLE='Modificar'>Modificar&nbsp; <IMG SRC='icons/edit.png' border='0'></A>&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='delInformatica.php?id=$id' TITLE='Borrar'>Borrar&nbsp;<IMG SRC='icons/del.png' border='0'></A>";
		$table->addRow($data);
		}
	$table -> setColAttributes(2, $hrAttrs);
	echo $table->toHTML();

	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='addInformatica.php?usuario=$usuario' TITLE='Agregar conocimiento informático'>Agregar conocimiento informático &nbsp; <IMG SRC='icons/add.png' border='0'></A>");
	echo("</table>");

//********************Cursos**************************

	
echo "<BR><BR>";
echo ("<a name=cursos></a>");

	$query ="SELECT * FROM usuarios_cursos ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	unset($data);
	$data[0][] = "Curso";
	$data[0][] = "Institución";
	$data[0][] = "Horas";
	$data[0][] = "Año";
	$data[0][] = "Editar / Borrar datos";
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Cursos, seminarios, congresos','class=header');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
		$data[] = $row["curso"];
		$data[] = $row["institucion"];
		$data[] = $row["horas"];
		$data[] = $row["anio"];

		$id = $row["id"];
		$data[] = "<A HREF='modCurso.php?id=$id' TITLE='Modificar'>Modificar&nbsp; <IMG SRC='icons/edit.png' border='0'></A>&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='delCurso.php?id=$id' TITLE='Borrar'>Borrar&nbsp;<IMG SRC='icons/del.png' border='0'></A>";
		$table->addRow($data);
		}

	$table -> setColAttributes(4, $hrAttrs);
	echo $table->toHTML();

	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='addCurso.php?usuario=$usuario' TITLE='Agregar curso, seminario, congreso'>Agregar curso, seminario, congreso &nbsp; <IMG SRC='icons/add.png' border='0'></A>");
	echo("</table>");

	
	
	//********************EXPERIENCIA LABORAL**************************
	echo "<BR><BR>";
	echo ("<a name=laboral></a>");
	
	$query ="SELECT * FROM usuarios_experiencia ";
	$query .="WHERE usuario = '".$usuario."' ORDER BY ano_ingreso DESC, mes_ingreso DESC ";
	include("consultar.php");
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table -> setCaption('Experiencia laboral','class=header');
	echo $table->toHTML();
	

	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
	echo "<BR>";
	$id = $row["id"];
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='modELaboral.php?id=$id' TITLE='Modificar esta experiencia laboral'>Modificar esta experiencia laboral&nbsp; <IMG SRC='icons/edit.png' border='0'></A>&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='delELaboral.php?id=$id' TITLE='Borrar esta experiencia laboral'>Borrar esta experiencia laboral&nbsp;<IMG SRC='icons/del.png' border='0'></A>");
	echo("</table>");
	
	unset($data);
	$data[0][] = "Forma de contratación";
	$data[0][] = "Empresa";
	$data[0][] = "Localidad";
	$data[0][] = "Area de desempeño";
	$data[1][] = $row["tipo"];
	$data[1][] = $row["empresa"];
	$data[1][] = $row["localidad"];
	$data[1][] = $row["area"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Rubro de la Empresa";
	$data[0][] = "Puesto ocupado";
	$data[0][] = "Responsabilidades";
	$data[1][] = $row["rubro"];
	$data[1][] = $row["puesto"];
	$data[1][] = $row["responsabilidades"];
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	/********************************/
	$ingreso = $row["mes_ingreso"]." de ". $row["ano_ingreso"];
	if ($row["ano_egreso"] == 0)
		$egreso =  $row["mes_egreso"];
	else 
		$egreso =  $row["mes_egreso"]." de ". $row["ano_egreso"];
	

	unset($data);
	$data[0][] = "Ingreso";
	$data[0][] = "Egreso";
	$data[0][] = "Remuneración";
	$data[0][] = "Motivo de egreso";
	$data[0][] = "Personas a cargo";
	$data[1][] = $ingreso;
	$data[1][] = $egreso;
	$data[1][] = $row["remuneracion"];
	$data[1][] = $row["motivo"];
	$data[1][] = $row["pers_cargo"];
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	/********************************/
	unset($data);
	$data[0][] = "Observaciones";
	$data[1][] = $row["observaciones"];
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();
	
	}
	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<A HREF='addELaboral.php?usuario=$usuario' TITLE='Agregar experiencia laboral'>Agregar experiencia laboral &nbsp; <IMG SRC='icons/add.png' border='0'></A>");
	echo("</table>");

	echo "<BR>";
	
	echo ("</CENTER>");

	echo ("<table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width='100' height='23'>  <param name='movie' value='icons/salir.swf'>  <param name='quality' value='high'>  <param name='base' value='.'>  <embed src='icons/salir.swf' base='.'  quality='high' pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash' width='100' height='23' ></embed> </object>");

	echo("</table><BR>");


	function calcularEdad($fechaCumpleanos){
	  //fecha actual
 
		$dia=date(j);
		$mes=date(n);
		$ano=date(Y);
 
		//fecha de nacimiento
		
    	list($anonaz,$mesnaz,$dianaz) = explode("-",$fechaCumpleanos);
	
 
		//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
 
		if (($mesnaz == $mes) && ($dianaz > $dia)) {
			$ano=($ano-1); }
 
 
		//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
 
		if ($mesnaz > $mes) {
			$ano=($ano-1);}
 
 
		//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
 
			$edad=($ano-$anonaz);
 
		return $edad;

	}
?>	