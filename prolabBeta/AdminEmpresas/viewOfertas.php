<?php
	ini_set("include_path", "/var/vdomains/prolab.unlp.edu.ar/vhosts/www/htdocs/includes/" . PATH_SEPARATOR . ini_get("include_path"));
	
	require_once 'HTML/Table.php';

	session_start();
	if(!isset($_SESSION['usr_empresa'])){
		echo "<script>window.location='index.php?op=AdminEmpresas/index';</script>";
	}
	
	//******************ARMAMOS EL ENCABEZADO DE LA PAGINA***********************
	
	echo "<html><head><title>Ver Ofertas de mi Empresas</title><link rel='stylesheet' href='AdminEmpresas/estilos/estilos.css' type='text/css'></head>";
	
	echo "<body class='body'>";
	include("conexion.php");
	$query ="SELECT * ";
	$query .="FROM empresas ";
	//$query .="WHERE usuario = '".$_SESSION["usr_empresa"]."' ";
       $query .="WHERE id = '".$_SESSION["id_empresa"]."' ";
	//include("../consultar.php");
	$result =  $conexionDB->query($query);
	$datos = $result -> fetchRow(DB_FETCHMODE_ASSOC);

	if (isset($_GET["filtro_activo"]))
		$_SESSION["filtro_activo"]=$_GET["filtro_activo"];

	echo " <div class='titulo'>".$datos["nombrecomercial"]."</div>	<DIV class='menuB'>	<BR>";

	//sacamos las ofertas de la empresa correspondiente.
	?>
	<!--<div class='useraddmenu' width="75%">Filtro de Ofertas
	<FORM style="display:inline;" METHOD="GET" NAME="filtros" ACTION="<?=$_SERVER["PHP_SELF"]?>">
		<SELECT NAME="filtro_activo" title='Filtrar por..' onchange="filtros.submit();">
		
	<?php 
		if ($_SESSION["filtro_activo"] == 'y'){
			echo "<OPTION value='y' selected>"."Activas"."\n";		
			echo "<OPTION value='n' >"."Desactivas"."\n";
			echo "<OPTION value='todos' >"."Todas"."\n";
		}
		if ($_SESSION["filtro_activo"] == 'n'){
			echo "<OPTION value='y' >"."Activas"."\n";		
			echo "<OPTION value='n' selected>"."Desactivas"."\n";
			echo "<OPTION value='todos' >"."Todas"."\n";
		}
		if ($_SESSION["filtro_activo"] == 'todos'){
			echo "<OPTION value='y' >"."Activas"."\n";		
			echo "<OPTION value='n' >"."Desactivas"."\n";
			echo "<OPTION value='todos' selected >"."Todas"."\n";
		}
	
		if (!isset($_SESSION["filtro_activo"])){
    		echo "<OPTION value='y' >"."Activas"."\n";		
			echo "<OPTION value='n' >"."Desactivas"."\n";
			echo "<OPTION value='todos' selected>"."Todas"."\n";
		}?>
		</SELECT>		
	</FORM>
	</div></br>-->
<?php
	$query ="SELECT id,fecha,(select desc_tipo_oferta from tipo_oferta where id_tipo_oferta=tipoOf) as tipoOf,area,aviso,activo, publicar ";
	$query .="FROM empresas_ofertas ";
	$query .="WHERE id_empresa = '".$datos["id"]."' ";

	/*if ($_SESSION["filtro_activo"] == 'y'){
		$query .="AND activo = 'y' ";
	}
	if ($_SESSION["filtro_activo"] == 'n'){
		$query .="AND activo = 'n' ";
	}*/	

	$query .="ORDER BY fecha";
//echo $query;
	$result =  $conexionDB->query($query);
		
	
	unset($data);
	$data[0][] = "Fecha";
	$data[0][] = "Tipo de oferta";
	//$data[0][] = "Area";
	$data[0][] = "Búsqueda";
	$data[0][] = "Postulados";
	$data[0][] = "Perfil";
	//$data[0][] = "Activar/Desactivar";
	$table = new HTML_Table(array('class' => 'headerCv','width'=>'100%'));
	$table -> setCaption('Ofertas' ,'class=texto1a');
	$table->addRow($data[0],null,'TH');
	while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
		unset($data);
	$data[1][] = $row["fecha"];
	$data[1][] = $row["tipoOf"];
	//$data[1][] = $row["area"];
	$data[1][] = $row["aviso"];
	if($row["publicar"]=="s"){
		$data[1][] = "<A HREF='index.php?op=AdminEmpresas/viewPostulados.php&id=".$row['id']."' TITLE='Ver item'><IMG BORDER=0 SRC='AdminEmpresas/icons/preview.gif'></A>";
	}else{
		$data[1][] = "<span style='font-size: 9px; color:red;'>Oferta Finalizada</span>";
	}
	$data[1][] = "<A HREF='index.php?op=AdminEmpresas/viewOferta.php&id=".$row['id']."' TITLE='Ver item'><IMG BORDER=0 SRC='AdminEmpresas/icons/preview.gif'></A>";
	
	/*if($row["activo"] != 'y'){					
				$data[1][] = "<a href='activarOferta.php?&id_oferta=".$row["id"]."'><img src='../images/green_dot.gif' BORDER='0' alt='Activar Oferta' />Activar</a>";				
			}else{
				$data[1][] = "<a href='desactivarOferta.php?&id_oferta=".$row["id"]."'><img src='../images/red_dot.gif' BORDER='0' alt='Desactivar Oferta' />Desactivar</a>";				
			}*/

	$table->addRow($data[1]);
	}
	echo $table->toHTML();


	
	echo "<br><div align='center'><FORM ACTION='logout.php'><input class='boton' type='submit' name='salir' value='Salir' type='button' /></FORM>	</div></body></html>";
	
?>