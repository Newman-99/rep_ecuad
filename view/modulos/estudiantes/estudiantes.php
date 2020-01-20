<?php 
require  '../../includes/head.php';
$errors = array();
 session_start();
 valid_inicio_sesion('3');

?>
	    <title>Estudiantes</title>
	    
<?php require '../../includes/header.php'; ?>	


	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Cédula escolar o normal" name="ci_estudiante" value="<?php if(isset($ci)) echo $ci;?>">
			<br>

		Estado del Estudiante
        <select name="estado_student" id="" autocomplete="on">
            <option value=''>Todos</option>
            <option value="3">Activo</option>
            <option value="4">Irregular</option>
            <option value="5">Retirado</option>
        </select>
		<br>

        Grado Escolar Designado:
        <select name="grado_design" id="" autocomplete="on">
            <option value=''>Todos</option>
            <option value="1">1ro</option>
            <option value="2">2do</option>
            <option value="3">3ro</option>
            <option value="4">4to</option>
            <option value="5">5to</option>
            <option value="6">6to</option>
        </select>

<br>
		Por clase - 

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

			<button id=button name="por_cedula" class="icon-search" type="submit">Buscar</button>

			<a href="./register_student/reg-estudiante-1.php" style="float:right;margin-top:80px;margin-right:180px;">Registrar Nuevo Estudiante</a>

		</form>

		<?php 
		if(!empty($_POST)){


$ci = htmlentities(addslashes($_POST['ci_estudiante']));

    $grado = htmlentities(addslashes($_POST["grado"]));

    $grado_design = htmlentities(addslashes($_POST["grado_design"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
    
//    $no_aula = htmlentities(addslashes($_POST["no_aula"]));
//    
			$ci=trim($ci);

    if (!empty($ci)){

if(!is_exist_student($ci)){
				$errors[] = 'No existe el estudiante o la cedula es invalida';
			}}


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

				if (!comprobar_msjs_array($errors)) {

			$sql=" SELECT DISTINCT est.ci_escolar, est.id_doc,in_p.nombre,in_p.apellido_p,in_p.apellido_m, edo.descripcion estado,es.grado grado_design, clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2 FROM estudiantes est 
LEFT OUTER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc 
LEFT OUTER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar 
LEFT OUTER JOIN clases clas ON ea.id_clase = clas.id_clase 
LEFT OUTER JOIN turnos tr ON tr.id_turno = clas.id_turno 
LEFT OUTER JOIN escolaridad es ON est.ci_escolar = es.ci_escolar 
LEFT OUTER JOIN estado edo ON est.id_estado = edo.id_estado";

			  $where = [];

  $campos = [];

  if (!empty($ci)) {
    array_push($where, 'est.ci_escolar = :ci OR est.id_doc = :ci');
    $campos[':ci'] = [
      'valor' => $ci,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


  if (!empty($grado_design)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'est.grado = :grado_design');
    /* Preparamos los datos para la variable preparada */
    $campos[':grado_design'] = [
      'valor' => $grado,
      'tipo' => \PDO::PARAM_INT,
    ];
  }


  if (!empty($grado)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'clas.grado = :grado');
    /* Preparamos los datos para la variable preparada */
    $campos[':grado'] = [
      'valor' => $grado,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

    if (!empty($seccion)) {
    array_push($where, 'clas.seccion = :seccion');
    $campos[':seccion'] = [
      'valor' => $seccion,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


    if (!empty($turno)) {
    array_push($where, 'clas.id_turno = :turno');
    $campos[':turno'] = [
      'valor' => $turno,
      'tipo' => \PDO::PARAM_INT,
    ];
  }

 if (!empty($anio_escolar1)) {
    array_push($where, 'clas.anio_escolar1 = :anio_escolar1');
    $campos[':anio_escolar1'] = [
      'valor' => $anio_escolar1,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($anio_escolar2)) {
    array_push($where, 'clas.anio_escolar2 = :anio_escolar2');
    $campos[':anio_escolar2'] = [
      'valor' => $anio_escolar2,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }
 $sql.=" ORDER BY in_p.nombre";
  $result = $db->prepare($sql);

  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }

  $result->execute();

			if ($result->rowCount() == 0) {
	$errors[] = "No hay criterios que concidan con su busqueda";
	}else{
					?>

	        <div>
 	            <table class="tabla" border="1">
 		            <thead>
 			            <tr>
						 <th>Cedula Escolar</th> 
						 <th>Cédula</th> 
						 <th>Nombres</th> 
						 <th>Apellidos</th> 
						 <th>Estado</th>
						<th>Grado Designado</th>  
						<th>Clase</th>

						 <th></th>
 			            </tr>
 		            </thead>
 		            
 		            <?php 
 		            while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>
 		            <tr>
 			            <td><?php echo $registro['ci_escolar'] ?></td> 
						<td><?php echo $registro['id_doc'] ?></td>
						<td><?php echo $registro['nombre']?></td>
						<td><?php echo $registro['apellido_p']." ".$registro['apellido_m'] ?></td> 
						<td><?php echo $registro['estado']?></td>
						<td><?php echo $registro['grado_design']?></td>
							
						<td> <?php echo $registro['grado']." ".$registro['seccion']." ".$registro['turno']." " .$registro['anio_escolar1']."-".$registro['anio_escolar2'];?>
						</td>

						 <td>



                     <?php    if(valid_inicio_sesion('2')) {  ?>

                    <td>
                    <form action='./update_student/upd-estudiante-1.php' method='post'>
                        
                        <button type='submit' id='button-modi' value="<?php echo $registro['ci_escolar']; ?>" name ='update_student'> Actualizar</button>
                    </form>


                        <form action='<?php echo $registro['ci_escolar']; ?>' method='post'>
                        
                        <button type='submit' class='icon-list1' id='button-modi' value="<?php echo $registro['ci_escolar']; ?>" name ='mas_info_student' >Mas Informacion</button>
                         
                         </form>

                        <?php } ?>

                        
                      <?php  if(valid_inicio_sesion('2')) { ?>

                     
                        <form action='eliminar_destudiante.php' method='post'>
                        
                        <button type='submit' icon='button-cancel' id='button-modi' value=".$registro['ci_escolar']." name ='eliminar_estudiantet' >Eliminar</button>
                         
                         </form>

                    
                     <?php } ?>

                  <br><br></td></tr>
						</td>
	<?php  }

echo " 		            </tr>
 	            </table>
            </div>
";
}
}
}
	?>
		

				<?php require '../../includes/menu_bar.php' ?>

            </div>
	    </section>

<?php

	imprimir_msjs($errors);
require'../../includes/footer.php';
?>
