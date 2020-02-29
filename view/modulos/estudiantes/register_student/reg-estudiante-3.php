
<?php require '../../../includes/init_system_reg.php'; ?>

<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>

<?php 
$confirmar= array();

$errors_1= array();

$errors_2= array();

$errors_3= array();

$errors_pr= array();

    session_start();

 valid_inicio_sesion('2');


if (isset($_SESSION['sesionform3'])) {
if (comprobar_msjs_array($_SESSION['sesionform3'])) {
extract($_SESSION['sesionform3']);
}
}

if (!isset($_SESSION['sesionform2'])) {
header('location:reg-estudiante-2.php');
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

if (validar_datos_vacios($parentesc_pr,$tlf_emerg)) {
       $errors_pr[]='El campo Parentesco y Telefono de Emergencia no puede estar vacio';  

}


}else{

$errors_pr[] = valid_ci($id_doc_pr);


    if(is_exist_ci($id_doc_pr)) {
       $errors_pr[]='La cedula ya esta registrada en el sistema';
        }


if(validar_datos_vacios_sin_espacios($nacionalidad_pr,$estado_civil_pr,$tlf_emerg,$tlf_cel_pr,$tlf_local_pr) || validar_datos_vacios($nombres_pr,$apellido_p_pr,$parentesc_pr) || !isset($_POST["sexo_pr"])){

    $errors_pr[]= "
    Se debe evitar campos vacios a exepcion del segundo nombre y apellido
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
  $errors_3[] = "Especifique la llegada y retiro en transporte escolar";
}}else{
  $desc_lleg_retir_transp = '';
}
}
    

   if (!comprobar_msjs_array($errors_pr) && !comprobar_msjs_array($errors_1) && !comprobar_msjs_array($errors_2) && !comprobar_msjs_array($errors_3)) {    
 

               foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform3'][$clave] = $valor;
}

$confirmar[]= "<a class='btn btn-primary col-lg-9' href='reg-estudiante-4.php'>
    Confirmar
</a>";

}


}


 ?>

    <!--formularios-->
            <div class="container">

<!------------------------------------------- QUINTO FORMULARIO ( Pagina 2 ) [OTROS DATOS DEL ESTUDIANTE] ----------------------->

                <div class="row">
                    <div class="col-lg-12">
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">

    
                                  <div class="row">
                                      <div class="col-12">
                                            <h3 class="form-titulo">Otros datos del estudiante</h3>
                                      </div>
                                        <br><br><br>
                                      <div class="col-lg-12 my-2">
                                            <label for="">¿Cuantas personas viven con el estudiante?</label>
                                            <input type="number" name="nro_pers_viven" id="" placeholder="N°" value="<?php if(isset($nro_pers_viven)) echo $nro_pers_viven; ?>">
                                      </div>
                                        <br><br>
                                      <div class="col-12 my-4">
                                            <h3 class="form-titulo">Estado de salud del estudiante</h3>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Tiene hermanos estudiando en el plantel?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="hermanos" id="" value="1"
                                            <?php if(isset($_POST["hermanos"])){ if($_POST["hermanos"] == '1') echo "checked";}else{if(isset($hermanos)){ if($hermanos == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="hermanos" id="" value="0"
                                            <?php if(isset($_POST["hermanos"])){ if($_POST["hermanos"] == '0') echo "checked";}else{if(isset($hermanos)){ if($hermanos == '0') echo "checked";}}?>>
                                            <br>
                                            <label for="" class="my-4 ">Especifique:</label>
                                            <textarea name="descrip_herma" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_herma)) echo $descrip_herma; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Padece o ha padecido de alguna enfermedad cronica?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="enfer_cron" id="" value="1"
                                            <?php if(isset($_POST["enfer_cron"])){ if($_POST["enfer_cron"] == '1') echo "checked";}else{if(isset($enfer_cron)){ if($enfer_cron == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="enfer_cron" id="" value="0"
                                            <?php if(isset($_POST["enfer_cron"])){ if($_POST["enfer_cron"] == '0') echo "checked";}else{if(isset($enfer_cron)){ if($enfer_cron == '0') echo "checked";}}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_enfer_cron" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_enfer_cron)) echo $descrip_enfer_cron; ?></textarea>
                                      </div>
                                      
                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Presenta problemas visuales?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="problem_visual" id="" value="1"
                                            <?php if(isset($_POST["problem_visual"])){ if($_POST["problem_visual"] == '1') echo "checked";}else{if(isset($problem_visual)){ if($problem_visual == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="problem_visual" id="" value="0"
                                            <?php if(isset($_POST["problem_visual"])){ if($_POST["problem_visual"] == '0') echo "checked";}else{if(isset($problem_visual)){ if($problem_visual == '0') echo "checked";}}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_problem_visual" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_problem_visual)) echo $descrip_problem_visual; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Presenta problemas auditivos?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="problem_audi" id="" value="1"
                                            <?php if(isset($_POST["problem_audi"])){ if($_POST["problem_audi"] == '1') echo "checked";}else{if(isset($problem_audi)){ if($problem_audi == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="problem_audi" id="" value="0"
                                            <?php if(isset($_POST["problem_audi"])){ if($_POST["problem_audi"] == '0') echo "checked";}else{if(isset($problem_audi)){ if($problem_audi == '0') echo "checked";}}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_problem_audi" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_problem_audi)) echo $descrip_problem_audi; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Es alergico?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="alergias" id="" value="1"
                                            <?php if(isset($_POST["alergias"])){ if($_POST["alergias"] == '1') echo "checked";}else{if(isset($alergias)){ if($alergias == '1') echo "checked";}};?>>
                                            
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="alergias" id="" value="0"
                                            <?php if(isset($_POST["alergias"])){ if($_POST["alergias"] == '0') echo "checked";}else{if(isset($alergias)){ if($alergias == '0') echo "checked";}};?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_alergias" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_alergias)) echo $descrip_alergias; ?></textarea>
                                      </div>

                                      <div class="col-lg-6 my-4">
                                            <p for="" class="">¿Presenta alguna conndicion especifica?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="condic_especif" id="" value="1"
                                            <?php if(isset($_POST["condic_especif"])){ if($_POST["condic_especif"] == '1') echo "checked";}else{if(isset($condic_especif)){ if($condic_especif == '1') echo "checked";}};?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="condic_especif" id="" value="0"
                                            <?php if(isset($_POST["condic_especif"])){ if($_POST["condic_especif"] == '0') echo "checked";}else{if(isset($condic_especif)){ if($condic_especif == '0') echo "checked";}};?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_condic_especific" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_condic_especific)) echo $descrip_condic_especific; ?></textarea>
                                      </div>

                                      <div class="col-lg-12 my-4">
                                            <p for="" class="">¿Cuales vacunas ha recibido?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="vacunas" id="" value="1"
                                            <?php if(isset($_POST["vacunas"])){ if($_POST["vacunas"] == '1') echo "checked";}else{if(isset($vacunas)){ if($vacunas == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="vacunas" id="" value="0"
                                            <?php if(isset($_POST["vacunas"])){ if($_POST["vacunas"] == '0') echo "checked";}else{if(isset($vacunas)){ if($vacunas == '0') echo "checked";}}?>>
                                            <br>

                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_vacunas" id="" class="form-control" placeholder="Especifique"><?php if(isset($descrip_vacunas)) echo $descrip_vacunas; ?></textarea>
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
                                            <input type="text" name="psicopedag" id="" placeholder="Psicopedagogia" name="psicopedag"class="form-control" value="<?php if(isset($psicopedag)) echo $psicopedag; ?>">
                                        </div>
                                          
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Terapia de lenguaje</label>
                                            <input type="text" name="ter_lenguaj" id="" placeholder="Terapia de lenguaje" name="ter_lenguaj" class="form-control" value="<?php if(isset($ter_lenguaj)) echo $ter_lenguaj; ?>">
                                        </div>
                                          
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Psicologo</label>
                                            <input type="text" name="psicologo" id="" placeholder="Psicologo" class="form-control " value="<?php if(isset($psicologo)) echo $psicologo; ?>">
                                        </div>
                                          
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Otras</label>
                                            <input type="text" name="otras" id="" placeholder="Otras" class="form-control " value="<?php if(isset($otras)) echo $otras; ?>">
                                        </div>
                                          
                                        <div class="col-lg-12 my-4">
                                                <label for="" class="">Especifique:</label>
                                                <textarea name="especifi_otras" id="" placeholder="Especifique" class="form-control mx-2"><?php if(isset($especifi_otras)) echo $especifi_otras; ?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                                <p for="" class="">Tiene medicación:</p>
                                                <label for="" class="radio-inline mx-1">Si:</label>
                                                <input type="radio" name="medicacion" id="" value="1"
                                                <?php if(isset($_POST["medicacion"])){ if($_POST["medicacion"] == '1') echo "checked";}else{if(isset($medicacion)){ if($medicacion == '1') echo "checked";}}?>>
                                                <label for="" class="radio-inline mx-1">No:</label>
                                                <input type="radio" name="medicacion" id="" value="0"
                                                <?php if(isset($_POST["medicacion"])){ if($_POST["medicacion"] == '0') echo "checked";}else{if(isset($medicacion)){ if($medicacion == '0') echo "checked";}}?>>
                                                <div>
                                                <label for="" class="radio-inline mx-1">¿Cual?</label>
                                                <input type="text" name="descrip_medicacion" id="" placeholder="¿Cual?" class="form-control "
                                                value="<?php if(isset($descrip_medicacion)) echo $descrip_medicacion; ?>">
                                                </div>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                                <p for="" class="">Anexa informe:</p>
                                                <label for="" class="">Si:</label>
                                                <input type="radio" name="anex_infor" id="" value="1"
                                                <?php if(isset($_POST["anex_infor"])){ if($_POST["anex_infor"] == '1') echo "checked";}else{if(isset($anex_infor)){ if($anex_infor == '1') echo "checked";}}?>>
                                                <label for="" class="">No:</label>
                                                <input type="radio" name="anex_infor" id="" value="0"
                                                <?php if(isset($_POST["anex_infor"])){ if($_POST["anex_infor"] == '0') echo "checked";}else{if(isset($anex_infor)){ if($anex_infor == '0') echo "checked";}}?>>
                                        </div>
                                                <?php imprimir_msjs_no_style($errors_2); ?>

                                    </div>

                                    <br><br><br><br>

<!------------------------------ SEPTIMO FORMULARIO [ Acceso y restiro de la Institucion ] ------------------------------>
                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Acceso y retiro del estudiante de la institución</h3>
                                        </div>


                                        <div class="col-lg-6 my-2">
                                            <p for="" class="my-2">¿El estudiante llega y se retira de la escuela solo?</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="lleg_retir" id="" value="1"
                                            <?php if(isset($_POST["lleg_retir"])){ if($_POST["lleg_retir"] == '1') echo "checked";}else{if(isset($lleg_retir)){ if($lleg_retir == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="lleg_retir" id="" value="0"
                                            <?php if(isset($_POST["lleg_retir"])){ if($_POST["lleg_retir"] == '0') echo "checked";}else{if(isset($lleg_retir)){ if($lleg_retir == '0') echo "checked";}}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="descrip_lleg_retir" id="" class="form-control" placeholder="¿Acompañado por?"><?php if(isset($descrip_lleg_retir)) echo $descrip_lleg_retir; ?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <p for="" class="my-2">¿El estudiante llega y se retira en transporte escolar?</p>
                                            <label for="" class=" ">Si:</label>
                                            <input type="radio" name="lleg_retir_transp" id="" value="1"
                                            <?php if(isset($_POST["lleg_retir_transp"])){ if($_POST["lleg_retir_transp"] == '1') echo "checked";}else{if(isset($lleg_retir_transp)){ if($lleg_retir_transp == '1') echo "checked";}}?>>
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="lleg_retir_transp" id="" value="0"
                                            <?php if(isset($_POST["lleg_retir_transp"])){ if($_POST["lleg_retir_transp"] == '0') echo "checked";}else{if(isset($lleg_retir_transp)){ if($lleg_retir_transp == '0') echo "checked";}}?>>
                                            <br>
                                            <label for="" class="my-4">Especifique:</label>
                                            <textarea name="desc_lleg_retir_transp" id="" class="form-control" placeholder="¿Cual?"><?php if(isset($desc_lleg_retir_transp)) echo $desc_lleg_retir_transp; ?></textarea>
                                        </div>
                                    </div>
                            
                                            <?php imprimir_msjs_no_style($errors_3); ?>


                                    <br><br><br><br>

    <!--------------------------- OCTAVO FORMULARIO [ Persona autorizada a retirar el estudiante de la institucion ] -->
                
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Personas autorizada a retirar el estudiante de la institución</h3>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-lg-6 my-2">
                                            <label for="" class="">Nombres:</label>                                           
                                            <input type="text" name="nombres_pr" id="" placeholder="Nombres" class="form-control" value="<?php if(isset($nombres_pr)) echo $nombres_pr; ?>" >
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Apellido Paterno:</label> 
                                            <input type="text" name="apellido_p_pr" id="" placeholder="Apellido Paterno" class="form-control" value="<?php if(isset($apellido_p_pr)) echo $apellido_p_pr; ?>">
                                        </div>

                                        <div class="col-lg-6 my-3">
                                            <label for="">Apellido Materno:</label> 
                                            <input type="text" name="apellido_m_pr" id="" placeholder="Apellido Materno" class="form-control" value="<?php if(isset($apellido_m_pr)) echo $apellido_m_pr; ?>">
                                        </div>
                                            
                                        <div class="col-lg-2 my-5">
                                          <select name="nacionalidad_pr" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_pr)) if($nacionalidad_pr == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_pr)) if($nacionalidad_pr == '2') echo 'selected';?> value="2">E</option>
                                          </select>   
                                        </div>
                                        
                                        <div class="col-lg-4 my-3">
                                            <label class="form-inline">Cedula:</label>
                                            <input type="text" name="id_doc_pr" id="" placeholder="Cedula de identidad" class="form-control"  maxlength="8" value="<?php if(isset($id_doc_pr)) echo $id_doc_pr; ?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_pr" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                          <p for="" class="">Sexo:</p>
                                          <label for="" class="">Masculino</label>
                                          <input type="radio" <?php if(isset($_POST["sexo_pr"])){ if($_POST["sexo_pr"] == '1') echo "checked";}else{if(isset($sexo_pr)){ if($sexo_pr == '1') echo "checked";}}?> name="sexo_pr" value="1" id="">
                                            <br>
                                          <label for="sexo_pr" class="">Femenino</label>
                                          <input type="radio" name="sexo_pr" <?php if(isset($_POST["sexo_pr"])){ if($_POST["sexo_pr"] == '2') echo "checked";}else{if(isset($sexo_pr)){ if($sexo_pr == '2') echo "checked";}}?> value="2" id="">

                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="" class="">Parentesco</label>
                                            <input type="text" name="parentesc_pr" id="" value="<?php if(isset($parentesc_pr)) echo $parentesc_pr; ?>" placeholder="Parentesco" class="form-control">
                                        </div>
                                        
                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_pr" id="" placeholder="Telefono local" name="tlf_local_pr" class="form-control"
                                            value="<?php if(isset($tlf_local_pr)) echo $tlf_local_pr; ?>"
                                            >
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono Celular</label>
                                            <input type="number" name="tlf_cel_pr" id="" placeholder="Telefono celular" 
                                            value="<?php if(isset($tlf_cel_pr)) echo $tlf_cel_pr; ?>"
                                            class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de Emergencia</label>
                                            <input type="number" name="tlf_emerg" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_emerg)) echo $tlf_emerg; ?>">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_pr"])){ if($_POST["si_exist_pr"] == '1') echo "checked";}else{if(isset($si_exist_pr)){ if($si_exist_pr == '1') echo "checked";}}?> name="si_exist_pr" value="1" id="">
                                        </div>
                       

                                        <?php imprimir_msjs_no_style($errors_pr); ?>
                                     </div>   
                       

                                    
                                        <a href="reg-estudiante-2.php" class="btn btn-primary col-lg-2 ">VOLVER</a>
<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->                                        
                                        <button type='submit' class="btn btn-primary col-lg-9"value="otros_datos" name ='otros_datos'>CONTINUAR</button>

                                        <?php imprimir_msjs_no_style($confirmar); ?>


                                </form>   
                            </div>
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

 <?php require '../../../includes/footer_reg_est.php'; ?>