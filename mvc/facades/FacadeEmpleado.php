<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 16/08/15
 * Time: 2:17 AM
 */
include_once'../models/EmpleadoDao.php';
include_once'../utilities/Conexion.php';
Class FacadeEmpleado{
private $con;
private $objDao;

public function __Construct(){

    $this->con=Conexion::getConexion();
    $this->objDao=new EmpleadoDao();
}


public function registrarEmpleado(EmpleadoDto $objeto){
    return $this->objDao->registrarEmpleado($objeto,$this->con);
}

public function obtenerUsuario($user){
    return $this->objDao->buscarUsuario($user,$this->con);
}

public function listarUsuarios(){
    return $this->objDao->listarUsuarios($this->con);
}

public function listarDocumentos(){
    return $this->objDao->listarDocumentos($this->con);
}

public function borrarUsuario($user){
    return $this->objDao->cancelarUsuario($user,$this->con);
}

public  function modificarUsuario(EmpleadoDto $obj,$user){
    return $this->objDao->modificarUsuario($obj,$user,$this->con);
}

public function comprobarUsuario($user,$pass){
 $validar=$this->objDao->login($user,$pass,$this->con);
    if ($validar['existe']==0){
        return false;
    }else{
        $_SESSION['rol']=$this->objDao->rol($user,$this->con);
        return $this->objDao->datosLogin($user,$this->con);
    }
}

public function obtenerMenu($rol){
return $this->objDao->obtenerTitulos($rol,$this->con);
}

    public function obtenerSubMenu($id){
        return $this->objDao->obtenerSubTitulos($id,$this->con);
    }

    public function listarRoles(){
        return $this->objDao->listarRoles($this->con);
    }

    public function listarMetas(){
        return $this->objDao->listarMetas($this->con);
    }


}