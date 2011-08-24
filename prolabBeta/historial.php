<?php
echo ($_GET['idConsulta']);
 /*if (!isset($_POST['idConsulta'])){
 historial("SELECT tipo_estado.descripcion, estado_reporte.fecha_asignacion, operadores.nombre FROM estado_reporte, tipo_estado, operadores WHERE (estado_reporte.id_reporte=".$_POST['idConsulta'].") and (tipo_estado.idTipoEst = estado_reporte.id_tipo_estado) and (estado_reporte.id_operador = operadores.idOper) ORDER BY estado_reporte.fecha_asignacion ASC");}*/
?>