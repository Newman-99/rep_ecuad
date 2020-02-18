<?php require '../../includes/init_system.php'; ?>
<?php require '../../includes/head.php' ?>
<?php

    session_start();

 valid_inicio_sesion('3');
if (isset($_GET['clean_ci_escolar'])) {
  unset($_SESSION['ci_escolar']);
}


 ?>


    <title>Inicio</title>

<?php require '../../includes/header.php'; 

    $ci = $_SESSION["id_user"];
?>

  <h3>Bienvenido Usuario: <?php echo $ci;
    
    imprimir_usuario_bienvenida($ci);


?>



<?php

 $anio_escol_actual = obtener_anios_escolar_actual(); 
$anio_escolar1 = $anio_escol_actual['anio_escolar_1'];
$anio_escolar2 = $anio_escol_actual['anio_escolar_2'];

    if(!empty($_POST['upd_anio_scol'])){

  $upd_orden=$_POST['upd_anio_scol'];

    if ($upd_orden =='1') {
      $anio_escolar1++;
      $anio_escolar2++;

update_anio_escol_actual($anio_escolar1,$anio_escolar2);

    }

    if ($upd_orden =='2') {
      
      $anio_escolar1--;
      $anio_escolar2--;
update_anio_escol_actual($anio_escolar1,$anio_escolar2);

    }
}

?>
	        <div>


 	            <table class="tabla" border="1" style="position: relative; margin-top: 40px;">
 		            <thead>
 			            <tr>

						 <th> Estadisticas Generales </th>


						 <th>Estadisticas <?php echo $anio_escolar1."-".$anio_escolar2 ?></th>
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

<?php  $anio_escol_actual = obtener_anios_escolar_actual(); 
$anio_escolar1 = $anio_escol_actual['anio_escolar_1'];
$anio_escolar2 = $anio_escol_actual['anio_escolar_2'];
 ?>
            Estudiantes Activos: <?php echo tipos_student_consultas('','3',$anio_escolar1,$anio_escolar2);?>
						<br><br>
            Estudiantes Irregulares: <?php echo tipos_student_consultas('','4',$anio_escolar1,$anio_escolar2);?>
						<br><br>
            Estudiantes Retirados: <?php echo tipos_student_consultas('','2',$anio_escolar1,$anio_escolar2);?>
            			<br><br>
            Estudiantes Transferidos: <?php echo tipos_student_consultas('','2',$anio_escolar1,$anio_escolar2);?>
			<br><br>
	
	        Estudiantes Varones: <?php echo tipo_sexo_student_general('1',$anio_escolar1,$anio_escolar2);?>
            <br><br>
            Estudiantes Femenino: <?php echo tipo_sexo_student_general('2',$anio_escolar1,$anio_escolar2);?>

<br>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" style="text-align: center;">

        <button type='submit' class="btn btn-dark btn-sm col-2" value="2" name ='upd_anio_scol'> < </button>

        <button type='submit' class="btn btn-dark btn-sm col-2" value="1" name ='upd_anio_scol'> > </button>
    </form>

             </td>



	</tr>


			</table>

<?php 
 ?>

           	</div>


 <?php  
  require '../../includes/menu_bar.php';


  require '../../includes/footer.php';


 ?>
