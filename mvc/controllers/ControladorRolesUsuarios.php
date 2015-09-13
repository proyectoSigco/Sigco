<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 2/09/15
 * Time: 8:02 PM
 */
require_once '../models/RolesUsuariosDto.php';
require_once '../facades/FacadeRolesUsuarios.php';

$fachada = new FacadeRolesUsuarios();
$dto= new RolesUsuariosDto();
$dto->setCedula($_POST['cedula']);
$dto->setRol($_POST['rol']);
$mensaje=$fachada->registrarRolUsuario($dto);
header('location: ../views/asignarRol.php?mensaje='.$mensaje);