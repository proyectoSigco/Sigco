<?php
session_start();
require'../models/OrdenesDeCompraDTO.php';
require'../facades/FacadeOrdenCompra.php';
$dto= new OrdenesDeCompraDTO();
$facade= new FacadeOrdenCompra();

if (isset($_POST['idcoti'])){$dto->setObservaciones($_POST['observaciones']);
$dto->setCotizacionId($_POST['idcoti']);
$dto->setDescuentoTotal($_POST['descuento']);
$dto->setEstado('Realizada');
$dto->setGranTotal($_POST['total']);
$mensaje=$facade->registrarOrden($dto);
    header("Location: ../views/buscarOrdenes.php?mensaje=" . $mensaje);

}

if (isset($_GET['buscar'])) {
    $criterio = $_POST['criterio'];
    $busqueda = $_POST['busqueda'];
    $comobuscar = $_POST['comobuscar'];
    $resul = $facade->buscarConCriterio($criterio, $busqueda, $comobuscar);
    $_SESSION['consulta']=$resul;
    print_r($resul);
    if($resul==null){
        header("Location: ../views/buscarOrdenes.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarOrdenes.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['listar'])) {
    $resul = $facade->listarOrdenes();
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarOrdenes.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarOrdenes.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }

}

if (isset($_GET['cancelar'])){
    $id=$_GET['id'];
    $mensaje=$facade->cancelarOrden($id);
    header("Location: ../views/buscarOrdenes.php?mensaje=" . $mensaje);
}

