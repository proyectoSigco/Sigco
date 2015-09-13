<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:54 PM
 */
class MetaUsuarioDao
{

    public function asignarMeta(MetaUsuarioDto $dto,PDO $cnn){
        try {
            $query = $cnn->prepare("INSERT INTO MetasUsuarios VALUES (?,?)");
            $query->bindParam(1,$dto->getEmpleado());
            $query->bindParam(2,$dto->getMeta());
            $query->execute();
            return "Meta asignada exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La meta NO se ha podido asignar';
        }
        $cnn =null;
        return $mensaje;
    }

}