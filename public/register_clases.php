<?php
require '../database/connect.php';
require '../functions/functions.php';
global $db;
$errors = array();

if(!empty($_POST)){

    $grado = htmlentities(addslashes($_POST["grado"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
    
    $no_aula = htmlentities(addslashes($_POST["no_aula"]));
    
    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));
    
    $id_doc_docent_normal = htmlentities(addslashes($_POST["id_doc_docent_normal"]));
    $id_doc_educ_fisica = htmlentities(addslashes($_POST["id_doc_educ_fisica"]));
    
    $id_doc_docent_arte_cultura = htmlentities(addslashes($_POST["id_doc_docent_arte_cultura"]));
    
if(validar_datos_vacios_sin_espacios($grado,$turno,$no_aula,$anio_escolar1,$anio_escolar2,$id_doc_docent_normal,$id_doc_educ_fisica,$id_doc_docent_arte_cultura)){
    $errors[]= "Se deben evitar campos y no pueden poseer espacios";
}else{

    $errors[]= validar_grado($grado);
    $errors[]= validar_seccion($seccion);
    $errors[]= validar_anio_escolar($anio_escolar1,$anio_escolar2);
    $errors[] = comprobar_no_aula($no_aula); 

 if (is_string(valid_ci($id_doc_docent_normal))){$errors[]="La Cedula del docente normal es inavlida";} 

 if (is_string(valid_ci($id_doc_educ_fisica))){$errors[]="La Cedula del docente de Educacion fisica es inavlida";} 

 if (is_string(valid_ci($id_doc_docent_normal))){$errors[]="La Cedula del docente de Arte y Cultura es inavlida";} 



}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="./style.css">

    <title>Registro de Docentes</title>
</head>
<body>

          <header class="top">
       <ul>
        <li><img src="../img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
      </ul>
     </header>


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

        <input type="text" name="seccion" id="" value="<?php if(isset($seccion)) echo $seccion; ?>">
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

        Documento de Identidad - Docente Normal <input type="number" name="id_doc_docent_normal" id="" value="<?php if(isset($id_doc_docent_normal)) echo $id_doc_docent_normal; ?>">

        <br>
        Documento de Identidad - Docente Educacion Fisica <input type="number" name="id_doc_educ_fisica" id="" value="<?php if(isset($id_doc_educ_fisica)) echo $id_doc_educ_fisica; ?>">

        <br>
        Documento de Identidad - Docente Arte y Cultura <input type="number" name="id_doc_docent_arte_cultura" id="" value="<?php if(isset($id_doc_docent_arte_cultura)) echo $id_doc_docent_arte_cultura; ?>">
        <br>

    <input type="submit" value="Registrar" name="registrar">
    </form>

        
    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }

    ?>
        <section class="piedepagina"></section>
            <script src="./js/jquery-3.1.1.min.js"></script>
            <script src="./js/sweetalert2.min.js"></script>
            <script src="./js/bootstrap.min.js"></script>
            <script src="./js/material.min.js"></script>
            <script src="./js/ripples.min.js"></script>
            <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="./js/main.js"></script>

<script>
                $.material.init();
            </script>

</body>
</html>