<?php
require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['modificar'])) {
    $id_doc=$_POST['modificar'];
}
if (!empty($_POST['modif_docent'])) {

    $nacionalidad = htmlentities(addslashes($_POST["nacionalidad"]));
    $id_doc = htmlentities(addslashes($_POST["id_doc"]));
    $nombres = htmlentities(addslashes($_POST["nombre"]));
    $apellido_p = htmlentities(addslashes($_POST["apellido_p"]));
    $apellido_m = htmlentities(addslashes($_POST["apellido_m"]));
    $sexo = htmlentities(addslashes($_POST["sexo"]));    
    $tipo_docent = htmlentities(addslashes($_POST["tipo_docent"]));    
    $fecha_nac = htmlentities(addslashes($_POST["fecha_nac"]));    
     $fecha_ingreso = htmlentities(addslashes($_POST["fecha_ingreso"]));    
    $lugar_nac = htmlentities(addslashes($_POST["lugar_nac"]));    
    $direcc_hab = htmlentities(addslashes($_POST["direcc_hab"]));    
    $tlf_cel = htmlentities(addslashes($_POST["tlf_cel"]));    
    $tlf_local = htmlentities(addslashes($_POST["tlf_local"]));    
    $correo = htmlentities(addslashes($_POST["correo"])); 
    $estado_civil = htmlentities(addslashes($_POST["estado_civil"])); 
    $turno = htmlentities(addslashes($_POST["turno"])); 

    
if(validar_datos_vacios_sin_espacios($nacionalidad, $id_doc,$sexo,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,$fecha_ingreso) || validar_datos_vacios($nombres,$tipo_docent,$apellido_p,$apellido_m,$lugar_nac,$direcc_hab,$turno)){
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

$errors[]= validar_fecha_registro($fecha_ingreso);

$errors[]=validar_nombres_apellidos($nombres,$apellido_p,$apellido_m);

if (!is_valid_email($correo)) { $errors[]='El Correo electronico ingresado es invalido';}

if (!is_valid_num_tlf($tlf_local,$tlf_cel)) { $errors[]='El numero de telefono ingresado es invalido';}


if (!comprobar_msjs_array($errors)) {    
    echo "correct";

$lugar_nac=trim($lugar_nac);
$direcc_hab=trim($direcc_hab);
 
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

$nombres=filtrar_nombres_apellidos($nombres);

$apellido_p=filtrar_nombres_apellidos($apellido_p);

$apellido_m=filtrar_nombres_apellidos($apellido_m);

 registrar_docentes($nacionalidad ,$id_doc,$nombres,$apellido_p,$apellido_m,$sexo,$tipo_docent,$fecha_nac,$lugar_nac,$direcc_hab,$tlf_cel,$tlf_local,$correo,$estado_civil,$turno,'1',$fecha_ingreso,'0000-00-00');

 header("Location:docentes.php");

}

}
}
?>

    <title>Registro de Docentes</title>


<?php require '../../includes/header.php' ?>


    <h2>Modificacion de Docentes</h2>
    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
        <br>
<?php

    $sql="SELECT in_p.id_doc,
            in_p.nombre,
            in_p.apellido_p,
            in_p.apellido_m,
            tr.descripcion descripcion_turno,
            tp.descripcion descripcion_tip_docent,
            est.descripcion descripcion_estado,
            cb.tlf_cel,
            cb.tlf_local,
            cb.correo,
            doc.fecha_ingreso,
            doc.fecha_inabilitacion,
            nc.id_nacionalidad,
            nc.descripcion nacionalidad,
            in_p.id_sexo,
            sx.descripcion sexo,
            doc.id_tipo_docent,
            in_p.fecha_nac,
            in_p.lugar_nac,
            in_p.direcc_hab,
            in_p.id_estado_civil,
            esc.descrpcion est_civil,
            doc.id_turno
            
           FROM docentes doc 
           
           INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc 
           
           INNER JOIN tipos_docentes tp ON doc.id_tipo_docent = tp.id_tipo_docent
           
           INNER JOIN contact_basic cb ON doc.id_doc_docent = cb.id_doc
           
           INNER JOIN estado est ON doc.id_estado = est.id_estado
           
           INNER JOIN turnos tr ON doc.id_turno = tr.id_turno  
           
           INNER JOIN nacionalidad nc ON doc.id_nacionalidad = nc.id_nacionalidad

            INNER JOIN sexo sx ON in_p.id_sexo = sx.id_sexo
            
            INNER JOIN est_civil esc ON in_p.id_estado_civil = esc.id_estado_civil
            
           WHERE doc.id_doc_docent = '28117200';";
    
    $result=$db->prepare($sql);
    //$result->bindValue(":id_doc",$id_doc);
    $result->execute();


while($registro=$result->fetch(PDO::FETCH_ASSOC)){

 
?>
        Documento de Identidad
        <select name='nacionalidad' id='' autocomplete='on'>
            <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?>
             value='1'>V</option>

            <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected';?> value='2'>E</option>
        </select>


         <input type='number' name='id_doc' id='' value='<?php echo $registro['id_doc']; ?>'>

        <br>
        Nombres:
        <input type='text' name='nombre' id='' value='<?php echo $registro['nombre']; ?>' >
        
         <br>
        Apellido Paterno:
        <input type='text' name='apellido_p' id='' value='<?php echo $registro['apellido_p']; ?>'>
        

        <br>
        Apellido Materno:
        <input type='text' name='apellido_m' id='' value='<?php echo $registro['apellido_m']; ?>'>
       
        <br>
        Sexo:
        <select name='sexo' id=''>
            <option <?php if($registro['id_sexo'] == '1') echo 'selected';?> value='1'>Masculino</option>

            <option <?php if($registro['id_sexo'] == '2') echo 'selected';?> value='2'>Femenino</option>
        </select>

        <br>
        Tipo de Docente: 
        <select name='tipo_docent' id=''>
            <option <?php if($registro['id_tipo_docent'] == '1') echo 'selected';?> value='1'>En aula</option>

            <option <?php if($registro['id_tipo_docent'] == '2') echo 'selected';?> value='2'>Educuacion Fisica</option>

            <option <?php if($registro['id_tipo_docent'] == '3') echo 'selected';?> value='3'>Arte y Cultura</option>
        </select>
        <br>

        Fecha de Nacimiento:
        <input type='date' name='fecha_nac' id='' value='<?php echo $registro['fecha_nac']; ?>'>

        <br>
        Fecha de Ingreso:
        <input type='date' name='fecha_ingreso' id='' value='<?php echo $registro['fecha_ingreso']; ?>'>

        <br>
        Lugar de Nacimiento:
        <input type='text' name='lugar_nac' id='' value='<?php echo $registro['lugar_nac']; ?>'>
        
        <br>
        Direccion de Habitacion:
        <input type='text' name='direcc_hab' id='' value='<?php echo $registro['direcc_hab'] ?>'>

        <br>
        Telefono Celular:
        <input type='number' name='tlf_cel' id='' value='<?php echo $registro['tlf_cel'] ?>'>

        <br>
        Telefono Local:
        <input type='number' name='tlf_local' id='' value='<?php echo $registro['tlf_local'] ?>'>
        <br>
        Correo:
        <input type='email' name='correo' id='' value='<?php echo $registro['correo']; ?>'>
        
        <br>
        Estado Civil:
        <select name='estado_civil' id=''>
            <option <?php if($registro['id_estado_civil'] == '1') echo 'selected';?> value='1'>Soltero/a</option>

            <option <?php if($registro['id_estado_civil'] == '2') echo 'selected';?> value='2'>Casado/a</option>

            <option <?php if($registro['id_estado_civil'] == '3') echo 'selected';?> value='3'>Divorciado/a</option>

            <option <?php if($registro['id_estado_civil'] == '4') echo 'selected';?> value='4'>Viudo/a</option>
        </select>
        
        <br>
        Turno:
        <select name='turno' id=''>
            <option value='1'>Mañana</option>
            <option value='2'>Tarde</option>
        </select> 
        <br>

        <input type='submit' value='modif_docent' name='modif_docent'>
    </form>
    <?php } ?>

    <br>
    <a href='docentes.php'>volver</a>
    <br>
    <br>

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo '<p>$msjs<p>';
        }
    }

    ?>

<?php 

require'../../includes/footer.php';

 ?>