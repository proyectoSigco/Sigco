<?php
include_once '../models/TiposEmpresasDao.php';
include_once '../utilities/Conexion.php';
class TiposEmpresasFacade{
    private $con;
    private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new TiposEmpresasDao();
    }

    public function registrarTipoEmpresa(TiposEmpresasDto $tiposEmpresasDto){
        return $this->objDao->registrarTipoEmpresa($tiposEmpresasDto, $this->con);
    }

    public function listarTodos(){
        return $this->objDao->listarTodos($this->con);
    }

    public function obtenerTipoEmpresa($idTipo){
        return $this->objDao->obtenerTipoEmpresa($idTipo, $this->con);
    }

    public function buscarIdTipoEmpresa($idTipo){
        return $this->objDao->buscarIdTipoEmpresa($idTipo, $this->con);
    }
    
    public function buscarTipoEmpresa($criterio, $busqueda, $comobuscar){
        return $this->objDao->buscarTipoEmpresa($criterio, $busqueda, $comobuscar, $this->con);
    }

    public function modificarTipoEmpresa(TiposEmpresasDto $tiposEmpresasDto){
        return $this->objDao->modificarTipoEmpresa($tiposEmpresasDto, $this->con);
    }

    public function existeIdTipoEmpresa($idTipo){
        return $this->objDao->existeIdTipoEmpresa($idTipo, $this->con);
    }


}