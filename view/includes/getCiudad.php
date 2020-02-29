<?php 
require_once'../../database/connect.php';

	$id_estadoC = $_POST['id_estado'];
	
	$sqlC = "SELECT id_ciudad, ciudad FROM ciudades WHERE id_estado = :id_estado ORDER BY ciudad ASC";

			$resultC=$db->prepare($sqlC);
			$resultC->bindValue(":id_estado",$id_estadoC);			
			$resultC->execute();	

	$html = "<option value='0'> Seleccionar Ciudad</option>";

			while($registroC=$resultC->fetch(PDO::FETCH_ASSOC)){

		$html.= "<option value='".$registroC['id_ciudad']."'>".$registroC['ciudad']."</option>";
	}
	echo $html;

?>
