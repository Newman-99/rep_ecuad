<?php require '../../../includes/init_system_reg.php'; ?>

<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>

<?php 
$errors_1= array();

$errors_2= array();

$errors_3= array();

$errors_pr= array();

$errors= array();

    session_start();

 valid_inicio_sesion('2');


if (isset($_SESSION['sesionform3'])) {
if (comprobar_msjs_array($_SESSION['sesionform3'])) {
extract($_SESSION['sesionform3']);
}
}


if (!empty($_POST['otros_datos'])) {


    $nro_pers_viven = htmlentities(addslashes($_POST["nro_pers_viven"]));

    $descrip_herma = htmlentities(addslashes($_POST["descrip_herma"]));

    $descrip_enfer_cron = htmlentities(addslashes($_POST["descrip_enfer_cron"]));

    $descrip_problem_visual = htmlentities(addslashes($_POST["descrip_problem_visual"]));

    $descrip_problem_audi = htmlentities(addslashes($_POST["descrip_problem_audi"]));

    $descrip_alergias = htmlentities(addslashes($_POST["descrip_alergias"]));

    $descrip_condic_especific = htmlentities(addslashes($_POST["descrip_condic_especific"]));

    $descrip_vacunas = htmlentities(addslashes($_POST["descrip_vacunas"]));

    $psicopedag = htmlentities(addslashes($_POST["psicopedag"]));

    $ter_lenguaj = htmlentities(addslashes($_POST["ter_lenguaj"]));


    $psicologo = htmlentities(addslashes($_POST["psicologo"]));
    
    $otras = htmlentities(addslashes($_POST["otras"]));

    $especifi_otras = htmlentities(addslashes($_POST["especifi_otras"]));


    $descrip_medicacion = htmlentities(addslashes($_POST["descrip_medicacion"]));
    
    $descrip_lleg_retir = htmlentities(addslashes($_POST["descrip_lleg_retir"]));

    $desc_lleg_retir_transp = htmlentities(addslashes($_POST["desc_lleg_retir_transp"]));

    

    $nombres_pr = htmlentities(addslashes($_POST["nombres_pr"]));

    $apellido_p_pr = htmlentities(addslashes($_POST["apellido_p_pr"]));

    $apellido_m_pr = htmlentities(addslashes($_POST["apellido_m_pr"]));

    $id_doc_pr = htmlentities(addslashes($_POST["id_doc_pr"]));

    $parentesc_pr= htmlentities(addslashes($_POST["parentesc_pr"]));
    
    $tlf_local_pr= htmlentities(addslashes($_POST["tlf_local_pr"]));

    $tlf_cel_pr= htmlentities(addslashes($_POST["tlf_cel_pr"]));
    
    $tlf_emerg= htmlentities(addslashes($_POST["tlf_emerg"]));

    $estado_civil_pr= htmlentities(addslashes($_POST["estado_civil_pr"]));

if (isset($_POST["sexo_pr"])) {
            $sexo_pr = htmlentities(addslashes($_POST["sexo_pr"]));
    }

if (isset($_POST["si_exist_pr"])) {
            $si_exist_pr = htmlentities(addslashes($_POST["si_exist_pr"]));
    }

if (isset($_POST["nacionalidad_pr"])) {
            $nacionalidad_pr = htmlentities(addslashes($_POST["nacionalidad_pr"]));
    }


if (isset($_POST["descrip_alergias"])) {
            $descrip_alergias = htmlentities(addslashes($_POST["descrip_alergias"]));
    }


if (isset($_POST["enfer_cron"])) {
            $enfer_cron = htmlentities(addslashes($_POST["enfer_cron"]));
    }


if (isset($_POST["problem_visual"])) {
            $problem_visual = htmlentities(addslashes($_POST["problem_visual"]));
    }


if (isset($_POST["problem_audi"])) {
            $problem_audi = htmlentities(addslashes($_POST["problem_audi"]));
    }

if (isset($_POST["alergias"])) {
            $alergias = htmlentities(addslashes($_POST["alergias"]));
    }

if (isset($_POST["condic_especif"])) {
            $condic_especif = htmlentities(addslashes($_POST["condic_especif"]));
    }

if (isset($_POST["vacunas"])) {
            $vacunas = htmlentities(addslashes($_POST["vacunas"]));
    }


if (isset($_POST["medicacion"])) {
            $medicacion = htmlentities(addslashes($_POST["medicacion"]));
    }


if (isset($_POST["anex_infor"])) {
            $anex_infor = htmlentities(addslashes($_POST["anex_infor"]));
    }


if (isset($_POST["lleg_retir"])) {
            $lleg_retir = htmlentities(addslashes($_POST["lleg_retir"]));
    }

if (isset($_POST["lleg_retir_transp"])) {
            $lleg_retir_transp = htmlentities(addslashes($_POST["lleg_retir_transp"]));
    }

if (isset($_POST["hermanos"])) {
            $hermanos = htmlentities(addslashes($_POST["hermanos"]));
    }


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


// Validaccion para la persona con permiso a retirar (PR)

if (isset($_POST["si_exist_pr"])) {

$errors_pr[] = valid_ci($id_doc_pr);


    if(!is_exist_ci($id_doc_pr)) {
       $errors_pr[]='Esta cedula no esta registrada en el sistema';
        }

if (validar_datos_vacios($parentesc_pr)) {
       $errors_pr[]='El campo Parentesco no puede estar vacio';  

}


}else{

$errors_pr[] = valid_ci($id_doc_pr);




if(validar_datos_vacios_sin_espacios($nacionalidad_pr,$estado_civil_pr,$tlf_emerg,$tlf_cel_pr,$tlf_local_pr) || validar_datos_vacios($nombres_pr,$apellido_p_pr,$parentesc_pr) || !isset($_POST["sexo_pr"])){

    $errors_pr[]= "
    Se debe evitar campos vacios a exepcion del documento de identidad, el segundo nombre y apellido
  <br><br>
    <p>Los Siguientes campos no Pueden poseer espacios:</p>
    <p>
    Documento de Identidad
    <br>
    Numeros Telefonicos
    </p>";

}else{

$err_nom_apell_pr =validar_nombres_apellidos($nombres_pr,$apellido_p_pr);

if(!empty($apellido_m_pr)){
$err_nom_apell_pr = validar_nombres_apellidos($apellido_m_pr);
}

$nombres_pr=filtrar_nombres_apellidos($nombres_pr);

$apellido_m_pr=filtrar_nombres_apellidos($apellido_m_pr);

if (!is_valid_num_tlf($tlf_local_pr,$tlf_cel_pr,$tlf_emerg)) { $errors_pr[]='El numero de telefono ingresado es invalido';}

$errors_pr[] = $err_nom_apell_pr;

}

}


// Validaciones 1 parte del Form
if(validar_datos_vacios($nro_pers_viven) || !is_numeric($nro_pers_viven)){
  $errors_1[] = "Indique el numero de personas que viven con el estudiante ";
}

if (!isset($hermanos,$enfer_cron,$problem_visual,$enfer_cron,$problem_audi,$alergias,$vacunas,$condic_especif)){
  $errors_1[] = "Verfique casillas sin comprobar";  
}else{

 if ($hermanos == '1') {
if (validar_datos_vacios($descrip_herma)) {
  $errors_1[] = "Especifique cuales hermanos posee en el plantel";
}}else{
  $descrip_herma = '';
}

 if ($enfer_cron == '1') {
if (validar_datos_vacios($descrip_enfer_cron)) {
  $errors_1[] = "Especifique la enfermedad cronica";
}}else{

  $descrip_enfer_cron = '';

}

 if ($problem_visual == '1') {
if (validar_datos_vacios($descrip_problem_visual)) {
  $errors_1[] = "Especifique el problema visual";
}}else{
  $descrip_problem_visual = "";
}

 if ($problem_audi == '1') {
if (validar_datos_vacios($descrip_problem_audi)) {
  $errors_1[] = "Especifique el problema auditivo";
}}else{
  $descrip_problem_audi = '';
}

 if ($alergias == '1') {
if (validar_datos_vacios($descrip_alergias)) {
  $errors_1[] = "Especifique las alergias";
}}else{
  $descrip_alergias = '';
}


 if ($vacunas == '1') {
if (validar_datos_vacios($descrip_vacunas)) {
  $errors_1[] = "Especifique las vacunas";
}}else{
  $descrip_vacunas = '';
}


 if ($condic_especif == '1') {
if (validar_datos_vacios($descrip_condic_especific)) {
  $errors_1[] = "Especifique la condicion especifica";
}}else{
  $descrip_condic_especific = '';
}

// validaciones Parte 2 del form
 
}
if (!isset($medicacion,$anex_infor)){
  $errors_2[] = "Verfique casillas sin comprobar";
}else{

if ($medicacion == '1') {
if (validar_datos_vacios($descrip_medicacion)) {
  $errors_2[] = "Especifique la medicacion";
}}else{
  $descrip_medicacion = '';
}

}

if (!isset($lleg_retir,$lleg_retir_transp)){
  $errors_3[] = "Verfique casillas sin comprobar";
}else{

if ($lleg_retir == '1') {
if (validar_datos_vacios($descrip_lleg_retir)) {
  $errors_3[] = "Especifique la llegada y retiro del estudiante";
}}else{
  $descrip_lleg_retir = '';
}

if ($lleg_retir_transp == '1') {
if (validar_datos_vacios($desc_lleg_retir_transp)) {
 }}else{
  $desc_lleg_retir_transp = '';
}
}
    

   if (!comprobar_msjs_array($errors_pr) && !comprobar_msjs_array($errors_1) && !comprobar_msjs_array($errors_2) && !comprobar_msjs_array($errors_3)) {    
 

               foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform3'][$clave] = $valor;
}


         update_data_salud_student(
          $_SESSION['ci_escolar'],
          $_SESSION['ci_escolar'],
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

         // Registrar persona retirar
 ;

$correo_pr = '';

if (obtener_correp_prs($id_doc_pr) != FALSE) {
$correo_pr = obtener_correp_prs($id_doc_pr);
}
 actualizar_persona($nacionalidad_pr ,$id_doc_pr,$id_doc_pr,$nombres_pr,$apellido_p_pr,$apellido_m_pr,$sexo_pr,'0000-00-00','','',$tlf_cel_pr,$tlf_local_pr,$correo_pr,$estado_civil_pr,$tlf_emerg );

update_person_estudiantes($id_doc_pr,$id_doc_pr,$_SESSION['ci_escolar'],$_SESSION['ci_escolar'],'','',$parentesc_pr);

 update_person_retirar($id_doc_pr,$id_doc_pr,$_SESSION['ci_escolar'],$_SESSION['ci_escolar'],'','',$parentesc_pr);

upd_tlf_emerg($id_doc_pr,$tlf_emerg);

$errors[]= "Cambios Registrado con Exito";

}


}


 ?>

    <!--formularios-->
            <div class="container">

<!------------------------------------------- QUINTO FORMULARIO ( Pagina 2 ) [OTROS DATOS DEL ESTUDIANTE] ----------------------->

                <div class="row">
                    <div class="col-lg-12">
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">

    <?php         $sql = consulta_other_data_student()." WHERE ode.ci_escolar = :ci_escolar;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 ?>

                                  <div class="row">
                                      <div class="col-12">
                                            <h3 class="form-titulo">Otros datos del estudiante</h3>
                                      </div>
                                        <br><br><br>
                                      <div class="col-lg-12 my-2">
                                            <label for="">¿Cuantas personas viven con el estudiante?</label>
                                            <input type="number" name="nro_pers_viven" id="" placeholder="N°" value="<?php if(isset($registro['nro_pers_viven'])) echo $registro['nro_pers_viven']; ?>">
                                      </div>
                                        <br><br>
                                      <div class="col-12 my-4">
                                            <h3 class="form-titulo">Estado de salud del estudiante</h3>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Tiene hermanos estudiando en el plantel?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="hermanos" id="" value="1"
                                            <?php if(isset($registro["hermanos"])){ if($registro["hermanos"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="hermanos" id="" value="0"
                                            <?php if(isset($registro["hermanos"])){ if($registro["hermanos"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4 ">Especifique:</label>
                                            <textarea name="descrip_herma" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_herma)) echo $descrip_herma; ?></textarea>
                                      </div>

<?php } ?>


<?php         $sql = consulta_salud_student()." WHERE sd.ci_escolar = :ci_escolar;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 ?>
                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Padece o ha padecido de alguna enfermedad cronica?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="enfer_cron" id="" value="1"
                                            <?php if(isset($registro["est_croni"])){ if($registro["est_croni"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="enfer_cron" id="" value="0"
                                            <?php if(isset($registro["est_croni"])){ if($registro["est_croni"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_enfer_cron" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_enfer_cron)) echo $descrip_enfer_cron; ?></textarea>
                                      </div>
                                      
                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Presenta problemas visuales?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="problem_visual" id="" value="1"
                                            <?php if(isset($registro["est_visual"])){ if($registro["est_visual"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="problem_visual" id="" value="0"
                                            <?php if(isset($registro["est_visual"])){ if($registro["est_visual"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_problem_visual" id="" class="form-control" placeholder="Especifique"><?php if(isset($registro["desc_visual"])) echo $registro["desc_visual"]; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Presenta problemas auditivos?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="problem_audi" id="" value="1"
                                            <?php if(isset($registro["est_auditivo"])){ if($registro["est_auditivo"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="problem_audi" id="" value="0"
                                            <?php if(isset($registro["est_auditivo"])){ if($registro["est_auditivo"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_problem_audi" id="" class="form-control" placeholder="Especifique"><?php if(isset($registro["desc_auditivo"])) echo $registro["desc_auditivo"]; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Es alergico?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="alergias" id="" value="1"
                                            <?php if(isset($registro["est_alergia"])){ if($registro["est_alergia"] == '1') echo "checked";}?>>
                                            
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="alergias" id="" value="0"
                                            <?php if(isset($registro["est_alergia"])){ if($registro["est_alergia"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_alergias" id="" class="form-control" placeholder="Especifique"><?php if(isset($registro['desc_alergia'])) echo $registro['desc_alergia']; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Presenta alguna conndicion especifica?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="condic_especif" id="" value="1"
                                            <?php if(isset($registro["est_condic_esp"])){ if($registro["est_condic_esp"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="condic_especif" id="" value="0"
                                            <?php if(isset($registro["est_condic_esp"])){ if($registro["est_condic_esp"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_condic_especific" id="" class="form-control" placeholder="Especifique"><?php if(isset($registro["desc_condic_esp"])) echo $registro["desc_condic_esp"]; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Cuales vacunas ha recibido?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="vacunas" id="" value="1"
                                            <?php if(isset($registro["est_vacuna"])){ if($registro["est_vacuna"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="vacunas" id="" value="0"
                                            <?php if(isset($registro["est_vacuna"])){ if($registro["est_vacuna"] == '0') echo "checked";}?>>
                                            <br>

                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_vacunas" id="" class="form-control" placeholder="Especifique"><?php if(isset($registro['desc_vacuna'])) echo $registro['desc_vacuna']; ?></textarea>
                                        </div>
                                              
                                              <?php imprimir_msjs_no_style($errors_1); ?>
                                  </div>
                                  
                                  <br><br><br><br>


    <!---------------------------- SEXTO FORMULARIO [El niño recibe actualmente atencion por] --------------------------------------->
                
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">El niño recibe actualmente atención por:</h3>
                                        </div>
                                         <br><br><br><br>
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Psicopedagogia</label>
                                            <input type="text" name="psicopedag" id="" placeholder="Psicopedagogia" name="psicopedag"class="form-control" value="<?php if(isset($registro['desc_psicopeda'])) echo $registro['desc_psicopeda']; ?>">
                                        </div>
                                          
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Terapia de lenguaje</label>
                                            <input type="text" name="ter_lenguaj" id="" placeholder="Terapia de lenguaje" name="ter_lenguaj" class="form-control" value="<?php if(isset($registro['desc_ter_lenguaje'])) echo $registro['desc_ter_lenguaje']; ?>">
                                        </div>
                                          
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Psicologo</label>
                                            <input type="text" name="psicologo" id="" placeholder="Psicologo" class="form-control " value="<?php if(isset($registro['desc_psicolo'])) echo $registro['desc_psicolo']; ?>">
                                        </div>
                                          
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Otras</label>
                                            <input type="text" name="otras" id="" placeholder="Otras" class="form-control " value="<?php if(isset($registro['otras_condic'])) echo $registro['otras_condic']; ?>">
                                        </div>
                                          
                                        <div class="col-lg-12 my-4">
                                                <label for="" class="">Especifique:</label>
                                                <textarea name="especifi_otras" id="" placeholder="Especifique" class="form-control mx-2"><?php if(isset($registro['desc_otras'])) echo $registro['desc_otras']; ?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                                <p for="" class="">Tiene medicación:</p>
                                                <label for="" class="radio-inline mx-1">Si:</label>
                                                <input type="radio" name="medicacion" id="" value="1"
                                                <?php if(isset($registro["est_medicacion"])){ if($registro["est_medicacion"] == '1') echo "checked";}?>>
                                                <label for="" class="radio-inline mx-1">No:</label>
                                                <input type="radio" name="medicacion" id="" value="0"
                                                <?php if(isset($registro["est_medicacion"])){ if($registro["est_medicacion"] == '0') echo "checked";}?>>
                                                <div>
                                                <label for="" class="radio-inline mx-1">¿Cual?</label>
                                                <input type="text" name="descrip_medicacion" id="" placeholder="¿Cual?" class="form-control "
                                                value="<?php if(isset($registro["desc_medicacion"])) echo $registro["desc_medicacion"]; ?>">
                                                </div>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                                <p for="" class="">Anexa informe:</p>
                                                <label for="" class="">Si:</label>
                                                <input type="radio" name="anex_infor" id="" value="1"
                                                <?php if(isset($registro["anex_inform"])){ if($registro["anex_inform"] == '1') echo "checked";}?>>
                                                <label for="" class="">No:</label>
                                                <input type="radio" name="anex_infor" id="" value="0"
                                                <?php if(isset($registro["anex_inform"])){ if($registro["anex_inform"] == '0') echo "checked";}?>>
                                        </div>
                                                <?php imprimir_msjs_no_style($errors_2); ?>

                                    </div>

                                    <br><br><br><br>

                                  <?php } ?>

    <?php         $sql = consulta_movilidad_student()." WHERE mv.ci_escolar = :ci_escolar;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
?>
<!------------------------------ SEPTIMO FORMULARIO [ Acceso y restiro de la Institucion ] ------------------------------>
                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Acceso y retiro del estudiante de la institución</h3>
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <p for="" class="my-2">¿El estudiante llega y se retira de la escuela solo?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="lleg_retir" id="" value="1"
                                            <?php if(isset($registro["est_ret"])){ if($registro["est_ret"] == '1') echo "checked";}?> >
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="lleg_retir" id="" value="0"
                                            <?php if(isset($registro["est_ret"])){ if($registro["est_ret"] == '0') echo "checked";}?> >
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_lleg_retir" id="" class="form-control" placeholder="¿Acompañado por?"><?php if(isset($registro["desc_ret"])) echo $registro["desc_ret"]; ?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <p for="" class="my-2">¿El estudiante llega y se retira en transporte escolar?</p>
                                            <label for="" class=" ">Si:</label>
                                            <input type="radio" name="lleg_retir_transp" id="" value="1"
                                            <?php if(isset($registro["est_tranport"])){ if($registro["est_tranport"] == '1') echo "checked";}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="lleg_retir_transp" id="" value="0"
                                            <?php if(isset($registro["est_tranport"])){ if($registro["est_tranport"] == '0') echo "checked";}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="desc_lleg_retir_transp" id="" class="form-control" placeholder="¿Cual?"><?php if(isset($registro["desc_tranport"])) echo $registro["desc_tranport"]; ?></textarea>
                                        </div>
                                    </div>
                            
                                            <?php imprimir_msjs_no_style($errors_3); ?>


                                    <br><br><br><br>

<?php } ?>

    <?php         $sql = consulta_pers_ret_student()." WHERE prt.ci_escolar = :ci_escolar AND prsd.ci_escolar = :ci_escolar ORDER BY prsd.id_pers_est DESC LIMIT 1;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
?>

    <!--------------------------- OCTAVO FORMULARIO [ Persona autorizada a retirar el estudiante de la institucion ] -->
                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Personas autorizada a retirar el estudiante de la institución</h3>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-lg-6 my-2">
                                            <label for="" class="">Nombres:</label>                                           
                                            <input type="text" name="nombres_pr" id="" placeholder="Nombres" class="form-control" value="<?php if(isset($registro["nombre"])) echo $registro["nombre"]; ?>" >
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Apellido Paterno:</label> 
                                            <input type="text" name="apellido_p_pr" id="" placeholder="Apellido Paterno" class="form-control" value="<?php if(isset($registro["apellido_p"])) echo $registro["apellido_p"]; ?>">
                                        </div>

                                        <div class="col-lg-6 my-3">
                                            <label for="">Apellido Materno:</label> 
                                            <input type="text" name="apellido_m_pr" id="" placeholder="Apellido Materno" class="form-control" value="<?php if(isset($registro["apellido_m"])) echo $registro["apellido_m"]; ?>">
                                        </div>
                                            
                                        <div class="col-lg-2 my-5">
                                          <select name="nacionalidad_pr" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($registro["id_nacionalidad"])) if($registro["id_nacionalidad"] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($registro["id_nacionalidad"])) if($registro["id_nacionalidad"] == '2') echo 'selected';?> value="2">E</option>
                                          </select>   
                                        </div>
                                        
                                        <div class="col-lg-4 my-3">
                                            <label class="form-inline">Cedula:</label>
                                            <input type="text" name="id_doc_pr" id="" placeholder="Cedula de identidad" class="form-control"  maxlength="8" value="<?php if(isset($registro['id_doc'])) echo $registro['id_doc']; ?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_pr" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($registro["id_estado_civil"])) if($registro["id_estado_civil"] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($registro["id_estado_civil"])) if($registro["id_estado_civil"] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($registro["id_estado_civil"])) if($registro["id_estado_civil"] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($registro["id_estado_civil"])) if($registro["id_estado_civil"] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                          <p for="" class="">Sexo:</p>
                                          <label for="" class="">Masculino</label>
                                            <input type="radio" <?php if(isset($registro["id_sexo"])){ if($registro["id_sexo"] == '1') echo "checked";}?> name="sexo_pr" value="1" id="">
                                            <br>
                                          <label for="sexo_pr" class="">Femenino</label>
                                          <input type="radio" name="sexo_pr" <?php if(isset($registro["id_sexo"])){ if($registro["id_sexo"] == '2') echo "checked";}?> value="2" id="">

                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="" class="">Parentesco</label>
                                            <input type="text" name="parentesc_pr" id="" value="<?php if(isset($registro["parentesco"])) echo $registro["parentesco"]; ?>" placeholder="Parentesco" class="form-control">
                                        </div>
                                        
                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_pr" id="" placeholder="Telefono local" name="tlf_local_pr" class="form-control"
                                            value="<?php if(isset($registro["tlf_local"])) echo $registro["tlf_local"]; ?>"
                                            >
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono Celular</label>
                                            <input type="number" name="tlf_cel_pr" id="" placeholder="Telefono celular" 
                                            value="<?php if(isset($registro["tlf_cel"])) echo $registro["tlf_cel"]; ?>"
                                            class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de Emergencia</label>
                                            <input type="number" name="tlf_emerg" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($registro["tlf_emergecia"])) echo $registro["tlf_emergecia"]; ?>">
                                        </div>

                       
                                     </div>   
                       
                                        <?php imprimir_msjs_no_style($errors_pr); ?>

                                    
                                        <!-- <a href="reg-estudiante-2.php" class="btn btn-primary col-lg-2 ">VOLVER</a> -->
<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->                                        
                                        <button type='submit' class="btn btn-primary col-lg-9"value="otros_datos" name ='otros_datos'>Actualizar</button>
                                        <?php imprimir_msjs_no_style($errors); ?>


                                </form> 

                            </div>
                        </div> <?php } ?>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <!--jquery, boostrap.min.js, bundle.min.js-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
</body>
</html>