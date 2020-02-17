                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos del Representante</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_r" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_r)) echo $apellido_p_r; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_r" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_r)) echo $apellido_m_r; ?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_r" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_r)) echo $nombre1_r; ?>">
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_r" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_r)) echo $nombre2_r; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        <div class="col-lg-3 my-3">
                                            <label></label>
                                        <select name="nacionalidad_r" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_r)) if($nacionalidad_r == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_r)) if($nacionalidad_r == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <label>Cedula:</label>
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control"  name="id_doc_r" value="<?php if(isset($id_doc_r)) echo $id_doc_r; ?>">     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <p for="" class="">Sexo:</p>

                                            <label for="" class="">Masculino:</label>
                                            <input type="radio" <?php if(isset($sexo_r)){ if($sexo_r == '1') echo "checked";};
                                            ?> name="sexo_r" value="1" id="" >

                                            <label for="sexo_r" class="">Femenino:</label>

                                            <input type="radio" name="sexo_r" <?php if(isset($sexo_r)){ if($sexo_r == '2') echo "checked";}
                                            ?> value="2" id="" >
                                        </div>                                        
                                    </div> 
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_r" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_r)) echo $ocupacion_r;?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="fecha_nac_r" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_r)) echo $fecha_nac_r; ?>">
                                        </div>
    

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_r" id="cedula" class="form-control"  >
                                                <option value=""> Seleccione </option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_r)) if($estado_civil_r == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>
                                    </div>
    
                                
                                    <div class="row my-4">
                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_r" id="" ><?php if(isset($lugar_nac_r)) echo $lugar_nac_r;?></textarea>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitacion</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_r"  id="" placeholder="Direccion de Habitacion" class="form-control" ><?php if(isset($direcc_hab_r)) echo $direcc_hab_r;?></textarea>
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_r" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_r)) echo $tlf_local_r; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_r" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_r)) echo $tlf_cel_r; ?>" >    
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_r" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_r)) echo $correo_r; ?>">
                                        </div>
                                        
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6 my-4">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_r" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_r)) echo $prof_ofi_r; ?>">
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_r"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_r)) echo $lug_trab_r;?></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_r"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_r)) echo $direcc_trab_r;?></textarea>
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_r" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_r)) echo $tlf_ofic_r;?>">
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-6 my-2">
                                            <label>Parentesco:</label>
                                            <input type="text" name="parentesco_r" id="" placeholder="Parentesco" class="form-control" value="<?php if(isset($parentesco_r)) echo $parentesco_r;?>">
                                        </div>

                                        <div class="col-lg-6 my-2">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_r" class="">Si</label>

                                        <input type="radio" <?php if(isset($convivencia_r)){ if($convivencia_r == '1') echo "checked";}/*else{if(isset($convivencia_r)){ if($convivencia_r == '1') echo "checked";}}*/
                                        ?> name="convivencia_r" value="1" id="">

                                        <label for="convivencia_r" class="">No</label>

                                        <input type="radio" name="convivencia_r" <?php if(isset($convivencia_r)){ if($convivencia_r == '0') echo "checked";}/*else{if(isset($convivencia_r)){ if($convivencia_r == '0') echo "checked";}}*/
                                        ?> value="0" id="">
                                    </div>    
                                </div>

                                    <div class="row col-12">

                                        <div class="col-lg-6 my-2">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($si_exist_r)){ if($si_exist_r == '1') echo "checked";}?> name="si_exist_r" value="1" id="">
                                        </div>
                                    </div>

                                        
                                    <?php imprimir_msjs_no_style($errors_r); ?>

                                        <button type='submit' class="btn btn-primary col-lg-9" value="reg_represent" name='reg_represent'>Registrar</button>
                                        
                                        
                                    

