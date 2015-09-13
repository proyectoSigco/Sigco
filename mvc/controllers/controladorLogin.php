<?php

require_once '../facades/FacadeEmpleado.php';
session_start();
$fachada = new FacadeEmpleado();
$user=$_POST['email'];
$pass=$_POST['clave'];
$_SESSION['datosLogin']=$fachada->comprobarUsuario($user,$pass);
if ($_SESSION['datosLogin']==false){
    header('location: ../../index.php?login=false');
}else{
    header('location: ../views/index.php');
}

