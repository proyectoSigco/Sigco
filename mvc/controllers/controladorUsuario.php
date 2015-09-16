<?php

require_once '../models/EmpleadoDto.php';
require_once '../facades/FacadeEmpleado.php';
session_start();

$fachada = new FacadeEmpleado();
$dto= new EmpleadoDto();


if (isset($_POST['documento'])) {
    $dto->setIdUsuario($_POST['documento']);
    $dto->setNombres($_POST['nombres']);
    $dto->setApellidos($_POST['apellidos']);
    $dto->setEmpleo($_POST['cargo']);
    $dto->setEmail($_POST['email']);
    $dto->setContrasenia($_POST['pass1']);
    $dto->setEstado(true);
    $dto->setRutaimagen($_POST['imagen']);
    $dto->setCelular($_POST['celular']);
    $mensaje= $fachada->registrarEmpleado($dto);
    header('location: ../views/RegistrarEmpleado.php?mensaje='.$mensaje);
}

if (isset($_GET['buscar'])) {
    unset($_SESSION['consulta']);
    $criterio = $_POST['criterio'];
    $busqueda = $_POST['busqueda'];
    $comobuscar = $_POST['comobuscar'];
    $resul = $fachada->buscarCriterio($criterio, $busqueda, $comobuscar);
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarEmpleado.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarEmpleado.php?encontrados=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['controlar'])) {
    $resul = $fachada->listarUsuarios();
    $_SESSION['consulta']=$resul;
    if($resul==null){
        header("Location: ../views/buscarEmpleado.php?encontrados=false&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }else{
        header("Location: ../views/buscarEmpleado.php?encontrados=true&todos=true&criterio=".$criterio."&busqueda=".$busqueda."&comobuscar=".$comobuscar);
    }
}

if (isset($_GET['modificar'])) {
    $idviejo=$_POST['idpersona'];
    $dto->setIdUsuario($_POST['documento2']);
    $dto->setNombres($_POST['nombres']);
    $dto->setApellidos($_POST['apellidos']);
    $dto->setEmpleo($_POST['cargo']);
    $dto->setEmail($_POST['email']);
    $dto->setContrasenia($_POST['pass1']);
    $dto->setEstado(true);
    $dto->setRutaimagen($_POST['imagen']);
    $mensaje=$fachada->modificarUsuario($dto,$idviejo);
    header("Location: ../views/buscarEmpleado.php?mensaje=" . $mensaje);
}

if (isset($_GET['cambiarEstado'])) {
    $estado=$_GET['estado'];

    if ($estado=="Activo"){
        $estado="Inactivo";
    }else{
        $estado="Activo";
    }
    $mensaje=$fachada->cambiarEstado($_GET['id'],$estado);
    header("Location: ../views/buscarEmpleado.php?mensaje=" . $mensaje);
}



