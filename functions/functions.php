<<<<<<< HEAD
<?php 

// Validaciones

// Comprobar Variable definida o vacia o con espacios
function validar_datos_vacios_sin_espacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || preg_match('/\s/',$dato)){
            $comprobador = true;
        }
}
return $comprobador;
}

function validar_datos_vacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || is_null($dato)){
            $comprobador = true;
        }
}
return $comprobador;
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

function regist_usr($ci,$pass_hash,$tip_usr,$db){

            $sql = "INSERT INTO usuarios(id_doc,pass,id_tip_usr) 
            VALUES (:id, :pass, :tip_usr)";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"pass"=>$pass_hash,
                "tip_usr"=>$tip_usr));
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

function imprimir_usuario($ci){
    global $db;
    $sql="SELECT usr.id_doc, t_usr.descripcion, adm.cargo, info_p.nombre, info_p.apellido_p, info_p.apellido_m FROM usuarios usr 
    INNER JOIN tip_user t_usr ON usr.id_tip_usr = t_usr.id_tip_usr
    INNER JOIN administrativos adm ON usr.id_doc = adm.id_doc_admin 
    INNER JOIN info_personal info_p ON usr.id_doc = info_p.id_doc
    WHERE usr.id_doc = :id ";
                             
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
    <td>".$registro['descripcion']."</td>
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
    return "SET FOREIGN_KEY_CHECKS=0;";
}

function enable_foreing(){
    return "SET FOREIGN_KEY_CHECKS=1;";
}

function registrar_docentes($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$tipo_docent,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$id_estado){

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

$sql =disable_foreing()."INSERT INTO docentes(id_doc_docent,id_tipo_docent,id_turno,id_estado) VALUES (:id_doc_docent,:id_tipo_docent,:id_turno,:id_estado);".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_docent"=>$id_doc,"id_tipo_docent"=>$tipo_docent,"id_turno"=>$turno,"id_estado"=>$id_estado));

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


function exist_clase($id_clase){
    global $db;
    
        $sql="SELECT id_clase FROM clases WHERE id_clase = :id";
                                        
        $result=$db->prepare($sql);
                                
        $result->bindValue(":id",$id_clase);
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
   $sql="SELECT d.id_doc_docent,c_a.id_clase,c.id_turno FROM docentes d INNER JOIN clases_asignadas c_a ON d.id_doc_docent = c_a.id_doc_docent INNER JOIN clases c ON c_a.id_clase = c.id_clase WHERE d.id_doc_docent = :id_doc AND c.id_turno = :id_turno ";

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



 
 function asignar_docente_clase($id_clase,$id_contrato_clase,$grado,$seccion,$id_doc_docent,$id_tipo_docent,$id_estado,$nro_contrato){

    global $db;

$sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_contrato_clase`, `id_estado`, `id_clase`, `id_doc_docent`, `id_tipo_docent`, `nro_contrato`) VALUES (:id_contrato_clase,:id_estado,:id_clase,:id_doc_docent,:id_tipo_docent,:nro_contrato); ".enable_foreing();
            
 $result = $db->prepare($sql);
            
 $result->execute(array("id_contrato_clase"=>$id_contrato_clase,"id_estado"=>$id_estado,"id_clase"=>$id_clase,"id_doc_docent"=>$id_doc_docent,"id_tipo_docent"=>$id_tipo_docent,"nro_contrato"=>$nro_contrato));

}


function generador_id_contrato_clase($id_clase,$id_doc_docent,$tipo_docent,$nro_contrato=1){

$id_contrato_clase=$id_clase.'-'.$id_doc_docent.'-'.$tipo_docent.'-'.$nro_contrato;
return $id_contrato_clase;
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


=======
<?php 

// Validaciones

// Comprobar Variable definida o vacia o con espacios
function validar_datos_vacios_sin_espacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || preg_match('/\s/',$dato)){
            $comprobador = true;
        }
}
return $comprobador;
}

function validar_datos_vacios(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || is_null($dato)){
            $comprobador = true;
        }
}
return $comprobador;
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

function regist_usr($ci,$pass_hash,$tip_usr,$db){

            $sql = "INSERT INTO usuarios(id_doc,pass,id_tip_usr) 
            VALUES (:id, :pass, :tip_usr)";
            
                $result = $db->prepare($sql);
            
                $result->execute(array("id"=>$ci,"pass"=>$pass_hash,
                "tip_usr"=>$tip_usr));
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

function imprimir_usuario($ci){
    global $db;
    $sql="SELECT usr.id_doc, t_usr.descripcion, adm.cargo, info_p.nombre, info_p.apellido_p, info_p.apellido_m FROM usuarios usr 
    INNER JOIN tip_user t_usr ON usr.id_tip_usr = t_usr.id_tip_usr
    INNER JOIN administrativos adm ON usr.id_doc = adm.id_doc_admin 
    INNER JOIN info_personal info_p ON usr.id_doc = info_p.id_doc
    WHERE usr.id_doc = :id ";
                             
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
    <td>".$registro['descripcion']."</td>
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
    return "SET FOREIGN_KEY_CHECKS=0;";
}

function enable_foreing(){
    return "SET FOREIGN_KEY_CHECKS=1;";
}

function registrar_docentes($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$tipo_docent,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$id_estado){

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

$sql =disable_foreing()."INSERT INTO docentes(id_doc_docent,id_tipo_docent,id_turno,id_estado) VALUES (:id_doc_docent,:id_tipo_docent,:id_turno,:id_estado);".enable_foreing();

$result=$db->prepare($sql);

$result->execute(array("id_doc_docent"=>$id_doc,"id_tipo_docent"=>$tipo_docent,"id_turno"=>$turno,"id_estado"=>$id_estado));

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

var_dump($sql);

$result=$db->prepare($sql);

$result->execute($parameters);
        
    }


function exist_clase($id_clase){
    global $db;
    
        $sql="SELECT id_clase FROM clases WHERE id_clase = :id";
                                        
        $result=$db->prepare($sql);
                                
        $result->bindValue(":id",$id_clase);
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
   $sql="SELECT d.id_doc_docent,c_a.id_clase,c.id_turno FROM docentes d INNER JOIN clases_asignadas c_a ON d.id_doc_docent = c_a.id_doc_docent INNER JOIN clases c ON c_a.id_clase = c.id_clase WHERE d.id_doc_docent = :id_doc AND c.id_turno = :id_turno ";

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



 
 function asignar_docente_clase($id_clase,$id_contrato_clase,$grado,$seccion,$id_doc_docent,$id_tipo_docent,$id_estado,$nro_contrato){

    global $db;

$sql = disable_foreing()." INSERT INTO `clases_asignadas`(`id_contrato_clase`, `id_estado`, `id_clase`, `id_doc_docent`, `id_tipo_docent`, `nro_contrato`) VALUES (:id_contrato_clase,:id_estado,:id_clase,:id_doc_docent,:id_tipo_docent,:nro_contrato); ".enable_foreing();
            
 $result = $db->prepare($sql);
            
 $result->execute(array("id_contrato_clase"=>$id_contrato_clase,"id_estado"=>$id_estado,"id_clase"=>$id_clase,"id_doc_docent"=>$id_doc_docent,"id_tipo_docent"=>$id_tipo_docent,"nro_contrato"=>$nro_contrato));

}


function generador_id_contrato_clase($id_clase,$id_doc_docent,$tipo_docent,$nro_contrato=1){

$id_contrato_clase=$id_clase.'-'.$id_doc_docent.'-'.$tipo_docent.'-'.$nro_contrato;
return $id_contrato_clase;
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
   var_dump($count);
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
   var_dump($count);
    if($count > 0){ 
        return true;
    }else{
         return false;

    }
}

function register_user($ci,$pass,$pass_confirm){

    $tip_usr=0;    

    //Validacion de datos vacios y espacios
        if(validar_datos_vacios_sin_espacios($ci,$pass,$pass_confirm)){
            $errors_total[] = "Debe llenar todos los campos y evitar los espacios";    
    }else{
        if(!valid_user($ci)){
            $errors_total[] = "El usuario ya existe<p></p>Si desea puede registrarse"; 
        }else{
        if(is_string(valid_ci_admin($ci)) || is_string(valid_ci($ci)) || is_array(valid_pass($pass)) || is_string(valid_pass_par($pass,$pass_c))){
            
            $errors_total = construc_msj(valid_ci_admin($ci),valid_ci($ci),valid_pass_par($pass,$pass_confirm),valid_pass($pass));

                return $errors_total;
                
                        }else{
                        $pass_hash = hash_pass($pass);
                        regist_usr($ci,$pass_hash,$tip_usr,$db);
                        session_start();
                        $_SESSION['id_user'] = $ci;
                        $_SESSION['nivel_usuario'] = obtener_nivel_permiso($ci);
                        header("Location: ../public/dashboard.php");   
                    }
            }
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
            return   $errors[] = ingreso_user($ci,$pass);
        }else{

            ingreso_user($ci,$pass);
            session_start(); 
            $_SESSION['id_user'] = $ci;
            $_SESSION['nivel_usuario'] = obtener_nivel_permiso($ci);
            header("Location:../public/dashboard.php");
            }
        }

        }

>>>>>>> test
?>