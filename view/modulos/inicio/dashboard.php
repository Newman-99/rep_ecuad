<?php
require '../../includes/head.php';

session_start();

    if(!isset($_SESSION["id_user"])){
       header("Location:../index.php");
        
   }else{
    $nivel_permiso=$_SESSION['nivel_usuario'];
?>

    <title>Inicio</title>
</head>
<body>
      <header class="top">
       <ul>
        <li><img src="./img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
      </ul>
     </header>

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

   
      <section class=""></section>
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
<?php 
        }

      }

 ?>
