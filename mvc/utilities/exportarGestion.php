<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<head>
    <meta charset="UTF-8">
    <title>Exportar clientes</title>
</head>
<body>
<?php
session_start();
  if (isset($_POST['exportar'])){
      header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
      header("Content-Disposition: filename=ConsultaClientes-".$_GET['busqueda'].'-'.time().".xls");
      header("Pragma: no-cache");
      header("Expires: 0");
  }
?>
<table border="1">
  <tr>
  <td>Cliente</td>
  <td>Fecha Programada</td>
  <td>Estado de Gestion</td>
  <td>Tipo de Gestion</td>
  <td>Asunto</td>
  <td>Asistentes</td>
  <td>Lugar</td>
  <td>Observaciones</td>
  <td>Usuario</td
  </tr>
  <?php
  foreach ($_SESSION['GestionExportar'] as $respuesta){

  ?>
<tr>

    <td><?php echo utf8_encode( $respuesta['NitClienteGestiones']) ?></td>
    <td><?php echo utf8_encode( $respuesta['FechaProgramada']) ?></td>
    <td><?php echo utf8_encode( $respuesta['EstadoGestiones']) ?></td>
    <td><?php echo utf8_encode( $respuesta['TipoGestiones']) ?></td>
    <td><?php echo utf8_encode( $respuesta['Asunto']); ?></td>
    <td><?php echo utf8_encode( $respuesta['Asistentes']); ?></td>
    <td><?php echo utf8_encode( $respuesta['ObservacionesGestiones']); ?></td>
    <td><?php echo utf8_encode( $respuesta['LugarGestiones']); ?></td>
    <td><?php echo utf8_encode($respuesta['CedulaEmpleadoGestiones']) ?></td>

</tr>
    <?php

    }
   unset($_SESSION['GestionExportar']);
    ?>




</table>
</body>
</html>