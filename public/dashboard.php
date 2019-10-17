<?php
require '../database/connect.php';
require '../functions/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
        session_start();

    if(!isset($_SESSION["id_user"])){
       header("Location:../login/register.php");
   }else{
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
       }else{  include './menu_bar.php'; ?>

   

</body>
</html>
<?php 
        }

      }

 ?>
