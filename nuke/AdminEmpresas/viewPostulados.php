<?php
	ini_set("include_path", "/var/vdomains/prolab.unlp.edu.ar/vhosts/www/htdocs/includes/" . PATH_SEPARATOR . ini_get("include_path"));

	require_once "DB.php";
	require_once 'HTML/Table.php';

//	session_start();
	
	//******************ARMAMOS EL ENCABEZADO DE LA PAGINA***********************
	
	echo "<html><head><title>Postulados de su oferta</title><link rel='stylesheet' href='estilos/estilos.css' type='text/css'></head><body class='body'>";
	echo " <div class='titulo'>Postulados</div>	<DIV class='menuB'>	<BR>";
	echo "<FORM ACTION='viewOfertas.php'><input class='boton' type= 'submit' name='salir' value='Volver' type='button' /></FORM><BR><BR>";

	/*MOSTRAMOS LA OFERTA LABORAL*/	
	$oferta=$_GET["id"];
	$query ="SELECT eo.*, e.nombrecomercial FROM empresas_ofertas eo, empresas e ";
	$query .="WHERE eo.id = '".$oferta."' and e.id=eo.id_empresa";
	include("consultar.php");
	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	$query ="select desc_tipo_oferta from tipo_oferta where id_tipo_oferta='".$row["tipoOf"]."'";
	include("consultar.php");

	$tipo_of = $result -> fetchRow(DB_FETCHMODE_ASSOC);


	unset($data);
	$data[0][] = "Fecha";
	$data[0][] = "Empresa";
	$data[0][] = "Tipo de oferta";
	$data[0][] = "Cant. Puestos";
	$data[0][] = "Busqueda";
	$data[1][] = $row["fecha"];
	$data[1][] = $row["nombrecomercial"];
	$data[1][] = $tipo_of["desc_tipo_oferta"];
	$data[1][] = $row["cant_puestos"];
	$data[1][] = $row["aviso"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Perfil de busqueda' ,'class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();


	echo "<BR>";
	
	/*Mostramos los links para acceder directamente por id*/

	$query ="SELECT idU FROM postulaciones ";
	$query .="WHERE idO = '".$oferta."' ";
	$query .="AND (activo = 'y'";
	$query .="OR activo = '')";
	$query .=" ORDER BY id";
	include("consultar.php");
	$aux=$result;
	$nrow = $result -> numRows();

	echo ("<div class='header'>Cantidad de postulados: $nrow</div>");

	while ($row2 = $aux -> fetchRow(DB_FETCHMODE_ASSOC)){
	echo ("<a href='".$_SERVER["PHP_SELF"]."?id=".$oferta."&id_usuario=".$row2["idU"]."'>".$row2["idU"]."</a>");
	echo (" - ");

	}
//*************************PRESELECCIONADOS****************************
	$query ="SELECT idUsuario FROM preseleccionados ";
	$query .="WHERE idOferta = '".$oferta."'";
	$query .=" ORDER BY idUsuario";
	include("consultar.php");
	$aux=$result;
	$nrow = $result -> numRows();
		
	echo ("<div class='header'>Pre-seleccionados: $nrow</div>");

	while ($row2 = $aux -> fetchRow(DB_FETCHMODE_ASSOC)){
	$query ="SELECT apellido, nombre FROM usuarios ";
	$query .="WHERE id = '".$row2["idUsuario"]."'";
	include("consultar.php");
	
	$aux2=$result -> fetchRow(DB_FETCHMODE_ASSOC);
	
	echo("</A><a href='".$_SERVER["PHP_SELF"]."?id=".$oferta."&id_usuario=".$row2["idUsuario"]."'>".$row2["idUsuario"]." - ".$aux2["apellido"].", ".$aux2["nombre"]."</a>  ");
	echo "<BR>";
	}

	//*************************************************************************

	echo "<BR>";
	echo ("<div class='header'>Postulados</div>");
	echo "<BR>";
	if(isset($_GET['id_usuario'])){

	$query ="SELECT idU FROM postulaciones ";
	$query .="WHERE idO = '".$oferta."' ";
	$query .="AND (activo = 'y'";
	$query .="OR activo = '') AND idU=".$_GET['id_usuario'];
	$query .=" ORDER BY id";
	include("consultar.php");
	$aux=$result;

	while ($row1 = $aux -> fetchRow(DB_FETCHMODE_ASSOC)){
	
	$idUsuario = $row1["idU"];

	//setear si esta pre-seleccionado para mostrar los datos personales
	
	$query ="SELECT * FROM preseleccionados ";
	$query .="WHERE idOferta = '".$oferta."'";
	$query .=" AND idUsuario = '".$idUsuario."'";
	include("consultar.php");

	$ok = $result -> numRows();


	//*-*-*-*-*-*-Mostramos el CV de cada postulado*-*-*-*-*-*-
	
	
	$query ="SELECT * FROM usuarios ";
	$query .="WHERE id = '".$idUsuario."'";
	include("consultar.php");

	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	$usuario= $row["usuario"];
	echo ("<a name=$idUsuario></a>");
	echo ("<div class='estudiante'>Postulante: ".$idUsuario."</div>");
	
	//Si es preseleccionado mostramos todo**************************
	if ($ok){
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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Datos personales','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/

	$fecha_nac = $row["dia"]." de ". $row["mes"]." de ". $row["ano"];
	unset($data);
	$data[0][] = "Fecha de Nacimiento";
	$data[0][] = "Lugar de nacimiento";
	$data[1][] = $fecha_nac;
	$data[1][] = $row["lnacimiento"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Dirección";
	$data[0][] = "Localidad";
	$data[0][] = "Codigo Postal";
	$data[0][] = "Provincia";
	$data[1][] = $row["domicilio"];
	$data[1][] = $row["localidad"];
	$data[1][] = $row["cp"];
	$data[1][] = $row["provincia"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	//$table -> setCaption('Contacto','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();


	}else{
		//Si NO s preseleccionado **************************
/********************************/

	$fecha_nac = $row["dia"]." de ". $row["mes"]." de ". $row["ano"];
	unset($data);
	$data[0][] = "Sexo";
	$data[0][] = "Fecha de Nacimiento";
	$data[0][] = "Lugar de nacimiento";
	$data[1][] = $row["sexo"];
	$data[1][] = $fecha_nac;
	$data[1][] = $row["lnacimiento"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	
	$data[0][] = "Localidad";
	$data[0][] = "Codigo Postal";
	$data[0][] = "Provincia";
	$data[1][] = $row["localidad"];
	$data[1][] = $row["cp"];
	$data[1][] = $row["provincia"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	//$table -> setCaption('Domicilio','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Estado civil";
	$data[0][] = "Cantidad de hijos";
	$data[1][] = $row["estadocivil"];
	$data[1][] = $row["canthijo"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	//$table -> setCaption('Contacto','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	}
	//********************ESTUDIOS UNIVERSITARIOS**************************

	$query ="SELECT * FROM usuarios_estudios ";
	$query .="WHERE usuario = '".$usuario."' ";
	$query .="AND nivel = 'universitario'";
	include("consultar.php");
	
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
	unset($data);
	$data[0][] = "Nivel";
	$data[0][] = "Carrera";
	$data[0][] = "Facultad";
	$data[1][] = $row["nivel"];
	$data[1][] = $row["titulo"];	//carrera
	$data[1][] = $row["institucion"];  //facultad
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Estudios universitarios','class=header');

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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();
		
	}
	

//********************OTROS ESTUDIOS**************************

	$query ="SELECT * FROM usuarios_estudios ";
	$query .="WHERE usuario = '".$usuario."' ";
	$query .="AND nivel != 'universitario'";
	include("consultar.php");

	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Otros estudios  (secundarios / terciarios)','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	}

//********************IDIOMA**************************

	
//sacamos los idiomas del usuario

	$query ="SELECT * FROM usuarios_idiomas ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	unset($data);
	$data[0][] = "Idioma";
	$data[0][] = "Nivel";
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Idioma','class=header');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
		$data[] = $row["idioma"];
		$data[] = $row["nivel"];
		$table->addRow($data);
		}
	echo $table->toHTML();


	//********************INFORMATICA**************************

	

	$query ="SELECT * FROM usuarios_informatica ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	unset($data);
	$data[0][] = "Conocimiento";
	$data[0][] = "Nivel";
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Informática','class=header');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
		$data[] = $row["conocimiento"];
		$data[] = $row["nivel"];
		$table->addRow($data);
		}
	echo $table->toHTML();

//********************Cursos**************************

	


	$query ="SELECT * FROM usuarios_cursos ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	unset($data);
	$data[0][] = "Curso";
	$data[0][] = "Institución";
	$data[0][] = "Horas";
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Cursos','class=header');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
		$data[] = $row["curso"];
		$data[] = $row["institución"];
		$data[] = $row["horas"];
		$table->addRow($data);
		}
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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Disponibilidad','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	/************DISCAPACIDAD*******************/

	

	$query ="SELECT * FROM usuarios_discapacidad ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");

	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	if ($row["discapacidad"]=='si')
		{
	unset($data);
	$data[0][] = "Presenta discapacidad";
	$data[0][] = "Certificada";
	$data[0][] = "Tipo de discapacidad";
	$data[1][] = $row["discapacidad"];
	$data[1][] = $row["certificada"];
	$data[1][] = $row["tipo"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Discapacidad','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();
		}

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
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Objetivos','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	//********************EXPERIENCIA LABORAL**************************

	
	$query ="SELECT * FROM usuarios_experiencia ";
	$query .="WHERE usuario = '".$usuario."'";
	include("consultar.php");
	
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){

	unset($data);
	$data[0][] = "Forma de contratación";
	$data[0][] = "Empresa";
	$data[0][] = "Localidad";
	$data[0][] = "Area de desempeño";
	$data[1][] = $row["tipo"];
	$data[1][] = $row["empresa"];
	$data[1][] = $row["localidad"];
	$data[1][] = $row["area"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table -> setCaption('Experiencia laboral','class=header');
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
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	/********************************/
	$ingreso = $row["mes_ingreso"]." de ". $row["ano_ingreso"];
	$egreso =  $row["mes_egreso"]." de ". $row["ano_egreso"];

	unset($data);
	$data[0][] = "Egreso";
	$data[0][] = "Ingreso";
	$data[0][] = "Remuneración";
	$data[0][] = "Motivo de egreso";
	$data[0][] = "Personas a cargo";
	$data[1][] = $ingreso;
	$data[1][] = $egreso;
	$data[1][] = $row["remuneracion"];
	$data[1][] = $row["motivo"];
	$data[1][] = $row["pers_cargo"];
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	/********************************/
	unset($data);
	$data[0][] = "Observaciones";
	$data[1][] = $row["observaciones"];
	
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();
	
	}
	
	}

	}else{
		echo "<div class='element'>Seleccione algun postulado</div>";		
	}
	echo "<BR>";echo "<BR>";
	echo "<div align='center'>";
	echo "<FORM ACTION='viewOfertas.php'><input class='boton' type= 'submit' name='salir' value='Volver' type='button' align='center'/></FORM>";
	echo "</div>";
	echo "</div></body></html>";
?>	