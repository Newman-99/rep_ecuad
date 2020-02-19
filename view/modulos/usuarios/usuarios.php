<?php require '../../includes/init_system.php'; ?>

<?php 

    session_start();

require '../../includes/head.php';

 valid_inicio_sesion('1');

$errors = array();
?>

	    <title>Usuarios</title>
	    
<?php require '../../includes/header.php'; ?>	   

	<section>
		<div class="nav-h">
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			<div class="text-center">

			<input type="search" class="col-3 mx-3" placeholder="Cédula" name="ci_user" value="<?php if(isset($ci)) echo $ci;?>">
				<label for="">Buscar por:</label>
				<select name="id_tipo_usr" class="mx-3">
				<option value="">Todos</option>				
				<option value="0">Inabilitado</option>
				<option value="1">Administrador</option>
				<option value="2">Normal</option>
				<option value="3">Invitado</option>
			</select>

				<div class="text-center">
				<button id='' class=" btn btn-primary col-3" type="submit" name="busc" value="busc">Buscar</button>
				</div>
			</div>
		</form>
	</div>

	
<?php
			// Proceso Para ver todos los usuarios
				// Proceso para ver usuarios especifico segun su cedula
		if (!empty($_POST['busc'])){


			$ci = htmlentities(addslashes($_POST['ci_user']));

			$id_tipo_usr = htmlentities(addslashes($_POST['id_tipo_usr']));


			$sql=mostrar_users_todos();


		  $where = [];

  $campos = [];

  if (!empty($ci)) {
    array_push($where,'s.id_doc = :ci');
    $campos[':ci'] = [
      'valor' => $ci,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


  if (!empty($id_tipo_usr)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'s.id_tip_usr = :id_tipo_usr');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_tipo_usr'] = [
      'valor' => $id_tipo_usr,
      'tipo' => \PDO::PARAM_INT,
    ];
  }


  if ($id_tipo_usr == '0') {
    /* Agregamos al WHERE la comparación */
    array_push($where,'s.id_tip_usr = :id_tipo_usr');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_tipo_usr'] = [
      'valor' => $id_tipo_usr,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);

  }

  $sql.=' ORDER BY s.ult_sesion DESC';
  $result = $db->prepare($sql);

  foreach($campos as $clave => $valores) {
   
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }


  $result->execute();

if ($result->rowCount() == 0) {
	$errors[] = "No hay criterios que concidan con su busqueda";
	}else{

//var_dump($result);
imprimir_usuarios($result);

}
}

if (!empty($_POST['modificar'])){

	$id_usr=$_POST['modificar'];

mostrar_user_especifico($id_usr);


if (!empty($_POST['guardar'])) {


	$id_usr=$_POST["guardar"];

    $tipo_usr = htmlentities(addslashes($_POST["tipo_usr"]));

    modificar_user($id_usr,$tipo_usr);

	echo "<p>Cambios Realizados</p>";

	mostrar_user_especifico($id_usr);

}	
	?>

<br>

		<div style="" class="nav-usr">	

				<h3>Modificacion de Usuario</h3>

	    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

			<select name="tipo_usr">
				
				<option value="0">Inabilitado</option>
				<option value="1">Administrador</option>
				<option value="2">Normal</option>
				<option value="3">Invitado</option>

			</select>
			<br>
			
       <?php echo "<button type='submit' value=".$id_usr." name='guardar' id='' class=' btn btn-dark btn-sm col-5 mx-2'>Guardar</button>";

       echo "<button type='submit' value='La operacion ha sido cancelada' name='cancel' id='' class=' btn btn-dark btn-sm col-5 mx-2'>Cancelar</button>";

	/*echo "<br><a href=".$_SERVER['PHP_SELF']."?msj=Operacion&nbsp;Cancelada>Cancelar</a>";*/

?>
		
		</form>
</div>



<?php
if (!empty($_POST['reiniciar'])) {
$id_usr=$_POST['reiniciar'];

$errors[]=" <br><br><div style='float: right ;'> Esta seguro de reiniciar el usuario ".$id_usr."
<br>
		<form action=".$_SERVER['PHP_SELF']." method='post'>

<button type='submit' value='La operacion ha sido cancelada' name='cancel' id=registrer class=''>Cancelar</button>
<br><br>
<button type='submit' value=".$id_usr." name='confirmar_reinicio' id=registrer class=''>Confirmar</button>

	</form> </div>
";

}




if (!empty($_POST['confirmar_reinicio'])) {
	
		$id_usr=$_POST['confirmar_reinicio'];
		delete_usr($id_usr);

		$errors[]=" El usuario: ".$id_usr." ha sido reiniciado por lo que debe volver a registrarse";

}

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

    imprimir_msjs($errors);


?>

<?php require '../../includes/footer.php'; ?>
