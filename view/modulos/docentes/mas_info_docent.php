<?php require '../../includes/init_system.php'; ?>

<?php require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

var_dump($_POST['mas_info_docent']);
if (!empty($_POST['mas_info_docent'])) {
    $_SESSION["id_doc"] = htmlentities(addslashes($_POST["mas_info_docent"])); 

}
$id_doc =$_SESSION["id_doc"];
?>

    <title>Mas Informacion Docente</title>


<?php require '../../includes/header.php' ?>


    <h2>Mas Informacion del Docente</h2>
<?php

    $sql = consulta_docentes()." WHERE doc.id_doc_docent = :id_doc;";

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

                         <th>Estado</th>";
                        
                       /* if(isset($registro)){
                        $fecha_inabilitacion = $registro['fecha_inabilitacion'];
                        if(!$fecha_inabilitacion == '0000-00-00') {
                               echo " <th>Fecha Inabilitacion</th>";}
                        }*/

                               echo "

                         <th>Telefono Celular</th>

                         <th>Telefono Local</th>

                         <th>Correo</th>
                        
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                                    $fecha_inabilitacion = $registro['fecha_inabilitacion'];
                       
                       /* if ($fecha_inabilitacion == '0000-00-00') {
                            $fecha_inabilitacion = 'El Docente sigue activo';
                        }*/
                  
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
                        
                        <td>".$registro['descripcion_turno']."</td>

                        <td>".$registro['funcion']."</td>

                        <td>".$registro['fecha_ingreso']."</td>
                        
                        <td><center>".$registro['descripcion_estado']."</center>";

                        if ($registro['id_estado'] === '2') {
                                echo "<br><center>Fecha Inabilitacion</center><br>
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


    <a class="btn btn-primary" style='position:absolute;bottom:50px;right:30%;' href='docentes.php'>volver</a>
    
    <?php require '../../includes/footer.php' ?>