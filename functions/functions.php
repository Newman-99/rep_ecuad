<?php 

// Validaciones

// Comprobar Variable definida o vacia o con espacios
function validar_datos_vacios_sin_espacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || preg_match('/\s/',$dato) || comprobar_var_total_espace($dato)){
            $comprobador = true;
        }
}
return $comprobador;
}

function validar_datos_vacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || is_null($dato) || comprobar_var_total_espace($dato)){
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
       if(preg_match("/\W|\d/",$nom_apell)){
        
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
            $sql = "INSERT INTO `preguntas_usuarios`(`id_usr`, `id_pregunta`, `respuesta`) VALUES (:id,'1',:respuesta1);";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"respuesta1"=>$respuesta1));
//////////
            $sql = "INSERT INTO `preguntas_usuarios`(`id_usr`, `id_pregunta`, `respuesta`) VALUES (:id,'2',:respuesta2);";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"respuesta2"=>$respuesta1));
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

// Para mostrar los Datos Basicos y de Bienvenida al usuario al hacer login

function imprimir_usuario_bienvenida($ci){
    global $db;
       $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,c.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN cargos c ON a.id_cargo = c.id_cargo INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr

    WHERE s.id_doc = :id ";
                             
    $result=$db->prepare($sql);
                            
    $result->bindValue(":id",$ci);
    
    $result->execute();
    
        echo "<p><table border='1'><caption>Sus Datos: </caption>";
  
        echo "<tr>
    <th>Cedula</th>
     <th>Nombre</th>
    <th>Apellidos</th>
    <th>Cargo</th>
    <th>Nivel de Usuario</th>
    </tr>";

  while($registro=$result->fetch(PDO::FETCH_ASSOC)){
  echo "
  <tr>
    <td>".$registro['id_doc']."</td>
    <td>".$registro['nombre']."</td>
    <td>".$registro['apellido_p']." ".$registro['apellido_m']."</td>
    <td>".$registro['cargo']."</td>
    <td>".$registro['nivel']."</td>
    </tr>";

echo "</table></p>";
    }
        
    }



function validar_exist_docente($ci){
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

function registrar_docentes($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$funcion_docent,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion){

    global $db;

    // Insertando datos personales genericos
    
$sql = "INSERT INTO info_personal(id_doc, nombre, apellido_p, apellido_m, fecha_nac, lugar_nac,direcc_hab, id_nacionalidad, id_estado_civil, id_sexo) VALUES (:id_doc,:nombre,:apellido_p,:apellido_m,:fecha_nac,:lugar_nac,:direcc_hab,:id_nacionalidad,:id_estado_civil,:id_sexo)";

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"nombre"=>$nombres,
"apellido_p"=>$apellido_p,"apellido_m"=>$apellido_m,"fecha_nac"=>$fecha_nac,"lugar_nac"=>$lugar_nac,"direcc_hab"=>$direcc_hab,"id_nacionalidad"=>$nacionalidad,"id_estado_civil"=>$estado_civil,"id_sexo"=>$sexo));

// Insertando datos de contacto

$sql = disable_foreing()."INSERT INTO contact_basic (id_doc,tlf_local,tlf_cel, correo)
VALUES (:id_doc,:tlf_local,:tlf_cel,:correo);".enable_foreing();

$result=$db->prepare($sql);
                            
$result->execute(array("id_doc"=>$id_doc,"tlf_local"=>$tlf_local,
"tlf_cel"=>$tlf_cel,"correo"=>$correo));

// Insertando datos de la persona como docente

$sql =disable_foreing()."INSERT INTO docentes(id_doc_docent,id_funcion_predet,id_turno,id_estado,fecha_ingreso,fecha_inabilitacion) VALUES (:id_doc_docent,:id_funcion_predet,:id_turno,:id_estado,:fecha_ingreso,:fecha_inabilitacion);".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_docent"=>$id_doc,"id_funcion_predet"=>$funcion_docent,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

}

function actualizar_docentes($nacionalidad ,$id_doc,$id_doc_new,$nombres,$apellido_p,$apellido_m,$sexo,$id_funcion_predet,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$id_estado,$fecha_ingreso,$fecha_inabilitacion){

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

$sql =disable_foreing()."UPDATE docentes SET id_doc_docent = :id_doc_new,id_funcion_predet = :id_funcion_predet,id_turno = :id_turno,id_estado = :id_estado,fecha_ingreso = :fecha_ingreso,fecha_inabilitacion = :fecha_inabilitacion where id_doc_docent = :id_doc_docent; ".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_docent"=>$id_doc,"id_doc_new"=>$id_doc_new,"id_funcion_predet"=>$id_funcion_predet,"id_turno"=>$turno,"id_estado"=>$id_estado,"fecha_ingreso"=>$fecha_ingreso,"fecha_inabilitacion"=>$fecha_inabilitacion));

}


function eliminar_docente($id_doc){

global $db;

$sql = disable_foreing()."DELETE FROM `info_personal` WHERE id_doc = :id_doc; ".enable_foreing();

$result=$db->prepare($sql);
                            
  $result->bindValue(":id_doc",$id_doc);

 $result->execute();


$sql = disable_foreing()." DELETE FROM contact_basic WHERE id_doc = :id_doc; " .enable_foreing();

$result=$db->prepare($sql);
                            
 $result->bindValue(":id_doc",$id_doc);

 $result->execute();


$sql =disable_foreing()." DELETE FROM docentes WHERE id_doc_docent = :id_doc; ".enable_foreing();

$result=$db->prepare($sql);

 $result->bindValue(":id_doc",$id_doc);

 $result->execute();


}


function cantidad_estudent($id_clase,$id_estado){
    global $db;

    $sql="SELECT cl.id_clase,esa.ci_escolar FROM clases cl INNER JOIN estudiantes_asignados esa ON cl.id_clase = esa.id_clase WHERE esa.id_estado = :id_estado AND cl.id_clase = :id_clase";
                                    
    $result=$db->prepare($sql);
                            
    $result->execute(array(":id_estado"=>$id_estado,":id_clase"=>$id_clase));
    
   $count=$result->rowCount();

   return $count;
   
}


function validar_exist_estudiante($ci){
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




function is_exist_contrato_clase($id_clase,$id_doc_docent,$id_tipo_docent){

      global $db;
      
    $sql="SELECT * FROM `clases_asignadas` WHERE id_doc_docent = :id_doc_docent AND id_tipo_docent = :id_tipo_docent AND id_clase = :id_clase;";

    $result=$db->prepare($sql);

      $result->execute(array("id_doc_docent"=>$id_doc_docent,":id_tipo_docent"=>$id_tipo_docent,"id_clase"=>$id_clase));

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

function register_user($ci,$pass,$pass_confirm,$respuesta1,$respuesta2){

    global $db;

    $tip_usr=0;    

    //Validacion de datos vacios y espacios
        if(validar_datos_vacios_sin_espacios($ci,$pass,$pass_confirm) || validar_datos_vacios($respuesta2,$respuesta2) ){
            $errors_total[] = "Debe llenar todos los campos, evitando espacios en la cedula y contraseña";    
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

    $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,c.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN cargos c ON a.id_cargo = c.id_cargo INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr WHERE s.id_doc = :id";
    
    $result=$db->prepare($sql);

     $result->bindValue(":id",$id);

    imprimir_usuarios($result);                                    

}

function mostrar_users_todos(){
    global $db;
            $sql="SELECT s.id_doc,i.nombre,i.apellido_p,i.apellido_m,c.descripcion cargo,s.ult_sesion, tu.descripcion nivel FROM usuarios s INNER JOIN info_personal i ON s.id_doc = i.id_doc INNER JOIN administrativos a ON a.id_doc_admin = s.id_doc INNER JOIN cargos c ON a.id_cargo = c.id_cargo INNER JOIN tip_user tu ON s.id_tip_usr = tu.id_tip_usr ORDER BY s.ult_sesion DESC";

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

function mostrar_docentes(){

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

function mostrar_docente_tipos($id_tipo_docent){
global $db;
     $sql = mostrar_docentes()." WHERE id_funcion_predet = :id_funcion_predet;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":id_funcion_predet",$id_tipo_docent);
    $result->execute();

    imprimir_docentes($result); 

    return $result;
}

function mostrar_docente_estado($id_estado){
global $db;
     $sql = mostrar_docentes()." WHERE est.id_estado = :id_estado;";

    $result=$db->prepare($sql);
    
    $result->bindValue("id_estado",$id_estado);
    $result->execute();

    imprimir_docentes($result); 

    return $result;
}


function mostrar_docente_turno($id_turno){
global $db;
     $sql = mostrar_docentes()." WHERE     tr.id_turno = :id_turno;";

    $result=$db->prepare($sql);
    
    $result->bindValue("id_turno",$id_turno);
    $result->execute();

    imprimir_docentes($result); 

    return $result;
}


function mostrar_docente_todos(){
global $db;
     $sql = mostrar_docentes();

    $result=$db->prepare($sql);
    
    $result->execute();

    imprimir_docentes($result); 

    return $result;
}

function mostrar_docente_cedula($id_doc){
global $db;
     $sql = mostrar_docentes()." WHERE doc.id_doc_docent = :id_doc;";

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
                         <th>Funcion Predeterminada</th>
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


        echo "
                <td>
                    <form action='modif_docent.php' method='post'>
                        
                        <button type='submit' id='button-modi' value=".$registro['id_doc']." name ='modificar'> Modificar</button>
                    </form>";

                        if(valid_inicio_sesion('2')) {
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
                         
                         <form>"

                         ;
                     }
                    echo  "<br><br></td></tr>";
                 }
                         
   echo " </table>
            </div>";
            
 }



?>

