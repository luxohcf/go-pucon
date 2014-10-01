	<!-- Columna derecha -->
	<div class="col-md-4 ">
		<div class="container-fluid">
			<!-- fila de quienes somos -->
			<div class="row">
				<div class="col-md-12">
					<h3><em>Quiénes somos?</em></h3>
					<!--hr-->
					<div class="clearfix">
						<img src="<?php echo $V_LOGO_CHICO; ?>"
						id="about-image" alt="" class="pull-left">
					<p>
						<?php echo $V_TEXTO_QUIENES; ?>
					</p>
					</div>
				</div>
			</div>
			<!-- fila de publicidad -->
			<!--hr-->
			<div class="row">
				<div class="col-md-12">
					<h4><em>Publicidad</em></h4>
				</div>
			</div>
			<!--hr-->
			<div class="row">
			    <!-- Elementos 1..n -->
			    <?php
			    // genero publicidad
			    $obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
                 
                echo $obj->GeneraPublicidad();
			    ?>
				
			</div>
		</div>
	</div>
<!-- Fin Actividades y publicidad -->