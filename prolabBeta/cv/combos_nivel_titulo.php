<?
include("../conexion.php");

$idcombo = $_POST["id"];
$action = $_POST["combo_name"];

switch($action){
	case "nivel":{
		//$query = "SELECT id,descripcion FROM titulos WHERE id_nivel = ".$idcombo." order by descripcion ASC";
		//include("consultar.php");
		$Qtitulos =  $conexionDB->query("SELECT id,descripcion FROM titulos WHERE id_nivel = ".$idcombo." order by descripcion ASC");

		$primero=true;
		while ($row = $Qtitulos -> fetchRow(DB_FETCHMODE_ASSOC)){
			if($primero){
				echo "<option value='".$row["id"]."' selected>".$row["descripcion"]."</option>";	
			}else{
				echo "<option value='".$row["id"]."'>".$row["descripcion"]."</option>";	
			}
			$primero=false;
		}
	break;
	}
	
}
?>