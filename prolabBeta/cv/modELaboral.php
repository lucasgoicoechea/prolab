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
class Page_addELaboral extends HTML_QuickForm_Page
{
	function buildForm(){

//-----------------------------------------------------------------------------//
//Acceso a la base de datos
	require_once "DB.php";

		
	$query ="Select * FROM usuarios_experiencia WHERE ";
	$query .="id='".$_GET["id"]."'";

	include("consultar.php");
//-----------------------------------------------------------------------------//
//Formulario
		

		$this->_formBuilt = true;
		
		$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		$inicio = $item["mes_ingreso"]."/1/".$item["ano_ingreso"];

		if ($item["ano_egreso"] == 0){
		$sigue =  'si';
		}
		else{
		$sigue =  'no';
		$fin = $item["mes_egreso"]."/1/".$item["ano_egreso"];
		}

		$this->setDefaults(array(
			'usuario' => $_GET["id"],
			'tipo' => $item["tipo"],
			'empresa' => $item["empresa"],
			'localidad' => $item["localidad"],
			'area' => $item["area"],
			'rubro' => $item["rubro"],
			'puesto' => $item["puesto"],

			'inicio' => $inicio,
			'fin' => $fin,
			'sigue' => $sigue,

			'responsabilidades' => $item["responsabilidades"],
			'motivo' => $item["motivo"],
			'persACargo' => $item["pers_cargo"],
			'observaciones' => $item["observaciones"],
			'remuneracion' => $item["remuneracion"]));

//------------------------------------------------------------------------------------------
		$this -> addElement('submit', $this->getButtonName('submit') , 'Guardar cambios',array('class' => 'botonG'));
	//	$this -> addElement('reset', 'reset' , 'Reset',array('class' => 'boton'));
		$this -> addElement('button', 'salir' ,'Volver al CV',array ('class' => 'botonG','onClick' => "JavaScript: location.href='".QUIT."'"));

//-------------------------------------------------------------------------------------------
		$this->addElement('header', 'titulo', 'Experiencia laboral');
		$this->addElement('header', 'subtitulo', 'Completa los datos sobre tu experiencia laboral');
				
		$this->addElement('hidden', 'usuario');


		$options1=array('contrato'=> 'Contrato','pasantia'=> 'Pasantia');
			
		$this->addElement('select', 'tipo', 'Forma de contratación:',$options1,array ('class' => 'select'));

		$this->addElement('text', 'empresa', 'Empresa:',array('class' => 'caja'));

		$this->addElement('text', 'localidad', 'Localidad:',array('class' => 'caja'));

		//AREA DE DESEMPEÑO

		$areas=array( 'Administraci&oacute;n/Serv. Gen.' => 'Administraci&oacute;n/Serv.Gen.', 'Agronom&iacute;a' => 'Agronom&iacute;a', 'Arquitectura' => 'Arquitectura', 'Auditor&iacute;a' => 'Auditor&iacute;a', 'Capacitaci&oacute;n' => 'Capacitaci&oacute;n', 'Comercial' => 'Comercial', 'Comercio Exterior' => 'Comercio Exterior', 'Compras' => 'Compras', 'Comunicaciones/RRPP' => 'Comunicaciones/RRPP  ', 'Consultor&iacute;as' => 'Consultor&iacute;as', 'Contabilidad' => 'Contabilidad', 'Control de Calidad' => 'Control de Calidad', 'Cr&eacute;dito y Cobranzas' => 'Cr&eacute;ditoy Cobranzas', 'Desarrollo' => 'Desarrollo', 'Dise&ntilde;o' => 'Dise&ntilde;o', 'Distribuci&oacute;n' => 'Distribuci&oacute;n', 'Edici&oacute;n' => 'Edici&oacute;n', 'Educaci&oacute;n' => 'Educaci&oacute;n', 'Estudios' => 'Estudios', 'Finanzas' => 'Finanzas', 'Inform&aacute;tica y Sistemas' => 'Inform&aacute;ticay Sistemas', 'Ingenier&iacute;a' => 'Ingenier&iacute;a', 'Investigaci&oacute;n' => 'Investigaci&oacute;n  ', 'Legal/Fiscal&iacute;a' => 'Legal/Fiscal&iacute;a  ', 'Log&iacute;stica/Distribuci&oacute;n' => 'Log&iacute;stica/Distribuci&oacute;n  ', 'Mantenimiento' => 'Mantenimiento', 'Marketing' => 'Marketing', 'Medicina' => 'Medicina', 'Odontolog&iacute;a' => 'Odontolog&iacute;a', 'Operaciones' => 'Operaciones', 'Otra' => 'Otra', 'Planificaci&oacute;n y Estrategi' => 'Planificaci&oacute;ny Estrategi', 'Producci&oacute;n' => 'Producci&oacute;n', 'Proyectos' => 'Proyectos', 'Psicolog&iacute;a' => 'Psicolog&iacute;a', 'Publicidad' => 'Publicidad', 'Recursos Humanos' => 'Recursos Humanos', 'Servicio al Cliente' => 'Servicio al Cliente  ', 'Ventas' => 'Ventas');
			
		$this->addElement('select', 'area', 'Area de desempeño:',$areas,array ('class' => 'select'));
		

		//RUBRO DE LA EMPRESA

		$rubros=array('Aeronaves/Astilleros' => 'Aeronaves/Astilleros', 'Agr&iacute;cola/Ganadera' => 'Agr&iacute;cola/Ganadera', 'Agroindustria' => 'Agroindustria', 'Agua/Obras Sanitarias' => 'Agua/Obras Sanitarias', 'Alimentos' => 'Alimentos', 'Arquitectura/Dise&ntilde;o/Decoraci&oacute;n' => 'Arquitectura/Dise&ntilde;o/Decoraci&oacute;n', 'Automotriz' => 'Automotriz', 'Bancos/Financieras' => 'Bancos/Financieras', 'Carpinter&iacute;a/Muebles' => 'Carpinter&iacute;a/Muebles', 'Cient&iacute;fica' => 'Cient&iacute;fica', 'Combustibles (Gas/Petr&oacute;leo)' => 'Combustibles (Gas/Petr&oacute;leo)', 'Comercial' => 'Comercial', 'Comercio Mayorista (Intermediac./Dist.)' => 'Comercio Mayorista (Intermediac./Dist.)', 'Comercio Minorista' => 'Comercio Minorista', 'Confecciones' => 'Confecciones', 'Construcci&oacute;n' => 'Construcci&oacute;n', 'Consultor en RRHH' => 'Consultor en RRHH', 'Consultora de Sistemas' => 'Consultora de Sistemas', 'Consultor&iacute;a/Asesor&iacute;a' => 'Consultor&iacute;a/Asesor&iacute;a', 'Consumo Masivo (Bebidas/Alimentos/etc)' => 'Consumo Masivo (Bebidas/Alimentos/etc)', 'Defensa' => 'Defensa', 'Educaci&oacute;n/Capacitaci&oacute;n' => 'Educaci&oacute;n/Capacitaci&oacute;n', 'Electricidad (Distribuci&oacute;n/Generaci&oacute;n)' => 'Electricidad (Distribuci&oacute;n/Generaci&oacute;n)', 'Electr&oacute;nica' => 'Electr&oacute;nica', 'Entretenimiento' => 'Entretenimiento', 'Estudios Jur&iacute;dicos/Contables' => 'Estudios Jur&iacute;dicos/Contables', 'Exportaci&oacute;n/Importaci&oacute;n' => 'Exportaci&oacute;n/Importaci&oacute;n', 'Farmac&eacute;utica' => 'Farmac&eacute;utica', 'Forestal/Papel/Celulosa' => 'Forestal/Papel/Celulosa', 'Frigor&iacute;ficos' => 'Frigor&iacute;ficos', 'Gobierno' => 'Gobierno', 'Head-Hunters' => 'Head-Hunters', 'Hoteler&iacute;a/Turismo/Restaurantes' => 'Hoteler&iacute;a/Turismo/Restaurantes', 'Imprenta/Editoriales' => 'Imprenta/Editoriales', 'Ingenier&iacute;a' => 'Ingenier&iacute;a', 'Inmobiliaria/Propiedades' => 'Inmobiliaria/Propiedades', 'Internet' => 'Internet', 'Inversiones (Soc./C&iacute;as. Holding)' => 'Inversiones (Soc./C&iacute;as. Holding)', 'Log&iacute;stica/Distribuci&oacute;n' => 'Log&iacute;stica/Distribuci&oacute;n', 'Manufacturas Varias' => 'Manufacturas Varias', 'Materiales de Construcci&oacute;n' => 'Materiales de Construcci&oacute;n', 'Medicina/Salud' => 'Medicina/Salud', 'Medios de Comunicaci&oacute;n' => 'Medios de Comunicaci&oacute;n', 'Metalmec&aacute;nica' => 'Metalmec&aacute;nica', 'Miner&iacute;a' => 'Miner&iacute;a', 'Naviera' => 'Naviera', 'Organizaciones sin Fines de Lucro' => 'Organizaciones sin Fines de Lucro', 'Otro' => 'Otro', 'Outsourcing' => 'Outsourcing', 'Pesquera/Cultivos Marinos' => 'Pesquera/Cultivos Marinos', 'Publicidad/Marketing/RRPP' => 'Publicidad/Marketing/RRPP', 'Qu&iacute;mica' => 'Qu&iacute;mica', 'Seguros/Previsi&oacute;n' => 'Seguros/Previsi&oacute;n', 'Selecci&oacute;n de Personal' => 'Selecci&oacute;n de Personal', 'Servicios Financieros Varios' => 'Servicios Financieros Varios', 'Servicios Varios' => 'Servicios Varios', 'Siderurgia' => 'Siderurgia', 'Tecnolog&iacute;as de Informaci&oacute;n' => 'Tecnolog&iacute;as de Informaci&oacute;n', 'Telecomunicaciones' => 'Telecomunicaciones', 'Textil/Calzado' => 'Textil/Calzado', 'Transporte' => 'Transporte');
			
		$this->addElement('select', 'rubro', 'Rubro de la empresa:',$rubros,array ('class' => 'select'));

		//PUESTO OCUPADO

		$puestos=array('Administrador' => 'Administrador' , 'Administrador de Base de Datos' => 'Administrador  de Base de Datos' , 'Administrador de Redes' => 'Administrador de  Redes' , 'Analista' => 'Analista' , 'Analista de Sistemas' => 'Analista de Sistemas ' , 'Apoyo Administrativo' => 'Apoyo Administrativo ' , 'Asistente' => 'Asistente' , 'Auxiliar' => 'Auxiliar' , 'Captadora/Consultor Financiero' => 'Captadora/Consultor  Financiero' , 'Comprador' => 'Comprador' , 'Consultor/Asesor' => 'Consultor/Asesor' , 'Contador' => 'Contador' , 'Dibujante' => 'Dibujante' , 'Director de Proyecto' => 'Director de Proyecto ' , 'Dise&ntilde;ador Gr&aacute;fico' => 'Dise&ntilde;ador  Gr&aacute;fico' , 'Dise&ntilde;ador Industrial' => 'Dise&ntilde;ador  Industrial' , 'Ejecutivo Junior' => 'Ejecutivo Junior' , 'Ejecutivo Senior' => 'Ejecutivo Senior' , 'Gerente/Director de &Aacute;rea' => 'Gerente/Director  de &Aacute;rea' , 'Gerente/Director de Divisi&oacute;n' => 'Gerente/Director  de Divisi&oacute;n' , 'Gerente/Director General' => 'Gerente/Director  General' , 'Ingeniero de Proceso' => 'Ingeniero de Proceso ' , 'Ingeniero Junior' => 'Ingeniero Junior' , 'Ingeniero Senior' => 'Ingeniero Senior' , 'Instructor/Capacitador' => 'Instructor/Capacitador ' , 'Jefe &Aacute;rea/Secci&oacute;n/Depto./Local' => 'Jefe  &Aacute;rea/Secci&oacute;n/Depto./Local' , 'Laboratorista/Mec&aacute;nico Dental' => 'Laboratorista/Mec&aacute;nico  Dental' , 'L&iacute;der de Proyecto' => 'L&iacute;der de  Proyecto' , 'Otro' => 'Otro' , 'Otro Profesional' => 'Otro Profesional' , 'Profesor' => 'Profesor' , 'Programador' => 'Programador' , 'Selector de personal' => 'Selector de personal ' , 'Servicio al Cliente' => 'Servicio al Cliente ' , 'Subgerente de &Aacute;rea' => 'Subgerente de &Aacute;rea ' , 'Subgerente/Subdirector General' => 'Subgerente/Subdirector  General' , 'Supervisor' => 'Supervisor' , 'T&eacute;cnico (distintas especialidades)' => 'T&eacute;cnico  (distintas especialidades)' , 'Traductor/Int&eacute;rprete' => 'Traductor/Int&eacute;rprete ' , 'Vendedor' => 'Vendedor' , 'Webmaster' => 'Webmaster');
			
		$this->addElement('select', 'puesto', 'Puesto ocupado:',$puestos,array ('class' => 'select'));


		//RESPONSABILIDADES
		
		$attrs = array("class"=>"caja", "rows"=>"5", "cols"=>"35");

		$this->addElement('textarea', 'responsabilidades', 'Responsabilidades:', $attrs);


		$this->addElement('date', 'inicio', 'Inicio de relación:', array('format'=>'F-Y', 'minYear'=>date("Y"), 'maxYear'=>1980,'language'=>'es'),array('class'=>'select'));
		

		$siguer=array('si'=> 'Si','no'=> 'No');
		$this->addElement('select', 'sigue', 'Seguis trabajando:',$siguer,array ('class' => 'select'));

		$this->addElement('date', 'fin',  array('Fín de relación:','Si seguis trabajando no selecciones fecha de fin de relación'), array('format'=>'F-Y', 'minYear'=>date("Y"), 'maxYear'=>1980,'language'=>'es'),array('class'=>'select'));

		$motivos = array('Ninguno' => 'Ninguno','Cierre de la empresa' => 'Cierre de la empresa' , 'Despido' => 'Despido' , 'Fin del contrato/pasant&iacute;a' => 'Fin delcontrato/pasant&iacute;a' , 'Otros' => 'Otros' , 'Reestructuraci&oacute;n' => 'Reestructuraci&oacute;n' , 'Renuncia' => 'Renuncia');
		$this->addElement('select', 'motivo', 'Motivo de egreso:',$motivos,array ('class' => 'select'));

		
		$this->addElement('text', 'persACargo', 'Cantidad de personas a cargo:',array('style' => 'width: 5em;','class' => 'caja'));

		$this->addElement('textarea', 'observaciones', 'Observaciones:', $attrs);
		
	
		$this->addElement('text', 'remuneracion', 'Remuneracion mensual:',array('style' => 'width: 5em;','class' => 'caja'));

//--------------------------------------------------------------------------------------------
		$this -> setRequiredNote('<span style="font-size:80%; color:#ff0000;">*</span><span style="font-size:80%;"> Son campos obligatorios</span>');

		$this->setDefaultAction('preview');
//--------------------------------------------------------------------------------------------
//reglas de validación
		
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
		
		$mesI = $values["inicio"]["F"];
		$anioI = $values["inicio"]["Y"];
		$mesE =	$values["fin"]["F"];
		$anioE = $values["fin"]["Y"];
		
		if ($values["sigue"] == 'si'){
		$mesE =	('sique relacionado');
		$anioE = '';
		}
		
		$query = "UPDATE usuarios_experiencia SET ";
		$query .="tipo='".$values["tipo"]."',";
		$query .="empresa='".$values["empresa"]."',";
		$query .="localidad='".$values["localidad"]."',";
		$query .="area='".$values["area"]."',";
		$query .="rubro='".$values["rubro"]."',";
		$query .="puesto='".$values["puesto"]."',";
		$query .="responsabilidades='".$values["responsabilidades"]."',";
	
		$query .="mes_ingreso='".$mesI."',";
		$query .="ano_ingreso='".$anioI."',";
		$query .="mes_egreso='".$mesE."',";
		$query .="ano_egreso='".$anioE."',";

		$query .="motivo='".$values["motivo"]."',";
		$query .="pers_cargo='".$values["persACargo"]."',";
		$query .="observaciones='".$values["observaciones"]."',";
		$query .="remuneracion='".$values["remuneracion"]."' ";
		$query .="WHERE id ='".$values["usuario"]."'";

		include("consultar.php");

		$page->removeElement($page->getButtonName('preview'));
		$page->removeElement('reset');
		$page->removeElement('subtitulo');
		$page->removeElement($page->getButtonName('submit'));
		

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

		$tpl->loadTemplateFile('addELaboral.html');

		$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);
		$renderer->setRequiredTemplate('<font color="red" size="2">*</font>{label}');
		$renderer->setErrorTemplate('{html}&nbsp;<font color="red" size="2">{error}<br/></font>');

        $page->accept($renderer);
        $tpl->show();
    }
}//end ActionDisplay Class


$wizard =& new HTML_QuickForm_Controller('addELaboral', true);

$wizard->addPage(new Page_addELaboral('page1'));

$wizard->addAction('display', new ActionDisplay());
$wizard->addAction('preview', new ActionPreview());
$wizard->addAction('modificar', new ActionModificar());
$wizard->addAction('process', new ActionProcess());


$wizard->run();


?>