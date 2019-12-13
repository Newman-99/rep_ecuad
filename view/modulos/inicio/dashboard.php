<?php
require '../../includes/head.php';

session_start();

    if(!isset($_SESSION["id_user"])){
       header("Location:../index.php");
        
   }else{
    $nivel_permiso=$_SESSION['nivel_usuario'];
?>

    <title>Inicio</title>

<?php require '../../includes/header.php'; ?>    

<?php

    $ci = $_SESSION["id_user"];
    $nivel_permiso=$_SESSION['nivel_usuario'];
?>
  <h3>Bienvenido Usuario: <?php echo $ci;
    
    imprimir_usuario($ci);

  ?> </h3>

     <?php 
       if ($nivel_permiso === "0") {
        echo "<h3>Usuario  inhabilitado o por confirmar comuniquese con el Administrador</h3>";

        echo "<a href='../login/logout.php'>Cerrar Sesion</a>";    
       }else{  require '../../includes/menu_bar.php'; ?>

   
<?php 

        }

      }
  require '../../includes/footer.php';
 ?>
