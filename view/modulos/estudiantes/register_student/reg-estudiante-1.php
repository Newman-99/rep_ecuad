<?php
require '../../../../database/connect.php';
require '../../../../functions/functions.php';

// valid_inicio_sesion('2');
        ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="stylesheet" href="../../../style/css/estilos_gregorio.css">
    <!--Boostrap-->
    
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap-reboot.min.css">
    -->
    <title>Registro de Estudiante</title>
</head>
<body>

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

        <header>
                <ul class="nav_reg">
                    <li><a href="menu.html">Menú principal</a></li>
                    <ul>
                        <li><a href="alumno.html" >Volver a control de alumnos</a></li>
                    </ul>
                </ul>
                <h2>REGISTRO ESTUDIANTIL</h2>
            </header>

    <!--formularios-->
            <div class="container">

<!----------------------  FORMULARIO ( 1 ) DATOS DEL ESTUDIANTE -------------------------->
                <div class="row">    
                    <div class="col-lg-12">
                    <!--<div id="ui">-->
                            <form action="" class="form-group text-center">

    <!------------------------------------------- PRIMER Y SEGUNDO  APELLIDO/NOMBRE ----------------------->
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="form-titulo">Datos del estudiante</h3>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Primer Apellido:</label>
                                        <input type="text" name="p-apellido" id="" placeholder="Apellido" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Segundo Apellido:</label>
                                        <input type="text" name="s-apellido" id="" placeholder="Apellido" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label>Primer Nombre:</label>
                                        <input type="text" name="" id="" placeholder="Nombre" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 my-2">
                                        <label>Segundo Nombre:</label>
                                        <input type="text" name="" id="" placeholder="Nombre" class="form-control" required>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <label>Cedula:</label>
                                        <select name="cedula" id="cedula" class="form-control"  required>
                                            <option value="0">-- Seleccione --</option>
                                            <option value="V">V - Venezolano/a </option>
                                            <option value="E">E - Escolar</option>
                                        </select>
                                        <input type="number" maxlength="8" placeholder="C.I" class="form-control" required>
                                        <p class="">Cedula Escolar(De no poseer cedula de identidad seleccione)</p>
                                    </div>

                                    <div class="col-lg-6 my-2">
                                        <label>Nacionalidad:</label>
                                        <select name="nacionalidad" id="nacionalidad" class="form-control"  required>
                                            <option value="0">-- Seleccione --</option>
                                            <option value="V">V - Venezolano/a </option>
                                            <option value="E">E - Extranjero/a</option>
                                        </select>
                                    </div>
                                        
                                    <!------ OPCIONAL SI hay que colocar manual la nacionalidad de procedencia ((((No SELECT ))))
                                    <div class="col-lg-6 my-2">
                                        <label for="" class="">Nacionalidad:</label>
                                        <input type="text" name="" id="" placeholder="Ingresar nacionalidad" class="form-control" required>
                                    </div>
                                    -->
                                </div>


                                <div class="row">
                                    <div class="col-lg-3 my-2">
                                        <p for="" class="">Sexo:</p>
                                        <label for="" class="">Niño</label>
                                        <input type="radio" name="sexo" value="niño" id="" required>
                                        <label for="sexo" class="">Niña</label>
                                        <input type="radio" name="sexo" value="niña" id="" required>
                                    </div>

                                    <div class="col-lg-3 my-2">
                                        <label for="">Fecha de Nacimiento:</label>
                                        <input type="date" name="" id="" class="form-control" required>
                                    </div>

                                    <div class="col-lg-6 my-2">
			
			<label for="">Lugar de Nacimiento:</label>
			<br>
			Estado <select id="dir_estado" name="dir_estado">
				<option value="0"> Estado</option>

				<?php while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>

				<option value="<?php echo $registro['id_estado'] ?>"> <?php echo $registro['estado'] ?> </option>
		<?php  } ?>
					</select>

					<br>
	
				 Municipio
				<select id="dir_municipio" name="dir_municipio"></select>
						<br>
				 Parroquia
				<select id="dir_parroquia" name="dir_parroquia"></select>
					<br>
				 Ciudad
				<select id="dir_ciudad" name="dir_ciudad"></select>
					
                                    </div>
                                </div>

                             
                                <div class="row">

                                    <div class="col-lg-6 my-5">
                                        <label for="">Direccion de Habitacion:</label>
			<br>
			Estado <select id="dir_estado" name="dir_estado">
				<option value="0"> Estado</option>

				<?php while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>

				<option value="<?php echo $registro['id_estado'] ?>"> <?php echo $registro['estado'] ?> </option>
		<?php  } ?>
					</select>

					<br>
	
				 Municipio
				<select id="dir_municipio" name="dir_municipio"></select>
						<br>
				 Parroquia
				<select id="dir_parroquia" name="dir_parroquia"></select>
					<br>
				 Ciudad
				<select id="dir_ciudad" name="dir_ciudad"></select>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Posee Canaima:</p>
                                        <label for="" class="">Si:</label>
                                        <input type="radio" name="seleccion" value="si" id="">
                                        <label for="" class="">No:</label>
                                        <input type="radio" name="seleccion" value="no" id="">
                                        <label for="" class="">Contrato:</label>
                                        <input type="radio" name="seleccion" value="contrato" id="">
                                    </div>

                                    <div class="col-lg-6 my-2">
                                        <p for="" class="">Posee coleccion bicentenaria:</p>
                                        <label for="" class="">Si:</label>
                                        <input type="radio" name="seleccion2" value="si" id="">
                                        <label for="" class="">No:</label>
                                        <input type="radio" name="seleccion2" value="si" id="">
                                    </div>
                                </div>

<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->

                                <a href="reg-estudiante-2.html" class="btn btn-primary btn-block btn-lg">CONTINUAR</a>
                                <!-- <input type="submit" name="continuar" value="CONTINUAR" class="btn btn-primary btn-block btn-lg" id="boton-enviar"> --> 
                                
                            </form>
                    <!--</div>-->
                    </div>
                </div>



<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <!--jquery, boostrap.min.js, bundle.min.js-->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
</body>

</html>