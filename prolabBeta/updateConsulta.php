
 <?php
 require "lib.php";
 require "conexion.php";
 $miip = getenv('REMOTE_ADDR');
 
 $ipaux = $conexionDB->query("select idEquipo from equipos where ip ='$miip'");
 $cip =  $ipaux->fetchRow(DB_FETCHMODE_ORDERED);
 
 $nombre = $_POST['usuariox'];
  $mail = $_POST['mailx'];

 if (!isset($cip[0]))
{
   
   $csectoraux = $conexionDB->query("select idSector from sector where descripcion = '".$_POST['sectoresx']."'");
   $csector=  $csectoraux->fetchRow(DB_FETCHMODE_ORDERED);
   $sector = $csector[0];
 
  $cfuncionaux = $conexionDB->query("select idFuncion from funcion where descripcion = '".$_POST['funcionx']."'");
  $cfuncion=  $cfuncionaux->fetchRow(DB_FETCHMODE_ORDERED);
  $funcion = $cfuncion[0];
  $cdependenciaaux = $conexionDB->query("select idDepend from dependencias where descripcion = '".$_POST['dependenciax']."'");
  $cdependencia=  $cdependenciaaux->fetchRow(DB_FETCHMODE_ORDERED);
  $dependencia = $cdependencia[0];
  $cmemoriaaux = $conexionDB->query("select idMemo from memorias where descripcion = '".$_POST['memoriax']."'");
  $cmemoria = $cmemoriaaux->fetchRow(DB_FETCHMODE_ORDERED);
  $memoria = $cmemoria[0];

  $cprocesadoraux = $conexionDB->query("select idProces from procesadores where descripcion = '".$_POST['procesadorx']."'");
  $cprocesador=  $cprocesadoraux->fetchRow(DB_FETCHMODE_ORDERED);
  $procesador = $cprocesador[0];
 
  $cdiscoaux = $conexionDB->query("select idDisco from discos where descripcion = '".$_POST['discox']."'");
  $cdisco=  $cdiscoaux->fetchRow(DB_FETCHMODE_ORDERED);
  $disco = $cdisco[0];

  $cmonitoraux = $conexionDB->query("select idMonitor from monitores where descripcion = '".$_POST['monitorx']."'");
  $cmonitor=  $cmonitoraux->fetchRow(DB_FETCHMODE_ORDERED);
  $monitor = $cmonitor[0];

  $cimpresoraaux  = $conexionDB->query("select idImpresora from impresoras where descripcion = '".$_POST['impresorax']."'");
  $cimpresora=  $cimpresoraaux->fetchRow(DB_FETCHMODE_ORDERED);
  $impresora = $cimpresora[0];

  
  $csoaux = $conexionDB->query("select id_so from so where descripcion = '".$_POST['sistoperx']."'");
  $cso=  $csoaux->fetchRow(DB_FETCHMODE_ORDERED);
  $so = $cso[0];

  $red = $_POST['redx'];


 $conexionDB-> query("insert into equipos (ip, conexRed, sistOper, idProc, idMemo, idMoni, idImpre, idDisco, idDepen) values ('$miip', '$red', '$so', '$procesador', '$memoria', '$monitor', '$impresora', '$disco', '$dependencia')");

 }
 //fin de if

 $caplicacionaux = $conexionDB->query("select id_aplic from aplicaciones where descripcion = '".$_POST['aplicacionx']."'");
 $caplicacion =  $caplicacionaux->fetchRow(DB_FETCHMODE_ORDERED);
 $aplicacion = $caplicacion[0];
  
  $problema = $_POST['probx'];

 $fecha = date("Y-m-d");

  $cequipoaux =  $conexionDB->query("select idEquipo from equipos where ip = '".$miip."'");
  $cequipo =  $cequipoaux->fetchRow(DB_FETCHMODE_ORDERED);
  $equipo = $cequipo[0];
  
  $cnivelaux =  $conexionDB->query("select idNivel from niveles order by idNivel DESC");
  $cnivel =  $cnivelaux->fetchRow(DB_FETCHMODE_ORDERED);
  $nivel = $cnivel[0];
  
  if ($_POST['reportez'] == 'Reporte' ){
	  $reporte = 1;
  }else
  {$reporte = 2;}

  $conexionDB->query("insert into consultas (idTipoIncidente, descripcion, idAplicacion, nombreReportante, mailReportante, idNivel, aProveedor, id_equipo, fecha_creacion) values ('$reporte', '$problema', '$aplicacion', '$nombre', '$mail', '$nivel', '0', '$equipo', '$fecha')");

  $qnro = $conexionDB->query("select nro_incidente from consultas where (descripcion = '$problema') and (nombreReportante = '$nombre')");	
  $cnro = $qnro->fetchRow(DB_FETCHMODE_ORDERED);
  $nro = $cnro[0];
  echo ("<script>window.location='index.php?op=exito&nro=".$nro."'</script>");

  ?>