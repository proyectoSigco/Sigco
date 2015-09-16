<?php

class OrdenDeCompraDAO {

    public function registrarOrden(OrdenesDeCompraDTO $dto,PDO $cnn){
        try {
            $valor = $cnn->prepare("select ValorTotalCotizacion as 'valor' from Cotizaciones where IdCotizacion=? ");
            $valor->bindParam(1,$dto->getCotizacionId());
            $valor->execute();
            $totalcoti=$valor->fetch();
            $query = $cnn->prepare("INSERT INTO OrdenesDeCompra VALUES (DEFAULT,?,?,now(),?,?,?,?)");
            $query->bindParam(1, $dto->getCotizacionId());
            $query->bindParam(2, $dto->getEstado());
            $query->bindParam(3, $totalcoti['valor']);
            $query->bindParam(4, $dto->getDescuentoTotal());
            $query->bindParam(5, $dto->getGranTotal());
            $query->bindParam(6, $dto->getObservaciones());
            $query->execute();
            $estado= $cnn->prepare("Update Cotizaciones set EstadoCotización='OC' where IdCotizacion=?");
            $estado->bindParam(1,$dto->getCotizacionId());
            $estado->execute();
            return "Orden de compra registrada, Cotizacion cambiada";
        }catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La orden de compra NO pudo ser registrada';
        }
        $cnn = null;
        return $mensaje;
    }

    public function listarOrdenes(PDO $cnn){
        try{
            $query = $cnn->prepare("Select * from OrdenesDeCompra JOIN Cotizaciones on Cotizaciones.IdCotizacion=OrdenesDeCompra.IdCotizacionOrdenesCompra
                                            JOIN Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex){
            echo '&ex='.$ex->getMessage().'&encontrados=0';
        };
    }

    public function buscarCotizacionCriterio($criterio, $busqueda, $comobuscar,PDO $cnn){
        switch ($comobuscar) {
            case 1:
                try{
                    $query = $cnn->prepare("Select * from OrdenesDeCompra JOIN Cotizaciones on Cotizaciones.IdCotizacion=OrdenesDeCompra.IdCotizacionOrdenesCompra
                                            JOIN Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones
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
                    $query = $cnn->prepare("Select * from OrdenesDeCompra JOIN Cotizaciones on Cotizaciones.IdCotizacion=OrdenesDeCompra.IdCotizacionOrdenesCompra
                                            JOIN Clientes on Clientes.Nit=Cotizaciones.IdClienteCotizaciones
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

    public function cancelarOrden($user,PDO $cnn){
        try{
        $query=$cnn->prepare("Update OrdenesDeCompra set EstadoOrdenCompra='Cancelada' where IdOrden=?");
            $query->bindParam(1,$user);
            $query->execute();
            return "Orden de compra cancelada exitosamente";
        }catch (Exception $ex){
            return $ex->getMessage();
        }


    }


}