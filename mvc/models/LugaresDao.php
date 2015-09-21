<?php

class LugaresDao
{
    public function registrarLugar(LugaresDto $lugaresDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("INSERT INTO lugares VALUES(DEFAULT,?)");
            $query->bindParam(1, $lugaresDto->getNombreCiudad());
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
            $query = $cnn->prepare("select * from lugares ORDER BY IdLugar");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerLugar($idLugar, PDO $cnn){

        try {
            $query = $cnn->prepare('select * from lugares where lugares.IdLugar = ? ORDER BY IdLugar');
            $query->bindParam(1, $idLugar);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function buscarIdLugar($idLugar, PDO $cnn){
        try{
            $query = $cnn->prepare('select * from lugares where lugares.IdLugar = "'.$idLugar.'" ORDER BY lugares.IdLugar ASC');

            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetch();
        } catch (Exception $ex){
            echo '&detalleerror='.$ex->getMessage().'&encontrados=false&error=true';
        };
    }

    public function buscarLugar($criterio, $busqueda, $comobuscar, PDO $cnn){
        switch ($comobuscar) {
            case 1:
                    try{
                        $query = $cnn->prepare('select * from lugares where '.$criterio.' = "'.$busqueda.'" ORDER BY lugares.IdLugar ASC');
                        $query->execute();
                        $_SESSION['conteo'] = $query->rowCount();
                        return $query->fetchAll();
                    } catch (Exception $ex){
                        echo '&detalleerror='.$ex->getMessage().'&encontrados=0';
                    };
                break;
            case 2;
                try{
                    $query = $cnn->prepare('select * from lugares where '.$criterio.' like "%'.$busqueda.'%" ORDER BY lugares.IdLugar ASC');
                    $query->execute();
                    $_SESSION['conteo'] = $query->rowCount();
                    return $query->fetchAll();
                } catch (Exception $ex){
                    echo '&detalleerror='.$ex->getMessage().'&encontrados=0';
                };
                break;
            default:
                echo 'Opción inválida para Cómo búscar';
        }
        $cnn=null;
    }

    public function modificarLugar(LugaresDto $lugaresDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("UPDATE lugares set NombreLugar = ? WHERE lugares.IdLugar = ?");
            $query->bindParam(1, $lugaresDto->getNombreCiudad());
            $query->bindParam(2, $lugaresDto->getIdCiudad());
            $query->execute();
            $mensaje="Información actualizada con éxito.&error=false";
        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=La información NO ha sido actualizada en la base de datos.';
        }
        $cnn = null;
        return $mensaje;
    }

    public function existeIdLugar($idLugar, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("SELECT COUNT(*) as existente from lugares where lugares.IdLugar = ?");
            $query->bindParam(1, $idLugar);
            $query->execute();
            $mensaje = $query->fetch();
            return $mensaje;
        }catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'$error=true&mensaje=Error en la consulta';
        }
    }





}