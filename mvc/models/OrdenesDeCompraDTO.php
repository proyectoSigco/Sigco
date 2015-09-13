<?php

/**
 * Created by PhpStorm.
 * User: EDWIN
 * Date: 29/08/2015
 * Time: 7:32 PM
 */
class OrdenesDeCompraDTO
{

    private $cotizacionId;
    private $estado;
    private $descuentoTotal;
    private $granTotal;
    private $observaciones;

    /**
     * @return mixed
     */
    public function getCotizacionId()
    {
        return $this->cotizacionId;
    }

    /**
     * @param mixed $cotizacionId
     */
    public function setCotizacionId($cotizacionId)
    {
        $this->cotizacionId = $cotizacionId;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getDescuentoTotal()
    {
        return $this->descuentoTotal;
    }

    /**
     * @param mixed $descuentoTotal
     */
    public function setDescuentoTotal($descuentoTotal)
    {
        $this->descuentoTotal = $descuentoTotal;
    }

    /**
     * @return mixed
     */
    public function getGranTotal()
    {
        return $this->granTotal;
    }

    /**
     * @param mixed $granTotal
     */
    public function setGranTotal($granTotal)
    {
        $this->granTotal = $granTotal;
    }

    /**
     * @return mixed
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param mixed $observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

   
}