<?php

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
        <br>
        Grado Escolar:
        <select name="grado" id="" autocomplete="on">
            <option value=''></option>
            <option value="1">1ro</option>
            <option value="2">2do</option>
            <option value="3">3ro</option>
            <option value="4">4to</option>
            <option value="5">5to</option>
            <option value="6">6to</option>

        </select>

        Seccion 

        <input type="text" name="seccion" id="" value="<?php if(isset($seccion)) echo $seccion; ?>">

		Turno:
        <select name="turno" id="">
        	 <option value=''></option>
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
        </select> 

        Año Escolar 

        <input type="number" name="año_escolar1" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar1; ?>">

        <input type="number" name="año_escolar2" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar2; ?>">
		


		<button id=button class="icon-search" type="submit">Buscar</button>

			<a href="register_clases.php" style="float:right;margin-top:80px;margin-right:180px;" id=registrer class="icon-add">Registrar Nueva Clase</a>

				<button id=button class="icon-search" type="submit" name="todos" value="todos">Todos</button>			

		</form>

<br><br>
   

	<?php 	


	if (!empty($_POST)) {
		
/*	
    $count = 0;

    $w = '';

    $orden_grado='';
	
	$orden_seccion = '';

	$orden_turno = '';

	$y ='';

/*	if(exist_clase($id_clase)){
		$errors[] = "No existe esta clase";}


if (!empty($grado)) {

		$count++;
		
		$orden_grado = " cl.grado = ".$grado."";

    }

if (!empty($seccion)) {

			$count++;

			if ($count>1) {
		$y=' AND ';
		}else{$y='';}
		

		$orden_seccion = $y." cl.seccion = '".$seccion."'";
    }

if (!empty($turno)) {

	$count++;

	if ($count>1) {
		$y=' AND ';
		}else{$y='';}
		
		$orden_turno = $y." cl.id_turno =".$turno;

    }


if ($count>0) {
	$w=' WHERE ';
}*/

			if(!comprobar_msjs_array($errors)){

		$sql="SELECT cl.grado,cl.id_clase,cl.seccion,cl.no_aula,cl.id_clase,
tr.descripcion, 
cl.anio_escolar1,cl.anio_escolar2
FROM 
clases cl
INNER JOIN turnos tr ON cl.id_turno = tr.id_turno;";
					
			$result=$db->prepare($sql);
									
			
			 $result->execute();/*(array("grado"=>$grado/*,"turno"=>$turno,"anio_escolar1"=>$anio_escolar1,"anio_escolar2"=>$anio_escolar2));*/

					?>


	        <div>
 	            <table class="tabla">
 		            <thead>
 			            <tr>
						 <th> Grado </th> 
						 <th> Seccion </th> 
						 <th> Numero de Aula </th> 
						 <th> Turno </th> 
						 <th> Año Escolar </th> 
						 <th> Estudiantes Activos </th>
						 <th> Estudiantes Inactivos </th>
						 <th> Estudiantes Retirados </th>

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
						<td><?php echo cantidad_estudent($id_clase,'1');?></td>
						<td><?php echo cantidad_estudent($id_clase,'2');?></td>
						<td><?php echo cantidad_estudent($id_clase,'3');?></td>

						 <td>

					
					<form action="info_docent.php" method="post">
						 <button id="button-modi" class="icon-list1" type="submit" name='docent_asig' value="<?php echo $registro['id_clase'] ?>">Mas Informacion</button>
					</form>

		
					<form action="asignar_docentes.php" method="post">
						 <button id="button-modi" type="submit" name='docent_asig' value="<?php echo $registro['id_clase'] ?>">Docentes Asignados</button>
					</form>
					
					<form action="modificar_clase.php" method="post">
					<button id="button-modi" type="submit" name='modif' value="<?php echo $registro['id_clase'] ?>">Modificar</button>
					</form>


					<br><br>
				</td>

				<?php } ?>

	<?php } 
	
	?>

			</table>
           	</div>

	<?php } ?>
				<?php include '../../includes/menu_bar.php' ?>

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }


  ?>

<?php require '../../includes/footer.php' ?>
