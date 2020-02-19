
<?php require '../../includes/init_system.php'; ?>

<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['modificar'])) {
    $id_doc=$_POST['modificar'];
}
if (!empty($_POST['save_admin'])) {

    $id_doc = htmlentities(addslashes($_POST["save_admin"]));
    $id_doc_new = htmlentities(addslashes($_POST["id_doc"]));
    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $nombres = htmlentities(addslashes($_POST["nombre"]));
    $apellido_p = htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_m = htmlentities(addslashes($_POST["apellido_m"]));
    $sexo = htmlentities(addslashes($_POST["sexo"]));    
    $area = htmlentities(addslashes($_POST["area"]));    
    $fecha_nac = htmlentities(addslashes($_POST["fecha_nac"]));    
     $fecha_ingreso = htmlentities(addslashes($_POST["fecha_ingreso"]));    
     $fecha_inabilitacion = htmlentities(addslashes($_POST["fecha_inabilitacion"]));    
    $lugar_nac = htmlentities(addslashes($_POST["lugar_nac"]));    
    $direcc_hab = htmlentities(addslashes($_POST["direcc_hab"]));    
    $tlf_cel = htmlentities(addslashes($_POST["tlf_cel"]));    
    $tlf_local = htmlentities(addslashes($_POST["tlf_local"]));    
    $correo = htmlentities(addslashes($_POST["correo"])); 
    $estado_civil = htmlentities(addslashes($_POST["estado_civil"])); 
    $turno = htmlentities(addslashes($_POST["turno"])); 
    $id_estado = htmlentities(addslashes($_POST["id_estado"])); 


if(validar_datos_vacios_sin_espacios($nacionalidad,$id_doc,$id_doc_new,$sexo,$tlf_cel,$tlf_local,$correo,$estado_civil,$fecha_ingreso) || validar_datos_vacios($nombres,$area,$apellido_p,$lugar_nac,$direcc_hab,$turno)){
    $errors[]= "Se deben evitar campos vacios execepto el estado y fecha de Inabilitacion
    <p>Los Siguientes campos no Pueden poseer espacios:</p>
    <p><ul>
    <li>Documento de Identidad</li>
    <li>    Numeros Telefonicos</li>
    <li>Correo</li>
    </ul></p>";

}else{

$errors[] = valid_ci($id_doc);

if (strcmp($id_doc, $id_doc_new) != 0) {

    if (is_exist_ci($id_doc_new)) {
       $errors_total[]='La cedula ya esta registrada en el sistema';
        }

        if (!is_exist_admin($id_doc_new)){
    $errors[]= "Un Administrativo con esta cedula ya esta registrado";
}
}


$errors[]= validar_fecha_registro($fecha_ingreso);

$errors[]=validar_nombres_apellidos($nombres,$apellido_p);

if (!is_valid_email($correo)) { $errors[]='El Correo electronico ingresado es invalido';}

if (!is_valid_num_tlf($tlf_local,$tlf_cel)) { $errors[]='El numero de telefono ingresado es invalido';}



if (!comprobar_msjs_array($errors)) {    

$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);
 
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

$nombres=filtrar_nombres_apellidos($nombres);

$apellido_p=filtrar_nombres_apellidos($apellido_p);

if (!empty($apellido_m)) {
$errors[]=validar_nombres_apellidos($apellido_m);
}


 actualizar_admins($nacionalidad ,$id_doc,$id_doc_new,$nombres,$apellido_p,$apellido_m,$sexo,$area,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion);

  $id_doc =  $id_doc_new;



$errors[]= 'Cambios registrados con exito';

}

}
}
?>

    <title>Modificacion de Administrativos</title>


<?php require '../../includes/header.php' ?>


    <h2>Modificacion de Administrativos</h2>

<div class="container"> <!-- container -->
    <div class="row">    
        <div class="col-lg-12">
    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post' class="form-group text-center" style="margin-bottom:-200px;">

        <div class="col-lg-12 " >
        <h3 class="form-titulo">Modificacion de Administrativos</h3>
        </div>
    
<?php

    $sql = consulta_admins()." WHERE adm.id_doc_admin = :id_doc;";

    $result=$db->prepare($sql);
        
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();


while($registro=$result->fetch(PDO::FETCH_ASSOC)){

$id_doc = $registro['id_doc'];
?>
                <div class="row">
        <div class="col-lg-2 my-4">  
        <select name='nacionalidad' id='' autocomplete='on' class="form-control">
            <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?>
             value='1'>V</option>
            <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected';?> value='2'>E</option>
        </select>
        </div>
        <div class="col-lg-3">
        Documento de Identidad
         <input type='number' name='id_doc' id='' class="form-control" value='<?php echo $registro['id_doc']; ?>'>
        </div>

         <div class="col-lg-3 ">
        Nombres:
        <input type='text' name='nombre' id='' class="form-control" value='<?php echo $registro['nombre']; ?>' >
        </div>

        <div class="col-lg-3 ">
        Apellido Paterno:
        <input type='text' name='apellido_p' id='' class="form-control" value='<?php echo $registro['apellido_p']; ?>'>
        </div>
                </div>

                <div class="row">
        <div class="col-lg-3 my-2">
        Apellido Materno:
        <input type='text' name='apellido_m' id='' class="form-control" value='<?php echo $registro['apellido_m']; ?>'>
        </div>
        
        <div class="col-lg-3 my-2">
        Sexo:
        <select name='sexo' id='' class="form-control">
            <option <?php if($registro['id_sexo'] == '1') echo 'selected';?> value='1'>Masculino</option>
            <option <?php if($registro['id_sexo'] == '2') echo 'selected';?> value='2'>Femenino</option>
        </select>
        </div>
        
        <div class="col-lg-3 my-2">
        Area: 
        <select name='area' id='' class="form-control">
            <option <?php if($registro['id_area'] == '1') echo 'selected';?> value='1'>Directiva</option>

            <option <?php if($registro['id_area'] == '2') echo 'selected';?> value='2'>Estaditica</option>

            <option <?php if($registro['id_area'] == '3') echo 'selected';?> value='3'>Pedagogica</option>
        </select>
        </div>
        
        <div class="col-lg-3 my-2">
        Fecha de Nacimiento:
        <input type='date' name='fecha_nac' id='' class="form-control" value='<?php echo $registro['fecha_nac']; ?>'>
        </div>
                </div>

                <div class="row">
        <div class="col-lg-3 my-2">
        Fecha de Ingreso:
        <input type='date' name='fecha_ingreso' id='' class="form-control" value='<?php echo $registro['fecha_ingreso']; ?>'>
        </div>
        
        <div class="col-lg-3 my-2">
        Fecha de Inabilitacion:
        <input type='date' name='fecha_inabilitacion' id='' class="form-control" value='<?php echo $registro['fecha_inabilitacion']; ?>'>
        </div>
        
        <div class="col-lg-3 my-2">
        Lugar de Nacimiento:
        <textarea rows="3" cols="40" name="lugar_nac" id="" class="form-control"><?php echo $registro['lugar_nac'];?></textarea>
        </div>
        <br>
        <div class="col-lg-3 my-2">
        Direccion de Habitacion:
        <textarea rows="3" cols="40" name="direcc_hab" id="" class="form-control"><?php echo $registro['direcc_hab'];?></textarea>
        </div>
                </div>

                <div class="row">
        <div class="col-lg-3 my-2">
        Telefono Celular:
        <input type='number' name='tlf_cel' id='' class="form-control" value='<?php echo $registro['tlf_cel'] ?>'>
        </div>

        <div class="col-lg-3 my-2">
        Telefono Local:
        <input type='number' name='tlf_local' id='' class="form-control" value='<?php echo $registro['tlf_local'] ?>'>
        </div>

        <div class="col-lg-3 my-2">
        Correo:
        <input type='email' name='correo' id='' class="form-control" value='<?php echo $registro['correo']; ?>'>
        </div>
        
        <div class="col-lg-3 my-2">
        Estado Civil:
        <select name='estado_civil' id='' class="form-control">
            <option <?php if($registro['id_estado_civil'] == '1') echo 'selected';?> value='1'>Soltero/a</option>

            <option <?php if($registro['id_estado_civil'] == '2') echo 'selected';?> value='2'>Casado/a</option>

            <option <?php if($registro['id_estado_civil'] == '3') echo 'selected';?> value='3'>Divorciado/a</option>

            <option <?php if($registro['id_estado_civil'] == '4') echo 'selected';?> value='4'>Viudo/a</option>
        </select>
        </div>
                </div>

                <div class="row">

        <div class="col-lg-3 my-2">           
        Turno:
        <select name='turno' id=''class="form-control">
            <option <?php if($registro['id_turno'] == '1') echo 'selected';?> value='1'>Mañana</option>
            <option <?php if($registro['id_turno'] == '2') echo 'selected';?>  value='2'>Tarde</option>
        </select>
        </div> 
        
        <div class="col-lg-3 my-2">
            Estado
            <select name='id_estado' id=''class="form-control">
            <option <?php if($registro['id_estado'] == '1') echo 'selected';?> value='1'>Activo</option>

            <option <?php if($registro['id_estado'] == '2') echo 'selected';?> value='2'>Inactivo</option>
        </select>
        </div>
                </div>

                <div class="row">
                <a class="btn btn-primary col-2  mx-3"  href='admins.php'>Volver</a>
                <?php echo "<button type='submit' id='' class='btn btn-primary col-9 mx-3' name='save_admin' value=".$id_doc.">Guardar</button>";?>
                </div>

                <?php
                imprimir_msjs_no_style($errors);
                ?>
    </form>

    <?php } ?>

    

<?php 

require '../../includes/footer.php';

 ?>