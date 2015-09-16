<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:53 PM
 */
require'../models/MetaUsuarioDto.php';
require'../facades/FacadeMetaUsuario.php';
session_start();
$facade= new FacadeMetaUsuario();
$dto= new MetaUsuarioDto();
if (isset($_POST['cedula'])){
$dto->setEmpleado($_POST['cedula']);
$dto->setMeta($_POST['meta']);
$mensaje= $facade->asignarMeta($dto);
header('location: ../views/buscarMetas.php?mensaje='.$mensaje);
}

if (isset($_GET['buscar'])){
    unset($_SESSION['consulta']);
    $criterio = $_POST['criterio'];
    $busqueda = $_POST['busqueda'];
    $comobuscar = $_POST['comobuscar'];
    $resul = $facade->buscarConCriterio($criterio, $busqueda, $comobuscar);
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarMetas.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarMetas.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['listar'])) {
    unset($_SESSION['consulta']);
    $resul = $facade->listarMetas();
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarMetas.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarMetas.php?encontrados=true&todos=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

