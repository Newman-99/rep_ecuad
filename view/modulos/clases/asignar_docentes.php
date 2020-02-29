<?php 
require '../../includes/init_system.php'; 

require '../../includes/head.php';

    session_start();
 valid_inicio_sesion('2');

if (!empty($_POST['docent_asig'])) {

$_SESSION['id_clase'] = $_POST['docent_asig'];
}

$errors =  array();

//var_dump($id_funcion_docent);

$orden_tipo_docent = 'ORDER BY ca.id_funcion_docent ASC';

$orden_estado_contrato = 'ORDER BY ca.id_estado ASC';

$orden_asignacion = "ORDER BY ca.id_doc_docent DESC";



if (!empty($_POST['inabilitar_contrato'])) {

 $datos_asignacion = $_POST['inabilitar_contrato'];

$datos_asignacion_array[] = preg_split("/-/",$datos_asignacion);


$id_contrato_clase = $datos_asignacion_array[0][0];

$id_funcion_docent = $datos_asignacion_array[0][1];

$id_doc_docent = $datos_asignacion_array[0][2];



 $sql = "UPDATE `clases_asignadas` SET `id_estado` = :id_estado WHERE `clases_asignadas`.`id_contrato_clase` = :id_contrato_clase;";

			$result=$db->prepare($sql);
									
						
	$result->execute(array("id_estado"=>'2',"id_contrato_clase"=>$id_contrato_clase));



if(!is_exist_contrato_clase($_SESSION['id_clase'],'No asignado',$id_funcion_docent)){



 $sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_estado`, `id_clase`, `id_doc_docent`, `id_funcion_docent`) VALUES (:id_estado,:id_clase,:id_doc_docent,:id_funcion_docent); ".enable_foreing();

			$result=$db->prepare($sql);
									
						
	$result->execute(array("id_doc_docent"=>'No asignado',"id_estado"=>'1',":id_funcion_docent"=>$id_funcion_docent,"id_clase"=>$_SESSION['id_clase']));

			}

			$errors[]="El contrato del docente ".$id_doc_docent." ha sido inabilitado" ;

		}

if (!empty($_POST['habilitar_contrato'])) {
	 $datos_asignacion = $_POST['habilitar_contrato'];

$datos_asignacion_array[] = preg_split("/-/",$datos_asignacion);


$id_contrato_clase = $datos_asignacion_array[0][0];

$id_funcion_docent = $datos_asignacion_array[0][1];

$id_doc_docent = $datos_asignacion_array[0][2];

$id_estado_clase = $datos_asignacion_array[0][3];

$id_estado_docent = obten_estado_docente($id_doc_docent);

if ($id_estado_docent == '2') {
	$errors[] = "No se le puede asignar esta clase, El docente: ".$id_doc_docent." esta inabilitado ";
}

var_dump(is_exist_contrato_clase($_SESSION['id_clase'],'', $id_funcion_docent,'1',0));

 if (is_exist_contrato_clase($_SESSION['id_clase'],'', $id_funcion_docent,'1',1)){
 $errors[] = "Ya hay un docente habilitado para esta funcion";
 }

if (!comprobar_msjs_array($errors)) {    


 $sql = "UPDATE `clases_asignadas` SET `id_estado` = :id_estado WHERE `clases_asignadas`.`id_contrato_clase` = :id_contrato_clase;";

			$result=$db->prepare($sql);
									
						
			$result->execute(array("id_estado"=>'1',"id_contrato_clase"=>$id_contrato_clase));


			 $sql = disable_foreing()." DELETE FROM `clases_asignadas` WHERE id_doc_docent = :id_doc_docent AND id_funcion_docent = :id_funcion_docent AND id_clase = :id_clase; ".enable_foreing();

			$result=$db->prepare($sql);
									
						
	$result->execute(array("id_doc_docent"=>'No asignado',":id_funcion_docent"=>$id_funcion_docent,"id_clase"=>$_SESSION['id_clase']));


			$errors[]="El contrato del docente ".$id_doc_docent." ha sido habilitado" ;

}		
}



if (!empty($_POST['eliminar_contrato'])) {

$datos_asignacion = $_POST['eliminar_contrato'];

$datos_asignacion_array[] = preg_split("/-/",$datos_asignacion);

$id_contrato_clase = $datos_asignacion_array[0][0];

$id_funcion_docent = $datos_asignacion_array[0][1];

$id_doc_docent = $datos_asignacion_array[0][2];


if(is_exist_nro_contrato_clase($id_contrato_clase)){

	$sql = disable_foreing()." DELETE FROM `clases_asignadas` WHERE id_contrato_clase = :id_contrato_clase; ".enable_foreing();

	$result=$db->prepare($sql);
									
						
  $result->bindValue(":id_contrato_clase",$id_contrato_clase);

 $result->execute();


  $sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_estado`, `id_clase`, `id_doc_docent`, `id_funcion_docent`) VALUES (:id_estado,:id_clase,:id_doc_docent,:id_funcion_docent); ".enable_foreing();

			$result=$db->prepare($sql);
									
						
	$result->execute(array("id_doc_docent"=>'No asignado',"id_estado"=>'1',":id_funcion_docent"=>$id_funcion_docent,"id_clase"=>$_SESSION['id_clase']));


}

			$errors[]="El contrato del docente ".$id_doc_docent." ha sido eliminado" ;


}

if (!empty($_POST['asignar_docente'])) {

$datos_asignacion = $_POST['asignar_docente'];

$datos_asignacion_array[] = preg_split("/-/",$datos_asignacion);

$id_contrato_clase = $datos_asignacion_array[0][0];

$id_funcion_clase = $datos_asignacion_array[0][1];

$id_doc_defect = $datos_asignacion_array[0][2];

$id_doc_habilitar = $_POST['id_doc_habilitar'];

	$errors[] = valid_ci($id_doc_habilitar);



	if(!is_exist_docente($id_doc_habilitar)) {
    $errors[]="No hay ningun docente con esta cedula registrado";}

if ($id_funcion_clase == '1') {

if (!comprobar_turno_docent_clase($id_doc_habilitar,'1')){
    $errors[]="El Docente en Aula ya tiene este turno ocupado";}
}


 if (!is_exist_contrato_clase($_SESSION['id_clase'],$id_doc_habilitar, $id_funcion_clase)){

if (!comprobar_msjs_array($errors)) {

  $sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_estado`, `id_clase`, `id_doc_docent`, `id_funcion_docent`) VALUES (:id_estado,:id_clase,:id_doc_docent,:id_funcion_docent); ".enable_foreing();

			$result=$db->prepare($sql);
									
						
	$result->execute(array("id_doc_docent"=>$id_doc_habilitar,"id_estado"=>'1',":id_funcion_docent"=>$id_funcion_clase,"id_clase"=>$_SESSION['id_clase']));


	$sql = disable_foreing()." DELETE FROM `clases_asignadas` WHERE id_doc_docent = :id_doc_docent AND id_funcion_docent = :id_funcion_docent AND id_clase = :id_clase; ".enable_foreing();


		$result=$db->prepare($sql);
									
						
	$result->execute(array("id_doc_docent"=>'No asignado',":id_funcion_docent"=>$id_funcion_clase,"id_clase"=>$_SESSION['id_clase']));

			$errors[]="El contrato del docente ".$id_doc_habilitar." ha sido creado" ;


}

}

}

?>

	    <title>Docentes Asignados</title>
		
		<?php require '../../includes/header.php'?>

<div class="container">
	<div class="row">    
        <div class="col-lg-12">
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-group text-center">
		<div class="row">

			<div class="col-6 my-3">
			<select name="orden" type="search" class="mx-3 form-control">
				<option value="<?php echo $orden_estado_contrato; ?>">Estado del Contrato</option>
				<option value="<?php echo $orden_tipo_docent ?>">Funcion del Docente</option>
				<option value="<?php echo $orden_asignacion ?>">Asignacion</option>
			</select>
			</div>

			<div class="col-6" style="margin-top:-25px;" >
				<button id="" class="btn btn-primary col-6" type="submit" name='ordenar' value="<?php echo $id_doc; ?>">Ordenar</button>
			</div>

		</div>
			<?php  imprimir_msjs_no_style($errors); ?>

		</form>
		</div>
	</div>

</div>
		<?php


$orden = $orden_estado_contrato;

if (!empty($_POST['ordenar'])) {
	$orden = htmlentities(addslashes($_POST["orden"]));
}


$sql ="SELECT doc.id_doc_docent,in_p.nombre,in_p.apellido_p,in_p.apellido_m,fd.descripcion funcion, est.descripcion estado_contrato, ca.id_contrato_clase,ca.id_estado,ca.id_funcion_docent FROM  clases_asignadas ca
INNER JOIN clases cl ON ca.id_clase = cl.id_clase 
INNER JOIN docentes doc ON ca.id_doc_docent = doc.id_doc_docent 
INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc 
INNER JOIN funciones_docentes fd ON ca.id_funcion_docent = fd.id_funcion_docent
INNER JOIN estado est ON ca.id_estado = est.id_estado
WHERE cl.id_clase = :id_clase ".$orden;

global $db;
			$result=$db->prepare($sql);
									
			$result->bindValue("id_clase",$_SESSION['id_clase']);
			
			$result->execute();	

	        echo "<div>";
 	          echo "<table class='tabla'>
 	          
					 <thead>";
					 echo "<tr><td colspan='14' class='text-center'><h4>Contrato de la clase: ".$_SESSION['id_clase']."</h4></td></tr>";
 			            echo"<tr>";

						echo"<th>Cedula del docente </th> 
						 <th>Nombre </th> 
						 <th>Apellido </th> 
						 <th> Funcion </th> 
						 <th>Estado del contrato</th>
						<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
						 ";
 			            	
 			           echo "</tr>
 		            </thead>";

 		            while($registro=$result->fetch(PDO::FETCH_ASSOC)){

 		            	echo "<tr>
 			            <td>".$registro['id_doc_docent']."</td>
					    
					    <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m']."</td> 
					    
					    <td>".$registro['funcion']."</td>

						<td>".$registro['estado_contrato']."</td>
						
						<td>";
						if (!strcmp($registro['id_doc_docent'],'No asignado') != 0){
						
							echo "<form action=".htmlspecialchars($_SERVER['PHP_SELF'])." method='POST'>
							<button type='submit' id='' class='btn btn-dark btn-sm col-12 mx-2' value=".$registro['id_contrato_clase'].'-'.$registro['id_funcion_docent']."-".$registro['id_doc_docent']." name ='asignar_docente' >Asignar Docente</button>
	
								<input type='number'  class='col-12 my-3 mx-2 ' placeholder='Numero de Cedula' name ='id_doc_habilitar'>
							 </form>
							 ";
	
						 }

		

                       if (strcmp($registro['id_doc_docent'],'No asignado') != 0 && $registro['id_estado'] == 1){

                       	echo "<form action=".htmlspecialchars($_SERVER['PHP_SELF'])." method='post'>
                         <button type='submit' id='' class='btn btn-dark btn-sm col-12 mx-2' value=".$registro['id_contrato_clase'].'-'.$registro['id_funcion_docent']."-".$registro['id_doc_docent']." name ='inabilitar_contrato' >Inabilitar</button>
                         <form>
                         ";


                       if (valid_inicio_sesion('1')){

                       	echo "<form action=".htmlspecialchars($_SERVER['PHP_SELF'])." 
                       	method='post'>

                       	<button type='submit' id='' class='btn btn-dark btn-sm col-12 mx-2' value=".$registro['id_contrato_clase'].'-'.$registro['id_funcion_docent']."-".$registro['id_doc_docent']." name ='eliminar_contrato' >Eliminar</button>
                         <form>

                         ";
						}}


                       if (strcmp($registro['id_doc_docent'],'No asignado') != 0 && $registro['id_estado'] == 2){

                       	echo "<form action=".htmlspecialchars($_SERVER['PHP_SELF'])." method='post'>
                      
                       <button type='submit' id='' class='btn btn-dark btn-sm col-12 mx-2' value=".$registro['id_contrato_clase'].'-'.$registro['id_funcion_docent']."-".$registro['id_doc_docent']."-".$registro['id_estado']." name ='habilitar_contrato' >Habilitar</button>
                         <form>";
	
							}	

 		            echo "</tr>";

 		    $id_funcion_docent = $registro['id_funcion_docent'];
			$id_doc_docent = $registro['id_doc_docent'];


 		          		} 

 	            echo "</table>
            </div>";
            
?>

<?php 

     ?>


                 <a class="btn btn-primary btn-lg" style="position:relative;
    			bottom:-400px;
				right:10px; margin-right: 40px;" href="clases.php">Volver</a>
				
<?php require '../../includes/footer.php' ?>