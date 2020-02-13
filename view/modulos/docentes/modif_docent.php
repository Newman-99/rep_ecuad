<?php require '../../includes/init_system.php'; ?>

<?php require '../../includes/head.php' ?>

<?php
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

<div class="container"> <!-- container -->

    <div class="row">    
        <div class="col-lg-12">
    
            <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post' class="form-group text-center">

<?php

    $sql = consulta_docentes()." WHERE doc.id_doc_docent = :id_doc;";

    $result=$db->prepare($sql);
        
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();


while($registro=$result->fetch(PDO::FETCH_ASSOC)){

?>

                <div class="col-12">
                    <h3 class="form-titulo">Modificación de docentes</h3>
                </div>

            <div class="row">
                <div class="col-lg-2 my-4">
                    <label for=""></label>
                    <select name='nacionalidad' id='' class="form-control" autocomplete='on' class="form-control" >
                        <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?> value='1'>V</option>
                        <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected';?> value='2'>E</option>
                    </select>
                    
                </div>

                <div class="col-lg-4 my-3">
                    <label for="">Documento de Identidad</label>
                    <input type='number' name='id_doc' id='' class="form-control" class="form-control" value='<?php echo $registro['id_doc']; ?>'>
                </div>

                <div class="col-lg-6 my-3">
                    <label for="">Nombres:</label>
                    <input type='text' name='nombre' id='' class="form-control" class="form-control" value='<?php echo $registro['nombre']; ?>' >
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 my-3">
                    <label for="">Apellido Paterno:</label>
                    <input type='text' name='apellido_p' id='' class="form-control" value='<?php echo $registro['apellido_p']; ?>'>
                </div>

                <div class="col-lg-6 my-3">
                    <label for="">Apellido Materno:</label>
                    <input type='text' name='apellido_m' id='' class="form-control" value='<?php echo $registro['apellido_m']; ?>'>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 my-3">
                    <label for="">Sexo:</label>
                    <select name='sexo' id='' class="form-control">
                        <option <?php if($registro['id_sexo'] == '1') echo 'selected';?> value='1'>Masculino</option>
                        <option <?php if($registro['id_sexo'] == '2') echo 'selected';?> value='2'>Femenino</option>
                    </select>
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Funcion del docente:</label>
                    <select name='funcion_docent' id='' class="form-control">
                        <option <?php if($registro['id_funcion_docent'] == '1') echo 'selected';?> value='1'>En aula</option>
            
                        <option <?php if($registro['id_funcion_docent'] == '2') echo 'selected';?> value='2'>Educuacion Fisica</option>
            
                        <option <?php if($registro['id_funcion_docent'] == '3') echo 'selected';?> value='3'>Arte y Cultura</option>
                    </select>
                </div>
            
                <div class="col-lg-3 my-3">
                    <label for="">Fecha de Nacimiento:</label>
                    <input type='date' name='fecha_nac' id='' class="form-control" value='<?php echo $registro['fecha_nac']; ?>'>
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Fecha de Ingreso:</label>
                    <input type='date' name='fecha_ingreso' id='' class="form-control" value='<?php echo $registro['fecha_ingreso']; ?>'>
                </div>
            
            </div>

            <div class="row">
                
            </div>

            <div class="row">
                <div class="col-lg-3 my-3">
                    <label for="">Fecha de Inabilitacion:</label>
                    <input type='date' name='fecha_inabilitacion' id='' class="form-control" value='<?php echo $registro['fecha_inabilitacion']; ?>'>
                </div>

                <div class="col-lg-5 my-3">
                    <label for="">Lugar de Nacimiento:</label>
                    <textarea rows="3" cols="40" name="lugar_nac" id="" class="form-control"><?php echo $registro['lugar_nac'];?></textarea>
                </div>

                <div class="col-lg-4 my-3">
                    <label for="">Direccion de Habitacion:</label>
                    <textarea rows="3" cols="40" name="direcc_hab" id="" class="form-control"><?php echo $registro['direcc_hab'];?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 my-3">
                    <label for="">Telefono Celular:</label>
                    <input type='number' name='tlf_cel' id='' class="form-control" value='<?php echo $registro['tlf_cel'] ?>'>
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Telefono Local:</label>
                    <input type='number' name='tlf_local' id='' class="form-control" value='<?php echo $registro['tlf_local'] ?>'>
                </div>
                
                <div class="col-lg-6 my-3">
                    <label for="">Correo:</label>
                    <input type='email' name='correo' id='' class="form-control" value='<?php echo $registro['correo']; ?>'>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 my-3">
                    <label for="">Estado Civil:</label>     
                    <select name='estado_civil' id='' class="form-control">
                        <option <?php if($registro['id_estado_civil'] == '1') echo 'selected';?> value='1'>Soltero/a</option>
            
                        <option <?php if($registro['id_estado_civil'] == '2') echo 'selected';?> value='2'>Casado/a</option>
            
                        <option <?php if($registro['id_estado_civil'] == '3') echo 'selected';?> value='3'>Divorciado/a</option>
            
                        <option <?php if($registro['id_estado_civil'] == '4') echo 'selected';?> value='4'>Viudo/a</option>
                    </select>
                </div>

                <div class="col-lg-4 my-3">
                    <label for="">Turno:</label>        
                    <select name='turno' id='' class="form-control">
                        <option <?php if($registro['id_turno'] == '1') echo 'selected';?> value='1'>Mañana</option>
                        <option <?php if($registro['id_turno'] == '2') echo 'selected';?>  value='2'>Tarde</option>
                    </select>
                </div>

                <div class="col-lg-4 my-3">
                    <label for="">Estado</label> 
                        <select name='id_estado' id='' class="form-control">
                        <option <?php if($registro['id_estado'] == '1') echo 'selected';?> value='1'>Activo</option>

                        <option <?php if($registro['id_estado'] == '2') echo 'selected';?> value='2'>Inactivo</option>
                    </select>
                </div>
            </div>
<!--------- Final form --------------------->
<?php
if(!empty($errors)){
    foreach ($errors as $msjs) {
        echo "<p>".$msjs."</p>";
    }
}
        
?>
                    <div class="row">
                        <div class="col-lg-3"><a class="btn btn-primary btn-block" href='docentes.php'>VOLVER</a></div class="col-lg-3">
                        <div class="col-lg-9"><button type='submit'  class="btn btn-primary btn-block" name='save_docent' value="<?php echo $id_doc ?>">GUARDAR</button></div>
                    </div>
                    
                    
            </form>
     
<?php } ?>
       
        </div>
    </div>    
</div><!--Container-->
    

<?php 

require '../../includes/footer.php';

 ?>