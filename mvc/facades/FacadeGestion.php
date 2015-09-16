<?php
/**
 * Created by PhpStorm.
 * User: probook
 * Date: 12/08/15
 * Time: 01:42 AM
 */
include_once '../utilities/Conexion.php';
include_once  '../models/GestionDao.php';
Class FacadeGestion {
    private $conexion;
    private $gestionDao;

    public function __Construct(){

        $this->conexion=Conexion::getConexion();
        $this->gestionDao=new GestionDao();
    }

    public function registrarGestion(GestionDto $productoDto){
        return $this->gestionDao->registrarGestion($productoDto,$this->conexion);

    }
    public  function getGestiones($idUsuario){
        return $this->gestionDao->listarGestion($idUsuario,$this->conexion);
    }
    public  function  obtenerGestion($userId){
        return $this->gestionDao->buscarGestion($userId,$this->conexion);
    }
    public function modificarGestion(GestionDto $usuarioDto,$idGestion){
        return $this->gestionDao->modificarGestion($usuarioDto,$this->conexion,$idGestion);
    }
    public function  cancelarGestion($idUser){
        return $this->gestionDao->cancelarGestion($idUser,$this->conexion);
    }
    public function  presentacionId($idUser){
        return $this->gestionDao->presentacionId($idUser,$this->conexion);
    }
    public function  obtenerEmpresasById($criteria){
        return $this->gestionDao->obtenerEmpresaById($criteria,$this->conexion);

    }
    public function  obtenerEmpresas(){
        return $this->gestionDao->obtenerEmpresas($this->conexion);
    }
    public function  datosEmpresa($id){
        return $this->gestionDao->obtenerGestion($id,$this->conexion);
    }
    public function  completeGestion($id){
        return $this->gestionDao->completeGestion($id,$this->conexion);
    }
    public function buscarGestion ($id){
        return $this->gestionDao->buscarGestion($id,$this->conexion);
    }

    public function buscarConCriterio($criterio,$busqueda,$comobuscar){
        return $this->gestionDao->buscarGestionCriterio($criterio,$busqueda,$comobuscar,$this->conexion);
    }
}