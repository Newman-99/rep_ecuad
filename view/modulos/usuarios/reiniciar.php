<?php  
require '../../../database/connect.php';
require '../../../functions/functions.php';
$id_usr=$_GET['id_usr'];
	delete_usr($id_usr);

	header('location:usuarios.php?msj=El Usuario '.$id_usr.' ha sido reiniciado, por lo que se tendra que volver a registrar');
?>
