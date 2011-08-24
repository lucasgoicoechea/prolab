
<div class="barraMenu">
	<div class="opcionMenu" id="opcionMenuSFoco" onmouseover="DarFoco(this)" onmouseout="SacarFoco(this)">
	Todos los Incidentes</div>
	<div class="opcionMenu" id="opcionMenuSFoco" onmouseover="DarFoco(this)" onmouseout="SacarFoco(this)">
	Mis Incidentes</div>
	<div class="opcionMenu" id="opcionMenuSFoco" onmouseover="DarFoco(this)" onmouseout="SacarFoco(this)">
	Informes</div>
</div>
<br>
		<?php
		        
				if (!isset($_GET["apli"])){
				  $opcion="consultasPendientes.php";
				}
				else{
					$opcion="verAplicacion.php";
				}
				$opcion="./usuarios/".$opcion;
				cargarPagina($opcion);
			?>

<br>


