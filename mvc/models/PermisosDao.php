<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 4:07 PM
 */
class PermisosDao
{
    public function listarPermisos(PDO $cnn){
        try {
            $query= $cnn->prepare("SELECT * from Permisos");
            $query->execute();
            $_SESSION['cantidad']=$query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }

    public function registrarPermiso(PermisosDto $dto,PDO $cnn){
        try {
            $query= $cnn->prepare("INSERT INTO Permisos VALUES (DEFAULT ,?,?)");
            $query->bindParam(1,$dto->getUrl());
            $query->bindParam(2,$dto->getNombre());
            $query->execute();
            return "Permiso registrado exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=El permiso NO se ha podido registrar';
        }
        $cnn =null;
        return $mensaje;
    }


}