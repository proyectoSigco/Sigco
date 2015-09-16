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
      header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
      header("Content-Disposition: filename=ConsultaMetas-".'-'.time().".xls");
      header("Pragma: no-cache");
      header("Expires: 0");

?>
<table border="1">
  <tr>
      <td>ID Meta</td>
      <td>Tipo</td>
      <td>Valor</td>
      <td>Fecha Inicio</td>
      <td>Fecha Fin</td>
  </tr>
  <?php
  foreach ($_SESSION['exportar'] as $respuesta){

  ?>
<tr>

    <td><?php echo utf8_encode( $respuesta['IdMeta']) ?></td>
    <td><?php echo utf8_encode( $respuesta['Tipo']) ?></td>
    <td><?php echo utf8_encode( $respuesta['CantidadValor']) ?></td>
    <td><?php echo utf8_encode( $respuesta['FechaInicio']) ?></td>
    <td><?php echo utf8_encode( $respuesta['FechaFin']); ?></td>
</tr>
    <?php

    }
   unset($_SESSION['exportar']);
    ?>




</table>
</body>
</html>