<br>
<div  class="nave" style="position: absolute;">
 	            <ul>

<li><a href="../estudiantes/estudiantes.php">Estudiantes</a></li>

<li><a href="../docentes/docentes.php">Docentes</a></li>

<li><a href="../clases/clases.php">Clases</a></li>

<li><a href="../admins/admins.php">Administrativos</a></li>

<li><a href="../inicio/dashboard.php">Inicio</a></li>

 

<?php if (comprob_permisos('1')) {
echo "<li><a href='../usuarios/usuarios.php'>Administracion de Usuarios </a></li>";} ?>

<!--<li><a href='#'>Configuraciones</a></li>-->

<li><a href='../../modulos/login/logout.php'>Cerrar Sesion</a></li>

</ul>
</div>