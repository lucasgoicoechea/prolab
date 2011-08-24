<?php
if (!eregi("modules.php", $PHP_SELF)){ 
  die ("You can't access this rows directly...");
}

$index = 1; 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__)); 
get_lang($module_name); 
include("header.php");

opentable();
//*************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','modules.php?name=Add_Empresa');

//formulario de llenado de datos (pagina 1)
class Page_addGraduado extends HTML_QuickForm_Page
{

function Page_addGraduado($formName,$action, $method = 'post', $target = '_self', $attributes = null)
    {
        $this->HTML_QuickForm($formName, $method, $action, $target, $attributes);
    }
	function buildForm(){
//-----------------------------------------------------------------------------//
//Formulario
		//levantamos las empresas
	
		$this -> _formBuilt = true;
		$this -> addElement('header', 'titulo', 'Registrar nueva empresa en la base de datos');
		$this -> addElement('submit', $this->getButtonName('preview') , 'Continuar',array('class' => 'boton'));
		$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Salir',array ('class' => 'boton','onClick' => "JavaScript: location.href='".QUIT."'"));

		$this->addElement('header', 'subtitulo0', 'Datos del Conexion');
		
		//********************Datos de conexion**********************//
		
		$this->addElement('text', 'usuario', 'Usuario:',array('class' => 'caja'));

		$this->addElement('text', 'clave', 'Clave de acceso al sistema:',array('class' => 'caja'));
		
		$this->addElement('header', 'subtitulo1', 'Datos del contacto');

		//********************Datos***********************************//
		
		$this->addElement('text', 'apellido', 'Apellido:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'nombre', 'Nombre:',array('style' => 'width: 15em;','class' => 'caja'));
		
		$radio1[] = &HTML_QuickForm::createElement('radio', null, null, 'Masculino', 'm');
		$radio1[] = &HTML_QuickForm::createElement('radio', null, null, 'Femenino', 'f');
		$this->addGroup($radio1, 'sexo', 'Sexo:');
		
		$this->addElement('text', 'telefono', 'Telefono:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'email', 'E-mail:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'puesto', 'Puesto:',array('style' => 'width: 15em;','class' => 'caja'));
		
		//***************************************************************//
		$this->addElement('header', 'subtitulo2', 'Datos de la empresa');

		$this->addElement('text', 'nombrecomercial', 'Nombre comercial:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'razonsocial', 'Razón social:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'industria', 'Industria:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('header', 'subtitulo3', 'Datos de contacto de la empresa');
		$this->addElement('text', 'pais', 'País:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'provincia', 'Provincia:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'ciudad', 'Ciudad:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'calle', 'Calle:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'numero', 'Numero:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'piso', 'Piso:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'cp', 'Codigo Postal:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'cuit', 'Cuit:',array('style' => 'width: 15em;','class' => 'caja'));
		
		$options=array('cf'=> 'Consumidor final','ex'=> 'Exento','mon'=> 'Monotributo','ri'=> 'responsable inscripto','rno'=> 'responsable no inscripto');
			
		$this->addElement('select', 'iva', 'IVA:',$options,array ('class' => 'select'));
				
		$this->addElement('text', 'emaile', 'E-mail:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'telefonoe', 'Teléfono:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'faxe', 'Fax:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'web', 'Página web:',array('style' => 'width: 15em;','class' => 'caja'));
		
		$this->addElement('header', 'subtitulo4', 'Información adicional');

		$this->addElement('text', 'empleados', 'Cantidad de empleados:',array('style' => 'width: 5em;','class' => 'caja'));

		$attrs = array("class"=>"caja",
                     "rows"=>"5",
                     "cols"=>"29");
		$this->addElement('textarea', 'descripcion', 'Descripcion:', $attrs);
	
	/*$this->addElement('text', 'descripcion', 'Descripcion:');*/
//-----------------------------------------------------------------------------//
//reglas de validación
		/*$this->addRule('sexo', 'Debe completar', 'required');
		$this->addRule('nombre', 'Debe completar', 'required');
		$this->addRule('apellido', 'Debe completar', 'required');
		//$this->addRule('nombrecomercial', 'Debe completar', 'required');
		$this->addRule('razonsocial', 'Debe completar', 'required');
		$this->addRule('telefono', 'Debe completar', 'required');
		$this->addRule('telefonoe', 'Debe completar', 'required');
		$this->addRule('calle', 'Debe completar', 'required');
		$this->addRule('numero', 'Debe completar', 'required');
		$this->addRule('cuit', 'Debe completar', 'required');
		$this->addRule('cp', 'Debe completar', 'required');
		$this->addRule('pais', 'Debe completar', 'required');
		$this->addRule('provincia', 'Debe completar', 'required');
		$this->addRule('ciudad', 'Debe completar', 'required');
		$this->addRule('industria', 'Debe completar', 'required');
		$this->addRule('telefono', 'Telefono: Solo caracteres numericos', 'numeric');*/
		
		$this->addRule('nombrecomercial', 'Debe completar', 'required');
		$this->addRule('usuario', 'Debe completar el campo del usuario', 'required');
		$this->addRule('usuario', 'Solo puede completar el campo con caracteres en minuscula y n&uacute;meros','regex','/^[a-z0-9]+$/');
		$this->addRule('usuario', 'Deberias poner entre 5 a 20 caracteres', 'rangelength', array(5,10));
		$this->addRule('clave', 'Solo puede completar el campo con caracteres en minuscula y n&uacute;meros','regex','/^[a-z0-9]+$/');
		$this->addRule('clave', 'Deberias poner entre 5 a 20 caracteres', 'rangelength', array(5,10));

		$this->registerRule('validar_userName', 'callback', 'validar_userName', get_class($this));
		$this->addRule('usuario','Este usuario ya existe en el sistema, por favor ingrese otro','validar_userName');

//-----------------------------------------------------------------------------//
//filtros

		$this->applyFilter('__ALL__', 'trim');

		//$this->applyFilter('__ALL__', 'strtoupper');
	}
	/**
	* Esta funcion checkea si el usuario esta si el usuario existe en la base de datos o no
	*
	*/
	function validar_userName($value,$log = null){
		require_once "DB.php";
		
		$query  = "SELECT usuario ";
		$query .= "FROM empresas ";
		$query .= "WHERE usuario='".$value."'";
		include("consultar.php");
		if ($exist_usuario = $result -> numRows()){
			return false;
		}else{
			return true;
		}//end if 
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

	
	$fecha = date("Y-m-d");
/*
	$query  ="INSERT INTO empresas (usuario,clave,fecha_ingreso,nombre,apellido,sexo,email,telefono,puesto,razonsocial,nombrecomercial,industria,pais,provincia,ciudad,calle,numero,piso,cp,cuit,iva,emaile,telefonoe,faxe,web,descripcion,empleados) VALUES (";
	$query .="'".$values["usuario"]."',";
	$query .="'".$values["clave"]."',";
	$query .="'".$fecha."',";
	$query .="'".$values["nombre"]."',";
	$query .="'".$values["apellido"]."',";
	$query .="'".$values["sexo"]."',";
	$query .="'".$values["email"]."',";
	$query .="'".$values["telefono"]."',";
	$query .="'".$values["puesto"]."',";
	$query .="'".$values["razonsocial"]."',";
	$query .="'".$values["nombrecomercial"]."',";
	$query .="'".$values["industria"]."',";
	$query .="'".$values["pais"]."',";
	$query .="'".$values["provincia"]."',";
	$query .="'".$values["ciudad"]."',";
	$query .="'".$values["calle"]."',";
	$query .="'".$values["numero"]."',";
	$query .="'".$values["piso"]."',";
	$query .="'".$values["cp"]."',";
	$query .="'".$values["cuit"]."',";
	$query .="'".$values["iva"]."',";
	$query .="'".$values["emaile"]."',";
	$query .="'".$values["telefonoe"]."',";
	$query .="'".$values["faxe"]."',";
	$query .="'".$values["web"]."',";
	$query .="'".$values["descripcion"]."',";
	$query .="'".$values["empleados"]."')";
	
	*/
	$query ="INSERT  INTO aux (usuario) VALUES ('".$values["apellido"]."')";
	include("consultar.php");
	
	$page->removeElement($page->getButtonName('preview'));
	$page->removeElement('reset');

	//agregamos mensaje resultado
	$page->addElement('header','ok','Los datos fueron agregados con exito ');
	/*$page->addElement('static','oktext','Los datos de su empresa han sido enviados a la base 
  de datos del prolab, en breve nos comunicaremos con usted para finalizar la subscripci&oacute;n.');*/
	
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
		$tpl->loadTemplateFile('addEmpresa.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2"><br/>{error}</font>');
		
		//$ses = $page -> controller -> container(true);
		//unset($ses);
	
        //$page->accept($renderer);
        //$tpl->show();
		echo $page-> toHtml();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addGraduado', true);
$wizard->addPage(new Page_addGraduado('page1',$_SERVER['PHP_SELF'].'?name=Add_Empresa'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());

$wizard->run();
closetable();
include("footer.php");

?>