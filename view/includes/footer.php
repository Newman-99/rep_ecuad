		</section>
		
		<footer class="estilo-footer" style="height: 60px; font-size: 20px;font-family: Times New Roman;">
        <div class="">

            <?php  $anio_escol_actual = obtener_anios_escolar_actual(); 
$anio_escolar1 = $anio_escol_actual['anio_escolar_1'];
$anio_escolar2 = $anio_escol_actual['anio_escolar_2'];

    date_default_timezone_set("America/Caracas");
    $fecha_actual = date("Y-m-d (H:i:s)");
	

 ?>

            <p><?php echo "Año Escolar: ".$anio_escolar1."-".$anio_escolar2; ?>
	|

 	Fecha del Sistema: <?php echo $fecha_actual; ?>
            </p>

      </div>
		</footer>
		

	    <section class=""></section>
    		<script src="../../style/js/jquery-3.4.1.min.js"></script>
			<script src="../../style/js/bootstrap.bundle.min.js"></script>
            <script src="../../style/js/jquery-3.1.1.min.js"></script>
			<script src="../../style/js/sweetalert2.min.js"></script>
	        <script src="../../style/js/bootstrap.min.js"></script>
	        <script src="../../style/js/material.min.js"></script>
	        <script src="../../style/js/ripples.min.js"></script>
	        <script src="../../style/js/jquery.mCustomScrollbar.concat.min.js"></script>
			<script src="../../style/js/main.js"></script>

<script>
		        $.material.init();
			</script>
			
</body>
	
</html>
