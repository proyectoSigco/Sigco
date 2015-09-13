<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 5:00 PM
 */
class PermisosRolesDao
{
    public function registrarPermiso(PermisosRolesDto $dto,PDO $cnn){
        try {
            $query= $cnn->prepare("Insert into PermisosRoles VALUES (?,?)");
            $query->bindParam(1,$dto->getPermiso());
            $query->bindParam(2,$dto->getRol());
            $query->execute();
            return "La asignación se ha realizado exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La asignación NO se ha podido realizar';
        }
        $cnn =null;
        return $mensaje;
    }

}