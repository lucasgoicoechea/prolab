function DarFoco(x){
 x.id="opcionMenuCFoco";
 y=document.getElementById(x.title);
 y.style.display="block";
}
function SacarFoco(x, e){
 x.id="opcionMenuSFoco";
 y=document.getElementById(x.title);
 if (e.screenY < 210){
	 y.style.display="none";
 }
}

function SacarFoco2(x, e){
 if (e.screenY > 230){
	 x.style.display="none";
 }
}
function ConservarFoco(x){
  x.style.display="block";
	//alert('si');
}

function validarLogin(){
	if ((document.getElementById('usuario').value == '') || (document.getElementById('clave').value == '')){
		alert("Debe ingresar Usuario y Contraseña.\n");
	 	return false;
	}
 	else{
		return true;
	}
}

function validarCampos(){
	if ((document.getElementById('usuariox').value == '') || (document.getElementById('mailx').value == '') || (document.getElementById('mailx').value.indexOf('@') == -1) || (document.getElementById('mailx').value.indexOf('.') == -1) || (document.getElementById('descProbx').value == '')){

		alert("Debe completar su nombre, su direccion de mail o bien la descripcion del problema");
	 	return false;
	}
 	else{
		return true;
	}
}

function verRespuesta2(nro){
	var id = 'respuesta' + nro;
	var resp = document.getElementById(id);
	
	if (resp.style.display == 'block'){
		resp.style.display = 'none';
	}
	else{
		resp.style.display = 'block';
	}
}


function mostrarText(nro){
	 if(document.getElementById('other'+nro).selected)
	{document.getElementById('text'+nro).style.visibility='visible'}
	 else{
	 ocultarText(nro);}}

function ocultarText(nro){
	   document.getElementById('text'+nro).style.visibility='hidden'}

function validarBusqueda(){
	
	if ((document.getElementById('idConsulta').value == '') || (isNaN(document.getElementById('idConsulta').value ))){
		alert("Debe ingresar un Numero de Incidente");
	    return false;
		}
	
 	else{
		return true;
	    }
		}

function verClasificacion2(nro){
var id = 'clas'+nro;
var paragraphs = document.getElementsByTagName("div");

for(i = 0; i < paragraphs.length; i++){
if (paragraphs[i].id == id){
   var resp = paragraphs[i];
  	if (resp.style.display == 'block'){
		resp.style.display = 'none';
	 }
	 else{
		resp.style.display = 'block';
	}}
	}
	
}

function verPregunta2(nro){
	var id = 'preg' + nro;
	var paragraphs = document.getElementsByTagName("div");

for(i = 0; i < paragraphs.length; i++){
if (paragraphs[i].id == id){
   var resp = paragraphs[i];
  	if (resp.style.display == 'block'){
		resp.style.display = 'none';
	 }
	 else{
		resp.style.display = 'block';
	}}
	}
	
}

function cambiarColor(n){
if(n==1){
document.getElementById("estilo").href = "estilos.css";}
if(n==2){
document.getElementById("estilo").href = "estilo1.css";}

}


function irames(unmes){
window.location='http://localhost/proyecto/index.php?op=usuarios/calendario&mes='+unmes;
}


function validarFecha(fecha) {
	try{
		var fecha = fecha.split("-");
		var dia = fecha[0];
		var mes = fecha[1];
		var ano = fecha[2];
		var estado = true;
		var dmax = -1;
		//alert("dia="+dia+" mes="+mes+" ano="+ano);
		if ((dia.length == 2) && (mes.length == 2) && (ano.length == 4)) {
			//parseint: hay q poner 10 base decimal, sino lo toma base octal por tener 0 adelante
			switch (parseInt(mes, 10)) {
				case 1:dmax = 31;break;
				case 2: if (ano % 4 == 0) dmax = 29;
						else dmax = 28;
						break;
				case 3:dmax = 31;break;
				case 4:dmax = 30;break;
				case 5:dmax = 31;break;
				case 6:dmax = 30;break;
				case 7:dmax = 31;break;
				case 8:dmax = 31;break;
				case 9:dmax = 30;break;
				case 10:dmax = 31;break;
				case 11:dmax = 30;break;
				case 12:dmax = 31;break;
			}
			dmax!=""?dmax:dmax=-1;
			//alert("dmax="+dmax);
			if ((dia >= 1) && (dia <= dmax) && (mes >= 1) && (mes <= 12)) {
				for (var i = 0; i < fecha[0].length; i++) {
					diaC = fecha[0].charAt(i).charCodeAt(0);
					(!((diaC > 47) && (diaC < 58)))?estado = false:'';
					mesC = fecha[1].charAt(i).charCodeAt(0);
					(!((mesC > 47) && (mesC < 58)))?estado = false:'';
				}
			}else{
				estado = false;
			}

			for (var i = 0; i < fecha[2].length; i++) {
				anoC = fecha[2].charAt(i).charCodeAt(0);
				(!((anoC > 47) && (anoC < 58)))?estado = false:'';
			}

	    }else{ 
			estado = false;
		}
		//alert("estado: "+estado);
		return estado;
	}catch(err){
		//alert("Error fechas");
		return false;
	}
}