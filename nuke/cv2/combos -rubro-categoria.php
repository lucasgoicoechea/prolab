<?
require_once "DB.php";
require_once 'HTML/Table.php';


$idcombo = $_POST["id"];
$action = $_POST["combo_name"];

switch($action){
	case "categoria":{
		$query = "SELECT id,descripcion FROM rubro_empresa WHERE id_categoria = ".$idcombo." order by descripcion ASC";
		include("consultar.php");
		echo '<option selected="selected" value="-1">-- Seleccione --</option>';
		while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
			echo "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";	
		}
	break;
	}
	
}
?>