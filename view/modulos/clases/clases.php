<?php
require '../../includes/init_system.php'; 
require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('3');

		$errors = array();

		if(!empty($_POST)){

    $grado = htmlentities(addslashes($_POST["grado"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
        
    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));
}

//  $id_clase= generador_id_clases($grado,$seccion,$anio_escolar1,$anio_escolar2,$turno);

?>

	    <title>Clases</title>

    <?php require '../../includes/header.php'; ?>	   

	<section>			
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"
>
        Grado Escolar:
        <select name="grado" id="" autocomplete="on">
            <option value=''>Todos</option>
            <option value="1">1ro</option>
            <option value="2">2do</option>
            <option value="3">3ro</option>
            <option value="4">4to</option>
            <option value="5">5to</option>
            <option value="6">6to</option>

        </select>


        Seccion 
            <select name="seccion" id="" autocomplete="on">
         <option value="">Todos</option>
            <option <?php if(isset($seccion)) if($seccion == 'A') echo 'selected';?> value="A">A</option>
            <option <?php if(isset($seccion)) if($seccion == 'B') echo 'selected';?> value="B">B</option>
            <option <?php if(isset($seccion)) if($seccion == 'C') echo 'selected';?> value="C">C</option>
            <option <?php if(isset($seccion)) if($seccion == 'D') echo 'selected';?> value="D">D</option>
            <option <?php if(isset($seccion)) if($seccion == 'E') echo 'selected';?> value="E">E</option>
            <option <?php if(isset($seccion)) if($seccion == 'F') echo 'selected';?> value="F">F</option>
        </select>

		Turno:
        <select name="turno" id="">
        	 <option value=''>Todos</option>
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
        </select> 

        Año Escolar 

        <input type="number" name="año_escolar1" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar1; ?>">

        <input type="number" name="año_escolar2" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar2; ?>">
		


		<button id=button class="icon-search" type="submit" name="buscar">Buscar</button>

			<a href="register_clases.php" style="float:right;margin-top:80px;margin-right:180px;" id='registrer' class="icon-add">Registrar Nueva Clase</a>


		</form>
 
<br><br>
   

	<?php 	


	if (!empty($_POST)){


    $grado = htmlentities(addslashes($_POST["grado"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
    
//    $no_aula = htmlentities(addslashes($_POST["no_aula"]));
    
    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));

    if (!empty($grado)){

    		$errors[]= validar_grado($grado);
    	}

    	    if (!empty($seccion)){
    $errors[]= validar_seccion($seccion);
    }

    if (!empty($anio_escolar1) ||  !empty($anio_escolar2)){
    $errors[]= validar_anio_escolar($anio_escolar1,$anio_escolar2);
    }

    // $errors[] = comprobar_no_aula($no_aula); 
		

			if(!comprobar_msjs_array($errors)){



		$sql="SELECT cl.grado,cl.id_clase,cl.seccion,cl.no_aula,cl.id_clase,
tr.descripcion, 
cl.anio_escolar1,cl.anio_escolar2
FROM 
clases cl
INNER JOIN turnos tr ON cl.id_turno = tr.id_turno";


  $where = [];

  $campos = [];

  if (!empty($grado)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'grado = :grado');
    /* Preparamos los datos para la variable preparada */
    $campos[':grado'] = [
      'valor' => $grado,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

    if (!empty($seccion)) {
    array_push($where, 'seccion = :seccion');
    $campos[':seccion'] = [
      'valor' => $seccion,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


    if (!empty($turno)) {
    array_push($where, 'id_turno = :turno');
    $campos[':turno'] = [
      'valor' => $turno,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

 if (!empty($anio_escolar1)) {
    array_push($where, 'anio_escolar1 = :anio_escolar1');
    $campos[':anio_escolar1'] = [
      'valor' => $anio_escolar1,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($anio_escolar2)) {
    array_push($where, 'anio_escolar2 = :anio_escolar2');
    $campos[':anio_escolar2'] = [
      'valor' => $anio_escolar2,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }
  $result = $db->prepare($sql);

  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }
  //$resultado = 
  $result->execute();
/*
$count=$result->num_rows;

var_dump($count);
*/
if ($result->rowCount() == 0) {
	$errors[] = "No hay criterios que concidan con su busqueda";
	}else{
					?>


	        <div>
 	            <table class="tabla" border="1">
 		            <thead>
 			            <tr>
						 <th> Grado </th> 
						 <th> Seccion </th> 
						 <th> Numero de Aula </th> 
						 <th> Turno </th> 
						 <th> Año Escolar </th> 
						 <th> Estadisticas </th>
<div style='position: relative;border-color:white;'><br><p>$msjs<p></div>
						 <th></th>
 			            </tr>
 		            </thead>
				
				<?php
 		            while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 				?>
 		            <tr>
 			            <td><?php echo $registro['grado'];?></td> 
						<td><?php echo $registro['seccion'];?></td>
						<td><?php echo $registro['no_aula'];?></td>
						<td><?php echo $registro['descripcion'];?></td> 
						<td><?php echo $registro['anio_escolar1']."-".$registro['anio_escolar2'];?></td>

						<?php $id_clase=$registro['id_clase']; ?>
						<td> 

            Estudiantes Activos: <?php echo tipo_student_x_contrato_clas($id_clase,'3');?>
						<br><br>
            Estudiantes Irregulares: <?php echo tipo_student_x_clase($id_clase,'4');?>
						<br><br>
            Estudiantes Retirados: <?php echo tipo_student_x_clase($id_clase,'2');?>
            <br><br>
            Estudiantes Transferidos: <?php echo tipo_student_x_contrato_clas($id_clase,'2');?>
						<br><br>
            Estudiantes Varones: <?php echo tipo_sexo_student_x_clase($id_clase,'1');?>
            <br><br>
            Estudiantes Femenino: <?php echo tipo_sexo_student_x_clase($id_clase,'2');?>
             
             <td>

					<!--
					<form action="info_docent.php" method="post">
						 <button id="button-modi" class="icon-list1" type="submit" name='docent_asig' value="<?php echo $registro['id_clase'] ?>">Mas Informacion</button>
					</form>
              <br><br>
-->
          <form action="estudiantes_asigandos.php" method="post">
             <button id="button-modi" class="icon-list1" type="submit" name='estudiantes_asigandos' value="<?php echo $registro['id_clase'] ?>">Estudiantes</button>
          </form>
              <br><br>
		
					<form action="asignar_docentes.php" method="post">
						 <button id="button-modi" type="submit" name='docent_asig' value="<?php echo $registro['id_clase'] ?>">Docentes</button>
					</form>
              <br><br>
					
					<form action="modificar_clase.php" method="post">
					<button id="button-modi" type="submit" name='modif_clas' value="<?php echo $registro['id_clase'] ?>">Modificar</button>
					</form>


					<br><br>
				</td>

				<?php }

				}

			}

	 } 
	
	?>

			</table>
           	</div>

				<?php include '../../includes/menu_bar.php' ?>

<?php

    imprimir_msjs($errors);

  ?>

<?php require '../../includes/footer.php' ?>
