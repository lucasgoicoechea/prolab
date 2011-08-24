<?php
	ini_set("include_path", "/var/vdomains/prolab.unlp.edu.ar/vhosts/www/htdocs/includes/" . PATH_SEPARATOR . ini_get("include_path"));

	//require_once "DB.php";
	include("conexion.php");
	
	require_once 'HTML/Table.php';

	session_start();
	if(!isset($_SESSION['usr_empresa'])){
		echo "<script>window.location='index.php?op=AdminEmpresas/index';</script>";
	}
	
	//******************ARMAMOS EL ENCABEZADO DE LA PAGINA***********************
	
	echo "<html><head><title>Postulados de su oferta</title><link rel='stylesheet' href='AdminEmpresas/estilos/estilos.css' type='text/css'></head><body class='body'>";
	echo " <div class='titulo'>Preseleccionados</div>	<DIV class='menuB'>	<BR>";
	?>
	<input class='boton' type= 'submit' name='salir' value='Volver' type='button' onclick='window.location="index.php?op=AdminEmpresas/viewOfertas.php"'/>
	<BR/><BR/>
	<?php
	/*MOSTRAMOS LA OFERTA LABORAL*/	
	$oferta=$_GET["id"];
	$query ="SELECT eo.*, e.nombrecomercial FROM empresas_ofertas eo, empresas e ";
	$query .="WHERE eo.id = '".$oferta."' and e.id=eo.id_empresa";
	$result =  $conexionDB->query($query);
	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	$query ="select desc_tipo_oferta from tipo_oferta where id_tipo_oferta='".$row["tipoOf"]."'";
	$result =  $conexionDB->query($query);

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
   /*if($row["muestraPostulantes"]!=0){
        $query ="SELECT DISTINCT pr.idUsuario,ur.apellido,ur.nombre,ur.telefono, ur.email, ";
    $query .=" ur.celular, ur.fecha_nacimiento FROM postulaciones pr, usuarios ur";
	$query .=" WHERE pr.idO = '".$oferta."'";
	$query .=" and ur.id=pr.idU ";
	$query .="AND  (pr.activo = 'y'";
	$query .=" OR pr.activo = '')";
	$query .=" ORDER BY ur.apellido,ur.nombre";
    $postulados =  $conexionDB->query($query);
	$aux=$postulados;
	$nrow = $aux -> numRows();
 
    echo ("<table class='tableGestorUser' >");
	echo ("<div class='header'>Cantidad de postulados: $nrow</div>");
	echo "<div class='element'>Haga click en Apellido o Nombres para ver CV</div>";
	echo ("<TR>");
	echo ("<th>   APELLIDO    </th>");
	echo ("<th>   NOMBRES     </th>");
	echo ("<th>   TELEFONO    </th>");
	echo ("<th>   MAIL      </th>");
	echo ("<th>  CELULAR  </th>");
	echo ("<th>FECHA NACIMIENTO(edad)</th>");
	echo ("</TR>");
    while ($rowPres = $postulados -> fetchRow(DB_FETCHMODE_ORDERED)){
     	echo ("<TR>");
		echo ("<TD>");
	    echo("<a target='_blank' href='./AdminEmpresas/viewPostulado.php?id=".$oferta."&id_usuario=".$rowPres[0]."'>".$rowPres[1]."</a>  ");
	    echo ("</TD>");
	    echo ("<TD>");
	    echo("<a target='_blank' href='./AdminEmpresas/viewPostulado.php?id=".$oferta."&id_usuario=".$rowPres[0]."'>".$rowPres[2]."</a>  ");
	    echo ("</TD>");
	    echo ("<TD>");
	      echo ($rowPres[3]);
	    echo ("</TD>");
	    echo ("<TD>");
	      echo ($rowPres[4]);
	    echo ("</TD>");
	    echo ("<TD>");
	      echo ($rowPres[5]);
	    echo ("</TD>");
	    echo ("<TD>");
	    $anios = calcularEdad($rowPres[6]);
	      echo ($rowPres[6]."(".$anios.")");
	    echo ("</TD>");	    
		echo ("</TR>");
		}
	echo ("</table>");
	}*/
//*************************PRESELECCIONADOS****************************
	$query ="SELECT count(DISTINCT idUsuario) as cant FROM preseleccionados ";
	$query .="WHERE idOferta = '".$oferta."'";
	$query .=" ORDER BY idUsuario";
	$result =  $conexionDB->query($query);
	$rowCount =  $result -> fetchRow(DB_FETCHMODE_ASSOC);
	echo ("<table class='tableGestorUser' >");
	echo ("<div class='header'>Pre-seleccionados: ".$rowCount['cant']."</div>");
		echo "<div class='element'>Haga click en Apellido o Nombres para ver CV</div>";
	echo ("<TR>");
	echo ("<th>   APELLIDO    </th>");
	echo ("<th>   NOMBRES     </th>");
	echo ("<th>   TELEFONO    </th>");
	echo ("<th>   MAIL      </th>");
	echo ("<th>  CELULAR  </th>");
	echo ("<th>FECHA NACIMIENTO(edad)</th>");
	echo ("</TR>");
    $query ="SELECT DISTINCT pr.idUsuario,ur.apellido,ur.nombre,ur.telefono, ur.email, ";
    $query .=" ur.celular, ur.fecha_nacimiento FROM preseleccionados pr, usuarios ur";
	$query .=" WHERE pr.idOferta = '".$oferta."'";
	$query .=" and ur.id=pr.idUsuario ";
	$query .=" ORDER BY ur.apellido,ur.nombre";
	$resultad =  $conexionDB->query($query);
	while ($rowPres = $resultad -> fetchRow(DB_FETCHMODE_ORDERED)){
		echo ("<TR>");
		echo ("<TD>");
	    echo("<a target='_blank' href='./AdminEmpresas/viewPostulado.php?id=".$oferta."&id_usuario=".$rowPres[0]."'>".$rowPres[1]."</a>  ");
	    echo ("</TD>");
	    echo ("<TD>");
	    echo("<a target='_blank' href='./AdminEmpresas/viewPostulado.php?id=".$oferta."&id_usuario=".$rowPres[0]."'>".$rowPres[2]."</a>  ");
	    echo ("</TD>");
	    echo ("<TD>");
	      echo ($rowPres[3]);
	    echo ("</TD>");
	    echo ("<TD>");
	      echo ($rowPres[4]);
	    echo ("</TD>");
	    echo ("<TD>");
	      echo ($rowPres[5]);
	    echo ("</TD>");
	    echo ("<TD>");
	    $anios = calcularEdad($rowPres[6]);
	      echo ($rowPres[6]."(".$anios.")");
	    echo ("</TD>");	    
		echo ("</TR>");
    }
    echo ("</table>");
	

	//*************************************************************************

	if(isset($_GET['id_usuario'])){

	$query ="SELECT idU FROM postulaciones ";
	$query .="WHERE idO = '".$oferta."' ";
	$query .="AND (activo = 'y'";
	$query .="OR activo = '') AND idU=".$_GET['id_usuario'];
	$query .=" ORDER BY id";
	$result =  $conexionDB->query($query);
	$aux=$result;

	while ($row1 = $aux -> fetchRow(DB_FETCHMODE_ASSOC)){
	
	$idUsuario = $_GET["id_usuario"];

	//setear si esta pre-seleccionado para mostrar los datos personales
	
	$query ="SELECT * FROM preseleccionados ";
	$query .="WHERE idOferta = '".$oferta."'";
	$query .=" AND idUsuario = '".$idUsuario."'";
	$result =  $conexionDB->query($query);

	$ok = $result -> numRows();


	//*-*-*-*-*-*-Mostramos el CV de cada postulado*-*-*-*-*-*-
	
	
	//Si es preseleccionado mostramos todo**************************
	if ($ok){
	//********************DATOS PERSONALES**************************
	$query ="SELECT * FROM usuarios ";
	$query .="WHERE id = '".$idUsuario."'";
	$result =  $conexionDB->query($query);

	
	$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
    echo "<BR>";
	echo ("<div class='header'>Datos del Pre-Seleccionado: ".$row["apellido"].", ".$row["nombre"]." </div>");
	echo "<BR>";
	
	$usuario= $row["usuario"];
	echo ("<a name=$idUsuario></a>");
	echo ("<div class='estudiante'>Postulante: ".$idUsuario."</div>");
	
	
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

	$anios = calcularEdad($row["fecha_nacimiento"]);
	list($anonaz,$mesnaz,$dianaz) = explode("-",$row["fecha_nacimiento"]);
	$fecha_nac = $dianaz." de ". $mesnaz." de ". $anonaz." (".$anios." anos)";
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
	if(($row["localidad"])=="" && $row["id_ciudad"]!=0){
			$query ="SELECT loc.d_descripcion as ciudad, par.d_descripcion as partido, prov.d_descripcion as provincia FROM com_localidad loc inner join com_partido par on (loc.c_id_partido=par.c_id) inner join com_provincia prov on  (prov.c_id=par.c_id_provincia) where loc.c_id=".$row["id_ciudad"];
			//echo $query;
			$result =  $conexionDB->query($query);
			$ciudad = $result -> fetchRow(DB_FETCHMODE_ASSOC);
			$data[1][] = $ciudad["ciudad"];
			$data[1][] = $row["cp"];
			$data[1][] = $ciudad["provincia"];
		}else{
			$data[1][] = $row["localidad"]."lallalala";
			$data[1][] = $row["cp"];
			$data[1][] = $row["provincia"];
		}
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
	if($row["id_estado_civil"]!=null && $row["id_estado_civil"]!=0){//usuario nuevo
			$query ="SELECT descripcion FROM estadocivil where id=".$row["id_estado_civil"];
			//echo $query;
			$result =  $conexionDB->query($query);
			$e_civil = $result -> fetchRow(DB_FETCHMODE_ASSOC);
			$data[1][] = $e_civil["descripcion"];
	}else{
			$data[1][] = $row["estadocivil"];
	}
	$data[1][] = $row["canthijo"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	//$table -> setCaption('Contacto','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();


	}else{
		//Si NO s preseleccionado **************************
/********************************/

	
	$anios = calcularEdad($row["fecha_nacimiento"]);
	list($anonaz,$mesnaz,$dianaz) = explode("-",$row["fecha_nacimiento"]);
	$fecha_nac = $dianaz." de ". $mesnaz." de ". $anonaz." (".$anios." anos)";
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
	
	$data[0][] = "Localidad";
	$data[0][] = "Codigo Postal";
	$data[0][] = "Provincia";
	if(($row["localidad"])=="" && $row["id_ciudad"]!=0){
			$query ="SELECT loc.d_descripcion as ciudad, par.d_descripcion as partido, prov.d_descripcion as provincia FROM com_localidad loc inner join com_partido par on (loc.c_id_partido=par.c_id) inner join com_provincia prov on  (prov.c_id=par.c_id_provincia) where loc.c_id=".$row["id_ciudad"];
			//echo $query;
			$result =  $conexionDB->query($query);
			$ciudad = $result -> fetchRow(DB_FETCHMODE_ASSOC);
			$data[1][] = $ciudad["ciudad"];
			$data[1][] = $row["cp"];
			$data[1][] = $ciudad["provincia"];
		}else{
			$data[1][] = $row["localidad"];
			$data[1][] = $row["cp"];
			$data[1][] = $row["provincia"];
		}
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	//$table -> setCaption('Domicilio','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

/********************************/
	unset($data);
	$data[0][] = "Estado civil";
	$data[0][] = "Cantidad de hijos";
	if($row["id_estado_civil"]!=null && $row["id_estado_civil"]!=0){//usuario nuevo
			$query ="SELECT descripcion FROM estadocivil where id=".$row["id_estado_civil"];
			//echo $query;
			$result =  $conexionDB->query($query);
			$e_civil = $result -> fetchRow(DB_FETCHMODE_ASSOC);
			$data[1][] = $e_civil["descripcion"];
	}else{
			$data[1][] = $row["estadocivil"];
	}
	$data[1][] = $row["canthijo"];
	$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
	//$table -> setCaption('Contacto','class=header');
	$table->addRow($data[0],null,'TH');
	$table->addRow($data[1]);
	echo $table->toHTML();

	}
	//COMUN PARA POSTULANTES Y PRESELECCIONADOS
	
	//********************ESTUDIOS UNIVERSITARIOS********************************************************/
		$query ="SELECT * FROM usuarios_estudios ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ";
		$query .="AND nivel = 'universitario'";
		//echo $query;
		$result =  $conexionDB->query($query);
		if ($ok = $result -> numRows()){

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
			

	//****************************************************************************************************/
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
		}else{//estudio de usuarios nuevos
			$query ="SELECT ue.id, en.descripcion as nivel, i.descripcion as institucion, t.descripcion as titulo, ec.descripcion as estado, ga.descripcion as avance FROM usuarios_estudios ue inner join estudios_nivel en on (ue.id_nivel = en.id) inner join instituciones i on (i.id=ue.id_institucion) inner join titulos t on (t.id=ue.id_titulo) inner join estado_carrera ec on (ec.id=ue.id_estado_carrera) left outer join grado_avance_carrera ga on (ga.id=ue.id_grado_avance) ";
			$query .="WHERE id_usuario = ".$idUsuario;
			//echo $query;

			$result =  $conexionDB->query($query);
			unset($data);
			$data[0][] = "Nivel";
			$data[0][] = "Institucion";
			$data[0][] = "Titulo";
			$data[0][] = "Estado";
			$data[0][] = "Avance";
			$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
			$table -> setCaption('Estudios','class=header');
			$table->addRow($data[0],null,'TH');
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				unset($data);				
				$data[] = $row["nivel"];
				$data[] = $row["titulo"];	
				$data[] = $row["institucion"];  
				$data[] = $row["estado"];  
				$data[] = $row["avance"];  				
				$table->addRow($data);
			}
			echo $table->toHTML();			
		}
	//********************OTROS ESTUDIOS******************************************************************/
		$query ="SELECT * FROM usuarios_estudios ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ";
		$query .="AND nivel != 'universitario'";
					$result =  $conexionDB->query($query);

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
		
	//********************IDIOMA**************************************************************************/
		//sacamos los idiomas del usuario

		$query ="SELECT * FROM usuarios_idiomas ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ";
					$result =  $conexionDB->query($query);
		if($ok = $result -> numRows()){
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
		}else{//idioma usuario nuevo
			$query = "SELECT ui.id, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_idiomas ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_idioma ii on (ii.id=ui.id_item) where ui.id_usuario=".$idUsuario." order by ii.id";	
			$result =  $conexionDB->query($query);				
			unset($data);
			$data[0][] = "Idioma";
			$data[0][] = "Nivel";
			$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
			$table -> setCaption('Idioma','class=header');
			$table->addRow($data[0],null,'TH');
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				unset($data);
				$data[] = $row["item"];
				$data[] = $row["nivel"];
				$table->addRow($data);
			}
			echo $table->toHTML();
		}
	//********************INFORMATICA******************************************************************/

		$query ="SELECT * FROM usuarios_informatica ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ";
					$result =  $conexionDB->query($query);
		if($ok = $result -> numRows()){
			unset($data);
			$data[0][] = "Conocimiento";
			$data[0][] = "Nivel";
			$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
			$table -> setCaption('Inform&aacute;tica','class=header');
			$table->addRow($data[0],null,'TH');
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				unset($data);
				$data[] = $row["conocimiento"];
				$data[] = $row["nivel"];
				$table->addRow($data);
				}
			echo $table->toHTML();
		}else{
			$query = "SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_informatica ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_informatica ii on (ii.id=ui.id_item) where ui.id_usuario=".$idUsuario." order by ii.id";		
						$result =  $conexionDB->query($query);				
			unset($data);
			$data[0][] = "Conocimiento";
			$data[0][] = "Nivel";
			$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
			$table -> setCaption('Inform&aacute;tica','class=header');
			$table->addRow($data[0],null,'TH');
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				unset($data);
				$data[] = $row["item"];
				$data[] = $row["nivel"];
				$table->addRow($data);
			}
			echo $table->toHTML();
		}
	//********************CURSOS*************************************************************************/

		$query ="SELECT * FROM usuarios_cursos ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ";
					$result =  $conexionDB->query($query);
		if($ok = $result -> numRows()){
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
		}else{
			$query = "SELECT uc.*, cr.descripcion as rubro_desc, cd.descripcion as duracion_medida FROM usuarios_cursos uc inner join cursos_rubros cr on (uc.id_rubro = cr.id) inner join cursos_duracion cd on (cd.id=uc.id_unidad_duracion)  WHERE uc.id_usuario=".$idUsuario;	
						$result =  $conexionDB->query($query);
			unset($data);
			$data[0][] = "Rubro";
			$data[0][] = "Descripci&oacute;n";
			$data[0][] = "Duracion";
			$data[0][] = "Año";
			$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
			$table -> setCaption('Cursos','class=header');
			$table->addRow($data[0],null,'TH');
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				unset($data);
				$data[] = $row["rubro_desc"];
				$data[] = $row["curso"];
				$data[] = $row["duracion"]." ".$row["duracion_medida"];
				$data[] = $row["anio"];
				$table->addRow($data);
				}
			echo $table->toHTML();		
		}

	//********************DISPONIBILIDAD***************************************************************/
		function bool_palabra($valor){
			if($valor){
				return "Si";
			}else{
				return "No";
			}
		}
		$query ="SELECT * FROM usuarios_disponibilidad ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ";
					$result =  $conexionDB->query($query);
		if($ok = $result -> numRows()){	
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
		}else{
			$query = "SELECT ui.*, reg.descripcion as registro, mov.descripcion as movilidad FROM usuarios_disponibilidad ui inner join registro_conducir reg on (reg.id=ui.id_registro) inner join movilidad mov on (mov.id = ui.id_registro) WHERE id_usuario=".$idUsuario;	
						$result =  $conexionDB->query($query);
			$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);
			unset($data);
			$data[0][] = "Full (Diurno)";
			$data[0][] = "Full (Nocturno)";
			$data[0][] = "Part (Mañana)";
			$data[0][] = "Part (Tarde)";
			$data[0][] = "Part (Noche)";
			$data[0][] = "Free Lance";
			$data[0][] = "Viaja a Otro Pais";
			$data[0][] = "Viaja a Otra Provincia";
			$data[0][] = "Movilidad";
			$data[0][] = "Registro";
			$data[1][] = bool_palabra($row["diurno"]);
			$data[1][] = bool_palabra($row["nocturno"]);
			$data[1][] = bool_palabra($row["solo_manana"]);
			$data[1][] = bool_palabra($row["solo_tarde"]);
			$data[1][] = bool_palabra($row["solo_noche"]);
			$data[1][] = bool_palabra($row["free_lance"]);
			$data[1][] = bool_palabra($row["viaja_pais"]);
			$data[1][] = bool_palabra($row["viaja_provincia"]);
			$data[1][] = bool_palabra($row["movilidad"]);
			$data[1][] = bool_palabra($row["registro"]);
			$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
			$table -> setCaption('Disponibilidad','class=header');
			$table->addRow($data[0],null,'TH');
			$table->addRow($data[1]);
			echo $table->toHTML();
		}

  

	//************DISCAPACIDAD**************************************************************************/

		$query ="SELECT * FROM usuarios_discapacidad ";
		$query .="WHERE usuario = '".$usuario."'";
					$result =  $conexionDB->query($query);

		$row = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		if ($row["discapacidad"]=='si')	{
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

	//********************OBJETIVOS********************************************************************/
	
		$query ="SELECT * FROM usuarios_objetivos ";
		$query .="WHERE usuario = '".$usuario."'";
					$result =  $conexionDB->query($query);
		if($ok = $result -> numRows()){		
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
		}

	//********************EXPERIENCIA LABORAL**********************************************************/

		$query ="SELECT * FROM usuarios_experiencia ";
		$query .="WHERE usuario = '".$usuario."' and id_usuario is null ORDER BY ano_ingreso DESC, mes_ingreso DESC ";
					$result =  $conexionDB->query($query);

		if($ok = $result -> numRows()){	

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

		/****************************************************************************************************/
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

		/*****************************************************************************************************/
				$ingreso = $row["mes_ingreso"]." de ". $row["ano_ingreso"];
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
			
				$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
				$table->addRow($data[0],null,'TH');
				$table->addRow($data[1]);
				echo $table->toHTML();

		/******************************************************************************************************/
				unset($data);
				$data[0][] = "Observaciones";
				$data[1][] = $row["observaciones"];

				$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
				$table->addRow($data[0],null,'TH');
				$table->addRow($data[1]);
				
				echo $table->toHTML();
			}
		}else{
				$query ="SELECT ue.*, re.descripcion as rubro_desc, ce.descripcion as categoria FROM usuarios_experiencia ue inner join rubro_empresa re on (re.id=ue.id_rubro)  inner join categoria_empresa ce on (ce.id=re.id_categoria) WHERE ue.id_usuario=".$idUsuario;
							$result =  $conexionDB->query($query);

				while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
					unset($data);
					$data[0][] = "Empresa/Institucion";
					$data[0][] = "Categoria";
					$data[0][] = "Rubro";
					$data[0][] = "Fecha de Incio";
					$data[0][] = "Fecha de Fin";
					$data[1][] = $row["empresa"];
					$data[1][] = $row["rubro_desc"];
					$data[1][] = $row["categoria"];
					$data[1][] = $row["mes_ingreso"]."/".$row["ano_ingreso"];
					$data[1][] = $row["mes_egreso"]."/".$row["ano_egreso"];

					$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
					$table -> setCaption('Experiencia laboral','class=header');
					$table->addRow($data[0],null,'TH');
					$table->addRow($data[1]);
					echo $table->toHTML();

			/****************************************************************************************************/
					unset($data);
					$data[0][] = "Puesto ocupado";
					$data[0][] = "Descripci&oacute;n de tareas";				
					$data[1][] = $row["puesto"];
					$data[1][] = $row["responsabilidades"];
					
					$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
					$table->addRow($data[0],null,'TH');
					$table->addRow($data[1]);
					echo $table->toHTML();

			/*****************************************************************************************************/
					
					unset($data);	 				
					$data[0][] = "Personas a cargo";
					$data[0][] = "Logros Obtenidos";	
					$data[1][] = $row["pers_cargo"];
					$data[1][] = $row["logros"];
				
					$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
					$table->addRow($data[0],null,'TH');
					$table->addRow($data[1]);
					echo $table->toHTML();

			/******************************************************************************************************/
					unset($data);
					$data[0][] = "Comentarios";
					$data[1][] = $row["observaciones"];

					$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'100%'));
					$table->addRow($data[0],null,'TH');
					$table->addRow($data[1]);
					
					echo $table->toHTML();

				}
	}
	
	}

	}else{
		//echo "<div class='element'>Haga click en Apellido o Nombres para ver CV</div>";		
	}
	echo "<BR>";echo "<BR>";
	echo "<div align='center'>";
	?>
	<input class='boton' type= 'submit' name='salir' value='Volver' type='button' onclick='window.location="index.php?op=AdminEmpresas/viewOfertas.php"'/><BR><BR>
	
	</div>
	</div></body></html>