<?php require '../../includes/init_system.php'; ?>
 
<?php require '../../includes/head.php' ?>

<?php

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
<meta charset="utf-8">

?>
<link rel="stylesheet" type="text/css" href="../../style/css/styless.css">

    <title>Registro de Docentes</title>
<header class="top">
           <ul style="background-image: url('../../img/th6.jpg');">
                <li><img src="../../img/i.png" width="80px" height="70px" style="" ><br><p> U-E-N "República del Ecuador"</p></li>
            </ul>
       </header>

<?php require '../../includes/header.php' ?>

<<<<<<< HEAD
<div class="container-re">
    <br>
    <h2>Registro de personal Docente</h2>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <br>
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

        <input type="submit" value="Registrar" name="registrar" class="reg">
    </form>
=======
<h2>Registro de personal Docente</h2>

<div class="container"> <!-- container -->
>>>>>>> 82e2059a0fd07e67b7016260b9dbe6f599b54f1e

    <div class="row">    
        <div class="col-lg-12">
    
<<<<<<< HEAD
    <br>
    <a href="register_docent.php" style="color: #fff;">volver</a>
    <br>
    <br>
</div>
    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }

    ?>

=======
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-group text-center">

                    <div class="col-12">
                        <h3 class="form-titulo">Registro de personal docente</h3>
                    </div>

                <div class="row">
                    <div class="col-lg-3 my-4">
                        <label for="">Documento de Identidad</label>
                        <input type="number" name="id_doc" id="" class="form-control" placeholder="Cedula" value="<?php if(isset($id_doc)) echo $id_doc; ?>">
                    </div>

                    <div class="col-lg-3 my-4">
                        <label for="">Funcion del docente:</label>
                        <select name="funcion_docent" id="" class="form-control">
                            <option value="">Seleccione</option>
                            <option <?php if(isset($funcion_docent)) if($funcion_docent == '1') echo 'selected';?> value="1">En aula</option>
                            <option <?php if(isset($funcion_docent)) if($funcion_docent == '2') echo 'selected'; ?> value="2" >Educuacion Fisica</option>
                            <option <?php if(isset($funcion_docent)) if($funcion_docent == '3') echo 'selected';?> value="3">Arte y Cultura</option>
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

                <!-- mensaje ( validacion) -->  
                <?php
                    if(!empty($errors)){
                        foreach ($errors as $msjs) {
                    echo "<p>$msjs<p>";
                        }
                    }
                ?>

                <!-- botones -->
                <div class="row">
                    <div class="col-lg-3"><a class="btn btn-primary btn-block" href="register_docent.php">VOLVER</a></div>
                    <div class="col-lg-9"><button class="btn btn-primary btn-block" type="submit" value="Registrar" name="registrar">REGISTRAR</button></div>
                </div>
            </form>
        </div>
    </div>
<!-- Container -->
</div> 
   
>>>>>>> 82e2059a0fd07e67b7016260b9dbe6f599b54f1e
<?php 

require'../../includes/footer.php';

 ?>