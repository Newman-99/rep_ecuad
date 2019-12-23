<?php 
require '../../includes/head.php';
 
 valid_inicio_sesion('3');

?>
	    <title>Estudiantes</title>
	    
<?php require '../../includes/header.php'; ?>	   
		<?php 
		if(!empty($_POST)){
			$ci = htmlentities(addslashes($_POST['ci_estudiante']));
			if(validar_exist_estudiante($ci)){

			$sql="SELECT est.ci_escolar, est.id_doc_est,info_p.nombre,info_p.apellido_p,info_p.apellido_m,edo.descripcion descripcion_estado,clas.grado,clas.seccion,tr.descripcion descripcion_turn FROM estudiantes est
			INNER JOIN info_personal info_p ON est.ci_escolar = info_p.id_doc
			INNER JOIN clases clas ON est.id_clase = clas.id_clase
			INNER JOIN estado edo ON est.id_estado = edo.id_estado
            INNER JOIN turnos tr ON clas.id_turno = tr.id_turno
			WHERE est.ci_escolar = :id";
					 
			$result=$db->prepare($sql);
									
			$result->bindValue(":id",$ci);
			
			$result->execute();	
			
			while($registro=$result->fetch(PDO::FETCH_ASSOC)){
					?>

	        <div>
 	            <table class="tabla">
 		            <thead>
 			            <tr>
						 <th>Cedula Escolar</th> 
						 <th>Cédula</th> 
						 <th>Nombres</th> 
						 <th>Apellidos</th> 
						 <th>Grado</th> 
						 <th>Seccion</th> 
						 <th>Turno</th> 
						 <th></th>
 			            </tr>
 		            </thead>
 		            <tr>
 			            <td><?php echo $registro['ci_escolar'] ?></td> 
						<td><?php echo $registro['id_doc_est'] ?></td>
						<td><?php echo $registro['nombre']?></td>
						<td><?php echo $registro['apellido_p']." ".$registro['apellido_m'] ?></td> 
						<td><?php echo $registro['grado']?></td>
						<td><?php echo $registro['seccion']?></td>
						<td><?php echo $registro['descripcion_turn']?></td>
						 <td><a href="modificar.php" id=button-modi class="icon-compose"> Modificar </a>
						 <br><br>
						 <a href="info_docent.php" class="icon-list1" id="button-modi"> Mas Informacion </a>
						<br><br>
						 <a href="documentacion.php" class="icon-file-pdf" id="button-doc"> Documentacion </a>
						 <br><br>
						 <a href="d.php" class="icon-cancel" id="button-modi"> Eliminar </a>

						</td>
 		            </tr>
 	            </table>
            </div>
	<?php  }}else{
		$errors[] = "No existe el Estudiante";}
}?>

	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Cédula escolar o normal" name="ci_estudiante" value="<?php if(isset($ci)) echo $ci;?>">
			
			<button id=button class="icon-search" type="submit">Buscar</button>
			<br>
			<a href="./register_student/reg_alumno.php" style="float:right;margin-top:80px;margin-right:180px;">Registrar Nuevo Estudiante</a>

		</form>
		

				<?php require '../../includes/menu_bar.php' ?>

            </div>
	    </section>

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<h4 style = 'margin-top:40%;'>$msjs</h4>";
        }
    } 

require'../../includes/footer.php';
?>
