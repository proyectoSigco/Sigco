<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 5:20 PM
 */
include_once'../models/PermisosDao.php';
include_once'../utilities/Conexion.php';
class FacadePermisos
{
    private $con;
    private $objDao;

    public function __Construct(){

        $this->con=Conexion::getConexion();
        $this->objDao=new PermisosDao();
    }

    public function listarPermisos(){
        return $this->objDao->listarPermisos($this->con);
    }

}