<?php
include_once '../models/ActividadesEmpresasDao.php';
include_once '../utilities/Conexion.php';
class ActividadesEmpresasFacade{
    private $con;
    private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new ActividadesEmpresasDao();
    }

    public function registrarActividadEmpresa(ActividadesEmpresasDto $ActividadesEmpresasDto){
        return $this->objDao->registrarActividadEmpresa($ActividadesEmpresasDto, $this->con);
    }

    public function listarTodos(){
        return $this->objDao->listarTodos($this->con);
    }

    public function obtenerActividadEmpresa($idActividadEmpresa){
        return $this->objDao->obtenerActividadEmpresa($idActividadEmpresa, $this->con);
    }

    public function buscarIdActividadEmpresa($idActividadEmpresa){
        return $this->objDao->buscarIdActividadEmpresa($idActividadEmpresa, $this->con);
    }
    
    public function buscarActividadEmpresa($criterio, $busqueda, $comobuscar){
        return $this->objDao->buscarActividadEmpresa($criterio, $busqueda, $comobuscar, $this->con);
    }

    public function modificarActividadEmpresa(ActividadesEmpresasDto $ActividadesEmpresasDto){
        return $this->objDao->modificarActividadEmpresa($ActividadesEmpresasDto, $this->con);
    }

    public function existeIdActividadEmpresa($idActividadEmpresa){
        return $this->objDao->existeIdActividadEmpresa($idActividadEmpresa, $this->con);
    }


}