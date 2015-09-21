<?php
include_once '../models/ClasificacionesDao.php';
include_once '../utilities/Conexion.php';
class ClasificacionesFacade{
    private $con;
    private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new ClasificacionesDao();
    }

    public function registrarClasificacion(ClasificacionesDto $clasificacionesDto){
        return $this->objDao->registrarClasificacion($clasificacionesDto, $this->con);
    }

    public function listarTodos(){
        return $this->objDao->listarTodos($this->con);
    }

    public function obtenerClasificacion($idClasificacion){
        return $this->objDao->obtenerClasificacion($idClasificacion, $this->con);
    }

    public function buscarIdClasificacion($idClasificacion){
        return $this->objDao->buscarIdClasificacion($idClasificacion, $this->con);
    }
    
    public function buscarClasificacion($criterio, $busqueda, $comobuscar){
        return $this->objDao->buscarClasificacion($criterio, $busqueda, $comobuscar, $this->con);
    }

    public function modificarClasificacion(ClasificacionesDto $clasificacionesDto){
        return $this->objDao->modificarClasificacion($clasificacionesDto, $this->con);
    }

    public function existeIdClasificacion($idClasificacion){
        return $this->objDao->existeIdClasificacion($idClasificacion, $this->con);
    }

}