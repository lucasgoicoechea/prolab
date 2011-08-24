<?php
//*******************************************************************************//
//Permisos
include "validar_acceso.php";
//*******************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','myCV.php');

//formulario de llenado de datos (pagina 1)
class Page_addEstudio extends HTML_QuickForm_Page
{
	function buildForm(){

//-----------------------------------------------------------------------------//
//Acceso a la base de datos
		require_once 'DB.php';
	//****************Obtenemos las facultades **************

		$query = "SELECT id,nombre ";
		$query .="FROM facultades ";
		$query .="ORDER BY nombre";
		include("consultar.php");

		while ($item = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			$primero[$item['id']] = $item['nombre'];
		};

		$query = "SELECT id,nombre,idFacultad ";
		$query .="FROM carreras ";
		$query .="ORDER BY nombre";
		include("consultar.php");

		while ($item = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			$segundo[$item['idFacultad']][$item['id']] = $item['nombre'];
		};

		$opts[] = $primero;
		$opts[] = $segundo;



//-----------------------------------------------------------------------------//
//Formulario
		$ses = $this -> controller -> container(true);
		unset($ses);

		$this->_formBuilt = true;
		$this->setDefaults(array('usuario' => $_GET["usuario"]));
//------------------------------------------------------------------------------------------
		$this -> addElement('submit', $this->getButtonName('submit') , 'Continuar',array('class' => 'boton'));
	//	$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Estudios universitarios');
		$this->addElement('header', 'subtitulo', 'Completa los datos sobre tus estudios universitarios');
				
		$this->addElement('hidden', 'usuario');


		$hs =& $this->addElement('hierselect', 'facultad', 'Facultad y Carrera:', array ('class' => 'select'));
		$hs->setOptions($opts);

		$this->addElement('date', 'ingreso', 'Año de ingreso:', array('format'=>'Y', 'minYear'=>date("Y"), 'maxYear'=>1965,'language'=>'es'),array('class'=>'select'));
		
		$estados=array('graduado'=> 'Graduado','en curso'=> 'En curso','abandonado'=> 'Abandonado');
			
		$this->addElement('select', 'estado', 'Estado actual:',$estados,array ('class' => 'select'));
		
		$this->addElement('date', 'egreso', 'Año de egreso:', array('format'=>'Y', 'minYear'=>date("Y"), 'maxYear'=>1965,'language'=>'es'),array('class'=>'select'));

		$this->addElement('text', 'cursadas', 'Materias cursadas:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'aprobadas', 'Materias aprobadas:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'promedio', 'Promedio:',array('style' => 'width: 5em;','class' => 'caja'));
		
//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación
	$this->addRule('cursadas', 'Solo caracteres numericos', 'numeric');
	$this->addRule('aprobadas', 'Solo caracteres numericos', 'numeric');
	$this->addRule('promedio', 'Tenes que ingresar el promedio', 'required');
	$this->addRule('facultad', 'Tenes que seleccionar facultad y carrera', 'required');
		
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
		//si se pulsa en el boton de agregar de la pagina de vista previa 
		//se prosesa el formulario y se muestran los datos agregados
		require_once "DB.php";

        $values = $page->controller->exportValues();


		//Seleccionamos la facultad y carrera
	
		$query = "SELECT nombre ";
		$query .="FROM facultades ";
		$query .="WHERE id = '".$values["facultad"][0]."'";
		include("consultar.php");

		$nombreFacultad = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		$query = "SELECT nombre, id ";
		$query .="FROM carreras ";
		$query .="WHERE id = '".$values["facultad"][1]."'";
		include("consultar.php");

		$nombreCarrera = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	
		$anioI = $values["ingreso"]["Y"];
		$anioE = $values["egreso"]["Y"];
		

		if ($values["estado"] == 'graduado'){
		$values["aprobadas"] = '0';
		$values["cursadas"] = '0';
		}else{
		$anioE = '';
		}


		$query ="INSERT INTO usuarios_estudios (usuario,nivel,titulo,institucion,estadoActual,ingreso,egreso,materias,materias_cursadas,idCarrera,promedio)VALUES (";
		$query .="'".$values["usuario"]."',";
		$query .="'universitario',";
			
		$query .="'".$nombreCarrera["nombre"]."',";
		$query .="'".$nombreFacultad["nombre"]."',";

		$query .="'".$values["estado"]."',";
		$query .="'".$anioI."',";
		$query .="'".$anioE."',";
		$query .="'".$values["aprobadas"]."',";
		$query .="'".$values["cursadas"]."',";
		$query .="'".$nombreCarrera["id"]."',";
		$query .="'".$values["promedio"]."')";


		include("consultar.php");

		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement('subtitulo');
		$page->removeElement($page->getButtonName('submit'));
		$page->addElement('submit',$page->getButtonName('modificar'),'Agregar otro',array('class' => 'botonG'));

		//agregamos mensage resultado
		$page->addElement('header','subtitulo','¡Los datos fueron agregados con exito!');
		//congelamos el formulario para vista previa
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

		$tpl->loadTemplateFile('addEstudioUNLP.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addEstudio', true);

$wizard->addPage(new Page_addEstudio('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>