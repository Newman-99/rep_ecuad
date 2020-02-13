

<?php 
require '../../includes/init_system.php'; 

require '../../includes/head.php'; 

 session_start();
 valid_inicio_sesion('2');

?>

<title>Menú</title>

<?php require '../../includes/header.php'; ?>

<div class="nav-upd">
    <?php 
$_SESSION['ci_escolar'] = $_POST['update_student'];
 ?>


        
        <ul id="button-upd">
            <li><a href="./update_student/upd-estudiante-1.php">Datos basico del estudiante</a></li><br>
            <li><a href="./update_student/upd-estudiante-2.php">Madres padre y representantes</a></li><br>
            <li><a href="./update_student/upd-estudiante-3.php">Otros datos del estudiante, salud y persona a retirar</a></li><br>
            <li><a href="./update_student/upd-estudiante-4.php">Datos de inscripcion y escolaridad</a></li>
        </ul>
    
</div>


<a href="./estudiantes.php" class="btn btn-primary btn-lg" style="position:relative;bottom:5px;right:10px;">Volver</a>

