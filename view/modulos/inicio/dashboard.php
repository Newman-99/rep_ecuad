<?php require '../../includes/init_system.php'; ?>
<?php require '../../includes/head.php' ?>
<?php

    session_start();

 valid_inicio_sesion('3');
if (isset($_SESSION['ci_escolar'])) {
  unset($_SESSION['ci_escolar']);
}

 ?>

<link rel="stylesheet" type="text/css" href="../../style/css/styless.css">
<header class="top">
       <ul style="background-image: url('../../img/th6.jpg');">
        <li><img src="../../img/i.png" width="80px" height="70px" style="" ><br><p> U-E-N "República del Ecuador"</p></li>
      </ul>
     </header>
    <title>Inicio</title>

<?php require '../../includes/header.php'; 

    $ci = $_SESSION["id_user"];
?>

  <h3>Bienvenido Usuario: <?php echo $ci;
    
    imprimir_usuario_bienvenida($ci);


?>    
	        <div>


 	            <table class="tabla" border="1" style="position: relative; margin-top: 40px;">
 		            <thead>
 			            <tr>

						 <th> Estadisticas Generales </th>


						 <th>Estadisticas 2018-2019</th>
 		            </thead>

 		            </tr>

			<td>

            Estudiantes Activos: <?php echo tipos_student_consultas('','3','','');?>
						<br><br>
            Estudiantes Irregulares: <?php echo tipos_student_consultas('','4','','');?>
						<br><br>
            Estudiantes Retirados: <?php echo tipos_student_consultas('','2','','');?>
            			<br><br>
            Estudiantes Transferidos: <?php echo tipos_student_consultas('','2','','');?>
			<br><br>
	
	        Estudiantes Varones: <?php echo tipo_sexo_student_general('1');?>
            <br><br>
            Estudiantes Femeninos: <?php echo tipo_sexo_student_general('2');?>

             </td>

			<td>

            Estudiantes Activos: <?php echo tipos_student_consultas('','3','2018','2019');?>
						<br><br>
            Estudiantes Irregulares: <?php echo tipos_student_consultas('','4','2018','2019');?>
						<br><br>
            Estudiantes Retirados: <?php echo tipos_student_consultas('','2','2018','2019');?>
            			<br><br>
            Estudiantes Transferidos: <?php echo tipos_student_consultas('','2','2018','2019');?>
			<br><br>
	
	        Estudiantes Varones: <?php echo tipo_sexo_student_general('1','2018','2019');?>
            <br><br>
            Estudiantes Femenino: <?php echo tipo_sexo_student_general('2','2018','2019');?>

             </td>

	</tr>
			</table>
           	</div>

 <?php  
  require '../../includes/menu_bar.php';


  require '../../includes/footer.php';
 ?>
