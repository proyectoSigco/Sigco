<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:56 PM
 */
require'../utilities/Conexion.php';
require'../models/MetaUsuarioDao.php';
class FacadeMetaUsuario
{
    private $con;
    private $objDao;

    public function __Construct(){

        $this->con=Conexion::getConexion();
        $this->objDao=new MetaUsuarioDao();
    }

    public function asignarMeta(MetaUsuarioDto $dto){
        return $this->objDao->asignarMeta($dto,$this->con);
    }

}