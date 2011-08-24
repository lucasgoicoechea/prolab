<?php
	session_start();
	require_once "lib.php";
	require_once "PEAR.php";
	global $paginas;
	$paginas = array("principal.php", "loginFail", "backup","BannersAdmin","BlocksAdmin","mod_authors","Configure#banners","Groups","hreferer","ipban", "moderation","modules","newsletter","optimize","Configure","submissions","modifyadmin","deladmin","deladminconf","BannerEdit","BannerDelete","BannerAddClient","BannerAdd","BannersAdmin","BannerChange","BannerStatus","BannerEdit","BannersAdmin#top","BannerClientChange","BlockOrder","BlocksEdit","BlocksDelete","block_show","fixweight","HeadlinesAdmin","ChangeStatus","BlocksAdmin","HeadlinesEdit","HeadlinesDel","RemoveComment","RemovePollComment","grp_del","ipban_delete","messages","deletemsg","moderation_news","moderation_surveys","moderation_surveys_view","moderation_reviews","moderation_users_list","moderation_news_view","moderation_reject","moderation_reviews_view","moderation_approval","moderation_news","home_module","module_status","module_edit","modules","newsletter_sent","massmail_sent","adminMain","Configure","click","delreferer","logout","AdminEmpresas/index.php","AdminEmpresas/viewOfertas.php","AdminEmpresas/login/errorLogin.html","AdminEmpresas/index","AdminEmpresas/viewPostulados.php","AdminEmpresas/viewOferta.php","AdminEmpresas/viewPostulados","cv/encuesta/redireccionSegunAnio.php","cv/myCV.php","cv/addCV.php","cv/nuevoCV.php","cv/login/new_forgotPwdSuccesfull.html","cv/login/errorLogin.html","cv/nuevoCV_Paso2.php#ano_curso","cv/nuevoCV_Paso2.php","cv/nuevoCV_Paso3.php","cv/nuevoCV_Paso4.php","cv/errorAccess.html","interface","subscripcionEmpresas/nueva_empresa.php","subscripcionEmpresas/finalizar.php","subscripcionEmpresas/datos_empresa.php","mostrarHistorial","seguirConsulta","cv/login/new_forgotPwd.php","loginFail","cv/login/new_forgotPwd.html","cv/login/forgotPwd.php","ver_detalles","postularse","consultaX","nuevaConsulta","exito","postularse.php","articulosPrin.php");						
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
	
</head>

<body class="cuerpo" topmargin="0px"; leftmargin="0px";>

<div class="fondo">
  <!-- ENCABEZADO -->
  <div class="encabezado" style="height:70px; padding:15px 2px;" >
		<table align="left" border="0" cellpadding="10" cellspacing="10">
			<tr>
				<div class="upper_image">
			<object width="741" height="70" data="banner_homeunlp_large2.swf" wmode="transparent" 
			type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" quality="high">
			<param name="movie" value="banner_homeunlp_large2.swf"></object>
			<noscript>&lt;div class='no-javascript-error'&gt;Se requiere Javascript, y/o algunos agregados, para mostrar     ciertos contenidos en su navegador.&lt;/div&gt;</noscript>		
	</div>

  <!--          				<td align="left" width="95%">
					<a href="index.php"><img src="images/logoProlab2.JPG" alt="Logo Prolab" border="0"  vspace="1" ></a>
				</td>
				<td align="right" width="5%">	

                       <a href="/"><img src="./images/home.gif" title="inicio" alt="inicio"></a>		
					<a href="/Contacto"><img src="./images/envelope.gif" title="email" alt="email"></a>	
					<a href="/MapaDelSitio"><img src="./images/sitemap.gif" title="mapa del sitio" alt="mapa del sitio"></a> 					
				</td>-->
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
		  <div class="menu">		    		
			<table width="100%" align="center">
				<tr>
				  <td align="center" class="principal"><br><br><br>
					<a href="index.php?op=cv/nuevoCV.php"><img src="img/dejaCV.jpg" border="0" /></a>
				  </td>
				  <!--</tr>
				  <tr>-->
				  <td align="center" class="principal"><br><br><br>
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
		  
		 <br><br><br>
		  
		  <!-- LINKS - ENLACES -->
		  <div class="menu">
		      
				
				<table width="100%" align="center">
					<tr><td align="center">
						<a href="index.php?idArticulo=8"><img src="img/suscripcion1.jpg" border="0" /></a>
					</td></tr>	
					<tr><td align="center">
						<a href="index.php?idArticulo=53"><img src="img/servicios.jpg" border="0" /></a>
					</td></tr>	
					<tr><td align="center">
						<a href="http://www.empleos.amia.org.ar/dicontenidos.asp?IDSubSeccion=141" target="blank" >
						<img src="img/talleres2.jpg" width="154" height="75">
						<!--<img src="img/talleres.jpg" width="175" height="100">-->
						</a>
					</td></tr>	
					<tr><td><hr width="100%">  </td></tr>
					<tr>
					<td align="center">
						<a href="http://www.unlp.edu.ar" target="blank" ><img src="img/unlp.JPG" width="88" height="37" ></a>
					</td>
					</tr>
					<tr><td><hr width="100%">  </td></tr>
									
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
 </div><!-- FIN CLASS FONDO -->
</body>
</html>
