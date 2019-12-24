<?php 

    session_start();

require '../../includes/head.php';

 valid_inicio_sesion('1');

?>
	    <title>Usuarios</title>
	    
<?php require '../../includes/header.php'; ?>	   

	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Cédula" name="ci_user" value="<?php if(isset($ci)) echo $ci;?>">

			<button id=button class="icon-search" type="submit" name="especifico" value="especifico">Buscar</button>
			<br>

			<button id=button class="icon-search" type="submit" name="todos" value="todos">Todos</button>

		<br>
						<select name="id_tipo_usr">
				
				<option value="0">Inabilitado</option>
				<option value="1">Administrador</option>
				<option value="2">Normal</option>
				<option value="3">Invitado</option>

			</select>

						<button id=button class="icon-search" type="submit" name="busc_tip_usr" value="busc_tip_usr">Tipo de Usuario</button>



			<br>
		</form>

<?php

			// Proceso Para ver todos los usuarios
			
			if (!empty($_POST['todos'])){

			$result=mostrar_users_todos();
			}		

				// Proceso para ver usuarios especifico segun su cedula

		if (!empty($_POST['especifico'])){

			$ci = htmlentities(addslashes($_POST['ci_user']));

			// Validacion del dato cedula

		if (validar_datos_vacios_sin_espacios($ci)) { $errors[] = "La cedula no puede estar vacia ni poseer espacios";}
		
		if(!exist_user($ci)){$errors[] = "No existe el usuario";}	

		$errors[]=valid_ci($ci);

		// Si no hay errores se guarda la consulta segun la cedula
		if (!comprobar_msjs_array($errors)) {
		 mostrar_user_especifico($ci);
		}
			}

			if (!empty($_POST['busc_tip_usr'])){
				$id_tip_usr = $_POST['id_tipo_usr'];

			if (!exist_tipo_user($id_tip_usr)) {

				$errors[] = "Por los momentos no se encuentran usuarios de este tipo";

			}else{
			mostrar_users_tipos($id_tip_usr);
			}
			}		


if (!empty($_POST['reiniciar'])) {
$id_usr=$_POST['reiniciar'];

$errors[]=" Esta seguro de reiniciar el usuario ".$id_usr."
<br>
		<form action=".$_SERVER['PHP_SELF']." method='post'>

<button type='submit' value='La operacion ha sido cancelada' name='cancel'>Cancelar</button>

<button type='submit' value=".$id_usr." name='confirmar_reinicio' >Confirmar</button>

	</form>
";

}




if (!empty($_POST['confirmar_reinicio'])) {
	
		$id_usr=$_POST['confirmar_reinicio'];
		delete_usr($id_usr);

		$errors[]=" El usuario: ".$id_usr." ha sido reiniciado por lo que debe volver a registrarse";

}

if (!empty($_POST['modificar'])){

	$id_usr=$_POST['modificar'];

mostrar_user_especifico($id_usr);

	?>

<br><hr>

				<h3>Modificacion de Usuario</h3>

		<div>	
	    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

			<select name="tipo_usr">
				
				<option value="0">Inabilitado</option>
				<option value="1">Administrador</option>
				<option value="2">Normal</option>
				<option value="3">Invitado</option>

			</select>
			<br>
			<br>
       <?php echo "<button type='submit' value=".$id_usr." name='guardar'>Guardar</button>";

       echo "<button type='submit' value='La operacion ha sido cancelada' name='cancel'>Cancelar</button>";

	/*echo "<br><a href=".$_SERVER['PHP_SELF']."?msj=Operacion&nbsp;Cancelada>Cancelar</a>";*/

?>
		
		</form>
</div>
<?php

}


if (!empty($_POST['guardar'])) {


	$id_usr=$_POST["guardar"];

    $tipo_usr = htmlentities(addslashes($_POST["tipo_usr"]));

    modificar_user($id_usr,$tipo_usr);

	echo "<p>Cambios Realizados</p>";

	mostrar_user_especifico($id_usr);

}

		if(!empty($_POST['cancel'])){
		$cancel=$_POST['cancel'];
		$errors[]=$cancel;
		}

?>


				<?php require '../../includes/menu_bar.php' ?>

            </div>
	    </section>

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<h4 style = 'margin-top:0%;'>$msjs</h4>";
        }
    }


}

?>

<?php require '../../includes/footer.php'; ?>
