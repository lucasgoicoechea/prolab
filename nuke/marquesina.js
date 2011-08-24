function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=600, height=350,top=0,left=0";
window.open(pagina,"",opciones);
}
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//Abre una ventana PopUp
function popup (pagina) {
var opciones="toolbar=no, location=no, status=no, menu=no, personalbar=no, scrollbars=yes, resizable=no, width=600, height=350,top=20,left=50";
window.open(pagina,"",opciones);
}
/*****************************************************************************
Carousel de imágenes (marquesina horizontal). Script creado por Tunait! (18/8/2003) modificado el 25/12/2003.
Si quieres usar este script en tu sitio eres libre de hacerlo con la condición de que permanezcan intactas estas líneas, osea, los créditos.
No autorizo a publicar y ofrecer el código en sitios de script sin previa autorización
Si quieres publicarlo, por favor, contacta conmigo.
http://javascript.tunait.com/
tunait@yahoo.com 
******************************************************************************/
// BANNER 1
var ancho = 600  // especifica la anchura de la marquesina
var alto = 70 // especifica la altura de la marquesina (alto de las imágenes)
var velo = 15 // velocidad 
var dis = 4 // cantidad de pixels que desplaza por movimiento

//Array de imagenes a mostrar en la marquesina
var imagenes = new Array()
imagenes[0] = new Image()
imagenes[0].src = "CeramicosLP.jpg" // ruta o nombre de imagen 
imagenes[0].a = "" // link de la imagen
imagenes[0].target = "_blank" // target del link
imagenes[1] = new Image()
imagenes[1].src = "BCRA.jpg"
imagenes[1].a = ""
imagenes[1].target = "_blank"
imagenes[2] = new Image()
imagenes[2].src = "GobiernoBSAS.jpg"
imagenes[2].a = ""
imagenes[2].target = "_blank"
imagenes[3] = new Image()
imagenes[3].src = "municipalidadLP.jpg"
imagenes[3].a = ""
imagenes[3].target = "_blank"
imagenes[4] = new Image()
imagenes[4].src = "estudiantes.jpg"
imagenes[4].a = ""
imagenes[4].target = "_blank"
imagenes[5] = new Image()
imagenes[5].src = "ministerio.jpg"
imagenes[5].a = ""
imagenes[5].target = "_blank"
imagenes[6] = new Image()
imagenes[6].src = "spseguridad.jpg"
imagenes[6].a = ""
imagenes[6].target = "_blank"
imagenes[7] = new Image()
imagenes[7].src = "portela.jpg"
imagenes[7].a = ""
imagenes[7].target = "_blank"


var vel = velo
pasos = 4
var tot = 0
var tam =0;
var pos,pos2,tam2 =0;
function escribe(){
document.write ('<div id ="fuera" style="position:relative; width:' + ancho + 'px; height:' + alto + 'px;overflow:hidden">');
document.write ('<span id="imas" style="position:absolute; width:' + tam + 'px;height:' + alto + 'px; left = ' + tam + 'px;">'); //onmouseover="if(detienee == 0){detienee = 1}" onmouseout="clearTimeout(tiempo);detienee=0;atras = false;vel=velo;mueve()"

for (m=0;m<imagenes.length;m++){
	if(imagenes[m].a != ""){
		document.write('<a href="' + imagenes[m].a + '" target="' + imagenes[m].target + '">')
		}
	document.write ('<img border="0"  src ="' + imagenes[m].src + '" id="ima' + m + '" name="ima' + m + '"  onload="tot++;">');
	if(imagenes[m].a != ""){document.write ('</a>')}
	}
document.write ('</span>');
document.write ('<span id="imas2" style="position:absolute; width:' + tam + 'px;height:' + alto + ';left=0;"  >'); //onmouseover="if(detienee == 0){detienee = 1}" onmouseout="clearTimeout(tiempo);detienee=0;atras = false;vel=velo;mueve()"
for (m=0;m<imagenes.length;m++){
	if(imagenes[m].a != ""){
		document.write('<a href="' + imagenes[m].a + '" target="' + imagenes[m].target + '">')
		}
	document.write ('<img border="0" src ="' + imagenes[m].src + '" id="imaa' + m + '" name="imaa' + m + '" onload="tot++;">');
	if(imagenes[m].a != ""){document.write ('</a>')}
	}
document.write ('</span>');
document.write ('</div>');
}
var detienee = 0,posb,pos2b;
function mueve(){
pos = document.getElementById('imas').style.left;
pos2 = document.getElementById('imas2').style.left;
pos = pos.replace(/px/,"");
pos = pos.replace(/pt/,"");
pos = new Number(pos);
pos2 = pos2.replace(/px/,"");
pos2 = pos2.replace(/pt/,"");
pos2 = new Number(pos2);
if(detienee == 1){
	posb = pos;
	pos2b = pos2;
	}
if(atras == true){
pos+=dis;
pos2 +=dis;
}
else{
pos -= dis;
pos2 -= dis;
}
if(pos2 < (-tam - dis)){
	if(detienee == 0){
		document.getElementById('imas2').style.left = pos  + (tam - dis);
		pos2 = document.getElementById('imas2').style.left;
		}
	else{
		document.getElementById('imas').style.left = pos 
		}
	}
else{
	document.getElementById('imas').style.left = pos 
	}

if(pos < (-tam + dis)){
	if(detienee == 0){
		document.getElementById('imas').style.left = pos2 + (tam - dis);
		pos = document.getElementById('imas').style.left;
		}
	else{
		document.getElementById('imas2').style.left = pos2;
		}
	}
else{
	document.getElementById('imas2').style.left = pos2
	}
if(detienee > 0){
	if(detienee == pasos){
		vel = velo;
		atras = true;
		detienee--;
		tiempo = setTimeout('mueve()',vel);
		}
	else{
		if(atras == true){
			if(detienee>(pasos/2))
				{detienee--}
			else{
			vel = velo;
			clearTimeout(tiempo)
			}
			}
	else{
		detienee++
		}
	if(detienee > (pasos/2) && atras == false){vel +=10}
		if(detienee < (pasos/2)){vel +=10}
		tiempo = setTimeout('mueve()',vel)
		}
	}
else{
tiempo = setTimeout('mueve()',vel)
	}
if(atras == true){
		if (pos == posb){
			clearTimeout(tiempo);
			atras = false;
			}
		}
}
var tiempo;
var atras = false, ini;
function inicio(){
if(tot == (imagenes.length * 2)){clearTimeout(ini);reDimCapas();mueve()}
else{ini=setTimeout('inicio()',500)}
}
function reDimCapas(){
for(m=0;m<imagenes.length;m++){
	tam +=document.getElementById('ima'+m).width
	document.getElementById('imas').style.left = tam;
	document.getElementById('imas').style.width = tam ;
	document.getElementById('imas2').style.width = tam;
	}
}
// BANNER 2
var anchoB = 600  // especifica la anchura de la marquesina
var altoB = 70 // especifica la altura de la marquesina (alto de las imágenes)
var veloB = 15 // velocidad 
var disB = 4 // cantidad de pixels que desplaza por movimiento

//Array de imagenes a mostrar en la marquesina
var imagenesB = new Array()
imagenesB[0] = new Image()
imagenesB[0].src = "nini.jpg" // ruta o nombre de imagen 
imagenesB[0].a = "" // link de la imagen
imagenesB[0].target = "_blank" // target del link
imagenesB[1] = new Image()
imagenesB[1].src = "autosiglo.jpg"
imagenesB[1].a = ""
imagenesB[1].target = "_blank"
imagenesB[2] = new Image()
imagenesB[2].src = "bytonner.jpg"
imagenesB[2].a = ""
imagenesB[2].target = "_blank"
imagenesB[3] = new Image()
imagenesB[3].src = "eleprint.jpg"
imagenesB[3].a = ""
imagenesB[3].target = "_blank"
imagenesB[4] = new Image()
imagenesB[4].src = "icym.jpg"
imagenesB[4].a = ""
imagenesB[4].target = "_blank"
imagenesB[5] = new Image()
imagenesB[5].src = "carpigiani.jpg"
imagenesB[5].a = ""
imagenesB[5].target = "_blank"
imagenesB[6] = new Image()
imagenesB[6].src = "fecami.jpg"
imagenesB[6].a = ""
imagenesB[6].target = "_blank"
imagenesB[7] = new Image()
imagenesB[7].src = "gestores.jpg"
imagenesB[7].a = ""
imagenesB[7].target = "_blank"



var velB = veloB
pasosB = 4
var totB = 0
var tamB =0;
var posB,pos2B,tam2B =0;
function escribeB(){
document.write ('<div id ="fueraB" style="position:relative; width:' + anchoB + 'px; height:' + altoB + 'px;overflow:hidden">');
document.write ('<span id="imasB" style="position:absolute; width:' + tamB + 'px;height:' + altoB + 'px; left = ' + tamB + 'px;">'); //onmouseover="if(detienee == 0){detienee = 1}" onmouseout="clearTimeout(tiempo);detienee=0;atras = false;vel=velo;mueve()"
for (m=0;m<imagenesB.length;m++){
	if(imagenesB[m].a != ""){
		document.write('<a href="' + imagenesB[m].a + '" target="' + imagenesB[m].target + '">')
		}
	document.write ('<img border="0"  src ="' + imagenesB[m].src + '" id="imaB' + m + '" name="imaB' + m + '"  onload="totB++;">');
	if(imagenesB[m].a != ""){document.write ('</a>')}
	}
document.write ('</span>');
document.write ('<span id="imas2B" style="position:absolute; width:' + tamB + 'px;height:' + altoB + ';left=0;"  >'); //onmouseover="if(detienee == 0){detienee = 1}" onmouseout="clearTimeout(tiempo);detienee=0;atras = false;vel=velo;mueve()"
for (m=0;m<imagenesB.length;m++){
	if(imagenesB[m].a != ""){
		document.write('<a href="' + imagenesB[m].a + '" target="' + imagenesB[m].target + '">')
		}
	document.write ('<img border="0" src ="' + imagenesB[m].src + '" id="imaaB' + m + '" name="imaaB' + m + '" onload="totB++;">');
	if(imagenesB[m].a != ""){document.write ('</a>')}
	}
document.write ('</span>');
document.write ('</div>');
}
var detieneeB = 0,posbB,pos2bB;
function mueveB(){
posB = document.getElementById('imasB').style.left;
pos2B = document.getElementById('imas2B').style.left;
posB = posB.replace(/px/,"");
posB = posB.replace(/pt/,"");
posB = new Number(posB);
pos2B = pos2B.replace(/px/,"");
pos2B = pos2B.replace(/pt/,"");
pos2B = new Number(pos2B);
if(detieneeB == 1){
	posbB = posB;
	pos2bB = pos2B;
	}
if(atrasB == true){
posB+=disB;
pos2B +=disB;
}
else{
posB -= disB;
pos2B -= disB;
}
if(pos2B < (-tamB - disB)){
	if(detieneeB == 0){
		document.getElementById('imas2B').style.left = posB  + (tamB - disB);
		pos2B = document.getElementById('imas2B').style.left;
		}
	else{
		document.getElementById('imasB').style.left = posB 
		}
	}
else{
	document.getElementById('imasB').style.left = posB 
	}

if(posB < (-tamB + disB)){
	if(detieneeB == 0){
		document.getElementById('imasB').style.left = pos2B + (tamB - disB);
		posB = document.getElementById('imasB').style.left;
		}
	else{
		document.getElementById('imas2B').style.left = pos2B;
		}
	}
else{
	document.getElementById('imas2B').style.left = pos2B
	}
if(detieneeB > 0){
	if(detieneeB == pasosB){
		velB = veloB;
		atrasB = true;
		detieneeB--;
		tiempoB = setTimeout('mueveB()',velB);
		}
	else{
		if(atrasB == true){
			if(detieneeB>(pasosB/2))
				{detieneeB--}
			else{
			velB = veloB;
			clearTimeout(tiempoB)
			}
			}
	else{
		detieneeB++
		}
	if(detieneeB > (pasosB/2) && atrasB == false){velB +=10}
		if(detieneeB < (pasosB/2)){velB +=10}
		tiempoB = setTimeout('mueveB()',velB)
		}
	}
else{
tiempoB = setTimeout('mueveB()',velB)
	}
if(atrasB == true){
		if (posB == posbB){
			clearTimeout(tiempoB);
			atrasB = false;
			}
		}
}
var tiempoB;
var atrasB = false, iniB;
function inicioB(){
if(totB == (imagenesB.length * 2)){clearTimeout(iniB);reDimCapasB();mueveB()}
else{iniB=setTimeout('inicioB()',500)}
}
function reDimCapasB(){
for(m=0;m<imagenesB.length;m++){
	tamB +=document.getElementById('imaB'+m).width
	document.getElementById('imasB').style.left = tamB;
	document.getElementById('imasB').style.width = tamB ;
	document.getElementById('imas2B').style.width = tamB;
	}
}
