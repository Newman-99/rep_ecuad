<?php require '../../includes/init_system.php'; ?>

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


if (!is_exist_admin($id_doc)){
    $errors[]= "Un Administrativo con esta cedula ya esta registrado";
}


if (!is_exist_docente($id_doc)){
    $errors[]= "No existe un Docente con esta cedula registrado";    
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

<div class="container"> <!-- container -->

    <div class="row">    
    <div class="col-lg-12">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-group text-center">
        
            <div class="col-12 ">
                <h3 class="form-titulo">Registro de docente administrativo</h3>
            </div>
        
        <div class="row">
            <div class="col-lg-3 my-4">
                <label for="">Documento de Identidad</label>
                <input type="number" name="id_doc" id="" class="form-control" placeholder="Cedula" value="<?php if(isset($id_doc)) echo $id_doc; ?>">
            </div>

            <div class="col-lg-3 my-4">
                <label for="">Area: </label>
                <select name="id_area" id="" class="form-control">
                    <option value="">Seleccione</option>
                    <option <?php if(isset($area)) if($area == '1') echo 'selected';?> value="1">Directiva</option>
                    <option <?php if(isset($area)) if($area == '2') echo 'selected'; ?>  value="2">Estadistica</option>
                    <option <?php if(isset($area)) if($area == '3') echo 'selected';?> value="3">Pedagogica</option>
                </select>
            </div>

            <div class="col-lg-3 my-4">
                <label for="">Turno:</label> 
                <select name="turno" id="" class="form-control">
                    <option value="">Seleccione</option>
                    <option <?php if(isset($turno)) if($turno == '1') echo 'selected';?> value="1">Mañana</option>
                    <option <?php if(isset($turno)) if($turno == '2') echo 'selected';?> value="2">Tarde</option>
                </select>
            </div>

            <div class="col-lg-3 my-4">
                <label for="">Fecha de Ingreso:</label> 
                <input type="date" name="fecha_ingreso" id="" class="form-control" value="<?php if(isset($fecha_ingreso)) echo $fecha_ingreso; ?>">
            </div>
        </div>

<?php

imprimir_msjs_no_style($errors);

    ?>
            <div class="row">
                <div class="col-lg-3"><a class="btn btn-primary btn-block" href="reg_admin.php">Volver</a></div>
                <div class="col-lg-9"><input class="btn btn-primary btn-block" type="submit" value="Registrar" name="registrar"></div>
            </div>

        </form>
    </div>
    </div>
</div><!-- CONTAINER -->
<?php 

require'../../includes/footer.php';

 ?>