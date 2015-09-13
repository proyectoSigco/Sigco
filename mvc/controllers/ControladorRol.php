<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 3:27 PM
 */
require'../facades/FacadeRol.php';
require'../models/RolDto.php';
$facade=new FacadeRol();
$dto=new RolDto();
$dto->setNombre($_POST['nombres']);
$datos=$facade->registrarRol($dto);
header('location: ../views/permisosRoles.php?id='.$datos['IdRol'].'&name='.$datos['NombreRol']);