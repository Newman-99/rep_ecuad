<?php 
        $sql = consulta_padres_student()." WHERE pds.ci_escolar = :ci_escolar AND pds.id_tip_padre = 2 LIMIT 1";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$ci_escolar);
        
        $result->execute();

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
     

  ?>
    <!--formularios-->
            <div class="container">
<?php $nombres_compilacion = explode(" ", $registro['nombre']);?>

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>

                <div class="row">    
                        <div class="col-lg-12">
                        <!--<div id="ui">-->
                            <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST" class="form-group text-center">
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Padre
                                            </h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_p" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_p']; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_p" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_m']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_p" id="" placeholder="Nombre" class="form-control"  value="<?php echo $nombres_compilacion[0]; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_p" id="" placeholder="Nombre" class="form-control" value="<?php for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';
                                } ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_p" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <?php $id_doc_p = $registro['id_doc']; ?>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_p" value="<?php echo $registro['id_doc']; ?>" >     
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_p" id="" placeholder="Ocupacion" class="form-control" value="<?php echo $registro['ocupacion']; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_p" id="" placeholder="Fecha" class="form-control" value="<?php echo $registro['fecha_nac']; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_p" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_p" id=""  ><?php if(isset($registro['lugar_nac'])) echo $registro['lugar_nac'];?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_p"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($registro['direcc_hab'])) echo $registro['direcc_hab'];?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_p" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($registro['tlf_local'])) echo $registro['tlf_local']; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_p" id="" placeholder="Telefono celular" class="form-control" value="<?php echo $registro['tlf_cel']; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_p" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($registro['correo'])) echo $registro['correo']; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_p" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php  echo $registro['prof_ofic']; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_p"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php echo $registro['lugar_trab'];?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_p"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php echo $registro['direcc_trab']?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_p" id="" placeholder="Telefono de oficina" class="form-control" value="<?php echo $registro['tlf_ofic'];?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(is_exist_represent($id_doc_p,$ci_escolar)) echo "checked";?> name="is_represent_p" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_p" class="">Si</label>

                                        <input type="radio" <?php if($registro['convivencia'] == '1') echo "checked";?> name="convivencia_p" value="1" id="">

                                        <label for="convivencia_p" class="">No</label>
    
                                        <input type="radio" name="convivencia_p" <?php if($registro['convivencia']  == '0') echo "checked";?> value="0" id="">
                                        </div>
                                    </div>

                                    <?php imprimir_msjs_no_style($errors_p_upd); ?>

                                        <button type='submit' class="btn btn-primary col-lg-9"value="upd_dad" name ='upd_dad'>Actualizar</button>

                                        <?php 

                                    }
 ?>