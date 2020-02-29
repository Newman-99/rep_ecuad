
<?php 
        $sql = consulta_represent_student()." WHERE rpt.ci_escolar = :ci_escolar ORDER BY id_pers_est DESC LIMIT 1;";

        $result=$db->prepare($sql);
            
        $result->bindValue(":ci_escolar",$ci_escolar);
        
            $result->execute();

 while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 
 $nombres_compilacion = explode(" ", $registro['nombre']);

$count_represents++;
    ?>

      <br><br><br><br>    
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Representante</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_r" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_p']; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_r" id="" placeholder="Apellido" class="form-control" value="<?php echo $registro['apellido_m']; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_r" id="" placeholder="Nombre" class="form-control"  value="<?php echo $nombres_compilacion[0]; ?>">
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_r" id="" placeholder="Nombre" class="form-control" value="<?php for ($i=1; $i < count($nombres_compilacion); $i++) { 
                                echo $nombres_compilacion[$i].' ';} ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-3 my-3">
                                            <label></label>
                                        <select name="nacionalidad_r" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if($registro['id_nacionalidad'] == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if($registro['id_nacionalidad'] == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <label>Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_r" value="<?php echo $registro['id_doc']; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <p for="" class="">Sexo:</p>

                                            <label for="" class="">Masculino:</label>
                                            <input type="radio" <?php if($registro['id_sexo'] == '1') echo "checked";?> name="sexo_r" value="1" id="" >

                                            <label for="sexo_r" class="">Femenino:</label>

                                            <input type="radio" name="sexo_r" <?php if($registro['id_sexo'] == '2') echo "checked";?> value="2" id="" >
                                        </div>                                        
                                    </div> 
                                
                                    <div class="row my-4"> 
                                        <div class="col-lg-6 ">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_r" id="" placeholder="Ocupacion" class="form-control" value="<?php echo $registro['ocupacion'];?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="text" name="fecha_nac_r" id="" placeholder="Fecha" class="form-control" value="<?php echo $registro['fecha_nac']; ?>">
                                        </div>
    

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_r" id="cedula" class="form-control"  >
                                                <option value=""> Seleccione </option>
                                                <option <?php if($registro['id_estado_civil'] == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if($registro['id_estado_civil'] == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if($registro['id_estado_civil'] == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if($registro['id_estado_civil'] == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>
                                    </div>
    
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_r" id="" ><?php echo $registro['lugar_nac'];?></textarea>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_r"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php echo $registro['direcc_hab'];?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_r" id="" placeholder="Telefono local" class="form-control" value="<?php echo $registro['tlf_local']; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_r" id="" placeholder="Telefono celular" class="form-control" value="<?php echo $registro['tlf_cel']; ?>" >    
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_r" id="" placeholder="Correo electronico" class="form-control" value="<?php echo $registro['correo']; ?>">
                                        </div>
                                        
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6 my-4">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_r" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php echo $registro['prof_ofic']; ?>">
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_r"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php echo $registro['lugar_trab'];?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_r"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php  echo $registro['direcc_trab'];?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_r" id="" placeholder="Telefono de oficina" class="form-control" value="<?php echo $registro['tlf_ofic'];?>">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 my-2">
                                            <label>Parentesco:</label>
                                            <input type="text" name="parentesco_r" id="" placeholder="Parentesco" class="form-control" value="<?php  echo $registro['parentesco'];?>">
                                        </div>


 <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_r" class="">Si</label>

                                        <input type="radio" <?php if(isset($registro["convivencia"])){ if($registro["convivencia"] == '1') echo "checked";}
                                        ?> name="convivencia_r" value="1" id="">

                                        <label for="convivencia_r" class="">No</label>

                                        <input type="radio" name="convivencia_r" <?php if(isset($registro["convivencia"])){ if($registro["convivencia"] == '0') echo "checked";}
                                        ?> value="2" id="">
                                        </div>
                                                                                         </div>


                <?php imprimir_msjs_no_style($errors_r_upd); ?>

             <button type='submit' class="btn btn-primary col-lg-9" value="upd_represent" name='upd_represent'>Actualizar</button>

             <button type='submit' class="btn btn-primary col-lg-9" value="new_represent" name='new_represent'>Añadir nuevo</button>

    
<?php } ?>