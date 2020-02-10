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

registrar_actualizacion($ci_escolar,$_SESSION['id_user'],obtener_fecha_sistema());
 
$id_actualizacion=obtener_ultimo_id_actualizacion();

          $id_clase = generador_id_clases($grado_escolaridad,$seccion_escolaridad,$anio_escolar1_escolaridad,$anio_escolar2_escolaridad,$turno_escolaridad);


         if (is_exist_clase($id_clase)) {
            asignar_clase_for_estudent($id_clase,'3',$id_actualizacion,$ci_escolar);
          }

registrar_inscrip_scolaridad($ci_escolar,$plantel_proced,$localidad,$anio_escolar1_escolaridad,$anio_escolar2_escolaridad,$grado_escolaridad,$calif_escolaridad,$repitiente,$observacions,$id_actualizacion);


$errors[]= "<a  class=' btn btn-primary col-lg-9' href='final_upd.php'>
    Confirmar
</a>";


}
}

         $sql = consulta_escolaridad()." WHERE es.ci_escolar = :ci_escolar ORDER BY es.id_actualizacion DESC LIMIT 1;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

var_dump($result,$_SESSION['ci_escolar']);
    while($registro=$result->fetch(PDO::FETCH_ASSOC)){


?>
            <div class="container">

    <!--------------------------- NOVENO FORMULARIO [ Otros datos de inscripcion y escolaridad ]-->
                <div class="row">
                        <div class="col-lg-12">
                            
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                                        
                                    
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Otros datos de inscripcion y escolaridad</h3>
                                        </div>
                                            <br><br>
                                    <?php 
if (is_ci_escolar_id($_SESSION['ci_escolar'])){
$ci_escolar_sep=sepadador_ci_escolar($_SESSION['ci_escolar']);
                                     ?>
                                    <div class="row" id="cuadro"> <!-- INICIO, DIV Cedula escolar -->
                                        
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo3">Cedula escolar</h3>
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="" class="">Naciononalidad</label>
                                            <select name="ci_escol_nacidad" id="cedula" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($ci_escolar_sep['nacionalidad'])) if($ci_escolar_sep['nacionalidad'] == 'V') echo 'selected';?> value="V">V</option>
                                                <option <?php if(isset($ci_escolar_sep['nacionalidad'])) if($ci_escolar_sep['nacionalidad'] == 'E') echo 'selected';?> value="E">E</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Indicador opcional:</label>  
                                            <input type="number" placeholder="1" class="form-control" value="<?php if(isset($ci_escolar_sep['indic_opc'])) echo $ci_escolar_sep['indic_opc']; ?>" name="ci_escol_id_opc">
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Año de Nacimiento:</label>  
                                            <input type="number" placeholder="000" class="form-control" value="<?php if(isset($ci_escolar_sep['anio_nac'])) echo $ci_escolar_sep['anio_nac']; ?>" name="ci_escol_nac_estd">
                                        </div>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Cedula de la Madre:</label> 
                                            <input type="number" placeholder="C.I" class="form-control" value="<?php if(isset($ci_escolar_sep['id_padre_ci_escol'])) echo $ci_escolar_sep['id_padre_ci_escol']; ?>" name="ci_escol_ci_mom">
                                        </div>

                                    </div>  <!--------- FIN, DIV Cedula escolar  ------------>

                                    <br>
                                    <div class="row" >
                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Plantel de procedencia</label>
                                            <input type="text" name="plantel_proced" value="<?php if(isset($registro['plantel_proced'])) echo $registro['plantel_proced']; ?>" id="" placeholder="Plantel de procedencia" class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="" class="">Localidad</label>
                                            <input type="text" name="localidad" value="<?php if(isset($registro['localidad'])) echo $registro['localidad']; ?>" id="" placeholder="Localidad" class="form-control">
                                        </div>
                                    </div>
                                    <br>
<?php } }?>

<?php          $sql = clases_student()." WHERE ea.id_estado = 3 AND ea.ci_escolar =  :ci_escolar;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

var_dump($result,$_SESSION['ci_escolar']);
    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 ?>



                                    <div class="row" id="cuadro"> <!--------- INICIO, DIV Datos de clase  ------------>
                                    
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo3">Datos de clase</h3>
                                        </div>

                                        <div class="col-lg-2 my-4">  
                                           <label for="">Grado:</label> 
                                            <select name="grado_escolaridad" id="" autocomplete="on" class="form-control ">
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($registro['grado'])) if($registro['grado'] == '1') echo 'selected';?> value="1">1ro</option>
                                                <option <?php if(isset($registro['grado'])) if($registro['grado'] == '2') echo 'selected';?> value="2">2do</option>
                                                <option <?php if(isset($registro['grado'])) if($registro['grado'] == '3') echo 'selected';?> value="3">3ro</option>
                                                <option <?php if(isset($registro['grado'])) if($registro['grado'] == '4') echo 'selected';?> value="4">4to</option>
                                                <option <?php if(isset($registro['grado'])) if($registro['grado'] == '5') echo 'selected';?> value="5">5to</option>
                                                <option <?php if(isset($registro['grado'])) if($registro['grado'] == '6') echo 'selected';?> value="6">6to</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-2 my-4">

                                            <label for="">Seccion</label> 
                                            <select name="seccion_escolaridad" id="" autocomplete="on" class="form-control">
                                            <option value="" > Seleccione </option>
                                                <option <?php if(isset($registro['seccion'])) if($registro['seccion'] == 'A') echo 'selected';?> value="A">A</option>
                                                <option <?php if(isset($registro['seccion'])) if($registro['seccion'] == 'B') echo 'selected';?> value="B">B</option>
                                                <option <?php if(isset($registro['seccion'])) if($registro['seccion'] == 'C') echo 'selected';?> value="C">C</option>
                                                <option <?php if(isset($registro['seccion'])) if($registro['seccion'] == 'D') echo 'selected';?> value="D">D</option>
                                                <option <?php if(isset($registro['seccion'])) if($registro['seccion'] == 'E') echo 'selected';?> value="E">E</option>
                                                <option <?php if(isset($registro['seccion'])) if($seccion_escolaridad == 'F') echo 'selected';?> value="F">F</option>
                                            </select>

                                        </div>

                                        <div class="col-lg-2 my-4">
                                                <label for="">  Año escolar</label>
                                                <input type="number" maxlength="4" name="anio_escolar1_escolaridad" value="<?php if(isset($registro['anio_escolar1'])) echo $registro['anio_escolar1']; ?>" id="" placeholder="0000" class="form-control">

                                                <input type="number" maxlength="4" name="anio_escolar2_escolaridad" value="<?php if(isset($registro['anio_escolar2'])) echo $registro['anio_escolar2']; ?>"  id="" placeholder="0000" class="form-control">
                                        </div>

                                        <div class="col-lg-2 my-4">
                                            <label for="">Turno</label>
                                            <select name="turno_escolaridad" id="" autocomplete="on" class="form-control">
                                            <option value=""> Seleccione </option>
                                                <option <?php if(isset($registro['id_turno'])) if($registro['id_turno'] == '1') echo 'selected';?> value="1">Mañana</option>
                                                <option <?php if(isset($registro['id_turno'])) if($registro['id_turno'] == '2') echo 'selected';?> value="2">Tarde</option>
                                            </select>
                                        </div>

                                    <?php } ?>

                                    <?php          $sql = consulta_escolaridad()." WHERE es.ci_escolar = :ci_escolar ORDER BY es.id_actualizacion DESC LIMIT 1;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

                if ($result->rowCount() == 0) {
        echo " <h1>No hay criterios que concidan con su busqueda</h1>";

        }

var_dump($result,$_SESSION['ci_escolar']);
    while($registro=$result->fetch(PDO::FETCH_ASSOC)){

 ?>

                                        <div class="col-lg-3 my-4">
                                            <label for="">Calificacion definitiva</label>
                                            <select name="calif_escolaridad" id="calificacion" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($registro['calif_def'])) if($registro['calif_def'] == 'A') echo 'selected';?> value="A">A</option>
                                                <option   <?php if(isset($registro['calif_def'])) if($registro['calif_def'] == 'B') echo 'selected';?> value="B">B</option>
                                                <option  <?php if(isset($registro['calif_def'])) if($registro['calif_def'] == 'C') echo 'selected';?> value="C">C</option>
                                                <option  <?php if(isset($registro['calif_def'])) if($registro['calif_def'] == 'D') echo 'selected';?> value="D">D</option>
                                            </select>
                                        </div>

                                    </div> <!--------- Fin, DIV Datos de la clase  ------------>
                                    
                                    <br>

                                    <div class="row" >
                                        <div class="col-lg-3 my-4">
                                            <p for="">Repitiente:</p>
                                            <label for="" class=" ">Si:</label>
                                            <input  type="radio" name="repitiente" <?php if(isset($registro["repitiente"])){ if($registro["repitiente"] == '0') echo "checked";} ?>  value="0" id="">

                                            <label for="" class="">No:</label>
                                            <input type="radio" name="repitiente" <?php if(isset($registro["repitiente"])){ if($registro["repitiente"] == '1') echo "checked";} ?> id="" value="1">
                                        </div>

                                        <div class="col-lg-9 my-4">
                                            <label for="">Observaciones</label>
                                            <textarea name="observacions" id="" class="form-control" placeholder="Ingrese la observacion"><?php if(isset($registro['observs'])) echo $registro['observs'];?></textarea>
                                        </div>
                                    </div>                                             
<?php } ?>
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
