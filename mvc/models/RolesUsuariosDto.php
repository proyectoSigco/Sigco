<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 2/09/15
 * Time: 7:59 PM
 */
class RolesUsuariosDto
{
    private $cedula;
    private $rol;

    /**
     * @return mixed
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @param mixed $cedula
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }



}