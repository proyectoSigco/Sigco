<?php

class TiposEmpresasDto
{
private $idTipo = 0;
    private $nombreTipo = "";

    /**
     * @return int
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param int $idTipo
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;
    }

    /**
     * @return string
     */
    public function getNombreTipo()
    {
        return $this->nombreTipo;
    }

    /**
     * @param string $nombreTipo
     */
    public function setNombreTipo($nombreTipo)
    {
        $this->nombreTipo = $nombreTipo;
    }
}