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
            $query = $cnn->prepare("INSERT INTO Gestiones (EstadoGestiones,TipoGestiones,Asunto,Asistentes,ObservacionesGestiones,LugarGestiones,FechaProgramada,NitClienteGestiones,CedulaEmpleadoGestiones)VALUES ('PENDIENTE',?,?,?,?,?,?,?,1022)");
            $query->bindParam(1, $gestionDto->getTipoVisita());
            $query->bindParam(2, $gestionDto->getTemaProducto());
            $query->bindParam(3, $gestionDto->getAsistentes());
            $query->bindParam(4, $gestionDto->getObservaciones());
            $query->bindParam(5, $gestionDto->getLugar());
            $query->bindParam(6, $gestionDto->getFechaVisita());
            $query->bindParam(7,$gestionDto->getIdCliente());
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
            $query = $cnn->prepare("UPDATE  Gestiones SET CedulaEmpleadoGestiones=1022,NitClienteGestiones=?,EstadoGestiones=?,Asunto=?,Asistentes=?,ObservacionesGestiones=?,LugarGestiones=?,FechaProgramada=?,TipoGestiones=? where IdGestion=?");

            //$query->bindParam(1, $gestionDto->getIdUsuario());
            $query->bindParam(1, $gestionDto->getIdCliente());
            $query->bindParam(2, $gestionDto->getEstado());
            $query->bindParam(3, $gestionDto->getTemaProducto());
            $query->bindParam(4, $gestionDto->getAsistentes());
            $query->bindParam(5, $gestionDto->getObservaciones());
            $query->bindParam(6, $gestionDto->getLugar());
            $query->bindParam(7, $gestionDto->getFechaVisita());
            $query->bindParam(8,$gestionDto->getTipoVisita());
            $query->bindParam(9, $idGestion);
            $query->execute();
            $this->mensaje = "Registro Actualizado";
        } catch (Exception $ex) {
            $this->mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $this->mensaje;
    }

    public function obtenerGestion($idGestion,PDO $cnn) {

        try {
            $query = $cnn->prepare('SELECT Nombre FROM Gestiones WHERE IdGestion=?');
            $query->bindParam(1, $idGestion);
            $query->execute();
            return $query->fetchall();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function cancelarGestion($idGestion,PDO $cnn) {


        try {
            $query = $cnn->prepare("UPDATE Gestiones SET estado=Cancelado  WHERE IdGestion= ?");
            $query->bindParam(1, $idGestion);
            $query->execute();
            $this->mensaje = "Registro Eliminado";
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return $this->mensaje;
    }
    public function listarGestion(PDO $cnn) {

    try {
            $listarGesion = 'Select * from Gestiones';
            $query = $cnn->prepare($listarGesion);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        return $this->mensaje;
    }
    public function obtenerEmpresaById($criteria,PDO $cnn) {

        try {
            $listarGesion = 'Select * from SIGCO.Clientes WHERE Nit=?';
            $query = $cnn->prepare($listarGesion);
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
            $listarGesion = 'Select * from SIGCO.Clientes';
            $query = $cnn->prepare($listarGesion);
            $query->execute();
            return $query->fetchall();

        } catch (Exception $ex) {
            $this->mensaje= $ex->getMessage();
        }
        return $this->mensaje;
    }
    public function completeGestion($idGestion,PDO $cnn) {

        try {
            $query = $cnn->prepare('SELECT * FROM Gestiones WHERE IdGestion=?');
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
            $query = $cnn->prepare("Select * from Gestiones join Clientes on Clientes.Nit=Gestiones.NitClienteGestiones
                                    where Gestiones.IdGestion=?");
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
                    $_SESSION['conteo'] = $query->rowCount();
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
                    $_SESSION['conteo'] = $query->rowCount();
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&ex='.$ex->getMessage().'&encontrados=0';
                };

                break;
        }

    }

}