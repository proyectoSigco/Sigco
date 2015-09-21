<?php
include_once '../models/LugaresDao.php';
include_once '../utilities/Conexion.php';
class LugaresFacade{
    private $con;
    private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new LugaresDao();
    }

    public function registrarLugar(LugaresDto $lugaresDto){
        return $this->objDao->registrarLugar($lugaresDto, $this->con);
    }

    public function listarTodos(){
        return $this->objDao->listarTodos($this->con);
    }

    public function obtenerLugar($idLugar){
        return $this->objDao->obtenerLugar($idLugar, $this->con);
    }

    public function buscarIdLugar($idLugar){
        return $this->objDao->buscarIdLugar($idLugar, $this->con);
    }
    
    public function buscarLugar($criterio, $busqueda, $comobuscar){
        return $this->objDao->buscarLugar($criterio, $busqueda, $comobuscar, $this->con);
    }

    public function modificarLugar(LugaresDto $lugaresDto){
        return $this->objDao->modificarLugar($lugaresDto, $this->con);
    }

    public function existeIdLugar($idLugar){
        return $this->objDao->existeIdLugar($idLugar, $this->con);
    }


}