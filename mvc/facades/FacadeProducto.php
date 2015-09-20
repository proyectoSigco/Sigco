<?php
include_once '../utilities/Conexion.php';
include_once '../models/ProductoDao.php';
class Facade {

    private $conexion;
    private $productoDao;

    public function __Construct(){

        $this->conexion=Conexion::getConexion();
        $this->productoDao=new ProductoDao();
    }

    public function registrarProducto(ProductosDto $productoDto){

          return $this->productoDao->registrarProducto($productoDto,$this->conexion);
    }
    public  function getProductos(){
        return $this->productoDao->listarProductos($this->conexion);
    }
    public  function  obtenerProducto($userId){
        return $this->productoDao->obtenerProducto($userId,$this->conexion);
    }
    public function actualizarProducto(ProductosDto $usuarioDto,$idProducto){
        return $this->productoDao->modificarProducto($usuarioDto,$this->conexion,$idProducto);
    }
    public function  cancelarProducto($idUser){
        return $this->productoDao->cancelarProducto($idUser,$this->conexion);
    }
    public function  presentacionId($idUser){
        return $this->productoDao->presentacionId($idUser,$this->conexion);
    }
    public function  obtenerPresentacionProducto(){
        return $this->productoDao->obtenerPresentacionProducto($this->conexion);
    }
    public function  obtenerCategoriaProducto(){
        return $this->productoDao->obtenerCategoriaProducto($this->conexion);
    }
    public function  obtenerImpuestosProducto(){
        return $this->productoDao->obtenerIvaProducto($this->conexion);
    }
    public function  buscarProducto($criteria){
        return $this->productoDao->buscarProducto($criteria,$this->conexion);
    }

    public function buscarConCriterio($criterio,$busqueda,$comobuscar){
        return $this->productoDao->buscarProductoCriterio($criterio,$busqueda,$comobuscar,$this->conexion);
    }

}