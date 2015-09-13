<?php

require_once '../models/EmpleadoDto.php';
require_once '../facades/FacadeEmpleado.php';

$fachada = new FacadeEmpleado();
$dto= new EmpleadoDto();

if (isset($_GET['id'])){
    $fachada->borrarUsuario($_GET['id']);
    echo 'eliminado satisfactoiamente';

}
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

if (isset($_POST['documento2'])) {
    $idviejo=$_GET['idv'];
    $dto->setIdUsuario($_POST['documento2']);
    $dto->setNombres($_POST['nombres']);
    $dto->setApellidos($_POST['apellidos']);
    $dto->setEmpleo($_POST['cargo']);
    $dto->setEmail($_POST['email']);
    $dto->setContrasenia($_POST['pass1']);
    $dto->setEstado($_POST['estado']);
    echo $dto->getEstado();
    $dto->setRutaimagen($_POST['imagen']);
    echo $fachada->modificarUsuario($dto,$idviejo);
}
