<?php
include 'header.php';
?>

<!-- Galeria fotografica principal -->
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
	
<?php
    // Genera actividades
    $obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
    echo $obj->GeneraActividades();

?>

	<!-- Fin fila de actividades -->
	</div>
</div>

<?php
include 'publicidad.php';
?>

</div>
<?php
include 'footer.php';
?>