<?php

//*************************************************************************//

require_once 'HTML/QuickForm/Controller.php';
require_once 'HTML/QuickForm/Action/Display.php';

session_start();

define('QUIT','viewOfertas.php');

//formulario de llenado de datos (pagina 1)
class Page_addGraduado extends HTML_QuickForm_Page
{
	function buildForm(){
//-----------------------------------------------------------------------------//
//Formulario
		//levantamos las empresas
		require_once 'DB.php';
		

		$query ="SELECT * FROM empresas_ofertas ";
		$query .="WHERE id = '".$_GET["id"]."'";
		include("consultar.php");
		
		$item = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		$query ="SELECT nombrecomercial FROM ";
		$query .="empresas_ofertas EO INNER JOIN empresas E ON (EO.id_empresa = E.id) ";
		$query .="WHERE EO.id = '".$_GET["id"]."'";
		include("consultar.php");
		$nombre = $result -> fetchRow(DB_FETCHMODE_ASSOC);

		$this->setDefaults(array(
			'empresa' => $nombre["nombrecomercial"],
			'tipoOf' => $item["tipoOf"],
			'solicitud' => $item["busqueda"],
			'conocimientos' => $item["conocimientos"],
			'actPer' => $item["actitudes"],
			'edad' => $item["edad"],
			'sexo' => $item["sexo"],
			'cargoAOcupar' => $item["cargo"],
			'categoria' => $item["categoria"],
			'area' => $item["area"],
			'sector' => $item["sector"],
			'reportaA' => $item["reporta"],
			'persACargo' => $item["persACargo"],
			'tareasGen' => $item["tareasgenerales"],
			'tareasEsp' => $item["tareasdiarias"],
			'horario' => $item["horario"],
			
			'remuneracion' => $item["remuneracion"],
			'planCarrera' => $item["plancarrera"],
			'planCap' => $item["plancapacitacion"],

			'infoAdicional' => $item["otrainf"],
				
		
			
		));

		
		$this->_formBuilt = true;
		$this->addElement('header', 'titulo', 'Perfil de busqueda');
		$this -> addElement('button', 'salir' ,'Volver',array ('class' => 'boton','onClick' => "JavaScript: location.href='".QUIT."'"));

		$this->addElement('header', 'subtitulo1', 'Datos de la empresa');

		//********************Datos**********************//
		$this->addElement('text', 'empresa', 'Empresa:',array('style' => 'width: 20em;','class' => 'caja'));

		if ('' != $item["tipoOf"])
		$this->addElement('text', 'tipoOf', 'Tipo de oferta:',array('style' => 'width: 20em;','class' => 'caja'));
		

		$this->addElement('header', 'subtitulo2', 'Perfil de busqueda');

		if ('' != $item["busqueda"])
		$this->addElement('text', 'solicitud', 'Solicitud:',array('style' => 'width: 20em;','class' => 'caja'));
		
		if ('' != $item["conocimientos"])
		$this->addElement('text', 'conocimientos', 'Conocimientos:',array('style' => 'width: 20em;','class' => 'caja'));

		if ('' != $item["actitudes"])
		$this->addElement('text', 'actPer', 'Actitudes personales:',array('style' => 'width: 20em;','class' => 'caja'));

		if ('' != $item["edad"])
		$this->addElement('text', 'edad', 'Edad:',array('style' => 'width: 20em;','class' => 'caja'));

		if ('' != $item["sexo"])
		$this->addElement('text', 'sexo', 'Sexo:',array('style' => 'width: 20em;','class' => 'caja'));
		
				
		if ('null' != $item["cargo"])
		$this->addElement('text', 'cargoAOcupar', 'Cargo a ocupar:',array('style' => 'width: 20em;','class' => 'caja'));

		
		if ('' != $item["categoria"])
		$this->addElement('text', 'categoria', 'Categoría:',array('style' => 'width: 20em;','class' => 'caja'));
		
		
		if ('' != $item["area"])
		$this->addElement('text', 'area', 'Area:',array('style' => 'width: 20em;','class' => 'caja'));

		if ('' != $item["sector"])
		$this->addElement('text', 'sector', 'Sector:',array('style' => 'width: 20em;','class' => 'caja'));
		
		if ('' != $item["reporta"])
		$this->addElement('text', 'reportaA', 'Reporta a:',array('style' => 'width: 20em;','class' => 'caja'));

			
		if ('' != $item["persACargo"])
		$this->addElement('text', 'persACargo', 'Personal a cargo:',array('style' => 'width: 20em;','class' => 'caja'));
		
		
		if ('' != $item["horario"])
		$this->addElement('text', 'horario', 'Horario:',array('style' => 'width: 20em;','class' => 'caja'));
		
		$attrs = array("class"=>"caja",
                     "rows"=>"5",
                     "cols"=>"40");
		
		if ('' != $item["tareasgenerales"])
		$this->addElement('textarea', 'tareasGen', 'Descripción de tareas generales:', $attrs);
		if ('' != $item["tareasdiarias"])
		$this->addElement('textarea', 'tareasEsp', 'Descripción de tareas especificas:', $attrs);
/*
		$this->addElement('date', 'cargaHoraria', 'Carga horaria:', array('format'=>'H'),array('class'=>'select'));
*/
		//**************************************

		if (('' != $item["remuneracion"]) || ('' != $item["plancarrera"]) || ('' != $item["plancapacitacion"]))
		{
		$this->addElement('header', 'subtitulo3', 'Se ofrece');
		}
		if ('' != $item["remuneracion"])
		$this->addElement('text', 'remuneracion', 'Remuneración:',array('style' => 'width: 20em;','class' => 'caja'));

		
		if ('' != $item["plancarrera"])
		$this->addElement('text', 'planCarrera', 'Plan de carrera',array('style' => 'width: 20em;','class' => 'caja'));
		
		
		if ('' != $item["plancapacitacion"])
		$this->addElement('text', 'planCap', 'Plan de capacitación:',array('style' => 'width: 20em;','class' => 'caja'));
		
		


		//*************************************
		if ('' != $item["otrainf"]){
		$this->addElement('header', 'subtitulo4', 'Información adicional');
		$this->addElement('textarea', 'infoAdicional', 'Detalle:', $attrs);
		}
		
		
		
		$this -> freeze();
	}

}


class ActionDisplay extends HTML_QuickForm_Action_Display
{
    function _renderForm(&$page)
    {
		require_once('HTML/Template/ITX.php');
		require_once('HTML/QuickForm/Renderer/ITStatic.php');

		$tpl =& new HTML_Template_ITX('./templates');

		$tpl->loadTemplateFile('viewOferta.html');

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
$wizard->run();


?>