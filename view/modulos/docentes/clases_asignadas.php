<?php 

require '../../includes/head.php';

session_start();

    if(!isset($_SESSION["id_user"])){
       header("Location:../../../index.php");
        
   }else{
    $nivel_permiso=$_SESSION['nivel_usuario'];


if (empty($_GET['id_doc_docent'])) {
	header('Location:docentes.php');
}

$id_doc_docent = htmlentities(addslashes($_GET["id_doc_docent"]));
?>

	    <title>Clases Asignadas</title>
		
		<?php require '../../includes/header.php' ?>

<?php

$sql="SELECT doc.id_doc_docent,cl.grado,cl.seccion,cl.no_aula,tr.descripcion turno, cl.anio_escolar1,cl.anio_escolar2,tp.descripcion cargo, est.descripcion estado FROM docentes doc INNER JOIN clases_asignadas ca ON doc.id_doc_docent = ca.id_doc_docent INNER JOIN clases cl ON ca.id_clase = cl.id_clase INNER JOIN estado est ON ca.id_estado = est.id_estado INNER JOIN turnos tr ON cl.id_turno = tr.id_turno INNER JOIN tipos_docentes tp ON ca.id_tipo_docent = tp.id_tipo_docent

			WHERE doc.id_doc_docent = :id_doc_docent";
					 
			$result=$db->prepare($sql);
									
			$result->bindValue("id_doc_docent",$id_doc_docent);
			
			$result->execute();	

	        echo "<div>";
 	          echo "<table class='tabla'>
 	          <caption> Clases del docente: ".$id_doc_docent."</caption>
 		            <thead>";
 			            echo"<tr>";
						echo"<th>Grado </th> 
						 <th>Seccion </th> 
						 <th>Numero de Aula </th> 
						 <th>Turno </th> 
						 <th>Año Escolar 1 </th> 
						 <th>Año Escolar 2 </th> 
						 <th>Cargo</th> 
						 <th>Estado del Contrato</th>";
 			            
 			           echo "</tr>
 		            </thead>";

 		            while($registro=$result->fetch(PDO::FETCH_ASSOC)){
 		            	echo "<tr>";

 			           echo "<td>{$registro['grado']}</td>";
					   echo "<td>{$registro['seccion']}</td>";
					   echo "<td>{$registro['no_aula']}</td>";
					   echo "<td>{$registro['turno']}</td>";
					   echo "<td>{$registro['anio_escolar1']}</td>";
					   echo "<td>{$registro['anio_escolar2']}</td>";
					   echo "<td>{$registro['cargo']}</td>";
					   echo "<td>{$registro['estado']}</td>";
 		          echo " </tr>";
 		          		} 

 	            echo "</table>
            </div>" ?>

                 <a href="docentes.php">Volver</a>


            

<?php

    if(!empty($errors)){
        foreach ($errors as $msjs) {
            echo "<p>$msjs<p>";
        }
    }


 } ?>

<?php require '../../includes/head.php' ?>