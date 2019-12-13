<?php
require '../../includes/head.php';

session_start();

    if(!isset($_SESSION["id_user"])){
       header("Location:../index.php");
        
   }else{
	$nivel_permiso=$_SESSION['nivel_usuario'];
        ?>

	    <title>Docentes</title>
    </head>
    <body>

		<header class="top">
		   <ul>
				<li><img src="./img/i.png" width="80px" height="70px"><br>U-E-N "República del Ecuador"</li>
			</ul>
	   </header>
	   
		<?php 
		if(!empty($_POST)){
            $ci = htmlentities(addslashes($_POST["ci_docente"]));
			if(validar_exist_docente($ci)){

			$sql="SELECT in_p.id_doc,
            in_p.nombre,
            in_p.apellido_p,
            in_p.apellido_m,
            tr.descripcion descripcion_turno,
            tp.descripcion descripcion_tip_docent,
            est.descripcion descripcion_estado,
            cb.tlf_cel,
            cb.tlf_local,
            cb.correo,
            doc.fecha_ingreso,
            doc.fecha_inabilitacion
			
           FROM docentes doc 
           
           INNER JOIN info_personal in_p ON doc.id_doc_docent = in_p.id_doc 
           
           INNER JOIN tipos_docentes tp ON doc.id_tipo_docent = tp.id_tipo_docent
           
           INNER JOIN contact_basic cb ON doc.id_doc_docent = cb.id_doc
           
           INNER JOIN estado est ON doc.id_estado = est.id_estado
           
           INNER JOIN turnos tr ON doc.id_turno = tr.id_turno 
                       
       WHERE doc.id_doc_docent = :id;";
					 
			$result=$db->prepare($sql);
									
			$result->bindValue(":id",$ci);
			
			$result->execute();	
			
			while($registro=$result->fetch(PDO::FETCH_ASSOC)){
					?>

	        <div>
 	            <table class="tabla">
 		            <thead>
 			            <tr>
						 <th>Cedula</th> 
						 <th>Nombre</th> 
						 <th>Apellidos</th> 
						 <th>Turno</th> 
						 <th>Tipo Docente</th>
						 <th>Estado</th>
                         <th>Telefono Celular</th>
                         <th>Telefono Local</th>
                         <th>Correo</th>
                         <th>Fecha Ingreso</th>
						 <th>Fecha Inabilitacion</th>

						 <th></th>
 			            </tr>
 		            </thead>
 		            <tr>
 			            <td><?php echo $registro['id_doc'] ?></td> 
                        
                        <td><?php echo $registro['nombre'] ?></td>
                        
                        <td><?php echo $registro['apellido_p']." ".$registro['apellido_m'] ?></td> 
						
						<td><?php echo $registro['descripcion_turno']?></td>

                        <td><?php echo $registro['descripcion_tip_docent']?></td>

                        <td><?php echo $registro['descripcion_estado']?></td>
						
                        <td><?php echo $registro['tlf_cel']?></td>

                        <td><?php echo $registro['tlf_local']?></td>

                        <td><?php echo $registro['correo']?></td>

						<td><?php echo $registro['fecha_ingreso']?></td>

						<td><?php echo $registro['fecha_inabilitacion']?></td>                     	
	                        <td><a href="modificar.php" id=button-modi class="icon-compose"> Modificar </a>
                        	<br><br>
						<a href="info_docent.php" class="icon-list1" id="button-modi">MasInformacion</a>
						<br><br>
						 <a href="clases_asignadas.php?id_doc_docent=<?php echo $registro['id_doc'] ?>" id="button-modi">Sus Clases</a>
						 <br><br>
						 <a href="d.php" class="icon-cancel" id="button-modi"> Eliminar </a>
						</td>	 
           </tr>
 	            </table>
            </div>
	<?php  }}else{
		echo "<h3>No existe el Docente</h3>";
	}
}?>

	<section>
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
			
			<input type="search" class="search" placeholder="Ingrese Cedula" name="ci_docente" value="<?php if(isset($ci)) echo $ci;?>">
			<button id=button class="icon-search" type="submit">Buscar</button>
			<br>
			<a href="register_docent.php" style="float:right;margin-top:80px;margin-right:180px;" id=registrer class="icon-add">Registrar Nuevo Docente</a>
		</form>
		

				<?php include '../../includes/menu_bar.php' ?>

            </div>
	    </section>

<?php } 

include '../../includes/footer.php'
?>


