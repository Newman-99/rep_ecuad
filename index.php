<?php
require './database/connect.php';
require './functions/functions.php';
global $db;
$errors = array();

if (!empty($_POST)) {

    $ci = htmlentities(addslashes($_POST["ci"]));
    $pass = htmlentities(addslashes($_POST["pass"]));

    if(valid_dat($pass,$ci)){
        $errors[]= "Debe llenar todos los campos y evitar los espacios";
    }
              elseif(is_string(valid_ci($ci))){
                $errors[]= valid_ci($ci);
        }else{

            if(is_string(ingreso_user($ci,$pass))){ 
                $errors[] = ingreso_user($ci,$pass);
        }else{
            ingreso_user($ci,$pass);
            session_start();
            $_SESSION['id_user'] = $ci;
            $_SESSION['nivel_usuario'] = obtener_nivel_permiso($ci);
            header("Location: ./public/dashboard.php");
        }

        }
    }
    

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpor t" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<title>Ingresar Sesion</title>
     
    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">

    Cedula: <input type="text" name="ci" value="<?php if(isset($ci)) echo $ci; ?>">

    Contraseña: <input type="text" name="pass"  value="<?php if(isset($pass)) echo $pass; ?>">
    
    <input type="submit" value="Enviar" name="enviar">
    
    </form>

    <p>No tienes una cuenta?, <a href="login/register.php">Registrate Aqui</a></p>

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }
    ?>
</body>
</html>