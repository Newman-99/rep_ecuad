<?php require '../../../includes/head_reg_est.php'; ?>

<?php require '../../../includes/header_reg_est.php'; ?>


<?php 

if (!empty($_POST['datos_student'])) {

    $nacionalidad_m = htmlentities(addslashes($_POST["nacionalidad_m"]));
    $id_doc_m = htmlentities(addslashes($_POST["id_doc_m"]));
    $nombre1_m = htmlentities(addslashes($_POST["nombre1_m"]));
    $nombre2_m = htmlentities(addslashes($_POST["nombre2_m"]));
    $apellido_p_m = htmlentities(addslashes($_POST["apellido_p_m"]));
    $apellido_m_m = htmlentities(addslashes($_POST["apellido_m_m"]));
    $fecha_nac_m = htmlentities(addslashes($_POST["fecha_nac_m"]));    
    $lugar_nac_m = htmlentities(addslashes($_POST["lugar_nac_m"]));    
    $direcc_hab_m = htmlentities(addslashes($_POST["direcc_hab_m"]));   
    $tlf_cel_m = htmlentities(addslashes($_POST["tlf_cel_m"]));    
    $tlf_local_m = htmlentities(addslashes($_POST["tlf_local_m"]));    
    $correo_m = htmlentities(addslashes($_POST["correo_m"])); 
    $estado_civil_m = htmlentities(addslashes($_POST["estado_civil_m"])); 
    $ocupacion_m = htmlentities(addslashes($_POST["ocupacion_m"])); 


if(validar_datos_vacios_sin_espacios($nacionalidad_m,$fecha_ingreso) || validar_datos_vacios($nombre1_m,$apellido_p_m,$lugar_nac_m,$direcc_hab) || !isset($_POST["sexo"])){
    $errors[]= "
    Se debe evitar campos a exepcion del segundo nombre y apellido

    <p>Los Siguientes campos no Pueden poseer espacios:</p>
    <p>
    Documento de Identidad
    <br>
    Fecha de Nacimiento
    </p>";

}else{

 $sexo_m = htmlentities(addslashes($_POST["sexo_m"]));        

if(!empty($id_doc_m)){

$errors[] = valid_ci($id_doc_m);

if(is_exist_ci($id_doc_m)) {
    $errors[]='La cedula ya esta registrada en el sistema';
        }

$errors[]= validar_fecha_registro($fecha_nac_m);

$err_nom_apell =validar_nombres_apellidos($nombre1_m,$apellido_p_m);


if(!empty($apellido_m_m)){
$err_nom_apell = validar_nombres_apellidos($apellido__mm_m);
$apellido_m_m=filtrar_nombres_apellidos($apellido_m_m);
}else{
    $apellido_m_m="";
}

if(!empty($nombre2_m)){
$err_nom_apell=validar_nombres_apellidos($nombre2_m);
$nombre2_m=filtrar_nombres_apellidos($nombre2_m);
}else{
    $nombre2_m_m = "";
}

$errors[] = $err_nom_apell;

    if (!comprobar_msjs_array($errors)) {    
/*
session_start();
foreach ($_POST as $clave => $valor) {
$_SESSION['sesionform1'][$clave] = $valor;*/
}
}

}
}


 ?>
    <!--formularios-->
            <div class="container">

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                                <form action="" class="form-group text-center">
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos de la Madre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_m" id="" placeholder="Nombre" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_m" id="" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Cedula:</label>
                                        <select name="nacionalidad" id="cedula" class="form-control" >
                                            <option value="">-- Seleccione --</option>
                                            <option <?php if(isset($nacionalidad)) if($nacionalidad == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad)) if($nacionalidad == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control" required>     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_m" id="" placeholder="Ocupacion" class="form-control">
                                        </div>
                                    </div> 
                                
                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="" id="" class="form-control">
                                        </div>
    
                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" name="" id="" placeholder="Lugar de nacimiento" class="form-control" required>
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil" id="cedula" class="form-control"  required>
                        <option value="0">-- Seleccione --</option>
                <option <?php if(isset($estado_civil)) if($estado_civil == '1') echo 'selected';?> value="1">Soltero/a</option>
                <option <?php if(isset($estado_civil)) if($estado_civil == '2') echo 'selected';?> value="2">Casado/a</option>
                <option <?php if(isset($estado_civil)) if($estado_civil == '3') echo 'selected';?> value="3">Divorciado/a</option>
                <option <?php if(isset($estado_civil)) if($estado_civil == '4') echo 'selected';?> value="4">Viudo/a</option>
            </select>
                                        </div>
                                    </div>
    
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>

                                            <input type="text" name="direcc_hab_p" id="" placeholder="Direccion de Habitacion" class="form-control" required>
                                        </div>
    
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono local" class="form-control" required>    
                                        </div>
                                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono celular" class="form-control" required>    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo" id="" placeholder="Correo electronico" class="form-control">
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="" id="" placeholder="Profesion u Oficio" class="form-control">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <input type="text" name="" id="" placeholder="Lugar de trabajo" class="form-control">
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <input type="text" name="" id="" placeholder="Direccion de trabajo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono de oficina" class="form-control">
                                        </div>
                                    </div>
                                </form>
                        <!--</div>-->
                        </div>
                </div>


<!------------------------------- TERCER FORMULARIO [ DATOS DEL PADRE ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                                <form action="" class="form-group text-center">

                               
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Padre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="p-apellido" id="" placeholder="Apellido" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="s-apellido" id="" placeholder="Apellido" class="form-control" required>
                                        </div>
                                    </div>
                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="" id="" placeholder="Nombre" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="" id="" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>
                               
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Cedula:</label>
                                            <select name="cedula" id="cedula" class="form-control"  required>
                                                <option value="0">-- Seleccione --</option>
                                                <option value="V">V - Venezolana </option>
                                                <option value="E">E - Extranjera</option>
                                            </select>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control" required>     
                                        </div>
                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="" id="" placeholder="Ocupacion" class="form-control">
                                        </div>
                                    </div> 

                                
                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="" id="" class="form-control">
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" name="" id="" placeholder="Lugar de nacimiento" class="form-control" required>
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="cedula" id="cedula" class="form-control"  required>
                                                <option value="0">-- Seleccione --</option>
                                                <option value="S"> Soltera </option>
                                                <option value="C"> Casada </option>
                                            </select>
                                        </div>
                                    </div>

                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <input type="text" name="" id="" placeholder="Direccion Habitacion" class="form-control" required>
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono local" class="form-control" required>    
                                        </div>
                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono celular" class="form-control" required>    
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo" id="" placeholder="Correo electronico" class="form-control">
                                        </div>
                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="" id="" placeholder="Profesion u Oficio" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <input type="text" name="" id="" placeholder="Lugar de trabajo" class="form-control">
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <input type="text" name="" id="" placeholder="Direccion de trabajo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono de oficina" class="form-control">
                                        </div>
                                    </div>
                                </form>
                        <!--</div>-->
                        </div>
                </div>

<!------------------------------- CUARTO FORMULARIO [ REPRESENTANTE LEGAL ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                                <form action="" class="form-group text-center">
          
                                    <div class="row">
                                            <div class="col-12">
                                                <h3 class="form-titulo">Datos del Representante Legal</h3>
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label>Primer Apellido:</label>
                                                <input type="text" name="p-apellido" id="" placeholder="Apellido" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label>Segundo Apellido:</label>
                                                <input type="text" name="s-apellido" id="" placeholder="Apellido" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 my-2">
                                                <label>Primer Nombre:</label>
                                                <input type="text" name="" id="" placeholder="Nombre" class="form-control" required>
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label>Segundo Nombre:</label>
                                                <input type="text" name="" id="" placeholder="Nombre" class="form-control" required>
                                            </div>
                                        </div>

                                
                                        <div class="row">
                                            <div class="col-lg-6 my-2">
                                                <label>Cedula:</label>
                                                <select name="cedula" id="cedula" class="form-control"  required>
                                                    <option value="0">-- Seleccione --</option>
                                                    <option value="V">V - Venezolano/a </option>
                                                    <option value="E">E - Extranjero/a</option>
                                                </select>
                                                <input type="text" maxlength="8" placeholder="C.I" class="form-control" required>     
                                            </div>

                                            <div class="col-lg-6 my-2">
                                                <label>Ocupacion:</label>
                                                <input type="text" name="" id="" placeholder="Ocupacion" class="form-control">
                                            </div>
                                        </div> 
                                
                                        <div class="row my-4">
                                            <div class="col-lg-4 ">
                                                <label for="">Fecha de Nacimiento:</label>
                                                <input type="date" name="" id="" class="form-control">
                                            </div>

                                            <div class="col-lg-8 ">
                                                <label for="">Lugar de Nacimiento</label>
                                                <input type="text" name="" id="" placeholder="Lugar de nacimiento" class="form-control" required>
                                            </div>
                                        </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Parentesco:</label>
                                            <input type="text" name="parentesco" id="" placeholder="Parentesco" class="form-control">
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion o Trabajo:</label>
                                            <input type="text" name="" id="" placeholder="Direccion de Habitacion o Trabajo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Telefono local:</label>
                                            <input type="number" name="telefono" id="" placeholder="Telefono local" class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <p for="" class="">Vive con el estudiante?:</p>
                                            <label for="" class="">Si:</label>
                                            <input type="radio" name="seleccion2" value="si" id="">
                                            <label for="" class="">No:</label>
                                            <input type="radio" name="seleccion2" value="si" id="">
                                        </div>
                                    </div>

<!------------------------------------------- BOTON (SIGUIENTE) ----------------------->
                                <a href="reg-estudiante-1.php" class="btn btn-primary col-lg-2 btn-lg">VOLVER</a>    
                                <a href="reg-estudiante-3.html" class="btn btn-primary col-lg-9 btn-lg">CONTINUAR</a>
                                <!-- <input type="submit" name="continuar" value="CONTINUAR" class="btn btn-primary btn-block btn-lg" id="boton-enviar"> -->
                    <?php require '../../../includes/recib_errors.php'; ?>

                                </form>
                        <!--</div>-->
                        </div>
                </div>


<!----------- DIV container principal Se arrastra hasta el final (NO BORRAR)---->
            </div>

    <?php require '../../../includes/footer_reg_est.php'; ?>
