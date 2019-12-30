<?php
require './functions/functions.php';
require './database/connect.php';

  $grado = '1';
  $seccion='';
  $no_aula = '18';
  $id_turno = '1';
  $anio_escolar1 = '2018';
  $anio_escolar2 = '2019';
$id_clase = '1-A-2018-2019-1';
$id_new_clase = '1-C-2018-2019-1';

$id_doc = '32020390';
$funcion_docent = '1';
$turno = '1';
$id_estado = '1';
$fecha_ingreso = '2019-12-04';
$fecha_inabilitacion='0000-00-00';





echo obten_func_docent_x_contrato('12');

/*
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
        
    }

        actualizar_clases($id_clase,
    	$id_new_clase,
        $grado,
        $seccion,
        $no_aula,
        $id_turno,
        $anio_escolar1,
        $anio_escolar2);



<td>

<?php
$sql="SELECT 
doc.id_doc_docent,      
in_p.nombre,in_p.apellido_p,in_p.apellido_m,
tp.descripcion tipo_docent, 
est.descripcion estado_contrato, 
ca.id_tipo_docent

FROM 
clases cl
INNER JOIN clases_asignadas ca ON cl.id_clase = ca.id_clase 
INNER JOIN docentes doc ON ca.id_doc_docent = doc.id_doc_docent 
INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc 
INNER JOIN tipos_docentes tp ON ca.id_tipo_docent = tp.id_tipo_docent
INNER JOIN estado est ON ca.id_estado = est.id_estado AND ca.id_estado = '1'
INNER JOIN turnos tr ON cl.id_turno = tr.id_turno /*WHERE cl.id_clase = :id_clase;/*";
                    
            $result=$db->prepare($sql);
                                    
       $result->bindValue(":id_clase",$id_clase);

             $result->execute();

                ?>
                    
                    <tr>
                        <thead>
                         <th>Documento de identidad</th> 
                         <th>Nombre</th> 
                         <th>Apellidos</th> 
                         <th>Cargo</th> 
                         <th>Estado contrato</th>
                         </thead>
                    </tr>
            <?php
            while($registro=$result->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $registro['id_doc_docent']; ?></td> 
                        <td><?php echo $registro['nombre']; ?></td>
                        <td><?php echo $registro['apellido_p']." ".$registro['apellido_m'];?></td>
                        <td><?php echo $registro['tipo_docent'];?></td> 
                        <td><?php echo $registro['estado_contrato'];?></td>
                    </tr>
                        <?php } ?>
                        </td>
                </tr>

?>
*/