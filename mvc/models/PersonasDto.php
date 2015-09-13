<?php

class PersonasDto
{

    private $idPersona = 0;
    private $cedula = 0;
    private $nombres = "";
    private $apellidos = "";
    private $email1 = "";

    /**
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param int $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return int
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @param int $cedula
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    /**
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * @param string $nombres
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getEmail1()
    {
        return $this->email1;
    }

    /**
     * @param string $email1
     */
    public function setEmail1($email1)
    {
        $this->email1 = $email1;
    }

    /**
     * @return int
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param int $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return string
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * @param string $contrasenia
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }

    /**
     * @return string
     */
    public function getRutaImagen()
    {
        return $this->rutaImagen;
    }

    /**
     * @param string $rutaImagen
     */
    public function setRutaImagen($rutaImagen)
    {
        $this->rutaImagen = $rutaImagen;
    }

    /**
     * @return int
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param int $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }
    private $estado = 0;
    private $contrasenia = "";
    private $rutaImagen = "";
    private $celular = 0;

    /**
     * PersonasDto constructor.
     * @param int $idPersona
     * @param int $cedula
     * @param string $nombres
     * @param string $apellidos
     * @param string $email1
     * @param int $estado
     * @param string $contrasenia
     * @param string $rutaImagen
     * @param int $celular
     */
    public function __construct($cedula, $nombres, $apellidos, $email1, $celular)
    {
        $this->cedula = $cedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->email1 = $email1;
        $this->celular = $celular;
    }



}