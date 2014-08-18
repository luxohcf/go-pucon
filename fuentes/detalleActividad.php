<?php
include 'header.php';
?>
<!-- Galeria -->
<div class="row">
	<div class="col-lg-12">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>
	
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
		<div class="item active">
		  <img src="http://placehold.it/1200x300" alt="">
		  <div class="carousel-caption">
			...
		  </div>
		</div>
		<div class="item">
		  <img src="http://placehold.it/1200x300" alt="">
		  <div class="carousel-caption">
			...
		  </div>
		</div>
	  </div>
	
	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>
	</div>
</div>
<hr>
<!-- Actividades y publicidad -->
<div class="row">
	<!-- Columna izquierda -->
	<div class="col-md-8">
		<div class="container-fluid">

			<!-- Detalle -->
			<div class="row">
				<div class="col-lg-12">
					<h4><p class="text-center"><strong>Actividad 1</strong></p></h4>
					<hr>
					<p>
					Ubicación:
					Km. 10 Pucón -Villarrica (frente Hotel Park lake)
					A 600 metros de la carretera
					</p>
					<h4>Características:</h4>
					<ul>
						<li>Amplio Living/Comedor con chimenea
						</li>
						<li>Cocina Trotter (cocina y campana)
						</li>
					</ul>
					<h4>Valor Arriendo</h4>
					<ul>
						<li>450.000.-  Mensuales
						</li>
						<li>10.000.-  Por persona
						</li>
					</ul>
					<div>
					&nbsp;
					</div>
					<hr>
					<div class="btn-group btn-group-lg">
					  <button type="button" class="btn btn-success" onclick="volver();">Volver</button>
					  <button type="button" class="btn btn-default" onclick="irContacto();" >Contactanos</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php
include 'publicidad.php';
?>	
	
</div>
				
<?php
include 'footer.php';
?>