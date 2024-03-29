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

//-----------------------------------------------------------------------------//
//Formulario

		$this->_formBuilt = true;
		$this->setDefaults(array('usuario' => $_GET["usuario"]));
//------------------------------------------------------------------------------------------
		$this -> addElement('submit', $this->getButtonName('submit') , 'Continuar',array('class' => 'boton'));
	//	$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Otros estudios');
		$this->addElement('header', 'subtitulo', 'Completa los datos sobre estudios');
				
		$this->addElement('hidden', 'usuario');

		$niveles=array('secundario'=> 'Secundario','terciario'=> 'Terciario','posgrado'=> 'Posgrado');
			
		$this->addElement('select', 'nivel', 'Nivel de estudio:',$niveles,array ('class' => 'select'));

		$this->addElement('text', 'institucion', 'Instituci�n:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'recibidoDe', 'Titulo:',array('style' => 'width: 15em;','class' => 'caja'));
	
		$estados=array('graduado'=> 'Graduado','en curso'=> 'En curso','abandonado'=> 'Abandonado');
			
		$this->addElement('select', 'estado', 'Estado actual:',$estados,array ('class' => 'select'));
		
		$this->addElement('date', 'egreso', 'A�o de egreso:', array('format'=>'Y', 'minYear'=>date("Y"), 'maxYear'=>1980,'language'=>'es'),array('class'=>'select'));

		$this->addElement('text', 'promedio', 'Promedio:',array('style' => 'width: 5em;','class' => 'caja'));
		
//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validaci�n
	$this->addRule('promedio', 'Tenes que ingresar el promedio', 'required');
	$this->addRule('institucion', 'Tenes que ingresar al instituci�n', 'required');
		
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

			

		if ($values["estado"] == 'graduado'){
			$anioE = $values["egreso"]["Y"];
		}else{
			$anioE = '';
		}

		$query ="INSERT INTO usuarios_estudios (usuario,nivel,institucion,titulo,estadoActual,egreso,promedio)VALUES (";
		$query .="'".$values["usuario"]."',";
		$query .="'".$values["nivel"]."',";
		$query .="'".$values["institucion"]."',";
		$query .="'".$values["recibidoDe"]."',";
		$query .="'".$values["estado"]."',";
		$query .="'".$anioE."',";
	
		$query .="'".$values["promedio"]."')";


		include("consultar.php");



		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement('subtitulo');
		$page->removeElement($page->getButtonName('submit'));
		$page->addElement('submit',$page->getButtonName('modificar'),'Agregar otro',array('class' => 'botonG'));

		//agregamos mensage resultado
		$page->addElement('header','subtitulo','�Los datos fueron agregados con exito!');
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

		$tpl->loadTemplateFile('addOtroEstudio.html');

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