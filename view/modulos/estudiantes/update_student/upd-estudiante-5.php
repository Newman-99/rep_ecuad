<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>


<?php 
    session_start();

 valid_inicio_sesion('2');

if (isset($_SESSION['sesionform5'])) {
if (comprobar_msjs_array($_SESSION['sesionform5'])) {
extract($_SESSION['sesionform5']);
}
}

$errors = array();

if (!empty($_POST['data_update'])) {

    $grado_updat = htmlentities(addslashes($_POST["grado_updat"]));
    $fecha_upadt = htmlentities(addslashes($_POST["fecha_upadt"]));
    $id_doc_admin_upt = htmlentities(addslashes($_POST["id_doc_admin_upt"]));


if (validar_datos_vacios_sin_espacios($grado_updat,$fecha_upadt,$id_doc_admin_upt)) {
    $errors[] = "Debe evitar campos vacios y espacios en blanco";
}else{

    $errors[]=validar_fecha_registro($fecha_upadt);

    $errors[]=valid_ci($id_doc_admin_upt);

if (is_exist_admin($id_doc_admin_upt)) {
    $errors[] = "El documento de identificacion del funcionario o administrativo no existe";    

}
    
    }

    if (!comprobar_msjs_array($errors)) {    

$errors[]= "<a href='final_register.php'>
    Confirmar
</a>";

foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform5'][$clave] = $valor;

}

}

}

?>


    <!--formularios-->
            <div class="container">

    <!--------------------------- DECIMO FORMULARIO [ Actualizacion de datos ]-->
            <!--ESQUEMA ESQUELO PARA DECIMO FORMULARIO-->
            <div class="row">
                        <div class="col-lg-12">
                            <div id="ui">
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Actualizacion de datos</h3>
                                        </div>
<!----------------------------------------- INSERTA FORM ACA EN EL DIV y por ahí vas entre lg-6 o 12 ---------------->
                                        <div class="col-lg-6 my-2">
                                            
                                                <h3 class="form-titulo2">Datos del Estudiante</h3>
                                              
                                                <label for="">Grado</label>
                                              
                                                <select class="form-control" name="grado_updat">
                                                    <option value="">-- Seleccione --</option>
                                                    <option <?php if(isset($grado_updat)) if($grado_updat == '1') echo 'selected'; ?> value="1">1º Grado</option>
                                                    <option <?php if(isset($grado_updat)) if($grado_updat == '2') echo 'selected'; ?> value="2">2º Grado</option>
                                                    <option <?php if(isset($grado_updat)) if($grado_updat == '3') echo 'selected'; ?> value="3">3º Grado</option>
                                                    <option <?php if(isset($grado_updat)) if($grado_updat == '4') echo 'selected'; ?> value="4">4º Grado</option>
                                                    <option <?php if(isset($grado_updat)) if($grado_updat == '5') echo 'selected'; ?> value="5">5º Grado</option>
                                                    <option <?php if(isset($grado_updat)) if($grado_updat == '6') echo 'selected'; ?> value="6">6º Grado</option>
                                                </select>
                                                  
                                                <label for="" class="my-2">Fecha</label>
                                                <input type="date" name="fecha_upadt" value="<?php /*if(isset($fecha_upadt))*/ echo obtener_fecha_sistema(); ?>" id=""  class="form-control">
                                                                                          </div>

                                        <div class="col-lg-6 my-2">
                                            <h3 class="form-titulo2">Datos del Funcionario</h3>
                                            <label for="">Cedula</label> 
                                            <input type="number" name="id_doc_admin_upt" value="<?php /*if(isset($id_doc_admin_upt))*/ echo $_SESSION['id_user']; ?>" id="" placeholder="C.I" class="form-control">
                                        </div>
                                    </div>

<!----------------------------------------- BOTON (SIGUIENTE) --------------------->
                                    <a href="reg-estudiante-3.html" class="btn btn-primary col-lg-2 btn-lg">VOLVER</a>

                            <button type='submit' class="btn btn-primary btn-block btn-lg"value="data_update" name ='data_update'>Continuar</button>
                                <!-- <input type="submit" name="continuar" value="CONTINUAR" class="btn btn-primary btn-block btn-lg" id="boton-enviar"> -->
                            <?php imprimir_msjs($errors); ?>

                                </form>   
                            </div>
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

<?php require '../../../includes/footer_reg_est.php'; ?>
