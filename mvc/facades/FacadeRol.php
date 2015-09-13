<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 16/08/15
 * Time: 2:17 AM
 */
require'../models/RolDao.php';
require'../utilities/Conexion.php';
Class FacadeRol{
private $con;
private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new RolDao();
    }

    public function registrarRol(RolDto $dto){
        return $this->objDao->registrarRol($dto,$this->con);
    }




}