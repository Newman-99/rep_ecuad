<?php 

require '../../includes/init_system.php'; 

require '../../includes/head.php';
    $errors = array();
    session_start();
 valid_inicio_sesion('3');

if (!empty($_POST['estudiantes_asigandos'])) {
$_SESSION['id'] = $_POST['estudiantes_asigandos']; 
}

if (!isset($_SESSION['id'])) {
	header('location:estudiantes.php');
}

if (isset($_GET['clean_ci_escolar'])) {
  unset($_SESSION['ci_escolar']);
}

?>

	    <title>Estudiantes en Clase</title>
		
		<?php require '../../includes/header.php' ?>
<div class="container">
	<div class="row">    
        <div class="col-lg-12">
		
		

		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-group text-center">
		<h3 class="form-titulo">Estudiantes en Clase</h3>

		<div class="row">

			<div class="col-3 my-3">
		Estado del Estudiante
        <select name="tipo_contrato" id="" autocomplete="on" class="form-control ">
            <option value=''>Todos</option>
            <option value="3">Activo</option>
            <option value="4">Irregular</option>
            <option value="5">Retirado</option>
        </select>
			</div>

			<div class="col-3 my-3">
		Sexo
        <select name="sexo" id="" autocomplete="on" class="form-control">
            <option value=''>Todos</option>
            <option value="1">Varones</option>
            <option value="2">Hembras</option>
        </select>
			</div>
<!--
			<div class="col-3 my-3">
		Alfabeticamente
        <select name="alfabet" id="" autocomplete="on" class="form-control ">
            <option value=''>Nombre</option>
            <option value="1">Apellido</option>
        </select>
			</div>
-->
			<div class="col-3 ">
				<button  class="btn btn-primary col-8" type="submit" name='filtrar' value="<?php echo $id_doc; ?>">Buscar</button>
			</div>
		</div>
	</form>

		</div>
	</div>
</div>

<?php  

		if(!empty($_POST['filtrar'])){


$tipo_contrato = htmlentities(addslashes($_POST['tipo_contrato']));

    $sexo = htmlentities(addslashes($_POST["sexo"]));
}


			$sql=" SELECT DISTINCT est.ci_escolar, est.id_doc,in_p.nombre,in_p.apellido_p,in_p.apellido_m, edo.descripcion estado,es.grado grado_design, clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2,ea.id_estado FROM estudiantes est 
LEFT OUTER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc 
LEFT OUTER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar 
LEFT OUTER JOIN clases clas ON ea.id_clase = clas.id_clase 
LEFT OUTER JOIN turnos tr ON tr.id_turno = clas.id_turno 
LEFT OUTER JOIN escolaridad es ON est.ci_escolar = es.ci_escolar 
LEFT OUTER JOIN estado edo ON ea.id_estado = edo.id_estado ";
					 


	$where = [];

  $campos = [];

  if (!empty($tipo_contrato)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'ea.id_estado = :tipo_contrato');
    /* Preparamos los datos para la variable preparada */
    $campos[':tipo_contrato'] = [
      'valor' => $tipo_contrato,
      'tipo' => \PDO::PARAM_INT,
    ];
  }


  if (!empty($sexo)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'in_p.id_sexo = :sexo');
    /* Preparamos los datos para la variable preparada */
    $campos[':sexo'] = [
      'valor' => $sexo,
      'tipo' => \PDO::PARAM_INT,
    ];
}

    array_push($where,'clas.id_clase = :id_clase');
    /* Preparamos los datos para la variable preparada */
    $campos[':id_clase'] = [
      'valor' => $_SESSION['id'],
      'tipo' => \PDO::PARAM_STR,];


  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }

 $sql.="   GROUP BY est.ci_escolar + ea.id_estado ORDER BY in_p.nombre, es.id_actualizacion DESC,ea.id_actualizacion DESC";


  $result = $db->prepare($sql);


  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }

  $result->execute();

			echo "<div class='text-center' style='float:right;margin:20px;display: inline; background-color:white;width:30%;'><h5>Se han econtrado ".$result->rowCount()." Contratos</h5></div>";
	        echo "<div>";
                    
                   

 	          echo "<table class='tabla'>
 	          <caption> Estudiantes de la Clase: ".$_SESSION['id']."</caption>
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
						<td>
 		            
<?php    if(comprob_permisos('2')) {  ?>

                    <form action='./menu_upd_student.php' method='post'>
                        
                        <button type='submit' id='' class="btn btn-dark btn-sm col-12" value="<?php echo $registro['ci_escolar']; ?>" name ='update_student_clas'> Actualizar</button>
                    </form>

                  

                                          <?php } ?>


                        <form action='../estudiantes/mas_info_student.php' method='post'>
                        
                        <button type='submit' class=' btn btn-dark btn-sm col-12' id='' value="<?php echo $registro['ci_escolar']; ?>" name ='mas_info_student' >Mas Informacion</button>
                         
                         </form>

<br><br>
                    </td>
                       </tr>
<?php 
 		          		
 		          	}
 	            echo "</table>
            </div>";
?>

                 <a class="btn btn-primary btn-lg col-1" style="position:absolute;bottom:-300px;right:30px;" href="clases.php">Volver</a>


            

<?php

        imprimir_msjs($errors);

 require '../../includes/footer.php' ?>