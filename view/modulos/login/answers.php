
<?php
require  '../../../database/connect.php';

require '../../../functions/functions.php';

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
			
            <button id=button class='icon-search' type='submit' name='id_usr' value=".$id_usr.">Confirmar</button>
			
			</form>";
	}
}

?>

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, user-scalable=no, initial -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link rel="stylesheet" type="text/css" href="../../style/css/estilos.css">
<link rel="stylesheet" type="text/css" href="../../style/css/styless.css">
	    <link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">

	<title>Preguntas</title>
</head>
<body>
	
<div class="contenedor">
	<div class="formulario">
		<br>
		<br>

 <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">
	
	¿Cual es su artista favorito?
	<input type="pass" name="respuesta1" id="" value="<?php if(isset($respuesta1)) echo $respuesta1; ?>">
	<br>
	<br>
	¿Cual es el nombre de su primera mascota? 
	<input type="pass" name="respuesta2" id="" value="<?php if(isset($respuesta2)) echo $respuesta2; ?>">

            <button id=button class='icon-search' type='submit' name='answers' value='<?php echo $id_usr; ?>' style="color: #fff;">Enviar</button>

            <br><br><br><br>
<a href="log.php">Volver</a>



</form>
<?php     
        if(!empty($errors)){

imprimir_msjs($errors);
}
 ?>

</div>
</div>
    <?php
    
require'../../includes/footer.php';
  ?>