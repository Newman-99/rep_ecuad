<?php require '../../includes/init_system.php'; ?>

<?php require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();


if (!empty($_POST['mas_info_admin'])) {

    $id_doc = htmlentities(addslashes($_POST["mas_info_admin"])); 
}

?>

    <title>Mas Informacion Administrativo</title>


<?php require '../../includes/header.php' ?>


    <h2>Mas Informacion del Administrativo</h2>
    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
        <br>
<?php

    $sql = consulta_admins()." WHERE adm.id_doc_admin = :id_doc;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":id_doc",$id_doc);
    $result->execute();


echo "
        <div>
                <table class='tabla-2'>
                    <thead>
                        <tr>  

                        <th>Nacionalidad</th>     

                         <th>Documento de  identificacion</th> 

                         <th>Nombre</th> 

                         <th>Apellidos</th> 
                         <th>Sexo</th> 

                         <th>Estado Civil</th> 

                         <th>Fecha de Nacimiento</th> 

                        <th>Lugar de Nacimiento</th>

                        <th>Direccion de Habitacion</th>

                         <th>Turno</th> 

                         <th>Funcion</th>

                         <th>Fecha Ingreso</th>

                         <th>Estado</th>

                         <th>Telefono Celular</th>

                         <th>Telefono Local</th>

                         <th>Correo</th>
                        
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                                    $fecha_inabilitacion = $registro['fecha_inabilitacion'];
                                    echo " 

                    <td>".$registro['nacionalidad']."</td> 
                    
                    <td>".$registro['id_doc']."</td> 
                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        

                        <td>".$registro['sexo']."</td>

                        <td>".$registro['est_civil']."</td>

                        <td>".$registro['fecha_nac']."</td>

                        <td>".$registro['lugar_nac']."</td>

                        <td>".$registro['direcc_hab']."</td>
                        
                        <td>".$registro['turno']."</td>

                        <td>".$registro['area']."</td>

                        <td>".$registro['fecha_ingreso']."</td>
                        
                        <td><center>".$registro['estado']."</center>";

                        if ($registro['id_estado'] === '2') {
                                echo "<br><br> <center><b>Fecha Inabilitacion</b></center><br>
                                 ".$registro['fecha_inabilitacion']."<br>";
                        }


                    echo "
                        </td>

                        <td>".$registro['tlf_cel']."</td>

                        <td>".$registro['tlf_local']."</td>

                        <td>".$registro['correo']."</td>

<td> </tr>";
  }

      echo "</table>
            </div>";
?>

    <a class="btn btn-primary btn-lg" style="position:absolute;bottom:-150px;right:30px;" href='admins.php'>volver</a>

    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>".$msjs."</p>";
        }
    }

    ?>

<?php 

require'../../includes/footer.php';

 ?>