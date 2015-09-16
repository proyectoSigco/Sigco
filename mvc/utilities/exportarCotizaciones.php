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
      header("Content-Disposition: filename=ConsultaClientes-".'-'.time().".xls");
      header("Pragma: no-cache");
      header("Expires: 0");

?>
<table border="1">
  <tr>
      <td>ID Cotización</td>
      <td>Nombre Empresa</td>
      <td>Valor Cotización</td>
      <td>Fecha Creación</td>
      <td>Estado</td>
  </tr>
  <?php
  foreach ($_SESSION['exportar'] as $respuesta){

  ?>
<tr>

    <td><?php echo utf8_encode( $respuesta['IdCotizacion']) ?></td>
    <td><?php echo utf8_encode( $respuesta['RazonSocial']) ?></td>
    <td><?php echo utf8_encode( $respuesta['ValorTotalCotizacion']) ?></td>
    <td><?php echo utf8_encode( $respuesta['FechaCreacionCotizacion']) ?></td>
    <td><?php echo utf8_encode( $respuesta['EstadoCotización']); ?></td>
</tr>
    <?php

    }
   unset($_SESSION['exportar']);
    ?>


</table>
</body>
</html>