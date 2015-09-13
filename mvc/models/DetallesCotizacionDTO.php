<?php

class DetallesCotizacionDTO
{
    private $idCotizacion;
    private $idProducto;
    private $cantidad;
    private $total;

    /**
     * @return mixed
     */
    public function getIdCotizacion()
    {
        return $this->idCotizacion;
    }

    /**
     * @param mixed $idCotizacion
     */
    public function setIdCotizacion($idCotizacion)
    {
        $this->idCotizacion = $idCotizacion;
    }

    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }



}