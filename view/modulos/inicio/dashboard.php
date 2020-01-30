<?php
require '../../includes/head.php';

    session_start();

 valid_inicio_sesion('3');

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

    
  
  require '../../includes/menu_bar.php';


  require '../../includes/footer.php';
 ?>
