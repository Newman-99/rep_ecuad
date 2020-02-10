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

function calcula_edad($fecha_nacimiento){
  list($ano,$mes,$dia) = explode("-",$fecha_nacimiento);
  $ano_diferencia  = date("Y") - $ano;
  $mes_diferencia = date("m") - $mes;
  $dia_diferencia   = date("d") - $dia;
  if ($dia_diferencia < 0 || $mes_diferencia < 0)
    $ano_diferencia--;
  return $ano_diferencia;
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

function obtener_cedula_student($ci_escolar){

global $db;

$sql="SELECT id_doc FROM estudiantes WHERE ci_escolar = :ci_escolar;";
                                
$result=$db->prepare($sql);
                        
$result->bindValue(":ci_escolar",$ci_escolar);

$result->execute();

return $ci_student=$result->fetchColumn();

}

// Para mostrar los Datos Basicos y de Bienvenida al usuario al hacer login

function imprimir_usuario_bienvenida($ci){
    global $db;
       $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,ar.descripcion area,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN areas ar ON a.id_area = ar.id_area INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr

    WHERE s.id_doc = :id ";
                             
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);
    
    $result->execute();
    
        echo "<p><table border='1' style='  height: 100px;
  position: relative;
  left: 20%;
'>";
  
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
                        
    <button type='submit' style='' id=registrer class='icon-add' value=".$registro['id_doc']." name ='modif_pass' >Seguridad</button>
    
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

function tipo_student_x_clase($id_clase,$id_estado){
    global $db;

    $sql="SELECT est.id_estado FROM clases cl 
    INNER JOIN estudiantes_asignados esa ON cl.id_clase = esa.id_clase
    INNER JOIN estudiantes est ON esa.ci_escolar = est.ci_escolar WHERE est.id_estado = :id_estado AND esa.id_clase = :id_clase";
                                    
    $result=$db->prepare($sql);
                            
    $result->execute(array(":id_estado"=>$id_estado,":id_clase"=>$id_clase));
    
   $count=$result->rowCount();

   return $count;
   
}

function tipo_student_x_contrato_clas($id_clase,$id_estado){
    global $db;

    $sql="SELECT est.id_estado FROM clases cl 
    INNER JOIN estudiantes_asignados esa ON cl.id_clase = esa.id_clase
    INNER JOIN estudiantes est ON esa.ci_escolar = est.ci_escolar WHERE esa.id_estado = :id_estado AND cl.id_clase = :id_clase";
                                    
    $result=$db->prepare($sql);
                            
    $result->execute(array(":id_estado"=>$id_estado,":id_clase"=>$id_clase));
    
   $count=$result->rowCount();

   return $count;
   
}

function tipos_student_consultas($id_clase = '',$id_estado,$anio_escolar1='',$anio_escolar2=''){
    global $db;

    $sql="SELECT DISTINCT(est.ci_escolar),esc.anio_escolar1,esc.anio_escolar2,esc.grado,esc.id_escolaridad,act.id_actualizacion FROM escolaridad esc 
    INNER JOIN estudiantes est ON esc.ci_escolar = est.ci_escolar
    INNER JOIN actualizacion act ON esc.ci_escolar = act.ci_escolar";
                                    
   
    $where = [];

  $campos = [];



  if (!empty($id_estado)) {
    array_push($where, 'est.id_estado = :id_estado');
    $campos[':id_estado'] = [
      'valor' => $id_estado,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


  if (!empty($anio_escolar1)) {

    array_push($where, 'esc.anio_escolar1 = :anio_escolar1');
    $campos[':anio_escolar1'] = [
      'valor' => $anio_escolar1,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($anio_escolar2)) {

    array_push($where, 'esc.anio_escolar2 = :anio_escolar2');
    $campos[':anio_escolar2'] = [
      'valor' => $anio_escolar2,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }


$sql .= ' GROUP BY est.ci_escolar ORDER BY act.id_actualizacion DESC ';


  $result = $db->prepare($sql);

  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }

  $result->execute();

   $count=$result->rowCount();

   return $count;
}


function tipo_sexo_student_x_clase($id_clase,$id_sexo){
    global $db;
    $sql=" SELECT in_p.id_sexo FROM clases cl
    INNER JOIN estudiantes_asignados esa ON cl.id_clase = esa.id_clase
    INNER JOIN estudiantes est ON esa.ci_escolar = est.ci_escolar 
    INNER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc
 
    WHERE in_p.id_sexo = :id_sexo AND esa.id_clase = :id_clase;";
                                    
    $result=$db->prepare($sql);
                            
    $result->execute(array(":id_sexo"=>$id_sexo,":id_clase"=>$id_clase));

   $count=$result->rowCount();

   return $count;
   }


function tipo_sexo_student_general($id_sexo,$anio_escolar1 = '',$anio_escolar2 =''){
    global $db;
    $sql=" SELECT DISTINCT(est.ci_escolar), in_p.id_sexo FROM estudiantes est 
    INNER JOIN info_personal in_p ON est.ci_escolar = in_p.id_doc
    INNER JOIN escolaridad esc ON est.ci_escolar = esc.ci_escolar";
                                    
 
     $where = [];

  $campos = [];

  if (!empty($anio_escolar1)) {

    array_push($where, 'esc.anio_escolar1 = :anio_escolar1');
    $campos[':anio_escolar1'] = [
      'valor' => $anio_escolar1,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($anio_escolar2)) {

    array_push($where, 'esc.anio_escolar2 = :anio_escolar2');
    $campos[':anio_escolar2'] = [
      'valor' => $anio_escolar2,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


  if (!empty($id_sexo)) {

    array_push($where, 'in_p.id_sexo = :id_sexo');
    $campos[':id_sexo'] = [
      'valor' => $id_sexo,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }


  $result = $db->prepare($sql);

  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }

  $result->execute();

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

    $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,ar.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN areas ar ON a.id_area = ar.id_area INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr
 WHERE s.id_doc = :id ORDER BY s.ult_sesion DESC";
    
    $result=$db->prepare($sql);

     $result->bindValue(":id",$id);

    imprimir_usuarios($result);                                    

}

function mostrar_users_todos(){
    global $db;
            $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,ar.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN areas ar ON a.id_area = ar.id_area INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr";
            return $sql;
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
                        

                            <button type='submit'  value=".$id_usr." name='modificar' class='icon-cancel' id='button-modi' >Modificar</button>

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

                        <td>".$registro['fecha_ingreso']."</td><td>
";



                        if(valid_inicio_sesion('2')) {

                        echo "
                    <form action='modif_docent.php' method='post'>
                        
                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='modificar'> Modificar</button>
                    </form>
                    <br><br>
                    ";

                        echo "

                        <form action='mas_info_docent.php' method='post'>
                        
                        <button type='submit' class='icon-list1' id='button-modi' value=".$registro['id_doc']." name ='mas_info_docent' >Mas Informacion</button>
                         
                         </form>
                        <br><br> 
                         ";

                        }

                        echo"
                        <form action='clases_asignadas.php' method='post'>

                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='sus_clases' >Sus Clases</button>

                        </form><br><br>";
                        
                        if(valid_inicio_sesion('2')) {
                        echo "

                        <form action='eliminar_docent.php' method='post'>
                        
                        <button type='submit' icon='button-cancel' id='button-modi' value=".$registro['id_doc']." name ='eliminar_docent' >Eliminar</button>
                         
                         </form> <br><br>"

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
                         
                         </form> <br><br>";


                echo "
                    <form action='modif_admin.php' method='post'>
                        
                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='modificar'> Modificar</button>
                    </form> <br><br>";

                  }
                        if(valid_inicio_sesion('1')) {
                        echo "

                        <form action='eliminar_admin.php' method='post'>
                        
                        <button type='submit' icon='button-cancel' id='button-modi' value=".$registro['id_doc']." name ='eliminar_admin' >Eliminar</button>
                         
                         </form> <br><br>"

                         ;
                     }
                    echo  "</td></tr>";
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

function imprimir_msjs_no_style($errors){
    echo "<br>";

    if(!empty($errors)){
                    echo "<div style='margin-left:auto; margin-right:auto;'><br>";
        foreach ($errors as $msjs) {
echo "<p>".$msjs."</p>";
        }
        echo "</div>";
    }
}

function imprimir_msjs($errors){
    echo "<br>";

    if(!empty($errors)){
            echo "<div   style='background-color:#B7BBCE; border: gray 1px solid;position:absolute;
    bottom:5px;
    right:10px;'><br>";

        foreach ($errors as $msjs) {
echo "<p>".$msjs."</p>";
        }
        echo "</div>";
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

    $sql="SELECT DISTINCT estd.ci_escolar,estd.id_doc,estd.id_estado,es.grado,edo.descripcion estado ,in_p.nombre,in_p.apellido_p,in_p.apellido_m,in_p.fecha_nac,in_p.lugar_nac,in_p.direcc_hab,in_p.id_nacionalidad, in_p.id_estado_civil,in_p.id_sexo, sx.descripcion sexo, nac.descripcion nacionalidad, rcp.colecc_bicent,es.id_escolaridad,es.id_actualizacion, rcp.canaima, rcp.contrato FROM estudiantes estd 
    LEFT OUTER JOIN info_personal in_p ON estd.ci_escolar = in_p.id_doc 
    LEFT OUTER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo 
    LEFT OUTER JOIN nacionalidad nac ON in_p.id_nacionalidad = nac.id_nacionalidad 
    LEFT OUTER JOIN estado edo ON estd.id_estado = edo.id_estado 
    LEFT OUTER JOIN recursos_public rcp ON rcp.ci_escolar = estd.ci_escolar 
    LEFT OUTER JOIN escolaridad es ON estd.ci_escolar";
    
    return $sql;

}

function msj_bool($msj){

    if (empty($msj)) {
        return "No";
$indic_opc = $ci_scol;
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
SELECT est.ci_escolar,clas.grado,clas.seccion,clas.id_turno,tr.descripcion turno,clas.anio_escolar1,clas.anio_escolar2 FROM estudiantes est
            INNER JOIN estudiantes_asignados ea ON est.ci_escolar = ea.ci_escolar
            INNER JOIN clases clas ON ea.id_clase = clas.id_clase
            INNER JOIN turnos tr ON tr.id_turno = clas.id_turno";}

function is_exist_represent($ci_represent,$ci_escolar =''){
    global $db;

    $busc_represent_student = '';

    if (!empty($ci_escolar)) {
       
        $busc_represent_student = 'AND ci_escolar = :ci_escolar';

    }


    $sql="SELECT * FROM representantes WHERE id_doc = :ci_represent ".$busc_represent_student;                  

    $result=$db->prepare($sql);
                            
    $result->bindValue(":ci_represent",$ci_represent);
 
    if (!empty($ci_escolar)) {

    $result->bindValue(":ci_escolar",$ci_escolar);
}
    $result->execute();

   $count=$result->rowCount();
    if($count == 0){ 
    return false;
    }else{
        return true;
    }
}



function is_exist_padre($ci_padre,$ci_escolar ='',$id_tipo_padre = ''){
    global $db;

    $where = [];

  $campos = [];



      if (!empty($ci_padre)) {
    array_push($where, 'id_doc = :ci_padre');
    $campos[':ci_padre'] = [
      'valor' => $ci_padre,
      'tipo' => \PDO::PARAM_STR,
    ];
  }


      if (!empty($ci_escolar)) {
    array_push($where, 'ci_escolar = :ci_escolar');
    $campos[':ci_escolar'] = [
      'valor' => $ci_escolar,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

      if (!empty($id_tipo_padre)) {
    array_push($where, 'id_tip_padre = :id_tipo_padre');
    $campos[':id_tipo_padre'] = [
      'valor' => $id_tipo_padre,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

 $sql="SELECT * FROM padres";   
 
  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }

    $result=$db->prepare($sql);


  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }
  
    $result->execute();

   $count=$result->rowCount();
    if($count == 0){ 
    return false;
    }else{
        return true;
    }
}

function obtener_id_padres($ci_escolar ='',$id_tipo_padre = ''){
    global $db;

    $where = [];

  $campos = [];




      if (!empty($ci_escolar)) {
    array_push($where, 'ci_escolar = :ci_escolar');
    $campos[':ci_escolar'] = [
      'valor' => $ci_escolar,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

      if (!empty($id_tipo_padre)) {
    array_push($where, 'id_tip_padre = :id_tipo_padre');
    $campos[':id_tipo_padre'] = [
      'valor' => $id_tipo_padre,
      'tipo' => \PDO::PARAM_STR,
    ];
  }

 $sql="SELECT * FROM padres";   
 
  if (!empty($where)) {
    $sql .= ' WHERE ' . implode(' AND ', $where);
  }

    $result=$db->prepare($sql);


  foreach($campos as $clave => $valores) {
    $result->bindParam($clave, $valores['valor'], $valores['tipo']);
  }
  
    $result->execute();

   $id=$result->fetchColumn();

   return $id;
}
function is_exist_pers_estd($ci_represent,$ci_escolar =''){

    global $db;

    $busc_represent_student = '';

    if (!empty($ci_escolar)) {
       
        $busc_represent_student = 'AND ci_escolar = :ci_escolar';

    }


    $sql="SELECT * FROM pers_est WHERE id_doc = :ci_represent ".$busc_represent_student;                  

    $result=$db->prepare($sql);
                            
    $result->bindValue(":ci_represent",$ci_represent);
 
    if (!empty($ci_escolar)) {

    $result->bindValue(":ci_escolar",$ci_escolar);
}
    $result->execute();

   $count=$result->rowCount();
   echo $count;
    if($count == 0){ 
    return false;
    }else{
        return true;
    }
}


function update_basic_data_student($ci_escolar,$ci_escolar_new,$id_doc,$id_estado){

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

function form_represent_full($result){

 while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 
 $nombres_compilacion = explode(" ", $registro['nombre']);

    ?>

      <br><br><br><br>    
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Representante</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_r" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_p']; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_r" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_m']; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_r" id="" placeholder="Nombre" class="form-control"  value="<?php echo $nombres_compilacion[0]; ?>">
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_r" id="" placeholder="Nombre" class="form-control" value="<?php for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';} ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-3 my-3">
                                            <label></label>
                                        <select name="nacionalidad_r" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <label>Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_r" value="<?php echo $registro['id_doc']; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <p for="" class="">Sexo:</p>

                                            <label for="" class="">Masculino:</label>
                                            <input type="radio" <?php if($registro['id_sexo'] == '1') echo "checked";?> name="sexo_r" value="1" id="" >

                                            <label for="sexo_r" class="">Femenino:</label>

                                            <input type="radio" name="sexo_r" <?php if($registro['id_sexo'] == '2') echo "checked";?> value="2" id="" >
                                        </div>                                        
                                    </div> 
                                
                                    <div class="row my-4"> 
                                        <div class="col-lg-6 ">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_r" id="" placeholder="Ocupacion" class="form-control" value="<?php echo $registro['ocupacion'];?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_r" id="" placeholder="Fecha" class="form-control" value="<?php echo $registro['fecha_nac']; ?>">
                                        </div>
    

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_r" id="cedula" class="form-control"  >
                                                <option value=""> Seleccione </option>
                                                <option <?php if($registro['id_estado_civil'] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if($registro['id_estado_civil'] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if($registro['id_estado_civil'] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if($registro['id_estado_civil'] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>
                                    </div>
    
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_r" id="" ><?php echo $registro['lugar_nac'];?></textarea>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_r"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php echo $registro['direcc_hab'];?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_r" id="" placeholder="Telefono local" class="form-control" value="<?php echo $registro['tlf_local']; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_r" id="" placeholder="Telefono celular" class="form-control" value="<?php echo $registro['tlf_cel']; ?>" >    
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_r" id="" placeholder="Correo electronico" class="form-control" value="<?php echo $registro['correo']; ?>">
                                        </div>
                                        
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6 my-4">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_r" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php echo $registro['prof_ofic']; ?>">
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_r"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php echo $registro['lugar_trab'];?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_r"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php  echo $registro['direcc_trab'];?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_r" id="" placeholder="Telefono de oficina" class="form-control" value="<?php echo $registro['tlf_ofic'];?>">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 my-2">
                                            <label>Parentesco:</label>
                                            <input type="text" name="parentesco_r" id="" placeholder="Parentesco" class="form-control" value="<?php  echo $registro['parentesco'];?>">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label>Vive con el estudiante:</label>
                                            <input type="checkbox" <?php if($registro['convivencia']) echo "checked";?> name="convivencia_r" value="1" id="">
                                        </div>
                                    </div>
                <br><br>                    

<?php } 
}?>

<?php 
    
    function form_padres_full($result,$ci_escolar){


    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
     

  ?>
    <!--formularios-->
            <div class="container">
<?php $nombres_compilacion = explode(" ", $registro['nombre']);?>

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>

                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Padre
                                            </h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_p" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_p']; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_p" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_m']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_p" id="" placeholder="Nombre" class="form-control"  value="<?php echo $nombres_compilacion[0]; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_p" id="" placeholder="Nombre" class="form-control" value="<?php for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';
                                } ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_p" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <?php $id_doc_p = $registro['id_doc']; ?>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_p" value="<?php echo $registro['id_doc']; ?>" >     
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_p" id="" placeholder="Ocupacion" class="form-control" value="<?php echo $registro['ocupacion']; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_p" id="" placeholder="Fecha" class="form-control" value="<?php echo $registro['fecha_nac']; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_p" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_p" id=""  ><?php if(isset($registro['lugar_nac'])) echo $registro['lugar_nac'];?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_p"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($registro['direcc_hab'])) echo $registro['direcc_hab'];?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_p" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($registro['tlf_local'])) echo $registro['tlf_local']; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_p" id="" placeholder="Telefono celular" class="form-control" value="<?php echo $registro['tlf_cel']; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_p" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($registro['correo'])) echo $registro['correo']; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_p" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php  echo $registro['prof_ofic']; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_p"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php echo $registro['lugar_trab'];?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_p"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php echo $registro['direcc_trab']?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_p" id="" placeholder="Telefono de oficina" class="form-control" value="<?php echo $registro['tlf_ofic'];?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(is_exist_represent($id_doc_p,$ci_escolar)) echo "checked";?> name="is_represent_p" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_p" class="">Si</label>

                                        <input type="radio" <?php if($registro['convivencia'] == '1') echo "checked";?> name="convivencia_p" value="1" id="">

                                        <label for="convivencia_p" class="">No</label>
    
                                        <input type="radio" name="convivencia_p" <?php if($registro['convivencia']  == '0') echo "checked";?> value="0" id="">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                    
                                    </div>
                                        <?php 

                                    }
                                        return $id_doc_p;

}?>


<?php 

    function form_madres_full($result,$ci_escolar){


    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
     

  ?>
    <!--formularios-->
            <div class="container">
<?php $nombres_compilacion = explode(" ", $registro['nombre']);?>

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>
                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos de la Madre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_p']; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_m" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_m']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_m" id="" placeholder="Nombre" class="form-control"  value="<?php echo $nombres_compilacion[0]; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_m" id="" placeholder="Nombre" class="form-control" value="<?php for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';
                                } ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_m" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_m" value="<?php $id_doc_m = $registro['id_doc']; echo $registro['id_doc']; ?>" >     
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_m" id="" placeholder="Ocupacion" class="form-control" value="<?php echo $registro['ocupacion']; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_m" id="" placeholder="Fecha" class="form-control" value="<?php echo $registro['fecha_nac']; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_m" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_m" id=""  ><?php if(isset($registro['lugar_nac'])) echo $registro['lugar_nac'];?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_m"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($registro['direcc_hab'])) echo $registro['direcc_hab'];?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_m" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($registro['tlf_local'])) echo $registro['tlf_local']; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_m" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($registro['tlf_cel'])) echo $registro['tlf_cel_m']; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_m" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($registro['correo'])) echo $registro['correo']; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_m" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($registro['prof_ofi'])) echo $registro['prof_ofi']; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_m"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php echo $registro['lugar_trab'];?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_m"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php echo $registro['direcc_trab']?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_m" id="" placeholder="Telefono de oficina" class="form-control" value="<?php echo $registro['tlf_ofic'];?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(is_exist_represent($id_doc_m,$ci_escolar)) echo "checked";?> name="is_represent_m" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_m" class="">Si</label>

                                        <input type="radio" <?php if($registro['convivencia']) echo "checked";?> name="convivencia_m" value="1" id="">

                                        <label for="convivencia_m" class="">No</label>

                                        <input type="radio" name="convivencia_m" <?php if($registro['convivencia'] == '0') echo "checked";?> value="0" id="">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                    
                                    </div>
                                        <?php return $id_doc_m;}                                                                                
}
?>

<?php 
  function form_madres_empty($POST = ''){
if (!empty($POST)) {
extract($POST);
}
?>
               <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos de la Madre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_m)) echo $apellido_p_m; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_m)) echo $apellido_m_m; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_m" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_m)) echo $nombre1_m; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_m" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_m)) echo $nombre2_m; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_m" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_m)) if($nacionalidad_m == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_m)) if($nacionalidad_m == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_m_new" value="<?php if(isset($id_doc_m_new)) echo $id_doc_m_new; ?>" >     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_m" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_m)) echo $ocupacion_m; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_m" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_m)) echo $fecha_nac_m; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_m" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_m" id=""  ><?php if(isset($lugar_nac_m)) echo $lugar_nac_m;?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_m"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($direcc_hab_m)) echo $direcc_hab_m;?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_m" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_m)) echo $tlf_local_m; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_m" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_m)) echo $tlf_cel_m; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_m" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_m)) echo $correo_m; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_m" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_m)) echo $prof_ofi_m; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_m"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_m)) echo $lug_trab_m;?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_m"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_m)) echo $direcc_trab_m;?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_m" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_m)) echo $tlf_ofic_m;?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(isset($_POST["is_represent_m"])){ if($_POST["is_represent_m"] == '1') echo "checked";}else{if(isset($is_represent_m)){ if($is_represent_m == '1') echo "checked";}}?> name="is_represent_m" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_m" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_m"])){ if($_POST["convivencia_m"] == '1') echo "checked";}else{if(isset($convivencia_m)){ if($convivencia_m == '1') echo "checked";}}
                                        ?> name="convivencia_m" value="1" id="">

                                        <label for="convivencia_m" class="">No</label>

                                        <input type="radio" name="convivencia_m" <?php if(isset($_POST["convivencia_m"])){ if($_POST["convivencia_m"] == '0') echo "checked";}else{if(isset($convivencia_m)){ if($convivencia_m == '0') echo "checked";}}
                                        ?> value="2" id="">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label>Seleccione si no se registrara:</label>
                                        <input type="checkbox" <?php if(isset($_POST["no_register_m"])){ if($_POST["no_register_m"] == '1') echo "checked";}else{if(isset($no_register_m)){ if($no_register_m == '1') echo "checked";}}?> name="no_register_m" value="1" id="">
                                        </div>
                                    

                                        <div class="col-lg-6 ">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_m"])){ if($_POST["si_exist_m"] == '1') echo "checked";}else{if(isset($si_exist_m)){ if($si_exist_m == '1') echo "checked";}}?> name="si_exist_m" value="1" id="">
                                        </div>
                                    </div>
                                        <?php } ?>
                             

<?php function form_padre_empty($POST = ''){
if (!empty($POST)) {
extract($POST);
}
 ?>
<!------------------------------- TERCER FORMULARIO [ DATOS DEL PADRE ] ------------------------------------------------>

                                     <br><br><br><br>
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Padre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_p)) echo $apellido_p_p; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_p)) echo $apellido_m_p; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_p" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_p)) echo $nombre1_p; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_p" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_p)) echo $nombre2_p; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-2 my-3">
                                            <label></label>
                                            <select name="nacionalidad_p" id="cedula" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($nacionalidad_p)) if($nacionalidad_p == '1') echo 'selected';?> value="1">V</option>
                                                <option <?php if(isset($nacionalidad_p)) if($nacionalidad_p == '2') echo 'selected';?> value="2">E</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 my-2">
                                            <label class="form-inline">Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_p" value="<?php if(isset($id_doc_p)) echo $id_doc_p; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_p" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_p)) echo $ocupacion_p;?>">
                                        </div>
                                    </div> 
                                

                                    <div class="row my-4">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_p" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_p)) echo $fecha_nac_p; ?>">
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_p" id="cedula" class="form-control "  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                         <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_p" id="" ><?php if(isset($lugar_nac_p)) echo $lugar_nac_p;?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_p"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php if(isset($direcc_hab_p)) echo $direcc_hab_p;?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_p" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_p)) echo $tlf_local_p; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_p" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_p)) echo $tlf_cel_p; ?>" >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_p" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_p)) echo $correo_p; ?>">
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_p" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_p)) echo $prof_ofi_p; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_p"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_p)) echo $lug_trab_p;?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_p"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_p)) echo $direcc_trab_p;?></textarea>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_p" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_p)) echo $tlf_ofic_p;?>">
                                        </div>
                                                 

                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                            <input type="checkbox" <?php if(isset($_POST["is_represent_p"])){ if($_POST["is_represent_p"] == '1') echo "checked";}else{if(isset($is_represent_p)){ if($is_represent_p == '1') echo "checked";}}?> name="is_represent_p" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_p" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_p"])){ if($_POST["convivencia_p"] == '1') echo "checked";}else{if(isset($convivencia_p)){ if($convivencia_p == '1') echo "checked";}}
                                        ?> name="convivencia_p" value="1" id="">

                                        <label for="convivencia_p" class="">No</label>

                                        <input type="radio" name="convivencia_p" <?php if(isset($_POST["convivencia_p"])){ if($_POST["convivencia_p"] == '0') echo "checked";}else{if(isset($convivencia_p)){ if($convivencia_p == '0') echo "checked";}}
                                        ?> value="0" id="">
                                        </div>
                                    </div>

                                    <div class="row col-12">
                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si no se registrara:</label>
                                            <input type="checkbox" <?php if(isset($_POST["no_register_p"])){ if($_POST["no_register_p"] == '1') echo "checked";}else{if(isset($no_register_p)){ if($no_register_p == '1') echo "checked";}}?> name="no_register_p" value="1" id="">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_p"])){ if($_POST["si_exist_p"] == '1') echo "checked";}else{if(isset($si_exist_p)){ if($si_exist_p == '1') echo "checked";}}?> name="si_exist_p" value="1" id="">
                                        </div>
                                    </div>

            <?php 
     }
?>

<?php 
  function form_represent_empty($POST = ''){
if (!empty($POST)) {
extract($POST);
}
 ?>


    <br><br><br><br>    
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Representante</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_r" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_r)) echo $apellido_p_r; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_r" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_r)) echo $apellido_m_r; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_r" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_r)) echo $nombre1_r; ?>">
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_r" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre1_r)) echo $nombre1_r; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-3 my-3">
                                            <label></label>
                                        <select name="nacionalidad_r" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_r)) if($nacionalidad_r == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_r)) if($nacionalidad_r == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <label>Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_r_new" value="<?php if(isset($id_doc_r_new)) echo $id_doc_r_new; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <p for="" class="">Sexo:</p>

                                            <label for="" class="">Masculino:</label>
                                            <input type="radio" <?php if(isset($_POST["sexo_r"])){ if($_POST["sexo_r"] == '1') echo "checked";}else{if(isset($sexo_r)){ if($sexo_r == '1') echo "checked";}};
                                            ?> name="sexo_r" value="1" id="" >

                                            <label for="sexo_r" class="">Femenino:</label>

                                            <input type="radio" name="sexo_r" <?php if(isset($_POST["sexo_r"])){ if($_POST["sexo_r"] == '2') echo "checked";}else{if(isset($sexo_r)){ if($sexo_r == '2') echo "checked";}}
                                            ?> value="2" id="" >
                                        </div>                                        
                                    </div> 
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_r" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_r)) echo $ocupacion_r;?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_r" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_r)) echo $fecha_nac_r; ?>">
                                        </div>
    

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_r" id="cedula" class="form-control"  >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>
                                    </div>
    
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_r" id="" ><?php if(isset($lugar_nac_r)) echo $lugar_nac_r;?></textarea>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_r"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php if(isset($direcc_hab_r)) echo $direcc_hab_r;?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_r" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_r)) echo $tlf_local_r; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_r" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_r)) echo $tlf_cel_r; ?>" >    
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_r" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_r)) echo $correo_r; ?>">
                                        </div>
                                        
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6 my-4">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_r" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_r)) echo $prof_ofi_r; ?>">
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_r"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_r)) echo $lug_trab_r;?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_r"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_r)) echo $direcc_trab_r;?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_r" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_r)) echo $tlf_ofic_r;?>">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 my-2">
                                            <label>Parentesco:</label>
                                            <input type="text" name="parentesco_r" id="" placeholder="Parentesco" class="form-control" value="<?php if(isset($parentesco_r)) echo $parentesco_r;?>">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label>Vive con el estudiante:</label>
                                            <input type="checkbox" <?php if(isset($_POST["convivencia_r"])){ if($_POST["convivencia_r"] == '1') echo "checked";}else{if(isset($convivencia_r)){ if($convivencia_r == '1') echo "checked";}}?> name="convivencia_r" value="1" id="">
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-lg-12 my-2">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_r"])){ if($_POST["si_exist_r"] == '1') echo "checked";}else{if(isset($si_exist_r)){ if($si_exist_r == '1') echo "checked";}}?> name="si_exist_r" value="1" id="">
                                        </div>
                                    </div>

            <?php 
     }



function sepadador_ci_escolar($id){ 

// Separar Cedula

    if (preg_match('/V|E/',$id,$coincidencias,PREG_OFFSET_CAPTURE)) {
               $resultado = $coincidencias[0];
        $nacionalidad = $resultado[0];
    } 

if (preg_match('/[0-9]{3}/',$id,$coincidencias,PREG_OFFSET_CAPTURE)) {
        $resultado = $coincidencias[0];
        $anio_nac = $resultado[0];
    }

  $id_madre=obtener_id_padres($id,'1');
  $id_padre=obtener_id_padres($id,'2');

//var_dump($id_padre);
$busc_padres='/'.$id_padre."|".$id_madre.'/';

if (preg_match($busc_padres,$id,$coincidencias,PREG_OFFSET_CAPTURE)) {
        $resultado = $coincidencias[0];
        $id_padre_ci_escol = $resultado[0];
    }


$ci_scol = preg_replace ( '/'.$nacionalidad.'/','', $id );

$ci_scol = preg_replace ( '/'.$id_padre_ci_escol.'/','', $ci_scol );

$ci_scol = preg_replace ( '/'.$anio_nac.'/','', $ci_scol);

$indic_opc = '';

if(preg_match('/[1-9]{1}/',$ci_scol)) {
$indic_opc = $ci_scol;
}


return $ci_escolar = array('nacionalidad' => $nacionalidad,'id_padre_ci_escol' => $id_padre_ci_escol,'anio_nac'=>$anio_nac,'indic_opc'=>$indic_opc);

}

function is_ci_escolar_id($id){
        if (preg_match('/V|E/',$id)) {
        return true;
        } 
        return false;
}

?>
