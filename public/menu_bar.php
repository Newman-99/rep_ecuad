
<div  class="nave">
 	            <ul>

<li><a href="estudiantes.php">Estudiantes</a></li>
<li><a href="docentes.php">Docentes</a></li>
<li><a href="secciones.php">Secciones</a></li>
<li><a href="administrativos.php">Aministrativos</a></li>

<?php if ($nivel_permiso === "1") {
echo "<li><a href='#'>Administracion de Usuarios </a></li>
<li><a href='config.php'>Configuraciones</a></li>

";         
}
 ?>
<li><a href='../login/logout.php'>Cerrar Sesion</a></li>
 	            </ul>