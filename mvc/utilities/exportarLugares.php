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
header("Content-Disposition: filename=ConsultaLugares-".$_GET['busqueda'].'-'.time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
$consulta = $_SESSION['consulta'];
?>
<table border="1">
    <thead>
    <th colspan="2"><b>INFORMACIÓN DE LUGARES</b></th>
    <tr>
        <td><b>#Id. lugar</b></td>
        <td><b>Nombre de lugar</b></td>
    </tr>
    </thead>
    <tbody>
    <?php
    $consulta = $_SESSION['consulta'];
    foreach ($consulta as $respuesta){
        ?>
        <tr>
            <td>
                <?php echo $respuesta['IdLugar']; ?>
            </td>
            <td>
                <?php echo $respuesta['NombreLugar']; ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>