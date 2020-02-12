<?php
require './functions/functions.php';
require './database/connect.php';
    session_start();
          
//          var_dump(obten_id_clase_student('34999029'));

$correo_pr = '';

if (obtener_correp_prs('1289876w7') != FALSE) {
$correo_pr = obtener_correp_prs('12898767');
}

var_dump(obtener_correp_prs("1289876w7"));
?>