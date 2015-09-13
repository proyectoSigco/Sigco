<?php
include_once'../models/CotizacionesDAO.php';
include_once'../utilities/Conexion.php';
class FacadeCotizaciones
{
    private $conexion;
    private $CotizacionDao;

    public function __Construct(){

        $this->conexion=Conexion::getConexion();
        $this->CotizacionDao=new CotizacionesDAO();
    }


    public function registrarCotizaciones (CotizacionesDTO $cotizacionesDTO, DetallesCotizacionDTO $detallesCotizacionDTO){
        return $this->CotizacionDao->registrarCotizaciones($cotizacionesDTO, $detallesCotizacionDTO, $this->conexion);
    }

    public function listarCotizaciones (){
        return $this->CotizacionDao->listarCotizaciones($this->conexion);
    }

    public function buscarCotizacion ($id){
        return $this->CotizacionDao->buscarCotizacion($id,$this->conexion);
    }

    public function buscarConCriterio($criterio,$busqueda,$comobuscar){
        return $this->CotizacionDao->buscarCotizacionCriterio($criterio,$busqueda,$comobuscar,$this->conexion);
    }

    public function agregarProducto(DetallesCotizacionDTO $dto){
        return $this->CotizacionDao->agregarproducto($dto,$this->conexion);
    }

}