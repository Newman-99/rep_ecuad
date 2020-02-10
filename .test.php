<?php
require './functions/functions.php';
require './database/connect.php';
    session_start();

/*
  'grado = '1';
  $seccion='';
  $no_aula = '18';
  $id_turno = '1';
  $anio_escolar1 = '2018';
  $anio_escolar2 = '2019';
$id_clase = '1-A-2018-2019-1';
$id_new_clase = '1-C-2018-2019-1';
*/
/*
$id_doc_admin = '28117208';
$id_area = '1';	
$turno = '1';
$id_estado = '1';
$fecha_ingreso = '2019-12-04';
$fecha_inabilitacion='0000-00-00';

/*
$sql =disable_foreing()." INSERT INTO `administrativos`(`id_doc_admin`, `id_turno`, `id_area`, fecha_ingreso,fecha_inabilitacion,id_estado) VALUES (:id_doc,:id_turno,:id_area,:fecha_ingreso,:fecha_inabilitacion,:id_estado);".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc"=>$id_doc,"id_area"=>$id_area,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

var_dump($result);*/


//$ci_escolar = 'V19913903883';
$id = "V01228117879";

$ = preg_split("",$id);