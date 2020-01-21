<?php
require  '../../../database/connect.php';

require '../../../functions/functions.php';

if (!empty($_POST['enviar'])) {

    $ci = htmlentities(addslashes($_POST['ci']));
    
    $pass = htmlentities(addslashes($_POST['pass']));

    if (!empty($_POST['pass_confirm'])) {
        
    $pass_confirm = htmlentities(addslashes($_POST['pass_confirm']));

    $pregunta1 = htmlentities(addslashes($_POST['pregunta1']));

    $pregunta2 = htmlentities(addslashes($_POST['pregunta2']));

        $errors_total=register_user($ci,$pass,$pass_confirm,$pregunta1,$pregunta2);

        if (!comprobar_msjs_array($errors_total)) {
            register_user($ci,$pass,$pass_confirm,$pregunta1,$pregunta2);
        }

    }else{
         
        $errors_total[] = login_users($ci,$pass);
            if(empty($errors_total)) {
            login_users($ci,$pass);
        }


    }

}

    
   
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="../../style/css/estilos_login.css">
    <title>Inicio</title>
</head>
<body>

    <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        
        <div class="formulario">
            <h2>Iniciar Sesión</h2>

    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">
                
            <input type="text" name="ci" value="<?php if(isset($ci)) echo $ci; ?>" placeholder="Número de Cédula" required>

            <input type="password" name="pass" value="<?php if(isset($pass)) echo $pass; ?>" placeholder="Contraseña" required>

                <input type="submit" value="iniciar" name="enviar">
            </form>
        </div>
       
        
        <div class="formulario">
            <h2>Crea tu Cuenta</h2>
    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">
                
    <input type="text" name="ci" value="<?php if(isset($ci)) echo $ci; ?>" placeholder="Número de Cédula" required> 
                
    <input type="password" name="pass" value="<?php if(isset($pass)) echo $pass; ?>" placeholder="Contraseña" required>

    <input type="password" name="pass_confirm" value="<?php if(isset($pass_confirm)) echo $pass_confirm; ?>" placeholder="Confirmar Contraseña" required>


    <input type="password" name="pregunta1" value="<?php if(isset($pregunta1)) echo $pregunta1; ?>" placeholder="   ¿Cual es su artista favorito?" required>

    <input type="password" name="pregunta2" value="<?php if(isset($pregunta2)) echo $pregunta2; ?>" placeholder="¿Cual es el nombre de su primera mascota?" required>
                                
 <input type="submit" value="crear" name="enviar">
            </form>


        </div>


        <?php
        if(!empty($errors_total)){
                foreach($errors_total as $pos => $msj){
                        echo "<p style='padding:7px;'>".$msj."</p>";}};
                
                    ?>

                    <br><br>


        <div class="reset-password">
        
        <a href='recover_pass.php'>Se me olvido mi contraseña?</a>

        </div>
    </div>
   
</body>
</html>

<?php

require'../../includes/footer.php';

  ?>