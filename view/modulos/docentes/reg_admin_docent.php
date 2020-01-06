<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['registrar'])) {

    $id_doc = htmlentities(addslashes($_POST["id_doc"]));

    $funcion_docent = htmlentities(addslashes($_POST["funcion_docent"]));    
    
    $fecha_ingreso = htmlentities(addslashes($_POST["fecha_ingreso"]));    
   
    $turno = htmlentities(addslashes($_POST["turno"])); 
    

if(validar_datos_vacios_sin_espacios($id_doc,$turno,$fecha_ingreso,$funcion_docent)){;
    $errors[]= "Se deben evitar campos vacios y espacios vacios";
}else{


$errors[] = valid_ci($id_doc);

if (is_exist_ci($id_doc)) {
    $errors_total[]='La cedula ya esta registrada en el sistema';}else{

if (is_exist_docente($id_doc)){
    $errors[]= "Un Docente con esta cedula ya esta registrado"; }

if (is_exist_admin($id_doc)){
    $errors[]= "No existe un Administrativo con esta cedula registrado";}
    }

$errors[]= validar_fecha_registro($fecha_ingreso);


if (!comprobar_msjs_array($errors)) {    
 
 registrar_docentes($id_doc,$funcion_docent,$turno,'1',$fecha_ingreso,'0000-00-00');

    $errors[] = 'Docente registrado con exito';

}

}
}

?>
    <title>Registro de Docentes</title>


<?php require '../../includes/header.php' ?>


    <h2>Registro de personal Docente</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

        Documento de Identidad

         <input type="number" name="id_doc" id="" value="<?php if(isset($id_doc)) echo $id_doc; ?>">

        <br>
        Funcion del docente: 
        <select name="funcion_docent" id="">
                        <option value=""></option>

            <option <?php if(isset($funcion_docent)) if($funcion_docent == '1') echo 'selected';?> value="1">En aula</option>

            <option <?php if(isset($funcion_docent)) if($funcion_docent == '2') echo 'selected'; ?> value="2" >Educuacion Fisica</option>

            <option <?php if(isset($funcion_docent)) if($funcion_docent == '3') echo 'selected';?> value="3">Arte y Cultura</option>
        </select>
        
        <br>
        Turno:
        <select name="turno" id="">

            <option value=""></option>

            <option <?php if(isset($turno)) if($turno == '1') echo 'selected';?> value="1">Mañana</option>
            <option <?php if(isset($turno)) if($turno == '2') echo 'selected';?> value="2">Tarde</option>
        </select> 
    <br>
        Fecha de Ingreso:
        <input type="date" name="fecha_ingreso" id="" value="<?php if(isset($fecha_ingreso)) echo $fecha_ingreso; ?>">
        <br>

        <input type="submit" value="Registrar" name="registrar">
    </form>

    
    <br>
    <a href="register_docent.php">volver</a>
    <br>
    <br>

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }

    ?>

<?php 

require'../../includes/footer.php';

 ?>