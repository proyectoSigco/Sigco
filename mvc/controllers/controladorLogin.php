<?php

include_once '../facades/FacadeEmpleado.php';
session_start();
$fachada = new FacadeEmpleado();
if (isset($_GET['login'])){
$user=$_POST['email'];
$pass=$_POST['clave'];
$_SESSION['datosLogin']=$fachada->comprobarUsuario($user,$pass);
print_r($_SESSION['datosLogin']);
if ($_SESSION['datosLogin']==false){
    header('location: ../../index.php?login=false');
}else{
    header('location: ../views/index.php');
}
}


if (isset($_GET['forget'])){
   $user=$_POST['usuario'];
    $existe=$fachada->verificarExistencia($user);
    if ($existe==false){
        header('location: ../../index.php?correo=false');
    }else{
        $_SESSION['correo']=$existe;
        $pass=rand(1111111,999999);
        $_SESSION['pass']=$pass;
        if ($fachada->cambiarClave($pass,$user)){
            header('location: ../utilities/resetpass.php?sent=true');
        }else{
            header('location: ../../Index.php?fail=true');
        }


    }

}


