                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="form-titulo">Personas autorizada a retirar el estudiante de la institución</h3>
                                        </div>
                                        <br><br><br><br>
                                        <div class="col-lg-6 my-2">
                                            <label for="" class="">Nombres:</label>                                           
                                            <input type="text" name="nombres_pr" id="" placeholder="Nombres" class="form-control" value="<?php if(isset($nombres_pr)) echo $nombres_pr; ?>" >
                                        </div>

                                        <div class="col-lg-6 my-2">
                                            <label for="">Apellido Paterno:</label> 
                                            <input type="text" name="apellido_p_pr" id="" placeholder="Apellido Paterno" class="form-control" value="<?php if(isset($apellido_p_pr)) echo $apellido_p_pr; ?>">
                                        </div>

                                        <div class="col-lg-6 my-3">
                                            <label for="">Apellido Materno:</label> 
                                            <input type="text" name="apellido_m_pr" id="" placeholder="Apellido Materno" class="form-control" value="<?php if(isset($apellido_m_pr)) echo $apellido_m_pr; ?>">
                                        </div>
                                            
                                        <div class="col-lg-2 my-5">
                                          <select name="nacionalidad_pr" id="cedula" class="form-control" >
                                            <option value=""> Seleccione </option>
                                            <option <?php if(isset($nacionalidad_pr)) if($nacionalidad_pr == '1') echo 'selected';?> value="1">V</option>
                                            <option <?php if(isset($nacionalidad_pr)) if($nacionalidad_pr == '2') echo 'selected';?> value="2">E</option>
                                          </select>   
                                        </div>
                                        
                                        <div class="col-lg-4 my-3">
                                            <label class="form-inline">Cedula:</label>
                                            <input type="text" name="id_doc_pr" id="" placeholder="Cedula de identidad" class="form-control"  maxlength="8" value="<?php if(isset($id_doc_pr)) echo $id_doc_pr; ?>">
                                        </div>

                                        <div class="col-lg-3 ">
                                            <label>Estado civil:</label>
                                            <select name="estado_civil_pr" id="cedula" class="form-control"  >
                                                <option value="0"> Seleccione </option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '1') echo 'selected';?> value="1">Soltero/a</option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '2') echo 'selected';?> value="2">Casado/a</option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '3') echo 'selected';?> value="3">Divorciado/a</option>
                                                <option <?php if(isset($estado_civil_pr)) if($estado_civil_pr == '4') echo 'selected';?> value="4">Viudo/a</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                          <p for="" class="">Sexo:</p>
                                          <label for="" class="">Masculino</label>
                                          <input type="radio" name="sexo_pr" <?php if(isset($sexo_pr)){ if($sexo_pr == '1') echo "checked";}?> name="sexo_pr" value="1" id="">
                                            <br>
                                          <label for="sexo_pr" class="">Femenino</label>
                                          <input type="radio" name="sexo_pr" <?php if(isset($sexo_pr)){ if($sexo_pr == '2') echo "checked";}?> value="2" id="">

                                        </div>

                                        <div class="col-lg-6 ">
                                            <label for="" class="">Parentesco</label>
                                            <input type="text" name="parentesc_pr" id="" value="<?php if(isset($parentesc_pr)) echo $parentesc_pr; ?>" placeholder="Parentesco" class="form-control">
                                        </div>
                                        
                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono local</label>
                                            <input type="number" name="tlf_local_pr" id="" placeholder="Telefono local" name="tlf_local_pr" class="form-control"
                                            value="<?php if(isset($tlf_local_pr)) echo $tlf_local_pr; ?>"
                                            >
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono Celular</label>
                                            <input type="number" name="tlf_cel_pr" id="" placeholder="Telefono celular" 
                                            value="<?php if(isset($tlf_cel_pr)) echo $tlf_cel_pr; ?>"
                                            class="form-control">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label for="">Telefono de Emergencia</label>
                                            <input type="number" name="tlf_emerg" id="" placeholder="Telefono celular" class="form-control" value="<?php if(isset($tlf_emerg)) echo $tlf_emerg; ?>">
                                        </div>

                                        <div class="col-lg-6 my-4">
                                            <label>Seleccione si ya esta registrado: </label>
                                            <input type="checkbox" <?php if(isset($_POST["si_exist_pr"])){ if($_POST["si_exist_pr"] == '1') echo "checked";}else{if(isset($si_exist_pr)){ if($si_exist_pr == '1') echo "checked";}}?> name="si_exist_pr" value="1" id="">
                                        </div>
                       
                                        <?php imprimir_msjs_no_style($errors_pr); ?>
                                     </div>   
