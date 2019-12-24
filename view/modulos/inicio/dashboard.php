<?php
require '../../includes/head.php';

    session_start();

 valid_inicio_sesion('3');

 ?>


    <title>Inicio</title>

<?php require '../../includes/header.php'; 

    $ci = $_SESSION["id_user"];
?>

  <h3>Bienvenido Usuario: <?php echo $ci;
    
    imprimir_usuario_bienvenida($ci);

    
  
  require '../../includes/menu_bar.php';


  require '../../includes/footer.php';
 ?>
