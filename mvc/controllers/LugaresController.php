<?php
session_start();
require_once '../models/LugaresDto.php';
require_once '../facades/LugaresFacade.php';
$fachada = new LugaresFacade();
$lugarDto = new LugaresDto();
if(isset($_GET['controlar'])) {
    $accion = $_GET['controlar'];
    switch ($accion) {
        case 'crear':
            $lugarDto->setNombreCiudad($_POST['NombreLugar']);
            $mensaje = $fachada->registrarLugar($lugarDto);
            header("Location: ../views/buscarLugares.php?mensaje=" . $mensaje);
            break;
        case 'modificar':
            $lugarDto->setIdCiudad($_POST['IdLugar']);
            $lugarDto->setNombreCiudad($_POST['NombreLugar']);
            $mensaje = $fachada->modificarLugar($lugarDto);
            header("Location: ../views/buscarLugares.php?mensaje=" . $mensaje);
            break;
        case 'buscar':
            $criterio = $_POST['criterio'];
            $busqueda = $_POST['busqueda'];
            $comobuscar = $_POST['comobuscar'];
            $mensaje = $fachada->buscarLugar($criterio, $busqueda, $comobuscar);
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarLugares.php?encontrados=false&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            } else {
                header("Location: ../views/buscarLugares.php?encontrados=true&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            }
            break;
        case 'todos':
            $mensaje = $fachada->listarTodos();
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarLugares.php?encontrados=false");
            } else {
                header("Location: ../views/buscarLugares.php?encontrados=true&todos=todos");
            }
            break;
        default:
            echo 'Valor incorrecto enviado por el método get a la variable controlar';
    }
}
