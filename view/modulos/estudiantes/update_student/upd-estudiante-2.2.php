<?php 
require '../../../includes/init_system_reg.php'; 

require '../../../includes/head_reg_est.php'; 

require '../../../includes/header_reg_est.php'; 


    session_start();

 valid_inicio_sesion('2');

if (isset($_SESSION['sesionform2'])) {
if (comprobar_msjs_array($_SESSION['sesionform2'])) {
extract($_SESSION['sesionform2']);
}
}

$ci_escolar = $_SESSION['ci_escolar'];
var_dump($_SESSION['ci_escolar']);

$errors_m = array();
$errors_m_upd = array();
$errors_p = array();
$errors_p_upd = array();
$errors_r = array();
$errors_r_upd = array();

 ?>

<?php 


?>

 
    <!--formularios-->
            <div class="container">

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">



<?php if(!is_exist_padre('',$_SESSION['ci_escolar'],'1')){ 

    include 'sub_includes/reg_mom.php';
    ?>

<?php }else{
    include 'sub_includes/upd_mom.php';

}
    echo " <br><br><br><br>";

?>


<?php if(!is_exist_padre('',$_SESSION['ci_escolar'],'2')){ 

    include 'sub_includes/reg_dad.php';

    ?>

<?php }else{
    include 'sub_includes/upd_dad.php';

}

        echo "";

?>

<?php 
$id_represent = obtener_id_represent($_SESSION['ci_escolar']);

  $id_madre=obtener_id_padres($_SESSION['ci_escolar'],'1');
  $id_padre=obtener_id_padres($_SESSION['ci_escolar'],'2');
//var_dump($id_represent);
//var_dump($id_madre);
//var_dump($id_padre);

    if (strcmp($id_represent, $id_madre) === 0 || strcmp($id_represent, $id_padre) === 0 || isset($_POST['upd_represent'])){

    include 'sub_includes/reg_represent.php';
    }else{
    include 'sub_includes/upd_represent.php';
    }



 ?>

         </form>

                                        <a href="../menu_upd_student.php" class="btn btn-primary  col-lg-2">Volver</a>

                        </div>
                </div>

<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <?php require '../../../includes/footer_reg_est.php'; ?>