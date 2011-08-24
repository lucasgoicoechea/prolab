<?
function CargarMenu(){
	if (isset($_SESSION["idUsuario"]) || isset($_SESSION["usr_empresa"])) 
	{
		include "menuLoged.php";
	}
	else
	{
		include "menuLogin.html";
	}
}

function cargarPagina($opcion){
	list($pagina,$formato) = explode(".",$opcion);
	if(!isset($formato)){
		 $opcion = $pagina.".php";
	}	
	//echo "opcion ".$opcion;
	if(file_exists($opcion)){
		include $opcion;
	}else{
		include "urlInexistente.html";
	}
}

function dateToTimestamp($date){
	//el date tiene q ser formato Y-m-d
	$ano=substr($date,0,4);
	$mes=substr($date,5,2);
	$dia=substr($date, 8,2);	
	
	$timestamp= mktime(0,0,0,$mes,$dia,$ano);
	return $timestamp;
  }

 function cortar_texto($texto, $cantidad){
	if(strlen($texto) > $cantidad){		
		return "<a href='cv/content.php?content=".$texto."&keepThis=true&TB_iframe=true&height=200&width=300'  class='thickbox'>".substr($texto, 0, $cantidad)."...</a>";
	}else{
		return $texto;
	}
 }

//################# FUNCION Q CALCULA LA EDAD A ARTIR DE LA FECHA DE NACIMIENTO  ##################// 
 
function calcularEdad($fechaCumpleanos){
	  //fecha actual
 
		$dia=date(j);
		$mes=date(n);
		$ano=date(Y);
 
		//fecha de nacimiento
		
    	list($anonaz,$mesnaz,$dianaz) = explode("-",$fechaCumpleanos);
	
 
		//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
 
		if (($mesnaz == $mes) && ($dianaz > $dia)) {
			$ano=($ano-1); }
 
 
		//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
 
		if ($mesnaz > $mes) {
			$ano=($ano-1);}
 
 
		//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
 
			$edad=($ano-$anonaz);
 
		return $edad;

}
?>