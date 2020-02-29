
<?php require '../../../includes/init_system_reg.php'; ?>

<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>

<?php 
    session_start();

 valid_inicio_sesion('2');

if (isset($_SESSION['sesionform2'])) {
if (comprobar_msjs_array($_SESSION['sesionform2'])) {
extract($_SESSION['sesionform2']);
}
}

if (!isset($_SESSION['sesionform1'])) {
header('location:reg-estudiante-1.php');
}

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

    $_POST["is_represent_m"] = '';

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
}else{$no_register_m=$_POST['no_register_m'];
}
}

if (isset($_POST['no_register_p']) && isset($_POST['si_exist_p']) ) {
    $errors_p[] = "Selecione si se registrara o ya esta registrado, solo una opcion";
}else{

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

    $_POST["is_represent_p"] = '';

if (isset($_POST["is_represent_p"])) {
    $is_represent_p = htmlentities(addslashes($_POST["is_represent_p"]));
}

    $si_exist_m = 0;


if (empty($_POST['no_register_p'])) {

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
}else{$no_register_p=$_POST['no_register_p'];
}
}



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
$_POST["sexo_r"] = '';
}

if (isset($_POST["si_exist_r"])) {

if (validar_datos_vacios($id_doc_r) || !isset($convivencia_r)) {
           $errors_r[]='El documento de identidad no puede estar vacio y asegurese de indicar si vive con el estudiante';  

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
}

if (!empty($is_represent_m) && !empty($is_represent_p) ) {

    $errors_m[] = "Solo puede haber un representante";
    $errors_p[] = "Solo puede haber un representante";

}
 


    if (!comprobar_msjs_array($errors_r) && !comprobar_msjs_array($errors_m) && !comprobar_msjs_array($errors_p)) {    


        foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform2'][$clave] = $valor;

}

$errors_r[]= "<a class='btn btn-primary col-lg-9' href='reg-estudiante-3.php'>
    Confirmar
</a>";


}

}

 ?>
 
    <!--formularios-->
            <div class="container">

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos de la Madre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_m)) echo $apellido_p_m; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_m)) echo $apellido_m_m; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_m" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_m)) echo $nombre1_m; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_m" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_m)) echo $nombre2_m; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_m" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_m)) if($nacionalidad_m == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_m)) if($nacionalidad_m == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_m" value="<?php if(isset($id_doc_m)) echo $id_doc_m; ?>" >     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_m" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_m)) echo $ocupacion_m; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="fecha_nac_m" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_m)) echo $fecha_nac_m; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_m" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_m" id=""  ><?php if(isset($lugar_nac_m)) echo $lugar_nac_m;?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_m"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($direcc_hab_m)) echo $direcc_hab_m;?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_m" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_m)) echo $tlf_local_m; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_m" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_m)) echo $tlf_cel_m; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_m" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_m)) echo $correo_m; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_m" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_m)) echo $prof_ofi_m; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_m"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_m)) echo $lug_trab_m;?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_m"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_m)) echo $direcc_trab_m;?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_m" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_m)) echo $tlf_ofic_m;?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(isset($is_represent_m)){ if($is_represent_m == '1') echo "checked";}?> name="is_represent_m" value="1" id="" class="col-3">
                                        </div>


                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_m" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_m"])){ if($_POST["convivencia_m"] == '1') echo "checked";}else{if(isset($convivencia_m)){ if($convivencia_m == '1') echo "checked";}}
                                        ?> name="convivencia_m" value="1" id="">

                                        <label for="convivencia_m" class="">No</label>

                                        <input type="radio" name="convivencia_m" <?php if(isset($_POST["convivencia_m"])){ if($_POST["convivencia_m"] == '0') echo "checked";}else{if(isset($convivencia_m)){ if($convivencia_m == '0') echo "checked";}}
                                        ?> value="2" id="">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label>Seleccione si no se registrara:</label>
                                        <input type="checkbox" <?php if(isset($_POST["no_register_m"])){ if($_POST["no_register_m"] == '1') echo "checked";}else{if(isset($no_register_m)){ if($no_register_m == '1') echo "checked";}}?> name="no_register_m" value="1" id="">
                                        </div>
                                    

                                        <div class="col-lg-6 ">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_m"])){ if($_POST["si_exist_m"] == '1') echo "checked";}else{if(isset($si_exist_m)){ if($si_exist_m == '1') echo "checked";}}?> name="si_exist_m" value="1" id="">
                                        </div>
                                    </div>
                                        <?php imprimir_msjs_no_style($errors_m); ?>
                             


<!------------------------------- TERCER FORMULARIO [ DATOS DEL PADRE ] ------------------------------------------------>

                                     <br><br><br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Padre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_p)) echo $apellido_p_p; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_p)) echo $apellido_m_p; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_p" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_p)) echo $nombre1_p; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_p" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_p)) echo $nombre2_p; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-2 my-3">
                                            <label></label>
                                            <select name="nacionalidad_p" id="cedula" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($nacionalidad_p)) if($nacionalidad_p == '1') echo 'selected';?> value="1">V</option>
                                                <option <?php if(isset($nacionalidad_p)) if($nacionalidad_p == '2') echo 'selected';?> value="2">E</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 my-2">
                                            <label class="form-inline">Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_p" value="<?php if(isset($id_doc_p)) echo $id_doc_p; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_p" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_p)) echo $ocupacion_p;?>">
                                        </div>
                                    </div> 
                                

                                    <div class="row my-4">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="fecha_nac_p" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_p)) echo $fecha_nac_p; ?>">
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_p" id="cedula" class="form-control "  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                         <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_p" id="" ><?php if(isset($lugar_nac_p)) echo $lugar_nac_p;?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_p"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php if(isset($direcc_hab_p)) echo $direcc_hab_p;?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_p" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_p)) echo $tlf_local_p; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_p" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_p)) echo $tlf_cel_p; ?>" >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_p" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_p)) echo $correo_p; ?>">
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_p" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_p)) echo $prof_ofi_p; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_p"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_p)) echo $lug_trab_p;?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_p"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_p)) echo $direcc_trab_p;?></textarea>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_p" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_p)) echo $tlf_ofic_p;?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                            <input type="checkbox" <?php if(isset($is_represent_p)){ if($is_represent_p == '1') echo "checked";}?> name="is_represent_p" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_p" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_p"])){ if($_POST["convivencia_p"] == '1') echo "checked";}else{if(isset($convivencia_p)){ if($convivencia_p == '1') echo "checked";}}
                                        ?> name="convivencia_p" value="1" id="">

                                        <label for="convivencia_p" class="">No</label>

                                        <input type="radio" name="convivencia_p" <?php if(isset($_POST["convivencia_p"])){ if($_POST["convivencia_p"] == '0') echo "checked";}else{if(isset($convivencia_p)){ if($convivencia_p == '0') echo "checked";}}
                                        ?> value="0" id="">
                                        </div>
                                    </div>

                                    <div class="row col-12">
                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si no se registrara:</label>
                                            <input type="checkbox" <?php if(isset($_POST["no_register_p"])){ if($_POST["no_register_p"] == '1') echo "checked";}else{if(isset($no_register_p)){ if($no_register_p == '1') echo "checked";}}?> name="no_register_p" value="1" id="">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_p"])){ if($_POST["si_exist_p"] == '1') echo "checked";}else{if(isset($si_exist_p)){ if($si_exist_p == '1') echo "checked";}}?> name="si_exist_p" value="1" id="">
                                        </div>
                                    </div>
                                        
                                    <?php imprimir_msjs_no_style($errors_p); ?>

                             

<!------------------------------- CUARTO FORMULARIO [ REPRESENTANTE LEGAL ] ------------------------------------------------>

                                        <br><br><br><br>    
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Representante</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_r" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_r)) echo $apellido_p_r; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_r" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_r)) echo $apellido_m_r; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_r" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_r)) echo $nombre1_r; ?>">
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_r" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_r)) echo $nombre2_r; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-3 my-3">
                                            <label></label>
                                        <select name="nacionalidad_r" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_r)) if($nacionalidad_r == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_r)) if($nacionalidad_r == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <label>Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_r" value="<?php if(isset($id_doc_r)) echo $id_doc_r; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <p for="" class="">Sexo:</p>

                                            <label for="" class="">Masculino:</label>
                                            <input type="radio" <?php if(isset($_POST["sexo_r"])){ if($_POST["sexo_r"] == '1') echo "checked";}else{if(isset($sexo_r)){ if($sexo_r == '1') echo "checked";}};
                                            ?> name="sexo_r" value="1" id="" >

                                            <label for="sexo_r" class="">Femenino:</label>

                                            <input type="radio" name="sexo_r" <?php if(isset($_POST["sexo_r"])){ if($_POST["sexo_r"] == '2') echo "checked";}else{if(isset($sexo_r)){ if($sexo_r == '2') echo "checked";}}
                                            ?> value="2" id="" >
                                        </div>                                        
                                    </div> 
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_r" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_r)) echo $ocupacion_r;?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="fecha_nac_r" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_r)) echo $fecha_nac_r; ?>">
                                        </div>
    

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_r" id="cedula" class="form-control"  >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>
                                    </div>
    
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_r" id="" ><?php if(isset($lugar_nac_r)) echo $lugar_nac_r;?></textarea>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_r"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php if(isset($direcc_hab_r)) echo $direcc_hab_r;?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_r" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_r)) echo $tlf_local_r; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_r" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_r)) echo $tlf_cel_r; ?>" >    
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_r" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_r)) echo $correo_r; ?>">
                                        </div>
                                        
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6 my-4">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_r" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_r)) echo $prof_ofi_r; ?>">
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_r"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_r)) echo $lug_trab_r;?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_r"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_r)) echo $direcc_trab_r;?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_r" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_r)) echo $tlf_ofic_r;?>">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 my-2">
                                            <label>Parentesco:</label>
                                            <input type="text" name="parentesco_r" id="" placeholder="Parentesco" class="form-control" value="<?php if(isset($parentesco_r)) echo $parentesco_r;?>">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_r" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_r"])){ if($_POST["convivencia_r"] == '1') echo "checked";}else{if(isset($convivencia_r)){ if($convivencia_r == '1') echo "checked";}}
                                        ?> name="convivencia_r" value="1" id="">

                                        <label for="convivencia_r" class="">No</label>

                                        <input type="radio" name="convivencia_r" <?php if(isset($_POST["convivencia_r"])){ if($_POST["convivencia_r"] == '0') echo "checked";}else{if(isset($convivencia_r)){ if($convivencia_r == '0') echo "checked";}}
                                        ?> value="2" id="">
                                        </div>
                                    </div>

                                    

                                    <div class="row ">
                                        <div class="col-lg-12 my-2">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_r"])){ if($_POST["si_exist_r"] == '1') echo "checked";}else{if(isset($si_exist_r)){ if($si_exist_r == '1') echo "checked";}}?> name="si_exist_r" value="1" id="">
                                        </div>
                                    </div>

                                    <?php imprimir_msjs_no_style($errors_r); ?>

                                        <a href="reg-estudiante-1.php" class="btn btn-primary  col-lg-2">Volver</a>
                                        
                                        <button type='submit' class="btn btn-primary col-lg-9" value="datos_student" name='datos_pers_estd'>Continuar</button>
                                        
                                        
                                    


                         
                            </form>
                        
                        </div>
                </div>

<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <?php require '../../../includes/footer_reg_est.php'; ?>
