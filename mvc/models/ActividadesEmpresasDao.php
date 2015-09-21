<?php

class ActividadesEmpresasDao
{
    public function registrarActividadEmpresa(ActividadesEmpresasDto $actividadesEmpresasDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("INSERT INTO actividadesempresas VALUES(DEFAULT,?,?)");
            $query->bindParam(1, $actividadesEmpresasDto->getNombreActividad());
            $query->bindParam(2, $actividadesEmpresasDto->getPagaIva());
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
            $query = $cnn->prepare("select * from actividadesempresas ORDER BY actividadesempresas.IdActividad");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerActividadEmpresa($idActividad, PDO $cnn){

        try {
            $query = $cnn->prepare('select * from actividadesempresas where 
                                    actividadesempresas.IdActividad = ? ORDER BY actividadesempresas.IdActividad');
            $query->bindParam(1, $idActividad);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function buscarIdActividadEmpresa($idActividad, PDO $cnn){
        try{
            $query = $cnn->prepare('select * from actividadesempresas where
                                    actividadesempresas.IdActividad = "'.$idActividad.'" ORDER BY actividadesempresas.IdActividad ASC');
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetch();
        } catch (Exception $ex){
            echo '&detalleerror='.$ex->getMessage().'&encontrados=false&error=true';
        };
    }

    public function buscarActividadEmpresa($criterio, $busqueda, $comobuscar, PDO $cnn){
        switch ($comobuscar) {
            case 1:
                    try{
                        $query = $cnn->prepare('select * from actividadesempresas where
                                                '.$criterio.' = "'.$busqueda.'" ORDER BY actividadesempresas.IdActividad ASC');
                        $query->execute();
                        $_SESSION['conteo'] = $query->rowCount();
                        return $query->fetchAll();
                    } catch (Exception $ex){
                        echo '&detalleerror='.$ex->getMessage().'&encontrados=false';
                    };
                break;
            case 2;
                try{
                    $query = $cnn->prepare('select * from actividadesempresas where
                                            '.$criterio.' like "%'.$busqueda.'%" ORDER BY actividadesempresas.IdActividad ASC');
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

    public function modificarActividadEmpresa(ActividadesEmpresasDto $actividadesEmpresasDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("UPDATE actividadesempresas set NombreActividad = ?, PagaIva = ?
                                    WHERE actividadesempresas.IdActividad = ?");
            $query->bindParam(1, $actividadesEmpresasDto->getNombreActividad());
            $query->bindParam(2, $actividadesEmpresasDto->getPagaIva());
            $query->bindParam(3, $actividadesEmpresasDto->getIdActividad());
            $query->execute();
            $mensaje="Información actualizada con éxito.&error=false";
        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=La información NO ha sido actualizada en la base de datos.';
        }
        $cnn = null;
        return $mensaje;
    }

    public function existeIdActividadEmpresa($idActividad, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("SELECT COUNT(*) as existente from actividadesempresas where actividadesempresas.IdActividad = ?");
            $query->bindParam(1, $idActividad);
            $query->execute();
            $mensaje = $query->fetch();
            return $mensaje;
        }catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'$error=true&mensaje=Error en la consulta';
        }
    }





}