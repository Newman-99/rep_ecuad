<?php
require '../../database/connect.php';
require '../../functions/functions.php';

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
	    <title>Comobox</title>
    </head>
    <body>

		<header class="top">
		   <ul>
				<li><img src="../img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
			</ul>
	   </header>

           <script language="javascript" src="js/jquery-3.4.1.min.js"></script>


	   		<script language="javascript">
			$(document).ready(function(){
				$("#dir_estado").change(function () {

					$('#dir_parroquia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#dir_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("../includes/getMunicipio.php", { id_estado: id_estado }, function(data){
							$("#dir_municipio").html(data);
						});            
					});
				})
			});
			

			$(document).ready(function(){
				$("#dir_municipio").change(function () {
					$("#dir_municipio option:selected").each(function () {
						id_municipio = $(this).val();
						$.post("../includes/getParroquia.php", { id_municipio:id_municipio }, function(data){
							$("#dir_parroquia").html(data);
						});            
					});
				})
			});

			$(document).ready(function(){
				$("#dir_estado").change(function () {					
					$("#dir_estado option:selected").each(function () {
						id_estado = $(this).val();
						$.post("../includes/getCiudad.php", { id_estado: id_estado }, function(data){
							$("#dir_ciudad").html(data);
						});            
					});
				})
			});
			


		</script>


		<?php 
	$sql = "SELECT id_estado,estado FROM estados ORDER BY 'iso_3166-2' ASC ";
	$result=$db->prepare($sql);
			$result->execute();
		 ?>			
	 
		<form id="combo" name="combo" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">  
		
			Seleciona Estado: <select id="dir_estado" name="dir_estado">
				
				<option value="0">Seleccionar Estado</option>

				<?php while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>

				<option value="<?php echo $registro['id_estado'] ?>"> <?php echo $registro['estado'] ?> </option>
		<?php  } ?>
					</select>

				Seleciona Municipio
				<select id="dir_municipio" name="dir_municipio"></select>

					 

				Seleciona Parroquia
				<select id="dir_parroquia" name="dir_parroquia"></select>
					

				Seleciona Ciudad
				<select id="dir_ciudad" name="dir_ciudad"></select>
					

				<input type="submit" name="enviar">


		</form>

	
	
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

</body>
</html>