<?php session_start();
if (!isset($_SESSION["idUsr"])){
	header("location:errorAccess.html");
	exit;
}
	
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../estilo1.css" type="text/css">

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="thickbox.js"></script>
<script type="text/javascript" src="../livevalidation.js"></script>
<script src="js/ajax.js"></script>


</HEAD>

<body>


<center><span class="titulo1">Ingresa tus Datos: Paso 2</span></center>

 <br><br>
<?php
	if(isset($_SESSION['idUsr'])){
		include "menu_cv.php";
}
?>
 
<style>
.label{
	text-align: right;
}
</style>

<? include("nuevoCV_Estudios.php"); ?>




<?php	
	//armo el combo de niveles para idioma
		$query ="SELECT * FROM cursos_niveles ";
		include("consultar.php");	
		$combo_nivel_idioma = "";					
		while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			$combo_nivel_idioma.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}
	//FIN
	$query = "SELECT * FROM usuarios_idiomas  WHERE id_usuario=".$_SESSION['idUsr'];	
	include("consultar.php");
	if ($ok = $result -> numRows()){
			echo '<form action="" method="post">';
	}else{
			echo '<form action="insert_idioma.php" method="post">';
	}
?>  
<fieldset style="width: 80%;">
    <legend><span class="titulo2">Idiomas</span></legend>
 <table width="100%">
<?php
    
		$query ="SELECT * FROM item_idioma ";
		include("consultar.php");	
		if(!$ok){						
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				
				echo "<tr><td class='label'>".$row['descripcion']."</td><td>";			
				echo "<select class='opcion' name='nivel_".$row['id']."' id='nivel_".$row['id']."'>";			
				
				echo $combo_nivel_idioma;		 
			
				print "</select>";			
				print "</td>";
				print "</tr>";
			}
		}else{
			$query = "SELECT ui.id, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_idiomas ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_idioma ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id";
		
			include("consultar.php");	
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				echo "<tr><td class='label'>".$row['item'].": </td>";
				echo "<td class='opcion'><a href='editIdioma.php?idUsuarioIdioma=".$row['id']."&keepThis=true&TB_iframe=true&height=100&width=300'  class='thickbox'>".$row['nivel']."</a></td></tr>";	
			}		
		}
	
 ?>
		<tr>
			<td align="center" colspan="2"></br>
				<input class="boton" type="submit" style="width: 150px;" value="Guardar y Agregar Otro"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	</table>
	</fieldset>
	</form>
	
<?php
	$query = "SELECT * FROM usuarios_informatica WHERE id_usuario=".$_SESSION['idUsr'];	
	include("consultar.php");
	if ($ok = $result -> numRows()){
	  echo '<form action="" method="post">';
	}else{
	  echo '<form action="insert_informatica.php" method="post">';
	}
?> 
<fieldset style="width: 80%;">
    <legend><span class="titulo2">Computacion</span></legend>
 <table width="100%">
 <?php
		//armo el combo d eniveles q siempre es igual
		$query ="SELECT * FROM cursos_niveles where solo_idioma=false ";
		include("consultar.php");	
		$combo_nivel = "";					
		while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			$combo_nivel.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}

		//FIN

		$query ="SELECT * FROM item_informatica ";
		include("consultar.php");	
		if(!$ok){							
			while ($row1 = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				
				echo "<tr><td class='label'>".$row1['descripcion']."</td><td>";
				echo '<select class="opcion" name="nivel_'.$row1['id'].'" id="nivel_'.$row1['id'].'">';			
					echo $combo_nivel;			 			
				print "</select>";
				print "</td>";
				print '<td class="opcion"><input type="checkbox" name="posee_'.$row1['id'].'_informatica" value="true"/>Posee certificado</td>';
				print "</tr>";
			}
		}else{
			$query = "SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_informatica ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_informatica ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id";
		
			include("consultar.php");	
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				echo "<tr><td class='label'>".$row['item'].": </td>";
				echo "<td class='opcion'><a href='editInformatica.php?idUsuarioInformatica=".$row['id']."&keepThis=true&TB_iframe=true&height=130&width=300'  class='thickbox'>".$row['nivel']."</a></td>";
				if($row['certificado']){
					echo "<td class='label_left'>Posee Certif.</td></tr>";
				}else{
					echo "<td class='label_left'>No Posee Certif.</td></tr>";
				}

			}		
		}
 ?>

		<tr>
			<td align="center" colspan="3"></br>
				<input class="boton" type="submit" style="width: 150px;" value="Guardar y Agregar Otro"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	</table>
	</fieldset>
	</form>
	
<?php
	$query = "SELECT * FROM usuarios_contabilidad WHERE id_usuario=".$_SESSION['idUsr'];	
	include("consultar.php");
	if ($ok = $result -> numRows()){
	  echo '<form action="" method="post">';
	}else{
	  echo '<form action="insert_contabilidad.php" method="post">';
	}
?>  
<fieldset style="width: 80%;">
    <legend><span class="titulo2">Conocimientos Contables</span></legend>
 <table width="100%" id="field_contabilidad">
	<?php
		//armo el combo d eniveles q siempre es igual
		$query ="SELECT * FROM cursos_niveles where solo_idioma=false ";
		include("consultar.php");	
		$combo_nivel = "";					
		while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			$combo_nivel.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}

		//FIN

		$query ="SELECT * FROM item_contables ";
		include("consultar.php");	
		if(!$ok){						
			while ($row1 = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				
				echo "<tr><td class='label'>".$row1['descripcion']."</td><td>";
				echo '<select class="opcion" name="nivel_'.$row1['id'].'" id="nivel_'.$row1['id'].'">';			
				
				require_once "DB.php";
					
				echo $combo_nivel;
			 
			
				print "</select>";
				print "</td>";
				if($row1['conCertificado']){
					print '<td class="opcion"><input type="checkbox" name="posee_'.$row1['id'].'_contable" value="true"/>Posee certificado</td>';
				}
				print "</tr>";
			}
		}else{
			$query = "SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item, ii.conCertificado  FROM usuarios_contabilidad ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_contables ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id";
			include("consultar.php");	
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				echo "<tr><td class='label'>".$row['item'].": </td>";
				echo "<td class='opcion'><a href='editContabilidad.php?idUsuarioContabilidad=".$row['id']."&keepThis=true&TB_iframe=true&height=140&width=300'  class='thickbox'>".$row['nivel']."</a></td>";
				if($row['conCertificado']){
					if($row['certificado']){
						echo "<td class='label_left'>Posee Certif.</td></tr>";
					}else{
						echo "<td class='label_left'>No Posee Certif.</td></tr>";
					}
				}
			}		
		}
 ?>
		

		<tr>
			<td align="center" colspan="3"></br>
				<input class="boton" type="submit" style="width: 150px;" value="Guardar y Agregar Otro"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	</table>
	</fieldset>
</form>
<? include("nuevoCV_Cursos.php"); ?>
<br>
<form action="nuevoCV_Paso3.php">
<table width="100%">
<tr>
	<td align="right"><input class="boton" type="submit" value="Siguiente"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="boton" type="button" value="volver" onclick="javascript:window.location='nuevoCV.php'"/></td>
</tr>
</table>
</form>
</body>
</html>

