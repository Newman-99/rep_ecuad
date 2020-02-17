<?php 
require '../../../includes/init_system_reg.php'; 

require '../../../includes/head_reg_est.php'; 

require '../../../includes/header_reg_est.php'; 


    session_start();


 valid_inicio_sesion('2');
/*
if (isset($_SESSION['sesionform2'])) {
if (comprobar_msjs_array($_SESSION['sesionform2'])) {
extract($_SESSION['sesionform2']);
}
}
*/

unset($_SESSION['sesionform2']);
$ci_escolar = $_SESSION['ci_escolar'];
var_dump($_SESSION['ci_escolar']);

$errors_m = array();
$errors_m_upd = array();
$errors_p = array();
$errors_p_upd = array();
$errors_r = array();
$errors_r_upd = array();
$count_represents = 0;

if (isset($_POST["is_represent_p"])){
    $count_represents++;
}

if (isset($_POST["is_represent_m"])) {
    $count_represents++;
}

if (isset($_POST['reg_represent'])) {
    $count_represents++;

}
/*
if ($count_represents>1) {
$errors_m[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
$errors_m_upd[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
$errors_p[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
$errors_p_upd[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
$errors_r_upd[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}*/


// Creacion de nuevo representante

if (!empty($_POST['new_represent'])) {
    $_SESSION['new_represent'] = $_POST['new_represent'];
}


// Proceso de registro del padre
// 
if (!empty($_POST['reg_dad'])) {
    $nacionalidad_p = htmlentities(addslashes($_POST["nacionalidad_p"]));
    $id_doc_p = htmlentities(addslashes($_POST["id_doc_p"]));
    $nombre1_p = htmlentities(addslashes($_POST["nombre1_p"]));
    $nombre2_p = htmlentities(addslashes($_POST["nombre2_p"]));
    $apellido_p_p = htmlentities(addslashes($_POST["apellido_p_p"]));
    $apellido_m_p = htmlentities(addslashes($_POST["apellido_m_p"]));
    $fecha_nac_p = htmlentities(addslashes($_POST["fecha_nac_p"]));    
    $lugar_nac_p = htmlentities(addslashes($_POST["lugar_nac_p"]));    
    $direcc_hab_p = htmlentities(addslashes($_POST["direcc_hab_p"]));   
    $tlf_cel_p = htmlentities(addslashes($_POST["tlf_cel_p"]));    
    $tlf_local_p = htmlentities(addslashes($_POST["tlf_local_p"]));    
    $correo_p = htmlentities(addslashes($_POST["correo_p"])); 
    $estado_civil_p = htmlentities(addslashes($_POST["estado_civil_p"])); 
    $ocupacion_p = htmlentities(addslashes($_POST["ocupacion_p"])); 
    $prof_ofi_p = htmlentities(addslashes($_POST["prof_ofi_p"]));
    $direcc_trab_p = htmlentities(addslashes($_POST["direcc_trab_p"]));
    $lug_trab_p = htmlentities(addslashes($_POST["lug_trab_p"]));
    $tlf_ofic_p = htmlentities(addslashes($_POST["tlf_ofic_p"]));


    $convivencia_p = 0;

if (isset($_POST["convivencia_p"])) {
            $convivencia_p = htmlentities(addslashes($_POST["convivencia_p"]));
    }

    $is_represent_p = 0;

if (isset($_POST["is_represent_p"])) {
    $is_represent_p = htmlentities(addslashes($_POST["is_represent_p"]));
}

    $si_exist_m = 0;




if (isset($_POST["si_exist_p"])) {

if (validar_datos_vacios($id_doc_p) || !isset($convivencia_p)) {
           $errors_p[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  

}else{

$errors_p[] = valid_ci($id_doc_p);

    if(!is_exist_ci($id_doc_p)) {
       $errors_p[] ='Esta cedula no esta registrada en el sistema';
        }
}

}else{

$lugar_nac_p=trim($lugar_nac_p);
$direcc_hab_p=trim($direcc_hab_p);
$ocupacion_p=trim($ocupacion_p);
$prof_ofi_p=trim($prof_ofi_p);
$direcc_trab_p=trim($direcc_trab_p);
$lug_trab_p=trim($lug_trab_p);
$fecha_nac_p=trim($fecha_nac_p);
$correo_p = filter_var($correo_p, FILTER_SANITIZE_EMAIL);
$nombre1_p=filtrar_nombres_apellidos($nombre1_p);
$nombre2_p=filtrar_nombres_apellidos($nombre2_p);
$apellido_p_p=filtrar_nombres_apellidos($apellido_p_p);
$apellido_m_p=filtrar_nombres_apellidos($apellido_m_p);



$errors_p = validar_datos_personales($nacionalidad_p,
    $id_doc_p,
    $sexo_p = '1'
    ,
    $nombre1_p, 
    $nombre2_p, 
    $apellido_p_p,
    $apellido_m_p,
    $fecha_nac_p,     
    $lugar_nac_p,     
    $direcc_hab_p,   
    $tlf_cel_p,    
    $tlf_local_p,     
    $correo_p, 
    $estado_civil_p,
    $ocupacion_p,  
    $prof_ofi_p,
    $direcc_trab_p,
    $lug_trab_p,
    $tlf_ofic_p);


$ocupacion_p=trim($ocupacion_p);
$prof_ofi_p=trim($prof_ofi_p);
$direcc_trab_p=trim($direcc_trab_p);
$lug_trab_p=trim($lug_trab_p);
$lugar_nac_p=trim($lugar_nac_p);
$direcc_hab_p=trim($direcc_hab_p);
$fecha_nac_p=trim($fecha_nac_p);
$correo_p = filter_var($correo_p, FILTER_SANITIZE_EMAIL);
$nombre1_p=filtrar_nombres_apellidos($nombre1_p);
$nombre2_p=filtrar_nombres_apellidos($nombre2_p);
$apellido_p_p=filtrar_nombres_apellidos($apellido_p_p);
$apellido_m_p=filtrar_nombres_apellidos($apellido_m_p);

if (is_exist_ci($id_doc_p)) {
       $errors_p[]='La cedula ya esta registrada en el sistema';
        }

}   


if ($count_represents>1) {
$errors_p[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}

    if (!comprobar_msjs_array($errors_p)) {    

 $nombres_p=$nombre1_p." ".$nombre2_p;

 registrar_padres($id_doc_p,'2',$_SESSION['ci_escolar'],$convivencia_p,$ocupacion_p,'Padre',$nacionalidad_p,$nombres_p,$apellido_p_p,$apellido_m_p,'1',$fecha_nac_p,$estado_civil_p,$lugar_nac_p,$direcc_hab_p,$tlf_cel_p,$tlf_local_p,$correo_p);

$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

  registrar_datos_laborales($id_doc_p,$prof_ofi_p,$lug_trab_p,$direcc_trab_p,$tlf_ofic_p);

 if (!empty($is_represent_p)) {
update_person_represent($id_doc_p,$id_represent,$_SESSION['ci_escolar'],$_SESSION['ci_escolar']);
 }
        $errors_p_upd[] = 'Padre registrado exitosamente';

}

}



// Proceso de Actualizacion del padre// 


if (!empty($_POST['upd_dad'])) {


    $nacionalidad_p = htmlentities(addslashes($_POST["nacionalidad_p"]));
    $id_doc_p = htmlentities(addslashes($_POST["id_doc_p"]));
    $nombre1_p = htmlentities(addslashes($_POST["nombre1_p"]));
    $nombre2_p = htmlentities(addslashes($_POST["nombre2_p"]));
    $apellido_p_p = htmlentities(addslashes($_POST["apellido_p_p"]));
    $apellido_m_p = htmlentities(addslashes($_POST["apellido_m_p"]));
    $fecha_nac_p = htmlentities(addslashes($_POST["fecha_nac_p"]));    
    $lugar_nac_p = htmlentities(addslashes($_POST["lugar_nac_p"]));    
    $direcc_hab_p = htmlentities(addslashes($_POST["direcc_hab_p"]));   
    $tlf_cel_p = htmlentities(addslashes($_POST["tlf_cel_p"]));    
    $tlf_local_p = htmlentities(addslashes($_POST["tlf_local_p"]));    
    $correo_p = htmlentities(addslashes($_POST["correo_p"])); 
    $estado_civil_p = htmlentities(addslashes($_POST["estado_civil_p"])); 
    $ocupacion_p = htmlentities(addslashes($_POST["ocupacion_p"])); 
    $prof_ofi_p = htmlentities(addslashes($_POST["prof_ofi_p"]));
    $direcc_trab_p = htmlentities(addslashes($_POST["direcc_trab_p"]));
    $lug_trab_p = htmlentities(addslashes($_POST["lug_trab_p"]));
    $tlf_ofic_p = htmlentities(addslashes($_POST["tlf_ofic_p"]));


    $convivencia_p = 0;

if (isset($_POST["convivencia_p"])) {
            $convivencia_p = htmlentities(addslashes($_POST["convivencia_p"]));
    }

    $is_represent_p = 0;

if (isset($_POST["is_represent_p"])) {
    $is_represent_p = htmlentities(addslashes($_POST["is_represent_p"]));
}

    $si_exist_m = 0;




$lugar_nac_p=trim($lugar_nac_p);
$direcc_hab_p=trim($direcc_hab_p);
$ocupacion_p=trim($ocupacion_p);
$prof_ofi_p=trim($prof_ofi_p);
$direcc_trab_p=trim($direcc_trab_p);
$lug_trab_p=trim($lug_trab_p);
$fecha_nac_p=trim($fecha_nac_p);
$correo_p = filter_var($correo_p, FILTER_SANITIZE_EMAIL);
$nombre1_p=filtrar_nombres_apellidos($nombre1_p);
$nombre2_p=filtrar_nombres_apellidos($nombre2_p);
$apellido_p_p=filtrar_nombres_apellidos($apellido_p_p);
$apellido_m_p=filtrar_nombres_apellidos($apellido_m_p);



$errors_p_upd = validar_datos_personales($nacionalidad_p,
    $id_doc_p,
    $sexo_p = '1'
    ,
    $nombre1_p, 
    $nombre2_p, 
    $apellido_p_p,
    $apellido_m_p,
    $fecha_nac_p,     
    $lugar_nac_p,     
    $direcc_hab_p,   
    $tlf_cel_p,    
    $tlf_local_p,     
    $correo_p, 
    $estado_civil_p,
    $ocupacion_p,  
    $prof_ofi_p,
    $direcc_trab_p,
    $lug_trab_p,
    $tlf_ofic_p);

$ocupacion_p=trim($ocupacion_p);
$prof_ofi_p=trim($prof_ofi_p);
$direcc_trab_p=trim($direcc_trab_p);
$lug_trab_p=trim($lug_trab_p);
$lugar_nac_p=trim($lugar_nac_p);
$direcc_hab_p=trim($direcc_hab_p);
$fecha_nac_p=trim($fecha_nac_p);
$correo_p = filter_var($correo_p, FILTER_SANITIZE_EMAIL);
$nombre1_p=filtrar_nombres_apellidos($nombre1_p);
$nombre2_p=filtrar_nombres_apellidos($nombre2_p);
$apellido_p_p=filtrar_nombres_apellidos($apellido_p_p);
$apellido_m_p=filtrar_nombres_apellidos($apellido_m_p);

if ($count_represents>1) {
$errors_p_upd[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}


    if (!comprobar_msjs_array($errors_p_upd)) {    

        $errors_p_upd[] = 'Padre actualizado exitosamente';

 $nombres_p=$nombre1_p." ".$nombre2_p;
 
 var_dump($id_doc_p);

 actualizar_persona($nacionalidad_p,$id_doc_p,$id_doc_p,$nombres_p,$apellido_p_p,$apellido_m_p,$sexo_p,$fecha_nac_p,$lugar_nac_p,$direcc_hab_p,$tlf_cel_p,$tlf_local_p,$correo_p,$estado_civil_p,$tlf_emerg ='');

update_person_estudiantes($id_doc_p,$id_doc_p,$_SESSION['ci_escolar'],$_SESSION['ci_escolar'],$convivencia_p,$ocupacion_p,'Padre');

 update_datos_laborales($id_doc_p,$id_doc_p,$prof_ofi_p,$lug_trab_p,$direcc_trab_p,$tlf_ofic_p);

 if (!empty($is_represent_p)) {
    $id_represent = obtener_id_represent($_SESSION['ci_escolar']);

 update_person_represent($id_doc_p,$id_represent,$_SESSION['ci_escolar'],$_SESSION['ci_escolar']);

 }

}

}

// Proceso de Actualizacion de la madre// 


if (!empty($_POST['upd_mom'])) {


    $nacionalidad_m = htmlentities(addslashes($_POST["nacionalidad_m"]));
    $id_doc_m = htmlentities(addslashes($_POST["id_doc_m"]));
    $nombre1_m = htmlentities(addslashes($_POST["nombre1_m"]));
    $nombre2_m = htmlentities(addslashes($_POST["nombre2_m"]));
    $apellido_p_m = htmlentities(addslashes($_POST["apellido_p_m"]));
    $apellido_m_m = htmlentities(addslashes($_POST["apellido_m_m"]));
    $fecha_nac_m = htmlentities(addslashes($_POST["fecha_nac_m"]));    
    $lugar_nac_m = htmlentities(addslashes($_POST["lugar_nac_m"]));    
    $direcc_hab_m = htmlentities(addslashes($_POST["direcc_hab_m"]));   
    $tlf_cel_m = htmlentities(addslashes($_POST["tlf_cel_m"]));    
    $tlf_local_m = htmlentities(addslashes($_POST["tlf_local_m"]));    
    $correo_m = htmlentities(addslashes($_POST["correo_m"])); 
    $estado_civil_m = htmlentities(addslashes($_POST["estado_civil_m"])); 
    $ocupacion_m = htmlentities(addslashes($_POST["ocupacion_m"])); 
    $prof_ofi_m = htmlentities(addslashes($_POST["prof_ofi_m"]));
    $direcc_trab_m = htmlentities(addslashes($_POST["direcc_trab_m"]));
    $lug_trab_m = htmlentities(addslashes($_POST["lug_trab_m"]));
    $tlf_ofic_m = htmlentities(addslashes($_POST["tlf_ofic_m"]));


     $convivencia_m = 0;
    
    if (isset($_POST["convivencia_m"])) {
            $convivencia_m = htmlentities(addslashes($_POST["convivencia_m"]));
    }

    $is_represent_m = 0;

if (isset($_POST["is_represent_m"])) {
            $is_represent_m = htmlentities(addslashes($_POST["is_represent_m"]));
    }



if (isset($_POST["si_exist_m"])) {

if (validar_datos_vacios($id_doc_m) || !isset($convivencia_m)) {
           $errors_m[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  

}else{

$errors_m[] = valid_ci($id_doc_m);

    if(!is_exist_ci($id_doc_m)) {
       $errors_m[]='Esta cedula no esta registrada en el sistema';
        }
}

}else{

$errors_m = validar_datos_personales($nacionalidad_m,
    $id_doc_m,
    $sexo_m = '2',
    $nombre1_m, 
    $nombre2_m, 
    $apellido_p_m,
    $apellido_m_m,
    $fecha_nac_m,     
    $lugar_nac_m,     
    $direcc_hab_m,   
    $tlf_cel_m,    
    $tlf_local_m,     
    $correo_m, 
    $estado_civil_m,
    $ocupacion_m,  
    $prof_ofi_m,
    $direcc_trab_m,
    $lug_trab_m,
    $tlf_ofic_m);

$lugar_nac_m=trim($lugar_nac_m);
$direcc_hab_m=trim($direcc_hab_m);
$fecha_nac_m=trim($fecha_nac_m);
$correo_m = filter_var($correo_m, FILTER_SANITIZE_EMAIL);
$nombre1_m=filtrar_nombres_apellidos($nombre1_m);
$nombre2_m=filtrar_nombres_apellidos($nombre2_m);
$apellido_p_m=filtrar_nombres_apellidos($apellido_p_m);
$apellido_m_m=filtrar_nombres_apellidos($apellido_m_m);

$ocupacion_m=trim($ocupacion_m);
$prof_ofi_m=trim($prof_ofi_m);
$direcc_trab_m=trim($direcc_trab_m);
$lug_trab_m=trim($lug_trab_m);

}

if ($count_represents>1) {
$errors_m_upd[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}


    if (!comprobar_msjs_array($errors_m_upd)) {    

        $errors_m_upd[] = 'Madre actualizada exitosamente';

 $nombres_m=$nombre1_m." ".$nombre2_m;
 
 actualizar_persona($nacionalidad_m,$id_doc_m,$id_doc_m,$nombres_m,$apellido_p_m,$apellido_m_m,$sexo_m,$fecha_nac_m,$lugar_nac_m,$direcc_hab_m,$tlf_cel_m,$tlf_local_m,$correo_m,$estado_civil_m,$tlf_emerg ='');

update_person_estudiantes($id_doc_m,$id_doc_m,$_SESSION['ci_escolar'],$_SESSION['ci_escolar'],$convivencia_m,$ocupacion_m,'Madre');

 update_datos_laborales($id_doc_m,$id_doc_m,$prof_ofi_m,$lug_trab_m,$direcc_trab_m,$tlf_ofic_m);

$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

 if (!empty($is_represent_m)) {
 update_person_represent($id_doc_m,$id_represent,$_SESSION['ci_escolar'],$_SESSION['ci_escolar']);

 }

}

}

// Registro de Representantes

if (!empty($_POST['reg_represent'])) {

    $nacionalidad_r = htmlentities(addslashes($_POST["nacionalidad_r"]));
    $id_doc_r = htmlentities(addslashes($_POST["id_doc_r"]));
    $nombre1_r = htmlentities(addslashes($_POST["nombre1_r"]));
    $nombre2_r = htmlentities(addslashes($_POST["nombre2_r"]));
    $apellido_p_r = htmlentities(addslashes($_POST["apellido_p_r"]));
    $apellido_m_r = htmlentities(addslashes($_POST["apellido_m_r"]));
    $fecha_nac_r = htmlentities(addslashes($_POST["fecha_nac_r"]));    
    $lugar_nac_r = htmlentities(addslashes($_POST["lugar_nac_r"])); 
    $direcc_hab_r = htmlentities(addslashes($_POST["direcc_hab_r"]));   
    $tlf_cel_r = htmlentities(addslashes($_POST["tlf_cel_r"]));    
    $tlf_local_r = htmlentities(addslashes($_POST["tlf_local_r"]));    
    $correo_r = htmlentities(addslashes($_POST["correo_r"])); 
    $estado_civil_r = htmlentities(addslashes($_POST["estado_civil_r"])); 
    $ocupacion_r = htmlentities(addslashes($_POST["ocupacion_r"])); 
    $prof_ofi_r = htmlentities(addslashes($_POST["prof_ofi_r"]));
    $direcc_trab_r = htmlentities(addslashes($_POST["direcc_trab_r"]));
    $lug_trab_r = htmlentities(addslashes($_POST["lug_trab_r"]));
    $tlf_ofic_r = htmlentities(addslashes($_POST["tlf_ofic_r"]));

if (isset($_POST["sexo_r"])) {
            $sexo_r = htmlentities(addslashes($_POST["sexo_r"]));
    }

    $parentesco_r = htmlentities(addslashes($_POST["parentesco_r"]));

    $convivencia_r = 0;

    if (isset($_POST["convivencia_r"])) {

    $convivencia_r = htmlentities(addslashes($_POST["convivencia_r"]));
}

if (!isset($_POST["sexo_r"])) {
$_POST["sexo_r"] = '';
}


if ($count_represents>1) {
    var_dump($count_represents);
$errors_r[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}else{

$si_exist_r = 0;

if (isset($_POST["si_exist_r"])) {
$si_exist_r = 1;
if (validar_datos_vacios($id_doc_r,$parentesco_r) || !isset($convivencia_r)) {
           $errors_r[]='El documento de identidad no puede estar vacio , indique si vive con el estudiante y su parentesco ';  

}else{

$errors_r[] = valid_ci($id_doc_r);

    if(!is_exist_ci($id_doc_r)) {
       $errors_r[]='Esta cedula no esta registrada en el sistema';
        }
}

}else{



$errors_r = validar_datos_personales($nacionalidad_r,
    $id_doc_r,
    $_POST["sexo_r"],
    $nombre1_r, 
    $nombre2_r, 
    $apellido_p_r,
    $apellido_m_r,
    $fecha_nac_r,     
    $lugar_nac_r,     
    $direcc_hab_r,   
    $tlf_cel_r,    
    $tlf_local_r,     
    $correo_r, 
    $estado_civil_r,
    $ocupacion_r,  
    $prof_ofi_r,
    $direcc_trab_r,
    $lug_trab_r,
    $tlf_ofic_r);

if (validar_datos_vacios($parentesco_r)) {
    $errors_r[]= 'Por favor introduzca el parentesco';
}

if (is_exist_ci($id_doc_r)) {
       $errors_r[]='La cedula ya esta registrada en el sistema';
        }

$parentesco_r=trim($parentesco_r);
$lugar_nac_r=trim($lugar_nac_r);
$direcc_hab_r=trim($direcc_hab_r);
$ocupacion_r=trim($ocupacion_r);
$prof_ofi_r=trim($prof_ofi_r);
$direcc_trab_r=trim($direcc_trab_r);
$lug_trab_r=trim($lug_trab_r);
$fecha_nac_r=trim($fecha_nac_r);
$correo_r = filter_var($correo_r, FILTER_SANITIZE_EMAIL);
$nombre1_r=filtrar_nombres_apellidos($nombre1_r);
$nombre2_r=filtrar_nombres_apellidos($nombre2_r);
$apellido_p_r=filtrar_nombres_apellidos($apellido_p_r);
$apellido_m_r=filtrar_nombres_apellidos($apellido_m_r);


}

if ($count_represents>1) {
$errors_r = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}


    if (!comprobar_msjs_array($errors_r)) {    

        $errors_r_upd[]= 'Representante registrado exitosamente';

 $nombres_r=$nombre1_r." ".$nombre2_r;
 
 var_dump($id_doc_r);

 $nombres_r=$nombre1_r." ".$nombre2_r;

$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

 registrar_persona($nacionalidad_r,$id_doc_r,$nombres_r,$apellido_p_r,$apellido_m_r,$_POST["sexo_r"],$fecha_nac_r,$estado_civil_r,$lugar_nac_r,$direcc_hab_r,$tlf_cel_r,$tlf_local_r,$correo_r);

 registrar_person_estudiantes($id_doc_r,$_SESSION['ci_escolar'],$convivencia_r,$ocupacion_r,$parentesco_r);

update_person_represent($id_doc_r,$id_represent,$_SESSION['ci_escolar'],$_SESSION['ci_escolar']);



  registrar_datos_laborales($id_doc_r,$prof_ofi_r,$lug_trab_r,$direcc_trab_r,$tlf_ofic_r);

  unset($_SESSION['new_represent']);

}

}

}

if (!empty($_POST['reg_mom'])) {


    $nacionalidad_m = htmlentities(addslashes($_POST["nacionalidad_m"]));
    $id_doc_m = htmlentities(addslashes($_POST["id_doc_m"]));
    $nombre1_m = htmlentities(addslashes($_POST["nombre1_m"]));
    $nombre2_m = htmlentities(addslashes($_POST["nombre2_m"]));
    $apellido_p_m = htmlentities(addslashes($_POST["apellido_p_m"]));
    $apellido_m_m = htmlentities(addslashes($_POST["apellido_m_m"]));
    $fecha_nac_m = htmlentities(addslashes($_POST["fecha_nac_m"]));    
    $lugar_nac_m = htmlentities(addslashes($_POST["lugar_nac_m"]));    
    $direcc_hab_m = htmlentities(addslashes($_POST["direcc_hab_m"]));   
    $tlf_cel_m = htmlentities(addslashes($_POST["tlf_cel_m"]));    
    $tlf_local_m = htmlentities(addslashes($_POST["tlf_local_m"]));    
    $correo_m = htmlentities(addslashes($_POST["correo_m"])); 
    $estado_civil_m = htmlentities(addslashes($_POST["estado_civil_m"])); 
    $ocupacion_m = htmlentities(addslashes($_POST["ocupacion_m"])); 
    $prof_ofi_m = htmlentities(addslashes($_POST["prof_ofi_m"]));
    $direcc_trab_m = htmlentities(addslashes($_POST["direcc_trab_m"]));
    $lug_trab_m = htmlentities(addslashes($_POST["lug_trab_m"]));
    $tlf_ofic_m = htmlentities(addslashes($_POST["tlf_ofic_m"]));


     $convivencia_m = 0;
    
    if (isset($_POST["convivencia_m"])) {
            $convivencia_m = htmlentities(addslashes($_POST["convivencia_m"]));
    }

    $is_represent_m = 0;

if (isset($_POST["is_represent_m"])) {
            $is_represent_m = htmlentities(addslashes($_POST["is_represent_m"]));
    }



if (isset($_POST["si_exist_m"])) {

if (validar_datos_vacios($id_doc_m) || !isset($convivencia_m)) {
           $errors_m[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  

}else{

$errors_m[] = valid_ci($id_doc_m);

    if(!is_exist_ci($id_doc_m)) {
       $errors_m[]='Esta cedula no esta registrada en el sistema';
        }
}

}else{

$errors_m = validar_datos_personales($nacionalidad_m,
    $id_doc_m,
    $sexo_m = '2',
    $nombre1_m, 
    $nombre2_m, 
    $apellido_p_m,
    $apellido_m_m,
    $fecha_nac_m,     
    $lugar_nac_m,     
    $direcc_hab_m,   
    $tlf_cel_m,    
    $tlf_local_m,     
    $correo_m, 
    $estado_civil_m,
    $ocupacion_m,  
    $prof_ofi_m,
    $direcc_trab_m,
    $lug_trab_m,
    $tlf_ofic_m);

$lugar_nac_m=trim($lugar_nac_m);
$direcc_hab_m=trim($direcc_hab_m);
$fecha_nac_m=trim($fecha_nac_m);
$correo_m = filter_var($correo_m, FILTER_SANITIZE_EMAIL);
$nombre1_m=filtrar_nombres_apellidos($nombre1_m);
$nombre2_m=filtrar_nombres_apellidos($nombre2_m);
$apellido_p_m=filtrar_nombres_apellidos($apellido_p_m);
$apellido_m_m=filtrar_nombres_apellidos($apellido_m_m);

$ocupacion_m=trim($ocupacion_m);
$prof_ofi_m=trim($prof_ofi_m);
$direcc_trab_m=trim($direcc_trab_m);
$lug_trab_m=trim($lug_trab_m);

if (is_exist_ci($id_doc_m)) {
       $errors_m[]='La cedula ya esta registrada en el sistema';
        }


}   


if ($count_represents>1) {
    $errors_m[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}

    if (!comprobar_msjs_array($errors_m)) {    


 $nombres_m=$nombre1_m." ".$nombre2_m;

 registrar_padres($id_doc_m,'1',$_SESSION['ci_escolar'],$convivencia_m,$ocupacion_m,'Madre',$nacionalidad_m,$nombres_m,$apellido_p_m,$apellido_m_m,'2',$fecha_nac_m,$estado_civil_m,$lugar_nac_m,$direcc_hab_m,$tlf_cel_m,$tlf_local_m,$correo_m);

$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

  registrar_datos_laborales($id_doc_m,$prof_ofi_m,$lug_trab_m,$direcc_trab_m,$tlf_ofic_m);

 if (!empty($is_represent_m)) {
update_person_represent($id_doc_m,$id_represent,$_SESSION['ci_escolar'],$_SESSION['ci_escolar']);
 }
$errors_m_upd[] = 'Madre Registrada Exitosamente';

}

}


if (!empty($_POST['reg_dad'])) {

    $nacionalidad_p = htmlentities(addslashes($_POST["nacionalidad_p"]));
    $id_doc_p = htmlentities(addslashes($_POST["id_doc_p"]));
    $nombre1_p = htmlentities(addslashes($_POST["nombre1_p"]));
    $nombre2_p = htmlentities(addslashes($_POST["nombre2_p"]));
    $apellido_p_p = htmlentities(addslashes($_POST["apellido_p_p"]));
    $apellido_m_p = htmlentities(addslashes($_POST["apellido_m_p"]));
    $fecha_nac_p = htmlentities(addslashes($_POST["fecha_nac_p"]));    
    $lugar_nac_p = htmlentities(addslashes($_POST["lugar_nac_p"]));    
    $direcc_hab_p = htmlentities(addslashes($_POST["direcc_hab_p"]));   
    $tlf_cel_p = htmlentities(addslashes($_POST["tlf_cel_p"]));    
    $tlf_local_p = htmlentities(addslashes($_POST["tlf_local_p"]));    
    $correo_p = htmlentities(addslashes($_POST["correo_p"])); 
    $estado_civil_p = htmlentities(addslashes($_POST["estado_civil_p"])); 
    $ocupacion_p = htmlentities(addslashes($_POST["ocupacion_p"])); 
    $prof_ofi_p = htmlentities(addslashes($_POST["prof_ofi_p"]));
    $direcc_trab_p = htmlentities(addslashes($_POST["direcc_trab_p"]));
    $lug_trab_p = htmlentities(addslashes($_POST["lug_trab_p"]));
    $tlf_ofic_p = htmlentities(addslashes($_POST["tlf_ofic_p"]));


    $convivencia_p = 0;

if (isset($_POST["convivencia_p"])) {
            $convivencia_p = htmlentities(addslashes($_POST["convivencia_p"]));
    }

    $is_represent_p = 0;

if (isset($_POST["is_represent_p"])) {
    $is_represent_p = htmlentities(addslashes($_POST["is_represent_p"]));
}

    $si_exist_p = 0;


if (isset($_POST["si_exist_p"])) {

if (validar_datos_vacios($id_doc_p) || !isset($convivencia_p)) {
           $errors_p[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  

}else{

$errors_p[] = valid_ci($id_doc_p);

    if(!is_exist_ci($id_doc_p)) {
       $errors_p[]='Esta cedula no esta registrada en el sistema';
        }
}

}else{

$lugar_nac_p=trim($lugar_nac_p);
$direcc_hab_p=trim($direcc_hab_p);
$ocupacion_p=trim($ocupacion_p);
$prof_ofi_p=trim($prof_ofi_p);
$direcc_trab_p=trim($direcc_trab_p);
$lug_trab_p=trim($lug_trab_p);
$fecha_nac_p=trim($fecha_nac_p);
$correo_p = filter_var($correo_p, FILTER_SANITIZE_EMAIL);
$nombre1_p=filtrar_nombres_apellidos($nombre1_p);
$nombre2_p=filtrar_nombres_apellidos($nombre2_p);
$apellido_p_p=filtrar_nombres_apellidos($apellido_p_p);
$apellido_m_p=filtrar_nombres_apellidos($apellido_m_p);


$errors_p = validar_datos_personales($nacionalidad_p,
    $id_doc_p,
    $sexo_p = '1'
    ,
    $nombre1_p, 
    $nombre2_p, 
    $apellido_p_p,
    $apellido_m_p,
    $fecha_nac_p,     
    $lugar_nac_p,     
    $direcc_hab_p,   
    $tlf_cel_p,    
    $tlf_local_p,     
    $correo_p, 
    $estado_civil_p,
    $ocupacion_p,  
    $prof_ofi_p,
    $direcc_trab_p,
    $lug_trab_p,
    $tlf_ofic_p);

$ocupacion_p=trim($ocupacion_p);
$prof_ofi_p=trim($prof_ofi_p);
$direcc_trab_p=trim($direcc_trab_p);
$lug_trab_p=trim($lug_trab_p);
$lugar_nac_p=trim($lugar_nac_p);
$direcc_hab_p=trim($direcc_hab_p);
$fecha_nac_p=trim($fecha_nac_p);
$correo_p = filter_var($correo_p, FILTER_SANITIZE_EMAIL);
$nombre1_p=filtrar_nombres_apellidos($nombre1_p);
$nombre2_p=filtrar_nombres_apellidos($nombre2_p);
$apellido_p_p=filtrar_nombres_apellidos($apellido_p_p);
$apellido_m_p=filtrar_nombres_apellidos($apellido_m_p);





}

if ($count_represents>1) {
    $errors_p[] = 'No se puede registrar a mas de un representante y asegurese de desmarcar uno de los padres si añadira otro';
}

    if (!comprobar_msjs_array($errors_p)) {    


 $nombres_p=$nombre1_p." ".$nombre2_p;
 
$errors_r_upd[] = "Padre Registrado exitosamente";

 registrar_padres($id_doc_p,'2',$ci_escolar,$convivencia_p,$ocupacion_p,'Padre',$nacionalidad_p,$nombres_p,$apellido_p_p,$apellido_m_p,'1',$fecha_nac_p,$estado_civil_p,$lugar_nac_p,$direcc_hab_p,$tlf_cel_p,$tlf_local_p,$correo_p);

  registrar_datos_laborales($id_doc_p,$prof_ofi_p,$lug_trab_p,$direcc_trab_p,$tlf_ofic_p);

$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

 if (!empty($is_represent_p)) {
update_person_represent($id_doc_p,$id_represent,$_SESSION['ci_escolar'],$_SESSION['ci_escolar']);
 }

}

}
// Comprobar que el numero de representantes no no se ha mas de uno


var_dump($count_represents);

/*if (!empty($is_represent_m) && !empty($is_represent_p) ) {

    $errors_r[] = "Si desea añadir otro representante debe desmarcar algunos de los padres como el mismo";

}*/

 ?>


 
    <!--formularios-->
            <div class="container">

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">



<?php if(!is_exist_padre('',$_SESSION['ci_escolar'],'1')){ 

    include 'sub_includes/reg_mom.php';
    ?>

<?php }else{
    include 'sub_includes/upd_mom.php';

}
    echo " <br><br>";

?>


<?php if(!is_exist_padre('',$_SESSION['ci_escolar'],'2')){ 

    include 'sub_includes/reg_dad.php';

    ?>

<?php }else{
    include 'sub_includes/upd_dad.php';

}


        echo " <br><br>";

?>

<?php 
$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

  $id_madre=obtener_id_padres($_SESSION['ci_escolar'],'1');
  $id_padre=obtener_id_padres($_SESSION['ci_escolar'],'2');
//var_dump($id_represent);
//var_dump($id_madre);
//var_dump($id_padre);

//var_dump($id_represent, $id_madre, $id_padre);
//var_dump(strcmp($id_represent, $id_padre));
/*
if (!isset($_POST['new_represent'])) {
    echo "Registro nuevo";
    var_dump(isset($_POST['new_represent']));
    var_dump($_SESSION['new_represent']);
}
*/

//    var_dump(isset($_POST['new_represent']));
  //  var_dump(isset($_SESSION['new_represent']));

    if (strcmp($id_represent, $id_madre) === 0 || strcmp($id_represent, $id_padre) === 0 || isset($_POST['new_represent']) || isset($_SESSION['new_represent'])){
    include 'sub_includes/reg_represent.php';
    }else{
    include 'sub_includes/upd_represent.php';
    }
        echo " <br><br>";


 ?>
                <a href="../menu_upd_student.php" class="btn btn-primary  col-lg-2">Volver</a>
         </form>

                                        

                        </div>
                </div>

<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <?php require '../../../includes/footer_reg_est.php'; ?>