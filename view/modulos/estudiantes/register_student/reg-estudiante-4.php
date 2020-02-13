<?php require '../../../includes/init_system_reg.php'; ?>

<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>


<?php 
    session_start();

 valid_inicio_sesion('2');


if (isset($_SESSION['sesionform4'])) {
if (comprobar_msjs_array($_SESSION['sesionform4'])) {
extract($_SESSION['sesionform4']);
}
}


$errors = array();

if (!empty($_POST['inscrip_escol'])) {



    $ci_escol_nacidad = htmlentities(addslashes($_POST["ci_escol_nacidad"]));
    $ci_escol_id_opc = htmlentities(addslashes($_POST["ci_escol_id_opc"]));
    $ci_escol_nac_estd = htmlentities(addslashes($_POST["ci_escol_nac_estd"]));
    $ci_escol_ci_mom = htmlentities(addslashes($_POST["ci_escol_ci_mom"]));

    $ci_escolar = $ci_escol_nacidad."".$ci_escol_id_opc."".$ci_escol_nac_estd."".$ci_escol_ci_mom;

    $localidad = htmlentities(addslashes($_POST["localidad"]));

    $plantel_proced = htmlentities(addslashes($_POST["plantel_proced"]));
    $anio_escolar1_escolaridad = htmlentities(addslashes($_POST["anio_escolar1_escolaridad"]));
    $anio_escolar2_escolaridad = htmlentities(addslashes($_POST["anio_escolar2_escolaridad"]));
    $grado_escolaridad = htmlentities(addslashes($_POST["grado_escolaridad"]));
    $seccion_escolaridad = htmlentities(addslashes($_POST["seccion_escolaridad"]));
    $calif_escolaridad = htmlentities(addslashes($_POST["calif_escolaridad"]));
    $turno_escolaridad = htmlentities(addslashes($_POST["turno_escolaridad"]));

    $observacions = htmlentities(addslashes($_POST["observacions"]));


if (isset($_POST["repitiente"])) {
            $repitiente = htmlentities(addslashes($_POST["repitiente"]));
    }

    if (validar_datos_vacios_sin_espacios($anio_escolar1_escolaridad,$anio_escolar2_escolaridad,$grado_escolaridad) || validar_datos_vacios($localidad,$plantel_proced) || !isset($repitiente)){

        $errors[] = "Verifique campos vacios y casillas vacias";
    }else{
        if (!empty($ci_escolar)) {
        $errors = valid_ci_scolar_xparte($ci_escol_nacidad,$ci_escol_id_opc,$ci_escol_nac_estd,$ci_escol_ci_mom);
        }

        if (is_exist_student($ci_escolar)) {
    $errors[] = "La cedula escolar ya existe"; 
}

        if (validar_datos_vacios_sin_espacios($_SESSION['sesionform1']['id_doc_estd']) && validar_datos_vacios_sin_espacios($ci_escolar))  {
        $errors[] = "Debe ingresar la cedula escolar o el documento de identidad del estudiante, tambien pueden ser ambas";                
        }
        $errors[]=validar_anio_escolar($anio_escolar1_escolaridad,$anio_escolar2_escolaridad);

    }

    
    if (!empty($seccion_escolaridad) || !empty($turno_escolaridad)){

    if (validar_datos_vacios_sin_espacios($grado_escolaridad,$seccion_escolaridad,$anio_escolar1_escolaridad,$anio_escolar2_escolaridad,$turno_escolaridad)){

                    $errors[] = "Si desea Asignarle una clase, Debe evitar campos vacios";
                }else{

          $id_clase = generador_id_clases($grado_escolaridad,$seccion_escolaridad,$anio_escolar1_escolaridad,$anio_escolar2_escolaridad,$turno_escolaridad);

         if (!is_exist_clase($id_clase)) {
            $errors[] = "La clase no existe";
          }

          }
      }

    if (!comprobar_msjs_array($errors)) {    

foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform4'][$clave] = $valor;

}

$errors[]= "<a class= 'btn btn-primary col-lg-9 'href='final_register.php'>
    Confirmar
</a>";


}
}

?>

            <title>Otros datos de inscripcion y escolaridad</title>
            <div class="container">

    <!--------------------------- NOVENO FORMULARIO [ Otros datos de inscripcion y escolaridad ]-->
                <div class="row">
                        <div class="col-lg-12">
                            
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                                        
                                    
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Otros datos de inscripcion y escolaridad</h3>
                                        </div>
                                            <br><br>
                                            
                                    <div class="row" id="cuadro"> <!-- INICIO, DIV Cedula escolar -->
                                        
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo3">Cedula escolar</h3>
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="" class="">Naciononalidad</label>
                                            <select name="ci_escol_nacidad" id="cedula" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($ci_escol_nacidad)) if($ci_escol_nacidad == 'V') echo 'selected';?> value="V">V</option>
                                                <option <?php if(isset($ci_escol_nacidad)) if($ci_escol_nacidad == 'E') echo 'selected';?> value="E">E</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Indicador opcional:</label>  
                                            <input type="number" placeholder="1" class="form-control" value="<?php if(isset($ci_escol_id_opc)) echo $ci_escol_id_opc; ?>" name="ci_escol_id_opc">
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Año de Nacimiento:</label>  
                                            <input type="number" placeholder="000" class="form-control" value="<?php if(isset($ci_escol_nac_estd)) echo $ci_escol_nac_estd; ?>" name="ci_escol_nac_estd">
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Cedula de la Madre:</label> 
                                            <input type="number" placeholder="C.I" class="form-control" value="<?php if(isset($ci_escol_ci_mom)) echo $ci_escol_ci_mom; ?>" name="ci_escol_ci_mom">
                                        </div>

                                    </div>  <!--------- FIN, DIV Cedula escolar  ------------>
                                    
                                    <br>

                                    <div class="row" >
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Plantel de procedencia</label>
                                            <input type="text" name="plantel_proced" value="<?php if(isset($plantel_proced)) echo $plantel_proced; ?>" id="" placeholder="Plantel de procedencia" class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Localidad</label>
                                            <input type="text" name="localidad" value="<?php if(isset($localidad)) echo $localidad; ?>" id="" placeholder="Localidad" class="form-control">
                                        </div>
                                    </div>
                                      
                                    <br>

                                    <div class="row" id="cuadro"> <!--------- INICIO, DIV Datos de clase  ------------>
                                    
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo3">Datos de clase</h3>
                                        </div>

                                        <div class="col-lg-2 my-4">  
                                           <label for="">Grado:</label> 
                                            <select name="grado_escolaridad" id="" autocomplete="on" class="form-control ">
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($grado_escolaridad)) if($grado_escolaridad == '1') echo 'selected';?> value="1">1ro</option>
                                                <option <?php if(isset($grado_escolaridad)) if($grado_escolaridad == '2') echo 'selected';?> value="2">2do</option>
                                                <option <?php if(isset($grado_escolaridad)) if($grado_escolaridad == '3') echo 'selected';?> value="3">3ro</option>
                                                <option <?php if(isset($grado_escolaridad)) if($grado_escolaridad == '4') echo 'selected';?> value="4">4to</option>
                                                <option <?php if(isset($grado_escolaridad)) if($grado_escolaridad == '5') echo 'selected';?> value="5">5to</option>
                                                <option <?php if(isset($grado_escolaridad)) if($grado_escolaridad == '6') echo 'selected';?> value="6">6to</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-2 my-4">

                                            <label for="">Seccion</label> 
                                            <select name="seccion_escolaridad" id="" autocomplete="on" class="form-control">
                                            <option value="" > Seleccione </option>
                                                <option <?php if(isset($seccion_escolaridad)) if($seccion_escolaridad == 'A') echo 'selected';?> value="A">A</option>
                                                <option <?php if(isset($seccion_escolaridad)) if($seccion_escolaridad == 'B') echo 'selected';?> value="B">B</option>
                                                <option <?php if(isset($seccion_escolaridad)) if($seccion_escolaridad == 'C') echo 'selected';?> value="C">C</option>
                                                <option <?php if(isset($seccion_escolaridad)) if($seccion_escolaridad == 'D') echo 'selected';?> value="D">D</option>
                                                <option <?php if(isset($seccion_escolaridad)) if($seccion_escolaridad == 'E') echo 'selected';?> value="E">E</option>
                                                <option <?php if(isset($seccion_escolaridad)) if($seccion_escolaridad == 'F') echo 'selected';?> value="F">F</option>
                                            </select>

                                        </div>

                                        <div class="col-lg-2 my-4">
                                                <label for="">  Año escolar</label>
                                                <input type="number" maxlength="4" name="anio_escolar1_escolaridad" value="<?php if(isset($anio_escolar1_escolaridad)) echo $anio_escolar1_escolaridad; ?>" id="" placeholder="0000" class="form-control">

                                                <input type="number" maxlength="4" name="anio_escolar2_escolaridad" value="<?php if(isset($anio_escolar2_escolaridad)) echo $anio_escolar2_escolaridad; ?>"  id="" placeholder="0000" class="form-control">
                                        </div>

                                        <div class="col-lg-2 my-4">
                                            <label for="">Turno</label>
                                            <select name="turno_escolaridad" id="" autocomplete="on" class="form-control">
                                            <option value=""> Seleccione </option>
                                                <option <?php if(isset($turno_escolaridad)) if($turno_escolaridad == '1') echo 'selected';?> value="1">Mañana</option>
                                                <option <?php if(isset($turno_escolaridad)) if($turno_escolaridad == '2') echo 'selected';?> value="2">Tarde</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Calificacion definitiva</label>
                                            <select name="calif_escolaridad" id="calificacion" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($calif_escolaridad)) if($calif_escolaridad == 'A') echo 'selected';?> value="A">A</option>
                                                <option   <?php if(isset($calif_escolaridad)) if($calif_escolaridad == 'B') echo 'selected';?> value="B">B</option>
                                                <option  <?php if(isset($calif_escolaridad)) if($calif_escolaridad == 'C') echo 'selected';?> value="C">C</option>
                                                <option  <?php if(isset($calif_escolaridad)) if($calif_escolaridad == 'D') echo 'selected';?> value="D">D</option>
                                            </select>
                                        </div>

                                    </div> <!--------- Fin, DIV Datos de la clase  ------------>
                                    
                                    <br>

                                    <div class="row" >
                                        <div class="col-lg-3 my-4">
                                            <p for="">Repitiente:</p>
                                            <label for="" class=" ">Si:</label>
                                            <input  type="radio" <?php if(isset($_POST["repitiente"])){ if($_POST["repitiente"] == '0') echo "checked";}else{if(isset($repitiente)){ if($repitiente == '0') echo "checked";}} ?>  name="repitiente" value="0" id="">

                                            <label for="" class="">No:</label>
                                            <input type="radio" name="repitiente" <?php if(isset($_POST["repitiente"])){ if($_POST["repitiente"] == '1') echo "checked";}else{if(isset($repitiente)){ if($repitiente == '1') echo "checked";}} ?> id="" value="1">
                                        </div>

                                        <div class="col-lg-9 my-4">
                                            <label for="">Observaciones</label>
                                            <textarea name="observacions" id="" class="form-control" placeholder="Ingrese la observacion"><?php if(isset($observacions)) echo $observacions;?></textarea>
                                        </div>
                                    </div> 
                                            

<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->
                                    <a href="reg-estudiante-3.php" class="btn btn-primary col-lg-2">VOLVER</a>

                                    <button type='submit' class="btn btn-primary col-lg-9" value="inscrip_escol" name='inscrip_escol'>CONTINUAR</button>
                                    <?php imprimir_msjs_no_style($errors); ?>
                                    
                                
                                </form>   
                            
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

<?php require '../../../includes/footer_reg_est.php'; ?>
