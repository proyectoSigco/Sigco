<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 7/09/15
 * Time: 9:38 AM
 */
require'../models/OrdenDeCompraDAO.php';
require'../utilities/Conexion.php';
class FacadeOrdenCompra
{
    private $con;
    private $dao;

    public function __construct()
    {
        $this->con = Conexion::getConexion();
        $this->dao = new OrdenDeCompraDAO();
    }

    public function registrarOrden(OrdenesDeCompraDTO $obj){
        return $this->dao->registrarOrden($obj,$this->con);
    }

    public function buscarConCriterio($criterio,$busqueda,$comobuscar){
        return $this->dao->buscarCotizacionCriterio($criterio,$busqueda,$comobuscar,$this->con);
    }

    public function listarOrdenes(){
        return $this->dao->listarOrdenes($this->con);
    }

    public function cancelarOrden($user){
        return $this->dao->cancelarOrden($user,$this->con);
    }

}