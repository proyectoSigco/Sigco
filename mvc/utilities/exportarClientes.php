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
header("Content-Disposition: filename=ConsultaClientes-".$_GET['busqueda'].'-'.time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
$consulta = $_SESSION['consulta'];
?>
<table border="1">
    <thead>
    <th colspan="6"><b>INFORMACIÓN CORPORATIVA</b></th>
    <th colspan="5"><b>INFORMACIÓN PERSONAL</b></th>
    <th colspan="4"><b>CLASIFICACIÓN Y ESTADO</b></th>
    <tr>
        <td><b>#Nit</b></td>
        <td><b>Razón social</b></td>
        <td><b>Dirección empresa</b></td>
        <td><b>Ubicación</b></td>
        <td><b>Teléfono empresa</b></td>
        <td><b>Email corporativo</b></td>
        <td><b>Cédula</b></td>
        <td><b>Nombres</b></td>
        <td><b>Apellidos</b></td>
        <td><b>Email personal</b></td>
        <td><b>#Celular</b></td>
        <td><b>Tipo de cliente</b></td>
        <td><b>Actividad empresarial</b></td>
        <td><b>Clasificación</b></td>
        <td><b>Estado</b></td>
    </tr>
    </thead>
    <tbody>
    <?php
    $consulta = $_SESSION['consulta'];
    foreach ($consulta as $respuesta){
        ?>
        <tr>
            <td>
                <?php echo $respuesta['Nit']; ?>
            </td>
            <td>
                <?php echo $respuesta['RazonSocial']; ?>
            </td>
            <td>
                <?php echo $respuesta['Direccion']; ?>
            </td>
            <td>
                <?php echo $respuesta['NombreLugar']; ?>
            </td>
            <td>
                <?php echo $respuesta['Telefono']; ?>
            </td>
            <td>
                <?php echo $respuesta['EmailCliente']; ?>
            </td>
            <td>
                <?php echo $respuesta['CedulaPersona']; ?>
            </td>
            <td>
                <?php echo $respuesta['Nombres']; ?>
            </td>
            <td>
                <?php echo $respuesta['Apellidos']; ?>
            </td>
            <td>
                <?php echo $respuesta['EmailPersona']; ?>
            </td>
            <td>
                <?php echo $respuesta['CelularPersona']; ?>
            </td>
            <td>
                <?php echo $respuesta['NombreTipo']; ?>
            </td>
            <td>
                <?php echo $respuesta['NombreActividad']; ?>
            </td>
            <td>
                <?php echo $respuesta['NombreClasificacion']; ?>
            </td>
            <td>
                <?php echo $respuesta['EstadoPersona']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>