<?php
session_start();
require_once '../models/GestionDao.php';
require_once '../models/GestionDto.php';
require_once '../utilities/Conexion.php';
require_once '../facades/FacadeGestion.php';

$fachada = new FacadeGestion();

if (isset($_POST['registrar'])) {

    $gestion = new GestionDto();
    $gestion->setIdCliente ($_POST['idCliente']);
    $gestion->setTipoVisita($_POST['tipoVisita']);
    $gestion->setTemaProducto($_POST['temaproducto']);
    $gestion->setAsistentes($_POST['asistentes']);
    $gestion->setObservaciones($_POST['observaciones']);
    $gestion->setAsunto($_POST['temaproducto']);
    $gestion->setLugar($_POST['lugar']);
    $gestion->setFechaVisita($_POST['fechaVisita']);
    $mensaje = $fachada->registrarGestion($gestion);
    header("Location: ../views/buscarGestion.php?mensaje=".$mensaje);

}

if (isset ($_GET['idproducto'])){

    $mensaje=$fachada->cancelarGestion($_GET['idproducto']);
    header("Location: ../views/listarGestion.php?mensaje=".$mensaje);
}

if(isset($_POST['reload'])){
    foreach ($fachada->obtenerEmpresasById($_POST['reload']) as $iterator){
           print $iterator['RazonSocial'];
    }
}
if(isset($_POST['detail'])){
     $rows=$fachada->completeGestion($_POST['detail']);
        echo json_encode($rows);

}
if (isset($_POST['modificar'])) {

    $gestion = new GestionDto();
    $idviejo=$_GET['idv'];
    $gestion->setIdCliente ($_POST['idCliente']);
    $gestion->setTipoVisita($_POST['tipoVisita']);
    if($_POST['tipoVisita']=='Capacitacion'){
        $gestion->setTemaProducto($_POST['temaproducto']);
    }else{
        $gestion->setTemaProducto($_POST['tema']);
    }

    $gestion->setAsistentes($_POST['asistentes']);
    $gestion->setObservaciones($_POST['observaciones']);
    $gestion->setAsunto($_POST['temaproducto']);
    $gestion->setLugar($_POST['lugar']);
    $gestion->setFechaVisita($_POST['fechaVisita']);
    $gestion->setEstado($_POST['estado']);
    $mensaje = $fachada->modificarGestion($gestion,$idviejo);

    header("Location: ../views/buscarGestion.php?mensaje=".$mensaje);

}
if (isset($_GET['buscar'])) {
    $criterio = $_POST['criterio'];
    $busqueda = $_POST['busqueda'];
    $comobuscar = $_POST['comobuscar'];
    $resul = $fachada->buscarConCriterio($criterio, $busqueda, $comobuscar);
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarGestion.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarGestion.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['listar'])) {
    $resul = $fachada->getGestiones();
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarGestion.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarGestion.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

