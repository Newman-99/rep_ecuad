<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        $errors = array();
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


 <form id="signupform" role="form" action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"
    method="POST" autocomplete="on">

    <h4>Comprobar Seguridad</h4>

    Contraseña
    <br>
    <input type="pass" name="pass" id="" value="<?php if(isset($pass)) echo $pass; ?>">
    <br>
    <br>
    
    ¿Cual es su artista favorito?
    <br>
    <input type="pass" name="respuesta1" id="" value="<?php if(isset($respuesta1)) echo $respuesta1; ?>">
    <br>
    <br>

    ¿Cual es el nombre de su primera mascota? 
    <br>
    <input type="pass" name="respuesta2" id="" value="<?php if(isset($respuesta2)) echo $respuesta2; ?>">
    <br>
    <br>

    <h3>Modificar</h3>

    <h4>Preguntas de Seguridad</h4>

    ¿Cual es su artista favorito?
    <br>
    <input type="pass" name="respuesta_modif_1" id="" value="">
    <br>
    <br>

    ¿Cual es el nombre de su primera mascota? 
    <br>
    <input type="pass" name="respuesta_modif_2" id="" value="">
    <br><br>
    <button id=button class='' type='submit' name='anws_modif' value='anws_modif'>Guardar Cambios</button>

    <h4>Contraseña</h4>

    Nueva Contraseña
    <br>
    <input type="pass" name="pass_modif" id="" value="">
    <br><br>

    Confirmar Contraseña
    <br>
    <input type="pass" name="pass_confirm" id="" value="">
    <br><br>

    <button id=button class='' type='submit' name='pass_modif' value='pass_modif'>Guardar Cambios</button>


</form>


    <br>
    <a href='../inicio/dashboard.php'>volver</a>
    <br>
    <br>

    <?php
imprimir_msjs($errors);
    ?>

<?php 

require'../../includes/footer.php';