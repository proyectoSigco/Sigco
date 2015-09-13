<?php

require_once'PersonasDto.php';
class ClientesDto extends PersonasDto
{

        private $idCliente = 0;
        private $nit = 0;
        private $razonSocial = "";
        private $direccion = "";
        private $telefono = 0;
        private $email2 = "";
        private $idTipo = 0;
        private $idActividad = 0;
        private $idClasificacion = 0;
        private $idLugar = 0;
        private $cedula2 = 0;


    public function __construct($cedula, $nombres, $apellidos, $email1, $celular,
                                $nit, $razonSocial, $direccion,$telefono, $email2,
                                $idTipo, $idActividad, $idLugar){

        parent::__construct($cedula, $nombres, $apellidos, $email1, $celular);

        $this->nit = $nit;
        $this->razonSocial = $razonSocial;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email2 = $email2;
        $this->idTipo = $idTipo;
        $this->idActividad = $idActividad;
        $this->idLugar = $idLugar;

    }



    /**
     * @return int
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param int $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return int
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * @param int $nit
     */
    public function setNit($nit)
    {
        $this->nit = $nit;
    }

    /**
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * @param string $razonSocial
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;
    }

    /**
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return int
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param int $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return string
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * @param string $email
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;
    }

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
    public function getIdClasificacion()
    {
        return $this->idClasificacion;
    }

    /**
     * @param int $idClasificacion
     */
    public function setIdClasificacion($idClasificacion)
    {
        $this->idClasificacion = $idClasificacion;
    }

    /**
     * @return int
     */
    public function getIdLugar()
    {
        return $this->idLugar;
    }

    /**
     * @param int $idLugar
     */
    public function setIdLugar($idLugar)
    {
        $this->idLugar = $idLugar;
    }

    /**
     * @return int
     */
    public function getCedula2()
    {
        return $this->cedula2;
    }

    /**
     * @param int $cedula
     */
    public function setCedula2($cedula2)
    {
        $this->cedula2 = $cedula2;
    }




}