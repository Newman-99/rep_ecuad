

<?php 


if(empty($_SESSION['save_direcc']));
{
    ?>
          <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <button id="" type="submit" name='insertar' value="insertar">Insertar</button>
        </form>  
    
    <?php
$_SESSION['save_direcc']= NULL;

    }


 ?>

<?php 
if(!empty($_POST['insertar']) || !empty($_POST['modi_direcc_hab'])){
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
            <br>

            Estado <select id="dir_estado" name="dir_estado">
                <option value="0"> Estado</option>

                <?php while($registro=$result->fetch(PDO::FETCH_ASSOC)){ ?>

                <option value="<?php echo $registro['id_estado'] ?>"> <?php echo $registro['estado'] ?> </option>
        <?php  } ?>
                    </select>

    
                 Municipio
                <select id="dir_municipio" name="dir_municipio"></select>

                 Parroquia
                <select id="dir_parroquia" name="dir_parroquia"></select>

                 Ciudad
                <select id="dir_ciudad" name="dir_ciudad"></select>
                    
                <select name="tipo_zona">
                    <option>Calle</option>
                    <option>Urbanizacion</option>
                </select>                
                
                Nombre o Nro <input type="text" name="tipo_vivienda">

                <select>
                    <option>Apartamento</option>
                    <option>Casa</option>
                </select>

                Nro: <input type="number" name="nro_habitacion">


                  <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

                <button id="" type="submit" name='direcc_hab' value="direcc_hab">Guardar</button>
                    
                </form>

<?php
$_SESSION['save_direcc']= '1';
_SESSION
}


if(!empty($_POST['direcc_hab'])){
?>

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

<button id="" type="submit" name='modi_direcc_hab' value="modi_direcc_hab">Cambiar</button>

</form>

<?php
}
?>


        <label for="">Direccion de Habitacion:</label>
        
        <?php 
        require '../../includes/form_direccion.php';
         ?>
                
        

        Lugar de Nacimiento:
        <?php //require '../../includes/form_lug_nac.php';?>
