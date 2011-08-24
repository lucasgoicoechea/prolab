<?


$idcombo = $_POST["id"];
$action = $_POST["combo_name"];
include("../conexion.php");

switch($action){
	case "pais":{

		//$query = "SELECT c_id,d_descripcion FROM com_partido WHERE c_id_provincia = ".$idcombo." order by d_descripcion ASC";
		//include("consultar.php");
		echo '<option selected="selected" value="-1">-- Seleccione --</option>';
		$qPartido =  $conexionDB->query("SELECT c_id,d_descripcion FROM com_partido WHERE c_id_provincia = ".$idcombo." order by d_descripcion ASC");
		while($row = $qPartido->fetchRow(DB_FETCHMODE_ASSOC)){	
			echo "<option value='".$row["c_id"]."'>".$row["d_descripcion"]."</option>";	
		}
	break;
	}
	case "estado":{		
		//$query = "SELECT c_id,d_descripcion FROM com_localidad WHERE c_id_partido= ".$idcombo." order by d_descripcion ASC";
		//include("consultar.php");
		echo '<option selected="selected" value="-1">-- Seleccione --</option>';
		$qLocalidad =  $conexionDB->query("SELECT c_id,d_descripcion FROM com_localidad WHERE c_id_partido= ".$idcombo." order by d_descripcion ASC");
		while($row = $qLocalidad->fetchRow(DB_FETCHMODE_ASSOC)){	
			echo "<option value='".$row["c_id"]."'>".$row["d_descripcion"]."</option>";	
		}
	break;
	}
}
?>