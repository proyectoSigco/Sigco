<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:53 PM
 */
require'../models/MetaUsuarioDto.php';
require'../facades/FacadeMetaUsuario.php';
$facade= new FacadeMetaUsuario();
$dto= new MetaUsuarioDto();
$dto->setEmpleado($_POST['cedula']);
$dto->setMeta($_POST['meta']);
$mensaje= $facade->asignarMeta($dto);
header('location: ../views/asignarMeta.php?mensaje='.$mensaje);