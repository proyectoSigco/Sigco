<?php
include_once '../models/CotizacionesDTO.php';
include_once'../models/DetallesCotizacionDTO.php';
include_once '../facades/FacadeCotizaciones.php';
include_once'../facades/FacadeProducto.php';
include_once'../models/ProductosCotizados.php';
session_start();
$dto=new CotizacionesDTO();
$facade=new FacadeCotizaciones();
$facadeProducto=new Facade();
$detalles=new DetallesCotizacionDTO();

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
    $idproducto=$_POST['idproducto'];
    $cantidad=$_POST['cantidad'];
    $cliente=$_POST['idcliente'];
    $producto=$facadeProducto->obtenerProducto($idproducto);
    print_r($producto);
    $dto=new ProductosCotizados();
    $dto->setId($idproducto);
    $dto->setNombre($producto['NombreProducto']);
    $dto->setValorBase($producto['ValorBase']);
    $dto->setCantidad($cantidad);
    $sinIva=$dto->getValorBase()*$cantidad;
    $iva=($producto['PorcentajeIva']/100)*$sinIva;
    $dto->setIva($iva);
    $dto->setSubtotal($sinIva+$iva);
    if (!isset($_SESSION['productoDatos']) ){
        $_SESSION['productoDatos']=array();
        array_push($_SESSION['productoDatos'],$dto);
    }else{
        array_push($_SESSION['productoDatos'],$dto);
    }
  header('location: ../views/crearCotizacion2.php?idcliente='.$cliente);
}


if (isset($_GET['finalizar'])) {
    $dto->setObservaciones($_POST['observaciones']);
    $dto->setEstado("Vigente");
    $dto->setIdCliente($_GET['idcliente']);
    $dto->setIdUsuario($_SESSION['datosLogin']['id']);
    $dto->setDescuentoIvaxCliente("Si");
    $idCotizacion=$facade->registrarCotizaciones($dto)['idc'];
    foreach ($_SESSION['productoDatos'] as $productos ) {
        $detalles->setIdCotizacion($idCotizacion);
        $detalles->setCantidad($productos->getCantidad());
        $detalles->setIdProducto($productos->getId());
        $detalles->setTotal($productos->getSubtotal());
        $detalles->setIva($productos->getIva());
        $mensaje=$facade->agregarProducto($detalles);
    }
    unset($_SESSION['productoDatos']);
    header("Location: ../views/buscarCotizaciones.php?mensaje=" . $mensaje);

}

if (isset($_GET['cancelar'])){
    $id=$_GET['id'];
    $mensaje=$facade->cancelarCoti($id);
    header("Location: ../views/buscarCotizaciones.php?mensaje=" . $mensaje);
}




