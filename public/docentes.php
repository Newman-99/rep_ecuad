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
	    <title>Docentes</title>
    </head>
    <body>

		<header class="top">
		   <ul>
				<li><img src="../img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
			</ul>
	   </header>
	   
		<?php 
		if(!empty($_POST)){
            $ci = htmlentities(addslashes($_POST["ci_docente"]));
			if(validar_exist_docente($ci)){

			$sql="SELECT in_p.id_doc,
            in_p.nombre,
            in_p.apellido_p,
            in_p.apellido_m,
            tr.descripcion descripcion_turno,
            tp.descripcion descripcion_tip_docent,
            est.descripcion descripcion_estado,
            cb.tlf_cel,
            cb.tlf_local,
            cb.correo,
            doc.fecha_ingreso,
            doc.fecha_inabilitacion
			
           FROM docentes doc 
           
           INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc 
           
           INNER JOIN tipos_docentes tp ON doc.id_tipo_docent = tp.id_tipo_docent
           
           INNER JOIN contact_basic cb ON doc.id_doc_docent = cb.id_doc
           
           INNER JOIN estado est ON doc.id_estado = est.id_estado
           
           INNER JOIN turnos tr ON doc.id_turno = tr.id_turno 
                       
       WHERE doc.id_doc_docent = :id;";
					 
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
						 <th>Apellidos</th> 
						 <th>Turno</th> 
						 <th>Tipo Docente</th>
						 <th>Estado</th>
                         <th>Telefono Celular</th>
                         <th>Telefono Local</th>
                         <th>Correo</th>
                         <th>Clase Actual</th>

						 <th><button id="boton" class="icon-cog"></button></th>
						 <th><button id="boton3" class="icon-download1"></button></th>
 			            </tr>
 		            </thead>
 		            <tr>
 			            <td><?php echo $registro['id_doc'] ?></td> 
                        
                        <td><?php echo $registro['nombre'] ?></td>
                        
                        <td><?php echo $registro['apellido_p']." ".$registro['apellido_m'] ?></td> 
						
						<td><?php echo $registro['descripcion_turno']?>
                        </td>

                        <td><?php echo $registro['descripcion_tip_docent']?>                    </td>

                        <td><?php echo $registro['descripcion_estado']?>                    </td>
						
                        <td><?php echo $registro['tlf_cel']?>
                        </td>

                        <td><?php echo $registro['tlf_local']?>
                        </td>


                        <td><?php echo $registro['correo']?>
                        </td>

                        <td><?php echo $registro['grado']."".$registro['seccion']."<br> No Aula ".$registro['no_aula']."<br>Año Escolar ".$registro['año_escolar1']."-".$registro['año_escolar2'];
                        ?></td>
                    
 		            </tr>
 	            </table>
            </div>
	<?php  }}else{
		echo "<h3>No existe el Docente</h3>";
	}
}?>

	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Ingrese Cedula" name="ci_docente" value="<?php if(isset($ci)) echo $ci;?>">
			
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
