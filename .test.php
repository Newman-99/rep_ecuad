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


function sepadador_ci_escolar($id){ 

// Separar Cedula

    if (preg_match('/V|E/',$id,$coincidencias,PREG_OFFSET_CAPTURE)) {
               $resultado = $coincidencias[0];
        $nacionalidad = $resultado[0];
    } 

if (preg_match('/[0-9]{3}/',$id,$coincidencias,PREG_OFFSET_CAPTURE)) {
        $resultado = $coincidencias[0];
        $anio_nac = $resultado[0];
    }

  $id_madre=obtener_id_padres($id,'1');
  $id_padre=obtener_id_padres($id,'2');

//var_dump($id_padre);
$busc_padres='/'.$id_padre."|".$id_madre.'/';

if (preg_match($busc_padres,$id,$coincidencias,PREG_OFFSET_CAPTURE)) {
        $resultado = $coincidencias[0];
        $id_padre_ci_escol = $resultado[0];
    }


$ci_scol = preg_replace ( '/'.$nacionalidad.'/','', $id );

$ci_scol = preg_replace ( '/'.$id_padre_ci_escol.'/','', $ci_scol );

$ci_scol = preg_replace ( '/'.$anio_nac.'/','', $ci_scol);

$indic_opc = '';

if(preg_match('/[1-9]{1}/',$ci_scol)) {
$indic_opc = $ci_scol;
}


$ci_escolar = array('nacionalidad' => $nacionalidad,'id_padre_ci_escol' => $id_padre_ci_escol,'anio_nac'=>$anio_nac,'indic_opc'=>$indic_opc);

}

var_dump($ci_escolar);
?>