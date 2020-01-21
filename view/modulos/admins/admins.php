<?php require '../../includes/init_system.php'; ?>

<?php 
require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('2');
?>
	    <title>Administrativos</title>
		
		<?php require '../../includes/header.php' ?>
	   



	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Ingrese Cedula" name="id_doc_admin" value="<?php if(isset($_POST['id_doc_admin'])) echo $_POST['id_doc_admin'];?>">
			
			
			<button id=button class="icon-search" type="submit" name="por_cedula" value="por_cedula">Buscar</button>			

				<br>
				<br>
				
				Area: 
				<select name="id_area">
				
				<option value="">Todos</option>				
				<option value="1">Directiva</option>
				<option value="2">Estadistica</option>

				<option value="3">Pedagogica</option>

			</select>
		
		Estado: 
		<select name="id_estado">
				<option value="">Todos</option>				
				<option value="1">Habilitado</option>
				<option value="2">Inabilitado</option>

			</select>

		Turno: 
		<select name="id_turno">
			<option value="">Todos</option>	
				<option value="1">Mañana</option>
				<option value="2">Tarde</option>
			</select>


			<button id=button class="icon-search" type="submit" name="por_criterios" value="buscar_docent">Buscar</button>			


		</form>


			<br>
			<a href="reg_admin.php" style="" id=registrer class="icon-add">Registrar Nuevo Administrativo</a>

			<br>
			<?php 

	if(!empty($_POST['por_cedula'])){
	
	$id_doc_admin = htmlentities(addslashes($_POST["id_doc_admin"]));

	$errors[]=valid_ci($id_doc_admin);
	
	if(is_exist_admin($id_doc_admin)){$errors[] = "No existe el Administrativo";}

	if (!comprobar_msjs_array($errors)) {

	mostrar_cedula_admin($id_doc_admin);
	}
}

	if(!empty($_POST['por_criterios'])){


	    $id_area = htmlentities(addslashes($_POST["id_area"]));

	    $id_estado = htmlentities(addslashes($_POST["id_estado"]));

	    $id_turno = htmlentities(addslashes($_POST["id_turno"]));


$sql = consulta_admins();

  $where = [];

  $campos = [];


  if (!empty($id_area)){
    /* Agregamos al WHERE la comparación */
    array_push($where,'adm.id_area = :id_area');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_area'] = [
      'valor' => $id_area,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

  if (!empty($id_turno)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'doc.id_turno = :id_turno');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_turno'] = [
      'valor' => $id_turno,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

if (!empty($id_estado)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'est.id_estado = :id_estado');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_estado'] = [
      'valor' => $id_estado,
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

imprimir_admins($result); 

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
 
?>
