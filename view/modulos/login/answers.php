
<?php
require  '../../../database/connect.php';

require '../../../functions/functions.php';
$errors = array();
?>


.<?php
//require '../../includes/head.php';
if (!empty($_POST['id_usr'])) {
$id_usr=$_POST['id_usr'];
}

if (!empty($_POST['answers'])) {
    $id_usr = htmlentities(addslashes($_POST["answers"]));
	$respuesta1 = htmlentities(addslashes($_POST["respuesta1"]));
    $respuesta2	 = htmlentities(addslashes($_POST["respuesta2"]));
	if (validar_datos_vacios($respuesta1,$respuesta2)) {
		$errors[] = 'Ninguna pregunta puede estar vacia';
	}else{

		if (is_array(preguntas_usrs($id_usr,$respuesta1,$respuesta2))) {
			$errors = construc_msj(preguntas_usrs($id_usr,$respuesta1,$respuesta2));
		}		

	}

	if (!comprobar_msjs_array($errors)) {
		$errors[] = "<form id='signupform' role='form' action='new_pass.php' method='POST' autocomplete='on'>
			
            <button  class='btn btn-primary col-12' type='submit' name='id_usr' value=".$id_usr.">Confirmar</button>
			
			</form>";
	}
}
require '../../includes/head.php';


?>


	<title>Preguntas</title>
</head>
<body>
	
<div class="contenedor">
	<div class="formulario">
		<br>
		<br>

 <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on" class="form-group">
		<div class="row">
	<div class="col-6">
	¿Cual es su artista favorito?
	<input type="pass" name="respuesta1" id="" class='form-control' value="<?php if(isset($respuesta1)) echo $respuesta1; ?>">
	</div>
	
	<div class="col-6">
	¿Cual es el nombre de su primera mascota? 
	<input type="pass" name="respuesta2" id="" class='form-control' value="<?php if(isset($respuesta2)) echo $respuesta2; ?>">
	</div>
		</div>

		<div class="row ">
			
			<a style="left: 30px;" class='btn btn-primary col-3 ' href="log.php">Volver</a>
			<button style="left: 70px;" class='btn btn-primary col-8 ' type='submit' name='answers' value='<?php echo $id_usr; ?>'>Enviar</button>
			</form>
		
		<?php imprimir_msjs($errors); ?>
		</div>

		<?php     

 ?>
		





</div>
</div>
    <?php
    
require '../../includes/footer.php';
  ?>