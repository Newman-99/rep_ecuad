<?php require '../../includes/init_system.php'; ?>

<?php 

require '../../includes/head.php';


if (!empty($_POST['enviar'])) {
    $ci = htmlentities(addslashes($_POST['ci']));
	if (validar_datos_vacios_sin_espacios($ci)) {
		$errors_total[] ='El campo cedula no puede poseer espacios ni estar vacia';
	}else{
		if  (valid_user($ci) || is_string(valid_user($ci))){
            $errors_total[] = "El usuario no Existe o la cedula es invalida ";
        }else{

       
        }
	}

}
	

?>
      
<head>

    <link rel="stylesheet" type="text/css" href="../../style/css/estilos_login.css">

                <link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">

</head>
    <title>Document</title>
</head>
<body>
<div class="contenedor">
        <div class="formulario">
            <h3>Cuenta que desea Recuperar</h3>
<br>
<br>
    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">
                
            <input type="text" name="ci" value="<?php if(isset($ci)) echo $ci; ?>" placeholder="Número de Cédula">

                <input type="submit" value="iniciar" name="enviar" id="button">
            </form>
        </div>
        <br>
        <br>
        <a href="log.php">Volver</a>
         $errors_total[]= "  <form id='signupform' role='form' action='answers.php' method='POST' autocomplete='on'>
            
            <button id=button class='icon-search' type='submit' name='id_usr' value=".$ci.">Confirmar</button>
            
            </form>";

</div>

<?php

        if(!empty($errors_total)){
                foreach($errors_total as $pos => $msj){
                        echo "<p style='padding:7px;'>".$msj."</p>";}};
                
?>


<?php
require'../../includes/footer.php';

 ?>