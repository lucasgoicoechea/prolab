<?php  
if (!isset($_SESSION["idUsr"])){
	echo "<script>window.location='index.php?op=cv/errorAccess.html';</script>";
}
include("conexion.php");
?>
<HTML>
<HEAD>
<link rel="stylesheet" href="cv/thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="estilo1.css" type="text/css">

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="cv/thickbox.js"></script>
<script type="text/javascript" src="js/livevalidation.js"></script>
<script src="js/ajax.js"></script>
<script>
function ocultarFilaIdioma(num,ver) {
  dis= ver ? '' : 'none';
  document.getElementById('tabla_idioma').getElementsByTagName('tr')[num].style.display=dis;
}
</script>

</HEAD>

<body>


<center><span class="titulo1">Carga de CV: Paso 2</span></center>

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
		//$query ="SELECT * FROM cursos_niveles ";
		//include("consultar.php");	
		$combo_nivel_idioma = "";					
		$qNivelIdioma =  $conexionDB->query("SELECT * FROM cursos_niveles ");
		while($row = $qNivelIdioma->fetchRow(DB_FETCHMODE_ASSOC)){	

			
			$combo_nivel_idioma.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}
	//FIN
	
	$qUsuario =  $conexionDB->query("SELECT * FROM usuarios_idiomas  WHERE id_usuario=".$_SESSION['idUsr']);
	
	if ($ok = $qUsuario -> numRows()){
			echo '<form action="cv/insert_idioma_libre.php" method="post">';
	}else{
			echo '<form action="cv/insert_idioma.php" method="post">';
	}
?>  
<fieldset style="width: 95%;">
    <legend><span class="titulo2">Idiomas</span></legend>
 <table width="100%" id="tabla_idioma">
<?php
    
		//$query ="SELECT * FROM item_idioma ";
		//include("consultar.php");	
		$Qitem_idioma =  $conexionDB->query("SELECT * FROM item_idioma");

		if(!$ok){						
			while ($row = $Qitem_idioma -> fetchRow(DB_FETCHMODE_ASSOC)){
				
				echo "<tr><td class='label'>".$row['descripcion']."</td><td>";			
				echo "<select class='opcion' name='nivel_".$row['id']."' id='nivel_".$row['id']."'>";			
				
				echo $combo_nivel_idioma;		 
			
				print "</select>";			
				print "</td>";
				print "</tr>";
			}
			
		}else{
			//$query = "SELECT ui.id, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_idiomas ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_idioma ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id";
		
			//include("consultar.php");	
			$Quser_idioma =  $conexionDB->query("SELECT ui.id, cn.descripcion as nivel, ii.descripcion as item, ui.idioma  FROM usuarios_idiomas ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) left outer join item_idioma ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id");

			while ($row = $Quser_idioma -> fetchRow(DB_FETCHMODE_ASSOC)){
				if($row['item']!=null){
					echo "<tr><td class='label'>".$row['item'].": </td>";
					echo "<td class='opcion'><a href='cv/editIdioma.php?idUsuarioIdioma=".$row['id']."&keepThis=true&TB_iframe=true&height=100&width=300'  class='thickbox'>".$row['nivel']."</a></td></tr>";
				}else{
					echo "<tr><td class='label'>".$row['idioma'].": </td>";
					echo "<td class='opcion' width='100px'><a href='cv/editIdioma.php?idUsuarioIdioma=".$row['id']."&keepThis=true&TB_iframe=true&height=100&width=300'  class='thickbox'>".$row['nivel']."</a></td><td style='align: left;'><a href='javascript:eliminarIdioma(".$row['id'].")' alt='Borrar'><img src='cv/icons/s_error.png' border='0' valign='middle' width='10' eight='10' alt='Borrar'/></a></td></tr>";
				}				
					
			}	
			//Para idiomas no predeterminados
			echo "<tr><td class='label'><input name='idioma' type='text' size='20'/></td><td>";			
			echo "<select class='opcion' name='nivel_libre' id='nivel_libre'>";			
			
			echo $combo_nivel_idioma;		 
			
			print "</select>";			
			print "</td>";
			print "</tr>";
		}
		
	
 ?>
		<tr>
			<td align="center" colspan="2"></br>
				<input class="boton" type="submit" value="Guardar y Agregar Otro" style="width: 150px;"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	</table>
	</fieldset>
	</form>
	
<?php
	//$query = "SELECT * FROM usuarios_informatica WHERE id_usuario=".$_SESSION['idUsr'];	
	//include("consultar.php");
	$Qusuarios_informatica =  $conexionDB->query("SELECT * FROM usuarios_informatica WHERE id_usuario=".$_SESSION['idUsr']);

	if ($ok = $Qusuarios_informatica -> numRows()){
	  echo '<form action="" method="post">';
	}else{
	  echo '<form action="cv/insert_informatica.php" method="post">';
	}
?> 
<fieldset style="width: 95%;">
    <legend><span class="titulo2">Computacion</span></legend>
 <table width="100%">
 <?php
		//armo el combo d eniveles q siempre es igual
		//$query ="SELECT * FROM cursos_niveles where solo_idioma=false ";
		//include("consultar.php");
		$Qcursos_niveles =  $conexionDB->query("SELECT * FROM cursos_niveles where solo_idioma=false ");
		$combo_nivel = "";					
		while ($row = $Qcursos_niveles -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			$combo_nivel.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}

		//FIN

		//$query ="SELECT * FROM item_informatica ";
		//include("consultar.php");	
		$Qitem_informatica =  $conexionDB->query("SELECT * FROM item_informatica ");

		if(!$ok){							
			while ($row1 = $Qitem_informatica -> fetchRow(DB_FETCHMODE_ASSOC)){
				
				echo "<tr><td class='label'>".$row1['descripcion']."</td><td>";
				echo '<select class="opcion" name="nivel_'.$row1['id'].'" id="nivel_'.$row1['id'].'">';			
					echo $combo_nivel;			 			
				print "</select>";
				print "</td>";
				print '<td class="opcion"><input type="checkbox" name="posee_'.$row1['id'].'_informatica" value="true"/>Posee certificado</td>';
				print "</tr>";
			}
		}else{
			//$query = "SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_informatica ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_informatica ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id";
		
			//include("consultar.php");
			$Qitem_info_curso =  $conexionDB->query("SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item  FROM usuarios_informatica ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_informatica ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id");

			while ($row = $Qitem_info_curso -> fetchRow(DB_FETCHMODE_ASSOC)){
				echo "<tr><td class='label'>".$row['item'].": </td>";
				echo "<td class='opcion'><a href='cv/editInformatica.php?idUsuarioInformatica=".$row['id']."&keepThis=true&TB_iframe=true&height=130&width=300'  class='thickbox'>".$row['nivel']."</a></td>";
				if($row['certificado']){
					echo "<td class='label_left'>Posee Certif.</td></tr>";
				}else{
					echo "<td class='label_left'>No Posee Certif.</td></tr>";
				}

			}		
		}
 ?>

		<tr>
			<td align="center" colspan="3"><br>
				<input class="boton" type="submit" value="Guardar"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	</table>
	</fieldset>
	</form>
	
<?php
	//$query = "SELECT * FROM usuarios_contabilidad WHERE id_usuario=".$_SESSION['idUsr'];	
	//include("consultar.php");
	$Qusuarios_contabilidad =  $conexionDB->query("SELECT * FROM usuarios_contabilidad WHERE id_usuario=".$_SESSION['idUsr']);

	if ($ok = $Qusuarios_contabilidad -> numRows()){
	  echo '<form action="" method="post">';
	}else{
	  echo '<form action="cv/insert_contabilidad.php" method="post">';
	}
?>  
<fieldset style="width: 95%;">
    <legend><span class="titulo2">Conocimientos Contables</span></legend>
 <table width="100%" id="field_contabilidad">
	<?php
		//armo el combo d eniveles q siempre es igual
		$Qcursos_niveles =  $conexionDB->query("SELECT * FROM cursos_niveles where solo_idioma=false ");

		$combo_nivel = "";					
		while ($row = $Qcursos_niveles -> fetchRow(DB_FETCHMODE_ASSOC)){
			
			$combo_nivel.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			 
		}

		//FIN

		$Qitem_contables =  $conexionDB->query("SELECT * FROM item_contables");

		if(!$ok){						
			while ($row1 = $Qitem_contables -> fetchRow(DB_FETCHMODE_ASSOC)){
				
				echo "<tr><td class='label'>".$row1['descripcion']."</td><td>";
				echo '<select class="opcion" name="nivel_'.$row1['id'].'" id="nivel_'.$row1['id'].'">';			
				
				echo $combo_nivel;			 
			
				print "</select>";
				print "</td>";
				if($row1['conCertificado']){
					print '<td class="opcion"><input type="checkbox" name="posee_'.$row1['id'].'_contable" value="true"/>Posee certificado</td>';
				}
				print "</tr>";
			}
		}else{
			//$query = "SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item, ii.conCertificado  FROM usuarios_contabilidad ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_contables ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id";
			//include("consultar.php");	
			$QitemCurso =  $conexionDB->query("SELECT ui.id, ui.certificado, cn.descripcion as nivel, ii.descripcion as item, ii.conCertificado  FROM usuarios_contabilidad ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_contables ii on (ii.id=ui.id_item) where ui.id_usuario=".$_SESSION['idUsr']." order by ii.id");

			while ($row = $QitemCurso -> fetchRow(DB_FETCHMODE_ASSOC)){
				echo "<tr><td class='label'>".$row['item'].": </td>";
				echo "<td class='opcion'><a href='cv/editContabilidad.php?idUsuarioContabilidad=".$row['id']."&keepThis=true&TB_iframe=true&height=140&width=300'  class='thickbox'>".$row['nivel']."</a></td>";
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
				<input class="boton" type="submit" value="Guardar"/>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		
			</td>
		</tr>
	</table>
	</fieldset>
</form>
<? include("nuevoCV_Cursos.php"); ?>
<br><br>
<table width="100%">
<tr>
	<td align="right"><input class="boton" type="button" value="Siguiente" onclick="javascript:window.location='index.php?op=cv/nuevoCV_Paso3.php'"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="boton" type="button" value="volver" onclick="javascript:window.location='index.php?op=cv/nuevoCV.php'"/></td>
</tr>
</table>
</body>
</html>

<script>

function eliminarIdioma(idIdioma){
var ok=confirm("¿Realmente desea ELIMINAR este Idioma?");
	if(ok)
	{
	document.location="cv/deleteIdiomaLibre.php?id="+idIdioma;
	}
}


</script>