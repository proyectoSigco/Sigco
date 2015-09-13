<?php
/**
 * Created by PhpStorm.
 * User: iStam
 * Date: 3/09/15
 * Time: 7:42 PM
 */
require '../models/MetaDto.php';
require '../facades/FacadeMeta.php';
$facade= new FacadeMeta();
$dto=new MetaDto();
$dto->setTipo($_POST['tipo']);
$dto->setValor($_POST['valor']);
$dto->setFechaInicio($_POST['finicio']);
$dto->setFechaFinal($_POST['ffinal']);
$mensaje=$facade->registrarMeta($dto);
header('location: ../views/registrarMeta.php?mensaje='.$mensaje);