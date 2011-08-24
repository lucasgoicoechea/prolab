<?php
	session_start();
	require_once "lib.php";
	require_once "PEAR.php";
	global $paginas;
	$paginas = array("principal.php", "loginFail", "backup","BannersAdmin","BlocksAdmin","mod_authors","Configure#banners","Groups","hreferer","ipban", "moderation","modules","newsletter","optimize","Configure","submissions","modifyadmin","deladmin","deladminconf","BannerEdit","BannerDelete","BannerAddClient","BannerAdd","BannersAdmin","BannerChange","BannerStatus","BannerEdit","BannersAdmin#top","BannerClientChange","BlockOrder","BlocksEdit","BlocksDelete","block_show","fixweight","HeadlinesAdmin","ChangeStatus","BlocksAdmin","HeadlinesEdit","HeadlinesDel","RemoveComment","RemovePollComment","grp_del","ipban_delete","messages","deletemsg","moderation_news","moderation_surveys","moderation_surveys_view","moderation_reviews","moderation_users_list","moderation_news_view","moderation_reject","moderation_reviews_view","moderation_approval","moderation_news","home_module","module_status","module_edit","modules","newsletter_sent","massmail_sent","adminMain","Configure","click","delreferer","logout","AdminEmpresas/index.php","AdminEmpresas/viewOfertas.php","AdminEmpresas/login/errorLogin.html","AdminEmpresas/index","AdminEmpresas/viewPostulados.php","AdminEmpresas/viewOferta.php","AdminEmpresas/viewPostulados","cv/encuesta/redireccionSegunAnio.php","cv/myCV.php","cv/addCV.php","cv/nuevoCV.php","cv/login/new_forgotPwdSuccesfull.html","cv/login/errorLogin.html","cv/nuevoCV_Paso2.php#ano_curso","cv/nuevoCV_Paso2.php","cv/nuevoCV_Paso3.php","cv/nuevoCV_Paso5.php","cv/nuevoCV_Paso6.php","cv/nuevoCV_Paso4.php","cv/errorAccess.html","interface","subscripcionEmpresas/nueva_empresa.php","subscripcionEmpresas/finalizar.php","subscripcionEmpresas/datos_empresa.php","mostrarHistorial","seguirConsulta","cv/login/new_forgotPwd.php","loginFail","cv/login/new_forgotPwd.html","cv/login/forgotPwd.php","ver_detalles","postularse","consultaX","nuevaConsulta","exito","postularse.php","articulosPrin.php","myCV.php","addCV.php");						
?>

<html>
<head>
	<title>Programa de Oportunidades Laborales y RR.HH.</title>
	<link rel="stylesheet" type="text/css" href="estilos.css" id="estilos">
	<link rel="stylesheet" type="text/css" href="menu/menu.css">
	<link rel="stylesheet" href="estilo1.css" type="text/css">
	<script language="JavaScript" src="js/lib.js"></script>
	<script language="JavaScript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="menu/chrome.js"></script>
	<script type="text/javascript" src="js/livevalidation.js"></script>
	<script language="JavaScript" src="js/date-picker.js"></script>
	<script src="cv/jquery.js"></script>
	<script type="text/javascript" src="reflection.js"></script>
	<style type="text/css">
a:link { text-decoration: none}
a:visited { text-decoration: none}
a:active { text-decoration: none}
</style>
</head>

<body class="cuerpo" topmargin="0px"; leftmargin="0px";>

<div class="fondo">
  <!-- ENCABEZADO -->
  <div class="encabezado" style="height:70px; padding:1px 2px;" >
  <div class="upper_image">
        <img src="./images/logoProlab.jpg" title="" HEIGHT="72" WIDTH="177" alt="">            
            <a href="www.prolab.unlp.edu.ar" >  <object width="580" height="70" data="banner_homeunlp_large2.swf" wmode="transparent" 
            type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" quality="high">
            <param name="movie" value="banner_homeunlp_large2.swf"></object></a>
            <noscript>&lt;div class='no-javascript-error'&gt;Se requiere Javascript, y/o algunos agregados, para mostrar     ciertos contenidos en su navegador.&lt;/div&gt;</noscript>        
                                 </div>	
	<table align="left" border="0" cellpadding="0" cellspacing="0">
			<tr>
	  <!--	
		<td align="left" width="95%">
					<a href="index.php"><img src="images/logoProlab2.JPG" alt="Logo Prolab" border="0"  vspace="1" ></a>
				</td>
				<td align="right" width="5%">	

                       <a href="/"><img src="./images/home.gif" title="inicio" alt="inicio"></a>		
					<a href="/Contacto"><img src="./images/envelope.gif" title="email" alt="email"></a>	
					<a href="/MapaDelSitio"><img src="./images/sitemap.gif" title="mapa del sitio" alt="mapa del sitio"></a> 					
				</td>-->
			</tr>
			<tr> <td align="left" >
                       <img src="./images/logoUNLPazul.jpg" title="" HEIGHT="32" WIDTH="32" alt=""> 
					   </td>
					   <td width="380px"><font color="#638CB5" style="position: absolute;text-decoration: none; font-size: 11px;" ><b>PROGRAMA DE OPORTUNIDADES LABORALES Y RR.HH.</b></font>
					   <br><font color="#638CB5" style="text-decoration: none; font-size: 11px;" ><b>UNIVERSIDAD NACIONAL DE LA PLATA</b></font>
					   </td>
					   	 <td style="float: right;" width="440px" align="right" colspan="10" > 
<a style="text-decoration: none; border: medium none;" href="https://es-la.facebook.com/people/Prolab-Unlp/100001566259205" target="blank" >	
                       <img src="./images/facebook-icon.jpg" border="0"  title="Seguinos en FACEBOOK" HEIGHT="25" WIDTH="60" alt=""
                       style="text-decoration: none; border: medium none;" >
</a><a style="text-decoration: none; border: medium none;" href="https://twitter.com/ProlabUnlp" target="blank" >
					   <img src="./images/twitter-icon.jpg" border="0"  title="Seguinos en TWITTER" HEIGHT="25" WIDTH="60" alt="" 
					   style="text-decoration: none; border: medium none;" >
</a>
<a href="http://www.linkedin.com/in/prolabunlp"><img src="./images/linkedin.jpg" border="0"  title="Seguinos en LINKED" HEIGHT="25" WIDTH="60" alt="" 
					   style="text-decoration: none; border: medium none;" ></a>
<!--<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script> <script type=IN/Share data-counter="right"></script> -->
					   </td>
</tr> 
		</table>
  </div>
 <div class="encabezado2">
	<div id="MainMenu">
		<div id="tab">
			<ul> 
				<li><a href="#" onMouseover="cssdropdown.dropit(this,event,'dropmenu_101')"><span>Postulantes</span></a></li>
				<li><a href="#" onMouseover="cssdropdown.dropit(this,event,'dropmenu_102')"><span>Empresas</span></a></li>
				<li><a href="#" onMouseover="cssdropdown.dropit(this,event,'dropmenu_103')"><span>Institucional</span></a></li>
				<li><a href="#" onMouseover="cssdropdown.dropit(this,event,'dropmenu_104')"><span>Asesoramiento</span></a></li>
				<li><a href="#" onMouseover="cssdropdown.dropit(this,event,'dropmenu_105')"><span>Investigaciones</span></a></li>
			</ul>
		</div>
	</div>
	<div id="dropmenu_101" class="dropmenudiv">
		<ul>
			<li><a href="index.php?op=cv/nuevoCV.php"><span>Registrarse</span></a></li>
			<!--<li><a href="http://www.empleos.amia.org.ar/AutoConsulta/Registracion/Default.asp?pnuevo=1&Nuevo=1&IDSubSeccion=10&URL=/AutoConsulta/Registracion/Default.asp|pnuevo=1" target="blank"><span>No Universitarios</span></a></li>-->
		</ul>
	</div>
	<div id="dropmenu_102" class="dropmenudiv">
		<ul>
			<li><a href="index.php?idArticulo=53"><span>Servicio</span></a></li>
			<li><a href="index.php?idArticulo=8"><span>Subscripcion</span></a></li>
		</ul>
	</div>

	<div id="dropmenu_103" class="dropmenudiv">
		<ul>
			<li><a href="index.php?idArticulo=5"><span>Quienes somos</span></a></li>
			<li><a href="index.php?idArticulo=6"><span>Objetivos</span></a></li>
		</ul>
	</div>

	<div id="dropmenu_104" class="dropmenudiv">
		<ul>
			<li><a href="index.php?idArticulo=10"><span>Como armar tu CV</span></a></li>
			<li><a href="index.php?idArticulo=12"><span>Carta de presentación</span></a></li>
			<li><a href="index.php?idArticulo=17"><span>Asesoramiento contable</span></a></li>
		</ul>
	</div>

	<div id="dropmenu_105" class="dropmenudiv">
		<ul>
			<li><a href="index.php?idArticulo=46"><span>Estadisticas</span></a></li>
			<li><a href="index.php?idArticulo=46"><span>Informes</span></a></li>
			<li><a href="index.php?idArticulo=46"><span>Escuestas</span></a></li>
			<li><a href="index.php?op=articulosPrin.php"><span>Articulos</span></a></li>
		</ul>
	</div>

    </div>
  <!-- BAJO ENCABEZADO --> 
	  <!-- MENU -->
	  <div class="lateralIzq">
	    <!-- LINKS - ENLACES -->
		  <!--<div class="menu"> -->		    		
		  <div class="">
			<table width="100%" align="center">
				<tr>
				  <td align="center" class="principal" style="border-right-style:solid;">
					<a href="index.php?op=cv/nuevoCV.php"><img src="img/dejaCV.jpg" border="0" /></a>
				  </td>
				  <!--</tr>
				  <tr>-->
				  <td align="center" class="principal">
					<a href="index.php?op=cv/nuevoCV.php&actualiza=true"><img src="img/ActualizaCV.jpg" border="0" /></a>
				  </td>
				</tr>
		  </table>
		  </div>
          <br> 		  
		  <!-- LOGIN --> 
		  <div class="login">
		    
			  <div class="menuBody" id="menuBodyLogin">
				    
					<?php 
						if ((isset($_GET["op"])) && ($_GET["op"] == "loginFail"))
						{
							echo "Usuario o Password incorrectos";
							unset($_GET["op"]);
						}					
						cargarMenu();
					?>
					
			  </div>
		  </div>
		  
		 <br>
		  
		  <!-- LINKS - ENLACES -->
		  <!--<div class="menu"> -->		    		
		  <div class="">
				
				<table width="100%" align="center">
				<tr>
					<div class="botonesEmpresasImages" >
					<div ><img src="img/borderIzq.bmp" border="0" height="12px" width="100%" /> 
					</div>
					</div>
					<div class="botonesEmpresas" >
					<div  > <a href="index.php?idArticulo=8" style="color: white;font-size: 14px;" >SUSCRIPCI&Oacute;N EMPRESAS</a></div>
					</div>	
					<div style="width:98%;" ><div><img src="img/borderDer.bmp" border="0" height="12px" width="100%" /></div></div>
			   </tr>
			   <br />
			   <tr>		
					<div class="botonesEmpresasImages" >
					<div ><img src="img/borderIzq.bmp" border="0" height="12px" width="100%" /> </div>
					</div>
					<div class="botonesEmpresas" >
					<div  ><a href="index.php?idArticulo=53" style="color: white;font-size: 14px;" >SERVICIOS EMPRESAS</a></div>
					</div>
					<div style="width:98%;" ><div><img src="img/borderDer.bmp" border="0" height="12px" width="100%" /></div></div>
					
				</tr>	
				<tr><td><!--<hr width="100%">--><br>  </td></tr> 
<!--                <tr><td><hr width="100%"><br>  </td></tr>-->
					<tr><td align="left" style="text-decoration: none;">
						<a  style="text-decoration:none; border:none;" href="http://www.empleos.amia.org.ar/dicontenidos.asp?IDSubSeccion=141" target="blank" >
						<img src="img/talleres2.jpg" width="154" height="75" style="text-decoration: none; border:none;">
						<!--<img src="img/talleres.jpg" width="175" height="100">-->
						</a>
					</td></tr>
					<tr>	
					<td align="left" style="text-decoration: none;">
						<a style="text-decoration: none;" href="http://www.unlp.edu.ar" target="blank" >
						<img src="img/unlp.JPG" width="154" height="42" style="text-decoration: none; border:none;">
						</a>
					</td>
					</tr>
				 
			<tr>
					<td align="left" style="text-decoration: none;">
						<a style="text-decoration: none;" href="http://www.universia.com.ar" target="blank" >
						<img src="images/banner-universia.JPG" width="154" height="42" style="text-decoration: none; border:none;">
						</a>
					</td>
					</tr>
				<tr>
					<td align="left"  style="text-decoration: none;">
						<a  style="text-decoration:none; border:none;" href="http://www.empleos.amia.org.ar" target="blank" >
						<img src="images/logo_empleo_amia.gif" width="154" height="42" style="text-decoration: none; border:none;">
						</a>
					</td>
					</tr>
					 <tr>
					<td align="left" style="text-decoration: none;">
						<img src="img/LOGOS.jpg" width="192px" style="text-decoration: none; border:none;">
					</td>
					</tr>
					<!-- <tr><td>
						<a href="http://www.prolabempleos.unlp.edu.ar" target="blank" style="border: medium none ; text-decoration: none;"><img src="img/plab_empleos.jpg" width="175" height="100"></a>
					</td></tr> -->
				</table>

		  </div>	  

	  </div>
	  <!-- END MENU -->
  
	  <!-- CUERPO -->
	  <div class="lateralDer">
		  <div class="pagina"><br>
		  		<?php 
				    include_once("constantes.php");
						if (!isset($_GET["op"]) && !isset($_SESSION['url'])){
						  /*if (isset($_SESSION['idUsuario'])){
							  if ($_SESSION['idTipoUsuario']==__ID_OPERADORES__){
							  	$opcion="usuarios/operador.php";
									
								}
								else{
									$opcion="admin/administrador.php";
								}
							}
							else{*/
								$opcion="principal.php";
							/*}*/
						}
						//harcode
						//echo "<script>alert('".$_GET["op"]."');</script>";
						//if($_GET["op"]=="cv/nuevoCV.php"){							
						//	$_SESSION['url'] = $_GET["op"];
							//echo "<script>window.location='/prolabBeta';</script>";
						//}
						//lalala
						//if(isset($_SESSION['url'])){
						//	$opcion=$_SESSION['url'];
						//}
						if(isset($_GET["op"])){	 
                       $opcion=$_GET["op"]; 
						}
						
						if(!isset($_GET["idArticulo"])){
							if(in_array($opcion, $paginas)) {  						
							       cargarPagina($opcion);
							}
							else{ 
								echo('<center><h2>Ha ingreso una ubicación invalida, </br>repórtelo a:</br> prolab.consultas@presi.unlp.edu.ar, </br>muchas gracias.</h2><center>');
                            }
						}else{
						$idArt = $_GET["idArticulo"];
						if (is_numeric($idArt))
                            {
							include("conexion_prolab.php");
							$result = $conexionDB_Prolab -> query("select text from sys_pages where pid=".$_GET["idArticulo"]." and active=true");
							$texto = $result -> fetchRow(DB_FETCHMODE_ASSOC); 
							echo $texto['text'];
							}
                            else{
							    echo('<center><h2>Ha ingreso una ubicación invalida, </br>repórtelo a:</br> prolab.consultas@presi.unlp.edu.ar, </br>muchas gracias.</h2><center>');
                            }														
						}

						
					?>
					
					
				
		  </div>
	  </div>
	  <!-- END CUERPO --> 
  <!-- END BAJO ENCABEZADO --> 


  <!-- FOOTER --> 
	<div style="clear : right;	vertical-align: top;">	  

		<div class="rbroundbox" id="footer">
			<div class="rbtop">
				<div></div>
			</div>
			<div class="rbcontent">
				<div><span style="color: navy;">Para comunicarse con nosotros:</span> prolab@presi.unlp.edu.ar - www.prolab.unlp.edu.ar</div><hr>
<!--					<div><span style="color: navy;">Consultas Técnicas:</span> prolab.consultas@presi.unlp.edu.ar</div><hr>-->
					<div><span style="color: navy;">
						 Calle 7 Nº 776 (UNLP - Presidencia) |
						 La Plata - Buenos Aires - Argentina - CP 1900 |
						 Tel&eacute;fonos: (0221) 427-7196 - 424-5420 </span>
					</div>
			</div><!-- /rbcontent -->
			<div class="rbbot">
				<div></div>
			</div>
		</div>

	</div>
	<!-- FIN FOOTER -->
 </div>
<script language="javascript">
function modificar() {
document.getElementById("tbj-box-avisos").style.width = 545;
document.getElementById("tbj-box-avisos").style.height = 405;
//document.getElementById("tbj-box-avisos").style.background = "url('http://www.prolab.unlp.edu.ar/prolabBeta/img/cuadro2.JPG') no-repeat scroll  20px 2% transparent"; 
//document.getElementById("tbj-box-avisos").style.background-size = "";
document.getElementById("marquee1").style.width = 535;
document.getElementById("marquee1").style.height = 180;
}

function tamanoClass(name) {
  var results = new Array();
  var elems = document.getElementsByTagName("div");
  for (var i=0; i<elems.length; i++) {
    if (elems[i].className.indexOf(name) != -1) {
      results[results.length] = elems[i];
      elems[i].style.width = 535;
      elems[i].style.height = 132;
      elems[i].style.background = "white";
      //elems[i].style.background = url("http://www.prolab.unlp.edu.ar/prolabBeta/img/cuadro.JPG") no-repeat scroll transparent; 
      elems[i].innerHTML = "<img src='./img/cuadro3.jpg' HEIGHT='129' WIDTH='405'> ";
    }
  }
  return results;
};

function tamanoFont(name) {
	  var results = new Array();
	  var elems = document.getElementsByTagName("a");
	  for (var i=0; i<elems.length; i++) {
	    if (elems[i].className.indexOf(name) != -1) {
	      results[results.length] = elems[i];
	      elems[i].style.fontSize = "16px";	      
	    }
	  }
	  return results;
	};
	
modificar();
tamanoClass('cabecera');
tamanoFont('texto');
</script>
<!-- FIN CLASS FONDO -->
</body>
</html>
