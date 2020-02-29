
<?php 
require '../../includes/init_system.php'; 

require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>



<?php 



    session_start();

 valid_inicio_sesion('2');
$errors = array();

extract($_SESSION['sesionform1']);
extract($_SESSION['sesionform2']);
extract($_SESSION['sesionform3']);
extract($_SESSION['sesionform4']);
extract($_SESSION['sesionform5']);


//Filtracion de registro de estudiantes


$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);
$fecha_nac=trim($fecha_nac);


if(!empty($apellido_m)){
$apellido_m=filtrar_nombres_apellidos($apellido_m);
}else{
    $apellido_m="";
}

if(!empty($nombre2)){
$nombre2=filtrar_nombres_apellidos($nombre2);
}else{
    $nombre2 = "";
}

// Filtracion de registros de la masdre
// 
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
    
// Filtracion de registros del padre

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

// Filtracion de registros del representante

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

// Filtracion de registros del formulario 3

    $nro_pers_viven=trim($nro_pers_viven);
$descrip_herma=trim($descrip_herma);
$descrip_enfer_cron=trim($descrip_enfer_cron);
$descrip_problem_visual=trim($descrip_problem_visual);
$descrip_problem_audi=trim($descrip_problem_audi);
$descrip_alergias=trim($descrip_alergias);
$descrip_condic_especific=trim($descrip_condic_especific);
$descrip_vacunas=trim($descrip_vacunas);
$psicopedag=trim($psicopedag);
$psicologo=trim($psicologo);
$otras=trim($otras);
$especifi_otras=trim($especifi_otras);
$descrip_lleg_retir=trim($descrip_lleg_retir);
$desc_lleg_retir_transp=trim($desc_lleg_retir_transp);
$nombres_pr=trim($nombres_pr);
$apellido_p_pr=trim($apellido_p_pr);
$apellido_m_pr=trim($apellido_m_pr);
$parentesc_pr=trim($parentesc_pr);
$tlf_cel_pr=trim($tlf_cel_pr);
$tlf_local_pr=trim($tlf_local_pr);
$tlf_emerg=trim($tlf_emerg);


// Procesos de Registro de Estudiante
    $ci_escolar = $ci_escol_nacidad."".$ci_escol_id_opc."".$ci_escol_nac_estd."".$ci_escol_ci_mom;

if (empty($ci_escolar)) {
  $ci_escolar = $id_doc_estd;
}
actualizar_persona($nacionalidad,$ci_escolar,$ci_escolar,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$lugar_nac,$direcc_hab,'','','','','');

update_basic_data_student($ci_escolar,$ci_escolar,$id_doc_new,$id_estado_student);


if (!isset($no_register_m)) {
    if (isset($id_doc_m_new)) {

 $nombres_m=$nombre1_m." ".$nombre2_m;
 
 registrar_padres($id_doc_m,'1',$ci_escolar,$convivencia_m,$ocupacion_m,'Madre',$nacionalidad_m,$nombres_m,$apellido_p_m,$apellido_m_m,'2',$fecha_nac_m,$estado_civil_m,$lugar_nac_m,$direcc_hab_m,$tlf_cel_m,$tlf_local_m,$correo_m);

  registrar_datos_laborales($id_doc_m,$prof_ofi_m,$lug_trab_m,$direcc_trab_m,$tlf_ofic_m);

 if (!empty($is_represent_m)) {
 registrar_representantes($id_doc_m,$ci_escolar);
 }


 }else{

 actualizar_persona($nacionalidad_m,$id_doc_m,$id_doc_new_m,$nombres_m,$apellido_p_m,$apellido_m_m,$sexo_m,$fecha_nac_m,$lugar_nac_m,$direcc_hab_m,$tlf_cel_m,$tlf_local_m,$correo_m,$estado_civil_m);

 update_datos_laborales($id_doc_m,$id_doc_new_m,$prof_ofic_m,$lugar_trab_m,$direcc_trab_m,$tlf_ofic_m);

 update_person_estudiantes($id_doc_m,$id_doc_new_m,$ci_escolar_m,$ci_escolar_new_m,$convivencia_m,$ocupacion_m,$parentesco_m);

update_person_padres($id_doc_new_m,$id_doc_m,$ci_escolar_m,$ci_escolar_new);

 update_person_represent($id_doc_new_m,$id_doc_m,$ci_escolar,$ci_escolar_new);

    }
}


// Regitro Padre

if (!isset($no_register_p)) {
    if (isset($id_doc_p_new)) {

 $nombres_p=$nombre1_p." ".$nombre2_p;
 
 registrar_padres($id_doc_p,'2',$ci_escolar,$convivencia_p,$ocupacion_p,'Padre',$nacionalidad_p,$nombres_p,$apellido_p_p,$apellido_m_p,'1',$fecha_nac_p,$estado_civil_p,$lugar_nac_p,$direcc_hab_p,$tlf_cel_p,$tlf_local_p,$correo_p);

  registrar_datos_laborales($id_doc_p,$prof_ofi_p,$lug_trab_p,$direcc_trab_p,$tlf_ofic_p);

 if (!empty($is_represent_p)) {
 registrar_representantes($id_doc_p,$ci_escolar);
 }


 }else{

 $nombres_p=$nombre1_p." ".$nombre2_p;
 
 actualizar_persona($nacionalidad_p,$id_doc_p,$id_doc_p_new,$nombres_p,$apellido_p_m,$apellido_m_m,$sexo_p,$fecha_nac_p,$lugar_nac_p,$direcc_hab_p,$tlf_cel_p,$tlf_local_p,$correo_p,$estado_civil_p);

 update_datos_laborales($id_doc_p,$id_doc_p_new,$prof_ofi_p,$lugar_trab_p,$direcc_trab_p,$tlf_ofic_p);

 update_person_estudiantes($id_doc_p,$id_doc_p_new,$ci_escolar_p,$ci_escolar_new_p,$convivencia_p,$ocupacion_p,'Padre');

update_person_padres($id_doc_new_p,$id_doc_p,$ci_escolar,$ci_escolar_new);

 update_person_represent($id_doc_p_new,$id_doc_p,$ci_escolar,$ci_escolar_new);

    }
}

/*

// Registro de la salud del estudiante

 regist_data_salud_student($ci_escolar,
             $enfer_cron, 
             $descrip_enfer_cron, 
             $problem_visual, 
             $descrip_problem_visual,
             $problem_audi, 
             $descrip_problem_audi,
             $alergias, 
             $descrip_alergias, 
             $condic_especif, 
             $descrip_condic_especific,
             $vacunas,
             $descrip_vacunas,
              $psicopedag,
              $psicologo,
             $ter_lenguaj,
             $otras,
             $especifi_otras,
             $descrip_medicacion,
             $medicacion,
             $anex_infor);


//Registrar datos de movilidad del estudiante
     register_movilidad_student($ci_escolar,$lleg_retir,$descrip_lleg_retir,$lleg_retir_transp,$desc_lleg_retir_transp);

// Registrar persona retirar

 registrar_persona($nacionalidad_pr,$id_doc_pr,$nombres_pr,$apellido_p_pr,$apellido_m_pr,$sexo_pr,'',$estado_civil_pr,'','',$tlf_cel_pr,$tlf_local_pr,'');

 registrar_person_estudiantes($id_doc_pr,$ci_escolar,'','',$parentesc_pr);

  registrar_pers_retirar($id_doc_pr,$ci_escolar);

// Registro de datos de actualizacion

registrar_actualizacion($ci_escolar,$id_doc_admin_upt,$grado_updat,$fecha_upadt);

// Registro de datos y escolaridad

$id_actualizacion=obtener_ultimo_permiso();

registrar_inscrip_scolaridad($ci_escolar,$plantel_proced,$localidad,$anio_escolar1_escolaridad,$anio_escolar2_escolaridad,$grado_escolaridad,$seccion_escolaridad,$calif_escolaridad,$repitiente,$observacions,$id_actualizacion);
*/
?>

    <!--formularios-->
            <div class="container">

    <!--------------------------- DECIMO FORMULARIO [ Actualizacion de datos ]-->
            <!--ESQUEMA ESQUELO PARA DECIMO FORMULARIO-->
            <div class="row">
                        <div class="col-lg-12">
                            <div id="ui">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo"> Estudiante registrado con exito
<!----------------------------------------- INSERTA FORM ACA EN EL DIV y por ahí vas entre lg-6 o 12 ---------------->
                            <button type='submit' class="btn btn-primary btn-block btn-lg"value="data_update" name ='data_update'>Continuar</button>
</h3>
                            <?php imprimir_msjs($errors); ?>

                                        </div>
                            </div>
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

<?php require '../../../includes/footer_reg_est.php'; ?>
