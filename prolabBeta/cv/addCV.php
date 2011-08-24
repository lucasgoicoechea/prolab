<?php

require_once 'HTML/QuickForm/Controller.php';

require_once 'HTML/QuickForm/Action/Display.php';



session_start();



define('QUIT','logout.php');





//*******************************************************************************//

//Permisos



if ($_SESSION["condicion"] == ''){

	// si intentan ingresar por la url los datos de condicion son necesarios para ingresarse en el sistema

	header ("location:logout.php");

}



//*******************************************************************************//





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



//-----------------------------------------------------------------------------//

//Formulario



		$this->_formBuilt = true;

		$this->setDefaults(

			array(

				'idUsr' => $_SESSION["condicion"],

				'usuario' => 'El nombre de usuario para ingresar al sistema es tu DNI'

			)

		);





		if ($_SESSION["condicion"]=='graduado')

			$this -> addElement('submit', $this->getButtonName('submit') , 'Continuar',array('class' => 'botonG'));

		else

			$this -> addElement('submit', $this->getButtonName('submit') , 'Agregar CV',array('class' => 'botonG'));



		$this -> addElement('button', 'salir' ,'Salir',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));



//-------------------------------------------------------------------------------------------

		$this->addElement('header', 'titulo', 'Ingresá tus datos');

		$this->addElement('header', 'subtitulo', 'Datos personales');

		

		

		$this->addElement('hidden', 'idUsr');



		$this->addElement('text', 'apellido', 'Apellidos:',array('class' => 'caja'));



		$this->addElement('text', 'nombre', 'Nombres:',array('class' => 'caja'));



		$this->addElement('text', 'dni', array('DNI:','Solo números sin puntos ni espacios'),array('class' => 'caja', 'Maxlength' => 10));



		$options1=array('Masculino'=> 'Masculino','Femenino'=> 'Femenino');

			

		$this->addElement('select', 'sexo', 'Sexo:',$options1,array ('class' => 'select'));





		$options2=array('Soltero/a'=> 'Soltero/a','Casado/a'=> 'Casado/a','Separado/a'=> 'Separado/a','Divorciado/a'=> 'Divorciado/a','Viudo/a'=> 'Viudo/a');

			

		$this->addElement('select', 'estadocivil', 'Estado civil:',$options2,array ('class' => 'select'));



		$options3=array('0'=> '0','1'=> '1','2'=> '2','3'=> '3','4'=> '4','5'=> '5 o mas');

			

		$this->addElement('select', 'canthijo', 'Cantidad de hijos:',$options3,array ('class' => 'select'));





		$this->addElement('date', 'fechaNac', 'Fecha de nacimiento:', array('format'=>'d-F-Y','addEmptyOption'   => true, 'emptyOptionText'  => '---', 'emptyOptionValue' => 0,  'minYear'=>(date("Y") - 17), 'maxYear'=>(date("Y") - 70),'language'=>'es'),array('class'=>'select'));



	

		$this->addElement('text', 'lnacimiento', 'Lugar de nacimiento:',array('class' => 'caja'));



		/************************DISCAPACIDAD**********************/



		$sino=array('no'=> 'No','si'=> 'Si');

			

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

		

		$this->addElement('text', 'email', array('E-mail:','Solo una dirección, el mail se escribe todo en minusculas'),array('class' => 'caja'));



		$this->addElement('header', 'subtitulo3', 'Datos de conexión al sistema');







		$this->addElement('text', 'usuario', 'Nombre de usuario:',array('class' => 'caja'));

		$this->freeze(usuario);



		$this->addElement('password', 'clave',  array('Contraseña:',''),array('class' => 'caja'));

		

		$this->addElement('password', 'clave2', array('Confirmá contraseña:','Vuelve a escribir tu contraseña'),array('class' => 'caja'));

	



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

		$this->addElement('advcheckbox', 'recibir_oferta', 'Deseo Recibir Ofertas por E-Mail', null, null, array('0', '1'));


		if ($_SESSION["condicion"]=='graduado')

		$this->addElement('textarea', 'oProfesionales', 'Objetivos profesionales (solo graduados):', $attrs);

		



		/************************EGRESO**********************/

		if ($_SESSION["condicion"]=='graduado'){

		$this->addElement('header', 'subtitulo6', 'Selecciona el año en que egresaste');



		$this->addElement('date', 'anioEgreso', 'Año de egreso:', array('format'=>'Y', 'minYear'=>date("Y"), 'maxYear'=>1965,'language'=>'es'),array('class'=>'select'));

		}

		

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

		$this->addRule('fechaNac', 'Tenes que ingresar tu fecha de nacimiento', 'required');

		$this->addRule('lnacimiento', 'Tenes que ingresar tu lugar de nacimiento', 'required');

		$this->addRule('domicilio', 'Tenes que ingresar tu domicilio actual', 'required');

		$this->addRule('localidad', 'Tenes que ingresar tu localidad de residencia actual', 'required');

		$this->addRule('provincia', 'Tenes que ingresar tu provincia de residencia actual', 'required');

		$this->addRule('cp', 'Tenes que ingresar el código postal', 'required');

		$this->addRule('telefono', 'Tenes que ingresar tu teléfono', 'required');

		$this->addRule('email', 'Tenes que ingresar tu e-mail', 'required');



		$this->addRule('oPersonales', 'Tenes que ingresar tus objetivos de trabajol', 'required');

		$this->addRule('oLaborales', 'Tenes que ingresar tus objetivos laborales', 'required');



		if ($_SESSION["condicion"]=='graduado')

		$this->addRule('oProfesionales', 'Tenes que ingresar tus objetivos profesionales', 'required');



		/******************************OTROS CHEQUEOS*********************************/



		$this->addRule('email', 'Dirección de e-mail invalida', 'email');

		$this->addRule('dni', 'Solo números sin puntos ni espacios', 'numeric');

		

		if ($_SESSION["condicion"]=='graduado')

		$this->addRule('anioEgreso', 'Tenes que seleccionar tu año de egreso', 'required');



		//*************************Reglas de validación de usr y pwd********************

		

		$this->addRule('clave', 'Debe ingresar una nueva contraseña', 'required', null);

		$this->addRule('clave2', 'Debe confirmar su nueva contraseña', 'required', null);



		$this->addRule('clave', 'Debe ingresar caracteres alfanumericos sin espacios intermedios', 'alphanumeric', null);

		$this->addRule('clave2', 'Debe ingresar caracteres alfanumericos sin espacios intermedios', 'alphanumeric', null);



		$this->addRule(array('clave', 'clave2'), 'La contraseña y su confirmación no son iguales', 'compare', null);





	    $this->registerRule('validar_fecha', 'callback', 'validar_fecha', get_class($this));

		$this->addRule('fechaNac','La fecha que ah ingresado es incorrecta','validar_fecha');



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



class ActionPreview extends HTML_QuickForm_Action

{

    function perform(&$page, $actionName)

    {

        // like in Action_Next

        $page->isFormBuilt() or $page->buildForm();

        $pageName =  $page->getAttribute('id');

        $data     =& $page->controller->container();

        $data['values'][$pageName] = $page->exportValues();

        $data['valid'][$pageName]  = $page->validate();



		//SE CHEQUEA Q EL USUARIO  NO EXISTA EN LA BASE DE DATOS

		require_once "DB.php";

		$values = $page->controller->exportValues();

		$query ="SELECT * FROM usuarios WHERE dni=";

		$query .="'".$values["dni"]."'";

		include("consultar.php");



		//SI NO EXISTE EL DNI

		if (!$ok = $result -> numRows()){



		if (!$data['valid'][$pageName]) {

			//si existen errores en la pagina entonces se muestra con los cartelitos de errores

			return $page->handle('display');

		}else{

			//si esta todo ok se muestra la pagina como vista previa

			//con los botones de modificar y agregar definitivamente

			//se elimina el boton reset

			//se elimina el boton de vista previa



			//********************************************************************************

			$page->removeElement('subtitulo');

			$page->addElement('header', 'subtitulo', 'Si los datos son correctos presiona agregar o modificar en caso que quieras cambiarlos');



			$page->removeElement('salir');



			//*******************************************************************************

			$page->addElement('submit',$page->getButtonName('submit'),'Agregar',array('class' => 'boton'));

			$page->addElement('submit',$page->getButtonName('modificar'),'Modificar',array('class' => 'boton'));

			$page->removeElement($page->getButtonName('preview'));

			$page->removeElement('reset');

			$page -> freeze();

			return $page->handle('display');

			}}else{

			//SI EXISTE EL DNI		

			header("location:errorDNI.html");

		

		}

		

	}

}// end 

class ActionModificar extends HTML_QuickForm_Action

{

    function perform(&$page, $actionName)

    {   

		//si se pulsa en el boton modificar se muestra la pagina con el formulrio

		//para la reedicion

		return $page->handle('display');

    }

}



class ActionProcess extends HTML_QuickForm_Action

{

    function perform(&$page, $actionName)

    {



		//SE CHEQUEA Q EL USUARIO  NO EXISTA EN LA BASE DE DATOS

		require_once "DB.php";

		$values = $page->controller->exportValues();

		$query ="SELECT * FROM usuarios WHERE dni=";

		$query .="'".$values["dni"]."'";

		include("consultar.php");



		//SI NO EXISTE EL DNI

		if (!$ok = $result -> numRows()){



		//si se pulsa en el boton de agregar de la pagina de vista previa 

		//se prosesa el formulario y se muestran los datos agregados

		

        $values = $page->controller->exportValues();

		

		$fecha = date("d-m-Y");



		$anio= $values["fechaNac"]["Y"];

		$dia= $values["fechaNac"]["d"];

		$mes= $values["fechaNac"]["F"];



		$egreso= $values["anioEgreso"]["Y"];

		

		$usuario = $values["dni"];

		$query ="INSERT INTO usuarios(fecha,condicion,usuario,clave,nombre,apellido,lnacimiento,dni,sexo,estadocivil,canthijo,dia,mes,ano,fecha_nacimiento,domicilio,localidad,cp,provincia,telefono,celular,email,ano_egreso, id_clasif_entrev, recibir_oferta) VALUES (";

		$query .="'".$fecha."',";

		$query .="'".$values["idUsr"]."',"; //es la condición

		$query .="'".$usuario."',"; //el dni es el usr
		$contrasena = md5($values["clave"]); 
		$query .="'".$contrasena."',";

		$query .="'".$values["nombre"]."',";

		$query .="'".$values["apellido"]."',";

		$query .="'".$values["lnacimiento"]."',";

		$query .="'".$values["dni"]."',";

		$query .="'".$values["sexo"]."',";

		$query .="'".$values["estadocivil"]."',";

		$query .="'".$values["canthijo"]."',";

		$query .="'".$dia."',";

		$query .="'".$mes."',";

		$query .="'".$anio."',";

		$query .="'".$anio."-".$mes."-".$dia."',";

		$query .="'".$values["domicilio"]."',";

		$query .="'".$values["localidad"]."',";

		$query .="'".$values["cp"]."',";

		$query .="'".$values["provincia"]."',";

		$query .="'".$values["telefono"]."',";

		$query .="'".$values["celular"]."',";

		$query .="'".$values["email"]."',";

		$query .="'".$egreso."',";

		$query .="'4', ";

		$query .="'".$values["recibir_oferta"]."')";
		
		

		include("consultar.php");



		$query ="INSERT INTO usuarios_disponibilidad (usuario,horario,viajar,otra_ciudad,otro_pais,remuneracion,comentarios) VALUES (";

		$query .="'".$usuario."',";

		$query .="'".$values["horario"]."',";

		$query .="'".$values["viajar"]."',";

		$query .="'".$values["otraCiudad"]."',";

		$query .="'".$values["otroPais"]."',";

		$query .="'".$values["remuneracion"]."',";

		$query .="'".$values["comentarios"]."')";



		include("consultar.php");

		

		$query ="INSERT INTO usuarios_objetivos(usuario,oPersonales,oLaborales,oProfesionales) VALUES (";

		$query .="'".$usuario."',";

		$query .="'".$values["oPersonales"]."',";

		$query .="'".$values["oLaborales"]."',";

		$query .="'".$values["oProfesionales"]."')";



		include("consultar.php");

			

		$query ="INSERT INTO usuarios_discapacidad(usuario,discapacidad,certificada,tipo) VALUES (";

		$query .="'".$usuario."',";

		$query .="'".$values["discapacidad"]."',";

		$query .="'".$values["certificada"]."',";

		$query .="'".$values["tipo"]."')";



		include("consultar.php");

			



		/* VA A myCV.php */

		

		$_SESSION["usuario"] = $values["dni"];



		//if ($values["idUsr"]=='graduado')

		//header("location: encuesta/redireccionSegunAnio.php");

		//else

		header("location: myCV.php");



		$page -> freeze();



		//reseteamos el contenedor del controlador para que la proxima ves que se 

		//carge el formulario no se vuelvan a cargar los antiguos datos

		$ses = $page -> controller -> container(true);

		unset($ses);

	

		return $page->handle('display');

		}else{

			//SI EXISTE EL DNI		

			header("location:errorDNI.html");

		

		}

	}

}

class ActionDisplay extends HTML_QuickForm_Action_Display

{

    function _renderForm(&$page)

    {

		require_once('HTML/Template/ITX.php');

		require_once('HTML/QuickForm/Renderer/ITStatic.php');



		$tpl =& new HTML_Template_ITX('./templates');



		$tpl->loadTemplateFile('addCV.html');



		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);

		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');

		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2"><br/>{error}<br/></font>');



        $page->accept($renderer);

        $tpl->show();

    }

}//end ActionDisplay Class





$wizard =& new HTML_QuickForm_Controller('addCV', true);



$wizard->addPage(new Page_addCV('page1'));



$wizard->addAction('display', new ActionDisplay());

$wizard->addAction('preview', new ActionPreview());

$wizard->addAction('modificar', new ActionModificar());

$wizard->addAction('process', new ActionProcess());





$wizard->run();





?>