<?php
class CotizacionesDAO
{
    private $mensaje;



    public function registrarCotizaciones (CotizacionesDTO $cotizacionesDTO,PDO $conexion){
        try {
            $query = $conexion->prepare("INSERT INTO Cotizaciones  VALUES (DEFAULT,?,now(),2,?,?,?,?)");
            $query->bindParam(1, $cotizacionesDTO->getEstado());
            $query->bindParam(2, $cotizacionesDTO->getObservaciones());
            $query->bindParam(3, $cotizacionesDTO->getDescuentoIvaxCliente());
            $query->bindParam(4, $cotizacionesDTO->getIdUsuario());
            $query->bindParam(5, $cotizacionesDTO->getIdCliente());
            $query->execute();
            $query2 = $conexion->prepare('SELECT MAX(IdCotizacion) AS "idc" FROM cotizaciones');
            $query2->execute();
            return $query2->fetch();
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }

        $conexion=null;
        return $this->mensaje;
    }

    public function agregarProducto(DetallesCotizacionDTO $dto,PDO $conexion){
        try {
            var_dump($dto->getIdCotizacion());
            $query = $conexion->prepare("INSERT INTO DetallesCotizacion  VALUES (?,?,?,?,?)");
            $query->bindParam(1,$dto->getIdCotizacion());
            $query->bindParam(2,$dto->getIdProducto());
            $query->bindParam(3,$dto->getCantidad());
            $query->bindParam(4,$dto->getIva());
            $query->bindParam(5,$dto->getTotal());
            $query->execute();
            $updateCotizacion= $conexion->prepare("update Cotizaciones set ValorTotalCotizacion=ValorTotalCotizacion+? where IdCotizacion=?");
            $updateCotizacion->bindParam(1,$dto->getTotal());
            $updateCotizacion->bindParam(2,$dto->getIdCotizacion());
            $updateCotizacion->execute();
            $this->mensaje= "Cotización registrada exitosamente";
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }

        $conexion=null;
        return $this->mensaje;
    }



    public function listarCotizaciones(PDO $cnn){
        try{
            $query = $cnn->prepare("Select * from Cotizaciones join Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones
                                    where Cotizaciones.EstadoCotización='Vigente'");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
    }



    public function buscarCotizacion($id,PDO $cnn){
        try{
                $query = $cnn->prepare("Select * from Cotizaciones join Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones
                                        join DetallesCotizacion on DetallesCotizacion.IdCotizacionDetallesCotizacion=Cotizaciones.IdCotizacion
                                        join Lugares on Lugares.IdLugar=Clientes.IdLugarCliente
                                        join Productos on Productos.IdProducto=IdProductoDetallesCotizacion
                                        where Cotizaciones.IdCotizacion=?");
            $query->bindParam(1,$id);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
    }

    public function buscarCotizacionCriterio($criterio, $busqueda, $comobuscar,PDO $cnn){
        switch ($comobuscar) {
            case 1:
                try{
                    $query = $cnn->prepare("Select * from Cotizaciones JOIN Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones
                                            where $criterio='$busqueda' ");
                    $query->execute();
                    $_SESSION['conteo'] = $query->rowCount();
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&ex='.$ex->getMessage().'&encontrados=0';
                };
                break;

            case 2:
                try{
                    $query = $cnn->prepare("Select * from Cotizaciones JOIN Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones
                                            where $criterio like '%$busqueda%' ");
                    $query->execute();
                    $_SESSION['conteo'] = $query->rowCount();
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&ex='.$ex->getMessage().'&encontrados=0';
                };

                break;
        }

        }

        public function cancelarCoti($user,PDO $cnn){
            try{
                $query=$cnn->prepare("Update Cotizaciones set EstadoCotización='Cancelada' where IdCotizacion=?");
                $query->bindParam(1,$user);
                $query->execute();
                return "Cotización cancelada exitosamente";
            }catch (Exception $ex){
                return $mensaje=$ex->getMessage();
            }

        }

    }