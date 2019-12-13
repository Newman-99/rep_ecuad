<?php
require '../../includes/head.php';
if (!empty($_POST)) {

    $ci = htmlentities(addslashes($_POST['ci']));
    
    $pass = htmlentities(addslashes($_POST['pass']));

    if (!empty($_POST['pass_confirm'])) {
        
    $pass_confirm = htmlentities(addslashes($_POST['pass_confirm']));

        $errors_total=register_user($ci,$pass,$pass_confirm);

        if (!comprobar_msjs_array($errors_total)) {
            register_user($ci,$pass,$pass_confirm);
        }

    }else{
         
        $errors_total[] = login_users($ci,$pass);
            if(empty($errors_total)) {
            login_users($ci,$pass);
        }


    }

}

    
   
?>
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
            <a href="#">Olvide mi Contraseña?</a>
        </div>
    </div>
    
</body>
</html>

<?php

require'../../includes/footer.php';

  ?>