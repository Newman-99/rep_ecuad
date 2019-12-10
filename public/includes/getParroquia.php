<?php 
require_once'../../database/connect.php';

	$id_municipio = $_POST['id_municipio'];
	
	$sqlP = "SELECT id_parroquia, parroquia FROM parroquias WHERE id_municipio = :id_municipio ORDER BY parroquia ASC";

			$resultP=$db->prepare($sqlP);
			$resultP->bindValue(":id_municipio",$id_municipio);			
			$resultP->execute();	

	$html = "<option value='0'> Seleccionar Parroquia</option>";

			while($registroP=$resultP->fetch(PDO::FETCH_ASSOC)){

		$html.= "<option value='".$registroP['id_parroquia']."'>".$registroP['parroquia']."</option>";
	}
	echo $html;
?>

