<?php

class ClienteFacade{
    private $con;
    private $objDao;

    public function __Construct(){
        $this->con=Conexion::getConexion();
        $this->objDao=new ClientesDao();
    }

    public function listarTodos(){
        return $this->objDao->listarTodos($this->con);
    }

    public function buscarCliente($criterio, $busqueda, $comobuscar){
        return $this->objDao->buscarCliente($criterio, $busqueda, $comobuscar, $this->con);
    }

    public function buscarCedulaPersona($cedulaPersona){
        return $this->objDao->buscarCedulaPersona($cedulaPersona, $this->con);
    }

    public function cambiarEstado($estado, $cedula){
        return $this->objDao->cambiarEstado($estado, $cedula, $this->con);
    }

    public function reestablecerContrasenia($idPersona){
        return $this->objDao->reestablecerContrasenia($idPersona, $this->con);
    }

    public function registrarCliente(ClientesDto $clientesDto){
        return $this->objDao->registrarCliente($clientesDto, $this->con);
    }

    public function modificarCliente(ClientesDto $clientesDto){
        return $this->objDao->modificarCliente($clientesDto, $this->con);
    }

    public function obtenerCliente($idCliente){
        return $this->objDao->obtenerCliente($idCliente, $this->con);
    }

    public function obtenerPersona($cedulaPersona){
        return $this->objDao->obtenerPersona($cedulaPersona, $this->con);
    }

    public function registrarSoloEmpresa(ClientesDto $clientesDto){
        return $this->objDao->registrarSoloEmpresa($clientesDto, $this->con);
    }

    public function existeNit($nit){
        return $this->objDao->existeNit($nit, $this->con);
    }


}