<?php
	//include "validar_acceso.php";


	require_once "DB.php";
	require_once 'HTML/Table.php';

	session_start();

	$questions = array(
		'Desde que egresaste estas vinculado a la Facultad a través de:',
		'Si estás realizando algún curso/posgrado/seminario/maestría, ¿dónde lo estás realizando?',
		'¿Qué tenés en cuenta a la hora de realizar curso / posgrado / seminario / maestría?',
		'¿Estás trabajando actualmente?',
		'¿Estás trabajando de tu profesión?',
		'Si trabajás de tu profesión, ¿cómo lo haces?',
		'¿De qué forma está trabajando?',
		'En caso de trabajar en relación de dependencia, ¿en qué sector?',
		'¿Aproximadamente en cuánto oscilan sus ingresos?',
		'¿Cuántas horas trabajas por dia?',
		'¿Habitualmente cuál es la forma en que buscaste o buscas empleo?',
		'A la hora de iniciar tus actividades profesionales, ¿cuáles son los problemas más recurrentes que se te presentaron o presentan?',
		'¿Sabés cuáles son los requisitos para matricularse en los colegios profesionales?',
		'¿Estás matriculado?',
		'¿Sabés cómo se reailzan tus aportes jubilatorios?',
		'Si aportás, ¿en qué sistema lo hacés?',
		'¿Posees cobertura de salud?',
		'En caso de que sí, ¿cómo la adquirís?',
		'¿Con quién vivís?',
		'¿Estás casado/a?',
		'¿Tenés hijos?');


	$answers = array (
		array('Ayudantías en cátedras','Posgrados / maestrías','Cursos / seminarios', 'Becas de investigación','No está vinculado','Otros'),
		array('Facultad donde egresaste','En otra facultad de la UNLP','En otra universidad'),
		array('Costo de los cursos','Acreditación de los cursos','Capacitación para la salida laboral y profesional','Prestigio del cuerpo docente','Trayectoria de la institución'),
		array('si','no'),
		array('si','no'),
		array('En forma remunerada','No remunerada (ad-honorem)'),
		array('En relación de dependencia','En forma independiente'),
		array('Público','Privado'),
		array('menos de $200','entre $200 y $500','entre $500 y $1000','más de $1000'),
		array('menos de 4 hs','4 hs','6 hs','8 hs','más de 8 hs'),
		array('Clasificados en el diario','Publicaciones en la facultad','Ofertas a través de páginas web','Por recomendación de conocidos'),
		array('Falta de conocimientos prácticos de la profesión','Falta de lugares físicos propios y adecuados para realizar sus tareas','Malas condiciones de empleabilidad','Falta de medios económicos para realizar aportes impositivos - previsionales','Imposibilidad de acreditar experiencias laborales'),
		array('si','no'),
		array('si','no'),
		array('si','no'),
		array('Caja privada','Autónomo','Monotributo','Como empleado','Ninguno'),
		array('si','no'),
		array('Por tu empleador','En forma particular','Por grupo familiar'),
		array('Solo','Con tus padres','Concubinato','Matrimonio'),
		array('si','no'),
		array('si','no')	
	);

	//Retorna la cantidad de respuestas "string" sobre la pregunta "idQuestion"
	
	function processOption ($string, $idQuestion){

		$query ="SELECT * FROM usuarios_respuestas ";
		$query .="WHERE idPregunta  = '".$idQuestion."' ";
		$query .="AND respuesta = '".$string."'";
		include("consultar.php");
		
		return $result -> numRows();
	}
	
	//Arma sobre "data" las filas a mostrar para cada pregunta
	function processQuestion ($data, $idQuestion, $questionOptions){
		unset($data);
		foreach ($questionOptions as $option) {
			$data[0][] = $option;
			$data[1][] = processOption ($option,$idQuestion);
		}
		//porcentajes
		$total = 0;
		foreach ($data[1] as $value) $total = $total + $value;
		foreach ($data[1] as $value) $data[2][] = number_format( ($value*100/$total), 2, '.', "")."%";
			
		

		return $data;
	}

	//arma la tabla y la muestra
	function showTable ($tableTittle, $idQuestion, $data){

		$table = new HTML_Table(array('class' => 'tableGestorUser','width'=>'80%'));
		$table -> setCaption($tableTittle,'class=header');
		$table->addRow($data[0],null,'TH');
		$table->addRow($data[1]);
		$table->addRow($data[2]);
		echo $table->toHTML();
		echo ("<BR><BR>");
	}


	

	echo "<html><head><TITLE>Encuestas</TITLE><link rel='stylesheet' href='estilos/myCV.css' type='text/css'></head><body class='body'>";
	echo ("<CENTER>");
	echo ("<BR><table width='80%'  border='0' align='center' cellpadding='1' cellspacing='2' >");
	echo ("<FONT size='2' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#333333'><B>-- Visualización de encuestas  --");
	echo("</B> </FONT></table><BR>");
		
	for ($i=0;$i<=20;$i++){
		$iDecorator = $i+30;
		if ($i==19 || $i == 20) $iDecorator = $i+45;		
		$data = processQuestion ($data, $iDecorator,$answers[$i]);
		showTable ($questions[$i], $iDecorator, $data);
	}
	echo ("</CENTER>");
?>