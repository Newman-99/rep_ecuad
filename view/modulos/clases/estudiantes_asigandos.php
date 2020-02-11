<?php 
require '../../includes/init_system.php'; 

require '../../includes/head.php';
    $errors = array();
    session_start();
 valid_inicio_sesion('3');

if (!empty($_POST['estudiantes_asigandos'])) {
$_SESSION['id'] = $_POST['estudiantes_asigandos']; 
}
$id = $_SESSION['id'];


?>

	    <title>Estudiantes en Clase</title>
		
		<?php require '../../includes/header.php' ?>

		<h3>Estudiantes en Clase</h3>


		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		
		Estado del Estudiante
        <select name="tipo_student" id="" autocomplete="on">
            <option value=''>Todos</option>
            <option value="3">Activo</option>
            <option value="4">Irregular</option>
            <option value="5">Retirado</option>
            <option value="2">Cambiados</option>
        </select>

		Sexo
        <select name="sexo" id="" autocomplete="on">
            <option value=''>Todos</option>
            <option value="1">Varones</option>
            <option value="2">Hembras</option>
        </select>

		Alfabeticamente
        <select name="alfabet" id="" autocomplete="on">
            <option value=''>Nombre</option>
            <option value="1">Apellido</option>
        </select>

		<button id=button class="icon-search" type="submit" name='filtrar' value="<?php echo $id_doc; ?>">Buscar</button>
		</form>

<?php  

		if(!empty($_POST['filtrar'])){


$tipo_student = htmlentities(addslashes($_POST['tipo_student']));

    $grado = htmlentities(addslashes($_POST["sexo"]));


    $seccion = htmlentities(addslashes($_POST["alfabet"]));
    
		

	$where = [];

  $campos = [];

  if (!empty($tipo_student)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'clas.id_estado = :tipo_student');
    /* Preparamos los datos para la variable preparada */
    $campos[':tipo_student'] = [
      'valor' => $tipo_student,
      'tipo' => \PDO::PARAM_INT,
    ];
  }
}


    if (!empty($id)){



			$sql=" SELECT DISTINCT est.ci_escolar, est.id_doc,in_p.nombre,in_p.apellido_p,in_p.apellido_m, edo.descripcion estado,es.grado grado_design, clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2,ea.id_estado FROM estudiantes est 
LEFT OUTER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc 
LEFT OUTER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar 
LEFT OUTER JOIN clases clas ON ea.id_clase = clas.id_clase 
LEFT OUTER JOIN turnos tr ON tr.id_turno = clas.id_turno 
LEFT OUTER JOIN escolaridad es ON est.ci_escolar = es.ci_escolar 
LEFT OUTER JOIN estado edo ON est.id_estado = edo.id_estado WHERE clas.id_clase =:id";
					 
			$result=$db->prepare($sql);
									
			$result->bindValue("id",$id);
			
			$result->execute();	


	        echo "<div>";
 	          echo "<table class='tabla'>
 	          <caption> Estudiantes de la Clase: ".$id."</caption>
 		            <thead>";
 			            echo"<tr>
						 <th>Cedula Escolar</th> 
						 <th>Cédula</th> 
						 <th>Nombres</th> 
						 <th>Apellidos</th> 
						 <th>Estado</th>
						 <th></th>

 			            </tr>
 		            </thead>";
 		       
 		       while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>
 		            <tr>
 			            <td><?php echo $registro['ci_escolar'] ?></td> 
						<td><?php echo $registro['id_doc'] ?></td>
						<td><?php echo $registro['nombre']?></td>
						<td><?php echo $registro['apellido_p']." ".$registro['apellido_m'] ?></td> 
						<td><?php echo $registro['estado']?></td>
						</td>
 		            </tr>

<?php 
 		          		} 

 	            echo "</table>
            </div>";
            }
?>

                 <a class="btn btn-primary btn-lg" style="position:absolute;
    			bottom:5px;
    			right:10px;" href="clases.php">Volver</a>


            

<?php

                                    imprimir_msjs($errors);

 require '../../includes/footer.php' ?>