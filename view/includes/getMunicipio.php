<?php 
require_once'../../database/connect.php';

	$id_estado = $_POST['id_estado'];
	
	$sqlM = "SELECT id_municipio, municipio FROM municipios WHERE id_estado = :id_estado ORDER BY municipio ASC";

			$resultM=$db->prepare($sqlM);
			$resultM->bindValue(":id_estado",$id_estado);			
			$resultM->execute();	

	$html = "<option value='0'> Seleccionar Municipio</option>";

			while($registroM=$resultM->fetch(PDO::FETCH_ASSOC)){

		$html.= "<option value='".$registroM['id_municipio']."'>".$registroM['municipio']."</option>";
	}
	echo $html;
?>

