<?php
session_start();
require_once '../models/ProductoDao.php';
require_once '../models/ProductoDto.php';
require_once '../controllers/ControladorProducto.php';
require_once '../utilities/Conexion.php';
require_once '../facades/FacadeProducto.php';

$fachada = new Facade();

if (isset($_POST['guardar'])) {
    $file = $_FILES['ImagenProducto'];
    if(!($_FILES['ImagenProducto']['name']=="")){
    $name = uniqid().$file['name'];
    $path = "../images/".basename($name);
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
    $file = $_FILES['ImagenProducto'];
    if(!($_FILES['ImagenProducto']['name']=="")){
        $name = uniqid().$file['name'];
        $path = "../images/".basename($name);
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

if (isset ($_POST['deleteProducto'])){
    $fachada = new Facade();
    $msg=$fachada->cancelarProducto($_POST['deleteProducto']);
    echo json_encode($msg);
}

if (isset ($_POST['search'])){
    $mensaje=$_POST['searchProduct'];
    header("Location: ../views/productoListar.php?resultado=".$mensaje);
}
if (isset($_GET['buscar'])) {
    $criterio = $_POST['criterio'];
    $busqueda = $_POST['busqueda'];
    $comobuscar = $_POST['comobuscar'];
    $resul = $fachada->buscarConCriterio($criterio, $busqueda, $comobuscar);
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/productoListar.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/productoListar.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['listar'])) {
    $resul = $fachada->buscarProducto($_SESSION['datosLogin']['id']);
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/productoListar.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/productoListar.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if(isset($_POST['detailProduct'])){
    $response=$fachada->obtenerProducto($_POST['detailProduct']);
    echo json_encode($response);
}

