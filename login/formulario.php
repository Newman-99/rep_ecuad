<?php
require '../database/connect.php';
require '../functions/functions.php';


if (!empty($_POST)) {

    }

    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login |CódigoMasters|</title>
    <link rel="stylesheet" href="/../public/css/estilos.css">
</head>
<body >
    
    <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        
        <div class="formulario">
            <h2>Iniciar Sesión</h2>
            <form action="#">
                <input type="text" placeholder="Número de Cédula" required>
                <input type="password" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
       
        
        <div class="formulario">
            <h2>Crea tu Cuenta</h2>
   
    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" autocomplete="on">

    Cedula: <input type="number" name="ci" value="<?php if(isset($ci)) echo $ci; ?>" placeholder="Número de Cédula" required> 

    contraseña: <input type="text" name="password" value="<?php if(isset($pass)) echo $pass; ?>" placeholder="Contraseña" required>>
    
       <p> Corfirmar contraseña: <input type="password" name="pass_confir" value="<?php if(isset($pass_c)) echo $pass_c; ?>" placeholder="Confirmar Contraseña" required>
                                
                <input type="submit" value="register">
            </form>
        </div>
        <div class="reset-password">
            <a href="#">Olvide mi Contraseña?</a>
        </div>
    </div>
    <script src="../public/js/jquery-3.1.1.min.js"></script>    
    <script src="../public/js/main.js"></script>
</body>
</html>