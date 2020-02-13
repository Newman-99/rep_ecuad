<?php require '../../includes/init_system.php'; ?>

<?php 

require '../../includes/head.php';
    session_start();
 valid_inicio_sesion('1');
?>
	
			<?php  

if (!empty($_POST['eliminar_admin'])) {



	$id_doc = $_POST['eliminar_admin'];


			$errors[] = "El proceso de eliminar personal administrativo es delicado, solo esta disponible para usuarios nivel administrador y para casos extraordinarios. No se debe proceder si este ya ha interectuado con demas informacion del sistema debido a que se podra perder. Si el administrativo tiene informacion como docente, esta no se elimnara.
				<br>
				<br>
				Esta seguro de elminar el Administrador: ".$id_doc."

				<br><br>
				
				<form action=".$_SERVER['PHP_SELF']." method='post'>
                        
                <button type='submit' icon='button-cancel' id='button-modi' value=".$id_doc." name ='confirmar' >Confirmar</button>
                         
                 <form>

                 ";


}

if (!empty($_POST['confirmar'])) {

	$id_doc = $_POST['confirmar'];

	eliminar_admin($id_doc);
	$errors = NULL;	

	$errors[] = "Eliminacion del administrativo: ".$id_doc." Exitosa";


if (!is_exist_docente($id_doc)) {

	eliminar_persona($id_doc);
}else{
	$errors[] = "Pero no se elimino sus datos como Docente";	
}
	

}

			?>


    <title>Eliminar Administrativo</title>
		
		<?php require '../../includes/header.php' ?>
    <h2>Eliminar Administrativo</h2>
		
	<a href='admins	.php'>Volver</a>
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

