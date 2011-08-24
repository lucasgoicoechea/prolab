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
	
	require_once "DB.php";
		
	$query ="Select * FROM usuarios_estudios WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
//-----------------------------------------------------------------------------//
//Formulario
		

		$this->_formBuilt = true;
		
		$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
		$this->setDefaults(array(
			'usuario' => $_GET["id"],
			'facultad' => $item["institucion"]." - ".$item["titulo"],
	//		'ingreso' => $item["ingreso"],
	//		'egreso' => $item["egreso"],
			'estado' => $item["estadoactual"],
			'aprobadas' => $item["materias"],
			'cursadas' => $item["materias_cursadas"],
			'promedio' => $item["promedio"]));

//------------------------------------------------------------------------------------------
		$this -> addElement('submit', $this->getButtonName('submit') , 'Guardar cambios',array('class' => 'botonG'));
	//	$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Estudios universitarios');
		$this->addElement('header', 'subtitulo', 'Completa los datos sobre tus estudios universitarios');
				
		$this->addElement('hidden', 'usuario');
		
		$this->addElement('text', 'facultad', 'Facultad y carrera:',array('style' => 'width: 5em;','class' => 'caja'));
		
		$this -> freeze('facultad');

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
	$this->addRule('cursadas', 'Edad: Solo caracteres numericos', 'numeric');
	$this->addRule('aprobadas', 'Edad: Solo caracteres numericos', 'numeric');
	$this->addRule('promedio', 'Tenes que ingresar el promedio', 'required');
			
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
			$page->addElement('header', 'subtitulo', 'Si los datos son correctos presiona guardar cambios o modificar en caso que quieras cambiarlos');

			$page->removeElement('salir');

			//*******************************************************************************
			$page->addElement('submit',$page->getButtonName('submit'),'Guardar cambios',array('class' => 'botonG'));
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

		$anioI = $values["ingreso"]["Y"];
		$anioE = $values["egreso"]["Y"];
		

		if ($values["estado"] == 'graduado'){
		$values["aprobadas"] = '0';
		$values["cursadas"] = '0';
		}else{
		$anioE = '';
		}
		

		$query = "UPDATE usuarios_estudios SET ";
		$query .="estadoActual='".$values["estado"]."',";
		$query .="ingreso='".$anioI."' ,";
		$query .="egreso='".$anioE."',";
		$query .="materias='".$values["aprobadas"]."' ,";
		$query .="materias_cursadas='".$values["cursadas"]."',";
		$query .="promedio='".$values["promedio"]."' ";
		$query .="WHERE id ='".$values["usuario"]."'";

		include("consultar.php");

	
		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement('subtitulo');
		$page->removeElement($page->getButtonName('submit'));
	

		//agregamos mensage resultado
		$page->addElement('header','subtitulo','¡Los datos fueron modificados con exito!');
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