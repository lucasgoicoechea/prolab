<?php
session_start();
include("../conexion.php");

		$qCursoItem =  $conexionDB->query("SELECT cn.id as idNivel, cn.descripcion as nivel, ii.descripcion as item, ii.id as idItem, ui.certificado  FROM usuarios_informatica ui inner join cursos_niveles cn on (cn.id=ui.id_nivel) inner join item_informatica ii on (ii.id=ui.id_item) where ui.id=".$_GET['idUsuarioInformatica']);
		$rowCursoItem = $qCursoItem -> fetchRow(DB_FETCHMODE_ASSOC);

	//armo el combo de niveles para idioma
		$qCursoNivel =  $conexionDB->query("SELECT * FROM cursos_niveles where solo_idioma=false ");
		
		$combo_nivel = "";					
		while ($row = $qCursoNivel -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($row["descripcion"]==$rowCursoItem['nivel']){	
				$combo_nivel.="<option value='".$row["id"]."' selected>".$row["descripcion"]."</option>";
			}else{
				$combo_nivel.="<option value='".$row["id"]."'>".$row["descripcion"]."</option>";
			}
		}
	//FIN
		
		
		echo "<form	method='post' action='update_informatica.php'>";
		echo "<input type='hidden' name='idUsuarioInformatica' value='".$_GET['idUsuarioInformatica']."' />";
		echo "<table width='100%'>";
		echo "<tr><td align='right' style='font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #1D3C81;text-decoration: none;	text-align: right;margin-left: 10;margin-right: 10;'>".$rowCursoItem['item']."</td><td align='left'>";			
		echo "<select style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;' name='nivel_informatica' id='nivel_informatica'>";			
			echo $combo_nivel;		 
		print "</select>";			
		print "</td></tr>";
		if($rowCursoItem['certificado']){
				$checked=" checked";
			}else{
				$checked=" ";
			}
		print "<tr><td align='right' style='font-family: Arial, Helvetica, sans-serif;font-size: 11px;color: #1D3C81;text-decoration: none;	text-align: right;margin-left: 10;margin-right: 10;'><br><input type='checkbox' name='posee_certificado' value='true' ".$checked."/></td><td style='FONT-SIZE: 11px;	FONT-FAMILY: Verdana;	TEXT-ALIGN: left;'><br>Posee certificado</td>";
		print "<tr><td colspan='2' align='center'><br><input type='submit' value='guardar' style='font-size:10px;       font-family:Verdana,Helvetica; font-weight:bold; color:white; background:#638cb5; border:0px; width:80px; height:19px;'/></td></tr>";
		print "</table>";
		print "</form>";