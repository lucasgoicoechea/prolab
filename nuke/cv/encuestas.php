<?php
	//include "validar_acceso.php";


	require_once "DB.php";
	require_once 'HTML/Table.php';

	session_start();

	$questions = array(
		'Desde que egresaste estas vinculado a la Facultad a trav�s de:',
		'Si est�s realizando alg�n curso/posgrado/seminario/maestr�a, �d�nde lo est�s realizando?',
		'�Qu� ten�s en cuenta a la hora de realizar curso / posgrado / seminario / maestr�a?',
		'�Est�s trabajando actualmente?',
		'�Est�s trabajando de tu profesi�n?',
		'Si trabaj�s de tu profesi�n, �c�mo lo haces?',
		'�De qu� forma est� trabajando?',
		'En caso de trabajar en relaci�n de dependencia, �en qu� sector?',
		'�Aproximadamente en cu�nto oscilan sus ingresos?',
		'�Cu�ntas horas trabajas por dia?',
		'�Habitualmente cu�l es la forma en que buscaste o buscas empleo?',
		'A la hora de iniciar tus actividades profesionales, �cu�les son los problemas m�s recurrentes que se te presentaron o presentan?',
		'�Sab�s cu�les son los requisitos para matricularse en los colegios profesionales?',
		'�Est�s matriculado?',
		'�Sab�s c�mo se reailzan tus aportes jubilatorios?',
		'Si aport�s, �en qu� sistema lo hac�s?',
		'�Posees cobertura de salud?',
		'En caso de que s�, �c�mo la adquir�s?',
		'�Con qui�n viv�s?',
		'�Est�s casado/a?',
		'�Ten�s hijos?');


	$answers = array (
		array('Ayudant�as en c�tedras','Posgrados / maestr�as','Cursos / seminarios', 'Becas de investigaci�n','No est� vinculado','Otros'),
		array('Facultad donde egresaste','En otra facultad de la UNLP','En otra universidad'),
		array('Costo de los cursos','Acreditaci�n de los cursos','Capacitaci�n para la salida laboral y profesional','Prestigio del cuerpo docente','Trayectoria de la instituci�n'),
		array('si','no'),
		array('si','no'),
		array('En forma remunerada','No remunerada (ad-honorem)'),
		array('En relaci�n de dependencia','En forma independiente'),
		array('P�blico','Privado'),
		array('menos de $200','entre $200 y $500','entre $500 y $1000','m�s de $1000'),
		array('menos de 4 hs','4 hs','6 hs','8 hs','m�s de 8 hs'),
		array('Clasificados en el diario','Publicaciones en la facultad','Ofertas a trav�s de p�ginas web','Por recomendaci�n de conocidos'),
		array('Falta de conocimientos pr�cticos de la profesi�n','Falta de lugares f�sicos propios y adecuados para realizar sus tareas','Malas condiciones de empleabilidad','Falta de medios econ�micos para realizar aportes impositivos - previsionales','Imposibilidad de acreditar experiencias laborales'),
		array('si','no'),
		array('si','no'),
		array('si','no'),
		array('Caja privada','Aut�nomo','Monotributo','Como empleado','Ninguno'),
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
	echo ("<FONT size='2' face='Verdana, Arial, Helvetica, sans-serif' COLOR='#333333'><B>-- Visualizaci�n de encuestas  --");
	echo("</B> </FONT></table><BR>");
		
	for ($i=0;$i<=20;$i++){
		$iDecorator = $i+30;
		if ($i==19 || $i == 20) $iDecorator = $i+45;		
		$data = processQuestion ($data, $iDecorator,$answers[$i]);
		showTable ($questions[$i], $iDecorator, $data);
	}
	echo ("</CENTER>");
?>