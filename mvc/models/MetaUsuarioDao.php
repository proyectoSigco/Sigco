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


    public function buscarMetaCriterio($criterio, $busqueda, $comobuscar,PDO $cnn){
        switch ($comobuscar) {
            case 1:
                try{
                    $query = $cnn->prepare("Select * from Metas
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
                    $query = $cnn->prepare("Select * from Metas
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

    public function buscarMeta($user,PDO $cnn){
        try{
            $query = $cnn->prepare("Select * from Metas where IdMeta=?");
            $query->bindParam(1,$user);
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetch();
        } catch (Exception $ex) {
            return $mensaje = $ex->getMessage();
        }
    }

    public function listarMeta(PDO $cnn){
        try{
            $query = $cnn->prepare("Select * from Metas");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            return $mensaje = $ex->getMessage();
        }
    }






}