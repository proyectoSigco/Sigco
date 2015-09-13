<?php

class FacadeDetallesCotizacion
{

    private $conexion;
    private $DetallesCotizacionDao;


    public function __Construct(){

        $this->conexion=Conexion::getConexion();
        $this->DetallesCotizacionDao=new DetallesCotizacionDTO();
    }

    public function registrarDetallesCotizaciones (DetallesCotizacionDTO $detallesCotizacionDTO){
        return $this->DetallesCotizacionDao->registrarDetallesCotizaciones($detallesCotizacionDTO, $this->conexion);
    }

}
