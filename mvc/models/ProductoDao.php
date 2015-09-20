<?php


class ProductoDao  {

   private $mensaje="";
    public function registrarProducto(ProductosDto $productoDto,PDO $cnn) {

        $estado='Activo';
        try {
            $query = $cnn->prepare('INSERT INTO Productos (NombreProducto,DescripcionProducto,IdIvaProductos,ValorBase,IdPresentacionProductos,IdCategoriaProductos,EstadoProductos,rutaImagen) VALUES(?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $productoDto->getNombreProducto());
            $query->bindParam(2, $productoDto->getDescripcion());
            $query->bindParam(3, $productoDto->getIva());
            $query->bindParam(4, $productoDto->getValorUnitario());
            $query->bindParam(5, $productoDto->getPresentacion());
            $query->bindParam(6, $productoDto->getCategoriaProducto());
            $query->bindParam(7,$estado);
            $query->bindParam(8,$productoDto->getImagenProducto());
            $query->execute();
            $this->mensaje=1;
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $this->mensaje;
    }
        public function modificarProducto(ProductosDto $productoDto,PDO $cnn,$idProducto){
            try {
                $query = $cnn->prepare('UPDATE Productos SET NombreProducto=?,DescripcionProducto=?,IdIvaProductos=?,ValorBase=?,IdPresentacionProductos=?,IdCategoriaProductos=?,rutaImagen=? WHERE IdProducto=?');
                $query->bindParam(1, $productoDto->getNombreProducto());
                $query->bindParam(2, $productoDto->getDescripcion());
                $query->bindParam(3, $productoDto->getIva());
                $query->bindParam(4, $productoDto->getValorUnitario());
                $query->bindParam(5, $productoDto->getPresentacion());
                $query->bindParam(6, $productoDto->getCategoriaProducto());
                $query->bindParam(7, $productoDto->getImagenProducto());
                $query->bindParam(8,$idProducto);
                $query->execute();
                $this->mensaje = 1;
            }
            catch(Exception $ex){
                $this->mensaje=$ex->getMessage();
            }
            $cnn=null;
            return $this->mensaje;
            }
         public function listarProductos(PDO $cnn){

             try {
                 $query = $cnn->prepare('SELECT * FROM SIGCO.Productos where Productos.EstadoProductos="Activo" ');
                 $query->execute();
                return $query->fetchAll();

             }
             catch(Exception $ex){
               $this->mensaje= $ex->getMessage();
             }
             $cnn=null;
             return $this->mensaje;
         }

    public function obtenerProducto($id,PDO $cnn){
        try {
            $query = $cnn->prepare('select * from  Productos where EstadoProductos="Activo" and IdProducto=?');
            $query->bindParam(1,$id);
            $query->execute();
            return $query->fetch();

        }
        catch(Exception $ex){
            print $ex->getMessage();
        }
        $cnn=null;
    }

        public function cancelarProducto($idProducto,PDO $cnn){
            $cancelar='Inactivo';
            try{
                $query=$cnn->prepare('UPDATE Productos  SET EstadoProductos=?  where IdProducto=?');
                $query->bindParam(1,$cancelar);
                $query->bindParam(2,$idProducto);
                $query->execute();
                $this->mensaje='Producto Eliminado';
            }catch (Exception $ex){
                $this->mensaje=$ex->getMessage().' No se esta eliminando';
            }
            return $this->mensaje;
        }
    public function  obtenerPresentacionProducto(PDO $cnn){
        try {
            $query = $cnn->prepare('select * from Presentaciones');
            $query->execute();
            return $query->fetchAll();
        } catch(Exception $ex){
            print $ex->getMessage();
        }
        $cnn=null;
    }

    public function  presentacionId($id,PDO $cnn){
        try {
            $query = $cnn->prepare('select NombrePresentacion from Presentaciones where IdPresentacion=?');
            $query->bindParam(1,$id);
            $query->execute();
            return $query->fetch();
        } catch(Exception $ex){
            print $ex->getMessage();
        }
        $cnn=null;
    }
    public function  obtenerCategoriaProducto(PDO $cnn){
        try {
            $query = $cnn->prepare('select * from CategoriasProductos');
            $query->execute();
            return $query->fetchAll();
        } catch(Exception $ex){
            print $ex->getMessage();
        }
        $cnn=null;
    }
    public function  obtenerIvaProducto(PDO $cnn){
        try {
            $query = $cnn->prepare('select * from Impuestos');
            $query->execute();
            return $query->fetchAll();
        } catch(Exception $ex){
            print $ex->getMessage();
        }
        $cnn=null;
    }
    public function  buscarProducto($criteria,PDO $cnn){
        try {
            $query = $cnn->prepare('select * from Productos where EstadoProductos="Activo" and (IdProducto= "'.$criteria.'" or NombreProducto like "%'.$criteria.'%" or DescripcionProducto like "%'.$criteria.'%") ');
            $query->execute();
            return $query->fetchAll();
        } catch(Exception $ex){
            $this->mensaje= $ex->getMessage();
        }
        $cnn=null;
    }


    public function buscarProductoCriterio($criterio, $busqueda, $comobuscar,PDO $cnn){
        switch ($comobuscar) {
            case 1:
                try{
                    $query = $cnn->prepare("Select * from Productos
                                            where $criterio='$busqueda' ");
                    $query->execute();
                    if(isset($_SESSION['conteo'])) {
                        $_SESSION['conteo'] = $query->rowCount();
                    }
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&ex='.$ex->getMessage().'&encontrados=0';
                };
                break;

            case 2:
                try{
                    $query = $cnn->prepare("Select * from Productos
                                            where $criterio like '%$busqueda%' ");
                    $query->execute();
                    if(isset($_SESSION['conteo'])) {
                        $_SESSION['conteo'] = $query->rowCount();
                    }
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&ex='.$ex->getMessage().'&encontrados=0';
                };

                break;
        }

    }

}
