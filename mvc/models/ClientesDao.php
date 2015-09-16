<?php

class ClientesDao
{

//session_start();

    public function registrarCliente(ClientesDto $clienteDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("INSERT INTO Personas (CedulaPersona, Nombres,
                                    Apellidos, EmailPersona, EstadoPersona, Contrasenia,
                                    RutaImagenPersona, CelularPersona)
                                    VALUES(?,?,?,?,'Activo',MD5(?),'../imagenes/sinImagen.jpg',?)");
            $query->bindParam(1, $clienteDto->getCedula());
            $query->bindParam(2, $clienteDto->getNombres());
            $query->bindParam(3, $clienteDto->getApellidos());
            $query->bindParam(4, $clienteDto->getEmail1());
            $query->bindParam(5, $clienteDto->getCedula());
            $query->bindParam(6, $clienteDto->getCelular());

            $query->execute();

            $query = $cnn->prepare("INSERT INTO Clientes (Nit, RazonSocial, Direccion, Telefono,
                                    EmailCliente, IdTipoCliente, IdActividadCliente,
                                    IdClasificacionCliente, IdLugarCliente, CedulaCliente)
                                  VALUES (?,?,?,?,?,?,?,1,?,?)");

            $query->bindParam(1, $clienteDto->getNit());
            $query->bindParam(2, $clienteDto->getRazonSocial());
            $query->bindParam(3, $clienteDto->getDireccion());
            $query->bindParam(4, $clienteDto->getTelefono());
            $query->bindParam(5, $clienteDto->getEmail2());
            $query->bindParam(6, $clienteDto->getIdTipo());
            $query->bindParam(7, $clienteDto->getIdActividad());
            $query->bindParam(8, $clienteDto->getIdLugar());
            $query->bindParam(9, $clienteDto->getCedula());
            $query->execute();

            $query3=$cnn->prepare("Insert into RolesUsuarios VALUES (1,?)");
            $query3->bindParam(1,$clienteDto->getCedula());
            $query3->execute();

            $query4=$cnn->prepare("Insert into Empleados VALUES (DEFAULT,?,'Cliente')");
            $query4->bindParam(1,$clienteDto->getCedula());
            $query4->execute();
            $mensaje="Cliente registrado con éxito en la base de datos.&error=0";

        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=El cliente NO ha sido registrado en la base de datos.';
        }

        $cnn = null;
        return $mensaje;
    }

    public function registrarSoloEmpresa(ClientesDto $clienteDto, PDO $cnn){
        $mensaje = "";
        try{

            $query = $cnn->prepare("INSERT INTO Clientes (Nit, RazonSocial, Direccion, Telefono,
                                    EmailCliente, IdTipoCliente, IdActividadCliente,
                                    IdClasificacionCliente, IdLugarCliente, CedulaCliente)
                                  VALUES (?,?,?,?,?,?,?,1,?,?)");

            $query->bindParam(1, $clienteDto->getNit());
            $query->bindParam(2, $clienteDto->getRazonSocial());
            $query->bindParam(3, $clienteDto->getDireccion());
            $query->bindParam(4, $clienteDto->getTelefono());
            $query->bindParam(5, $clienteDto->getEmail2());
            $query->bindParam(6, $clienteDto->getIdTipo());
            $query->bindParam(7, $clienteDto->getIdActividad());
            $query->bindParam(8, $clienteDto->getIdLugar());
            $query->bindParam(9, $clienteDto->getCedula());

            $query->execute();

            $mensaje="Se ha añadido una empresa para el cliente registrado con cédula No.".$clienteDto->getCedula().".&error=0";

        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=La empresa NO ha sido registrada en la base de datos.';
        }

        $cnn = null;
        return $mensaje;
    }

    public function eliminarCliente($idCliente){
        $cnn = Conexion::getConexion();
        $mensaje = "";

        try{
            $query = $cnn->prepare("DELETE FROM Clientes WHERE IdCliente = ?");
            $query->bindParam(1, $idCliente);
            $query->execute();
            $mensaje = "Cliente completamente eliminado de la base de datos.&error=0";
        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1';
        }
        return $mensaje;
    }

    public function listarTodos(PDO $cnn){
        //$cnn = Conexion::getConexion();
        try{
            $listarClientes = 'SELECT Personas.*, Clientes.*, Lugares.NombreLugar,
                                concat(Personas.Nombres," ",Personas.Apellidos) as Contacto,
                                tiposempresas.*, actividadesempresas.*, clasificaciones.*
                                FROM Personas JOIN Clientes on Personas.CedulaPersona = Clientes.CedulaCliente
                                join Lugares on Clientes.IdLugarCliente = Lugares.IdLugar
                                JOIN tiposempresas on tiposempresas.IdTipo = clientes.IdTipoCliente JOIN
                                actividadesempresas on actividadesempresas.IdActividad = clientes.IdActividadCliente
                                JOIN clasificaciones on clasificaciones.IdClasificacion = clientes.IdClasificacionCliente
                                ORDER BY `Clientes`.`Nit` ASC';
            $query = $cnn->prepare($listarClientes);
            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            return $query->fetchAll();

        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerPersona($cedulaPersona, PDO $cnn){

        try {
            $query = $cnn->prepare('SELECT Personas.*, Clientes.*, Lugares.NombreLugar,
                                concat(Personas.Nombres," ",Personas.Apellidos) as Contacto,
                                tiposempresas.*, actividadesempresas.*, clasificaciones.*
                                FROM Personas JOIN Clientes on Personas.CedulaPersona = Clientes.CedulaCliente
                                join Lugares on Clientes.IdLugarCliente = Lugares.IdLugar
                                JOIN tiposempresas on tiposempresas.IdTipo = clientes.IdTipoCliente JOIN
                                actividadesempresas on actividadesempresas.IdActividad = clientes.IdActividadCliente
                                JOIN clasificaciones on clasificaciones.IdClasificacion = clientes.IdClasificacionCliente
                                AND personas.CedulaPersona = ?
                                ORDER BY Clientes.Nit ASC');
            $query->bindParam(1, $cedulaPersona);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerCliente($IdCliente, PDO $cnn){

        try {
            $query = $cnn->prepare('SELECT Personas.*, Clientes.*, Lugares.NombreLugar,
                                concat(Personas.Nombres," ",Personas.Apellidos) as Contacto,
                                tiposempresas.*, actividadesempresas.*, clasificaciones.*
                                FROM Personas JOIN Clientes on Personas.CedulaPersona = Clientes.CedulaCliente
                                join Lugares on Clientes.IdLugarCliente = Lugares.IdLugar
                                JOIN tiposempresas on tiposempresas.IdTipo = clientes.IdTipoCliente JOIN
                                actividadesempresas on actividadesempresas.IdActividad = clientes.IdActividadCliente
                                JOIN clasificaciones on clasificaciones.IdClasificacion = clientes.IdClasificacionCliente
                                AND clientes.IdCliente = ?
                                ORDER BY Clientes.Nit ASC');
            $query->bindParam(1, $IdCliente);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo '&detalleerror='.$ex->getMessage();
        }
        $cnn=null;
    }

    public function buscarCedulaPersona($cedulaPersona, PDO $cnn){
        try{
            $query = $cnn->prepare('SELECT Personas.*, Clientes.*, Lugares.NombreLugar,
                                    concat(Personas.Nombres," ",Personas.Apellidos) as Contacto,
                                    tiposempresas.*, actividadesempresas.*, clasificaciones.*
                                    FROM Personas JOIN Clientes on Personas.CedulaPersona = Clientes.CedulaCliente
                                    join Lugares on Clientes.IdLugarCliente = Lugares.IdLugar
                                    JOIN tiposempresas on tiposempresas.IdTipo = clientes.IdTipoCliente JOIN
                                    actividadesempresas on actividadesempresas.IdActividad = clientes.IdActividadCliente
                                    JOIN clasificaciones on clasificaciones.IdClasificacion = clientes.IdClasificacionCliente
                                    AND personas.CedulaPersona = "'.$cedulaPersona.'" ORDER BY `Clientes`.`Nit` ASC');

            $query->execute();
            $_SESSION['conteo'] = $query->rowCount();
            $conteo = $query->rowCount();
            return $query->fetch();
        } catch (Exception $ex){
            echo '&detalleerror='.$ex->getMessage().'&encontrados=false&error=true';
        };
    }

    public function buscarCliente($criterio, $busqueda, $comobuscar, PDO $cnn){

        switch ($comobuscar) {
            case 1:

                    try{
                        $query = $cnn->prepare('SELECT Personas.*, Clientes.*, Lugares.NombreLugar,
                                                concat(Personas.Nombres," ",Personas.Apellidos) as Contacto,
                                                tiposempresas.*, actividadesempresas.*, clasificaciones.*
                                                FROM Personas JOIN Clientes on Personas.CedulaPersona = Clientes.CedulaCliente
                                                join Lugares on Clientes.IdLugarCliente = Lugares.IdLugar
                                                JOIN tiposempresas on tiposempresas.IdTipo = clientes.IdTipoCliente JOIN
                                                actividadesempresas on actividadesempresas.IdActividad = clientes.IdActividadCliente
                                                JOIN clasificaciones on clasificaciones.IdClasificacion = clientes.IdClasificacionCliente
                                                  AND '.$criterio.' = "'.$busqueda.'" ORDER BY `Clientes`.`Nit` ASC');

                        $query->execute();
                        $_SESSION['conteo'] = $query->rowCount();
                        return $query->fetchAll();
                    } catch (Exception $ex){
                        echo '&detalleerror='.$ex->getMessage().'&encontrados=0';
                    };

                break;
            case 2;


                try{
                    $query = $cnn->prepare('SELECT Personas.*, Clientes.*, Lugares.NombreLugar,
                                            concat(Personas.Nombres," ",Personas.Apellidos) as Contacto,
                                            tiposempresas.*, actividadesempresas.*, clasificaciones.*
                                            FROM Personas JOIN Clientes on Personas.CedulaPersona = Clientes.CedulaCliente
                                            join Lugares on Clientes.IdLugarCliente = Lugares.IdLugar
                                            JOIN tiposempresas on tiposempresas.IdTipo = clientes.IdTipoCliente JOIN
                                                actividadesempresas on actividadesempresas.IdActividad = clientes.IdActividadCliente
                                                JOIN clasificaciones on clasificaciones.IdClasificacion = clientes.IdClasificacionCliente
                                            AND '.$criterio.' like "%'.$busqueda.'%" ORDER BY `Clientes`.`Nit` ASC');

                    //$query->bindParam(1, $busqueda);
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

    public function modificarCliente(ClientesDto $clienteDto, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("UPDATE Personas set CedulaPersona = ?, Nombres = ?,
                                    Apellidos = ?, EmailPersona = ?, EstadoPersona = ?, Contrasenia = ?,
                                    CelularPersona = ? WHERE Personas.IdPersona = ?");
            $query->bindParam(1, $clienteDto->getCedula());
            $query->bindParam(2, $clienteDto->getNombres());
            $query->bindParam(3, $clienteDto->getApellidos());
            $query->bindParam(4, $clienteDto->getEmail1());
            $query->bindParam(5, $clienteDto->getEstado());
            $query->bindParam(6, $clienteDto->getContrasenia());
            $query->bindParam(7, $clienteDto->getCelular());
            $query->bindParam(8, $clienteDto->getIdPersona());

            $query->execute();

            $query = $cnn->prepare("UPDATE  Clientes set Nit = ?, RazonSocial = ?, Direccion = ?, Telefono = ?,
                                    EmailCliente = ?, IdTipoCliente = ?, IdActividadCliente = ?,
                                    IdClasificacionCliente = ?, IdLugarCliente = ?, CedulaCliente = ? where Clientes.IdCliente = ? ");

            $query->bindParam(1, $clienteDto->getNit());
            $query->bindParam(2, $clienteDto->getRazonSocial());
            $query->bindParam(3, $clienteDto->getDireccion());
            $query->bindParam(4, $clienteDto->getTelefono());
            $query->bindParam(5, $clienteDto->getEmail2());
            $query->bindParam(6, $clienteDto->getIdTipo());
            $query->bindParam(7, $clienteDto->getIdActividad());
            $query->bindParam(8, $clienteDto->getIdClasificacion());
            $query->bindParam(9, $clienteDto->getIdLugar());
            $query->bindParam(10, $clienteDto->getCedula());
            $query->bindParam(11, $clienteDto->getIdCliente());

            $query->execute();

            echo 'ejecutado';

            $mensaje="Cliente actualizado con éxito.&error=false";

        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=El cliente NO ha sido actualizado en la base de datos.';
        }

        $cnn = null;
        return $mensaje;
    }

    public function cambiarEstado($estado, $cedula, PDO $cnn){
        $mensaje = "";
        if($estado=='Activo'){
            $estado='Inactivo';
        }elseif($estado=='Inactivo'){
            $estado='Activo';
        }else
        {echo'No envió el estado correcto por el método get variable estado';};
        try{
            $query = $cnn->prepare("UPDATE Personas SET Personas.EstadoPersona = ? WHERE Personas.CedulaPersona = ?");

            $query->bindParam(1, $estado);
            $query->bindParam(2, $cedula);

            $query->execute();
            $mensaje="Cliente actualizado con éxito.&error=false";

        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=El cliente NO ha sido actualizado en la base de datos.';
        }

        $cnn = null;
        return $mensaje;
    }

    public function reestablecerContrasenia($idPersona, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("UPDATE Personas SET Personas.Contrasenia = MD5(personas.CedulaPersona) WHERE Personas.IdPersona = ?");

            $query->bindParam(1, $idPersona);

            $query->execute();
            $mensaje="Se ha reestablecido la contraseña del cliente a su estado inicial (documento/cédula).&error=false";

        } catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=true&mensaje=El cliente NO ha sido actualizado en la base de datos.';
        }

        $cnn = null;
        return $mensaje;
    }

    public function existeNit($nit, PDO $cnn){
        $mensaje = "";
        try{
            $query = $cnn->prepare("SELECT COUNT(*) as existente from clientes where clientes.Nit = ?");
            $query->bindParam(1, $nit);
            $query->execute();
            if($query==1){
                $mensaje = true;
            }elseif ($query==0){
                $mensaje = false;
            }else{
                $mensaje = 'Error en la consulta';
            }
            return $mensaje;
        }catch (Exception $ex){
            $mensaje = '&detalleerror='.$ex->getMessage().'$error=true&mensaje=Error en la consulta';
        }
    }





}