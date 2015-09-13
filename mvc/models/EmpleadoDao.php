<?php


class EmpleadoDao {
    public function registrarEmpleado(EmpleadoDto $dto,PDO $cnn) {

        $mensaje = "";
        try {
            $query = $cnn->prepare("INSERT INTO Personas VALUES(DEFAULT ,?,?,?,?,?,?,?,?)");
            $query->bindParam(1,$dto->getIdUsuario());
            $query->bindParam(2,$dto->getNombres());
            $query->bindParam(3,$dto->getApellidos());
            $query->bindParam(4,$dto->getEmail());
            $query->bindParam(5,$dto->getEstado());
            $query->bindParam(6,md5($dto->getContrasenia()));
            $query->bindParam(7,$dto->getRutaimagen());
            $query->bindParam(8,$dto->getCelular());
            $query->execute();
            $query2= $cnn->prepare("INSERT INTO Empleados VALUES (DEFAULT,?,?)");
            $query2->bindParam(1,$dto->getIdUsuario());
            $query2->bindParam(2,$dto->getEmpleo());
            $query2->execute();
            $mensaje="Empleado registrado exitosamente";
        } catch (Exception $ex) {
            $mensaje = '&detalleerror='.$ex->getMessage().'&error=1&mensaje=El empleado NO ha sido registrado en la base de datos.';
        }
        $cnn =null;
        return $mensaje;
    }

    public function listarDocumentos(PDO $cnn) {
        try {
            $query = $cnn->prepare("select CedulaEmpleado as 'cc' from Empleados");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }

    public function listarRoles(PDO $cnn){
        try {
            $query = $cnn->prepare("Select * from Roles");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }

    public function listarMetas(PDO $cnn){
        try {
            $query = $cnn->prepare("Select * from Metas");
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn =null;
        return $mensaje;
    }



    public function modificarUsuario(EmpleadoDto $obj,$user,PDO $cnn) {

        $mensaje = "";
        try {
            $query = $cnn->prepare("UPDATE  Usuarios SET IdUsuario=?,Nombres=?,Apellidos=?,Empleo=?,Email=?,Contrasenia=?,Estado=?,rutaImagen=? where Idusuario=?");
            $query->bindParam(1, $obj->getIdUsuario());
            $query->bindParam(2, $obj->getNombres());
            $query->bindParam(3, $obj->getApellidos());
            $query->bindParam(4, $obj->getEmpleo());
            $query->bindParam(5, $obj->getEmail());
            $query->bindParam(6, md5($obj->getContrasenia()));
            $query->bindParam(7, $obj->getEstado());
            $query->bindParam(8, $obj->getRutaimagen());
            $query->bindParam(9, $user);
            $query->execute();
            $mensaje = true;
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        $cnn=null;
        return $mensaje;
    }
    public function buscarUsuario($id,PDO $cnn) {

        try {
            $query = $cnn->prepare('SELECT * FROM Usuarios WHERE IdUsuario=?');
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }
    public function cancelarUsuario($id,PDO $cnn) {

        $mensaje = "";
        try {
            $query = $cnn->prepare("Update Usuarios set Estado=0 WHERE IdUsuario=?");
            $query->bindParam(1,$id);
            $query->execute();
            $mensaje = true;
        } catch (Exception $ex) {
            $mensaje = $ex->getMessage();
        }
        return $mensaje;
    }
    public function listarUsuarios(PDO $cnn) {

        try {
            $listarGesion = 'Select * from Usuarios';
            $query = $cnn->prepare($listarGesion);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
    }

    public function login($user,$pass,PDO $cnn){
        try {
            $query = $cnn->prepare('SELECT count(*) as "existe" FROM Personas WHERE CedulaPersona=? AND Contrasenia=?');
            $query->bindParam(1, $user);
            $query->bindParam(2, md5($pass));
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }

    public function rol($user,PDO $cnn){
        try {
            $query = $cnn->prepare('select IdRolRolesUsuarios as "rol" from RolesUsuarios where CedulaRolesUsuarios=?');
            $query->bindParam(1, $user);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }

    public function datosLogin($user,PDO $cnn){
        try {
            $query = $cnn->prepare("SELECT CedulaPersona as 'id',Nombres,Apellidos,EstadoPersona,RutaImagenPersona,Empleados.IdEmpleado as 'idempleado',Roles.NombreRol FROM Personas
                                    JOIN Empleados on Empleados.CedulaEmpleado=Personas.CedulaPersona
                                    JOIN RolesUsuarios on RolesUsuarios.CedulaRolesUsuarios=Personas.CedulaPersona
                                    JOIN Roles on RolesUsuarios.IdRolRolesUsuarios=Roles.IdRol WHERE Personas.CedulaPersona=?");
            $query->bindParam(1, $user);
            $query->execute();
            return $query->fetch();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerTitulos($rol,PDO $cnn){
        try {
            $query = $cnn->prepare('select * from PermisosCategorias
join Permisos on Permisos.IdCategoria=PermisosCategorias.IdCategoria
join PermisosRoles on PermisosRoles.IdPermisoPermisosRoles=Permisos.IdPermiso
where PermisosRoles.IdRolPermisosRoles=? group by PermisosCategorias.IdCategoria');
            $query->bindParam(1, $rol);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }

    public function obtenerSubTitulos($id,PDO $cnn){
        try {
            $query = $cnn->prepare('select * from Permisos where IdCategoria=?');
            $query->bindParam(1, $id);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $ex) {
            echo 'Error' . $ex->getMessage();
        }
        $cnn=null;
    }




}