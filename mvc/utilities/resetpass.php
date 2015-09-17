<?php
require_once('mailer/class.phpmailer.php');
session_start();
$mail=$_SESSION['correo']['mail'];
$pass=$_SESSION['pass'];
unset($_SESSION['correo']);
unset($_SESSION['pass']);
$correo = new PHPMailer();

$correo->IsSMTP();

$correo->SMTPAuth = true;

$correo->SMTPSecure = 'tls';

$correo->Host = "smtp.gmail.com";

$correo->Port = 587;

$correo->Username   = "sigcopass@gmail.com";

$correo->Password   = "sigco2015";

$correo->SetFrom("sigcopass@gmail.com", "SIGCO");
$correo->AddAddress($mail, "Julian Castaño");

$correo->CharSet = 'UTF-8';
$correo->Subject = "Restaurar Contraseña";

$correo->MsgHTML("<img src='../../dist/img/ban.png'>
<h2><b>¿Olvidó su contraseña?</b></h2>
<h2>SIGCO recibió una solicitud para restablecer la contraseña de su cuenta.<br>
Su nueva contraseña es:".$pass.".<br><br><hr>

Si usted no solicitó una nueva contraseña, por favor escribanos a sigco@admin.com <br><br>

<img src='../../dist/img/ban2.png'>

</h2>");
if(!$correo->Send()) {
    header('location: ../../index.php?sent=false');
} else {
  echo "Mensaje enviado con exito.";
  header('location: ../../index.php?sent=true');
}

