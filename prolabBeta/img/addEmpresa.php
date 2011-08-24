<?php

//*************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','ver_empresas_new.php');

//formulario de llenado de datos (pagina 1)
class Page_addGraduado extends HTML_QuickForm_Page
{
	function buildForm(){
//-----------------------------------------------------------------------------//
//Formulario
		//levantamos las areas de negocio
		require_once 'DB.php';
		$query = "SELECT * ";
		$query .="FROM area_negocio ";		
		include("consultar.php");
		$areas = $result;

		//levantamos los rubros de empresa
		require_once 'DB.php';
		$query = "SELECT * ";
		$query .="FROM rubro_empresa ";		
		include("consultar.php");
		$rubros = $result;
	
		$this -> _formBuilt = true;
		$this -> addElement('header', 'titulo', 'Registrar nueva empresa en la base de datos');
		//GUARDO DIRECTAMENTE
		$this->addElement('submit',$this->getButtonName('submit'),'Guardar',array('class' => 'boton'));
		//$this -> addElement('submit', $this->getButtonName('preview') , 'Guardar',array('class' => 'boton'));
		$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Salir',array ('class' => 'boton','onClick' => "JavaScript: location.href='".QUIT."'"));
		//if(!isset($_GET['convenio'])){//acceso desde convenio
			//********************Datos de conexion**********************//

			$this->addElement('header', 'subtitulo0', 'Datos del Conexion');				
			$this->addElement('text', 'usuario', 'Usuario:',array('class' => 'caja'));
			$this->addElement('text', 'clave', 'Clave de acceso al sistema:',array('class' => 'caja'));		
		//}

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

		$radio4[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', true);
		$radio4[] = &HTML_QuickForm::createElement('radio', null, null, 'No', false);
		$this->addGroup($radio4, 'contacto_es_receptor', '¿Es receptor de información?:');
		
		//***************************************************************//
		$this->addElement('header', 'subtitulo2', 'Datos de la empresa');

		$radio2[] = &HTML_QuickForm::createElement('radio', null, null, 'Fisica', 'fisica');
		$radio2[] = &HTML_QuickForm::createElement('radio', null, null, 'Juridica', 'juridica');
		$this->addGroup($radio2, 'tipo_persona', 'Persona:');

		$this->addElement('text', 'nombrecomercial', 'Nombre Fantasía:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'razonsocial', 'Razón social:',array('style' => 'width: 15em;','class' => 'caja'));

		$radio3[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', true);
		$radio3[] = &HTML_QuickForm::createElement('radio', null, null, 'No', false);
		$this->addGroup($radio3, 'es_sucursal', '¿Es sucursal de otra empresa?:');

		$element = & $this->addElement('select', 'area_negocio', 'Area de Negocio:',null,array ('class' => 'select'));
		$element -> loadDbResult($areas,"descripcion","id");

		$element = & $this->addElement('select', 'id_rubro_empresa', 'Rubro:',null,array ('class' => 'select'));
		$element -> loadDbResult($rubros,"descripcion","id");
		

		//$this->addElement('text', 'industria', 'Industria:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('header', 'subtitulo3', 'Datos de contacto de la empresa');
		$this->addElement('text', 'pais', 'País:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'provincia', 'Provincia:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'ciudad', 'Ciudad:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'calle', 'Calle:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'numero', 'Numero:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'piso', 'Piso:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'cp', 'Codigo Postal:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('text', 'cuit1', 'Cuit:',array('style' => 'width: 2em;','class' => 'caja', 'maxlength' => '2', 'id'=>'cuit1', 'onkeyup'=>'updateCuit()'));
		$this->addElement('text', 'cuit2', 'Cuit:',array('style' => 'width: 5em;','class' => 'caja', 'maxlength' => '8', 'id'=>'cuit2', 'onkeyup'=>'updateCuit()'));
		$this->addElement('text', 'cuit3', 'Cuit:',array('style' => 'width: 1em;','class' => 'caja', 'maxlength' => '1', 'id'=>'cuit3', 'onkeyup'=>'updateCuit()'));
		
		$options=array('cf'=> 'Consumidor final','ex'=> 'Exento','mon'=> 'Monotributo','ri'=> 'responsable inscripto','rno'=> 'responsable no inscripto');
			
		$this->addElement('select', 'iva', 'Condicion IVA:',$options,array ('class' => 'select'));
				
		$this->addElement('text', 'emaile', 'E-mail:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'telefonoe', 'Teléfono:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'faxe', 'Fax:',array('style' => 'width: 15em;','class' => 'caja'));

		$this->addElement('text', 'web', 'Página web:',array('style' => 'width: 15em;','class' => 'caja'));
		
		$this->addElement('header', 'subtitulo4', 'Información adicional');

		/*$radioPoseeConv[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', true);
		$radioPoseeConv[] = &HTML_QuickForm::createElement('radio', null, null, 'No', false);
		$this->addGroup($radioPoseeConv, 'posee_conv_marco', 'Posee convenio marco:');*/

		$radio5[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', 'y');
		$radio5[] = &HTML_QuickForm::createElement('radio', null, null, 'No', 'n');
		$this->addGroup($radio5, 'activo', 'Activa:');

		$this->addElement('text', 'empleados', 'Cantidad de empleados:',array('style' => 'width: 5em;','class' => 'caja'));

		$attrs = array("class"=>"caja",
                     "rows"=>"5",
                     "cols"=>"60");
		$this->addElement('textarea', 'descripcion', 'Observaciones:', $attrs);
		
		if(isset($_GET['origen'])){
			if($_GET['origen']=='convenio'){
				$_SESSION['origen'] = "convenio";				
			}else{
				$_SESSION['origen'] = "empresa";
			}
		}
		//echo "Valor: ".$_SESSION['origen'];
		
//-----------------------------------------------------------------------------//
//reglas de validación
		/*$this->addRule('sexo', 'Debe completar', 'required');
		$this->addRule('nombre', 'Debe completar', 'required');
		$this->addRule('apellido', 'Debe completar', 'required');
		//$this->addRule('nombrecomercial', 'Debe completar', 'required');
		$this->addRule('razonsocial', 'Debe completar', 'required');
		$this->addRule('telefono', 'Debe completar', 'required');		
		$this->addRule('calle', 'Debe completar', 'required');
		$this->addRule('numero', 'Debe completar', 'required');
		$this->addRule('cuit', 'Debe completar', 'required');
		$this->addRule('cp', 'Debe completar', 'required');
		$this->addRule('pais', 'Debe completar', 'required');
		$this->addRule('provincia', 'Debe completar', 'required');
		$this->addRule('ciudad', 'Debe completar', 'required');		
		$this->addRule('telefono', 'Telefono: Solo caracteres numericos', 'numeric');*/
		$this->addRule('nombrecomercial', 'Debe completar', 'required');
		$this->addRule('razonsocial', 'Debe completar', 'required');
		$this->addRule('activo', 'Debe completar', 'required');

		//-----------------------VALIDADOR DE CUIT UNICO---------------------------------------

		$this->addRule('cuit1', 'Debe completar', 'required');	
		$this->addRule('cuit2', 'Debe completar', 'required');	
		$this->addRule('cuit3', 'Debe completar', 'required');	
		$this->addRule('cuit1', 'Solo caracteres numericos', 'numeric');
		$this->addRule('cuit2', 'Solo caracteres numericos', 'numeric');
		$this->addRule('cuit3', 'Solo caracteres numericos', 'numeric');
	    $this->registerRule('existe_cuit', 'callback', 'existe_cuit', get_class($this));
	    $this->addRule('cuit','Este CUIT ya existe en el sistema, esta empresa ya fue cargada','existe_cuit');
		//----------------------------------------------------------------------------------------

		if($_SESSION['origen'] == "empresa"){			
			$this->addRule('emaile', 'Debe completar', 'required');
			$this->addRule('emaile', 'E-Mail invalido', 'email');
			$this->addRule('telefonoe', 'Debe completar', 'required');
			$this->addRule('id_rubro_empresa', 'Debe completar', 'required');
			$this->addRule('area_negocio', 'Debe completar', 'required');
			$this->addRule('tipo_persona', 'Debe completar', 'required');		
			//-----------------------VALIDADOR DE USUARIO UNICO---------------------------------------
  		    $this->registerRule('validar_userName', 'callback', 'validar_userName', get_class($this));
		    $this->addRule('usuario','Este usuario ya existe en el sistema, por favor ingrese  otro','validar_userName');
			//----------------------------------------------------------------------------------------
		    $this->addRule('usuario', 'Debe completar el campo del usuario', 'required');
		    $this->addRule('clave', 'Debe completar el campo del usuario', 'required');
		    $this->addRule('usuario', 'Solo puede completar el campo con caracteres en minuscula y n&uacute;meros','regex','/^[a-z0-9]+$/');
		    $this->addRule('usuario', 'Deberias poner entre 6 a 20 caracteres', 'rangelength', array(6,20));
		    $this->addRule('clave', 'Deberias poner entre 6 a 20 caracteres', 'rangelength', array(6,20));
		    $this->addRule('clave', 'Solo puede completar el campo con caracteres en minuscula y n&uacute;meros','regex','/^[a-z0-9]+$/');				  
		}
		

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

	function existe_cuit($value,$log = null){		
		require_once "DB.php";
		$value= ereg_replace ("-", "", $value);
		$query  = "SELECT * ";
		$query .= "FROM empresas ";
		$query .= "WHERE replace (cuit, '-', '')='".$value."'";
		include("consultar.php");
		if ($exist_cuit = $result -> numRows()){
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
			//$page->addElement('submit',$page->getButtonName('modificar'),'Modificar',array('class' => 'boton'));
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

	$page->isFormBuilt() or $page->buildForm();
    $pageName =  $page->getAttribute('id');
    $data     =& $page->controller->container();
    $data['values'][$pageName] = $page->exportValues();
    $data['valid'][$pageName]  = $page->validate();

	if (!$data['valid'][$pageName]) {
		//si existen errores en la pagina entonces se muestra con los cartelitos de errores
		return $page->handle('display');
	}else{


	require_once "DB.php";

    $values = $page->controller->exportValues();

	
	$fecha = date("Y-m-d");

	
	$query  ="INSERT INTO empresas (usuario,clave,fecha_ingreso,nombre,apellido,sexo,email,telefono,puesto,razonsocial,nombrecomercial, pais,provincia,ciudad,calle,numero,piso,cp,cuit,iva,emaile,telefonoe,faxe,web,descripcion,empleados, tipo_persona, es_sucursal, area_negocio, contacto_es_receptor, id_rubro_empresa, posee_conv_marco, activo, carga_desde_convenio) VALUES (";
	/*if(isset($_GET['convenio'])){//acceso desde convenio
	  $query .="'".$values["cuit"]."',";
	  $query .="'".$values["cuit"]."',";
	}else{*/
   	  $query .="'".$values["usuario"]."',";
	  $query .="'".$values["clave"]."',";
	//}
	$query .="'".$fecha."',";
	$query .="'".$values["nombre"]."',";
	$query .="'".$values["apellido"]."',";
	$query .="'".$values["sexo"]."',";
	$query .="'".$values["email"]."',";
	$query .="'".$values["telefono"]."',";
	$query .="'".$values["puesto"]."',";
	$query .="'".$values["razonsocial"]."',";
	$query .="'".$values["nombrecomercial"]."',";
	//$query .="'".$values["industria"]."',";
	$query .="'".$values["pais"]."',";
	$query .="'".$values["provincia"]."',";
	$query .="'".$values["ciudad"]."',";
	$query .="'".$values["calle"]."',";
	$query .="'".$values["numero"]."',";
	$query .="'".$values["piso"]."',";
	$query .="'".$values["cp"]."',";
	$query .="'".$values["cuit1"]."-".$values["cuit2"]."-".$values["cuit3"]."',";
	$query .="'".$values["iva"]."',";
	$query .="'".$values["emaile"]."',";
	$query .="'".$values["telefonoe"]."',";
	$query .="'".$values["faxe"]."',";
	$query .="'".$values["web"]."',";
	$query .="'".$values["descripcion"]."',";	
	$query .="'".$values["empleados"]."',";
	$query .="'".$values["tipo_persona"]."',";
	$query .="'".$values["es_sucursal"]."',";
	$query .="'".$values["area_negocio"]."',";
	$query .="'".$values["contacto_es_receptor"]."',";
	$query .="'".$values["id_rubro_empresa"]."',";
	$query .="'".$values["posee_conv_marco"]."',";	
	$query .="'".$values["activo"]."',";
	//seteo carga_desde_convenio dependiendo si se hace desde el menu de convenio o empresa
	if($_SESSION['origen'] == "empresa"){
		$query .="false)";
	}else{
		$query .="true)";
	}
	//echo $query;
	
	include("consultar.php");
	
	$page->removeElement($page->getButtonName('preview'));
	$page->removeElement('reset');

	//agregamos mensaje resultado
	$page->addElement('header','ok','Los datos fueron agregados con exito ');
	//congelamos el formulario para vista previa
	//$page -> freeze();

	//reseteamos el contenedor del controlador para que la proxima ves que se 
	//carge el formulario no se vuelvan a cargar los antiguos datos
	$ses = $page -> controller -> container(true);
	unset($ses);
	}
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

		$tpl->loadTemplateFile('addEmpresa.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2"><br/>{error}</font>');
		
		$ses = $page -> controller -> container(true);
		unset($ses);
	
        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addGraduado', true);
$wizard->addPage(new Page_addGraduado('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>
	
<script language="javascript" type="text/javascript">
var url = "validarCuitExistente.php?param=";
function handleHttpResponse() {
	if (http.readyState == 4){	
		document.getElementById('mensaje').value =http.responseText;		
		document.getElementById('mensaje').style.display='block';
	}

}

function updateCuit() {
	var cuit1 = document.getElementById("cuit1").value;
	var cuit2 = document.getElementById("cuit2").value;
	var cuit3 = document.getElementById("cuit3").value;

	http.open("GET", url + escape(cuit1)+"-"+escape(cuit2)+"-"+escape(cuit3), true);
	http.onreadystatechange = handleHttpResponse;	
	http.send(null);
	
}

function getHTTPObject() {
var xmlhttp;
 if (window.ActiveXObject){
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")	
  }
 else
 if (window.XMLHttpRequest){
	xmlhttp=new XMLHttpRequest()
  }
 return xmlhttp;
}

var http = getHTTPObject();

</script>
	