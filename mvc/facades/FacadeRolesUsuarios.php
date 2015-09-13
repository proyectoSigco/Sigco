<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 16/08/15
 * Time: 2:17 AM
 */
require'../models/RolesUsuariosDao.php';
require'../utilities/Conexion.php';
Class FacadeRolesUsuarios{
    private $con;
    private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new RolesUsuariosDao();
    }

    public function registrarRolUsuario(RolesUsuariosDto $dto){
        return $this->objDao->registrarRolUsuario($dto,$this->con);
    }


}