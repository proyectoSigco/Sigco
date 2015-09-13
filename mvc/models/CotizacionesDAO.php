<?php
class CotizacionesDAO
{
    private $mensaje;



    public function registrarCotizaciones (CotizacionesDTO $cotizacionesDTO, DetallesCotizacionDTO $detallesCotizacionDTO, PDO $conexion){

        try {
            $producto= $conexion->prepare("Select * from Productos where IdProducto=?");
            $producto->bindParam(1,$detallesCotizacionDTO->getIdProducto());
            $producto->execute();
            $valor=$producto->fetch();
            $total=$valor['ValorBase']*$detallesCotizacionDTO->getCantidad();
            $query = $conexion->prepare("INSERT INTO cotizaciones VALUES (DEFAULT,?,now(),?,?,?,?,?)");
            $query->bindParam(1, $cotizacionesDTO->getEstado());
            $query->bindParam(2, $total);
            $query->bindParam(3, $cotizacionesDTO->getObservaciones());
            $query->bindParam(4, $cotizacionesDTO->getDescuentoIvaxCliente());
            $query->bindParam(5, $cotizacionesDTO->getIdUsuario());
            $query->bindParam(6, $cotizacionesDTO->getIdCliente());
            $query->execute();
            $iva=$conexion->prepare("Select format(Productos.ValorBase,0) as 'valor',Impuestos.PorcentajeIva as 'iva' from Productos
                                      Join Impuestos on Impuestos.IdIva=Productos.IdIvaProductos where Productos.IdProducto=?");
            $iva->bindParam(1,$detallesCotizacionDTO->getIdProducto());
            $iva->execute();
            $valorIva=$iva->fetch();
            $ivacero=$valorIva['iva']/100;
            $ivaTotal=$ivacero*$total;
            $total=$total+$ivaTotal;
            $query = $conexion->prepare('SELECT MAX(IdCotizacion) AS "idc" FROM cotizaciones');
            $query->execute();
            $id=$query->fetch();
            $query = $conexion->prepare("INSERT INTO detallescotizacion VALUES (?,?,?,?,?)");
            $query->bindParam(1, $id['idc']);
            $query->bindParam(2, $detallesCotizacionDTO->getIdProducto());
            $query->bindParam(3, $detallesCotizacionDTO->getCantidad());
            $query->bindParam(4, $ivaTotal);
            $query->bindParam(5, $total);
            $query->execute();
            $this->mensaje="Cotizacion Registrada con exito";
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

    public function agregarproducto(DetallesCotizacionDTO $dto,PDO $cnn){
        try{
            $producto= $cnn->prepare("Select * from Productos where IdProducto=?");
            $producto->bindParam(1,$dto->getIdProducto());
            $producto->execute();
            $valor=$producto->fetch();
            $total=$valor['ValorBase']*$dto->getCantidad();

            $iva=$cnn->prepare("Select format(Productos.ValorBase,0) as 'valor',Impuestos.PorcentajeIva as 'iva' from Productos
                                      Join Impuestos on Impuestos.IdIva=Productos.IdIvaProductos where Productos.IdProducto=?");
            $iva->bindParam(1,$dto->getIdProducto());
            $iva->execute();
            $valorIva=$iva->fetch();
            $ivacero=$valorIva['iva']/100;
            $ivaTotal=$ivacero*$total;
            echo $total=$total+$ivaTotal;

            $query = $cnn->prepare("INSERT into DetallesCotizacion VALUES (?,?,?,?,?)");
            $query->bindParam(1, $dto->getIdCotizacion());
            $query->bindParam(2, $dto->getIdProducto());
            $query->bindParam(3, $dto->getCantidad());
            $query->bindParam(4, $ivaTotal);
            $query->bindParam(5, $total);
            $query->execute();
            $actualizarCotizacion=$cnn->prepare("Update Cotizaciones set ValorTotalCotizacion=ValorTotalCotizacion+? where IdCotizacion=?");
            $actualizarCotizacion->bindParam(1,$total);
            $actualizarCotizacion->bindParam(2,$dto->getIdCotizacion());
            $actualizarCotizacion->execute();
            return true;
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

    }