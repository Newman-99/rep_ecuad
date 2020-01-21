<?php require '../../../includes/init_system_reg.php'; ?>

<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; 

    session_start();

 valid_inicio_sesion('2');

if (isset($_SESSION['sesionform1'])) {
if (comprobar_msjs_array($_SESSION['sesionform1'])) {
extract($_SESSION['sesionform1']);
}
}

$errors = array();
?>

<?php 

if (!empty($_POST['datos_student'])) {

    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $id_doc_estd = htmlentities(addslashes($_POST["id_doc_estd"]));
    $nombre1 = htmlentities(addslashes($_POST["nombre1"]));
    $nombre2 = htmlentities(addslashes($_POST["nombre2"]));
    $apellido_p = htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_m = htmlentities(addslashes($_POST["apellido_m"]));
    // $sexo = htmlentities(addslashes($_POST["sexo"]));        
    $fecha_nac = htmlentities(addslashes($_POST["fecha_nac"]));    
    $lugar_nac = htmlentities(addslashes($_POST["lugar_nac"]));    
    $direcc_hab = htmlentities(addslashes($_POST["direcc_hab"]));    
//    $canaima = htmlentities(addslashes($_POST["canaima"]));    
  $contrato_canaima = htmlentities(addslashes($_POST["contrato_canaima"]));    
 //   $colecc_bicent = htmlentities(addslashes($_POST["colecc_bicent"]));    

if(validar_datos_vacios_sin_espacios($nacionalidad) || validar_datos_vacios($nombre1,$apellido_p,$lugar_nac,$direcc_hab) || !isset($_POST["canaima"],$_POST["colecc_bicent"],$_POST["sexo"])){
    $errors[]= "
    Se debe evitar campos vacios a exepcion del documento de identidad, el segundo nombre y apellido
<br><br>
    
    Los Siguientes campos no Pueden poseer espacios:
    <br>
    Documento de Identidad
    <br>
    Contrato Canaima   
    ";

}else{

$canaima = htmlentities(addslashes($_POST["canaima"]));    
 $colecc_bicent = htmlentities(addslashes($_POST["colecc_bicent"]));    
 $sexo = htmlentities(addslashes($_POST["sexo"]));        

if(!empty($id_doc_estd)){

$errors[] = valid_ci($id_doc_estd);

if (is_exist_student($id_doc_estd)){
    $errors[]= "Un Estudiante con esta cedula ya esta registrado";
}

    if(is_exist_ci($id_doc_estd)) {
       $errors[]='La cedula ya esta registrada en el sistema';
        }
}else{
   $id_doc_estd = ''; 
}

$errors[]= validar_fecha_registro($fecha_nac);

$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);
$fecha_nac=trim($fecha_nac);

$err_nom_apell =validar_nombres_apellidos($nombre1,$apellido_p);

if(!empty($apellido_m)){
$err_nom_apell = validar_nombres_apellidos($apellido_m);
$apellido_m=filtrar_nombres_apellidos($apellido_m);
}else{
    $apellido_m="";
}

if(!empty($nombre2)){
$err_nom_apell=validar_nombres_apellidos($nombre2);
$nombre2=filtrar_nombres_apellidos($nombre2);
}else{
    $nombre2 = "";
}

$errors[] = $err_nom_apell;

    if (!comprobar_msjs_array($errors)) {    

foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform1'][$clave] = $valor;

}

$errors[]= "<a href='reg-estudiante-2.php'>
    Confirmar
</a>";

}

}

}
 ?>

    <!--formularios-->
            <div class="container">

<!----------------------  FORMULARIO ( 1 ) DATOS DEL ESTUDIANTE -------------------------->
                <div class="row">    
                    <div class="col-lg-12">
                    <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">

    <!------------------------------------------- PRIMER Y SEGUNDO  APELLIDO/NOMBRE ----------------------->
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="form-titulo">Datos del estudiante</h3>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Primer Apellido:</label>
                                        <input type="text" value="<?php if(isset($apellido_p)) echo $apellido_p; ?>" name="apellido_p" id="" placeholder="Apellido" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Segundo Apellido:</label>
                                        <input type="text" name="apellido_m" value="<?php if(isset($apellido_m)) echo $apellido_m; ?>" id="" placeholder="Apellido" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label>Primer Nombre:</label>
                                        <input type="text" name="nombre1" id="" placeholder="Nombre" value="<?php if(isset($nombre1)) echo $nombre1; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Segundo Nombre:</label>
                                        <input type="text" name="nombre2" value="<?php if(isset($nombre2)) echo $nombre2; ?>" id="" placeholder="Nombre" class="form-control">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label>Nacionalidad:</label>
                                        <select name="nacionalidad" id="cedula" class="form-control" required>
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad)) if($nacionalidad == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad)) if($nacionalidad == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 my-2">   
                                        <label>Cedula:</label>
                                        <input type="number" maxlength="8" placeholder="Cedula" class="form-control" value="<?php if(isset($id_doc_estd)) echo $id_doc_estd; ?>" name="id_doc_estd">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Sexo:</p>
                                        <label for="" class="">Niño</label>
                                        
                                        <input type="radio" <?php if(isset($_POST["sexo"])){ if($_POST["sexo"] == '1') echo "checked";}else{if(isset($sexo)){ if($sexo == '1') echo "checked";}}
                                        ?> name="sexo" value="1" id="">

                                        <label for="sexo" class="">Niña</label>

                                        <input type="radio" name="sexo" <?php if(isset($_POST["sexo"])){ if($_POST["sexo"] == '2') echo "checked";}else{if(isset($sexo)){ if($sexo == '2') echo "checked";}} ?> value="2" id="">
                                    </div>
                                    
                                    <div class="col-lg-6 my-2">
                                        <label for="">Fecha de Nacimiento:</label>
                                        <input type="date" name="fecha_nac" value="<?php if(isset($fecha_nac)) echo $fecha_nac; ?>" id="" placeholder="Fecha" class="form-control" required>
                                    </div>
                                </div>

                             
                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label for="">Lugar de Nacimiento:</label>
                                        <textarea rows="3" cols="40" name="lugar_nac" id="" class="form-control" placeholder="Lugar de nacimiento" required><?php if(isset($lugar_nac)) echo $lugar_nac;?></textarea>
                                    </div>

                                    <div class="col-lg-6 my-2">
                                        <label for="">Dirección de Habitación:</label>
			                            <textarea rows="3" cols="40" name="direcc_hab" id="" class="form-control" placeholder="Dirección de habitación" required><?php if(isset($direcc_hab)) echo $direcc_hab; ?></textarea>        
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Posee Canaima:</p>
                                        <label for="" class="">Si:</label>
                                        <input type="radio" name="canaima" <?php if(isset($_POST["canaima"])){ if($_POST["canaima"] == '1') echo "checked";}else{if(isset($canaima)){ if($canaima == '1') echo "checked";}}
                                        ?> value="1" id="">

                                        <label for="" class="">No:</label>
                                        <input type="radio" name="canaima" <?php if(isset($_POST["canaima"])){ if($_POST["canaima"] == '0') echo "checked";}else{if(isset($canaima)){ if($canaima == '0') echo "checked";}}
                                        ?> value="0" id="">

                                        <div class="">
                                        <label for="" class="">Contrato Canaima:</label>
                                        <input type="text" name="contrato_canaima" value="<?php if(isset($contrato_canaima)) echo $contrato_canaima; ?>" id="" class="mx-2  form-control" placeholder="Contrato">
                                        </div>
                                    </div>
                                

                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Posee coleccion bicentenaria:</p>
                                        <label for="" class="">Si:</label>
                                        <input type="radio" name="colecc_bicent" 
                                        <?php if(isset($_POST["colecc_bicent"])){ if($_POST["colecc_bicent"] == '1') echo "checked";}else{if(isset($colecc_bicent)){ if($colecc_bicent == '1') echo "checked";}}?>  value="1" id="">

                                        <label for="" class="">No:</label>
                                        <input type="radio" name="colecc_bicent" <?php if(isset($_POST["colecc_bicent"])){ if($_POST["colecc_bicent"] == '0') echo "checked";}else{if(isset($colecc_bicent)){ if($colecc_bicent == '0') echo "checked";}}
                                        ?> value="0" id="">
                                    </div>
                                    
                                </div>

<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->

                            <button type='submit' class="btn btn-primary btn-block btn-lg" value="datos_student" name ='datos_student' >CONTINUAR</button>
                                 
                                                            <?php imprimir_msjs($errors); ?>

                            </form>
                    <!--</div>-->
                    </div>
                </div>



<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <!--jquery, boostrap.min.js, bundle.min.js-->


<?php require '../../../includes/footer_reg_est.php'; ?>
