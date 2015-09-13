<?php

/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 2/09/15
 * Time: 7:59 PM
 */
class RolesUsuariosDao
{

    public function registrarRolUsuario(RolesUsuariosDto $dto,PDO $cnn) {
        try {
            $query2= $cnn->prepare("INSERT INTO RolesUsuarios (IdRolRolesUsuarios,CedulaRolesUsuarios) VALUES (?,?)");
            $query2->bindParam(1,$dto->getRol());
            $query2->bindParam(2,$dto->getCedula());
            $query2->execute();
            $mensaje="Se ha realizado la asignación de rol exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La asignación de rol NO se ha podido realizar';
        }
        $cnn =null;
        return $mensaje;
    }

}