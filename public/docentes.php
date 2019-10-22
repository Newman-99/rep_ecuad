
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
	    <link rel="stylesheet" href="./style.css">
	    <title></title>
    </head>
    <body style="background-image: url(../img/IMG_20150610_132427.jpg);">

		<header class="top">
		   <ul>
				<li><img src="../img/i.png" width="80px" height="70px"> U-E-N "República del Ecuador"</li>
			</ul>
			<span class="icon-user-solid-circle"></span>		
		<h1>Docentes</h1>
		
	</header>
	   
		<?php 
		if(!empty($_POST)){
			$ci = $_POST['ci_docente'];
			if(validar_exist_docente($ci)){

			$sql="SELECT est.ci_escolar, est.id_doc_est,info_p.nombre,info_p.apellido_p,info_p.apellido_m,clas.grado,clas.seccion, edo.descripcion FROM estudiantes est
			JOIN info_personal info_p ON est.ci_escolar = info_p.id_doc
			JOIN clases clas ON est.ci_escolar = clas.ci_escolar
			JOIN estado edo ON est.id_estado = edo.id_estado
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
						 <th>Cedula</th> 
						 <th>Nombre</th> 
						 <th>Correo</th> 
						 <th>Telefono</th> 
						 <th>Estado</th>
						 
						 <th><button id="boton" class="icon-cog"></button></th>
						 <th><button id="boton3" class="icon-download1"></button></th>
 			            </tr>
 		            </thead>
 		            <tr>
 			            <td><?php echo $registro['ci_escolar'] ?></td> 
						<td><?php echo $registro['id_doc_est'] ?></td>
						<td><?php echo $registro['nombre']?></td>
						<td><?php echo $registro['apellido_p']." ".$registro['apellido_m'] ?></td> 
						<td><?php echo $registro['descripcion']?></td>
 		            </tr>
 	            </table>
            </div>
	<?php  }}else{
		echo "<h3>No existe el Estudiante</h3>";
	}
}?>

	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Ingrese Cédula" name="ci_estudiante" value="<?php if(isset($ci)) echo $ci;?>">
			
			<button id=button class="icon-search" type="submit">Buscar</button>
		</form>
		

				<?php include 'menu_bar.php' ?>

            </div>
	    </section>
	    <section class="piedepagina"></section>
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

<?php } ?>
