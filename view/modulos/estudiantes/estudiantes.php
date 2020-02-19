
<?php 
require '../../includes/init_system.php'; 

require  '../../includes/head.php';
$errors = array();
 session_start();
 valid_inicio_sesion('3');

if (isset($_GET['clean_ci_escolar'])) {
  unset($_SESSION['ci_escolar']);
}

?>
	    <title>Estudiantes</title>
	    
<?php require '../../includes/header.php'; ?>	


	<section>
  <div class="nav-h"><!----- DIV contenedor BARRA NAVEGACION HORIZONTAL -----> 
  
  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
  <div class="text-center">
      <label for="">Buscar Por:</label>
      <input type="search" class="" style='width: 18%;' placeholder="Cedula escolar o normal" name="ci_estudiante" value="<?php if(isset($ci)) echo $ci;?>">
      
      <label for="">Sexo:</label>
      <select name="sexo" id="">
        <option value="">Todos</option>
        <option value="1">Masculino</option>
        <option value="2">Femenino</option>
      </select>

      <label class="" for="">Estado:</label>
      <select name="estado_student" id="" autocomplete="on" class="">
          <option value=''>Todos</option>
          <option value="3">Activo</option>
          <option value="4">Irregular</option>
          <option value="5">Retirado</option>
      </select>
      
        
      
      <label for="">Grado Designado:</label>
      <select name="grado_design" id="" autocomplete="on" class="">
          <option value=''>Todos</option>
          <option value="1">1ro</option>
          <option value="2">2do</option>
          <option value="3">3ro</option>
          <option value="4">4to</option>
          <option value="5">5to</option>
          <option value="6">6to</option>
      </select>
      
<!--
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
-->
      
      <label class="">Año Escolar:</label>
      <input type="number" name="año_escolar1" id="" class="col-1" value="<?php if(isset($anio_escolar1)) echo $anio_escolar1; ?>">
      -
      <input type="number" name="año_escolar2" id="" class="col-1" value="<?php if(isset($anio_escolar2)) echo $anio_escolar2; ?>">
      </div>
      
      <div class="text-center">
      <button id="" name="buscar" value="buscar" class=" btn btn-primary col-2 mx-3" type="submit">Buscar</button>
      <a href="./register_student/reg-estudiante-1.php"  class=" btn btn-primary col-3">Registrar Nuevo Estudiante</a>
      </div>
      
  </form>
  
</div> <!----- FIN - DIV contenedor BARRA NAVEGACION HORIZONTAL ----->
      </section>


		<?php 
		if(!empty($_POST['buscar'])){


$ci = htmlentities(addslashes($_POST['ci_estudiante']));

//    $grado = htmlentities(addslashes($_POST["grado"]));

    $grado_design = htmlentities(addslashes($_POST["grado_design"]));

//    $seccion = htmlentities(addslashes($_POST["seccion"]));


      $ci=trim($ci);

    $sexo = htmlentities(addslashes($_POST["sexo"]));

    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));

      $anio_escolar1=trim($anio_escolar1);
      $anio_escolar2=trim($anio_escolar2);

    $estado_student = htmlentities(addslashes($_POST["estado_student"]));

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

			$sql=" SELECT DISTINCT est.ci_escolar,prsd.id_doc, est.id_doc,in_p.nombre,in_p.apellido_p,in_p.apellido_m, edo.descripcion estado,est.id_estado,es.grado grado_design, clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2,es.id_actualizacion id_es,ea.id_actualizacion id_ea, in_p.id_sexo,es.anio_escolar2 anio_escolar2_es,es.anio_escolar1 anio_escolar1_es FROM estudiantes est 
LEFT OUTER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc 
LEFT OUTER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar 
LEFT OUTER JOIN clases clas ON ea.id_clase = clas.id_clase 
LEFT OUTER JOIN turnos tr ON tr.id_turno = clas.id_turno 
LEFT OUTER JOIN escolaridad es ON est.ci_escolar = es.ci_escolar 
LEFT OUTER JOIN pers_est prsd ON est.ci_escolar = prsd.ci_escolar
LEFT OUTER JOIN estado edo ON est.id_estado = edo.id_estado ";

			  $where = [];

  $campos = [];

  if (!empty($ci)) {
    array_push($where, 'est.ci_escolar = :ci OR est.id_doc = :ci OR prsd.id_doc = :ci');
    $campos[':ci'] = [
      'valor' => $ci,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


  if (!empty($grado_design)) {
    /* Agregamos al WHERE la comparación */
    array_push($where,'es.grado = :grado_design');
    /* Preparamos los datos para la variable preparada */
    $campos[':grado_design'] = [
      'valor' => $grado_design,
      'tipo' => \PDO::PARAM_STR,
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


  if (!empty($estado_student)) {
    array_push($where, 'est.id_estado = :estado_student');
    $campos[':estado_student'] = [
      'valor' => $estado_student,
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

 $sql.="  GROUP BY es.ci_escolar ORDER BY in_p.nombre, es.id_actualizacion DESC,ea.id_actualizacion DESC";

  

  if (!empty($ci)) {
 $sql.=" LIMIT 1";
}

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
<?php msjs_coincidencias($result); ?>

 	            <table class="tabla">
 		            <thead>

 			            <tr>
						 <th>Cedula Escolar</th> 
						 <th>Cédula</th> 
						 <th>Nombres</th> 
						 <th>Apellidos</th> 
						 <th>Estado</th>
						<th>Grado </th>  
            <th> Año Escolar </th>  
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
            <td><?php echo $registro['anio_escolar1_es']."-".$registro['anio_escolar2_es'] ?></td>
							
						<td> <?php echo $registro['grado']." ".$registro['seccion']." ".$registro['turno']." " .$registro['anio_escolar1']."-".$registro['anio_escolar2'];?>
						</td>

						 <td>


                     <?php    if(comprob_permisos('2')) {  ?>
                          
                    <form action='./menu_upd_student.php' method='post'>
                        
                        <button type='submit' class="btn btn-dark btn-sm col-12"  value="<?php echo $registro['ci_escolar']; ?>" name ='update_student'> Actualizar</button>
                    </form>
                        <?php } ?>

                   

                        <form action='mas_info_student.php' method='post'>
                        
                        <button type='submit' class=' btn btn-dark btn-sm col-12'  value="<?php echo $registro['ci_escolar']; ?>" name ='mas_info_student' >Mas Informacion</button>
                         
                         </form>



                        
                      <?php  if(comprob_permisos('1')) { ?>
      
      <!--
                        <form action='#' method='post'>
                        
                        <button type='submit' class='button-cancel btn btn-dark btn-sm col-12'  value="<?php echo $registro['ci_escolar']; ?>" name ='eliminar_estudiantet' >Eliminar</button>
                         </form>
-->
                     <?php } ?>
                         

                  <br><br></td>
	<?php  }

echo " 		            
</tr>
 	            </table>
            </div>
";
}
}
}
	?>
		

				<?php require '../../includes/menu_bar.php' ?>

<?php

	imprimir_msjs($errors);
require'../../includes/footer.php';
?>

