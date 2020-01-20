<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['modificar'])) {
    $id_doc=$_POST['modificar'];
}
if (!empty($_POST['save_docent'])) {

    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $id_doc = htmlentities(addslashes($_POST["save_docent"]));
    $id_doc_new = htmlentities(addslashes($_POST["id_doc"]));
    $nombres = htmlentities(addslashes($_POST["nombre"]));
    $apellido_p = htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_m = htmlentities(addslashes($_POST["apellido_m"]));
    $sexo = htmlentities(addslashes($_POST["sexo"]));    
    $funcion_docent = htmlentities(addslashes($_POST["funcion_docent"]));    
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


if(validar_datos_vacios_sin_espacios($nacionalidad,$id_doc,$id_doc_new,$sexo,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$fecha_ingreso) || validar_datos_vacios($nombres,$funcion_docent,$apellido_p,$apellido_m,$lugar_nac,$direcc_hab,$turno)){
    $errors[]= "    Se debe evitar campos vacios
    <br><br>
  Los siguientes campos no pueden poseer espacios:
      <br><br>
    Documento de Identidad
    <br><br>
    Fecha de Nacimiento
    <br><br>
    Numeros Telefonicos
    <br><br>
    Correos Electronicos";

}else{

$errors[] = valid_ci($id_doc);

if (strcmp($id_doc, $id_doc_new) != 0) {

if (is_exist_ci($id_doc_new)) {
       $errors_total[]='La cedula ya esta registrada en el sistema';
        }

    if(is_exist_docente($id_doc_new)){$errors[] = "Ya hay un docente registrado con esta cedula";} }

$errors[]= validar_fecha_registro($fecha_ingreso);

$errors[]=validar_nombres_apellidos($nombres,$apellido_p,$apellido_m);

if (!is_valid_email($correo)) { $errors[]='El Correo electronico ingresado es invalido';}

if (!is_valid_num_tlf($tlf_local,$tlf_cel)) { $errors[]='El numero de telefono ingresado es invalido';}



if (!comprobar_msjs_array($errors)) {    

$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);
 
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

$nombres=filtrar_nombres_apellidos($nombres);

$apellido_p=filtrar_nombres_apellidos($apellido_p);

$apellido_m=filtrar_nombres_apellidos($apellido_m);


actualizar_persona($nacionalidad ,$id_doc,$id_doc_new,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil);

actualizar_docentes($id_doc,$id_doc_new,$funcion_docent,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion);
$errors[]= 'Cambios registrados con exito';

  $id_doc =  $id_doc_new;


}

}
}
?>

    <title>Modificacion de Docentes</title>

<?php require '../../includes/header.php' ?>

    
    <h2>Modificacion de Docentes</h2>
    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
        <br>
<?php

    $sql = consulta_docentes()." WHERE doc.id_doc_docent = :id_doc;";

    $result=$db->prepare($sql);
        
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();


while($registro=$result->fetch(PDO::FETCH_ASSOC)){

 
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
        Funcion del docente: 
        <select name='funcion_docent' id=''>
            <option <?php if($registro['id_funcion_docent'] == '1') echo 'selected';?> value='1'>En aula</option>

            <option <?php if($registro['id_funcion_docent'] == '2') echo 'selected';?> value='2'>Educuacion Fisica</option>

            <option <?php if($registro['id_funcion_docent'] == '3') echo 'selected';?> value='3'>Arte y Cultura</option>
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

    <?php echo "<button type='submit' id='button-modi' name='save_docent' value=".$id_doc.">Guardar</button>";?>

    </form>
    <?php } ?>

    <br>
    <a href='docentes.php'>volver</a>
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