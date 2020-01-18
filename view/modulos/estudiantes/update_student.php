<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>



<?php 



    session_start();

 valid_inicio_sesion('2');

?>

    <!--formularios-->
            <div class="container">

    <!--------------------------- DECIMO FORMULARIO [ Actualizacion de datos ]-->
            <!--ESQUEMA ESQUELO PARA DECIMO FORMULARIO-->
            <div class="row">
                        <div class="col-lg-12">
                            <div id="ui">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo"> Actualizacion del Estudiante
<!----------------------------------------- INSERTA FORM ACA EN EL DIV y por ahí vas entre lg-6 o 12 ---------------->
                            <button type='submit' class="btn btn-primary btn-block btn-lg"value="data_update" name ='data_update'>Continuar</button>
</h3>
                            <?php imprimir_msjs($errors); ?>

                                        </div>
                            </div>
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

<?php require '../../../includes/footer_reg_est.php'; ?>
