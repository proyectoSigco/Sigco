<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 5:20 PM
 */
require'../models/PermisosRolesDao.php';
require'../utilities/Conexion.php';
class FacadePermisosRoles
{
    private $con;
    private $objDao;

    public function __Construct(){

        $this->con=Conexion::getConexion();
        $this->objDao=new PermisosRolesDao();
    }

    public function registrarPermisoRol(PermisosRolesDto $dto){
        return $this->objDao->registrarPermiso($dto,$this->con);
    }

}