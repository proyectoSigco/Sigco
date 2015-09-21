<?php

class ActividadesEmpresasDto
{

    private $idActividad = 0;

    /**
     * @return int
     */
    public function getIdActividad()
    {
        return $this->idActividad;
    }

    /**
     * @param int $idActividad
     */
    public function setIdActividad($idActividad)
    {
        $this->idActividad = $idActividad;
    }

    /**
     * @return int
     */
    public function getNombreActividad()
    {
        return $this->nombreActividad;
    }

    /**
     * @param int $nombreActividad
     */
    public function setNombreActividad($nombreActividad)
    {
        $this->nombreActividad = $nombreActividad;
    }
    private $nombreActividad = "";
    private $pagaIva = "";

    /**
     * @return string
     */
    public function getPagaIva()
    {
        return $this->pagaIva;
    }

    /**
     * @param string $pagaIva
     */
    public function setPagaIva($pagaIva)
    {
        $this->pagaIva = $pagaIva;
    }




}