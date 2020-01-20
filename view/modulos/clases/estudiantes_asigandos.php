<?php 

require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('3');

if (!empty($_POST['sus_clases'])) {
$_SESSION['id_doc'] = $_POST['sus_clases']; 
}
$id_doc = $_SESSION['id_doc'];

?>

	    <title>Clases del Docentes</title>
		
		<?php require '../../includes/header.php' ?>

		<h3>Clases del Docente</h3>
<?php

$orden_grado = 'ORDER BY cl.grado';

$orden_seccion = 'ORDER BY cl.seccion';
$orden_estado_contrato = 'ORDER BY ca.id_estado';

$orden_turno = 'ORDER BY tr.id_turno';

$orden_anio="ORDER BY cl.anio_escolar1 AND cl.anio_escolar2;";
?>

		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
		
		Estado del Estudiante
        <select name="tipo_student" id="" autocomplete="on">
            <option value=''>Todos</option>
            <option value="1">Activo</option>
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

		Por Edad
		<input type="checkbox" name="edad" id="">

		Alfabeticamente
        <select name="tipo_student" id="" autocomplete="on">
            <option value=''>Nombre</option>
            <option value="1">Apellido</option>
        </select>

		<button id=button class="icon-search" type="submit" name='filtrar' value="<?php echo $id_doc; ?>">Buscar</button>
		</form>

<?php  

		if(!empty($_POST['ordenar'])){


$ci = htmlentities(addslashes($_POST['ci_estudiante']));

    $grado = htmlentities(addslashes($_POST["grado"]));

    $grado_design = htmlentities(addslashes($_POST["grado_design"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
    
//    $no_aula = htmlentities(addslashes($_POST["no_aula"]));
//    
			$ci=trim($ci);

    if (!empty($ci)){


				if (!comprobar_msjs_array($errors)) {

			$sql=" SELECT DISTINCT est.ci_escolar, est.id_doc,in_p.nombre,in_p.apellido_p,in_p.apellido_m, edo.descripcion estado,es.grado grado_design, clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2 FROM estudiantes est 
LEFT OUTER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc 
LEFT OUTER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar 
LEFT OUTER JOIN clases clas ON ea.id_clase = clas.id_clase 
LEFT OUTER JOIN turnos tr ON tr.id_turno = clas.id_turno 
LEFT OUTER JOIN escolaridad es ON est.ci_escolar = es.ci_escolar 
LEFT OUTER JOIN estado edo ON est.id_estado = edo.id_estado";

			  $where = [];

	        echo "<div>";
 	          echo "<table class='tabla'>
 	          <caption> Clases 	del docente: ".$id_doc."</caption>
 		            <thead>";
 			            echo"<tr>";
						echo"<th>Grado </th> 
						 <th>Seccion </th> 
						 <th>Numero de Aula </th> 
						 <th>Turno </th> 
						 <th>Año Escolar </th> 
						 <th>Funcion</th> 
						 <th>Estado del Contrato</th>";
 			            
 			           echo "</tr>
 		            </thead>";

 		            while($registro=$result->fetch(PDO::FETCH_ASSOC)){

 		            	echo "<tr>
 			            <td>".$registro['grado']."</td>
					    <td>".$registro['seccion']."</td>
					    <td>".$registro['no_aula']."</td>
					    <td>".$registro['turno']."</td>
					    <td>".$registro['anio_escolar1']."-".$registro['anio_escolar2']."</td>
					    <td>".$registro['funcion']."</td>
					    <td>".$registro['estado']."</td>
 		            </tr>";

 		          		} 

 	            echo "</table>
            </div>";
            }
?>

                 <a href="docentes.php">Volver</a>


            

<?php

recib_msj($errors);

 require '../../includes/footer.php' ?>