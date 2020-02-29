
<?php 
require '../../../includes/init_system_reg.php'; 

require '../../../includes/head_reg_est.php';

require '../../../includes/header_reg_est.php'; 

    session_start();

 valid_inicio_sesion('2');


$ci_escolar = $_SESSION['ci_escolar'];

if (!isset($_SESSION['ci_escolar'])) {
header('location:../estudiantes.php');
}


/*
if (isset($_SESSION['sesionform1'])) {
if (comprobar_msjs_array($_SESSION['sesionform1'])) {
extract($_SESSION['sesionform1']);
}
}*/

$errors = array();
?>

<?php 

if (!empty($_POST['datos_student'])) {

    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $id_doc_new = htmlentities(addslashes($_POST["id_doc_new"]));
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
Se debe evitar campos vacios a exepcion del segundo nombre y apellido
    <br><br>
  Los siguientes campos no pueden poseer espacios:
      <br><br>
    Documento de Identidad
    <br><br>
    Fecha de Nacimiento
    <br><br>
    Correos Electronicos    
    <br><br>
    Contrato    ";

}else{

$ci_student_actual = obtener_cedula_student($ci_escolar);
if(!empty($id_doc_new)){

$errors[] = valid_ci($id_doc_new);

if (strcmp($ci_student_actual,$id_doc_new) != 0) {

if (is_exist_ci($id_doc_new)) {
       $errors[]='La cedula ya esta registrada en el sistema';
        }
}
}

$canaima = htmlentities(addslashes($_POST["canaima"]));    
 $colecc_bicent = htmlentities(addslashes($_POST["colecc_bicent"]));    
 $sexo = htmlentities(addslashes($_POST["sexo"]));        

$errors[]= validar_fecha_registro($fecha_nac);

$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);
$fecha_nac=trim($fecha_nac);

$apellido_p = filtrar_nombres_apellidos($apellido_p);

$nombre1=filtrar_nombres_apellidos($nombre1);

$err_nom_apell =validar_nombres_apellidos($nombre1,$apellido_p);

if(!validar_datos_vacios($apellido_m)){
$apellido_m=filtrar_nombres_apellidos($apellido_m);
$err_nom_apell = validar_nombres_apellidos($apellido_m);
}
if(!validar_datos_vacios($nombre2)){
$nombre2=filtrar_nombres_apellidos($nombre2);
$err_nom_apell=validar_nombres_apellidos($nombre2);
}

$nombres = $nombre1.' '.$nombre2;

$nombres=filtrar_nombres_apellidos($nombres);

$errors[] = $err_nom_apell;

    if (!comprobar_msjs_array($errors)) {    

foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform1'][$clave] = $valor;

}
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

    $nombres = $nombre1.' '.$nombre2;

//extract($_SESSION['sesionform1']);

actualizar_persona($nacionalidad,$_SESSION['ci_escolar'],$_SESSION['ci_escolar'],$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$lugar_nac,$direcc_hab,'','','','','');
 update_basic_data_student($_SESSION['ci_escolar'],$_SESSION['ci_escolar'],$id_doc_new,'');

  update_recursos_public($_SESSION['ci_escolar'],$colecc_bicent,$canaima,$contrato_canaima);

$errors[]= "Cambios Registrados con Exito";



}

}

}
 

 ?>

    <?php

        $sql = consulta_info_basic_student()." WHERE estd.ci_escolar = :ci_escolar ORDER BY es.id_actualizacion DESC LIMIT 1;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$ci_escolar);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
     
    ?>


    <!--formularios-->
            <div class="container">

<!----------------------  FORMULARIO ( 1 ) DATOS DEL ESTUDIANTE -------------------------->
                <div class="row">    
                    <div class="col-lg-12">
                    <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">

    <!------------------------------------------- PRIMER Y SEGUNDO  APELLIDO/NOMBRE ----------------------->

                                
    <?php $nombres_compilacion = explode(" ", $registro['nombre']);

                                 ?>

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="form-titulo">Datos del estudiante</h3>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Primer Apellido:</label>
                                        <input type="text" value="<?php if(isset($registro['apellido_p'])) echo $registro['apellido_p']; ?>" name="apellido_p" id="" placeholder="Apellido" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Segundo Apellido:</label>
                                        <input type="text" name="apellido_m" value="<?php if(isset($registro['apellido_m'])) echo $registro['apellido_m']; ?>" id="" placeholder="Apellido" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label>Primer Nombre:</label>
                                        <input type="text" name="nombre1" id="" placeholder="Nombre" value="<?php  echo $nombres_compilacion[0]; ?>" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Segundo Nombre:</label>
                                        <input type="text" name="nombre2" value="<?php 
                        
                        for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';
                                }
                                
                                         ?>" id="" placeholder="Nombre" class="form-control">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label>Nacionalidad:</label>
                                        <select name="nacionalidad" id="cedula" class="form-control" required>
                                            <option value="">-- Seleccione --</option>
                                            <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected'; ?> value="2">E</option>
                                        </select>
                                </div>

                                <div class="col-lg-6 my-2">
                                    <label>Cedula</label>
                                        
                                        <input type="number" maxlength="8" placeholder="Cedula" class="form-control" value="<?php if(isset($registro['id_doc'])) echo $registro['id_doc']; ?>" name="id_doc_new">
                                         </div>

                                        </div>

                                <div class="row">
                                    <div class="col-lg-3 my-2">
                                        <p for="" class="">Sexo:</p>
                                        <label for="" class="">Niño</label>
                                        
                                        <input type="radio" <?php if(isset($registro["id_sexo"])) if($registro["id_sexo"] == '1') echo "checked";
                                        ?> name="sexo" value="1" id="">

                                        <label for="sexo" class="">Niña</label>

                                        <input type="radio" name="sexo" <?php if(isset($registro["id_sexo"])) if($registro["id_sexo"] == '2') echo "checked"; ?> value="2" id="">
                                    </div>

                                    <div class="col-lg-3 my-2">
                                        <label for="">Fecha de Nacimiento:</label>
                                        <input type="text" name="fecha_nac" value="<?php if(isset($registro['fecha_nac'])) echo $registro['fecha_nac']; ?>" id="" class="form-control" required>
                                    </div>


                            <div class="row">

                                    <div class="col-lg-6 my-2">
            
            <label for="">Lugar de Nacimiento:</label>
        <br>
        <textarea rows="3" cols="40" name="lugar_nac" id="" required><?php if(isset($registro['lugar_nac'])) echo $registro['lugar_nac'];?></textarea>
                                </div>

                             

                                    <div class="col-lg-6 my-5">
                                        <label for="">Direccion de Habitacion:</label>
            <br>
        <textarea rows="3" cols="40" name="direcc_hab" id="" required><?php if(isset($registro['direcc_hab'])) echo $registro['direcc_hab']; ?></textarea>        
                                    </div>



                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Posee coleccion bicentenaria:</p>
                                        <label for="" class="">Si:</label>
                                        <input type="radio" name="colecc_bicent" 
                                        <?php if(isset($registro["colecc_bicent"])) if($registro["colecc_bicent"] == '1') echo "checked";?>  value="1" id="">

                                        <label for="" class="">No:</label>
                                        <input type="radio" name="colecc_bicent" <?php if(isset($registro["colecc_bicent"])) if($registro["colecc_bicent"] == '0') echo "checked";
                                        ?> value="0" id="">
                                    </div>

                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Posee Canaima?:</p>

                                        <label for="" class="">Si:</label>
                                        <input type="radio" name="canaima" <?php if(isset($registro["canaima"])) if($registro["canaima"] == '1') echo "checked";
                                        ?> value="1" id="">

                                        <label for="" class="">No:</label>
                                        <input type="radio" name="canaima" <?php if(isset($registro["canaima"])) if($registro["canaima"] == '0') echo "checked";
                                        ?> value="0" id="">

                                        <div class="">

                                        <label for=""  class="">Contrato:</label>
                                        <input type="text" name="contrato_canaima" value="<?php if(isset($registro['contrato'])) echo $registro['contrato']; ?>" id="" class="mx-2  form-control" placeholder="Contrato">
                                            
                                        </div>
                                    

                                </div>

                                </div>

<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->
                                                            <?php imprimir_msjs_no_style($errors); ?>

                        
                        
                        <button type='submit' class="btn btn-primary btn-block btn-lg"value="datos_student" name ='datos_student'>Actualizar</button>
                                                             <a href="../menu_upd_student.php" class="btn btn-primary col-lg-2">Volver</a>

                                <!-- <input type="submit" name="continuar" value="CONTINUAR" class="btn btn-primary btn-block btn-lg" id="boton-enviar"> --> 

                            </form>
                    <!--</div>-->
                    </div>
                </div>



<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <!--jquery, boostrap.min.js, bundle.min.js-->
<?php } ?>

<?php require '../../../includes/footer_reg_est.php'; ?>
