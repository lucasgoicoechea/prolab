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
class Page_addCurso extends HTML_QuickForm_Page
{
	function buildForm(){

//-----------------------------------------------------------------------------//
//Acceso a la base de datos
	require_once "DB.php";

		
	$query ="Select * FROM usuarios_cursos WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
//-----------------------------------------------------------------------------//
//Formulario
		

		$this->_formBuilt = true;
		
		$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
		$this->setDefaults(array(
			'usuario' => $_GET["id"],
			'curso' => $item["curso"],
			'institucion' => $item["institucion"],
			'anio' => $item["anio"],
			'horas' => $item["horas"]));


//------------------------------------------------------------------------------------------
		$this -> addElement('submit', $this->getButtonName('submit') , 'Guardar cambios',array('class' => 'botonG'));
	//	$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Curso, seminarios, congresos');
		$this->addElement('header', 'subtitulo', 'Ingresá los datos correspondientes');
		
		
		$this->addElement('hidden', 'usuario');

		$this->addElement('text', 'curso', 'Nombre:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'institucion', 'Institución:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'horas', 'Horas de duración:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'anio', 'Año en que se Realizo:',array('style' => 'width: 8em;','class' => 'caja'));
		
//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación
		$this->addRule('curso', 'Tenes que ingresar un nombre', 'required');
		$this->addRule('institucion', 'Tenes que ingresar una institución', 'required');
		$this->addRule('horas', 'Tenes que ingresar las horas de duración', 'required');
		$this->addRule('horas', 'Formato de Hora invalido, solo numerico', 'numeric');
		$this->addRule('anio', 'Año no valido', 'numeric');
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
		
		$query = "UPDATE usuarios_cursos SET ";
		$query .="curso='".$values["curso"]."',";
		$query .="institucion='".$values["institucion"]."',";
		$query .="horas='".$values["horas"]."',";
		$query .="anio='".$values["anio"]."' ";
		$query .="WHERE id ='".$values["usuario"]."'";

		include("consultar.php");

		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement('subtitulo');
		$page->removeElement($page->getButtonName('submit'));
		
		//agregamos mensaje resultado
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

		$tpl->loadTemplateFile('addCurso.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addCurso', true);

$wizard->addPage(new Page_addCurso('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>