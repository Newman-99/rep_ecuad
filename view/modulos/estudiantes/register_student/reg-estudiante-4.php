<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>

<?php 

$errors = array();

    session_start();

 valid_inicio_sesion('2');


if (isset($_SESSION['sesionform4'])) {
if (comprobar_msjs_array($_SESSION['sesionform4'])) {
extract($_SESSION['sesionform4']);
}
}


if (!empty($_POST['inscrip_escol'])) {


    $ci_escolar = htmlentities(addslashes($_POST["ci_escolar"]));
    $plantel_proced = htmlentities(addslashes($_POST["plantel_proced"]));
    $localidad = htmlentities(addslashes($_POST["localidad"]));
    $anio_escolar1_otros_datos = htmlentities(addslashes($_POST["anio_escolar1_otros_datos"]));
    $grado_otros_datos = htmlentities(addslashes($_POST["grado_otros_datos"]));
    $seccion_otros_datos = htmlentities(addslashes($_POST["seccion_otros_datos"]));
    $calif_otros_datos = htmlentities(addslashes($_POST["calif_otros_datos"]));

    $observacions = htmlentities(addslashes($_POST["observacions"]));


if (isset($_POST["repitiente"])) {
            $repitiente = htmlentities(addslashes($_POST["repitiente"]));
    }

if (!isset($_POST["repitiente"])) {
       $errors[] = "Indique si el estudiante es repitiente";
}

}

?>
            <div class="container">

    <!--------------------------- NOVENO FORMULARIO [ Otros datos de inscripcion y escolaridad ]-->
                <div class="row">
                        <div class="col-lg-12">
                            <div id="ui">
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                                        <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Otros datos de inscripcion y escolaridad</h3>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="" class="">Cedula escolar</label>
                                        <input type="number" placeholder="Cedula escolar" class="form-control" value="<?php if(isset($ci_escolar)) echo $ci_escolar; ?>" name="ci_escolar">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="" class="">Plantel de procedencia</label>
                                            <input type="text" name="plantel_proced" value="<?php if(isset($plantel_proced)) echo $plantel_proced; ?>" id="" placeholder="Plantel de procedencia" class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="" class="">Localidad</label>
                                            <input type="text" name="Seccion" value="<?php if(isset($localidad)) echo $localidad; ?>" id="" placeholder="Localidad" class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Año escolar</label>
                                            <input type="number" maxlength="4" name="anio_escolar1_otros_datos" value="<?php if(isset($anio_escolar1_otros_datos)) echo $anio_escolar1_otros_datos; ?>" id="" placeholder="0000" class="form-control">

                                            <input type="number" maxlength="4" name="anio_escolar2_otros_datos" value="<?php if(isset($anio_escolar2_otros_datos)) echo $anio_escolar2_otros_datos; ?>"  id="" placeholder="0000" class="form-control">

                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Clase</label>
            <br>
            Grado     
            <select name="grado_otros_datos" id="" autocomplete="on">
         <option value="">-- Seleccione --</option>
            <option <?php if(isset($grado_otros_datos)) if($grado_otros_datos == '1') echo 'selected';?> value="1">1ro</option>
            <option <?php if(isset($grado_otros_datos)) if($grado_otros_datos == '2') echo 'selected';?> value="2">2do</option>
            <option <?php if(isset($grado_otros_datos)) if($grado_otros_datos == '3') echo 'selected';?> value="3">3ro</option>
            <option <?php if(isset($grado_otros_datos)) if($grado_otros_datos == '4') echo 'selected';?> value="4">4to</option>
            <option <?php if(isset($grado_otros_datos)) if($grado_otros_datos == '5') echo 'selected';?> value="5">5to</option>
            <option <?php if(isset($grado_otros_datos)) if($grado_otros_datos == '6') echo 'selected';?> value="6">6to</option>
        </select>

        / Seccion
            <select name="seccion_otros_datos" id="" autocomplete="on">
         <option value="">-- Seleccione --</option>
            <option <?php if(isset($seccion_otros_datos)) if($seccion_otros_datos == '1') echo 'selected';?> value="A">A</option>
            <option <?php if(isset($seccion_otros_datos)) if($seccion_otros_datos == '2') echo 'selected';?> value="B">B</option>
            <option <?php if(isset($seccion_otros_datos)) if($seccion_otros_datos == '3') echo 'selected';?> value="C">C</option>
            <option <?php if(isset($seccion_otros_datos)) if($seccion_otros_datos == '4') echo 'selected';?> value="D">D</option>
            <option <?php if(isset($seccion_otros_datos)) if($seccion_otros_datos == '5') echo 'selected';?> value="E">E</option>
            <option <?php if(isset($seccion_otros_datos)) if($seccion_otros_datos == '6') echo 'selected';?> value="F">F</option>
        </select>
                                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Calificacion definitiva</label>
                                            <select name="calificacion" id="calificacion" class="form-control" >
                                                <option value="">-- Seleccione --</option>
                                                <option <?php if(isset($calif_otros_datos)) if($calif_otros_datos == 'A') echo 'selected';?> value="A">A</option>
                                                <option   <?php if(isset($calif_otros_datos)) if($calif_otros_datos == 'B') echo 'selected';?> value="B">B</option>
                                                <option  <?php if(isset($calif_otros_datos)) if($calif_otros_datos == 'C') echo 'selected';?> value="C">C</option>
                                                <option  <?php if(isset($calif_otros_datos)) if($calif_otros_datos == 'D') echo 'selected';?> value="D">D</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <p for="">Repitiente:</p>
                                            <label for="" class=" ">Si:</label>
                                            <input  type="radio" <?php if(isset($_POST["repitiente"])) if($_POST["repitiente"] == '1'); ?>  name="repitiente" id="">

                                            <label for="" class="">No:</label>
                                            <input type="radio" name="repitiente" <?php if(isset($_POST["repitiente"])) if($_POST["repitiente"] == '1'); ?> id="">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Observaciones</label>
                                            <textarea name="observacions" id="" class="form-control" placeholder="Ingrese la observacion"><?php if(isset($observacions)) echo $observacions;?></textarea>
                                        </div>
                                    </div>

<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->
                                    <a href="reg-estudiante-3.html" class="btn btn-primary col-lg-2 btn-lg">VOLVER</a>

                            <button type='submit' class="btn btn-primary btn-block btn-lg"value="inscrip_escol" name ='inscrip_escol'>Continuar</button>
                                <!-- <input type="submit" name="continuar" value="CONTINUAR" class="btn btn-primary btn-block btn-lg" id="boton-enviar"> -->
                    <br><br>
                            <?php imprimir_msjs($errors); ?>

                                </form>   
                            </div>
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

<?php require '../../../includes/footer_reg_est.php'; ?>
