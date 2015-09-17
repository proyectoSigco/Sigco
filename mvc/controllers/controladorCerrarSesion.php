<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 19/08/15
 * Time: 12:22 AM
 */
session_start();
unset($_SESSION['datosLogin']);
unset($_SESSION['rol']);
session_destroy();
header('location: ../../index.php');