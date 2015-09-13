<?php
session_start();
require_once '../models/ClientesDao.php';
require_once '../models/ClientesDto.php';
require_once '../utilities/Conexion.php';
require_once '../facades/ClienteFacade.php';

$fachada = new ClienteFacade();
if(isset($_GET['controlar'])) {
    $accion = $_GET['controlar'];

    switch ($accion) {
        case 'crear':
            $clienteDto = new ClientesDto($_POST['Cedula'], $_POST['Nombres'], $_POST['Apellidos'],
                $_POST['Email1'], $_POST['Celular'],
                $_POST['Nit'], $_POST['RazonSocial'], $_POST['Direccion'],
                $_POST['Telefono'], $_POST['Email2'],
                $_POST['IdTipo'], $_POST['IdActividad'], $_POST['IdLugar']
            );

            $mensaje = $fachada->registrarCliente($clienteDto);

            header("Location: ../views/buscarClientes.php?mensaje=" . $mensaje);

            break;
        case 'crearSoloEmpresa':

            $clienteDto = new ClientesDto($_POST['Cedula'], $_POST['Nombres'], $_POST['Apellidos'],
                $_POST['Email1'], $_POST['Celular'],
                $_POST['Nit'], $_POST['RazonSocial'], $_POST['Direccion'],
                $_POST['Telefono'], $_POST['Email2'],
                $_POST['IdTipo'], $_POST['IdActividad'], $_POST['IdLugar']
            );

            $mensaje = $fachada->registrarSoloEmpresa($clienteDto);

            header("Location: ../views/buscarClientes.php?mensaje=" . $mensaje);

            break;

        case 'eliminar':

            $clienteDao = new ClientesDao();

            $mensaje = $clienteDao->eliminarCliente($_GET['id']);

            header("Location: ../views/buscarClientes.php?mensaje=" . $mensaje);

            break;
        case 'cambiarEstado':

            $mensaje = $fachada->cambiarEstado($_GET['estado'], $_GET['cedula']);

            header("Location: ../views/buscarClientes.php?mensaje=" . $mensaje);

            break;
        case 'contrasenia':

            $mensaje = $fachada->reestablecerContrasenia($_GET['IdPersona']);

            header("Location: ../views/buscarClientes.php?mensaje=" . $mensaje);

            break;
        case 'modificar':

            if (isset($_POST['reestablecerContrasenia']) && $_POST['reestablecerContrasenia'] == 'on') {
                $contrasenia = MD5($_POST['Cedula']);
            } else {
                $contrasenia = $_POST['Contrasenia'];
            };

            $clienteDto = new ClientesDto($_POST['Cedula'], $_POST['Nombres'], $_POST['Apellidos'],
                $_POST['Email1'], $_POST['Celular'],
                $_POST['Nit'], $_POST['RazonSocial'], $_POST['Direccion'],
                $_POST['Telefono'], $_POST['Email2'],
                $_POST['IdTipo'], $_POST['IdActividad'], $_POST['IdLugar']
            );

            $clienteDto->setIdCliente($_GET['IdCliente']);
            $clienteDto->setIdPersona($_GET['IdPersona']);
            $clienteDto->setEstado($_POST['EstadoPersona']);
            $clienteDto->setIdClasificacion($_POST['IdClasificacion']);
            $clienteDto->setContrasenia($contrasenia);

            $mensaje = $fachada->modificarCliente($clienteDto);

            header("Location: ../views/buscarClientes.php?mensaje=" . $mensaje);

            break;

        case 'buscar':

            $criterio = $_POST['criterio'];
            $busqueda = $_POST['busqueda'];
            $comobuscar = $_POST['comobuscar'];

            $mensaje = $fachada->buscarCliente($criterio, $busqueda, $comobuscar);

            $_SESSION['consulta'] = $mensaje;

            if ($mensaje == null) {
                header("Location: ../views/buscarClientes.php?encontrados=false&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            } else {
                header("Location: ../views/buscarClientes.php?encontrados=true&criterio=" . $criterio . "&busqueda=" . $busqueda . "&comobuscar=" . $comobuscar);
            }

            break;
        case 'buscarCedula':

            $mensaje = $fachada->buscarCedulaPersona($_POST['cedulaPersona']);

            $_SESSION['consulta'] = $mensaje;

            if ($mensaje == null) {
                header("Location: ../views/buscarClienteNuevaEmpresa.php?encontrados=false&cedulaPersona=" . $_POST['cedulaPersona']);
            } else {
                header("Location: ../views/nuevoClienteMismaPersona.php?encontrados=true&cedulaPersona=" . $_POST['cedulaPersona']);
            }

            break;
        case 'todos':
            $mensaje = $fachada->listarTodos();

            $_SESSION['consulta'] = $mensaje;

            if ($mensaje == null) {
                header("Location: ../views/buscarClientes.php?encontrados=false");
            } else {
                header("Location: ../views/buscarClientes.php?encontrados=true&todos=todos");
            }
            break;


        default:
            echo 'Valor incorrecto enviado por el método get a la variable controlar';

    }
}


if(isset($_POST['idDetalleCliente'])){
    $mensaje = $fachada->obtenerCliente($_POST['idDetalleCliente']);
    echo json_encode($mensaje);
};

if(isset($_POST['existeNit'])){
    $mensaje = $fachada->existeNit($_POST['existeNit']);
    echo json_encode($mensaje);
};




/**

if (isset($_POST['guardar'])){

}
elseif ($_GET['id']!=null&&$_POST['modificar']=null){

}
elseif ($_POST['modificar']!=null&&$_GET['id']!=null){

}

 **/
