                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Padre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_p)) echo $apellido_p_p; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_p" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_p)) echo $apellido_m_p; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_p" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_p)) echo $nombre1_p; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_p" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_p)) echo $nombre2_p; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-2 my-3">
                                            <label></label>
                                            <select name="nacionalidad_p" id="cedula" class="form-control" >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($nacionalidad_p)) if($nacionalidad_p == '1') echo 'selected';?> value="1">V</option>
                                                <option <?php if(isset($nacionalidad_p)) if($nacionalidad_p == '2') echo 'selected';?> value="2">E</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4 my-2">
                                            <label class="form-inline">Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_p" value="<?php if(isset($id_doc_p)) echo $id_doc_p; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_p" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_p)) echo $ocupacion_p;?>">
                                        </div>
                                    </div> 
                                

                                    <div class="row my-4">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="fecha_nac_p" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_p)) echo $fecha_nac_p; ?>">
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_p" id="cedula" class="form-control "  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_p)) if($estado_civil_p == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                         <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_p" id="" ><?php if(isset($lugar_nac_p)) echo $lugar_nac_p;?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_p"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php if(isset($direcc_hab_p)) echo $direcc_hab_p;?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_p" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_p)) echo $tlf_local_p; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_p" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_p)) echo $tlf_cel_p; ?>" >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_p" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_p)) echo $correo_p; ?>">
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_p" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_p)) echo $prof_ofi_p; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_p"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_p)) echo $lug_trab_p;?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_p"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_p)) echo $direcc_trab_p;?></textarea>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_p" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_p)) echo $tlf_ofic_p;?>">
                                        </div>
                                                 

                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                            <input type="checkbox" <?php if(isset($_POST["is_represent_p"])){ if($_POST["is_represent_p"] == '1') echo "checked";}else{if(isset($is_represent_p)){ if($is_represent_p == '1') echo "checked";}}?> name="is_represent_p" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_p" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_p"])){ if($_POST["convivencia_p"] == '1') echo "checked";}else{if(isset($convivencia_p)){ if($convivencia_p == '1') echo "checked";}}
                                        ?> name="convivencia_p" value="1" id="">

                                        <label for="convivencia_p" class="">No</label>

                                        <input type="radio" name="convivencia_p" <?php if(isset($_POST["convivencia_p"])){ if($_POST["convivencia_p"] == '0') echo "checked";}else{if(isset($convivencia_p)){ if($convivencia_p == '0') echo "checked";}}
                                        ?> value="0" id="">
                                        </div>
                                    </div>

                                    <div class="row col-12">
                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si no se registrara:</label>
                                            <input type="checkbox" <?php if(isset($_POST["no_register_p"])){ if($_POST["no_register_p"] == '1') echo "checked";}else{if(isset($no_register_p)){ if($no_register_p == '1') echo "checked";}}?> name="no_register_p" value="1" id="">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_p"])){ if($_POST["si_exist_p"] == '1') echo "checked";}else{if(isset($si_exist_p)){ if($si_exist_p == '1') echo "checked";}}?> name="si_exist_p" value="1" id="">
                                        </div>
                                    </div>
                                        
                                    <?php imprimir_msjs_no_style($errors_p); ?>

                                        <button type='submit' class="btn btn-primary col-lg-9"value="reg_dad" name ='reg_dad'>Actualizar</button>
