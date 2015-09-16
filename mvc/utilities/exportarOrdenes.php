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
      header("Content-Disposition: filename=ConsultaOrdenesCompra-".'-'.time().".xls");
      header("Pragma: no-cache");
      header("Expires: 0");

?>
<table border="1">
  <tr>
      <td>ID Orden</td>
      <td>Estado</td>
      <td>Valor Cotizado</td>
      <td>Valor total</td>
      <td>Descuento</td>
  </tr>
  <?php
  foreach ($_SESSION['exportar'] as $respuesta){

  ?>
<tr>

    <td><?php echo utf8_encode( $respuesta['IdOrden']) ?></td>
    <td><?php echo utf8_encode( $respuesta['EstadoOrdenCompra']) ?></td>
    <td><?php echo utf8_encode( $respuesta['ValorTotalCotizacion']) ?></td>
    <td><?php echo utf8_encode( $respuesta['GranTotal']) ?></td>
    <td><?php echo utf8_encode( $respuesta['DescuentoTotal']); ?></td>
</tr>
    <?php

    }
   unset($_SESSION['exportar']);
    ?>




</table>
</body>
</html>