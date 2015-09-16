<?php


include_once'../utilities/Conexion.php';
include_once'../models/MetaUsuarioDao.php';
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

    public function buscarConCriterio($criterio,$busqueda,$comobuscar){
        return $this->objDao->buscarMetaCriterio($criterio,$busqueda,$comobuscar,$this->con);
    }

    public function listarMetas(){
        return $this->objDao->listarMeta($this->con);
    }
    public function buscarMeta($user){
        return $this->objDao->buscarMeta($user,$this->con);
    }
}