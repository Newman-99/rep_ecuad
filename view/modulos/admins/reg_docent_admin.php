<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['registrar'])) {

    $id_doc = htmlentities(addslashes($_POST["id_doc"]));

    $area = htmlentities(addslashes($_POST["id_area"]));    
    
    $fecha_ingreso = htmlentities(addslashes($_POST["fecha_ingreso"]));    
   
    $turno = htmlentities(addslashes($_POST["turno"])); 
    

if(validar_datos_vacios_sin_espacios($id_doc,$turno,$fecha_ingreso,$area)){;
    $errors[]= "Se deben evitar campos vacios y espacios vacios";
}else{


$errors[] = valid_ci($id_doc);


        if (is_exist_ci($id_doc)) {
       $errors_total[]='La cedula ya esta registrada en el sistema';
        }else{

if (!is_exist_admin($id_doc)){
    $errors[]= "Un Administrativo con esta cedula ya esta registrado";
}


if (!is_exist_docente($id_doc)){
    $errors[]= "No existe un Docente con esta cedula registrado";    
}

}

$errors[]= validar_fecha_registro($fecha_ingreso);


if (!comprobar_msjs_array($errors)) {    
 

regist_admins($id_doc,$area,$turno,'1',$fecha_ingreso,'0000-00-00');

  $errors[] = 'Administrativo registrado con exito';

}

}
}

?>
    <title>Registro de Administrativos</title>


<?php require '../../includes/header.php' ?>


    <h2>Registro de personal Administrativo</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

        Documento de Identidad

         <input type="number" name="id_doc" id="" value="<?php if(isset($id_doc)) echo $id_doc; ?>">

        <br>
        Area: 
        <select name="id_area" id="">
            <option value=""></option>
            <option <?php if(isset($area)) if($area == '1') echo 'selected';?> value="1">Directiva</option>

            <option <?php if(isset($area)) if($area == '2') echo 'selected'; ?>  value="2">Estadistica</option>

            <option <?php if(isset($area)) if($area == '3') echo 'selected';?> value="3">Pedagogica</option>

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
    <a href="reg_admin.php">volver</a>
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