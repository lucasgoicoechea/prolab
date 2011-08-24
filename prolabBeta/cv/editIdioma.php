<?php

		include("../conexion.php");

		
		
		$qCursoItem =  $conexionDB->query("SELECT cn.id as nivelId, cn.descripcion as nivel, ii.descripcion as item, ii.id as idItem, ui.idioma  FROM usuarios_idiomas ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) left outer join item_idioma ii on (ii.id=ui.id_item) where ui.id=".$_GET['idUsuarioIdioma']);
		$rowCursoItem = $qCursoItem -> fetchRow(DB_FETCHMODE_ASSOC);
		//echo "<script>alert('".$rowCursoItem['nivelId']."');</script>";
	//armo el combo de niveles para idioma
		$Qcursos_niveles =  $conexionDB->query("SELECT * FROM cursos_niveles ");
		$combo_nivel_idioma = "";					
		while ($row = $Qcursos_niveles -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row["descripcion"]==$rowCursoItem['nivel']){	
				$combo_nivel_idioma.="<option value='".$row["id"]."' selected>".$row["descripcion"]."</option>";
			}else{
				$combo_nivel_idioma.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			}
		}
	//FIN
		if($rowCursoItem['item']!=null){
			$idioma = $rowCursoItem['item'];
		}else{
			$idioma = $rowCursoItem['idioma'];
		}

		echo "<form	method='post' action='update_idioma.php'>";
		echo "<input type='hidden' name='idUsuarioIdioma' value='".$_GET['idUsuarioIdioma']."' />";
		echo "<table width='100%'>";
		echo "<tr><td align='right' style='font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #1D3C81;text-decoration: none;	text-align: right;margin-left: 10;margin-right: 10;'>".$idioma."</td><td align='left'>";			
		echo "<select style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;' name='nivel_idioma' id='nivel_idioma'>";			
			echo $combo_nivel_idioma;		 
		print "</select>";			
		print "</td></tr>";
		print "<tr><td colspan='2' align='center'><br><br><input type='submit' value='guardar' style='font-size:10px;       font-family:Verdana,Helvetica; font-weight:bold; color:white; background:#638cb5; border:0px; width:80px; height:19px;'/></td></tr>";
		print "</table>";
		print "</form>";

?>