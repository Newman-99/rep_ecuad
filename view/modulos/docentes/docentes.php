<?php
require '../../includes/head.php';

 valid_inicio_sesion('3');
?>
	    <title>Docentes</title>
		
		<?php require '../../includes/header.php' ?>
	   



	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Ingrese Cedula" name="ci_docente" value="<?php if(isset($ci)) echo $ci;?>">

			<button id=button class="icon-search" name="por_cedula" value="por_cedula" type="submit">Buscar</button>

			<br>

			<button id=button class="icon-search" type="submit" name="todos" value="todos">Todos</button>			

			<br>

						<select name="id_tipo_docent">
				
				<option value="1">En Aula</option>
				<option value="2">Educacion Fisica</option>

				<option value="3">Arte y Cultura</option>

			</select>


			<button id=button class="icon-search" type="submit" name="por_tipo" value="por_tipo">Buscar</button>
		
		<br>

		<select name="id_estado_docent">
				
				<option value="1">Activo</option>
				<option value="2">Inactivo</option>
			</select>


			<button id=button class="icon-search" type="submit" name="por_estado" value="por_estado">Buscar</button>
			
			<br>
		<select name="id_docent_turno">
				
				<option value="1">Mañana</option>
				<option value="2">Tarde</option>
				<option value="3">Mixto</option>

			</select>


			<button id=button class="icon-search" type="submit" name='por_turno' value="por_turno">Buscar</button>


		</form>


			<br>
			<a href="register_docent.php" style="float:right;margin-top:80px;margin-right:180px;" id=registrer class="icon-add">Registrar Nuevo Docente</a>

			<br>
	
		<?php 

	if(!empty($_POST['por_turno'])){

	$id_docent_turno = htmlentities(addslashes($_POST["id_docent_turno"]));

	 mostrar_docente_turno($id_docent_turno);

	}

	if(!empty($_POST['por_estado'])){

	$id_estado_docent = htmlentities(addslashes($_POST["id_estado_docent"]));

	 mostrar_docente_estado($id_estado_docent);


	}

	if(!empty($_POST['por_tipo'])){

	$id_tipo_docent = htmlentities(addslashes($_POST["id_tipo_docent"]));

			mostrar_docente_tipos($id_tipo_docent);
	}


	if(!empty($_POST['todos'])){
			mostrar_docente_todos();
	}

		if(!empty($_POST['por_cedula'])){

            $ci = htmlentities(addslashes($_POST["ci_docente"]));
			
			if (validar_datos_vacios_sin_espacios($ci)) { 

		$errors[] = "La cedula no puede estar vacia ni poseer espacios";}
		
		$errors[]=valid_ci($ci);

		if(!validar_exist_docente($ci)){$errors[] = "No existe el Docente";}	

		// Si no hay errores se guarda la consulta segun la cedula
	
		if (!comprobar_msjs_array($errors)) {

		 //mostrar_docente_todos();

		mostrar_docente_cedula($ci);
		}
}

?>
				<?php include '../../includes/menu_bar.php' ?>

            </div>
	    </section>

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<h4 style = 'margin-top:0%;'>$msjs</h4>";
        }
    } 

include '../../includes/footer.php';
 }
?>


