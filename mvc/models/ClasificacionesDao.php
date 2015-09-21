<?php

class ClasificacionesDao
{
    public function registrarClasificacion(ClasificacionesDto $clasificacionesDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("INSERT INTO clasificaciones VALUES(DEFAULT,?)");
            $query->bindParam(1, $clasificacionesDto->getNombreClasificacion());
            $query->execute();
            $mensaje="Información registrada con éxito en la base de datos.&error=false";
        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=La información NO ha sido registrada en la base de datos.';
        }
        $cnn = null;
        return $mensaje;
    }

    public function listarTodos(PDO $cnn){
        try{
            $query = $cnn->prepare("select * from clasificaciones ORDER BY clasificaciones.IdClasificacion");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerClasificacion($idClasificacion, PDO $cnn){

        try {
            $query = $cnn->prepare('select * from clasificaciones where 
                                    clasificaciones.IdClasificacion = ? ORDER BY clasificaciones.IdClasificacion');
            $query->bindParam(1, $idClasificacion);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function buscarIdClasificacion($idClasificacion, PDO $cnn){
        try{
            $query = $cnn->prepare('select * from clasificaciones where 
                                    clasificaciones.IdClasificacion = "'.$idClasificacion.'" ORDER BY clasificaciones.IdClasificacion ASC');
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetch();
        } catch (Exception $ex){
            echo '&detalleerror='.$ex->getMessage().'&encontrados=false&error=true';
        };
    }

    public function buscarClasificacion($criterio, $busqueda, $comobuscar, PDO $cnn){
        switch ($comobuscar) {
            case 1:
                    try{
                        $query = $cnn->prepare('select * from clasificaciones where 
                                                '.$criterio.' = "'.$busqueda.'" ORDER BY clasificaciones.IdClasificacion ASC');
                        $query->execute();
                        $_SESSION['conteo'] = $query->rowCount();
                        return $query->fetchAll();
                    } catch (Exception $ex){
                        echo '&detalleerror='.$ex->getMessage().'&encontrados=false';
                    };
                break;
            case 2;
                try{
                    $query = $cnn->prepare('select * from clasificaciones where 
                                            '.$criterio.' like "%'.$busqueda.'%" ORDER BY clasificaciones.IdClasificacion ASC');
                    $query->execute();
                    $_SESSION['conteo'] = $query->rowCount();
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&detalleerror='.$ex->getMessage().'&encontrados=false';
                };
                break;
            default:
                echo 'Opción inválida para Cómo búscar';
        }
        $cnn=null;
    }

    public function modificarClasificacion(ClasificacionesDto $clasificacionesDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("UPDATE clasificaciones set NombreClasificacion = ? WHERE clasificaciones.IdClasificacion = ?");
            $query->bindParam(1, $clasificacionesDto->getNombreClasificacion());
            $query->bindParam(2, $clasificacionesDto->getIdClasificacion());
            $query->execute();
            $mensaje="Información actualizada con éxito.&error=false";
        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=La información NO ha sido actualizada en la base de datos.';
        }
        $cnn = null;
        return $mensaje;
    }

    public function existeIdClasificacion($idClasificacion, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("SELECT COUNT(*) as existente from clasificaciones where clasificaciones.IdClasificacion = ?");
            $query->bindParam(1, $idClasificacion);
            $query->execute();
            $mensaje = $query->fetch();
            return $mensaje;
        }catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'$error=true&mensaje=Error en la consulta';
        }
    }





}