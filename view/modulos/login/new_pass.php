<?php require '../../includes/init_system.php'; ?>

<?php 

$errors = array();
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

		$errors[]="Su cambio de contraseña fue exitoso <br> Ya puede iniciar sesion: 
        

  <form id='signupform' role='form' action='log.php' method='POST' autocomplete='on'>
            
            <button style='margin-top: 3px;' class='btn btn-primary btn-sm col-6' type='submit' name='exito_pass' value='exitoso'>Iniciar Sesion</button>

            </form>

        ";

		


}
}
}



require '../../includes/head.php';

?>
        <div class="contenedor">
            <div class="formulario">

            
            

    <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on" class="form-group">
                <div class="col-12">
                <h3 class="form-titulo">Nueva Contraseña</h3>
                </div>
              <div class="row">
                      <div  class="col-6">  
            <input type="password" name="pass" class="form-control" value="<?php if(isset($pass)) echo $pass; ?>" placeholder="Contraseña" >
            </div>

            <div  class="col-6">
            <input type="password" name="pass_confirm" class="form-control" value="<?php if(isset($pass_confirm)) echo $pass_confirm; ?>" placeholder="Confirmar Contraseña" >
            </div>
            </div>

            <div class="row">
            <a style="left: 30px;" class='btn btn-primary col-3' href="log.php">Volver</a>
            <button style="left: 70px;" class='btn btn-primary col-8' type='submit' name='cambiar' value='<?php echo $id_usr; ?>'>Enviar</button>
            </form>
        
            <?php
        imprimir_msjs($errors);
?>  
        </div>
 
</div>
        </div>


</body>

<?php
require'../../includes/footer.php';
  ?>

  </html>