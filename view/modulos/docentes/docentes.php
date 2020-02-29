<?php require '../../includes/init_system.php'; ?>
<?php

require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('3');

$errors=array();
?>
	    <title>Docentes</title>
		
		<?php require '../../includes/header.php' ?>
	   
	<section>
	<div class="nav-h"><!----- DIV contenedor BARRA NAVEGACION HORIZONTAL ----->
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		<div class="text-center">

			<input type="search" class="col-3 mx-4" placeholder="Ingrese Cedula" name="ci_docente" value="<?php if(isset($_POST['ci_docente'])) echo $_POST['ci_docente'];?>">
			
			<!--
			<button id=button class="" type="submit" name="por_cedula" value="por_cedula">Buscar</button> -->
				
				<label for="">Sexo:</label>
      				<select name="sexo" id="" class="mx-2">
        			<option value="">Todos</option>
        			<option value="1">Masculino</option>
        			<option value="2">Femenino</option>
      				</select>

				Funcion: 
				<select name="id_funcion_docent" class="mx-2">
				<option value="">Todos</option>				
				<option value="1">En Aula</option>
				<option value="2">Educacion Fisica</option>
				<option value="3">Arte y Cultura</option>

			</select>
		
				Estado: 
			<select name="id_estado_docent" class="mx-2">
				<option value="">Todos</option>				
				<option value="1">Activo</option>
				<option value="2">Inactivo</option>

			</select>

			Turno: 
		<select name="id_docent_turno" class="mx-2">
			<option value="">Todos</option>	
				<option value="1">Mañana</option>
				<option value="2">Tarde</option>
			</select>
	</div>
			<div class="text-center">
			<button id="" class=" btn btn-primary col-2 mx-3" type="submit" name="por_criterios" value="buscar_docent">Buscar</button>		
			<a href="register_docent.php"  id="" class=" btn btn-primary col-3">Registrar Nuevo Docente</a>
			</div>

		</form>

	</div> <!----- FIN - DIV contenedor BARRA NAVEGACION HORIZONTAL ----->
	
		<?php 



	if(!empty($_POST['por_criterios'])){


	$id_doc = htmlentities(addslashes($_POST["ci_docente"]));
		
	
	$sexo = htmlentities(addslashes($_POST["sexo"]));


	    $id_funcion_docent = htmlentities(addslashes($_POST["id_funcion_docent"]));

	    $id_estado_docent = htmlentities(addslashes($_POST["id_estado_docent"]));

	    $id_docent_turno = htmlentities(addslashes($_POST["id_docent_turno"]));


$sql = consulta_docentes();

  $where = [];

  $campos = [];


  if (!empty($id_doc)){
    array_push($where,'in_p.id_doc = :id_doc');
    $campos[':id_doc'] = [
      'valor' => $id_doc,
      'tipo' => \PDO::PARAM_STR,
    ];
  }



  if (!empty($sexo)){
    array_push($where,'in_p.id_sexo = :sexo');
    $campos[':sexo'] = [
      'valor' => $sexo,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

  if (!empty($id_funcion_docent)){
    /* Agregamos al WHERE la comparación */
    array_push($where,'doc.id_funcion_predet = :id_funcion_docent');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_funcion_docent'] = [
      'valor' => $id_funcion_docent,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

  if (!empty($id_docent_turno)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'doc.id_turno = :id_docent_turno');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_docent_turno'] = [
      'valor' => $id_docent_turno,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

if (!empty($id_estado_docent)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'est.id_estado = :id_estado_docent');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_estado_docent'] = [
      'valor' => $id_estado_docent,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

    if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }
  $result = $db->prepare($sql);

  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }


  $result->execute();

if ($result->rowCount() == 0) {
	$errors[] = "No hay criterios que concidan con su busqueda";
	}else{

imprimir_docentes($result); 

}


		}

?>
				<?php include '../../includes/menu_bar.php' ?>

            </div>
	    </section>

<div style="position: relative;">
<?php

imprimir_msjs($errors); 

 
?>
</div>

<?php include '../../includes/footer.php';
 ?>

