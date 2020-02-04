<?php require '../../includes/init_system.php'; ?>

<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['registrar'])) {


    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $id_doc = htmlentities(addslashes($_POST["id_doc"]));
    $nombres = htmlentities(addslashes($_POST["nombre"]));
    $apellido_p = htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_m = htmlentities(addslashes($_POST["apellido_m"]));
    $sexo = htmlentities(addslashes($_POST["sexo"]));    

    $area = htmlentities(addslashes($_POST["id_area"]));    
    
    $fecha_nac = htmlentities(addslashes($_POST["fecha_nac"]));    
     $fecha_ingreso = htmlentities(addslashes($_POST["fecha_ingreso"]));    
    $lugar_nac = htmlentities(addslashes($_POST["lugar_nac"]));    
    $direcc_hab = htmlentities(addslashes($_POST["direcc_hab"]));    
    $tlf_cel = htmlentities(addslashes($_POST["tlf_cel"]));    
    $tlf_local = htmlentities(addslashes($_POST["tlf_local"]));    
    $correo = htmlentities(addslashes($_POST["correo"])); 
    $estado_civil = htmlentities(addslashes($_POST["estado_civil"])); 
    $turno = htmlentities(addslashes($_POST["turno"])); 
    

$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);

if(validar_datos_vacios_sin_espacios($nacionalidad,$id_doc,$sexo,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$fecha_ingreso) || validar_datos_vacios($nombres,$area,$apellido_p,$lugar_nac,$direcc_hab,$turno)){
    $errors[]= "Se deben evitar campos vacios
    <p>Los Siguientes campos no Pueden poseer espacios:</p>
    <p><ul>

    <li>Nacionalidad</li>
    <li>Documento de Identidad</li>
    <li>Sexo</li>
    <li>Telefono Celular</li>
    <li>Telefono Local</li>
    <li>Correo</li>
    <li>Estado Civil</li>
    </ul></p>";

}else{

$errors[] = valid_ci($id_doc);

if (!is_exist_admin($id_doc)){
    $errors[]= "Un Administrativo con esta cedula ya esta registrado";
}

if (is_exist_ci($id_doc)) {
       $errors[]='La cedula ya esta registrada en el sistema';
        }

if (!is_valid_email($correo)) { $errors[]='El Correo electronico ingresado es invalido';}

if (!is_valid_num_tlf($tlf_local,$tlf_cel)) { $errors[]='El numero de telefono ingresado es invalido';}

$errors[]= validar_fecha_registro($fecha_ingreso);

$errors[]=validar_nombres_apellidos($nombres,$apellido_p);

if(!empty($apellido_m)){
$errors[]=validar_nombres_apellidos($apellido_m);
}



if (!comprobar_msjs_array($errors)) {    
 
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

$nombres=filtrar_nombres_apellidos($nombres);

$apellido_p=filtrar_nombres_apellidos($apellido_p);

$apellido_m=filtrar_nombres_apellidos($apellido_m);

registrar_persona($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$estado_civil,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo);

regist_admins($id_doc,$area,$turno,'1',$fecha_ingreso,'0000-00-00');

    $errors[] = 'Administrativo registrado con exito';

}

}
}

?>
    <title>Registro de Administrativos</title>


<?php require '../../includes/header.php' ?>


    <h2>Registro de personal Administrativo</h2>

<div class="container"> <!-- container -->

    <div class="row">    
        <div class="col-lg-12">    
            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" class="form-group text-center">
        
                <div class="col-12">
                    <h3 class="form-titulo">Registro de personal administrativo</h3>
                </div>

            <div class="row">
                <div class="col-lg-3 my-4">
                    <label for=""></label>
                    <select name="nacionalidad" id="" autocomplete="on" class="form-control">
                        <option value="">Seleccione</option>
                        <option <?php if(isset($nacionalidad)) if($nacionalidad == '1') echo 'selected';?> value="1">V</option>
                        <option <?php if(isset($nacionalidad)) if($nacionalidad == '2') echo 'selected'; ?> value="2">E</option>
                    </select>
                </div>
            
                <div class="col-lg-3 my-3">
                <label for="">Documento de Identidad</label>
                    <input type="number" name="id_doc" id="" placeholder="Cedula" class="form-control" value="<?php if(isset($id_doc)) echo $id_doc; ?>">
                </div>
            
                <div class="col-lg-6 my-3">
                    <label for="">Nombres:</label>
                    <input type="text" name="nombre" id="" placeholder="Nombres" class="form-control" value="<?php if(isset($nombres)) echo $nombres; ?>" >
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg-6 my-3">
                    <label for="">Apellido Paterno:</label>
                    <input type="text" name="apellido_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p)) echo $apellido_p; ?>">
                </div>

                <div class="col-lg-6 my-3">
                    <label for="">Apellido Materno:</label>
                    <input type="text" name="apellido_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m)) echo $apellido_m; ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 my-3">
                    <label for="">Sexo:</label>
                    <select name="sexo" id="" class="form-control">
                        <option value="">Seleccione</option>
                        <option <?php if(isset($sexo)) if($sexo == '1') echo 'selected'; ?> value="1">Masculino</option>
                        <option <?php if(isset($sexo)) if($sexo == '2') echo 'selected'; ?> value="2">Femenino</option>
                    </select>
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Area:</label>
                    <select name="id_area" id="" class="form-control">
                        <option value="">Seleccione</option>
                        <option <?php if(isset($area)) if($area == '1') echo 'selected';?> value="1">Directiva</option>
                        <option <?php if(isset($area)) if($area == '2') echo 'selected'; ?>  value="2">Estadistica</option>
                        <option <?php if(isset($area)) if($area == '3') echo 'selected';?> value="3">Pedagogica</option>
                    </select>
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nac" id="" class="form-control" value="<?php if(isset($fecha_nac)) echo $fecha_nac; ?>">
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Fecha de Ingreso:</label>
                    <input type="date" name="fecha_ingreso" id="" class="form-control" value="<?php if(isset($fecha_ingreso)) echo $fecha_ingreso; ?>">
                </div>                
            </div>

            <div class="row">
                <div class="col-lg-6 my-3">
                    <label for="">Lugar de Nacimiento</label>
                    <textarea rows="3" cols="40" name="lugar_nac" id="" placeholder="Lugar" class="form-control"><?php if(isset($lugar_nac)) echo $lugar_nac;?></textarea>
                </div>

                <div class="col-lg-6 my-3">
                    <label for="">Direccion de Habitacion</label>
                    <textarea rows="3" cols="40" name="direcc_hab" id="" placeholder="Direccion" class="form-control"><?php if(isset($direcc_hab)) echo $direcc_hab; ?></textarea>
                </div>
            </div>
        
            <div class="row">
                <div class="col-lg-3 my-3">
                    <label for="">Telefono Celular:</label>
                    <input type="number" name="tlf_cel" id="" placeholder="Telefono" class="form-control" value="<?php if(isset($tlf_cel)) echo $tlf_cel; ?>">
                </div>

                <div class="col-lg-3 my-3">
                    <label for="">Telefono Local:</label>
                    <input type="number" name="tlf_local" id="" placeholder="Telefono" class="form-control" value="<?php if(isset($tlf_local)) echo $tlf_local; ?>">
                </div>

                <div class="col-lg-6 my-3">
                    <label for="">Correo:</label>
                    <input type="email" name="correo" id="" placeholder="Correo" class="form-control" value="<?php if(isset($correo)) echo $correo; ?>">
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 my-3">
                    <label for="">Estado Civil:</label>
                    <select name="estado_civil" id="" class="form-control">
                        <option value="">Seleccione</option>            
                        <option <?php if(isset($estado_civil)) if($estado_civil == '1') echo 'selected';?> value="1">Soltero/a</option>
                        <option <?php if(isset($estado_civil)) if($estado_civil == '2') echo 'selected';?> value="2">Casado/a</option>
                        <option <?php if(isset($estado_civil)) if($estado_civil == '3') echo 'selected';?> value="3">Divorciado/a</option>
                        <option <?php if(isset($estado_civil)) if($estado_civil == '4') echo 'selected';?> value="4">Viudo/a</option>
                    </select>
                </div>

                <div class="col-lg-6 my-3">
                    <label for="">Turno:</label>
                    <select name="turno" id="" class="form-control">
                        <option value="">Seleccione</option>
                        <option <?php if(isset($turno)) if($turno == '1') echo 'selected';?> value="1">Mañana</option>
                        <option <?php if(isset($turno)) if($turno == '2') echo 'selected';?> value="2">Tarde</option>
                    </select> 
                </div>
            </div>


        <?php
if(!empty($errors)){
    foreach ($errors as $msjs) {
        echo "<p>$msjs<p>";
    }
}

?>

                <div class="row">
                    <div class="col-lg-2"><a class="btn btn-primary btn-block" href="admins.php">Volver</a></div>
                    <div class="col-lg-5"><input class="btn btn-primary btn-block" type="submit" value="Registrar" name="registrar"></div>
                    <div class="col-lg-5"><a class="btn btn-outline-primary btn-block" href="reg_docent_admin.php">Registrar desde Administrativo</a></div>
                </div>
        
            </form>
        </div>
    </div>
</div> <!-- Container -->

<?php 

require'../../includes/footer.php';

 ?>