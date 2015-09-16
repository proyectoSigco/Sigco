<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:41 PM
 */
require'../models/MetaDao.php';
require'../utilities/Conexion.php';
class FacadeMeta
{
    private $con;
    private $objDao;

    public function __Construct(){

        $this->con=Conexion::getConexion();
        $this->objDao=new MetaDao();
    }

    public function registrarMeta(MetaDto $dto){
        return $this->objDao->registrarMeta($dto,$this->con);
    }

    public function modificarMeta($user,MetaDto $dto){
        return $this->objDao->modificarMeta($dto,$user,$this->con);

    }


}