<?php

//*************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','../../noticias.html');

//formulario de llenado de datos (pagina 1)
class Page_addGraduado extends HTML_QuickForm_Page
{
	function buildForm(){
//-----------------------------------------------------------------------------//
//Formulario
		//levantamos las empresas
		require_once 'DB.php';
		$query = "SELECT id,nombrecomercial ";
		$query .="FROM empresas ";
		$query .="WHERE NOT (nombrecomercial = '') AND activo='y' ";
		$query .="ORDER BY nombrecomercial";
		include("consultar.php");
		$empresas = $result;

		//levantamos los tipos de ofertas
		require_once 'DB.php';
		$query = "SELECT id_tipo_oferta,desc_tipo_oferta ";
		$query .="FROM tipo_oferta ";
		$query .="ORDER BY desc_tipo_oferta";
		include("consultar.php");
		$tipo_oferta = $result;

		//levantamos los usuarios
		require_once 'DB.php';
		$query = "SELECT id, CONCAT(nombre, ' ',apellido) as nombreAp ";
		$query .="FROM admin ";
		$query .="WHERE id!= 10 ";
		$query .="ORDER BY apellido, nombre";
		include("consultar.php");
		$usuarios = $result;

		//levantamos los tipos de pedido
		require_once 'DB.php';
		$query = "SELECT id, descripcion ";
		$query .="FROM tipo_pedido ";
		$query .="ORDER BY descripcion";
		include("consultar.php");
		$tipo_pedido = $result;

		
		$this->_formBuilt = true;
		$this->addElement('header', 'titulo', 'Ingresar nueva oferta');
		//sacamos esa pantalla intermedia posterior al boton continuar
		//$this -> addElement('submit', $this->getButtonName('preview') , 'Continuar',array('class' => 'boton'));
		$this -> addElement('reset', 'reset' , 'Limpiar',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Salir',array ('class' => 'boton','onClick' => "JavaScript: location.href='".QUIT."'"));

		/****************		PEDIDO	****************/
		$this->addElement('header', 'subtitulo0', 'Pedido');
	    $this->addElement('text', 'fecha_pedido', 'Fecha del Pedido:',array('style' => 'width: 10em;','class' => 'caja', 'readOnly'=>'true', 'id'=>'fecha_pedido'));
		$element = & $this->addElement('select', 'responsable', 'Responsable:',null,array ('class' => 'select'));
		$element -> loadDbResult($usuarios,"nombreAp","id");

		$element = & $this->addElement('select', 'tipoPedido', 'Tipo de Pedido:',null,array ('class' => 'select'));
		$element -> loadDbResult($tipo_pedido,"descripcion","id");

		

		//********************Datos cliente**********************//
		$this->addElement('header', 'subtitulo1', 'Datos del Cliente');

		$element = & $this->addElement('select', 'empresa', 'Cliente:',null,array ('class' => 'select'));
		$element -> loadDbResult($empresas,"nombrecomercial","id");
		
		$this->addElement('text', 'cargo', 'Nombre del Puesto:',array('style' => 'width: 20em;','class' => 'caja'));
		$this->addElement('text', 'fecha_incorporacion', 'Fecha de Incorporacion Aproximada:',array('style' => 'width: 10em;','class' => 'caja', 'readOnly'=>'true'));
		$this->addElement('text', 'cant_puestos', 'Cantidad de puestos a cubrir:',array('style' => 'width: 10em;','class' => 'caja'));

		/*$radio[] = &HTML_QuickForm::createElement('radio', null, null, 'Contrato', 'CONTRATO');
		$radio[] = &HTML_QuickForm::createElement('radio', null, null, 'Pasantia', 'PASANTIA');
		$radio[] = &HTML_QuickForm::createElement('radio', null, null, 'Beca de Experiencia Laboral', 'BECA');
		$this->addGroup($radio, 'tipoOf', 'Tipo de oferta:');*/

		$attrs = array("class"=>"caja",
                     "rows"=>"5",
                     "cols"=>"50");

		//********************Requerimientos del Puesto**********************//

		$this->addElement('header', 'subtitulo2', 'Requerimientos del Puesto');

		$this->addElement('text', 'edad', 'Edad:',array('style' => 'width: 20em;','class' => 'caja'));

		$radio1[] = &HTML_QuickForm::createElement('radio', null, null, 'Masculino', 'M');
		$radio1[] = &HTML_QuickForm::createElement('radio', null, null, 'Femenino', 'F');
		$radio1[] = &HTML_QuickForm::createElement('radio', null, null, 'Indistinto', 'I');
		$this->addGroup($radio1, 'sexo', 'Sexo:');
		$this->setDefaults(array('sexo' => 'I'));

		$this->setDefaults(array('sexo' => $selectedRadioValue));

	
		$this->addElement('textarea', 'solicitud', 'Solicitud:', $attrs);


		$this->addElement('textarea', 'conocimientos', 'Conocimientos:', $attrs);

		$this->addElement('textarea', 'experiencia', 'Experiencia laboral requerida:',$attrs);


		$this->addElement('text', 'actPer', 'Perfil de Personalidad:',array('style' => 'width: 20em;','class' => 'caja'));

		$this->addElement('textarea', 'habilidades', 'Estudios requeridos:',$attrs);

		$this->addElement('text', 'zonaResidencia', 'Zona de Residencia:',array('style' => 'width: 20em;','class' => 'caja'));

		$radio10[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', 1);
		$radio10[] = &HTML_QuickForm::createElement('radio', null, null, 'No', 0);
		$this->addGroup($radio10, 'disponibilidadViajar', 'Disponibilidad para viajar:');

		$radio3[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', 'SI');
		$radio3[] = &HTML_QuickForm::createElement('radio', null, null, 'No', 'NO');
		
		$this->addGroup($radio3, 'persACargo', 'Personal a cargo:');
		
		$this->addElement('text', 'cargoAOcupar', 'Cargo a ocupar:',array('style' => 'width: 20em;','class' => 'caja'));

		$this->addElement('text', 'movilidad', 'Movilidad Propia:',array('style' => 'width: 20em;','class' => 'caja'));

		/*$radio2[] = &HTML_QuickForm::createElement('radio', null, null, 'Aprendiz', 'Aprendiz');
		$radio2[] = &HTML_QuickForm::createElement('radio', null, null, 'Junior', 'Junior');
		$radio2[] = &HTML_QuickForm::createElement('radio', null, null, 'Semi-Senior', 'Semi-Senior');
		$radio2[] = &HTML_QuickForm::createElement('radio', null, null, 'Senior', 'Senior');
		$this->addGroup($radio2, 'categoria', 'Categoría:');
		*/
		$this->addElement('text', 'area', 'Area:',array('style' => 'width: 20em;','class' => 'caja'));

		$this->addElement('text', 'sector', 'Sector:',array('style' => 'width: 20em;','class' => 'caja'));

		$this->addElement('text', 'rotulo', 'Rotulo:',array('style' => 'width: 20em;','class' => 'caja'));
		/*
		$this->addElement('text', 'reportaA', 'Reporta a:',array('style' => 'width: 20em;','class' => 'caja'));

		$this->addElement('textarea', 'tareasEsp', 'Descripción de tareas especificas:', $attrs);
		*/		
		
		$this->addElement('textarea', 'tareasGen', 'Principales tareas a realizar:', $attrs);
		

		//******************Condiciones de Contratacion********************//
		$this->addElement('header', 'subtitulo3', 'Condiciones de Contratacion');

		$this->addElement('text', 'remuneracion', 'Remuneración:',array('style' => 'width: 20em;','class' => 'caja'));
		$this->addElement('text', 'horario', 'Horario:',array('style' => 'width: 30em;','class' => 'caja'));

		$this->addElement('text', 'lugarTrabajo', 'Lugar de trabajo:',array('style' => 'width: 20em;','class' => 'caja'));

		$element = & $this->addElement('select', 'tipoOf', 'Modalidad de Contratacion:',null,array ('class' => 'select'));
		$element -> loadDbResult($tipo_oferta,"desc_tipo_oferta","id_tipo_oferta");

		$this->addElement('textarea', 'infoAdicional', 'Observaciones:', $attrs);

		$this->addElement('textarea', 'aviso', 'Aviso:', $attrs);

		
		$radio4[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', 'SI');
		$radio4[] = &HTML_QuickForm::createElement('radio', null, null, 'No', 'NO');
		
		$this->addGroup($radio4, 'planCarrera', 'Plan de carrera:');
		
		$radio5[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', 'SI');
		$radio5[] = &HTML_QuickForm::createElement('radio', null, null, 'No', 'NO');
		
		$this->addGroup($radio5, 'planCap', 'Plan de capacitación:');
		


		//*************************************
		/*$this->addElement('header', 'subtitulo4', 'Información adicional');*/
	
		

		$this->addElement('header', 'subtitulo5', 'Publicación');
	
		$radio6[] = &HTML_QuickForm::createElement('radio', null, null, 'Si', 's');
		$radio6[] = &HTML_QuickForm::createElement('radio', null, null, 'No', 'n');
		
		$this->addGroup($radio6, 'publicar', 'Publicar oferta:');
		
		$radio8[] = &HTML_QuickForm::createElement('radio', null, null, 'Postulados y Preseleccionados', 's');
		$radio8[] = &HTML_QuickForm::createElement('radio', null, null, 'Solo Preseleccionados', 'n');
		
		$this->addGroup($radio8, 'mpostulados', 'Mostrar(PROLAB):');
		

		$this->addElement('submit',$this->getButtonName('submit'),'Guardar',array('class' => 'boton'));
		
//-----------------------------------------------------------------------------//
//reglas de validación
		$this->addRule('fecha_pedido', 'Debe completar', 'required');
		$this->addRule('responsable', 'Debe completar', 'required');
		$this->addRule('tipoPedido', 'Debe completar', 'required');

		$this->addRule('empresa', 'Debe completar', 'required');
		$this->addRule('cargo', 'Debe completar', 'required');
		$this->addRule('fecha_incorporacion', 'Debe completar', 'required');
	
		$this->addRule('publicar', 'Debe completar', 'required');
	    $this->addRule('mpostulados', 'Debe completar', 'required');
		$this->addRule('aviso', 'Debe completar', 'required');
		$this->addRule('cant_puestos', 'Solo caracteres numericos', 'numeric');

		/*$this->addRule('telefono', 'Telefono: Solo caracteres numericos', 'numeric');
		$this->addRule('nombre','Apellido y nombres, letras solamente', 'nopunctuation');
		
		$this->addRule('numdoc', 'Documento: Solo caracteres numericos', 'numeric');
		$this->addRule('email', 'Dirección de e-mail invalida', 'email');*/
		

		//-----------------------------------------------------------------------------//
		//filtros

		$this->applyFilter('__ALL__', 'trim');

		//$this->applyFilter('__ALL__', 'strtoupper');

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
			//$page->addElement('submit',$page->getButtonName('submit'),'Agregar',array('class' => 'boton'));
			$page->addElement('submit',$page->getButtonName('modificar'),'Modificar',array('class' => 'boton'));
			$page->removeElement($page->getButtonName('preview'));
			$page->removeElement('reset');
			//$page -> freeze();
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

		//si se pulsa en el boton de agregar de la pagina de vista previa 
		//se prosesa el formulario y se muestran los datos agregados
		require_once "DB.php";

		$values = $page->controller->exportValues();

		$fecha = date("Y-m-d");

		$query = "SELECT * ";
		$query .="FROM empresas ";
		$query .="WHERE id = '".$values["empresa"]."';";
		
		include("consultar.php");
		$empresas = $result -> fetchRow(DB_FETCHMODE_ASSOC);


		/*$query ="START TRANSACTION; INSERT INTO oferta_cliente (id_empresa,fecha_incorporacion,puesto,cant_puestos) VALUES (";
		$query .="'".$values["empresa"]."',";
		$query .="'".$values["fecha_incorporacion"]."',";
		$query .="'".$values["cargo"]."',";
		$query .="'".$values["cant_puestos"]."'); ";*/
		//echo $query;
		//include("consultar.php");

		
		//$query .="SELECT  @idOC:=max(id) as id ";/*ademas si es multiusuario trae problemas*/
		//$query .="FROM oferta_cliente; ";
		
		//echo $query;
		//include("consultar.php");
		//$info_cliente = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		/*$query .="INSERT INTO condiciones_contratacion (remuneracion,horario,lugar_trabajo,id_tipo_oferta,observaciones) VALUES (";
		$query .="'".$values["remuneracion"]."',";
		$query .="'".$values["horario"]."',";
		$query .="'".$values["lugarTrabajo"]."',";
		$query .="'".$values["tipoOf"]."',";
		$query .="'".$values["infoAdicional"]."'); ";*/
		//echo $query;
		//include("consultar.php");*/

		//$query .="SELECT @idCC:=max(id) as id ";/* ademas si es multiusuario trae problemas*/
		//$query .="FROM condiciones_contratacion; ";
		
		//echo $query;
		//include("consultar.php");
		//$info_contratacion = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		
		/*anterior script***********
		$query ="INSERT INTO empresas_ofertas (empresa,fecha,tipoOf,busqueda,conocimientos,actitudes,edad,sexo,cargo,categoria,area,sector,reporta,subordinados,horario,tareasgenerales,tareasdiarias,remuneracion,plancarrera,plancapacitacion,otrainf,publicar,rotulo) VALUES (";
		*/

		$query ="INSERT INTO empresas_ofertas (fecha, id_tipo_pedido, id_responsable, edad, sexo, tareasgenerales, conocimientos, experiencia_requerida, actitudes, habilidades, zona_residencia, viaja, subordinados, movilidad, publicar, muestraPostulantes , aviso, fecha_incorporacion, puesto, cant_puestos, lugar_trabajo, remuneracion, horario, tipoOf, observaciones, id_empresa, rotulo, plancapacitacion, plancarrera, area, sector) VALUES (";
		
		
		$query .="'".$values["fecha_pedido"]."',";		
		$query .="'".$values["tipoPedido"]."',";
		$query .="'".$values["responsable"]."',";
		
		$query .="'".$values["edad"]."',";
		$query .="'".$values["sexo"]."',";
		$query .="'".$values["tareasGen"]."',";		
		$query .="'".$values["conocimientos"]."',";
		$query .="'".$values["experiencia"]."',";

		$query .="'".$values["actPer"]."',";		
		$query .="'".$values["habilidades"]."',";	
		$query .="'".$values["zonaResidencia"]."',";
		if($values["disponibilidadViajar"]=='SI'){
			$query .="1,";
		}else{
			$query .="0,";
		}
		$query .="'".$values["persACargo"]."',";
		$query .="'".$values["movilidad"]."',";				
		
		$query .="'".$values["publicar"]."',";
		$query .="'".$values["mpostulados"]."',";
		$query .="'".$values["aviso"]."', ";
		
		$query .="'".$values["fecha_incorporacion"]."',";
		$query .="'".$values["cargo"]."',";
		$query .="'".$values["cant_puestos"]."',";
		$query .="'".$values["lugarTrabajo"]."',";
		$query .="'".$values["remuneracion"]."',";
		$query .="'".$values["horario"]."',";
		$query .="'".$values["tipoOf"]."',";
		$query .="'".$values["infoAdicional"]."',";	
		$query .="'".$values["empresa"]."',";	
		$query .="'".$values["rotulo"]."',";	
		$query .="'".$values["planCap"]."',";	
		$query .="'".$values["planCarrera"]."',";	
		$query .="'".$values["area"]."',";	
		$query .="'".$values["sector"]."');";

//		$query .=" @idOC, ";
//		$query .=" @idCC );  COMMIT;";
		

		//echo $query;
		include("consultar.php");
		
		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement($page->getButtonName('submit'));

		//agregamos mensaje resultado
		$page->addElement('header','ok','Los datos fueron agregados con exito ');

		//$page->addElement('submit',$page->getButtonName('modificar'),'Modificar',array('class' => 'boton'));
		
		//congelamos el formulario para vista previa
		$page -> freeze();

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

		$tpl->loadTemplateFile('addOferta.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');
		
		$ses = $page -> controller -> container(true);
		unset($ses);
	
        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addGraduado', true);
$wizard->addPage(new Page_addGraduado('page1'));

$wizard->addAction('display', new ActionDisplay());
//$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>