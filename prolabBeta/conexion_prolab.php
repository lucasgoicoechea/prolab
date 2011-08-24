
 <?php
  include 'DBConection/DB.php';
  include "conf_prolab.ini";
   $options = array(
         'debug'       => 2,
          'portability' => DB_PORTABILITY_ALL,
    );
  $conexionDB_Prolab = DB::connect(path,$options);
   if (DB::isError($conexionDB_Prolab)) {
         die($conexionDB_Prolab->getMessage());
   }
  ?>
