

<?php 

if(empty($_POST['lug_nac']) && empty($_POST['modi_lug_nac'])  && empty($_POST['insertar_lugar_nac'])){
    ?>
          <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <button id="" type="submit" name='insertar_lugar_nac' value="insertar_lugar_nac">Insertar</button>
        </form>  
    
    <?php

    }


 ?>

<?php 

if(!empty($_POST['insertar_lugar_nac']) || !empty($_POST['modi_lug_nac']) && empty($_POST['direcc_hab'])){
?>

           <script language="javascript" src="../../style/js/jquery-3.4.1.min.js"></script>


            <script language="javascript">

            $(document).ready(function(){
                $("#dir_estado").change(function () {

                    $('#dir_parroquia').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
                    
                    $("#dir_estado option:selected").each(function () {
                        id_estado = $(this).val();
                        $.post("../../includes/getMunicipio.php", { id_estado: id_estado }, function(data){
                            $("#dir_municipio").html(data);
                        });            
                    });
                })
            });
            

            $(document).ready(function(){
                $("#dir_municipio").change(function () {
                    $("#dir_municipio option:selected").each(function () {
                        id_municipio = $(this).val();
                        $.post("../../includes/getParroquia.php", { id_municipio:id_municipio }, function(data){
                            $("#dir_parroquia").html(data);
                        });            
                    });
                })
            });

            $(document).ready(function(){
                $("#dir_estado").change(function () {                   
                    $("#dir_estado option:selected").each(function () {
                        id_estado = $(this).val();
                        $.post("../../includes/getCiudad.php", { id_estado: id_estado }, function(data){
                            $("#dir_ciudad").html(data);
                        });            
                    });
                })
            });
            


        </script>

        <?php 
    $sql = "SELECT id_estado,estado FROM estados ORDER BY 'iso_3166-2' ASC ";
    $result=$db->prepare($sql);
            $result->execute();
         ?>         

            Estado <select id="dir_estado" name="dir_estado">
                <option value="0"> Estado</option>

                <?php while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>

                <option value="<?php echo $registro['id_estado'] ?>"> <?php echo $registro['estado'] ?> </option>
        <?php  } ?>
                    </select>

    
                 Municipio
                <select id="dir_municipio" name="dir_municipio_lugar_nac"></select>

                  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <button id="" type="submit" name='lug_nac' value="lug_nac">Guardar</button>
                    
                </form>

<?php
}


if(!empty($_POST['lug_nac'])){
?>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

<button id="" type="submit" name='modi_lug_nac' value="modi_lug_nac">Cambiar</button>

</form>

<?php
}
?>

