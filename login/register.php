

<!DOCTYPE html>
<html lang="en">
<head>
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="./css/styles.css">
        <link rel="stylesheet" href="../public/style.css">
    <title>Registro</title>
</head>
    <body class="textw" style="background: url(../img/IMG_20150610_132427.jpg) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
">
          <header class="top">
       <ul>
        <li><img src="../img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
      </ul>
     </header>

    
<title>Registro</title>

    <div id="ingres_secc">
    <h3>Registrate</h3>
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