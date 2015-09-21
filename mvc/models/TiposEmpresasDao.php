<?php

class TiposEmpresasDao
{
    public function registrarTipoEmpresa(TiposEmpresasDto $tiposEmpresasDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("INSERT INTO tiposempresas VALUES(DEFAULT,?)");
            $query->bindParam(1, $tiposEmpresasDto->getNombreTipo());
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
            $query = $cnn->prepare("select * from tiposempresas ORDER BY tiposempresas.IdTipo");
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerTipoEmpresa($idTipo, PDO $cnn){

        try {
            $query = $cnn->prepare('select * from tiposempresas where
                                    tiposempresas.IdTipo = ? ORDER BY tiposempresas.IdTipo');
            $query->bindParam(1, $idTipo);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function buscarIdTipoEmpresa($idTipo, PDO $cnn){
        try{
            $query = $cnn->prepare('select * from tiposempresas where
                                    tiposempresas.IdTipo = "'.$idTipo.'" ORDER BY tiposempresas.IdTipo ASC');
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetch();
        } catch (Exception $ex){
            echo '&detalleerror='.$ex->getMessage().'&encontrados=false&error=true';
        };
    }

    public function buscarTipoEmpresa($criterio, $busqueda, $comobuscar, PDO $cnn){
        switch ($comobuscar) {
            case 1:
                    try{
                        $query = $cnn->prepare('select * from tiposempresas where
                                                '.$criterio.' = "'.$busqueda.'" ORDER BY tiposempresas.IdTipo ASC');
                        $query->execute();
                        $_SESSION['conteo'] = $query->rowCount();
                        return $query->fetchAll();
                    } catch (Exception $ex){
                        echo '&detalleerror='.$ex->getMessage().'&encontrados=false';
                    };
                break;
            case 2;
                try{
                    $query = $cnn->prepare('select * from tiposempresas where
                                            '.$criterio.' like "%'.$busqueda.'%" ORDER BY tiposempresas.IdTipo ASC');
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

    public function modificarTipoEmpresa(TiposEmpresasDto $tiposEmpresasDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("UPDATE tiposempresas set NombreTipo = ? WHERE tiposempresas.IdTipo = ?");
            $query->bindParam(1, $tiposEmpresasDto->getNombreTipo());
            $query->bindParam(2, $tiposEmpresasDto->getIdTipo());
            $query->execute();
            $mensaje="Información actualizada con éxito.&error=false";
        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=La información NO ha sido actualizada en la base de datos.';
        }
        $cnn = null;
        return $mensaje;
    }

    public function existeIdTipoEmpresa($idTipo, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("SELECT COUNT(*) as existente from tiposempresas where tiposempresas.IdTipo = ?");
            $query->bindParam(1, $idTipo);
            $query->execute();
            $mensaje = $query->fetch();
            return $mensaje;
        }catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'$error=true&mensaje=Error en la consulta';
        }
    }





}