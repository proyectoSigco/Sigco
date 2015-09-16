<?php


class GestionDao {

    private $mensaje =" ";

    /**
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }
    public function registrarGestion(GestionDto $gestionDto,PDO $cnn) {


        try {
            $query = $cnn->prepare("CALL crearGestion (?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $gestionDto->getTipoVisita());
            $query->bindParam(2, $gestionDto->getTemaProducto());
            $query->bindParam(3, $gestionDto->getAsistentes());
            $query->bindParam(4, $gestionDto->getObservaciones());
            $query->bindParam(5, $gestionDto->getLugar());
            $query->bindParam(6, $gestionDto->getFechaVisita());
            $query->bindParam(7, $gestionDto->getIdCliente());
            $query->bindParam(8, $gestionDto->getIdUsuario());
            $query->execute();
            $this->mensaje="Visita Registrada";
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
            $cnn =null;
            return $this->mensaje;
    }

    public function modificarGestion(GestionDto $gestionDto,PDO $cnn,$idGestion) {

     try {
            $query = $cnn->prepare("CALL modificarGestion (?,?,?,?,?,?,?,?,?,?)");

            $query->bindParam(1, $gestionDto->getIdUsuario());
            $query->bindParam(2, $gestionDto->getIdCliente());
            $query->bindParam(3, $gestionDto->getEstado());
            $query->bindParam(4, $gestionDto->getTemaProducto());
            $query->bindParam(5, $gestionDto->getAsistentes());
            $query->bindParam(6, $gestionDto->getObservaciones());
            $query->bindParam(7, $gestionDto->getLugar());
            $query->bindParam(8, $gestionDto->getFechaVisita());
            $query->bindParam(9,$gestionDto->getTipoVisita());
            $query->bindParam(10, $idGestion);
            $query->execute();
            $this->mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $this->mensaje;
    }


  /*  public function cancelarGestion($idGestion,PDO $cnn) {


        try {
            $query = $cnn->prepare("UPDATE Gestiones SET estado=Cancelado  WHERE IdGestion= ?");
            $query->bindParam(1, $idGestion);
            $query->execute();
            $this->mensaje = "Registro Eliminado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return $this->mensaje;
    }*/
    public function listarGestion($idUsuario,PDO $cnn) {

    try {

            $query = $cnn->prepare("call listarGestion (?)");
            $query->bindParam(1,$idUsuario);
            $query->execute();
            $_SESSION['conteo']=$query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        return $this->mensaje;
    }
    public function obtenerEmpresaById($criteria,PDO $cnn) {

        try {
            $query = $cnn->prepare("call obtenerEmpresaById (?)");
            $query->bindParam(1,$criteria);
            $query->execute();
            return $query->fetchall();

        } catch (Exception $ex) {
            $this->mensaje= $criteria;
        }
        return $this->mensaje;
    }
    public function obtenerEmpresas(PDO $cnn) {

        try {
            $query = $cnn->prepare("call obtenerEmpresas");
            $query->execute();
            return $query->fetchall();
        } catch (Exception $ex) {
            $this->mensaje= $ex->getMessage();
        }
        return $this->mensaje;
    }
    public function completeGestion($idGestion,PDO $cnn) {

        try {
            $query = $cnn->prepare("call completeGestion (?)");
            $query->bindParam(1, $idGestion);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function buscarGestion($id,PDO $cnn){
        try{
            $query = $cnn->prepare("call buscarGestion (?)");
            $query->bindParam(1,$id);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
    }

    public function buscarGestionCriterio($criterio, $busqueda, $comobuscar,PDO $cnn){
        switch ($comobuscar) {
            case 1:
                try{
                    $query = $cnn->prepare("Select * from Gestiones JOIN Clientes on Clientes.Nit=Gestiones.NitClienteGestiones
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
                    $query = $cnn->prepare("Select * from Gestiones JOIN Clientes on Clientes.Nit=Gestiones.NitClienteGestiones
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