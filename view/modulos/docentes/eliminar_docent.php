<?php 
require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('1');
?>
	
			<?php  

if (!empty($_POST['eliminar_docent'])) {



	$id_doc = $_POST['eliminar_docent'];


			$errors[] = "El proceso de eliminar docentes es delicado, solo esta disponible para usuarios nivel administrador y para casos extraordinarios. No se debe proceder si ya tiene clases asignadas debido a que se perdera informacion del contrato.
				<br>
				<br>
				Esta seguro de elminar el docente: ".$id_doc."

				<br><br>
				
				<form action=".$_SERVER['PHP_SELF']." method='post'>
                        
                <button type='submit' icon='button-cancel' id='button-modi' value=".$id_doc." name ='confirmar' >Confirmar</button>
                         
                 <form>

                 ";


}

if (!empty($_POST['confirmar'])) {

	$id_doc = $_POST['confirmar'];

	eliminar_docente($id_doc);

	$errors = NULL;	
	
	$errors[] = "Eliminacion del docente: ".$id_doc." Exitosa";

}

			?>


    <title>Eliminar Docente</title>
		
		<?php require '../../includes/header.php' ?>
		
	<a href='docentes.php'>Volver</a>
		    	<br><br>

            </div>
	    </section>

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<h4 style = 'margin-top:0%;'>$msjs</h4>";
        }
    } 
include '../../includes/footer.php';
 
?>

