<?php
session_start();
require_once '../models/TiposEmpresasDto.php';
require_once '../facades/TiposEmpresasFacade.php';
$fachada = new TiposEmpresasFacade();
$tipoDto = new TiposEmpresasDto();
if(isset($_GET['controlar'])) {
    $accion = $_GET['controlar'];
    switch ($accion) {
        case 'crear':
            $tipoDto->setNombreTipo($_POST['NombreTipo']);
            $mensaje = $fachada->registrarTipoEmpresa($tipoDto);
            header("Location: ../views/buscarTiposEmpresas.php?mensaje=" . $mensaje);
            break;
        case 'modificar':
            $tipoDto->setIdTipo($_POST['IdTipo']);
            $tipoDto->setNombreTipo($_POST['NombreTipo']);
            $mensaje = $fachada->modificarTipoEmpresa($tipoDto);
            header("Location: ../views/buscarTiposEmpresas.php?mensaje=" . $mensaje);
            break;
        case 'buscar':
            $criterio = $_POST['criterio'];
            $busqueda = $_POST['busqueda'];
            $comobuscar = $_POST['comobuscar'];
            $mensaje = $fachada->buscarTipoEmpresa($criterio, $busqueda, $comobuscar);
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarTiposEmpresas.php?encontrados=false&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            } else {
                header("Location: ../views/buscarTiposEmpresas.php?encontrados=true&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            }
            break;
        case 'todos':
            $mensaje = $fachada->listarTodos();
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarTiposEmpresas.php?encontrados=false");
            } else {
                header("Location: ../views/buscarTiposEmpresas.php?encontrados=true&todos=todos");
            }
            break;
        default:
            echo 'Valor incorrecto enviado por el método get a la variable controlar';
    }
}
