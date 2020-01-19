<?php 

// Validaciones

// Comprobar Variable definida o vacia o con espacios
// 

function validar_datos_vacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || is_null($dato) || comprobar_var_total_espace($dato)){
            $comprobador = true;
        }
}
return $comprobador;
}

function validar_datos_vacios_sin_espacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || preg_match('/\s/',$dato) || comprobar_var_total_espace($dato)){
            $comprobador = true;
        }
}
return $comprobador;
}


function filtrar_nombres_apellidos($nom_apell){

       $nom_apell=trim($nom_apell);
        //$nom_apell=ucwords($nom_apell);
        $nom_apell=ucwords(strtolower($nom_apell));
        return $nom_apell; 
        
    }

function is_valid_email($email )
{
  return (false !== filter_var($email, FILTER_VALIDATE_EMAIL));
}


function comprobar_var_total_espace($str){
        $count_arr=0;
        $count_str=strlen($str);

        $arr=str_split($str);

          foreach ($arr as $pos){

                if (preg_match_all('/\s/',$pos)) {
                    $count_arr++;
                }
}
        if ($count_arr==$count_str)  {
            return TRUE;
        }else{
            return FALSE;
        }
}


function validar_nombres_apellidos(...$nombres_apells){

    foreach ($nombres_apells as $nom_apell) {
        # code...
       if(!preg_match("/^(?=.{3,36}$)[a-zñA-ZÑ](\s?[a-zñA-ZÑ])*$/",$nom_apell)){
        
        return 'El nombre o apellido ingresado es invalido'; 
         }} 
        return NULL;

    }


function validar_fecha_sintaxis(...$fechas){
/*    $valores = explode('/', $fecha);
    if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
        return false;
    }
    return true;*/



foreach ($fechas as $fecha) {
    # code...
        $pattern="/^(0?[1-9]|[12][0-9]|3[01])[\/|-](0?[1-9]|[1][012])[\/|-]((19|20)?[0-9]{2})$/";
    if(preg_match($pattern,$fecha))
    {
    $values=preg_split("[\/|-]",$fecha);
    
        if(checkdate($values[1],$values[0],$values[2])){
            return false;
        }
    }else{
    return true;
}
}
}

function is_valid_num_tlf(...$num_tlfs){
    foreach ($num_tlfs as $num_tlf) {

    if(preg_match("/^[0-9]{11}$/",$num_tlf)){
        return true;
    }
}

return false;
}


function validar_fecha_sintaxis1($date)
{
    $pattern="/^((19|20)?[0-9]{2})[\/|-](0?[1-9]|[1][012])[\/|-](0?[1-9]|[12][0-9]|3[01])$/";
    if(preg_match($pattern,$date))
        return true;
    return false;
}


function validar_fecha_registro(...$fechas){

foreach ($fechas as $fecha) {
    if (!validar_fecha_sintaxis1($fecha)) {
        return "La fecha ingresada es invalida o tiene error de sintaxis";
    }

    if (validar_fecha_sistema($fecha)) {
        return "La fecha ingresada es mayor a la actual del sistema";
    }
}
}



function validar_fecha_sistema($fecha){
    date_default_timezone_set("America/Caracas");
    $fecha_actual = strtotime(date("Y-m-d H:i:s"));
    $fecha_validar = strtotime($fecha);
        if($fecha_actual > $fecha_validar){
            return false;
        }else{
            return true;

        }                   

}

function obtener_fecha_sistema(){

    date_default_timezone_set("America/Caracas");
    return $fecha_actual = date("Y-m-d");
}

function valid_inicio_sesion($nivel_requerido = '3'){

    $comprobador = NULL;

    if(!isset($_SESSION["id_user"])){
      
      header("Location:../../../index.php");

      return false;
        
   }else{

    $nivel_permiso=$_SESSION['nivel_usuario'];

    if ($nivel_permiso > $nivel_requerido || $nivel_permiso == 0) {
           
    header("Location:../../../index.php");
    
    }else{
      return true;
    }
}
}    

//Validar un par de valores

function valid_par_val($val,$val2){
    if(strcmp($val,$val2)){
        return true;
    }else{
        return false;
    }
}

// Comprovar el rango de tamano que debe tener un dato

function rango($valor,$min,$max){
    
    if(strlen($valor)<$min or strlen($valor)>$max){
        return false;
    }else{
        return true;
    }
}


//Validacion de contraseña segura
function valid_pass($pass){

    $errors_pass=NULL; 

    if (!rango($pass,8,20)){
        $errors_pass[] = "La contraseña debe tener una longitud de entre 8 y 20 caracteres";
    }
    if (!preg_match("/[A-Z]/",$pass)) {
        $errors_pass[] = "La contraseña debe llevar almenos un letra mayuscula";
    }               
        if (!preg_match("/[a-z]/",$pass)) {
            $errors_pass[] = "La contraseña debe llevar almenos un letra minuscula";
        }
            if (!preg_match("/[0-9]/",$pass)) {
                $errors_pass[] = "La contraseña debe llevar almenos un numero";
            }
                if (!preg_match("/\W/",$pass)) {
                    $errors_pass[] = "La contraseña debe llevar almenos un caracter especial";
                }
                return $errors_pass;
        }

// Funcion para validar una cedula

function valid_ci($ci){

    $ci=preg_replace("/\.|-|\s/", "",$ci);

    if(preg_match_all("/^[0-9]{7,8}$/",$ci)){
        return NULL;
  
    }else{    
        return "El Numero de cedula es invalido"; 
}
}

//Genera un Token para contrasena

function gen_token(){
    $gen = md5(uniqid(at_rand(),FALSE));
    return $gen;
}

// Generar el hash para la encriptacion de contrasena
function hash_pass($pass){
    $hash = password_hash($pass,PASSWORD_DEFAULT);
    return $hash;
}

//Funcion Para Registrar usuarios

function registrar_datos_usr_bd($ci,$pass_hash,$tip_usr,$respuesta1,$respuesta2){
        global $db;
            $sql = "INSERT INTO usuarios(id_doc,pass,id_tip_usr) 
            VALUES (:id, :pass, :tip_usr)";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"pass"=>$pass_hash,
                "tip_usr"=>$tip_usr));

//////////
            $sql = "INSERT INTO preguntas_usuarios(`id_usr`, `id_pregunta`, `respuesta`) VALUES (:id,'1',:respuesta1);";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"respuesta1"=>$respuesta1));
//////////
            $sql = "INSERT INTO `preguntas_usuarios`(`id_usr`, `id_pregunta`, `respuesta`) VALUES (:id,'2',:respuesta2);";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"respuesta2"=>$respuesta2));
}

function modif_pass($id_usr,$pass){
            global $db;
                $sql = " UPDATE `usuarios` SET `pass`= :pass WHERE :id_usr = `id_doc`; ";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id_usr"=>$id_usr,":pass"=>$pass));
}


function modif_pregunta($id_usr,$id_pregunta,$respuesta){
            global $db;
                $sql = " UPDATE `preguntas_usuarios` SET `respuesta` = :respuesta WHERE `id_usr` = :id_usr AND `id_pregunta` = :id_pregunta; ";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id_usr"=>$id_usr,"respuesta"=>$respuesta,"id_pregunta"=>$id_pregunta));
}



 // Comprobacion del usuario en la Base de datos

function valid_user($ci){
    global $db;

    $sql="SELECT * FROM usuarios WHERE id_doc = :id";
                                    
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);

    $result->execute();

   $count=$result->rowCount();
    if($count == 0){ 
    return true;
    }else{
        return false;
    }
}

function is_exist_ci($ci){
    global $db;

    $sql="SELECT * FROM info_personal WHERE id_doc = :id";
                                    
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);

    $result->execute();

   $count=$result->rowCount();
    if($count == 0){ 
    return false;
    }else{
        return true;
    }
}


// Compracion si el usuario existe en la tabla administradores

function valid_ci_admin($ci){
global $db;
$sql="SELECT * FROM administrativos WHERE id_doc_admin = :id_admin";
            
$result=$db->prepare($sql);

$result->bindValue(":id_admin",$ci);

$result->execute();

$count=$result->rowCount();
if($count == 0){
 return "La cedula debe estar relacionada a un personal administrativo";
}else{
    return NULL;
}
}

    // Funcion Personalizada para comprobar contrasenas
    function valid_pass_par($pass,$pass_confirm){
        if(valid_par_val($pass,$pass_confirm)){
            return "Las contraseñas no conciden";
        }else{
            return NULL;
        }
    }
    
// Funcion para construit mensajes de funciones que devuelven string
function construc_msj(...$args){
    $msj_array = array();
    $total_msj = NULL;
    foreach ($args as $msj) {
        if(is_string($msj)){

            $msj_array[]=$msj;
        }
        
        if(is_array($msj)){
            $arrays=$msj;
            $total_msj=array_merge($msj_array,$arrays);
            }
        }   

        if(empty($total_msj)){
            return $msj_array;
        }else{
        return $total_msj;
        }
}
// Funcion para login/ingreso usuario

function ingreso_user($ci,$pass){
    global $db;
    if (!valid_user($ci)){
        
        if (obtener_nivel_permiso($ci)>0) {
          
            if(comprobar_pass_hash($ci,$pass)){
                last_sesion($ci);

            }else{
              return "La contraseña es incorrecta";
          }  
            }else{
            return "El usuario esta inabilitado, contacte con el administrador";
        }
        
    }else{
        return "El Usuario no Existe";
    }
}



// Comprabar contrasena y hash

function comprobar_pass_hash($ci,$pass){

global $db;

$sql="SELECT pass FROM usuarios WHERE id_doc = :id";
                                
$result=$db->prepare($sql);
                        
$result->bindValue(":id",$ci);

$result->execute();

$hash=$result->fetchColumn();

if (password_verify($pass,$hash)){
    return true;
}else{
    return false;
}
}

function last_sesion($ci){

global $db;

$sql="UPDATE usuarios SET ult_sesion=NOW() WHERE id_doc= :id";
                                
$result=$db->prepare($sql);
                        
$result->bindValue(":id",$ci);

$result->execute();
}

// Obtener el tipo de usuario

function obtener_nivel_permiso($ci){

global $db;

$sql="SELECT id_tip_usr FROM usuarios WHERE id_doc = :id";
                                
$result=$db->prepare($sql);
                        
$result->bindValue(":id",$ci);

$result->execute();

return $nivel=$result->fetchColumn();

}

function obtener_ultimo_id_actualizacion(){

global $db;

$sql="SELECT id_actualizacion FROM actualizacion ORDER BY id_actualizacion DESC;";
                                
$result=$db->prepare($sql);
                        
//$result->bindValue(":id",$id);

$result->execute();

return $id_actualizacion=$result->fetchColumn();

}

// Para mostrar los Datos Basicos y de Bienvenida al usuario al hacer login

function imprimir_usuario_bienvenida($ci){
    global $db;
       $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,ar.descripcion area,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN areas ar ON a.id_area = ar.id_area INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr

    WHERE s.id_doc = :id ";
                             
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);
    
    $result->execute();
    
        echo "<p><table border='1'><caption>Sus Datos: </caption>";
  
        echo "<tr>
    <th>Cedula</th>
     <th>Nombre</th>
    <th>Apellidos</th>
    <th>Area</th>
    <th>Tipo de Usuario</th>
    </tr>";

  while($registro=$result->fetch(PDO::FETCH_ASSOC)){
  echo "
  <tr>
    <td>".$registro['id_doc']."</td>
    <td>".$registro['nombre']."</td>
    <td>".$registro['apellido_p']." ".$registro['apellido_m']."</td>
    <td>".$registro['area']."</td>
    <td>".$registro['nivel']."</td>
    <td> 
    
    <form action='../usuarios/seguridad.php' method='post'>
                        
    <button type='submit' class='' id='' value=".$registro['id_doc']." name ='modif_pass' >Seguridad</button>
    
    </form>

    </td>

    </tr>";

echo "</table></p>";
    }
        
    }



function is_exist_docente($ci){
    global $db;

    $sql="SELECT * FROM docentes WHERE id_doc_docent = :id";
                                    
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);

    $result->execute();

   $count=$result->rowCount();
    if(!$count == 0){ 
    return true;
    }else{
        return false;
    }
}

function disable_foreing(){
    return "SET FOREIGN_KEY_CHECKS=0; ";
}

function enable_foreing(){
    return " SET FOREIGN_KEY_CHECKS=1; ";
}


function registrar_persona($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$estado_civil,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$tlf_emergecia = ''){
    
    global $db;

$nombres=trim($nombres);

$sql = "INSERT INTO info_personal(id_doc, nombre, apellido_p, apellido_m, fecha_nac, lugar_nac,direcc_hab, id_nacionalidad, id_estado_civil, id_sexo) VALUES (:id_doc,:nombre,:apellido_p,:apellido_m,:fecha_nac,:lugar_nac,:direcc_hab,:id_nacionalidad,:id_estado_civil,:id_sexo)";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"nombre"=>$nombres,
"apellido_p"=>$apellido_p,"apellido_m"=>$apellido_m,"fecha_nac"=>$fecha_nac,"lugar_nac"=>$lugar_nac,"direcc_hab"=>$direcc_hab,"id_nacionalidad"=>$nacionalidad,"id_estado_civil"=>$estado_civil,"id_sexo"=>$sexo));

// Insertando datos de contacto

$sql = disable_foreing()."INSERT INTO contact_basic (id_doc,tlf_local,tlf_cel,correo,tlf_emergecia)
VALUES (:id_doc,:tlf_local,:tlf_cel,:correo,:tlf_emergecia);".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"tlf_local"=>$tlf_local,
"tlf_cel"=>$tlf_cel,"correo"=>$correo,"tlf_emergecia"=>$tlf_emergecia));

}

function actualizar_persona($nacionalidad ,$id_doc,$id_doc_new,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$tlf_emergecia =''){

    global $db;

$sql = disable_foreing()." UPDATE info_personal SET id_doc =:id_doc_new, nombre = :nombre, apellido_p = :apellido_p, apellido_m = :apellido_m, fecha_nac = :fecha_nac, lugar_nac = :lugar_nac,direcc_hab = :direcc_hab, id_nacionalidad = :id_nacionalidad, id_estado_civil = :id_estado_civil, id_sexo = :id_sexo WHERE id_doc = :id_doc; ".enable_foreing();


$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_doc_new"=>$id_doc_new,"nombre"=>$nombres,
"apellido_p"=>$apellido_p,"apellido_m"=>$apellido_m,"fecha_nac"=>$fecha_nac,"lugar_nac"=>$lugar_nac,"direcc_hab"=>$direcc_hab,"id_nacionalidad"=>$nacionalidad,"id_estado_civil"=>$estado_civil,"id_sexo"=>$sexo));


$sql = disable_foreing()." UPDATE contact_basic SET id_doc = :id_doc_new, tlf_local = :tlf_local,tlf_cel = :tlf_cel, correo = :correo,tlf_emergecia = :tlf_emergecia where id_doc = :id_doc; ".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_doc_new"=>$id_doc_new,"tlf_local"=>$tlf_local,
"tlf_cel"=>$tlf_cel,"correo"=>$correo,"tlf_emergecia"=>$tlf_emergecia));

}


function registrar_datos_laborales($id_doc ,$prof_ofic,$lugar_trab,$direcc_trab,$tlf_ofic){
    
    global $db;

$sql = "INSERT INTO `laboral`(`id_doc`, `prof_ofic`, `lugar_trab`, `direcc_trab`, `tlf_ofic`) VALUES (:id_doc,:prof_ofic,:lugar_trab,:direcc_trab,:tlf_ofic);";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"prof_ofic"=>$prof_ofic,"lugar_trab"=>$lugar_trab,"direcc_trab"=>$direcc_trab,"tlf_ofic"=>$tlf_ofic));
}

function registrar_padres($id_doc,$tip_padre,$ci_escolar,$convivencia,$ocupacion,$parentesco,$nacionalidad,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$estado_civil,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo){
    
    global $db;

registrar_person_estudiantes($id_doc,$ci_escolar,$convivencia,$ocupacion,$parentesco);

 registrar_persona($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$fecha_nac,$estado_civil,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo);


$sql = "INSERT INTO `padres`(`id_doc`, `id_tip_padre`,ci_escolar) VALUES (:id_doc,:id_tip_padre,:ci_escolar)";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_tip_padre"=>$tip_padre,"ci_escolar"=>$ci_escolar));

}

function registrar_representantes($id_doc,$ci_escolar){
    
    global $db;

$sql = "INSERT INTO `representantes`(`id_doc`,ci_escolar) VALUES (:id_doc,:ci_escolar)";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"ci_escolar"=>$ci_escolar));

}

function registrar_pers_retirar($id_doc,$ci_escolar){
    
    global $db;

$sql = "INSERT INTO `pers_retirar`(`id_doc`,ci_escolar) VALUES (:id_doc,:ci_escolar)";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"ci_escolar"=>$ci_escolar));

}



function registrar_person_estudiantes($id_doc,$ci_escolar,$convivencia,$ocupacion,$parentesco){
    
    global $db;


$sql = "INSERT INTO `pers_est`(`ci_escolar`, `id_doc`, `convivencia`, `ocupacion`, `parentesco`) VALUES (:ci_escolar,:id_doc,:convivencia,:ocupacion,:parentesco)";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"ci_escolar"=>$ci_escolar,"convivencia"=>$convivencia,"ocupacion"=>$ocupacion,"parentesco"=>$parentesco));

}



function eliminar_persona($id_doc){

global $db;

$sql = disable_foreing()."DELETE FROM `info_personal` WHERE id_doc = :id_doc; ".enable_foreing();

$result=$db->prepare($sql);
                            
  $result->bindValue(":id_doc",$id_doc);

 $result->execute();


$sql = disable_foreing()." DELETE FROM contact_basic WHERE id_doc = :id_doc; " .enable_foreing();

$result=$db->prepare($sql);
                            
 $result->bindValue(":id_doc",$id_doc);

 $result->execute();

}



function registrar_docentes($id_doc,$funcion_docent,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion){

    global $db;

// Insertando datos de la persona como docente

$sql =disable_foreing()."INSERT INTO docentes(id_doc_docent,id_funcion_predet,id_turno,id_estado,fecha_ingreso,fecha_inabilitacion) VALUES (:id_doc_docent,:id_funcion_predet,:id_turno,:id_estado,:fecha_ingreso,:fecha_inabilitacion);".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_docent"=>$id_doc,"id_funcion_predet"=>$funcion_docent,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

}


function actualizar_docentes($id_doc,$id_doc_new,$id_funcion_predet,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion){

    global $db;

    // Insertando datos personales genericos
    
$sql =disable_foreing()."UPDATE docentes SET id_doc_docent = :id_doc_new,id_funcion_predet = :id_funcion_predet,id_turno = :id_turno,id_estado = :id_estado,fecha_ingreso = :fecha_ingreso,fecha_inabilitacion = :fecha_inabilitacion where id_doc_docent = :id_doc_docent; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_docent"=>$id_doc,"id_doc_new"=>$id_doc_new,"id_funcion_predet"=>$id_funcion_predet,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

if (is_exist_admin($id_doc)) {
actualizar_admin($id_doc,$id_doc_new);
}

}



function eliminar_docente($id_doc){

global $db;


    $sql =disable_foreing()." DELETE FROM docentes WHERE id_doc_docent = :id_doc; ".enable_foreing();

    $result=$db->prepare($sql);

     $result->bindValue(":id_doc",$id_doc);

     $result->execute();

}


function actualizar_admin($id_doc,$id_doc_new){

global $db;

$sql =disable_foreing()." UPDATE administrativos SET id_doc_admin = :id_doc_new where id_doc_admin = :id_doc_admin; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_admin"=>$id_doc,"id_doc_new"=>$id_doc_new));

$sql =disable_foreing()." UPDATE `usuarios` SET `id_doc`= :id_doc_new where id_doc = :id_doc_admin; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_admin"=>$id_doc,"id_doc_new"=>$id_doc_new));
}


function actualizar_admins($nacionalidad ,$id_doc,$id_doc_new,$nombres,$apellido_p,$apellido_m,$sexo,$area,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion){

    global $db;

    // Insertando datos personales genericos
    
$sql = disable_foreing()." UPDATE info_personal SET id_doc =:id_doc_new, nombre = :nombre, apellido_p = :apellido_p, apellido_m = :apellido_m, fecha_nac = :fecha_nac, lugar_nac = :lugar_nac,direcc_hab = :direcc_hab, id_nacionalidad = :id_nacionalidad, id_estado_civil = :id_estado_civil, id_sexo = :id_sexo WHERE id_doc = :id_doc; ".enable_foreing();


$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_doc_new"=>$id_doc_new,"nombre"=>$nombres,
"apellido_p"=>$apellido_p,"apellido_m"=>$apellido_m,"fecha_nac"=>$fecha_nac,"lugar_nac"=>$lugar_nac,"direcc_hab"=>$direcc_hab,"id_nacionalidad"=>$nacionalidad,"id_estado_civil"=>$estado_civil,"id_sexo"=>$sexo));


$sql = disable_foreing()." UPDATE contact_basic SET id_doc = :id_doc_new, tlf_local = :tlf_local,tlf_cel = :tlf_cel, correo = :correo where id_doc = :id_doc; ".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_doc_new"=>$id_doc_new,"tlf_local"=>$tlf_local,
"tlf_cel"=>$tlf_cel,"correo"=>$correo));


$sql =disable_foreing()."UPDATE administrativos SET id_doc_admin = :id_doc_new,id_area = :id_area,id_turno = :id_turno,id_estado = :id_estado,fecha_ingreso = :fecha_ingreso,fecha_inabilitacion = :fecha_inabilitacion where id_doc_admin = :id_doc_admin; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_admin"=>$id_doc,"id_doc_new"=>$id_doc_new,"id_area"=>$area,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

$sql =disable_foreing()."UPDATE `usuarios` SET `id_doc`= :id_doc_new where id_doc = :id_doc_admin; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_admin"=>$id_doc,"id_doc_new"=>$id_doc_new));


}

function eliminar_admin($id_doc){

global $db;


    $sql =disable_foreing()." DELETE FROM `administrativos` WHERE `id_doc_admin` = :id_doc; ".enable_foreing();

    $result=$db->prepare($sql);

     $result->bindValue(":id_doc",$id_doc);

     $result->execute();

    $sql =disable_foreing()." DELETE FROM `usuarios` WHERE `id_doc` = :id_doc; ".enable_foreing();

    $result=$db->prepare($sql);

     $result->bindValue(":id_doc",$id_doc);

     $result->execute();
     

}



function regist_admins($id_doc,$id_area,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion){

    global $db;

$sql =disable_foreing()." INSERT INTO `administrativos`(`id_doc_admin`, `id_turno`, `id_area`, fecha_ingreso,fecha_inabilitacion,id_estado) VALUES (:id_doc,:id_turno,:id_area,:fecha_ingreso,:fecha_inabilitacion,:id_estado);".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc"=>$id_doc,"id_area"=>$id_area,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

}


    function actualizar_clases($id_clase,
        $id_new_clase,
        $grado,
        $seccion,
        $no_aula,
        $id_turno,
        $anio_escolar1,
        $anio_escolar2){

    global $db;

    $seccion=strtoupper($seccion);
  

$parameters = array(
    ':id_new_clase'=>$id_new_clase,    
    ':id_clase'=>$id_clase,
    ':grad'=>$grado,
    ':secc'=>$seccion,
    ':aula'=>$no_aula,
    ':turno'=>$id_turno,
    ':anio_1'=>$anio_escolar1,
    ':anio_2'=>$anio_escolar2);

$sql = disable_foreing()." UPDATE `clases` SET `id_clase`=:id_new_clase,`grado`= :grad,`seccion` = :secc,`no_aula`= :aula,`id_turno` = :turno, `anio_escolar1` = :anio_1,`anio_escolar2` = :anio_2 WHERE id_clase = :id_clase; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute($parameters);


$sql = "UPDATE `clases_asignadas` SET `id_clase` = :id_new_clase WHERE `id_clase` = :id_clase";

$parameters = array(
    ':id_new_clase'=>$id_new_clase,    
    ':id_clase'=>$id_clase);

$result=$db->prepare($sql);

$result->execute($parameters);


$sql = "UPDATE `estudiantes_asignados` SET `id_clase` = :id_new_clase WHERE `id_clase` = :id_clase";

$parameters = array(
    ':id_new_clase'=>$id_new_clase,    
    ':id_clase'=>$id_clase);

$result=$db->prepare($sql);

$result->execute($parameters);
        
    }

function cantidad_estudent($id_clase,$id_estado){
    global $db;

    $sql="SELECT cl.id_clase,esa.ci_escolar FROM clases cl INNER JOIN estudiantes_asignados esa ON cl.id_clase = esa.id_clase WHERE esa.id_estado = :id_estado AND cl.id_clase = :id_clase";
                                    
    $result=$db->prepare($sql);
                            
    $result->execute(array(":id_estado"=>$id_estado,":id_clase"=>$id_clase));
    
   $count=$result->rowCount();

   return $count;
   
}



function is_exist_student($ci){
    global $db;
    
        $sql="SELECT * FROM estudiantes WHERE ci_escolar = :id";
                                        
        $result=$db->prepare($sql);
                                
        $result->bindValue(":id",$ci);
    
        $result->execute();
    
   $count=$result->rowCount();
    if(!$count == 0){ 
    return true;
    }else{
        return false;
    }

    }


function is_exist_admin($ci){
    global $db;
    
        $sql="SELECT * FROM administrativos WHERE id_doc_admin = :id";
                                        
        $result=$db->prepare($sql);
                                
        $result->bindValue(":id",$ci);
    
        $result->execute();
    
   $count=$result->rowCount();
    if($count == 0){ 
    return true;
    }else{
        return false;
    }

    }


    function registrar_clases(/*$id_doc_docent,
        $id_doc_docent_fis,
        $id_doc_docent_cult,*/
        $grado,
        $seccion,
        $no_aula,
        $id_turno,
        $anio_escolar1,
        $anio_escolar2){
    global $db;

    $seccion=strtoupper($seccion);
  
  $id_clase = generador_id_clases($grado,$seccion,$anio_escolar1,$anio_escolar2,$id_turno);

$parameters = array(
    ':id'=>$id_clase,    
    ':grad'=>$grado,
    ':secc'=>$seccion,
    ':aula'=>$no_aula,
    ':turno'=>$id_turno,
    ':anio_1'=>$anio_escolar1,
    ':anio_2'=>$anio_escolar2,);


$sql = disable_foreing()." INSERT INTO `clases`(`id_clase`,`grado`,`seccion`,`no_aula`,`id_turno`, `anio_escolar1`,`anio_escolar2`)
VALUES (:id,
:grad,
:secc,
:aula,
:turno,
:anio_1,
:anio_2); ".enable_foreing();

$result=$db->prepare($sql);

$result->execute($parameters);
        
    }

    function asignar_clase_for_estudent($id_clase,$id_estado,$id_actualizacion,$ci_escolar){
    global $db;

$parameters = array(
    ':id_clase'=>$id_clase,    
    ':id_estado'=>$id_estado,
    ':id_actualizacion'=>$id_actualizacion,
    ':ci_escolar'=>$ci_escolar,

);


$sql = disable_foreing()." INSERT INTO `estudiantes_asignados`(`id_clase`,`id_estado`,`id_actualizacion`,ci_escolar)
VALUES (:id_clase,:id_estado,:id_actualizacion,:ci_escolar); ".enable_foreing();

$result=$db->prepare($sql);

$result->execute($parameters);
        
    }




function is_exist_contrato_clase($id_clase,$id_doc_docent,$id_funcion_docent){

      global $db;
      
    $sql="SELECT * FROM `clases_asignadas` WHERE id_doc_docent = :id_doc_docent AND id_funcion_docent = :id_funcion_docent AND id_clase = :id_clase;";

    $result=$db->prepare($sql);

      $result->execute(array("id_doc_docent"=>$id_doc_docent,":id_funcion_docent"=>$id_funcion_docent,"id_clase"=>$id_clase));

    $result->execute();

   $count=$result->rowCount();
    if(!$count == 0){ 
    return true;
    }else{
        return false;
    }
}

function is_exist_nro_contrato_clase($id_contrato_clase){

      global $db;
      
    $sql="SELECT * FROM `clases_asignadas` WHERE id_contrato_clase = :id_contrato_clase;";

    $result=$db->prepare($sql);

$result->bindValue(":id_contrato_clase",$id_contrato_clase);

    $result->execute();

   $count=$result->rowCount();
    if(!$count == 0){ 
    return true;
    }else{
        return false;
    }
}

function validar_grado($grado){

if (preg_match("/^[1-6]{1}$/",$grado)) {
    return NULL;
} else {
 return "El Grado que a ingresado es invalido";
}

}  


function validar_seccion($seccion){

if (preg_match("/^[A-z]{1}$/",$seccion)) {
    return NULL;
} else {
 return "La seccion que usted a ingresado es invalida";
}

}  

function validar_anio_escolar($anio_escolar_1,$anio_escolar_2){

$anio_actual = date("Y",time());


if ($anio_escolar_1 > $anio_actual+1 || $anio_escolar_2 > $anio_actual+1 || $anio_escolar_1<1944 || $anio_escolar_2<1944 || $anio_escolar_1+1 != $anio_escolar_2
|| !preg_match("/^[0-9]{4}$/",$anio_escolar_1,$anio_escolar_2)
){
    return "Año Escolar Invalido";
} else {
   return NULL;
    }

    }

function comprobar_no_aula($no_aula){ 
if (!preg_match("/[0-9]/",$no_aula)) {
    return "Solo puede ingresar numeros en el numero de aulas";
} else {
    return NULL;
    }

    }

/*
function validar_tipo_dodente_repetido($id_clase,$tipo_docent){

global $db;

        $sql="SELECT * FROM clases_asignadas c WHERE id_tipo_docent = :tipo_docent AND id_clase = :id_clase";
                                    
    $result=$db->prepare($sql);
                            
                $result->execute(array("tipo_docent"=>$tipo_docent,"id_clase"=>$id_clase));

    $result->execute();

   $count=$result->rowCount();
    if(!$count == 0){ 
    return true;
    }else{
        return false;
    }
    /*
            if (!empty($tipo_docent)) {

        foreach ($tipo_docent as $id) {
            if (validar_tipo_dodente_repetido($id_clase,$id)) {
                switch ($id) {
                    case "1":
                    $errors[] = "" 
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }

        }
        }
     */

//}


// Para evitar asignar un docente que ya tien el turno ocupado


function generador_id_clases($grado,$seccion,$anio_escolar1,$anio_escolar2,$turno){
      return $id_clase = $grado.'-'.$seccion.'-'.$anio_escolar1.'-'.$anio_escolar2.'-'.$turno;
}

// Por si un docente ya tiene un turno ocupado para asignarle una clase

function comprobar_turno_docent_clase($id_doc_docent,$id_turno){
    global $db;
   $sql="SELECT d.id_doc_docent,c_a.id_clase,c.id_turno FROM docentes d INNER JOIN clases_asignadas c_a ON d.id_doc_docent = c_a.id_doc_docent INNER JOIN clases c ON c_a.id_clase = c.id_clase WHERE d.id_doc_docent = :id_doc AND c.id_turno = :id_turno  AND d.id_doc_docent != 'No asignado'";

       $result=$db->prepare($sql);

        $result->execute(array("id_doc"=>$id_doc_docent,"id_turno"=>$id_turno));
 
    $result->execute();

   $count=$result->rowCount();
    if($count == 0){ 
        return true;
    }else{
         return false;

    }
}



 /*
 function asignar_docente_clase($id_clase,$id_contrato_clase,$grado,$seccion,$id_doc_docent,$id_tipo_docent,$id_estado,$nro_contrato){

    global $db;

$sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_contrato_clase`, `id_estado`, `id_clase`, `id_doc_docent`, `id_tipo_docent`, `nro_contrato`) VALUES (:id_contrato_clase,:id_estado,:id_clase,:id_doc_docent,:id_tipo_docent,:nro_contrato); ".enable_foreing();
            
 $result = $db->prepare($sql);
            
 $result->execute(array("id_contrato_clase"=>$id_contrato_clase,"id_estado"=>$id_estado,"id_clase"=>$id_clase,"id_doc_docent"=>$id_doc_docent,"id_tipo_docent"=>$id_tipo_docent,"nro_contrato"=>$nro_contrato));

}
*/
 function asignar_docente_clase($id_clase,$grado,$seccion,$id_doc_docent,$id_funcion_docent,$id_estado){

    global $db;

$sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_estado`, `id_clase`, `id_doc_docent`, `id_funcion_docent`) VALUES (:id_estado,:id_clase,:id_doc_docent,:id_funcion_docent); ".enable_foreing();
            
 $result = $db->prepare($sql);
            
 $result->execute(array("id_estado"=>$id_estado,"id_clase"=>$id_clase,"id_doc_docent"=>$id_doc_docent,"id_funcion_docent"=>$id_funcion_docent));

}




function generador_id_contrato_clase($id_clase,$id_doc_docent,$tipo_docent,$nro_contrato=1){

$id_contrato_clase=$id_clase.'-'.$id_doc_docent.'-'.$tipo_docent.'-'.$nro_contrato;
return $id_contrato_clase;
}


function obten_func_docent_x_contrato($id_contrato_clase){

    global $db;

$sql="SELECT id_funcion_docent FROM clases_asignadas WHERE id_contrato_clase = :id_contrato_clase;"; 
                                
$result=$db->prepare($sql);
                        
$result->bindValue(":id_contrato_clase",$id_contrato_clase);

$result->execute();

return $id_funcion_docent=$result->fetchColumn();

}


function obten_estado_docente($id_doc_docent){

    global $db;

$sql="SELECT id_estado FROM docentes WHERE id_doc_docent = :id_doc_docent;"; 
                                
$result=$db->prepare($sql);
                        
$result->bindValue(":id_doc_docent",$id_doc_docent);

$result->execute();

return $id_estado=$result->fetchColumn();

}


function comprobar_msjs_array($array){
    $comprobador=FALSE;
        foreach ($array as $key => $value) {
        if (is_string($value)) {
            $comprobador=TRUE;
        }
    }
    return $comprobador;
    }


function comprobar_aula_ocupada($no_aula){
    global $db;
   $sql="SELECT no_aula  FROM clases
WHERE no_aula = :no_aula";

       $result=$db->prepare($sql);

        $result->bindValue(":no_aula",$no_aula);
 
    $result->execute();

   $count=$result->rowCount();
    if($count > 0){ 
        return true;
    }else{
         return false;

    }
}

function exist_nro_contrato_clase($nro_contrato){
     global $db;
   $sql='SELECT nro_contrato FROM clases_asignadas WHERE nro_contrato = :nro_contrato';

       $result=$db->prepare($sql);

        $result->bindValue("nro_contrato",$nro_contrato);
 
    $result->execute();

   $count=$result->rowCount();
    if($count > 0){ 
        return true;
    }else{
         return false;

    }
}

function registrar_estudiante($nacionalidad ,$id_doc_estd,$ci_escolar,$nombre1,$nombre2,$apellido_p,$apellido_m,$sexo,$fecha_nac,$lugar_nac,$direcc_hab,$colecc_bicent,$canaima,$contrato){

 
     global $db;
    if(empty($id_doc_estd) || is_null($id_doc_estd)) {
 registrar_persona($nacionalidad ,$ci_escolar,$nombre1." ".$nombre2,$apellido_p,$apellido_m,$sexo,$fecha_nac,'1',$lugar_nac,$direcc_hab,NULL,NULL,NULL);
    }else{

 registrar_persona($nacionalidad ,$id_doc_estd,$nombre1." ".$nombre2,$apellido_p,$apellido_m,$sexo,$fecha_nac,'1',$lugar_nac,$direcc_hab,NULL,NULL,NULL);
 $ci_escolar = $id_doc_estd;
}

$sql = "INSERT INTO `estudiantes`(`ci_escolar`, `id_doc`, `id_estado`) VALUES (:ci_escolar,:id_doc_est ,:id_estado);";

$result=$db->prepare($sql);
                            
$result->execute(array("ci_escolar" => $ci_escolar,"id_doc_est"=>$id_doc_estd,
"id_estado"=>'3'));

$sql = "INSERT INTO `recursos_public`(`ci_escolar`, `colecc_bicent`, `canaima`, `contrato`) VALUES (:ci_escolar,:colecc_bicent,:canaima,:contrato);";

$result=$db->prepare($sql);
                            
$result->execute(array("ci_escolar" => $ci_escolar,"colecc_bicent"=>$colecc_bicent,
"canaima"=>$canaima,"contrato"=>$contrato));



}



function register_user($ci,$pass,$pass_confirm,$respuesta1,$respuesta2){

    global $db;

    $tip_usr=0;    

    //Validacion de datos vacios y espacios
        if(validar_datos_vacios_sin_espacios($ci) || validar_datos_vacios($respuesta1,$respuesta2,$pass,$pass_confirm)){
            $errors_total[] = "Debe llenar todos los campos, evitando espacios en la cedula";    
    }else{
        if(!valid_user($ci)){
            $errors_total[] = "<p>El usuario ya existe</p> 
            <p></p>Si desea puede Iniciar Sesion"; 
            return $errors_total;
        }else{

        if (is_exist_ci($ci)) {
       $errors_total[]='La cedula ya esta registrada en el sistema';
        }

        if(is_string(valid_ci_admin($ci)) || is_string(valid_ci($ci)) || is_array(valid_pass($pass)) || is_string(valid_pass_par($pass,$pass_confirm)) || is_string(valid_repuest_usrs($respuesta1,$respuesta2))) {            
            
            $errors_total = construc_msj(valid_repuest_usrs($respuesta1,$respuesta2),valid_ci_admin($ci),valid_ci($ci),valid_pass_par($pass,$pass_confirm),valid_pass($pass));
                return $errors_total;
                
                        }else{
                        $pass_hash = hash_pass($pass);

                        registrar_datos_usr_bd($ci,$pass_hash,$tip_usr,$respuesta1,$respuesta2);

                        session_start();
                        $_SESSION['id_user'] = $ci;
                        $_SESSION['nivel_usuario'] = obtener_nivel_permiso($ci);
                        header("Location:../inicio/dashboard.php");   
                    }
            }
        }
    }

           function valid_repuest_usrs($respuesta1,$respuesta2){ 
        if (strlen($respuesta1)>30 || strlen($respuesta2)>30 ) {
            $error = "Las Repuestas no pueden exceder los 30 caracteres";
                return $error;
            }else{

            return NULL;

            }
        }

function login_users($ci,$pass){

    if(validar_datos_vacios_sin_espacios($pass,$ci)){
        return $errors[]= "Debe llenar todos los campos y evitar los espacios";
    }

                elseif(is_string(valid_ci($ci))){
               return $errors[]= valid_ci($ci);
        }else{

            if(is_string(ingreso_user($ci,$pass))){ 
            return $errors[] = ingreso_user($ci,$pass);
        }else{

            ingreso_user($ci,$pass);
            session_start(); 
            $_SESSION['id_user'] = $ci;
            $_SESSION['nivel_usuario'] = obtener_nivel_permiso($ci);
            header("Location:../inicio/dashboard.php");
            }
        }

        }


        function exist_user($id_doc){
     global $db;
   $sql='SELECT id_doc FROM usuarios WHERE id_doc = :id';

       $result=$db->prepare($sql);

        $result->bindValue("id",$id_doc);
 
    $result->execute();

   $count=$result->rowCount();
    if($count > 0){ 
        return true;
    }else{
         return false;

    }
}

function is_exist_clases_asignadas($id_doc){

     global $db;

   $sql='SELECT doc.id_doc_docent FROM docentes doc 
INNER JOIN clases_asignadas ca ON doc.id_doc_docent = ca.id_doc_docent 
INNER JOIN clases cl ON ca.id_clase = cl.id_clase 

            WHERE doc.id_doc_docent = :id';

       $result=$db->prepare($sql);

        $result->bindValue("id",$id_doc);
 
    $result->execute();

   $count=$result->rowCount();

    if($count > 0){ 
        return true;
    }else{
         return false;
    }
}

function is_exist_clase($id_clase){

     global $db;

   $sql='SELECT id_clase FROM clases
            WHERE id_clase = :id_clase';

       $result=$db->prepare($sql);

        $result->bindValue("id_clase",$id_clase);
 
    $result->execute();

   $count=$result->rowCount();

    if($count > 0){ 
        return true;
    }else{
         return false;
    }
}

function mostrar_user_especifico($id){

global $db;

    $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,ar.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN areas ar ON a.id_area = ar.id_area INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr ORDER BY s.ult_sesion DESC
 WHERE s.id_doc = :id";
    
    $result=$db->prepare($sql);

     $result->bindValue(":id",$id);

    imprimir_usuarios($result);                                    

}

function mostrar_users_todos(){
    global $db;
            $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,ar.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN areas ar ON a.id_area = ar.id_area INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr ORDER BY s.ult_sesion DESC";

            $result=$db->prepare($sql);

            imprimir_usuarios($result);                                    
}

    function imprimir_usuarios ($result){
        $result->execute();


echo "          <div>
                <table class='tabla' border='1'>
                    <thead>
                        <tr>
                         <th>Cédula</th> 
                         <th>Nombres</th> 
                         <th>Apellidos</th> 
                         <th>Cargo</th> 
                         <th>Ultimo Inicio de Sesion</th> 
                         <th>Tipo de Usuario</th>
                        <th></th>
                        </tr>
                    </thead>
                  <tr>
";
                     while($registro=$result->fetch(PDO::FETCH_ASSOC)){

                        $id_usr=$registro['id_doc'];

                        $ult_sesion = $registro['ult_sesion'];
                        if ($ult_sesion == '0000-00-00') {
                            $ult_sesion = 'No ha iniciado por primera vez';
                        }

echo "                  <td>".$id_usr."</td>
                        <td>".$registro['nombre']."</td>
                        <td>".$registro['apellido_p']." ".$registro['apellido_m']."</td> 
                        <td>".$registro['cargo']."</td>
                        <td>".$ult_sesion."</td>
                        <td>".$registro['nivel']."</td>

                         <td> 

                        <form action=".$_SERVER['PHP_SELF']." method='post'>
                        

                            <button type='submit' value=".$id_usr." name='modificar'>Modificar</button>

                         <br><br>

                        <button type='submit' value=".$id_usr." name='reiniciar' class='icon-cancel' id='button-modi'>Reiniciar</button>

                        </td>
                          </tr>";

      }

      echo "</table>
            </div>";
    }

function modificar_user($id_usr,$tipo_usr){


    global $db;

$sql = disable_foreing()."UPDATE `usuarios` SET id_tip_usr=:tipo_usr WHERE id_doc = :id_usr; ".enable_foreing();

$parameters = array(
    ':tipo_usr'=>$tipo_usr,    
    ':id_usr'=>$id_usr);


$result=$db->prepare($sql); 

$result->execute($parameters);
        
    }

    function delete_usr($id_usr){

         global $db;

    delete_answers($id_usr);


         $sql = disable_foreing()." DELETE FROM `usuarios` WHERE id_doc = :id_usr; ".enable_foreing();

    $result=$db->prepare($sql);

    $result->bindValue("id_usr",$id_usr);
 
    $result->execute();

    }

function delete_answers($id_usr){
    global $db;
            
$sql = disable_foreing()." DELETE FROM `preguntas_usuarios`WHERE id_usr = :id_usr; ".enable_foreing();

            
    $result = $db->prepare($sql);

    $result->bindValue("id_usr",$id_usr);

        $result->execute();
}

function mostrar_users_tipos($id_tipo){
    global $db;
            $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,c.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN cargos c ON a.id_cargo = c.id_cargo INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr
            WHERE s.id_tip_usr = :id_tipo
            ORDER BY s.ult_sesion DESC";

            $result=$db->prepare($sql);

        $result->bindValue(":id_tipo",$id_tipo);

            imprimir_usuarios($result);  

}

        function exist_tipo_user($id_tip_usr){
     global $db;
   $sql='SELECT id_tip_usr FROM usuarios WHERE id_tip_usr = :id_tip_usr';

       $result=$db->prepare($sql);

        $result->bindValue("id_tip_usr",$id_tip_usr);
 
    $result->execute();

   $count=$result->rowCount();
    if($count > 0){ 
        return true;
    }else{
         return false;

    }
}


function preguntas_usrs($id,$respuesta1,$respuesta2){


    global $db;
       $sql="SELECT pusr.respuesta,usr.id_doc,pusr.id_pregunta FROM usuarios usr
INNER JOIN preguntas_usuarios pusr ON usr.id_doc = pusr.id_usr
INNER JOIN preguntas_disponible pd ON pusr.id_pregunta = pd.id_pregunta 
WHERE usr.id_doc = :id AND pusr.id_pregunta = '1';
 ";
                             
    $result=$db->prepare($sql);
                            
    $result->bindValue("id",$id);
    
    $result->execute();
    

  while($registro=$result->fetch(PDO::FETCH_ASSOC)){
    $respuesta1_confirm = $registro['respuesta'];
    }

    global $db;
       $sql="SELECT pusr.respuesta,usr.id_doc,pusr.id_pregunta FROM usuarios usr
INNER JOIN preguntas_usuarios pusr ON usr.id_doc = pusr.id_usr
INNER JOIN preguntas_disponible pd ON pusr.id_pregunta = pd.id_pregunta 
WHERE usr.id_doc = :id AND pusr.id_pregunta = '2';";
                             
    $result=$db->prepare($sql);
                            
    $result->bindValue("id",$id);
    
    $result->execute();
    

  while($registro=$result->fetch(PDO::FETCH_ASSOC)){
    $respuesta2_confirm = $registro['respuesta'];

    }

    $error=array();

    if (strcmp($respuesta1, $respuesta1_confirm) != 0){
        $error[]='La Repuesta uno es incorrecta';
    }

    if (strcmp($respuesta2, $respuesta2_confirm) != 0) {
        $error[]='La Repuesta dos es incorrecta';
    }    
    return $error;
}

function cambiar_pass($id_usr,$pass_hash){


    global $db;

$sql = "UPDATE usuarios SET pass = :pass_hash WHERE id_doc = :id_usr; ";

$parameters = array(
    ':pass_hash'=>$pass_hash,    
    ':id_usr'=>$id_usr);


$result=$db->prepare($sql); 

$result->execute($parameters);
        
    }

function consulta_docentes(){

    $sql="SELECT in_p.id_doc,
            in_p.nombre,
            in_p.apellido_p,
            in_p.apellido_m,
            tr.descripcion descripcion_turno,
            fd.descripcion funcion,
            fd.id_funcion_docent,
            est.descripcion descripcion_estado,
            est.id_estado,
            cb.tlf_cel,
            cb.tlf_local,
            cb.correo,
            doc.fecha_ingreso,
            doc.fecha_inabilitacion,
            nc.id_nacionalidad,
            nc.descripcion nacionalidad,
            in_p.id_sexo,
            sx.descripcion sexo,
            doc.id_funcion_predet,
            in_p.fecha_nac,
            in_p.lugar_nac,
            in_p.direcc_hab,
            in_p.id_estado_civil,
            esc.descrpcion est_civil,
            doc.id_turno
            
           FROM docentes doc 
           
           INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc 
           
           INNER JOIN funciones_docentes fd ON doc.id_funcion_predet = fd.id_funcion_docent
           
           INNER JOIN contact_basic cb ON doc.id_doc_docent = cb.id_doc
           
           INNER JOIN estado est ON doc.id_estado = est.id_estado
           
           INNER JOIN turnos tr ON doc.id_turno = tr.id_turno  
           
           INNER JOIN nacionalidad nc ON in_p.id_nacionalidad = nc.id_nacionalidad

            INNER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
            
            INNER JOIN est_civil esc ON in_p.id_estado_civil = esc.id_estado_civil
            ";
    
    return $sql;

}



function mostrar_docente_cedula($id_doc){
global $db;
     $sql = consulta_docentes()." WHERE doc.id_doc_docent = :id_doc;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();

    imprimir_docentes($result); 

    return $result;
}
//      

function imprimir_docentes($result){ 

echo "
        <div>
                <table class='tabla'>
                    <thead>
                        <tr>
                         <th>Cedula</th> 
                         <th>Nombre</th> 
                         <th>Apellidos</th> 
                         <th>Turno</th> 
                         <th>Funcion</th>
                         <th>Estado</th>
                         <th>Telefono Celular</th>
                         <th>Telefono Local</th>
                         <th>Correo</th>
                         <th>Fecha Ingreso</th>
                         <th></th>
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                  
                    echo "<tr><td>".$registro['id_doc']."</td> 
                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        
                        <td>".$registro['descripcion_turno']."</td>

                        <td>".$registro['funcion']."</td>

                        <td><center>".$registro['descripcion_estado']."</center>";

                        if ($registro['id_estado'] === '2') {
                                echo "<br><br> <center><b>Fecha Inabilitacion</b></center><br>
                                 ".$registro['fecha_inabilitacion']."<br>";
                        }

                        echo "</td>
                        
                        <td>".$registro['tlf_cel']."</td>

                        <td>".$registro['tlf_local']."</td>

                        <td>".$registro['correo']."</td>

                        <td>".$registro['fecha_ingreso']."</td>";



                        if(valid_inicio_sesion('2')) {

                        echo "
                    <td>
                    <form action='modif_docent.php' method='post'>
                        
                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='modificar'> Modificar</button>
                    </form>";

                        echo "

                        <form action='mas_info_docent.php' method='post'>
                        
                        <button type='submit' class='icon-list1' id='button-modi' value=".$registro['id_doc']." name ='mas_info_docent' >Mas Informacion</button>
                         
                         </form>";

                        }

                        echo"
                        <form action='clases_asignadas.php' method='post'>

                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='sus_clases' >Sus Clases</button>

                        </form>";
                        
                        if(valid_inicio_sesion('2')) {
                        echo "

                        <form action='eliminar_docent.php' method='post'>
                        
                        <button type='submit' icon='button-cancel' id='button-modi' value=".$registro['id_doc']." name ='eliminar_docent' >Eliminar</button>
                         
                         </form>"

                         ;
                     }
                    echo  "<br><br></td></tr>";
                 }
                         
   echo " </table>
            </div>";
            
 }



function mostrar_cedula_admin($id_doc){
global $db;
     $sql = consulta_admins()." WHERE adm.id_doc_admin = :id_doc;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();

    imprimir_admins($result); 

    return $result;
}


function imprimir_admins($result){ 

echo "
        <div>
                <table class='tabla'>
                    <thead>
                        <tr>
                         <th>Cedula</th> 
                         <th>Nombre</th> 
                         <th>Apellidos</th> 
                         <th>Turno</th> 
                         <th>Area</th>
                         <th>Estado</th>
                         <th>Telefono Celular</th>
                         <th>Telefono Local</th>
                         <th>Correo</th>
                         <th>Fecha Ingreso</th>
                         <th></th>
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                  
                    echo "<tr><td>".$registro['id_doc']."</td> 
                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        
                        <td>".$registro['turno']."</td>

                        <td>".$registro['area']."</td>

                        <td><center>".$registro['estado']."</center>";

                        if ($registro['id_estado'] === '2') {
                                echo "<br><br> <center><b>Fecha Inabilitacion</b></center><br>
                                 ".$registro['fecha_inabilitacion']."<br>";
                        }

                        echo "</td>
                        
                        <td>".$registro['tlf_cel']."</td>

                        <td>".$registro['tlf_local']."</td>

                        <td>".$registro['correo']."</td>
    
                        <td>".$registro['fecha_ingreso']."</td><td>";


                        if(valid_inicio_sesion('2')){
                        echo "
                        <form action='mas_info_admin.php' method='post'>
                        
                        <button type='submit' class='icon-list1' id='button-modi' value=".$registro['id_doc']." name ='mas_info_admin' >Mas Informacion</button>
                         
                         </form>";


                echo "
                    <form action='modif_admin.php' method='post'>
                        
                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='modificar'> Modificar</button>
                    </form>";

                  }
                        if(valid_inicio_sesion('1')) {
                        echo "

                        <form action='eliminar_admin.php' method='post'>
                        
                        <button type='submit' icon='button-cancel' id='button-modi' value=".$registro['id_doc']." name ='eliminar_admin' >Eliminar</button>
                         
                         </form>"

                         ;
                     }
                    echo  "<br><br></td></tr>";
                 }
                         
   echo " </table>
            </div>";
            
 }


function consulta_admins(){

    $sql="SELECT in_p.id_doc,
            in_p.nombre,
            in_p.apellido_p,
            in_p.apellido_m,
            tr.descripcion turno,
            ar.descripcion area,
            ar.id_area,
            est.descripcion estado,
            est.id_estado,
            cb.tlf_cel,
            cb.tlf_local,
            cb.correo,
            adm.fecha_ingreso,
            adm.fecha_inabilitacion,
            nc.id_nacionalidad,
            nc.descripcion nacionalidad,
            in_p.id_sexo,
            sx.descripcion sexo,
            adm.id_area,
            in_p.fecha_nac,
            in_p.lugar_nac,
            in_p.direcc_hab,
            in_p.id_estado_civil,
            esc.descrpcion est_civil,
            adm.id_turno
            
           FROM administrativos adm 
           
           LEFT OUTER JOIN info_personal in_p ON adm.id_doc_admin = in_p.id_doc 
           
           LEFT OUTER JOIN areas ar ON adm.id_area = ar.id_area
           
           LEFT OUTER JOIN contact_basic cb ON adm.id_doc_admin = cb.id_doc
           
           LEFT OUTER JOIN estado est ON adm.id_estado = est.id_estado
            
           LEFT OUTER JOIN turnos tr ON adm.id_turno = tr.id_turno  
           
           LEFT OUTER JOIN nacionalidad nc ON in_p.id_nacionalidad = nc.id_nacionalidad

            LEFT OUTER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
            
            LEFT OUTER JOIN est_civil esc ON in_p.id_estado_civil = esc.id_estado_civil ";
                
                return $sql;

}

function imprimir_msjs($errors){
    echo "<br>";
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<br><p>$msjs<p>";
        }
    }
}

function validar_datos_personales($nacionalidad,
    $id_doc,
    $sexo,
    $nombre1, 
    $nombre2, 
    $apellido_p,
    $apellido,
    $fecha_nac,     
    $lugar_nac,     
    $direcc_hab,   
    $tlf_cel,     
    $tlf_local,     
    $correo, 
    $estado_civil,
    $ocupacion,  
    $prof_ofi,
    $direcc_trab,
    $lug_trab,
    $tlf_ofic){

if(validar_datos_vacios_sin_espacios($nacionalidad,$estado_civil,$correo,$tlf_cel,$tlf_local,$fecha_nac) || validar_datos_vacios($nombre1,$apellido_p,$lugar_nac,$direcc_hab,$sexo)){
    $errors[]= "
    Se debe evitar campos vacios a exepcion del segundo nombre y apellido
    <br><br>
  Los siguientes campos no pueden poseer espacios:
      <br><br>
    Documento de Identidad
    <br><br>
    Fecha de Nacimiento
    <br><br>
    Numeros Telefonicos
    <br><br>
    Correos Electronicos
    ";


//var_dump($nacionalidad);
//var_dump($correo);
//var_dump($tlf_cel);
//var_dump($tlf_local);
//var_dump($fecha_nac);
//var_dump($nombre1);
//var_dump($apellido_p);
//var_dump($lugar_nac);
//var_dump($direcc_hab);
//var_dump($sexo);

    return $errors;

}else{

    $count=0;

if (!empty($prof_ofi)) {
    $count++;
}
if (!empty($direcc_trab)) {
    $count++;
}
if (!empty($lug_trab)) {
    $count++;
}
if (!empty($tlf_ofic)) {
    $count++;
}


if ($count > 0  && $count < 4) {
    $errors[] = "Si posee datos laborales, todos deben ser llenado";
}
    
if(!empty($id_doc)){

$errors[] = valid_ci($id_doc);

if(is_exist_ci($id_doc)) {
    $errors[]='La cedula ya esta registrada en el sistema';
        }

if (!is_valid_email($correo)) { $errors[]='El Correo electronico ingresado es invalido';}

if (!is_valid_num_tlf($tlf_local,$tlf_cel)) { $errors[]='El numero de telefono ingresado es invalido';}

if (!empty($tlf_ofic)) {
    if (!is_valid_num_tlf($tlf_ofic)) { $errors[]='Telefonos de oficina invalido';}
}


$errors[]= validar_fecha_registro($fecha_nac);

$err_nom_apell =validar_nombres_apellidos($nombre1,$apellido_p);


if(!empty($apellido_m)){
$err_nom_apell = validar_nombres_apellidos($apellido_m);
}

if(!empty($nombre2_m)){
$err_nom_apell=validar_nombres_apellidos($nombre2_m);
}

$errors[] = $err_nom_apell;


return $errors;
 
}

}
}

function is_exist_pers_emergencia(){

}

function regist_data_salud_student($ci_escolar,
             $est_croni, 
             $desc_croni, 
             $est_visual, 
             $desc_visual, 
             $est_auditivo, 
             $desc_auditivo, 
             $est_alergia, 
             $desc_alergia, 
             $est_condic_esp, 
             $desc_condic_esp,
             $est_vacuna,
             $desc_vacuna,
              $desc_psicopeda,
              $desc_psicolo,
             $desc_ter_lenguaje,
             $otras_condic,
             $desc_otras,
             $desc_medicacion,
             $est_medicacion,
             $anex_inform
         ){

    global $db;
            
            $sql = "INSERT INTO salud (ci_escolar, 
             est_croni, 
             desc_croni, 
             est_visual, 
             desc_visual, 
             est_auditivo, 
             desc_auditivo, 
             est_alergia, 
             desc_alergia, 
             est_condic_esp, 
             desc_condic_esp,
             est_vacuna,
             desc_vacuna,
               desc_psicopeda,
               desc_psicolo,
              desc_ter_lenguaje,
              otras_condic,
              desc_otras,
              desc_medicacion,
              est_medicacion,
              anex_inform) VALUES (:ci_escolar, 
             :est_croni, 
             :desc_croni, 
            :est_visual, 
            :desc_visual, 
            :est_auditivo, 
            :desc_auditivo, 
            :est_alergia, 
            :desc_alergia, 
            :est_condic_esp, 
            :desc_condic_esp,
            :est_vacuna,
            :desc_vacuna,
            :desc_psicopeda,
            :desc_psicolo,
            :desc_ter_lenguaje,
            :otras_condic,
            :desc_otras,
            :desc_medicacion,
            :est_medicacion,
            :anex_inform);";
            
                $result = $db->prepare($sql);

                $result->execute(array("est_croni"=>$est_croni,
                    "ci_escolar"=>$ci_escolar,
                "desc_croni"=>$desc_croni,
                "est_visual"=>$est_visual,
                "desc_visual"=>$desc_visual,
                "est_auditivo"=>$est_auditivo,
                "desc_auditivo"=>$desc_auditivo,
                "est_alergia"=>$est_alergia,
                "desc_alergia"=>$desc_alergia,
                "est_condic_esp" => $est_condic_esp,
                "desc_condic_esp" => $desc_condic_esp,
                "desc_vacuna"=>$desc_vacuna,
                "est_vacuna"=>$est_vacuna,
                "desc_psicopeda"=>$desc_psicopeda,
                "desc_psicolo"=>$desc_psicolo,
                "desc_ter_lenguaje"=>$desc_ter_lenguaje,
                "otras_condic"=>$otras_condic,
                "desc_otras"=>$desc_otras,
                "desc_medicacion"=>$desc_medicacion,
                "est_medicacion"=>$est_medicacion,
                "anex_inform"=>$anex_inform));

}

function regist_other_data_student($ci_escolar,$nro_pers_viven,$hermanos,$descrip_hermanos){

    global $db;
            
            $sql = "INSERT INTO `otros_datos_estudiant`(`ci_escolar`, `nro_pers_viven`, `hermanos`, `descrip_hermanos`) VALUES (:ci_escolar,:nro_pers_viven,:hermanos,:descrip_hermanos);";
            
                $result = $db->prepare($sql);

                $result->execute(array("nro_pers_viven"=>$nro_pers_viven,
                    "ci_escolar"=>$ci_escolar,"hermanos"=>$hermanos,"descrip_hermanos"=>$descrip_hermanos));
}

function register_movilidad_student($ci_escolar,$est_ret,$desc_ret,$est_tranport,$desc_tranport){

global $db;

$sql = 'INSERT INTO `movilidad`(`ci_escolar`, `est_ret`, `desc_ret`, `est_tranport`, `desc_tranport`) VALUES (:ci_escolar,:est_ret,:desc_ret,:est_tranport,:desc_tranport)';

                    $result = $db->prepare($sql);

    $result->execute(array("ci_escolar"=>$ci_escolar,"est_ret"=>$est_ret, "desc_ret"=>$desc_ret,"est_tranport"=>$est_tranport,"desc_tranport"=>$desc_tranport));

}

function valid_ci_scolar_xparte($ci_escol_nacidad,$ci_escol_id_opc,$ci_escol_nac_estd,$ci_escol_ci_mom){


if(validar_datos_vacios_sin_espacios($ci_escol_nacidad,$ci_escol_nac_estd,$ci_escol_ci_mom)){
    $errors[] = "Verifique si hay campos en blanco o espacios, solo el indicador opcional puede estar vacio en la cedula escolar";
}else{


    $ci_escolar = $ci_escol_nacidad."".$ci_escol_id_opc."".$ci_escol_nac_estd."".$ci_escol_ci_mom;

$errors = array();

if (is_exist_student($ci_escolar)) {
    $errors[] = "La cedula escolar ya existe"; 
}

        if(strcmp($ci_escol_nacidad,'V') != 0 || !strcmp($ci_escol_nacidad,'E') != 0 ){
    $errors[] = "Nacionalidad de la cedula escolar Invalida"; 
        }
    
if (!empty($ci_escol_id_opc)) {
     if(!preg_match_all("/^[0-9]{1,2}$/",$ci_escol_id_opc)){
    $errors[] = "Indice opcional de la cedula escolar Invalido"; 
    }
}

     if(!preg_match_all("/^[0-9]{3}$/",$ci_escol_nac_estd)){
    $errors[] = "Feha de nacimiento de la cedula escolar Invalido"; 
    }

    if (is_string(valid_ci($ci_escol_ci_mom))) {
         $errors[] = "Documento de identidad del padre para la cedula escolar Invalido";    
    }
}

return $errors;

}

    function registrar_inscrip_scolaridad($ci_escolar,$plantel_proced,$localidad,$anio_escolar1,$anio_escolar2,$grado,$calif_def,$repitiente,$observs,$id_actualizacion){


        global $db;

$sql = "INSERT INTO `escolaridad`(`ci_escolar`, `plantel_proced`, `localidad`, `anio_escolar1`, `anio_escolar2`, `grado`, `calif_def`, `repitiente`, `observs`,id_actualizacion) VALUES (:ci_escolar,:plantel_proced,:localidad,:anio_escolar1,:anio_escolar2,:grado,:calif_def,:repitiente,:observs,:id_actualizacion)";

                    $result = $db->prepare($sql);

    $result->execute(array("ci_escolar"=>$ci_escolar,"plantel_proced"=>$plantel_proced, "localidad"=>$localidad,"anio_escolar1"=>$anio_escolar1,"anio_escolar2"=>$anio_escolar2,"grado"=>$grado,"calif_def"=>$calif_def,"repitiente"=>$repitiente,"observs"=>$observs,'id_actualizacion'=>$id_actualizacion));

}

    
function registrar_actualizacion($ci_escolar,$id_doc_admin,$fecha){

        global $db;

$sql = "INSERT INTO `actualizacion`(`ci_escolar`, `id_doc_admin`, `fecha`) VALUES (:ci_escolar,:id_doc_admin,:fecha);";

                    $result = $db->prepare($sql);

    $result->execute(array("ci_escolar"=>$ci_escolar,"id_doc_admin"=>$id_doc_admin,"fecha"=>$fecha));

}

function consulta_estudiantes(){
return $sql = " SELECT estd.ci_escolar,estd.id_doc,estd.id_estado,estd.grado
,in_p.nombre,in_p.apellido_p,in_p.apellido_m,in_p.fecha_nac,in_p.lugar_nac,in_p.direcc_hab,in_p.id_nacionalidad,
in_p.id_estado_civil,in_p.id_sexo,
sx.descripcion sexo, nac.descripcion nacionalidad,
rcp.colecc_bicent, rcp.canaima, rcp.contrato
FROM estudiantes estd 
INNER JOIN info_personal in_p ON estd.ci_escolar = in_p.id_doc
INNER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
INNER JOIN nacionalidad nac ON in_p.id_nacionalidad = nac.id_nacionalidad
INNER JOIN recursos_public rcp ON rcp.ci_escolar = estd.ci_escolar";
}

function consulta_movilidad_student(){
return $sql = "
SELECT mv.ci_escolar, mv.est_ret, mv.desc_ret, mv.est_tranport, mv.desc_tranport FROM movilidad mv";}

function consulta_other_data_student(){
return $sql = "SELECT ode.ci_escolar,ode.nro_pers_viven,ode.hermanos,ode.descrip_hermanos FROM otros_datos_estudiant ode";
}

function consulta_salud_student(){
return $sql = " SELECT sd.ci_escolar, sd.est_croni, sd.desc_croni, sd.est_visual, sd.desc_visual, sd.est_auditivo, sd.desc_auditivo, sd.est_alergia, sd.desc_alergia, sd.est_condic_esp, sd.desc_condic_esp, sd.est_vacuna, sd.desc_vacuna, sd.desc_psicopeda, sd.desc_psicolo, sd.desc_ter_lenguaje, sd.otras_condic, sd.desc_otras, sd.desc_medicacion, sd.est_medicacion, sd.anex_inform FROM salud sd";
}

function consulta_actualizacion_student(){
return $sql = " SELECT act.ci_escolar, act.id_doc_admin, act.grado, act.fecha, act.id_actualizacion FROM actualizacion act";}

function consulta_escolaridad(){
return $sql = "
SELECT es.ci_escolar, es.plantel_proced, es.localidad, 
es.calif_def, es.repitiente, es.observs,es.grado grado_asign,
es.id_escolaridad,es.id_actualizacion,ac.fecha,ac.id_doc_admin,es.anio_escolar1,es.anio_escolar2,
in_p.nombre,in_p.apellido_p,in_p.apellido_m
FROM escolaridad es
LEFT JOIN actualizacion ac ON es.id_actualizacion = ac.id_actualizacion
LEFT JOIN info_personal in_p ON ac.id_doc_admin = in_p.id_doc"; 
}

function consulta_clases_student(){
return $sql = "
SELECT /*DISTINCT*/ act.id_doc_admin, edo.descripcion, clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2,act.fecha FROM estudiantes est 
LEFT OUTER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc 
LEFT OUTER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar 
INNER JOIN clases clas ON ea.id_clase = clas.id_clase 
INNER JOIN turnos tr ON tr.id_turno = clas.id_turno 
INNER JOIN estado edo ON ea.id_estado = edo.id_estado
LEFT OUTER JOIN actualizacion act ON ea.id_actualizacion = act.id_actualizacion
LEFT OUTER JOIN administrativos adm ON act.id_doc_admin = adm.id_doc_admin"; 
}

function consulta_padres_student(){
return $sql = "

SELECT in_p.id_doc ,in_p.nombre,in_p.apellido_p,in_p.apellido_m,in_p.fecha_nac,in_p.lugar_nac,in_p.direcc_hab,in_p.id_nacionalidad,
in_p.id_estado_civil,in_p.id_sexo,
sx.descripcion sexo, nac.descripcion nacionalidad, etc.descrpcion estado_civil,
prsd.convivencia,prsd.ocupacion,prsd.id_pers_est,
lb.prof_ofic,lb.lugar_trab,lb.direcc_trab,lb.tlf_ofic,
cb.tlf_local,cb.tlf_cel,cb.correo

FROM padres pds
LEFT OUTER JOIN info_personal in_p ON pds.id_doc = in_p.id_doc
LEFT OUTER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
LEFT OUTER JOIN nacionalidad nac ON in_p.id_nacionalidad = nac.id_nacionalidad
LEFT OUTER JOIN est_civil etc ON in_p.id_estado_civil = etc.id_estado_civil
LEFT OUTER JOIN pers_est prsd ON pds.id_doc = prsd.id_doc
LEFT OUTER JOIN contact_basic cb ON in_p.id_doc = cb.id_doc  
LEFT OUTER JOIN laboral lb ON in_p.id_doc = lb.id_doc


";
}

function consulta_represent_student(){
return $sql = "
SELECT in_p.id_doc ,in_p.nombre,in_p.apellido_p,in_p.apellido_m,in_p.fecha_nac,in_p.lugar_nac,in_p.direcc_hab,in_p.id_nacionalidad,
in_p.id_estado_civil,in_p.id_sexo,
sx.descripcion sexo, nac.descripcion nacionalidad, etc.descrpcion estado_civil,
prsd.convivencia,prsd.ocupacion,prsd.parentesco,prsd.id_pers_est,
lb.prof_ofic,lb.lugar_trab,lb.direcc_trab,lb.tlf_ofic,
cb.tlf_local,cb.tlf_cel,cb.correo
FROM representantes rpt
INNER JOIN info_personal in_p ON rpt.id_doc = in_p.id_doc
INNER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
INNER JOIN nacionalidad nac ON in_p.id_nacionalidad = nac.id_nacionalidad
INNER JOIN est_civil etc ON in_p.id_estado_civil = etc.id_estado_civil
INNER JOIN pers_est prsd ON rpt.id_doc = prsd.id_doc
LEFT OUTER JOIN laboral lb ON in_p.id_doc = lb.id_doc
INNER JOIN contact_basic cb ON in_p.id_doc = cb.id_doc";
}

function consulta_pers_ret_student(){
return $sql = "SELECT in_p.id_doc ,in_p.nombre,in_p.apellido_p,in_p.apellido_m,in_p.id_nacionalidad,
in_p.id_estado_civil,in_p.id_sexo,
sx.descripcion sexo, nac.descripcion nacionalidad, etc.descrpcion estado_civil,
prsd.convivencia,prsd.parentesco,prsd.id_pers_est,
cb.tlf_local,cb.tlf_cel,cb.tlf_emergecia
FROM pers_retirar prt
INNER JOIN info_personal in_p ON prt.id_doc = in_p.id_doc
INNER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
INNER JOIN nacionalidad nac ON in_p.id_nacionalidad = nac.id_nacionalidad
INNER JOIN est_civil etc ON in_p.id_estado_civil = etc.id_estado_civil
INNER JOIN pers_est prsd ON prt.id_doc = prsd.id_doc
INNER JOIN contact_basic cb ON in_p.id_doc = cb.id_doc";
}


function consulta_info_basic_student(){

    $sql="SELECT DISTINCT estd.ci_escolar,estd.id_doc,estd.id_estado,es.grado,edo.descripcion estado
,in_p.nombre,in_p.apellido_p,in_p.apellido_m,in_p.fecha_nac,in_p.lugar_nac,in_p.direcc_hab,in_p.id_nacionalidad,
in_p.id_estado_civil,in_p.id_sexo,
sx.descripcion sexo, nac.descripcion nacionalidad,
rcp.colecc_bicent, rcp.canaima, rcp.contrato
FROM estudiantes estd 
LEFT OUTER JOIN info_personal in_p ON estd.ci_escolar = in_p.id_doc
LEFT OUTER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
LEFT OUTER JOIN nacionalidad nac ON in_p.id_nacionalidad = nac.id_nacionalidad
LEFT OUTER JOIN estado edo ON estd.id_estado = edo.id_estado
LEFT OUTER JOIN recursos_public rcp ON rcp.ci_escolar = estd.ci_escolar
INNER JOIN escolaridad es ON estd.ci_escolar = es.ci_escolar ";
    
    return $sql;

}

function msj_bool($msj){

    if (empty($msj)) {
        return "No";
    }

    if ($msj) {
        return "Si";
    }
    if (!$msj) {
        return "No";
    }

}
function clases_student(){

    return $sql="
SELECT est.ci_escolar,clas.grado,clas.seccion,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2 FROM estudiantes est
            INNER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar
            INNER JOIN clases clas ON ea.id_clase = clas.id_clase
            INNER JOIN turnos tr ON tr.id_turno = clas.id_turno";}

function is_exist_represent($ci){
    global $db;

    $sql="SELECT * FROM representantes WHERE id_doc = :id";
                                    
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);

    $result->execute();

   $count=$result->rowCount();
    if($count == 0){ 
    return false;
    }else{
        return true;
    }
}


function actualizar_estudiante($ci_escolar,$ci_escolar_new,$id_doc,$id_estado){

    global $db;

    // Insertando datos personales genericos
    
$sql =disable_foreing()."UPDATE `estudiantes` SET `ci_escolar`=:ci_escolar_new,`id_doc`= :id_doc,`id_estado`=:id_estado WHERE 
 ci_escolar = :ci_escolar; ".enable_foreing();


$result=$db->prepare($sql);
                            
$result->execute(array("ci_escolar" => $ci_escolar,"ci_escolar_new" => $ci_escolar_new,"id_doc"=>$id_doc,"id_estado"=>$id_estado));


}


function update_other_data_student($ci_escolar,$ci_escolar_new,$nro_pers_viven,$hermanos,$descrip_hermanos){

    global $db;
            
            $sql = disable_foreing()." UPDATE `otros_datos_estudiant` SET /*`ci_escolar`= :ci_escolar_new,*/`nro_pers_viven`=:nro_pers_viven,hermanos=:hermanos,`descrip_hermanos`=:descrip_hermanos WHERE  ci_escolar = :ci_escolar; ".enable_foreing();
            
                $result = $db->prepare($sql);

                $result->execute(array("nro_pers_viven"=>$nro_pers_viven,
                    "ci_escolar"=>$ci_escolar,/*"ci_escolar_new"=>$ci_escolar_new,*/"hermanos"=>$hermanos,"descrip_hermanos"=>$descrip_hermanos));
}


function update_person_estudiantes($id_doc,$id_doc_new,$ci_escolar,$ci_escolar_new,$convivencia,$ocupacion,$parentesco){
    
    global $db;


$sql = disable_foreing()." UPDATE `pers_est` SET `ci_escolar`=:ci_escolar_new,`id_doc`=:id_doc_new,`convivencia`=:convivencia,`ocupacion`=:ocupacion,`parentesco`=:parentesco WHERE ci_escolar = :ci_escolar AND id_doc = :id_doc; ".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_doc_new"=>$id_doc_new,"ci_escolar"=>$ci_escolar,"ci_escolar_new"=>$ci_escolar_new,"convivencia"=>$convivencia,"ocupacion"=>$ocupacion,"parentesco"=>$parentesco));

}


function update_person_padres($id_doc_new,$id_doc,$ci_escolar,$ci_escolar_new){

global $db;

$sql = disable_foreing()."UPDATE `padres` SET `id_doc`=:id_doc_new,`ci_escolar`=:ci_escolar_new WHERE ci_escolar = :ci_escolar AND id_doc = :id_doc;".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"ci_escolar"=>$ci_escolar,"id_doc_new"=>$id_doc_new,"ci_escolar_new"=>$ci_escolar_new));

}

function update_datos_laborales($id_doc,$id_doc_new,$prof_ofic,$lugar_trab,$direcc_trab,$tlf_ofic){
    
    global $db;

$sql = "UPDATE `laboral` SET `id_doc`=:id_doc_new,`prof_ofic`=:prof_ofic,`lugar_trab`=:lugar_trab,`direcc_trab`=:direcc_trab,`tlf_ofic`= :tlf_ofic WHERE id_doc = :id_doc;";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"id_doc_new"=>$id_doc_new,"prof_ofic"=>$prof_ofic,"lugar_trab"=>$lugar_trab,"direcc_trab"=>$direcc_trab,"tlf_ofic"=>$tlf_ofic));
}

function update_person_represent($id_doc_new,$id_doc,$ci_escolar,$ci_escolar_new){
    
    global $db;
$sql = disable_foreing()."UPDATE `representantes` SET `id_doc`=:id_doc_new,`ci_escolar`=:ci_escolar_new WHERE ci_escolar = :ci_escolar AND id_doc = :id_doc;".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"ci_escolar"=>$ci_escolar,"id_doc_new"=>$id_doc_new,"ci_escolar_new"=>$ci_escolar_new));



}


function update_data_salud_student($ci_escolar,$ci_escolar_new,
             $est_croni, 
             $desc_croni, 
             $est_visual, 
             $desc_visual, 
             $est_auditivo, 
             $desc_auditivo, 
             $est_alergia, 
             $desc_alergia, 
             $est_condic_esp, 
             $desc_condic_esp,
             $est_vacuna,
             $desc_vacuna,
              $desc_psicopeda,
              $desc_psicolo,
             $desc_ter_lenguaje,
             $otras_condic,
             $desc_otras,
             $desc_medicacion,
             $est_medicacion,
             $anex_inform
         ){

    global $db;
            
            $sql = disable_foreing()." UPDATE salud SET 
            ci_escolar= :ci_escolar_new, 
             est_croni=:est_croni, 
             desc_croni=:desc_croni, 
            est_visual=:est_visual, 
            desc_visual = :desc_visual, 
            est_auditivo=:est_auditivo, 
            desc_auditivo=:desc_auditivo, 
            est_alergia=:est_alergia, 
            desc_alergia=:desc_alergia, 
            est_condic_esp=:est_condic_esp, 
            desc_condic_esp=:desc_condic_esp,
            est_vacuna=:est_vacuna,
            desc_vacuna=:desc_vacuna,
            desc_psicopeda=:desc_psicopeda,
            desc_psicolo=:desc_psicolo,
            desc_ter_lenguaje=:desc_ter_lenguaje,
            otras_condic=:otras_condic,
            desc_otras=:desc_otras,
            desc_medicacion=:desc_medicacion,
            est_medicacion=:est_medicacion,
            anex_inform=:anex_inform WHERE ci_escolar = :ci_escolar; ".enable_foreing();


                $result = $db->prepare($sql);

                $result->execute(array("est_croni"=>$est_croni,
                    "ci_escolar"=>$ci_escolar,
                    "ci_escolar_new"=>$ci_escolar_new,
                "desc_croni"=>$desc_croni,
                "est_visual"=>$est_visual,
                "desc_visual"=>$desc_visual,
                "est_auditivo"=>$est_auditivo,
                "desc_auditivo"=>$desc_auditivo,
                "est_alergia"=>$est_alergia,
                "desc_alergia"=>$desc_alergia,
                "est_condic_esp" => $est_condic_esp,
                "desc_condic_esp" => $desc_condic_esp,
                "desc_vacuna"=>$desc_vacuna,
                "est_vacuna"=>$est_vacuna,
                "desc_psicopeda"=>$desc_psicopeda,
                "desc_psicolo"=>$desc_psicolo,
                "desc_ter_lenguaje"=>$desc_ter_lenguaje,
                "otras_condic"=>$otras_condic,
                "desc_otras"=>$desc_otras,
                "desc_medicacion"=>$desc_medicacion,
                "est_medicacion"=>$est_medicacion,
                "anex_inform"=>$anex_inform));

}


function update_movilidad_student($ci_escolar,$ci_escolar_new,$est_ret,$desc_ret,$est_tranport,$desc_tranport){

global $db;

$sql = disable_foreing().' UPDATE `movilidad` SET ci_escolar=:ci_escolar_new,est_ret=:est_ret,desc_ret=:desc_ret,est_tranport =:est_tranport, desc_tranport=:desc_tranport WHERE ci_escolar = :ci_escolar; '.enable_foreing();

                    $result = $db->prepare($sql);

    $result->execute(array("ci_escolar"=>$ci_escolar,"ci_escolar_new"=>$ci_escolar_new,"est_ret"=>$est_ret, "desc_ret"=>$desc_ret,"est_tranport"=>$est_tranport,"desc_tranport"=>$desc_tranport));

}

function update_person_retirar($id_doc_new,$id_doc,$ci_escolar,$ci_escolar_new){
    
    global $db;

    $sql = disable_foreing()."UPDATE `pers_retirar` SET `id_doc`=:id_doc_new,`ci_escolar`=:ci_escolar_new WHERE ci_escolar = :ci_escolar AND id_doc = :id_doc;".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"ci_escolar"=>$ci_escolar,"id_doc_new"=>$id_doc_new,"ci_escolar_new"=>$ci_escolar_new));

}


?>
