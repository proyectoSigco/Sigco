<?php

class DetallesCotizacionDAO
{

    private $mensaje;



    public function registrarDetallesCotizacion (DetallesCotizacionDTO $detallesCotizacionDTO,PDO $conexion){
        try {
            $query = $conexion->prepare("INSERT INTO detallescotizacion (Cantidad, Iva, Total) VALUES (?,?,?)");
            $query->bindParam(1, $detallesCotizacionDTO->getCantidad());
            $query->bindParam(2, $detallesCotizacionDTO->getIva());
            $query->bindParam(3, $detallesCotizacionDTO->getTotal());
            $query->execute();
            $this->mensaje="DetallesCotizacion Registrada con exito";

        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }

        $conexion=null;
        return $this->mensaje;
    }

    public function buscarCotizacion($id,PDO $cnn){
        try{
            $query = $cnn->prepare("select * from DetallesCotizacion join Productos on Productos.IdProducto=IdProductoDetallesCotizacion where DetallesCotizacion.IdCotizacionDetallesCotizacion=?");
            $query->bindParam(1,$id);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }



    }


}