

<?php 
require '../../includes/init_system.php'; 

require '../../includes/head.php'; 


 session_start();
 valid_inicio_sesion('2');
unset($_SESSION['new_represent']);
unset($_SESSION['new_prs_ret']);

?>

<title>Menú</title>

<?php require '../../includes/header.php'; ?>

<div class="nav-upd">
    <?php 
    if (isset($_POST['update_student'])) {
    	
$_SESSION['ci_escolar'] = $_POST['update_student'];
 }

    if (isset($_POST['update_student_clas'])) {
    	
$_SESSION['ci_escolar'] = $_POST['update_student_clas'];
 }

 ?>


        
        <ul id="button-upd">
            <li><a href="./update_student/upd-estudiante-1.php">Datos basicos</a></li><br>
            <li><a href="./update_student/upd-estudiante-2.2.php">Madres, padres y representantes</a></li><br>
            <li><a href="./update_student/upd-estudiante-3.php">Otros datos del estudiante, salud y persona autorizada a retirar</a></li><br>
            <li><a href="./update_student/upd-estudiante-4.php">Datos de inscripcion y escolaridad</a></li>
        </ul>
    
</div>

    <?php 
   
   /* if (isset($_POST['update_student']) || !isset($_SESSION['ci_escolar']) AND ) {
 */   	
    	if (isset($_POST['update_student'])){
$_SESSION['ci_escolar'] = $_POST['update_student'];
}
?>
<a href='./estudiantes.php?clean_ci_escolar=TRUE' class='btn btn-primary btn-lg' style='position:relative;bottom:5px;right:10px;'>Volver</a>

<?php 
// }



 ?>

