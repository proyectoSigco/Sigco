<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 5:00 PM
 */
class PermisosRolesDto
{
    private $rol;
    private $permiso;

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

    /**
     * @return mixed
     */
    public function getPermiso()
    {
        return $this->permiso;
    }

    /**
     * @param mixed $permiso
     */
    public function setPermiso($permiso)
    {
        $this->permiso = $permiso;
    }

    

}