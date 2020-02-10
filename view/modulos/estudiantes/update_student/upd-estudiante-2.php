<?php 
require '../../../includes/init_system_reg.php'; 

require '../../../includes/head_reg_est.php'; 

require '../../../includes/header_reg_est.php'; 

    session_start();

 valid_inicio_sesion('2');

if (isset($_SESSION['sesionform2'])) {
if (comprobar_msjs_array($_SESSION['sesionform2'])) {
extract($_SESSION['sesionform2']);
}
}

$ci_escolar = $_SESSION['ci_escolar'];

$errors_m = array();
$errors_p = array();
$errors_r = array();

 ?>
<?php 


if (!empty($_POST['datos_pers_estd'])) {


        foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform2'][$clave] = $valor;

}


if (isset($_POST['no_register_m']) && isset($_POST['si_exist_m']) ) {
    $errors_m[] = "Selecione si se registrara o ya esta registrada, solo una opcion";
}else{

if (empty($_POST['no_register_m'])) {


    $nacionalidad_m = htmlentities(addslashes($_POST["nacionalidad_m"]));

if (isset($_POST["id_doc_m"])) {
    $id_doc_m = htmlentities(addslashes($_POST["id_doc_m"]));
}

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


if (isset($_POST["id_doc_m_new"])) {
$id_doc_m_new= $_POST["id_doc_m_new"];
$id_doc_m = $id_doc_m_new;
if (isset($_POST["si_exist_m"])) {

if (validar_datos_vacios($id_doc_m_new) || !isset($convivencia_m)) {
           $errors_m[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  
}else{

    if(!is_exist_ci($id_doc_m_new)) {
       $errors_m[]='Esta cedula no esta registrada en el sistema';
        }
$errors_m[] = valid_ci($id_doc_m_new);
}
}else{
    if(is_exist_ci($id_doc_m_new)) {
       $errors_m[]='Esta cedula ya esta registrada en el sistema';
        }

$errors_m[] = valid_ci($id_doc_m_new);

$errors_m = validar_datos_personales($nacionalidad_m,
    $id_doc_m_new,
    $sexo_m = '1'
    ,
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
}

}else{

if(strcmp($_SESSION['id_doc_m'], $id_doc_m) != 0) {

$errors_m = validar_datos_mersonales($nacionalidad_m,
    $id_doc_m,
    $sexo_m = '1'
    ,
    $nombre1_m, 
    $nombre2_m, 
    $apellido_m_m,
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

    if(is_exist_ci($id_doc_m)) {
       $errors_m[] = 'Esta cedula ya esta registrada en el sistema';
        }

    $errors_m[] = valid_ci($id_doc_m);
    }    

}

$lugar_nac_m=trim($lugar_nac_m);
$direcc_hab_m=trim($direcc_hab_m);
$ocupacion_m=trim($ocupacion_m);
$prof_ofi_m=trim($prof_ofi_m);
$direcc_trab_m=trim($direcc_trab_m);
$lug_trab_m=trim($lug_trab_m);
$fecha_nac_m=trim($fecha_nac_m);
$correo_m = filter_var($correo_m, FILTER_SANITIZE_EMAIL);
$nombre1_m=filtrar_nombres_apellidos($nombre1_m);
$nombre2_m=filtrar_nombres_apellidos($nombre2_m);
$apellido_p_m=filtrar_nombres_apellidos($apellido_p_m);
$apellido_m_m=filtrar_nombres_apellidos($apellido_m_m);






}else{$no_register_m=$_POST['no_register_m'];
}
}

if (isset($_POST['no_register_p']) && isset($_POST['si_exist_p']) ) {
    $errors_p[] = "Selecione si se registrara o ya esta registrado, solo una opcion";
}else{

    if (empty($_POST['no_register_p'])) {


    $nacionalidad_p = htmlentities(addslashes($_POST["nacionalidad_p"]));

if (  isset($_POST["id_doc_p"])) {
    $id_doc_p = htmlentities(addslashes($_POST["id_doc_p"]));
}
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


if (isset($_POST["id_doc_p_new"])) {
$id_doc_p_new= $_POST["id_doc_p_new"];
$id_doc_p = $id_doc_p_new;
if (isset($_POST["si_exist_p"])) {

if (validar_datos_vacios($id_doc_p_new) || !isset($convivencia_p)) {
           $errors_p[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  
}else{

    if(!is_exist_ci($id_doc_p_new)) {
       $errors_p[]='Esta cedula no esta registrada en el sistema';
        }
$errors_p[] = valid_ci($id_doc_p_new);
}
}else{
    if(is_exist_ci($id_doc_p_new)) {
       $errors_p[]='Esta cedula ya esta registrada en el sistema';
        }

$errors_p[] = valid_ci($id_doc_p_new);

$errors_p = validar_datos_personales($nacionalidad_p,
    $id_doc_p_new,
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

}else{

if(strcmp($_SESSION['id_doc_p'], $id_doc_p) != 0) {

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

    if(is_exist_ci($id_doc_p)) {
       $errors_p[] = 'Esta cedula ya esta registrada en el sistema';
        }

    $errors_p[] = valid_ci($id_doc_p);
    }    

}


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






}else{$no_register_p=$_POST['no_register_p'];
}
}

var_dump($_POST);

if (empty($is_represent_p) && empty($is_represent_m) ) {

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
$sexo_r=$_POST["sexo_r"] ;
}


if (isset($_POST["id_doc_r_new"])) {
$id_doc_r_new= $_POST["id_doc_r_new"];
$id_doc_r = $id_doc_r_new;
if (isset($_POST["si_exist_r"])) {

if (validar_datos_vacios($id_doc_r_new) || !isset($convivencia_r)) {
           $errors_r[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  
}else{

    if(!is_exist_ci($id_doc_r_new)) {
       $errors_r[]='Esta cedula no esta registrada en el sistema';
        }
$errors_r[] = valid_ci($id_doc_r_new);
}

}else{
    if(is_exist_ci($id_doc_r_new)) {
       $errors_r[]='Esta cedula ya esta registrada en el sistema';
        }

$errors_r[] = valid_ci($id_doc_r_new);

$errors_p = validar_datos_personales($nacionalidad_r,
    $id_doc_r_new,
    $_POST['sexo_r']
    ,
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
}

}else{


if(strcmp($_SESSION['id_doc_r'], $id_doc_r) != 0) {


$errors_p = validar_datos_personales($nacionalidad_r,
    $id_doc_r,
    $_POST['sexo_r']
    ,
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
}else{

    if(is_exist_ci($id_doc_p)) {
       $errors_p[] = 'Esta cedula ya esta registrada en el sistema';}

    $errors_p[] = valid_ci($id_doc_p);    

    echo "Regitrar Nuevo";
}


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
}

if (!empty($is_represent_m) && !empty($is_represent_p) ) {

    $errors_m[] = "Solo puede haber un representante";
    $errors_p[] = "Solo puede haber un representante";

}
 


    if (!comprobar_msjs_array($errors_r) && !comprobar_msjs_array($errors_m) && !comprobar_msjs_array($errors_p)) {    


        foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform2'][$clave] = $valor;

}

$errors_r[]= "<a href='reg-estudiante-3.php'>
    Confirmar
</a>";

}

}

 ?>



 <?php

/*            if (is_exist_padre('',$ci_escolar,'1')) {
                echo "Formulario vacio";                    
}else{
*/


                if(!is_exist_padre('',$ci_escolar,'1')){
            
            if (isset($_POST)) {
            form_madres_empty($_POST);
            }else{   form_madres_empty('');}
}else{

        $sql = consulta_padres_student()." WHERE pds.ci_escolar = :ci_escolar AND pds.id_tip_padre = 1";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$ci_escolar);
        
        $result->execute();

$id_doc_m=form_madres_full($result,$ci_escolar);
$_SESSION['id_doc_m'] = $id_doc_m;
}

       ?> 

<?php   imprimir_msjs($errors_m);  ?>
<!------------------------------- TERCER FORMULARIO [ DATOS DEL PADRE ] ------------------------------------------------>

        <?php 



            if(!is_exist_padre('',$ci_escolar,'2')) {
            
            if (isset($_POST)) {
            form_madres_empty($_POST);
            }else{   form_madres_empty('');
}
}else{

        $sql = consulta_padres_student()." WHERE pds.ci_escolar = :ci_escolar AND pds.id_tip_padre = 2";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$ci_escolar);
        
        $result->execute();

        $id_doc_p= form_padres_full($result,$ci_escolar);
       
$_SESSION['id_doc_p'] = $id_doc_p;

}
        imprimir_msjs($errors_p); 


        ?>

                             

    
<?php 


        $sql = consulta_represent_student()." WHERE rpt.ci_escolar = :ci_escolar;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$ci_escolar);
        
        $result->execute();


if (!isset($id_doc_p) || !isset($id_doc_m) AND empty($_POST['new_represent'])) {
        
            form_represent_full($result);
                
           echo "  <button type='submit' class='btn btn-primary col-lg-9 'value='datos_student' name ='new_represent'>Anadir Nuevo Representante</button>
";


}

if (isset($id_doc_p) AND isset($id_doc_m) || isset($_POST['new_represent'])) {

        if (isset($_POST['new_represent'])) {
                    if (isset($_POST['datos_student'])) {
            form_represent_empty($_POST['datos_student']);
            }else{   form_represent_empty('');}

        }
}
 ?>


<!------------------------------- CUARTO FORMULARIO [ REPRESENTANTE LEGAL ] ------------------------------------------------>
                                    
                                        <a href="reg-estudiante-1.php" class="btn btn-primary  col-lg-2">VOLVER</a>
                                        
                                        <button type='submit' class="btn btn-primary col-lg-9"value="datos_student" name ='datos_pers_estd'>CONTINUAR</button>
                                        
                                    

                                    <?php imprimir_msjs($errors_r); ?>

                         
                            </form>
                        
                        </div>
                </div>

<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <?php require '../../../includes/footer_reg_est.php'; ?>
