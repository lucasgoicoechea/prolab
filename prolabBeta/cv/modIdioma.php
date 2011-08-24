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
class Page_addIdioma extends HTML_QuickForm_Page
{
	function buildForm(){

//-----------------------------------------------------------------------------//
//Acceso a la base de datos
	require_once "DB.php";

		
	$query ="Select * FROM usuarios_idiomas WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
//-----------------------------------------------------------------------------//
//Formulario
		

		$this->_formBuilt = true;
		
		$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
		$this->setDefaults(array(
			'usuario' => $_GET["id"],
			'idioma' => $item["idioma"],
			'nivel' => $item["nivel"]));


//------------------------------------------------------------------------------------------
		$this -> addElement('submit', $this->getButtonName('submit') , 'Guardar cambios',array('class' => 'botonG'));
	//	$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Idiomas');
		$this->addElement('header', 'subtitulo', 'Selecciona el idioma y tu nivel de dominio');
		
		
		$this->addElement('hidden', 'usuario');


		$options1=array('inglés'=> 'Inglés','francés'=> 'Francés','alemán'=> 'Alemán','italiano'=> 'Italiano','portugues'=> 'Portugues','chino'=> 'Chino');
			
		$this->addElement('select', 'idioma', 'Idioma:',$options1,array ('class' => 'select'));

		$options2=array('basico'=> 'Basico','intermedio'=> 'Intermedio','avanzado'=> 'Avanzado');
			
		$this->addElement('select', 'nivel', 'Nivel de dominio:',$options2,array ('class' => 'select'));

//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación
		$this->addRule('idioma', 'Tenes que seleccionar un idioma', 'required');
		$this->addRule('nivel', 'Tenes que seleccionar un nivel de dominio', 'required');
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
		
		$query = "UPDATE usuarios_idiomas SET ";
		$query .="idioma='".$values["idioma"]."',";
		$query .="nivel='".$values["nivel"]."' ";
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

		$tpl->loadTemplateFile('addIdioma.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addIdioma', true);

$wizard->addPage(new Page_addIdioma('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>