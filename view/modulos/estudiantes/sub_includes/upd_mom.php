
<?php 

        $sql = consulta_padres_student()." WHERE pds.ci_escolar = :ci_escolar AND pds.id_tip_padre = 1 LIMIT 1";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$_SESSION['ci_escolar']);
        
        $result->execute();

    while($registro=$result->fetch(PDO::FETCH_ASSOC)){
     
  ?>
    <!--formularios-->
            <div class="container">
<?php $nombres_compilacion = explode(" ", $registro['nombre']);?>

<!------------------------------- SEGUNDO FORMULARIO [ DATOS DE LA MADRE ] ------------------------------------------------>
          
                              
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos de la Madre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_p']; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_m" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_m']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_m" id="" placeholder="Nombre" class="form-control"  value="<?php echo $nombres_compilacion[0]; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_m" id="" placeholder="Nombre" class="form-control" value="<?php for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';
                                } ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_m" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($registro['id_nacionalidad'])) if($registro['id_nacionalidad'] == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_m" value="<?php $id_doc_m = $registro['id_doc']; echo $registro['id_doc']; ?>" >     
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_m" id="" placeholder="Ocupacion" class="form-control" value="<?php echo $registro['ocupacion']; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_m" id="" placeholder="Fecha" class="form-control" value="<?php echo $registro['fecha_nac']; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_m" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($registro['id_estado_civil'])) if($registro['id_estado_civil'] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_m" id=""  ><?php if(isset($registro['lugar_nac'])) echo $registro['lugar_nac'];?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_m"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($registro['direcc_hab'])) echo $registro['direcc_hab'];?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_m" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($registro['tlf_local'])) echo $registro['tlf_local']; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_m" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($registro['tlf_cel'])) echo $registro['tlf_cel_m']; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_m" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($registro['correo'])) echo $registro['correo']; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_m" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($registro['prof_ofi'])) echo $registro['prof_ofi']; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_m"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php echo $registro['lugar_trab'];?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_m"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php echo $registro['direcc_trab']?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_m" id="" placeholder="Telefono de oficina" class="form-control" value="<?php echo $registro['tlf_ofic'];?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(is_exist_represent($id_doc_m,$ci_escolar)) echo "checked";?> name="is_represent_m" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_m" class="">Si</label>

                                        <input type="radio" <?php if($registro['convivencia']) echo "checked";?> name="convivencia_m" value="1" id="">

                                        <label for="convivencia_m" class="">No</label>

                                        <input type="radio" name="convivencia_m" <?php if($registro['convivencia'] == '0') echo "checked";?> value="0" id="">
                                        </div>
                                    </div>

   <?php imprimir_msjs_no_style($errors_m_upd); ?>

                                        <button type='submit' class="btn btn-primary col-lg-9"value="upd_mom" name ='upd_mom'>Actualizar</button>
<?php } ?>