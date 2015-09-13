<?php
session_start();
  if (isset($_POST['exportar'])){
      header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
      header("Content-Disposition: filename=ConsultaClientes-".$_GET['busqueda'].'-'.time().".xls");
      header("Pragma: no-cache");
      header("Expires: 0");
      $consulta = $_SESSION['exportar'];
      unset($_SESSION['exportar']);
  }
?>
<table border="1">
  <tr>
  <td>Cédula</td>
  <td>Nombres</td>
  <td>Apellidos</td>
  <td>Email personal</td>
  <td>#Celular</td>
  <td>#Nit</td>
  <td>Razón social</td>
  <td>Dirección empresa</td>
  <td>Ubicación</td>
  <td>Teléfono empresa</td>
  <td>Email corporativo</td>
  <td>Tipo de cliente</td>
  <td>Actividad empresarial</td>
  <td>Clasificación</td>
  </tr>
  <?php
  foreach ($consulta as $respuesta){
  ?>
<tr>
    <td><?php utf8_encode($respuesta['CedulaPersona']) ?></td>
    <td><?php utf8_encode( $respuesta['Nombres']) ?></td>
    <td><?php utf8_encode( $respuesta['Apellidos']) ?></td>
    <td><?php utf8_encode( $respuesta['EmailPersona']) ?></td>
    <td><?php utf8_encode( $respuesta['CelularPersona']) ?></td>
    <td><?php utf8_encode( $respuesta['Nit']); ?></td>
    <td><?php utf8_encode( $respuesta['RazonSocial']); ?></td>
    <td><?php utf8_encode( $respuesta['Direccion']); ?></td>
    <td><?php utf8_encode( $respuesta['NombreLugar']); ?></td>
    <td><?php utf8_encode( $respuesta['Telefono']); ?></td>
    <td><?php utf8_encode( $respuesta['EmailCliente']); ?></td>
    <td><?php utf8_encode( $respuesta['NombreTipo']); ?></td>
    <td><?php utf8_encode( $respuesta['NombreActividad']); ?></td>
    <td><?php utf8_encode( $respuesta['NombreClasificacion']); ?></td>
</tr>
    <?php
    }
    ?>


