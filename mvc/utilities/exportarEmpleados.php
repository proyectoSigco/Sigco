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
      header("Content-Disposition: filename=ConsultaEmpleados-".'-'.time().".xls");
      header("Pragma: no-cache");
      header("Expires: 0");

?>
<table border="1">
  <tr>
      <td>#Documento</td>
      <td>Nombres</td>
      <td>Apellidos</td>
      <td>E-mail</td>
      <td>Estado</td>
      <td>Celular</td>
  </tr>
  <?php
  foreach ($_SESSION['consulta'] as $respuesta){

  ?>
<tr>

    <td><?php echo utf8_encode( $respuesta['CedulaEmpleado']) ?></td>
    <td><?php echo utf8_encode( $respuesta['Nombres']) ?></td>
    <td><?php echo utf8_encode( $respuesta['Apellidos']) ?></td>
    <td><?php echo utf8_encode( $respuesta['EmailPersona']) ?></td>
    <td><?php echo utf8_encode( $respuesta['EstadoPersona']); ?></td>
    <td><?php echo utf8_encode( $respuesta['CelularPersona']); ?></td>
</tr>
    <?php

    }
   unset($_SESSION['consulta']);
    ?>



</table>
</body>
</html>

