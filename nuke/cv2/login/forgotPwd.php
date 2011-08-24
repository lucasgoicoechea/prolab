<?php
//*******************************************************************************//
//Permisos
//*******************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','../index.php');

//formulario de llenado de datos (pagina 1)
class Page_forgotPwd extends HTML_QuickForm_Page
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
		$this -> addElement('button', 'salir' ,'Salir',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Olvidaste tu contraseña');
		$this->addElement('header', 'subtitulo', 'Ingresa tu DNI');
		
		
		$this->addElement('hidden', 'usuario');

		$this->addElement('text', 'dni', array('DNI:','Solo números sin puntos ni espacios'),array('class' => 'caja'));

//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación
			$this->addRule('dni', 'Tenes que ingresar tu DNI', 'required');
			$this->addRule('dni', 'Solo números sin puntos ni espacios', 'numeric');
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
		
		

		$query ="SELECT * FROM usuarios WHERE dni=";
		$query .="'".$values["dni"]."'";
		include("consultar.php");

		//SI NO EXISTE EL DNI
		if (!$ok = $result -> numRows()){
			$msg = "No existe un usuario registrado bajo ese DNI";
		}else{
			
			$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);
			$email = $item["email"];
			$usuario = $item["usuario"];
			$clave = $item["clave"];
			$nombre = $item["nombre"];
		    $apellido = $item["apellido"];

			$motivo = "PROLAB - Datos de Usuario";
			$cuerpo = "$apellido, $nombre.-\n";
			$cuerpo.= "Estos son sus datos de usuario del PROLAB\n\n";
			$cuerpo.= "Usuario: $usuario\n";
			$cuerpo.= "Password: $clave\n";
			$cuerpo.= "-------------------------------------\n";
			//envia el mail
			$to_email="$email"; //destino
			mail($to_email,$motivo,$cuerpo);
			
			$msg = "¡El e-mail fué enviado con exito a $email!";
		}
		
		

		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement('dni');
		$page->removeElement('subtitulo');
		$page->removeElement($page->getButtonName('submit'));
		
		//agregamos mensage resultado
		$page->addElement('header','subtitulo',$msg);
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

		$tpl =& new HTML_Template_ITX('./');

		$tpl->loadTemplateFile('forgotPwd.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('forgotPwd', true);

$wizard->addPage(new Page_forgotPwd('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>