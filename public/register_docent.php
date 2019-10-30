<?php
require '../database/connect.php';
require '../functions/functions.php';
global $db;
$errors = array();

if (!empty($_POST)) {

    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $id_doc = htmlentities(addslashes($_POST["id_doc"]));
    $nombres = htmlentities(addslashes($_POST["nombre"]));
    $apellido_p = htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_m = htmlentities(addslashes($_POST["apellido_m"]));
    $sexo = htmlentities(addslashes($_POST["sexo"]));    
    $tipo_docent = htmlentities(addslashes($_POST["tipo_docent"]));    
    $fecha_nac = htmlentities(addslashes($_POST["fecha_nac"]));    
    $lugar_nac = htmlentities(addslashes($_POST["lugar_nac"]));    
    $direcc_hab = htmlentities(addslashes($_POST["direcc_hab"]));    
    $tlf_cel = htmlentities(addslashes($_POST["tlf_cel"]));    
    $tlf_local = htmlentities(addslashes($_POST["tlf_local"]));    
    $correo = htmlentities(addslashes($_POST["correo"])); 
    $estado_civil = htmlentities(addslashes($_POST["estado_civil"])); 
    $turno = htmlentities(addslashes($_POST["turno"])); 

    
if(validar_datos_vacios_sin_espacios($nacionalidad, $id_doc,$sexo,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno) || validar_datos_vacios($nombres,$tipo_docent,$apellido_p,$apellido_m,$lugar_nac,$direcc_hab,$turno)){
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

    
    registrar_docentes($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$tipo_docent,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno);
    header("Location:docentes.php");
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


    <h2>Registro de Docentes</h2>

    <h3>Registrar Docente</h3>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <br>
        Nacionalidad:
        <select name="nacionalidad" id="" autocomplete="on">
            <option value="1">Venezolano/a</option>
            <option value="2">Extrangero/a</option>
        </select>

        <br>
        Documento de Identidad <input type="number" name="id_doc" id="" value="<?php if(isset($id_doc)) echo $id_doc; ?>">

        <br>
        Nombres:
        <input type="text" name="nombre" id="" value="<?php if(isset($nombres)) echo $nombres; ?>" >
        
        <br>
        Apellido Paterno:
        <input type="text" name="apellido_p" id="" value="<?php if(isset($apellido_p)) echo $apellido_p; ?>">
        

        <br>
        Apellido Materno:
        <input type="text" name="apellido_m" id="" value="<?php if(isset($apellido_m)) echo $apellido_m; ?>">
       
        <br>
        Sexo:
        <select name="sexo" id="">
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
        </select>

        <br>
        Tipo de Docente: 
        <select name="tipo_docent" id="">
            <option value="1">Normal</option>
            <option value="2">Educuacion Fisica</option>
            <option value="3">Arte y Cultura</option>
        </select>
        <br>

        Fecha de Nacimiento:
        <input type="date" name="fecha_nac" id="" value="<?php if(isset($fecha_nac)) echo $lugar_nac; ?>">
        <br>
        Lugar de Nacimiento:
        <input type="text" name="lugar_nac" id="" value="<?php if(isset($lugar_nac)) echo $lugar_nac; ?>">
        
        <br>
        Direccion de Habitacion:
        <input type="text" name="direcc_hab" id="" value="<?php if(isset($direcc_hab)) echo $direcc_hab; ?>">

        <br>
        Telefono Celular:
        <input type="number" name="tlf_cel" id="" value="<?php if(isset($tlf_cel)) echo $tlf_cel; ?>">

        <br>
        Telefono Local:
        <input type="number" name="tlf_local" id="" value="<?php if(isset($tlf_local)) echo $tlf_local; ?>">
        <br>
        Correo:
        <input type="email" name="correo" id="" value="<?php if(isset($correo)) echo $correo; ?>">
        
        <br>
        Estado Civil:
        <select name="estado_civil" id="">
            <option value="1">Soltero/a</option>
            <option value="2">Casado/a</option>
            <option value="3">Divorciado/a</option>
            <option value="4">Viudo/a</option>
        </select>
        
        <br>
        Turno:
        <select name="turno" id="">
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
        </select> 
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