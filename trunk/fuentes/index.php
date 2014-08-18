<?php
include 'header.php';
?>

   <!-- Jumbotron Header  hero-spacer-->
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
<!-- Contacto -->
<div class="row">
<div class="col-lg-12 btn btn-success active text-center">
    <?php echo $V_TEXTO_CONTACTO; ?>
</div>
</div>
<hr>
<!-- Actividades y publicidad -->
<div class="row">
<!-- Columna izquierda -->
<div class="col-md-8">
	<div class="container-fluid">
	<!-- fila de actividades -->
		<div class="row">
			<div class="col-md-6">
				<div class="thumbnail" id="01">
					<img src="http://placehold.it/360x160" alt="">
					<div class="caption">
						<h3><p class="text-center"><strong>Actividad 1</strong></p></h3>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
						<p class="text-center">
						   <a href="detalleActividad.php?id=1" class="btn btn-default">VER DETALLES</a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail" id="02">
					<img src="http://placehold.it/360x160" alt="">
					<div class="caption">
						<h3><p class="text-center"><strong>Actividad 2</strong></p></h3>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit
						</p>
						<p class="text-center">
						   <a href="#" class="btn btn-default">VER DETALLES</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- fila de actividades -->
		<div class="row">
			<div class="col-md-6">
				<div class="thumbnail" id="03">
					<img src="http://placehold.it/360x160" alt="">
					<div class="caption">
						<h3><p class="text-center"><strong>Actividad 3</strong></p></h3>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
						<p class="text-center">
						   <a href="#" class="btn btn-default">VER DETALLES</a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail" id="04">
					<img src="http://placehold.it/360x160" alt="">
					<div class="caption">
						<h3><p class="text-center"><strong>Actividad 4</strong></p></h3>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit
						</p>
						<p class="text-center">
						   <a href="#" class="btn btn-default">VER DETALLES</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- fila de actividades -->
		<div class="row">
			<div class="col-md-6">
				<div class="thumbnail" id="05">
					<img src="http://placehold.it/360x160" alt="">
					<div class="caption">
						<h3><p class="text-center"><strong>Actividad 5</strong></p></h3>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
						</p>
						<p class="text-center">
						   <a href="#" class="btn btn-default">VER DETALLES</a>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="thumbnail" id="06">
					<img src="http://placehold.it/360x160" alt="">
					<div class="caption">
						<h3><p class="text-center"><strong>Actividad 6</strong></p></h3>
						<hr>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit
						</p>
						<p class="text-center">
						   <a href="#" class="btn btn-default">VER DETALLES</a>
						</p>
					</div>
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