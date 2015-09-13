<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:54 PM
 */
class MetaUsuarioDto
{
    private $empleado;
    private $meta;

    /**
     * @return mixed
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * @param mixed $empleado
     */
    public function setEmpleado($empleado)
    {
        $this->empleado = $empleado;
    }

    /**
     * @return mixed
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param mixed $meta
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
    }



}