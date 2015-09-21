<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<head>
    <meta charset="UTF-8">
    <title>Exportar</title>
</head>
<body>
<?php
session_start();
header("Content-type: application/vnd.ms-excel; name='excel'; charset=utf-8");
header("Content-Disposition: filename=ConsultaClasificaciones-".$_GET['busqueda'].'-'.time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
$consulta = $_SESSION['consulta'];
?>
<table border="1">
    <thead>
    <th colspan="2"><b>INFORMACIÓN DE CLASIFICACIONES</b></th>
    <tr>
        <td><b>#Id. clasificación</b></td>
        <td><b>Nombre de la clasificación</b></td>
    </tr>
    </thead>
    <tbody>
    <?php
    $consulta = $_SESSION['consulta'];
    foreach ($consulta as $respuesta){
        ?>
        <tr>
            <td>
                <?php echo $respuesta['IdClasificacion']; ?>
            </td>
            <td>
                <?php echo $respuesta['NombreClasificacion']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>