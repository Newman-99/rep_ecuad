<?php

require '../../includes/init_system.php'; 

require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('2');

global $db;
$errors = array();

if(!empty($_POST['registrar'])){

    $grado = htmlentities(addslashes($_POST["grado"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
    
    $no_aula = htmlentities(addslashes($_POST["no_aula"]));
    
    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));
    
    $id_doc_docent_normal = htmlentities(addslashes($_POST["id_doc_docent_normal"]));
    $id_doc_educ_fisica = htmlentities(addslashes($_POST["id_doc_educ_fisica"]));
    
    $id_doc_docent_arte_cultura = htmlentities(addslashes($_POST["id_doc_docent_arte_cultura"]));
    
if(validar_datos_vacios_sin_espacios($grado,$turno,$no_aula,$anio_escolar1,$anio_escolar2,$seccion/*$id_doc_docent_normal,$id_doc_educ_fisica,$id_doc_docent_arte_cultura*/)){
    $errors[]= "Se deben evitar campos y no pueden poseer espacios.
    <br>
    Pero el Documento de identidad de los docentes puede ser opcional por lo que no se registraran profesores en el aula todavia
    ";
}else{

    $errors[]= validar_grado($grado);

    $errors[]= validar_seccion($seccion);

    $errors[]= validar_anio_escolar($anio_escolar1,$anio_escolar2);

    $errors[] = comprobar_no_aula($no_aula); 

if (validar_datos_vacios($id_doc_docent_normal)){$id_doc_docent_normal="No asignado";}else{if(is_string(valid_ci($id_doc_docent_normal))){$errors[]="La Cedula del docente en aula es inavlida";}}

if (validar_datos_vacios($id_doc_educ_fisica)){$id_doc_educ_fisica="No asignado";}else{if (is_string(valid_ci($id_doc_educ_fisica))){$errors[]="La Cedula del docente de Educacion fisica es inavlida";}}

if (validar_datos_vacios($id_doc_docent_arte_cultura)){$id_doc_docent_arte_cultura="No Asignado";}else{if (is_string(valid_ci($id_doc_docent_arte_cultura))){$errors[]="La Cedula del docente de Arte y Cultura es inavlida";}}

            // Si Hay Una Cedula se procedera a buscar si existe el docent
if (is_numeric($id_doc_docent_normal)) {
    if (!validar_exist_docente($id_doc_docent_normal)) {
    $errors[]="No hay ningun docente en Aula con esta cedula registrado";}}
            
if (is_numeric($id_doc_educ_fisica)) {
    if(!validar_exist_docente($id_doc_educ_fisica)) {
    $errors[]="No hay ningun docente de educacion fisica con esta cedula registrado";}}

if (is_numeric($id_doc_docent_arte_cultura)) {
    if (!validar_exist_docente($id_doc_docent_arte_cultura)) {
    $errors[]="No hay ningun docente de Arte y Cultura con esta cedula registrado";}}


if (!comprobar_turno_docent_clase($id_doc_docent_normal,$turno)){
    $errors[]="El Docente en Aula ya tiene este turno ocupado";}

if (comprobar_aula_ocupada($no_aula)){$errors[]="El Aula ya esta Ocupada";}

$id_clase= generador_id_clases($grado,$seccion,$anio_escolar1,$anio_escolar2,$turno);

if(is_exist_clase($id_clase)){$errors[]="Esta clase ya existe ";}

}

if (!comprobar_msjs_array($errors)) {
    registrar_clases(/*$id_doc_docent,
        $id_doc_docent_fis,
        $id_doc_docent_cult,*/
        $grado,
        $seccion,
        $no_aula,
        $turno,
        $anio_escolar1,
        $anio_escolar2);

         $errors[] ="Felicidades clase ya Registrada";

    $errors[]= validar_grado($grado);

    $errors[]= validar_seccion($seccion);

    $errors[]= validar_anio_escolar($anio_escolar1,$anio_escolar2);

    $errors[] = comprobar_no_aula($no_aula); 

        //Asignacion de clase
    
        // Registro Docente Normal

        asignar_docente_clase($id_clase,$grado,$seccion,$id_doc_docent_normal,'1','1');

        //Registro Docente de Educacion Fisica

        asignar_docente_clase($id_clase,$grado,$seccion,$id_doc_educ_fisica,'2','1');

        //Registro Docente de Arte y Cultura

        asignar_docente_clase($id_clase,$grado,$seccion,$id_doc_docent_arte_cultura,'3','1');

                
        } 
}


?>


    <title>Registro de Clases</title>

<?php require '../../includes/header.php'; ?>      


    <h2>Registro de Clases</h2>

    <h3>Registrar Clase</h3>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <br>
        Grado Escolar:
        <select name="grado" id="" autocomplete="on">
            <option value="1">1ro</option>
            <option value="2">2do</option>
            <option value="3">3ro</option>
            <option value="4">4to</option>
            <option value="5">5to</option>
            <option value="6">6to</option>

        </select>

        <br>

        Seccion 

        <select name="seccion_escolaridad" id="" autocomplete="on" class="form-control">
        <option value="" > Seleccione </option>
            <option <?php if(isset($seccion)) if($seccion_escolaridad == 'A') echo 'selected';?> value="A">A</option>
            <option <?php if(isset($seccion)) if($seccion_escolaridad == 'B') echo 'selected';?> value="B">B</option>
            <option <?php if(isset($seccion)) if($seccion_escolaridad == 'C') echo 'selected';?> value="C">C</option>
            <option <?php if(isset($seccion)) if($seccion_escolaridad == 'D') echo 'selected';?> value="D">D</option>
            <option <?php if(isset($seccion)) if($seccion_escolaridad == 'E') echo 'selected';?> value="E">E</option>
            <option <?php if(isset($seccion)) if($seccion_escolaridad == 'F') echo 'selected';?> value="F">F</option>
        </select>
        <br>

Turno:
        <select name="turno" id="">
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
        </select> 
        <br>
        Numero de Aula <input type="text" name="no_aula" id="" value="<?php if(isset($no_aula)) echo $no_aula; ?>">
        <br>

        Año Escolar 

        <input type="number" name="año_escolar1" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar1; ?>">

        <input type="number" name="año_escolar2" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar2; ?>">
        <br>

        Documento de Identidad - Docente en Aula <input type="number" name="id_doc_docent_normal" id="" value="<?php if(isset($id_doc_docent_normal)) echo $id_doc_docent_normal; ?>">

        <br>
        Documento de Identidad - Docente Educacion Fisica <input type="number" name="id_doc_educ_fisica" id="" value="<?php if(isset($id_doc_educ_fisica)) echo $id_doc_educ_fisica; ?>">

        <br>
        Documento de Identidad - Docente Arte y Cultura <input type="number" name="id_doc_docent_arte_cultura" id="" value="<?php if(isset($id_doc_docent_arte_cultura)) echo $id_doc_docent_arte_cultura; ?>">
        <br>

    <input type="submit" value="Registrar" name="registrar">
    </form>
<br>
<a href="clases.php">Volver</a>
        

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }

    ?>

<?php require '../../includes/footer.php' ?>
