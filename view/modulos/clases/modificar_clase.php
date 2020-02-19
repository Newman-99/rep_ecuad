<?php
require '../../includes/init_system.php'; 

require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['modif_clas'])) {
    $_SESSION['id_clase']=$_POST['modif_clas'];

}

if (!empty($_POST['save_docent'])) {
    
    $id_new_clase = $_POST['save_docent'];

    $id_clase = $_SESSION['id_clase'];

    $grado = htmlentities(addslashes($_POST["grado"]));

    $seccion = htmlentities(addslashes($_POST["seccion"]));

    $turno = htmlentities(addslashes($_POST["turno"]));
    
    $no_aula = htmlentities(addslashes($_POST["no_aula"]));
    
    $anio_escolar1 = htmlentities(addslashes($_POST["año_escolar1"]));

    $anio_escolar2 = htmlentities(addslashes($_POST["año_escolar2"]));
    

if(validar_datos_vacios_sin_espacios($grado,$turno,$no_aula,$anio_escolar1,$anio_escolar2,$seccion/*$id_doc_docent_normal,$id_doc_educ_fisica,$id_doc_docent_arte_cultura*/)){
    $errors[]= "Los campos pueden poseer espacios";
}else{

    $errors[]= validar_grado($grado);

    $errors[]= validar_seccion($seccion);

    $errors[]= validar_anio_escolar($anio_escolar1,$anio_escolar2);

    $errors[] = comprobar_no_aula($no_aula); 
$id_new_clase= generador_id_clases($grado,$seccion,$anio_escolar1,$anio_escolar2,$turno);


if (strcmp($_SESSION['id_clase'], $id_new_clase) != 0) {
if(is_exist_clase($id_new_clase)){$errors[]="Esta clase ya existe ";}
}

}

    
if (!comprobar_msjs_array($errors)) {    



actualizar_clases($id_clase,
        $id_new_clase,
        $grado,
        $seccion,
        $no_aula,
        $turno,
        $anio_escolar1,
        $anio_escolar2);

$errors[]= 'Cambios registrados con exito';
}

}

?>

    <title>Modificacion de Clases</title>


<?php require '../../includes/header.php' ?>


    <h2>Modificacion de Clases</h2>

    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
        <br>
<?php


    $sql="SELECT * FROM clases WHERE id_clase = :id_clase;";
    
    $result=$db->prepare($sql);

    if (!empty($id_new_clase)) {
        $_SESSION['id_clase'] = $id_new_clase;
    }
    
    $id_clase = $_SESSION['id_clase'];


    $result->bindValue(":id_clase",$id_clase);

    $result->execute();


while($registro=$result->fetch(PDO::FETCH_ASSOC)){
?>
      <div class="form-group text-center">   
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        
        <div class="row">

        <div class="col-lg-2">
        Grado Escolar:
        <select name="grado" id="" autocomplete="on" class="form-control">
            <option <?php if($registro['grado'] == '1') echo 'selected';?> value="1">1ro
            </option>
            <option <?php if($registro['grado'] == '2') echo 'selected';?> value="2">2do</option>
            <option <?php if($registro['grado'] == '3') echo 'selected';?> value="3">3ro</option>
            <option <?php if($registro['grado'] == '4') echo 'selected';?> value="4">4to</option>
            <option <?php if($registro['grado'] == '5') echo 'selected';?> value="5">5to</option>
            <option <?php if($registro['grado'] == '6') echo 'selected';?> value="6">6to</option>

        </select>
        </div>
        
        <div class="col-lg-2">
        Seccion
        <input type="text" name="seccion" id="" class="form-control" value="<?php echo $registro['seccion']; ?>">
        </div>
        
        <div class="col-lg-2">
        Turno:
        <select name="turno" id="" class="form-control">
            <option <?php if($registro['id_turno'] == '1') echo 'selected';?> value="1">Mañana</option>
            <option <?php if($registro['id_turno'] == '2') echo 'selected';?> value="2">Tarde</option>
        </select> 
        </div>

        <div class="col-lg-2">
        Numero de Aula <input type="text" name="no_aula" id="" class="form-control" value="<?php echo $registro['no_aula']; ?>">
        </div>

        
        <div class="col-2">
        Año Escolar
        <input type="number" name="año_escolar1" id="" class="form-control" value="<?php echo $registro['anio_escolar1']; ?>">
        </div>
        
        <div class="col-2">
        <input type="number" name="año_escolar2" id="" class="form-control my-4" value="<?php echo $registro['anio_escolar2']; ?>">
        </div>

        </div>

        <div class="row" >
        <a class="btn btn-primary col-3 mx-3"  style='left: 20px;' href='clases.php'>volver</a>
        <?php echo "<button type='submit' id='' class='btn btn-primary col-8 mx-3' name='save_docent' value=".$id_clase.">Guardar</button>";?>
        

        </div>    
    

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>".$msjs."</p>";
        }
    }

    ?>
        </div>
    </form>
    <?php } ?>

    
        
    
<?php 

require '../../includes/footer.php';

 ?>