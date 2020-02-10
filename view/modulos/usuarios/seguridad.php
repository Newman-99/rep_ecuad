<?php require '../../includes/init_system.php'; ?>
<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['anws_modif']) || !empty($_POST['pass_modif'])) {
    $id_usr = $_SESSION["id_user"];
    $respuesta1 = htmlentities(addslashes($_POST["respuesta1"]));
    $respuesta2  = htmlentities(addslashes($_POST["respuesta2"]));
    $pass  = htmlentities(addslashes($_POST["pass"]));
    $pass_confirm  = htmlentities(addslashes($_POST["pass_confirm"]));
    $pass_modif  = htmlentities(addslashes($_POST["pass_modif"]));

    

    $respuesta_modif_1 = htmlentities(addslashes($_POST["respuesta_modif_1"]));
    $respuesta_modif_2 = htmlentities(addslashes($_POST["respuesta_modif_2"]));

    if (validar_datos_vacios($respuesta1,$respuesta2,$pass)) {
        $errors[] = ' La contraseña y preguntas de seguridad para verificar su identidad no pueden estar vacia';
    }else{

$errors = construc_msj(preguntas_usrs($id_usr,$respuesta1,$respuesta2));

if(!comprobar_pass_hash($id_usr,$pass)){
              $errors[] = "La contraseña es incorrecta";
            }    

if(!empty($_POST['anws_modif'])){
if (validar_datos_vacios($respuesta_modif_1) && validar_datos_vacios($respuesta_modif_2)){$errors[] = "Al menos una de las preguntas debe llenar para cambiarlas";}
    
    $errors[]=valid_repuest_usrs($respuesta_modif_1,$respuesta_modif_2);

if(!comprobar_msjs_array($errors)) {    
            
            if (!empty($respuesta_modif_1)) {

             modif_pregunta($id_usr,'1',$respuesta_modif_1);

             $errors[] = "Respuesta uno Modificada con exito";
            }

            if (!empty($respuesta_modif_2)) {            
             modif_pregunta($id_usr,'2',$respuesta_modif_2);
             $errors[] = "Respuesta dos Modificada con exito"; 

            }

        }


}

if(!empty($_POST['pass_modif'])){
echo "string";
    if(validar_datos_vacios($pass_modif,$pass_confirm)){
            $errors[] = "Debe llenar el campo de nueva contraseña y su confirmacion";
        }else{
    
    $errors = NULL;
    $errors = construc_msj(valid_pass_par($pass_modif,$pass_confirm),valid_pass($pass_modif));
    

if (!comprobar_msjs_array($errors)) {    
            $pass_hash = hash_pass($pass_modif);   

             modif_pass($id_usr,$pass_hash);
             $errors[] = "La Contraseña ha sido modificada con exito"; 
}

}
}

    }
}

?>

    <title>Modificacion de Seguridad</title>

    <?php
require '../../includes/header.php';
?>
    
    <h2>Modificacion de Seguridad</h2>

<div class="container"> <!-- container -->
<div class="row">    
<div class="col-lg-12">

 <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" class="form-group text-center" method="POST" autocomplete="on">
    
    <div class="col-12">
    <h4 class="form-titulo">Comprobar Seguridad</h4>
    </div>

    <div class="row my-4">

    <div class="col-lg-4 my-4">
    <label for="">Contraseña</label>
    <input type="pass" name="pass" id="" value="<?php if(isset($pass)) echo $pass; ?>" class="form-control">
    </div>
    
    <div class="col-lg-4 my-4">
    <label for="">¿Cual es su artista favorito?</label>
    <input type="pass" name="respuesta1" id="" value="<?php if(isset($respuesta1)) echo $respuesta1; ?>" class="form-control">
    </div>

    <div class="col-lg-4">
    <label for="">¿Cual es el nombre de su primera mascota?</label> 
    <input type="pass" name="respuesta2" id="" value="<?php if(isset($respuesta2)) echo $respuesta2; ?>" class="form-control">
    </div>
    </div>

    <div class="col-12">
    <h3 class="form-titulo">Modificar</h3>
    </div>

    <!-- Preguntas de seguridad -->
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
    <h4 class="form-titulo2 my-4">Preguntas de Seguridad</h4>
    </div>
    <div class="col-3"></div>
    </div>

    <div class="row">

    <div class="col-lg-6 my-4">
    <label for="">¿Cual es su artista favorito?</label>
    <input type="pass" name="respuesta_modif_1" id="" value="" class="form-control">
    </div>

    <div class="col-lg-6 my-4">
    <label for="">¿Cual es el nombre de su primera mascota?</label> 
    <br>
    <input type="pass" name="respuesta_modif_2" id="" value="" class="form-control">
    </div>
    </div>

    <div class="col-lg-12 ">
    <button id=button class="btn btn-primary" type='submit' name='anws_modif' value='anws_modif'>Guardar Cambios</button>
    </div>

    <hr class="my-4">

    <div class="row">
    <div class="col-3"></div>
    <div class="col-6 my-4">
    <h4 class="form-titulo2">Contraseña</h4>
    </div>
    <div class="col-3"></div>
    </div>

    <div class="row">

    <div class="col-6 my-4">
    <label for="">Nueva Contraseña</label>
    <input type="pass" name="pass_modif" id="" value="" class="form-control">
    </div>

    <div class="col-6 my-4">
    <label for="">Confirmar Contraseña</label>
    <input type="pass" name="pass_confirm" id="" value="" class="form-control">
    </div>

    </div>

        <!-- botones -->
        <div class="row">
        <div class="col-lg-3"><a class="btn btn-primary btn-block" href='../inicio/dashboard.php'>Volver</a></div>
        <div class="col-lg-9"><button id=button class="btn btn-primary btn-block" type='submit' name='pass_modif' value='pass_modif'>Guardar Cambios</button></div>
        </div>
    </form>
</div>
</div>
</div> <!-- Fin container -->
    


    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>".$msjs."</p>";
        }
    }

    ?>

<?php 

require'../../includes/footer.php';