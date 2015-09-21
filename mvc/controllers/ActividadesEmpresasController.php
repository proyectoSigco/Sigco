<?php
session_start();
require_once '../models/ActividadesEmpresasDto.php';
require_once '../facades/ActividadesEmpresasFacade.php';
$fachada = new ActividadesEmpresasFacade();
$actividadDto = new ActividadesEmpresasDto();

if(isset($_POST['PagaIva'])){
        $pagaIva="Si";
}else{
    $pagaIva="No";
};

if(isset($_GET['controlar'])) {
    $accion = $_GET['controlar'];
    switch ($accion) {
        case 'crear':
            $actividadDto->setNombreActividad($_POST['NombreActividad']);
            $actividadDto->setPagaIva($pagaIva);
            $mensaje = $fachada->registrarActividadEmpresa($actividadDto);
            header("Location: ../views/buscarActividadesEmpresas.php?mensaje=" . $mensaje);
            break;
        case 'modificar':
            $actividadDto->setIdActividad($_POST['IdActividad']);
            $actividadDto->setNombreActividad($_POST['NombreActividad']);
            $actividadDto->setPagaIva($pagaIva);
            $mensaje = $fachada->modificarActividadEmpresa($actividadDto);
            header("Location: ../views/buscarActividadesEmpresas.php?mensaje=" . $mensaje);
            break;
        case 'buscar':
            $criterio = $_POST['criterio'];
            $busqueda = $_POST['busqueda'];
            $comobuscar = $_POST['comobuscar'];
            $mensaje = $fachada->buscarActividadEmpresa($criterio, $busqueda, $comobuscar);
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarActividadesEmpresas.php?encontrados=false&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            } else {
                header("Location: ../views/buscarActividadesEmpresas.php?encontrados=true&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            }
            break;
        case 'todos':
            $mensaje = $fachada->listarTodos();
            $_SESSION['consulta'] = $mensaje;
            if ($mensaje == null) {
                header("Location: ../views/buscarActividadesEmpresas.php?encontrados=false");
            } else {
                header("Location: ../views/buscarActividadesEmpresas.php?encontrados=true&todos=todos");
            }
            break;
        default:
            echo 'Valor incorrecto enviado por el método get a la variable controlar';
    }
}
