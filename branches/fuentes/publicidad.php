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
			<style type="text/css">
			    .bordeRadius {
			        border: 8px solid;
			        border-color: #449d44;
                    background: #dddddd;
                    border-bottom-left-radius: 2em;
                    border-top-right-radius: 2em;
                    border-top-left-radius: 2em;
                    max-width: 300px;
                    cursor: pointer;
			    }
			    .bordeRadius img {
			        max-width: 100%;
			        position: relative;
			        border-top-right-radius: 1em;
                    border-top-left-radius: 1em;
			    }
			    .borderPubliLeft {
			        text-align: center;
			        background: #449d44;
                    color: #FFFFFF;
                    border: 8px solid;
                    border-color: #449d44;
                    border-bottom-left-radius: 1em;
                    background-image: linear-gradient(to bottom,#5cb85c 0,#449d44 100%);
			    }
			   
			</style>
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