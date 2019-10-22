<?php
require '../database/connect.php';
require '../functions/functions.php';


if (!empty($_POST)) {

    $ci = htmlentities(addslashes($_POST["ci"]));
    $pass = htmlentities(addslashes($_POST["pass"]));
    $pass_c = htmlentities(addslashes($_POST["pass_confir"]));

    $tip_usr=0;
    $pass_g="";
    

    //Validacion de datos vacios y espacios
        if(validar_datos_vacios_sin_espacios($ci,$pass,$pass_c)){
            $errors_total[] = "Debe llenar todos los campos y evitar los espacios";    
    }else{
        if(!valid_user($ci)){
            $errors_total[] = "El usuario ya existe<p></p>Si desea puede registrarse"; 
        }else{
        if(is_string(valid_ci_admin($ci)) || is_string(valid_ci($ci)) || is_array(valid_pass($pass)) || is_string(valid_pass_par($pass,$pass_c))){
            
            $errors_total = construc_msj(valid_ci_admin($ci),valid_ci($ci),valid_pass_par($pass,$pass_c),valid_pass($pass));

                        }else{
                        $pass_hash = hash_pass($pass);
                        regist_usr($ci,$pass_hash,$tip_usr,$db);
                        session_start();
                        $_SESSION['id_user'] = $ci;
                        $_SESSION['nivel_usuario'] = obtener_nivel_permiso($ci);
                        header("Location: ../public/dashboard.php");   
                    }
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
    
<title>Registro</title>

    <div id="ingres_secc">
    <h3>Registrate</h3>
        <a id="signlink" href="index.php">
        iniciar sesion</a>
        <hr>
    </div>

    <div id="sign">
     
    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">
<p>
    Cedula: <input type="number" name="ci" value="<?php if(isset($ci)) echo $ci; ?>">
</p>

    contraseña: <input type="text" name="pass" value="<?php if(isset($pass)) echo $pass; ?>">

   <p> Corfirmar contraseña: <input type="text  " name="pass_confir" value="<?php if(isset($pass_c)) echo $pass_c; ?>">
   </p>

   <input type="submit" value="Enviar" name="enviar">
    </form>

    <p>Ya tienes una cuenta?, <a href="../index.php"> Ingresa Aqui</a></p>


        <?php if(!empty($errors_total)){
                foreach($errors_total as $pos => $msj){
                        echo "<p>".$msj."</p>";}};
                
                    ?>
    <div>
</body>
</html>