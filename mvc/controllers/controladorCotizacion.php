<?php
session_start();
require_once '../models/CotizacionesDTO.php';
require'../models/DetallesCotizacionDTO.php';
require_once '../facades/FacadeCotizaciones.php';
$dto=new CotizacionesDTO();
$detalles=new DetallesCotizacionDTO();
$facade=new FacadeCotizaciones();

if (isset($_POST['cantidad'])){
    $detalles->setIdProducto($_POST['idproducto']);
    $detalles->setCantidad($_POST['cantidad']);
    $dto->setEstado("Vigente");
    $dto->setIdCliente($_GET['idcliente']);
    $dto->setDescuentoIvaxCliente("si");
    $dto->setIdUsuario($_SESSION['datosLogin']['id']);
    $dto->setObservaciones($_POST['observaciones']);
    $dto->setValorTotal($detalles->getTotal());
    echo $facade->registrarCotizaciones($dto,$detalles);
}

if (isset($_GET['buscar'])) {
    $criterio = $_POST['criterio'];
    $busqueda = $_POST['busqueda'];
    $comobuscar = $_POST['comobuscar'];
    $resul = $facade->buscarConCriterio($criterio, $busqueda, $comobuscar);
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarCotizaciones.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarCotizaciones.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['listar'])) {
    unset($_SESSION['consulta']);
    $resul = $facade->listarCotizaciones();
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarCotizaciones.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarCotizaciones.php?encontrados=true&todos=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['agregar'])) {
    $detalles->setCantidad($_POST['cantidad2']);
    $detalles->setIdCotizacion(31);
    $detalles->setIdProducto($_POST['idproducto']);
    echo $facade->agregarProducto($detalles);
}
