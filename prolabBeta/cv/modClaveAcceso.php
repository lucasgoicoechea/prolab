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
class Page_modClaveAcceso extends HTML_QuickForm_Page
{
	function buildForm(){

//-----------------------------------------------------------------------------//
//Acceso a la base de datos
	require_once "DB.php";

	/************LEVANTO DATOS DE LA TABLA USUARIOS***************/
	$query ="Select id, usuario, clave FROM usuarios WHERE ";
	$query .="usuario='".$_SESSION["usuario"]."'";

	include("consultar.php");

	$this->_formBuilt = true;
		
	$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
	$this->setDefaults(array(
		'idUsr' => $item["id"],
		'usuario' => $item["usuario"],
		'clave' =>  $item["clave"]
	));


//-----------------------------------------------------------------------------//
//Formulario

		$this->_formBuilt = true;

		$this -> addElement('submit', $this->getButtonName('submit') , 'Guardar cambios',array('class' => 'botonG'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));
		

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Modificar clave de acceso al sistema');
		$this->addElement('header', 'subtitulo1', 'Acceso al sistema');

		$this->addElement('hidden', 'idUsr');
		$this->addElement('hidden', 'clave');

		$this->addElement('text', 'texto', 'Para modificar su clave de acceso al sistema, ingrese su clave actual, luego digite su nueva clave y confirmela.');			
		
		$this->addElement('text', 'usuario', 'Usuario:',array('class' => 'caja'));
		$this -> freeze('usuario');
		$this->addElement('password', 'claveActual', 'Clave actual:',array('class' => 'caja'));

		$this->addElement('password', 'nuevaClave', 'Nueva clave:',array('class' => 'caja'));
		
		$this->addElement('password', 'confirmaClave', 'Confirme clave:',array('class' => 'caja'));
		
//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación
		$this->addRule('claveActual', 'Debe ingresar su clave actual', 'required', null);
		$this->addRule('nuevaClave', 'Debe ingresar una nueva clave', 'required', null);
		$this->addRule('confirmaClave', 'Debe confirmar su nueva clave', 'required', null);

		$this->addRule('claveActual', 'Debe ingresar caracteres alfanumericos sin espacios intermedios', 'alphanumeric', null);
		$this->addRule('nuevaClave', 'Debe ingresar caracteres alfanumericos sin espacios intermedios', 'alphanumeric', null);
		$this->addRule('confirmaClave', 'Debe ingresar caracteres alfanumericos sin espacios intermedios', 'alphanumeric', null);

		$this->addRule(array( 'claveActual',  'clave'), 'Clave erronea', 'compare', null);

		$this->addRule(array('nuevaClave', 'confirmaClave'), 'La nueva clave no es igual a su confirmación', 'compare', null);	
//-----------------------------------------------------------------------------//
		$this->applyFilter('__ALL__', 'trim');
		//$this->applyFilter('clave', 'strtolower');
		$this->applyFilter('nuevaClave', 'strtolower');
		$this->applyFilter('confirmaClave', 'strtolower');

	}
}


class ActionProcess extends HTML_QuickForm_Action
{
    function perform(&$page, $actionName)
    {

		//si se pulsa en el boton de agregar de la pagina de vista previa 
		//se prosesa el formulario y se muestran los datos agregados
		
        $values = $page->controller->exportValues();
			
		$usuario = $_SESSION["usuario"];

		$query = "UPDATE usuarios SET ";
		$contrasena = md5($values["nuevaClave"]);
		$query .="clave='".$contrasena."' ";
		$query .="WHERE id ='".$values["idUsr"]."'";
	
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

		$tpl->loadTemplateFile('modClaveAcceso.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addCV', true);

$wizard->addPage(new Page_modClaveAcceso('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>