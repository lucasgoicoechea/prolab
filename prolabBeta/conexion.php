
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
  ?>
