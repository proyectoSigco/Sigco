<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:39 PM
 */
class MetaDao
{
    public function registrarMeta(MetaDto $dto,PDO $cnn){
        try {
            $query= $cnn->prepare("INSERT INTO Metas VALUES (DEFAULT ,?,?,?,?)");
            $query->bindParam(1,$dto->getTipo());
            $query->bindParam(2,$dto->getValor());
            $query->bindParam(3,$dto->getFechaInicio());
            $query->bindParam(4,$dto->getFechaFinal());
            $query->execute();
            return "Meta registrada exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La meta NO se ha podido registrar';
        }
        $cnn =null;
        return $mensaje;
    }

    public function modificarMeta(MetaDto $dto,$user,PDO $cnn){
        try {
            $query= $cnn->prepare("Update Metas set Tipo=?,CantidadValor=?,FechaInicio=?,FechaFin=? where IdMeta=?");
            $query->bindParam(1,$dto->getTipo());
            $query->bindParam(2,$dto->getValor());
            $query->bindParam(3,$dto->getFechaInicio());
            $query->bindParam(4,$dto->getFechaFinal());
            $query->bindParam(5,$user);
            $query->execute();
            return "Meta actualizada exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La meta NO se ha podido registrar';
        }
        $cnn =null;
        return $mensaje;

    }




}