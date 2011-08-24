<?php
//*******************************************************************************//
//Permisos
	
//*******************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','myCV.php');

function _filterCapital($value) 
{
	return ucwords(strtolower($value));
}

//formulario de llenado de datos (pagina 1)
class Page_addCV extends HTML_QuickForm_Page
{
	function buildForm(){

//-----------------------------------------------------------------------------//
//Acceso a la base de datos
	require_once "DB.php";

	/************LEVANTO DATOS DE LA TABLA USUARIOS***************/
	$query ="Select * FROM usuarios WHERE ";
	$query .="usuario='".$_SESSION["usuario"]."'";

	include("consultar.php");

	$this->_formBuilt = true;
		
	$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	
	$dia = $item["dia"];
	$mes = $item["mes"];
	$ano = $item["ano"];
	
/* 	
echo $dia;
	echo $mes;
	echo $ano; 
	*/
	$fecha_nac=mktime(0,0,0,$mes,$dia,$ano);
	
	$this->setDefaults(array(
		'nombre' => $item["nombre"],
		'apellido' => $item["apellido"],
		'fecha_nacimiento' => $fecha_nac,
		'dni' => $item["dni"],
		'lnacimiento' => $item["lnacimiento"],
		'sexo' => $item["sexo"],
		'estadocivil' => $item["estadocivil"],
		'canthijo' => $item["canthijo"],
		'domicilio' => $item["domicilio"],
		'localidad' => $item["localidad"],
		'cp' => $item["cp"],
		'provincia' => $item["provincia"],
		'telefono' => $item["telefono"],
		'celular' => $item["celular"],
		'condicion' => $item["condicion"],
		'fechaNac' => $item["fecha_nacimiento"],
		'email' => $item["email"],
		'recibir_oferta' => $item["recibir_oferta"]));

/* 		$a = $this -> $fechaNac;
		echo $a; */
		/************LEVANTO DATOS DE LA TABLA USUARIOS_DISCAPACIDAD***************/
	$query ="Select * FROM usuarios_discapacidad WHERE ";
	$query .="usuario='".$_SESSION["usuario"]."'";

	include("consultar.php");

	$this->_formBuilt = true;
		
	$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$this->setDefaults(array(
		'discapacidad' => $item["discapacidad"],
		'certificada' => $item["certificada"],
		'tipo' => $item["tipo"]));


	/************LEVANTO DATOS DE LA TABLA USUARIOS_OBJETIVOS***************/
	$query ="Select * FROM usuarios_objetivos WHERE ";
	$query .="usuario='".$_SESSION["usuario"]."'";

	include("consultar.php");

	$this->_formBuilt = true;
		
	$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$this->setDefaults(array(
		'oPersonales' => $item["oPersonales"],
		'oLaborales' => $item["oLaborales"],
		'oProfesionales' => $item["oProfesionales"]));

	/************LEVANTO DATOS DE LA TABLA USUARIOS_DISPONIBILIDAD***************/
	$query ="Select * FROM usuarios_disponibilidad WHERE ";
	$query .="usuario='".$_SESSION["usuario"]."'";

	include("consultar.php");

	$this->_formBuilt = true;
		
	$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$this->setDefaults(array(
		'horario' => $item["horario"],
		'viajar' => $item["viajar"],
		'otraCiudad' => $item["otra_ciudad"],
		'otroPais' => $item["otro_pais"],
		'remuneracion' => $item["remuneracion"],
		'comentarios' => $item["comentarios"]));

	
//-----------------------------------------------------------------------------//
//Formulario

		$this->_formBuilt = true;
		$this->setDefaults(array('idUsr' => $_SESSION["condicion"],'usuario' => 'El nombre de usuario para ingresar al sistema es tu DNI'
			));

		$this -> addElement('submit', $this->getButtonName('submit') , 'Guardar cambios',array('class' => 'botonG'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));
		

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Modificar datos personales, diponibilidad y objetivos');
		$this->addElement('header', 'subtitulo', 'Datos personales');
		
		
		$this->addElement('hidden', 'idUsr');

		$this->addElement('text', 'apellido', 'Apellidos:',array('class' => 'caja'));

		$this->addElement('text', 'nombre', 'Nombres:',array('class' => 'caja'));

		$this->addElement('text', 'dni', 'DNI:',array('class' => 'caja'));

		$this->freeze('dni');

		$options1=array('Masculino'=> 'Masculino','Femenino'=> 'Femenino');
			
		$this->addElement('select', 'sexo', 'Sexo:',$options1,array ('class' => 'select'));


		$options2=array('Soltero/a'=> 'Soltero/a','Casado/a'=> 'Casado/a','Separado/a'=> 'Separado/a','Divorciado/a'=> 'Divorciado/a','Viudo/a'=> 'Viudo/a');
			
		$this->addElement('select', 'estadocivil', 'Estado civil:',$options2,array ('class' => 'select'));

		$options3=array('0'=> '0','1'=> '1','2'=> '2','3'=> '3','4'=> '4','5'=> '5 o mas');
			
		$this->addElement('select', 'canthijo', 'Cantidad de hijos:',$options3,array ('class' => 'select'));


		//$this->addElement('date', 'fechaNac', 'Fecha de nacimiento:', array('format'=>'d-F-Y','addEmptyOption'   => true, 'emptyOptionText'  => '---', 'emptyOptionValue' => 0,  'minYear'=>(date("Y") - 17), 'maxYear'=>(date("Y") - 60),'language'=>'es'),array('class'=>'select'));
		$this->addElement('date', 'fechaNac', 'Fecha de nacimiento:', array('format'=>'F-d-Y', 'minYear'=>(date("Y") - 17), 'maxYear'=>(date("Y") - 70),'language'=>'es'),array('class'=>'select'));

	
		$this->addElement('text', 'lnacimiento', 'Lugar de nacimiento:',array('class' => 'caja'));

		/************************DISCAPACIDAD**********************/

		$sino=array('no'=> 'No','si'=> 'Si');

		$condition=array('estudiante'=> 'Estudiante','graduado'=> 'Graduado');
			
		$this->addElement('select', 'discapacidad', 'Discapacidad:',$sino,array ('class' => 'select'));

		$this->addElement('select', 'certificada', '¿Esta certificada?:',$sino,array ('class' => 'select'));
		
		$this->addElement('text', 'tipo', 'Tipo de discapacidad:',array('class' => 'caja'));

		
		/************************DOMICILIO ACTUAL**********************/
		$this->addElement('header', 'subtitulo1', 'Domicilio actual');

		$this->addElement('text', 'domicilio', 'Dirección:',array('class' => 'caja'));

		$this->addElement('text', 'localidad', 'Localidad:',array('class' => 'caja'));

		$this->addElement('text', 'provincia', 'Provincia:',array('class' => 'caja'));

		$this->addElement('text', 'cp', 'Codigo postal:',array('class' => 'caja'));

		/************************DATOS DE CONTACTO**********************/

		$this->addElement('header', 'subtitulo2', 'Datos de contacto  (Ingresa tu e-mail correctamente, ofertas laborales, entrevistas y demas se comunican vía e-mail )');
				
		$this->addElement('text', 'telefono', 'Teléfono:',array('class' => 'caja'));

		$this->addElement('text', 'celular', 'Celular:',array('class' => 'caja'));

		$this->addElement('text', 'email', array('E-mail:','Solo una dirección, el mail se escribe todo en minisculas'),array('class' => 'caja'));

		$this->addElement('select', 'condicion', 'Condicion:',$condition,array ('class' => 'select'));

		$this->addElement('advcheckbox', 'recibir_oferta', 'Desea Recibir Ofertas por E-Mail', null, null, array('0', '1'));
		/************************DISPONIBILIDAD**********************/

		$this->addElement('header', 'subtitulo4', 'Disponibilidad');

		$sino=array('si'=> 'Si','no'=> 'No');
		$hora=array('full-time'=> 'Full-time','part-time'=> 'Part-time');
		
		$this->addElement('select', 'horario', 'Horario:',$hora,array ('class' => 'select'));

		$this->addElement('select', 'viajar', '¿Dispuesto a viajar?:',$sino,array ('class' => 'select'));
		$this->addElement('select', 'otraCiudad', '¿Se radicar&iacute;a en otra ciudad?:',$sino,array ('class' => 'select'));
		$this->addElement('select', 'otroPais', '¿Se radicar&iacute;a en otro país?:',$sino,array ('class' => 'select'));

		$this->addElement('text', 'remuneracion', 'Remuneración pretendida:',array('class' => 'caja'));
		
		$attrs = array("class"=>"caja", "rows"=>"5", "cols"=>"35");
		$this->addElement('textarea', 'comentarios', 'Comentarios:', $attrs);
		
		/************************OBJETIVOS**********************/
		$this->addElement('header', 'subtitulo5', 'Objetivos');
		$this->addElement('textarea', 'oPersonales', 'Objetivos personales :', $attrs);
		$this->addElement('textarea', 'oLaborales', 'Objetivos laborales:', $attrs);
		$this->addElement('textarea', 'oProfesionales', 'Objetivos profesionales (solo graduados):', $attrs);
		

				
//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación

		/**********************CAMPOS REQUERIDOS****************************/
		$this->addRule('nombre', 'Tenes que ingresar tu nombre', 'required');
		$this->addRule('apellido', 'Tenes que ingresar tu apellido', 'required');
		$this->addRule('dni', 'Tenes que ingresar tu DNI', 'required');
		$this->addRule('sexo', 'Tenes que seleccionar tu sexo', 'required');
		$this->addRule('estadocivil', 'Tenes que seleccionar tu estado civil', 'required');
		$this->addRule('canthijo', 'Tenes que seleccionar la cantidad de hijos', 'required');
		$this->addRule('condicion', 'Tenes que seleccionar tu condicion', 'required');
		$this->addRule('fechaNac', 'Tenes que ingresar tu fecha de nacimiento', 'required');
		$this->addRule('lnacimiento', 'Tenes que ingresar tu lugar de nacimiento', 'required');
		$this->addRule('domicilio', 'Tenes que ingresar tu domicilio actual', 'required');
		$this->addRule('localidad', 'Tenes que ingresar tu localidad de residencia actual', 'required');
		$this->addRule('provincia', 'Tenes que ingresar tu provincia de residencia actual', 'required');
		$this->addRule('cp', 'Tenes que ingresar el código postal', 'required');
		$this->addRule('telefono', 'Tenes que ingresar tu teléfono', 'required');
		$this->addRule('email', 'Tenes que ingresar tu e-mail', 'required');

		/******************************OTROS CHEQUEOS*********************************/

		$this->addRule('email', 'Dirección de e-mail invalida', 'email');
		$this->addRule('dni', 'Solo números sin puntos ni espacios', 'numeric');
		
	    $this->registerRule('validar_fecha', 'callback', 'validar_fecha', get_class($this));
		$this->addRule('fechaNac','La fecha que ha ingresado es incorrecta','validar_fecha');

			
//-----------------------------------------------------------------------------//
		$this->applyFilter('__ALL__', 'trim');
		$this->applyFilter('nombre', '_filterCapital');
		$this->applyFilter('apellido', '_filterCapital');
		$this->applyFilter('clave', 'strtolower');

	}
	function validar_fecha($value,$log = null)
	{
		// boolean = checkdate(mes,dia,año)
		return checkdate($value["F"],$value["d"],$value["Y"]);
	}
}


class ActionProcess extends HTML_QuickForm_Action
{
    function perform(&$page, $actionName)
    {

		//si se pulsa en el boton de agregar de la pagina de vista previa 
		//se prosesa el formulario y se muestran los datos agregados
		
        $values = $page->controller->exportValues();
		
		$anio= $values["fechaNac"]["Y"];
		$dia= $values["fechaNac"]["d"];
		$mes= $values["fechaNac"]["F"];

			
		$usuario = $_SESSION["usuario"];

		$query = "UPDATE usuarios SET ";
		$query .="nombre='".$values["nombre"]."',";
		$query .="apellido='".$values["apellido"]."',";
		$query .="lnacimiento='".$values["lnacimiento"]."',";
		$query .="sexo='".$values["sexo"]."',";
		$query .="estadocivil='".$values["estadocivil"]."',";
		$query .="canthijo='".$values["canthijo"]."',";
		$query .="dia='".$dia."',";
		$query .="mes='".$mes."',";
		$query .="ano='".$anio."',";
		$query .="fecha_nacimiento = '".$anio."-".$mes."-".$dia."',";
		$query .="domicilio='".$values["domicilio"]."',";
		$query .="localidad='".$values["localidad"]."',";
		$query .="cp='".$values["cp"]."',";
		$query .="provincia='".$values["provincia"]."',";
		$query .="telefono='".$values["telefono"]."',";
		$query .="celular='".$values["celular"]."',";
		$query .="condicion='".$values["condicion"]."',";
		$query .="email='".$values["email"]."',";
		$query .="recibir_oferta='".$values["recibir_oferta"]."' ";
		$query .="WHERE usuario ='".$usuario."'";
	
		include("consultar.php");

		$query = "UPDATE usuarios_disponibilidad SET ";
		$query .="horario='".$values["horario"]."',";
		$query .="viajar='".$values["viajar"]."',";
		$query .="otra_ciudad='".$values["otraCiudad"]."',";
		$query .="otro_pais='".$values["otroPais"]."',";
		$query .="remuneracion='".$values["remuneracion"]."',";
		$query .="comentarios='".$values["comentarios"]."' ";
		$query .="WHERE usuario ='".$usuario."'";

		include("consultar.php");

		$query ="Select * FROM usuarios_objetivos WHERE ";
		$query .="usuario='".$_SESSION["usuario"]."'";

		include("consultar.php");
		
		//si no existe el obj (esto es pq antes no estaba esto es a partir de abril-2006)
		if (!$ok = $result -> numRows()){
			$query ="INSERT INTO usuarios_objetivos(usuario,oPersonales,oLaborales,oProfesionales) VALUES (";
			$query .="'".$usuario."',";
			$query .="'".$values["oPersonales"]."',";
			$query .="'".$values["oLaborales"]."',";
			$query .="'".$values["oProfesionales"]."')";
		}else{
			$query = "UPDATE usuarios_objetivos SET ";
			$query .="oPersonales='".$values["oPersonales"]."',";
			$query .="oLaborales='".$values["oLaborales"]."',";
			$query .="oProfesionales='".$values["oProfesionales"]."' ";
			$query .="WHERE usuario ='".$usuario."'";		
		}
		include("consultar.php");

		
		$query = "UPDATE usuarios_discapacidad SET ";
		$query .="discapacidad='".$values["discapacidad"]."',";
		$query .="certificada='".$values["certificada"]."',";
		$query .="tipo='".$values["tipo"]."' ";
		$query .="WHERE usuario ='".$usuario."'";
	
		include("consultar.php");

		

		/* VA A myCV.php */
		
		header("location: myCV.php");

		$page -> freeze();

		//reseteamos el contenedor del controlador para que la proxima ves que se 
		//carge el formulario no se vuelvan a cargar los antiguos datos
		$ses = $page -> controller -> container(true);
		unset($ses);
	
		return $page->handle('display');
		
	}
}
class ActionDisplay extends HTML_QuickForm_Action_Display
{
    function _renderForm(&$page)
    {
		require_once('HTML/Template/ITX.php');
		require_once('HTML/QuickForm/Renderer/ITStatic.php');

		$tpl =& new HTML_Template_ITX('./templates');

		$tpl->loadTemplateFile('modDatosPersonales.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addCV', true);

$wizard->addPage(new Page_addCV('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>