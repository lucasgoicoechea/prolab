var req;

function leer_doc(url, funcion_respuesta){	
	if (window.XMLHttpRequest) { 
		req = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	if(req){
		req.onreadystatechange = funcion_respuesta;
		req.open('GET', url, true);
		req.send(null);
	} 
}