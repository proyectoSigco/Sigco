<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 4:42 PM
 */
require'../facades/FacadePermisosRoles.php';
require'../models/PermisosRolesDto.php';
$facade= new FacadePermisosRoles();
$dto=new PermisosRolesDto();
$rol=$_POST['idrol'];
$nombre=$_POST['nombrerol'];
$dto->setRol($rol);
$cantidad=$_GET['cantidad'];
for($i=1;$i<=$cantidad;$i++){
    if (isset ($_POST[$i])){
      $dto->setPermiso($_POST[$i]);
       $mensaje=$facade->registrarPermisoRol($dto);
    }
}
header('location: ../views/permisosRoles.php?mensaje='.$mensaje.'&id='.$rol.'&name='.$nombre);

