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
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../style/css/styless.css">
<header class="top">
           <ul style="background-image: url('../../img/th6.jpg');">
                <li><img src="../../img/i.png" width="80px" height="70px" style="" ><br><p> U-E-N "República del Ecuador"</p></li>
            </ul>
       </header>



<?php require '../../includes/header.php' ?>


<<<<<<< HEAD
    <form action='<?php htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
        <br>
=======
    <h2>Mas Informacion del Docente</h2>
>>>>>>> 82e2059a0fd07e67b7016260b9dbe6f599b54f1e
<?php

    $sql = consulta_docentes()." WHERE doc.id_doc_docent = :id_doc;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":id_doc",$id_doc);

    $result->execute();


echo "

    <title class="info">Mas Informacion Docente</title>

        <div>
                <table class="tabla">

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


    <?php
    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>".$msjs."</p>";
        }
    }

    ?>
    
    <a class="btn btn-primary" style="position:absolute;
    bottom:5px;
    right:10px;" href='docentes.php'>volver</a>
    
