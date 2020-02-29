
<?php require '../../includes/init_system.php'; ?>

<?php require '../../includes/head.php';
    session_start();

 valid_inicio_sesion('2');
        
$errors = array();

if (!empty($_POST['mas_info_student'])) {

    $ci_escolar = htmlentities(addslashes($_POST["mas_info_student"])); 
}
    
    

?>

    <title>Mas Informacion Estudiante</title>

<?php require '../../includes/header.php' ?>

    <h2>Mas Informacion del Estudiante</h2>
    
        <br>
<?php

    $sql = consulta_info_basic_student()." WHERE estd.ci_escolar = :ci_escolar ORDER BY es.id_actualizacion DESC LIMIT 1;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();
echo "



        <div>
                <table class='tabla-2'>
                
                <thead>
                        <tr><td colspan='14' class='text-center'><h4>Informacion Basica</h4></td></tr>
                        
                        <tr>  

                        <th>Nacionalidad</th>     

                         <th>Cedula Escolar</th> 

                         <th>Documento de  identificacion</th> 

                         <th>Nombres</th> 

                         <th>Apellidos</th> 
                         
                         <th>Sexo</th> 

                         <th>Fecha de Nacimiento</th> 

                         <th>Edad</th> 

                        <th>Lugar de Nacimiento</th>

                        <th>Direccion de Habitacion</th>

                         <th>Estado</th> 

                         <th>Posee Canaima?</th> 

                         <th>Contrato</th>

                         <th>Posee coleccion Bicentenaria?</th>                        
                        </tr>
                    </thead>";


            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  

                    echo " 

                    <td>".$registro['nacionalidad']."</td> 
                    
                    <td>".$registro['ci_escolar']."</td> 


	                    <td>".$registro['id_doc']."</td> 
                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        

                        <td>".$registro['sexo']."</td>


                        <td>".$registro['fecha_nac']."</td>

                        <td>".calcula_edad($registro['fecha_nac'])."</td>

                        <td>".$registro['lugar_nac']."</td>

                        <td>".$registro['direcc_hab']."</td>
                        
                        <td>".$registro['estado']."</td>

                        <td>".msj_bool($registro['canaima'])."</td>

                        <td>".$registro['contrato']."</td>
                        
                        <td>".msj_bool($registro['colecc_bicent'])."</td> </tr>";


  }

      echo "</table>
            </div>";

?>

            <?php
/*
    $sql = clases_student()." WHERE est.ci_escolar = :ci_escolar;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();
echo "
<h3>Sus clases</h3>

        <div>
                <table class='tabla'>
                    <thead>
                        <tr>  

                      <th>Clases</th>     
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                  
?>

						<td> <?php echo $registro['grado']." ".$registro['seccion']." ".$registro['turno']." " .$registro['anio_escolar1']."-".$registro['anio_escolar2'];?>
<?php 
}*/



    $sql = consulta_padres_student()." WHERE prsd.ci_escolar = :ci_escolar AND pds.id_tip_padre = 1 LIMIT 1;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();


echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                        <tr><td colspan='17' class='text-center'><h4>Informacion de la Madre</h4></td></tr>
                        <tr>  

                        <th>Nacionalidad</th>     

                         <th>Documento de  identificacion</th> 

                         <th>Ocupacion</th> 
                        
                         <th>Estado Civil</th> 

                         <th>Nombres</th> 

                         <th>Apellidos</th> 
                         
                         <th>Fecha de Nacimiento</th> 

                        <th>Lugar de Nacimiento</th>

                        <th>Direccion de Habitacion</th>

                        <th>Vive con el estudiante</th>

                        <th>Telefono local</th>

                        <th>Telefono celular </th>

                        <th>Correo electronico</th>

                        <th>Profesion u Oficio</th>

                        <th>Lugar de trabajo</th>

                        <th>Direccion de trabajo</th>

                        <th>Telefono de oficina</th>
                        <th></th>
                        </tr>
                    </thead>";



            if ($result->rowCount() == 0) {


echo "<td></td> <td>La Madre No fue Registrada</td></tr></table>
            </div>";
}else{

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                    <td>".$registro['nacionalidad']."</td> 
                    

                        <td>".$registro['id_doc']."</td> 

                        <td>".$registro['ocupacion']."</td> 

                    <td>".$registro['estado_civil']."</td> 

                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        

                        <td>".$registro['fecha_nac']."</td>

                        <td>".$registro['lugar_nac']."</td>

                        <td>".$registro['direcc_hab']."</td>
                        
                        <td>".msj_bool($registro['convivencia'])."</td>

                        <td>".$registro['tlf_ofic']."</td>

                        <td>".$registro['tlf_local']."</td>
                        
                        <td>".$registro['correo']."</td>

                        <td>".$registro['prof_ofic']."</td>

                        <td>".$registro['lugar_trab']."</td>

                        <td>".$registro['direcc_trab']."</td>

                        <td>".$registro['tlf_ofic']."</td>

";


                            if (is_exist_represent($registro['id_doc'])) {
                                $is_represent_m = TRUE;
                            echo "<td>Es el Representante</td>";}
                                              

  }

      echo "</tr></table>
            </div>";
        }




    $sql = consulta_padres_student()." WHERE prsd.ci_escolar = :ci_escolar AND pds.id_tip_padre = 2 LIMIT 1;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();
echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='17' class='text-center'><h4>Informacion del Padre</h4></td></tr>
                        <tr>  

                        <th>Nacionalidad</th>     

                         <th>Documento de  identificacion</th> 

                         <th>Ocupacion</th> 
                        
                         <th>Estado Civil</th> 

                         <th>Nombres</th> 

                         <th>Apellidos</th> 
                         
                         <th>Fecha de Nacimiento</th> 

                        <th>Lugar de Nacimiento</th>

                        <th>Direccion de Habitacion</th>

                        <th>Vive con el estudiante</th>

                        <th>Telefono local</th>

                        <th>Telefono celular </th>

                        <th>Correo electronico</th>

                        <th>Profesion u Oficio</th>

                        <th>Lugar de trabajo</th>

                        <th>Direccion de trabajo</th>

                        <th>Telefono de oficina</th>
						<th></th>
                        </tr>
                    </thead>";

                                if ($result->rowCount() == 0) {

echo "<td></td> <td> El Padre No fue Registrado</td></tr></table>
            </div>";
}else{


            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                    <td>".$registro['nacionalidad']."</td> 
                    

	                    <td>".$registro['id_doc']."</td> 

	                    <td>".$registro['ocupacion']."</td> 

                    <td>".$registro['estado_civil']."</td> 

                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        

                        <td>".$registro['fecha_nac']."</td>

                        <td>".$registro['lugar_nac']."</td>

                        <td>".$registro['direcc_hab']."</td>
                        
                        <td>".msj_bool($registro['convivencia'])."</td>

                        <td>".$registro['tlf_ofic']."</td>

                        <td>".$registro['tlf_local']."</td>
                        
                        <td>".$registro['correo']."</td>

                        <td>".$registro['prof_ofic']."</td>


                        <td>".$registro['lugar_trab']."</td>

                        <td>".$registro['direcc_trab']."</td>

                        <td>".$registro['tlf_ofic']."</td>

";

                        	if (is_exist_represent($registro['id_doc'])) {
                        	$is_represent_p = TRUE;
                        	echo "<td>Es el Representante</td>";

                        	}
                        	                  

  }

      echo "</tr></table>
            </div>";

}
if (!isset($is_represent_m) && !isset($is_represent_p)) {
	
	    $sql = consulta_represent_student()." WHERE rpt.ci_escolar = :ci_escolar LIMIT 1;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();
echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='18' class='text-center'><h4>Informacion del Representante</h4></td></tr>
                        <tr>  

                        <th>Nacionalidad</th>     

                         <th>Documento de  identificacion</th> 

                         <th>Ocupacion</th> 
                        
                         <th>Estado Civil</th> 

                         <th>Nombres</th> 

                         <th>Apellidos</th> 
                         
                         <th>Fecha de Nacimiento</th> 

                        <th>Lugar de Nacimiento</th>

                        <th>Direccion de Habitacion</th>

                        <th>Vive con el estudiante?</th>

                         <th>Parentesco</th>

                        <th>Telefono local</th>

                        <th>Telefono celular </th>

                        <th>Correo electronico</th>

                        <th>Profesion u Oficio</th>

                        <th>Lugar de trabajo</th>

                        <th>Direccion de trabajo</th>

                        <th>Telefono de oficina</th>

						<th></th>
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                    <td>".$registro['nacionalidad']."</td> 
                    

	                    <td>".$registro['id_doc']."</td> 

	                    <td>".$registro['ocupacion']."</td> 

                    <td>".$registro['estado_civil']."</td> 

                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        

                        <td>".$registro['fecha_nac']."</td>

                        <td>".$registro['lugar_nac']."</td>

                        <td>".$registro['direcc_hab']."</td>
                        
                        <td>".msj_bool($registro['convivencia'])."</td>

                        <td>".$registro['parentesco']."</td>

                        <td>".$registro['tlf_ofic']."</td>

                        <td>".$registro['tlf_local']."</td>
                        
                        <td>".$registro['correo']."</td>

                        <td>".$registro['prof_ofic']."</td>


                        <td>".$registro['lugar_trab']."</td>

                        <td>".$registro['direcc_trab']."</td>

                        <td>".$registro['tlf_ofic']."</td>";

}
      echo "</tr></table>
            </div>";
}

    $sql = consulta_other_data_student()." WHERE ode.ci_escolar = :ci_escolar;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();
echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='14' class='text-center'><h4>Otros Datos</h4></td></tr>
                        <tr>  

                        <th>Nro de Personas que viven con el estudiante</th>     

                        <th>Hermanos en la institucion</th>     

                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                    <td>".$registro['nro_pers_viven']."</td> 
                    <td>".msj_bool($registro['hermanos']);

                    if ($registro['hermanos']) {
                    echo " | ".$registro['descrip_hermanos'];                    	
                    }

                    echo "</td>";

}
      echo "</tr></table>
            </div>";

// Datos de salud

    $sql = consulta_salud_student()." WHERE sd.ci_escolar = :ci_escolar;";

    $result=$db->prepare($sql);
    

    $result->bindValue(":ci_escolar",$ci_escolar);
    $result->execute();

echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='14' class='text-center'><h4>Informacion de Salud</h4></td></tr>
                        <tr>  

                        <th>Enfermedad Cronica</th>     
                        <th>Problemas Visuales</th>     
                        <th>Preoblemas Auditos</th>     
                        <th>Alergias</th>     
                        <th>Condicion especifica</th>     
                        <th>Vacunas</th> 

                        <th>Psicopedagoga</th> 
                        
                        <th>Terapia de Lenguaje</th>

                        <th>Psicologo</th> 

                        <th>Otras</th> 

                        <th>Medicacion</th> 
                        
                        <th>Se Anexo Informe</th> 

                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){
  
                    echo " 

                    <td>".msj_bool($registro['est_croni'])." | ".$registro['desc_croni']."</td> 

                    <td>".msj_bool($registro['est_visual'])." | ".$registro['desc_visual']."</td> 

                    <td>".msj_bool($registro['est_auditivo'])." | ".$registro['desc_auditivo']."</td> 

                    <td>".msj_bool($registro['est_alergia'])." | ".$registro['desc_alergia']."</td> 

                    <td>".msj_bool($registro['est_condic_esp'])." | ".$registro['desc_condic_esp']."</td> 

                    <td>".msj_bool($registro['est_vacuna'])." | ".$registro['desc_vacuna']."</td> 

                    <td>".msj_bool($registro['desc_psicopeda'])." | ".$registro['desc_psicopeda']."</td> 

                    <td>".msj_bool($registro['desc_ter_lenguaje'])." | ".$registro['desc_ter_lenguaje']."</td> 

                    <td>".msj_bool($registro['desc_psicolo'])." | ".$registro['desc_psicolo']."</td> 

                    <td>".msj_bool($registro['otras_condic'])." | ".$registro['desc_otras']."</td> 

                    <td>".msj_bool($registro['est_medicacion'])." | ".$registro['desc_medicacion']."</td> 

                    <td>".msj_bool($registro['anex_inform'])."</td> 
	

                    ";
                    

}
      echo "</tr></table>
            </div>";

    $sql = consulta_movilidad_student()." WHERE mv.ci_escolar = :ci_escolar;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);

    $result->execute();

echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='14' class='text-center'><h4>Acceso y reptiro de la intitucion</h4></td></tr>
                        <tr>  

                        <th>LLega y se retira solo</th>     

                        <th>LLega y se retira en transporte escolar</th>     

                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                    <td>".msj_bool($registro['est_ret'])." | ".$registro['desc_ret']."</td> 

                    <td>".msj_bool($registro['est_tranport'])." | ".$registro['desc_tranport']."</td> ";

}
      echo "</tr></table>
            </div>";


    $sql = consulta_pers_ret_student()." WHERE prt.ci_escolar = :ci_escolar LIMIT 1;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);

    $result->execute();

echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='14' class='text-center'><h4>Persona autorizada a retirar</h4></td></tr>
                        <tr>  

                        <th>Nacionalidad</th>     

                         <th>Documento de  identificacion</th> 
                        
                         <th>Estado Civil</th> 

                         <th>Nombres</th> 

                         <th>Apellidos</th> 
                         
                         <th>Parentesco</th>

                        <th>Telefono local</th>

                        <th>Telefono celular </th>

                        <th>Telefono de Emergencia</th>
                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                    <td>".$registro['nacionalidad']."</td> 
                    

	                    <td>".$registro['id_doc']."</td> 


                    <td>".$registro['estado_civil']."</td> 

                        
                        <td>".$registro['nombre']."</td>
                        
                        <td>".$registro['apellido_p']." ".$registro['apellido_m'] ."</td> 
                        

                        <td>".$registro['parentesco']."</td>

                        <td>".$registro['tlf_cel']."</td>

                        <td>".$registro['tlf_local']."</td>
                        
                        <td>".$registro['tlf_emergecia']."</td>";

}
      echo "</tr></table>
            </div>";

    $sql = consulta_escolaridad()." WHERE es.ci_escolar = :ci_escolar ORDER BY ac.fecha DESC;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);

    $result->execute();

echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='14' class='text-center'><h4>Otros datos de inscripcion y escolaridad</h4></td></tr>
                        <tr>  

                        <th>Plantel de procedencia</th>     

                         <th>Localidad</th> 
                        
                         <th>Grado Asignado</th> 

                         <th>Año Escolar</th> 
                         
                        <th>Calificacion Definitiva</th>

                        <th>Repitiente</th>

                        <th>Observaciones</th>

                        <th>Datos de Actualizaion</th>

                        </tr>
                    </thead>";

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                        <td>".$registro['plantel_proced']."</td>

                        <td>".$registro['localidad']."</td>

                        <td>".$registro['grado']."</td>

                        <td>".$registro['anio_escolar1']."-".$registro['anio_escolar2']."</td>

                        <td>".$registro['calif_def']."</td>
                         
                        <td>".msj_bool($registro['repitiente'])."</td>

                        <td>".$registro['observs']."</td>

                        
                        <td>Fecha | ".$registro['fecha']." <br><br>Administrador: ".$registro['id_doc_admin']." - ".$registro['nombre']." ".$registro['apellido_p']." ".$registro['apellido_m']."</td></tr>";

}
      echo "</table>
            </div>";

    $sql = consulta_clases_student()." WHERE est.ci_escolar = :ci_escolar ORDER BY act.fecha DESC;";

    $result=$db->prepare($sql);
    
    $result->bindValue(":ci_escolar",$ci_escolar);

    $result->execute();


echo "


        <div>
                <table class='tabla-2'>
                    <thead>
                    <tr><td colspan='14' class='text-center'><h4>Clases</h4></td></tr>
                        <tr>  

                        <th>Clase</th>

                        <th>Datos de Actualizaion</th>

                        </tr>
                    </thead>";


            if ($result->rowCount() == 0) {
echo "<td> No tiene clases asignadas</td></tr></table>
            </div>";

    }else{

            while($registro=$result->fetch(PDO::FETCH_ASSOC)){  
                    echo " 

                        
                        <td> Clase: ".$registro['grado']."-".$registro['seccion']."-".$registro['anio_escolar1']."-".$registro['anio_escolar2']."-".$registro['turno']."</td>

                        <td>Administrador: ".$registro['id_doc_admin']."<br><br> Fecha: " .$registro['fecha']."</td></tr>";

}
      echo "</table>
            </div>";
}
?>

<br><br><br>
    <a class="btn btn-primary" href='estudiantes.php'>volver</a>
    
    <?php require '../../includes/footer.php' ?>