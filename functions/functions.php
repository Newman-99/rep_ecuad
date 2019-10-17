<?php 

// Validaciones

// Comprobar Variable definida o vacia o con espacios
function valid_dat(...$datos){
    $comprobador = false;
    
    foreach ($datos as $dato) {
        if(empty($dato) || preg_match('/\s/',$dato)){
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

    $sql="SELECT * FROM docente WHERE id_doc_docent = :id";
                                    
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


function validar_exist_profesor($ci){
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
    
?>