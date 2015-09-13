<?php

class CotizacionesDTO
{

    private $estado;
    private $valorTotal;
    private $observaciones;
    private $descuentoIvaxCliente;
    private $idUsuario;
    private $idCliente;


    public function getIdCotizacion()
    {
        return $this->idCotizacion;
    }


    public function setIdCotizacion($idCotizacion)
    {
        $this->idCotizacion = $idCotizacion;
    }


    public function getEstado()
    {
        return $this->estado;
    }


    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }


    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }


    public function getValorTotal()
    {
        return $this->valorTotal;
    }


    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }


    public function getObservaciones()
    {
        return $this->observaciones;
    }


    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }


    public function getDescuentoIvaxCliente()
    {
        return $this->descuentoIvaxCliente;
    }


    public function setDescuentoIvaxCliente($descuentoIvaxCliente)
    {
        $this->descuentoIvaxCliente = $descuentoIvaxCliente;
    }


    public function getIdUsuario()
    {
        return $this->idUsuario;
    }


    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }


    public function getIdCliente()
    {
        return $this->idCliente;
    }


    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

}