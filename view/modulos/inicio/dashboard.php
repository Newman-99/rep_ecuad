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

  <?php
    
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
header("location:../clean_post_get.php?dashboard_return=inicio/dashboard.php");


}


?>

<br><br>
	        <div style="">


 	            <table class="tabla" border="" style="position: relative; margin-top: 40px; text-align: center;left:40%;float:left; margin: 20px;width: 20%;">
 		            <tr>
                <thead>  
						 <th> Estadisticas Generales </th>
 		            </thead>
 		            </tr>

			<td>

            Estudiantes:
            <br><br>
            Total: <?php echo tipos_student_consultas('','','','');?>
            <br><br>
            Activos: <?php echo tipos_student_consultas('','3','','');?>
						<br><br>
            Irregulares: <?php echo tipos_student_consultas('','4','','');?>
						<br><br>
            Retirados: <?php echo tipos_student_consultas('','2','','');?>
            <br><br>
            Graduados: <?php echo tipos_student_consultas('','6','','');?>
            <br><br>
	          Masculinos: <?php echo tipo_sexo_student_general('1');?>
            <br><br>
            Femeninos: <?php echo tipo_sexo_student_general('2');?>
      </td>

             </td>
  </tr>
      </table>


              <table class="tabla" border="" style="position: relative; margin-top: 40px; text-align: center;left:40%;float:left;  margin: 20px;width: 20%;">
                <tr>
                <thead>  
             <th>Estadisticas <?php echo $anio_escolar1."-".$anio_escolar2 ?></th>
                </thead>
                </tr>
			<td>
            Estudiantes:
            <br><br>
            Total: <?php echo tipos_student_consultas('','',$anio_escolar1,$anio_escolar2);?>
            <br><br>
            Activos: <?php echo tipos_student_consultas('','3',$anio_escolar1,$anio_escolar2);?>
						<br><br>
            Irregulares: <?php echo tipos_student_consultas('','4',$anio_escolar1,$anio_escolar2);?>
						<br><br>
            Retirados: <?php echo tipos_student_consultas('','5',$anio_escolar1,$anio_escolar2);?>
            <br><br>
            Graduados: <?php echo tipos_student_consultas('','6',$anio_escolar1,$anio_escolar2);?>
            <br><br>
	          Masculinos: <?php echo tipo_sexo_student_general('1',$anio_escolar1,$anio_escolar2);?>
            <br><br>
            Femeninos: <?php echo tipo_sexo_student_general('2',$anio_escolar1,$anio_escolar2);?>

<?php                         if(comprob_permisos('1')) {
 ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" style="text-align: center;">

        <button type='submit' class="btn btn-dark btn-sm col-2" value="2" name ='upd_anio_scol'> < </button>

        <button type='submit' class="btn btn-dark btn-sm col-2" value="1" name ='upd_anio_scol'> > </button>
    </form>

<?php } ?>

             </td>
  </tr>
      </table>

            </div>

 <?php  
  require '../../includes/menu_bar.php';


  require '../../includes/footer.php';


 ?>
