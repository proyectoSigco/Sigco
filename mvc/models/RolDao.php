<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 2/09/15
 * Time: 7:49 PM
 */
class RolDao
{
    public function registrarRol(RolDto $dto,PDO $cnn) {
        try {
            $query2= $cnn->prepare("INSERT INTO Roles VALUES (DEFAULT,?)");
            $query2->bindParam(1,$dto->getNombre());
            $query2->execute();
            $query= $cnn->prepare("SELECT max(IdRol) as 'id' from Roles");
            $query->execute();
            $id= $query->fetch();
            $query3= $cnn->prepare("Select * from Roles where IdRol=?");
            $query3->bindParam(1,$id['id']);
            $query3->execute();
            return $query3->fetch();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }


}