<?php
require './functions/functions.php';
require './database/connect.php';
    session_start();
          
//          var_dump(obten_id_clase_student('34999029'));

$correo_pr = '';
/*
if (obtener_correp_prs('1289876w7') != FALSE) {
$correo_pr = obtener_correp_prs('12898767');
}

var_dump(obtener_correp_prs("1289876w7"));
*/

 $anio_escol_actual = obtener_anios_escolar_actual(); 
$anio_escolar1 = $anio_escol_actual['anio_escolar_1'];
$anio_escolar2 = $anio_escol_actual['anio_escolar_2'];
var_dump($_POST['upd_anio_scol']);

    if(!empty($_POST['upd_anio_scol'])){

  $upd_orden=$_POST['upd_anio_scol'];

    if ($upd_orden ==1) {
      $anio_escolar1++;
      $anio_escolar2++;

echo "<h1>".$anio_escolar1."-".$anio_escolar2."</h1>";
    }

    if ($upd_orden ==2) {
      
      $anio_escolar1--;
      $anio_escolar2--;
var_dump($anio_escolar1,$anio_escolar2);
    }
}
?>