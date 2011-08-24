 <?php
  include 'DBConection/DB.php';
  include "conf_graduado.ini";
   $options = array(
         'debug'       => 2,
          'portability' => DB_PORTABILITY_ALL,
    );
  $conexionDB = DB::connect(path,$options);
   if (DB::isError($conexionDB)) {
         die($conexionDB->getMessage());
   }
   
   	// hacer la consulta
	$i = $conexionDB->query("SELECT id,clave FROM usuarios");	
	// iterar en la consulta
	while ($f = $i -> fetchRow(DB_FETCHMODE_ASSOC)){
	
		$query = "UPDATE usuarios SET ";
		$contrasena = md5($f["clave"]);
		$query .=" clave='".$contrasena."' ";
		$query .=" WHERE id ='".$f["id"]."'";
		$consul = $conexionDB->query($query);
		//$consul -> fetchRow(DB_FETCHMODE_ORDERED);
		echo $query; 
	}

   $i = $conexionDB->query("SELECT id,clave FROM empresas");	
	// iterar en la consulta
	while ($f = $i -> fetchRow(DB_FETCHMODE_ASSOC)){
	
		$query = "UPDATE empresas SET ";
		$contrasena = md5($f["clave"]);
		$query .=" clave='".$contrasena."' ";
		$query .=" WHERE id ='".$f["id"]."'";
		$consul = $conexionDB->query($query);
		//$consul -> fetchRow(DB_FETCHMODE_ORDERED);
		echo $query; 
	}
?>