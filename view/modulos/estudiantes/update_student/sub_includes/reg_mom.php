                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="form-titulo">Datos de la Madre</h3>
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Apellido:</label>
                                            <input type="text" name="apellido_p_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_p_m)) echo $apellido_p_m; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Apellido:</label>
                                            <input type="text" name="apellido_m_m" id="" placeholder="Apellido" class="form-control" value="<?php if(isset($apellido_m_m)) echo $apellido_m_m; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-6 my-2">
                                            <label>Primer Nombre:</label>
                                            <input type="text" name="nombre1_m" id="" placeholder="Nombre" class="form-control"  value="<?php if(isset($nombre1_m)) echo $nombre1_m; ?>" >
                                        </div>
                                        <div class="col-lg-6 my-2">
                                            <label>Segundo Nombre:</label>
                                            <input type="text" name="nombre2_m" id="" placeholder="Nombre" class="form-control" value="<?php if(isset($nombre2_m)) echo $nombre2_m; ?>">
                                        </div>
                                    </div>

                                
                                    <div class="row">
                                        
                                        <div class="col-lg-2 ">
                                         <label for=""></label>
                                        <select name="nacionalidad_m" id="cedula" class="form-control my-3"  >
                                            
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_m)) if($nacionalidad_m == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_m)) if($nacionalidad_m == '2') echo 'selected';?> value="2">E</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-4 my-2">
                                        <label class="form-inline col-1">Cedula:</label> 
                                            <input type="text" maxlength="8" placeholder="C.I" class="form-control "  name="id_doc_m" value="<?php if(isset($id_doc_m)) echo $id_doc_m; ?>" >     
                                        </div>
                                        
                                        <div class="col-lg-6 my-2">
                                            <label>Ocupacion:</label>
                                            <input type="text" name="ocupacion_m" id="" placeholder="Ocupacion" class="form-control" value="<?php if(isset($ocupacion_m)) echo $ocupacion_m; ?>" >
                                        </div>
                                    </div> 
                                
                                    <div class="row my-2">
                                        <div class="col-lg-3 my-4">
                                            <label for="">Fecha de Nacimiento:</label>
                                            <input type="date" name="fecha_nac_m" id="" placeholder="Fecha" class="form-control" value="<?php if(isset($fecha_nac_m)) echo $fecha_nac_m; ?>" >
                                        </div>
    

                                        <div class="col-lg-3 my-4">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_m" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_m)) if($estado_civil_m == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="">Lugar de Nacimiento:</label>
                                            <textarea rows="3" cols="40" placeholder="Lugar de nacimiento" class="form-control"  name="lugar_nac_m" id=""  ><?php if(isset($lugar_nac_m)) echo $lugar_nac_m;?></textarea>
                                        </div>
                                    </div>
    
                                    <div class="row my-2">
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de Habitación:</label>
                                            <textarea rows="3" cols="40" name="direcc_hab_m"  id="" placeholder="Direccion de habitación" class="form-control"   ><?php if(isset($direcc_hab_m)) echo $direcc_hab_m;?></textarea>
                                        </div>
    
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_m" id="" placeholder="Telefono local" class="form-control" value="<?php if(isset($tlf_local_m)) echo $tlf_local_m; ?>" >    
                                        </div>
                                        
                                        <div class="col-lg-3 my-4">
                                            <label for="">Telefono celular</label>
                                            <input type="number" name="tlf_cel_m" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_cel_m)) echo $tlf_cel_m; ?>"  >    
                                        </div>
                                    </div>
    

                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Correo Electronico:</label>
                                            <input type="email" name="correo_m" id="" placeholder="Correo electronico" class="form-control" value="<?php if(isset($correo_m)) echo $correo_m; ?>" >
                                        </div>
                                        
                                        <div class="col-lg-6 ">
                                            <label >Profesion u Oficio:</label>
                                            <input type="text" name="prof_ofi_m" id="" placeholder="Profesion u Oficio" class="form-control" value="<?php if(isset($prof_ofi_m)) echo $prof_ofi_m; ?>">
                                        </div>
                                    </div>


                                    <div class="row my-4">
                                        <div class="col-lg-6">
                                            <label for="">Lugar de trabajo:</label>
                                            <textarea rows="3" cols="40" name="lug_trab_m"  id="" placeholder="Lugar de trabajo" class="form-control" ><?php if(isset($lug_trab_m)) echo $lug_trab_m;?></textarea>
                                        </div>
            
                                        <div class="col-lg-6 ">
                                            <label for="">Direccion de trabajo:</label>
                                            <textarea rows="3" cols="40" name="direcc_trab_m"  id="" placeholder="Direccion de trabajo" class="form-control" ><?php if(isset($direcc_trab_m)) echo $direcc_trab_m;?></textarea>
                                        </div>
                                    </div>

                                    <div class="row my-4">
                                        <div class="col-lg-3 ">
                                            <label for="">Telefono de oficina:</label>
                                            <input type="number" name="tlf_ofic_m" id="" placeholder="Telefono de oficina" class="form-control" value="<?php if(isset($tlf_ofic_m)) echo $tlf_ofic_m;?>">
                                        </div>
                                    
                                        <div class="col-lg-3 ">
                                            <label>Es el Representante?:</label>
                                        <input type="checkbox" <?php if(isset($_POST["is_represent_m"])){ if($_POST["is_represent_m"] == '1') echo "checked";}else{if(isset($is_represent_m)){ if($is_represent_m == '1') echo "checked";}}?> name="is_represent_m" value="1" id="" class="col-3">
                                        </div>

                                        <div class="col-lg-6 ">
                                        <p for="" class="">Vive con el estudiante:</p>

                                        <label for="convivencia_m" class="">Si</label>

                                        <input type="radio" <?php if(isset($_POST["convivencia_m"])){ if($_POST["convivencia_m"] == '1') echo "checked";}else{if(isset($convivencia_m)){ if($convivencia_m == '1') echo "checked";}}
                                        ?> name="convivencia_m" value="1" id="">

                                        <label for="convivencia_m" class="">No</label>

                                        <input type="radio" name="convivencia_m" <?php if(isset($_POST["convivencia_m"])){ if($_POST["convivencia_m"] == '0') echo "checked";}else{if(isset($convivencia_m)){ if($convivencia_m == '0') echo "checked";}}
                                        ?> value="2" id="">
                                        </div>
                                    </div>

                                    <div class="row my-4">                                    

                                        <div class="col-lg-6 ">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_m"])){ if($_POST["si_exist_m"] == '1') echo "checked";}else{if(isset($si_exist_m)){ if($si_exist_m == '1') echo "checked";}}?> name="si_exist_m" value="1" id="">
                                        </div>
                                    </div>
                                        <?php imprimir_msjs_no_style($errors_m); ?>

                                        <button type='submit' class="btn btn-primary col-lg-9"value="reg_mom" name ='reg_mom'>Registrar</button>
