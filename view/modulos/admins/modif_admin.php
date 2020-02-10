
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


if(validar_datos_vacios_sin_espacios($nacionalidad,$id_doc,$id_doc_new,$sexo,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$fecha_ingreso) || validar_datos_vacios($nombres,$area,$apellido_p,$lugar_nac,$direcc_hab,$turno)){
    $errors[]= "Se deben evitar campos vacios
    <p>Los Siguientes campos no Pueden poseer espacios:</p>
    <p><ul>

    <li>Nacionalidad</li>
    <li>Documento de Identidad</li>
    <li>Sexo</li>
    <li>Telefono Celular</li>
    <li>Telefono Local</li>
    <li>Correo</li>
    <li>Estado Civil</li>
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

$apellido_m=filtrar_nombres_apellidos($apellido_m);


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
    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
        <br>
<?php

    $sql = consulta_admins()." WHERE adm.id_doc_admin = :id_doc;";

    $result=$db->prepare($sql);
        
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();


while($registro=$result->fetch(PDO::FETCH_ASSOC)){

$id_doc = $registro['id_doc'];
?>
            Documento de Identidad
        <select name='nacionalidad' id='' autocomplete='on'>
            <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?>
             value='1'>V</option>

            <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected';?> value='2'>E</option>
        </select>

    
         <input type='number' name='id_doc' id='' value='<?php echo $registro['id_doc']; ?>'>

        <br>
        Nombres:
        <input type='text' name='nombre' id='' value='<?php echo $registro['nombre']; ?>' >
        
         <br>
        Apellido Paterno:
        <input type='text' name='apellido_p' id='' value='<?php echo $registro['apellido_p']; ?>'>
        

        <br>
        Apellido Materno:
        <input type='text' name='apellido_m' id='' value='<?php echo $registro['apellido_m']; ?>'>
       
        <br>
        Sexo:
        <select name='sexo' id=''>
            <option <?php if($registro['id_sexo'] == '1') echo 'selected';?> value='1'>Masculino</option>

            <option <?php if($registro['id_sexo'] == '2') echo 'selected';?> value='2'>Femenino</option>
        </select>

        <br>
        Area: 
        <select name='area' id=''>
            <option <?php if($registro['id_area'] == '1') echo 'selected';?> value='1'>Directiva</option>

            <option <?php if($registro['id_area'] == '2') echo 'selected';?> value='2'>Estaditica</option>

            <option <?php if($registro['id_area'] == '3') echo 'selected';?> value='3'>Pedagogica</option>
        </select>
        <br>

        Fecha de Nacimiento:
        <input type='date' name='fecha_nac' id='' value='<?php echo $registro['fecha_nac']; ?>'>

        <br>
        Fecha de Ingreso:
        <input type='date' name='fecha_ingreso' id='' value='<?php echo $registro['fecha_ingreso']; ?>'>

        <br>
        Fecha de Inabilitacion:
        <input type='date' name='fecha_inabilitacion' id='' value='<?php echo $registro['fecha_inabilitacion']; ?>'>

        <br>

        Lugar de Nacimiento:
        <textarea rows="3" cols="40" name="lugar_nac" id=""><?php echo $registro['lugar_nac'];?></textarea>
        
        <br>
        Direccion de Habitacion:
        <textarea rows="3" cols="40" name="direcc_hab" id=""><?php echo $registro['direcc_hab'];?></textarea>

        <br>
        Telefono Celular:
        <input type='number' name='tlf_cel' id='' value='<?php echo $registro['tlf_cel'] ?>'>

        <br>
        Telefono Local:
        <input type='number' name='tlf_local' id='' value='<?php echo $registro['tlf_local'] ?>'>
        <br>
        Correo:
        <input type='email' name='correo' id='' value='<?php echo $registro['correo']; ?>'>
        
        <br>
        Estado Civil:
        <select name='estado_civil' id=''>
            <option <?php if($registro['id_estado_civil'] == '1') echo 'selected';?> value='1'>Soltero/a</option>

            <option <?php if($registro['id_estado_civil'] == '2') echo 'selected';?> value='2'>Casado/a</option>

            <option <?php if($registro['id_estado_civil'] == '3') echo 'selected';?> value='3'>Divorciado/a</option>

            <option <?php if($registro['id_estado_civil'] == '4') echo 'selected';?> value='4'>Viudo/a</option>
        </select>
        
        <br>
        Turno:
        <select name='turno' id=''>
            <option <?php if($registro['id_turno'] == '1') echo 'selected';?> value='1'>Mañana</option>
            <option <?php if($registro['id_turno'] == '2') echo 'selected';?>  value='2'>Tarde</option>
        </select> 
        <br>
    Estado
            <select name='id_estado' id=''>
            <option <?php if($registro['id_estado'] == '1') echo 'selected';?> value='1'>Activo</option>

            <option <?php if($registro['id_estado'] == '2') echo 'selected';?> value='2'>Inactivo</option>
        </select>
<br>

    <?php echo "<button type='submit' id='button-modi' name='save_admin' value=".$id_doc.">Guardar</button>";?>

    </form>
    <?php } ?>

    <br>
    <a href='admins.php'>volver</a>
    <br>
    <br>

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>".$msjs."</p>";
        }
    }

    ?>

<?php 

require'../../includes/footer.php';

 ?>