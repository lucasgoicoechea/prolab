<script type="text/javascript" src="js/chrome.js"></script>
<style>
#MainMenu_a 
{
	height:26px;
	background:#FFF;
	border-color:#4D9FBE;
	border-style:solid;
	border-width:0 0 4px;
	margin:0;
}
#tab_a 
{
	top:0;
	height:0;
	background:repeat-x top;
	margin:0;
}
#tab_a ul 
{
	list-style:none;
	float:left;
	margin:0;
	padding:0;
}
#tab_a li 
{
	display:inline;
	float:left;
	margin:0 1px 0 0;
	padding:0;
}
#tab_a a 
{
	background:#000 url(cv/icons/bright_095.gif) no-repeat right top;
	text-decoration:none;
	border:0;
	display:block;
	float:left;
	margin:0;
	padding:0;
}
#tab_a a span 
{
	display:block;
	background:url(cv/icons/bleft_095.gif) no-repeat left top;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#000;
	font-weight:700;
	line-height:26px;
	padding:0 13px;
}
#tab_a a:hover,#tab_a li.item_active_a_a a 
{
	background-position:right bottom;
}
#tab_a a:hover span,#tab_a li.item_active_a_a a span 
{
	background-position:left bottom;
	color:#FFF;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
}
.dropmenudiv_a 
{
	position:absolute;
	top:0;
	float:left;
	display:block;
	visibility:hidden;
	background:#FFF;
	color:#000;
	z-index:100;
	text-decoration:none;
	border-color:#4D9FBE;
	border-style:solid;
	border-width:0 0 4px;
	padding:0;
}
.dropmenudiv_a ul 
{
	list-style:none;
	margin:0;
	padding:0;
}
.dropmenudiv_a li 
{
	display:inline;
	margin:0;
	padding:0;
}
.dropmenudiv_a a:link,.dropmenudiv_a a:visited 
{
	width:140px;
	display:block;
	border:0;
	color:#000;
	background:url(cv/icons/bleft_095.gif) no-repeat left top;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	margin:0 1px 0 0;
	padding:0;
}
.dropmenudiv_a a span 
{
	display:block;
	line-height:26px;
	background:url(cv/icons/bright_095.gif) no-repeat right top;
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#000;
	float:none;
	padding:0 13px;
}
.dropmenudiv_a a:hover 
{
	border:0;
	background-position:left bottom;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	color:#FFF;
}
.dropmenudiv_a a:hover span 
{
	background-position:right bottom;
	color:#FFF;
	font-weight:700;
}

</style></head><body>

<div id="MainMenu_a">
	<div id="tab_a">
		<ul>
			<li <? if($_GET['op'] =="cv/nuevoCV.php"){ echo "class='item_active_a_a'";}?>><a href="index.php?op=cv/nuevoCV.php"><span>Datos Personales</span></a></li>
			<li <? if($_GET['op'] =="cv/nuevoCV_Paso2.php"){ echo "class='item_active_a_a'";}?>><a href="index.php?op=cv/nuevoCV_Paso2.php"><span>Estudios y Capacitac.</span></a></li>
			<li <? if($_GET['op'] =="cv/nuevoCV_Paso3.php"){ echo "class='item_active_a_a'";}?>><a href="index.php?op=cv/nuevoCV_Paso3.php"><span>Experiencia Laboral</span></a></li>
			<li <? if($_GET['op'] =="cv/nuevoCV_Paso4.php"){ echo "class='item_active_a_a'";}?>><a href="index.php?op=cv/nuevoCV_Paso4.php"><span>Objetivo Laboral</span></a></li>
			
			<li><a href="logout.php"><span>Salir</span></a></li>
		</ul>
		<ul>
		<li style="text-align:center"><a href="index.php"><span>Ver Ofertas para Postularte</span></a></li>
		</ul>
	</div>	
</div>
<br><br>