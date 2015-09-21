<?php
session_start();
require_once '../models/ClasificacionesDto.php';
require_once '../facades/ClasificacionesFacade.php';
$fachada = new ClasificacionesFacade();
$clasificacionDto = new ClasificacionesDto();
if(isset($_GET['controlar'])) {
    $accion = $_GET['controlar'];
    switch ($accion) {
        case 'crear':
            $clasificacionDto->setNombreClasificacion($_POST['NombreClasificacion']);
            $mensaje = $fachada->registrarClasificacion($clasificacionDto);
            header("Location: ../views/buscarClasificaciones.php?mensaje=" . $mensaje);
            break;
        case 'modificar':
            $clasificacionDto->setIdClasificacion($_POST['IdClasificacion']);
            $clasificacionDto->setNombreClasificacion($_POST['NombreClasificacion']);
            $mensaje = $fachada->modificarClasificacion($clasificacionDto);
            header("Location: ../views/buscarClasificaciones.php?mensaje=" . $mensaje);
            break;
        case 'buscar':
            $criterio = $_POST['criterio'];
            $busqueda = $_POST['busqueda'];
            $comobuscar = $_POST['comobuscar'];
            $mensaje = $fachada->buscarClasificacion($criterio, $busqueda, $comobuscar);
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarClasificaciones.php?encontrados=false&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            } else {
                header("Location: ../views/buscarClasificaciones.php?encontrados=true&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            }
            break;
        case 'todos':
            $mensaje = $fachada->listarTodos();
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarClasificaciones.php?encontrados=false");
            } else {
                header("Location: ../views/buscarClasificaciones.php?encontrados=true&todos=todos");
            }
            break;
        default:
            echo 'Valor incorrecto enviado por el método get a la variable controlar';
    }
}
