<?php
require '../database/connect.php';
require '../functions/functions.php';

session_start();

    if(!isset($_SESSION["id_user"])){
       header("Location:../index.php");
        
   }else{
	$nivel_permiso=$_SESSION['nivel_usuario'];
        ?>

<!DOCTYPE html>
<html>
    <head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	    <link rel="stylesheet" href="./css/styles.css">
	    <title>Clases</title>
    </head>
    <body>

      <header class="top">
       <ul>
        <li><img src="./img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
      </ul>
     </header>
	   
		<?php 
		if(!empty($_POST)){

    $grado = htmlentities(addslashes($_POST["grado"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
        
    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));

if(validar_datos_vacios_sin_espacios($grado,$turno,$anio_escolar1,$anio_escolar2,$seccion/*$id_doc_docent_normal,$id_doc_educ_fisica,$id_doc_docent_arte_cultura*/)){
    $errors[]= "Se deben evitar campos y no pueden poseer espacios";
}else{
    $id_clase= generador_id_clases($grado,$seccion,$anio_escolar1,$anio_escolar2,$turno);

			if(exist_clase($id_clase)){

			$sql="SELECT cl.grado,cl.seccion,cl.no_aula,tr.descripcion, cl.anio_escolar1,cl.anio_escolar2 FROM clases cl
INNER JOIN turnos tr ON cl.id_turno = tr.id_turno

			WHERE cl.id_clase = :id_clase";
					 
			$result=$db->prepare($sql);
									
			$result->bindValue(":id_clase",$id_clase);
			
			$result->execute();	
			
			while($registro=$result->fetch(PDO::FETCH_ASSOC)){
					?>

	        <div>
 	            <table class="tabla">
 		            <thead>

 		            	<!--
			$sql="SELECT cl.grado,cl.seccion,cl.no_aula,tr.descripcion, cl.anio_escolar1,cl.anio_escolar2 FROM clases cl
INNER JOIN turnos tr ON cl.id_turno = tr.id_turno
 		            	-->
 			            <tr>
						 <th>Grado</th> 
						 <th>Seccion</th> 
						 <th>Numero de Aula</th> 
						 <th>Turno</th> 
						 <th>Año Escolar 1</th> 
						 <th>Año Escolar 2</th> 
						 <th></th>
 			            </tr>
 		            </thead>
 		            <tr>
 			            <td><?php echo $registro['grado'] ?></td> 
						<td><?php echo $registro['seccion'] ?></td>
						<td><?php echo $registro['no_aula']?></td>
						<td><?php echo $registro['descripcion'];?></td> 
						<td><?php echo $registro['anio_escolar1']?></td>
						<td><?php echo $registro['anio_escolar2']?></td>

						 <td><a href="modificar.php">Modificar</a>
						 <br><br>
						 <a href="info_docent.php">Mas Informacion</a>
						 <br><br>
						 <a href="docent_asign.php">Docentes Asignados</a>

						</td>

 		            </tr>
 	            </table>
            </div>
	<?php  }}else{
		$errors[] = "<h1>No existe esta clase</h1>";}
}}?>

	<section>			
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"
>
        <br>
        Grado Escolar:
        <select name="grado" id="" autocomplete="on">
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
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
        </select> 

        Año Escolar 

        <input type="number" name="año_escolar1" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar1; ?>">

        <input type="number" name="año_escolar2" id="" value="<?php if(isset($anio_escolar2)) echo $anio_escolar2; ?>">
			

		<button id=button class="icon-search" type="submit">Buscar</button>

		<a href="register_clases.php" style="float:right;margin-top:50px;margin-right:190px;">Registrar Nueva Clase</a>

		</form>
		
				<?php include 'menu_bar.php' ?>

            </div>

            <br>
	    </section>
	    <section class=""></section>
            <script src="./js/jquery-3.1.1.min.js"></script>
			<script src="./js/sweetalert2.min.js"></script>
	        <script src="./js/bootstrap.min.js"></script>
	        <script src="./js/material.min.js"></script>
	        <script src="./js/ripples.min.js"></script>
	        <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
			<script src="./js/main.js"></script>

<script>
		        $.material.init();
	        </script>
    </body>
</html>

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }


 } ?>
