<?php

require_once '../models/ProductoDao.php';
require_once '../models/ProductoDto.php';
require_once '../controllers/ControladorProducto.php';
require_once '../utilities/Conexion.php';
require_once '../facades/FacadeProducto.php';

$fachada = new Facade();

if (isset($_POST['guardar'])) {
    if(isset($_POST['ImagenProducto'])){
    $file = $_FILES['ImagenProducto'];
    $name = uniqid().$file['name'];
    $path = "../images/".basename($name);
    } else{
        $name='55e920f1d7044placeholder.png';
    }
    $producto = new ProductosDto();
    $producto->setIdProducto($_POST['codigoProducto']);
    $producto->setNombreProducto($_POST['nombreProducto']);
    $producto->setDescripcion($_POST['descriptionProducto']);
    $producto->setIva($_POST['ivaProducto']);
    $producto->setValorUnitario($_POST['valorProducto']);
    $producto->setPresentacion($_POST['presentacionProducto']);
    $producto->setCategoria($_POST['categoriaProducto']);
    $producto->setImagenProducto('../images/'.$name);
    $mensaje = $fachada->registrarProducto($producto);
    if ( $mensaje ==1 ) {
        move_uploaded_file($file['tmp_name'], $path );

    }
     header("Location: ../views/productoListar.php?".$mensaje);

}
if(isset($_POST['modificar'])){
    if(isset($_POST['ImagenProducto'])){
        $file = $_FILES['ImagenProducto'];
        $name = uniqid().$file['name'];
        $path = "../images/".basename($name);
    } else{
        $name='55e920f1d7044placeholder.png';
    }
    $idviejo=$_GET['id'];
    $producto = new ProductosDto();
    $producto->setNombreProducto($_POST['nombreProducto']);
    $producto->setDescripcion($_POST['descriptionProducto']);
    $producto->setUnidadMedida($_POST['unidadProducto']);
    $producto->setIva($_POST['ivaProducto']);
    $producto->setValorUnitario($_POST['valorProducto']);
    $producto->setPresentacion($_POST['presentacionProducto']);
    $producto->setCategoria($_POST['categoriaProducto']);
    $producto->setImagenProducto('../images/'.$name);
    $mensaje = $fachada->actualizarProducto($producto,$idviejo);
    if ($mensaje ==1 ) {
        move_uploaded_file($file['tmp_name'], $path );

    }

    header("Location: ../views/productoListar.php?".$mensaje);

}

if (isset ($_GET['idproducto'])){
    $fachada = new Facade();
    $fachada->cancelarProducto($_GET['idproducto']);
    echo 'borre';
}

if (isset ($_POST['search'])){
    $mensaje=$_POST['searchProduct'];
    header("Location: ../views/productoListar.php?resultado=".$mensaje);
}

