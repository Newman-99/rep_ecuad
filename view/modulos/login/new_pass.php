<?php 
require '../../includes/head.php';
if (!empty($_POST['id_usr'])) {
$id_usr=$_POST['id_usr'];
}

if (!empty($_POST['cambiar'])) {
    $id_usr = htmlentities(addslashes($_POST['cambiar']));
    $pass = htmlentities(addslashes($_POST['pass']));
    $pass_confirm = htmlentities(addslashes($_POST['pass_confirm']));

	if (validar_datos_vacios($pass,$pass_confirm)) {
		$errors[] = 'Debe evitar los campos vacios';
	}else{

if (is_array(valid_pass($pass)) || is_string(valid_pass_par($pass,$pass_confirm))) {

            $errors = construc_msj(valid_pass_par($pass,$pass_confirm),valid_pass($pass));

}else{

			$pass_hash=hash_pass($pass);
			cambiar_pass($id_usr,$pass_hash);

		$errors[]="Su cambio de contraseña, usuario: ".$id_usr." fue exitoso <br> Ya puede iniciar sesion: <br>
        <br>

  <form id='signupform' role='form' action='log.php' method='POST' autocomplete='on'>
            
            <button id=button class='icon-search' type='submit' name='exito_pass' value='exitoso'>Iniciar Sesion</button>

            </form>

        ";

		


}
}
}




?>
<head>

<link rel="stylesheet" type="text/css" href="../../style/css/estilos_login.css">

<link rel="stylesheet" type="text/css" href="../../style/css/estilos.css">

                <link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">

</head>
    <title>Document</title>
</head>
<body>

        <div class="contenedor">
            <div class="formulario">

            <h3>Nueva Contraseña</h3>
            <br>
            <br>

    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">
                
            <input type="password" name="pass" value="<?php if(isset($pass)) echo $pass; ?>" placeholder="Contraseña" >
            <br>
            <br>
            <input type="password" name="pass_confirm" value="<?php if(isset($pass_confirm)) echo $pass_confirm; ?>" placeholder="Confirmar Contraseña" >
            <br>
            <br>
            <button id=button class='' type='submit' name='cambiar' value='<?php echo $id_usr; ?>'>Enviar</button>
            </form>

            <a href="log.php">Volver</a>


<?php     
        if(!empty($errors)){
imprimir_msjs($errors);
}
 ?>

            </div>
        </div>


</body>

<?php
require'../../includes/footer.php';
  ?>

  </html>